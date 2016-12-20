-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2016 at 11:17 AM
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
(72, 'Aqua', 'Minuman', 'Aqua', 2500, 5000, 3500, 90, 100, '0000-00-00'),
(73, 'Sampoerna', 'Rokok', 'Sampoerna', 10000, 25000, 20000, 200, 500, '0000-00-00'),
(74, 'Kerupuk', 'Makanan', 'Karupuak', 30000, 50000, 100000, 200, 250, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `barang_terjual`
--

CREATE TABLE `barang_terjual` (
  `id_terjual` int(11) NOT NULL,
  `id_barangtoko` int(11) NOT NULL,
  `jual_idpelanggan` int(11) NOT NULL,
  `jual_hargaakhir` int(11) NOT NULL,
  `jual_jumlah` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_sesion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_terjual`
--

INSERT INTO `barang_terjual` (`id_terjual`, `id_barangtoko`, `jual_idpelanggan`, `jual_hargaakhir`, `jual_jumlah`, `tanggal`, `id_sesion`) VALUES
(1, 27, 0, 5000, 1, '2016-12-20 14:31:17', 'c9599hnf11kd6jjgs0clrjblt6');

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
  `id_pelanggan` int(11) NOT NULL,
  `jumlah_keranjang` int(11) NOT NULL,
  `harga_akhir` int(11) NOT NULL,
  `id_sesion` varchar(200) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 10),
(2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(12) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `hutang` int(11) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `hutang`, `alamat`, `nohp`, `tanggal`) VALUES
(69, 'aab', 0, 'fsdfa', '332532422', '0000-00-00'),
(71, 'Jokowi', 0, 'Jakarta', '0821744675', '2016-12-20');

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
(27, 72, 'Minuman', 'Aqua', 2500, 5000, 3500, 52, 50, '2016-12-12'),
(28, 73, 'Rokok', 'Sampoerna', 10000, 25000, 20000, 291, 250, '0000-00-00'),
(29, 74, 'Makanan', 'Karupuak', 30000, 50000, 100000, 37, 50, '0000-00-00');

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

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(12) NOT NULL,
  `id_pelanggan` int(12) NOT NULL,
  `tot_belanja` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `tot_belanja`, `jumlah_bayar`, `kembalian`, `tgl_transaksi`) VALUES
(9, 66, 75000, 100000, 25000, '2016-12-20 06:26:47'),
(10, 68, 5000, 100000, 95000, '2016-12-20 06:31:36');

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
-- Indexes for table `barang_terjual`
--
ALTER TABLE `barang_terjual`
  ADD PRIMARY KEY (`id_terjual`);

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
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `id_transaksi` (`nama_pelanggan`);

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
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

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
  MODIFY `id_gudang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `barang_terjual`
--
ALTER TABLE `barang_terjual`
  MODIFY `id_terjual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `stok_toko`
--
ALTER TABLE `stok_toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
