CREATE DATABASE `proyectoGaming`;

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `turn` varchar(100) NOT NULL,
  `shift` enum('m','t') NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE proyectoGaming.admins (
	id_admin INT auto_increment NOT NULL,
	id_user INT NOT NULL,
	CONSTRAINT admins_pk PRIMARY KEY (id_admin),
	CONSTRAINT admins_FK FOREIGN KEY (id_user) REFERENCES proyectoGaming.users(id_user) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;
DROP TABLE IF EXISTS proyectoGaming.admins;

CREATE TABLE proyectoGaming.seats (
	id_seat INT auto_increment NOT NULL,
	CONSTRAINT seats_pk PRIMARY KEY (id_seat)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;
DROP TABLE IF EXISTS proyectoGaming.seats;

CREATE TABLE proyectoGaming.booking (
	id_booking INT auto_increment NOT NULL,
	`date` DATETIME NOT NULL,
	id_companion INT NULL,
	id_seat INT NOT NULL,
	id_user INT NOT NULL,
	CONSTRAINT booking_pk PRIMARY KEY (id_booking),
	CONSTRAINT booking_FK FOREIGN KEY (id_user) REFERENCES proyectoGaming.users(id_user) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT booking_FK_1 FOREIGN KEY (id_seat) REFERENCES proyectoGaming.seats(id_seat) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;
DROP TABLE IF EXISTS proyectoGaming.booking;

CREATE TABLE proyectoGaming.games (
	id_game INT auto_increment NOT NULL,
	name varchar(100) NOT NULL,
	CONSTRAINT games_pk PRIMARY KEY (id_game)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;
DROP TABLE IF EXISTS proyectoGaming.games;

CREATE TABLE proyectoGaming.tournaments (
	id_tournament INT auto_increment NOT NULL,
	name varchar(100) NOT NULL,
	`date` DATETIME NOT NULL,
	id_game INT NOT NULL,
	id_admin INT NOT NULL,
	CONSTRAINT tournaments_pk PRIMARY KEY (id_tournament),
	CONSTRAINT tournaments_FK FOREIGN KEY (id_admin) REFERENCES proyectoGaming.admins(id_admin) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT tournaments_FK_1 FOREIGN KEY (id_game) REFERENCES proyectoGaming.games(id_game) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;
DROP TABLE IF EXISTS proyectoGaming.tournaments;

CREATE TABLE proyectoGaming.participants (
	id_participant INT auto_increment NOT NULL,
	id_tournament INT NOT NULL,
	id_seat INT NOT NULL,
	id_user INT NOT NULL,
	CONSTRAINT participants_pk PRIMARY KEY (id_participant),
	CONSTRAINT participants_FK FOREIGN KEY (id_user) REFERENCES proyectoGaming.users(id_user) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT participants_FK_1 FOREIGN KEY (id_seat) REFERENCES proyectoGaming.seats(id_seat) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT participants_FK_2 FOREIGN KEY (id_tournament) REFERENCES proyectoGaming.tournaments(id_tournament) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;
DROP TABLE IF EXISTS proyectoGaming.participants;

CREATE TABLE proyectoGaming.wins (
	id_win INT auto_increment NOT NULL,
	`number` INT NULL,
	id_admin INT NOT NULL,
	id_participant INT NOT NULL,
	CONSTRAINT wins_pk PRIMARY KEY (id_win),
	CONSTRAINT wins_FK FOREIGN KEY (id_admin) REFERENCES proyectoGaming.admins(id_admin) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT wins_FK_1 FOREIGN KEY (id_participant) REFERENCES proyectoGaming.participants(id_participant) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;
DROP TABLE IF EXISTS proyectoGaming.wins;

