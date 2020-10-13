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

DROP TABLE IF EXISTS `cinemas`;
CREATE TABLE IF NOT EXISTS `cinemas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100)  NOT NULL,
  `total_capacity` int NOT NULL,
  `address` text NOT NULL,
  `ticket_value` float NOT NULL,
  PRIMARY KEY (`id`)
)Engine=InnoDB;

DROP TABLE IF EXISTS `genres`;
CREATE TABLE IF NOT EXISTS `genres` (
  `idGenre` int(11) not null,
  `name` varchar(100),
  PRIMARY KEY (`idGenre`)
)Engine = InnoDB;

DROP TABLE IF EXISTS `genresByMovie`;
CREATE TABLE IF NOT EXISTS `genresByMovie` (
  `idGenreByMovie` int(11) not null AUTO_INCREMENT,
  `idGenre` int not null,
  `idMovie` int not null,
  PRIMARY KEY (`idGenreByMovie`),
  constraint fk_idGenre foreign key (idGenre) references genres(idGenre) on delete cascade on update cascade,
  constraint fk_idMovie foreign key (idMovie) references movies(idMovie) on delete cascade on update cascade
)Engine = InnoDB;

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `idMovie` int(11) not null primary key,
  `adult` boolean,
  `posterPath` varchar(100) not null,
  `originalTitle` varchar(100) not null,
  `originalLanguage` varchar(100) not null,
  `title` varchar(100) not null,
  `overview` varchar(500),
  `releaseDate` date not null,
  `trailerPath` varchar(100)
)Engine = InnoDB; 
