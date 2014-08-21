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
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `interest` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `avatar` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `about` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `birth`, `email`, `gender`, `interest`, `avatar`, `about`) VALUES
(1, 'ironman', '0d94d92e3dc096f64213a5b34fa9d098', 'Tony Stark', '1973-02-25', 'satvunvechai@yahoo.com', 'Male', 'Sport', 'images/Avengers-War-Machine-icon.jpg', 'Thu mua ve chai cac loai'),
(2, 'batman', 'ec0e2603172c73a8b644bb9456c1ff6e', 'Lao Phu Khong Ten', '1993-12-28', 'batman@gmail.com', 'Male', 'Sport, Software', 'images/Avengers-Hawkeye-icon.jpg', 'Ban thich cay so 1 NY'),
(3, 'hulk', '6c65c70eea67e778272a13ffd20c494c', 'The Hulk', '1963-02-15', 'hulkxanhlo@yahoo.com', 'Male', '', 'images/Avengers-Hulk-icon.jpg', 'Gru uuuuuu'),
(4, 'captain', 'ab334feeb31c05124cb73fa12571c2f6', 'Captain America', '1942-12-13', 'captain@yahoo.com', 'Male', 'Sport', 'images/Avengers-Captain-America-icon.jpg', 'I am Captain'),
(5, 'blackwindow', 'bb84f2958324443bf356f5dca1c2992d', 'Black Window', '1987-12-04', 'blackwindow25@gmail.com', 'Female', 'Other', 'images/Avengers-Black-Widow-icon.jpg', 'Sexy and i know it'),
(6, 'thor', '575e22bc356137a41abdef379b776dba', 'Thor', '1973-02-25', 'thorbede@yahoo.com', 'Other', 'Software', 'images/Avengers-Thor-icon.jpg', ''),
(7, 'tamltn93', '2edae1952bd367aeea32c9edf91ae92c', 'Tam Le', '1993-12-28', 'tamltn93@gmail.com', 'Male', 'Sport, Software, Music, Other', 'images/Avengers-Agent-Coulson-icon.jpg', 'My name is Tam');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
