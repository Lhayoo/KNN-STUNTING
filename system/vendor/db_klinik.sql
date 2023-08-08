-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2019 at 11:03 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbidan`
--

CREATE TABLE `tbidan` (
  `kode_bidan` int(11) NOT NULL,
  `nama_bidan` varchar(100) NOT NULL,
  `kode_poli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbidan`
--

INSERT INTO `tbidan` (`kode_bidan`, `nama_bidan`, `kode_poli`) VALUES
(1, 'abar', 1),
(2, 'muamar', 2),
(3, 'zaky', 3),
(4, 'dwi', 4),
(5, 'naufal', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tpeserta`
--

CREATE TABLE `tpeserta` (
  `kode_peserta` int(11) NOT NULL,
  `nama_peserta` varchar(100) NOT NULL,
  `umur` int(3) NOT NULL,
  `jenis_kelamin` enum('P','L') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tlp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tpeserta`
--

INSERT INTO `tpeserta` (`kode_peserta`, `nama_peserta`, `umur`, `jenis_kelamin`, `alamat`, `tlp`, `email`) VALUES
(1, 'jaka', 20, 'L', 'jakarta', '02920223', 'asdjas@g.com'),
(2, 'aqil', 29, 'L', 'tangerang', '19311034', 'kil@g.com'),
(3, 'adrian', 19, 'L', 'melati', '3293292', 'ad@ga.com'),
(4, 'rizqi', 34, 'L', 'angrek', '230230', 'rkg@kdajfa.com'),
(5, 'zaka', 30, 'L', 'menteng', '03292', 'z@.acom');

-- --------------------------------------------------------

--
-- Table structure for table `tpoli`
--

CREATE TABLE `tpoli` (
  `kode_poli` int(11) NOT NULL,
  `nama_poli` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tpoli`
--

INSERT INTO `tpoli` (`kode_poli`, `nama_poli`) VALUES
(1, 'poli a'),
(2, 'poli b'),
(3, 'poli c'),
(4, 'poli d'),
(5, 'poli e');

-- --------------------------------------------------------

--
-- Table structure for table `trekam`
--

CREATE TABLE `trekam` (
  `no_transaksi` int(11) NOT NULL,
  `kode_peserta` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_bidan` int(11) NOT NULL,
  `keluhan` varchar(100) NOT NULL,
  `biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trekam`
--

INSERT INTO `trekam` (`no_transaksi`, `kode_peserta`, `tanggal`, `kode_bidan`, `keluhan`, `biaya`) VALUES
(1, 1, '2019-07-09', 1, 'lala', 3000),
(2, 2, '2019-07-20', 2, 'asjd', 9229);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbidan`
--
ALTER TABLE `tbidan`
  ADD PRIMARY KEY (`kode_bidan`);

--
-- Indexes for table `tpeserta`
--
ALTER TABLE `tpeserta`
  ADD PRIMARY KEY (`kode_peserta`);

--
-- Indexes for table `tpoli`
--
ALTER TABLE `tpoli`
  ADD PRIMARY KEY (`kode_poli`);

--
-- Indexes for table `trekam`
--
ALTER TABLE `trekam`
  ADD PRIMARY KEY (`no_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbidan`
--
ALTER TABLE `tbidan`
  MODIFY `kode_bidan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tpeserta`
--
ALTER TABLE `tpeserta`
  MODIFY `kode_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tpoli`
--
ALTER TABLE `tpoli`
  MODIFY `kode_poli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trekam`
--
ALTER TABLE `trekam`
  MODIFY `no_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
