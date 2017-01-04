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
  `pos` int(2) NOT NULL,
  `nr` int(3) NOT NULL,
  `name` varchar(10) CHARACTER SET utf8 NOT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `def_x` decimal(6,2) NOT NULL,
  `def_y` decimal(6,2) NOT NULL,
  `cur_x` decimal(6,2) NOT NULL,
  `cur_y` decimal(6,2) NOT NULL,
  `display` enum('block','none') CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`pos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `players` */

insert  into `players`(`pos`,`nr`,`name`,`link`,`def_x`,`def_y`,`cur_x`,`cur_y`,`display`) values

(1,22,'Miro','http://www.bamf-bg.eu/uploads/players/t_1477403936__mg_8858.jpg',661.80,200.00,661.80,200.00,'none'),

(2,9,'Boby','http://www.bamf-bg.eu/uploads/players/t_1477403992__mg_8871.jpg',661.80,230.00,661.80,230.00,'none'),

(3,11,'Denis','http://www.bamf-bg.eu/uploads/players/t_1477404015__mg_8859.jpg',661.80,260.00,661.80,260.00,'none'),

(4,3,'Biser','http://www.bamf-bg.eu/uploads/players/t_1477404041__mg_8852.jpg',661.80,290.00,661.80,290.00,'none'),

(5,5,'Bobo','./img/bobo.jpg',661.80,320.00,661.80,320.00,'none'),

(6,7,'Sasho','http://www.bamf-bg.eu/uploads/players/t_1477404116__mg_8864.jpg',661.80,350.00,661.80,350.00,'none'),

(7,16,'Angel','http://www.bamf-bg.eu/uploads/players/t_1477404147__mg_8855.jpg',661.80,380.00,661.80,380.00,'none'),

(8,8,'Ceco','http://www.bamf-bg.eu/uploads/players/t_1477404272__mg_8880.jpg',661.80,410.00,661.80,410.00,'block'),

(9,6,'Boyan T','http://www.bamf-bg.eu/uploads/players/t_1477404163__mg_8876.jpg',661.80,440.00,661.80,440.00,'block'),

(10,69,'Dinko','http://www.bamf-bg.eu/uploads/players/t_1477404358__mg_8877.jpg',661.80,470.00,661.80,470.00,'none'),

(11,23,'Veni','http://www.bamf-bg.eu/uploads/players/t_1477404194__mg_8874.jpg',661.80,500.00,661.80,500.00,'none'),

(12,2,'Magynski','http://www.bamf-bg.eu/uploads/players/t_1477404217__mg_8869.jpg',661.80,530.00,661.80,530.00,'none'),

(13,1,'Iliq','http://www.bamf-bg.eu/uploads/players/t_1477404231__mg_8882.jpg',661.80,560.00,661.80,560.00,'none'),

(14,14,'Stoyan','http://www.bamf-bg.eu/uploads/players/t_1477404250__mg_8865.jpg',661.80,590.00,661.80,590.00,'none');

/*Table structure for table `positions` */

DROP TABLE IF EXISTS `positions`;

CREATE TABLE `positions` (
  `pos` varchar(2) NOT NULL,
  `def_x` decimal(6,2) NOT NULL,
  `def_y` decimal(6,2) NOT NULL,
  PRIMARY KEY (`pos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `positions` */

insert  into `positions`(`pos`,`def_x`,`def_y`) values

('GK',976.80,180.00),

('LB',876.80,260.00),

('LW',1076.80,260.00),

('MC',976.80,335.00),

('RB',876.80,410.00),

('RW',1076.80,410.00);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
