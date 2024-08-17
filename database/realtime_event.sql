-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2024 at 10:19 AM
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
-- Table structure for table `dance_performance`
--

CREATE TABLE `dance_performance` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `dancer_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dance_performance`
--

INSERT INTO `dance_performance` (`id`, `game_id`, `event_id`, `team_id`, `name`, `age`, `dancer_number`) VALUES
(1, 6, 1, 16, '', 0, 'player1'),
(2, 6, 1, 16, '', 0, 'player2'),
(3, 6, 1, 16, '', 0, 'player3'),
(4, 6, 1, 16, '', 0, 'player4'),
(5, 6, 1, 16, '', 0, 'player5'),
(6, 6, 1, 17, '', 0, 'player1'),
(7, 6, 1, 17, '', 0, 'player2'),
(8, 6, 1, 17, '', 0, 'player3'),
(9, 6, 1, 17, '', 0, 'player4'),
(10, 6, 1, 17, '', 0, 'player5'),
(11, 6, 1, 18, '', 0, 'player1'),
(12, 6, 1, 18, '', 0, 'player2'),
(13, 6, 1, 18, '', 0, 'player3'),
(14, 6, 1, 18, '', 0, 'player4'),
(15, 6, 1, 18, '', 0, 'player5'),
(16, 8, 1, 22, '', 0, 'player1'),
(17, 8, 1, 22, '', 0, 'player2'),
(18, 8, 1, 22, '', 0, 'player3'),
(19, 8, 1, 22, '', 0, 'player4'),
(20, 8, 1, 22, '', 0, 'player5'),
(21, 8, 1, 23, '', 0, 'player1'),
(22, 8, 1, 23, '', 0, 'player2'),
(23, 8, 1, 23, '', 0, 'player3'),
(24, 8, 1, 23, '', 0, 'player4'),
(25, 8, 1, 23, '', 0, 'player5'),
(26, 8, 1, 24, '', 0, 'player1'),
(27, 8, 1, 24, '', 0, 'player2'),
(28, 8, 1, 24, '', 0, 'player3'),
(29, 8, 1, 24, '', 0, 'player4'),
(30, 8, 1, 24, '', 0, 'player5');

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
(1, 'Intramurals 2024', 4, 'on-going', '2024-08-17 06:31:58');

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
  `team1_1` int(11) NOT NULL,
  `team1_name1` varchar(255) NOT NULL,
  `team_one_score` int(11) NOT NULL,
  `team2` int(11) NOT NULL,
  `team2_name` varchar(255) NOT NULL,
  `team2_2` int(11) NOT NULL,
  `team2_name2` varchar(255) NOT NULL,
  `team_two_score` int(11) NOT NULL,
  `winner_id` int(11) NOT NULL,
  `loser_id` int(11) NOT NULL,
  `generate_round` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game_matches`
--

INSERT INTO `game_matches` (`id`, `game_id`, `event_id`, `game_type`, `match_info`, `status`, `round`, `team1`, `team1_name`, `team1_1`, `team1_name1`, `team_one_score`, `team2`, `team2_name`, `team2_2`, `team2_name2`, `team_two_score`, `winner_id`, `loser_id`, `generate_round`) VALUES
(1, 1, 1, 'Badminton_Single_Men', '1', 'game', 1, 8, '', 0, '', 0, 4, '', 0, '', 0, 0, 0, 0),
(2, 1, 1, 'Badminton_Single_Men', '2', 'game', 1, 11, '', 0, '', 0, 12, '', 0, '', 0, 0, 0, 0),
(3, 1, 1, 'Badminton_Single_Men', '3', 'game', 1, 10, '', 0, '', 0, 9, '', 0, '', 0, 0, 0, 0),
(4, 1, 1, 'Badminton_Single_Men', '4', 'game', 1, 7, '', 0, '', 0, 2, '', 0, '', 0, 0, 0, 0),
(5, 1, 1, 'Badminton_Single_Men', '5', '', 0, 0, '', 0, '', 0, 0, '', 0, '', 0, 0, 0, 0),
(6, 1, 1, 'Badminton_Single_Men', '6', '', 0, 0, '', 0, '', 0, 0, '', 0, '', 0, 0, 0, 0),
(7, 1, 1, 'Badminton_Single_Men', '7', '', 0, 0, '', 0, '', 0, 0, '', 0, '', 0, 0, 0, 0),
(8, 1, 1, 'Badminton_Single_Men', '8', '', 0, 0, '', 0, '', 0, 0, '', 0, '', 0, 0, 0, 0),
(9, 1, 1, 'Badminton_Single_Men', '9', '', 0, 0, '', 0, '', 0, 0, '', 0, '', 0, 0, 0, 0),
(10, 1, 1, 'Badminton_Single_Men', '10', '', 0, 0, '', 0, '', 0, 0, '', 0, '', 0, 0, 0, 0),
(11, 1, 1, 'Badminton_Single_Men', '11', '', 0, 0, '', 0, '', 0, 0, '', 0, '', 0, 0, 0, 0),
(12, 1, 1, 'Badminton_Single_Men', 'BYE', '', 0, 1, '', 0, '', 0, 0, '', 0, '', 0, 0, 0, 0),
(13, 1, 1, 'Badminton_Single_Men', 'BYE', '', 0, 3, '', 0, '', 0, 0, '', 0, '', 0, 0, 0, 0),
(14, 1, 1, 'Badminton_Single_Men', 'BYE', '', 0, 5, '', 0, '', 0, 0, '', 0, '', 0, 0, 0, 0),
(15, 1, 1, 'Badminton_Single_Men', 'BYE', '', 0, 6, '', 0, '', 0, 0, '', 0, '', 0, 0, 0, 0),
(16, 2, 1, 'Table_tennis_Single_Men', '1', 'game', 1, 22, '', 0, '', 0, 17, '', 0, '', 0, 0, 0, 0),
(17, 2, 1, 'Table_tennis_Single_Men', '2', 'game', 1, 21, '', 0, '', 0, 14, '', 0, '', 0, 0, 0, 0),
(18, 2, 1, 'Table_tennis_Single_Men', '3', 'game', 1, 16, '', 0, '', 0, 19, '', 0, '', 0, 0, 0, 0),
(19, 2, 1, 'Table_tennis_Single_Men', '4', 'game', 1, 18, '', 0, '', 0, 13, '', 0, '', 0, 0, 0, 0),
(20, 2, 1, 'Table_tennis_Single_Men', '5', '', 0, 0, '', 0, '', 0, 0, '', 0, '', 0, 0, 0, 0),
(21, 2, 1, 'Table_tennis_Single_Men', '6', '', 0, 0, '', 0, '', 0, 0, '', 0, '', 0, 0, 0, 0),
(22, 2, 1, 'Table_tennis_Single_Men', '7', '', 0, 0, '', 0, '', 0, 0, '', 0, '', 0, 0, 0, 0),
(23, 2, 1, 'Table_tennis_Single_Men', '8', '', 0, 0, '', 0, '', 0, 0, '', 0, '', 0, 0, 0, 0),
(24, 2, 1, 'Table_tennis_Single_Men', '9', '', 0, 0, '', 0, '', 0, 0, '', 0, '', 0, 0, 0, 0),
(25, 2, 1, 'Table_tennis_Single_Men', '10', '', 0, 0, '', 0, '', 0, 0, '', 0, '', 0, 0, 0, 0),
(26, 2, 1, 'Table_tennis_Single_Men', '11', '', 0, 0, '', 0, '', 0, 0, '', 0, '', 0, 0, 0, 0),
(27, 2, 1, 'Table_tennis_Single_Men', 'BYE', '', 0, 24, '', 0, '', 0, 0, '', 0, '', 0, 0, 0, 0),
(28, 2, 1, 'Table_tennis_Single_Men', 'BYE', '', 0, 23, '', 0, '', 0, 0, '', 0, '', 0, 0, 0, 0),
(29, 2, 1, 'Table_tennis_Single_Men', 'BYE', '', 0, 20, '', 0, '', 0, 0, '', 0, '', 0, 0, 0, 0),
(30, 2, 1, 'Table_tennis_Single_Men', 'BYE', '', 0, 15, '', 0, '', 0, 0, '', 0, '', 0, 0, 0, 0),
(31, 5, 1, 'Basketball_Men', 'Round Robin Match', '', 0, 9, 'Team 1', 0, '', 0, 10, 'Team 2', 0, '', 0, 0, 0, 0),
(32, 5, 1, 'Basketball_Men', 'Round Robin Match', '', 0, 9, 'Team 1', 0, '', 0, 11, 'Team 3', 0, '', 0, 0, 0, 0),
(33, 5, 1, 'Basketball_Men', 'Round Robin Match', '', 0, 9, 'Team 1', 0, '', 0, 12, 'Team 4', 0, '', 0, 0, 0, 0),
(34, 5, 1, 'Basketball_Men', 'Round Robin Match', '', 0, 10, 'Team 2', 0, '', 0, 11, 'Team 3', 0, '', 0, 0, 0, 0),
(35, 5, 1, 'Basketball_Men', 'Round Robin Match', '', 0, 10, 'Team 2', 0, '', 0, 12, 'Team 4', 0, '', 0, 0, 0, 0),
(36, 5, 1, 'Basketball_Men', 'Round Robin Match', '', 0, 11, 'Team 3', 0, '', 0, 12, 'Team 4', 0, '', 0, 0, 0, 0),
(37, 6, 1, '', '1', '', 0, 0, '', 0, '', 0, 0, '', 0, '', 0, 0, 0, 0),
(38, 6, 1, '', '2', '', 0, 0, '', 0, '', 0, 0, '', 0, '', 0, 0, 0, 0),
(39, 6, 1, '', '3', '', 0, 0, '', 0, '', 0, 0, '', 0, '', 0, 0, 0, 0),
(40, 6, 1, '', '4', '', 0, 0, '', 0, '', 0, 0, '', 0, '', 0, 0, 0, 0),
(41, 6, 1, '', '5', '', 0, 0, '', 0, '', 0, 0, '', 0, '', 0, 0, 0, 0),
(42, 6, 1, '', '6', '', 0, 0, '', 0, '', 0, 0, '', 0, '', 0, 0, 0, 0),
(43, 7, 1, 'Futsal_Women', 'Round Robin Match - Round 1', '', 0, 17, 'Team 1', 0, '', 0, 20, 'Team 4', 0, '', 0, 0, 0, 0),
(44, 7, 1, 'Futsal_Women', 'Round Robin Match - Round 1', '', 0, 18, 'Team 2', 0, '', 0, 19, 'Team 3', 0, '', 0, 0, 0, 0),
(45, 7, 1, 'Futsal_Women', 'Round Robin Match - Round 2', '', 0, 18, 'Team 2', 0, '', 0, 20, 'Team 4', 0, '', 0, 0, 0, 0),
(46, 7, 1, 'Futsal_Women', 'Round Robin Match - Round 2', '', 0, 19, 'Team 3', 0, '', 0, 17, 'Team 1', 0, '', 0, 0, 0, 0),
(47, 7, 1, 'Futsal_Women', 'Round Robin Match - Round 3', '', 0, 19, 'Team 3', 0, '', 0, 20, 'Team 4', 0, '', 0, 0, 0, 0),
(48, 7, 1, 'Futsal_Women', 'Round Robin Match - Round 3', '', 0, 17, 'Team 1', 0, '', 0, 18, 'Team 2', 0, '', 0, 0, 0, 0),
(49, 8, 1, 'MLBB', 'Round Robin Match - Round 1', '', 0, 21, 'T1', 0, '', 0, 24, 'T4', 0, '', 0, 0, 0, 0),
(50, 8, 1, 'MLBB', 'Round Robin Match - Round 1', '', 0, 22, 'T2', 0, '', 0, 23, 'T3', 0, '', 0, 0, 0, 0),
(51, 8, 1, 'MLBB', 'Round Robin Match - Round 2', '', 0, 21, 'T1', 0, '', 0, 22, 'T2', 0, '', 0, 0, 0, 0),
(52, 8, 1, 'MLBB', 'Round Robin Match - Round 2', '', 0, 23, 'T3', 0, '', 0, 21, 'T1', 0, '', 0, 0, 0, 0),
(53, 8, 1, 'MLBB', 'Round Robin Match - Round 3', '', 0, 21, 'T1', 0, '', 0, 23, 'T3', 0, '', 0, 0, 0, 0),
(54, 8, 1, 'MLBB', 'Round Robin Match - Round 3', '', 0, 24, 'T4', 0, '', 0, 24, 'T4', 0, '', 0, 0, 0, 0),
(55, 9, 1, 'Softball_Women', 'Round Robin Match - Round 1', '', 0, 25, 'team 1', 0, '', 0, 28, 'team 4', 0, '', 0, 0, 0, 0),
(56, 9, 1, 'Softball_Women', 'Round Robin Match - Round 1', '', 0, 26, 'team 2', 0, '', 0, 27, 'team 3', 0, '', 0, 0, 0, 0),
(57, 9, 1, 'Softball_Women', 'Round Robin Match - Round 2', '', 0, 26, 'team 2', 0, '', 0, 28, 'team 4', 0, '', 0, 0, 0, 0),
(58, 9, 1, 'Softball_Women', 'Round Robin Match - Round 2', '', 0, 27, 'team 3', 0, '', 0, 25, 'team 1', 0, '', 0, 0, 0, 0),
(59, 9, 1, 'Softball_Women', 'Round Robin Match - Round 3', '', 0, 27, 'team 3', 0, '', 0, 28, 'team 4', 0, '', 0, 0, 0, 0),
(60, 9, 1, 'Softball_Women', 'Round Robin Match - Round 3', '', 0, 25, 'team 1', 0, '', 0, 26, 'team 2', 0, '', 0, 0, 0, 0),
(61, 10, 1, 'Futsal_Men', 'Round Robin Match - Round 1', '', 0, 29, 'Team 1', 0, '', 0, 32, 'Team 4', 0, '', 0, 0, 0, 0),
(62, 10, 1, 'Futsal_Men', 'Round Robin Match - Round 1', '', 0, 30, 'Team 2', 0, '', 0, 31, 'Team 3', 0, '', 0, 0, 0, 0),
(63, 10, 1, 'Futsal_Men', 'Round Robin Match - Round 2', '', 0, 30, 'Team 2', 0, '', 0, 32, 'Team 4', 0, '', 0, 0, 0, 0),
(64, 10, 1, 'Futsal_Men', 'Round Robin Match - Round 2', '', 0, 31, 'Team 3', 0, '', 0, 29, 'Team 1', 0, '', 0, 0, 0, 0),
(65, 10, 1, 'Futsal_Men', 'Round Robin Match - Round 3', '', 0, 31, 'Team 3', 0, '', 0, 32, 'Team 4', 0, '', 0, 0, 0, 0),
(66, 10, 1, 'Futsal_Men', 'Round Robin Match - Round 3', '', 0, 29, 'Team 1', 0, '', 0, 30, 'Team 2', 0, '', 0, 0, 0, 0);

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
(3, 'total_events', 1, -66.67),
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
  `player_number` varchar(255) NOT NULL,
  `bracket` varchar(255) NOT NULL,
  `bracket_status` int(11) NOT NULL,
  `last_match_status` varchar(255) NOT NULL,
  `winner_number` int(11) NOT NULL,
  `lose_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `game_id`, `event_id`, `team_id`, `name`, `age`, `name1`, `age1`, `player_number`, `bracket`, `bracket_status`, `last_match_status`, `winner_number`, `lose_number`) VALUES
