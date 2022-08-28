create database ong;
use ong;


/*OK*/
create table cestas(
	idCestas int(4) primary key not null auto_increment,
	quantidade_cestas int(4) not null,
	recebimento_cestas date not null
);

create table usuario(
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
	cep	int (8) primary key not null,
	rua	varchar(45) not null,
	bairro	varchar(25) not null,
	estado	char(2) not null,
	cidade	varchar(25) not null
);


create table pessoa(
idPessoa int(4) primary key not null auto_increment,
pessoa_cep int (8),
pessoa_contato	int (4),
nome_pessoa	varchar(90) not null,
data_nascimento_pessoa date,
complemento_pessoa	varchar(40),
n_pessoa int(5),
data_atendimento date,
sexo_pessoa	char(1),
foreign key(pessoa_cep) references codigoEnderecoPostal(cep),
foreign key(pessoa_contato) references contato(idcontato)
);

select * from usuario;
select * from Pessoa;
select * from Contato;
select * from CodigoEnderecoPostal;

select LAST_INSERT_ID(); 
insert into contato (email) values ("teste");

insert into Pessoa (pessoa_cep,
pessoa_telefone,
nome_pessoa,
complemento_pessoa,
n_pessoa,
email_pessoa,
sexo_pessoa) values(99302322,3,"Vivi","Apart 23","232","vivi@gmail.com","f"

);


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


select pessoa.idPessoa, pessoa.pessoa_cep, pessoa.nome_pessoa,pessoa.data_nascimento_pessoa,pessoa.complemento_pessoa,pessoa.n_pessoa,
pessoa.data_atendimento,pessoa.sexo_pessoa,contato.telefone,contato.celular,contato.email 
from pessoa INNER JOIN contato on pessoa.idPEssoa = contato.IdContato ;


