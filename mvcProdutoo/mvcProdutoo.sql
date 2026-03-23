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