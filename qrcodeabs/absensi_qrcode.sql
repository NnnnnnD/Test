-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Sep 2024 pada 04.11
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi_qrcode`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `kampus` varchar(100) NOT NULL,
  `penempatan` varchar(100) DEFAULT NULL,
  `absen_type` enum('masuk','pulang') NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id`, `user_id`, `nama`, `jurusan`, `kampus`, `penempatan`, `absen_type`, `waktu`) VALUES
(14, 32, 'Rowan Willy San Remo', 'Teknik Informatika', 'STMIK Mardira Indonesia', 'JDIH', 'pulang', '2024-09-23 02:49:40'),
(15, 31, 'Firgi Ahmad Dilla', 'Sistem Informasi', 'ARS University', 'JDIH', 'masuk', '2024-09-23 03:39:50'),
(16, 31, 'Firgi Ahmad Dilla', 'Sistem Informasi', 'ARS University', 'JDIH', 'pulang', '2024-09-23 03:40:01'),
(17, 31, 'Firgi Ahmad Dilla', 'Sistem Informasi', 'ARS University', 'JDIH', 'masuk', '2024-09-23 03:40:52'),
(18, 31, 'Firgi Ahmad Dilla', 'Sistem Informasi', 'ARS University', 'JDIH', 'masuk', '2024-09-23 03:44:44'),
(19, 31, 'kamischa cahya camellia', 'manajemen perkantoran', 'smk pasundan 1 bandung', 'perpustakaan', 'masuk', '2024-09-23 06:44:44'),
(20, 31, 'Firgi Ahmad Dilla', 'Sistem Informasi', 'ARS University', 'JDIH', 'masuk', '2024-09-23 06:49:18'),
(21, 31, 'Firgi Ahmad Dilla', 'Sistem Informasi', 'ARS University', 'JDIH', 'pulang', '2024-09-23 06:49:32'),
(22, 31, 'bambang', 'Sistem Informasi', 'ars', 'Persidangan', 'masuk', '2024-09-24 02:58:36'),
(23, 31, 'bambang', 'Sistem Informasi', 'ars', 'Persidangan', 'masuk', '2024-09-24 02:58:46'),
(24, 31, 'bambang', 'Sistem Informasi', 'ars', 'Persidangan', 'masuk', '2024-09-24 02:58:55'),
(25, 31, 'bambang', 'Sistem Informasi', 'ars', 'Persidangan', 'masuk', '2024-09-24 02:59:01'),
(26, 31, 'bambang', 'Sistem Informasi', 'ars', 'Persidangan', 'masuk', '2024-09-24 02:59:05'),
(27, 31, 'bambang', 'Sistem Informasi', 'ars', 'Persidangan', 'masuk', '2024-09-24 02:59:44'),
(28, 31, 'bambang', 'Sistem Informasi', 'ars', 'Persidangan', 'masuk', '2024-09-24 03:00:11'),
(29, 33, 'Lala', 'Manajeman', 'UNIKOM', 'Persidangan', 'masuk', '2024-09-24 07:33:41'),
(30, 33, 'Lala', 'Manajeman', 'UNIKOM', 'Persidangan', 'pulang', '2024-09-24 07:33:48'),
(31, 33, 'Firgi Ahmad Dilla', 'Sistem Informasi', 'ARS University', 'JDIH', 'masuk', '2024-09-24 08:23:59'),
(32, 33, 'Firgi Ahmad Dilla', 'Sistem Informasi', 'ARS University', 'JDIH', 'masuk', '2024-09-24 09:32:48'),
(33, 33, 'Firgi Ahmad Dilla', 'Sistem Informasi', 'ARS University', 'JDIH', 'masuk', '2024-09-24 10:33:00'),
(34, 33, 'Lala', 'Manajeman', 'UNIKOM', 'Persidangan', 'masuk', '2024-09-24 11:21:26'),
(35, 21, 'nandi', 'Sistem Informasi', 'ARS University', 'Persidangan', 'masuk', '2024-09-24 12:09:58'),
(36, 21, 'Firgi Ahmad Dilla', 'Sistem Informasi', 'ARS University', 'JDIH', 'masuk', '2024-09-24 13:08:24'),
(37, 21, 'Panji', 'Akutansi', 'Harvard', 'Persidangan', 'masuk', '2024-09-24 13:12:38'),
(38, 21, 'Panji', 'Akutansi', 'Harvard', 'Persidangan', 'masuk', '2024-09-24 13:12:41'),
(39, 21, 'Panji', 'Akutansi', 'Harvard', 'Persidangan', 'masuk', '2024-09-24 13:12:44'),
(40, 21, 'Panji', 'Akutansi', 'Harvard', 'Persidangan', 'masuk', '2024-09-24 13:12:46'),
(41, 21, 'Panji', 'Akutansi', 'Harvard', 'Persidangan', 'masuk', '2024-09-24 13:20:48'),
(42, 21, 'Panji', 'Akutansi', 'Harvard', 'Persidangan', 'masuk', '2024-09-24 13:20:51'),
(43, 34, 'Panji', 'Akutansi', 'Harvard', 'Persidangan', 'masuk', '2024-09-24 13:34:43'),
(44, 34, 'Firgi Ahmad Dilla', 'Sistem Informasi', 'ARS University', 'JDIH', 'masuk', '2024-09-24 13:35:14'),
(45, 31, 'Lala', 'Manajeman', 'UNIKOM', 'Persidangan', 'masuk', '2024-09-24 13:37:16'),
(46, 35, 'Firgi Ahmad Dilla', 'Sistem Informasi', 'ARS University', 'JDIH', 'masuk', '2024-09-24 13:40:03'),
(47, 35, 'Firgi Ahmad Dilla', 'Sistem Informasi', 'ARS University', 'JDIH', 'masuk', '2024-09-24 13:40:07'),
(48, 35, 'Firgi Ahmad Dilla', 'Sistem Informasi', 'ARS University', 'JDIH', 'pulang', '2024-09-24 13:40:12'),
(49, 21, 'Lala', 'Manajeman', 'UNIKOM', 'Persidangan', 'masuk', '2024-09-24 14:24:23'),
(50, 21, 'Lala', 'Manajeman', 'UNIKOM', 'Persidangan', 'pulang', '2024-09-24 14:24:28'),
(51, 21, 'Lala', 'Manajeman', 'UNIKOM', 'Persidangan', 'masuk', '2024-09-24 14:24:51'),
(52, 36, 'Lala', 'Manajeman', 'UNIKOM', 'Persidangan', 'masuk', '2024-09-24 14:26:36'),
(53, 36, 'Lala', 'Manajeman', 'UNIKOM', 'Persidangan', 'pulang', '2024-09-24 14:26:45'),
(54, 36, 'Ricardo Kaka', 'Manajeman', 'Untat', 'Perpustakaan', 'masuk', '2024-09-24 14:29:16'),
(55, 36, 'Ricardo Kaka', 'Manajeman', 'Untat', 'Perpustakaan', 'masuk', '2024-09-24 14:29:22'),
(56, 35, 'Firgi Ahmad Dilla', 'Sistem Informasi', 'ARS University', 'JDIH', 'masuk', '2024-09-24 14:30:28'),
(57, 35, 'Firgi Ahmad Dilla', 'Sistem Informasi', 'ARS University', 'JDIH', 'pulang', '2024-09-24 14:30:35'),
(58, 37, 'Akang', 'Pariwisata', 'Harvard', 'Perpustakaan', 'masuk', '2024-09-24 14:33:00'),
(59, 36, 'Ricardo Kaka', 'Manajeman', 'Untat', 'Perpustakaan', 'masuk', '2024-09-24 14:51:23'),
(60, 36, 'Akang', 'Pariwisata', 'Harvard', 'Perpustakaan', 'masuk', '2024-09-24 15:08:17'),
(61, 36, 'Akang', 'Pariwisata', 'Harvard', 'Perpustakaan', 'masuk', '2024-09-24 15:08:25'),
(62, 36, 'Ricardo Kaka', 'Manajeman', 'Untat', 'Perpustakaan', 'masuk', '2024-09-24 15:10:18'),
(63, 38, 'Lili', 'Manajeman', 'UNIKOM', 'Persidangan', 'masuk', '2024-09-25 00:45:54'),
(64, 38, 'Lili', 'Manajeman', 'UNIKOM', 'Persidangan', 'masuk', '2024-09-25 00:45:59'),
(65, 35, 'Firgi Ahmad Dilla', 'Sistem Informasi', 'ARS University', 'JDIH', 'masuk', '2024-09-25 00:46:38'),
(66, 35, 'Firgi Ahmad Dilla', 'Sistem Informasi', 'ARS University', 'JDIH', 'pulang', '2024-09-25 00:46:43'),
(67, 35, 'Firgi Ahmad Dilla', 'Sistem Informasi', 'ARS University', 'JDIH', 'masuk', '2024-09-25 00:57:40'),
(68, 39, 'Darayani Haq', 'Teknik Informatika', 'UNIKOM', 'JDIH', 'masuk', '2024-09-25 01:59:05'),
(69, 39, 'Darayani Haq', 'Teknik Informatika', 'UNIKOM', 'JDIH', 'pulang', '2024-09-25 01:59:11'),
(70, 35, 'Firgi Ahmad Dilla', 'Sistem Informasi', 'ARS University', 'JDIH', 'masuk', '2024-09-25 02:13:43'),
(71, 40, 'Olga', 'Manajeman', 'UNIKOM', 'JDIH', 'masuk', '2024-09-25 06:32:24'),
(72, 40, 'Olga', 'Manajeman', 'UNIKOM', 'JDIH', 'pulang', '2024-09-25 06:32:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `name`, `created_at`) VALUES
(1, 'admin1@gmail.com', '$2y$10$/p3QMn2aW7kOtIJaBHohY.URcJWo.UL3O2C4fLQYREwdOYMLW0hyS', 'admin1', '2024-09-24 10:37:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `qr_codes`
--

CREATE TABLE `qr_codes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `kampus` varchar(255) NOT NULL,
  `penempatan` varchar(100) DEFAULT NULL,
  `qr_code_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `qr_codes`
--

INSERT INTO `qr_codes` (`id`, `user_id`, `nama`, `jurusan`, `kampus`, `penempatan`, `qr_code_path`, `created_at`) VALUES
(1, 27, 'Jaka', 'Manajeman', 'Harvard', NULL, 'qrcodes/9dfd00ecd3441f6bf3da70415ea8f335.png', '2024-09-20 02:26:29'),
(2, 27, 'Komar', 'Manajeman', 'Harvard', NULL, 'qrcodes/74dfe12e274c2da515a7399934df9ef2.png', '2024-09-20 02:39:12'),
(3, 27, 'Komar', 'Manajeman', 'Harvard', NULL, 'qrcodes/a0e061cca03e99aba62aff74c4cf2467.png', '2024-09-20 02:39:37'),
(4, 27, 'Satria Bakti Kusuma', 'Manajeman', 'UNIKOM', NULL, '', '2024-09-20 02:48:55'),
(5, 27, 'Firgi', 'Sistem Informasi', 'ARS University', NULL, 'qrcodes/140280e1fd2b531d2400b0a9d2533cb8.png', '2024-09-20 02:54:24'),
(6, 29, 'koko', 'IPA', 'SMA 8', NULL, 'qrcodes/a38b5c871d1ab9ffdcc2101ba501a384.png', '2024-09-20 03:05:01'),
(7, 27, 'Satria Bakti Kusuma', 'Manajeman', 'UNIKOM', NULL, 'qrcodes/b3d03a73543e560a8412d095f7c957fc.png', '2024-09-20 06:34:45'),
(8, 30, 'yoga', 'Manajeman', 'UNIKOM', NULL, 'qrcodes/1eb65469920a249471a7072c08aceb07.png', '2024-09-20 06:39:09'),
(9, 27, 'Kocak', 'Kocak', 'Harvard', NULL, 'qrcodes/34a64869e064917da4a0237b9abbf49c.png', '2024-09-21 07:57:04'),
(10, 27, 'Jaka', 'Teknik Mati-matian Mencintaimu', 'ARS University', NULL, '', '2024-09-21 08:22:22'),
(11, 27, 'hana', 'Manajeman', 'Harvard', NULL, '', '2024-09-21 08:23:53'),
(12, 27, 'Tolo', 'Kocak', 'ARS University', NULL, 'qrcodes/7a5813d8e465f3801fbaa132a9e4f5ec.png', '2024-09-21 09:08:40'),
(13, 27, 'pirgi', 'si', 'ars', NULL, 'qrcodes/d0ec1d32dbf0896a1522f8bdfd0f2647.png', '2024-09-22 08:33:51'),
(14, 27, 'Jaka', 'si', 'ars', NULL, '', '2024-09-22 08:59:35'),
(15, 31, 'Stephen Kusnandar', 'Manajeman', 'UNIKOM', NULL, 'qrcodes/02f63bf20152b75a4274ffe295a40890.png', '2024-09-22 09:46:56'),
(16, 31, 'Firgi', 'Sistem Informasi', 'ARS University', 'JDIH', 'qrcodes/040b31b92fdf4b7b98f6e30bfc8f8da3.png', '2024-09-23 02:11:32'),
(20, 31, 'Satria Bakti Kusuma', 'Teknik Informatika', 'UNIKOM', 'JDIH', '', '2024-09-23 02:34:04'),
(21, 31, 'Satria Bakti Kusuma', 'Teknik Informatika', 'UNIKOM', 'JDIH', 'qrcodes/1b3ae719f477900565a1f09f2fb25cef.png', '2024-09-23 02:36:06'),
(22, 32, 'Rowan Willy San Remo', 'Teknik Informatika', 'STMIK Mardira Indonesia', 'JDIH', 'qrcodes/8a5a00ea1f0a932e9fcf43a8b6ca7d20.png', '2024-09-23 02:48:12'),
(23, 31, 'Firgi Ahmad Dilla', 'Sistem Informasi', 'ARS University', 'JDIH', 'qrcodes/a17a9c07c7cd07d62e91879087971bb5.png', '2024-09-23 03:10:49'),
(24, 31, 'toto', 'Sistem Informasi', 'UNIKOM', 'JDIH', 'qrcodes/c612d5559f55d92e9f641b36a6b12bd5.png', '2024-09-23 06:35:20'),
(25, 31, 'kamischa cahya camellia', 'manajemen perkantoran', 'smk pasundan 1 bandung', 'perpustakaan', 'qrcodes/f31ffab268f33cd9e96fc8e3af50fde6.png', '2024-09-23 06:43:48'),
(26, 31, 'januar', 'Sistem Informasi', 'UNIKOM', 'Persidangan', 'qrcodes/6b727adc499ac0903836523e6a676726.png', '2024-09-23 06:48:30'),
(27, 31, 'bambang', 'Sistem Informasi', 'ars', 'Persidangan', 'qrcodes/eddaf27075e6306f04d5b5c6abe5bf41.png', '2024-09-24 02:56:39'),
(28, 33, 'Lala', 'Manajeman', 'UNIKOM', 'Persidangan', 'qrcodes/44fc4ac4dcb6b07d5354d16e9d25bf15.png', '2024-09-24 07:32:45'),
(29, 33, 'Firgi', 'Manajeman', 'Harvard', 'perpustakaan', 'qrcodes/19ae8b93d23d9b11b96f02aaf8a7b22d.png', '2024-09-24 08:59:33'),
(30, 33, 'Firgi', 'Sistem Informasi', 'UNIKOM', 'JDIH', 'qrcodes/188ba56729ceedb04a50f7f008d2a46a.png', '2024-09-24 11:00:55'),
(31, 33, 'nandi', 'Sistem Informasi', 'ARS University', 'Persidangan', 'qrcodes/54791dec453c547c6973865926f76434.png', '2024-09-24 12:09:27'),
(32, 21, 'Panji', 'Akutansi', 'Harvard', 'Persidangan', 'qrcodes/db303982b3038d63bb29c33b5042d5de.png', '2024-09-24 13:12:16'),
(33, 35, 'Firgi Ahmad Dilla', 'Sistem Informasi', 'ARS University', 'JDIH', 'qrcodes/92ce903e62bf2e473bb6830069f05905.png', '2024-09-24 13:39:31'),
(34, 21, 'Ricardo Kaka', 'Manajeman', 'Untat', 'Perpustakaan', 'qrcodes/3bb1cfa336a3544a9b8ea8b4e1a1427a.png', '2024-09-24 14:22:19'),
(35, 21, 'Akang', 'Pariwisata', 'Harvard', 'Perpustakaan', 'qrcodes/a8b3469665bb34c6d589b6eedc69ec7f.png', '2024-09-24 14:32:06'),
(36, 21, 'Kocak', 'Teknik Mati-matian Mencintaimu', 'SMA 8', 'Perpustakaan', 'qrcodes/49abe11c6a5c22801012a863d2edd000.png', '2024-09-24 14:34:45'),
(37, 21, 'Lili', 'Manajeman', 'UNIKOM', 'Persidangan', 'qrcodes/36acd9f1034e00a0cd227a8f936e4b77.png', '2024-09-25 00:45:11'),
(38, 21, 'Darayani Haq', 'Teknik Informatika', 'UNIKOM', 'JDIH', 'qrcodes/4c58d6e89abc0be008cf1190738589d7.png', '2024-09-25 01:58:24'),
(39, 21, 'Olga', 'Manajeman', 'UNIKOM', 'JDIH', 'qrcodes/de7fee53b3c3949d22e55bb48e1e2b63.png', '2024-09-25 06:31:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `major` varchar(255) DEFAULT NULL,
  `campus` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `major`, `campus`, `created_at`, `password`, `role`) VALUES
(21, 'admin1', 'admin1@gmail.com', NULL, NULL, '2024-09-17 08:18:34', '$2y$10$pHvwnJSLzxIB/3JLpEDAxOfRqHhWsCdO9I6NDtVoaKfQ.oSIXzfUS', 'admin'),
(33, 'lala', 'lala@gmail.com', NULL, NULL, '2024-09-24 07:32:00', '$2y$10$kJTiz.c9PmWSfaGxSpyFCeX2jJaz4c6571wOrXtH2/dv9T3h0d6Pu', 'user'),
(34, 'Panji', 'panji@gmail.com', NULL, NULL, '2024-09-24 13:11:24', '$2y$10$vne722NIb2jkdG5qiYHw6uznHmkuohlcOheSedf6kZhEcZbuLSMee', 'user'),
(35, 'Firgi Ahmad Dilla', 'firgiwalker@gmail.com', NULL, NULL, '2024-09-24 13:38:48', '$2y$10$IkpjlsYd/pTi.F/KO2H60O/NSCU/TGpIkMHvUPunoCK6pzbWE5fKe', 'user'),
(36, 'Ricardo Kaka', 'kaka@gmail.com', NULL, NULL, '2024-09-24 14:21:01', '$2y$10$e6ApbXPZd1M5n35dH4l74OJCeE51nKcgkktVBYTa1O7y8rClnkNyO', 'user'),
(38, 'Lili', 'lili@gmail.com', NULL, NULL, '2024-09-25 00:44:45', '$2y$10$DJuCMZ.SZcOYXVipLnuqbOfYY0H5tK9ij.yGcFxYzJ5MXwQHNCH9O', 'user'),
(39, 'Darayani Haq', 'darahaq1508@gmail.com', NULL, NULL, '2024-09-25 01:57:26', '$2y$10$D5X8Ge1KuPOj7cOMIuU2NuDZwkCmPcrCbeC9rCC/NnrfI3gzZ0ytm', 'user'),
(40, 'Olga', 'olga@gmail.com', NULL, NULL, '2024-09-25 06:30:42', '$2y$10$Q7tjaIUjdxIiNSTM4yJi2.es./v2XSfGS.6SXac2R18KV0jwxIHNO', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `qr_codes`
--
ALTER TABLE `qr_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `qr_codes`
--
ALTER TABLE `qr_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
