# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.10.2-MariaDB-1:10.10.2+maria~ubu2204)
# Database: rpg-books
# Generation Time: 2023-02-06 12:15:35 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table books
# ------------------------------------------------------------

DROP TABLE IF EXISTS `books`;

CREATE TABLE `books` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `price_paid` float NOT NULL,
  `aquisition_date` date NOT NULL,
  `image_source` varchar(2048) NOT NULL DEFAULT '',
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;

INSERT INTO `books` (`id`, `title`, `price_paid`, `aquisition_date`, `image_source`, `deleted`)
VALUES
	(1,'The Riddle of Steel',53.95,'2017-06-21','https://upload.wikimedia.org/wikipedia/en/2/2a/Riddle_of_steel_rpg_cover.gif',0),
	(2,'AD&D 1st Edition Dungeon Masters Guide',0.5,'2000-01-01','https://upload.wikimedia.org/wikipedia/en/8/8c/DungeonMasterGuide4Cover.jpg',0),
	(3,'AD&D 1st Edition Monster Manual (UK softcover)',10,'2014-05-01','https://upload.wikimedia.org/wikipedia/en/a/ac/MonsterManual-1stEdAD%26D-Cover.jpg',0),
	(4,'Forbidden Lands Boxed Set',40,'2019-11-29','https://upload.wikimedia.org/wikipedia/en/3/3e/Cover_of_Forbidden_Lands_RPG.png',0);

/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
