dataDROP database webshopdb;

CREATE DATABASE webshopdb;

USE webshopdb;

create table producten
 (
      id	INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
      naam	VARCHAR(255) NOT NULL,
      prijs	DECIMAL(5,2) NOT  NULL
 );

DESCRIBE producten;

INSERT INTO producten (naam, prijs) VALUES ("1 KG appels", 2.95);

CREATE TABLE bestellingen (
	id	INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	email	varchar(255) NOT NULL,
	productid INT,
	FOREIGN KEY (productid) REFERENCES producten(id),
	tebetalen DECIMAL(10,2) NOT NULL
);

DESCRIBE bestellingen;

insert into bestellingen (email, productid, tebetalen) VALUES ('marcellavanduyn@gmail.com', 10, 55.00);
