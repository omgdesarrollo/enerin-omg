CREATE DATABASE  IF NOT EXISTS `databaseomg` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `databaseomg`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: 192.168.1.74    Database: databaseomg
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.9-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `asignacion_tema_empleado`
--

DROP TABLE IF EXISTS `asignacion_tema_empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asignacion_tema_empleado` (
  `ID_TEMA_EMPLEADO` int(11) NOT NULL,
  `ID_TEMA` int(11) NOT NULL,
  `ID_EMPLEADO` int(11) NOT NULL,
  PRIMARY KEY (`ID_TEMA_EMPLEADO`),
  KEY `FK_asignacion_tema_empleado_temas` (`ID_TEMA`),
  KEY `FK_asignacion_tema_empleado_empleados` (`ID_EMPLEADO`),
  CONSTRAINT `FK_asignacion_tema_empleado_empleados` FOREIGN KEY (`ID_EMPLEADO`) REFERENCES `empleados` (`ID_EMPLEADO`),
  CONSTRAINT `FK_asignacion_tema_empleado_temas` FOREIGN KEY (`ID_TEMA`) REFERENCES `temas` (`ID_TEMA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignacion_tema_empleado`
--

LOCK TABLES `asignacion_tema_empleado` WRITE;
/*!40000 ALTER TABLE `asignacion_tema_empleado` DISABLE KEYS */;
INSERT INTO `asignacion_tema_empleado` VALUES (0,1,1);
/*!40000 ALTER TABLE `asignacion_tema_empleado` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-02 18:57:19
