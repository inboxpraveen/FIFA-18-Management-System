-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 09, 2018 at 06:23 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fifa`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `SearchAge`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SearchAge` (IN `page` INT(11))  SELECT player_name,age,overall_rating,nationality FROM personal_details WHERE personal_details.age = page$$

DROP PROCEDURE IF EXISTS `SearchName`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SearchName` (IN `page` VARCHAR(30))  SELECT * FROM personal_details WHERE player_name = page$$

DROP PROCEDURE IF EXISTS `SearchNationality`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SearchNationality` (IN `page` VARCHAR(30))  SELECT * FROM personal_details WHERE nationality=page$$

DROP PROCEDURE IF EXISTS `SearchOverallRating`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SearchOverallRating` (IN `page` INT(11))  SELECT * FROM personal_details WHERE personal_details.overall_rating = page$$

DROP PROCEDURE IF EXISTS `Searchplayerid`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Searchplayerid` (IN `page` INT(11))  SELECT * FROM personal_details WHERE player_id = page$$

DROP PROCEDURE IF EXISTS `SearchPosition`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SearchPosition` (IN `page` VARCHAR(11))  SELECT pd.player_name, pd.overall_rating, od.preferred_position, p.gk, p.df, p.cm, p.fr FROM personal_details pd, other_details od, position p WHERE od.preferred_position = page AND p.player_id = od.player_id AND p.player_id = pd.player_id GROUP BY pd.player_id$$

DROP PROCEDURE IF EXISTS `SearchTeam`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SearchTeam` (IN `page` VARCHAR(30))  SELECT pd.player_name,pd.overall_rating,pd.age,pd.nationality,od.club FROM personal_details pd,other_details od WHERE od.club = page AND pd.player_id = od.player_id ORDER BY pd.player_id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `delete_logs`
--

DROP TABLE IF EXISTS `delete_logs`;
CREATE TABLE IF NOT EXISTS `delete_logs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `action` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` timestamp NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delete_logs`
--

INSERT INTO `delete_logs` (`id`, `action`, `time`) VALUES
(8, 'Deleted Successfully in PERSONAL DETAILS Table', '2018-12-02 13:26:45'),
(9, 'Deleted Successfully in PERSONAL DETAILS Table', '2018-12-03 10:05:10'),
(10, 'Deleted Successfully in PERSONAL DETAILS Table', '2018-12-07 20:30:46'),
(11, 'Deleted Successfully in PERSONAL DETAILS Table', '2018-12-08 19:34:11'),
(12, 'Deleted Successfully in PERSONAL DETAILS Table', '2018-12-08 19:34:29'),
(13, 'Deleted Successfully in PERSONAL DETAILS Table', '2018-12-08 19:34:29'),
(14, 'Deleted Successfully in PERSONAL DETAILS Table', '2018-12-09 07:36:37'),
(15, 'Deleted Successfully in PERSONAL DETAILS Table', '2018-12-09 07:44:33'),
(16, 'Deleted Successfully in PLAYER CLUB\'S Table', '2018-12-09 08:13:36'),
(17, 'Deleted Successfully in PLAYER CLUB\'S Table', '2018-12-09 08:20:21'),
(18, 'Deleted Successfully in PLAYER\'S POSITION Table', '2018-12-09 08:26:29'),
(19, 'Deleted Successfully in PLAYER\'S SALARY Table', '2018-12-09 10:03:03'),
(20, 'Deleted Successfully in PLAYER\'S POSITION Table', '2018-12-09 10:03:42'),
(21, 'Deleted Successfully in PLAYER STATS Table', '2018-12-09 10:18:02'),
(22, 'Deleted Successfully in PLAYER STATS Table', '2018-12-09 10:53:38'),
(23, 'Deleted Successfully in PERSONAL DETAILS Table', '2018-12-09 11:03:31'),
(24, 'Deleted Successfully in PERSONAL DETAILS Table', '2018-12-09 15:17:18'),
(25, 'Deleted Successfully in PERSONAL DETAILS Table', '2018-12-09 16:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `insert_logs`
--

DROP TABLE IF EXISTS `insert_logs`;
CREATE TABLE IF NOT EXISTS `insert_logs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `action` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` timestamp NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insert_logs`
--

