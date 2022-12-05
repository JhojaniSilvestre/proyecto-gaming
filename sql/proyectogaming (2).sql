-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 05-12-2022 a las 14:05:55
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectogaming`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_admin`),
  KEY `admins_FK` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id_admin`, `id_user`) VALUES
(1, 3),
(2, 4),
(3, 7),
(4, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `id_booking` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `id_seat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_companion` int(11) DEFAULT NULL,
  `responsible` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_booking`),
  KEY `booking_FK` (`id_user`),
  KEY `booking_FK_1` (`id_seat`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `booking`
--

INSERT INTO `booking` (`id_booking`, `date`, `id_seat`, `id_user`, `id_companion`, `responsible`, `active`) VALUES
(1, '2022-11-01 11:15:00', 1, 1, 3, 1, 0),
(2, '2022-11-02 17:45:00', 2, 2, NULL, 1, 0),
(3, '2022-12-01 11:15:00', 4, 1, NULL, 1, 0),
(4, '2022-12-10 11:15:00', 8, 1, NULL, 1, 0),
(5, '2022-12-01 11:15:00', 1, 1, NULL, 0, 1),
(22, '2022-12-06 11:15:00', 1, 1, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `id_game` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id_game`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `games`
--

INSERT INTO `games` (`id_game`, `name`) VALUES
(1, 'Zelda'),
(2, 'League of Legends'),
(3, 'Grand Theft Auto V');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidents`
--

DROP TABLE IF EXISTS `incidents`;
CREATE TABLE IF NOT EXISTS `incidents` (
  `id_incidence` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id_incidence`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `incidents`
--

INSERT INTO `incidents` (`id_incidence`, `title`, `description`, `date`, `created_at`) VALUES
(2, 'Prueba1', 'Estamos probando', '2022-12-03', '2022-12-02'),
(3, 'Prueba 3', 'Seguimos probando 2', '2022-12-05', '2022-12-02'),
(4, 'Prueba 4', 'PROBANDO PROBANDO', '2022-11-01', '2022-12-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participants`
--

DROP TABLE IF EXISTS `participants`;
CREATE TABLE IF NOT EXISTS `participants` (
  `id_participant` int(11) NOT NULL AUTO_INCREMENT,
  `id_tournament` int(11) NOT NULL,
  `id_seat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `responsible` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_participant`),
  KEY `participants_FK` (`id_user`),
  KEY `participants_FK_1` (`id_seat`),
  KEY `participants_FK_2` (`id_tournament`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `participants`
--

INSERT INTO `participants` (`id_participant`, `id_tournament`, `id_seat`, `id_user`, `responsible`, `active`) VALUES
(20, 1, 1, 1, 1, 1),
(21, 1, 2, 3, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seats`
--

DROP TABLE IF EXISTS `seats`;
CREATE TABLE IF NOT EXISTS `seats` (
  `id_seat` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_seat`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `seats`
--

INSERT INTO `seats` (`id_seat`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tournaments`
--

DROP TABLE IF EXISTS `tournaments`;
CREATE TABLE IF NOT EXISTS `tournaments` (
  `id_tournament` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `id_game` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_tournament`),
  KEY `tournaments_FK_1` (`id_game`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tournaments`
--

INSERT INTO `tournaments` (`id_tournament`, `name`, `date`, `id_game`, `active`) VALUES
(1, 'Torneo 3', '2022-12-12 11:15:00', 2, 1),
(2, 'Torneo 1.1', '2022-12-15 11:15:00', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `shift` enum('m','t') NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `password`, `shift`, `active`) VALUES
(1, 'user1', 'user1@gmail.com', 'abcd1234', 'm', 1),
(2, 'user2', 'user2@gmail.com', 'abcd1234', 't', 1),
(3, 'admin1', 'admin1@gmail.com', 'abcd1234', 'm', 1),
(4, 'admin2', 'admin2@gmail.com', 'abcd1234', 't', 1),
(5, 'user3', 'user3@gmail.com', 'abcd1234', 'm', 0),
(6, 'user4', 'user4@gmail.com', 'abcd1234', 't', 0),
(7, 'admin3', 'admin3@gmail.com', 'abcd1234', 'm', 0),
(8, 'admin4', 'admin4@gmail.com', 'abcd1234', 't', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wins`
--

DROP TABLE IF EXISTS `wins`;
CREATE TABLE IF NOT EXISTS `wins` (
  `id_win` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(11) DEFAULT NULL,
  `id_participant` int(11) NOT NULL,
  PRIMARY KEY (`id_win`),
  KEY `wins_FK_1` (`id_participant`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_FK` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_FK` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_FK_1` FOREIGN KEY (`id_seat`) REFERENCES `seats` (`id_seat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `participants_FK` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participants_FK_1` FOREIGN KEY (`id_seat`) REFERENCES `seats` (`id_seat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participants_FK_2` FOREIGN KEY (`id_tournament`) REFERENCES `tournaments` (`id_tournament`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tournaments`
--
ALTER TABLE `tournaments`
  ADD CONSTRAINT `tournaments_FK_1` FOREIGN KEY (`id_game`) REFERENCES `games` (`id_game`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `wins`
--
ALTER TABLE `wins`
  ADD CONSTRAINT `wins_FK_1` FOREIGN KEY (`id_participant`) REFERENCES `participants` (`id_participant`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
