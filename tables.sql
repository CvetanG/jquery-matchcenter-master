/*
SQLyog Community v12.3.1 (64 bit)
MySQL - 10.1.16-MariaDB : Database - players
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`players` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `players`;

/*Table structure for table `logoes` */

DROP TABLE IF EXISTS `logoes`;

CREATE TABLE `logoes` (
  `logo_id` int(2) NOT NULL AUTO_INCREMENT,
  `company` varchar(50) NOT NULL,
  `logo_link` varchar(100) NOT NULL,
  PRIMARY KEY (`logo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `logoes` */

insert  into `logoes`(`logo_id`,`company`,`logo_link`) values

(1,'Minerva','./img/Minerva-Logo.png'),

(2,'SAP','./img/logo.png');

/*Table structure for table `match_day` */

DROP TABLE IF EXISTS `match_day`;

CREATE TABLE `match_day` (
  `match_id` int(2) NOT NULL AUTO_INCREMENT,
  `logo_home_id` int(2) NOT NULL,
  `logo_away_id` int(2) NOT NULL,
  `match_day` date NOT NULL,
  `match_time` time NOT NULL,
  PRIMARY KEY (`match_id`),
  KEY `logo_home` (`logo_home_id`),
  KEY `logo_away` (`logo_away_id`),
  CONSTRAINT `match_day_ibfk_1` FOREIGN KEY (`logo_home_id`) REFERENCES `logoes` (`logo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `match_day` */

insert  into `match_day`(`match_id`,`logo_home_id`,`logo_away_id`,`match_day`,`match_time`) values

(1,1,2,'2017-03-21','18:45:00');

/*Table structure for table `players` */

DROP TABLE IF EXISTS `players`;

CREATE TABLE `players` (
  `pos` int(2) NOT NULL AUTO_INCREMENT,
  `nr` int(3) NOT NULL,
  `name` varchar(10) CHARACTER SET utf8 NOT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `def_x` decimal(6,2) NOT NULL,
  `def_y` decimal(6,2) NOT NULL,
  `cur_x` decimal(6,2) NOT NULL,
  `cur_y` decimal(6,2) NOT NULL,
  `display` enum('block','none') CHARACTER SET utf8 NOT NULL,
  `injured` enum('block','none') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`pos`),
  UNIQUE KEY `nr_UNIQUE` (`nr`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


/*Data for the table `players` */

insert  into `players`(`pos`,`nr`,`name`,`link`,`def_x`,`def_y`,`cur_x`,`cur_y`,`display`) values

(1,22,'Miro','http://www.bamf-bg.eu/uploads/players/t_1477403936__mg_8858.jpg',15.00,40.00,15.00,40.00,'none','none'),
(2,9,'Boby','http://www.bamf-bg.eu/uploads/players/t_1477403992__mg_8871.jpg',15.00,70.00,15.00,70.00,'none','none'),
(3,11,'Denis','http://www.bamf-bg.eu/uploads/players/t_1477404015__mg_8859.jpg',15.00,100.00,15.00,100.00,'none','none'),
(4,3,'Biser','http://www.bamf-bg.eu/uploads/players/t_1477404041__mg_8852.jpg',15.00,130.00,15.00,130.00,'none','none'),
(5,5,'Bobo','./img/bobo.jpg',15.00,160.00,15.00,160.00,'none','none'),
(6,7,'Sasho','http://www.bamf-bg.eu/uploads/players/t_1477404116__mg_8864.jpg',15.00,190.00,15.00,190.00,'none','block'),
(7,16,'Angel','http://www.bamf-bg.eu/uploads/players/t_1477404147__mg_8855.jpg',15.00,220.00,15.00,220.00,'none','block'),
(8,8,'Ceco','http://www.bamf-bg.eu/uploads/players/t_1477404272__mg_8880.jpg',15.00,250.00,15.00,250.00,'block','none'),
(9,6,'Boyan T','http://www.bamf-bg.eu/uploads/players/t_1477404163__mg_8876.jpg',15.00,280.00,15.00,280.00,'none','block'),
(10,69,'Dinko','http://www.bamf-bg.eu/uploads/players/t_1477404358__mg_8877.jpg',15.00,310.00,15.00,310.00,'none','block'),
(11,23,'Veni','http://www.bamf-bg.eu/uploads/players/t_1477404194__mg_8874.jpg',15.00,340.00,15.00,340.00,'none','block'),
(12,2,'Magunski','http://www.bamf-bg.eu/uploads/players/t_1477404217__mg_8869.jpg',15.00,370.00,15.00,370.00,'none','block'),
(13,1,'Iliq','http://www.bamf-bg.eu/uploads/players/t_1477404231__mg_8882.jpg',15.00,400.00,15.00,400.00,'block','block'),
(14,14,'Stoyan','http://www.bamf-bg.eu/uploads/players/t_1477404250__mg_8865.jpg',15.00,430.00,15.00,430.00,'none','block');

/*Table structure for table `positions` */

DROP TABLE IF EXISTS `positions`;

CREATE TABLE `positions` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `pos` varchar(2) NOT NULL,
  `def_x` decimal(6,2) NOT NULL,
  `def_y` decimal(6,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pos_UNIQUE` (`pos`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `positions` */

insert  into `positions`(`id`,`pos`,`def_x`,`def_y`) values

(1,'GK',330.00,20.00),
(2,'LB',230.00,100.00),
(3,'RB',430.00,100.00),
(4,'MC',330.00,175.00),
(5,'LW',230.00,250.00),
(6,'RW',430.00,250.00);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
