-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 20, 2019 at 02:19 AM
-- Server version: 10.0.38-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mule7148_kursusmobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_carapesan`
--

CREATE TABLE `tbl_carapesan` (
  `carapesan_id` int(11) NOT NULL,
  `carapesan_urut` int(11) NOT NULL DEFAULT '0',
  `carapesan_nama` text,
  `carapesan_foto` varchar(50) DEFAULT NULL,
  `carapesan_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `carapesan_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_carapesan`
--

INSERT INTO `tbl_carapesan` (`carapesan_id`, `carapesan_urut`, `carapesan_nama`, `carapesan_foto`, `carapesan_created`, `carapesan_updated`) VALUES
(1, 1, 'Sehat Jasmani dan rohani.', '1.jpg', '2019-06-26 10:34:18', '2019-07-01 21:20:21'),
(2, 2, 'Mengisi formulir Pendaftaran dan di tanda tangani.', '2.jpg', '2019-06-26 10:34:18', '2019-07-01 21:20:25'),
(3, 3, 'Menyerahkan foto copy eKTP Identitas yang lain 1 (satu) lembar.', '3.jpg', '2019-06-26 10:34:18', '2019-07-02 00:51:27'),
(4, 4, 'Membayar uang pendaftaran ', '4.jpg', '2019-06-26 10:34:18', '2019-07-02 00:51:00'),
(5, 5, 'Membayar biaya  dilunasi selambat-lambatnya pada jam belajar ke empat', '4.jpg', '2019-06-26 10:34:18', '2019-07-02 00:51:12'),
(6, 6, 'Wajib berprilaku sopan terhadap instruktur.', '4.jpg', '2019-06-26 10:34:18', '2019-07-08 16:34:45'),
(7, 7, 'Bersedia Mengikuti peraturan-peraturan dan ketentuan yang berlaku di STARFI', '4.jpg', '2019-06-26 10:34:18', '2019-07-02 00:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inbox`
--

CREATE TABLE `tbl_inbox` (
  `inbox_id` int(11) NOT NULL,
  `inbox_pengirim` varchar(50) NOT NULL,
  `inbox_pesan` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `inbox_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_inbox`
--

INSERT INTO `tbl_inbox` (`inbox_id`, `inbox_pengirim`, `inbox_pesan`, `user_id`, `inbox_created`) VALUES
(116, 'SISTEM', 'TERIMAKASIH SUDAH MELAKUKAN KONFIRMASI PEMESANAN, MOHON MENUNGGU VALIDASI DARI ADMIN CABANG, TERIMAKASIH.', 6, '2019-07-08 23:29:22'),
(117, 'SISTEM', 'USER harry (harrybukit1701@gmail.com) TELAH MELAKUKAN KONFIRMASI PEMESANAN, KLIK  <a href=\'https://multimediary2019.com/kursusmobil/admin/inbox/1\'>RINCIAN</a> UNTUK MELAKUKAN KONFIRMASI, TERIMAKASIH.', 1, '2019-07-08 23:29:22'),
(118, 'SISTEM', 'TERIMAKASIH SUDAH MELAKUKAN KONFIRMASI PEMESANAN, MOHON MENUNGGU VALIDASI DARI ADMIN CABANG, TERIMAKASIH.', 6, '2019-07-08 23:30:26'),
(119, 'SISTEM', 'USER harry (harrybukit1701@gmail.com) TELAH MELAKUKAN KONFIRMASI PEMESANAN, KLIK  <a href=\'https://multimediary2019.com/kursusmobil/admin/inbox/2\'>RINCIAN</a> UNTUK MELAKUKAN KONFIRMASI, TERIMAKASIH.', 9, '2019-07-08 23:30:26'),
(120, 'SISTEM', 'TERIMAKASIH SUDAH MELAKUKAN KONFIRMASI PEMESANAN, MOHON MENUNGGU VALIDASI DARI ADMIN CABANG, TERIMAKASIH.', 6, '2019-07-08 23:42:45'),
(121, 'SISTEM', 'USER harry (harrybukit1701@gmail.com) TELAH MELAKUKAN KONFIRMASI PEMESANAN, KLIK  <a href=\'https://multimediary2019.com/kursusmobil/admin/inbox/3\'>RINCIAN</a> UNTUK MELAKUKAN KONFIRMASI, TERIMAKASIH.', 9, '2019-07-08 23:42:45'),
(122, 'SISTEM', 'TERIMAKASIH SUDAH MELAKUKAN KONFIRMASI PEMESANAN, MOHON MENUNGGU VALIDASI DARI ADMIN CABANG, TERIMAKASIH.', 3, '2019-07-08 23:56:47'),
(123, 'SISTEM', 'USER Mashum Abdul Jabbar (majabbar1993@gmail.com) TELAH MELAKUKAN KONFIRMASI PEMESANAN, KLIK  <a href=\'https://multimediary2019.com/kursusmobil/admin/inbox/1\'>RINCIAN</a> UNTUK MELAKUKAN KONFIRMASI, TERIMAKASIH.', 1, '2019-07-08 23:56:47'),
(124, 'SISTEM', 'TERIMAKASIH SUDAH MELAKUKAN KONFIRMASI PEMESANAN, MOHON MENUNGGU VALIDASI DARI ADMIN CABANG, TERIMAKASIH.', 3, '2019-07-09 00:17:37'),
(125, 'SISTEM', 'USER Mashum Abdul Jabbar (majabbar1993@gmail.com) TELAH MELAKUKAN KONFIRMASI PEMESANAN, KLIK  <a href=\'https://multimediary2019.com/kursusmobil/admin/inbox/2\'>RINCIAN</a> UNTUK MELAKUKAN KONFIRMASI, TERIMAKASIH.', 1, '2019-07-09 00:17:37'),
(126, 'ADMIN CABANG', 'KONFIRMASI PEMESANAN JADWAL SUDAH DI VALIDASI. SILAHKAN KLIK LINK BERIKUT UNTUK MENENTUKAN <a href=\'http://localhost/kursusmobil/pelanggan/penjadwalan/1\'>JADWAL</a>!.', 3, '2019-07-09 00:22:58'),
(127, 'SISTEM', 'KONFIRMASI PEMESANAN JADWAL OLEH USER Mashum Abdul Jabbar (majabbar1993@gmail.com) SUDAH DIVALIDASI. MOHON MENUNGGU PENENTUAN JADWAL DARI USER, TERIMAKASIH.', 1, '2019-07-09 00:22:58'),
(128, 'SISTEM', 'PENENTUAN JADWAL SUDAH DILAKUKAN, TERIMAKASIH.', 3, '2019-07-09 00:27:59'),
(129, 'SISTEM', 'PENENTUAN JADWAL OLEH USER Mashum Abdul Jabbar (majabbar1993@gmail.com) SUDAH DILAKUKAN, MOHON UNTUK DILAKUKAN PENGECEKAN PADA MENU <a href=\'https://multimediary2019.com/admin/penjadwalan/1/1\'>PENJADWALAN</a>, TERIMAKASIH.', 1, '2019-07-09 00:27:59'),
(130, 'SISTEM', 'PENENTUAN JADWAL SUDAH DILAKUKAN, TERIMAKASIH.', 3, '2019-07-09 02:13:02'),
(131, 'SISTEM', 'PENENTUAN JADWAL OLEH USER Mashum Abdul Jabbar (majabbar1993@gmail.com) SUDAH DILAKUKAN, MOHON UNTUK DILAKUKAN PENGECEKAN PADA MENU <a href=\'https://multimediary2019.com/kursusmobil/admin/penjadwalan/1/2\'>PENJADWALAN</a>, TERIMAKASIH.', 1, '2019-07-09 02:13:02'),
(132, 'SISTEM', 'TERIMAKASIH SUDAH MELAKUKAN KONFIRMASI PEMESANAN, MOHON MENUNGGU VALIDASI DARI ADMIN CABANG, TERIMAKASIH.', 6, '2019-07-09 02:14:30'),
(133, 'SISTEM', 'USER harry (harrybukit1701@gmail.com) TELAH MELAKUKAN KONFIRMASI PEMESANAN, KLIK  <a href=\'https://multimediary2019.com/kursusmobil/admin/inbox/3\'>RINCIAN</a> UNTUK MELAKUKAN KONFIRMASI, TERIMAKASIH.', 1, '2019-07-09 02:14:30'),
(134, 'SISTEM', 'PENENTUAN JADWAL SUDAH DILAKUKAN, TERIMAKASIH.', 6, '2019-07-09 02:16:09'),
(135, 'SISTEM', 'PENENTUAN JADWAL OLEH USER harry (harrybukit1701@gmail.com) SUDAH DILAKUKAN, MOHON UNTUK DILAKUKAN PENGECEKAN PADA MENU <a href=\'https://multimediary2019.com/kursusmobil/admin/penjadwalan/3/3\'>PENJADWALAN</a>, TERIMAKASIH.', 1, '2019-07-09 02:16:09'),
(136, 'SISTEM', 'TERIMAKASIH SUDAH MELAKUKAN KONFIRMASI PEMESANAN, MOHON MENUNGGU VALIDASI DARI ADMIN CABANG, TERIMAKASIH.', NULL, '2019-07-11 23:11:01'),
(137, 'SISTEM', 'USER loe (masihbelajar@gmail.com) TELAH MELAKUKAN KONFIRMASI PEMESANAN, KLIK  <a href=\'https://multimediary2019.com/kursusmobil/admin/inbox/4\'>RINCIAN</a> UNTUK MELAKUKAN KONFIRMASI, TERIMAKASIH.', 1, '2019-07-11 23:11:01'),
(138, 'SISTEM', 'PENENTUAN JADWAL SUDAH DILAKUKAN, TERIMAKASIH.', 6, '2019-07-11 23:30:10'),
(139, 'SISTEM', 'PENENTUAN JADWAL OLEH USER harry (harrybukit1701@gmail.com) SUDAH DILAKUKAN, MOHON UNTUK DILAKUKAN PENGECEKAN PADA MENU <a href=\'https://multimediary2019.com/kursusmobil/admin/penjadwalan/3/4\'>PENJADWALAN</a>, TERIMAKASIH.', 1, '2019-07-11 23:30:10'),
(140, 'SISTEM', 'TERIMAKASIH SUDAH MELAKUKAN KONFIRMASI PEMESANAN, MOHON MENUNGGU VALIDASI DARI ADMIN CABANG, TERIMAKASIH.', 11, '2019-07-12 11:24:04'),
(141, 'SISTEM', 'USER jos (guebelajarstir@gmail.com) TELAH MELAKUKAN KONFIRMASI PEMESANAN, KLIK  <a href=\'https://multimediary2019.com/kursusmobil/admin/inbox/5\'>RINCIAN</a> UNTUK MELAKUKAN KONFIRMASI, TERIMAKASIH.', 1, '2019-07-12 11:24:04'),
(142, 'SISTEM', 'PENENTUAN JADWAL SUDAH DILAKUKAN, TERIMAKASIH.', 11, '2019-07-12 11:32:02'),
(143, 'SISTEM', 'PENENTUAN JADWAL OLEH USER jos (guebelajarstir@gmail.com) SUDAH DILAKUKAN, MOHON UNTUK DILAKUKAN PENGECEKAN PADA MENU <a href=\'https://multimediary2019.com/kursusmobil/admin/penjadwalan/5/5\'>PENJADWALAN</a>, TERIMAKASIH.', 1, '2019-07-12 11:32:02'),
(144, 'SISTEM', 'TERIMAKASIH SUDAH MELAKUKAN KONFIRMASI PEMESANAN, MOHON MENUNGGU VALIDASI DARI ADMIN CABANG, TERIMAKASIH.', 11, '2019-07-12 11:43:41'),
(145, 'SISTEM', 'USER jos (guebelajarstir@gmail.com) TELAH MELAKUKAN KONFIRMASI PEMESANAN, KLIK  <a href=\'https://multimediary2019.com/kursusmobil/admin/inbox/6\'>RINCIAN</a> UNTUK MELAKUKAN KONFIRMASI, TERIMAKASIH.', 9, '2019-07-12 11:43:41'),
(146, 'ADMIN CABANG', 'KONFIRMASI PEMESANAN JADWAL SUDAH DI VALIDASI. SILAHKAN KLIK LINK BERIKUT UNTUK MENENTUKAN <a href=\'https://multimediary2019.com/kursusmobil/pelanggan/penjadwalan/5\'>JADWAL</a>!.', 11, '2019-07-12 11:45:10'),
(147, 'SISTEM', 'KONFIRMASI PEMESANAN JADWAL OLEH USER jos (guebelajarstir@gmail.com) SUDAH DIVALIDASI. MOHON MENUNGGU PENENTUAN JADWAL DARI USER, TERIMAKASIH.', 9, '2019-07-12 11:45:10'),
(148, 'SISTEM', 'PENENTUAN JADWAL SUDAH DILAKUKAN, TERIMAKASIH.', 11, '2019-07-12 11:46:56'),
(149, 'SISTEM', 'PENENTUAN JADWAL OLEH USER jos (guebelajarstir@gmail.com) SUDAH DILAKUKAN, MOHON UNTUK DILAKUKAN PENGECEKAN PADA MENU <a href=\'https://multimediary2019.com/kursusmobil/admin/penjadwalan/6/6\'>PENJADWALAN</a>, TERIMAKASIH.', 9, '2019-07-12 11:46:56'),
(150, 'SISTEM', 'TELAH DILAKUKAN PERUBAHAN PADA JADWAL SUDAH DITENTUKAN, TERIMAKASIH.', 11, '2019-07-12 11:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paket`
--

CREATE TABLE `tbl_paket` (
  `paket_id` int(11) NOT NULL,
  `paket_judul` varchar(100) NOT NULL,
  `paket_keterangan` text NOT NULL,
  `paket_harga` int(11) NOT NULL,
  `paket_lamakursus` int(11) NOT NULL COMMENT 'Pertemuan',
  `paket_foto` varchar(100) DEFAULT NULL,
  `paket_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `paket_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_paket`
--

INSERT INTO `tbl_paket` (`paket_id`, `paket_judul`, `paket_keterangan`, `paket_harga`, `paket_lamakursus`, `paket_foto`, `paket_created`, `paket_updated`) VALUES
(1, 'Paket 10x Pertemuan  Matic', 'Belajar Hari Senin - Minggu', 800000, 10, '1.jpg', '2019-06-26 10:04:19', '2019-07-09 01:51:54'),
(2, 'Paket 10x Pertemuan Manual', 'Belajar Hari Senin - Minggu', 800000, 10, '2.jpg', '2019-06-26 10:04:19', '2019-07-09 01:51:09'),
(3, 'Paket 7x pertemuan Matic', 'Belajar Hari Senin - minggu', 700000, 7, '3.jpg', '2019-06-26 10:04:19', '2019-07-09 01:49:51'),
(4, 'Paket 7x pertemuan Manual', 'Belajar Hari Senin - minggu', 700000, 7, '4.jpg', '2019-06-26 10:04:19', '2019-07-09 01:49:13'),
(5, 'Paket 12x Pertemuan Manual', 'Belajar Hari Senin - Minggu', 900000, 12, '1562612689c183483aeaf5d10666ec92cd14ba8d2d.jpeg', '2019-07-09 02:04:49', '2019-07-09 02:09:20'),
(6, 'Paket 12x Pertemuan Metic', 'Belajar Hari Senin - Minggu', 900000, 12, '1562612732e95ca9602bebb50678cc7a5cfc62142f.jpeg', '2019-07-09 02:05:32', '2019-07-09 02:09:31'),
(7, 'Paket 15x Pertemuan Manual', 'Belajar Hari Senin - Minggu', 1000000, 15, '1562612779056b0c6100480837115aa80ee66caeab.jpeg', '2019-07-09 02:06:19', '2019-07-09 02:09:40'),
(8, 'Paket 15x Pertemuan Manual', 'Belajar Hari Senin - Minggu', 1000000, 15, '1562612809056b0c6100480837115aa80ee66caeab.jpeg', '2019-07-09 02:06:49', '2019-07-09 02:09:50'),
(9, 'Paket 15x Pertemuan Manual+ Sim A', 'Belajar Hari Senin - Minggu', 1700000, 15, '15626128558e22ce29388cfb0e7a6e7d8f64f452aa.jpeg', '2019-07-09 02:07:35', '2019-07-09 02:10:04'),
(10, 'Paket 15x Pertemuan Metic+ Sim A', 'Belajar Hari Senin - Minggu', 1700000, 15, '15626128858e22ce29388cfb0e7a6e7d8f64f452aa.jpeg', '2019-07-09 02:08:05', '2019-07-09 02:10:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemesanan`
--

CREATE TABLE `tbl_pemesanan` (
  `pemesanan_id` int(11) NOT NULL,
  `paket_id` int(11) DEFAULT NULL,
  `tentangkami_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `pemesanan_jumlahbayar` int(11) DEFAULT NULL,
  `pemesanan_buktibayar` varchar(50) DEFAULT NULL,
  `pemesanan_status` int(11) NOT NULL DEFAULT '0' COMMENT '0 = Belum Verifikasi, 1 = Verified',
  `pemesanan_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pemesanan_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pemesanan`
--

INSERT INTO `tbl_pemesanan` (`pemesanan_id`, `paket_id`, `tentangkami_id`, `user_id`, `pemesanan_jumlahbayar`, `pemesanan_buktibayar`, `pemesanan_status`, `pemesanan_created`, `pemesanan_updated`) VALUES
(1, 2, 1, 3, 1000000, '1562605007c1e333fccf036d5a2c9a5e0933de207b.jpg', 1, '2019-07-08 23:56:47', '2019-07-09 00:23:54'),
(2, 1, 1, 3, 1000000, '15626062578f9037474150a19a0512a5b056680f1e.jpg', 1, '2019-07-09 00:17:37', '2019-07-09 00:22:58'),
(3, 2, 1, 6, 800000, '1562613270617bf375f358bb33ca2e0e6f1c004e3d.jpg', 1, '2019-07-09 02:14:30', '2019-07-09 02:15:00'),
(4, 9, 1, NULL, 1700000, '1562861461b8f0a4eb3c405eb5ff919c846c1edc7e.jpg', 1, '2019-07-11 23:11:01', '2019-07-12 11:30:48'),
(5, 9, 1, 11, 1700000, '15629054448f9037474150a19a0512a5b056680f1e.jpg', 1, '2019-07-12 11:24:04', '2019-07-12 11:30:53'),
(6, 5, 2, 11, 0, '1562906621da7f2e843c45a054ffed86743f4f4e54.jpg', 1, '2019-07-12 11:43:41', '2019-07-12 11:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penilaian`
--

CREATE TABLE `tbl_penilaian` (
  `penilaian_id` int(11) NOT NULL,
  `penjadwalan_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `penilaian_etikaberkendara` double DEFAULT NULL,
  `penilaian_teknikberkendara` double DEFAULT NULL,
  `penilaian_pemahamanrambu` double DEFAULT NULL,
  `penilaian_responsifberkendara` double DEFAULT NULL,
  `penilaian_teknikparkir` double DEFAULT NULL,
  `penilaian_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `penilaian_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penilaian`
--

INSERT INTO `tbl_penilaian` (`penilaian_id`, `penjadwalan_id`, `user_id`, `penilaian_etikaberkendara`, `penilaian_teknikberkendara`, `penilaian_pemahamanrambu`, `penilaian_responsifberkendara`, `penilaian_teknikparkir`, `penilaian_created`, `penilaian_updated`) VALUES
(10, 1, 3, 99, 88, 89, 87, 90, '2019-07-09 00:29:39', NULL),
(11, 3, 6, 78, 80, 75, 78, 81, '2019-07-09 23:59:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjadwalan`
--

CREATE TABLE `tbl_penjadwalan` (
  `penjadwalan_id` int(11) NOT NULL,
  `paket_id` int(11) DEFAULT NULL,
  `pemesanan_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `penjadwalan_ke` int(11) DEFAULT NULL,
  `penjadwalan_tanggal` date DEFAULT NULL,
  `penjadwalan_jam` varchar(50) DEFAULT '00:00:00',
  `penjadwalan_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `penjadwalan_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penjadwalan`
--

INSERT INTO `tbl_penjadwalan` (`penjadwalan_id`, `paket_id`, `pemesanan_id`, `user_id`, `penjadwalan_ke`, `penjadwalan_tanggal`, `penjadwalan_jam`, `penjadwalan_created`, `penjadwalan_updated`) VALUES
(1, 2, 1, 3, 1, '2019-07-09', '15:00', '2019-07-09 00:27:59', NULL),
(2, 2, 1, 3, 2, '2019-07-10', '15:00', '2019-07-09 02:13:02', NULL),
(3, 2, 3, 6, 1, '2019-07-10', '15:00', '2019-07-09 02:16:09', NULL),
(4, 2, 3, 6, 2, '2019-07-12', '14:00', '2019-07-11 23:30:10', NULL),
(5, 9, 5, 11, 1, '2019-07-12', '13:00', '2019-07-12 11:32:01', NULL),
(6, 5, 6, 11, 1, '2019-07-12', '11:00', '2019-07-12 11:46:56', '2019-07-12 11:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tentangkami`
--

CREATE TABLE `tbl_tentangkami` (
  `tentangkami_id` int(11) NOT NULL,
  `tentangkami_namaperusahaan` varchar(200) NOT NULL,
  `tentangkami_keterangan` text,
  `tentangkami_alamatperusahaan` text NOT NULL,
  `tentangkami_foto` varchar(50) NOT NULL,
  `tentangkami_koordinatlatitude` varchar(200) NOT NULL,
  `tentangkami_koordinatlongitude` varchar(200) NOT NULL,
  `tentangkami_kontak` varchar(200) NOT NULL,
  `tentangkami_level` varchar(50) NOT NULL COMMENT 'pusat, cabang',
  `tentangkami_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tentangkami_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tentangkami`
--

INSERT INTO `tbl_tentangkami` (`tentangkami_id`, `tentangkami_namaperusahaan`, `tentangkami_keterangan`, `tentangkami_alamatperusahaan`, `tentangkami_foto`, `tentangkami_koordinatlatitude`, `tentangkami_koordinatlongitude`, `tentangkami_kontak`, `tentangkami_level`, `tentangkami_created`, `tentangkami_updated`) VALUES
(1, 'PT. STARFI PAUS RUMBAI', ' Kursus Mengemudi Starfi adalah salah satu jasa atau layanan belajar menyetir atau mengemudi yang ada di Pekanbaru beralamat di Jl. Paus No 30 Rumbai. Bagi kamu yang ingin ahli dan mampu mengendarai mobil atau mengemudi roda empat, kursus mengemudi STARFI menawarkan harga yang sangat terjangkau.\r\n\r\nSTARFI memiliki motto melayani sepenuh hati yang artinya akan memberikan layanan yang baik untuk kamu yang belajar mengemudi di sana. Kamu bisa belajar menyetir baik mobil matic maupun manual.\r\n\r\nKursus mengemudi di STARFI kamu bisa langsung mendapatkan Surat Izin Mengemudi (SIM) A. selain itu STARFI juga memberikan pelayanan antar-jemput gratis dan kendaraan yang disediakan oleh STARFI untuk belajar adalah mobil dengan kondisi terbaik dan keluaran terbaru.\r\n\r\nSelain itu, kendaraan juga memiliki AC dan fitur-fitur lainnya sehingga peserta atau siswa yang belajar mengemudi akan merasa nyaman.', 'jln. paus no 30 Rumbai, Pekanbaru', '1562611098faf9defc36603893d99cdc619105ddc2.jpeg', '0.5177857', '101.3417016,12z', '0851-0800-3838', 'pusat', '2019-06-26 10:44:41', '2019-07-09 01:38:18'),
(2, 'PT. STARFI cabgn PAUS Nangka', 'SATRFI Cabang paus nangka', 'Jl. Paus pekanbaru no.10 A - riau', '1562611307ac70ab768756c6b931c679b1a3fc984f.jpeg', '', '', '0812-6804-6585', 'cabang', '2019-06-26 10:44:41', '2019-07-09 01:41:47'),
(3, 'PT. STARFI Cabang Marpoyan', 'SATRFI Cabang  Marpoyan', 'Jl. Kaharudin nasution marpoyan, pekanbaru', '1562611635796c95946fd8ddde5d91705246f0aa45.jpeg', '', '', '0852-6525-7807', 'cabang', '2019-06-26 10:44:41', '2019-07-09 15:03:12'),
(4, 'PT. STARFI Cabang Tamtama', 'SATRFI Cabang Tamtama', 'jl. Tamtama no.06 Pekanbaru', '15626114416d96a9f110e298004f44bd41bb7fa23a.jpeg', '', '', '0852-6525-7807', 'cabang', '2019-06-26 10:44:41', '2019-07-09 15:03:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimoni`
--

CREATE TABLE `tbl_testimoni` (
  `testimoni_id` int(11) NOT NULL,
  `testimoni_foto` varchar(50) NOT NULL,
  `testimoni_namauser` varchar(50) NOT NULL,
  `testimoni_keterangan` text NOT NULL,
  `testimoni_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `testimoni_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_testimoni`
--

INSERT INTO `tbl_testimoni` (`testimoni_id`, `testimoni_foto`, `testimoni_namauser`, `testimoni_keterangan`, `testimoni_created`, `testimoni_updated`) VALUES
(1, '1.jpg', 'Ayude', 'Assalamualaikum. dua hari ini saya baru aja mendapatkan pengalaman baru yang seru, yaitu Jeng Jeng JEng Jeng..*intro* kursus setir mobil. Yaaay! hehehee. Kenapa seru? karna sebelumnya saya belum pernah sama sekali duduk di belakang setir. dan ini adalah pengalaman pertama saya megang stir. hihi katrok banget deh. sebenernya saya ambil kursus ini karna dipaksa-paksa ibuk. udah dari sebulan yang lalu ibuk maksa saya buat ngedaftar, tapi baru kemaren saya berangkat. dan ternyata saya ketagihan hihihiii', '2019-06-26 11:38:32', '2019-07-02 01:44:02'),
(2, '2.jpg', 'Ranisha', 'Jadi, kemaren ini saya daftar kursus yang seharga 550ribu makenya mobil xenia. Pas pertama tau harganya..buseet dah mahal yaa..? tapi nggak jadi mahal begitu tau risiko yang diambil.\r\njadilah kemarin hari pertama saya kursus. Tentor saya ini mas-mas setengah bapak-bapak gitu. Pas pertama ketemu ditanyain, udah pernah bawa mobil apa belum. Saya bilang aja kalo ini adalah pengalaman yang benar-benar pertama. Walaupun tau begitu, eh sama si mas-mas instruktur saya tetep disuruh duduk di tempat duduk sopir dong. JRENGG... padahal saya mbayanginnya saya bakalan dibawa ke lapangan dulu gitu yang agak luas dan lega. Lha ini kok langsung gitu ya.. padahal itu keadaan mobilnya ada di pinggir jalanan yang rame gitu.. Mulai deh saya nervous, deg-degkan..HAH pokoknya rasanya kayak pas kencan pertama sama gebetan gitu deh. Cuman yang ini kencannya sama mobil.. :3', '2019-06-26 11:38:32', '2019-07-01 21:51:18'),
(3, '3.jpg', 'Bejo', 'Habis itu si mas-mas instruktur ngasih tau ini itu yang ada di dalem mobil, kegunaanya apa. Dan yang paling penting dari itu semua adalah, ngukur jarak kursi sopir, jadi kaki kiri harus bisa nginjek kopling sampek mentok dengan tumit yang tetep ngijek bawahnya. Nah, karna saya tau diri yaa kalo saya ini ehemmm pendek.. jadilah saya majuin tu kursi lumayan banyak ke depan.. hehehe.. Waktu itu jantung saya uda semakin berdebar gitu...tanda saya sangat excited. hehe. ..', '2019-06-26 11:38:32', '2019-07-01 21:51:53'),
(4, '4.jpg', 'Jarwo Kuatsss', 'Habis dijelasin, langsung dong sama si masnya saya disuruh njalanin tu mobil... batin saya APAAA..?? hyuuuh.. tambahlah saya panik... badan kaku gak nyantae banget.. duduknya aja udah kayak robot gak bisa nyandar.. Pas pertama jalan..gilaa gilaa gue nyetir mobil..? oh mai oh mai.. dan ini di jalan gedhe dimana kanan kiri ada mobil dan motor sliwar sliwer.. (MENURUT NGANA????) Mana diajakin ngobrol mlulu lagi sama si mas-masnya.. Jadi agak-agak bingung mecah konsentrasinya... Kayak tau kalo saya agak-agak panik at the disco gitu, si mas langsung bilang.. \"Udah, tenang aja nggak usah panik, mereka nggak tau kalo kamu lagi belajar..\" aku cuma bisa bilang Oke sambil tetep fokus maksimal sama jalan depan..', '2019-06-26 11:38:32', '2019-07-01 21:33:49'),
(5, '5.jpg', 'Jarwo Kuats', 'Gimana kagak tau kalo lagi belajar nyetir, orang di belakang, samping kanan kiri mobil ada tulisan B.E.L.A.J.A.R. gedhe banget..  haha', '2019-06-26 12:38:32', '2019-07-02 01:43:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_namalengkap` varchar(200) NOT NULL,
  `user_alamatlengkap` text NOT NULL,
  `user_kontak` varchar(50) NOT NULL,
  `user_level` varchar(50) NOT NULL COMMENT 'admin, pelanggan',
  `user_ttl` varchar(50) NOT NULL,
  `user_pekerjaan` varchar(50) NOT NULL,
  `user_foto` varchar(50) NOT NULL,
  `user_status` int(11) NOT NULL DEFAULT '0',
  `tentangkami_id` int(11) DEFAULT NULL,
  `user_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `test` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_password`, `user_namalengkap`, `user_alamatlengkap`, `user_kontak`, `user_level`, `user_ttl`, `user_pekerjaan`, `user_foto`, `user_status`, `tentangkami_id`, `user_created`, `user_updated`, `test`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Pekanbaru', '08786878', 'admin', '', '', 'default/user.png', 1, 1, '2019-07-01 22:27:48', '2019-07-06 11:22:05', 'abdul.jabbar@ofon.co.id'),
(3, 'majabbar1993@gmail.com', '584f75c9eb7574fb3029cd95bcfa4bce', 'Mashum Abdul Jabbar', 'Jakarta Jakarta Jakarta Jakarta Jakarta', '081365068548', 'pelanggan', 'Sei Galuh, 17 Agustus 1945', 'Wiraswasta', '1562081084e13f8319e8c152f10b900a667c98c7c2.png', 1, 1, '2019-07-02 22:24:48', '2019-07-07 10:36:18', 'multimediary@gmail.com, abdul.jabbar@ofon.co.id'),
(6, 'harrybukit1701@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'harry', 'harry', '081277819765', 'pelanggan', 'harry', 'harry', '1562598493e56eba581fe3fa6bbf3a65813d010a38.jpg', 1, 1, '2019-07-08 22:08:13', '2019-07-12 11:39:05', NULL),
(9, 'admin1', '81dc9bdb52d04dc20036dbd8313ed055', 'boy', 'tes', '0811211111111', 'admin', 'tes', 'tes', '1562602755617bf375f358bb33ca2e0e6f1c004e3d.jpg', 1, 2, '2019-07-08 23:19:15', NULL, NULL),
(11, 'guebelajarstir@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'jos', 'tes', '081212121212', 'pelanggan', 'new', 'youtuber', '15628624859ec5d276b606ae7ca6ad61c9b9ed7bbe.jpg', 1, 1, '2019-07-11 23:28:05', '2019-07-11 23:28:48', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_carapesan`
--
ALTER TABLE `tbl_carapesan`
  ADD PRIMARY KEY (`carapesan_id`);

--
-- Indexes for table `tbl_inbox`
--
ALTER TABLE `tbl_inbox`
  ADD PRIMARY KEY (`inbox_id`),
  ADD KEY `FK_user_id_inbox` (`user_id`);

--
-- Indexes for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  ADD PRIMARY KEY (`paket_id`);

--
-- Indexes for table `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  ADD PRIMARY KEY (`pemesanan_id`),
  ADD KEY `FK_paket_id_pemesanan` (`paket_id`),
  ADD KEY `FK_tentangkami_id_pemesanan` (`tentangkami_id`),
  ADD KEY `FK_user_id_pemesanan` (`user_id`);

--
-- Indexes for table `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  ADD PRIMARY KEY (`penilaian_id`),
  ADD KEY `FK_user_id_penilaian` (`user_id`),
  ADD KEY `FK_penjadwalan_id_penilaian` (`penjadwalan_id`);

--
-- Indexes for table `tbl_penjadwalan`
--
ALTER TABLE `tbl_penjadwalan`
  ADD PRIMARY KEY (`penjadwalan_id`),
  ADD KEY `FK_paket_id_penjadwalan` (`paket_id`),
  ADD KEY `FK_user_id_penjadwalan` (`user_id`),
  ADD KEY `FK_pemesanan_id_penjadwalan` (`pemesanan_id`);

--
-- Indexes for table `tbl_tentangkami`
--
ALTER TABLE `tbl_tentangkami`
  ADD PRIMARY KEY (`tentangkami_id`);

--
-- Indexes for table `tbl_testimoni`
--
ALTER TABLE `tbl_testimoni`
  ADD PRIMARY KEY (`testimoni_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD KEY `FK_tentangkami_id_user` (`tentangkami_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_carapesan`
--
ALTER TABLE `tbl_carapesan`
  MODIFY `carapesan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_inbox`
--
ALTER TABLE `tbl_inbox`
  MODIFY `inbox_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  MODIFY `paket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  MODIFY `pemesanan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  MODIFY `penilaian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_penjadwalan`
--
ALTER TABLE `tbl_penjadwalan`
  MODIFY `penjadwalan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_tentangkami`
--
ALTER TABLE `tbl_tentangkami`
  MODIFY `tentangkami_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_testimoni`
--
ALTER TABLE `tbl_testimoni`
  MODIFY `testimoni_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_inbox`
--
ALTER TABLE `tbl_inbox`
  ADD CONSTRAINT `FK_user_id_inbox` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  ADD CONSTRAINT `FK_paket_id_pemesanan` FOREIGN KEY (`paket_id`) REFERENCES `tbl_paket` (`paket_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tentangkami_id_pemesanan` FOREIGN KEY (`tentangkami_id`) REFERENCES `tbl_tentangkami` (`tentangkami_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user_id_pemesanan` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  ADD CONSTRAINT `FK_penjadwalan_id_penilaian` FOREIGN KEY (`penjadwalan_id`) REFERENCES `tbl_penjadwalan` (`penjadwalan_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user_id_penilaian` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_penjadwalan`
--
ALTER TABLE `tbl_penjadwalan`
  ADD CONSTRAINT `FK_paket_id_penjadwalan` FOREIGN KEY (`paket_id`) REFERENCES `tbl_paket` (`paket_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pemesanan_id_penjadwalan` FOREIGN KEY (`pemesanan_id`) REFERENCES `tbl_pemesanan` (`pemesanan_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user_id_penjadwalan` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `FK_tentangkami_id_user` FOREIGN KEY (`tentangkami_id`) REFERENCES `tbl_tentangkami` (`tentangkami_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
