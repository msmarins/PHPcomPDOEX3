CREATE DATABASE IF NOT EXISTS pdo;

USE pdo;

CREATE TABLE IF NOT EXISTS `alunos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nota` int(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO alunos (id,nome,nota) VALUES
(1,'Marcio',8),
(2,'Carlos',3),
(3,'Andre',9),
(4,'Caique',8),
(5,'Alana',5),
(6,'Marta',0),
(7,'Alberto',6),
(8,'Valter',1),
(9,'Carleto',9),
(10,'Michel',7),
(11,'Horlando',10),
(12,'Angelica',9),
(13,'Maury',7),
(14,'Alan',10),
(15,'Cosme',5),
(16,'Joao',5),
(17,'Maite',4),
(18,'Bianca',10),
(19,'Osvaldo',2),
(20,'Debora',1);

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `senha` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO usuarios (id,login,senha) VALUES
(1,'marcio','ca0cd09a12abade3bf0777574d9f987f'),/*senha = aluno*/
(2,'tutor','1f6f42334e1709a4e0f9922ad789912b');/*senha = tutor*/

