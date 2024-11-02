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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_course_section`
--

LOCK TABLES `tbl_course_section` WRITE;
/*!40000 ALTER TABLE `tbl_course_section` DISABLE KEYS */;
INSERT INTO `tbl_course_section` VALUES (1,'TVL','2021-09-22 07:05:15'),(2,'Sampaguita','2021-09-22 07:05:15');
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
  `description` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_history`
--

LOCK TABLES `tbl_history` WRITE;
/*!40000 ALTER TABLE `tbl_history` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_record`
--

LOCK TABLES `tbl_record` WRITE;
/*!40000 ALTER TABLE `tbl_record` DISABLE KEYS */;
INSERT INTO `tbl_record` VALUES (30,'f7177163c833dff4b38fc8d2872f1ec6','11:11:56pm','11:28:28pm','2021-10-20',1,2),(31,'17e62166fc8586dfa4d1bc0e1742c08b','11:14:09pm','11:29:05pm','2021-10-21',1,2),(32,'17e62166fc8586dfa4d1bc0e1742c08b','11:14:09am','11:49:05am','2021-10-22',1,2),(35,'f7177163c833dff4b38fc8d2872f1ec6','09:11:56am','11:11:56am','2021-10-22',1,2),(43,'67c6a1e7ce56d3d6fa748ab6d9af3fd7','08:12:42am','09:17:11am','2021-11-23',1,2),(44,'67c6a1e7ce56d3d6fa748ab6d9af3fd7','08:27:09am','09:29:56am','2021-11-23',1,2),(79,'a1d0c6e83f027327d8461063f4ac58a6','05:19:46pm','05:21:19pm','2021-11-25',1,2),(80,'a1d0c6e83f027327d8461063f4ac58a6','05:25:20pm','05:25:54pm','2021-11-25',1,2),(81,'a1d0c6e83f027327d8461063f4ac58a6','05:27:35pm','05:28:04pm','2021-11-25',1,2),(82,'a1d0c6e83f027327d8461063f4ac58a6','05:29:03pm','05:29:40pm','2021-11-25',1,2);
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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_student`
--

LOCK TABLES `tbl_student` WRITE;
/*!40000 ALTER TABLE `tbl_student` DISABLE KEYS */;
INSERT INTO `tbl_student` VALUES (42,'2107327','Rolando','Iyo','Barbadillo','Jr','Female','2021-10-21','10','TVL','09559387210','Magallanes Gingoog City, Brgy 24','../student_images/Rolando Iyo Barbadillo Jr.jpeg',0,'2021-04-21'),(43,'2107328','Jun Michael','','Timon','','Male','2019-11-21','12','Sampaguita','09552938453','Purok 1, Agay-ayan','../student_images/Jun Michael  Timon .jpeg',0,'2021-04-21'),(44,'2107329','Kent','','Timon','','Male','2021-10-21','6','Sampaguita','09552938452','Gingoog City','../student_images/Kent  Timon .jpeg',0,'2021-04-21'),(45,'2107324','Ohmbe','Abao','Timon','','Female','2000-01-18','4','TVL','09654007148','Bohol Welding Shop','../student_images/Ohmbe Abao Timon .jpeg',0,'2021-04-21'),(46,'2107323','Fredixbeeee','Darajodararadadaeeee','Montieeee','','Female','2021-11-22','4','Sampaguita','09530962250','Purok 1, Agay-ayan G.C','../student_images/Fredixbeeee Darajodararadadaeeee Montieeee .jpeg',1,NULL),(49,'2103425','Sample','Sample','Sample','','Female','2021-11-30','12','Sampaguita','09559387210','Magallanes Gingoog City, Brgy 24','../student_images/Sample Sample Sample .jpeg',1,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (1,'admin','0192023a7bbd73250516f069df18b500',1,NULL),(2,'staff','de9bf5643eabf80f4a56fda3bbb84483',2,NULL),(3,'user','6ad14ba9986e3615423dfca256d04e3f',3,'1'),(21,'user1','6ad14ba9986e3615423dfca256d04e3f',3,'2');
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

-- Dump completed on 2021-12-04 22:44:34
