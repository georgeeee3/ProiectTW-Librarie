<?php
require 'db.php';
header('Content-Type: application/javascript');

try {
    $stmt = $pdo->query("SELECT * FROM produse");
    $produse_db = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $produse_formatate = [];

    foreach ($produse_db as $carte) {
        $produse_formatate[$carte['slug']] = [
            'title' => $carte['titlu'],
            'author' => $carte['autor'],
            'price' => number_format($carte['pret'], 2, ',', '.') . ' lei',
            'image' => $carte['imagine'],
            'description' => $carte['descriere'],
            'format' => $carte['format'],
            'isbn' => $carte['isbn'],
            'category' => $carte['categorie']
        ];
    }

    echo "const products = " . json_encode($produse_formatate, JSON_PRETTY_PRINT) . ";";

} catch (Exception $e) {
    echo "console.error('Eroare: " . $e->getMessage() . "');";
}
?>