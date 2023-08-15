<?php
include_once 'server/config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Verificar si el usuario tiene una sesión iniciada
$sesion_iniciada = isset($_SESSION['usuario']);

// Nombre de usuario (si hay una sesión)
$nombre_usuario = $sesion_iniciada ? $_SESSION['usuario'] : '';
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><?php echo APP_NAME ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Inicio<span class="sr-only">(current)</span></a>
            </li>
            <?php if ($sesion_iniciada) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
            <?php } ?>
            <!-- Agrega aquí más elementos de menú si es necesario -->
        </ul>
        <ul class="navbar-nav">
            <?php if ($sesion_iniciada) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="server/logout.php">Cerrar Sesión</a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Iniciar Sesión</a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>
