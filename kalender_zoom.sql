-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2021 at 02:15 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kalender_zoom`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_zoom`
--

CREATE TABLE `jadwal_zoom` (
  `id` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `pengguna` varchar(225) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `jumlah_peserta` varchar(25) NOT NULL,
  `host` varchar(225) NOT NULL,
  `akun_zoom` varchar(225) NOT NULL,
  `id_meeting` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `link` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_zoom`
--

INSERT INTO `jadwal_zoom` (`id`, `tanggal_mulai`, `tanggal_selesai`, `waktu_mulai`, `waktu_selesai`, `pengguna`, `deskripsi`, `jumlah_peserta`, `host`, `akun_zoom`, `id_meeting`, `password`, `link`, `username`) VALUES
(4, '2021-06-09', '2021-06-10', '08:00:00', '09:00:00', 'Sosial', 'Pelatihan PODES', '>50', 'ipds', 'pengolahan6400', '64157', 'zoom', 'zoom.id', 'sosial6400'),
(5, '2021-06-07', '2021-06-08', '09:00:00', '14:00:00', 'Produksi', 'Pelatihan', '<50', 'Aulia', 'pengolahan6400', '64157', 'zoom', 'zoom.id', 'produksi6400'),
(6, '2021-06-01', '2021-06-01', '08:00:00', '18:00:00', 'Produksi', 'zoom', '>50', 'ipds', 'pengolahan6400', '64157', 'zoom', 'zoom.id', 'produksi6400'),
(9, '2021-06-21', '2021-06-21', '08:00:00', '14:00:00', 'Nerwilis', 'Pelatihan', '<50', 'Aulia', '', '', '', '', 'nerwilis6400'),
(10, '2021-06-12', '2021-06-12', '08:00:00', '19:00:00', 'Produksi', 'Pelatihan', '<50', 'Aulia', 'pengolahan6400', '64157', 'zoom', 'zoom.id', 'produksi6400');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'bps6400', 'Bps6400'),
(2, 'ipds6400', 'Ipds6400'),
(3, 'sosial6400', 'Sosial6400'),
(4, 'produksi6400', 'Produksi6400'),
(5, 'nerwilis6400', 'Nerwilis6400'),
(6, 'distribusi6400', 'Distribusi6400'),
(7, 'tu6400', 'Tu6400');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal_zoom`
--
ALTER TABLE `jadwal_zoom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal_zoom`
--
ALTER TABLE `jadwal_zoom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
