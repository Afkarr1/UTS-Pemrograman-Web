-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 28 Okt 2024 pada 19.19
-- Versi server: 10.11.9-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u235672406_root1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `home`
--

CREATE TABLE `home` (
  `id` int(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `home`
--

INSERT INTO `home` (`id`, `keterangan`) VALUES
(1, 'Keahlian'),
(2, 'Pengalaman'),
(3, 'Kontak'),
(4, 'Tentang saya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keahlian`
--

CREATE TABLE `keahlian` (
  `id` int(50) NOT NULL,
  `skill` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `keahlian`
--

INSERT INTO `keahlian` (`id`, `skill`) VALUES
(1, 'Ahli dalam membangun situs web responsif dengan HTML, CSS, dan JavaScript.\r\n'),
(2, 'Berpengalaman dalam framework front-end modern seperti React dan Angular.\r\n'),
(3, 'Mahir dalam manajemen basis data dan pengembangan backend dengan Node.js dan MySQL.\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id` int(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`id`, `nama`, `email`, `Gender`) VALUES
(1, 'sugi', 'sugi@gmail.com', 'Perempuan'),
(2, 'gerry', 'gerryaja@gmail.com', 'Perempuan'),
(3, 'brenden', 'brenden@gmail.com', 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengalaman`
--

CREATE TABLE `pengalaman` (
  `id` int(50) NOT NULL,
  `cerita` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengalaman`
--

INSERT INTO `pengalaman` (`id`, `cerita`) VALUES
(1, 'Memimpin tim pengembang front-end dalam membangun aplikasi website berskala internasional'),
(2, 'Pemenang Desain UI/UX, Jakarta (2022)'),
(3, 'Berhasil meluncurkan platform SaaS yang berkembang hingga 100,000 pengguna dalam 3 bulan pertama'),
(4, 'Merancang topologi jaringan hybrid, menggabungkan wired dan wireless connections yang optimal. Menggunakan VLAN (Virtual Local Area Network) untuk memisahkan segmen jaringan sehingga masing-masing gedung memiliki jaringan tersendiri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tentang_saya`
--

CREATE TABLE `tentang_saya` (
  `id` int(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tentang_saya`
--

INSERT INTO `tentang_saya` (`id`, `deskripsi`) VALUES
(1, 'Halo, saya Rafiafkar, seorang profesional muda yang lahir di Jakarta pada 20 Agustus 2004. Sejak usia dini, saya selalu terpesona oleh dunia teknologi dan bagaimana inovasi dapat mengubah cara kita hidup dan bekerja. Minat saya terutama berfokus pada pengembangan web, jaringan, dan desain digital, di mana saya memadukan kreativitas dengan pemecahan masalah yang efektif. Saya selalu berkomitmen untuk terus belajar dan berkembang dalam menghadapi tantangan teknologi yang dinamis. Dengan kemampuan dalam membangun solusi digital yang inovatif, saya siap membantu mewujudkan ide-ide menjadi kenyataan dan menciptakan pengalaman yang berdampak');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keahlian`
--
ALTER TABLE `keahlian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengalaman`
--
ALTER TABLE `pengalaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tentang_saya`
--
ALTER TABLE `tentang_saya`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `home`
--
ALTER TABLE `home`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `keahlian`
--
ALTER TABLE `keahlian`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengalaman`
--
ALTER TABLE `pengalaman`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tentang_saya`
--
ALTER TABLE `tentang_saya`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
