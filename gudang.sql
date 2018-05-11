-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2018 at 09:33 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `atasan`
--

CREATE TABLE `atasan` (
  `id_atasan` int(11) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Jenis` varchar(25) NOT NULL,
  `Merk` varchar(25) NOT NULL,
  `Ukuran` varchar(10) NOT NULL,
  `Tgl_masuk` date NOT NULL,
  `Harga` varchar(10) NOT NULL,
  `Jumlah` varchar(10) NOT NULL,
  `Gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atasan`
--

INSERT INTO `atasan` (`id_atasan`, `Nama`, `Jenis`, `Merk`, `Ukuran`, `Tgl_masuk`, `Harga`, `Jumlah`, `Gambar`) VALUES
(1, 'reglan', 'kaos panjang', 'denim', 'xl', '2018-04-03', '20.000', '30', ''),
(2, 'bixi', 'kemeja', 'kr', 'x', '2018-04-04', '50.000', '34', '');

-- --------------------------------------------------------

--
-- Table structure for table `bawahan`
--

CREATE TABLE `bawahan` (
  `id_bawahan` int(11) NOT NULL,
  `Nama` varchar(25) NOT NULL,
  `Jenis` varchar(25) NOT NULL,
  `Merk` varchar(25) NOT NULL,
  `Ukuran` varchar(10) NOT NULL,
  `Tgl_masuk` date NOT NULL,
  `Harga` varchar(10) NOT NULL,
  `Jumlah` varchar(10) NOT NULL,
  `Gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bawahan`
--

INSERT INTO `bawahan` (`id_bawahan`, `Nama`, `Jenis`, `Merk`, `Ukuran`, `Tgl_masuk`, `Harga`, `Jumlah`, `Gambar`) VALUES
(1, 'jj', 'clana panjang', 'jeans', 'm', '2018-04-03', '120.000', '34', ''),
(2, 'blur', 'rok', 'dd', 's', '2018-04-11', '14.000', '21', '');

--
- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga` varchar(25) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `ukuran` varchar(25) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `Gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bawahan`
--

INSERT INTO `barang` (`id_barang`, `nama`, `id_kategori`, `harga`, `jumlah`, `id_admin`, `ukuran`, `tgl_masuk`, `Gambar`) VALUES
(, 'jj', '2', '180.000', '2', '3', 'm', '2018-04-03', '');

--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bawahan`
--

INSERT INTO `admin` (`id_admin`, `nama`, `alamat`, `no_telp`) VALUES
(, 'deviii', 'malng', '00034');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bawahan`
--

INSERT INTO `admin` (`id_kategori`, `nama`) VALUES
(, 'celana');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atasan`
--
ALTER TABLE `atasan`
  ADD PRIMARY KEY (`id_atasan`);

--
-- Indexes for table `bawahan`
--
ALTER TABLE `bawahan`
  ADD PRIMARY KEY (`id_bawahan`);

--
--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
--
-- Indexes for table `kategori`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atasan`
--
ALTER TABLE `atasan`
  MODIFY `id_atasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bawahan`
--
ALTER TABLE `bawahan`
  MODIFY `id_bawahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
