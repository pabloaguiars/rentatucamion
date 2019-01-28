-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-06-2015 a las 05:08:51
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `u179579898_bus`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE IF NOT EXISTS `administradores` (
  `coAdministrador` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `apPaterno` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `apMaterno` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`coAdministrador`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`coAdministrador`, `nombre`, `apPaterno`, `apMaterno`, `telefono`, `direccion`, `correo`, `contrasena`) VALUES
(1, 'PABLO', 'AGUIAR', 'SOLIS', '6642441255', 'Calle 5 DE MAYO Colonia INSURGENTES Delegacion CENTENARIO #Ext 23024 #Int 3', 'pablo19836@gmail.com', 'pabloA19836');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camiones`
--

CREATE TABLE IF NOT EXISTS `camiones` (
  `coCamion` int(11) NOT NULL AUTO_INCREMENT,
  `capacidad` int(11) NOT NULL,
  `disponible` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `chofer` int(11) NOT NULL,
  `marca` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `modelo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `anio` int(11) NOT NULL,
  `vin` varchar(17) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`coCamion`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `camiones`
--

INSERT INTO `camiones` (`coCamion`, `capacidad`, `disponible`, `chofer`, `marca`, `modelo`, `anio`, `vin`) VALUES
(1, 16, '1', 3, 'MERCEDEZ-BENZ', 'SPRINTER 413', 2008, 'WDBCB20A6CB024516'),
(2, 33, '2', 15, 'MERCEDEZ-BENZ', 'EUROCAR', 2005, 'WDBCB20A6CB024437'),
(3, 24, '1', 4, 'CHEVROLET', 'NPR BUS', 2009, 'IGIYN2DTXAS8000I');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `choferes`
--

CREATE TABLE IF NOT EXISTS `choferes` (
  `coChofer` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `apPaterno` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `apMaterno` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`coChofer`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `choferes`
--

INSERT INTO `choferes` (`coChofer`, `nombre`, `apPaterno`, `apMaterno`, `telefono`, `direccion`) VALUES
(1, 'PABLO', 'AGUIAR', 'SOLIS', '6642441255', 'Calle INDEPENDENCIA Colonia INSURGENTES Delegacion CENTENARIO #Ext 23024 #Int '),
(3, 'AARON', 'CERECEDA', 'MORENO', '6641234567', 'Calle LA ESTRELLA Colonia LAS FUENTES Delegacion LA PRESA #Ext 22455 #Int 19'),
(4, 'ALFREDO', 'BOJORQUEZ', 'VERDUZCO', '6645897521', 'Calle LOS ENCINOS Colonia CASA GRANDE Delegacion EL FLORIFO #Ext 22244 #Int P-3'),
(5, 'JULIO ENRIQUE', 'ROCHA', 'CHAVEZ', '6649012592', 'Calle 5 DE MAYO Colonia 10 DE MAYO Delegacion CENTENARIO #Ext 22569 #Int '),
(15, 'PABLO', 'MARTINEZ', 'MORENO', '6641982357', 'Calle 5 DE MAYO Colonia 10 DE MAYO Delegacion CENTENARIO #Ext 22569 #Int 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `noCliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `apPaterno` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `apMaterno` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`noCliente`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`noCliente`, `nombre`, `apPaterno`, `apMaterno`, `telefono`, `direccion`, `correo`, `contrasena`) VALUES
(2, 'PABLO', 'AGUIAR', 'SOLIS', '6642441255', 'Calle 5 DE MAYO Colonia INSURGENTES Delegacion CENTENARIO #Ext 23024 #Int 3', 'pablo19836@gmail.com', 'pabloA19836'),
(4, 'PABLO', 'AGUIAR', 'SOLIS', '6641293826', 'Calle LOS LAURELES Colonia INSURGENTES Delegacion CENTENARIO #Ext 23940 #Int 39', 'pablo@gmaill.com', 'pablin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponibilidadunidad`
--

CREATE TABLE IF NOT EXISTS `disponibilidadunidad` (
  `dispoNum` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `dispoTexto` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`dispoNum`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `disponibilidadunidad`
--

INSERT INTO `disponibilidadunidad` (`dispoNum`, `dispoTexto`) VALUES
('1', 'Disponible'),
('2', 'No Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rentas`
--

CREATE TABLE IF NOT EXISTS `rentas` (
  `noRenta` int(11) NOT NULL AUTO_INCREMENT,
  `coCamion` int(11) NOT NULL,
  `noCliente` int(11) NOT NULL,
  `dia` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `mes` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `anio` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `hora` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`noRenta`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `rentas`
--

INSERT INTO `rentas` (`noRenta`, `coCamion`, `noCliente`, `dia`, `mes`, `anio`, `hora`, `direccion`) VALUES
(7, 3, 2, '14', '9', '2015', '10', 'Municipio: TIJUANA Calle INDEPENDENCIA Colonia INSURGENTES Delegacion CENTENARIO #Ext 23024'),
(6, 3, 2, '17', '5', '2016', '10', 'Municipio TIJUANA Calle INDEPENDENCIA Colonia INSURGENTES Delegacion CENTENARIO #Ext 23024'),
(8, 1, 2, '11', '6', '2015', '21', 'Municipio TIJUANA Calle INDEPENDENCIA Colonia INSURGENTES Delegacion CENTENARIO #Ext 23024'),
(9, 3, 2, '10', '6', '2015', '13', 'Municipio TIJUANA Calle INDEPENDENCIA Colonia INSURGENTES Delegacion CENTENARIO #Ext 23024');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
