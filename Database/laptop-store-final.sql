-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2021 at 06:06 PM
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
-- Creation: Sep 07, 2021 at 02:24 PM
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

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `first_name`, `last_name`, `ad_user`, `ad_password`, `register_date`) VALUES
(0, 'admin', 'admin', 'admin@gmail.com', '123456', '2021-09-08 20:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--
-- Creation: Sep 07, 2021 at 02:24 PM
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
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--
-- Creation: Sep 07, 2021 at 02:24 PM
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
-- Creation: Sep 07, 2021 at 02:24 PM
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
--   `cart_id`
--       `cart` -> `cart_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--
-- Creation: Sep 07, 2021 at 02:24 PM
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
(1, 1, 'Alienware', 'Alienware M15 R3', 'The Alienware M15 R3 is a portable gaming laptop with some seriously powerful specifications. It comes with up to 32GB of RAM, 1TB of SSD storage, an Intel Core i9-10980HK CPU and an Nvidia GeForce RTX 2080 Super Max Q GPU. It is capable of running power-hungry titles smoothly, but it does run hot. It is built well and uses Magnesium alloy in its outer shell and keyboard deck to keep its weight low. It has a great keyboard with shallow key travel and a fairly precise trackpad. Like most gaming laptops, battery life is quite poor. The OLED panel lacks a high refresh rate panel, but tries to make up for it with a 4K resolution. This is a very expensive laptop, but you get portability with tons of power.', '16GB DDR4 Memory', 'Intel Core i7', 'Nvidia GTX 2080', '250GB SSD + 1TB HDD', 'QHD-240Fps', 'Win10 Pro', 1499.00, './assets/Alienware/19365-4zu3_alienware_15_r3_maxq.jpg', '2021-08-30 12:08:57', 1599.00),
(2, 1, 'Alienware', 'Alienware M17 R2', 'The Alienware m17 R2 was unveiled just six months after the launch of the Alienware m17 R1. Unlike the older Alienware 17 series, the m17 series focuses on thinner and lighter designs to better compete in the increasingly popular thin gaming laptop space. Like its smaller sibling, the new m17 has been revamped with a snazzy finish compared to its predecessor. It\'s been lovingly crafted from a lightweight magnesium alloy and comes in a choice of bold and striking color options: Lunar Light (white) and Dark Side of the Moon (black). Alienware says this m17 R2 is the \"thinnest and smallest\" gaming notebook the company has ever made. Supposedly it\'s leaner and punchier than its predecessor, but let\'s not forget there\'s other competition out there making super-time gaming laptops, such as the Razer Blade. Under the hood, the Alienware m17 R2 certainly means business. There is a range of specification options to choose from, including everything from Intel Core i5 processors right up to the Core i9-9980HK. On the graphics side, you\'ll also get the latest and greatest options of Nvidia GPU, ranging from the GTX 1650 to the RTX 2080. Performance, in this case, will certainly depend on the size of your bank account, but there are plenty of options to choose.', '32GB DDR4 Memory', 'Intel Core i7', 'Nvidia GTX 3080', '1TB Nvme SDD', 'UHD-144Fps', 'Win10 Pro', 1999.00, './assets/Alienware/Alienware-m17-r2-laptopg7-02-1589603290.jpg', '2021-08-30 12:08:57', 2099.00),
(3, 1, 'Alienware', 'Alienware M15 R2', 'Dell Alienware m15 R2 is a Windows 10 laptop with a 15.60-inch display that has a resolution of 1920x1080 pixels. It is powered by a Core i7 processor and it comes with 8GB of RAM. The Dell Alienware m15 R2 packs 512GB of SSD storage. Graphics are powered. The Alienware m15 follows squarely in the footsteps of the Alienware Area-51m. When that absolute unit of a laptop was revealed back at CES 2018 we were completely blown away not only for its upgradeability but also its clean \'Legend ID\' design language. And now that design language is present in a gaming laptop you can actually carry it around with you. That design language carries over remarkably, making it one of the most stylish gaming laptops on the market right now, and even rivals the MSI GS65 Stealth – the difference between those two laptops is ultimately going to boil down to taste. ', '16GB DDR4 Memory', 'Intel Core i5', 'Nvidia GTX 3060', '2x500GB Nvme', 'QHD-240Fps', 'Win10 Pro', 1699.00, './assets/Alienware/dell-alienware-m15-r2-AlienwareM15R210NU-kC4.jpg', '2021-08-30 12:08:57', 1799.00),
(4, 1, 'Alienware', 'Alienware M15 MaxQ', 'Our latest thermal technology, Advanced Alienware Cryo-Tech, is an engineering approach where an Alienware system’s gaming performance is never compromised by means of electrical and mechanical methods while maintaining system stability during the highest. On top of that raw, unadulterated style, of course, is the power that this laptop holds. To be fair, the Alienware m15 we tested was the most expensive model in the lineup, but it was able to absolutely destroy basically any game we threw at it – even the incredibly demanding Red Dead Redemption 2. One thing that may disappoint some folks (but excite others) is the display. At this price point, some may be expecting to see a 4K OLED panel at 60Hz, and while that sounds good in theory, laptop computing hardware isn\'t exactly great at that resolution yet, especially in games. Instead, you\'re getting a 1080p display at 240Hz – something much better for gaming, though at a lower resolution. ', '32GB DDR4 Memory', 'Intel Core i7', 'Nvidia GTX 3070', '500GB SSD + 1TB HDD', 'QHD-144Fps', 'Win10 Pro', 1599.00, './assets/Alienware/dell-alienware-m15-r3.jpg-4.jpg', '2021-08-30 12:08:57', 1699.00),
(5, 2, 'HP', 'HP Pavilion 15-i3', 'The HP Pavilion 15 cs2031TU laptop owns a high-quality plastic shell that weighs only 1.75 kg and a metal back cover to add a luxurious look to the product, creating a cool feeling to the hand. With such a light weight, the HP Pavilion laptop will be very suitable for those who have to move often. With a size of 15.6 inches, Full HD resolution (1920 x 1080) and anti-glare screen, this office laptop will give you relaxing moments with your favorite movie. IPS panels enhance contrast for more vibrant, fresh colors. The thin 2-sided bezel expands the display space to the sides, creating a wider viewing angle and making the body more compact than the older 15-inch laptop generations.', '8GB DDR4 Memory', 'Intel Core i3', 'Nvidia GTX 1060', '500GB SSD + 500GB HDD', 'FHD-144Fps', 'Win10 Pro', 1399.00, './assets/HP/hp-pavilion-15-cs3014tu.jpg', '2021-08-30 12:08:57', 1499.00),
(6, 2, 'HP', 'HP Pavilion 15 2021', 'HP Pavilion 15 is a Windows 10 laptop with a 15.60-inch display that has a resolution of 1366x768 pixels. It is powered by a Core i7 processor and it comes with 8GB of RAM. The HP Pavilion 15 packs 1TB of HDD storage. Graphics are powered by Nvidia GeForce. The system we\'re looking at today has been fully configured with the Core i7-1165G7 CPU, 16 GB of RAM, 1 TB PCIe SSD, and dedicated Nvidia graphics for about $1100 USD. Its specifications are therefore higher than your typical budget Ultrabook especially in terms of graphics as many in this category have no Nvidia options at all. When compared to the older 2019 design, the 2021 model has narrower top and bottom bezels for a smaller footprint while using the same metal and plastic materials. The speaker grilles along the top of the keyboard are now gone for a more simplistic appearance. It\'s a basic matte impression with none of the flashy chrome-cut trims or sharp MacBook-like edges of the Spectre or Envy, respectively. Whether it looks any better than a competing Asus VivoBook or Lenovo IdeaPad is up to user preference.', '8GB DDR4 Memory', 'Intel Core i5', 'Nvidia GTX 1070', '250GB SSD + 1TB HDD', 'QHD-240Fps', 'Free DOS', 1499.00, './assets/HP/hp-pavilion-15-eg0008tu-i3-1115g4.jpg', '2021-08-30 12:08:57', 1599.00),
(7, 2, 'HP', 'HP Pavilion 15-i5 2021', 'The HP Pavilion 15 is HP’s flagship entry-level laptop. But does entry-level mean you’ll have to suffer from low-end specs and corner-cutting components? Not a chance. As a budget laptop, the Pavilion 15 isn\'t trying to be the thinnest or lightest in its category; it just needs to be \"good enough\" against the competition. Size and weight are therefore very similar to the budget 15.6-inch laptops from other OEMs including the Asus VivoBook S15 or Lenovo IdeaPad 5 15. Moving up to the sleeker HP Envy 15 or Spectre x360 15 will actually be even heavier since those systems have stronger metal frames instead of plastic. Port options are decent for the size. We\'re surprised to see HDMI 2.0 instead of 1.4 meaning the system properly supports external monitors of up to 4K at 60 FPS. There is no Thunderbolt support, however, as HP wants users to upgrade to the costlier Envy or Spectre series instead.', '16GB DDR4 Memory', 'Intel Core i7', 'Nvidia GTX 2070', '500GB SSD + 2TB HDD', 'QHD-240Fps', 'Win10 Home', 1699.00, './assets/HP/hp-pavilion-15-eg0505tu-i5-46m02pa.jpg', '2021-08-30 12:08:57', 1799.00),
(8, 2, 'HP', 'HP Pavilion 14-i5', 'HP Pavilion 14 laptop (5RL41PA) has just been launched by HP with a sophisticated design, along with a fairly light weight, more convenient for daily travel. The configuration is powerful enough to run smoothly office applications, handle drag and drop operations in basic graphics applications. This will be a worthy choice for students, students and office workers. HP Pavilion 14 laptop (5RL41PA) is meticulously machined, finished from plastic material with 4 rounded corners to bring elegant and elegant beauty. Besides, with a weight of only 1.59 Kg, it helps you not to feel tired when moving with the HP office laptop. The HP laptop is equipped with a 14-inch screen with Full HD resolution for a realistic visual experience, sharp to every detail combined with an IPS panel to help expand the viewing angle. Led Backlit technology helps the screen not consume too much power when in use. Now, enjoying good movies with friends and colleagues after hours of study and work will be easier than ever.', '8GB DDR4 Memory', 'Intel Core i5', 'Nvidia GTX 1080', '250GB SSD + 1TB HDD', 'QHD-240Fps', 'Free DOS', 1399.00, './assets/HP/laptop-hp-pavilion-14-dv0009tu-i5-1135g7.jpg', '2021-08-30 12:08:57', 1499.00),
(9, 3, 'Dell', 'Dell Inspiron 14-5410', 'Staying connected with up-to-date applications has never been easier thanks to Adaptive Connected Modern Standby. Now your device stays ready, even when asleep, so you can quickly access files and applications whenever needed for an instant-on experience. Dell Inspiron 14 (5410) is a Windows 10 laptop with a 14.00-inch display that has a resolution of 1920x1080 pixels. It is powered by a Core i3 processor and it comes with 4GB of RAM. The Dell Inspiron 14 (5410) packs 128GB of SSD storage. Connectivity options include Wi-Fi 802.11, Yes and it comes with 4 USB ports, USB 3.2 Gen 1 (Type A), USB 3.2 Gen 2 (Type C), Thunderbolt 4 (Type C), HDMI Port, Multi Card Slot, Headphone and Mic Combo Jack ports.', '16GB DDR4 Memory', 'Intel Core i5', 'Nvidia GTX 1070', '1TB SDD', 'QHD-144Fps', 'Win10 Home', 1299.00, './assets/Dell/dell-inspiron-14-5410-i5-11399.jpg', '2021-08-30 12:08:57', 1399.00),
(10, 3, 'Dell', 'Dell Inspiron 14-3501', 'Dell Inspiron 3501 (70234074) is crafted with a weight of 1.91 kg, a bit heavier than current new laptops, and with this weight, the machine will be more suitable for office workers who often leave the machine at work. . However, you can still bring your laptop, study and work anywhere if needed. Thanks to Dell having equipped with popular connection ports such as USB 3.2, USB 2.0, HDMI, LAN port, ... that the machine conveniently connects to all peripheral devices when needed such as printers, projectors, televisions, etc. ... Besides the Wi-Fi 802.11 a/b/g/n/ac wireless connection, Bluetooth 5.0 also supports stable data transmission. The Intel Core i5 - 1135G7 processor is a modern 11th generation chip equipped on the Dell Inspiron 3501 (70234074) that impresses with high graphics performance, significantly improved battery life. Accompanying this chip is the NVIDIA GeForce MX330 graphics card, 2GB in addition to supporting smooth graphics operations, also helps you play popular games at medium graphics such as Dead Cells, League of Legends. Legend, Enter the Gungeon.', '8GB DDR4 Memory', 'Intel Core i3', 'Nvidia GTX 950m', '250GB SSD + 1TB HDD', 'FHD-60Fps', 'Free DOS', 1199.00, './assets/Dell/dell-inspiron-3501-5.jpg', '2021-08-30 12:08:57', 1299.00),
(11, 3, 'Dell', 'Dell Vostro 3500', 'Dell\'s Vostro series of laptops have been the go-to option for many who are on a tight budget. But over the years, these laptops have evolved and are now amongst the best budget laptops that deliver reliable day-to-day performance without breaking your bank. Let\'s check out Dell\'s one of the newer Vostro machines, the Dell Vostro 15 3500. The Dell Vostro 15 3500 isn\'t one of those flashy-looking laptops. Instead, these machines look very simple and minimal. The more functional design of these laptops speaks for themselves and they\'re suited for your typical workspace setup. The Dell Vostro is mostly made out of polycarbonate and weighs under 2 kg. It also measures under 20mm in terms of thickness. The best thing about this laptop is that it comes with a very good backlit keyboard and a spacious touchpad. You also get a fingerprint scanner on the Dell Vostro 15 3500. The laptop also sports a 15.6-inch FHD (1920 x 1080) Anti-glare LED-Backlit Non-touch Narrow Border WVA Display. The new Dell Vostro 15 3500 is powered by Intel\'s 11th Gen Core processors. This one, in particular, is powered by an 11th Gen Intel Core i3-1115G4 processor along with Intel\'s UHD graphics. You can also go for a Core i5 version if you can stretch your budget a little bit. Additionally, you also get 8GB of RAM and this particular model comes with 1TB HDD instead of an SSD. You can also get a model with an SSD and an HDD combo. As for the battery, the Dell Vostro 15 3500 packs a 3-cell 42WHr battery that', '9GB DDR4 Memory', 'Intel Core i3', 'Nvidia GTX 960m', '250GB SSD + 500GB HDD', 'FHD-60Fps', 'Win10 Home', 1149.00, './assets/Dell/dell-vostro-3500-i3-1115g4.jpg', '2021-08-30 12:08:57', 1299.00),
(12, 3, 'Dell', 'Dell G7 7588', 'The Dell G7 7588 has a design that is almost identical to the dell inspiration 7577. When it comes to an extremely sturdy plastic design and the best build quality of the Dell Inspiron Gaming series. The best thing about this game-hungry beast is its slime. Dell G7 7588 is a Windows 10 laptop with a 15.60-inch display that has a resolution of 1920x1080 pixels. It is powered by a Core i7 processor and it comes with 8GB of RAM. The Dell G7 7588 packs 256GB of SSD storage. Graphics are powered by Nvidia GeForce GTX 3080. It is difficult to confuse Dell\'s laptops with other manufacturers because Dell has a design style that has been shaped for many years, which is the strength and masculinity that is evident in every line. product features. The overall design of the Dell G7 7588 does not have many cumbersome details, the lid only has a prominent blue Dell logo on a black background. The rear of the machine is designed with beautiful and delicate lines running parallel to each other, the bottom is an asymmetrical radiator slot, the radiator leaf is also painted blue in sync with the general color of the device. machine. The whole body is made from high-quality hard plastic with extremely good quality. The surface has a soft smooth finish that feels very comfortable to the touch. Although this surface is very limited, the phenomenon of dust and fingerprints is inevitable', '32GB DDR4 Memory', 'Intel Core i9', 'Nvidia GTX 3080', '1TB SDD', 'QHD-240Fps', 'Win10 Pro', 2199.00, './assets/Dell/Laptop-Dell-G7-7588-pic2-500x500.jpg', '2021-08-30 12:08:57', 2499.00),
(13, 4, 'Lenovo', 'Lenovo Ideapad 3', 'If there\'s one thing to take away from this Lenovo IdeaPad 3 review, it\'s that this is one of the best laptops on the market at the moment, but that not because of its eye-catching looks or its powerful performance – it\'s because it\'s not stupidly expensive. You\'ll really get the most for your money with a Lenovo laptop. Of course, we\'ve seen much faster and more polished Lenovo laptops in recent months, but if you\'re looking to spend as little as you possibly can on a cheap laptop then the IdeaPad 3 has to be worth considering. In our full Lenovo IdeaPad 3 review, we\'ll explain exactly why. You\'re not going to be able to play demanding games or use it to start your career in video production but it has plenty of strengths worth shouting about: it\'s great for everyday computing and web browsing, dealing with emails and spreadsheets, and you\'ll be pleased with its TV and movie streaming as well. ', '16GB DDR4 Memory', 'Intel Core i5', 'Nvidia GTX 2080', '250GB SSD + 1TB HDD', 'QHD-240Fps', 'Win10 Home', 1449.00, './assets/Lenovo/lenovo-ideapad-3-15iil05-i3-81we003rvn.jpg', '2021-08-30 12:08:57', 1699.00),
(14, 4, 'Lenovo', 'Lenovo Ideapad slim3', 'Lenovo IDEAPAD SLIM 3 is a stylish and powerful Thin and Light Laptop Laptop and is powered by 2 core clocked at a speed of 2.3 GHz and sports a 15.6 Inchon the memory front, the laptop is equipped with a hard drive of 1 TB and a 4 GB DDR4 RAM, thereby making it possible to store ample amount of data.All the above features ensure that you breeze through all your tasks throughout the day.It is loaded with 2X1.5W Dual Speakers and Dolby Audio for a great audio experience. While it may be priced as an everyday-use laptop, the IdeaPad 3 (15, AMD) is something much more. Up to an AMD Ryzen™ 7 4700U Mobile Processor—bolstered by powerful memory, storage, and graphics options—means this device delivers beyond expectations. What', '16GB DDR4 Memory', 'Intel Core i5', 'Nvidia GTX 1080', '250GB SSD + 1TB HDD', 'QHD-240Fps', 'Win10 Home', 1549.00, './assets/Lenovo/lenovo_ideapad_slim_3_14_blue.jpg', '2021-08-30 12:08:57', 1649.00),
(15, 4, 'Lenovo', 'Lenovo Ideapad slim4', 'With the latest AMD Ryzen 4000 series processors, the Lenovo IdeaPad Slim 4 14ARE05 is both powerful and energy efficient. In addition, you also have a sharp 14-inch Full HD screen, an extremely fast 512GB SSD hard drive and more surprises when the laptop is sold at a super cheap price. Lenovo IdeaPad Slim 4 14ARE05 has an outstanding configuration compared to competitors in the price range thanks to its AMD Ryzen 3 4300U processor. This is a 4000 series chip from AMD with 4 extremely powerful 4 cores and 4 threads, clocked at 2.7 - 3.7GHz and specially manufactured on the 7nm process. With the most advanced technologies, the Lenovo IdeaPad Slim 4 14ARE05 has powerful multi-core processing capabilities, making it fast for all the work you need. Besides the powerful new chip, Lenovo IdeaPad Slim 4 14ARE05 also owns 4GB of DDR4 RAM and 512GB of SSD hard drive. In which 8GB of DDR4 standard RAM will help you do more things at the same time thanks to enhanced multitasking ability. Moreover, a large 512GB SSD hard drive is a very expensive component, because it ensures both comprehensive computer acceleration and large storage capacity. You will have an ideal performance laptop in the price range.', '8GB DDR4 Memory', 'Intel Core i5', 'Nvidia GTX 1080', '250GB SSD + 1TB HDD', 'QHD-240Fps', 'Free DOS', 1599.00, './assets/Lenovo/lenovo_ideapad_slim_3_14iil05.jpg', '2021-08-30 12:08:57', 1899.00),
(17, 2, 'HP', '1', 'Test Create product', '123', '123', '123', '123', '123', '123', 123.00, '../assets/product-image/background.png', '2021-09-08 20:14:15', 123.00),
(18, 2, 'HP', 'Laptop 1', 'This is a laptop demo description', '8 GB Ram', 'Intel i7', 'Nvidia GTX 1060', '500GB SSD', 'QHD-144FPD', 'Free DOS', 10000.00, '../assets/product-image/background.png', '2021-09-08 20:28:35', 10000.00);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--
-- Creation: Sep 07, 2021 at 02:24 PM
-- Last update: Sep 09, 2021 at 02:55 PM
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
--

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `user_email`, `user_password`, `profile_image`, `register_date`) VALUES
(1, 'Huynh', 'Thanh Tung', 'tungtest@gmail.com', '$2y$10$tNUReJqw8YwGqA8v2FTx7OGo12W.WkNUb/WX20DExOiC0wJBZ9.sa', './assets/user_avatar/face-4.jpeg', '2021-09-07 21:46:04'),
(3, 'Tung', 'Huynh', 'Tung@gmail.com', '$2y$10$tLj9R0VlkBJ7snYndRwCQeK1lfcI0OKhL05uKhnyuhgAfgbRXVCfK', './assets/user_avatar/face-2.jpg', '2021-09-08 20:36:06');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--
-- Creation: Sep 07, 2021 at 02:24 PM
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
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `order-detail`
--
ALTER TABLE `order-detail`
  ADD CONSTRAINT `order-detail_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `product` (`brand_id`),
  ADD CONSTRAINT `order-detail_ibfk_2` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `category` (`brand_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
