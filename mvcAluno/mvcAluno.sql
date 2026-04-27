USE alunoLaravel;

-- DROP DATABASE alunolaravel;

CREATE TABLE alunos (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100),
    created_at timestamp null,
    updated_at timestamp null
);

CREATE TABLE Turmas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numSala INT NOT NULL,
    serie VARCHAR(255) NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

CREATE TABLE informacoes(
    id INT AUTO_INCREMENT PRIMARY KEY,
	endereco VARCHAR(255),
    telefone INT NOT NULL,
    idade INT,
    data_nascimento DATE,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

ALTER TABLE alunos
ADD COLUMN turma_id INT NULL,
ADD CONSTRAINT fk_alunos_turma
FOREIGN KEY (turma_id) REFERENCES Turmas(id) ON DELETE SET NULL;

ALTER TABLE alunos 
ADD COLUMN informacoes_id INT NULL,
ADD CONSTRAINT fk_aluno_informacoes
FOREIGN KEY (informacoes_id) REFERENCES informacoes(id) ON DELETE SET NULL;


SELECT * FROM alunos;
SELECT * FROM Turmas;
SELECT * FROM informacoes;