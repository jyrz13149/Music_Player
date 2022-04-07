-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 07, 2022 at 12:56 PM
-- Server version: 5.7.23-23
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brandsg3_music_player_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `music_information`
--

CREATE TABLE `music_information` (
  `id` int(11) NOT NULL,
  `song_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `artist_name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `album_name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `genre` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `release_year` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(1024) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `music_information`
--

INSERT INTO `music_information` (`id`, `song_name`, `artist_name`, `album_name`, `genre`, `release_year`, `link`) VALUES
(1, 'A Lazy Farmer Boy', 'Buster Carter And Preston Young', NULL, 'New York', '1931', '../music_link/A_Lazy_Farmer_Boy.mp3'),
(2, 'April Kisses', 'Eddie Lang', NULL, 'Waltz', NULL, '../music_link/April_Kisses.mp3'),
(3, 'Charles Giteau', 'Kelly Harrell', NULL, 'Parallel Anthology', '1927', '../music_link/Charles_Giteau.mp3'),
(4, 'Eddie\'s Twister', 'Eddie Lang', NULL, 'Instrumental', NULL, '../music_link/Eddies_Twister.mp3'),
(5, 'In The Dark-Flashes', 'Jess Stacy', NULL, 'Instrumental', '1935', '../music_link/In_The_Dark_Flashes.mp3'),
(6, 'Introduction and Tarantelle', 'Mischa Violin (Violin) Josef Adler', NULL, 'Classical', '1921', '../music_link/Intro_And_Tarantelle.mp3'),
(7, 'My Name Is John Johanna', 'Kelly Harrell And The Virginia String Band', NULL, 'Parallel Anthology', '1927', '../music_link/My_Name_Is_John_Johanna.mp3'),
(8, 'Pinetop\'s Boogie Woogie', 'Pine Top Smith', NULL, 'Vocal', '1928', '../music_link/Pinetops_Boogie_Woogie.mp3'),
(9, 'Ragtime Annie', 'Charlie Poole and The North Carolina Ramblers Group', NULL, 'Instrumental', '1926', '../music_link/Ragtime_Annie.mp3'),
(10, 'Waiting For A Train', 'Jimmy Rodgers', NULL, 'Country', '1928', '../music_link/Waiting_For_A_Train.mp3'),
(11, 'The Edge', 'NIVIRO', NULL, 'Pop', '2022', '../music_link/The_Edge.mp3'),
(12, 'Royalty (ft. Neoni)', 'Egzod & Maestro', NULL, 'Pop', '2021', '../music_link/Royalty.mp3'),
(13, 'Arrow', 'Jim Yosef', NULL, 'Electronic', '2015', '../music_link/Arrow.mp3'),
(14, 'Cetus', 'Lensko', NULL, 'Electronic', '2014', '../music_link/Cetus.mp3'),
(15, 'Mesmerize', 'Tobu', NULL, 'Electronic', '2014', '../music_link/Mesmerize.mp3'),
(16, 'Life', 'Tobu', NULL, 'Electronic', '2014', '../music_link/Life.mp3'),
(17, 'Imagine', 'Jim Yosef', NULL, 'Electronic', '2018', '../music_link/Imagine.mp3'),
(18, 'Cake', 'RetroVision', NULL, 'Pop', '2018', '../music_link/Cake.mp3'),
(19, 'I Just Wanna', 'NIVIRO', NULL, 'Hip-Hop', '2018', '../music_link/I_Just_Wanna.mp3'),
(20, 'Hurts Like This', 'EMDI', NULL, 'Hip-Hop', '2019', '../music_link/Hurts_Like_This.mp3'),
(21, 'On & On (feat. Daniel Levi)', 'Cartoon', NULL, 'Pop', '2015', '../music_link/On_On.mp3'),
(22, 'Heroes Tonight (feat. Johnning)', 'Janji', NULL, 'Pop', '2015', '../music_link/Heroes.mp3'),
(23, 'Invincible', 'DEAF KEV', NULL, 'Electronic', '2015', '../music_link/Invincible.mp3'),
(24, 'My Heart', 'Different Heaven & EH!DE', NULL, 'Pop', '2013', '../music_link/My_Heart.mp3'),
(25, 'Blank', 'Disfigure', NULL, 'Electronic', '2013', '../music_link/Blank.mp3'),
(26, 'Your Stories', 'Cartoon', 'The Story', 'EDM', '2021', '../music_link/Cartoon_YourStories.mp3'),
(27, 'Hellcat', 'Desmeon', 'Demon Man', 'EDM', '2021', '../music_link/Desmeon_Hellcat.mp3'),
(28, 'Undone', 'Desmeon', 'Demon Man', 'EDM', '2021', '../music_link/Desmeon_Undone.mp3'),
(29, 'Little Bit', 'Futuristik', 'Big Data', 'EDM', '2013', '../music_link/Futuristik_LittleBit.mp3'),
(30, 'A World Away', 'Inukshuk', 'Fantasy', 'EDM', '2015', '../music_link/Inukshuk_AWorldAway.mp3'),
(31, 'Cant Wait', 'Jim Yosef', 'Anticipation', 'EDM', '2017', '../music_link/JimYosef_CantWait.mp3'),
(32, 'Tell Me', 'Killercats', 'Kings', 'EDM', '2017', '../music_link/Killercats_TellMe.mp3'),
(33, 'Lost', 'Kontinuum', 'Kaution', 'EDM', '2019', '../music_link/Kontinuum_Lost.mp3'),
(34, 'Red Hands', 'Kontinuum', 'Kaution', 'EDM', '2019', '../music_link/Mendum_RedHands.mp3'),
(35, 'Along The Road', 'NCT x T and Sugah', 'Journey', 'EDM', '2021', '../music_link/NCTxTandSugah_AlongTheRoad.mp3'),
(36, 'MIKO', 'Phantom Sage', 'Ghost Story', 'EDM', '2019', '../music_link/PhantomSage_MIKO.mp3'),
(37, 'Cut The Check', 'Spitfya x Desembra', 'Sad Times', 'EDM', '2020', '../music_link/SpitfyaXDesembra_CutTheCheck.mp3'),
(38, 'Away', 'Spitfya x Desembra', 'Sad Times', 'EDM', '2020', '../music_link/Subtact_Away.mp3'),
(39, 'To Myself', 'Uplink', 'Journals of Life', 'EDM', '2021', '../music_link/Uplink_ToMyself.mp3'),
(40, 'Eternal Minds', 'Uplink', 'Journals of Life', 'EDM', '2021', '../music_link/Waysons_EternalMinds.mp3'),
(41, 'Me You', 'Aden', NULL, 'Pop', '2022', '../music_link/Aden_Me_You.mp3'),
(42, 'Happy', 'Aden', NULL, 'Pop', '2010', '../music_link/Aden_Happy.mp3'),
(43, 'Night', 'Aden', NULL, 'Pop', '2010', '../music_link/Aden_Night.mp3'),
(44, 'Back Home', 'Ghostrifter', NULL, 'Hip-Pop', '2021', '../music_link/Ghostrifter_Back_Home.mp3'),
(45, 'Can You Feel The Love', 'Luke Bergs', NULL, 'Pop', '2018', '../music_link/Luke_Bergs_Can_You_Feel_The_Love.mp3'),
(46, 'The way', 'LiQWYD', NULL, 'Hip-Hop', '2014', '../music_link/LiQWYD_The_way.mp3'),
(47, 'Golden State of Mind', 'Luke Bergs', NULL, 'Pop', '2020', '../music_link/Luke_Bergs_Golden_State_of_Mind.mp3'),
(48, 'I\'ll Be Your Sunshine', 'Luke Bergs', NULL, 'Pop', '2019', '../music_link/Luke_Bergs_Ill_Be_Your_Sunshine.mp3'),
(49, 'Evans Soul Searching', 'Luke Bergs ft.Jenna', NULL, 'Pop', '2021', '../music_link/Luke_Bergs_Soul_Searching.mp3'),
(50, 'Wanted', 'Purrple Cat', NULL, 'Hip-Pop', '2019', '../music_link/Purrple_Cat_Wanted.mp3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `music_information`
--
ALTER TABLE `music_information`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `music_information`
--
ALTER TABLE `music_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
