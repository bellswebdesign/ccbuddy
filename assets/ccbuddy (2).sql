-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 21, 2022 at 07:13 AM
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
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(9, 'Destem'),
(8, 'Packaging'),
(7, 'Cultivation'),
(6, 'Trim'),
(5, 'Harvest'),
(10, 'De-Leaf'),
(11, 'Irrigation'),
(12, 'De-Fan');

-- --------------------------------------------------------

--
-- Table structure for table `de_stem`
--

CREATE TABLE `de_stem` (
  `de_stem_id` int(11) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `harvest_num` int(11) DEFAULT NULL,
  `room_num` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `de_stem`
--

INSERT INTO `de_stem` (`de_stem_id`, `dep_id`, `harvest_num`, `room_num`) VALUES
(23, 9, 3, 5),
(22, 9, 3, 7),
(21, 9, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `harvest`
--

CREATE TABLE `harvest` (
  `harvest_id` int(11) NOT NULL,
  `harvest_num` int(11) NOT NULL,
  `room_num` int(11) NOT NULL,
  `plant_date` date NOT NULL,
  `harvest_date` date NOT NULL,
  `actual_harvest_date` date NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harvest`
--

INSERT INTO `harvest` (`harvest_id`, `harvest_num`, `room_num`, `plant_date`, `harvest_date`, `actual_harvest_date`, `active`) VALUES
(23, 3, 4, '2022-03-31', '2022-05-20', '0000-00-00', 1),
(22, 2, 3, '2022-02-27', '2022-03-26', '0000-00-00', 1),
(21, 1, 1, '2022-03-01', '2022-04-09', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `harvest_room`
--

CREATE TABLE `harvest_room` (
  `harvest_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harvest_room`
--

INSERT INTO `harvest_room` (`harvest_id`, `room_id`) VALUES
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `license`
--

CREATE TABLE `license` (
  `id` int(11) NOT NULL,
  `license` varchar(1000) DEFAULT NULL,
  `license_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `license`
--

INSERT INTO `license` (`id`, `license`, `license_type`) VALUES
(4, '001252', 'AU-C-Y'),
(5, '432432', 'AU-C-Y'),
(6, '00022', 'GR-F-R'),
(7, '00345', 'GR-F-R'),
(8, '00987', 'AU-C-Y'),
(9, '000912', 'AU-CE-Y'),
(10, '00567', 'AU-CE-Y'),
(11, '000981', 'GR-F-R');

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
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `dep_id`, `name`, `status`) VALUES
(1, 9, 'Alan', 'Cleaner'),
(2, 9, 'Alan 2', 'Cleaner'),
(3, 9, 'Alan 3', 'Cleaner'),
(4, 7, 'Alan 4', 'Cleaner');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(15) NOT NULL,
  `room_num` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `room_num`) VALUES
(1, 1),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11);

-- --------------------------------------------------------

--
-- Table structure for table `strain`
--

CREATE TABLE `strain` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `short_name` varchar(20) NOT NULL,
  `license_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `strain`
--

INSERT INTO `strain` (`id`, `name`, `short_name`, `license_id`) VALUES
(6, 'God Of War', 'GOW', 4),
(7, 'God Of War2', 'GOWW', 4),
(8, 'LA Kush Cake', 'LAKC', 9),
(9, 'New Yorker', 'NYR', 5),
(10, 'Alaskan God', 'AK', 7);

-- --------------------------------------------------------

--
-- Table structure for table `weight`
--

CREATE TABLE `weight` (
  `weight_id` int(11) NOT NULL,
  `de_stem_id` int(11) DEFAULT NULL,
  `strain_id` int(11) DEFAULT NULL,
  `license_id` int(11) NOT NULL,
  `weight` int(11) DEFAULT NULL,
  `measurement_type_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `weight`
--

INSERT INTO `weight` (`weight_id`, `de_stem_id`, `strain_id`, `license_id`, `weight`, `measurement_type_id`, `date`) VALUES
(22, 21, 6, 4, 1253, NULL, '2022-03-10'),
(23, 21, 7, 4, 4215, NULL, '2022-03-10'),
(24, 21, 6, 5, 4654, NULL, '2022-03-11'),
(25, 22, 8, 8, 451, NULL, '2022-03-12'),
(26, 23, 7, 7, 6865, NULL, '2022-03-15'),
(27, 23, 8, 8, 55646, NULL, '2022-03-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
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
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `de_stem`
--
ALTER TABLE `de_stem`
  MODIFY `de_stem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `harvest`
--
ALTER TABLE `harvest`
  MODIFY `harvest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `license`
--
ALTER TABLE `license`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `measurement_types`
--
ALTER TABLE `measurement_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `strain`
--
ALTER TABLE `strain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `weight`
--
ALTER TABLE `weight`
  MODIFY `weight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
