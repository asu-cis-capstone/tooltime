-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2015 at 04:03 AM
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
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `jobId` int(6) NOT NULL AUTO_INCREMENT,
  `jobNum` int(5) NOT NULL,
  `jobName` varchar(100) NOT NULL,
  PRIMARY KEY (`jobId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jobId`, `jobNum`, `jobName`) VALUES
(2, 14163, 'Walmart Chandler AZ'),
(3, 15031, 'Walmart Casa Grande AZ'),
(4, 15035, 'Kiwanis Park Restrooms'),
(5, 15024, 'JCP Salt Lake'),
(6, 15025, 'JCP Denver');

-- --------------------------------------------------------

--
-- Table structure for table `rental_log`
--

CREATE TABLE IF NOT EXISTS `rental_log` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `time_out` int(16) NOT NULL,
  `time_in` int(16) NOT NULL,
  `tool_id` int(6) unsigned zerofill NOT NULL,
  `employee_id` int(16) NOT NULL,
  `job_no` int(16) NOT NULL,
  `costcode` int(16) NOT NULL,
  `time_rented` int(16) NOT NULL,
  `cost` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `out` (`time_out`),
  KEY `in` (`time_in`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `rental_log`
--

INSERT INTO `rental_log` (`id`, `time_out`, `time_in`, `tool_id`, `employee_id`, `job_no`, `costcode`, `time_rented`, `cost`) VALUES
(31, 2015, 2015, 000043, 13, 15024, 12345123, 1, '5'),
(32, 2015, 2015, 000066, 13, 14163, 12345678, 1, '5'),
(33, 2015, 2015, 000043, 13, 14163, 12345123, 1, '5'),
(34, 2015, 2015, 000052, 13, 14163, 12345678, 1, '5'),
(35, 2015, 2015, 000065, 13, 14163, 12345123, 1, '5'),
(36, 2015, 2015, 000043, 13, 14163, 12345678, 1, '5'),
(37, 2015, 2015, 000043, 13, 14163, 12345678, 1, '5'),
(38, 2015, 2015, 000043, 13, 14163, 12345678, 1, '5'),
(39, 2015, 2015, 000001, 13, 14163, 12345678, 1, '10'),
(40, 2015, 2015, 000091, 13, 14163, 12345678, 1, '5'),
(41, 2015, 2015, 000006, 13, 14163, 12345678, 1, '15');

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE IF NOT EXISTS `tools` (
  `toolID` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `bayleyID` int(6) unsigned zerofill NOT NULL,
  `category` varchar(32) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dailyPrice` double(7,2) NOT NULL,
  `weeklyPrice` double(7,2) NOT NULL,
  `monthlyPrice` double(7,2) NOT NULL,
  `toolValue` double(7,2) NOT NULL,
  `status` varchar(16) NOT NULL,
  `location` varchar(16) NOT NULL,
  PRIMARY KEY (`toolID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10005 ;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`toolID`, `bayleyID`, `category`, `name`, `dailyPrice`, `weeklyPrice`, `monthlyPrice`, `toolValue`, `status`, `location`) VALUES
(000001, 000001, 'Traffic', '55 Gal Drum', 10.00, 1.00, 1.00, 60.00, 'in', 'Phoenix'),
(000002, 000002, 'Traffic', '55 Gal Drum', 10.00, 1.00, 1.00, 60.00, 'in', 'Phoenix'),
(000003, 000003, 'Traffic', '55 Gal Drum', 10.00, 1.00, 1.00, 60.00, 'in', 'Phoenix'),
(000004, 000004, 'Traffic', '55 Gal Drum', 10.00, 1.00, 1.00, 60.00, 'in', 'Phoenix'),
(000005, 000005, 'Traffic', '55 Gal Drum', 10.00, 1.00, 1.00, 60.00, 'in', 'Phoenix'),
(000006, 000006, 'Other', 'Microwave 1.1 CF', 15.00, 1.00, 1.00, 100.00, 'in', 'Phoenix'),
(000007, 000007, 'Other', 'Furniture Mover', 10.00, 1.00, 1.00, 40.00, 'in', 'Phoenix'),
(000008, 000008, 'Other', 'Furniture Mover', 10.00, 1.00, 1.00, 40.00, 'in', 'Phoenix'),
(000009, 000009, 'Other', 'Furniture Mover', 10.00, 1.00, 1.00, 40.00, 'in', 'Phoenix'),
(000010, 000010, 'Other', 'Furniture Mover', 10.00, 1.00, 1.00, 40.00, 'in', 'Phoenix'),
(000011, 000011, 'Other', 'Furniture Mover', 10.00, 1.00, 1.00, 40.00, 'in', 'Phoenix'),
(000012, 000012, 'Other', 'Furniture Mover', 10.00, 1.00, 1.00, 40.00, 'in', 'Phoenix'),
(000013, 000013, 'Other', '6 plug power strip', 2.00, 1.00, 1.00, 10.00, 'in', 'Phoenix'),
(000014, 000014, 'Other', 'Padlock', 2.00, 1.00, 1.00, 3.00, 'in', 'Phoenix'),
(000015, 000015, 'Other', 'Padlock', 2.00, 1.00, 1.00, 3.00, 'in', 'Phoenix'),
(000016, 000016, 'Other', 'Padlock', 2.00, 1.00, 1.00, 3.00, 'in', 'Phoenix'),
(000017, 000017, 'Other', 'Padlock', 2.00, 1.00, 1.00, 3.00, 'in', 'Phoenix'),
(000018, 000018, 'Other', 'Padlock', 2.00, 1.00, 1.00, 3.00, 'in', 'Phoenix'),
(000019, 000019, 'Other', 'Padlock', 2.00, 1.00, 1.00, 3.00, 'in', 'Phoenix'),
(000020, 000020, 'Lifts', 'Scissor lift diaper', 0.00, 1.00, 1.00, 1000.00, 'in', 'Phoenix'),
(000021, 000021, 'Other', 'Small refrigerator', 5.00, 1.00, 1.00, 150.00, 'in', 'Phoenix'),
(000022, 000022, 'Safety', '4ft Stepladder', 3.00, 1.00, 1.00, 20.00, 'in', 'Phoenix'),
(000023, 000023, 'Safety', '10ft Stepladder', 4.00, 1.00, 1.00, 40.00, 'in', 'Phoenix'),
(000024, 000024, 'Safety', '8ft Stepladder', 3.50, 1.00, 1.00, 30.00, 'in', 'Phoenix'),
(000025, 000025, 'Other', '6 ft folding table', 4.00, 1.00, 1.00, 15.00, 'in', 'Phoenix'),
(000026, 000026, 'Other', '6 ft folding table', 4.00, 1.00, 1.00, 15.00, 'in', 'Phoenix'),
(000027, 000027, 'Other', '6 ft folding table', 4.00, 1.00, 1.00, 15.00, 'in', 'Phoenix'),
(000028, 000028, 'Other', '6 ft folding table', 4.00, 1.00, 1.00, 15.00, 'in', 'Phoenix'),
(000029, 000029, 'Other', '6 ft folding table', 4.00, 1.00, 1.00, 15.00, 'in', 'Phoenix'),
(000030, 000030, 'Other', 'Plastic sawhorse', 4.00, 1.00, 1.00, 15.00, 'in', 'Phoenix'),
(000031, 000031, 'Other', 'Plastic sawhorse', 4.00, 1.00, 1.00, 15.00, 'in', 'Phoenix'),
(000032, 000032, 'Other', 'Plastic sawhorse', 4.00, 1.00, 1.00, 15.00, 'in', 'Phoenix'),
(000033, 000033, 'Other', 'Plastic sawhorse', 4.00, 1.00, 1.00, 15.00, 'in', 'Phoenix'),
(000034, 000034, 'Other', 'Plastic sawhorse', 4.00, 1.00, 1.00, 15.00, 'in', 'Phoenix'),
(000035, 000035, 'Other', 'Plastic sawhorse', 4.00, 1.00, 1.00, 15.00, 'in', 'Phoenix'),
(000036, 000036, 'Traffic', '24in Orange cone', 2.00, 1.00, 1.00, 10.00, 'in', 'Phoenix'),
(000037, 000037, 'Traffic', '24in Orange cone', 2.00, 1.00, 1.00, 10.00, 'in', 'Phoenix'),
(000038, 000038, 'Traffic', '24in Orange cone', 2.00, 1.00, 1.00, 10.00, 'in', 'Phoenix'),
(000039, 000039, 'Traffic', '24in Orange cone', 2.00, 1.00, 1.00, 10.00, 'in', 'Phoenix'),
(000040, 000040, 'Other', '42in Fan', 3.00, 1.00, 1.00, 30.00, 'in', 'Phoenix'),
(000041, 000041, 'Other', '42in Fan', 3.00, 1.00, 1.00, 30.00, 'in', 'Phoenix'),
(000042, 000042, 'Other', '1/2in x 24in Black Piper', 5.00, 1.00, 1.00, 10.00, 'in', 'Phoenix'),
(000043, 000043, 'Power Tools', '4-1/2in Grinder', 5.00, 1.00, 1.00, 30.00, 'in', 'Phoenix'),
(000044, 000044, 'Other', 'Measuring Wheel', 2.00, 1.00, 1.00, 10.00, 'in', 'Phoenix'),
(000045, 000045, 'Safety', 'Wheel chocks', 2.00, 1.00, 1.00, 5.00, 'in', 'Phoenix'),
(000046, 000046, 'Safety', 'Wheel chocks', 2.00, 1.00, 1.00, 5.00, 'in', 'Phoenix'),
(000047, 000047, 'Other', '5gal Bucket', 2.00, 1.00, 1.00, 5.00, 'in', 'Phoenix'),
(000048, 000048, 'Other', '3gal Bucket', 1.00, 1.00, 1.00, 4.00, 'in', 'Phoenix'),
(000049, 000049, 'Other', '50ft Hose', 4.00, 1.00, 1.00, 30.00, 'in', 'Phoenix'),
(000050, 000050, 'Other', '50ft Hose', 4.00, 1.00, 1.00, 30.00, 'in', 'Phoenix'),
(000051, 000051, 'Office', 'Pronto Card Printer', 5.00, 1.00, 1.00, 100.00, 'in', 'Phoenix'),
(000052, 000052, 'Office', 'Laser printer', 5.00, 1.00, 1.00, 150.00, 'in', 'Phoenix'),
(000053, 000053, 'Other', 'Dustpan', 1.00, 1.00, 1.00, 5.00, 'in', 'Phoenix'),
(000054, 000054, 'Hand Tools', 'Scrub brush', 1.00, 1.00, 1.00, 3.00, 'in', 'Phoenix'),
(000055, 000055, 'Hand Tools', 'Scrub brush', 1.00, 1.00, 1.00, 3.00, 'in', 'Phoenix'),
(000056, 000056, 'Hand Tools', 'Scrub brush', 1.00, 1.00, 1.00, 3.00, 'in', 'Phoenix'),
(000057, 000057, 'Hand Tools', 'Scrub brush', 1.00, 1.00, 1.00, 3.00, 'in', 'Phoenix'),
(000058, 000058, 'Hand Tools', '1/8in Notch trowel', 2.00, 1.00, 1.00, 15.00, 'in', 'Phoenix'),
(000059, 000059, 'Other', 'Hose Sprayer', 1.00, 1.00, 1.00, 15.00, 'in', 'Phoenix'),
(000060, 000060, 'Other', 'Bit Set', 1.00, 1.00, 1.00, 10.00, 'in', 'Phoenix'),
(000061, 000061, 'Other', 'Handheld broom', 2.00, 1.00, 1.00, 10.00, 'in', 'Phoenix'),
(000062, 000062, 'Hand Tools', '9oz clawhammer', 3.00, 1.00, 1.00, 20.00, 'in', 'Phoenix'),
(000063, 000063, 'Hand Tools', '16oz clawhammer', 4.00, 1.00, 1.00, 30.00, 'in', 'Phoenix'),
(000064, 000064, 'Hand Tools', '15in prybar', 3.00, 1.00, 1.00, 40.00, 'in', 'Phoenix'),
(000065, 000065, 'Power Tools', '4in grinder', 5.00, 1.00, 1.00, 50.00, 'in', 'Phoenix'),
(000066, 000066, 'Power Tools', 'Pneumercator', 5.00, 1.00, 1.00, 200.00, 'in', 'Phoenix'),
(000067, 000067, 'Other', '25ft ext cord', 4.00, 1.00, 1.00, 15.00, 'in', 'Phoenix'),
(000068, 000068, 'Traffic', '3-way', 3.00, 1.00, 1.00, 20.00, 'in', 'Phoenix'),
(000069, 000069, 'Safety', 'Safety gas can', 3.00, 1.00, 1.00, 15.00, 'in', 'Phoenix'),
(000070, 000070, 'Other', 'Plastic diesel can', 2.00, 1.00, 1.00, 10.00, 'in', 'Phoenix'),
(000071, 000071, 'Other', 'Plastic diesel can', 2.00, 1.00, 1.00, 10.00, 'in', 'Phoenix'),
(000072, 000072, 'Other', 'Plastic diesel can', 2.00, 1.00, 1.00, 10.00, 'in', 'Phoenix'),
(000073, 000073, 'Other', '12ft Ext cord', 2.00, 1.00, 1.00, 10.00, 'in', 'Phoenix'),
(000074, 000074, 'Hand Tools', '16oz clawhammer', 5.00, 1.00, 1.00, 30.00, 'in', 'Phoenix'),
(000075, 000075, 'Power Tools', 'Impact Wrench', 6.00, 1.00, 1.00, 50.00, 'in', 'Phoenix'),
(000076, 000076, 'Power Tools', 'Jigsaw', 4.00, 1.00, 1.00, 50.00, 'in', 'Phoenix'),
(000077, 000077, 'Power Tools', 'Hammerdrill', 2.00, 1.00, 1.00, 100.00, 'out', 'Phoenix'),
(000078, 000078, 'Other', 'Sump pump', 3.00, 1.00, 1.00, 100.00, 'in', 'Phoenix'),
(000079, 000079, 'Hand Tools', 'Putty Knife', 1.00, 1.00, 1.00, 3.00, 'in', 'Phoenix'),
(000080, 000080, 'Hand Tools', 'Putty Knife', 1.00, 1.00, 1.00, 3.00, 'in', 'Phoenix'),
(000081, 000081, 'Hand Tools', 'Putty Knife', 1.00, 1.00, 1.00, 3.00, 'in', 'Phoenix'),
(000082, 000082, 'Hand Tools', 'Putty Knife', 1.00, 1.00, 1.00, 3.00, 'in', 'Phoenix'),
(000083, 000083, 'Hand Tools', 'Putty Knife', 1.00, 1.00, 1.00, 3.00, 'in', 'Phoenix'),
(000084, 000084, 'Hand Tools', 'Putty Knife', 1.00, 1.00, 1.00, 3.00, 'in', 'Phoenix'),
(000085, 000085, 'Hand Tools', 'Putty Knife', 1.00, 1.00, 1.00, 3.00, 'in', 'Phoenix'),
(000086, 000086, 'Hand Tools', '5in1 tool', 2.00, 1.00, 1.00, 20.00, 'in', 'Phoenix'),
(000087, 000087, 'Hand Tools', 'Dikes', 2.00, 1.00, 1.00, 15.00, 'in', 'Phoenix'),
(000088, 000088, 'Other', 'Snips', 1.00, 1.00, 1.00, 15.00, 'in', 'Phoenix'),
(000089, 000089, 'Hand Tools', 'Caulk gun', 2.00, 1.00, 1.00, 15.00, 'in', 'Phoenix'),
(000090, 000090, 'Hand Tools', '18in grab bar', 4.00, 1.00, 1.00, 30.00, 'in', 'Phoenix'),
(000091, 000091, 'Cleaning', 'Shop Vac', 5.00, 1.00, 1.00, 100.00, 'in', 'Phoenix'),
(000092, 000092, 'Cleaning', 'Upright vac', 3.00, 1.00, 1.00, 80.00, 'in', 'Phoenix'),
(000093, 000093, 'Cleaning', 'Upright vac', 3.00, 1.00, 1.00, 80.00, 'in', 'Phoenix'),
(000094, 000094, 'Office', 'Folding Chair', 2.00, 1.00, 1.00, 10.00, 'in', 'Phoenix'),
(000095, 000095, 'Office', 'Folding Chair', 2.00, 1.00, 1.00, 10.00, 'in', 'Phoenix'),
(000096, 000096, 'Office', 'Folding Chair', 2.00, 1.00, 1.00, 10.00, 'in', 'Phoenix'),
(000097, 000097, 'Office', 'Folding Chair', 2.00, 1.00, 1.00, 10.00, 'in', 'Phoenix'),
(000098, 000098, 'Office', 'Folding Chair', 2.00, 1.00, 1.00, 10.00, 'in', 'Phoenix'),
(000099, 000099, 'Hand Tools', 'Hand truck', 1.50, 1.00, 1.00, 15.00, 'in', 'Phoenix'),
(000100, 000100, 'Hand Tools', 'Flathead shovel', 2.00, 1.00, 1.00, 10.00, 'in', 'Phoenix'),
(000101, 000101, 'Hand Tools', 'Flathead shovel', 2.00, 1.00, 1.00, 10.00, 'in', 'Phoenix'),
(000102, 000102, 'Other', 'Rake', 2.00, 1.00, 1.00, 10.00, 'in', 'Phoenix'),
(000103, 000103, 'Other', 'Broom', 2.00, 1.00, 1.00, 10.00, 'in', 'Phoenix'),
(000104, 000104, 'Hand Tools', '8x8 hand tamper', 3.00, 1.00, 1.00, 20.00, 'in', 'Phoenix'),
(000105, 000105, 'Hand Tools', 'Johnson bar', 2.00, 1.00, 1.00, 40.00, 'in', 'Phoenix'),
(000106, 000106, 'Office', 'Filing cabinet', 3.00, 1.00, 1.00, 50.00, 'in', 'Phoenix'),
(000107, 000107, 'Other', '100% safety banner', 2.00, 1.00, 1.00, 40.00, 'in', 'Phoenix'),
(000108, 000108, 'Other', '100% safety banner', 2.00, 1.00, 1.00, 40.00, 'in', 'Phoenix'),
(000109, 000109, 'Other', '4x8 Bayley banner', 3.00, 1.00, 1.00, 60.00, 'in', 'Phoenix'),
(000110, 000110, 'Other', '4x8 Bayley banner', 3.00, 1.00, 1.00, 60.00, 'in', 'Phoenix'),
(000111, 000111, 'Other', '4x8 Bayley banner', 3.00, 1.00, 1.00, 60.00, 'in', 'Phoenix'),
(000112, 000112, 'Hand Tools', 'Formica sprayer', 3.00, 1.00, 1.00, 50.00, 'in', 'Phoenix'),
(010004, 123456, 'Power Tools', 'tetst', 1.00, 1.00, 1.00, 1.00, 'in', 'Seattle');

-- --------------------------------------------------------

--
-- Table structure for table `trans_log`
--

CREATE TABLE IF NOT EXISTS `trans_log` (
  `trans_no` int(16) NOT NULL AUTO_INCREMENT,
  `type` varchar(3) NOT NULL,
  `tool_id` int(6) unsigned zerofill NOT NULL,
  `employee_id` int(16) NOT NULL,
  `job_no` int(16) NOT NULL,
  `costcode` int(16) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`trans_no`),
  KEY `tool_id` (`tool_id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=190 ;

--
-- Dumping data for table `trans_log`
--

INSERT INTO `trans_log` (`trans_no`, `type`, `tool_id`, `employee_id`, `job_no`, `costcode`, `timestamp`) VALUES
(167, 'out', 000043, 13, 15024, 12345123, '2015-04-09 08:32:18'),
(168, 'in', 000043, 13, 15024, 12345123, '2015-04-09 08:32:24'),
(169, 'out', 000043, 13, 14163, 12345123, '2015-04-09 08:48:35'),
(170, 'out', 000066, 13, 14163, 12345678, '2015-04-09 09:13:48'),
(171, 'in', 000066, 13, 14163, 12345678, '2015-04-09 09:13:59'),
(172, 'in', 000043, 13, 14163, 12345123, '2015-04-09 09:14:08'),
(173, 'out', 000052, 13, 14163, 12345678, '2015-04-09 09:14:36'),
(174, 'in', 000052, 13, 14163, 12345678, '2015-04-09 09:14:47'),
(175, 'out', 000065, 13, 14163, 12345123, '2015-04-09 09:15:51'),
(176, 'in', 000065, 13, 14163, 12345123, '2015-04-09 09:17:35'),
(177, 'out', 000043, 13, 14163, 12345678, '2015-04-09 09:18:31'),
(178, 'in', 000043, 13, 14163, 12345678, '2015-04-09 09:18:39'),
(179, 'out', 000043, 13, 14163, 12345678, '2015-04-09 09:18:55'),
(180, 'in', 000043, 13, 14163, 12345678, '2015-04-09 09:19:05'),
(181, 'out', 000043, 13, 14163, 12345678, '2015-04-09 09:21:57'),
(182, 'out', 000001, 13, 14163, 12345678, '2015-04-09 09:24:25'),
(183, 'out', 000091, 13, 14163, 12345678, '2015-04-09 09:25:27'),
(184, 'out', 000006, 13, 14163, 12345678, '2015-04-09 09:27:03'),
(185, 'in', 000043, 13, 14163, 12345678, '2015-04-09 09:28:55'),
(186, 'out', 000077, 13, 14163, 12345678, '2015-04-09 09:29:46'),
(187, 'in', 000001, 13, 14163, 12345678, '2015-04-09 09:30:49'),
(188, 'in', 000091, 13, 14163, 12345678, '2015-04-09 09:31:30'),
(189, 'in', 000006, 13, 14163, 12345678, '2015-04-09 09:32:12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
