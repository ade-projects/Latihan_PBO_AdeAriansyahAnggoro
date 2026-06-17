/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-12.3.2-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: DB_LATIHAN_PBO_TRPL1B_AdeAriansyahAnggoro
-- ------------------------------------------------------
-- Server version	12.3.2-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `tabel_tiket`
--

DROP TABLE IF EXISTS `tabel_tiket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tabel_tiket` (
  `id_tiket` int(11) NOT NULL AUTO_INCREMENT,
  `nama_film` varchar(255) NOT NULL,
  `jadwal_tayang` datetime NOT NULL,
  `jumlah_kursi` int(11) NOT NULL,
  `harga_dasar_tiket` int(11) NOT NULL,
  `jenis_studio` enum('Regular','IMAX','Velvet') NOT NULL,
  `tipe_audio` varchar(50) DEFAULT NULL,
  `lokasi_baris` varchar(10) DEFAULT NULL,
  `kacamata_3d_id` varchar(50) DEFAULT NULL,
  `efek_gerak_fitur` tinyint(1) DEFAULT NULL,
  `bantal_selimut_pack` tinyint(1) DEFAULT NULL,
  `layanan_butler` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_tiket`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_tiket`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `tabel_tiket` WRITE;
/*!40000 ALTER TABLE `tabel_tiket` DISABLE KEYS */;
INSERT INTO `tabel_tiket` VALUES
(1,'Agak Laen','2026-06-20 13:00:00',2,45000,'Regular','Dolby Digital 7.1','A-12',NULL,NULL,NULL,NULL),
(2,'Agak Laen','2026-06-20 13:00:00',1,45000,'Regular','Dolby Digital 7.1','A-13',NULL,NULL,NULL,NULL),
(3,'Dune: Part Two','2026-06-20 15:30:00',3,50000,'Regular','Dolby Atmos','C-05',NULL,NULL,NULL,NULL),
(4,'Dune: Part Two','2026-06-20 15:30:00',2,50000,'Regular','Dolby Atmos','C-06',NULL,NULL,NULL,NULL),
(5,'Spider-Man: Beyond the Spider-Verse','2026-06-21 10:00:00',4,40000,'Regular','Dolby Digital','E-01',NULL,NULL,NULL,NULL),
(6,'Spider-Man: Beyond the Spider-Verse','2026-06-21 10:00:00',1,40000,'Regular','Dolby Digital','E-02',NULL,NULL,NULL,NULL),
(7,'Oppenheimer','2026-06-21 19:00:00',2,45000,'Regular','Dolby Atmos','G-10',NULL,NULL,NULL,NULL),
(8,'Dune: Part Two','2026-06-20 14:00:00',2,85000,'IMAX','IMAX 12-Track','H-08','IMX-3D-001',0,NULL,NULL),
(9,'Dune: Part Two','2026-06-20 14:00:00',2,85000,'IMAX','IMAX 12-Track','H-09','IMX-3D-002',0,NULL,NULL),
(10,'Godzilla x Kong','2026-06-20 18:00:00',1,95000,'IMAX','IMAX 6-Track','F-15','IMX-3D-088',1,NULL,NULL),
(11,'Godzilla x Kong','2026-06-20 18:00:00',3,95000,'IMAX','IMAX 6-Track','F-16','IMX-3D-089',1,NULL,NULL),
(12,'Avengers: Secret Wars','2026-06-21 20:00:00',2,100000,'IMAX','IMAX 12-Track','J-05','IMX-3D-102',1,NULL,NULL),
(13,'Avengers: Secret Wars','2026-06-21 20:00:00',2,100000,'IMAX','IMAX 12-Track','J-06','IMX-3D-103',1,NULL,NULL),
(14,'Interstellar (Re-issue)','2026-06-22 15:00:00',1,80000,'IMAX','IMAX 12-Track','K-11',NULL,0,NULL,NULL),
(15,'Dune: Part Two','2026-06-20 14:00:00',2,85000,'IMAX','IMAX 12-Track','H-08','IMX-3D-001',0,NULL,NULL),
(16,'Dune: Part Two','2026-06-20 14:00:00',2,85000,'IMAX','IMAX 12-Track','H-09','IMX-3D-002',0,NULL,NULL),
(17,'Godzilla x Kong','2026-06-20 18:00:00',1,95000,'IMAX','IMAX 6-Track','F-15','IMX-3D-088',1,NULL,NULL),
(18,'Godzilla x Kong','2026-06-20 18:00:00',3,95000,'IMAX','IMAX 6-Track','F-16','IMX-3D-089',1,NULL,NULL),
(19,'Avengers: Secret Wars','2026-06-21 20:00:00',2,100000,'IMAX','IMAX 12-Track','J-05','IMX-3D-102',1,NULL,NULL),
(20,'Avengers: Secret Wars','2026-06-21 20:00:00',2,100000,'IMAX','IMAX 12-Track','J-06','IMX-3D-103',1,NULL,NULL),
(21,'Interstellar (Re-issue)','2026-06-22 15:00:00',1,80000,'IMAX','IMAX 12-Track','K-11',NULL,0,NULL,NULL),
(22,'The Batman Part II','2026-06-20 20:30:00',2,150000,'Velvet','Dolby Atmos','BED-1',NULL,NULL,1,1),
(23,'The Batman Part II','2026-06-20 20:30:00',2,150000,'Velvet','Dolby Atmos','BED-2',NULL,NULL,1,0),
(24,'Joker: Folie à Deux','2026-06-21 21:00:00',2,150000,'Velvet','Dolby Surround','BED-5',NULL,NULL,1,1),
(25,'Joker: Folie à Deux','2026-06-21 21:00:00',2,150000,'Velvet','Dolby Surround','BED-6',NULL,NULL,1,1),
(26,'Dune: Part Two','2026-06-22 19:00:00',2,160000,'Velvet','Dolby Atmos','BED-3',NULL,NULL,1,0),
(27,'Dune: Part Two','2026-06-22 19:00:00',2,160000,'Velvet','Dolby Atmos','BED-4',NULL,NULL,1,1),
(28,'Deadpool & Wolverine','2026-06-23 20:00:00',2,150000,'Velvet','Dolby Atmos','BED-8',NULL,NULL,1,0);
/*!40000 ALTER TABLE `tabel_tiket` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2026-06-17 15:14:21
