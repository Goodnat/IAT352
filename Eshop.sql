-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2020-11-10 20:28:59
-- 服务器版本： 10.4.14-MariaDB
-- PHP 版本： 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `Eshop`
--

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE `category` (
  `category_id` int(20) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'audio'),
(2, 'camera'),
(3, 'computer'),
(4, 'TV');

-- --------------------------------------------------------

--
-- 表的结构 `consist`
--

CREATE TABLE `consist` (
  `order_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `delivery_required`
--

CREATE TABLE `delivery_required` (
  `delivery_id` int(20) NOT NULL,
  `order_id` int(20) NOT NULL,
  `create_time` datetime NOT NULL,
  `recipient_name` varchar(255) NOT NULL,
  `recipient_phone` int(20) NOT NULL,
  `street_address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `image`
--

CREATE TABLE `image` (
  `img_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `path_way` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `img_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `img_partOf_product`
--

CREATE TABLE `img_partOf_product` (
  `img_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `manage_order`
--

CREATE TABLE `manage_order` (
  `order_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE `orders` (
  `order_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `payment_required`
--

CREATE TABLE `payment_required` (
  `payment_id` int(20) NOT NULL,
  `order_id` int(20) NOT NULL,
  `card_name` varchar(255) NOT NULL,
  `card_number` int(20) NOT NULL,
  `expiry_date` datetime NOT NULL,
  `card_cvc` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `product`
--

CREATE TABLE `product` (
  `product_id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(20) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `category_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `product`
--

INSERT INTO `product` (`product_id`, `name`, `price`, `description`, `category_id`) VALUES
(2, 'Beats,by Dr. Dre Solo3 Icon On-Ear Sound Isolating Bluetooth Headphones', 249, 'Don\'t just listen; feel your songs with these Beats by Dr. Dre Solo3 on-ear Bluetooth headphones. Soft, cushioned ear cups not only reduce strain, but also dampen external noises for uninterrupted listening. Backed by Fast Fuel technology, these headphones can play for up to 3 hours after just 5 minutes of charging.', 1),
(3, 'Sony,Over-Ear Noise Cancelling Bluetooth Headphones (WH-1000XM4/B)', 499, 'Get the personalised listening experience you deserve with the Sony WH-1000XM4 over-ear Bluetooth headphones. Adaptive noise cancellation with Dual Noise Sensor and powerful Edge-AI technology combine to bring you an intelligent, premium audio experience. The built-in Google Assistant lets you control your music hands-free with voice controls.', 1),
(4, 'Bose,Sport In-Ear Truly Wireless Headphones', 235, 'Experience complete wireless freedom with these Bose Sport in-ear truly wireless headphones. Equipped with Bluetooth technology, they pair with your smart device so you can stream your favourite playlists, take phone calls, and listen to videos and audio books. They come with 3 sizes of StayHear Max silicone tips to deliver a secure and comfortable fit.', 1),
(5, 'Fujifilm,X-T200 Mirrorless Camera with 15-45mm OIS PZ Lens Kit', 674, 'Creative enthusiasts can expand their possibilities with this Fujifilm X-T200 mirrorless camera. Featuring fast auto-focus and quick face detection, this 24.2-megapixel camera allows you to easily capture crisp and perfect photos. It includes a 15-45mm OIS PZ lens kit to enhance the capabilities of the camera.', 2),
(6, 'Sony,a7 III Full-Frame Mirrorless Camera with 28-70mm OSS Lens Kit', 2799, 'Equipped with a 24.2MP full-frame image sensor, extreme AF coverage, and 4K video capability, the Sony a7 III mirrorless camera is a force to be reckoned with. Ideal for enthusiasts and pros alike, this feature-rich camera can tell a story with incredible detail, clarity, and colour accuracy. An FE 28-70mm lens is included for sharp everyday shooting.', 2),
(7, 'Nikon,Z6 Mirrorless Camera with NIKKOR Z 24-70mm Lens Kit', 3399, 'If you thrive on adaptability, the Nikon Z6 is the mirrorless camera for you. It delivers a combination of impeccable speed, resolution, and low-light performance. Pair these benefits with the portable advantages of a lightweight mirrorless design, and you\'re ready to capture stunning images anywhere you roam.', 2),
(8, 'Dell,G5 Gaming PC - Abyss Grey (Intel Core i7 9700/512GB SSD/16GB RAM/GeForce RTX 2060)', 1699, 'The Dell G5 PC is designed for intense gamers. Its Intel Core i7 9700 processor and 16GB DDR4 RAM combine to deliver exceptional performance to smoothly run advanced games and handle multi-tasking. The 512GB of solid-state drive capacity provides enough space to store games, document, media files and much more.', 3),
(9, 'ASUS,VivoBook L203NA 11.6 Laptop (Intel Dual-Core Celeron N3350/64GB eMMC/4GB RAM/Windows 10 S)', 249, 'Stay productive and entertained with the ASUS VivoBook 11.6 L203NA laptop. Featuring the powerful Intel Celeron N3350 processor and 4GB LPDDR3 RAM, this laptop allows you to work on multiple apps or softwares simultaneously without any lag. Its 64GB eMMC let you store your valuable project files and other important data.', 3),
(10, 'HP,15.6 Gaming Laptop (AMD Ryzen 5 4600H/256GB SSD/8GB RAM/NVIDIA GeForce GTX 1050/Win 10)', 829, 'Get immersed in mind-blowing action with the HP 15.6 Gaming Laptop. Overclockable AMD Ryzen 5 4600H processor and 8GB DDR4-3200 SDRAM provide the power to handle performance-demanding games and applications. Built for prolonged gaming sessions, it is designed with dual fan system, rear vents, and enlarged air inlets for proper airflow.', 3),
(11, 'Samsung,65 4K UHD HDR LED Tizen Smart TV (UN65TU8500FXZC)', 1199, 'Take your entertainment to the next level with the Samsung 65 4K UHD LED Tizen smart TV. Powered by an ultra-fast processor, it transforms everything you watch into immersive 4K. Its dynamic crystal display produces a wide range of vibrant colours and crisp details. It comes preloaded with a plethora of apps and other enhancements.', 4),
(12, 'Sony,55 4K UHD HDR LED Android Smart TV (KD55X750H)', 799, 'Get all your entertainment in one place with this Sony 55 4K UHD HDR LED Smart Android TV. Its 4K Processor X1, 4K X-Reality PRO, Motionflow XR, and TRILUMINOS Display technologies combine to deliver a top-notch viewing experience. All your favourite streaming services such as Netflix, YouTube, Disney+, and Crave are available, so you won\'t miss your favourite shows.', 4),
(13, 'LG,55” 4K UHD HDR LCD webOS Smart TV (55UN7000) - 2020', 649, 'Enhance your home entertainment experience with this 55 LG UN70 Series smart TV. Backed by 4K Ultra HD resolution and a quad-core processor, this television optimises every scene in the best possible detail and delivers incredible visuals with true-to-life colours on the screen. Its webOS platform provides instant access to a world of content.', 4);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `user_id` int(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `trn_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `trn_date`) VALUES
(1, 'jwa208', '1054253849@qq.com', '202cb962ac59075b964b07152d234b70', '2020-11-10 19:32:17'),
(2, '111', '1054253849@qq.com', 'bcbe3365e6ac95ea2c0343a2395834dd', '2020-11-10 19:40:52'),
(3, '222', '1054253849@qq.com', '698d51a19d8a121ce581499d7b701668', '2020-11-10 19:48:04');

--
-- 转储表的索引
--

--
-- 表的索引 `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- 表的索引 `consist`
--
ALTER TABLE `consist`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- 表的索引 `delivery_required`
--
ALTER TABLE `delivery_required`
  ADD PRIMARY KEY (`delivery_id`),
  ADD KEY `order_id` (`order_id`);

--
-- 表的索引 `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `product_id` (`product_id`);

--
-- 表的索引 `img_partOf_product`
--
ALTER TABLE `img_partOf_product`
  ADD PRIMARY KEY (`img_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- 表的索引 `manage_order`
--
ALTER TABLE `manage_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- 表的索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- 表的索引 `payment_required`
--
ALTER TABLE `payment_required`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `order_id` (`order_id`);

--
-- 表的索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- 表的索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `delivery_required`
--
ALTER TABLE `delivery_required`
  MODIFY `delivery_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `image`
--
ALTER TABLE `image`
  MODIFY `img_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `payment_required`
--
ALTER TABLE `payment_required`
  MODIFY `payment_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 限制导出的表
--

--
-- 限制表 `consist`
--
ALTER TABLE `consist`
  ADD CONSTRAINT `consist_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `consist_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- 限制表 `delivery_required`
--
ALTER TABLE `delivery_required`
  ADD CONSTRAINT `delivery_required_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- 限制表 `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- 限制表 `img_partOf_product`
--
ALTER TABLE `img_partOf_product`
  ADD CONSTRAINT `img_partOf_product_ibfk_1` FOREIGN KEY (`img_id`) REFERENCES `image` (`img_id`),
  ADD CONSTRAINT `img_partOf_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- 限制表 `manage_order`
--
ALTER TABLE `manage_order`
  ADD CONSTRAINT `manage_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- 限制表 `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- 限制表 `payment_required`
--
ALTER TABLE `payment_required`
  ADD CONSTRAINT `payment_required_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- 限制表 `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
