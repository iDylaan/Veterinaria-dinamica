CREATE DATABASE veterinariadb;

USE veterinariadb;

CREATE TABLE estados_pedido (
	id TINYINT NOT NULL AUTO_INCREMENT,
    estado_pedido VARCHAR(15) NOT NULL,
    CONSTRAINT id_edopedi_pk PRIMARY KEY (id)
) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

INSERT INTO estados_pedido (estado_pedido) VALUES
("Cancelado"),
("Pendiente"),
("Entregado");

CREATE TABLE sexos (
	id TINYINT NOT NULL AUTO_INCREMENT,
    sexo VARCHAR(15) NOT NULL,
    CONSTRAINT id_sexo_pk PRIMARY KEY (id)
) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

INSERT INTO sexos (sexo) VALUES
("Hembra"),
("Macho");


CREATE TABLE servicios (
	id_servi TINYINT NOT NULL AUTO_INCREMENT,
    nom_servi VARCHAR(15) NOT NULL,
    CONSTRAINT id_servi_pk PRIMARY KEY (id_servi)
) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;
    
INSERT INTO servicios (nom_servi) VALUES
("A. Médica"),
("Estética");

CREATE TABLE roles (
    id_rol TINYINT NOT NULL AUTO_INCREMENT,
    nom_rol VARCHAR(12) NOT NULL,
    CONSTRAINT id_rol_pk PRIMARY KEY (id_rol)
) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

INSERT INTO roles (nom_rol) VALUES
("usuario"),
("veterinario"),
("admin");

CREATE TABLE categorias (
    id_cate TINYINT NOT NULL AUTO_INCREMENT,
    nom_cate VARCHAR(12) NOT NULL,
    CONSTRAINT idcate_cates_pk PRIMARY KEY (id_cate)
) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

INSERT INTO categorias (nom_cate) VALUES
("Juguetes"),
("Ropa"),
("Accesorios"),
("Higiene");

CREATE TABLE especies (
    id TINYINT NOT NULL AUTO_INCREMENT ,
    nom_spcie VARCHAR(20) NOT NULL,
    CONSTRAINT id_spcie_pk PRIMARY KEY (id)
) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

INSERT INTO especies (nom_spcie) VALUES
("Canino"),
("Felino"),
("Ave"),
("Reptil"),
("Roedor");

CREATE TABLE razas (
    id TINYINT NOT NULL AUTO_INCREMENT ,
    nombre_raza VARCHAR(30) NOT NULL ,
    id_especie TINYINT NOT NULL ,
    CONSTRAINT id_raza_pk PRIMARY KEY (id),
    CONSTRAINT idspc_rz_fk FOREIGN KEY (id_especie)
    REFERENCES especies (id)
) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

INSERT INTO razas (nombre_raza, id_especie) VALUES
("Labrador", 1),
("Pug", 1),
("Schnauzer", 1),
("Husky Siberiano", 1),
("Pastor Alemán", 1),
("Chihuahua", 1),
("Pitbull", 1),
("Común", 2),
("Persa", 2),
("Azul ruso", 2),
("Siamés", 2),
("Angora turco", 2),
("Siberiano", 2),
("Maine Coon", 2),
("Bengalí", 2),
("Gallina", 3),
("Pato", 3),
("Paloma", 3),
("Perico", 3),
("Canario", 3),
("Iguana", 4),
("Tortuga", 4),
("Camaleón", 4),
("Lagarto", 4),
("Serpiente", 4),
("Salamandra", 4),
("Dragón", 4),
("Ratón", 5),
("Hamster", 5),
("Hurón", 5),
("Ardilla", 5),
("Cobaya", 5),
("Lirón", 5),
("Chinchilla", 5),
("Erizo", 5),
("Liebre", 5),
("Cuyo", 5);

