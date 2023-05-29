-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2023 at 07:06 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mr.kottu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `verification_code` int(11) NOT NULL,
  `verification_at` varchar(20) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Name`, `Email`, `Type`, `Password`, `verification_code`, `verification_at`, `image`, `status`) VALUES
(40, 'vebeshan21', 'vebeshanvtv@gmail.com', 'Super Admin', 'vebeshan', 319036, '2023-02-13 01:20:59', 'pic-3-min.png', 1),
(42, 'Raja21', 'Raja21@gmail.com', 'Admin', 'Raja1234', 0, '', 'face15.jpg', 1);

--
-- Triggers `admin`
--
DELIMITER $$
CREATE TRIGGER `delete_admin` AFTER DELETE ON `admin` FOR EACH ROW INSERT into admintrigger VALUES (null,old.id,old.name,old.type,old.password,now(),"Deleted")
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_admin` AFTER INSERT ON `admin` FOR EACH ROW INSERT into admintrigger VALUES (null,new.id,new.name,new.type,new.password,now(),"Inserted")
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_admin` AFTER UPDATE ON `admin` FOR EACH ROW INSERT into admintrigger VALUES (null,old.id,old.name,old.type,old.password,now(),"Updated")
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admintrigger`
--

CREATE TABLE `admintrigger` (
  `NO` int(10) NOT NULL,
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `affected_date` datetime NOT NULL,
  `action` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admintrigger`
--

INSERT INTO `admintrigger` (`NO`, `ID`, `Name`, `Type`, `Password`, `affected_date`, `action`) VALUES
(53, 11, 'Raja', 'Please Sel', '202cb962ac', '2022-12-20 10:18:51', 'Inserted'),
(54, 12, '', 'Please Sel', 'd41d8cd98f', '2022-12-20 11:40:03', 'Inserted'),
(55, 13, '', 'Please Sel', 'd41d8cd98f', '2022-12-20 11:40:03', 'Inserted'),
(56, 14, '', 'Please Sel', 'd41d8cd98f', '2022-12-20 11:40:04', 'Inserted'),
(57, 15, '', 'Please Sel', 'd41d8cd98f', '2022-12-20 11:40:04', 'Inserted'),
(58, 16, '', 'Please Sel', 'd41d8cd98f', '2022-12-20 11:40:04', 'Inserted'),
(59, 17, '', 'Please Sel', 'd41d8cd98f', '2022-12-20 11:40:04', 'Inserted'),
(60, 9, 'Raja', 'Super Admi', '202cb962ac', '2022-12-20 11:58:29', 'Deleted'),
(61, 10, 'Raja', 'Please Sel', '202cb962ac', '2022-12-20 11:58:29', 'Deleted'),
(62, 11, 'Raja', 'Please Sel', '202cb962ac', '2022-12-20 11:58:29', 'Deleted'),
(63, 12, '', 'Please Sel', 'd41d8cd98f', '2022-12-20 11:58:29', 'Deleted'),
(64, 13, '', 'Please Sel', 'd41d8cd98f', '2022-12-20 11:58:29', 'Deleted'),
(65, 14, '', 'Please Sel', 'd41d8cd98f', '2022-12-20 11:58:29', 'Deleted'),
(66, 15, '', 'Please Sel', 'd41d8cd98f', '2022-12-20 11:58:29', 'Deleted'),
(67, 16, '', 'Please Sel', 'd41d8cd98f', '2022-12-20 11:58:29', 'Deleted'),
(68, 17, '', 'Please Sel', 'd41d8cd98f', '2022-12-20 11:58:29', 'Deleted'),
(69, 18, 'Raja', 'Super Admi', '1bbd886460', '2022-12-20 12:07:27', 'Inserted'),
(70, 19, 'Raja', 'Super Admi', '25d55ad283', '2022-12-20 12:07:47', 'Inserted'),
(71, 20, 'Raja', 'Super Admi', '25d55ad283', '2022-12-20 12:14:36', 'Inserted'),
(72, 21, 'vaishu', 'Super Admi', '25d55ad283', '2022-12-20 12:21:52', 'Inserted'),
(73, 8, 'Vaishu', 'Super Admi', '1956', '2022-12-20 12:28:58', 'Updated'),
(74, 4, 'vebeshan11', 'Super Admi', '123', '2022-12-20 12:42:51', 'Updated'),
(75, 20, 'Raja', 'Super Admi', '25d55ad283', '2022-12-20 14:35:00', 'Deleted'),
(76, 21, 'vaishu', 'Super Admi', '25d55ad283', '2022-12-20 14:35:02', 'Deleted'),
(77, 19, 'Raja', 'Super Admi', '25d55ad283', '2022-12-20 14:35:07', 'Deleted'),
(78, 4, 'vebeshan11', 'Super Admi', 'bbb8aae57c', '2022-12-22 10:18:07', 'Deleted'),
(79, 8, 'Vaishu', 'Super Admi', '12345678', '2022-12-22 10:18:08', 'Deleted'),
(80, 18, 'Raja', 'Super Admi', '1bbd886460', '2022-12-22 10:18:09', 'Deleted'),
(81, 19, 'vaishu', 'Super Admi', 'f96d37da53', '2022-12-22 10:18:38', 'Inserted'),
(82, 20, 'Lukshan', 'Super Admi', '80d3da5ca1', '2022-12-22 10:22:14', 'Inserted'),
(83, 21, 'Raja', 'Admin', '202cb962ac', '2022-12-26 08:23:46', 'Inserted'),
(84, 22, 'Ravi', 'Admin', '123', '2022-12-26 09:10:26', 'Inserted'),
(85, 23, 'vebeshan', 'Super Admi', 'vebe2000', '2022-12-26 09:25:19', 'Inserted'),
(86, 24, 'vebeshan21', 'Super Admi', 'vebeshan21', '2022-12-26 10:09:42', 'Inserted'),
(87, 24, 'vebeshan21', 'Super Admi', 'vebeshan21', '2022-12-26 10:11:34', 'Deleted'),
(88, 25, 'vebeshan21', 'Super Admi', 'vebeshan21', '2022-12-26 10:11:59', 'Inserted'),
(89, 19, 'vaishu', 'Super Admi', 'f96d37da53', '2022-12-26 18:10:46', 'Updated'),
(90, 20, 'Lukshan', 'Super Admi', '80d3da5ca1', '2022-12-26 18:10:49', 'Updated'),
(91, 21, 'Raja', 'Admin', '202cb962ac', '2022-12-26 18:10:52', 'Updated'),
(92, 22, 'Ravi', 'Admin', '123', '2022-12-26 18:10:54', 'Updated'),
(93, 23, 'vebeshan', 'Super Admi', 'vebe2000', '2022-12-26 18:10:56', 'Updated'),
(94, 25, 'vebeshan21', 'Super Admi', 'vebeshan21', '2022-12-26 18:10:58', 'Updated'),
(95, 23, 'vebeshan', 'Super Admi', 'vebe2000', '2022-12-26 18:41:46', 'Updated'),
(96, 21, 'Raja', 'Admin', '202cb962ac', '2022-12-26 18:42:10', 'Deleted'),
(97, 22, 'Ravi', 'Admin', '123', '2022-12-26 18:42:10', 'Deleted'),
(98, 20, 'Lukshan', 'Super Admi', '80d3da5ca1', '2022-12-26 18:42:17', 'Updated'),
(99, 19, 'vaishu', 'Super Admi', 'f96d37da53', '2022-12-26 18:42:42', 'Updated'),
(100, 23, 'vebeshan', 'Super Admi', 'vebe2000', '2022-12-26 19:30:58', 'Updated'),
(101, 23, 'vebeshan', 'Super Admi', 'vebeshan', '2022-12-26 19:31:43', 'Updated'),
(102, 23, 'vebeshan', 'Super Admi', 'vebe2000', '2022-12-26 19:57:38', 'Updated'),
(103, 23, 'vebeshan', 'Super Admi', 'vebeshan', '2022-12-26 20:15:17', 'Updated'),
(104, 23, 'vebeshan', 'Super Admi', 'vebeshan', '2022-12-26 21:40:27', 'Updated'),
(105, 26, 'Jeyanthi', 'Super Admi', 'Jeyanthi99', '2022-12-27 09:26:30', 'Inserted'),
(106, 27, 'Raja', 'Admin', 'Raja2000', '2022-12-27 10:30:58', 'Inserted'),
(107, 23, 'vebeshan', 'Super Admi', 'vebeshan', '2022-12-27 12:07:09', 'Updated'),
(108, 23, 'vebeshan', 'Super Admi', 'vebeshan', '2022-12-27 12:07:17', 'Updated'),
(109, 23, 'vebeshan', 'Super Admi', 'vebeshan', '2022-12-29 09:25:37', 'Updated'),
(110, 28, 'Sarunikka', 'Admin', 'saru1234', '2022-12-29 12:46:28', 'Inserted'),
(111, 23, 'vebeshan', 'Super Admi', 'vebeshan', '2022-12-29 12:48:59', 'Updated'),
(112, 29, 'Abdulah', 'Admin', '12345678', '2022-12-29 13:02:56', 'Inserted'),
(113, 23, 'vebeshan', 'Super Admi', 'vebeshan', '2022-12-29 13:03:49', 'Updated'),
(114, 28, 'Sarunikka', 'Admin', 'saru1234', '2022-12-29 13:04:25', 'Updated'),
(115, 19, 'vaishu', 'Super Admi', 'f96d37da53', '2022-12-29 14:33:32', 'Updated'),
(116, 19, 'vaishu', 'Super Admi', 'f96d37da53', '2022-12-29 14:46:25', 'Updated'),
(117, 20, 'Lukshan', 'Super Admi', '80d3da5ca1', '2022-12-29 14:46:52', 'Updated'),
(118, 19, 'vaishu', 'Super Admi', 'f96d37da53', '2022-12-29 14:49:07', 'Updated'),
(119, 20, 'Lukshan', 'Super Admi', '80d3da5ca1', '2022-12-30 11:40:51', 'Updated'),
(120, 23, 'vebeshan', 'Super Admi', 'vebeshan', '2022-12-30 11:41:14', 'Updated'),
(121, 25, 'vebeshan21', 'Super Admi', 'vebeshan21', '2022-12-30 11:42:36', 'Updated'),
(122, 25, 'vebeshan21', 'Super Admi', 'vebeshan21', '2022-12-30 11:42:51', 'Updated'),
(123, 27, 'Raja', 'Admin', 'Raja2000', '2023-01-02 10:04:03', 'Updated'),
(124, 27, 'raja', 'Admin', '123', '2023-01-02 10:04:03', 'Updated'),
(125, 27, 'raja', 'Admin', '123', '2023-01-02 10:06:20', 'Updated'),
(126, 27, 'raja', 'Admin', 'raja2000', '2023-01-02 10:09:06', 'Updated'),
(127, 28, 'Sarunikka', 'Admin', 'saru1234', '2023-01-02 22:47:34', 'Deleted'),
(128, 25, 'vebeshan21', 'Super Admi', 'vebeshan21', '2023-01-03 00:08:59', 'Updated'),
(129, 25, 'vebeshan21', 'Super Admi', 'vebeshan21', '2023-01-03 00:11:18', 'Updated'),
(130, 19, 'vaishu', 'Super Admi', 'f96d37da53', '2023-01-03 00:11:30', 'Updated'),
(131, 25, 'vebeshan21', 'Super Admi', 'vebeshan21', '2023-01-04 17:55:22', 'Deleted'),
(132, 26, 'Jeyanthi', 'Super Admi', 'Jeyanthi99', '2023-01-04 17:55:26', 'Deleted'),
(133, 29, 'Abdulah', 'Admin', '12345678', '2023-01-04 17:55:32', 'Deleted'),
(134, 19, 'vaishu', 'Super Admi', 'f96d37da53', '2023-01-04 17:55:35', 'Deleted'),
(135, 20, 'Lukshan', 'Super Admi', '80d3da5ca1', '2023-01-04 17:55:40', 'Deleted'),
(136, 27, 'raja', 'Admin', 'vebeshan', '2023-01-04 17:55:44', 'Deleted'),
(137, 23, 'vebeshan', 'Super Admi', 'vebeshan', '2023-01-04 17:57:08', 'Deleted'),
(138, 30, 'Vebeshan', 'Super Admi', 'vebeshan', '2023-01-04 18:04:23', 'Inserted'),
(139, 31, 'Vaishu', 'Super Admi', 'Vaishu99', '2023-01-04 18:40:04', 'Inserted'),
(140, 32, 'Raja', 'Admin', 'raja2000', '2023-01-04 18:57:49', 'Inserted'),
(141, 33, 'Saanu', 'Super Admi', 'saanu2000', '2023-01-04 18:59:29', 'Inserted'),
(142, 30, 'Vebeshan', 'Super Admi', 'vebeshan', '2023-01-04 19:07:01', 'Deleted'),
(143, 31, 'Vaishu', 'Super Admi', 'Vaishu99', '2023-01-04 19:07:01', 'Deleted'),
(144, 32, 'Raja', 'Admin', 'raja2000', '2023-01-04 19:07:01', 'Deleted'),
(145, 33, 'Saanu', 'Super Admi', 'saanu2000', '2023-01-04 19:07:01', 'Deleted'),
(146, 34, 'Vebeshan', 'Super Admi', 'vebeshan', '2023-01-04 19:07:30', 'Inserted'),
(147, 35, 'Vaishu', 'Super Admi', 'vaishu99', '2023-01-04 19:08:18', 'Inserted'),
(148, 36, 'Lukshan', 'Super Admi', 'lukshan200', '2023-01-04 19:09:26', 'Inserted'),
(149, 37, 'Saanu', 'Admin', 'saanu2000', '2023-01-06 14:06:36', 'Inserted'),
(150, 37, 'Saanu', 'Admin', 'saanu2000', '2023-01-08 13:57:10', 'Updated'),
(151, 37, 'Saanu', 'Admin', 'saanu2000', '2023-01-08 14:03:02', 'Updated'),
(152, 38, 'Delaikshan', 'Admin', '20001211', '2023-01-08 14:07:37', 'Inserted'),
(153, 38, 'Delaikshan', 'Admin', '20001211', '2023-01-08 14:07:57', 'Deleted'),
(154, 37, 'Saanu', 'Admin', 'saanu2000', '2023-01-08 14:08:17', 'Updated'),
(155, 39, 'Delaikshan', 'Admin', 'vebeshan', '2023-01-09 04:10:09', 'Inserted'),
(156, 39, 'Delaikshan', 'Admin', 'vebeshan', '2023-01-09 04:10:13', 'Updated'),
(157, 39, 'Delaikshan', 'Admin', 'vebeshan', '2023-01-09 04:10:29', 'Updated'),
(158, 39, 'Delaikshan123', 'Admin', 'vebeshan', '2023-01-09 04:10:33', 'Updated'),
(159, 39, 'Delaikshan123', 'Admin', 'vebeshan', '2023-01-09 04:10:38', 'Deleted'),
(160, 34, 'Vebeshan', 'Super Admi', 'vebeshan', '2023-01-09 04:22:12', 'Updated'),
(161, 34, 'Vebeshan22', 'Super Admi', 'vebeshan', '2023-01-09 04:25:13', 'Updated'),
(162, 34, 'Vebeshan23', 'Super Admi', 'vebeshan', '2023-01-09 04:27:39', 'Updated'),
(163, 38, 'jeyanthi', 'Admin', '12345#jeya', '2023-01-31 12:37:12', 'Inserted'),
(164, 39, 'maadu', 'Admin', 'maadu#1234', '2023-01-31 12:37:58', 'Inserted'),
(165, 40, 'abcde', 'Admin', 'abcde#1234', '2023-01-31 12:38:34', 'Inserted'),
(166, 40, 'abcde', 'Admin', 'abcde#1234', '2023-01-31 13:21:49', 'Deleted'),
(167, 39, 'maadu', 'Admin', 'maadu#1234', '2023-01-31 13:21:54', 'Deleted'),
(168, 38, 'jeyanthi', 'Admin', '12345#jeya', '2023-01-31 13:21:58', 'Deleted'),
(169, 37, 'Saanu22', 'Admin', 'saanu2000', '2023-01-31 13:22:21', 'Updated'),
(170, 37, 'Saanu21', 'Admin', 'saanu2000', '2023-01-31 13:24:55', 'Updated'),
(171, 34, 'Vebeshan22', 'Super Admi', 'vebeshan', '2023-01-31 13:40:45', 'Updated'),
(172, 34, 'Vebeshan22', 'Super Admi', 'vebeshan21', '2023-01-31 13:43:38', 'Updated'),
(173, 34, 'Vebeshan', 'Super Admi', 'vebeshan', '2023-01-31 13:44:05', 'Updated'),
(174, 37, 'Saanu21', 'Admin', 'saanu2000', '2023-02-01 21:51:46', 'Updated'),
(175, 34, 'Vebeshan22', 'Super Admi', 'vebeshan', '2023-02-06 00:28:45', 'Updated'),
(176, 34, '', 'Super Admi', '', '2023-02-06 00:29:16', 'Updated'),
(177, 34, '', 'Super Admi', '', '2023-02-06 00:32:36', 'Deleted'),
(178, 40, 'vebeshan', 'Super Admi', 'vebeshan', '2023-02-06 00:34:22', 'Inserted'),
(179, 41, 'Jeyanthi', 'Admin', 'jeyanthi12', '2023-02-06 11:29:39', 'Inserted'),
(180, 41, 'Jeyanthi', 'Admin', 'jeyanthi12', '2023-02-06 11:30:13', 'Updated'),
(181, 40, 'vebeshan', 'Super Admi', 'vebeshan', '2023-02-06 11:33:56', 'Updated'),
(182, 40, 'vibishan', 'Super Admi', 'vibishan', '2023-02-06 11:38:35', 'Updated'),
(183, 35, 'Vaishu', 'Super Admi', 'vaishu99', '2023-02-11 12:03:54', 'Deleted'),
(184, 36, 'Lukshan', 'Super Admi', 'lukshan200', '2023-02-11 12:03:54', 'Deleted'),
(185, 37, 'Saanu22', 'Admin', 'saanu2000', '2023-02-11 12:03:55', 'Deleted'),
(186, 41, 'Jeyanthi', 'Admin', 'jeyanthi12', '2023-02-11 12:03:55', 'Deleted'),
(187, 40, 'vebeshan21', 'Super Admi', 'vebeshan', '2023-02-11 12:12:04', 'Updated'),
(188, 42, 'Raja', 'Admin', 'Raja2000', '2023-02-12 10:18:22', 'Inserted'),
(189, 42, 'Raja', 'Admin', 'Raja2000', '2023-02-12 10:19:07', 'Updated'),
(190, 40, 'vebeshan21', 'Super Admi', 'vebeshan', '2023-02-12 19:24:03', 'Updated'),
(191, 43, 'ram', 'Admin', 'ram@2000', '2023-02-12 19:27:21', 'Inserted'),
(192, 44, 'kamal', 'Admin', 'kamal2000', '2023-02-12 19:31:19', 'Inserted'),
(193, 44, 'kamal', 'Admin', 'kamal2000', '2023-02-12 19:31:58', 'Updated'),
(194, 44, 'kamal2000', 'Admin', 'kamal2001', '2023-02-12 19:32:24', 'Updated'),
(195, 44, 'kamal2000', 'Admin', 'kamal2001', '2023-02-12 19:34:14', 'Updated'),
(196, 44, 'kamal', 'Admin', 'kamal2000', '2023-02-12 19:34:27', 'Deleted'),
(197, 43, 'ram', 'Admin', 'ram@2000', '2023-02-12 19:34:31', 'Deleted'),
(198, 40, 'vebeshan21', 'Super Admi', 'vebeshan', '2023-02-13 01:20:59', 'Updated');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Price` int(11) NOT NULL,
  `Qty` int(2) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `status` int(2) NOT NULL,
  `Customer_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_ID` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Tel_no` int(10) NOT NULL,
  `E_mail` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `verification_code` varchar(20) NOT NULL,
  `verification_at` varchar(50) NOT NULL,
  `otp_verification` int(10) NOT NULL,
  `otp_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_ID`, `Name`, `Address`, `Tel_no`, `E_mail`, `Password`, `photo`, `verification_code`, `verification_at`, `otp_verification`, `otp_at`) VALUES
(25, 'Vebeshan', 'No 47/1 2nd cross sinnauppodai,Batticaloa', 779923155, 'vebeshanvtv@gmail.com', 'vebeshan', 'testimonials-1.jpg', '211296', '2023-02-02 21:53:43', 918765, '2023-02-13 00:30:10'),
(28, 'saanu', 'no 47 sinnauppodai,Batticaloa', 652224772, 'vebeshangamer@gmail.com', 'vebeshan', 'face21.jpg', '174008', '2023-02-12 19:39:30', 918765, '2023-02-13 00:30:10');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `ID` int(11) NOT NULL,
  `Order_ID` varchar(10) NOT NULL,
  `Customer_ID` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Product_name` varchar(300) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `Total` int(100) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`ID`, `Order_ID`, `Customer_ID`, `Name`, `Product_name`, `price`, `qty`, `Total`, `Date`) VALUES
