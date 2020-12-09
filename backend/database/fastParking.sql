create database dbFastParking;
use dbFastParking;

create table tblpreco(
	idPreco int not null auto_increment primary key,
    nome varchar(40) not null,
    valor int not null
);
create table tblmovimento(
	idMovimento int not null auto_increment primary key,
    idPreco int,
    dataEntrada date not null,
    horaEntrada time not null,
    horaSaida time,
    codComprovante text,
    statusCliente boolean,
    constraint Fk_movimento_preco
    foreign key(idPreco)
    references tblpreco(idPreco)
);

create table tblvaga(
	idVagas int not null auto_increment primary key,
    bloco varchar(1) not null,
    vagas int not null,
    idMovimento int,
    constraint Fk_vaga_Fk_movimento_preco
    foreign key(idMovimento)
    references tblmovimento(idMovimento)
);
