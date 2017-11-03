-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.16-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.3.0.5114
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
  `standar_list_id` int(11) DEFAULT NULL,
  `sku` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `presentation` varchar(200) DEFAULT NULL,
  `job_number` varchar(50) DEFAULT NULL,
  `pieces` int(11) DEFAULT NULL,
  `comment` varchar(200) DEFAULT NULL,
  `creation_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_standar_list` (`standar_list_id`),
  CONSTRAINT `fk_id_standar_list` FOREIGN KEY (`standar_list_id`) REFERENCES `standars_lists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla virbac.standars_steps
CREATE TABLE IF NOT EXISTS `standars_steps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `standar_list_id` int(11) NOT NULL,
  `substep_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `quantity` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_standar_list_2` (`standar_list_id`),
  CONSTRAINT `fk_id_standar_list_2` FOREIGN KEY (`standar_list_id`) REFERENCES `standars_lists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2006259970 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla virbac.steps
CREATE TABLE IF NOT EXISTS `steps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jobs_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `step_id` int(11) DEFAULT NULL,
  `substep_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `status` enum('missing','completed','reassigned') DEFAULT 'missing',
  `comment` varchar(100) DEFAULT NULL,
  `quantity` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_user` (`user_id`),
  KEY `fk_jobs_id` (`jobs_id`),
  CONSTRAINT `fk_id_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_jobs_id` FOREIGN KEY (`jobs_id`) REFERENCES `jobs_orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla virbac.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `paternal_last_name` varchar(50) NOT NULL,
  `maternal_last_name` varchar(50) NOT NULL,
  `access_level` enum('operador','supervisor') NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para disparador virbac.add_steps
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `add_steps` AFTER INSERT ON `jobs_orders` FOR EACH ROW BEGIN
	INSERT INTO steps (SELECT null, new.id, null, standars_steps.id, standars_steps.substep_id, standars_steps.name, 'missing', null, standars_steps.quantity
	 											FROM jobs_orders 
													INNER JOIN standars_lists ON jobs_orders.standar_list_id = standars_lists.id 
													INNER JOIN standars_steps ON standars_lists.id = standars_steps.standar_list_id 
														WHERE jobs_orders.id = new.id);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
