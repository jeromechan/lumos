SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `invite_code` (
`id` int(32) NOT NULL AUTO_INCREMENT,
  `code` varchar(32) NOT NULL,
  `user` int(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `invite_code` (`id`, `code`, `user`) VALUES
(3639, '193c77e35a4a3f', 1),
(3643, '134201a5b85900', 0);
