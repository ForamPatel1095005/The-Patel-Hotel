-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2023 at 05:23 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_no`
--

CREATE TABLE `book_no` (
  `bn_id` int(11) NOT NULL,
  `rb_id` int(11) NOT NULL,
  `rn_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `room_no` varchar(3) NOT NULL,
  `cin` datetime NOT NULL,
  `cout` datetime NOT NULL,
  `price` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `co_id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` varchar(150) NOT NULL,
  `reply` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_info`
--

CREATE TABLE `item_info` (
  `ii_id` int(11) NOT NULL,
  `iname` varchar(25) NOT NULL,
  `price` float NOT NULL,
  `categories` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Dumping data for table `item_info`
--

INSERT INTO `item_info` (`ii_id`, `iname`, `price`, `categories`) VALUES
(11, 'Pizza', 13.75, 'SNACKS'),
(12, 'Tomato Soup', 3.99, 'SOUP'),
(13, 'Momos', 7.85, 'SNACKS'),
(14, 'French Fries', 3.19, 'SNACKS'),
(15, 'Russian Salad', 9.99, 'SALAD'),
(16, 'Mix Vegetable', 8.49, 'SALAD'),
(17, 'Manchurian', 6.45, 'CHINESE'),
(18, 'Paneer Butter Masala', 14.99, 'PUNJABI'),
(19, 'Paneer Tikka Masala', 13.59, 'PUNJABI'),
(20, 'Paneer Tofani', 13.99, 'PUNJABI'),
(21, 'Veg. Kadhae', 13.39, 'PUNJABI'),
(22, 'Vadapau', 4.19, 'SNACKS'),
(23, 'Puff', 3.99, 'SNACKS'),
(24, 'Paper Dosa', 10.29, 'SOUTH INDIAN'),
(25, 'Masala Dosa', 12.99, 'SOUTH INDIAN'),
(26, 'Maisur Dosa', 13.49, 'SOUTH INDIAN'),
(27, 'Tandoori Roti', 9.99, 'TANDOORI'),
(28, 'Butter Roti', 8.59, 'TANDOORI'),
(29, 'Butter Naan', 9.69, 'TANDOORI'),
(30, 'Pepsi', 1.99, 'COLD DRINK'),
(31, 'Sprite', 1.99, 'COLD DRINK');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `seq_qus` varchar(30) NOT NULL,
  `seq_ans` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `password`, `seq_qus`, `seq_ans`) VALUES
(1, 'ADMIN', 'admin@gmail.com', '1234', 'What is your Dream ?', 'vvip');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `oi_id` int(11) NOT NULL,
  `bn_id` int(11) NOT NULL,
  `ii_id` varchar(250) NOT NULL,
  `qty` varchar(250) NOT NULL,
  `custom` varchar(300) NOT NULL,
  `room_no` int(11) NOT NULL,
  `odate` date NOT NULL,
  `price` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `id` int(11) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `city` varchar(20) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `seq_qus` varchar(30) NOT NULL,
  `seq_ans` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`id`, `fname`, `lname`, `city`, `mob`, `email`, `password`, `seq_qus`, `seq_ans`) VALUES
(1, 'user', 'patel', 'kalol', '9999999999', 'admin@gmail.com', '1234', 'What is your Dream ?', 'vvip');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `re_id` int(11) NOT NULL,
  `review` varchar(500) NOT NULL,
  `result` tinyint(1) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_book`
--