(25, '118', '25', 'Vebeshan', 'Chicken fry', 550, 2, 1100, '2023-02-13 02:23:01'),
(26, '120', '25', 'Vebeshan', 'Cheese prawns kottu', 1100, 1, 1100, '2023-02-14 15:44:20'),
(27, '121', '25', 'Vebeshan', 'meatball noodles', 800, 1, 800, '2023-02-14 15:44:30'),
(28, '122', '25', 'Vebeshan', 'Chicken fry', 550, 1, 550, '2023-02-14 15:44:35'),
(29, '123', '25', 'Vebeshan', 'Burger', 800, 1, 800, '2023-02-14 15:44:40'),
(30, '124', '25', 'Vebeshan', 'Cheese Chicken kottu', 1200, 1, 1200, '2023-02-14 15:44:49'),
(31, '125', '25', 'Vebeshan', 'BreadKottu', 900, 1, 900, '2023-02-14 15:44:53'),
(32, '126', '25', 'Vebeshan', 'Chicken fry', 550, 1, 550, '2023-02-24 15:30:37'),
(33, '127', '25', 'Vebeshan', 'NEI DUM BAROTTA', 750, 2, 1500, '2023-03-17 11:06:50'),
(34, '128', '25', 'Vebeshan', 'Burger', 800, 1, 800, '2023-03-17 11:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `ID` int(11) NOT NULL,
  `Question` varchar(1000) NOT NULL,
  `Answer` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`ID`, `Question`, `Answer`) VALUES
