-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: pset7
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

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
-- Table structure for table `bought`
--

DROP TABLE IF EXISTS `bought`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bought` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `shares` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`,`symbol`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bought`
--

LOCK TABLES `bought` WRITE;
/*!40000 ALTER TABLE `bought` DISABLE KEYS */;
INSERT INTO `bought` VALUES (4,5,'AGTK',5),(6,9,'AGTK',1),(30,11,'e',6),(36,11,'',0),(42,11,'b',1),(43,11,'c',1);
/*!40000 ALTER TABLE `bought` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `sr.no` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `shares` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sr.no`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES (1,11,'d',1,'bought',75.53,'2016-12-14 15:49:12'),(2,11,'a',1,'bought',46.48,'2016-12-14 17:37:53'),(3,11,'c',0,'sold',0,'2016-12-14 17:38:53'),(4,11,'a',0,'sold',0,'2016-12-14 17:39:47'),(5,11,'b',3,'bought',143.7,'2016-12-14 17:43:40'),(6,11,'d',1,'bought',75.89,'2016-12-14 17:57:44'),(7,11,'e',6,'bought',190.32,'2016-12-14 17:58:11'),(8,11,'c',1,'bought',59.93,'2016-12-14 17:58:28'),(9,11,'a',1,'bought',46.14,'2016-12-15 03:41:47'),(10,11,'d',2,'bought',148.24,'2016-12-15 03:41:59'),(11,11,'b',1,'bought',47.75,'2016-12-15 03:42:11'),(12,11,'c',1,'bought',59.45,'2016-12-15 03:42:26'),(13,11,'f',1,'bought',12.53,'2016-12-15 03:42:49'),(14,11,'',0,'bought',0,'2016-12-15 04:08:01'),(15,11,'',0,'bought',0,'2016-12-15 04:08:34'),(16,11,'a',1,'bought',46.14,'2016-12-15 09:58:55'),(17,11,'b',1,'bought',47.75,'2016-12-15 09:59:08'),(18,11,'c',1,'bought',59.45,'2016-12-15 09:59:21'),(19,11,'h',1,'bought',57.03,'2016-12-15 10:01:43'),(20,11,'a',1,'bought',46.14,'2016-12-15 10:09:44'),(21,11,'b',1,'bought',47.75,'2016-12-15 10:09:54'),(22,11,'c',1,'bought',59.45,'2016-12-15 10:10:06'),(23,11,'d',1,'bought',74.12,'2016-12-15 10:10:22'),(24,11,'a',1,'sold',0,'2016-12-15 10:10:39'),(25,11,'d',1,'sold',74.12,'2016-12-15 10:12:43'),(26,9,'d',1,'bought',74.12,'2016-12-15 10:17:20'),(27,9,'d',1,'sold',74.12,'2016-12-15 10:17:49'),(28,9,'d',1,'bought',74.12,'2016-12-15 10:18:28'),(29,9,'d',1,'sold',74.12,'2016-12-15 10:18:50'),(30,11,'f',1,'bought',12.53,'2016-12-15 10:24:03'),(31,11,'f',1,'bought',12.53,'2016-12-15 10:24:29'),(32,11,'f',2,'sold',12.53,'2016-12-15 10:26:57');
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `cash` float NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'andi','$2y$10$c.e4DK7pVyLT.stmHxgAleWq4yViMmkwKz3x8XCo4b/u3r8g5OTnS',0),(2,'caesar','$2y$10$0p2dlmu6HnhzEMf9UaUIfuaQP7tFVDMxgFcVs0irhGqhOxt6hJFaa',10000),(3,'eli','$2y$10$COO6EnTVrCPCEddZyWeEJeH9qPCwPkCS0jJpusNiru.XpRN6Jf7HW',0),(4,'hdan','$2y$10$o9a4ZoHqVkVHSno6j.k34.wC.qzgeQTBHiwa3rpnLq7j2PlPJHo1G',0),(5,'jason','$2y$10$ci2zwcWLJmSSqyhCnHKUF.AjoysFMvlIb1w4zfmCS7/WaOrmBnLNe',0),(6,'john','$2y$10$dy.LVhWgoxIQHAgfCStWietGdJCPjnNrxKNRs5twGcMrQvAPPIxSy',0),(7,'levatich','$2y$10$fBfk7L/QFiplffZdo6etM.096pt4Oyz2imLSp5s8HUAykdLXaz6MK',0),(8,'rob','$2y$10$3pRWcBbGdAdzdDiVVybKSeFq6C50g80zyPRAxcsh2t5UnwAkG.I.2',0),(9,'skroob','$2y$10$395b7wODm.o2N7W5UZSXXuXwrC0OtFB17w4VjPnCIn/nvv9e4XUQK',100),(10,'zamyla','$2y$10$UOaRF0LGOaeHG4oaEkfO4O7vfI34B1W23WqHr9zCpXL68hfQsS3/e',0),(11,'foo','$2y$10$Kc6dCuCPXsnoHiyt.3tSbe.gf7p.UVccPv0VaCREvy5A7J.ekorpm',8660.52),(12,'amma','$2y$10$exD7Y./1vVXGKPtH5MCw4uRXm2N.cV2H1L1HjStsmOprrX8ni7pqu',10000);
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

-- Dump completed on 2016-12-15 10:40:24
