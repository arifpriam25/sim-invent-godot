-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2024 at 07:08 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `draft_simulasi1`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_model`
--

CREATE TABLE `car_model` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_model`
--

INSERT INTO `car_model` (`id`, `name`) VALUES
(3, 'brio'),
(4, 'jazz');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `car_model` varchar(255) NOT NULL,
  `parts_name` varchar(255) NOT NULL,
  `status` enum('SPR','SOH','SIT','US','IS') NOT NULL DEFAULT 'SPR',
  `spr_at` datetime DEFAULT NULL,
  `soh_at` datetime DEFAULT NULL,
  `sit_at` datetime DEFAULT NULL,
  `us_at` datetime DEFAULT NULL,
  `is_at` datetime DEFAULT NULL,
  `quality_check` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `sku`, `car_model`, `parts_name`, `status`, `spr_at`, `soh_at`, `sit_at`, `us_at`, `is_at`, `quality_check`) VALUES
(840, 'ban17116047910', 'brio', 'bangku', 'SIT', '2024-03-28 06:46:31', '2024-03-28 06:48:04', NULL, NULL, NULL, NULL),
(841, 'ban17116047911', 'brio', 'bangku', 'SIT', '2024-03-28 06:46:31', '2024-03-28 06:48:04', NULL, NULL, NULL, NULL),
(842, 'ban17116047912', 'brio', 'bangku', 'SIT', '2024-03-28 06:46:31', '2024-03-28 06:48:04', NULL, NULL, NULL, NULL),
(843, 'ban17116047913', 'brio', 'bangku', 'SIT', '2024-03-28 06:46:31', '2024-03-28 06:48:04', NULL, NULL, NULL, NULL),
(844, 'ban17116047914', 'brio', 'bangku', 'SOH', '2024-03-28 06:46:31', '2024-03-28 06:47:53', NULL, NULL, NULL, NULL),
(845, 'ban17116047915', 'brio', 'bangku', 'SOH', '2024-03-28 06:46:31', '2024-03-28 06:47:53', NULL, NULL, NULL, NULL),
(846, 'ban17116047916', 'brio', 'bangku', 'SOH', '2024-03-28 06:46:31', '2024-03-28 06:47:53', NULL, NULL, NULL, NULL),
(847, 'ban17116047917', 'brio', 'bangku', 'SOH', '2024-03-28 06:46:31', '2024-03-28 06:47:53', NULL, NULL, NULL, NULL),
(848, 'rod17116047910', 'brio', 'roda', 'SIT', '2024-03-28 06:46:31', '2024-03-28 06:48:04', NULL, NULL, NULL, NULL),
(849, 'rod17116047911', 'brio', 'roda', 'SIT', '2024-03-28 06:46:31', '2024-03-28 06:48:04', NULL, NULL, NULL, NULL),
(850, 'rod17116047912', 'brio', 'roda', 'SIT', '2024-03-28 06:46:31', '2024-03-28 06:48:04', NULL, NULL, NULL, NULL),
(851, 'rod17116047913', 'brio', 'roda', 'SIT', '2024-03-28 06:46:31', '2024-03-28 06:48:04', NULL, NULL, NULL, NULL),
(852, 'rod17116047914', 'brio', 'roda', 'SOH', '2024-03-28 06:46:31', '2024-03-28 06:47:53', NULL, NULL, NULL, NULL),
(853, 'rod17116047915', 'brio', 'roda', 'SOH', '2024-03-28 06:46:31', '2024-03-28 06:47:53', NULL, NULL, NULL, NULL),
(854, 'rod17116047916', 'brio', 'roda', 'SOH', '2024-03-28 06:46:31', '2024-03-28 06:47:53', NULL, NULL, NULL, NULL),
(855, 'rod17116047917', 'brio', 'roda', 'SOH', '2024-03-28 06:46:31', '2024-03-28 06:47:53', NULL, NULL, NULL, NULL),
(856, 'bod17116047910', 'brio', 'body', 'SIT', '2024-03-28 06:46:31', '2024-03-28 06:48:04', NULL, NULL, NULL, NULL),
(857, 'bod17116047911', 'brio', 'body', 'SOH', '2024-03-28 06:46:31', '2024-03-28 06:47:53', NULL, NULL, NULL, NULL),
(858, 'mes17116047910', 'brio', 'mesin', 'SIT', '2024-03-28 06:46:31', '2024-03-28 06:48:04', NULL, NULL, NULL, NULL),
(859, 'mes17116047911', 'brio', 'mesin', 'SOH', '2024-03-28 06:46:31', '2024-03-28 06:47:53', NULL, NULL, NULL, NULL),
(860, 'set17116047910', 'brio', 'set rangka', 'SIT', '2024-03-28 06:46:31', '2024-03-28 06:48:04', NULL, NULL, NULL, NULL),
(861, 'set17116047911', 'brio', 'set rangka', 'SOH', '2024-03-28 06:46:31', '2024-03-28 06:47:53', NULL, NULL, NULL, NULL),
(862, 'ban9562505302', 'brio', 'bangku', 'SOH', '2024-03-28 07:01:52', '2024-03-28 07:03:48', NULL, NULL, NULL, NULL),
(863, 'ban0803553069', 'brio', 'bangku', 'SOH', '2024-03-28 07:01:52', '2024-03-28 07:03:48', NULL, NULL, NULL, NULL),
(864, 'ban1548953939', 'brio', 'bangku', 'SOH', '2024-03-28 07:01:52', '2024-03-28 07:03:48', NULL, NULL, NULL, NULL),
(865, 'ban1755788396', 'brio', 'bangku', 'SOH', '2024-03-28 07:01:52', '2024-03-28 07:03:48', NULL, NULL, NULL, NULL),
(866, 'rod2289364403', 'brio', 'roda', 'SOH', '2024-03-28 07:01:52', '2024-03-28 07:03:48', NULL, NULL, NULL, NULL),
(867, 'rod5549207460', 'brio', 'roda', 'SOH', '2024-03-28 07:01:52', '2024-03-28 07:03:48', NULL, NULL, NULL, NULL),
(868, 'rod7575333017', 'brio', 'roda', 'SOH', '2024-03-28 07:01:52', '2024-03-28 07:03:48', NULL, NULL, NULL, NULL),
(869, 'rod8430395941', 'brio', 'roda', 'SOH', '2024-03-28 07:01:52', '2024-03-28 07:03:48', NULL, NULL, NULL, NULL),
(870, 'bod6553640247', 'brio', 'body', 'SOH', '2024-03-28 07:01:52', '2024-03-28 07:03:48', NULL, NULL, NULL, NULL),
(871, 'mes8673302730', 'brio', 'mesin', 'SOH', '2024-03-28 07:01:52', '2024-03-28 07:03:48', NULL, NULL, NULL, NULL),
(872, 'set2797628807', 'brio', 'set rangka', 'SOH', '2024-03-28 07:01:52', '2024-03-28 07:03:48', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`id`, `name`) VALUES
(2, 'body'),
(3, 'pintu'),
(4, 'roda'),
(5, 'bangku'),
(6, 'mesin'),
(10, 'set rangka');

