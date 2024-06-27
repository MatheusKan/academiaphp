Create database bdAcademia;
use bdAcademia;

create table tblogin(
login varchar(30) not null primary Key,
senha varchar(30) not null) ENGINE=InnoDB DEFAULT CHARSET=latin1;

Create table tbAluno(
idAluno int primary key auto_increment
, nome_aluno varchar(40) not null
, cpf char (15)
, endereco varchar(40)
, bairro varchar(40)
, cidade varchar (30)
, estado char(2)
, cep char(9)
, telefone char(14)
, celular char(15)
, email varchar(40) not null unique
, peso decimal(6,3)
, altura decimal(3,2)
, imc decimal(5,3)
, statusAluno varchar(10)
, obs varchar(100)
, senha varchar(30) not null
);

create table tbProfessor(
idProfessor int primary key auto_increment
, nome varchar(40) not null
, telefone char(14)
, celular char(15)
, email varchar(40) not null unique
, senha varchar(30) not null
); 

create table tbTurma(
idTurma int primary key auto_increment
, descricao varchar(30)
, horarioInicio time
, horarioTermino time
, idProfessor int 
, foreign key (idProfessor) references tbProfessor(idprofessor)
);

create table tbMatricula(
idMatricula  int primary key auto_increment
, dataMatricula date
, idAluno int
, idTurma int
, foreign key (idAluno) references tbAluno(idAluno)
, foreign key (idTurma) references tbTurma(idTurma)
);


insert into tblogin values ('mama',123);
insert into tbProfessor(nome,telefone,celular,email,senha) values ('Marcus','(11) 2443-3344','(11) 99999-9999','professor@prof.com','123');
insert into tbAluno(nome_aluno,email,senha) values ('jorge','jorge@gmail.com',123);
select * from tbAluno;
SELECT  t.descricao, t.horarioInicio , t.horarioTermino, p.nome
   FROM tbTurma t
   INNER JOIN tbMatricula m ON m.idTurma = t.idTurma
   INNER JOIN tbProfessor p on p.idProfessor = t.idProfessor
   WHERE m.idAluno = 1;
select * from tbTurma;
select * from tbMatricula;
insert into tbMatricula(dataMAtricula,idAluno,idTurma) values('2024-08-08',1,2);
insert into tbMatricula(dataMAtricula,idAluno,idTurma) values('2024-08-08',1,3);
SELECT t.idTurma as ID, t.descricao, t.horarioInicio, t.horarioTermino, p.nome AS nomeProfessor
   FROM tbTurma t
   INNER JOIN tbMatricula m ON m.idTurma = t.idTurma
   INNER JOIN tbProfessor p ON p.idProfessor = t.idProfessor
   WHERE m.idAluno = 1 and t.idTurma = 2