/* Juan Diego Carretero Granado - Script para crear la base de datos de la aplicación de palabras en inglés */

/* Creación de la base de datos */

CREATE DATABASE VocabularioIngles;

USE VocabularioIngles;

/* Creación de las tablas */

CREATE TABLE usuarios(
    idUsuario INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(120) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    tipo CHAR(1) CHECK(tipo IN ('a', 'p'))
);
CREATE TABLE clases(
    idClase SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nombre VARCHAR(10) UNIQUE NOT NULL
);
CREATE TABLE ejercicios(
    idEjercicio INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nombre VARCHAR(120) NOT NULL, 
    descripcion VARCHAR(300) NULL,
    tipo CHAR(1) NOT NULL CHECK (tipo IN ('l', 'c')),
    fechaHora DATETIME NOT NULL DEFAULT NOW(),
    idClase SMALLINT UNSIGNED NOT NULL,
    codEjercicio CHAR(6) UNIQUE NOT NULL,    
    CONSTRAINT FK_Clase FOREIGN KEY (idClase) REFERENCES clases(idClase)
);
CREATE TABLE categorias(
    idCategoria SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nombre VARCHAR(100) UNIQUE NOT NULL
);
CREATE TABLE palabras(
    idPalabra INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    idCategoria SMALLINT UNSIGNED NOT NULL,
    CONSTRAINT FK_Categoria FOREIGN KEY (idCategoria) REFERENCES categorias(idCategoria)
);
CREATE TABLE usuarios_clases(
    idUsuario INT UNSIGNED NOT NULL,
    idClase SMALLINT UNSIGNED NOT NULL,
    PRIMARY KEY (idUsuario, idClase),
    CONSTRAINT FK_Usuario FOREIGN KEY (idUsuario) REFERENCES usuarios(idUsuario),
    CONSTRAINT FK_Clase2 FOREIGN KEY (idClase) REFERENCES clases(idClase)
);
CREATE TABLE ejercicios_palabras(
    idEjercicio INT UNSIGNED NOT NULL,
    idPalabra INT UNSIGNED NOT NULL,
    PRIMARY KEY (idEjercicio, idPalabra),
    CONSTRAINT FK_Ejercicio FOREIGN KEY (idEjercicio) REFERENCES ejercicios(idEjercicio),
    CONSTRAINT FK_Palabra FOREIGN KEY (idPalabra) REFERENCES palabras(idPalabra)
);