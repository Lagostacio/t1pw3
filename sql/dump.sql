

create DATABASE trabweb;

use trabweb;

create table usuarios (
    id int auto_increment primary key not null,
    nome varchar(250) not null,
    email varchar(250) not null,
    senha varchar(50) not null
);

create table documentos (
    id int auto_increment primary key not null,
    nome varchar(250) not null
);

create table usuarios_documentos (
    id_usuario int not null,
    id_doc int not null,
    editar tinyint not null,
    excluir tinyint not null,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (id_doc) REFERENCES documentos(id)
);
