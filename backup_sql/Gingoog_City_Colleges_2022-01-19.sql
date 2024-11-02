-- MariaDB dump 10.19  Distrib 10.4.18-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: db_gcc
-- ------------------------------------------------------
-- Server version	10.4.18-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_code`
--

DROP TABLE IF EXISTS `tbl_code`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_code` (
  `id_no` int(11) NOT NULL AUTO_INCREMENT,
  `codeone` varchar(255) NOT NULL,
  `codetwo` varchar(255) NOT NULL,
  `codethree` varchar(255) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `seccode` varchar(255) NOT NULL,
  `status` varchar(1) NOT NULL,
  PRIMARY KEY (`id_no`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_code`
--

LOCK TABLES `tbl_code` WRITE;
/*!40000 ALTER TABLE `tbl_code` DISABLE KEYS */;
INSERT INTO `tbl_code` VALUES (13,'25d55ad283aa400af464c76d713c07ad','25d55ad283aa400af464c76d713c07ad','25d55ad283aa400af464c76d713c07ad','09552938450','799d08a','1');
/*!40000 ALTER TABLE `tbl_code` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_course_section`
--

DROP TABLE IF EXISTS `tbl_course_section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_course_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course` varchar(250) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_course_section`
--

LOCK TABLES `tbl_course_section` WRITE;
/*!40000 ALTER TABLE `tbl_course_section` DISABLE KEYS */;
INSERT INTO `tbl_course_section` VALUES (1,'TVL','2021-09-22 07:05:15'),(2,'Sampaguita','2021-09-22 07:05:15'),(9,'Qwerty','2022-01-08 06:00:51');
/*!40000 ALTER TABLE `tbl_course_section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_history`
--

DROP TABLE IF EXISTS `tbl_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_history` (
  `id_no` int(11) NOT NULL AUTO_INCREMENT,
  `user_role` int(1) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_no`)
) ENGINE=InnoDB AUTO_INCREMENT=528 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_history`
--

LOCK TABLES `tbl_history` WRITE;
/*!40000 ALTER TABLE `tbl_history` DISABLE KEYS */;
INSERT INTO `tbl_history` VALUES (54,1,1,'Admin Login Successfully!','2021-12-08 10:35:03'),(55,3,3,'User Logout Successfully!','2021-12-08 10:44:35'),(56,3,21,'User Login Successfully!','2021-12-08 10:44:43'),(57,3,21,'User Logout Successfully!','2021-12-08 10:45:37'),(58,3,3,'User Login Successfully!','2021-12-08 10:59:13'),(59,3,3,'Student Time In Successfully, School ID: (2103425) !','2021-12-08 10:59:28'),(60,3,3,'Student Trying to Time Out in Gate 2, School ID: (2103425) !','2021-12-08 11:00:21'),(61,3,3,'Student Trying to Time Out in Gate 2, School ID: (2103425) !','2021-12-08 11:01:02'),(62,3,3,'User Logout Successfully!','2021-12-08 11:02:16'),(63,3,21,'User Login Successfully!','2021-12-08 11:02:22'),(64,3,21,'Student Time Out Successfully, School ID: (2103425) !','2021-12-08 11:02:31'),(65,3,21,'Student Trying to Time In in Gate 2, School ID: (2103425) !','2021-12-08 11:02:56'),(66,1,1,'Admin Logout Successfully!','2021-12-08 11:08:36'),(67,3,21,'User Logout Successfully!','2021-12-08 11:13:37'),(68,1,1,'Admin Login Successfully!','2021-12-08 11:40:43'),(69,1,1,'Admin Logout Successfully!','2021-12-08 13:10:05'),(70,1,1,'Admin Login Successfully!','2021-12-08 13:12:48'),(71,1,1,'Admin Logout Successfully!','2021-12-08 13:55:42'),(72,3,3,'User Login Successfully!','2021-12-08 13:55:48'),(73,1,1,'Admin Login Successfully!','2021-12-08 13:56:43'),(74,3,3,'Student Time In Successfully, School ID: (2107321) !','2021-12-08 13:57:06'),(75,3,3,'Student Trying to Time Out in Gate 1, School ID: (2107321) !','2021-12-08 13:57:11'),(76,1,1,'Admin Logout Successfully!','2021-12-08 13:57:42'),(77,3,3,'User Logout Successfully!','2021-12-08 14:02:56'),(78,1,1,'Admin Login Successfully!','2021-12-08 15:32:18'),(79,1,1,'Admin Backup Data Successfully!','2021-12-08 15:39:03'),(80,1,1,'Admin Backup Data Successfully!','2021-12-08 16:29:09'),(81,1,1,'Admin Logout Successfully!','2021-12-08 16:29:15'),(82,1,1,'Admin Login Successfully!','2021-12-10 04:41:18'),(83,1,1,'Admin Added New Student(School ID: 21023) Successfully!','2021-12-10 05:53:03'),(84,1,1,'Admin Updated Student Data (School ID: 21023) Successfully!','2021-12-10 06:00:04'),(85,1,1,'Admin Updated Student Data (School ID: 2107321) Successfully!','2021-12-10 06:00:22'),(86,1,1,'Admin Updated Student Status (1)!','2021-12-10 06:01:02'),(87,1,1,'Admin Updated Student Status (1)!','2021-12-10 06:01:31'),(88,1,1,'Admin Updated Student Data (School ID: 21023) Successfully!','2021-12-10 06:01:54'),(89,1,1,'Admin Updated Student Status (1)!','2021-12-10 06:04:41'),(90,1,1,'Admin Updated Student Data (School ID: 2107321) Successfully!','2021-12-10 06:05:00'),(91,1,1,'Admin Updated Student Status (1)!','2021-12-10 06:05:18'),(92,1,1,'Admin Updated Student Data (School ID: 21023) Successfully!','2021-12-10 06:05:39'),(93,1,1,'Admin Updated Student Status (1)!','2021-12-10 06:05:59'),(94,1,1,'Admin Updated Student Data (School ID: 21023) Successfully!','2021-12-10 06:09:21'),(95,1,1,'Admin Updated Student Data (School ID: 2107321) Successfully!','2021-12-10 06:09:43'),(96,1,1,'Admin Updated Student Data (School ID: 21023) Successfully!','2021-12-10 06:09:57'),(97,1,1,'Admin Updated Student Data (School ID: 21023) Successfully!','2021-12-10 06:18:12'),(98,1,1,'Admin Updated Student Data (School ID: 2107321) Successfully!','2021-12-10 07:31:43'),(99,1,1,'Admin Logout Successfully!','2021-12-10 07:35:50'),(100,1,1,'Admin Login Successfully!','2021-12-10 07:35:59'),(101,1,1,'Admin Backup Data Successfully!','2021-12-10 07:36:06'),(102,1,1,'Admin Logout Successfully!','2021-12-10 07:36:14'),(103,1,1,'Admin Login Successfully!','2021-12-10 08:21:22'),(104,1,1,'Admin Backup Data Successfully!','2021-12-10 08:30:39'),(105,1,1,'Admin Backup Data Successfully!','2021-10-10 08:31:55'),(106,1,1,'Admin Updated Student Data (School ID: 2103425) Successfully!','2021-12-10 08:35:17'),(107,1,1,'Admin Updated Student Data (School ID: 2103425) Successfully!','2021-12-10 08:35:39'),(108,1,1,'Admin Updated Student Status (STATUS: 1)!','2021-12-10 08:50:39'),(109,1,1,'Admin Updated Student Status (STATUS: 1)!','2021-12-10 08:50:45'),(110,1,1,'Admin Updated Student Data (School ID: 2107321) Successfully!','2021-12-10 08:50:57'),(111,1,1,'Admin Updated Student Data (School ID: 21023) Successfully!','2021-12-10 08:51:06'),(112,1,1,'Admin Updated Student Data (School ID: 2107321) Successfully!','2021-12-10 09:05:46'),(113,1,1,'Admin Updated Student Data (School ID: 21023) Successfully!','2021-12-10 09:06:03'),(114,1,1,'Admin Added New Student(School ID: 2100000) Successfully!','2021-12-10 09:20:54'),(115,1,1,'Admin Updated Student Status (STATUS: 1)!','2021-12-10 09:31:22'),(116,1,1,'Admin Updated Student Status (STATUS: 1)!','2021-12-10 09:31:27'),(117,1,1,'Admin Updated Student Data (School ID: 2100000) Successfully!','2021-12-10 09:31:51'),(118,1,1,'Admin Updated Student Data (School ID: 2100000) Successfully!','2021-12-10 09:32:18'),(119,1,1,'Admin Updated Student Data (School ID: 21023) Successfully!','2021-12-10 09:33:39'),(120,1,1,'Admin Updated Student Data (School ID: 2100000) Successfully!','2021-12-10 09:34:27'),(121,1,1,'Admin Updated Student Data (School ID: 2100000) Successfully!','2021-12-10 09:37:00'),(122,1,1,'Admin Updated Student Data (School ID: 2100000) Successfully!','2021-12-10 09:37:09'),(123,1,1,'Admin Updated Student Data (School ID: 21023) Successfully!','2021-12-10 09:37:27'),(124,1,1,'Admin Updated Student Data (School ID: 2107323) Successfully!','2021-12-10 09:38:48'),(125,1,1,'Admin Updated Student Data (School ID: 2107323) Successfully!','2021-12-10 09:40:16'),(126,1,1,'Admin Updated Student Data (School ID: 2107329) Successfully!','2021-12-10 09:41:36'),(127,1,1,'Admin Updated Student Data (School ID: 2107329) Successfully!','2021-12-10 09:42:22'),(128,1,1,'Admin Updated Student Data (School ID: 2107328) Successfully!','2021-12-10 09:43:19'),(129,1,1,'Admin Updated Student Data (School ID: 2100000) Successfully!','2021-12-10 09:45:44'),(130,1,1,'Admin Updated Student Data (School ID: 2100000) Successfully!','2021-12-10 09:46:32'),(131,1,1,'Admin Updated Student Data (School ID: 2100000) Successfully!','2021-12-10 09:46:49'),(132,1,1,'Admin Logout Successfully!','2021-12-10 09:49:51'),(133,1,1,'Admin Login Successfully!','2021-12-10 09:49:57'),(134,1,1,'Admin Updated Student Data (School ID: 2100000) Successfully!','2021-12-10 09:56:19'),(135,1,1,'Admin Updated Student Data (School ID: 2100000) Successfully!','2021-12-10 09:57:24'),(136,1,1,'Admin Updated Student Data (School ID: 2107321) Successfully!','2021-12-10 09:57:31'),(137,1,1,'Admin Updated Student Data (School ID: 2100000) Successfully!','2021-12-10 09:57:44'),(138,1,1,'Admin Updated Student Data (School ID: 2107328) Successfully!','2021-12-10 09:58:01'),(139,1,1,'Admin Updated Student Data (School ID: 2107329) Successfully!','2021-12-10 09:58:30'),(140,1,1,'Admin Updated Student Data (School ID: 2100000) Successfully!','2021-12-10 09:59:16'),(141,1,1,'Admin Deleted User (User ID: 22) Successfully!','2021-12-10 10:17:30'),(142,1,1,'Admin Added New User Successfully!','2021-12-10 10:18:20'),(143,1,1,'Admin Added New User Successfully!','2021-12-10 10:18:34'),(144,1,1,'Admin Deleted User (User ID: 23) Successfully!','2021-12-10 10:19:13'),(145,1,1,'Admin Deleted User (User ID: 24) Successfully!','2021-12-10 10:19:36'),(146,1,1,'Admin Deleted Student Data (School ID: 2103425) Successfully!','2021-12-10 10:50:40'),(147,1,1,'Admin Deleted Student Data (School ID: 2100000) Successfully!','2021-12-10 10:50:46'),(148,1,1,'Admin Added New Section/Strand (Section/Strand: Rizal) Successfully!','2021-12-10 10:59:04'),(149,1,1,'Admin Deleted Section/Strand (ID: 6) Successfully!','2021-12-10 11:07:04'),(150,1,1,'Admin Updated Student Data (School ID: 21023) Successfully!','2021-12-10 12:18:42'),(151,1,1,'Admin Deleted Student Data (School ID: 21023) Successfully!','2021-12-10 12:19:25'),(152,1,1,'Admin Updated Student Data (School ID: 2107321) Successfully!','2021-12-10 12:20:51'),(153,1,1,'Admin Deleted Student Data (School ID: 2107321) Successfully!','2021-12-10 12:20:59'),(154,1,1,'Admin Updated Student Data (School ID: 2107328) Successfully!','2021-12-10 12:22:56'),(155,1,1,'Admin Updated Student Data (School ID: 2107323) Successfully!','2021-12-10 12:23:39'),(156,3,3,'User Login Successfully!','2021-12-10 12:24:09'),(157,3,3,'User Login Successfully!','2021-12-10 12:24:44'),(158,3,3,'User Logout Successfully!','2021-12-10 12:24:55'),(159,1,1,'Admin Login Successfully!','2021-12-10 12:25:03'),(160,3,3,'Student Time In Successfully, School ID: (2107323) !','2021-12-10 12:25:26'),(161,3,3,'Student Trying to Time Out in Gate 1, School ID: (2107323) !','2021-12-10 12:26:00'),(162,3,3,'User Logout Successfully!','2021-12-10 12:26:06'),(163,3,21,'User Login Successfully!','2021-12-10 12:26:12'),(164,3,21,'Student Time Out Successfully, School ID: (2107323) !','2021-12-10 12:26:22'),(165,3,21,'Student Trying to Time In in Gate 2, School ID: (2107323) !','2021-12-10 12:26:32'),(166,3,21,'User Logout Successfully!','2021-12-10 12:26:37'),(167,3,3,'User Login Successfully!','2021-12-10 12:26:45'),(168,3,3,'Student Time In Successfully, School ID: (2107323) !','2021-12-10 12:26:52'),(169,3,3,'Student Trying to Time Out in Gate 1, School ID: (2107323) !','2021-12-10 12:26:57'),(170,1,1,'Admin Deleted Student Data (School ID: 2107323) Successfully!','2021-12-10 12:27:20'),(171,3,3,'Student/Person Trying to Scan Invalid QR Code!','2021-12-10 12:28:15'),(172,3,3,'Student/Person Trying to Scan Invalid QR Code!','2021-12-10 12:28:24'),(173,3,3,'User Logout Successfully!','2021-12-10 12:28:47'),(174,1,1,'Admin Deleted Student Data (School ID: 2107327) Successfully!','2021-12-10 12:30:44'),(175,1,1,'Admin Deleted Student Data (School ID: 2107328) Successfully!','2021-12-10 12:34:26'),(176,1,1,'Admin Updated Student Data (School ID: 2107329) Successfully!','2021-12-10 12:37:45'),(177,1,1,'Admin Deleted Student Data (School ID: 2107329) Successfully!','2021-12-10 12:50:36'),(178,1,1,'Admin Added New Student(School ID: 210) Successfully!','2021-12-10 12:52:26'),(179,3,3,'User Login Successfully!','2021-12-10 12:52:38'),(180,3,3,'Student Time In Successfully, School ID: (210) !','2021-12-10 12:52:54'),(181,3,3,'Student Trying to Time Out in Gate 1, School ID: (210) !','2021-12-10 12:52:59'),(182,3,3,'User Logout Successfully!','2021-12-10 12:53:05'),(183,3,21,'User Login Successfully!','2021-12-10 12:53:16'),(184,3,21,'Student Time Out Successfully, School ID: (210) !','2021-12-10 12:53:23'),(185,3,21,'Student Trying to Time In in Gate 2, School ID: (210) !','2021-12-10 12:53:29'),(186,3,21,'User Logout Successfully!','2021-12-10 12:53:35'),(187,3,3,'User Login Successfully!','2021-12-10 12:53:42'),(188,3,3,'Student Time In Successfully, School ID: (210) !','2021-12-10 12:53:52'),(189,3,3,'Student Trying to Time Out in Gate 1, School ID: (210) !','2021-12-10 12:53:57'),(190,3,3,'User Logout Successfully!','2021-12-10 12:54:03'),(191,1,1,'Admin Updated Student Data (School ID: 210) Successfully!','2021-12-10 12:55:35'),(192,1,1,'Admin Deleted Student Data (School ID: 210) Successfully!','2021-12-10 12:55:41'),(193,1,1,'Admin Backup Data Successfully!','2021-12-10 12:59:19'),(194,1,1,'Admin Backup Data Successfully!','2021-12-11 12:59:34'),(195,1,1,'Admin Logout Successfully!','2021-12-10 13:04:58'),(196,1,1,'Admin Login Successfully!','2021-12-14 12:55:42'),(197,1,1,'Admin Added New Section/Strand (Section/Strand: Jose) Successfully!','2021-12-14 12:57:31'),(198,1,1,'Admin Backup Data Successfully!','2021-12-14 12:58:28'),(199,1,1,'Admin Logout Successfully!','2021-12-14 12:58:48'),(200,2,2,'Staff Login Successfully!','2021-12-14 13:04:23'),(201,2,2,'Staff Logout Successfully!','2021-12-14 13:05:32'),(202,2,2,'Staff Login Successfully!','2021-12-14 13:29:42'),(203,1,2,'Admin Added New Student(School ID: 123) Successfully!','2021-12-14 13:30:49'),(204,2,2,'Staff Logout Successfully!','2021-12-14 13:33:52'),(205,3,3,'User Login Successfully!','2021-12-14 13:33:56'),(206,3,3,'User Logout Successfully!','2021-12-14 13:34:10'),(207,2,2,'Staff Login Successfully!','2021-12-14 13:38:41'),(208,1,2,'Admin Updated Student Data (School ID: 123) Successfully!','2021-12-14 13:42:15'),(209,2,2,'Staff Logout Successfully!','2021-12-14 14:00:14'),(210,1,1,'Admin Login Successfully!','2021-12-14 14:00:20'),(211,1,1,'Admin Logout Successfully!','2021-12-14 14:01:04'),(212,3,3,'User Login Successfully!','2021-12-14 14:01:08'),(213,3,3,'User Logout Successfully!','2021-12-14 14:01:25'),(214,1,1,'Admin Login Successfully!','2021-12-14 14:01:31'),(215,1,1,'Admin Backup Data Successfully!','2021-12-14 14:01:41'),(216,1,1,'Admin Backup Data Successfully!','2021-12-14 14:02:05'),(217,1,1,'Admin Backup Data Successfully!','2021-12-14 14:02:09'),(218,1,1,'Admin Logout Successfully!','2021-12-14 14:02:18'),(219,1,1,'Admin Login Successfully!','2021-12-15 12:41:24'),(220,1,1,'Admin Logout Successfully!','2021-12-15 12:41:52'),(221,1,1,'Admin Login Successfully!','2021-12-15 13:33:54'),(222,1,1,'Admin Logout Successfully!','2021-12-15 13:34:05'),(223,1,1,'Admin Login Successfully!','2022-01-04 03:02:09'),(224,1,1,'Admin Updated Student Status (STATUS: 1)!','2022-01-04 03:02:26'),(225,1,1,'Admin Updated Student Data (School ID: 123) Successfully!','2022-01-04 03:02:43'),(226,1,1,'Admin Logout Successfully!','2022-01-04 03:03:22'),(227,3,3,'User Login Successfully!','2022-01-04 03:03:30'),(228,3,3,'Student Time In Successfully, School ID: (123) !','2022-01-04 03:03:49'),(229,3,3,'User Logout Successfully!','2022-01-04 03:04:36'),(230,1,1,'Admin Login Successfully!','2022-01-04 13:52:54'),(231,1,1,'Admin Logout Successfully!','2022-01-04 15:03:05'),(232,3,3,'User Login Successfully!','2022-01-04 15:03:11'),(233,1,1,'Admin Login Successfully!','2022-01-04 15:04:06'),(234,3,3,'Student Trying to Time Out in Gate 1, School ID: (123) !','2022-01-04 15:04:22'),(235,3,3,'Student Time In Successfully, School ID: (123) !','2022-01-04 15:04:58'),(236,3,3,'User Logout Successfully!','2022-01-04 15:05:08'),(237,3,21,'User Login Successfully!','2022-01-04 15:05:26'),(238,3,21,'Student Time Out Successfully, School ID: (123) !','2022-01-04 15:05:37'),(239,3,21,'Student Trying to Time In in Gate 2, School ID: (123) !','2022-01-04 15:05:42'),(240,3,21,'User Logout Successfully!','2022-01-04 15:06:26'),(241,1,1,'Admin Login Successfully!','2022-01-04 15:06:32'),(242,1,1,'Admin Backup Data Successfully!','2022-01-04 15:13:41'),(243,1,1,'Admin Updated Student Data (School ID: 123) Successfully!','2022-01-04 15:19:52'),(244,1,1,'Admin Added New Student(School ID: 434) Successfully!','2022-01-04 15:23:57'),(245,1,1,'Admin Logout Successfully!','2022-01-04 15:49:07'),(246,1,1,'Admin Login Successfully!','2022-01-06 10:07:58'),(247,1,1,'Admin Logout Successfully!','2022-01-06 10:15:30'),(248,1,1,'Admin Login Successfully!','2022-01-06 10:28:29'),(249,1,1,'Admin Password Updated Successfully!','2022-01-06 10:48:50'),(250,1,1,'Admin Logout Successfully!','2022-01-06 10:49:00'),(251,0,0,'Login failed!','2022-01-06 10:49:06'),(252,1,1,'Admin Login Successfully!','2022-01-06 10:49:13'),(253,1,1,'Admin Password Updated Successfully!','2022-01-06 10:49:33'),(254,1,1,'Admin Added New User Successfully!','2022-01-06 10:50:55'),(255,1,1,'Admin Deleted User (User ID: 25) Successfully!','2022-01-06 10:51:06'),(256,1,1,'Admin Added New User Successfully!','2022-01-06 10:51:53'),(257,1,1,'Admin Updated User (User ID: 26) Successfully!','2022-01-06 10:52:19'),(258,1,1,'Admin Deleted User (User ID: 26) Successfully!','2022-01-06 10:53:26'),(259,1,1,'Admin Logout Successfully!','2022-01-06 10:54:20'),(260,2,2,'Staff Login Successfully!','2022-01-06 10:54:28'),(261,2,2,'Staff Password Updated Successfully!','2022-01-06 10:57:46'),(262,2,2,'Staff Logout Successfully!','2022-01-06 10:58:32'),(263,3,3,'User Login Successfully!','2022-01-06 10:58:36'),(264,3,3,'User Password Updated Successfully!','2022-01-06 10:59:26'),(265,3,3,'User Logout Successfully!','2022-01-06 10:59:40'),(266,1,1,'Admin Login Successfully!','2022-01-06 11:02:46'),(267,1,1,'Admin Added New Student(School ID: 12121) Successfully!','2022-01-06 11:11:12'),(268,1,1,'Admin Updated Student Data (School ID: 12121) Successfully!','2022-01-06 11:16:04'),(269,1,1,'Admin Updated Student Data (School ID: 12121) Successfully!','2022-01-06 11:16:54'),(270,1,1,'Admin Updated Student Data (School ID: 12121) Successfully!','2022-01-06 11:17:17'),(271,1,1,'Admin Updated Student Data (School ID: 12121) Successfully!','2022-01-06 11:23:20'),(272,1,1,'Admin Updated Student Data (School ID: 12121) Successfully!','2022-01-06 11:27:51'),(273,1,1,'Admin Updated Student Data (School ID: 12121) Successfully!','2022-01-06 11:36:45'),(274,1,1,'Admin Updated Student Data (School ID: 12121) Successfully!','2022-01-06 11:38:15'),(275,1,1,'Admin Updated Student Data (School ID: 12121) Successfully!','2022-01-06 11:38:32'),(276,1,1,'Admin Updated Student Data (School ID: 12121) Successfully!','2022-01-06 11:39:20'),(277,1,1,'Admin Updated Student Data (School ID: 12121) Successfully!','2022-01-06 11:51:31'),(278,1,1,'Admin Updated Student Data (School ID: 12121) Successfully!','2022-01-06 12:09:17'),(279,1,1,'Admin Updated Student Data (School ID: 12121) Successfully!','2022-01-06 12:10:01'),(280,1,1,'Admin Logout Successfully!','2022-01-06 12:11:53'),(281,1,1,'Admin Login Successfully!','2022-01-06 12:16:02'),(282,1,1,'Admin Logout Successfully!','2022-01-06 12:16:08'),(283,1,1,'Admin Login Successfully!','2022-01-06 12:16:34'),(284,1,1,'Admin Updated Student Data (School ID: 12121) Successfully!','2022-01-06 16:05:46'),(285,1,1,'Admin Logout Successfully!','2022-01-06 16:05:58'),(286,1,1,'Admin Login Successfully!','2022-01-07 10:55:12'),(287,1,1,'Admin Logout Successfully!','2022-01-07 10:57:21'),(288,1,1,'Admin Login Successfully!','2022-01-08 05:08:36'),(289,1,1,'Admin Added New Student(School ID: 1212121) Successfully!','2022-01-08 05:11:13'),(290,1,1,'Admin Updated Student Data (School ID: 1212121) Successfully!','2022-01-08 05:12:56'),(291,1,1,'Admin Updated Student Data (School ID: 1212121) Successfully!','2022-01-08 05:13:35'),(292,1,1,'Admin Deleted Student Data (School ID: 123) Successfully!','2022-01-08 05:14:16'),(293,1,1,'Admin Deleted Student Data (School ID: 1212121) Successfully!','2022-01-08 05:14:21'),(294,1,1,'Admin Updated Student Data (School ID: 12121) Successfully!','2021-01-08 05:16:20'),(295,1,1,'Admin Updated Student Data (School ID: 12121) Successfully!','2021-01-08 05:16:54'),(296,1,1,'Admin Updated Student Image (School ID: ) Successfully!','2021-01-08 05:17:28'),(297,1,1,'Admin Updated Student Status (STATUS: 1)!','2021-01-08 05:18:14'),(298,1,1,'Admin Updated Student Data (School ID: 12121) Successfully!','2021-01-08 05:18:30'),(299,1,1,'Admin Added New User Successfully!','2021-01-08 05:20:33'),(300,1,1,'Admin Added New User Successfully!','2021-01-08 05:21:08'),(301,1,1,'Admin Updated User (User ID: 28) Successfully!','2022-01-08 05:28:59'),(302,1,1,'Admin Deleted User (User ID: 28) Successfully!','2022-01-08 05:30:43'),(303,1,1,'Admin Deleted User (User ID: 27) Successfully!','2022-01-08 05:30:48'),(304,1,1,'Admin Updated Student Data (School ID: 12121) Successfully!','2022-01-08 05:31:02'),(305,1,1,'Admin Updated Student Data (School ID: 434) Successfully!','2022-01-08 05:31:08'),(306,1,1,'Admin Deleted Student Data (School ID: 434) Successfully!','2022-01-08 05:31:15'),(307,1,1,'Admin Deleted Student Data (School ID: 12121) Successfully!','2022-01-08 05:31:17'),(308,1,1,'Admin Logout Successfully!','2022-01-08 05:31:26'),(309,0,0,'Login failed!','2022-01-08 05:33:02'),(310,1,1,'Admin Login Successfully!','2022-01-08 05:33:14'),(311,1,1,'Admin Added New Student(School ID: 12121) Successfully!','2022-01-08 05:37:19'),(312,1,1,'Admin Updated Student Data (School ID: 12121) Successfully!','2022-01-08 05:38:33'),(313,1,1,'Admin Updated Student Data (School ID: 12121) Successfully!','2022-01-08 05:39:18'),(314,1,1,'Admin Updated Student Image (School ID: ) Successfully!','2022-01-08 05:39:39'),(315,1,1,'Admin Added New Student(School ID: 123) Successfully!','2022-01-08 05:40:44'),(316,1,1,'Admin Updated Student Data (School ID: 123) Successfully!','2022-01-08 05:42:08'),(317,1,1,'Admin Updated Student Status (STATUS: 1)!','2022-01-08 05:44:37'),(318,1,1,'Admin Updated Student Data (School ID: 123) Successfully!','2022-01-08 05:44:48'),(319,1,1,'Admin Deleted Student Data (School ID: 123) Successfully!','2022-01-08 05:45:29'),(320,1,1,'Admin Added New User Successfully!','2022-01-08 05:47:46'),(321,1,1,'Admin Updated User (User ID: 29) Successfully!','2022-01-08 05:48:36'),(322,1,1,'Admin Added New User Successfully!','2022-01-08 05:49:21'),(323,1,1,'Admin Deleted User (User ID: 30) Successfully!','2022-01-08 05:49:31'),(324,1,1,'Admin Deleted User (User ID: 29) Successfully!','2022-01-08 05:49:35'),(325,1,1,'Admin Password Updated Successfully!','2022-01-08 05:50:58'),(326,1,1,'Admin Logout Successfully!','2022-01-08 05:51:39'),(327,0,0,'Login failed!','2022-01-08 05:51:54'),(328,1,1,'Admin Login Successfully!','2022-01-08 05:52:04'),(329,1,1,'Admin Added New Section/Strand (Section/Strand: Rizal) Successfully!','2022-01-08 05:52:36'),(330,1,1,'Admin Updated Section/Strand (ID: 7)!','2022-01-08 05:52:52'),(331,1,1,'Admin Deleted Section/Strand (ID: 7) Successfully!','2022-01-08 05:53:07'),(332,1,1,'Admin Deleted Section/Strand (ID: 8) Successfully!','2022-01-08 05:53:11'),(333,1,1,'Admin Updated Official/President Name Successfully!','2022-01-08 05:53:40'),(334,1,1,'Admin Updated Official/President Name Successfully!','2022-01-08 05:53:40'),(335,1,1,'Admin Updated Official/President Name Successfully!','2022-01-08 05:53:52'),(336,1,1,'Admin Logout Successfully!','2022-01-08 05:58:29'),(337,2,2,'Staff Login Successfully!','2022-01-08 05:58:36'),(338,2,2,'Staff Updated Student Data (School ID: 12121) Successfully!','2022-01-08 05:59:21'),(339,2,2,'Staff Password Updated Successfully!','2022-01-08 06:00:15'),(340,2,2,'Staff Logout Successfully!','2022-01-08 06:00:20'),(341,2,2,'Staff Login Successfully!','2022-01-08 06:00:35'),(342,2,2,'Staff Added New Section/Strand (Section/Strand: Jose) Successfully!','2022-01-08 06:00:52'),(343,2,2,'Staff Updated Section/Strand (ID: 9)!','2022-01-08 06:01:01'),(344,2,2,'Staff Updated Official/President Name Successfully!','2022-01-08 06:01:17'),(345,2,2,'Staff Logout Successfully!','2022-01-08 06:02:02'),(346,3,3,'User Login Successfully!','2022-01-08 06:02:17'),(347,3,3,'User Password Updated Successfully!','2022-01-08 06:04:04'),(348,3,3,'User Logout Successfully!','2022-01-08 06:04:09'),(349,3,3,'User Login Successfully!','2022-01-08 06:04:18'),(350,1,1,'Admin Login Successfully!','2022-01-08 06:04:50'),(351,1,1,'Admin Updated Student Status (STATUS: 1)!','2022-01-08 06:05:06'),(352,3,3,'Student Time In Successfully, School ID: (12121) !','2022-01-08 06:07:28'),(353,3,3,'Student Trying to Time Out in Gate 1, School ID: (12121) !','2022-01-08 06:08:45'),(354,3,3,'User Logout Successfully!','2022-01-08 06:09:07'),(355,0,0,'Login failed!','2022-01-08 06:09:20'),(356,0,0,'Login failed!','2022-01-08 06:09:27'),(357,0,0,'Login failed!','2022-01-08 06:09:39'),(358,3,21,'User Login Successfully!','2022-01-08 06:09:58'),(359,3,21,'Student Time Out Successfully, School ID: (12121) !','2022-01-08 06:10:29'),(360,3,21,'Student Trying to Time In in Gate 2, School ID: (12121) !','2022-01-08 06:11:08'),(361,3,21,'User Logout Successfully!','2022-01-08 06:11:16'),(362,0,0,'Login failed!','2022-01-08 06:11:27'),(363,3,3,'User Login Successfully!','2022-01-08 06:11:36'),(364,3,3,'Student Time In Successfully, School ID: (12121) !','2022-01-08 06:11:44'),(365,3,3,'Student/Person Trying to Scan Invalid QR Code!','2022-01-08 06:13:00'),(366,3,3,'User Logout Successfully!','2022-01-08 06:13:50'),(367,1,1,'Admin Login Successfully!','2022-01-08 06:13:58'),(368,1,1,'Admin Logout Successfully!','2022-01-08 06:18:11'),(369,1,1,'Admin Logout Successfully!','2022-01-08 06:18:42'),(370,0,0,'Login failed!','2022-01-11 11:48:26'),(371,1,1,'Admin Login Successfully!','2022-01-11 11:48:42'),(372,1,1,'Admin Logout Successfully!','2022-01-11 11:48:55'),(373,3,3,'User Login Successfully!','2022-01-11 11:49:04'),(374,3,3,'User Logout Successfully!','2022-01-11 11:50:22'),(375,2,2,'Staff Login Successfully!','2022-01-11 11:50:34'),(376,2,2,'Staff Logout Successfully!','2022-01-11 11:55:18'),(377,1,1,'Admin Login Successfully!','2022-01-11 11:55:28'),(378,1,1,'Admin Updated Official/President Name Successfully!','2022-01-11 12:04:05'),(379,1,1,'Admin Password Updated Successfully!','2022-01-11 12:06:21'),(380,1,1,'Admin Updated User (User ID: 2) Successfully!','2022-01-11 12:06:37'),(381,1,1,'Admin Updated User (User ID: 3) Successfully!','2022-01-11 12:06:48'),(382,1,1,'Admin Updated User (User ID: 21) Successfully!','2022-01-11 12:06:58'),(383,1,1,'Admin Updated Student Data (School ID: 12121) Successfully!','2022-01-11 12:10:48'),(384,1,1,'Admin Deleted Student Data (School ID: 12121) Successfully!','2022-01-11 12:10:55'),(385,1,1,'Admin Logout Successfully!','2022-01-11 12:11:02'),(386,2,2,'Staff Login Successfully!','2022-01-11 12:11:14'),(387,1,2,'Admin Updated Official/President Name Successfully!','2022-01-11 12:11:20'),(388,1,2,'Admin Updated Official/President Name Successfully!','2022-01-11 12:11:29'),(389,2,2,'Staff Logout Successfully!','2022-01-11 12:12:55'),(390,3,3,'User Login Successfully!','2022-01-11 12:13:01'),(391,3,3,'User Logout Successfully!','2022-01-11 12:13:08'),(392,3,21,'User Login Successfully!','2022-01-11 12:13:15'),(393,3,21,'User Logout Successfully!','2022-01-11 12:13:21'),(394,0,0,'Login failed!','2022-01-11 12:13:34'),(395,1,1,'Admin Login Successfully!','2022-01-11 12:13:43'),(396,1,1,'Admin Password Updated Successfully!','2022-01-16 14:30:14'),(397,0,0,'Login failed!','2022-01-17 09:24:06'),(398,0,0,'Login failed!','2022-01-17 09:24:16'),(399,1,1,'Admin Login Successfully!','2022-01-17 09:24:39'),(400,1,1,'Admin Password Updated Successfully!','2022-01-17 09:25:17'),(401,1,1,'Admin Added New User Successfully!','2022-01-17 09:34:15'),(402,1,1,'Admin Updated User (User ID: 31) Successfully!','2022-01-17 09:36:13'),(403,1,1,'Admin Updated User (User ID: 31) Successfully!','2022-01-17 09:36:46'),(404,1,1,'Admin Updated User (User ID: 31) Successfully!','2022-01-17 09:37:41'),(405,1,1,'Admin Updated User (User ID: 31) Successfully!','2022-01-17 09:38:10'),(406,1,1,'Admin Updated User (User ID: 31) Successfully!','2022-01-17 09:40:13'),(407,1,1,'Admin Deleted User (User ID: 31) Successfully!','2022-01-17 09:42:43'),(408,1,1,'Admin Added New User Successfully!','2022-01-17 09:43:23'),(409,1,1,'Admin Updated User (User ID: 32) Successfully!','2022-01-17 09:52:42'),(410,1,1,'Admin added admin security code and mobile number!','2022-01-17 10:36:01'),(411,1,1,'Admin added admin security code and mobile number!','2022-01-17 10:37:34'),(412,1,1,'Admin added admin security code and mobile number!','2022-01-17 10:40:19'),(413,1,1,'Admin Updated User (User ID: 32) Successfully!','2022-01-17 10:40:39'),(414,1,1,'Admin added admin security code and mobile number!','2022-01-17 10:43:23'),(415,1,1,'Admin Logout Successfully!','2022-01-17 10:43:35'),(416,0,0,'Login failed!','2022-01-17 10:54:39'),(417,1,1,'Admin Login Successfully!','2022-01-17 10:54:50'),(418,1,1,'Admin Deleted User (User ID: 32) Successfully!','2022-01-17 10:55:01'),(419,1,1,'Admin Added New User Successfully!','2022-01-17 10:55:17'),(420,1,1,'Admin Logout Successfully!','2022-01-17 10:55:33'),(421,0,0,'Login failed!','2022-01-17 11:02:14'),(422,1,1,'Admin Login Successfully!','2022-01-17 11:02:24'),(423,1,1,'Admin Deleted User (User ID: 33) Successfully!','2022-01-17 11:02:31'),(424,1,1,'Admin Password Updated Successfully!','2022-01-17 11:02:44'),(425,1,1,'Admin Logout Successfully!','2022-01-17 11:03:00'),(426,0,0,'Login failed!','2022-01-17 11:03:08'),(427,1,1,'Admin Login Successfully!','2022-01-17 11:03:15'),(428,1,1,'Admin added admin security code and mobile number!','2022-01-17 11:05:39'),(429,1,1,'Admin added admin security code and mobile number!','2022-01-17 11:07:13'),(430,1,1,'Admin added admin security code and mobile number!','2022-01-17 11:10:57'),(431,1,1,'Admin added admin security code and mobile number!','2022-01-17 11:12:03'),(432,1,1,'Admin added admin security code and mobile number!','2022-01-17 11:14:41'),(433,1,1,'Admin Added New Student(School ID: 12) Successfully!','2022-01-17 11:21:59'),(434,1,1,'Admin Logout Successfully!','2022-01-17 11:22:52'),(435,1,1,'Admin Login Successfully!','2022-01-17 11:29:49'),(436,1,1,'Admin Backup Data Successfully!','2022-01-17 11:29:56'),(437,1,1,'Admin Backup Data Successfully!','2022-01-17 11:29:59'),(438,1,1,'Admin Logout Successfully!','2022-01-17 11:30:07'),(439,1,1,'Admin Login Successfully!','2022-01-17 11:41:36'),(440,1,1,'Admin Added New Student(School ID: 234) Successfully!','2022-01-17 11:43:09'),(441,1,1,'Admin Updated Student Data (School ID: 12) Successfully!','2022-01-17 11:43:34'),(442,1,1,'Admin Updated Student Data (School ID: 12) Successfully!','2022-01-17 11:43:59'),(443,1,1,'Admin Updated Student Data (School ID: 234) Successfully!','2022-01-17 11:44:19'),(444,1,1,'Admin added admin security code and mobile number!','2022-01-17 11:47:14'),(445,1,1,'Admin Logout Successfully!','2022-01-17 11:48:21'),(446,1,0,'Admin Updated Security Codes, Contact Number and Admin Password!','2022-01-17 11:54:30'),(447,0,0,'Login failed!','2022-01-17 11:55:22'),(448,1,1,'Admin Login Successfully!','2022-01-17 11:55:36'),(449,1,1,'Admin Password Updated Successfully!','2022-01-17 11:56:36'),(450,1,1,'Admin Logout Successfully!','2022-01-17 11:56:54'),(451,0,0,'Login failed!','2022-01-17 11:57:11'),(452,1,1,'Admin Login Successfully!','2022-01-17 11:57:19'),(453,1,1,'Admin Logout Successfully!','2022-01-17 11:57:33'),(454,1,1,'Admin Login Successfully!','2022-01-17 12:00:28'),(455,1,1,'Admin Added New User Successfully!','2022-01-17 12:00:47'),(456,1,1,'Admin Backup Data Successfully!','2022-01-17 12:02:36'),(457,1,1,'Admin Backup Data Successfully!','2022-01-17 12:02:38'),(458,1,1,'Admin Logout Successfully!','2022-01-17 12:02:46'),(459,1,1,'Admin Login Successfully!','2022-01-19 03:05:40'),(460,1,1,'Admin Password Updated Successfully!','2022-01-19 04:01:21'),(461,1,1,'Admin Logout Successfully!','2022-01-19 04:01:44'),(462,0,0,'Login failed!','2022-01-19 04:01:51'),(463,1,1,'Admin Login Successfully!','2022-01-19 04:02:10'),(464,1,1,'Admin Logout Successfully!','2022-01-19 04:02:16'),(465,1,1,'Admin Login Successfully!','2022-01-19 04:02:32'),(466,1,1,'Admin Password Updated Successfully!','2022-01-19 04:03:30'),(467,1,1,'Admin Logout Successfully!','2022-01-19 04:04:00'),(468,0,0,'Login failed!','2022-01-19 04:04:08'),(469,0,0,'Login failed!','2022-01-19 04:04:17'),(470,0,0,'Login failed!','2022-01-19 04:04:25'),(471,1,1,'Admin Login Successfully!','2022-01-19 04:05:29'),(472,1,1,'Admin Logout Successfully!','2022-01-19 04:06:04'),(473,1,1,'Admin Login Successfully!','2022-01-19 04:16:51'),(474,1,1,'Admin Deleted User (User ID: 34) Successfully!','2022-01-19 04:16:59'),(475,1,1,'Admin Updated User (User ID: 3) Successfully!','2022-01-19 04:17:13'),(476,1,1,'Admin Updated User (User ID: 21) Successfully!','2022-01-19 04:17:20'),(477,1,1,'Admin Updated User (User ID: 3) Successfully!','2022-01-19 04:17:25'),(478,1,1,'Admin Updated User (User ID: 2) Successfully!','2022-01-19 04:17:36'),(479,1,1,'Admin Logout Successfully!','2022-01-19 04:17:57'),(480,1,1,'Admin Login Successfully!','2022-01-19 04:21:51'),(481,1,1,'Admin Password Updated Successfully!','2022-01-19 04:23:05'),(482,1,1,'Admin Logout Successfully!','2022-01-19 04:23:52'),(483,0,0,'Login failed!','2022-01-19 04:24:02'),(484,1,1,'Admin Login Successfully!','2022-01-19 04:24:15'),(485,1,1,'Admin Logout Successfully!','2022-01-19 04:24:24'),(486,1,1,'Admin Login Successfully!','2022-01-19 04:29:00'),(487,1,1,'Admin Password Updated Successfully!','2022-01-19 04:30:04'),(488,1,1,'Admin trying to upload invalid sql file!','2022-01-19 09:06:33'),(489,1,1,'Admin Restoring Database(SQL) was not Success!','2022-01-19 09:06:55'),(490,1,1,'Admin Added New Section/Strand (Section/Strand: Rizal) Successfully!','2022-01-19 09:07:33'),(491,1,1,'Admin Updated Section/Strand (ID: 9)!','2022-01-19 09:07:48'),(492,1,1,'Admin Deleted Section/Strand (ID: 10) Successfully!','2022-01-19 09:07:55'),(493,1,1,'Admin Updated Official/President Name Successfully!','2022-01-19 09:08:29'),(494,1,1,'Admin Updated Official/President Name Successfully!','2022-01-19 09:08:37'),(495,1,1,'Admin Updated Official/President Name Successfully!','2022-01-19 09:08:41'),(496,1,1,'Admin Logout Successfully!','2022-01-19 09:11:13'),(497,1,1,'Admin Login Successfully!','2022-01-19 09:13:44'),(498,1,1,'Admin Logout Successfully!','2022-01-19 09:14:48'),(499,0,0,'Login failed!','2022-01-19 09:20:51'),(500,1,1,'Admin Login Successfully!','2022-01-19 09:20:59'),(501,1,1,'Admin added admin security code and mobile number!','2022-01-19 09:22:33'),(502,1,1,'Admin Added New Student(School ID: 12) Successfully!','2022-01-19 09:28:47'),(503,1,1,'Admin Added New Student(School ID: 123) Successfully!','2022-01-19 09:30:39'),(504,1,1,'Admin Updated Student Data (School ID: 123) Successfully!','2022-01-19 09:32:15'),(505,1,1,'Admin Updated Student Image (School ID: ) Successfully!','2022-01-19 09:32:38'),(506,1,1,'Admin Updated Student Data (School ID: 12) Successfully!','2022-01-19 09:34:58'),(507,1,1,'Admin Updated Student Data (School ID: 12) Successfully!','2022-01-19 09:35:18'),(508,1,1,'Admin Updated Student Status (STATUS: 1)!','2022-01-19 09:36:47'),(509,1,1,'Admin Updated Student Data (School ID: 12) Successfully!','2022-01-19 09:37:14'),(510,1,1,'Admin Updated Student Data (School ID: 12) Successfully!','2022-01-19 09:37:32'),(511,1,1,'Admin Deleted Student Data (School ID: 12) Successfully!','2022-01-19 09:38:23'),(512,1,1,'Admin Added New User Successfully!','2022-01-19 09:40:26'),(513,1,1,'Admin Added New User Successfully!','2022-01-19 09:40:46'),(514,1,1,'Admin Added New User Successfully!','2022-01-19 09:41:03'),(515,1,1,'Admin Updated User (User ID: 37) Successfully!','2022-01-19 09:41:16'),(516,1,1,'Admin Deleted User (User ID: 37) Successfully!','2022-01-19 09:41:26'),(517,1,1,'Admin Deleted User (User ID: 36) Successfully!','2022-01-19 09:41:30'),(518,1,1,'Admin Deleted User (User ID: 35) Successfully!','2022-01-19 09:41:33'),(519,1,1,'Admin Password Updated Successfully!','2022-01-19 09:44:25'),(520,1,1,'Admin Logout Successfully!','2022-01-19 09:44:33'),(521,0,0,'Login failed!','2022-01-19 09:44:44'),(522,1,1,'Admin Login Successfully!','2022-01-19 09:44:55'),(523,1,1,'Admin Added New Section/Strand (Section/Strand: Aguinaldo) Successfully!','2022-01-19 09:45:21'),(524,1,1,'Admin Updated Section/Strand (ID: 9)!','2022-01-19 09:45:33'),(525,1,1,'Admin Deleted Section/Strand (ID: 11) Successfully!','2022-01-19 09:45:40'),(526,1,1,'Admin Updated Official/President Name Successfully!','2022-01-19 09:46:15'),(527,1,1,'Admin Updated Official/President Name Successfully!','2022-01-19 09:46:20');
/*!40000 ALTER TABLE `tbl_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_official`
--

DROP TABLE IF EXISTS `tbl_official`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_official` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_official`
--

LOCK TABLES `tbl_official` WRITE;
/*!40000 ALTER TABLE `tbl_official` DISABLE KEYS */;
INSERT INTO `tbl_official` VALUES (1,'Tita G. Garrido','2021-11-22 03:50:35');
/*!40000 ALTER TABLE `tbl_official` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_record`
--

