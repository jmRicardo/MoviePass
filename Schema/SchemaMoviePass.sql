CREATE DATABASE IF NOT EXISTS `MoviePass`;
USE `MoviePass`;

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100)  NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `key_value` varchar(100) NOT NULL,
  `user_level` int(11) NOT NULL DEFAULT '0',
  `fb_user_id` varchar(100) NOT NULL,
  `fb_access_token` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
)Engine=InnoDB;