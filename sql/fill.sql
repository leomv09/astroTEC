USE `astroDB` ;

INSERT INTO EstadoUsuario (idEstado, estado) VALUES
(1, 'activo'),
(2, 'inactivo'),
(3, 'bloqueado');

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

INSERT INTO Usuarios (nombre, apellido1, apellido2, genero, correo, password, fk_idEstado) VALUES
('Administrador', NULL, NULL, 'M', 'admin@example.com', SHA2('123', 256), 1),
('Jhon', 'Doe', NULL, 'M', 'jhondoe@example.com', SHA2('abc', 256), 1);

INSERT INTO estadodatocurioso (estado) VALUES
('Valido'),
('Deshabilitado');

INSERT INTO datoscuriosos (contenido,fecha,fk_idEstado) values
('La Vía Láctea tiene un agujero negro con una masa equivalente a 40 000 soles', '2015-05-23',1);

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
(1, 'Jueves Astronómico 12', '2015-05-21 18:00:00', 'HOME, un filme dirigido por Yann Arthus Bertrand. Lugar: Salón Multiusos de la Escuela de Física', 1, 1);

INSERT INTO Faqs (faq,respuesta) VALUES 
('¿Qué son los Jueves Astronómicos?','Todos los Jueves tenemos reuniones donde exploramos la complejidad del cosmos. Estos son los Jueves Astronómicos.'),
('¿Necesito inscribirme?','No necesitas ser un miembro formal para participar en nuestra actividades.'),
('¿De qué temas hablan?','Hablamos de temas relacionados con la física de los cuerpos celestes, los recientes descubrimientos en el cosmos, y mucho más.');