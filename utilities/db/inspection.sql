-- MySQL dump 10.16  Distrib 10.1.34-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: inspection
-- ------------------------------------------------------
-- Server version	10.1.34-MariaDB

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
-- Table structure for table `access_tbl`
--

DROP TABLE IF EXISTS `access_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `access_tbl` (
  `access_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `listing_id` varchar(100) NOT NULL,
  `date_access` datetime NOT NULL,
  PRIMARY KEY (`access_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access_tbl`
--

LOCK TABLES `access_tbl` WRITE;
/*!40000 ALTER TABLE `access_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `access_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inspected_tbl`
--

DROP TABLE IF EXISTS `inspected_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inspected_tbl` (
  `inspected_id` int(10) NOT NULL AUTO_INCREMENT,
  `listing_id` varchar(100) NOT NULL,
  `lisitng_uri` varchar(100) NOT NULL,
  `dealer_name` varchar(100) DEFAULT NULL,
  `unit` varchar(100) DEFAULT NULL,
  `file_path` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`inspected_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inspected_tbl`
--

LOCK TABLES `inspected_tbl` WRITE;
/*!40000 ALTER TABLE `inspected_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `inspected_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request_tbl`
--

DROP TABLE IF EXISTS `request_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `request_tbl` (
  `request_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `year` int(10) NOT NULL,
  `listing_id` varchar(100) DEFAULT NULL,
  `date_request` datetime NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request_tbl`
--

LOCK TABLES `request_tbl` WRITE;
/*!40000 ALTER TABLE `request_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `request_tbl` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-12 15:12:33
