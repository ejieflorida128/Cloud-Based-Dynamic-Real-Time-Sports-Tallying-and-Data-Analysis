-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2024 at 05:58 AM
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
(1, 'demo 1', 5, 'on-going', '2024-07-17 03:42:25'),
(2, 'demo 2', 3, 'on-going', '2024-07-17 03:47:40'),
(3, 'demo 3', 4, 'on-going', '2024-07-17 03:51:35');

-- --------------------------------------------------------

--
-- Table structure for table `game_matches`
--

CREATE TABLE `game_matches` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `game_type` varchar(255) NOT NULL,
  `match_info` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `round` int(11) NOT NULL,
  `team1` int(11) NOT NULL,
  `team1_name` varchar(255) NOT NULL,
  `team_one_score` int(11) NOT NULL,
  `team2` int(11) NOT NULL,
  `team2_name` varchar(255) NOT NULL,
  `team_two_score` int(11) NOT NULL,
  `winner_id` int(11) NOT NULL,
  `loser_id` int(11) NOT NULL,
  `generate_round` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game_matches`
--

INSERT INTO `game_matches` (`id`, `game_id`, `event_id`, `game_type`, `match_info`, `status`, `round`, `team1`, `team1_name`, `team_one_score`, `team2`, `team2_name`, `team_two_score`, `winner_id`, `loser_id`, `generate_round`) VALUES
(1, 1, 1, 'Vollayball_Men', '1', 'SCORE', 1, 3, 'team 3', 45, 4, 'team 4', 87, 4, 3, 0),
(2, 1, 1, 'Vollayball_Men', '2', 'SCORE', 2, 1, 'team 1', 54, 2, 'team 2', 65, 2, 1, 0),
(3, 1, 1, 'Vollayball_Men', '3', 'SCORE', 2, 5, 'team 5', 45, 4, 'team 4', 67, 4, 5, 0),
(4, 1, 1, 'Vollayball_Men', '4', 'SCORE', 3, 3, 'team 3', 45, 1, 'team 1', 65, 1, 3, 0),
(5, 1, 1, 'Vollayball_Men', '5', 'SCORE', 3, 5, 'team 5', 45, 1, 'team 1', 76, 1, 5, 0),
(6, 1, 1, 'Vollayball_Men', '6', 'SCORE', 4, 4, 'team 4', 45, 2, 'team 2', 76, 2, 4, 0),
(7, 1, 1, 'Vollayball_Men', '7', 'SCORE', 5, 1, 'team 1', 45, 4, 'team 4', 76, 4, 1, 0),
(8, 1, 1, 'Vollayball_Men', '8', 'SCORE', 6, 2, 'team 2', 34, 4, 'team 4', 54, 4, 2, 0),
(9, 1, 1, 'Vollayball_Men', '9', 'SCORE', 7, 2, 'team 2', 56, 4, 'team 4', 45, 2, 4, 0),
(13, 2, 2, 'Vollayball_Men', '1', 'SCORE', 1, 6, 'team 1', 45, 7, 'team 2', 67, 7, 6, 0),
(14, 2, 2, 'Vollayball_Men', '2', 'SCORE', 2, 8, 'team 3', 34, 7, 'team 2', 65, 7, 8, 0),
(15, 2, 2, 'Vollayball_Men', '3', 'SCORE', 3, 6, 'team 1', 43, 8, 'team 3', 45, 8, 6, 0),
(16, 2, 2, 'Vollayball_Men', '4', 'SCORE', 4, 7, 'team 2', 34, 8, 'team 3', 33, 7, 8, 0),
(19, 3, 3, 'Vollayball_Men', '1', 'SCORE', 1, 9, 'team 1', 45, 10, 'team 2', 65, 10, 9, 0),
(20, 3, 3, 'Vollayball_Men', '2', 'SCORE', 1, 11, 'team 3', 45, 12, 'team 4', 65, 12, 11, 0),
(21, 3, 3, 'Vollayball_Men', '3', 'SCORE', 2, 10, 'team 2', 34, 12, 'team 4', 54, 12, 10, 0),
(22, 3, 3, 'Vollayball_Men', '4', 'SCORE', 3, 9, 'team 1', 45, 11, 'team 3', 65, 11, 9, 0),
(23, 3, 3, 'Vollayball_Men', '5', 'SCORE', 3, 10, 'team 2', 45, 11, 'team 3', 76, 11, 10, 0),
(24, 3, 3, 'Vollayball_Men', '6', 'SCORE', 4, 11, 'team 3', 43, 12, 'team 4', 33, 11, 12, 0),
(25, 3, 3, 'Vollayball_Men', '7', 'SCORE', 5, 11, 'team 3', 45, 12, 'team 4', 56, 12, 11, 0);

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
(3, 'total_events', 1, -83.33),
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
(1, 1, 1, 1, '', 0, '', 0, 'player1'),
(2, 1, 1, 1, '', 0, '', 0, 'player2'),
(3, 1, 1, 1, '', 0, '', 0, 'player3'),
(4, 1, 1, 1, '', 0, '', 0, 'player4'),
(5, 1, 1, 1, '', 0, '', 0, 'player5'),
(6, 1, 1, 1, '', 0, '', 0, 'player6'),
(7, 1, 1, 1, '', 0, '', 0, 'player7'),
(8, 1, 1, 1, '', 0, '', 0, 'player8'),
(9, 1, 1, 2, '', 0, '', 0, 'player1'),
(10, 1, 1, 2, '', 0, '', 0, 'player2'),
(11, 1, 1, 2, '', 0, '', 0, 'player3'),
(12, 1, 1, 2, '', 0, '', 0, 'player4'),
(13, 1, 1, 2, '', 0, '', 0, 'player5'),
(14, 1, 1, 2, '', 0, '', 0, 'player6'),
(15, 1, 1, 2, '', 0, '', 0, 'player7'),
(16, 1, 1, 2, '', 0, '', 0, 'player8'),
(17, 1, 1, 3, '', 0, '', 0, 'player1'),
(18, 1, 1, 3, '', 0, '', 0, 'player2'),
(19, 1, 1, 3, '', 0, '', 0, 'player3'),
(20, 1, 1, 3, '', 0, '', 0, 'player4'),
(21, 1, 1, 3, '', 0, '', 0, 'player5'),
(22, 1, 1, 3, '', 0, '', 0, 'player6'),
(23, 1, 1, 3, '', 0, '', 0, 'player7'),
(24, 1, 1, 3, '', 0, '', 0, 'player8'),
(25, 1, 1, 4, '', 0, '', 0, 'player1'),
(26, 1, 1, 4, '', 0, '', 0, 'player2'),
(27, 1, 1, 4, '', 0, '', 0, 'player3'),
(28, 1, 1, 4, '', 0, '', 0, 'player4'),
(29, 1, 1, 4, '', 0, '', 0, 'player5'),
(30, 1, 1, 4, '', 0, '', 0, 'player6'),
(31, 1, 1, 4, '', 0, '', 0, 'player7'),
(32, 1, 1, 4, '', 0, '', 0, 'player8'),
(33, 1, 1, 5, '', 0, '', 0, 'player1'),
(34, 1, 1, 5, '', 0, '', 0, 'player2'),
(35, 1, 1, 5, '', 0, '', 0, 'player3'),
(36, 1, 1, 5, '', 0, '', 0, 'player4'),
(37, 1, 1, 5, '', 0, '', 0, 'player5'),
(38, 1, 1, 5, '', 0, '', 0, 'player6'),
(39, 1, 1, 5, '', 0, '', 0, 'player7'),
(40, 1, 1, 5, '', 0, '', 0, 'player8'),
(41, 2, 2, 6, '', 0, '', 0, 'player1'),
(42, 2, 2, 6, '', 0, '', 0, 'player2'),
(43, 2, 2, 6, '', 0, '', 0, 'player3'),
(44, 2, 2, 6, '', 0, '', 0, 'player4'),
(45, 2, 2, 6, '', 0, '', 0, 'player5'),
(46, 2, 2, 6, '', 0, '', 0, 'player6'),
(47, 2, 2, 6, '', 0, '', 0, 'player7'),
(48, 2, 2, 6, '', 0, '', 0, 'player8'),
(49, 2, 2, 7, '', 0, '', 0, 'player1'),
(50, 2, 2, 7, '', 0, '', 0, 'player2'),
(51, 2, 2, 7, '', 0, '', 0, 'player3'),
(52, 2, 2, 7, '', 0, '', 0, 'player4'),
(53, 2, 2, 7, '', 0, '', 0, 'player5'),
(54, 2, 2, 7, '', 0, '', 0, 'player6'),
(55, 2, 2, 7, '', 0, '', 0, 'player7'),
(56, 2, 2, 7, '', 0, '', 0, 'player8'),
(57, 2, 2, 8, '', 0, '', 0, 'player1'),
(58, 2, 2, 8, '', 0, '', 0, 'player2'),
(59, 2, 2, 8, '', 0, '', 0, 'player3'),
(60, 2, 2, 8, '', 0, '', 0, 'player4'),
(61, 2, 2, 8, '', 0, '', 0, 'player5'),
(62, 2, 2, 8, '', 0, '', 0, 'player6'),
(63, 2, 2, 8, '', 0, '', 0, 'player7'),
(64, 2, 2, 8, '', 0, '', 0, 'player8'),
(65, 3, 3, 9, '', 0, '', 0, 'player1'),
(66, 3, 3, 9, '', 0, '', 0, 'player2'),
(67, 3, 3, 9, '', 0, '', 0, 'player3'),
(68, 3, 3, 9, '', 0, '', 0, 'player4'),
(69, 3, 3, 9, '', 0, '', 0, 'player5'),
(70, 3, 3, 9, '', 0, '', 0, 'player6'),
(71, 3, 3, 9, '', 0, '', 0, 'player7'),
(72, 3, 3, 9, '', 0, '', 0, 'player8'),
(73, 3, 3, 10, '', 0, '', 0, 'player1'),
(74, 3, 3, 10, '', 0, '', 0, 'player2'),
(75, 3, 3, 10, '', 0, '', 0, 'player3'),
(76, 3, 3, 10, '', 0, '', 0, 'player4'),
(77, 3, 3, 10, '', 0, '', 0, 'player5'),
(78, 3, 3, 10, '', 0, '', 0, 'player6'),
(79, 3, 3, 10, '', 0, '', 0, 'player7'),
(80, 3, 3, 10, '', 0, '', 0, 'player8'),
(81, 3, 3, 11, '', 0, '', 0, 'player1'),
(82, 3, 3, 11, '', 0, '', 0, 'player2'),
(83, 3, 3, 11, '', 0, '', 0, 'player3'),
(84, 3, 3, 11, '', 0, '', 0, 'player4'),
(85, 3, 3, 11, '', 0, '', 0, 'player5'),
(86, 3, 3, 11, '', 0, '', 0, 'player6'),
(87, 3, 3, 11, '', 0, '', 0, 'player7'),
(88, 3, 3, 11, '', 0, '', 0, 'player8'),
(89, 3, 3, 12, '', 0, '', 0, 'player1'),
(90, 3, 3, 12, '', 0, '', 0, 'player2'),
(91, 3, 3, 12, '', 0, '', 0, 'player3'),
(92, 3, 3, 12, '', 0, '', 0, 'player4'),
(93, 3, 3, 12, '', 0, '', 0, 'player5'),
(94, 3, 3, 12, '', 0, '', 0, 'player6'),
(95, 3, 3, 12, '', 0, '', 0, 'player7'),
(96, 3, 3, 12, '', 0, '', 0, 'player8');

-- --------------------------------------------------------

--
-- Table structure for table `registered_game`
--

CREATE TABLE `registered_game` (
  `event_id` int(11) NOT NULL,
  `game_type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `CreatedTeam` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registered_game`
--

INSERT INTO `registered_game` (`event_id`, `game_type`, `status`, `img`, `CreatedTeam`, `id`) VALUES
(1, 'Vollayball_Men', 'submitted', 'stored_images/volleyball.png', 1, 1),
(2, 'Vollayball_Men', 'submitted', 'stored_images/volleyball.png', 1, 2),
(3, 'Vollayball_Men', 'submitted', 'stored_images/volleyball.png', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `team_number` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `ifBye` varchar(255) NOT NULL,
  `number_of_player` int(11) NOT NULL,
  `bracket` varchar(255) NOT NULL,
  `bracket_status` int(11) NOT NULL,
  `last_match_status` varchar(255) NOT NULL,
  `lose_number` int(11) NOT NULL,
  `winner_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `game_id`, `event_id`, `team_name`, `team_number`, `logo`, `status`, `ifBye`, `number_of_player`, `bracket`, `bracket_status`, `last_match_status`, `lose_number`, `winner_number`) VALUES