CREATE TABLE productos (
    id INT(11) NOT NULL AUTO_INCREMENT ,
    nombre_prod VARCHAR(60) NOT NULL ,
    descripcion VARCHAR(255) NOT NULL ,
    precio DECIMAL(10,2) NOT NULL ,
    imagen VARCHAR(200) NOT NULL ,
    id_cate TINYINT NOT NULL,
    CONSTRAINT idprod_prods_pk PRIMARY KEY (id),
    CONSTRAINT idcate_prods_fk FOREIGN KEY (id_cate)
    REFERENCES categorias (id_cate)
) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE usuarios (
    id INT(11) NOT NULL AUTO_INCREMENT ,
    nombre VARCHAR(20) NOT NULL ,
    apellido_pa VARCHAR(20) NOT NULL ,
    apellido_ma VARCHAR(20) NOT NULL ,
    correo VARCHAR(65) NOT NULL ,
    contrasena CHAR(60) NOT NULL ,
    fecha_nac DATE NOT NULL , 
    id_rol TINYINT NOT NULL ,
    CONSTRAINT idusr_usrs_pk PRIMARY KEY (id),
    CONSTRAINT id_rol_fk FOREIGN KEY(id_rol)
    REFERENCES roles (id_rol)
) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci; 

CREATE TABLE citas (
    id_cita INT(11) NOT NULL AUTO_INCREMENT ,
    mascota VARCHAR(30) NOT NULL ,
    fecha DATE NOT NULL ,
    hora TIME NOT NULL ,
    descripcion VARCHAR(100) NOT NULL ,
    id_servi TINYINT(4) NOT NULL ,
    id_usr INT(11) NOT NULL ,
    CONSTRAINT id_cita_pk PRIMARY KEY (id_cita),
    CONSTRAINT id_servi_fk FOREIGN KEY (id_servi)
    REFERENCES servicios (id_servi),
    CONSTRAINT idusr_citas_fk FOREIGN KEY (id_usr)
    REFERENCES usuarios(id)
) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE pedidos (
    id_pedido INT(11) NOT NULL AUTO_INCREMENT, 
    fecha DATE NOT NULL ,
    cantidad TINYINT NOT NULL ,
    total DECIMAL(10,2) NOT NULL ,
    id_edopedi TINYINT NOT NULL ,
    id_usr INT(11) NOT NULL ,
    id_prod INT(11) NOT NULL ,
    CONSTRAINT id_pedids_pk PRIMARY KEY (id_pedido) ,
    CONSTRAINT idedp_p_fk FOREIGN KEY (id_edopedi) 
    REFERENCES estados_pedido (id),
    CONSTRAINT idusr_p_fk FOREIGN KEY (id_usr)
    REFERENCES usuarios (id) ,
    CONSTRAINT idprd_p_fk FOREIGN KEY (id_prod)
    REFERENCES productos (id)
) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE expedientes (
    cla_chip VARCHAR(20) NOT NULL,
    mascota VARCHAR(30) NOT NULL ,
    fecha_nac_mascota DATE NOT NULL ,
    telefono VARCHAR(10) NOT NULL ,
    direccion VARCHAR(30) NOT NULL ,
    cp INT(5) NOT NULL ,
    colores VARCHAR(25) NOT NULL ,
    id_sexo_mascota TINYINT NOT NULL,
    id_usr INT(11) NOT NULL ,
    id_raza TINYINT NOT NULL ,
    CONSTRAINT chip_xpd_pk PRIMARY KEY(cla_chip) ,
    CONSTRAINT sex_xpd_fk FOREIGN KEY(id_sexo_mascota)
    REFERENCES sexos (id) ,
    CONSTRAINT idusr_xpd_fk FOREIGN KEY (id_usr)
    REFERENCES usuarios (id) ,
    CONSTRAINT idrz_xpd_fk FOREIGN KEY (id_raza)
    REFERENCES razas (id)
) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;


-- CUENTA ADMINISTRADOR Y VETERINARIO
INSERT INTO usuarios(nombre, apellido_pa, apellido_ma, correo, contrasena, fecha_nac, id_rol) VALUES
("Veterinario", "Hector", "Salamanca", "hectorveterinario01@veterinario.vet.mx", "$2y$10$5TdcH6WWcOtb03KozfDViO7.gpEjcrv9saMM7hc2./sSLb7qoWrHa ", "1975-08-08", "2"), -- psswrd "hector_veterinario01" 
("Admin", "Todo", "Poderoso", "omnipotente9000@admin.god.mx", "$2y$10$xIF1W0eRYTs4oRHBOo.P/.o2uqBI1BTVDU7dNwwQ7dDA7KbOJSR7q ", "1900-01-01", "3");                    -- psswrd "todopoderoso12345"