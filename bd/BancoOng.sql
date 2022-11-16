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
    nome_usuario varchar(20) not null,
    senha_usuario char(40) not null,
    tipo_usuario varchar(1) not null,
    email_usuario varchar(90) not null,
	foto_usuario char(40),
    imagem_usuario blob,
    recuperar_senha varchar(200)
);

create table responsavel_familia(
id_responsavel int(4) primary key not null auto_increment,
cpf_responsavel int (11) not null,
cep_responsavel char (8),
contato_responsavel int (4),
nome_responsavel varchar(90) not null,
data_nascimento_responsavel date,
complemento_responsavel varchar(40),
num_responsavel int(5),
data_atendimento_responsavel date,
sexo_responsavel char(1),
foreign key(contato_responsavel) references contato(id_contato)
);
create table estoque(
	id_estoque int(4) primary key not null auto_increment,
    produto_estoque varchar(20) not null,
	quantidade_estoque int(4) not null
);

create table entradaEstoque(
    id_entradaEstoque int (4) primary key not null auto_increment,
    quantidade_entradaEstoque int(4) not null,
    data_entradaEstoque date not null,
    usuario_entradaEstoque int(4),
    estoque_entradaEstoque int(4),
	foreign key (estoque_entradaEstoque) references estoque(id_estoque),
    foreign key (usuario_entradaEstoque) references usuario(id_usuario)
);
create table saidaEstoque(
    id_saidaEstoque int (4) primary key not null auto_increment,
    quantidade_saidaEstoque int(4) not null,
    data_saidaEstoque date not null,
    usuario_saidaEstoque int(4),
    responsavel_saidaEstoque int(4),
	estoque_saidaEstoque int(4),
    foreign key (estoque_saidaEstoque) references estoque(id_estoque),
    foreign key (usuario_saidaEstoque) references usuario(id_usuario),
    foreign key (responsavel_saidaEstoque) references responsavel_familia(id_responsavel)
);
create table financeiro(
	id_financeiro int (4) primary key not null auto_increment,
    tipo_financeiro char(1) not null,
    descricao_financeiro varchar(55) not null,
    valor_financeiro decimal(6,2) not null,
    data_financeiro date not null,
    usuario_financeiro int(4),
    foreign key (usuario_financeiro) references usuario(id_usuario)
);

/*Trigers de Entrada*/
delimiter $
	create trigger cadastroEntrada after insert on entradaEstoque
    for each row
		begin 
			update estoque set quantidade_estoque = quantidade_estoque + new.quantidade_entradaEstoque
            where id_estoque = new.estoque_entradaEstoque;
		end$
delimiter ;

delimiter $
	create trigger deletarEntrada after delete on entradaEstoque
    for each row
		begin 
			update estoque set quantidade_estoque = quantidade_estoque - old.quantidade_entradaEstoque
            where id_estoque = old.estoque_entradaEstoque;
		end$
delimiter ;

/*Trigers de Entrada*/

/*Trigers de Saida*/
delimiter $
	create trigger cadastroSaida after insert on saidaEstoque
    for each row
		begin 
			update estoque set quantidade_estoque = quantidade_estoque - new.quantidade_saidaEstoque
            where id_estoque = new.estoque_saidaEstoque;
		end$
delimiter ;

delimiter $
	create trigger deletaSaida after delete on saidaEstoque
    for each row
		begin 
			update estoque set quantidade_estoque = quantidade_estoque - old.quantidade_saidaEstoque
			where id_estoque = old.estoque_saidaEstoque;
		end$
delimiter ;

/*Trigers de Saida*/

select * from usuario;
select * from responsavel_familia;
select * from contato;
select * from endereco_postal;
select * from estoque;
select * from saidaEstoque;
select * from entradaEstoque;
select * from financeiro;
drop database ong;

insert into estoque (produto_Estoque,quantidade_estoque) values
("cestas",0);

insert into usuario (nome_usuario,senha_usuario,tipo_usuario,email_usuario) values
('teste','40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'F', 'teste@gmail.com'),
('kaiki','40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'F', 'kaikiaoto22@gmail.com'),
('admin','40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'A', 'admin@gmail.com'),
('matheus','40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'A', 'matheus.costa.7p@gmail.com');

insert into contato ( telefone,celular,email) values
('1141789201','11998087520','henrique@gmail.com'),
('1190876521','11993236765','carlos@gmail.com'),
('1145678921','11998926712','renata@gmail.com');

insert into responsavel_familia(cpf_responsavel,cep_responsavel,contato_responsavel,nome_responsavel,data_nascimento_responsavel,
complemento_responsavel,num_responsavel,data_atendimento_responsavel,sexo_responsavel) values
(78905643,'53350590',1,'Henrique Dias de Oliveira',19801203,'apartamento 1',223,20221110,'M'),
(39029312,'79044532',2,'Carlos da Costa Silva',19981123,'casa 4',401,20221110, 'M'),
(32451232,'29177235',3,'Renata Gomes Santana',20000804,'apartamento 323 bloco C',602,20221110, 'F');



