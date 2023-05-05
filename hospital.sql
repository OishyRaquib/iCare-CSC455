-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 06:51 PM
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
-- Table structure for table `admin_data`
--

CREATE TABLE `admin_data` (
  `admin_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `admin_password` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_data`
--

INSERT INTO `admin_data` (`admin_name`, `admin_password`) VALUES
('Aman', '0000'),
('oishy', '12345'),
('IQRA', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_details`
--

CREATE TABLE `appointment_details` (
  `app_day` varchar(9) NOT NULL,
  `app_time` varchar(20) NOT NULL,
  `app_doc_name` varchar(50) NOT NULL,
  `app_doc_phone` varchar(11) NOT NULL,
  `app_doc_dept` varchar(15) NOT NULL,
  `app_problem` varchar(100) NOT NULL,
  `app_pat_phone` varchar(15) NOT NULL,
  `app_pat_name` varchar(100) NOT NULL,
  `app_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment_details`
--

INSERT INTO `appointment_details` (`app_day`, `app_time`, `app_doc_name`, `app_doc_phone`, `app_doc_dept`, `app_problem`, `app_pat_phone`, `app_pat_name`, `app_date`) VALUES
('Sunday', '9:30-10:30 AM', 'Oishy Raquib', '999', 'Cardiology', '', '  2222  ', 'jannat', '7/5/23'),
('Sunday', '12:30-1:00 AM', 'Oishy Raquib', '999', 'Cardiology', '', '  2222  ', 'jannat', '7/5/23'),
('Sunday', '12:30-1:00 AM', 'James Peteren', '888', 'Neurology', '', '  4444  ', 'John', '7/5/23');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dep_name` varchar(50) NOT NULL,
  `dep_des` varchar(500) NOT NULL,
  `dep_rev` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dep_name`, `dep_des`, `dep_rev`) VALUES
('Cardiology', 'This is the branch of medicine that deals with the study and treatment of diseases of the heart and blood vessels. Cardiologists diagnose and treat conditions such as coronary artery disease, heart failure, valvular heart disease, and arrhythmias.', '8.8'),
('Hematology', ' Hematology is the study of blood and blood-forming tissues. Hematologists diagnose and treat diseases of the blood, including blood cancers such as leukemia, lymphoma, and multiple myeloma, as well as disorders of the bone marrow and lymphatic system.', '9.3'),
('Neurology', 'Neurology is the branch of medicine that deals with disorders of the nervous system. Neurologists diagnose and treat conditions such as epilepsy, multiple sclerosis, Parkinson disease, and other forms of dementia.', '7.3');

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

-- --------------------------------------------------------

--
-- Table structure for table `doctor_schedule`
--

CREATE TABLE `doctor_schedule` (
  `day` varchar(9) NOT NULL,
  `date` varchar(9) NOT NULL,
  `time` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_schedule`
--

INSERT INTO `doctor_schedule` (`day`, `date`, `time`) VALUES
('Sunday', '7/5/23', '8:00-9:00 AM'),
('Sunday', '7/5/23', '9:30-10:30 AM'),
('Sunday', '7/5/23', '12:30-1:00 AM'),
('Monday', '8/5/23', '8:00-9:00 AM'),
('Monday', '8/5/23', '9:30-10:30 AM'),
('Monday', '8/5/23', '12:30-1:00 AM');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `m_name` varchar(50) NOT NULL,
  `m_email` varchar(50) NOT NULL,
  `m_subject` varchar(50) NOT NULL,
  `m_message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`m_name`, `m_email`, `m_subject`, `m_message`) VALUES
('', '', '', ''),
('John Doe', '', 'subject', 'GREAT UI');

-- --------------------------------------------------------

--
-- Table structure for table `patient_details`
--

CREATE TABLE `patient_details` (
  `pat_name` varchar(50) NOT NULL,
  `pat_age` int(11) NOT NULL,
  `pat_phone` varchar(50) NOT NULL,
  `pat_pass` varchar(50) NOT NULL,
  `pat_gender` varchar(50) NOT NULL,
  `pat_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_details`
--

INSERT INTO `patient_details` (`pat_name`, `pat_age`, `pat_phone`, `pat_pass`, `pat_gender`, `pat_email`) VALUES
('emma', 20, '1234', '1234', 'Female', 'emma@gmail.com'),
('John', 15, '4444', '4444', 'Male', 'john@gmail'),
('jannat', 21, '2222', '2222', 'Female', 'iqra36687@gmail.com'),
('Emma shelton', 12, '666', '666', 'Female', 'shelton@gmail'),
('', 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `p_name` varchar(50) NOT NULL,
  `p_date` date NOT NULL DEFAULT current_timestamp(),
  `p_treat_details` varchar(500) NOT NULL,
  `p_meds` varchar(500) NOT NULL,
  `p_inst` varchar(500) NOT NULL,
  `p_docphone` varchar(11) NOT NULL,
  `p_patphone` varchar(11) NOT NULL,
  `d_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`p_name`, `p_date`, `p_treat_details`, `p_meds`, `p_inst`, `p_docphone`, `p_patphone`, `d_name`) VALUES
('jannat', '2023-05-03', 'medications to control heart rate and rhythm, as well as blood thinners to prevent blood clots and reduce the risk of stroke', 'antiarrhythmics', 'reduce caffeine and alcohol intake, quitting smoking', '999', '  2222  ', 'Oishy Raquib'),
('jannat', '2023-05-03', 'new treat', 'new med', 'new instruction', '999', '  2222  ', 'Oishy Raquib'),
('jannat', '2023-05-01', 'test', 'tstt3', 'teste', '999', '  2222  ', 'Oishy Raquib');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `rep_pname` varchar(50) NOT NULL,
  `rep_dname` varchar(50) NOT NULL,
  `rep_pphone` varchar(50) NOT NULL,
  `rep_dphone` varchar(50) NOT NULL,
  `rep_day` varchar(50) NOT NULL,
  `rep_treatdetails` varchar(500) NOT NULL,
  `rep_med` varchar(500) NOT NULL,
  `rep_specialins` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
