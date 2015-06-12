-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `astroDB` ;
-- -----------------------------------------------------
-- Schema astroDB
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `astroDB` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `astroDB` ;

-- -----------------------------------------------------
-- Table `astroDB`.`EstadoUsuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `astroDB`.`EstadoUsuario` (
  `idEstado` INT NOT NULL AUTO_INCREMENT,
  `estado` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`idEstado`))
ENGINE = InnoDB;


-- Tipo de Usuarios


CREATE TABLE IF NOT EXISTS `astroDB`.`TipoUsuario` (
  `idTipoUsuario` INT NOT NULL,
  `tipo` VARCHAR(45) NULL,
  PRIMARY KEY (`idTipoUsuario`),
  UNIQUE INDEX `tipo_UNIQUE` (`tipo` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `astroDB`.`Usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `astroDB`.`Usuarios` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `apellido1` VARCHAR(45) NULL,
  `apellido2` VARCHAR(45) NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(150) NOT NULL,
  `password` VARCHAR(64) NOT NULL,
  `genero` CHAR(1) NULL,
  `fk_idEstado` INT NOT NULL,
  `fk_idTipoUsuario` INT NOT NULL DEFAULT 1,
  PRIMARY KEY (`idUsuario`),
  INDEX `fk_Usuarios_EstadoUsuario_idx` (`fk_idEstado` ASC),
  CONSTRAINT `fk_Usuarios_EstadoUsuario`
    FOREIGN KEY (`fk_idEstado`)
    REFERENCES `astroDB`.`EstadoUsuario` (`idEstado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    CONSTRAINT `FK_idTipoUsuarioXTipoUsuario`
    FOREIGN KEY (`fk_idTipoUsuario`)
    REFERENCES `astroDB`.`TipoUsuario` (`idTipoUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `astroDB`.`Galerias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `astroDB`.`Galerias` (
  `idGaleria` INT NOT NULL AUTO_INCREMENT,
  `fecha` DATETIME NOT NULL,
  `titulo` VARCHAR(100) NULL,
  `descripcion` VARCHAR(300) NULL,
  PRIMARY KEY (`idGaleria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `astroDB`.`EstadoEvento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `astroDB`.`EstadoEvento` (
  `idEstado` INT NOT NULL AUTO_INCREMENT,
  `estado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idEstado`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `astroDB`.`Eventos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `astroDB`.`Eventos` (
  `idEvento` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(100) NOT NULL,
  `fecha` DATETIME NOT NULL,
  `descripcion` VARCHAR(200) NOT NULL,
  `fk_idGaleria` INT NULL,
  `fk_idEstado` INT NOT NULL,
  PRIMARY KEY (`idEvento`),
  INDEX `fk_Eventos_Galerias1_idx` (`fk_idGaleria` ASC),
  INDEX `fk_Eventos_EstadoEvento1_idx` (`fk_idEstado` ASC),
  CONSTRAINT `fk_Eventos_Galerias1`
    FOREIGN KEY (`fk_idGaleria`)
    REFERENCES `astroDB`.`Galerias` (`idGaleria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Eventos_EstadoEvento1`
    FOREIGN KEY (`fk_idEstado`)
    REFERENCES `astroDB`.`EstadoEvento` (`idEstado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `astroDB`.`EstadoPublicacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `astroDB`.`EstadoPublicacion` (
  `idEstado` INT NOT NULL AUTO_INCREMENT,
  `estado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idEstado`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `astroDB`.`TiposArchivo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `astroDB`.`TiposArchivo` (
  `idTipoArchivo` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`idTipoArchivo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `astroDB`.`EstadoArchivo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `astroDB`.`EstadoArchivo` (
  `idEstado` INT NOT NULL AUTO_INCREMENT,
  `estado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idEstado`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `astroDB`.`ArchivosAdjunto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `astroDB`.`ArchivosAdjunto` (
  `idArchivo` INT NOT NULL AUTO_INCREMENT,
  `url` VARCHAR(200) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  `fk_idTipoArchivo` INT NOT NULL,
  `fk_idEstado` INT NOT NULL,
  PRIMARY KEY (`idArchivo`),
  INDEX `fk_ArchivosAdjunto_TiposArchivo1_idx` (`fk_idTipoArchivo` ASC),
  INDEX `fk_ArchivosAdjunto_EstadoArchivo1_idx` (`fk_idEstado` ASC),
  CONSTRAINT `fk_ArchivosAdjunto_TiposArchivo1`
    FOREIGN KEY (`fk_idTipoArchivo`)
    REFERENCES `astroDB`.`TiposArchivo` (`idTipoArchivo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ArchivosAdjunto_EstadoArchivo1`
    FOREIGN KEY (`fk_idEstado`)
    REFERENCES `astroDB`.`EstadoArchivo` (`idEstado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `astroDB`.`Publicaciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `astroDB`.`Publicaciones` (
  `idPublicacion` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NOT NULL,
  `contenido` LONGTEXT NOT NULL,
  `fecha` DATETIME NOT NULL,
  `fk_idEstado` INT NOT NULL,
  `fk_idArchivo` INT NOT NULL,
  PRIMARY KEY (`idPublicacion`),
  INDEX `fk_Publicaciones_EstadoPublicacion1_idx` (`fk_idEstado` ASC),
  INDEX `fk_Publicaciones_ArchivosAdjunto1_idx` (`fk_idArchivo` ASC),
  CONSTRAINT `fk_Publicaciones_EstadoPublicacion1`
    FOREIGN KEY (`fk_idEstado`)
    REFERENCES `astroDB`.`EstadoPublicacion` (`idEstado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Publicaciones_ArchivosAdjunto1`
    FOREIGN KEY (`fk_idArchivo`)
    REFERENCES `astroDB`.`ArchivosAdjunto` (`idArchivo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `astroDB`.`Fotos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `astroDB`.`Fotos` (
  `idFoto` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(300) NULL,
  `titulo` VARCHAR(100) NULL,
  `fk_idArchivo` INT NOT NULL,
  PRIMARY KEY (`idFoto`),
  INDEX `fk_Fotos_ArchivosAdjunto1_idx` (`fk_idArchivo` ASC),
  CONSTRAINT `fk_Fotos_ArchivosAdjunto1`
    FOREIGN KEY (`fk_idArchivo`)
    REFERENCES `astroDB`.`ArchivosAdjunto` (`idArchivo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `astroDB`.`Rankings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `astroDB`.`Rankings` (
  `idRanking` INT NOT NULL AUTO_INCREMENT,
  `fecha` DATETIME NOT NULL,
  `calificacion` DECIMAL NOT NULL,
  `fk_idUsuario` INT NOT NULL,
  `fk_idFoto` INT NOT NULL,
  PRIMARY KEY (`idRanking`),
  INDEX `fk_Rankings_Usuarios1_idx` (`fk_idUsuario` ASC),
  INDEX `fk_Rankings_Fotos1_idx` (`fk_idFoto` ASC),
  CONSTRAINT `fk_Rankings_Usuarios1`
    FOREIGN KEY (`fk_idUsuario`)
    REFERENCES `astroDB`.`Usuarios` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Rankings_Fotos1`
    FOREIGN KEY (`fk_idFoto`)
    REFERENCES `astroDB`.`Fotos` (`idFoto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `astroDB`.`Tags`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `astroDB`.`Tags` (
  `idTag` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTag`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astroDB`.`DatosCuriosos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `astroDB`.`DatosCuriosos` (
  `idDatoCurioso` INT NOT NULL AUTO_INCREMENT,
  `contenido` MEDIUMTEXT NOT NULL,
  `fecha` DATETIME NOT NULL,
  PRIMARY KEY (`idDatoCurioso`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `astroDB`.`FotosXGaleria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `astroDB`.`FotosXGaleria` (
  `fk_idGaleria` INT NOT NULL,
  `fk_idFoto` INT NOT NULL,
  INDEX `fk_ArchivoXGaleria_Galerias1_idx` (`fk_idGaleria` ASC),
  INDEX `fk_FotosXGaleria_Fotos1_idx` (`fk_idFoto` ASC),
  CONSTRAINT `fk_ArchivoXGaleria_Galerias1`
    FOREIGN KEY (`fk_idGaleria`)
    REFERENCES `astroDB`.`Galerias` (`idGaleria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FotosXGaleria_Fotos1`
    FOREIGN KEY (`fk_idFoto`)
    REFERENCES `astroDB`.`Fotos` (`idFoto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `astroDB`.`TagsXPublicacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `astroDB`.`TagsXPublicacion` (
  `fk_idPublicacion` INT NOT NULL,
  `fk_idTag` INT NOT NULL,
  INDEX `fk_TagsXPublicacion_Publicaciones1_idx` (`fk_idPublicacion` ASC),
  INDEX `fk_TagsXPublicacion_Tags1_idx` (`fk_idTag` ASC),
  CONSTRAINT `fk_TagsXPublicacion_Publicaciones1`
    FOREIGN KEY (`fk_idPublicacion`)
    REFERENCES `astroDB`.`Publicaciones` (`idPublicacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TagsXPublicacion_Tags1`
    FOREIGN KEY (`fk_idTag`)
    REFERENCES `astroDB`.`Tags` (`idTag`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `astroDB` ;

-- -----------------------------------------------------
-- Table `astroDB`.`EstadoComentario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `astroDB`.`EstadoComentario` (
  `idEstado` INT NOT NULL AUTO_INCREMENT,
  `estado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idEstado`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `astroDB`.`Comentarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `astroDB`.`Comentarios` (
  `idComentario` INT NOT NULL AUTO_INCREMENT,
  `contenido` MEDIUMTEXT NOT NULL,
  `fecha` DATETIME NOT NULL,
  `fk_idEstado` INT NOT NULL,
  `fk_idUsuario` INT NOT NULL,
  PRIMARY KEY (`idComentario`),
  INDEX `fk_Comentarios_EstadoComentario_idx` (`fk_idEstado` ASC),
  INDEX `fk_Comentarios_Usuarios1_idx` (`fk_idUsuario` ASC),
  CONSTRAINT `fk_Comentarios_EstadoComentario`
    FOREIGN KEY (`fk_idEstado`)
    REFERENCES `astroDB`.`EstadoComentario` (`idEstado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comentarios_Usuarios1`
    FOREIGN KEY (`fk_idUsuario`)
    REFERENCES `astroDB`.`Usuarios` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `astroDB`.`ComentariosXGaleria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `astroDB`.`ComentariosXGaleria` (
  `fk_idComentario` INT NOT NULL,
  `fk_idGaleria` INT NOT NULL,
  INDEX `fk_ComentariosXGaleria_Comentarios1_idx` (`fk_idComentario` ASC),
  INDEX `fk_ComentariosXGaleria_Galerias1_idx` (`fk_idGaleria` ASC),
  CONSTRAINT `fk_ComentariosXGaleria_Comentarios1`
    FOREIGN KEY (`fk_idComentario`)
    REFERENCES `astroDB`.`Comentarios` (`idComentario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ComentariosXGaleria_Galerias1`
    FOREIGN KEY (`fk_idGaleria`)
    REFERENCES `astroDB`.`Galerias` (`idGaleria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `astroDB`.`ComentariosXPublicacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `astroDB`.`ComentariosXPublicacion` (
  `fk_idComentario` INT NOT NULL,
  `fk_idPublicacion` INT NOT NULL,
  INDEX `fk_ComentariosXPublicacion_Comentarios1_idx` (`fk_idComentario` ASC),
  INDEX `fk_ComentariosXPublicacion_Publicaciones1_idx` (`fk_idPublicacion` ASC),
  CONSTRAINT `fk_ComentariosXPublicacion_Comentarios1`
    FOREIGN KEY (`fk_idComentario`)
    REFERENCES `astroDB`.`Comentarios` (`idComentario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ComentariosXPublicacion_Publicaciones1`
    FOREIGN KEY (`fk_idPublicacion`)
    REFERENCES `astroDB`.`Publicaciones` (`idPublicacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `astroDB`.`ComentariosXFoto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `astroDB`.`ComentariosXFoto` (
  `fk_idComentario` INT NOT NULL,
  `fk_idFoto` INT NOT NULL,
  INDEX `fk_ComentariosXFoto_Comentarios1_idx` (`fk_idComentario` ASC),
  INDEX `fk_ComentariosXFoto_Fotos1_idx` (`fk_idFoto` ASC),
  CONSTRAINT `fk_ComentariosXFoto_Comentarios1`
    FOREIGN KEY (`fk_idComentario`)
    REFERENCES `astroDB`.`Comentarios` (`idComentario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ComentariosXFoto_Fotos1`
    FOREIGN KEY (`fk_idFoto`)
    REFERENCES `astroDB`.`Fotos` (`idFoto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `astroDB`.`Faqs` (
  `idFaq` INT NOT NULL AUTO_INCREMENT,
  `faq` VARCHAR(100) NOT NULL,
  `respuesta` VARCHAR(300) NOT NULL,
  PRIMARY KEY (`idFaq`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `astrodb`.`Messages` (
  `idMessages` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(90) NOT NULL,
  `Email` VARCHAR(100) NOT NULL,
  `Title` VARCHAR(120) NOT NULL,
  `Message` TEXT NOT NULL,
  PRIMARY KEY (`idMessages`))
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
