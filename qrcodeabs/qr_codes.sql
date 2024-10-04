-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Okt 2024 pada 10.24
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
-- Struktur dari tabel `qr_codes`
--

CREATE TABLE `qr_codes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) NOT NULL,
  `kampus` varchar(255) NOT NULL,
  `penempatan` varchar(255) NOT NULL,
  `foto_path` varchar(255) NOT NULL,
  `qr_code_path` varchar(255) NOT NULL,
  `user_image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `qr_codes`
--

INSERT INTO `qr_codes` (`id`, `user_id`, `nama`, `email`, `jurusan`, `kampus`, `penempatan`, `foto_path`, `qr_code_path`, `user_image_path`, `created_at`, `foto`) VALUES
(5, 50, 'Firgi', NULL, 'Sistem Informasi', 'Harvard', 'JDIH', '', 'barcodes/5.png', NULL, '2024-10-01 07:33:08', NULL),
(6, 21, 'Tutut', NULL, 'Sistem Informasi', 'ARS University', 'JDIH', '', 'qrcodes/2b2275b83e64eb4aa24c4878e957a9ef.png', NULL, '2024-10-01 08:36:06', NULL),
(7, 21, 'Willy', NULL, 'Teknik Informatika', 'Harvard', 'JDIH', '', 'qrcodes/f1cda41864563c7f128cc12e36d9b94d.png', NULL, '2024-10-02 02:03:06', NULL),
(8, 21, 'januar', NULL, 'TI', 'Harvard', 'Persidangan', '', 'qrcodes/c842e9eea7969320d6f2bad497119a55.png', NULL, '2024-10-02 04:08:54', NULL),
(33, 21, 'Nunu', NULL, 'Sistem Informasi', 'ARS University', 'JDIH', '', 'qrcodes/3811549733ca96254b5d3e9fc197cde9.png', 'uploads/66fe1df35f01f0.71362948.jpg', '2024-10-03 04:30:43', NULL),
(35, 21, 'wawan', NULL, 'Sistem Informasi', 'Harvard', 'Persidangan', '', 'qrcodes/7ae1c40d0ee8686908ffaac555af5de7.png', 'uploads/66fe45ede22e06.36421896.jpg', '2024-10-03 07:21:17', NULL),
(36, 21, 'jaka', NULL, 'Teknik Informatika', 'UT', 'Keuangan', '', 'qrcodes/3a88af2c14a28565b35391ea0a2d7426.png', 'uploads/66fe4f97ddb963.96091778.jpeg', '2024-10-03 08:02:31', NULL),
(37, 21, 'jono', NULL, 'Teknik Informatika', 'UNIKOM', 'Persidangan', '', 'qrcodes/1585abba077f1178fce48d58de451def.png', 'uploads/66fe5499b54755.76584302.jpg', '2024-10-03 08:23:53', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `qr_codes`
--
ALTER TABLE `qr_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `qr_codes`
--
ALTER TABLE `qr_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `qr_codes`
--
ALTER TABLE `qr_codes`
  ADD CONSTRAINT `qr_codes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
