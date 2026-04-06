CREATE DATABASE produtooLaravel;
USE produtooLaravel;

CREATE TABLE produtos (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    quantidade INT,
    preco DOUBLE,
    created_at timestamp null,
    updated_at timestamp null
);

CREATE TABLE setor (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100), -- EX: alimentos | higiene | limpeza --
    num_corredor INT,
	created_at timestamp null,
    updated_at timestamp null
);

SELECT * FROM setor;
SELECT * FROM produtos;