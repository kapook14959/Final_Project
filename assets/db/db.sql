-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: assetsmangement
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `assets`
--

DROP TABLE IF EXISTS `assets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assets` (
  `id` int NOT NULL,
  `asset_name` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `year_of_budget` varchar(255) NOT NULL,
  `image` longblob NOT NULL,
  `qr-code` longblob NOT NULL,
  `value_asset` int NOT NULL,
  `seller_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `number_delivery` varchar(255) NOT NULL,
  `serial_number` varchar(255) NOT NULL,
  `date_admit` date NOT NULL,
  `expiration_date` date NOT NULL,
  `asset_type_id` int NOT NULL,
  `unit_id` int NOT NULL,
  `department_id` int NOT NULL,
  `money_source_id` int NOT NULL,
  `detail_borrow_and_return_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_detail_borrow_and_return_id_idx` (`detail_borrow_and_return_id`),
  KEY `fk_department_id_idx` (`department_id`),
  KEY `fk_unit_id_idx` (`unit_id`),
  KEY `fk_asset_type_id_idx` (`asset_type_id`),
  KEY `fk_money_source_idx` (`money_source_id`),
  CONSTRAINT `fk_asset_type_id` FOREIGN KEY (`asset_type_id`) REFERENCES `assets_types` (`id`),
  CONSTRAINT `fk_departments_id` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`),
  CONSTRAINT `fk_detail_borrow_and_return_id` FOREIGN KEY (`detail_borrow_and_return_id`) REFERENCES `detail_borrow_and_return` (`id`),
  CONSTRAINT `fk_money_source` FOREIGN KEY (`money_source_id`) REFERENCES `money_source` (`id`),
  CONSTRAINT `fk_unit_id` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assets`
--

LOCK TABLES `assets` WRITE;
/*!40000 ALTER TABLE `assets` DISABLE KEYS */;
/*!40000 ALTER TABLE `assets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assets_types`
--

DROP TABLE IF EXISTS `assets_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assets_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `typesassets_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assets_types`
--

