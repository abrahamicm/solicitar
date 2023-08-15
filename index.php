<?php include_once 'layouts/header.php'; ?>

<?php
// Mostrar mensaje de éxito si se envió correctamente
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo '<div class="alert alert-success" role="alert">Solicitud guardada exitosamente.</div>';
}

// Mostrar mensaje de error si ocurrió un error
if (isset($_GET['error'])) {
    echo '<div class="alert alert-danger" role="alert">Error al guardar la solicitud: ' . $_GET['error'] . '</div>';
}
?>
<div class="container mt-5">
    <h1 class="text-center">Solicitud de cita</h1>
    <form action="server/guardar.php" method="post">
        <div class="form-group">
            <label for="nombre">Nombre completo:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="pais">Numero telefonico:</label>
            <input type="text" class="form-control" id="pais" name="pais" required>
        </div>
        <div class="form-group">
            <label for="nombre">Correo electronico:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="motivo">Motivo de la visita:</label>
            <textarea class="form-control" id="motivo" name="motivo" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar Solicitud</button>
    </form>
</div>

<?php include_once 'layouts/footer.php'; ?>