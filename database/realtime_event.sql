-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2024 at 06:52 AM
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
(5, 'profile/default.jpg', 'Ejie Cabales Florida', 0, '', 'ejie123', '123', 'online', 'approved', '2024-08-31 01:38:11'),
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
(1, 'Intramurals 2024', 4, 'on-going', '2024-09-01 02:32:05');

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
(1, 'pending_account', 2, -33.33),
(2, 'approved_account', 2, 100),
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
  `choose_type` varchar(255) NOT NULL,
  `First_Try` float(10,2) NOT NULL,
  `Set1` float(10,2) NOT NULL,
  `Set2` float(10,2) NOT NULL,
  `Set3` float(10,2) NOT NULL,
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

INSERT INTO `players` (`id`, `game_id`, `event_id`, `team_id`, `name`, `age`, `name1`, `age1`, `choose_type`, `First_Try`, `Set1`, `Set2`, `Set3`, `player_number`, `bracket`, `bracket_status`, `last_match_status`, `winner_number`, `lose_number`) VALUES
(1, 1, 1, 1, 'Deff', 20, '', 0, '400meter', 0.00, 0.00, 0.00, 0.00, 'player1', '', 0, '', 0, 0),
(2, 1, 1, 1, 'yuff', 20, '', 0, '400meter', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(3, 1, 1, 1, 'Deff', 20, '', 0, '400meter', 0.00, 0.00, 0.00, 0.00, 'player1', '', 0, '', 0, 0),
(4, 1, 1, 1, 'yuff', 20, '', 0, '400meter', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(5, 1, 1, 1, 'Deff', 20, '', 0, '400meter', 0.00, 0.00, 0.00, 0.00, 'player1', '', 0, '', 0, 0),
(6, 1, 1, 1, 'yuff', 20, '', 0, '400meter', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(7, 1, 1, 1, 'lori', 20, '', 0, '400meter', 0.00, 0.00, 0.00, 0.00, 'player3', '', 0, '', 0, 0),
(8, 1, 1, 1, 'comi', 20, '', 0, '400meter', 0.00, 0.00, 0.00, 0.00, 'player4', '', 0, '', 0, 0),
(9, 1, 1, 2, 'Pp1', 20, '', 0, '100meter', 0.00, 0.00, 0.00, 0.00, 'player1', '', 0, '', 0, 0),
(10, 1, 1, 2, 'pp2', 20, '', 0, '100meter', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(11, 1, 1, 2, 'pp3', 20, '', 0, '200meter', 0.00, 0.00, 0.00, 0.00, 'player1', '', 0, '', 0, 0),
(12, 1, 1, 2, 'pp4', 20, '', 0, '200meter', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(13, 1, 1, 2, 'pp5', 20, '', 0, '400meter', 0.00, 0.00, 0.00, 0.00, 'player1', '', 0, '', 0, 0),
(14, 1, 1, 2, 'pp6', 20, '', 0, '400meter', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(15, 1, 1, 2, 'pp7', 20, '', 0, '400meter', 0.00, 0.00, 0.00, 0.00, 'player3', '', 0, '', 0, 0),
(16, 1, 1, 2, 'pp8', 20, '', 0, '400meter', 0.00, 0.00, 0.00, 0.00, 'player4', '', 0, '', 0, 0),
(17, 2, 1, 5, '', 0, '', 0, '', 0.00, 0.00, 0.00, 0.00, 'player1', '', 0, '', 0, 0),
(18, 2, 1, 5, '', 0, '', 0, '', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(19, 3, 1, 9, '', 0, '', 0, '100meter', 0.00, 0.00, 0.00, 0.00, 'player1', '', 0, '', 0, 0),
(20, 3, 1, 9, '', 0, '', 0, '100meter', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(21, 3, 1, 9, '', 0, '', 0, '200meter', 0.00, 0.00, 0.00, 0.00, 'player1', '', 0, '', 0, 0),
(22, 3, 1, 9, '', 0, '', 0, '200meter', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(23, 3, 1, 9, '', 0, '', 0, '400meter', 0.00, 0.00, 0.00, 0.00, 'player1', '', 0, '', 0, 0),
(24, 3, 1, 9, '', 0, '', 0, '400meter', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(25, 3, 1, 9, '', 0, '', 0, '400meter', 0.00, 0.00, 0.00, 0.00, 'player3', '', 0, '', 0, 0),
(26, 3, 1, 9, '', 0, '', 0, '400meter', 0.00, 0.00, 0.00, 0.00, 'player4', '', 0, '', 0, 0),
(27, 2, 1, 6, '', 0, '', 0, '', 0.00, 0.00, 0.00, 0.00, 'player1', '', 0, '', 0, 0),
(28, 2, 1, 6, '', 0, '', 0, '', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(29, 2, 1, 7, 'tt1', 20, '', 0, 'javelin', 0.00, 0.00, 0.00, 0.00, 'player1', '', 0, '', 0, 0),
(30, 2, 1, 7, 'tt2', 20, '', 0, 'javelin', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(31, 2, 1, 7, 'tt3', 20, '', 0, 'discus', 0.00, 0.00, 0.00, 0.00, 'player1', '', 0, '', 0, 0),
(32, 2, 1, 7, 'tt4', 20, '', 0, 'discus', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(33, 2, 1, 7, 'tt5', 20, '', 0, 'shotput', 0.00, 0.00, 0.00, 0.00, 'player1', '', 0, '', 0, 0),
(34, 2, 1, 7, 'tt6', 20, '', 0, 'shotput', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(35, 2, 1, 8, 'dd1', 20, '', 0, 'javelin', 0.00, 0.00, 0.00, 0.00, 'player1', '', 0, '', 0, 0),
(36, 2, 1, 8, 'dd2', 20, '', 0, 'javelin', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(37, 2, 1, 8, 'dd3', 20, '', 0, 'discus', 0.00, 0.00, 0.00, 0.00, 'player1', '', 0, '', 0, 0),
(38, 2, 1, 8, 'dd4', 20, '', 0, 'discus', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(39, 2, 1, 8, 'dd5', 20, '', 0, 'shotput', 0.00, 0.00, 0.00, 0.00, 'player1', '', 0, '', 0, 0),
(40, 2, 1, 8, 'dd6', 20, '', 0, 'shotput', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(41, 4, 1, 13, 'pp1', 20, '', 0, 'javelin', 0.00, 14.45, 15.45, 1645.00, 'player1', '', 0, '', 0, 0),
(42, 4, 1, 13, 'pp2', 20, '', 0, 'javelin', 0.00, 14.56, 16.45, 17.45, 'player2', '', 0, '', 0, 0),
(43, 4, 1, 13, 'pp3', 20, '', 0, 'discus', 0.00, 12.56, 14.98, 20.45, 'player1', '', 0, '', 0, 0),
(44, 4, 1, 13, 'pp4', 20, '', 0, 'discus', 0.00, 34.22, 22.45, 18.34, 'player2', '', 0, '', 0, 0),
(45, 4, 1, 13, 'pp5', 20, '', 0, 'shotput', 0.00, 14.09, 21.67, 18.45, 'player1', '', 0, '', 0, 0),
(46, 4, 1, 13, 'pp6', 20, '', 0, 'shotput', 0.00, 12.23, 23.45, 24.01, 'player2', '', 0, '', 0, 0),
(47, 4, 1, 14, 'ii1', 20, '', 0, 'javelin', 0.00, 12.45, 15.23, 19.34, 'player1', '', 0, '', 0, 0),
(48, 4, 1, 14, 'ii2', 20, '', 0, 'javelin', 0.00, 12.56, 14.26, 16.34, 'player2', '', 0, '', 0, 0),
(49, 4, 1, 14, 'ii3', 20, '', 0, 'discus', 0.00, 0.00, 0.00, 0.00, 'player1', '', 0, '', 0, 0),
(50, 4, 1, 14, 'ii4', 20, '', 0, 'discus', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(51, 4, 1, 14, 'ii5', 20, '', 0, 'shotput', 0.00, 0.00, 0.00, 0.00, 'player1', '', 0, '', 0, 0),
(52, 4, 1, 14, 'ii6', 20, '', 0, 'shotput', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(53, 4, 1, 15, 'jj1', 20, '', 0, 'javelin', 0.00, 34.00, 19.23, 34.34, 'player1', '', 0, '', 0, 0),
(54, 4, 1, 15, 'jj2', 20, '', 0, 'javelin', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(55, 4, 1, 15, 'jj3', 20, '', 0, 'discus', 0.00, 0.00, 0.00, 0.00, 'player1', '', 0, '', 0, 0),
(56, 4, 1, 15, 'jj4', 20, '', 0, 'discus', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(57, 4, 1, 15, 'jj5', 20, '', 0, 'shotput', 0.00, 0.00, 0.00, 0.00, 'player1', '', 0, '', 0, 0),
(58, 4, 1, 15, 'jj6', 20, '', 0, 'shotput', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(59, 4, 1, 16, 'nn1', 20, '', 0, 'javelin', 0.00, 0.00, 0.00, 0.00, 'player1', '', 0, '', 0, 0),
(60, 4, 1, 16, 'nn2', 20, '', 0, 'javelin', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(61, 4, 1, 16, 'nn3', 20, '', 0, 'discus', 0.00, 0.00, 0.00, 0.00, 'player1', '', 0, '', 0, 0),
(62, 4, 1, 16, 'nn4', 20, '', 0, 'discus', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(63, 4, 1, 16, 'nn5', 20, '', 0, 'shotput', 0.00, 0.00, 0.00, 0.00, 'player1', '', 0, '', 0, 0),
(64, 4, 1, 16, 'nn6', 20, '', 0, 'shotput', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(65, 5, 1, 17, 'yy1', 20, '', 0, 'long', 0.00, 34.45, 22.56, 28.45, 'player1', '', 0, '', 0, 0),
(66, 5, 1, 17, 'yy2', 20, '', 0, 'long', 0.00, 27.23, 28.01, 29.34, 'player2', '', 0, '', 0, 0),
(67, 5, 1, 17, 'yy3', 20, '', 0, 'high', 0.00, 23.00, 34.54, 21.45, 'player1', '', 0, '', 0, 0),
(68, 5, 1, 17, 'yy4', 20, '', 0, 'high', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(69, 5, 1, 17, 'yy5', 20, '', 0, 'triple', 0.00, 12.45, 18.23, 19.56, 'player1', '', 0, '', 0, 0),
(70, 5, 1, 17, 'yy6', 20, '', 0, 'triple', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(71, 5, 1, 18, 'oo1', 20, '', 0, 'long', 0.00, 0.00, 0.00, 0.00, 'player1', '', 0, '', 0, 0),
(72, 5, 1, 18, 'oo2', 20, '', 0, 'long', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(73, 5, 1, 18, 'oo3', 20, '', 0, 'high', 0.00, 0.00, 0.00, 0.00, 'player1', '', 0, '', 0, 0),
(74, 5, 1, 18, 'oo4', 20, '', 0, 'high', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(75, 5, 1, 18, 'oo5', 20, '', 0, 'triple', 0.00, 0.00, 0.00, 0.00, 'player1', '', 0, '', 0, 0),
(76, 5, 1, 18, 'oo6', 20, '', 0, 'triple', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(77, 5, 1, 19, 'tt1', 20, '', 0, 'long', 0.00, 0.00, 0.00, 0.00, 'player1', '', 0, '', 0, 0),
(78, 5, 1, 19, 'tt2', 20, '', 0, 'long', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(79, 5, 1, 19, 'tt3', 20, '', 0, 'high', 0.00, 0.00, 0.00, 0.00, 'player1', '', 0, '', 0, 0),
(80, 5, 1, 19, 'tt4', 20, '', 0, 'high', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(81, 5, 1, 19, 'tt5', 20, '', 0, 'triple', 0.00, 0.00, 0.00, 0.00, 'player1', '', 0, '', 0, 0),
(82, 5, 1, 19, 'tt6', 20, '', 0, 'triple', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(83, 5, 1, 20, 'bb1', 20, '', 0, 'long', 0.00, 0.00, 0.00, 0.00, 'player1', '', 0, '', 0, 0),
(84, 5, 1, 20, 'bb2', 20, '', 0, 'long', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(85, 5, 1, 20, 'bb3', 20, '', 0, 'high', 0.00, 0.00, 0.00, 0.00, 'player1', '', 0, '', 0, 0),
(86, 5, 1, 20, 'bb4', 20, '', 0, 'high', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0),
(87, 5, 1, 20, 'bb5', 20, '', 0, 'triple', 0.00, 0.00, 0.00, 0.00, 'player1', '', 0, '', 0, 0),
(88, 5, 1, 20, 'bb6', 20, '', 0, 'triple', 0.00, 0.00, 0.00, 0.00, 'player2', '', 0, '', 0, 0);

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
  `EliminationType` varchar(255) NOT NULL,
  `meters` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registered_game`
--

INSERT INTO `registered_game` (`event_id`, `game_type`, `status`, `img`, `CreatedTeam`, `id`, `EliminationType`, `meters`) VALUES
(1, 'Runs_Men', 'need_information', 'stored_images/runs.png', 1, 1, 'null', 'runs'),
(1, 'Throws_Men', 'need_information', 'stored_images/throws.jpg', 1, 2, 'null', 'throws'),
(1, 'Runs_Women', 'need_information', 'stored_images/runs.png', 1, 3, 'null', 'runs'),
(1, 'Throws_Men', 'submitted', 'stored_images/throws.jpg', 1, 4, 'null', 'throws'),
(1, 'Jumps_Men', 'submitted', 'stored_images/jumps.jpg', 1, 5, '', '');

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
(1, 1, 1, 'Team 1', 1, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 0, '', 0, '', 0, 0),
(2, 1, 1, 'Team 2', 2, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 0, '', 0, '', 0, 0),
(3, 1, 1, 'Team Name', 3, '../logo/default.png', '', 0, 0, 0, 0, 0, 0, '', 0, '', 0, '', 0, 0),
(4, 1, 1, 'Team Name', 4, '../logo/default.png', '', 0, 0, 0, 0, 0, 0, '', 0, '', 0, '', 0, 0),
(5, 2, 1, 'Team 1', 1, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 2, '', 0, '', 0, 0),
(6, 2, 1, 'Team 2', 2, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 2, '', 0, '', 0, 0),
(7, 2, 1, 'Team 3', 3, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 2, '', 0, '', 0, 0),
(8, 2, 1, 'Team 4', 4, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 2, '', 0, '', 0, 0),
(9, 3, 1, 'Team 1', 1, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 0, '', 0, '', 0, 0),
(10, 3, 1, 'Team Name', 2, '../logo/default.png', '', 0, 0, 0, 0, 0, 0, '', 0, '', 0, '', 0, 0),
(11, 3, 1, 'Team Name', 3, '../logo/default.png', '', 0, 0, 0, 0, 0, 0, '', 0, '', 0, '', 0, 0),
(12, 3, 1, 'Team Name', 4, '../logo/default.png', '', 0, 0, 0, 0, 0, 0, '', 0, '', 0, '', 0, 0),
(13, 4, 1, 'T1', 1, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 2, '', 0, '', 0, 0),
(14, 4, 1, 'T2', 2, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 2, '', 0, '', 0, 0),
(15, 4, 1, 'T3', 3, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 2, '', 0, '', 0, 0),
(16, 4, 1, 'T4', 4, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 2, '', 0, '', 0, 0),
(17, 5, 1, 'Team 1', 1, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 2, '', 0, '', 0, 0),
(18, 5, 1, 'Team 2', 2, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 2, '', 0, '', 0, 0),
(19, 5, 1, 'Team 3', 3, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 2, '', 0, '', 0, 0),
(20, 5, 1, 'Team 4', 4, '../logo/default.png', 'detailed', 0, 0, 0, 0, 0, 0, '', 2, '', 0, '', 0, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `game_matches`
--
ALTER TABLE `game_matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `registered_game`
--
ALTER TABLE `registered_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
