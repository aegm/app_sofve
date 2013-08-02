/*
Created: 29/07/2013
Modified: 02/08/2013
Model: MySQL 5.5
Database: MySQL 5.5
*/

-- Create tables section -------------------------------------------------

-- Table sofvecom_sofve.sofve_post

CREATE TABLE sofvecom_sofve.sofve_post
(
  id_post Int(11) NOT NULL AUTO_INCREMENT,
  titulo_post Varchar(40) NOT NULL,
  contenido_post Mediumtext NOT NULL,
  fecha_post Date NOT NULL,
  cantidad_coment_post Int(11) NOT NULL,
  fecha_publicacion Timestamp NOT NULL,
  id_usuarios Int(11),
  id_category Int(11),
 PRIMARY KEY (id_post)
) ENGINE = InnoDB
;

-- Table sofvecom_sofve.sofve_usuarios

CREATE TABLE sofvecom_sofve.sofve_usuarios
(
  id_usuarios Int(11) NOT NULL,
  usuario Varchar(50) NOT NULL,
  clave Varchar(32) NOT NULL,
  email Varchar(20) NOT NULL,
  tipo_usuario Int(2) NOT NULL
)
;

ALTER TABLE sofvecom_sofve.sofve_usuarios ADD PRIMARY KEY (id_usuarios)
;

ALTER TABLE sofvecom_sofve.sofve_usuarios ADD UNIQUE id_usuarios (id_usuarios)
;

-- Table sofvecom_sofve.sofve_category

CREATE TABLE sofvecom_sofve.sofve_category
(
  id_category Int(11) NOT NULL,
  nombre_category Varchar(50) NOT NULL
)
;

ALTER TABLE sofvecom_sofve.sofve_category ADD PRIMARY KEY (id_category)
;

ALTER TABLE sofvecom_sofve.sofve_category ADD UNIQUE id_category (id_category)
;

-- Table sofvecom_sofve.sofve_comentarios

CREATE TABLE sofvecom_sofve.sofve_comentarios
(
  id_comentario Int(11) NOT NULL,
  comentario Varchar(255) NOT NULL,
  estado_comen Int(2) NOT NULL,
  fecha_creacion Timestamp NOT NULL,
  id_post Int(11),
  id_usuarios Int(11)
)
;

ALTER TABLE sofvecom_sofve.sofve_comentarios ADD PRIMARY KEY (id_comentario)
;

ALTER TABLE sofvecom_sofve.sofve_comentarios ADD UNIQUE id_comentario (id_comentario)
;

-- Create relationships section ------------------------------------------------- 

ALTER TABLE sofvecom_sofve.sofve_post ADD CONSTRAINT usuarios_posts FOREIGN KEY (id_usuarios) REFERENCES sofvecom_sofve.sofve_usuarios (id_usuarios) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE sofvecom_sofve.sofve_post ADD CONSTRAINT category_post FOREIGN KEY (id_category) REFERENCES sofvecom_sofve.sofve_category (id_category) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE sofvecom_sofve.sofve_comentarios ADD CONSTRAINT post_comentario FOREIGN KEY (id_post) REFERENCES sofvecom_sofve.sofve_post (id_post) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE sofvecom_sofve.sofve_comentarios ADD CONSTRAINT usuario_comentario FOREIGN KEY (id_usuarios) REFERENCES sofvecom_sofve.sofve_usuarios (id_usuarios) ON DELETE NO ACTION ON UPDATE NO ACTION
;


