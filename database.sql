-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2020 at 11:57 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `c_address` varchar(60) NOT NULL,
  `c_email` varchar(40) NOT NULL,
  `c_pwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `fname`, `lname`, `c_address`, `c_email`, `c_pwd`) VALUES
(1, 'Ronak', 'Rathod', 'Bengaluru', 'ronak.rathod1998@gmail.com', 'storepet1998'),
(2, 'Ullas', 'Sam', 'Rao nivas', 'ullassam@gmail.com', 'ullasam69'),
(5, 'jerrin', 'paul', '#24 monashree layout Bangalore', 'jerrinpaul@gmail.com', '1234567');

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

CREATE TABLE `order_info` (
  `o_id` int(11) NOT NULL,
  `o_name` varchar(20) NOT NULL,
  `o_amount` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `c_address` varchar(50) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(20) NOT NULL,
  `p_type` varchar(20) NOT NULL,
  `p_amount` int(11) NOT NULL,
  `p_dob` date NOT NULL,
  `image` varchar(300) NOT NULL,
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`p_id`, `p_name`, `p_type`, `p_amount`, `p_dob`, `image`, `s_id`) VALUES
(12, 'blacky', 'Dog', 9000, '2020-08-31', 'image/dog.jpg', 203),
(301, 'Rocky', 'Dog', 9000, '2020-10-09', 'image/lab.jpg', 203),
(302, 'Kitty', 'Cat', 6000, '2022-07-22', 'image/8625-beautiful-doll-face-persian-cat,-fluffy-black...-wallpaper-free-photo.jpg', 203),
(303, 'lovebird', 'Bird', 2000, '2020-11-22', 'image/birds-lovebirds-animals-wallpaper-preview.jpg', 202),
(304, 'Buddy', 'Dog', 15000, '2020-10-23', 'image/be54916241bf62ddb2c049026b75fd7d.png', 202),
(305, 'Max', 'Dog', 14000, '2020-12-09', 'image/max.jpg', 203),
(306, 'Rama', 'Bird', 2500, '2020-11-20', 'image/947841.jpg', 201),
(307, 'Goldy', 'Fish', 1500, '2018-07-22', 'image/download.jpg', 202),
(776, 'tin', 'Bird', 8000, '2020-06-17', 'image/DSC_0168.JPG', 777);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(20) NOT NULL,
  `s_address` varchar(60) NOT NULL,
  `s_phone` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`s_id`, `s_name`, `s_address`, `s_phone`) VALUES
(123, 'satish', 'Bangalore', 7259123125),
(201, 'amazon', 'Mumbai', 9594612354),
(202, 'Thakur & sons', 'New Delhi', 2147483647),
(203, 'SVK & Co.', 'Mysuru', 2147483647),
(777, 'dhyan', 'Bangalore', 1234567890);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1235, 'jinu', '$2y$10$Q/XmzvYQOiW3TStoVCiFme68cdkdnbFTbYeiZIYcyeru6uHxgW33.', '2020-12-16 12:37:05'),
(1236, 'Jerrinpaul', '$2y$10$gmDg.NI45DtzLy/n7U3OKusLe01y16a8A.VbQ1Ywt8QsQOciQbU4.', '2020-12-16 12:41:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `order_info`
--
ALTER TABLE `order_info`
  ADD PRIMARY KEY (`o_id`,`c_id`,`p_id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`p_id`,`s_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_info`
--
ALTER TABLE `order_info`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1237;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_info`
--
ALTER TABLE `order_info`
  ADD CONSTRAINT `order_info_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `pet` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_info_ibfk_3` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `pet_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `supplier` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
