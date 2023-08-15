<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Destruir todas las variables de sesión
session_unset();
session_destroy();

// Redirigir a la página de inicio de sesión (o a otra página)
header('Location: ../login.php');
exit();
?>
