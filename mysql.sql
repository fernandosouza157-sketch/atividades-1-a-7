CREATE DATABASE IF NOT EXISTS agenda;
USE agenda;

CREATE TABLE IF NOT EXISTS contatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(20)
);

CREATE TABLE IF NOT EXISTS clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(20),
    endereco VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10,2) NOT NULL,
    estoque INT NOT NULL,
    imagem VARCHAR(255) NULL
);

-- Dados básicos para teste
INSERT INTO contatos (nome, email, telefone) VALUES ('Ana Silva', 'ana@email.com', '11912345678');
INSERT INTO clientes (nome, cpf, email, telefone, endereco) VALUES ('Carlos Augusto', '111.222.333-44', 'carlos@email.com', '11955554444', 'Rua A, 123');
INSERT INTO produtos (nome, descricao, preco, estoque) VALUES ('Notebook', 'Notebook i5', 3500.00, 10);