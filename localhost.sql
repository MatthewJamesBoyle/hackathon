-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 20, 2014 at 01:00 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `car`
--
CREATE DATABASE IF NOT EXISTS `car` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `car`;

-- --------------------------------------------------------

--
-- Table structure for table `dealer`
--

CREATE TABLE IF NOT EXISTS `dealer` (
  `dealerid` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `number` varchar(10) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE IF NOT EXISTS `driver` (
  `driverid` int(11) NOT NULL DEFAULT '0',
  `forename` varchar(20) DEFAULT NULL,
  `surname` varchar(20) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `business` varchar(60) DEFAULT NULL,
  `address1` varchar(50) DEFAULT NULL,
  `address2` varchar(50) DEFAULT NULL,
  `county` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `postcode` varchar(10) DEFAULT NULL,
  `pin` varchar(8) DEFAULT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`driverid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driverid`, `forename`, `surname`, `mobile`, `email`, `business`, `address1`, `address2`, `county`, `country`, `postcode`, `pin`, `password`) VALUES
(123456789, 'test', NULL, NULL, 'test@test.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `fleetid` int(11) NOT NULL DEFAULT '0',
  `driverid` int(11) NOT NULL,
  `text` char(1) DEFAULT NULL,
  `email` char(1) DEFAULT NULL,
  `push` char(1) DEFAULT NULL,
  PRIMARY KEY (`fleetid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`fleetid`, `driverid`, `text`, `email`, `push`) VALUES
(1, 123456789, 'N', 'Y', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE IF NOT EXISTS `orderdetails` (
  `fleetid` int(11) DEFAULT NULL,
  `previous_expected_delivery_dt` datetime DEFAULT NULL,
  `current_expected_delivery_dt` datetime DEFAULT NULL,
  `dealerid` int(11) DEFAULT NULL,
  `driverid` int(11) DEFAULT NULL,
  `address1` varchar(100) DEFAULT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `county` varchar(30) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `postcode` varchar(10) DEFAULT NULL,
  `make` varchar(10) DEFAULT NULL,
  `model` varchar(10) DEFAULT NULL,
  `spec` varchar(50) DEFAULT NULL,
  `reason` varchar(200) DEFAULT NULL,
  `actual_delivery_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`fleetid`, `previous_expected_delivery_dt`, `current_expected_delivery_dt`, `dealerid`, `driverid`, `address1`, `address2`, `county`, `country`, `postcode`, `make`, `model`, `spec`, `reason`, `actual_delivery_dt`) VALUES
(1, NULL, NULL, NULL, 123456789, NULL, NULL, NULL, NULL, NULL, 'Audi', 'A3', 'Random car', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `fleetid` int(11) NOT NULL,
  `order_status` varchar(20) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `comment` varchar(200) DEFAULT NULL,
  `visibility` char(1) DEFAULT NULL,
  `notification` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`fleetid`, `order_status`, `date`, `comment`, `visibility`, `notification`) VALUES
(1, 'Dealer Order', '2014-05-19 00:00:00', NULL, NULL, '0'),
(1, 'Factory Order', '2014-05-19 08:00:00', NULL, NULL, '0'),
(1, 'Dealer Stock', '2014-05-20 00:00:00', NULL, NULL, '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
