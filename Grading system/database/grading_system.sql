-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2023 at 05:46 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grading system`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `LRN` int(100) NOT NULL,
  `ID` int(11) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Middlename` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `Suffix` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `Place_Of_Birth` varchar(100) NOT NULL,
  `Nationality` varchar(100) NOT NULL,
  `Religion` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Course` varchar(100) NOT NULL,
  `Section` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `Birthdate` date NOT NULL,
  `Role` varchar(100) NOT NULL,
  `Status` varchar(100) NOT NULL,
  `verification_code` int(100) NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`LRN`, `ID`, `Firstname`, `Middlename`, `Lastname`, `Suffix`, `Username`, `Address`, `Place_Of_Birth`, `Nationality`, `Religion`, `Email`, `Password`, `Phone`, `Gender`, `Course`, `Section`, `year`, `Birthdate`, `Role`, `Status`, `verification_code`, `creation_time`) VALUES
(0, 36, 'Admin', 'Admin', 'Admin', 'Admin', 'Admin', 'admin', '', '', '', 'admin', 'admin', '0', '', '', '', '', '0000-00-00', 'Registrar', 'Active', 0, '2023-04-12 05:42:27'),
(6348954, 44, 'Vincent', 'Mejia', 'Handayan', '', 'handayanv', 'Ph3 Bagong Silang', 'Caloocan', 'Filipino', 'Catholic', 'handayanv@gmail.com', 'admin', '09652016566', 'Male', 'BSIT', 'BSITA41', '1', '1999-05-18', 'Student', 'Active', 841399, '2023-04-15 00:59:18'),
(0, 46, 'Ronald', '', 'Gamonez', 'Jr', 'Ronald', 'Ph3 Bagong Silang Caloocan', 'Caloocan', 'Filipino', 'Catholic', 'ronald@gmail.com', 'admin', '0912345678', 'Male', 'None', 'None', '3', '1999-05-18', 'Teacher', 'Active', 0, '2023-04-17 01:05:27'),
(0, 67, 'Carla', 'Mejia', 'Handayan', '', 'Carla', 'Ph3', 'Caloocan', 'Filipino', 'Catholic', 'carla@gmail.com', 'admin', '0912345678', 'Female', 'BSTM', 'BSTMA54', '3', '2000-05-15', 'Student', 'Active', 0, '2023-04-19 03:25:38');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `ID` int(11) NOT NULL,
  `Course` varchar(100) NOT NULL,
  `Section` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`ID`, `Course`, `Section`) VALUES
(8, 'BSIT', ''),
(9, 'BSTM', ''),
(10, 'BSOA', '');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `ID` int(11) NOT NULL,
  `section` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`ID`, `section`, `course`) VALUES
(3, 'BSITA41', 'BSIT'),
(4, 'BSITA42', 'BSIT'),
(5, 'BSITA43', 'BSIT'),
(6, 'BSOAB15', 'BSOA'),
(10, 'BSITA52', 'BSIT'),
(11, 'BSTMA54', 'BSTM'),
(12, 'BSTMA51', 'BSTM'),
(13, 'BSTMA55', 'BSTM');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `ID` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`ID`, `subject`, `section`, `course`) VALUES
(2, 'AP', 'BSITA41', ''),
(3, 'MATHMOW', 'BSITA41', ''),
(5, 'ITCOM', 'BSITA41', ''),
(6, 'Hospitality', 'BSTMA54', ''),
(7, 'Calculus', 'BSTMA54', ''),
(8, 'Mathmow', 'BSTMA54', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_grading`
--

CREATE TABLE `teacher_grading` (
  `ID` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `subject_id` varchar(100) NOT NULL,
  `midterm` varchar(100) NOT NULL,
  `prefinal` varchar(100) NOT NULL,
  `final` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_grading`
--

INSERT INTO `teacher_grading` (`ID`, `user_id`, `subject_id`, `midterm`, `prefinal`, `final`, `datetime`) VALUES
(10, '44', '2', '', '', '', '2023-04-15 07:55:47'),
(11, '44', '3', '', '', '', '2023-04-15 07:55:47'),
(12, '44', '5', '', '', '', '2023-04-15 08:51:21'),
(13, '67', '6', '', '', '', '2023-04-19 03:33:51'),
(14, '67', '7', '', '', '', '2023-04-19 03:33:51'),
(15, '67', '8', '', '', '', '2023-04-19 03:33:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `teacher_grading`
--
ALTER TABLE `teacher_grading`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teacher_grading`
--
ALTER TABLE `teacher_grading`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
