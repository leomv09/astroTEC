USE `astroDB` ;

DELETE FROM ComentariosXPublicacion;
DELETE FROM Comentarios;
DELETE FROM Publicaciones;
DELETE FROM Faqs;
DELETE FROM Eventos;
DELETE FROM FotosXGaleria;
DELETE FROM Galerias;
DELETE FROM Fotos;
DELETE FROM Usuarios;
DELETE FROM ArchivosAdjunto;
DELETE FROM DatosCuriosos;
DELETE FROM EstadoComentario;
DELETE FROM EstadoArchivo;
DELETE FROM TiposArchivo;
DELETE FROM EstadoEvento;
DELETE FROM TipoUsuario;
DELETE FROM EstadoUsuario;

INSERT INTO EstadoUsuario (idEstado, estado) VALUES
(1, 'activo'),
(2, 'inactivo'),
(3, 'bloqueado');

INSERT INTO TipoUsuario (idTipoUsuario, tipo) VALUES
(1, 'normal'),
(2, 'administrador');

INSERT INTO EstadoEvento (idEstado, estado) VALUES
(1, 'por iniciar'),
(2, 'finalizado'),
(3, 'cancelado');

INSERT INTO TiposArchivo (idTipoArchivo, nombre) VALUES
(1, 'Audio'),
(2, 'Video'),
(3, 'Documento'),
(4, 'Imagen'),
(5, 'Otros');

INSERT INTO EstadoArchivo (idEstado, estado) VALUES
(1, 'activo'),
(2, 'eliminado'),
(3, 'bloqueado');

INSERT INTO EstadoComentario (idEstado, estado) VALUES
(1, 'activo'),
(2, 'eliminado'),
(3, 'bloqueado');

INSERT INTO Usuarios (idUsuario, nombre, apellido1, apellido2, genero, correo, password, fk_idEstado, fk_idTipoUsuario) VALUES
(1, 'Administrador', NULL, NULL, 'M', 'admin@example.com', SHA2('123', 256), 1, 2),
(2, 'Jhon', 'Doe', NULL, 'M', 'jhondoe@example.com', SHA2('abc', 256), 1, 1);

INSERT INTO DatosCuriosos (titulo, contenido,fecha) values
('La Vía Láctea','La Vía Láctea tiene un agujero negro con una masa equivalente a 40 000 soles', '2015-05-23'),
('La distancia y percepción','A diferencia de Mercurio y Venus que presentan fases, los demás planetas siempre se ven “llenos” desde la tierra. Ello se debe a que al estar más lejos del Sol que la tierra, siempre se ve todo el disco.', '2015-03-29'),
('Mancha roja de Júpiter','La gran mancha roja de Júpiter es un inmenso huracán que se ha mantenido por al menos 3 siglos y que podría englobar 2 veces a la tierra. Siguen siendo un misterio su origen, su color, su tamaño y su persistencia.', '2015-05-02'),
('Cañón en Marte','Marte tiene un cañón cerca del ecuador de 4,000 km de largo, hasta 600 km de ancho y 10 km de profundidad.� Esto es 30 veces mayor al Gran Cañón del Colorado.', '2015-04-12'),
('Invierno y Verano','Contrariamente a lo que podría pensarse, la tierra está más cerca del sol en invierno que en verano, en el hemisferio norte. En el hemisferio sur ocurre lo contrario, por lo que el verano debe ser ligeramente más caliente y el invierno ligeramente más frío.', '2015-06-24');

INSERT INTO ArchivosAdjunto (idArchivo, url, nombre, descripcion, fk_idTipoArchivo, fk_idEstado) VALUES
(1, 'img/Galerias/1/grupo.jpg', 'Grupo astroTEC', NULL, 4, 1),
(2, 'img/Galerias/1/logoAT.jpg', 'Logo astroTEC', NULL, 4, 1),
(3, 'img/Galerias/1/space.jpg', 'Imagen de nebulosa', NULL, 4, 1),
(4, 'img/Galerias/1/stars.jpg', 'Estrellas', NULL, 4, 1),
(5, 'img/Galerias/1/telescope.jpg', 'Telescopio', NULL, 4, 1);

