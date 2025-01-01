-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 09, 2023 at 04:47 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furniture_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `Admin_ID` int(11) NOT NULL,
  `Admin_Name` varchar(30) DEFAULT NULL,
  `Password` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`Admin_ID`, `Admin_Name`, `Password`) VALUES
(1, 'Admin', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE `Category` (
  `Category_ID` int(11) NOT NULL,
  `Category_Name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`Category_ID`, `Category_Name`) VALUES
(1, 'Office'),
(2, 'Home');

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `Customer_ID` int(11) NOT NULL,
  `Customer_Name` varchar(30) DEFAULT NULL,
  `Password` varchar(40) DEFAULT NULL,
  `C_Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`Customer_ID`, `Customer_Name`, `Password`, `C_Date`) VALUES
(1, 'Khant', '81dc9bdb52d04dc20036dbd8313ed055', '2023-07-25'),
(2, 'Saw', '81dc9bdb52d04dc20036dbd8313ed055', '2023-07-25'),
(3, 'Kaung', '81b073de9370ea873f548e31b8adc081', '2023-07-26');

-- --------------------------------------------------------

--
-- Table structure for table `Feedback`
--

CREATE TABLE `Feedback` (
  `Feedback_ID` int(11) NOT NULL,
  `Feedback` varchar(255) DEFAULT NULL,
  `Customer_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Feedback`
--

INSERT INTO `Feedback` (`Feedback_ID`, `Feedback`, `Customer_ID`) VALUES
(1, 'Amazing Website!', 1),
(2, 'Amazing Website!', 1);

-- --------------------------------------------------------

--
-- Table structure for table `OrderDetail`
--

CREATE TABLE `OrderDetail` (
  `OrderDetail_ID` int(11) NOT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Order_ID` int(11) NOT NULL,
  `ProductDetail_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `OrderDetail`
--

INSERT INTO `OrderDetail` (`OrderDetail_ID`, `Quantity`, `Order_ID`, `ProductDetail_ID`) VALUES
(1, 9, 1, 2),
(2, 5, 1, 3),
(3, 9, 2, 2),
(4, 5, 2, 3),
(5, 1, 3, 2),
(6, 2, 4, 2),
(7, 2, 5, 2),
(8, 1, 5, 1),
(9, 2, 6, 2),
(10, 1, 6, 1),
(11, 2, 7, 2),
(12, 1, 7, 1),
(13, 2, 8, 2),
(14, 1, 8, 1),
(15, 2, 9, 2),
(16, 2, 9, 1),
(17, 3, 10, 2),
(18, 2, 10, 1),
(19, 3, 11, 2),
(20, 2, 11, 1),
(21, 3, 12, 2),
(22, 2, 12, 1),
(23, 3, 13, 2),
(24, 2, 13, 1),
(25, 3, 14, 2),
(26, 2, 14, 1),
(27, 3, 15, 2),
(28, 2, 15, 1),
(29, 2, 16, 1),
(30, 1, 16, 2),
(31, 10, 17, 2),
(32, 4, 17, 1),
(33, 3, 18, 2),
(34, 4, 18, 1),
(35, 4, 19, 1),
(36, 3, 19, 2),
(37, 1, 20, 1),
(38, 3, 20, 2),
(39, 1, 21, 2),
(40, 1, 22, 1),
(41, 1, 22, 3),
(42, 1, 23, 2),
(43, 1, 24, 2),
(44, 1, 24, 3),
(45, 1, 25, 2),
(46, 1, 25, 1),
(47, 1, 26, 1),
(48, 1, 27, 1),
(49, 1, 28, 2),
(50, 1, 28, 3),
(51, 1, 28, 1),
(52, 4, 29, 2),
(53, 1, 29, 3),
(54, 1, 29, 1),
(55, 4, 30, 2),
(56, 1, 30, 3),
(57, 1, 30, 1),
(58, 1, 31, 3),
(59, 1, 31, 1),
(60, 1, 32, 1),
(61, 5, 33, 1),
(62, 1, 33, 3),
(63, 5, 34, 1),
(64, 2, 35, 1),
(65, 1, 35, 3),
(66, 1, 35, 2),
(67, 6, 36, 3),
(68, 5, 36, 2),
(69, 6, 36, 1),
(70, 4, 37, 2),
(71, 6, 40, 1),
(72, 8, 40, 2),
(73, 6, 40, 3),
(74, 1, 41, 2),
(75, 1, 41, 3),
(76, 1, 41, 1),
(77, 1, 42, 2),
(78, 1, 42, 3),
(79, 1, 42, 1),
(80, 4, 43, 1),
(81, 4, 43, 3),
(82, 5, 44, 3),
(83, 1, 45, 2),
(84, 1, 45, 3),
(85, 1, 46, 1),
(86, 1, 47, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ProductDetail`
--

CREATE TABLE `ProductDetail` (
  `ProductDetail_ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Image` varchar(100) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `SubC_ID` int(11) NOT NULL,
  `WoodType_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ProductDetail`
--

INSERT INTO `ProductDetail` (`ProductDetail_ID`, `Name`, `Image`, `Price`, `Description`, `SubC_ID`, `WoodType_ID`) VALUES
(1, 'Dining Table', 'table1.jpeg', 10, ' Family Dining Table Set', 1, 1),
(2, 'Stationary Chair', 'chair.png', 5, 'Stylish stationary chair', 3, 2),
(3, 'Cabinet', 'Cabinet.jpeg', 15, 'Swing door cabinet with handle & lock', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `P_Order`
--

CREATE TABLE `P_Order` (
  `Order_ID` int(11) NOT NULL,
  `Totalamount` int(11) DEFAULT NULL,
  `Status` varchar(30) DEFAULT NULL,
  `Pay_type` varchar(50) NOT NULL,
  `O_Date` date DEFAULT NULL,
  `Customer_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `P_Order`
--

INSERT INTO `P_Order` (`Order_ID`, `Totalamount`, `Status`, `Pay_type`, `O_Date`, `Customer_ID`) VALUES
(1, 120, 'Confirmed', '', '2023-07-24', 1),
(2, 120, 'Confirmed', '', '2023-07-24', 1),
(3, 5, 'Confirmed', '', '2023-07-24', 1),
(4, 10, 'Confirmed', '', '2023-07-24', 1),
(5, 20, 'Confirmed', '', '2023-07-24', 1),
(6, 20, 'Cancelled', '', '2023-07-24', 1),
(7, 20, 'Cancelled', '', '2023-07-24', 1),
(8, 20, 'Cancelled', '', '2023-07-24', 1),
(9, 30, 'Cancelled', '', '2023-07-24', 1),
(10, 35, 'Confirmed', '', '2023-07-24', 1),
(11, 35, 'Pending', '', '2023-07-24', 1),
(12, 35, 'Pending', '', '2023-07-24', 1),
(13, 35, 'Pending', '', '2023-07-24', 1),
(14, 35, 'Confirmed', '', '2023-07-24', 1),
(15, 35, 'Pending', '', '2023-07-25', 1),
(16, 25, 'Pending', '', '2023-07-25', 1),
(17, 90, 'Pending', '', '2023-07-25', 1),
(18, 55, 'Pending', '', '2023-07-25', 1),
(19, 55, 'Pending', '', '2023-07-25', 1),
(20, 25, 'Pending', '', '2023-07-25', 1),
(21, 5, 'Confirmed', '', '2023-07-25', 1),
(22, 25, 'Confirmed', '', '2023-07-25', 1),
(23, 5, 'Pending', '', '2023-07-25', 1),
(24, 20, 'Pending', '', '2023-07-25', 1),
(25, 15, 'Pending', '', '2023-07-25', 1),
(26, 10, 'Pending', '', '2023-07-25', 1),
(27, 10, 'Pending', '', '2023-07-25', 1),
(28, 30, 'Pending', '', '2023-07-25', 1),
(29, 45, 'Pending', '', '2023-07-25', 1),
(30, 45, 'Pending', '', '2023-07-25', 1),
(31, 25, 'Pending', '', '2023-07-25', 1),
(32, 10, 'Pending', '', '2023-07-25', 1),
(33, 65, 'Pending', '', '2023-07-25', 1),
(34, 50, 'Pending', '', '2023-07-25', 1),
(35, 40, 'Pending', '', '2023-07-25', 1),
(36, 175, 'Pending', '', '2023-07-25', 1),
(37, 20, 'Pending', '', '2023-07-27', 1),
(38, 0, 'Pending', '', '2023-07-27', 1),
(39, 0, 'Pending', '', '2023-07-27', 1),
(40, 190, 'Confirmed', '', '2023-08-09', 1),
(41, 30, 'Pending', 'kbz-pay', '2023-08-22', 1),
(42, 30, 'Pending', 'Cash-down', '2023-08-22', 1),
(43, 100, 'Confirmed', 'wave-money', '2023-08-22', 1),
(44, 75, 'Confirmed', 'kbz-pay', '2023-08-22', 1),
(45, 20, 'Pending', 'kbz-pay', '2023-10-03', 1),
(46, 10, 'Pending', 'kbz-pay', '2023-11-09', 1),
(47, 10, 'Pending', 'Cash-down', '2023-11-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `SubCategory`
--

CREATE TABLE `SubCategory` (
  `SubC_ID` int(11) NOT NULL,
  `SubC_Name` varchar(100) DEFAULT NULL,
  `Category_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `SubCategory`
--

INSERT INTO `SubCategory` (`SubC_ID`, `SubC_Name`, `Category_ID`) VALUES
(1, 'Table', 1),
(2, 'Cabinet', 1),
(3, 'Chair', 1);

-- --------------------------------------------------------

--
-- Table structure for table `WoodType`
--

CREATE TABLE `WoodType` (
  `WoodType_ID` int(11) NOT NULL,
  `WoodType_Name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `WoodType`
--

INSERT INTO `WoodType` (`WoodType_ID`, `WoodType_Name`) VALUES
(1, 'Teak'),
(2, 'Padauk'),
(3, 'Mahogany');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `Feedback`
--
ALTER TABLE `Feedback`
  ADD PRIMARY KEY (`Feedback_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`);

--
-- Indexes for table `OrderDetail`
--
ALTER TABLE `OrderDetail`
  ADD PRIMARY KEY (`OrderDetail_ID`),
  ADD KEY `Order_ID` (`Order_ID`),
  ADD KEY `ProductDetail_ID` (`ProductDetail_ID`);

--
-- Indexes for table `ProductDetail`
--
ALTER TABLE `ProductDetail`
  ADD PRIMARY KEY (`ProductDetail_ID`),
  ADD KEY `SubC_ID` (`SubC_ID`),
  ADD KEY `WoodType_ID` (`WoodType_ID`);

--
-- Indexes for table `P_Order`
--
ALTER TABLE `P_Order`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`);

--
-- Indexes for table `SubCategory`
--
ALTER TABLE `SubCategory`
  ADD PRIMARY KEY (`SubC_ID`),
  ADD KEY `Category_ID` (`Category_ID`);

--
-- Indexes for table `WoodType`
--
ALTER TABLE `WoodType`
  ADD PRIMARY KEY (`WoodType_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Category`
--
ALTER TABLE `Category`
  MODIFY `Category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `Customer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Feedback`
--
ALTER TABLE `Feedback`
  MODIFY `Feedback_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `OrderDetail`
--
ALTER TABLE `OrderDetail`
  MODIFY `OrderDetail_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `ProductDetail`
--
ALTER TABLE `ProductDetail`
  MODIFY `ProductDetail_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `P_Order`
--
ALTER TABLE `P_Order`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `SubCategory`
--
ALTER TABLE `SubCategory`
  MODIFY `SubC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `WoodType`
--
ALTER TABLE `WoodType`
  MODIFY `WoodType_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Feedback`
--
ALTER TABLE `Feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`);

--
-- Constraints for table `OrderDetail`
--
ALTER TABLE `OrderDetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`Order_ID`) REFERENCES `P_Order` (`Order_ID`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`ProductDetail_ID`) REFERENCES `ProductDetail` (`ProductDetail_ID`);

--
-- Constraints for table `ProductDetail`
--
ALTER TABLE `ProductDetail`
  ADD CONSTRAINT `productdetail_ibfk_1` FOREIGN KEY (`SubC_ID`) REFERENCES `SubCategory` (`SubC_ID`),
  ADD CONSTRAINT `productdetail_ibfk_2` FOREIGN KEY (`WoodType_ID`) REFERENCES `WoodType` (`WoodType_ID`);

--
-- Constraints for table `P_Order`
--
ALTER TABLE `P_Order`
  ADD CONSTRAINT `p_order_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `Customer` (`Customer_ID`);

--
-- Constraints for table `SubCategory`
--
ALTER TABLE `SubCategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`Category_ID`) REFERENCES `Category` (`Category_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
