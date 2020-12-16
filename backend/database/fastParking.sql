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
    placa varchar(8) not null,
    dataEntrada datetime not null,
    horaSaida datetime,
    codComprovante text,
    statusCliente boolean,
    constraint Fk_movimento_preco
    foreign key(idPreco)
    references tblpreco(idPreco)
);

insert into tblmovimento
	(
    placa,
    dataEntrada,
    codComprovante,
    statusCliente
    ) values 
    (
		'ABC-4321',
        current_timestamp(),
        concat_ws('-', second(curtime()), hour(curtime()), second(curtime()), month(curdate()), minute(curtime()), month(curdate())),
        1
    );

select * from tblmovimento;

select tblmovimento.*, tblpreco.nome, tblpreco.valor
from tblpreco inner join tblmovimento
    on tblmovimento.idPreco = tblpreco.idPreco;

select concat(valor,".00", " R$") as preco, tblmovimento.* from tblpreco inner join;

select tblmovimento.*, tblpreco.nome, concat(valor,".00", " R$") as valor
            from tblpreco inner join tblmovimento
            on tblmovimento.idPreco = tblpreco.idPreco;

update tblmovimento set
idPreco = '1',
horaSaida = current_timestamp(),
statusCliente = 0
where idMovimento = 2;

update tblmovimento set
idPreco = '1',
horaSaida = current_timestamp(),
statusCliente = 0
where idMovimento = 2;

select * from tblpreco;

update tblpreco set
valor = '8'
where idPreco = 1;

/*
select tblmovimento.* ,tblpreco.* , tblvaga.bloco 
from tblvaga inner join tblmovimento
on tblmovimento.idVagas = tblvaga.idVagas
inner join tblpreco
on tblmovimento.idPreco = tblpreco.idPreco;

insert into tblmovimento values (2, 2,'BEE4R22' ,'2020-12-10', '15:30', '17:30', '2020121015302', 1, 0);


insert into tblpreco value 
(1, 'one hour', 8.00),
(2, 'outher hour', 4.00);

insert into tblvaga value 
(1, 300)
*/