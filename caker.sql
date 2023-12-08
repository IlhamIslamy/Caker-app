-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Nov 2023 pada 15.05
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caker`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(25) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `password`, `email`, `no_hp`, `level`) VALUES
(3, 'ilham', '123', 'ilham@gmail.com', '085812025090', 'admin'),
(4, 'syam', '123', 'syam@gmail.com', '0987623', 'user'),
(5, 'me', '123', 'sam@gmail.com', '085812025096', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_pelamar`
--

CREATE TABLE `akun_pelamar` (
  `id_pelamar` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `nama_lengkap` varchar(15) NOT NULL,
  `no_telp` int(13) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `id_kategori_1` int(20) DEFAULT NULL,
  `id_kategori_2` int(20) DEFAULT NULL,
  `id_kategori_3` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun_pelamar`
--

INSERT INTO `akun_pelamar` (`id_pelamar`, `username`, `password`, `nama_lengkap`, `no_telp`, `alamat`, `email`, `id_kategori_1`, `id_kategori_2`, `id_kategori_3`) VALUES
(4, 'dmios', 'oke123', 'atilah cuy', 85573, 'malang', 'malang21@gmail.com', NULL, NULL, NULL),
(7, 'atilah', 'aaa123', 'cuy', 852, 'malang', 'milikkita@gmail.com', NULL, NULL, NULL),
(10, 'gimank', '$2y$10$AMnxTP/dom2JvfHePa0zLuq.BxrWRwUk4zrX0/VBTYdxy.6XjAQaG', 'cuy', 852, 'pedesaan', 'punyakita@gmail.com', NULL, NULL, NULL),
(11, 'apik', '$2y$10$jvDwUXrcXgvrYsDwLn6bLu0r/..KskCQcIgCDHhRiNw6WeGHwsDmG', 'phie', 8572, 'cina asli', 'syamadanisyah@gmail.com', NULL, NULL, NULL),
(12, 'haqi', '$2y$10$wVIG7xbVBeQai7793ql9lOJigUVKA4QkZxtvYq882vBn2LVEL7X0K', 'haqi saja', 853, 'jombang', 'hakiahmad756@gmail.com', NULL, NULL, NULL),
(17, 'syam', '$2y$10$m3sfj00tNrwOCusXpIae/eCcyRKD7YzEgdWI5nCV1Bj3/JDC6bWWu', 'syamaidzar', 0, '', '', NULL, NULL, NULL),
(25, 'haqi', '$2y$10$QuLHB63jO/KlVOXZ8CeG9O3dcQArDwO7qhibb6L3e/1uMlPk8m2oa', 'baihaqi', 877, 'jombang', '', NULL, NULL, NULL),
(26, 'amir', '$2y$10$pnTeUxQbTlYaidVYsk.fOubRFIyEDenlYl/iXWJp2QJG9EAk3QDNG', 'amirzan', 87, 'jombang', '', NULL, NULL, NULL),
(27, '', '$2y$10$N2In9jWXPvwuAZG7Az8cauNayv0Y4ZGnYvpCvXBfmB8M8HaJR2moO', '', 0, '', '', NULL, NULL, NULL),
(28, '', '$2y$10$WKwEhMcba0kzJz8z7WMPMOxUQmXZRJMk5hYlVhBN0qlUzNwUAd3Ia', '', 0, '', '', NULL, NULL, NULL),
(38, 'dani', '$2y$10$Fq/eYI5cIRKR4Hz68sf9Te0Yie3UwmHA1IczBkaxuY6CnRf/jyG3e', 'dani', 85, 'jo', 'arenafinder.app@gmail.com', NULL, NULL, NULL),
(39, 'atilah', '$2y$10$zOsAPo.kQGCgDfPifwmq6u5sUXS8svX5w1UzqXGI9i/zjeE39HLGq', 'atilah', 85, 'malang', 'syamadanisyah@gmail.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_post`
--

CREATE TABLE `detail_post` (
  `id_post` int(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `judul_post` varchar(20) NOT NULL,
  `deskripsi_post` text NOT NULL,
  `link_lamar` varchar(200) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `id_akun` int(20) NOT NULL,
  `id_kategori` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_post`
--

INSERT INTO `detail_post` (`id_post`, `nama`, `judul_post`, `deskripsi_post`, `link_lamar`, `foto`, `id_akun`, `id_kategori`) VALUES
(3, 'aman', 'ob', 'bxdhas', 'sjnc', '', 5, 3),
(4, 'polineme', 'satpam', 'qqqqq', 'rqrqrw', '', 5, 4),
(23, 'Mohammad ilham islamy', 'cuci piring', 'ppdiad', 'https://www.youtube.com/watch?v=OFP_Dy6mgxY&list=PLy7XQwTq3Yoly2dR0kF-QMILGFkFZZjZY&index=11', NULL, 4, 5),
(26, 'Farid kurniawan', 'cuci piring', 'popso', 'aaaaaaaaaaaa', NULL, 4, 5),
(29, 'polije', 'OB', 'm n kjnj', 'jbiygi', NULL, 5, 5),
(30, 'aman', 'adsa', 'vyuyxyrxutdyrx', 'icccicfifiudanfa9nuaidsgnu9oioDNG9aingnGND', NULL, 4, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(20) NOT NULL,
  `kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(3, 'IT'),
(4, 'penjaga'),
(5, 'pengajar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `simpan`
--

CREATE TABLE `simpan` (
  `id_simpan` int(20) NOT NULL,
  `id_post` int(20) NOT NULL,
  `id_pelamar` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `verifikasi`
--

CREATE TABLE `verifikasi` (
  `id_verifikasi` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `otp` varchar(6) NOT NULL,
  `type` enum('SignUp','ForgetPass','','') NOT NULL,
  `start_millis` bigint(13) NOT NULL,
  `end_millis` bigint(13) NOT NULL,
  `device` enum('website','mobile','','') NOT NULL,
  `resend` int(2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `verifikasi`
--

INSERT INTO `verifikasi` (`id_verifikasi`, `email`, `otp`, `type`, `start_millis`, `end_millis`, `device`, `resend`, `created_at`) VALUES
(1, 'cakerkita@gmail.com', '744930', 'SignUp', 1699235179041, 1699236079041, 'mobile', 0, '2023-11-06 08:46:19'),
(2, 'cakerkita@gmail.com', '549604', 'SignUp', 1699235394636, 1699236294636, 'mobile', 0, '2023-11-06 08:49:54'),
(3, 'hakiahmad756@gmail.com', '634559', 'SignUp', 1699235453699, 1699236353699, 'mobile', 0, '2023-11-06 08:50:53'),
(4, 'hakiahmad756@gmail.com', '465644', 'SignUp', 1699235490793, 1699236390793, 'mobile', 0, '2023-11-06 08:51:30'),
(5, 'hakiahmad756@gmail.com', '471530', 'SignUp', 1699235551194, 1699236451194, 'mobile', 0, '2023-11-06 08:52:31'),
(6, 'hakiahmad756@gmail.com', '882215', 'SignUp', 1699235584732, 1699236484732, 'mobile', 0, '2023-11-06 08:53:04'),
(7, 'hakiahmad756@gmail.com', '063332', 'SignUp', 1699235645324, 1699236545324, 'mobile', 0, '2023-11-06 08:54:05'),
(8, 'hakiahmad756@gmail.com', '061234', 'SignUp', 1699235751025, 1699236651025, 'mobile', 0, '2023-11-06 08:55:51'),
(9, 'hakiahmad756@gmail.com', '253801', 'SignUp', 1699236683384, 1699237583384, 'mobile', 0, '2023-11-06 09:11:23'),
(10, 'hakiahmad756@gmail.com', '610356', 'SignUp', 1699236780379, 1699237680379, 'mobile', 0, '2023-11-06 09:13:00'),
(11, 'hakiahmad756@gmail.com', '892170', 'SignUp', 1699236905723, 1699237805723, 'mobile', 0, '2023-11-06 09:15:05'),
(12, 'syamadanisyah@gmail.com', '856311', 'SignUp', 1699236939666, 1699237839666, 'mobile', 0, '2023-11-06 09:15:39'),
(13, 'syamadanisyah@gmail.com', '553277', '', 1699240985665, 1699241885665, 'mobile', 0, '2023-11-06 10:23:05'),
(14, 'syamadanisyah@gmail.com', '336477', '', 1699240989649, 1699241889649, 'mobile', 0, '2023-11-06 10:23:09'),
(15, 'syamadanisyah@gmail.com', '832987', '', 1699241154543, 1699242054543, 'mobile', 0, '2023-11-06 10:25:54'),
(16, '', '077035', '', 1699243357055, 1699244257055, 'mobile', 0, '2023-11-06 11:02:37'),
(17, '', '929306', '', 1699243357178, 1699244257178, 'mobile', 0, '2023-11-06 11:02:37'),
(18, '', '563712', '', 1699243357310, 1699244257310, 'mobile', 0, '2023-11-06 11:02:37'),
(19, '', '370881', '', 1699243357722, 1699244257722, 'mobile', 0, '2023-11-06 11:02:37'),
(20, '', '372006', '', 1699243357726, 1699244257726, 'mobile', 0, '2023-11-06 11:02:37'),
(21, '', '271800', '', 1699243359552, 1699244259552, 'mobile', 0, '2023-11-06 11:02:39'),
(22, '', '429798', '', 1699243359653, 1699244259653, 'mobile', 0, '2023-11-06 11:02:39'),
(23, '', '087183', '', 1699243359772, 1699244259772, 'mobile', 0, '2023-11-06 11:02:39'),
(24, 'a', '601240', '', 1699243359922, 1699244259922, 'mobile', 0, '2023-11-06 11:02:39'),
(25, 'syamadanisyah@gmail.com', '983234', '', 1699243635846, 1699244535846, 'mobile', 0, '2023-11-06 11:07:15'),
(26, '', '975999', '', 1699245124713, 1699246024713, 'mobile', 0, '2023-11-06 11:32:04'),
(27, 'syamadanisyah@gmail.com', '581791', '', 1699245134913, 1699246034913, 'mobile', 0, '2023-11-06 11:32:14'),
(28, 'syamadanisyah@gmail.com', '439580', '', 1699245299057, 1699246199057, 'mobile', 0, '2023-11-06 11:34:59'),
(29, 'syamadanisyah@gmail', '991205', '', 1699247697696, 1699248597696, 'mobile', 0, '2023-11-06 12:14:57'),
(30, 'syamadanisyah@gmail', '449845', '', 1699247713432, 1699248613432, 'mobile', 0, '2023-11-06 12:15:13'),
(31, 'syamadanisyah@gmail', '895325', '', 1699247726138, 1699248626138, 'mobile', 0, '2023-11-06 12:15:26'),
(32, 'syamadanisyah@gmail.com', '008711', '', 1699247769667, 1699248669667, 'mobile', 0, '2023-11-06 12:16:09'),
(33, 'syamadanisyah@gmail.com', '184994', '', 1699247785025, 1699248685025, 'mobile', 0, '2023-11-06 12:16:25'),
(34, 'arenafinder.app@gmail.com', '581425', 'SignUp', 1699408383021, 1699409283021, 'mobile', 0, '2023-11-08 08:53:03'),
(35, 'arenafinder.app@gmail.com', '693374', 'SignUp', 1699408796490, 1699409696490, 'mobile', 0, '2023-11-08 08:59:56'),
(36, 'arenafinder.app@gmail.com', '681096', 'SignUp', 1699408965956, 1699409865956, 'mobile', 0, '2023-11-08 09:02:45'),
(37, 'arenafinder.app@gmail.com', '995741', 'SignUp', 1699409630719, 1699410530719, 'mobile', 0, '2023-11-08 09:13:50'),
(38, 'syamadanisyah@gmail.com', '175731', 'SignUp', 1699412055830, 1699412955830, 'mobile', 0, '2023-11-08 09:54:15');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `akun_pelamar`
--
ALTER TABLE `akun_pelamar`
  ADD PRIMARY KEY (`id_pelamar`),
  ADD KEY `kategori1` (`id_kategori_1`),
  ADD KEY `kategori2` (`id_kategori_2`),
  ADD KEY `kategori3` (`id_kategori_3`);

--
-- Indeks untuk tabel `detail_post`
--
ALTER TABLE `detail_post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_akun` (`id_akun`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `simpan`
--
ALTER TABLE `simpan`
  ADD PRIMARY KEY (`id_simpan`),
  ADD KEY `id_post` (`id_post`),
  ADD KEY `id_pelamar` (`id_pelamar`);

--
-- Indeks untuk tabel `verifikasi`
--
ALTER TABLE `verifikasi`
  ADD PRIMARY KEY (`id_verifikasi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `akun_pelamar`
--
ALTER TABLE `akun_pelamar`
  MODIFY `id_pelamar` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `detail_post`
--
ALTER TABLE `detail_post`
  MODIFY `id_post` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `simpan`
--
ALTER TABLE `simpan`
  MODIFY `id_simpan` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `verifikasi`
--
ALTER TABLE `verifikasi`
  MODIFY `id_verifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `akun_pelamar`
--
ALTER TABLE `akun_pelamar`
  ADD CONSTRAINT `kategori1` FOREIGN KEY (`id_kategori_1`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `kategori2` FOREIGN KEY (`id_kategori_2`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `kategori3` FOREIGN KEY (`id_kategori_3`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `detail_post`
--
ALTER TABLE `detail_post`
  ADD CONSTRAINT `detail_post_ibfk_1` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_post_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `simpan`
--
ALTER TABLE `simpan`
  ADD CONSTRAINT `simpan_ibfk_1` FOREIGN KEY (`id_pelamar`) REFERENCES `akun_pelamar` (`id_pelamar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
