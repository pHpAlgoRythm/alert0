-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2024 at 01:25 PM
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
-- Database: `alert0`
--

-- --------------------------------------------------------

--
-- Table structure for table `history_table`
--

CREATE TABLE `history_table` (
  `history_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `response_id` int(11) NOT NULL,
  `request_datetime` datetime NOT NULL,
  `response_dispatched_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_table`
--

CREATE TABLE `request_table` (
  `request_id` int(11) NOT NULL,
  `type` enum('fire','vehicular accident','health emergency','flood') NOT NULL,
  `reporter_id` int(11) NOT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL,
  `status` enum('active','responded','done') DEFAULT 'active',
  `date_time` datetime DEFAULT current_timestamp(),
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_table`
--

INSERT INTO `request_table` (`request_id`, `type`, `reporter_id`, `longitude`, `latitude`, `status`, `date_time`, `photo`) VALUES
(1, '', 18, 122.803, 10.0083, '', '0000-00-00 00:00:00', 'C:\\xampp\\htdocs\\emergency_response_application\\app\\controllers/../../../public/photos/reports/image_1734485129.png'),
(2, '', 18, 0, 0, '', '0000-00-00 00:00:00', 'C:\\xampp\\htdocs\\emergency_response_application\\app\\controllers/../../../public/photos/reports/image_1734485160.png'),
(3, '', 18, 122.803, 10.0082, '', '0000-00-00 00:00:00', 'C:\\xampp\\htdocs\\emergency_response_application\\app\\controllers/../../../public/photos/reports/image_1734485291.png'),
(4, '', 18, 122.803, 10.0082, '', '0000-00-00 00:00:00', 'C:\\xampp\\htdocs\\emergency_response_application\\app\\controllers../../../public/photos/reports/image_1734485329.png'),
(5, '', 18, 122.803, 10.0082, '', '0000-00-00 00:00:00', 'C:\\xampp\\htdocs\\emergency_response_application\\app\\controllers../../../public/photos/reports/image_1734488164.png'),
(6, '', 18, 122.803, 10.0082, '', '0000-00-00 00:00:00', 'C:\\xampp\\htdocs\\emergency_response_application\\app\\controllers../../../public/photos/reports/image_1734488185.png'),
(7, '', 18, 122.803, 10.0082, '', '2024-12-18 03:18:32', 'C:\\xampp\\htdocs\\emergency_response_application\\app\\controllers../../../public/photos/reports/image_1734488312.png'),
(9, '', 18, 122.834, 9.96502, '', '2024-12-18 12:46:08', 'C:\\xampp\\htdocs\\emergency_response_application\\app\\controllers../../../public/photos/reports/image_1734522368.png'),
(10, '', 18, 122.834, 9.96502, '', '2024-12-18 12:47:21', 'C:\\xampp\\htdocs\\emergency_response_application\\app\\controllers../../../public/photos/reports/image_1734522441.png');

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE `responses` (
  `response_id` int(11) NOT NULL,
  `response_current_longitude` float DEFAULT NULL,
  `response_current_latitude` float DEFAULT NULL,
  `request_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `vehicle_driver_id` int(11) NOT NULL,
  `paramedic_id` int(11) NOT NULL,
  `status` enum('new','response_dispatched','done') DEFAULT 'new',
  `dispatch_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `users_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `role` enum('user','admin','dispatcher','paramedics','driver') DEFAULT 'user',
  `status` enum('available','currently_responding','on_leave') DEFAULT 'available',
  `created_at` datetime DEFAULT current_timestamp(),
  `phone_number` varchar(20) DEFAULT NULL,
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`users_id`, `email`, `password`, `full_name`, `address`, `gender`, `role`, `status`, `created_at`, `phone_number`, `profile`) VALUES
(1, 'shemregidor07@gmail.com', '$2y$10$XTreRWNaHgcGfw1bpdm9nu4GpnJdRGiAASvetGuZ31EHs1dTw0/ae', '', NULL, NULL, NULL, 'available', '2024-11-25 05:25:10', NULL, ''),
(2, 'chan@example.com', '$2y$10$kuGcakHR2CK8ph7al8dBouiWeHTk71KLe99bWAzT6Bv4o0yPC9ekK', '', NULL, NULL, 'user', 'available', '2024-11-25 05:34:27', NULL, ''),
(3, 'kyle@try.com', '$2y$10$iUZBcbt11KxoAvNT6S4mZeKfUBKIKppdEBCtA3gLuPOV/U9Dv4Kie', '', NULL, NULL, 'user', 'available', '2024-11-25 05:42:29', NULL, ''),
(4, 'raven@try.com', '$2y$10$tHfIk7T3Q27BAO631jJ.TeekBrmHkg1W3vwoJQIiptubAFtgmyM4K', '', NULL, NULL, 'user', 'available', '2024-11-25 05:44:59', NULL, ''),
(5, 'shemregidor@example.com', '$2y$10$lgOqXthNpSRqOkFlJWUKeuKXL2NJDmg0Q5chxIltmkdOF2ShHbUv.', '', NULL, NULL, 'user', 'available', '2024-11-27 08:42:11', NULL, ''),
(12, 'shem@example.com', '$2y$10$QaaYbCgPNb8/ngFTKIBBQ.rCKIhOTSlgsncYc11N8GyerIILjPY9C', 'Shem Regidor', 'Kab', 'male', 'user', 'available', '2024-12-15 10:08:16', '09876543211', 'profile_675f4540604e47.00887220.jpg'),
(13, 'chan1@example.com', '$2y$10$0OX/M2.Djm0i.jvzQW67zeGTCAoHfDxS8QENzukoBUWYWfFoHOdry', 'Chan ', 'Ilog', 'male', 'user', 'available', '2024-12-16 03:23:13', '0987654313', 'profile_675f8f116cd3e4.40834165.jpg'),
(14, 'hello@example.com', '$2y$10$NPUdQ2MrOzK72xnNkMW/feHLVH9gjQYGp/5.ZaT1G4Fk6kFlLeGkS', 'shem', 'kab', 'male', 'user', 'available', '2024-12-16 04:18:16', '090807060504', 'profile_675f9bf86c9181.85058442.jpg'),
(15, 'hi@example.com', '$2y$10$fHqaLg6WUQ3ezaXAlSqxTeBIrT9jtCT1pXOY1fawN6lXvC1j3k1CC', 'Shem', 'kab', 'male', 'user', 'available', '2024-12-16 04:19:36', '090807060504', 'profile_675f9c48bfb645.27305961.'),
(16, 'no@example.com', '$2y$10$8n4LMT9WCZ/c942HZgowQOrtYm01TP6vQnsPgDDNpLQNXPZC2wyJy', 'clarence', 'talubangi', 'male', 'user', 'available', '2024-12-16 05:18:21', '0998756412', 'profile_675faa0da7f666.48035876.'),
(17, 'yes@example.com', '$2y$10$HAtXlsUMrTQCp5K0sVvUpuHiBMXA4cig1qBb4dkrqtag1ikd8sOSa', 'raven', 'ilog', 'male', 'user', 'available', '2024-12-16 05:20:02', '09856255244', 'profile_675faa72eea8f8.18983363.jpg'),
(18, 'shem@gmail.com', '$2y$10$8rbRkn3IW/.UowKWspCH5eVUHoSAr9Hc15vAzyH5Exj.BR.rB/GkO', 'shem reg', 'overflow', 'male', 'user', 'available', '2024-12-16 05:27:14', '09878654123131', 'profile_675fac22f3e567.47518911.jpg'),
(19, 'hahaha@example', '$2y$10$.KJASEKDUmtZuYoBC36toeBBa7jtci9b/vpVeUQngSjPKe06KMcWW', 'hahaha', 'overflow', 'male', 'user', 'available', '2024-12-16 03:56:49', '098765483893', 'profile_67603fb1ad3dd9.81892760.jpg'),
(20, 'nako@gmail.com', '$2y$10$fnkJe6qy9Cf4zFD7B2wgRe/6dRg031zAwnGLbKL.st54Y17kMdE6a', 'HAHAHAH', 'AHAHAH0', 'male', 'user', 'available', '2024-12-16 03:57:53', '09875615415', 'profile_67603ff1b44585.32191645.jpg'),
(21, 'test2@gmail.com', '$2y$10$USJZzsclZsN5O7BCSObif.sIQ9kL7ERU0pH.SQDw0yknkbvdba9K6', 'test2', 'saxssdsdas', 'male', 'user', 'available', '2024-12-16 04:19:38', '09876789998', 'profile_6760450a8a47c9.04488649.jpg'),
(22, 'test123@gmail.com', '$2y$10$NWl4Z26FxOf/KzRkQ/sD7u.hUZfGDy70Rpgt8mEMLFWOKpIXTofv2', 'test', '123', 'male', 'user', 'available', '2024-12-16 04:23:17', '09123456789', 'profile_676045e5e54a99.40793297.png'),
(23, 'shem@gamil.com', '$2y$10$6.iK3fp42F50IerToAyZ5elj17YubIprKySlgnV9.PSG6rktX24Bi', 'Shem Regidor', 'Overflow', 'male', 'user', 'available', '2024-12-16 04:39:53', '0987635352626', 'profile_676049c91ea8f3.97727055.jpg'),
(24, 'jet@example.com', '$2y$10$isaKfKVRTqL5v2aSbHEnbuQEmkk2.mZRellq2zkskTPFyfatj53ze', 'jethro ', 'kab', 'male', 'user', 'available', '2024-12-18 12:42:50', '09876543211', 'profile_6762b53a92aed5.09744773.png');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vehicle_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `paramedic_id` int(11) NOT NULL,
  `status` enum('available','currently_responding','on_repair','under_maintenance') DEFAULT 'available',
  `plate_number` varchar(100) NOT NULL,
  `last_maintenance_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history_table`
--
ALTER TABLE `history_table`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `request_id` (`request_id`),
  ADD KEY `response_id` (`response_id`);

--
-- Indexes for table `request_table`
--
ALTER TABLE `request_table`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `reporter_id` (`reporter_id`);

--
-- Indexes for table `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`response_id`),
  ADD KEY `request_id` (`request_id`),
  ADD KEY `vehicle_id` (`vehicle_id`),
  ADD KEY `vehicle_driver_id` (`vehicle_driver_id`),
  ADD KEY `paramedic_id` (`paramedic_id`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicle_id`),
  ADD KEY `driver_id` (`driver_id`),
  ADD KEY `paramedic_id` (`paramedic_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history_table`
--
ALTER TABLE `history_table`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_table`
--
ALTER TABLE `request_table`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `responses`
--
ALTER TABLE `responses`
  MODIFY `response_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history_table`
--
ALTER TABLE `history_table`
  ADD CONSTRAINT `history_table_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `request_table` (`request_id`),
  ADD CONSTRAINT `history_table_ibfk_2` FOREIGN KEY (`response_id`) REFERENCES `responses` (`response_id`);

--
-- Constraints for table `request_table`
--
ALTER TABLE `request_table`
  ADD CONSTRAINT `request_table_ibfk_1` FOREIGN KEY (`reporter_id`) REFERENCES `users_table` (`users_id`);

--
-- Constraints for table `responses`
--
ALTER TABLE `responses`
  ADD CONSTRAINT `responses_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `request_table` (`request_id`),
  ADD CONSTRAINT `responses_ibfk_2` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`vehicle_id`),
  ADD CONSTRAINT `responses_ibfk_3` FOREIGN KEY (`vehicle_driver_id`) REFERENCES `users_table` (`users_id`),
  ADD CONSTRAINT `responses_ibfk_4` FOREIGN KEY (`paramedic_id`) REFERENCES `users_table` (`users_id`);

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `users_table` (`users_id`),
  ADD CONSTRAINT `vehicles_ibfk_2` FOREIGN KEY (`paramedic_id`) REFERENCES `users_table` (`users_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
