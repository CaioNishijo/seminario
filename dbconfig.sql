CREATE DATABASE IF NOT EXISTS projeto_consultas;
USE projeto_consultas;

CREATE TABLE IF NOT EXISTS usuarios(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(45),
    email VARCHAR(45),
    senha VARCHAR(60),
    nivel ENUM('adm', 'colab') NOT NULL
);

CREATE TABLE IF NOT EXISTS pacientes(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(45),
    cpf VARCHAR(11),
    idade INT
);

CREATE TABLE IF NOT EXISTS especialidades(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(45)
);

CREATE TABLE IF NOT EXISTS medicos(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(45),
    crm VARCHAR(6),
    id_especialidade INT,
    FOREIGN KEY(id_especialidade) REFERENCES especialidades(id)
);

CREATE TABLE horarios_consultas(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    horario TIME
);

CREATE TABLE IF NOT EXISTS consultas(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_medico INT,
    id_paciente INT,
    data_consulta_id INT,
    FOREIGN KEY(data_consulta_id) REFERENCES horarios_consultas(id)
);