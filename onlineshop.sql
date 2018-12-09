-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2016 at 06:05 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

CREATE TABLE `adminuser` (
  `username` varchar(50) NOT NULL,
  `password` varchar(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`username`, `password`) VALUES
('ryan', 'esper'),
('esper', 'ryan'),
('aaaa', 'aaaa'),
('', ''),
('ryan', 'esper');

-- --------------------------------------------------------

--
-- Table structure for table `customerusers`
--

CREATE TABLE `customerusers` (
  `id` int(50) NOT NULL,
  `email` varchar(21) NOT NULL,
  `username` varchar(21) NOT NULL,
  `password` varchar(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerusers`
--

INSERT INTO `customerusers` (`id`, `email`, `username`, `password`) VALUES
(1, 'ryanesper@yahoo.com', 'nayrz', 'nayrz');

-- --------------------------------------------------------

--
-- Table structure for table `myorder`
--

CREATE TABLE `myorder` (
  `myorder` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(40) NOT NULL,
  `image` varchar(50) NOT NULL,
  `prod_name` varchar(51) NOT NULL,
  `prod_description` varchar(500) NOT NULL,
  `prod_price` decimal(50,2) NOT NULL,
  `prod_category` varchar(50) NOT NULL,
  `prod_quantity` int(50) NOT NULL,
  `prod_manufacturer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `image`, `prod_name`, `prod_description`, `prod_price`, `prod_category`, `prod_quantity`, `prod_manufacturer`) VALUES
(1, 'Penguins.jpg', 'Tatlong bebe', 'siya ang bebe na may sabi ng kwak kwak', '3333.33', 'Red Wine', 3, 'Kwak kwak Company'),
(2, 'Koala.jpg', 'Koala', 'Oink oink', '24252.52', 'White Wine', 5, 'Oink Company'),
(3, 'Jellyfish.jpg', 'Jellyfish', 'shhhhh shhhhh shhhhh shhhhh shhhhh shhhhh shhhhh shhhhh shhhhh shhhhh shhhhh shhhhh shhhhh ', '8888.88', 'White Wine', 1, 'Jelly Company');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customerusers`
--
ALTER TABLE `customerusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customerusers`
--
ALTER TABLE `customerusers`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
