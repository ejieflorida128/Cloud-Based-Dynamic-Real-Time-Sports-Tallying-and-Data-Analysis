-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2024 at 08:51 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realtime_event`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gmail` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `net` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `profile`, `fullname`, `age`, `gmail`, `username`, `password`, `net`, `status`, `date`) VALUES
(5, 'profile/default.jpg', 'Ejie Cabales Florida', 0, '', 'ejie123', '123', 'online', 'approved', '2024-07-04 06:23:25'),
(8, 'profile/7937de3e0a4e513155ec1d943af0271e.webp', 'Athena Joy Barola Campania', 20, 'athenaloaybarola12@gmail.com', 'athena123', '123', 'online', 'approved', '2024-07-04 02:41:44'),
(10, 'profile/default.jpg', 'Syphone Tyson', 0, '', 'tyson123', '123', 'offline', 'pending', '2024-06-03 10:22:18'),
(22, 'profile/default.jpg', 'Ejie Cabales Florida', 0, '', 'ejie123', '123', '', 'pending', '2024-07-04 06:22:35');

-- --------------------------------------------------------

--
-- Table structure for table `basketball_match`
--

CREATE TABLE `basketball_match` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `game_type` varchar(255) NOT NULL,
  `team1` varchar(255) NOT NULL,
  `team2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `number_of_teams` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `number_of_teams`, `status`, `date`) VALUES
(6, 'Intramurals 2019', 0, 'completed', '2024-06-10 01:59:36'),
(7, 'Intramurals 2020', 0, 'completed', '2024-06-10 01:59:36'),
(8, 'Intramurals 2021', 0, 'completed', '2024-06-10 02:00:48'),
(9, 'Intramurals 2022', 0, 'completed', '2024-06-10 02:01:08'),
(10, 'Intramurals 2023', 0, 'completed', '2024-06-10 02:01:08'),
(16, 'Intramurals 2024', 4, 'on-going', '2024-06-16 02:57:29');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `teamOne` varchar(255) NOT NULL,
  `teamTwo` varchar(255) NOT NULL,
  `game_type` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `location` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `event_id`, `image`, `teamOne`, `teamTwo`, `game_type`, `date`, `location`, `status`) VALUES
(1, 0, 'stored_images/img1.jpg', 'Thunderbolts United', 'Solar Titans', 'Basketball', '2024-05-28 03:51:39', 'Maasin City', 'completed'),
(2, 0, 'stored_images/img2.jpg', 'Avalanche Raptors', 'Firestorm Warriors', 'Basketball', '2024-05-28 03:51:39', 'Sta Rosa City', 'on-going'),
(3, 0, 'stored_images/img3.jpg', 'Lightning Hawks', 'Blizzard Wolves', 'Badminton', '2024-05-28 03:51:39', 'Sta Monica City', 'completed'),
(4, 0, 'stored_images/img4.jpg', 'Inferno Dragons', 'Cyclone Lions', 'Vollayball', '2024-05-28 03:51:39', 'Zone 4 Sogod', 'completed'),
(5, 0, 'stored_images/img5.jpg', 'Phoenix Strikers', 'Avalanche Bears', 'Basketball', '2024-05-28 03:51:39', 'Bato Leyte', 'on-going'),
(6, 0, 'stored_images/img6.jpg', 'Thunderstorm Falcons', 'Blaze Panthers', 'Table Tennis', '2024-05-28 03:51:39', 'Abgao Maasin', 'on-going'),
(8, 0, 'stored_images/img5.jpg', 'Phoenix Strikers', 'Avalanche Bears', 'Basketball', '2024-05-28 03:51:39', 'Bato Leyte', 'on-going'),
(9, 0, 'stored_images/img6.jpg', 'Thunderstorm Falcons', 'Blaze Panthers', 'Table Tennis', '2024-05-28 03:51:39', 'Abgao Maasin', 'on-going');

-- --------------------------------------------------------

--
-- Table structure for table `percentage`
--

CREATE TABLE `percentage` (
  `id` int(11) NOT NULL,
  `percentageFrom` varchar(255) NOT NULL,
  `last_data` int(11) NOT NULL,
  `percent` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `percentage`
--

INSERT INTO `percentage` (`id`, `percentageFrom`, `last_data`, `percent`) VALUES
(1, 'pending_account', 3, 50),
(2, 'approved_account', 1, -50),
(3, 'total_events', 6, -14.29),
(4, 'total_matches', 8, 33.33);

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `name1` varchar(255) NOT NULL,
  `age1` int(11) NOT NULL,
  `player_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `game_id`, `event_id`, `team_id`, `name`, `age`, `name1`, `age1`, `player_number`) VALUES
