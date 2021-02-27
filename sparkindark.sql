-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2021 at 12:29 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sparkindark`
--

-- --------------------------------------------------------

--
-- Table structure for table `helps`
--

CREATE TABLE `helps` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `usercreatorid` int(12) NOT NULL,
  `userpickerid` int(12) NOT NULL,
  `description` varchar(760) NOT NULL,
  `points` int(3) NOT NULL,
  `isdone` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `helps`
--

INSERT INTO `helps` (`id`, `title`, `usercreatorid`, `userpickerid`, `description`, `points`, `isdone`) VALUES
(3, 'I need help with my math hemowork', 1, 0, 'I do not reall need help with it. \r\nThis is just a test to see will this application work. ', 50, 0),
(4, 'I need someone to take my trash out', 1, 0, 'This is another test of this application. \r\nPlease work :) :D . ', 89, 0),
(5, 'I need a someone to help me build this app :) . ', 1, 0, 'This is another test. \r\nAlso, it is a joke. \r\nMe and Danilo can create it on our own. \r\nAnd it was a hell lot of fun, so far. \r\n:) ;) . ', 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(24) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `name`, `lastname`, `email`, `password`) VALUES
(1, 'Srdjan', 'Grbic', 'srdjangrbic10@gmail.com', 'SidjaSr04gr04UvaSidjaSr04gr04Uva'),
(2, 'Test', 'Testic', 'testtestic2004@gmail.com', 'Testtest');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `helps`
--
ALTER TABLE `helps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `helps`
--
ALTER TABLE `helps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