(1, 1, 1, 1, '', 0, '', 0, 'player1', '', 0, '', 0, 0),
(2, 1, 1, 1, '', 0, '', 0, 'player2', '', 0, '', 0, 0),
(3, 1, 1, 1, '', 0, '', 0, 'player3', '', 0, '', 0, 0),
(4, 1, 1, 2, '', 0, '', 0, 'player1', '', 0, '', 0, 0),
(5, 1, 1, 2, '', 0, '', 0, 'player2', '', 0, '', 0, 0),
(6, 1, 1, 2, '', 0, '', 0, 'player3', '', 0, '', 0, 0),
(7, 1, 1, 3, '', 0, '', 0, 'player1', '', 0, '', 0, 0),
(8, 1, 1, 3, '', 0, '', 0, 'player2', '', 0, '', 0, 0),
(9, 1, 1, 3, '', 0, '', 0, 'player3', '', 0, '', 0, 0),
(10, 1, 1, 4, '', 0, '', 0, 'player1', '', 0, '', 0, 0),
(11, 1, 1, 4, '', 0, '', 0, 'player2', '', 0, '', 0, 0),
(12, 1, 1, 4, '', 0, '', 0, 'player3', '', 0, '', 0, 0),
(13, 2, 1, 5, '', 0, '', 0, 'player1', '', 0, '', 0, 0),
(14, 2, 1, 5, '', 0, '', 0, 'player2', '', 0, '', 0, 0),
(15, 2, 1, 5, '', 0, '', 0, 'player3', '', 0, '', 0, 0),
(16, 2, 1, 6, '', 0, '', 0, 'player1', '', 0, '', 0, 0),
(17, 2, 1, 6, '', 0, '', 0, 'player2', '', 0, '', 0, 0),
(18, 2, 1, 6, '', 0, '', 0, 'player3', '', 0, '', 0, 0),
(19, 2, 1, 7, '', 0, '', 0, 'player1', '', 0, '', 0, 0),
(20, 2, 1, 7, '', 0, '', 0, 'player2', '', 0, '', 0, 0),
(21, 2, 1, 7, '', 0, '', 0, 'player3', '', 0, '', 0, 0),
(22, 2, 1, 8, '', 0, '', 0, 'player1', '', 0, '', 0, 0),
(23, 2, 1, 8, '', 0, '', 0, 'player2', '', 0, '', 0, 0),
(24, 2, 1, 8, '', 0, '', 0, 'player3', '', 0, '', 0, 0),
(25, 5, 1, 9, '', 0, '', 0, 'player1', '', 0, '', 0, 0),
(26, 5, 1, 9, '', 0, '', 0, 'player2', '', 0, '', 0, 0),
(27, 5, 1, 9, '', 0, '', 0, 'player3', '', 0, '', 0, 0),
(28, 5, 1, 9, '', 0, '', 0, 'player4', '', 0, '', 0, 0),
(29, 5, 1, 9, '', 0, '', 0, 'player5', '', 0, '', 0, 0),
(30, 5, 1, 9, '', 0, '', 0, 'player6', '', 0, '', 0, 0),
(31, 5, 1, 9, '', 0, '', 0, 'player7', '', 0, '', 0, 0),
(32, 5, 1, 9, '', 0, '', 0, 'player8', '', 0, '', 0, 0),
(33, 5, 1, 9, '', 0, '', 0, 'player9', '', 0, '', 0, 0),
(34, 5, 1, 9, '', 0, '', 0, 'player10', '', 0, '', 0, 0),
(35, 5, 1, 10, '', 0, '', 0, 'player1', '', 0, '', 0, 0),
(36, 5, 1, 10, '', 0, '', 0, 'player2', '', 0, '', 0, 0),
(37, 5, 1, 10, '', 0, '', 0, 'player3', '', 0, '', 0, 0),
(38, 5, 1, 10, '', 0, '', 0, 'player4', '', 0, '', 0, 0),
(39, 5, 1, 10, '', 0, '', 0, 'player5', '', 0, '', 0, 0),
(40, 5, 1, 10, '', 0, '', 0, 'player6', '', 0, '', 0, 0),
(41, 5, 1, 10, '', 0, '', 0, 'player7', '', 0, '', 0, 0),
(42, 5, 1, 10, '', 0, '', 0, 'player8', '', 0, '', 0, 0),
(43, 5, 1, 10, '', 0, '', 0, 'player9', '', 0, '', 0, 0),
(44, 5, 1, 10, '', 0, '', 0, 'player10', '', 0, '', 0, 0),
(45, 5, 1, 11, '', 0, '', 0, 'player1', '', 0, '', 0, 0),
(46, 5, 1, 11, '', 0, '', 0, 'player2', '', 0, '', 0, 0),
(47, 5, 1, 11, '', 0, '', 0, 'player3', '', 0, '', 0, 0),
(48, 5, 1, 11, '', 0, '', 0, 'player4', '', 0, '', 0, 0),
(49, 5, 1, 11, '', 0, '', 0, 'player5', '', 0, '', 0, 0),
(50, 5, 1, 11, '', 0, '', 0, 'player6', '', 0, '', 0, 0),
(51, 5, 1, 11, '', 0, '', 0, 'player7', '', 0, '', 0, 0),
(52, 5, 1, 11, '', 0, '', 0, 'player8', '', 0, '', 0, 0),
(53, 5, 1, 11, '', 0, '', 0, 'player9', '', 0, '', 0, 0),
(54, 5, 1, 11, '', 0, '', 0, 'player10', '', 0, '', 0, 0),
(55, 5, 1, 10, '', 0, '', 0, 'player1', '', 0, '', 0, 0),
(56, 5, 1, 10, '', 0, '', 0, 'player2', '', 0, '', 0, 0),
(57, 5, 1, 10, '', 0, '', 0, 'player3', '', 0, '', 0, 0),
(58, 5, 1, 10, '', 0, '', 0, 'player4', '', 0, '', 0, 0),
(59, 5, 1, 10, '', 0, '', 0, 'player5', '', 0, '', 0, 0),
(60, 5, 1, 10, '', 0, '', 0, 'player6', '', 0, '', 0, 0),
(61, 5, 1, 10, '', 0, '', 0, 'player7', '', 0, '', 0, 0),
(62, 5, 1, 10, '', 0, '', 0, 'player8', '', 0, '', 0, 0),
(63, 5, 1, 10, '', 0, '', 0, 'player9', '', 0, '', 0, 0),
(64, 5, 1, 10, '', 0, '', 0, 'player10', '', 0, '', 0, 0),
(65, 5, 1, 12, '', 0, '', 0, 'player1', '', 0, '', 0, 0),
(66, 5, 1, 12, '', 0, '', 0, 'player2', '', 0, '', 0, 0),
(67, 5, 1, 12, '', 0, '', 0, 'player3', '', 0, '', 0, 0),
(68, 5, 1, 12, '', 0, '', 0, 'player4', '', 0, '', 0, 0),
(69, 5, 1, 12, '', 0, '', 0, 'player5', '', 0, '', 0, 0),
(70, 5, 1, 12, '', 0, '', 0, 'player6', '', 0, '', 0, 0),
(71, 5, 1, 12, '', 0, '', 0, 'player7', '', 0, '', 0, 0),
(72, 5, 1, 12, '', 0, '', 0, 'player8', '', 0, '', 0, 0),
(73, 5, 1, 12, '', 0, '', 0, 'player9', '', 0, '', 0, 0),
(74, 5, 1, 12, '', 0, '', 0, 'player10', '', 0, '', 0, 0),
(75, 6, 1, 13, '', 0, '', 0, 'player1', '', 0, '', 0, 0),
(76, 6, 1, 13, '', 0, '', 0, 'player2', '', 0, '', 0, 0),
(77, 6, 1, 13, '', 0, '', 0, 'player3', '', 0, '', 0, 0),
(78, 6, 1, 13, '', 0, '', 0, 'player4', '', 0, '', 0, 0),
(79, 6, 1, 13, '', 0, '', 0, 'player5', '', 0, '', 0, 0),
(80, 6, 1, 13, '', 0, '', 0, 'player6', '', 0, '', 0, 0),
(81, 6, 1, 13, '', 0, '', 0, 'player7', '', 0, '', 0, 0),
(82, 6, 1, 13, '', 0, '', 0, 'player8', '', 0, '', 0, 0),
(83, 6, 1, 13, '', 0, '', 0, 'player9', '', 0, '', 0, 0),
(84, 6, 1, 13, '', 0, '', 0, 'player10', '', 0, '', 0, 0),
(85, 6, 1, 14, '', 0, '', 0, 'player1', '', 0, '', 0, 0),
(86, 6, 1, 14, '', 0, '', 0, 'player2', '', 0, '', 0, 0),
(87, 6, 1, 14, '', 0, '', 0, 'player3', '', 0, '', 0, 0),
(88, 6, 1, 14, '', 0, '', 0, 'player4', '', 0, '', 0, 0),
(89, 6, 1, 14, '', 0, '', 0, 'player5', '', 0, '', 0, 0),
(90, 6, 1, 14, '', 0, '', 0, 'player6', '', 0, '', 0, 0),
(91, 6, 1, 14, '', 0, '', 0, 'player7', '', 0, '', 0, 0),
(92, 6, 1, 14, '', 0, '', 0, 'player8', '', 0, '', 0, 0),
(93, 6, 1, 14, '', 0, '', 0, 'player9', '', 0, '', 0, 0),
(94, 6, 1, 14, '', 0, '', 0, 'player10', '', 0, '', 0, 0),
(95, 6, 1, 15, '', 0, '', 0, 'player1', '', 0, '', 0, 0),
(96, 6, 1, 15, '', 0, '', 0, 'player2', '', 0, '', 0, 0),
(97, 6, 1, 15, '', 0, '', 0, 'player3', '', 0, '', 0, 0),
(98, 6, 1, 15, '', 0, '', 0, 'player4', '', 0, '', 0, 0),
(99, 6, 1, 15, '', 0, '', 0, 'player5', '', 0, '', 0, 0),
(100, 6, 1, 15, '', 0, '', 0, 'player6', '', 0, '', 0, 0),
(101, 6, 1, 15, '', 0, '', 0, 'player7', '', 0, '', 0, 0),
(102, 6, 1, 15, '', 0, '', 0, 'player8', '', 0, '', 0, 0),
(103, 6, 1, 15, '', 0, '', 0, 'player9', '', 0, '', 0, 0),
(104, 6, 1, 15, '', 0, '', 0, 'player10', '', 0, '', 0, 0),
(105, 6, 1, 16, '', 0, '', 0, 'player1', '', 0, '', 0, 0),
(106, 6, 1, 16, '', 0, '', 0, 'player2', '', 0, '', 0, 0),
(107, 6, 1, 16, '', 0, '', 0, 'player3', '', 0, '', 0, 0),
(108, 6, 1, 16, '', 0, '', 0, 'player4', '', 0, '', 0, 0),
(109, 6, 1, 16, '', 0, '', 0, 'player5', '', 0, '', 0, 0),
(110, 6, 1, 16, '', 0, '', 0, 'player6', '', 0, '', 0, 0),
(111, 6, 1, 16, '', 0, '', 0, 'player7', '', 0, '', 0, 0),
(112, 6, 1, 16, '', 0, '', 0, 'player8', '', 0, '', 0, 0),
(113, 6, 1, 16, '', 0, '', 0, 'player9', '', 0, '', 0, 0),
(114, 6, 1, 16, '', 0, '', 0, 'player10', '', 0, '', 0, 0),
(115, 7, 1, 17, '', 0, '', 0, 'player1', '', 0, '', 0, 0),
(116, 7, 1, 17, '', 0, '', 0, 'player2', '', 0, '', 0, 0),
(117, 7, 1, 17, '', 0, '', 0, 'player3', '', 0, '', 0, 0),
(118, 7, 1, 17, '', 0, '', 0, 'player4', '', 0, '', 0, 0),
(119, 7, 1, 17, '', 0, '', 0, 'player5', '', 0, '', 0, 0),
(120, 7, 1, 17, '', 0, '', 0, 'player6', '', 0, '', 0, 0),
(121, 7, 1, 17, '', 0, '', 0, 'player7', '', 0, '', 0, 0),
(122, 7, 1, 17, '', 0, '', 0, 'player8', '', 0, '', 0, 0),
(123, 7, 1, 17, '', 0, '', 0, 'player9', '', 0, '', 0, 0),
(124, 7, 1, 17, '', 0, '', 0, 'player10', '', 0, '', 0, 0),
(125, 7, 1, 18, '', 0, '', 0, 'player1', '', 0, '', 0, 0),
(126, 7, 1, 18, '', 0, '', 0, 'player2', '', 0, '', 0, 0),
(127, 7, 1, 18, '', 0, '', 0, 'player3', '', 0, '', 0, 0),
(128, 7, 1, 18, '', 0, '', 0, 'player4', '', 0, '', 0, 0),
(129, 7, 1, 18, '', 0, '', 0, 'player5', '', 0, '', 0, 0),
(130, 7, 1, 18, '', 0, '', 0, 'player6', '', 0, '', 0, 0),
(131, 7, 1, 18, '', 0, '', 0, 'player7', '', 0, '', 0, 0),
(132, 7, 1, 18, '', 0, '', 0, 'player8', '', 0, '', 0, 0),
(133, 7, 1, 18, '', 0, '', 0, 'player9', '', 0, '', 0, 0),
(134, 7, 1, 18, '', 0, '', 0, 'player10', '', 0, '', 0, 0),
(135, 7, 1, 19, '', 0, '', 0, 'player1', '', 0, '', 0, 0),
(136, 7, 1, 19, '', 0, '', 0, 'player2', '', 0, '', 0, 0),
(137, 7, 1, 19, '', 0, '', 0, 'player3', '', 0, '', 0, 0),
(138, 7, 1, 19, '', 0, '', 0, 'player4', '', 0, '', 0, 0),
(139, 7, 1, 19, '', 0, '', 0, 'player5', '', 0, '', 0, 0),
(140, 7, 1, 19, '', 0, '', 0, 'player6', '', 0, '', 0, 0),
(141, 7, 1, 19, '', 0, '', 0, 'player7', '', 0, '', 0, 0),
(142, 7, 1, 19, '', 0, '', 0, 'player8', '', 0, '', 0, 0),
(143, 7, 1, 19, '', 0, '', 0, 'player9', '', 0, '', 0, 0),
(144, 7, 1, 19, '', 0, '', 0, 'player10', '', 0, '', 0, 0),
(145, 7, 1, 20, '', 0, '', 0, 'player1', '', 0, '', 0, 0),
(146, 7, 1, 20, '', 0, '', 0, 'player2', '', 0, '', 0, 0),
(147, 7, 1, 20, '', 0, '', 0, 'player3', '', 0, '', 0, 0),
(148, 7, 1, 20, '', 0, '', 0, 'player4', '', 0, '', 0, 0),
(149, 7, 1, 20, '', 0, '', 0, 'player5', '', 0, '', 0, 0),
(150, 7, 1, 20, '', 0, '', 0, 'player6', '', 0, '', 0, 0),
(151, 7, 1, 20, '', 0, '', 0, 'player7', '', 0, '', 0, 0),
(152, 7, 1, 20, '', 0, '', 0, 'player8', '', 0, '', 0, 0),
(153, 7, 1, 20, '', 0, '', 0, 'player9', '', 0, '', 0, 0),
(154, 7, 1, 20, '', 0, '', 0, 'player10', '', 0, '', 0, 0),
(155, 8, 1, 21, '', 0, '', 0, 'player1', '', 0, '', 0, 0),
(156, 8, 1, 21, '', 0, '', 0, 'player2', '', 0, '', 0, 0),
(157, 8, 1, 21, '', 0, '', 0, 'player3', '', 0, '', 0, 0),
(158, 8, 1, 21, '', 0, '', 0, 'player4', '', 0, '', 0, 0),
(159, 8, 1, 21, '', 0, '', 0, 'player5', '', 0, '', 0, 0),
(160, 8, 1, 21, '', 0, '', 0, 'player6', '', 0, '', 0, 0),
(161, 8, 1, 21, '', 0, '', 0, 'player7', '', 0, '', 0, 0),
(162, 8, 1, 21, '', 0, '', 0, 'player8', '', 0, '', 0, 0),
(163, 8, 1, 21, '', 0, '', 0, 'player9', '', 0, '', 0, 0),
(164, 8, 1, 21, '', 0, '', 0, 'player10', '', 0, '', 0, 0),
(165, 8, 1, 22, '', 0, '', 0, 'player1', '', 0, '', 0, 0),
(166, 8, 1, 22, '', 0, '', 0, 'player2', '', 0, '', 0, 0),
(167, 8, 1, 22, '', 0, '', 0, 'player3', '', 0, '', 0, 0),
(168, 8, 1, 22, '', 0, '', 0, 'player4', '', 0, '', 0, 0),
(169, 8, 1, 22, '', 0, '', 0, 'player5', '', 0, '', 0, 0),
(170, 8, 1, 22, '', 0, '', 0, 'player6', '', 0, '', 0, 0),
(171, 8, 1, 22, '', 0, '', 0, 'player7', '', 0, '', 0, 0),
(172, 8, 1, 22, '', 0, '', 0, 'player8', '', 0, '', 0, 0),
(173, 8, 1, 22, '', 0, '', 0, 'player9', '', 0, '', 0, 0),
(174, 8, 1, 22, '', 0, '', 0, 'player10', '', 0, '', 0, 0),
(175, 8, 1, 23, '', 0, '', 0, 'player1', '', 0, '', 0, 0),
(176, 8, 1, 23, '', 0, '', 0, 'player2', '', 0, '', 0, 0),
(177, 8, 1, 23, '', 0, '', 0, 'player3', '', 0, '', 0, 0),
(178, 8, 1, 23, '', 0, '', 0, 'player4', '', 0, '', 0, 0),
(179, 8, 1, 23, '', 0, '', 0, 'player5', '', 0, '', 0, 0),
(180, 8, 1, 23, '', 0, '', 0, 'player6', '', 0, '', 0, 0),
(181, 8, 1, 23, '', 0, '', 0, 'player7', '', 0, '', 0, 0),
(182, 8, 1, 23, '', 0, '', 0, 'player8', '', 0, '', 0, 0),
(183, 8, 1, 23, '', 0, '', 0, 'player9', '', 0, '', 0, 0),
(184, 8, 1, 23, '', 0, '', 0, 'player10', '', 0, '', 0, 0),
(185, 8, 1, 24, '', 0, '', 0, 'player1', '', 0, '', 0, 0),
(186, 8, 1, 24, '', 0, '', 0, 'player2', '', 0, '', 0, 0),
(187, 8, 1, 24, '', 0, '', 0, 'player3', '', 0, '', 0, 0),
(188, 8, 1, 24, '', 0, '', 0, 'player4', '', 0, '', 0, 0),
(189, 8, 1, 24, '', 0, '', 0, 'player5', '', 0, '', 0, 0),
(190, 8, 1, 24, '', 0, '', 0, 'player6', '', 0, '', 0, 0),
(191, 8, 1, 24, '', 0, '', 0, 'player7', '', 0, '', 0, 0),
(192, 8, 1, 24, '', 0, '', 0, 'player8', '', 0, '', 0, 0),
(193, 8, 1, 24, '', 0, '', 0, 'player9', '', 0, '', 0, 0),
(194, 8, 1, 24, '', 0, '', 0, 'player10', '', 0, '', 0, 0),
(195, 9, 1, 25, '', 0, '', 0, 'player1', '', 0, '', 0, 0),
(196, 9, 1, 25, '', 0, '', 0, 'player2', '', 0, '', 0, 0),
(197, 9, 1, 25, '', 0, '', 0, 'player3', '', 0, '', 0, 0),
(198, 9, 1, 25, '', 0, '', 0, 'player4', '', 0, '', 0, 0),
(199, 9, 1, 25, '', 0, '', 0, 'player5', '', 0, '', 0, 0),
(200, 9, 1, 25, '', 0, '', 0, 'player6', '', 0, '', 0, 0),
(201, 9, 1, 25, '', 0, '', 0, 'player7', '', 0, '', 0, 0),
(202, 9, 1, 25, '', 0, '', 0, 'player8', '', 0, '', 0, 0),
(203, 9, 1, 25, '', 0, '', 0, 'player9', '', 0, '', 0, 0),
(204, 9, 1, 25, '', 0, '', 0, 'player10', '', 0, '', 0, 0),
(205, 9, 1, 26, '', 0, '', 0, 'player1', '', 0, '', 0, 0),
(206, 9, 1, 26, '', 0, '', 0, 'player2', '', 0, '', 0, 0),
(207, 9, 1, 26, '', 0, '', 0, 'player3', '', 0, '', 0, 0),
(208, 9, 1, 26, '', 0, '', 0, 'player4', '', 0, '', 0, 0),
(209, 9, 1, 26, '', 0, '', 0, 'player5', '', 0, '', 0, 0),
(210, 9, 1, 26, '', 0, '', 0, 'player6', '', 0, '', 0, 0),
(211, 9, 1, 26, '', 0, '', 0, 'player7', '', 0, '', 0, 0),
(212, 9, 1, 26, '', 0, '', 0, 'player8', '', 0, '', 0, 0),
(213, 9, 1, 26, '', 0, '', 0, 'player9', '', 0, '', 0, 0),
(214, 9, 1, 26, '', 0, '', 0, 'player10', '', 0, '', 0, 0),
(215, 9, 1, 27, '', 0, '', 0, 'player1', '', 0, '', 0, 0),
(216, 9, 1, 27, '', 0, '', 0, 'player2', '', 0, '', 0, 0),
(217, 9, 1, 27, '', 0, '', 0, 'player3', '', 0, '', 0, 0),
(218, 9, 1, 27, '', 0, '', 0, 'player4', '', 0, '', 0, 0),
(219, 9, 1, 27, '', 0, '', 0, 'player5', '', 0, '', 0, 0),
(220, 9, 1, 27, '', 0, '', 0, 'player6', '', 0, '', 0, 0),
(221, 9, 1, 27, '', 0, '', 0, 'player7', '', 0, '', 0, 0),
(222, 9, 1, 27, '', 0, '', 0, 'player8', '', 0, '', 0, 0),
(223, 9, 1, 27, '', 0, '', 0, 'player9', '', 0, '', 0, 0),
(224, 9, 1, 27, '', 0, '', 0, 'player10', '', 0, '', 0, 0),
(225, 9, 1, 28, '', 0, '', 0, 'player1', '', 0, '', 0, 0),
(226, 9, 1, 28, '', 0, '', 0, 'player2', '', 0, '', 0, 0),
(227, 9, 1, 28, '', 0, '', 0, 'player3', '', 0, '', 0, 0),
(228, 9, 1, 28, '', 0, '', 0, 'player4', '', 0, '', 0, 0),
(229, 9, 1, 28, '', 0, '', 0, 'player5', '', 0, '', 0, 0),
(230, 9, 1, 28, '', 0, '', 0, 'player6', '', 0, '', 0, 0),
(231, 9, 1, 28, '', 0, '', 0, 'player7', '', 0, '', 0, 0),
(232, 9, 1, 28, '', 0, '', 0, 'player8', '', 0, '', 0, 0),
(233, 9, 1, 28, '', 0, '', 0, 'player9', '', 0, '', 0, 0),
(234, 9, 1, 28, '', 0, '', 0, 'player10', '', 0, '', 0, 0),
(235, 10, 1, 29, '', 0, '', 0, 'player1', '', 0, '', 0, 0),
(236, 10, 1, 29, '', 0, '', 0, 'player2', '', 0, '', 0, 0),
(237, 10, 1, 29, '', 0, '', 0, 'player3', '', 0, '', 0, 0),
(238, 10, 1, 29, '', 0, '', 0, 'player4', '', 0, '', 0, 0),
(239, 10, 1, 29, '', 0, '', 0, 'player5', '', 0, '', 0, 0),
(240, 10, 1, 29, '', 0, '', 0, 'player6', '', 0, '', 0, 0),
(241, 10, 1, 29, '', 0, '', 0, 'player7', '', 0, '', 0, 0),
(242, 10, 1, 29, '', 0, '', 0, 'player8', '', 0, '', 0, 0),
(243, 10, 1, 29, '', 0, '', 0, 'player9', '', 0, '', 0, 0),
(244, 10, 1, 29, '', 0, '', 0, 'player10', '', 0, '', 0, 0),
(245, 10, 1, 30, '', 0, '', 0, 'player1', '', 0, '', 0, 0),
(246, 10, 1, 30, '', 0, '', 0, 'player2', '', 0, '', 0, 0),
(247, 10, 1, 30, '', 0, '', 0, 'player3', '', 0, '', 0, 0),
(248, 10, 1, 30, '', 0, '', 0, 'player4', '', 0, '', 0, 0),
(249, 10, 1, 30, '', 0, '', 0, 'player5', '', 0, '', 0, 0),
(250, 10, 1, 30, '', 0, '', 0, 'player6', '', 0, '', 0, 0),
(251, 10, 1, 30, '', 0, '', 0, 'player7', '', 0, '', 0, 0),
(252, 10, 1, 30, '', 0, '', 0, 'player8', '', 0, '', 0, 0),
(253, 10, 1, 30, '', 0, '', 0, 'player9', '', 0, '', 0, 0),
(254, 10, 1, 30, '', 0, '', 0, 'player10', '', 0, '', 0, 0),
(255, 10, 1, 31, '', 0, '', 0, 'player1', '', 0, '', 0, 0),
(256, 10, 1, 31, '', 0, '', 0, 'player2', '', 0, '', 0, 0),
(257, 10, 1, 31, '', 0, '', 0, 'player3', '', 0, '', 0, 0),
(258, 10, 1, 31, '', 0, '', 0, 'player4', '', 0, '', 0, 0),
(259, 10, 1, 31, '', 0, '', 0, 'player5', '', 0, '', 0, 0),
(260, 10, 1, 31, '', 0, '', 0, 'player6', '', 0, '', 0, 0),
(261, 10, 1, 31, '', 0, '', 0, 'player7', '', 0, '', 0, 0),
(262, 10, 1, 31, '', 0, '', 0, 'player8', '', 0, '', 0, 0),
(263, 10, 1, 31, '', 0, '', 0, 'player9', '', 0, '', 0, 0),
(264, 10, 1, 31, '', 0, '', 0, 'player10', '', 0, '', 0, 0),
(265, 10, 1, 32, '', 0, '', 0, 'player1', '', 0, '', 0, 0),
(266, 10, 1, 32, '', 0, '', 0, 'player2', '', 0, '', 0, 0),
(267, 10, 1, 32, '', 0, '', 0, 'player3', '', 0, '', 0, 0),
(268, 10, 1, 32, '', 0, '', 0, 'player4', '', 0, '', 0, 0),
(269, 10, 1, 32, '', 0, '', 0, 'player5', '', 0, '', 0, 0),
(270, 10, 1, 32, '', 0, '', 0, 'player6', '', 0, '', 0, 0),
(271, 10, 1, 32, '', 0, '', 0, 'player7', '', 0, '', 0, 0),
(272, 10, 1, 32, '', 0, '', 0, 'player8', '', 0, '', 0, 0),
(273, 10, 1, 32, '', 0, '', 0, 'player9', '', 0, '', 0, 0),
(274, 10, 1, 32, '', 0, '', 0, 'player10', '', 0, '', 0, 0);

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
  `id` int(11) NOT NULL,
  `EliminationType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registered_game`
