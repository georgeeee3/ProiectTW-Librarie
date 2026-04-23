<?php
require 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $parola = $_POST['parola'];

    $sql = "SELECT * FROM utilizatori WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    if ($user && password_verify($parola, $user['parola'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nume'] = $user['nume'];
        $_SESSION['prenume'] = $user['prenume'];
        $_SESSION['email'] = $user['email'];

        header("Location: main.php"); 
        exit();
    } else {
        echo "<script>
            alert('Email sau parolă incorectă!');
            window.location.href = 'account.html';
        </script>";
        exit();
    }
}
?>