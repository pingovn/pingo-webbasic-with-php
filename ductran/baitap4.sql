-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 13, 2014 at 08:42 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `baitap4`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `code`, `name`, `quantity`, `price`, `product_image`, `description`) VALUES
(1, 'K12345', 'iphone5', 1, 10, 'data/10390545_1455219778057421_1944567501259026966_n.jpg', 'Cuá»‘i cÃ¹ng huyá»n thoáº¡i cá»§a Barca cÅ©ng khÃ´ng quÃªn nÃ³i vá» HLV Luis Enrique, ngÆ°á»i má»›i nháº­n chá»©c táº¡i Nou Camp trong HÃ¨ nÃ y.'),
(10, 'K1112', 'iphone5s', 10, 100000, 'data/1234.jpg', 'Mua iphone 5 Ä‘Ã£ qua sá»­ dá»¥ng, bÃ¡n iphone 5 cÅ©, thanh lÃ½ iphone 5 vá»›i giÃ¡ ráº» luÃ´n vÃ  ngay? gom tiá»n mua iphone 5S má»›i cá»§a nhÃ  tÃ¡o...'),
(11, 'K11154', ' Nokia Lumia 630 â€“ IPS 4.5" / 5MP / 8GB / 2', 123, 3149000, 'data/nokia620.jpg', 'Nokia tiáº¿p tá»¥c cuá»™c hÃ nh trÃ¬nh chinh phá»¥c ngÆ°á»i dÃ¹ng Windows Phone báº±ng viá»‡c cho ra Ä‘á»i máº«u Lumia 630. Sáº£n pháº©m thá»«a hÆ°á»Ÿng nhá»¯ng nÃ©t thiáº¿t káº¿ áº¥n tÆ°á»£ng cá»§a phiÃªn báº£n Lumia 620 trÆ°á»›c Ä‘Ã³ nhÆ°ng Ä‘Æ°á»£c nÃ¢ng cáº¥p máº¡nh máº½ vá» máº·t cáº¥u hÃ¬nh Ä‘á»“ng thá»i mang láº¡i tráº£i nghiá»‡m thÃº vá»‹ hÆ¡n vá»›i há»‡ Ä‘iá»u hÃ nh Windows Phone 8.1. Äiá»‡n thoáº¡i Nokia Lumia 630 sá»Ÿ há»¯u mÃ n hÃ¬nh lá»›n lÃªn Ä‘áº¿n 4.5" hiá»ƒn thá»‹ hÃ¬nh áº£nh rÃµ nÃ©t. DÃ²ng chip lÃµi tá»© Qualcomm Snapdragon 400 1.2GHz Ä‘Æ°á»£c sá»­ dá»¥ng Ä‘á»ƒ mang láº¡i hiá»‡u nÄƒng xá»­ lÃ½ máº¡nh máº½. So vá»›i ngÆ°á»i tiá»n nhiá»‡m, Nokia Ä‘Ã£ nhÃ¢n Ä‘á»‘i khe SIM, mang Ä‘áº¿n cho ngÆ°á»i dÃ¹ng sá»± lá»±a chá»n háº¥p dáº«n.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
