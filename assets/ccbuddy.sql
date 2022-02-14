-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 14, 2022 at 10:00 AM
-- Server version: 5.5.68-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccbuddy`
--

-- --------------------------------------------------------

--
-- Table structure for table `de_stem`
--

CREATE TABLE `de_stem` (
  `de_stem_id` int(11) NOT NULL,
  `harvest_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `de_stem`
--

INSERT INTO `de_stem` (`de_stem_id`, `harvest_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `harvest`
--

CREATE TABLE `harvest` (
  `harvest_id` int(11) NOT NULL,
  `harvest_num` int(11) NOT NULL,
  `room_num` int(11) NOT NULL,
  `plant_date` date NOT NULL,
  `harvest_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harvest`
--

INSERT INTO `harvest` (`harvest_id`, `harvest_num`, `room_num`, `plant_date`, `harvest_date`) VALUES
(1, 43, 4, '2021-08-08', '2021-12-15'),
(2, 45, 8, '2021-08-08', '2021-12-15'),
(3, 47, 9, '2021-08-08', '2021-12-15'),
(4, 46, 10, '2021-08-08', '2021-12-15'),
(5, 48, 1, '2021-08-08', '2021-12-15'),
(6, 44, 7, '2021-08-08', '2021-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `license`
--

CREATE TABLE `license` (
  `id` int(11) NOT NULL,
  `strain_id` int(11) DEFAULT NULL,
  `license` varchar(1000) DEFAULT NULL,
  `license_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `license`
--

INSERT INTO `license` (`id`, `strain_id`, `license`, `license_type`) VALUES
(1, 1, '000141', 'AU-C');

-- --------------------------------------------------------

--
-- Table structure for table `measurement_types`
--

CREATE TABLE `measurement_types` (
  `id` int(11) NOT NULL,
  `measurement_type` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `measurement_types`
--

INSERT INTO `measurement_types` (`id`, `measurement_type`) VALUES
(1, 'gram'),
(2, 'kilogram');

-- --------------------------------------------------------

--
-- Table structure for table `strain`
--

CREATE TABLE `strain` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `strain`
--

INSERT INTO `strain` (`id`, `name`) VALUES
(1, 'Sopapilla Cheesecake');

-- --------------------------------------------------------

--
-- Table structure for table `weight`
--

CREATE TABLE `weight` (
  `weight_id` int(11) NOT NULL,
  `strain_id` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `measurement_type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `weight`
--

INSERT INTO `weight` (`weight_id`, `strain_id`, `weight`, `measurement_type_id`) VALUES
(1, 1, 4000, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `de_stem`
--
ALTER TABLE `de_stem`
  ADD PRIMARY KEY (`de_stem_id`);

--
-- Indexes for table `harvest`
--
ALTER TABLE `harvest`
  ADD PRIMARY KEY (`harvest_id`);

--
-- Indexes for table `license`
--
ALTER TABLE `license`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `measurement_types`
--
ALTER TABLE `measurement_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strain`
--
ALTER TABLE `strain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weight`
--
ALTER TABLE `weight`
  ADD PRIMARY KEY (`weight_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `de_stem`
--
ALTER TABLE `de_stem`
  MODIFY `de_stem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `harvest`
--
ALTER TABLE `harvest`
  MODIFY `harvest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `license`
--
ALTER TABLE `license`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `measurement_types`
--
ALTER TABLE `measurement_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `strain`
--
ALTER TABLE `strain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `weight`
--
ALTER TABLE `weight`
  MODIFY `weight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
