/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.14-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: intranet
-- ------------------------------------------------------
-- Server version	10.11.14-MariaDB-0+deb12u2

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
-- Table structure for table `frases`
--

DROP TABLE IF EXISTS `frases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `frases` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_autor` varchar(12) NOT NULL,
  `texto` longtext NOT NULL,
  `creado` datetime NOT NULL,
  `modificado` datetime NOT NULL,
  `usuario` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla solamente para las frases';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frases`
--

LOCK TABLES `frases` WRITE;
/*!40000 ALTER TABLE `frases` DISABLE KEYS */;
/*!40000 ALTER TABLE `frases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frases_autor`
--

DROP TABLE IF EXISTS `frases_autor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `frases_autor` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(12) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `foto` varchar(12) DEFAULT NULL,
  `pais` varchar(100) DEFAULT NULL,
  `creado` datetime DEFAULT NULL,
  `modificado` datetime DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frases_autor`
--

LOCK TABLES `frases_autor` WRITE;
/*!40000 ALTER TABLE `frases_autor` DISABLE KEYS */;
/*!40000 ALTER TABLE `frases_autor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `musica_canciones`
--

DROP TABLE IF EXISTS `musica_canciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `musica_canciones` (
  `id` int(9) NOT NULL,
  `artista` varchar(255) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `pais` varchar(175) DEFAULT NULL,
  `genero` varchar(175) DEFAULT NULL,
  `ano` year(4) DEFAULT NULL,
  `disco` int(8) DEFAULT NULL,
  `tipo` varchar(2) NOT NULL,
  `track` int(10) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `archivo` varchar(100) NOT NULL,
  `creado` datetime DEFAULT NULL,
  `modificado` datetime DEFAULT NULL,
  `creador` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Almacena la referencia a los archivos MP3/OGG (?)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `musica_canciones`
--

LOCK TABLES `musica_canciones` WRITE;
/*!40000 ALTER TABLE `musica_canciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `musica_canciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `musica_discos`
--

DROP TABLE IF EXISTS `musica_discos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `musica_discos` (
  `id` int(8) NOT NULL,
  `artista` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `pais` varchar(175) NOT NULL,
  `ano` year(4) NOT NULL,
  `genero` varchar(175) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `creado` datetime DEFAULT NULL,
  `modificado` datetime DEFAULT NULL,
  `creador` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Almacena la informacion de los discos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `musica_discos`
--

LOCK TABLES `musica_discos` WRITE;
/*!40000 ALTER TABLE `musica_discos` DISABLE KEYS */;
/*!40000 ALTER TABLE `musica_discos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `musica_lista`
--

DROP TABLE IF EXISTS `musica_lista`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `musica_lista` (
  `id` int(255) NOT NULL,
  `codigo` int(9) NOT NULL,
  `tipo` varchar(2) NOT NULL,
  `artista` varchar(255) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `pais` varchar(100) DEFAULT NULL,
  `ano` int(4) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `genero` varchar(255) DEFAULT NULL,
  `creado` datetime NOT NULL,
  `creador` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Sera un listado donde se guardaran los archivos y discos que se vayan ingresando';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `musica_lista`
--

LOCK TABLES `musica_lista` WRITE;
/*!40000 ALTER TABLE `musica_lista` DISABLE KEYS */;
/*!40000 ALTER TABLE `musica_lista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `musica_log`
--

DROP TABLE IF EXISTS `musica_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `musica_log` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `linea` longtext DEFAULT NULL,
  `tipo` varchar(2) NOT NULL,
  `creado` datetime NOT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Guardamos los logs de cada archivo subido al server';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `musica_log`
--

LOCK TABLES `musica_log` WRITE;
/*!40000 ALTER TABLE `musica_log` DISABLE KEYS */;
INSERT INTO `musica_log` VALUES
(84,'-rw-r--r-- 1 www-data www-data 4365754 Jun  3 18:21 /musica/100000000.mp3\n','ar','2026-06-03 18:21:23','tinchicus'),
(85,'-rw-r--r-- 1 www-data www-data 3461946 Jun  3 18:29 /musica/100000001.mp3\n','ar','2026-06-03 18:29:29','tinchicus'),
(86,'-rw-r--r-- 1 www-data www-data 2442686 Jun  3 18:57 /musica/100000002.mp3\n','ar','2026-06-03 18:57:06','tinchicus'),
(87,'-rw-r--r-- 1 www-data www-data 5028729 Jun  3 23:42 /musica/100000002.mp3\n','ar','2026-06-03 23:42:37','tinchicus'),
(88,'-rw-r--r-- 1 www-data www-data 608927 Jun  4 23:13 /musica/100000003.mp3\n','ar','2026-06-04 23:13:23','tinchicus'),
(89,'-rw-r--r-- 1 www-data www-data 608927 Jun  4 23:13 /musica/100000003.mp3\n','ar','2026-06-04 23:14:06','tinchicus'),
(90,'-rw-r--r-- 1 www-data www-data 1837722 Jun  4 23:14 /musica/100000004.mp3\n','ar','2026-06-04 23:14:10','tinchicus'),
(91,'-rw-r--r-- 1 www-data www-data 315310 Jun  4 23:14 /musica/100000005.mp3\n','ar','2026-06-04 23:14:11','tinchicus'),
(92,'-rw-r--r-- 1 www-data www-data 4808916 Jun  4 23:14 /musica/100000006.mp3\n','ar','2026-06-04 23:14:21','tinchicus'),
(93,'-rw-r--r-- 1 www-data www-data 4809930 Jun  4 23:14 /musica/100000007.mp3\n','ar','2026-06-04 23:14:32','tinchicus'),
(94,'','ar','2026-06-04 23:25:38','tinchicus'),
(95,'','ar','2026-06-04 23:25:55','tinchicus'),
(96,'','ar','2026-06-04 23:26:05','tinchicus'),
(97,'','ar','2026-06-04 23:30:13','tinchicus'),
(98,'','ar','2026-06-04 23:30:29','tinchicus'),
(99,'','ar','2026-06-04 23:30:50','tinchicus');
/*!40000 ALTER TABLE `musica_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `musica_playlists`
--

DROP TABLE IF EXISTS `musica_playlists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `musica_playlists` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `archivo` varchar(45) NOT NULL,
  `track` int(20) NOT NULL,
  `tipo` varchar(10) NOT NULL DEFAULT 'publico',
  `genero` varchar(100) DEFAULT NULL,
  `creado` datetime DEFAULT NULL,
  `modificado` datetime DEFAULT NULL,
  `usuario` varchar(45) DEFAULT 'anonimo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=503 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `musica_playlists`
--

LOCK TABLES `musica_playlists` WRITE;
/*!40000 ALTER TABLE `musica_playlists` DISABLE KEYS */;
/*!40000 ALTER TABLE `musica_playlists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) NOT NULL,
  `fecha` varchar(10) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `texto` longtext DEFAULT NULL,
  `creado` datetime DEFAULT NULL,
  `modificado` datetime DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla para las novedades';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sesiones`
--

DROP TABLE IF EXISTS `sesiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `sesiones` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `token` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `filtro1_musica` varchar(100) DEFAULT NULL,
  `filtro2_musica` varchar(255) DEFAULT NULL,
  `orden_musica` varchar(100) DEFAULT NULL,
  `filtro1_videos` varchar(100) DEFAULT NULL,
  `filtro2_videos` varchar(255) DEFAULT NULL,
  `orden_videos` varchar(100) DEFAULT NULL,
  `codigo` varchar(100) DEFAULT NULL,
  `track` int(10) DEFAULT NULL,
  `creado` datetime NOT NULL,
  `modificado` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1163 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sesiones`
--

LOCK TABLES `sesiones` WRITE;
/*!40000 ALTER TABLE `sesiones` DISABLE KEYS */;
/*!40000 ALTER TABLE `sesiones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `token_ingreso` varchar(255) DEFAULT NULL,
  `token_tools` varchar(255) DEFAULT NULL,
  `token_reset` varchar(255) DEFAULT NULL,
  `rol` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `creado` datetime DEFAULT NULL,
  `modificado` datetime DEFAULT NULL,
  `ingreso` datetime DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `comentario` longtext DEFAULT NULL,
  `uuid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='La tabla de los usuarios';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES
(1,'webmaster','Martin','Miranda','webmaster@tinchicus.com','$2y$12$r69pcPy6rdklZsBNCCoXCecoCOs25tuRZu4Ay3H4IIbTpQ4PADfT2',NULL,'','','1003','Activo','2021-11-07 01:13:35','2021-11-07 01:13:35','2026-09-23 15:23:45',NULL,'Este activo no debe eliminarse nunca','f21f88cba2c17cc7');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video_tube`
--

DROP TABLE IF EXISTS `video_tube`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `video_tube` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) DEFAULT NULL,
  `titulo` varchar(255) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `categoria` varchar(45) DEFAULT NULL,
  `seccion` varchar(45) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `creado` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contendra toda la lista de videos y series';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video_tube`
--

LOCK TABLES `video_tube` WRITE;
/*!40000 ALTER TABLE `video_tube` DISABLE KEYS */;
/*!40000 ALTER TABLE `video_tube` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos_datos`
--

DROP TABLE IF EXISTS `videos_datos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `videos_datos` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `clave` varchar(255) NOT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `filtro1` varchar(45) DEFAULT NULL,
  `filtro2` varchar(45) DEFAULT NULL,
  `orden` varchar(45) DEFAULT NULL,
  `codigo` varchar(255) DEFAULT NULL,
  `track` int(55) DEFAULT NULL,
  `modificado` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=341 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos_datos`
--

LOCK TABLES `videos_datos` WRITE;
/*!40000 ALTER TABLE `videos_datos` DISABLE KEYS */;
/*!40000 ALTER TABLE `videos_datos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos_filtros`
--

DROP TABLE IF EXISTS `videos_filtros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `videos_filtros` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) NOT NULL,
  `usuario` varchar(128) DEFAULT NULL,
  `filtro1` varchar(45) DEFAULT NULL,
  `filtro2` varchar(255) DEFAULT NULL,
  `orden` varchar(255) DEFAULT NULL,
  `creado` datetime DEFAULT NULL,
  `modificado` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=459 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos_filtros`
--

LOCK TABLES `videos_filtros` WRITE;
/*!40000 ALTER TABLE `videos_filtros` DISABLE KEYS */;
/*!40000 ALTER TABLE `videos_filtros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos_lista`
--

DROP TABLE IF EXISTS `videos_lista`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `videos_lista` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(13) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `seccion` varchar(100) DEFAULT NULL,
  `categoria` varchar(3) DEFAULT NULL,
  `ano` int(4) DEFAULT NULL,
  `director` varchar(255) DEFAULT NULL,
  `pais` varchar(100) DEFAULT NULL,
  `idioma` varchar(100) DEFAULT NULL,
  `subtitulo` varchar(2) DEFAULT 'N',
  `valor` float DEFAULT NULL,
  `estreno` varchar(10) DEFAULT NULL,
  `estudio` varchar(100) DEFAULT NULL,
  `descripcion` longtext DEFAULT NULL,
  `trailer` varchar(100) DEFAULT NULL,
  `foto` varchar(100) NOT NULL,
  `archivo` varchar(100) NOT NULL,
  `recomiendo` varchar(1) DEFAULT NULL,
  `creado` datetime NOT NULL,
  `modificado` datetime NOT NULL,
  `usuario` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=665 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos_lista`
--

LOCK TABLES `videos_lista` WRITE;
/*!40000 ALTER TABLE `videos_lista` DISABLE KEYS */;
/*!40000 ALTER TABLE `videos_lista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos_series`
--

DROP TABLE IF EXISTS `videos_series`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `videos_series` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(13) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `seccion` varchar(100) DEFAULT NULL,
  `categoria` varchar(3) DEFAULT NULL,
  `texto` longtext DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `archivo` varchar(100) DEFAULT NULL,
  `track` int(10) NOT NULL,
  `creado` datetime NOT NULL,
  `modificado` datetime NOT NULL,
  `usuario` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=608 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tablas para series, sagas, listas y otros menesteres...';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos_series`
--

LOCK TABLES `videos_series` WRITE;
/*!40000 ALTER TABLE `videos_series` DISABLE KEYS */;
/*!40000 ALTER TABLE `videos_series` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-09-23 16:14:39
