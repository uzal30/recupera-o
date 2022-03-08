create database if not exists recuperacao;

use recuperacao;

create table if not exists produto
(
	cod_produto int auto_increment primary key,
    nm_produto varchar(45),
    preco_produto double,
    qtd_produto int,
    marca_produto varchar(45),
    num_serie int
);

select * from produto;

drop table produto;