create table estudante_turma(
id int primary key auto_increment,
notas varchar(255) not null,
cod_turma int,
id_estd int,
constraint fk_cod_turma foreign key(cod_turma)
references turma(codigo),
constraint fk_id_estd foreign key (id_estd)
references estudantes(id))