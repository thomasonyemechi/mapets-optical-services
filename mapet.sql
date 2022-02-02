-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2022 at 08:55 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mapet`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `card_id` varchar(30) NOT NULL,
  `complaint` text DEFAULT NULL,
  `history` text DEFAULT NULL,
  `visualAcuityWithoutGlassesDistanceOd` varchar(255) DEFAULT NULL,
  `visualAcuityWithoutGlassesDistanceOs` varchar(255) DEFAULT NULL,
  `visualAcuityWithoutGlassesNearOd` varchar(255) DEFAULT NULL,
  `visualAcuityWithoutGlassesNearOs` varchar(255) DEFAULT NULL,
  `visualAcuityWithGlassesDistanceOd` varchar(255) DEFAULT NULL,
  `visualAcuityWithGlassesDistanceOs` varchar(255) DEFAULT NULL,
  `visualAcuityWithGlassesNearOd` varchar(255) DEFAULT NULL,
  `visualAcuityWithGlassesNearOs` varchar(255) DEFAULT NULL,
  `externalExaminationOd` varchar(1000) DEFAULT NULL,
  `externalExaminationOs` varchar(1000) DEFAULT NULL,
  `iopTimeOd` varchar(1000) DEFAULT NULL,
  `iopTimeOs` varchar(1000) DEFAULT NULL,
  `posteriorSegmentOd` text DEFAULT NULL,
  `posteriorSegmentOs` text DEFAULT NULL,
  `subjectiveRefractionDistanceOd` varchar(1000) DEFAULT NULL,
  `subjectiveRefractionDistanceOs` varchar(1000) DEFAULT NULL,
  `subjectiveRefractionNearOd` varchar(1000) DEFAULT NULL,
  `subjectiveRefractionNearOs` varchar(1000) DEFAULT NULL,
  `diagnosis` text DEFAULT NULL,
  `treatmentPlan` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `remark` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `client_id`, `card_id`, `complaint`, `history`, `visualAcuityWithoutGlassesDistanceOd`, `visualAcuityWithoutGlassesDistanceOs`, `visualAcuityWithoutGlassesNearOd`, `visualAcuityWithoutGlassesNearOs`, `visualAcuityWithGlassesDistanceOd`, `visualAcuityWithGlassesDistanceOs`, `visualAcuityWithGlassesNearOd`, `visualAcuityWithGlassesNearOs`, `externalExaminationOd`, `externalExaminationOs`, `iopTimeOd`, `iopTimeOs`, `posteriorSegmentOd`, `posteriorSegmentOs`, `subjectiveRefractionDistanceOd`, `subjectiveRefractionDistanceOs`, `subjectiveRefractionNearOd`, `subjectiveRefractionNearOs`, `diagnosis`, `treatmentPlan`, `status`, `remark`, `created_at`, `updated_at`) VALUES
(2, 2, '1927', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1, '2021-10-01 08:20:40', '2021-09-28 22:42:08'),
(3, 2, '4449', 'Complaint', 'Past History', 'NLP', 'NLP', '< N36', '< N36', 'NLP', 'NLP', '< N36', '< N36', 'n/24', '<345*/232', '<345*/232', '<345*/232', 'C:D:R\r\n30/NAD', 'C:D:R\r\n30/NAD', '-100/-0.50x90', '> 6/6', 'add + 2.50> ', '>n/5', 'myopia\r\npresbyopia\r\nallergic conjuntivitis', '-Gutt luymoicel t|Tds x 1/12', 0, 0, '2021-10-01 07:55:01', '2021-09-28 23:18:34'),
(8, 2, '3632', '', 'baewbabeb', 'cf@1mtrs', 'cf@1mtrs', 'N24', 'N18', '6/18', '6/24', 'N12', 'N24', 'n/24', '<345*/232', '<345*/232', '<345*/232', '', '', '-100/-0.50x90', '> 6/6', 'add + 2.50> ', '>n/5', '', '', 0, 0, '2021-10-01 07:55:07', '2021-09-29 06:03:36'),
(9, 2, '2323', 'ownebjwevnujwvwbvjwbvjwehv', '', 'cf@2mtrs', 'cf@1mtrs', 'N24', '', '6/24', '6/6', 'N12', 'N8', 'n/24', '<345*/232', '<345*/232', '<345*/232', '', '', '-100/-0.50x90', '> 6/6', 'add + 2.50> ', '>n/5', 'ununwrvnwvnuwnevu', 'wjefbvwhiqebvhibwv\r\n', 0, 0, '2021-10-01 10:57:14', '2021-09-29 07:59:46'),
(10, 4, '23762', 'Complaint', 'Past History', 'cf@1mtrs', 'cf@3mtrs', 'N24', 'N12', '6/24', '6/9', 'N24', 'N12', 'n/22', '<345*/23', '<345*/23', '<345*/232', '', '', '-100/-0.50x90', '> 6/6', 'add + 2.50> ', '>n/5', 'Diagnosis', 'Treatment Plan', 1, 1, '2021-10-01 10:52:32', '2021-10-01 10:50:27'),
(12, 2351, '12312212', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '2021-10-01 11:13:01', '2021-10-01 11:13:01'),
(13, 0, '', 'Complaint', '', '6/12', '6/36', 'N36', 'N18', 'cfcf', '6/18', 'N8', 'N36', 'n/22', '<345*/232', '<345*/232', '<345*/232', '', '', '-100/-0.50x90', '> 6/6', 'add + 2.50> ', '>n/5', '', '', 1, 0, '2021-10-01 13:37:21', '2021-10-01 13:37:21'),
(14, 0, '', '', '', '6/36', '', '', 'N12', '6/24', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '2021-10-01 13:38:26', '2021-10-01 13:38:26'),
(15, 0, '', '', '', '6/36', '', '', 'N12', '6/24', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '2021-10-01 13:39:08', '2021-10-01 13:39:08'),
(16, 0, '', '', '', '6/36', '', '', 'N12', '6/24', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '2021-10-01 13:39:41', '2021-10-01 13:39:41'),
(18, 2353, '18', '', '', '6/12', '6/18', 'N36', 'N6', 'cf@1mtrs', 'cf@3mtrs', 'N24', 'N18', 'n/24', '<345*/23', '<345*/23', '', '', '', '', '', '', '', '', '', 0, 3, '2021-10-01 13:44:08', '2021-10-01 13:43:01');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `firstname` varchar(40) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `address` varchar(225) DEFAULT NULL,
  `title` varchar(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `firstname`, `lastname`, `gender`, `age`, `email`, `phone`, `address`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Gideon', 'oluwaseun', NULL, 12, 'braid@gail.com', '73473742', 'wvwefwef', 'Mr', '2021-09-26 23:53:58', '2021-09-26 23:53:58'),
(2, 'thomas onyemechi', 'goodluck', NULL, 83, 'thomasonyemechi03@gmail.com', '08067544387', 'No 100 b odoikoyi street akure', 'Mr', '2021-09-27 00:03:26', '2021-09-27 00:03:26'),
(3, 'Gideon', 'goodluck', 'Male', 34, '', '', '', 'Dr', '2021-10-01 07:41:57', '2021-10-01 07:41:57'),
(2350, 'ayomide', 'Hadassah', 'Female', 45, 'braid@gail.com', '+2349038772366', 'Akure', 'Mr', '2021-10-01 10:46:15', '2021-10-01 10:46:15'),
(2351, 'Gideon', 'Hadassah', 'Male', 21, 'admin@mapets.com', '08067544387', '', 'Mr', '2021-10-01 11:10:39', '2021-10-01 11:10:39'),
(2352, 'nimi', 'braid', 'Female', 23, '', '', '', 'Mr', '2021-10-01 11:18:16', '2021-10-01 11:18:16'),
(2353, 'seyeola', 'braid', 'Female', 23, '', '', '', 'Miss', '2021-10-01 13:35:53', '2021-10-01 13:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `firstname`, `lastname`, `phone`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 'mapets', 'admin', NULL, 'admin@mapet.com', '$2y$10$YhSQoH2kOZLYswqrg6CKZOEbtSHLQI.c/FThDBk/E6zEYGNFERc3q', NULL, '2021-10-01 04:38:31'),
(2, 1, 'mapets', 'user', NULL, 'user@mapet.com', '$2y$10$YhSQoH2kOZLYswqrg6CKZOEbtSHLQI.c/FThDBk/E6zEYGNFERc3q', NULL, '2021-10-01 04:38:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2354;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
