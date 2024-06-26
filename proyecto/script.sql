-- MySQL Script generated by MySQL Workbench
-- Tue Jun 18 23:14:27 2024
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema prueba
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema prueba
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `prueba` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ;
USE `prueba` ;

-- -----------------------------------------------------
-- Table `prueba`.`categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prueba`.`categorias` (
                                                     `id` INT NOT NULL AUTO_INCREMENT,
                                                     `nombre` VARCHAR(255) NOT NULL,
    `descripcion` TEXT NULL DEFAULT NULL,
    `activo` TINYINT(1) NOT NULL DEFAULT '1',
    PRIMARY KEY (`id`))
    ENGINE = InnoDB
    AUTO_INCREMENT = 17
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_general_ci;


-- -----------------------------------------------------
-- Table `prueba`.`lecciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prueba`.`lecciones` (
                                                    `id` INT NOT NULL AUTO_INCREMENT,
                                                    `categoria_id` INT NOT NULL,
                                                    `titulo` VARCHAR(255) NOT NULL,
    `contenido` TEXT NULL DEFAULT NULL,
    `activo` TINYINT(1) NOT NULL DEFAULT '1',
    PRIMARY KEY (`id`),
    INDEX `categoria_id` (`categoria_id` ASC) VISIBLE,
    CONSTRAINT `lecciones_ibfk_1`
    FOREIGN KEY (`categoria_id`)
    REFERENCES `prueba`.`categorias` (`id`))
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_general_ci;


-- -----------------------------------------------------
-- Table `prueba`.`programas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prueba`.`programas` (
                                                    `id` INT NOT NULL AUTO_INCREMENT,
                                                    `nombre` VARCHAR(255) NOT NULL,
    `descripcion` TEXT NULL DEFAULT NULL,
    `estado` ENUM('Borrador', 'Publicado', 'Archivado') NOT NULL,
    `fecha_inicio` DATETIME NULL DEFAULT NULL,
    `fecha_fin` DATETIME NULL DEFAULT NULL,
    `fecha_creacion` DATETIME NOT NULL,
    `fecha_actualizacion` DATETIME NOT NULL,
    PRIMARY KEY (`id`))
    ENGINE = InnoDB
    AUTO_INCREMENT = 15
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_general_ci;


-- -----------------------------------------------------
-- Table `prueba`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prueba`.`usuarios` (
                                                   `id` INT NOT NULL AUTO_INCREMENT,
                                                   `nombre` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `contraseña` VARCHAR(255) NOT NULL,
    `rol` ENUM('Mentor', 'Supervisor', 'Operaciones', 'Estudiante') NOT NULL,
    `activo` TINYINT(1) NOT NULL DEFAULT '1',
    PRIMARY KEY (`id`),
    UNIQUE INDEX `email` (`email` ASC) VISIBLE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_general_ci;


-- -----------------------------------------------------
-- Table `prueba`.`progreso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prueba`.`progreso` (
                                                   `id` INT NOT NULL AUTO_INCREMENT,
                                                   `programa_id` INT NOT NULL,
                                                   `usuario_id` INT NOT NULL,
                                                   `leccion_id` INT NOT NULL,
                                                   `completado` TINYINT(1) NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    INDEX `programa_id` (`programa_id` ASC) VISIBLE,
    INDEX `usuario_id` (`usuario_id` ASC) VISIBLE,
    INDEX `leccion_id` (`leccion_id` ASC) VISIBLE,
    CONSTRAINT `progreso_ibfk_1`
    FOREIGN KEY (`programa_id`)
    REFERENCES `prueba`.`programas` (`id`),
    CONSTRAINT `progreso_ibfk_2`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `prueba`.`usuarios` (`id`),
    CONSTRAINT `progreso_ibfk_3`
    FOREIGN KEY (`leccion_id`)
    REFERENCES `prueba`.`lecciones` (`id`))
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_general_ci;


-- -----------------------------------------------------
-- Table `prueba`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prueba`.`user` (
                                               `id` INT NOT NULL AUTO_INCREMENT,
                                               `username` VARCHAR(255) CHARACTER SET 'utf8mb3' NOT NULL,
    `auth_key` VARCHAR(32) CHARACTER SET 'utf8mb3' NOT NULL,
    `password_hash` VARCHAR(255) CHARACTER SET 'utf8mb3' NOT NULL,
    `password_reset_token` VARCHAR(255) CHARACTER SET 'utf8mb3' NULL DEFAULT NULL,
    `email` VARCHAR(255) CHARACTER SET 'utf8mb3' NOT NULL,
    `phone` VARCHAR(100) CHARACTER SET 'utf8mb3' NOT NULL,
    `status` SMALLINT NOT NULL DEFAULT '10',
    `gender` VARCHAR(7) CHARACTER SET 'utf8mb3' NOT NULL,
    `nationality` VARCHAR(255) CHARACTER SET 'utf8mb3' NOT NULL,
    `filename` VARCHAR(255) CHARACTER SET 'utf8mb3' NULL DEFAULT NULL,
    `filepath` VARCHAR(255) CHARACTER SET 'utf8mb3' NULL DEFAULT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    UNIQUE INDEX `id_UNIQUE` (`id` ASC))
    ENGINE = InnoDB
    AUTO_INCREMENT = 3;



-- -----------------------------------------------------
-- Table `prueba`.`usuario_programa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prueba`.`usuario_programa` (
                                                           `id` INT NOT NULL AUTO_INCREMENT,
                                                           `programa_id` INT NOT NULL,
                                                           `usuario_id` INT NOT NULL,
                                                           `estado` ENUM('Activo', 'Inactivo') NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `programa_id` (`programa_id` ASC) VISIBLE,
    INDEX `usuario_id` (`usuario_id` ASC) VISIBLE,
    CONSTRAINT `usuario_programa_ibfk_1`
    FOREIGN KEY (`programa_id`)
    REFERENCES `prueba`.`programas` (`id`),
    CONSTRAINT `usuario_programa_ibfk_2`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `prueba`.`usuarios` (`id`))
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_general_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
