 -- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS solicitudes;

-- Seleccionar la base de datos
USE solicitudes;

-- Tabla de usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(255) NOT NULL,
    contrasenia VARCHAR(255) NOT NULL
);

-- Tabla de solicitudes
CREATE TABLE IF NOT EXISTS solicitudes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    pais VARCHAR(100) NOT NULL,
    motivo TEXT NOT NULL
);

-- Insertar un usuario en la tabla usuarios
INSERT INTO usuarios (usuario, contrasenia)
VALUES ('admin', '123456');