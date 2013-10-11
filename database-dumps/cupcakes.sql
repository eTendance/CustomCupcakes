CREATE DATABASE  IF NOT EXISTS `cupcake` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cupcake`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: cupcake
-- ------------------------------------------------------
-- Server version	5.1.69

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
-- Table structure for table `cupcake_order`
--

DROP TABLE IF EXISTS `cupcake_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cupcake_order` (
  `orderID` int(11) NOT NULL,
  `cupcakeID` int(11) DEFAULT NULL,
  `quantity` int(4) DEFAULT NULL,
  PRIMARY KEY (`orderID`),
  KEY `cupcakeID1_idx` (`cupcakeID`),
  CONSTRAINT `cupcakeID1` FOREIGN KEY (`cupcakeID`) REFERENCES `cupcakes` (`cupcakeID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cupcake_order`
--

LOCK TABLES `cupcake_order` WRITE;
/*!40000 ALTER TABLE `cupcake_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `cupcake_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cupcake_toppings`
--

DROP TABLE IF EXISTS `cupcake_toppings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cupcake_toppings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cupcakeID` int(11) DEFAULT NULL,
  `toppingID` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cupcakeID_idx` (`cupcakeID`),
  CONSTRAINT `cupcakeID` FOREIGN KEY (`cupcakeID`) REFERENCES `cupcakes` (`cupcakeID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cupcake_toppings`
--

LOCK TABLES `cupcake_toppings` WRITE;
/*!40000 ALTER TABLE `cupcake_toppings` DISABLE KEYS */;
INSERT INTO `cupcake_toppings` VALUES (1,8,3);
/*!40000 ALTER TABLE `cupcake_toppings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cupcakes`
--

DROP TABLE IF EXISTS `cupcakes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cupcakes` (
  `cupcakeID` int(11) NOT NULL AUTO_INCREMENT,
  `fillingID` int(11) DEFAULT NULL,
  `frostingID` int(11) DEFAULT NULL,
  `flavorID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `favorite` enum('true','false') DEFAULT NULL,
  `favorite_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cupcakeID`),
  KEY `userID_idx` (`userID`),
  KEY `flavorID_idx` (`flavorID`),
  KEY `fillingID_idx` (`fillingID`),
  KEY `frostingID_idx` (`frostingID`),
  CONSTRAINT `userID` FOREIGN KEY (`userID`) REFERENCES `customers` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cupcakes`
--

LOCK TABLES `cupcakes` WRITE;
/*!40000 ALTER TABLE `cupcakes` DISABLE KEYS */;
INSERT INTO `cupcakes` VALUES (2,1,2,2,8,'true',''),(3,2,3,3,8,'true','test'),(4,1,5,2,8,'true','test2'),(5,2,3,3,8,'true','test5'),(6,1,5,2,8,'true','test2'),(7,2,3,3,8,'true','test5'),(8,2,3,3,8,'true','test5');
/*!40000 ALTER TABLE `cupcakes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `zip` varchar(7) DEFAULT NULL,
  `mailingList` enum('true','false') DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (7,'','','','','','','','AL','',''),(8,'john','smith','cpellizzi@gmail.com','tester','013894719','test','test','AL','23891','true');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-10-11 18:55:34
