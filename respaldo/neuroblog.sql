-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-07-2016 a las 18:16:38
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `neuroblog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE IF NOT EXISTS `articulos` (
  `id_articulo` int(250) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) NOT NULL,
  `contenido` text NOT NULL,
  `autor` varchar(100) NOT NULL,
  `fecha` datetime NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `categoria` text NOT NULL,
  `imagen` varchar(300) NOT NULL,
  PRIMARY KEY (`id_articulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id_articulo`, `titulo`, `contenido`, `autor`, `fecha`, `categoria_id`, `categoria`, `imagen`) VALUES
(1, 'Red Backpropagation', 'Algoritmo de aprendizaje', 'Paul', '2016-07-20 01:34:21', 2, 'Multicapa', ''),
(3, 'Algoritmo de la red', 'Adaline', 'Ada', '2016-07-20 01:43:11', 1, 'Monocapa', ''),
(5, 'Capas Ocultas', 'Redes Multicapa', 'Paul Werbos', '2016-07-20 02:06:48', 2, 'Multicapa', ''),
(7, 'Monserrat', 'RNA', 'Ada', '2016-07-20 02:20:20', 2, 'Multicapa', ''),
(9, 'Neuronas Binarias', 'Las neuronas binarias solamente puden tomar valores dentro del intervalo {0, 1} o {-1, 1}', 'Alonso Romero Luis', '2016-07-21 13:44:33', 1, 'Redes Monocapa', ''),
(10, 'lo nuevo en redes neuronales', 'hgkjgjkjhkhhjhhjhjhj7gjhkjhkjh78\r\nkljkjkj\r\nnjkjklj\r\nkljkj\r\n', 'yo', '2016-07-21 13:55:40', 5, 'Multicapa', ''),
(21, 'xxxx', 'ssds', 'sdw', '2016-07-22 08:59:34', 3, 'FunciÃ³n Tangelcial', ''),
(22, 'zzzz', 'zzz', 'sdsd', '2016-07-22 09:01:38', 2, 'Multicapa', ''),
(23, 'ssdsdsds', 'sdsdsd', 'sdsdsd', '2016-07-22 09:10:50', 1, 'Redes Monocapa', 'img/Mitternacht.jpg'),
(24, 'Nuevo articulo', 'este articulo es nuevo articulo', 'aritculo', '2016-07-22 09:17:31', 34, 'chistes', 'img/logo-smartphone-mini.png'),
(25, 'Redes Artificiales de Inteligencia Artificial', 'RNA muy potentes', 'Armando', '2016-07-22 09:20:49', 2, 'Multicapa', 'img/logo.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_id` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `categoria_id`, `categoria`) VALUES
(1, 1, 'Redes Monocapa'),
(2, 2, 'Multicapa'),
(3, 3, 'FunciÃ³n Tangelcial'),
(4, 4, 'FunciÃ³n Sigmoidea'),
(5, 5, 'Aprendizaje Supervisado'),
(6, 6, 'Aprendizaje No Supervisado'),
(7, 34, 'chistes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `id_coment` int(11) NOT NULL AUTO_INCREMENT,
  `id_articulo` int(11) NOT NULL,
  `nick` varchar(100) NOT NULL,
  `comentario` text NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id_coment`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_coment`, `id_articulo`, `nick`, `comentario`, `fecha`) VALUES
(2, 6, 'Armando', 'Otro comentario', '2016-07-21 11:38:36'),
(3, 7, 'Luci', 'Este es un nuevo comentario', '2016-07-21 14:29:35'),
(4, 3, 'Luci', 'Es un buen algoritmo, solo que soporta numeros como el OR', '2016-07-21 17:34:40'),
(5, 3, 'Juan', 'Cierto <Luci>\r\njejeje Saludos!\r\n:)', '2016-07-21 17:35:10'),
(6, 7, 'Luis', 'Si, de hecho si.', '2016-07-21 18:05:42'),
(7, 1, 'Jimmy', 'Va we', '2016-07-21 20:36:58'),
(9, 9, 'lupe', 'oooooooohhhhh', '2016-07-21 14:03:22'),
(10, 25, 'Armando', 'Son muy interesantes las RNA', '2016-07-22 09:23:57');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
