-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2020 at 08:05 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ibm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `sno` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `no` int(11) NOT NULL,
  `qu` varchar(500) NOT NULL,
  `op1` varchar(100) NOT NULL,
  `op2` varchar(100) NOT NULL,
  `op3` varchar(100) NOT NULL,
  `op4` varchar(100) NOT NULL,
  `ans` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`no`, `qu`, `op1`, `op2`, `op3`, `op4`, `ans`) VALUES
(1, 'A, B, and C can together do some work in 72 days. A and B can together do two times as much work as C alone, and A and C together can do four times as much work as B alone. Find the time taken by C alone to do the whole work.', 'a. 144 days', 'b. 360 days', 'c. 216 days', 'd. 180 days', 3),
(2, 'A and B completed certain work together in 5 days. Had A worked at twice his own speed and B half his own speed, it would have taken them 4 days to complete the job. How much time would it take for A alone to do the job?', 'a. 10 days', 'b. 20 days', 'c. 25 days', 'd. 15 days', 1),
(3, 'A sum of Rs 2387 is divided into three parts in such a way that one-fifth of the first part, one half of the second part and the fourth one and the third part are equal. Find the sum of five times the first part, three times the second part and four times the third part (in rupees)?', 'a. 9982', 'b. 7812', 'c. 9114', 'd. 10199', 4),
(4, 'What is the greatest possible positive integer n if 16^n divides (44)^44 without leaving a remainder.', 'a. 14', 'b. 15', 'c. 28', 'd. 29', 4),
(5, 'In a test with 26 questions, five points were deducted for each wrong answer and eight points were added for every correct answer. How many were answered correctly if the score was zero?', 'a. 11', 'b. 10', 'c. 13', 'd. 12', 2),
(6, 'The air-conditioned bus service from Siruseri industry park runs at regular intervals throughout the day. It is now 3:12 pm and it has arrived 1 minute ago but it was 2 minutes late. The next bus is due at 3:18 pm. When is the next bus due?', 'a. 3:27 pm', 'b. 3:29 pm', 'c. 3:24 pm', 'd. 3:25 pm', 1),
(7, 'How many number plates can be made if the number plates have two letters of the English alphabets (A-Z) followed by two digits (0-9) if the repetition of digits or alphabets is not allowed?', 'a. 56800', 'b. 56500', 'c. 52500', 'd. 58500', 4),
(8, 'In a cricket tournament, 16 school teams participated. A sum of Rs. 8000 is to be awarded among them as prize money. If the team placed last is awarded Rs. 275 as prize money and the award increases by the same amount for successive finishing teams, how much will the teamplacedfirst receive?', 'a. 1000', 'b. 500', 'c. 1250', 'd. 725', 4),
(9, 'Eeshas father was 34 years of age when she was born. Her younger brother, Shashank, now that he is 13, is very proud of the fact that he is as tall as her, even though he is three years younger than her. Eeshas mother, who is shorter than Eesha, was only 29 when Shashank was born. What is the sum of the ages of Eeshas parents now?', 'a. 92', 'b. 76', 'c. 66', 'd. 89', 1),
(10, 'In this question, x^y stands for x raised to the power y. For example, 2^3=8 and 4^1.5=8. If a,b are real numbers such that a+b=3, a^2+b^2=7, the value of a^4+b^4 is?', 'a. 49', 'b. 45', 'c. 51', 'd. 47', 4);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `sno` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `s1` varchar(15) NOT NULL,
  `s2` varchar(15) NOT NULL,
  `s3` varchar(15) NOT NULL,
  `s4` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userdetail`
--

CREATE TABLE `userdetail` (
  `email` varchar(25) NOT NULL,
  `fathername` varchar(25) NOT NULL,
  `mothername` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phoneno` int(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mark10` int(11) NOT NULL,
  `mark12` int(11) NOT NULL,
  `markgrad` int(11) NOT NULL,
  `anystudy` varchar(100) NOT NULL,
  `certification` varchar(100) NOT NULL,
  `technology` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_ans`
--

CREATE TABLE `user_ans` (
  `user_id` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `totalques` int(11) NOT NULL,
  `attemptqu` int(11) NOT NULL,
  `anscorrect` int(11) NOT NULL,
  `interviewscore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_photo`
--

CREATE TABLE `user_photo` (
  `sno` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `filename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `userdetail`
--
ALTER TABLE `userdetail`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_ans`
--
ALTER TABLE `user_ans`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_photo`
--
ALTER TABLE `user_photo`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_ans`
--
ALTER TABLE `user_ans`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_photo`
--
ALTER TABLE `user_photo`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `userdetail`
--
ALTER TABLE `userdetail`
  ADD CONSTRAINT `userdetail_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
