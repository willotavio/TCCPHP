create database ong;
use ong;

drop database ong;

/*OK*/
create table cestas(
	idCestas int(4) primary key not null auto_increment,
	quantidade_cestas int(4) not null,
	recebimento_cestas date not null
);

create table usuario(
	idUsuario int(4) primary key not null auto_increment,
	nome_login varchar(10) not null,
	senha varchar(20) not null,
	tipo varchar(14) not null,
	email_usuario varchar(90) not null
);
/*OK*/

create table contato(
	idContato int(4) primary key not null auto_increment,
	telefone char(10),
	celular char(11),
    email varchar(90)
);

create table codigoEnderecoPostal(
	idCep int(6) primary key not null auto_increment,
	cep	int (8) not null,
	rua	varchar(45) not null,
	bairro	varchar(45) not null,
	estado	char(2) not null,
	cidade	varchar(45) not null
);


create table Responsavelfamilia(
idResponsavel int(4) primary key not null auto_increment,
responsavel_cep int (8),
responsavel_contato	int (4),
nome_responsavel varchar(90) not null,
data_nascimento_responsavel date,
complemento_responsavel	varchar(40),
n_responsavel int(5),
cpf_responsavel int(11),
data_atendimento date,
sexo_responsavel char(1),
foreign key(responsavel_cep) references codigoEnderecoPostal(idCep),
foreign key(responsavel_contato) references contato(idcontato)
);
 
 drop table responsavelfamilia;


select * from usuario;
select * from responsavelFamilia;
select * from Contato;
select * from CodigoEnderecoPostal;
select * from cestas;


/*A Fazer 

create table administrador (
	idAdministrador	int (4) primary key not null auto_increment,
	nome_completo_adm varchar(40) not null,
	data_nascimento_adm	date,
	sexo_adm char(1),
	adm_usuario varchar(10),
	foreign key (adm_usuario) references Usuario(nome)
);

create table funcionario(
	idFuncionario int (4) primary key not null auto_increment,
	nome_completo_func varchar(40) not null,
	data_nascimento_func date,
	sexo_func char(1),
	func_usuario varchar(10),
	foreign key (func_usuario) references Usuario(nome)
);

create table contas(
	idContas int(4) primary key auto_increment not null,
	nome_contas varchar(40) not null,
	valor_contas decimal (6,3) not null,
	data_cadastro_contas date not null,
	data_pagamentos_contas date not null
);
*/
SELECT familia.idFamilia, familia.nome_familia,familia.data_nascimento_familia,
familia.sexo_familia,contato.celular,contato.telefone,contato.email,familia.complemento_familia,
familia.n_familia,familia.data_atendimento,codigoEnderecoPostal.cep,codigoEnderecoPostal.rua,
codigoEnderecoPostal.bairro,codigoEnderecoPostal.estado,codigoEnderecoPostal.cidade	 FROM familia INNER JOIN contato ON familia.idFamilia = contato.IdContato 
INNER JOIN codigoEnderecoPostal on familia.idFamilia = idCep where idFamilia=1;
SELECT idCep FROM codigoEnderecoPostal WHERE idCep = LAST_INSERT_ID();