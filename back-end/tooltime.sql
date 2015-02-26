-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 26, 2015 at 12:00 AM
-- Server version: 5.5.41-cll-lve
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tooltime`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(32) NOT NULL,
  `lastName` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `title` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `firstName`, `lastName`, `email`, `hash`, `title`) VALUES
(13, 'Brandon', 'Lacquement', 'brandonl@bayley.net', 'sha256:1000:TkjeKGWvlS0f1HM8CGaR/G7YGWsb+7FG:VzDmjiUBff6q/mhgjG6lbHFxO1qpQFla', 'Admin'),
(18, 'Chris', 'Reigel', 'chrisr@bayley.net', 'sha256:1000:6eKkzpfD+VhywjWMjudwwi+tZMpcsdjq:zW3r2UsaW5KErA6E+DA+TKdIICE5AwWA', 'Admin'),
(19, 'Rick', 'Reigel', 'rick.reigel@bayley.net', 'sha256:1000:zlxAil6J3JUu6ngstmsW9VZbQa4ee8Ze:LZh4hr05RBIdqpw11HGpBtO7XUQk18gl', 'Superintendent'),
(20, 'Rick', 'Oelke', 'rick.oelke@bayley.net', 'sha256:1000:sHauXagbTLYyRdyjkEV6QtlLRIlgwv/O:0npXzu4DmcQZT8KZdbA1Q21NzrcnfU+P', 'Superintendent'),
(21, 'Zach', 'Eggert', 'zach.eggert@bayley.net', 'sha256:1000:P+WCT7YNgWfc8mFfYGyZL0x0KrcLcUYE:xM1hl4K/XivIukYjWb5YxDZMaoJaPz8e', 'PE'),
(22, 'Al', 'Albertini', 'al.albertini@bayley.net', 'sha256:1000:OWG2+f/cVjmPGEyrVF0C3lIzv9D33yzs:H1d1PaQSXFHtEkOR99KAG/euEjes+y0n', 'Superintendent'),
(23, 'Billy', 'Morales', 'billy.morales@bayley.net', 'sha256:1000:hLV1KbigAUwyFMOwPg9gLfpfY/gTwVo+:PujdunZIaSy2fHvUuOhZsaK/rEsBM8g0', 'PE');

-- --------------------------------------------------------

--
-- Table structure for table `rental_log`
--

CREATE TABLE IF NOT EXISTS `rental_log` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `out` int(16) NOT NULL,
  `in` int(16) NOT NULL,
  `tool_id` int(16) NOT NULL,
  `employee_id` int(16) NOT NULL,
  `job_no` int(16) NOT NULL,
  `costcode` int(16) NOT NULL,
  `time_rented` int(16) NOT NULL,
  `cost` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `out` (`out`),
  KEY `in` (`in`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE IF NOT EXISTS `tools` (
  `toolID` int(16) NOT NULL AUTO_INCREMENT,
  `bayleyID` int(6) NOT NULL,
  `category` varchar(32) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dailyPrice` double(7,2) NOT NULL,
  `weeklyPrice` double(7,2) NOT NULL,
  `monthlyPrice` double(7,2) NOT NULL,
  `toolValue` double(7,2) NOT NULL,
  `status` varchar(16) NOT NULL,
  `location` varchar(16) NOT NULL,
  PRIMARY KEY (`toolID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`toolID`, `bayleyID`, `category`, `name`, `dailyPrice`, `weeklyPrice`, `monthlyPrice`, `toolValue`, `status`, `location`) VALUES
(6, 1, 'Power Tools', 'Hand Drill', 5.50, 38.50, 165.00, 160.00, 'out', 'Phoenix'),
(7, 2, 'Hand Tools', 'Screw driver', 1.00, 7.00, 30.00, 15.00, 'out', 'Phoenix'),
(8, 3, 'Office', 'monitor', 2.00, 10.00, 60.00, 60.00, 'out', 'Phoenix'),
(9, 4, 'Safety', 'cones - 100', 10.00, 70.00, 3000.00, 1500.00, 'out', 'Phoenix'),
(10, 5, 'Lifts', 'forklift', 100.00, 700.00, 3000.00, 2900.00, 'out', 'Phoenix'),
(11, 6, 'Traffic', 'Stop Sign', 1.00, 7.00, 30.00, 25.00, 'out', 'Phoenix'),
(12, 7, 'Cleaning', 'rags - 20', 1.00, 7.00, 30.00, 30.00, 'out', 'Phoenix'),
(13, 8, 'Other', 'rake', 0.50, 3.50, 15.00, 20.00, 'out', 'Phoenix'),
(14, 9, 'Power Tools', 'Jack Hammer', 10.00, 70.00, 300.00, 2000.00, 'out', 'Phoenix'),
(15, 10, 'Power Tools', 'Concrete Mixer', 15.00, 100.00, 400.00, 1000.00, 'out', 'Phoenix'),
(16, 11, 'Hand Tools', 'Hammer', 1.00, 7.00, 30.00, 25.00, 'out', 'Phoenix'),
(17, 12, 'Hand Tools', 'Flathead Screwdriver', 1.00, 5.00, 15.00, 15.00, 'out', 'Phoenix'),
(18, 13, 'Office', 'Printer', 2.00, 12.00, 50.00, 100.00, 'out', 'Phoenix'),
(19, 14, 'Office', 'Mouse', 1.00, 5.00, 20.00, 20.00, 'out', 'Phoenix'),
(20, 15, 'Cleaning', 'Mop', 1.00, 3.00, 20.00, 30.00, 'out', 'Phoenix'),
(21, 16, 'Cleaning', 'Broom - Set of 5', 1.00, 7.00, 25.00, 50.00, 'out', 'Phoenix'),
(22, 17, 'Lifts', 'Pneumatic Lift', 20.00, 140.00, 500.00, 600.00, 'in', 'Seattle'),
(23, 18, 'Lifts', 'Jack Lift', 5.00, 30.00, 130.00, 150.00, 'in', 'Seattle'),
(24, 19, 'Traffic', 'Yield Sign', 1.00, 7.00, 30.00, 25.00, 'in', 'Seattle'),
(25, 20, 'Traffic', 'Slow Sign', 1.00, 7.00, 30.00, 25.00, 'out', 'Phoenix'),
(26, 25, 'Safety', 'Gloves', 1.00, 5.00, 15.00, 15.00, 'out', 'Phoenix'),
(27, 21, 'Safety', 'Hard Hats - Set of 10', 10.00, 50.00, 180.00, 170.00, 'out', 'Phoenix'),
(28, 22, 'Other', 'Tool Box', 1.00, 5.00, 15.00, 15.00, 'out', 'Phoenix'),
(29, 23, 'Other', 'Paint Brush - Set of 5', 10.00, 20.00, 40.00, 40.00, 'in', 'Seattle');

-- --------------------------------------------------------

--
-- Table structure for table `trans_log`
--

CREATE TABLE IF NOT EXISTS `trans_log` (
  `trans_no` int(16) NOT NULL AUTO_INCREMENT,
  `type` varchar(3) NOT NULL,
  `tool_id` int(16) NOT NULL,
  `employee_id` int(16) NOT NULL,
  `job_no` int(16) NOT NULL,
  `costcode` int(16) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`trans_no`),
  KEY `tool_id` (`tool_id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `trans_log`
--

INSERT INTO `trans_log` (`trans_no`, `type`, `tool_id`, `employee_id`, `job_no`, `costcode`, `timestamp`) VALUES
(2, 'out', 8, 13, 2, 12324, '2015-02-25 16:30:08'),
(3, 'out', 6, 13, 4, 59856, '2015-02-25 00:34:33'),
(4, 'out', 7, 18, 20, 65985, '2015-02-25 00:35:13'),
(5, 'out', 9, 18, 84, 55985, '2015-02-25 00:36:23'),
(6, 'out', 10, 19, 10, 95874, '2015-02-25 00:36:23'),
(7, 'out', 11, 19, 85, 99587, '2015-02-25 00:38:10'),
(8, 'out', 12, 20, 54875, 22598, '2015-02-25 00:38:16'),
(9, 'out', 13, 20, 45214, 44578, '2015-02-25 00:39:19'),
(10, 'out', 14, 21, 45874, 11245, '2015-02-25 00:39:19'),
(11, 'out', 15, 21, 458, 11458, '2015-02-25 00:42:12'),
(12, 'out', 16, 22, 7, 44587, '2015-02-25 00:42:12'),
(13, 'out', 17, 22, 4, 77869, '2015-02-25 00:42:12'),
(14, 'out', 18, 23, 4, 44587, '2015-02-25 00:42:12'),
(15, 'out', 19, 23, 8, 11457, '2015-02-25 00:42:12');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rental_log`
--
ALTER TABLE `rental_log`
  ADD CONSTRAINT `rental_log_ibfk_2` FOREIGN KEY (`in`) REFERENCES `trans_log` (`trans_no`),
  ADD CONSTRAINT `rental_log_ibfk_1` FOREIGN KEY (`out`) REFERENCES `trans_log` (`trans_no`);

--
-- Constraints for table `trans_log`
--
ALTER TABLE `trans_log`
  ADD CONSTRAINT `trans_log_ibfk_1` FOREIGN KEY (`tool_id`) REFERENCES `tools` (`toolID`),
  ADD CONSTRAINT `trans_log_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
