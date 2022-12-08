-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 05:48 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myride`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `created_date` datetime NOT NULL,
  `status` varchar(16) NOT NULL,
  `odometer` int(7) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `date_time`, `created_date`, `status`, `odometer`, `user_id`, `vehicle_id`, `service_id`) VALUES
(9, '2022-12-05 12:00:00', '2022-12-05 12:09:25', 'Completed', 0, 8, 1, 6),
(12, '2022-12-13 10:00:00', '2022-12-05 17:57:29', 'Canceled', 0, 8, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `discount_id` int(11) NOT NULL,
  `code` varchar(32) NOT NULL,
  `percentage` int(2) DEFAULT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `description` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`discount_id`, `code`, `percentage`, `amount`, `description`) VALUES
(1, 'WELCOME22', 15, NULL, 'Use code \"WELCOME22\" on any products to get 15% off ! Hurry Up, this won\'t last forever !');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `status` varchar(16) NOT NULL DEFAULT 'Incomplete',
  `total_price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `discount_id` int(11) DEFAULT NULL,
  `shipping_info` text DEFAULT NULL,
  `paypal_confirmation` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`paypal_confirmation`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_date`, `status`, `total_price`, `discount_id`, `shipping_info`, `paypal_confirmation`) VALUES
(2, 8, '2022-12-04 11:39:18', 'Canceled', '272.22', 1, 'Veaceslav Veaceslav\n3563 Rue Jordi Bonet\n\nQC J7H 1L7 Canada\nvlasslavic@gmail.com\n5144306090', NULL),
(3, 8, '2022-12-04 11:52:06', 'Shipped', '57.49', NULL, 'Veaceslav Veaceslav\r\n3563 Rue Jordi Bonet\r\n\r\nQC J7H 1L7 Canada\r\nvlasslavic@gmail.com\r\n5144306090', NULL),
(4, 8, '2022-12-04 12:01:35', 'Shipped', '81.64', 1, 'Veaceslav Veaceslav\r\n3563 Rue Jordi Bonet\r\n\r\nQC J7H 1L7 Canada\r\nvlasslavic@gmail.com\r\n5144306090', NULL),
(5, 8, '2022-12-04 12:02:48', 'Paid', '74.74', NULL, 'Veaceslav Veaceslav\r\n3563 Rue Jordi Bonet\r\n\r\nQC J7H 1L7 Canada\r\nvlasslavic@gmail.com\r\n5144306090', NULL),
(6, 8, '2022-12-04 12:05:51', 'Shipped', '91.99', NULL, 'Veaceslav Veaceslav\r\n3563 Rue Jordi Bonet\r\n\r\nQC J7H 1L7 Canada\r\nvlasslavic@gmail.com\r\n5144306090', NULL),
(7, 8, '2022-12-04 12:06:16', 'Paid', '34.50', NULL, 'Veaceslav Veaceslav\r\n3563 Rue Jordi Bonet\r\n\r\nQC J7H 1L7 Canada\r\nvlasslavic@gmail.com\r\n5144306090', NULL),
(14, 9, '2022-12-04 12:28:30', 'Canceled', '42.55', 1, 'Veaceslav Veaceslav\r\n3563 Rue Jordi Bonet\r\n\r\nQC J7H 1L7 Canada\r\nvlasslavic@gmail.com\r\n5144306090', NULL),
(15, 9, NULL, 'Incomplete', '0.00', NULL, NULL, NULL),
(16, 8, '2022-12-05 03:10:32', 'Paid', '96.30', 1, 'Veaceslav Vlas\r\n3563 Rue Jordi Bonet\r\n\r\nQC J7H 1L7 Canada\r\nvlasslavic@gmail.com\r\n5144306090', NULL),
(17, 8, '2022-12-05 03:45:58', 'Paid', '24.96', 1, 'Veaceslav Vlas\r\n3563 Rue Jordi Bonet\r\n\r\nQC J7H 1L7 Canada\r\nvlasslavic@gmail.com\r\n5144306090', NULL),
(18, 8, '2022-12-05 03:49:59', 'Paid', '52.31', 1, 'Veaceslav Vlas\r\n3563 Rue Jordi Bonet\r\n\r\nQC J7H 1L7 Canada\r\nvlasslavic@gmail.com\r\n5144306090', NULL),
(19, 8, '2022-12-05 04:33:51', 'Shipped', '52.31', 1, 'Veaceslav Vlas\r\n3563 Rue Jordi Bonet\r\n\r\nQC J7H 1L7 Canada\r\nvlasslavic@gmail.com\r\n5144306090', NULL),
(20, 8, '2022-12-05 17:03:42', 'Paid', '198.92', 1, 'Veaceslav Vlas\r\n3563 Rue Jordi Bonet\r\n\r\nQC J7H 1L7 Canada\r\nvlasslavic@gmail.com\r\n5144306090', NULL),
(21, 8, '2022-12-05 17:53:12', 'Shipped', '169.60', 1, 'Veaceslav Vlas\r\n3563 Rue Jordi Bonet\r\n\r\nQC J7H 1L7 Canada\r\nvlasslavic@gmail.com\r\n5144306090', NULL),
(22, 8, NULL, 'Incomplete', '0.00', NULL, NULL, NULL),
(24, 11, '2022-12-08 17:30:49', 'Paid', '96.30', 1, 'Veaceslav Vlas\r\n3563 Rue Jordi Bonet\r\n\r\nQC J7H 1L7 Canada\r\nvlasslavic@gmail.com\r\n5144306090', NULL),
(25, 11, '2022-12-08 17:42:42', 'Paid', '81.64', 1, 'Veaceslav Vlas\r\n3563 Rue Jordi Bonet\r\n\r\nQC J7H 1L7 Canada\r\nvlasslavic@gmail.com\r\n5144306090', NULL),
(26, 11, '2022-12-08 17:44:54', 'Paid', '81.64', 1, 'Veaceslav Vlas\r\n3563 Rue Jordi Bonet\r\n\r\nQC J7H 1L7 Canada\r\nvlasslavic@gmail.com\r\n5144306090', NULL),
(27, 11, '2022-12-08 17:46:15', 'Paid', '74.74', NULL, 'Veaceslav Vlas\r\n3563 Rue Jordi Bonet\r\n\r\nQC J7H 1L7 Canada\r\nvlasslavic@gmail.com\r\n5144306090', NULL),
(28, 11, '2022-12-08 17:47:43', 'Paid', '57.49', NULL, 'Veaceslav Vlas\r\n3563 Rue Jordi Bonet\r\n\r\nQC J7H 1L7 Canada\r\nvlasslavic@gmail.com\r\n5144306090', '{  \"id\": \"7S00772380682212G\",  \"intent\": \"CAPTURE\",  \"status\": \"COMPLETED\",  \"purchase_units\": [    {      \"reference_id\": \"default\",      \"amount\": {        \"currency_code\": \"CAD\",        \"value\": \"57.49\"      },      \"payee\": {        \"email_address\": \"barco.03-facilitator@gmail.com\",        \"merchant_id\": \"YQZCHTGHUK5P8\"      },      \"soft_descriptor\": \"PAYPAL *PYPLTEST\",      \"shipping\": {        \"name\": {          \"full_name\": \"Veaceslav Vlas\"        },        \"address\": {          \"address_line_1\": \"3563 Rue Jordi Bonet\",          \"admin_area_2\": \"Boisbriand\",          \"admin_area_1\": \"QC\",          \"postal_code\": \"J7H 1L7\",          \"country_code\": \"CA\"        }      },      \"payments\": {        \"captures\": [          {            \"id\": \"99B934976K468933R\",            \"status\": \"COMPLETED\",            \"amount\": {              \"currency_code\": \"CAD\",              \"value\": \"57.49\"            },            \"final_capture\": true,            \"seller_protection\": {              \"status\": \"ELIGIBLE\",              \"dispute_categories\": [                \"ITEM_NOT_RECEIVED\",                \"UNAUTHORIZED_TRANSACTION\"              ]            },            \"create_time\": \"2022-12-08T16:47:43Z\",            \"update_time\": \"2022-12-08T16:47:43Z\"          }        ]      }    }  ],  \"payer\": {    \"name\": {      \"given_name\": \"Veaceslav\",      \"surname\": \"Vlas\"    },    \"email_address\": \"vlasslavic@gmail.com\",    \"payer_id\": \"G5F7DJ9VJSKRG\",    \"phone\": {      \"phone_number\": {        \"national_number\": \"5144306090\"      }    },    \"address\": {      \"address_line_1\": \"3563 Rue Jordi Bonet\",      \"admin_area_2\": \"Boisbriand\",      \"admin_area_1\": \"QC\",      \"postal_code\": \"J7H 1L7\",      \"country_code\": \"CA\"    }  },  \"create_time\": \"2022-12-08T16:47:36Z\",  \"update_time\": \"2022-12-08T16:47:43Z\",  \"links\": [    {      \"href\": \"https://api.sandbox.paypal.com/v2/checkout/orders/7S00772380682212G\",      \"rel\": \"self\",      \"method\": \"GET\"    }  ]}'),
(29, 11, NULL, 'Incomplete', '0.00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(32) NOT NULL,
  `profile_id` int(11) DEFAULT NULL,
  `quantity` int(2) NOT NULL,
  `ship_date` datetime DEFAULT NULL,
  `sell_price` decimal(6,2) NOT NULL,
  `cost_price` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `order_id`, `product_id`, `product_name`, `profile_id`, `quantity`, `ship_date`, `sell_price`, `cost_price`) VALUES
(2, 2, 17, 'Storage Bag M-Performance', 58, 2, NULL, '74.99', '8.00'),
(5, 2, 19, 'Leather Key Chain M-Power', 58, 2, NULL, '29.99', '6.50'),
(7, 2, 18, 'Hanging Tissue Bag M-Power', 58, 1, '2022-12-04 23:53:18', '44.99', '8.00'),
(9, 3, 15, 'Carbon Fiber Seat Belt Cover', 58, 1, '2022-12-04 23:56:14', '29.99', '7.00'),
(14, 4, 16, 'Card Holder M-Performance', 58, 1, '2022-12-04 23:54:04', '59.99', '7.00'),
(17, 5, 18, 'Hanging Tissue Bag M-Power', 58, 1, NULL, '44.99', '8.00'),
(18, 6, 16, 'Card Holder M-Performance', 58, 1, '2022-12-04 23:56:50', '59.99', '7.00'),
(19, 7, 2, 'Test Description', 57, 1, NULL, '10.00', '4.00'),
(23, 9, 17, 'Storage Bag M-Performance', 58, 1, NULL, '74.99', '8.00'),
(27, 12, 19, 'Leather Key Chain M-Power', 58, 1, NULL, '29.99', '6.50'),
(29, 14, 2, 'Test Description', 57, 2, NULL, '10.00', '4.00'),
(30, 16, 17, 'Storage Bag M-Performance', 58, 1, NULL, '74.99', '8.00'),
(31, 17, 12, '13', 57, 1, NULL, '2.00', '2.00'),
(33, 18, 15, 'Carbon Fiber Seat Belt Cover', 58, 1, NULL, '29.99', '7.00'),
(35, 19, 15, 'Carbon Fiber Seat Belt Cover', 58, 1, '2022-12-05 04:34:38', '29.99', '7.00'),
(42, 20, 16, 'Card Holder M-Performance', 58, 3, NULL, '59.99', '7.00'),
(43, 21, 17, 'Storage Bag M-Performance', 58, 2, '2022-12-05 17:54:33', '74.99', '8.00'),
(45, 24, 17, 'Storage Bag M-Performance', 58, 1, NULL, '74.99', '8.00'),
(46, 25, 16, 'Card Holder M-Performance', 58, 1, NULL, '59.99', '7.00'),
(47, 26, 16, 'Card Holder M-Performance', 58, 1, NULL, '59.99', '7.00'),
(49, 27, 18, 'Hanging Tissue Bag M-Power', 58, 1, NULL, '44.99', '8.00'),
(50, 28, 15, 'Carbon Fiber Seat Belt Cover', 58, 1, NULL, '29.99', '7.00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `product_name` varchar(32) NOT NULL,
  `description` text DEFAULT NULL,
  `image` text NOT NULL,
  `in_stock` int(4) NOT NULL,
  `sell_price` decimal(6,2) NOT NULL,
  `cost_price` decimal(6,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `profile_id`, `product_name`, `description`, `image`, `in_stock`, `sell_price`, `cost_price`) VALUES
(2, 57, 'Test Description', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem quidem modi. Nam sequi consequatur obcaecati excepturi alias magni, accusamus eius blanditiis delectus ipsam minima ea iste laborum vero?', '637c2f9d16b8f.jpg', 1, '10.00', '4.00'),
(3, 57, 'This is the title Description', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem quidem modi. Nam sequi consequatur obcaecati excepturi alias magni, accusamus eius blanditiis delectus ipsam minima ea iste laborum vero?', '637c33aeec036.jpg', 45, '54.00', '4.10'),
(8, 57, 'Test Description', '1', '', 2, '2.00', '2.00'),
(9, 57, 'Test ', 'aegfaegfe', '637d2997d585b.jpg', 5, '212.00', '21.00'),
(10, 57, '13', 'sgasr', '637d29b875eaf.jpg', 12, '13.00', '12.00'),
(11, 57, 'VW', 'aefaef', '637d2a74ef6fd.jpg', 1, '2500.00', '300.00'),
(12, 57, '13', '23t', '', 2, '2.00', '2.00'),
(13, 57, '234', '234', '', 234, '234.00', '234.00'),
(15, 58, 'Carbon Fiber Seat Belt Cover', 'Car Styling Decoration Ring Steering Wheel Circle Sticker For M3 M5 E36 E46 E60 E90 E92 BMW X1 F48 X3 X5 X6', '637d60ad01fdd.jpg', 98, '29.99', '7.00'),
(16, 58, 'Card Holder M-Performance', 'Leather Car Driving Documents Case Credit Card Holder For BMW E46 E39 E90 E91 E60 E36 E92 E30 E34', '637d623723848.jpg', 199, '59.99', '7.00'),
(17, 58, 'Storage Bag M-Performance', 'This Portable Smart Car Travel Storage bag made of high quality durable waterproof oxford to secure your gadgets in place and deliver a quick access whenever you want, a perfect case protects your Car key, Driving license, USB Data, Earphone Wire ,Bank card', '637d6508b512b.jpg', 49, '74.99', '8.00'),
(18, 58, 'Hanging Tissue Bag M-Power', 'Car Seat Back Hanging Tissue Bag Storge Box Decorate Accessories For BMW Power Performance M3 M5 X1 X3 X5 X6 E46 E39 E36', '637d6666de670.jpg', 30, '44.99', '8.00'),
(19, 58, 'Leather Key Chain M-Power', 'Luxury Keychain Car Key Chain Rings Metal Leather for BMW E34 E36 E60 E90 E46 E39 E70 F10 F20 F30 M X1 X3 X4 X5 X6 X7', '637d68afdee72.jpg', 19, '29.99', '6.50'),
(21, 58, 'Test', 'dh', '638d57d5d2ab7.jpg', 22, '33.00', '12.00');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `business_name` varchar(32) NOT NULL,
  `description` text DEFAULT NULL,
  `picture` varchar(20) DEFAULT NULL,
  `phone` bigint(12) NOT NULL,
  `email` varchar(72) DEFAULT NULL,
  `address` text NOT NULL,
  `isEnabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `seller_id`, `business_name`, `description`, `picture`, `phone`, `email`, `address`, `isEnabled`) VALUES
