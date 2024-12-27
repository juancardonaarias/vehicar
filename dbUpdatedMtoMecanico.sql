-- MariaDB dump 10.19  Distrib 10.11.6-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: mtomecanico
-- ------------------------------------------------------
-- Server version	10.11.6-MariaDB-0+deb12u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ciudad`
--

DROP TABLE IF EXISTS `ciudad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ciudad` (
  `id_ciudad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_ciudad` varchar(30) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  PRIMARY KEY (`id_ciudad`),
  KEY `id_departamento` (`id_departamento`),
  CONSTRAINT `ciudad_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudad`
--

LOCK TABLES `ciudad` WRITE;
/*!40000 ALTER TABLE `ciudad` DISABLE KEYS */;
INSERT INTO `ciudad` VALUES
(1,'Armenia',1),
(2,'Calarca',1),
(3,'Montenegro',1),
(4,'Quimbaya',1),
(5,'Salento',1),
(6,'Filandia',1),
(7,'BuenaVista',1),
(8,'Cordoba',1),
(9,'Pijao',1),
(10,'Genova',1),
(11,'Apia',2),
(12,'Medellin',4),
(13,'Envigado',4),
(14,'Pereira',2),
(15,'Dos Quebradas',2),
(16,'Manizales',3),
(17,'Neira',3);
/*!40000 ALTER TABLE `ciudad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_departamento` varchar(30) NOT NULL,
  PRIMARY KEY (`id_departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamento`
--

LOCK TABLES `departamento` WRITE;
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` VALUES
(1,'Quindio'),
(2,'Risaralda'),
(3,'Caldas'),
(4,'Antioquia');
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mantenimiento`
--

DROP TABLE IF EXISTS `mantenimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mantenimiento` (
  `id_mantenimiento` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_mantenimiento` date NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `id_tipomanto` int(11) NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `id_mecanico` int(11) NOT NULL,
  `kilometraje` int(11) NOT NULL,
  PRIMARY KEY (`id_mantenimiento`),
  KEY `id_tipomanto` (`id_tipomanto`),
  KEY `id_vehiculo` (`id_vehiculo`,`id_mecanico`),
  KEY `id_mecanico` (`id_mecanico`),
  CONSTRAINT `mantenimiento_ibfk_2` FOREIGN KEY (`id_tipomanto`) REFERENCES `tipo_mantenimiento` (`id_tipomanto`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mantenimiento_ibfk_3` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id_vehiculo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mantenimiento_ibfk_4` FOREIGN KEY (`id_mecanico`) REFERENCES `mecanico` (`id_mecanico`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mantenimiento`
--

LOCK TABLES `mantenimiento` WRITE;
/*!40000 ALTER TABLE `mantenimiento` DISABLE KEYS */;
INSERT INTO `mantenimiento` VALUES
(11,'2025-12-22','revision de mantenimiento',1,13,18,25000);
/*!40000 ALTER TABLE `mantenimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mantenimiento_repuesto`
--

DROP TABLE IF EXISTS `mantenimiento_repuesto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mantenimiento_repuesto` (
  `id_mant_repuesto` int(11) NOT NULL AUTO_INCREMENT,
  `id_mantenimiento` int(11) NOT NULL,
  `id_repuesto` int(11) NOT NULL,
  PRIMARY KEY (`id_mant_repuesto`),
  KEY `id_mantenimiento` (`id_mantenimiento`),
  KEY `id_repuesto` (`id_repuesto`),
  CONSTRAINT `mantenimiento_repuesto_ibfk_1` FOREIGN KEY (`id_mantenimiento`) REFERENCES `mantenimiento` (`id_mantenimiento`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mantenimiento_repuesto_ibfk_2` FOREIGN KEY (`id_repuesto`) REFERENCES `repuesto` (`id_repuesto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mantenimiento_repuesto`
--

LOCK TABLES `mantenimiento_repuesto` WRITE;
/*!40000 ALTER TABLE `mantenimiento_repuesto` DISABLE KEYS */;
INSERT INTO `mantenimiento_repuesto` VALUES
(5,11,1);
/*!40000 ALTER TABLE `mantenimiento_repuesto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mecanico`
--

DROP TABLE IF EXISTS `mecanico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mecanico` (
  `id_mecanico` int(11) NOT NULL AUTO_INCREMENT,
  `id_taller` int(11) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_mecanico`),
  KEY `id_taller` (`id_taller`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `mecanico_ibfk_1` FOREIGN KEY (`id_taller`) REFERENCES `taller` (`id_taller`) ON DELETE SET NULL,
  CONSTRAINT `mecanico_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mecanico`
--

LOCK TABLES `mecanico` WRITE;
/*!40000 ALTER TABLE `mecanico` DISABLE KEYS */;
INSERT INTO `mecanico` VALUES
(18,NULL,1),
(19,NULL,23),
(20,NULL,25),
(21,NULL,26),
(22,NULL,28),
(23,NULL,32),
(24,11,40),
(25,11,41);
/*!40000 ALTER TABLE `mecanico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notificaciones`
--

DROP TABLE IF EXISTS `notificaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificaciones` (
  `id_notificacion` int(11) NOT NULL AUTO_INCREMENT,
  `mensaje` varchar(150) NOT NULL,
  `tipoM` varchar(15) NOT NULL,
  `id_propietario` int(11) NOT NULL,
  PRIMARY KEY (`id_notificacion`),
  KEY `id_propietario` (`id_propietario`),
  CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`id_propietario`) REFERENCES `propietario` (`id_propietario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificaciones`
--

LOCK TABLES `notificaciones` WRITE;
/*!40000 ALTER TABLE `notificaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `notificaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `propietario`
--

DROP TABLE IF EXISTS `propietario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `propietario` (
  `id_propietario` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_propietario`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `propietario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propietario`
--

LOCK TABLES `propietario` WRITE;
/*!40000 ALTER TABLE `propietario` DISABLE KEYS */;
INSERT INTO `propietario` VALUES
(23,10),
(24,11),
(25,14),
(26,16),
(27,17),
(28,24),
(29,27),
(30,29),
(31,30),
(32,31),
(33,33),
(34,34),
(35,35),
(36,36),
(37,37),
(38,38);
/*!40000 ALTER TABLE `propietario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `repuesto`
--

DROP TABLE IF EXISTS `repuesto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `repuesto` (
  `id_repuesto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_repuesto` varchar(30) NOT NULL,
  `descripcion_repuesto` varchar(150) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  PRIMARY KEY (`id_repuesto`),
  KEY `id_tipo` (`id_tipo`),
  CONSTRAINT `repuesto_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_repuesto` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repuesto`
--

LOCK TABLES `repuesto` WRITE;
/*!40000 ALTER TABLE `repuesto` DISABLE KEYS */;
INSERT INTO `repuesto` VALUES
(1,'bomba','es una bomba de presion de carro',1);
/*!40000 ALTER TABLE `repuesto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taller`
--

DROP TABLE IF EXISTS `taller`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `taller` (
  `id_taller` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_taller` varchar(100) NOT NULL,
  `direccion_taller` varchar(150) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  PRIMARY KEY (`id_taller`),
  KEY `id_ciudad` (`id_ciudad`),
  CONSTRAINT `taller_ibfk_1` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taller`
--

LOCK TABLES `taller` WRITE;
/*!40000 ALTER TABLE `taller` DISABLE KEYS */;
INSERT INTO `taller` VALUES
(11,'El Pastuso','Cra 19 Calle 44',1,1);
/*!40000 ALTER TABLE `taller` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_mantenimiento`
--

DROP TABLE IF EXISTS `tipo_mantenimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_mantenimiento` (
  `id_tipomanto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_mantenimiento` varchar(25) NOT NULL,
  PRIMARY KEY (`id_tipomanto`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_mantenimiento`
--

LOCK TABLES `tipo_mantenimiento` WRITE;
/*!40000 ALTER TABLE `tipo_mantenimiento` DISABLE KEYS */;
INSERT INTO `tipo_mantenimiento` VALUES
(1,'Preventivo'),
(2,'Correctivo');
/*!40000 ALTER TABLE `tipo_mantenimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_repuesto`
--

DROP TABLE IF EXISTS `tipo_repuesto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_repuesto` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(10) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_repuesto`
--

LOCK TABLES `tipo_repuesto` WRITE;
/*!40000 ALTER TABLE `tipo_repuesto` DISABLE KEYS */;
INSERT INTO `tipo_repuesto` VALUES
(1,'Original'),
(2,'Generico');
/*!40000 ALTER TABLE `tipo_repuesto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `tipo_usuario` enum('mecanico','cliente') NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES
(1,'Juan','juan@example.com','345667','mecanico','$2y$10$oGZvxMqfvlUPsz/BJVzrY.g7oVvR..LSVQ6wyT2MAFY38e8HEhZNW'),
(10,'Ricardo Guerrero','ricardoguerrero@gmail.com','432452345','cliente','$2y$10$oGZvxMqfvlUPsz/BJVzrY.g7oVvR..LSVQ6wyT2MAFY38e8HEhZNW'),
(11,'Juan Manuel Cardona','juancardonaarias@gmail.com','123456','cliente','$2y$10$oGZvxMqfvlUPsz/BJVzrY.g7oVvR..LSVQ6wyT2MAFY38e8HEhZNW'),
(12,'Arturo Palacio','arturo@gmail.com','23456789','mecanico','$2y$10$oGZvxMqfvlUPsz/BJVzrY.g7oVvR..LSVQ6wyT2MAFY38e8HEhZNW'),
(14,'Ricardo Omar Gutierrez','omarg@gmail.com','123456789','cliente','$2y$10$oGZvxMqfvlUPsz/BJVzrY.g7oVvR..LSVQ6wyT2MAFY38e8HEhZNW'),
(16,'Liz Johanna','lizjohanna@gmail.com','123456789','cliente','$2y$10$oGZvxMqfvlUPsz/BJVzrY.g7oVvR..LSVQ6wyT2MAFY38e8HEhZNW'),
(17,'Ruby Vargas','rubyvargas@gmail.com','123456789','cliente','$2y$10$oGZvxMqfvlUPsz/BJVzrY.g7oVvR..LSVQ6wyT2MAFY38e8HEhZNW'),
(18,'Samuel Arbelaez','samuelarbelaez@gmail.com','123456789','mecanico','$2y$10$oGZvxMqfvlUPsz/BJVzrY.g7oVvR..LSVQ6wyT2MAFY38e8HEhZNW'),
(19,'Fierro','fierro@gmail.com','123456789','mecanico','$2y$10$oGZvxMqfvlUPsz/BJVzrY.g7oVvR..LSVQ6wyT2MAFY38e8HEhZNW'),
(20,'Arturo Palacio','arturopalacio@gmail.com','123456789','mecanico','$2y$10$oGZvxMqfvlUPsz/BJVzrY.g7oVvR..LSVQ6wyT2MAFY38e8HEhZNW'),
(21,'Elon Musk','elonmusk@gmail.com','123456789','mecanico','$2y$10$oGZvxMqfvlUPsz/BJVzrY.g7oVvR..LSVQ6wyT2MAFY38e8HEhZNW'),
(22,'Cesar Agusto Arango Bautista','cesara@gmail.com','123456789','mecanico','$2y$10$oGZvxMqfvlUPsz/BJVzrY.g7oVvR..LSVQ6wyT2MAFY38e8HEhZNW'),
(23,'Rodolfo Hernandez','rodolfo@gmail.com','1234567','mecanico','$2y$10$oGZvxMqfvlUPsz/BJVzrY.g7oVvR..LSVQ6wyT2MAFY38e8HEhZNW'),
(24,'Filemon Morales','filemon@misena.edu.co','1234567','cliente','$2y$10$oGZvxMqfvlUPsz/BJVzrY.g7oVvR..LSVQ6wyT2MAFY38e8HEhZNW'),
(25,'Jason Bourne','jason@gmail.com','1234567','mecanico','$2y$10$oGZvxMqfvlUPsz/BJVzrY.g7oVvR..LSVQ6wyT2MAFY38e8HEhZNW'),
(26,'Ricardo Gutierrez','ricardogutierrez@gmail.com','123456789','mecanico','$2y$10$oGZvxMqfvlUPsz/BJVzrY.g7oVvR..LSVQ6wyT2MAFY38e8HEhZNW'),
(27,'Ricardo Montalban','ricardomontalban@gmail.com','234567867890','cliente','$2y$10$oGZvxMqfvlUPsz/BJVzrY.g7oVvR..LSVQ6wyT2MAFY38e8HEhZNW'),
(28,'Sandra Reyes','sandrareyes@gmail.com','1234567','mecanico','$2y$10$oGZvxMqfvlUPsz/BJVzrY.g7oVvR..LSVQ6wyT2MAFY38e8HEhZNW'),
(29,'Beto','beto@gmail.com','1234567','cliente','$2y$10$oGZvxMqfvlUPsz/BJVzrY.g7oVvR..LSVQ6wyT2MAFY38e8HEhZNW'),
(30,'Ricardo Omar G','ricardoom@gmail.com','1234567','cliente','$2y$10$oGZvxMqfvlUPsz/BJVzrY.g7oVvR..LSVQ6wyT2MAFY38e8HEhZNW'),
(31,'Juan Sebastian Rojas Garcia','sebastianrg@gmail.com','1234567','cliente','$2y$10$oGZvxMqfvlUPsz/BJVzrY.g7oVvR..LSVQ6wyT2MAFY38e8HEhZNW'),
(32,'RojasGarcia','rg@gmail.com','1234567','mecanico','$2y$10$oGZvxMqfvlUPsz/BJVzrY.g7oVvR..LSVQ6wyT2MAFY38e8HEhZNW'),
(33,'sharron','sharon@gmail.com','12344343432','cliente','$2y$10$oGZvxMqfvlUPsz/BJVzrY.g7oVvR..LSVQ6wyT2MAFY38e8HEhZNW'),
(34,'asdf','asdf@gmail.com','123412341423','cliente','asdfasdfasdf'),
(35,'sa','sa@gmail.cpm','223344','cliente','$2y$10$8pG00jiuJQxqcpOIXuFL4eJq/4h7Q4zuPyOKkVGj3DzrkdO.n2eBC'),
(36,'qqq','2ddf@gmail.com','2234434','cliente','$2y$10$bqSHBV4YHMrugmwMgMG5wufm8PoqDuEn6kVOwKyY54LhLBBoV4bUK'),
(37,'ffff','fff@ma.com','2222','cliente','$2y$10$L0Xi4f5OGgy1T7xXWQaRUeOCrvtzcNnY0fVNHXyMuj3nsgaUytA7q'),
(38,'fff','asg@gmail.com','2222','cliente','$2y$10$OthicFuyBdqQvvjpPYYEVOqI29PR.nTmRBu.3x7y5X724b3LK.Mbu'),
(39,'yop','yop@gmai.com','452343434','mecanico','$2y$10$lMDHM4QPjbr/c.322uY50uG01bWRIHMz1iqC3P8Lm8UWT3AQvVGra'),
(40,'ttt','tt@gmail.com','22','mecanico','$2y$10$N9m6DaQoCPwy0Mbu0Yt.COXyDgypvS.FpgM/5PZX0apuDGG6RZT.u'),
(41,'ti','ti@gmail.com','4444','mecanico','$2y$10$.EYR4xRzUuRTkB7eCIT.cOQyKG5/Il7B2VZSttnMTjC/WCBGoNFLe');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculo`
--

DROP TABLE IF EXISTS `vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehiculo` (
  `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT,
  `marca_vehiculo` varchar(20) NOT NULL,
  `modelo_vehiculo` varchar(15) NOT NULL,
  `placa_vehiculo` varchar(6) NOT NULL,
  `id_propietario` int(11) NOT NULL,
  PRIMARY KEY (`id_vehiculo`),
  KEY `id_propietario` (`id_propietario`),
  CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`id_propietario`) REFERENCES `propietario` (`id_propietario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculo`
--

LOCK TABLES `vehiculo` WRITE;
/*!40000 ALTER TABLE `vehiculo` DISABLE KEYS */;
INSERT INTO `vehiculo` VALUES
(13,'sun24','2020','asdlf2',33);
/*!40000 ALTER TABLE `vehiculo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-22 22:22:05
