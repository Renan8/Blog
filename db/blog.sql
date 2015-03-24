create database blog
use blog

/*Se a entidade tag for independente (Optei por esse modelo)*/
CREATE TABLE USUARIO
	(id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	 nome VARCHAR(32),
	 e_mail VARCHAR(16),
	 foto VARCHAR(64),
	 _data DATE,
	 senha VARCHAR(32));
	 
CREATE TABLE TAG 
	(id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	 nome VARCHAR(32));
	 
CREATE TABLE POST
	(id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	 id_usuario INT,
	 titulo VARCHAR(32),
	 _data DATE,
	 corpo VARCHAR(1024),
	 CONSTRAINT POST_FK
		FOREIGN KEY (id_usuario) REFERENCES USUARIO(id));
		
CREATE TABLE TEM
	(id_post INT NOT NULL,
	 id_tag INT NOT NULL,
	 CONSTRAINT TEM_PK
		PRIMARY KEY(id_post, id_tag),
	 CONSTRAINT TEM_FK1
		FOREIGN KEY (id_post) REFERENCES POST(id),
	 CONSTRAINT TEM_FK2
		FOREIGN KEY (id_tag) REFERENCES TAG(id));
		

	
/* Se a entidade tag for entidade fraca de post.(Porém existe repetição de informação: atributo nome)*/
CREATE TABLE USUARIO
	(id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	 nome VARCHAR(32),
	 e_mail VARCHAR(16),
	 foto VARCHAR(64),
	 dat DATE,
	 senha VARCHAR(32));
	 
CREATE TABLE POST
	(id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	 id_usuario INT,
	 titulo VARCHAR(32),
	 dat DATE,
	 corpo VARCHAR(1024),
	 CONSTRAINT POST_FK
		FOREIGN KEY (id_usuario) REFERENCES USUARIO(id));
		
CREATE TABLE TAG 
	(id_post INT NOT NULL,
	 nome VARCHAR(32) NOT NULL
	 CONSTRAINT TAG_PK
		PRIMARY KEY(id_post, nome),
	 CONSTRAINT TAG_FK 
		FOREIGN KEY (id_post) REFERENCES POST(id));