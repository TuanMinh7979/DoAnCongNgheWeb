-- MySQL dump 10.13  Distrib 8.0.25, for Win64 (x86_64)
--
-- Host: localhost    Database: congngheweb
-- ------------------------------------------------------
-- Server version	8.0.25

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
-- Table structure for table `chitiet_donhang`
--

DROP TABLE IF EXISTS `chitiet_donhang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chitiet_donhang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `soluong` int DEFAULT NULL,
  `idDonhang` int NOT NULL,
  `idSanpham` int NOT NULL,
  `mota` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_CHITIET_DONHANG__IDSANPHAM_idx` (`idSanpham`),
  KEY `Fk_Donhangid` (`idDonhang`),
  CONSTRAINT `fk_CHITIET_DONHANG__IDSANPHAM` FOREIGN KEY (`idSanpham`) REFERENCES `dienthoai` (`id`),
  CONSTRAINT `Fk_Donhangid` FOREIGN KEY (`idDonhang`) REFERENCES `donhang` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chitiet_donhang`
--

LOCK TABLES `chitiet_donhang` WRITE;
/*!40000 ALTER TABLE `chitiet_donhang` DISABLE KEYS */;
/*!40000 ALTER TABLE `chitiet_donhang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dienthoai`
--

DROP TABLE IF EXISTS `dienthoai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dienthoai` (
  `id` int NOT NULL AUTO_INCREMENT,
  `TenSanpham` varchar(75) DEFAULT NULL,
  `Gia` float DEFAULT NULL,
  `GiaMua` int NOT NULL,
  `Mau1` varchar(45) DEFAULT NULL,
  `Mau2` varchar(10) NOT NULL,
  `ManHinh` float DEFAULT NULL,
  `BoNho` int DEFAULT NULL,
  `HeDieuHanh` varchar(45) DEFAULT NULL,
  `Camera` varchar(45) DEFAULT NULL,
  `KetNoi` varchar(5) DEFAULT NULL,
  `Sim` int DEFAULT NULL,
  `Pin` int DEFAULT NULL,
  `IdThuonghieu` int NOT NULL,
  `Rating` float DEFAULT NULL,
  `CameraTruoc` varchar(45) DEFAULT NULL,
  `Ram` int DEFAULT NULL,
  `linkanh1` varchar(45) DEFAULT NULL,
  `linkanh2` varchar(45) DEFAULT NULL,
  `Kho` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_thuonghieu_idx` (`IdThuonghieu`),
  CONSTRAINT `dienthoai_ibfk_1` FOREIGN KEY (`IdThuonghieu`) REFERENCES `thuonghieu` (`id`),
  CONSTRAINT `fk_thuonghieu` FOREIGN KEY (`IdThuonghieu`) REFERENCES `thuonghieu` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dienthoai`
--

LOCK TABLES `dienthoai` WRITE;
/*!40000 ALTER TABLE `dienthoai` DISABLE KEYS */;
INSERT INTO `dienthoai` VALUES (1,'Iphone 12',20000000,18000000,'Đỏ ','Đen',6,64,'I14','3 camera 12 MP','5G',2,2815,1,0,'12 MP',4,'/Anh/1_1.jpg','/Anh/1_2.jpg',30),(2,'Iphone 13 Pro Max',34000000,30600000,'Xanh','Bạc',6.7,128,'I15','3 camera 12 MP','5G',2,4352,1,0,'12 MP',6,'/Anh/2_1.jpg','/Anh/2_2.jpg',30),(3,'Iphone 13 Pro',31000000,27900000,'Trắng ','Vàng',6.1,128,'I15','3 camera 12 MP','5G',2,3095,1,0,'12 MP',6,'/Anh/3_1.jpg','/Anh/3_2.jpg',30),(4,'Iphone 12 Pro Max',32000000,28800000,'Xanh ','Vàng',6.7,128,'I14','3 camera 12 MP','5G',2,3687,1,0,'12 MP',6,'/Anh/4_1.jpg','/Anh/4_2.jpg',30),(5,'Iphone 12 Pro',29000000,26100000,'Vàng ','Xám',6.1,128,'I14','3 camera 12 MP','5G',2,2815,1,0,'12 MP',6,'/Anh/5_1.jpg','/Anh/5_2.jpg',30),(6,'Iphone 12 mini',17000000,15300000,'Đen','Đỏ',5.4,64,'I14','2 camera 12MP','5G',2,2227,1,0,'12 MP',4,'/Anh/6_1.jpg','/Anh/6_2.jpg',30),(7,'Iphone 11',17000000,15300000,'Đỏ','Đen',6.1,64,'I14','2 camera 12 MP','5G',2,3110,1,0,'12 MP',4,'/Anh/7_1.jpg','/Anh/7_2.jpg',30),(8,'Iphone XR',13000000,11700000,'Đen ','Xanh',6.1,64,'I14','12 MP','4G',2,2942,1,0,'7 MP',3,'/Anh/8_1.jpg','/Anh/8_2.jpg',30),(9,'Iphone SE',13000000,11700000,'Đen ','Đỏ',4.7,128,'I14','12 MP','4G',2,1821,1,0,'7 MP',3,'/Anh/9_1.jpg','/Anh/9_2.jpg',30),(10,'Iphone 13 mini',20000000,18000000,'Đen ','Đỏ',5.4,128,'I15','2 camera 12 MP','5G',2,2438,1,0,'12 MP',6,'/Anh/10_1.jpg','/Anh/10_2.jpg',30),(11,'Samsung Galaxy A03s',3600000,3240000,'Trắng','Xanh',6.5,64,'A11','Chính 13 MP , Phụ 2 MP  2 MP','4G',2,5000,2,0,'5 MP',4,'/Anh/11_1.jpg','/Anh/11_2.jpg',30),(12,'Samsung Galaxy A52',11000000,9900000,'Đen ','Trắng',6.5,128,'A11','Chính 64 MP, Phụ 12 MP, 5 MP, 5MP','5G',2,4500,2,0,'32 MP',8,'/Anh/12_1.jpg','/Anh/12_2.jpg',30),(13,'Samsung Galaxy S21 ',26000000,23400000,'Bạc ','Đen',0,128,'A11','Chính 128 MP, Phụ 12 MP, 10 MP, 10MP','4G',2,5000,1,0,'40 MP',12,'/Anh/13_1.jpg','/Anh/13_2.jpg',30),(14,'Samsung Galaxy A32 ',6500000,5850000,'Xanh ','Đen',6.4,128,'A11','Chính 64 MP, Phụ 68 MP, 5 MP, 5MP','5G',2,5000,2,0,'20 MP',6,'/Anh/14_1.jpg','/Anh/14_2.jpg',30),(15,'Samsung Galaxy A51',7500000,6750000,'Bạc ','Đen',6.5,128,'A10','Chính 48 MP, Phụ 12 MP, 5 MP, 5MP','5G',2,4000,2,0,'10 MP',6,'/Anh/15_1.jpg','/Anh/15_2.jpg',30),(16,'Samsung Galaxy Note20',16000000,14400000,'Vàng ','Đen',6.7,256,'A10','Chính 12 MP , Phụ 64 MP  12 MP','5G',2,4300,2,0,'10 MP',8,'/Anh/16_1.jpg','/Anh/16_2.jpg',30),(17,'Samsung Galaxy S20 FE ',13500000,12150000,'Xanh ','Lục',6.5,256,'A11','Chính 12 MP , Phụ 12 MP  8 MP','5G',2,4500,2,0,'32 MP',8,'/Anh/17_1.jpg','/Anh/17_2.jpg',30),(18,'Samsung Galaxy A02',2500000,2250000,'Đen ','Xanh',0,32,'A10','Chính 13 MP, Phụ 2 MP','4G',2,5000,1,0,'5 MP',3,'/Anh/18_1.jpg','/Anh/18_2.jpg',30),(19,'Samsung Galaxy A02s',3600000,3240000,'Trắng ','Xanh',6.5,64,'A10','Chính 13 MP , Phụ 2 MP  2 MP','4G',2,5000,2,0,'5 MP',4,'/Anh/19_1.jpg','/Anh/19_2.jpg',30),(20,'Samsung Galaxy A12',4200000,3780000,'Xanh ','Đen',6.5,128,'A11','Chính 48 MP, Phụ 5 MP, 2 MP, 2MP','4G',2,5000,2,0,'8 MP',4,'/Anh/20_1.jpg','/Anh/20_2.jpg',30),(21,'OPPO Reno6 Z',9500000,8550000,'Bạc ','Đen',0,128,'A11','Chính 64 MP , Phụ 8 MP  2 MP','4G',2,4310,1,0,'32 MP',8,'/Anh/21_1.jpg','/Anh/21_2.jpg',30),(22,'OPPO A74',8000000,7200000,'Bạc ','Đen',6.5,128,'A11','Chính 48 MP, Phụ 8 MP, 2 MP, 2MP','5G',2,5000,3,0,'16 MP',6,'/Anh/22_1.jfif','/Anh/22_2.jpg',30),(23,'OPPO A93 ',6500000,5850000,'Trắng ','Đen',6.43,128,'A10','Chính 48 MP, Phụ 8 MP, 2 MP, 2MP','4G',2,4000,3,0,'16 MP',8,'/Anh/23_1.jpg','/Anh/23_2.jpg',30),(24,'OPPO A15 ',3500000,3150000,'Đen ','Trắng',6.52,32,'A10','Chính 13 MP , Phụ 2 MP  2 MP','4G',2,4230,3,0,'8 MP',3,'/Anh/24_1.jpg','/Anh/24_2.jpg',30),(25,'OPPO A16 ',4000000,3600000,'Bạc ','Đen',6.52,32,'A11','Chính 13 MP , Phụ 2 MP  2 MP','4G',2,5000,3,0,'8 MP',3,'/Anh/25_1.jpg','/Anh/25_2.jpg',30),(26,'OPPO A54 ',4700000,4230000,'Xanh ','Đen',6.5,128,'A10','Chính 13 MP , Phụ 2 MP  2 MP','4G',2,5000,3,0,'16 MP',4,'/Anh/26_1.jpg','/Anh/26_2.jpg',30),(27,'OPPO A55',5000000,4500000,'Xanh ','Đen',6.5,64,'A11','Chính 50 MP , Phụ 2 MP  2 MP','4G',2,5000,1,0,'16 MP',4,'/Anh/27_1.jpg','/Anh/27_2.jpg',30),(28,'OPPO A94 ',7500000,6750000,'Đen ','Bạc',6.43,128,'A11','Chính 49 MP, Phụ 8 MP, 2 MP, 2MP','4G',2,4310,3,0,'32 MP',8,'/Anh/28_1.jpg','/Anh/28_2.jpg',30),(29,'OPPO Reno5',8600000,7740000,'Bạc ','Đen',6.43,128,'A11','Chính 64 MP, Phụ 8 MP, 2 MP, 2MP','4G',2,4310,3,0,'44 MP',8,'/Anh/29_1.jpg','/Anh/29_2.jfif',30),(30,'OPPO Reno5 Marvel',9600000,8640000,'Đen','Đen',6.43,128,'A11','Chính 64 MP, Phụ 8 MP, 2 MP, 2MP','4G',2,4310,1,0,'44 MP',8,'/Anh/30_1.jpg','/Anh/30_2.jpg',30),(62,'',0,0,'','',0,0,'','','4G',0,0,1,NULL,'',0,'/Anh/62_1.jpg','/Anh/62_2.jpg',0);
/*!40000 ALTER TABLE `dienthoai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donhang`
--

DROP TABLE IF EXISTS `donhang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `donhang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tinhtrang` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `diachinhanhang` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thanhtien` int NOT NULL,
  `idKhachhang` int NOT NULL,
  `thoidiemdatmua` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `thoidiemgiaohang` datetime DEFAULT NULL,
  `thoidiemnhanhang` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IdKhachhang` (`idKhachhang`),
  CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`idKhachhang`) REFERENCES `user` (`id`),
  CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`idKhachhang`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donhang`
--

LOCK TABLES `donhang` WRITE;
/*!40000 ALTER TABLE `donhang` DISABLE KEYS */;
/*!40000 ALTER TABLE `donhang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thuonghieu`
--

DROP TABLE IF EXISTS `thuonghieu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `thuonghieu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `TenThuonghieu` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thuonghieu`
--

LOCK TABLES `thuonghieu` WRITE;
/*!40000 ALTER TABLE `thuonghieu` DISABLE KEYS */;
INSERT INTO `thuonghieu` VALUES (1,'Iphone'),(2,'Samsung'),(3,'Oppo');
/*!40000 ALTER TABLE `thuonghieu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tentaikhoan` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','123456','','','ad'),(2,'khachhang1','123456','123456789','Ninh Kieu, Can Tho','cus'),(7,' okne','123','','','cus'),(9,' cdok','123','12345678','Phuong A, Quan A, TP.A','cus'),(10,' tkmoi','123','','','cus'),(12,'u2311','123','','','cus');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-28 12:36:46
