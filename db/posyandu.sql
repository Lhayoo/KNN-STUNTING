-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Feb 2022 pada 03.49
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posyandu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `balita`
--

CREATE TABLE `balita` (
  `id` int(11) NOT NULL,
  `idBalita` varchar(10) DEFAULT NULL,
  `namaBayi` varchar(50) NOT NULL,
  `tempatLahir` varchar(30) NOT NULL,
  `tanggalLahir` date NOT NULL,
  `jenisKelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `namaIbu` varchar(50) NOT NULL,
  `namaAyah` varchar(50) NOT NULL,
  `umur` int(11) DEFAULT NULL,
  `panjangLahir` int(11) DEFAULT NULL,
  `lingkar_kepala` int(11) DEFAULT NULL,
  `beratLahir` int(11) DEFAULT NULL,
  `telp_ibu` varchar(14) DEFAULT NULL,
  `goldar` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `balita`
--

INSERT INTO `balita` (`id`, `idBalita`, `namaBayi`, `tempatLahir`, `tanggalLahir`, `jenisKelamin`, `alamat`, `namaIbu`, `namaAyah`, `umur`, `panjangLahir`, `lingkar_kepala`, `beratLahir`, `telp_ibu`, `goldar`) VALUES
(6, 'BALITA001', 'Revalina Shafa Felcia', 'Pekalongan', '2021-12-28', 'Perempuan', 'Ds Sidosari, Rt/Rw 001/001, Kecamatan Kesesi, Kabupaten Pekalongan', 'Dyah Ayu Maharani', 'Doni Heryanto', 3, 41, 34, 4, '08324155241', 'O'),
(9, 'BALITA002', 'Dimas Sigit', 'Pekalongan', '2022-01-01', 'Laki-Laki', 'Ds Karangrejo, Rt/Rw 001/004, Kecamatan Kesesi, Kabupaten Pekalongan', 'Karyati', 'Suganda', 1, 46, 23, 3, '082412312611', 'O'),
(10, 'BALITA003', 'Dinda Kartika Sari', 'Pekalongan', '2021-11-03', 'Perempuan', 'Ds Kauman, Rt/Rw 001/002, Kecamatan Kesesi, Kabupaten Pekalongan', 'Ika Titin Lestari', 'Karyoto', 3, 41, 23, 3, '0862554412', 'A'),
(11, 'BALITA004', 'Eko Prasetyo', 'Pekalongan', '2021-09-06', 'Laki-Laki', 'Ds Karangrejo, Rt/Rw 003/002, Kecamatan Kesesi, Kabupaten Pekalongan', 'Supinah', 'Kusnadi', 3, 46, 25, 3, '08265432142', 'O');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidan`
--

CREATE TABLE `bidan` (
  `id_bidan` int(11) NOT NULL,
  `nama_bidan` varchar(50) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `pendidikan_terakhir` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bidan`
--

INSERT INTO `bidan` (`id_bidan`, `nama_bidan`, `tempat_lahir`, `tanggal_lahir`, `no_hp`, `pendidikan_terakhir`, `user_id`) VALUES
(1, 'Lutfiana', 'Jakarta', '1999-01-01', '0812000011213', 'SMA', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bumil`
--

CREATE TABLE `bumil` (
  `id` int(11) NOT NULL,
  `idIbu` varchar(10) DEFAULT NULL,
  `namaBumil` varchar(50) NOT NULL,
  `tempatLahir` varchar(30) NOT NULL,
  `tanggalLahir` date NOT NULL,
  `namaSuami` varchar(50) NOT NULL,
  `alamatBumil` text NOT NULL,
  `telp` varchar(20) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `umur` int(11) NOT NULL,
  `usiaKandungan` int(11) DEFAULT NULL,
  `beratAwal` int(11) DEFAULT NULL,
  `tinggiAwal` int(11) DEFAULT NULL,
  `goldar` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bumil`
--

INSERT INTO `bumil` (`id`, `idIbu`, `namaBumil`, `tempatLahir`, `tanggalLahir`, `namaSuami`, `alamatBumil`, `telp`, `pekerjaan`, `umur`, `usiaKandungan`, `beratAwal`, `tinggiAwal`, `goldar`) VALUES
(6, 'BUMIL001', 'Iis Wulandari', 'Pekalongan', '1999-01-22', 'Doni Heryanto', 'Dsn Rowobulus, Ds Watugajah, Rt/Rw 003/001, Kecamatan Kesesi, Kabupaten Pekalongan', '085288172611', 'Ibu Rumah Tangga', 23, 3, 50, 156, 'A'),
(12, 'BUMIL002', 'Dyah Ayu Maharani', 'Pekalongan', '1998-03-04', 'Siswanto', 'Ds Karangrejo, Rt/Rw 001/001, Kecamatan Kesesi, Kabupaten Pekalongan', '085343313443', 'Ibu Rumah Tangga', 24, 1, 54, 154, 'B'),
(13, 'BUMIL003', 'Lili Anggareni', 'Pekalongan', '1999-12-09', 'Rahmat Hidayat', 'Dk Mulyorejo, Ds Karyomukti, Rt/Rw 002/001, Kecamatan Kesesi, Kabupaten Pekalongan', '082371625121', 'Ibu Rumah Tangga', 23, 1, 50, 162, 'O'),
(14, 'BUMIL004', 'Triana Sari', 'Pekalongan', '1999-04-20', 'Danang Setyaji', 'Ds Kauman, Rt/Rw 003/003, Kecamatan Kesesi, Kabupaten Pekalongan', '082341788871', 'Ibu Rumah Tangga', 23, 1, 50, 160, 'O'),
(15, 'BUMIL005', 'Oktaviana', 'Pekalongan', '1999-02-21', 'Dodi Jayanto', 'Ds Kalimade, Rt/Rw 002/001, Kecamatan Kesesi, Kabupaten Pekalongan', '08528818271', 'Ibu Rumah Tangga', 23, 1, 49, 155, 'O');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ibu_hamil`
--

CREATE TABLE `ibu_hamil` (
  `id_ibu_hamil` int(11) NOT NULL,
  `no_kia` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_posyandu` int(11) NOT NULL,
  `status_kehamilan` enum('NORMAL','RISTI','KEK','') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usia_kehamilan` int(2) DEFAULT NULL,
  `tanggal_melahirkan` date DEFAULT NULL,
  `pemeriksaan_kehamilan` enum('v','x') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `konsumsi_pil_fe` enum('v','x') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `butir_pil_fe` int(10) DEFAULT NULL,
  `pemeriksaan_nifas` enum('v','x') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `konseling_gizi` enum('v','x') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kunjungan_rumah` enum('v','x') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `akses_air_bersih` enum('v','x') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kepemilikan_jamban` set('v','x') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jaminan_kesehatan` enum('v','x') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `imunisasi`
--

CREATE TABLE `imunisasi` (
  `id_imunisasi` int(11) NOT NULL,
  `anak_id` int(11) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `ibu_id` int(11) NOT NULL,
  `tgl_skrng` date NOT NULL,
  `usia` int(11) NOT NULL,
  `imunisasi` varchar(30) NOT NULL,
  `vit_a` enum('Merah','Biru') NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lansia`
--

CREATE TABLE `lansia` (
  `id` int(11) NOT NULL,
  `idLansia` varchar(10) DEFAULT NULL,
  `namaLansia` varchar(255) NOT NULL,
  `alamatLansia` text NOT NULL,
  `tempatLahir` varchar(50) NOT NULL,
  `tanggalLahir` date NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `namaPasangan` varchar(255) DEFAULT NULL,
  `beratAwal` int(11) DEFAULT NULL,
  `tinggiAwal` int(11) DEFAULT NULL,
  `goldar` varchar(3) DEFAULT NULL,
  `telp` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lansia`
--

INSERT INTO `lansia` (`id`, `idLansia`, `namaLansia`, `alamatLansia`, `tempatLahir`, `tanggalLahir`, `jk`, `umur`, `namaPasangan`, `beratAwal`, `tinggiAwal`, `goldar`, `telp`) VALUES
(1, 'LANSIA001', 'Sariah', 'Dsn Rowobulus, Ds Watugajah Rt/Rw 001/002, Kecamatan Kesesi Kabupaten Pekalongan', 'Pekalongan', '1954-01-21', 'Perempuan', 60, 'Roko', 49, 150, 'O', '085261625112'),
(3, 'LANSIA002', 'Roko Casmadi', 'Dk Mukten, Ds Karyomukti, Rt/Rw 002/002, Kecamatan Kesesi, Kabupaten Pekalongan', 'Pekalongan', '1940-01-04', 'Laki-Laki', 70, 'Kasturi', 60, 161, 'O', '085241271621'),
(5, 'LANSIA0003', 'Tati Fitriyah', 'Ds Kesesi, Rt/Rw 001/001 Kecamatan Kesesi, Kabupaten Pekalongan', 'Pekalongan', '1951-11-09', 'Perempuan', 60, 'Daklan', 50, 161, 'A', '08216521711');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporanbalita`
--

CREATE TABLE `laporanbalita` (
  `idLaporan` varchar(20) NOT NULL,
  `idBalita` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `jk` varchar(10) NOT NULL,
  `namaibu` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL,
  `idIbu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `user_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login_attempts`
--

INSERT INTO `login_attempts` (`user_id`, `date_time`) VALUES
(1, '2021-01-30 10:23:29'),
(1, '2021-01-30 10:34:46'),
(1, '2021-01-30 10:43:56'),
(1, '2021-01-31 02:28:21'),
(1, '2021-01-31 03:22:35'),
(1, '2021-01-31 09:10:44'),
(1, '2021-01-31 09:26:10'),
(1, '2021-01-31 09:29:54'),
(1, '2021-01-31 09:30:32'),
(1, '2021-02-03 01:44:40'),
(1, '2021-02-05 07:31:28'),
(2, '2021-02-07 11:30:13'),
(1, '2021-02-07 12:51:05'),
(2, '2021-02-07 01:55:44'),
(1, '2021-02-07 01:56:42'),
(1, '2021-02-07 02:20:01'),
(2, '2021-02-07 02:26:00'),
(2, '2021-02-07 05:10:55'),
(1, '2021-02-07 05:12:08'),
(2, '2021-02-07 05:20:27'),
(1, '2021-02-07 05:21:00'),
(1, '2021-02-07 08:28:31'),
(1, '2022-01-12 01:10:14'),
(1, '2022-01-12 01:12:43'),
(1, '2022-01-12 08:13:56'),
(1, '2022-01-12 08:45:35'),
(1, '2022-01-12 12:09:00'),
(1, '2022-01-12 07:24:18'),
(1, '2022-01-12 07:29:24'),
(1, '2022-01-13 12:09:51'),
(1, '2022-01-13 01:54:37'),
(2, '2022-01-13 02:07:52'),
(3, '2022-01-13 02:10:08'),
(2, '2022-01-13 06:49:19'),
(2, '2022-01-13 06:52:58'),
(3, '2022-01-13 06:55:53'),
(2, '2022-01-13 06:56:33'),
(3, '2022-01-13 07:11:37'),
(1, '2022-01-13 07:12:07'),
(2, '2022-01-13 07:44:15'),
(1, '2022-01-13 08:28:41'),
(2, '2022-01-13 09:49:27'),
(1, '2022-01-13 10:11:13'),
(3, '2022-01-13 10:19:57'),
(1, '2022-01-13 01:16:46'),
(1, '2022-01-13 05:37:49'),
(1, '2022-01-13 05:39:46'),
(3, '2022-01-13 06:32:50'),
(1, '2022-01-13 07:49:40'),
(1, '2022-01-14 06:24:07'),
(3, '2022-01-14 08:12:53'),
(1, '2022-01-14 11:17:35'),
(1, '2022-01-14 01:27:13'),
(1, '2022-01-14 06:27:44'),
(1, '2022-01-14 11:51:28'),
(1, '2022-01-15 02:45:26'),
(3, '2022-01-15 02:46:47'),
(2, '2022-01-15 02:47:54'),
(4, '2022-01-15 03:45:17'),
(3, '2022-01-15 04:22:25'),
(1, '2022-01-15 09:33:51'),
(3, '2022-01-15 09:33:59'),
(1, '2022-01-15 08:33:52'),
(1, '2022-01-15 09:08:05'),
(1, '2022-01-15 09:08:30'),
(4, '2022-01-15 10:11:52'),
(3, '2022-01-15 10:51:06'),
(4, '2022-01-15 10:51:54'),
(1, '2022-01-16 05:47:28'),
(1, '2022-01-16 06:22:32'),
(5, '2022-01-16 11:33:28'),
(2, '2022-01-16 11:47:42'),
(2, '2022-01-16 11:49:49'),
(1, '2022-01-16 11:51:03'),
(1, '2022-01-17 10:31:45'),
(1, '2022-01-19 06:02:31'),
(1, '2022-01-19 09:14:09'),
(1, '2022-01-19 11:45:39'),
(1, '2022-01-19 04:06:12'),
(1, '2022-01-20 04:52:35'),
(1, '2022-01-20 09:48:33'),
(1, '2022-01-20 10:21:53'),
(1, '2022-01-20 02:22:54'),
(1, '2022-01-25 02:06:17'),
(1, '2022-01-27 07:50:42'),
(1, '2022-02-04 01:45:45'),
(1, '2022-02-05 10:32:39'),
(7, '2022-02-05 10:42:39'),
(1, '2022-02-05 10:53:25'),
(7, '2022-02-06 08:54:54'),
(1, '2022-02-06 08:56:01'),
(7, '2022-02-06 10:11:01'),
(7, '2022-02-06 10:13:11'),
(1, '2022-02-06 10:31:23'),
(7, '2022-02-06 10:31:33'),
(1, '2022-02-06 10:33:10'),
(1, '2022-02-08 12:44:18'),
(1, '2022-02-09 12:02:09'),
(1, '2022-02-10 06:35:03'),
(1, '2022-02-11 08:40:03'),
(1, '2022-02-11 10:29:18'),
(1, '2022-02-12 08:05:43'),
(1, '2022-02-13 08:54:05'),
(1, '2022-02-14 10:44:26'),
(1, '2022-02-15 09:28:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penimbangan`
--

CREATE TABLE `penimbangan` (
  `idpBalita` int(11) NOT NULL,
  `idBalita` int(11) NOT NULL,
  `tgl_skrng` date NOT NULL,
  `beratLahir` decimal(11,2) NOT NULL,
  `panjangLahir` decimal(11,2) NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penimbangan`
--

INSERT INTO `penimbangan` (`idpBalita`, `idBalita`, `tgl_skrng`, `beratLahir`, `panjangLahir`, `status`) VALUES
(5, 7, '2022-01-20', '3.10', '41.00', NULL),
(6, 7, '2022-01-23', '1.00', '1.00', NULL),
(11, 9, '2022-02-04', '9.00', '9.00', NULL),
(12, 0, '2022-01-03', '4.10', '41.00', NULL),
(13, 6, '2022-01-03', '3.10', '49.00', 'Terlalu Gemuk'),
(14, 6, '2022-02-07', '3.10', '53.00', 'Terlalu Gemuk'),
(15, 6, '2021-12-06', '4.10', '55.00', 'Terlalu Gemuk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penimbanganbumil`
--

CREATE TABLE `penimbanganbumil` (
  `idpbumil` int(11) NOT NULL,
  `id_bumil` int(11) NOT NULL,
  `tgl_sekarang` date DEFAULT NULL,
  `usiaKandungan` int(11) DEFAULT NULL,
  `beratUpdate` decimal(11,2) DEFAULT NULL,
  `beratAwal` decimal(11,2) DEFAULT NULL,
  `hpht` date DEFAULT NULL,
  `perkiraanLahir` date DEFAULT NULL,
  `tinggiIbu` decimal(11,2) DEFAULT NULL,
  `kandunganKe` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penimbanganbumil`
--

INSERT INTO `penimbanganbumil` (`idpbumil`, `id_bumil`, `tgl_sekarang`, `usiaKandungan`, `beratUpdate`, `beratAwal`, `hpht`, `perkiraanLahir`, `tinggiIbu`, `kandunganKe`, `status`) VALUES
(14, 6, '2022-01-03', 3, '50.00', '50.00', '2021-12-26', '2022-10-03', '156.00', 1, 'Terlalu Kurus'),
(15, 6, '2022-02-07', 4, '53.00', '53.00', '2021-02-07', '2021-11-14', '156.00', 1, 'Terlalu Gemuk'),
(16, 12, '2022-01-03', 1, '55.00', '55.00', '2022-01-09', '2022-10-16', '150.00', 2, 'Terlalu Gemuk'),
(17, 12, '2022-02-07', 1, '47.00', '47.00', '2022-01-23', '2022-10-30', '150.00', 2, 'Terlalu Gemuk'),
(18, 13, '2022-01-03', 2, '50.00', '50.00', '2022-01-03', '2022-10-10', '160.00', 1, 'Terlalu Kurus'),
(19, 13, '2022-02-07', 2, '51.00', '51.00', '2022-01-23', '2022-10-30', '160.00', 1, 'Terlalu Gemuk'),
(20, 14, '2022-01-03', 3, '48.00', '48.00', '2021-12-19', '2022-09-26', '161.00', 2, 'Terlalu Kurus'),
(21, 14, '2022-02-07', 3, '53.00', '53.00', '2022-01-23', '2022-10-30', '161.00', 2, 'Terlalu Gemuk'),
(22, 6, '2022-03-07', 3, '55.00', '55.00', '2022-02-20', '2022-11-27', '156.00', 1, 'Terlalu Gemuk'),
(23, 6, '2022-04-04', 4, '57.00', '57.00', '2022-02-20', '2022-11-27', '156.00', 1, 'Terlalu Gemuk'),
(24, 6, '2022-02-14', 3, '45.00', '45.00', '2022-01-31', '2022-11-07', '156.00', 1, 'Terlalu Kurus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penimbanganlansia`
--

CREATE TABLE `penimbanganlansia` (
  `idplansia` int(11) NOT NULL,
  `idLansia` varchar(20) DEFAULT NULL,
  `tanggalLahir` date DEFAULT NULL,
  `beratAwal` decimal(11,2) DEFAULT NULL,
  `beratUpdate` decimal(11,2) DEFAULT NULL,
  `tinggiLansia` decimal(11,2) DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `tgl_sekarang` date DEFAULT NULL,
  `jk` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `golDarah` varchar(2) DEFAULT NULL,
  `namaLansia` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penimbanganlansia`
--

INSERT INTO `penimbanganlansia` (`idplansia`, `idLansia`, `tanggalLahir`, `beratAwal`, `beratUpdate`, `tinggiLansia`, `umur`, `tgl_sekarang`, `jk`, `golDarah`, `namaLansia`, `status`) VALUES
(2, 'LANSIA0001', '1941-01-14', '47.00', '47.00', '152.00', 82, '2022-01-02', 'Perempuan', 'B', 'Sariah', ''),
(3, 'LANSIA0002', '1947-03-10', '60.00', '78.00', '176.00', 75, '2021-12-08', 'Laki-Laki', 'A', 'Roko Casmadi', ''),
(5, 'LANSIA0004', '1949-07-13', '60.00', '60.00', '153.00', 73, '2021-12-25', 'Perempuan', 'O', 'Tati Fitriyah', ''),
(6, 'LANSIA0005', '1958-02-07', '60.00', '60.00', '145.00', 64, '2022-01-01', 'Laki-Laki', 'O', 'Muhammad Tarzi', ''),
(7, 'LANSIA00017', '2022-01-28', '49.00', '49.00', '176.00', 1, '2022-01-06', 'Perempuan', 'B', 'dsds', ''),
(12, '3', NULL, '1.00', '10.00', '10.00', NULL, '2022-02-10', NULL, 'A', NULL, ''),
(15, 'LANSIA001', NULL, '48.00', '48.00', '150.00', NULL, '2022-01-03', NULL, 'B', NULL, NULL),
(16, 'LANSIA001', NULL, '48.00', '48.00', '150.00', NULL, '2022-01-03', NULL, 'O', NULL, NULL),
(17, 'LANSIA002', NULL, '50.00', '50.00', '161.00', NULL, '2022-02-07', NULL, 'B', NULL, NULL),
(18, '1', NULL, '49.00', '49.00', '150.00', NULL, '2022-01-03', NULL, 'O', NULL, 'Terlalu Kurus'),
(19, '1', NULL, '53.00', '53.00', '150.00', NULL, '2022-02-07', NULL, 'O', NULL, 'Terlalu Kurus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `jabatan` enum('Ketua','Bendahara','Sekretaris','Anggota') NOT NULL,
  `pendidikan_terakhir` varchar(30) NOT NULL,
  `lama_kerja` int(11) NOT NULL,
  `tugas_pokok` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `tempat_lahir`, `tgl_lahir`, `no_hp`, `jabatan`, `pendidikan_terakhir`, `lama_kerja`, `tugas_pokok`, `user_id`) VALUES
(1, 'Putri Nugraheni', 'Jakarta', '1999-07-09', '0831300091232', 'Ketua', 'SMA', 5, 'Mengkoordinir semua kegiatan dan organisasi dalam posyandu', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `posyandu`
--

CREATE TABLE `posyandu` (
  `id_posyandu` int(11) NOT NULL,
  `nama_posyandu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_posyandu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posyandu`
--

INSERT INTO `posyandu` (`id_posyandu`, `nama_posyandu`, `alamat_posyandu`, `created_at`, `updated_at`) VALUES
(1, 'Posyandu Pusat', 'Alamat Posyandu Pusat', '2019-10-24 02:25:32', '2020-05-16 22:49:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_users` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level_id` int(1) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_users`, `name`, `username`, `image`, `password`, `level_id`, `is_active`, `date_created`) VALUES
(1, 'Putri Nugraheni', 'punug', 'icon-06.png', 'qwerty', 1, 1, 0),
(9, 'Puput', 'puputtri', NULL, 'puputtri', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_level`
--

CREATE TABLE `users_level` (
  `id_level` int(11) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_level`
--

INSERT INTO `users_level` (`id_level`, `level`) VALUES
(1, 'Petugas'),
(2, 'Bidan'),
(3, 'Bumil'),
(4, 'Lansia');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `balita`
--
ALTER TABLE `balita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bidan`
--
ALTER TABLE `bidan`
  ADD PRIMARY KEY (`id_bidan`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `bumil`
--
ALTER TABLE `bumil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `imunisasi`
--
ALTER TABLE `imunisasi`
  ADD PRIMARY KEY (`id_imunisasi`),
  ADD UNIQUE KEY `anak_id` (`anak_id`),
  ADD UNIQUE KEY `ibu_id` (`ibu_id`);

--
-- Indeks untuk tabel `lansia`
--
ALTER TABLE `lansia`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporanbalita`
--
ALTER TABLE `laporanbalita`
  ADD PRIMARY KEY (`idLaporan`);

--
-- Indeks untuk tabel `penimbangan`
--
ALTER TABLE `penimbangan`
  ADD PRIMARY KEY (`idpBalita`),
  ADD KEY `anak_id` (`idBalita`) USING BTREE;

--
-- Indeks untuk tabel `penimbanganbumil`
--
ALTER TABLE `penimbanganbumil`
  ADD PRIMARY KEY (`idpbumil`);

--
-- Indeks untuk tabel `penimbanganlansia`
--
ALTER TABLE `penimbanganlansia`
  ADD PRIMARY KEY (`idplansia`),
  ADD KEY `idLansia` (`idLansia`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_users`);

--
-- Indeks untuk tabel `users_level`
--
ALTER TABLE `users_level`
  ADD PRIMARY KEY (`id_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `balita`
--
ALTER TABLE `balita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `bidan`
--
ALTER TABLE `bidan`
  MODIFY `id_bidan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bumil`
--
ALTER TABLE `bumil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `imunisasi`
--
ALTER TABLE `imunisasi`
  MODIFY `id_imunisasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lansia`
--
ALTER TABLE `lansia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penimbangan`
--
ALTER TABLE `penimbangan`
  MODIFY `idpBalita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `penimbanganbumil`
--
ALTER TABLE `penimbanganbumil`
  MODIFY `idpbumil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `penimbanganlansia`
--
ALTER TABLE `penimbanganlansia`
  MODIFY `idplansia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users_level`
--
ALTER TABLE `users_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
