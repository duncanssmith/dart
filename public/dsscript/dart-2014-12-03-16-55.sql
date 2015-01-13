CREATE DATABASE  IF NOT EXISTS `dart` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dart`;
-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: dart
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu0.14.04.1

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_text`
--

LOCK TABLES `group_text` WRITE;
/*!40000 ALTER TABLE `group_text` DISABLE KEYS */;
INSERT INTO `group_text` VALUES (1,15,1,'2014-11-05 10:20:16','2014-11-05 10:20:16',NULL),(2,13,2,'2014-11-05 10:27:54','2014-11-05 10:27:54',NULL),(3,12,18,'2014-11-05 10:32:32','2014-11-05 10:32:32',NULL),(4,11,19,'2014-11-05 10:36:32','2014-12-01 12:21:29',2),(5,7,20,'2014-11-05 10:44:32','2014-11-05 10:44:32',NULL),(6,8,21,'2014-11-05 10:47:19','2014-11-05 10:47:19',NULL),(7,18,22,'2014-11-05 10:50:19','2014-11-05 10:50:19',NULL),(8,10,4,'2014-11-05 11:07:37','2014-11-05 11:07:37',NULL),(9,19,23,'2014-11-10 10:17:10','2014-11-10 10:17:10',NULL),(10,11,3,'2014-11-18 14:56:07','2014-12-01 12:21:29',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=253 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_work`
--

LOCK TABLES `group_work` WRITE;
/*!40000 ALTER TABLE `group_work` DISABLE KEYS */;
INSERT INTO `group_work` VALUES (1,1,1,'2014-10-13 09:33:45','2014-10-13 09:33:55',NULL);
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'First page','2014-09-22 09:46:32','2014-12-03 12:55:16',19),(2,'Second page','2014-09-22 09:46:32','2014-12-03 12:54:36',16),(3,'Third page','2014-09-22 09:46:32','2014-12-03 12:54:29',15);
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
INSERT INTO `migrations` VALUES ('2014_09_22_103000_confide_setup_users_table',1),('2014_09_22_175928_create_works_table',1),('2014_09_23_113345_create_groups',1),('2014_10_02_080452_add_pass_conf_to_users_table',2),('2014_10_02_133512_create_laravel_users_table',3),('2014_10_07_195550_create_users_table',4),('2014_10_09_192039_create_password_reminders_table',5),('2014_10_10_103224_create_work_group_link_table',5),('2014_10_11_200828_create_group_work_table',6),('2014_10_24_103708_create_texts_table',7),('2014_10_24_201840_create_group_text_table',8),('2014_11_05_125231_add_fields_to_works_table',9),('2014_11_10_103157_add_ordering_to_works',9),('2014_11_10_103640_add_ordering_to_texts',9),('2014_11_10_103728_add_ordering_to_groups',9),('2014_11_11_155656_add_constraints_to_works',10),('2014_11_12_090305_add_constraints_to_texts',11),('2014_11_25_172604_add_order_field_to_pivot_tables',12);
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `texts`
--

LOCK TABLES `texts` WRITE;
/*!40000 ALTER TABLE `texts` DISABLE KEYS */;
INSERT INTO `texts` VALUES (1,'Painting, Duncan Smith','Alistair Payne','2005','','','','<p>This exhibition brings together new paintings by Fabian Peake and Sharon Hall. The artists have both decided on certain methods for the exhibition, which allow them to investigate ongoing concerns over the particular \'display\' of painting. This can be seen as a technique which is critical to the construction of the paintings themselves. As a technique it actualizes different method for interaction, where the autonomy of a single surface; the physical constraints that this brings to painting is shifted, subsequently enhancing the interconnectivity of the multiple panels. These different surfaces can be engaged, by the viewer, singularly but also across the constraints of the \'frame\' or edge. Frame as a device, or shape, would usually construct the particulars of surface and, at the same time distinguishes the plane from anything \'outside\'. In contrast the more \'theatrical\' installation enhances the connections between the different surfaces. This method highlights difference and subjects each surface, not only to differences evident within its own surface but also differences created in the connections between the different surfaces.  </p> <p> Sharon Hall’s new paintings exemplify a particular approach to the installation of painting and the questioning of the relationship between individual surfaces. The individual surfaces present multiple contradictions between ground and mark, form and the formless, order and chaos... </p> <p> It is not a self critical definition of painting but rather a mapping between different contradictory elements, emphasizing the dualistic approach, or a shadow play, which through the method of installation becomes more apparent. In essence the actual installation constructs an ‘in between’ where connections are made between and across the different paintings. </p>','2014-10-24 10:36:27','2014-11-10 11:38:34');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'duncan','duncanssmith@gmail.com','$2y$10$8tb2NK4fRBJZxITRgqEJN.dMQS5ZxZ2X0u6JN9/HklXxqERo56U5O','G4bO8E7xtQGZ8rwrpdSSdIT8c6VV9BKlxWhejV1IwjC2RGcQfsET90EEmQE2','2014-10-09 07:09:27','2014-12-03 13:26:00'),(9,'sharon','sharon.paint54@btopenworld.com','$2y$10$chjlRwn61qX4ZOqOUuwoG.xt.9q/nj.cdzMk5Y9RM2RsvPGgJpeda','B0wxSLBZblQF5RpvoZvrcgZdpSE2e8l3uHQf9QpPIXHqYHIf72JVKKRPfbRq','2014-12-03 13:27:16','2014-12-03 15:56:30');
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
) ENGINE=InnoDB AUTO_INCREMENT=279 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works`
--

LOCK TABLES `works` WRITE;
/*!40000 ALTER TABLE `works` DISABLE KEYS */;
INSERT INTO `works` VALUES (1,'UNKNOWN','0001','Oil on canvas','55 x 75 cm','1992','2014-09-22 09:46:32','2014-11-10 11:46:46',NULL,NULL),(2,'UNKNOWN','0002','Oil on canvas','45 x 65 cm','1992','2014-09-22 09:46:32','2014-11-05 16:15:49',NULL,NULL);
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

-- Dump completed on 2014-12-03 16:56:41
