-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Okt 2023 pada 18.23
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `balai1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `balai_access_menu`
--

CREATE TABLE `balai_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(1) NOT NULL,
  `menu_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `balai_access_menu`
--

INSERT INTO `balai_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 5, 1),
(4, 6, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bo_access_menu`
--

CREATE TABLE `bo_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bo_access_menu`
--

INSERT INTO `bo_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(9, 1, 1),
(10, 1, 2),
(11, 1, 3),
(12, 2, 1),
(13, 3, 2),
(14, 4, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bo_access_submenu`
--

CREATE TABLE `bo_access_submenu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bo_access_submenu`
--

INSERT INTO `bo_access_submenu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 1),
(6, 3, 2),
(7, 4, 3),
(8, 5, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen_inskal`
--

CREATE TABLE `dokumen_inskal` (
  `id` int(11) NOT NULL,
  `dokumen` varchar(256) NOT NULL,
  `path` varchar(256) NOT NULL,
  `tanggal_pengajuan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_kasubid` int(1) NOT NULL,
  `status_kabid` int(1) NOT NULL,
  `status_kabal` int(1) NOT NULL,
  `status_sekbal` int(2) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `download` varchar(256) NOT NULL,
  `tanggal_acc` timestamp NULL DEFAULT NULL,
  `tanggal_acc_k` timestamp NULL DEFAULT NULL,
  `tanggal_acc_kd` timestamp NULL DEFAULT NULL,
  `tanggal_acc_kb` timestamp NULL DEFAULT NULL,
  `tanggal_acc_s` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dokumen_inskal`
--

INSERT INTO `dokumen_inskal` (`id`, `dokumen`, `path`, `tanggal_pengajuan`, `status_kasubid`, `status_kabid`, `status_kabal`, `status_sekbal`, `keterangan`, `download`, `tanggal_acc`, `tanggal_acc_k`, `tanggal_acc_kd`, `tanggal_acc_kb`, `tanggal_acc_s`) VALUES
(4, 'tesss', 'InaTEWS_-_Konsep_dan_Implementasi.pdf', '2023-10-05 06:22:02', 1, 1, 1, 1, 'lalalalalal\r\n', 'InaTEWS_-_Konsep_dan_Implementasi.pdf', NULL, '2023-10-05 06:21:17', '2023-10-05 06:21:30', '2023-10-05 06:21:47', '2023-10-05 06:22:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen_kabid`
--

CREATE TABLE `dokumen_kabid` (
  `id` int(11) NOT NULL,
  `dokumen` varchar(256) NOT NULL,
  `path` varchar(256) NOT NULL,
  `tanggal_pengajuan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_kasubid` int(1) NOT NULL,
  `status_kabid` int(1) NOT NULL,
  `status_kabal` int(1) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `download` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen_poolbar`
--

CREATE TABLE `dokumen_poolbar` (
  `id` int(11) NOT NULL,
  `dokumen` varchar(256) NOT NULL,
  `path` varchar(256) NOT NULL,
  `tanggal_pengajuan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_kasubid` int(1) NOT NULL,
  `status_kabid` int(1) NOT NULL,
  `status_kabal` int(1) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `download` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `logbook`
--

CREATE TABLE `logbook` (
  `id` int(3) NOT NULL,
  `order` varchar(3) NOT NULL,
  `tanggal` date NOT NULL,
  `instansi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `logbook`
--

INSERT INTO `logbook` (`id`, `order`, `tanggal`, `instansi`) VALUES
(14, '001', '2023-10-12', 'BBMKG I'),
(15, '002', '2023-10-13', 'BBMKG I'),
(16, '003', '2023-10-13', 'BBMKG I'),
(17, '004', '2023-10-10', 'stmkg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obs_access_menu`
--

CREATE TABLE `obs_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(1) NOT NULL,
  `sub_role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_logbook`
--

CREATE TABLE `sub_logbook` (
  `id` int(10) NOT NULL,
  `order` varchar(3) NOT NULL,
  `alat` varchar(255) NOT NULL,
  `identifikasi` varchar(3) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `tanggal_k` date DEFAULT NULL,
  `pembayaran` int(1) NOT NULL,
  `kalibrasi` int(1) NOT NULL,
  `sertifikat` int(1) NOT NULL,
  `selesai` int(1) NOT NULL,
  `petugas_kalibrasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sub_logbook`
--

INSERT INTO `sub_logbook` (`id`, `order`, `alat`, `identifikasi`, `nomor`, `tanggal_k`, `pembayaran`, `kalibrasi`, `sertifikat`, `selesai`, `petugas_kalibrasi`) VALUES
(10, '002', 'Pyranometer/1312/PP/01', '312', '-', '2023-10-14', 1, 1, 1, 0, 'Tri Marista, S.Tr.,  ,  '),
(11, '003', 'Psychometer/124/hh/02', '432', '-', '0000-00-00', 1, 0, 0, 0, 'Dearninta Agatha P.S, S.Tr., Romeo Kondouw, S.Si.,  '),
(12, '003', 'Raingauge/1231/RR/03', '312', '-', '2023-10-17', 0, 0, 0, 0, 'Ahmad Ghozali, S.Tr.,  ,  '),
(13, '003', 'Anemometer/19/AA/023', '456', '54357688', '0000-00-00', 0, 0, 0, 0, 'Mora Pasca Panjaitan, S.Tr. Inst.,  , M. Wildan Abdulmajid, S.Tr.'),
(14, '004', 'fdfsad/fdaf/adsd/sad', 'twr', '-', '0000-00-00', 1, 1, 0, 0, 'Siska Sulistyaningrum, S.Tr.,  ,  ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(19, 'hanifku', 'hanifkurawan@gmail.com', 'default.jpg', '$2y$10$npANLgwiUPFKDUG/0TJrMOvNk0mLWNwfds4/gIRjue/aeVpyAu4hS', 2, 1, 1680328486),
(22, 'wfehew', 'huef@gmail.com', 'default.jpg', '$2y$10$m5JsQPerzceKH189S99/1.D2BpKr4KSHkC9.DFwX8D/cDqgXioEmS', 1, 1, 1680329281),
(26, 'fwef', 'wgewg@gh.com', 'default.jpg', '$2y$10$MQKI5acTrYJxfQASPyqW3u93DSadxtXjedPHDlSQOv93x6wGPoTKi', 2, 1, 1680330028),
(27, 'INDRAA', 'dwi.indra.prasetyo2003@gmail.com', 'default.jpg', '$2y$10$O2XxjZ4qZc1GPmdVA4otue.oQeou2LHhHc52UUd942/N7/WSn9bHq', 2, 0, 1696334705);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(7, 1, 3),
(8, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(11, 'hanifkurniiawan@gmail.com', 'Cyrl7wPg2efCN5aBc+9MgRTwqinAmkBtDL5JT1A0Ads=', 1680273599),
(12, 'dwiindraprasetyo77@gmail.com', 'QuQEGhoJPIGMbdnjppRGg5fhEhP4ibjyhdN6/o6aYtY=', 1680274030),
(15, 'ehjbfeg@gmail.com', 'OD6la0vh87731NWrQIvuqA88Z9h5OpRajF+/zXrN7IE=', 1680328575),
(16, 'dfgfgdh@gmail.com', 'jkgXdnFfYpUx0Oruy/83iFeIB4XI9JKQHg3N+rmsPgM=', 1680328603),
(17, 'huef@gmail.com', 'tpOFbGO+IvnDCljcr2qV0Z4H2Rqd/eDFMu6UaGQkPQc=', 1680329281),
(18, 'i3h3r@gmail.co', 'bw2h4LdtfIAjcsVdeNF5i1llVp/CHBUHaHPu5Blb4PA=', 1680329302),
(19, 'dwi.indra.prasetyo2003@gmail.com', 'kJB2c+KVPFVjRMNdrcMIyubzq1OGzYy8HFWBtvebWJk=', 1680329804),
(20, 'hanifku@gmail.com', 'XiYwfY6PLglDvVl4EMV+2S8LtvakqPUCA8LARkF4qQA=', 1680329996),
(21, 'wgewg@gh.com', 'k5oBqj2zSbTLttk+og1P88aFlgSDL0r9vFgR7KaLf2g=', 1680330028),
(22, 'dwi.indra.prasetyo2003@gmail.com', 'QAUBsFOqCi1VQ0dk7/Dnrj7yHwdAr2RMwgov35b3SVQ=', 1696334705);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `balai_access_menu`
--
ALTER TABLE `balai_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bo_access_menu`
--
ALTER TABLE `bo_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bo_access_submenu`
--
ALTER TABLE `bo_access_submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dokumen_inskal`
--
ALTER TABLE `dokumen_inskal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dokumen_kabid`
--
ALTER TABLE `dokumen_kabid`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dokumen_poolbar`
--
ALTER TABLE `dokumen_poolbar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `obs_access_menu`
--
ALTER TABLE `obs_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sub_logbook`
--
ALTER TABLE `sub_logbook`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `balai_access_menu`
--
ALTER TABLE `balai_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `bo_access_menu`
--
ALTER TABLE `bo_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `bo_access_submenu`
--
ALTER TABLE `bo_access_submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `dokumen_inskal`
--
ALTER TABLE `dokumen_inskal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `dokumen_kabid`
--
ALTER TABLE `dokumen_kabid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dokumen_poolbar`
--
ALTER TABLE `dokumen_poolbar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `logbook`
--
ALTER TABLE `logbook`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `obs_access_menu`
--
ALTER TABLE `obs_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sub_logbook`
--
ALTER TABLE `sub_logbook`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
