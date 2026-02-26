-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 05, 2024 at 06:46 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_medsos`
--

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int NOT NULL,
  `pengguna` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `golongan` int NOT NULL,
  `id_satker` int NOT NULL,
  `informal_photo_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_satker` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `pengguna`, `nama`, `nip`, `golongan`, `id_satker`, `informal_photo_name`, `nama_satker`) VALUES
(1, 'dea', 'Andrea Zoe Putri Sukonco', '111', 1, 1, '1', 'Pustekinfo'),
(2, 'reta', 'Areta Escalonia Candra', '222', 1, 1, '1', 'Pustekinfo'),
(3, 'ivan', 'Christian Ivan Wibowo', '333', 1, 1, '1', 'Pustekinfo'),
(4, 'tira', 'Yustira Nhisya Shabilla', '444', 1, 1, '1', 'Pustekinfo'),
(5, 'tester', 'Tester Dev', '555', 5, 5, '5', 'Pustekinfo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
