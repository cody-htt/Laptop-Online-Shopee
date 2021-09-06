-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2021 at 05:08 PM
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
-- Table structure for table `admin`
--
-- Creation: Sep 06, 2021 at 10:45 AM
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `ad_user` varchar(200) NOT NULL,
  `ad_password` varchar(200) NOT NULL,
  `register_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `admin`:
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--
-- Creation: Sep 06, 2021 at 02:38 PM
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` double(10,2) NOT NULL,
  `shipping_add` varchar(255) DEFAULT NULL,
  `cart_status` varchar(50) NOT NULL,
  `buy_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `cart`:
--   `user_id`
--       `user` -> `user_id`
--   `cart_id`
--       `order-detail` -> `cart_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--
-- Creation: Sep 06, 2021 at 10:45 AM
--

CREATE TABLE `category` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `category`:
--

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`brand_id`, `brand_name`) VALUES
(1, 'Alienware'),
(2, 'HP'),
(3, 'Dell'),
(4, 'Lenovo');

-- --------------------------------------------------------

--
-- Table structure for table `order-detail`
--
-- Creation: Sep 06, 2021 at 02:40 PM
--

CREATE TABLE `order-detail` (
  `order_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `order_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `order-detail`:
--   `item_id`
--       `product` -> `brand_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--
-- Creation: Sep 06, 2021 at 10:45 AM
--

CREATE TABLE `product` (
  `item_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `item_brand` varchar(50) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_desc` varchar(1500) NOT NULL,
  `item_memory` varchar(255) NOT NULL,
  `item_cpu` varchar(255) NOT NULL,
  `item_gpu` varchar(255) NOT NULL,
  `item_drive` varchar(255) NOT NULL,
  `item_monitor` varchar(255) NOT NULL,
  `item_os` varchar(255) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_register` datetime DEFAULT NULL,
  `discount_price` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `product`:
--   `brand_id`
--       `category` -> `brand_id`
--

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `brand_id`, `item_brand`, `item_name`, `item_desc`, `item_memory`, `item_cpu`, `item_gpu`, `item_drive`, `item_monitor`, `item_os`, `item_price`, `item_image`, `item_register`, `discount_price`) VALUES
(1, 1, 'Alienware', 'Alienware M15 R3', 'The Alienware M15 R3 is a portable gaming laptop with some seriously powerful specifications. It comes with up to 32GB of RAM, 1TB of SSD storage, an Intel Core i9-10980HK CPU, and an Nvidia GeForce RTX 2080 Super Max Q GPU. It is capable of running power', '16GB DDR4 Memory', 'Intel Core i7', 'Nvidia GTX 2080', '250GB SSD + 1TB HDD', 'QHD-240Fps', 'Win10 Pro', 1499.00, './assets/Alienware/19365-4zu3_alienware_15_r3_maxq.jpg', '2021-08-30 12:08:57', 1599.00),
(2, 1, 'Alienware', 'Alienware M17 R2', 'The Alienware m17 R2 was unveiled just six months after the launch of the Alienware m17 R1. Unlike the older Alienware 17 series, the m17 series focuses on thinner and lighter designs to better compete in the increasingly popular thin gaming laptop space.', '32GB DDR4 Memory', 'Intel Core i7', 'Nvidia GTX 3080', '1TB Nvme SDD', 'UHD-144Fps', 'Win10 Pro', 1999.00, './assets/Alienware/Alienware-m17-r2-laptopg7-02-1589603290.jpg', '2021-08-30 12:08:57', 2099.00),
(3, 1, 'Alienware', 'Alienware M15 R2', 'Dell Alienware m15 R2 is a Windows 10 laptop with a 15.60-inch display that has a resolution of 1920x1080 pixels. It is powered by a Core i7 processor and it comes with 8GB of RAM. The Dell Alienware m15 R2 packs 512GB of SSD storage. Graphics are powered', '16GB DDR4 Memory', 'Intel Core i5', 'Nvidia GTX 3060', '2x500GB Nvme', 'QHD-240Fps', 'Win10 Pro', 1699.00, './assets/Alienware/dell-alienware-m15-r2-AlienwareM15R210NU-kC4.jpg', '2021-08-30 12:08:57', 1799.00),
(4, 1, 'Alienware', 'Alienware M15 MaxQ', 'Our latest thermal technology, Advanced Alienware Cryo-Tech, is an engineering approach where an Alienware system’s gaming performance is never compromised by means of electrical and mechanical methods while maintaining system stability during the highest', '32GB DDR4 Memory', 'Intel Core i7', 'Nvidia GTX 3070', '500GB SSD + 1TB HDD', 'QHD-144Fps', 'Win10 Pro', 1599.00, './assets/Alienware/dell-alienware-m15-r3.jpg-4.jpg', '2021-08-30 12:08:57', 1699.00),
(5, 2, 'HP', 'HP Pavilion 15-i3', 'HP Pavilion 15-EG0510TU i3-1125G4 15.6-inch 46M10PA laptop equipped with Intel® Core™ i3 Gen 11 processor Tiger Lake 1125G4, 10 nm SuperFin, 4 cores, 8 threads, maximum Turbo speed of 3.70 GHz. This configuration is just enough for the laptop to handle ba', '8GB DDR4 Memory', 'Intel Core i3', 'Nvidia GTX 1060', '500GB SSD + 500GB HDD', 'FHD-144Fps', 'Win10 Pro', 1399.00, './assets/HP/hp-pavilion-15-cs3014tu.jpg', '2021-08-30 12:08:57', 1499.00),
(6, 2, 'HP', 'HP Pavilion 15 2021', 'HP Pavilion 15 is a Windows 10 laptop with a 15.60-inch display that has a resolution of 1366x768 pixels. It is powered by a Core i7 processor and it comes with 8GB of RAM. The HP Pavilion 15 packs 1TB of HDD storage. Graphics are powered by Nvidia GeForc', '8GB DDR4 Memory', 'Intel Core i5', 'Nvidia GTX 1070', '250GB SSD + 1TB HDD', 'QHD-240Fps', 'Free DOS', 1499.00, './assets/HP/hp-pavilion-15-eg0008tu-i3-1115g4.jpg', '2021-08-30 12:08:57', 1599.00),
(7, 2, 'HP', 'HP Pavilion 15-i5 2021', 'The HP Pavilion 15 is HP’s flagship entry-level laptop. But does entry-level mean you’ll have to suffer from low-end specs and corner-cutting components? Not a chance. The problem for budget laptop shoppers like students, new graduates, and others is the ', '16GB DDR4 Memory', 'Intel Core i7', 'Nvidia GTX 2070', '500GB SSD + 2TB HDD', 'QHD-240Fps', 'Win10 Home', 1699.00, './assets/HP/hp-pavilion-15-eg0505tu-i5-46m02pa.jpg', '2021-08-30 12:08:57', 1799.00),
(8, 2, 'HP', 'HP Pavilion 14-i5', 'Powerful work and study performance from HP Pavilion 14 eg0505TU i5 1135G7 (46M02PA) with elegant design is the ideal companion to meet all users daily needs. Exquisite and classy design with trendy golden tones. This HP laptop has a weight of 1,677 kg ', '8GB DDR4 Memory', 'Intel Core i5', 'Nvidia GTX 1080', '250GB SSD + 1TB HDD', 'QHD-240Fps', 'Free DOS', 1399.00, './assets/HP/laptop-hp-pavilion-14-dv0009tu-i5-1135g7.jpg', '2021-08-30 12:08:57', 1499.00),
(9, 3, 'Dell', 'Dell Inspiron 14-5410', 'Staying connected with up-to-date applications has never been easier thanks to Adaptive Connected Modern Standby. Now your device stays ready, even when asleep, so you can quickly access files and applications whenever needed for an instant-on experience.', '16GB DDR4 Memory', 'Intel Core i5', 'Nvidia GTX 1070', '1TB SDD', 'QHD-144Fps', 'Win10 Home', 1299.00, './assets/Dell/dell-inspiron-14-5410-i5-11399.jpg', '2021-08-30 12:08:57', 1399.00),
(10, 3, 'Dell', 'Dell Inspiron 14-3501', 'Dell Inspiron 3501 15.6-inch FHD Laptop (10th Gen Core i3-1005G1/4GB/1TB HDD/Windows 10 Home + MS Office/Intel HD Graphics), Accent Black laptop has a 15.6 Inch display for your daily needs. This laptop is powered by a 10th Generation Intel Core i3-1005G1', '8GB DDR4 Memory', 'Intel Core i3', 'Nvidia GTX 950m', '250GB SSD + 1TB HDD', 'FHD-60Fps', 'Free DOS', 1199.00, './assets/Dell/dell-inspiron-3501-5.jpg', '2021-08-30 12:08:57', 1299.00),
(11, 3, 'Dell', 'Dell Vostro 3500', 'Amplified display: An optional FHD panel offers more brightness and vivid color for an enhanced front-of-screen experience, and a 2-sided narrow border lets you see more with fewer distractions. ExpressCharge™: Take your battery charge level from 0% up to', '9GB DDR4 Memory', 'Intel Core i3', 'Nvidia GTX 960m', '250GB SSD + 500GB HDD', 'FHD-60Fps', 'Win10 Home', 1149.00, './assets/Dell/dell-vostro-3500-i3-1115g4.jpg', '2021-08-30 12:08:57', 1299.00),
(12, 3, 'Dell', 'Dell G7 7588', 'The Dell G7 7588 has a design that is almost identical to the dell inspirion 7577. When it comes to an extremely sturdy plastic design and the best build quality of the Dell Inspiron Gaming series. The best thing about this game-hungry beast is its slimme', '32GB DDR4 Memory', 'Intel Core i9', 'Nvidia GTX 3080', '1TB SDD', 'QHD-240Fps', 'Win10 Pro', 2199.00, './assets/Dell/Laptop-Dell-G7-7588-pic2-500x500.jpg', '2021-08-30 12:08:57', 2499.00),
(13, 4, 'Lenovo', 'Lenovo Ideapad 3', 'The IdeaPad 3 laptop is packed with advanced technology, but sometimes the straightforward approach works best. That’s why we designed the webcam with a physical shutter. When you’re done with your video chat, simply close the shutter—and make your webcam', '16GB DDR4 Memory', 'Intel Core i5', 'Nvidia GTX 2080', '250GB SSD + 1TB HDD', 'QHD-240Fps', 'Win10 Home', 1449.00, './assets/Lenovo/lenovo-ideapad-3-15iil05-i3-81we003rvn.jpg', '2021-08-30 12:08:57', 1699.00),
(14, 4, 'Lenovo', 'Lenovo Ideapad slim3', 'While it may be priced as an everyday-use laptop, the IdeaPad 3 (15, AMD) is something much more. Up to an AMD Ryzen™ 7 4700U Mobile Processor—bolstered by powerful memory, storage, and graphics options—means this device delivers beyond expectations. What', '16GB DDR4 Memory', 'Intel Core i5', 'Nvidia GTX 1080', '250GB SSD + 1TB HDD', 'QHD-240Fps', 'Win10 Home', 1549.00, './assets/Lenovo/lenovo_ideapad_slim_3_14_blue.jpg', '2021-08-30 12:08:57', 1649.00),
(15, 4, 'Lenovo', 'Lenovo Ideapad slim4', 'Do not be fooled by the stylish good looks of the IdeaPad 1 14” laptop—with lots of storage options, an FHD panel framed by narrow bezels, and the latest AMD processing, it’s as powerful on the inside as it is colorful on the outside. All-day battery life ', '8GB DDR4 Memory', 'Intel Core i5', 'Nvidia GTX 1080', '250GB SSD + 1TB HDD', 'QHD-240Fps', 'Free DOS', 1599.00, './assets/Lenovo/lenovo_ideapad_slim_3_14iil05.jpg', '2021-08-30 12:08:57', 1899.00);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--
-- Creation: Sep 06, 2021 at 02:38 PM
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `register_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `user`:
--   `user_id`
--       `order-detail` -> `user_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--
-- Creation: Sep 06, 2021 at 10:45 AM
--

CREATE TABLE `wishlist` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `wishlist`:
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `order-detail`
--
ALTER TABLE `order-detail`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `cart_id` (`cart_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `brand_id` (`brand_id`);

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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order-detail`
--
ALTER TABLE `order-detail`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`cart_id`) REFERENCES `order-detail` (`cart_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order-detail`
--
ALTER TABLE `order-detail`
  ADD CONSTRAINT `order-detail_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `product` (`brand_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `category` (`brand_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
