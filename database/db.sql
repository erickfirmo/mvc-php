CREATE DATABASE `nome_do_banco`
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

USE `nome_do_banco`;

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