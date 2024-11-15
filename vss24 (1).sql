-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: sql1.njit.edu
-- Generation Time: Nov 15, 2024 at 03:33 PM
-- Server version: 8.0.17
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vss24`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
`adminID` int(11) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `password` char(64) NOT NULL,
  `firstName` varchar(60) NOT NULL,
  `lastName` varchar(60) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminID`, `emailAddress`, `password`, `firstName`, `lastName`) VALUES
(1, 'ldx500.swift@guitarshop.com', '3cdfa761361762ddedc01ea1428db10a92e327325f490f7f34f1b1b91d994f22', 'Taylor', 'Swift'),
(8, 'boy@guitarshop.com', '3cdfa761361762ddedc01ea1428db10a92e327325f490f7f34f1b1b91d994f22', 'Taylor', 'Swift'),
(17, 'taylor@guitarshop.com', '3cdfa761361762ddedc01ea1428db10a92e327325f490f7f34f1b1b91d994f22', 'Taylor', 'Swift');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryCode` varchar(10) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryCode`, `categoryName`) VALUES
(1, 'BK', 'Bikes');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'LDX', 'john@store.com', 'Hola', '2024-10-24 13:05:27'),
(2, 'John', 'taylor@sportshop.com', 'Hola', '2024-10-24 13:06:27'),
(3, 'John', 'taylor@sportshop.com', 'Hola', '2024-10-24 13:07:31'),
(4, 'Vrajesh Shah', 'vss24@njit.edu', 'Hola', '2024-10-24 13:09:45'),
(5, 'Vrajesh Shah', 'vss24@njit.edu', 'Hola', '2024-10-24 13:10:37'),
(6, 'Vrajesh Shah', 'vss24@njit.edu', 'Hola', '2024-10-24 13:15:31');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
`gameid` int(11) NOT NULL,
  `golferid` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=58 ;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`gameid`, `golferid`, `score`) VALUES
(1, 100, 110),
(2, 100, 115),
(3, 100, 105),
(4, 101, 110),
(5, 101, 112),
(6, 101, 130),
(7, 101, 130),
(8, 101, 130),
(9, 102, 130),
(10, 102, 130),
(11, 102, 130),
(12, 103, 130),
(13, 103, 130),
(14, 103, 130),
(15, 103, 130),
(16, 103, 130),
(17, 100, 110),
(18, 100, 115),
(19, 100, 105),
(20, 101, 110),
(21, 101, 112),
(22, 101, 130),
(23, 102, 130),
(24, 102, 130),
(25, 102, 130),
(26, 103, 130),
(27, 103, 130),
(28, 103, 130),
(29, 100, 110),
(30, 100, 115),
(31, 100, 105),
(32, 101, 110),
(33, 101, 112),
(34, 101, 130),
(35, 102, 130),
(36, 102, 130),
(37, 102, 130),
(38, 103, 130),
(39, 103, 130),
(40, 103, 130),
(41, 100, 110),
(42, 100, 115),
(43, 100, 105),
(44, 103, 130),
(45, 103, 130),
(46, 103, 130),
(47, 103, 130),
(48, 103, 130),
(49, 102, 130),
(50, 102, 130),
(51, 102, 130),
(52, 101, 130),
(53, 101, 112),
(54, 101, 110),
(55, 100, 105),
(56, 100, 115),
(57, 100, 110);

-- --------------------------------------------------------

--
-- Table structure for table `golfers`
--

CREATE TABLE IF NOT EXISTS `golfers` (
`golferid` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=601 ;

--
-- Dumping data for table `golfers`
--

INSERT INTO `golfers` (`golferid`, `name`, `address`, `phone`) VALUES
(100, 'Rich', '123 Main St.', '555-1234'),
(101, 'Barbara', '123 Main St.', '555-5678'),
(200, 'Jack', '123 Main St.', '555-1234'),
(600, 'Joe', '123 Main St.', '555-1234');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `itemID` int(11) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `listPrice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemID`, `itemName`, `categoryID`, `listPrice`) VALUES
(608, 'New Balance Men''s V5 Casual Shoes', 1, 120.00),
(1000, 'Fender Stratocaster', 100, 699.00);

-- --------------------------------------------------------

