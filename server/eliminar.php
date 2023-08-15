<?php
include_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['solicitud_id'])) {
    $solicitud_id = $_POST['solicitud_id'];

    $query = "DELETE FROM solicitudes WHERE id = '$solicitud_id'";

    if ($conn->query($query) === TRUE) {
        header('Location: ' . '../dashboard.php' . '?success=1');
    } else {
        header('Location: ' . '../dashboard.php' . '?error=' . urlencode($conn->error));
    }
}

$conn->close();
?>
