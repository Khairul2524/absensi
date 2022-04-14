-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2022 at 06:11 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl` varchar(10) NOT NULL,
  `jam_masuk` varchar(10) NOT NULL,
  `jam_pulang` varchar(10) NOT NULL,
  `lat_masuk` varchar(100) NOT NULL,
  `long_masuk` varchar(100) NOT NULL,
  `lat_pulang` varchar(100) NOT NULL,
  `long_pulang` varchar(100) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `id_user`, `tgl`, `jam_masuk`, `jam_pulang`, `lat_masuk`, `long_masuk`, `lat_pulang`, `long_pulang`, `foto`) VALUES
(123, 33, '2022-03-22', '09:17', '09:22', '-8.69048', '116.2494843', '-8.6904345', '116.2495133', '1'),
(124, 40, '2022-03-22', '14:38', '00:00', '-8.6904469', '116.2495036', '0', '0', '1'),
(125, 33, '2022-03-23', '08:33', '08:33', '-8.6904498', '116.249509', '-8.6904498', '116.249509', '1'),
(126, 40, '2022-03-23', '08:35', '09:50', '-8.6904561', '116.2495069', '-8.6904637', '116.2495062', '1'),
(127, 40, '2022-03-24', '08:10', '00:00', '-8.6904502', '116.2495173', '0', '0', '1'),
(128, 33, '2022-03-29', '09:37', '09:37', '-8.7536753', '116.2503633', '-8.7536753', '116.2503633', '0'),
(135, 33, '2022-04-12', '12:00', '12:00', '-8.6904489', '116.2494749', '-8.6904489', '116.2494749', '0'),
(153, 40, '2022-04-13', '13:21', '13:21', '-8.6904409', '116.2494726', '-8.6904409', '116.2494726', 'default.png'),
(156, 33, '2022-04-14', '09:21', '09:21', '-8.6905486', '116.2493736', '-8.6905472', '116.2493708', '1');

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `id_bagian` int(11) NOT NULL,
  `id_opd` int(11) NOT NULL,
  `nama_bagian` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id_bagian`, `id_opd`, `nama_bagian`) VALUES
(2, 47, 'SEKRETARIAT DINAS KOMUNIKASI DAN INFORMATIKA KABUPATEN LOMBOK TENGAH'),
(3, 47, 'BIDANG PENGELOLAAN TEKNOLOGI INFORMASI, KOMUNIKASI PUBLIK DAN E-GOVERNMENT DINAS KOMINFO KABUPATEN LOMBOK TENGAH'),
(4, 47, 'BIDANG PERSANDIAN DAN STATISTIK DINAS KOMINFO KABUPATEN LOMBOK TENGAH	'),
(5, 47, 'UNIT PELAKSANA TEKNIS DINAS KOMINFO KABUPATEN LOMBOK TENGAH'),
(6, 52, 'SEKRETARIAT INSPEKTORAT KABUPATEN LOMBOK TENGAH'),
(7, 52, 'INSPEKTUR PEMBANTU I INSPEKTORAT KABUPATEN LOMBOK TENGAH'),
(8, 52, 'INSPEKTUR PEMBANTU II INSPEKTORAT KABUPATEN LOMBOK TENGAH'),
(9, 52, 'INSPEKTUR PEMBANTU III INSPEKTORAT KABUPATEN LOMBOK TENGAH'),
(10, 52, 'INSPEKTUR PEMBANTU IV INSPEKTORAT KABUPATEN LOMBOK TENGAH'),
(11, 52, 'INSPEKTUR PEMBANTU KHUSUS INSPEKTORAT KABUPATEN LOMBOK TENGAH'),
(12, 53, 'SEKRETARIAT BADAN PERENCANAAN, PENELITIAN DAN PENGEMBANGAN DAERAH KABUPATEN LOMBOK TENGAH'),
(13, 53, 'BIDANG PEREKONOMIAN DAN SUMBER DAYA ALAM BAPPEDA KABUPATEN LOMBOK TENGAH'),
(14, 53, 'BIDANG PEMERINTAHAN DAN PEMBANGUNAN MANUSIA BAPPEDA KABUPATEN LOMBOK TENGAH'),
(15, 53, 'BIDANG INFRASTRUKTUR DAN KEWILAYAHAN BAPPEDA KABUPATEN LOMBOK TENGAH'),
(16, 53, 'BIDANG PENELITIAN PENGEMBANGAN DAN EVALUASI PELAPORAN BAPPEDA KABUPATEN LOMBOK TENGAH'),
(17, 53, 'UNIT PELAKSANA TEKNIS BAPPEDA KABUPATEN LOMBOK TENGAH');

-- --------------------------------------------------------

--
-- Table structure for table `hari_libur`
--

