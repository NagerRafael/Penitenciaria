DROP TABLE IF EXISTS Ficha;
DROP TABLE IF EXISTS Celda;
DROP TABLE IF EXISTS Pabellon;
DROP TABLE IF EXISTS Usuario;

CREATE TABLE "Usuario" (
  "id_usuario" serial,
  "nombre_usuario" varchar(50)  not null,
  "apellido_usuario" varchar(50) not null,
  "username" varchar(100) not null,
  "email" varchar(100) not null,
  "password" varchar(100) not null,
  "rol" json not null,
  "tipo" varchar(100),
  "estado_usuario" varchar(1),
  PRIMARY KEY ("id_usuario")
);

CREATE TABLE "Pabellon" (
	"id_pabellon" serial,
	"nombre_pabellon" varchar(50),
  	"celdas" json not null,
  	"estado_pabellon" varchar(1),
  	PRIMARY KEY ("id_pabellon")
);

CREATE TABLE "Celda" (
  	"id_celda" serial,
  	"id_pabellon" int not null,
  	"nombre_celda" varchar(50),
	"presos" json not null,
  	"capacidad" int not null,
  	"estado_celda" varchar(1),
  PRIMARY KEY ("id_celda"),
  CONSTRAINT "FK_Celda.id_pabellon"
    FOREIGN KEY ("id_pabellon")
      REFERENCES "Pabellon"("id_pabellon")
);

CREATE TABLE "Ficha" (
  	"id_ficha" serial,
	"id_vigilante" int,
  	"nombre_recluso" varchar(500) not null,
  	"apellido_recluso" varchar(500) not null,
  	"delito" varchar(500) not null,
  	"sentencia" int not null,
  	"id_celda" int not null,
  	"info_adicional" varchar(500),
  	"validez" varchar(50),
  	"estado_ficha" varchar(1),
  	PRIMARY KEY ("id_ficha"),
  CONSTRAINT "FK_Ficha.id_vigilante"
    FOREIGN KEY ("id_vigilante")
      REFERENCES "Usuario"("id_usuario"),
  CONSTRAINT "FK_Ficha.id_celda"
    FOREIGN KEY ("id_celda")
      REFERENCES "Celda"("id_celda")
);

select * from ficha;
select * from celda;
select * from pabellon;
select * from usuario;

insert into usuario(
	"nombre_usuario",
	"apellido_usuario",
  	"username",
  	"email",
  	"password",
  	"rol",
  	"estado_usuario"	
) values(
	'admin',
	'admin',
	'admin',
	'admin@gmail.com',
	('ROL_ADMIN'),
	'A'
);

insert into usuario(
	"nombre_usuario",
	"apellido_usuario",
  	"username",
  	"email",
  	"password",
  	"rol",
  	"estado_usuario"	
) values(
	'Jose',
	'Martinez',
	'jose.martinez',
	'jose@gmail.com',
	('ROL_GUARDIA'),
	'A'
);

insert into usuario(
	"nombre_usuario",
	"apellido_usuario",
  	"username",
  	"email",
  	"password",
  	"rol",
  	"estado_usuario"	
) values(
	'Roberto',
	'Vega',
	'roberto.vega',
	'roberto@gmail.com',
	('ROL_VIGILANTE'),
	'A'
);

insert into "Pabellon" (
	"celdas",
	"nombre_pabellon",
  	"estado_pabellon"
) values (
	('N1','N2','N3','N4'),
	'Ala Norte'
	'A'
);

insert into "Celda" (
  	"id_pabellon",
	"nombre_celda",
  	"presos",
  	"capacidad",
  	"estado_celda"
) values (
	1,
	'N1',
	(1),
	4,
	'A'
);

insert into "Ficha" (
  "id_vigilante",
  "nombre_recluso",
  "apellido_recluso",
  "delito",
  "sentencia",
  "celda",
  "info_adicional",
  "validez",
  "estado_ficha"
) values (
	0,
	'gabriel',
	'murillo',
	'robo',
	'1 año',
	'N1',
	' ',
	'NoValidao',
	'A'
);
