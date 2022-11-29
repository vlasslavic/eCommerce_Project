-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2022 at 02:17 AM
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
(14, 57, '222', '22', '', 2, '22.00', '22.00'),
(15, 58, 'Carbon Fiber Seat Belt Cover', 'Car Styling Decoration Ring Steering Wheel Circle Sticker For M3 M5 E36 E46 E60 E90 E92 BMW X1 F48 X3 X5 X6', '637d60ad01fdd.jpg', 98, '29.99', '7.00'),
(16, 58, 'Card Holder M-Performance', 'Leather Car Driving Documents Case Credit Card Holder For BMW E46 E39 E90 E91 E60 E36 E92 E30 E34', '637d623723848.jpg', 199, '59.99', '7.00'),
(17, 58, 'Storage Bag M-Performance', 'This Portable Smart Car Travel Storage bag made of high quality durable waterproof oxford to secure your gadgets in place and deliver a quick access whenever you want, a perfect case protects your Car key, Driving license, USB Data, Earphone Wire ,Bank card', '637d6508b512b.jpg', 49, '74.99', '8.00'),
(18, 58, 'Hanging Tissue Bag M-Power', 'Car Seat Back Hanging Tissue Bag Storge Box Decorate Accessories For BMW Power Performance M3 M5 X1 X3 X5 X6 E46 E39 E36', '637d6666de670.jpg', 30, '44.99', '8.00'),
(19, 58, 'Leather Key Chain M-Power', 'Luxury Keychain Car Key Chain Rings Metal Leather for BMW E34 E36 E60 E90 E46 E39 E70 F10 F20 F30 M X1 X3 X4 X5 X6 X7', '637d68afdee72.jpg', 199, '29.99', '6.50');

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
(57, 1, 'Bob\'s Garage2781', 'aefj71', '637c5fc786de4.jpg', 5144306091, 'vlasslavic@gmail.com1', '3561 Rue Jordi-Bonet, Boisbriand, QC J7E 1H5, Canada', 1),
(58, 4, 'BMW Laval', 'Desservant la région de Laval, BMW Laval, situé au 2450 Chomedey à Laval, QC, est un concessionnaire de premier plan qui vous offre des voitures neuves et d\'occasion Bmw . Notre personnel des ventes dévoué et nos techniciens chevronnés sont ici pour rendre votre expérience d\'achat d\'un véhicule agréable, facile et financièrement avantageuse.', '637d5cc7a24ba.jpg', 8774704990, 'bmwlaval@mail.com', '2450 Boulevard Chomedey, Laval, QC, Canada', 1);

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
(4, 'bmw@mail.com', '$2y$10$pzYVGbOdZWw94U5HSm50p.SVQgK4S9Wng9XjKgdWW9GI4LLIG70nu');

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
(4, 'Tire Change', '65.00', '00:45:00', 57),
(5, 'Installer et balancer pneus', '120.00', '01:30:00', 58),
(6, 'Oil Change', '75.00', '00:30:00', 57);

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
(8, 'user@mail.com', '$2y$10$5VW8wKBMPMqHOE51YeDnAObPc8/vD.BpAEOs8iFIUnLDdStIWXvl2', 'Veaceslav', 'Vlas', '12 Rue Elmwood, Sherbrooke, QC, Canada', NULL);

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
(1, 8, 2023, 'Lexus', 'IS350', '', ''),
(3, 8, 2009, 'BMW', 'M235i', 'Black', ''),
(4, 8, 2017, 'Chevrolet', 'Unknown', 'White', '');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
