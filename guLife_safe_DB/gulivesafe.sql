-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.27 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.2.0.4947
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for gulivesafe
DROP DATABASE IF EXISTS `gulivesafe`;
CREATE DATABASE IF NOT EXISTS `gulivesafe` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `gulivesafe`;


-- Dumping structure for table gulivesafe.admin
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table gulivesafe.admin: ~1 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
	(1, 'admin', 'admin');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;


-- Dumping structure for table gulivesafe.drivers
DROP TABLE IF EXISTS `drivers`;
CREATE TABLE IF NOT EXISTS `drivers` (
  `driver_id` int(11) NOT NULL AUTO_INCREMENT,
  `driver_name` varchar(50) DEFAULT NULL,
  `driver_phone` varchar(50) DEFAULT NULL,
  `driver_status` varchar(50) DEFAULT 'active',
  PRIMARY KEY (`driver_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table gulivesafe.drivers: ~3 rows (approximately)
/*!40000 ALTER TABLE `drivers` DISABLE KEYS */;
INSERT INTO `drivers` (`driver_id`, `driver_name`, `driver_phone`, `driver_status`) VALUES
	(1, 'Ramulu', '9887744555', 'active'),
	(2, 'venkeshwarlu', '7788994455', 'active'),
	(3, 'siddi reddy', '8800221133', 'active');
/*!40000 ALTER TABLE `drivers` ENABLE KEYS */;


-- Dumping structure for table gulivesafe.guknights_service
DROP TABLE IF EXISTS `guknights_service`;
CREATE TABLE IF NOT EXISTS `guknights_service` (
  `gu_knights_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_id` varchar(50) NOT NULL DEFAULT '0',
  `current_location` varchar(50) NOT NULL DEFAULT '0',
  `destination_location` varchar(50) NOT NULL DEFAULT '0',
  `guknights_message` varchar(50) NOT NULL DEFAULT '0',
  `knight_status` varchar(50) NOT NULL DEFAULT 'Not Conformed',
  PRIMARY KEY (`gu_knights_id`),
  KEY `FK_guknights_service_users` (`email_id`),
  CONSTRAINT `FK_guknights_service_users` FOREIGN KEY (`email_id`) REFERENCES `users` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table gulivesafe.guknights_service: ~4 rows (approximately)
/*!40000 ALTER TABLE `guknights_service` DISABLE KEYS */;
INSERT INTO `guknights_service` (`gu_knights_id`, `email_id`, `current_location`, `destination_location`, `guknights_message`, `knight_status`) VALUES
	(5, 'teja@vsmtsolution.com', 'canteen', 'library', 'plss help...', 'Not Conformed'),
	(6, 'teja11@vsmtsolution.com', 'Library', 'Canteen', 'Provide GuKnight Service', 'Not Conformed'),
	(7, 'teja@vsmtsolution.com', 'canteen', 'library', 'send', 'Not Conformed'),
	(8, 'teja@vsmtsolution.com', 'Canteen', 'Library', 'Send guards...', 'Not Conformed');
/*!40000 ALTER TABLE `guknights_service` ENABLE KEYS */;


-- Dumping structure for table gulivesafe.incident_reports
DROP TABLE IF EXISTS `incident_reports`;
CREATE TABLE IF NOT EXISTS `incident_reports` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_id` varchar(50) DEFAULT NULL,
  `image_path` varchar(50) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL,
  `incident_status` varchar(50) DEFAULT 'Not Conformed',
  PRIMARY KEY (`report_id`),
  KEY `FK_incident_reports_users` (`email_id`),
  CONSTRAINT `FK_incident_reports_users` FOREIGN KEY (`email_id`) REFERENCES `users` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table gulivesafe.incident_reports: ~3 rows (approximately)
/*!40000 ALTER TABLE `incident_reports` DISABLE KEYS */;
INSERT INTO `incident_reports` (`report_id`, `email_id`, `image_path`, `message`, `incident_status`) VALUES
	(14, 'shanthismts787@vsmtsolution.com', '8253789.jpeg', 'come fast', 'Not Conformed'),
	(18, 'shanthismts787@vsmtsolution.com', '4955943.jpeg', 'hello world', 'Not Conformed'),
	(19, 'shanthismts787@vsmtsolution.com', 'https://www.youtube.com/embed/k3dJKtQmyd0', 'alert the guard to this location', 'Not Conformed');
/*!40000 ALTER TABLE `incident_reports` ENABLE KEYS */;


-- Dumping structure for table gulivesafe.knight_service_requests
DROP TABLE IF EXISTS `knight_service_requests`;
CREATE TABLE IF NOT EXISTS `knight_service_requests` (
  `knight_id` int(11) NOT NULL AUTO_INCREMENT,
  `gu_knights_id` int(11) DEFAULT NULL,
  `email_id` varchar(50) DEFAULT NULL,
  `guard_id` int(11) DEFAULT NULL,
  `current_location` varchar(50) DEFAULT NULL,
  `destination_location` varchar(50) DEFAULT NULL,
  `guknights_message` varchar(50) DEFAULT NULL,
  `knight_req_status` varchar(50) DEFAULT 'Processing',
  PRIMARY KEY (`knight_id`),
  KEY `FK_knight_service_requests_guknights_service` (`gu_knights_id`),
  KEY `FK_knight_service_requests_users` (`email_id`),
  CONSTRAINT `FK_knight_service_requests_guknights_service` FOREIGN KEY (`gu_knights_id`) REFERENCES `guknights_service` (`gu_knights_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_knight_service_requests_users` FOREIGN KEY (`email_id`) REFERENCES `users` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table gulivesafe.knight_service_requests: ~0 rows (approximately)
/*!40000 ALTER TABLE `knight_service_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `knight_service_requests` ENABLE KEYS */;


-- Dumping structure for table gulivesafe.locations
DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `loction_name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table gulivesafe.locations: ~4 rows (approximately)
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` (`location_id`, `loction_name`) VALUES
	(1, 'Canteen Beside'),
	(2, 'Office Room Beside'),
	(3, 'Cricket Ground'),
	(4, 'Office Room Beside');
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;


-- Dumping structure for table gulivesafe.security_guards
DROP TABLE IF EXISTS `security_guards`;
CREATE TABLE IF NOT EXISTS `security_guards` (
  `guard_id` int(11) NOT NULL AUTO_INCREMENT,
  `guard_name` varchar(50) DEFAULT NULL,
  `guard_phone` varchar(50) DEFAULT NULL,
  `guard_status` varchar(50) DEFAULT 'active',
  PRIMARY KEY (`guard_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table gulivesafe.security_guards: ~1 rows (approximately)
/*!40000 ALTER TABLE `security_guards` DISABLE KEYS */;
INSERT INTO `security_guards` (`guard_id`, `guard_name`, `guard_phone`, `guard_status`) VALUES
	(1, 'Gopi Krishana', '7788994455', 'active');
/*!40000 ALTER TABLE `security_guards` ENABLE KEYS */;


-- Dumping structure for table gulivesafe.shuttle_requests
DROP TABLE IF EXISTS `shuttle_requests`;
CREATE TABLE IF NOT EXISTS `shuttle_requests` (
  `shtle_request_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_id` varchar(50) DEFAULT NULL,
  `shuttle_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `current_loaction` varchar(50) DEFAULT NULL,
  `destination_location` varchar(50) DEFAULT NULL,
  `request_shtle_status` varchar(50) DEFAULT 'Processing',
  PRIMARY KEY (`shtle_request_id`),
  KEY `FK_shuttle_requests_users` (`email_id`),
  KEY `FK_shuttle_requests_shuttle_services` (`shuttle_id`),
  CONSTRAINT `FK_shuttle_requests_shuttle_services` FOREIGN KEY (`shuttle_id`) REFERENCES `shuttle_services` (`shuttle_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_shuttle_requests_users` FOREIGN KEY (`email_id`) REFERENCES `users` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table gulivesafe.shuttle_requests: ~1 rows (approximately)
/*!40000 ALTER TABLE `shuttle_requests` DISABLE KEYS */;
INSERT INTO `shuttle_requests` (`shtle_request_id`, `email_id`, `shuttle_id`, `driver_id`, `current_loaction`, `destination_location`, `request_shtle_status`) VALUES
	(13, 'shanthismts787@vsmtsolution.com', 14, 2, 'Canteen Beside', 'kukatpally', 'Cancelled');
/*!40000 ALTER TABLE `shuttle_requests` ENABLE KEYS */;


-- Dumping structure for table gulivesafe.shuttle_services
DROP TABLE IF EXISTS `shuttle_services`;
CREATE TABLE IF NOT EXISTS `shuttle_services` (
  `shuttle_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_id` varchar(50) NOT NULL DEFAULT '0',
  `current_loaction` varchar(50) DEFAULT NULL,
  `destination_location` varchar(50) DEFAULT NULL,
  `shuttle_message` varchar(50) DEFAULT NULL,
  `shuttle_status` varchar(50) DEFAULT 'Not Conformed',
  PRIMARY KEY (`shuttle_id`),
  KEY `FK_shuttle_services_users` (`email_id`),
  CONSTRAINT `FK_shuttle_services_users` FOREIGN KEY (`email_id`) REFERENCES `users` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- Dumping data for table gulivesafe.shuttle_services: ~6 rows (approximately)
/*!40000 ALTER TABLE `shuttle_services` DISABLE KEYS */;
INSERT INTO `shuttle_services` (`shuttle_id`, `email_id`, `current_loaction`, `destination_location`, `shuttle_message`, `shuttle_status`) VALUES
	(14, 'shanthismts787@vsmtsolution.com', 'Canteen Beside', 'kukatpally', 'fdfdsfdf', 'Cancelled'),
	(21, 'shanthismts787@vsmtsolution.com', 'Office Room Beside', 'secunderabad', 'come to current location', 'Not Conformed'),
	(25, 'teja@vsmtsolution.com', 'Canteen', 'Home', 'Pls provide bus', 'Not Conformed'),
	(26, 'teja11@vsmtsolution.com', 'Library', 'Home', 'pls provide shuttle service...', 'Not Conformed'),
	(27, 'vinodreddy@gmail.com', 'undefined', 'undefined', 'undefined', 'Not Conformed'),
	(28, 'vinodreddy@gmail.com', 'undefined', 'undefined', 'undefined', 'Not Conformed');
/*!40000 ALTER TABLE `shuttle_services` ENABLE KEYS */;


-- Dumping structure for table gulivesafe.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `email_id` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Active',
  PRIMARY KEY (`user_id`),
  KEY `email_id` (`email_id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

-- Dumping data for table gulivesafe.users: ~7 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `username`, `email_id`, `password`, `phone`, `status`) VALUES
	(6, 'shanthi', 'shanthismts787@vsmtsolution.com', '123', '988774455', 'Active'),
	(18, 'shanthi', 'shanthi@vsmtsolution.com', '123', '988774455', 'Active'),
	(26, 'teja', 'teja@vsmtsolution.com', '123', '9618356839', 'Active'),
	(36, 'vinodreddy', 'vinodreddy@gmail.com', '123456', '9985041213', 'Active'),
	(37, 'tejareddy', 'teja11@vsmtsolution.com', '123', '9618356839', 'Active'),
	(62, 'vinod', 'vinod@vsmtsolution.com', '123', '9985041213', 'Active'),
	(63, 'vinodreddy', 'vinod9@gmail.com', '123', '9985041213', 'Active');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
