-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.18-log - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para virbac
CREATE DATABASE IF NOT EXISTS `virbac` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `virbac`;

-- Volcando estructura para tabla virbac.jobs_orders
CREATE TABLE IF NOT EXISTS `jobs_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `standar_list_id` int(11) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `presentation` varchar(200) NOT NULL,
  `job_number` varchar(50) NOT NULL,
  `pieces` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `creation_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_standar_list` (`standar_list_id`),
  CONSTRAINT `fk_id_standar_list` FOREIGN KEY (`standar_list_id`) REFERENCES `standars_lists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla virbac.products
CREATE TABLE IF NOT EXISTS `products` (
  `sku` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `presentation` varchar(200) NOT NULL,
  PRIMARY KEY (`sku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla virbac.standars_lists
CREATE TABLE IF NOT EXISTS `standars_lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `presentation` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla virbac.standars_steps
CREATE TABLE IF NOT EXISTS `standars_steps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `standar_list_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_standar_list_2` (`standar_list_id`),
  CONSTRAINT `fk_id_standar_list_2` FOREIGN KEY (`standar_list_id`) REFERENCES `standars_lists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla virbac.steps
CREATE TABLE IF NOT EXISTS `steps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `list_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('miss','completed','reassigned') NOT NULL,
  `comment` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_user` (`user_id`),
  KEY `fk_id_list` (`list_id`),
  CONSTRAINT `fk_id_list` FOREIGN KEY (`list_id`) REFERENCES `jobs_orders` (`standar_list_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_id_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla virbac.substeps
CREATE TABLE IF NOT EXISTS `substeps` (
  `id` int(11) NOT NULL,
  `step_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` enum('miss','completed','reassigned') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_step` (`step_id`),
  CONSTRAINT `fk_id_step` FOREIGN KEY (`step_id`) REFERENCES `steps` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla virbac.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `paternal_last_name` varchar(50) NOT NULL,
  `maternal_last_name` varchar(50) NOT NULL,
  `ocupation` enum('Operador','Supervisor') NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
