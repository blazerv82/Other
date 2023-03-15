-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `description` varchar(500) NOT NULL,
  `type` varchar(500) NOT NULL,
  `priority` int(1) NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tasks` (`id`, `description`, `type`, `priority`, `time_created`) VALUES
(86,	'heres\'s a task',	'1',	2,	'2019-10-07 06:42:47'),
(87,	'reminder',	'2',	2,	'2019-10-07 06:42:52'),
(88,	'note',	'3',	3,	'2019-10-07 06:42:56');

-- 2019-10-07 19:51:36
