-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2018 at 07:04 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshoppers`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`) VALUES
(20, '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `category_id` int(100) NOT NULL,
  `category_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`category_id`, `category_title`) VALUES
(1, 'Men'),
(2, 'Women'),
(3, 'Kids');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_city` text NOT NULL,
  `customer_location` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_ip`, `customer_name`, `customer_email`, `customer_pass`, `customer_city`, `customer_location`, `customer_contact`) VALUES
(28, '::1', 'Farhana Naznin', 'farhanazim72@gmail.com', 'Abuashraf1993', 'Dhaka', 'malibagh', '01631179192'),
(29, '::1', 'abu ashraf', 'abuasrhraf00@yahoo.com', 'Abuashraf1993', 'Dhaka', 'malibagh', '01674200740'),
(30, '::1', 'saad hossain', 'saadhossain@gmail.com', 'Saad12345', 'Barishal', 'asasds', '12345678910'),
(32, '::1', 'prome', 'prome@gmail.com', 'Abuashraf1993', 'Sylhet', 'malibagh', '1234567891011'),
(33, '::1', 'saasd', 'prome@gmail.com', 'Abuashraf1993', 'Dhaka', 'malibagh', '1110987654321'),
(34, '::1', '', '', '', 'Dhaka', '', ''),
(35, '::1', 'Farhana Naznin', 'farhanazim72@gmail.com', 'Abuashraf1993', 'Khulna', 'malibagh', '1110987654321'),
(36, '::1', 'saasd', 'farhanazim72@gmail.com', 'Abuashraf1993', 'Dhaka', 'malibagh', '1234567891011');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_category` text NOT NULL,
  `product_price` int(200) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `product_keyword` varchar(255) NOT NULL,
  `product_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_category`, `product_price`, `product_description`, `product_image`, `product_keyword`, `product_type`) VALUES
(13, 'cotton shirt', '1', 1500, 'size: S, L', 'product_images/cotton.jpg', 'shirt', '1'),
(14, 'kamiz', '2', 1000, 'asdasd', 'product_images/kamiz.jpg', 'kamiz, 3 piece', '5'),
(15, 'pant', '1', 1200, '54', 'product_images/6.jpg', 'pant', '2'),
(16, 'Frock', '3', 1000, 'vv', 'product_images/1.jpg', 'frock', '5'),
(17, 'Slik Saree', '2', 3000, 'Available colors: Skyblue, Red, Yellow', 'product_images/35328250_2175234419171139_3559414353688002560_n.jpg', 'saree, silk', '6'),
(18, 'casual coat', '1', 3500, 'size: S, M, L, XL', 'product_images/35265979_2175232102504704_9083389028224466944_n.jpg', 'coat, casual coat, semi formal coat', '7'),
(19, 'Tshirt', '1', 1200, 'available size: S, M, L, XL', 'product_images/35299890_2175238365837411_9123740825790971904_n.jpg', 'tshirt, mens', '3'),
(20, 'Taaga', '2', 1700, 'Size: L, XL', 'product_images/35246339_2175234535837794_6652854038847029248_n.jpg', 'taaga, girls', '5'),
(21, 'Tshirt', '1', 600, 'Size: S, M, L, XL', 'product_images/35242748_2175238372504077_2168915393073119232_n.jpg', 'tshirt,men', '3');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `type_id` int(100) NOT NULL,
  `type_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`type_id`, `type_title`) VALUES
(1, 'shirt'),
(2, 'pant'),
(3, 'tshirt'),
(4, 'watch'),
(5, 'shalwar kamiz'),
(6, 'saree'),
(7, 'coat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `category_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `type_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
