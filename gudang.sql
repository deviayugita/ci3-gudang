-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2018 at 05:05 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `fk_id_level` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `usr` varchar(255) NOT NULL,
  `psw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `fk_id_level`, `nama_admin`, `alamat`, `no_telp`, `usr`, `psw`) VALUES
(1, 1, 'audi', 'suhat', '0888888', 'audi', '4d9fa555e7c23996e99f1fb0e286aea8'),
(3, 2, 'gita', 'malang', '0879867', 'gita', '4cb6903c6f8b22d7f191aff3e137dbef'),
(4, 1, 'hasna', 'malang', '09987', 'hasna', '2628e9c4f08c2e18e100958ca5de003d'),
(5, 2, 'devi', 'malang', '0879867', 'devi', 'f5997f33924a71cfe32cc115d2bc274e'),
(8, 1, 'isna', 'malang', '08847', 'isna', '3d1c3481dd9ce3d7e31f3bee188cee35');

-- --------------------------------------------------------

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
  `id_ukuran` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `Gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `id_kategori`, `harga`, `jumlah`, `id_admin`, `id_ukuran`, `tgl_masuk`, `Gambar`) VALUES
(7, 'flo-shirt navy', 7, '189900', '22', 8, 2, '2018-07-22', 'a1.jpg'),
(8, 'w-leaves white', 7, '199900', '20', 8, 2, '2018-07-22', 'a21.jpg'),
(9, 'flo-shirt black', 7, '189900', '15', 8, 1, '2018-07-22', 'a3.jpg'),
(10, 'pencil jeans navy', 8, '250000', '30', 1, 4, '2018-07-22', 'b1.jpg'),
(11, 'ripped jeans', 8, '195500', '30', 4, 4, '2018-07-22', 'b7.jpg'),
(12, 'green mini rok', 9, '138900', '20', 3, 2, '2018-07-22', 'b2.jpg'),
(13, 'cutie red', 1, '89900', '50', 8, 3, '2018-07-23', 'a4.jpg'),
(14, 'jogger pants', 10, '300000', '80', 8, 1, '2018-07-23', 'b4.jpg'),
(15, 'wico skirt', 9, '125000', '45', 5, 3, '2018-07-23', 'b9.jpg'),
(16, 'kombor jeans', 8, '299900', '20', 4, 4, '2018-07-24', 'b8.JPG'),
(17, 'ripped width', 8, '300000', '30', 8, 3, '2018-07-24', 'b10.jpg'),
(18, 'ribbon chest', 7, '189900', '50', 8, 2, '2018-07-24', 'a10.jpg'),
(19, 'black dress', 11, '199900', '30', 1, 3, '2018-07-24', 'a5.jpg'),
(20, 'mini cat', 11, '250000', '30', 4, 2, '2018-07-24', 'a8.jpg'),
(21, 'pink shirt', 7, '150500', '60', 1, 1, '2018-07-24', 'a7.jpg'),
(22, 'black legging', 10, '199900', '30', 5, 1, '2018-07-24', 'b3.jpg'),
(23, 'black pencil', 10, '199900', '20', 4, 2, '2018-07-24', 'b5.jpg'),
(24, 'grey pants', 10, '250000', '50', 8, 4, '2018-07-24', 'b6.jpg'),
(25, 'crop blue', 7, '199900', '50', 8, 4, '2018-07-24', 'a9.jpg'),
(26, 'lea dress', 11, '250000', '20', 1, 1, '2018-07-24', 'a6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'kaos'),
(2, 'jaket'),
(4, 'cardigan'),
(7, 'kemeja'),
(8, 'jeans'),
(9, 'rok'),
(10, 'pants'),
(11, 'dress');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(2) NOT NULL,
  `nama_level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'Administrator'),
(2, 'Operator'),
(3, 'Suplier'),
(4, 'Distributor');

-- --------------------------------------------------------

--
-- Table structure for table `ukuran`
--

CREATE TABLE `ukuran` (
  `id_ukuran` int(10) NOT NULL,
  `nama_ukuran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ukuran`
--

INSERT INTO `ukuran` (`id_ukuran`, `nama_ukuran`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, 'XXL');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `fk_id_level` int(2) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `fk_id_level`, `nama`, `alamat`, `email`, `no_tlp`, `username`, `password`, `tanggal`) VALUES
(4, 3, 'devi ayu gita', 'ytr', 'deviayugitaa@gmail.com', '32222', 'devi', 'f5c2db1f19bdde37e740e86b70d0534f', '2018-07-22 10:22:38'),
(5, 3, 'ayu', 'aaa', 'de@gmail.com', '324', 'ayu', '29c65f781a1068a41f735e1b092546de', '2018-07-22 12:17:54'),
(6, 4, 'Hasna Alifira', 'Bunul', 'hasna@gmail.com', '098765443', 'hasna', 'b83ba8dc98c5fee2a3e5906752d48e31', '2018-07-22 23:57:02'),
(7, 3, 'Rifda N', 'rampal', 'rifda@gmail.com', '090909090', 'rifda', '023202291aa9f07a75b25dab06d643e9', '2018-07-23 00:28:42'),
(8, 4, 'fira', 'hamid rusdi', 'fira@gmail.com', '12321', 'fira', 'd57d8d5422365e4295153b987f907c5e', '2018-07-23 00:32:03'),
(9, 4, 'isna', 'gadang', 'isna@gmail.com', '11344', 'isna', '3d1c3481dd9ce3d7e31f3bee188cee35', '2018-07-23 00:36:59'),
(10, 4, 'mimi', 'gadang', 'mimi123@gmail.com', '03419504620', 'mimi', '202cb962ac59075b964b07152d234b70', '2018-07-24 13:54:02'),
(11, 3, 'tata', 'blimbing', 'citata_olivia@yahoo.com', '083105518583', 'tata', '49d02d55ad10973b7b9d0dc9eba7fdf0', '2018-07-24 13:56:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `fk_id_level` (`fk_id_level`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`) USING BTREE,
  ADD KEY `id_admin` (`id_admin`) USING BTREE,
  ADD KEY `id_ukuran` (`id_ukuran`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_level_id` (`fk_id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id_ukuran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin_id_level` FOREIGN KEY (`fk_id_level`) REFERENCES `level` (`id_level`);

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_id_level` FOREIGN KEY (`fk_id_level`) REFERENCES `level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