--

INSERT INTO `registered_game` (`event_id`, `game_type`, `status`, `img`, `CreatedTeam`, `id`, `EliminationType`) VALUES
(1, 'Badminton_Single_Men', 'submitted', 'stored_images/badminton.jpg', 1, 1, 'SEG'),
(1, 'Table_tennis_Single_Men', 'submitted', 'stored_images/table_tennis.jpg', 1, 2, 'SEG'),
(1, 'Basketball_Men', 'need_information', 'stored_images/basketball.avif', 0, 3, 'SRRG'),
(1, 'Vollayball_Men', 'need_information', 'stored_images/volleyball.png', 0, 4, 'DEG'),
(1, 'Basketball_Men', 'submitted', 'stored_images/basketball.avif', 1, 5, 'SRRG'),
(1, 'Vollayball_Women', 'submitted', 'stored_images/volleyball.png', 1, 6, 'SRRG'),
(1, 'Futsal_Women', 'submitted', 'stored_images/futsal.jpg', 1, 7, 'SRRG'),
(1, 'MLBB', 'submitted', 'stored_images/mobile_legends.jpg', 1, 8, 'SRRG'),
(1, 'Softball_Women', 'submitted', 'stored_images/softball.png', 1, 9, 'SRRG'),
(1, 'Futsal_Men', 'submitted', 'stored_images/futsal.jpg', 1, 10, 'SRRG');

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
  `A` int(11) NOT NULL,
  `B` int(11) NOT NULL,
  `C` int(11) NOT NULL,
  `D` int(11) NOT NULL,
  `E` int(11) NOT NULL,
  `F` int(11) NOT NULL,
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

