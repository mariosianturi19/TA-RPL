-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8111
-- Generation Time: May 20, 2024 at 08:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `endorsement_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `no_pesanan` varchar(50) NOT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `email_customer` varchar(100) NOT NULL,
  `telp_customer` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `no_pesanan`, `nama_customer`, `email_customer`, `telp_customer`) VALUES
(99, '1', 'goji', 'syafiqdhiyaa@students.undip.ac.id', '1'),
(100, '1', 'mario', 'mario@gmail.com', '0222'),
(101, '3', 'qqqq', 'syafiqdhiyaadlan07@gmail.com', '1'),
(102, '9', 'ww', 'rasha.sabila@gmail.com', '231');

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE `jasa` (
  `id_artis` int(11) NOT NULL,
  `nama_artis` varchar(100) NOT NULL,
  `jumlah_followers` varchar(50) NOT NULL,
  `id_selebgram` int(11) NOT NULL,
  `id_endorsement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jasa`
--

INSERT INTO `jasa` (`id_artis`, `nama_artis`, `jumlah_followers`, `id_selebgram`, `id_endorsement`) VALUES
(1, 'Rachel Vennya', '5.1 M', 1, 211),
(2, 'Dwi Handanda', '1.7 M', 2, 212),
(3, 'Arief Muhammad', '2.4 M', 3, 213),
(4, 'Keanuagl', '3.3 M', 4, 214),
(5, 'Tiara Pangestika', '1.1 M', 5, 215),
(6, 'Nanda Arsynt', '1.6 M', 6, 216),
(7, 'Astaririri', '684 K', 7, 217),
(8, 'Fadil Jaidi', '2.5 M', 8, 218),
(9, 'Dorippu', '563 K', 9, 219),
(10, 'Tasya Farasya', '4.2 M', 10, 220),
(11, 'KioPasha', '9999999M', 11, 221);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `selebgram_id` int(11) DEFAULT NULL,
  `nomor_pesan` varchar(50) NOT NULL,
  `jenis_postingan` enum('Foto','Video','','') NOT NULL,
  `kategori` enum('Produk','Makanan','Fashion','Skincare') NOT NULL,
  `tanggal` date DEFAULT current_timestamp(),
  `total` decimal(10,2) NOT NULL,
  `status` varchar(50) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `selebgram_id`, `nomor_pesan`, `jenis_postingan`, `kategori`, `tanggal`, `total`, `status`) VALUES
(31, 11, '1', 'Foto', 'Produk', '2024-05-21', 0.00, 'Pending'),
(32, 9, '1', 'Video', 'Fashion', '2024-05-21', 0.00, 'Pending'),
(33, 2, '3', 'Foto', 'Produk', '2024-05-21', 0.00, 'Pending'),
(34, 1, '9', 'Foto', 'Produk', '2024-05-21', 0.00, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_awal` int(11) NOT NULL,
  `usernamesid` varchar(50) NOT NULL,
  `passwordss` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_awal`, `usernamesid`, `passwordss`) VALUES
(29, 'user1@students.undip.ac.id', '23'),
(30, 'user14@gmail.com', '23'),
(31, 'mario@students.undip.ac.id', '23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id_artis`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `selebgram_id` (`selebgram_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_awal`),
  ADD UNIQUE KEY `username` (`usernamesid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id_artis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_awal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`selebgram_id`) REFERENCES `jasa` (`id_artis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
