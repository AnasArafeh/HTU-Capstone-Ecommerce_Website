-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2020 at 01:24 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(50) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_fullname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`, `admin_fullname`) VALUES
(1, 'anasarafeh@hotmail.com', '123456789', 'Anas Ayman Arafah'),
(5, 'ayman@gmail.com', '123456789', 'Ayman mohammad'),
(10, 'anasarafeh12@hotmail.com', '12345678999', 'Ahmed Arafah'),
(25, 'Salameh@htu.edu.jo', '123456', 'Salameh yassin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(50) NOT NULL,
  `cat_name` varchar(30) NOT NULL,
  `cat_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_image`) VALUES
(7, 'Electronics', 'electronics_cat.jpg'),
(10, 'Clothes', 'clothes_cat.jpg'),
(22, 'Toys', 'toys_cat.jpg'),
(59, 'Sports', 'sports_cat.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(50) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `user_id` varchar(250) NOT NULL,
  `vendor_id` varchar(250) NOT NULL,
  `product_id` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `user_id`, `vendor_id`, `product_id`) VALUES
(38, '2020-10-02', '1', '2,1,1,1,2', '46,7,20,1,39'),
(63, '2020-10-02', '1', '2,1,1', '46,7,1'),
(64, '2020-10-02', '1', '2,1,1', '46,7,1'),
(65, '2020-10-02', '1', '2,1,1', '46,7,1'),
(66, '2020-10-02', '1', '2,1,1', '46,7,1'),
(67, '2020-10-03', '9', '1,1,2,2,1', '1,1,19,46,7');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(50) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_price` float NOT NULL,
  `product_desc` varchar(500) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `vendor_id` int(250) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_image`, `product_price`, `product_desc`, `cat_id`, `vendor_id`, `status`) VALUES
(1, 'HP 14-inch A6/8GB/128GB SSD Laptop - Natural Silver', '14-inch-laptop.jpg', 40, 'All about speed and flexibility, the HP 14-inch A6/8GB/128GB SSD Laptop features capable hardware, like an AMD processor, a solid state drive storage, and USB-C ports, all tucked in its slim and portable footprint. It runs on Windows 10S Home, giving it access to a myriad of useful features like Microsoft Edge, Cortana, and DirectX 12 compatibility', 7, 1, 'active'),
(2, 'Wilson NFL Super Grip Football', 'football.jpg', 20, 'Composite Leather, Imported, Official Size Football, NFI branded, Super grip composite cover for a premium feel, Butyl rubber bladder for advanced air retention, Recommended for players 14+', 59, 2, 'active'),
(5, 'Samsung Galaxy Note20 256GB - Mystic Grey', 'galaxynote20.jpg', 75, 'Forget work-life balance, Samsung Galaxy Note20 gives you work-life flow. Hold the power of a computer in the palm of your hand and scribble with the S Pen that feels just like pen-to-paper. Work smarter, play harder with our fastest Galaxy Note processor, stunning Infinity-O Display and incredible touch sensitivity. It’s a gaming machine.', 7, 2, 'active'),
(7, 'Wilson Traditional Soccer Ball', 'soccer.jpg', 25, 'Synthetic leather cover for increased durability, Butyl rubber bladder for excellent air and shape retention, Traditional panel graphics with silver ACcents, Recreational use, Proper inflation level: 8 10 psi, Packaging may vary.', 59, 1, 'active'),
(8, 'Adidas original black hoodie', 'hoodie.jpg', 40, 'Brand: Adidas, Sleeve Length: Regular, Size Type: Regular, MPN: Adidas-PS-AI6995-P, Pattern: Graphic,	 Material: 65% Cotton 35% Polyester.', 10, 2, 'active'),
(9, 'Logitech G533 Wireless DTS 7.1 Surround Wireless Gaming Headset', 'headset_logitech.jpg', 45, 'Enjoy high-quality audio when playing video games or watching movies with the Logitech G533 Wireless DTS 7.1 Surround Wireless Gaming Headset. Built for long gaming sessions, G533 features an over-ear design and breathable mesh earpads to provide uncompromised comfort.', 7, 1, 'active'),
(12, 'Spalding NBA Zi/O Indoor-Outdoor 29.5\" Basketball', 'basketball.jpg', 65, 'Official NBA size and weight: Size 7, 29.5 inch, Zi/O Tournament composite cover, Foam backed design for excellent feel, Designed for indoor and outdoor play, Shipped inflated and game ready.', 59, 1, 'active'),
(19, 'Champion Mens Fleece Sweatpants Powerblend Sweats Relaxed Bottom Pockets Elastic', 'pants.jpg', 65, 'Brand: Champion, Department: Men,	 Size Type: Regular, Pattern: Solid,	 Country/Region of Manufacture: USA and Imported,	 Style: Pants, MPN: P0894 549314, Material: Cotton Blend, HBISTYLENUMBER:	P0894 549314.', 10, 2, 'active'),
(20, 'Netgear XR300 Nighhawk Pro Gaming WiFi Router', 'netgear-router.jpg', 67, 'With dual band Wi-Fi connectivity and support for multi-user MIMO, the Netgear XR300 Nighthawk Pro Gaming WiFi Router lets you set up a fast and stable network that you can use for streaming content or playing games online. Unlike typical routers, it features the Beamforming+ technology, allowing it to directly beam Wi-Fi signals to your device.', 7, 1, 'active'),
(39, 'Super Soft Volleyball - Waterproof Indoor/Outdoor Official Volleyball for Pool,Game,Gym,Training,Bea', 'volleyball.jpg', 80, '【UPGRADED QUALITY & STYLE】 The surface of this beach volleyball is made of delicate PU, which is soft, comfortable, and wear-resistant. The bladder is made of superior rubber imported from Southeast Asia, which is highly elastic, heat-resistant, and aging resistant, 【EASY TO CONTROL】With the internal and external separation design, this beach volleyball has the characteristics of small impact and soft feel. The soft surface effectively reduces arm pain caused by training, while maintaining the s', 59, 2, 'active'),
(46, 'Schleich Dino Set with Cave Toy Figure', 'toy1.jpg', 65, 'Let your child learn about prehistoric animals in a fun way with the Schleich Dino Set with Cave Toy Figure.  Key Features Exceptionally detailed, allowing your kid to have an exciting playtime Fun to play, it includes a toy cave and 3 toy dinosaurs', 22, 2, 'active'),
(47, 'KNEX Mega Motorcycle Building Set', 'motorcycle.jpg', 42, 'The KNEX - Mega Motorcycle Building Set lets your little kid assemble an authentic replica of a sport bike, simulating their manual dexterity, spatial awareness, and fine motor skills while fostering their love for vehicles.', 22, 1, 'pending'),
(49, 'DualSense Wireless Controlle', '1600892610controller.jpg', 69, ' Feel physically responsive feedback to your in-game actions with dual actuators which replace traditional rumble motors. In your hands, these dynamic vibrations can simulate the feeling of everything from environments to the recoil of different weapons', 7, 1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(50) NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_mobile` varchar(20) NOT NULL,
  `user_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fullname`, `user_email`, `user_password`, `user_mobile`, `user_address`) VALUES
(1, 'Anas Arafah', 'anasarafeh@hotmail.com', '12345678', '0794567891', 'khalda'),
(2, 'Ahmed Marwan', 'AhmedMarwan@hotmail.com', '123456666', '0795995642', 'Amman'),
(4, 'Yaser Mahmoud', 'YaserMahmoud@hotmail.com', '1234559', '0567312000', 'jordan'),
(9, 'saleh zayed', 'saleh@zayed.com', '987654321', '0797776660', 'amman');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(250) NOT NULL,
  `vendor_name` varchar(50) NOT NULL,
  `vendor_password` varchar(60) NOT NULL,
  `vendor_mobile` varchar(20) NOT NULL,
  `vendor_email` varchar(50) NOT NULL,
  `vendor_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `vendor_name`, `vendor_password`, `vendor_mobile`, `vendor_email`, `vendor_address`) VALUES
(1, 'mirco2000', 'micro1234', '0799999999', 'micro@gmail.com', 'jordan'),
(2, 'logitechZone', '$2y$12$.Dmp1TW.xyy2Uw8Xbq/9ju3qZ6qX2msGGkLMRas6.qBNs2CLz3/i2', '0790123177', 'logitech@gmail.com', 'khalda');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
