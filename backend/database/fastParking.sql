create database dbFastParking;
use dbFastParking;

create table tblpreco(
	idPreco int not null auto_increment primary key,
    nome varchar(40) not null,
    valor int not null
);

create table tblmovimento(
	idMovimento int not null auto_increment primary key,
    preco int,
    placa varchar(8) not null,
    dataEntrada datetime not null,
    horaSaida datetime,
    codComprovante text,
    statusCliente boolean
);
/*
select count(*) as total FROM tblmovimento
where statusCliente = 1;

insert into tblmovimento
	(
    placa,
    dataEntrada,
    codComprovante,
    statusCliente
    ) values 
    (
		'AAA-3322',
        current_timestamp(),
        concat_ws('-', second(curtime()), hour(curtime()), second(curtime()), month(curdate()), minute(curtime()), month(curdate())),
        1
    );


select * from tblmovimento;

select tblmovimento.*, tblpreco.nome, tblpreco.valor
from tblpreco inner join tblmovimento
    on tblmovimento.idPreco = tblpreco.idPreco;

select tblmovimento.*, concat(preco,".00", " R$") as valor
from tblmovimento;

select tblmovimento.*, tblpreco.nome, concat(valor,".00", " R$") as valor
            from tblpreco inner join tblmovimento
            on tblmovimento.idPreco = tblpreco.idPreco;

update tblmovimento set
preco = 8,
horaSaida = current_timestamp(),
statusCliente = 0
where idMovimento = 3;

select * from tblpreco;

update tblpreco set
valor = '8'
where idPreco = 1;

insert into tblpreco (nome, valor)
values ('one hour', '8'),('other hour', '4');
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