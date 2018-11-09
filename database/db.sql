CREATE DATABASE cadastros
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

USE cadastros;

CREATE TABLE produtos(
    id INT NOT NULL AUTO_INCREMENT,
    nome varchar(30) NOT NULL,
    descricao varchar(100) NOT NULL,
    PRIMARY KEY (id)
);

