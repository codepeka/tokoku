-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2021 at 03:23 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(45) NOT NULL,
  `jumlah_stock` int(11) NOT NULL,
  `foto` char(165) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `tgl_buat` datetime NOT NULL,
  `tgl_ubah` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `jumlah_stock`, `foto`, `harga_jual`, `tgl_buat`, `tgl_ubah`) VALUES
(1, 'Sun Light', 3, '', 1000, '2020-10-05 02:11:11', '2021-02-11 08:30:08'),
(2, 'Indomie Goreng', 33, '', 2500, '2020-10-05 16:45:23', '2021-02-11 07:49:11'),
(3, 'LifeBouy Sachet', 6, '', 1000, '2020-10-05 16:29:22', '2021-02-05 09:44:16'),
(4, 'Mama Lemon', 20, '', 1000, '2020-10-05 16:29:37', '2021-02-19 13:29:08'),
(5, 'Indomie Goreng Aceh', 11, '', 2500, '2020-10-05 16:45:09', '2021-01-08 15:07:13'),
(7, 'Gula Merah', 8, '', 2500, '2020-10-05 17:39:17', '2021-02-11 07:49:09'),
(8, 'Beras (1 Kg)', 58, '', 12000, '2020-10-07 04:47:32', '2021-02-11 07:49:07'),
(9, 'Saos ABC (135 ml)', 7, '', 4500, '2020-10-08 16:41:12', '2021-02-19 13:35:38');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id_log` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_user` int(11) NOT NULL,
  `tipe` char(16) NOT NULL,
  `description` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id_log`, `tanggal`, `id_user`, `tipe`, `description`) VALUES
(1, '2020-11-07 06:31:28', 130, 'Login', 'Login LaPesen'),
(2, '2020-11-07 00:34:10', 130, 'Update', 'Ubah Nama Toko'),
(3, '2020-11-07 05:08:05', 130, 'Login', 'Login LaPesen'),
(4, '2020-11-07 05:40:19', 130, 'Login', 'Login LaPesen'),
(5, '2020-11-07 05:57:19', 130, 'Update', 'Ubah Nama Toko'),
(6, '2020-11-07 05:57:21', 130, 'Update', 'Ubah Nama Toko'),
(7, '2020-11-07 07:23:14', 130, 'Login', 'Login LaPesen'),
(8, '2020-11-25 02:14:16', 132, 'Login', 'Login LaPesen'),
(9, '2020-11-27 05:15:45', 132, 'Login', 'Login LaPesen'),
(10, '2020-11-29 21:36:14', 132, 'Login', 'Login LaPesen'),
(11, '2020-12-31 04:38:56', 132, 'Login', 'Login LaPesen'),
(12, '2020-12-31 08:36:42', 132, 'Login', 'Login LaPesen'),
(13, '2021-01-04 00:30:37', 132, 'Login', 'Login LaPesen'),
(14, '2021-01-04 00:32:26', 0, 'Logout', 'Logout LaPesen'),
(15, '2021-01-04 00:35:18', 0, 'Logout', 'Logout LaPesen'),
(16, '2021-01-26 00:11:16', 0, 'Logout', 'Logout LaPesen'),
(17, '2021-02-19 10:38:47', 130, 'Login', 'Login LaPesen'),
(18, '2021-02-19 10:51:53', 132, 'Update', 'Ubah Data Profile'),
(19, '2021-02-19 10:53:27', 132, 'Update', 'Ubah Data Profile'),
(20, '2021-02-19 10:55:42', 132, 'Update', 'Ubah Data Profile'),
(21, '2021-02-19 10:56:06', 132, 'Update', 'Ubah Data Profile'),
(22, '2021-02-19 10:57:45', 132, 'Update', 'Ubah Data Profile');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `telp` varchar(16) NOT NULL,
  `alamat` varchar(65) NOT NULL,
  `tgl_buat` datetime NOT NULL,
  `tgl_ubah` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `tgl_buat` datetime NOT NULL,
  `tgl_ubah` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_user`, `total_harga`, `diskon`, `status`, `tgl_buat`, `tgl_ubah`) VALUES
