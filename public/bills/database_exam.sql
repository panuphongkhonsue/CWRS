-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: localhost    Database: jirayus
-- ------------------------------------------------------
-- Server version	8.0.32-0ubuntu0.22.04.2

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
-- Table structure for table `business_categories`
--

DROP TABLE IF EXISTS `business_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `business_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `is_for_group_type` tinyint DEFAULT '0' COMMENT 'เป็นข้อมูลสำหรับ user ประเภท นิคม หรือไม่\n0 = ไม่ใช่ ไม่เป็นนิคม\n1 = เป็นข้อมูลสำหรับนิคม',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3 COMMENT='เก็บข้อมูลประเภทของธุรกิจ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `business_categories`
--

LOCK TABLES `business_categories` WRITE;
/*!40000 ALTER TABLE `business_categories` DISABLE KEYS */;
INSERT INTO `business_categories` VALUES (1,'ธุรกิจผลิตและจำหน่ายยานยนต์',0),(2,'ธุรกิจพลังงานและเคมีภัณฑ์',0),(3,'ธุรกิจผลิตและจำหน่ายเครื่องดื่มแอลกอฮอล์',0),(4,'ธุรกิจที่เกี่ยวข้องกับเทคโนโลยีและอุปกรณ์ต่าง',0),(5,'ธุรกิจก่อสร้าง',0),(6,'ธุรกิจการค้าและการเกษตร',0),(7,'ธุรกิจประกันภัย',0),(8,'ธุรกิจการขนส่ง',0),(9,'ธุรกิจอื่นๆ',0),(10,'เกษตรและอุตสาหกรรมอาหาร',1),(11,'สินค้าอุปโภคบริโภค',1),(12,'ธุรกิจการเงิน',1),(13,'สินค้าอุตสาหกรรม',1),(14,'อสังหาริมทรัพย์และก่อสร้าง',1),(15,'ทรัพยากร',1),(16,'บริการ',1),(17,'เทคโนโลยี',1);
/*!40000 ALTER TABLE `business_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `causes_accidents`
--

DROP TABLE IF EXISTS `causes_accidents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `causes_accidents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT 'ชื่อสาเหตุ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COMMENT='ตารางเก็บสาเหตุที่เกิดความเสี่ยงในการใช้รถ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `causes_accidents`
--

LOCK TABLES `causes_accidents` WRITE;
/*!40000 ALTER TABLE `causes_accidents` DISABLE KEYS */;
INSERT INTO `causes_accidents` VALUES (1,'เมาสุรา'),(2,'ขับรถเร็วเกินกำหนด'),(3,'ตัดหน้ากระชั้นชิด'),(4,'ทัศนวิสัยไม่ดี'),(5,'หลับใน'),(6,'ฝ่าฝืนกฎจราจร'),(7,'แซงรถในที่คับขัน'),(8,'โทรศัพท์ขณะขับรถ'),(9,'บรรทุกเกินอัตรา'),(10,'มีสิ่งกีดขวางบนถนน'),(11,'สภาพรถหรืออุปรณ์บกพร่อง');
/*!40000 ALTER TABLE `causes_accidents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `road_safeties`
--

DROP TABLE IF EXISTS `road_safeties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `road_safeties` (
  `id` int NOT NULL AUTO_INCREMENT,
  `us_id` int DEFAULT NULL COMMENT 'สร้างโดยใคร',
  `name` varchar(255) DEFAULT NULL COMMENT 'ชื่อมาตรการ',
  `for_years` year DEFAULT NULL COMMENT 'ประกาศใช้ในปี',
  `introdution` text COMMENT 'ข้อมูลที่มา',
  `objective` text COMMENT 'ข้อมูลวัตถุประสงค์',
  `detail` text COMMENT 'รายละเอียดอื่นๆ เพิ่มเติม',
  PRIMARY KEY (`id`),
  KEY `fk_road_safeties_users1_idx` (`us_id`),
  CONSTRAINT `fk_road_safeties_users1` FOREIGN KEY (`us_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3 COMMENT='ตารางเก็บข้อมูลมาตรการความปลอดภัยในการใช้รถของโรงงานหรือนิคม';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `road_safeties`
--

LOCK TABLES `road_safeties` WRITE;
/*!40000 ALTER TABLE `road_safeties` DISABLE KEYS */;
INSERT INTO `road_safeties` VALUES (1,1,'การตรวจสอบและบำรุงรักษาโครงสร้างถนน',2022,NULL,NULL,NULL),(2,1,'การติดตั้งเครื่องกั้นทาง',2023,NULL,NULL,NULL),(3,2,'การประชุมความร่วมมือกับเจ้าของรถบริษัท',2022,NULL,NULL,NULL),(4,3,'การจัดอบรมการขับขี่ปลอดภัย',2022,NULL,NULL,NULL),(5,2,'การติดตั้งสัญญาณไฟจราจรและสัญญาณไฟเตือนภัย',2023,NULL,NULL,NULL),(6,3,'การตรวจสอบความปลอดภัยของพื้นที่จอดรถ',2023,NULL,NULL,NULL),(7,1,'การติดตั้งระบบกล้องวงจรปิด',2024,NULL,NULL,NULL),(8,4,'การตรวจสอบคุณสมบัติของรถยนต์',2022,NULL,NULL,NULL),(9,4,'การทำความสะอาดและบำรุงรักษาเครื่องจักรและอุปกรณ์',2024,NULL,NULL,NULL),(10,5,'การใช้งานระบบแจ้งเตือนอัตโนมัติเมื่อมีอุบัติเหตุ',2022,NULL,NULL,NULL),(11,1,'การตรวจสอบความเรียบร้อยของเครื่องมือและอุปกรณ์ก่อสร้าง',2021,NULL,NULL,NULL),(12,6,'การพิจารณาอนุมัติการเข้าถึงพื้นที่จอดรถ',2022,NULL,NULL,NULL),(13,5,'การติดตั้งและบำรุงรักษาการทำงานของไฟฉุกเฉิน',2023,NULL,NULL,NULL),(14,7,'การตรวจสอบสภาพแวดล้อมของพื้นที่ในการใช้งานรถ',2022,NULL,NULL,NULL),(15,8,'การบันทึกและตรวจสอบการเดินทางของพนักงาน',2022,NULL,NULL,NULL),(16,9,'การจัดทำแผนการจัดการการจราจรภายในโรงงาน',2022,NULL,NULL,NULL),(17,10,'การติดตั้งเครื่องกั้นและสัญญาณไฟบนทางเข้า-ออกโรงงาน',2023,NULL,NULL,NULL),(18,11,'การจัดการขั้นตอนการเดินทางเพื่อป้องกันอุบัติเหตุ',2023,NULL,NULL,NULL),(19,13,'การตรวจสอบและบำรุงรักษาทางเดินเพลิง',2023,NULL,NULL,NULL),(20,15,'การตรวจสอบความพร้อมใช้งานของรถยนต์',2023,NULL,NULL,NULL);
/*!40000 ALTER TABLE `road_safeties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `road_safety_and_causes_accident`
--

DROP TABLE IF EXISTS `road_safety_and_causes_accident`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `road_safety_and_causes_accident` (
  `rsaca_rs_id` int NOT NULL COMMENT 'ตาราง road_safeties',
  `rsaca_ca_id` int NOT NULL COMMENT 'ตาราง causes_accidents',
  `rsaca_percentage` decimal(11,2) DEFAULT NULL COMMENT 'ร้อยละของความเกิดอุบัติเหตุ',
  PRIMARY KEY (`rsaca_rs_id`,`rsaca_ca_id`),
  KEY `fk_road_safety_and_causes_accident_causes_accidents_idx` (`rsaca_ca_id`),
  CONSTRAINT `fk_road_safety_and_causes_accident_causes_accidents` FOREIGN KEY (`rsaca_ca_id`) REFERENCES `causes_accidents` (`id`),
  CONSTRAINT `fk_road_safety_and_causes_accident_road_safeties1` FOREIGN KEY (`rsaca_rs_id`) REFERENCES `road_safeties` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='ตารางเก็บความสัมพันธ์ในมาตรการและสาเหตุ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `road_safety_and_causes_accident`
--

LOCK TABLES `road_safety_and_causes_accident` WRITE;
/*!40000 ALTER TABLE `road_safety_and_causes_accident` DISABLE KEYS */;
INSERT INTO `road_safety_and_causes_accident` VALUES (1,2,35.00),(1,4,27.00),(1,5,6.00),(1,9,20.00),(1,10,12.00),(2,1,29.00),(2,3,47.00),(2,7,14.00),(2,9,7.00),(2,10,3.00),(3,1,9.00),(3,4,9.00),(3,6,12.00),(3,7,52.00),(3,10,18.00),(4,2,3.00),(4,3,36.00),(4,6,24.00),(4,9,35.00),(4,11,2.00),(5,1,16.00),(5,3,25.00),(5,5,12.00),(5,7,17.00),(5,9,30.00),(6,1,20.00),(6,4,30.00),(6,7,15.00),(6,9,25.00),(6,10,10.00),(7,3,20.00),(7,5,15.00),(7,7,10.00),(7,9,30.00),(7,11,25.00),(8,2,10.00),(8,4,30.00),(8,6,25.00),(8,8,15.00),(8,10,20.00),(9,1,30.00),(9,3,15.00),(9,7,20.00),(9,8,25.00),(9,11,10.00),(10,1,15.00),(10,2,10.00),(10,5,25.00),(10,6,20.00),(10,9,30.00),(11,2,20.00),(11,6,30.00),(11,8,10.00),(11,9,15.00),(11,10,25.00),(12,1,30.00),(12,4,20.00),(12,6,25.00),(12,7,10.00),(12,9,15.00),(13,1,15.00),(13,2,25.00),(13,7,20.00),(13,8,10.00),(13,10,30.00),(14,2,25.00),(14,3,30.00),(14,6,20.00),(14,9,15.00),(14,10,10.00),(15,1,10.00),(15,3,15.00),(15,6,25.00),(15,8,20.00),(15,11,30.00),(16,2,20.00),(16,3,15.00),(16,5,10.00),(16,9,25.00),(16,10,30.00),(17,2,15.00),(17,3,10.00),(17,7,25.00),(17,8,20.00),(17,11,30.00),(18,1,30.00),(18,4,15.00),(18,5,10.00),(18,6,25.00),(18,11,20.00),(19,2,30.00),(19,3,15.00),(19,5,25.00),(19,7,20.00),(19,8,10.00),(20,1,15.00),(20,4,10.00),(20,7,25.00),(20,9,20.00),(20,11,30.00);
/*!40000 ALTER TABLE `road_safety_and_causes_accident` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_types`
--

DROP TABLE IF EXISTS `user_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `is_group` tinyint DEFAULT '0' COMMENT 'เป็นชื่อประเภทของ นิคม หรือไม่',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COMMENT='ตารางเก็บข้อมูลประเภทของผู้ใช้';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_types`
--

LOCK TABLES `user_types` WRITE;
/*!40000 ALTER TABLE `user_types` DISABLE KEYS */;
INSERT INTO `user_types` VALUES (1,'หน่วยงาน',0),(2,'นิคม',1);
/*!40000 ALTER TABLE `user_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `ut_id` int DEFAULT NULL COMMENT 'ตาราง user_types',
  `bc_id` int DEFAULT NULL,
  `detail` text,
  `regis_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_business_categories1_idx` (`bc_id`),
  KEY `fk_users_user_types1_idx` (`ut_id`),
  CONSTRAINT `fk_users_business_categories1` FOREIGN KEY (`bc_id`) REFERENCES `business_categories` (`id`),
  CONSTRAINT `fk_users_user_types1` FOREIGN KEY (`ut_id`) REFERENCES `user_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'บริษัท เอ็ม แอนด์ เอ็ม จำกัด',1,5,'In hac habitasse platea dictumst.','2022-05-24 00:00:00'),(2,'บริษัท พี เอส ดี จำกัด',1,1,'Suspendisse ornare consequat lectus.','2022-03-23 00:00:00'),(3,'บริษัท กาแฟฮอล์ดิ้งส์ จำกัด',1,9,'Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus. Phasellus in felis.','2022-12-23 00:00:00'),(4,'บริษัท เพลินสุข จำกัด',2,13,'Integer ac neque. Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus. In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus. Suspendisse potenti.','2022-05-17 00:00:00'),(5,'บริษัท วินเทจเตอร์ส จำกัด',1,6,'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.','2022-10-29 00:00:00'),(6,'บริษัท แก้วและทอง จำกัด',1,1,'Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus. Phasellus in felis. Donec semper sapien a libero.','2022-10-03 00:00:00'),(7,'บริษัท เอ็นแวร์ไอซีที จำกัด',1,2,'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque. Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.','2022-09-27 00:00:00'),(8,'บริษัท ไทยแมคโครโปรดักส์ จำกัด',1,8,'Vestibulum ac est lacinia nisi venenatis tristique.','2022-10-19 00:00:00'),(9,'บริษัท เทสโก้โลตัส จำกัด',1,7,'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.','2022-07-16 00:00:00'),(10,'บริษัท เลสเตอร์ จำกัด',1,6,'Donec posuere metus vitae ipsum. Aliquam non mauris. Morbi non lectus.','2022-07-18 00:00:00'),(11,'บริษัท ไทยเอ็นวีดีอาร์ จำกัด',1,4,'Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla.','2022-12-04 00:00:00'),(12,'บริษัท สยามแมชชีนเนอรี่ จำกัด',1,7,'Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo. Aliquam quis turpis eget elit sodales scelerisque.','2023-01-05 00:00:00'),(13,'DuBuque Inc',1,9,'Morbi ut odio. Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus. Pellentesque eget nunc.','2022-10-08 00:00:00'),(14,'บริษัท โปรเน็ตโทรคมนาคม จำกัด',1,4,'Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem. Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio. Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim.','2023-03-02 00:00:00'),(15,'Jast, Schmitt and Dare Inc',2,17,'Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.','2022-07-03 00:00:00'),(16,'Watsica-Boyle Inc',1,3,'Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum. Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est. Phasellus sit amet erat.','2023-01-28 00:00:00'),(17,'บริษัท ไทยเซฟตี้ จำกัด',1,2,'Mauris lacinia sapien quis libero. Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh. In quis justo.','2022-11-20 00:00:00'),(18,'Turcotte-Yundt Inc',2,13,'Vivamus tortor. Duis mattis egestas metus. Aenean fermentum.','2022-06-28 00:00:00'),(19,'Harvey, Spinka and Mante Inc',2,12,'Fusce consequat. Nulla nisl. Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante.','2022-12-01 00:00:00'),(20,'Kunde-Treutel Inc',2,10,'Duis bibendum. Morbi non quam nec dui luctus rutrum.','2022-03-21 00:00:00');
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

-- Dump completed on 2023-03-31  6:49:55
