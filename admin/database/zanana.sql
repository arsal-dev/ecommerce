-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2022 at 01:40 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zanana`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `password`, `gender`, `created_at`) VALUES
(1, 'admin', 'arsal@hostcry.com', '1316532165', '546as4d3sa1d6sa4', '$2y$10$2k9pvU0qNySkCVjDvHXmUeEQTHcLEOI0o2PCC8.oATofkTz6OcD4C', 0, '2022-06-07 21:51:28'),
(2, 'naveed', 'soraha@hai.com', '32432', 'sadsadsad', '$2y$10$CwEDUZSBEvEhJ20Ka5qpHOTBcSos0EgyrkVzwUtzhQ/Viqx0DGCAG', 0, '2022-06-07 22:10:25'),
(3, 'khizer', 'khizer@adaywala.com', '32432', 'sadsadsad', '$2y$10$ZGCrg3rBQOCWpg56ruDaWeLBAMmpBrc2qvmFHhWWtpRlx6BobE2ye', 0, '2022-06-07 22:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_category` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_short_desc` text NOT NULL,
  `product_long_desc` longtext NOT NULL,
  `product_images` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `product_thumbnail` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_category`, `product_title`, `product_short_desc`, `product_long_desc`, `product_images`, `product_price`, `product_quantity`, `discount`, `product_thumbnail`, `created_at`) VALUES
(11, 15, 'Fit Product', 'this is short discription blahg balaha a dakjs aksjhd;sajk h;ashf;asjdfh ;asjdfdsa lsa', 'asdasthis is short discription blahg balaha a dakjs aksjhd;sajk h;ashf;asjdfh ;asjdfdsa lsathis is short discription blahg balaha a dakjs aksjhd;sajk h;ashf;asjdfh ;asjdfdsa lsathis is short discription blahg balaha a dakjs aksjhd;sajk h;ashf;asjdfh ;asjdfdsa lsathis is short discription blahg balaha a dakjs aksjhd;sajk h;ashf;asjdfh ;asjdfdsa lsa', '268943454.jpeg,1502515787.jpeg,1958720014.jpeg', '23', 123, '23', '1654214524.jpeg', '2022-05-31 13:32:42'),
(12, 15, 'Amazing Product', 'short desc sa dsad sa a ldshflkajdgflahdgf hdslas hdlads lsad fla', 'lognas ksaj hdkasj hdlsajk h;lakshflahfl;aksjd;fkajs a as dsakj hdksa hdksa hdsa d', '1749297992.jpeg,699661332.png,380086364.jpeg', '2000', 20, '0', '1654214544.jpeg', '2022-06-02 22:40:25'),
(13, 9, 'new prodcut', 'this is short discription blahg balaha a dakjs aksjhd;sajk h;ashf;asjdfh ;asjdfdsa lsathis is short', 'this is short discription blahg balaha a dakjs aksjhd;sajk h;ashf;asjdfh ;asjdfdsa lsathis is short discription blahg balaha a dakjs aksjhd;sajk h;ashf;asjdfh ;asjdfdsa lsathis is short discription blahg balaha a dakjs aksjhd;sajk h;ashf;asjdfh ;asjdfdsa lsathis is short discription blahg balaha a dakjs aksjhd;sajk h;ashf;asjdfh ;asjdfdsa lsathis is short discription blahg balaha a dakjs aksjhd;sajk h;ashf;asjdfh ;asjdfdsa lsathis is short discription blahg balaha a dakjs aksjhd;sajk h;ashf;asjdfh ;asjdfdsa lsathis is short discription blahg balaha a dakjs aksjhd;sajk h;ashf;asjdfh ;asjdfdsa lsathis is short discription blahg balaha a dakjs aksjhd;sajk h;ashf;asjdfh ;asjdfdsa lsathis is short discription blahg balaha a dakjs aksjhd;sajk h;ashf;asjdfh ;asjdfdsa lsathis is short discription blahg balaha a dakjs aksjhd;sajk h;ashf;asjdfh ;asjdfdsa lsathis is short discription blahg balaha a dakjs aksjhd;sajk h;ashf;asjdfh ;asjdfdsa lsathis is short discription blahg balaha a dakjs aksjhd;sajk h;ashf;asjdfh ;asjdfdsa lsathis is short discription blahg balaha a dakjs aksjhd;sajk h;ashf;asjdfh ;asjdfdsa lsathis is short discription blahg balaha a dakjs aksjhd;sajk h;ashf;asjdfh ;asjdfdsa lsathis is short discription blahg balaha a dakjs aksjhd;sajk h;ashf;asjdfh ;asjdfdsa lsathis is short discription blahg balaha a dakjs aksjhd;sajk h;ashf;asjdfh ;asjdfdsa lsa', '601529920.jpeg,1412826892.jpeg,1272274069.jpeg', '300', 500, '0', '1654214557.jpeg', '2022-06-02 22:58:43');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `category_name`, `category_slug`, `created_at`) VALUES
(9, 'Cream', 'Cream', '2022-05-26 10:51:48'),
(13, 'new category', 'test-category', '2022-05-27 10:41:40'),
(14, 'chita kary cream', 'cream-chita-kary', '2022-05-27 10:45:36'),
(15, 'testing cream', 'testing-cream', '2022-05-27 10:45:40'),
(18, 'mota kary cream', 'mota-kary-cream', '2022-05-30 10:56:55'),
(19, 'adon se buchaye cream', 'adon-se-buchaye-cream', '2022-05-30 10:57:19');

