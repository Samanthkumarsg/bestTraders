-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2019 at 11:19 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `besttraders`
--

-- --------------------------------------------------------

--
-- Table structure for table `child_cat`
--

CREATE TABLE IF NOT EXISTS `child_cat` (
`child_cat_id` bigint(20) unsigned NOT NULL,
  `subroot_cat_id` bigint(20) unsigned NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `cost` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image_url` varchar(300) NOT NULL,
  `status` int(10) NOT NULL,
  `hasChildElement` tinyint(1) NOT NULL,
  `rating` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `child_cat`
--

INSERT INTO `child_cat` (`child_cat_id`, `subroot_cat_id`, `product_name`, `cost`, `quantity`, `image_url`, `status`, `hasChildElement`, `rating`) VALUES
(1, 1, 'children', 99999, 99999, 'http://www.google.com', 1, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `root_cat`
--

CREATE TABLE IF NOT EXISTS `root_cat` (
`root_cat_id` bigint(20) unsigned NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `cost` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image_url` varchar(300) NOT NULL,
  `status` int(10) NOT NULL,
  `hasChildElement` tinyint(1) NOT NULL,
  `rating` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `root_cat`
--

INSERT INTO `root_cat` (`root_cat_id`, `product_name`, `cost`, `quantity`, `image_url`, `status`, `hasChildElement`, `rating`) VALUES
(1, 'Test One', 999999, 999999, 'https://www.google.com/google.png', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subroot_cat`
--

CREATE TABLE IF NOT EXISTS `subroot_cat` (
`subroot_cat_id` bigint(20) unsigned NOT NULL,
  `root_cat_id` bigint(20) unsigned NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `cost` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image_url` varchar(300) NOT NULL,
  `status` int(10) NOT NULL,
  `hasChildElement` tinyint(1) NOT NULL,
  `rating` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subroot_cat`
--

INSERT INTO `subroot_cat` (`subroot_cat_id`, `root_cat_id`, `product_name`, `cost`, `quantity`, `image_url`, `status`, `hasChildElement`, `rating`) VALUES
(1, 1, 'nikhil', 99999, 99999, 'https://www.google.com/login.png', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE IF NOT EXISTS `user_address` (
`auto_id` int(11) NOT NULL,
  `mobile_no` varchar(16) NOT NULL,
  `address` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `location_x` varchar(255) NOT NULL,
  `location_y` varchar(255) NOT NULL,
  `pincode` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`auto_id`, `mobile_no`, `address`, `landmark`, `city`, `location_x`, `location_y`, `pincode`) VALUES
(1, '9495894632', '123,empire,lalbagh,mangalore', 'empire', 'mangalore', '1.23', '4.56', 575001),
(2, '9495894632', '123,kaikamba', 'church', 'mangalore', '789', '987', 574154);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
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

-- --------------------------------------------------------

--
-- Table structure for table `your_orders`
--

CREATE TABLE IF NOT EXISTS `your_orders` (
`auto_id` int(11) NOT NULL,
  `mobile_no` varchar(16) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `childElement` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `user_address_id` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `isPaid` varchar(255) NOT NULL,
  `amountPaidStatus` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `your_orders`
--

INSERT INTO `your_orders` (`auto_id`, `mobile_no`, `product_name`, `cost`, `quantity`, `image_url`, `status`, `childElement`, `cat_id`, `user_address_id`, `order_status`, `isPaid`, `amountPaidStatus`) VALUES
(1, '9495894632', 'boat_earphone', 2000, 1, 'www.google.com/boat-earphone', '1', 1, 2, 3, 1, '0', '2'),
(2, '9495894632', 'jbl', 2000, 1, 'www.google.com/jbl-earphone', '1', 1, 2, 3, 1, '0', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `child_cat`
--
ALTER TABLE `child_cat`
 ADD PRIMARY KEY (`child_cat_id`), ADD KEY `subroot_cat_id` (`subroot_cat_id`);

--
-- Indexes for table `root_cat`
--
ALTER TABLE `root_cat`
 ADD PRIMARY KEY (`root_cat_id`);

--
-- Indexes for table `subroot_cat`
--
ALTER TABLE `subroot_cat`
 ADD PRIMARY KEY (`subroot_cat_id`), ADD KEY `root_cat_id` (`root_cat_id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
 ADD PRIMARY KEY (`auto_id`), ADD KEY `auto_id` (`auto_id`), ADD KEY `mobile_no` (`mobile_no`), ADD KEY `auto_id_2` (`auto_id`), ADD KEY `mobile_no_2` (`mobile_no`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
 ADD PRIMARY KEY (`mobile_no`);

--
-- Indexes for table `your_orders`
--
ALTER TABLE `your_orders`
 ADD KEY `auto_id` (`auto_id`), ADD KEY `mobile_no` (`mobile_no`), ADD KEY `auto_id_2` (`auto_id`), ADD KEY `mobile_no_2` (`mobile_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `child_cat`
--
ALTER TABLE `child_cat`
MODIFY `child_cat_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `root_cat`
--
ALTER TABLE `root_cat`
MODIFY `root_cat_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subroot_cat`
--
ALTER TABLE `subroot_cat`
MODIFY `subroot_cat_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
MODIFY `auto_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `your_orders`
--
ALTER TABLE `your_orders`
MODIFY `auto_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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

--
-- Constraints for table `your_orders`
--
ALTER TABLE `your_orders`
ADD CONSTRAINT `your_orders_ibfk_1` FOREIGN KEY (`mobile_no`) REFERENCES `user_address` (`mobile_no`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
