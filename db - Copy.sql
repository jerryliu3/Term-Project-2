-- MySQL dump 10.13  Distrib 8.0.13, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: mydatabase
-- ------------------------------------------------------
-- Server version	8.0.13
CREATE DATABASE restaurant;
use restaurant;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `chef`
--

DROP TABLE IF EXISTS `chef`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `chef` (
  `chID` char(5) NOT NULL,
  `chname` varchar(20) DEFAULT NULL,
  `chsalary` int(11) DEFAULT NULL,
  `chgender` char(1) DEFAULT NULL,
  PRIMARY KEY (`chID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chef`
--

LOCK TABLES `chef` WRITE;
/*!40000 ALTER TABLE `chef` DISABLE KEYS */;
INSERT INTO `chef` VALUES ('33732','Ella',5300,'F'),('34240','Wendy',5000,'F'),('38967','James',5500,'M'),('59172','Lorry',5000,'M');
/*!40000 ALTER TABLE `chef` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `choose`
--

DROP TABLE IF EXISTS `choose`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `choose` (
  `tnumber` char(3) NOT NULL,
  `FID` char(3) NOT NULL,
  PRIMARY KEY (`tnumber`,`FID`),
  KEY `FID_idx` (`FID`),
  CONSTRAINT `FID` FOREIGN KEY (`FID`) REFERENCES `food_item` (`fid`),
  CONSTRAINT `tnumber` FOREIGN KEY (`tnumber`) REFERENCES `dining_table` (`tnumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `choose`
--

LOCK TABLES `choose` WRITE;
/*!40000 ALTER TABLE `choose` DISABLE KEYS */;
INSERT INTO `choose` VALUES ('531','123'),('565','258'),('841','258'),('531','379'),('841','379'),('295','626'),('747','626'),('295','657'),('565','657'),('634','657');
/*!40000 ALTER TABLE `choose` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `customer` (
  `cuSSN` char(9) NOT NULL,
  `cuname` varchar(20) DEFAULT NULL,
  `cupho_num` char(11) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `table_number` char(3) DEFAULT NULL,
  PRIMARY KEY (`cuSSN`),
  KEY `table_number_idx` (`table_number`),
  CONSTRAINT `table_number` FOREIGN KEY (`table_number`) REFERENCES `dining_table` (`tnumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES ('121380996','Sheen','01082680131','763 Rose Avenue','747'),('534086704','Jordan','01082324044','3734 Meadow Drive','841'),('670809253','Curry','01081279881','1114 Black Oak Road','295'),('786275161','Kobe','01083562721','1026 Skips Lane','634'),('807965964','Thomas','01020908451','751 Brown Street','565'),('971341312','Ball','01022728517','66 Morgan Street','531');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dining_table`
--

DROP TABLE IF EXISTS `dining_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `dining_table` (
  `tnumber` char(3) NOT NULL,
  `time` time DEFAULT NULL,
  `num_seats` int(11) DEFAULT NULL,
  `order_number` char(4) DEFAULT NULL,
  `waitorID` char(5) DEFAULT NULL,
  PRIMARY KEY (`tnumber`),
  KEY `order_number_idx` (`order_number`),
  KEY `waitorID_idx` (`waitorID`),
  CONSTRAINT `order_number` FOREIGN KEY (`order_number`) REFERENCES `order` (`onumber`),
  CONSTRAINT `waitorID` FOREIGN KEY (`waitorID`) REFERENCES `waitor` (`waid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dining_table`
--

LOCK TABLES `dining_table` WRITE;
/*!40000 ALTER TABLE `dining_table` DISABLE KEYS */;
INSERT INTO `dining_table` VALUES ('295','14:30:28',2,'0002','13120'),('531','12:25:01',3,'0004','97134'),('565','13:45:51',3,'0005','13120'),('634','10:55:33',3,'0003','12138'),('747','11:33:21',5,'0001','12138'),('841','12:26:47',5,'0006','09967');
/*!40000 ALTER TABLE `dining_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employch`
--

DROP TABLE IF EXISTS `employch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `employch` (
  `SSN` char(9) NOT NULL,
  `chID` char(5) NOT NULL,
  PRIMARY KEY (`SSN`,`chID`),
  KEY `chID_idx` (`chID`),
  CONSTRAINT `chID` FOREIGN KEY (`chID`) REFERENCES `chef` (`chid`),
  CONSTRAINT `chSSN` FOREIGN KEY (`SSN`) REFERENCES `owners` (`ssn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employch`
--

LOCK TABLES `employch` WRITE;
/*!40000 ALTER TABLE `employch` DISABLE KEYS */;
INSERT INTO `employch` VALUES ('111111111','33732'),('123456789','34240'),('999999999','34240'),('111111111','38967'),('123456789','59172'),('999999999','59172');
/*!40000 ALTER TABLE `employch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employwa`
--

DROP TABLE IF EXISTS `employwa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `employwa` (
  `SSN` char(9) NOT NULL,
  `waID` char(5) NOT NULL,
  PRIMARY KEY (`SSN`,`waID`),
  KEY `waID_idx` (`waID`),
  CONSTRAINT `waID` FOREIGN KEY (`waID`) REFERENCES `waitor` (`waid`),
  CONSTRAINT `waSSN` FOREIGN KEY (`SSN`) REFERENCES `owners` (`ssn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employwa`
--

LOCK TABLES `employwa` WRITE;
/*!40000 ALTER TABLE `employwa` DISABLE KEYS */;
INSERT INTO `employwa` VALUES ('111111111','09967'),('111111111','12138'),('123456789','12138'),('999999999','12138'),('111111111','13120'),('123456789','97134'),('999999999','97134');
/*!40000 ALTER TABLE `employwa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food_item`
--

DROP TABLE IF EXISTS `food_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `food_item` (
  `FID` char(3) NOT NULL,
  `type` char(1) DEFAULT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `chefID` char(5) DEFAULT NULL,
  PRIMARY KEY (`FID`),
  KEY `chefID_idx` (`chefID`),
  CONSTRAINT `chefID` FOREIGN KEY (`chefID`) REFERENCES `chef` (`chid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food_item`
--

LOCK TABLES `food_item` WRITE;
/*!40000 ALTER TABLE `food_item` DISABLE KEYS */;
INSERT INTO `food_item` VALUES ('123','B','Bacon bomb',7,'33732'),('258','M','Crispy chicken',8,'34240'),('379','B','Shrimp bomb',8,'59172'),('626','R','Jollof rice',11,'38967'),('657','B','Double bomb',10,'33732');
/*!40000 ALTER TABLE `food_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `order` (
  `onumber` char(4) NOT NULL,
  `fee` int(11) DEFAULT NULL,
  `comment` varchar(50) DEFAULT NULL,
  `payment` char(1) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`onumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES ('0001',22,'Very good!','C','2018-11-11'),('0002',21,'Nice dishes.','V','2018-10-25'),('0003',10,'Delicious.','C','2018-11-13'),('0004',15,'Clean environment.','V','2018-10-14'),('0005',18,'Tasty!','C','2018-11-29'),('0006',16,'Yummy!','V','2018-10-31');
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `owners`
--

DROP TABLE IF EXISTS `owners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `owners` (
  `SSN` char(9) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `pho_num` char(11) DEFAULT NULL,
  PRIMARY KEY (`SSN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `owners`
--

LOCK TABLES `owners` WRITE;
/*!40000 ALTER TABLE `owners` DISABLE KEYS */;
INSERT INTO `owners` VALUES ('111111111','Jackie','01042429804'),('123456789','John','01034536898'),('999999999','Green','01047567412');
/*!40000 ALTER TABLE `owners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `waitor`
--

DROP TABLE IF EXISTS `waitor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `waitor` (
  `waID` char(5) NOT NULL,
  `waname` varchar(20) DEFAULT NULL,
  `wasalary` int(11) DEFAULT NULL,
  `wagender` char(1) DEFAULT NULL,
  PRIMARY KEY (`waID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `waitor`
--

LOCK TABLES `waitor` WRITE;
/*!40000 ALTER TABLE `waitor` DISABLE KEYS */;
INSERT INTO `waitor` VALUES ('09967','Ben',4500,'M'),('12138','Mary',4000,'F'),('13120','Lucy',4000,'F'),('97134','Dan',5000,'M');
/*!40000 ALTER TABLE `waitor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'mydatabase'
--

--
-- Dumping routines for database 'mydatabase'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-04  0:47:00
