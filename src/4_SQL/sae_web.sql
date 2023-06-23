-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 26, 2022 at 12:01 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sae_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

DROP TABLE IF EXISTS `business`;
CREATE TABLE IF NOT EXISTS `business` (
  `id` int(11) NOT NULL,
  `company` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `distance` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`id`, `company`, `city`, `distance`) VALUES
(1, 'NVIDIA', 'Caen', 235),
(2, 'AMD', 'Amiens', 156),
(3, 'Intel', 'Orléans', 132),
(4, 'MSI', 'Lille', 225);

-- --------------------------------------------------------

--
-- Table structure for table `businessbuy`
--

DROP TABLE IF EXISTS `businessbuy`;
CREATE TABLE IF NOT EXISTS `businessbuy` (
  `business` int(11) NOT NULL,
  `typeItem` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL COMMENT 'price per unit in euros',
  PRIMARY KEY (`business`,`typeItem`),
  KEY `typeItem` (`typeItem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='The business wants to buy quantity of item at unit price';

--
-- Dumping data for table `businessbuy`
--

INSERT INTO `businessbuy` (`business`, `typeItem`, `quantity`, `price`) VALUES
(1, 1, 20, 250),
(1, 2, 20, 400),
(1, 3, 20, 550),
(2, 7, 20, 270),
(2, 8, 20, 400),
(2, 9, 20, 370),
(2, 19, 20, 200),
(2, 20, 20, 300),
(2, 21, 20, 400),
(3, 13, 20, 150),
(3, 14, 20, 350),
(3, 15, 20, 460),
(4, 25, 20, 170),
(4, 26, 20, 100),
(4, 27, 20, 70);

-- --------------------------------------------------------

--
-- Table structure for table `businesssell`
--

DROP TABLE IF EXISTS `businesssell`;
CREATE TABLE IF NOT EXISTS `businesssell` (
  `business` int(11) NOT NULL,
  `typeItem` int(11) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'number of items on offer',
  `price` int(11) NOT NULL COMMENT 'price per unit',
  PRIMARY KEY (`business`,`typeItem`),
  KEY `typeItem` (`typeItem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='the business wants to sell quantity of item at unit price';

--
-- Dumping data for table `businesssell`
--

INSERT INTO `businesssell` (`business`, `typeItem`, `quantity`, `price`) VALUES
(1, 4, 20, 300),
(1, 5, 20, 519),
(1, 6, 20, 1000),
(2, 10, 20, 350),
(2, 11, 20, 479),
(2, 12, 20, 649),
(2, 22, 20, 200),
(2, 23, 20, 300),
(2, 24, 20, 380),
(3, 16, 20, 150),
(3, 17, 20, 400),
(3, 18, 20, 559),
(4, 28, 20, 130),
(4, 29, 20, 95),
(4, 30, 20, 185);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stash` smallint(6) NOT NULL COMMENT 'no more than 65000 euros',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `login`, `stash`) VALUES
(1, 'golgot77', 0),
(2, 'JeanMi91', 0),
(3, 'micha56', 0),
(4, 'yas', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customerextraction`
--

DROP TABLE IF EXISTS `customerextraction`;
CREATE TABLE IF NOT EXISTS `customerextraction` (
  `Customer` bigint(20) NOT NULL,
  `element` int(11) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'in mg',
  KEY `Customer` (`Customer`),
  KEY `element` (`element`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customerprotecteddata`
--

DROP TABLE IF EXISTS `customerprotecteddata`;
CREATE TABLE IF NOT EXISTS `customerprotecteddata` (
  `id` bigint(20) NOT NULL,
  `surname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'can not be shared between accounts',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customerprotecteddata`
--

INSERT INTO `customerprotecteddata` (`id`, `surname`, `firstname`, `email`) VALUES
(1, 'Tartenpion', 'Cun', 'cunegonde.tartenpion@toto.fr'),
(2, 'Erraj', 'Jean-Michel', 'synthe@cool.fr'),
(3, 'Micha', 'Lechat', 'MichMich@gmail.com'),
(4, 'Hamrouni', 'Yassine', 'yas@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `extractionfromtypeitem`
--

DROP TABLE IF EXISTS `extractionfromtypeitem`;
CREATE TABLE IF NOT EXISTS `extractionfromtypeitem` (
  `typeItem` int(11) NOT NULL,
  `element` int(11) NOT NULL,
  `quantityy` int(11) DEFAULT NULL,
  PRIMARY KEY (`typeItem`,`element`) USING BTREE,
  KEY `element` (`element`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extractionfromtypeitem`
--

INSERT INTO `extractionfromtypeitem` (`typeItem`, `element`, `quantityy`) VALUES
(1, 13, 22000),
(1, 26, 18500),
(2, 13, 25000),
(2, 26, 21450),
(3, 13, 22500),
(3, 26, 19000),
(7, 13, 26300),
(7, 26, 21200),
(8, 13, 27000),
(8, 26, 23000),
(9, 13, 30000),
(9, 26, 25000),
(13, 14, 5400),
(14, 14, 7000),
(15, 14, 9000),
(19, 14, 4500),
(20, 14, 6500),
(21, 14, 8500),
(25, 26, 10000),
(25, 29, 21200),
(26, 26, 12000),
(26, 29, 23000),
(27, 26, 15000),
(27, 29, 24000);

-- --------------------------------------------------------

--
-- Table structure for table `mendeleiev`
--

DROP TABLE IF EXISTS `mendeleiev`;
CREATE TABLE IF NOT EXISTS `mendeleiev` (
  `Z` int(11) NOT NULL,
  `symbol` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`Z`),
  UNIQUE KEY `symbol` (`symbol`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mendeleiev`
--

INSERT INTO `mendeleiev` (`Z`, `symbol`, `name`) VALUES
(13, 'Al', 'Aluminium'),
(14, 'Si', 'Silicium'),
(21, 'Sc', 'Scandium'),
(25, 'Mn', 'Manganese'),
(26, 'Fe', 'Fer'),
(28, 'Ni', 'Nickel'),
(29, 'Cu', 'Copper'),
(39, 'Y', 'Yttrium'),
(46, 'Pd', 'Paladium'),
(47, 'Ag', 'Silver'),
(50, 'Sn', 'tin'),
(57, 'La', 'Lanthanum'),
(59, 'Pr', 'praseodymium'),
(60, 'Nd', 'neodymium'),
(64, 'Gd', 'gadolinium'),
(65, 'Tb', 'terbium'),
(74, 'W', 'tungsten'),
(77, 'Ir', 'Iridium'),
(78, 'Pt', 'Platinum'),
(79, 'Au', 'gold');

-- --------------------------------------------------------

--
-- Table structure for table `typeitem`
--

DROP TABLE IF EXISTS `typeitem`;
CREATE TABLE IF NOT EXISTS `typeitem` (
  `id_typeitem` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_typeitem`) USING BTREE,
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `typeitem`
--

INSERT INTO `typeitem` (`id_typeitem`, `name`, `image`) VALUES
(1, 'Carte graphique Nvidia RTX 2060 ', 'https://media.ldlc.com/r1600/ld/products/00/05/84/37/LD0005843776_1.jpg'),
(2, 'Carte graphique Nvidia RTX 2070', 'https://media.ldlc.com/r1600/ld/products/00/05/11/16/LD0005111675_2.jpg'),
(3, 'Carte graphique Nvidia RTX 2080 ti', 'https://m.media-amazon.com/images/I/719BM+soIqL._AC_SL1500_.jpg '),
(4, 'Carte graphique Nvidia RTX 3060', 'https://images.nvidia.com/aem-dam/Solutions/geforce/ampere/rtx-3060-ti/geforce-rtx-3060-ti-product-gallery-full-screen-3840-1-bl.jpg'),
(5, 'Carte graphique Nvidia RTX 3070', 'https://media.ldlc.com/r1600/ld/products/00/05/11/16/LD0005111675_2.jpg'),
(6, 'Carte graphique Nvidia RTX 3080 ti', 'https://m.media-amazon.com/images/I/61eZu-Gk9TS._AC_SX679_.jpg'),
(7, 'Carte graphique AMD RX 5600 XT', 'https://www.media-rdc.com/medias/4fdfa88427eb38efac794380680d8076/v1.jpg'),
(8, 'Carte graphique AMD RX 5700 XT', 'https://asset.msi.com/resize/image/global/product/product_3_20190813170048_5d527c4078cf9.png62405b38c58fe0f07fcef2367d8a9ba1/600.png'),
(9, 'Carte graphique AMD RX 5700 ', 'https://www.asrock.com/Graphics-Card/photo/Radeon%20RX%205700%208G(M1).png'),
(10, 'Carte graphique AMD RX 6600 XT', 'https://media.ldlc.com/r1600/ld/products/00/05/87/06/LD0005870609_1.jpg'),
(11, 'Carte graphique AMD RX 6700 XT', 'https://www.rueducommerce.fr/media/images/web/produit/3232943/20210316093123/sapphire_pulse_amd_radeon_rx_6700_xt_gaming_12gb_gddr6_hdmi_triple_dp_-_1_600x600.jpg'),
(12, 'Carte graphique AMD RX 6800 XT', 'https://media.ldlc.com/r1600/ld/products/00/05/91/17/LD0005911756_1.jpg'),
(13, 'Processeur Intel i5-9400F', 'https://fr.shopping.rakuten.com/photo/intel-core-i5-9400f-2-9-ghz-1627770030_ML.jpg'),
(14, 'Processeur Intel i7-9700KF', 'https://fr.shopping.rakuten.com/photo/intel-core-i7-9700kf-3-6-ghz-1607135046_ML.jpg'),
(15, 'Processeur Intel i9-9900KF', 'https://fr.shopping.rakuten.com/photo/intel-core-i9-9900kf-1680434753_ML.jpg'),
(16, 'Processeur Intel i5-10400', 'https://www.grosbill.com/images_produits/03f6dbb8-2b83-469f-aecc-531dcee87c86.jpg'),
(17, 'Processeur Intel i7-10700k', 'https://fr.shopping.rakuten.com/photo/intel-core-i7-10700k-3-8-ghz-1418531936_ML.jpg'),
(18, 'Processeur Intel i9-10850k', 'https://cdn-reichelt.de/bilder/web/artikel_ws/E200/BX8070110900K_02.jpg'),
(19, 'Processeur AMD Ryzen 5 3600X', 'https://fr.shopping.rakuten.com/photo/amd-ryzen-5-3600x-3-8-ghz-1604315936_ML.jpg'),
(20, 'Processeur AMD Ryzen 7 3700X', 'https://fr.shopping.rakuten.com/photo/amd-ryzen-7-3700x-3-6-ghz-1604315937_ML.jpg'),
(21, 'Processeur AMD Ryzen 9 3900X', 'https://fr.shopping.rakuten.com/photo/amd-ryzen-9-3900x-3-8-ghz-1604315941_ML.jpg'),
(22, 'Processeur AMD Ryzen 5 5600X', 'https://m.media-amazon.com/images/I/61vGQNUEsGL._AC_SX450_.jpg'),
(23, 'Processeur AMD Ryzen 7 5700X', 'https://m.media-amazon.com/images/I/61vGQNUEsGL._AC_SX450_.jpg'),
(24, 'Processeur AMD Ryzen 9 5900X', 'https://fr.shopping.rakuten.com/photo/amd-ryzen-9-5900x-3-7-ghz-1604315945_ML.jpg'),
(25, 'Carte mere MSI B250', 'https://media.ldlc.com/r1600/ld/products/00/04/13/72/LD0004137236_2.jpg'),
(26, 'Carte mere  MSI Z370', 'https://media.ldlc.com/r1600/ld/products/00/04/61/28/LD0004612823_2.jpg'),
(27, 'Carte mere MSI H510', 'https://media.ldlc.com/r1600/ld/products/00/05/83/67/LD0005836779_1.jpg'),
(28, 'Carte mere MSI B550 GAMING PLUS ', 'https://m.media-amazon.com/images/I/91Qnl0pobXL._AC_SL1500_.jpg'),
(29, 'Carte mere MSI B450', 'https://m.media-amazon.com/images/I/91dx+5hokNL._AC_SL1500_.jpg'),
(30, 'Carte mere MSI B570', 'https://m.media-amazon.com/images/I/91X4q-TfLQL._AC_SL1500_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `typeitemdetails`
--

DROP TABLE IF EXISTS `typeitemdetails`;
CREATE TABLE IF NOT EXISTS `typeitemdetails` (
  `typeItem` int(11) NOT NULL,
  `attribute` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`typeItem`,`attribute`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `typeitemdetails`
--

INSERT INTO `typeitemdetails` (`typeItem`, `attribute`, `value`) VALUES
(1, 'Frequence GPU', '1365 MHz'),
(1, 'Taille memoire', '6 GB'),
(2, 'Frequence GPU', '1410 MHz'),
(2, 'Taille memoire', '8 GB'),
(3, 'Frequence GPU', '1350 MHz'),
(3, 'Taille memoire', '11 GB'),
(4, 'Frequence GPU', '1320 MHz'),
(4, 'Taille memoire', '12 GB'),
(5, 'Frequence GPU', '1500 MHz'),
(5, 'Taille memoire', '8 GB'),
(6, 'Frequence GPU', '\r\n1365 MHz'),
(6, 'Taille memoire', '12 GB'),
(7, 'Frequence GPU', '1375 MHz'),
(7, 'Taille memoire', '6 GB'),
(8, 'Frequence GPU', '1755 MHz'),
(8, 'Taille memoire', '8 GB'),
(9, 'Frequence GPU', '1465 MHz'),
(9, 'Taille memoire', '8 GB'),
(10, 'Frequence GPU\r\n', '2589 MHz'),
(10, 'Taille memoire', '8 GB'),
(11, 'Frequence GPU\r\n', '2321 MHz'),
(11, 'Taille memoire', '12 GB'),
(12, 'Frequence GPU\r\n', '2015 MHz'),
(12, 'Taille memoire', '16 GB'),
(13, 'Frequence de base ', '2,90 GHz'),
(13, 'Nombre de coeurs', '6'),
(14, 'Frequence de base ', '3,6 GHz'),
(14, 'Nombre de coeurs', '8 '),
(15, 'Frequence de base ', '3,6 GHz'),
(15, 'Nombre de coeurs', '8'),
(16, 'Frequence de base ', '2,9 GHz'),
(16, 'Nombre de coeurs', '6'),
(17, 'Frequence de base ', '3,8 GHz'),
(17, 'Nombre de coeurs', '8 '),
(18, 'Frequence de base ', '3,6 GHz'),
(18, 'Nombre de coeurs', '10'),
(19, 'Frequence de base \r\n', '3,8 GHz'),
(19, 'Nombre de coeurs', '6'),
(20, 'Frequence de base \r\n', '3,6 GHz'),
(20, 'Nombre de coeurs', '8'),
(21, 'Frequence de base ', '3,8 GHz'),
(21, 'Nombre de coeurs', '12'),
(22, 'Frequence de base \r\n', '3,7 GHz'),
(22, 'Nombre de coeurs', '6'),
(23, 'Frequence de base \r\n', '3,4 GHz'),
(23, 'Nombre de coeurs', '8'),
(24, 'Frequence de base \r\n', '3,7 GHz'),
(24, 'Nombre de coeurs', '12'),
(25, 'nombre de port sata', '6 '),
(25, 'nombre de port usb', '10'),
(26, 'nombre de port sata', '6'),
(26, 'nombre de port usb', '10'),
(27, 'nombre de port sata', '4'),
(27, 'nombre de port usb', '10'),
(28, 'nombre de port sata\r\n', '8'),
(28, 'nombre de port usb', '14'),
(29, 'nombre de port sata\r\n', '6'),
(29, 'nombre de port usb', ' 14 '),
(30, 'nombre de port sata\r\n', '14'),
(30, 'nombre de port usb', '16');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customerextraction`
--
ALTER TABLE `customerextraction`
  ADD CONSTRAINT `CustomerExtraction_ibfk_1` FOREIGN KEY (`Customer`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CustomerExtraction_ibfk_2` FOREIGN KEY (`element`) REFERENCES `mendeleiev` (`Z`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customerprotecteddata`
--
ALTER TABLE `customerprotecteddata`
  ADD CONSTRAINT `CustomerProtectedData_ibfk_1` FOREIGN KEY (`id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `extractionfromtypeitem`
--
ALTER TABLE `extractionfromtypeitem`
  ADD CONSTRAINT `ExtractionFromTypeItem_ibfk_1` FOREIGN KEY (`element`) REFERENCES `mendeleiev` (`Z`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ExtractionFromTypeItem_ibfk_2` FOREIGN KEY (`typeItem`) REFERENCES `typeitem` (`id_typeitem`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `typeitemdetails`
--
ALTER TABLE `typeitemdetails`
  ADD CONSTRAINT `TypeItemDetails_ibfk_1` FOREIGN KEY (`typeItem`) REFERENCES `typeitem` (`id_typeitem`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
