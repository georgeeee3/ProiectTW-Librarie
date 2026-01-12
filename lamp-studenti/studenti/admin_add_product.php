<?php
require 'db.php';
session_start();



$mesaj = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titlu = trim($_POST['titlu']);
    $autor = trim($_POST['autor']);
    $pret = $_POST['pret'];
    $imagine = trim($_POST['imagine']);
    $descriere = trim($_POST['descriere']);
    $format = $_POST['format'];
    $isbn = $_POST['isbn'];
    $categorie = $_POST['categorie'];
    
    $slug = trim($_POST['slug']);
    if (empty($slug)) {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $titlu)));
    }

    try {
        $sql = "INSERT INTO produse (slug, titlu, autor, pret, imagine, descriere, format, isbn, categorie) 
                VALUES (:slug, :titlu, :autor, :pret, :imagine, :descriere, :format, :isbn, :categorie)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':slug' => $slug,
            ':titlu' => $titlu,
            ':autor' => $autor,
            ':pret' => $pret,
            ':imagine' => $imagine,
            ':descriere' => $descriere,
            ':format' => $format,
            ':isbn' => $isbn,
            ':categorie' => $categorie
        ]);

        $mesaj = "<p style='color:green;'>✅ Cartea <b>$titlu</b> a fost adăugată cu succes!</p>";
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            $mesaj = "<p style='color:red;'>Eroare: Există deja o carte cu acest Slug (ID URL).</p>";
        } else {
            $mesaj = "<p style='color:red;'>Eroare baza de date: " . $e->getMessage() . "</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Adaugă Produs</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 20px auto; padding: 20px; background-color: #f4f4f4; }
        .form-container { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #333; }
        label { display: block; margin-top: 15px; font-weight: bold; }
        input, select, textarea { width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button { background-color: #28a745; color: white; border: none; padding: 15px; width: 100%; margin-top: 20px; cursor: pointer; font-size: 16px; border-radius: 4px; }
        button:hover { background-color: #218838; }
        .note { font-size: 12px; color: #666; margin-top: 2px; }
    </style>
</head>
<body>

<div class="form-container">
    <h2>📚 Adaugă o Carte Nouă</h2>
    <?php echo $mesaj; ?>
    
    <form method="POST">
        <label>Titlu Carte:</label>
        <input type="text" name="titlu" required placeholder="Ex: Bridge Kingdom">

        <label>Slug (ID URL) - <i>Important pentru link-uri!</i></label>
        <input type="text" name="slug" placeholder="Ex: bridge-kingdom-deluxe">
        <div class="note">Lasă gol pentru a genera automat din titlu. Dacă vrei să păstrezi link-urile vechi, copiază ID-ul exact din database.js vechi.</div>

        <label>Autor:</label>
        <input type="text" name="autor" placeholder="Ex: Danielle L. Jensen">

        <label>Preț (RON):</label>
        <input type="number" step="0.01" name="pret" required placeholder="Ex: 140.00">

        <label>Categorie:</label>
        <select name="categorie">
            <option value="young-adult">Young Adult</option>
            <option value="fiction">Fiction</option>
            <option value="non-fiction">Non-Fiction</option>
            <option value="childrens">Children's</option>
            <option value="graphic-novels">Graphic Novels & Manga</option>
        </select>

        <label>Format:</label>
        <select name="format">
            <option value="Paperback">Paperback</option>
            <option value="Hardback">Hardback</option>
            <option value="E-book">E-book</option>
        </select>

        <label>ISBN:</label>
        <input type="text" name="isbn" placeholder="Ex: 978-...">

        <label>Link Imagine (URL):</label>
        <input type="text" name="imagine" placeholder="https://...">

        <label>Descriere:</label>
        <textarea name="descriere" rows="5" placeholder="Despre ce e cartea..."></textarea>

        <button type="submit">Salvează Produsul</button>
    </form>
    <br>
    <a href="main.php">← Înapoi la Site</a>
</div>

</body>
</html>