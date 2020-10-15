-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2020 at 03:36 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arthurteamdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `ansID` int(11) NOT NULL,
  `questionID` int(1) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`ansID`, `questionID`, `answer`) VALUES
(7, 10, 'In computer science, a for-loop (or simply for loop) is a control flow statement for specifying iteration, which allows code to be executed repeatedly.'),
(19, 42, 'HTTP is the foundation of data communication for the World Wide Web, where hypertext documents include hyperlinks to other resources that the user can easily access, for example by a mouse click or by tapping the screen in a web browser.'),
(22, 46, 'Merge Sort is a stable sort which means that the same element in an array maintain their original positions with respect to each other. Overall time complexity of Merge sort is O(nLogn).'),
(24, 10, 'I really like for loops. They are very nice to use.'),
(25, 49, 'MIPS assembly is very fun to use. There is a lot that goes into it. Pay attention to your professor. ');

-- --------------------------------------------------------

--
-- Table structure for table `hh_users`
--

CREATE TABLE `hh_users` (
  `userID` bigint(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hh_users`
--

INSERT INTO `hh_users` (`userID`, `username`, `email`, `password`) VALUES
(27, 'anonymous123', 'hello123@gmail.com', 'sesame101');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `questionID` int(11) NOT NULL,
  `courseID` tinytext DEFAULT NULL,
  `question` text NOT NULL,
  `questionDetail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`questionID`, `courseID`, `question`, `questionDetail`) VALUES
(10, 'CSIT 104', 'What is a for loop?', 'Hello! I am fairly new to programming! So far I am enjoying this class! I just had a question, what is a for loop? Thank you in advance.'),
(16, 'CSIT 230', 'What is an ALU?', 'Sorry! Just been having trouble understanding what an ALU is. Thank you!'),
(42, 'CSIT 340', 'What is the HTTP protocol?', 'Hello! I need help with HTTP protocol. What is it?'),
(46, 'CSIT 212', 'What is the time complexity of the Merge Sort Algorithm?', 'Hello there! I am a bit confused about the time complexity of the merge sort algorithm. Please help me! It would be much appreciated!'),
(49, 'CSIT 340', 'What is MIPS assembly?', 'Hello! I am very confused on MIPS assembly!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`ansID`);

--
-- Indexes for table `hh_users`
--
ALTER TABLE `hh_users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `ansID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `hh_users`
--
ALTER TABLE `hh_users`
  MODIFY `userID` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
