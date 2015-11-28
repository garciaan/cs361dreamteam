-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 28, 2015 at 01:35 AM
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
-- Table structure for table `mentor`
--

CREATE TABLE `mentor` (
  `id` bigint(11) NOT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `state` varchar(255) DEFAULT NULL,
  `employer` varchar(255) DEFAULT NULL,
  `career_cat` int(100) DEFAULT NULL,
  `yrs_exp` int(100) DEFAULT NULL,
  `contact_meth` int(100) DEFAULT NULL,
  `session_num` int(100) DEFAULT NULL,
  `session_time` int(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `time_zone` varchar(10) DEFAULT NULL,
  `desc_exp` varchar(500) DEFAULT NULL,
  `ref_1` varchar(255) DEFAULT NULL,
  `ref_2` varchar(255) DEFAULT NULL,
  `why_mentor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentor`
--

INSERT INTO `mentor` (`id`, `photo`, `full_name`, `phone`, `address`, `state`, `employer`, `career_cat`, `yrs_exp`, `contact_meth`, `session_num`, `session_time`, `email`, `location`, `time_zone`, `desc_exp`, `ref_1`, `ref_2`, `why_mentor`) VALUES
(4, 'http://localhost/wp-content/uploads/2015/11/James-Kirk-150x150.jpg', 'James T. Kirk', '000-000-0000', '123 Tumwah rd.', 'Iowa', 'Starfleet Command', 100, 20, 1, 6, 60, 'kirkjt@starfleet.org', 'California', 'PST', 'James Tiberius Kirk was born on March 22, 2233, in Riverside, Iowa. He was raised there by his parents, George and Winona Kirk. Although born on Earth, Kirk for a time lived on Tarsus IV, where he was one of nine surviving witnesses to the massacre of 4,000 colonists by Kodos the Executioner. James Kirk''s brother George Samuel Kirk is killed in Operation: Annihilate!, leaving behind three children.', 'Chris Pyke', 'General Smith', 'As a star fleet captain, I work well under pressure'),
(5, 'http://localhost/wp-content/uploads/2015/11/Mr-Spock-150x150.jpg', 'Mr. Spock', '111-111-1111', '456 acora', '', 'Starfleet Command', 101, 22, 2, 3, 30, 'spockm@starfleet.org', 'Vulcan', 'VTZ', 'Spock serves aboard the starship Enterprise, as science officer and first officer, and later as commanding officer of two iterations of the vessel. Spocks mixed human-Vulcan heritage serves as an important plot element in many of the character''s appearances. Along with Captain James T. Kirk and Dr. Leonard Bones McCoy, he is one of the three central characters in the original Star Trek series and its films. After retiring from Starfleet, Spock serves as a Federation ambassador, contributing towa', 'Vulcan Queen', 'Good Father', 'Because I''m logical'),
(6, 'http://localhost/wp-content/uploads/2015/11/Leonard-McCoy-150x150.jpg', 'Leonard McCoy', '333-333-3333', '123 Peachtree.', 'Georga', 'Starfleet Command', 103, 35, 1, 12, 30, 'mccoyl@starfleet.org', 'Georgia', 'EST', 'McCoy was born in Georgia, January 20, 2227. The son of David, he attended the University of Mississippi and is a divorce, but later married Natira, the priestess of Yonada, In 2266, McCoy was posted as chief medical officer of the USS Enterprise under Captain James T. Kirk who often calls him Bones.', 'Dr. Livingston', 'Jonas Sauk', 'I''m a doctor not an engineer'),
(7, 'http://localhost/wp-content/uploads/2015/11/Uhura-150x150.jpg', 'Lt Uhura', '444-444-4444', 'Torama Village', '', 'Starfleet Command', 102, 10, 3, 6, 45, 'uhuralt@starfleet.org', 'Africa', 'UTC-1:00', 'Uhura, from the United States of Africa, speaks Swahili and was born January 19, 2233. Uhura first appears joining the crew of the USS Enterprise as a lieutenant, and serves as chief communications officer under Captain Kirk. She is a capable bridge officer and readily manned the helm, navigation and science stations on the bridge when the need arose. Uhura was also a talented singer, and enjoyed serenading her shipmates when off-duty.', 'Qintuquente', 'Alex Hayley', 'I can speak over 100 languages'),
(8, 'http://localhost/wp-content/uploads/2015/11/Montgomery-Scott-150x150.jpg', 'Montgomery Scott', '555-555-5555', '486 Runnymeade', '', 'Starfleet Command', 105, 25, 2, 4, 15, 'scottm@starfleet.org', 'Scotland', 'UTC', 'Scotty spent part of his life in Aberdeen, Scotland, on March 3, 2222. Scotty holds the rank of lieutenant commander and serves as the Enterprise''s second officer and chief engineer. Scotty''s technical knowledge and skill allow him to devise unconventional and effective last-minute solutions to dire problems. As second officer, he commands the ship when both Captain Kirk and first officer Spock (Leonard Nimoy) are off the ship', 'Henry Ford', 'James Dodge', 'Cause I can fix anything no matter how much time'),
(9, 'http://localhost/wp-content/uploads/2015/11/person-150x150.jpg', 'Pavel Checkov', '666-666-6666', '123 Lenin Square', '', 'Starfleet Command', 100, 10, 3, 6, 45, 'checkovp@starfleet.org', 'Russia', 'GMT+6', 'I fly ships for many years', 'James T. Kirk', 'Hikaru Sulu', 'I fly ship real fast and I like to learn'),
(10, 'http://localhost/wp-content/uploads/2015/11/person-150x150.jpg', 'Joe Blow', '222-222-2222', '123 Any Street', '', 'OSU', 102, 1, 2, 3, 30, 'foo@bar.com', 'USA', 'PST', 'I like talking', 'charlie brown', 'linus Napp', 'I listen good');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mentor`
--
ALTER TABLE `mentor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mentor`
--
ALTER TABLE `mentor`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
