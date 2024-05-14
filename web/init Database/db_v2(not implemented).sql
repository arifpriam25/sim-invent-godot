-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 07:32 AM
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
-- Database: `zzztest`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_type`
--

CREATE TABLE `car_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_type`
--

INSERT INTO `car_type` (`id`, `name`) VALUES
(3, 'brio'),
(4, 'jazz');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `username` varchar(120) DEFAULT NULL,
  `sku` varchar(255) NOT NULL,
  `car_type` varchar(255) NOT NULL,
  `parts_name` varchar(255) NOT NULL,
  `status` enum('SPR','SOH','SIT','US','IS') NOT NULL DEFAULT 'SPR',
  `date` bigint(20) DEFAULT NULL,
  `quality_check` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `username`, `sku`, `car_type`, `parts_name`, `status`, `date`, `quality_check`) VALUES
(840, 'vrippe', 'ban17116047910', 'brio', 'bangku', 'SIT', 20240328064631, NULL),
(841, 'vrippe', 'ban17116047911', 'brio', 'bangku', 'SIT', 20240328064631, NULL),
(842, 'vrippe', 'ban17116047912', 'brio', 'bangku', 'SIT', 20240328064631, NULL),
(843, 'vrippe', 'ban17116047913', 'brio', 'bangku', 'SIT', 20240328064631, NULL),
(844, 'vrippe', 'ban17116047914', 'brio', 'bangku', 'SOH', 20240328064631, NULL),
(845, 'vrippe', 'ban17116047915', 'brio', 'bangku', 'SOH', 20240328064631, NULL),
(846, 'vrippe', 'ban17116047916', 'brio', 'bangku', 'SOH', 20240328064631, NULL),
(847, 'vrippe', 'ban17116047917', 'brio', 'bangku', 'SOH', 20240328064631, NULL),
(848, 'vrippe', 'rod17116047910', 'brio', 'roda', 'SIT', 20240328064631, NULL),
(849, 'vrippe', 'rod17116047911', 'brio', 'roda', 'SIT', 20240328064631, NULL),
(850, 'vrippe', 'rod17116047912', 'brio', 'roda', 'SIT', 20240328064631, NULL),
(851, 'vrippe', 'rod17116047913', 'brio', 'roda', 'SIT', 20240328064631, NULL),
(852, 'vrippe', 'rod17116047914', 'brio', 'roda', 'SOH', 20240328064631, NULL),
(853, 'vrippe', 'rod17116047915', 'brio', 'roda', 'SOH', 20240328064631, NULL),
(854, 'vrippe', 'rod17116047916', 'brio', 'roda', 'SOH', 20240328064631, NULL),
(855, 'vrippe', 'rod17116047917', 'brio', 'roda', 'SOH', 20240328064631, NULL),
(856, 'vrippe', 'bod17116047910', 'brio', 'body', 'SIT', 20240328064631, NULL),
(857, 'vrippe', 'bod17116047911', 'brio', 'body', 'SOH', 20240328064631, NULL),
(858, 'vrippe', 'mes17116047910', 'brio', 'mesin', 'SIT', 20240328064631, NULL),
(859, 'vrippe', 'mes17116047911', 'brio', 'mesin', 'SOH', 20240328064631, NULL),
(860, 'vrippe', 'set17116047910', 'brio', 'set rangka', 'SIT', 20240328064631, NULL),
(861, 'vrippe', 'set17116047911', 'brio', 'set rangka', 'SOH', 20240328064631, NULL),
(862, 'vrippe', 'ban9562505302', 'brio', 'bangku', 'SOH', 20240328070152, NULL),
(863, 'vrippe', 'ban0803553069', 'brio', 'bangku', 'SOH', 20240328070152, NULL),
(864, 'vrippe', 'ban1548953939', 'brio', 'bangku', 'SOH', 20240328070152, NULL),
(865, 'vrippe', 'ban1755788396', 'brio', 'bangku', 'SOH', 20240328070152, NULL),
(866, 'vrippe', 'rod2289364403', 'brio', 'roda', 'SOH', 20240328070152, NULL),
(867, 'vrippe', 'rod5549207460', 'brio', 'roda', 'SOH', 20240328070152, NULL),
(868, 'vrippe', 'rod7575333017', 'brio', 'roda', 'SOH', 20240328070152, NULL),
(869, 'vrippe', 'rod8430395941', 'brio', 'roda', 'SOH', 20240328070152, NULL),
(870, 'vrippe', 'bod6553640247', 'brio', 'body', 'SOH', 20240328070152, NULL),
(871, 'vrippe', 'mes8673302730', 'brio', 'mesin', 'SOH', 20240328070152, NULL),
(872, 'vrippe', 'set2797628807', 'brio', 'set rangka', 'SOH', 20240328070152, NULL),
(873, 'vrippe', 'ban9900648147', 'brio', 'bangku', 'SOH', 20240512093621, NULL),
(874, 'vrippe', 'ban8780428314', 'brio', 'bangku', 'SOH', 20240512093621, NULL),
(875, 'vrippe', 'ban1379376955', 'brio', 'bangku', 'SOH', 20240512093621, NULL),
(876, 'vrippe', 'ban1181761395', 'brio', 'bangku', 'SOH', 20240512093621, NULL),
(877, 'vrippe', 'ban0051545331', 'brio', 'bangku', 'SOH', 20240512093621, NULL),
(878, 'vrippe', 'ban7096624205', 'brio', 'bangku', 'SOH', 20240512093621, NULL),
(879, 'vrippe', 'ban8108880596', 'brio', 'bangku', 'SOH', 20240512093621, NULL),
(880, 'vrippe', 'ban4343485228', 'brio', 'bangku', 'SOH', 20240512093621, NULL),
(881, 'vrippe', 'rod4236156664', 'brio', 'roda', 'SOH', 20240512093621, NULL),
(882, 'vrippe', 'rod5354917454', 'brio', 'roda', 'SOH', 20240512093621, NULL),
(883, 'vrippe', 'rod5084194478', 'brio', 'roda', 'SOH', 20240512093621, NULL),
(884, 'vrippe', 'rod4162186948', 'brio', 'roda', 'SOH', 20240512093621, NULL),
(885, 'vrippe', 'rod7965883977', 'brio', 'roda', 'SOH', 20240512093621, NULL),
(886, 'vrippe', 'rod8495086115', 'brio', 'roda', 'SOH', 20240512093621, NULL),
(887, 'vrippe', 'rod2103349978', 'brio', 'roda', 'SOH', 20240512093621, NULL),
(888, 'vrippe', 'rod7171466562', 'brio', 'roda', 'SOH', 20240512093621, NULL),
(889, 'vrippe', 'bod1983305890', 'brio', 'body', 'SOH', 20240512093621, NULL),
(890, 'vrippe', 'bod6596201747', 'brio', 'body', 'SOH', 20240512093621, NULL),
(891, 'vrippe', 'mes2498525799', 'brio', 'mesin', 'SOH', 20240512093621, NULL),
(892, 'vrippe', 'mes8339322126', 'brio', 'mesin', 'SOH', 20240512093621, NULL),
(893, 'vrippe', 'set2009374026', 'brio', 'set rangka', 'SOH', 20240512093621, NULL),
(894, 'vrippe', 'set3501999151', 'brio', 'set rangka', 'SOH', 20240512093621, NULL),
(895, 'vrippe', 'ban5133805581', 'brio', 'bangku', 'SPR', 20240513022927, NULL),
(896, 'vrippe', 'ban3030265480', 'brio', 'bangku', 'SPR', 20240513022927, NULL),
(897, 'vrippe', 'ban7039822561', 'brio', 'bangku', 'SPR', 20240513022927, NULL),
(898, 'vrippe', 'ban2791483300', 'brio', 'bangku', 'SPR', 20240513022927, NULL),
(899, 'vrippe', 'rod4038984893', 'brio', 'roda', 'SPR', 20240513022927, NULL),
(900, 'vrippe', 'rod8237151950', 'brio', 'roda', 'SPR', 20240513022927, NULL),
(901, 'vrippe', 'rod7128885258', 'brio', 'roda', 'SPR', 20240513022927, NULL),
(902, 'vrippe', 'rod0013755800', 'brio', 'roda', 'SPR', 20240513022927, NULL),
(903, 'vrippe', 'bod4384344282', 'brio', 'body', 'SPR', 20240513022927, NULL),
(904, 'vrippe', 'mes1265834681', 'brio', 'mesin', 'SPR', 20240513022927, NULL),
(905, 'vrippe', 'set7691597964', 'brio', 'set rangka', 'SPR', 20240513022927, NULL);

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
  `car_type` varchar(255) DEFAULT NULL,
  `parts_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `required_parts`
