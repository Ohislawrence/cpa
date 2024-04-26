-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 09, 2024 at 08:02 AM
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
-- Table structure for table `categories`
--


--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'App', 'app', NULL, NULL),
(2, 'Cams', 'cams', NULL, NULL),
(3, 'Crypto', 'crypto', NULL, NULL),
(4, 'Dating', 'dating', NULL, NULL),
(5, 'Download', 'download', NULL, NULL),
(6, 'eCommerce', 'ecommerce', NULL, NULL),
(7, 'Education', 'education', NULL, NULL),
(8, 'Finance', 'finance', NULL, NULL),
(9, 'Gambling', 'gambling', NULL, NULL),
(10, 'Gaming', 'gaming', NULL, NULL),
(11, 'Health', 'health', NULL, NULL),
(12, 'Onlyfans', 'onlyfans', NULL, NULL),
(13, 'Travels', 'travels', NULL, NULL),
(14, 'Others', 'others', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