INSERT INTO Fotos (idFoto, titulo, descripcion, fk_idArchivo) VALUES
(1, 'Participantes AstroTEC', 'Esta foto fue tomada en las primeros Jueves Astronómicos.', 1),
(2, 'Nuestro Logo', 'El logo oficial de AstroTEC fue propuesto por un estudiante de Diseño Industrial.', 2),
(3, 'Nebulosa XT215', 'Conocida entre los astrónomos, fue una de las primeras en ser descubiertas.', 3),
(4, 'Noche estrellada', 'Logramos capturar estas constelaciones en Guanacaste.', 4),
(5, 'Telescopio', 'Uno de los mejores telescopios en todo el país nos permite tener una mejor visión del cosmos.', 5);

INSERT INTO Galerias (idGaleria, fecha, titulo, descripcion) VALUES
(1, '2015-05-24 12:45:34', 'Galería de prueba', NULL);

INSERT INTO FotosXGaleria (fk_idGaleria, fk_idFoto) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5);

INSERT INTO Eventos (idEvento, titulo, fecha, descripcion, fk_idGaleria, fk_idEstado) VALUES
(1, 'Jueves Astronómico 12', '2015-07-21 18:00:00', 'HOME, un filme dirigido por Yann Arthus Bertrand. Lugar: Salón Multiusos de la Escuela de Física', 1, 1),
(2, 'Observando la lluvia de meteoros', '2015-08-01 22:30:00', "", NULL, 1),
(3, 'Charla: Agujeros Negros', '2015-06-27 11:30:00', "", NULL, 1),
(4, 'Conversatorio: Polvo estelar', '2015-07-03 2:00:00', "", NULL, 1),
(5, 'Película: Interstellar', '2015-07-10 18:00:00', "", NULL, 1);

INSERT INTO Faqs (faq,respuesta) VALUES
('¿Qué son los Jueves Astronómicos?','Todos los Jueves tenemos reuniones donde exploramos la complejidad del cosmos. Estos son los Jueves Astronómicos.'),
('¿Necesito inscribirme?','No necesitas ser un miembro formal para participar en nuestra actividades.'),
('¿De qué temas hablan?','Hablamos de temas relacionados con la física de los cuerpos celestes, los recientes descubrimientos en el cosmos, y mucho más.');

INSERT INTO Publicaciones (idPublicacion, fk_idCreador, titulo, contenido, fecha) VALUES
(1, 2, 'LightSail Test Mission Ends with Fiery Reentry', 'The last time LightSail checked in was Wednesday, June 10 at 11:29 p.m. EDT. The corresponding beacon packet, which turned out to be the missions last, displayed a real-time clock value of 1,837,416 seconds—21 days since launch on May 20. The gyroscopes, which were able to capture snapshots of the spacecraft’s tumble rate after every reboot, showed LightSail tumbling at 6.7, 2.4, and 0.3 degrees per second about its X, Y and Z axes. The Z-axis runs lengthwise through the oblong CubeSat; if LightSail were a gigantic top with its sails parallel to the floor, it was hardly spinning at all.', NOW()),
(2, 2, 'In Pictures: LightSails Final Days in Space', 'The engineering team has been sending the spacecraft reboot commands, with no success thus far. Tyvak Nano-Satellite Systems, the radio manufacturer, reports they have never seen this behavior. Neither has Cal Poly San Luis Obispo, despite their lengthy experience with CubeSats over the years. Troubleshooting and ground testing to recreate the problem continues. Radio and astronomy observers around the world have been following LightSail closely. With just a couple days left before the mission ends, now seems like a good time to showcase a few photos and videos we’ve received of LightSail in Earth orbit. Most of these have been verified by an additional source to ensure accuracy.', NOW()),
(3, 2, 'Tonight I Glimpsed LightSail', 'Tonight was the first time it was high enough above horizon (41ᵒ) and clear enough. It came out about 20 seconds later than I expected. But there it was. I know that by the time most of you read this, LightSail-A will probably have been incinerated in the atmosphere. That is and was the plan for this test flight. My few moments alone on the roof tonight with our LightSail spacecraft silently crossing the sky were very gratifying.', NOW());

INSERT INTO Comentarios (idComentario, contenido, fecha, fk_idEstado, fk_idUsuario) VALUES
(1, 'Interesante', NOW(), 1, 2),
(2, 'Wow', NOW(), 1, 2),
(3, 'Awesome', NOW(), 1, 2),
(4, 'wow wow wow', NOW(), 1, 2),
(5, ':D', NOW(), 1, 2),
(6, 'D:', NOW(), 1, 2);

INSERT INTO ComentariosXPublicacion (fk_idComentario, fk_idPublicacion) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 2),
(5, 3),
(6, 3);