ROP DATABASE IF EXISTS Instituto;

CREATE DATABASE Instituto;
USE Instituto;

CREATE TABLE usuarios(
	usuario varchar (20) NOT NULL PRIMARY KEY,
	clave varchar (44) NOT NULL,
	admin boolean NOT NULL
);
INSERT INTO usuarios VALUES 
('admin',SHA1('1234'),1);
