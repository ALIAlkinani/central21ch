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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activities`
--

LOCK TABLES `activities` WRITE;
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;
INSERT INTO `activities` VALUES (1,31,31,'App\\Poem','created_poem','2018-10-15 13:58:58','2018-10-15 13:58:58'),(5,31,1,'App\\Reply','created_reply','2018-10-15 16:27:40','2018-10-15 16:27:40'),(6,31,2,'App\\Reply','created_reply','2018-10-15 17:08:27','2018-10-15 17:08:27'),(7,31,35,'App\\Poem','created_poem','2018-10-15 17:13:20','2018-10-15 17:13:20');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favorites`
--

LOCK TABLES `favorites` WRITE;
/*!40000 ALTER TABLE `favorites` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (127,'2014_10_12_000000_create_users_table',1),(128,'2014_10_12_100000_create_password_resets_table',1),(129,'2018_06_20_180448_create_replies_table',1),(130,'2018_06_21_175640_create_poems_table',1),(131,'2018_06_27_155434_create_channels_table',1),(132,'2018_07_03_035645_create_favorites_table',1),(133,'2018_07_06_184342_create_activities_table',1),(134,'2018_08_08_101315_create_poem_subscriptions_table',1),(135,'2018_08_11_073444_create_notifications_table',1),(136,'2018_09_15_061146_create_translates_table',1),(137,'2018_10_01_083959_create_poets_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
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
-- Table structure for table `poem_subscriptions`
--

DROP TABLE IF EXISTS `poem_subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `poem_subscriptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `poem_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `poem_subscriptions_user_id_poem_id_unique` (`user_id`,`poem_id`),
  KEY `poem_subscriptions_poem_id_foreign` (`poem_id`),
  CONSTRAINT `poem_subscriptions_poem_id_foreign` FOREIGN KEY (`poem_id`) REFERENCES `poems` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poem_subscriptions`
--

LOCK TABLES `poem_subscriptions` WRITE;
/*!40000 ALTER TABLE `poem_subscriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `poem_subscriptions` ENABLE KEYS */;
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
  `poet_id` int(10) unsigned NOT NULL,
  `channel_id` int(10) unsigned NOT NULL,
  `replies_count` int(10) unsigned NOT NULL DEFAULT '0',
  `translates_count` int(10) unsigned NOT NULL DEFAULT '0',
  `visits` int(10) unsigned NOT NULL DEFAULT '0',
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` double(18,14) DEFAULT NULL,
  `lng` double(18,14) DEFAULT NULL,
  `locked` tinyint(1) NOT NULL DEFAULT '0',
  `best_reply_id` int(10) unsigned DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `poems_slug_unique` (`slug`),
  KEY `poems_best_reply_id_foreign` (`best_reply_id`),
  CONSTRAINT `poems_best_reply_id_foreign` FOREIGN KEY (`best_reply_id`) REFERENCES `replies` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poems`
--

