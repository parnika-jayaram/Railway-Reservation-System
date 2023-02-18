-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2022 at 04:45 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `railway`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `total_seats_in` ()   BEGIN
SELECT TRAIN_ID,SOURCE,DESTINATION,arrival_time,departure_time,COUNT(*) AS TOTAL_SEATS FROM books_ticket_for GROUP BY(TRAIN_ID);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `books_ticket_for`
--

CREATE TABLE `books_ticket_for` (
  `ticket_id` bigint(11) NOT NULL,
  `tdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_name` varchar(100) NOT NULL,
  `pass_name` varchar(100) NOT NULL,
  `TRAIN_ID` varchar(7) NOT NULL,
  `SOURCE` varchar(100) NOT NULL,
  `DESTINATION` varchar(100) NOT NULL,
  `coach_name` varchar(100) NOT NULL,
  `Fare` int(4) NOT NULL,
  `arrival_time` varchar(100) NOT NULL,
  `departure_time` varchar(100) NOT NULL,
  `total_time` varchar(5) NOT NULL,
  `pid` bigint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books_ticket_for`
--

INSERT INTO `books_ticket_for` (`ticket_id`, `tdate`, `user_name`, `pass_name`, `TRAIN_ID`, `SOURCE`, `DESTINATION`, `coach_name`, `Fare`, `arrival_time`, `departure_time`, `total_time`, `pid`) VALUES
(28, '2022-09-07 05:43:41', 'Krish', 'subbu', 'T-11302', 'KSR_BENGALURU', 'MUMBAI_CENTRAL_MMCT', 'PD', 520, '20:40', '20:15', '20:35', 10),
(29, '2022-09-07 05:43:50', 'Krish', 'Parnika', 'T-11302', 'KSR_BENGALURU', 'MUMBAI_CENTRAL_MMCT', 'General', 530, '20:40', '20:15', '20:35', 11),
(41, '2022-09-07 06:24:48', 'Vidya', 'Virat', 'T-11302', 'KSR_BENGALURU', 'MUMBAI_CENTRAL_MMCT', 'General', 530, '20:40', '20:15', '20:35', 15),
(42, '2022-09-08 01:32:38', 'Vidya', 'Anu', 'T-11302', 'KSR_BENGALURU', 'MUMBAI_CENTRAL_MMCT', 'General', 530, '20:40', '20:15', '20:35', 16),
(43, '2022-09-09 09:50:15', 'Jayram', 'Seeta', 'T-12163', 'MUMBAI_CENTRAL_MMCT', 'CHENNAI_EGMORE', 'General', 590, '18:45', '16:20', '21:35', 18),
(46, '2022-09-10 04:00:04', 'Kriti', 'Nissanka', 'T-12985', 'JAIPUR_JP', 'NEW_DELHI_NPIS', 'PD', 240, '06:00', '10:25', '04:25', 20),
(47, '2022-09-13 01:10:00', 'Krish', 'Avani', 'T-11302', 'KSR_BENGALURU', 'MUMBAI_CENTRAL_MMCT', 'General', 530, '20:40', '20:15', '20:35', 17),
(48, '2022-09-13 01:13:17', 'Jayram', 'Lav', 'T-11302', 'KSR_BENGALURU', 'MUMBAI_CENTRAL_MMCT', 'General', 530, '20:40', '20:15', '20:35', 21),
(49, '2022-09-13 02:14:13', 'Jayram', 'Kush', 'T-11302', 'KSR_BENGALURU', 'MUMBAI_CENTRAL_MMCT', 'General', 530, '20:40', '20:15', '20:35', 22);

-- --------------------------------------------------------

--
-- Table structure for table `coach`
--

CREATE TABLE `coach` (
  `coach_id` int(4) NOT NULL,
  `coach_name` varchar(25) NOT NULL,
  `coach_fare` int(4) NOT NULL,
  `train_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coach`
--

INSERT INTO `coach` (`coach_id`, `coach_name`, `coach_fare`, `train_id`) VALUES
(1, 'PD', 520, 'T-11302'),
(2, 'General', 530, 'T-11302'),
(3, 'SEN', 520, 'T-11302'),
(4, 'PD', 580, 'T-12163'),
(5, 'General', 590, 'T-12163'),
(6, 'SEN', 580, 'T-12163'),
(7, 'PD', 240, 'T-12985'),
(8, 'General', 250, 'T-12985'),
(9, 'SEN', 240, 'T-12985'),
(10, 'PD', 1975, 'T-12967'),
(11, 'General', 1985, 'T-12967'),
(12, 'SEN', 1975, 'T-12967'),
(13, 'PD', 850, 'T-22691'),
(14, 'General', 860, 'T-22691'),
(15, 'SEN', 850, 'T-22691');

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE `passengers` (
  `id` bigint(20) NOT NULL,
  `pass_name` varchar(100) NOT NULL,
  `pfirst_name` varchar(100) NOT NULL,
  `plast_name` varchar(100) NOT NULL,
  `pdob` date NOT NULL,
  `pemail` varchar(100) NOT NULL,
  `paddress` varchar(100) NOT NULL,
  `pass_phone` int(10) NOT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `PD` varchar(1) NOT NULL,
  `pass_id` bigint(20) NOT NULL,
  `user_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passengers`
--

INSERT INTO `passengers` (`id`, `pass_name`, `pfirst_name`, `plast_name`, `pdob`, `pemail`, `paddress`, `pass_phone`, `gender`, `PD`, `pass_id`, `user_name`) VALUES
(10, 'subbu', 'Shubash', 'J', '1998-01-01', 'shub@email.com', 'Bengaluru', 2147483647, 'M', 'Y', 302277921657414081, 'Krish'),
(11, 'Parnika', 'Parnika', 'J', '2017-01-01', 'p@email.com', 'Bengaluru', 1234567890, 'F', 'N', 33581, 'Krish'),
(15, 'Virat', 'VIRAT', 'K', '2000-10-01', 'virat@email.com', 'Delhi', 809008090, 'M', 'N', 39964, 'Vidya'),
(16, 'Anu', 'ANU', 'S', '1983-01-01', 'anu@email.com', 'Belgavi', 2147483647, 'F', 'N', 734649006137312, 'Vidya'),
(17, 'Avani', 'AVANI', 'D', '2001-01-01', 'Avani@email.com', 'Bengaluru', 1111111111, 'F', 'N', 1210242626879827181, 'Krish'),
(18, 'Seeta', 'SEETA', 'J', '1992-02-01', 'seeta@email.com', 'Noida', 2147483647, 'F', 'N', 3993642, 'Jayram'),
(20, 'Nissanka', 'NISSANKA', 'A', '1996-03-06', 'nissanka@email.com', 'Delhi', 2147483647, 'M', 'Y', 9748311, 'Kriti'),
(21, 'Lav', 'LAV', 'Ram', '2018-09-15', 'luv@email.com', 'Prayagraj', 2147483647, 'M', 'N', 3066, 'Jayram'),
(22, 'Kush', 'KUSH', 'J', '2018-09-16', 'kush@email.com', 'Prayagraj', 2147483647, 'M', 'N', 78721567502236, 'Jayram');

--
-- Triggers `passengers`
--
DELIMITER $$
CREATE TRIGGER `up_pfirst_name` BEFORE INSERT ON `passengers` FOR EACH ROW BEGIN
SET NEW.pfirst_name=UPPER(NEW.pfirst_name);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `TRAIN_ID` varchar(7) NOT NULL,
  `TNAME` varchar(25) DEFAULT NULL,
  `SOURCE` varchar(25) DEFAULT NULL,
  `DESTINATION` varchar(25) DEFAULT NULL,
  `ARRIVAL_T` varchar(5) DEFAULT NULL,
  `DEPART_T` varchar(5) DEFAULT NULL,
  `TOTAL_TIME` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`TRAIN_ID`, `TNAME`, `SOURCE`, `DESTINATION`, `ARRIVAL_T`, `DEPART_T`, `TOTAL_TIME`) VALUES
('T-11302', 'UDYAN_EXPRESS', 'KSR_BENGALURU', 'MUMBAI_CENTRAL_MMCT', '20:40', '20:15', '20:35'),
('T-12163', 'LTI_MAS_EXPRESS', 'MUMBAI_CENTRAL_MMCT', 'CHENNAI_EGMORE', '18:45', '16:20', '21:35'),
('T-12967', 'MAS_JAIPUR_EXPRESS', 'MUMBAI_CENTRAL_MMCT', 'JAIPUR_JP', '17:40', '6:45', '37:05'),
('T-12985', 'DOUBLE_DECKER_EXPRESS', 'JAIPUR_JP', 'NEW_DELHI_NPIS', '06:00', '10:25', '04:25'),
('T-22691', 'RAJDHANI_EXPRESS', 'KSR_BENGALURU', 'NEW_DELHI_NPIS', '20:00', '05:30', '33:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_proof` varchar(25) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `user_id` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `id_proof`, `first_name`, `last_name`, `dob`, `email`, `address`, `phone`, `gender`, `user_id`) VALUES
(13, 'Krish', '1234', 'Pan Card', 'Krishna', 'N', '1998/10/01', 'krish@email.com', 'tony house 1', '9123456789', 'M', 74512676659),
(14, 'Vidya', '1234', 'Pan Card', 'Vidya', 'V', '2000/01/01', 'v@gmail.com', 'Mysore', '999999999', 'F', 203239232758814811),
(17, 'Jayram', '1234', 'Adhar Card', 'Jayram', 'J', '1992/02/01', 'jay@email.com', 'Mumbai', '9876123400', 'M', 1088082535386),
(18, 'Kriti', '1234', 'Pan Card', 'Kriti', 'Stark', '2003/01/01', 'kriti@email.com', 'Mysore', '2314765809', 'F', 7666033786519360);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books_ticket_for`
--
ALTER TABLE `books_ticket_for`
  ADD PRIMARY KEY (`ticket_id`),
  ADD UNIQUE KEY `pass_name` (`pass_name`),
  ADD KEY `pid` (`pid`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `TRAIN_ID` (`TRAIN_ID`);

--
-- Indexes for table `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`coach_id`),
  ADD KEY `train_id` (`train_id`);

--
-- Indexes for table `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pass_name` (`pass_name`),
  ADD KEY `user_name` (`user_name`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`TRAIN_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name_2` (`user_name`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books_ticket_for`
--
ALTER TABLE `books_ticket_for`
  MODIFY `ticket_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `passengers`
--
ALTER TABLE `passengers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books_ticket_for`
--
ALTER TABLE `books_ticket_for`
  ADD CONSTRAINT `books_ticket_for_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `passengers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `books_ticket_for_ibfk_2` FOREIGN KEY (`user_name`) REFERENCES `users` (`user_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_ticket_for_ibfk_3` FOREIGN KEY (`TRAIN_ID`) REFERENCES `train` (`TRAIN_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `coach`
--
ALTER TABLE `coach`
  ADD CONSTRAINT `coach_ibfk_1` FOREIGN KEY (`train_id`) REFERENCES `train` (`TRAIN_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `passengers`
--
ALTER TABLE `passengers`
  ADD CONSTRAINT `passengers_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `users` (`user_name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
