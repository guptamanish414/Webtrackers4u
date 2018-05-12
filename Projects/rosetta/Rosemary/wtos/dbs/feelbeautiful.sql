-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 28, 2015 at 12:37 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `feelbeautiful`
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
(26, 'ROSY', 'Super Admin', '123', '123', '', '', 0, '2014-12-12 01:35:06', 1);

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
(4, 'Offer 1', 'wtos-images/Banner/185660_12-12-2014_rosette-design.png', 'Body', '', 'Inactive', 26, '2014-02-07 07:28:07', 26, '2014-12-12 06:49:11'),
(5, 'Special design', 'wtos-images/Banner/709183_12-12-2014_rosette.png', 'Header', 'http://feelbeautiful.co.in/enquery', 'Active', 26, '2014-02-07 07:30:36', 26, '2014-12-12 03:01:59');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contactid`, `name`, `email`, `mobile`, `details`, `addedBy`, `addedDate`, `active`, `image`) VALUES
(13, 'Mizanur Rahaan', 'mizanur82@gmail.com', '8017477871', 'I am Testing Contact Page', '', '2014-12-12 01:39:29', 0, 'wtos-images/566707_12-12-2014__rose.jpg'),
(14, 'Mizanur Rahaan', 'mizanur82@gmail.com', '8017477871', 'test', '', '2014-12-12 02:37:41', 0, ''),
(15, 'Mizanur Rahaan', 'mizanur82@gmail.com', '8017477871', 'test', '', '2014-12-12 02:39:57', 0, ''),
(16, 'Mizanur Rahaan', 'mizanur82@gmail.com', '8017477871', 'I need stylish modern black churidar with silver design. ', '', '2014-12-12 02:47:23', 0, ''),
(17, 'Mizanur Rahaan', 'mizanur82@gmail.com', '8017477871', 'testing emial functionality', '', '2014-12-12 03:26:45', 0, ''),
(18, 'Mizanur Rahaan', 'mizanur82@gmail.com', '8017477871', 'testing emial functionality', '', '2014-12-12 03:27:28', 0, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `name`, `phone`, `email`, `address`, `gender`, `age`, `shippingAddress`, `username`, `password`, `img`, `branch`, `pin`, `vatNo`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`, `vcode`, `status`, `dealer`) VALUES
(1, 'mizanur rahaman', '8017477871', 'mizanur82@gmail.com', 'Kol', '', 0, 'Kol', '', '123', '', '', '', '', 0, '2014-12-13 06:59:56', 0, '2014-12-13 06:59:56', '', 'Active', 'No');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`imageId`, `title`, `image`, `imageType`, `imageTypeId`, `featured`, `active`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`) VALUES
(1, 'black lehangas', 'wtos-images/product/200764_12-12-2014_DSC_1040.JPG', 'Product', 1, 'Yes', 1, 26, '2014-12-12 02:49:34', 26, '2014-12-12 02:49:34'),
(2, 'pink saLwar', 'wtos-images/product/170467_12-12-2014_DSC_1069.JPG', 'Product', 2, 'Yes', 1, 26, '2014-12-12 02:55:09', 26, '2014-12-12 02:59:09'),
(3, 'designer lahangas', 'wtos-images/product/372377_12-12-2014_DSC_1095.JPG', 'Product', 3, 'Yes', 1, 26, '2014-12-12 03:01:34', 26, '2014-12-12 03:01:34'),
(4, 'western dress', 'wtos-images/product/901289_12-12-2014_DSC_1115.JPG', 'Product', 4, 'Yes', 1, 26, '2014-12-12 03:06:05', 26, '2014-12-12 03:06:05'),
(5, 'western dress', 'wtos-images/product/251031_12-12-2014_DSC_1116.JPG', 'Product', 5, 'Yes', 1, 26, '2014-12-12 03:17:23', 26, '2014-12-12 03:17:23'),
(6, 'salwar', 'wtos-images/product/285592_12-12-2014_DSC_1139.JPG', 'Product', 6, 'Yes', 1, 26, '2014-12-12 03:19:22', 26, '2014-12-12 03:19:22'),
(7, 'western dress', 'wtos-images/product/635277_12-12-2014_DSC_1162.JPG', 'Product', 7, 'Yes', 1, 26, '2014-12-12 03:21:09', 26, '2014-12-12 03:34:19'),
(8, 'saree', 'wtos-images/product/402149_12-12-2014_DSC_1182.JPG', 'Product', 8, 'Yes', 1, 26, '2014-12-12 03:22:29', 26, '2014-12-12 03:22:29'),
(9, '', 'wtos-images/product/192794_13-12-2014_DSC_1162.JPG', 'Product', 9, 'Yes', 1, 26, '2014-12-13 06:50:17', 26, '2014-12-13 06:50:17'),
(10, '', 'wtos-images/product/194440_13-12-2014_gl.jpg', 'Product', 9, 'No', 1, 26, '2014-12-13 06:50:31', 26, '2014-12-13 06:50:31');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `imageuploader`
--

INSERT INTO `imageuploader` (`imageId`, `title`, `image`, `addedDate`) VALUES
(1, '', 'wtos-images/965915_12-12-2014_rose.jpg', '0000-00-00 00:00:00');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orderdetailsId`, `orderId`, `productId`, `quantity`, `serialNo`, `returnQuantity`, `note`, `returned`, `returenedPrice`, `returnDate`, `purchasePrice`, `marketPrice`, `ourPrice`, `discountAmount`, `discountPercent`, `amount`, `taxPercent`, `taxAmount`, `totalAmount`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`) VALUES
(1, 1, 7, 1, '', '0', '', 0, 0.00, '0000-00-00 00:00:00', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, '2014-12-13 07:01:16', 0, '2014-12-13 07:01:16'),
(2, 1, 9, 1, '', '0', '', 0, 0.00, '0000-00-00 00:00:00', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, '2014-12-13 07:01:16', 0, '2014-12-13 07:01:16');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `orderType`, `orderCode`, `customerId`, `payment`, `status`, `invoiceId`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`, `note`, `specialDiscountTitle`, `specialDiscountPrice`, `emailTo`, `emailSubject`, `emailBody`, `mobile`, `messageBody`, `deliveryCharge`, `deliveryDate`, `orderDate`, `cancelledByCustomer`, `cancelledByAdmin`, `partServiceId`, `taxPercent`, `taxAmount`, `amount`, `discountPercent`, `paymentStatus`, `challanNo`, `discountAmount`, `totalAmount`, `couponCode`, `active`) VALUES
(1, '0', '1418454076', 1, 'Cash on delivery', 'Delivered', '', 0, '2014-12-13 07:01:16', 0, '2014-12-13 07:01:16', '', '', 0.00, '', '', '', '', '', 0.00, '0000-00-00 00:00:00', '2014-12-13 00:00:00', 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 'Pending', '', 0.00, 0.00, '', 0);

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
(53, 'Contact', '<span style="font-size: x-large;"><br /><span style="font-size: xx-large;">ROSETTE</span></span><br /><span style="font-size: medium; color: #666666;">143/164 C N Roy Road&nbsp; </span><br /><span style="font-size: medium; color: #666666;">Picnic Garden Kol-39 </span><br /><br /><span style="font-size: medium;">Mobile: 8420867149</span><br /><span style="font-size: medium;">Web: feelbeautiful.co.in</span><br /><span style="font-size: medium;">Eail: <a href="mailto:rosetta.mcdermott33@gmail.com">rosetta.mcdermott33@gmail.com</a> </span><br /><br />wtpage-contact.php-wtpage', 1, 'Imposter Contact', 'Imposter Contact', 26, 0, '2014-12-10 10:38:58', '0', '', '', 'contact', '', 0, 'Contact', 0, 0, 0, '', 0, 1, ''),
(55, 'enquiry', 'wtpage-contact-us.php-wtpage', 1, 'enquiry', 'enquiry', 26, 0, '2014-12-13 09:19:53', '0', '', '', 'enquiry', '', 0, 'enquiry', 0, 0, 0, '', 0, 1, ''),
(56, 'aboutus', '<img style="float: left; margin-left: 0px; margin-right: 10px;" src="../wtos-images/965915_12-12-2014_rose.jpg" alt="" width="200" /><span style="font-size: medium; color: #616161;"><span style="font-family: verdana,geneva;"><strong><span style="color: #dc4bd9;">Rosette by Rose</span></strong>, came into being as a high street fashion wear brand for women. The brand designs contemporary clothes to suit the free spirited style for women of all ages. The products reflect THE WOMAN in all its creation. Rosette aspires to incorporate different cultures, colors and looks that are boundless to a particular person or place.</span> <span style="font-family: verdana,geneva;"><br /><br /><br />The brand essentially caters to Today''s woman of substance who seek stylish and fashionable products at an affordable price. Its also ensures that The Woman feels Beautiful in the creation! Which simple yet beautiful and classy without much glitz</span></span>', 1, '', '', 26, 0, '2014-12-13 07:07:44', '0', '', '', 'aboutus', '', 0, 'About us', 0, 1, 0, '', 0, 1, ''),
(57, 'Refunds and Exchange', '<h2>Return and Exchange Information</h2>\r\n<p>Because we are customers ourselves and we know it can be frustrating when the purchase is not quite right, we offer a complete "no fuss" guarantee to all our customers. If your goods are damaged or if you receive an incorrect product, we would be happy to give you the following alternatives:<br /><br /> Exchange the goods for an alternative of your choice to equal value.<br /><br /> Give you a full refund for the price you paid for the goods.<br /><br /> At feelbeautifu, every care is taken to ensure your poster, art print or merchandise is well packed before it is despatched. We take extreme measures to ensure that your order arrives in pristine condition. However due to the delicate nature of these products, in rare circumstances items can arrive damaged. We are unable to take responsibility for any loss or damages of products in transit. But we will make contact with the relevant courier to track your package or initiate a claim for lost products.<br /><br /> In case of damaged products, contact must be made within 24 hours of receipt of the products by email&nbsp;<span style="font-size: medium;"><a href="mailto:rosetta.mcdermott33@gmail.com">rosetta.mcdermott33@gmail.com</a> </span> notifying us of any damage to the product. Upon return, the article will undergo a quality control check to ensure the quality problem is found to be our responsibility rather than misuse or abuse of the product outside of our control. Once the returned product passes the quality control check to ensure it is unused and in its original packaging stage, an exchange/refund will be dispatched. The posters, art prints or merchandise must be returned in their original mailing tubes, and in their original packaging (where possible).</p>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<h2>Terms And Condition</h2>\r\n<div class="clr">&nbsp;</div>\r\n<ul style="list-style: decimal;">\r\n<li>Because we are customers ourselves and we know it can b</li>\r\n<li>At feelbeautifu, every care is taken to ensure your poster, art print or merchandise is well packed befor</li>\r\n<li>In case of damaged products, contact</li>\r\n<li>Upon return, the article will undergo a quality control check to ensure</li>\r\n<li>Maecenas porttitor mattis vulputate. Sed sed augue congue, tempor elit ut, porttitor ligula. Nulla facilisi. Nunc auctor sem in urna accumsan commodo. Praesent egestas adipiscing enim vel rhoncus. Pellentesque ac fr</li>\r\n<li>Praesent egestas adipiscing enim vel rhoncus. Pellentesque ac fr</li>\r\n<li>Maecenas porttitor mattis vulputate. Sed sed augue congue, tempor elit u</li>\r\n<li>Nunc auctor id nulla nec urna elementum volutpat eget</li>\r\n<li>Sed sed augue congue, tempor elit ut, porttitor ligula. Nulla facilisi. Nunc auctor sem in urna accumsan commodo.</li>\r\n<li>Because we are customers ourselves and we know it can b</li>\r\n<li>At feelbeautifu, every care is taken to ensure your poster, art print or merchandise is well packed befor</li>\r\n<li>In case of damaged products, contact</li>\r\n<li>Upon return, the article will undergo a quality control check to ensure</li>\r\n</ul>', 1, 'Imposter Refunds and Exchange', 'Imposter Refunds and Exchange', 26, 0, '2014-12-13 06:58:07', '0', '', '', 'refunds-and-exchange', '', 0, 'Refunds and Exchange', 0, 0, 0, '', 0, 1, ''),
(58, 'Privacy Policy', '<h2>Refunds and Exchange Information</h2>\r\n<p>Because we are customers ourselves and we know it can be frustrating when the purchase is not quite right, we offer a complete "no fuss" guarantee to all our customers. If your goods are damaged or if you receive an incorrect product, we would be happy to give you the following alternatives:<br /><br /> Exchange the goods for an alternative of your choice to equal value.<br /><br /> Give you a full refund for the price you paid for the goods.<br /><br /> At feelbeautifu, every care is taken to ensure your poster, art print or merchandise is well packed before it is despatched. We take extreme measures to ensure that your order arrives in pristine condition. However due to the delicate nature of these products, in rare circumstances items can arrive damaged. We are unable to take responsibility for any loss or damages of products in transit. But we will make contact with the relevant courier to track your package or initiate a claim for lost products.<br /><br /> In case of damaged products, contact must be made within 24 hours of receipt of the products by email&nbsp;<span style="font-size: medium;"><a href="mailto:rosetta.mcdermott33@gmail.com">rosetta.mcdermott33@gmail.com</a> </span> notifying us of any damage to the product. Upon return, the article will undergo a quality control check to ensure the quality problem is found to be our responsibility rather than misuse or abuse of the product outside of our control. Once the returned product passes the quality control check to ensure it is unused and in its original packaging stage, an exchange/refund will be dispatched. The posters, art prints or merchandise must be returned in their original mailing tubes, and in their original packaging (where possible).</p>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<h2>Terms And Condition</h2>\r\n<div class="clr">&nbsp;</div>\r\n<ul style="list-style: decimal;">\r\n<li>Because we are customers ourselves and we know it can b</li>\r\n<li>At feelbeautifu, every care is taken to ensure your poster, art print or merchandise is well packed befor</li>\r\n<li>In case of damaged products, contact</li>\r\n<li>Upon return, the article will undergo a quality control check to ensure</li>\r\n<li>Maecenas porttitor mattis vulputate. Sed sed augue congue, tempor elit ut, porttitor ligula. Nulla facilisi. Nunc auctor sem in urna accumsan commodo. Praesent egestas adipiscing enim vel rhoncus. Pellentesque ac fr</li>\r\n<li>Praesent egestas adipiscing enim vel rhoncus. Pellentesque ac fr</li>\r\n<li>Maecenas porttitor mattis vulputate. Sed sed augue congue, tempor elit u</li>\r\n<li>Nunc auctor id nulla nec urna elementum volutpat eget</li>\r\n<li>Sed sed augue congue, tempor elit ut, porttitor ligula. Nulla facilisi. Nunc auctor sem in urna accumsan commodo.</li>\r\n<li>Because we are customers ourselves and we know it can b</li>\r\n<li>At feelbeautifu, every care is taken to ensure your poster, art print or merchandise is well packed befor</li>\r\n<li>In case of damaged products, contact</li>\r\n<li>Upon return, the article will undergo a quality control check to ensure</li>\r\n</ul>', 1, 'Imposter Privacy Policy', 'Imposter Privacy Policy', 26, 0, '2014-12-12 04:34:31', '0', '', '', 'privacy-policy', '', 0, 'Privacy Policy', 0, 0, 0, '', 0, 1, ''),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `name`, `code`, `shortDescription`, `fullDescription`, `active`, `model`, `seoId`, `marketPrice`, `discount`, `discountPercent`, `ourPrice`, `starRating`, `make`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`, `status`, `featured`, `orders`, `oldPrice`, `dealerId`) VALUES
(1, 'Black Lehangas', '0012', 'With the start of the wedding season you will definitely need something stylish like this black coloured lehenga', '<span>With the start of the wedding season you will definitely need something stylish like this black coloured lehenga set from Sangria. This set consists of a stylish solid pink coloured choli, a lehenga featuring beautiful motifs and a simple dupatta.&nbsp;</span>', 'Active', 'custom', 'black-lehangas-lehangas', 0.00, 0.00, 0.00, 2400.00, 0, 'custom', 26, '2014-12-12 02:48:53', 26, '2014-12-12 02:57:53', 'Available', 0, '', 0.00, 0),
(2, 'pink salwar', '0013', 'With the start of the wedding season you will definitely need something stylish like this black coloured lehenga set from Sangria. This set consists of a stylish solid pink coloured choli, a lehenga featuring beautiful motifs and a simple dupatta. ', '<span>With the start of the wedding season you will definitely need something stylish like this pink salwar set . This set consists of a stylish solid pink coloured choli, a lehenga featuring beautiful motifs and a simple dupatta.&nbsp;</span>', 'Active', '', 'pink-salwar-salwars', 0.00, 0.00, 0.00, 2500.00, 0, 'custom', 26, '2014-12-12 02:54:11', 26, '2014-12-12 02:55:27', 'Available', 0, '', 0.00, 0),
(3, 'Designer lahangas', '0014', 'With the start of the wedding season you will definitely need something stylish like this black coloured lehenga set from Sangria. This set consists of a stylish solid pink coloured choli, a lehenga featuring beautiful motifs and a simple dupatta. ', '<span>With the start of the wedding season you will definitely need something stylish coloured lehenga set from Sangria. This set consists of a stylish solid pink coloured choli, a lehenga featuring beautiful motifs and a simple dupatta.&nbsp;</span>', 'Active', '', 'designer-lahangas-lehangas', 0.00, 0.00, 0.00, 3000.00, 0, 'custom', 26, '2014-12-12 03:00:06', 26, '2014-12-12 03:00:06', 'Available', 0, '', 0.00, 0),
(4, 'western dress', '0014', 'Jet from day to night with ease wearing dress. Tailored in regular fit, this dress will keep you comfortable all day long. Team it with matching pumps to step out in style.', '<span>Jet from day to night with ease wearing dress by &nbsp;Tailored in regular fit, this dress will keep you comfortable all day long. Team it with matching pumps to step out in style.</span>', 'Active', '', 'western-dress-western-dresses', 0.00, 0.00, 0.00, 3500.00, 0, 'custom', 26, '2014-12-12 03:05:42', 26, '2014-12-12 03:05:42', 'Available', 0, '', 0.00, 0),
(5, 'western dress', '0015', 'Jet from day to night with ease wearing dress. Tailored in regular fit, this dress will keep you comfortable all day long. Team it with matching pumps to step out in style.', 'Jet from day to night with ease wearing dress. Tailored in regular fit, this dress will keep you comfortable all day long. Team it with matching pumps to step out in style.', 'Active', '', 'western-dress-western-dresses-2', 0.00, 0.00, 0.00, 2800.00, 0, 'custom', 26, '2014-12-12 03:16:49', 26, '2014-12-12 03:17:48', 'Available', 0, '', 0.00, 0),
(6, 'salwar', '0015', 'Jet from day to night with ease wearing dress. Tailored in regular fit, this dress will keep you comfortable all day long. Team it with matching pumps to step out in style.', 'Jet from day to night with ease wearing dress. Tailored in regular fit, this dress will keep you comfortable all day long. Team it with matching pumps to step out in style.', 'Active', '', 'salwar-salwars', 0.00, 0.00, 0.00, 2700.00, 0, 'custom', 26, '2014-12-12 03:18:58', 26, '2014-12-12 03:18:58', 'Available', 0, '', 0.00, 0),
(7, 'western dress', '0016', 'Jet from day to night with ease wearing dress. Tailored in regular fit, this dress will keep you comfortable all day long. Team it with matching pumps to step out in style.', 'Jet from day to night with ease wearing dress. Tailored in regular fit, this dress will keep you comfortable all day long. Team it with matching pumps to step out in style.', 'Active', '', 'western-dress-western-dresses-3', 0.00, 0.00, 0.00, 0.00, 0, 'custom', 26, '2014-12-12 03:20:43', 26, '2014-12-13 06:47:49', 'Available', 0, '', 0.00, 0),
(8, 'saree', '0018', 'Jet from day to night with ease wearing dress. Tailored in regular fit, this dress will keep you comfortable all day long. Team it with matching pumps to step out in style.', 'Jet from day to night with ease wearing dress. Tailored in regular fit, this dress will keep you comfortable all day long. Team it with matching pumps to step out in style.', 'Active', '', 'saree-sarees', 0.00, 0.00, 0.00, 2300.00, 0, 'custom', 26, '2014-12-12 03:22:09', 26, '2014-12-12 03:22:09', 'Available', 0, '', 0.00, 0),
(9, 'lehenga', '', 'lehenga', 'lehenga', 'Active', '', 'lehenga-trousers-sari', 0.00, 0.00, 0.00, 0.00, 0, '', 26, '2014-12-13 06:49:51', 26, '2014-12-13 06:56:30', 'Available', 0, '', 0.00, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `productcategory`
--

INSERT INTO `productcategory` (`productcategoryId`, `title`, `parentId`, `description`, `productType`, `img`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`, `parentIds`, `featureIds`) VALUES
(5, 'Trousers', 0, '', 'Trousers', '', 26, '2013-05-15 08:57:22', 26, '2014-12-12 05:52:57', '', ''),
(6, 'Skirts', 0, '', 'Skirts', '', 26, '2013-06-15 12:19:01', 26, '2014-12-12 05:52:40', '', ''),
(7, 'Kurtis', 0, '', '', '', 26, '2014-01-27 10:28:26', 26, '2014-12-12 05:52:25', '', ''),
(8, 'Wedding gown', 0, '', '', '', 26, '2014-01-27 10:28:38', 26, '2014-12-12 05:52:09', '', ''),
(9, 'Wedding lehangas', 0, '', '', '', 26, '2014-01-27 10:28:58', 26, '2014-12-12 05:51:53', '', ''),
(10, 'Western dresses', 0, '', '', '', 26, '2014-01-27 10:29:14', 26, '2014-12-12 05:51:32', '', ''),
(11, 'Lehangas', 0, '', '', '', 26, '2014-01-27 10:29:26', 26, '2014-12-12 05:51:11', '', ''),
(12, 'Sarees', 0, '', '', '', 26, '2014-01-27 10:29:52', 26, '2014-12-12 05:50:51', '', ''),
(13, 'Salwars', 0, '', '', '', 26, '2014-01-27 10:30:05', 26, '2014-12-12 05:50:29', '', ''),
(15, 'sari', 0, '', '', '', 26, '2014-12-13 06:56:00', 26, '2014-12-13 06:56:00', '', '');

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
(13, 2),
(11, 1),
(11, 3),
(10, 4),
(10, 5),
(13, 6),
(12, 8),
(10, 7),
(5, 9),
(15, 9);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `productfeaturemap`
--

