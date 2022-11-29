-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 25-11-2022 a las 15:25:59
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `responsible` BOOLEAN DEFAULT NULL,
  `active` BOOLEAN NOT NULL DEFAULT TRUE,
  PRIMARY KEY (`id_booking`),
  KEY `booking_FK` (`id_user`),
  KEY `booking_FK_1` (`id_seat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `id_game` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id_game`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidents`
--

DROP TABLE IF EXISTS `incidents`;
CREATE TABLE IF NOT EXISTS `incidents` (
  `id_incidence` int(11) NOT NULL AUTO_INCREMENT,
  `id_booking` int(11) DEFAULT NULL,
  `id_tournament` int(11) DEFAULT NULL,
  `description` varchar(500) NOT NULL,
  PRIMARY KEY (`id_incidence`),
  KEY `incidents_FK` (`id_booking`),
  KEY `incidents_FK_1` (`id_tournament`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `active` BOOLEAN NOT NULL DEFAULT TRUE,
  PRIMARY KEY (`id_participant`),
  KEY `participants_FK` (`id_user`),
  KEY `participants_FK_1` (`id_seat`),
  KEY `participants_FK_2` (`id_tournament`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seats`
--

DROP TABLE IF EXISTS `seats`;
CREATE TABLE IF NOT EXISTS `seats` (
  `id_seat` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_seat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `responsible` int(11) NOT NULL,
  `active` BOOLEAN NOT NULL DEFAULT TRUE,
  PRIMARY KEY (`id_tournament`),
  KEY `tournaments_FK_1` (`id_game`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Filtros para la tabla `incidents`
--
ALTER TABLE `incidents`
  ADD CONSTRAINT `incidents_FK` FOREIGN KEY (`id_booking`) REFERENCES `booking` (`id_booking`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `incidents_FK_1` FOREIGN KEY (`id_tournament`) REFERENCES `tournaments` (`id_tournament`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `tournaments_FK_1` FOREIGN KEY (`id_game`) REFERENCES `games` (`id_game`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tournaments_FK_2` FOREIGN KEY (`responsible`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `wins`
--
ALTER TABLE `wins`
  ADD CONSTRAINT `wins_FK_1` FOREIGN KEY (`id_participant`) REFERENCES `participants` (`id_participant`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
