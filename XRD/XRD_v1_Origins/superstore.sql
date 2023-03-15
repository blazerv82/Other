-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2018 at 12:26 AM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `superstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `item_type` varchar(20) NOT NULL,
  `item_rarity` varchar(20) NOT NULL,
  `item_material` varchar(20) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_desc` varchar(250) NOT NULL,
  `item_price` int(20) NOT NULL,
  `sale` varchar(3) NOT NULL,
  `picture` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `item_type`, `item_rarity`, `item_material`, `item_name`, `item_desc`, `item_price`, `sale`, `picture`) VALUES
(1, 'RANGED', 'RARE', 'WOOD', 'Crossbow Golden', 'a crossbow of gold', 62, 'YES', ''),
(2, 'MELEE', 'UNCOMMON', 'OTHER', 'Stick', 'A stick!?', 50, 'NO', '');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `item_type` varchar(20) NOT NULL,
  `item_rarity` varchar(20) NOT NULL,
  `item_material` varchar(20) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_desc` varchar(250) NOT NULL,
  `item_price` int(10) NOT NULL,
  `sale` varchar(3) NOT NULL DEFAULT 'NO',
  `picture` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `item_type`, `item_rarity`, `item_material`, `item_name`, `item_desc`, `item_price`, `sale`, `picture`) VALUES
(29, 'MAGIKAL', 'LEGENDARY', 'WOOD', 'Staff Of Azlan', 'The Magical Staff 3', 100000, 'NO', ''),
(33, 'VEHICLE', 'RARE', 'METAL', 'Ford GT', 'A 2017 Ford GT', 400000, 'NO', ''),
(34, 'RANGED', 'COMMON', 'WOOD', 'Crossbow', 'A crossbow', 1000, 'NO', ''),
(35, 'MELEE', 'UNCOMMON', 'OTHER', 'Stick', 'A stick!?', 50, 'NO', ''),
(39, 'RANGED', 'RARE', 'WOOD', 'Crossbow Golden', 'a crossbow of gold', 123, 'YES', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(1) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'root');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