CREATE TABLE IF NOT EXISTS `productfeaturemap` (
  `productfeatureId` int(11) NOT NULL,
  `productId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `productview`
--

INSERT INTO `productview` (`productviewId`, `productId`, `totalView`, `lastViewDate`) VALUES
(1, 3, 129, '2014-12-12 03:02:20'),
(2, 1, 61, '2014-12-13 09:23:56'),
(3, 2, 34, '2014-12-13 09:23:46'),
(4, 5, 48, '2014-12-13 07:14:33'),
(5, 4, 33, '2014-12-13 09:23:32'),
(6, 8, 4, '2014-12-12 04:16:07'),
(7, 7, 2, '2014-12-12 03:34:52'),
(8, 6, 2, '2014-12-13 06:45:57'),
(9, 9, 7, '2015-03-25 05:59:15');

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
(1, 'email', 'rosetta.mcdermott33@gmail.com', 0),
(2, 'metaKey', 'feelbeautiful.co.in', 0),
(3, 'metaDescription', 'feelbeautiful.co.in', 0),
(4, 'siteTitle', 'feelbeautiful.co.in', 0),
(5, 'pageCount', '35', 1),
(6, 'homePageId', '0', 1),
(7, 'Deactivate Site', '0', 1),
(8, 'Deactivate Message', 'Site Temporarily Under Construction . Please contact admin@webtrtackerts.co.in', 1),
(9, 'Validate Wtos', '1', 1),
(10, 'Validate WtosMessage', 'Please contact admin@webtrackers.co.in to enjoy uninterrupted service.', 1),
(11, 'Validate WtosDate', '==gMwEjNtATNtETM', 1),
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
(1, 'feelbeautiful', 'feelbeautiful', '8420867149', 'rosetta.mcdermott33@gmail.com', '143/164 c n roy road  picnic garden kol-39', 'feelbeautiful', '', '', '', '', '', '', '', '', 1, 26, '2013-05-21 10:17:35', 26, '2013-05-21 10:17:35');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
