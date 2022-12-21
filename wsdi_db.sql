-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2022 at 02:51 AM
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
(16, 11, '6.jpg'),
(17, 11, '5.jpg'),
(18, 11, '4.jpg'),
(19, 12, '6.jpg'),
(20, 12, '5.jpg'),
(21, 12, '4.jpg'),
(22, 19, '5.jpg'),
(23, 12, '5.jpg'),
(24, 13, '5.jpg'),
(25, 14, '6.jpg'),
(26, 14, '6.jpg'),
(27, 15, '5.jpg'),
(28, 15, '6.jpg'),
(29, 16, '6.jpg'),
(30, 12, '6.jpg'),
(31, 12, '5.jpg'),
(32, 12, '4.jpg');

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
(8, 12, 'Kevin', 6, '100.00'),
(9, 12, 'jndff', 20, '100.00'),
(10, 12, 'jndff', 20, '100.00'),
(11, 12, 'jndff', 20, '100.00'),
(12, 12, 'iejrgiejg', 7, '700.00'),
(13, 12, 'sjnfjnfr', 3, '300.00'),
(14, 12, 'iejrgiejg', 7, '700.00'),
(15, 12, 'sjnfjnfr', 3, '300.00'),
(16, 12, 'iejrgiejg', 7, '700.00'),
(17, 12, 'Kevin James', 12, '1200.00'),
(18, 20, 'djgndg', 1, '20000.00'),
(19, 12, 'Kevin Jones', 10, '1000.00');

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
(12, 'Alcatel', 'ALC23', 'Wireless Mouse', 'JNSDJNJSDKNJSNDJFNKFV', 21, 'Test Test', '100.00', '100.00', 454),
(13, 'Alcatel', 'ALC23', 'Wireless Mouse', 'JNSDJNJSDKNJSNDJFNKFV', 21, 'Test Test', '100.00', '100.00', 464),
(14, 'Alcatel', 'ALC23', 'Wireless Mouse', 'JNSDJNJSDKNJSNDJFNKFV', 21, 'Test Test', '100.00', '100.00', 464),
(15, 'Alcatel', 'ALC23', 'Wireless Mouse', 'JNSDJNJSDKNJSNDJFNKFV', 21, 'Test Test', '100.00', '100.00', 464),
(16, 'Alcatel', 'ALC23', 'Wireless Mouse', 'JNSDJNJSDKNJSNDJFNKFV', 21, 'Test Test', '100.00', '100.00', 464),
(17, 'Alcatel', 'ALC23', 'Wireless Mouse', 'JNSDJNJSDKNJSNDJFNKFV', 21, 'Test Test', '100.00', '100.00', 464),
(20, 'FlashLight', 'FLASH', 'Webcam', 'This is a webcam that is of the highest quality', 24, 'Kevin James', '10000.00', '20000.00', 499);

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
(21, 'Test', 'Test', '2004-12-14', 'test@test.com', '$2y$10$jQyZUfIUtklPVcEEKA/Zku75qir8DmjvJrdCHzyWC.2AA1uepO7Su', 'vendor'),
(22, 'Alan', 'Turing', '2004-12-14', 'aturing@gmail.com', '$2y$10$IEXDdjYl1GXbjBS/6Wr/COCxucNR5pvev9qbwq279k0BMkup9efz2', 'vendor'),
(24, 'Kevin', 'James', '2004-12-15', 'kjames@gmail.com', '$2y$10$KKioo.YxVFFzpE1I0STT.u8gGDBToRsn8SvAAhAu4hUKXEjoWH0mW', 'vendor'),
(26, 'Alvin', 'Patrick', '2004-12-14', 'alpatrick@gmail.com', '$2y$10$Oetocv2/AAPssO04tqwm6eI7jY5Yr8T1mQ24mnlQPg.2ZvRG6umaa', 'vendor'),
(27, 'Winston', 'Richards', '2004-11-30', 'winrich@gmail.com', '$2y$10$Iy.K3Vt/Xiw922RgzCdtnO6wVO8sOdWy0AGvBp.0sO5cO9/ZbiBBK', 'vendor');

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
