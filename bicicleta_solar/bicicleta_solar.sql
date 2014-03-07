-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-03-2014 a las 08:05:56
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3



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
  `id_ArbolSolar` int(20) NOT NULL AUTO_INCREMENT,
  `id_centro` int(9) NOT NULL,
  PRIMARY KEY (`id_ArbolSolar`),
  KEY `id_centro` (`id_centro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `arbolsolar`
--

INSERT INTO `arbolsolar` (`id_ArbolSolar`, `id_centro`) VALUES
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bicicleta`
--

CREATE TABLE IF NOT EXISTS `bicicleta` (
  `id_bicicleta` int(20) NOT NULL AUTO_INCREMENT,
  `id_centro` int(11) NOT NULL,
  PRIMARY KEY (`id_bicicleta`),
  KEY `id_Centro` (`id_centro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `bicicleta`
--

INSERT INTO `bicicleta` (`id_bicicleta`, `id_centro`) VALUES
(1, 1),
(2, 1),
(12, 1),
(3, 2),
(4, 2),
(5, 3),
(6, 3),
(7, 4),
(8, 4),
(9, 5),
(10, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro`
--

CREATE TABLE IF NOT EXISTS `centro` (
  `id_centro` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  PRIMARY KEY (`id_centro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `centro`
--

INSERT INTO `centro` (`id_centro`, `nombre`, `direccion`) VALUES
(1, 'Jesus Obrero', '---'),
(2, 'Molinuevo', '---'),
(3, 'Arriaga', '---'),
(4, 'Nieves Cano', '---'),
(5, 'Mendizorroza', '---');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosarbol`
--

CREATE TABLE IF NOT EXISTS `datosarbol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `corriente` int(10) NOT NULL,
  `tension` int(10) NOT NULL,
  `carga` int(10) NOT NULL,
  `id_arbolsolar` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_arbolsolar` (`id_arbolsolar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosbicicleta`
--

CREATE TABLE IF NOT EXISTS `datosbicicleta` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tension` int(10) NOT NULL,
  `corriente` int(10) NOT NULL,
  `carga` int(10) NOT NULL,
  `id_bicicleta` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_bicicleta` (`id_bicicleta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `id_reserva` int(20) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `horaInicio` int(5) NOT NULL,
  `horaFin` int(5) NOT NULL,
  `id_Usuario` int(20) NOT NULL,
  `id_Centro` int(20) NOT NULL,
  `id_bicicleta` int(20) NOT NULL,
  PRIMARY KEY (`id_reserva`),
  KEY `id_Usuario` (`id_Usuario`,`id_Centro`),
  KEY `id_Centro` (`id_Centro`),
  KEY `id_bicicleta` (`id_bicicleta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `fecha`, `horaInicio`, `horaFin`, `id_Usuario`, `id_Centro`, `id_bicicleta`) VALUES
(9, '2014-02-01', 8, 9, 3, 4, 7),
(10, '2014-02-01', 8, 12, 3, 5, 10),
(11, '2014-02-01', 8, 10, 3, 1, 2),
(12, '2014-02-01', 8, 9, 3, 4, 8);

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
-- Filtros para la tabla `bicicleta`
--
ALTER TABLE `bicicleta`
  ADD CONSTRAINT `bicicleta_ibfk_1` FOREIGN KEY (`id_Centro`) REFERENCES `centro` (`id_centro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datosarbol`
--
ALTER TABLE `datosarbol`
  ADD CONSTRAINT `datosarbol_ibfk_1` FOREIGN KEY (`id_arbolsolar`) REFERENCES `arbolsolar` (`id_ArbolSolar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datosbicicleta`
--
ALTER TABLE `datosbicicleta`
  ADD CONSTRAINT `datosbicicleta_ibfk_1` FOREIGN KEY (`id_bicicleta`) REFERENCES `bicicleta` (`id_bicicleta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_bicicleta`) REFERENCES `bicicleta` (`id_bicicleta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserva_ibfk_4` FOREIGN KEY (`id_Centro`) REFERENCES `centro` (`id_centro`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