(1, 24, 16, 9, 'Ejie Cabales Florida', 19, '', 0, 'player1'),
(2, 24, 16, 9, 'Athena Joy Campania', 21, '', 0, 'player2'),
(3, 24, 16, 9, 'Please add player name!', 0, '', 0, 'player3'),
(4, 24, 16, 9, 'Please add player name!', 0, '', 0, 'player4'),
(5, 24, 16, 9, 'Please add player name!', 0, '', 0, 'player5'),
(6, 24, 16, 9, 'Please add player name!', 0, '', 0, 'player6'),
(7, 24, 16, 9, 'Please add player name!', 0, '', 0, 'player7'),
(8, 24, 16, 9, 'Please add player name!', 0, '', 0, 'player8'),
(9, 24, 16, 9, 'Please add player name!', 0, '', 0, 'player9'),
(10, 24, 16, 9, 'Please add player name!', 0, '', 0, 'player10'),
(11, 24, 16, 9, 'Please add player name!', 0, '', 0, 'player11'),
(12, 24, 16, 9, 'Please add player name!', 0, '', 0, 'player12'),
(13, 24, 16, 9, 'Please add player name!', 0, '', 0, 'player13'),
(14, 24, 16, 9, 'Please add player name!', 0, '', 0, 'player14'),
(55, 25, 16, 13, 'Ejie Cabales Florida', 19, '', 0, 'player1'),
(56, 25, 16, 13, 'Athena Joy Campania', 21, '', 0, 'player2'),
(57, 25, 16, 13, 'Please add player name!', 0, '', 0, 'player3'),
(58, 25, 16, 13, 'Please add player name!', 0, '', 0, 'player4'),
(59, 25, 16, 13, 'Please add player name!', 0, '', 0, 'player5'),
(60, 25, 16, 13, 'Please add player name!', 0, '', 0, 'player6'),
(61, 25, 16, 13, 'Please add player name!', 0, '', 0, 'player7'),
(62, 25, 16, 13, 'Please add player name!', 0, '', 0, 'player8'),
(63, 25, 16, 13, 'Please add player name!', 0, '', 0, 'player9'),
(64, 25, 16, 13, 'Please add player name!', 0, '', 0, 'player10'),
(65, 26, 16, 17, 'Ejie Cabales Florida', 19, 'Athena Joy Barola Campania', 21, 'player1'),
(66, 27, 16, 21, 'Athena Joy Campania', 21, '', 0, 'player1'),
(67, 28, 16, 25, 'Ejie Cabales Florida', 19, '', 0, 'player1'),
(68, 29, 16, 29, 'Athena Joy Campania', 21, '', 0, 'player1'),
(69, 30, 16, 33, 'Ejie Cabales Florida', 19, '', 0, 'player1'),
(70, 31, 16, 37, 'Athena Joy Campania', 21, '', 0, 'player1'),
(71, 36, 16, 41, 'Athena Joy Campania', 21, 'Ejie Cabales Florida', 19, 'player1'),
(72, 36, 16, 41, 'Please add player1 name!', 0, 'Please add player2 name!', 0, 'player2');

-- --------------------------------------------------------

--
-- Table structure for table `registered_game`
--

