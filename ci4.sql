-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Des 2023 pada 09.52
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_dokter`
--

CREATE TABLE `data_dokter` (
  `id` char(36) NOT NULL,
  `nama_dokter` varchar(225) NOT NULL,
  `no_telp` bigint(20) NOT NULL,
  `email_dokter` varchar(225) NOT NULL,
  `spesialisasi` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_dokter`
--

INSERT INTO `data_dokter` (`id`, `nama_dokter`, `no_telp`, `email_dokter`, `spesialisasi`, `alamat`, `created_at`, `updated_at`) VALUES
('DD2', 'Dr. Galih Krisna Aji', 85648825436, 'krisnagalihsan@gmail.com', 'Syaraf', 'Jetak, Alastuwo, Kebakkramat, Karanganyar', 0, 0),
('dd3', 'Dokter 3', 90909090909, 'dokter3@gmail.com', 'bedah 3', 'Sukoharjo 3', 0, 2023);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pasien`
--

CREATE TABLE `data_pasien` (
  `id_pasien` char(36) NOT NULL,
  `nama_pasien` varchar(225) NOT NULL,
  `telp_pasien` bigint(20) NOT NULL,
  `alamat_pasien` varchar(225) NOT NULL,
  `id_dokter` char(36) NOT NULL,
  `keluhan` varchar(225) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pasien`
--

INSERT INTO `data_pasien` (`id_pasien`, `nama_pasien`, `telp_pasien`, `alamat_pasien`, `id_dokter`, `keluhan`, `created_at`, `updated_at`) VALUES
('IDpasien5', 'pasien55', 5050505055, 'Alamat pasien 55', 'DD2', 'keluhan pasien 55', 2023, 2023),
('pp2', 'Pasien 22', 808080808082, 'Surakarta2', 'dd3', 'Nyeri dada2', 2023, 2023);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_dokter`
--
ALTER TABLE `data_dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_pasien`
--
ALTER TABLE `data_pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD KEY `pasien_id_dokter` (`id_dokter`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_pasien`
--
ALTER TABLE `data_pasien`
  ADD CONSTRAINT `pasien_id_dokter` FOREIGN KEY (`id_dokter`) REFERENCES `data_dokter` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
