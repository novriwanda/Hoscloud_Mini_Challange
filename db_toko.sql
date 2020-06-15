-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2020 at 08:35 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_order`
--

CREATE TABLE `tbl_detail_order` (
  `id_detail_order` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_order`
--

INSERT INTO `tbl_detail_order` (`id_detail_order`, `id_produk`, `id_order`, `id_user`, `jumlah`, `created_at`, `created_date`, `modified_by`, `modified_date`, `is_active`) VALUES
(1, 11, 1, 1, 1, 1, '2020-06-15 03:16:53', 1, '2020-06-15 03:16:53', b'1'),
(2, 9, 1, 1, 1, 1, '2020-06-15 03:16:53', 1, '2020-06-15 03:16:53', b'1'),
(3, 7, 1, 1, 1, 1, '2020-06-15 03:16:53', 1, '2020-06-15 03:16:53', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kategori` varchar(30) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id`, `nama_kategori`, `created_at`, `created_date`, `modified_by`, `modified_date`, `is_active`) VALUES
(1, 'Laptop', 0, '2020-06-14 22:31:49', 0, '2020-06-14 22:31:49', b'1'),
(2, 'Smartphone', 0, '2020-06-14 22:31:49', 0, '2020-06-14 22:31:49', b'1'),
(3, 'Robot', 0, '2020-06-14 22:31:49', 0, '2020-06-14 22:31:49', b'1'),
(4, 'Clothing', 2, '2020-06-15 01:16:35', 0, '2020-06-15 01:16:35', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `created_at` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id_order`, `id_user`, `id_status`, `alamat`, `no_telp`, `created_at`, `created_date`, `modified_by`, `modified_date`, `is_active`) VALUES
(1, 1, 1, 'perumahan beringin indah lestari', '081364775782', 1, '2020-06-15 03:16:53', 1, '2020-06-15 03:16:53', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(10) UNSIGNED NOT NULL,
  `nama_produk` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(50) DEFAULT NULL,
  `harga` varchar(10) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `kategori` int(10) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `nama_produk`, `deskripsi`, `harga`, `gambar`, `kategori`, `created_at`, `created_date`, `modified_by`, `modified_date`, `is_active`) VALUES
(1, 'Laptop 1', 'Lorem ipsum dolor sit amet, consectetur adipisicin', '3500000', 'laptop1.jpg', 1, 0, '2020-06-15 01:16:17', 0, '2020-06-15 01:16:17', b'1'),
(2, 'Laptop 2', 'Lorem ipsum dolor sit amet, consectetur adipisicin', '6250000', 'laptop2.jpg', 1, 0, '2020-06-15 01:16:17', 0, '2020-06-15 01:16:17', b'1'),
(3, 'Laptop 3', 'Lorem ipsum dolor sit amet, consectetur adipisicin', '7250000', 'laptop3.jpg', 1, 0, '2020-06-15 01:16:17', 0, '2020-06-15 01:16:17', b'1'),
(4, 'Smartphone 1', 'Lorem ipsum dolor sit amet, consectetur adipisicin', '3560000', 'hp1.jpg', 2, 0, '2020-06-15 01:16:17', 0, '2020-06-15 01:16:17', b'1'),
(5, 'Smartphone 2', 'Lorem ipsum dolor sit amet, consectetur adipisicin', '4300000', 'hp2.jpg', 2, 0, '2020-06-15 01:16:17', 0, '2020-06-15 01:16:17', b'1'),
(6, 'Smartphone 3', 'Lorem ipsum dolor sit amet, consectetur adipisicin', '5100000', 'hp3.jpg', 2, 0, '2020-06-15 01:16:17', 0, '2020-06-15 01:16:17', b'1'),
(7, 'Robot 1', 'Lorem ipsum dolor sit amet, consectetur adipisicin', '3500000', 'robot1.jpg', 3, 0, '2020-06-15 01:16:17', 0, '2020-06-15 01:16:17', b'1'),
(8, 'Robot 2', 'Lorem ipsum dolor sit amet, consectetur adipisicin', '4500000', 'robot2.jpg', 3, 0, '2020-06-15 01:16:17', 0, '2020-06-15 01:16:17', b'1'),
(9, 'Robot 3', 'Lorem ipsum dolor sit amet, consectetur adipisicin', '6100000', 'robot3.jpg', 3, 0, '2020-06-15 01:16:17', 0, '2020-06-15 01:16:17', b'1'),
(11, 'Drip Limited', 'Edisi La Viest Belle', '110000', 'Capture1.JPG', 4, 2, '2020-06-15 01:39:31', 2, '2020-06-14 21:11:33', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(10) NOT NULL,
  `crated_at` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`id_status`, `nama_status`, `crated_at`, `created_date`, `modified_by`, `modified_date`, `is_active`) VALUES
(1, 'menunggu', 1, '2020-06-15 02:44:54', 1, '2020-06-15 02:44:54', b'1'),
(2, 'diproses', 1, '2020-06-15 02:44:54', 1, '2020-06-15 02:44:54', b'1'),
(3, 'dikirim', 1, '2020-06-15 02:44:54', 1, '2020-06-15 02:44:54', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `create_by` int(11) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `birthday`, `email`, `password`, `role`, `create_by`, `createdDate`, `modified_by`, `modified_date`, `is_active`) VALUES
(1, 'Novri Wanda', '1998-03-12', 'novriiwanda@gmail.com', '$2y$10$IZvVGeGo2JdVTCFbP0u0p.CeKBQzH8JF615e7vEF563MQUmrBr8Yq', 'user', 0, '2020-06-14 21:21:01', 0, '2020-06-14 21:21:01', b'1'),
(2, 'admin', '2020-06-02', 'admin@drip.com', 'admin', 'admin', 0, '2020-06-14 21:30:26', 0, '2020-06-14 21:30:26', b'1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  ADD PRIMARY KEY (`id_detail_order`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  MODIFY `id_detail_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  ADD CONSTRAINT `tbl_detail_order_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `tbl_order` (`id_order`);

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `tbl_status` (`id_status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
