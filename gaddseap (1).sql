-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2018 at 07:19 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gaddseap`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` varchar(255) NOT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `account_password` varchar(255) DEFAULT NULL,
  `account_status` varchar(20) DEFAULT NULL,
  `account_type` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `account_name`, `account_password`, `account_status`, `account_type`) VALUES
('11122018VE9UVE', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'INACTIVE', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `log_id` int(100) NOT NULL,
  `account_id` varchar(255) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `log_date_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`log_id`, `account_id`, `account_name`, `activity`, `log_date_time`) VALUES
(0, 'SUPER ADMIN', 'KNIGHTDAVEION', 'Logged In Using IP ::1', 'Monday 12th of November 2018 02:09:51 PM');

-- --------------------------------------------------------

--
-- Table structure for table `family_background`
--

CREATE TABLE `family_background` (
  `id` int(11) NOT NULL,
  `record_id` text,
  `father` text,
  `father_age` text,
  `father_occupation` text,
  `mother` text,
  `mother_age` text,
  `mother_occupation` text,
  `siblings_1` text,
  `1_age` text,
  `1_occupation` text,
  `siblings_2` text,
  `2_age` text,
  `2_occupation` text,
  `siblings_3` text,
  `3_age` text,
  `3_occupation` text,
  `spouse` text,
  `spouse_age` text,
  `spouse_occupation` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `family_background`
--

INSERT INTO `family_background` (`id`, `record_id`, `father`, `father_age`, `father_occupation`, `mother`, `mother_age`, `mother_occupation`, `siblings_1`, `1_age`, `1_occupation`, `siblings_2`, `2_age`, `2_occupation`, `siblings_3`, `3_age`, `3_occupation`, `spouse`, `spouse_age`, `spouse_occupation`) VALUES
(1, '11082018PVAQ4K', 'NICK ANCIANO', '11', 'FARMER', 'NENA CALPO', '11', 'NONE', 'NENA CALPO', '11', 'NONE', 'NENA CALPO', '11', 'NONE', 'NENA CALPO', '11', 'NONE', 'NENA CALPO', '11', 'NONE');

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE `personal_info` (
  `id` int(11) NOT NULL,
  `record_id` text,
  `first_name` text,
  `mi` text,
  `last_name` text,
  `ex` text,
  `address` text,
  `civil_status` text,
  `school` text,
  `birthdate` text,
  `course` text,
  `year` text,
  `citizenship` text,
  `contact_no` text,
  `age` text,
  `sex` text,
  `religion` text,
  `purpose` text,
  `educational` text,
  `record_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`id`, `record_id`, `first_name`, `mi`, `last_name`, `ex`, `address`, `civil_status`, `school`, `birthdate`, `course`, `year`, `citizenship`, `contact_no`, `age`, `sex`, `religion`, `purpose`, `educational`, `record_date`) VALUES
(11082018, NULL, 'JACKSON', 'R', 'ADORA', '', 'MASINLOC ZAMBALES', 'single', 'MASINLOC TRAINING CENTER', '15/03/1997', 'SMAW NC-II', '2018', 'Filipino', '09483283951', '21', 'M', 'CATHOLIC', NULL, 'project', NULL),
(11082019, '11082018PDYNX0', 'VERGIL', 'D', 'ALIPIO', '', 'P6 BANGANTALINGA IBA', 'married', 'TESDA PTC IBA', '08/11/2018', 'EIM NC II', '', 'Filipino', '09283649914', '40', 'M', 'R.C', NULL, 'books', '0000-00-00'),
(11082020, '11082018RW396E', 'JAYVIE', 'T', 'ALVEZ', '', 'LAOG, MALOMA, SAN FELIPE, ZAMBALES', 'single', 'PTC IBA', '17/06/1994', 'EIM NC II', '', 'Filipino', '09455373623', '24', 'M', 'CATHOLIC', 'Scholarship', 'project', '2018-11-08'),
(11082021, '11082018PVAQ4K', 'ALBERT', '', 'ANCIANO', '', 'BAMBAN MASINLOC ZAMBALES', 'Single', 'MASINLOC TRAINING CENTER', '29/03/1989', 'SMAW', '2018', 'Filipino', '09070584047', '29', 'M', 'CATHOLIC', 'Scholarship', 'Project', '2018-11-08');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `account_id` varchar(255) NOT NULL,
  `user_firstname` varchar(255) DEFAULT NULL,
  `user_lastname` varchar(255) DEFAULT NULL,
  `user_contact` varchar(13) DEFAULT NULL,
  `user_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`account_id`, `user_firstname`, `user_lastname`, `user_contact`, `user_status`) VALUES
('11122018VE9UVE', 'test', 'account', '123123213213', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `family_background`
--
ALTER TABLE `family_background`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `family_background`
--
ALTER TABLE `family_background`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_info`
--
ALTER TABLE `personal_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11082022;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
