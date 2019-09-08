-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2019 at 02:24 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `besttraders`
--

-- --------------------------------------------------------

--
-- Table structure for table `child_cat`
--

CREATE TABLE `child_cat` (
  `child_cat_id` bigint(20) UNSIGNED NOT NULL,
  `subroot_cat_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `cost` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image_url` varchar(300) NOT NULL,
  `status` int(10) NOT NULL,
  `hasChildElement` tinyint(1) NOT NULL,
  `rating` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `child_cat`
--

INSERT INTO `child_cat` (`child_cat_id`, `subroot_cat_id`, `product_name`, `cost`, `quantity`, `image_url`, `status`, `hasChildElement`, `rating`) VALUES
(1, 1, 'children', 99999, 99999, 'http://www.google.com', 1, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `root_cat`
--

CREATE TABLE `root_cat` (
  `root_cat_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `cost` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image_url` varchar(300) NOT NULL,
  `status` int(10) NOT NULL,
  `hasChildElement` tinyint(1) NOT NULL,
  `rating` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `root_cat`
--

INSERT INTO `root_cat` (`root_cat_id`, `product_name`, `cost`, `quantity`, `image_url`, `status`, `hasChildElement`, `rating`) VALUES
(1, 'Test One', 999999, 999999, 'https://www.google.com/google.png', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subroot_cat`
--

CREATE TABLE `subroot_cat` (
  `subroot_cat_id` bigint(20) UNSIGNED NOT NULL,
  `root_cat_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `cost` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image_url` varchar(300) NOT NULL,
  `status` int(10) NOT NULL,
  `hasChildElement` tinyint(1) NOT NULL,
  `rating` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subroot_cat`
--

INSERT INTO `subroot_cat` (`subroot_cat_id`, `root_cat_id`, `product_name`, `cost`, `quantity`, `image_url`, `status`, `hasChildElement`, `rating`) VALUES
(1, 1, 'nikhil', 99999, 99999, 'https://www.google.com/login.png', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `mobile_no` varchar(16) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `otp_dig` varchar(8) NOT NULL,
  `otp_expiredate` datetime NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email_id` varchar(150) NOT NULL,
  `user_location_x` double NOT NULL,
  `user_location_y` double NOT NULL,
  `user_status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`mobile_no`, `user_password`, `otp_dig`, `otp_expiredate`, `full_name`, `email_id`, `user_location_x`, `user_location_y`, `user_status`) VALUES
('9495894632', '1234567', '881853', '0000-00-00 00:00:00', 'abc', 'test@gmail.com', 1.34, 4.45, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `child_cat`
--
ALTER TABLE `child_cat`
  ADD PRIMARY KEY (`child_cat_id`),
  ADD KEY `subroot_cat_id` (`subroot_cat_id`);

--
-- Indexes for table `root_cat`
--
ALTER TABLE `root_cat`
  ADD PRIMARY KEY (`root_cat_id`);

--
-- Indexes for table `subroot_cat`
--
ALTER TABLE `subroot_cat`
  ADD PRIMARY KEY (`subroot_cat_id`),
  ADD KEY `root_cat_id` (`root_cat_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`mobile_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `child_cat`
--
ALTER TABLE `child_cat`
  MODIFY `child_cat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `root_cat`
--
ALTER TABLE `root_cat`
  MODIFY `root_cat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subroot_cat`
--
ALTER TABLE `subroot_cat`
  MODIFY `subroot_cat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `child_cat`
--
ALTER TABLE `child_cat`
  ADD CONSTRAINT `child_cat_ibfk_1` FOREIGN KEY (`subroot_cat_id`) REFERENCES `subroot_cat` (`subroot_cat_id`);

--
-- Constraints for table `subroot_cat`
--
ALTER TABLE `subroot_cat`
  ADD CONSTRAINT `subroot_cat_ibfk_1` FOREIGN KEY (`root_cat_id`) REFERENCES `root_cat` (`root_cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
