-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 26, 2013 at 07:50 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `darussalam`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `author_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_name` varchar(255) NOT NULL,
  PRIMARY KEY (`author_id`),
  KEY `author_id` (`author_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `added_date` varchar(255) NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `cart_id` (`cart_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE IF NOT EXISTS `catagories` (
  `catagory_id` int(11) NOT NULL AUTO_INCREMENT,
  `catagory_name` varchar(255) NOT NULL,
  `added_date` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `city_id` int(11) NOT NULL,
  PRIMARY KEY (`catagory_id`),
  KEY `catagory_id` (`catagory_id`),
  KEY `catagory_id_2` (`catagory_id`),
  KEY `parent_id` (`parent_id`),
  KEY `city_id` (`city_id`),
  KEY `city_id_2` (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `short_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `layout_id` int(11) NOT NULL,
  PRIMARY KEY (`city_id`),
  KEY `city_id` (`city_id`),
  KEY `layout_id` (`layout_id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `country_id`, `city_name`, `short_name`, `address`, `layout_id`) VALUES
(3, 1, 'Lahore', 'lhr', 'STR lahore', 3),
(4, 2, 'New York', 'ny', 'stc ny 5400', 15),
(5, 1, 'Karachi', 'kc', 'nazim abad', 23);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(255) NOT NULL,
  `short_name` varchar(255) NOT NULL,
  `site_id` int(11) NOT NULL,
  PRIMARY KEY (`country_id`),
  KEY `country_id` (`country_id`),
  KEY `site_id` (`site_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `short_name`, `site_id`) VALUES
(1, 'Pakistan', 'pk', 1),
(2, 'United States', 'US', 1);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_name` varchar(255) NOT NULL,
  PRIMARY KEY (`language_id`),
  KEY `language_id` (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `layout`
--

CREATE TABLE IF NOT EXISTS `layout` (
  `layout_id` int(11) NOT NULL AUTO_INCREMENT,
  `layout_name` varchar(255) NOT NULL,
  `layout_description` varchar(255) NOT NULL,
  `layout_color` varchar(255) NOT NULL,
  `site_id` int(11) NOT NULL,
  PRIMARY KEY (`layout_id`),
  UNIQUE KEY `layout_id_2` (`layout_id`),
  KEY `layout_id` (`layout_id`),
  KEY `site_id` (`site_id`),
  KEY `site_id_2` (`site_id`),
  KEY `site_id_3` (`site_id`),
  KEY `layout_id_3` (`layout_id`),
  KEY `site_id_4` (`site_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `layout`
--

INSERT INTO `layout` (`layout_id`, `layout_name`, `layout_description`, `layout_color`, `site_id`) VALUES
(3, 'memories', 'layout', 'purple', 1),
(15, 'classic', 'classic theme', 'black', 1),
(23, 'default', 'default', 'black', 1);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `added_date` varchar(255) NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `total_price` decimal(10,4) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `order_id` (`order_id`),
  KEY `customer_id` (`user_id`),
  KEY `order_id_2` (`order_id`),
  KEY `customer_id_2` (`user_id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `user_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` decimal(10,4) NOT NULL,
  PRIMARY KEY (`user_order_id`),
  KEY `customer_order_id` (`user_order_id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`),
  KEY `user_order_id` (`user_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `prouduct_name` varchar(255) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `added_date` varchar(255) NOT NULL,
  `is_featured` enum('0','1') NOT NULL,
  `product_price` decimal(10,4) NOT NULL,
  `discount_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `user_id` (`city_id`),
  KEY `user_id_2` (`city_id`),
  KEY `product_id` (`product_id`),
  KEY `product_id_2` (`product_id`),
  KEY `profile_id` (`profile_id`),
  KEY `user_id_3` (`city_id`),
  KEY `frenchise_id` (`city_id`),
  KEY `frenchise_id_2` (`city_id`),
  KEY `city_id` (`city_id`),
  KEY `discount_id` (`discount_id`),
  KEY `discount_id_2` (`discount_id`),
  KEY `discount_id_3` (`discount_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_catagories`
--

CREATE TABLE IF NOT EXISTS `product_catagories` (
  `product_catagory_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `catagory_id` int(11) NOT NULL,
  PRIMARY KEY (`product_catagory_id`),
  KEY `catagory_id` (`catagory_id`),
  KEY `product_id` (`product_id`),
  KEY `product_catagory_id` (`product_catagory_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_discount`
--

CREATE TABLE IF NOT EXISTS `product_discount` (
  `discount_id` int(11) NOT NULL AUTO_INCREMENT,
  `discount_type` enum('fixed','percentage') NOT NULL,
  `discount_value` decimal(10,4) NOT NULL,
  PRIMARY KEY (`discount_id`),
  KEY `discount_id` (`discount_id`),
  KEY `discount_id_2` (`discount_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE IF NOT EXISTS `product_image` (
  `product_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image_title` varchar(255) NOT NULL,
  `image_small` varchar(255) NOT NULL,
  `image_large` varchar(255) NOT NULL,
  PRIMARY KEY (`product_image_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_profile`
--

CREATE TABLE IF NOT EXISTS `product_profile` (
  `profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_type` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  PRIMARY KEY (`profile_id`),
  KEY `profile_id` (`profile_id`),
  KEY `author_id` (`author_id`),
  KEY `profile_id_2` (`profile_id`),
  KEY `author_id_2` (`author_id`),
  KEY `language_id` (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE IF NOT EXISTS `site` (
  `site_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(255) NOT NULL,
  `site_descriptoin` varchar(255) NOT NULL,
  PRIMARY KEY (`site_id`),
  KEY `site_id` (`site_id`),
  KEY `site_id_2` (`site_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`site_id`, `site_name`, `site_descriptoin`) VALUES
(1, 'darussalam', 'darussalam'),
(2, 'yahoo.com', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL COMMENT '1 for active 0 for disabled',
  `city_id` int(11) DEFAULT NULL,
  `activation_key` varchar(255) NOT NULL,
  `is_active` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `site_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`),
  KEY `user_id_3` (`user_id`),
  KEY `frenchise_id` (`city_id`),
  KEY `frenchise_id_2` (`city_id`),
  KEY `user_id_4` (`user_id`),
  KEY `city_id` (`city_id`),
  KEY `site_id` (`site_id`),
  KEY `role_id` (`role_id`),
  KEY `status_id` (`status_id`),
  KEY `role_id_2` (`role_id`),
  KEY `status_id_2` (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `role_id`, `status_id`, `city_id`, `activation_key`, `is_active`, `site_id`) VALUES
(2, 'zahid', 'zahid', 1, 1, NULL, '', 'inactive', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `user_profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  PRIMARY KEY (`user_profile_id`),
  KEY `customer_id` (`user_profile_id`),
  KEY `user_id` (`user_id`),
  KEY `user_profile_id` (`user_profile_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`user_profile_id`, `user_id`, `first_name`, `last_name`, `address`, `email`, `contact_number`) VALUES
(1, 2, 'zahid', 'nadeem', 'STC lahore', 'zahidiubb@yahoo.com', '03336566326');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_title` varchar(255) NOT NULL,
  PRIMARY KEY (`role_id`),
  KEY `role_id` (`role_id`),
  KEY `role_id_2` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role_title`) VALUES
(1, 'superadmin'),
(2, 'admin'),
(3, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE IF NOT EXISTS `user_status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_title` varchar(255) NOT NULL,
  PRIMARY KEY (`status_id`),
  KEY `status_id` (`status_id`),
  KEY `status_id_2` (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`status_id`, `status_title`) VALUES
(1, 'active'),
(2, 'inactive');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `author`
--
ALTER TABLE `author`
  ADD CONSTRAINT `author_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `product_profile` (`author_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `catagories`
--
ALTER TABLE `catagories`
  ADD CONSTRAINT `catagories_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_2` FOREIGN KEY (`layout_id`) REFERENCES `layout` (`layout_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `country`
--
ALTER TABLE `country`
  ADD CONSTRAINT `country_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `site` (`site_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `language`
--
ALTER TABLE `language`
  ADD CONSTRAINT `language_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `product_profile` (`language_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `layout`
--
ALTER TABLE `layout`
  ADD CONSTRAINT `layout_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `site` (`site_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`discount_id`) REFERENCES `product_discount` (`discount_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_catagories`
--
ALTER TABLE `product_catagories`
  ADD CONSTRAINT `product_catagories_ibfk_1` FOREIGN KEY (`catagory_id`) REFERENCES `catagories` (`catagory_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_catagories_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_profile`
--
ALTER TABLE `product_profile`
  ADD CONSTRAINT `product_profile_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `product` (`profile_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_4` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `site` (`site_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `user_status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