-- --------------------------------------------------------

--
-- Table structure for table `required_parts`
--

CREATE TABLE `required_parts` (
  `id` int(11) NOT NULL,
  `car_model` varchar(255) DEFAULT NULL,
  `parts_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `required_parts`
--

INSERT INTO `required_parts` (`id`, `car_model`, `parts_name`, `quantity`) VALUES
(1, 'brio', 'bangku', 4),
(6, 'brio', 'roda', 4),
(7, 'brio', 'body', 1),
(8, 'brio', 'mesin', 1),
(9, 'jazz', 'bangku', 3),
(10, 'brio', 'set rangka', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(32) NOT NULL,
  `created_at` date NOT NULL,
  `is_active` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `created_at`, `is_active`, `role_id`) VALUES
(1, 'Fauzi', 'fauzi', '0bd9897bf12294ce35fdc0e21065c8a7', '2020-12-26', 0, 1),
(2, 'Dodi', 'dodi', 'dc82a0e0107a31ba5d137a47ab09a26b', '2021-01-02', 0, 2),
(3, 'arib', 'vrippe', '55479c55ebd1efd3ff125f1337100388', '2002-02-05', 1, 1),
(4, 'arib', 'vrippew', '55479c55ebd1efd3ff125f1337100388', '2002-02-05', 1, 2),
(5, 'vriBOT', 'lakara', '55479c55ebd1efd3ff125f1337100388', '2024-03-28', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user2`
--

CREATE TABLE `user2` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user2`
--

INSERT INTO `user2` (`id`, `username`, `email`, `password`, `role_id`, `is_active`, `created_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', 1, 1, '2024-02-21 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_model`
--
ALTER TABLE `car_model`
  ADD PRIMARY KEY (`id`,`name`),
  ADD KEY `z1` (`name`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`),
  ADD KEY `fk_car_model` (`car_model`),
  ADD KEY `fk_parts` (`parts_name`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`id`,`name`),
  ADD UNIQUE KEY `name_3` (`name`),
  ADD KEY `name` (`name`),
  ADD KEY `name_2` (`name`);

--
-- Indexes for table `required_parts`
--
ALTER TABLE `required_parts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `car_model` (`car_model`,`parts_name`),
  ADD KEY `parts` (`parts_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user2`
--
ALTER TABLE `user2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_model`
--
ALTER TABLE `car_model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=873;

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `required_parts`
--
ALTER TABLE `required_parts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user2`
--
ALTER TABLE `user2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `fk_car_model` FOREIGN KEY (`car_model`) REFERENCES `car_model` (`name`),
  ADD CONSTRAINT `fk_parts` FOREIGN KEY (`parts_name`) REFERENCES `parts` (`name`);

--
-- Constraints for table `required_parts`
--
ALTER TABLE `required_parts`
  ADD CONSTRAINT `required_parts_ibfk_1` FOREIGN KEY (`car_model`) REFERENCES `car_model` (`name`),
  ADD CONSTRAINT `required_parts_ibfk_2` FOREIGN KEY (`parts_name`) REFERENCES `parts` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
