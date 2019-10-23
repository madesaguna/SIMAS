/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 10.1.13-MariaDB : Database - test_simsurat
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `instansi` */

DROP TABLE IF EXISTS `instansi`;

CREATE TABLE `instansi` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama_instansi` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `alamat` text CHARACTER SET latin1,
  `website` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `nama_yayasan` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `kepala_instansi` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `idkepala` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `email_instansi` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `logo` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `kopsurat` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `instansi` */

insert  into `instansi`(`id`,`nama_instansi`,`alamat`,`website`,`nama_yayasan`,`kepala_instansi`,`idkepala`,`email_instansi`,`logo`,`kopsurat`) values 
(1,'Departeman Pengabdian Masyarakat','Jl. Raya Siman Km. 6, Siman, Demangan, Kec. Ponorogo, Kabupaten Ponorogo, Jawa Timur 63471','https://dpm.unida.gontor.ac.id','Darussalam Gontor','Muhammad Nuradi','362015611040','dpm@unida.gontor.ac.id','logo.jpg','kop_surat.png');

/*Table structure for table `jenis_surat` */

DROP TABLE IF EXISTS `jenis_surat`;

CREATE TABLE `jenis_surat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_jenis` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `nama_jenis` varchar(30) CHARACTER SET latin1 NOT NULL,
  `content_jenis` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `jenis_surat` */

insert  into `jenis_surat`(`id`,`kode_jenis`,`nama_jenis`,`content_jenis`) values 
(1,NULL,'Surat Keputusan','Surat Keputusan'),
(2,NULL,'Surat Edaran','Surat Edaran dari Instansi'),
(3,NULL,'Surat Undangan','Surat Undangan dari Instansi'),
(4,NULL,'Lainnya','Surat Lainnya');

/*Table structure for table `migration` */

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `migration` */

insert  into `migration`(`version`,`apply_time`) values 
('m000000_000000_base',1522137522);

/*Table structure for table `surat_keluar` */

DROP TABLE IF EXISTS `surat_keluar`;

CREATE TABLE `surat_keluar` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `no_suratkeluar` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tujuan` varchar(30) CHARACTER SET latin1 NOT NULL,
  `perihal_surat` text NOT NULL,
  `narasi` text CHARACTER SET latin1 NOT NULL,
  `upload_berkas` varchar(50) NOT NULL,
  `id_jenis_surat` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Table structure for table `surat_masuk` */

DROP TABLE IF EXISTS `surat_masuk`;

CREATE TABLE `surat_masuk` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no_suratmasuk` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `no_urut` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `pengirim` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `perihal_surat` text CHARACTER SET latin1,
  `narasi` text,
  `upload_berkas` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `jenis_surat` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) CHARACTER SET latin1 NOT NULL,
  `password_hash` varchar(255) CHARACTER SET latin1 NOT NULL,
  `auth_key` varchar(32) CHARACTER SET latin1 NOT NULL,
  `first_name` varchar(250) CHARACTER SET latin1 NOT NULL,
  `last_name` varchar(250) CHARACTER SET latin1 NOT NULL,
  `phone_number` varchar(30) CHARACTER SET latin1 NOT NULL,
  `email` varchar(500) CHARACTER SET latin1 NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET latin1 NOT NULL,
  `user_image` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `user_level` enum('super_admin','admin') CHARACTER SET latin1 NOT NULL DEFAULT 'admin',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`password_hash`,`auth_key`,`first_name`,`last_name`,`phone_number`,`email`,`password_reset_token`,`user_image`,`user_level`) values 
(1,'ibrahim','$2y$13$e11.VFVOjxP6OjPMBfJ60uQupgxJhU.Gl.YeUPRZwjl3/s3By.Hi.','rTmDVz8clRRoEHuHv26jj1m-eR9Eye82','Muhammad','Ibrahim','085257103738','islahboim@gmail.com','baim123','1-ibrahim.jpg','super_admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
