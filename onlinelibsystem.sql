-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2023 at 07:00 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinelibsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `isbn` int(20) NOT NULL,
  `firtsname` varchar(20) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `lastname` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `accession_number` int(20) NOT NULL,
  `isbn` int(20) NOT NULL,
  `issn` int(25) NOT NULL,
  `lccn` int(30) NOT NULL,
  `book_value` int(11) NOT NULL,
  `title` varchar(125) NOT NULL,
  `authors` varchar(45) NOT NULL,
  `publish_date` date NOT NULL,
  `publisher` varchar(60) NOT NULL,
  `book_category` varchar(90) NOT NULL,
  `book_status` varchar(30) NOT NULL,
  `material_type` varchar(30) NOT NULL,
  `book_remarks` varchar(25) NOT NULL,
  `edition` varchar(50) NOT NULL,
  `book_cover` varchar(20) NOT NULL,
  `book_section` varchar(20) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `book_shelved` varchar(35) NOT NULL,
  `copyright` varchar(50) NOT NULL,
  `extent` varchar(50) NOT NULL,
  `size` int(20) NOT NULL,
  `place` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `book_copy`
--

CREATE TABLE `book_copy` (
  `accession_number` int(25) NOT NULL,
  `book_qty` int(20) NOT NULL,
  `book_title` varchar(50) NOT NULL,
  `book_date_arrival` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE `catalog` (
  `category_id` int(11) NOT NULL,
  `category` varchar(125) NOT NULL,
  `ddecimal` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`category_id`, `category`, `ddecimal`) VALUES
(1, 'Computers, Information and General Reference', '000'),
(2, 'Philosophy and Psychology', '100'),
(3, 'Religion', '200'),
(4, 'Social Science', '300'),
(5, 'Language', '400'),
(6, 'Science', '500'),
(7, 'Technology', '600'),
(8, 'Arts and Recreation', '700'),
(9, 'Literature', '800'),
(10, 'History and Geography', '900'),
(12, 'ALL', 'ALL');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `school_id` int(20) NOT NULL,
  `book_value` int(100) NOT NULL,
  `school_name` varchar(50) NOT NULL,
  `street` varchar(30) NOT NULL,
  `barangay` varchar(35) NOT NULL,
  `city` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sdo`
--

CREATE TABLE `sdo` (
  `sdo_id` int(25) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `accession number` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `date_returned` date NOT NULL,
  `date_borrowed` date NOT NULL,
  `remarks` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `school_id` int(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `phone_number` int(15) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `street` varchar(20) NOT NULL,
  `barangay` varchar(35) NOT NULL,
  `city` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`school_id`, `email`, `password`, `phone_number`, `firstname`, `middle_name`, `lastname`, `school_name`, `street`, `barangay`, `city`) VALUES
(3, 'admin', 'password', 0, 'Active', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`accession_number`);

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `sdo`
--
ALTER TABLE `sdo`
  ADD PRIMARY KEY (`sdo_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`accession number`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`school_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
