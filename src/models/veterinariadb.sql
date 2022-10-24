CREATE TABLE servicios (
	id_servi TINYINT NOT NULL AUTO_INCREMENT,
    nom_servi VARCHAR(25) NOT NULL,
    CONSTRAINT id_servi_pk PRIMARY KEY (id_servi)
);
    
INSERT INTO servicios (nom_servi) VALUES
("A. Médica"),
("Estética");

CREATE TABLE citas (
id_cita INT(10) NOT NULL AUTO_INCREMENT,
mascota VARCHAR(30) NOT NULL,
fecha DATE NOT NULL,
hora TIME NOT NULL,
descripcion VARCHAR(100) NOT NULL,
id_servicio TINYINT NOT NULL,
CONSTRAINT id_cita_pk PRIMARY KEY (id_cita),
CONSTRAINT id_servi_fk FOREIGN KEY (id_servicio)
REFERENCES servicios (id_servi));

-- EJEMPLOS DE CITAS --
INSERT INTO citas (mascota, fecha, hora, descripcion, id_servicio) VALUES
("Cheetos", "2022-11-10", "13:00:00", "No come, y esta decaido", 1),
("Kuki", "2022-11-10", "15:00:00", "Corte de Cabello", 2),
("Copi", "2022-11-10", "11:30:00", "No puede abrir su ojo derecho", 1),
("Firulais", "2022-11-11", "13:00:00", "No duerme NADA", 1),
("Timo", "2022-11-11", "14:10:00", "Corte de uñas", 2),
("Chun", "2022-11-12", "12:35:00", "Necesita desparacitarse", 1),
("Kira", "2022-11-15", "14:00:00", "No puede caminar bien", 1);