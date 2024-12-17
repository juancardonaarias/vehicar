-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2024 a las 03:14:08
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
  `id_tipomanto` int(11) NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `id_mecanico` int(11) NOT NULL,
  `id_repuesto` int(11) NOT NULL,
  `kilometraje` int(11) NOT NULL
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
-- Estructura de tabla para la tabla `mecanico`
--

CREATE TABLE `mecanico` (
  `id_mecanico` int(11) NOT NULL,
  `id_taller` int(11) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mecanico`
--

INSERT INTO `mecanico` (`id_mecanico`, `id_taller`, `id_usuario`) VALUES
(18, NULL, 1),
(19, NULL, 23),
(20, NULL, 25),
(21, NULL, 26),
(22, NULL, 28),
(23, NULL, 32);

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
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`id_propietario`, `id_usuario`) VALUES
(23, 10),
(24, 11),
(25, 14),
(26, 16),
(27, 17),
(28, 24),
(29, 27),
(30, 29),
(31, 30),
(32, 31);

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
(11, 'El Pastuso', 'Cra 19 Calle 44', 1, 1);

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
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `tipo_usuario` enum('mecanico','cliente') NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `email`, `telefono`, `tipo_usuario`, `contrasena`) VALUES
(1, 'Juan', 'juan@example.com', '345667', 'mecanico', '123456'),
(10, 'Ricardo Guerrero', 'ricardoguerrero@gmail.com', '432452345', 'cliente', '$2y$10$TiKZL5NcaH2rCU4d3AUoZu8soq8iCR16h2yzBa6Zw.xyex0N/yrxy'),
(11, 'Juan Manuel Cardona', 'juancardonaarias@gmail.com', '123456', 'cliente', '$2y$10$DcBOlvxP.tjlAxnCInZbjeQvrqQG1qQHs9llsUJRWg/qXIsONYMw2'),
(12, 'Arturo Palacio', 'arturo@gmail.com', '23456789', 'mecanico', '$2y$10$Fme6cnZ0VY6QCjy.Y9fjZOPKNUw5NFjxiVBoRl0d4r3VMWq/gsE36'),
(14, 'Ricardo Omar Gutierrez', 'omarg@gmail.com', '123456789', 'cliente', '$2y$10$c0QsIHMM9BUXObQtO73mVetDhrvWAMesGZZzp6KtrQHaH/pEqS2ny'),
(16, 'Liz Johanna', 'lizjohanna@gmail.com', '123456789', 'cliente', '$2y$10$UQNCs5lBm8BPy8ZGKyLH1uEWRF/S8Jjrag8SzZCoYtFqMg4DfHx5e'),
(17, 'Ruby Vargas', 'rubyvargas@gmail.com', '123456789', 'cliente', '$2y$10$LoFeJiUQCL/zE.oeaCSdZOqQ0c1250UEIhYgGtheCCn4ZG09qdTP6'),
(18, 'Samuel Arbelaez', 'samuelarbelaez@gmail.com', '123456789', 'mecanico', '$2y$10$MjQuemGuUp3DUGChJuLneeA/mGg0v8ZxzbAKpMkyoUh/7bZ2no6Oy'),
(19, 'Fierro', 'fierro@gmail.com', '123456789', 'mecanico', '$2y$10$wJykhQu3enbbvWn/4jr5pe8CN6l2XHAG6oWBSTASgX8.Fb9Y/ZUWK'),
(20, 'Arturo Palacio', 'arturopalacio@gmail.com', '123456789', 'mecanico', '$2y$10$suZap6i.vFQJ.BsC0VYieuYGMXkCHQQ7.ksuC3WPDysyFZzykzAyG'),
(21, 'Elon Musk', 'elonmusk@gmail.com', '123456789', 'mecanico', '$2y$10$x5cv.RC7DxKWYPffwuZxUeuTgOT9/n.R6ZMfK1HeNvD5vzHtf0g5q'),
(22, 'Cesar Agusto Arango Bautista', 'cesara@gmail.com', '123456789', 'mecanico', '$2y$10$DmPdQjs2SQgFRfGF8.9Duep4/cehhg7yf20rVpqVEW01rPC8yiMwK'),
(23, 'Rodolfo Hernandez', 'rodolfo@gmail.com', '1234567', 'mecanico', '$2y$10$0AWWbkPiV4EOhQag8oI0tu995Iug5JRIa.a0fKREEet8n58E5bHpS'),
(24, 'Filemon Morales', 'filemon@misena.edu.co', '1234567', 'cliente', '$2y$10$PEmzvKl4yDA35tfdQMf8HuMqwJBnQuBL7NHpKdlgAqG9PlAfgnHia'),
(25, 'Jason Bourne', 'jason@gmail.com', '1234567', 'mecanico', '$2y$10$b6lVQhkn6JV75wiNK61XvuR3z9app71bA5jcX6ymdO9x8/98kmGKa'),
(26, 'Ricardo Gutierrez', 'ricardogutierrez@gmail.com', '123456789', 'mecanico', '$2y$10$z..VMd3HY08fDrInr3UNm.qoqT7uTSC6iu.xkYXPzLg5xrP7uEKNW'),
(27, 'Ricardo Montalban', 'ricardomontalban@gmail.com', '234567867890', 'cliente', '$2y$10$Dcom4lQDauFSD4yhsEAXlOd1Gwn8oevkEL2sm0oTH3Tz7gF6MgTDC'),
(28, 'Sandra Reyes', 'sandrareyes@gmail.com', '1234567', 'mecanico', '$2y$10$Pba86JDkdqWoZTXGBeT9aucTtDtzY6AnfTaCvG4qfYvlLUcPNTFJy'),
(29, 'Beto', 'beto@gmail.com', '1234567', 'cliente', '$2y$10$L4Ykm33esyxed05884lc8.o6IfZnZu8oje3vfX1S8C64pjC42Wo2m'),
(30, 'Ricardo Omar G', 'ricardoom@gmail.com', '1234567', 'cliente', '$2y$10$VtozMTfNnDPRtJMH1ztvWOXH6QW.plJlmvMwjjeNWi3B8m1mWF8f2'),
(31, 'Juan Sebastian Rojas Garcia', 'sebastianrg@gmail.com', '1234567', 'cliente', '$2y$10$V0WtWDN0QxBAx1Cj1aK/KeaS.aNGRwYgHnikF4XMIshqm2Asug4IG'),
(32, 'RojasGarcia', 'rg@gmail.com', '1234567', 'mecanico', '$2y$10$1Fmsn/ylDFbY6PcKGKuDc.GH4eHKBawfLgHaXiWtgYyw1So160pbi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id_vehiculo` int(11) NOT NULL,
  `marca_vehiculo` varchar(20) NOT NULL,
  `modelo_vehiculo` varchar(15) NOT NULL,
  `placa_vehiculo` varchar(6) NOT NULL,
  `id_propietario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  ADD KEY `id_tipomanto` (`id_tipomanto`),
  ADD KEY `id_vehiculo` (`id_vehiculo`,`id_mecanico`),
  ADD KEY `id_mecanico` (`id_mecanico`);

--
-- Indices de la tabla `mantenimiento_repuesto`
--
ALTER TABLE `mantenimiento_repuesto`
  ADD PRIMARY KEY (`id_mant_repuesto`),
  ADD KEY `id_mantenimiento` (`id_mantenimiento`),
  ADD KEY `id_repuesto` (`id_repuesto`);

--
-- Indices de la tabla `mecanico`
--
ALTER TABLE `mecanico`
  ADD PRIMARY KEY (`id_mecanico`),
  ADD KEY `id_taller` (`id_taller`),
  ADD KEY `id_usuario` (`id_usuario`);

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
  ADD PRIMARY KEY (`id_propietario`),
  ADD KEY `id_usuario` (`id_usuario`);

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
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

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
  MODIFY `id_mantenimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `mantenimiento_repuesto`
--
ALTER TABLE `mantenimiento_repuesto`
  MODIFY `id_mant_repuesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `mecanico`
--
ALTER TABLE `mecanico`
  MODIFY `id_mecanico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id_notificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `propietario`
--
ALTER TABLE `propietario`
  MODIFY `id_propietario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `repuesto`
--
ALTER TABLE `repuesto`
  MODIFY `id_repuesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `taller`
--
ALTER TABLE `taller`
  MODIFY `id_taller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  ADD CONSTRAINT `mantenimiento_ibfk_2` FOREIGN KEY (`id_tipomanto`) REFERENCES `tipo_mantenimiento` (`id_tipomanto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mantenimiento_ibfk_3` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id_vehiculo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mantenimiento_ibfk_4` FOREIGN KEY (`id_mecanico`) REFERENCES `mecanico` (`id_mecanico`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mantenimiento_repuesto`
--
ALTER TABLE `mantenimiento_repuesto`
  ADD CONSTRAINT `mantenimiento_repuesto_ibfk_1` FOREIGN KEY (`id_mantenimiento`) REFERENCES `mantenimiento` (`id_mantenimiento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mantenimiento_repuesto_ibfk_2` FOREIGN KEY (`id_repuesto`) REFERENCES `repuesto` (`id_repuesto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mecanico`
--
ALTER TABLE `mecanico`
  ADD CONSTRAINT `mecanico_ibfk_1` FOREIGN KEY (`id_taller`) REFERENCES `taller` (`id_taller`) ON DELETE SET NULL,
  ADD CONSTRAINT `mecanico_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`id_propietario`) REFERENCES `propietario` (`id_propietario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD CONSTRAINT `propietario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

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