CREATE TABLE `room_book` (
  `rb_id` int(11) NOT NULL,
  `f_date` date NOT NULL,
  `t_date` date NOT NULL,
  `rooms` int(2) NOT NULL,
  `room_type` varchar(15) NOT NULL,
  `adult` int(2) NOT NULL,
  `child` int(2) DEFAULT NULL,
  `b_date` date NOT NULL,
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  `cmsg` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_info`
--

CREATE TABLE `room_info` (
  `ri_id` int(11) NOT NULL,
  `room_type` varchar(15) NOT NULL,
  `price` int(5) NOT NULL,
  `detail1` varchar(30) NOT NULL,
  `detail2` varchar(30) DEFAULT NULL,
  `detail3` varchar(30) DEFAULT NULL,
  `detail4` varchar(30) DEFAULT NULL,
  `image1` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Dumping data for table `room_info`
--

INSERT INTO `room_info` (`ri_id`, `room_type`, `price`, `detail1`, `detail2`, `detail3`, `detail4`, `image1`) VALUES
(12, 'Single Bed', 75, 'Free Wi-fi', 'Ac Room', '3 Adult 2 Child', 'Including breakfast', 'single bed.jpeg'),
(13, 'Double Bed', 115, 'Free Wi-fi', 'Ac Room', '5 Adult 2 Child', 'Including breakfast', 'double bed.jpeg'),
(14, 'Luxuries', 150, 'Free Personal Wi-fi', 'Including Bath Tub', '2 Adult 2 Child', 'Including lunch & Dinner', 'luxuries.jpeg'),
(15, 'Our Special', 210, 'Free  Personal Wi-fi', 'Free Pick-Up Service', '2 Adult 2 Child', 'Including Special Foods', 'our special.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `room_no`
--

CREATE TABLE `room_no` (
  `rn_id` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `room_type` varchar(15) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Dumping data for table `room_no`
--

INSERT INTO `room_no` (`rn_id`, `room_no`, `room_type`, `status`) VALUES
(16, 101, 'single bed', 0),
(17, 102, 'single bed', 0),
(18, 103, 'single bed', 0),
(19, 201, 'double bed', 0),
(20, 202, 'double bed', 0),
(21, 203, 'double bed', 0),
(22, 301, 'luxuries', 0),
(23, 302, 'luxuries', 1),
(24, 303, 'luxuries', 0),
(25, 401, 'Our Special', 0),
(26, 402, 'Our Special', 0),
(27, 403, 'Our Special', 0),
(28, 701, 'DEMO', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `sb_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_no`
--
ALTER TABLE `book_no`
  ADD PRIMARY KEY (`bn_id`),
  ADD KEY `rb_id` (`rb_id`),
  ADD KEY `rn_id` (`rn_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `item_info`
--
ALTER TABLE `item_info`
  ADD PRIMARY KEY (`ii_id`),
  ADD UNIQUE KEY `unique` (`iname`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`oi_id`),
  ADD KEY `bn_id` (`bn_id`);

--
-- Indexes for table `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`mob`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`re_id`),
  ADD KEY `foreign key` (`id`);

--
-- Indexes for table `room_book`
--
ALTER TABLE `room_book`
  ADD PRIMARY KEY (`rb_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `room_info`
--
ALTER TABLE `room_info`
  ADD PRIMARY KEY (`ri_id`),
  ADD UNIQUE KEY `type` (`room_type`);

--
-- Indexes for table `room_no`
--
ALTER TABLE `room_no`
  ADD PRIMARY KEY (`rn_id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`sb_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_no`
--
ALTER TABLE `book_no`
  MODIFY `bn_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_info`
--
ALTER TABLE `item_info`
  MODIFY `ii_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `oi_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reg`
--
ALTER TABLE `reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `re_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_book`
--
ALTER TABLE `room_book`
  MODIFY `rb_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_info`
--
ALTER TABLE `room_info`
  MODIFY `ri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `room_no`
--
ALTER TABLE `room_no`
  MODIFY `rn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `sb_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_no`
--
ALTER TABLE `book_no`
  ADD CONSTRAINT `book_no_ibfk_1` FOREIGN KEY (`rb_id`) REFERENCES `room_book` (`rb_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_no_ibfk_2` FOREIGN KEY (`rn_id`) REFERENCES `room_no` (`rn_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_no_ibfk_3` FOREIGN KEY (`id`) REFERENCES `reg` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`bn_id`) REFERENCES `book_no` (`bn_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `foreign key` FOREIGN KEY (`id`) REFERENCES `reg` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room_book`
--
ALTER TABLE `room_book`
  ADD CONSTRAINT `room_book_ibfk_1` FOREIGN KEY (`id`) REFERENCES `reg` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
