create table turma(
codigo int primary key auto_increment,
n_max_aluno int not null,
cod_curso int,
id_prof int,
constraint fk_cod_curso foreign key (cod_curso)
references curso(codigo),
constraint fk_id_prof foreign key (id_prof)
references professor(id))