(57, 1, 'Bob\'s Garage', 'aefj71', '638e0ff636eef.jpg', 5144306091, 'vlasslavic@gmail.com1', '3561 Rue Jordi-Bonet, Boisbriand, QC J7E 1H5, Canada', 1),
(58, 4, 'BMW Laval', 'Desservant la région de Laval, BMW Laval, situé au 2450 Chomedey à Laval, QC, est un concessionnaire de premier plan qui vous offre des voitures neuves et d\'occasion Bmw . Notre personnel des ventes dévoué et nos techniciens chevronnés sont ici pour rendre votre expérience d\'achat d\'un véhicule agréable, facile et financièrement avantageuse.', '637d5cc7a24ba.jpg', 8774704990, 'bmwlaval@mail.com', '2450 Boulevard Chomedey, Laval, QC, Canada', 1),
(59, 5, 'Bob\'s Garage', 'aef', '638de6deaf8f4.jpg', 5432312341, 'a@h.m', 'Global Affairs Canada, 125 Sussex Drive, (Old) Ottawa, ON K1A 0G2, Canada', 1);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `seller_id` int(11) NOT NULL,
  `email` varchar(72) NOT NULL,
  `password_hash` varchar(72) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`seller_id`, `email`, `password_hash`) VALUES
(1, 'test@mail.com', '$2y$10$JB6l/r.MybITPZnEb8i9qeYgXD/Fq.gneC4tG6xStovjkhUQn//DO'),
(4, 'bmw@mail.com', '$2y$10$pzYVGbOdZWw94U5HSm50p.SVQgK4S9Wng9XjKgdWW9GI4LLIG70nu'),
(5, 'vlasslavic1@gmail.com', '$2y$10$vwnRfl.5.JkeYLiG8wv2/.eReOh4le67LeH8VOYPSetSFh3384TLe');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `service_price` decimal(6,2) NOT NULL,
  `duration` time NOT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_name`, `service_price`, `duration`, `profile_id`) VALUES
(4, 'Tire Change', '65.00', '01:30:00', 57),
(5, 'Installer et balancer pneus', '120.00', '01:30:00', 58),
(6, 'Oil Change', '75.00', '01:00:00', 57);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(72) NOT NULL,
  `password_hash` varchar(72) NOT NULL,
  `first_name` varchar(16) NOT NULL,
  `last_name` varchar(16) NOT NULL,
  `address` text DEFAULT NULL,
  `picture` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password_hash`, `first_name`, `last_name`, `address`, `picture`) VALUES
