<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];

    $query = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasenia = '$contrasenia'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        // Inicio de sesión exitoso
        $_SESSION['usuario'] = $usuario;
        header('Location: ../dashboard.php'); // Redirigir al dashboard u otra página
    } else {
        // Inicio de sesión fallido
        header('Location: ../login.php?error=1'); // Redirigir al formulario de inicio de sesión con mensaje de error
    }
}
?>
