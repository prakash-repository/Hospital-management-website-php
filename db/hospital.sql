-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2024 at 01:17 PM
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
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `name`, `email`, `password`) VALUES
(1, 'Prakash', 'prakash@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_schedule`
--

CREATE TABLE `appointment_schedule` (
  `aschedule_id` int(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `process` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment_schedule`
--

INSERT INTO `appointment_schedule` (`aschedule_id`, `date`, `time`, `process`) VALUES
(1, '2024-01-09', '9-AM to 10-AM', 'scheduled'),
(2, '2024-01-09', '10-AM to 11-AM', 'scheduled'),
(3, '2024-01-10', '9-AM to 10-AM', 'scheduled'),
(4, '2024-01-10', '8-PM to 9-PM', 'scheduled');

-- --------------------------------------------------------

--
-- Table structure for table `consultation_messages`
--

CREATE TABLE `consultation_messages` (
  `mid` int(50) NOT NULL,
  `sender_id` int(50) NOT NULL,
  `reciever_id` int(50) NOT NULL,
  `message` varchar(3000) NOT NULL,
  `log` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consultation_messages`
--

INSERT INTO `consultation_messages` (`mid`, `sender_id`, `reciever_id`, `message`, `log`) VALUES
(2, 974308680, 745315374, 'hello', '2024-01-14 14:03:33'),
(3, 974308680, 745315374, 'how are you?', '2024-01-14 14:22:13'),
(5, 745315374, 974308680, 'hi ma', '2024-01-14 19:11:57'),
(6, 745315374, 974308680, 'What happened?', '2024-01-14 19:30:11'),
(7, 974308680, 745315374, 'im suffering form fever in past 3days...', '2024-01-14 20:19:46'),
(8, 974308680, 745315374, 'ijihoio', '2024-01-22 13:26:24'),
(9, 745315374, 974308680, 'hi ma', '2024-01-22 13:27:28'),
(10, 974308680, 745315374, 'how are you doctor', '2024-01-22 13:31:24'),
(11, 745315374, 974308680, 'fine ma', '2024-01-22 13:31:45'),
(12, 974308680, 792235622, 'hi yamini ', '2024-01-22 13:33:16');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `did` int(50) NOT NULL,
  `doctor_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `age` int(100) NOT NULL,
  `specilization` varchar(200) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `creationdate` datetime NOT NULL,
  `updationdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`did`, `doctor_id`, `name`, `img`, `gender`, `age`, `specilization`, `contact`, `email`, `password`, `creationdate`, `updationdate`) VALUES
(1, 376529366, 'Andrew', '', 'male', 34, 'ENT', '1233211231', 'andrew@gmail.com', 'andrew', '2024-01-06 20:05:58', '0000-00-00 00:00:00'),
(3, 745315374, 'sunny leone', '', 'female', 27, 'Orthopedics', '8787878787', 'sunny@gmail.com', 'sunny', '2024-01-07 17:08:45', '0000-00-00 00:00:00'),
(5, 792235622, 'yamini', '', 'female', 20, 'Dental Care', '524354562', 'yamu@gmail.com', 'yamu', '2024-01-09 12:26:13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `pid` int(50) NOT NULL,
  `patient_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `age` int(50) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `bloodgrp` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `creationdate` datetime NOT NULL,
  `updationdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pid`, `patient_id`, `name`, `img`, `age`, `gender`, `bloodgrp`, `address`, `contact`, `email`, `password`, `creationdate`, `updationdate`) VALUES
(2, 974308680, 'Parkavi', '', 20, 'female', 'A+', 'old washermenpet', '9080509582', 'paru@gmail.com', 'paru', '2024-01-09 13:45:52', '0000-00-00 00:00:00'),
(3, 377787384, 'yamini', '', 20, 'female', 'B+', 'tondiarpet', '9485647384', 'yamu@gmail.com', 'yamu', '2024-01-14 17:09:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `patient_appointment`
--

CREATE TABLE `patient_appointment` (
  `appointment_id` int(50) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneno` varchar(50) NOT NULL,
  `symtoms` varchar(300) NOT NULL,
  `doctor_id` int(50) NOT NULL,
  `aschedule_id` int(50) NOT NULL,
  `log` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specilization`
--

CREATE TABLE `specilization` (
  `sid` int(50) NOT NULL,
  `specilization` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specilization`
--

INSERT INTO `specilization` (`sid`, `specilization`) VALUES
(1, 'Orthopedics'),
(2, 'Internal Medicine'),
(3, 'Obstetrics and Gynecology'),
(4, 'Dermatology'),
(5, 'Pediatrics'),
(6, 'Radiology'),
(7, 'General Surgery'),
(8, 'Ophthalmology'),
(9, 'Anesthesia'),
(10, 'Pathology'),
(11, 'ENT'),
(12, 'Dental Care'),
(13, 'Dermatologists'),
(14, 'Endocrinologists'),
(15, 'Neurologists');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `appointment_schedule`
--
ALTER TABLE `appointment_schedule`
  ADD PRIMARY KEY (`aschedule_id`);

--
-- Indexes for table `consultation_messages`
--
ALTER TABLE `consultation_messages`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `patient_appointment`
--
ALTER TABLE `patient_appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `specilization`
--
ALTER TABLE `specilization`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment_schedule`
--
ALTER TABLE `appointment_schedule`
  MODIFY `aschedule_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `consultation_messages`
--
ALTER TABLE `consultation_messages`
  MODIFY `mid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `did` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `pid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient_appointment`
--
ALTER TABLE `patient_appointment`
  MODIFY `appointment_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `specilization`
--
ALTER TABLE `specilization`
  MODIFY `sid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
