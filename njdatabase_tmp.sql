-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2022 at 03:27 PM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addProduct` (IN `productname` VARCHAR(50), IN `price` INT(11), IN `category` VARCHAR(100))   BEGIN
    INSERT INTO product (product_name, product_price, category) VALUES (productname, price, category);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addUser` (`username` VARCHAR(50), `password` VARCHAR(50), `lastname` VARCHAR(50), `firstname` VARCHAR(50), `email` VARCHAR(50))   BEGIN
    INSERT INTO customer (Username, Password, Last_Name, First_Name, Email)
    VALUES (username,password,lastname,firstname,email);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteCart` (`cartid` INT(11))   BEGIN
    DELETE FROM cart WHERE id = cartid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateOrderStatus` (`status` VARCHAR(50), `id` INT(11))   BEGIN
    UPDATE transaction SET order_status = status WHERE id = id;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `totalPayment` (`orderdetailsID` INT) RETURNS DECIMAL(10,2)  BEGIN
    DECLARE total Decimal(7,4);
    SELECT (quantity*product_price) + add_ons INTO total FROM order_details WHERE id = orderdetailsID;
    RETURN total;
END$$

DELIMITER ;

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
(13, 7, 2, 'Anime Art', '', '480.00', 1, 0, '480.00'),
(14, 7, 3, 'Cartoon Art', '', '420.00', 1, 0, '420.00'),
(15, 7, 1, 'Vector Art', '', '390.00', 1, 0, '390.00'),
(16, 9, 2, 'Anime Art', '', '480.00', 1, 0, '480.00'),
(17, 9, 3, 'Cartoon Art', '', '420.00', 2, 0, '840.00'),
(18, 8, 2, 'Anime Art', '', '480.00', 1, 0, '480.00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(1) NOT NULL,
  `ship_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `shipping_address` varchar(100) NOT NULL,
  `shipping_city` varchar(100) NOT NULL,
  `ship_postal_code` varchar(50) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `shipping_fee` int(11) DEFAULT 0,
  `shipping_method` varchar(100) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `order_status` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `paid_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `shipped_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `ship_name`, `email`, `shipping_address`, `shipping_city`, `ship_postal_code`, `contact_number`, `shipping_fee`, `shipping_method`, `payment_type`, `order_status`, `order_date`, `paid_date`, `shipped_date`) VALUES
(79, 7, 'Keano Rae Sevilla', 'user2@gmail.com', 'd-51 canelar', 'zamboanga Region 9', '7000', '09123456789', 0, 'M Lhuillier Padala', '', 7, '2022-03-06 14:23:42', '2022-03-07 12:54:15', '2022-03-07 12:54:15'),
(80, 7, 'Keano Rae Sevilla', 'user2@gmail.com', 'd-51 canelar', 'zamboanga Region 9', '7000', '09123456789', 0, 'M Lhuillier Padala', '', 7, '2022-03-06 14:25:03', '2022-03-07 12:57:16', '2022-03-07 12:57:16'),
(81, 8, 'Keano Rae II Sevilla', 'user2@gmail.com', 'd-51 canelar moret', 'zamboanga Region 9', '7000', '09123456789', 0, 'M Lhuillier Padala', '', 7, '2022-03-06 14:26:29', '2022-03-07 13:02:19', '2022-03-07 13:02:19'),
(82, 8, 'Keano Rae II Sevilla', 'user2@gmail.com', 'd-52 canelar moret', 'zamboanga Region 9', '7000', '09123456789', 0, 'JRS - Express', '', 3, '2022-03-06 14:28:18', NULL, NULL),
(83, 9, 'Keano Rae Sevilla', 'user2@gmail.com', 'd-51 canelar', 'zamboanga Region 9', '7000', '09123456789', 0, 'M Lhuillier Padala', '', 3, '2022-03-07 10:07:06', NULL, NULL),
(84, 9, 'Keano Rae Sevilla', 'user2@gmail.com', 'd-51 canelar', 'zamboanga Region 9', '7000', '09123456789', 0, 'JRS - Express', '', 3, '2022-03-07 10:08:04', NULL, NULL),
(85, 9, 'Keano Rae II Sevilla', 'sevilla@yahoo.com', 'd-51 canelar', 'zamboanga Region 9', '7000', '09123456789', 0, 'JRS - Express', '', 3, '2022-03-07 10:08:28', NULL, NULL),
(93, 23, 'Keano Rae Sevilla', 'user2@gmail.com', 'd-52 canelar', 'zamboanga Region 9', '7000', '09123456789', 0, 'JRS - Express', '', 3, '2022-03-07 10:19:38', NULL, NULL),
(94, 23, 'Keano Rae Sevilla', 'user2@gmail.com', 'd-52 canelar', 'zamboanga Region 9', '7000', '09123456789', 0, 'JRS - Express', '', 3, '2022-03-07 10:19:54', NULL, NULL),
(95, 23, 'Keano Rae Sevilla', 'user2@gmail.com', 'd-52 canelar moret', 'zamboanga Region 9', '7000', '09123456789', 0, 'M Lhuillier Padala', '', 3, '2022-03-07 10:20:15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT 0,
  `product_price` decimal(7,2) NOT NULL,
  `add_ons` decimal(7,2) NOT NULL DEFAULT 0.00,
  `add_ons_details` varchar(200) NOT NULL,
  `uploaded_image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `product_price`, `add_ons`, `add_ons_details`, `uploaded_image`) VALUES
