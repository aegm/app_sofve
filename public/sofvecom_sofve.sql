/*
Navicat MySQL Data Transfer

Source Server         : sofve
Source Server Version : 50170
Source Host           : 184.173.112.24:3306
Source Database       : sofvecom_sofve

Target Server Type    : MYSQL
Target Server Version : 50170
File Encoding         : 65001

Date: 2013-08-22 15:33:16
*/

SET FOREIGN_KEY_CHECKS=0;

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
  `titulo_post` varchar(40) NOT NULL,
  `contenido_post` mediumtext NOT NULL,
  `fecha_post` date NOT NULL,
  `cantidad_coment_post` int(11) NOT NULL,
  `fecha_publicacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_usuarios` int(11) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_post`),
  KEY `usuarios_posts` (`id_usuarios`),
  KEY `category_post` (`id_category`),
  CONSTRAINT `category_post` FOREIGN KEY (`id_category`) REFERENCES `sofve_category` (`id_category`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuarios_posts` FOREIGN KEY (`id_usuarios`) REFERENCES `sofve_usuarios` (`id_usuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sofve_post
-- ----------------------------
INSERT INTO `sofve_post` VALUES ('1', 'Prueba al sistema', 'Bienvenida  al sistema', '0000-00-00', '0', '2013-08-22 14:57:04', '1', '1');

-- ----------------------------
-- Table structure for sofve_usuarios
-- ----------------------------
DROP TABLE IF EXISTS `sofve_usuarios`;
CREATE TABLE `sofve_usuarios` (
  `id_usuarios` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(32) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tipo_usuario` int(2) NOT NULL,
  PRIMARY KEY (`id_usuarios`),
  UNIQUE KEY `id_usuarios` (`id_usuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of sofve_usuarios
-- ----------------------------
INSERT INTO `sofve_usuarios` VALUES ('1', 'usr_1377188155', '1234', 'reflig_16@hotmail.com', '1');
INSERT INTO `sofve_usuarios` VALUES ('2', 'usr_1377189546', '1234', 'carlos_isturiz020304@hotmail.c', '1');
