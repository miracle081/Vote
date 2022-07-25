-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2022 at 10:42 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voteing`
--

-- --------------------------------------------------------

--
-- Table structure for table `contest`
--

CREATE TABLE `contest` (
  `id` int(11) NOT NULL,
  `contest_name` varchar(30) NOT NULL,
  `price` varchar(100) NOT NULL,
  `registration_price` varchar(100) NOT NULL,
  `contest_status` varchar(30) NOT NULL,
  `contest_pic` varchar(50) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contest`
--

INSERT INTO `contest` (`id`, `contest_name`, `price`, `registration_price`, `contest_status`, `contest_pic`, `date_created`) VALUES
(12, 'Kingston', '230000000', '4000000', 'On-going', 'picture6422409.jpg', '2024-05-22'),
(13, 'Progress', '986000000', '540000', 'On-going', 'picture5064377.jpg', '2024-05-22'),
(15, 'Queen', '49480340000', '760000', 'On-going', 'picture9350999.jpg', '2025-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `registered_contesters`
--

CREATE TABLE `registered_contesters` (
  `id` int(11) NOT NULL,
  `userid` varchar(12) NOT NULL,
  `contest_id` varchar(12) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `contest_name` varchar(30) NOT NULL,
  `registration_price` varchar(40) NOT NULL,
  `reciept` varchar(50) NOT NULL,
  `payment_status` varchar(30) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registered_contesters`
--

INSERT INTO `registered_contesters` (`id`, `userid`, `contest_id`, `first_name`, `last_name`, `contest_name`, `registration_price`, `reciept`, `payment_status`, `date_created`) VALUES
(419, '5', '12', 'Benjamin', 'obas', 'Kingston', '4000000', 'reciept8006453.jpg', 'Approved', '2025-05-22'),
(421, '5', '13', 'Benjamin', 'obas', 'Progress', '540000', 'reciept5155416.jpg', 'Approved', '2025-05-22'),
(423, '11', '12', 'game', 'boy', 'Kingston', '4000000', 'reciept1039564.jpg', 'Pending', '2025-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(13) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(300) NOT NULL,
  `user_state` varchar(30) NOT NULL,
  `user_zone` varchar(30) NOT NULL,
  `user_password` varchar(300) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `user_address` varchar(300) NOT NULL,
  `prof_pic` varchar(30) NOT NULL,
  `user_role` varchar(105) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `gender`, `email`, `user_state`, `user_zone`, `user_password`, `phone`, `dob`, `user_address`, `prof_pic`, `user_role`, `date_created`) VALUES
(4, 'test', 'Joseph', 'male', 'tester@gmail.com', 'abuja', 'East', '$2y$10$zsWBs6ftxcyQrNYaqxLlgOLuc7komN5QSU6.QOhqenJX0F.LShAYS', '09087675776', '2022-06-03', 'miracle', 'profile4.jpg', 'user', '2022-05-06'),
(5, 'Benjamin', 'obas', 'male', 'ben@gmail.com', 'abuja', 'West', '$2y$10$KOv5oYR/9Lso/uueB5xDZOoJz2h8TSQxrmlv6BdNivq.Nxx/ltGu.', '09087675776', '2022-05-26', 'miracle', 'profile5.jpg', 'user', '2022-05-06'),
(6, 'Miracle', 'Kingsman', 'male', 'miracle@gmail.com', 'abuja', 'West', '$2y$10$TkGLA4JPTBh9uqWbasWIjuDdT5V1QlRhkzZUMRtxT7LsOy5DVt6xK', '09087675776', '4534-12-31', 'Gwarimpa', 'profile6.jpg', 'Admin', '2022-05-07'),
(7, 'Tester', 'tester', 'male', 'realtester@test.com', 'Abuja', 'East', '$2y$10$n2xl9G3iW7AJqEEw7uBjXuwX71HDHruHcmbDCP6rXdK4e43zy41ve', '081668211697', '1999-01-01', 'miracle', '', 'user', '2022-05-11'),
(8, 'Blessing', 'Paul', 'female', 'blessing@gmail.com', 'abuja', 'South', '$2y$10$kFpif3jrKTm.3qIvwxNzDOAnWfou4t4m3BbYaXAnuvz/5/LGSnRla', '09087675776', '2222-01-02', 'miracle', 'profile8.jpg', 'user', '2022-05-16'),
(9, 'Peace', 'Peter', 'female', 'peace@gmail.com', 'abuja', 'West', '$2y$10$B46RPu3qQkliyw/dH./RRulwOpJ5MEf/Pf5ihLOhknl1K6K6Kz5.e', '081668211697', '2323-11-23', 'miracle', 'profile9.jpg', 'user', '2022-05-20'),
(10, 'John', 'Wick', 'male', 'john@gmail.com', 'Abuja', 'West', '$2y$10$KOv5oYR/9Lso/uueB5xDZOoJz2h8TSQxrmlv6BdNivq.Nxx/ltGu.', '09087675776', '2323-12-23', 'miracle', 'profile10.jpg', 'user', '2022-05-21'),
(11, 'game', 'boy', 'male', 'gameboy@me.com', 'ekiti', 'North', '$2y$10$9LpZaPa/XwZqSFmv1m4SJeSnddHsr2LxEKGwldxwKcVfM6JF33N8C', '09087675776', '2022-05-03', 'oijkkjl', '', 'user', '2022-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` int(11) NOT NULL,
  `contester_id` varchar(30) NOT NULL,
  `contest_id` varchar(20) NOT NULL,
  `contest_name` varchar(30) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `no_vote` varchar(100) NOT NULL,
  `reciept` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `ref` varchar(100) NOT NULL,
  `payment_status` varchar(30) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `contester_id`, `contest_id`, `contest_name`, `full_name`, `email`, `phone`, `no_vote`, `reciept`, `amount`, `ref`, `payment_status`, `date_created`) VALUES
(7, '8', '', 'Nights', 'Miracle MO Obafemi', 'miracle@gmail.com', '09087675776', '50', 'reciept4481418685.jpg', '2500', 'mira2067840mirac', 'Approved', '2017-05-22 12:22:21'),
(8, '4', '8', 'Nights', 'Miracle MO Obafemi', 'miracle@gmail.com', '09087675776', '2', 'reciept7309589967.jpg', '100', 'mira2563678mirac', 'Approved', '2018-05-22 02:18:35'),
(9, '4', '8', 'Nights', 'Joseph', 'joe@gmail.com', '07054534776', '100', 'reciept5686921818.jpg', '5000', 'joe@8906418josep', 'Approved', '2018-05-22 03:22:43'),
(10, '8', '6', 'Progress', 'Kings', 'yeah@gmail.com', '0908767eiorn', '53', 'reciept7028609322.jpg', '2650', 'yeah5555643kings', 'Approved', '2020-05-22 05:37:15'),
(11, '10', '6', 'Progress', 'Miracle MO Obafemi', 'miracle@gmail.com', '09087675776', '33', 'reciept8251331816.jpg', '1650', 'mira6759495mirac', 'Approved', '2021-05-22 01:57:09'),
(12, '10', '6', 'Progress', 'ls\'paior\'fnadf', 'miracleobafemdlfmosdmfi09@gmail.com', '081668211697dfv', '800', 'reciept9302246665.jpg', '40000', 'mira3992858ls\'pa', 'Approved', '2021-05-22 02:43:54'),
(13, '10', '6', 'Progress', 'Miracle', 'miracle@gmail.com', '09087675776', '29', 'reciept8955891131.jpg', '1450', 'mira8584963mirac', 'Approved', '2023-05-22 10:44:10'),
(14, '10', '6', 'Progress', 'Miracle', 'miracle@gmail.com', '09087675776', '29', 'reciept8955891131.jpg', '1450', 'mira8584963mirac', 'Approved', '2023-05-22 10:44:10');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `contest_id` varchar(11) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `total_votes` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contest`
--
ALTER TABLE `contest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registered_contesters`
--
ALTER TABLE `registered_contesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contest`
--
ALTER TABLE `contest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `registered_contesters`
--
ALTER TABLE `registered_contesters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=424;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