DROP TABLE IF EXISTS `tbl_record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stud_id` varchar(255) NOT NULL,
  `time_inn` varchar(255) NOT NULL,
  `time_out` varchar(255) DEFAULT NULL,
  `log_date` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `gate` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_record`
--

LOCK TABLES `tbl_record` WRITE;
/*!40000 ALTER TABLE `tbl_record` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_student`
--

DROP TABLE IF EXISTS `tbl_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_student` (
  `id_no` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` varchar(11) NOT NULL,
  `school_year` varchar(16) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) NOT NULL,
  `ext_name` varchar(50) DEFAULT NULL,
  `gender` varchar(6) NOT NULL,
  `bod` date NOT NULL,
  `grade` varchar(2) NOT NULL,
  `section` varchar(50) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `img` varchar(2000) NOT NULL,
  `status` int(1) NOT NULL,
  `date_active` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_no`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_student`
--

LOCK TABLES `tbl_student` WRITE;
/*!40000 ALTER TABLE `tbl_student` DISABLE KEYS */;
INSERT INTO `tbl_student` VALUES (66,'123','2022-2023','Junmark','M','Sy','Jr','Female','2003-04-02','12','Qwertyp','09552938450','Purok 1, Agay-ayan','../student_images/Junmark M Sy Jr.jpeg',1,'2022-01-19');
/*!40000 ALTER TABLE `tbl_student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user` (
  `id_no` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `gate` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id_no`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (1,'admin','b04ea3e6d96502e7fb5fc48dc75db0db',1,NULL),(2,'staff','f09e2fa7b19117d5b6637dcc6388fffa',2,NULL),(3,'user','448ddd517d3abb70045aea6929f02367',3,'1'),(21,'user1','448ddd517d3abb70045aea6929f02367',3,'2');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-19 17:47:06
