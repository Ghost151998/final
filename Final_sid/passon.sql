-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2018 at 06:52 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `passon`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_code` varchar(10) NOT NULL,
  `admin_password` varchar(15) NOT NULL,
  `admin_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_code`, `admin_password`, `admin_name`) VALUES
('siddhant', '123456', 'Nihilistimistic');

-- --------------------------------------------------------

--
-- Table structure for table `bikes`
--

CREATE TABLE `bikes` (
  `id` int(11) NOT NULL,
  `seller` varchar(8) NOT NULL,
  `gear` tinyint(1) NOT NULL DEFAULT '0',
  `brand` text NOT NULL,
  `colour` text,
  `quality` set('new','good','ok','poor') NOT NULL,
  `description` text NOT NULL,
  `price` varchar(10) NOT NULL,
  `is_sold` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bikes`
--

INSERT INTO `bikes` (`id`, `seller`, `gear`, `brand`, `colour`, `quality`, `description`, `price`, `is_sold`) VALUES
(1, '20168059', 1, 'Atlas Nixer', 'Red', 'good', 'Highly maintained...you won\'t need to do much.', '2000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `author` text NOT NULL,
  `title` text NOT NULL,
  `edition` text,
  `seller` varchar(8) NOT NULL,
  `branch` set('cseit','mechprod','chem','biot','civ','ece','ee') DEFAULT NULL,
  `sem` set('1','3','4','5','6','7','8') DEFAULT NULL,
  `description` text NOT NULL,
  `quality` set('new','good','ok','poor') NOT NULL,
  `price` varchar(10) NOT NULL,
  `is_sold` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Info of Books';

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `author`, `title`, `edition`, `seller`, `branch`, `sem`, `description`, `quality`, `price`, `is_sold`) VALUES
(1, 'RD Sharma', 'Maths', '4th Edition', '20168059', 'ece', '3', 'A bit old.Good condition.No pencil marks.', 'ok', '200', 1),
(2, 'IE Irodov', 'Physics', '3', 'vishal', 'ece', '3', 'book', 'new', '114', 1),
(3, 'Paulo Coelho', 'The Alchemist', '4', '20168059', 'ece', '3', 'Great Novel', 'new', '350', 0),
(9, 'SL Loney', 'Trigonometry', '4', '20168059', 'ece', '5', '1234', 'poor', '450', 0),
(10, 'Dennis Ritchie', 'Let Us C', '2', '20168059', 'ece', '3', 'great book', 'new', '4000', 0),
(12, 'R.C Verma', 'Google Me', '3', '20168059', 'ece', '3', 'okay', 'good', '455', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `reg` varchar(8) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_category` set('books','bikes','misc','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `misc`
--

CREATE TABLE `misc` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `quality` set('new','good','ok','poor') NOT NULL,
  `description` text NOT NULL,
  `price` varchar(10) NOT NULL,
  `is_sold` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `misc`
--

INSERT INTO `misc` (`id`, `name`, `quality`, `description`, `price`, `is_sold`) VALUES
(1, 'Washing Machine', 'poor', 'machine of DOOM', '3050', 1);

-- --------------------------------------------------------

--
-- Table structure for table `salerequest`
--

CREATE TABLE `salerequest` (
  `id` int(11) NOT NULL,
  `seller` varchar(8) NOT NULL,
  `category` set('books','bikes','misc','') NOT NULL,
  `author` text,
  `title` text,
  `edition` text,
  `branch` set('cseit','mechprod','chem','civ','ee','ece','biot') DEFAULT NULL,
  `sem` set('1','2','3','4','5','6','7','8') DEFAULT NULL,
  `brand` text,
  `colour` text,
  `gear` tinyint(1) DEFAULT '0',
  `name` varchar(15) DEFAULT NULL,
  `description` text NOT NULL,
  `quality` set('new','good','ok','poor') NOT NULL,
  `price` varchar(10) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salerequest`
--

INSERT INTO `salerequest` (`id`, `seller`, `category`, `author`, `title`, `edition`, `branch`, `sem`, `brand`, `colour`, `gear`, `name`, `description`, `quality`, `price`, `deleted`) VALUES
(1, '20168059', 'books', 'RD Sharma', 'Maths', '4', 'cseit', '3', NULL, NULL, NULL, NULL, 'drip', 'new', '350', 1),
(2, '20168043', 'bikes', NULL, '', NULL, NULL, NULL, 'Lamborghini Aventador', 'Red', 0, NULL, 'Real Fast', 'new', '1000', 0),
(5, '20168059', 'books', 'SL Loney', 'Trigonometry', '4', 'chem', '5', NULL, NULL, NULL, NULL, '1234', 'poor', '450', 1),
(6, '20168059', 'books', 'Coremen', 'Algorithms', '4', 'cseit', '4', NULL, NULL, NULL, NULL, 'It\'s a big book.Read it to become ALGO GOD.', 'new', '1000', 0),
(31, '20168059', 'books', 'Dennis Ritchie', 'Let Us C', '2', 'cseit', '3', NULL, NULL, NULL, NULL, 'excellent', 'new', '4000', 1),
(34, '20168059', 'books', 'mark', 'Google Me', '3', 'ece', '3', NULL, NULL, 0, NULL, 'bezos', 'good', '455', 1),
(35, '20168059', 'misc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'jsndjsnjd', 'jdfbdfhbhbu', 'ok', '233', 0),
(36, '20168059', 'books', 'jdhfjhdfj', 'hjfhdjfh', '237', 'cseit', '1', NULL, NULL, 0, NULL, 'djhfdh', 'new', '23', 0),
(37, '20168059', 'books', '', '', '', 'cseit', '1', NULL, NULL, 0, NULL, 'hdgfhgdhf', 'new', '3434', 0),
(38, '20168059', 'books', '', 'jenfjnejf', '374', 'cseit', '1', NULL, NULL, 0, NULL, 'hdbfheheh', 'new', '3764', 0),
(39, '20168059', 'books', '', '', '', 'cseit', '1', NULL, NULL, 0, NULL, 'hdbfhdhg', 'new', '634', 0),
(40, '20168059', 'books', '', '', '', 'cseit', '1', NULL, NULL, 0, NULL, 'jehehfuehfuehfu', 'new', '34', 0),
(41, '20168059', 'books', '', '', '', 'cseit', '1', NULL, NULL, 0, NULL, 'sbdjdfdfhd', 'new', '374', 0),
(42, '20168059', 'books', 'hgeyfgeyfge', '', '', 'cseit', '1', NULL, NULL, 0, NULL, 'bdfhhe', 'new', '3434', 0),
(43, '20168059', 'books', '', '', '', 'cseit', '1', NULL, NULL, 0, NULL, 'hegfy', 'new', '3646', 0),
(44, '20168059', 'books', '', '', '', 'cseit', '1', NULL, NULL, 0, NULL, 'jdhfhdfh', 'new', '3748', 0),
(45, '20168059', 'books', 'heehfgeyf', '', '', 'cseit', '1', NULL, NULL, 0, NULL, 'jehfeh', 'new', '7634', 0),
(46, '20168059', 'books', 'dfhhdf', 'hdjhjfh', '', 'cseit', '1', NULL, NULL, 0, NULL, 'dhbfhdgfhg', 'new', '37647', 0),
(47, '20168059', 'books', 'kdhfjhjehf', 'wjiejiejijei', '12', 'cseit', '6', NULL, NULL, 0, NULL, 'jfjhdfehjfhejfhe', 'new', '7347', 0),
(48, '20168059', 'bikes', NULL, NULL, NULL, NULL, NULL, 'djfhdjfhjd', 'red', 0, NULL, 'djfijeijij', 'new', '2873', 0),
(49, '20168059', 'books', 'hdfjdgfhg', 'hfudhfu', '487', 'cseit', '1', NULL, NULL, 0, NULL, 'ghdfgdhgf', 'new', '34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sold_items`
--

CREATE TABLE `sold_items` (
  `checkout_id` int(11) NOT NULL,
  `reg` varchar(8) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_category` set('books','bikes','misc') NOT NULL,
  `is_delivered` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sold_items`
--

INSERT INTO `sold_items` (`checkout_id`, `reg`, `item_id`, `item_category`, `is_delivered`) VALUES
(1, '20168059', 2, 'books', 0),
(2, '20168059', 1, 'bikes', 0),
(4, '20168059', 2, 'books', 0),
(5, '20168059', 3, 'books', 1),
(6, '20168059', 10, 'books', 1),
(7, '20168059', 2, 'books', 0),
(8, '20168059', 12, 'books', 0),
(9, '20168059', 1, 'books', 0),
(10, '20168059', 10, 'books', 0),
(11, '20168059', 1, 'bikes', 0),
(12, '20168059', 1, 'misc', 0),
(13, '20168059', 10, 'books', 0),
(14, '20168059', 2, 'books', 0),
(15, '20168059', 12, 'books', 0),
(16, '20168059', 1, 'books', 0),
(17, '20168059', 9, 'books', 0),
(18, '20168059', 10, 'books', 0),
(19, '20168059', 2, 'books', 0),
(20, '20168059', 12, 'books', 0),
(21, '20168059', 1, 'books', 0),
(22, '20168059', 1, 'bikes', 0),
(23, '20168059', 1, 'misc', 0),
(24, '20168059', 1, 'books', 0),
(25, '20168059', 2, 'books', 0),
(26, '20168059', 3, 'books', 0),
(27, '20168059', 10, 'books', 0),
(28, '20168059', 12, 'books', 0),
(29, '20168059', 9, 'books', 0),
(30, '20168059', 1, 'bikes', 0),
(31, '20168059', 1, 'books', 0),
(32, '20168059', 3, 'books', 0),
(33, '20168059', 2, 'books', 0),
(34, '20168059', 10, 'books', 0),
(35, '20168059', 12, 'books', 0),
(36, '20168059', 9, 'books', 0),
(37, '20168059', 1, 'misc', 0),
(38, '20168059', 1, 'misc', 0),
(39, '20168059', 2, 'books', 0),
(40, '20168059', 1, 'books', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_reg` varchar(8) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_reg`, `user_password`, `first_name`, `last_name`, `email`, `phone_number`, `address`) VALUES
('20168043', '1234', 'shion', 'sinha', 'shionsinha@gmail.com', 'wir2r339rj', '223 Patel Hostel'),
('20168059', 'nmistic', 'Siddhant', 'Sinha', 'siddhantsinha140@gmail.com', '7903265214', '223 Patel Hostel MNNIT Allahabad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_code`);

--
-- Indexes for table `bikes`
--
ALTER TABLE `bikes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `misc`
--
ALTER TABLE `misc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salerequest`
--
ALTER TABLE `salerequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sold_items`
--
ALTER TABLE `sold_items`
  ADD PRIMARY KEY (`checkout_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_reg`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bikes`
--
ALTER TABLE `bikes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `misc`
--
ALTER TABLE `misc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `salerequest`
--
ALTER TABLE `salerequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `sold_items`
--
ALTER TABLE `sold_items`
  MODIFY `checkout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