-- --------------------------------------------------------

--
-- Table structure for table `purchased_products`
--

CREATE TABLE `purchased_products` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `productRead` tinyint(4) NOT NULL DEFAULT 0,
  `productAdd` tinyint(4) NOT NULL DEFAULT 0,
  `productUpdate` tinyint(4) NOT NULL DEFAULT 0,
  `productDelete` tinyint(4) NOT NULL DEFAULT 0,
  `categoryRead` tinyint(4) NOT NULL DEFAULT 0,
  `categoryAdd` tinyint(4) NOT NULL DEFAULT 0,
  `categoryUpdate` tinyint(4) NOT NULL DEFAULT 0,
  `categoryDelete` tinyint(4) NOT NULL DEFAULT 0,
  `userRead` tinyint(4) NOT NULL DEFAULT 0,
  `userAdd` tinyint(4) NOT NULL DEFAULT 0,
  `userUpdate` tinyint(4) NOT NULL DEFAULT 0,
  `userDelete` tinyint(4) NOT NULL DEFAULT 0,
  `roleRead` tinyint(4) NOT NULL DEFAULT 0,
  `roleAdd` tinyint(4) NOT NULL DEFAULT 0,
  `roleUpdate` tinyint(4) NOT NULL DEFAULT 0,
  `roleDelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `productRead`, `productAdd`, `productUpdate`, `productDelete`, `categoryRead`, `categoryAdd`, `categoryUpdate`, `categoryDelete`, `userRead`, `userAdd`, `userUpdate`, `userDelete`, `roleRead`, `roleAdd`, `roleUpdate`, `roleDelete`, `created_at`) VALUES
(2, 'SuperAdmin', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-06-01 11:59:58'),
(6, 'SuperDuperSabSeUper', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-06-02 22:16:56'),
(7, 'Categories and Products', 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-02 22:32:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`, `created_at`) VALUES
(1, 'admin', '$2y$10$NZ6lMXLwzAAgEOMSk28Xguxx0cvQ3mQWJP9yiF8xDzv9DDE5HNxf6', 2, '2022-06-01 12:23:40'),
(7, 'root', '$2y$10$4pbaRwptLAvCGKvmZcsYUuqJCA.0TxdGDPopQ2VS4Zalss7gGNjGm', 6, '2022-06-02 22:17:04'),
(8, 'cpro', '$2y$10$wH1jUjaxxm1lv1Rd6s2cAOxushZM84cvU1icxtqUhwU4offc81LZq', 7, '2022-06-02 22:33:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchased_products`
--
ALTER TABLE `purchased_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `purchased_products`
--
ALTER TABLE `purchased_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
