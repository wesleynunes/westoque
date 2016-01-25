-- MySQL Script generated by MySQL Workbench
-- 04/07/15 10:08:13
-- Model: New Model    Version: 1.0
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Criar tabela westoque
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `westoque` ;
CREATE SCHEMA IF NOT EXISTS `westoque` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `westoque` ;


-- -----------------------------------------------------
-- Deletar westoque
-- -----------------------------------------------------
-- DROP DATABASE `westoque`;


-- -----------------------------------------------------
-- Tabela `westoque`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `westoque`.`usuario` ;

CREATE TABLE IF NOT EXISTS `westoque`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT COMMENT 'Tabela para registrar usuarios',
  `usuario` VARCHAR(50) NOT NULL,
  `nomeusuario` VARCHAR(100) NOT NULL,
  `emailusuario` VARCHAR(100) NOT NULL,
  `senhausuario` VARCHAR(300) NOT NULL,
  PRIMARY KEY (`idusuario`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Inserir usuario
-- -----------------------------------------------------
INSERT INTO `westoque`.`usuario` (`usuario`, `nomeusuario`,  `emailusuario`,  `senhausuario`) VALUES ('wes', 'wesley', 'wesley@wfuturo.com', MD5('123'));




-- -----------------------------------------------------
-- Tabela `westoque`.`fornecedor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `westoque`.`fornecedor` ;

CREATE TABLE IF NOT EXISTS `westoque`.`fornecedor` (
  `idfornecedor` INT NOT NULL AUTO_INCREMENT COMMENT 'Tabela para registrar fornecedores',
  `cnpjfornecedor` VARCHAR(20) NOT NULL,
  `razaosocialfornecedor` VARCHAR(100) NOT NULL,
  `emailfornecedor` VARCHAR(100) NOT NULL,
  `telefonefornecedor` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idfornecedor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Tabela `westoque`.`categoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `westoque`.`categoria` ;

CREATE TABLE IF NOT EXISTS `westoque`.`categoria` (
  `idcategoria` INT NOT NULL AUTO_INCREMENT COMMENT 'Tabela para registrar categoria',
  `nomecategoria` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idcategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `westoque`.`produto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `westoque`.`produto` ;

CREATE TABLE IF NOT EXISTS `westoque`.`produto` (
  `idproduto` INT NOT NULL AUTO_INCREMENT COMMENT 'Tabela para registrar produto',
  `nomeproduto` VARCHAR(100) NOT NULL,
  `dataproduto` DATE NOT NULL,
  `idcategoria` INT NOT NULL COMMENT 'Chave segundaria ligaçao com categoria',
  PRIMARY KEY (`idproduto`),
  INDEX `fk_produto_categoria_idx` (`idcategoria` ASC),
  CONSTRAINT `fk_produto_categoria`
    FOREIGN KEY (`idcategoria`)
    REFERENCES `westoque`.`categoria` (`idcategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



INSERT INTO `westoque`.`produto`(`nomeproduto`,`dataproduto`,`idcategoria`)VALUES('pastel','2015/04/07', '2');




-- -----------------------------------------------------
-- Select 
-- -----------------------------------------------------

SELECT * FROM westoque.usuario;

SELECT * FROM westoque.fornecedor;

SELECT * FROM westoque.categoria;

SELECT * FROM westoque.produto;


























SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


