--

INSERT INTO `required_parts` (`id`, `car_type`, `parts_name`, `quantity`) VALUES
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
  `email` varchar(255) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(32) NOT NULL,
  `created_at` date NOT NULL,
  `is_active` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `username`, `password`, `created_at`, `is_active`, `role_id`) VALUES
(1, 'Fauzi', '', 'fauzi', '0bd9897bf12294ce35fdc0e21065c8a7', '2020-12-26', 0, 1),
(2, 'Dodi', '', 'dodi', 'dc82a0e0107a31ba5d137a47ab09a26b', '2021-01-02', 0, 2),
(3, 'arib', '', 'vrippe', '55479c55ebd1efd3ff125f1337100388', '2002-02-05', 1, 1),
(4, 'arib', '', 'vrippew', '55479c55ebd1efd3ff125f1337100388', '2002-02-05', 1, 2),
(5, 'vriBOT', '', 'lakara', '55479c55ebd1efd3ff125f1337100388', '2024-03-28', 1, 1),
(6, 'poeqweiq', '', 'poiuy', '55479c55ebd1efd3ff125f1337100388', '2024-05-14', 1, 1);

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
-- Indexes for table `car_type`
--
ALTER TABLE `car_type`
  ADD PRIMARY KEY (`id`,`name`),
  ADD KEY `z1` (`name`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`),
  ADD KEY `fk_car_type` (`car_type`),
  ADD KEY `fk_parts` (`parts_name`),
  ADD KEY `username` (`username`);

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
  ADD UNIQUE KEY `car_type` (`car_type`,`parts_name`),
  ADD KEY `parts` (`parts_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

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
-- AUTO_INCREMENT for table `car_type`
--
ALTER TABLE `car_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=906;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  ADD CONSTRAINT `fk_car_type` FOREIGN KEY (`car_type`) REFERENCES `car_type` (`name`),
  ADD CONSTRAINT `fk_parts` FOREIGN KEY (`parts_name`) REFERENCES `parts` (`name`),
  ADD CONSTRAINT `fk_user_username` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `required_parts`
--
ALTER TABLE `required_parts`
  ADD CONSTRAINT `required_parts_ibfk_1` FOREIGN KEY (`car_type`) REFERENCES `car_type` (`name`),
  ADD CONSTRAINT `required_parts_ibfk_2` FOREIGN KEY (`parts_name`) REFERENCES `parts` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
