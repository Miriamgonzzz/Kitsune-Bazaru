create table contacto{
id int primariKey AI
nombre varchar 55
apellidos varchar 55
email varchar 55
telefono varchar 9
problema text
{

create table objetos{
id int primariKey AI
nombre varchar
unidades int
precio float
descripcion text
foto varchar null
{
create table usuarios{
id int primariKey AI
nombre varchar
apellidos varchar
email varchar
contrasena varchar
permiso int
{



use usuario;

create table contacto(
id  int not null auto_increment,
nombre varchar (128) not null,
apellidos varchar (128) not null,
email varchar (128) not null,
telefono varchar (128) not null,
problema text(128) not null,
PRIMARY KEY (id)
);
create table objetos(
id int not null auto_increment,
nombre varchar(128) not null,
unidades int(128) not null,
precio float(128) not null,
descripcion text(128) not null,
foto varchar(200) null,
PRIMARY KEY (id)
);
create table usuarios(
id int not null auto_increment,
nombre varchar(128) not null,
apellidos varchar(128)not null,
email varchar(128) not null,
contrasena varchar(128) not null,
permiso int(128) not null,
PRIMARY KEY (id)
);