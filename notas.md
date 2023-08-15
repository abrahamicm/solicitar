# promts
quiero hacer una aplicacion php que tenga un login sencillo, usando bootstrap 4.5.2
va a tener 3 vistas
- index
- login
- dasbooard

en el index los usuarios podran hacer solicitudes de visas
aqui la base de datos

-- Tabla de solicitudes
CREATE TABLE IF NOT EXISTS solicitudes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    pais VARCHAR(100) NOT NULL,
    motivo TEXT NOT NULL,
);

- en el dasbord se pueden listar todas las solicitudes para usarios logueados


tengpo una carpeta server donde quiero poner la logica de las cosas alli

 hasta ahorita tengo
 server/config.php
 <?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'password');
define('DB_NAME', 'solicitud');

?>

server/db.php
 <?php
include_once '../config.php';
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

esta es mi tabla de usuarios
-- Tabla de usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(255) NOT NULL,
    contrasenia VARCHAR(255) NOT NULL
);

------

quiero implementar un sistema de layouts por ejemplo

layouts
    headers.php
    footer.php
    menu.php

tengo mi formulario login

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

de alli tengo que crear mi archivo server/login  para que compruebe la los datos y cree la sesion