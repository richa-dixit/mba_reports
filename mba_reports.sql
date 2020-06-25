-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2020 at 12:53 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mba_reports`
--

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `first_name`, `last_name`, `email`, `comment`, `datetime`) VALUES
(1, 'Vinay', 'Mishra', 'vinay.mishra@gmail.com', 'Hi, I wanted to take an admission for MBA course. Can you please! provide the details. ', '2020-06-24 23:29:40'),
(2, 'Devika', 'Shaha', 'devika_shaha89@gmail.com', 'Hello Sir, How much will be the annual fees?', '2020-06-24 23:29:40'),
(3, 'Vikas', 'Thakare', 'vikas.thakare@gmail.com', 'Hi, I wanted to take an admission for MBA course. Can you please! provide the details. ', '2020-06-24 23:31:24'),
(4, 'Sharmila', 'Tagore', 'sharmilatagore_2020@gmail.com', 'Hello Sir, How much will be the annual fees?', '2020-06-24 23:31:24'),
(5, 'Jitendra', 'Bhalla', 'jit_bhalla90.mishra@gmail.com', 'Hi, I wanted to take an admission for MBA course. Can you please! provide the details. ', '2020-06-24 23:33:00'),
(6, 'Nutan', 'Kapoor', 'dnutan_kapoor@gmail.com', 'Hello Sir, How much will be the annual fees?', '2020-06-24 23:33:00'),
(7, 'Vinay', 'Mishra', 'vinay.mishra@gmail.com', 'Hi, When will the admission process start? Can you please! provide the details. ', '2020-06-24 23:34:15'),
(8, 'Devika', 'Shaha', 'devika_shaha89@gmail.com', 'Hello Sir, Is there any cota for girls?', '2020-06-24 23:34:15'),
(9, 'Vinay', 'Mishra', 'vinay.mishra@gmail.com', 'Hi, Can i apply through OBC Cota?', '2020-06-24 23:34:15'),
(10, 'Devika', 'Shaha', 'devika_shaha89@gmail.com', 'Hello Sir, Can fees be paid in istallments?', '2020-06-24 23:34:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
