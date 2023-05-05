-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 06:25 PM
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
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor_details`
--

CREATE TABLE `doctor_details` (
  `doc_name` varchar(50) NOT NULL,
  `doc_phone` varchar(50) NOT NULL,
  `doc_exp` varchar(50) NOT NULL,
  `doc_dept` varchar(50) NOT NULL,
  `doc_pass` varchar(50) NOT NULL,
  `doc_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_details`
--

INSERT INTO `doctor_details` (`doc_name`, `doc_phone`, `doc_exp`, `doc_dept`, `doc_pass`, `doc_desc`) VALUES
('James Peteren', '888', '10', 'Neurology', '888', 'Lorem ipsum, dolor sit amet consectetur adipisicin'),
('Oishy Raquib', '999', '10', 'Cardiology', '999', 'Lorem ipsum, dolor sit amet consectetur adipisicin'),
('Aman ', '666', '10', 'Hematology', '666', 'Lorem ipsum, dolor sit amet consectetur adipisicin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
