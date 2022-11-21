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
			update estoque set quantidade_estoque = quantidade_estoque + old.quantidade_saidaEstoque
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
('admin','40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'A', 'admin@gmail.com'),
('pedro','40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'F', 'pedro@gmail.com'),
('kaiki','40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'F', 'kaikiaoto22@gmail.com'),
('susana','40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'A', 'susana@gmail.com'),
('matheus','40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'A', 'matheus.costa.7p@gmail.com'),
('willian','40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'A', 'willian@gmail.com');

insert into contato ( telefone,celular,email) values
('1141789201','11998087520','henrique@gmail.com'),
('1190876521','11993236765','carlos@gmail.com'),
('1190876521','11993236765','joao@gmail.com'),
('1190876521','11993236765','maria@gmail.com'),
('1190876521','11993236765','douglas@gmail.com'),
('1190876521','11993236765','fabiana@gmail.com'),
('1190876521','11993236765','milena@gmail.com'),
('1190876521','11993236765','ana@gmail.com'),
('1190876521','11993236765','paula@gmail.com'),
('1190876521','11993236765','vagner@gmail.com'),
('1190876521','11993236765','larissa@gmail.com'),
('1190876521','11993236765','gabriel@gmail.com'),
('1145678921','11998926712','manuel@gmail.com');


insert into responsavel_familia(cpf_responsavel,cep_responsavel,contato_responsavel,nome_responsavel,data_nascimento_responsavel,
complemento_responsavel,num_responsavel,data_atendimento_responsavel,sexo_responsavel) values
(78905643,'53350590',1,'Henrique Dias de Oliveira',19901103,'apartamento 1',212,20221110,'M'),
(39029312,'79044532',2,'Carlos da Costa Silva',19981123,'',4021,20221110, 'M'),
(90823112,'29167036',3,'Joao Manuel Reis Antonieta',19821107,'',401,20221110, 'M'),
(90231234,'77814291',4,'Maria Queiroz da Rosa',19991230,'',102,20221110, 'F'),
(82312513,'67125288',5,'Douglas Assis Costa ',20010422,'apartamento 4',93,20221110, 'M'),
(89123152,'60812516',6,'Fabiana Gonçalves dos Santos',19770815,'',76,20221110, 'F'),
(94381234,'50865040',7,'Ana Maria de Freitas',19670912,'casa 4',2012,20221110, 'F'),
(71912384,'49043340',8,'Paula Fausto Vieira',19820320,'casa 4',3021,20221110, 'F'),
(91942189,'65051030',9,'Vagner Augusto da Rosa',20000101,'apartamento 2',803,20221110, 'M'),
(12837129,'88303010',10,'Larissa Vicente Ramos',19660609,'',321,20221110, 'F'),
(89571313,'65025660',11,'Gabriel Raimundo da Cunha',19610301,'',431,20221110, 'M'),
(09831902,'77807170',12,'Manuel Benício Castro',19900510,'apartamento 323 bloco C',602,20221110, 'M');


