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

?>

    <h2>Bienvenido, <?php echo $_SESSION["usuario"]; ?></h2>
    
 <?php   include_once 'server/listar.php';?>
 <table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>telefono</th>
            <th>Correo</th>
            <th>Motivo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($solicitudes as $solicitud) { ?>
            <tr>
                <td><?php echo $solicitud['id']; ?></td>
                <td><?php echo $solicitud['nombre']; ?></td>
                <td><?php echo $solicitud['telefono']; ?></td>
                <td><?php echo $solicitud['correo']; ?></td>
                <td><?php echo $solicitud['motivo']; ?></td>
                <td>
                    <a href="editar.php?solicitud_id=<?php echo $solicitud['id']; ?>" class="btn btn-primary">Editar</a>
                    <a href="pdf.php?solicitud_id=<?php echo $solicitud['id']; ?>" class="btn btn-info" target="_blank">Ver</a>
                    <form action="server/eliminar.php" method="post" style="display: inline;">
                        <input type="hidden" name="solicitud_id" value="<?php echo $solicitud['id']; ?>">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta solicitud?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php include_once 'layouts/footer.php'; ?>