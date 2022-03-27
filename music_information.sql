-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 24, 2022 at 09:11 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Music_Player_DB`
--

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

--
-- Dumping data for table `music_information`
--

INSERT INTO `music_information` (`id`, `song_name`, `artist_name`, `album_name`, `genre`, `release_year`, `link`) VALUES
(1, 'Heating Up', 'Polo G', '', 'Hip-Hop', '2022', '../music_link/Polo_G_Heating_up.mp3'),
(2, 'Baby', 'Justin Bieber', 'My World 2.0', 'Pop', '2010', '../music_link/Justin_Bieber_Baby_ft_Ludacris.mp3'),
(3, 'Somebody To Love', 'Justin Bieber', 'My World 2.0', 'Pop', '2010', '../music_link/Somebody_To_Love.mp3'),
(4, 'Peaches (feat. Daniel Caesar & Giveon)', 'Justin Bieber, Daniel Caesar, Giveon', 'Justice', 'R&B', '2021', '../music_link/Justin_Bieber_Peaches_ft_Daniel_Caesar_Giveon.mp3'),
(5, 'STAY', 'The Kid LAROI', '', 'Pop', '2021', '../music_link/The_Kid_LAROI_Justin_Bieber_STAY.mp3'),
(6, 'God\'s Plan', 'Drake', 'Scorpion', 'Hip-Hop', '2018', '../music_link/Gods_Plan.mp3'),
(7, 'No Role Modelz', 'J. Cole', '2014 Forest Hills Drive', 'Hip-Hop', '2014', '../music_link/No_Role_Modelz.mp3'),
(8, 'Statement', 'G Herbo', '', 'Hip-Hop', '2020', '../music_link/G_Herbo_Statement.mp3'),
(9, 'Empty', 'Juice WRLD', 'Death Race For Love', 'Hip-Hop', '2019', '../music_link/Juice_WRLD_Empty.mp3'),
(10, 'For Tonight', 'Giveon', '', 'R&B', '2021', '../music_link/Giveon_For_Tonight.mp3'),
(11, 'Home', 'SEVENTEEN', '', 'K-Pop', '2019', '../music_link/SEVENTEEN_Home.mp3'),
(12, 'Controlla', 'Drake', 'Views', 'R&B', '2016', '../music_link/Drake_Controlla.mp3'),
(13, 'Wants and Needs (feat. Lil Baby)', 'Drake, Lil Baby', '', 'Hip-Hop', '2021', '../music_link/Wants_and_Needs.mp3'),
(14, 'Fine China', 'Future, Juice WRLD', 'Future & juice WRLD Present... WRLD ON DRUGS', 'Hip-Hop', '2018', '../music_link/Future_Juice WRLD_Fine_China.mp3'),
(15, 'Cigarettes', 'Juice WRLD', 'Fighting Demons', 'Rock', '2021', '../music_link/Juice_WRLD_Cigarettes.mp3'),
(16, 'Never Recover (Lil Baby & Gunna, Drake)', 'Lil Baby, Gunna, Drake', 'Drip Harder', 'Hip-Hop', '2018', '../music_link/LilBaby_Gunna_Drake_Never_Recover.mp3'),
(17, 'Mask Off', 'Future', 'Future', 'Hip-Hop', '2017', '../music_link/Future_Mask_Off.mp3'),
(18, 'bloody valentine', 'Machine Gun Kelly', 'Tickets To My DownFall', 'Rock', '2020', '../music_link/Machine_Gun_Kelly_Bloody_Valentine.mp3'),
(19, 'parents', 'YUNGBLUD', 'weird!', 'Rock', '2020', '../music_link/yungblud_parents.mp3'),
(20, 'Look What God Gave Her', 'Thomas Rhett', 'Center Point Road', 'Country', '2019', '../music_link/Thomas_Rhett_Look_What_God_Gave_Her.mp3'),
(21, 'Old Town Road', 'Lil Nas X', '', 'Country', '2017', '../music_link/Lil_Nas_X_Old_Town_Road_ft_Billy_Ray_Cyrus.mp3'),
(22, 'Loud', 'R5', 'Louder', 'Rock', '2013', '../music_link/R5_Loud.mp3'),
(23, 'Forget About You', 'R5', 'Louder', 'Rock', '2013', '../music_link/R5_Forget_About_You.mp3'),
(24, 'Company', 'Justin Bieber', 'Purpose', 'Pop', '2015', '../music_link/Justin_Bieber_Company.mp3');

INSERT INTO `music_information` (`id`, `song_name`, `artist_name`, `album_name`, `genre`, `release_year`, `link`) VALUES
(26, 'Lovesick Girls', 'Blackpink', 'The Album', 'K-POP', '2020', '../music_link/Blackpink_Lovesick_Girls.mp3'),
(27, 'Ddu-Du Ddu-Du', 'Blackpink', 'Square Up - EP', 'K-POP', '2018', '../music_link/Blackpink_Ddu_Du_Ddu_Du.mp3'),
(28, 'As If It\'s Your Last', 'Blackpink', 'As If It\'s Your Last - Single', 'K-POP', '2017', '../music_link/Blackpink_As_If_Its_Your_Last.mp3'),
(29, 'Beautiful Pain', 'BTOB', 'Hour Moment - EP', 'K-POP', '2018', '../music_link/BTOB_Beautiful_Pain.mp3'),
(30, 'Insane', 'BTOB', 'Born TO Beat', 'K-POP', '2012', '../music_link/BTOB_Insane.mp3'),
(31, 'Missing You', 'BTOB', 'Brother Act.', 'K-POP', '2017', '../music_link/BTOB_Missing_You.mp3'),
(32, 'Movie', 'BTOB', 'Feel\'eM - EP', 'K-POP', '2017', '../music_link/BTOB_Movie.mp3'),
(33, 'Only One For Me', 'BTOB', 'This Is Us', 'K-POP', '2018', '../music_link/BTOB_Only_One_For_Me.mp3'),
(34, 'Pray', 'BTOB', 'New Men', 'K-POP', '2016', '../music_link/BTOB_Pray.mp3'),
(35, 'Boy With Luv (feat. Halsey)', 'BTS', 'Map Of The Soul: 7', 'K-POP', '2020', '../music_link/BTS_Boy_With_Luv.mp3'),
(36, 'Dynamite', 'BTS', 'BE', 'K-POP', '2020', '../music_link/BTS_Dynamite.mp3'),
(37, 'Euphoria', 'BTS', 'Love Yourself \'Answer\'', 'K-POP', '2018', '../music_link/BTS_Euphoria.mp3'),
(38, 'Fake Love', 'BTS', 'Love Yourself \'Answer\'', 'K-POP', '2018', '../music_link/BTS_Fake_Love.mp3'),
(39, 'Permission To Dance', 'BTS', 'Butter/Permission to Dance - EP', 'K-POP', '2021', '../music_link/BTS_Permission_To_Dance.mp3'),
(40, 'Butter', 'BTS', 'Butter/Permission to Dance - EP', 'K-POP', '2021', 'music_link/BTS_Butter.mp3'),
(41, 'Run', 'BTS', 'The Most Beautiful Moment In Life, Pt.2', 'K-POP', '2016', '../music_link/BTS_Run.mp3'),
(42, 'Save Me', 'BTS', 'The Most Beautiful Moment In Life: Young Forever', 'K-POP', '2016', '../music_link/BTS_Save_Me.mp3'),
(43, 'Crooked', 'G-Dragon', 'COUP D\'ETAT, Pt.2', 'K-POP', '2013', '../music_link/Gdragon_Crooked.mp3'),
(44, 'Untitled, 2014', 'G-Dragon', 'Kwon Ji Yong - EP', 'K-POP', '2017', '../music_link/Gdragon_Untitled_2014.mp3'),
(45, 'Mago', 'GFriend', 'Walpurgis Night', 'K-POP', '2020', '../music_link/Gfriend Mago.mp3'),
(46, 'Time for the Moon Night', 'GFriend', 'GFriend the 6th Mini Album \'Time for the Moon Night\'', 'K-POP', '2018', '../music_link/Gfriend_Time_For_The_Moon_Night.mp3'),
(47, 'Blueming', 'IU', 'Love Poem - EP', 'K-POP', '2019', '../music_link/IU_Blueming.mp3'),
(48, 'Celebrity', 'IU', 'Celebrity - Single', 'K-POP', '2021', '../music_link/IU_Celebrity.mp3'),
(49, 'eight (feat. SUGA)', 'IU', 'eight (feat. SUGA) - Single', 'K-POP', '2020', '../music_link/IU_Eight.mp3'),
(50, 'Lilac', 'IU', 'IU 5th Album \'LILAC\'', 'K-POP', '2021', '../music_link/IU_Lilac.mp3'),
(51, 'AYA', 'Mamamoo', 'Travel - EP', 'K-POP', '2020', '../music_link/Mamamoo_Aya.mp3'),
(52, 'Dingga', 'Mamamoo', 'Dingga - Single', 'K-POP', '2020', '../music_link/Mamamoo_Dingga.mp3'),
(53, 'Hip', 'Mamamoo', 'reality in BLACK', 'K-POP', '2019', '../music_link/Mamamoo_Hip.mp3'),
(54, 'Face', 'NU\'EST', 'NU\'EST The First Album \"Re:BIRTH\"', 'K-POP', '2012', '../music_link/Nuest_Face.mp3'),
(55, 'Nonstop', 'Oh My Girl', 'NONSTOP - EP', 'K-POP', '2020', '../music_link/Oh_My_Girl_Nonstop.mp3'),
(56, 'Secret Garden', 'Oh My Girl', 'Secret Garden - EP', 'K-POP', '2018', '../music_link/Oh_My_Girl_Secret_Garden.mp3'),
(57, '5th Season (SSFWL)', 'Oh My Girl', 'THE FIFTH SEASON', 'K-POP', '2019', '../music_link/Oh_My_Girl_The_5th_Season.mp3'),
(58, 'Bad Boy', 'Red Velvet', 'The Perfect Red Velvet - The 2nd Album Repackage - EP', 'K-POP', '2018', '../music_link/Red_Velvet_Bad_Boy.mp3'),
(59, 'Power Up', 'Red Velvet', 'Summer Magic - Summer Mini Album', 'K-POP', '2018', '../music_link/Red_Velvet_Power_Up.mp3'),
(60, 'Psycho', 'Red Velvet', '\'The ReVe Festival\' Finale - EP', 'K-POP', '2019', '../music_link/Red_Velvet_Psycho.mp3'),
(61, 'Red Flavor', 'Red Velvet', 'The Red Summer - Summer Mini Album - EP', 'K-POP', '2017', '../music_link/Red_Velvet_Red_Flavor.mp3'),
(62, 'Umpah Umpah', 'Red Velvet', '\'The ReVe Festival\' Day 2 - EP', 'K-POP', '2019', '../music_link/Red_Velvet_Umpah_Umpah.mp3'),
(63, 'Darling', 'Taeyang', 'White Night', 'K-POP', '2017', '../music_link/Taeyang_Darling.mp3'),
(64, 'Wake Me Up', 'Taeyang', 'White Night', 'K-POP', '2017', '../music_link/Taeyang_Wake_Me_Up.mp3');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
