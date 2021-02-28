-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2021 at 01:57 PM
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
(8, 'I need help with my math homework', 6, 0, 'I need someone to explain me some algebra for my math homework :P . \r\nThanks :) . ', 25, 0);

-- --------------------------------------------------------

--
-- Table structure for table `messengers`
--

CREATE TABLE `messengers` (
  `messengeid` int(11) NOT NULL,
  `messengetext` varchar(350) NOT NULL,
  `usercreated` int(12) NOT NULL,
  `userreceived` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messengers`
--

INSERT INTO `messengers` (`messengeid`, `messengetext`, `usercreated`, `userreceived`) VALUES
(5, 'Hi. ', 1, 6),
(6, 'I saw that you are looking for help? That Math homework? ', 1, 6),
(7, 'I am willing to help you with that ;) . ', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(24) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `points` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `name`, `lastname`, `email`, `password`, `points`) VALUES
(1, 'Srdjan', 'Grbic', 'srdjangrbic10@gmail.com', 'SidjaSr04gr04UvaSidjaSr04gr04Uva', 0),
(2, 'Test', 'Testic', 'testtestic2004@gmail.com', 'Testtest', 0),
(6, 'Test', 'Test', 'test@gmail.com', 'Test', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `helps`
--
ALTER TABLE `helps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messengers`
--
ALTER TABLE `messengers`
  ADD PRIMARY KEY (`messengeid`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messengers`
--
ALTER TABLE `messengers`
  MODIFY `messengeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
