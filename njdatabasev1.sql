-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2022 at 09:15 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `njdatabasev1`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `uploaded_image` blob NOT NULL,
  `product_price` decimal(7,2) NOT NULL,
  `quantity` int(11) DEFAULT 1,
  `add_ons` int(11) NOT NULL DEFAULT 0,
  `subtotal` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `customer_id`, `product_id`, `product_name`, `uploaded_image`, `product_price`, `quantity`, `add_ons`, `subtotal`) VALUES
(32, 96, 40, 'Anime Art', '', '350.00', 1, 30, '380.00'),
(43, 43, 41, 'Cartoon Art', '', '420.00', 4, 0, '1680.00'),
(49, 43, 42, 'Vector Art', '', '390.00', 1, 0, '390.00');

-- --------------------------------------------------------

--
-- Table structure for table `customer_uploads`
--

CREATE TABLE `customer_uploads` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `img_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_uploads`
--

INSERT INTO `customer_uploads` (`id`, `img_name`, `img_path`) VALUES
(1, '623db9b88a17b9.69981262.jpg', 'assets/images/customer_temp_storage/623db9b88a17b9.69981262.jpg'),
(4, '623dcf4dbf17d2.90849160.jpg', 'assets/images/customer_temp_storage/623dcf4dbf17d2.90849160.jpg'),
(5, '623f093580da15.05170502.jpg', 'assets/images/customer_temp_storage/623f093580da15.05170502.jpg'),
(6, '625c2bbd7d5a45.27292292.jpg', 'assets/images/customer_temp_storage/625c2bbd7d5a45.27292292.jpg'),
(7, '625c32dca30981.03970320.jpg', 'assets/images/customer_temp_storage/625c32dca30981.03970320.jpg'),
(8, '625c33dd981f86.34213442.jpeg', 'assets/images/customer_temp_storage/625c33dd981f86.34213442.jpeg'),
(9, '625c34ab43aad6.03343548.jpg', 'assets/images/customer_temp_storage/625c34ab43aad6.03343548.jpg'),
(10, '625c3509943bd9.72472785.jpg', 'assets/images/customer_temp_storage/625c3509943bd9.72472785.jpg'),
(11, '625c48895db850.49661532.jpg', 'assets/images/customer_temp_storage/625c48895db850.49661532.jpg'),
(12, '625cd4acaf8775.55729417.jpg', 'assets/images/customer_temp_storage/625cd4acaf8775.55729417.jpg'),
(13, '625ce1ab18c0e0.50106619.jpg', 'assets/images/customer_temp_storage/625ce1ab18c0e0.50106619.jpg'),
(14, '625ce29c110484.80606372.jpg', 'assets/images/customer_temp_storage/625ce29c110484.80606372.jpg'),
(15, '625ce339446625.97506603.jpg', 'assets/images/customer_temp_storage/625ce339446625.97506603.jpg'),
(16, '625cf15f729c39.45450269.jpg', 'assets/images/customer_temp_storage/625cf15f729c39.45450269.jpg'),
(17, '625cf3a460def7.69215039.jpg', 'assets/images/customer_temp_storage/625cf3a460def7.69215039.jpg'),
(18, '625cf44e5791a7.76323162.jpg', 'assets/images/customer_temp_storage/625cf44e5791a7.76323162.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` mediumint(8) UNSIGNED ZEROFILL NOT NULL,
  `customer_id` mediumint(8) UNSIGNED ZEROFILL NOT NULL,
  `receiver_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `shipping_address` varchar(50) NOT NULL,
  `shipping_city` varchar(50) NOT NULL,
  `ship_postal_code` varchar(50) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `shipping_fee` decimal(7,2) NOT NULL,
  `shipping_method` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `order_status` tinyint(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `paid_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `shipped_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `receiver_name`, `email`, `shipping_address`, `shipping_city`, `ship_postal_code`, `contact_number`, `shipping_fee`, `shipping_method`, `message`, `order_status`, `order_date`, `paid_date`, `shipped_date`) VALUES
(00000025, 00000043, 'Keano Rae Sevilla', 'renewalmaster4@gmail.com', 'h51 canelar', 'Zamboanga, Region IX', '7000', '09123456789', '105.00', 'JRS - Express', '1\r\n2\r\n3\r\n4', 6, '2022-04-17 15:25:09', '2022-04-17 17:17:10', '2022-04-17 17:17:10'),
(00000030, 00000043, 'Keano Rae Sevilla', 'renewalmaster4@gmail.com', 'd-51 canelar', 'Zamboanga, Region XIII', '7000', '09123456789', '105.00', 'JRS - Express', 'test', 2, '2022-04-17 17:04:21', '2022-04-17 17:04:56', '2022-04-17 17:04:56'),
(00000031, 00000043, 'Keano Rae Sevilla', 'renewalmaster4@gmail.com', 'ddd-53 canelar', 'Zamboanga, Region XII', '7000', '09123456789', '105.00', 'JRS - Express', 'test\r\ntest 1', 6, '2022-04-18 03:02:30', '2022-04-18 03:48:34', '2022-04-18 03:48:34'),
(00000032, 00000043, 'Keano Rae Sevilla', 'renewalmaster4@gmail.com', 'd-51 canelar', 'Zamboanga, Region XII', '7000', '09123456789', '105.00', 'JRS - Express', 'test 123', 6, '2022-04-18 03:57:44', '2022-04-18 04:05:18', '2022-04-18 04:05:18'),
(00000033, 00000043, 'Keano Rae Sevilla', 'renewalmaster4@gmail.com', 'd-52 canelar', 'Zamboanga, Region XIII', '7000', '09123456789', '105.00', 'JRS - Express', '', 1, '2022-04-18 04:01:42', NULL, NULL),
(00000034, 00000043, 'Keano Rae Sevilla', 'renewalmaster4@gmail.com', 'd-52 canelar', 'Zamboanga, Region XI', '7000', '09123456789', '105.00', 'JRS - Express', 'test', 1, '2022-04-18 04:04:19', NULL, NULL),
(00000035, 00000043, 'Keano Rae Sevilla', 'renewalmaster4@gmail.com', 'd-51 canelar', 'Zamboanga, Region XI', '7000', '09123456789', '105.00', 'JRS - Express', 'Sample message', 1, '2022-04-18 05:05:27', NULL, NULL),
(00000036, 00000043, 'Keano Rae Sevilla', 'renewalmaster4@gmail.com', 'd-51 canelar', 'Zamboanga, Region XII', '7000', '09123456789', '105.00', 'JRS - Express', 'Sample message\r\nSample message', 2, '2022-04-18 05:14:59', '2022-04-18 05:15:37', '2022-04-18 05:15:37'),
(00000037, 00000043, 'Keano Rae Sevilla', 'renewalmaster4@gmail.com', 'd-51 canelar', 'Zamboanga, Region XIII', '7000', '09123456789', '105.00', 'JRS - Express', 'sample message 123', 6, '2022-04-18 05:17:29', '2022-04-18 05:18:54', '2022-04-18 05:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` mediumint(8) UNSIGNED ZEROFILL NOT NULL,
  `order_id` mediumint(8) UNSIGNED ZEROFILL NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT 0,
  `product_price` decimal(7,2) NOT NULL,
  `add_ons` decimal(7,2) NOT NULL DEFAULT 0.00,
  `add_ons_details` varchar(200) NOT NULL,
  `uploaded_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `product_price`, `add_ons`, `add_ons_details`, `uploaded_image`) VALUES
(00000062, 00000025, 41, 1, '420.00', '0.00', '', 'assets/images/customer-uploads/cartoon-art/625c2bbd7d5a45.27292292.jpg'),
(00000067, 00000030, 41, 1, '480.00', '0.00', '', 'assets/images/customer-uploads/cartoon-art/625c48895db850.49661532.jpg'),
(00000068, 00000031, 41, 1, '420.00', '30.00', 'Background/Dedication', 'assets/images/customer-uploads/cartoon-art/625cd4acaf8775.55729417.jpg'),
(00000069, 00000032, 41, 1, '420.00', '30.00', 'Character', 'assets/images/customer-uploads/cartoon-art/625ce1ab18c0e0.50106619.jpg'),
(00000070, 00000033, 41, 1, '420.00', '30.00', 'Character', 'assets/images/customer-uploads/cartoon-art/625ce29c110484.80606372.jpg'),
(00000071, 00000034, 42, 1, '390.00', '0.00', '', 'assets/images/customer-uploads/vector-art/625ce339446625.97506603.jpg'),
(00000072, 00000035, 40, 1, '350.00', '30.00', 'Character', 'assets/images/customer-uploads/anime-art/625cf15f729c39.45450269.jpg'),
(00000073, 00000036, 41, 1, '420.00', '30.00', 'Character', 'assets/images/customer-uploads/cartoon-art/625cf3a460def7.69215039.jpg'),
(00000074, 00000037, 41, 1, '480.00', '0.00', '', 'assets/images/customer-uploads/cartoon-art/625cf44e5791a7.76323162.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Confirmed'),
(3, 'Cancelled'),
(4, 'To ship'),
(5, 'Completed'),
(6, 'On Process');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` mediumint(8) UNSIGNED ZEROFILL NOT NULL,
  `customer_id` mediumint(8) UNSIGNED ZEROFILL NOT NULL,
  `order_details_id` mediumint(8) UNSIGNED ZEROFILL NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `receipt_status` varchar(50) NOT NULL DEFAULT 'unverified',
  `uploaded_receipt` varchar(255) DEFAULT NULL,
  `total_amount` decimal(7,2) NOT NULL,
  `payment_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `customer_id`, `order_details_id`, `payment_type`, `receipt_status`, `uploaded_receipt`, `total_amount`, `payment_date`) VALUES
(00000020, 00000043, 00000062, 'M Lhuillier Padala', 'verified', 'assets/images/customer-uploads/receipts/625c47f7e56885.55028322.jpg', '420.00', '2022-04-18 04:07:09'),
(00000025, 00000043, 00000067, 'Gcash', 'unverified', NULL, '480.00', NULL),
(00000026, 00000043, 00000068, 'M Lhuillier Padala', 'verified', 'assets/images/customer-uploads/receipts/625cd5415d43e6.76001892.jpg', '450.00', '2022-04-18 04:07:09'),
(00000027, 00000043, 00000069, 'M Lhuillier Padala', 'verified', 'assets/images/customer-uploads/receipts/625ce35f778752.97500146.jpg', '450.00', '2022-04-18 04:05:18'),
(00000028, 00000043, 00000070, 'M Lhuillier Padala', 'unverified', NULL, '450.00', NULL),
(00000029, 00000043, 00000071, 'M Lhuillier Padala', 'unverified', NULL, '390.00', NULL),
(00000030, 00000043, 00000072, 'M Lhuillier Padala', 'unverified', NULL, '380.00', NULL),
(00000031, 00000043, 00000073, 'Cebuana Lhuillier', 'unverified', NULL, '450.00', NULL),
(00000032, 00000043, 00000074, 'M Lhuillier Padala', 'verified', 'assets/images/customer-uploads/receipts/625cf4a17ec091.40225332.jpg', '480.00', '2022-04-18 05:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_cover` varchar(50) NOT NULL,
  `product_cover_path` varchar(255) NOT NULL,
  `product_details` varchar(255) NOT NULL,
  `products_rating` varchar(50) NOT NULL,
  `1ch_price` decimal(7,2) NOT NULL,
  `2ch_price` decimal(7,2) NOT NULL,
  `add_char` decimal(7,2) NOT NULL,
  `add_dedication` decimal(7,2) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_cover`, `product_cover_path`, `product_details`, `products_rating`, `1ch_price`, `2ch_price`, `add_char`, `add_dedication`, `category`) VALUES
(40, 'Anime Art', 'hp-anime.png', 'assets/images/admin-uploads/anime-art/cover/hp-anime.png', 'Glass size:                        6x6\r\nMaterial:                          Acrylic Glass\r\nMedium:                          Acrylic Paint', '', '350.00', '480.00', '30.00', '30.00', 'glass painting'),
(41, 'Cartoon Art', 'hp-cartoon.png', 'assets/images/admin-uploads/cartoon-art/cover/hp-cartoon.png', 'Glass size:                        6x6\r\nMaterial:                          Acrylic Glass\r\nMedium:                          Acrylic Paint', '', '420.00', '480.00', '30.00', '30.00', 'glass painting'),
(42, 'Vector Art', 'hp-vector.png', 'assets/images/admin-uploads/vector-art/cover/hp-vector.png', 'Glass size:                        6x6\r\nMaterial:                          Acrylic Glass\r\nMedium:                          Acrylic Paint', '', '390.00', '420.00', '30.00', '30.00', 'glass painting');

-- --------------------------------------------------------

--
-- Table structure for table `product_carousel`
--

CREATE TABLE `product_carousel` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `carousel_image` varchar(255) NOT NULL,
  `carousel_image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_carousel`
--

INSERT INTO `product_carousel` (`id`, `product_id`, `carousel_image`, `carousel_image_path`) VALUES
(167, 40, 'anime-art1.jpg', 'assets/images/admin-uploads/anime-art/anime-art1.jpg'),
(168, 40, 'anime-art2.jpg', 'assets/images/admin-uploads/anime-art/anime-art2.jpg'),
(169, 40, 'anime-art3.jpg', 'assets/images/admin-uploads/anime-art/anime-art3.jpg'),
(170, 40, 'anime-art4.jpg', 'assets/images/admin-uploads/anime-art/anime-art4.jpg'),
(171, 40, 'anime-art5.jpg', 'assets/images/admin-uploads/anime-art/anime-art5.jpg'),
(172, 40, 'anime-art6.jpg', 'assets/images/admin-uploads/anime-art/anime-art6.jpg'),
(173, 40, 'anime-art7.jpg', 'assets/images/admin-uploads/anime-art/anime-art7.jpg'),
(174, 40, 'anime-art8.jpg', 'assets/images/admin-uploads/anime-art/anime-art8.jpg'),
(175, 40, 'anime-art9.jpg', 'assets/images/admin-uploads/anime-art/anime-art9.jpg'),
(176, 40, 'anime-art10.jpg', 'assets/images/admin-uploads/anime-art/anime-art10.jpg'),
(177, 41, 'cartoon-art1.jpg', 'assets/images/admin-uploads/cartoon-art/cartoon-art1.jpg'),
(178, 41, 'cartoon-art2.jpg', 'assets/images/admin-uploads/cartoon-art/cartoon-art2.jpg'),
(179, 41, 'cartoon-art3.jpg', 'assets/images/admin-uploads/cartoon-art/cartoon-art3.jpg'),
(180, 41, 'cartoon-art4.jpg', 'assets/images/admin-uploads/cartoon-art/cartoon-art4.jpg'),
(181, 41, 'cartoon-art5.jpg', 'assets/images/admin-uploads/cartoon-art/cartoon-art5.jpg'),
(182, 41, 'cartoon-art6.jpg', 'assets/images/admin-uploads/cartoon-art/cartoon-art6.jpg'),
(183, 42, 'vector-art1.jpg', 'assets/images/admin-uploads/vector-art/vector-art1.jpg'),
(184, 42, 'vector-art2.jpg', 'assets/images/admin-uploads/vector-art/vector-art2.jpg'),
(185, 42, 'vector-art3.jpg', 'assets/images/admin-uploads/vector-art/vector-art3.jpg'),
(186, 42, 'vector-art4.jpg', 'assets/images/admin-uploads/vector-art/vector-art4.jpg'),
(187, 42, 'vector-art5.jpg', 'assets/images/admin-uploads/vector-art/vector-art5.jpg'),
(188, 42, 'vector-art6.jpg', 'assets/images/admin-uploads/vector-art/vector-art6.jpg'),
(189, 42, 'vector-art7.jpg', 'assets/images/admin-uploads/vector-art/vector-art7.jpg'),
(190, 42, 'vector-art8.jpg', 'assets/images/admin-uploads/vector-art/vector-art8.jpg'),
(191, 42, 'vector-art9.jpg', 'assets/images/admin-uploads/vector-art/vector-art9.jpg'),
(192, 42, 'vector-art10.jpg', 'assets/images/admin-uploads/vector-art/vector-art10.jpg'),
(193, 42, 'vector-art11.jpg', 'assets/images/admin-uploads/vector-art/vector-art11.jpg'),
(194, 42, 'vector-art12.jpg', 'assets/images/admin-uploads/vector-art/vector-art12.jpg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `totalconfirmedorders`
-- (See below for the actual view)
--
CREATE TABLE `totalconfirmedorders` (
`confirmed_orders` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `totalpendingorders`
-- (See below for the actual view)
--
CREATE TABLE `totalpendingorders` (
`pending_orders` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `tracking_details`
--

CREATE TABLE `tracking_details` (
  `id` int(11) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_details_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_details_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_status`
--

CREATE TABLE `transaction_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_status`
--

INSERT INTO `transaction_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Confirmed'),
(3, 'Canceled');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` mediumint(8) UNSIGNED ZEROFILL NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone_number` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `verify_key` varchar(255) NOT NULL,
  `verify_status` tinyint(1) NOT NULL DEFAULT 0,
  `verified_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `first_name`, `last_name`, `email`, `phone_number`, `role`, `verify_key`, `verify_status`, `verified_at`, `created_at`, `modified_at`) VALUES
