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
-- Table structure for table `SportsEquipmentCategories`
--

CREATE TABLE IF NOT EXISTS `SportsEquipmentCategories` (
`SportsCategoriesID` int(11) NOT NULL,
  `SportsCategoriesCode` varchar(255) NOT NULL,
  `SportsCategoriesName` varchar(255) NOT NULL,
  `SportsCategoriesShelf` varchar(50) NOT NULL,
  `DateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `SportsEquipmentCategories`
--

INSERT INTO `SportsEquipmentCategories` (`SportsCategoriesID`, `SportsCategoriesCode`, `SportsCategoriesName`, `SportsCategoriesShelf`, `DateCreated`) VALUES
(1, 'BK', 'Bicycles', 'Aisle 5', '2024-10-14 10:51:58'),
(2, 'SH', 'Shoes', 'Aisle 4', '2024-10-14 10:51:58'),
(3, 'TN', 'Tennis Rackets', 'Aisle 3', '2024-10-14 10:51:58'),
(25, 'YM', 'Yoga Mat', 'Aisle 1', '2024-10-18 21:47:00'),
(26, 'DM', 'Dumbbell Set', 'Aisle 2', '2024-10-18 21:47:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `SportsEquipmentCategories`
--
ALTER TABLE `SportsEquipmentCategories`
 ADD PRIMARY KEY (`SportsCategoriesID`), ADD UNIQUE KEY `SportsCategoriesCode` (`SportsCategoriesCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `SportsEquipmentCategories`
--
ALTER TABLE `SportsEquipmentCategories`
MODIFY `SportsCategoriesID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
