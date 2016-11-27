-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2016 at 05:32 PM
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
  `id_admin` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `pass` varchar(70) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(59, 'Komputerr', 'Elektronikk', 'M', 5000001, 20000001, 15000001, 1015, 130, '2016-11-19'),
(62, 'Redmi 3', 'Handphone', 'Xiomi', 1000000, 1500000, 1300000, 51, 45, '2016-11-19'),
(63, 'Sampoerna', 'Rokok', 'Sampoerna', 10000, 20000, 15000, 69, 9, '0000-00-00'),
(64, 'Aqua', 'Minuman', 'Aqua', 10000, 20000, 15000, 34, 34, '0000-00-00'),
(65, 'Rinso', 'Sabun', 'Wings', 2000, 3000, 2500, 89, 89, '2016-12-23'),
(66, 'Torabika', 'Kopi', 'Indofood', 1200, 4000, 3000, 498, 498, '2016-11-24'),
(67, 'Beng-beng', 'Makanan', 'Indofood', 2000, 4000, 3000, 18, 38, '2016-12-22'),
(68, 'Donat Madu', 'makanan', 'Donat', 21000, 30000, 25000, 230, 230, '2016-11-29'),
(69, 'Philips', 'Elektronik', 'Lamp', 50000, 60000, 55000, 390, 390, '2016-11-24'),
(70, 'Toshiba', 'Elektronik', 'Toshiba', 3000, 20000, 1500, 45, 45, '2016-12-12'),
(71, 'Samsung', 'Elektronik', 'Samsuung', 190000, 2000000, 1000000, 32, 32, '2016-11-30');

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
(5, 'Yogi Grosir', 'Laki-laki', 'Super Admin', 'Kerinci Jambi', 'oke.jpg'),
(6, 'Ucok Sumbara', 'Laki-laki', 'Karyawan', 'Padang Sumatera Barat', 'ucok.jpg\r\n'),
(8, 'Dandi', 'Laki-laki', 'Karyawan', 'Jambi', '8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_barangtoko` int(11) NOT NULL,
  `jumlah_keranjang` int(11) NOT NULL,
  `session_id` varchar(200) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_barangtoko`, `jumlah_keranjang`, `session_id`, `tanggal`) VALUES
(1, 20, 3, '4kct3239etod6mso2i05mvn6f2', '2016-11-27 22:30:41'),
(4, 18, 2, '4kct3239etod6mso2i05mvn6f2', '2016-11-27 22:57:28');

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `id` int(11) NOT NULL,
  `jum_minimal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`id`, `jum_minimal`) VALUES
(1, 5),
(2, 5);

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
(18, 59, 'Elektronik', 'IBM', 5000001, 2000000, 1500000, 338, 10, '2016-11-25'),
(19, 62, 'Handphone', 'Xiomi', 1000000, 1500000, 1300000, 90, 40, '2016-11-19'),
(20, 67, 'Makanan', 'Indofood', 2000, 4000, 3000, 20, 20, '2016-12-22');

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
  ADD PRIMARY KEY (`id_admin`);

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
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_gudang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stok_toko`
--
ALTER TABLE `stok_toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