(1, 1, 1, 'team 1', 1, '../logo/default.png', 'detailed', '', 8, 'L', 1, 'Loser', 2, 2),
(2, 1, 1, 'team 2', 2, '../logo/default.png', 'detailed', '', 8, 'W', 1, 'Winner', 1, 3),
(3, 1, 1, 'team 3', 3, '../logo/default.png', 'detailed', '', 8, 'L', 1, 'Loser', 2, 0),
(4, 1, 1, 'team 4', 4, '../logo/default.png', 'detailed', '', 8, 'W', 1, 'Loser', 2, 4),
(5, 1, 1, 'team 5', 5, '../logo/default.png', 'detailed', '', 8, 'L', 1, 'Loser', 2, 0),
(6, 2, 2, 'team 1', 1, '../logo/default.png', 'detailed', '', 8, 'L', 1, 'Loser', 2, 0),
(7, 2, 2, 'team 2', 2, '../logo/default.png', 'detailed', '', 8, 'W', 1, 'Winner', 0, 3),
(8, 2, 2, 'team 3', 3, '../logo/default.png', 'detailed', '', 8, 'L', 1, 'Loser', 2, 1),
(9, 3, 3, 'team 1', 1, '../logo/default.png', 'detailed', '', 8, 'L', 1, 'Loser', 2, 0),
(10, 3, 3, 'team 2', 2, '../logo/default.png', 'detailed', '', 8, 'W', 1, 'Loser', 2, 1),
(11, 3, 3, 'team 3', 3, '../logo/default.png', 'detailed', '', 8, 'L', 1, 'Loser', 2, 3),
(12, 3, 3, 'team 4', 4, '../logo/default.png', 'detailed', '', 8, 'W', 1, 'Winner', 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_matches`
--
ALTER TABLE `game_matches`
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
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `game_matches`
--
ALTER TABLE `game_matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `registered_game`
--
ALTER TABLE `registered_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
