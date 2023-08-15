<?php include_once 'layouts/header.php'; ?>
<div class="container mt-5">
        <h2>Iniciar Sesión</h2>
        <form action="server/login.php" method="post">
            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="text" class="form-control" id="usuario" name="usuario" required>
            </div>
            <div class="form-group">
                <label for="contrasenia">Contraseña:</label>
                <input type="password" class="form-control" id="contrasenia" name="contrasenia" required>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>
    </div>
<?php include_once 'layouts/footer.php'; ?>