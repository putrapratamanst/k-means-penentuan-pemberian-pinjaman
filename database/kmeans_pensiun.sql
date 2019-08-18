-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: 172.29.0.4    Database: kmeans_pensiun
-- ------------------------------------------------------
-- Server version	5.7.27

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
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1565837720),('m130524_201442_init',1565837722),('m190124_110200_add_verification_token_column_to_user_table',1565837722);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengajuan`
--

DROP TABLE IF EXISTS `pengajuan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengajuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pensiun` varchar(45) DEFAULT NULL,
  `sub1` varchar(45) DEFAULT NULL,
  `sub2` varchar(45) DEFAULT NULL,
  `sub3` varchar(45) DEFAULT NULL,
  `sub4` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengajuan`
--

LOCK TABLES `pengajuan` WRITE;
/*!40000 ALTER TABLE `pengajuan` DISABLE KEYS */;
INSERT INTO `pengajuan` VALUES (1,'PN-0001','SKR-00001','SKR-00006','SKR-00011','SKR-00016'),(2,'PN-0002','SKR-00001','SKR-00006','SKR-00010','SKR-00016'),(3,'PN-0003','SKR-00001','SKR-0021','SKR-00011','SKR-00016'),(4,'PN-0004','SKR-00002','SKR-00005','SKR-00010','SKR-00015'),(5,'PN-0005','SKR-00001','SKR-00005','SKR-00011','SKR-00016'),(6,'PN-0006','SKR-00002','SKR-00006','SKR-00011','SKR-00016');
/*!40000 ALTER TABLE `pengajuan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_alternatif`
--

DROP TABLE IF EXISTS `tbl_alternatif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_alternatif` (
  `id_alternatif` varchar(100) NOT NULL,
  `id_pensiun` varchar(255) DEFAULT NULL,
  `kd_alternatif` varchar(100) NOT NULL,
  `nm_alternatif` varchar(100) NOT NULL,
  PRIMARY KEY (`id_alternatif`),
  KEY `id_pensiun_2` (`id_pensiun`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_alternatif`
--

LOCK TABLES `tbl_alternatif` WRITE;
/*!40000 ALTER TABLE `tbl_alternatif` DISABLE KEYS */;
INSERT INTO `tbl_alternatif` VALUES ('AL-0001','PN-0001','A1','Hannan'),('AL-0002','PN-0002','A2','Peni Purnamawati'),('AL-0003','PN-0003','A3','Anang Prasetyo'),('AL-0004','PN-0004','A4','Rahmawati Hasannah'),('AL-0005','PN-0005','A5','Lena Melinda'),('AL-0006','PN-0006','A6','Nia Rosnia Hadijah'),('AL-0007','PN-0007','A7','Reni Husni'),('AL-0008','PN-0008','A8','Farah Nugraheni'),('AL-0009','PN-0009','A9','Retno Dwi'),('AL-0010','PN-0010','A10','Didit Adi Darmawan'),('AL-0011','PN-0011','A11','Michael Purwadi');
/*!40000 ALTER TABLE `tbl_alternatif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_kriteria`
--

DROP TABLE IF EXISTS `tbl_kriteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_kriteria` (
  `id_kriteria` varchar(100) NOT NULL,
  `kd_kriteria` varchar(100) NOT NULL,
  `nm_kriteria` varchar(100) NOT NULL,
  `bobot_kriteria` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_kriteria`
--

LOCK TABLES `tbl_kriteria` WRITE;
/*!40000 ALTER TABLE `tbl_kriteria` DISABLE KEYS */;
INSERT INTO `tbl_kriteria` VALUES ('KR-00001','K1','Penghasilan','5'),('KR-00002','K2','Umur','5'),('KR-00003','K3','Besar Pinjaman','4'),('KR-00004','K4','Jangka Waktu Kredit','3');
/*!40000 ALTER TABLE `tbl_kriteria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_nilai_alternatif`
--

DROP TABLE IF EXISTS `tbl_nilai_alternatif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_nilai_alternatif` (
  `id_nilai_alternatif` varchar(100) NOT NULL,
  `id_alternatif` varchar(100) NOT NULL,
  `id_kriteria` varchar(100) NOT NULL,
  `id_sub_kriteria` varchar(100) NOT NULL,
  PRIMARY KEY (`id_nilai_alternatif`),
  KEY `id_alternatif` (`id_alternatif`),
  CONSTRAINT `tbl_nilai_alternatif_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `tbl_alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_nilai_alternatif`
--

LOCK TABLES `tbl_nilai_alternatif` WRITE;
/*!40000 ALTER TABLE `tbl_nilai_alternatif` DISABLE KEYS */;
INSERT INTO `tbl_nilai_alternatif` VALUES ('NAL-0001','AL-0001','KR-00001','SKR-00001'),('NAL-0002','AL-0001','KR-00002','SKR-00005'),('NAL-0003','AL-0001','KR-00003','SKR-00010'),('NAL-0004','AL-0001','KR-00004','SKR-00015'),('NAL-0005','AL-0002','KR-00001','SKR-00001'),('NAL-0006','AL-0002','KR-00002','SKR-00006'),('NAL-0007','AL-0002','KR-00003','SKR-00010'),('NAL-0008','AL-0002','KR-00004','SKR-00016'),('NAL-0009','AL-0003','KR-00001','SKR-00001'),('NAL-0010','AL-0003','KR-00002','SKR-0021'),('NAL-0011','AL-0003','KR-00003','SKR-00011'),('NAL-0012','AL-0003','KR-00004','SKR-00016'),('NAL-0013','AL-0004','KR-00001','SKR-00002'),('NAL-0014','AL-0004','KR-00002','SKR-00005'),('NAL-0015','AL-0004','KR-00003','SKR-00010'),('NAL-0016','AL-0004','KR-00004','SKR-00015'),('NAL-0017','AL-0005','KR-00001','SKR-00001'),('NAL-0018','AL-0005','KR-00002','SKR-00005'),('NAL-0019','AL-0005','KR-00003','SKR-00011'),('NAL-0020','AL-0005','KR-00004','SKR-00016'),('NAL-0021','AL-0006','KR-00001','SKR-00002'),('NAL-0022','AL-0006','KR-00002','SKR-00006'),('NAL-0023','AL-0006','KR-00003','SKR-00011'),('NAL-0024','AL-0006','KR-00004','SKR-00016'),('NAL-0025','AL-0007','KR-00001','SKR-00002'),('NAL-0026','AL-0007','KR-00002','SKR-00006'),('NAL-0027','AL-0007','KR-00003','SKR-00010'),('NAL-0028','AL-0007','KR-00004','SKR-00016'),('NAL-0029','AL-0008','KR-00001','SKR-00002'),('NAL-0030','AL-0008','KR-00002','SKR-00005'),('NAL-0031','AL-0008','KR-00003','SKR-00010'),('NAL-0032','AL-0008','KR-00004','SKR-00015'),('NAL-0033','AL-0009','KR-00001','SKR-00001'),('NAL-0034','AL-0009','KR-00002','SKR-0021'),('NAL-0035','AL-0009','KR-00003','SKR-00010'),('NAL-0036','AL-0009','KR-00004','SKR-00016'),('NAL-0037','AL-0010','KR-00001','SKR-00001'),('NAL-0038','AL-0010','KR-00002','SKR-0021'),('NAL-0039','AL-0010','KR-00003','SKR-00011'),('NAL-0040','AL-0010','KR-00004','SKR-00016'),('NAL-0041','AL-0011','KR-00001','SKR-00002'),('NAL-0042','AL-0011','KR-00002','SKR-00005'),('NAL-0043','AL-0011','KR-00003','SKR-00010'),('NAL-0044','AL-0011','KR-00004','SKR-00015');
/*!40000 ALTER TABLE `tbl_nilai_alternatif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pensiun`
--

DROP TABLE IF EXISTS `tbl_pensiun`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pensiun` (
  `id_pensiun` varchar(100) NOT NULL,
  `no_pensiun` varchar(200) NOT NULL,
  `nm_pensiun` varchar(200) NOT NULL,
  `ktp_pensiun` varchar(200) NOT NULL,
  `kk_pensiun` varchar(200) NOT NULL,
  `file_ktp_pensiun` varchar(200) NOT NULL,
  `file_kk_pensiun` varchar(100) NOT NULL,
  `tgl_pensiun` date NOT NULL,
  `tempat_lahir` varchar(200) NOT NULL,
  `tanggal_lahir` varchar(200) NOT NULL,
  `almt_pensiun` varchar(200) NOT NULL,
  `notelp_pensiun` varchar(200) NOT NULL,
  `jk_pensiun` varchar(200) NOT NULL,
  `status_pensiun` varchar(100) NOT NULL DEFAULT 'Pengajuan',
  PRIMARY KEY (`id_pensiun`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pensiun`
--

LOCK TABLES `tbl_pensiun` WRITE;
/*!40000 ALTER TABLE `tbl_pensiun` DISABLE KEYS */;
INSERT INTO `tbl_pensiun` VALUES ('PN-0001','1','Hannan','1','1','939fd34b2a7d1b530edbfaee909fb74c.png','d4a101a8173e5cab76f5c60df1d7a4ba.png','2019-07-28','1','1961-03-02','1','1','Laki-laki','Diterima'),('PN-0002','2','Peni Purnamawati','2','2','da2fd285e7dd3f7cc726912739c82efe.png','4149ca74bf8ee6256092c3b18841a015.png','2019-08-27','2','1961-03-08','2','2','Perempuan','Diterima'),('PN-0003','3','Anang Prasetyo','3','3','e6152f9b9211c09811dbe952f727c029.png','028cdcec1980458b1d111c077e7f5967.png','2019-08-11','3','1959-12-27','3','3','Laki-laki','Diterima'),('PN-0004','4','Rahmawati Hasannah','4','4','0ecd1617c8db6eb65ecd9c6e97fda12d.png','974330038d2b59898bae93427fa120dc.png','1917-02-04','4','1962-03-30','4','4','Perempuan','Diterima'),('PN-0005','5','Lena Melinda','5','5','1861935114906f3a4cc22e83aaa3f44e.png','3903982714ccb5c4f203950656f1baaa.png','1909-04-25','5','1962-03-01','5','5','Perempuan','Diterima'),('PN-0006','6','Nia Rosnia Hadijah','6','6','313a8f9a53e3e5751a496d1adff45f70.png','6dacaf70ef5558a910bb2df255c9d543.png','2019-08-07','6','1961-06-13','6','6','Laki-laki','Diterima'),('PN-0007','7','Reni Husni','7','7','daf03636f1df2c07628f58dedc52fdab.png','f9eaa887bb90dfefa30e4423ef2378ca.png','2019-08-04','7','1961-06-06','7','7','Perempuan','Diterima'),('PN-0008','8','Farah Nugraheni','8','8','a45ef86e0d655bb9cc892a8f53393706.png','fd6aa310fd7b5cb8a66fac9186bd3c21.png','2019-05-26','8','1962-01-31','8','8','Laki-laki','Diterima'),('PN-0009','9','Retno Dwi','9','9','25cc9c566c688435c0fbebd2d3084673.png','c6b06ce438a359c39ba056972cf4f6f7.png','2019-04-28','9','1960-02-03','9','9','Laki-laki','Diterima'),('PN-0010','10','Didit Adi Darmawan','10','10','13b831713f25d9c750415302e3903ea3.png','2917f53120c00a6f85f942ce4ccd8bbc.png','2019-08-19','10','1960-03-02','10','10','Perempuan','Diterima'),('PN-0011','11','Michael Purwadi','11','11','70fa8c27186f338a97f5dc1b14b84c23.png','fbd76d83c01a132036116151f07c3e2c.png','2019-11-08','11','1962-03-02','11','11','Laki-laki','Diterima');
/*!40000 ALTER TABLE `tbl_pensiun` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_sub_kriteria`
--

DROP TABLE IF EXISTS `tbl_sub_kriteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_sub_kriteria` (
  `id_sub_kriteria` varchar(100) NOT NULL,
  `id_kriteria` varchar(100) NOT NULL,
  `nm_sub_kriteria` tinytext NOT NULL,
  `bobot_sub_kriteria` varchar(100) NOT NULL,
  PRIMARY KEY (`id_sub_kriteria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sub_kriteria`
--

LOCK TABLES `tbl_sub_kriteria` WRITE;
/*!40000 ALTER TABLE `tbl_sub_kriteria` DISABLE KEYS */;
INSERT INTO `tbl_sub_kriteria` VALUES ('SKR-00001','KR-00001','2< × =< 4 juta','4'),('SKR-00002','KR-00001','4 < × =< 6 juta','5'),('SKR-00005','KR-00002','57','5'),('SKR-00006','KR-00002','58','4'),('SKR-00010','KR-00003','50000000','5'),('SKR-00011','KR-00003','100000000','4'),('SKR-00015','KR-00004','1 tahun','5'),('SKR-00016','KR-00004','2 tahun','4'),('SKR-00018','KR-00005','1','5'),('SKR-00019','KR-00005','2','3'),('SKR-00020','KR-00005','3','2'),('SKR-0021','KR-00002','59','3');
/*!40000 ALTER TABLE `tbl_sub_kriteria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user` (
  `id_user` varchar(100) NOT NULL,
  `nm_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level_user` varchar(100) NOT NULL,
  `temla_user` varchar(100) NOT NULL,
  `tangla_user` date NOT NULL,
  `almt_user` varchar(100) NOT NULL,
  `notelp_user` varchar(100) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES ('US-0001','Admin POS','admin123','0192023a7bbd73250516f069df18b500','Admin','Ungaran','1980-07-12','Jl Majapahit no 1 ','089635191979'),('US-0002','Petugas Kredit','petkred123','a0664518f1ffd905c1780f584e636b63','Petugas Kredit','Tasik','2019-05-22','Jl adem','01290129'),('US-0003','Manager Keuangan','manager123','0795151defba7a4b5dfa89170de46277','Manager Keuangan','Tasik','2019-05-22','Jl adem','01290129');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin123','7MTXK2wGfrLllqUSD2Tne13kABYMW_RE','$2y$13$e5uXUXJfsgNLdOQj6H8CeOFSW9ggmYPhYC.lyy2K5qJjzLiTIu8y2',NULL,'admin123@mailinator.com',10,1565847305,1565847305,'HHKp4-8xa9L2O7bAvbuD0UEneLhQrvoO_1565847305'),(13,'manager123','PPEPYWPtEtny45pGEMdFe0UkYToAbPBB','$2y$13$I2tSvxN.vfCoO1BY5vCtwOLXEp/Mo2ykYpFVp/d4lAfnxNLkQ8pr6',NULL,'manager123@mailinator.com',10,1565864334,1565864334,'93l-0zaakZH7h2wNi-kzO2rs75zb-y_z_1565864334'),(14,'petkred123','Ws6SEMrEuyswFm0kje7Ba_L4hpVRHmTj','$2y$13$/zPojVzA6AVRQgRMk8iE2udPJHUCzr/h6aPIDGylBZ0aMV/KuJI8G',NULL,'petkred123@mailinator.com',10,1565864342,1565864342,'Wu3EuHvw7l3F82fxmQe3uXMaLsowFIX5_1565864342'),(19,'Hannan','o3zAiNaxPyrVts3TIkKNAbf7CceRmkkH','$2y$13$bYBknuF4b0b0YSuxkzEwMeeMJoWz54DtSHFeCiei/j1K3NKEUEEAm',NULL,'Hannan@mailinator.com',10,1565866931,1565866931,'o8j4peQX-MvfbphfsDLNVxt42PDScTDi_1565866931'),(20,'Peni Purnamawati','FlrR4TlQUKVlkTziMZ9pZ8Azjw5P8PFs','$2y$13$lRWCBNO/nlNxYxGt1N/vOu7CpXmRAKyaz7asYk.rjSexpcbknj3j6',NULL,'Peni Purnamawati@mailinator.com',10,1565867022,1565867022,'HlHs6uWzqzf__n8pk4qXNKSS3LjtxZAM_1565867022'),(21,'Anang Prasetyo','_zo7kFarTOp-3nearNrSbX4VsLt8utcy','$2y$13$NF2hOPS/qMJrWDAwtjbXSuacXzBLtYSnpnkoeFL2OSc8UPrOxVxw6',NULL,'Anang Prasetyo@mailinator.com',10,1565867139,1565867139,'hwtTl51tq9q8fAbe0FeOVi6ebEReyCUK_1565867139'),(22,'Rahmawati Hasannah','1P7Bv6ITNA4pfnjExCxDWKaM1YplYyYx','$2y$13$Ul1fDBkrGd4gOz58aFGuYOMxdLBwhgLI0bmbgC5JzxuIujr.l1qzC',NULL,'Rahmawati Hasannah@mailinator.com',10,1565867175,1565867175,'u0Vj0ltMMNRkgjqPUTCWnBj6qXtsNEXw_1565867175'),(23,'Lena Melinda','waym4Mde_foqR_UbGq0fABqmiPEHJDHm','$2y$13$cUJOuYAG/hx2qTvSXFoApezJyQpOvrnPvWaELF9ELNNsk569jbA6W',NULL,'Lena Melinda@mailinator.com',10,1565867287,1565867287,'pE7A65k3tCZ2ZZCANm0nlmri3TI6nm1W_1565867287'),(24,'Nia Rosnia Hadijah','KOg3vd9srIfK6ZfA2p7mPlHfFzam8BV-','$2y$13$8KwzQVHKAIbuHGjlGelEpub/ZtTUs2uNp3ppLtToiaUD55IuNIEYm',NULL,'Nia Rosnia Hadijah@mailinator.com',10,1565867426,1565867426,'uDugAXL_N4hE3Ar_z2wXUQ7P01zi3g2R_1565867426'),(25,'Reni Husni','ej-CpKJcazfTohEZ6m7Frrws19VdB-3k','$2y$13$9BiYdM2oqmT0BoqD639oH.irEwjv8vsIhX88bqYLM9jqEZFzgWty2',NULL,'Reni Husni@mailinator.com',10,1565882224,1565882224,'EWOw17iIX6VIpBRfgpDDOBYcDzdVIdZl_1565882224'),(26,'Farah Nugraheni','3Zo8yU7eyl8QZxP1JIwmDnRD5AoFYIhl','$2y$13$9h4wPABu5y/gjiZRGT2px./5rhXSwYvNHI1vZTTC6sdoaNjkIjOJm',NULL,'Farah Nugraheni@mailinator.com',10,1565882273,1565882273,'NaNZoUMV6vObBam8Gf9bLpYFtlo_GBOt_1565882273'),(27,'Retno Dwi','2uxhsJt_Ko-IwjCAoTthZXfZAhaw4yiQ','$2y$13$JXHsdCFr76jwlF3IupSoQ.Jh3HT3B/4frNd5dGlEv9cunzO5PfYXO',NULL,'Retno Dwi@mailinator.com',10,1565882361,1565882361,'kD8IxJ5pXngSHyPZgnDc7twTQn6oMqBq_1565882361'),(28,'Didit Adi Darmawan','1c4X-BQ8YtXarTBDEnn_-D2XbAUbwIsn','$2y$13$sBclF5CjyqXgC7ai1BlfUeU9NHZFrXmum/GOdlr81/g65ln9Q2osW',NULL,'Didit Adi Darmawan@mailinator.com',10,1565882411,1565882411,'OsN4I1v71C_0pYGc2-ANiSNXgQ-SpaGP_1565882411'),(29,'Michael Purwadi','PhiPDBFkg5t0Uq6MP0YsyVUHsY4BACsD','$2y$13$rzEcJNlnJlAEUHUGxCtdsu92PpMJcOYzAvb2HCwDb4BMIajXHEvhm',NULL,'Michael Purwadi@mailinator.com',10,1565882458,1565882458,'dX6L_ETfyACcNKeBHCgISKsnQc6t2c1P_1565882458');
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

-- Dump completed on 2019-08-18 11:15:55
