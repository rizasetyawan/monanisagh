-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2018 at 08:54 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monanisa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `nama` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `password`) VALUES
(1, 'riza', 'adminriza'),
(2, 'andi', 'adminandi');

-- --------------------------------------------------------

--
-- Table structure for table `new_stock`
--

CREATE TABLE `new_stock` (
  `id` int(50) NOT NULL,
  `created_date` datetime(6) NOT NULL,
  `season` varchar(50) NOT NULL,
  `product` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `qty` int(50) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `product_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_stock`
--

INSERT INTO `new_stock` (`id`, `created_date`, `season`, `product`, `color`, `status`, `qty`, `created_by`, `product_code`) VALUES
(7, '2018-12-09 10:12:15.000000', '1', 'katun', 'navy', 'New Stock', 5, 'riza', '1-ka-navy'),
(8, '2018-12-09 10:12:27.000000', '1', 'katun', 'coklat', 'New Stock', 5, 'riza', '1-ka-coklat'),
(9, '2018-12-09 10:12:38.000000', '1', 'katun', 'abu', 'New Stock', 5, 'riza', '1-ka-abu'),
(10, '2018-12-09 10:12:48.000000', '1', 'katun', 'cream', 'New Stock', 5, 'riza', '1-ka-cream'),
(11, '2018-12-09 10:12:57.000000', '1', 'katun', 'pink', 'New Stock', 5, 'riza', '1-ka-pink'),
(12, '2018-12-09 10:13:33.000000', '1', 'voal', 'abu', 'New Stock', 4, 'riza', '1-vo-abu'),
(13, '2018-12-09 10:13:43.000000', '1', 'voal', 'coklat', 'New Stock', 4, 'riza', '1-vo-coklat'),
(14, '2018-12-09 10:13:50.000000', '1', 'voal', 'cream', 'New Stock', 4, 'riza', '1-vo-cream'),
(15, '2018-12-09 10:14:04.000000', '1', 'voal', 'navy', 'New Stock', 4, 'riza', '1-vo-navy'),
(16, '2018-12-09 10:14:17.000000', '1', 'voal', 'pink', 'New Stock', 4, 'riza', '1-vo-pink'),
(17, '2018-12-09 10:14:47.000000', '2', 'sifon', 'kuning', 'New Stock', 5, 'riza', '2-si-kuning'),
(18, '2018-12-09 10:15:01.000000', '2', 'katun', 'navy', 'New Stock', 5, 'riza', '2-ka-navy');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(50) NOT NULL,
  `created_date` datetime(6) NOT NULL,
  `season` varchar(50) NOT NULL,
  `product` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `qty` int(50) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `product_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `new_stock`
--
ALTER TABLE `new_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `new_stock`
--
ALTER TABLE `new_stock`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
