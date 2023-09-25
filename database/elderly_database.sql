-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 17, 2023 at 08:46 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elderly_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_password` varchar(16) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6020 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_password`) VALUES
(6019, 'cheeseburger');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `appoint_id` int(11) NOT NULL AUTO_INCREMENT,
  `select_date` date NOT NULL,
  `time_slot` varchar(9) NOT NULL,
  `medical_request_details` varchar(255) NOT NULL,
  `request_speciality` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `pat_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  PRIMARY KEY (`appoint_id`),
  KEY `Pat_ID` (`pat_id`),
  KEY `Doc_ID` (`doc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appoint_id`, `select_date`, `time_slot`, `medical_request_details`, `request_speciality`, `status`, `pat_id`, `doc_id`) VALUES
(1, '2023-01-16', '0800-1000', 'Brain Pain', 'Neurology', 'Accepted', 2, 3),
(2, '2023-01-17', '1000-1200', 'Mouth Pain', 'General Surgery', 'Accepted', 1, 2),
(3, '2023-01-17', '1300-1500', 'Headache', 'Anesthesiology', 'Accepted', 3, 3),
(4, '2023-01-24', '1500-1700', 'surg', 'General Surgery', 'Pending', 2, 1),
(5, '2023-01-18', '1300-1500', 'surg', 'Neurology', 'Pending', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctorlist`
--

DROP TABLE IF EXISTS `doctorlist`;
CREATE TABLE IF NOT EXISTS `doctorlist` (
  `doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_name` varchar(255) NOT NULL,
  `doctor_email` varchar(255) NOT NULL,
  `doctor_contact` varchar(50) NOT NULL,
  `doctor_speciality` text NOT NULL,
  `doctor_languages` varchar(20) NOT NULL,
  `doctor_gender` varchar(10) NOT NULL,
  `shift_hours` varchar(50) NOT NULL,
  `doc_pic` varchar(255) NOT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctorlist`
--

INSERT INTO `doctorlist` (`doc_id`, `doctor_name`, `doctor_email`, `doctor_contact`, `doctor_speciality`, `doctor_languages`, `doctor_gender`, `shift_hours`, `doc_pic`) VALUES
(1, '', '', '', '', '', '', '', ''),
(2, 'Dr Mah', 'eve@gmail.com', '0111082287', 'General Surgery', 'English', 'Female', '9am-5pm', 'doctor_117169531.jpg'),
(3, 'Dr Ivan Wong', 'ivanawong@gmail.com', '0122334282', 'Anesthesiology', 'English', 'Male', '9am-5pm', 'dr_ivan.jpg'),
(4, 'Dr Gupta', 'gupta@gmail.com', '0128282828', 'Neurology', 'Bahasa Malaysia', 'Male', '9am-5pm', 'dr_gupta.jpg'),
(5, 'Dr John Paulose', 'john@gmail.com', '0187456320', 'Pathology', 'English', 'Male', '9am-5pm', 'doc_john.jpg'),
(6, 'Dr Joshua Wong', 'josh@gmail.com', '0121789654', 'Neurology', 'Bahasa Malaysia', 'Male', 'Part-time', 'doc_josh.jpg'),
(7, 'Dr Mah', 'mah@gmail.com', '0111101101', 'Pathology', 'Mandarin', 'Female', 'Part-time', 'doc_pik.jpg'),
(8, 'Dr Cardio', 'doctor@gmail.com', '0129873546', 'Anesthesiology', 'Mandarin', 'Male', '9am-5pm', 'cardiology_doctor.jpg'),
(9, 'Pete', 'pete@gmail.com', '0111101101', 'Pathology', 'English', 'Male', '9am-5pm', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `feed_id` int(11) NOT NULL AUTO_INCREMENT,
  `pat_id` int(11) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  PRIMARY KEY (`feed_id`),
  KEY `pat_id` (`pat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feed_id`, `pat_id`, `feedback`) VALUES
(1, 2, 'thx'),
(2, 2, 'tq'),
(3, 2, 'feedback\r\n'),
(4, 8, 'feedback');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `pat_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `patient_ic` varchar(12) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  PRIMARY KEY (`pat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pat_id`, `username`, `password`, `email`, `patient_ic`, `phone_number`, `gender`) VALUES
(1, 'CheeseBurger69', 'aaaaa', 'cheeseburger@gmail.com', '023020112719', '0122334272', 'Male'),
(2, 'Xiao', 'xiao123', 'xiao@gmail.com', '200417101011', '0123456789', 'Male'),
(3, 'john', '123', 'john@gmail.com', '020120141028', '0123459876', 'Female'),
(4, 'Ivan Wong', '123', 'ivan@yahoo.com', '', '', ''),
(6, 'Evane', '232323', 'evane@mail.com', '031023111010', '0186453287', 'Female'),
(7, 'Pik Qi', '654321', 'pik@gmail.com', '110101010101', '0123459876', 'Female'),
(8, 'Pik Qi', '654321', 'mahpikqi@gmail.com', '011231101011', '0123456789', 'Female');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`pat_id`) REFERENCES `patient` (`pat_id`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`doc_id`) REFERENCES `doctorlist` (`doc_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `pat_id` FOREIGN KEY (`pat_id`) REFERENCES `patient` (`pat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