INSERT INTO `insert_logs` (`id`, `action`, `time`) VALUES
(6, 'Inserted Successfully in PERSONAL DETAILS Table', '2018-12-02 13:24:27'),
(7, 'Inserted Successfully in PERSONAL DETAILS Table', '2018-12-03 10:04:37'),
(8, 'Inserted Successfully in PERSONAL DETAILS Table', '2018-12-07 20:30:34'),
(9, 'Inserted Successfully in PERSONAL DETAILS Table', '2018-12-08 17:11:38'),
(10, 'Inserted Successfully in PERSONAL DETAILS Table', '2018-12-08 19:01:40'),
(11, 'Inserted Successfully in PERSONAL DETAILS Table', '2018-12-08 19:02:55'),
(12, 'Inserted Successfully in PERSONAL DETAILS Table', '2018-12-09 07:31:53'),
(13, 'Inserted Successfully in PERSONAL DETAILS Table', '2018-12-09 07:37:05'),
(14, 'Inserted Successfully in PERSONAL DETAILS Table', '2018-12-09 08:09:09'),
(15, 'Inserted Successfully in PLAYER CLUB\'S Table', '2018-12-09 08:09:31'),
(22, 'Inserted Successfully in PLAYER STATS Table', '2018-12-09 08:12:05'),
(23, 'Inserted Successfully in PLAYER\'S POSITION Table', '2018-12-09 08:12:18'),
(24, 'Inserted Successfully in PLAYER SALARY Table', '2018-12-09 08:12:29'),
(25, 'Inserted Successfully in PLAYER CLUB\'S Table', '2018-12-09 08:14:08'),
(26, 'Inserted Successfully in PLAYER\'S POSITION Table', '2018-12-09 08:26:45'),
(27, 'Inserted Successfully in PLAYER STATS Table', '2018-12-09 10:18:30'),
(28, 'Inserted Successfully in PERSONAL DETAILS Table', '2018-12-09 15:15:06'),
(29, 'Inserted Successfully in PERSONAL DETAILS Table', '2018-12-09 15:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `other_details`
--

DROP TABLE IF EXISTS `other_details`;
CREATE TABLE IF NOT EXISTS `other_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `player_id` int(11) NOT NULL,
  `club` char(30) DEFAULT NULL,
  `preferred_position` char(20) DEFAULT NULL,
  PRIMARY KEY (`player_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other_details`
--

INSERT INTO `other_details` (`id`, `player_id`, `club`, `preferred_position`) VALUES
(19, 1179, 'Juventus', 'GK'),
(1, 20801, 'Real Madrid CF', 'LW'),
(18, 138956, 'Juventus', 'CB'),
(17, 153079, 'Manchester City', 'ST'),
(11, 155862, 'Real Madrid CF', 'CB'),
(2, 158023, 'FC Barcelona', 'RW'),
(5, 167495, 'FC Bayern Munich', 'GK'),
(10, 167664, 'Juventus', 'ST'),
(16, 173731, 'Real Madrid CF', 'RW'),
(4, 176580, 'FC Barcelona', 'ST'),
(15, 177003, 'Real Madrid CF', 'CM'),
(9, 182521, 'Real Madrid CF', 'CM'),
(8, 183277, 'Chelsea', 'LW'),
(14, 184941, 'Arsenal', 'LW'),
(6, 188545, 'FC Bayern Munich', 'ST'),
(3, 190871, 'Paris Saint-Germain', 'LW'),
(13, 192119, 'Chelsea', 'GK'),
(12, 192985, 'Manchester City', 'RM'),
(7, 193080, 'Manchester United', 'GK'),
(20, 211110, 'Juventus', 'RW');

--
-- Triggers `other_details`
--
DROP TRIGGER IF EXISTS `delete_in_otherdetails`;
DELIMITER $$
CREATE TRIGGER `delete_in_otherdetails` AFTER DELETE ON `other_details` FOR EACH ROW INSERT INTO delete_logs(action,time) VALUES ("Deleted Successfully in PLAYER CLUB'S Table",NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `insert_in_otherdetails`;
DELIMITER $$
CREATE TRIGGER `insert_in_otherdetails` AFTER INSERT ON `other_details` FOR EACH ROW INSERT INTO insert_logs(action,time) VALUES ("Inserted Successfully in PLAYER CLUB'S Table",NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `update_in_otherdetails`;
DELIMITER $$
CREATE TRIGGER `update_in_otherdetails` AFTER UPDATE ON `other_details` FOR EACH ROW INSERT INTO update_logs VALUES(null,"Updated Successfully in CLUB's Table",NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `personal_details`
--

DROP TABLE IF EXISTS `personal_details`;
CREATE TABLE IF NOT EXISTS `personal_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `player_id` int(7) NOT NULL,
  `player_name` char(30) NOT NULL,
  `age` int(2) DEFAULT NULL,
  `overall_rating` int(2) DEFAULT NULL,
  `nationality` char(30) DEFAULT NULL,
  PRIMARY KEY (`player_id`,`player_name`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_details`
--

INSERT INTO `personal_details` (`id`, `player_id`, `player_name`, `age`, `overall_rating`, `nationality`) VALUES
(19, 1179, 'G BUFFON', 39, 89, 'Italy'),
(1, 20801, 'CRISTIANO RONALDO', 32, 94, 'Portugal'),
(18, 138956, 'G CHIELLINI', 32, 89, 'Italy'),
(17, 153079, 'S AGUERO', 29, 89, 'Argentina'),
(11, 155862, 'SERGIO RAMOS', 31, 90, 'Spain'),
(2, 158023, 'LIONEL MESSI', 30, 94, 'Argentina'),
(5, 167495, 'M NEUER', 31, 92, 'Germany'),
(10, 167664, 'G HIGUAIN', 29, 90, 'Argentina'),
(16, 173731, 'G BALE', 27, 89, 'Wales'),
(4, 176580, 'LUIS SUAREZ', 30, 92, 'Uruguay'),
(15, 177003, 'LUKA MODRIC', 31, 89, 'Croatia'),
(9, 182521, 'TONI KROOS', 27, 90, 'Germany'),
(8, 183277, 'EDEN HAZARD', 26, 90, 'Belgium'),
(14, 184941, 'ALEXIS SANCHEZ', 28, 89, 'Chile'),
(6, 188545, 'R LEWANDOWSKI', 28, 91, 'Poland'),
(3, 190871, 'NEYMAR', 25, 92, 'Brazil'),
(13, 192119, 'T COURTOIS', 25, 89, 'Belgium'),
(12, 192985, 'K DE BRUYNE', 26, 89, 'Belgium'),
(7, 193080, 'DE GEA', 26, 90, 'Spain'),
(20, 211110, 'P DYBALA', 23, 88, 'Argentina');

--
-- Triggers `personal_details`
--
DROP TRIGGER IF EXISTS `delete_trigger`;
DELIMITER $$
CREATE TRIGGER `delete_trigger` AFTER DELETE ON `personal_details` FOR EACH ROW INSERT INTO delete_logs(action,time) VALUES ("Deleted Successfully in PERSONAL DETAILS Table",NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `insert_trigger`;
DELIMITER $$
CREATE TRIGGER `insert_trigger` AFTER INSERT ON `personal_details` FOR EACH ROW INSERT INTO insert_logs VALUES (null,"Inserted Successfully in PERSONAL DETAILS Table",NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `update_trigger`;
DELIMITER $$
CREATE TRIGGER `update_trigger` AFTER UPDATE ON `personal_details` FOR EACH ROW INSERT INTO update_logs(action,time) VALUES ("Updated Successfully in PERSONAL DETAILS Table",NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `player_stats`
--

DROP TABLE IF EXISTS `player_stats`;
CREATE TABLE IF NOT EXISTS `player_stats` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `player_id` int(7) NOT NULL,
  `acceleration` int(2) DEFAULT NULL,
  `balance` int(2) DEFAULT NULL,
  `ball_control` int(2) DEFAULT NULL,
  `crossing` int(2) DEFAULT NULL,
  `curve` int(2) DEFAULT NULL,
  `dribbling` int(2) DEFAULT NULL,
  `finishing` int(2) DEFAULT NULL,
  `gk_kicking` int(2) DEFAULT NULL,
  `gk_positioning` int(2) DEFAULT NULL,
  `penalties` int(2) DEFAULT NULL,
  `short_pass` int(2) DEFAULT NULL,
  `stamina` int(2) DEFAULT NULL,
  `strength` int(2) DEFAULT NULL,
  PRIMARY KEY (`player_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `player_stats`
--

INSERT INTO `player_stats` (`id`, `player_id`, `acceleration`, `balance`, `ball_control`, `crossing`, `curve`, `dribbling`, `finishing`, `gk_kicking`, `gk_positioning`, `penalties`, `short_pass`, `stamina`, `strength`) VALUES
(19, 1179, 49, 49, 28, 13, 20, 25, 15, 74, 90, 22, 37, 39, 69),
(1, 20801, 89, 63, 93, 85, 81, 91, 94, 15, 14, 85, 83, 92, 80),
(18, 138956, 68, 64, 57, 58, 60, 58, 33, 2, 4, 50, 59, 68, 91),
(17, 153079, 90, 91, 89, 70, 82, 89, 90, 6, 11, 83, 79, 74, 74),
(11, 155862, 75, 60, 84, 66, 73, 61, 60, 9, 7, 68, 78, 84, 81),
(2, 158023, 92, 95, 95, 77, 89, 97, 95, 15, 14, 74, 88, 73, 59),
(5, 167495, 58, 35, 48, 15, 14, 30, 13, 95, 91, 47, 55, 44, 83),
(10, 167664, 78, 69, 85, 68, 74, 84, 91, 7, 5, 70, 75, 72, 85),
(16, 173731, 93, 65, 87, 87, 86, 89, 87, 11, 5, 76, 86, 76, 80),
(4, 176580, 88, 60, 91, 77, 86, 86, 94, 31, 33, 85, 83, 89, 80),
(15, 177003, 75, 94, 92, 78, 79, 86, 71, 7, 14, 80, 92, 52, 88),
(9, 182521, 60, 69, 89, 85, 85, 79, 76, 13, 7, 73, 90, 77, 74),
(8, 183277, 93, 91, 92, 80, 82, 93, 83, 6, 8, 86, 86, 79, 65),
(14, 184941, 88, 87, 87, 80, 78, 90, 85, 15, 12, 77, 81, 85, 72),
(6, 188545, 79, 80, 89, 62, 77, 85, 91, 12, 8, 81, 83, 79, 84),
(3, 190871, 94, 82, 95, 75, 81, 96, 89, 15, 15, 81, 81, 78, 53),
(13, 192119, 46, 45, 23, 14, 19, 13, 14, 69, 86, 27, 32, 38, 70),
(12, 192985, 76, 75, 87, 90, 83, 85, 83, 5, 10, 77, 90, 87, 73),
(7, 193080, 57, 43, 42, 17, 21, 18, 13, 87, 86, 40, 50, 40, 64),
(20, 211110, 88, 85, 93, 80, 88, 92, 85, 4, 5, 86, 83, 83, 65);

--
-- Triggers `player_stats`
--
DROP TRIGGER IF EXISTS `delete_in_playerstats`;
DELIMITER $$
CREATE TRIGGER `delete_in_playerstats` AFTER DELETE ON `player_stats` FOR EACH ROW INSERT INTO delete_logs(action,time) VALUES ("Deleted Successfully in PLAYER STATS Table",NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `insert_trigger_in_playerstats`;
DELIMITER $$
CREATE TRIGGER `insert_trigger_in_playerstats` AFTER INSERT ON `player_stats` FOR EACH ROW INSERT INTO insert_logs(action,time) VALUES ("Inserted Successfully in PLAYER STATS Table",NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `update_in_player_stats`;
DELIMITER $$
CREATE TRIGGER `update_in_player_stats` AFTER UPDATE ON `player_stats` FOR EACH ROW INSERT INTO update_logs VALUES(null,"Updated Successfully in PLAYER STATS Table",NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

DROP TABLE IF EXISTS `position`;
CREATE TABLE IF NOT EXISTS `position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `player_id` int(11) NOT NULL,
  `gk` int(11) DEFAULT NULL,
  `df` int(11) DEFAULT NULL,
  `cm` int(11) DEFAULT NULL,
  `fr` int(11) DEFAULT NULL,
  PRIMARY KEY (`player_id`),
  UNIQUE KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `player_id`, `gk`, `df`, `cm`, `fr`) VALUES
(19, 1179, 89, 30, 15, 10),
(1, 20801, 13, 26, 82, 94),
(18, 138956, 30, 89, 60, 55),
(17, 153079, 20, 44, 75, 89),
(11, 155862, 23, 89, 74, 70),
(2, 158023, 6, 45, 82, 94),
(5, 167495, 92, 10, 8, 4),
(10, 167664, 12, 46, 71, 89),
(16, 173731, 24, 67, 81, 89),
(4, 176580, 12, 50, 80, 92),
(15, 177003, 30, 72, 89, 83),
(9, 182521, 16, 72, 90, 84),
(8, 183277, 12, 47, 81, 90),
(14, 184941, 20, 56, 79, 89),
(6, 188545, 12, 57, 78, 91),
(3, 190871, 10, 46, 79, 93),
(13, 192119, 89, 20, 15, 10),
(12, 192985, 30, 57, 89, 85),
(7, 193080, 90, 16, 9, 6),
(20, 211110, 26, 43, 78, 88);

--
-- Triggers `position`
--
DROP TRIGGER IF EXISTS `delete_in_position`;
DELIMITER $$
CREATE TRIGGER `delete_in_position` AFTER DELETE ON `position` FOR EACH ROW INSERT INTO delete_logs(action,time) VALUES ("Deleted Successfully in PLAYER'S POSITION Table",NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `insert_in_playerposition`;
DELIMITER $$
CREATE TRIGGER `insert_in_playerposition` AFTER INSERT ON `position` FOR EACH ROW INSERT INTO insert_logs(action,time) VALUES ("Inserted Successfully in PLAYER'S POSITION Table",NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `update_in_position`;
DELIMITER $$
CREATE TRIGGER `update_in_position` AFTER UPDATE ON `position` FOR EACH ROW INSERT INTO update_logs VALUES(null,"Updated Successfully in PLAYER'S POSITION Table",NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

DROP TABLE IF EXISTS `salary`;
CREATE TABLE IF NOT EXISTS `salary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `player_id` int(11) NOT NULL,
  `wage` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  PRIMARY KEY (`player_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `player_id`, `wage`, `value`) VALUES
(19, 1179, 110, 450000),
(1, 20801, 565, 95500000),
(18, 138956, 225, 38000000),
(17, 153079, 325, 6650000),
(11, 155862, 310, 5200000),
(2, 158023, 565, 10500000),
(5, 167495, 230, 6100000),
(10, 167664, 275, 7750000),
(16, 173731, 370, 6950000),
(4, 176580, 510, 9700000),
(15, 177003, 340, 5700000),
(9, 182521, 340, 7900000),
(8, 183277, 290, 9050000),
(14, 184941, 265, 6750000),
(6, 188545, 335, 9200000),
(3, 190871, 280, 12300000),
(13, 192119, 190, 5900000),
(12, 192985, 285, 8300000),
(7, 193080, 215, 6450000),
(20, 211110, 215, 7900000);

--
-- Triggers `salary`
--
DROP TRIGGER IF EXISTS `delete_in_salary`;
DELIMITER $$
CREATE TRIGGER `delete_in_salary` AFTER DELETE ON `salary` FOR EACH ROW INSERT INTO delete_logs(action,time) VALUES ("Deleted Successfully in PLAYER'S SALARY Table",NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `insert_in_salary`;
DELIMITER $$
CREATE TRIGGER `insert_in_salary` AFTER INSERT ON `salary` FOR EACH ROW INSERT INTO insert_logs(action,time) VALUES ("Inserted Successfully in PLAYER SALARY Table",NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `update_in_salary`;
DELIMITER $$
CREATE TRIGGER `update_in_salary` AFTER UPDATE ON `salary` FOR EACH ROW INSERT INTO update_logs VALUES(null,"Updated Successfully in PLAYER SALARY Table",NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `update_logs`
--

DROP TABLE IF EXISTS `update_logs`;
CREATE TABLE IF NOT EXISTS `update_logs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `action` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` timestamp NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `update_logs`
--

INSERT INTO `update_logs` (`id`, `action`, `time`) VALUES
(1, 'Updated Successfully in PERSONAL DETAILS Table', '2018-12-07 20:48:39'),
(2, 'Updated Successfully in PERSONAL DETAILS Table', '2018-12-07 20:50:42'),
(3, 'Updated Successfully in PERSONAL DETAILS Table', '2018-12-08 09:30:19'),
(4, 'Updated Successfully in PERSONAL DETAILS Table', '2018-12-08 19:34:45'),
(5, 'Updated Successfully in PERSONAL DETAILS Table', '2018-12-09 07:41:48'),
(6, 'Updated Successfully in PERSONAL DETAILS Table', '2018-12-09 07:42:03'),
(7, 'Updated Successfully in PERSONAL DETAILS Table', '2018-12-09 07:43:35'),
(8, 'Updated Successfully in PERSONAL DETAILS Table', '2018-12-09 07:44:08'),
(9, 'Updated Successfully in PERSONAL DETAILS Table', '2018-12-09 07:44:23'),
(10, 'Updated Successfully in PERSONAL DETAILS Table', '2018-12-09 07:47:32'),
(11, 'Updated Successfully in PERSONAL DETAILS Table', '2018-12-09 07:47:50'),
(12, 'Updated Successfully in PERSONAL DETAILS Table', '2018-12-09 08:14:47'),
(13, 'Updated Successfully in CLUB\'s Table', '2018-12-09 08:19:48'),
(14, 'Updated Successfully in CLUB\'s Table', '2018-12-09 08:20:00'),
(15, 'Updated Successfully in CLUB\'s Table', '2018-12-09 08:20:12'),
(16, 'Updated Successfully in PLAYER SALARY Table', '2018-12-09 10:01:00'),
(17, 'Updated Successfully in PLAYER SALARY Table', '2018-12-09 10:01:12'),
(18, 'Updated Successfully in PLAYER SALARY Table', '2018-12-09 10:01:18'),
(19, 'Updated Successfully in PLAYER SALARY Table', '2018-12-09 10:02:58'),
(20, 'Updated Successfully in PLAYER\'S POSITION Table', '2018-12-09 10:03:21'),
(21, 'Updated Successfully in PLAYER STATS Table', '2018-12-09 10:16:27'),
(22, 'Updated Successfully in PLAYER STATS Table', '2018-12-09 10:25:04'),
(23, 'Updated Successfully in PLAYER STATS Table', '2018-12-09 10:43:47'),
(24, 'Updated Successfully in PLAYER STATS Table', '2018-12-09 10:44:30'),
(25, 'Updated Successfully in PLAYER STATS Table', '2018-12-09 10:46:45'),
(26, 'Updated Successfully in PLAYER STATS Table', '2018-12-09 10:46:52'),
(27, 'Updated Successfully in PLAYER STATS Table', '2018-12-09 10:49:37'),
(28, 'Updated Successfully in PLAYER STATS Table', '2018-12-09 10:52:48'),
(29, 'Updated Successfully in PERSONAL DETAILS Table', '2018-12-09 11:03:29'),
(30, 'Updated Successfully in PLAYER\'S POSITION Table', '2018-12-09 13:31:53'),
(31, 'Updated Successfully in PLAYER\'S POSITION Table', '2018-12-09 13:31:59'),
(32, 'Updated Successfully in PERSONAL DETAILS Table', '2018-12-09 15:16:34');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `other_details`
--
ALTER TABLE `other_details`
  ADD CONSTRAINT `other_details_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `personal_details` (`player_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `player_stats`
--
ALTER TABLE `player_stats`
  ADD CONSTRAINT `player_stats_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `personal_details` (`player_id`) ON DELETE CASCADE;

--
-- Constraints for table `position`
--
ALTER TABLE `position`
  ADD CONSTRAINT `position_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `personal_details` (`player_id`) ON DELETE CASCADE;

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `personal_details` (`player_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