(00000001, 'admin', '$2y$10$geVWFFRZP6LcktOsmo1WleUwKE6JMJEvP2wVTTugc06zm0wwAcW36', 'admin', 'admin', NULL, '', 'admin', '', 0, NULL, '2022-03-21 14:54:16', '2022-03-21 14:55:18'),
(00000043, 'user1', '$2y$10$WQOY7GYmlFHNLxcFevyqDOO1Li2aRCMVcObeL8udPnI0Fc4lPBFSO', 'Keano Rae', 'Sevilla', 'renewalmaster4@gmail.com', '09123456789', 'customer', '251946f23567d3841e2e89666f49dfa586b16ac4', 1, '2022-03-20 16:04:09', '2022-03-20 16:03:36', '2022-03-20 16:04:09'),
(00000088, 'user333', '$2y$10$z1ExfeiUxT0xswO6Izcd2.oAr3vtivBQUdq7Ne9BbmatbSO.rEF36', 'Keano Rae', 'Sevilla', 'sevillakeano@yahoo.com', '09123456789', 'customer', '1ae565e0dce37b7e8eeae39a19cbb9885cef15a4', 0, NULL, '2022-03-21 10:02:37', '2022-03-21 10:02:37'),
(00000091, 'staff', '$2y$10$ea/bfwPtsmXQu951/GXnhezw0zuTnU4eYayh2qEa.YIv8uHrK2S4.', 'staff', 'staff', NULL, '', 'staff', '', 0, NULL, '2022-03-21 14:58:45', '2022-03-21 14:58:45'),
(00000092, 'admin2', '$2y$10$0fWoOruVk6HAVYQcKKe/b.KCWgW2HTPrBOnkCsackJgzIBEN1wiI2', 'admin', 'admin', NULL, '', 'admin', '', 0, NULL, '2022-03-21 14:58:57', '2022-03-21 14:58:57'),
(00000094, 'staff2', '$2y$10$uhDsMB1EAeBf/BqNkKiJBOqjeiowPcx9hn9HCPvf9zLg/wY0TRMQ6', 'staff fname', 'staff lname', NULL, '', 'staff', '', 0, NULL, '2022-03-22 05:37:10', '2022-03-22 05:37:10'),
(00000097, 'staff3', '$2y$10$f67Kt.uPVcG7zI/xuaQ44u1nbgkTNRUIunvKFsV6MHZT0pYMEnK32', 'staff fname', 'staff lname', NULL, '', 'staff', '', 0, NULL, '2022-03-22 06:25:08', '2022-03-22 06:25:08'),
(00000098, 'user4', '$2y$10$fLh/VxhoR5W7SCqKDwJFzuzUWtsZBUg59Lx9HTz1yodlP/JS3Uui2', 'Keano Rae', 'Sevilla', 'sevillakeano15@yahoo.com', '09123456789', 'customer', '7bfee7fe59f574280e0d40bd76f2184308e0432b', 0, NULL, '2022-03-22 06:34:04', '2022-03-22 06:34:04'),
(00000105, 'user7', '$2y$10$izahUzRIAPJhG2gjgrbdd.byfb3G23kq8VBK1SToMM.7d8Mgv4rLm', 'Keano Rae', 'Sevilla VII', 'lc201700269@wmsu.edu.ph', '09123456789', 'customer', '185de9f6f875b4950c3b8fb71517cef341e15768', 1, '2022-04-27 15:07:07', '2022-04-27 15:06:41', '2022-04-27 15:07:07');

