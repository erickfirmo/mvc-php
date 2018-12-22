CREATE DATABASE `dividas`
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

USE `dividas`;

CREATE TABLE `clientes`(
    `id` INT NOT NULL AUTO_INCREMENT,
    `nome` varchar(20) NOT NULL,
    `sobrenome` varchar(100),
    `nascimento` date NOT NULL,
    `sexo` enum('M','F'),
    `rg` char(9) NOT NULL UNIQUE,
    `cpf` char(11) NOT NULL UNIQUE,
    PRIMARY KEY(id)
) DEFAULT CHARSET = 'utf8';

CREATE TABLE `dividas`(
    `id` INT NOT NULL AUTO_INCREMENT,
    `valor` DECIMAL(8, 2) NOT NULL,
    `vencimento` date NOT NULL,
    PRIMARY KEY(`id`)
) DEFAULT CHARSET = 'utf8';




) DEFAULT CHARSET = 'utf8';

CREATE TABLE `dividas_dos_clientes`(
    `id` INT NOT NULL AUTO_INCREMENT,
    `cliente_id` INT NOT NULL,
    `divida_id` INT NOT NULL,
    PRIMARY KEY(`id`),
    FOREIGN KEY (`cliente_id`) REFERENCES clientes(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`divida_id`) REFERENCES dividas(`id`) ON DELETE CASCADE
) DEFAULT CHARSET = 'utf8';

CREATE TABLE `users`(
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` varchar(20) NOT NULL,
    `lastname` varchar(100) NOT NULL,
    `email` varchar(80) NOT NULL UNIQUE,
    `password` varchar(64),
    PRIMARY KEY(`id`)
);


CREATE TABLE `admins`(
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` varchar(20) NOT NULL,
    `lastname` varchar(100) NOT NULL,
    `email` varchar(80) NOT NULL UNIQUE,
    `password` varchar(64),
    PRIMARY KEY(`id`)
);
