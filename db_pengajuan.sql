-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jul 2020 pada 05.48
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

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
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `tgl_barang` date NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `model_barang` varchar(100) NOT NULL,
  `fcc_barang` varchar(200) NOT NULL,
  `upc_barang` varchar(100) NOT NULL,
  `hwversi_barang` varchar(100) NOT NULL,
  `cmiit_barang` varchar(100) NOT NULL,
  `kg_barang` varchar(100) NOT NULL,
  `produk_barang` varchar(100) NOT NULL,
  `type_barang` varchar(100) NOT NULL,
  `plug_barang` varchar(100) NOT NULL,
  `mac_barang` varchar(60) NOT NULL,
  `seri_barang` varchar(50) NOT NULL,
  `power_barang` varchar(20) NOT NULL,
  `frek_barang` varchar(50) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `harga_barang` varchar(20) NOT NULL,
  `img_barang` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `id_jenis`, `id_kegiatan`, `id_satuan`, `tgl_barang`, `nama_barang`, `model_barang`, `fcc_barang`, `upc_barang`, `hwversi_barang`, `cmiit_barang`, `kg_barang`, `produk_barang`, `type_barang`, `plug_barang`, `mac_barang`, `seri_barang`, `power_barang`, `frek_barang`, `stok_barang`, `harga_barang`, `img_barang`) VALUES
