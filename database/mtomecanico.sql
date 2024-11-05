-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-08-2024 a las 22:48:27
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mtomecanico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id_ciudad` int(11) NOT NULL,
  `nombre_ciudad` varchar(30) NOT NULL,
  `id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `nombre_ciudad`, `id_departamento`) VALUES
(1, 'Armenia', 1),
(2, 'Calarca', 1),
(3, 'Montenegro', 1),
(4, 'Quimbaya', 1),
(5, 'Salento', 1),
(6, 'Filandia', 1),
(7, 'BuenaVista', 1),
(8, 'Cordoba', 1),
(9, 'Pijao', 1),
(10, 'Genova', 1),
(11, 'Apia', 2),
(12, 'Medellin', 4),
(13, 'Envigado', 4),
(14, 'Pereira', 2),
(15, 'Dos Quebradas', 2),
(16, 'Manizales', 3),
(17, 'Neira', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `nombre_departamento` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombre_departamento`) VALUES
(1, 'Quindio'),
(2, 'Risaralda'),
(3, 'Caldas'),
(4, 'Antioquia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `id_mantenimiento` int(11) NOT NULL,
  `fecha_mantenimiento` date NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `id_taller` int(11) NOT NULL,
  `id_tipomanto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento_mecanico`
--

CREATE TABLE `mantenimiento_mecanico` (
  `id_mant_mec` int(11) NOT NULL,
  `id_mecanico` int(11) NOT NULL,
  `id_mantenimiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento_repuesto`
--

CREATE TABLE `mantenimiento_repuesto` (
  `id_mant_repuesto` int(11) NOT NULL,
  `id_mantenimiento` int(11) NOT NULL,
  `id_repuesto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento_vehiculo`
--

CREATE TABLE `mantenimiento_vehiculo` (
  `id_mant_vehiculo` int(11) NOT NULL,
  `id_mantenimiento` int(11) NOT NULL,
  `id_vehiculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mecanico`
--

CREATE TABLE `mecanico` (
  `id_mecanico` int(11) NOT NULL,
  `nombre_mecanico` varchar(30) NOT NULL,
  `telefono_mecanico` varchar(12) NOT NULL,
  `id_taller` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mecanico`
--

INSERT INTO `mecanico` (`id_mecanico`, `nombre_mecanico`, `telefono_mecanico`, `id_taller`) VALUES
(5, 'Jorge Orlando PanameÃ±o', '213131', 6),
(6, 'Fernando Pava', '213131', 8),
(7, 'Eliecer Ortiz', '234234543634', 9),
(8, 'Cesar Augusto Arango Bautista', '3176789045', 10),
(9, 'Dario Gomez', '3214567890', 7),
(10, 'Fabian', '2341', 9),
(11, 'Fabian', '2341', 6),
(12, 'SuperMarioBross', '23456789', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id_notificacion` int(11) NOT NULL,
  `mensaje` varchar(150) NOT NULL,
  `tipoM` varchar(15) NOT NULL,
  `id_propietario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--

CREATE TABLE `propietario` (
  `id_propietario` int(11) NOT NULL,
  `nombre_propietario` varchar(30) NOT NULL,
  `telefono_propietario` varchar(12) NOT NULL,
  `email_propietario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`id_propietario`, `nombre_propietario`, `telefono_propietario`, `email_propietario`) VALUES
(5, 'Juan Manuel Cardona Arias', '3182348248', 'juancardonaarias@gmail.com'),
(6, 'Raul Rivera', '34567890', 'jgjgj@gmail.com'),
(7, 'Alejandro Cardona', '31865768798', 'alejocardona@gmail.com'),
(8, 'Jhon Fredy Arias Morales', '45786790', 'jhonfredy@gmail.com'),
(9, 'Fernando Ramirez Pava', '456789', 'fernandoramirezpava@gmail.com'),
(10, 'Orlando Arias', '456789', 'orlando@gmail.com'),
(11, 'Daniel Arias', '4567890', 'daniel@gmail.com'),
(12, 'Enrique Giraldo', '4567890', 'enrique@gmail.com'),
(13, 'alex ubago', '56789', 'alex@gmail.com'),
(14, 'richard auzaque', '567890', 'richar@gmail.com'),
(15, 'Johan Sebastian Taborda', '324567', 'taborda@gmail.com'),
(16, 'Cesar Augusto Arango Bautista', '1313214645', 'arangox@hotmail.com'),
(17, 'Doris Eizabeth BolaÃ±os', '567890', 'elizabeth@gmail.com'),
(18, 'Juan Pablo Valencia', '4353245324', 'juanpaval@gmail.com'),
(19, 'Maria Jose Barraza', '4567890730', 'barraza@gmail.com'),
(20, 'Gian Carlo Acosta Franco', '234567890', 'hjkl@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuesto`
--

CREATE TABLE `repuesto` (
  `id_repuesto` int(11) NOT NULL,
  `nombre_repuesto` varchar(30) NOT NULL,
  `descripcion_repuesto` varchar(150) NOT NULL,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `repuesto`
--

INSERT INTO `repuesto` (`id_repuesto`, `nombre_repuesto`, `descripcion_repuesto`, `id_tipo`) VALUES
(1, 'Frenos', 'Frenos', 1),
(2, 'Frenos', 'Frenos', 1),
(3, 'Bomba de Agua', 'Bomba de agua para renaul clio style', 1),
(4, 'SENSOR CKP', 'SENSOR CKP que mide las revoluciones del motor y la explosion del motor ', 1),
(5, 'Termostato ', 'Termostato para renaul clio', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taller`
--

CREATE TABLE `taller` (
  `id_taller` int(11) NOT NULL,
  `nombre_taller` varchar(100) NOT NULL,
  `direccion_taller` varchar(150) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `taller`
--

INSERT INTO `taller` (`id_taller`, `nombre_taller`, `direccion_taller`, `id_ciudad`, `id_departamento`) VALUES
(6, 'Aqui te lo arreglamos', 'Filandia Calle 5', 5, 1),
(7, 'mi niÃ±o', 'barrio limonar', 1, 1),
(8, 'isabela', 'Barrio Isabela Mza 30 ', 1, 1),
(9, 'los desbaratamos pero no arreglamos igual', 'Cra 15A No. 20-05', 16, 3),
(10, 'La Isabela', 'Barrio La Isabela Mza 28 ', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_mantenimiento`
--

CREATE TABLE `tipo_mantenimiento` (
  `id_tipomanto` int(11) NOT NULL,
  `nombre_mantenimiento` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_mantenimiento`
--

INSERT INTO `tipo_mantenimiento` (`id_tipomanto`, `nombre_mantenimiento`) VALUES
(1, 'Preventivo'),
(2, 'Correctivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_repuesto`
--

CREATE TABLE `tipo_repuesto` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_repuesto`
--

INSERT INTO `tipo_repuesto` (`id_tipo`, `tipo`) VALUES
(1, 'Original'),
(2, 'Generico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id_vehiculo` int(11) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `modelo` varchar(15) NOT NULL,
  `placa` varchar(6) NOT NULL,
  `id_propietario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id_vehiculo`, `marca`, `modelo`, `placa`, `id_propietario`) VALUES
(1, 'Renault', 'Clio Style', 'MXQ704', 5),
(2, 'Renault', 'Logan', 'RSQ804', 8),
(3, 'Toyota', 'CROWN', 'RST204', 11),
(4, 'Wolsvagen', 'GOLD', 'RQX804', 14),
(5, 'REnault', 'Logan 2011', 'KMK086', 13),
(6, 'Chevrolet Tracker', 'Tracker', 'MXQ900', 16),
(7, 'Huyndai', '2022', 'RSQ704', 11),
(8, 'AUDI', '2024', 'MJB202', 19),
(9, 'Chevrolet Tracker', '2010', 'LLL234', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciudad`),
  ADD KEY `id_departamento` (`id_departamento`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`id_mantenimiento`),
  ADD KEY `id_taller` (`id_taller`),
  ADD KEY `id_tipomanto` (`id_tipomanto`);

--
-- Indices de la tabla `mantenimiento_mecanico`
--
ALTER TABLE `mantenimiento_mecanico`
  ADD PRIMARY KEY (`id_mant_mec`),
  ADD KEY `id_mecanico` (`id_mecanico`),
  ADD KEY `id_mantenimiento` (`id_mantenimiento`);

--
-- Indices de la tabla `mantenimiento_repuesto`
--
ALTER TABLE `mantenimiento_repuesto`
  ADD PRIMARY KEY (`id_mant_repuesto`),
  ADD KEY `id_mantenimiento` (`id_mantenimiento`),
  ADD KEY `id_repuesto` (`id_repuesto`);

--
-- Indices de la tabla `mantenimiento_vehiculo`
--
ALTER TABLE `mantenimiento_vehiculo`
  ADD PRIMARY KEY (`id_mant_vehiculo`),
  ADD KEY `id_mantenimiento` (`id_mantenimiento`,`id_vehiculo`),
  ADD KEY `id_vehiculo` (`id_vehiculo`);

--
-- Indices de la tabla `mecanico`
--
ALTER TABLE `mecanico`
  ADD PRIMARY KEY (`id_mecanico`),
  ADD KEY `id_taller` (`id_taller`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id_notificacion`),
  ADD KEY `id_propietario` (`id_propietario`);

--
-- Indices de la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD PRIMARY KEY (`id_propietario`);

--
-- Indices de la tabla `repuesto`
--
ALTER TABLE `repuesto`
  ADD PRIMARY KEY (`id_repuesto`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indices de la tabla `taller`
--
ALTER TABLE `taller`
  ADD PRIMARY KEY (`id_taller`),
  ADD KEY `id_ciudad` (`id_ciudad`);

--
-- Indices de la tabla `tipo_mantenimiento`
--
ALTER TABLE `tipo_mantenimiento`
  ADD PRIMARY KEY (`id_tipomanto`);

--
-- Indices de la tabla `tipo_repuesto`
--
ALTER TABLE `tipo_repuesto`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id_vehiculo`),
  ADD KEY `id_propietario` (`id_propietario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `id_mantenimiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mantenimiento_mecanico`
--
ALTER TABLE `mantenimiento_mecanico`
  MODIFY `id_mant_mec` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mantenimiento_repuesto`
--
ALTER TABLE `mantenimiento_repuesto`
  MODIFY `id_mant_repuesto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mantenimiento_vehiculo`
--
ALTER TABLE `mantenimiento_vehiculo`
  MODIFY `id_mant_vehiculo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mecanico`
--
ALTER TABLE `mecanico`
  MODIFY `id_mecanico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id_notificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `propietario`
--
ALTER TABLE `propietario`
  MODIFY `id_propietario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `repuesto`
--
ALTER TABLE `repuesto`
  MODIFY `id_repuesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `taller`
--
ALTER TABLE `taller`
  MODIFY `id_taller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tipo_mantenimiento`
--
ALTER TABLE `tipo_mantenimiento`
  MODIFY `id_tipomanto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_repuesto`
--
ALTER TABLE `tipo_repuesto`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `ciudad_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD CONSTRAINT `mantenimiento_ibfk_1` FOREIGN KEY (`id_taller`) REFERENCES `taller` (`id_taller`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mantenimiento_ibfk_2` FOREIGN KEY (`id_tipomanto`) REFERENCES `tipo_mantenimiento` (`id_tipomanto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mantenimiento_mecanico`
--
ALTER TABLE `mantenimiento_mecanico`
  ADD CONSTRAINT `mantenimiento_mecanico_ibfk_1` FOREIGN KEY (`id_mecanico`) REFERENCES `mecanico` (`id_mecanico`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mantenimiento_mecanico_ibfk_2` FOREIGN KEY (`id_mantenimiento`) REFERENCES `mantenimiento` (`id_mantenimiento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mantenimiento_repuesto`
--
ALTER TABLE `mantenimiento_repuesto`
  ADD CONSTRAINT `mantenimiento_repuesto_ibfk_1` FOREIGN KEY (`id_mantenimiento`) REFERENCES `mantenimiento` (`id_mantenimiento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mantenimiento_repuesto_ibfk_2` FOREIGN KEY (`id_repuesto`) REFERENCES `repuesto` (`id_repuesto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mantenimiento_vehiculo`
--
ALTER TABLE `mantenimiento_vehiculo`
  ADD CONSTRAINT `mantenimiento_vehiculo_ibfk_1` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id_vehiculo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mantenimiento_vehiculo_ibfk_2` FOREIGN KEY (`id_mantenimiento`) REFERENCES `mantenimiento` (`id_mantenimiento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mecanico`
--
ALTER TABLE `mecanico`
  ADD CONSTRAINT `mecanico_ibfk_1` FOREIGN KEY (`id_taller`) REFERENCES `taller` (`id_taller`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`id_propietario`) REFERENCES `propietario` (`id_propietario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `repuesto`
--
ALTER TABLE `repuesto`
  ADD CONSTRAINT `repuesto_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_repuesto` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `taller`
--
ALTER TABLE `taller`
  ADD CONSTRAINT `taller_ibfk_1` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`id_propietario`) REFERENCES `propietario` (`id_propietario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
