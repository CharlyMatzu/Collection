DROP DATABASE prueba;

CREATE DATABASE prueba;
use prueba;

CREATE TABLE usuario(
	id 		int not null auto_increment primary key,
	nombre	varchar(20) not null
);

CREATE TABLE persona(
	id 		int not null auto_increment primary key,
	nombre	varchar(20) not null,
	
	FK_user INT NOT NULL,
	FOREIGN KEY (FK_user) REFERENCES usuario(id) ON UPDATE CASCADE ON DELETE CASCADE
);

SELECT * FROM usuario;
SELECT * FROM persona;