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
	quantidade_estoque int(4) not null,
    tipo_estoque varchar(20)
);
insert into estoque (produto_Estoque,quantidade_estoque) values
("cestas",0);

create table entradaEstoque(
    id_entradaEstoque int (4) primary key not null auto_increment,
    quantidade_entradaEstoque int(4) not null,
    data_entradaEstoque date,
    usuario_entradaEstoque int(4),
    estoque_entradaEstoque int(4),
	foreign key (estoque_entradaEstoque) references estoque(id_estoque),
    foreign key (usuario_entradaEstoque) references usuario(id_usuario)
);

create table saidaEstoque(
    id_saidaEstoque int (4) primary key not null auto_increment,
    quantidade_saidaEstoque int(4) not null,
    data_saidaEstoque date,
    usuario_saidaEstoque int(4),
    responsavel_saidaEstoque int(4),
	estoque_saidaEstoque int(4),
    foreign key (estoque_saidaEstoque) references estoque(id_estoque),
    foreign key (usuario_saidaEstoque) references usuario(id_usuario),
    foreign key (responsavel_saidaEstoque) references responsavel_familia(id_responsavel)
);


delimiter $
	create trigger cadastroEntrada after insert on entradaEstoque
    for each row
		begin 
			update estoque set quantidade_estoque = quantidade_estoque + new.quantidade_entradaEstoque
            where id_estoque = new.estoque_entradaEstoque;
		end$
delimiter ;

delimiter $
	create trigger cadastroSaida after insert on saidaEstoque
    for each row
		begin 
			update estoque set quantidade_estoque = quantidade_estoque - new.quantidade_saidaEstoque
            where id_estoque = new.estoque_saidaEstoque;
		end$
delimiter ;


/*
delimiter $
	create trigger deletarEntrada after delete on entradaEstoque
    for each row
		begin 
			update estoque set quantidade_estoque = quantidade_estoque - old.quantidade_entradaEstoque
            where id_estoque = old.estoque_entradaEstoque;
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
*/

select * from usuario;
select * from responsavel_familia;
select * from contato;
select * from endereco_postal;
select * from estoque;
select * from saidaEstoque;
select * from entradaEstoque;

drop database ong;