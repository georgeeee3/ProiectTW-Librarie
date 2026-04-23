<?php
session_start();

$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
session_destroy();
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Deconectare...</title>
</head>
<body>
    <script>

        localStorage.removeItem('savedItems');


        window.location.href = 'main.php';
    </script>
</body>
</html>