(11, 79, 2, 1, '480.00', '0.00', '', ''),
(12, 80, 2, 1, '480.00', '0.00', '', ''),
(13, 81, 3, 1, '420.00', '0.00', '', ''),
(14, 82, 1, 1, '390.00', '0.00', '', ''),
(15, 83, 3, 1, '420.00', '0.00', '', ''),
(16, 84, 1, 1, '390.00', '0.00', '', ''),
(17, 85, 2, 1, '480.00', '0.00', '', ''),
(18, 93, 2, 1, '350.00', '0.00', '', ''),
(19, 94, 3, 1, '420.00', '0.00', '', ''),
(20, 95, 1, 1, '420.00', '0.00', '', '');

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
(1, 'Completed'),
(2, 'Canceled'),
(3, 'Pending'),
(4, 'Processing'),
(5, 'On hold'),
(6, 'Refunded'),
(7, 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_amount` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `customer_id`, `payment_type`, `payment_date`, `total_amount`) VALUES
(6, 7, 'Cebuana Lhuillier', '2022-02-27 14:11:02', '0.00'),
(7, 7, 'M Lhuillier Padala', '2022-02-27 14:12:49', '0.00'),
(8, 9, 'M Lhuillier Padala', '2022-03-01 04:46:08', '0.00'),
(9, 7, 'Cebuana Lhuillier', '2022-03-01 08:39:51', '0.00'),
(10, 8, 'M Lhuillier Padala', '2022-03-06 10:30:12', '0.00'),
(11, 8, 'M Lhuillier Padala', '2022-03-06 10:48:49', '0.00'),
(12, 8, 'M Lhuillier Padala', '2022-03-06 10:51:50', '0.00'),
(13, 7, 'M Lhuillier Padala', '2022-03-06 10:58:48', '0.00'),
(14, 9, 'M Lhuillier Padala', '2022-03-07 10:07:09', '0.00'),
(15, 9, 'Gcash', '2022-03-07 10:08:07', '0.00'),
(16, 9, 'Palawan Express', '2022-03-07 10:08:29', '0.00'),
(17, 23, 'Gcash', '2022-03-07 10:19:40', '0.00'),
(18, 23, 'Cebuana Lhuillier', '2022-03-07 10:19:56', '0.00'),
(19, 23, 'Cebuana Lhuillier', '2022-03-07 10:20:17', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
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

INSERT INTO `product` (`id`, `product_name`, `products_rating`, `1ch_price`, `2ch_price`, `add_char`, `add_dedication`, `category`) VALUES
(1, 'Vector Art', '*****', '390.00', '420.00', '30.00', '30.00', 'glass painting'),
(2, 'Anime Art', '*****', '350.00', '480.00', '30.00', '30.00', 'glass painting'),
(3, 'Cartoon Art', '*****', '420.00', '480.00', '30.00', '30.00', 'glass painting');

-- --------------------------------------------------------

--
-- Stand-in structure for view `sales`
-- (See below for the actual view)
--
CREATE TABLE `sales` (
);

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
  `id` int(11) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `phone_number`, `password`, `last_name`, `first_name`, `email`, `role`, `created_at`, `modified_at`) VALUES
(6, '09123456789', 'adminpw', 'admin lname', 'admin fname', 'admin123@gmail.com', 'admin', '2022-02-13 14:19:56', '2022-02-20 15:07:23'),
(7, '09123456789', 'user1pw', 'Sevilla', 'Keano Rae', 'user1@gmail.com', 'user', '2022-02-14 02:19:20', '2022-03-06 14:12:29'),
(8, '09123456789', 'user2pw', 'Estrada', 'Melriss', 'user2@gmail.com', 'user', '2022-02-18 14:12:29', '2022-03-06 14:12:29'),
(9, '09123456789', 'user3pw', 'Gonzales', 'Jay ann', 'user3@gmail.com', 'user', '2022-02-18 15:36:53', '2022-03-06 14:12:29'),
(23, '09123456789', 'user4pw', 'Tubosa', 'Florence', 'user4@gmail.com', 'user', '2022-02-28 05:19:03', '2022-03-06 14:12:29');

-- --------------------------------------------------------

--
-- Structure for view `sales`
--
DROP TABLE IF EXISTS `sales`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sales`  AS SELECT `p`.`product_name` AS `product_name`, date_format(`o`.`order_date`,'%M') AS `Month`, year(`o`.`order_date`) AS `Year`, sum(`pm`.`total_amount`) AS `total_sales` FROM (((`product` `p` join `orders` `o`) join `payment` `pm`) join `order_details` `od` on(`p`.`id` = `od`.`product_id` and `o`.`id` = `od`.`order_id` and `pm`.`order_details_id` = `od`.`id`)) GROUP BY `p`.`product_name`, date_format(`o`.`order_date`,'%M'), year(`o`.`order_date`) ORDER BY `p`.`product_name` ASC, date_format(`o`.`order_date`,'%M') ASC, year(`o`.`order_date`) ASC  ;

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
  ADD KEY `fk_order` (`order_id`) USING BTREE;

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
  ADD KEY `fk_payment_customerID` (`customer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_name` (`product_name`);

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
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_accID` FOREIGN KEY (`customer_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_customerID` FOREIGN KEY (`customer_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orderstatus_status` FOREIGN KEY (`order_status`) REFERENCES `order_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_order_details_orderID` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_payment_customerID` FOREIGN KEY (`customer_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tracking_details`
--
ALTER TABLE `tracking_details`
  ADD CONSTRAINT `fk_tracking_details_customerID` FOREIGN KEY (`customer_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_tracking_details_order_detailsID` FOREIGN KEY (`order_details_id`) REFERENCES `order_details` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_tracking_details_status` FOREIGN KEY (`status`) REFERENCES `orders` (`order_status`) ON DELETE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `fk_orderdetailsID` FOREIGN KEY (`order_details_id`) REFERENCES `order_details` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_transaction_customerID` FOREIGN KEY (`customer_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_transaction_orderID` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_transaction_paymentID` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`id`),
  ADD CONSTRAINT `fk_transaction_statusID` FOREIGN KEY (`status`) REFERENCES `transaction_status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
