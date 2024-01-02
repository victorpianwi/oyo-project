-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2021 at 06:06 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oyo_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `okada_data`
--

CREATE TABLE `okada_data` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `nin` int(11) NOT NULL,
  `plate` varchar(9) NOT NULL,
  `address` varchar(255) NOT NULL,
  `local` varchar(255) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `okada_data`
--

INSERT INTO `okada_data` (`id`, `firstname`, `lastname`, `email`, `password`, `gender`, `nin`, `plate`, `address`, `local`, `phone`, `status`) VALUES
(1, 'Best', 'Afokwalam', 'bestfx@gmail.com', '$2y$10$ZAqxOBvup1FeTt8XX1sDb.yb39h9vTUaz2MWGKH23TsikCXgPp9NW', 'Male', 213445676, 'PLA456TE', 'Eliozu Flyover', 'Ibarapa North', 2348128929129, 'Not Paid'),
(2, 'Victor', 'Pianwi', 'victorpianwi@gmail.com', '$2y$10$s4KhTSjvpIYl7XX.oXcoL.6sNaZwjEcig40HXzCRtcbDKltd3GWpu', 'Male', 213445676, 'PLA345TE', 'No. 4 Echendu Layout, Port Harcourt', 'Ibarapa North', 2348128929129, 'Paid'),
(5, 'Godson', 'Tuadum', 'godsontuadumtom@gmail.com', '$2y$10$Zv4Id.XRe0vmwDkh9BxrDuYaFnTZUd.YFDfjUgXzrhf1WgybGNotS', 'Male', 2147483647, 'ABC345DE', 'No. 5 Echendu Layout, Port Harcourt', 'Ibadan North West', 2348128929129, 'Not Paid'),
(6, 'Peter', 'Samuel', 'samuelpeter@gmail.com', '$2y$10$jJCghL4FSFBIBwmXzSE6cOYdeXmJqI8OVlvaWuJxa5l8erRzYcgCK', 'Female', 2147483647, 'PLA678TE', 'NO. 7 Thank you', 'Ibadan South West', 23483728374, 'Not Fixed'),
(7, 'Samuel', 'Peter', 'samuelpeter205@gmail.com', '$2y$10$SvxskEPIoFy1t1cUPUVOu.Q1n82N02zy59IiWDYsTAaTIlIfvzIjO', 'Male', 2147483647, 'ABC789DE', 'Eke Street, Rumuola, Port Harcourt', 'Kajola', 2348128929129, 'Not Fixed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `okada_data`
--
ALTER TABLE `okada_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `okada_data`
--
ALTER TABLE `okada_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