INSERT INTO `teams` (`id`, `game_id`, `event_id`, `team_name`, `team_number`, `logo`, `status`, `A`, `B`, `C`, `D`, `E`, `F`, `ifBye`, `number_of_player`, `bracket`, `bracket_status`, `last_match_status`, `lose_number`, `winner_number`) VALUES
(1, 1, 1, 'team 1', 1, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 3, '', 0, '', 0, 0),
(2, 1, 1, 'team 2', 2, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 3, '', 0, '', 0, 0),
(3, 1, 1, 'team 3', 3, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 3, '', 0, '', 0, 0),
(4, 1, 1, 'team 4', 4, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 3, '', 0, '', 0, 0),
(5, 2, 1, 'Team 1', 1, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 3, '', 0, '', 0, 0),
(6, 2, 1, 'team 2', 2, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 3, '', 0, '', 0, 0),
(7, 2, 1, 'team 3', 3, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 3, '', 0, '', 0, 0),
(8, 2, 1, 'team 4', 4, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 3, '', 0, '', 0, 0),
(9, 5, 1, 'Team 1', 1, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 10, '', 0, '', 0, 0),
(10, 5, 1, 'Team 2', 2, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 10, '', 0, '', 0, 0),
(11, 5, 1, 'Team 3', 3, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 10, '', 0, '', 0, 0),
(12, 5, 1, 'Team 4', 4, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 10, '', 0, '', 0, 0),
(13, 6, 1, 'Team 1', 1, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 10, '', 0, '', 0, 0),
(14, 6, 1, 'Team 2', 2, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 10, '', 0, '', 0, 0),
(15, 6, 1, 'Team 3', 3, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 10, '', 0, '', 0, 0),
(16, 6, 1, 'Team 4', 4, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 10, '', 0, '', 0, 0),
(17, 7, 1, 'Team 1', 1, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 10, '', 0, '', 0, 0),
(18, 7, 1, 'Team 2', 2, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 10, '', 0, '', 0, 0),
(19, 7, 1, 'Team 3', 3, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 10, '', 0, '', 0, 0),
(20, 7, 1, 'Team 4', 4, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 10, '', 0, '', 0, 0),
(21, 8, 1, 'T1', 1, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 10, '', 0, '', 0, 0),
(22, 8, 1, 'T2', 2, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 10, '', 0, '', 0, 0),
(23, 8, 1, 'T3', 3, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 10, '', 0, '', 0, 0),
(24, 8, 1, 'T4', 4, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 10, '', 0, '', 0, 0),
(25, 9, 1, 'team 1', 1, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 10, '', 0, '', 0, 0),
(26, 9, 1, 'team 2', 2, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 10, '', 0, '', 0, 0),
(27, 9, 1, 'team 3', 3, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 10, '', 0, '', 0, 0),
(28, 9, 1, 'team 4', 4, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 10, '', 0, '', 0, 0),
(29, 10, 1, 'Team 1', 1, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 10, '', 0, '', 0, 0),
(30, 10, 1, 'Team 2', 2, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 10, '', 0, '', 0, 0),
(31, 10, 1, 'Team 3', 3, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 10, '', 0, '', 0, 0),
(32, 10, 1, 'Team 4', 4, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 10, '', 0, '', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dance_performance`
--
ALTER TABLE `dance_performance`
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
-- AUTO_INCREMENT for table `dance_performance`
--
ALTER TABLE `dance_performance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `game_matches`
--
ALTER TABLE `game_matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;

--
-- AUTO_INCREMENT for table `registered_game`
--
ALTER TABLE `registered_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
