-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2019 at 01:50 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

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
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `achievement_id` int(10) NOT NULL,
  `title` text NOT NULL,
  `images` text NOT NULL,
  `details` text NOT NULL,
  `video_links` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `appoinments`
--

CREATE TABLE `appoinments` (
  `appointment_id` int(10) NOT NULL,
  `appoinment_for_name` text NOT NULL,
  `reference_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `purpose` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(10) NOT NULL,
  `post_id` text NOT NULL,
  `user_id` text NOT NULL,
  `comments` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `password` varchar(250) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `photo` text NOT NULL,
  `details` text NOT NULL,
  `role` tinyint(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_users`
--

INSERT INTO `ht_users` (`id`, `username`, `password`, `full_name`, `photo`, `details`, `role`, `created_at`, `updated_at`) VALUES
(1, 'masum', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', 1, '2019-08-07 10:14:55', '2019-08-07 10:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) NOT NULL,
  `title` text NOT NULL,
  `image` text NOT NULL,
  `details` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `refferers`
--

CREATE TABLE `refferers` (
  `refferer_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `photo` text NOT NULL,
  `details` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `reply_id` int(10) NOT NULL,
  `comment_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `reply_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surnames` varchar(80) NOT NULL,
  `birthdate` date NOT NULL,
  `drivingdoc` varchar(20) NOT NULL,
  `acdate` date NOT NULL,
  `countrydoc` varchar(20) NOT NULL,
  `province` varchar(20) NOT NULL,
  `locality` varchar(35) NOT NULL,
  `address` varchar(150) NOT NULL,
  `number` varchar(20) NOT NULL,
  `flat` varchar(20) NOT NULL,
  `door` varchar(20) NOT NULL,
  `description` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(10) NOT NULL,
  `video_link` text NOT NULL,
  `video_preview_image` text NOT NULL,
  `user_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`achievement_id`);

--
-- Indexes for table `appoinments`
--
ALTER TABLE `appoinments`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refferers`
--
ALTER TABLE `refferers`
  ADD PRIMARY KEY (`refferer_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `achievement_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appoinments`
--
ALTER TABLE `appoinments`
  MODIFY `appointment_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT;

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

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refferers`
--
ALTER TABLE `refferers`
  MODIFY `refferer_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `reply_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
