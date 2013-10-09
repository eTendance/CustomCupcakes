CREATE DATABASE  IF NOT EXISTS `cupcakes` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `cupcakes`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: cupcakes
-- ------------------------------------------------------
-- Server version	5.6.14

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
  CONSTRAINT `cupcakeID1` FOREIGN KEY (`cupcakeID`) REFERENCES `cupcakes` (`cupcakeID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cupcake_toppings`
--

DROP TABLE IF EXISTS `cupcake_toppings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cupcake_toppings` (
  `toppingID` int(11) NOT NULL,
  `cupcakeID` int(11) DEFAULT NULL,
  `topping` int(5) DEFAULT NULL,
  PRIMARY KEY (`toppingID`),
  KEY `cupcakeID_idx` (`cupcakeID`),
  CONSTRAINT `cupcakeID` FOREIGN KEY (`cupcakeID`) REFERENCES `cupcakes` (`cupcakeID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cupcakes`
--

DROP TABLE IF EXISTS `cupcakes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cupcakes` (
  `cupcakeID` int(11) NOT NULL,
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
  CONSTRAINT `cupcakeID2` FOREIGN KEY (`cupcakeID`) REFERENCES `cupcake_order` (`cupcakeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `cupcakeID3` FOREIGN KEY (`cupcakeID`) REFERENCES `cupcake_toppings` (`cupcakeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fillingID` FOREIGN KEY (`fillingID`) REFERENCES `filling` (`fillingID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `flavorID` FOREIGN KEY (`flavorID`) REFERENCES `flavor` (`flavorID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `frostingID` FOREIGN KEY (`frostingID`) REFERENCES `frosting` (`frostingID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `userID` FOREIGN KEY (`userID`) REFERENCES `customers` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `userID` int(11) NOT NULL DEFAULT '0',
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
  PRIMARY KEY (`userID`),
  CONSTRAINT `userID1` FOREIGN KEY (`userID`) REFERENCES `cupcakes` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `filling`
--

DROP TABLE IF EXISTS `filling`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filling` (
  `fillingID` int(5) NOT NULL,
  `filling` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`fillingID`),
  CONSTRAINT `fillingID1` FOREIGN KEY (`fillingID`) REFERENCES `cupcakes` (`fillingID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `flavor`
--

DROP TABLE IF EXISTS `flavor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flavor` (
  `flavorID` int(5) NOT NULL,
  `flavor` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`flavorID`),
  CONSTRAINT `flavorID1` FOREIGN KEY (`flavorID`) REFERENCES `cupcakes` (`flavorID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `frosting`
--

DROP TABLE IF EXISTS `frosting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `frosting` (
  `frostingID` int(5) NOT NULL,
  `filling` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`frostingID`),
  CONSTRAINT `frostingID1` FOREIGN KEY (`frostingID`) REFERENCES `cupcakes` (`frostingID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-10-09 13:42:14
