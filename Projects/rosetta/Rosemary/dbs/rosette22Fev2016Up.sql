-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2016 at 10:06 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rosette`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `name`, `adminType`, `username`, `password`, `address`, `email`, `mobileNo`, `addedDate`, `active`) VALUES
(26, 'DeshLink', 'Super Admin', '123', '123', 'DeshLink', '456456456', 0, '2015-02-13 09:10:41', 1),
(27, '', 'Admin', '222', '222', '', '', 0, '2013-03-10 04:02:28', 0),
(28, 'im-poster', 'Super Admin', '123', '123', '', '', 0, '2014-02-27 10:48:29', 1);

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
-- Table structure for table `appearance`
--

CREATE TABLE IF NOT EXISTS `appearance` (
  `appearanceId` int(11) NOT NULL AUTO_INCREMENT,
  `logoImage` varchar(255) NOT NULL,
  `css` text NOT NULL,
  `sliderName` varchar(255) NOT NULL,
  `sliderEffect` varchar(255) NOT NULL,
  `sliderWidth` varchar(10) NOT NULL,
  `sliderHeight` varchar(10) NOT NULL,
  `sliderInterval` varchar(10) NOT NULL,
  `sliderAutoplay` tinyint(4) NOT NULL DEFAULT '0',
  `headerBgImg` varchar(255) NOT NULL,
  `headerBgImgCss` text NOT NULL,
  `footerBgImg` varchar(255) NOT NULL,
  `footerBgImgCss` text NOT NULL,
  `addedBy` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  `bodyBgImg` varchar(200) NOT NULL,
  `bodyBgImgCss` varchar(100) NOT NULL,
  PRIMARY KEY (`appearanceId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `appearance`
--

INSERT INTO `appearance` (`appearanceId`, `logoImage`, `css`, `sliderName`, `sliderEffect`, `sliderWidth`, `sliderHeight`, `sliderInterval`, `sliderAutoplay`, `headerBgImg`, `headerBgImgCss`, `footerBgImg`, `footerBgImgCss`, `addedBy`, `addedDate`, `active`, `bodyBgImg`, `bodyBgImgCss`) VALUES
(1, 'wtos-images/121058_1160887324756617521.png', '', 'nivoSlider.php', 'fade', '500', '100', '3000', 1, 'wtos-images/855552_bgImg.jpg', 'no-repeat', 'wtos-images/595924_repeat.jpg', 'repeat-x', 26, '2013-05-23 10:52:00', 1, 'wtos-images/ep.jpg', 'no-repeat');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`bannerId`, `title`, `image`, `type`, `link`, `status`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`) VALUES
(6, '', 'wtos-images/Banner/840034_04-02-2016_bags.jpg', 'Body', '', 'Active', 26, '2016-02-04 02:20:50', 26, '2016-02-04 02:20:50'),
(7, '', 'wtos-images/Banner/368094_04-02-2016_belts.jpg', 'Body', '', 'Active', 26, '2016-02-04 02:21:06', 26, '2016-02-04 02:24:51'),
(8, '', 'wtos-images/Banner/566077_04-02-2016_fragnance.jpg', 'Body', '', 'Active', 26, '2016-02-04 02:21:19', 26, '2016-02-04 02:24:47'),
(9, '', 'wtos-images/Banner/41852_04-02-2016_gloves.jpg', 'Body', '', 'Active', 26, '2016-02-04 02:21:26', 26, '2016-02-04 02:24:42'),
(10, '', 'wtos-images/Banner/279834_04-02-2016_hatsAndCaps.jpg', 'Body', '', 'Active', 26, '2016-02-04 02:21:33', 26, '2016-02-04 02:24:37'),
(11, '', 'wtos-images/Banner/32310_04-02-2016_jaens.jpg', 'Body', '', 'Active', 26, '2016-02-04 02:21:41', 26, '2016-02-04 02:24:33');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contactid`, `name`, `email`, `mobile`, `details`, `addedBy`, `addedDate`, `active`, `image`) VALUES
(8, 'Mizanur Rahaman', 'mizanur82@gmail.com', '5555555555555', 'techno test', '', '2013-01-06 01:45:13', 0, 'wtos-images/822096_testattachment.txt'),
(9, 'xdfsdfsd', 'fdfsd', 'fsdfsdfsfs', '', '', '2013-02-08 05:38:36', 0, ''),
(10, 'asd', 'asd@gmail.com', '5555555555', 'wearwqer', '', '2015-09-23 10:09:52', 0, 'wtos-images/756865_Chrysanthemum.jpg'),
(11, 'asraful', 'asd@gmail.com', '5555555555', '', '', '2015-10-27 12:50:43', 0, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `name`, `phone`, `email`, `address`, `gender`, `age`, `shippingAddress`, `username`, `password`, `img`, `branch`, `pin`, `vatNo`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`, `vcode`, `status`, `dealer`) VALUES
(10, 'sayan samanta', '9999999999', 'sayan@gmail.com', 'sector 5', '', 0, '', '', '123', '', '', '', '', 0, '2016-01-28 10:10:21', 0, '2016-01-28 10:10:21', '', 'Active', 'No'),
(11, 'asraful', '5555555555', 'admin@webhouse4u.co.uk', 'asdfsafgdfsge', '', 0, '', '', 'admin@webhouse4u.co.uk', '', '', '', '', 0, '2016-01-29 10:17:58', 0, '2016-01-29 10:17:58', '', 'Active', 'No');

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
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `eventId` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `dated` datetime NOT NULL,
  `venu` varchar(200) NOT NULL,
  `details` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `addedBy` int(10) NOT NULL,
  `addedDate` datetime NOT NULL,
  `modifyBy` int(10) NOT NULL,
  `modifyDate` datetime NOT NULL,
  PRIMARY KEY (`eventId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventId`, `title`, `dated`, `venu`, `details`, `image`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`) VALUES
