-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2024 at 06:51 AM
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
(1, 'demo1', 11, 'on-going', '2024-07-07 04:24:45'),
(2, 'demo2', 7, 'on-going', '2024-07-07 04:25:44'),
(3, 'demo3', 4, 'on-going', '2024-07-07 04:26:43'),
(4, 'demo4', 3, 'on-going', '2024-07-07 04:27:31');

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
  `team1` int(11) NOT NULL,
  `team1_name` varchar(255) NOT NULL,
  `team_one_score` int(11) NOT NULL,
  `team2` int(11) NOT NULL,
  `team2_name` varchar(255) NOT NULL,
  `team_two_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game_matches`
--

INSERT INTO `game_matches` (`id`, `game_id`, `event_id`, `game_type`, `match_info`, `status`, `team1`, `team1_name`, `team_one_score`, `team2`, `team2_name`, `team_two_score`) VALUES
(1, 1, 1, 'Basketball_Men', 'match1', 'Round 1', 11, 'Team Name', 0, 4, 'Team Name', 0),
(2, 1, 1, 'Basketball_Men', 'match2', 'Round 1', 9, 'Team Name', 0, 10, 'Team Name', 0),
(3, 1, 1, 'Basketball_Men', 'match3', 'Round 1', 8, 'Team Name', 0, 7, 'Team Name', 0),
(4, 1, 1, 'Basketball_Men', 'match4', '', 0, '', 0, 0, '', 0),
(5, 1, 1, 'Basketball_Men', 'match5', '', 0, '', 0, 0, '', 0),
(6, 1, 1, 'Basketball_Men', 'match6', '', 0, '', 0, 0, '', 0),
(7, 1, 1, 'Basketball_Men', 'match7', '', 0, '', 0, 0, '', 0),
(8, 1, 1, 'Basketball_Men', 'match8', '', 0, '', 0, 0, '', 0),
(9, 1, 1, 'Basketball_Men', 'match9', '', 0, '', 0, 0, '', 0),
(10, 1, 1, 'Basketball_Men', 'match10', '', 0, '', 0, 0, '', 0),
(11, 1, 1, 'Basketball_Men', 'match11', '', 0, '', 0, 0, '', 0),
(12, 1, 1, 'Basketball_Men', 'match12', '', 0, '', 0, 0, '', 0),
(13, 1, 1, 'Basketball_Men', 'match13', '', 0, '', 0, 0, '', 0),
(14, 1, 1, 'Basketball_Men', 'match14', '', 0, '', 0, 0, '', 0),
(15, 1, 1, 'Basketball_Men', 'match15', '', 0, '', 0, 0, '', 0),
(16, 1, 1, 'Basketball_Men', 'match16', '', 0, '', 0, 0, '', 0),
(17, 1, 1, 'Basketball_Men', 'match17', '', 0, '', 0, 0, '', 0),
(18, 1, 1, 'Basketball_Men', 'match18', '', 0, '', 0, 0, '', 0),
(19, 1, 1, 'Basketball_Men', 'match19', '', 0, '', 0, 0, '', 0),
(20, 1, 1, 'Basketball_Men', 'match20', '', 0, '', 0, 0, '', 0),
(21, 1, 1, 'Basketball_Men', 'match21', '', 0, '', 0, 0, '', 0),
(22, 1, 1, 'Basketball_Men', 'BYE', '', 6, 'Team Name', 0, 0, '', 0),
(23, 1, 1, 'Basketball_Men', 'BYE', '', 2, 'Team Name', 0, 0, '', 0),
(24, 1, 1, 'Basketball_Men', 'BYE', '', 1, 'Team Name', 0, 0, '', 0),
(25, 1, 1, 'Basketball_Men', 'BYE', '', 3, 'Team Name', 0, 0, '', 0),
(26, 1, 1, 'Basketball_Men', 'BYE', '', 5, 'Team Name', 0, 0, '', 0),
(27, 2, 2, 'Basketball_Men', 'match1', 'Round 1', 15, 'Team Name', 0, 16, 'Team Name', 0),
(28, 2, 2, 'Basketball_Men', 'match2', 'Round 1', 17, 'Team Name', 0, 12, 'Team Name', 0),
(29, 2, 2, 'Basketball_Men', 'match3', 'Round 1', 13, 'Team Name', 0, 18, 'Team Name', 0),
(30, 2, 2, 'Basketball_Men', 'match4', '', 0, '', 0, 0, '', 0),
(31, 2, 2, 'Basketball_Men', 'match5', '', 0, '', 0, 0, '', 0),
(32, 2, 2, 'Basketball_Men', 'match6', '', 0, '', 0, 0, '', 0),
(33, 2, 2, 'Basketball_Men', 'match7', '', 0, '', 0, 0, '', 0),
(34, 2, 2, 'Basketball_Men', 'match8', '', 0, '', 0, 0, '', 0),
(35, 2, 2, 'Basketball_Men', 'match9', '', 0, '', 0, 0, '', 0),
(36, 2, 2, 'Basketball_Men', 'match10', '', 0, '', 0, 0, '', 0),
(37, 2, 2, 'Basketball_Men', 'match11', '', 0, '', 0, 0, '', 0),
(38, 2, 2, 'Basketball_Men', 'match12', '', 0, '', 0, 0, '', 0),
(39, 2, 2, 'Basketball_Men', 'match13', '', 0, '', 0, 0, '', 0),
(40, 2, 2, 'Basketball_Men', 'BYE', '', 14, 'Team Name', 0, 0, '', 0),
(41, 3, 3, 'Basketball_Men', 'match1', 'Round 1', 22, 'Team Name', 0, 20, 'Team Name', 0),
(42, 3, 3, 'Basketball_Men', 'match2', 'Round 1', 21, 'Team Name', 0, 19, 'Team Name', 0),
(43, 3, 3, 'Basketball_Men', 'match3', '', 0, '', 0, 0, '', 0),
(44, 3, 3, 'Basketball_Men', 'match4', '', 0, '', 0, 0, '', 0),
(45, 3, 3, 'Basketball_Men', 'match5', '', 0, '', 0, 0, '', 0),
(46, 3, 3, 'Basketball_Men', 'match6', '', 0, '', 0, 0, '', 0),
(47, 3, 3, 'Basketball_Men', 'match7', '', 0, '', 0, 0, '', 0),
(48, 4, 4, 'Basketball_Men', 'match1', 'Round 1', 24, 'Team Name', 0, 25, 'Team Name', 0),
(49, 4, 4, 'Basketball_Men', 'match2', '', 0, '', 0, 0, '', 0),
(50, 4, 4, 'Basketball_Men', 'match3', '', 0, '', 0, 0, '', 0),
(51, 4, 4, 'Basketball_Men', 'match4', '', 0, '', 0, 0, '', 0),
(52, 4, 4, 'Basketball_Men', 'match5', '', 0, '', 0, 0, '', 0),
(53, 4, 4, 'Basketball_Men', 'BYE', '', 23, 'Team Name', 0, 0, '', 0),
(54, 5, 4, 'Basketball_Men', 'match1', 'Round 1', 26, 'Team Name', 0, 28, 'Team Name', 0),
(55, 5, 4, 'Basketball_Men', 'match2', '', 0, '', 0, 0, '', 0),
(56, 5, 4, 'Basketball_Men', 'match3', '', 0, '', 0, 0, '', 0),
(57, 5, 4, 'Basketball_Men', 'match4', '', 0, '', 0, 0, '', 0),
(58, 5, 4, 'Basketball_Men', 'match5', '', 0, '', 0, 0, '', 0),
(59, 5, 4, 'Basketball_Men', 'BYE', '', 27, 'Team Name', 0, 0, '', 0),
(60, 6, 1, 'Basketball_Women', 'match1', 'Round 1', 36, 'Team Name', 0, 30, 'Team Name', 0),
(61, 6, 1, 'Basketball_Women', 'match2', 'Round 1', 33, 'Team Name', 0, 38, 'Team Name', 0),
(62, 6, 1, 'Basketball_Women', 'match3', 'Round 1', 31, 'Team Name', 0, 32, 'Team Name', 0),
(63, 6, 1, 'Basketball_Women', 'match4', '', 0, '', 0, 0, '', 0),
(64, 6, 1, 'Basketball_Women', 'match5', '', 0, '', 0, 0, '', 0),
(65, 6, 1, 'Basketball_Women', 'match6', '', 0, '', 0, 0, '', 0),
(66, 6, 1, 'Basketball_Women', 'match7', '', 0, '', 0, 0, '', 0),
(67, 6, 1, 'Basketball_Women', 'match8', '', 0, '', 0, 0, '', 0),
(68, 6, 1, 'Basketball_Women', 'match9', '', 0, '', 0, 0, '', 0),
(69, 6, 1, 'Basketball_Women', 'match10', '', 0, '', 0, 0, '', 0),
(70, 6, 1, 'Basketball_Women', 'match11', '', 0, '', 0, 0, '', 0),
(71, 6, 1, 'Basketball_Women', 'match12', '', 0, '', 0, 0, '', 0),
(72, 6, 1, 'Basketball_Women', 'match13', '', 0, '', 0, 0, '', 0),
(73, 6, 1, 'Basketball_Women', 'match14', '', 0, '', 0, 0, '', 0),
(74, 6, 1, 'Basketball_Women', 'match15', '', 0, '', 0, 0, '', 0),
(75, 6, 1, 'Basketball_Women', 'match16', '', 0, '', 0, 0, '', 0),
(76, 6, 1, 'Basketball_Women', 'match17', '', 0, '', 0, 0, '', 0),
(77, 6, 1, 'Basketball_Women', 'match18', '', 0, '', 0, 0, '', 0),
(78, 6, 1, 'Basketball_Women', 'match19', '', 0, '', 0, 0, '', 0),
(79, 6, 1, 'Basketball_Women', 'match20', '', 0, '', 0, 0, '', 0),
(80, 6, 1, 'Basketball_Women', 'match21', '', 0, '', 0, 0, '', 0),
(81, 6, 1, 'Basketball_Women', 'BYE', '', 34, 'Team Name', 0, 0, '', 0),
(82, 6, 1, 'Basketball_Women', 'BYE', '', 39, 'Team Name', 0, 0, '', 0),
(83, 6, 1, 'Basketball_Women', 'BYE', '', 35, 'Team Name', 0, 0, '', 0),
(84, 6, 1, 'Basketball_Women', 'BYE', '', 37, 'Team Name', 0, 0, '', 0),
(85, 6, 1, 'Basketball_Women', 'BYE', '', 29, 'Team Name', 0, 0, '', 0),
(86, 7, 1, 'Vollayball_Women', 'match1', 'Round 1', 50, 'Team Name', 0, 46, 'Team Name', 0),
(87, 7, 1, 'Vollayball_Women', 'match2', 'Round 1', 42, 'Team Name', 0, 43, 'Team Name', 0),
(88, 7, 1, 'Vollayball_Women', 'match3', 'Round 1', 45, 'Team Name', 0, 41, 'Team Name', 0),
(89, 7, 1, 'Vollayball_Women', 'match4', '', 0, '', 0, 0, '', 0),
(90, 7, 1, 'Vollayball_Women', 'match5', '', 0, '', 0, 0, '', 0),
(91, 7, 1, 'Vollayball_Women', 'match6', '', 0, '', 0, 0, '', 0),
(92, 7, 1, 'Vollayball_Women', 'match7', '', 0, '', 0, 0, '', 0),
(93, 7, 1, 'Vollayball_Women', 'match8', '', 0, '', 0, 0, '', 0),
(94, 7, 1, 'Vollayball_Women', 'match9', '', 0, '', 0, 0, '', 0),
(95, 7, 1, 'Vollayball_Women', 'match10', '', 0, '', 0, 0, '', 0),
(96, 7, 1, 'Vollayball_Women', 'match11', '', 0, '', 0, 0, '', 0),
(97, 7, 1, 'Vollayball_Women', 'match12', '', 0, '', 0, 0, '', 0),
(98, 7, 1, 'Vollayball_Women', 'match13', '', 0, '', 0, 0, '', 0),
(99, 7, 1, 'Vollayball_Women', 'match14', '', 0, '', 0, 0, '', 0),
(100, 7, 1, 'Vollayball_Women', 'match15', '', 0, '', 0, 0, '', 0),
(101, 7, 1, 'Vollayball_Women', 'match16', '', 0, '', 0, 0, '', 0),
(102, 7, 1, 'Vollayball_Women', 'match17', '', 0, '', 0, 0, '', 0),
(103, 7, 1, 'Vollayball_Women', 'match18', '', 0, '', 0, 0, '', 0),
(104, 7, 1, 'Vollayball_Women', 'match19', '', 0, '', 0, 0, '', 0),
(105, 7, 1, 'Vollayball_Women', 'match20', '', 0, '', 0, 0, '', 0),
(106, 7, 1, 'Vollayball_Women', 'match21', '', 0, '', 0, 0, '', 0),
(107, 7, 1, 'Vollayball_Women', 'BYE', '', 49, 'Team Name', 0, 0, '', 0),
(108, 7, 1, 'Vollayball_Women', 'BYE', '', 47, 'Team Name', 0, 0, '', 0),
(109, 7, 1, 'Vollayball_Women', 'BYE', '', 44, 'Team Name', 0, 0, '', 0),
(110, 7, 1, 'Vollayball_Women', 'BYE', '', 40, 'Team Name', 0, 0, '', 0),
(111, 7, 1, 'Vollayball_Women', 'BYE', '', 48, 'Team Name', 0, 0, '', 0);

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
(3, 'total_events', 7, -12.5),
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
(1, 1, 'Basketball_Men', 'submitted', 'stored_images/basketball.avif', 1),
(2, 2, 'Basketball_Men', 'submitted', 'stored_images/basketball.avif', 1),
(3, 3, 'Basketball_Men', 'submitted', 'stored_images/basketball.avif', 1),
(4, 4, 'Basketball_Men', 'submitted', 'stored_images/basketball.avif', 1),
(5, 4, 'Basketball_Men', 'submitted', 'stored_images/basketball.avif', 1),
(6, 1, 'Basketball_Women', 'submitted', 'stored_images/basketball.avif', 1),
(7, 1, 'Vollayball_Women', 'submitted', 'stored_images/volleyball.png', 1);

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
  `number_of_player` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `game_id`, `event_id`, `team_name`, `team_number`, `logo`, `status`, `ifBye`, `number_of_player`) VALUES
