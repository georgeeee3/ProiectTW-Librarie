<?php
require 'db.php';
session_start();

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Trebuie să fii autentificat!']);
    exit;
}

$user_id = $_SESSION['user_id'];
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['action']) || !isset($data['product_id'])) {
    echo json_encode(['success' => false, 'message' => 'Date incomplete.']);
    exit;
}

$product_id = $data['product_id'];
$action = $data['action'];

try {
    if ($action === 'add') {
        $stmt = $pdo->prepare("INSERT IGNORE INTO favorite_produse (user_id, product_id) VALUES (:uid, :pid)");
        $stmt->execute(['uid' => $user_id, 'pid' => $product_id]);
        echo json_encode(['success' => true, 'message' => 'Produs adăugat la favorite!']);
    } 
    elseif ($action === 'remove') {
        $stmt = $pdo->prepare("DELETE FROM favorite_produse WHERE user_id = :uid AND product_id = :pid");
        $stmt->execute(['uid' => $user_id, 'pid' => $product_id]);
        echo json_encode(['success' => true, 'message' => 'Produs șters din favorite.']);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Eroare DB: ' . $e->getMessage()]);
}
?>