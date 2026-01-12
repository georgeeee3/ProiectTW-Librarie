<?php
require 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $prenume = htmlspecialchars($_POST['prenume']);
    $nume = htmlspecialchars($_POST['nume']);
    $telefon = htmlspecialchars($_POST['telefon']);
    
    $livrare = $_POST['livrare'] ?? 'nedefinit';
    $plata = $_POST['plata'] ?? 'nedefinit';
    
    $judet = htmlspecialchars($_POST['judet']);
    $localitate = htmlspecialchars($_POST['localitate']);
    $adresa_text = htmlspecialchars($_POST['adresa']);
    $adresa_completa = "Jud. $judet, Loc. $localitate, $adresa_text";

    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;

    $sql = "INSERT INTO comenzi (user_id, nume, prenume, email, telefon, adresa, metoda_livrare, metoda_plata) 
            VALUES (:user_id, :nume, :prenume, :email, :telefon, :adresa, :livrare, :plata)";
            
    $stmt = $pdo->prepare($sql);
    
    try {
        $stmt->execute([
            'user_id' => $user_id,
            'nume' => $nume,
            'prenume' => $prenume,
            'email' => $email,
            'telefon' => $telefon,
            'adresa' => $adresa_completa,
            'livrare' => $livrare,
            'plata' => $plata
        ]);

        ?>
        <!DOCTYPE html>
        <html lang="ro">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Comandă Plasată</title>
            <link rel="stylesheet" href="style.css">
            <style>
                .success-container { text-align: center; padding: 50px; }
                .success-icon { font-size: 50px; color: green; }
            </style>
        </head>
        <body>
            <div class="top-bar"><div class="container"><a href="main.php" style="color: inherit; text-decoration: none;">Înapoi la site</a></div></div>
            
            <div class="success-container">
                <div class="success-icon">✔</div>
                <h1>Mulțumim pentru comandă!</h1>
                <p>Datele tale au fost înregistrate cu succes.</p>
                <p>Vei fi contactat în curând la numărul <?php echo $telefon; ?> pentru confirmare.</p>
                
                <a href="main.php" class="cart-checkout-button" style="display:inline-block; width:auto; margin-top:20px; text-decoration: none;">Înapoi la cumpărături</a>
            </div>

            <script>
                localStorage.removeItem('shoppingCart');
            </script>
        </body>
        </html>
        <?php
        
    } catch (PDOException $e) {
        echo "Eroare la plasarea comenzii: " . $e->getMessage();
    }
} else {

    header("Location: main.php");
    exit();
}
?>