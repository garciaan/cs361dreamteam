-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 28, 2015 at 01:36 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wordpress`
--

-- --------------------------------------------------------

--
-- Table structure for table `mentor_career`
--

CREATE TABLE `mentor_career` (
  `mc_ID` int(11) NOT NULL,
  `mentor_ID` int(11) NOT NULL,
  `mentee_ID` int(11) NOT NULL,
  `career_ID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentor_career`
--

INSERT INTO `mentor_career` (`mc_ID`, `mentor_ID`, `mentee_ID`, `career_ID`) VALUES
(1, 4, 0, 100),
(2, 5, 0, 101),
(3, 5, 0, 104),
(4, 5, 0, 105),
(5, 6, 0, 103),
(6, 7, 0, 102),
(7, 7, 0, 106),
(8, 8, 0, 104),
(9, 9, 0, 105),
(10, 0, 1, 105);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mentor_career`
--
ALTER TABLE `mentor_career`
  ADD PRIMARY KEY (`mc_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mentor_career`
--
ALTER TABLE `mentor_career`
  MODIFY `mc_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
