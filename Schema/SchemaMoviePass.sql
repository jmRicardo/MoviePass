USE ic1fGMePQ6;

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
  `name` varchar(100)  NOT NULL UNIQUE,
  `address` text NOT NULL,
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
  `id` int NOT NULL AUTO_INCREMENT,
  `idMovie` int not null UNIQUE,
  `adult` bool,
  `posterPath` varchar(100) not null,
  `originalTitle` varchar(100) not null,
  `originalLanguage` varchar(100) not null,
  `title` varchar(100) not null,
  `overview` text,
  `releaseDate` date not null,
  `trailerPath` varchar(100)
  constraint pkId primary key (`id`),
)Engine = InnoDB;

DROP TABLE IF EXISTS `genresByMovie`;
CREATE TABLE IF NOT EXISTS `genresByMovie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idGenre` int not null,
  `idMovie` int not null,
  constraint pdId primary key (`id`),
  constraint unq_idPerMovie UNIQUE (`idGenre`,`idMovie`),
  constraint fk_idGenre foreign key (idGenre) references genres(idGenre) on delete cascade on update cascade,
  constraint fk_idMovie foreign key (idMovie) references movies(idMovie) on delete cascade on update cascade
)Engine = InnoDB; 

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `idRoom` int not null auto_increment,
  `idCinema` int not null,
  `name` varchar(100),
  `price` float,  
  `capacity` int NOT NULL,
  constraint pkIdRoom primary key (`idRoom`),
  constraint pkIdCinema foreign key (`idCinema`) references cinemas(`id`)
)Engine = InnoDB;

DROP TABLE IF EXISTS dates;
CREATE TABLE IF NOT EXISTS dates 
(
	id int not null auto_increment primary key,
  `date` datetime not null,
  idRoom int not null,
  idMovie int not null,
  constraint fk_idRoom foreign key (idRoom) references rooms(idRoom) on delete cascade on update cascade,
	constraint fk_idMovieDates foreign key (idMovie) references movies(idMovie) on delete cascade on update cascade
)Engine = InnoDB;

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int not null auto_increment,
  `idDate` int not null,
  `idUser` int not null,
  `idSeat` int not null,
  constraint pkIdRoom primary key (`id`),
  constraint unqTicket unique (`idSeat`,`idDate`),
  constraint pkIdUser foreign key (`idUser`) references users(`id`),
  constraint pkTicketDate foreign key (`idDate`) references dates(`id`),
  constraint pkTicketSeat foreign key (`idSeat`) references seats(`id`)
)Engine = InnoDB;

DROP TABLE IF EXISTS `seats`;
CREATE TABLE IF NOT EXISTS `seats` (
  `id` int not null auto_increment,
  `row` int not null,
  `column` int not null,
  `idDate` int,
  constraint unqSeat unique (`row`,`column`,`idDate`),
  constraint pkSeat primary key (`id`),
  constraint fkSeatIdDate foreign key (`idDate`) references dates(`id`)
)Engine = InnoDB;
