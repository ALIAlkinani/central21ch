-- MySQL dump 10.13  Distrib 5.7.14, for Win64 (x86_64)
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
-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `subject_id` int(10) unsigned NOT NULL,
  `subject_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activities`
--

LOCK TABLES `activities` WRITE;
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;
INSERT INTO `activities` VALUES (1,18,3,'App\\Poem','created_poem','2018-07-07 13:20:07','2018-07-07 13:20:07'),(6,18,5,'App\\Poem','created_poem','2018-07-09 15:04:01','2018-07-09 15:04:01'),(39,20,7,'App\\Poem','created_poem','2018-07-16 12:09:31','2018-07-16 12:09:31'),(40,20,8,'App\\Poem','created_poem','2018-07-16 12:10:32','2018-07-16 12:10:32'),(41,20,17,'App\\Reply','created_reply','2018-07-16 12:11:12','2018-07-16 12:11:12'),(42,18,9,'App\\Poem','created_poem','2018-07-16 12:12:21','2018-07-16 12:12:21'),(43,18,10,'App\\Poem','created_poem','2018-07-16 12:12:21','2018-07-16 12:12:21'),(44,18,11,'App\\Poem','created_poem','2018-07-16 12:22:19','2018-07-16 12:22:19');
/*!40000 ALTER TABLE `activities` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `channels`
--

LOCK TABLES `channels` WRITE;
/*!40000 ALTER TABLE `channels` DISABLE KEYS */;
INSERT INTO `channels` VALUES (1,'quas','quas','2018-07-07 13:07:00','2018-07-07 13:07:00'),(2,'aut','aut','2018-07-07 13:10:49','2018-07-07 13:10:49'),(3,'facilis','facilis','2018-07-07 13:10:50','2018-07-07 13:10:50'),(4,'modi','modi','2018-07-07 13:10:50','2018-07-07 13:10:50'),(5,'odit','odit','2018-07-07 13:10:50','2018-07-07 13:10:50'),(6,'est','est','2018-07-07 13:10:50','2018-07-07 13:10:50'),(7,'consequatur','consequatur','2018-07-07 13:10:50','2018-07-07 13:10:50'),(8,'magni','magni','2018-07-07 13:10:51','2018-07-07 13:10:51'),(9,'magnam','magnam','2018-07-07 13:10:51','2018-07-07 13:10:51'),(10,'explicabo','explicabo','2018-07-07 13:10:51','2018-07-07 13:10:51'),(11,'nihil','nihil','2018-07-07 13:10:51','2018-07-07 13:10:51'),(12,'aperiam','aperiam','2018-07-07 13:13:38','2018-07-07 13:13:38'),(13,'dolores','dolores','2018-07-07 13:13:38','2018-07-07 13:13:38'),(14,'porro','porro','2018-07-07 13:13:38','2018-07-07 13:13:38'),(15,'pariatur','pariatur','2018-07-07 13:13:38','2018-07-07 13:13:38'),(16,'vitae','vitae','2018-07-07 13:13:38','2018-07-07 13:13:38');
/*!40000 ALTER TABLE `channels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `favorites`
--

DROP TABLE IF EXISTS `favorites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `favorites` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `favorited_id` int(10) unsigned NOT NULL,
  `favorited_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `favorites_user_id_favorited_id_favorited_type_unique` (`user_id`,`favorited_id`,`favorited_type`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favorites`
--

LOCK TABLES `favorites` WRITE;
/*!40000 ALTER TABLE `favorites` DISABLE KEYS */;
INSERT INTO `favorites` VALUES (2,18,2,'App\\Reply','2018-07-07 22:38:45','2018-07-07 22:38:45'),(3,18,3,'App\\Reply','2018-07-07 23:13:52','2018-07-07 23:13:52'),(4,18,4,'App\\Reply','2018-07-09 17:39:38','2018-07-09 17:39:38'),(5,18,5,'App\\Reply','2018-07-09 17:49:58','2018-07-09 17:49:58'),(6,18,7,'App\\Reply','2018-07-10 13:25:04','2018-07-10 13:25:04');
/*!40000 ALTER TABLE `favorites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (27,'2014_10_12_000000_create_users_table',1),(28,'2014_10_12_100000_create_password_resets_table',1),(29,'2018_06_20_175640_create_poems_table',1),(30,'2018_06_20_180448_create_replies_table',1),(31,'2018_06_27_155434_create_channels_table',1),(32,'2018_07_03_035645_create_favorites_table',1),(33,'2018_07_06_184342_create_activities_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `poems`
--

DROP TABLE IF EXISTS `poems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `poems` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `channel_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poems`
--

LOCK TABLES `poems` WRITE;
/*!40000 ALTER TABLE `poems` DISABLE KEYS */;
INSERT INTO `poems` VALUES (1,2,1,'Et sed alias corporis aut.','Id voluptas doloribus reiciendis tempora ab. Aperiam molestias repudiandae amet ratione minima et dolorem voluptatem. Eum quod et animi repellendus mollitia.','2018-07-07 13:07:00','2018-07-07 13:07:00'),(2,8,2,'Officia non expedita nemo laborum nostrum est.','Quos et vel quibusdam dolor. Ut qui voluptas temporibus nihil culpa cupiditate reiciendis. Consequatur et quod voluptate placeat alias ut. Illum aut iusto ipsum cumque soluta. Ut consectetur et dolorum voluptas.','2018-07-07 13:10:51','2018-07-07 13:10:51'),(3,18,7,'Take all my loves, my love, yea, take them all','Take all my loves, my love, yea, take them all:\r\nWhat hast thou then more than thou hadst before?\r\nNo love, my love, that thou mayst true love call—\r\nAll mine was thine before thou hadst this more.\r\nThen if for my love thou my love receivest,\r\nI cannot blame thee for my love thou usest;\r\nBut yet be blamed if thou this self deceivest\r\nBy wilful taste of what thyself refusest.\r\nI do forgive thy robb’ry, gentle thief,\r\nAlthough thou steal thee all my poverty;\r\nAnd yet love knows it is a greater grief\r\nTo bear love’s wrong than hate’s known injury.\r\n    Lascivious grace, in whom all ill well shows,\r\n    Kill me with spites, yet we must not be foes.','2018-07-07 13:20:06','2018-07-07 13:20:06'),(5,18,6,'Romantic','my dear cousin','2018-07-09 15:04:01','2018-07-09 15:04:01'),(7,20,7,'hello','hello','2018-07-16 12:09:31','2018-07-16 12:09:31'),(8,20,6,'hello','hello2','2018-07-16 12:10:32','2018-07-16 12:10:32'),(9,18,4,'hello','hello','2018-07-16 12:12:20','2018-07-16 12:12:20'),(10,18,4,'hello','hello','2018-07-16 12:12:21','2018-07-16 12:12:21'),(11,18,4,'hi','hi','2018-07-16 12:22:19','2018-07-16 12:22:19');
/*!40000 ALTER TABLE `poems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `replies`
--

DROP TABLE IF EXISTS `replies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `replies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `poem_id` int(11) NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `replies`
--

LOCK TABLES `replies` WRITE;
/*!40000 ALTER TABLE `replies` DISABLE KEYS */;
INSERT INTO `replies` VALUES (17,20,8,'hello','2018-07-16 12:11:12','2018-07-16 12:11:12');
/*!40000 ALTER TABLE `replies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Perry Kozey','ruby.reichel@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,'LE0mBGY43t','2018-07-07 13:07:00','2018-07-07 13:07:00'),(2,'Mrs. Shanie Thiel MD','kristopher31@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,'cet8tw3zzw','2018-07-07 13:07:00','2018-07-07 13:07:00'),(3,'Cathryn Tremblay','abshire.evans@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,'kfiWuW2pAV','2018-07-07 13:10:05','2018-07-07 13:10:05'),(4,'Bobby Schinner','bbergstrom@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,'t5OBzfGC5m','2018-07-07 13:10:06','2018-07-07 13:10:06'),(5,'Zoila Rippin','garnet94@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,'dWK5Rg6p3A','2018-07-07 13:10:06','2018-07-07 13:10:06'),(6,'Miss Nya Parker MD','jhomenick@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,'E1PShYhn4z','2018-07-07 13:10:06','2018-07-07 13:10:06'),(7,'Dr. Imogene Lynch PhD','verner.keeling@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,'NqZGzbdekQ','2018-07-07 13:10:06','2018-07-07 13:10:06'),(8,'Riley Kertzmann','kgleichner@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,'Tv9EDh2QiW','2018-07-07 13:10:49','2018-07-07 13:10:49'),(9,'Lorna Heathcote','theresia.kuhlman@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,'EXHyfMbnrV','2018-07-07 13:10:49','2018-07-07 13:10:49'),(10,'Prof. Josh Marquardt','rstamm@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,'D2ojN064is','2018-07-07 13:10:50','2018-07-07 13:10:50'),(11,'Halie Wintheiser','aspinka@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,'34p1Z2pede','2018-07-07 13:10:50','2018-07-07 13:10:50'),(12,'Raven Grant I','turcotte.hermann@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,'4i9FbKqpC0','2018-07-07 13:10:50','2018-07-07 13:10:50'),(13,'Colleen Farrell','albertha07@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,'QnTeXLfZ6j','2018-07-07 13:10:50','2018-07-07 13:10:50'),(14,'Miss Caleigh Kovacek Sr.','luettgen.keely@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,'03RT6WDEBp','2018-07-07 13:10:51','2018-07-07 13:10:51'),(15,'Christop Corkery','gislason.jena@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,'ESeWjQNvap','2018-07-07 13:10:51','2018-07-07 13:10:51'),(16,'Abner Nader','jaquelin43@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,'AXZQ5Mmm44','2018-07-07 13:10:51','2018-07-07 13:10:51'),(17,'Ashtyn Towne','fharber@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,'lnqlpYAers','2018-07-07 13:10:51','2018-07-07 13:10:51'),(18,'ali Alkinani','a22@gmail.com','$2y$10$UeHK2lFbGA/5tflCr1JOzueUSNoFJHV6krhwIbt99Lqxu.ATPL5Bu',NULL,'E1bTraZIOcZvr8kn8dzPDzEFJ6BRvNhkLjtbjyfB4Pys0jZQ16kZRmgopzkU','2018-07-07 13:17:30','2018-07-09 15:01:40'),(19,'ali Alkinani','alkenanya22@gmail.com','$2y$10$SfJM3XESy6E35RRvtPtxuuKuqneq5U0mRay7reW0giSS4wExF1VG6','jMKZscfjzguHSy65CwN71VZ7z4MesoPryXV7dCotMh2fYyMcBx',NULL,'2018-07-07 22:39:47','2018-07-07 22:39:47'),(20,'sarah','sarah@gmail.com','$2y$10$MN3kNfbUHq4Y/CuH7mIWe.IcTL2rCx0/ozqaR57FZ5ixQUdBH7IFO',NULL,NULL,'2018-07-07 22:41:11','2018-07-07 22:41:57');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-31 20:54:20
