-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2022 at 08:54 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukom_kasir2`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_order`
--

CREATE TABLE `detail_order` (
  `id_detail_order` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `status_detail_order` enum('belum_checkout','sudah_checkout') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_order`
--

INSERT INTO `detail_order` (`id_detail_order`, `id_order`, `id_menu`, `keterangan`, `status_detail_order`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '', 'sudah_checkout', '0000-00-00 00:00:00', '2022-03-30 09:50:38'),
(2, 1, 1, '', 'sudah_checkout', '0000-00-00 00:00:00', '2022-03-30 09:50:38'),
(3, 1, 1, '', 'sudah_checkout', '0000-00-00 00:00:00', '2022-03-30 09:50:38'),
(4, 1, 5, '', 'sudah_checkout', '0000-00-00 00:00:00', '2022-03-30 09:50:38'),
(5, 1, 5, '', 'sudah_checkout', '0000-00-00 00:00:00', '2022-03-30 09:50:38'),
(6, 1, 5, '', 'sudah_checkout', '0000-00-00 00:00:00', '2022-03-30 09:50:38'),
(7, 2, 4, '', 'sudah_checkout', '0000-00-00 00:00:00', '2022-03-30 10:11:19'),
(8, 3, 1, 'test', 'sudah_checkout', '0000-00-00 00:00:00', '2022-03-30 11:01:28'),
(9, 3, 1, 'test', 'sudah_checkout', '0000-00-00 00:00:00', '2022-03-30 11:01:28'),
(10, 3, 1, '', 'sudah_checkout', '0000-00-00 00:00:00', '2022-03-30 11:01:28'),
(11, 3, 1, '', 'sudah_checkout', '0000-00-00 00:00:00', '2022-03-30 11:01:28'),
(12, 3, 4, '', 'sudah_checkout', '0000-00-00 00:00:00', '2022-03-30 11:01:28'),
(13, 3, 4, '', 'sudah_checkout', '0000-00-00 00:00:00', '2022-03-30 11:01:28'),
(14, 3, 4, '', 'sudah_checkout', '0000-00-00 00:00:00', '2022-03-30 11:01:28');

-- --------------------------------------------------------

--
-- Table structure for table `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id_log_aktivitas` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_aktivitas` datetime NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `user_agent` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_aktivitas`
--

INSERT INTO `log_aktivitas` (`id_log_aktivitas`, `id_user`, `tanggal_aktivitas`, `deskripsi`, `user_agent`) VALUES
(1, 1, '2022-03-30 09:19:28', 'Insert data User id_user:2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(3, 1, '2022-03-30 09:20:24', 'Update data User id_user:2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(4, 1, '2022-03-30 09:21:25', 'Insert data User id_user:3', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(5, 1, '2022-03-30 09:29:37', 'Insert data User id_user:4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(6, 1, '2022-03-30 09:30:02', 'Update data User id_user:4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(7, 1, '2022-03-30 09:30:11', 'Delete data User id_user:4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(8, 3, '2022-03-30 09:34:47', 'Update data User id_user:3', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(9, 3, '2022-03-30 09:35:10', 'Update data User id_user:3', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(10, 2, '2022-03-30 09:43:20', 'Insert data Menu id_menu:1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(11, 2, '2022-03-30 09:44:19', 'Insert data Menu id_menu:2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(12, 2, '2022-03-30 09:45:31', 'Insert data Menu id_menu:3', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(13, 2, '2022-03-30 09:46:33', 'Insert data Menu id_menu:4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(14, 2, '2022-03-30 09:47:18', 'Insert data Menu id_menu:5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(15, 3, '2022-03-30 09:49:39', 'Insert data Order id_order:1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(16, 3, '2022-03-30 09:50:38', 'Insert data Transaksi id_transaksi:1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(17, 3, '2022-03-30 09:50:38', 'Update data Detail Order id_detail_order:1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(18, 3, '2022-03-30 09:50:38', 'Update data Detail Order id_detail_order:2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(19, 3, '2022-03-30 09:50:38', 'Update data Detail Order id_detail_order:3', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(20, 3, '2022-03-30 09:50:38', 'Update data Detail Order id_detail_order:4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(21, 3, '2022-03-30 09:50:38', 'Update data Detail Order id_detail_order:5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(22, 3, '2022-03-30 09:50:38', 'Update data Detail Order id_detail_order:6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(23, 3, '2022-03-30 09:50:38', 'Update data Order id_order:1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(24, 3, '2022-03-30 10:11:08', 'Insert data Order id_order:2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(25, 3, '2022-03-30 10:11:19', 'Insert data Transaksi id_transaksi:2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(26, 3, '2022-03-30 10:11:19', 'Update data Detail Order id_detail_order:7', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(27, 3, '2022-03-30 10:11:19', 'Update data Order id_order:2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(28, 1, '2022-03-30 10:57:37', 'Insert data User id_user:5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(29, 2, '2022-03-30 10:59:23', 'Update data Menu id_menu:1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(30, 2, '2022-03-30 10:59:34', 'Update data Menu id_menu:1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(31, 3, '2022-03-30 11:00:26', 'Insert data Order id_order:3', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(32, 3, '2022-03-30 11:01:28', 'Insert data Transaksi id_transaksi:3', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(33, 3, '2022-03-30 11:01:28', 'Update data Detail Order id_detail_order:8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(34, 3, '2022-03-30 11:01:28', 'Update data Detail Order id_detail_order:9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(35, 3, '2022-03-30 11:01:28', 'Update data Detail Order id_detail_order:10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(36, 3, '2022-03-30 11:01:28', 'Update data Detail Order id_detail_order:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(37, 3, '2022-03-30 11:01:28', 'Update data Detail Order id_detail_order:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(38, 3, '2022-03-30 11:01:28', 'Update data Detail Order id_detail_order:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(39, 3, '2022-03-30 11:01:28', 'Update data Detail Order id_detail_order:14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(40, 3, '2022-03-30 11:01:28', 'Update data Order id_order:3', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(35) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `status_menu` varchar(50) NOT NULL,
  `tipe_menu` enum('makanan','minuman') NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga`, `status_menu`, `tipe_menu`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Ayam Bakar', '30000', 'tersedia', 'makanan', '1648608200_4792ddbd8a63970600cf.jpeg', '2022-03-30 09:43:20', '2022-03-30 10:59:34'),
(2, 'Hamburger', '15000', 'tersedia', 'makanan', '1648608259_14cf9198461e9caa1b64.jpg', '2022-03-30 09:44:19', '0000-00-00 00:00:00'),
(3, 'Fried Chicken', '15000', 'tersedia', 'makanan', '1648608330_2a152db4538bf4d84f43.png', '2022-03-30 09:45:31', '0000-00-00 00:00:00'),
(4, 'Spaghetti', '17000', 'tersedia', 'makanan', '1648608393_da3b6432c5c62097938f.jpg', '2022-03-30 09:46:33', '0000-00-00 00:00:00'),
(5, 'Coca Cola', '8000', 'tersedia', 'minuman', '1648608438_2419af1d353a109b4cd8.jpeg', '2022-03-30 09:47:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2022-03-08-134644', 'App\\Database\\Migrations\\User', 'default', 'App', 1648605927, 1),
(2, '2022-03-10-130952', 'App\\Database\\Migrations\\Menu', 'default', 'App', 1648605927, 1),
(3, '2022-03-12-095352', 'App\\Database\\Migrations\\DetailOrder', 'default', 'App', 1648605927, 1),
(4, '2022-03-12-095431', 'App\\Database\\Migrations\\Order', 'default', 'App', 1648605927, 1),
(5, '2022-03-19-044705', 'App\\Database\\Migrations\\Transaksi', 'default', 'App', 1648605927, 1),
(6, '2022-03-25-151610', 'App\\Database\\Migrations\\LogAktivitas', 'default', 'App', 1648605927, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `tanggal_order` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `status_order` enum('belum_bayar','sudah_bayar') NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `no_meja`, `tanggal_order`, `id_user`, `keterangan`, `status_order`, `updated_at`) VALUES
(1, 1, '2022-03-30 09:49:39', 3, '', 'sudah_bayar', '2022-03-30 09:50:38'),
(2, 3, '2022-03-30 10:11:08', 3, '', 'sudah_bayar', '2022-03-30 10:11:19'),
(3, 10, '2022-03-30 11:00:26', 3, 'test', 'sudah_bayar', '2022-03-30 11:01:28');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `uang` decimal(10,2) NOT NULL,
  `kembali` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_order`, `tanggal_transaksi`, `total_harga`, `uang`, `kembali`) VALUES
(1, 3, 1, '2022-03-29 09:50:38', '114000.00', '114000.00', '0.00'),
(2, 3, 2, '2022-03-30 10:11:19', '17000.00', '17000.00', '0.00'),
(3, 3, 3, '2022-03-30 11:01:28', '171000.00', '200000.00', '29000.00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `level` enum('admin','manajer','kasir') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `image`, `level`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '$2y$10$H.Fp5ARmbC.ZA9Ws30bwNOf2o6R8ng3oPTspsF0WfHRTBWRuoGKaa', '1648606581_d8bfad780f0297970776.png', 'admin', '2022-03-30 09:16:21', '0000-00-00 00:00:00'),
(2, 'manajer', 'manajer', '$2y$10$kI7hZjcVlKqYwMZhCqgCa.EtziY0WTDY29NGxNi8sEOPMSPtDKB5G', '1648606824_1e17623ed1db660268dd.png', 'manajer', '2022-03-30 09:19:28', '2022-03-30 09:20:24'),
(3, 'kasir', 'kasir', '$2y$10$n0jcN.07SqWZwbSb3ZZ93uPRKy2uPjmbQ63Qm.kTe0PVLcas5VvB2', '1648607710_587426d0385f5b8b3602.png', 'kasir', '2022-03-30 09:21:25', '2022-03-30 09:35:10'),
(5, 'kasir2', 'kasir2', '$2y$10$yQ5IUav5rAax2ViNwAcYg.Vd4Q95RPWIx/aYx9l9ygR6GoeXC/1lK', '1648612657_dc4ffbc61446d99a4aac.png', 'kasir', '2022-03-30 10:57:37', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id_detail_order`),
  ADD KEY `id_order` (`id_order`,`id_menu`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id_log_aktivitas`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`,`id_order`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id_detail_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id_log_aktivitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD CONSTRAINT `detail_order_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_order_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD CONSTRAINT `log_aktivitas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
