create database ong;
use ong;


create table contato(
    id_contato int(4) primary key not null auto_increment,
    telefone char(10),
    celular char(11),
    email varchar(90)
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
cep_responsavel char (8),
usuario_responsavel int(4),
contato_responsavel int (4),
nome_responsavel varchar(90) not null,
data_nascimento_responsavel date,
complemento_responsavel varchar(40),
num_responsavel int(5),
data_atendimento_responsavel date,
sexo_responsavel char(1),
foreign key(contato_responsavel) references contato(id_contato),
foreign key (usuario_responsavel) references usuario(id_usuario)

);

create table cestas(
    id_cestas int(4) primary key not null auto_increment,
    usuario_cestas int(4),
    quantidade_cestas int(4) not null,
    recebimento_cestas date not null,
    foreign key (usuario_cestas) references usuario(id_usuario)

);


create table saidaCestas(
    id_saidaCestas int (4) primary key not null auto_increment,
    usuario_saidaCestas int(4),
    responsavel_saidaCestas int(4),
    quantidade_saidaCestas int(4) not null,
    data_saidaCestas date,
    foreign key(responsavel_saidaCestas) references responsavel_familia(id_responsavel),
    foreign key (usuario_saidaCestas) references usuario(id_usuario)
);




select * from usuario;
select * from responsavel_familia;
select * from contato;
select * from endereco_postal;
select * from cestas;
select * from saidaCestas;



update usuario set foto_usuario = '$atual', imagem_usuario = '$imagem' where id_usuario = '$id';


drop database ong;
SELECT familia.idFamilia, familia.nome_familia,familia.data_nascimento_familia,
familia.sexo_familia,contato.celular,contato.telefone,contato.email,familia.complemento_familia,
familia.n_familia,familia.data_atendimento,codigoEnderecoPostal.cep,codigoEnderecoPostal.rua,
codigoEnderecoPostal.bairro,codigoEnderecoPostal.estado,codigoEnderecoPostal.cidade	 FROM familia INNER JOIN contato ON familia.idFamilia = contato.IdContato 
INNER JOIN codigoEnderecoPostal on familia.idFamilia = idCep where idFamilia=1;
SELECT idCep FROM codigoEnderecoPostal WHERE idCep = LAST_INSERT_ID();

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


