-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: sql1.njit.edu
-- Generation Time: Oct 19, 2024 at 02:07 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=43 ;

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
(12, 'DM03', 'Vinyl Dumbbells', 'Lightweight vinyl dumbbells for toning.', 'Pink', 25, 20.00, 30.00, '2024-10-18 21:59:34'),
(13, 'YM01', 'Eco-Friendly Yoga Mat', 'Non-toxic and durable yoga mat.', 'Green', 26, 25.00, 40.00, '2024-10-18 21:59:36'),
(14, 'YM02', 'Extra Thick Yoga Mat', 'Extra cushion for joint comfort during yoga.', 'Purple', 26, 30.00, 45.00, '2024-10-18 21:59:36'),
(15, 'YM03', 'Travel Yoga Mat', 'Foldable and lightweight yoga mat for travel.', 'Blue', 26, 20.00, 35.00, '2024-10-18 21:59:36'),
(37, 'CF SLX7', 'Canyon Endurance', 'A modern road bike for long rides.', 'Black', 1, 3000.00, 3599.00, '2024-10-18 22:03:51'),
(38, 'AJ1', 'Air Jordan 1 Retro High', 'Classic sneaker with premium materials.', 'White', 2, 150.00, 180.00, '2024-10-18 22:03:53'),
(39, 'BA PA2023', 'Babolat Pure Aero Team 2023', 'Racquet for intermediate players.', 'Blue', 3, 200.00, 259.00, '2024-10-18 22:03:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `SportsEquipmentProducts`
--
ALTER TABLE `SportsEquipmentProducts`
 ADD PRIMARY KEY (`SportsProductsID`), ADD UNIQUE KEY `SportsProductsCode` (`SportsProductsCode`), ADD KEY `SportsCategoryID` (`SportsCategoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `SportsEquipmentProducts`
--
ALTER TABLE `SportsEquipmentProducts`
MODIFY `SportsProductsID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
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
