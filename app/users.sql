-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 08, 2019 at 09:39 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(50) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `address`, `password`, `type`) VALUES
(1, 'Sivakumar', 'Sivasankaran', 'sivak5692@gmail.com', '0', '$2y$10$UDDP8ygZxhooYYsmUpwYrOP35c6edgrtz/JI64H6JV9SpFtxA4hcG', 'User'),
(2, 'Nik', 'Jonas', 'Nick@gmail.com', '0', '$2y$10$4ue11nHGS5LMzoT1gtvbU.kFNfUDtui7GysyL0ziLthUH7Fy0tuX2', 'User'),
(3, 'Sivakumar', 'Sivasankaran', 'sivak569@gmail.com', '0', '$2y$10$4ue11nHGS5LMzoT1gtvbU.kFNfUDtui7GysyL0ziLthUH7Fy0tuX2', 'User'),
(4, 'Siva', 'sankaran', 'siv@gmail.com', '0', '$2y$10$4ue11nHGS5LMzoT1gtvbU.kFNfUDtui7GysyL0ziLthUH7Fy0tuX2', 'User'),
(5, 'Rajesh', 'Sun', 'raj@gmail.com', '0', '$2y$10$4ue11nHGS5LMzoT1gtvbU.kFNfUDtui7GysyL0ziLthUH7Fy0tuX2', 'User'),
(6, 'Tom ', 'Hanks', 'tom.hanks@hotmail.com', '0', '$2y$10$4ue11nHGS5LMzoT1gtvbU.kFNfUDtui7GysyL0ziLthUH7Fy0tuX2', 'User'),
(7, 'fdjvhbf', 'fkjjg', 'sivak562@gmail.com', '0', '$2y$10$4ue11nHGS5LMzoT1gtvbU.kFNfUDtui7GysyL0ziLthUH7Fy0tuX2', ''),
(8, 'dlsbge', 'qweoew', 'ivak5692@gmail.com', '0', '$2y$10$4ue11nHGS5LMzoT1gtvbU.kFNfUDtui7GysyL0ziLthUH7Fy0tuX2', 'User'),
(9, 'Leo', 'Messi', 'leo.messi@yahoo.com', '0', '$2y$10$4ue11nHGS5LMzoT1gtvbU.kFNfUDtui7GysyL0ziLthUH7Fy0tuX2', 'User'),
(10, 'Ricky', 'Ponting', 'ponting@12345.com', '0', '$2y$10$4ue11nHGS5LMzoT1gtvbU.kFNfUDtui7GysyL0ziLthUH7Fy0tuX2', 'User'),
(11, 'Siva', 'karan', 'si2@gmail.com', '0', '$2y$10$4ue11nHGS5LMzoT1gtvbU.kFNfUDtui7GysyL0ziLthUH7Fy0tuX2', 'User'),
(12, 'yevs', 'Blaise', 'blaise@gmail.com', '0', '$2y$10$4ue11nHGS5LMzoT1gtvbU.kFNfUDtui7GysyL0ziLthUH7Fy0tuX2', 'User'),
(13, 'Sivakumar', 'Sivasankaran', 'sivak5692@gil.com', '0', '$2y$10$4ue11nHGS5LMzoT1gtvbU.kFNfUDtui7GysyL0ziLthUH7Fy0tuX2', 'User'),
(14, 'sdf', 'oisv', 'sivak5692@mail.com', '0', '$2y$10$4ue11nHGS5LMzoT1gtvbU.kFNfUDtui7GysyL0ziLthUH7Fy0tuX2', 'User'),
(15, 'Junyi', 'zhong', 'junyi@gmail.com', '0', '$2y$10$YmzOSOyRyh4rYXAf6eP8CurcxS8KspjfREqyFYJYplG/PjJZKLGw2', 'Admin'),
(16, 'Mic', 'Jagger', 'mic.jagger@gmail.com', '0', '$2y$10$4ue11nHGS5LMzoT1gtvbU.kFNfUDtui7GysyL0ziLthUH7Fy0tuX2', 'Admin'),
(17, 'Peter', 'Parker', 'peter@yahoo.com', '0', '$2y$10$4ue11nHGS5LMzoT1gtvbU.kFNfUDtui7GysyL0ziLthUH7Fy0tuX2', 'User'),
(18, 'Nikhil', 'Bhati', 'niks@gmail.com', '0', '$2y$10$whFcaDQBOP4Lz/12B2sOFudpd5nUO33UbB1hG.KLNErPwM3MzaIRG', 'User'),
(19, 'Maria', 'Sharapova', 'maria@gmail.com', '0', '$2y$10$4ue11nHGS5LMzoT1gtvbU.kFNfUDtui7GysyL0ziLthUH7Fy0tuX2', 'User'),
(20, 'Saurav', 'Ganguly', 'saurav.ganguly@hotmail.com', '0', '$2y$10$mYmF.j6r4.1wcjCU.lOyheZpp0df.cpVG71HcRemoTUkDOgcPUeJC', 'User'),
(21, 'Tim ', 'Paine', 'tim.paine@gmail.com', '0', '$2y$10$rowIl1kfIZfh8Che/Jzl4.wFiFvzBBOOvoo7Gbc9tFnvGrQyzAuiu', 'User'),
(22, 'Shane', 'Warne', 'shane@gmail.com', '0', '$2y$10$qG2qX151T2pmgDfIe0eGPur99tWI/DOZxZf3wczzCcaA/hBEKqbPq', 'User'),
(23, 'JUNYI', 'ZHONG', 'zhong.dev@foxmail.com', '0', '$2y$10$VKvJw9xRoiiyEQRZ3qSd/ulQAebVhM6NWEc/SqbHc4Vq1Z3wB2Vta', 'User'),
(27, 'root', 'root', 'root@foxmail.com', '53 Rue Victor Hugo', '$2y$10$.ScMSXaB6tqLSZXtlB5LLe6ZZo8QVfVHWhcX9n/CAoUts7o1zqsGa', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
