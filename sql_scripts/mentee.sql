-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 28, 2015 at 01:34 AM
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
-- Table structure for table `mentee`
--

CREATE TABLE `mentee` (
  `mentee_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `State` varchar(255) NOT NULL,
  `employer` varchar(255) NOT NULL,
  `career_cat` int(100) NOT NULL,
  `yrs_exp` int(100) NOT NULL,
  `desc_exp` varchar(255) NOT NULL,
  `contact_meth` int(100) NOT NULL,
  `session_num` int(100) NOT NULL,
  `session_time` int(100) NOT NULL,
  `ref_1` varchar(255) NOT NULL,
  `ref_2` varchar(255) NOT NULL,
  `why_mentee` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentee`
--

INSERT INTO `mentee` (`mentee_id`, `photo`, `full_name`, `phone`, `email`, `address`, `Country`, `State`, `employer`, `career_cat`, `yrs_exp`, `desc_exp`, `contact_meth`, `session_num`, `session_time`, `ref_1`, `ref_2`, `why_mentee`) VALUES
(1, 'http://localhost/wp-content/uploads/2015/11/person-150x150.jpg', 'Eric Anderson', '801-319-8619', 'eahomesys@gmail.com', '442 W. Lakeview Dr.', 'USA', 'Utah', 'Control4', 101, 30, 'I like software and want to learn more logic', 2, 6, 45, 'Alex Danoyan', 'Martin Plaehn', 'I learn fast, if taught well.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mentee`
--
ALTER TABLE `mentee`
  ADD PRIMARY KEY (`mentee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mentee`
--
ALTER TABLE `mentee`
  MODIFY `mentee_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
