-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 16, 2014 at 03:35 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `baitap6`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author` varchar(100) NOT NULL,
  `comment` text,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `author`, `comment`, `user_id`) VALUES
(4, 'nhan', 'avarta dep', 2),
(6, 'NhÃ n Nguyá»…n', 'Do David Luiz Ä‘Ã£ chuyá»ƒn sang khoÃ¡c Ã¡o PSG nÃªn chiáº¿c Ã¡o sá»‘ 4 cá»§a trung vá»‡ nÃ y nghiá»…m nhiÃªn thuá»™c vá» Cesc Fabregas. Sá»‘ 3 cá»§a Ashley Cole sáº½ Ä‘Æ°á»£c trao cho Filipe Luis, cÃ²n sá»‘ 19 thuá»™c quyá»n sá»Ÿ há»¯u cá»§a tiá»n Ä‘áº¡o tÃ¢n binh Diego Costa.', 2),
(7, '', 'Vá»›i mÃ n trÃ¬nh diá»…n khÃ¡ áº¥n tÆ°á»£ng trong tour du Ä‘áº¥u HÃ¨ vá»«a qua, bá»™ Ä‘Ã´i Kurt Zouma vÃ  Nathan Ake Ä‘á»u Ä‘Æ°á»£c chuyá»ƒn lÃªn Ä‘á»™i 1. Zouma sáº½ khoÃ¡c Ã¡o sá»‘ 5, cÃ²n sá»‘ 6 lÃ  pháº§n thÆ°á»Ÿng dÃ nh cho Nathan Ake. Trong khi Ä‘Ã³, Victor Moses sáº½ khoÃ¡c sá»‘ Ã¡o 18 cá»§a Romelu Lukaku, ngÆ°á»i Ä‘Ã£ Ä‘Æ°á»£c Chelsea bÃ¡n Ä‘á»©t cho Everton', 2),
(8, '', '', 2),
(9, 'mÃ¨o lÆ°á»i', 'Didier lÃ  huyá»n thoáº¡i cá»§a Chelsea vÃ  lÃ  cáº§u thá»§ dÃ y dáº¡n kinh nghiá»‡m. TÃ´i ráº¥t vui vÃ¬ Ä‘Ã£ nhÆ°á»£ng láº¡i sá»‘ 11 cho anh áº¥y Ä‘á»ƒ chuyá»ƒn sang sá»­ dá»¥ng chiáº¿c Ã¡o sá»‘ 8. Lampard cÅ©ng lÃ  má»™t huyá»n thoáº¡i cá»§a CLB. TÃ´i hi vá»ng sáº½ thÃ nh cÃ´ng khi mang trÃªn mÃ¬nh sá»‘ Ã¡o cá»§a anh áº¥yâ€, Oscar chia sáº».\r\ná»ž mÃ¹a giáº£i 2014-15, Chelsea cÃ²n Ä‘Æ°a ra má»™t sá»‘ sá»± thay Ä‘á»•i khÃ¡c vá» sá»‘ Ã¡o. Trong Ä‘Ã³, Ä‘Ã¡ng chÃº Ã½ lÃ  viá»‡c Eden Hazard Ä‘Æ°á»£c khoÃ¡c chiáº¿c Ã¡o sá»‘ 10, sá»‘ Ã¡o bá» láº¡i cá»§a Juan Mata sau khi tiá»n vá»‡ nÃ y cáº­p báº¿n Man Utd há»“i thÃ¡ng 1/2014.\r\nDo David Luiz Ä‘Ã£ chuyá»ƒn sang khoÃ¡c Ã¡o PSG nÃªn chiáº¿c Ã¡o sá»‘ 4 cá»§a trung vá»‡ nÃ y nghiá»…m nhiÃªn thuá»™c vá» Cesc Fabregas. Sá»‘ 3 cá»§a Ashley Cole sáº½ Ä‘Æ°á»£c trao cho Filipe Luis, cÃ²n sá»‘ 19 thuá»™c quyá»n sá»Ÿ há»¯u cá»§a tiá»n Ä‘áº¡o tÃ¢n binh Diego Costa.\r\nVá»›i mÃ n trÃ¬nh diá»…n khÃ¡ áº¥n tÆ°á»£ng trong tour du Ä‘áº¥u HÃ¨ vá»«a qua, bá»™ Ä‘Ã´i Kurt Zouma vÃ  Nathan Ake Ä‘á»u Ä‘Æ°á»£c chuyá»ƒn lÃªn Ä‘á»™i 1. Zouma sáº½ khoÃ¡c Ã¡o sá»‘ 5, cÃ²n sá»‘ 6 lÃ  pháº§n thÆ°á»Ÿng dÃ nh cho Nathan Ake. Trong khi Ä‘Ã³, Victor Moses sáº½ khoÃ¡c sá»‘ Ã¡o 18 cá»§a Romelu Lukaku, ngÆ°á»i Ä‘Ã£ Ä‘Æ°á»£c Chelsea bÃ¡n Ä‘á»©t cho Everton.', 2),
(12, 'NhÃ n Nguyá»…n', 'BÆ°á»›c sang hiá»‡p hai, nhá»‹p Ä‘á»™ tráº­n Ä‘áº¥u Ä‘Æ°á»£c Ä‘áº©y lÃªn cao hÆ¡n, vÃ  chá»‰ 5 phÃºt sau khi hiá»‡p Ä‘áº¥u báº¯t Ä‘áº§u, U-19 Viá»‡t Nam Ä‘Ã£ cÃ³ bÃ n tháº¯ng vÆ°á»£t lÃªn dáº«n trÆ°á»›c. Tá»« má»™t Ä‘Æ°á»ng chá»c khe khÃ©o lÃ©o cá»§a CÃ´ng PhÆ°á»£ng, Thanh TÃ¹ng Ä‘Ã£ chá»›p thá»i cÆ¡ ghi bÃ n nÃ¢ng tá»· sá»‘ lÃªn 2-1.\r\n\r\nMá»™t láº§n ná»¯a, U-19 Viá»‡t Nam láº¡i khÃ´ng báº£o toÃ n Ä‘Æ°á»£c lá»£i tháº¿ dáº«n Ä‘iá»ƒm. PhÃºt 75, cÃ¡c cáº§u thá»§ tráº» cá»§a chÃºng ta Ä‘Ã£ Ä‘á»ƒ thá»§ng lÆ°á»›i láº§n thá»© hai trong má»™t tÃ¬nh huá»‘ng chá»c khe cá»§a U-21 Brunei. Lá»£i dá»¥ng sÆ¡ há»Ÿ trong hÃ ng phÃ²ng ngá»± Viá»‡t Nam, Adi Said Ä‘Ã£ nhanh chÃ³ng di chuyá»ƒn khÃ©o lÃ©o vÃ  dá»©t Ä‘iá»ƒm trong tÃ¬nh huá»‘ng Ä‘á»‘i máº·t vá»›i thá»§ mÃ´n, áº¥n Ä‘á»‹nh káº¿t quáº£ hÃ²a 2-2.', 4),
(13, 'NhÃ n Nguyá»…n', 'hello', 5),
(14, 'mÃ¨o lÆ°á»i', 'ho lÃ©', 5),
(15, 'NhÃ n Nguyá»…n', 'up lan 1', 6),
(16, 'mÃ¨o lÆ°á»i', 'up lan 3\r\n', 2),
(17, 'mÃ¨o lÆ°á»i', 'avatar Ä‘áº¹p', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `avatar` varchar(500) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `opcupation` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `age`, `avatar`, `gender`, `opcupation`) VALUES
(2, 'Nguyá»…n VÄƒn NhÃ n', 'vannhan.nguyen0405@gmail.com', 22, 'data/10378277_10152231877687713_7594086339878941877_n.jpg', 'Male', ''),
(4, 'Nguyá»…n VÄƒn NhÃ n', 'haohmaruru@yahoo.com', 12, 'data/14196530126_2bf399edf0_k.jpg', 'Female', 'Ä‘áº¡i há»c'),
(5, 'Nguyá»…n CÃ´ng Minh', 'matdoideplao_batcandoi06@yahoo.com', 23, 'data/P1070123.JPG', 'Male', 'Ä‘áº¡i há»c'),
(6, 'MÃ¨o LÆ°á»i', 'haohmaruru@yahoo.com', 32, 'data/P1070134.JPG', 'Male', 'Ä‘áº¡i há»c');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
