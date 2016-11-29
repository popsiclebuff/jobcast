-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2016 at 02:17 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_lady`
--

-- --------------------------------------------------------

--
-- Table structure for table `registered`
--

CREATE TABLE IF NOT EXISTS `registered` (
  `userID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `about` varchar(1000) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `pics` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered`
--

INSERT INTO `registered` (`userID`, `username`, `password`, `email`, `type`, `company_name`, `contact_no`, `about`, `fname`, `lname`, `pics`) VALUES
(1, 'Renz', '1234', 'renzbraza10@gmail.com', 'Applicant', '', '', '', '', '', ''),
(2, 'we', 'we', 'we', 'Company', '', '', '', '', '', ''),
(3, 'ren', 'ren', 'ren_gwapo@gmail.com', 'Company', '', '', '', '', '', ''),
(4, 're', 're', 're@gmail.com', 'Company', '', '', '', '', '', ''),
(5, 'r', 'r', 'r@yahoo.com', 'Company', '', '', '', '', '', ''),
(6, 'q', 'q', 'q@yahoo.com', 'Company', '', '', '', '', '', ''),
(13, 't', 't', 't@gmail.com', 'Company', '', '', '', '', '', ''),
(14, 'g', 'g', 'g@yahoo.com', 'Company', '', '', '', '', '', ''),
(15, 'm', 'm', 'm@gmail.com', 'Company', '', '', '', '', '', ''),
(17, 'pits', 'pits', 'peter_saitama@yahoo.com', 'Company', 'Anime Lover', '1234567', 'company of the company sakay na', 'peter', 'saitama', 'profile_img/mrbeen.png');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `userID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `pics` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`userID`, `username`, `password`, `email`, `type`, `pics`) VALUES
(1, 'iris', 'iris', 'iris@gmail.com', '', ''),
(2, 't', 't', 't@yahoo.com', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registered`
--
ALTER TABLE `registered`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registered`
--
ALTER TABLE `registered`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
