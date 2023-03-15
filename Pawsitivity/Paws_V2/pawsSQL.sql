-- Adminer 4.7.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `dogs`;
CREATE TABLE `dogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dog_name` varchar(100) NOT NULL,
  `owner_first_name` varchar(100) NOT NULL,
  `owner_last_name` varchar(100) NOT NULL,
  `frequency_of_visits` int(2) NOT NULL,
  `appointment_date` date NOT NULL,
  `reminded` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `dogs` (`id`, `dog_name`, `owner_first_name`, `owner_last_name`, `frequency_of_visits`, `appointment_date`, `reminded`) VALUES
(8,	'Dogg',	'Max',	'Well',	3,	'2019-07-01',	1),
(9,	'Wulf',	'Nate',	'Z',	1,	'2019-07-26',	1),
(10,	'Rufus',	'Jeff',	'Jefferson',	6,	'2019-07-30',	0);

-- 2019-08-11 23:50:36