--
-- Table structure for table `SportsEquipmentCategories`
--

CREATE TABLE IF NOT EXISTS `SportsEquipmentCategories` (
`SportsCategoriesID` int(11) NOT NULL,
  `SportsCategoriesCode` varchar(255) NOT NULL,
  `SportsCategoriesName` varchar(255) NOT NULL,
  `SportsCategoriesShelf` varchar(50) NOT NULL,
  `DateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `SportsEquipmentCategories`
--

INSERT INTO `SportsEquipmentCategories` (`SportsCategoriesID`, `SportsCategoriesCode`, `SportsCategoriesName`, `SportsCategoriesShelf`, `DateCreated`) VALUES
(1, 'BK', 'Bicycles', 'Aisle 5', '2024-10-14 10:51:58'),
(2, 'SH', 'Shoes', 'Aisle 4', '2024-10-14 10:51:58'),
(3, 'TN', 'Tennis Rackets', 'Aisle 3', '2024-10-14 10:51:58'),
(25, 'YM', 'Yoga Mat', 'Aisle 1', '2024-10-18 21:47:00'),
(26, 'DM', 'Dumbbell Set', 'Aisle 2', '2024-10-18 21:47:06'),
(27, 'SC', 'Soccer', 'Aisle 6', '2024-11-01 18:25:17'),
(29, 'CK', 'Cricket Kits', 'Aisle 7', '2024-11-01 22:28:26'),
(30, 'BB', 'Baseball Bats', 'Aisle 9', '2024-11-13 13:36:57');

-- --------------------------------------------------------

--
-- Table structure for table `SportsEquipmentManager`
--

CREATE TABLE IF NOT EXISTS `SportsEquipmentManager` (
`SportsEquipmentManagerID` int(11) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `password` char(64) NOT NULL,
  `pronouns` varchar(60) NOT NULL,
  `firstName` varchar(60) NOT NULL,
  `lastName` varchar(60) NOT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `SportsEquipmentManager`
--

INSERT INTO `SportsEquipmentManager` (`SportsEquipmentManagerID`, `emailAddress`, `password`, `pronouns`, `firstName`, `lastName`, `dateCreated`) VALUES
(1, 'john@store.com', 'ba00e03bf575ad59614389ebfa2a778a5a48d051da083caacc916bc6aefaaf79', 'He/Him', 'John', 'Doe', '2024-10-04 17:11:15'),
(2, 'jane@store.com', 'd2b2c4091cd53157a62a98947d991a602317e3331200ef8f21171c6c6a979228', 'She/Her', 'Jane', 'Smith', '2024-10-04 17:11:15'),
(3, 'alex@store.com', 'a86e7519fcb503b2bfbe67440c34642334e8b2bd958204fce38e70d5310ff0d8', 'They/Them', 'Alex', 'Johnson', '2024-10-04 17:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `SportsEquipmentProducts`
--

CREATE TABLE IF NOT EXISTS `SportsEquipmentProducts` (
`SportsProductsID` int(11) NOT NULL,
  `SportsProductsCode` varchar(10) NOT NULL,
  `SportsProductsName` varchar(255) NOT NULL,
  `SportsDescription` text NOT NULL,
  `SportsProductsColor` varchar(255) NOT NULL,
  `SportsCategoryID` int(11) NOT NULL,
  `SportsWholesalePrice` decimal(10,2) NOT NULL,
  `SportsListPrice` decimal(10,2) NOT NULL,
  `DateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=55 ;

--
-- Dumping data for table `SportsEquipmentProducts`
--

INSERT INTO `SportsEquipmentProducts` (`SportsProductsID`, `SportsProductsCode`, `SportsProductsName`, `SportsDescription`, `SportsProductsColor`, `SportsCategoryID`, `SportsWholesalePrice`, `SportsListPrice`, `DateCreated`) VALUES
(1, 'BK01', 'Mountain Bike', 'Durable bike for off-road cycling.', 'Red', 1, 500.00, 650.00, '2024-10-18 21:59:23'),
(2, 'BK02', 'Road Bike', 'Lightweight bike for speed on paved roads.', 'Blue', 1, 800.00, 999.00, '2024-10-18 21:59:23'),
(3, 'BK03', 'Hybrid Bike', 'Versatile bike for both on and off-road.', 'Green', 1, 600.00, 750.00, '2024-10-18 21:59:23'),
(4, 'SH01', 'Running Shoes', 'Comfortable shoes for long-distance running.', 'Black', 2, 70.00, 100.00, '2024-10-18 21:59:30'),
(5, 'SH02', 'Basketball Shoes', 'High-ankle shoes for basketball players.', 'White', 2, 120.00, 150.00, '2024-10-18 21:59:30'),
(6, 'SH03', 'Tennis Shoes', 'Grippy shoes for better movement on the court.', 'Yellow', 2, 90.00, 130.00, '2024-10-18 21:59:30'),
(7, 'TN01', 'Wilson Pro Staff', 'A professional-grade tennis racket.', 'Black', 3, 150.00, 200.00, '2024-10-18 21:59:32'),
(8, 'TN02', 'Babolat Pure Drive', 'Powerful racket for advanced players.', 'Blue', 3, 180.00, 230.00, '2024-10-18 21:59:32'),
(9, 'TN03', 'Yonex Ezone', 'Lightweight racket with improved control.', 'Green', 3, 140.00, 190.00, '2024-10-18 21:59:32'),
(10, 'DM01', 'Adjustable Dumbbells', 'Weight-adjustable dumbbells for strength training.', 'Silver', 25, 50.00, 80.00, '2024-10-18 21:59:34'),
(11, 'DM02', 'Hex Dumbbells', 'Hexagon-shaped dumbbells for stability.', 'Black', 25, 40.00, 60.00, '2024-10-18 21:59:34'),
(12, 'DM03', 'Vinyl Dumbbells', 'Lightweight vinyl dumbbells for toning.', '0', 25, 20.00, 30.00, '2024-10-18 21:59:34'),
(13, 'YM01', 'Eco-Friendly Yoga Mat', 'Non-toxic and durable yoga mat.', 'Green', 26, 25.00, 40.00, '2024-10-18 21:59:36'),
(14, 'YM02', 'Extra Thick Yoga Mat', 'Extra cushion for joint comfort during yoga.', 'Purple', 26, 30.00, 45.00, '2024-10-18 21:59:36'),
(15, 'YM03', 'Travel Yoga Mat', 'Foldable and lightweight yoga mat for travel.', 'Blue', 26, 20.00, 35.00, '2024-10-18 21:59:36'),
(37, 'CF SLX7', 'Canyon Endurance', 'A modern road bike for long rides.', 'Black', 1, 3000.00, 3599.00, '2024-10-18 22:03:51'),
(38, 'AJ1', 'Air Jordan 1 Retro High', 'Classic sneaker with premium materials.', 'White', 2, 150.00, 180.00, '2024-10-18 22:03:53'),
(39, 'BA PA2023', 'Babolat Pure Aero Team 2023', 'Racquet for intermediate players.', 'Blue', 3, 200.00, 259.00, '2024-10-18 22:03:54'),
(44, 'SC1', 'Adidas MLS 24', 'A match ball that marks a historic moment in US soccer history', '0', 27, 100.00, 120.00, '2024-11-01 18:34:44'),
(45, 'CK1', 'SG Cricket Bag', 'SG RSD Spark Kashmir Willow Kits', '0', 29, 500.00, 550.00, '2024-11-01 22:36:59'),
(49, 'CK2', 'MRF Cricket Kit', 'MRF VK18 Spark English Willow Kits', '0', 29, 600.00, 700.00, '2024-11-01 22:39:04'),
(50, 'r', 'SG Cricket Bag', 'GooFD Cricket Bar', '0', 1, 440.00, 438.00, '2024-11-05 11:40:33'),
(52, 'BB01', 'Frosty Firestorm', 'The hottest bat in the game is getting an ice-cold refresh Redesigned Thermo Composite Technology™ Barrel', '0', 30, 400.00, 500.00, '2024-11-13 13:48:56'),
(54, 'BB02', 'Louisville Slugger', 'EVOKE Alloy Barrel: Designed with the help of artificial intelligence using thousands of computer simulations, resulting in an optimized wall design along the entire length of the barrel.; Updated Premium LS Pro Comfort Grip: For ultimate tack and cushion', '0', 30, 500.00, 650.00, '2024-11-13 13:50:42');

-- --------------------------------------------------------

--
-- Table structure for table `SportsProducts`
--

CREATE TABLE IF NOT EXISTS `SportsProducts` (
  `SportsProductsID` int(11) NOT NULL,
  `SportsProductsCode` varchar(10) NOT NULL,
  `SportsProductsName` varchar(255) NOT NULL,
  `SportsDescription` text NOT NULL,
  `SportsProductsColor` varchar(255) NOT NULL,
  `SportsCategoryID` int(11) NOT NULL,
  `SportsWholesalePrice` decimal(10,2) NOT NULL,
  `SportsListPrice` decimal(10,2) NOT NULL,
  `DateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `SportsProducts`
--

INSERT INTO `SportsProducts` (`SportsProductsID`, `SportsProductsCode`, `SportsProductsName`, `SportsDescription`, `SportsProductsColor`, `SportsCategoryID`, `SportsWholesalePrice`, `SportsListPrice`, `DateCreated`) VALUES
(1000, 'CF SLX7', 'Canyon Endurance', 'Strike the balance between comfort, speed, and control on your longest road rides. The Endurace is a modern road bike that’s up for anything. On any road you point it at.', 'Black', 100, 3000.00, 3599.00, '2024-10-10 16:34:21'),
(2000, 'Jordan', 'Air Jordan 1 Retro High', 'The Air Jordan 1 Retro High remakes the classic sneaker, giving you a fresh look with a familiar feel. Premium materials with new colors and textures give modern expression to an all-time favorite.', 'White', 200, 150.00, 180.00, '2024-10-10 16:34:22'),
(3000, 'MLT', 'Babolat Pure Aero Team 2023 Tennis Racquet', 'The Pure Aero Team offers a crisp and responsive frame for beginner and intermediate players. Expect plenty of power and spin from this racquet, and very mobile weight and balance.', 'Blue', 300, 200.00, 259.00, '2024-10-10 16:34:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
 ADD PRIMARY KEY (`adminID`), ADD UNIQUE KEY `emailAddress` (`emailAddress`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
 ADD PRIMARY KEY (`gameid`);

--
-- Indexes for table `golfers`
--
ALTER TABLE `golfers`
 ADD PRIMARY KEY (`golferid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
 ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `SportsEquipmentCategories`
--
ALTER TABLE `SportsEquipmentCategories`
 ADD PRIMARY KEY (`SportsCategoriesID`), ADD UNIQUE KEY `SportsCategoriesCode` (`SportsCategoriesCode`);

--
-- Indexes for table `SportsEquipmentManager`
--
ALTER TABLE `SportsEquipmentManager`
 ADD PRIMARY KEY (`SportsEquipmentManagerID`), ADD UNIQUE KEY `emailAddress` (`emailAddress`);

--
-- Indexes for table `SportsEquipmentProducts`
--
ALTER TABLE `SportsEquipmentProducts`
 ADD PRIMARY KEY (`SportsProductsID`), ADD UNIQUE KEY `SportsProductsCode` (`SportsProductsCode`), ADD KEY `SportsCategoryID` (`SportsCategoryID`);

--
-- Indexes for table `SportsProducts`
--
ALTER TABLE `SportsProducts`
 ADD PRIMARY KEY (`SportsProductsID`), ADD UNIQUE KEY `SportsProductsCode` (`SportsProductsCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
MODIFY `gameid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `golfers`
--
ALTER TABLE `golfers`
MODIFY `golferid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=601;
--
-- AUTO_INCREMENT for table `SportsEquipmentCategories`
--
ALTER TABLE `SportsEquipmentCategories`
MODIFY `SportsCategoriesID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `SportsEquipmentManager`
--
ALTER TABLE `SportsEquipmentManager`
MODIFY `SportsEquipmentManagerID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `SportsEquipmentProducts`
--
ALTER TABLE `SportsEquipmentProducts`
MODIFY `SportsProductsID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `SportsEquipmentProducts`
--
ALTER TABLE `SportsEquipmentProducts`
ADD CONSTRAINT `SportsEquipmentProducts_ibfk_1` FOREIGN KEY (`SportsCategoryID`) REFERENCES `SportsEquipmentCategories` (`SportsCategoriesID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
