-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 23, 2023 at 10:09 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_besoft`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftar_menu`
--

CREATE TABLE `tb_daftar_menu` (
  `id` int(10) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `nama_menu` varchar(200) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `kategori` int(10) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `stok` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_daftar_menu`
--

INSERT INTO `tb_daftar_menu` (`id`, `foto`, `nama_menu`, `keterangan`, `kategori`, `harga`, `stok`) VALUES
(24, '35326-1.png', 'Mie Aceh', 'Asli dari Aceh', 1, '20000', '15'),
(25, '39271-2.png', 'Burger', 'Burger Bangor', 2, '30000', '10'),
(26, '40204-3.png', 'Kare Iga', 'Makanan khas Aceh', 1, '18000', '20'),
(27, '71909-4.png', 'Kopi', 'Kopi kenagan', 4, '25000', '10'),
(28, '33205-5.png', 'Es Timun Serut', 'Kesegaran tiada tara', 3, '15000', '10'),
(29, '22850-6.png', 'Udang Asam Manis', 'Udang segar pilihan', 1, '20000', '15'),
(30, '17477-7.png', 'Bakso', 'Bakso aci', 2, '10000', '20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori_menu`
--

CREATE TABLE `tb_kategori_menu` (
  `id_kat_menu` int(10) NOT NULL,
  `jenis_menu` int(10) NOT NULL,
  `kategori_menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_kategori_menu`
--

INSERT INTO `tb_kategori_menu` (`id_kat_menu`, `jenis_menu`, `kategori_menu`) VALUES
(1, 1, 'Nasi'),
(2, 1, 'Snack'),
(3, 2, 'Jus'),
(4, 2, 'Kopi'),
(5, 1, 'Lontong'),
(6, 2, 'Teh'),
(7, 1, 'Nasi Padang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(10) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` int(10) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `alamat` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `level`, `nohp`, `alamat`) VALUES
(3, 'Abc1', 'abc1@abc.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, '123456789011', 'Jalan Merdeka Jalan Kolang-Kaling'),
(4, 'Owner', 'admin@admin.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, '123456789011', ''),
(5, 'Abc2', 'abc2@abc.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '123456789011', ''),
(6, 'Abc3', 'abc3@abc.com', '5f4dcc3b5aa765d61d8327deb882cf99', 4, '123456789011', ''),
(16, 'Rizqi', 'rizqi@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '081252351321', 'Jln. Ra Kartini 1B No. 27'),
(17, 'Tengku', 'tengku@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '08123124123', 'lorem ipsum'),
(18, 'Adam', 'adam@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, '08123124123123', 'lorem ipsum\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_daftar_menu`
--
ALTER TABLE `tb_daftar_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK1` (`kategori`);

--
-- Indexes for table `tb_kategori_menu`
--
ALTER TABLE `tb_kategori_menu`
  ADD PRIMARY KEY (`id_kat_menu`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_daftar_menu`
--
ALTER TABLE `tb_daftar_menu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_kategori_menu`
--
ALTER TABLE `tb_kategori_menu`
  MODIFY `id_kat_menu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_daftar_menu`
--
ALTER TABLE `tb_daftar_menu`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`kategori`) REFERENCES `tb_kategori_menu` (`id_kat_menu`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
