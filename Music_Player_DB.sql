-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2022 at 05:29 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music_player_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ahmadlouis35@gmail.com`
--

CREATE TABLE `ahmadlouis35@gmail.com` (
  `id` int(11) NOT NULL,
  `playlist_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ahmadlouis35@gmail.com`
--

INSERT INTO `ahmadlouis35@gmail.com` (`id`, `playlist_name`) VALUES
(1, 'random'),
(2, 'bump'),
(3, 'yuuurrrrr'),
(4, 'cant live without'),
(5, 'to die for'),
(6, 'Its MEE');

-- --------------------------------------------------------

--
-- Table structure for table `music_information`
--

CREATE TABLE `music_information` (
  `id` int(11) NOT NULL,
  `song_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `artist_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `album_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `genre` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `release_year` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(1024) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `id` int(11) NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `mm_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `nick_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `born_city` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `verification_code` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `verification_status` int(11) NOT NULL DEFAULT 0,
  `pass_reset_token` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `playlist_status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Mainly for Creating Account & Login';

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`id`, `email`, `password`, `mm_name`, `nick_name`, `born_city`, `date`, `verification_code`, `verification_status`, `pass_reset_token`, `playlist_status`) VALUES
(31, 'ahmadlouis35@gmail.com', '$2y$10$xMCTU.s5fs7p4wQH0/hprOSDSC8Bb4gYRJOfNdn1k3w1aijQuoEFG', 'something', 'something', 'somewhere', '2022-03-21 01:12:14', '02910e13bf5a0178dc7af28a6f111db8', 1, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ahmadlouis35@gmail.com`
--
ALTER TABLE `ahmadlouis35@gmail.com`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `music_information`
--
ALTER TABLE `music_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ahmadlouis35@gmail.com`
--
ALTER TABLE `ahmadlouis35@gmail.com`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `music_information`
--
ALTER TABLE `music_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_information`
--
ALTER TABLE `user_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
