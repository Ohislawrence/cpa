-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 09, 2024 at 07:41 AM
-- Server version: 8.0.29
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `code`
--

-- --------------------------------------------------------

--
-- Table structure for table `targets`
--
--
-- Dumping data for table `targets`
--

INSERT INTO `targets` (`id`, `offer_id`, `target`, `payout`, `created_at`, `updated_at`, `url`) VALUES
(1, 2, 'Windows', '0.88', NULL, NULL, 'https://microsoft.com'),
(2, 3, 'Windows', '1.88', NULL, NULL, 'https://microsoft.com'),
(3, 3, 'iOS', '2.66', NULL, NULL, 'https://apple.com'),
(4, 3, 'Android', '2.66', NULL, NULL, 'https://google.com'),
(5, 4, 'Windows', '3', NULL, NULL, 'https://microsoft.com'),
(6, 4, 'iOS', '2', NULL, NULL, 'https://apple.com'),
(7, 4, 'Android', '2', NULL, NULL, 'https://google.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `targets`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
