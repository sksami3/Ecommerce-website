-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2018 at 12:10 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `id` int(5) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `userid` int(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `pro_det_id` int(25) NOT NULL,
  `pro_name` varchar(25) NOT NULL,
  `price` float NOT NULL,
  `picture` text,
  `quantity` int(20) NOT NULL,
  `customer` varchar(500) NOT NULL,
  `total_price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `pro_det_id`, `pro_name`, `price`, `picture`, `quantity`, `customer`, `total_price`) VALUES
(10, 5, 'xbox 6', 4421.3, 'uploads\\images\\bd2thqhpsgcsvrjqit2akuhbdnfdb8.jpg', 3, 'samia@gmail.com', 13263.9),
(11, 5, 'xbox 6', 4421.3, 'uploads\\images\\bd2thqhpsgcsvrjqit2akuhbdnfdb8.jpg', 3, 'samia@gmail.com', 13263.9);

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `id` int(100) NOT NULL,
  `cat_name` varchar(500) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `isDelete` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`id`, `cat_name`, `created_at`, `updated_at`, `isDelete`) VALUES
(11, 'Man', '2018-12-19', '2018-12-19', 'false'),
(12, 'Woman', '2018-12-19', '2018-12-19', 'false'),
(13, 'Sports', '2018-12-19', '2018-12-19', 'false'),
(14, 'Electronics And Home Appliens', '2018-12-19', '2018-12-19', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `email`, `password`) VALUES
(1, 'customer@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `employes`
--

CREATE TABLE `employes` (
  `id` int(5) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `userid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employes`
--

INSERT INTO `employes` (`id`, `firstname`, `lastname`, `email`, `password`, `userid`) VALUES
(1, 'a', 'a', 'eeee@gmail.com', '1234', 'scsd');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `man_id` int(100) NOT NULL,
  `man_name` varchar(500) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `isDelete` varchar(100) NOT NULL,
  `sub_cat_id` int(100) NOT NULL,
  `made_in` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`man_id`, `man_name`, `created_at`, `updated_at`, `isDelete`, `sub_cat_id`, `made_in`) VALUES
(3, 'Sony', '2018-12-19', '2018-12-19', 'false', 5, 'Japan'),
(4, 'Singer', '2018-12-19', '2018-12-19', 'false', 5, 'Japan'),
(5, 'Infinity', '2018-12-22', '2018-12-22', 'false', 3, 'Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(100) NOT NULL,
  `pro_name` varchar(500) NOT NULL,
  `cat_id` int(100) NOT NULL,
  `sub_cat_id` int(100) NOT NULL,
  `man_id` int(100) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `isDelete` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `cat_id`, `sub_cat_id`, `man_id`, `created_at`, `updated_at`, `isDelete`) VALUES
(5, 'Shirt5662', 11, 3, 5, '2018-12-22', '2018-12-22', 'true'),
(6, 'xbox 6', 14, 5, 3, '2018-12-22', '2018-12-22', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `pro_det_id` int(100) NOT NULL,
  `p_id` int(100) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `supp_id` int(100) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` int(100) NOT NULL,
  `picture` varchar(500) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `writing` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`pro_det_id`, `p_id`, `product_name`, `supp_id`, `price`, `quantity`, `picture`, `discount`, `writing`) VALUES
(8, 6, 'xbox 6', 2, 555555, 55, 'uploads\\images\\ievpicjvlw7wat64o6aidpjpbjldao.jpg', 5, 'vvv'),
(9, 5, 'Shirt5662', 3, 78000, 55, 'uploads\\images\\xpnw3oontbgyxsjlzyr9ez6lopoc5b.PNG', 4, 'fdb db d');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(100) NOT NULL,
  `username` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `email`, `password`, `type`) VALUES
(1, 'sami', 'employee@gmail.com', '1234', 'admin'),
(2, 'fxNeoV', 'sami@gmail.com', '1234', 'customer'),
(3, 'QevcAz', 'samia@gmail.com', '1234', 'customer'),
(4, 'fJBQc9', 'donor@ymail.com', '12345', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `sub_catagory`
--

CREATE TABLE `sub_catagory` (
  `sub_cat_id` int(100) NOT NULL,
  `sub_cat_name` varchar(500) NOT NULL,
  `cat_id` int(100) NOT NULL,
  `created_by` varchar(500) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `isDelete` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_catagory`
--

INSERT INTO `sub_catagory` (`sub_cat_id`, `sub_cat_name`, `cat_id`, `created_by`, `created_at`, `updated_at`, `isDelete`) VALUES
(3, 'Cloths', 11, 'employee@gmail.com', '2018-12-19', '2018-12-19', 'false'),
(5, 'Mobile', 14, 'employee@gmail.com', '2018-12-19', '2018-12-19', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supp_id` int(100) NOT NULL,
  `supp_name` varchar(500) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `isDelete` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supp_id`, `supp_name`, `created_at`, `updated_at`, `isDelete`) VALUES
(2, 'Rangs Electronics', '2018-12-18', '2018-12-18', 'false'),
(3, 'Infinity', '2018-12-19', '2018-12-19', 'false');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`man_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`pro_det_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_catagory`
--
ALTER TABLE `sub_catagory`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `userid` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employes`
--
ALTER TABLE `employes`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `man_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `pro_det_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sub_catagory`
--
ALTER TABLE `sub_catagory`
  MODIFY `sub_cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supp_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
