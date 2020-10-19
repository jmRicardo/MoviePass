CREATE DATABASE IF NOT EXISTS `MoviePass`;
USE `MoviePass`;


DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100)  NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `key_value` varchar(100) NOT NULL,
  `user_level` int NOT NULL DEFAULT '0',
  `fb_user_id` varchar(100) NOT NULL,
  `fb_access_token` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
)Engine=InnoDB;

select * from movies;

DROP TABLE IF EXISTS `cinemas`;
CREATE TABLE IF NOT EXISTS `cinemas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100)  NOT NULL,
  `total_capacity` int NOT NULL,
  `address` text NOT NULL,
  `ticket_value` float NOT NULL,
  PRIMARY KEY (`id`)
)Engine=InnoDB;

DROP TABLE IF EXISTS `genres`;
CREATE TABLE IF NOT EXISTS `genres` (
  `idGenre` int not null,
  `name` varchar(100),
  PRIMARY KEY (`idGenre`)
)Engine = InnoDB;

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `idMovie` int not null primary key,
  `adult` boolean,
  `posterPath` varchar(100) not null,
  `originalTitle` varchar(100) not null,
  `originalLanguage` varchar(100) not null,
  `title` varchar(100) not null,
  `overview` text,
  `releaseDate` date not null,
  `trailerPath` varchar(100)
)Engine = InnoDB;

DROP TABLE IF EXISTS `genresByMovie`;
CREATE TABLE IF NOT EXISTS `genresByMovie` (
  `idGenre` int not null,
  `idMovie` int not null,
  constraint pk_idPerMovie PRIMARY KEY (`idGenre`,`idMovie`),
  constraint fk_idGenre foreign key (idGenre) references genres(idGenre) on delete cascade on update cascade,
  constraint fk_idMovie foreign key (idMovie) references movies(idMovie) on delete cascade on update cascade
)Engine = InnoDB; 

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `idRoom` int not null auto_increment,
  `idCinema` int not null,
  `name` varchar(100),
  `ticketValue` float,  
  `capacity` int NOT NULL,
  constraint pkIdRoom primary key (`idRoom`),
  constraint pkIdCinema foreign key (`idCinema`) references cinemas(`id`)
)Engine = InnoDB;
