DROP TABLE IF EXISTS usuarios; 
CREATE TABLE usuarios
(
	cpf             INTEGER             NOT NULL,
    tipo_usuario    SMALLINT            NOT NULL,
    pnome			VARCHAR(30)			NOT NULL,
	unome			VARCHAR(30)			NOT NULL,
	matricula		INTEGER				UNIQUE,
    email			VARCHAR(50)			UNIQUE,
	senha			VARCHAR(30)			NOT NULL,
	
    PRIMARY KEY (cpf)
);

DROP TABLE IF EXISTS sessao;
create table sessao
(
	id_sessao	    VARCHAR(15)			NOT NULL,
	estante			VARCHAR(30),
	prateleira		VARCHAR(15),
	coluna			VARCHAR(15),

	PRIMARY KEY (id_sessao)
);

DROP TABLE IF EXISTS livros;
create table livros
(
	id_livros       INT                 NOT NULL,
    nome			VARCHAR(50)			NOT NULL,
    isbn			BIGINT				UNIQUE,
	autor			VARCHAR(50)			NOT NULL,
	edicao			INTEGER				DEFAULT 1,
	sessao_id     	VARCHAR(15)         NOT NULL,
	
	PRIMARY KEY (id_livros),
	FOREIGN KEY (sessao_id) REFERENCES sessao (id_sessao)
		ON UPDATE CASCADE
		ON DELETE CASCADE
);

DROP TABLE IF EXISTS escolas;
create table escolas
(
    id_escolas      INT                 NOT NULL,
	nome			VARCHAR(50)			NOT NULL,
	sigla        	VARCHAR(10)			NOT NULL,
    endereco        VARCHAR(50)         NOT NULL,
	
	PRIMARY KEY (id_escolas)
);

DROP TABLE IF EXISTS exemplares;
create table exemplares
(
	codigoexemplar	VARCHAR(50)			NOT NULL,
	codlocalizacao	VARCHAR(50)			NOT NULL,
    emprestado      TINYINT             DEFAULT 0,
    reservado       TINYINT             DEFAULT 0,
    exisbn			BIGINT				NOT NULL,
	exlocalizacao	VARCHAR(50)			NOT NULL,
	
	PRIMARY KEY (codigoexemplar),
	FOREIGN KEY (exisbn) REFERENCES livros (isbn)
	    ON UPDATE CASCADE
		ON DELETE CASCADE,
	FOREIGN KEY (exlocalizacao) REFERENCES escolas (endereco)
	    ON UPDATE CASCADE
		ON DELETE CASCADE
);

DROP TABLE IF EXISTS reservas;
CREATE TABLE reservas 
(
	rmatricula  	INTEGER				NOT NULL,
	rcodigoexemplar VARCHAR(50)			NOT NULL UNIQUE,
	rdata			DATE     			NOT NULL,
	
	PRIMARY KEY (rmatricula, rcodigoexemplar),
	FOREIGN KEY (rmatricula) REFERENCES usuarios (matricula)
	    ON UPDATE CASCADE
		ON DELETE CASCADE,
	FOREIGN KEY (rcodigoexemplar) REFERENCES exemplares (codigoexemplar)
	    ON UPDATE CASCADE
		ON DELETE CASCADE
);

DROP TABLE IF EXISTS emprestimos;
CREATE TABLE emprestimos 
(
	ematricula	    BIGINT				NOT NULL,
	ecodigoexemplar	VARCHAR(50)			NOT NULL UNIQUE,
	dataemprestimo	DATE		    	NOT NULL,
	dataentrega		DATE    			NOT NULL,
	
	PRIMARY KEY (ematricula, ecodigoexemplar),
	FOREIGN KEY (ematricula) REFERENCES usuarios (matricula)
	    ON UPDATE CASCADE
		ON DELETE CASCADE,
	FOREIGN KEY (ecodigoexemplar) REFERENCES exemplares (codigoexemplar)
	    ON UPDATE CASCADE
		ON DELETE CASCADE
);