LOCK TABLES `poems` WRITE;
/*!40000 ALTER TABLE `poems` DISABLE KEYS */;
INSERT INTO `poems` VALUES (1,1,1,1,0,1,3,'English','Temporibus sit omnis mollitia molestiae voluptatem neque.',-33.86514300000000,151.20990000000000,0,NULL,'temporibus-sit-omnis-mollitia-molestiae-voluptatem-neque-c4ca4238a0b923820dcc509a6f75849b','Ab voluptas inventore sit explicabo nesciunt aut. Laboriosam quae corporis tenetur incidunt sed voluptatum quod. Qui at temporibus sed culpa omnis labore. Suscipit laudantium similique quidem eius.','2018-10-15 11:58:23','2018-10-15 15:25:28'),(2,2,2,2,0,0,11,'English','Repudiandae debitis voluptatibus ipsum sit aliquam maxime quaerat quaerat.',-33.86514300000000,151.20990000000000,0,NULL,'repudiandae-debitis-voluptatibus-ipsum-sit-aliquam-maxime-quaerat-quaerat-c81e728d9d4c2f636f067f89cc14862c','Et ipsam voluptatibus et sint. Consequatur rerum sunt sed aut soluta dolor. Velit qui et in recusandae accusamus quas qui. Labore officiis autem earum quia enim.','2018-10-15 11:58:23','2018-10-15 14:46:04'),(3,3,3,3,0,0,0,'English','Illum ut dolorem voluptate eum nulla voluptas non.',-33.86514300000000,151.20990000000000,0,NULL,'illum-ut-dolorem-voluptate-eum-nulla-voluptas-non-eccbc87e4b5ce2fe28308fd9f2a7baf3','Dolores eos dolore enim cupiditate et sapiente ad. Distinctio est eum qui nisi eaque. Fuga natus voluptatem quis et assumenda officiis.','2018-10-15 11:58:24','2018-10-15 11:58:24'),(4,4,4,4,0,0,0,'English','Quo voluptatem soluta aut incidunt quia ut assumenda.',-33.86514300000000,151.20990000000000,0,NULL,'quo-voluptatem-soluta-aut-incidunt-quia-ut-assumenda-a87ff679a2f3e71d9181a67b7542122c','Voluptates amet architecto hic ex quasi distinctio. Blanditiis placeat dolor quis laborum. Et minima ducimus nesciunt ea dolorem et excepturi. Iusto nesciunt accusantium vitae sed quisquam.','2018-10-15 11:58:24','2018-10-15 11:58:24'),(5,5,5,5,0,0,0,'English','Iste sit officia consectetur esse omnis.',-33.86514300000000,151.20990000000000,0,NULL,'iste-sit-officia-consectetur-esse-omnis-e4da3b7fbbce2345d7772b0674a318d5','Repellat sed repellendus numquam numquam tempore repudiandae. Ut et tenetur sit inventore nisi et alias ipsum. Qui repellendus similique ut vel atque.','2018-10-15 11:58:25','2018-10-15 11:58:25'),(6,6,6,6,0,0,0,'English','Consequatur voluptas inventore voluptas natus.',-33.86514300000000,151.20990000000000,0,NULL,'consequatur-voluptas-inventore-voluptas-natus-1679091c5a880faf6fb5e6087eb1b2dc','Ut necessitatibus ex aliquid quam et quam recusandae. Ducimus id ea impedit minus. Incidunt nam autem iure sint voluptatibus. Repellat repudiandae et architecto corporis tenetur inventore et.','2018-10-15 11:58:25','2018-10-15 11:58:25'),(7,7,7,7,0,0,0,'English','Et eligendi quas odit numquam perspiciatis.',-33.86514300000000,151.20990000000000,0,NULL,'et-eligendi-quas-odit-numquam-perspiciatis-8f14e45fceea167a5a36dedd4bea2543','Voluptatem velit perspiciatis est consequatur ab autem magnam. Fugit necessitatibus accusamus eum aspernatur sit in incidunt. Excepturi ut consequatur aliquam. Iste natus amet quos quasi laboriosam. Provident praesentium fuga ut tenetur assumenda ut.','2018-10-15 11:58:26','2018-10-15 11:58:26'),(8,8,8,8,0,0,0,'English','Ullam fuga exercitationem minima omnis.',-33.86514300000000,151.20990000000000,0,NULL,'ullam-fuga-exercitationem-minima-omnis-c9f0f895fb98ab9159f51fd0297e236d','Vel deserunt atque in et dolor et odio repellat. Qui illum assumenda et. Quia sint perspiciatis eveniet autem. Sint accusantium enim quasi enim.','2018-10-15 11:58:26','2018-10-15 11:58:26'),(9,9,9,9,0,0,0,'English','Velit et veniam reprehenderit ullam odio ab consectetur.',-33.86514300000000,151.20990000000000,0,NULL,'velit-et-veniam-reprehenderit-ullam-odio-ab-consectetur-45c48cce2e2d7fbdea1afc51c7c6ad26','Atque aut itaque explicabo quas animi pariatur optio. Vel sint dolor voluptatum omnis eligendi itaque. Ducimus cum quod nesciunt.','2018-10-15 11:58:27','2018-10-15 11:58:27'),(10,10,10,10,0,0,0,'English','Error harum eveniet fugiat in.',-33.86514300000000,151.20990000000000,0,NULL,'error-harum-eveniet-fugiat-in-d3d9446802a44259755d38e6d163e820','Veniam eum perferendis animi earum. Et et est ad numquam earum illo animi.','2018-10-15 11:58:27','2018-10-15 11:58:27'),(11,11,11,11,0,0,0,'English','Ab et modi aut sit saepe a ratione accusantium.',-33.86514300000000,151.20990000000000,0,NULL,'ab-et-modi-aut-sit-saepe-a-ratione-accusantium-6512bd43d9caa6e02c990b0a82652dca','Dolor est quasi deserunt omnis voluptas qui. Qui qui animi eos architecto. Commodi quo ab aut magni nesciunt consequuntur. Necessitatibus vel maxime qui inventore molestias quasi.','2018-10-15 11:58:27','2018-10-15 11:58:27'),(12,12,12,12,0,0,0,'English','Totam ex qui reprehenderit occaecati.',-33.86514300000000,151.20990000000000,0,NULL,'totam-ex-qui-reprehenderit-occaecati-c20ad4d76fe97759aa27a0c99bff6710','Nesciunt accusantium officia atque. Sapiente aliquam nisi nihil animi et. Ducimus veniam perspiciatis et officiis non dignissimos.','2018-10-15 11:58:28','2018-10-15 11:58:28'),(13,13,13,13,0,0,0,'English','Tenetur quia et ad et maxime quas voluptatem vel.',-33.86514300000000,151.20990000000000,0,NULL,'tenetur-quia-et-ad-et-maxime-quas-voluptatem-vel-c51ce410c124a10e0db5e4b97fc2af39','Culpa placeat sit hic quo. Itaque perspiciatis vitae aperiam aut. Odio perspiciatis id nihil voluptas alias in a. Id qui assumenda expedita optio eius minima enim adipisci.','2018-10-15 11:58:28','2018-10-15 11:58:28'),(14,14,14,14,0,0,0,'English','Voluptas porro ex et quis ad sapiente est.',-33.86514300000000,151.20990000000000,0,NULL,'voluptas-porro-ex-et-quis-ad-sapiente-est-aab3238922bcc25a6f606eb525ffdc56','Autem rerum doloribus aut neque consequatur quis magnam doloremque. Est veritatis sit sint aut eveniet et. Architecto aliquid pariatur est qui magni facere quo porro. Maiores nemo culpa ab.','2018-10-15 11:58:28','2018-10-15 11:58:28'),(15,15,15,15,0,0,0,'English','Iusto repellat omnis molestias.',-33.86514300000000,151.20990000000000,0,NULL,'iusto-repellat-omnis-molestias-9bf31c7ff062936a96d3c8bd1f8f2ff3','Dolore velit magni iure natus rerum dolor est. Quas quidem consequatur a animi vero dicta. Tenetur architecto velit explicabo aut. Explicabo delectus provident culpa dolores.','2018-10-15 11:58:28','2018-10-15 11:58:28'),(16,16,16,16,0,0,0,'English','Facere voluptas libero ut et quaerat.',-33.86514300000000,151.20990000000000,0,NULL,'facere-voluptas-libero-ut-et-quaerat-c74d97b01eae257e44aa9d5bade97baf','Harum sint sunt cupiditate eum eum minus. Iusto hic voluptatem modi veniam.','2018-10-15 11:58:29','2018-10-15 11:58:29'),(17,17,17,17,0,0,0,'English','Ab necessitatibus in quae.',-33.86514300000000,151.20990000000000,0,NULL,'ab-necessitatibus-in-quae-70efdf2ec9b086079795c442636b55fb','Ut non impedit sequi neque hic voluptatem. Cupiditate et non autem aliquid officia perferendis. Quis consequuntur aut est repellendus rerum vitae recusandae sint.','2018-10-15 11:58:29','2018-10-15 11:58:29'),(18,18,18,18,0,0,0,'English','Autem aut explicabo magnam consequatur id.',-33.86514300000000,151.20990000000000,0,NULL,'autem-aut-explicabo-magnam-consequatur-id-6f4922f45568161a8cdf4ad2299f6d23','Ipsum eos dolor doloremque autem ipsam ullam dolore inventore. Culpa architecto consectetur optio ex ut ipsum provident ipsam. Porro odio velit qui doloremque enim aliquam eligendi. Enim aut libero doloremque doloremque molestiae facere occaecati.','2018-10-15 11:58:29','2018-10-15 11:58:29'),(19,19,19,19,0,0,0,'English','Iure maiores earum hic sunt ut ea vel.',-33.86514300000000,151.20990000000000,0,NULL,'iure-maiores-earum-hic-sunt-ut-ea-vel-1f0e3dad99908345f7439f8ffabdffc4','Quod ut quas impedit vel eaque tenetur quae. Voluptatibus sunt qui aut exercitationem. Aut non asperiores cupiditate placeat ut sunt. Voluptas ut ut aut sequi vitae.','2018-10-15 11:58:29','2018-10-15 11:58:29'),(20,20,20,20,0,0,0,'English','Id consectetur et qui voluptas deserunt placeat.',-33.86514300000000,151.20990000000000,0,NULL,'id-consectetur-et-qui-voluptas-deserunt-placeat-98f13708210194c475687be6106a3b84','Reprehenderit consequuntur voluptatem ut est beatae pariatur. Architecto aut molestiae omnis eum earum accusamus et. Et quisquam et minima rem incidunt ut. Voluptas sunt ullam ea perferendis ex nesciunt quisquam.','2018-10-15 11:58:29','2018-10-15 11:58:29'),(21,21,21,21,0,0,0,'English','Qui architecto corrupti debitis aut.',-33.86514300000000,151.20990000000000,0,NULL,'qui-architecto-corrupti-debitis-aut-3c59dc048e8850243be8079a5c74d079','Debitis quidem rem unde labore omnis incidunt odit quasi. Dolorum et illum repudiandae et dignissimos totam. Aspernatur et itaque minima id non. Deleniti commodi nostrum est eaque minima animi numquam.','2018-10-15 11:58:30','2018-10-15 11:58:30'),(22,22,22,22,0,0,0,'English','Fugit fugit totam autem excepturi sed dicta.',-33.86514300000000,151.20990000000000,0,NULL,'fugit-fugit-totam-autem-excepturi-sed-dicta-b6d767d2f8ed5d21a44b0e5886680cb9','Quia quas fuga et et enim velit. Eos molestiae sed maiores iste fuga necessitatibus quo illum. Error nihil voluptas quod est veritatis tempore qui ad. Dolorem autem omnis quis qui ea.','2018-10-15 11:58:30','2018-10-15 11:58:30'),(23,23,23,23,0,0,0,'English','Qui omnis voluptate ut asperiores eligendi maxime.',-33.86514300000000,151.20990000000000,0,NULL,'qui-omnis-voluptate-ut-asperiores-eligendi-maxime-37693cfc748049e45d87b8c7d8b9aacd','Optio totam eaque blanditiis. Aut optio vero aut commodi facilis maiores recusandae. Inventore ratione officiis esse modi totam. Iste fugit molestias consequatur est sequi fugit officia.','2018-10-15 11:58:31','2018-10-15 11:58:31'),(24,24,24,24,0,0,0,'English','Magnam est provident est labore id quis.',-33.86514300000000,151.20990000000000,0,NULL,'magnam-est-provident-est-labore-id-quis-1ff1de774005f8da13f42943881c655f','Incidunt soluta earum perferendis aut. Iure et consequatur tempore omnis alias quam qui. Eos beatae sequi ad. Et quasi natus vitae eos et ut hic vel.','2018-10-15 11:58:31','2018-10-15 11:58:31'),(25,25,25,25,0,0,0,'English','Ullam aliquid dolorem culpa officia odit architecto.',-33.86514300000000,151.20990000000000,0,NULL,'ullam-aliquid-dolorem-culpa-officia-odit-architecto-8e296a067a37563370ded05f5a3bf3ec','Dolor dolor dolorem dolor ex sint. A non vero consequuntur labore vero ratione molestiae. Pariatur vero aut voluptatem voluptatem sit natus doloremque voluptas. Ea autem eveniet inventore quia.','2018-10-15 11:58:32','2018-10-15 11:58:32'),(26,26,26,26,0,0,0,'English','Ipsum voluptatem sint facere esse et sunt.',-33.86514300000000,151.20990000000000,0,NULL,'ipsum-voluptatem-sint-facere-esse-et-sunt-4e732ced3463d06de0ca9a15b6153677','Dolorem ipsa architecto quaerat sequi voluptatibus sapiente illum. Quibusdam tempore sunt impedit.','2018-10-15 11:58:32','2018-10-15 11:58:32'),(27,27,27,27,0,0,0,'English','Minus odit quas ex.',-33.86514300000000,151.20990000000000,0,NULL,'minus-odit-quas-ex-02e74f10e0327ad868d138f2b4fdd6f0','Asperiores quis id quis qui. Modi consequatur sed aliquid consequatur. Modi explicabo et amet sed aut est quae.','2018-10-15 11:58:33','2018-10-15 11:58:33'),(28,28,28,28,0,0,0,'English','Aut provident hic quo laudantium sed.',-33.86514300000000,151.20990000000000,0,NULL,'aut-provident-hic-quo-laudantium-sed-33e75ff09dd601bbe69f351039152189','Fugit error dignissimos voluptas. Qui accusamus ducimus odio atque impedit in molestiae.','2018-10-15 11:58:33','2018-10-15 11:58:33'),(29,29,29,29,0,0,0,'English','Vitae deserunt et perspiciatis.',-33.86514300000000,151.20990000000000,0,NULL,'vitae-deserunt-et-perspiciatis-6ea9ab1baa0efb9e19094440c317e21b','Aperiam molestiae cumque voluptatem sint. Molestiae eveniet asperiores officia nobis architecto. Id laudantium voluptatem magnam dolor natus reprehenderit.','2018-10-15 11:58:34','2018-10-15 11:58:34'),(30,30,30,30,0,0,0,'English','Praesentium sequi cum illo a officia velit.',-33.86514300000000,151.20990000000000,0,NULL,'praesentium-sequi-cum-illo-a-officia-velit-34173cb38f07f89ddbebc2ac9128303f','Ut maiores et officia non doloribus maxime minima. Molestiae unde aut incidunt dignissimos. Enim et ex eius nobis enim quos sint quisquam.','2018-10-15 11:58:35','2018-10-15 11:58:35'),(31,31,21,3,2,2,16,NULL,'Ozymandias',-27.41733954885257,143.03607187500006,0,NULL,'ozymandias','<div>I met a traveller from an antique land, Who said—“Two vast and trunkless legs of stone Stand in the desert. . . . Near them, on the sand, Half sunk a shattered visage lies, whose frown, And wrinkled lip, and sneer of cold command, Tell that its sculptor well those passions read Which yet survive, stamped on these lifeless things,</div><div>The hand that mocked them, and the heart that fed; And on the pedestal, these words appear: My name is Ozymandias, King of Kings; Look on my Works, ye Mighty, and despair! Nothing beside remains. Round the decay Of that colossal Wreck, boundless and bare The lone and level sands stretch far away.”</div>','2018-10-15 13:58:57','2018-10-15 17:11:03'),(35,31,29,1,0,0,1,'Chinese_Mandarin','Test',-27.38320122416318,144.09075937500006,0,NULL,'test','<div>test chinese</div>','2018-10-15 17:13:19','2018-10-15 17:13:22');
/*!40000 ALTER TABLE `poems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `poets`
--

DROP TABLE IF EXISTS `poets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `poets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `date_of_death` date DEFAULT NULL,
  `mother_language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poets`
--

LOCK TABLES `poets` WRITE;
/*!40000 ALTER TABLE `poets` DISABLE KEYS */;
INSERT INTO `poets` VALUES (1,'Hermina','Moen','Iraqi','2006-08-29','1974-02-28','Arabic',NULL,'Atque voluptas dolorem et magni nihil et quisquam. Veniam eius architecto commodi minima. Laboriosam repellat at voluptates et autem eaque. Est occaecati laboriosam ipsam recusandae repellendus saepe saepe dolorem.','2018-10-15 11:58:09','2018-10-15 11:58:09'),(2,'Yesenia','Abbott','Iraqi','1998-11-19','1972-05-29','Arabic',NULL,'Debitis magnam vitae placeat sit at voluptas et. Eos est maxime quo iste tempora rerum dolor. Voluptatem incidunt enim repudiandae quaerat qui aut. Similique voluptatibus repellat eius explicabo tenetur dolores.','2018-10-15 11:58:09','2018-10-15 11:58:09'),(3,'Roy','Windler','Iraqi','2013-03-19','2011-10-31','Arabic',NULL,'Dicta rerum dolorum velit laudantium velit porro. Itaque laborum repellendus enim. Fuga enim quaerat aut voluptates iure.','2018-10-15 11:58:10','2018-10-15 11:58:10'),(4,'Cody','Hodkiewicz','Iraqi','1999-06-22','2015-05-04','Arabic',NULL,'Et quibusdam aut quia voluptate voluptatem nisi nihil. Dolore perspiciatis et consequatur. Suscipit aut error eum aspernatur necessitatibus et. Provident quod eaque ut est.','2018-10-15 11:58:10','2018-10-15 11:58:10'),(5,'Erick','Fahey','Iraqi','2004-02-26','2002-06-14','Arabic',NULL,'Tempora nesciunt in fugit ipsam et. Non vero modi labore vel animi. Vitae impedit eaque sunt hic at. Itaque perferendis corrupti voluptas blanditiis amet.','2018-10-15 11:58:11','2018-10-15 11:58:11'),(6,'Guy','Breitenberg','Iraqi','2005-07-26','1972-03-05','Arabic',NULL,'Saepe nam ducimus ab minima suscipit quis. Quia fugiat non ab deserunt. Eum ab delectus aut harum corporis placeat explicabo placeat. Rerum non vel ut veritatis et aut occaecati.','2018-10-15 11:58:11','2018-10-15 11:58:11'),(7,'Josefa','Fahey','Iraqi','2008-11-16','2017-05-13','Arabic',NULL,'Maxime minima molestiae ut rerum natus ad. Molestiae quia qui at deleniti fuga possimus nostrum. Perspiciatis fuga aut quo et necessitatibus rerum iure. Nisi ut eaque dolores eaque vitae quia corrupti.','2018-10-15 11:58:12','2018-10-15 11:58:12'),(8,'Abel','Altenwerth','Iraqi','2010-07-23','1989-08-03','Arabic',NULL,'Optio occaecati vel minus voluptatem. Ut impedit possimus veniam sit aperiam expedita amet. Facere libero sit harum non illo animi quod.','2018-10-15 11:58:12','2018-10-15 11:58:12'),(9,'Haylie','Rodriguez','Iraqi','1997-05-20','1979-06-24','Arabic',NULL,'Qui reprehenderit vero quod. Quaerat officia optio eos omnis aut dolores dolore. Tempora ut sequi nihil dolorum fuga qui.','2018-10-15 11:58:12','2018-10-15 11:58:12'),(10,'Tre','Zieme','Iraqi','2003-01-04','1987-01-09','Arabic',NULL,'Voluptatem ut vitae id quisquam ipsum dolores non. Ratione non ipsum maiores nihil et. Rerum eius necessitatibus sunt dolor ipsum consequatur. Enim sint optio facere temporibus sequi alias similique. Dolores neque voluptas iste.','2018-10-15 11:58:13','2018-10-15 11:58:13'),(11,'Vernie','Greenholt','Iraqi','1994-03-18','2008-03-09','Arabic',NULL,'Impedit sit sit laboriosam totam. Rem aut qui quod molestiae cumque. Laudantium accusamus eveniet dignissimos pariatur iusto mollitia aut. Provident vero et veniam et laboriosam itaque quia provident.','2018-10-15 11:58:13','2018-10-15 11:58:13'),(12,'Frieda','Crona','Iraqi','1999-01-17','2011-12-24','Arabic',NULL,'Quo saepe velit sit magnam quia accusamus provident accusamus. Et aliquam inventore minus voluptate ea qui. Dolorum est ut aspernatur aperiam quia eligendi. Voluptates ad modi fuga rerum eius iste.','2018-10-15 11:58:13','2018-10-15 11:58:13'),(13,'Nathanial','Cole','Iraqi','1987-07-29','2003-10-14','Arabic',NULL,'Aliquid ipsum consequatur quia a minima totam. Exercitationem sit ab modi consequatur rem consequuntur eos dolores. Aspernatur amet voluptatem aut iusto. Sint qui velit quia in totam ut veniam.','2018-10-15 11:58:14','2018-10-15 11:58:14'),(14,'Lorna','Hickle','Iraqi','2005-03-31','1985-06-21','Arabic',NULL,'Quos dolorem et commodi iste dolorem ut et. Et in repudiandae nisi et et aut eum. Consequatur in eligendi et at ut et itaque eos.','2018-10-15 11:58:15','2018-10-15 11:58:15'),(15,'Jacquelyn','Kirlin','Iraqi','1994-07-03','1977-01-29','Arabic',NULL,'Ut blanditiis ad fugit ut aliquam. Aliquid voluptates impedit vero quas maiores quaerat consectetur. Necessitatibus rerum nihil debitis perspiciatis quis dolor. Minima illum accusantium sint voluptates.','2018-10-15 11:58:16','2018-10-15 11:58:16'),(16,'Janelle','Wuckert','Iraqi','1987-03-19','1978-09-30','Arabic',NULL,'Quibusdam nulla accusantium accusamus quia et. Dolorum dolorem perspiciatis aut. Modi ut voluptatibus aut consequatur eaque. Est vel iure est deserunt qui.','2018-10-15 11:58:16','2018-10-15 11:58:16'),(17,'Aiden','Deckow','Iraqi','1978-09-30','2017-11-19','Arabic',NULL,'Aut sed placeat non sed. Et illo aperiam et quas repellendus. Eos blanditiis quae ullam rerum magnam.','2018-10-15 11:58:17','2018-10-15 11:58:17'),(18,'Bonita','Jacobson','Iraqi','2011-06-27','1994-06-03','Arabic',NULL,'Id necessitatibus nesciunt quas nesciunt laborum. Est architecto a sapiente quidem et atque consequatur. Labore qui esse recusandae.','2018-10-15 11:58:17','2018-10-15 11:58:17'),(19,'Kip','Walter','Iraqi','1992-12-29','1976-11-01','Arabic',NULL,'Sit excepturi rerum vel eos optio. Facilis ab quasi inventore nulla. Nulla rerum est amet.','2018-10-15 11:58:17','2018-10-15 11:58:17'),(20,'Chanelle','Schimmel','Iraqi','2005-01-01','1976-03-22','Arabic',NULL,'Explicabo doloremque saepe odio officia repellat eum. Dolorum in quae modi ut ut alias et. Facere ut quisquam corporis omnis neque velit velit. Est rem totam quidem distinctio pariatur.','2018-10-15 11:58:18','2018-10-15 11:58:18'),(21,'Ronaldo','Ritchie','Iraqi','2004-10-15','1985-03-14','Arabic','avatars/lY05Vv9xnjWUMorHVXmoX8rWPoigo2dc1kHIwm9m.jpeg','Ea optio nihil soluta et ipsam nobis voluptas. Voluptatem rerum nesciunt dolores et sint vel et. Animi quas repellendus debitis aspernatur ipsam et. Est quia accusantium dolorum cum nobis voluptas.','2018-10-15 11:58:18','2018-10-15 17:06:18'),(22,'Mariela','Hodkiewicz','Iraqi','2009-10-02','1970-05-22','Arabic',NULL,'Dignissimos architecto nisi cumque rem deserunt deserunt. Id perferendis voluptatem sit eum officiis. Minus ut debitis incidunt beatae et.','2018-10-15 11:58:19','2018-10-15 11:58:19'),(23,'Juwan','Luettgen','Iraqi','1984-12-14','2013-08-17','Arabic',NULL,'Rem voluptatem ratione sit ex. Perspiciatis quo recusandae tempore consequatur. Non libero vero voluptas suscipit eum sequi reiciendis explicabo.','2018-10-15 11:58:19','2018-10-15 11:58:19'),(24,'Juwan','Bernhard','Iraqi','1971-07-04','1975-11-09','Arabic',NULL,'Rerum fugiat voluptatibus enim possimus repellendus. Qui sed officia fugit veritatis velit est temporibus. Ipsam ut consectetur corrupti laudantium ducimus nesciunt.','2018-10-15 11:58:19','2018-10-15 11:58:19'),(25,'Magnus','Rutherford','Iraqi','1978-05-29','2015-05-20','Arabic',NULL,'Ut possimus fuga ea fugit nesciunt consequuntur enim. Est rerum perspiciatis corporis quo distinctio. Necessitatibus accusamus molestiae sed in quis maxime ut. Voluptatem voluptas et repellat.','2018-10-15 11:58:20','2018-10-15 11:58:20'),(26,'Ibrahim','White','Iraqi','1997-04-08','1970-05-15','Arabic',NULL,'Doloremque dolores voluptatem laboriosam officiis nulla ut. Alias quasi aut saepe et quod recusandae beatae. Totam vero aut sunt optio aut.','2018-10-15 11:58:20','2018-10-15 11:58:20'),(27,'Napoleon','Schiller','Iraqi','1998-04-28','2003-03-25','Arabic',NULL,'Saepe ipsum esse et. Excepturi quia ducimus nobis voluptatem. Consequuntur et dolores veritatis exercitationem accusamus fuga.','2018-10-15 11:58:20','2018-10-15 11:58:20'),(28,'Ezekiel','Bartoletti','Iraqi','1973-06-23','1975-10-18','Arabic',NULL,'Voluptatem tempora itaque iste tenetur incidunt illo. Ipsa voluptates dolorem voluptate est corrupti. Mollitia sed aspernatur ut iusto vitae libero aut. Aut eligendi beatae deleniti laudantium id voluptatem esse.','2018-10-15 11:58:21','2018-10-15 11:58:21'),(29,'Manuel','Keeling','Iraqi','2015-04-23','1980-08-29','Arabic',NULL,'Occaecati ratione natus possimus sint. Ut expedita qui voluptatem molestias. Non fugit reprehenderit nemo aut.','2018-10-15 11:58:22','2018-10-15 11:58:22'),(30,'Aida','Aufderhar','Iraqi','1993-11-16','2000-10-15','Arabic',NULL,'Ullam quis est quasi delectus doloremque. Ducimus in qui ad id ex qui. Aut nihil commodi quisquam.','2018-10-15 11:58:22','2018-10-15 11:58:22');
/*!40000 ALTER TABLE `poets` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `replies`
--

LOCK TABLES `replies` WRITE;
/*!40000 ALTER TABLE `replies` DISABLE KEYS */;
INSERT INTO `replies` VALUES (1,31,31,'DR. <a href=\"/profile/Delphine\">@Delphine</a> Runolfsdottir Sr.  nice to look','2018-10-15 16:27:39','2018-10-15 16:27:39'),(2,31,31,'<a href=\"/profile/l\">@l</a>','2018-10-15 17:08:26','2018-10-15 17:08:26');
/*!40000 ALTER TABLE `replies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `translates`
--

DROP TABLE IF EXISTS `translates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `translates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `poem_id` int(11) NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `translate_body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `translates`
--

LOCK TABLES `translates` WRITE;
/*!40000 ALTER TABLE `translates` DISABLE KEYS */;
INSERT INTO `translates` VALUES (1,31,1,'Arabic','من مخترع من دواعي سروري، أو لا أعرف كيف سأشرح. ولكن الملذات الجسدية الشديدة التي لا بد أن يحدث. والذين في بعض الأحيان ولكن ذنب من كل هذا العمل الشاق. تسبيحه مع الاناشيد الدينية، وفي نفسه، في الواقع، suscipit.','2018-10-15 15:24:34','2018-10-15 15:24:34'),(2,31,31,'Arabic','هل هناك شيء كعامل كلي؟\nالتقى firstI مسافر من أرض عتيقة ، من قال - \"اثنان من الساقين الشاسعة و trunkless من الوقوف في الصحراء. . . . بالقرب منهم ، على الرمال ، غرق نصفهم كذبة محطّمة ، شفتهم ، وشفتهم المتجعدّة ، وسخرية من الأمر البارد ، أخبروا أن نحاته جيدا تلك المشاعر تقرأ أيهما بعد ، يختم على هذه الأشياء التي لا حياة لها ،\nاليد التي سخر منها ، والقلب الذي أطعمه. وعلى قاعدة التمثال ، تظهر هذه الكلمات: اسمي Ozymandias ، ملك الملوك. انظروا الى اعمالي ، أيها القدير ، واليأس! لا شيء بجانبه. جولة الاضمحلال من هذا الحطام الضخم ، لا حدود له والعاريا تمتد الرمال الوحيدة والرصيف بعيدًا. \"','2018-10-15 17:09:06','2018-10-15 17:09:06'),(3,31,31,'Chinese_Mandarin','dknandkjaskjasnkjdas','2018-10-15 17:11:02','2018-10-15 17:11:02');
/*!40000 ALTER TABLE `translates` ENABLE KEYS */;
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
  `avatar_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_name_unique` (`name`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Mr. Florencio Hermann V','troy70@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'NLJDR53xJi','2018-10-15 11:58:08','2018-10-15 11:58:08'),(2,'Sunny Turner IV','armani.cole@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'XfCnvY8LtV','2018-10-15 11:58:09','2018-10-15 11:58:09'),(3,'Dr. Blaze Marvin','loyce18@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'l7vlTYuGX6','2018-10-15 11:58:09','2018-10-15 11:58:09'),(4,'Dr. Odessa Goldner I','prau@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'MjAPIbvliy','2018-10-15 11:58:10','2018-10-15 11:58:10'),(5,'Delphine Runolfsdottir Sr.','ibuckridge@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'UIlhlwTREX','2018-10-15 11:58:10','2018-10-15 11:58:10'),(6,'Ms. Elise Borer PhD','hgutkowski@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'mlUanuidwJ','2018-10-15 11:58:11','2018-10-15 11:58:11'),(7,'Alicia Leffler','cleora.fisher@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'mAzYbIoviY','2018-10-15 11:58:11','2018-10-15 11:58:11'),(8,'Dr. Harold Hessel','alice.hodkiewicz@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'zhXp7BfiI7','2018-10-15 11:58:12','2018-10-15 11:58:12'),(9,'Sonia Jenkins','brenna84@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'Q7sJmL2io2','2018-10-15 11:58:12','2018-10-15 11:58:12'),(10,'Syble Schumm Sr.','vincent10@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'EFG9qs7JYK','2018-10-15 11:58:13','2018-10-15 11:58:13'),(11,'Guido Zemlak','macie99@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'Lh7uu2qFGC','2018-10-15 11:58:13','2018-10-15 11:58:13'),(12,'Ms. Mayra Farrell','johnathon.gulgowski@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'kzK4ZwDiJL','2018-10-15 11:58:13','2018-10-15 11:58:13'),(13,'Esta Kris V','tre94@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'Axq76uAjd6','2018-10-15 11:58:14','2018-10-15 11:58:14'),(14,'Furman Stoltenberg','kuhn.jonatan@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'QCACujKn0Q','2018-10-15 11:58:14','2018-10-15 11:58:14'),(15,'Dr. Blake Wisozk V','swhite@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'qs66z6RYA7','2018-10-15 11:58:15','2018-10-15 11:58:15'),(16,'Garret Crooks','amparo08@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'KjQuW4uKNt','2018-10-15 11:58:16','2018-10-15 11:58:16'),(17,'Ethelyn Crist I','bartell.giuseppe@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'lkHVlEXkW5','2018-10-15 11:58:16','2018-10-15 11:58:16'),(18,'Twila Rodriguez','stracke.marlee@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'xukyO2Gyzp','2018-10-15 11:58:17','2018-10-15 11:58:17'),(19,'Taurean Heaney','ali57@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'F8mycgOdky','2018-10-15 11:58:17','2018-10-15 11:58:17'),(20,'Salma Wyman','georgianna91@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'e5YMOciynP','2018-10-15 11:58:17','2018-10-15 11:58:17'),(21,'Harmony Welch','ottilie62@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'4pxK3c7O6I','2018-10-15 11:58:18','2018-10-15 11:58:18'),(22,'Keyshawn Zulauf V','gwindler@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'KFkn9WhPWj','2018-10-15 11:58:18','2018-10-15 11:58:18'),(23,'Bailey O\'Reilly','muriel99@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'fJF1LcqMIb','2018-10-15 11:58:19','2018-10-15 11:58:19'),(24,'Prof. Marcelino Bernhard I','schamberger.andreanne@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'DyeMgqQxRb','2018-10-15 11:58:19','2018-10-15 11:58:19'),(25,'Prof. Amari Kub III','alejandrin.borer@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'IT7gprbaDX','2018-10-15 11:58:19','2018-10-15 11:58:19'),(26,'Jayson Lehner DDS','orn.kaycee@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'maooj6IILx','2018-10-15 11:58:20','2018-10-15 11:58:20'),(27,'Briana Ernser','hstreich@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'5lVZWnoofa','2018-10-15 11:58:20','2018-10-15 11:58:20'),(28,'Prof. Cynthia Weissnat III','grady.robel@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'w5KTr7DjMs','2018-10-15 11:58:21','2018-10-15 11:58:21'),(29,'Felton Cremin','wbarton@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'OdFHq9LXSQ','2018-10-15 11:58:21','2018-10-15 11:58:21'),(30,'Paige Terry','yhoeger@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'3u4tS9GOsh','2018-10-15 11:58:22','2018-10-15 11:58:22'),(31,'ali','alkenanya22@gmail.com','$2y$10$o.3lApMxyO8cWfDk5Tj.n.dzjZiiG.1A106zsVafW0V6r4aFQV4EW',NULL,NULL,NULL,'2018-10-15 13:52:43','2018-10-15 13:53:10');
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

-- Dump completed on 2018-10-16 21:33:40
