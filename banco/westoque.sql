--
-- CRIAR BANCO DE DADOS
--
CREATE DATABASE IF NOT EXISTS westoque; 

--
-- CRIAR TABELA USUARIOS
--
CREATE TABLE IF NOT EXISTS usuario(
	idusuario tinyint(11) not null auto_increment,
	usuario varchar(50) not null,
	nomeusuario varchar(100) not null,	
	emailusuario varchar(100) not null, 
	senhausuario varchar(100) not null,
	PRIMARY KEY(idusuario),
	UNIQUE INDEX emailusuario_UNIQUE (emailusuario ASC)
)ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `westoque`.`usuario` (`usuario`, `nomeusuario`,  `emailusuario`,  `senhausuario`) VALUES ('wes', 'wesley', 'wesley@wfuturo.com', MD5('123'));


--
-- CRIAR TABELA FORNECEDOR
--
CREATE TABLE IF NOT EXISTS fornecedor(
	idfornecedor tinyint(11) not null auto_increment,
	cnpjfornecedor varchar(20) not null,
	razaosocialfornecedor varchar(100) not null,	
	emailfornecedor varchar(100) not null,
	telefonefornecedor varchar(100) not null,
	PRIMARY KEY(idfornecedor),
	UNIQUE INDEX cnpjfornecedor_UNIQUE (cnpjfornecedor ASC)
)ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


--
-- CRIAR TABELA CATEGORIA
--
CREATE TABLE IF NOT EXISTS categoria(
	idcategoria int(11) NOT NULL AUTO_INCREMENT,
	nomecategoria varchar(30) NOT NULL,
	PRIMARY KEY (idcategoria)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


--
-- CRIAR TABELA PRODUTO
--
CREATE TABLE IF NOT EXISTS produto(
  `idproduto` TINYINT(11) NOT NULL AUTO_INCREMENT,
  `nomeproduto` VARCHAR(50) NOT NULL,
  `dataproduto` DATE NULL DEFAULT NULL,
  `idcategoria` INT(11) NOT NULL,
  PRIMARY KEY (`idproduto`),
  FOREIGN KEY (`idcategoria`)
  REFERENCES `westoque`.`categoria` (`idcategoria`)
)ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



--
-- pesquisa 
--

-- DELETE FROM `westoque`.`usuario` WHERE `idusuario`='1';
-- DROP TABLE `westoque`.`usuario`;
-- DROP TABLE `westoque`.`fornecedor`;
-- DROP TABLE `plano_db`.`usuarios`;

SELECT * FROM westoque.usuario;

SELECT * FROM westoque.fornecedor;

SELECT * FROM westoque.categoria;

SELECT * FROM westoque.produto;

SELECT *, DATE_FORMAT( `dataproduto` , '%d/%m/%Y' ) AS `dataproduto` FROM `produto`; -- insert com data formatata para formato brasileiro

SELECT idproduto, nomeproduto, DATE_FORMAT( `dataproduto` , '%d/%m/%Y' ) AS `dataproduto`, idcategoria  FROM `produto`; -- select com data formatata para formato brasileiro


SELECT A.idproduto, A.nomeproduto, A.dataproduto, B.nomecategoria 
FROM produto A, categoria B where B.idcategoria = A.idcategoria;  -- select integrando as tabelas produto e categoria


SELECT A.idproduto, A.nomeproduto, DATE_FORMAT( `dataproduto` , '%d/%m/%Y' )  AS `dataproduto`, B.nomecategoria 
FROM produto A, categoria B where B.idcategoria = A.idcategoria;  -- select integrando as tabelas produto e categoria






SELECT a.idproduto, a.nomeproduto, a.dataproduto, a.nomecategoria
FROM produto a
join categoria b, a.idcategoria = b.idcategoria; 





--
-- deletar  
--
--DELETE FROM `westoque`.`produto` WHERE `idproduto`='27';



