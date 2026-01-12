<?php
// logout.php
session_start();
session_unset();
session_destroy();
// După deconectare, ne întoarcem pe pagina principală (care acum va fi .php)
header("Location: main.php");
exit();
?>