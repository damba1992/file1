-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2015 at 12:53 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `restoran`
--
CREATE DATABASE IF NOT EXISTS `restoran` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `restoran`;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE IF NOT EXISTS `detail_pesanan` (
  `id_datail` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  PRIMARY KEY (`id_datail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_datail`, `id_menu`, `id_pesanan`, `jumlah`) VALUES
(1, 2, 1, '3'),
(2, 3, 2, '2'),
(3, 4, 3, '4'),
(4, 5, 4, '5');

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE IF NOT EXISTS `meja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_meja` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`id`, `no_meja`) VALUES
(1, '1'),
(2, '2'),
(3, '3');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `stok` varchar(255) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga`, `stok`) VALUES
(1, 'nasi goreng', '4000', '34'),
(2, 'nasi ayam', '6000', '12'),
(3, 'nasi telur', '5500', '10'),
(4, 'nasi sarden', '7000', '14'),
(5, 'es teh', '2000', '39'),
(6, 'es campur', '5600', '14'),
(7, 'es kopi', '1700', '19'),
(8, 'sate', '20000', '100'),
(9, 'lontong', '1000', '12');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE IF NOT EXISTS `pesanan` (
  `id_pesanan` int(11) NOT NULL AUTO_INCREMENT,
  `no_transaksi` varchar(255) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `total` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `no_meja` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pesanan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `no_transaksi`, `nama_menu`, `date`, `total`, `jumlah`, `no_meja`) VALUES
(48, '4', 'nasi ayam', '2015-07-28', '0', '4', '10'),
(49, '4', 'nasi ayam', '2015-07-28', '24000', '4', '10'),
(50, '4', 'nasi ayam', '2015-07-28', '24000', '4', '10'),
(51, '4', 'nasi ayam', '2015-07-28', '24000', '4', '10'),
(52, '4', 'nasi ayam', '2015-07-28', '24000', '4', '11'),
(53, '4', 'nasi ayam', '2015-07-28', '0', '4', '13');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `level` enum('admin','kasir','waiters','dapur') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `alamat`, `level`) VALUES
(4, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail', 'tebu ireng', 'admin'),
(6, 'da', '5ca2aa845c8cd5ace6b016841f100d82', 'da@gmail', 'tebu ', 'waiters');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
