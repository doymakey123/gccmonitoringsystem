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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_course_section`
--

LOCK TABLES `tbl_course_section` WRITE;
/*!40000 ALTER TABLE `tbl_course_section` DISABLE KEYS */;
INSERT INTO `tbl_course_section` VALUES (1,'TVL','2021-09-22 07:05:15'),(2,'Sampaguita','2021-09-22 07:05:15'),(7,'Jose','2021-12-14 12:57:31');
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
) ENGINE=InnoDB AUTO_INCREMENT=284 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_history`
--

LOCK TABLES `tbl_history` WRITE;
/*!40000 ALTER TABLE `tbl_history` DISABLE KEYS */;
INSERT INTO `tbl_history` VALUES (54,1,1,'Admin Login Successfully!','2021-12-08 10:35:03'),(55,3,3,'User Logout Successfully!','2021-12-08 10:44:35'),(56,3,21,'User Login Successfully!','2021-12-08 10:44:43'),(57,3,21,'User Logout Successfully!','2021-12-08 10:45:37'),(58,3,3,'User Login Successfully!','2021-12-08 10:59:13'),(59,3,3,'Student Time In Successfully, School ID: (2103425) !','2021-12-08 10:59:28'),(60,3,3,'Student Trying to Time Out in Gate 2, School ID: (2103425) !','2021-12-08 11:00:21'),(61,3,3,'Student Trying to Time Out in Gate 2, School ID: (2103425) !','2021-12-08 11:01:02'),(62,3,3,'User Logout Successfully!','2021-12-08 11:02:16'),(63,3,21,'User Login Successfully!','2021-12-08 11:02:22'),(64,3,21,'Student Time Out Successfully, School ID: (2103425) !','2021-12-08 11:02:31'),(65,3,21,'Student Trying to Time In in Gate 2, School ID: (2103425) !','2021-12-08 11:02:56'),(66,1,1,'Admin Logout Successfully!','2021-12-08 11:08:36'),(67,3,21,'User Logout Successfully!','2021-12-08 11:13:37'),(68,1,1,'Admin Login Successfully!','2021-12-08 11:40:43'),(69,1,1,'Admin Logout Successfully!','2021-12-08 13:10:05'),(70,1,1,'Admin Login Successfully!','2021-12-08 13:12:48'),(71,1,1,'Admin Logout Successfully!','2021-12-08 13:55:42'),(72,3,3,'User Login Successfully!','2021-12-08 13:55:48'),(73,1,1,'Admin Login Successfully!','2021-12-08 13:56:43'),(74,3,3,'Student Time In Successfully, School ID: (2107321) !','2021-12-08 13:57:06'),(75,3,3,'Student Trying to Time Out in Gate 1, School ID: (2107321) !','2021-12-08 13:57:11'),(76,1,1,'Admin Logout Successfully!','2021-12-08 13:57:42'),(77,3,3,'User Logout Successfully!','2021-12-08 14:02:56'),(78,1,1,'Admin Login Successfully!','2021-12-08 15:32:18'),(79,1,1,'Admin Backup Data Successfully!','2021-12-08 15:39:03'),(80,1,1,'Admin Backup Data Successfully!','2021-12-08 16:29:09'),(81,1,1,'Admin Logout Successfully!','2021-12-08 16:29:15'),(82,1,1,'Admin Login Successfully!','2021-12-10 04:41:18'),(83,1,1,'Admin Added New Student(School ID: 21023) Successfully!','2021-12-10 05:53:03'),(84,1,1,'Admin Updated Student Data (School ID: 21023) Successfully!','2021-12-10 06:00:04'),(85,1,1,'Admin Updated Student Data (School ID: 2107321) Successfully!','2021-12-10 06:00:22'),(86,1,1,'Admin Updated Student Status (1)!','2021-12-10 06:01:02'),(87,1,1,'Admin Updated Student Status (1)!','2021-12-10 06:01:31'),(88,1,1,'Admin Updated Student Data (School ID: 21023) Successfully!','2021-12-10 06:01:54'),(89,1,1,'Admin Updated Student Status (1)!','2021-12-10 06:04:41'),(90,1,1,'Admin Updated Student Data (School ID: 2107321) Successfully!','2021-12-10 06:05:00'),(91,1,1,'Admin Updated Student Status (1)!','2021-12-10 06:05:18'),(92,1,1,'Admin Updated Student Data (School ID: 21023) Successfully!','2021-12-10 06:05:39'),(93,1,1,'Admin Updated Student Status (1)!','2021-12-10 06:05:59'),(94,1,1,'Admin Updated Student Data (School ID: 21023) Successfully!','2021-12-10 06:09:21'),(95,1,1,'Admin Updated Student Data (School ID: 2107321) Successfully!','2021-12-10 06:09:43'),(96,1,1,'Admin Updated Student Data (School ID: 21023) Successfully!','2021-12-10 06:09:57'),(97,1,1,'Admin Updated Student Data (School ID: 21023) Successfully!','2021-12-10 06:18:12'),(98,1,1,'Admin Updated Student Data (School ID: 2107321) Successfully!','2021-12-10 07:31:43'),(99,1,1,'Admin Logout Successfully!','2021-12-10 07:35:50'),(100,1,1,'Admin Login Successfully!','2021-12-10 07:35:59'),(101,1,1,'Admin Backup Data Successfully!','2021-12-10 07:36:06'),(102,1,1,'Admin Logout Successfully!','2021-12-10 07:36:14'),(103,1,1,'Admin Login Successfully!','2021-12-10 08:21:22'),(104,1,1,'Admin Backup Data Successfully!','2021-12-10 08:30:39'),(105,1,1,'Admin Backup Data Successfully!','2021-10-10 08:31:55'),(106,1,1,'Admin Updated Student Data (School ID: 2103425) Successfully!','2021-12-10 08:35:17'),(107,1,1,'Admin Updated Student Data (School ID: 2103425) Successfully!','2021-12-10 08:35:39'),(108,1,1,'Admin Updated Student Status (STATUS: 1)!','2021-12-10 08:50:39'),(109,1,1,'Admin Updated Student Status (STATUS: 1)!','2021-12-10 08:50:45'),(110,1,1,'Admin Updated Student Data (School ID: 2107321) Successfully!','2021-12-10 08:50:57'),(111,1,1,'Admin Updated Student Data (School ID: 21023) Successfully!','2021-12-10 08:51:06'),(112,1,1,'Admin Updated Student Data (School ID: 2107321) Successfully!','2021-12-10 09:05:46'),(113,1,1,'Admin Updated Student Data (School ID: 21023) Successfully!','2021-12-10 09:06:03'),(114,1,1,'Admin Added New Student(School ID: 2100000) Successfully!','2021-12-10 09:20:54'),(115,1,1,'Admin Updated Student Status (STATUS: 1)!','2021-12-10 09:31:22'),(116,1,1,'Admin Updated Student Status (STATUS: 1)!','2021-12-10 09:31:27'),(117,1,1,'Admin Updated Student Data (School ID: 2100000) Successfully!','2021-12-10 09:31:51'),(118,1,1,'Admin Updated Student Data (School ID: 2100000) Successfully!','2021-12-10 09:32:18'),(119,1,1,'Admin Updated Student Data (School ID: 21023) Successfully!','2021-12-10 09:33:39'),(120,1,1,'Admin Updated Student Data (School ID: 2100000) Successfully!','2021-12-10 09:34:27'),(121,1,1,'Admin Updated Student Data (School ID: 2100000) Successfully!','2021-12-10 09:37:00'),(122,1,1,'Admin Updated Student Data (School ID: 2100000) Successfully!','2021-12-10 09:37:09'),(123,1,1,'Admin Updated Student Data (School ID: 21023) Successfully!','2021-12-10 09:37:27'),(124,1,1,'Admin Updated Student Data (School ID: 2107323) Successfully!','2021-12-10 09:38:48'),(125,1,1,'Admin Updated Student Data (School ID: 2107323) Successfully!','2021-12-10 09:40:16'),(126,1,1,'Admin Updated Student Data (School ID: 2107329) Successfully!','2021-12-10 09:41:36'),(127,1,1,'Admin Updated Student Data (School ID: 2107329) Successfully!','2021-12-10 09:42:22'),(128,1,1,'Admin Updated Student Data (School ID: 2107328) Successfully!','2021-12-10 09:43:19'),(129,1,1,'Admin Updated Student Data (School ID: 2100000) Successfully!','2021-12-10 09:45:44'),(130,1,1,'Admin Updated Student Data (School ID: 2100000) Successfully!','2021-12-10 09:46:32'),(131,1,1,'Admin Updated Student Data (School ID: 2100000) Successfully!','2021-12-10 09:46:49'),(132,1,1,'Admin Logout Successfully!','2021-12-10 09:49:51'),(133,1,1,'Admin Login Successfully!','2021-12-10 09:49:57'),(134,1,1,'Admin Updated Student Data (School ID: 2100000) Successfully!','2021-12-10 09:56:19'),(135,1,1,'Admin Updated Student Data (School ID: 2100000) Successfully!','2021-12-10 09:57:24'),(136,1,1,'Admin Updated Student Data (School ID: 2107321) Successfully!','2021-12-10 09:57:31'),(137,1,1,'Admin Updated Student Data (School ID: 2100000) Successfully!','2021-12-10 09:57:44'),(138,1,1,'Admin Updated Student Data (School ID: 2107328) Successfully!','2021-12-10 09:58:01'),(139,1,1,'Admin Updated Student Data (School ID: 2107329) Successfully!','2021-12-10 09:58:30'),(140,1,1,'Admin Updated Student Data (School ID: 2100000) Successfully!','2021-12-10 09:59:16'),(141,1,1,'Admin Deleted User (User ID: 22) Successfully!','2021-12-10 10:17:30'),(142,1,1,'Admin Added New User Successfully!','2021-12-10 10:18:20'),(143,1,1,'Admin Added New User Successfully!','2021-12-10 10:18:34'),(144,1,1,'Admin Deleted User (User ID: 23) Successfully!','2021-12-10 10:19:13'),(145,1,1,'Admin Deleted User (User ID: 24) Successfully!','2021-12-10 10:19:36'),(146,1,1,'Admin Deleted Student Data (School ID: 2103425) Successfully!','2021-12-10 10:50:40'),(147,1,1,'Admin Deleted Student Data (School ID: 2100000) Successfully!','2021-12-10 10:50:46'),(148,1,1,'Admin Added New Section/Strand (Section/Strand: Rizal) Successfully!','2021-12-10 10:59:04'),(149,1,1,'Admin Deleted Section/Strand (ID: 6) Successfully!','2021-12-10 11:07:04'),(150,1,1,'Admin Updated Student Data (School ID: 21023) Successfully!','2021-12-10 12:18:42'),(151,1,1,'Admin Deleted Student Data (School ID: 21023) Successfully!','2021-12-10 12:19:25'),(152,1,1,'Admin Updated Student Data (School ID: 2107321) Successfully!','2021-12-10 12:20:51'),(153,1,1,'Admin Deleted Student Data (School ID: 2107321) Successfully!','2021-12-10 12:20:59'),(154,1,1,'Admin Updated Student Data (School ID: 2107328) Successfully!','2021-12-10 12:22:56'),(155,1,1,'Admin Updated Student Data (School ID: 2107323) Successfully!','2021-12-10 12:23:39'),(156,3,3,'User Login Successfully!','2021-12-10 12:24:09'),(157,3,3,'User Login Successfully!','2021-12-10 12:24:44'),(158,3,3,'User Logout Successfully!','2021-12-10 12:24:55'),(159,1,1,'Admin Login Successfully!','2021-12-10 12:25:03'),(160,3,3,'Student Time In Successfully, School ID: (2107323) !','2021-12-10 12:25:26'),(161,3,3,'Student Trying to Time Out in Gate 1, School ID: (2107323) !','2021-12-10 12:26:00'),(162,3,3,'User Logout Successfully!','2021-12-10 12:26:06'),(163,3,21,'User Login Successfully!','2021-12-10 12:26:12'),(164,3,21,'Student Time Out Successfully, School ID: (2107323) !','2021-12-10 12:26:22'),(165,3,21,'Student Trying to Time In in Gate 2, School ID: (2107323) !','2021-12-10 12:26:32'),(166,3,21,'User Logout Successfully!','2021-12-10 12:26:37'),(167,3,3,'User Login Successfully!','2021-12-10 12:26:45'),(168,3,3,'Student Time In Successfully, School ID: (2107323) !','2021-12-10 12:26:52'),(169,3,3,'Student Trying to Time Out in Gate 1, School ID: (2107323) !','2021-12-10 12:26:57'),(170,1,1,'Admin Deleted Student Data (School ID: 2107323) Successfully!','2021-12-10 12:27:20'),(171,3,3,'Student/Person Trying to Scan Invalid QR Code!','2021-12-10 12:28:15'),(172,3,3,'Student/Person Trying to Scan Invalid QR Code!','2021-12-10 12:28:24'),(173,3,3,'User Logout Successfully!','2021-12-10 12:28:47'),(174,1,1,'Admin Deleted Student Data (School ID: 2107327) Successfully!','2021-12-10 12:30:44'),(175,1,1,'Admin Deleted Student Data (School ID: 2107328) Successfully!','2021-12-10 12:34:26'),(176,1,1,'Admin Updated Student Data (School ID: 2107329) Successfully!','2021-12-10 12:37:45'),(177,1,1,'Admin Deleted Student Data (School ID: 2107329) Successfully!','2021-12-10 12:50:36'),(178,1,1,'Admin Added New Student(School ID: 210) Successfully!','2021-12-10 12:52:26'),(179,3,3,'User Login Successfully!','2021-12-10 12:52:38'),(180,3,3,'Student Time In Successfully, School ID: (210) !','2021-12-10 12:52:54'),(181,3,3,'Student Trying to Time Out in Gate 1, School ID: (210) !','2021-12-10 12:52:59'),(182,3,3,'User Logout Successfully!','2021-12-10 12:53:05'),(183,3,21,'User Login Successfully!','2021-12-10 12:53:16'),(184,3,21,'Student Time Out Successfully, School ID: (210) !','2021-12-10 12:53:23'),(185,3,21,'Student Trying to Time In in Gate 2, School ID: (210) !','2021-12-10 12:53:29'),(186,3,21,'User Logout Successfully!','2021-12-10 12:53:35'),(187,3,3,'User Login Successfully!','2021-12-10 12:53:42'),(188,3,3,'Student Time In Successfully, School ID: (210) !','2021-12-10 12:53:52'),(189,3,3,'Student Trying to Time Out in Gate 1, School ID: (210) !','2021-12-10 12:53:57'),(190,3,3,'User Logout Successfully!','2021-12-10 12:54:03'),(191,1,1,'Admin Updated Student Data (School ID: 210) Successfully!','2021-12-10 12:55:35'),(192,1,1,'Admin Deleted Student Data (School ID: 210) Successfully!','2021-12-10 12:55:41'),(193,1,1,'Admin Backup Data Successfully!','2021-12-10 12:59:19'),(194,1,1,'Admin Backup Data Successfully!','2021-12-11 12:59:34'),(195,1,1,'Admin Logout Successfully!','2021-12-10 13:04:58'),(196,1,1,'Admin Login Successfully!','2021-12-14 12:55:42'),(197,1,1,'Admin Added New Section/Strand (Section/Strand: Jose) Successfully!','2021-12-14 12:57:31'),(198,1,1,'Admin Backup Data Successfully!','2021-12-14 12:58:28'),(199,1,1,'Admin Logout Successfully!','2021-12-14 12:58:48'),(200,2,2,'Staff Login Successfully!','2021-12-14 13:04:23'),(201,2,2,'Staff Logout Successfully!','2021-12-14 13:05:32'),(202,2,2,'Staff Login Successfully!','2021-12-14 13:29:42'),(203,1,2,'Admin Added New Student(School ID: 123) Successfully!','2021-12-14 13:30:49'),(204,2,2,'Staff Logout Successfully!','2021-12-14 13:33:52'),(205,3,3,'User Login Successfully!','2021-12-14 13:33:56'),(206,3,3,'User Logout Successfully!','2021-12-14 13:34:10'),(207,2,2,'Staff Login Successfully!','2021-12-14 13:38:41'),(208,1,2,'Admin Updated Student Data (School ID: 123) Successfully!','2021-12-14 13:42:15'),(209,2,2,'Staff Logout Successfully!','2021-12-14 14:00:14'),(210,1,1,'Admin Login Successfully!','2021-12-14 14:00:20'),(211,1,1,'Admin Logout Successfully!','2021-12-14 14:01:04'),(212,3,3,'User Login Successfully!','2021-12-14 14:01:08'),(213,3,3,'User Logout Successfully!','2021-12-14 14:01:25'),(214,1,1,'Admin Login Successfully!','2021-12-14 14:01:31'),(215,1,1,'Admin Backup Data Successfully!','2021-12-14 14:01:41'),(216,1,1,'Admin Backup Data Successfully!','2021-12-14 14:02:05'),(217,1,1,'Admin Backup Data Successfully!','2021-12-14 14:02:09'),(218,1,1,'Admin Logout Successfully!','2021-12-14 14:02:18'),(219,1,1,'Admin Login Successfully!','2021-12-15 12:41:24'),(220,1,1,'Admin Logout Successfully!','2021-12-15 12:41:52'),(221,1,1,'Admin Login Successfully!','2021-12-15 13:33:54'),(222,1,1,'Admin Logout Successfully!','2021-12-15 13:34:05'),(223,1,1,'Admin Login Successfully!','2022-01-04 03:02:09'),(224,1,1,'Admin Updated Student Status (STATUS: 1)!','2022-01-04 03:02:26'),(225,1,1,'Admin Updated Student Data (School ID: 123) Successfully!','2022-01-04 03:02:43'),(226,1,1,'Admin Logout Successfully!','2022-01-04 03:03:22'),(227,3,3,'User Login Successfully!','2022-01-04 03:03:30'),(228,3,3,'Student Time In Successfully, School ID: (123) !','2022-01-04 03:03:49'),(229,3,3,'User Logout Successfully!','2022-01-04 03:04:36'),(230,1,1,'Admin Login Successfully!','2022-01-04 13:52:54'),(231,1,1,'Admin Logout Successfully!','2022-01-04 15:03:05'),(232,3,3,'User Login Successfully!','2022-01-04 15:03:11'),(233,1,1,'Admin Login Successfully!','2022-01-04 15:04:06'),(234,3,3,'Student Trying to Time Out in Gate 1, School ID: (123) !','2022-01-04 15:04:22'),(235,3,3,'Student Time In Successfully, School ID: (123) !','2022-01-04 15:04:58'),(236,3,3,'User Logout Successfully!','2022-01-04 15:05:08'),(237,3,21,'User Login Successfully!','2022-01-04 15:05:26'),(238,3,21,'Student Time Out Successfully, School ID: (123) !','2022-01-04 15:05:37'),(239,3,21,'Student Trying to Time In in Gate 2, School ID: (123) !','2022-01-04 15:05:42'),(240,3,21,'User Logout Successfully!','2022-01-04 15:06:26'),(241,1,1,'Admin Login Successfully!','2022-01-04 15:06:32'),(242,1,1,'Admin Backup Data Successfully!','2022-01-04 15:13:41'),(243,1,1,'Admin Updated Student Data (School ID: 123) Successfully!','2022-01-04 15:19:52'),(244,1,1,'Admin Added New Student(School ID: 434) Successfully!','2022-01-04 15:23:57'),(245,1,1,'Admin Logout Successfully!','2022-01-04 15:49:07'),(246,1,1,'Admin Login Successfully!','2022-01-06 10:07:58'),(247,1,1,'Admin Logout Successfully!','2022-01-06 10:15:30'),(248,1,1,'Admin Login Successfully!','2022-01-06 10:28:29'),(249,1,1,'Admin Password Updated Successfully!','2022-01-06 10:48:50'),(250,1,1,'Admin Logout Successfully!','2022-01-06 10:49:00'),(251,0,0,'Login failed!','2022-01-06 10:49:06'),(252,1,1,'Admin Login Successfully!','2022-01-06 10:49:13'),(253,1,1,'Admin Password Updated Successfully!','2022-01-06 10:49:33'),(254,1,1,'Admin Added New User Successfully!','2022-01-06 10:50:55'),(255,1,1,'Admin Deleted User (User ID: 25) Successfully!','2022-01-06 10:51:06'),(256,1,1,'Admin Added New User Successfully!','2022-01-06 10:51:53'),(257,1,1,'Admin Updated User (User ID: 26) Successfully!','2022-01-06 10:52:19'),(258,1,1,'Admin Deleted User (User ID: 26) Successfully!','2022-01-06 10:53:26'),(259,1,1,'Admin Logout Successfully!','2022-01-06 10:54:20'),(260,2,2,'Staff Login Successfully!','2022-01-06 10:54:28'),(261,2,2,'Staff Password Updated Successfully!','2022-01-06 10:57:46'),(262,2,2,'Staff Logout Successfully!','2022-01-06 10:58:32'),(263,3,3,'User Login Successfully!','2022-01-06 10:58:36'),(264,3,3,'User Password Updated Successfully!','2022-01-06 10:59:26'),(265,3,3,'User Logout Successfully!','2022-01-06 10:59:40'),(266,1,1,'Admin Login Successfully!','2022-01-06 11:02:46'),(267,1,1,'Admin Added New Student(School ID: 12121) Successfully!','2022-01-06 11:11:12'),(268,1,1,'Admin Updated Student Data (School ID: 12121) Successfully!','2022-01-06 11:16:04'),(269,1,1,'Admin Updated Student Data (School ID: 12121) Successfully!','2022-01-06 11:16:54'),(270,1,1,'Admin Updated Student Data (School ID: 12121) Successfully!','2022-01-06 11:17:17'),(271,1,1,'Admin Updated Student Data (School ID: 12121) Successfully!','2022-01-06 11:23:20'),(272,1,1,'Admin Updated Student Data (School ID: 12121) Successfully!','2022-01-06 11:27:51'),(273,1,1,'Admin Updated Student Data (School ID: 12121) Successfully!','2022-01-06 11:36:45'),(274,1,1,'Admin Updated Student Data (School ID: 12121) Successfully!','2022-01-06 11:38:15'),(275,1,1,'Admin Updated Student Data (School ID: 12121) Successfully!','2022-01-06 11:38:32'),(276,1,1,'Admin Updated Student Data (School ID: 12121) Successfully!','2022-01-06 11:39:20'),(277,1,1,'Admin Updated Student Data (School ID: 12121) Successfully!','2022-01-06 11:51:31'),(278,1,1,'Admin Updated Student Data (School ID: 12121) Successfully!','2022-01-06 12:09:17'),(279,1,1,'Admin Updated Student Data (School ID: 12121) Successfully!','2022-01-06 12:10:01'),(280,1,1,'Admin Logout Successfully!','2022-01-06 12:11:53'),(281,1,1,'Admin Login Successfully!','2022-01-06 12:16:02'),(282,1,1,'Admin Logout Successfully!','2022-01-06 12:16:08'),(283,1,1,'Admin Login Successfully!','2022-01-06 12:16:34');
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
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_record`
--

LOCK TABLES `tbl_record` WRITE;
/*!40000 ALTER TABLE `tbl_record` DISABLE KEYS */;
INSERT INTO `tbl_record` VALUES (91,'72b32a1f754ba1c09b3695e0cb6cde7f','11:04:57pm','11:05:37pm','2022-01-04',1,2);
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
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_student`
--

LOCK TABLES `tbl_student` WRITE;
/*!40000 ALTER TABLE `tbl_student` DISABLE KEYS */;
INSERT INTO `tbl_student` VALUES (57,'123','2021-2022','Qaz','Qaz','Qaz','I','Male','2020-12-31','1','Jose','09559387210','Gingoog City','../student_images/Qaz Qaz Qaz I.jpeg',0,'2022-01-04'),(58,'434','2021-2022','Sagrado','','Company','','Male','2022-01-04','2','TVL','09559387210','Magallanes Gingoog City, Brgy 24','../student_images/Sagrado  Company .jpeg',1,NULL),(59,'12121','2021-2022','Qwhh','M','Timon','','Female','2022-01-06','6','Sampaguita','09559387210','Purok 1, Agay-ayan','../student_images/Qwhh M Timon .jpeg',1,'2022-01-06');
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (1,'admin','0e7517141fb53f21ee439b355b5a1d0a',1,NULL),(2,'staff','f09e2fa7b19117d5b6637dcc6388fffa',2,NULL),(3,'user','448ddd517d3abb70045aea6929f02367',3,'1'),(21,'user1','6ad14ba9986e3615423dfca256d04e3f',3,'2');
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

-- Dump completed on 2022-01-06 20:17:07