(1, 132, 13000, 1000, 1, '2020-10-20 19:57:47', '2020-11-02 14:35:10'),
(2, 132, 100000, 5000, 1, '2020-10-27 13:50:43', '2020-11-02 14:35:14'),
(3, 132, 78000, 3000, 1, '2021-01-04 09:43:52', '2021-01-09 15:30:15'),
(4, 132, 1000, 0, 1, '2021-01-09 16:28:19', '2021-02-10 10:17:35'),
(5, 132, 20000, 0, 1, '2021-01-19 14:58:06', '2021-02-10 11:01:06'),
(6, 132, 1000, 0, 1, '2021-02-10 11:21:17', '2021-02-10 11:01:23'),
(7, 132, 0, 0, 0, '2021-02-10 11:48:23', '2021-02-19 13:35:38');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_detail`
--

CREATE TABLE `pemesanan_detail` (
  `id_pemesanan_detail` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `harga_asli` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `tgl_buat` datetime NOT NULL,
  `tgl_ubah` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan_detail`
--

INSERT INTO `pemesanan_detail` (`id_pemesanan_detail`, `id_pemesanan`, `id_barang`, `id_pembeli`, `harga_asli`, `jumlah_barang`, `tgl_buat`, `tgl_ubah`) VALUES
(1, 1, 8, 0, 12000, 1, '2020-10-20 20:27:21', '2020-10-20 13:27:21'),
(2, 1, 3, 0, 1000, 1, '2020-10-20 20:29:48', '2020-10-20 13:29:48'),
(3, 2, 8, 0, 96000, 8, '2020-10-27 15:46:59', '2020-10-27 08:46:59'),
(4, 2, 3, 0, 1000, 1, '2020-10-27 15:48:32', '2020-10-27 08:48:32'),
(5, 2, 1, 0, 2000, 2, '2020-10-27 15:49:47', '2020-10-27 08:49:47'),
(6, 2, 4, 0, 1000, 1, '2020-10-27 15:49:47', '2020-10-27 08:49:47'),
(13, 3, 3, 0, 1000, 16, '0000-00-00 00:00:00', '2021-01-08 18:57:50'),
(17, 3, 2, 0, 2500, 1, '0000-00-00 00:00:00', '2021-01-08 14:40:02'),
(18, 3, 4, 0, 1000, 1, '0000-00-00 00:00:00', '2021-01-08 15:03:31'),
(20, 3, 8, 0, 12000, 1, '0000-00-00 00:00:00', '2021-01-08 15:06:53'),
(22, 3, 5, 0, 2500, 1, '0000-00-00 00:00:00', '2021-01-08 15:07:13'),
(23, 3, 1, 0, 1000, 1, '0000-00-00 00:00:00', '2021-01-08 15:07:15'),
(24, 3, 7, 0, 2500, 1, '0000-00-00 00:00:00', '2021-01-08 15:45:14'),
(29, 3, 9, 0, 4500, 9, '0000-00-00 00:00:00', '2021-01-09 13:18:28'),
(30, 5, 4, 0, 1000, 1, '0000-00-00 00:00:00', '2021-01-26 05:09:38'),
(34, 5, 3, 0, 1000, 1, '0000-00-00 00:00:00', '2021-02-05 09:44:16'),
(36, 5, 2, 0, 2500, 1, '0000-00-00 00:00:00', '2021-02-05 10:44:58'),
(37, 5, 1, 0, 1000, 1, '0000-00-00 00:00:00', '2021-02-05 11:53:00'),
(38, 5, 8, 0, 12000, 1, '0000-00-00 00:00:00', '2021-02-05 11:53:05'),
(39, 5, 7, 0, 2500, 1, '0000-00-00 00:00:00', '2021-02-05 11:54:11'),
(40, 4, 4, 0, 1000, 1, '0000-00-00 00:00:00', '2021-02-10 10:17:32'),
(41, 6, 4, 0, 1000, 1, '0000-00-00 00:00:00', '2021-02-10 10:46:31'),
(42, 7, 8, 0, 12000, 16, '0000-00-00 00:00:00', '2021-02-11 07:49:15'),
(43, 7, 7, 0, 2500, 1, '0000-00-00 00:00:00', '2021-02-11 07:49:09'),
(44, 7, 2, 0, 2500, 1, '0000-00-00 00:00:00', '2021-02-11 07:49:11'),
(47, 7, 4, 0, 1000, 1, '0000-00-00 00:00:00', '2021-02-19 13:29:08'),
(48, 7, 9, 0, 4500, 1, '0000-00-00 00:00:00', '2021-02-19 13:35:38');

--
-- Triggers `pemesanan_detail`
--
DELIMITER $$
CREATE TRIGGER `TambahPemesananDetail` AFTER INSERT ON `pemesanan_detail` FOR EACH ROW BEGIN
	UPDATE barang SET jumlah_stock = jumlah_stock - NEW.jumlah_barang WHERE 			barang.id_barang = NEW.id_barang;
    UPDATE pemesanan SET pemesanan.tgl_ubah = NOW() WHERE 			    				pemesanan.id_pemesanan = NEW.id_pemesanan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(11) NOT NULL,
  `nama_toko` varchar(35) NOT NULL,
  `tgl_buat` datetime NOT NULL,
  `tgl_ubah` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `nama_toko`, `tgl_buat`, `tgl_ubah`) VALUES
