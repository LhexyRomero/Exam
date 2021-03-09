-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2021 at 09:32 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp_time_record_t`
--

CREATE TABLE `emp_time_record_t` (
  `Id` int(12) NOT NULL,
  `HROrganization` varchar(50) NOT NULL,
  `Employee` varchar(50) NOT NULL,
  `Hours` int(12) NOT NULL,
  `Wage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_time_record_t`
--

INSERT INTO `emp_time_record_t` (`Id`, `HROrganization`, `Employee`, `Hours`, `Wage`) VALUES
(1, 'Health Care Inc.', ' Lhexy Romero', 8, '20833.33'),
(12, 'Health Care Inc.', ' Harry Poodle', 8, '10416.67'),
(13, 'Health Care Inc.', ' Harry Poodle', 8, '10416.67'),
(16, 'Health Care Inc.', 'Leki Lekay', 8, '6944.44'),
(17, 'Health Care Inc.', 'Leki Lekay', 8, '6944.44'),
(18, 'Health Care Inc.', 'Leki Lekay', 8, '6944.44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp_time_record_t`
--
ALTER TABLE `emp_time_record_t`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp_time_record_t`
--
ALTER TABLE `emp_time_record_t`
  MODIFY `Id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
