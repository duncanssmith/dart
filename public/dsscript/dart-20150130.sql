-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: dart
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1

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

use duncanssmith_co;
--
-- Table structure for table `group_text`
--

DROP TABLE IF EXISTS `group_text`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group_text` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(10) unsigned NOT NULL,
  `text_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `order` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `group_text_text_id_foreign` (`text_id`),
  KEY `group_text_group_id_foreign` (`group_id`),
  CONSTRAINT `group_text_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `group_text_text_id_foreign` FOREIGN KEY (`text_id`) REFERENCES `texts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_text`
--

LOCK TABLES `group_text` WRITE;
/*!40000 ALTER TABLE `group_text` DISABLE KEYS */;
INSERT INTO `group_text` VALUES (3,12,18,'2014-11-05 10:32:32','2014-11-05 10:32:32',NULL),(4,11,19,'2014-11-05 10:36:32','2014-12-01 12:21:29',2),(5,7,20,'2014-11-05 10:44:32','2014-11-05 10:44:32',NULL),(6,8,21,'2014-11-05 10:47:19','2014-11-05 10:47:19',NULL),(7,18,22,'2014-11-05 10:50:19','2014-11-05 10:50:19',NULL),(8,10,4,'2014-11-05 11:07:37','2014-11-05 11:07:37',NULL),(9,19,23,'2014-11-10 10:17:10','2014-11-10 10:17:10',NULL),(12,2,2,'2015-01-20 17:04:33','2015-01-20 17:04:33',NULL),(14,3,3,'2015-01-26 17:07:21','2015-01-26 17:07:21',NULL);
/*!40000 ALTER TABLE `group_text` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_work`
--

DROP TABLE IF EXISTS `group_work`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group_work` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `work_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `order` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `group_work_work_id_foreign` (`work_id`),
  KEY `group_work_group_id_foreign` (`group_id`),
  CONSTRAINT `group_work_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `group_work_work_id_foreign` FOREIGN KEY (`work_id`) REFERENCES `works` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_work`
--

