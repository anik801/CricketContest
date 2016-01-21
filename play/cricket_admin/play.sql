-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2015 at 08:41 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `play`
--
CREATE DATABASE IF NOT EXISTS `play` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `play`;

-- --------------------------------------------------------

--
-- Table structure for table `adds`
--

CREATE TABLE IF NOT EXISTS `adds` (
  `add_id` int(11) NOT NULL AUTO_INCREMENT,
  `add_title` varchar(128) DEFAULT NULL,
  `add_file` varchar(128) DEFAULT NULL,
  `entry_date_time` datetime NOT NULL,
  PRIMARY KEY (`add_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `adds`
--

INSERT INTO `adds` (`add_id`, `add_title`, `add_file`, `entry_date_time`) VALUES
(1, 'Nokia', '1.png', '2015-03-09 00:10:40'),
(2, 'Grameen Phone', '2.jpg', '2015-03-09 00:11:01'),
(3, '', '0', '2015-03-08 23:50:02');

-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

CREATE TABLE IF NOT EXISTS `admin_accounts` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email_en` varchar(128) NOT NULL,
  `password_en` varchar(128) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`admin_id`, `email`, `password`, `email_en`, `password_en`) VALUES
(1, 'a@a', '12345678', '4b9411a9b28f9063ea75e5fee24bb2a8', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE IF NOT EXISTS `matches` (
  `match_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_team` int(11) NOT NULL,
  `second_team` int(11) NOT NULL,
  `venue` varchar(64) NOT NULL,
  `match_type` varchar(32) NOT NULL,
  `match_status` int(1) NOT NULL DEFAULT '0',
  `schedule` datetime NOT NULL,
  `entry_date_time` datetime NOT NULL,
  PRIMARY KEY (`match_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`match_id`, `first_team`, `second_team`, `venue`, `match_type`, `match_status`, `schedule`, `entry_date_time`) VALUES
(1, 2, 3, 'Sydney', 'Group Match', 1, '2015-02-22 04:00:00', '2015-02-21 03:06:05'),
(2, 3, 5, 'Sydney', 'Group Match', 1, '2015-02-23 05:00:00', '2015-02-21 03:07:13'),
(3, 5, 2, 'Sydney', 'Group Match', 0, '2015-02-26 03:07:00', '2015-02-21 03:07:41');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_name` varchar(32) NOT NULL,
  `sender_email` varchar(64) NOT NULL,
  `message_description` longtext NOT NULL,
  `message_date_time` datetime NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `sender_name`, `sender_email`, `message_description`, `message_date_time`) VALUES
(1, 'John', 'John@yahoo.com', 'Hello Admin, How are you?', '2015-02-18 13:34:21'),
(2, 'John', 'John@yahoo.com', 'Hello World. ', '2015-02-18 17:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE IF NOT EXISTS `players` (
  `player_id` int(11) NOT NULL AUTO_INCREMENT,
  `player_name` varchar(32) NOT NULL,
  `player_role` varchar(32) NOT NULL,
  `player_image` varchar(128) NOT NULL,
  `player_description` varchar(20480) DEFAULT NULL,
  `player_status` int(1) NOT NULL DEFAULT '1',
  `team_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `external_link` varchar(512) DEFAULT '',
  PRIMARY KEY (`player_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`player_id`, `player_name`, `player_role`, `player_image`, `player_description`, `player_status`, `team_id`, `date_time`, `external_link`) VALUES
(1, 'Michael Clarke', 'Batting', '54e6461e2d50e.jpg', 'Captain \nAge: 33 years 284 days\nPlaying role: Middle-order batsman\nBatting: Right-hand bat\nBowling: Slow left-arm orthodox\n', 1, 2, '2015-02-20 02:22:54', 'http://google.com'),
(2, 'Aaron Finch', 'Batting', '54e648766153d.jpg', 'Age: 28 years 55 days\r\nPlaying role: Top-order batsman\r\nBatting: Right-hand bat\r\nBowling: Slow left-arm orthodox', 1, 2, '2015-02-20 02:32:54', ''),
(3, 'Brad Haddin', 'Wicket Keeper', '54e648cb536e2.jpg', 'Wicketkeeper\r\nAge: 37 years 80 days\r\nPlaying role: Wicketkeeper batsman\r\nBatting: Right-hand bat', 1, 2, '2015-02-20 02:34:19', ''),
(4, 'David Warner', 'Batting', '54e648f45c3f3.jpg', 'Age: 28 years 76 days\r\nPlaying role: Opening batsman\r\nBatting: Left-hand bat\r\nBowling: Legbreak', 1, 2, '2015-02-20 02:35:00', ''),
(5, 'George Bailey', 'Batting', '54e6490c8c32e.jpg', 'Vice-Captain\r\nAge: 32 years 126 days\r\nPlaying role: Top-order batsman\r\nBatting: Right-hand bat\r\nBowling: Right-arm medium', 1, 2, '2015-02-20 02:35:24', ''),
(6, 'Glenn Maxwell', 'All Rounder', '54e64930bbc20.jpg', 'Age: 26 years 89 days\r\nBatting: Right-hand bat\r\nBowling: Right-arm offbreak', 1, 2, '2015-02-20 02:36:00', ''),
(7, 'James Faulkner', 'All Rounder', '54e6496567aa9.jpg', 'Age: 24 years 257 days\r\nBatting: Right-hand bat\r\nBowling: Left-arm fast-medium', 1, 2, '2015-02-20 02:36:53', ''),
(8, 'Josh Hazlewood', 'Bowling', '54e6497d5861a.jpg', 'Age: 24 years 3 days\r\nPlaying role: Bowler\r\nBatting: Left-hand bat\r\nBowling: Right-arm fast-medium', 1, 2, '2015-02-20 02:37:17', ''),
(9, 'Mitchell Johnson', 'Bowling', '54e649a35c100.jpg', 'Age: 33 years 70 days\r\nPlaying role: Bowler\r\nBatting: Left-hand bat\r\nBowling: Left-arm fast', 1, 2, '2015-02-20 02:37:55', ''),
(10, 'Mitchell Marsh', 'Batting', '54e649b480a98.jpg', 'Age: 23 years 83 days\r\nPlaying role: Top-order batsman\r\nBatting: Right-hand bat\r\nBowling: Right-arm medium', 1, 2, '2015-02-20 02:38:12', ''),
(11, 'Mitchell Starc', 'Bowling', '54e649fec99a1.jpg', 'Age: 24 years 346 days\r\nPlaying role: Bowler\r\nBatting: Left-hand bat\r\nBowling: Left-arm fast', 1, 2, '2015-02-20 02:39:26', ''),
(12, 'Pat Cummins', 'Bowling', '54e64a21b46c9.jpg', 'Age: 21 years 248 days\r\nPlaying role: Bowler\r\nBatting: Right-hand bat\r\nBowling: Right-arm fast', 1, 2, '2015-02-20 02:40:01', ''),
(13, 'Shane Watson', 'All Rounder', '54e64a43c5b04.jpg', 'Age: 33 years 208 days\r\nPlaying role: Allrounder\r\nBatting: Right-hand bat\r\nBowling: Right-arm fast-medium', 1, 2, '2015-02-20 02:40:35', ''),
(14, 'Steven Smith', 'All Rounder', '54e64a56b410c.jpg', 'Age: 25 years 223 days\r\nPlaying role: Allrounder\r\nBatting: Right-hand bat\r\nBowling: Legbreak googly', 1, 2, '2015-02-20 02:40:54', ''),
(18, 'Xavier Doherty', 'Bowling', '54e653a1e396c.jpg', 'Age: 32 years 50 days\r\nPlaying role: Bowler\r\nBatting: Left-hand bat\r\nBowling: Slow left-arm orthodox', 1, 2, '2015-02-20 03:20:33', ''),
(19, 'Afsar Zazai', 'Wicket Keeper', '54e6e6d0f02da.jpg', 'Wicketkeeper\r\nAge: 21 years 141 days\r\nBatting: Right-hand bat', 1, 5, '2015-02-20 13:48:32', ''),
(20, 'Aftab Alam', 'Bowling', '54e6e70bcb3cb.jpg', 'Age: 22 years 29 days\r\nBatting: Right-hand bat\r\nBowling: Right-arm medium-fast', 1, 5, '2015-02-20 13:49:31', ''),
(21, 'Asghar Stanikzai', 'Batting', '54e6e7316df37.jpg', 'Age: 27 years 7 days\r\nBatting: Right-hand bat\r\nBowling: Right-arm medium-fast', 1, 5, '2015-02-20 13:50:09', ''),
(22, 'Dawlat Zadran', 'Bowling', '54e6e78411a45.jpg', 'Age: 26 years 285 days\r\nBatting: Right-hand bat\r\nBowling: Right-arm fast-medium', 1, 5, '2015-02-20 13:51:32', ''),
(23, 'Gulbadin Naib', 'All Rounder', '54e6e7a4bb2bf.jpg', 'Age: 23 years 288 days\r\nBatting: Right-hand bat\r\nBowling: Right-arm medium-fast', 1, 5, '2015-02-20 13:52:04', ''),
(24, 'Hamid Hassan', 'All Rounder', '54e6e7f3ec1f0.jpg', 'Age: 27 years 211 days\r\nBatting: Right-hand bat\r\nBowling: Right-arm fast', 1, 5, '2015-02-20 13:53:23', ''),
(25, 'Javed Ahmadi', 'Batting', '54e6e828d3ccc.jpg', 'Age: 22 years 361 days\r\nBatting: Right-hand bat\r\nBowling: Right-arm offbreak', 1, 5, '2015-02-20 13:54:16', ''),
(26, 'Mirwais Ashraf', 'Bowling', '54e6e8560fc8e.jpg', 'Age: 26 years 182 days\r\nBatting: Right-hand bat\r\nBowling: Right-arm fast-medium', 1, 5, '2015-02-20 13:55:02', ''),
(27, 'Mohammad Nabi', 'All Rounder', '54e6e873ce8f0.jpg', 'Captain\r\nAge: 29 years 362 days\r\nBatting: Right-hand bat\r\nBowling: Right-arm offbreak', 1, 5, '2015-02-20 13:55:31', ''),
(28, 'Najibullah Zadran', 'Batting', '54e6e89c48945.jpg', 'Age: 21 years 304 days\r\nBatting: Left-hand bat\r\nBowling: Right-arm offbreak', 1, 5, '2015-02-20 13:56:12', ''),
(29, 'Nasir Jamal', 'Batting', '54e6e91250ae0.jpg', 'Age: 21 years 8 days\r\nBatting: Right-hand bat\r\nBowling: Legbreak googly', 1, 5, '2015-02-20 13:58:10', ''),
(30, 'Nawroz Mangal', 'Batting', '54e6e93976d28.jpg', 'Age: 30 years 167 days\r\nBatting: Right-hand bat\r\nBowling: Right-arm offbreak', 1, 5, '2015-02-20 13:58:49', ''),
(31, 'Samiullah Shenwari', 'Batting', '54e6e98e55935.jpg', 'Age: 27 years 329 days\r\nBatting: Right-hand bat\r\nBowling: Legbreak', 1, 5, '2015-02-20 14:00:14', ''),
(32, 'Shapoor Zadran', 'Bowling', '54e6e9c9c9568.jpg', 'Age: 27 years 174 days\r\nBatting: Left-hand bat\r\nBowling: Left-arm fast-medium', 1, 5, '2015-02-20 14:01:13', ''),
(33, 'Usman Ghani', 'Batting', '54e6e9de5e6a4.jpg', 'Age: 18 years 39 days\r\nBatting: Right-hand bat', 1, 5, '2015-02-20 14:01:34', ''),
(34, 'Al-Amin hossain', 'Bowling', '54e6ea5586b95.jpg', 'Age: 25 years 3 days\r\nBatting: Right-hand bat\r\nBowling: Right-arm medium-fast', 1, 3, '2015-02-20 14:03:33', ''),
(35, 'Anamul Haque', 'Wicket Keeper', '54e6ea8f81321.jpg', 'Age: 22 years 19 days\r\nPlaying role: Wicketkeeper\r\nBatting: Right-hand bat', 1, 3, '2015-02-20 14:04:31', ''),
(36, 'Arafat Sunny', 'Bowling', '54e6eac51fda4.jpg', 'Age: 28 years 97 days\r\nBatting: Left-hand bat\r\nBowling: Slow left-arm orthodox', 1, 3, '2015-02-20 14:05:25', ''),
(37, 'Mahmudullah', 'All Rounder', '54e6ead99a850.jpg', 'Age: 28 years 334 days\r\nPlaying role: Allrounder\r\nBatting: Right-hand bat\r\nBowling: Right-arm offbreak', 1, 3, '2015-02-20 14:05:45', ''),
(38, 'Mashrafe Mortaza', 'Bowling', '54e6eaf03a801.jpg', 'Captain\r\nAge: 31 years 91 days\r\nBatting: Right-hand bat\r\nBowling: Right-arm fast-medium', 1, 3, '2015-02-20 14:06:08', ''),
(39, 'Mominul Haque', 'Batting', '54e6eb4db0b42.jpg', 'Age: 23 years 97 days\r\nBatting: Left-hand bat\r\nBowling: Slow left-arm orthodox', 1, 3, '2015-02-20 14:07:41', ''),
(40, 'Mushfiqur Rahim', 'Wicket Keeper', '54e6eb6193d7c.jpg', 'Wicketkeeper\r\nAge: 26 years 125 days\r\nPlaying role: Wicketkeeper batsman\r\nBatting: Right-hand bat', 1, 3, '2015-02-20 14:08:01', ''),
(41, 'Nasir Hossain', 'All Rounder', '54e6eb931fc2e.jpg', 'Age: 23 years 35 days\r\nBatting: Right-hand bat\r\nBowling: Right-arm offbreak', 1, 3, '2015-02-20 14:08:51', ''),
(42, 'Rubel Hossain', 'Bowling', '54e6ebaa3d738.jpg', 'Age: 25 years 3 days\r\nPlaying role: Bowler\r\nBatting: Right-hand bat\r\nBowling: Right-arm medium-fast', 1, 3, '2015-02-20 14:09:14', ''),
(43, 'Sabbir Rahman', 'Batting', '54e6ec3ca4ba2.jpg', 'Age: 23 years 43 days\r\nBatting: Right-hand bat\r\nBowling: Legbreak', 1, 3, '2015-02-20 14:11:40', ''),
(44, 'Shakib Al Hasan', 'All Rounder', '54e6ecb990420.jpg', 'Age: 27 years 286 days\r\nPlaying role: Allrounder\r\nBatting: Left-hand bat\r\nBowling: Slow left-arm orthodox', 1, 3, '2015-02-20 14:13:45', ''),
(45, 'Soumya Sarkar', 'All Rounder', '54e6ecdd4acd8.jpg', 'Age: 21 years 313 days\r\nBatting: Left-hand bat\r\nBowling: Right-arm medium-fast', 1, 3, '2015-02-20 14:14:21', ''),
(46, 'Taijul Islam', 'Bowling', '54e6ed119c8d8.jpg', 'Age: 22 years 331 days\r\nBatting: Left-hand bat\r\nBowling: Slow left-arm orthodox', 1, 3, '2015-02-20 14:15:13', ''),
(47, 'Tamim Iqbal', 'Batting', '54e6ed2036c0d.jpg', 'Age: 25 years 290 days\r\nPlaying role: Opening batsman\r\nBatting: Left-hand bat', 1, 3, '2015-02-20 14:15:28', ''),
(48, 'Taskin Ahmed', 'Bowling', '54e6ed5a96dd3.jpg', 'Age: 19 years 276 days\r\nBatting: Left-hand bat\r\nBowling: Right-arm fast-medium', 1, 3, '2015-02-20 14:16:26', '');

-- --------------------------------------------------------

--
-- Table structure for table `player_scores`
--

CREATE TABLE IF NOT EXISTS `player_scores` (
  `player_score_id` int(11) NOT NULL AUTO_INCREMENT,
  `match_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `entry_date_time` datetime NOT NULL,
  PRIMARY KEY (`player_score_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

--
-- Dumping data for table `player_scores`
--

INSERT INTO `player_scores` (`player_score_id`, `match_id`, `player_id`, `score`, `entry_date_time`) VALUES
(1, 1, 1, 500, '2015-02-21 03:06:05'),
(2, 1, 2, 10, '2015-02-21 03:06:05'),
(3, 1, 3, 100, '2015-02-21 03:06:05'),
(4, 1, 4, 50, '2015-02-21 03:06:05'),
(5, 1, 5, 0, '2015-02-21 03:06:05'),
(6, 1, 6, 0, '2015-02-21 03:06:05'),
(7, 1, 7, 0, '2015-02-21 03:06:05'),
(8, 1, 8, 0, '2015-02-21 03:06:05'),
(9, 1, 9, 0, '2015-02-21 03:06:05'),
(10, 1, 10, 0, '2015-02-21 03:06:05'),
(11, 1, 11, 0, '2015-02-21 03:06:05'),
(12, 1, 12, 0, '2015-02-21 03:06:05'),
(13, 1, 13, 0, '2015-02-21 03:06:05'),
(14, 1, 14, 0, '2015-02-21 03:06:05'),
(15, 1, 18, 0, '2015-02-21 03:06:05'),
(16, 1, 34, 0, '2015-02-21 03:06:05'),
(17, 1, 35, 0, '2015-02-21 03:06:05'),
(18, 1, 36, 0, '2015-02-21 03:06:05'),
(19, 1, 37, 0, '2015-02-21 03:06:05'),
(20, 1, 38, 0, '2015-02-21 03:06:05'),
(21, 1, 39, 0, '2015-02-21 03:06:05'),
(22, 1, 40, 0, '2015-02-21 03:06:05'),
(23, 1, 41, 0, '2015-02-21 03:06:05'),
(24, 1, 42, 0, '2015-02-21 03:06:05'),
(25, 1, 43, 0, '2015-02-21 03:06:05'),
(26, 1, 44, 100, '2015-02-21 03:06:05'),
(27, 1, 45, 0, '2015-02-21 03:06:05'),
(28, 1, 46, 0, '2015-02-21 03:06:05'),
(29, 1, 47, 0, '2015-02-21 03:06:05'),
(30, 1, 48, 0, '2015-02-21 03:06:05'),
(31, 2, 34, 100, '2015-02-21 03:07:13'),
(32, 2, 35, 50, '2015-02-21 03:07:13'),
(33, 2, 36, 0, '2015-02-21 03:07:13'),
(34, 2, 37, 10, '2015-02-21 03:07:13'),
(35, 2, 38, 0, '2015-02-21 03:07:13'),
(36, 2, 39, 0, '2015-02-21 03:07:13'),
(37, 2, 40, 0, '2015-02-21 03:07:13'),
(38, 2, 41, 0, '2015-02-21 03:07:13'),
(39, 2, 42, 0, '2015-02-21 03:07:13'),
(40, 2, 43, 0, '2015-02-21 03:07:13'),
(41, 2, 44, 0, '2015-02-21 03:07:13'),
(42, 2, 45, 0, '2015-02-21 03:07:13'),
(43, 2, 46, 0, '2015-02-21 03:07:13'),
(44, 2, 47, 0, '2015-02-21 03:07:13'),
(45, 2, 48, 0, '2015-02-21 03:07:13'),
(46, 2, 19, 0, '2015-02-21 03:07:13'),
(47, 2, 20, 0, '2015-02-21 03:07:13'),
(48, 2, 21, 0, '2015-02-21 03:07:13'),
(49, 2, 22, 0, '2015-02-21 03:07:13'),
(50, 2, 23, 0, '2015-02-21 03:07:13'),
(51, 2, 24, 0, '2015-02-21 03:07:13'),
(52, 2, 25, 0, '2015-02-21 03:07:13'),
(53, 2, 26, 0, '2015-02-21 03:07:13'),
(54, 2, 27, 0, '2015-02-21 03:07:13'),
(55, 2, 28, 0, '2015-02-21 03:07:13'),
(56, 2, 29, 0, '2015-02-21 03:07:13'),
(57, 2, 30, 0, '2015-02-21 03:07:13'),
(58, 2, 31, 0, '2015-02-21 03:07:13'),
(59, 2, 32, 0, '2015-02-21 03:07:13'),
(60, 2, 33, 0, '2015-02-21 03:07:13'),
(61, 3, 19, 0, '2015-02-21 03:07:41'),
(62, 3, 20, 0, '2015-02-21 03:07:41'),
(63, 3, 21, 0, '2015-02-21 03:07:41'),
(64, 3, 22, 0, '2015-02-21 03:07:41'),
(65, 3, 23, 0, '2015-02-21 03:07:41'),
(66, 3, 24, 0, '2015-02-21 03:07:41'),
(67, 3, 25, 0, '2015-02-21 03:07:41'),
(68, 3, 26, 0, '2015-02-21 03:07:41'),
(69, 3, 27, 0, '2015-02-21 03:07:41'),
(70, 3, 28, 0, '2015-02-21 03:07:41'),
(71, 3, 29, 0, '2015-02-21 03:07:41'),
(72, 3, 30, 0, '2015-02-21 03:07:41'),
(73, 3, 31, 0, '2015-02-21 03:07:41'),
(74, 3, 32, 0, '2015-02-21 03:07:41'),
(75, 3, 33, 0, '2015-02-21 03:07:41'),
(76, 3, 1, 0, '2015-02-21 03:07:41'),
(77, 3, 2, 0, '2015-02-21 03:07:41'),
(78, 3, 3, 0, '2015-02-21 03:07:41'),
(79, 3, 4, 0, '2015-02-21 03:07:41'),
(80, 3, 5, 0, '2015-02-21 03:07:41'),
(81, 3, 6, 0, '2015-02-21 03:07:41'),
(82, 3, 7, 0, '2015-02-21 03:07:41'),
(83, 3, 8, 0, '2015-02-21 03:07:41'),
(84, 3, 9, 0, '2015-02-21 03:07:41'),
(85, 3, 10, 0, '2015-02-21 03:07:41'),
(86, 3, 11, 0, '2015-02-21 03:07:41'),
(87, 3, 12, 0, '2015-02-21 03:07:41'),
(88, 3, 13, 0, '2015-02-21 03:07:41'),
(89, 3, 14, 0, '2015-02-21 03:07:41'),
(90, 3, 18, 0, '2015-02-21 03:07:41');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE IF NOT EXISTS `sponsors` (
  `sponsor_id` int(11) NOT NULL AUTO_INCREMENT,
  `sponsor_name` varchar(128) NOT NULL,
  `sponsor_logo` varchar(128) DEFAULT NULL,
  `entry_date_time` datetime NOT NULL,
  PRIMARY KEY (`sponsor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`sponsor_id`, `sponsor_name`, `sponsor_logo`, `entry_date_time`) VALUES
(1, 'Nokia', '54f7440f637eb.png', '2015-03-04 23:42:39'),
(3, 'Airtel', '54f7444ff0202.png', '2015-03-04 23:43:43'),
(4, 'Grameen Phone', '54f74473c05d8.jpg', '2015-03-04 23:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `team_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_name` varchar(32) NOT NULL,
  `team_logo` varchar(128) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`team_id`, `team_name`, `team_logo`, `date_time`) VALUES
(2, 'Australia', '54e619d69741b.png', '2015-02-19 23:13:58'),
(3, 'Bangladesh', '54e619dd91137.png', '2015-02-19 23:14:05'),
(4, 'England', '54e637a4b4ac8.png', '2015-02-20 01:21:08'),
(5, 'Afghanistan', '54e6e69bdbf58.png', '2015-02-20 13:47:39');

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE IF NOT EXISTS `user_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `contact` varchar(32) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email_en` varchar(128) NOT NULL,
  `password_en` varchar(128) NOT NULL,
  `user_date_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`id`, `name`, `contact`, `age`, `gender`, `email`, `password`, `email_en`, `password_en`, `user_date_time`) VALUES
(2, 'JohnX', '12345678901', 24, 'male', 'a@a.com', '123456', 'd10ca8d11301c2f4993ac2279ce4b930', 'e10adc3949ba59abbe56e057f20f883e', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `user_matches`
--

CREATE TABLE IF NOT EXISTS `user_matches` (
  `user_match_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_match_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_matches`
--

INSERT INTO `user_matches` (`user_match_id`, `user_id`, `match_id`, `score`) VALUES
(4, 2, 1, 610);

-- --------------------------------------------------------

--
-- Table structure for table `user_teams`
--

CREATE TABLE IF NOT EXISTS `user_teams` (
  `user_team_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  PRIMARY KEY (`user_team_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `user_teams`
--

INSERT INTO `user_teams` (`user_team_id`, `user_id`, `match_id`, `player_id`) VALUES
(29, 2, 1, 1),
(30, 2, 1, 2),
(31, 2, 1, 5),
(32, 2, 1, 6),
(33, 2, 1, 9),
(34, 2, 1, 38),
(35, 2, 1, 34),
(36, 2, 1, 13),
(37, 2, 1, 40),
(38, 2, 1, 44),
(39, 2, 1, 47);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
