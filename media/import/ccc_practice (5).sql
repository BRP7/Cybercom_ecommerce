-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2024 at 06:19 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccc_practice`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `show_on` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `banner_image`, `status`, `show_on`) VALUES
(1, 'couch.png', 0, 'on'),
(3, 'apple.png', 0, 'yohoho..........    yo..hoho..ho.........');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `name`) VALUES
(1, 'Parth Tandel'),
(2, 'Karna'),
(3, 'Sagar'),
(4, 'Vinit');

-- --------------------------------------------------------

--
-- Table structure for table `catalog_category`
--

CREATE TABLE `catalog_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catalog_category`
--

INSERT INTO `catalog_category` (`category_id`, `category_name`, `status`) VALUES
(1, 'Bar & Game Room', 1),
(2, 'Lighting', 0),
(3, 'Bedroom', 1),
(4, 'Decor', 1),
(5, 'Dining & Kitchen', 0),
(6, 'Office', 1),
(7, 'Outdoor', 0);

-- --------------------------------------------------------

--
-- Table structure for table `catalog_product`
--

CREATE TABLE `catalog_product` (
  `product_id` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_link` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `mfr_cost` decimal(12,2) NOT NULL,
  `shipping_cost` decimal(12,2) NOT NULL,
  `total_cost` decimal(12,2) NOT NULL,
  `margin_percentage` int(11) NOT NULL,
  `min_price` decimal(12,2) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catalog_product`
--

INSERT INTO `catalog_product` (`product_id`, `sku`, `name`, `color`, `size`, `description`, `image_link`, `link`, `category_id`, `price`, `mfr_cost`, `shipping_cost`, `total_cost`, `margin_percentage`, `min_price`, `status`) VALUES
(1, '25', 'Red Printed T-Shirt', 'Green', 'Small', 'nothing', 'product-1.png', 'nothing', 3, 500.00, 1.00, 1.00, 3.00, 75, 2.00, 1),
(2, 'save', 'Black Sport Shoes', 'Pink', 'Small', 'Friend', 'product-2.png', 'no', 5, 500.00, 1.00, 1.00, 3.00, 70, 1.00, 1),
(3, '5', 'HRX Black sneaker', 'Pink', 'Large', 'lol', 'product-3.png', 'no', 7, 500.00, 1.00, 1.00, 3.00, 15, 1.00, 0),
(4, '5', 'Heathered Fit Track Pants', 'Pink', 'Large', 'lol', 'product-3.jpg', 'no', 7, 500.00, 1.00, 1.00, 3.00, 15, 1.00, 0),
(5, '5', 'Blue Printed T-Shirt', 'Pink', 'Large', 'lol', 'product-3.png', 'no', 7, 500.00, 1.00, 1.00, 3.00, 15, 1.00, 0),
(6, '5', 'High Top Shoes', 'Pink', 'Large', 'lol', 'product-5.jpg', 'no', 7, 500.00, 1.00, 1.00, 3.00, 15, 1.00, 0),
(7, '5', 'Black Printed T-Shirt', 'Pink', 'Large', 'Give your summer wardrobe a style upgrade with the HRX Men\'s Active T-Shirt. Team it with a pair of shorts for your morning workout or a denims for an evening out with the guys.', 'product-6.jpg', 'no', 7, 500.00, 1.00, 1.00, 3.00, 15, 1.00, 0),
(8, 'c', 'SJeware Men Solid Socks', 'Pink', 'Medium', 'j', 'product-7.jpg', 'j', 1, 500.00, 1.00, 1.00, 1.00, 1, 1.00, 0),
(10, 'lol', 'Metal Analog Black Watch', 'Blue', 'Large', 'Hero', 'product-8.jpg', 'Hero', 4, 500.00, 0.00, 0.00, 0.00, 0, 0.00, 1),
(12, '5', 'Analog Brown Men\'s Watch', 'Gray', 'Large', 'BMW', 'product-9.jpg', 'BMW', 3, 500.00, 10.00, 10.00, 30.00, 75, 10.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ccc_category`
--

