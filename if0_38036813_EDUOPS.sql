-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2022 at 07:47 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_feedback_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedbackquestions`
--

CREATE TABLE `feedbackquestions` (
  `QuestionID` int(15) NOT NULL,
  `Question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedbackquestions`
--

INSERT INTO `feedbackquestions` (`QuestionID`, `Question`) VALUES
(10, 'does your teacher completes the syllabus on time'),
(11, 'Understanding power of the teacher'),
(12, 'Regularity of teacher'),
(13, 'technical knowledge'),
(14, 'tyftyutyb tyyu');

-- --------------------------------------------------------

--
-- Table structure for table `hodlogin`
--

CREATE TABLE `hodlogin` (
  `MobileNumber` varchar(15) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Branch` varchar(50) NOT NULL,
  `HodName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hodlogin`
--

INSERT INTO `hodlogin` (`MobileNumber`, `Password`, `Branch`, `HodName`) VALUES
('9906802803', 'shabir', 'ComputerEngg', 'Shabir Ahmad');

-- --------------------------------------------------------

--
-- Table structure for table `studentfeedback`
--

CREATE TABLE `studentfeedback` (
  `SNo` int(15) NOT NULL,
  `TeacherID` varchar(100) NOT NULL,
  `StudentRollNumber` varchar(100) NOT NULL,
  `QuestionID` varchar(15) NOT NULL,
  `Rating` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentfeedback`
--

INSERT INTO `studentfeedback` (`SNo`, `TeacherID`, `StudentRollNumber`, `QuestionID`, `Rating`) VALUES
(31, '91520347', '23434', '10', '3'),
(32, '91520347', '23434', '11', '1'),
(33, '91520347', '23434', '12', '2'),
(34, '91520347', '23434', '13', '4'),
(35, '91520347', '237623', '10', '5'),
(36, '91520347', '237623', '11', '0'),
(37, '91520347', '237623', '12', '1'),
(38, '91520347', '237623', '13', '4'),
(39, '31717558', '23434', '10', '4'),
(40, '31717558', '23434', '11', '2'),
(41, '31717558', '23434', '12', '5'),
(42, '31717558', '23434', '13', '4'),
(43, '21522125', '123456', '10', '4'),
(44, '21522125', '123456', '11', '5'),
(45, '21522125', '123456', '12', '1'),
(46, '21522125', '123456', '13', '4'),
(47, '21522125', '123456', '14', '5'),
(48, '31717558', '123456', '10', '1'),
(49, '31717558', '123456', '11', '5'),
(50, '31717558', '123456', '12', '5'),
(51, '31717558', '123456', '13', '2'),
(52, '31717558', '123456', '14', '0');

-- --------------------------------------------------------

--
-- Table structure for table `studentlogin`
--

CREATE TABLE `studentlogin` (
  `RollNumber` varchar(20) NOT NULL,
  `MobileNumber` varchar(11) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `StudentName` varchar(50) NOT NULL,
  `Branch` varchar(50) NOT NULL,
  `semester` varchar(15) NOT NULL,
  `Attendence` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentlogin`
--

INSERT INTO `studentlogin` (`RollNumber`, `MobileNumber`, `Password`, `StudentName`, `Branch`, `semester`, `Attendence`) VALUES
('123456', '9906802802', '123456', 'MOMOONA', 'ComputerEngg', '5', 90),
('23434', '9906123456', '23434', 'ARFA', 'ComputerEngg', '5', 88);

-- --------------------------------------------------------

--
-- Table structure for table `teacherfeedbackstatus`
--

CREATE TABLE `teacherfeedbackstatus` (
  `TeacherID` varchar(15) NOT NULL,
  `FirstSemester` varchar(15) NOT NULL,
  `SecondSemester` varchar(15) NOT NULL,
  `ThirdSemester` varchar(15) NOT NULL,
  `FourthSemester` varchar(15) NOT NULL,
  `FifthSemester` varchar(15) NOT NULL,
  `SixthSemester` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacherfeedbackstatus`
--

INSERT INTO `teacherfeedbackstatus` (`TeacherID`, `FirstSemester`, `SecondSemester`, `ThirdSemester`, `FourthSemester`, `FifthSemester`, `SixthSemester`) VALUES
('21522125', 'OFF', 'OFF', 'OFF', 'OFF', 'ON', 'OFF'),
('31717558', 'OFF', 'OFF', 'OFF', 'OFF', 'ON', 'OFF'),
('91520347', 'OFF', 'OFF', 'OFF', 'OFF', 'ON', 'OFF');

-- --------------------------------------------------------

--
-- Table structure for table `teacherslist`
--

CREATE TABLE `teacherslist` (
  `teacherID` varchar(50) NOT NULL,
  `MobileNumber` varchar(15) NOT NULL,
  `TeacherName` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `feedbackstatus` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacherslist`
--

INSERT INTO `teacherslist` (`teacherID`, `MobileNumber`, `TeacherName`, `branch`, `feedbackstatus`) VALUES
('21522125', '7006123456', 'FAZILA', 'ComputerEngg', ''),
('31717558', '9906454323', 'ABID HUSSAIN', 'ComputerEngg', ''),
('91520347', '9906454323', 'UZMA ', 'ComputerEngg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedbackquestions`
--
ALTER TABLE `feedbackquestions`
  ADD PRIMARY KEY (`QuestionID`);

--
-- Indexes for table `hodlogin`
--
ALTER TABLE `hodlogin`
  ADD PRIMARY KEY (`MobileNumber`);

--
-- Indexes for table `studentfeedback`
--
ALTER TABLE `studentfeedback`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `studentlogin`
--
ALTER TABLE `studentlogin`
  ADD PRIMARY KEY (`RollNumber`);

--
-- Indexes for table `teacherfeedbackstatus`
--
ALTER TABLE `teacherfeedbackstatus`
  ADD PRIMARY KEY (`TeacherID`);

--
-- Indexes for table `teacherslist`
--
ALTER TABLE `teacherslist`
  ADD PRIMARY KEY (`teacherID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedbackquestions`
--
ALTER TABLE `feedbackquestions`
  MODIFY `QuestionID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `studentfeedback`
--
ALTER TABLE `studentfeedback`
  MODIFY `SNo` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
