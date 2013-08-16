/*
Navicat MySQL Data Transfer

Source Server         : sofve
Source Server Version : 50170
Source Host           : 184.173.112.24:3306
Source Database       : sofvecom_sofve

Target Server Type    : MYSQL
Target Server Version : 50170
File Encoding         : 65001

Date: 2013-08-16 11:15:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for sofve_post
-- ----------------------------
DROP TABLE IF EXISTS `sofve_post`;
CREATE TABLE `sofve_post` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_post` varchar(40) NOT NULL,
  `contenido_post` mediumtext NOT NULL,
  `fecha_post` date NOT NULL,
  `autor_post` varchar(50) NOT NULL,
  `tipo_post` tinyint(4) NOT NULL DEFAULT '0',
  `cantidad_coment_post` int(11) NOT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sofve_post
-- ----------------------------

-- ----------------------------
-- Table structure for sofve_usuarios
-- ----------------------------
DROP TABLE IF EXISTS `sofve_usuarios`;
CREATE TABLE `sofve_usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(32) NOT NULL,
  `email` varchar(20) NOT NULL,
  `tipo_usuario` int(2) NOT NULL,
  PRIMARY KEY (`id_usuarios`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sofve_usuarios
-- ----------------------------
