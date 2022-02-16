CREATE DATABASE CarrinhodeCompras;
USE CarrinhodeCompras;

CREATE TABLE tbl_produtos (
      cod INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
      nome VARCHAR(150) NOT NULL,
      img VARCHAR(36) NOT NULL,
      preco DOUBLE(10, 2) NOT NULL
) Engine=InnoDB;

INSERT INTO tbl_produtos (cod,nome,img,preco)VALUES
            (NULL,'Audi Pop Up Next','002.jpg','250000'), 
			(NULL,'VW Planning ','001.jpg','340000'),
			(NULL,'Bicicleta Cyclotron','003.jpg','50000'),
			(NULL,'Apartamento em Nova York','004.jpg','2905000');
            
select *from tbl_produtos;

CREATE TABLE tbl_carrinho (
      id INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY,
      cod INT( 11 ) NOT NULL,
      nome VARCHAR( 150 ) NOT NULL,
      preco DOUBLE( 10, 2 ) NOT NULL,
      qtd INT( 11 ) NOT NULL,
      sessao TEXT NOT NULL
) Engine=InnoDB;

select *from tbl_carrinho;
