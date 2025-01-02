-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jul 2024 pada 04.29
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siyakub`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ayam`
--

CREATE TABLE `ayam` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ayam`
--

INSERT INTO `ayam` (`id`, `nama`, `gambar`, `deskripsi`) VALUES
(2, 'Ayam KUB-1', 'gambar/ayam1.jpg', 'Ayam KUB ini diproklamirkan sebagai ayam unggulan Balitnak sejak tahun 2009 melalui (SK Mentan RI No. 274/Kpts/SR.120/2/2014) tentang Pelepasan Galur Ayam KUB. Keunggulan produksi telur tinggi yaitu produksi telur henday 45-50%, Puncak produksi 65%, produksi telur/tahun 160-180 butir, konsumsi pakan 80-85 gram, sifat mengeram 10% dari total populasi, Umur pertama bertelur 22-24 minggu, bobot telur 35-45 gram dan konversi pakan 3,8.'),
(3, 'Ayam KUB-2', 'gambar/ayam2.jpg', 'Ayam KUB 2 atau “JANAKA” ini membawa beberapa peningkatan dari Ayam KUB 1 sebelumnya, antara lain : 1 Dalam satu tahun dapat memproduksi telur sekitar 200 butir per ekornya, 2. Mulai bertelur pada usia 20-21 minggu, 3. Untuk pedaging masa panennya yaitu 60 hari bobot sekitar 1-1,2 kg, 4. Sifat mengeram lebih rendah dari generasi sebelumnya yaitu 5%, 5. Hen day ayam KUB 2 yaitu 60%, 6. Tingkat stress rendah, 7. Ketahanan hidup tinggi, serta 8. Lebih adaptif'),
(4, 'Ayam SenSi-1 Agrinak', 'gambar/ayam3.jpeg', 'Ayam SenSi-1 Agrinak diproklamirkan sebagai ayam Unggulan Balitnak pada tahun 2017 melalui SK Menteri Pertanian No. 39/Kpts/PK.020/1/2017 pada tanggal 20 Januari 2017 tentang pelepasan galur Ayam SenSi-1 Agrinak. Ayam SenSi-1 Agrinak ini merupakan hasil penelitian seleksi galur jantan (male line) selama 6 generasi dengan keunggulan pertumbuhan dan bobot badan yang lebih tinggi.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buletin`
--

CREATE TABLE `buletin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buletin`
--

INSERT INTO `buletin` (`id`, `email`) VALUES
(4, 'cindyafriana82@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subjek` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `portofolio`
--

CREATE TABLE `portofolio` (
  `id` int(11) NOT NULL,
  `gambar` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `portofolio`
--

INSERT INTO `portofolio` (`id`, `gambar`, `created_at`) VALUES
(2, 'gambar/portfolio-1.jpg', '2024-07-23 04:00:40'),
(3, 'gambar/2.jpg', '2024-07-23 04:00:46'),
(4, 'gambar/3.jpg', '2024-07-23 04:00:50'),
(5, 'gambar/4.jpg', '2024-07-23 04:00:54'),
(6, 'gambar/5.jpg', '2024-07-23 04:00:58'),
(7, 'gambar/6.jpg', '2024-07-23 04:01:03'),
(8, 'gambar/7.jpg', '2024-07-23 04:01:07'),
(9, 'gambar/8.jpg', '2024-07-23 04:01:11'),
(12, 'gambar/portfolio-9.jpg', '2024-07-24 01:28:22');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `ayam`
--
ALTER TABLE `ayam`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `buletin`
--
ALTER TABLE `buletin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `portofolio`
--
ALTER TABLE `portofolio`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ayam`
--
ALTER TABLE `ayam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `buletin`
--
ALTER TABLE `buletin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `portofolio`
--
ALTER TABLE `portofolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
