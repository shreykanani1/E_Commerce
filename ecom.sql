-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2020 at 09:10 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_details`
--

CREATE TABLE `account_details` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(2000) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pincode` varchar(15) NOT NULL,
  `mobile_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_details`
--

INSERT INTO `account_details` (`user_id`, `name`, `address`, `city`, `pincode`, `mobile_number`) VALUES
(5, 'shrey', '25,Ashray,Nana Mava Road', 'Rajkot', '360005', '8141238368');

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `user_id`) VALUES
(301, 24, 5),
(302, 25, 5);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `status`) VALUES
(10, 'Mobile', 1),
(11, 'TVs', 1),
(12, 'Fashion', 0),
(13, 'Furniture', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `comment` text NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile`, `comment`, `added_on`) VALUES
(4, 'shrey', 'shrey@gmail.com', '8141238368', 'hello', '2020-10-25 13:55:04'),
(6, 'rudra', 'rudra@gmail.com', '123456789', 'Very good services', '2020-10-31 10:44:32');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`) VALUES
(50, 297, 25, 14999),
(51, 297, 23, 39999),
(52, 299, 26, 81999),
(53, 300, 22, 12499);

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE `order_master` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `address` varchar(2000) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pincode` int(11) NOT NULL,
  `mobilenumber` varchar(15) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `payment_status` tinyint(4) NOT NULL,
  `order_status` varchar(20) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_master`
--

INSERT INTO `order_master` (`id`, `order_id`, `user_id`, `product_id`, `address`, `city`, `pincode`, `mobilenumber`, `payment_method`, `total`, `payment_status`, `order_status`, `added_on`) VALUES
(75, 297, 5, 25, '25, Ashray, Golden Park, Nana Mava Road', 'Rajkot', 360005, '8141238368', 'cod', 54998, 0, 'Ordered', '2020-11-28 11:20:43'),
(76, 299, 5, 26, '25, Ashray, Golden Park, Nana Mava Road', 'Rajkot', 360005, '8141238368', 'cod', 81999, 0, 'Ordered', '2020-11-28 11:24:36'),
(77, 300, 5, 22, '25, Ashray, Golden Park, Nana Mava Road', 'Rajkot', 360005, '8141238368', 'cod', 12499, 0, 'Cancelled', '2020-11-28 11:27:41');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `meta_title` varchar(2000) NOT NULL,
  `meta_desc` varchar(2000) NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `name`, `mrp`, `price`, `qty`, `image`, `short_desc`, `description`, `meta_title`, `meta_desc`, `meta_keyword`, `status`) VALUES
