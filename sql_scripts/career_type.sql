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
-- Table structure for table `career_type`
--

CREATE TABLE `career_type` (
  `Career_id` bigint(20) NOT NULL,
  `Career_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `career_type`
--

INSERT INTO `career_type` (`Career_id`, `Career_Name`) VALUES
(100, 'Military'),
(101, 'Scientist'),
(102, 'Communications'),
(103, 'Medical'),
(104, 'Engine Repair'),
(105, 'Nuclear Physics'),
(106, 'Linguistics');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `career_type`
--
ALTER TABLE `career_type`
  ADD UNIQUE KEY `Career_id` (`Career_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