CREATE TABLE `ccc_category` (
  `category_id` int(255) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ccc_category`
--

INSERT INTO `ccc_category` (`category_id`, `category_name`) VALUES
(1, 'Bar & Game Room'),
(2, 'Lighting'),
(3, 'Bedroom'),
(4, 'Decor'),
(5, 'Dining & Kitchen'),
(6, 'office'),
(7, 'Outdoor');

-- --------------------------------------------------------

--
-- Table structure for table `ccc_product`
--

CREATE TABLE `ccc_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `category_id` int(255) NOT NULL,
  `manufacturer_cost` int(255) NOT NULL,
  `shipping_cost` int(255) NOT NULL,
  `total_cost` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ccc_product`
--

INSERT INTO `ccc_product` (`product_id`, `product_name`, `sku`, `product_type`, `category_id`, `manufacturer_cost`, `shipping_cost`, `total_cost`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'laptop', '56', 'Simple', 2, 2000, 300, 2300, 20000, 'Enabled', '2024-02-03', '2024-02-05'),
(2, 'mouse', '235gfg', 'Bundle', 3, 300, 500, 800, 1000, 'Enabled', '2024-02-11', '2024-02-12'),
(3, 'Shooes', 'fg5f', 'Simple', 5, 200, 100, 300, 1260, 'Enabled', '2024-02-06', '2024-02-13'),
(4, 'top', 'fg56g', 'Simple', 5, 100, 50, 150, 788, 'Enabled ', '2024-02-07', '2024-02-08'),
(5, 'Jeans', 'gf565rgf', 'Bundle', 3, 100, 100, 200, 800, 'Enabled', '2024-02-04', '2024-02-05'),
(6, 'chair', 'dfgh56', 'Simple', 3, 200, 100, 300, 800, 'Enabled', '2024-02-07', '2024-02-10');

-- --------------------------------------------------------

--
-- Table structure for table `ccc_temp_converter`
--

CREATE TABLE `ccc_temp_converter` (
  `id` int(11) NOT NULL,
  `session_id` varchar(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `temprature` float NOT NULL,
  `unit` varchar(255) NOT NULL,
  `convert_unit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ccc_temp_converter`
--

INSERT INTO `ccc_temp_converter` (`id`, `session_id`, `user_name`, `temprature`, `unit`, `convert_unit`) VALUES
(26, 'r9nunh0il6e', 'B', 269.261, 'Farenheit', 'Kelvin'),
(28, 'r9nunh0il6e', 'abc', -28.6667, 'Farenheit', 'Celsius'),
(29, 'r9nunh0il6e', 'abc', 5, 'Celsius', 'Celsius'),
(30, 'r9nunh0il6e', 'abc', 298.15, 'Celsius', 'Kelvin'),
(31, 'r9nunh0il6e', 'abc', 113, 'Celsius', 'Farenheit');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `billing_address` varchar(255) NOT NULL,
  `billing_city` varchar(255) NOT NULL,
  `billing_region` int(11) NOT NULL,
  `billing_country` int(11) NOT NULL,
  `billing_phone` bigint(11) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `shipping_city` varchar(255) NOT NULL,
  `shipping_region` int(11) NOT NULL,
  `shipping_country` int(11) NOT NULL,
  `shipping_phone` bigint(11) NOT NULL,
  `default` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_email`, `first_name`, `last_name`, `password`, `billing_address`, `billing_city`, `billing_region`, `billing_country`, `billing_phone`, `shipping_address`, `shipping_city`, `shipping_region`, `shipping_country`, `shipping_phone`, `default`) VALUES
