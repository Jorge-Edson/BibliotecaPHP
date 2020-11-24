CREATE DATABASE biblioteca;

USE biblioteca;

CREATE TABLE tb_editora
(
    cd_editora INT AUTO_INCREMENT,
    nm_editora VARCHAR(45) NOT NULL,

    PRIMARY KEY (cd_editora),
    CONSTRAINT editora_unica UNIQUE (nm_editora)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE tb_autor
(
    cd_autor INT AUTO_INCREMENT,
    nm_autor VARCHAR(45) NOT NULL,
    PRIMARY KEY (cd_autor)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE tb_categoria
(
    cd_categoria INT AUTO_INCREMENT,
    nm_categoria VARCHAR(45) NOT NULL,
    PRIMARY KEY (cd_categoria),
    CONSTRAINT categoria_unica UNIQUE (nm_categoria)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE tb_usuario
(
    cd_usuario INT AUTO_INCREMENT,
    nm_usuario VARCHAR(50) NOT NULL,
    dt_nascimento DATE NOT NULL,
    dt_cadastro DATETIME NOT NULL,
    nm_cpf INT(11) NOT NULL,
    ds_endereco VARCHAR(100) NOT NULL,
    nm_email VARCHAR(100) NOT NULL,
    cd_senha VARCHAR(45) NOT NULL,
    nr_telefone INT NOT NULL,

    PRIMARY KEY (cd_usuario),
    CONSTRAINT cpf_unico UNIQUE (nm_cpf),
    CONSTRAINT email_unico UNIQUE (nm_email)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE tb_livro
(
    cd_livro INT AUTO_INCREMENT,
    nm_livro VARCHAR(100) NOT NULL,
    cd_isbn VARCHAR(13) NOT NULL,
    nm_url_capa VARCHAR(200) NOT NULL,
    PRIMARY KEY (cd_livro),
    CONSTRAINT isbn_unico UNIQUE (cd_isbn)    
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE tb_editora_livro
(
    id_editora INT,
    id_livro INT,
    FOREIGN KEY (id_editora) REFERENCES tb_editora(cd_editora),
    FOREIGN KEY (id_livro) REFERENCES tb_livro(cd_livro)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE tb_categoria_livro
(
    id_categoria INT,
    id_livro INT,
    FOREIGN KEY (id_categoria) REFERENCES tb_categoria(cd_categoria),
    FOREIGN KEY (id_livro) REFERENCES tb_livro(cd_livro)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE tb_autor_livro
(
    id_autor INT,
    id_livro INT,
    FOREIGN KEY (id_autor) REFERENCES tb_autor(cd_autor),
    FOREIGN KEY (id_livro) REFERENCES tb_livro(cd_livro)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE tb_inventario
(
    cd_inventario INT AUTO_INCREMENT,
    dt_registro DATE NOT NULL,
    id_livro INT,
    PRIMARY KEY (cd_inventario),
    FOREIGN KEY (id_livro) REFERENCES tb_livro(cd_livro)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE tb_emprestimo
(
    cd_emprestimo INT AUTO_INCREMENT,
    dt_emprestimo DATE NOT NULL,
    dt_devolucao DATE NOT NULL,
    vl_emprestimo DECIMAL(7,2),
    id_inventario INT,
    id_usuario INT,
    PRIMARY KEY (cd_emprestimo),
    FOREIGN KEY (id_inventario) REFERENCES tb_inventario(cd_inventario),
    FOREIGN KEY (id_usuario) REFERENCES tb_usuario(cd_usuario)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;