(8, 'user@mail.com', '$2y$10$5VW8wKBMPMqHOE51YeDnAObPc8/vD.BpAEOs8iFIUnLDdStIWXvl2', 'Veaceslav', 'Vlas', '12 Rue Elmwood, Sherbrooke, QC, Canada', NULL),
(9, 'user2@mail.com', '$2y$10$KvDmBmcSX4eeHKZ8DnJQ1O8g9vsJkJJe3Xfvs0gtRJABWmAERQXFO', 'Veaceslav', 'Vlas', '3563 Rue Jordi-Bonet, Boisbriand, QC J7E 1H5, Canada', NULL),
(10, 'vlasslavic@gmail.com', '$2y$10$J.nfj/Pp26j286dLCT72veXgCz5Z1uIiVI1OrWpIuP.EPklswv4vu', 'Veaceslav', 'Vlas', '3563 Rue Jordi-Bonet, Boisbriand, QC J7E 1H5, Canada', NULL),
(11, '12@mail.com', '$2y$10$xiH7s2QeReDUVNvOhlfm/.rmT6FGOtLFwWuqa4w91Mk9G9Lo.aJQ2', 'vla', '12', 'Road 123, St. Marys, ON, Canada', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `year` int(4) NOT NULL,
  `make` varchar(16) NOT NULL,
  `model` varchar(16) NOT NULL,
  `color` varchar(32) DEFAULT NULL,
  `vin` varchar(17) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_id`, `user_id`, `year`, `make`, `model`, `color`, `vin`) VALUES
(1, 8, 2011, 'Lexus', 'IS350 AWD', 'Pearl Gray', 'J3VWSF29M0YM03848'),
(3, 8, 2020, 'BMW', 'M235i', 'Obsidian Black', ''),
(5, 8, 2013, 'BMW', '325', '', ''),
(6, 11, 2013, 'Kia', 'Rio', 'Red', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`discount_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `FK product to profile` (`profile_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD UNIQUE KEY `seller_id` (`seller_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`seller_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `FK service to profile` (`profile_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK product to profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `FK Profile to Seller` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`seller_id`) ON UPDATE NO ACTION;

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `FK service to profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
