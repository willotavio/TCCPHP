create database ong;
use ong;

create table contato(
    id_contato int(4) primary key not null auto_increment,
    telefone char(10),
    celular char(11),
    email varchar(90)
);


create table endereco_postal(
    id_cep int(4) primary key not null auto_increment,
    cep char (8) not null,
    rua varchar(45) not null,
    bairro  varchar(45) not null,
    estado  char(2) not null,
    cidade  varchar(45) not null

);


create table usuario(
    id_usuario int(4) primary key not null auto_increment,
    nome_usuario varchar(10) not null,
    senha_usuario varchar(20) not null,
    tipo_usuario varchar(1) not null,
    email_usuario varchar(90) not null,
	foto_usuario char(40),
    imagem_usuario blob

);


create table responsavel_familia(
id_responsavel int(4) primary key not null auto_increment,
cpf_responsavel int (11) not null,
cep_responsavel int (4),
usuario_responsavel int(4),
contato_responsavel int (4),
nome_responsavel varchar(90) not null,
data_nascimento_responsavel date,
complemento_responsavel varchar(40),
num_responsavel int(5),
data_atendimento_responsavel date,
sexo_responsavel char(1),
foreign key(cep_responsavel) references endereco_postal(id_cep),
foreign key(contato_responsavel) references contato(id_contato),
foreign key (usuario_responsavel) references usuario(id_usuario)

);

create table conta(
	id_conta int(4) primary key auto_increment not null,
	usuario_conta int(4),
	nome_conta varchar(40) not null,
	valor_conta decimal (6,3) not null,
	data_cadastro_conta date not null,
    tipo_conta varchar(20),
	data_pagamentos_conta date not null,
	foreign key (usuario_conta) references usuario(id_usuario)
);

create table cestas(
    id_cestas int(4) primary key not null auto_increment,
    quantidade_cestas int(4) not null,
    recebimento_cestas date not null
);


select * from usuario;
select * from responsavel_familia;
select * from contato;
select * from endereco_postal;
select * from cestas;

SELECT familia.idFamilia, familia.nome_familia,familia.data_nascimento_familia,
familia.sexo_familia,contato.celular,contato.telefone,contato.email,familia.complemento_familia,
familia.n_familia,familia.data_atendimento,codigoEnderecoPostal.cep,codigoEnderecoPostal.rua,
codigoEnderecoPostal.bairro,codigoEnderecoPostal.estado,codigoEnderecoPostal.cidade	 FROM familia INNER JOIN contato ON familia.idFamilia = contato.IdContato 
INNER JOIN codigoEnderecoPostal on familia.idFamilia = idCep where idFamilia=1;
SELECT idCep FROM codigoEnderecoPostal WHERE idCep = LAST_INSERT_ID();






