-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2014 at 12:35 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lacphan_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `author`, `comment`, `user_id`) VALUES
(1, 'lac', 'awdwdaw', 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `interested_in` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `about` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=38 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `birthday`, `email`, `gender`, `interested_in`, `avatar`, `about`) VALUES
(13, 'lac', 'new2', 'lacphan', '2014-05-15', 'phanyenphuong@gmail.com', 'Male', 'Software', 'default_img.jpg', 'eqweqeq'),
(14, 'lac', '31232', 'lacphan', '2014-05-15', 'phanyenphuong@gmail.com', 'Male', 'Software', 'default_img.jpg', 'eqweqeq'),
(28, 'hiepsidau', '123123', 'lacphan', '1989-11-05', 'eqwe@gmail.com', 'Male', 'Sport', '9.jpg', '                    wqdwqdqw'),
(29, '4234', '', 'lacphan', '2015-11-05', 'eqwe@gmail.com', 'Male', 'Sport', 'default_img.jpg', '                                '),
(33, '4234', '', 'lacphan', '2015-11-05', 'eqwe@gmail.com', 'Male', 'Sport,Soft', 'default_img.jpg', 'adad'),
(34, '4234', '', 'lacphan', '2015-11-05', 'eqwe@gmail.com', 'Male', 'Sport,Software', 'default_img.jpg', 'adad'),
(37, 'dau', '123456', 'phan thanh lac', '1995-10-15', 'pthanhlac@gmail.com', 'Female', 'Software,Music', 'Beng.jpg', 'rua dau');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