CREATE TABLE `registered_game` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `game_type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `CreatedTeam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registered_game`
--

INSERT INTO `registered_game` (`id`, `event_id`, `game_type`, `status`, `img`, `CreatedTeam`) VALUES
(1, 16, 'Basketball_Men', 'need_information', 'stored_images/basketball.avif', 1),
(2, 16, 'Basketball_Women', 'need_information', 'stored_images/basketball.avif', 0),
(3, 16, 'Vollayball_Men', 'need_information', 'stored_images/volleyball.png', 0),
(4, 16, 'Vollayball_Women', 'need_information', 'stored_images/volleyball.png', 0),
(5, 16, 'Softball_Men', 'need_information', 'stored_images/softball.png', 0),
(6, 16, 'Softball_Women', 'need_information', 'stored_images/softball.png', 0),
(7, 16, 'Throws_Men', 'need_information', 'stored_images/throws.jpg', 0),
(8, 16, 'Throws_Women', 'need_information', 'stored_images/throws.jpg', 0),
(9, 16, 'Jumps_Men', 'need_information', 'stored_images/jumps.jpg', 0),
(10, 16, 'Jumps_Women', 'need_information', 'stored_images/jumps.jpg', 0),
(11, 16, 'MLBB', 'need_information', 'stored_images/mobile_legends.jpg', 0),
(12, 16, 'Badminton_Single_Men', 'need_information', 'stored_images/badminton.jpg', 0),
(13, 16, 'Badminton_Double_Men', 'need_information', 'stored_images/badminton.jpg', 0),
(14, 16, 'Badminton_Single_Women', 'need_information', 'stored_images/badminton.jpg', 0),
(15, 16, 'Badminton_Double_Women', 'need_information', 'stored_images/badminton.jpg', 0),
(16, 16, 'Table_tennis_Single_Men', 'need_information', 'stored_images/table_tennis.jpg', 0),
(17, 16, 'Table_tennis_Double_Men', 'need_information', 'stored_images/table_tennis.jpg', 0),
(18, 16, 'Table_tennis_Single_Women', 'need_information', 'stored_images/table_tennis.jpg', 0),
(19, 16, 'Table_tennis_Double_Women', 'need_information', 'stored_images/table_tennis.jpg', 0),
(20, 16, 'Futsal_Men', 'need_information', 'stored_images/futsal.jpg', 0),
(21, 16, 'Futsal_Women', 'need_information', 'stored_images/futsal.jpg', 0),
(22, 16, 'Chess', 'need_information', 'stored_images/chess.webp', 0),
(23, 16, 'Archery', 'need_information', 'stored_images/archery.png', 0),
(24, 16, 'Creative_Folk_Dance', 'need_information', 'stored_images/folkDance.png', 1),
(25, 16, 'Pop_Dance', 'need_information', 'stored_images/popDance.jpg', 1),
(26, 16, 'Vocal_Duet', 'need_information', 'stored_images/vocalDuet.webp', 1),
(27, 16, 'Pop_Solo', 'need_information', 'stored_images/popSolo.webp', 1),
(28, 16, 'Charcoal_Rendering', 'need_information', 'stored_images/charcoalRendering.jpg', 1),
(29, 16, 'Pencil_Drawing', 'need_information', 'stored_images/pencilDrawing.jpg', 1),
(30, 16, 'Painting', 'need_information', 'stored_images/painting.jpg', 1),
(31, 16, 'Poster_Making', 'need_information', 'stored_images/posterMaking.webp', 1),
(33, 16, 'Phone_Photography', 'need_information', 'stored_images/phonePhotography.jpg', 1),
(34, 16, 'Mr_and_Mrs_Panagtigi', 'need_information', 'stored_images/mrsAndmrs.jpg', 0),
(35, 16, 'Mass_Dance', 'need_information', 'stored_images/massDance.webp', 1),
(36, 16, 'Dance_Sports', 'need_information', 'stored_images/dance-sport.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `number_of_player` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `game_id`, `event_id`, `team_name`, `logo`, `status`, `number_of_player`) VALUES
(1, 1, 16, 'Team Name', '../logo/default.png', '', 0),
(2, 1, 16, 'Team Name', '../logo/default.png', '', 0),
(3, 1, 16, 'Team Name', '../logo/default.png', '', 0),
(4, 1, 16, 'Team Name', '../logo/default.png', '', 0),
(5, 35, 16, 'Team Name', '../logo/default.png', '', 0),
(6, 35, 16, 'Team Name', '../logo/default.png', '', 0),
(7, 35, 16, 'Team Name', '../logo/default.png', '', 0),
(8, 35, 16, 'Team Name', '../logo/default.png', '', 0),
(9, 24, 16, 'Winchester Wolves', '../logo/d71cb5616ba9f10a3861fdee10d0903d.jpg', 'detailed', 14),
(10, 24, 16, 'Team Name', '../logo/default.png', '', 0),
(11, 24, 16, 'Team Name', '../logo/default.png', '', 0),
(12, 24, 16, 'Team Name', '../logo/default.png', '', 0),
(13, 25, 16, 'Winchester Wolves', '../logo/75051c62111423912c02a45a376c7481.jpg', 'detailed', 10),
(14, 25, 16, 'Team Name', '../logo/default.png', '', 0),
(15, 25, 16, 'Team Name', '../logo/default.png', '', 0),
(16, 25, 16, 'Team Name', '../logo/default.png', '', 0),
(17, 26, 16, 'Winchester Wolves', '../logo/2d7d005452a964b60acc78bf36e8af66.jpg', 'detailed', 1),
(18, 26, 16, 'Team Name', '../logo/default.png', '', 0),
(19, 26, 16, 'Team Name', '../logo/default.png', '', 0),
(20, 26, 16, 'Team Name', '../logo/default.png', '', 0),
(21, 27, 16, 'Winchester Wolves', '../logo/a2c09806ed8ed151389396f2c457e8d1.jpg', 'detailed', 1),
(22, 27, 16, 'Team Name', '../logo/default.png', '', 0),
(23, 27, 16, 'Team Name', '../logo/default.png', '', 0),
(24, 27, 16, 'Team Name', '../logo/default.png', '', 0),
(25, 28, 16, 'Winchester Wolves', '../logo/6d51336390ef4f2b6f49493e51cfbdd2.jpg', 'detailed', 1),
(26, 28, 16, 'Team Name', '../logo/default.png', '', 0),
(27, 28, 16, 'Team Name', '../logo/default.png', '', 0),
(28, 28, 16, 'Team Name', '../logo/default.png', '', 0),
(29, 29, 16, 'Winchester Wolves', '../logo/d45d81acb7dc8d8fb8ec43a4d33d0f04.jpg', 'detailed', 1),
(30, 29, 16, 'Team Name', '../logo/default.png', '', 0),
(31, 29, 16, 'Team Name', '../logo/default.png', '', 0),
(32, 29, 16, 'Team Name', '../logo/default.png', '', 0),
(33, 30, 16, 'Winchester Wolves', '../logo/dde8e03c94b9dc922bd31afab461a976.jpg', 'detailed', 1),
(34, 30, 16, 'Team Name', '../logo/default.png', '', 0),
(35, 30, 16, 'Team Name', '../logo/default.png', '', 0),
(36, 30, 16, 'Team Name', '../logo/default.png', '', 0),
(37, 31, 16, 'Winchester Wolves', '../logo/70cd92d090c0f3620478c6382cbbde85.jpg', 'detailed', 1),
(38, 31, 16, 'Team Name', '../logo/default.png', '', 0),
(39, 31, 16, 'Team Name', '../logo/default.png', '', 0),
(40, 31, 16, 'Team Name', '../logo/default.png', '', 0),
(41, 36, 16, 'Winchester Wolves', '../logo/c0d5dbd5f03f1d062b06c5b77f4c9941.jpg', 'detailed', 2),
(42, 36, 16, 'Team Name', '../logo/default.png', '', 0),
(43, 36, 16, 'Team Name', '../logo/default.png', '', 0),
(44, 36, 16, 'Team Name', '../logo/default.png', '', 0),
(45, 33, 16, 'Team Name', '../logo/default.png', '', 0),
(46, 33, 16, 'Team Name', '../logo/default.png', '', 0),
(47, 33, 16, 'Team Name', '../logo/default.png', '', 0),
(48, 33, 16, 'Team Name', '../logo/default.png', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basketball_match`
--
ALTER TABLE `basketball_match`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `percentage`
--
ALTER TABLE `percentage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registered_game`
--
ALTER TABLE `registered_game`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `basketball_match`
--
ALTER TABLE `basketball_match`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `percentage`
--
ALTER TABLE `percentage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `registered_game`
--
ALTER TABLE `registered_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
