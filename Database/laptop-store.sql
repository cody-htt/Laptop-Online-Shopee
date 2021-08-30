-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2020 at 11:01 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 8.0.8

SET
SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET
AUTOCOMMIT = 0;
START TRANSACTION;
SET
time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Laptop-Store`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart`
(
    `cart_id` int(11) NOT NULL,
    `user_id` int(11) NOT NULL,
    `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product`
(
    `item_id`    int(11) NOT NULL,
    `item_brand` varchar(200) NOT NULL,
    `item_name`  varchar(255) NOT NULL,
    `item_price` double(10, 2
) NOT NULL,
    `item_image` varchar(255) NOT NULL,
    `item_register` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `item_brand`, `item_name`, `item_price`, `item_image`, `item_register`)
VALUES (1, 'Alienware', 'Alienware M15 R3', 1499.00, './assets/Alienware/19365-4zu3_alienware_15_r3_maxq.jpg',
        '2021-08-30 12:08:57'), -- NOW()
       (2, 'Alienware', 'Alienware M17 R2', 1999.00, './assets/Alienware/Alienware-m17-r2-laptopg7-02-1589603290.jpg',
        '2021-08-30 12:08:57'),
       (3, 'Alienware', 'Alienware M15 R2', 1699.00,
        './assets/Alienware/dell-alienware-m15-r2-AlienwareM15R210NU-kC4.jpg', '2021-08-30 12:08:57'),
       (4, 'Alienware', 'Alienware M15 MaxQ', 1599.00, './assets/Alienware/dell-alienware-m15-r3.jpg-4.jpg',
        '2021-08-30 12:08:57'),
       (5, 'HP', 'HP Pavilion 15-i3', 1399.00, './assets/HP/hp-pavilion-15-cs3014tu.jpg', '2021-08-30 12:08:57'),
       (6, 'HP', 'HP Pavilion 15 2021', 1499.00, './assets/HP/hp-pavilion-15-eg0008tu-i3-1115g4.jpg',
        '2021-08-30 12:08:57'),
       (7, 'HP', 'HP Pavilion 15-i5 2021', 1699.00, './assets/HP/hp-pavilion-15-eg0505tu-i5-46m02pa.jpg',
        '2021-08-30 12:08:57'),
       (8, 'HP', 'HP Pavilion 14-i5', 1399.00, './assets/HP/laptop-hp-pavilion-14-dv0009tu-i5-1135g7.jpg',
        '2021-08-30 12:08:57'),
       (9, 'Dell', 'Dell Inspiron 14-5410', 1299.00, './assets/Dell/dell-inspiron-14-5410-i5-11399.jpg',
        '2021-08-30 12:08:57'),
       (10, 'Dell', 'Dell Inspiron 14-3501', 1199.00, './assets/Dell/dell-inspiron-3501-5.jpg', '2021-08-30 12:08:57'),
       (11, 'Dell', 'Dell Vostro 3500', 1149.00, './assets/Dell/dell-vostro-3500-i3-1115g4.jpg', '2021-08-30 12:08:57'),
       (12, 'Dell', 'Dell G7 7588', 2199.00, './assets/Dell/Laptop-Dell-G7-7588-pic2-500x500.jpg',
        '2021-08-30 12:08:57'),
       (13, 'Lenovo', 'Lenovo Ideapad 3', 1449.00, './assets/Lenovo/lenovo-ideapad-3-15iil05-i3-81we003rvn.jpg',
        '2021-08-30 12:08:57'),
       (14, 'Lenovo', 'Lenovo Ideapad slim3', 1549.00, './assets/Lenovo/lenovo_ideapad_slim_3_14_blue.jpg',
        '2021-08-30 12:08:57'),
       (15, 'Lenovo', 'Lenovo Ideapad slim4', 1599.00, './assets/Lenovo/lenovo_ideapad_slim_3_14iil05.jpg',
        '2021-08-30 12:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user`
(
    `user_id`       int(11) NOT NULL,
    `first_name`    varchar(100) NOT NULL,
    `last_name`     varchar(100) NOT NULL,
    `register_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `register_date`)
VALUES (1, 'Tung', 'Huynh', '2021-08-30 12:07:17'),
       (2, 'John', 'Wick', '2021-08-30 12:07:17'),
       (3, 'FPT', 'Greenwich', '2021-08-30 12:07:17');
    (4, 'Customer', 'One', '2021-08-30 12:07:17');
    (5, 'Customer', 'Two', '2021-08-30 12:07:17');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist`
(
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
    ADD PRIMARY KEY (`cart_id`);

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
    MODIFY `cart_id` int (11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
    MODIFY `item_id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
    MODIFY `user_id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;