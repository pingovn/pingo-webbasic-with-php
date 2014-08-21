-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 19, 2014 at 08:45 AM
-- Server version: 5.5.38
-- PHP Version: 5.3.10-1ubuntu3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `username`, `author`, `comment`, `user_id`) VALUES
(1, 'captain', 'Captain America', 'Hey men, I can comment in here', 4),
(2, 'captain', 'Captain America', 'Hello', 4),
(3, 'captain', 'Captain America', 'You look great :D ', 2),
(4, 'captain', 'Captain America', 'Hey kiki =))', 3),
(5, 'hulk', 'HULK HULK ', '@captain F*** you', 3),
(6, 'hulk', 'HULK HULK ', 'Hey', 2),
(7, 'hulk', 'HULK HULK ', '@#$##', 4),
(8, 'hulk', 'HULK HULK ', 'hey', 4),
(9, 'hulk', 'HULK HULK ', 'spam', 4),
(10, 'hulk', 'HULK HULK ', 'hey', 4),
(11, 'ironman', 'Tony Stark', 'gell', 1),
(12, 'ironman', 'Tony Stark', 'gey man\r\n', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
