<?php
session_start();
include_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['usuario'])) {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $motivo = $_POST['motivo'];

    $query = "INSERT INTO solicitudes (nombre, telefono, motivo, correo) VALUES ('$nombre', '$telefono', '$correo', '$motivo')";

    if ($conn->query($query) === TRUE) {
        // Redirigir a la misma página con un mensaje de éxito
        header('Location: ' . '../index.php' . '?success=1');
        exit();
    } else {
        // Redirigir a la misma página con un mensaje de error
        header('Location: ' . '../index.php' . '?error=' . urlencode($conn->error));
        exit();
    }
}
