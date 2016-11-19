-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2016 at 07:10 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grosir`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `nama_lengkap` varchar(20) NOT NULL,
  `pass` varchar(70) NOT NULL,
  `jabatan` varchar(15) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `nama_lengkap`, `pass`, `jabatan`, `foto`) VALUES
(9, 'oke', 'Yogi Grosir', '827ccb0eea8a706c4c34a16891f84e7b', 'Super Admin', 'oke.jpg'),
(10, 'ucok', 'Ucok Sumbara', '827ccb0eea8a706c4c34a16891f84e7b', 'Karyawan', 'ucok.jpg'),
(11, 'bagus', 'dsgdfg', '202cb962ac59075b964b07152d234b70', 'Karyawan', 'good.jpg'),
(12, 'kon', 'Konek', '202cb962ac59075b964b07152d234b70', 'Karyawan', '');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_gudang` int(11) NOT NULL,
  `nama` text NOT NULL,
  `jenis` text NOT NULL,
  `suplier` text NOT NULL,
  `modal` int(11) NOT NULL,
  `harga_atas` int(11) NOT NULL,
  `harga_bawah` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `tangal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_gudang`, `nama`, `jenis`, `suplier`, `modal`, `harga_atas`, `harga_bawah`, `jumlah`, `sisa`, `tangal_masuk`) VALUES
(59, 'Komputerr', 'Elektronikk', 'M', 5000001, 20000001, 15000001, 1341, 130, '2016-11-19'),
(62, 'Redmi 3', 'Handphone', 'Xiomi', 1000000, 1500000, 1300000, 45, 45, '2016-11-19');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `jekel` text NOT NULL,
  `jabatan` text NOT NULL,
  `alamat` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `jekel`, `jabatan`, `alamat`, `foto`) VALUES
(1, 'Tasego', 'Laki-laki', 'Karyawan', 'Kerinci Jambi', ''),
(2, 'Konek', 'Perempuan', 'Super Admin', 'dsafg', ''),
(3, 'fsf', 'Perempuan', 'ffdfs', 'sfsfsf', 'harimau.jpeg'),
(4, 'dsgdfg', 'Perempuan', 'dfsdf', 'dsfs', 'good.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stok_toko`
--

CREATE TABLE `stok_toko` (
  `id_toko` int(11) NOT NULL,
  `id_gudang` int(11) NOT NULL,
  `jenis_toko` text NOT NULL,
  `suplier_toko` text NOT NULL,
  `modal_toko` int(11) NOT NULL,
  `harga_atas_toko` int(11) NOT NULL,
  `harga_bawah_toko` int(11) NOT NULL,
  `jumlah_toko` int(11) NOT NULL,
  `sisa_toko` int(11) NOT NULL,
  `tanggal_masuktoko` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_toko`
--

INSERT INTO `stok_toko` (`id_toko`, `id_gudang`, `jenis_toko`, `suplier_toko`, `modal_toko`, `harga_atas_toko`, `harga_bawah_toko`, `jumlah_toko`, `sisa_toko`, `tanggal_masuktoko`) VALUES
(18, 59, 'Elektronik', 'IBM', 5000001, 2000000, 1500000, 12, 10, '2016-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `id_suplier` int(11) NOT NULL,
  `nama_suplier` varchar(60) NOT NULL,
  `no_rekening` int(20) NOT NULL,
  `hutang` int(20) NOT NULL,
  `tempo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_gudang`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok_toko`
--
ALTER TABLE `stok_toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_gudang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `stok_toko`
--
ALTER TABLE `stok_toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
