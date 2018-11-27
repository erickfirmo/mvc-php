CREATE DATABASE dividas
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

USE dividas;

CREATE TABLE clientes(
    id INT NOT NULL AUTO_INCREMENT,
    nome varchar(20) NOT NULL,
    sobrenome varchar(100),
    nascimento date NOT NULL,
    sexo enum('M','F'),
    rg char(9) NOT NULL UNIQUE,
    cpf char(11) NOT NULL UNIQUE,
    PRIMARY KEY(id)
) DEFAULT CHARSET = 'utf8';

CREATE TABLE dividas(
    id INT NOT NULL AUTO_INCREMENT,
    valor DECIMAL(8, 2) NOT NULL,
    vencimento date NOT NULL,
    cliente_id INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY (cliente_id) REFERENCES clientes(id)
) DEFAULT CHARSET = 'utf8';