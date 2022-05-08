-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2022 at 12:51 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crime`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(5) NOT NULL,
  `age` varchar(255) DEFAULT NULL,
  `anmya` varchar(255) DEFAULT NULL,
  `center` varchar(255) DEFAULT NULL,
  `examination` varchar(255) DEFAULT NULL,
  `child` varchar(255) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `createdAt` varchar(255) DEFAULT NULL,
  `defferent` varchar(255) DEFAULT NULL,
  `eye` varchar(255) DEFAULT NULL,
  `fatheredu` varchar(255) DEFAULT NULL,
  `governorate` varchar(255) DEFAULT NULL,
  `hb` varchar(255) DEFAULT NULL,
  `hct` varchar(255) DEFAULT NULL,
  `ht` varchar(255) DEFAULT NULL,
  `htc` varchar(255) DEFAULT NULL,
  `motheredu` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `oprea` varchar(255) NOT NULL,
  `rbs` varchar(255) NOT NULL,
  `reasult` varchar(255) NOT NULL,
  `referral` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `stability` varchar(255) NOT NULL,
  `supp` varchar(255) NOT NULL,
  `village` varchar(255) NOT NULL,
  `ques` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$yqi86U2q.qyhz9UhFxz9l.o6f.RFiRxlexLMZ4MgYwIwTZ1.CXR2G', '2022-04-27 03:10:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
