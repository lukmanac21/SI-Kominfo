-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2020 at 05:00 AM
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
-- Database: `db_pengajuan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(11) NOT NULL,
  `tgl_barang` date NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `mac_barang` varchar(60) NOT NULL,
  `seri_barang` varchar(50) NOT NULL,
  `stok_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `tgl_barang`, `nama_barang`, `mac_barang`, `seri_barang`, `stok_barang`) VALUES
(8, '0000-00-00', 'Mikrotik', '', 'A91', 18),
(9, '0000-00-00', 'Mikrotik Bro', '', '23131', 12),
(10, '0000-00-00', 'Mikrotik Bro', '', '231312', 12),
(11, '0000-00-00', 'Flashdisk', '', '231312', 10),
(12, '0000-00-00', 'dsad', '', '100sdada', 10),
(13, '0000-00-00', 'dasdada', '', 'sdaada', 2),
(14, '0000-00-00', 'Flashdisk', '', '121', 211),
(15, '2020-06-17', 'barang 1231', '12:31:31:23:13', 'dsaada', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dinas`
--

CREATE TABLE `tbl_dinas` (
  `id_dinas` int(11) NOT NULL,
  `nama_dinas` varchar(50) NOT NULL,
  `alamat_dinas` varchar(100) NOT NULL,
  `notelp_dinas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dinas`
--

INSERT INTO `tbl_dinas` (`id_dinas`, `nama_dinas`, `alamat_dinas`, `notelp_dinas`) VALUES
(1, 'Dinas Kesehatan', 'Jalan', '089989898'),
(2, 'Dinas Pariwisata', 'jalan', '0291231');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `nama_menu`, `is_active`) VALUES
(1, 'Data Dashboard', 1),
(2, 'Data Master', 1),
(3, 'Data Transaksi', 1),
(5, 'Data Master Barang', 0),
(6, 'Data Laporan', 1),
(7, 'Data Barang dua', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id_pegawai`, `nama_pegawai`) VALUES
(1, 'Indra L');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peminjaman`
--

CREATE TABLE `tbl_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_peminjaman` int(11) NOT NULL,
  `tgl_pengembalian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_peminjaman`
--

INSERT INTO `tbl_peminjaman` (`id_peminjaman`, `tgl_peminjaman`, `id_barang`, `jumlah_barang`, `id_user`, `status_peminjaman`, `tgl_pengembalian`) VALUES
(9, '2020-06-15', 8, 2, 1, 1, '2020-06-15'),
(10, '2020-06-15', 8, 2, 1, 1, '2020-06-15'),
(11, '2020-06-15', 8, 2, 1, 1, '2020-06-15'),
(12, '2020-06-15', 12, 8, 1, 1, '2020-06-15'),
(13, '2020-06-15', 13, 2, 1, 1, '2020-06-15'),
(14, '2020-06-15', 14, 2, 1, 1, '2020-06-15'),
(15, '2020-06-15', 9, 8, 1, 1, '2020-06-16');

--
-- Triggers `tbl_peminjaman`
--
DELIMITER $$
CREATE TRIGGER `pmnjamanbrg` AFTER INSERT ON `tbl_peminjaman` FOR EACH ROW BEGIN
UPDATE tbl_barang
SET tbl_barang.stok_barang = tbl_barang.stok_barang - new.jumlah_barang
WHERE tbl_barang.id_barang = new.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pngmblianbrg` AFTER UPDATE ON `tbl_peminjaman` FOR EACH ROW BEGIN
UPDATE tbl_barang
set tbl_barang.stok_barang = tbl_barang.stok_barang + old.jumlah_barang
WHERE tbl_barang.id_barang = old.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pnmbhnstkbrg`
--

CREATE TABLE `tbl_pnmbhnstkbrg` (
  `id_pnmbhnstkbrg` int(11) NOT NULL,
  `tgl_pnmbhnstkbrg` date NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pnmbhnstkbrg`
--

INSERT INTO `tbl_pnmbhnstkbrg` (`id_pnmbhnstkbrg`, `tgl_pnmbhnstkbrg`, `id_barang`, `jumlah_barang`) VALUES
(9, '2020-06-12', 8, 8);

