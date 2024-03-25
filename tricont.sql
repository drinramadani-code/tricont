-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2024 at 01:27 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tricont`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_name` varchar(256) NOT NULL,
  `event_items` varchar(256) NOT NULL,
  `event_participants` varchar(256) NOT NULL,
  `event_leader` int(11) NOT NULL,
  `event_sk` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_items`, `event_participants`, `event_leader`, `event_sk`) VALUES
(1, 'Udhetimi ne Shqiperi', ' ', '2, 4, 5, 7', 2, '1111'),
(3, 'Daily Trip ne Tirane', ' ', '2, 4, 5', 2, '2222'),
(9, 'test event', '', '2, 4, 5', 2, '$2y$10$KxIyhA4q/NLZgGLsT6PRxe0QbT/Oun3pPG8W4Zks8yAr4rL9IUP9W'),
(10, 'testing adding', '', '5, 2', 5, '$2y$10$jkHltoqZUukBLecnAEm5VOLTf1tRLMhZ88fy137oBYu4n1ZbhQbwy'),
(11, 'Udhetim ne Tirane', '', '2, 8, 9', 2, '$2y$10$.8VS5hpBby9yJVOUzIj8SuRH2EiqRGGqOwBmTru/QZsPbB7/cxbzy');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `cek_id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `amount` varchar(256) NOT NULL,
  `date` varchar(256) NOT NULL,
  `paid_by` int(11) NOT NULL,
  `for_whom` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `cek_id`, `title`, `amount`, `date`, `paid_by`, `for_whom`) VALUES
(9, 1, 'dark', '36', '2024-03-08', 2, '2,4,5'),
(10, 1, 'palidhje', '36', '2024-03-08', 2, '2,4,5'),
(13, 1, '????', '210', '2024-03-08', 2, '2,4,5'),
(14, 1, 'test', '69', '2024-03-08', 2, '2,4,5'),
(15, 1, 'test date', '57', '2024-03-29', 2, '4,5'),
(16, 1, 'drek ', '50', '2024-03-14', 2, '2,4,5'),
(17, 1, 'Mengjes', '20', '2024-03-14', 2, '2,4,5'),
(18, 1, 'test', '3', '2024-03-15', 2, '2,4,5'),
(19, 3, 'test', '3', '2024-03-15', 2, '5,4,2'),
(20, 1, 'test', '210', '2024-03-19', 4, '2,4,5'),
(21, 9, 'dreka', '50', '2024-03-25', 4, '2,4'),
(22, 9, 'testing', '44', '2024-03-19', 2, '2,4');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `option_name` varchar(256) NOT NULL,
  `option_value` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `option_name`, `option_value`) VALUES
(1, 'Permalink', 'http://localhost/tricont/');

-- --------------------------------------------------------

--
-- Table structure for table `owes`
--

CREATE TABLE `owes` (
  `id` int(11) NOT NULL,
  `owes` int(11) NOT NULL,
  `who` int(11) NOT NULL,
  `total` varchar(256) NOT NULL,
  `expense_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owes`
--

INSERT INTO `owes` (`id`, `owes`, `who`, `total`, `expense_id`) VALUES
(1, 4, 2, '23', 14),
(2, 5, 2, '23', 14),
(3, 4, 2, '28.5', 15),
(4, 5, 2, '28.5', 15),
(5, 4, 2, '16.666666666667', 16),
(6, 5, 2, '16.666666666667', 16),
(7, 4, 2, '6.6666666666667', 17),
(8, 5, 2, '6.6666666666667', 17),
(9, 4, 2, '1', 18),
(10, 5, 2, '1', 18),
(11, 5, 2, '1', 19),
(12, 4, 2, '1', 19),
(13, 2, 4, '70', 20),
(14, 5, 4, '70', 20),
(15, 2, 4, '25', 21),
(16, 4, 2, '22', 22);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `username`, `password`) VALUES
(2, 'Drin Ramadani', 'drinshd@gmail.com', 'drinramadani', '123'),
(4, 'Jon Ramadani', 'jon@gmail.com', 'jon', '123'),
(5, 'filan fisteku', 'filan@gmail.com', 'filan', '123'),
(6, 'User2', 'user2@gmail.com', 'user2', '123'),
(7, 'altin berisha', 'altin@gmail.com', 'altin', '123'),
(8, 'Veton Qerimi', 'veton@gmail.com', 'veton', '123'),
(9, 'Filane Fisteku', 'filane@gmail.com', 'filane', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owes`
--
ALTER TABLE `owes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `owes`
--
ALTER TABLE `owes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
