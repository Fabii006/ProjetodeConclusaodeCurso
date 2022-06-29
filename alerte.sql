drop database if exists alerte;
Create database alerte
Default character set utf8
Default collate utf8_general_ci;
use alerte;

CREATE TABLE alerta(
    ID integer PRIMARY KEY AUTO_INCREMENT,
    Titulo varchar(100) NOT NULL,
    Estado varchar(5) NOT NULL,
    Cidade varchar(20) NOT NULL,
    Profissao varchar(20) NOT NULL,
    Registro varchar(20) NOT NULL,
    Contato char(14) NOT NULL,
    Descricao longtext NOT NULL,
    Tipo VARCHAR(20) NOT NULL,
    ID_usuario integer, 
    Tempo date NOT NULL,
    Estatus varchar(10) NOT NULL,
    Denuncias integer
);

CREATE TABLE usuario(
	ID integer PRIMARY KEY AUTO_INCREMENT,
    Nome varchar(60) NOT NULL,
    Sobrenome varchar(100) NOT NULL,
    Nome_social varchar(60) NOT NULL,
    Usuario varchar(60) NOT NULL,
    Email varchar(100) NOT NULL,
    Senha varchar(250) NOT NULL,
    Nascimento varchar(10) NOT NULL,
    Genero varchar(30) NOT NULL,
    Imagem_perfil varchar(250) DEFAULT NULL ,
    CPF char(14) NOT NULL,
    Status varchar(10) NOT NULL
);

alter table alerta add CONSTRAINT fk_usuario FOREIGN KEY (ID_usuario) REFERENCES usuario (ID);