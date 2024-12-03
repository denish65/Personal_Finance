-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 03, 2024 at 08:51 AM
-- Server version: 8.0.40-0ubuntu0.22.04.1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `personal_finance`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `payment_type` enum('cash','credit','debit','online') COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expense_note` text COLLATE utf8mb4_unicode_ci,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_for` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `first_name`, `last_name`, `serial_number`, `date`, `payment_type`, `reference_image`, `expense_note`, `location`, `item_name`, `payment_for`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 'sxvddxzv', 'dzxvdzxv', NULL, '2024-11-18', 'cash', 'images/expenses/expense_1732438514.jpeg', 'zdvd', 'vdvd', 'dzvd', 'vdsv', '1', '2024-11-24 03:25:14', '2024-11-24 03:25:14'),
(5, 'sZCdzx', 'v sdzxv', NULL, '2024-11-13', 'cash', 'images/expenses/expense_1732440393.jpg', 'sxvc dz', 'xvc dzx', 'zxv', 'zxv dz', 'dzvbd fxc', '2024-11-24 03:56:33', '2024-11-24 03:56:33'),
(7, 'bbbbbbb', 'eeeeee', NULL, '2024-12-22', 'online', 'images/expenses/expense_1733108918.jpg', 'ffffff', 'gggggg', 'hhhhh', 'jjjjjj', 'jjkkkkk', '2024-12-01 21:38:38', '2024-12-01 21:43:47'),
(8, 'esdfceasad', 'fcfedscedsc', NULL, '2024-12-19', 'cash', 'images/expenses/expense_1733108937.jpg', 'esdces', 'dcedfcf', 'esacsdzfc', 'dc dszc', 'adsxzvc', '2024-12-01 21:38:57', '2024-12-01 21:38:57'),
(9, 'edvacdv', 'dszv ds', NULL, '2024-12-11', 'cash', 'images/expenses/expense_1733108957.jpg', 'dvsdvc', 'sdvsdz', 'vcdcsv', 'cesdcfs', 'eadsvc', '2024-12-01 21:39:17', '2024-12-01 21:39:17'),
(10, 'asC', 'scs', NULL, '2024-12-11', 'cash', 'images/expenses/expense_1733195425.jpg', 'scsc', 'sacascx', 'scsx', 'sc dxcxc', 'zc dxc', '2024-12-02 21:40:25', '2024-12-02 21:40:25'),
(11, 'FDFDF', 'dsacxdxc', NULL, '2024-12-04', 'cash', 'images/expenses/expense_1733195454.jpg', 'adcxz', 'cdxcd', 'cdxc', 'xcxcdxdc', 'xzc zdxc', '2024-12-02 21:40:54', '2024-12-02 21:40:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
