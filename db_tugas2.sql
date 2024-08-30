-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 30, 2024 at 02:21 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tugas2`
--

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id_reports` int NOT NULL,
  `id_warnings` int NOT NULL,
  `id_gpas` int NOT NULL,
  `id_guidance` int NOT NULL,
  `id_achievements` int NOT NULL,
  `id_sholarship` int NOT NULL,
  `id_student_withdrawals` int NOT NULL,
  `id_tuition_arrears` int NOT NULL,
  `report_date` date NOT NULL,
  `status` enum('Pending','Approved','Rejected') NOT NULL,
  `has_acc_academic_advisor` tinyint(1) NOT NULL,
  `has_acc_head_of_program` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id_reports`, `id_warnings`, `id_gpas`, `id_guidance`, `id_achievements`, `id_sholarship`, `id_student_withdrawals`, `id_tuition_arrears`, `report_date`, `status`, `has_acc_academic_advisor`, `has_acc_head_of_program`) VALUES
(10, 10, 10, 10, 10, 10, 10, 10, '2024-08-30', 'Approved', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_withdrawals`
--

CREATE TABLE `student_withdrawals` (
  `id_student_withdrawals` int NOT NULL,
  `id_student` int NOT NULL,
  `withdrawals_type` enum('Withdrawals','Drop Out') NOT NULL,
  `decree_number` varchar(500) NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_withdrawals`
--

INSERT INTO `student_withdrawals` (`id_student_withdrawals`, `id_student`, `withdrawals_type`, `decree_number`, `reason`) VALUES
(1, 123, 'Drop Out', '100', 'malas'),
(2, 789, 'Withdrawals', '100', 'jakhsvfdh'),
(3, 456, 'Drop Out', '300', 'asfhhrt'),
(4, 12, 'Withdrawals', '100', 'sajmhbasd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id_reports`);

--
-- Indexes for table `student_withdrawals`
--
ALTER TABLE `student_withdrawals`
  ADD PRIMARY KEY (`id_student_withdrawals`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id_reports` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_withdrawals`
--
ALTER TABLE `student_withdrawals`
  MODIFY `id_student_withdrawals` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
