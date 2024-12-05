#create database empresa
#create table armazem(
#id int primary key auto_increment,
#nome varchar(255) not null,
#cap_max int not null,
#loc varchar(255) not null);

#create table produtos(
#id int primary key auto_increment,
#nome varchar(255) not null,
#descr varchar(255) not null,
#preco decimal(10,2) not null);

#create table prodarm(
#id int primary key auto_increment,
#id_prod int,
#id_arm int,
#qtd_disp int not null,
#constraint fk_id_prod foreign key(id_prod)
#references armazem(id));

create table ord_compra(
id int primary key auto_increment,
data_c date not null,
fornecedor varchar(255) not null);

create table prod_compra(
id int primary key auto_increment,
qtd int not null,
preco_compra decimal(10,2) not null,
id_prod int,
id_ord_c int,
constraint fk_id_prod2 foreign key(id_prod)
references produtos(id),
constraint fk_id_ord_c foreign key(id_ord_c)
references ord_compra(id))
