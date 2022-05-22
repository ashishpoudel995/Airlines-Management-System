-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 22, 2022 at 07:57 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `airline`
--

CREATE TABLE `airline` (
  `AIRLINE_ID` varchar(10) NOT NULL,
  `AIRLINE_NAME` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE `airport` (
  `A_NAME` varchar(50) NOT NULL,
  `STATE` varchar(30) NOT NULL,
  `COUNTRY` varchar(30) NOT NULL,
  `C_NAME` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `C_NAME` varchar(30) NOT NULL,
  `STATE` varchar(30) NOT NULL,
  `COUNTRY` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contains`
--

CREATE TABLE `contains` (
  `A_NAME` varchar(50) DEFAULT NULL,
  `AIRLINE_ID` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `SOURCE` varchar(30) NOT NULL,
  `DESTINATION` varchar(30) NOT NULL,
  `DEPARTURE` varchar(5) DEFAULT NULL,
  `ARRIVAL` varchar(5) DEFAULT NULL,
  `DURATION` varchar(5) DEFAULT NULL,
  `FLIGHT_CODE` char(10) NOT NULL,
  `AIRLINE_ID` varchar(10) DEFAULT NULL,
  `PRICE_BUSINESS` int(15) DEFAULT NULL,
  `PRICE_ECONOMY` int(15) DEFAULT NULL,
  `PRICE_STUDENTS` int(15) DEFAULT NULL,
  `PRICE_DIFFERENTLYABLED` int(15) DEFAULT NULL,
  `DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pass`
--

CREATE TABLE `pass` (
  `PASSPORT_NO` char(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `FNAME` varchar(50) NOT NULL,
  `MNAME` varchar(50) DEFAULT NULL,
  `LNAME` varchar(50) NOT NULL,
  `PASSPORT_NO` char(8) NOT NULL,
  `AGE` int(3) DEFAULT NULL,
  `SEX` char(1) DEFAULT NULL,
  `PHONE` char(10) DEFAULT NULL,
  `ADDRESS` varchar(50) DEFAULT NULL,
  `FLIGHT_CODE` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `PRICE` int(20) DEFAULT NULL,
  `TYPE` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `selected`
--

CREATE TABLE `selected` (
  `FLIGHT_CODE` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `TICKET_NO` int(11) NOT NULL,
  `PRICE` int(15) DEFAULT NULL,
  `SOURCE` varchar(30) DEFAULT NULL,
  `DESTINATION` varchar(30) DEFAULT NULL,
  `DATE_OF_TRAVEL` date DEFAULT NULL,
  `PASSPORT_NO` char(8) DEFAULT NULL,
  `FLIGHT_CODE` char(10) DEFAULT NULL,
  `TYPE` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airline`
--
ALTER TABLE `airline`
  ADD PRIMARY KEY (`AIRLINE_ID`);

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`A_NAME`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`C_NAME`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`FLIGHT_CODE`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`PASSPORT_NO`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`TICKET_NO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `TICKET_NO` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
