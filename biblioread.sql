-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 02, 2023 at 03:43 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioread`
--
CREATE DATABASE IF NOT EXISTS `biblioread` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `biblioread`;

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

DROP TABLE IF EXISTS `adminlogin`;
CREATE TABLE IF NOT EXISTS `adminlogin` (
  `adminname` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phonenumber` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `publication_name` varchar(100) NOT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `publication_name`, `genre`, `image_path`, `price`) VALUES
(17, 'Jaba', 'dfd', '', 'Fiction', 'uploads/product-item8.jpg', 50.00),
(18, 'faafa', 'vfda', 'Wolf Publications', 'Science Fiction', 'uploads/team-member7.jpg', 80.00);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('Rayan', 'rayan123'),
('Rayan', 'rayan123'),
('Rayan', 'rayan123'),
('rayan', 'rayan123'),
('Rayan', '$2y$10$Z5GAcVxns4NOy'),
('Rayan', '$2y$10$gwS319b6Mk6md'),
('Rayan', 'rayan123');

-- --------------------------------------------------------

--
-- Table structure for table `publogin`
--

DROP TABLE IF EXISTS `publogin`;
CREATE TABLE IF NOT EXISTS `publogin` (
  `pubname` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `publogin`
--

INSERT INTO `publogin` (`pubname`, `password`) VALUES
('Vishnu', 'vishnu12'),
('Vishnu', 'vishnu12'),
('Vishnu', 'vishnu12'),
('Vishnu', 'vishnu12'),
('Vishnu', 'vishnu12'),
('Vishnu', 'vishnu12'),
('Vishnu', 'vishnu12'),
('Vishnu', 'vishnu12'),
('Vishnu', 'vishnu12'),
('Vishnu', 'vishnu12'),
('Vishnu', 'vishnu12'),
('Vishnu', 'vishnu12'),
('Vishnu', 'vishnu12'),
('Vishnu', 'vishnu12'),
('Vishnu', 'vishnu12'),
('Vishnu', 'vishnu12'),
('Vishnu', 'vishnu12'),
('Vishnu', 'vishnu12'),
('Vishnu', 'vishnu12'),
('Vishnu', 'vishnu12'),
('Vishnu', 'vishnu12'),
('Vishnu', 'vishnu12'),
('Vishnu', 'vishnu12'),
('Vishnu', 'vishnu12'),
('Vishnu', 'vishnu12'),
('Vishnu', 'Vishnu12'),
('Vishnu', 'vishnu12'),
('Vishnu', 'vishnu12'),
('Vishnu', 'vishnu12'),
('Vishnu', 'vishnu12'),
('Abhishek B Kumar', 'Abhishek123'),
('Abhishek B Kumar', 'Abhishek123'),
('Vishnu', 'vishnu12'),
('Vishnu', 'vishnu12');

-- --------------------------------------------------------

--
-- Table structure for table `pub_signup`
--

DROP TABLE IF EXISTS `pub_signup`;
CREATE TABLE IF NOT EXISTS `pub_signup` (
  `id` int NOT NULL AUTO_INCREMENT,
  `publishername` varchar(50) NOT NULL,
  `publicationname` char(50) NOT NULL,
  `publicationadrs` varchar(50) NOT NULL,
  `phonenumber` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `doo` date NOT NULL,
  `document` blob NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pub_signup`
--

INSERT INTO `pub_signup` (`id`, `publishername`, `publicationname`, `publicationadrs`, `phonenumber`, `email`, `doo`, `document`, `password`) VALUES
(1, 'Vishnu', 'VV Books', 'Adoor', '7736721396', 'abhishekbkumar321@gmail.com', '2023-09-20', '', 'vishnu12'),
(2, 'Abhishek B Kumar', 'Wolf Publications', 'Cheruva Thekke,Kodumon P O,Pathanamthitta,Pin-6915', '9746605072', 'lonewolfgaming185@gmail.com', '2023-10-01', '', 'Abhishek123');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

DROP TABLE IF EXISTS `signup`;
CREATE TABLE IF NOT EXISTS `signup` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confrimpass` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phonenumber` int NOT NULL,
  `country` char(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`name`, `email`, `password`, `confrimpass`, `address`, `phonenumber`, `country`) VALUES
('Rayan', 'rayanpub@gmail.com', 'rayan123', '', 'Thengamam', 2147483647, 'INDIA');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
