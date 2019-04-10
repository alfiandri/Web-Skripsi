-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2019 at 07:12 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_emas`
--

CREATE TABLE `data_emas` (
  `id` int(10) UNSIGNED NOT NULL,
  `bulan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hargaemas` int(11) NOT NULL,
  `inflasi` decimal(11,2) NOT NULL,
  `kursdollar` int(11) NOT NULL,
  `sukubunga` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_emas`
--

INSERT INTO `data_emas` (`id`, `bulan`, `hargaemas`, `inflasi`, `kursdollar`, `sukubunga`) VALUES
(1, 'Januari 2017', 588000, '3.49', 13418, '4.75'),
(2, 'Februari 2017', 587000, '3.83', 13282, '4.75'),
(3, 'Maret 2017', 593000, '3.61', 13294, '4.75'),
(4, 'April 2017', 589000, '4.17', 13257, '4.75'),
(5, 'Mei 2017', 589000, '4.33', 13249, '4.75'),
(6, 'Juni 2017', 589000, '4.37', 13244, '4.75'),
(7, 'Juli 2017', 587000, '3.88', 13258, '4.75'),
(11, 'Agustus 2017', 597000, '3.82', 13251, '4.50'),
(12, 'September 2017', 611000, '3.72', 13278, '4.25'),
(13, 'Oktober 2017', 607000, '3.58', 13432, '4.25'),
(14, 'November 2017', 622553, '3.30', 13524, '4.25'),
(15, 'Desember 2017', 622000, '3.61', 13459, '4.25'),
(16, 'Januari 2018', 702000, '3.25', 13474, '4.25'),
(17, 'Februari 2018', 638000, '3.18', 13335, '4.25'),
(18, 'Maret 2018', 640000, '3.40', 13724, '4.25'),
(19, 'April 2018', 647000, '3.41', 13681, '4.25'),
(20, 'Mei 2018', 653000, '3.23', 13866, '4.75'),
(21, 'Juni 2018', 653000, '3.12', 13803, '5.25'),
(22, 'Juli 2018', 648000, '3.18', 14259, '5.25'),
(23, 'Agustus 2018', 656000, '3.20', 14370, '5.50'),
(24, 'September 2018', 654000, '2.88', 14693, '5.75'),
(25, 'Oktober 2018', 666000, '3.16', 14830, '5.75'),
(26, 'November 2018', 737000, '3.23', 15119, '6.00'),
(27, 'Desember 2018', 697000, '3.13', 14181, '6.00');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_prediksis`
--

CREATE TABLE `hasil_prediksis` (
  `id` int(10) UNSIGNED NOT NULL,
  `bulan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inflasi` decimal(11,2) NOT NULL,
  `kursdollar` int(11) NOT NULL,
  `sukubunga` decimal(11,2) NOT NULL,
  `hasil` decimal(11,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hasil_prediksis`
--

INSERT INTO `hasil_prediksis` (`id`, `bulan`, `inflasi`, `kursdollar`, `sukubunga`, `hasil`) VALUES
(7, 'Desember 2017', '3.61', 13459, '4.25', '6219.854'),
(8, 'Januari 2018', '3.25', 13474, '4.25', '6348.102');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_02_20_025930_create_data_emas_table', 1),
(3, '2019_02_20_031000_create_hasil_prediksis_table', 1),
(4, '2019_02_20_031227_create_r_l_bs_table', 1),
(5, '2019_02_24_145117_delete_two_columns_from_hasilprediksi_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `r_l_bs`
--

CREATE TABLE `r_l_bs` (
  `id` int(10) UNSIGNED NOT NULL,
  `b0` decimal(11,3) NOT NULL,
  `b1` decimal(11,3) NOT NULL,
  `b2` decimal(11,3) NOT NULL,
  `b3` decimal(11,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `r_l_bs`
--

INSERT INTO `r_l_bs` (`id`, `b0`, `b1`, `b2`, `b3`) VALUES
(1, '1115.213', '-33521.872', '50.461', '-11217.998');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `remember_token`) VALUES
(1, 'Admin', '$2y$10$etgWrl1yko03Dd5zVMdk7eQ6lVgVJZqRS/GcMUoMA0fQbbVT2muFS', 'MdCtwgQLAbAZO54blUj1crYTH5ekYr86lIWBFknzhOjELg2yKMS7mHLvZGfu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_emas`
--
ALTER TABLE `data_emas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_prediksis`
--
ALTER TABLE `hasil_prediksis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_l_bs`
--
ALTER TABLE `r_l_bs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_emas`
--
ALTER TABLE `data_emas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `hasil_prediksis`
--
ALTER TABLE `hasil_prediksis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `r_l_bs`
--
ALTER TABLE `r_l_bs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
