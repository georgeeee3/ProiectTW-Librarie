<?php
require 'db.php';
session_start();

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Trebuie să fii logat!']);
    exit();
}

$user_id = $_SESSION['user_id'];

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!isset($data['action']) || !isset($data['product_id'])) {
    echo json_encode(['success' => false, 'message' => 'Date incomplete']);
    exit();
}

$action = $data['action'];
$product_id = $data['product_id'];

try {
    if ($action === 'add_cart') {
        $stmt = $pdo->prepare("SELECT cantitate FROM cos_cumparaturi WHERE user_id = ? AND product_id = ?");
        $stmt->execute([$user_id, $product_id]);
        $row = $stmt->fetch();

        if ($row) {
            $stmt = $pdo->prepare("UPDATE cos_cumparaturi SET cantitate = cantitate + 1 WHERE user_id = ? AND product_id = ?");
            $stmt->execute([$user_id, $product_id]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO cos_cumparaturi (user_id, product_id, cantitate) VALUES (?, ?, 1)");
            $stmt->execute([$user_id, $product_id]);
        }
        echo json_encode(['success' => true, 'message' => 'Produs adăugat în coș']);
    }
    
    elseif ($action === 'update_cart_qty') {
        $qty = max(1, intval($data['qty']));
        $stmt = $pdo->prepare("UPDATE cos_cumparaturi SET cantitate = ? WHERE user_id = ? AND product_id = ?");
        $stmt->execute([$qty, $user_id, $product_id]);
        echo json_encode(['success' => true]);
    }

    elseif ($action === 'remove_cart') {
        $stmt = $pdo->prepare("DELETE FROM cos_cumparaturi WHERE user_id = ? AND product_id = ?");
        $stmt->execute([$user_id, $product_id]);
        echo json_encode(['success' => true]);
    }

    elseif ($action === 'add_fav') {
        $stmt = $pdo->prepare("INSERT IGNORE INTO favorite_produse (user_id, product_id) VALUES (?, ?)");
        $stmt->execute([$user_id, $product_id]);
        
        if ($stmt->rowCount() > 0) {
            echo json_encode(['success' => true, 'status' => 'added']);
        } else {
            echo json_encode(['success' => true, 'status' => 'exists']);
        }
    }

    elseif ($action === 'remove_fav') {
        $stmt = $pdo->prepare("DELETE FROM favorite_produse WHERE user_id = ? AND product_id = ?");
        $stmt->execute([$user_id, $product_id]);
        echo json_encode(['success' => true]);
    }

} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Eroare DB: ' . $e->getMessage()]);
}
?>