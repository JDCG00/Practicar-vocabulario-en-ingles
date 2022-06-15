/* Juan Diego Carretero Granado - Script para la inserción de datos para probar la aplicación de palabras en inglés */

USE VocabularioIngles;

/* Datos de prueba en la tabla usuarios */

INSERT INTO usuarios(nombre, correo, password, tipo) 
    VALUES('Admin', 'admin@admin.com', '$2y$10$YhT7EZHpUo3NWAARsugxu.1QV90s5TkoVHwWulfQE3V3nICSjDz0W', 'a'),  /* contraseña: admin */
            ('Manuel', 'manuel@guadalupe.es', '$2y$10$zyX58qdkUABa70eAPyRx5OfjnLrY3Ht20AESivRxRO0GsVjzN53Ra', 'p'), /* contraseña: 1234 */
            ('Juan', 'juan@guadalupe.es', '$2y$10$zyX58qdkUABa70eAPyRx5OfjnLrY3Ht20AESivRxRO0GsVjzN53Ra', 'p'),  /* contraseña: 1234 */
            ('Pepe', 'pepe@guadalupe.es', '$2y$10$zyX58qdkUABa70eAPyRx5OfjnLrY3Ht20AESivRxRO0GsVjzN53Ra', 'p');  /* contraseña: 1234 */
 
/* Datos de prueba en la tabla clases */

INSERT INTO clases(nombre)
    VALUES('1DAW'),
            ('2DAW'),
            ('1SMR'),
            ('2SMR'),
            ('4ESO');

/* Datos de prueba en la tabla ejercicios */

INSERT INTO ejercicios(nombre, descripcion, tipo, idClase, codEjercicio)
    VALUES('Clasifica estas palabras', 'Tienes que relacionar cada palabra con su categoría correspondiente, puede que haya palabras que no tengan categoría.', 'c', 1, 'AC7612'),
            ('Escucha las palabras', NULL, 'l', 1, 'AC761s'),
            ('Clasifica según su color', NULL, 'c', 1, 'AC5x1L'),
            ('Escucha las palabras y escribe', 'Escucha las palabras y escribelas en el recuadro', 'l', 1, 'CC761x');

/* Datos de prueba en la tabla categorías */

INSERT INTO categorias(nombre)
    VALUES('Colors'),
            ('Animals'),
            ('School'),
            ('Weather'),
            ('Computer Science');

/* Datos de prueba en la tabla palabras */

INSERT INTO palabras(nombre, idCategoria)
    VALUES('Ant',2),
            ('Antelope',2),
            ('Baboon',2),
            ('Bat',2),
            ('Beagle',2),
            ('Bear',2),
            ('Bird',2),
            ('Butterfly',2),
            ('Cat',2),
            ('Caterpillar',2),
            ('Chicken',2),
            ('Cow',2),
            ('Dog',2),
            ('mouse(animal)',2),
            ('Dolphin',2),
            ('Donkey',2),
            ('Eagle',2),
            ('Fish',2),
            ('Fly',2),
            ('Fox',2),
            ('Frog',2),
            ('black',1),
            ('silver',1),
            ('gray',1),	
            ('white',1),	
            ('maroon',1),
            ('red',1),
            ('purple',1),	
            ('fuchsia',1),	
            ('green',1),	
            ('lime',1),	
            ('olive',1),	
            ('yellow',1),	
            ('navy',1),	
            ('blue',1),
            ('teal',1),	
            ('aqua',1),
            ('mouse(computer)',5),
            ('monitor',5),
            ('keyboard',5),
            ('screen',5),
            ('ethernet wire',5),
            ('WIFI',5),
            ('software',5),
            ('snowy', 4),
            ('windy', 4),
            ('rainy', 4),
            ('sunny', 4),
            ('cloudy', 4),
            ('teacher', 3),
            ('table', 3),
            ('board', 3),
            ('eraser', 3),
            ('pencil', 3),
            ('pencil case', 3);

/* Datos de prueba en la tabla usuarios_clases */

INSERT INTO usuarios_clases 
    VALUES(2, 1),
            (2, 2),
            (3, 3),
            (4, 4),
            (4, 5),
            (3, 1),
            (2, 5);

/* Datos de prueba en la tabla ejercicios_palabras */

INSERT INTO ejercicios_palabras
    VALUES(1, 1),
            (1, 2),
            (1, 3),
            (1, 4),
            (1, 5),
            (1, 6),
            (1, 7),
            (1, 8),
            (1, 9),
            (2, 10),
            (2, 11),
            (2, 12),
            (2, 13),
            (2, 14),
            (2, 15),
            (2, 16),
            (2, 17),
            (2, 18),
            (2, 19),
            (2, 20),
            (3, 20),
            (3, 21),
            (3, 22),
            (3, 23),
            (3, 24),
            (3, 25),
            (3, 26),
            (3, 27),
            (3, 28),
            (3, 29),
            (3, 30),
            (3, 31);