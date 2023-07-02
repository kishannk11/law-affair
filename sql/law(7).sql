-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 02, 2023 at 07:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `law`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `role`, `name`, `email`, `phone`, `file`) VALUES
(1, 'admin', '$2y$10$NwMAIxEKAcKrl1/Z4FytcujdRjEU1niyI6VwG/HGJVLIAlPd4H8SC', 'admin', 'Pratyush', 'ranjith@mail.com', '1234567890', 'advocates-photo(1).jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `advocates`
--

CREATE TABLE `advocates` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `joining_date` date NOT NULL,
  `photo` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `specializations` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pincode` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `advocates`
--

INSERT INTO `advocates` (`id`, `name`, `mobile_number`, `joining_date`, `photo`, `address`, `specializations`, `username`, `password`, `role`, `city`, `state`, `pincode`, `country`) VALUES
(28, 'Pratyush u', '9876543210', '2023-06-30', 'uploads/advocates-photo(2).jpeg', 'Banglore', '[\"Tax Lawyer\"]', 'ADVCT4123', '$2y$10$5STG00pKG4wOYwHJQnwbBOjm67WAytpMPetACgMWrdodUX78mtNta', 'client', 'Banglore update', 'Karnataka update', '576445 1212', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `id` int(11) NOT NULL,
  `case_number` varchar(50) NOT NULL,
  `filing_number` varchar(50) NOT NULL,
  `fillingDate` date NOT NULL,
  `client` varchar(100) NOT NULL,
  `party_name` varchar(100) NOT NULL,
  `case_status` varchar(50) NOT NULL,
  `advocate` varchar(100) NOT NULL,
  `case_next_date` date NOT NULL,
  `special_note` text DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`id`, `case_number`, `filing_number`, `fillingDate`, `client`, `party_name`, `case_status`, `advocate`, `case_next_date`, `special_note`, `status`) VALUES
(45, 'CASE4911', '1234', '2023-07-02', 'CLNT4057', 'Aamir update', 'Status 1', 'ADVCT4123', '2023-07-03', 'Note - admin', 'open'),
(46, 'CASE4911', '1234', '2023-07-02', 'CLNT4057', 'Aamir ', 'Status 1', 'ADVCT4123', '2023-07-03', 'Note - admin', 'open'),
(47, 'CASE2806', '45678', '2023-07-02', 'CLNT4057', 'Aamir', 'Status 1', 'ADVCT4123', '2023-07-05', 'note - admin', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `photo_name` varchar(100) DEFAULT NULL,
  `address` varchar(200) NOT NULL,
  `document_name` varchar(100) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pincode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `mobile_number`, `photo_name`, `address`, `document_name`, `username`, `created_at`, `updated_at`, `city`, `state`, `pincode`) VALUES
(7, 'Ranjith Update', '9876543210', 'uploads/advocates-photo.jpeg', 'Banglore', 'uploads/advocates-photo(1).pdf', 'CLNT4057', '2023-06-30 07:02:34', '2023-06-30 07:22:48', 'Banglore', 'Karnataka', '574220');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `case_number` varchar(255) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `received_amount` decimal(10,2) DEFAULT NULL,
  `pending_amount` decimal(10,2) DEFAULT NULL,
  `payment` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `case_number`, `total_amount`, `received_amount`, `pending_amount`, `payment`, `transaction_id`, `created_at`) VALUES
(1, 'CASE4911', 5000.00, 2000.00, 3000.00, 'cash', '', '2023-07-02 14:49:02'),
(2, 'CASE4911', 3000.00, 1000.00, 2000.00, 'cash', '', '2023-07-02 14:49:02'),
(3, 'CASE2806', 10000.00, 5000.00, 5000.00, 'cash', '', '2023-07-02 16:09:58'),
(7, 'CASE4911', 5000.00, 2000.00, 3000.00, 'cash', '', '2023-07-02 17:27:20'),
(8, 'CASE4911', 5000.00, 2000.00, 3000.00, 'upi', '4dvee67eeghegee', '2023-07-02 17:27:49'),
(9, 'CASE4911', 5000.00, 1000.00, 4000.00, 'cash', '', '2023-07-02 17:35:25');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `user_id` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advocates`
--
ALTER TABLE `advocates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `advocates`
--
ALTER TABLE `advocates`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;