--
-- Triggers `tbl_pnmbhnstkbrg`
--
DELIMITER $$
CREATE TRIGGER `krgstokbrg` AFTER DELETE ON `tbl_pnmbhnstkbrg` FOR EACH ROW BEGIN
UPDATE tbl_barang
set tbl_barang.stok_barang = tbl_barang.stok_barang - old.jumlah_barang
WHERE tbl_barang.id_barang = old.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tmbhstokbrg` AFTER INSERT ON `tbl_pnmbhnstkbrg` FOR EACH ROW BEGIN
UPDATE tbl_barang
set tbl_barang.stok_barang = tbl_barang.stok_barang + new.jumlah_barang
WHERE tbl_barang.id_barang = new.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id_role`, `nama_role`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Kepala Bidang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_menu`
--

CREATE TABLE `tbl_sub_menu` (
  `id_sub_menu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `icon_sub_menu` varchar(100) NOT NULL,
  `nama_sub_menu` varchar(50) NOT NULL,
  `link_menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sub_menu`
--

INSERT INTO `tbl_sub_menu` (`id_sub_menu`, `id_menu`, `icon_sub_menu`, `nama_sub_menu`, `link_menu`) VALUES
(1, 2, 'fa fa-user', 'Master User', 'Cuser/index'),
(2, 2, 'fa fa-book', 'Master Menu', 'Cmenu/index'),
(4, 1, 'fa fa-dashboard', 'Dashboard', 'Cdashboard/index'),
(5, 2, 'fa fa-certificate', 'Master Role', 'Crole/index'),
(6, 2, 'fa fa-book', 'Master Sub Menu', 'Csubmenu/index'),
(7, 4, 'fa fa-cog', 'Coba Sub Menu', 'Ccoba/index'),
(8, 2, 'fa fa-pencil', 'Master Barang', 'Cbarang/index'),
(9, 3, 'fa fa-plus', 'Penambahan Stok Barang', 'Cpenambahanstok/index'),
(10, 3, 'fa fa-book', 'Pengeluaran Barang', 'Cpeminjaman/index'),
(13, 3, 'fa fa-book', 'Kerusakan Barang', 'Cpengembalian/index'),
(14, 2, 'fa fa-envelope', 'Master Surat', 'Csurat/index'),
(15, 2, 'fa fa-building-o', 'Master Dinas', 'Cdinas/index');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email_user` varchar(60) NOT NULL,
  `password_user` varchar(100) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `email_user`, `password_user`, `id_role`) VALUES
(1, 'Admin', 'admin@devplus.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(3, 'Tatsumaki', 'tatsumaki@devplus.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 2),
(4, 'Lukman', 'lukman@devplus.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(5, 'Dendi', 'dendi@devplus.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(6, 'User', 'user@devplus.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_access`
--

CREATE TABLE `tbl_user_access` (
  `id_user_access` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_access`
--

INSERT INTO `tbl_user_access` (`id_user_access`, `id_role`, `id_menu`) VALUES
(1, 1, 1),
(4, 2, 3),
(5, 2, 1),
(8, 1, 5),
(9, 2, 5),
(10, 1, 2),
(14, 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tbl_dinas`
--
ALTER TABLE `tbl_dinas`
  ADD PRIMARY KEY (`id_dinas`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `tbl_pnmbhnstkbrg`
--
ALTER TABLE `tbl_pnmbhnstkbrg`
  ADD PRIMARY KEY (`id_pnmbhnstkbrg`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tbl_sub_menu`
--
ALTER TABLE `tbl_sub_menu`
  ADD PRIMARY KEY (`id_sub_menu`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_user_access`
--
ALTER TABLE `tbl_user_access`
  ADD PRIMARY KEY (`id_user_access`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_dinas`
--
ALTER TABLE `tbl_dinas`
  MODIFY `id_dinas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_pnmbhnstkbrg`
--
ALTER TABLE `tbl_pnmbhnstkbrg`
  MODIFY `id_pnmbhnstkbrg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_sub_menu`
--
ALTER TABLE `tbl_sub_menu`
  MODIFY `id_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user_access`
--
ALTER TABLE `tbl_user_access`
  MODIFY `id_user_access` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
