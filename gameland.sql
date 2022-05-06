-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2022 at 07:29 PM
-- Server version: 8.0.28
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gameland`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answer_id` int NOT NULL,
  `answer` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answer_id`, `answer`) VALUES
(1, '2 hours'),
(2, '3 hours'),
(3, '4 hours+');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(1, 'PC'),
(2, 'Play Station'),
(3, 'XBOX'),
(8, 'Controller');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int NOT NULL,
  `src` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `src`, `product_id`) VALUES
(1, 'pc.jpg', 1),
(2, 'xbx.jpg', 2),
(3, 'ps5-b.jpg', 3),
(5, 'xb1.png', 5),
(6, 'ps5.jpg', 6),
(7, 'pc-biz.jpg', 7),
(8, 'xb1-w.jpg', 8),
(9, 'ps4.jpg', 9),
(10, 'pc-rgb.jpg', 10),
(11, 'xbox360.jpg', 11),
(12, 'ps4-w.jpg', 12),
(17, 'pc-purple.jpg', 23),
(18, 'xbx-xpace.jpg', 24),
(20, 'ps4customspace.jpg', 26),
(21, 'whitepccustom.png', 27),
(22, 'ps4contbl.jpg', 28),
(23, 'xb1contblack.jpg', 29),
(24, 'pc-all.png', 30),
(25, 'xbxcustomcybpunk.jpg', 31),
(26, 'ps4customblue.png', 32),
(27, 'ps5contblack.jpg', 33),
(28, 'ps5custom.jpg', 34),
(29, 'xb1contwhite.jpg', 35),
(30, 'pinkcustomPC.jpg', 36),
(31, 'fortnitexb1.jpg', 37);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `href` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `name`, `href`) VALUES
(1, 'Home', 'index.php'),
(2, 'Products', 'products.php'),
(3, 'Contact', 'contact.php'),
(4, 'Admin Panel', 'adminpanel.php'),
(5, 'About Us', 'about.php'),
(6, 'About Author', 'author.php'),
(7, 'Login', 'login.php'),
(8, 'Register', 'register.php'),
(9, 'Cart', 'cart.php'),
(10, 'My Orders', 'myorders.php');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `user_id` int NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `price_id` int NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `product_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`price_id`, `price`, `active`, `product_id`) VALUES
(1, '600', 1, 1),
(2, '500', 1, 2),
(3, '500', 1, 3),
(5, '450', 1, 5),
(6, '500', 1, 6),
(7, '650', 1, 7),
(8, '400', 1, 8),
(9, '300', 1, 9),
(10, '700', 1, 10),
(11, '200', 1, 11),
(12, '300', 1, 12),
(23, '700', 1, 23),
(24, '600', 0, 1),
(26, '525', 1, 24),
(28, '325', 1, 26),
(29, '750', 1, 27),
(30, '70', 1, 28),
(31, '70', 1, 29),
(32, '720', 1, 30),
(33, '530', 1, 31),
(34, '325', 1, 32),
(35, '90', 1, 33),
(36, '525', 1, 34),
(37, '80', 1, 35),
(38, '670', 1, 36),
(39, '540', 1, 37);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `quantity`, `category_id`) VALUES
(1, 'Dragon Gaming PC', 'Custom Made and Painted PC. \nExcellent for any business work and gaming. \nEquipped with latest hardware and software.\nDifferent RGB lights for better experience.\n', 1000, 1),
(2, 'XBOX Series X', 'Regular Black Console. Made for endless gaming with best graphics without overheating.', 1000, 3),
(3, 'Play Station 5 Slim ', 'Regular Black Console. Made for endless gaming with best graphics without overheating.', 1000, 2),
(5, 'XBOX Series S', 'Regular Black Console. Made for endless gaming with best graphics without overheating.', 1000, 3),
(6, 'Play Station 5', 'Regular White Console. Made for endless gaming with best graphics without overheating.\n', 1000, 2),
(7, 'Lizard Gaming PC', 'Custom Made and Painted PC. \nExcellent for any business work and gaming. \nEquipped with latest hardware and software.\nDifferent RGB lights for better experience.\n', 1000, 1),
(8, 'XBOX One ', 'Regular White Console. Made for endless gaming with best graphics without overheating.', 1000, 3),
(9, 'Play Station 4', 'Regular Black Console. Made for endless gaming with best graphics without overheating.', 1000, 2),
(10, 'Next level PC', 'Custom Made and Painted PC. \nExcellent for any business work and gaming. \nEquipped with latest hardware and software.\nDifferent RGB lights for better experience.\n', 1000, 1),
(11, 'XBOX 360', 'Regular Black Console. Made for endless gaming with best graphics without overheating.', 1000, 3),
(12, 'Play Station 4', 'Regular White Console. Made for endless gaming with best graphics without overheating.\n', 1000, 2),
(23, 'PC Purple', 'Custom Made and Painted PC. \nExcellent for any business work and gaming. \nEquipped with latest hardware and software.\nDifferent RGB lights for better experience.\n', 1000, 1),
(24, 'XBOX Series X', 'Custom Painted Console. Made for endless gaming with best graphics without overheating.', 1000, 3),
(26, 'Play Station 4', 'Custom Painted Console. Made for endless gaming with best graphics without overheating.', 1000, 2),
(27, 'Off white PC ', 'Custom Made and Painted PC. \nExcellent for any business work and gaming. \nEquipped with latest hardware and software.\nDifferent RGB lights for better experience.\n', 1000, 1),
(28, 'PS4 Controller', 'Custom Painted Controller.', 1000, 8),
(29, 'XBOX Controller', 'Regular Black Controller.', 1000, 8),
(30, 'RGB Full PC', 'Custom Made and Painted PC. \nExcellent for any business work and gaming. \nEquipped with latest hardware and software.\nDifferent RGB lights for better experience.\n', 1000, 1),
(31, 'XBOX Series X', 'Custom Painted Console. Made for endless gaming with best graphics without overheating.', 1000, 3),
(32, 'Play Station 4', 'Custom Painted Console. Made for endless gaming with best graphics without overheating.', 1000, 2),
(33, 'PS5 Controller', 'Regular Black Controller.', 1000, 8),
(34, 'Play Station 5', 'Custom Painted Console. Made for endless gaming with best graphics without overheating.', 1000, 2),
(35, 'XBOX Controller', 'Regular White Controller.', 1000, 8),
(36, 'Pink PC', 'Custom Made and Painted PC. \nExcellent for any business work and gaming. \nEquipped with latest hardware and software.\nDifferent RGB lights for better experience.\n', 1000, 1),
(37, 'XBOX Series X', 'Custom Painted Console. Made for endless gaming with best graphics without overheating.', 1000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `address`, `phone`, `is_admin`) VALUES
(2, 'Matija', 'Davidovic', 'mata123@gmail.com', '32250170a0dca92d53ec9624f336ca24', 'Matijina 22', '+38165231455', 1),
(15, 'Admin', 'Admin', 'admin@gmail.com', '823da4223e46ec671a10ea13d7823534', 'Admins adress', '061234567', 1),
(16, 'User', 'User', 'user@gmail.com', '823da4223e46ec671a10ea13d7823534', 'Users adress', '0601234560', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_answer`
--

CREATE TABLE `user_answer` (
  `user_answer_id` int NOT NULL,
  `user_id` int NOT NULL,
  `answer_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`price_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_answer`
--
ALTER TABLE `user_answer`
  ADD PRIMARY KEY (`user_answer_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `answer_id` (`answer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `answer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `price_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_answer`
--
ALTER TABLE `user_answer`
  MODIFY `user_answer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `prices`
--
ALTER TABLE `prices`
  ADD CONSTRAINT `prices_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `user_answer`
--
ALTER TABLE `user_answer`
  ADD CONSTRAINT `user_answer_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `user_answer_ibfk_2` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`answer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
