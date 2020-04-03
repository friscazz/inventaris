/*
MySQL Backup
Source Server Version: 5.7.27
Source Database: inven
Date: 4/3/2020 10:32:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
--  Table structure for `inventaris`
-- ----------------------------
DROP TABLE IF EXISTS `inventaris`;
CREATE TABLE `inventaris` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `penanggung_jawab` varchar(255) NOT NULL,
  `tgl_beli` date NOT NULL,
  `harga` bigint(20) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `id_kondisi` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `img_code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `jenis`
-- ----------------------------
DROP TABLE IF EXISTS `jenis`;
CREATE TABLE `jenis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `kategori`
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `kondisi`
-- ----------------------------
DROP TABLE IF EXISTS `kondisi`;
CREATE TABLE `kondisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kondisi` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `login`
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `inventaris` VALUES ('1','INVEN0001','Kursi','Frisca Rahma Dwinanti','0000-00-00','1000000','0','2','1','1','1','Kursi11.jpg','INVEN0001.png');
INSERT INTO `jenis` VALUES ('1','PC');
INSERT INTO `kategori` VALUES ('1','Elektronik'), ('2','Furniture'), ('3','Aksesoris'), ('5','A');
INSERT INTO `kondisi` VALUES ('1','Baru');
INSERT INTO `login` VALUES ('1','frisca','user','e2b7f1aad02519b809f9dfc051aec22e','127.0.0.1','08990332563');