(1, 'pappu@gmail.com', 'Pappu', 'Papita', 'pappu', 'Swapna Shrusti Residency', 'Surat', 1, 91, 8141458299, 'Swapna Shrusti Residency', 'Surat', 1, 91, 8141458299, 1),
(2, 'abc@gmail.com', 'Parth', 'Tandel', '3008', 'Janta Socirty', 'Navsari', 2, 91, 9998190770, 'Janta Socirty', 'Navsari', 2, 91, 9998190770, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `address_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `order_id` int(11) NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `tax_percent` int(11) NOT NULL,
  `grand_total` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`order_id`, `order_number`, `tax_percent`, `grand_total`) VALUES
(1, 'CCC-1000', 8, 1687.50),
(2, 'CCC-1001', 8, 1125.00),
(3, 'CCC-1002', 8, 3937.50),
(4, 'CCC-1003', 8, 5625.00),
(5, 'CCC-1004', 8, 562.50);

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_customer`
--

CREATE TABLE `sales_order_customer` (
  `order_customer_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `billing_address` varchar(255) NOT NULL,
  `billing_city` varchar(255) NOT NULL,
  `billing_region` int(11) NOT NULL,
  `billing_country` int(11) NOT NULL,
  `billing_phone` varchar(255) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `shipping_city` varchar(255) NOT NULL,
  `shipping_region` int(11) NOT NULL,
  `shipping_country` int(11) NOT NULL,
  `shipping_phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_order_customer`
--

INSERT INTO `sales_order_customer` (`order_customer_id`, `order_id`, `customer_id`, `email`, `billing_address`, `billing_city`, `billing_region`, `billing_country`, `billing_phone`, `shipping_address`, `shipping_city`, `shipping_region`, `shipping_country`, `shipping_phone`) VALUES
(1, 1, 1, 'pappu@gmail.com', 'Swapna Shrusti Residency', 'Surat', 1, 91, '8141458299', 'Swapna Shrusti Residency', 'Surat', 1, 91, '8141458299'),
(2, 2, 1, 'pappu@gmail.com', 'Swapna Shrusti Residency', 'Surat', 1, 91, '8141458299', 'Swapna Shrusti Residency', 'Surat', 1, 91, '8141458299'),
(3, 3, 2, 'abc@gmail.com', 'Janta Socirty', 'Navsari', 2, 91, '9998190770', 'Janta Socirty', 'Navsari', 2, 91, '9998190770'),
(4, 4, 2, 'abc@gmail.com', 'Janta Socirty', 'Navsari', 2, 91, '9998190770', 'Janta Socirty', 'Navsari', 2, 91, '9998190770'),
(5, 5, 1, 'pappu@gmail.com', 'Swapna Shrusti Residency', 'Surat', 1, 91, '8141458299', 'Swapna Shrusti Residency', 'Surat', 1, 91, '8141458299');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_item`
--

CREATE TABLE `sales_order_item` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `row_total` decimal(12,2) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_order_item`
--

INSERT INTO `sales_order_item` (`item_id`, `order_id`, `product_id`, `price`, `qty`, `row_total`, `product_name`, `color`) VALUES
(1, 1, 2, 500.00, 3, 1500.00, '', ''),
(2, 2, 12, 500.00, 2, 1000.00, '', ''),
(3, 3, 4, 500.00, 7, 3500.00, '', ''),
(4, 4, 7, 500.00, 10, 5000.00, '', ''),
(5, 5, 1, 500.00, 1, 500.00, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_payment_mathod`
--

CREATE TABLE `sales_order_payment_mathod` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `card_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_order_payment_mathod`
--

INSERT INTO `sales_order_payment_mathod` (`payment_id`, `order_id`, `payment_method`, `card_number`) VALUES
(1, 1, 'COD', 0),
(2, 2, 'Credit Card', 152364789),
(3, 3, 'UPI', 0),
(4, 4, 'Credit Card', 987456321),
(5, 5, 'COD', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_shipping_mathod`
--

CREATE TABLE `sales_order_shipping_mathod` (
  `shipping_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `shipping_method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_order_shipping_mathod`
--

INSERT INTO `sales_order_shipping_mathod` (`shipping_id`, `order_id`, `shipping_method`) VALUES
(1, 1, 'Exprase'),
(2, 2, 'Frade'),
(3, 3, 'Exprase'),
(4, 4, 'Frade'),
(5, 5, 'Exprase');

-- --------------------------------------------------------

--
-- Table structure for table `sales_quote`
--

CREATE TABLE `sales_quote` (
  `quote_id` int(11) NOT NULL,
  `tax_percent` int(11) NOT NULL,
  `grand_total` decimal(12,2) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_quote`
--

INSERT INTO `sales_quote` (`quote_id`, `tax_percent`, `grand_total`, `order_id`, `payment_id`, `shipping_id`) VALUES
(1, 8, 1687.50, 1, 1, 1),
(2, 8, 1125.00, 2, 2, 2),
(3, 8, 3937.50, 3, 3, 3),
(4, 8, 5625.00, 4, 4, 4),
(5, 8, 562.50, 0, 0, 0),
(6, 8, 562.50, 5, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `sales_quote_customer`
--

CREATE TABLE `sales_quote_customer` (
  `quote_customer_id` int(11) NOT NULL,
  `quote_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `billing_address` varchar(255) NOT NULL,
  `billing_city` varchar(255) NOT NULL,
  `billing_region` int(11) NOT NULL,
  `billing_country` int(11) NOT NULL,
  `billing_phone` varchar(255) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `shipping_city` varchar(255) NOT NULL,
  `shipping_region` int(11) NOT NULL,
  `shipping_country` int(11) NOT NULL,
  `shipping_phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_quote_customer`
--

INSERT INTO `sales_quote_customer` (`quote_customer_id`, `quote_id`, `customer_id`, `email`, `billing_address`, `billing_city`, `billing_region`, `billing_country`, `billing_phone`, `shipping_address`, `shipping_city`, `shipping_region`, `shipping_country`, `shipping_phone`) VALUES
(1, 1, 1, 'pappu@gmail.com', 'Swapna Shrusti Residency', 'Surat', 1, 91, '8141458299', 'Swapna Shrusti Residency', 'Surat', 1, 91, '8141458299'),
(2, 2, 1, 'pappu@gmail.com', 'Swapna Shrusti Residency', 'Surat', 1, 91, '8141458299', 'Swapna Shrusti Residency', 'Surat', 1, 91, '8141458299'),
(3, 3, 2, 'abc@gmail.com', 'Janta Socirty', 'Navsari', 2, 91, '9998190770', 'Janta Socirty', 'Navsari', 2, 91, '9998190770'),
(4, 4, 2, 'abc@gmail.com', 'Janta Socirty', 'Navsari', 2, 91, '9998190770', 'Janta Socirty', 'Navsari', 2, 91, '9998190770'),
(5, 6, 1, 'pappu@gmail.com', 'Swapna Shrusti Residency', 'Surat', 1, 91, '8141458299', 'Swapna Shrusti Residency', 'Surat', 1, 91, '8141458299');

-- --------------------------------------------------------

--
-- Table structure for table `sales_quote_item`
--

CREATE TABLE `sales_quote_item` (
  `item_id` int(11) NOT NULL,
  `quote_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `row_total` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_quote_item`
--

INSERT INTO `sales_quote_item` (`item_id`, `quote_id`, `product_id`, `price`, `qty`, `row_total`) VALUES
(1, 1, 2, 500.00, 3, 1500.00),
(2, 2, 12, 500.00, 2, 1000.00),
(3, 3, 4, 500.00, 7, 3500.00),
(4, 4, 7, 500.00, 10, 5000.00),
(5, 5, 2, 500.00, 1, 500.00),
(6, 6, 1, 500.00, 1, 500.00);

-- --------------------------------------------------------

--
-- Table structure for table `sales_quote_payment_method`
--

CREATE TABLE `sales_quote_payment_method` (
  `payment_id` int(11) NOT NULL,
  `quote_id` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `card_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_quote_payment_method`
--

INSERT INTO `sales_quote_payment_method` (`payment_id`, `quote_id`, `payment_method`, `card_number`) VALUES
(1, 1, 'COD', 0),
(2, 2, 'Credit Card', 152364789),
(3, 3, 'UPI', 0),
(4, 4, 'Credit Card', 987456321),
(5, 6, 'COD', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales_quote_shipping_method`
--

CREATE TABLE `sales_quote_shipping_method` (
  `shipping_id` int(11) NOT NULL,
  `quote_id` int(11) NOT NULL,
  `shipping_method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_quote_shipping_method`
--

INSERT INTO `sales_quote_shipping_method` (`shipping_id`, `quote_id`, `shipping_method`) VALUES
(1, 1, 'Exprase'),
(2, 2, 'Frade'),
(3, 3, 'Exprase'),
(4, 4, 'Frade'),
(5, 6, 'Exprase');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `catalog_category`
--
ALTER TABLE `catalog_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `catalog_product`
--
ALTER TABLE `catalog_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `ccc_category`
--
ALTER TABLE `ccc_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `ccc_product`
--
ALTER TABLE `ccc_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `ccc_temp_converter`
--
ALTER TABLE `ccc_temp_converter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `sales_order_customer`
--
ALTER TABLE `sales_order_customer`
  ADD PRIMARY KEY (`order_customer_id`);

--
-- Indexes for table `sales_order_item`
--
ALTER TABLE `sales_order_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `sales_order_payment_mathod`
--
ALTER TABLE `sales_order_payment_mathod`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `sales_order_shipping_mathod`
--
ALTER TABLE `sales_order_shipping_mathod`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `sales_quote`
--
ALTER TABLE `sales_quote`
  ADD PRIMARY KEY (`quote_id`);

--
-- Indexes for table `sales_quote_customer`
--
ALTER TABLE `sales_quote_customer`
  ADD PRIMARY KEY (`quote_customer_id`);

--
-- Indexes for table `sales_quote_item`
--
ALTER TABLE `sales_quote_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `sales_quote_payment_method`
--
ALTER TABLE `sales_quote_payment_method`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `sales_quote_shipping_method`
--
ALTER TABLE `sales_quote_shipping_method`
  ADD PRIMARY KEY (`shipping_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `catalog_category`
--
ALTER TABLE `catalog_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `catalog_product`
--
ALTER TABLE `catalog_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ccc_category`
--
ALTER TABLE `ccc_category`
  MODIFY `category_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ccc_product`
--
ALTER TABLE `ccc_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ccc_temp_converter`
--
ALTER TABLE `ccc_temp_converter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales_order_customer`
--
ALTER TABLE `sales_order_customer`
  MODIFY `order_customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales_order_item`
--
ALTER TABLE `sales_order_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales_order_payment_mathod`
--
ALTER TABLE `sales_order_payment_mathod`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales_order_shipping_mathod`
--
ALTER TABLE `sales_order_shipping_mathod`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales_quote`
--
ALTER TABLE `sales_quote`
  MODIFY `quote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales_quote_customer`
--
ALTER TABLE `sales_quote_customer`
  MODIFY `quote_customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales_quote_item`
--
ALTER TABLE `sales_quote_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales_quote_payment_method`
--
ALTER TABLE `sales_quote_payment_method`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales_quote_shipping_method`
--
ALTER TABLE `sales_quote_shipping_method`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ccc_product`
--
ALTER TABLE `ccc_product`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `ccc_category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
