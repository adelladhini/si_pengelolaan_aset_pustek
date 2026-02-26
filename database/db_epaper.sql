-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 05, 2024 at 06:54 AM
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
-- Database: `db_epaper`
--

-- --------------------------------------------------------

--
-- Table structure for table `epaper`
--

CREATE TABLE `epaper` (
  `id` int NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `id_surat_kabar` int DEFAULT NULL,
  `halaman` varchar(10) DEFAULT NULL,
  `kata_kunci` text,
  `tanggal` date DEFAULT NULL,
  `url` text,
  `isi` text,
  `file_name` varchar(255) DEFAULT NULL,
  `file_type` varchar(100) DEFAULT NULL,
  `file_size` int DEFAULT NULL,
  `user_input` varchar(50) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(50) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `epaper`
--

INSERT INTO `epaper` (`id`, `judul`, `id_surat_kabar`, `halaman`, `kata_kunci`, `tanggal`, `url`, `isi`, `file_name`, `file_type`, `file_size`, `user_input`, `tanggal_input`, `user_update`, `tanggal_update`, `status`) VALUES
(1, 'Raw', 1, 'Asa', 'Asaw', '2023-12-05', 'DSDS', 'FAFA', 'xaa', 'aax', NULL, NULL, NULL, NULL, NULL, 1),
(18617, 'Adaaas', 2, 'Wa', 'keyword', '2023-12-02', 'USSDR', 'asfasfas', NULL, NULL, NULL, '2320', '2023-12-18 07:16:04', '2320', '2023-12-19 04:12:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `epaper_akd`
--

CREATE TABLE `epaper_akd` (
  `id` int NOT NULL,
  `id_epaper` int DEFAULT NULL,
  `id_akd` int DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `epaper_data`
--

CREATE TABLE `epaper_data` (
  `id` int NOT NULL,
  `id_epaper` int DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_size` int DEFAULT NULL,
  `file_type` varchar(100) DEFAULT NULL,
  `isi` text,
  `status` tinyint(1) DEFAULT NULL,
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `epaper_data_copy`
--

CREATE TABLE `epaper_data_copy` (
  `id` int NOT NULL,
  `id_epaper` int DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_size` int DEFAULT NULL,
  `file_type` varchar(100) DEFAULT NULL,
  `isi` text,
  `status` tinyint(1) DEFAULT NULL,
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `epaper_data_copy2`
--

CREATE TABLE `epaper_data_copy2` (
  `id` int NOT NULL,
  `id_epaper` int DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_size` int DEFAULT NULL,
  `file_type` varchar(100) DEFAULT NULL,
  `isi` text,
  `status` tinyint(1) DEFAULT NULL,
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `epaper_subjek`
--

CREATE TABLE `epaper_subjek` (
  `id` int NOT NULL,
  `id_epaper` int DEFAULT NULL,
  `id_subjek` int DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `kemasan`
--

CREATE TABLE `kemasan` (
  `id` int NOT NULL,
  `tanggal` date DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `ringkasan` text,
  `tanggal_awal` date DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `id_subjek` int DEFAULT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `file_type` varchar(100) DEFAULT NULL,
  `file_size` int DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `kemasan_data`
--

CREATE TABLE `kemasan_data` (
  `id` int NOT NULL,
  `id_kemasan` int DEFAULT NULL,
  `id_epaper` int DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `marquee`
--

CREATE TABLE `marquee` (
  `id` int NOT NULL,
  `teks` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `user_input` varchar(50) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(50) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marquee`
--

INSERT INTO `marquee` (`id`, `teks`, `status`, `user_input`, `tanggal_input`, `user_update`, `tanggal_update`) VALUES
(2, 'FSF', 0, '2320', '2023-12-15 04:16:07', '2320', '2023-12-15 04:16:14'),
(3, 'XXXXXXXXX', 1, '2320', '2023-12-15 04:16:24', '2320', '2023-12-18 07:20:59');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int NOT NULL,
  `pengguna` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `golongan` int NOT NULL,
  `id_satker` int NOT NULL,
  `informal_photo_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_satker` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `subjek`
--

CREATE TABLE `subjek` (
  `id` int NOT NULL,
  `subjek` varchar(100) DEFAULT NULL,
  `subjek_en` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `subjek`
--

INSERT INTO `subjek` (`id`, `subjek`, `subjek_en`, `status`, `user_input`, `tanggal_input`, `user_update`, `tanggal_update`) VALUES
(2842, 'SA', 'AS', 0, '2320', '2023-12-15 04:14:58', '2320', '2023-12-15 04:15:09'),
(2843, 'RA', 'AR', 1, '2320', '2023-12-15 04:15:16', NULL, NULL),
(2844, 'QW', 'QW', 1, '2320', '2024-01-03 04:50:59', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjek_copy`
--

CREATE TABLE `subjek_copy` (
  `id` int NOT NULL,
  `subjek` varchar(100) DEFAULT NULL,
  `subjek_en` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `surat_kabar`
--

CREATE TABLE `surat_kabar` (
  `id` int NOT NULL,
  `surat_kabar` varchar(100) NOT NULL,
  `url` text,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `surat_kabar`
--

INSERT INTO `surat_kabar` (`id`, `surat_kabar`, `url`, `status`, `user_input`, `tanggal_input`, `user_update`, `tanggal_update`) VALUES
(1, 'Ader', 'http://localhost/phpmyadmin/index.php?route=/table/change&db=db_epaper&table=surat_kabar', 1, '1', '2023-12-11 10:09:39', '2320', '2023-12-14 06:46:12'),
(21, 'XADA', 'USSDR', 0, '2320', '2023-12-14 07:14:21', '2320', '2023-12-14 07:16:22'),
(22, 'RW', 'USSDR', 1, '2320', '2023-12-14 07:16:34', NULL, NULL),
(23, 'QW', 'FAA', 1, '2320', '2023-12-14 08:58:46', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `epaper`
--
ALTER TABLE `epaper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `epaper_akd`
--
ALTER TABLE `epaper_akd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `epaper_data`
--
ALTER TABLE `epaper_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `epaper_data_copy`
--
ALTER TABLE `epaper_data_copy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `epaper_data_copy2`
--
ALTER TABLE `epaper_data_copy2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `epaper_subjek`
--
ALTER TABLE `epaper_subjek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kemasan`
--
ALTER TABLE `kemasan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kemasan_data`
--
ALTER TABLE `kemasan_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marquee`
--
ALTER TABLE `marquee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjek`
--
ALTER TABLE `subjek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjek_copy`
--
ALTER TABLE `subjek_copy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_kabar`
--
ALTER TABLE `surat_kabar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `epaper`
--
ALTER TABLE `epaper`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18618;

--
-- AUTO_INCREMENT for table `epaper_akd`
--
ALTER TABLE `epaper_akd`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19557;

--
-- AUTO_INCREMENT for table `epaper_data`
--
ALTER TABLE `epaper_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=926;

--
-- AUTO_INCREMENT for table `epaper_data_copy`
--
ALTER TABLE `epaper_data_copy`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6074;

--
-- AUTO_INCREMENT for table `epaper_data_copy2`
--
ALTER TABLE `epaper_data_copy2`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11756;

--
-- AUTO_INCREMENT for table `epaper_subjek`
--
ALTER TABLE `epaper_subjek`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2044;

--
-- AUTO_INCREMENT for table `kemasan`
--
ALTER TABLE `kemasan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kemasan_data`
--
ALTER TABLE `kemasan_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marquee`
--
ALTER TABLE `marquee`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subjek`
--
ALTER TABLE `subjek`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2845;

--
-- AUTO_INCREMENT for table `subjek_copy`
--
ALTER TABLE `subjek_copy`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2648;

--
-- AUTO_INCREMENT for table `surat_kabar`
--
ALTER TABLE `surat_kabar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