(54, 6, 3, 1, '2019-08-14', 'Laptop Lenovo', '81HM', '', '1931247540', '', '', '', '', '', '', '', 'MP1G82NJ / MO. MPNXB8C2909T', '', '', 1, 'Rp. 3.500.000', 'IMG_20190814_0852265.jpg'),
(56, 6, 3, 1, '2019-08-14', 'Laptop Lenovo', '81HM', '', '193124797540', '', '', '', '', '', '', '', 'MP1G6RP / MO. MPNXB8C2909T', '', '', 1, 'Rp. 3.500.000', 'IMG_20190814_0852267.jpg'),
(57, 10, 3, 1, '2019-08-14', 'BIO FINGER', '', '', '', '', '', '', '', 'AF-460', '', '', 'AF6E175260153', '', '', 1, 'Rp. 2.150.000', 'image2.jpg'),
(58, 4, 1, 1, '2019-05-21', 'Pofung Dual -Band Transceiver', 'UV-6R', '', '', '', '2017FP0432', '', '', '', '', '', '18UV6R04099', '7W', '136174400520', 1, '', 'IMG_20190521_083707.jpg'),
(59, 4, 1, 1, '2019-05-21', 'Pofung Dual -Band Transceiver	', 'UV-6R', '', '', '', '2017FP0433', '', '', '', '', '', '18UV6R04106', '7W', '136174400520', 1, '', 'IMG_20190521_083716.jpg'),
(60, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:33:F7:2/:CC:2D:E0:03:3F:77', '80F108BC6748/737/r2', '', '', 1, '', 'IMG_20190418_0902052.jpg'),
(61, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:33:E3:4/:CC:2D:E0:03:3E:39', '80F108C34593/737/r2', '', '', 1, '', 'IMG_20190418_0902281.jpg'),
(62, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:34:43:A/:CC:2D:E0:03:44:3F', '80F108214F95/737/r2', '', '', 1, '', 'IMG_20190418_0902431.jpg'),
(63, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:33:EB:8/:CC:2D:E0:03:3E:BD', '80F1085B875E/737/r2', '', '', 1, '', 'IMG_20190418_0902491.jpg'),
(64, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:34:10:A/:CC:2D:E0:03:41:0F', '80F1087D8E92/737/r2', '', '', 1, '', 'IMG_20190418_0902582.jpg'),
(65, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:33:F2:4 :/ :CC:2D:E0:03:3F:29', '80F108918215/737/r2', '', '', 1, '', 'IMG_20190418_0903051.jpg'),
(66, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:34:44:6 :/ :CC:2D:E0:03:44:4B', '80F108363025/737/r2', '', '', 1, '', 'IMG_20190418_090312.jpg'),
(67, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:34:2F:0 :/ :CC:2D:E0:03:42:F5', '80F108BF6583/737/r2', '', '', 1, '', 'IMG_20190418_090322.jpg'),
(68, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:34:22:4 :/ :CC:2D:E0:03:42:29', '80F1084271B7/737/r2', '', '', 1, '', 'IMG_20190418_0903052.jpg'),
(69, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:33:FD:8 :/ :CC:2D:E0:03:3F:DD', '80F1080EDC7B/737/r2', '', '', 1, '', 'IMG_20190418_090336.jpg'),
(70, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:34:63:8 :/ :CC:2D:E0:03:46:3D', '80F1081F1869/737/r2', '', '', 1, '', 'IMG_20190418_090346.jpg'),
(71, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:34:47:6 :/ :CC:2D:E0:03:44:7B', '80F10875BC69/737/r2', '', '', 1, '', 'IMG_20190418_090353.jpg'),
(72, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:34:55:4 :/ :CC:2D:E0:03:45:59', '80F1083C2724/737/r2', '', '', 1, '', 'IMG_20190418_090403.jpg'),
(73, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:33:FA:8 :/ :CC:2D:E0:03:3F:AD', '80F1080940D8/737/r2', '', '', 1, '', 'IMG_20190418_090412.jpg'),
(74, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:34:02:C/:CC:2D:E0:03:40:31', '80F10885B4D1/737/r2', '', '', 1, '', 'IMG_20190418_090419.jpg'),
(75, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:33:5B:E/:CC:2D:E0:03:35:C3', '80F1085E2FFC/737/r2', '', '', 1, '', 'IMG_20190418_090602.jpg'),
(76, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:34:06:E :/ :CC:2D:E0:03:40:73', '80F108997489/737/r2', '', '', 1, '', 'IMG_20190418_090433.jpg'),
(77, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:33:51:6 :/ :CC:2D:E0:03:35:1B', '80F108B44448/737/r2', '', '', 1, '', 'IMG_20190418_090440.jpg'),
(78, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:34:35:C :/ :CC:2D:E0:03:43:61', '80F10836ECB4/737/r2', '', '', 1, '', 'IMG_20190418_090447.jpg'),
(79, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:34:15:8 :/ :CC:2D:E0:03:41:5D', '80F108E1CAC1/737/r2', '', '', 1, '', 'IMG_20190418_090455.jpg'),
(80, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:34:29:6 :/ :CC:2D:E0:03:42:9B', '80F108D10CA2/737/r2', '', '', 1, '', 'IMG_20190418_090501.jpg'),
(81, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:33:F9:6 :/ :CC:2D:E0:03:3F:9B', '80F10802FF00/737/r2', '', '', 1, '', 'IMG_20190418_0905011.jpg'),
(82, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:33:F9:6 :/ :CC:2D:E0:03:3F:9B', '80F10802FF00/737/r2', '', '', 1, '', 'IMG_20190418_090509.jpg'),
(83, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:33:F4:2 :/ :CC:2D:E0:03:3F:47', '80F108FFEB04/737/r2', '', '', 1, '', 'IMG_20190418_090517.jpg'),
(84, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:33:EC:4 :/ :CC:2D:E0:03:3E:C9', '80F1084CF8EE/737/r2', '', '', 1, '', 'IMG_20190418_090526.jpg'),
(85, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:34:48:E/:CC:2D:E0:03:44:93', '80F1085B4309/737/r2', '', '', 1, '', 'IMG_20190418_0906021.jpg'),
(86, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:34:18:2 :/ :CC:2D:E0:03:41:87', '80F10854ED51/737/r2', '', '', 1, '', 'IMG_20190418_090614.jpg'),
(87, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:33:7F:E :/ :CC:2D:E0:03:38:03', '80F1087CB868/737/r2', '', '', 1, '', 'IMG_20190418_090619.jpg'),
(88, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:33:81:C :/ :CC:2D:E0:03:38:21', '80F1080A8674/737/r2', '', '', 1, '', 'IMG_20190418_090625.jpg'),
(89, 1, 1, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:33:E1:6 :/ :CC:2D:E0:03:3E:1B', '80F108589D63/737/r2', '', '', 1, '', 'IMG_20190418_090636.jpg'),
(90, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:34:17:0/:CC:2D:E0:03:41:75', '80F1088380AB/737/r2', '', '', 1, '', 'IMG_20190418_090641.jpg'),
(91, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:34:34:4 :/ :CC:2D:E0:03:43:49', '80F108172A92/737/r2', '', '', 1, '', 'IMG_20190418_090647.jpg'),
(92, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:34:18:E/:CC:2D:E0:03:41:93', '80F108440E42/737/r2', '', '', 1, '', 'IMG_20190418_090654.jpg'),
(93, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:34:1F:A :/ :CC:2D:E0:03:41:FF', '80F108F233EF/737/r2', '', '', 1, '', 'IMG_20190418_090703.jpg'),
(94, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:33:A1:A :/ :CC:2D:E0:03:3A:1F', '80F108857086/737/r2', '', '', 1, '', 'IMG_20190418_090749.jpg'),
(95, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:33:9B:A/:CC:2D:E0:03:39:BF', '80F1087A9DE9/737/r2', '', '', 1, '', 'IMG_20190418_090841.jpg'),
(96, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:33:BE:E/:CC:2D:E0:03:3B:F3', '80F108692F48/737/r2', '', '', 1, '', 'IMG_20190418_090854.jpg'),
(97, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:33:B1:0 :/ :CC:2D:E0:03:3B:15', '80F108AEA1A1/737/r2', '', '', 1, '', 'IMG_20190418_090906.jpg'),
(98, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:33:B7:0/:CC:2D:E0:03:3B:75', '80F10829B939/737/r2', '', '', 1, '', 'IMG_20190418_090915.jpg'),
(99, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:33:B2:E :/ :CC:2D:E0:03:3B:33', '80F108A51E79/737/r2', '', '', 1, '', 'IMG_20190418_090921.jpg'),
(100, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:33:9C:0 :/ :CC:2D:E0:03:39:C5', '80F1088493D0/737/r2', '', '', 1, '', 'IMG_20190418_090939.jpg'),
(101, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:33:AD:4/:CC:2D:E0:03:3A:D9', '80F108017223/737/r2', '', '', 1, '', 'IMG_20190418_090943.jpg'),
(102, 1, 4, 1, '2019-04-18', 'RB951Ui -2HnD', '', 'TV7RB951U-2HND', '', '', '', '', '', 'INTL', 'EU', 'C:C2:DE:00:33:8A:6/:CC:2D:E0:03:38:AB', '80F10838B97C/737/r2', '', '', 1, '', 'IMG_20190418_090950.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dinas`
--

CREATE TABLE `tbl_dinas` (
  `id_dinas` int(11) NOT NULL,
  `nama_dinas` varchar(50) NOT NULL,
  `alamat_dinas` varchar(100) NOT NULL,
  `notelp_dinas` varchar(20) NOT NULL,
  `lat_dinas` varchar(25) NOT NULL,
  `long_dinas` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jenis`
--

CREATE TABLE `tbl_jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jenis`
--

INSERT INTO `tbl_jenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'Router'),
(2, 'Switch'),
(3, 'Ubiquiti 19'),
(4, 'HT'),
(5, 'HEADPHONES'),
(6, 'Laptop'),
(7, 'MM'),
(10, 'Finger');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kegiatan`
--

CREATE TABLE `tbl_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `kode_kegiatan` varchar(20) NOT NULL,
  `nama_kegiatan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kegiatan`
--

INSERT INTO `tbl_kegiatan` (`id_kegiatan`, `kode_kegiatan`, `nama_kegiatan`) VALUES
(1, '25.03', 'Kegiatan satu'),
(2, '25.03.01', 'kegiatan dua'),
(3, '24.02', 'Pengembangan Sistem Informasi Pemerintah'),
(4, '26.02', 'Layanan website lembaga, Pelayanan publik dan kegiatan pemerintah daerah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `nama_menu`, `is_active`) VALUES
(1, 'Data Dashboard', 1),
(2, 'Data Master', 1),
(3, 'Data Transaksi', 1),
(6, 'Data Laporan', 1),
(7, 'Data Barang dua', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id_pegawai`, `nama_pegawai`) VALUES
(1, 'Indra L');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_peminjaman`
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
-- Trigger `tbl_peminjaman`
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
-- Struktur dari tabel `tbl_pnmbhnstkbrg`
--

CREATE TABLE `tbl_pnmbhnstkbrg` (
  `id_pnmbhnstkbrg` int(11) NOT NULL,
  `tgl_pnmbhnstkbrg` date NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `tbl_pnmbhnstkbrg`
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
-- Struktur dari tabel `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_role`
--

INSERT INTO `tbl_role` (`id_role`, `nama_role`) VALUES
(1, 'Admin'),
(2, 'Kepada Sie'),
(3, 'Kepala Bidang'),
(4, 'Kepala DInas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_satuan`
--

CREATE TABLE `tbl_satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_satuan`
--

INSERT INTO `tbl_satuan` (`id_satuan`, `nama_satuan`) VALUES
(1, 'Paket');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sub_menu`
--

CREATE TABLE `tbl_sub_menu` (
  `id_sub_menu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `icon_sub_menu` varchar(100) NOT NULL,
  `nama_sub_menu` varchar(50) NOT NULL,
  `link_menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_sub_menu`
--

INSERT INTO `tbl_sub_menu` (`id_sub_menu`, `id_menu`, `icon_sub_menu`, `nama_sub_menu`, `link_menu`) VALUES
(1, 2, 'fa fa-user', 'Master User', 'Cuser/index'),
(2, 2, 'fa fa-book', 'Master Menu', 'Cmenu/index'),
(4, 1, 'fa fa-dashboard', 'Dashboard', 'Cdashboard/index'),
(5, 2, 'fa fa-certificate', 'Master Role', 'Crole/index'),
(6, 2, 'fa fa-book', 'Master Sub Menu', 'Csubmenu/index'),
(8, 2, 'fa fa-pencil', 'Master Barang', 'Cbarang/index'),
(9, 3, 'fa fa-plus', 'Transaksi Stok Barang', 'Cpenambahanstok/index'),
(10, 3, 'fa fa-book', 'Transaksi Barang Keluar', 'Cpeminjaman/index'),
(13, 3, 'fa fa-book', 'Transaksi Barang Rusak', 'Cpengembalian/index'),
(14, 2, 'fa fa-envelope', 'Master Surat', 'Csurat/index'),
(15, 2, 'fa fa-building-o', 'Master Dinas', 'Cdinas/index'),
(16, 2, 'fa fa-list', 'Master Kegiatan', 'Ckegiatan/index'),
(17, 2, 'fa fa-lock', 'Master Satuan', 'Csatuan/index'),
(18, 2, 'fa fa-file', 'Master Jenis Barang', 'Cjenis/index');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_surat`
--

CREATE TABLE `tbl_surat` (
  `id_surat` int(11) NOT NULL,
  `tgl_surat` date NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `tujuan_surat` varchar(100) NOT NULL,
  `img_surat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email_user` varchar(60) NOT NULL,
  `password_user` varchar(100) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `email_user`, `password_user`, `id_role`) VALUES
(1, 'Admin', 'admin@devplus.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(4, 'Lukman', 'lukman@devplus.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(5, 'Dendi', 'dendi@devplus.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(10, 'Kasi Kominfo', 'kasikom@devplus.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 2),
(11, 'Fajar', 'fajar@devplus.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_access`
--

CREATE TABLE `tbl_user_access` (
  `id_user_access` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_sub_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user_access`
--

INSERT INTO `tbl_user_access` (`id_user_access`, `id_role`, `id_sub_menu`) VALUES
(1, 1, 1),
(4, 1, 2),
(5, 1, 8),
(9, 1, 5),
(10, 1, 6),
(14, 1, 7),
(15, 1, 9),
(16, 1, 10),
(17, 1, 13),
(19, 1, 14),
(20, 1, 15),
(21, 1, 4),
(24, 2, 4),
(25, 2, 14),
(26, 1, 16),
(27, 1, 17),
(28, 1, 18);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tbl_dinas`
--
ALTER TABLE `tbl_dinas`
  ADD PRIMARY KEY (`id_dinas`);

--
-- Indeks untuk tabel `tbl_jenis`
--
ALTER TABLE `tbl_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indeks untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indeks untuk tabel `tbl_pnmbhnstkbrg`
--
ALTER TABLE `tbl_pnmbhnstkbrg`
  ADD PRIMARY KEY (`id_pnmbhnstkbrg`);

--
-- Indeks untuk tabel `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `tbl_sub_menu`
--
ALTER TABLE `tbl_sub_menu`
  ADD PRIMARY KEY (`id_sub_menu`);

--
-- Indeks untuk tabel `tbl_surat`
--
ALTER TABLE `tbl_surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tbl_user_access`
--
ALTER TABLE `tbl_user_access`
  ADD PRIMARY KEY (`id_user_access`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT untuk tabel `tbl_dinas`
--
ALTER TABLE `tbl_dinas`
  MODIFY `id_dinas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_jenis`
--
ALTER TABLE `tbl_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_pnmbhnstkbrg`
--
ALTER TABLE `tbl_pnmbhnstkbrg`
  MODIFY `id_pnmbhnstkbrg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_sub_menu`
--
ALTER TABLE `tbl_sub_menu`
  MODIFY `id_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_surat`
--
ALTER TABLE `tbl_surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_user_access`
--
ALTER TABLE `tbl_user_access`
  MODIFY `id_user_access` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