(4, 'What  is the process of placing an order?', 'The customer must want to register into the system for place an order in the website.'),
(5, 'How can I get to know about the restaurant open/close timing Exactly?', 'When you open a website in a day you can get a pop up message of shop closing detail if the shop is close.'),
(6, 'Can I manage my registered account personally?', 'Yes, Customer can manage their profile in their own perspect.'),
(7, 'Is the delivery process available in Island wide?', 'No, It’s only in Batticaloa District.'),
(8, 'What is the actual payment method for the process?', 'Cash On Delivery only'),
(9, 'Is this a only way of order the food for home delivery?', 'No, We are also doing the manual system too. you can order through the phone call too. ');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `ID` int(11) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`ID`, `Title`, `Name`, `Date`) VALUES
(36, 'Kottu', 'updated_photo/photo1-min.png', '2023-02-12 10:49:16'),
(37, 'Kottu', 'updated_photo/photo3-min.png', '2023-02-12 10:49:16'),
(38, 'Noodles', 'updated_photo/Beef noodles3-min.jpg', '2023-02-12 10:49:46'),
(39, 'Noodles', 'updated_photo/chickennoodles-min.png', '2023-02-12 10:49:46'),
(40, 'Noodles', 'updated_photo/seafood noodles1-min.jpg', '2023-02-12 10:49:46'),
(41, 'Noodles', 'updated_photo/seafood noodles-min.png', '2023-02-12 10:49:46'),
(42, 'Cheese_Kottu', 'updated_photo/Cheese kottu-min.jpg', '2023-02-12 10:50:08'),
(43, 'Cheese_Kottu', 'updated_photo/Prawns kottu1-min.jpg', '2023-02-12 10:50:08'),
(44, 'Barotta', 'updated_photo/Barrotta with chicken curry-min.jpg', '2023-02-12 10:50:41'),
(45, 'Barotta', 'updated_photo/neiparota-min.png', '2023-02-12 10:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `home_page`
--

CREATE TABLE `home_page` (
  `ID` int(11) NOT NULL,
  `About` varchar(1000) NOT NULL,
  `About_banner` varchar(1000) NOT NULL,
  `Term` varchar(1000) NOT NULL,
  `Policy` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_page`
--

INSERT INTO `home_page` (`ID`, `About`, `About_banner`, `Term`, `Policy`) VALUES
(1, 'Life Is A Combination Of Magic And Kottu \r\nCome With Zero Expectations\r\nYou Will Get Suprised With Our Food Taste', 'Mr.K logo.JPG', 'THESE TERMS AND CONDITIONS APPLY TO THE WEB SITE www.Mrkottu.lk\nPrivacy Policy of Mr.kottu(hereinafter referred to as either, Company, We, Us, or Our) is committed to protecting the privacy of personal information you may provide us on this website (the site). We believe it is important for you to know how we treat your personal information. The terms of this Privacy Policy apply to all users of this site. If you do not agree with the terms of this Privacy Policy, you should immediately cease the use of this site.\n\nContact details of the company\nMr.Kottu\nGnanasooriyam Square,\n2nd Cross,\nBatticaloa.\nContact No 077-9923155\n\nTransaction currency;\nIt’s only a cash on delivery method  you can trust our services.\n', 'THIS PRIVACY POLICY APPLIES TO THE WEBSITE www.Mr.kottu.lk\r\n\r\nCompany May Use Your Personal Information For Any Of The Following Purposes:\r\nto understand the use of the Site and make improvements;\r\nto register visitors for online activities they choose to participate in such as: contests, surveys, order details, comment forms, or any other online interactive activities;\r\nto respond to specific requests from visitors;\r\nto protect the security or integrity of the Site if necessary;\r\nto send notices (if consent is provided) of special promotions, offers or solicitations; and in general (if consent is provided), to promote and market Company’s business and various products\r\n\r\nIn addition to the personal information identified above, our web servers automatically identify computers IP addresses used to place the order.\r\n\r\nDiscount policy\r\nDiscounts cannot be combined on promotions and/or meal deals.\r\nMeal deals cannot be combined with each other\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(100) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`ID`, `Name`, `Email`, `subject`, `message`, `status`) VALUES
(2, 'Gamer Vebeshan', ' vebeshanvtv@gmail.com', 'services', 'Your website services are good...', 1),
(4, 'Vebeshan', ' vebeshanvtv@gmail.com', 'Foods', 'Tasty Foods here...............', 1),
(5, 'Vebeshan', ' vebeshanvtv@gmail.com', 'services', 'Hi your website very cool i like it...', 1),
(6, 'Gamer Vebeshan', ' vebeshanvtv@gmail.com', 'Foods', 'Your foods are vey tasty', 1),
(7, 'ravi Raja', ' vebeshanvtv@gmail.com', 'Services', 'You are providing good services to customers...', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `order_ID` int(11) NOT NULL,
  `name` text NOT NULL,
  `type` text NOT NULL,
  `message` text NOT NULL,
  `Total` int(11) NOT NULL,
  `status` text NOT NULL,
  `date` datetime NOT NULL,
  `Customer_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `order_ID`, `name`, `type`, `message`, `Total`, `status`, `date`, `Customer_ID`) VALUES
(104, 0, 'Vebeshan', 'ORDER', 'Chicken fry Qty (2) Price (550) , Cheese Chicken kottu Qty (2) Price (1200) ', 0, 'read', '2023-02-13 00:40:06', 25),
(105, 119, 'Vebeshan', 'Cancel Order', 'Cheese Chicken kottu Qty (2) Price (1200) ', 2400, 'read', '2023-02-13 00:41:00', 25),
(106, 0, 'Vebeshan', 'ORDER', 'Cheese prawns kottu Qty (1) Price (1100) , meatball noodles Qty (1) Price (800) ', 0, 'read', '2023-02-13 01:02:37', 25),
(107, 118, 'Vebeshan', 'Delivered', 'Chicken fry Qty (2) Price (550) ', 1100, 'read', '2023-02-13 02:23:01', 25),
(108, 0, 'Vebeshan', 'ORDER', 'Chicken fry Qty (1) Price (550) , Burger Qty (1) Price (800) , Cheese Chicken kottu Qty (1) Price (1200) , BreadKottu Qty (1) Price (900) ', 0, 'read', '2023-02-14 15:43:09', 25),
(109, 120, 'Vebeshan', 'Delivered', 'Cheese prawns kottu Qty (1) Price (1100) ', 1100, 'read', '2023-02-14 15:44:20', 25),
(110, 121, 'Vebeshan', 'Delivered', 'meatball noodles Qty (1) Price (800) ', 800, 'read', '2023-02-14 15:44:30', 25),
(111, 122, 'Vebeshan', 'Delivered', 'Chicken fry Qty (1) Price (550) ', 550, 'read', '2023-02-14 15:44:35', 25),
(112, 123, 'Vebeshan', 'Delivered', 'Burger Qty (1) Price (800) ', 800, 'read', '2023-02-14 15:44:40', 25),
(113, 124, 'Vebeshan', 'Delivered', 'Cheese Chicken kottu Qty (1) Price (1200) ', 1200, 'read', '2023-02-14 15:44:49', 25),
(114, 125, 'Vebeshan', 'Delivered', 'BreadKottu Qty (1) Price (900) ', 900, 'read', '2023-02-14 15:44:53', 25),
(115, 0, 'Vebeshan', 'ORDER', 'Chicken fry Qty (1) Price (550) ', 0, 'read', '2023-02-24 15:26:18', 25),
(116, 126, 'Vebeshan', 'Delivered', 'Chicken fry Qty (1) Price (550) ', 550, 'read', '2023-02-24 15:30:37', 25),
(117, 0, 'Vebeshan', 'ORDER', 'NEI DUM BAROTTA Qty (2) Price (750) , Burger Qty (1) Price (800) ', 0, 'read', '2023-03-17 10:50:16', 25),
(118, 127, 'Vebeshan', 'Delivered', 'NEI DUM BAROTTA Qty (2) Price (750) ', 1500, 'unread', '2023-03-17 11:06:50', 25),
(119, 128, 'Vebeshan', 'Delivered', 'Burger Qty (1) Price (800) ', 800, 'unread', '2023-03-17 11:06:53', 25);

-- --------------------------------------------------------

--
-- Table structure for table `orders_info`
--

CREATE TABLE `orders_info` (
  `Order_ID` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  `Customer_ID` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Product_Info` varchar(100) NOT NULL,
  `Total` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `E_mail` varchar(30) NOT NULL,
  `Tel_no` int(10) NOT NULL,
  `Address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_info`
--

INSERT INTO `orders_info` (`Order_ID`, `Date`, `Customer_ID`, `Name`, `Product_Info`, `Total`, `status`, `E_mail`, `Tel_no`, `Address`) VALUES
(56, '2023-02-13 00:40:06', '25', 'Vebeshan', 'Chicken fry Qty (2) Price (550) , Cheese Chicken kottu Qty (2) Price (1200) ', 3500, 0, 'vebeshanvtv@gmail.com', 779923155, 'No 47/1 2nd cross sinnauppodai'),
(57, '2023-02-13 01:02:37', '25', 'Vebeshan', 'Cheese prawns kottu Qty (1) Price (1100) , meatball noodles Qty (1) Price (800) ', 1900, 0, 'vebeshanvtv@gmail.com', 779923155, 'No 47/1 2nd cross sinnauppodai'),
(58, '2023-02-14 15:43:09', '25', 'Vebeshan', 'Chicken fry Qty (1) Price (550) , Burger Qty (1) Price (800) , Cheese Chicken kottu Qty (1) Price (1', 3450, 0, 'vebeshanvtv@gmail.com', 779923155, 'No 47/1 2nd cross sinnauppodai'),
(59, '2023-02-24 15:26:18', '25', 'Vebeshan', 'Chicken fry Qty (1) Price (550) ', 550, 0, 'vebeshanvtv@gmail.com', 779923155, 'No 47/1 2nd cross sinnauppodai'),
(60, '2023-03-17 10:50:16', '25', 'Vebeshan', 'NEI DUM BAROTTA Qty (2) Price (750) , Burger Qty (1) Price (800) ', 2300, 0, 'vebeshanvtv@gmail.com', 779923155, 'No 47/1 2nd cross sinnauppodai');

-- --------------------------------------------------------

--
-- Table structure for table `order_cancel`
--

CREATE TABLE `order_cancel` (
  `ID` int(11) NOT NULL,
  `Order_ID` int(11) NOT NULL,
  `Customer_ID` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Product_Name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `Qty` int(2) NOT NULL,
  `Total` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_cancel`
--

INSERT INTO `order_cancel` (`ID`, `Order_ID`, `Customer_ID`, `Name`, `Product_Name`, `price`, `Qty`, `Total`, `Date`, `status`) VALUES
(7, 119, '25', 'Vebeshan', 'Cheese Chicken kottu', 1200, 2, 2400, '2023-02-13 00:41:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `Order_ID` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  `Customer_ID` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Product_Name` varchar(100) NOT NULL,
  `Price` int(11) NOT NULL,
  `Qty` int(2) NOT NULL,
  `Total` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `E_mail` varchar(30) NOT NULL,
  `Tel_no` int(10) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Cancel_Date` datetime NOT NULL,
  `Cancel_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`Order_ID`, `Date`, `Customer_ID`, `Name`, `Product_Name`, `Price`, `Qty`, `Total`, `status`, `E_mail`, `Tel_no`, `Address`, `Cancel_Date`, `Cancel_status`) VALUES
(118, '2023-02-13 00:40:06', '25', 'Vebeshan', 'Chicken fry', 550, 2, 1100, 1, 'vebeshanvtv@gmail.com', 779923155, 'No 47/1 2nd cross sinnauppodai', '0000-00-00 00:00:00', 0),
(119, '2023-02-13 00:40:06', '25', 'Vebeshan', 'Cheese Chicken kottu', 1200, 2, 2400, 0, 'vebeshanvtv@gmail.com', 779923155, 'No 47/1 2nd cross sinnauppodai', '2023-02-13 00:41:00', 1),
(120, '2023-02-13 01:02:37', '25', 'Vebeshan', 'Cheese prawns kottu', 1100, 1, 1100, 1, 'vebeshanvtv@gmail.com', 779923155, 'No 47/1 2nd cross sinnauppodai', '0000-00-00 00:00:00', 0),
(121, '2023-02-13 01:02:37', '25', 'Vebeshan', 'meatball noodles', 800, 1, 800, 1, 'vebeshanvtv@gmail.com', 779923155, 'No 47/1 2nd cross sinnauppodai', '0000-00-00 00:00:00', 0),
(122, '2023-02-14 15:43:09', '25', 'Vebeshan', 'Chicken fry', 550, 1, 550, 1, 'vebeshanvtv@gmail.com', 779923155, 'No 47/1 2nd cross sinnauppodai', '0000-00-00 00:00:00', 0),
(123, '2023-02-14 15:43:09', '25', 'Vebeshan', 'Burger', 800, 1, 800, 1, 'vebeshanvtv@gmail.com', 779923155, 'No 47/1 2nd cross sinnauppodai', '2023-02-24 15:26:33', 1),
(124, '2023-02-14 15:43:09', '25', 'Vebeshan', 'Cheese Chicken kottu', 1200, 1, 1200, 1, 'vebeshanvtv@gmail.com', 779923155, 'No 47/1 2nd cross sinnauppodai', '2023-02-24 15:26:43', 1),
(125, '2023-02-14 15:43:09', '25', 'Vebeshan', 'BreadKottu', 900, 1, 900, 1, 'vebeshanvtv@gmail.com', 779923155, 'No 47/1 2nd cross sinnauppodai', '0000-00-00 00:00:00', 0),
(126, '2023-02-24 15:26:18', '25', 'Vebeshan', 'Chicken fry', 550, 1, 550, 1, 'vebeshanvtv@gmail.com', 779923155, 'No 47/1 2nd cross sinnauppodai', '0000-00-00 00:00:00', 0),
(127, '2023-03-17 10:50:16', '25', 'Vebeshan', 'NEI DUM BAROTTA', 750, 2, 1500, 1, 'vebeshanvtv@gmail.com', 779923155, 'No 47/1 2nd cross sinnauppodai', '0000-00-00 00:00:00', 0),
(128, '2023-03-17 10:50:16', '25', 'Vebeshan', 'Burger', 800, 1, 800, 1, 'vebeshanvtv@gmail.com', 779923155, 'No 47/1 2nd cross sinnauppodai', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_ID` int(255) NOT NULL,
  `Product_Name` varchar(50) NOT NULL,
  `Type` varchar(30) NOT NULL,
  `Price` int(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `DATE` datetime NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_ID`, `Product_Name`, `Type`, `Price`, `image`, `DATE`, `status`) VALUES
(59, 'Cheese sandwich', 'Specialty', 600, 'Cheese sandwich-min.jpeg', '2023-02-11 20:56:56', 1),
(60, 'dolphin kottu', 'Kottu', 900, 'Masala Kottu.jpg', '2023-02-11 20:58:18', 1),
(61, 'NEI DUM BAROTTA', 'Barotta', 750, 'NEI DUM BAROTTA.jpg', '2023-02-11 21:01:53', 1),
(62, 'meatball noodles', 'Noodles', 800, 'spaghetti-and-meatballs-min.jpg', '2023-02-11 21:04:13', 1),
(63, 'BreadKottu', 'Kottu', 900, 'photo1-min.png', '2023-02-11 22:34:05', 1),
(65, 'Parotta  Spiced Chicken Curry', 'Barotta', 750, 'photo4-min.png', '2023-02-11 22:36:01', 1),
(66, 'Cheese prawns kottu', 'Cheese Kottu', 1100, 'Prawns kottu1-min.jpg', '2023-02-11 22:37:45', 1),
(67, 'Cheese Chicken kottu', 'Cheese Kottu', 1200, 'Cheese kottu-min.jpg', '2023-02-11 22:39:20', 1),
(68, 'Chicken fry', 'Bites', 550, 'Chicken fry-min.jpg', '2023-02-11 22:43:03', 1),
(71, 'Burger', 'Specialty', 800, 'photo10.png', '2023-02-13 01:37:16', 1),
(72, 'Egg Kottu', 'Kottu', 900, 'Egg kottu-min.jpg', '2023-02-14 15:31:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `TP_NO` int(10) NOT NULL,
  `DOB` varchar(20) NOT NULL,
  `AGE` int(3) NOT NULL,
  `status` varchar(20) NOT NULL,
  `Nationality` varchar(20) NOT NULL,
  `Postcode` varchar(20) NOT NULL,
  `Qualification` varchar(500) NOT NULL,
  `skill` varchar(30) NOT NULL,
  `Language` varchar(30) NOT NULL,
  `Experience` int(3) NOT NULL,
  `Experince_info` varchar(500) NOT NULL,
  `Porject` int(11) NOT NULL,
  `Awards` int(11) NOT NULL,
  `Education` varchar(500) NOT NULL,
  `MAIL` varchar(50) NOT NULL,
  `Profile_IMG` varchar(200) NOT NULL,
  `ABOUT` varchar(500) NOT NULL,
  `Profile_ID` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`ID`, `Name`, `Address`, `TP_NO`, `DOB`, `AGE`, `status`, `Nationality`, `Postcode`, `Qualification`, `skill`, `Language`, `Experience`, `Experince_info`, `Porject`, `Awards`, `Education`, `MAIL`, `Profile_IMG`, `ABOUT`, `Profile_ID`) VALUES
(1, 'vebeshan, vtv', 'Batticaloa', 779923155, '2000-12-11', 23, 'Single', 'Srilankan', '3000', 'Diploma in English (DIE),\nDiploma in IT,\nDiploma in Computerised Accounting (DICA)', 'Back End Developer', 'Tamil', 2, 'I have worked as a Senior Business Advisor in Janashakthi Life Insurance PLC, where I honed my skills in customer service and sales. I also have experience as an operator in the technology industry.', 2, 2, 'I have completed a Diploma in English, a Diploma in IT, and a Diploma in Computerised Accounting, giving me a well-rounded skill set in these areas.', 'vebeshanvtv@gmail.com', 'InShot_20220603_101425650.jpg', 'I am a professional from Batticaloa, Sri Lanka with a strong background in English, technology, and accounting. I have completed a Diploma in English, a Diploma in IT, and a Diploma in Computerised Accounting, giving me a well-rounded skill set in these areas.', '0009'),
(2, 'Vaishu', 'No:122/2, Gnanasooriyam Square,\r\n2nd cross,\r\nBatticaloa.', 766776439, '1999.11.08', 24, 'Single', 'Srilankan', '3000', 'Diploma In ICT', 'System Analyst', 'English', 2, 'I have experience in Adobe Photoshop, Adobe Ilustrator.And also can Create system usring C# and JAVA.\r\ncan handle things in MYSQL database ,PHP and JavaSript.', 2, 2, '', 'vaishnavignanapragasam@gmail.com', 'profile3-min.jpg', 'I am vaishnavi . I am from Batticaloa. I have some Basic knowledge in Adobe Photoshop, Adobe Ilustrator.And also can Create system usring C# and JAVA.\r\ncan handle things in MYSQL database ,PHP and JavaSript.', '0002'),
(3, 'Lukshan', 'valaichenai', 753112495, '2000.12.11', 23, 'Single', 'Srilankan', '3000', ' DIPLOMA IN ICT ', 'frontend developer', 'English', 2, 'I have one year of experience working as a graphic designer at my studio, where I had the opportunity to work with a variety of clients and create designs for a range of mediums, including brochures, banners , and  social media posts.\r\n', 2, 2, ' DIPLOMA IN ICT ', 'lukshan@gmail.com', 'profile2-min.jpg', 'I am a graphic designer with a passion for creating visually appealing designs and layouts. I have a National Certificate in Computer Graphic Design and a certificate in Computer Office Management. I am proficient in Adobe Photoshop, Illustrator, and InDesign, and have a strong understanding of graphic design principles. In my free time, I enjoy experimenting with new design techniques and staying up-to-date with the latest design trends. I am also passionate about photography and using my creat', '0027'),
(5, 'Jeyanthi', 'vantharumoolai', 768896433, '1999.11.08', 24, 'Single', 'Srilankan', '3000', 'Diploma In ICT', 'Database Designer', 'English', 2, '', 2, 2, 'Diploma In ICT', 'jeyanthi@gmail.com', 'profile4-min.JPG', '', '0016');

-- --------------------------------------------------------

--
-- Table structure for table `profile_login`
--

CREATE TABLE `profile_login` (
  `Profile_ID` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_login`
--

INSERT INTO `profile_login` (`Profile_ID`, `Password`) VALUES
('0002', 'vaishu'),
('0009', 'vebeshan'),
('0016', 'jeyanthi');

-- --------------------------------------------------------

--
-- Table structure for table `reply_mail`
--

CREATE TABLE `reply_mail` (
  `ID` int(11) NOT NULL,
  `Email` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `subject` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `message` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply_mail`
--

INSERT INTO `reply_mail` (`ID`, `Email`, `subject`, `message`, `status`) VALUES
(27, ' vebeshanvtv@gmail.com', 'Info', 'hi...\r\n', 1),
(28, ' vebeshanvtv@gmail.com', 'services', 'Hi your website very cool i like it...', 1),
(29, ' vebeshanvtv@gmail.com', 'Foods', 'Your foods are vey tasty', 1),
(30, ' vebeshanvtv@gmail.com', 'services', 'Your website services are good...', 1),
(31, ' vebeshanvtv@gmail.com', 'Foods', 'Tasty Foods here...............', 1),
(32, ' vebeshanvtv@gmail.com', 'Services', 'You are providing good services to customers...', 1);

-- --------------------------------------------------------

--
-- Table structure for table `report_info`
--

CREATE TABLE `report_info` (
  `Delivery_ID` varchar(10) NOT NULL,
  `Order_ID` varchar(10) NOT NULL,
  `Customer_ID` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Product_ID` varchar(10) NOT NULL,
  `Product_Info` varchar(300) NOT NULL,
  `Total` int(100) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resturent`
--

CREATE TABLE `resturent` (
  `resturent_Name` varchar(50) NOT NULL,
  `phone_No` int(12) NOT NULL,
  `address` varchar(50) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `open_to` varchar(10) NOT NULL,
  `close_from` varchar(10) NOT NULL,
  `open_hour_am` varchar(10) NOT NULL,
  `closed_hour_pm` varchar(10) NOT NULL,
  `status` int(1) NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resturent`
--

INSERT INTO `resturent` (`resturent_Name`, `phone_No`, `address`, `Email`, `open_to`, `close_from`, `open_hour_am`, `closed_hour_pm`, `status`, `photo`) VALUES
('Mr kottu', 779923155, 'PMGQ+9M7, Gnanasuriyam Square 2, Batti', 'Mrkottu@gmail.com', 'Monday', 'Saturday', '6', '10', 1, 'Mr.K logo-min.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ID` int(11) NOT NULL,
  `Customer_ID` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `From_mail` varchar(30) NOT NULL,
  `To_mail` varchar(30) NOT NULL,
  `Subject` text NOT NULL,
  `Message` varchar(200) NOT NULL,
  `Rating` varchar(20) NOT NULL,
  `Date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`ID`, `Customer_ID`, `Name`, `image`, `From_mail`, `To_mail`, `Subject`, `Message`, `Rating`, `Date`, `status`) VALUES
(12, '25', 'Vebeshan', 'face1.jpg', 'Mrkottu@gmail.com', 'vebeshanvtv@gmail.com', 'Chicken fry', 'Good Food and very tasty', '5', '2023-02-12 14:26:34', 0),
(13, '25', 'Vebeshan', 'face1.jpg', 'Mrkottu@gmail.com', 'vebeshanvtv@gmail.com', 'Cheese prawns kottu', 'wow very tasty...........', '4', '2023-02-12 14:27:08', 0),
(14, '25', 'Vebeshan', 'testimonials-1.jpg', 'Mrkottu@gmail.com', 'vebeshanvtv@gmail.com', 'Chicken fry', 'TASTY........................', '2', '2023-02-15 12:47:38', 0),
(15, '25', 'Vebeshan', 'testimonials-1.jpg', 'Mrkottu@gmail.com', 'vebeshanvtv@gmail.com', 'Chicken fry', 'food nice...', '5', '2023-02-24 15:27:29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `special_menu`
--

CREATE TABLE `special_menu` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `price` int(5) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `special_menu`
--

INSERT INTO `special_menu` (`ID`, `Name`, `Category`, `price`, `photo`) VALUES
(29, 'Cheese sandwich', 'Specialty', 600, 'Cheese sandwich-min.jpeg'),
(30, 'dolphin kottu', 'Kottu', 900, 'Masala Kottu.jpg'),
(31, 'meatball noodles', 'Noodles', 800, 'spaghetti-and-meatballs-min.jpg'),
(32, 'Cheese Chicken kottu', 'Cheese Kottu', 1200, 'Cheese kottu-min.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Email` (`Email`);

--
-- Indexes for table `admintrigger`
--
ALTER TABLE `admintrigger`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID`),
  ADD UNIQUE KEY `Tel_no` (`Tel_no`),
  ADD UNIQUE KEY `E_mail` (`E_mail`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `home_page`
--
ALTER TABLE `home_page`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_info`
--
ALTER TABLE `orders_info`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `order_cancel`
--
ALTER TABLE `order_cancel`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_ID`),
  ADD UNIQUE KEY `Product_ID` (`Product_ID`),
  ADD UNIQUE KEY `Product_Name` (`Product_Name`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `profile_login`
--
ALTER TABLE `profile_login`
  ADD PRIMARY KEY (`Profile_ID`),
  ADD UNIQUE KEY `ID` (`Profile_ID`);

--
-- Indexes for table `reply_mail`
--
ALTER TABLE `reply_mail`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `resturent`
--
ALTER TABLE `resturent`
  ADD PRIMARY KEY (`resturent_Name`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `special_menu`
--
ALTER TABLE `special_menu`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `admintrigger`
--
ALTER TABLE `admintrigger`
  MODIFY `NO` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `home_page`
--
ALTER TABLE `home_page`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `orders_info`
--
ALTER TABLE `orders_info`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `order_cancel`
--
ALTER TABLE `order_cancel`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `reply_mail`
--
ALTER TABLE `reply_mail`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `special_menu`
--
ALTER TABLE `special_menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
