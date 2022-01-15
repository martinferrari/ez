/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.7.31 : Database - ez_estudio
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ez_estudio` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `ez_estudio`;

/*Table structure for table `post_traducciones` */

DROP TABLE IF EXISTS `post_traducciones`;

CREATE TABLE `post_traducciones` (
  `id_post` int(11) NOT NULL,
  `titulo` varchar(150) DEFAULT NULL,
  `descripcion` text,
  `proyecto` text,
  `ubicacion` text,
  `tipologia` text,
  PRIMARY KEY (`id_post`),
  CONSTRAINT `FK_post_id` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
