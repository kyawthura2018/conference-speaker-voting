-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 20, 2019 at 08:26 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `votingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `created_on` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `lastname`, `photo`, `created_on`) VALUES
(1, 'akthura', '$2y$10$emSABYQ6Y08qxBzeXriw1.zFXOrXl82kjY6pitt11ny0JB8F7fGba', 'Aung Kyaw', 'Thura', 'facebook-profile-image.jpeg', '2019-10-09'),
(2, 'nta', '$2y$10$mUJ62HoyrLrdE2e8uxAK5OBregs3C63Ek3sFk2k.Jp2C4qJlTqrLi', 'Nay', 'Thura', 'facebook-profile-image.jpeg', '2019/10/20'),
(3, 'nna', '$2y$10$.LhQFOKz.U8G3Elvnr9Cluht0Ek3dRu0qzr77CWLqY2aYmWMILTMq', 'Naing Naing', 'Aung', '', '2019/10/20');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `publishdate` varchar(12) DEFAULT NULL,
  `priority` int(11) NOT NULL,
  `speakerid` varchar(15) NOT NULL,
  `agree` int(10) NOT NULL,
  `disagree` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `description`, `publishdate`, `priority`, `speakerid`, `agree`, `disagree`) VALUES
(11, 'How to Test for NULL?', 'It is not possible to test for NULL values with comparison operators, such as =, <, or <>.  We will have to use the IS NULL and IS NOT NULL operators instead.', '2019/10/20', 1, 'akthura', 0, 0),
(13, 'jdfhsadjkflakdsjf', 'The IS NOT NULL operator is used to test for non-empty values (NOT NULL values).\r\nThe following SQL lists all customers with a value in the \"Address\" field:', '2019/10/20', 2, 'akthura', 0, 0),
(14, 'How to Test for NULL Values?', 'The IS NOT NULL operator is used to test for non-empty values (NOT NULL values).\r\n\r\nThe following SQL lists all customers with a value in the \"Address\" field:', '2019/10/20', 3, 'akthura', 0, 0),
(15, 'Conference', 'The IS NOT NULL operator is used to test for non-empty values (NOT NULL values).\r\n\r\nThe following SQL lists all customers with a value in the \"Address\" field:', '2019/10/18', 4, 'akthura', 0, 0),
(16, 'questions', '$connect_error was broken until PHP 5.2.9 and 5.3.0. If you need to ensure compatibility with PHP versions prior to 5.2.9 and 5.3.0, use the following code instead:\r\n\r\n// Check connection\r\nif (mysqli_connect_error()) {\r\n    die(\"Database connection failed: \" . mysqli_connect_error());\r\n}', '2019/10/20', 5, 'nta', 0, 0),
(18, 'How to Test for NULL Values?', '$connect_error was broken until PHP 5.2.9 and 5.3.0. If you need to ensure compatibility with PHP versions prior to 5.2.9 and 5.3.0, use the following code instead:\r\n\r\n// Check connection\r\nif (mysqli_connect_error()) {\r\n    die(\"Database connection failed: \" . mysqli_connect_error());\r\n}', '2019/10/20', 6, 'nta', 0, 0),
(19, 'Google Droid I/O Event', 'Google Droid I/O EventGoogle Droid I/O EventGoogle Droid I/O EventGoogle Droid I/O EventGoogle Droid I/O EventGoogle Droid I/O EventGoogle Droid I/O Event', '2019/10/20', 7, 'nna', 0, 0),
(20, 'How to Test for NULL?', 'dafadfa', NULL, 8, 'akthura', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` int(11) NOT NULL,
  `voterid` varchar(10) NOT NULL,
  `votedquestions` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `voterid`, `votedquestions`) VALUES
(1, 'WnlwTE', ''),
(2, 'zwghGR', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
