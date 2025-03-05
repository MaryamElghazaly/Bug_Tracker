-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2024 at 12:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bugtrackingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned_bugs`
--

CREATE TABLE `assigned_bugs` (
  `AssignID` int(11) NOT NULL,
  `BugID` int(11) NOT NULL,
  `StaffID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bugs`
--

CREATE TABLE `bugs` (
  `BugID` int(11) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `Project` varchar(100) DEFAULT NULL,
  `Description` text NOT NULL,
  `Status` enum('New','Assigned','Resolved','Closed') DEFAULT 'New',
  `AssignedTo` int(11) DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bugs`
--

INSERT INTO `bugs` (`BugID`, `Category`, `Project`, `Description`, `Status`, `AssignedTo`, `CreatedAt`) VALUES
(1, 'backend', 'c++', 'lolololololo', 'New', NULL, '2024-05-09 05:56:31'),
(2, 'problem-solving', 'c++', 'i have a bug', 'New', NULL, '2024-05-09 11:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `bugsolutions`
--

CREATE TABLE `bugsolutions` (
  `SolutionID` int(11) NOT NULL,
  `BugID` int(11) NOT NULL,
  `Solution` text NOT NULL,
  `SubmittedBy` int(11) DEFAULT NULL,
  `SubmittedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `MessageID` int(11) NOT NULL,
  `SenderID` int(11) NOT NULL,
  `RecipientID` int(11) NOT NULL,
  `Subject` varchar(255) DEFAULT NULL,
  `Content` text NOT NULL,
  `SentAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `IsRead` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`MessageID`, `SenderID`, `RecipientID`, `Subject`, `Content`, `SentAt`, `IsRead`) VALUES
(3, 1, 1, 'hi', 'welcome to our website', '2024-05-09 10:46:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Role` enum('admin','staff','customer') NOT NULL,
  `Department` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `FullName`, `Email`, `Password`, `Role`, `Department`) VALUES
(1, 'medhat', 'Medhat@outlook.com', '$2y$10$aRlkareKlUE4Cebj5D7bfevgjr17bndL4tRoHFOjH/FUqC7MsYGL.', 'admin', NULL),
(8, 'MEDHAT', 'MEDHAT@LOOOL.COM', '$2y$10$QMFAYxjldkGcW33dd.SCPexajnE0UMthSwOZODsLTP0TkSO9vzWY.', 'staff', ''),
(9, 'mazen', 'mazen1@gmail.com', '$2y$10$jj9VBsO7CFdvfpFQfLk5YuAric1QRHAz87dOrHT/e3AbmiOH.4NwK', 'customer', NULL),
(10, 'medhat', 'medhat1@gmail.com', '$2y$10$ws5GEIbQNj/e57qcyqvsNu1hQaabYIyospcRdXSIFaIOfeKBeP4Dq', 'customer', NULL),
(11, 'medhat', 'medhat@example.com', '$2y$10$PCelHbTo9UwCqk6scjGnFOXlBStxWl08Cx1QRGUl6XVgxV.AvP/Ru', 'customer', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigned_bugs`
--
ALTER TABLE `assigned_bugs`
  ADD PRIMARY KEY (`AssignID`),
  ADD KEY `BugID` (`BugID`),
  ADD KEY `StaffID` (`StaffID`);

--
-- Indexes for table `bugs`
--
ALTER TABLE `bugs`
  ADD PRIMARY KEY (`BugID`),
  ADD KEY `AssignedTo` (`AssignedTo`);

--
-- Indexes for table `bugsolutions`
--
ALTER TABLE `bugsolutions`
  ADD PRIMARY KEY (`SolutionID`),
  ADD KEY `BugID` (`BugID`),
  ADD KEY `SubmittedBy` (`SubmittedBy`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`MessageID`),
  ADD KEY `SenderID` (`SenderID`),
  ADD KEY `RecipientID` (`RecipientID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assigned_bugs`
--
ALTER TABLE `assigned_bugs`
  MODIFY `AssignID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bugs`
--
ALTER TABLE `bugs`
  MODIFY `BugID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bugsolutions`
--
ALTER TABLE `bugsolutions`
  MODIFY `SolutionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigned_bugs`
--
ALTER TABLE `assigned_bugs`
  ADD CONSTRAINT `assigned_bugs_ibfk_1` FOREIGN KEY (`BugID`) REFERENCES `bugs` (`BugID`),
  ADD CONSTRAINT `assigned_bugs_ibfk_2` FOREIGN KEY (`StaffID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `bugs`
--
ALTER TABLE `bugs`
  ADD CONSTRAINT `bugs_ibfk_1` FOREIGN KEY (`AssignedTo`) REFERENCES `users` (`UserID`) ON DELETE SET NULL;

--
-- Constraints for table `bugsolutions`
--
ALTER TABLE `bugsolutions`
  ADD CONSTRAINT `bugsolutions_ibfk_1` FOREIGN KEY (`BugID`) REFERENCES `bugs` (`BugID`) ON DELETE CASCADE,
  ADD CONSTRAINT `bugsolutions_ibfk_2` FOREIGN KEY (`SubmittedBy`) REFERENCES `users` (`UserID`) ON DELETE SET NULL;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`SenderID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`RecipientID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
