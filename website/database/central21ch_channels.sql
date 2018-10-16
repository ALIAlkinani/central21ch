-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: central21ch
-- ------------------------------------------------------
-- Server version	8.0.11

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
-- Table structure for table `channels`
--

DROP TABLE IF EXISTS `channels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `channels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `channels`
--

LOCK TABLES `channels` WRITE;
/*!40000 ALTER TABLE `channels` DISABLE KEYS */;
INSERT INTO `channels` VALUES (1,'libero','libero','2018-10-15 11:58:09','2018-10-15 11:58:09'),(2,'recusandae','recusandae','2018-10-15 11:58:09','2018-10-15 11:58:09'),(3,'architecto','architecto','2018-10-15 11:58:10','2018-10-15 11:58:10'),(4,'necessitatibus','necessitatibus','2018-10-15 11:58:10','2018-10-15 11:58:10'),(5,'quia','quia','2018-10-15 11:58:11','2018-10-15 11:58:11'),(6,'et','et','2018-10-15 11:58:11','2018-10-15 11:58:11'),(7,'sint','sint','2018-10-15 11:58:12','2018-10-15 11:58:12'),(8,'rerum','rerum','2018-10-15 11:58:12','2018-10-15 11:58:12'),(9,'repudiandae','repudiandae','2018-10-15 11:58:12','2018-10-15 11:58:12'),(10,'libero','libero','2018-10-15 11:58:13','2018-10-15 11:58:13'),(11,'sit','sit','2018-10-15 11:58:13','2018-10-15 11:58:13'),(12,'aliquam','aliquam','2018-10-15 11:58:13','2018-10-15 11:58:13'),(13,'voluptatibus','voluptatibus','2018-10-15 11:58:14','2018-10-15 11:58:14'),(14,'aspernatur','aspernatur','2018-10-15 11:58:14','2018-10-15 11:58:14'),(15,'officia','officia','2018-10-15 11:58:15','2018-10-15 11:58:15'),(16,'aut','aut','2018-10-15 11:58:16','2018-10-15 11:58:16'),(17,'porro','porro','2018-10-15 11:58:16','2018-10-15 11:58:16'),(18,'soluta','soluta','2018-10-15 11:58:17','2018-10-15 11:58:17'),(19,'tempore','tempore','2018-10-15 11:58:17','2018-10-15 11:58:17'),(20,'voluptates','voluptates','2018-10-15 11:58:17','2018-10-15 11:58:17'),(21,'eius','eius','2018-10-15 11:58:18','2018-10-15 11:58:18'),(22,'eum','eum','2018-10-15 11:58:18','2018-10-15 11:58:18'),(23,'est','est','2018-10-15 11:58:19','2018-10-15 11:58:19'),(24,'fugit','fugit','2018-10-15 11:58:19','2018-10-15 11:58:19'),(25,'dignissimos','dignissimos','2018-10-15 11:58:20','2018-10-15 11:58:20'),(26,'exercitationem','exercitationem','2018-10-15 11:58:20','2018-10-15 11:58:20'),(27,'quia','quia','2018-10-15 11:58:20','2018-10-15 11:58:20'),(28,'sit','sit','2018-10-15 11:58:21','2018-10-15 11:58:21'),(29,'ut','ut','2018-10-15 11:58:21','2018-10-15 11:58:21'),(30,'et','et','2018-10-15 11:58:22','2018-10-15 11:58:22');
/*!40000 ALTER TABLE `channels` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-16 21:19:08
