-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 03, 2019 at 02:10 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Assignment5`
--

-- --------------------------------------------------------

--
-- Table structure for table `RestAPITable`
--

CREATE TABLE `RestAPITable` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `theDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(25) NOT NULL,
  `theDesc` text NOT NULL,
  `URL` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `RestAPITable`
--

INSERT INTO `RestAPITable` (`ID`, `theDate`, `name`, `theDesc`, `URL`) VALUES
(1, '2018-05-02 12:54:21', 'FurtherTestingUpdate', 'This is a test', 'www.facebook.com'),
(2, '2018-05-02 12:56:28', 'Test2', 'This is a test2', 'www.google.ie'),
(3, '2018-05-02 12:57:42', 'Test3', 'This is a test3', 'www.reddit.com'),
(4, '2018-05-02 13:02:11', 'Test4', 'This is a test4', 'wwww.youtube.com'),
(5, '2018-05-02 13:19:57', 'Test5', 'This is a test5', 'www.bbc.com/news');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `RestAPITable`
--
ALTER TABLE `RestAPITable`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `RestAPITable`
--
ALTER TABLE `RestAPITable`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
