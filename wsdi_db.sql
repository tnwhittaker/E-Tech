-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2022 at 05:26 AM
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
-- Database: `wsdi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `image_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `product_id`, `image_name`) VALUES
(1, 1, 'geometry_cyberspace.jpg'),
(2, 2, 'geometry_cyberspace.jpg'),
(3, 3, 'geometry_cyberspace.jpg'),
(4, 4, 'geometry_cyberspace.jpg'),
(6, 2, '4.jpg'),
(7, 3, '6.jpg'),
(8, 3, '5.jpg'),
(9, 3, '4.jpg'),
(10, 3, '3.jpg'),
(11, 2, '5.jpg'),
(12, 2, '3.jpg'),
(13, 2, '3.jpg'),
(14, 2, '4.jpg'),
(15, 2, '6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `product_id`, `customer_name`, `amount`, `total`) VALUES
(2, 3, '1', 2, '200.00'),
(3, 1, 'Torrike Whittaker', 1, '75000.00'),
(4, 1, 'Anthony Smith', 1, '75000.00'),
(5, 1, 'Kevin James', 1, '75000.00'),
(6, 2, 'ddd', 1, '180000.00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_code` varchar(20) NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `product_description` text NOT NULL,
  `vendor_id` int(100) NOT NULL,
  `vendor` varchar(100) NOT NULL,
  `cost_price` decimal(10,2) NOT NULL,
  `sales_price` decimal(10,2) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_code`, `product_type`, `product_description`, `vendor_id`, `vendor`, `cost_price`, `sales_price`, `quantity`) VALUES
(1, 'Samsung Galaxy S10', 'SG10', 'Wireless Charger', 'New condition garbage!1111', 11, 'Sir sir', '80000.00', '75000.00', 1),
(2, 'Samsung Galaxy S22', 'SG22', 'Smart Watch', 'Mint Conditionja', 20, 'Test Test', '200000.00', '180000.00', 4),
(3, 'Samsung Galaxy S15', 'SG10', 'Smartphone', 'New condition garbage', 20, 'Test Test', '80000.00', '75000.00', 3),
(4, 'Samsung Galaxy S28', 'SG22', 'Smartphone', 'Mint Condition', 11, 'Test Sir', '200000.00', '180000.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `dob`, `email`, `password`, `type`) VALUES
(11, 'Admin', '', '0000-00-00', 'admin@etech.com', '$2y$10$zVRUZCcdzIEYlJ7/QwOEC.sE83NSkHjbre2grVsyJV3uUdeDg2HPS', 'admin'),
(20, 'Test', 'Test', '2004-12-16', 'test@test.com', '$2y$10$wxNtWtv4yFSUr3Mo7b.p/.hCY2lenAj7PAj0DTMbE.pLz2xeS25lC', 'vendor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product` (`product_id`),
  ADD KEY `user` (`customer_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `vendor` (`vendor_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `vendor` FOREIGN KEY (`vendor_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
