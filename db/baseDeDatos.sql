
CREATE DATABASE IF NOT EXISTS controlIngreso;
USE controlIngreso;

CREATE TABLE usuarios(
    id_usuario int(3) auto_increment not null,
    tipoDoc_usuario varchar(30) not null,
    documento_usuario varchar(15) not null,
    nombre_usuario varchar(20) not null,
    apellido_usuario varchar(20) not null,
    correo_usuario varchar(30) not null,
    usuario_usuario varchar(20) not null,
    clave_usuario varchar(65) not null,
    rol_usuario varchar(15) not null,
    CONSTRAINT pk_usuario PRIMARY KEY (id_usuario)
)ENGINE=InnoDB;

CREATE TABLE tituladas(
    id_titulada int(3) auto_increment not null,
    nombre_titulada varchar(50) not null,
    ficha_titulada int(10),
    jornada varchar(20),
    CONSTRAINT pk_tituladas PRIMARY KEY (id_titulada)
)Engine=InnoDB;

CREATE TABLE articulos(
    id_articulo int(3) auto_increment not null,
    nombre_articulo varchar(20),
    nombre_articulo_2 varchar(20),
    CONSTRAINT pk_articulos PRIMARY KEY (id_articulo)
)Engine=InnoDB;

CREATE TABLE aprendices(
    id_aprendiz int(3) auto_increment not null,
    id_usuario int(3) not null,
    id_titulada int(3) not null,
    tipoDoc_aprendiz varchar (20) not null,
    documento varchar(25) not null,
    nombre_aprendiz varchar(20) not null,
    apellido_aprendiz varchar(20) not null,
    email_aprendiz varchar(50) not null,
    celular varchar (15),
    serial_articulo_1 varchar(20),
    descrpcion_articulo_1 varchar (100),
    serial_articulo_2 varchar(20),
    descrpcion_articulo_2 varchar (100),
    fecha date,
    id_articulo int (3) not null,
    CONSTRAINT pk_aprendices PRIMARY KEY (id_aprendiz),
    CONSTRAINT fk_aprendiz_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
    CONSTRAINT fk_aprendiz_titulada FOREIGN KEY (id_titulada) REFERENCES tituladas(id_titulada),
    CONSTRAINT fk_aprendiz_articulo FOREIGN KEY (id_articulo) REFERENCES articulos(id_articulo)
)ENGINE=InnoDB;



CREATE TABLE registro(
    id_registro int(3) auto_increment not null,
    id_aprendiz int(3) not null,
    fecha_registro date,
    hora_registro time,
    CONSTRAINT pk_aprendices PRIMARY KEY (id_registro),
    CONSTRAINT fk_registro_aprendiz FOREIGN KEY (id_aprendiz) REFERENCES aprendices(id_aprendiz)
)ENGINE=InnoDB;


