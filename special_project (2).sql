-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2018 at 12:13 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `special_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `username` varchar(255) NOT NULL,
  `announcement` text NOT NULL,
  `user_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`username`, `announcement`, `user_image`) VALUES
('art', 'bawal na mag OT', 'assets/img/userimages/1518662651.png'),
('christian', 'haaaaaay', 'assets/img/userimages/1519112678.jpg'),
('art', 'Thursday na bukas', 'assets/img/userimages/1518662651.png'),
('art', 'You may hold my hand for a while, \nbut you hold my heart forever. - purelovequotes.com ', 'assets/img/userimages/1518662651.png'),
('christian', ' lalasan aishteru <3', 'assets/img/userimages/1519112678.jpg'),
('art', 'I need you like a heart needs a beat. - purelovequotes.com ', 'assets/img/userimages/1518662651.png'),
('christian', ' cute ni kuya art', 'assets/img/userimages/1519112678.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `time_in_out`
--

CREATE TABLE `time_in_out` (
  `user_name` varchar(255) NOT NULL,
  `time_in` varchar(255) NOT NULL,
  `date_in` varchar(255) NOT NULL,
  `time_out` varchar(255) NOT NULL,
  `date_out` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_in_out`
--

INSERT INTO `time_in_out` (`user_name`, `time_in`, `date_in`, `time_out`, `date_out`, `status`) VALUES
('deean', '18 : 59 : 52', '22 / 2 / 2018', '18 : 59 : 55', '22 / 2 / 2018', 'Out'),
('deean', '18 : 59 : 58', '22 / 2 / 2018', '18 : 59 : 58', '22 / 2 / 2018', 'Out'),
('deean', '19 : 00 : 00', '22 / 2 / 2018', '19 : 00 : 01', '22 / 2 / 2018', 'Out'),
('deean', '19 : 00 : 01', '22 / 2 / 2018', '19 : 00 : 02', '22 / 2 / 2018', 'Out'),
('deean', '19 : 00 : 02', '22 / 2 / 2018', '19 : 00 : 02', '22 / 2 / 2018', 'Out'),
('deean', '19 : 00 : 31', '22 / 2 / 2018', '', '', 'On Work'),
('', '', '', '', '', 'On Work');

-- --------------------------------------------------------

--
-- Table structure for table `user_credentials`
--

CREATE TABLE `user_credentials` (
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `contact_number` int(12) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_credentials`
--

INSERT INTO `user_credentials` (`first_name`, `middle_name`, `last_name`, `email_address`, `contact_number`, `username`, `password`, `user_image`, `status`, `position`) VALUES
('', '', '', '', 0, '', '', '', 'On Work', 'Admin'),
('Art', 'Art', 'Art', 'Art', 909, 'Art', 'Art', 'assets/img/userimages/1518662651.png', 'Out', 'Admin'),
('christian', 'christian', 'christian', 'christian', 990, 'christian', 'c', 'assets/img/userimages/1519112678.jpg', 'Out', 'Admin'),
('Dianne', 'Bernardo', 'Sison', 'deeansison@gmail.com', 909, 'deean', 'deean', 'assets/img/userimages/1518662605.png', 'On Work', 'Employee'),
('Elsa', 'Elsa', 'Arendelle', 'elsa@y.com', 43234, 'elsa', 'elsa', 'assets/img/userimages/1519186702.jpeg', 'Out', 'Employee'),
('jerahmeel', 'carillo', 'catubag', 'jek', 909, 'jeck', 'jeck', 'assets/img/userimages/1518665123.png', 'Out', 'Employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_credentials`
--
ALTER TABLE `user_credentials`
  ADD PRIMARY KEY (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