CREATE TABLE `hari_libur` (
  `id_hari_libur` int(11) NOT NULL,
  `tanggal` varchar(128) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hari_libur`
--

INSERT INTO `hari_libur` (`id_hari_libur`, `tanggal`, `keterangan`) VALUES
(15, '2022-02-28', 'Isra Mi\'raj'),
(16, '2022-03-03', 'Hari Suci Nyepi'),
(17, '2022-04-15', 'Jumat Agung'),
(18, '2022-05-01', 'Hari Buruh'),
(19, '2022-05-02', 'Hari Raya Idul Fitri'),
(20, '2022-05-03', 'Hari Raya Idul Fitri'),
(21, '2022-05-16', 'Hari Raya Waisak');

-- --------------------------------------------------------

--
-- Table structure for table `opd`
--

CREATE TABLE `opd` (
  `idopd` int(11) NOT NULL,
  `opd` varchar(100) NOT NULL,
  `qr_code` varchar(128) NOT NULL,
  `lat` varchar(100) NOT NULL,
  `longt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `opd`
--

INSERT INTO `opd` (`idopd`, `opd`, `qr_code`, `lat`, `longt`) VALUES
(47, 'Dinas Komunikasi dan Informatika', '47.png', '-8.6904758', '116.249471'),
(52, 'INSPEKTORAT KABUPATEN LOMBOK TENGAH', 'INSPEKTORAT KABUPATEN LOMBOK TENGAH.png', '1222222', '3333333'),
(53, 'BADAN PERENCANAAN, PENELITIAN DAN PENGEMBANGAN DAERAH KABUPATEN LOMBOK TENGAH', 'BADAN PERENCANAAN, PENELITIAN DAN PENGEMBANGAN DAERAH KABUPATEN LOMBOK TENGAH.png', '11111111111111', '333333333333333');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `idrole` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`idrole`, `role`) VALUES
(1, 'Superadmin'),
(2, 'Admin OPD'),
(3, 'Admin Atasan'),
(4, 'Staf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `namalengkap` varchar(128) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `no` bigint(20) NOT NULL,
  `idopd` int(11) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `statustenaga` int(11) NOT NULL,
  `aktif` int(1) NOT NULL,
  `idrole` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `created_at` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `email`, `password`, `namalengkap`, `nik`, `nip`, `no`, `idopd`, `id_bagian`, `statustenaga`, `aktif`, `idrole`, `foto`, `created_at`) VALUES
(21, 'Khairuelkahfie@gmail.com', '$2y$10$hr9NiZWaWrCr5JvxC9LSUu92W897GvUPeMt5ivS63I/mrKSdXRoSi', 'Khairul25', '52021002100821', '9870877876736434', 87863270210, 47, 3, 1, 1, 1, 'default11.png', '1645063153'),
(33, 'khairoelkahfie@gmail.com', '$2y$10$SSm8PDDiadTmDKhDWQkOEuLr480VvoWnhhiT6vJa/FxVxggB676nS', 'Khairul Kahpi', '3647384436734558', '873653485643573469', 387543756593, 47, 3, 1, 1, 4, 'default.png', '1646704018'),
(34, 'Sunarno@gmail.com', '$2y$10$cYDNpw1151xY0db/9SxHkeIKQES28yjtdVEnUxtvF2J4CVXGpa54q', 'Sunarno, S.os., MM.', '4364832222222222', '635438543544874386', 785743578435, 47, 3, 2, 1, 2, 'default.png', '1646704586'),
(35, 'Hairulanwar@gmail.com', '$2y$10$Htxl5QICuoPo9d9PXYRVKujQeyrRF89ppeGoxClwW85AyZep70yry', 'Lalu Hairul Anwar', '384666666666666', '738637623846328432', 753777777777, 47, 2, 1, 1, 3, 'default1.png', '1649215402'),
(36, 'Sunarno12@gmail.com', '$2y$10$73yWGAY/UScl1xTa0bf4oOZGwvHQgTHHvNxOe9zUIiurGbOi2/.yK', 'Sunarno, S.sos., MM', '2322222222222222', '544444444444444444', 655555555555, 47, 3, 1, 1, 3, 'default.png', '1646706028'),
(38, 'LaluIrawadi@gmail.com', '$2y$10$NsIVWR2a46hZpEtKEFRQrenGEzKJ0iYwqgjVIdrGSTzRqmOEt2BVq', 'Lalu Irawadi, S.sos', '1234354435555555', '466667665647676898', 425444444444, 47, 4, 2, 1, 3, 'default.png', '1646707618'),
(40, 'riskabx4@gmail.com', '$2y$10$gkgADOBR6FLMqycfuuwvl.YGnMEj5ofusZQMi9m9MsTSjHTH54htS', 'Riska Indah Cahyanti', '5867555555555555', '387777777777777777', 338777777777, 47, 4, 1, 1, 4, 'defaultcewek.jpg', '1646707960');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `hari_libur`
--
ALTER TABLE `hari_libur`
  ADD PRIMARY KEY (`id_hari_libur`);

--
-- Indexes for table `opd`
--
ALTER TABLE `opd`
  ADD PRIMARY KEY (`idopd`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idrole`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `hari_libur`
--
ALTER TABLE `hari_libur`
  MODIFY `id_hari_libur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `opd`
--
ALTER TABLE `opd`
  MODIFY `idopd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `idrole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
