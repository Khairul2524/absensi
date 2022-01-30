-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jan 2022 pada 15.54
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

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
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `idabsensi` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `jammasuk` varchar(128) NOT NULL,
  `statusmasuk` int(11) NOT NULL,
  `jamkeluar` varchar(128) NOT NULL,
  `statuskeluar` varchar(128) NOT NULL,
  `lat` varchar(128) NOT NULL,
  `long` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`idabsensi`, `iduser`, `keterangan`, `jammasuk`, `statusmasuk`, `jamkeluar`, `statuskeluar`, `lat`, `long`) VALUES
(32, 11, 'Anda Telat Masuk Kerja 13 Jam 43 Menit', '1643548439', 2, '1', '1', '-8.6984087', '116.2825842'),
(34, 11, 'Izin Sakit perbaikan', '1643549143', 3, '1', '1', '', ''),
(35, 12, 'Anda Telat Masuk Kerja 14 Jam 33 Menit', '1643551416', 1, '1', '1', '-8.69842', '116.2825775');

-- --------------------------------------------------------

--
-- Struktur dari tabel `opd`
--

CREATE TABLE `opd` (
  `idopd` int(11) NOT NULL,
  `opd` varchar(100) NOT NULL,
  `qr_code` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `opd`
--

INSERT INTO `opd` (`idopd`, `opd`, `qr_code`) VALUES
(15, 'DINAS KESEHATAN', 'DINAS KESEHATAN.png'),
(16, 'RUMAH SAKIT UMUM', 'RUMAH SAKIT UMUM.png'),
(17, 'DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL', 'DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL.png'),
(18, 'DINAS PARIWISATA DAN KEBUDAYAAN', 'DINAS PARIWISATA DAN KEBUDAYAAN.png'),
(19, 'SATUAN POLISI PAMONG PRAJA', 'SATUAN POLISI PAMONG PRAJA.png'),
(20, 'SEKRETARIAT DAERAH', 'SEKRETARIAT DAERAH.png'),
(21, 'DINAS KOMUNIKASI DAN INFORMATIKA', 'DINAS KOMUNIKASI DAN INFORMATIKA.png'),
(22, 'DINAS PEKERJAAN UMUM', 'DINAS PEKERJAAN UMUM.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `idrole` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`idrole`, `role`) VALUES
(1, 'Superadmin'),
(2, 'Superadmin OPD'),
(3, 'Admin OPD'),
(4, 'Admin Atasan'),
(5, 'Pegawai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
  `statustenaga` int(11) NOT NULL,
  `aktif` int(1) NOT NULL,
  `idrole` int(11) NOT NULL,
  `created_at` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `email`, `password`, `namalengkap`, `nik`, `nip`, `no`, `idopd`, `statustenaga`, `aktif`, `idrole`, `created_at`) VALUES
(7, 'superadmin@gmail.com', '$2y$10$xPlzpFiKsmYhAn2kdsB3SeaMoj0aAkoLNMJ3tDwuE68bxPJ99OyQi', 'superadmin', '1234567890', '1234567890', 1234567890, 21, 1, 1, 1, '1643508539'),
(8, 'Superadminopddinaskesehatan@gmail.com', '$2y$10$.QaQhvf3gFBaWzLBiKRjReIs7SyQP8q.lp8n358S6opxBDrcKnN8.', 'Superadminopddinaskesehatan', '5202100222234343', '197001162003121005', 878652456239, 15, 1, 1, 2, '1643512102'),
(9, 'AdminOPDdinaskesehtan@gmail.com', '$2y$10$no0CO.XnF2.iG1cAPLdYDuOOTVAHxKwLv6cYr6LXsr6h0TOzpz89m', 'AdminOPDdinaskesehtan', '121323242343243243', '196805121992031014', 87876765654, 15, 1, 1, 2, '1643512520'),
(10, 'admiatasandinaskesehatan@gmail.com', '$2y$10$KLuv/iG5kk20X0jNwRB5geyPIP8uWNydHBHtbEZCmFW2Oxgumr7NG', 'admiatasandinaskesehatan', '08998787654321212', '197310101993031006', 852342534345, 15, 1, 1, 2, '1643512607'),
(11, 'khairoelkahfie@gmail.com', '$2y$10$3q4DnpwbG9jc0ip4aguaZed0cmFNB1VwKj95FSyhJEp40g4HcFNqK', 'Khairul Kahpi', '5201232123334324', '197003242002121003', 87863270210, 15, 1, 1, 5, '1643513440'),
(12, 'bqdevi201@gmail.com', '$2y$10$XRD.M4Rw2ny8zBHHu4NX8.FWvyNWGAmo.o57m2Pf3rlfb3pFepVYO', 'bqdevi201', '121212', '212121', 21212121, 15, 2, 1, 5, '1643551393');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`idabsensi`);

--
-- Indeks untuk tabel `opd`
--
ALTER TABLE `opd`
  ADD PRIMARY KEY (`idopd`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idrole`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `idabsensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `opd`
--
ALTER TABLE `opd`
  MODIFY `idopd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `idrole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
