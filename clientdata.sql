-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4308
-- Generation Time: Dec 16, 2022 at 02:04 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clientdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `email` varchar(46) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `password` varchar(100) NOT NULL,
  `img` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `fname`, `lname`, `email`, `phone`, `password`, `img`) VALUES
(5, 'Kartik', 'Bandewar', 'kartik121@gmail.com', '9843778687', 'karti56', 'upload/GitHub (1).png'),
(6, 'Anuj', 'Pandhre', 'anu89@gmail.com', '9856743219', 'anu61', 'upload/WhatsApp Image 2022-11-21 at 1.21.18 PM.jpeg'),
(7, 'Ankit', 'Borkar', 'ankitborkar335@gmail.com', '958869410', 'ankit456#', 'upload/print.png'),
(8, 'Ankit', 'Borkar', 'ankitborkar335@gmail.com', '958869410', 'ankit456', 'upload/logo.png'),
(9, 'Harshal', 'Mandale', 'harshal21@gmail.com', '9856432189', 'harshal67#', 'upload/harshalp.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
