CREATE DATABASE hito1;

USE hito1;

-- Crear la tabla de usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    contrasena VARCHAR(255) NOT NULL
);

-- Crear la tabla de entradas del blog
CREATE TABLE entradas (
     id INT AUTO_INCREMENT PRIMARY KEY,
     usuario_id INT NOT NULL,
     titulo VARCHAR(255) NOT NULL,
     contenido TEXT NOT NULL,
     fecha_publicacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
     imagen LONGBLOB,
     FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);
