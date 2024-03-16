-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2024 at 08:11 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diplom`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Bedroom'),
(2, 'Living room'),
(3, 'Child room'),
(4, 'Bathroom'),
(5, 'Outdoor'),
(6, 'Kitchen');

-- --------------------------------------------------------

--
-- Table structure for table `discountgoods`
--

CREATE TABLE `discountgoods` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discountgoods`
--

INSERT INTO `discountgoods` (`id`, `title`, `price`, `discount`, `text`, `image`) VALUES
(1, 'BEDSHEET SETS', 220, 50, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.', 'dis1.png'),
(2, 'BEDSHEET SETS', 330, 100, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, sunt. Ipsum magni earum nobis, inventore.', 'dis2.png'),
(3, 'BEDSHEET SETS', 150, 67, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, sunt. Ipsum magni earum nobis, inventore, maxime, natus quod accusantium nihil doloribus.', 'dis3.png'),
(4, 'BEDSHEET SETS', 170, 30, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'dis4.png');

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `count` int(11) NOT NULL,
  `catid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`id`, `title`, `price`, `image`, `count`, `catid`) VALUES
(1, 'Decorative Vase', 30, '3.png', 4, 2),
(2, 'Linen Beach Towel', 40, '4.png', 10, 4),
(3, 'Square Clear Glass Box', 50, '5.png', 5, 2),
(4, '4-pack Small Ceramic Plates', 25, '6.png', 17, 6),
(5, 'Large Clear Glass Box', 70, '7.png', 1, 2),
(6, 'Round Jute Placemat', 10, '8.png', 7, 5),
(7, 'Metal Wire Basket', 50, '9.png', 19, 5),
(8, 'Boho Chic', 80, '10.png', 5, 5),
(9, 'Iny Vintage Chair', 110, '1.png', 13, 2),
(10, 'Large Terracota Vase', 350, '2.png', 1, 2),
(11, 'Velvet Covvered', 39, '11.png', 34, 1),
(12, 'Candle In Glass Holder', 14, '12.png', 45, 5),
(13, 'Metal Photo Frame', 25, '13.png', 12, 2),
(14, 'Round floor mat', 34, '14.png', 5, 5),
(15, 'Class light holder', 22, '15.png', 7, 1),
(16, 'Flannel Duvet Cover Set', 44, '16.png', 17, 1),
(17, 'Fitted Cotton Sheet', 24, '17.png', 11, 1),
(18, 'Small Candle in a Small Jar', 14, '18.png', 20, 6),
(19, 'Checked Duvet Cover Set', 36, '19.png', 45, 1),
(20, 'Washed Linen Pillowcase', 18, '20.png', 14, 1),
(21, 'Ribbed Wool-blend Throw', 31, '21.png', 4, 1),
(22, 'Mini Porcelain Dish', 8, '22.png', 15, 6);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` int(2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `user_id`, `product_id`, `rating`, `timestamp`) VALUES
(1, 3, 1, 5, '2024-03-14 22:29:39'),
(2, 3, 2, 3, '2024-03-14 22:36:39'),
(3, 1, 2, 4, '2024-03-14 22:48:58'),
(4, 1, 3, 4, '2024-03-14 22:58:01'),
(5, 0, 4, 2, '2024-03-16 16:55:13'),
(6, 0, 8, 5, '2024-03-16 16:56:28'),
(7, 0, 5, 3, '2024-03-15 00:25:44'),
(8, 0, 7, 3, '2024-03-16 16:58:07'),
(9, 2, 4, 3, '2024-03-15 00:41:06'),
(10, 1, 4, 5, '2024-03-15 00:42:06'),
(11, 2, 7, 5, '2024-03-16 17:00:58'),
(12, 2, 8, 4, '2024-03-15 01:15:48'),
(13, 2, 6, 4, '2024-03-15 23:41:17'),
(14, 2, 3, 4, '2024-03-16 03:20:56'),
(15, 2, 1, 1, '2024-03-16 16:47:01'),
(16, 2, 2, 5, '2024-03-16 03:20:57'),
(17, 2, 20, 5, '2024-03-16 04:02:14'),
(18, 2, 10, 5, '2024-03-16 17:02:01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rights` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `pass`, `phone`, `email`, `rights`) VALUES
(1, 'qaz', '1234', 99999999, 'af@ar', ''),
(2, 'rrr', '12345', 123455123, 'admin@test.ru', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discountgoods`
--
ALTER TABLE `discountgoods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `discountgoods`
--
ALTER TABLE `discountgoods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
