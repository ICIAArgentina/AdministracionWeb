-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-04-2016 a las 06:59:38
-- Versión del servidor: 5.5.47-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `Iglesia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Acciones`
--

CREATE TABLE IF NOT EXISTS `Acciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accion` varchar(20) NOT NULL,
  `MinRol` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `Acciones`
--

INSERT INTO `Acciones` (`id`, `accion`, `MinRol`) VALUES
(2, 'AgregarUsuario', 3),
(3, 'EliminarUsuario', 3),
(5, 'ModificarUsuario', 3),
(6, 'AgregarMiembro', 3),
(7, 'ModificarMiembro', 3),
(8, 'EliminarMiembro', 3),
(9, 'Configuracion', 3),
(10, 'Principal', 1),
(11, 'ListadoMiembros', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Configuracion`
--

CREATE TABLE IF NOT EXISTS `Configuracion` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `cantItems` tinyint(4) NOT NULL,
  `habilitado` tinyint(1) NOT NULL,
  `mensajeDeshabilitado` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `Configuracion`
--

INSERT INTO `Configuracion` (`id`, `titulo`, `descripcion`, `email`, `cantItems`, `habilitado`, `mensajeDeshabilitado`) VALUES
(1, 'ICIA - Tu Hogar de Paz', 'Sitio Web de ICIA - Tu Hogar de Paz', 'administracion@iciaargentina.com.ar', 10, 1, 'Sitio temporalmente deshabilitado. Estamos consrtuyendo el sistema. Disculpe las molestias! ;)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Iglesia`
--

CREATE TABLE IF NOT EXISTS `Iglesia` (
  `idIglesia` int(11) NOT NULL AUTO_INCREMENT,
  `idPastor` int(11) DEFAULT NULL,
  `idPastora` int(11) DEFAULT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Direccion` varchar(80) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `EMail` varchar(50) DEFAULT NULL,
  `FaceBook` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idIglesia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `Iglesia`
--

INSERT INTO `Iglesia` (`idIglesia`, `idPastor`, `idPastora`, `Nombre`, `Direccion`, `Telefono`, `EMail`, `FaceBook`) VALUES
(1, 2, 3, 'ICIA La Plata', '520 N°348 e/116 y 117', '(0221)-588-2060', 'administracion@iciaargentina.com.ar', 'iciaArgentina'),
(2, 5, 4, 'ICIP (Iglesia Cristiana Internacional Paraguay)', NULL, NULL, NULL, NULL),
(3, 7, 6, 'ICIA Merlo', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Menu`
--

CREATE TABLE IF NOT EXISTS `Menu` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) NOT NULL,
  `minRol` int(5) NOT NULL,
  `accion` varchar(50) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `Menu`
--

INSERT INTO `Menu` (`id`, `descripcion`, `minRol`, `accion`, `visible`) VALUES
(1, 'ABM de Miembros', 3, 'ABMMiembros', 1),
(2, 'Listado Miembros', 1, 'ListadoMiembros', 1),
(3, 'Configuracion', 3, 'Configuracion', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Miembro`
--

CREATE TABLE IF NOT EXISTS `Miembro` (
  `idMiembro` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` char(5) DEFAULT NULL,
  `tipoDocumento` varchar(11) DEFAULT NULL,
  `numeroDocumento` varchar(11) DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `eMail` varchar(35) DEFAULT NULL,
  `faceBook` varchar(35) DEFAULT NULL,
  `direccion` varchar(80) DEFAULT NULL,
  `telefono1` varchar(50) DEFAULT NULL,
  `telefono2` varchar(50) DEFAULT NULL,
  `fechaIngreso` date DEFAULT NULL,
  `fechaEgreso` date DEFAULT NULL,
  `fechaAlta` date DEFAULT NULL,
  `fechaBautismo` date DEFAULT NULL,
  `bautizado` tinyint(1) DEFAULT '0',
  `foto` varchar(255) DEFAULT NULL,
  `idIglesia` int(11) DEFAULT '1',
  `idLocalidad` int(11) DEFAULT NULL,
  `idBarrio` int(11) DEFAULT NULL,
  PRIMARY KEY (`idMiembro`),
  KEY `idMiembro` (`idMiembro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `Miembro`
--

INSERT INTO `Miembro` (`idMiembro`, `codigo`, `tipoDocumento`, `numeroDocumento`, `nombre`, `apellido`, `fechaNacimiento`, `sexo`, `eMail`, `faceBook`, `direccion`, `telefono1`, `telefono2`, `fechaIngreso`, `fechaEgreso`, `fechaAlta`, `fechaBautismo`, `bautizado`, `foto`, `idIglesia`, `idLocalidad`, `idBarrio`) VALUES
(1, NULL, NULL, '32392735', 'Ricardo', 'Gamarra', '0000-00-00', 'F', NULL, NULL, '', '', '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, '', 'Abraham', 'Vazquez', '0000-00-00', 'M', NULL, NULL, '', '', '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, '234234342', 'Anastacia', 'Vazquez', '0000-00-00', 'F', NULL, NULL, '', '', '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, 'Laura', 'Duarte', NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 2, NULL, NULL),
(5, NULL, NULL, NULL, 'Alfredo', 'Duarte', NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 2, NULL, NULL),
(6, NULL, NULL, NULL, 'Patricia', 'Rojas', NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 3, NULL, NULL),
(7, NULL, NULL, NULL, 'Cristian', 'Rojas', NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 3, NULL, NULL),
(9, 'PL1', 'DNI', '12345', 'Alejo', 'Flores', '0000-00-00', 'M', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(10, 'PL2', 'DNI', '27341508', 'Dario', 'Pluchinotta', '1970-12-29', 'M', NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoUsuario`
--

CREATE TABLE IF NOT EXISTS `tipoUsuario` (
  `idTipoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) NOT NULL,
  `Codigo` char(1) DEFAULT NULL,
  `Funcion` text,
  `nivel` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idTipoUsuario`),
  KEY `idTipoUsuario` (`idTipoUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Los diferentes tipos de usuario, tendrán diferentes tipos de acceso a la BD' AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tipoUsuario`
--

INSERT INTO `tipoUsuario` (`idTipoUsuario`, `Descripcion`, `Codigo`, `Funcion`, `nivel`) VALUES
(1, 'Mentor', 'M', 'Miembro a cargo de un territorio', 1),
(2, 'Pastor', 'P', 'Encargado de un edificio. Por ejemplo, Merlo, La Plata, Asunción', 2),
(3, 'Apóstol', 'A', 'Usuario Súper-Administrador. Todos los privilegios.', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE IF NOT EXISTS `Usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `idMiembro` int(11) NOT NULL,
  `idTipoUsuario` int(11) NOT NULL DEFAULT '3',
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `habilitado` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idUsuario`),
  KEY `idUsuario` (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='El usuario debe estar asociado a un miembro. Es claro que sólo algunos miembros' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`idUsuario`, `idMiembro`, `idTipoUsuario`, `username`, `password`, `habilitado`) VALUES
(1, 1, 3, 'RichardG', 'Y0ymicas@', 1),
(2, 2, 3, 'apostol', '1234', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
