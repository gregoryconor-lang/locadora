-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema bd_locadora
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bd_locadora
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bd_locadora` ;
USE `bd_locadora` ;

-- -----------------------------------------------------
-- Table `bd_locadora`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_locadora`.`cliente` (
  `id_cliente` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `cpf` VARCHAR(45) NULL,
  `telefone` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  PRIMARY KEY (`id_cliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_locadora`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_locadora`.`categoria` (
  `id_categoria` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NULL,
  PRIMARY KEY (`id_categoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_locadora`.`filme`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_locadora`.`filme` (
  `id_filme` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NULL,
  `ano_lancamento` INT NULL,
  `sinopse` TEXT NULL,
  `exemplares_disponiveis` INT NULL,
  `id_categoria` INT NOT NULL,
  PRIMARY KEY (`id_filme`),
  INDEX `fk_filme_categoria_idx` (`id_categoria` ASC) VISIBLE,
  CONSTRAINT `fk_filme_categoria`
    FOREIGN KEY (`id_categoria`)
    REFERENCES `bd_locadora`.`categoria` (`id_categoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_locadora`.`locacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_locadora`.`locacao` (
  `id_locacao` INT NOT NULL AUTO_INCREMENT,
  `data_locacao` DATE NULL,
  `data_prev_devolucao` DATE NULL,
  `data_devolucao` DATE NULL,
  `valor_cobrado` DECIMAL(4,2) NULL,
  `id_cliente` INT NOT NULL,
  PRIMARY KEY (`id_locacao`),
  INDEX `fk_locacao_cliente1_idx` (`id_cliente` ASC) VISIBLE,
  CONSTRAINT `fk_locacao_cliente1`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `bd_locadora`.`cliente` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_locadora`.`locacao_filme`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_locadora`.`locacao_filme` (
  `id_locacao` INT NOT NULL,
  `id_filme` INT NOT NULL,
  PRIMARY KEY (`id_locacao`, `id_filme`),
  INDEX `fk_locacao_has_filme_filme1_idx` (`id_filme` ASC) VISIBLE,
  INDEX `fk_locacao_has_filme_locacao1_idx` (`id_locacao` ASC) VISIBLE,
  CONSTRAINT `fk_locacao_has_filme_locacao1`
    FOREIGN KEY (`id_locacao`)
    REFERENCES `bd_locadora`.`locacao` (`id_locacao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_locacao_has_filme_filme1`
    FOREIGN KEY (`id_filme`)
    REFERENCES `bd_locadora`.`filme` (`id_filme`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
