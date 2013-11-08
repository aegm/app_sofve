/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : sofvecom_sofve

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2013-11-08 16:05:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for sofve_acl
-- ----------------------------
DROP TABLE IF EXISTS `sofve_acl`;
CREATE TABLE `sofve_acl` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `controller` varchar(40) NOT NULL,
  `action` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `controller` (`controller`,`action`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of sofve_acl
-- ----------------------------
INSERT INTO `sofve_acl` VALUES ('3', 'home', 'contacto');
INSERT INTO `sofve_acl` VALUES ('1', 'home', 'index');

-- ----------------------------
-- Table structure for sofve_acl_to_roles
-- ----------------------------
DROP TABLE IF EXISTS `sofve_acl_to_roles`;
CREATE TABLE `sofve_acl_to_roles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `acl_id` int(2) NOT NULL,
  `role_id` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `acl_id` (`acl_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `acl_to_roles_fk2` FOREIGN KEY (`role_id`) REFERENCES `sofve_roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `acl_to_roles_fk1` FOREIGN KEY (`acl_id`) REFERENCES `sofve_acl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sofve_acl_to_roles
-- ----------------------------
INSERT INTO `sofve_acl_to_roles` VALUES ('1', '1', '1');
INSERT INTO `sofve_acl_to_roles` VALUES ('2', '3', '1');

-- ----------------------------
-- Table structure for sofve_category
-- ----------------------------
DROP TABLE IF EXISTS `sofve_category`;
CREATE TABLE `sofve_category` (
  `id_category` int(11) NOT NULL,
  `nombre_category` varchar(50) NOT NULL,
  PRIMARY KEY (`id_category`),
  UNIQUE KEY `id_category` (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sofve_category
-- ----------------------------
INSERT INTO `sofve_category` VALUES ('1', 'Bienvenida');
INSERT INTO `sofve_category` VALUES ('2', 'Tutoriales');

-- ----------------------------
-- Table structure for sofve_comentarios
-- ----------------------------
DROP TABLE IF EXISTS `sofve_comentarios`;
CREATE TABLE `sofve_comentarios` (
  `id_comentario` int(11) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `estado_comen` int(2) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_post` int(11) DEFAULT NULL,
  `id_usuarios` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_comentario`),
  UNIQUE KEY `id_comentario` (`id_comentario`),
  KEY `usuario_comentario` (`id_usuarios`),
  KEY `post_comentario` (`id_post`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sofve_comentarios
-- ----------------------------

-- ----------------------------
-- Table structure for sofve_post
-- ----------------------------
DROP TABLE IF EXISTS `sofve_post`;
CREATE TABLE `sofve_post` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_post` varchar(70) NOT NULL,
  `contenido_post` mediumtext NOT NULL,
  `fecha_post` date NOT NULL,
  `cantidad_coment_post` int(11) NOT NULL,
  `fecha_publicacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_usuarios` int(11) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `img_post` varchar(50) DEFAULT NULL,
  `texto_post` text,
  `video_post` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_post`),
  KEY `usuarios_posts` (`id_usuarios`),
  KEY `category_post` (`id_category`),
  CONSTRAINT `category_post` FOREIGN KEY (`id_category`) REFERENCES `sofve_category` (`id_category`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuarios_posts` FOREIGN KEY (`id_usuarios`) REFERENCES `sofve_usuarios` (`id_usuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sofve_post
-- ----------------------------
INSERT INTO `sofve_post` VALUES ('1', 'Sofve: DiseÑo Web y Servicio a Sus Clientes', 'Bienvenida  al sistema', '0000-00-00', '0', '2013-08-26 16:13:44', '1', '1', '/img/pagina_peq.JPG', null, null);
INSERT INTO `sofve_post` VALUES ('2', 'Zend Framework: Primeros Pasos', 'Damos Inicio a este primer tutorial relacionado al desarrollo web y en esta ocacion al uso de un framework gratutito para el desarrollo de aplicaciones en PHP', '2013-08-26', '0', '2013-08-27 14:49:55', '1', '2', '/img/zend-logo.PNG', 'Damos Inicio al Primer Tutorial relacionado al Zend Framework para el desarrollo de Aplicaciones en Php a continuacion mencionaremos las diferentes formas para el proceso de Instalacion y como iniciar nuestro primer proyecto. <br> - Instalacion Usando Git <br> - Instalacion Usando Composer <br>-  Instalacion a Traves de Zend Tool   ', null);
INSERT INTO `sofve_post` VALUES ('3', 'Disponible la Nueva Version de Boostrap 3', 'Ya se encuentra disponible la nueva version de este popular framework para el desarrollo de aplicaciones Web', '2013-08-29', '0', '2013-08-29 15:08:40', '1', '2', '/img/boostrap.png', 'A continuacion mencionamos las nuevas caracteristicas que trae el nuevo Boostrap 3 <br> - Nuevo diseño y la Posibilidad de un Tema Opcional <br> - El Primero en El desarrollo Responsive para Aplicaciones Mobile <br> - Nuevo Personalizador <br> - Mejor modelo de caja de forma predeterminada. <br> - Sistema de Grid Mejorado <br> - Mejoras en los Pluggins Javascripts <br> - Nueva fuentes Glyphicons. <br> - Nueva barra de Navegación Responsive. <br> - Los Modelos son Mucho mas Sensibles <br> - Adicionado Nuevos Componentes <br> - Removido antiguos Componentes <br> - Mejor Consistencia para el Dimensionamiento de las Clases. <br> - Documentación Actualizada <br> - Eliminado el Soporte para internet explorer 7 y Firefox 3.6', null);
INSERT INTO `sofve_post` VALUES ('4', 'Nueva Imagen Para las conversaciones En Twitter', 'Twitter anucio el lanzamiento de una nueva imagen con el que pretende ofrecer una mejora significativa a sus Usuarios', '2013-08-29', '0', '2013-08-29 15:40:18', '1', '2', '/img/twiiter.gif', 'La Plataforma de Comunicacion dio a conocer un cambio significativo donde los usuarios podran seguir las conversaciones de una forma mas sencilla estos cambios afectaran tanto a Twitter.com como a las apps moviles para Android e IOS <br> A continuacion Podras Observar el Video de las Nuevas Caracteristicas de Twitter para sus usuarios', '//www.youtube.com/embed/BnRmayAuB4M');

-- ----------------------------
-- Table structure for sofve_roles
-- ----------------------------
DROP TABLE IF EXISTS `sofve_roles`;
CREATE TABLE `sofve_roles` (
  `id_rol` int(1) NOT NULL AUTO_INCREMENT,
  `role` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sofve_roles
-- ----------------------------
INSERT INTO `sofve_roles` VALUES ('1', 'Anonymus');
INSERT INTO `sofve_roles` VALUES ('2', 'Registrado');
INSERT INTO `sofve_roles` VALUES ('3', 'Admin');

-- ----------------------------
-- Table structure for sofve_usuarios
-- ----------------------------
DROP TABLE IF EXISTS `sofve_usuarios`;
CREATE TABLE `sofve_usuarios` (
  `id_usuarios` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(32) NOT NULL,
  `email` varchar(30) NOT NULL,
  `role_id` int(1) DEFAULT '1',
  PRIMARY KEY (`id_usuarios`),
  UNIQUE KEY `id_usuarios` (`id_usuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of sofve_usuarios
-- ----------------------------
INSERT INTO `sofve_usuarios` VALUES ('1', 'usr_1377188155', '1234', 'reflig_16@hotmail.com', '1');
INSERT INTO `sofve_usuarios` VALUES ('2', 'usr_1377189546', '1234', 'carlos_isturiz020304@hotmail.c', '1');
