-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 06, 2019 at 10:49 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `profile`
--

-- --------------------------------------------------------

--
-- Table structure for table `ht_data`
--

CREATE TABLE `ht_data` (
  `id` int(11) NOT NULL,
  `client_id` int(100) NOT NULL,
  `test_id` int(11) NOT NULL,
  `data` text CHARACTER SET latin1 NOT NULL,
  `sensor_type` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ht_data`
--

INSERT INTO `ht_data` (`id`, `client_id`, `test_id`, `data`, `sensor_type`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 1, 1, 'dsf', 1, '2019-08-06 20:42:02', '0000-00-00 00:00:00', 1),
(3, 1, 1, 'dsf', 1, '2019-08-06 20:42:34', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ht_notes`
--

CREATE TABLE `ht_notes` (
  `id` int(100) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_notes`
--

INSERT INTO `ht_notes` (`id`, `title`, `description`, `created_at`, `user_id`) VALUES
(1, 'MY Blog site URL', 'www.androidtime.netdsdd', '2016-10-27 19:37:21', 0),
(2, 'Blog', 'Androidtime.net', '2016-10-27 19:37:21', 1),
(3, 'Incubus', 'nightmare', '2016-10-27 19:37:21', 1),
(4, 'Incubus', 'NIght', '2016-10-27 19:37:21', 1),
(5, 'Nightmare', 'dussopno', '2016-10-27 19:37:45', 1),
(6, 'Number', '123', '2016-10-27 21:16:27', 1),
(9, 'Download youtube video', 'keepvid.com', '2016-10-28 07:02:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ht_sensor_type`
--

CREATE TABLE `ht_sensor_type` (
  `id` int(11) NOT NULL,
  `sensor_type_id` int(10) NOT NULL,
  `sensor_name` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_sensor_type`
--

INSERT INTO `ht_sensor_type` (`id`, `sensor_type_id`, `sensor_name`, `created_at`) VALUES
(1, 1, 'erewrwe', '2019-08-06 20:32:20'),
(2, 2, 'blood', '2019-08-06 20:35:52');

-- --------------------------------------------------------

--
-- Table structure for table `ht_users`
--

CREATE TABLE `ht_users` (
  `id` int(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_users`
--

INSERT INTO `ht_users` (`id`, `username`, `password`) VALUES
(1, 'masum', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ht_data`
--
ALTER TABLE `ht_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_notes`
--
ALTER TABLE `ht_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_sensor_type`
--
ALTER TABLE `ht_sensor_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_users`
--
ALTER TABLE `ht_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ht_data`
--
ALTER TABLE `ht_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_notes`
--
ALTER TABLE `ht_notes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ht_sensor_type`
--
ALTER TABLE `ht_sensor_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ht_users`
--
ALTER TABLE `ht_users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
