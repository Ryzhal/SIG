-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2024 at 01:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_koperasi`
--

CREATE TABLE `jenis_koperasi` (
  `id_jenis` int(150) NOT NULL,
  `nama_jenis` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_koperasi`
--

INSERT INTO `jenis_koperasi` (`id_jenis`, `nama_jenis`) VALUES
(5, 'Koperasi Pasar'),
(2, 'Koperasi Pegawai RI (KPRI)'),
(4, 'Koperasi Sekolah'),
(1, 'Koperasi Simpan Pinjam (KSP)'),
(3, 'Koperasi Unit Desa (KUD)');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(150) NOT NULL,
  `nama_kecamatan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`) VALUES
(1, 'Lalabata'),
(2, 'Citta'),
(3, 'Ganra'),
(4, 'Marioriawa'),
(5, 'Marioriwawo'),
(6, 'Liliriaja'),
(7, 'Lilirilau'),
(8, 'Donri-Donri');

-- --------------------------------------------------------

--
-- Table structure for table `koperasi`
--

CREATE TABLE `koperasi` (
  `id_koperasi` int(150) NOT NULL,
  `id_kecamatan` int(150) NOT NULL,
  `id_jenis` int(150) NOT NULL,
  `nama_koperasi` varchar(250) NOT NULL,
  `alamat_koperasi` varchar(250) NOT NULL,
  `no_hukum` varchar(250) NOT NULL,
  `nomor_telepon` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `gambar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `koperasi`
--

INSERT INTO `koperasi` (`id_koperasi`, `id_kecamatan`, `id_jenis`, `nama_koperasi`, `alamat_koperasi`, `no_hukum`, `nomor_telepon`, `email`, `gambar`) VALUES
(1, 1, 1, 'Koperasi Ryz', 'Jalan Kayangan No.2', '001/KSP/2024', '08123456', '01ryz@gmail.com', '1731403426_koperasi.png'),
(2, 4, 3, 'Koperasi Muhlis', 'Batu-Batu', '002/KUD/2024', '08212231312', 'Muhlis@gmail.com', 'lawo.jpg'),
(5, 2, 3, 'Koperasi Mila', 'Desa Citta', '0022/KUD/2024', '08974612331', 'mila@yahoo.com', 'lawo.jpg'),
(8, 1, 1, 'Koperasi Eka Ramdani', 'Jalan Malaka', '0033/KSP/2024', '08927123111', 'ekaR@gmail.com', '1731403534_OIP.jpeg'),
(9, 1, 1, 'Koperasi Saddam', 'Jalan Wijaya', '004/KSP/2024', '08512345', 'SaddamPR@gmail.com', '1731409146_saddam.png'),
(10, 5, 1, 'Koperasi Sinta', 'Desa Gattareng', '0031/KSP/2024', '0411-2312312', 'Sinta@gmail.com', '318-gattareng.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(150) NOT NULL,
  `id_koperasi` int(150) NOT NULL,
  `latitude` varchar(150) NOT NULL,
  `longitude` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `id_koperasi`, `latitude`, `longitude`) VALUES
(7, 1, '-4.3564338', '119.88226245665514'),
(8, 2, '-4.1436421', '119.8886758'),
(10, 5, '-4.4341365', '120.0321287'),
(11, 8, '-4.3479423', '119.8915121'),
(14, 9, '-4.3550151', '119.8844493289121'),
(15, 10, '-4.504560599125694', '119.82382022005157');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(100) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(10) NOT NULL,
  `role` enum('admin','user','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'Ryz', '12345', 'admin'),
(2, 'Dekopinda', '12345', 'user'),
(4, 'muhlis', '12345', 'user'),
(6, 'admin', '12345', 'admin'),
(7, 'Ryzhal', '12345', 'admin'),
(8, 'Eka', '12345', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_koperasi`
--
ALTER TABLE `jenis_koperasi`
  ADD PRIMARY KEY (`id_jenis`),
  ADD KEY `nama_jenis` (`nama_jenis`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `koperasi`
--
ALTER TABLE `koperasi`
  ADD PRIMARY KEY (`id_koperasi`),
  ADD KEY `id_kecamatan` (`id_kecamatan`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`),
  ADD KEY `id_koperasi` (`id_koperasi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_koperasi`
--
ALTER TABLE `jenis_koperasi`
  MODIFY `id_jenis` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `koperasi`
--
ALTER TABLE `koperasi`
  MODIFY `id_koperasi` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `koperasi`
--
ALTER TABLE `koperasi`
  ADD CONSTRAINT `koperasi_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`),
  ADD CONSTRAINT `koperasi_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_koperasi` (`id_jenis`);

--
-- Constraints for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD CONSTRAINT `lokasi_ibfk_1` FOREIGN KEY (`id_koperasi`) REFERENCES `koperasi` (`id_koperasi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
