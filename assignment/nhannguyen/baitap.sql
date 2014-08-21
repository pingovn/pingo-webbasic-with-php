-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 19, 2014 at 01:00 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `baitap`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_author` varchar(200) NOT NULL,
  `user` varchar(200) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user_author`, `user`, `comment`) VALUES
(19, 'admin', 'admin', '12345'),
(21, 'admin', 'minhcong', 'TrÃªn tá» Goal, tiá»n vá»‡ Lucas Moura cá»§a PSG hy vá»ng ráº±ng HLV Dunga sáº½ Ä‘á»ƒ máº¯t tá»›i mÃ¬nh Ä‘á»ƒ cÃ³ cÆ¡ há»™i quay trá»Ÿ láº¡i ÄT Brazil. Láº§n cuá»‘i cÃ¹ng cáº§u thá»§ nÃ y xuáº¥t hiá»‡n trong mÃ¹a Ã¡o ÄTQG á»Ÿ tráº­n Ä‘áº¥u vá»›i Zambia vÃ o thÃ¡ng 10 nÄƒm ngoÃ¡i.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `birthday` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `interested` varchar(200) DEFAULT NULL,
  `avatar` varchar(500) DEFAULT NULL,
  `about` text,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `fullname`, `birthday`, `email`, `gender`, `interested`, `avatar`, `about`) VALUES
('admin', '12345', 'Nguyá»…n VÄƒn NhÃ n', '20-AUG-2014', 'haohmaruru@yahoo.com', 'Male', 'Software', 'data/10390545_1455219778057421_1944567501259026966_n.jpg', ''),
('ductran', '1233445', 'Tráº§n LÃª Viá»‡t Äá»©c', '06-AUG-2014', 'haohmaruru@yahoo.com', 'Male', 'Software', 'data/10390545_1455219778057421_1944567501259026966_n.jpg', 'TrÃªn tá» talkSPORT, cá»±u trá»£ lÃ½ HLV M.U, Rene Meulensteen Ä‘Ã£ bÃ y tá» sá»± lo láº¯ng vá» tÃ¬nh hÃ¬nh tÄƒng cÆ°á»ng lá»±c lÆ°á»£ng cá»§a CLB. Ã”ng thÃºc giá»¥c Quá»· Ä‘á» nÃªn bá»• sung thÃªm Ã­t nháº¥t 1 trung vá»‡, 1 tiá»n vá»‡ trong thá»i gian cÃ²n láº¡i cá»§a â€œchá»£ HÃ¨â€'),
('minhcong', '12345', 'Nguyá»…n CÃ´ng Minh', '04-MAY-1992', 'we_love_we2000@yahoo.com', 'Male', 'Sport, Software, Music', 'data/P1070615.JPG', 'á»ž chÃ¢u Ã‚u hiá»‡n táº¡i, Chelsea lÃ  1 trong nhá»¯ng Ä‘á»™i bÃ³ng cÃ³ nguá»“n nhÃ¢n sá»± dá»“i dÃ o nháº¥t, Ä‘áº·c biá»‡t lÃ  cÃ¡c tÃ i nÄƒng tráº». Tuy nhiÃªn, do khÃ´ng sá»­ dá»¥ng háº¿t sá»‘ cáº§u thá»§ nÃ y, gÃ£ nhÃ  giÃ u thá»§ Ä‘Ã´ London buá»™c pháº£i thá»±c thi chÃ­nh sÃ¡ch cho mÆ°á»£n. CÃ¡ch Ä‘Ã¢y Ã­t giá», The Blues láº¡i Ä‘áº©y 1 cáº§u thá»§ ná»¯a khá»i Stamford Bridge theo lá»™ trÃ¬nh áº¥y. ÄÃ³ lÃ  Josh McEachran.'),
('minhdong', '12345', 'Minh Dong', '03-AUG-2011', 'haohmaruru@yahoo.com', 'Female', 'Software, Music', 'data/10301455_727391057309357_4162503817986182256_n.jpg', 'TrÆ°á»›c thá»m tráº­n lÆ°á»£t Ä‘i SiÃªu cÃºp TÃ¢y Ban Nha, HLV Ancelotti cho ráº±ng Di Maria váº«n lÃ  ngÆ°á»i cá»§a Real Madrid. Tuy nhiÃªn, Ã´ng cÅ©ng tuyÃªn bá»‘ ngay cáº£ khi tiá»n vá»‡ nÃ y ra Ä‘i cÅ©ng khÃ´ng áº£nh hÆ°á»Ÿng lá»›n tá»›i Los Blancos.'),
('nhannguyen', '12345', 'Nguyá»…n', '20-AUG-2014', 'we_love_we2000@yahoo.com', 'Male', '', 'data/10330327_1494942594058325_5947518608720532068_n.jpg', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
