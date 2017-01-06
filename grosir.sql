-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 06, 2017 at 10:46 AM
-- Server version: 5.5.53-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `grosir`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `pass` varchar(70) NOT NULL,
  `level` varchar(20) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `id_karyawan`, `uname`, `pass`, `level`) VALUES
(9, 5, 'oke', '827ccb0eea8a706c4c34a16891f84e7b', 'Super Admin'),
(10, 6, 'ucok', '827ccb0eea8a706c4c34a16891f84e7b', 'Karyawan'),
(13, 7, 'ika', '698d51a19d8a121ce581499d7b701668', 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_gudang` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `jenis` text NOT NULL,
  `suplier` text NOT NULL,
  `modal` int(11) NOT NULL,
  `harga_atas` int(11) NOT NULL,
  `harga_bawah` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `tangal_masuk` date NOT NULL,
  PRIMARY KEY (`id_gudang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=97 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_gudang`, `nama`, `jenis`, `suplier`, `modal`, `harga_atas`, `harga_bawah`, `jumlah`, `sisa`, `tangal_masuk`) VALUES
(81, 'Aqua', 'Minuman', 'Aqua', 2300, 10000, 7000, 100, 300, '0000-00-00'),
(83, 'Mentos', 'permen', 'mint', 10000, 15000, 11000, 200, 300, '0000-00-00'),
(84, 'test', 'test', 'test', 10000, 15000, 11000, 100, 100, '0000-00-00'),
(95, 'acer v5 471', 'laptop', 'acer', 7000000, 8000000, 7500000, 12, 12, '2017-01-06'),
(96, 'Battle star', 'MOD', 'Battle  star', 500000, 600000, 550000, 5, 5, '2017-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `barang_terjual`
--

CREATE TABLE IF NOT EXISTS `barang_terjual` (
  `id_terjual` int(11) NOT NULL AUTO_INCREMENT,
  `id_barangtoko` int(11) NOT NULL,
  `jual_idpelanggan` int(11) NOT NULL,
  `jual_hargaakhir` int(11) NOT NULL,
  `jual_jumlah` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_sesion` varchar(200) NOT NULL,
  PRIMARY KEY (`id_terjual`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `barang_terjual`
--

INSERT INTO `barang_terjual` (`id_terjual`, `id_barangtoko`, `jual_idpelanggan`, `jual_hargaakhir`, `jual_jumlah`, `tanggal`, `id_sesion`) VALUES
(21, 46, 0, 10000, 1, '2017-01-02 10:18:17', 'rlrduufcutjnbggvija4mqrf51'),
(22, 47, 0, 4444, 1, '2017-01-02 10:18:57', 'rlrduufcutjnbggvija4mqrf51'),
(23, 46, 0, 10000, 1, '2017-01-02 10:19:24', 'rlrduufcutjnbggvija4mqrf51'),
(24, 47, 0, 4444, 1, '2017-01-02 10:19:38', 'rlrduufcutjnbggvija4mqrf51'),
(25, 46, 0, 10000, 1, '2017-01-02 10:40:11', 'rlrduufcutjnbggvija4mqrf51'),
(26, 47, 0, 4444, 1, '2017-01-02 10:41:37', 'rlrduufcutjnbggvija4mqrf51'),
(27, 46, 0, 10000, 1, '2017-01-02 11:00:00', 'rlrduufcutjnbggvija4mqrf51'),
(28, 47, 0, 4444, 1, '2017-01-02 11:00:04', 'rlrduufcutjnbggvija4mqrf51'),
(29, 46, 0, 10000, 1, '2017-01-02 11:14:39', 'rlrduufcutjnbggvija4mqrf51'),
(30, 46, 0, 10000, 1, '2017-01-02 11:19:06', 'rlrduufcutjnbggvija4mqrf51'),
(31, 46, 0, 10000, 1, '2017-01-02 22:13:15', 'rqcese68hj92vpo3d8anl6ddc0'),
(32, 46, 0, 10000, 1, '2017-01-02 23:10:07', 'rqcese68hj92vpo3d8anl6ddc0'),
(33, 48, 0, 15000, 1, '2017-01-02 23:17:36', 'rqcese68hj92vpo3d8anl6ddc0'),
(34, 46, 0, 10000, 1, '2017-01-05 19:09:06', 'cv7cm34kbtcllj6saq8glg30t5'),
(35, 46, 0, 10000, 1, '2017-01-05 19:24:30', 'cv7cm34kbtcllj6saq8glg30t5');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `jekel` text NOT NULL,
  `jabatan` text NOT NULL,
  `alamat` text NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `jekel`, `jabatan`, `alamat`, `foto`) VALUES
(5, 'Yogi Grosir', 'Laki-laki', 'Super Admin', 'Kerinci Jambi', 'oke.jpg'),
(6, 'Ucok Sumbara', 'Laki-laki', 'Karyawan', 'Padang Sumatera Barat', 'ucok.jpg\r\n'),
(8, 'Dandi', 'Laki-laki', 'Karyawan', 'Jambi', '8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE IF NOT EXISTS `keranjang` (
  `id_keranjang` int(11) NOT NULL AUTO_INCREMENT,
  `id_barangtoko` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `jumlah_keranjang` int(11) NOT NULL,
  `harga_akhir` int(11) NOT NULL,
  `id_sesion` varchar(200) NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id_keranjang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_barangtoko`, `id_pelanggan`, `jumlah_keranjang`, `harga_akhir`, `id_sesion`, `tanggal`) VALUES
(19, 46, 69, 1, 10000, 'cv7cm34kbtcllj6saq8glg30t5', '2017-01-05 19:24:30');

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE IF NOT EXISTS `notif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jum_minimal` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`id`, `jum_minimal`) VALUES
(1, 10),
(2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int(12) NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(100) NOT NULL,
  `hutang` int(11) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_pelanggan`),
  UNIQUE KEY `id_transaksi` (`nama_pelanggan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `hutang`, `alamat`, `nohp`, `tanggal`) VALUES
(69, 'aab', 0, 'fsdfa', '332532422', '0000-00-00'),
(71, 'Jokowi', 10000, 'Jakarta', '0821744675', '2016-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `stok_toko`
--

CREATE TABLE IF NOT EXISTS `stok_toko` (
  `id_toko` int(11) NOT NULL AUTO_INCREMENT,
  `id_gudang` int(11) NOT NULL,
  `nama_toko` varchar(200) NOT NULL,
  `jenis_toko` text NOT NULL,
  `suplier_toko` text NOT NULL,
  `modal_toko` int(11) NOT NULL,
  `harga_atas_toko` int(11) NOT NULL,
  `harga_bawah_toko` int(11) NOT NULL,
  `jumlah_toko` int(11) NOT NULL,
  `sisa_toko` int(11) NOT NULL,
  `tanggal_masuktoko` date NOT NULL,
  PRIMARY KEY (`id_toko`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `stok_toko`
--

INSERT INTO `stok_toko` (`id_toko`, `id_gudang`, `nama_toko`, `jenis_toko`, `suplier_toko`, `modal_toko`, `harga_atas_toko`, `harga_bawah_toko`, `jumlah_toko`, `sisa_toko`, `tanggal_masuktoko`) VALUES
(46, 81, 'Aqua', 'Minuman', 'Aqua', 2300, 10000, 7000, 202, 13, '2016-12-26'),
(48, 83, 'Mentos', 'permen', 'mint', 10000, 15000, 11000, 99, 100, '2017-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE IF NOT EXISTS `suplier` (
  `id_suplier` int(11) NOT NULL AUTO_INCREMENT,
  `nama_suplier` varchar(60) NOT NULL,
  `no_rekening` int(20) NOT NULL,
  `hutang` int(20) NOT NULL,
  `tempo` date NOT NULL,
  PRIMARY KEY (`id_suplier`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id_suplier`, `nama_suplier`, `no_rekening`, `hutang`, `tempo`) VALUES
(2, 'Yogi Broto', 898767311, 42962021, '0000-00-00'),
(3, 'Homoo', 2147483647, 5000000, '0000-00-01'),
(4, 'Boss besar', 101010101, 29999556, '0000-00-00'),
(6, 'oke', 9091111, 575516, '2017-01-12'),
(7, 'nu mild', 100101010, 2929399, '1999-10-11'),
(8, 'Samsul', 110201010, 79988, '2016-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(12) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(12) NOT NULL,
  `tot_belanja` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `faktur` char(10) NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `tot_belanja`, `jumlah_bayar`, `kembalian`, `tgl_transaksi`, `faktur`) VALUES
(33, 71, 10000, 10000, 0, '2017-01-02 04:17:43', 'TJ0015'),
(34, 71, 10000, 10000, 0, '2017-01-02 04:18:12', 'TJ0016'),
(35, 69, 25000, 3000, -22000, '2017-01-02 16:21:23', 'TJ0017'),
(36, 69, 32000, 5000, -27000, '2017-01-05 12:09:53', 'TJ0018'),
(37, 69, 27000, 27000, 0, '2017-01-05 12:19:18', 'TJ0019');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
