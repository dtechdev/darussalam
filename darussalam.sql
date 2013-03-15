-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 15, 2013 at 06:28 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

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
  `product_price` decimal(2,0) NOT NULL,
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
  `frenchise_id` int(11) NOT NULL,
  `added_date` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`catagory_id`),
  KEY `catagory_id` (`catagory_id`),
  KEY `catagory_id_2` (`catagory_id`),
  KEY `user_id` (`frenchise_id`),
  KEY `parent_id` (`parent_id`),
  KEY `frenchise_id` (`frenchise_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(255) NOT NULL,
  `short_name` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`city_id`),
  KEY `city_id` (`city_id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `frenchise`
--

CREATE TABLE IF NOT EXISTS `frenchise` (
  `frenchise_id` int(11) NOT NULL AUTO_INCREMENT,
  `frenchise_name` varchar(255) NOT NULL,
  `frenchise_address` varchar(255) NOT NULL,
  `site_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `layout_id` int(11) NOT NULL,
  PRIMARY KEY (`frenchise_id`),
  KEY `frenchise_id` (`frenchise_id`),
  KEY `site_id` (`site_id`),
  KEY `country_id` (`country_id`),
  KEY `country_id_2` (`country_id`),
  KEY `frenchise_id_2` (`frenchise_id`),
  KEY `site_id_2` (`site_id`),
  KEY `country_id_3` (`country_id`),
  KEY `layout_id` (`layout_id`),
  KEY `city_id` (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  UNIQUE KEY `site_id_2` (`site_id`),
  KEY `layout_id` (`layout_id`),
  KEY `site_id` (`site_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `total_price` decimal(2,0) NOT NULL,
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
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `prouduct_name` varchar(255) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `frenchise_id` int(11) NOT NULL,
  `added_date` varchar(255) NOT NULL,
  `is_featured` enum('0','1') NOT NULL,
  `product_price` decimal(2,0) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `user_id` (`frenchise_id`),
  KEY `user_id_2` (`frenchise_id`),
  KEY `product_id` (`product_id`),
  KEY `product_id_2` (`product_id`),
  KEY `profile_id` (`profile_id`),
  KEY `user_id_3` (`frenchise_id`),
  KEY `frenchise_id` (`frenchise_id`),
  KEY `frenchise_id_2` (`frenchise_id`)
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
-- Table structure for table `product_order`
--

CREATE TABLE IF NOT EXISTS `product_order` (
  `user_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`user_order_id`),
  KEY `customer_order_id` (`user_order_id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`),
  KEY `user_order_id` (`user_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_profile`
--

CREATE TABLE IF NOT EXISTS `product_profile` (
  `profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_type` varchar(255) NOT NULL,
  `product_price` decimal(2,0) NOT NULL,
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
  KEY `site_id` (`site_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_type` enum('superadmin','admin','customer') NOT NULL,
  `status` enum('active','inactive','banned') NOT NULL COMMENT '1 for active 0 for disabled',
  `frenchise_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`),
  KEY `user_id_3` (`user_id`),
  KEY `frenchise_id` (`frenchise_id`),
  KEY `frenchise_id_2` (`frenchise_id`),
  KEY `user_id_4` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `user_profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`user_profile_id`),
  KEY `customer_id` (`user_profile_id`),
  KEY `user_id` (`user_id`),
  KEY `user_profile_id` (`user_profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `catagories`
--
ALTER TABLE `catagories`
  ADD CONSTRAINT `catagories_ibfk_1` FOREIGN KEY (`frenchise_id`) REFERENCES `frenchise` (`frenchise_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `country`
--
ALTER TABLE `country`
  ADD CONSTRAINT `country_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `site` (`site_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `frenchise`
--
ALTER TABLE `frenchise`
  ADD CONSTRAINT `frenchise_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `site` (`site_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `frenchise_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `frenchise_ibfk_3` FOREIGN KEY (`layout_id`) REFERENCES `layout` (`layout_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `frenchise_ibfk_4` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`frenchise_id`) REFERENCES `frenchise` (`frenchise_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `product_profile` (`profile_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_catagories`
--
ALTER TABLE `product_catagories`
  ADD CONSTRAINT `product_catagories_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_catagories_ibfk_2` FOREIGN KEY (`catagory_id`) REFERENCES `catagories` (`catagory_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `product_order_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_order_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_profile`
--
ALTER TABLE `product_profile`
  ADD CONSTRAINT `product_profile_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `author` (`author_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_profile_ibfk_2` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_4` FOREIGN KEY (`frenchise_id`) REFERENCES `frenchise` (`frenchise_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
