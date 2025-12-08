<?php
// Fișier: studenti/db.php

$host = 'mysql';      // Numele serviciului din docker-compose
$db   = 'studenti';   // Numele bazei de date
$user = 'user';       // Userul definit
$pass = 'password';   // Parola definită
$port = 3306;         // PORTUL INTERN (Important: aici folosim 3306, nu 3307)
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Afișăm eroarea pe ecran doar pentru testare
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>