CREATE DATABASE mvcBiblioteca;
use mvcBiblioteca;
-- DROP DATABASE mvcBiblioteca;

CREATE TABLE livros(
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    autor VARCHAR(255),
    descricao VARCHAR(255),
    numPaginas INT,
    dataPublicacao DATE,
    editora VARCHAR(255),
	created_at timestamp null,
    updated_at timestamp null
);

CREATE TABLE editoras(
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    CNPJ INT,
    pais VARCHAR(255),
    cidade VARCHAR(255),
    created_at timestamp null,
    updated_at timestamp null
);

ALTER TABLE livros
ADD COLUMN editora_id INT NULL,
ADD CONSTRAINT fk_livros_editora
FOREIGN KEY (editora_id) REFERENCES editoras(id) ON DELETE SET NULL;

ALTER TABLE Livros
ADD COLUMN detalhe_id INT,
ADD CONSTRAINT fk_Livros_Detalhe
FOREIGN KEY (detalhe_id) REFERENCES Detalhe(id);

create table detalhe(
	id int auto_increment primary key,
    custo varchar(100),
    preco_venda varchar(100),
    imposto varchar(100),
    created_at timestamp null,
    updated_at timestamp null
);

SELECT * FROM livros;
SELECT * FROM editoras;
SELECT * FROM detalhe