CREATE DATABASE empresa;

USE empresa;

CREATE TABLE funcionarios (
    id INT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    idade INT NOT NULL,
    data_nascimento DATE NOT NULL,
    foto_blob LONGBLOB NOT NULL
);
