<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php'); // Redirigir a la página de inicio de sesión si no está autenticado
    exit();
}

include_once 'layouts/header.php';
include_once 'server/listar.php';

// Obtener el ID de la solicitud de la URL
if (isset($_GET['solicitud_id'])) {
    $solicitud_id = $_GET['solicitud_id'];

    // Buscar la solicitud en el array de solicitudes
    $solicitud = null;
    foreach ($solicitudes as $s) {
        if ($s['id'] == $solicitud_id) {
            $solicitud = $s;
            break;
        }
    }

    if ($solicitud) {
        // Llenar el formulario con los datos de la solicitud a editar
        $nombre = $solicitud['nombre'];
        $telefono = $solicitud['telefono'];
        $correo = $solicitud['correo'];
        $motivo = $solicitud['motivo'];
    } else {
        echo "Solicitud no encontrada.";
    }
} else {
    echo "Solicitud no especificada.";
}
?>

<div class="container mt-5">
    <h1 class="text-center">Editar Solicitud de Visa</h1>
    <form action="server/editar.php" method="post">
        <input type="hidden" name="solicitud_id" value="<?php echo $solicitud_id; ?>">
        <div class="form-group">
            <label for="nombre">Nombre completo:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
        </div>
        <div class="form-group">
            <label for="pais">Numero telefonico:</label>
            <input type="text" class="form-control" id="pais" name="pais" value="<?php echo $telefono; ?>" required>
        </div>
        <div class="form-group">
            <label for="pais">Correo Electronico:</label>
            <input type="text" class="form-control" id="pais" name="pais" value="<?php echo $correo; ?>" required>
        </div>
        <div class="form-group">
            <label for="motivo">Motivo de la visita:</label>
            <textarea class="form-control" id="motivo" name="motivo" rows="4" required><?php echo $motivo; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>

<?php include_once 'layouts/footer.php'; ?>
