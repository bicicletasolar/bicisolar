-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-03-2014 a las 08:59:16
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bicicleta_solar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arbolsolar`
--

CREATE TABLE IF NOT EXISTS `arbolsolar` (
  `id_ArbolSolar` int(20) NOT NULL,
  `corriente` int(9) NOT NULL,
  `tension` int(9) NOT NULL,
  `carga` int(9) NOT NULL,
  `id_centro` int(9) NOT NULL,
  PRIMARY KEY (`id_ArbolSolar`),
  KEY `id_centro` (`id_centro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bicicleta`
--

CREATE TABLE IF NOT EXISTS `bicicleta` (
  `id_bicicleta` int(20) NOT NULL,
  `corriente` int(11) NOT NULL,
  `tension` int(11) NOT NULL,
  `carga` int(11) NOT NULL,
  PRIMARY KEY (`id_bicicleta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro`
--

CREATE TABLE IF NOT EXISTS `centro` (
  `id_centro` int(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  PRIMARY KEY (`id_centro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `id_reserva` int(20) NOT NULL AUTO_INCREMENT,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `horaInicio` date NOT NULL,
  `horaFin` date NOT NULL,
  `estado` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `id_Usuario` int(20) NOT NULL,
  `id_Centro` int(20) NOT NULL,
  `id_bicicleta` int(20) NOT NULL,
  PRIMARY KEY (`id_reserva`),
  KEY `id_Usuario` (`id_Usuario`,`id_Centro`),
  KEY `id_Centro` (`id_Centro`),
  KEY `id_bicicleta` (`id_bicicleta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `dni` varchar(9) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `password`, `dni`) VALUES
(3, 'Gonzalo', '12345abcde', '72731967x');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `arbolsolar`
--
ALTER TABLE `arbolsolar`
  ADD CONSTRAINT `arbolsolar_ibfk_1` FOREIGN KEY (`id_centro`) REFERENCES `centro` (`id_centro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_bicicleta`) REFERENCES `bicicleta` (`id_bicicleta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserva_ibfk_3` FOREIGN KEY (`id_Centro`) REFERENCES `arbolsolar` (`id_centro`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
