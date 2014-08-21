--
-- Database: `final_assignment`
--
CREATE DATABASE IF NOT EXISTS `final_assignment_minhtrieu` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `final_assignment_minhtrieu`;

CREATE TABLE IF NOT EXISTS `users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(100) NULL,
  `password` VARCHAR (100),
  `fullname` VARCHAR (100),
  `birth` DATE,
  `mail` VARCHAR(100) NULL,
  `gender` VARCHAR(10),
  `interest` VARCHAR(60),
  `avatar` VARCHAR(200) DEFAULT NULL,
  `aboutme` TEXT,
  PRIMARY KEY (`id`));

CREATE TABLE IF NOT EXISTS `comments` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`author_username` VARCHAR(100),
	`author` VARCHAR(100),
	`comments` TEXT,
	`user_id` INT UNSIGNED,
	PRIMARY KEY (`id`));