(22, 10, 'Samsung Galaxy M21 (Midnight Blue, 4GB RAM, 64GB Storage)', 15999, 12499, 91, 'productimgs/1_2020-11-04_13_27_07.jpg', 'Triple Camera Setup - 48MP (F1.8) Main Camera +8MP (F2.2) Ultra Wide Camera +5MP(F2.2) Depth Camera and 20MP (F2.2) front facing Punch Hole Camera', 'Triple Camera Setup - 48MP (F1.8) Main Camera +8MP (F2.2) Ultra Wide Camera +5MP(F2.2) Depth Camera and 20MP (F2.2) front facing Punch Hole Camera\r\n6.4-inch(16.21 centimeters) Super Amoled - Infinity U Cut Display , FHD+ Resolution (2340 x 1080) , 404 ppi pixel density and 16M color support\r\nAndroid 10.0 operating system with Exynos 9611,2.3GHz,1.7GHz Octa-Core processor, 4GB RAM, 64GB internal memory expandable up to 512GB and dual SIM\r\n6000 mAh Battery\r\n1 year manufacturer warranty for device and 6 months manufacturer warranty for in-box accessories including batteries from the date of purchase', 'Samsung m21', 'Samsung m21', 'Samsung m21', 1),
(23, 10, 'OnePlus 8T 5G (Lunar Silver, 8GB RAM, 128GB Storage)', 42999, 39999, 6, 'productimgs/1_2020-11-04_13_26_57.jpg', 'Rear Quad Camera with 48 MP Sony IMX586 Sensor, 16 MP Ultra Wide Angle, 5 MP macro lens and 2 MP monochrome lens,Front Camera with 16 MP Sony IMX471 Sensor', 'Rear Quad Camera with 48 MP Sony IMX586 Sensor, 16 MP Ultra Wide Angle, 5 MP macro lens and 2 MP monochrome lens,Front Camera with 16 MP Sony IMX471 Sensor\r\n6.55 inch ( 16.63 centimeters) 120 Hz Fluid AMOLED Display with 2400 X 1080 Pixels resolution, 402 PPI density\r\n8 GB RAM | 128 GB ROM\r\n2.86 GHz Qualcomm Snapdragon 865 Octa-core Processor + Adreno 650 GPU , Oxygen OS based on Android 11 Operating system\r\n4500 mAH Lithium-ion battery with 65 W “Warp charge”\r\n1 year Manufacturer warranty for Device, Battery and in-box Accessories from the date of purchase\r\nBox also includes: OnePlus 8T,Warp Charge 65 Power Adapter, Warp Charge Type-C to Type-C Cable, Quick Start Guide, Welcome Letter, Safety Information and Warranty Card, LOGO Sticker, Case, Screen Protector, SIM Tray Ejector\r\nImportant features: Face Unlock, HDR, Screen Flash, Face Retouching, CINE Aspect Ratio Video Recording, Video Portrait, UltraShot HDR, Nightscape, Macro, Portrait, Pro Mode, Panorama, Smart Pet Capture, AI Scene Detection, RAW Image, Filter, Video Focus Tracking, Super Stable, Video Nightscape, Dual Stereo Speakers, Noise cancellation support, Dolby Atmos', 'OnePlus 8T 5G', 'OnePlus 8T 5G', 'OnePlus 8T 5G', 1),
(24, 13, 'Yellow Chair', 2599, 999, 92, 'productimgs/252115885_2_2020-10-31_09_53_20.jpg', 'Height: (28.0 inches) X Width: (19.0 inches) X Diameter: 15.0 (inches) | Main Material:- Faux Leather | Leg Material:- Wood | Upholstered:- Yes | Upholstery Material:- Leatherette | Wood Construction Type:- Solid Wood | Weight Capacity:- 100 Kgs | Back Style:- Solid Back | Stylish and comfortable', '\"Product Dimensions\":- Height: (28.0 inches) X Width: (19.0 inches) X Diameter: 15.0 (inches) | Main Material:- Faux Leather | Leg Material:- Wood | Upholstered:- Yes | Upholstery Material:- Leatherette | Wood Construction Type:- Solid Wood | Weight Capacity:- 100 Kgs | Back Style:- Solid Back | Stylish and comfortable |\r\nAn elegant, simple chair with a modern form, introduces a completely new quality and functionality.\r\nChair seat made of durable polypropylene upholstered with eco leather a characteristic pattern of triangles. | Frame 4 legs made of beech wood combined with elements of black metal. |\r\nThe Dining Side Chair is a sweet velour seat. Modern meets mod in the shape and metal crossing at the wood legs.\r\nIt’s a great time to buy this chic dining room chair, Its modern look, sweet velour seat and the durable metal crossing at the legs makes this chair a perfect addition to any stylish and modern dining room.', 'yellow chair', 'yellow chair', 'yellow chair', 1),
(25, 13, 'Sofa', 19999, 14999, 79, 'productimgs/287733289_3_2020-10-31_09_54_40.jpg', 'Two Seater Sofa : 122 cm x 80 cm x 83 cm, Three Seater Sofa : 173 cm x 80 cm x 83 cm', 'Dimensions : Two Seater Sofa : 122 cm x 80 cm x 83 cm, Three Seater Sofa : 173 cm x 80 cm x 83 cm\r\nStyle : Contemporary, Wood Type : Pine, Upholstery Material : Polyester\r\nUpholstered with high-quality polyester fabric with a non-woven fabric backing that has a high tensile strength for longer durability and easy recycling. The polyester fabric upholstery is naturally anti-bacterial, thus, being resistant to growth and spread of microorganisms for greater hygiene.\r\nThe upholstery is resistant to frictional static charge, making it skin-friendly. The sofa back is filled with Non-Siliconised virgin polyfill for greater comfort and support to the back. It comes with ABS legs for longer durability and greater strength.\r\nAssembly Required: The product requires carpenter assembly and will be provided by the seller', 'Sofa', 'Sofa', 'Sofa', 1),
(26, 11, 'Samsung Frame 55 inches 4K 120Hz TV', 129999, 81999, 39, 'productimgs/1_2020-11-04_13_33_30.jpg', 'The Frame from Samsung comes equipped with the Quantum Dot technology to make TV-viewing an immersive affair. With the Bixby voice assistant and Google Assistant, you can watch TV in a simplified and hassle-free manner.', 'The Frame from Samsung comes equipped with the Quantum Dot technology to make TV-viewing an immersive affair. With the Bixby voice assistant and Google Assistant, you can watch TV in a simplified and hassle-free manner.The Frame from Samsung comes equipped with the Quantum Dot technology to make TV-viewing an immersive affair. With the Bixby voice assistant and Google Assistant, you can watch TV in a simplified and hassle-free manner.The Frame from Samsung comes equipped with the Quantum Dot technology to make TV-viewing an immersive affair. With the Bixby voice assistant and Google Assistant, you can watch TV in a simplified and hassle-free manner.The Frame from Samsung comes equipped with the Quantum Dot technology to make TV-viewing an immersive affair. With the Bixby voice assistant and Google Assistant, you can watch TV in a simplified and hassle-free manner.', 'Samsung Frame 55 inches 4K 120Hz TV', 'Samsung Frame 55 inches 4K 120Hz TV', 'Samsung Frame 55 inches 4K 120Hz TV', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `mobile`, `added_on`) VALUES
(5, 'shrey', 'kanani', 'shrey@gmail.com', '8141238369', '2020-10-30 11:41:07'),
(6, 'rudra', 'kanani', 'rudra@gmail.com', '634533333', '2020-10-30 22:06:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order_master`
--
ALTER TABLE `order_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
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
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `order_master`
--
ALTER TABLE `order_master`
  ADD CONSTRAINT `order_master_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
