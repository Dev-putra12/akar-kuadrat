-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2023 at 06:42 PM
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
-- Database: `akar-kuadrat`
--

-- --------------------------------------------------------

--
-- Table structure for table `squareroot`
--

CREATE TABLE `squareroot` (
  `id` int(11) NOT NULL,
  `nim` int(30) DEFAULT NULL,
  `input_number` float NOT NULL,
  `result` float DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `squareroot`
--

INSERT INTO `squareroot` (`id`, `nim`, `input_number`, `result`, `created_at`, `updated_at`) VALUES
(1, 2105551044, 49, 7, '2023-10-30 01:40:15', '2023-10-30 01:40:15'),
(2, 2105551044, 48, 6, '2023-10-30 01:40:15', '2023-10-30 01:40:15');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `nim`) VALUES
(1, 'putra', 2105551044),
(2, 'Tirta', 2105551007),
(3, 'Jesica', 2105551043);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `squareroot`
--
ALTER TABLE `squareroot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `squareroot_ibfk_1` (`nim`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Nim` (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `squareroot`
--
ALTER TABLE `squareroot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `squareroot`
--
ALTER TABLE `squareroot`
  ADD CONSTRAINT `squareroot_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `user` (`Nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
