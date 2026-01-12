<?php
require 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $parola = $_POST['parola'];

    // Căutăm utilizatorul
    $sql = "SELECT * FROM utilizatori WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    // Verificăm parola criptată
    if ($user && password_verify($parola, $user['parola'])) {
        // LOGARE REUȘITĂ
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nume'] = $user['nume'];
        $_SESSION['prenume'] = $user['prenume'];
        $_SESSION['email'] = $user['email'];

        // Redirecționare către pagina principală (.PHP acum)
        header("Location: main.php"); 
        exit();
    } else {
        // EROARE - POPUP ȘI ÎNAPOI
        echo "<script>
            alert('Email sau parolă incorectă!');
            window.location.href = 'account.html';
        </script>";
        exit();
    }
}
?>