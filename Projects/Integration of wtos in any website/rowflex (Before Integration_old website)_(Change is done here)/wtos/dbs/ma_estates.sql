-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 09, 2016 at 11:14 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ma_estates`
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
  `access` varchar(200) NOT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `name`, `adminType`, `username`, `password`, `address`, `email`, `mobileNo`, `addedDate`, `active`, `access`) VALUES
(31, 'admin', 'Super Admin', '123', '123', '', '', 0, '2016-01-22 01:27:27', 1, 'Agreements,Rents,Landlord Payments,Expense,Report,In out report,Rent Details,Website Pages');

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

CREATE TABLE IF NOT EXISTS `alerts` (
  `alertsId` int(10) NOT NULL AUTO_INCREMENT,
  `memberId` int(10) NOT NULL,
  `alertType` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `bookedDate` datetime NOT NULL,
  `bookedBy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `executeBy` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `executionDate` datetime NOT NULL,
  `duration` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `startTime` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `endTime` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `appoStatus` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `folloStatus` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `addedDate` datetime NOT NULL,
  `addedBy` int(10) NOT NULL,
  `modifyDate` datetime NOT NULL,
  `modifyBy` int(10) NOT NULL,
  `ampm` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`alertsId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
-- Table structure for table `appo`
--

CREATE TABLE IF NOT EXISTS `appo` (
  `appoId` int(10) NOT NULL AUTO_INCREMENT,
  `memberId` int(10) NOT NULL,
  `appoType` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `appoDate` datetime NOT NULL,
  `acompanyBy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `propertyId` int(10) NOT NULL,
  `duration` int(3) NOT NULL,
  `appoTime` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `endTime` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `appoStatus` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `appoNote` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `addedDate` datetime NOT NULL,
  `addedBy` int(10) NOT NULL,
  `modifyDate` datetime NOT NULL,
  `modifyBy` int(10) NOT NULL,
  `ampm` varchar(3) COLLATE utf8_unicode_ci NOT NULL COMMENT 'notusedinarronsoft',
  `appoMin` int(4) NOT NULL,
  `endMin` int(4) NOT NULL,
  PRIMARY KEY (`appoId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `appo`
--

INSERT INTO `appo` (`appoId`, `memberId`, `appoType`, `appoDate`, `acompanyBy`, `propertyId`, `duration`, `appoTime`, `endTime`, `appoStatus`, `appoNote`, `addedDate`, `addedBy`, `modifyDate`, `modifyBy`, `ampm`, `appoMin`, `endMin`) VALUES
(1, 5, 'Viewing', '2015-11-03 00:00:00', 'User1', 0, 0, '', '', '', '', '2015-11-03 05:37:11', 26, '0000-00-00 00:00:00', 0, '', 0, 0),
(3, 5, 'Viewing', '2015-11-05 00:00:00', 'User1', 0, 165, '09:15 AM', '12:00 PM', '', '', '2015-11-03 08:10:50', 26, '0000-00-00 00:00:00', 0, '', 555, 720),
(4, 5, 'Viewing', '2015-11-12 00:00:00', 'User1', 0, 15, '09:45 AM', '10:00 AM', '', '', '2015-11-03 08:11:03', 26, '0000-00-00 00:00:00', 0, '', 585, 600),
(5, 5, 'Viewing', '2015-12-10 00:00:00', 'User1', 0, 30, '10:00 AM', '10:30 AM', '', '', '2015-11-03 08:11:15', 26, '0000-00-00 00:00:00', 0, '', 600, 630),
(6, 5, 'Viewing', '2015-11-17 00:00:00', 'User1', 0, 0, '10:00 AM', '10:00 AM', '', '', '2015-11-03 08:11:41', 26, '0000-00-00 00:00:00', 0, '', 600, 600),
(7, 5, 'Viewing', '2015-11-17 00:00:00', 'User1', 0, 90, '09:45 AM', '11:15 AM', '', '', '2015-11-03 08:11:59', 26, '0000-00-00 00:00:00', 0, '', 585, 675);

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
(10, 'Contact from  Mizan', 'admin@webtrackers', '8017477871', 'test', '', '0000-00-00 00:00:00', 0, ''),
(11, 'asraful', 'as@g.com', '00000000', '000000', '', '2016-01-11 02:37:17', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE IF NOT EXISTS `expense` (
  `expenseId` int(10) NOT NULL AUTO_INCREMENT,
  `dated` datetime NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `amount` float(8,2) NOT NULL,
  `expenseTo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `paymentStatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `addedDate` datetime NOT NULL,
  `addedBy` int(10) NOT NULL,
  `modifyDate` datetime NOT NULL,
  `modifyBy` int(10) NOT NULL,
  PRIMARY KEY (`expenseId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `imageuploader`
--

INSERT INTO `imageuploader` (`imageId`, `title`, `image`, `addedDate`) VALUES
(13, 'cartoon', 'wtos-images/cov_bg.png', '0000-00-00 00:00:00'),
(14, 'home1propertymanage', 'wtos-images/imageThumb.jpg', '0000-00-00 00:00:00'),
(15, 'energy performance', 'wtos-images/eproficiency.jpg', '0000-00-00 00:00:00'),
(16, 'about us', 'wtos-images/CIN2TWoW8AAOQKX.jpg', '0000-00-00 00:00:00'),
(17, '', 'wtos-images/house_red_key.jpg', '0000-00-00 00:00:00'),
(18, 'sale', 'wtos-images/11.jpg', '0000-00-00 00:00:00'),
(20, 'About Us', 'wtos-images/selfieaaronholmesfinal.jpg', '0000-00-00 00:00:00'),
(21, '', 'wtos-images/Aaron+Holmes+A5+Flyer+Jan+2015+final+to+PRINT.unlocked-page-001.jpg', '0000-00-00 00:00:00'),
(22, 'landlord', 'wtos-images/landlord1.png', '0000-00-00 00:00:00'),
(23, 'shop', 'wtos-images/IMG_1654.JPG', '0000-00-00 00:00:00'),
(24, 'shop1', 'wtos-images/IMG_1654.JPG', '0000-00-00 00:00:00'),
(25, 'selfie', 'wtos-images/selfieaaronholmesfinal.jpg', '0000-00-00 00:00:00'),
(28, 'homeimg', 'wtos-images/rors.jpg', '0000-00-00 00:00:00'),
(29, 'Property Management', 'wtos-images/property_mgmt.jpg', '0000-00-00 00:00:00'),
(30, 'Land lord', 'wtos-images/Landlords_.jpg', '0000-00-00 00:00:00'),
(31, 'tenants', 'wtos-images/tenant-.jpg', '0000-00-00 00:00:00'),
(32, 'contact', 'wtos-images/contact.png', '0000-00-00 00:00:00'),
(33, '', 'wtos-images/contactheven.png', '0000-00-00 00:00:00'),
(34, '', 'wtos-images/img_banner_contact.jpg', '0000-00-00 00:00:00'),
(35, 'tenants', 'wtos-images/tenant.jpg', '0000-00-00 00:00:00'),
(36, '', 'wtos-images/contact_header.jpg', '0000-00-00 00:00:00'),
(37, 'homeSalesValuation', 'wtos-images/search-anywhere.jpg', '0000-00-00 00:00:00'),
(38, '', 'wtos-images/buy-or-rent.jpg', '0000-00-00 00:00:00'),
(39, '', 'wtos-images/page1_icon1.png', '0000-00-00 00:00:00'),
(40, '', 'wtos-images/page1_icon2.png', '0000-00-00 00:00:00'),
(41, '', 'wtos-images/page1_icon1.png', '0000-00-00 00:00:00'),
(42, '', 'wtos-images/page1_icon2.png', '0000-00-00 00:00:00'),
(43, '', 'wtos-images/page1_icon3.png', '0000-00-00 00:00:00'),
(44, '', 'wtos-images/page1_icon3.png', '0000-00-00 00:00:00'),
(45, '', 'wtos-images/page1_icon1.png', '0000-00-00 00:00:00'),
(46, '', 'wtos-images/page1_icon1.png', '0000-00-00 00:00:00'),
(47, '', 'wtos-images/s1.png', '0000-00-00 00:00:00'),
(48, '', 'wtos-images/s2.png', '0000-00-00 00:00:00'),
(49, '', 'wtos-images/s3.png', '0000-00-00 00:00:00'),
(50, '', 'wtos-images/ienei5.png', '0000-00-00 00:00:00'),
(51, '', 'wtos-images/ienei6.png', '0000-00-00 00:00:00'),
(52, '', 'wtos-images/ienei3.png', '0000-00-00 00:00:00'),
(53, '', 'wtos-images/icon1.png', '0000-00-00 00:00:00'),
(54, 'sales2', 'wtos-images/icon2.png', '0000-00-00 00:00:00'),
(55, 'sales3', 'wtos-images/icon3.png', '0000-00-00 00:00:00'),
(56, '', 'wtos-images/facebook.png', '0000-00-00 00:00:00'),
(57, '', 'wtos-images/google.png', '0000-00-00 00:00:00'),
(58, '', 'wtos-images/twitter.png', '0000-00-00 00:00:00'),
(59, 'letting', 'wtos-images/TEN-ICON.png', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `landlordbill`
--

CREATE TABLE IF NOT EXISTS `landlordbill` (
  `landlordbillId` int(10) NOT NULL AUTO_INCREMENT,
  `dated` datetime NOT NULL,
  `rentbillId` int(10) NOT NULL,
  `rentAmountLandlord` float(8,2) NOT NULL,
  `commission` float(8,2) NOT NULL,
  `landlordOtherBills` text COLLATE utf8_unicode_ci NOT NULL,
  `paybleAmount` float(8,2) NOT NULL,
  `paidAmount` float(8,2) NOT NULL,
  `paymentStatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `addedDate` datetime NOT NULL,
  `addedBy` int(10) NOT NULL,
  `modifyDate` datetime NOT NULL,
  `modifyBy` int(10) NOT NULL,
  `agreementReffId` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rentMonth` int(2) NOT NULL,
  `rentYear` int(4) NOT NULL,
  PRIMARY KEY (`landlordbillId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=37 ;

--
-- Dumping data for table `landlordbill`
--

INSERT INTO `landlordbill` (`landlordbillId`, `dated`, `rentbillId`, `rentAmountLandlord`, `commission`, `landlordOtherBills`, `paybleAmount`, `paidAmount`, `paymentStatus`, `note`, `addedDate`, `addedBy`, `modifyDate`, `modifyBy`, `agreementReffId`, `rentMonth`, `rentYear`) VALUES
(25, '2016-01-22 00:00:00', 25, 500.00, 100.00, '', 400.00, 0.00, 'Pending', '', '2016-01-22 02:36:11', 31, '2016-01-22 02:36:11', 31, 'A3T1P17L2', 1, 2016),
(26, '2016-02-22 00:00:00', 26, 500.00, 100.00, '', 400.00, 0.00, 'Pending', '', '2016-01-22 02:36:11', 31, '2016-01-22 02:36:11', 31, 'A3T1P17L2', 2, 2016),
(27, '2016-03-22 00:00:00', 27, 500.00, 100.00, '', 400.00, 0.00, 'Pending', '', '2016-01-22 02:36:11', 31, '2016-01-22 02:36:11', 31, 'A3T1P17L2', 3, 2016),
(28, '2016-04-22 00:00:00', 28, 500.00, 100.00, '', 400.00, 0.00, 'Pending', '', '2016-01-22 02:36:11', 31, '2016-01-22 02:36:11', 31, 'A3T1P17L2', 4, 2016),
(29, '2016-05-22 00:00:00', 29, 500.00, 100.00, '', 400.00, 0.00, 'Pending', '', '2016-01-22 02:36:12', 31, '2016-01-22 02:36:12', 31, 'A3T1P17L2', 5, 2016),
(30, '2016-06-22 00:00:00', 30, 500.00, 100.00, '', 400.00, 0.00, 'Pending', '', '2016-01-22 02:36:12', 31, '2016-01-22 02:36:12', 31, 'A3T1P17L2', 6, 2016),
(31, '2016-07-22 00:00:00', 31, 500.00, 100.00, '', 400.00, 0.00, 'Pending', '', '2016-01-22 02:36:12', 31, '2016-01-22 02:36:12', 31, 'A3T1P17L2', 7, 2016),
(32, '2016-08-22 00:00:00', 32, 500.00, 100.00, '', 400.00, 0.00, 'Pending', '', '2016-01-22 02:36:12', 31, '2016-01-22 02:36:12', 31, 'A3T1P17L2', 8, 2016),
(33, '2016-09-22 00:00:00', 33, 500.00, 100.00, '', 400.00, 0.00, 'Pending', '', '2016-01-22 02:36:12', 31, '2016-01-22 02:36:12', 31, 'A3T1P17L2', 9, 2016),
(34, '2016-10-22 00:00:00', 34, 500.00, 100.00, '', 400.00, 0.00, 'Pending', '', '2016-01-22 02:36:12', 31, '2016-01-22 02:36:12', 31, 'A3T1P17L2', 10, 2016),
(35, '2016-11-22 00:00:00', 35, 500.00, 100.00, '', 400.00, 0.00, 'Pending', '', '2016-01-22 02:36:12', 31, '2016-01-22 02:36:12', 31, 'A3T1P17L2', 11, 2016),
(36, '2016-12-22 00:00:00', 36, 500.00, 100.00, '', 400.00, 0.00, 'Pending', '', '2016-01-22 02:36:12', 31, '2016-01-22 02:36:12', 31, 'A3T1P17L2', 12, 2016);

-- --------------------------------------------------------

--
-- Table structure for table `landlordbillotherfees`
--

CREATE TABLE IF NOT EXISTS `landlordbillotherfees` (
  `landlordbillotherfeesId` int(10) NOT NULL AUTO_INCREMENT,
  `landlordbillId` int(10) NOT NULL,
  `sign` varchar(1) NOT NULL,
  `title` varchar(100) NOT NULL,
  `amount` float(7,2) NOT NULL,
  `addedBy` int(10) NOT NULL,
  `addedDate` datetime NOT NULL,
  `modifyDate` datetime NOT NULL,
  `modifyBy` int(10) NOT NULL,
  PRIMARY KEY (`landlordbillotherfeesId`)
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lang`
--

INSERT INTO `lang` (`langId`, `title`, `code`, `defaultLang`, `addedBy`, `addedDate`, `active`) VALUES
(1, 'English', 'en', 1, 26, '2013-02-26 09:19:22', 0),
(2, 'Bengali', 'ben', 0, 26, '2013-02-26 09:55:16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `locationId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `orders` varchar(255) NOT NULL DEFAULT '0',
  `addedBy` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  `modifyBy` int(11) NOT NULL,
  `modifyDate` datetime NOT NULL,
  PRIMARY KEY (`locationId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=452 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`locationId`, `name`, `orders`, `addedBy`, `addedDate`, `modifyBy`, `modifyDate`) VALUES
(4, 'Mitcham', '0', 26, '2014-04-07 05:01:56', 26, '2015-12-07 06:08:01'),
(5, 'Romford', '0', 26, '2014-04-07 05:02:11', 26, '2015-12-07 06:08:42'),
(6, 'Harrow', '0', 26, '2014-04-07 05:02:21', 26, '2015-12-14 10:50:24'),
(7, 'Cambridge', '0', 26, '2014-04-07 05:02:34', 26, '2015-12-07 06:10:02'),
(8, 'London', '1', 26, '2014-04-07 05:02:50', 26, '2015-12-07 06:10:19'),
(9, 'Luton', '0', 26, '2014-04-07 05:03:09', 26, '2015-12-07 06:10:39'),
(10, 'Dartford', '0', 26, '2014-04-07 05:03:21', 26, '2015-12-07 06:08:23'),
(11, 'Leeds', '0', 26, '2015-12-09 02:35:37', 26, '2015-12-09 02:35:37'),
(12, 'Birmingham', '0', 26, '2015-12-14 10:44:58', 26, '2015-12-14 10:44:58'),
(13, 'Manchester', '0', 26, '2015-12-14 10:45:21', 26, '2015-12-14 10:45:21'),
(14, 'Bromley', '0', 26, '2015-12-14 10:51:31', 26, '2015-12-14 10:51:31'),
(15, 'Barking', '0', 26, '2015-12-14 10:51:52', 26, '2015-12-14 10:51:52'),
(16, 'Camden', '0', 26, '2015-12-14 10:52:09', 26, '2015-12-14 10:52:09'),
(17, 'Croydon', '0', 26, '2015-12-14 10:52:31', 26, '2015-12-14 10:52:31'),
(18, 'Ealing', '0', 26, '2015-12-14 10:53:18', 26, '2015-12-14 10:53:18'),
(20, 'Greenwich', '0', 26, '2015-12-14 10:53:52', 26, '2015-12-14 10:53:52'),
(21, 'Hackney', '0', 26, '2015-12-14 10:54:09', 26, '2015-12-14 10:54:09'),
(22, 'Hounslow', '0', 26, '2015-12-14 10:54:32', 26, '2015-12-14 10:54:32'),
(23, 'Newham', '0', 26, '2015-12-14 10:54:55', 26, '2015-12-14 10:54:55'),
(24, 'Redbridge', '0', 26, '2015-12-14 10:55:11', 26, '2015-12-14 10:55:11'),
(25, 'Westminster', '0', 26, '2015-12-14 11:22:56', 26, '2015-12-14 11:22:56'),
(27, 'Wandsworth', '0', 26, '2015-12-14 11:23:34', 26, '2015-12-14 11:23:34'),
(28, 'Tower Hamlets', '0', 26, '2015-12-14 11:24:09', 26, '2015-12-14 11:24:09'),
(29, 'Lambeth', '0', 26, '2015-12-14 11:24:29', 26, '2015-12-14 11:24:29'),
(30, 'Lewisham', '0', 26, '2015-12-14 11:24:51', 26, '2015-12-14 11:24:51'),
(32, 'Aberdeen ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(33, 'Aberdeenshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(34, 'Adur ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(35, 'Allerdale ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(36, 'Amber Valley ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(37, 'Anglesey ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(38, 'Angus ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(39, 'Antrim ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(40, 'Archiestown ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(41, 'Ards ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(42, 'Argyll and Bute ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(43, 'Argyllshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(44, 'Armagh ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(45, 'Arun ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(46, 'Ashfield ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(47, 'Ashford ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(48, 'Aylesbury Vale ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(49, 'Ayrshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(50, 'Babergh ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(51, 'Ballymena ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(52, 'Ballymoney ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(53, 'Banbridge ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(54, 'Barking and Dagenham ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(55, 'Barnet ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(56, 'Barnsley ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(57, 'Barrow-in-Furness ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(58, 'Basildon ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(59, 'Bassetlaw ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(60, 'Bath and North East Somerset ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(61, 'Bedford ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(62, 'Belfast ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(63, 'Berkshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(64, 'Bexley ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(65, 'Bingley ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(66, 'Birmingham ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(67, 'Birmingham ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(68, 'Blackburn ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(69, 'Blackburn with Darwen ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(70, 'Blackpool ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(71, 'Blaenau Gwent ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(72, 'Bolsover ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(73, 'Bolton ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(74, 'Boston ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(75, 'Bournemouth ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(76, 'Bournemouth ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(77, 'Bracknell Forest ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(78, 'Bradford ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(80, 'Braintree ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(81, 'Breckland ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(82, 'Brent ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(83, 'Brentwood ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(84, 'Bridgend ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(85, 'Brighton ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(86, 'Brighton and Hove ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(87, 'Bristol ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(88, 'Broadstairs ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(89, 'Bromley ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(90, 'Bromsgrove ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(91, 'Bromsgrove Worcestershire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(92, 'Broxbourne ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(93, 'Broxtowe ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(94, 'Burnley ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(95, 'Bury ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(96, 'Buteshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(97, 'Caerphilly ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(98, 'Calderdale ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(99, 'Camden ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(100, 'Cannock Chase ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(101, 'Canterbury ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(102, 'Cardiff ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(103, 'Carlisle ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(104, 'Carmarthenshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(105, 'Carrickfergus ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(106, 'Castle Point ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(107, 'Central Bedfordshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(108, 'Ceredigion ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(109, 'Charnwood ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(110, 'Chelmsford ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(111, 'Cherwell ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(112, 'Cheshire East ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(113, 'Cheshire West and Chester ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(114, 'Chester ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(115, 'Chesterfield ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(116, 'Chichester ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(117, 'Chiltern ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(118, 'Chorley ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(119, 'Christchurch ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(120, 'City of London ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(121, 'Colchester ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(122, 'Coleraine ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(123, 'Conwy ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(124, 'Cookstown ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(125, 'Copeland ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(126, 'Corby ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(127, 'Cornwall ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(128, 'Cotswold ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(129, 'County Antrim ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(130, 'County Durham ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(131, 'Coventry ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(132, 'Craigavon ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(133, 'Craven ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(134, 'Crawley ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(135, 'Croydon ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(136, 'Dacorum ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(137, 'Darlington ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(138, 'Daventry ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(139, 'Denbighshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(140, 'Derby ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(141, 'Derbyshire Dales ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(142, 'Derry ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(143, 'Doncaster ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(144, 'Down ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(145, 'Dudley ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(146, 'Dumfriesshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(147, 'Dundee ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(148, 'Dungannon and South Tyrone ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(149, 'Ealing ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(150, 'East Ayrshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(151, 'East Devon ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(152, 'East Dorset ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(153, 'East Dunbartonshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(154, 'East Hampshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(155, 'East Hertfordshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(156, 'East Lindsey ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(157, 'East Lothian ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(158, 'East Northamptonshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(159, 'East Renfrewshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(160, 'East Riding of Yorkshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(161, 'East Staffordshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(162, 'Eastbourne ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(163, 'Eastleigh ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(164, 'Eden ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(165, 'Edinburgh ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(166, 'Elmbridge ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(167, 'Ely ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(168, 'Enfield ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(169, 'Epping Forest ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(170, 'Epsom and Ewell ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(171, 'Erewash ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(172, 'Exeter ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(173, 'Falkirk ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(174, 'Fenland ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(175, 'Fermanagh ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(176, 'Fife ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(177, 'Flintshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(178, 'Folkestone ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(179, 'Forest Heath ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(180, 'Fylde ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(181, 'Gateshead ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(182, 'Gedling ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(183, 'Glasgow ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(184, 'Gloucester ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(185, 'Gravesham ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(186, 'Greenwich ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(187, 'Guernsey ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(188, 'Guildford ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(189, 'Gwynedd ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(190, 'Hackney ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(191, 'Halton ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(192, 'Hambleton ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(193, 'Hammersmith and Fulham ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(194, 'Hampshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(195, 'Harborough ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(196, 'Haringey ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(197, 'Harrogate ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(198, 'Harrow ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(199, 'Hart ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(200, 'Hartlepool ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(201, 'Hastings ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(202, 'Havering ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(203, 'Hereford ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(204, 'Hertfordshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(205, 'Hertsmere ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(206, 'High Peak ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(207, 'Highland ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(208, 'Hillingdon ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(209, 'Hinckley and Bosworth ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(210, 'Horsham ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(211, 'Hounslow ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(212, 'Hull ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(213, 'Huntingdonshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(214, 'Hyndburn ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(215, 'Inverness ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(216, 'Ipswich ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(217, 'Isle of Man ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(218, 'Isle of Wight ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(219, 'Isles of Scilly ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(220, 'Islington ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(221, 'Jersey ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(222, 'Kennet ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(223, 'Kensington and Chelsea ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(224, 'Kent ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(225, 'Kettering ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(226, 'Kingston upon Hull ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(227, 'Kingston upon Thames ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(228, 'Kinross-Shire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(229, 'Kirkcudbrightshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(230, 'Kirklees ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(231, 'Knowsley ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(232, 'Lambeth ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(233, 'Lanarkshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(234, 'Lancaster ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(235, 'Larne ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(236, 'Leeds ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(237, 'Leicester ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(238, 'Leighton Buzzard ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(239, 'Lewes ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(240, 'Lewisham ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(241, 'Lichfield ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(242, 'Limavady ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(243, 'Lincoln ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(244, 'Lisburn ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(245, 'Liverpool ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(246, 'Llandrindod Wells ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(247, 'Magherafelt ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(248, 'Maidenhead ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(249, 'Maidstone ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(250, 'Maldon ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(251, 'Malvern Hills ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(252, 'Manchester ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(253, 'Mansfield ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(254, 'Medway ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(255, 'Melton ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(256, 'Mendip ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(257, 'Merthyr Tydfil ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(258, 'Merton ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(259, 'Mid Devon ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(260, 'Mid Suffolk ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(261, 'Mid Sussex ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(262, 'Middlesborough ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(263, 'Middlesbrough ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(264, 'Midlothian ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(265, 'Milton Keynes ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(266, 'Mole Valley ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(267, 'Monmouthshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(268, 'Moray ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(269, 'Moyle ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(270, 'Neath Port Talbot ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(271, 'New Forest ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(272, 'Newark and Sherwood ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(273, 'Newcastle ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(274, 'Newcastle upon Tyne ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(275, 'Newcastle-under-Lyme ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(276, 'Newham ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(277, 'Newmarket ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(278, 'Newport ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(279, 'Newry and Mourne ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(280, 'Newtownabbey ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(281, 'Norfolk ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(282, 'North Ayrshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(283, 'North Dorset ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(284, 'North Down ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(285, 'North East Derbyshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(286, 'North East Lincolnshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(287, 'North Hertfordshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(288, 'North Kesteven ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(289, 'North Lanarkshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(290, 'North Lincolnshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(291, 'North Somerset ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(292, 'North Tyneside ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(293, 'North Warwickshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(294, 'North West Leicestershire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(295, 'North Yorkshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(296, 'Northampton ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(297, 'Northumberland ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(298, 'Norwich ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(299, 'Nottingham ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(300, 'Nuneaton & Bedworth ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(301, 'Oldham ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(302, 'Omagh ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(303, 'Orkney Islands ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(304, 'Oxford ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(305, 'Pembrokeshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(306, 'Pendle ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(307, 'Perth and Kinross ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(308, 'Peterborough ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(309, 'Plymouth ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(310, 'Poole ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(311, 'Powys ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(312, 'Preston ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(313, 'Purbeck ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(314, 'Ramsgate ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(315, 'Redbridge ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(316, 'Redcar & Cleveland ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(317, 'Redditch ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(318, 'Region ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(319, 'Reigate and Banstead ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(320, 'Renfrewshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(321, 'Rhondda Cynon Taf ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(322, 'Ribble Valley ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(323, 'Richmond upon Thames ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(324, 'Ripon ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(325, 'Rochdale ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(326, 'Rochford ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(327, 'Rossendale ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(328, 'Rother ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(329, 'Rotherham ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(330, 'Rothes ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(331, 'Rugby ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(332, 'Runnymede ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(333, 'Rushcliffe ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(334, 'Rushmoor ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(335, 'Rutland ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(336, 'Salford ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(337, 'Sandwell ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(338, 'Scottish Borders ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(339, 'Sedgemoor ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(340, 'Sefton ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(341, 'Selby ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(342, 'Sevenoaks ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(343, 'Sheffield ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(344, 'Shepway ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(345, 'Shetland', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(346, 'Shrewsbury ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(347, 'Shropshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(348, 'Slough ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(349, 'Solihull ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(350, 'Somerset ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(351, 'South Ayrshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(352, 'South Buckinghamshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(353, 'South Derbyshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(354, 'South Gloucestershire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(355, 'South Hams ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(356, 'South Holland ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(357, 'South Kesteven ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(358, 'South Lakeland ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(359, 'South Lanarkshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(360, 'South Norfolk ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(361, 'South Northamptonshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(362, 'South Oxfordshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(363, 'South Ribble ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(364, 'South Somerset ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(365, 'South Staffordshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(366, 'South Tyneside ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(367, 'Southampton ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(368, 'Southend-on-Sea ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(369, 'Southwark ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(370, 'Spelthorne ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(371, 'St Albans ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(372, 'St Edmundsbury ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(373, 'St. Helens ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(374, 'Staffordshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(375, 'Stevenage ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(376, 'Stirling ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(377, 'Stockport ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(378, 'Stockton-on-Tees ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(379, 'Strabane ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(380, 'Stratford-on-Avon ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(381, 'Stroud ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(382, 'Suffolk ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(383, 'Suffolk Coastal ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(384, 'Sunderland ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(385, 'Surrey Heath ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(386, 'Sussex ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(387, 'Sutton ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(388, 'Swale ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(389, 'Swansea ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(390, 'Swindon ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(391, 'Tameside ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(392, 'Tamworth ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(393, 'Tandridge ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(394, 'Teignbridge ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(395, 'Telford and Wrekin ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(396, 'Tendring ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(397, 'Test Valley ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(398, 'Tewkesbury ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(399, 'Three Rivers ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(400, 'Thurrock ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(401, 'Tonbridge and Malling ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(402, 'Torbay ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(403, 'Torfaen ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(404, 'Torridge ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(405, 'Tower Hamlets ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(406, 'Trafford ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(407, 'Tunbridge Wells ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(408, 'Uttlesford ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(409, 'Vale of Glamorgan ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(410, 'Vale of White Horse ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(411, 'Wakefield ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(412, 'Walsall ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(413, 'Waltham Forest ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(414, 'Wandsworth ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(415, 'Warrington ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(416, 'Warwick ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(417, 'Watford ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(418, 'Waveney ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(419, 'Waverley ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(420, 'Wealden ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(421, 'Wellingborough ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(422, 'Welwyn Hatfield ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(423, 'West Berkshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(424, 'West Devon ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(425, 'West Dorset ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(426, 'West Dunbartonshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(427, 'West Lancashire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(428, 'West Lindsey ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(429, 'West London ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(430, 'West Lothian ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(431, 'West Norfolk ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(432, 'West Oxfordshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(433, 'Westminster ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(434, 'Weymouth and Portland ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(435, 'Wigan ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(436, 'Wigtownshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(437, 'Wiltshire ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(438, 'Winchester ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(439, 'Windsor and Maidenhead ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(440, 'Wirral ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(441, 'Woking ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(442, 'Wokingham ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(443, 'Wolverhampton ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(444, 'Worcester ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(445, 'Worthing ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(446, 'Wrexham ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(447, 'Wychavon ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(448, 'Wycombe ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(449, 'Wyre ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(450, 'Wyre Forest ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(451, 'York ', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `memberId` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `memberType` varchar(50) NOT NULL COMMENT 'Indivisual,Company',
  `purpose` varchar(100) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `flatOrHouseName` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `postCode` varchar(10) NOT NULL,
  `source` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `note` varchar(200) NOT NULL,
  `addedDate` datetime NOT NULL,
  `modifyDate` datetime NOT NULL,
  `addedBy` int(10) NOT NULL,
  `modifyBy` int(10) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `registerDate` datetime NOT NULL,
  `title` varchar(10) NOT NULL COMMENT 'Mr,Mrs',
  `minBudget` int(10) NOT NULL,
  `maxBudget` int(10) NOT NULL,
  `nextCall` datetime NOT NULL,
  `nextCallShow` tinyint(1) NOT NULL DEFAULT '1',
  `requirements` varchar(200) NOT NULL,
  `activeMember` tinyint(1) NOT NULL,
  `willRetain` tinyint(1) NOT NULL,
  `requirementNotes` text NOT NULL,
  `contactNotes` text NOT NULL,
  `type` varchar(10) NOT NULL COMMENT 'let,sale',
  `leasehold` varchar(20) NOT NULL,
  `leaseyears` varchar(4) NOT NULL,
  `bed` tinyint(2) NOT NULL,
  `bath` tinyint(2) NOT NULL,
  `sofa` tinyint(2) NOT NULL,
  `corrAddress` varchar(255) NOT NULL,
  `otherContact` varchar(200) NOT NULL,
  `townCity` varchar(25) NOT NULL,
  `feedBackValue` int(10) NOT NULL,
  `outcome` varchar(15) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `reference` varchar(50) NOT NULL,
  `propertyReqDate` date NOT NULL,
  `adult` varchar(10) NOT NULL,
  `child` varchar(10) NOT NULL,
  `pets` varchar(3) NOT NULL,
  `bankName` varchar(50) NOT NULL,
  `bankAcNo` varchar(50) NOT NULL,
  `bankDetails` varchar(100) NOT NULL,
  `workingStatus` varchar(7) NOT NULL,
  `sortcode` varchar(100) NOT NULL,
  PRIMARY KEY (`memberId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memberId`, `code`, `firstName`, `lastName`, `memberType`, `purpose`, `telephone`, `mobile`, `email`, `flatOrHouseName`, `address`, `postCode`, `source`, `status`, `note`, `addedDate`, `modifyDate`, `addedBy`, `modifyBy`, `branch`, `registerDate`, `title`, `minBudget`, `maxBudget`, `nextCall`, `nextCallShow`, `requirements`, `activeMember`, `willRetain`, `requirementNotes`, `contactNotes`, `type`, `leasehold`, `leaseyears`, `bed`, `bath`, `sofa`, `corrAddress`, `otherContact`, `townCity`, `feedBackValue`, `outcome`, `occupation`, `reference`, `propertyReqDate`, `adult`, `child`, `pets`, `bankName`, `bankAcNo`, `bankDetails`, `workingStatus`, `sortcode`) VALUES
(1, 'AA1', 'Arupam', 'Purkait', 'Existing Tenant', '', '', '2222222222', 'ar@gmail.com', '3', '3ew', 'seb r96', 'Website ', 'TENANT', '', '2016-01-22 02:33:38', '0000-00-00 00:00:00', 31, 0, '', '2016-01-22 02:33:38', 'Mr', 500, 800, '2016-01-29 00:00:00', 1, 'Single Room,   1 Beds , 1 Bath , 1 Reception ,', 1, 0, '', '', 'Rent', '', '', 1, 1, 1, '', '', 'londan', 0, '', 'student', '', '2016-01-22', '2', '0', 'Yes', '', '', '', 'DSS', ''),
(2, 'VV2', 'Roy', 'Santanu', '', '', '', '9999999999', '', '', '', '', 'Property', 'LANDLORD', '', '2016-01-22 02:35:07', '0000-00-00 00:00:00', 31, 0, '', '2016-01-22 02:35:07', 'Mr', 0, 0, '2016-01-29 00:00:00', 1, '', 0, 0, '', '', 'Rent', '', '', 1, 1, 1, '', '', '', 0, '', '', '', '1970-01-01', '', '', '', '', '', '', '', '222');

-- --------------------------------------------------------

--
-- Table structure for table `memberdoc`
--

CREATE TABLE IF NOT EXISTS `memberdoc` (
  `memberdocId` int(10) NOT NULL AUTO_INCREMENT,
  `docTitle` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `dated` datetime NOT NULL,
  `docFile` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `addedDate` datetime NOT NULL,
  `addedBy` int(10) NOT NULL,
  `modifyDate` datetime NOT NULL,
  `modifyBy` int(10) NOT NULL,
  `memberId` int(10) NOT NULL,
  PRIMARY KEY (`memberdocId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `memberquery`
--

CREATE TABLE IF NOT EXISTS `memberquery` (
  `memberqueryId` int(10) NOT NULL AUTO_INCREMENT,
  `memberId` int(10) NOT NULL,
  `qDate` datetime NOT NULL,
  `minBudget` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `maxBudget` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `preferedLoc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `propType` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `addedDate` datetime NOT NULL,
  `addedBy` int(10) NOT NULL,
  `modifyDate` datetime NOT NULL,
  `modifyBy` int(10) NOT NULL,
  PRIMARY KEY (`memberqueryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `misc`
--

CREATE TABLE IF NOT EXISTS `misc` (
  `miscId` int(10) NOT NULL AUTO_INCREMENT,
  `adminId` int(10) NOT NULL,
  `newsId` int(10) NOT NULL,
  `pages` datetime NOT NULL,
  `addedDate` datetime NOT NULL,
  `addedBy` int(10) NOT NULL,
  `modifyDate` datetime NOT NULL,
  `modifyBy` int(10) NOT NULL,
  `active` tinyint(2) NOT NULL,
  PRIMARY KEY (`miscId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `misc`
--

INSERT INTO `misc` (`miscId`, `adminId`, `newsId`, `pages`, `addedDate`, `addedBy`, `modifyDate`, `modifyBy`, `active`) VALUES
(2, 26, 0, '2013-12-05 00:00:00', '2013-06-02 11:10:48', 26, '2013-06-05 12:37:54', 26, 0),
(3, 27, 0, '0000-00-00 00:00:00', '2013-06-03 01:20:46', 26, '2013-06-05 08:56:48', 26, 0),
(4, 0, 0, '0000-00-00 00:00:00', '2013-06-05 08:46:48', 26, '2013-06-05 08:46:48', 26, 0),
(5, 26, 0, '2013-06-05 00:00:00', '2013-06-05 12:38:05', 26, '2013-06-05 12:38:05', 26, 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `newsId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `active` varchar(20) NOT NULL DEFAULT '1',
  `addedBy` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  `newsdate` varchar(50) NOT NULL,
  `pagecontentId` int(10) NOT NULL,
  PRIMARY KEY (`newsId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`newsId`, `title`, `body`, `active`, `addedBy`, `addedDate`, `newsdate`, `pagecontentId`) VALUES
(7, 'new i frame link', 'i love you', '1', 0, '0000-00-00 00:00:00', '23 January 2013', 0),
(8, 'i am so exited', 'ddw', '1', 0, '0000-00-00 00:00:00', '23 January 2013', 0),
(9, 'hi this is mizanur', 'erere yrtyryry rtry', '1', 26, '2013-07-04 12:33:12', 'test2', 0),
(16, 'zswf', 'sdfsfds', '1', 0, '0000-00-00 00:00:00', 'sdfsdfsd', 0),
(17, '', '', '1', 0, '0000-00-00 00:00:00', '', 0),
(18, 'w', 'w', '1', 0, '0000-00-00 00:00:00', '25-11-2014', 0),
(19, 'w', 'w', '1', 0, '0000-00-00 00:00:00', '25-11-2014', 0),
(28, '2', '2', '2', 26, '2015-03-19 06:58:57', '19-03-2015', 56),
(29, '', '', '', 26, '2015-03-19 09:44:10', '', 0),
(30, '444', '', '', 26, '2015-03-19 09:44:15', '', 0),
(32, '3', '4', 'one', 26, '2015-03-19 09:46:41', '12-03-2015', 58),
(33, '5', '5', 'two', 26, '2015-03-19 09:46:53', '19-03-2015', 59),
(47, 'hi this is mizanur', 'hi this is mizanur', 'one', 26, '2015-03-21 05:45:52', '11-03-2015', 1),
(48, 'Matrix', 'one', 'ABOUT US', 26, '2015-03-21 06:17:33', '13-03-2015', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsimg`
--

CREATE TABLE IF NOT EXISTS `newsimg` (
  `newsImgId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `addedBy` int(10) NOT NULL,
  `addedDate` datetime NOT NULL,
  `active` int(1) NOT NULL,
  `newsId` int(11) NOT NULL,
  PRIMARY KEY (`newsImgId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `newsimg`
--

INSERT INTO `newsimg` (`newsImgId`, `title`, `addedBy`, `addedDate`, `active`, `newsId`) VALUES
(13, '324234', 26, '2013-06-02 10:31:08', 1, 1),
(14, '52342', 26, '2013-06-02 10:31:03', 0, 2),
(15, 'hhh', 26, '2013-06-02 10:30:17', 0, 1),
(16, 'idream tab', 26, '2013-07-04 12:33:02', 0, 49);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=75 ;

--
-- Dumping data for table `pagecontent`
--

INSERT INTO `pagecontent` (`pagecontentId`, `title`, `content`, `active`, `metaTag`, `metaDescription`, `addedBy`, `editedBy`, `addedDate`, `parentPage`, `preInclude`, `postInclude`, `seoId`, `externalLink`, `priority`, `heading`, `onHead`, `onBottom`, `openNewTab`, `image`, `showImage`, `langId`, `pageCss`) VALUES
(26, 'Home', '<p>To be the agent of choice for anyone considering a property related transaction by being the best in our profession. We provide an outstanding level of service to our clients, making moving an easy seamless and pleasurable experience. This is delivered by making clients feels special and by providing a full range of services.</p>\r\n<p>We believe in clients for life and will stay in contact with clients long after their transaction has concluded so we remain the agent of choice. 50% of our business will come from recommendations and referrals by delivering exceptional service and simply asking for the business.</p>\r\n<p><strong>OUR CLIENTS</strong> &ndash; are the most important part of our business. Our main focus is to deliver outstanding service, making moving an easy, seamless &amp; pleasurable experience.</p>\r\n<p><strong>OUR TEAM</strong> &ndash; is our most valuable asset and we work together in an atmosphere of fun and respect. We support each other to deliver exceptional customer care and achieve our personal goals.</p>\r\n<p><strong>OUR BUSINESS</strong> &ndash; provides a one-stop service for all property related matters. Our business is built on 7 strong principles and we have a shared vision to be the best in our profession both in terms of service and results.</p>', 1, 'Home', 'Home', 26, 0, '2015-12-28 02:46:46', '0', '', '', 'home', '', 1, 'Welcome To MA Estates Property Selection', 1, 0, 0, '', 0, 1, ' \r\n '),
(27, 'Lettings', '', 1, 'Lettings', 'Lettings', 26, 0, '2015-10-19 11:43:25', '0', '', '', 'Lettings', '', 3, 'Lettings', 1, 1, 0, '', 0, 1, ''),
(31, 'Contact', '<div class="contact_page">\r\n<div class="container">\r\n<div class="row">wtpage-contact-us.php-wtpage\r\n<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">\r\n<div class="row">\r\n<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">\r\n<h3>Address</h3>\r\n<p><b>MA Estates</b></p>\r\n<p>47, London Road, SW17 9JR</p>\r\n</div>\r\n<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">\r\n<h3>Email Address</h3>\r\n<p>General :<a href="info@ma-estates.com"> info@ma-estates.com</a></p>\r\n</div>\r\n</div>\r\n<div class="row">\r\n<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">\r\n<h3>Phone</h3>\r\n<p>Landline :020 3632 7395</p>\r\n</div>\r\n<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">\r\n<div class="soc_ico">\r\n<h3>Follow us</h3>\r\n<ul>\r\n<li class="tweet"><a href="#"><img alt="" src="../wtos-images/google.png" /></a></li>\r\n<li class="fb"><a href="#"><img alt="" src="../wtos-images/facebook.png" /></a></li>\r\n<li class="insta"><a href="#"><img alt="" src="../wtos-images/twitter.png" /></a></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 1, 'Contact', 'Contact', 26, 0, '2016-01-11 02:43:35', '0', '', '', 'Contact', '', 14, 'Contact', 1, 1, 0, '', 0, 1, ''),
(42, 'Property Management', '<img class="pull-left inner_ima" alt="" src="../wtos-images/ienei6.png" />\r\n<h5>Lorem Ipsum is simply dummy text::</h5>\r\n<p><b>Lorem Ipsum</b> is simply dummy text of the printing and typesetting industry. <a>Lorem Ipsum has been the industry''s</a> standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<img class="pull-right inner_ima" alt="" src="../wtos-images/ienei5.png" />\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.<br /> <br /> Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>\r\n<ol>\r\n<li>Lorem Ipsum is simply dummy text 1</li>\r\n<li>Lorem Ipsum is simply dummy text 2</li>\r\n<li>Lorem Ipsum is simply dummy text 3</li>\r\n</ol>\r\n<div class="clear">&nbsp;</div>\r\n<h5>Lorem Ipsum is simply dummy text::</h5>\r\n<p><b>Lorem Ipsum is simply dummy</b> text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.</p>\r\n<img class="pull-right inner_ima" alt="" src="../wtos-images/ienei3.png" />\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.<br /> <br />Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>\r\n<ul>\r\n<li>Lorem Ipsum is simply dummy text 1</li>\r\n<li>Lorem Ipsum is simply dummy text 2</li>\r\n<li>Lorem Ipsum is simply dummy text 3</li>\r\n</ul>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>', 0, 'Property Management', 'Property Management', 26, 0, '2015-12-03 12:26:25', '0', '', '', 'Property-Management', '', 4, 'Property Management', 1, 1, 0, '', 0, 1, ''),
(47, 'Tenants', '<img class="pull-left inner_ima" alt="" src="../wtos-images/ienei6.png" />\r\n<h5>Lorem Ipsum is simply dummy text::</h5>\r\n<p><b>Lorem Ipsum</b> is simply dummy text of the printing and typesetting industry. <a>Lorem Ipsum has been the industry''s</a> standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<img class="pull-right inner_ima" alt="" src="../wtos-images/ienei5.png" />\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.<br /> <br /> Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>\r\n<ol>\r\n<li>Lorem Ipsum is simply dummy text 1</li>\r\n<li>Lorem Ipsum is simply dummy text 2</li>\r\n<li>Lorem Ipsum is simply dummy text 3</li>\r\n</ol>\r\n<div class="clear">&nbsp;</div>\r\n<h5>Lorem Ipsum is simply dummy text::</h5>\r\n<p><b>Lorem Ipsum is simply dummy</b> text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.</p>\r\n<img class="pull-right inner_ima" alt="" src="../wtos-images/ienei3.png" />\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.<br /> <br />Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>\r\n<ul>\r\n<li>Lorem Ipsum is simply dummy text 1</li>\r\n<li>Lorem Ipsum is simply dummy text 2</li>\r\n<li>Lorem Ipsum is simply dummy text 3</li>\r\n</ul>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>', 0, 'Tenants', 'Tenants', 26, 0, '2015-12-03 10:34:43', '0', '', '', 'Tenants', '', 5, 'Tenants', 1, 1, 0, '', 0, 1, ''),
(67, 'Terms & Conditions', '<div class="single-content">\r\n<p>This Privacy Policy governs the manner in which Real Estate WordPress Theme collects, uses, maintains and discloses information collected from users (each, a &ldquo;User&rdquo;) of the&nbsp;<a href="http://wpresidence.net/">http://wpresidence.net/</a>&nbsp;website (&ldquo;Site&rdquo;). This privacy policy applies to the Site and all products and services offered by Real Estate WordPress Theme.</p>\r\n<p><b>Personal identification information</b></p>\r\n<p>We may collect personal identification information from Users in a variety of ways in connection with activities, services, features or resources we make available on our Site.. Users may visit our Site anonymously. We will collect personal identification information from Users only if they voluntarily submit such information to us. Users can always refuse to supply personally identification information, except that it may prevent them from engaging in certain Site related activities.</p>\r\n<p><b>Non-personal identification information</b></p>\r\n<p>We may collect non-personal identification information about Users whenever they interact with our Site. Non-personal identification information may include the browser name, the type of computer and technical information about Users means of connection to our Site, such as the operating system and the Internet service providers utilized and other similar information.</p>\r\n<p><b>Web browser cookies</b></p>\r\n<p>Our Site may use &ldquo;cookies&rdquo; to enhance User experience. User&rsquo;s web browser places cookies on their hard drive for record-keeping purposes and sometimes to track information about them. User may choose to set their web browser to refuse cookies, or to alert you when cookies are being sent. If they do so, note that some parts of the Site may not function properly.</p>\r\n<p><b>How we protect your information</b></p>\r\n<p>We adopt appropriate data collection, storage and processing practices and security measures to protect against unauthorized access, alteration, disclosure or destruction of your personal information, username, password, transaction information and data stored on our Site.</p>\r\n<p><b>Sharing your personal information</b></p>\r\n<p>We do not sell, trade, or rent Users personal identification information to others. We may share generic aggregated demographic information not linked to any personal identification information regarding visitors and users with our business partners, trusted affiliates and advertisers for the purposes outlined above.</p>\r\n<p><b>Changes to this privacy policy</b></p>\r\n<p>Real Estate WordPress Theme has the discretion to update this privacy policy at any time. When we do, we will revise the updated date at the bottom of this page. We encourage Users to frequently check this page for any changes to stay informed about how we are helping to protect the personal information we collect. You acknowledge and agree that it is your responsibility to review this privacy policy periodically and become aware of modifications.</p>\r\n<p><b>Your acceptance of these terms</b></p>\r\n<p>By using this Site, you signify your acceptance of this policy. If you do not agree to this policy, please do not use our Site. Your continued use of the Site following the posting of changes to this policy will be deemed your acceptance of those changes.</p>\r\n</div>', 1, 'Terms & Conditionds', 'Terms & Conditionds', 26, 0, '2016-01-19 10:20:04', '0', '', '', 'Terms_Conditions', '', 9, 'Terms & Conditions', 0, 1, 0, '', 0, 1, ''),
(72, 'Service', '<div class="row">\r\n<p>We have been helping people with their property needs since 2014. We appreciate that everyone is different so we chose to offer a bespoke award winning service to accommodate your needs.</p>\r\n<img class="pull-left inner_ima" alt="" src="../wtos-images/ienei5.png" />\r\n<h4><span><strong><a href="http://www.newman.uk.com/newman-estate-agents">MA Estates Ag<span>ent</span></a><span>&nbsp;Limited</span></strong></span></h4>\r\n<p>To maximise your chances of selling your agent will need to provide a diverse range of services including residential lettings, mortgage services and surveys. It goes without saying that a team strong in all sectors of agency will offer more opportunities to work with potential buyers. The combined experience of the team will also have an impact upon their ability to deal with the unforeseeable.</p>\r\n<h4><span><strong><span style="text-decoration: underline;">Mortgage</span></strong></span></h4>\r\n<p>Products are changing daily, as are the criteria the lenders use to determine how much they will lend and to whom. Keeping on top of these constant changes is a key part of what we do, ensuring that you benefit from the competition between lenders by securing the best deal for you. We give totally independent advice specific to your circumstances whether you are moving home, investing in property, remortgaging or consolidating debts.</p>\r\n<h4><span><strong><span><a href="http://www.newman.uk.com/newman-residential-letting"><span>MA Residential Letting</span></a></span></strong></span></h4>\r\n<p>We like to keep things simple; we believe a successful agent will market your properties professionally. They will source you reliable tenants and achieving the highest possible rent and managing the landlord and tenant relationship professionally ensuring a productive long tenancy.</p>\r\n<h4><span><strong><a href="http://www.newman.uk.com/fine-a-country">Fine &amp; Country</a></strong></span></h4>\r\n<p><strong>Are you selling a more exclusive property?</strong> The more expensive property demands a more extensive presentation in order to enhance the character of the property, the location, the area, the facilities and the lifestyle &ndash; for all the prospective purchasers. The refreshing approach to marketing and selling exclusive homes, combining individual flair and attention with the local expertise of independent estate agency, to create a strong international network with a very powerful marketing ability.</p>\r\n</div>', 1, 'service', 'service', 26, 0, '2016-01-04 02:18:42', '0', '', '', 'service', '', 13, 'service', 1, 0, 0, '', 0, 1, ''),
(53, 'property', 'wtpage-propertyDetails.php-wtpage', 1, 'property', 'property', 26, 0, '2016-01-05 09:29:04', '0', '', '', 'property', '', 0, 'property', 0, 0, 0, '', 0, 1, ''),
(54, 'rentalvaluation', '<section class="container topspace">\r\n<div class="wrapper">\r\n<div id="detailsblock_contact">\r\n<div class="valution_hd">&nbsp;</div>\r\n<div class="valution_plane">We are pleased to offer you a free valuation for your property if you are thinking of selling or letting it. If you would like us to visit, please fill in the form below or <a href="Contact">contact us directly.</a></div>\r\nwtpage-enqueryForm.php-wtpage</div>\r\n</div>\r\n</section>', 1, 'rentalvaluation', 'rentalvaluation', 26, 0, '2015-12-03 12:41:59', '68', '', '', 'rentalvaluation', '', 8, 'rentalvaluation', 1, 0, 0, '', 0, 1, ''),
(73, 'Buying a Home', '<div class="row">\r\n<p>There are cracks in the foundation. Nothing structural. Nothing that&rsquo;s going to threaten the stability of the home, but they&rsquo;re there. Nooks, crannies and holes through which seeps an invisible threat. Colorless, odorless and undetectable by your average human, it is nonetheless the second leading cause of lung cancer in the United States.</p>\r\n<p>Radon gas &ndash; even the name sounds ominous, evoking images of radiation and nuclear devastation. Radon gas is created when uranium in the soil decays. The gas then seeps through any access point into a home. Common entry points are cracks in the foundation, poorly sealed pipes, drainage or any other loose point. Once in the home, the gas can collect in certain areas &ndash; especially basements and other low-lying, closed areas &ndash; and build up over time to dangerous levels. The Environmental Protection Agency of the US Government has set a threshold of 4 pico curies per liter as the safe level. As humans are exposed to the gas over a period of years, it can have a significant and detrimental effect.</p>\r\n</div>\r\n<div class="col-md-6"><img alt="" src="../wtos-images/ienei6.png" /></div>', 1, 'Buying a Home', 'Buying a Home', 26, 0, '2016-01-05 09:46:44', '0', '', '', 'buyingAHome', '', 0, 'Buying a Home', 0, 0, 0, '', 0, 1, ''),
(56, 'register-with-us', '<section class="container topspace">\r\n<div class="wrapper">\r\n<div id="detailsblock_contact">\r\n<div class="valution_hd">Register your details with us</div>\r\n<div class="valution_plane">We are pleased to offer you a free valuation for your property if you are thinking of selling or letting it. If you would like us to visit, please fill in the form below or <a href="../Contact">contact us directly.</a></div>\r\nwtpage-valuationForm.php-wtpage</div>\r\n</div>\r\n</section>', 1, 'register-with-us', 'register-with-us', 26, 0, '2013-07-24 08:40:11', '0', '', '', 'register-with-us', '', 0, 'register-with-us', 0, 0, 0, '', 0, 1, ''),
(57, 'usefullink', '<section class="container topspace">\r\n<div class="wrapper">\r\n<div id="detailsblock_contact">\r\n<div class="usefull_hd">Useful Links</div>\r\n<div>\r\n<aside id="usefull_leftdiv">\r\n<div class="usefull_hd_sub">Solicitors</div>\r\n<div><a class="usefull_head_two" href="#">Bartletts Solicitors</a></div>\r\n<div class="use_top"><a class="usefull_head_two" href="http://www.edclord.com/" target="_blank">EDC Lord &amp; Co Solicitors</a></div>\r\n</aside>\r\n<aside id="usefull_rightdiv">\r\n<div class="usefull_hd_sub">EPC</div>\r\n<div><a class="usefull_head_two" href="http://fulhamperformance.co.uk/" target="_blank">Fulham Performance</a></div>\r\n</aside>\r\n<div class="clear">&nbsp;</div>\r\n</div>\r\n<div class="use_top_one"><img alt="" src="../wtos-images/118_170_contact_shadow.jpg" /></div>\r\n<div>\r\n<aside id="usefull_leftdiv">\r\n<div class="usefull_hd_sub">Councils</div>\r\n<div><a class="usefull_head_two" href="http://www.lbhf.gov.uk/" target="_blank">Hammersmith and Fulham Council</a></div>\r\n<div class="use_top"><a class="usefull_head_two" href="http://www.rbkc.gov.uk/" target="_blank">Royal Borough of Kensigton and Chealsea</a><br /> <br /><a class="usefull_head_two" href="http://www.wandsworth.gov.uk/" target="_blank">Wandsworth Council</a></div>\r\n</aside>\r\n<aside id="usefull_rightdiv">\r\n<div class="usefull_hd_sub">Transport</div>\r\n<div><a class="usefull_head_two" href="http://www.tfl.gov.uk/" target="_blank">Transport for London</a></div>\r\n</aside>\r\n<div class="clear">&nbsp;</div>\r\n</div>\r\n<div class="use_top_one">\r\n<div class="use_top_one">\r\n<div class="use_top_one"><img alt="" src="../wtos-images/118_170_contact_shadow.jpg" /></div>\r\n</div>\r\n</div>\r\n<div>\r\n<aside id="usefull_leftdiv">\r\n<div class="usefull_hd_sub">Independent Financial Advisers</div>\r\n<div class="use_top_down"><a class="usefull_head_two" href="http://www.capricornfinancial.co.uk/" target="_blank">Capricorn Wealth Management</a></div>\r\n</aside>\r\n<aside id="usefull_rightdiv">\r\n<div class="usefull_hd_sub">&nbsp;</div>\r\n<div>&nbsp;</div>\r\n</aside>\r\n<div class="clear">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>', 1, 'usefullink', 'usefullink', 28, 0, '2013-10-03 11:24:35', '0', '', '', 'usefullink', '', 0, 'usefullink', 0, 0, 0, '', 0, 1, ''),
(58, 'sitemap', '<section class="container topspace">\r\n<div class="wrapper">\r\n<div id="detailsblock_contact">\r\n<div class="usefull_hd">Site Map</div>\r\n<div>\r\n<aside id="usefull_leftdiv">\r\n<div class="use_top_down">\r\n<div><a class="usefull_head_two" href="#">Home</a></div>\r\n<div class="use_top"><a class="usefull_head_fore" href="#">Sales</a></div>\r\n<div class="use_top"><a class="usefull_head_fore" href="#">Lettings</a></div>\r\n<div class="use_top"><a class="usefull_head_fore" href="#">Property Management</a></div>\r\n<div class="use_top"><a class="usefull_head_fore" href="#">Tenants</a></div>\r\n<div class="use_top"><a class="usefull_head_fore" href="#">Mortgage Tools</a></div>\r\n<div class="use_top"><a class="usefull_head_fore" href="#">Contact</a></div>\r\n</div>\r\n</aside>\r\n<aside id="usefull_rightdiv">&nbsp;</aside>\r\n<div class="clear">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>', 1, 'sitemap', 'sitemap', 26, 0, '2013-08-20 04:04:28', '0', '', '', 'sitemap', '', 0, 'sitemap', 0, 0, 0, '', 0, 1, ''),
(61, 'Residential', 'wtpage-listProperty.php-wtpage', 1, 'Residential', 'Residential', 26, 0, '2015-10-08 10:43:09', '49', '', '', 'salesResidential', '', 0, 'Residential', 0, 0, 0, '', 0, 1, ''),
(60, 'Commercial', 'wtpage-listProperty.php-wtpage', 1, 'Commercial', 'Commercial', 26, 0, '2015-10-08 10:43:51', '49', '', '', 'salesCommercial', '', 0, 'Commercial', 0, 0, 0, '', 0, 1, ''),
(63, 'Residential', 'wtpage-listProperty.php-wtpage', 1, 'Residential', 'Residential', 26, 0, '2015-10-08 10:45:30', '27', '', '', 'lettingResidential', '', 0, 'Residential', 0, 0, 0, '', 0, 1, ''),
(64, 'Commercial', '<br />wtpage-listProperty.php-wtpage', 1, 'Commercial', 'Commercial', 26, 0, '2015-10-19 11:31:22', '27', '', '', 'lettingCommercial', '', 0, 'Commercial', 0, 0, 0, '', 0, 1, ''),
(65, 'Landlord', '<img class="pull-left inner_ima" alt="" src="../wtos-images/ienei6.png" />\r\n<h5>Lorem Ipsum is simply dummy text::</h5>\r\n<p><b>Lorem Ipsum</b> is simply dummy text of the printing and typesetting industry. <a>Lorem Ipsum has been the industry''s</a> standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<img class="pull-right inner_ima" alt="" src="../wtos-images/ienei5.png" />\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.<br /> <br /> Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>\r\n<ol>\r\n<li>Lorem Ipsum is simply dummy text 1</li>\r\n<li>Lorem Ipsum is simply dummy text 2</li>\r\n<li>Lorem Ipsum is simply dummy text 3</li>\r\n</ol>\r\n<div class="clear">&nbsp;</div>\r\n<h5>Lorem Ipsum is simply dummy text::</h5>\r\n<p><b>Lorem Ipsum is simply dummy</b> text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.</p>\r\n<img class="pull-right inner_ima" alt="" src="../wtos-images/ienei3.png" />\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.<br /> <br />Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>\r\n<ul>\r\n<li>Lorem Ipsum is simply dummy text 1</li>\r\n<li>Lorem Ipsum is simply dummy text 2</li>\r\n<li>Lorem Ipsum is simply dummy text 3</li>\r\n</ul>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>\r\nwtpage-tanentrightpanel.php-wtpage\r\n<div class="clear">&nbsp;</div>', 1, 'Landlord', 'Landlord', 26, 0, '2015-12-03 12:43:09', '42', '', '', 'Landlord', '', 0, 'Landlord', 0, 0, 0, '', 0, 1, ''),
(66, 'Portfolio', '', 0, 'Portfolio Management', 'Portfolio Management', 26, 0, '2015-10-12 11:37:33', '42', '', '', 'PortfolioManagement', '', 0, 'Portfolio', 1, 0, 0, '', 0, 1, ''),
(68, 'Propertyvaluation', '', 1, 'Propertyvaluation', 'Propertyvaluation', 26, 0, '2015-11-05 11:24:03', '0', '', '', 'home', '', 7, 'Propertyvaluation', 0, 0, 0, '', 0, 1, ''),
(69, 'Guaranteed Rent', '<img class="pull-left inner_ima" alt="" src="../wtos-images/ienei6.png" /> <br />\r\n<p><span style="color: #000000;"><strong>How does it work?</strong>&nbsp;<br /><br />Once one of our experienced team has valued your property, we will make an offer to you for a period of 1-3 years. We will usually agree to start the contract one month after acceptance of our offer, but in certain circumstances we can begin the contract earlier.&nbsp;&nbsp;Once the contract has begun you will be paid the agreed amount each month regardless of whether the property is tenanted or not, and even if the residing tenant stops paying the rent or falls into arrears.&nbsp;<br /><br />There are no fees or commission payable with the scheme, you receive the full agreed amount each month on the same day each month, for the full term of the contract.<br /><br /><br /><strong><br /></strong></span></p>\r\n<img class="pull-right inner_ima" alt="" src="../wtos-images/ienei3.png" />\r\n<p><span style="color: #000000;"><strong>Tenant?</strong><br /><br />Expand Properties will be your tenant and we take on all of the contractual responsibilities of the tenancy. This not only includes paying the rent, but also includes the obligation to look after the property in a tenant-like manner.<br /><br />Expand Properties own and manage a portfolio of properties throughout London, giving us a unique background that enables us to manage your property and look after your best interests.<br /><br />Once we have signed a contract with you we will start work on sourcing a tenant. As we have ultimate responsibility for the property we take special care in finding the highest quality of tenant, and most tenants that we place in properties are city professionals. We fully reference all tenants before offering a property and only accept tenants with an impeccable background.<br /><br />Our organisation also has links with a number of large corporations and we are often asked to arrange tenancies for employees and their families.<br /><br /><br /><strong>What happens at the end of the contract?</strong><br /><br />Approximately two months prior to the end of the contract we will write to you offering a further contact, or giving you the option to take back possession of the property. If a new contract is signed more than one month prior to the end of the initial contract then we will guarantee that the new contract runs concurrently following the expiry of the initial contract. There are no renewal fees or charges for extending the contract.<br /><br /><br /><strong>Preparing the Property</strong><br /><br />Once the property becomes vacant we will prepare a full inventory that includes colour photographs in order to establish an accurate record of the condition of the property at the point it is handed over to us. The inventory will be prepared by us at no charge to you and it will be checked by a professional inventory clerk at the end of the contract when the property is eventually returned to you.<br /><br />To comply with current legal obligations, we require you to provide a current landlords gas safety certificate and an energy performance certificate, prior to the start of the contract. If you prefer we can arrange these certificates on your behalf and deduct the cost from your first rent payment. The gas safety certificate needs to be renewed each year but we will make these arrangements on your behalf and we will cover the cost of this.<br /><br /><br /><strong>Property Management</strong><br /><br />As part of our obligation to ensure that the property is being looked after by the occupier, we will make regular inspections of the property and we will report any maintenance issues to you. In the event that maintenance or repair work is required we will inform you of the issue and allow you a reasonable amount of time in order to arrange a contractor to carry out the works. Alternatively, if you prefer, we will arrange for one of our trusted contractors to carry out the works on your behalf, and once the work has been completed we will settle the contractor&rsquo;s invoice and deduct the cost from your next rent payment. <img class="pull-right inner_ima" alt="" src="../wtos-images/ienei5.png" /> <br /><br /><br /><strong>Advantages of the Scheme</strong></span></p>\r\n<span style="color: #000000;">* No Voids or Vacant Periods&nbsp;<br />* Guaranteed Fixed Monthly Rent &ndash; No Late or Missed Payments&nbsp;<br />* Formal Offer from us within 24 hours&nbsp;<br />* 1 - 3 Year Contracts&nbsp;<br />* No Lettings Agency Commission&nbsp;<br />* No Management Fees&nbsp;<br />* No Renewal Fees&nbsp;<br />* No Rent Insurance Premiums&nbsp;<br />* No Utility Bills or Council Tax to Pay&nbsp;<br />* Includes Full Inventory &amp; Check-Out Report&nbsp;<br />* Includes the Renewal of your Annual Gas Safety Certificate&nbsp;<br />* Includes End of Tenancy Cleaning&nbsp;<br /></span> <span style="color: #000000;">Expand Properties offer a unique service to landlords allowing you to fix your income and costs, whilst giving you the reassurance that the property is being looked after by experienced professionals.<br /><br />We pride ourselves on offering a first class service that takes the stress out of owning an investment property. We choose only the highest quality of tenant because ultimately we are responsible for the property, and having this vested interest means that we will manage your property as if it was one of our own properties, giving you a personal service that we are confident is superior to that offered by any other managing agent.<br /><br />We are happy to consider any property providing that it meets our basic standard and is fully self-contained. Where a property requires refurbishment we may be able to renovate the property at our expense, and furnish properties as required.</span>\r\n<div class="clear">&nbsp;</div>', 0, 'Guaranteed Rent', 'Guaranteed Rent', 26, 0, '2015-12-03 12:48:54', '0', '', '', 'Guaranteed-Rent', '', 10, 'Guaranteed Rent', 1, 0, 0, '', 0, 1, ''),
(70, 'cookiepolicy', '<div class="cookiePolicy">\r\n<h2>Privacy Statement: How we use Cookies</h2>\r\n<p>Cookies are very small text files that are stored on your computer when you visit some websites. <br /><br /> We use cookies to help identify your computer so we can tailor your user experience, track shopping basket contents and remember where you are in the order process. <br /> You can disable any cookies already stored on your computer, but these may stop our website from functioning properly.<br /> The following is strictly necessary in the operation of our website. <br /> This Website Will: <br />Remember what is in your shopping basket<br /> Remember where you are in the order process<br /> Remember that you are logged in and that your session is secure. You need to be logged in to complete an order.<br /> The following are not Strictly Necessary, but are required to provide you with the best user experience and also to tell us which pages you find most interesting (anonymously). </p>\r\n<h2>Functional Cookies</h2>\r\n<p>This Website Will:<br /> Offer Live Chat Support (If available)<br /> Track the pages you visits via Google Analytics</p>\r\n<h2>Targeting Cookies</h2>\r\n<p>This Website Will:<br />Allow you to share pages with social networks such as Facebook (If available)<br /> Allow you to share pages via Add This (If available)<br /> To view the &lsquo;Add This&rsquo; Privacy Policy or to opt out of any online behavioural advertising, please visit Add This and click on the &lsquo;Opt Out&rsquo; button.<br /> This website will not<br /><br /> Share any personal information with third parties.</p>\r\n<p>&nbsp;</p>\r\n</div>', 1, 'cookiepolicy', 'cookiepolicy', 26, 0, '2015-12-03 01:50:18', '0', '', '', 'cookiepolicy', '', 0, 'Cookies Policy', 0, 0, 0, '', 0, 1, ''),
(71, 'About Us', '<div class="row">\r\n<p>To be the agent of choice for anyone considering a property related transaction by being the best in our profession. We provide an outstanding level of service to our clients, making moving an easy seamless and pleasurable experience. This is delivered by making clients feels special and by providing a full range of services.</p>\r\n<p>We believe in clients for life and will stay in contact with clients long after their transaction has concluded so we remain the agent of choice. 50% of our business will come from recommendations and referrals by delivering exceptional service and simply asking for the business.</p>\r\n<p><strong>OUR CLIENTS</strong> &ndash; are the most important part of our business. Our main focus is to deliver outstanding service, making moving an easy, seamless &amp; pleasurable experience.</p>\r\n<p><strong>OUR TEAM </strong>&ndash; is our most valuable asset and we work together in an atmosphere of fun and respect. We support each other to deliver exceptional customer care and achieve our personal goals.</p>\r\n<p><strong>OUR BUSINESS </strong>&ndash; provides a one-stop service for all property related matters. Our business is built on 7 strong principles and we have a shared vision to be the best in our profession both in terms of service and results.</p>\r\n</div>\r\n<div class="row">\r\n<div class="col-md-6">\r\n<ul>\r\n<li>INTEGRITY</li>\r\n<li>TEAMWORK</li>\r\n<li>PASSION</li>\r\n<li>PROFESSIONALISM</li>\r\n<li>FUN</li>\r\n<li>CARING</li>\r\n<li>INDUSTRIOUS</li>\r\n</ul>\r\n</div>\r\n<div class="col-md-6"><img alt="" src="../wtos-images/ienei6.png" /></div>\r\n</div>', 1, 'aboutUs', 'aboutUs', 26, 0, '2016-01-04 01:58:27', '0', '', '', 'aboutUs', '', 12, 'About Us', 1, 0, 0, '', 0, 1, ''),
(74, 'Manhattan Apartments', '<p>In Manhattan, uptown means north (more precisely north-northeast, which is the direction the island and its street grid system is oriented) and downtown means south (south-southwest). This usage differs from that of most American cities, where downtown refers to the central business district. Manhattan has two central business districts, the Financial District at the southern tip of the island, and Midtown Manhattan. The term uptown also refers to the northern part of Manhattan above 72nd Street and downtown to the southern portion below 14th Street, with Midtown covering the area in between, though definitions can be rather fluid depending on the situation.</p>\r\n<p>Though the grid does start with 1st Street, just north of Houston Street (pronounced HOW-stin), the grid does not fully take hold until north of 14th Street, where nearly all east-west streets are numerically identified, which increase from south to north to 220th Street, the highest numbered street on the island. Streets in Midtown are usually one way with a few exceptions (14th, 34th and 42nd to name a few). The rule of thumb is odd numbered streets run west while evens run east.</p>', 1, 'Manhattan Apartments', 'Manhattan Apartments', 26, 0, '2016-01-19 12:19:42', '0', '', '', 'ManhattanApartments', '', 0, 'Manhattan Apartments', 0, 0, 0, '', 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `paymentsId` int(10) NOT NULL AUTO_INCREMENT,
  `dated` datetime NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `amount` float(5,2) NOT NULL,
  `mode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `linkedIdFields` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `linkedIdValue` int(10) NOT NULL,
  `direction` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `addedDate` datetime NOT NULL,
  `addedBy` int(10) NOT NULL,
  `modifyDate` datetime NOT NULL,
  `modifyBy` int(10) NOT NULL,
  PRIMARY KEY (`paymentsId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE IF NOT EXISTS `property` (
  `propertyId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `locationId` int(10) NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `postcode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) NOT NULL,
  `bed` int(3) NOT NULL,
  `bath` int(3) NOT NULL,
  `reception` int(3) NOT NULL,
  `priceUnit` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(4) NOT NULL,
  `featured` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `shortDescription` text COLLATE utf8_unicode_ci NOT NULL,
  `fullDescription` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `floorplan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `EPC` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `printImg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seoId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hits` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `enquery` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `addedDate` datetime NOT NULL,
  `addedBy` int(10) NOT NULL,
  `modifyDate` datetime NOT NULL,
  `modifyBy` int(10) NOT NULL,
  `active` tinyint(2) NOT NULL,
  `leasehold` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `groundrent` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `servicecharge` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `counciltax` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `underground` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `leaseyears` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `brochurePdf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qrCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `epcvalue` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `printStyle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bulletText1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bulletText2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bulletText3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bulletText4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bulletText5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sofa` int(2) NOT NULL,
  `houseNO` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `RoadName` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `rightmoveLink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `propertyType` int(3) NOT NULL,
  `memberId` int(10) NOT NULL COMMENT 'vendor',
  `branch` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `attribute` text COLLATE utf8_unicode_ci NOT NULL,
  `propertyStatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'withdrawn',
  `generalNotes` text COLLATE utf8_unicode_ci NOT NULL,
  `contactNotes` text COLLATE utf8_unicode_ci NOT NULL,
  `available` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `registerDate` date NOT NULL,
  `propCode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `townCity` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `purposeType` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Residential',
  `gasCertificate` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `propertyAvlDate` date NOT NULL,
  `dss` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `availableKeys` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sharing` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `furnished` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `facility` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`propertyId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`propertyId`, `title`, `name`, `locationId`, `address`, `postcode`, `price`, `bed`, `bath`, `reception`, `priceUnit`, `priority`, `featured`, `label`, `shortDescription`, `fullDescription`, `type`, `floorplan`, `EPC`, `printImg`, `seoId`, `hits`, `enquery`, `addedDate`, `addedBy`, `modifyDate`, `modifyBy`, `active`, `leasehold`, `groundrent`, `servicecharge`, `counciltax`, `underground`, `leaseyears`, `brochurePdf`, `qrCode`, `epcvalue`, `printStyle`, `bulletText1`, `bulletText2`, `bulletText3`, `bulletText4`, `bulletText5`, `sofa`, `houseNO`, `RoadName`, `rightmoveLink`, `propertyType`, `memberId`, `branch`, `attribute`, `propertyStatus`, `generalNotes`, `contactNotes`, `available`, `registerDate`, `propCode`, `townCity`, `purposeType`, `gasCertificate`, `propertyAvlDate`, `dss`, `availableKeys`, `area`, `sharing`, `furnished`, `facility`) VALUES
(22, ' 1 Bedroom Flat in Tooting', ' 1 Bedroom Flat in Tooting', 3, '47 London Road SW17 9JR , London, Tooting', '333333', 500, 3, 2, 0, 'pcm', 0, 'Featured Rentals', '-', 'Mckinley Hill is situated inside Fort Bonifacio which is a 50 hectares owned by Megaworld. Mckinley Hill is Said to be the Biggest and Grandest Development in Metro manila as of Today', '', 'Rent', '', '', '', '-1-Bedroom-Flat-in-Tooting-for-Rent-2', '6', '', '2016-01-20 09:29:05', 26, '0000-00-00 00:00:00', 0, 1, '', '', '', '', '', '', '', '', '', 'textareaStyle', '', '', '', '', '', 1, '', '', '', 0, 0, '', '', '', '', '', '', '0000-00-00', 'PP22', '', 'Residential', '', '1970-01-01', '', '', '', '', '', ''),
(14, 'Luxury Villa In Rego Park', 'Luxury Villa In Rego Park', 1, 'Villas in Rentals 85-02 67 Ave, 11374, New York, Queens', '33', 2100, 3, 2, 0, 'pcm', 0, 'Featured Rentals', 'Under offer', '', '', 'Rent', '', '', '', 'Luxury-Villa-In-Rego-Park-for-Rent-2', '4', '', '2016-01-20 09:29:58', 26, '0000-00-00 00:00:00', 0, 1, '', '', '', '', '', '', '', '', '', 'bulletStyle', '', '', '', '', '', 1, '', '', '', 0, 0, '', '', '', '', '', '', '0000-00-00', 'PP14', '', 'Commercial', '', '1970-01-01', '', '', '', '', '', ''),
(15, 'Gorgeous Farm in Jersey', 'Gorgeous Farm in Jersey', 1, 'Land in Sales Ferris Park, Jersey City, Greenville', '33', 700, 5, 6, 0, 'pcm', 0, 'Featured Sales', 'Under offer', 'This property is mostly wooded and sits high on a hilltop overlooking the Mohawk River Valley. Located right in the heart of Upstate NYs Amish farm Country.....', 'This property is mostly wooded and sits high on a hilltop overlooking the Mohawk River Valley. Located right in the heart of Upstate NYs Amish farm Country, this land is certified organic making it extremely rare! Good road frontage on a paved county road with utilities make it an amazing setting for your dream country getaway! If you like views, you must see this property!', 'Rent', '', '', '', 'Gorgeous-Farm-in-Jersey-for-Rent-2', '16', '', '2016-01-20 09:29:44', 26, '0000-00-00 00:00:00', 0, 1, '', '', '', '', '', '', '', '', '', 'textareaStyle', '', '', '', '', '', 1, '', '', '', 0, 0, '', '', '', '', '', '', '0000-00-00', 'PP15', '', 'Commercial', '', '1970-01-01', '', '', '', '', '', ''),
(17, 'Boutique Space Greenville', 'Boutique Space Greenville', 1, 'Retail in Rentals Bartholdi Ave, Jersey City, Greenville', 'w4er', 2200, 5, 4, 0, 'pcm', 0, 'Recently Added', 'Under offer', 'Downtown Frederick hot spot. Top location for local entertainment. All fixtures are included. Liquor license can be included. Price includes 3 leased apartments on the second floor ..', 'Downtown Frederick hot spot. Top location for local entertainment. All fixtures are included. Liquor license can be included. Price includes 3 leased apartments on the second floor income $2,200 per month.Free standing built out restaurant with separate dining/banquet room. Spacious outdoor dining deck. Large commercial kitchen fully equipped. Seating capacity over 200 with large event area with stage and movable dance floor. This opportunity is perfect for investor or owner operator. Keep existing concept or introduce your own.', 'Rent', '', '', '', 'Boutique-Space-Greenville-for-Rent', '2', '', '2016-01-19 12:39:32', 26, '0000-00-00 00:00:00', 0, 1, '', '', '23', '45645341', '11', '', '', '', '1111', 'textareaStyle', '555', '111525', '533', '45', '123', 1, '', 'cdhgfd', '', 23, 2, '', '', '', '', '', '', '0000-00-00', 'PP17', '', 'Residential', '', '2016-01-01', 'Yes', 'Yes', '', '', '', ''),
(18, 'Park Avenue Apartment', 'Park Avenue Apartment', 1, 'Apartments in Rentals East 59th St, New York, Upper East Side', '33', 500, 3, 3, 0, 'pcm', 0, 'Featured Rentals', 'Under offer', 'MA Estates are proud to present this lovely one bedroom flat located in Tooting. The flat consists of:>Open plan Kitchen>Ground floor flat>Nearest station is Tooting Railway Station>Close to local shops and amenities>Own parking space>Bills are excluded', 'MA Estates are proud to present this lovely one bedroom flat located in Tooting. The flat consists of:>Open plan Kitchen>Ground floor flat>Nearest station is Tooting Railway Station>Close to local shops and amenities>Own parking space>Bills are excludedatticgas heatocean viewwine cellarbasketball courtgympoundfireplacelake viewpoolback yardfront yardfenced yardsprinklerswasher and dryerdeckbalconylaundryconciergedoormanprivate spacestoragerecreationroof deck', 'Rent', '', '', '', 'Park-Avenue-Apartment-for-Rent-2', '1', '', '2016-01-20 09:29:30', 26, '0000-00-00 00:00:00', 0, 1, '', '', '', '', '', '', '', '', '', 'textareaStyle', '', '', '', '', '', 1, '', 'East 59th St', '', 0, 0, '', '', '', '', '', '', '0000-00-00', 'PP18', '', 'Residential', '', '1970-01-01', '', '', '', '', '', ''),
(20, 'Office Space Central Ave', 'Office Space Central Ave', 1, 'Bowers Street,The Heights', '568871', 16000, 2, 2, 0, 'pcm', 0, 'Recently Added', '-', '', '', 'Rent', '', '', '', 'Office-Space-Central-Ave-for-Rent-2', '', '', '2016-01-20 09:29:23', 26, '0000-00-00 00:00:00', 0, 1, '', '', '', '', '', '', '', '', '', 'textareaStyle', '', '', '', '', '', 1, 'Jersey City', 'Bowers Street', '', 0, 0, '', '', '', '', '', '', '0000-00-00', 'PP20', '', 'Residential', '', '1970-01-01', '', '', '', '', '', ''),
(21, 'Condo In Financial District', '', 0, '88 Greenwich St ', '', 0, 0, 0, 0, 'pcm', 0, '', '', '', '', '', '', '', '', 'Condo-In-Financial-District-for-', '', '', '2016-01-20 09:29:15', 26, '0000-00-00 00:00:00', 0, 0, '', '', '', '', '', '', '', '', '', 'textareaStyle', '', '', '', '', '', 0, '', '', '', 0, 0, '', '', '', '', '', '', '0000-00-00', 'PP21', '', '', '', '0000-00-00', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `propertyimage`
--

CREATE TABLE IF NOT EXISTS `propertyimage` (
  `propertyImageId` int(11) NOT NULL AUTO_INCREMENT,
  `propertyId` int(10) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `addedDate` datetime NOT NULL,
  `addedBy` int(10) NOT NULL,
  `modifyDate` datetime NOT NULL,
  `modifyBy` int(10) NOT NULL,
  `active` tinyint(2) NOT NULL,
  `priority` int(5) NOT NULL DEFAULT '1',
  `printOrder` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`propertyImageId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=50 ;

--
-- Dumping data for table `propertyimage`
--

INSERT INTO `propertyimage` (`propertyImageId`, `propertyId`, `title`, `image`, `type`, `addedDate`, `addedBy`, `modifyDate`, `modifyBy`, `active`, `priority`, `printOrder`) VALUES
(1, 1, 'bedroom', 'wtos-images/imageThumb.jpg', '', '2015-10-12 11:31:42', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(3, 2, '', 'wtos-images/beutiful-two-bed-apartment-to-let-in-kenley2-.jpg', '', '2015-10-20 09:10:19', 26, '0000-00-00 00:00:00', 0, 1, 5, 1),
(4, 2, '', 'wtos-images/beutiful-two-bed-apartment-to-let-in-kenley-.jpg', '', '2015-10-20 09:10:10', 26, '0000-00-00 00:00:00', 0, 1, 4, 1),
(6, 2, '', 'wtos-images/north-main-home-for-sale3.jpg', '', '2015-10-20 09:08:51', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(7, 3, '', 'wtos-images/stunning-three-bed-flat-available-to-let-in-tooting.jpg', '', '2015-10-20 09:02:22', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(8, 4, '', 'wtos-images/brand-new-studio-flat-to-let-purley.jpg', '', '2015-10-20 09:03:35', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(9, 5, '', 'wtos-images/demo-property-1.jpg', '', '2015-10-20 09:04:37', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(10, 6, '', 'wtos-images/project_small_pic6.jpg', '', '2015-12-01 01:39:44', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(11, 7, '', 'wtos-images/north-main-home-for-sale4.jpg', '', '2015-10-20 09:07:08', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(12, 7, '', 'wtos-images/north-main-home-for-sale3.jpg', '', '2015-10-20 09:06:56', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(13, 7, '', 'wtos-images/north-main-home-for-sale2.jpg', '', '2015-10-20 09:06:48', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(14, 7, '', 'wtos-images/north-main-home-for-sale.jpg', '', '2015-10-20 09:06:33', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(15, 8, '', 'wtos-images/4-bedroom-single-family-home3.jpg', '', '2015-10-20 08:49:46', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(16, 8, '', 'wtos-images/4-bedroom-single-family-home2.jpg', '', '2015-10-20 08:49:36', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(17, 8, '', 'wtos-images/4-bedroom-single-family-home.jpg', '', '2015-10-20 08:49:25', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(18, 9, '', 'wtos-images/beautiful-custom-built-home4.jpg', '', '2015-10-20 08:44:12', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(19, 9, '', 'wtos-images/beautiful-custom-built-home3.jpg', '', '2015-10-20 08:43:58', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(20, 9, '', 'wtos-images/beautiful-custom-built-home2.jpg', '', '2015-10-20 08:43:45', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(21, 9, '', 'wtos-images/beautiful-custom-built-home.jpg', '', '2015-10-20 08:43:31', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(24, 10, '', 'wtos-images/bathroom.jpg', '', '2015-11-27 10:18:00', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(25, 10, '', 'wtos-images/IMG_4921.JPG', '', '2015-10-26 05:36:15', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(26, 10, '', 'wtos-images/IMG_4922.JPG', '', '2015-10-26 05:36:32', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(27, 10, '', 'wtos-images/88cdcf619b3ebb43d270a865b4bda3d3dd014984_645_430.jpg', '', '2015-11-27 10:16:16', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(28, 10, '', 'wtos-images/IMG_4922.JPG', '', '2015-10-26 05:37:31', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(30, 10, '', 'wtos-images/7bee4ca3b0653d9f691e4742a8f5ee47e39f74e3_645_430.jpg', '', '2015-11-27 10:15:02', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(31, 6, '', 'wtos-images/Bedroom-Design-Ideas-with-Platform-Bed-Furniture.jpg', '', '2015-12-01 01:51:03', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(32, 6, '', 'wtos-images/Bedroom-Ideas-with-Wood-Bedroom-Set.jpg', '', '2015-12-01 01:51:20', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(33, 6, '', 'wtos-images/White-Inspired-Guest-Bedroom.jpg', '', '2015-12-01 01:52:45', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(34, 13, '1 Bedroom Flat in Tooting', 'wtos-images/8501-835x467.jpg', '', '2016-01-04 12:50:52', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(35, 14, 'Luxury Villa In Rego Park', 'wtos-images/house-835x467.jpg', '', '2016-01-04 12:48:14', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(36, 15, 'Gorgeous Farm in Jersey', 'wtos-images/house-835x467.jpg', '', '2016-01-04 12:55:47', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(38, 16, 'Agent with Contact 7 Form', 'wtos-images/floor_plan_3d1.jpg', '', '2016-01-04 01:09:17', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(39, 17, 'Boutique Space Greenville', 'wtos-images/file000332309677.jpg', '', '2016-01-04 01:33:11', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(40, 18, 'Park Avenue Apartment', 'wtos-images/demo31-810x467.jpg', '', '2016-01-04 01:36:33', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(41, 19, 'img1', 'wtos-images/below market value.jpg', '', '2016-01-06 10:51:51', 26, '0000-00-00 00:00:00', 0, 1, 6, 1),
(42, 19, 'img2', 'wtos-images/default-header-img.jpg', '', '2016-01-06 10:52:03', 26, '0000-00-00 00:00:00', 0, 1, 5, 1),
(43, 19, 'img3', 'wtos-images/house.jpg', '', '2016-01-06 10:52:12', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(44, 19, 'img4', 'wtos-images/images.jpg', '', '2016-01-06 10:52:20', 26, '0000-00-00 00:00:00', 0, 1, 4, 1),
(45, 19, 'img5', 'wtos-images/london-houses-property-pr-011.jpg', '', '2016-01-06 10:52:30', 26, '0000-00-00 00:00:00', 0, 1, 3, 1),
(46, 19, 'img6', 'wtos-images/topimage_uk_landlords.jpg', '', '2016-01-06 10:52:38', 26, '0000-00-00 00:00:00', 0, 1, 2, 1),
(47, 20, 'propInCentAve', 'wtos-images/file0001197194142-810x467.jpg', '', '2016-01-19 10:30:19', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(48, 21, 'propInUSA', 'wtos-images/file10512788799001-810x467.jpg', '', '2016-01-19 10:39:12', 26, '0000-00-00 00:00:00', 0, 1, 1, 1),
(49, 22, 'v 1 Bedroom Flat in Tooting', 'wtos-images/8501-835x467.jpg', '', '2016-01-19 02:49:12', 26, '0000-00-00 00:00:00', 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `propertylocation`
--

CREATE TABLE IF NOT EXISTS `propertylocation` (
  `propertylocationId` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `addedDate` datetime NOT NULL,
  `addedBy` int(10) NOT NULL,
  `modifyDate` datetime NOT NULL,
  `modifyBy` int(10) NOT NULL,
  `active` tinyint(2) NOT NULL,
  PRIMARY KEY (`propertylocationId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `propertylocation`
--

INSERT INTO `propertylocation` (`propertylocationId`, `title`, `addedDate`, `addedBy`, `modifyDate`, `modifyBy`, `active`) VALUES
(1, 'London', '2015-10-19 10:53:08', 26, '0000-00-00 00:00:00', 0, 1),
(2, 'Mitcham', '2015-10-20 09:23:48', 26, '0000-00-00 00:00:00', 0, 1),
(3, 'Tooting', '2015-10-21 07:53:01', 26, '0000-00-00 00:00:00', 0, 1),
(4, 'Morden', '2015-10-21 07:53:14', 26, '0000-00-00 00:00:00', 0, 1),
(5, 'Streatham', '2015-10-21 07:53:28', 26, '0000-00-00 00:00:00', 0, 1),
(6, 'Clapham', '2015-10-21 07:53:48', 26, '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `propertyrooms`
--

CREATE TABLE IF NOT EXISTS `propertyrooms` (
  `propertyroomsId` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `dimension` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `propertyId` int(10) NOT NULL,
  `addedDate` datetime NOT NULL,
  `addedBy` int(10) NOT NULL,
  `modifyDate` datetime NOT NULL,
  `modifyBy` int(10) NOT NULL,
  PRIMARY KEY (`propertyroomsId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rentagreement`
--

CREATE TABLE IF NOT EXISTS `rentagreement` (
  `rentagreementId` int(10) NOT NULL AUTO_INCREMENT,
  `dated` datetime NOT NULL,
  `fromDate` datetime NOT NULL,
  `toDate` datetime NOT NULL,
  `tenantId` int(10) NOT NULL,
  `landlordId` int(10) NOT NULL,
  `propertyId` int(10) NOT NULL,
  `agreementReffId` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `rentAmountLandlord` float(8,2) NOT NULL,
  `commission` float(8,2) NOT NULL,
  `rentAmount` float(8,2) NOT NULL,
  `deposite` float(8,2) NOT NULL,
  `holdingDeposite` float(8,2) NOT NULL,
  `adminFees` float(8,2) NOT NULL,
  `agentName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `rentDueDate` datetime NOT NULL,
  `paybleAmount` float(8,2) NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `addedDate` datetime NOT NULL,
  `addedBy` int(10) NOT NULL,
  `modifyDate` datetime NOT NULL,
  `modifyBy` int(10) NOT NULL,
  PRIMARY KEY (`rentagreementId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rentagreement`
--

INSERT INTO `rentagreement` (`rentagreementId`, `dated`, `fromDate`, `toDate`, `tenantId`, `landlordId`, `propertyId`, `agreementReffId`, `type`, `rentAmountLandlord`, `commission`, `rentAmount`, `deposite`, `holdingDeposite`, `adminFees`, `agentName`, `rentDueDate`, `paybleAmount`, `status`, `note`, `addedDate`, `addedBy`, `modifyDate`, `modifyBy`) VALUES
(3, '2016-01-22 00:00:00', '2016-01-22 00:00:00', '2016-12-16 00:00:00', 1, 2, 17, 'A3T1P17L2', '', 500.00, 100.00, 500.00, 200.00, 100.00, 100.00, '', '2016-01-22 00:00:00', 200.00, 'Valid', '', '2016-01-22 02:36:11', 31, '2016-01-22 02:36:11', 31);

-- --------------------------------------------------------

--
-- Table structure for table `rentbill`
--

CREATE TABLE IF NOT EXISTS `rentbill` (
  `rentbillId` int(10) NOT NULL AUTO_INCREMENT,
  `rentagreementId` int(10) NOT NULL,
  `agreementReffId` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `rentAmount` float(8,2) NOT NULL,
  `rentMonth` int(2) NOT NULL,
  `rentYear` int(4) NOT NULL,
  `rentArrears` float(8,2) NOT NULL,
  `rentOtherBills` text COLLATE utf8_unicode_ci NOT NULL,
  `paybleAmount` float(8,2) NOT NULL,
  `receivedAmount` float(8,2) NOT NULL,
  `dueAmount` float(8,2) NOT NULL,
  `dueDate` datetime NOT NULL,
  `dated` datetime NOT NULL,
  `paymentStatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `addedDate` datetime NOT NULL,
  `addedBy` int(10) NOT NULL,
  `modifyDate` datetime NOT NULL,
  `modifyBy` int(10) NOT NULL,
  PRIMARY KEY (`rentbillId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=37 ;

--
-- Dumping data for table `rentbill`
--

INSERT INTO `rentbill` (`rentbillId`, `rentagreementId`, `agreementReffId`, `rentAmount`, `rentMonth`, `rentYear`, `rentArrears`, `rentOtherBills`, `paybleAmount`, `receivedAmount`, `dueAmount`, `dueDate`, `dated`, `paymentStatus`, `note`, `addedDate`, `addedBy`, `modifyDate`, `modifyBy`) VALUES
(25, 3, 'A3T1P17L2', 500.00, 1, 2016, 0.00, '', 500.00, 0.00, 0.00, '2016-01-22 00:00:00', '2016-01-22 00:00:00', 'Pending', '', '2016-01-22 02:36:11', 31, '2016-01-22 02:36:11', 31),
(26, 3, 'A3T1P17L2', 500.00, 2, 2016, 0.00, '', 500.00, 0.00, 0.00, '2016-02-22 00:00:00', '2016-02-22 00:00:00', 'Pending', '', '2016-01-22 02:36:11', 31, '2016-01-22 02:36:11', 31),
(27, 3, 'A3T1P17L2', 500.00, 3, 2016, 0.00, '', 500.00, 0.00, 0.00, '2016-03-22 00:00:00', '2016-03-22 00:00:00', 'Pending', '', '2016-01-22 02:36:11', 31, '2016-01-22 02:36:11', 31),
(28, 3, 'A3T1P17L2', 500.00, 4, 2016, 0.00, '', 500.00, 0.00, 0.00, '2016-04-22 00:00:00', '2016-04-22 00:00:00', 'Pending', '', '2016-01-22 02:36:11', 31, '2016-01-22 02:36:11', 31),
(29, 3, 'A3T1P17L2', 500.00, 5, 2016, 0.00, '', 500.00, 0.00, 0.00, '2016-05-22 00:00:00', '2016-05-22 00:00:00', 'Pending', '', '2016-01-22 02:36:12', 31, '2016-01-22 02:36:12', 31),
(30, 3, 'A3T1P17L2', 500.00, 6, 2016, 0.00, '', 500.00, 0.00, 0.00, '2016-06-22 00:00:00', '2016-06-22 00:00:00', 'Pending', '', '2016-01-22 02:36:12', 31, '2016-01-22 02:36:12', 31),
(31, 3, 'A3T1P17L2', 500.00, 7, 2016, 0.00, '', 500.00, 0.00, 0.00, '2016-07-22 00:00:00', '2016-07-22 00:00:00', 'Pending', '', '2016-01-22 02:36:12', 31, '2016-01-22 02:36:12', 31),
(32, 3, 'A3T1P17L2', 500.00, 8, 2016, 0.00, '', 500.00, 0.00, 0.00, '2016-08-22 00:00:00', '2016-08-22 00:00:00', 'Pending', '', '2016-01-22 02:36:12', 31, '2016-01-22 02:36:12', 31),
(33, 3, 'A3T1P17L2', 500.00, 9, 2016, 0.00, '', 500.00, 0.00, 0.00, '2016-09-22 00:00:00', '2016-09-22 00:00:00', 'Pending', '', '2016-01-22 02:36:12', 31, '2016-01-22 02:36:12', 31),
(34, 3, 'A3T1P17L2', 500.00, 10, 2016, 0.00, '', 500.00, 0.00, 0.00, '2016-10-22 00:00:00', '2016-10-22 00:00:00', 'Pending', '', '2016-01-22 02:36:12', 31, '2016-01-22 02:36:12', 31),
(35, 3, 'A3T1P17L2', 500.00, 11, 2016, 0.00, '', 500.00, 0.00, 0.00, '2016-11-22 00:00:00', '2016-11-22 00:00:00', 'Pending', '', '2016-01-22 02:36:12', 31, '2016-01-22 02:36:12', 31),
(36, 3, 'A3T1P17L2', 500.00, 12, 2016, 0.00, '', 500.00, 0.00, 0.00, '2016-12-22 00:00:00', '2016-12-22 00:00:00', 'Pending', '', '2016-01-22 02:36:12', 31, '2016-01-22 02:36:12', 31);

-- --------------------------------------------------------

--
-- Table structure for table `rentbillotherfees`
--

CREATE TABLE IF NOT EXISTS `rentbillotherfees` (
  `rentbillotherfeesId` int(10) NOT NULL AUTO_INCREMENT,
  `rentbillId` int(10) NOT NULL,
  `sign` varchar(1) NOT NULL,
  `title` varchar(100) NOT NULL,
  `amount` float(7,2) NOT NULL,
  `addedBy` int(10) NOT NULL,
  `addedDate` datetime NOT NULL,
  `modifyDate` datetime NOT NULL,
  `modifyBy` int(10) NOT NULL,
  PRIMARY KEY (`rentbillotherfeesId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rents`
--

CREATE TABLE IF NOT EXISTS `rents` (
  `rentsId` int(10) NOT NULL AUTO_INCREMENT,
  `propertyId` int(10) NOT NULL,
  `applicantId` int(10) NOT NULL,
  `rentMonths` int(2) NOT NULL,
  `rentYears` int(4) NOT NULL,
  `amount` int(4) NOT NULL,
  `Arrears` int(5) NOT NULL,
  `TotalPayble` int(5) NOT NULL,
  `ReceivedAmount` int(5) NOT NULL,
  `Due` int(5) NOT NULL,
  `amountStatus` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `llAmount` int(4) NOT NULL,
  `llAmountStatus` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `profit` int(4) NOT NULL,
  `contractStatus` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `remarks` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `addedDate` datetime NOT NULL,
  `addedBy` int(10) NOT NULL,
  `modifyDate` datetime NOT NULL,
  `modifyBy` int(10) NOT NULL,
  PRIMARY KEY (`rentsId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settingsId`, `keyword`, `value`, `system`) VALUES
(1, 'email', 'admin@webhouse4u.co.uk', 0),
(2, 'metaKey', 'ma-estates valuation sales lettings management London ', 0),
(3, 'metaDescription', 'ma-estates', 0),
(4, 'siteTitle', 'ma-estates', 0),
(5, 'pageCount', '25', 1),
(6, 'homePageId', ' 26', 1),
(7, 'Deactivate Site', '0', 1),
(8, 'Deactivate Message', 'Site Temporarily Under Construction .', 1),
(9, 'Validate Wtos', 'not in use', 1),
(10, 'Validate WtosMessage', 'Please contact admin@webtrackers.co.in to enjoy uninterrupted service.', 1),
(11, 'Validate WtosDate', '==gMwEjNtADNtATM', 1),
(12, 'Deactivate Date', '2016-07-05', 1),
(13, 'language', '2', 1),
(14, 'Styles', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sliderimage`
--

CREATE TABLE IF NOT EXISTS `sliderimage` (
  `sliderImageId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `langId` int(11) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`sliderImageId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `sliderimage`
--

INSERT INTO `sliderimage` (`sliderImageId`, `title`, `image`, `caption`, `langId`, `addedBy`, `addedDate`, `active`) VALUES
(2, '', 'wtos-images/fire_autumn_wallpaper_autumn_nature_wallpaper_1920_1200_widescreen_1452.jpg', '', 0, 26, '2013-03-20 08:48:56', 0),
(5, '', 'wtos-images/Nature Mountains photo.jpg', '', 0, 26, '2013-03-20 08:48:42', 0),
(6, '', 'wtos-images/nature6.jpg', '', 0, 26, '2013-03-20 08:48:49', 0),
(7, '', 'wtos-images/Nature-Full-HD-Wallpaper-national-geographic-7822261-1920-1080.jpg', '', 0, 26, '2013-03-20 08:49:02', 0),
(8, '', 'wtos-images/nature-hd-wallpapers-water.jpg', '', 0, 26, '2013-03-20 08:49:09', 0),
(10, '', 'wtos-images/nature-landscapes-windows-beautiful-wallpaper.jpg', '', 0, 26, '2013-03-20 08:50:03', 0),
(11, '', 'wtos-images/Nature-Spring-Season-Bright-hd-wallpaper.jpg', '', 0, 26, '2013-03-20 08:50:09', 0),
(12, '', 'wtos-images/nature-wallpaper-467926482.jpg', '', 0, 26, '2013-03-20 08:50:15', 0),
(13, '', 'wtos-images/wallpapers-nature-images-artistic-115115.jpg', '', 2, 26, '2013-03-20 08:50:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `staffId` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `addedDate` datetime NOT NULL,
  `addedBy` int(10) NOT NULL,
  `modifyDate` datetime NOT NULL,
  `modifyBy` int(10) NOT NULL,
  PRIMARY KEY (`staffId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `style`
--

CREATE TABLE IF NOT EXISTS `style` (
  `styleId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL,
  `css` text NOT NULL,
  `addedBy` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`styleId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `style`
--

INSERT INTO `style` (`styleId`, `title`, `css`, `addedBy`, `addedDate`, `active`) VALUES
(1, 'Red Border 1px', 'border:1px solid #FF0000;', 26, '2013-02-27 07:31:54', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `wtbox`
--

INSERT INTO `wtbox` (`wtboxId`, `title`, `accessKey`, `langId`, `css`, `container`, `content`, `tinymce`, `addedBy`, `addedDate`, `active`, `system`) VALUES
(3, 'buyingHome', 'buyingHome', 1, '', '', '<div class="col-md-4">\r\n<div class="top-grid block" data-move-x="500px" data-rotate="-90deg"><a href="service"><img title="icon-name" alt="" src="../wtos-images/icon2.png" /></a>\r\n<h3>Mortgage</h3>\r\n<p>Products are changing daily, as are the criteria the lenders use to determine how much they will lend and to whom.....</p>\r\n<a class="button" href="service">Read More</a></div>\r\n</div>', 1, 26, '2016-01-19 01:58:38', 0, 0),
(4, 'lifeInNewYourk', 'lifeInNewYourk', 1, '', '', '<div class="col-md-4">\r\n<div class="top-grid block" data-move-x="-500px" data-rotate="90deg"><a href="service"><img title="icon-name" alt="" src="../wtos-images/icon3.png" /></a>\r\n<h3>Fine &amp; Country</h3>\r\n<p>Are you selling a more exclusive property? The more expensive property demands a more extensive presentation....</p>\r\n<a class="button" href="service">Read More</a></div>\r\n</div>', 1, 26, '2016-01-19 01:55:26', 0, 0),
(5, 'Selling Your Home', 'sellingYourHome', 2, '', '', '<div class="col-md-4">\r\n<div class="top-grid block" data-move-x="500px" data-rotate="-90deg"><a href="service"><img title="icon-name" alt="" src="../wtos-images/TEN-ICON.png" /></a>\r\n<h3>MA Residential Letting</h3>\r\n<p>We like to keep things simple; we believe a successful agent will market your properties professionally....</p>\r\n<a class="button" href="service">Read More</a></div>\r\n</div>', 1, 26, '2016-01-19 01:56:21', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
