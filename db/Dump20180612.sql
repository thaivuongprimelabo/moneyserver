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
  `location_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actions`
--

LOCK TABLES `actions` WRITE;
/*!40000 ALTER TABLE `actions` DISABLE KEYS */;
INSERT INTO `actions` VALUES (1,'Bò húc','20000','20180516',NULL,'Cà phê Vòng Tròn',2,1,'2018-05-16 11:21:48','2018-05-16 11:21:48',1,1),(2,'Mì xào trứng','15000','20180516','','',1,1,'2018-05-16 11:21:48','2018-05-28 16:44:55',1,NULL),(3,'Bánh bao xá xíu','15000','20180517',NULL,NULL,1,1,'2018-05-17 01:25:21','2018-05-17 01:25:21',1,12),(4,'2 lon bò húc','40000','20180517',NULL,'Nhà thờ Thánh Bường, Bắc Hải',2,1,'2018-05-17 12:25:21','2018-05-17 12:25:21',1,2),(5,'Bánh bao thịt','12000','20180518',NULL,'Mua tại FamilyMart',1,1,'2018-05-18 01:30:40','2018-05-18 01:30:40',1,12),(6,'Cà phê sữa','35000','20180518',NULL,'Tạm được',2,1,'2018-05-18 11:01:40','2018-05-18 11:01:40',1,19),(7,'Cơm chiên','30000','20180518',NULL,'Ngon',1,1,'2018-05-18 12:30:40','2018-05-18 12:30:40',1,15),(8,'Bò húc','15000','20180518',NULL,NULL,2,1,'2018-05-18 12:30:40','2018-05-18 12:30:40',1,1),(9,'Thay ruột xe','75000','20180519',NULL,'Giá chấp nhận được',8,1,'2018-05-19 09:06:16','2018-05-19 09:06:16',1,17),(10,'Xăng','50000','20180519',NULL,NULL,6,1,'2018-05-19 09:06:16','2018-05-19 09:06:16',1,18),(11,'Bò húc','20000','20180519',NULL,'Không gian ổn, hơi ồn ào',2,1,'2018-05-19 09:06:16','2018-05-19 09:06:16',1,1),(12,'Vé số','10000','20180519',NULL,'Ủng hộ người tàn tật',5,1,'2018-05-19 09:06:16','2018-05-19 09:06:16',1,1),(13,'Thẻ cào','20000','20180519','','',5,1,'2018-05-19 09:06:16','2018-05-28 16:44:55',1,NULL),(14,'Bò húc - Đá chanh','45000','20180520',NULL,'Chỗ quen uống lâu năm',2,1,'2018-05-20 09:12:12','2018-05-20 09:12:12',1,1),(15,'Trà sữa','94000','20180520',NULL,'Mắc như chó',9,1,'2018-05-20 09:12:12','2018-05-20 09:12:12',1,4),(16,'Siêu thị','102000','20180521',NULL,NULL,4,1,'2018-05-21 09:16:05','2018-05-21 09:16:05',1,3),(17,'Numer one','9000','20180522',NULL,NULL,1,1,'2018-05-22 09:16:42','2018-05-22 09:16:42',1,12),(18,'Bò húc','20000','20180522',NULL,NULL,2,1,'2018-05-22 09:16:42','2018-05-22 09:16:42',1,1),(19,'Bánh bao','11000','20180523',NULL,NULL,1,1,'2018-05-23 01:10:25','2018-05-23 01:10:25',1,12),(20,'Bánh canh chả cá','22000','20180523',NULL,'Cũng ngon',1,1,'2018-05-23 09:17:25','2018-05-23 09:17:25',1,20),(21,'Đá chanh','14000','20180523',NULL,NULL,2,1,'2018-05-23 09:17:25','2018-05-23 09:17:25',1,20),(22,'Đá me, chanh muối','30000','20180524',NULL,NULL,2,1,'2018-05-24 09:18:29','2018-05-24 09:18:29',1,16),(23,'Cà phê sữa','32000','20180525',NULL,'Mắc, nóng bỏ mẹ',2,1,'2018-05-25 09:19:21','2018-05-25 09:19:21',1,13),(24,'Cơm chiên trứng','30000','20180525',NULL,'Hôm nay hơi dở',1,1,'2018-05-25 09:19:21','2018-05-25 09:19:21',1,15),(25,'Bò húc','20000','20180525',NULL,NULL,2,1,'2018-05-25 09:19:21','2018-05-25 09:19:21',1,1),(26,'Bò húc','18000','20180526',NULL,NULL,2,1,'2018-05-26 09:20:53','2018-05-26 09:20:53',1,14),(27,'Sting dâu','17000','20180526',NULL,NULL,2,1,'2018-05-26 09:21:17','2018-05-26 09:21:17',1,7),(28,'Cháo lòng','15000','20180526',NULL,'Tạm được',1,1,'2018-05-26 16:57:09','2018-05-26 16:57:09',1,1),(29,'Bò húc','20000','20180526',NULL,NULL,2,1,'2018-05-26 16:42:03','2018-05-26 16:42:03',1,1),(30,'Bò húc','25000','20180527',NULL,'Mắc nhưng view đẹp',2,1,'2018-05-27 08:30:07','2018-05-27 08:30:07',1,10),(31,'Đổ xăng','50000','20180527',NULL,NULL,6,1,'2018-05-27 08:01:01','2018-05-27 08:01:01',1,6),(33,'Thẻ cào','49000','20180528',NULL,NULL,5,1,'2018-05-28 15:45:22','2018-05-28 15:45:22',1,NULL),(34,'Cà phê sữa','130000','20180530',NULL,'Mắc vl',2,1,'2018-05-30 01:32:51','2018-05-30 01:32:51',1,11),(35,'Bò húc','12000','20180530',NULL,NULL,3,1,'2018-05-30 09:25:47','2018-05-30 09:25:47',1,12),(36,'Bò húc - đá chanh','45000','20180531',NULL,NULL,2,1,'2018-05-31 15:33:17','2018-05-31 15:33:17',1,1),(37,'Bò húc - đá chanh','45000','20180430','Cà phê Vòng Tròn',NULL,2,1,'2018-04-30 15:33:17','2018-04-30 15:33:17',1,NULL),(38,'Bò húc - đá chanh','45000','20180429','Cà phê Vòng Tròn',NULL,2,1,'2018-04-29 15:33:17','2018-04-29 15:33:17',1,NULL),(39,'Chi tiêu nửa tháng đầu','1400000','20180504',NULL,'Chi tiêu nửa tháng đầu, ko nhớ chi tiết',7,1,'2018-05-03 17:01:01','2018-05-03 17:01:01',1,NULL),(40,'Thư giãn thứ 6','480000','20180601',NULL,NULL,3,1,'2018-06-01 12:45:01','2018-06-01 12:45:01',1,5),(41,'Mì xào bò','20000','20180602',NULL,NULL,1,1,'2018-06-02 02:45:01','2018-06-02 02:45:01',1,NULL),(42,'Bò húc','40000','20180603',NULL,NULL,2,1,'2018-06-03 02:30:01','2018-06-03 02:30:01',1,2),(43,'Bò húc','22000','20180603',NULL,NULL,2,1,'2018-06-03 08:30:01','2018-06-03 08:30:01',1,33),(44,'Bạc sỉu đá','17000','20180602',NULL,NULL,2,1,'2018-06-02 03:07:45','2018-06-02 03:07:45',1,20),(45,'Bánh bao','18000','20180604',NULL,NULL,1,1,'2018-06-04 04:32:18','2018-06-04 04:32:18',1,34);
/*!40000 ALTER TABLE `actions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `latlong` varchar(255) DEFAULT NULL,
  `is_sync` int(11) DEFAULT NULL,
  `desc_image` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES (1,'Cafe Vòng Tròn','10.781337800901731, 106.66229143738747',1,'','G4 bis Trường Sơn, Cư xá Bắc Hải, Phường 15, Quận 10, Hồ Chí Minh, Việt Nam','2018-06-02 09:08:28','2018-06-04 17:39:50',1),(2,'Caphe La Trầm','10.782805416171115, 106.66249260306358',1,'','K4 Bửu Long, Cư xá Bắc Hải, Phường 15, Quận 10, Hồ Chí Minh, Việt Nam','2018-06-02 09:11:47','2018-06-04 17:39:50',1),(3,'Siêu thị Sài Gòn','10.768555807732435, 106.66769206523895',1,'','398 Đường 3/2, Phường 10, Quận 10, Hồ Chí Minh, Việt Nam','2018-06-02 09:14:34','2018-06-04 17:39:50',1),(4,'ROYAL TEA CAO THẮNG','10.770264584270205, 106.68210357427597',1,'','64 Cao Thắng, phường 4, Quận 3, Hồ Chí Minh, Việt Nam','2018-06-02 16:33:47','2018-06-04 17:39:50',1),(5,'Massage Minh Tâm 2','10.787432177943806, 106.65354609489441',1,'','508 Lý Thường Kiệt, phường 7, Tân Bình, Hồ Chí Minh, Việt Nam','2018-06-02 16:35:36','2018-06-04 17:39:50',1),(6,'Cửa Hàng Xăng Dầu Số 35','10.7825287567487, 106.68382287025452',1,'','70 Trương Định, phường 7, Quận 3, Hồ Chí Minh, Việt Nam','2018-06-02 17:17:50','2018-06-04 17:39:50',1),(7,'Milano Coffee','10.775037776849627, 106.67427957057953',1,'','334 Cao Thắng, Phường 12, Quận 10, Hồ Chí Minh, Việt Nam','2018-06-02 17:23:08','2018-06-04 17:39:50',1),(8,'Quán Cà Phê Hem coffee','10.768197450898992, 106.65936648845673',1,'','Hẻm 284/7 Lý Thường Kiệt, phường 14, Quận 10, Hồ Chí Minh, Việt Nam','2018-06-02 17:24:28','2018-06-04 17:39:50',1),(9,'Big C Miền Đông','10.778484230435794, 106.66543364524841',1,'','138A Tô Hiến Thành, Cư xá Bắc Hải, Phường 15, Quận 10, Hồ Chí Minh, Việt Nam','2018-06-02 17:25:37','2018-06-04 17:39:50',1),(10,'Cafe Cây Si','10.820028277499157, 106.69088244438171',1,'','295 Phạm Văn Đồng, phường 1, Gò Vấp, Hồ Chí Minh, Việt Nam','2018-06-02 17:54:19','2018-06-04 17:39:50',1),(11,'The Coffee House Signature','10.78369204203445, 106.69451147317886',1,'','19 Phạm Ngọc Thạch, phường 6, Quận 3, Hồ Chí Minh, Việt Nam','2018-06-02 17:56:11','2018-06-04 17:39:50',1),(12,'Cửa Hàng Family Mart Phạm Ngọc Thạch','10.786040995098723, 106.69216856360435',1,'','57-59 Phạm Ngọc Thạch, phường 6, Quận 3, Hồ Chí Minh, Việt Nam','2018-06-02 17:57:06','2018-06-04 17:39:50',1),(13,'The Coffee Factory','10.77824709039819, 106.68906658887863',1,'','2A Trương Định, phường 6, Quận 3, Hồ Chí Minh, Việt Nam','2018-06-02 18:02:43','2018-06-04 17:39:50',1),(14,'Cà Phê Phúc Ân','10.817414818428288, 106.68607592582703',1,'','441/47 Đường số 7, phường 1, Gò Vấp, Hồ Chí Minh, Việt Nam','2018-06-02 18:05:37','2018-06-04 17:39:50',1),(15,'Quán A Mập','10.784328355865068, 106.6621533036232',1,'','206-212 Bắc Hải, Cư xá Bắc Hải, Phường 15, Quận 10, Hồ Chí Minh, Việt Nam','2018-06-02 18:09:35','2018-06-04 17:39:50',1),(16,'Nhà Thờ Đức Bà Sài Gòn (Notre dame Cathedral Saigon)','10.779741069515575, 106.6991114616394',1,'','2 Công xã Paris, Bến Nghé, Quận 1, Hồ Chí Minh, Việt Nam','2018-06-02 18:10:54','2018-06-04 17:39:50',1),(17,'Nhà thờ Tin lành Nguyễn Tri Phương','10.765883931083374, 106.66414082050323',1,'','3 Ngô Quyền, phường 8, Quận 10, Hồ Chí Minh, Việt Nam','2018-06-02 18:11:33','2018-06-04 17:39:50',1),(18,'Trạm xăng dầu Nguyễn Tri Phương','10.772279004608022, 106.6650527715683',1,'','47 Thành Thái, phường 14, Quận 10, Hồ Chí Minh, Việt Nam','2018-06-02 18:15:28','2018-06-04 17:39:50',1),(19,'Highlands Coffee','10.785334861950027, 106.6986072063446',1,'','1 Trần Cao Vân, Đa Kao, Quận 1, Hồ Chí Minh, Việt Nam','2018-06-02 18:16:20','2018-06-04 17:39:50',1),(20,'Gia Hân Coffee','10.767204062448288, 106.66097916662693',1,'','Hẻm 666/46/9 đường Ba Tháng Hai, phường 14, Quận 10, Hồ Chí Minh, Việt Nam','2018-06-03 12:46:39','2018-06-04 17:39:50',1),(28,'Phòng thu âm TMuzik','10.766184320764541, 106.66254758834839',1,'','24/8 Hẻm 606 Ba Tháng Hai, phường 14, Quận 10, Hồ Chí Minh, Việt Nam','2018-06-03 15:02:36','2018-06-04 17:39:50',1),(29,'ATM Agribank - Quận 10','10.76478249969053, 106.66281580924988',1,'','594 Bà Hạt, phường 6, Quận 10, Hồ Chí Minh, Việt Nam','2018-06-03 15:05:00','2018-06-04 17:39:50',1),(30,'Vietnam Australia International School','10.765715291131126, 106.6633415222168',1,'','594 Ba Tháng Hai, phường 14, Quận 10, Hồ Chí Minh, Việt Nam','2018-06-03 15:05:45','2018-06-04 17:39:50',1),(31,'Cửa hàng linh kiện điện thoại Thảo Duy','10.765515031065247, 106.66304111480713',1,'','560 Đường 3/2, phường 14, Quận 10, Hồ Chí Minh, Việt Nam','2018-06-03 15:09:21','2018-06-04 17:39:50',1),(32,'Chợ Nguyễn Tri Phương','10.764434678414318, 106.66366338729858',1,'','68 Nguyễn Lâm, phường 6, Quận 10, Hồ Chí Minh, Việt Nam','2018-06-03 15:10:24','2018-06-04 17:39:50',1),(33,'Cafe Sài Gòn Xưa','10.762916908147831, 106.66653871536255',1,'','136-140 Nguyễn Tiểu La, phường 5, Quận 10, Hồ Chí Minh, Việt Nam','2018-06-03 15:19:40','2018-06-04 17:39:50',1),(34,'Co.opmart Lý Thường Kiệt','10.759844453971498, 106.66154444217682',1,'','479 Hoà Hảo, phường 7, Quận 11, Hồ Chí Minh, Việt Nam','2018-06-03 15:31:11','2018-06-04 17:39:50',1),(35,'Lẩu Cá Cô Thư','10.766885228855989, 106.66028916835785',1,'','414 Lý Thường Kiệt, phường 14, Quận 10, Hồ Chí Minh, Việt Nam','2018-06-03 15:32:51','2018-06-04 17:39:50',1),(36,'Phát Đạt Computer','10.76367579423648, 106.66026771068573',1,'','140/1 Lý Thường Kiệt, phường 7, Quận 10, Hồ Chí Minh, Việt Nam','2018-06-03 15:33:28','2018-06-04 17:39:50',1),(37,'Cà Ri Dê Ớt Già','10.764339817996591, 106.665900349617',1,'','244 Nhật Tảo, phường 8, Quận 10, Hồ Chí Minh, Việt Nam','2018-06-03 15:35:36','2018-06-04 17:39:50',1);
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
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
INSERT INTO `settings` VALUES ('AUTH_URI','/api/v1/auth'),('BACKUP_URI','/api/v1/backup'),('BUDGET','2500000'),('SERVER_URL','http://192.168.1.8'),('SYNC_URI','/api/v1/sync');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `twilio`
--

DROP TABLE IF EXISTS `twilio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `twilio` (
  `twilio_account_sid` varchar(100) NOT NULL,
  `twilio_account_token` varchar(100) DEFAULT NULL,
  `twilio_phone_number` varchar(45) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `status_url` varchar(100) DEFAULT NULL,
  `callback_event` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`twilio_account_sid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `twilio`
--

LOCK TABLES `twilio` WRITE;
/*!40000 ALTER TABLE `twilio` DISABLE KEYS */;
INSERT INTO `twilio` VALUES ('AC2e8ff4d65b6c7300c7a5286756265580','88e4060ccf491e8712188071b07da604','+15072953669',NULL,NULL,NULL);
/*!40000 ALTER TABLE `twilio` ENABLE KEYS */;
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
INSERT INTO `types` VALUES (1,'Ăn uống',NULL,'https://cdn0.iconfinder.com/data/icons/kameleon-free-pack-rounded/110/Food-Dome-128.png',1,1,'2018-06-04 17:39:50',NULL,1),(2,'Coffee',NULL,'https://cdn3.iconfinder.com/data/icons/breakfast/coffee-cup.png',1,2,'2018-06-04 17:39:50',NULL,1),(8,'Sửa xe',NULL,'https://cdn2.iconfinder.com/data/icons/circle-icons-1/64/motorcycle-128.png',1,3,'2018-06-04 17:39:50',NULL,1),(6,'Đổ xăng',NULL,'https://cdn0.iconfinder.com/data/icons/citycons/150/Citycons_fuel-128.png',1,4,'2018-06-04 17:39:50',NULL,1),(5,'Vé số - thẻ cào',NULL,'https://cdn2.iconfinder.com/data/icons/circle-icons-1/64/creditcard-128.png',1,5,'2018-06-04 17:39:50',NULL,1),(4,'Mua sắm',NULL,'https://cdn2.iconfinder.com/data/icons/circle-icons-1/64/cart-128.png',1,6,'2018-06-04 17:39:50',NULL,1),(9,'Trà sữa',NULL,'https://cdn3.iconfinder.com/data/icons/pictograms-vol-2-3/400/cup-128.png',1,7,'2018-06-04 17:39:50',NULL,1),(3,'Thư giãn',NULL,'https://cdn0.iconfinder.com/data/icons/streamline-emoji-1/48/250-man-getting-massage-1-128.png',1,8,'2018-06-04 17:39:50',NULL,1),(7,'Khác',NULL,'https://cdn2.iconfinder.com/data/icons/metro-uinvert-dock/128/Other_Antivirus_Software.png',1,9999,'2018-06-04 17:39:50',NULL,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
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

-- Dump completed on 2018-06-12 22:52:14
