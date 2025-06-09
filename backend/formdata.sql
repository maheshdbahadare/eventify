-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2025 at 05:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `formdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(20) NOT NULL,
  `email` varchar(39) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `message`) VALUES
('john', '0', '0'),
('john', 'mheshbahadare123@gmail.com', 'hi'),
('mice', 'mice@gmail.com', 'i want to know if there is any slot is available for the wedding occasion that i want to book for'),
('mb', 'maheshbahadare9767@gmail.com', 'hiiii'),
('mb', 'maheshbahadare9767@gmail.com', 'hiiii'),
('mb', 'maheshbahadare123@gmail.com', 'hiiii');

-- --------------------------------------------------------

--
-- Table structure for table `myform`
--

CREATE TABLE `myform` (
  `state` varchar(60) NOT NULL,
  `district` varchar(60) NOT NULL,
  `city` varchar(60) NOT NULL,
  `venue` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` int(11) NOT NULL,
  `evtype` varchar(60) NOT NULL,
  `date` date NOT NULL,
  `guests` int(11) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `myform`
--

INSERT INTO `myform` (`state`, `district`, `city`, `venue`, `name`, `email`, `phone`, `evtype`, `date`, `guests`, `message`) VALUES
('state1', 'district1', 'City 1-1', 'Venue 1-1-1', 'anuj', 'john@gmail.com', 1234567789, 'wedding', '2025-02-20', 56, 'hey welcome to the website '),
('state1', 'district2', 'City 2-2', 'Venue 2-2-1', 'john', 'anuj@gmail.com', 1233456789, 'birthday', '2026-06-04', 34, 'hey i wann book a hall for my blanket birthday party and want to arrange the caters from your suggestion'),
('state2', 'district4', 'City 4-1', 'Venue 4-1-2', 'john', 'anuj@gmail.com', 1233456789, 'birthday', '2026-06-20', 34, 'hey i wann book a hall for my blanket birthday party and want to arrange the caters from your suggestion');

-- --------------------------------------------------------

--
-- Table structure for table `sheduler`
--

CREATE TABLE `sheduler` (
  `name` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sheduler`
--

INSERT INTO `sheduler` (`name`, `date`) VALUES
('birth day', '2025-06-03'),
('wedding', '2025-06-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `myform`
--
ALTER TABLE `myform`
  ADD PRIMARY KEY (`date`);

--
-- Indexes for table `sheduler`
--
ALTER TABLE `sheduler`
  ADD PRIMARY KEY (`date`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
