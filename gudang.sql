-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Jul 2018 pada 11.09
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `alamat`, `no_telp`) VALUES
(1, 'audi', 'suhat', '0888888'),
(3, 'gita', 'malang', '0879867'),
(4, 'hasna', 'malang', '09987'),
(5, 'devi', 'malang', '0879867'),
(8, 'isna', 'malang', '08847'),
(9, 'a', 'malang', '00000'),
(10, 'b', 'malang', '08080808');

-- --------------------------------------------------------

--
-- Struktur dari tabel `atasan`
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
-- Dumping data untuk tabel `atasan`
--

INSERT INTO `atasan` (`id_atasan`, `Nama`, `Jenis`, `Merk`, `Ukuran`, `Tgl_masuk`, `Harga`, `Jumlah`, `Gambar`) VALUES
(1, 'reglan', 'kaos panjang', 'denim', 'xl', '2018-04-03', '20.000', '30', ''),
(2, 'bixi', 'kemeja', 'kr', 'x', '2018-04-04', '50.000', '34', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
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
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `id_kategori`, `harga`, `jumlah`, `id_admin`, `id_ukuran`, `tgl_masuk`, `Gambar`) VALUES
(1, 'cutete', 2, '180000', '12', 3, 1, '2018-05-03', ''),
(2, 'abc', 2, '50000', '10', 4, 2, '2018-05-16', ''),
(3, 'qwerty', 1, '100000', '25', 4, 3, '2018-05-08', ''),
(4, 'zxc', 1, '20000000', '40', 8, 4, '2018-05-02', ''),
(5, 'blaa', 2, '400000000', '50', 8, 5, '2018-05-09', ''),
(6, 'aaa', 1, '4000000', '50', 5, 1, '2018-05-08', ''),
(7, 'asd', 2, '3000000', '20', 5, 1, '2018-05-22', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bawahan`
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
-- Dumping data untuk tabel `bawahan`
--

INSERT INTO `bawahan` (`id_bawahan`, `Nama`, `Jenis`, `Merk`, `Ukuran`, `Tgl_masuk`, `Harga`, `Jumlah`, `Gambar`) VALUES
(1, 'jj', 'clana panjang', 'jeans', 'm', '2018-04-03', '120.000', '34', ''),
(2, 'blur', 'rok', 'dd', 's', '2018-04-11', '14.000', '21', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'kaos'),
(2, 'jaket'),
(4, 'cardigan'),
(5, 'a'),
(6, 'b'),
(7, 'c'),
(8, 'd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukuran`
--

CREATE TABLE `ukuran` (
  `id_ukuran` int(10) NOT NULL,
  `nama_ukuran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ukuran`
--

INSERT INTO `ukuran` (`id_ukuran`, `nama_ukuran`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, 'XXL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `alamat`, `email`, `no_tlp`, `username`, `password`, `tanggal`) VALUES
(1, 'aaa', 'jl', 'aaa@gmail.com', '098765', 'aaa', '47bce5c74f589f4867dbd57e9ca9f808', '2018-07-11 14:23:56'),
(2, 'bbb', 'suhat', 'bbb@gmail.com', '12345', 'bbb', '08f8e0260c64418510cefb2b06eee5cd', '2018-07-11 15:01:04'),
(3, 'ccc', 'malang', 'ccc', '22222', 'ccc', '9df62e693988eb4e1e1444ece0578579', '2018-07-11 15:03:55'),
(4, 'abc', 'mlg', 'abc@gmail.com', '11111', 'abc', '900150983cd24fb0d6963f7d28e17f72', '2018-07-11 15:05:13'),
(5, 'zzz', 'jkt', 'zzz@gmail.com', '121212', 'zzz', 'f3abb86bd34cf4d52698f14c0da1dc60', '2018-07-11 15:09:01'),
(6, 'qwerty', 'asd', 'qwerty@gmail.com', '65432', 'qwerty', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2018-07-11 15:10:00'),
(7, 'sss', 'lawang', 'sss@gmail.com', '212121', 'sss', '9f6e6800cfae7749eb6c486619254b9c', '2018-07-12 00:09:00'),
(8, 'ppp', 'sby', 'ppp', '223344', 'ppp', 'f27f6f1c7c5cbf4e3e192e0a47b85300', '2018-07-12 09:07:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `atasan`
--
ALTER TABLE `atasan`
  ADD PRIMARY KEY (`id_atasan`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`) USING BTREE,
  ADD KEY `id_admin` (`id_admin`) USING BTREE,
  ADD KEY `id_ukuran` (`id_ukuran`);

--
-- Indexes for table `bawahan`
--
ALTER TABLE `bawahan`
  ADD PRIMARY KEY (`id_bawahan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `atasan`
--
ALTER TABLE `atasan`
  MODIFY `id_atasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `bawahan`
--
ALTER TABLE `bawahan`
  MODIFY `id_bawahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id_ukuran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