(1, 'show1', '2016-02-24 06:08:10', 'Nico park', 'art gallery', 'wtos-images/811468_15-02-2016_170467_12-12-2014_DSC_1069.JPG', 26, '2016-02-15 12:10:16', 26, '2016-02-15 12:10:16'),
(2, 'show2', '2016-02-25 00:00:00', 'Eco park', 'deatilshlkuf', 'wtos-images/66669_15-02-2016_200764_12-12-2014_DSC_1040.JPG', 26, '2016-02-15 12:10:46', 26, '2016-02-15 12:50:52'),
(3, 'show22', '2016-02-17 00:00:00', 'saltlake ', 'nsdbvjfgk\r\n', 'wtos-images/235811_15-02-2016_12342694_1838752493017786_4067338447638908772_n.jpg', 26, '2016-02-15 12:11:19', 26, '2016-02-15 12:50:42');

-- --------------------------------------------------------

--
-- Table structure for table `gallerycatagory`
--

CREATE TABLE IF NOT EXISTS `gallerycatagory` (
  `galleryCatagoryId` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`galleryCatagoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Table structure for table `homepagebanner`
--

CREATE TABLE IF NOT EXISTS `homepagebanner` (
  `homepagebannerId` int(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `imageLink` varchar(255) NOT NULL,
  `productcategoryId` int(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `showOrder` int(11) NOT NULL,
  `addedBy` int(10) NOT NULL,
  `addedDate` datetime NOT NULL,
  `modifyBy` int(10) NOT NULL,
  `modifyDate` datetime NOT NULL,
  `bannerLink` varchar(200) NOT NULL,
  PRIMARY KEY (`homepagebannerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `homepagebanner`
--

INSERT INTO `homepagebanner` (`homepagebannerId`, `title`, `imageLink`, `productcategoryId`, `status`, `showOrder`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`, `bannerLink`) VALUES
(1, 'testPage', 'wtos-images/765005_14-10-2015_5c891bb03f53280805ac15f5ae852bf6.jpg', 5, 'Active', 0, 26, '2015-10-14 03:38:30', 26, '2015-10-14 03:47:15', 'sdfsdfs');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`imageId`, `title`, `image`, `imageType`, `imageTypeId`, `featured`, `active`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`) VALUES
(1, 'Sarees', 'wtos-images/product/548029_19-02-2016_402149_12-12-2014_DSC_1182.JPG', 'Product', 1, 'Yes', 1, 26, '2016-02-19 02:21:39', 26, '2016-02-19 02:21:39'),
(2, 'Salwars', 'wtos-images/product/562388_22-02-2016_285592_12-12-2014_DSC_1139.JPG', 'Product', 2, 'Yes', 1, 26, '2016-02-22 08:01:01', 26, '2016-02-22 08:01:01'),
(3, '', 'wtos-images/product/325016_22-02-2016_422265_12-12-2014_DSC_1162.JPG', 'Product', 3, 'Yes', 1, 26, '2016-02-22 08:04:09', 26, '2016-02-22 08:04:09'),
(4, 'pink salwor', 'wtos-images/product/7402_22-02-2016_170467_12-12-2014_DSC_1069.JPG', 'Product', 4, 'Yes', 1, 26, '2016-02-22 08:06:47', 26, '2016-02-22 08:06:47'),
(5, 'DesignerLahangas', 'wtos-images/product/551443_22-02-2016_372377_12-12-2014_DSC_1095.JPG', 'Product', 5, 'Yes', 1, 26, '2016-02-22 08:16:39', 26, '2016-02-22 08:16:39'),
(6, 'WesternDress ', 'wtos-images/product/553547_22-02-2016_901289_12-12-2014_DSC_1115.JPG', 'Product', 6, 'Yes', 1, 26, '2016-02-22 08:20:04', 26, '2016-02-22 08:20:04'),
(7, 'redWestarnDress', 'wtos-images/product/446050_22-02-2016_251031_12-12-2014_DSC_1116.JPG', 'Product', 7, 'Yes', 1, 26, '2016-02-22 08:22:18', 26, '2016-02-22 08:22:18'),
(8, 'blackLehangas', 'wtos-images/product/689092_22-02-2016_200764_12-12-2014_DSC_1040.JPG', 'Product', 8, 'Yes', 1, 26, '2016-02-22 08:24:31', 26, '2016-02-22 08:24:31');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `imageuploader`
--

INSERT INTO `imageuploader` (`imageId`, `title`, `image`, `addedDate`) VALUES
(1, 'sigeGuide', 'wtos-images/202824_04-02-2016_size.jpg', '0000-00-00 00:00:00'),
(14, 'Right-Box-Button', 'wtos-images/rightbox_bootom.jpg', '0000-00-00 00:00:00'),
(15, 'home1', 'wtos-images/img1.gif', '0000-00-00 00:00:00'),
(16, 'home2', 'wtos-images/img2.gif', '0000-00-00 00:00:00'),
(17, 'home3', 'wtos-images/img3.gif', '0000-00-00 00:00:00'),
(18, 'home4', 'wtos-images/img4.gif', '0000-00-00 00:00:00'),
(19, '', 'wtos-images/iso.gif', '0000-00-00 00:00:00'),
(20, '', 'wtos-images/question.gif', '0000-00-00 00:00:00'),
(21, '', 'wtos-images/join.gif', '0000-00-00 00:00:00'),
(22, '', 'wtos-images/success.gif', '0000-00-00 00:00:00'),
(23, '', 'wtos-images/unilevelplan.gif', '0000-00-00 00:00:00'),
(24, '', 'wtos-images/img1.gif', '0000-00-00 00:00:00'),
(25, '', 'wtos-images/1.png', '0000-00-00 00:00:00'),
(26, '', 'wtos-images/2.png', '0000-00-00 00:00:00'),
(27, '', 'wtos-images/4.png', '0000-00-00 00:00:00'),
(28, '', 'wtos-images/3.png', '0000-00-00 00:00:00'),
(29, '', 'wtos-images/BodyCare.jpg', '0000-00-00 00:00:00'),
(30, '', 'wtos-images/clear-skin.jpg', '0000-00-00 00:00:00'),
(31, '', 'wtos-images/Desire-Gold.jpg', '0000-00-00 00:00:00'),
(32, '', 'wtos-images/iron.jpg', '0000-00-00 00:00:00'),
(33, '', 'wtos-images/LiveCure.jpg', '0000-00-00 00:00:00'),
(34, '', 'wtos-images/Memorin.jpg', '0000-00-00 00:00:00'),
(35, '', 'wtos-images/mgrinder.jpg', '0000-00-00 00:00:00'),
(36, '', 'wtos-images/srimoti.jpg', '0000-00-00 00:00:00'),
(37, '', 'wtos-images/Zyme-Plus.jpg', '0000-00-00 00:00:00'),
(38, '1reg', 'wtos-images/1Business Incorporation Certificate.gif', '0000-00-00 00:00:00'),
(39, '3reg', 'wtos-images/3pancard.gif', '0000-00-00 00:00:00'),
(40, '4reg', 'wtos-images/4trade_thumb.gif', '0000-00-00 00:00:00'),
(41, '5reg', 'wtos-images/5ptax.gif', '0000-00-00 00:00:00'),
(42, '6reg', 'wtos-images/6etds.gif', '0000-00-00 00:00:00'),
(43, '8reg', 'wtos-images/8CST.gif', '0000-00-00 00:00:00'),
(44, '9reg', 'wtos-images/9dic_cert.gif', '0000-00-00 00:00:00'),
(45, '10reg', 'wtos-images/10iso.gif', '0000-00-00 00:00:00'),
(46, '', 'wtos-images/2Business Commencement Certificate.gif', '0000-00-00 00:00:00'),
(47, '2reg', 'wtos-images/2Business Commencement Certificate.gif', '0000-00-00 00:00:00'),
(48, '7reg', 'wtos-images/8VAT.gif', '0000-00-00 00:00:00'),
(49, 'grow', 'wtos-images/grow.gif', '0000-00-00 00:00:00'),
(50, 'mlm', 'wtos-images/mlm1.gif', '0000-00-00 00:00:00'),
(51, 'time', 'wtos-images/timetostart.gif', '0000-00-00 00:00:00');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=75 ;

--
-- Dumping data for table `pagecontent`
--

INSERT INTO `pagecontent` (`pagecontentId`, `title`, `content`, `active`, `metaTag`, `metaDescription`, `addedBy`, `editedBy`, `addedDate`, `parentPage`, `preInclude`, `postInclude`, `seoId`, `externalLink`, `priority`, `heading`, `onHead`, `onBottom`, `openNewTab`, `image`, `showImage`, `langId`, `pageCss`) VALUES
(26, 'Home', 'Bronx was established in 2002 at The Mall, Wood Green in North London. We specialise in men''s designer jeans, shirts, jackets, t-shirt, trainers, belts, bags and accessories. Being one of the best independent retailer in designer menswear, we are always under pressure to create the trends first. We guarantee you will receive 100% authentic designer merchandise from all the big labels such as Franklin &amp; Marshall, Hugo Boss, Stone Island, Polo Ralph Lauren, Money Clothing, Criminal Damage, Voi Jeans, Diesel, Vivienne Westwood etc.<br /><br />', 1, 'Home', 'Home', 26, 0, '2015-10-13 01:02:52', '0', '', '', 'homePage', '', 0, 'ABOUT BRONX', 1, 0, 0, '', 0, 1, ''),
(53, 'Contact', '<p>wtpage-contact.php-wtpage</p>', 1, 'Imposter Contact', 'Imposter Contact', 26, 0, '2015-10-14 01:45:13', '0', '', '', 'contact', '', 0, 'Contact', 1, 0, 0, '', 0, 1, ''),
(55, 'Shipping', '<h2>Refunds and Exchange Information</h2>\r\n<p>Because we are customers ourselves and we know it can be frustrating when the purchase is not quite right, we offer a complete \\"no fuss\\" guarantee to all our customers. If your goods are damaged or if you receive an incorrect product, we would be happy to give you the following alternatives:<br /><br /> Exchange the goods for an alternative of your choice to equal value.<br /><br /> Give you a full refund for the price you paid for the goods.<br /><br /> At imposter, every care is taken to ensure your poster, art print or merchandise is well packed before it is despatched. We take extreme measures to ensure that your order arrives in pristine condition. However due to the delicate nature of these products, in rare circumstances items can arrive damaged. We are unable to take responsibility for any loss or damages of products in transit. But we will make contact with the relevant courier to track your package or initiate a claim for lost products.<br /><br /> In case of damaged products, contact must be made within 24 hours of receipt of the products by email help@imposter.com notifying us of any damage to the product. Upon return, the article will undergo a quality control check to ensure the quality problem is found to be our responsibility rather than misuse or abuse of the product outside of our control. Once the returned product passes the quality control check to ensure it is unused and in its original packaging stage, an exchange/refund will be dispatched. The posters, art prints or merchandise must be returned in their original mailing tubes, and in their original packaging (where possible).</p>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<h2>Terms And Condition</h2>\r\n<div class=\\"clr\\">&nbsp;</div>\r\n<ul style=\\"list-style: decimal;\\">\r\n<li>Because we are customers ourselves and we know it can b</li>\r\n<li>At imposter, every care is taken to ensure your poster, art print or merchandise is well packed befor</li>\r\n<li>In case of damaged products, contact</li>\r\n<li>Upon return, the article will undergo a quality control check to ensure</li>\r\n<li>Maecenas porttitor mattis vulputate. Sed sed augue congue, tempor elit ut, porttitor ligula. Nulla facilisi. Nunc auctor sem in urna accumsan commodo. Praesent egestas adipiscing enim vel rhoncus. Pellentesque ac fr</li>\r\n<li>Praesent egestas adipiscing enim vel rhoncus. Pellentesque ac fr</li>\r\n<li>Maecenas porttitor mattis vulputate. Sed sed augue congue, tempor elit u</li>\r\n<li>Nunc auctor id nulla nec urna elementum volutpat eget</li>\r\n<li>Sed sed augue congue, tempor elit ut, porttitor ligula. Nulla facilisi. Nunc auctor sem in urna accumsan commodo.</li>\r\n<li>Because we are customers ourselves and we know it can b</li>\r\n<li>At imposter, every care is taken to ensure your poster, art print or merchandise is well packed befor</li>\r\n<li>In case of damaged products, contact</li>\r\n<li>Upon return, the article will undergo a quality control check to ensure</li>\r\n</ul>', 1, 'Imposter Shipping', 'Imposter Shipping', 26, 0, '2014-01-30 07:49:14', '0', '', '', 'shipping', '', 0, 'Shipping', 0, 0, 0, '', 0, 1, ''),
(56, 'Career', '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">\r\n<h2>Refunds and Exchange Information</h2>\r\n<p>Because we are customers ourselves and we know it can be frustrating when the purchase is not quite right, we offer a complete "no fuss" guarantee to all our customers. If your goods are damaged or if you receive an incorrect product, we would be happy to give you the following alternatives:<br /><br /> Exchange the goods for an alternative of your choice to equal value.<br /><br /> Give you a full refund for the price you paid for the goods.<br /><br /> At imposter, every care is taken to ensure your poster, art print or merchandise is well packed before it is despatched. We take extreme measures to ensure that your order arrives in pristine condition. However due to the delicate nature of these products, in rare circumstances items can arrive damaged. We are unable to take responsibility for any loss or damages of products in transit. But we will make contact with the relevant courier to track your package or initiate a claim for lost products.<br /><br /> In case of damaged products, contact must be made within 24 hours of receipt of the products by email help@imposter.com notifying us of any damage to the product. Upon return, the article will undergo a quality control check to ensure the quality problem is found to be our responsibility rather than misuse or abuse of the product outside of our control. Once the returned product passes the quality control check to ensure it is unused and in its original packaging stage, an exchange/refund will be dispatched. The posters, art prints or merchandise must be returned in their original mailing tubes, and in their original packaging (where possible).</p>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n</div>\r\n<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">\r\n<h2>Terms And Condition</h2>\r\n<div class="clr">&nbsp;</div>\r\n<ul style="list-style: decimal;">\r\n<li>Because we are customers ourselves and we know it can b</li>\r\n<li>At imposter, every care is taken to ensure your poster, art print or merchandise is well packed befor</li>\r\n<li>In case of damaged products, contact</li>\r\n<li>Upon return, the article will undergo a quality control check to ensure</li>\r\n<li>Maecenas porttitor mattis vulputate. Sed sed augue congue, tempor elit ut, porttitor ligula. Nulla facilisi. Nunc auctor sem in urna accumsan commodo. Praesent egestas adipiscing enim vel rhoncus. Pellentesque ac fr</li>\r\n<li>Praesent egestas adipiscing enim vel rhoncus. Pellentesque ac fr</li>\r\n<li>Maecenas porttitor mattis vulputate. Sed sed augue congue, tempor elit u</li>\r\n<li>Nunc auctor id nulla nec urna elementum volutpat eget</li>\r\n<li>Sed sed augue congue, tempor elit ut, porttitor ligula. Nulla facilisi. Nunc auctor sem in urna accumsan commodo.</li>\r\n<li>Because we are customers ourselves and we know it can b</li>\r\n<li>At imposter, every care is taken to ensure your poster, art print or merchandise is well packed befor</li>\r\n<li>In case of damaged products, contact</li>\r\n<li>Upon return, the article will undergo a quality control check to ensure</li>\r\n</ul>\r\n<div>&nbsp;</div>\r\n</div>', 1, 'Imposter Career', 'Imposter Career', 26, 0, '2015-10-30 10:38:35', '0', '', '', 'career', '', 0, 'Career', 1, 1, 0, '', 0, 1, ''),
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
(71, 'submit-product', 'wtpage-submit-product.php-wtpage', 1, 'submit-product', 'submit-product', 26, 0, '2014-03-01 06:44:26', '0', '', '', 'submit-product', '', 0, 'Submit Product', 0, 0, 0, '', 0, 1, ''),
(72, 'Size Guide', '<img style="margin-left: 20%;" src="../wtos-images/202824_04-02-2016_size.jpg" alt="android" />', 1, 'size guide', 'size guide', 26, 0, '2016-02-04 01:11:11', '0', '', '', 'sizeGuide', '', 0, 'Size Guide', 1, 0, 0, '', 0, 1, ''),
(73, 'Gallery', 'wtpage-gallery.php-wtpage', 1, 'Gallery', 'Gallery', 26, 0, '2016-02-15 10:35:51', '0', '', '', 'Gallery', '', 0, 'Gallery', 1, 0, 0, '', 0, 1, ''),
(74, 'Events', 'wtpage-events.php-wtpage', 1, 'events', 'events', 26, 0, '2016-02-17 11:36:59', '0', '', '', 'events', '', 0, 'Events', 0, 0, 0, '', 0, 1, '');

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
-- Table structure for table `photogallery`
--

CREATE TABLE IF NOT EXISTS `photogallery` (
  `photoGalleryId` int(10) NOT NULL AUTO_INCREMENT,
  `galleryCatagoryId` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`photoGalleryId`),
  KEY `photoGalleryId` (`photoGalleryId`),
  KEY `galleryCatagoryId` (`galleryCatagoryId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=205 ;

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
  `featured` varchar(50) NOT NULL,
  `orders` varchar(255) NOT NULL DEFAULT '0',
  `oldPrice` double(20,2) NOT NULL,
  `dealerId` int(11) NOT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `name`, `code`, `shortDescription`, `fullDescription`, `active`, `model`, `seoId`, `marketPrice`, `discount`, `discountPercent`, `ourPrice`, `starRating`, `make`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`, `status`, `featured`, `orders`, `oldPrice`, `dealerId`) VALUES
(1, 'Saree', '', 'Jet from day to night with ease wearing dress. Tailored in regular fit, this dress will keep you comfortable all day long. Team it with matching pumps to step out in style. ', 'Jet from day to night with ease wearing dress. Tailored in regular fit, this dress will keep you comfortable all day long. Team it with matching pumps to step out in style.', 'Active', '', 'saree-sarees', 0.00, 0.00, 0.00, 2300.00, 0, '', 26, '2016-02-19 02:20:40', 26, '2016-02-22 09:47:58', 'Available', '', '', 0.00, 0),
(2, 'salwar', '', 'Jet from day to night with ease wearing dress. Tailored in regular fit, this dress will keep you comfortable all day long. Team it with matching pumps to step out in style.', '', 'Active', '', 'salwar-salwars', 0.00, 0.00, 0.00, 2700.00, 0, '', 26, '2016-02-22 08:00:28', 26, '2016-02-22 09:49:34', 'Available', '', '', 0.00, 0),
(3, 'Western Dress', '', 'Jet from day to night with ease wearing dress. Tailored in regular fit, this dress will keep you comfortable all day long. Team it with matching pumps to step out in style.', '', 'Active', '', 'western-dress-western-dresses-2', 0.00, 0.00, 0.00, 0.00, 0, '', 26, '2016-02-22 08:03:52', 26, '2016-02-22 09:50:01', 'Available', '', '', 0.00, 0),
(4, 'Pink Salwar', '', 'With the start of the wedding season you will definitely need something stylish like this pink salwar set . This set consists of a stylish solid pink coloured choli, a lehenga featuring beautiful motifs and a simple dupatta.', '', 'Active', '', 'pink-salwar-salwars', 0.00, 0.00, 0.00, 2500.00, 0, '', 26, '2016-02-22 08:06:12', 26, '2016-02-22 09:50:48', 'Available', '', '', 0.00, 0),
(5, 'Designer Lahangas', '', 'With the start of the wedding season you will definitely need something stylish coloured lehenga set from Sangria. This set consists of a stylish solid pink coloured choli, a lehenga featuring beautiful motifs and a simple dupatta.', '', 'Active', '', 'designer-lahangas-lehangas', 0.00, 0.00, 0.00, 3000.00, 0, '', 26, '2016-02-22 08:10:45', 26, '2016-02-22 09:47:27', 'Available', 'show in home', '', 0.00, 0),
(6, 'Western Dress', '', 'Jet from day to night with ease wearing dress by  Tailored in regular fit, this dress will keep you comfortable all day long. Team it with matching pumps to step out in style.', '', 'Active', '', 'western-dress-western-dresses', 0.00, 0.00, 0.00, 3500.00, 0, '', 26, '2016-02-22 08:19:13', 26, '2016-02-22 09:47:21', 'Available', 'show in home', '', 0.00, 0),
(7, 'Red Western Dress', '', 'Jet from day to night with ease wearing dress. Tailored in regular fit, this dress will keep you comfortable all day long. Team it with matching pumps to step out in style.', '', 'Active', '', 'red-western-dress-western-dresses', 0.00, 0.00, 0.00, 2800.00, 0, '', 26, '2016-02-22 08:21:52', 26, '2016-02-22 09:46:54', 'Available', 'show in home', '', 0.00, 0),
(8, 'Black Lehangas', '', 'With the start of the wedding season you will definitely need something stylish like this black coloured lehenga set from Sangria. This set consists of a stylish solid pink coloured choli, a lehenga featuring beautiful motifs and a simple dupatta.', '', 'Active', '', 'black-lehangas-wedding-lehangas', 0.00, 0.00, 0.00, 2400.00, 0, '', 26, '2016-02-22 08:23:54', 26, '2016-02-22 09:45:34', 'Available', 'show in home', '', 0.00, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `productcategory`
--

INSERT INTO `productcategory` (`productcategoryId`, `title`, `parentId`, `description`, `productType`, `img`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`, `parentIds`, `featureIds`) VALUES
(1, 'Accessories', 0, '', '', '', 26, '2016-02-19 01:16:49', 26, '2016-02-19 01:16:49', '', ''),
(2, 'Western Dresses', 1, '', '', '', 26, '2016-02-19 01:17:32', 26, '2016-02-19 01:17:32', ',1,', ''),
(3, 'Wedding Lehangas', 1, '', '', '', 26, '2016-02-19 01:17:52', 26, '2016-02-19 01:17:52', ',1,', ''),
(4, 'Wedding Gown', 1, '', '', '', 26, '2016-02-19 01:18:04', 26, '2016-02-19 01:18:04', ',1,', ''),
(5, 'Trousers', 1, '', '', '', 26, '2016-02-19 01:18:19', 26, '2016-02-19 01:18:19', ',1,', ''),
(6, 'Skirts', 1, '', '', '', 26, '2016-02-19 01:27:42', 26, '2016-02-19 01:27:42', ',1,', ''),
(7, 'Sari', 1, '', '', '', 26, '2016-02-19 01:27:58', 26, '2016-02-19 01:27:58', ',1,', ''),
(8, 'Sarees', 1, '', '', '', 26, '2016-02-19 01:28:12', 26, '2016-02-19 01:28:12', ',1,', ''),
(9, 'Salwars', 1, '', '', '', 26, '2016-02-19 01:28:23', 26, '2016-02-19 01:28:23', ',1,', ''),
(10, 'Lehangas', 1, '', '', '', 26, '2016-02-19 01:28:43', 26, '2016-02-19 01:28:43', ',1,', ''),
(11, 'Kurtis', 1, '', '', '', 26, '2016-02-19 01:28:55', 26, '2016-02-19 01:28:55', ',1,', '');

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
(3, 8),
(2, 7),
(2, 6),
(10, 5),
(8, 1),
(9, 2),
(2, 3),
(9, 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `productfeature`
--

INSERT INTO `productfeature` (`productfeatureId`, `title`, `parentId`, `price`, `productType`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`, `viewInList`, `viewInDetails`, `viewInShop`) VALUES
(1, 'Categorise', 0, 0.00, '', 26, '2016-02-19 01:34:17', 26, '2016-02-19 01:34:17', '', '', ''),
(2, 'Wedding Lehangas', 1, 0.00, '', 26, '2016-02-19 01:34:34', 26, '2016-02-19 01:34:34', '', '', ''),
(3, 'Western Dresses', 1, 0.00, '', 26, '2016-02-19 01:34:49', 26, '2016-02-19 01:34:49', '', '', ''),
(4, 'Trousers', 1, 0.00, '', 26, '2016-02-19 02:16:19', 26, '2016-02-19 02:16:19', '', '', ''),
(5, 'Skirts', 1, 0.00, '', 26, '2016-02-19 02:16:39', 26, '2016-02-19 02:16:39', '', '', ''),
(6, 'Sari', 1, 0.00, '', 26, '2016-02-19 02:16:57', 26, '2016-02-19 02:16:57', '', '', ''),
(7, 'Sarees', 1, 0.00, '', 26, '2016-02-19 02:17:26', 26, '2016-02-19 02:17:26', '', '', ''),
(8, 'Salwars', 1, 0.00, '', 26, '2016-02-19 02:17:48', 26, '2016-02-19 02:17:48', '', '', ''),
(9, 'Lehangas', 1, 0.00, '', 26, '2016-02-19 02:18:12', 26, '2016-02-19 02:18:12', '', '', ''),
(10, 'Kurtis', 1, 0.00, '', 26, '2016-02-19 02:18:23', 26, '2016-02-19 02:18:23', '', '', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `productview`
--

INSERT INTO `productview` (`productviewId`, `productId`, `totalView`, `lastViewDate`) VALUES
(1, 1, 6, '2016-02-22 08:17:14');

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
(2, 'metaKey', 'rosette', 0),
(3, 'metaDescription', 'rosette', 0),
(4, 'siteTitle', 'Rosette', 0),
(5, 'pageCount', '35', 1),
(6, 'homePageId', '27', 1),
(7, 'Deactivate Site', '0', 1),
(8, 'Deactivate Message', 'Site Temporarily Under Construction . Please contact admin@webtrtackerts.co.in', 1),
(9, 'Validate Wtos', '1', 1),
(10, 'Validate WtosMessage', 'Please contact admin@webtrackers.co.in to enjoy uninterrupted service.', 1),
(11, 'Validate WtosDate', '==gMwEDOtATMtATO', 1),
(12, 'Deactivate Date', '2035-12-02', 1),
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
