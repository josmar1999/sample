-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2018 at 10:02 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym2`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getname` ()  BEGIN
SELECT * FROM members;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `gettrans` ()  BEGIN
SELECT * FROM transac;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `searchname` (IN `fname` VARCHAR(20))  BEGIN
SELECT * FROM members
WHERE firstname = fname;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `searchtrans` (IN `id` VARCHAR(20))  BEGIN
SELECT * FROM transac
WHERE transac_id = id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `acount`
--

CREATE TABLE `acount` (
  `acc_id` int(10) NOT NULL,
  `acc_type` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acount`
--

INSERT INTO `acount` (`acc_id`, `acc_type`, `username`, `password`) VALUES
(2, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `mem_id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `weight` text NOT NULL,
  `height` text NOT NULL,
  `gender` text NOT NULL,
  `payment` text NOT NULL,
  `cellphone` text NOT NULL,
  `birthday` date NOT NULL,
  `remaining` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transac`
--

CREATE TABLE `transac` (
  `transac_id` int(10) NOT NULL,
  `mem_id` int(10) NOT NULL,
  `date_reg` text NOT NULL,
  `amount` text NOT NULL,
  `date_paid` date NOT NULL,
  `payment_stat` varchar(30) NOT NULL,
  `date_start` date NOT NULL,
  `date_expire` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transac`
--

INSERT INTO `transac` (`transac_id`, `mem_id`, `date_reg`, `amount`, `date_paid`, `payment_stat`, `date_start`, `date_expire`) VALUES
(7, 131, 'Wednesday 21st of March 2018 04:30:44 PM', '2 Months (1000)', '0000-00-00', 'Pending', '0000-00-00', '0000-00-00'),
(8, 142, 'Wednesday 21st of March 2018 05:01:03 PM', '2 Months (1000)', '0000-00-00', 'Pending', '0000-00-00', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acount`
--
ALTER TABLE `acount`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`mem_id`),
  ADD KEY `acc_id` (`acc_id`);

--
-- Indexes for table `transac`
--
ALTER TABLE `transac`
  ADD PRIMARY KEY (`transac_id`),
  ADD KEY `mem_id` (`mem_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acount`
--
ALTER TABLE `acount`
  MODIFY `acc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transac`
--
ALTER TABLE `transac`
  MODIFY `transac_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
