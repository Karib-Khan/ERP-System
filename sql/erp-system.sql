-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2025 at 05:21 AM
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
-- Database: `erp-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `user_id` varchar(10) DEFAULT NULL,
  `pass` varchar(255) NOT NULL,
  `department` enum('HR','IT','Sales','Finnance','Administration') DEFAULT NULL,
  `state` enum('Active','Blocked') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`user_id`, `pass`, `department`, `state`, `created_at`) VALUES
('ADM00001', '$2y$10$80YOaSGfA9Po5Kh6ov6HzeikO9aPt1mEFRG/yFH7RJYir90FQlE0u', 'Administration', 'Active', '2025-06-27 15:18:05');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `user_id` varchar(10) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `department` varchar(30) DEFAULT NULL,
  `state` enum('Active','Blocked') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`user_id`, `pass`, `department`, `state`, `created_at`) VALUES
('EMP00050', '$2y$10$LoBKQJ2jfsbEEaZ8raH7BuwQVr5a8f5f64FmetUZGRDBXgZOM9vwq', 'Employee', 'Active', '2025-06-27 15:26:06');

-- --------------------------------------------------------

--
-- Table structure for table `hr`
--

CREATE TABLE `hr` (
  `user_id` varchar(10) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `department` varchar(30) DEFAULT NULL,
  `state` enum('Active','Blocked') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hr`
--

INSERT INTO `hr` (`user_id`, `pass`, `department`, `state`, `created_at`) VALUES
('HRM00048', '$2y$10$CXFgOqM1Kx4sxd.RchIOROu4zllvwnAhuK3COyjdEtWFggs6k1I0O', 'HR', 'Active', '2025-06-27 15:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `assigned_by` varchar(10) DEFAULT NULL,
  `assigned_to` varchar(10) DEFAULT NULL,
  `task_title` varchar(100) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `due_date` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `assigned_by`, `assigned_to`, `task_title`, `description`, `due_date`, `created_at`) VALUES
(7, 'ADM00001', 'HRM00048', 'df', 'zfdbdfb', '2025-06-30 19:01:21', '2025-06-29 17:01:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` varchar(10) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `maritial_status` enum('Married','Unmarried','Widowed','divorced') DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nid` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `age`, `dob`, `gender`, `nationality`, `maritial_status`, `address`, `phone`, `email`, `nid`, `created_at`, `name`) VALUES
(47, 'ADM00001', 25, '2025-06-01', 'Male', 'Bangladeshi', 'Married', 'A-336 Azibpur Siddhirganj', '01817534109', 'abdurrahmanfarukkhan@gmail.com', '42154841323', '2025-06-27 15:18:05', 'Abdur Rahman Faruk Khan'),
(49, 'HRM00048', 30, '2000-01-01', 'Male', 'Bangladeshi', '', 'A-336 Azibpur Siddhirganj', '01601155916', 'karib.khan2015@gmail.com', '1234567890123456', '2025-06-27 15:25:04', 'karib khan'),
(50, 'EMP00050', 20, '2025-06-01', 'Female', 'Bangladeshi', '', 'A-336 Azibpur Siddhirganj', '01705126818', 'karib.khan2k20@gmail.com', '2345636415365', '2025-06-27 15:26:06', 'nabila ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD UNIQUE KEY `admin_id` (`user_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `hr`
--
ALTER TABLE `hr`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nid` (`nid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
