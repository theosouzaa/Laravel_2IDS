CREATE DATABASE mvcEmpresa;
USE mvcEmpresa;

-- Criando as tabelas 
CREATE TABLE departamento(
    id INT AUTO_INCREMENT PRIMARY KEY,
    setor varchar(255),
	data_criacao date,
    orcamento int,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

SELECT * FROM departamento;

CREATE TABLE funcionarios(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome varchar(255),
	sobrenome varchar(255),
    email varchar(255),
    cargo varchar(255),
    data_admissao date,
    salario int,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

ALTER TABLE funcionarios
ADD COLUMN departamento_id INT NULL,
ADD CONSTRAINT fk_departamento
FOREIGN KEY (departamento_id) REFERENCES departamento(id) ON DELETE SET NULL;


CREATE TABLE informacoes(
	id INT AUTO_INCREMENT PRIMARY KEY,
    cpf INT, 
    rg INT,
    data_nascimento DATE,
    cep INT,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

ALTER TABLE informacoes
ADD COLUMN funcionario_id INT NULL,
ADD CONSTRAINT fk_funcionario
FOREIGN KEY (funcionario_id) REFERENCES funcionarios(id) ON DELETE SET NULL;


SELECT * FROM informacoes;