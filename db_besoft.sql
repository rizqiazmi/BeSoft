-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 21, 2023 at 03:17 AM
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
  `kategori` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `stok` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_daftar_menu`
--

INSERT INTO `tb_daftar_menu` (`id`, `foto`, `nama_menu`, `keterangan`, `kategori`, `harga`, `stok`) VALUES
(3, 'Abc1', 'abc1@abc.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2', '', 'Jalan Merdeka Jalan Kolang-Kaling'),
(4, 'Owner', 'admin@admin.com', '827ccb0eea8a706c4c34a16891f84e7b', '1', '', ''),
(5, 'Abc2', 'abc2@abc.com', '5f4dcc3b5aa765d61d8327deb882cf99', '3', '', ''),
(6, 'Abc3', 'abc3@abc.com', '5f4dcc3b5aa765d61d8327deb882cf99', '4', '', ''),
(16, 'Rizqi', 'rizqi@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '1', '', 'Jln. Ra Kartini 1B No. 27'),
(17, 'Tengku', 'tengku@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '1', '', 'lorem ipsum'),
(18, 'Adam', 'adam@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2', '', 'lorem ipsum\r\n');

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
