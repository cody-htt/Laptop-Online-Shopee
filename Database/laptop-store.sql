-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2021 at 11:49 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laptop-store`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `item_id` int(11) NOT NULL,
  `item_brand` varchar(200) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_register` datetime DEFAULT NULL,
  `discount_price` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `item_brand`, `item_name`, `item_price`, `item_image`, `item_register`, `discount_price`) VALUES
(1, 'Alienware', 'Alienware M15 R3', 1499.00, './assets/Alienware/19365-4zu3_alienware_15_r3_maxq.jpg', '2021-08-30 12:08:57', 1599.00),
(2, 'Alienware', 'Alienware M17 R2', 1999.00, './assets/Alienware/Alienware-m17-r2-laptopg7-02-1589603290.jpg', '2021-08-30 12:08:57', 2099.00),
(3, 'Alienware', 'Alienware M15 R2', 1699.00, './assets/Alienware/dell-alienware-m15-r2-AlienwareM15R210NU-kC4.jpg', '2021-08-30 12:08:57', 1799.00),
(4, 'Alienware', 'Alienware M15 MaxQ', 1599.00, './assets/Alienware/dell-alienware-m15-r3.jpg-4.jpg', '2021-08-30 12:08:57', 1699.00),
(5, 'HP', 'HP Pavilion 15-i3', 1399.00, './assets/HP/hp-pavilion-15-cs3014tu.jpg', '2021-08-30 12:08:57', 1499.00),
(6, 'HP', 'HP Pavilion 15 2021', 1499.00, './assets/HP/hp-pavilion-15-eg0008tu-i3-1115g4.jpg', '2021-08-30 12:08:57', 1599.00),
(7, 'HP', 'HP Pavilion 15-i5 2021', 1699.00, './assets/HP/hp-pavilion-15-eg0505tu-i5-46m02pa.jpg', '2021-08-30 12:08:57', 1799.00),
(8, 'HP', 'HP Pavilion 14-i5', 1399.00, './assets/HP/laptop-hp-pavilion-14-dv0009tu-i5-1135g7.jpg', '2021-08-30 12:08:57', 1499.00),
(9, 'Dell', 'Dell Inspiron 14-5410', 1299.00, './assets/Dell/dell-inspiron-14-5410-i5-11399.jpg', '2021-08-30 12:08:57', 1399.00),
(10, 'Dell', 'Dell Inspiron 14-3501', 1199.00, './assets/Dell/dell-inspiron-3501-5.jpg', '2021-08-30 12:08:57', 1299.00),
(11, 'Dell', 'Dell Vostro 3500', 1149.00, './assets/Dell/dell-vostro-3500-i3-1115g4.jpg', '2021-08-30 12:08:57', 1299.00),
(12, 'Dell', 'Dell G7 7588', 2199.00, './assets/Dell/Laptop-Dell-G7-7588-pic2-500x500.jpg', '2021-08-30 12:08:57', 2499.00),
(13, 'Lenovo', 'Lenovo Ideapad 3', 1449.00, './assets/Lenovo/lenovo-ideapad-3-15iil05-i3-81we003rvn.jpg', '2021-08-30 12:08:57', 1699.00),
(14, 'Lenovo', 'Lenovo Ideapad slim3', 1549.00, './assets/Lenovo/lenovo_ideapad_slim_3_14_blue.jpg', '2021-08-30 12:08:57', 1649.00),
(15, 'Lenovo', 'Lenovo Ideapad slim4', 1599.00, './assets/Lenovo/lenovo_ideapad_slim_3_14iil05.jpg', '2021-08-30 12:08:57', 1899.00);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(50) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `register_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `user_email`, `user_password`, `profile_image`, `register_date`) VALUES
(1, 'tung', 'huynh', 'tunghuynh@gmail.com', '$2y$10$gT7M50f.gH1OvHBEMOgU6uatr6q3PHd79tIKFY3A8hA8dMFKVUmNW', './assets/user_avatar/demo-avatar.png', '2021-09-01 01:43:15'),
(2, 'test6', 'account6', 'test6@account6.com', '$2y$10$Qk4/BxHbuvGzkCKCGGwOY.G0ZU3Qz7SsalobvNMmI/Iu1J45Ewhg.', './assets/user_avatar/demo-avatar.png', '2021-09-01 01:44:27'),
(3, 'tung2', 'huynh', 'tung2huynh@gmail.com', '$2y$10$.9XhJAGJE4V7VNZWDYY1VeTw63fzhhDyz3DbBXdbwczYhDZPhXBrS', './assets/user_avatar/demo-avatar.png', '2021-09-01 01:44:57'),
(4, 'tung', 'testaccount', 'tung@gmail.com', '$2y$10$0v.HDo9BtMMZWNyUWkwIXOIy.ULzIldfs/AtuJ.wdt1ASDxHSl/z.', './assets/user_avatar/demo-avatar.png', '2021-09-01 01:46:27'),
(5, 'tung', 'huynh', '123@gmail.com', '$2y$10$budAXejRR8BWvwxu5hJPVu8HWkdxwTZRFbbglg2pfzl.7cTB5gCpK', './assets/user_avatar/demo-avatar.png', '2021-09-01 01:48:58'),
(6, 'tung', 'huynh', '123@gmail.com', '$2y$10$H6mXNgWOfNOxhTLSHZTs/eRWx/yQk2ILsIp.fshRS3n0dC0C7aEMy', './assets/user_avatar/demo-avatar.png', '2021-09-01 01:50:57'),
(7, 'tung', 'huynh22', 'tung@123.com', '$2y$10$aG9KyXVGlBG65giXysB82OowTjqfxCGFdzZG0/6mRIyjveHZc2j1m', './assets/user_avatar/demo-avatar.png', '2021-09-01 01:52:48'),
(8, 'tung22', 'huynh22', 'tutung22ng@123.com', '$2y$10$4M9i2mm6NGgTR4wQCDsTK.WNm0IyuIM4VXOtyo8GZhC9U5twLOMTC', './assets/user_avatar/image_2021_07_16T15_18_52_160Z.png', '2021-09-01 01:53:29'),
(9, 'tung', 'huynh', 'tunghuynh123@gmail.com', '$2y$10$A2fzJ5dUorp125DGaCCW.OMExuqLa8hnXow05E7pghZxnzC8AbZY6', './assets/user_avatar/demo-avatar.png', '2021-09-01 02:02:32'),
(10, 'HUYNH', 'TUNG', 'tunghuynh1996@gmail.com', '$2y$10$WZ2qd5/Oi02vWnDVLarbreqY0qpxhm/R3WmmeeMNd/l79ZPjsWIFS', './assets/user_avatar/code-wallpaper-8.jpg', '2021-09-01 04:01:26');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `product` (`item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
