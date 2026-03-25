-- MySQL dump 10.13  Distrib 8.0.45, for macos15 (arm64)
--
-- Host: localhost    Database: cosmetic
-- ------------------------------------------------------
-- Server version	8.0.45

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cosmetic_types`
--

DROP TABLE IF EXISTS `cosmetic_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cosmetic_types` (
  `cosmetic_type_id` int NOT NULL,
  `cosmetic_type_code` varchar(255) NOT NULL,
  `cosmetic_type_name` varchar(255) NOT NULL,
  `cosmetic_shelf_number` varchar(10) NOT NULL,
  `date_time_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_time_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cosmetic_type_id`),
  UNIQUE KEY `cosmetic_type_code` (`cosmetic_type_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cosmetic_types`
--

LOCK TABLES `cosmetic_types` WRITE;
/*!40000 ALTER TABLE `cosmetic_types` DISABLE KEYS */;
INSERT INTO `cosmetic_types` VALUES (1,'FND','Foundation','A1','2026-02-27 07:43:22','2026-02-27 07:43:22'),(2,'LIP','Lipstick','A221','2026-02-27 07:43:41','2026-02-27 07:43:41'),(3,'EYE','Eye-liner','C3','2026-02-23 04:47:06','2026-02-23 04:47:06'),(4,'MSC','Mascara','A11','2026-02-23 05:54:31','2026-02-23 05:54:31'),(5,'BLU','Blush','B2','2026-02-23 05:59:37','2026-02-23 05:59:37'),(10,'MAS','Mascara`','B3','2026-03-14 03:22:53','2026-03-14 03:22:53'),(12,'123','Blush','23','2026-03-14 02:07:47','2026-03-14 02:07:47');
/*!40000 ALTER TABLE `cosmetic_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cosmetic_users`
--

DROP TABLE IF EXISTS `cosmetic_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cosmetic_users` (
  `cosmetic_user_id` int NOT NULL AUTO_INCREMENT,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `pronouns` varchar(60) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `date_time_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_time_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cosmetic_user_id`),
  UNIQUE KEY `email_address` (`email_address`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cosmetic_users`
--

LOCK TABLES `cosmetic_users` WRITE;
/*!40000 ALTER TABLE `cosmetic_users` DISABLE KEYS */;
INSERT INTO `cosmetic_users` VALUES (11,'nintsichkhaidze@cosmetics.com','1da9133ab9dbd11d2937ec8d312e1e2569857059e73cc72df92e670928983ab5','she/her','Nintsi','Chkhaidze','555-0011','2026-02-13 18:37:09','2026-02-13 18:37:09'),(12,'maikogavasheli@cosmetics.com','85d87c4ee5cde48e2c4a0e0f2cfcd68682afd41ea06870aeb7805cee09256e4e','she/her','Maiko','Gavasheli','505-0101','2026-02-13 18:37:09','2026-02-13 18:37:09'),(13,'nininatsvlo@cosmetics.com','82d3f76fc6c7cf7d52801e5eb0898398a924e0dc9669e12a6ac17c4e9302f311','she/her','Nini','Natsvlishvili','555-7777','2026-02-13 18:37:10','2026-02-13 18:37:10');
/*!40000 ALTER TABLE `cosmetic_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cosmetics`
--

DROP TABLE IF EXISTS `cosmetics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cosmetics` (
  `cosmetic_id` int NOT NULL,
  `cosmetic_code` varchar(10) NOT NULL,
  `cosmetic_name` varchar(255) NOT NULL,
  `cosmetic_description` text NOT NULL,
  `cosmetic_shade` varchar(50) NOT NULL,
  `cosmetic_finish` varchar(50) NOT NULL,
  `cosmetic_type_id` int DEFAULT '0',
  `cosmetic_buy_price` decimal(10,2) NOT NULL,
  `cosmetic_sell_price` decimal(10,2) NOT NULL,
  `date_time_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_time_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cosmetic_id`),
  UNIQUE KEY `cosmetic_code` (`cosmetic_code`),
  KEY `cosmetic_type_id` (`cosmetic_type_id`),
  CONSTRAINT `cosmetics_ibfk_1` FOREIGN KEY (`cosmetic_type_id`) REFERENCES `cosmetic_types` (`cosmetic_type_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cosmetics`
--

LOCK TABLES `cosmetics` WRITE;
/*!40000 ALTER TABLE `cosmetics` DISABLE KEYS */;
INSERT INTO `cosmetics` VALUES (1,'NYXEPIC','NYX Epic Ink Liner','A super precise felt tip eyeliner with an intense black pigment.','Black','Glossy',3,15.00,10.00,'2026-02-27 07:17:03','2026-03-14 03:26:31'),(2,'FND001','Maybelline Fit Me Foundation','Lightweight foundation with natural finish','120 Classic Ivory','Matte',4,15.00,7.00,'2026-02-27 07:45:36','2026-03-14 03:10:36'),(3,'FND002','Giorgio Armani Luminous Silk Foundation','Buildable medium coverage with luminous finish','3 Light','Satin',4,75.00,40.00,'2026-02-27 07:45:52','2026-02-27 07:45:52'),(4,'FND003','Charlotte Tilbury Airbrush Flawless Foundation','Full coverage long-wear foundation','2 Cool','Matte',4,65.00,35.00,'2026-02-27 07:46:06','2026-02-27 07:46:06'),(5,'FND004','e.l.f. Halo Glow Liquid Filter','Skin tint with soft-focus glow','1 Fair','Dewy',4,18.00,9.00,'2026-02-27 07:46:17','2026-02-27 07:46:17'),(6,'FND005','NARS Natural Radiant Longwear Foundation','24-hour wear with radiant finish','Syracuse Medium','Shimmer',4,58.00,30.00,'2026-02-27 07:46:28','2026-02-27 07:46:28'),(7,'LIP001','MAC Retro Matte Lipstick','Highly pigmented matte bullet lipstick','Ruby Woo','Matte',5,28.00,14.00,'2026-02-27 07:46:37','2026-02-27 07:46:37'),(8,'LIP002','Charlotte Tilbury Matte Revolution Lipstick','Comfortable long-lasting matte lipstick','Pillow Talk','Matte',5,40.00,20.00,'2026-02-27 07:46:45','2026-02-27 07:46:45'),(10,'LIP004','Rare Beauty Kind Words Lipstick','Satin lipstick with lasting comfort','Fearless','Satin',5,35.00,18.00,'2026-02-27 07:47:05','2026-02-27 07:47:05'),(11,'LIP005','NARS Afterglow Lip Balm','Sheer hydrating lip color with shine','Orgasm','Glossy',5,30.00,16.00,'2026-02-27 07:47:17','2026-02-27 07:47:17'),(12,'EYE006','Maybelline Hyper Precise Liner','Ultra-fine tip for precise lines','Matte Black','Matte',1,11.00,5.00,'2026-02-27 07:48:44','2026-02-27 07:48:44'),(13,'EYE007','Kat Von D Tattoo Liner','Ink-like formula for extreme precision','Trooper Black','Matte',1,26.00,14.00,'2026-02-27 07:48:58','2026-02-27 07:48:58'),(14,'EYE008','Benefit They\'re Real Liner','Beyond precise micro-tip liner','Beyond Black','Glossy',1,30.00,16.00,'2026-02-27 07:49:08','2026-02-27 07:49:08'),(15,'EYE009','Fenty Beauty Flyliner','Longwear waterproof liquid liner','Cuz I\'m Black','Matte',1,34.00,18.00,'2026-02-27 07:49:18','2026-02-27 07:49:18'),(20,'EYE010','Clinique Pretty Easy Liner','Twist-up liner for effortless application','Black Onyx','Satin',1,22.00,12.00,'2026-02-27 07:49:29','2026-02-27 07:49:29'),(21,'MSC006','Lancome Hypnose Mascara','Buildable volume and intense curl','Noir','Glossy',2,42.00,22.00,'2026-02-27 07:49:42','2026-02-27 07:49:42'),(23,'LIP003','NYX Soft Matte Lip Cream','Lightweight mousse-textured lip color','Monte Carlo','Matte',5,10.00,5.00,'2026-02-27 07:46:51','2026-02-27 07:46:51'),(25,'EYE','Eyeliner','Professional Makeup eyeliner','Jet Black','Matte',3,14.99,8.50,'2026-03-14 02:59:29','2026-03-14 02:59:29'),(26,'MAS001','Original Mascara','L\'Oreal Voluminous Original Mascara provides up to 5 times the volume with its unique formula.','Blackest Black','Glossy',10,12.99,6.50,'2026-03-14 03:24:51','2026-03-14 03:24:51');
/*!40000 ALTER TABLE `cosmetics` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-03-13 23:41:21
