/*
SQLyog Ultimate v12.5.1 (32 bit)
MySQL - 10.4.8-MariaDB : Database - db_madurajaya
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_madurajaya` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_madurajaya`;

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `kdbarang` varchar(10) NOT NULL,
  `nmbarang` varchar(50) DEFAULT NULL,
  `stok_mn` int(11) DEFAULT NULL,
  `jenis_id` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`kdbarang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `barang` */

insert  into `barang`(`kdbarang`,`nmbarang`,`stok_mn`,`jenis_id`) values 
('BR0001','Tehpucuk2',11,'Minuman'),
('BR0002','Aqua100ml',21,'Minuman'),
('BR0003','Ciki Taro',12,'JN0002');

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `id` varchar(10) NOT NULL,
  `nm_cust` varchar(30) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `customer` */

insert  into `customer`(`id`,`nm_cust`,`telp`,`alamat`) values 
('CST0001','arik','082122156968','Cisereh'),
('CST0002','arik1231','082122156968','Brazil');

/*Table structure for table `harga` */

DROP TABLE IF EXISTS `harga`;

CREATE TABLE `harga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kdbarang` varchar(10) DEFAULT NULL,
  `supplier_id` varchar(10) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `harga` */

/*Table structure for table `jenis` */

DROP TABLE IF EXISTS `jenis`;

CREATE TABLE `jenis` (
  `id` varchar(10) NOT NULL,
  `jenis` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `jenis` */

insert  into `jenis`(`id`,`jenis`) values 
('JN0001','Minuman'),
('JN0002','Makanan');

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `id` varchar(10) NOT NULL,
  `nm_supp` varchar(30) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `supplier` */

insert  into `supplier`(`id`,`nm_supp`,`telp`,`alamat`) values 
('SPP0001','Erwin','2424242','h');

/*Table structure for table `transaksi_d` */

DROP TABLE IF EXISTS `transaksi_d`;

CREATE TABLE `transaksi_d` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `header_id` varchar(10) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `kdbarang` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `transaksi_d` */

insert  into `transaksi_d`(`id`,`header_id`,`qty`,`harga`,`total`,`kdbarang`) values 
(1,'TR0002',14,3000,42000,'BR0001'),
(2,'TR0002',100,1500,150000,'BR0002'),
(4,'TR0005',3,100000,300000,'BR0002'),
(5,'TR0006',12,100000,1200000,'BR0002'),
(7,'TR0004',10,14000,140000,'BR0002');

/*Table structure for table `transaksi_h` */

DROP TABLE IF EXISTS `transaksi_h`;

CREATE TABLE `transaksi_h` (
  `id_trans` varchar(10) NOT NULL,
  `periode` varchar(6) NOT NULL,
  `jns_trans` char(4) DEFAULT NULL,
  `tgl_trans` date DEFAULT NULL,
  `ref_id` varchar(10) DEFAULT NULL,
  `crtby` varchar(30) DEFAULT NULL,
  `supplier_id` varchar(30) DEFAULT NULL,
  `customer_id` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_trans`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `transaksi_h` */

insert  into `transaksi_h`(`id_trans`,`periode`,`jns_trans`,`tgl_trans`,`ref_id`,`crtby`,`supplier_id`,`customer_id`) values 
('TR0002','202112','in','2021-12-08','D1111',NULL,'SPP0001','0'),
('TR0003','202201','out','2022-01-06','D111122',NULL,'SPP0001',NULL),
('TR0004','202201','out','2022-01-05','C111122',NULL,'0','CST0002'),
('TR0005','202201','in','2022-01-05','D111122',NULL,'SPP0001','0'),
('TR0006','202201','in','2022-01-13','D1111',NULL,'SPP0001','0'),
('TR0007','202201','out','0000-00-00','D1111',NULL,'SPP0001','CST0001');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`password`,`nama`,`status`,`level`) values 
(1,'ep','123','Erwin',1,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
