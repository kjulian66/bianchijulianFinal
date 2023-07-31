create database julianbianchiFinal;
use julianbianchiFinal;

create table alumnos (
idAlumno int (5) auto_increment,
nombre varchar (10),
apellido varchar (10),
fechaNac date,
cuota float (5),
primary key (idProducto)
);

alter table productos auto_increment = 1000;

select * from productos;

create table roles (
rol tinyint,
descripcion varchar(20),
primary key(rol)
);

insert into roles values(1, "Administrador"), (2, "Usuario");

select * from roles;

create table usuarios (
idUsuario int (5) auto_increment,
nombre varchar (20),
usuario varchar (20),
contrasenia varchar (20),
rol tinyint,
foreign key(rol) references roles(rol),
primary key(idUsuario)
);

insert into usuarios (nombre, usuario, contrasenia, rol) values
("Julian", "Administrador", "admin123", 1);

insert into usuarios (nombre, usuario, contrasenia, rol) values
("Julian", "Usuario", "usu123", 2);


select * from usuarios;

drop table productos;

drop table usuarios;

drop table roles;

drop database julianbianchiguia2;