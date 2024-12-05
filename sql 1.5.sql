/*insert into armazem values(null, 'hg cebolas', 1000, 'casa nova'),
(null, 'andré', 1200, 'lagoa grande'),
(null, 'pedro', 1500, 'juazeiro')*/

/*insert into produtos values(null,'Cebolitos','Salgadinho', 10.50),
(null, 'molho de tomate','molho', 3.50),
(null, 'flocão', 'farinha', 1.50)*/

/*insert into prodarm values(null, 1,1,20000),
(null,2,2,40000)*/

/*insert into ord_compra values(null,'2024-06-14','Mix Matheus'),
(null, '2024-06-14','Atacadão'),
(null, '2024-06-14', 'Assaí')*/

#insert into prod_compra values(null, 100, 2000.00,1, 1)

#select nome, cap_max, loc from armazem

#update produtos set descr = 'Salgado' where id = 1;
select * from produtos

#select produtos.nome as 'Produto', armazem.nome as 'Armazem', prodarm.qtd_disp from produtos, armazem, prodarm where produtos.id = prodarm.id_prod and armazem.id = prodarm.id_arm