<?php
$host = 'mysql';     
$user = 'user';
$pass = 'password';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    
    echo "<h2>Conexiune reușită! Iată lista studenților:</h2>";

    $stmt = $pdo->query("SELECT id, nume, email, varsta FROM users");
    
    echo "<table border='1' cellpadding='10' style='border-collapse: collapse; width: 50%; text-align: left;'>";
    echo "<tr style='background-color: #f2f2f2;'>
            <th>ID</th>
            <th>Nume</th>
            <th>Email</th>
            <th>Vârstă</th>
          </tr>";
    
    while ($row = $stmt->fetch()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nume']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td>" . htmlspecialchars($row['varsta']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";

} catch (\PDOException $e) {
    echo "Eroare conexiune: " . $e->getMessage();
}
?>