LOCK TABLES `assets_types` WRITE;
/*!40000 ALTER TABLE `assets_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `assets_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `borrow_and_return`
--

DROP TABLE IF EXISTS `borrow_and_return`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `borrow_and_return` (
  `id` int NOT NULL AUTO_INCREMENT,
  `borrow_date` date NOT NULL,
  `return_date` date NOT NULL,
  `staff_id` int NOT NULL,
  `personel_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_staff_id_idx` (`staff_id`),
  KEY `fk_personel_id_idx` (`personel_id`),
  CONSTRAINT `fk_personel_id` FOREIGN KEY (`personel_id`) REFERENCES `personnels` (`id`),
  CONSTRAINT `fk_staffs_id` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `borrow_and_return`
--

LOCK TABLES `borrow_and_return` WRITE;
/*!40000 ALTER TABLE `borrow_and_return` DISABLE KEYS */;
/*!40000 ALTER TABLE `borrow_and_return` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `department` (
  `id` int NOT NULL AUTO_INCREMENT,
  `department_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_borrow_and_return`
--

DROP TABLE IF EXISTS `detail_borrow_and_return`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detail_borrow_and_return` (
  `id` int NOT NULL AUTO_INCREMENT,
  `detail` varchar(255) NOT NULL,
  `borrow_and_return_id` int NOT NULL,
  `place_id` int NOT NULL,
  `asset_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_borrow_and_return_id_idx` (`borrow_and_return_id`),
  KEY `fk_place_id_idx` (`place_id`),
  KEY `fk_asset_id_idx` (`asset_id`),
  KEY `fk_assets_id_idx` (`asset_id`),
  CONSTRAINT `fk_assets_id` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`),
  CONSTRAINT `fk_borrow_and_return_id` FOREIGN KEY (`borrow_and_return_id`) REFERENCES `borrow_and_return` (`id`),
  CONSTRAINT `fk_place_id` FOREIGN KEY (`place_id`) REFERENCES `place` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_borrow_and_return`
--

LOCK TABLES `detail_borrow_and_return` WRITE;
/*!40000 ALTER TABLE `detail_borrow_and_return` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_borrow_and_return` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_sells`
--

DROP TABLE IF EXISTS `detail_sells`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detail_sells` (
  `id` int NOT NULL AUTO_INCREMENT,
  `detail` varchar(255) NOT NULL,
  `quantity` int NOT NULL,
  `sell_id` int NOT NULL,
  `asset_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sell_id_idx` (`sell_id`),
  KEY `fk_assetss_id_idx` (`asset_id`),
  CONSTRAINT `fk_assetss_id` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`),
  CONSTRAINT `fk_sell_id` FOREIGN KEY (`sell_id`) REFERENCES `sells` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_sells`
--

LOCK TABLES `detail_sells` WRITE;
/*!40000 ALTER TABLE `detail_sells` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_sells` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `money_source`
--

DROP TABLE IF EXISTS `money_source`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `money_source` (
  `id` int NOT NULL,
  `money_source_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `money_source`
--

LOCK TABLES `money_source` WRITE;
/*!40000 ALTER TABLE `money_source` DISABLE KEYS */;
/*!40000 ALTER TABLE `money_source` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personnels`
--

DROP TABLE IF EXISTS `personnels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personnels` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pesonel_firstname` varchar(255) NOT NULL,
  `pesonel_lasttname` varchar(255) NOT NULL,
  `telephone_number` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `department_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_department_idx` (`department_id`),
  CONSTRAINT `fk_department` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personnels`
--

LOCK TABLES `personnels` WRITE;
/*!40000 ALTER TABLE `personnels` DISABLE KEYS */;
/*!40000 ALTER TABLE `personnels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `place`
--

DROP TABLE IF EXISTS `place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `place` (
  `id` int NOT NULL AUTO_INCREMENT,
  `placename` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `place`
--

LOCK TABLES `place` WRITE;
/*!40000 ALTER TABLE `place` DISABLE KEYS */;
/*!40000 ALTER TABLE `place` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `repair_notice`
--

DROP TABLE IF EXISTS `repair_notice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `repair_notice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `repairer` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `image` longblob NOT NULL,
  `date_notice` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `personel_id` int NOT NULL,
  `asset_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_personels_id_idx` (`personel_id`),
  KEY `fk_asset_id_idx` (`asset_id`),
  CONSTRAINT `fk_asset_id` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`),
  CONSTRAINT `fk_personels_id` FOREIGN KEY (`personel_id`) REFERENCES `personnels` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repair_notice`
--

LOCK TABLES `repair_notice` WRITE;
/*!40000 ALTER TABLE `repair_notice` DISABLE KEYS */;
/*!40000 ALTER TABLE `repair_notice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sells`
--

DROP TABLE IF EXISTS `sells`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sells` (
  `id` int NOT NULL AUTO_INCREMENT,
  `selling_date` date NOT NULL,
  `number_of_allow_selling` varchar(255) NOT NULL,
  `staff_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_staff_idx` (`staff_id`),
  CONSTRAINT `fk_staff_id` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sells`
--

LOCK TABLES `sells` WRITE;
/*!40000 ALTER TABLE `sells` DISABLE KEYS */;
/*!40000 ALTER TABLE `sells` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staffs`
--

DROP TABLE IF EXISTS `staffs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staffs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `staff_firstname` varchar(255) NOT NULL,
  `staff_lastname` varchar(255) NOT NULL,
  `permission` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `department_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_department_id_idx` (`department_id`),
  CONSTRAINT `fk_department_id` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staffs`
--

LOCK TABLES `staffs` WRITE;
/*!40000 ALTER TABLE `staffs` DISABLE KEYS */;
/*!40000 ALTER TABLE `staffs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unit`
--

DROP TABLE IF EXISTS `unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `unit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unit`
--

LOCK TABLES `unit` WRITE;
/*!40000 ALTER TABLE `unit` DISABLE KEYS */;
/*!40000 ALTER TABLE `unit` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-15 17:46:50
