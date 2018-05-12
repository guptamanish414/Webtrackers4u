-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 01, 2015 at 12:02 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `imposter`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminId` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `adminType` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobileNo` int(10) NOT NULL,
  `addedDate` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `name`, `adminType`, `username`, `password`, `address`, `email`, `mobileNo`, `addedDate`, `active`) VALUES
(26, 'admin@webtrackers.co.in', 'Super Admin', '123', '123', '', '', 0, '2014-02-27 10:48:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE IF NOT EXISTS `agent` (
  `agentId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  `modifyBy` int(11) NOT NULL,
  `modifyDate` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`agentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`agentId`, `name`, `phone`, `address`, `email`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`, `active`) VALUES
(1, 'Mrinal', '9563688919', 'Kolkata', 'mrinal.pain@gmail.com', 26, '2013-05-23 08:47:24', 26, '2013-05-27 07:22:46', 0),
(2, 'Mrinal Kanti Pain', '9563688919', 'Kolkata', 'mrinal.pain@rediffmail.com', 26, '2013-05-28 11:51:43', 26, '2013-05-28 11:51:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `bannerId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `type` varchar(255) NOT NULL,
  `link` varchar(500) NOT NULL,
  `status` varchar(255) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  `modifyBy` int(11) NOT NULL,
  `modifyDate` datetime NOT NULL,
  PRIMARY KEY (`bannerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`bannerId`, `title`, `image`, `type`, `link`, `status`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`) VALUES
(1, 'Flat 40% Off', 'wtos-images/Banner/30_percent_off.jpg', 'Body', '', 'Active', 26, '2014-01-27 10:14:42', 26, '2014-01-27 10:14:42'),
(2, 'Buy 1 get 1 for free', 'wtos-images/Banner/buy_1_get_1_free.jpg', 'Header', '', 'Active', 26, '2014-01-27 10:25:16', 26, '2014-01-27 10:25:16'),
(3, 'T-Shirts Offer', 'wtos-images/Banner/613393_07-02-2014_t-shirts-offer.jpg', 'Body', '', 'Active', 26, '2014-02-07 07:24:02', 26, '2014-02-07 07:24:02'),
(4, 'Offer 1', 'wtos-images/Banner/205903_07-02-2014_lunaluna2011banner.jpg', 'Body', '', 'Active', 26, '2014-02-07 07:28:07', 26, '2014-02-07 07:28:07'),
(5, 'Holi Offer', 'wtos-images/Banner/296663_07-02-2014_Holi_HP_Banner.jpg', 'Header', '', 'Active', 26, '2014-02-07 07:30:36', 26, '2014-02-07 07:30:36');

-- --------------------------------------------------------

--
-- Table structure for table `care`
--

CREATE TABLE IF NOT EXISTS `care` (
  `careId` int(11) NOT NULL AUTO_INCREMENT,
  `customerId` int(11) NOT NULL,
  `refference` varchar(255) NOT NULL,
  `careDate` datetime NOT NULL,
  `deliveryDate` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  `careType` varchar(255) NOT NULL,
  `priority` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `engineerName` varchar(255) NOT NULL,
  `estimatedCharge` double(20,2) NOT NULL,
  `actualCharge` double(20,2) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  `modifyBy` int(11) NOT NULL,
  `modifyDate` datetime NOT NULL,
  PRIMARY KEY (`careId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `care`
--

INSERT INTO `care` (`careId`, `customerId`, `refference`, `careDate`, `deliveryDate`, `status`, `careType`, `priority`, `note`, `engineerName`, `estimatedCharge`, `actualCharge`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`) VALUES
(1, 1, 'Kolkata Branch', '2013-05-17 00:00:00', '2013-05-19 00:00:00', 'Not Delivered', 'Bill', '2', 'This is Note', 'Mrinal', 500.00, 300.00, 26, '2013-05-24 06:56:22', 26, '2013-05-24 06:56:22');

-- --------------------------------------------------------

--
-- Table structure for table `caredetails`
--

CREATE TABLE IF NOT EXISTS `caredetails` (
  `caredetailsId` int(11) NOT NULL AUTO_INCREMENT,
  `careId` int(11) NOT NULL,
  `deliveryDate` datetime NOT NULL,
  `productId` int(11) NOT NULL,
  `make` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `serialNo` varchar(255) NOT NULL,
  `caredetailsStatus` varchar(255) NOT NULL,
  `productCondition` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `engineerName` varchar(255) NOT NULL,
  `withInWarranty` varchar(5) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  `modifyBy` int(11) NOT NULL,
  `modifyDate` datetime NOT NULL,
  PRIMARY KEY (`caredetailsId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `caredetails`
--

INSERT INTO `caredetails` (`caredetailsId`, `careId`, `deliveryDate`, `productId`, `make`, `model`, `serialNo`, `caredetailsStatus`, `productCondition`, `note`, `engineerName`, `withInWarranty`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`) VALUES
(1, 1, '2013-05-24 00:00:00', 1, 'Samsung', 'GT-P1000', '12345', 'Delivered', 'Its Ok', '', 'Mrinal', 'Yes', 26, '2013-05-24 08:02:20', 26, '2013-05-24 08:15:46');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE IF NOT EXISTS `contactus` (
  `contactid` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `details` text NOT NULL,
  `addedBy` varchar(10) NOT NULL,
  `addedDate` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`contactid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contactid`, `name`, `email`, `mobile`, `details`, `addedBy`, `addedDate`, `active`, `image`) VALUES
(8, 'Mizanur Rahaman', 'mizanur82@gmail.com', '5555555555555', 'techno test', '', '2013-01-06 01:45:13', 0, 'wtos-images/822096_testattachment.txt'),
(9, 'xdfsdfsd', 'fdfsd', 'fsdfsdfsfs', '', '', '2013-02-08 05:38:36', 0, ''),
(10, 'atkin williams', 'atkinswilliam561@yahoo.com', '8100449039', 'when shall i be able to get the latest mobiles from urs site ..u stupid', '', '2013-09-24 06:00:02', 0, ''),
(11, 'Dean Michael ', 'Deanmichaeldm@gmail.co.uk', '07543247126', 'I cannot turn my idream tablet on ever since I reset it please could u call me ', '', '2013-12-14 08:33:35', 0, ''),
(12, 'Dean Michael ', 'Deanmichaeldm@gmail.com', ' 07543247126', 'My tablet is broken I need help. My tablet PC will not turn on, ever since I had reset it please help me', '', '2013-12-14 08:39:43', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE IF NOT EXISTS `coupon` (
  `couponId` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `details` tinytext NOT NULL,
  `validFrom` datetime NOT NULL,
  `validTo` datetime NOT NULL,
  `generateDate` datetime NOT NULL,
  `couponType` varchar(255) NOT NULL,
  `productCount` int(5) NOT NULL,
  `discount` double(20,2) NOT NULL,
  `productcategoryId` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  `modifyBy` int(11) NOT NULL,
  `modifyDate` datetime NOT NULL,
  PRIMARY KEY (`couponId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`couponId`, `code`, `details`, `validFrom`, `validTo`, `generateDate`, `couponType`, `productCount`, `discount`, `productcategoryId`, `status`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`) VALUES
(1, 'IM85987', '10 % Discount', '2014-02-05 00:00:00', '2014-02-27 00:00:00', '2014-01-27 00:00:00', 'Percentage', 2, 10.00, 6, 'Active', 26, '2014-01-27 12:34:23', 26, '2014-02-26 11:00:38'),
(2, 'SAVE20', 'SAVE20%', '2014-02-01 00:00:00', '2015-02-12 00:00:00', '2014-02-27 00:00:00', 'Percentage', 0, 20.00, 6, 'Active', 26, '2014-02-27 06:04:38', 26, '2014-02-27 06:04:38');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customerId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` int(3) NOT NULL,
  `shippingAddress` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `pin` varchar(10) NOT NULL,
  `vatNo` varchar(255) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  `modifyBy` int(11) NOT NULL,
  `modifyDate` datetime NOT NULL,
  `vcode` varchar(10) NOT NULL,
  `status` varchar(255) NOT NULL,
  `dealer` varchar(255) NOT NULL DEFAULT 'No',
  PRIMARY KEY (`customerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `name`, `phone`, `email`, `address`, `gender`, `age`, `shippingAddress`, `username`, `password`, `img`, `branch`, `pin`, `vatNo`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`, `vcode`, `status`, `dealer`) VALUES
(1, 'Mrinal Kanti Pain', '9563688919', 'mrinal.pain@gmail.com', 'Garia,Kolkata', 'M', 23, 'Garia,Kolkata', 'mrinal-123', '123', 'wtos-images/tank.gif', 'Kolkata', '700153', 'VAT-123', 26, '2013-05-14 06:40:54', 26, '2013-05-28 07:27:54', '', 'Active', 'No'),
(2, 'Rock', '9851012345', 'a.b@c.com', 'Mumbai', 'M', 28, '', '', '', '', 'Bandra', '452589', 'DFG4587', 26, '2013-05-28 12:06:38', 26, '2013-05-28 12:06:38', '', 'Active', 'No'),
(3, 'Munna', '9851012345', 'a.b@c.com', 'Kochin', 'M', 10, '', '', '', '', '', '', '', 26, '2013-05-28 12:07:41', 26, '2013-05-28 12:07:41', '', 'Inactive', 'No'),
(4, 'Mizanur Rahaman', '8017477871', '', 'kolkata', '', 0, '', '', '', '', '', '', '', 0, '2013-06-16 04:48:43', 0, '0000-00-00 00:00:00', '429890', 'Active', 'No'),
(5, 'Mizanur Rahaman', '8017477871', '', 'kol', '', 0, '', '', '', '', '', '', '', 0, '2013-06-16 04:53:37', 0, '0000-00-00 00:00:00', '893786', 'Active', 'No'),
(6, 'Mizanur Rahaman', '8017477871', '', 'kolkata', '', 0, '', '', '', '', '', '', '', 0, '2013-06-16 04:55:36', 0, '0000-00-00 00:00:00', '573242', 'Active', 'No'),
(7, 'Mizanur Rahaman', '8017477871', '', 'kolkata', '', 0, '', '', '', '', '', '', '', 0, '2013-06-16 04:55:37', 0, '0000-00-00 00:00:00', '573242', 'Active', 'No'),
(8, 'wqeqw', '9733200337,,sib da 9564484688', '', '', '', 0, '', '', '', '', '', '', '', 0, '2013-06-16 04:55:58', 0, '0000-00-00 00:00:00', '551134', 'Inactive', 'No'),
(9, 'Manish', '9874884411', '', '', '', 0, '', '', '', '', '', '', '', 0, '2013-06-16 04:57:08', 0, '0000-00-00 00:00:00', '665362', 'Active', 'No'),
(10, 'dual sim', '9733200337,,sib da 9564484688', '', '', '', 0, '', '', '', '', '', '', '', 0, '2013-06-16 05:01:20', 0, '0000-00-00 00:00:00', '235489', 'Active', 'No'),
(11, 'vbdfg', '8017477871', '', 'St Dunstans Road, W6', '', 0, '', '', '', '', '', '', '', 0, '2013-06-16 05:05:25', 0, '0000-00-00 00:00:00', '819540', 'Active', 'No'),
(12, 'i-dream', '8017477871', '', 'St Dunstans Road, W6', '', 0, '', '', '', '', '', '', '', 0, '2013-06-16 05:33:50', 0, '0000-00-00 00:00:00', '522887', 'Active', 'No'),
(13, 'sf', '9874884411', '', '', '', 0, '', '', '', '', '', '', '', 0, '2013-06-16 05:59:46', 0, '0000-00-00 00:00:00', '770486', 'Inactive', 'No'),
(14, 'broadwayandwest.co.uk', '8017477871', '', 'St Dunstans Road, W6', '', 0, '', '', '', '', '', '', '', 0, '2013-06-17 07:45:24', 0, '0000-00-00 00:00:00', '330693', 'Active', 'No'),
(15, 'broadwayandwest.co.uk', '800098765', '', 'St Dunstans Road, W6', '', 0, '', '', '', '', '', '', '', 0, '2013-06-17 02:01:36', 0, '0000-00-00 00:00:00', '978285', 'Active', 'No'),
(16, 'broadwayandwest.co.uk', '800098765', '', 'St Dunstans Road, W6', '', 0, '', '', '', '', '', '', '', 0, '2013-06-17 02:02:11', 0, '0000-00-00 00:00:00', '39968', 'Active', 'No'),
(17, 'Mizanur Rahaman', '9133 6501 0194', 'mizanur82@gmail.com', 'St Dunstans Road, W6', '', 0, '', '', '12345', '', '', '', '', 0, '2013-07-01 10:48:43', 26, '2014-02-12 12:51:10', '700080', 'Active', 'Yes'),
(18, 'i-dream', '9133 6501 0194', 'mizanur82@gmail.com', '', 'M', 10, '', '', '', '', '', '', '', 0, '2013-07-01 11:19:59', 26, '2013-07-01 12:00:01', '234884', 'Active', 'No'),
(19, 'arupam', '0091 9635403722', 'arupam_123@yahoo.co.in', 'np210', '', 0, '', '', '', '', '', '', '', 0, '2013-07-01 01:00:52', 0, '0000-00-00 00:00:00', '53184', 'Active', 'No'),
(20, 'Ashish Babariya', '9924969175', 'babariaashish@gmail.com', 'Baroda', '', 0, '', '', '', '', '', '', '', 0, '2013-07-16 12:21:42', 26, '2014-01-27 12:35:49', '377788', 'Inactive', 'No'),
(21, 'Padora singh', '988', 'kammodarling@fdsfsd.com', 'dfdsfsdfdsfsdfsd', '', 0, '', '', '12345', '', '', '', '', 0, '2013-07-28 04:27:28', 26, '2014-02-12 11:30:36', '51872', 'Active', 'No'),
(22, 'dk bose', '1234567890', 'dk@bose.com', 'saltlake', '', 0, 'kolkata', '', '12345', '', '', '', '', 26, '2014-02-13 09:49:57', 26, '2014-02-13 09:57:55', '', 'Active', 'No'),
(23, 'mistu', '1234568970', 'mistu@md.com', 'kalanpur', '', 0, 'kolkata', '', '123456', '', '', '', '', 0, '2014-02-13 10:00:14', 0, '2014-02-13 10:00:14', '', 'Active', 'No'),
(24, 'Mrinal Kanti Pain', '9111111111', 'mrinal.pain@rediffmail.com', 'Kolkata', '', 0, 'Kolkata', '', '123456', '', '', '', '', 0, '2014-02-13 12:07:28', 0, '2014-02-13 12:07:28', '', 'Active', 'No'),
(25, 'Munna', '9111111111', 'n.j@v.com', 'Address', '', 0, 'Address', '', '12345', '', '', '', '', 0, '2014-02-13 01:16:00', 0, '2014-02-13 01:16:00', '', 'Active', 'No'),
(26, 'Munna Bhai', '9000001256', 'mrinal@webtrackers.co.in', 'NP- 210\r\nSALT LAKE SECTOR - V\r\nNEAR TECHNOPOLIS BUILDING\r\nKOLKATA- 700102\r\nWEST BENGAL, INDIA.', '', 0, 'NP- 210\r\nSALT LAKE SECTOR - V\r\nNEAR TECHNOPOLIS BUILDING\r\nKOLKATA- 700102\r\nWEST BENGAL, INDIA.', '', '123456', '', '', '', '', 0, '2014-02-26 04:52:49', 0, '2014-02-26 04:52:49', '', 'Active', 'Yes'),
(27, 'MIzanur Rahaman', '8017477871', 'admin@webtrackers.co.in', 'NP 210 Saltlake sec V\r\nKolkata 102\r\nWest Bengal', '', 0, 'NP 210 Saltlake sec V\r\nKolkata 102\r\nWest Bengal', '', '123', '', '', '', '', 0, '2014-02-26 11:02:59', 0, '2014-02-26 11:02:59', '', 'Active', 'No'),
(28, '565656', '7878787878', '56@hj.lk', '56', '', 0, '56', '', '565656', '', '', '', '', 0, '2014-02-27 12:10:06', 0, '2014-02-27 12:10:06', '', 'Active', 'No'),
(29, 'Test', '7896541236', 'test@test.in', 'road test road 19 test785412', '', 0, 'road test road 19 test785412', '', '123456', '', '', '', '', 0, '2014-02-27 08:52:13', 0, '2014-02-27 08:52:13', '', 'Active', 'No'),
(30, 'test123', '1234533333', 'test123@gmail.com', 'np 210 teat 123', '', 0, 'np 210 teat 123', '', '123', '', '', '', '', 0, '2014-02-28 02:48:47', 0, '2014-02-28 02:48:47', '', 'Active', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `deliverycharge`
--

CREATE TABLE IF NOT EXISTS `deliverycharge` (
  `deliverychargeId` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(255) NOT NULL,
  `charge` double(20,2) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  `modifyBy` int(11) NOT NULL,
  `modifyDate` datetime NOT NULL,
  PRIMARY KEY (`deliverychargeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `deliverycharge`
--

INSERT INTO `deliverycharge` (`deliverychargeId`, `location`, `charge`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`) VALUES
(1, 'Garia', 100.00, 26, '2013-05-14 07:10:08', 26, '2013-05-14 07:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `imageId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `imageType` varchar(255) NOT NULL,
  `imageTypeId` int(11) NOT NULL,
  `featured` varchar(255) NOT NULL DEFAULT 'No',
  `active` tinyint(1) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  `modifyBy` int(11) NOT NULL,
  `modifyDate` datetime NOT NULL,
  PRIMARY KEY (`imageId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`imageId`, `title`, `image`, `imageType`, `imageTypeId`, `featured`, `active`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`) VALUES
(2, 'Product5', 'wtos-images/product/561809_11-02-2014_5.jpg', 'Product', 1, 'Yes', 1, 26, '2013-05-15 07:06:27', 26, '2014-02-11 01:06:32'),
(5, 'Product4 ', 'wtos-images/product/697050_11-02-2014_1.jpg', 'Product', 2, 'No', 0, 26, '2013-06-06 08:32:58', 26, '2014-02-11 11:47:47'),
(10, 'Product3', 'wtos-images/product/301876_07-02-2014_3.png', 'Product', 3, 'No', 1, 26, '2013-06-27 06:20:09', 26, '2014-02-07 07:08:57'),
(11, 'Product2', 'wtos-images/product/134716_07-02-2014_2.png', 'Product', 4, 'No', 1, 26, '2013-07-01 12:48:13', 26, '2014-02-07 07:09:13'),
(12, 'Image2', 'wtos-images/product/776377_06-02-2014_1.png', 'Product', 5, 'No', 1, 26, '2013-07-01 12:54:54', 26, '2014-02-06 07:09:54'),
(13, 'Image1', 'wtos-images/product/155691_06-02-2014_1.jpg', 'Product', 5, 'Yes', 1, 26, '2013-07-02 09:37:17', 26, '2014-02-06 07:09:49'),
(14, 'Product3', 'wtos-images/product/490439_07-02-2014_3.jpg', 'Product', 3, 'Yes', 1, 26, '2013-07-02 09:37:55', 26, '2014-02-07 07:08:50'),
(15, 'Product2', 'wtos-images/product/509005_07-02-2014_2.jpg', 'Product', 4, 'Yes', 1, 26, '2013-07-02 09:38:16', 26, '2014-02-07 07:09:09'),
(16, 'Black S T-Shirt', 'wtos-images/product/110753_11-02-2014_1.jpg', 'Product', 2, 'Yes', 1, 26, '2013-07-02 09:38:58', 26, '2014-02-11 12:42:13'),
(17, 'Product5', 'wtos-images/product/699885_11-02-2014_4.jpg', 'Product', 1, 'No', 1, 26, '2013-07-02 09:41:03', 26, '2014-02-11 01:06:25'),
(18, 'Product4', 'wtos-images/product/327790_11-02-2014_2.jpg', 'Product', 2, 'No', 1, 26, '2014-02-11 12:31:04', 26, '2014-02-11 12:31:04'),
(19, 'Product4', 'wtos-images/product/17402_11-02-2014_6.jpg', 'Product', 2, 'No', 1, 26, '2014-02-11 12:33:42', 26, '2014-02-11 12:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `imageuploader`
--

CREATE TABLE IF NOT EXISTS `imageuploader` (
  `imageId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `addedDate` datetime NOT NULL,
  PRIMARY KEY (`imageId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lang`
--

CREATE TABLE IF NOT EXISTS `lang` (
  `langId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `code` varchar(20) NOT NULL,
  `defaultLang` tinyint(1) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`langId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lang`
--

INSERT INTO `lang` (`langId`, `title`, `code`, `defaultLang`, `addedBy`, `addedDate`, `active`) VALUES
(1, 'English', 'en', 1, 26, '2013-02-26 09:19:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mif`
--

CREATE TABLE IF NOT EXISTS `mif` (
  `mifId` int(11) NOT NULL AUTO_INCREMENT,
  `mifDate` datetime NOT NULL,
  `customerId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `serialNo` varchar(255) NOT NULL,
  `invoiceNo` varchar(255) NOT NULL,
  `installationDate` datetime NOT NULL,
  `fromDate` datetime NOT NULL,
  `toDate` datetime NOT NULL,
  `financialYear` varchar(255) NOT NULL,
  `contactPerson` varchar(255) NOT NULL,
  `contactNo` varchar(255) NOT NULL,
  `expiryMonth` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `note` text NOT NULL,
  `addedBy` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  `modifyBy` int(11) NOT NULL,
  `modifyDate` datetime NOT NULL,
  PRIMARY KEY (`mifId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mif`
--

INSERT INTO `mif` (`mifId`, `mifDate`, `customerId`, `productId`, `serialNo`, `invoiceNo`, `installationDate`, `fromDate`, `toDate`, `financialYear`, `contactPerson`, `contactNo`, `expiryMonth`, `status`, `note`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`) VALUES
(1, '2013-05-16 00:00:00', 1, 1, '12345', '0123', '2013-05-23 00:00:00', '2013-05-23 00:00:00', '2014-06-20 00:00:00', '2014-2015', 'Mrinal', '0123456789', '201406', 'UW', 'Tis is MIF Note', 26, '2013-05-24 10:24:56', 26, '2013-05-24 10:53:24');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `newsId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `addedBy` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  `newsdate` varchar(50) NOT NULL,
  PRIMARY KEY (`newsId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE IF NOT EXISTS `orderdetails` (
  `orderdetailsId` bigint(20) NOT NULL AUTO_INCREMENT,
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(10) NOT NULL DEFAULT '1',
  `serialNo` text NOT NULL,
  `returnQuantity` varchar(10) NOT NULL DEFAULT '0',
  `note` text NOT NULL,
  `returned` tinyint(1) NOT NULL DEFAULT '0',
  `returenedPrice` double(20,2) NOT NULL,
  `returnDate` datetime NOT NULL,
  `purchasePrice` double(20,2) NOT NULL,
  `marketPrice` double(20,2) NOT NULL,
  `ourPrice` double(20,2) NOT NULL,
  `discountAmount` double(20,2) NOT NULL,
  `discountPercent` double(10,2) NOT NULL,
  `amount` double(20,2) NOT NULL,
  `taxPercent` float(5,2) NOT NULL,
  `taxAmount` double(20,2) NOT NULL,
  `totalAmount` double(20,2) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  `modifyBy` int(11) NOT NULL,
  `modifyDate` datetime NOT NULL,
  PRIMARY KEY (`orderdetailsId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orderdetailsId`, `orderId`, `productId`, `quantity`, `serialNo`, `returnQuantity`, `note`, `returned`, `returenedPrice`, `returnDate`, `purchasePrice`, `marketPrice`, `ourPrice`, `discountAmount`, `discountPercent`, `amount`, `taxPercent`, `taxAmount`, `totalAmount`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`) VALUES
(1, 1, 1, 1, '', '0', '', 0, 0.00, '0000-00-00 00:00:00', 0.00, 0.00, 10800.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10800.00, 0, '2013-07-16 12:21:43', 0, '0000-00-00 00:00:00'),
(2, 2, 5, 6, '', '0', '', 0, 0.00, '0000-00-00 00:00:00', 0.00, 0.00, 8000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 48000.00, 0, '2013-07-28 04:27:28', 0, '0000-00-00 00:00:00'),
(10, 6, 2, 2, '', '0', '', 0, 0.00, '0000-00-00 00:00:00', 0.00, 0.00, 500.00, 0.00, 0.00, 1000.00, 0.00, 0.00, 1000.00, 0, '2014-02-26 05:09:00', 0, '2014-02-26 05:09:00'),
(9, 6, 1, 3, '', '0', '', 0, 0.00, '0000-00-00 00:00:00', 0.00, 0.00, 175.00, 0.00, 0.00, 525.00, 0.00, 0.00, 525.00, 0, '2014-02-26 05:09:00', 0, '2014-02-26 05:09:00'),
(11, 7, 1, 2, '', '0', '', 0, 0.00, '0000-00-00 00:00:00', 0.00, 0.00, 175.00, 0.00, 0.00, 350.00, 0.00, 0.00, 350.00, 0, '2014-02-26 10:21:05', 0, '2014-02-26 10:21:05'),
(12, 7, 2, 1, '', '0', '', 0, 0.00, '0000-00-00 00:00:00', 0.00, 0.00, 500.00, 0.00, 0.00, 500.00, 0.00, 0.00, 500.00, 0, '2014-02-26 10:21:05', 0, '2014-02-26 10:21:05'),
(13, 8, 1, 1, '', '0', '', 0, 0.00, '0000-00-00 00:00:00', 0.00, 0.00, 175.00, 0.00, 0.00, 175.00, 0.00, 0.00, 175.00, 0, '2014-02-26 11:04:48', 0, '2014-02-26 11:04:48'),
(14, 8, 2, 1, '', '0', '', 0, 0.00, '0000-00-00 00:00:00', 0.00, 0.00, 500.00, 0.00, 0.00, 500.00, 0.00, 0.00, 500.00, 0, '2014-02-26 11:04:48', 0, '2014-02-26 11:04:48'),
(15, 9, 1, 10, '', '0', '', 0, 0.00, '0000-00-00 00:00:00', 0.00, 0.00, 175.00, 0.00, 0.00, 1750.00, 0.00, 0.00, 1750.00, 0, '2014-02-27 12:10:59', 0, '2014-02-27 12:10:59'),
(16, 10, 2, 1, '', '0', '', 0, 0.00, '0000-00-00 00:00:00', 0.00, 0.00, 500.00, 0.00, 0.00, 500.00, 0.00, 0.00, 500.00, 0, '2014-02-27 06:05:24', 0, '2014-02-27 06:05:24'),
(17, 11, 1, 13, '', '0', '', 0, 0.00, '0000-00-00 00:00:00', 0.00, 0.00, 175.00, 0.00, 0.00, 2275.00, 0.00, 0.00, 2275.00, 0, '2014-02-27 08:52:47', 0, '2014-02-27 08:52:47'),
(18, 12, 4, 1, '', '0', '', 0, 0.00, '0000-00-00 00:00:00', 0.00, 0.00, 522.00, 0.00, 0.00, 522.00, 0.00, 0.00, 522.00, 0, '2014-02-28 02:42:50', 0, '2014-02-28 02:42:50'),
(19, 13, 5, 5, '', '0', '', 0, 0.00, '0000-00-00 00:00:00', 0.00, 0.00, 8000.00, 0.00, 0.00, 40000.00, 0.00, 0.00, 40000.00, 0, '2014-02-28 02:48:57', 0, '2014-02-28 02:48:57'),
(20, 14, 1, 1, '', '0', '', 0, 0.00, '0000-00-00 00:00:00', 0.00, 0.00, 175.00, 0.00, 0.00, 175.00, 0.00, 0.00, 175.00, 0, '2014-03-01 05:46:35', 0, '2014-03-01 05:46:35'),
(21, 15, 5, 1, '', '0', '', 0, 0.00, '0000-00-00 00:00:00', 0.00, 0.00, 8000.00, 0.00, 0.00, 8000.00, 0.00, 0.00, 8000.00, 0, '2014-03-02 10:31:06', 0, '2014-03-02 10:31:06'),
(22, 16, 3, 1, '', '0', '', 0, 0.00, '0000-00-00 00:00:00', 0.00, 0.00, 585.00, 0.00, 0.00, 585.00, 0.00, 0.00, 585.00, 0, '2015-02-25 08:05:04', 0, '2015-02-25 08:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orderId` int(11) NOT NULL AUTO_INCREMENT,
  `orderType` varchar(255) NOT NULL DEFAULT '0',
  `orderCode` varchar(255) NOT NULL,
  `customerId` int(11) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `invoiceId` varchar(255) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  `modifyBy` int(11) NOT NULL,
  `modifyDate` datetime NOT NULL,
  `note` text NOT NULL,
  `specialDiscountTitle` varchar(255) NOT NULL,
  `specialDiscountPrice` double(20,2) NOT NULL,
  `emailTo` text NOT NULL,
  `emailSubject` varchar(255) NOT NULL,
  `emailBody` text NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `messageBody` text NOT NULL,
  `deliveryCharge` double(20,2) NOT NULL,
  `deliveryDate` datetime NOT NULL,
  `orderDate` datetime NOT NULL,
  `cancelledByCustomer` tinyint(1) NOT NULL DEFAULT '0',
  `cancelledByAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `partServiceId` int(11) NOT NULL,
  `taxPercent` float(5,2) NOT NULL,
  `taxAmount` double(20,2) NOT NULL,
  `amount` double(20,2) NOT NULL,
  `discountPercent` float(5,2) NOT NULL,
  `paymentStatus` varchar(255) NOT NULL,
  `challanNo` varchar(255) NOT NULL,
  `discountAmount` double(20,2) NOT NULL,
  `totalAmount` double(20,2) NOT NULL,
  `couponCode` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`orderId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `orderType`, `orderCode`, `customerId`, `payment`, `status`, `invoiceId`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`, `note`, `specialDiscountTitle`, `specialDiscountPrice`, `emailTo`, `emailSubject`, `emailBody`, `mobile`, `messageBody`, `deliveryCharge`, `deliveryDate`, `orderDate`, `cancelledByCustomer`, `cancelledByAdmin`, `partServiceId`, `taxPercent`, `taxAmount`, `amount`, `discountPercent`, `paymentStatus`, `challanNo`, `discountAmount`, `totalAmount`, `couponCode`, `active`) VALUES
(1, '0', '377788', 20, '20% discount on advance 50%', 'New Order', '377788', 0, '2013-07-16 12:21:42', 0, '0000-00-00 00:00:00', '', '', 0.00, '', '', '', '', '', 0.00, '0000-00-00 00:00:00', '2013-07-16 12:21:42', 0, 0, 0, 0.00, 0.00, 10800.00, 0.00, 'Pending', '', 0.00, 10800.00, '', 0),
(2, '0', '51872', 21, 'Cash On delivery', 'New Order', '51872', 0, '2013-07-28 04:27:28', 0, '0000-00-00 00:00:00', '', '', 0.00, '', '', '', '', '', 0.00, '0000-00-00 00:00:00', '2013-07-28 04:27:28', 0, 0, 0, 0.00, 0.00, 48000.00, 0.00, 'Pending', '', 0.00, 48000.00, '', 0),
(6, '0', '1393414740', 26, 'Cash on delivery', 'New Order', '', 0, '2014-02-26 05:09:00', 0, '2014-02-26 05:09:00', '', '', 0.00, '', '', '', '', '', 0.00, '0000-00-00 00:00:00', '2014-02-26 00:00:00', 0, 0, 0, 0.00, 0.00, 1525.00, 0.00, 'Pending', '', 0.00, 1525.00, '', 0),
(7, '0', '1393433465', 24, 'Cash on delivery', 'New Order', '', 0, '2014-02-26 10:21:05', 0, '2014-02-26 10:21:05', '', '', 0.00, '', '', '', '', '', 0.00, '0000-00-00 00:00:00', '2014-02-26 00:00:00', 0, 0, 0, 0.00, 0.00, 850.00, 0.00, 'Pending', '', 0.00, 850.00, '', 0),
(8, '0', '1393436088', 27, 'Cash on delivery', 'New Order', '', 0, '2014-02-26 11:04:48', 0, '2014-02-26 11:04:48', '', '', 0.00, '', '', '', '', '', 0.00, '0000-00-00 00:00:00', '2014-02-26 00:00:00', 0, 0, 0, 0.00, 0.00, 675.00, 10.00, 'Pending', '', 67.50, 607.50, '', 0),
(10, '0', '1393504524', 27, 'Cash on delivery', 'New Order', '', 0, '2014-02-27 06:05:24', 0, '2014-02-27 06:05:24', '', '', 0.00, '', '', '', '', '', 0.00, '0000-00-00 00:00:00', '2014-02-27 00:00:00', 0, 0, 0, 0.00, 0.00, 500.00, 20.00, 'Pending', '', 100.00, 400.00, 'SAVE20', 0),
(12, '0', '1393578770', 27, 'Cash on delivery', 'New Order', '', 0, '2014-02-28 02:42:50', 0, '2014-02-28 02:42:50', '', '', 0.00, '', '', '', '', '', 0.00, '0000-00-00 00:00:00', '2014-02-28 00:00:00', 0, 0, 0, 0.00, 0.00, 522.00, 0.00, 'Pending', '', 0.00, 522.00, '', 0),
(13, '0', '1393579137', 30, 'Cash on delivery', 'Delivered', '', 0, '2014-02-28 02:48:57', 0, '2014-02-28 02:48:57', '', '', 0.00, '', '', '', '', '', 0.00, '0000-00-00 00:00:00', '2014-02-28 00:00:00', 0, 0, 0, 0.00, 0.00, 40000.00, 0.00, 'Received', '', 0.00, 40000.00, '', 0),
(14, '0', '1393676195', 17, 'Cash on delivery', 'New Order', '', 0, '2014-03-01 05:46:35', 0, '2014-03-01 05:46:35', '', '', 0.00, '', '', '', '', '', 0.00, '0000-00-00 00:00:00', '2014-03-01 00:00:00', 0, 0, 0, 0.00, 0.00, 175.00, 20.00, 'Pending', '', 35.00, 140.00, 'SAVE20', 0),
(15, '0', '1393779666', 17, 'Cash on delivery', 'New Order', '', 0, '2014-03-02 10:31:06', 0, '2014-03-02 10:31:06', '', '', 0.00, '', '', '', '', '', 0.00, '0000-00-00 00:00:00', '2014-03-02 00:00:00', 0, 0, 0, 0.00, 0.00, 8000.00, 0.00, 'Pending', '', 0.00, 8000.00, '', 0),
(16, '0', '1424851504', 17, 'Cash on delivery', 'New Order', '', 0, '2015-02-25 08:05:04', 0, '2015-02-25 08:05:04', '', '', 0.00, '', '', '', '', '', 0.00, '0000-00-00 00:00:00', '2015-02-25 00:00:00', 0, 0, 0, 0.00, 0.00, 585.00, 0.00, 'Pending', '', 0.00, 585.00, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pagecontent`
--

CREATE TABLE IF NOT EXISTS `pagecontent` (
  `pagecontentId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET latin1 NOT NULL,
  `content` text CHARACTER SET latin1 NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `metaTag` varchar(200) CHARACTER SET latin1 NOT NULL,
  `metaDescription` varchar(255) CHARACTER SET latin1 NOT NULL,
  `addedBy` int(11) NOT NULL,
  `editedBy` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  `parentPage` varchar(10) CHARACTER SET latin1 NOT NULL,
  `preInclude` varchar(50) CHARACTER SET latin1 NOT NULL,
  `postInclude` varchar(50) CHARACTER SET latin1 NOT NULL,
  `seoId` varchar(250) CHARACTER SET latin1 NOT NULL,
  `externalLink` varchar(255) CHARACTER SET latin1 NOT NULL,
  `priority` int(4) NOT NULL,
  `heading` varchar(255) CHARACTER SET latin1 NOT NULL,
  `onHead` tinyint(1) NOT NULL,
  `onBottom` tinyint(1) NOT NULL,
  `openNewTab` tinyint(1) NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `showImage` tinyint(1) NOT NULL,
  `langId` int(5) NOT NULL,
  `pageCss` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`pagecontentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=72 ;

--
-- Dumping data for table `pagecontent`
--

INSERT INTO `pagecontent` (`pagecontentId`, `title`, `content`, `active`, `metaTag`, `metaDescription`, `addedBy`, `editedBy`, `addedDate`, `parentPage`, `preInclude`, `postInclude`, `seoId`, `externalLink`, `priority`, `heading`, `onHead`, `onBottom`, `openNewTab`, `image`, `showImage`, `langId`, `pageCss`) VALUES
(26, 'Home', 'wtpage-home.php-wtpage', 1, 'Home', 'Home', 26, 0, '2014-02-15 01:01:21', '0', '', '', 'home', '', 0, '', 0, 0, 0, '', 0, 1, ''),
(53, 'Contact', '<p>wtpage-contact.php-wtpage</p>', 1, 'Imposter Contact', 'Imposter Contact', 26, 0, '2014-01-30 08:06:57', '0', '', '', 'contact', '', 0, 'Contact', 0, 0, 0, '', 0, 1, ''),
(55, 'Shipping', '<h2>Refunds and Exchange Information</h2>\r\n<p>Because we are customers ourselves and we know it can be frustrating when the purchase is not quite right, we offer a complete \\"no fuss\\" guarantee to all our customers. If your goods are damaged or if you receive an incorrect product, we would be happy to give you the following alternatives:<br /><br /> Exchange the goods for an alternative of your choice to equal value.<br /><br /> Give you a full refund for the price you paid for the goods.<br /><br /> At imposter, every care is taken to ensure your poster, art print or merchandise is well packed before it is despatched. We take extreme measures to ensure that your order arrives in pristine condition. However due to the delicate nature of these products, in rare circumstances items can arrive damaged. We are unable to take responsibility for any loss or damages of products in transit. But we will make contact with the relevant courier to track your package or initiate a claim for lost products.<br /><br /> In case of damaged products, contact must be made within 24 hours of receipt of the products by email help@imposter.com notifying us of any damage to the product. Upon return, the article will undergo a quality control check to ensure the quality problem is found to be our responsibility rather than misuse or abuse of the product outside of our control. Once the returned product passes the quality control check to ensure it is unused and in its original packaging stage, an exchange/refund will be dispatched. The posters, art prints or merchandise must be returned in their original mailing tubes, and in their original packaging (where possible).</p>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<h2>Terms And Condition</h2>\r\n<div class=\\"clr\\">&nbsp;</div>\r\n<ul style=\\"list-style: decimal;\\">\r\n<li>Because we are customers ourselves and we know it can b</li>\r\n<li>At imposter, every care is taken to ensure your poster, art print or merchandise is well packed befor</li>\r\n<li>In case of damaged products, contact</li>\r\n<li>Upon return, the article will undergo a quality control check to ensure</li>\r\n<li>Maecenas porttitor mattis vulputate. Sed sed augue congue, tempor elit ut, porttitor ligula. Nulla facilisi. Nunc auctor sem in urna accumsan commodo. Praesent egestas adipiscing enim vel rhoncus. Pellentesque ac fr</li>\r\n<li>Praesent egestas adipiscing enim vel rhoncus. Pellentesque ac fr</li>\r\n<li>Maecenas porttitor mattis vulputate. Sed sed augue congue, tempor elit u</li>\r\n<li>Nunc auctor id nulla nec urna elementum volutpat eget</li>\r\n<li>Sed sed augue congue, tempor elit ut, porttitor ligula. Nulla facilisi. Nunc auctor sem in urna accumsan commodo.</li>\r\n<li>Because we are customers ourselves and we know it can b</li>\r\n<li>At imposter, every care is taken to ensure your poster, art print or merchandise is well packed befor</li>\r\n<li>In case of damaged products, contact</li>\r\n<li>Upon return, the article will undergo a quality control check to ensure</li>\r\n</ul>', 1, 'Imposter Shipping', 'Imposter Shipping', 26, 0, '2014-01-30 07:49:14', '0', '', '', 'shipping', '', 0, 'Shipping', 0, 0, 0, '', 0, 1, ''),
(56, 'Career', '<h2>Refunds and Exchange Information</h2>\r\n<p>Because we are customers ourselves and we know it can be frustrating when the purchase is not quite right, we offer a complete \\"no fuss\\" guarantee to all our customers. If your goods are damaged or if you receive an incorrect product, we would be happy to give you the following alternatives:<br /><br /> Exchange the goods for an alternative of your choice to equal value.<br /><br /> Give you a full refund for the price you paid for the goods.<br /><br /> At imposter, every care is taken to ensure your poster, art print or merchandise is well packed before it is despatched. We take extreme measures to ensure that your order arrives in pristine condition. However due to the delicate nature of these products, in rare circumstances items can arrive damaged. We are unable to take responsibility for any loss or damages of products in transit. But we will make contact with the relevant courier to track your package or initiate a claim for lost products.<br /><br /> In case of damaged products, contact must be made within 24 hours of receipt of the products by email help@imposter.com notifying us of any damage to the product. Upon return, the article will undergo a quality control check to ensure the quality problem is found to be our responsibility rather than misuse or abuse of the product outside of our control. Once the returned product passes the quality control check to ensure it is unused and in its original packaging stage, an exchange/refund will be dispatched. The posters, art prints or merchandise must be returned in their original mailing tubes, and in their original packaging (where possible).</p>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<h2>Terms And Condition</h2>\r\n<div class=\\"clr\\">&nbsp;</div>\r\n<ul style=\\"list-style: decimal;\\">\r\n<li>Because we are customers ourselves and we know it can b</li>\r\n<li>At imposter, every care is taken to ensure your poster, art print or merchandise is well packed befor</li>\r\n<li>In case of damaged products, contact</li>\r\n<li>Upon return, the article will undergo a quality control check to ensure</li>\r\n<li>Maecenas porttitor mattis vulputate. Sed sed augue congue, tempor elit ut, porttitor ligula. Nulla facilisi. Nunc auctor sem in urna accumsan commodo. Praesent egestas adipiscing enim vel rhoncus. Pellentesque ac fr</li>\r\n<li>Praesent egestas adipiscing enim vel rhoncus. Pellentesque ac fr</li>\r\n<li>Maecenas porttitor mattis vulputate. Sed sed augue congue, tempor elit u</li>\r\n<li>Nunc auctor id nulla nec urna elementum volutpat eget</li>\r\n<li>Sed sed augue congue, tempor elit ut, porttitor ligula. Nulla facilisi. Nunc auctor sem in urna accumsan commodo.</li>\r\n<li>Because we are customers ourselves and we know it can b</li>\r\n<li>At imposter, every care is taken to ensure your poster, art print or merchandise is well packed befor</li>\r\n<li>In case of damaged products, contact</li>\r\n<li>Upon return, the article will undergo a quality control check to ensure</li>\r\n</ul>', 1, 'Imposter Career', 'Imposter Career', 26, 0, '2014-01-30 07:56:15', '0', '', '', 'career', '', 0, 'Career', 0, 1, 0, '', 0, 1, ''),
(57, 'Refunds and Exchange', '<h2>Refunds and Exchange Information</h2>\r\n<p>Because we are customers ourselves and we know it can be frustrating when the purchase is not quite right, we offer a complete \\"no fuss\\" guarantee to all our customers. If your goods are damaged or if you receive an incorrect product, we would be happy to give you the following alternatives:<br /><br /> Exchange the goods for an alternative of your choice to equal value.<br /><br /> Give you a full refund for the price you paid for the goods.<br /><br /> At imposter, every care is taken to ensure your poster, art print or merchandise is well packed before it is despatched. We take extreme measures to ensure that your order arrives in pristine condition. However due to the delicate nature of these products, in rare circumstances items can arrive damaged. We are unable to take responsibility for any loss or damages of products in transit. But we will make contact with the relevant courier to track your package or initiate a claim for lost products.<br /><br /> In case of damaged products, contact must be made within 24 hours of receipt of the products by email help@imposter.com notifying us of any damage to the product. Upon return, the article will undergo a quality control check to ensure the quality problem is found to be our responsibility rather than misuse or abuse of the product outside of our control. Once the returned product passes the quality control check to ensure it is unused and in its original packaging stage, an exchange/refund will be dispatched. The posters, art prints or merchandise must be returned in their original mailing tubes, and in their original packaging (where possible).</p>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<h2>Terms And Condition</h2>\r\n<div class=\\"clr\\">&nbsp;</div>\r\n<ul style=\\"list-style: decimal;\\">\r\n<li>Because we are customers ourselves and we know it can b</li>\r\n<li>At imposter, every care is taken to ensure your poster, art print or merchandise is well packed befor</li>\r\n<li>In case of damaged products, contact</li>\r\n<li>Upon return, the article will undergo a quality control check to ensure</li>\r\n<li>Maecenas porttitor mattis vulputate. Sed sed augue congue, tempor elit ut, porttitor ligula. Nulla facilisi. Nunc auctor sem in urna accumsan commodo. Praesent egestas adipiscing enim vel rhoncus. Pellentesque ac fr</li>\r\n<li>Praesent egestas adipiscing enim vel rhoncus. Pellentesque ac fr</li>\r\n<li>Maecenas porttitor mattis vulputate. Sed sed augue congue, tempor elit u</li>\r\n<li>Nunc auctor id nulla nec urna elementum volutpat eget</li>\r\n<li>Sed sed augue congue, tempor elit ut, porttitor ligula. Nulla facilisi. Nunc auctor sem in urna accumsan commodo.</li>\r\n<li>Because we are customers ourselves and we know it can b</li>\r\n<li>At imposter, every care is taken to ensure your poster, art print or merchandise is well packed befor</li>\r\n<li>In case of damaged products, contact</li>\r\n<li>Upon return, the article will undergo a quality control check to ensure</li>\r\n</ul>', 1, 'Imposter Refunds and Exchange', 'Imposter Refunds and Exchange', 26, 0, '2014-01-30 07:44:28', '0', '', '', 'refunds-and-exchange', '', 0, 'Refunds and Exchange', 0, 0, 0, '', 0, 1, ''),
(58, 'Privacy Policy', '<h2>Refunds and Exchange Information</h2>\r\n<p>Because we are customers ourselves and we know it can be frustrating when the purchase is not quite right, we offer a complete \\"no fuss\\" guarantee to all our customers. If your goods are damaged or if you receive an incorrect product, we would be happy to give you the following alternatives:<br /><br /> Exchange the goods for an alternative of your choice to equal value.<br /><br /> Give you a full refund for the price you paid for the goods.<br /><br /> At imposter, every care is taken to ensure your poster, art print or merchandise is well packed before it is despatched. We take extreme measures to ensure that your order arrives in pristine condition. However due to the delicate nature of these products, in rare circumstances items can arrive damaged. We are unable to take responsibility for any loss or damages of products in transit. But we will make contact with the relevant courier to track your package or initiate a claim for lost products.<br /><br /> In case of damaged products, contact must be made within 24 hours of receipt of the products by email help@imposter.com notifying us of any damage to the product. Upon return, the article will undergo a quality control check to ensure the quality problem is found to be our responsibility rather than misuse or abuse of the product outside of our control. Once the returned product passes the quality control check to ensure it is unused and in its original packaging stage, an exchange/refund will be dispatched. The posters, art prints or merchandise must be returned in their original mailing tubes, and in their original packaging (where possible).</p>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<h2>Terms And Condition</h2>\r\n<div class=\\"clr\\">&nbsp;</div>\r\n<ul style=\\"list-style: decimal;\\">\r\n<li>Because we are customers ourselves and we know it can b</li>\r\n<li>At imposter, every care is taken to ensure your poster, art print or merchandise is well packed befor</li>\r\n<li>In case of damaged products, contact</li>\r\n<li>Upon return, the article will undergo a quality control check to ensure</li>\r\n<li>Maecenas porttitor mattis vulputate. Sed sed augue congue, tempor elit ut, porttitor ligula. Nulla facilisi. Nunc auctor sem in urna accumsan commodo. Praesent egestas adipiscing enim vel rhoncus. Pellentesque ac fr</li>\r\n<li>Praesent egestas adipiscing enim vel rhoncus. Pellentesque ac fr</li>\r\n<li>Maecenas porttitor mattis vulputate. Sed sed augue congue, tempor elit u</li>\r\n<li>Nunc auctor id nulla nec urna elementum volutpat eget</li>\r\n<li>Sed sed augue congue, tempor elit ut, porttitor ligula. Nulla facilisi. Nunc auctor sem in urna accumsan commodo.</li>\r\n<li>Because we are customers ourselves and we know it can b</li>\r\n<li>At imposter, every care is taken to ensure your poster, art print or merchandise is well packed befor</li>\r\n<li>In case of damaged products, contact</li>\r\n<li>Upon return, the article will undergo a quality control check to ensure</li>\r\n</ul>', 1, 'Imposter Privacy Policy', 'Imposter Privacy Policy', 26, 0, '2014-01-30 07:39:22', '0', '', '', 'privacy-policy', '', 0, 'Privacy Policy', 0, 0, 0, '', 0, 1, ''),
(59, 'Product Details', '<p>wtpage-product-details.php-wtpage</p>', 1, 'Product Details', 'Product Details', 26, 0, '2014-01-30 08:19:36', '0', '', '', 'product-details', '', 0, '', 0, 0, 0, '', 0, 1, ''),
(60, 'Login', 'wtpage-login.php-wtpage', 1, 'Imposter Login', 'Imposter Login', 26, 0, '2014-01-30 10:24:50', '0', '', '', 'login', '', 0, '', 0, 0, 0, '', 0, 1, ''),
(61, 'Sign Up', 'wtpage-sign-up.php-wtpage', 1, 'Sign Up', 'Sign Up', 26, 0, '2014-01-30 10:24:22', '0', '', '', 'sign-up', '', 0, '', 0, 0, 0, '', 0, 1, ''),
(62, 'Shopping Cart', 'wtpage-shopping-cart.php-wtpage', 1, 'Shopping Cart', 'Shopping Cart', 26, 0, '2014-01-30 10:18:31', '0', '', '', 'shopping-cart', '', 0, '', 0, 0, 0, '', 0, 1, ''),
(63, 'Products', 'wtpage-products.php-wtpage', 1, 'Products', 'Products', 26, 0, '2014-02-05 09:48:02', '0', '', '', 'Products', '', 0, 'Products', 0, 0, 0, '', 0, 1, ''),
(64, 'My Wishlist', 'wtpage-my-wish-list.php-wtpage', 1, 'My Wishlist', 'My Wishlist', 26, 0, '2014-02-13 11:55:04', '0', '', '', 'my-wish-list', '', 0, 'My Wish List', 0, 0, 0, '', 0, 1, ''),
(65, 'Recently Viewed', 'wtpage-recently-viewed.php-wtpage', 1, 'Recently Viewed', 'Recently Viewed', 26, 0, '2014-02-13 11:16:27', '0', '', '', 'recently-viewed', '', 0, 'Recently Viewed', 0, 0, 0, '', 0, 1, ''),
(66, 'order-summary', 'wtpage-order-summary.php-wtpage', 1, 'order-summary', 'order-summary', 26, 0, '2014-02-21 03:24:47', '0', '', '', 'order-summary', '', 0, 'order-summary', 0, 0, 0, '', 0, 1, ''),
(67, 'order-summary', 'wtpage-order-summary.php-wtpage', 1, 'order-summary', 'order-summary', 26, 0, '2014-02-21 03:25:02', '0', '', '', 'order-summary', '', 0, 'order-summary', 0, 0, 0, '', 0, 1, ''),
(68, 'order-submit', 'wtpage-order-submit.php-wtpage', 1, 'order-submit', 'order-submit', 26, 0, '2014-02-26 04:54:52', '0', '', '', 'order-submit', '', 0, '', 0, 0, 0, '', 0, 1, ''),
(69, 'forgot-password', 'wtpage-forgot-password.php-wtpage', 1, 'forgot-password', 'forgot-password', 26, 0, '2014-02-27 01:23:43', '0', '', '', 'forgot-password', '', 0, '', 0, 0, 0, '', 0, 1, ''),
(70, 'my-orders', 'wtpage-my-orders.php-wtpage', 1, 'my-orders', 'my-orders', 26, 0, '2014-02-27 02:01:28', '0', '', '', 'my-orders', '', 0, 'My Orders', 0, 0, 0, '', 0, 1, ''),
(71, 'submit-product', 'wtpage-submit-product.php-wtpage', 1, 'submit-product', 'submit-product', 26, 0, '2014-03-01 06:44:26', '0', '', '', 'submit-product', '', 0, 'Submit Product', 0, 0, 0, '', 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `partservice`
--

CREATE TABLE IF NOT EXISTS `partservice` (
  `partServiceId` int(11) NOT NULL AUTO_INCREMENT,
  `serviceId` int(11) NOT NULL,
  `serviceInvoiceNo` varchar(255) NOT NULL,
  `agentId` int(11) NOT NULL,
  `partServiceDate` datetime NOT NULL,
  `fromDate` datetime NOT NULL,
  `toDate` datetime NOT NULL,
  `partServiceType` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `addedBy` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  `modifyBy` int(11) NOT NULL,
  `modifyDate` datetime NOT NULL,
  PRIMARY KEY (`partServiceId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `partservice`
--

INSERT INTO `partservice` (`partServiceId`, `serviceId`, `serviceInvoiceNo`, `agentId`, `partServiceDate`, `fromDate`, `toDate`, `partServiceType`, `note`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`) VALUES
(1, 1, 'SI-1500', 1, '2013-05-01 00:00:00', '2013-05-10 00:00:00', '2013-05-17 00:00:00', 'CM', 'Part service Note', 26, '2013-05-27 09:56:45', 26, '2013-05-27 09:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `paymentId` int(11) NOT NULL AUTO_INCREMENT,
  `paymentType` varchar(255) NOT NULL,
  `paymentTypeId` int(11) NOT NULL,
  `amount` double(20,2) NOT NULL,
  `paymentDate` datetime NOT NULL,
  `paymentMode` varchar(255) NOT NULL,
  `paymentDetails` text NOT NULL,
  `note` text NOT NULL,
  `addedBy` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  `modifyBy` int(11) NOT NULL,
  `modifyDate` datetime NOT NULL,
  PRIMARY KEY (`paymentId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethod`
--

CREATE TABLE IF NOT EXISTS `paymentmethod` (
  `paymentmethodId` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `addedDate` datetime NOT NULL,
  `addedBy` int(10) NOT NULL,
  `modifyDate` datetime NOT NULL,
  `modifyBy` int(10) NOT NULL,
  PRIMARY KEY (`paymentmethodId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `paymentmethod`
--

INSERT INTO `paymentmethod` (`paymentmethodId`, `title`, `status`, `addedDate`, `addedBy`, `modifyDate`, `modifyBy`) VALUES
(1, 'Cash On delivery', 'Active', '2013-07-01 10:30:36', 26, '2013-07-01 11:09:26', 26),
(2, '20% discount on advance 50%', 'Active', '2013-07-01 10:48:14', 26, '2013-07-01 10:48:14', 26);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `productId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `shortDescription` text NOT NULL,
  `fullDescription` text NOT NULL,
  `active` varchar(255) NOT NULL DEFAULT '0',
  `model` varchar(255) NOT NULL,
  `seoId` varchar(255) NOT NULL,
  `marketPrice` double(20,2) NOT NULL,
  `discount` double(20,2) NOT NULL,
  `discountPercent` double(10,2) NOT NULL,
  `ourPrice` double(20,2) NOT NULL,
  `starRating` tinyint(1) NOT NULL,
  `make` varchar(255) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  `modifyBy` int(11) NOT NULL,
  `modifyDate` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `orders` varchar(255) NOT NULL DEFAULT '0',
  `oldPrice` double(20,2) NOT NULL,
  `dealerId` int(11) NOT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `name`, `code`, `shortDescription`, `fullDescription`, `active`, `model`, `seoId`, `marketPrice`, `discount`, `discountPercent`, `ourPrice`, `starRating`, `make`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`, `status`, `featured`, `orders`, `oldPrice`, `dealerId`) VALUES
(1, 'Product5', 'Product5', '', '<span style=\\"color: #ff0000;\\">The poster is sealed between sheets and then placed in special poster tubes so they are super secure when they reach you.</span>', 'Active', 'Product5', 'product5-t-shirts-laptop-skins-male-female', 0.00, 0.00, 0.00, 175.00, 0, 'Product5', 26, '2013-05-07 07:24:22', 26, '2014-03-02 08:02:26', 'Available', 0, '0', 225.00, 26),
(2, 'Product4', 'Product4', '', '', 'Active', 'Product4', 'product4-t-shirts-male-female', 0.00, 0.00, 0.00, 500.00, 0, 'Product4', 26, '2013-05-28 12:16:13', 26, '2014-03-02 08:02:32', 'Available', 0, '0', 575.00, 26),
(3, 'Product3', 'Product3', '', '', 'Active', 'Product3', 'product3-posters-door-poster-a4-mini-poster-mini-poster', 0.00, 0.00, 0.00, 585.00, 0, 'Product3', 26, '2013-05-28 12:16:58', 26, '2014-03-02 08:02:17', 'Available', 0, '0', 685.00, 26),
(4, 'Product2', 'Product2', '', '', 'Active', 'Product2', 'product2-posters-a4-mini-poster', 0.00, 0.00, 0.00, 522.00, 0, 'Product2', 26, '2013-06-06 08:36:19', 26, '2014-02-11 10:04:35', 'Available', 0, '0', 722.00, 0),
(5, 'Product1', 'Product1', '', '<div class=\\"right_box\\">\r\n<p>Please note that the final product doesn\\''t carry the watermark.</p>\r\n<div class=\\"clr\\">&nbsp;</div>\r\n<div class=\\"horizontal\\">\r\n<div class=\\"small_bx\\">Category</div>\r\n<div class=\\"small_right\\">\r\n<p><a href=\\"#\\">Imposter Specials</a></p>\r\n</div>\r\n</div>\r\n<div class=\\"horizontal\\">\r\n<div class=\\"small_bx\\">Texture</div>\r\n<div class=\\"small_right\\">\r\n<p>300gsm High Quality Matte Paper</p>\r\n</div>\r\n</div>\r\n<div class=\\"horizontal\\">\r\n<div class=\\"small_bx\\">Size</div>\r\n<div class=\\"small_right\\">\r\n<p>18\\''\\''x12\\''\\'' (including margin for framing)</p>\r\n</div>\r\n</div>\r\n<div class=\\"horizontal\\">\r\n<div class=\\"small_bx\\">Shipping</div>\r\n<div class=\\"small_right\\">\r\n<p>Free Shipping. Usually dispatched within 24-72 Hours</p>\r\n</div>\r\n</div>\r\n<div class=\\"horizontal\\">\r\n<div class=\\"small_bx\\" style=\\"height: 95px;\\">Packaging</div>\r\n<div class=\\"small_right\\" style=\\"height: 95px;\\">\r\n<p>The poster is sealed between sheets and then placed in special poster tubes so they are super secure when they reach you.</p>\r\n</div>\r\n</div>\r\n<div class=\\"clr\\">&nbsp;</div>\r\n<div class=\\"horizontal\\" style=\\"padding: 7px 5px; width: 368px;\\">Zoom over the image to have an enlarged view.</div>\r\n</div>', 'Active', 'Product1', 'product1-posters-coasters-a4-mini-poster-mini-poster-hollywood-comics', 0.00, 0.00, 0.00, 8000.00, 0, 'Product1', 26, '2013-07-01 12:53:42', 26, '2014-03-01 06:31:24', 'Available', 0, '0', 9500.00, 17);

-- --------------------------------------------------------

--
-- Table structure for table `productcategory`
--

CREATE TABLE IF NOT EXISTS `productcategory` (
  `productcategoryId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `parentId` int(11) NOT NULL,
  `description` text NOT NULL,
  `productType` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  `modifyBy` int(11) NOT NULL,
  `modifyDate` datetime NOT NULL,
  `parentIds` varchar(250) NOT NULL,
  `featureIds` varchar(250) NOT NULL,
  PRIMARY KEY (`productcategoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `productcategory`
--

INSERT INTO `productcategory` (`productcategoryId`, `title`, `parentId`, `description`, `productType`, `img`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`, `parentIds`, `featureIds`) VALUES
(5, 'Posters', 0, '', 'Posters', '', 26, '2013-05-15 08:57:22', 26, '2014-01-27 12:09:40', '', ',1,'),
(6, 'T Shirts', 0, '', 'T Shirts', '', 26, '2013-06-15 12:19:01', 26, '2014-02-03 08:50:02', '', ',48,67,'),
(7, 'Coasters', 0, '', '', '', 26, '2014-01-27 10:28:26', 26, '2014-02-03 08:50:12', '', ',48,'),
(8, 'Mugs', 0, '', '', '', 26, '2014-01-27 10:28:38', 26, '2014-01-27 10:28:38', '', ''),
(9, 'Framed Posters', 0, '', '', '', 26, '2014-01-27 10:28:58', 26, '2014-01-27 10:28:58', '', ''),
(10, 'Laptop Skins', 0, '', '', '', 26, '2014-01-27 10:29:14', 26, '2014-01-27 10:29:14', '', ''),
(11, 'Wall Decal', 0, '', '', '', 26, '2014-01-27 10:29:26', 26, '2014-01-27 10:29:26', '', ''),
(12, 'Scarves Football', 0, '', '', '', 26, '2014-01-27 10:29:52', 26, '2014-02-05 07:48:50', '', ''),
(13, 'Diaries', 0, '', '', '', 26, '2014-01-27 10:30:05', 26, '2014-01-27 10:30:05', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `productcategorymap`
--

CREATE TABLE IF NOT EXISTS `productcategorymap` (
  `productcategoryId` int(11) NOT NULL,
  `productId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productcategorymap`
--

INSERT INTO `productcategorymap` (`productcategoryId`, `productId`) VALUES
(5, 4),
(5, 5),
(7, 5),
(5, 3),
(6, 1),
(10, 1),
(6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `productfeature`
--

CREATE TABLE IF NOT EXISTS `productfeature` (
  `productfeatureId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `parentId` int(11) NOT NULL,
  `price` double(20,2) NOT NULL,
  `productType` varchar(255) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  `modifyBy` int(11) NOT NULL,
  `modifyDate` datetime NOT NULL,
  `viewInList` varchar(5) NOT NULL,
  `viewInDetails` varchar(5) NOT NULL,
  `viewInShop` varchar(5) NOT NULL,
  PRIMARY KEY (`productfeatureId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `productfeature`
--

INSERT INTO `productfeature` (`productfeatureId`, `title`, `parentId`, `price`, `productType`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`, `viewInList`, `viewInDetails`, `viewInShop`) VALUES
(1, 'Size', 0, 250.00, 'Posters', 26, '2013-05-10 08:59:55', 26, '2014-01-27 11:59:19', 'No', 'Yes', 'Yes'),
(2, 'Dual Camera', 4, 100.00, '', 26, '2013-05-15 09:34:53', 26, '2013-06-16 10:27:03', 'No', 'Yes', 'Yes'),
(3, 'Single Camera', 4, 0.00, '', 26, '2013-06-07 09:38:42', 26, '2013-06-16 10:26:51', 'No', 'Yes', 'Yes'),
(4, 'Camera', 0, 40.00, '', 26, '2013-06-07 09:39:02', 26, '2013-06-16 10:26:44', 'No', 'Yes', 'Yes'),
(5, 'Avengers', 7, 0.00, '', 26, '2013-06-11 12:29:41', 26, '2014-01-27 10:47:33', 'No', 'Yes', 'Yes'),
(6, 'Batman', 7, 0.00, '', 26, '2013-06-11 12:29:50', 26, '2014-01-27 10:46:11', 'No', 'Yes', 'Yes'),
(7, 'Collections', 0, 0.00, '', 26, '2013-06-11 12:30:04', 26, '2014-01-27 10:45:34', 'No', 'Yes', 'Yes'),
(8, 'DOOR POSTER', 1, 0.00, '', 26, '2013-06-12 12:27:16', 26, '2014-01-27 11:55:20', 'Yes', 'Yes', 'Yes'),
(9, 'A4 MINI POSTER', 1, 0.00, '', 26, '2013-06-12 12:27:39', 26, '2014-01-27 11:55:10', 'Yes', 'Yes', 'Yes'),
(10, 'MINI POSTER', 1, 0.00, '', 26, '2013-06-12 12:27:57', 26, '2014-01-27 11:54:58', 'Yes', 'Yes', 'Yes'),
(11, 'MAXI POSTER', 1, 0.00, '', 26, '2013-06-12 12:28:15', 26, '2014-02-03 09:57:30', 'Yes', 'Yes', 'Yes'),
(12, 'Price', 0, 0.00, '', 26, '2013-06-12 12:28:37', 26, '2013-06-16 10:25:53', 'No', 'Yes', 'Yes'),
(13, '0 - 5000', 12, 0.00, '', 26, '2013-06-12 12:29:08', 26, '2013-06-16 09:08:59', 'No', 'No', 'No'),
(14, '5000 - 10000', 12, 0.00, '', 26, '2013-06-12 12:29:20', 26, '2013-06-16 09:08:52', 'No', 'No', 'No'),
(15, '10000 - 15000', 12, 0.00, '', 26, '2013-06-12 12:29:45', 26, '2013-06-16 09:08:44', 'No', 'No', 'No'),
(16, '15000+', 12, 0.00, '', 26, '2013-06-12 12:29:56', 26, '2013-06-16 09:08:38', 'No', 'No', 'No'),
(17, 'Manchester United', 7, 0.00, '', 26, '2014-01-27 10:47:55', 26, '2014-01-27 10:47:55', '', '', ''),
(18, 'FRIENDS', 7, 0.00, '', 26, '2014-01-27 10:48:12', 26, '2014-01-27 10:48:12', '', '', ''),
(19, 'BIG BANG THEORY', 7, 0.00, '', 26, '2014-01-27 10:48:30', 26, '2014-01-27 10:49:07', '', '', ''),
(20, 'Chelsea', 7, 0.00, '', 26, '2014-01-27 10:49:27', 26, '2014-01-27 10:49:27', '', '', ''),
(21, 'Beatles ', 7, 0.00, '', 26, '2014-01-27 10:49:41', 26, '2014-01-27 10:49:41', '', '', ''),
(22, 'Nirvana', 7, 0.00, '', 26, '2014-01-27 10:50:24', 26, '2014-01-27 10:50:24', '', '', ''),
(23, 'Pink Floyd', 7, 0.00, '', 26, '2014-01-27 10:50:55', 26, '2014-01-27 10:50:55', '', '', ''),
(24, 'Metallica', 7, 0.00, '', 26, '2014-01-27 10:51:20', 26, '2014-01-27 10:51:20', '', '', ''),
(25, 'Real Madrid', 7, 0.00, '', 26, '2014-01-27 10:51:44', 26, '2014-01-27 10:51:44', '', '', ''),
(27, 'Spiderman', 7, 0.00, '', 26, '2014-01-27 10:52:36', 26, '2014-01-27 10:52:36', '', '', ''),
(28, 'Messi', 7, 0.00, '', 26, '2014-01-27 10:53:37', 26, '2014-01-27 10:53:42', '', '', ''),
(29, 'Ronaldo', 7, 0.00, '', 26, '2014-01-27 10:54:09', 26, '2014-01-27 10:54:09', '', '', ''),
(30, 'Sherlock', 7, 0.00, '', 26, '2014-01-27 10:54:25', 26, '2014-01-27 10:54:25', '', '', ''),
(31, 'Game of Thrones', 7, 0.00, '', 26, '2014-01-27 10:54:44', 26, '2014-01-27 10:54:44', '', '', ''),
(32, 'Breaking Bad', 7, 0.00, '', 26, '2014-01-27 10:55:07', 26, '2014-01-27 10:55:07', '', '', ''),
(33, 'Prison Break', 7, 0.00, '', 26, '2014-01-27 10:55:36', 26, '2014-01-27 10:55:36', '', '', ''),
(34, 'Sholay', 7, 0.00, '', 26, '2014-01-27 10:55:58', 26, '2014-01-27 10:55:58', '', '', ''),
(35, 'Three Idiots', 7, 0.00, '', 26, '2014-01-27 10:56:14', 26, '2014-01-27 10:56:14', '', '', ''),
(36, 'Twitter', 7, 0.00, '', 26, '2014-01-27 10:56:37', 26, '2014-01-27 10:56:37', '', '', ''),
(37, 'Facebook', 7, 0.00, '', 26, '2014-01-27 11:41:53', 26, '2014-01-27 11:41:53', '', '', ''),
(38, 'IPL', 7, 0.00, '', 26, '2014-01-27 11:42:05', 26, '2014-01-27 11:42:05', '', '', ''),
(39, 'COD', 7, 0.00, '', 26, '2014-01-27 11:42:41', 26, '2014-01-27 11:42:41', '', '', ''),
(40, 'Wolf of Wall Street', 7, 0.00, '', 26, '2014-01-27 11:42:59', 26, '2014-01-27 11:42:59', '', '', ''),
(41, 'Rooney', 7, 0.00, '', 26, '2014-01-27 11:43:15', 26, '2014-01-27 11:43:15', '', '', ''),
(42, 'Arsenal', 7, 0.00, '', 26, '2014-01-27 11:43:30', 26, '2014-01-27 11:43:30', '', '', ''),
(43, 'Barcelona', 7, 0.00, '', 26, '2014-01-27 11:44:26', 26, '2014-01-27 11:44:26', '', '', ''),
(44, 'Harley Davidson', 7, 0.00, '', 26, '2014-01-27 11:44:37', 26, '2014-01-27 11:44:37', '', '', ''),
(45, 'The Undertaker', 7, 0.00, '', 26, '2014-01-27 11:44:48', 26, '2014-01-27 11:44:48', '', '', ''),
(46, 'John Cena', 7, 0.00, '', 26, '2014-01-27 11:45:01', 26, '2014-01-27 11:45:01', '', '', ''),
(48, 'Genres', 0, 0.00, '', 26, '2014-01-27 11:46:23', 26, '2014-01-27 11:46:23', '', '', ''),
(49, 'Hollywood', 48, 0.00, '', 26, '2014-01-27 11:47:09', 26, '2014-01-27 11:47:09', '', '', ''),
(50, 'Comics', 48, 0.00, '', 26, '2014-01-27 11:47:32', 26, '2014-01-27 11:47:32', '', '', ''),
(51, 'Football', 48, 0.00, '', 26, '2014-01-27 11:48:01', 26, '2014-01-27 11:48:01', '', '', ''),
(52, 'Cricket', 48, 0.00, '', 26, '2014-01-27 11:48:15', 26, '2014-01-27 11:48:15', '', '', ''),
(53, 'TV Series', 48, 0.00, '', 26, '2014-01-27 11:48:45', 26, '2014-01-27 11:48:45', '', '', ''),
(54, 'Bollywood', 48, 0.00, '', 26, '2014-01-27 11:49:00', 26, '2014-01-27 11:49:00', '', '', ''),
(55, 'Other Sports', 48, 0.00, '', 26, '2014-01-27 11:49:16', 26, '2014-01-27 11:49:16', '', '', ''),
(56, 'Quotes', 48, 0.00, '', 26, '2014-01-27 11:49:34', 26, '2014-01-27 11:49:34', '', '', ''),
(57, 'Social Networking', 48, 0.00, '', 26, '2014-01-27 11:49:47', 26, '2014-01-27 11:49:47', '', '', ''),
(58, 'Vehicles', 48, 0.00, '', 26, '2014-01-27 11:50:01', 26, '2014-01-27 11:50:01', '', '', ''),
(59, 'Humour', 48, 0.00, '', 26, '2014-01-27 11:50:19', 26, '2014-01-27 11:50:19', '', '', ''),
(60, 'Music', 48, 0.00, '', 26, '2014-01-27 11:50:37', 26, '2014-01-27 11:50:37', '', '', ''),
(61, 'Gaming', 48, 0.00, '', 26, '2014-01-27 11:51:04', 26, '2014-01-27 11:51:04', '', '', ''),
(62, 'Politics', 48, 0.00, '', 26, '2014-01-27 11:51:24', 26, '2014-01-27 11:51:24', '', '', ''),
(63, 'Ads', 48, 0.00, '', 26, '2014-01-27 11:51:43', 26, '2014-01-27 11:51:43', '', '', ''),
(64, 'Geek', 48, 0.00, '', 26, '2014-01-27 11:52:01', 26, '2014-01-27 11:52:01', '', '', ''),
(65, 'Fun', 48, 0.00, '', 26, '2014-01-27 11:52:18', 26, '2014-01-27 11:52:18', '', '', ''),
(66, 'Meme', 48, 0.00, '', 26, '2014-01-27 11:52:38', 26, '2014-01-27 11:52:38', '', '', ''),
(67, 'Category', 0, 0.00, 'T Shirts', 26, '2014-01-27 11:57:43', 26, '2014-01-27 11:57:43', '', '', ''),
(68, 'MALE', 67, 0.00, '', 26, '2014-01-27 11:58:01', 26, '2014-02-03 09:57:50', '', '', ''),
(69, 'FEMALE', 67, 0.00, '', 26, '2014-01-27 11:58:15', 26, '2014-02-03 09:57:44', '', '', ''),
(70, 'LARGE POSTER', 1, 0.00, '', 26, '2014-02-05 06:46:20', 26, '2014-02-05 06:46:20', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `productfeaturemap`
--

CREATE TABLE IF NOT EXISTS `productfeaturemap` (
  `productfeatureId` int(11) NOT NULL,
  `productId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productfeaturemap`
--

INSERT INTO `productfeaturemap` (`productfeatureId`, `productId`) VALUES
(9, 4),
(9, 5),
(10, 5),
(49, 5),
(50, 5),
(8, 3),
(9, 3),
(10, 3),
(68, 1),
(69, 1),
(68, 2),
(69, 2);

-- --------------------------------------------------------

--
-- Table structure for table `productsubmit`
--

CREATE TABLE IF NOT EXISTS `productsubmit` (
  `productSubmitId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `make` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` double(20,2) NOT NULL,
  `availableQuantity` int(11) NOT NULL,
  `dealerId` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `oldPrice` double(20,2) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  `modifyBy` int(11) NOT NULL,
  `modifyDate` datetime NOT NULL,
  `img1` varchar(500) NOT NULL,
  `img2` varchar(500) NOT NULL,
  `img3` varchar(500) NOT NULL,
  PRIMARY KEY (`productSubmitId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `productsubmit`
--

INSERT INTO `productsubmit` (`productSubmitId`, `name`, `code`, `make`, `model`, `description`, `price`, `availableQuantity`, `dealerId`, `status`, `oldPrice`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`, `img1`, `img2`, `img3`) VALUES
(1, 'Lorem ipsum dolor sit amet,', 'dolor sit amet,', 'ipsum', 'Lorem', ' 	\r\nAliquam non eleifend elit. Nam non urna nec felis tristique volutpat. Proin dapibus nisi vel lacus pulvinar luctus. Aliquam mattis, massa a mollis elementum, nulla sapien varius orci, nec pellentesque est dolor id elit. Sed pulvinar erat elit. Nullam sapien turpis, tristique et feugiat ac, sodales vel augue. Nunc fringilla est vel leo molestie, id scelerisque sapien lobortis. Proin ac tortor suscipit,', 500.00, 5, 26, 'Inactive', 575.00, 0, '2014-03-01 06:29:03', 0, '2014-03-01 06:29:03', 'wtos-images/submit_product/752985_01-03-2014__images.jpg', '', ''),
(2, 'test', 'test', 'test', 'test', 'test', 200.00, 20, 17, 'Inactive', 500.00, 0, '2014-03-01 06:29:42', 0, '2014-03-01 06:29:42', 'wtos-images/submit_product/87637_01-03-2014__folder-closed.gif', '', ''),
(3, 'printer took', 'and scrambled', ' make a type', 'type', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type ', 789.00, 2, 26, 'Inactive', 985.00, 0, '2014-03-01 06:30:27', 0, '2014-03-01 06:30:27', 'wtos-images/submit_product/500490_01-03-2014__mrinal.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `productview`
--

CREATE TABLE IF NOT EXISTS `productview` (
  `productviewId` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) NOT NULL,
  `totalView` int(11) NOT NULL,
  `lastViewDate` datetime NOT NULL,
  PRIMARY KEY (`productviewId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `productview`
--

INSERT INTO `productview` (`productviewId`, `productId`, `totalView`, `lastViewDate`) VALUES
(1, 3, 129, '2015-07-08 10:58:15'),
(2, 1, 59, '2015-06-22 04:51:51'),
(3, 2, 27, '2014-03-01 11:28:51'),
(4, 5, 34, '2015-07-08 10:58:59'),
(5, 4, 22, '2015-07-08 10:58:35');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE IF NOT EXISTS `purchase` (
  `purchaseId` int(11) NOT NULL AUTO_INCREMENT,
  `vendorId` int(11) NOT NULL,
  `purchaseDate` datetime NOT NULL,
  `purchaseOrderNo` varchar(255) NOT NULL,
  `purchaseBillNo` varchar(255) NOT NULL,
  `amount` double(20,2) NOT NULL,
  `taxPercent` float(5,2) NOT NULL,
  `taxAmount` double(20,2) NOT NULL,
  `otherChargePercent` float(5,2) NOT NULL,
  `discountPercent` float(5,2) NOT NULL,
  `otherChargeAmount` double(20,2) NOT NULL,
  `discountAmount` double(20,2) NOT NULL,
  `totalAmount` double(20,2) NOT NULL,
  `paymentStatus` varchar(10) NOT NULL,
  `note` text NOT NULL,
  `addedBy` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  `modifyBy` int(11) NOT NULL,
  `modifyDate` datetime NOT NULL,
  PRIMARY KEY (`purchaseId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchaseId`, `vendorId`, `purchaseDate`, `purchaseOrderNo`, `purchaseBillNo`, `amount`, `taxPercent`, `taxAmount`, `otherChargePercent`, `discountPercent`, `otherChargeAmount`, `discountAmount`, `totalAmount`, `paymentStatus`, `note`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`) VALUES
(1, 1, '2013-05-10 00:00:00', '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Due', '', 26, '2013-05-10 09:19:23', 26, '2013-05-21 10:19:33'),
(2, 1, '2013-05-09 00:00:00', '12345', '12345', 1000.00, 10.00, 100.00, 0.00, 0.00, 200.00, 100.00, 1200.00, 'Paid', 'This is Note', 26, '2013-05-10 09:35:23', 26, '2013-05-23 07:53:04');

-- --------------------------------------------------------

--
-- Table structure for table `purchasedetails`
--

CREATE TABLE IF NOT EXISTS `purchasedetails` (
  `purchasedetailsId` int(11) NOT NULL AUTO_INCREMENT,
  `purchaseId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `serialNo` text NOT NULL,
  `unit` varchar(255) NOT NULL,
  `unitPrice` double(20,2) NOT NULL,
  `purchasePrice` double(20,2) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  `modifyBy` int(11) NOT NULL,
  `modifyDate` datetime NOT NULL,
  PRIMARY KEY (`purchasedetailsId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `purchasedetails`
--

INSERT INTO `purchasedetails` (`purchasedetailsId`, `purchaseId`, `productId`, `quantity`, `serialNo`, `unit`, `unitPrice`, `purchasePrice`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`) VALUES
(1, 2, 1, 2, '12345,45612', 'KG', 2545.00, 5090.00, 26, '2013-05-10 11:00:56', 26, '2013-05-21 09:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `serviceId` int(11) NOT NULL AUTO_INCREMENT,
  `particulars` varchar(255) NOT NULL,
  `serviceOrderNo` varchar(255) NOT NULL,
  `serviceInvoiceNo` varchar(255) NOT NULL,
  `customerId` int(11) NOT NULL,
  `agentId` int(11) NOT NULL,
  `serviceDate` datetime NOT NULL,
  `serviceDescription` text NOT NULL,
  `fromDate` datetime NOT NULL,
  `toDate` datetime NOT NULL,
  `financialYear` varchar(255) NOT NULL,
  `installationDate` datetime NOT NULL,
  `amount` double(20,2) NOT NULL,
  `taxPercent` float(5,2) NOT NULL,
  `taxAmount` double(20,2) NOT NULL,
  `otherChargePercent` float(5,2) NOT NULL,
  `otherChargeAmount` double(20,2) NOT NULL,
  `discountPercent` float(5,2) NOT NULL,
  `discountAmount` double(20,2) NOT NULL,
  `totalAmount` double(20,2) NOT NULL,
  `serviceType` varchar(255) NOT NULL,
  `paymentStatus` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `addedBy` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  `modifyBy` int(11) NOT NULL,
  `modifyDate` datetime NOT NULL,
  PRIMARY KEY (`serviceId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`serviceId`, `particulars`, `serviceOrderNo`, `serviceInvoiceNo`, `customerId`, `agentId`, `serviceDate`, `serviceDescription`, `fromDate`, `toDate`, `financialYear`, `installationDate`, `amount`, `taxPercent`, `taxAmount`, `otherChargePercent`, `otherChargeAmount`, `discountPercent`, `discountAmount`, `totalAmount`, `serviceType`, `paymentStatus`, `note`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`) VALUES
(1, '', '012548', 'SI-1500', 1, 1, '2013-05-08 00:00:00', 'First Servioce', '2012-05-16 00:00:00', '2013-05-21 00:00:00', '2013-2014', '2013-05-07 00:00:00', 4000.00, 12.00, 480.00, 3.00, 14.40, 7.00, 314.61, 4179.79, 'Bill', 'Paid', 'Service Note', 26, '2013-05-27 07:43:34', 26, '2013-06-01 07:19:00'),
(3, 'Particulars', '012548', 'SI-1500', 3, 2, '2013-06-05 00:00:00', 'Service Description', '2013-06-04 00:00:00', '2014-06-18 00:00:00', '2014-2015', '2013-06-17 00:00:00', 1500.00, 12.63, 189.45, 3.00, 5.68, 10.00, 169.51, 1525.62, 'Quotation', 'Due', 'Note', 26, '2013-06-01 07:30:02', 26, '2013-06-01 11:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `servicedetails`
--

CREATE TABLE IF NOT EXISTS `servicedetails` (
  `servicedetailsId` int(11) NOT NULL AUTO_INCREMENT,
  `serviceId` int(11) NOT NULL,
  `particulars` varchar(255) NOT NULL,
  `fromDate` datetime NOT NULL,
  `toDate` datetime NOT NULL,
  `financialYear` varchar(255) NOT NULL,
  `installationDate` datetime NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(5) NOT NULL,
  `unitPrice` double(20,2) NOT NULL,
  `taxPercent` float(5,2) NOT NULL,
  `taxAmount` double(20,2) NOT NULL,
  `totalAmount` double(20,2) NOT NULL,
  `serialNo` text NOT NULL,
  `addedBy` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  `modifyBy` int(11) NOT NULL,
  `modifyDate` datetime NOT NULL,
  PRIMARY KEY (`servicedetailsId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `servicedetails`
--

INSERT INTO `servicedetails` (`servicedetailsId`, `serviceId`, `particulars`, `fromDate`, `toDate`, `financialYear`, `installationDate`, `productId`, `quantity`, `unitPrice`, `taxPercent`, `taxAmount`, `totalAmount`, `serialNo`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`) VALUES
(3, 1, '', '2013-06-04 00:00:00', '2014-06-11 00:00:00', '2014-2015', '2013-06-04 00:00:00', 1, 1, 1500.00, 0.00, 0.00, 1500.00, '12345', 26, '2013-06-01 07:19:00', 26, '2013-06-01 07:19:00'),
(4, 1, '', '2013-06-11 00:00:00', '2015-06-30 00:00:00', '2015-2016', '2013-06-04 00:00:00', 3, 1, 2500.00, 0.00, 0.00, 2500.00, '43125', 26, '2013-06-01 07:19:00', 26, '2013-06-01 07:19:00'),
(9, 3, '', '2013-06-11 00:00:00', '2014-06-11 00:00:00', '2014-2015', '2013-06-19 00:00:00', 3, 1, 1500.00, 0.00, 0.00, 1500.00, '12345', 26, '2013-06-01 11:04:13', 26, '2013-06-01 11:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `settingsId` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(200) NOT NULL,
  `value` text NOT NULL,
  `system` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`settingsId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settingsId`, `keyword`, `value`, `system`) VALUES
(1, 'email', 'admin@webtrackers.co.in', 0),
(2, 'metaKey', 'admin@webtrackers.co.in', 0),
(3, 'metaDescription', 'admin@webtrackers.co.in', 0),
(4, 'siteTitle', 'IM-POSTER', 0),
(5, 'pageCount', '35', 1),
(6, 'homePageId', '0', 1),
(7, 'Deactivate Site', '0', 1),
(8, 'Deactivate Message', 'Site Temporarily Under Construction . Please contact admin@webtrtackerts.co.in', 1),
(9, 'Validate Wtos', '1', 1),
(10, 'Validate WtosMessage', 'Please contact admin@webtrackers.co.in to enjoy uninterrupted service.', 1),
(11, 'Validate WtosDate', '==gMwEDOtATMtATO', 1),
(12, 'Deactivate Date', '2015-12-02', 1),
(13, 'language', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `productId` int(11) NOT NULL,
  `purchaseQuantity` int(10) NOT NULL,
  `billQuantity` int(10) NOT NULL,
  `returnQuantity` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `make` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`productId`, `purchaseQuantity`, `billQuantity`, `returnQuantity`, `quantity`, `make`, `model`) VALUES
(4, 0, 21, 0, -21, '', 'T-Pad WS802C-3G');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE IF NOT EXISTS `vendor` (
  `vendorId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `website` varchar(255) NOT NULL,
  `contactPerson` varchar(255) NOT NULL,
  `contactPersonPhone` varchar(255) NOT NULL,
  `vat` varchar(10) NOT NULL,
  `tin` varchar(10) NOT NULL,
  `cst` varchar(10) NOT NULL,
  `bankAccountDetails` text NOT NULL,
  `note` text NOT NULL,
  `fax` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  `modifyBy` int(11) NOT NULL,
  `modifyDate` datetime NOT NULL,
  PRIMARY KEY (`vendorId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendorId`, `name`, `company`, `phone`, `email`, `address`, `website`, `contactPerson`, `contactPersonPhone`, `vat`, `tin`, `cst`, `bankAccountDetails`, `note`, `fax`, `active`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`) VALUES
(1, 'Mrinal Kanti Pain', 'Mrinal Inc', '9563688919', 'mrinal.pain@rediffmail.com', 'Kolkata', 'mrinal.co.in', '', '', '', '', '', '', '', '', 1, 26, '2013-05-21 10:17:35', 26, '2013-05-21 10:17:35');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE IF NOT EXISTS `wishlist` (
  `wishlistId` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  PRIMARY KEY (`wishlistId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlistId`, `productId`, `customerId`, `addedDate`) VALUES
(1, 3, 24, '2014-02-14 07:42:55'),
(2, 1, 24, '2014-02-14 07:46:15'),
(3, 5, 23, '2014-02-19 07:53:45'),
(4, 1, 27, '2014-02-27 11:03:42'),
(5, 4, 17, '2014-03-01 06:45:44'),
(6, 2, 26, '2014-03-01 11:30:05');

-- --------------------------------------------------------

--
-- Table structure for table `wtbox`
--

CREATE TABLE IF NOT EXISTS `wtbox` (
  `wtboxId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `accessKey` varchar(20) NOT NULL,
  `langId` int(11) NOT NULL,
  `css` text NOT NULL,
  `container` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `tinymce` tinyint(1) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  `system` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`wtboxId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