(1, 1, 1, 'Team Name', 1, '../logo/default.png', '', '', 0),
(2, 1, 1, 'Team Name', 2, '../logo/default.png', '', '', 0),
(3, 1, 1, 'Team Name', 3, '../logo/default.png', '', '', 0),
(4, 1, 1, 'Team Name', 4, '../logo/default.png', '', '', 0),
(5, 1, 1, 'Team Name', 5, '../logo/default.png', '', '', 0),
(6, 1, 1, 'Team Name', 6, '../logo/default.png', '', '', 0),
(7, 1, 1, 'Team Name', 7, '../logo/default.png', '', '', 0),
(8, 1, 1, 'Team Name', 8, '../logo/default.png', '', '', 0),
(9, 1, 1, 'Team Name', 9, '../logo/default.png', '', '', 0),
(10, 1, 1, 'Team Name', 10, '../logo/default.png', '', '', 0),
(11, 1, 1, 'Team Name', 11, '../logo/default.png', '', '', 0),
(12, 2, 2, 'Team Name', 1, '../logo/default.png', '', '', 0),
(13, 2, 2, 'Team Name', 2, '../logo/default.png', '', '', 0),
(14, 2, 2, 'Team Name', 3, '../logo/default.png', '', '', 0),
(15, 2, 2, 'Team Name', 4, '../logo/default.png', '', '', 0),
(16, 2, 2, 'Team Name', 5, '../logo/default.png', '', '', 0),
(17, 2, 2, 'Team Name', 6, '../logo/default.png', '', '', 0),
(18, 2, 2, 'Team Name', 7, '../logo/default.png', '', '', 0),
(19, 3, 3, 'Team Name', 1, '../logo/default.png', '', '', 0),
(20, 3, 3, 'Team Name', 2, '../logo/default.png', '', '', 0),
(21, 3, 3, 'Team Name', 3, '../logo/default.png', '', '', 0),
(22, 3, 3, 'Team Name', 4, '../logo/default.png', '', '', 0),
(23, 4, 4, 'Team Name', 1, '../logo/default.png', '', '', 0),
(24, 4, 4, 'Team Name', 2, '../logo/default.png', '', '', 0),
(25, 4, 4, 'Team Name', 3, '../logo/default.png', '', '', 0),
(26, 5, 4, 'Team Name', 1, '../logo/default.png', '', '', 0),
(27, 5, 4, 'Team Name', 2, '../logo/default.png', '', '', 0),
(28, 5, 4, 'Team Name', 3, '../logo/default.png', '', '', 0),
(29, 6, 1, 'Team Name', 1, '../logo/default.png', '', '', 0),
(30, 6, 1, 'Team Name', 2, '../logo/default.png', '', '', 0),
(31, 6, 1, 'Team Name', 3, '../logo/default.png', '', '', 0),
(32, 6, 1, 'Team Name', 4, '../logo/default.png', '', '', 0),
(33, 6, 1, 'Team Name', 5, '../logo/default.png', '', '', 0),
(34, 6, 1, 'Team Name', 6, '../logo/default.png', '', '', 0),
(35, 6, 1, 'Team Name', 7, '../logo/default.png', '', '', 0),
(36, 6, 1, 'Team Name', 8, '../logo/default.png', '', '', 0),
(37, 6, 1, 'Team Name', 9, '../logo/default.png', '', '', 0),
(38, 6, 1, 'Team Name', 10, '../logo/default.png', '', '', 0),
(39, 6, 1, 'Team Name', 11, '../logo/default.png', '', '', 0),
(40, 7, 1, 'Team Name', 1, '../logo/default.png', '', '', 0),
(41, 7, 1, 'Team Name', 2, '../logo/default.png', '', '', 0),
(42, 7, 1, 'Team Name', 3, '../logo/default.png', '', '', 0),
(43, 7, 1, 'Team Name', 4, '../logo/default.png', '', '', 0),
(44, 7, 1, 'Team Name', 5, '../logo/default.png', '', '', 0),
(45, 7, 1, 'Team Name', 6, '../logo/default.png', '', '', 0),
(46, 7, 1, 'Team Name', 7, '../logo/default.png', '', '', 0),
(47, 7, 1, 'Team Name', 8, '../logo/default.png', '', '', 0),
(48, 7, 1, 'Team Name', 9, '../logo/default.png', '', '', 0),
(49, 7, 1, 'Team Name', 10, '../logo/default.png', '', '', 0),
(50, 7, 1, 'Team Name', 11, '../logo/default.png', '', '', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `game_matches`
--
ALTER TABLE `game_matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registered_game`
--
ALTER TABLE `registered_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
