CREATE DATABASE IF NOT EXISTS project_produtos;
use project_produtos;

CREATE TABLE IF NOT EXISTS users(
    id int auto_increment primary key,
    nome varchar(100) not null,
    email varchar(100) unique not null,
    senha varchar(255) not null
);

create table if not exists produtos(
    id int auto_increment primary key,
    nome varchar(100) not null,
    preco decimal(10,2) not null,
    quantidade int not null,
    imagem text not null,
    descricao text
);