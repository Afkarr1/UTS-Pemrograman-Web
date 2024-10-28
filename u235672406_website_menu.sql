-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 28 Okt 2024 pada 10.10
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
-- Database: `u235672406_website_menu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `keterangan`) VALUES
(1, 'Katalog'),
(2, 'Service'),
(3, 'Kontak'),
(4, 'Tentang Kami');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Katalog`
--

CREATE TABLE `Katalog` (
  `id` int(50) NOT NULL,
  `nama_mesin` text NOT NULL,
  `deskripsi_mesin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `Katalog`
--

INSERT INTO `Katalog` (`id`, `nama_mesin`, `deskripsi_mesin`) VALUES
(1, 'Canon IR 2006N\r\n', 'Mesin Fotocopy Canon IR 2006N adalah pilihan terbaik untuk kebutuhan bisnis Anda.\r\n\r\n'),
(2, 'Kyocera M2040DN\r\n', 'Mesin Fotocopy Kyocera M2040DN memberikan kecepatan tinggi dan efisiensi yang maksimal.\r\n\r\n'),
(3, 'FUJI XEROX DC S1810\r\n', 'Mesin Fotocopy Fuji Xerox DC S1810 adalah solusi tepat untuk kebutuhan kantor Anda.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Kontak`
--

CREATE TABLE `Kontak` (
  `id` int(35) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `Kontak`
--

INSERT INTO `Kontak` (`id`, `username`, `email`, `gender`, `alamat`) VALUES
(1, 'Samsul', 'Samsul@gmail.com', 'Laki-laki', 'Jombang Raya'),
(2, 'hahaha', 'hahaha@gmail.com', 'Laki-Laki', 'hahaha'),
(4, 'badrul', 'badrul@gmail.com', 'Perempuan', 'kemayoran'),
(5, 'Dika', 'dika@gmail.com', 'Perempuan', 'Kalimantan '),
(6, 'Dika', 'dika@gmail.com', 'Perempuan', 'Kalimantan '),
(7, 'bembeng', 'bembeng@gmail.com', 'Laki-Laki', 'jawa'),
(8, 'jek', 'jekjek@gmail.com', 'Laki-Laki', 'madagaskar'),
(9, 'Bren', 'brenbren@gmail.com', 'Perempuan', 'kampung'),
(10, 'Mamat', 'Mamad@gmail.com', 'Laki-Laki', 'pondok bambu'),
(11, 'gery', 'gerry@gmail.com', 'Laki-Laki', 'sukabumi'),
(12, 'kessy', 'kessy@gmail.com', 'Perempuan', 'bandung'),
(13, 'PIN', 'ipin@gmail.com', 'Perempuan', 'solo'),
(14, 'PIN', 'ipin@gmail.com', 'Perempuan', 'solo'),
(15, 'PIN', 'ipin@gmail.com', 'Perempuan', 'solo'),
(16, 'PIN', 'ipin@gmail.com', 'Perempuan', 'solo'),
(17, 'upun', 'upun@gmail.com', 'Laki-Laki', 'jombang'),
(18, 'jeck', 'jeck@gmail.com', 'Laki-Laki', 'vilmut'),
(19, 'indah', 'indah@gmail.com', 'Laki-Laki', 'lombok'),
(20, 'Badrul', 'badrul@gmail.com', 'Laki-Laki', 'Spain'),
(21, 'sukidi', 'sukidi@gmail.com', 'Perempuan', 'madagaskar'),
(22, 'jok', 'jok@gmail.com', 'Perempuan', 'portugal\r\n'),
(23, 'rafi afkar', 'rzlcopy151@gmail.com', 'Laki-Laki', 'Vila Bintaro Indah blok B 7 nomor 20 Jombang ciputat Tangerang Selatan'),
(24, 'gerry', 'gerry22@gmail.com', 'Perempuan', 'bogor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Service`
--

CREATE TABLE `Service` (
  `id` int(50) NOT NULL,
  `layanan_kami` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `Service`
--

INSERT INTO `Service` (`id`, `layanan_kami`) VALUES
(1, 'Jual Mesin Fotocopy Xerox, Canon, Kyocera, dan Epson'),
(2, 'Sewa Mesin Fotocopy Xerox, Canon, Kyocera, dan Epson'),
(3, 'Maintenance Mesin Fotocopy Xerox, Canon, Kyocera, dan Epson'),
(4, 'Sparepart Mesin Fotocopy Xerox, Canon, Kyocera, dan Epson');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Tentang`
--

CREATE TABLE `Tentang` (
  `id` int(50) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `alamat_perusahan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `Tentang`
--

INSERT INTO `Tentang` (`id`, `nama_perusahaan`, `deskripsi`, `alamat_perusahan`) VALUES
(1, 'Fotocopy Jakarta', 'Kami adalah perusahaan yang bergerak di bidang bisnis importir Mesin Fotocopy yang meliputi :\r\n\r\nJual, Beli Mesin Fotocopy Xerox, Canon, Toshiba & Kyocera\r\nSewa Mesin Fotocopy\r\nService Mesin Fotocopy\r\nBahan Pakai seperti Toner, Drum, Blade & Sparepart\r\nTipe mesin yang kami suport antara lain :\r\n\r\nMesin Fotocopy Xerox\r\nXerox DC 236/286/336\r\nXerox DC 2005/3005\r\nXerox DC 2007/3007\r\nXerox Apeos 4000/5010\r\nXerox WC 7535/5890\r\nMesin Fotocopy Canon\r\nCanon iR 3570/4570\r\nCanon iR 5570/6570\r\nCanon iR 5000/6000\r\nCanon iRA 4035/4045\r\nCanon iRA 6075/6055\r\nBila Mesin Fotocopy yang anda butuhkan tidak ada dalam daftar, silahkan hubungi kami untuk informasi lebih lanjut dan layanan kami meliputi : Jakarta, Depok, Bekasi , Cikarang, Cibitung, Tangerang, BSD, Pamulang, Bintaro, Ciputat, Bogor dan luar kota seluruh wilayah Indonesia.\r\n\r\nDengan berbekal pengalaman dan Tim Support yang Profesional, kami melayani Anda Calon maupun Konsumen dengan pelayanan yang Terbaik dan Memuaskan.', 'Villa Bintaro Indah Blok D2 no 3');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `Katalog`
--
ALTER TABLE `Katalog`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `Kontak`
--
ALTER TABLE `Kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `Service`
--
ALTER TABLE `Service`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `Tentang`
--
ALTER TABLE `Tentang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `Katalog`
--
ALTER TABLE `Katalog`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `Kontak`
--
ALTER TABLE `Kontak`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `Service`
--
ALTER TABLE `Service`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `Tentang`
--
ALTER TABLE `Tentang`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
