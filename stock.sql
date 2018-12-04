-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2018 at 03:55 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

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
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(50) NOT NULL,
  `created_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `season` varchar(50) NOT NULL,
  `product` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `qty` int(50) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `product_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `created_date`, `season`, `product`, `color`, `status`, `qty`, `created_by`, `product_code`) VALUES
(1, '0000-00-00 00:00:00.000000', '1', 'a', 'John', 'Doe', 3, 'riza', 'asdf'),
(2, '0000-00-00 00:00:00.000000', '1', 'a', 'John', 'Doe', 3, 'riza', 'asdf'),
(3, '0000-00-00 00:00:00.000000', '1', 'a', 'John', 'Doe', 3, 'riza', 'asdf'),
(4, '0000-00-00 00:00:00.000000', '1', 'a', 'John', 'Doe', 3, 'riza', 'asdf'),
(5, '0000-00-00 00:00:00.000000', '1', 'a', 'John', 'Doe', 3, 'riza', 'asdf'),
(6, '0000-00-00 00:00:00.000000', '1', 'a', 'John', 'Doe', 3, 'riza', 'asdf'),
(7, '0000-00-00 00:00:00.000000', 'asdjkl', 'asnmdb', 'asmdnb', 'ashdj', 3, 'riza', 'asd'),
(8, '0000-00-00 00:00:00.000000', 'asdjkl', 'asnmdb', 'asmdnb', 'ashdj', 3, 'riza', 'asd'),
(9, '0000-00-00 00:00:00.000000', 'asdjkl', 'asnmdb', 'asmdnb', 'ashdj', 3, 'riza', 'asd'),
(10, '0000-00-00 00:00:00.000000', 'asdjkl', 'asnmdb', 'asmdnb', 'ashdj', 3, 'riza', 'asd'),
(11, '0000-00-00 00:00:00.000000', 'asdjkl', 'asnmdb', 'asmdnb', 'ashdj', 3, 'riza', 'asd'),
(12, '0000-00-00 00:00:00.000000', 'asdjkl', 'asnmdb', 'asmdnb', 'ashdj', 3, 'riza', 'asd'),
(13, '0000-00-00 00:00:00.000000', 'asdjkl', 'asnmdb', 'asmdnb', 'ashdj', 3, 'riza', 'asd'),
(14, '0000-00-00 00:00:00.000000', 'asdjkl', 'asnmdb', 'asmdnb', 'ashdj', 3, 'riza', 'asd'),
(15, '0000-00-00 00:00:00.000000', 'asdjkl', 'asnmdb', 'asmdnb', 'ashdj', 3, 'riza', 'asd'),
(16, '0000-00-00 00:00:00.000000', 'asdjkl', 'asnmdb', 'asmdnb', 'ashdj', 3, 'riza', 'asd'),
(17, '0000-00-00 00:00:00.000000', 'asdjkl', 'asnmdb', 'asmdnb', 'ashdj', 3, 'riza', 'asd'),
(18, '0000-00-00 00:00:00.000000', 'asdasdjlskajd', 'asldkajsd', 'asdasd', 'hasdjk', 4, 'riza', 'asdhj'),
(19, '0000-00-00 00:00:00.000000', 'asdljaskd', 'asdjlkasjd', 'asdlkasd', 'asdjisaod', 123, 'riza', 'askdljas'),
(20, '0000-00-00 00:00:00.000000', 'asdljaskd', 'asdjlkasjd', 'asdlkasd', 'asdjisaod', 123, 'riza', 'askdljas'),
(21, '0000-00-00 00:00:00.000000', 'askldjsalkd', 'asdasdk', 'asdasljdk', 'a,smdnasd,', 123, 'riza', 'asjkdhsajd'),
(22, '0000-00-00 00:00:00.000000', '', '', '', '', 0, 'riza', ''),
(23, '0000-00-00 00:00:00.000000', '', '', '', '', 0, 'riza', ''),
(24, '0000-00-00 00:00:00.000000', '', '', '', '', 0, 'riza', ''),
(25, '0000-00-00 00:00:00.000000', 'askdhasdj', 'askjdhaskd', 'askjdhasdjh', 'akjsdhaskj', 0, 'riza', 'askjdasdj'),
(26, '0000-00-00 00:00:00.000000', '', '', '', '', 0, 'riza', ''),
(27, '0000-00-00 00:00:00.000000', 'asdasdlk', 'asjdkljsadlk', 'asldsajdlk', 'asdlkjasld', 0, 'riza', 'asljdaslkj'),
(28, '0000-00-00 00:00:00.000000', 'lklsa,mdnsamd', 'asm,ndm,ns,ad', ',sand,sad', 'as,mndnas,', 0, 'riza', 'sn,an,dmas'),
(29, '0000-00-00 00:00:00.000000', '', '', '', '', 0, 'riza', ''),
(30, '0000-00-00 00:00:00.000000', '', '', '', '', 0, 'riza', ''),
(31, '0000-00-00 00:00:00.000000', '', '', '', '', 0, 'riza', ''),
(32, '0000-00-00 00:00:00.000000', 'askdlasld', 'askldsjkdl', 'ajskljlkdsa', 'sakjld', 123123213, 'riza', 'sak;ldks'),
(33, '0000-00-00 00:00:00.000000', 'sajdlksda', 'aklsjdjldska', 'askdasdl', 'asldslakd', 0, 'riza', 'aslkdjl'),
(34, '0000-00-00 00:00:00.000000', 'test ', 'dong', 'ahasd', 'asdjn', 123, 'riza', 'asldkj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
