create database if not exists health;
use health;

SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `helth`;
CREATE TABLE `helth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',  
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;
