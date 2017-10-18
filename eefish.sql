-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2017 at 09:09 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eefish`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_logs`
--

CREATE TABLE `api_logs` (
  `id` int(11) NOT NULL,
  `api_log_name` varchar(255) DEFAULT NULL,
  `api_log_description` varchar(255) DEFAULT NULL,
  `api_log_error_code` varchar(255) DEFAULT NULL,
  `api_log_param` text,
  `api_log_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `api_logs`
--

INSERT INTO `api_logs` (`id`, `api_log_name`, `api_log_description`, `api_log_error_code`, `api_log_param`, `api_log_created_at`) VALUES
(1, 'VALIDATE_LOGIN', 'Username not found!', '404', '{\"username\":null,\"password\":\"da39a3ee5e6b4b0d3255bfef95601890afd80709\"}', '2017-10-04 04:25:30'),
(2, 'VALIDATE_LOGIN', 'Username not found!', '404', '{\"username\":null,\"password\":\"da39a3ee5e6b4b0d3255bfef95601890afd80709\"}', '2017-10-04 04:25:30'),
(3, 'VALIDATE_LOGIN', 'Missing required parameter username!', '404', '{\"username\":null,\"password\":\"da39a3ee5e6b4b0d3255bfef95601890afd80709\"}', '2017-10-04 04:25:30'),
(4, 'VALIDATE_LOGIN', 'Missing required parameter username!', '404', '{\"username\":null,\"password\":\"da39a3ee5e6b4b0d3255bfef95601890afd80709\"}', '2017-10-04 04:25:30'),
(5, 'REGISTER', 'Missing required parameter identity_number!', '404', '{\"username\":\"budismartcloud\",\"password\":\"07Budi07\",\"identity_number\":null,\"address\":null,\"phone_number\":null,\"name\":null,\"email\":null}', '2017-10-04 04:26:48'),
(6, 'REGISTER', 'Registration failed!', '403', '{\"username\":\"natsu\",\"password\":\"123456\",\"identity_number\":\"2110151001\",\"address\":\"Magnolia\",\"phone_number\":\"0000000000000\",\"name\":\"Natsu Dragnell\",\"email\":\"natsu_dragnel@gmail.com\"}', '2017-10-04 04:28:06'),
(7, 'REGISTER', 'Missing required parameter name!', '404', '{\"username\":\"Rafif\",\"password\":\"123\",\"identity_number\":\"07842\",\"address\":\"Gdhdhd\",\"phone_number\":\"087575\",\"name\":null,\"email\":\"Rafif@yahi.com\"}', '2017-10-11 02:52:01'),
(8, 'REGISTER', 'Missing required parameter password!', '404', '{\"username\":\"Rafifditya\",\"password\":null,\"identity_number\":\"Rafif@hao.com\",\"address\":\"123\",\"phone_number\":\"07575\",\"name\":\"Hornd\",\"email\":\"087547\"}', '2017-10-11 03:08:27'),
(9, 'REGISTER', 'Missing required parameter password!', '404', '{\"username\":\"Rafif\",\"password\":null,\"identity_number\":\"Rafif@hon.com\",\"address\":\"123\",\"phone_number\":\"0457\",\"name\":\"Gdgskx\",\"email\":\"07872\"}', '2017-10-11 03:09:12');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city_name` varchar(255) DEFAULT NULL,
  `city_provinces_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `city_provinces_id`) VALUES
(2, 'Surabaya', 1);

-- --------------------------------------------------------

--
-- Table structure for table `couriers`
--

CREATE TABLE `couriers` (
  `id` int(11) NOT NULL,
  `courier_name` varchar(255) DEFAULT NULL,
  `courier_identity_number` varchar(255) DEFAULT NULL,
  `courier_address` varchar(255) DEFAULT NULL,
  `courier_phone_number` varchar(12) DEFAULT NULL,
  `courier_user_name` varchar(255) DEFAULT NULL,
  `courier_password` varchar(255) DEFAULT NULL,
  `courier_picture` varchar(255) DEFAULT NULL,
  `courier_balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `courier_assignments`
--

CREATE TABLE `courier_assignments` (
  `id` int(11) NOT NULL,
  `courier_assignment_created_at` timestamp NULL DEFAULT NULL,
  `courier_assignment_modified_at` timestamp NULL DEFAULT NULL,
  `courier_assignment_is_received` int(11) DEFAULT NULL,
  `courier_assignment_couriers_id` int(11) NOT NULL,
  `courier_assignment_orders_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fishes`
--

CREATE TABLE `fishes` (
  `id` int(11) NOT NULL,
  `fish_name` varchar(255) DEFAULT NULL,
  `fish_fish_categories_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fishes`
--

INSERT INTO `fishes` (`id`, `fish_name`, `fish_fish_categories_id`) VALUES
(1, 'Ikan Lele', 3),
(3, 'Ikan Bandeng', 3);

-- --------------------------------------------------------

--
-- Table structure for table `fish_categories`
--

CREATE TABLE `fish_categories` (
  `id` int(11) NOT NULL,
  `fish_category_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fish_categories`
--

INSERT INTO `fish_categories` (`id`, `fish_category_name`) VALUES
(1, 'Air Laut'),
(2, 'Air Payau'),
(3, 'Air Tawar');

-- --------------------------------------------------------

--
-- Table structure for table `fish_items`
--

CREATE TABLE `fish_items` (
  `id` int(11) NOT NULL,
  `fish_item_name` varchar(255) DEFAULT NULL,
  `fish_item_fishes_id` int(11) NOT NULL,
  `fish_item_fish_size_categories_id` int(11) NOT NULL,
  `fish_item_weight` float DEFAULT NULL,
  `fish_item_quantity` int(11) DEFAULT NULL,
  `fish_item_specific_price` int(11) DEFAULT NULL,
  `fish_item_normal_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fish_items`
--

INSERT INTO `fish_items` (`id`, `fish_item_name`, `fish_item_fishes_id`, `fish_item_fish_size_categories_id`, `fish_item_weight`, `fish_item_quantity`, `fish_item_specific_price`, `fish_item_normal_price`) VALUES
(1, 'Bandeng Super', 3, 3, 8, 3, 10000, 80000);

-- --------------------------------------------------------

--
-- Table structure for table `fish_size_categories`
--

CREATE TABLE `fish_size_categories` (
  `id` int(11) NOT NULL,
  `fish_size_category_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fish_size_categories`
--

INSERT INTO `fish_size_categories` (`id`, `fish_size_category_name`) VALUES
(1, 'Kecil'),
(2, 'Sedang'),
(3, 'Besar');

-- --------------------------------------------------------

--
-- Table structure for table `message_systems`
--

CREATE TABLE `message_systems` (
  `id` int(11) NOT NULL,
  `message_system_code` varchar(255) DEFAULT NULL,
  `message_system_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message_systems`
--

INSERT INTO `message_systems` (`id`, `message_system_code`, `message_system_description`) VALUES
(1, '302', 'Found'),
(2, '303', 'See Other'),
(3, '304', 'Not Modified'),
(4, '307', 'Temporary Redirect'),
(5, '308', 'Resume Incomplete'),
(6, '400', 'Bad Request'),
(7, '401', 'Unauthorized'),
(8, '403', 'Forbidden'),
(9, '404', 'Not Found'),
(10, '405', 'Method Not Allowed'),
(11, '409', 'Conflict'),
(12, '410', 'Gone'),
(13, '411', 'Length Required'),
(14, '412', 'Precondition Failed'),
(15, '413', 'Payload Too Large'),
(16, '416', 'Requested Range Not Satisfiable'),
(17, '429', 'Too Many Requests'),
(18, '500', 'Internal Server Error'),
(19, '502', 'Bad Gateway'),
(20, '503', 'Service Unavailable');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_users_id` int(11) NOT NULL,
  `order_periods_id` int(11) NOT NULL,
  `order_order_kinds_id` int(11) NOT NULL,
  `order_created_at` timestamp NULL DEFAULT NULL,
  `order_modified_at` timestamp NULL DEFAULT NULL,
  `order_total` int(11) DEFAULT NULL,
  `order_shipping_cost` int(11) DEFAULT NULL,
  `order_order_status_id` int(11) NOT NULL,
  `order_user_feedback` int(11) DEFAULT NULL,
  `order_payment_types_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_item_quantity` int(11) DEFAULT NULL,
  `fish_items_id` int(11) NOT NULL,
  `orde_item_orders_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_item_logs`
--

CREATE TABLE `order_item_logs` (
  `id` int(11) NOT NULL,
  `order_item_log_created_at` timestamp NULL DEFAULT NULL,
  `order_item_log_orders_id` int(11) NOT NULL,
  `order_item_log_order_item_quantity` int(11) DEFAULT NULL,
  `order_item_log_fish_items_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_kinds`
--

CREATE TABLE `order_kinds` (
  `id` int(11) NOT NULL,
  `order_kind_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `order_status_name` varchar(255) DEFAULT NULL,
  `order_status_description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE `payment_types` (
  `id` int(11) NOT NULL,
  `payment_type_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `periods`
--

CREATE TABLE `periods` (
  `id` int(11) NOT NULL,
  `period_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `periods`
--

INSERT INTO `periods` (`id`, `period_name`) VALUES
(1, '2016'),
(2, '2017'),
(3, '2018'),
(4, '2019'),
(5, '2020'),
(6, '2021'),
(7, '2022'),
(8, '2023'),
(9, '2024'),
(10, '2025');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(11) NOT NULL,
  `province_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `province_name`) VALUES
(1, 'Jawa Timur');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_username` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_identity_number` varchar(100) DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_post_code` int(11) DEFAULT NULL,
  `user_picture` varchar(255) DEFAULT NULL,
  `user_cities_id` int(11) NOT NULL,
  `user_phone_number` varchar(12) DEFAULT NULL,
  `user_full_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_username`, `user_password`, `user_identity_number`, `user_address`, `user_post_code`, `user_picture`, `user_cities_id`, `user_phone_number`, `user_full_name`, `user_email`, `user_last_login`) VALUES
(2, 'budismartcloud', 'c39be055d393b9c9fd30083dc5629f0eb93f0ff5', '2110151005', 'Jl. Klampis Jaya no. 82 Surabaya', 62115, '20171003021344-IMG-20170925-WA0010.jpg', 2, '085233020036', 'Budi Santoso', 'budisantoso@smartcloud.id', '2017-10-03 21:07:33'),
(4, 'antonio', 'cb7a271bd7b86e491f9a631b6141d68595db382b', '12345678', 'Surabaya', 62115, '20171003020845-pho_05091502072014338.JPG', 2, '123456789', 'Antonio Conte', 'antonio@gmail.com', '2017-10-04 02:47:23'),
(5, 'natsu', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2110151001', 'Magnolia', NULL, NULL, 2, '000000000000', 'Natsu Dragnell', 'natsu_dragnel@gmail.com', '2017-10-10 20:07:14'),
(6, 'Rafifditya', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '075754', 'Gfjdjd', NULL, NULL, 2, '08757', 'Rafif aditya', 'Rafif@gmail.com', '2017-10-11 03:12:06'),
(7, 'Astuti', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '08572548', 'Gebang', 8576, NULL, 2, '078754', 'Seria reni', 'Astuti@googlemail.com', '2017-10-10 20:37:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_logs`
--
ALTER TABLE `api_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cities_provinces_idx` (`city_provinces_id`);

--
-- Indexes for table `couriers`
--
ALTER TABLE `couriers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courier_assignments`
--
ALTER TABLE `courier_assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_courier_assignments_couriers1_idx` (`courier_assignment_couriers_id`),
  ADD KEY `fk_courier_assignments_orders1_idx` (`courier_assignment_orders_id`);

--
-- Indexes for table `fishes`
--
ALTER TABLE `fishes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fishes_fish_categories1_idx` (`fish_fish_categories_id`);

--
-- Indexes for table `fish_categories`
--
ALTER TABLE `fish_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fish_items`
--
ALTER TABLE `fish_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fish_items_fishes1_idx` (`fish_item_fishes_id`),
  ADD KEY `fk_fish_items_fish_size_categories1_idx` (`fish_item_fish_size_categories_id`);

--
-- Indexes for table `fish_size_categories`
--
ALTER TABLE `fish_size_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_systems`
--
ALTER TABLE `message_systems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_users1_idx` (`order_users_id`),
  ADD KEY `fk_orders_periods1_idx` (`order_periods_id`),
  ADD KEY `fk_orders_order_kinds1_idx` (`order_order_kinds_id`),
  ADD KEY `fk_orders_order_status1_idx` (`order_order_status_id`),
  ADD KEY `fk_orders_payment_types1_idx` (`order_payment_types_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_items_fish_items1_idx` (`fish_items_id`),
  ADD KEY `fk_order_items_orders1_idx` (`orde_item_orders_id`);

--
-- Indexes for table `order_item_logs`
--
ALTER TABLE `order_item_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_item_logs_orders1_idx` (`order_item_log_orders_id`);

--
-- Indexes for table `order_kinds`
--
ALTER TABLE `order_kinds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periods`
--
ALTER TABLE `periods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_cities1_idx` (`user_cities_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_logs`
--
ALTER TABLE `api_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `couriers`
--
ALTER TABLE `couriers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `courier_assignments`
--
ALTER TABLE `courier_assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fishes`
--
ALTER TABLE `fishes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fish_categories`
--
ALTER TABLE `fish_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fish_items`
--
ALTER TABLE `fish_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fish_size_categories`
--
ALTER TABLE `fish_size_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `message_systems`
--
ALTER TABLE `message_systems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_item_logs`
--
ALTER TABLE `order_item_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_kinds`
--
ALTER TABLE `order_kinds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `periods`
--
ALTER TABLE `periods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `fk_cities_provinces` FOREIGN KEY (`city_provinces_id`) REFERENCES `provinces` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `courier_assignments`
--
ALTER TABLE `courier_assignments`
  ADD CONSTRAINT `fk_courier_assignments_couriers1` FOREIGN KEY (`courier_assignment_couriers_id`) REFERENCES `couriers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_courier_assignments_orders1` FOREIGN KEY (`courier_assignment_orders_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `fishes`
--
ALTER TABLE `fishes`
  ADD CONSTRAINT `fk_fishes_fish_categories1` FOREIGN KEY (`fish_fish_categories_id`) REFERENCES `fish_categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `fish_items`
--
ALTER TABLE `fish_items`
  ADD CONSTRAINT `fk_fish_items_fish_size_categories1` FOREIGN KEY (`fish_item_fish_size_categories_id`) REFERENCES `fish_size_categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fish_items_fishes1` FOREIGN KEY (`fish_item_fishes_id`) REFERENCES `fishes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_order_kinds1` FOREIGN KEY (`order_order_kinds_id`) REFERENCES `order_kinds` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_order_status1` FOREIGN KEY (`order_order_status_id`) REFERENCES `order_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_payment_types1` FOREIGN KEY (`order_payment_types_id`) REFERENCES `payment_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_periods1` FOREIGN KEY (`order_periods_id`) REFERENCES `periods` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_users1` FOREIGN KEY (`order_users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `fk_order_items_fish_items1` FOREIGN KEY (`fish_items_id`) REFERENCES `fish_items` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_items_orders1` FOREIGN KEY (`orde_item_orders_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_item_logs`
--
ALTER TABLE `order_item_logs`
  ADD CONSTRAINT `fk_order_item_logs_orders1` FOREIGN KEY (`order_item_log_orders_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_cities1` FOREIGN KEY (`user_cities_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
