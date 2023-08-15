<?php
include_once 'db.php';

// Obtener las solicitudes de la base de datos
$query = "SELECT * FROM solicitudes";
$result = $conn->query($query);

$solicitudes = array();

while ($row = $result->fetch_assoc()) {
    $solicitudes[] = $row;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
