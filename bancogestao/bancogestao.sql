create  database financeiro;

use financeiro;
/*o innoDB é o mecanismo d atabela que vai permitir a definição das chaves estrangeiras. o charset é a tabela de caracteres ultilizadas por padrão por default. o unique serve para não obter o mesmo nome.  */

create table tipodereceita (ID int  primary key auto_increment) engine=InnoDB default charset=latin1;
alter table tipodereceita add nome varchar(20) not null unique;

create table tipodedespesa (ID int primary key auto_increment) engine=InnoDB  default charset=latin1;
alter  table tipodedespesa add nome varchar(20) not null unique;

create table contamovimento (ID int primary key auto_increment) engine=InnoDB default charset=latin1;
alter table contamovimento add nome varchar(20)  not null unique;
alter table contamovimento add saldo decimal (10,2)  default 0.0;

create table formadepagamento (ID int primary key auto_increment) engine=InnoDB  default charset=latin1;
alter table formadepagamento add nome varchar(20) not null unique;

create table receber (ID int primary key auto_increment)  engine=InnoDB default charset=latin1;
alter table receber add divenc date;
alter table receber add historico varchar(30) not null;
alter table receber add valor decimal(10,2) default 0.0;
alter table receber add liquidado decimal(10,2) default 0.0;
alter table receber add IDtipodereceita int not null;
alter table receber add foreign key (IDtipodereceita) references tipodereceita (ID);

create table pagar (ID int primary key auto_increment)  engine=InnoDB default charset=latin1;
alter table pagar add divenc date;
alter table pagar add historico varchar(30) not null;
alter table pagar add valor decimal(10,2) default 0.0;
alter table pagar add liquidado decimal(10,2) default 0.0;
alter table pagar add IDtipodedespesa int not null;
alter table pagar add foreign key (IDtipodedespesa) references  tipodedespesa (ID);

create table debito (ID int primary key auto_increment) engine=InnoDB default charset=latin1;
alter table debito add dtpag date;
alter table debito add valor decimal(10,2);
alter table debito add IDformadepagamento int not null;
alter table debito add foreign key (IDformadepagamento) references formadepagamento (ID); 
alter table debito add IDcontamovimento int not null;
alter table debito add foreign key (IDcontamovimento) references contamovimento (ID);

 



