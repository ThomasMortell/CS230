-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2019 at 05:50 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ebook_metadata`
--

CREATE TABLE `ebook_metadata` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `creator` varchar(30) NOT NULL,
  `title` varchar(40) NOT NULL,
  `type` varchar(50) NOT NULL,
  `identifier` varchar(50) DEFAULT NULL,
  `date` date NOT NULL,
  `language` varchar(30) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ebook_metadata`
--

INSERT INTO `ebook_metadata` (`ID`, `creator`, `title`, `type`, `identifier`, `date`, `language`, `description`) VALUES
(1, 'TEST', 'TEST', 'Fantasy', '123', '1999-04-22', 'EN-US', 'TEST'),
(2, 'TEST', 'TEST', 'Horror', '1234', '1999-04-22', 'FR-CA', 'TEST'),
(3, 'TEST', 'TEST', 'Fantasy', '12345', '1999-04-22', 'EN-US', 'TEST'),
(4, 'TEST', 'TEST', 'Fantasy', ' 123456', '1999-04-22', 'EN-US', 'TEST');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ebook_metadata`
--
ALTER TABLE `ebook_metadata`
  ADD UNIQUE KEY `ID` (`ID`),
  ADD UNIQUE KEY `identifier_unique` (`identifier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ebook_metadata`
--
ALTER TABLE `ebook_metadata`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
