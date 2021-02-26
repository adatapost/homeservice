-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Feb 26, 2021 at 02:15 AM
-- Server version: 8.0.18
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `home_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_category`
--

DROP TABLE IF EXISTS `business_category`;
CREATE TABLE IF NOT EXISTS `business_category` (
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`category_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_feedback`
--

DROP TABLE IF EXISTS `business_feedback`;
CREATE TABLE IF NOT EXISTS `business_feedback` (
  `feed_id` int(11) NOT NULL AUTO_INCREMENT,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `feed_type` varchar(255) NOT NULL,
  `feed_desc` varchar(4000) DEFAULT NULL,
  `feed_date` datetime DEFAULT NULL,
  `feed_action` varchar(100) DEFAULT NULL,
  `publish` int(11) DEFAULT NULL,
  PRIMARY KEY (`feed_id`),
  KEY `from_user_id` (`from_user_id`),
  KEY `to_user_id` (`to_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_message`
--

DROP TABLE IF EXISTS `business_message`;
CREATE TABLE IF NOT EXISTS `business_message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `message_title` varchar(255) NOT NULL,
  `message_desc` varchar(4000) DEFAULT NULL,
  `message_date` date DEFAULT NULL,
  PRIMARY KEY (`message_id`),
  KEY `from_user_id` (`from_user_id`),
  KEY `to_user_id` (`to_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_product`
--

DROP TABLE IF EXISTS `business_product`;
CREATE TABLE IF NOT EXISTS `business_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_desc` varchar(4000) DEFAULT NULL,
  `product_photo` varchar(255) DEFAULT NULL,
  `avilable` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_service`
--

DROP TABLE IF EXISTS `business_service`;
CREATE TABLE IF NOT EXISTS `business_service` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `service_title` varchar(255) NOT NULL,
  `service_desc` varchar(4000) DEFAULT NULL,
  `business_photo` varchar(255) DEFAULT NULL,
  `avilable` int(11) DEFAULT NULL,
  PRIMARY KEY (`service_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_name` (`category_name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(2, 'Clothes'),
(4, 'Education'),
(5, 'Food'),
(6, 'Insurance'),
(3, 'Software');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(30) NOT NULL,
  `state_id` int(11) NOT NULL,
  PRIMARY KEY (`city_id`),
  KEY `state_id` (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `state_id`) VALUES
(3, 'Mehsana', 192),
(4, 'Jamnagar', 192),
(5, 'Bhimpur', 194);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(30) NOT NULL,
  PRIMARY KEY (`country_id`),
  UNIQUE KEY `country_name` (`country_name`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`) VALUES
(11, 'Hindustan'),
(13, 'Nepal'),
(14, 'UK'),
(15, 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
CREATE TABLE IF NOT EXISTS `state` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(30) NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`state_id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=196 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`, `country_id`) VALUES
(192, 'Gujarat', 11),
(193, 'Rajesthan', 11),
(194, 'Kathmandu', 13);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

DROP TABLE IF EXISTS `user_account`;
CREATE TABLE IF NOT EXISTS `user_account` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `ac_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`),
  UNIQUE KEY `user_mobile` (`user_mobile`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_id`, `user_email`, `user_mobile`, `user_pass`, `role_id`, `created`, `ac_status`) VALUES
(1, 'a@a.com', '88776655', 'aa', 1, '2021-02-17 00:00:00', 1),
(2, 'b@b.com', '1122334455', 'bb', 2, '2021-10-10 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

DROP TABLE IF EXISTS `user_profile`;
CREATE TABLE IF NOT EXISTS `user_profile` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fullname` varchar(255) NOT NULL,
  `user_address1` varchar(255) DEFAULT NULL,
  `user_address2` varchar(255) DEFAULT NULL,
  `user_photo` varchar(255) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `city_id` (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`role_id`),
  UNIQUE KEY `role_name` (`role_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Business'),
(4, 'Moderator'),
(3, 'Visitor');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `business_category`
--
ALTER TABLE `business_category`
  ADD CONSTRAINT `business_category_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_account` (`user_id`),
  ADD CONSTRAINT `business_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `business_feedback`
--
ALTER TABLE `business_feedback`
  ADD CONSTRAINT `business_feedback_ibfk_1` FOREIGN KEY (`from_user_id`) REFERENCES `user_account` (`user_id`),
  ADD CONSTRAINT `business_feedback_ibfk_2` FOREIGN KEY (`to_user_id`) REFERENCES `user_account` (`user_id`);

--
-- Constraints for table `business_message`
--
ALTER TABLE `business_message`
  ADD CONSTRAINT `business_message_ibfk_1` FOREIGN KEY (`from_user_id`) REFERENCES `user_account` (`user_id`),
  ADD CONSTRAINT `business_message_ibfk_2` FOREIGN KEY (`to_user_id`) REFERENCES `user_account` (`user_id`);

--
-- Constraints for table `business_product`
--
ALTER TABLE `business_product`
  ADD CONSTRAINT `business_product_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_account` (`user_id`);

--
-- Constraints for table `business_service`
--
ALTER TABLE `business_service`
  ADD CONSTRAINT `business_service_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_account` (`user_id`);

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`);

--
-- Constraints for table `state`
--
ALTER TABLE `state`
  ADD CONSTRAINT `state_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`);

--
-- Constraints for table `user_account`
--
ALTER TABLE `user_account`
  ADD CONSTRAINT `user_account_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`role_id`);

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`),
  ADD CONSTRAINT `user_profile_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_account` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
