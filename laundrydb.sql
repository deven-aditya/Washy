-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 13, 2025 at 03:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundrydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `house_address` varchar(255) DEFAULT NULL,
  `email_address` varchar(150) DEFAULT NULL,
  `phone_number` varchar(30) DEFAULT NULL,
  `transaction_total` double DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `first_name`, `last_name`, `house_address`, `email_address`, `phone_number`, `transaction_total`) VALUES
(1, 'Deven', 'Aditya', 'Jl. Melati Utara No.9 Gergunung, Boyolali Utara, Jawa Tengah', '	deven@gmail.com', '08123456789', 0),
(5, 'Ferrincia', 'Avril', '123', '123@gmail.com', '12345678', 0),
(6, 'Charlisya', 'Greely', '33', '33', '33', 0),
(10, 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 0),
(11, 'sdfdsd', 'sdfsdf', 'sdfdsf', '123@gmail.com', '12345678', 0),
(12, 'asdasd', 'asdasd', 'asdasd', 'asdasd@gmail.com', '1234567890', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_data`
--

CREATE TABLE `transaction_data` (
  `id_transaction` int(11) NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `service_type` varchar(100) DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction_data`
--

INSERT INTO `transaction_data` (`id_transaction`, `id_customer`, `service_type`, `weight`, `price`) VALUES
(1, 5, 'Regular', 0, 24000),
(2, 1, 'Express', 23, 276000),
(4, 5, 'Express', 1, 12000),
(6, 6, 'Regular', 12, 72000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_photo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `first_name`, `last_name`, `email_address`, `phone_number`, `username`, `password`, `profile_photo`, `created_at`) VALUES
(1, 'asdasd', 'asd', 'Devenn@gmail.com', '02341234234', 'asd', '$2y$10$MGz7DOMqKqtf9CH9hHaLXuMSZNcftKMwe8vJ9LkKX2aLRd0FCvh7a', 'default.png', '2025-12-03 18:44:01'),
(10, 'dfsdfsdf', 'asdasd', 'Devenasdasdn@gmail.com', '12345678', 'asdasdasd', '$2y$10$qb2D/3nnpFAp18a3IN4xqO2huu5XxvbYsgFF1m7OJoUU8bi6vdIYm', 'default.png', '2025-12-04 17:31:46'),
(11, 'adsdasd', 'asdasd', 'Dsss@gmail.com', '12345678', 'qwer', '$2y$10$7ao7GDkrucZR92aUDIIFFOV5ym87/jsGVYTW9DGtxVxTHI9tRTBea', 'default.png', '2025-12-04 17:41:58'),
(12, 'Joanna', 'Nugraha', 'a@gmail.com', '12345678', 'a', '$2y$10$hxHzXBvK5tvdyWtVfEbRwunij6n1aR8/1IGFxkV9wcYx8037Q/mYe', 'Screenshot 2025-08-03 191038.png', '2025-12-05 07:53:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `transaction_data`
--
ALTER TABLE `transaction_data`
  ADD PRIMARY KEY (`id_transaction`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email_address` (`email_address`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transaction_data`
--
ALTER TABLE `transaction_data`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction_data`
--
ALTER TABLE `transaction_data`
  ADD CONSTRAINT `transaction_data_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
