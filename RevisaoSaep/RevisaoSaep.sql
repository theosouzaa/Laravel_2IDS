CREATE DATABASE saep_db;
USE saep_db;


CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

CREATE TABLE empresas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cnpj VARCHAR(255) NOT NULL,
    telefone VARCHAR(20),
    email VARCHAR(100),
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

CREATE TABLE salas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    n_sala INT NOT NULL,
    bloco VARCHAR(50) NOT NULL,
    empresa_id INT NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,

    FOREIGN KEY (empresa_id) REFERENCES empresas(id)
);

CREATE TABLE agendamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    data DATE NOT NULL,
    hora TIME NOT NULL,
    descricao VARCHAR(255),
    sala_id INT NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,

    FOREIGN KEY (sala_id) REFERENCES salas(id)
);

INSERT INTO usuarios 
(nome, email, senha, created_at, updated_at)
VALUES
('Administrador', 'admin@saep.com', SHA2('123456', 256), NOW(), NOW()),
('Théo Souza', 'theoo@saep.com', SHA2('123456', 256), NOW(), NOW()),
('Marília Porfirio', 'marilia@saep.com', SHA2('123456', 256), NOW(), NOW());


INSERT INTO empresas
(nome, cnpj, telefone, email, created_at, updated_at)
VALUES
('CHS Tecnologia Ltda', '12.345.678/0001-90', '(16) 99999-1111', 'contato@chsis.com', NOW(), NOW()),
('MariliaPorfirio', '23.456.789/0001-01', '(16) 98888-2222', 'contato@mariliaporfirioo.com', NOW(), NOW()),
('Alpha Store', '34.567.890/0001-12', '(16) 97777-3333', 'contato@alphastore.com', NOW(), NOW()),
('Smart Solutions', '45.678.901/0001-23', '(16) 96666-4444', 'contato@smartsolutions.com', NOW(), NOW());


INSERT INTO salas
(num_sala, bloco, empresa_id, created_at, updated_at)
VALUES
('101', 'Bloco A', 1, NOW(), NOW()),
('102', 'Bloco A', 1, NOW(), NOW()),
('201', 'Bloco B', 2, NOW(), NOW()),
('202', 'Bloco B', 2, NOW(), NOW()),
('301', 'Bloco C', 3, NOW(), NOW()),
('302', 'Bloco C', 3, NOW(), NOW()),
('401', 'Bloco D', 4, NOW(), NOW()),
('402', 'Bloco D', 4, NOW(), NOW());


INSERT INTO agendamentos
(data, hora, descricao, sala_id, created_at, updated_at)
VALUES
('2026-09-21', '08:00:00', 'Reunião de planejamento', 9, NOW(), NOW()),
('2026-09-21', '10:30:00', 'Apresentação de projeto', 10, NOW(), NOW()),
('2026-09-22', '09:00:00', 'Reunião com equipe de desenvolvimento', 11, NOW(), NOW()),
('2026-09-22', '14:00:00', 'Treinamento de funcionários', 12, NOW(), NOW()),
('2026-09-23', '08:30:00', 'Reunião administrativa', 13, NOW(), NOW()),
('2026-09-23', '13:30:00', 'Workshop de tecnologia', 14, NOW(), NOW()),
('2026-09-24', '10:00:00', 'Reunião com clientes', 15, NOW(), NOW()),
('2026-09-24', '15:30:00', 'Apresentação comercial', 9, NOW(), NOW()),
('2026-09-25', '09:00:00', 'Planejamento semanal', 10, NOW(), NOW()),
('2026-09-25', '14:30:00', 'Reunião de diretoria', 16, NOW(), NOW()),
('2026-09-26', '11:00:00', 'Manutenção e organização da sala', 12, NOW(), NOW());


SELECT * FROM agendamentos;