-- phpMyAdmin SQL Dump
-- version 4.0.10.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-03-2015 a las 22:08:26
-- Versión del servidor: 5.1.71
-- Versión de PHP: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `Gestor de Contenido`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_evento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenido_evento` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha_evento` date NOT NULL,
  `tag` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_evento`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id_evento`, `titulo_evento`, `contenido_evento`, `fecha_evento`, `tag`) VALUES
(14, 'Evento proximo', 'evento proximo', '2015-04-15', '#evento#abc'),
(13, 'dgioadb', 'kjsafbasjf', '2015-03-13', 'skgnodfboaduf'),
(12, 'nflafn', 'davaduviad', '2015-03-12', 'hgfds'),
(11, 'Prueba fecha evento', '<p>lkjhgfd</p>', '2014-10-02', ''),
(10, 'evento 2', '<p>hgfd</p>', '2015-03-05', 'sdlsdfnpsf'),
(9, 'Preba de Evento', '<p>oiouuyjthgertgte</p>', '2015-03-03', '#abc#hyrthyrthy#dfgbb'),
(15, 'Evento futuro', 'Evento futuro', '2015-03-31', '#prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE IF NOT EXISTS `noticia` (
  `id_noticia` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_noticia` varchar(255) NOT NULL,
  `contenido_noticia` text NOT NULL,
  `fecha_noticia` date NOT NULL,
  `tag` varchar(100) NOT NULL,
  PRIMARY KEY (`id_noticia`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`id_noticia`, `titulo_noticia`, `contenido_noticia`, `fecha_noticia`, `tag`) VALUES
(3, 'Prueba de noticia', '<p>kdbckackqwrefckwbcwqkcv</p>', '2015-03-09', '#abc#kjhgfd#lkmnbvcx'),
(4, 'noticia 2', '<p>prueba prueba</p>', '2015-03-09', '#prueba#movil#dknds'),
(5, 'hgfdsa', 'nbvcxz', '2015-03-10', 'hgfds'),
(6, 'fxghaethaerh', 'dhargaergaerg', '2015-03-08', 'gdghsdhst'),
(7, 'msmdsds', '<p>mdmdmdmdmd</p>', '2015-03-11', 'dwksfwkfnw'),
(8, 'PruebaNot', '<p>notisiaaaas</p><p><img title="coru" class="fr-image-dropped fr-fin fr-dib" alt="coru" src="imagenes/7e1beeeb7030fde653d2310d917b5a4e028a8927.jpg" width="300"></p><p><br></p>', '2015-03-15', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE IF NOT EXISTS `pagina` (
  `id_pagina` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_pagina` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenido_pagina` text COLLATE utf8_unicode_ci NOT NULL,
  `url_pagina` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_pagina`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `login`, `password`) VALUES
(1, 'brais', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'benito', 'd93591bdf7860e1e4ee2fca799911215');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
