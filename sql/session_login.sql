SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE TABLE `session_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `PHPSESSID` varchar(255) NOT NULL DEFAULT '',
  `uid` int(11) NOT NULL,
  `user_email` varchar(32) NOT NULL,
  `user_pwd` varchar(64) NOT NULL,
  `add_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `PHPSESSID` (`PHPSESSID`)
) ENGINE=InnoDB;