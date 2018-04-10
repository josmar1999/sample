-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2018 at 06:44 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grademsys`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getStudent` ()  BEGIN
SELECT * FROM student;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `searchStudent` (IN `studid` VARCHAR(10))  BEGIN
SELECT * FROM student WHERE studentid = studid;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `gradeid` varchar(10) NOT NULL,
  `studentid` varchar(10) NOT NULL,
  `subjectid` varchar(10) NOT NULL,
  `grade` decimal(10,0) NOT NULL,
  `grading` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `parentid` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `parentuser` varchar(30) NOT NULL,
  `parentpw` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `sectionid` varchar(10) NOT NULL,
  `sectionname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentid` varchar(10) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `middleini` varchar(2) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `birthday` date NOT NULL,
  `address` text NOT NULL,
  `sectionid` varchar(10) NOT NULL,
  `parentid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentid`, `lname`, `fname`, `middleini`, `gender`, `birthday`, `address`, `sectionid`, `parentid`) VALUES
('12042', 'grey', 'grey', 'g', 'M', '0000-00-00', 'Baguagauga', '1525', '5252'),
('123', 'kali', 'nufa', 'b', 'F', '0000-00-00', 'cot', '122', '2133'),
('124124', 'Ghau', 'Kalipaps', 'S', 'M', '0000-00-00', 'Sinsuat Ave', '9662', '2622');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjectid` varchar(10) NOT NULL,
  `subjectname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`gradeid`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parentid`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`sectionid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentid`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subjectid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
