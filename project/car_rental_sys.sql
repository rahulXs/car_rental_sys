-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 23, 2018 at 06:12 PM
-- Server version: 5.7.22-0ubuntu18.04.1
-- PHP Version: 7.2.5-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `uname`, `pass`) VALUES
(1, 'admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
  `bill_id` int(10) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `bill_date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `tax_amount` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `billing_details`
--

INSERT INTO `billing_details` (`bill_id`, `booking_id`, `bill_date`, `amount`, `tax_amount`, `total_amount`) VALUES
(1, 1, '2017-11-25', '16000.00', '1600.00', '17600.00'),
(2, 2, '2017-11-17', '12000.00', '1200.00', '13200.00'),
(3, 3, '2017-11-04', '15000.00', '1500.00', '16500.00'),
(4, 5, '2017-12-30', '19500.00', '1950.00', '21450.00'),
(5, 5, '2017-12-30', '19500.00', '1950.00', '21450.00');

--
-- Triggers `billing_details`
--
DELIMITER $$
CREATE TRIGGER `increment_in_stock` AFTER INSERT ON `billing_details` FOR EACH ROW UPDATE car_type
SET in_stock=(in_stock)+1
WHERE car_type_id=(SELECT car_type_id FROM car_detail, booking_details WHERE car_detail.car_id=booking_details.car_id AND booking_id=new.booking_id)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `booking_id` int(20) NOT NULL,
  `car_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `return_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`booking_id`, `car_id`, `cust_id`, `from_date`, `return_date`) VALUES
(1, 3, 1, '2017-11-21', '2017-11-25'),
(2, 5, 1, '2017-11-15', '2017-11-17'),
(3, 3, 4, '2017-11-01', '2017-11-04'),
(4, 7, 1, '2017-11-03', NULL),
(5, 9, 9, '2017-12-27', '2017-12-30');

--
-- Triggers `booking_details`
--
DELIMITER $$
CREATE TRIGGER `auto_bill_generate` AFTER UPDATE ON `booking_details` FOR EACH ROW INSERT INTO billing_details
SET booking_id=old.booking_id,
bill_date=new.return_date,
amount=(datediff(new.return_date, old.from_date))*(SELECT rental_price FROM car_detail WHERE car_id=old.car_id),
tax_amount=(amount * 0.1),
total_amount=amount+tax_amount
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `decrement_in_stock` AFTER INSERT ON `booking_details` FOR EACH ROW UPDATE car_type
SET in_stock=(in_stock)-1
WHERE car_type_id=(SELECT car_type_id FROM car_detail, booking_details WHERE car_detail.car_id=booking_details.car_id AND booking_id=new.booking_id)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `set_unavailable` AFTER INSERT ON `booking_details` FOR EACH ROW UPDATE car_detail
SET car_detail.status= 'Unavailable'
WHERE car_id=(SELECT car_id FROM booking_details WHERE booking_id=new.booking_id)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `car_detail`
--

CREATE TABLE `car_detail` (
  `car_id` int(11) NOT NULL,
  `car_type_id` int(11) NOT NULL,
  `reg_id` varchar(255) NOT NULL,
  `car_name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `rental_price` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car_detail`
--

INSERT INTO `car_detail` (`car_id`, `car_type_id`, `reg_id`, `car_name`, `image`, `rental_price`, `status`) VALUES
(1, 1, 'UP65AD9999', 'TATA nano', 'car1.jpg', 2200, 'Available'),
(2, 1, 'WB56AF2222', 'Maruti Alto', 'car2.jpg\r\n', 3000, 'Available'),
(3, 2, 'UP65AD4534', 'Wagon R', 'car3.jpg', 5000, 'Available'),
(4, 3, 'DL11CA2322', 'Hyundai City', 'car4.jpg', 5000, 'Available'),
(5, 4, 'UP65AD0001', 'Scorpio', 'car5.jpg', 6000, 'Available'),
(6, 4, 'DL22AF12345', 'Renault duster', 'car6.jpg', 5000, 'Available'),
(7, 3, 'UP65P3425', 'Audi A8', 'car7.jpg', 4500, 'Unavailable'),
(8, 3, 'UP65M6565', 'Mercedes Benz', 'car8.jpg', 5500, 'Available'),
(9, 3, 'MP45S5676', 'BMW 3 series', 'car9.jpg', 8000, 'Available'),
(10, 2, 'WB12S231423', 'Indica v2', 'car10.jpg', 4200, 'Available'),
(11, 2, 'UP65M8784', 'i10', 'car11.jpg', 4300, 'Available'),
(12, 2, 'MH70P4567', 'i20', 'car12.jpg', 4800, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `car_type`
--

CREATE TABLE `car_type` (
  `car_type_id` int(11) NOT NULL,
  `car_type_name` varchar(50) NOT NULL,
  `in_stock` int(11) NOT NULL,
  `in_repair` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car_type`
--

INSERT INTO `car_type` (`car_type_id`, `car_type_name`, `in_stock`, `in_repair`) VALUES
(1, 'Economy', 21, 0),
(2, 'Standard', 12, 0),
(3, 'Premium', 21, 0),
(4, 'SUV', 22, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `dl_no` varchar(10) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `contact_no` char(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `dl_no`, `first_name`, `last_name`, `dob`, `address`, `city`, `state`, `contact_no`, `password`, `email_id`) VALUES
(1, 'UPIN12345', 'Rahul', 'Sharma', '1995-11-14', 'c-117', 'kanpur', 'uttar pradesh', '9455342356', 'rahul', 'rahulsharmaacn@gmail.com'),
(2, 'UPIN11111', 'Avinash', 'tripathi', '1996-01-01', 'c-117', 'kanpur', 'uttar pradesh', '8765432100', 'avinash', 'avi@gmail.com'),
(3, '58323265', 'Amitabh', 'kumar', '1997-08-07', 'jsjgasbk', 'Kanpur', 'Uttar Pradesh', '8532826584', 'amitabh', 'nisi.rahul16@yahoo.com'),
(4, 'IN42432', 'Akash', 'Pandey', '1996-11-15', 'Mall road', 'kanpur', 'uttar pradesh', '9898976543', 'akash', 'akash@gmail.com'),
(5, 'IN567567', 'Mohini', 'Tiwari', '1995-11-08', 'gumti', 'kanpur', 'uttar pradesh', '9987000876', 'mohini', 'mohini@gmail.com'),
(6, 'IN23424235', 'Kanak', 'Balani', '1994-11-01', 'swaroop nagar', 'kanpur', 'uttar pradesh', '9000087009', 'kanak', 'kanak@gmail.com'),
(7, 'IN5424345', 'Prachi', 'xyz', '1994-11-07', 'kalyanpur', 'kanpur', 'uttar pradesh', '8900009876', 'prachi', 'prachi@gmail.com'),
(8, 'DL1213', 'Deepak Verma', 'Sir', '1985-06-08', 'mall road', 'Kanpur', 'Uttar Pradesh', '9455342350', 'deepak', 'deepak@gmail.com'),
(9, 'upjjln5678', 'Rohit', 'Sharma', '1947-08-15', 'dln', 'ghazipur', 'Uttar Pradesh', '9415350468', '18158920', 'FOOL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `car_id` (`car_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `car_detail`
--
ALTER TABLE `car_detail`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `car_type_id` (`car_type_id`);

--
-- Indexes for table `car_type`
--
ALTER TABLE `car_type`
  ADD PRIMARY KEY (`car_type_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing_details`
--
ALTER TABLE `billing_details`
  MODIFY `bill_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `booking_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `car_detail`
--
ALTER TABLE `car_detail`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD CONSTRAINT `billing_details_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking_details` (`booking_id`);

--
-- Constraints for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD CONSTRAINT `booking_details_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `car_detail` (`car_id`),
  ADD CONSTRAINT `booking_details_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`);

--
-- Constraints for table `car_detail`
--
ALTER TABLE `car_detail`
  ADD CONSTRAINT `car_detail_ibfk_1` FOREIGN KEY (`car_type_id`) REFERENCES `car_type` (`car_type_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
