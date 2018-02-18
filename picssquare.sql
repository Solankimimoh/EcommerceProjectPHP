-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2017 at 05:12 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `picssquare`
--

-- --------------------------------------------------------

--
-- Table structure for table `addline`
--

CREATE TABLE `addline` (
  `addline_id` int(11) NOT NULL,
  `line` varchar(900) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addline`
--

INSERT INTO `addline` (`addline_id`, `line`) VALUES
(1, 'Offer on Photo Frame');

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `admnusername` varchar(25) NOT NULL,
  `admnpwd` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`admnusername`, `admnpwd`) VALUES
('admin1@gmail.com', 'sdf');

-- --------------------------------------------------------

--
-- Table structure for table `auto_apply_coupon`
--

CREATE TABLE `auto_apply_coupon` (
  `c_id` int(255) NOT NULL,
  `c_code` varchar(25) NOT NULL,
  `c_apply_from` int(25) NOT NULL,
  `c_apply_to` int(25) NOT NULL,
  `c_discount` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auto_apply_coupon`
--

INSERT INTO `auto_apply_coupon` (`c_id`, `c_code`, `c_apply_from`, `c_apply_to`, `c_discount`) VALUES
(1, 'A12SD', 100, 300, '10'),
(2, 'B58D1', 300, 600, '15'),
(3, 'H22DF', 600, 800, '25'),
(4, 'AH365', 800, 1000, '35'),
(5, 'NW12E', 1000, 2000, '50');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(5) NOT NULL,
  `cat_name` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(13, 'Photo Frame');

-- --------------------------------------------------------

--
-- Table structure for table `guest_order_detail`
--

CREATE TABLE `guest_order_detail` (
  `g_o_id` int(255) NOT NULL,
  `g_o_email` varchar(160) NOT NULL,
  `g_o_total_amount` varchar(150) NOT NULL,
  `g_o_address` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guest_order_product_detail`
--

CREATE TABLE `guest_order_product_detail` (
  `g_p_id` int(255) NOT NULL,
  `g_p_qty` varchar(150) NOT NULL,
  `g_p_price` varchar(150) NOT NULL,
  `g_p_total_price` varchar(180) NOT NULL,
  `g_o_id` varchar(150) NOT NULL,
  `pro_id` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(255) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_code` varchar(25) NOT NULL,
  `p_desc` varchar(150) NOT NULL,
  `cat_id` varchar(5) NOT NULL,
  `p_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_code`, `p_desc`, `cat_id`, `p_price`) VALUES
(42, 'Photo Print in Frame', 'XX80VV', 'new frame', '13', 232);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `p_img_id` int(255) NOT NULL,
  `p_id` int(255) NOT NULL,
  `p_img_name` varchar(150) NOT NULL,
  `cat_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`p_img_id`, `p_id`, `p_img_name`, `cat_id`) VALUES
(38, 0, '05-frameology-blog-4-gold-wood-frame-11x14-01_P.jpg', ''),
(43, 42, 'il_fullxfull_P.jpg', '13');

-- --------------------------------------------------------

--
-- Table structure for table `promocode_apply`
--

CREATE TABLE `promocode_apply` (
  `promo_id` int(255) NOT NULL,
  `promo_code` varchar(25) NOT NULL,
  `promo_discount` varchar(25) NOT NULL,
  `promo_owner` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `r_id` int(255) NOT NULL,
  `r_fullname` varchar(180) NOT NULL,
  `r_email` varchar(60) NOT NULL,
  `r_password` varchar(50) NOT NULL,
  `r_promo_code` varchar(15) NOT NULL,
  `r_number` varchar(25) NOT NULL,
  `r_address` varchar(500) NOT NULL,
  `r_city` varchar(60) NOT NULL,
  `r_state` varchar(50) NOT NULL,
  `r_country` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shiping_charge`
--

CREATE TABLE `shiping_charge` (
  `s_id` int(255) NOT NULL,
  `s_amount_from` int(50) NOT NULL,
  `s_amount_to` int(50) NOT NULL,
  `shiping_charge` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shiping_charge`
--

INSERT INTO `shiping_charge` (`s_id`, `s_amount_from`, `s_amount_to`, `shiping_charge`) VALUES
(1, 0, 300, '100'),
(2, 300, 600, '70'),
(3, 600, 800, '55'),
(4, 800, 1000, '45'),
(5, 1000, 250000, '30');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `location_id` int(11) NOT NULL,
  `user_mobile` bigint(20) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `is_owner` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `location_id`, `user_mobile`, `user_email`, `user_password`, `is_owner`) VALUES
(3, 'Poojal', 3, 56235456234, 'poojal@gmail.com', '123', 'No'),
(4, 'Pasoon Manalai Khan', 5, 8758695069, 'pasoon@gmail.com', '123', 'No'),
(5, 'Pasoon', 4, 99734, 'pasoonmanalai@gmail.com', '123', 'Yes'),
(6, 'Iqbal ', 6, 43534534242, 'iqbal@gmail.com', '123', 'Yes'),
(7, 'Iqbal', 7, 345083242, 'iqbal_user@gmail.com', '1234', 'No'),
(15, 'susu', 0, 8401644820, 'susu@gmail.com', '123', 'NO'),
(16, 'susu', 0, 8401644801, 'susu123@gmail.com', '123', 'NO'),
(17, 'work', 0, 12323123213, 'work@gmail.com', '123', 'NO'),
(18, 'sukem ', 0, 1236980745, 'su@as.com', '123', 'NO'),
(19, 'majama', 0, 61978646946, 'majama@gmail.com', '1234', 'YES'),
(20, 'maac ', 0, 840164801, 'maac@f.com', '1234', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `user_order_detail`
--

CREATE TABLE `user_order_detail` (
  `o_id` int(255) NOT NULL,
  `o_lgn_email` varchar(50) NOT NULL,
  `o_u_email` varchar(65) NOT NULL,
  `o_total_amount` int(25) NOT NULL,
  `o_u_address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_order_product_detail`
--

CREATE TABLE `user_order_product_detail` (
  `p_id` int(255) NOT NULL,
  `p_qty` varchar(60) NOT NULL,
  `p_price` varchar(60) NOT NULL,
  `p_total_price` varchar(60) NOT NULL,
  `o_id` varchar(255) NOT NULL,
  `pro_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `v_id` int(255) NOT NULL,
  `v_name` varchar(25) NOT NULL,
  `v_pwd` varchar(25) NOT NULL,
  `r_fullname` varchar(150) NOT NULL,
  `r_number` varchar(150) NOT NULL,
  `r_address` varchar(500) NOT NULL,
  `r_city` varchar(60) NOT NULL,
  `r_state` varchar(70) NOT NULL,
  `r_country` varchar(90) NOT NULL,
  `r_category` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addline`
--
ALTER TABLE `addline`
  ADD PRIMARY KEY (`addline_id`);

--
-- Indexes for table `auto_apply_coupon`
--
ALTER TABLE `auto_apply_coupon`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `guest_order_detail`
--
ALTER TABLE `guest_order_detail`
  ADD PRIMARY KEY (`g_o_id`);

--
-- Indexes for table `guest_order_product_detail`
--
ALTER TABLE `guest_order_product_detail`
  ADD PRIMARY KEY (`g_p_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`p_img_id`);

--
-- Indexes for table `promocode_apply`
--
ALTER TABLE `promocode_apply`
  ADD PRIMARY KEY (`promo_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `shiping_charge`
--
ALTER TABLE `shiping_charge`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_order_detail`
--
ALTER TABLE `user_order_detail`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `user_order_product_detail`
--
ALTER TABLE `user_order_product_detail`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addline`
--
ALTER TABLE `addline`
  MODIFY `addline_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `auto_apply_coupon`
--
ALTER TABLE `auto_apply_coupon`
  MODIFY `c_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `guest_order_detail`
--
ALTER TABLE `guest_order_detail`
  MODIFY `g_o_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `guest_order_product_detail`
--
ALTER TABLE `guest_order_product_detail`
  MODIFY `g_p_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `p_img_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `promocode_apply`
--
ALTER TABLE `promocode_apply`
  MODIFY `promo_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `r_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shiping_charge`
--
ALTER TABLE `shiping_charge`
  MODIFY `s_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `user_order_detail`
--
ALTER TABLE `user_order_detail`
  MODIFY `o_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_order_product_detail`
--
ALTER TABLE `user_order_product_detail`
  MODIFY `p_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `v_id` int(255) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
