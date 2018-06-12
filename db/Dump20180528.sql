-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: zenrin
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `actions`
--

DROP TABLE IF EXISTS `actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `cost` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `is_sync` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actions`
--

LOCK TABLES `actions` WRITE;
/*!40000 ALTER TABLE `actions` DISABLE KEYS */;
INSERT INTO `actions` VALUES (1,'Bò húc','20000','20180516','null','Cà phê Vòng Tròn',2,1,'2018-05-16 11:21:48','2018-05-27 19:21:21',1),(2,'Mì xào trứng','15000','20180516','null','null',1,1,'2018-05-16 11:21:48','2018-05-27 19:21:21',1),(3,'Bánh bao xá xíu','15000','20180517','null','null',1,1,'2018-05-17 01:25:21','2018-05-27 19:21:21',1),(4,'2 lon bò húc','40000','20180517','null','Nhà thờ Thánh Bường, Bắc Hải',2,1,'2018-05-17 12:25:21','2018-05-27 19:21:21',1),(5,'Bánh bao thịt','12000','20180518','null','Mua tại FamilyMart',1,1,'2018-05-18 01:30:40','2018-05-27 19:21:21',1),(6,'Cà phê sữa','35000','20180518','Highland Mạc Đĩnh Chi','Tạm được',2,1,'2018-05-18 11:00:40','2018-05-27 19:21:21',1),(7,'Cơm chiên','30000','20180518','null','Ngon',1,1,'2018-05-18 12:30:40','2018-05-27 19:21:21',1),(8,'Bò húc','15000','20180518','null','null',2,1,'2018-05-18 12:30:40','2018-05-27 19:21:21',1),(9,'Thay ruột xe','75000','20180519','Nhà thờ Tin Lành','Giá chấp nhận được',8,1,'2018-05-19 09:06:16','2018-05-27 19:21:21',1),(10,'Xăng','50000','20180519','Cây xăng Thành Thái Q10','null',6,1,'2018-05-19 09:06:16','2018-05-27 19:21:21',1),(11,'Bò húc','20000','20180519','Cà phê Vòng Tròn','Không gian ổn, hơi ồn ào',2,1,'2018-05-19 09:06:16','2018-05-27 19:21:21',1),(12,'Vé số','10000','20180519','Cà phê Vòng Tròn','Ủng hộ người tàn tật',5,1,'2018-05-19 09:06:16','2018-05-27 19:21:21',1),(13,'Thẻ cào','20000','20180519','null','null',5,1,'2018-05-19 09:06:16','2018-05-27 19:21:21',1),(14,'Bò húc - Đá chanh','45000','20180520','Cà phê Vòng Tròn','Chỗ quen uống lâu năm',2,1,'2018-05-20 09:12:12','2018-05-27 19:21:21',1),(15,'Trà sữa','94000','20180520','Royal Tea Cao Thắng Q.3','Mắc như chó',9,1,'2018-05-20 09:12:12','2018-05-27 19:21:21',1),(16,'Siêu thị','102000','20180521','Satra 3/2 Q.10','null',4,1,'2018-05-21 09:16:05','2018-05-27 19:21:21',1),(17,'Numer one','9000','20180522','FamilyMart Phạm Ngọc Thạch Q.3','null',1,1,'2018-05-22 09:16:42','2018-05-27 19:21:21',1),(18,'Bò húc','20000','20180522','Cà phê Vòng Tròn','null',2,1,'2018-05-22 09:16:42','2018-05-27 19:21:21',1),(19,'Bánh bao','11000','20180523','null','null',1,1,'2018-05-23 09:17:25','2018-05-27 19:21:21',1),(20,'Bánh canh chả cá','22000','20180523','null','Cũng ngon',1,1,'2018-05-23 09:17:25','2018-05-27 19:21:21',1),(21,'Đá chanh','14000','20180523','null','null',2,1,'2018-05-23 09:17:25','2018-05-27 19:21:21',1),(22,'Đá me, chanh muối','30000','20180524','Nhà thờ Đức Bà Q1','null',2,1,'2018-05-24 09:18:29','2018-05-27 19:21:21',1),(23,'Cà phê sữa','32000','20180525','Coffee Factory Trương Định Q3','Mắc, nóng bỏ mẹ',2,1,'2018-05-25 09:19:21','2018-05-27 19:21:21',1),(24,'Cơm chiên trứng','30000','20180525','A Mập, Bắc Hải, Q10','Hôm nay hơi dở',1,1,'2018-05-25 09:19:21','2018-05-27 19:21:21',1),(25,'Bò húc','20000','20180525','Cà phê Vòng Tròn','null',2,1,'2018-05-25 09:19:21','2018-05-27 19:21:21',1),(26,'Bò húc','18000','20180526','Nguyễn Bỉnh Khiêm Q.Gò Vấp','null',2,1,'2018-05-26 09:20:53','2018-05-27 19:21:21',1),(27,'Sting dâu','17000','20180526','Milano Cao Thắng Q.10','null',2,1,'2018-05-26 09:21:17','2018-05-27 19:21:21',1),(28,'Cháo lòng','15000','20180526','Cà phê Vòng Tròn','Tạm được',1,1,'2018-05-27 16:57:09','2018-05-27 19:21:21',1);
/*!40000 ALTER TABLE `actions` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (30,'2018_04_13_063658_create_auth_keys_table',1),(31,'2018_04_13_064006_create_calls_table',1),(32,'2018_04_13_064320_create_phone_destinations_table',1),(33,'2018_04_13_064639_create_cancel_requests_table',1),(34,'2018_04_13_070322_create_source_phone_numbers_table',1),(35,'2018_04_13_070610_create_button_actions_table',1),(36,'2018_04_13_070704_create_system_settings_table',1),(37,'2018_04_26_123059_create_jobs_table',1),(41,'2014_10_12_000000_create_users_table',2),(42,'2014_10_12_100000_create_password_resets_table',2),(43,'2018_05_26_172316_adds_api_token_to_users_table',2),(44,'2018_05_27_232304_create_settings_table',3);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`key`,`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES ('BACKUP_URI','/api/v1/backup'),('SERVER_URL','http://192.168.1.3'),('SYNC_URI','/api/v1/sync');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `types` (
  `value` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `is_sync` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT '1',
  PRIMARY KEY (`value`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `types`
--

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` VALUES (1,'Ăn uống',NULL,'https://cdn0.iconfinder.com/data/icons/kameleon-free-pack-rounded/110/Food-Dome-128.png',0,1,NULL,NULL,9999),(2,'Coffee',NULL,'https://cdn3.iconfinder.com/data/icons/breakfast/coffee-cup.png',0,2,NULL,NULL,9999),(8,'Sửa xe',NULL,'https://cdn2.iconfinder.com/data/icons/circle-icons-1/64/motorcycle-128.png',0,3,NULL,NULL,9999),(6,'Đổ xăng',NULL,'https://cdn0.iconfinder.com/data/icons/citycons/150/Citycons_fuel-128.png',0,4,NULL,NULL,9999),(5,'Vé số - thẻ cào',NULL,'https://cdn2.iconfinder.com/data/icons/circle-icons-1/64/creditcard-128.png',0,5,NULL,NULL,9999),(4,'Mua sắm',NULL,'https://cdn2.iconfinder.com/data/icons/circle-icons-1/64/cart-128.png',0,6,NULL,NULL,9999),(9,'Trà sữa',NULL,'https://cdn3.iconfinder.com/data/icons/pictograms-vol-2-3/400/cup-128.png',0,7,NULL,NULL,9999),(3,'Thư giãn',NULL,'https://cdn0.iconfinder.com/data/icons/streamline-emoji-1/48/250-man-getting-massage-1-128.png',0,8,NULL,NULL,9999),(7,'Khác',NULL,'https://cdn2.iconfinder.com/data/icons/metro-uinvert-dock/128/Other_Antivirus_Software.png',0,9999,NULL,NULL,9999);
/*!40000 ALTER TABLE `types` ENABLE KEYS */;
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
  `loginid` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locked` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `api_token` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_loginid_unique` (`loginid`),
  UNIQUE KEY `users_api_token_unique` (`api_token`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrator','vuongluu','$2y$10$NjBhgA5W4TAN1cPYCThyF.O7uD8F72arCDwPwMErII07QLcfhQA8W',0,NULL,NULL,'2018-05-26 08:30:57','2018-05-26 08:30:57',NULL);
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

-- Dump completed on 2018-05-28  0:24:39