-- --------------------------------------------------------

--
-- Structure for view `totalconfirmedorders`
--
DROP TABLE IF EXISTS `totalconfirmedorders`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `totalconfirmedorders`  AS SELECT count(`transaction`.`status`) AS `confirmed_orders` FROM `transaction` WHERE `transaction`.`status` = 22  ;

-- --------------------------------------------------------

--
-- Structure for view `totalpendingorders`
--
DROP TABLE IF EXISTS `totalpendingorders`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `totalpendingorders`  AS SELECT count(`transaction`.`status`) AS `pending_orders` FROM `transaction` WHERE `transaction`.`status` = 11  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_accID` (`customer_id`),
  ADD KEY `fk_cart_pID` (`product_id`);

--
-- Indexes for table `customer_uploads`
--
ALTER TABLE `customer_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_customerID` (`customer_id`),
  ADD KEY `fk_orders_statusID` (`order_status`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order` (`order_id`) USING BTREE,
  ADD KEY `fk_order_details_productID` (`product_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_payment_customerID` (`customer_id`),
  ADD KEY `fk_payment_orderdetailsID` (`order_details_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- Indexes for table `product_carousel`
--
ALTER TABLE `product_carousel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_productID` (`product_id`);

--
-- Indexes for table `tracking_details`
--
ALTER TABLE `tracking_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tracking_details_customerID` (`customer_id`),
  ADD KEY `fk_tracking_details_order_detailsID` (`order_details_id`),
  ADD KEY `fk_tracking_details_status` (`status`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_transaction_customerID` (`customer_id`),
  ADD KEY `fk_transaction_orderdetailsID` (`order_details_id`) USING BTREE,
  ADD KEY `fk_transaction_paymentID` (`payment_id`),
  ADD KEY `fk_transaction_statusID` (`status`),
  ADD KEY `fk_transaction_orderID` (`order_id`);

--
-- Indexes for table `transaction_status`
--
ALTER TABLE `transaction_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `customer_uploads`
--
ALTER TABLE `customer_uploads`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` mediumint(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` mediumint(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` mediumint(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `product_carousel`
--
ALTER TABLE `product_carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `tracking_details`
--
ALTER TABLE `tracking_details`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaction_status`
--
ALTER TABLE `transaction_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` mediumint(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_customerID` FOREIGN KEY (`customer_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_order_details_orderID` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_order_details_productID` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_payment_customerID` FOREIGN KEY (`customer_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_payment_orderdetailsID` FOREIGN KEY (`order_details_id`) REFERENCES `order_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_carousel`
--
ALTER TABLE `product_carousel`
  ADD CONSTRAINT `fk_productID` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `fk_transaction_statusID` FOREIGN KEY (`status`) REFERENCES `transaction_status` (`id`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `delete1DayUnverifiedAccount` ON SCHEDULE EVERY 1 DAY STARTS '2022-03-20 23:47:28' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM user WHERE verify_status = 0 AND role = 'customer' AND TIMESTAMPDIFF(SECOND,created_at,CURRENT_TIMESTAMP) > 86400$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