(1, 'TOKO \"OTONG PUTRA JAYA 69\"', '2020-11-04 20:03:48', '2020-11-07 06:34:10');

-- --------------------------------------------------------

--
-- Table structure for table `stock_barang`
--

CREATE TABLE `stock_barang` (
  `id_stock` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `tgl_buat` datetime NOT NULL,
  `tgl_ubah` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_barang`
--

INSERT INTO `stock_barang` (`id_stock`, `id_barang`, `jumlah`, `harga_beli`, `tgl_buat`, `tgl_ubah`) VALUES
(1, 1, 10, 9000, '2020-10-06 14:31:07', '2020-10-06 08:14:29'),
(2, 2, 40, 86500, '2020-10-06 10:05:19', '2020-10-08 15:43:46'),
(4, 3, 10, 10000, '2020-10-08 12:58:53', '2020-10-08 11:08:43'),
(5, 8, 20, 200000, '2020-10-08 13:11:35', '2020-10-08 11:11:35'),
(7, 7, 12, 25000, '2020-10-08 16:09:17', '2020-10-08 15:26:57'),
(9, 4, 7, 4000, '2020-10-08 17:12:14', '2020-10-08 15:16:42'),
(10, 4, 22, 20000, '2020-10-08 17:17:43', '2020-10-08 15:20:23'),
(12, 5, 12, 25000, '2020-10-08 17:51:29', '2020-10-08 15:53:31'),
(13, 9, 5, 25000, '2020-10-08 17:55:18', '2020-10-08 15:55:18'),
(14, 8, 50, 50000, '2020-10-08 17:59:07', '2020-10-08 15:59:07'),
(16, 9, 10, 45000, '2020-10-30 13:56:21', '2020-10-30 13:40:59');

--
-- Triggers `stock_barang`
--
DELIMITER $$
CREATE TRIGGER `hapusStock` AFTER DELETE ON `stock_barang` FOR EACH ROW BEGIN
	UPDATE barang SET jumlah_stock = jumlah_stock - OLD.jumlah 	WHERE 			barang.id_barang = OLD.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambahStock` AFTER INSERT ON `stock_barang` FOR EACH ROW BEGIN
	UPDATE barang SET jumlah_stock = jumlah_stock + NEW.jumlah WHERE 			barang.id_barang = NEW.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ubahStock` BEFORE UPDATE ON `stock_barang` FOR EACH ROW BEGIN
	UPDATE barang SET jumlah_stock = jumlah_stock - OLD.jumlah + NEW.jumlah 	WHERE barang.id_barang = NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` char(45) NOT NULL,
  `username` char(45) NOT NULL,
  `password` char(125) NOT NULL,
  `hak` enum('admin','owner','karyawan') NOT NULL,
  `owner_is` tinyint(11) NOT NULL,
  `tgl_buat` datetime NOT NULL,
  `tgl_ubah` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `hak`, `owner_is`, `tgl_buat`, `tgl_ubah`) VALUES
(130, 'Jonatan Zilguin', 'jonatai', 'fa0b0e5ccd2973e580bd466b6978f8a0', 'owner', 0, '2020-10-06 12:02:48', '2020-11-02 11:36:08'),
(132, 'Bejo Suseno', 'suseno', '533c00a36999afb9fd83e9f0e603a461', 'karyawan', 0, '2020-10-06 12:04:40', '2021-02-19 16:53:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pemesanan_detail`
--
ALTER TABLE `pemesanan_detail`
  ADD PRIMARY KEY (`id_pemesanan_detail`),
  ADD KEY `relasi_ke_pemesan` (`id_pemesanan`),
  ADD KEY `relasi_ke_barang` (`id_barang`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `stock_barang`
--
ALTER TABLE `stock_barang`
  ADD PRIMARY KEY (`id_stock`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pemesanan_detail`
--
ALTER TABLE `pemesanan_detail`
  MODIFY `id_pemesanan_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stock_barang`
--
ALTER TABLE `stock_barang`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `pemesanan_detail`
--
ALTER TABLE `pemesanan_detail`
  ADD CONSTRAINT `relasi_ke_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `relasi_ke_pemesan` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`);

--
-- Constraints for table `stock_barang`
--
ALTER TABLE `stock_barang`
  ADD CONSTRAINT `stock_barang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
