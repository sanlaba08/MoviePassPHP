CREATE DATABASE moviepass;
use moviepass;

#drop database moviepass;

CREATE TABLE cines(
    id_cine int AUTO_INCREMENT,
    nombre_cine varchar(30),
    direccion varchar(30),
    exist boolean,
    CONSTRAINT pk_cines PRIMARY KEY (id_cine),
    CONSTRAINT unk_nombre_cine UNIQUE (nombre_cine)
);

INSERT INTO cines(nombre_cine, direccion,exist) VALUES ("Aldrey","Sarmiento 2685",1),("Ambassador","Cordoba 1673",1);


CREATE TABLE salas(
    id_sala int AUTO_INCREMENT,
    nombre_sala varchar(30),
    id_cine int,
    precio int not null,
    capacidad int not null,
    exist boolean,
    CONSTRAINT pk_sala PRIMARY KEY (id_sala),
    constraint fk_sala_cine foreign key (id_cine) REFERENCES cines(id_cine)
);


CREATE TABLE roles(
    id_rol int,
    rol varchar(30),
    CONSTRAINT pk_roles PRIMARY KEY (id_rol)
);

INSERT INTO roles (id_rol, rol) VALUES (1,"admin"),  (2,"cliente");

CREATE TABLE usuarios(
    id_usuario int AUTO_INCREMENT,
    email varchar(30) ,
    pass varchar(30),
    id_rol int,
    nombre varchar(30),
    apellido varchar(30),
    dni varchar(25) ,
    CONSTRAINT pk_usuario PRIMARY KEY (id_usuario),
    CONSTRAINT fk_usuarios_roles FOREIGN KEY (id_rol) REFERENCES roles(id_rol),
    CONSTRAINT unq_email_usuario UNIQUE (email),
    CONSTRAINT unq_dni_usuario UNIQUE (dni)
);
INSERT INTO usuarios (email,pass,id_rol,nombre,apellido,dni)
VALUES ("agustin@moviepass.com","agustin",2,"agustin","salvador",42157744),
("santiago@moviepass.com","santiago",2,"santiago","labatut",123456789),
("franco@moviepass.com","franco",2,"franco","acebo",987654312),
("abel_capo_95@hotmail.com","1234",2,"Abel","Acuña",38685440),
("admin@moviepass.com","admin",1,"admin","admin",1111111);


CREATE TABLE generos(
    id_genero int,
    nombre_genero varchar(30),
    CONSTRAINT pk_generos PRIMARY KEY (id_genero)
);

CREATE TABLE peliculas( 
    id_pelicula int,
    titulo varchar(40),
    overview varchar(1500),
    original_language varchar(30),
    imagen varchar(500),
    duration time,
    CONSTRAINT pk_peliculas PRIMARY KEY (id_pelicula)
);

CREATE TABLE generos_x_pelicula(
    id_genero int,
    id_pelicula int,
    constraint pk_generos_x_peliculas PRIMARY KEY (id_genero , id_pelicula),
    constraint fk_generos_x_pelicula_generos foreign key (id_genero) REFERENCES generos(id_genero),
    constraint fk_generos_x_pelicula_peliculas foreign key(id_pelicula) REFERENCES peliculas(id_pelicula)
);

CREATE TABLE funciones(
    id_funcion int AUTO_INCREMENT,
    id_sala int,
    id_pelicula int,
    fecha varchar(30),
    hora time,
    hora_final time,
    constraint pk_funciones PRIMARY key (id_funcion),
    constraint fk_funciones_sala foreign key (id_sala) REFERENCES salas(id_sala),
    constraint fk_funciones_pelicula foreign key (id_pelicula) REFERENCES peliculas(id_pelicula)
);


CREATE TABLE compras(
    id_compra int AUTO_INCREMENT,
    id_funcion int,
    fecha varchar(30),
    cantidad_entradas int, 
    total int,
    descuento int,
    id_usuario int,
    constraint pk_compras PRIMARY key (id_compra),
    constraint fk_funcion foreign key (id_funcion) REFERENCES funciones(id_funcion),
    constraint fk_usuario foreign key (id_usuario) REFERENCES usuarios(id_usuario)
);