LOCK TABLES `group_work` WRITE;
/*!40000 ALTER TABLE `group_work` DISABLE KEYS */;
INSERT INTO `group_work` VALUES (11,14,1,'2015-01-26 12:58:07','2015-01-27 12:53:55',4),(12,9,1,'2015-01-26 12:58:42','2015-01-26 13:05:14',1),(13,10,1,'2015-01-26 12:58:52','2015-01-27 12:53:49',7),(14,11,1,'2015-01-26 12:59:03','2015-01-27 12:53:55',2),(15,12,1,'2015-01-26 12:59:13','2015-01-27 12:53:49',5),(16,13,1,'2015-01-26 12:59:21','2015-01-27 12:53:49',6),(17,8,1,'2015-01-26 13:01:38','2015-01-27 12:53:55',3),(19,15,1,'2015-01-26 13:03:49','2015-01-26 13:04:37',8),(20,13,2,'2015-01-26 13:11:18','2015-01-26 13:11:18',NULL),(21,8,3,'2015-01-26 17:12:41','2015-01-26 17:12:41',NULL),(22,16,7,'2015-01-27 13:03:43','2015-01-27 13:03:43',NULL),(23,17,7,'2015-01-27 13:03:51','2015-01-27 13:03:51',NULL),(24,18,7,'2015-01-27 13:04:00','2015-01-27 13:04:00',NULL),(25,19,7,'2015-01-27 13:04:09','2015-01-27 13:04:09',NULL),(26,20,7,'2015-01-27 13:04:16','2015-01-27 13:04:16',NULL),(27,21,7,'2015-01-27 13:04:22','2015-01-27 13:04:22',NULL);
/*!40000 ALTER TABLE `group_work` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `order` smallint(6) DEFAULT NULL,
  `columns` int(11) DEFAULT NULL,
  `image_size` int(11) DEFAULT NULL,
  `layout` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'Paintings','2014-09-22 09:46:32','2015-01-26 13:04:29',1,2,480,2),(2,'Contact','2014-09-22 09:46:32','2015-01-26 13:09:38',4,1,0,0),(3,'Statement','2014-09-22 09:46:32','2015-01-26 17:12:21',3,0,0,0),(7,'Prints','2015-01-26 13:09:21','2015-01-27 13:07:43',2,2,0,0);
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_09_22_103000_confide_setup_users_table',1),('2014_09_22_175928_create_works_table',1),('2014_09_23_113345_create_groups',1),('2014_10_02_080452_add_pass_conf_to_users_table',2),('2014_10_02_133512_create_laravel_users_table',3),('2014_10_07_195550_create_users_table',4),('2014_10_09_192039_create_password_reminders_table',5),('2014_10_10_103224_create_work_group_link_table',5),('2014_10_11_200828_create_group_work_table',6),('2014_10_24_103708_create_texts_table',7),('2014_10_24_201840_create_group_text_table',8),('2014_11_05_125231_add_fields_to_works_table',9),('2014_11_10_103157_add_ordering_to_works',9),('2014_11_10_103640_add_ordering_to_texts',9),('2014_11_10_103728_add_ordering_to_groups',9),('2014_11_11_155656_add_constraints_to_works',10),('2014_11_12_090305_add_constraints_to_texts',11),('2014_11_25_172604_add_order_field_to_pivot_tables',12),('2015_01_20_092740_add_group_columns_sizes',13);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reminders`
--

DROP TABLE IF EXISTS `password_reminders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_reminders_email_index` (`email`),
  KEY `password_reminders_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reminders`
--

LOCK TABLES `password_reminders` WRITE;
/*!40000 ALTER TABLE `password_reminders` DISABLE KEYS */;
INSERT INTO `password_reminders` VALUES ('duncan.smith@vuma.com','9e7642a4e46b82ca9a8c97b64146a3583c7e3871','2014-10-10 09:45:27'),('duncanssmith@gmail.com','bf6abcebd1d5e6508e7453a901e9d37cd0eb6ae6','2014-11-13 15:31:25');
/*!40000 ALTER TABLE `password_reminders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `texts`
--

DROP TABLE IF EXISTS `texts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `texts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publication` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publication_date` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `texts`
--

LOCK TABLES `texts` WRITE;
/*!40000 ALTER TABLE `texts` DISABLE KEYS */;
INSERT INTO `texts` VALUES (1,'Land meets sea, Duncan Smith paintings','Duncan Smith','2015','','','','<p>Land meets sea: Duncan Smith Paintings</p>','2014-10-24 10:36:27','2015-01-15 09:59:35'),(2,'Contact details','','','','','','<p><strong>E: duncanssmith@gmail.com</strong></p><p><strong>M: +44 (0) 7764 615 516</strong></p>','2015-01-20 17:04:23','2015-01-23 12:42:41'),(3,'Statement','Duncan Smith','2015','Artist\'s statement','','','<p>There are many kinds of art; I have chosen (or its chosen me) a path of reductive, pared down, minimal, selective development. Less is more. Leave out what is not necessary. Etc.&nbsp;</p><p>The eternal question for artists is what is this about, or what is the meaning of this? Art for me is primarily a way of organising thoughts and producing or fixing a thought. It is also primarily a way to capture a moment in time. For me painting is a 4 dimensional medium. Time being the 4th and prime dimension. I want my work to take time to read and see as it has taken time to make or arrive at.</p><p>I love freshness and freedom. So there is a paradox, a contradiction.</p><p>And the task is to capture spontaneity yet retain a sense of certainty and of something having been arrived at.</p><p>So, in my case a set of related shapes (related by scale, geometry, colour and position and form) work together to form a kind of sentence creating a visual statement of meaning.</p><p>My work presents several or a group of shapes in relation to each other, painted carefully on paper or canvas. The shapes are coloured, filled in. Sometimes the backgrounds are left and other times filled with another colour. they speak to each other and they speak to the viewer.</p><p>What is left? Proximity, relations, colour harmony or disharmony, negative shapes and spaces. These suggest, or remind the viewer of other things. A tooth? A yacht&rsquo;s sail? a chair, a head, a torso, skin, light, architecture, a body part. One of my teachers, Richard Roth pointed out to me, among other significant things in my work, the fact that objects contain energy. By combining forms together and carefully deciding how to place them in relation, it is possible to access and release contained visual energy.</p>','2015-01-26 17:07:09','2015-01-30 09:20:20');
/*!40000 ALTER TABLE `texts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'duncan','duncanssmith@gmail.com','$2y$10$8tb2NK4fRBJZxITRgqEJN.dMQS5ZxZ2X0u6JN9/HklXxqERo56U5O','oFtKytgQPJfVd3FUBiO2ZRWEK5A147JeytXD9evseuilomb89ls3Wj9xZFZ8','2014-10-09 07:09:27','2015-01-26 17:32:30'),(9,'sharon','sharon.paint54@btopenworld.com','$2y$10$chjlRwn61qX4ZOqOUuwoG.xt.9q/nj.cdzMk5Y9RM2RsvPGgJpeda','D7Eqkelm6quugvtAT6vCmtLuONNpCKivZUETfF7TeiXEspBNQtAKA13t6BNt','2014-12-03 13:27:16','2015-01-30 09:27:56');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `works`
--

DROP TABLE IF EXISTS `works`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `works` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reference` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `media` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dimensions` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `work_date` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works`
--

LOCK TABLES `works` WRITE;
/*!40000 ALTER TABLE `works` DISABLE KEYS */;
INSERT INTO `works` VALUES (1,'Land meets sea','0001','Acrylic on paper','90 x 44 inches','2014','2015-01-15 09:21:31','2015-01-15 16:56:24','Painting',''),(8,'2011','0008','Acrylic on paper','30 x 22 inches','2011','2015-01-26 12:54:03','2015-01-26 12:54:03','',''),(9,'Punctuate','0009','Acrylic on paper','30 x 22 inches','2014','2015-01-26 12:54:33','2015-01-26 12:54:33','',''),(10,'Faraya','0010','Acrylic on paper','30 x 22 inches','2014','2015-01-26 12:55:07','2015-01-26 12:55:07','',''),(11,'Diabolo','0011','Acrylic on paper','30 x 22 inches','2014','2015-01-26 12:56:23','2015-01-26 12:56:23','',''),(12,'Yadz','0012','Acrylic on paper','30 x 22 inches','2014','2015-01-26 12:56:47','2015-01-26 12:56:47','',''),(13,'Tooth and whale','0013','Acrylic on paper','30 x 22 inches','2014','2015-01-26 12:57:20','2015-01-26 12:57:20','',''),(14,'Germanium','0014','Acrylic on paper','30 x 22 inches','2014','2015-01-26 12:57:56','2015-01-26 12:57:56','',''),(15,'Land meets sea','0015','Acrylic on paper','90 x 44 inches','2014','2015-01-26 13:03:18','2015-01-26 13:03:18','Painting on six sheets of paper, each measuring 30 x 22 inches',''),(16,'Copper','0016','Giclee print','16 x 16 inches','2014','2015-01-27 13:00:35','2015-01-27 13:00:36','',''),(17,'Milk','0017','Giclee print','16 x 16 inches','2014','2015-01-27 13:01:07','2015-01-27 13:01:07','',''),(18,'Summer hoops','0018','Giclee print','16 x 16 inches','2014','2015-01-27 13:01:44','2015-01-27 13:01:44','',''),(19,'Shale','0019','Giclee print','16 x 16 inches','2014','2015-01-27 13:02:07','2015-01-27 13:02:07','',''),(20,'Tangle','0020','Giclee print','16 x 16 inches','2014','2015-01-27 13:02:55','2015-01-27 13:02:55','',''),(21,'Fly thru','0021','Giclee print','16 x 16 inches','2014','2015-01-27 13:03:18','2015-01-27 13:03:18','','');
/*!40000 ALTER TABLE `works` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-01-30 13:05:19
