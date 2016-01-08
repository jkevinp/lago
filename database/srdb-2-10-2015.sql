-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2015 at 02:02 AM
-- Server version: 5.6.17-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `srdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middleName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contactnumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usergroupid` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `confirmationcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_email_unique` (`email`),
  UNIQUE KEY `account_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `title`, `firstname`, `middleName`, `lastName`, `email`, `contactnumber`, `username`, `password`, `usergroupid`, `active`, `confirmationcode`, `gender`, `remember_token`, `created_at`, `updated_at`) VALUES
('20150295123dbOvgF', 'MR', 'John kevin', 'De jesus', 'Peralta', 'bluegate_2006@yahoo.com', '09056057553', 'bluegate_2006@yahoo.com', '$2y$10$r8x2QFGA7wtYaGvk0OSskuGmB59smP.tYdSeQSsRixAfXXZ24GOYi', 2, 1, 'nAt3EJWa44kV9r2zebZQzv9o5nYbGpjL', 'male', NULL, '2015-02-08 11:37:13', '2015-02-08 11:37:52'),
('adminXJpnJOe6', 'MR', 'Admin', 'Of', 'Sunrock', 'mail.sunrock@gmail.com', '09056057553', 'mail.sunrock@gmail.com', '$2y$10$irrsG3Hsl2CY0W61mx/uoetZi2qRd3Kp/3X6nwYf/TA/I2f0W9AGK', 1, 1, 'Looll', '', NULL, '2015-02-08 11:15:44', '2015-02-08 11:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `bookingid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bookingreferenceid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bookingstart` date NOT NULL,
  `bookingend` date NOT NULL,
  `totalduration` int(11) NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `paymenttype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `confirmationcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`bookingid`),
  UNIQUE KEY `booking_bookingreferenceid_unique` (`bookingreferenceid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingid`, `bookingreferenceid`, `bookingstart`, `bookingend`, `totalduration`, `fee`, `paymenttype`, `account_id`, `active`, `confirmationcode`, `created_at`, `updated_at`) VALUES
('jEd20150209231024', 'JPzdcid', '2015-02-10', '2015-02-10', 1, '2100.00', 'half', '20150295123dbOvgF', 0, 'YbaRXsaPkYpnmrEWex6GWft9RwDrotG9', '2015-02-09 15:10:24', '2015-02-09 15:10:24'),
('m2V20150208193713', 'JPHTWX2', '2015-02-09', '2015-02-10', 1, '4200.00', 'half', '20150295123dbOvgF', 2, '3pWfpTcDUKpQ3OqHe1SS8Sv4bi8OAphI', '2015-02-08 11:37:13', '2015-02-08 19:19:38');

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE IF NOT EXISTS `booking_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bookingstart` datetime NOT NULL,
  `bookingend` datetime NOT NULL,
  `productid` int(11) NOT NULL,
  `productname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `bookingreferenceid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `temporary` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`id`, `time`, `bookingstart`, `bookingend`, `productid`, `productname`, `quantity`, `bookingreferenceid`, `temporary`, `created_at`, `updated_at`) VALUES
(3, '06', '2015-02-09 06:00:00', '2015-02-09 18:00:00', 20, 'Adult Admission Ticket', 10, 'm2V20150208193713', 0, '2015-02-08 11:36:52', '2015-02-08 11:37:13'),
(4, '06', '2015-02-09 06:00:00', '2015-02-09 18:00:00', 1, 'Diamond One', 1, 'm2V20150208193713', 0, '2015-02-08 11:36:52', '2015-02-08 11:37:13'),
(5, '06', '2015-02-09 06:00:00', '2015-02-09 18:00:00', 2, 'Diamond Two', 1, 'm2V20150208193713', 0, '2015-02-08 11:36:52', '2015-02-08 11:37:13'),
(6, '06', '2015-02-10 06:00:00', '2015-02-10 18:00:00', 20, 'Adult Admission Ticket', 1, 'jEd20150209231024', 0, '2015-02-09 15:07:00', '2015-02-09 15:10:24'),
(7, '06', '2015-02-10 06:00:00', '2015-02-10 18:00:00', 1, 'Diamond One', 1, 'jEd20150209231024', 0, '2015-02-09 15:07:00', '2015-02-09 15:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE IF NOT EXISTS `coupons` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `couponname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `couponcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discountbypercentage` decimal(10,2) NOT NULL DEFAULT '0.00',
  `discountbyvalue` decimal(10,2) NOT NULL DEFAULT '0.00',
  `feerequirement` decimal(10,2) NOT NULL DEFAULT '0.00',
  `active` int(11) NOT NULL DEFAULT '0',
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imagename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `directory` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `imagename`, `directory`, `description`, `created_at`, `updated_at`) VALUES
(1, 'default.jpg', 'http://localhost/default/img-uploads', '', '2015-02-08 11:15:44', '2015-02-08 11:15:44'),
(2, '1.jpg', 'http://localhost/default/img-uploads', '', '2015-02-08 11:15:44', '2015-02-08 11:15:44'),
(3, '2.jpg', 'http://localhost/default/img-uploads', '', '2015-02-08 11:15:44', '2015-02-08 11:15:44'),
(4, '3.jpg', 'http://localhost/default/img-uploads', '', '2015-02-08 11:15:45', '2015-02-08 11:15:45'),
(5, '4.jpg', 'http://localhost/default/img-uploads', '', '2015-02-08 11:15:45', '2015-02-08 11:15:45'),
(6, '5.jpg', 'http://localhost/default/img-uploads', '', '2015-02-08 11:15:45', '2015-02-08 11:15:45'),
(7, '6.jpg', 'http://localhost/default/img-uploads', '', '2015-02-08 11:15:45', '2015-02-08 11:15:45'),
(8, '7.jpg', 'http://localhost/default/img-uploads', '', '2015-02-08 11:15:45', '2015-02-08 11:15:45'),
(9, '8.jpg', 'http://localhost/default/img-uploads', '', '2015-02-08 11:15:45', '2015-02-08 11:15:45'),
(10, '9.jpg', 'http://localhost/default/img-uploads', '', '2015-02-08 11:15:45', '2015-02-08 11:15:45'),
(11, 'child.jpg', 'http://localhost/default/img-uploads', '', '2015-02-08 11:15:45', '2015-02-08 11:15:45'),
(12, 'adult.jpg', 'http://localhost/default/img-uploads', '', '2015-02-08 11:15:45', '2015-02-08 11:15:45'),
(13, 'gMqPQj3vbed.jpg', 'http://localhost/default/img-uploads', '', '2015-02-08 11:15:45', '2015-02-08 11:15:45');

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

CREATE TABLE IF NOT EXISTS `mails` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sendername` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senderemail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `receiveremail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `receivername` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mails`
--

INSERT INTO `mails` (`id`, `sendername`, `senderemail`, `receiveremail`, `receivername`, `subject`, `message`, `status`, `created_at`, `updated_at`) VALUES
('jVRBJ3288', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', 'New Reservation', 'A new reservation was booked.<br/> Booking id: jEd20150209231024<br/>Booked by: 20150295123dbOvgF', 5, '2015-02-09 15:10:37', '2015-02-09 15:10:37'),
('Rxzez3043', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', 'New Reservation', 'A new reservation was booked.<br/> Booking id: m2V20150208193713<br/>Booked by: 20150295123dbOvgF', 5, '2015-02-08 11:37:34', '2015-02-08 11:37:34'),
('Seus23964', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', 'New Reservation', 'A new reservation was booked.<br/> Booking id: jEd20150209231024<br/>Booked by: 20150295123dbOvgF', 5, '2015-02-09 15:10:42', '2015-02-09 15:10:42'),
('v80aH1671', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', 'New Reservation', 'A new reservation was booked.<br/> Booking id: m2V20150208193713<br/>Booked by: 20150295123dbOvgF', 5, '2015-02-08 11:37:26', '2015-02-08 11:37:26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_12_25_135937_create_booking_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `productname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productdesc` text COLLATE utf8_unicode_ci NOT NULL,
  `productprice` decimal(10,2) NOT NULL,
  `productquantity` int(11) NOT NULL,
  `fileid` int(11) NOT NULL,
  `producttypeid` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=61 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `productname`, `productdesc`, `productprice`, `productquantity`, `fileid`, `producttypeid`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Diamond One', 'Diamond 1 or D-1 can accomodate up to 4 - 6 person. With Aircondition, TV and Private Toilet.', '2000.00', 1, 2, 2, 1, '2015-02-08 11:15:39', '2015-02-08 11:15:39'),
(2, 'Diamond Two', 'Diamond-2 can accomodate up to 2 - 3 person. With Aircondition, TV and Toilet.', '1200.00', 1, 3, 2, 1, '2015-02-08 11:15:39', '2015-02-08 11:15:39'),
(3, 'Diamond Three', 'Diamond-3 can accomodate up to 2 - 3 person. With Aircondition, TV and Toilet.', '1300.00', 1, 3, 2, 1, '2015-02-08 11:15:39', '2015-02-08 11:15:39'),
(4, 'Diamond Four', 'Without Aircondition and Toilet.', '800.00', 1, 2, 2, 1, '2015-02-08 11:15:39', '2015-02-08 11:15:39'),
(5, 'Diamond Five', 'Without Aircondition and Toilet.', '800.00', 1, 3, 2, 1, '2015-02-08 11:15:40', '2015-02-08 11:15:40'),
(6, 'Diamond Six', 'Without Aircondition and Toilet.', '800.00', 1, 3, 2, 1, '2015-02-08 11:15:40', '2015-02-08 11:15:40'),
(7, 'Opal & Pearl', 'Opal or Perl can accomodate 2 person. With Aircondition, TV and Private Toilet.', '1200.00', 1, 4, 2, 1, '2015-02-08 11:15:40', '2015-02-08 11:15:40'),
(8, 'RUBY 1', 'Ruby 1 can accomodate 2 person. With Aircondition, TV and Private Toilet.', '1500.00', 1, 5, 2, 1, '2015-02-08 11:15:40', '2015-02-08 11:15:40'),
(9, 'RUBY 2', 'Ruby 2 can accomodate 2 person. With Aircondition, TV and Private Toilet.', '1500.00', 1, 5, 2, 1, '2015-02-08 11:15:40', '2015-02-08 11:15:40'),
(10, 'RUBY 3', 'Ruby 3 can accomodate 2 person. With Aircondition, TV and Private Toilet w/ Hot Shower.', '1800.00', 1, 6, 2, 1, '2015-02-08 11:15:40', '2015-02-08 11:15:40'),
(11, 'RUBY 4', 'Ruby 4 can accomodate 2 person. With Aircondition, TV and Private Toilet w/ Hot Shower.', '1800.00', 1, 6, 1, 1, '2015-02-08 11:15:40', '2015-02-08 11:15:40'),
(12, 'RUBY 5', 'Ruby 5 can accomodate 4 - 6 person. With Aircondition, TV and Private Toilet w/ Hot Shower & Jacuzzi.', '3500.00', 1, 7, 2, 1, '2015-02-08 11:15:40', '2015-02-08 11:15:40'),
(13, 'RUBY 6', 'Ruby 6 can accomodate 4 - 6 person. With Aircondition, TV and Private Toilet w/ Hot Shower & Jacuzzi.', '3500.00', 1, 7, 2, 1, '2015-02-08 11:15:40', '2015-02-08 11:15:40'),
(14, 'Ruby Seminar Room', 'Ruby Seminar Room can accomodate 80 - 100 person.', '6500.00', 1, 7, 2, 1, '2015-02-08 11:15:40', '2015-02-08 11:15:40'),
(15, 'Sapphire', 'Sapphire can accomodate 80 - 100 person.', '3500.00', 1, 7, 2, 1, '2015-02-08 11:15:40', '2015-02-08 11:15:40'),
(16, 'TOPAZ 1 UPPER', 'Topaz 1 can accomodate 2 - 15 person. With Aircondition, TV, Private Toilet and Kitchen. Topaz room is good for those who conduct there retreat.', '4000.00', 1, 8, 2, 1, '2015-02-08 11:15:40', '2015-02-08 11:15:40'),
(17, 'TOPAZ 2 LOWER', 'Topaz 1 can accomodate 2 - 15 person. With Aircondition, TV, Private Toilet and Kitchen. Topaz room is good for those who conduct there retreat.', '3500.00', 1, 9, 2, 1, '2015-02-08 11:15:40', '2015-02-08 11:15:40'),
(18, 'MULTI-PURPOSE', 'Mutli-Purpose can accomodate 80 - 150 person. Its good for kids party and Wedding Venue.', '6000.00', 1, 10, 2, 1, '2015-02-08 11:15:40', '2015-02-08 11:15:40'),
(19, 'Children Admission Ticket', 'Fee for children.', '100.00', 1, 11, 3, 1, '2015-02-08 11:15:40', '2015-02-08 11:15:40'),
(20, 'Adult Admission Ticket', 'Fee for adults.', '130.00', 1, 12, 3, 1, '2015-02-08 11:15:41', '2015-02-08 11:15:41'),
(21, 'Night Rate Children Admission Ticket', 'Night rate Fee for children', '120.00', 1, 11, 3, 1, '2015-02-08 11:15:41', '2015-02-08 11:15:41'),
(22, 'Night Rate Adult Admission Ticket', 'Night rate Fee for adults. ', '150.00', 1, 12, 3, 1, '2015-02-08 11:15:41', '2015-02-08 11:15:41'),
(23, 'Extra Bed', 'A comfortable bed for rentals.', '200.00', 1, 13, 4, 1, '2015-02-08 11:15:41', '2015-02-08 11:15:41'),
(24, 'Concrete Round tables', '4-6 Persons.', '300.00', 1, 10, 1, 1, '2015-02-08 11:15:41', '2015-02-08 11:15:41'),
(25, 'Concrete Square tables', '4-6 Persons.', '350.00', 1, 10, 1, 1, '2015-02-08 11:15:41', '2015-02-08 11:15:41'),
(26, 'Cottage #1', '20 Persons.', '1800.00', 1, 10, 1, 1, '2015-02-08 11:15:41', '2015-02-08 11:15:41'),
(27, 'Cottage #2', '18 Persons.', '1200.00', 1, 10, 1, 1, '2015-02-08 11:15:41', '2015-02-08 11:15:41'),
(28, 'Cottage #3', '18 Persons.', '1200.00', 1, 10, 1, 1, '2015-02-08 11:15:41', '2015-02-08 11:15:41'),
(29, 'Cottage #4', '10 Persons.', '600.00', 1, 10, 1, 1, '2015-02-08 11:15:41', '2015-02-08 11:15:41'),
(30, 'Cottage #5', '10 Persons.', '600.00', 1, 10, 1, 1, '2015-02-08 11:15:41', '2015-02-08 11:15:41'),
(31, 'Cottage #6', '10 Persons.', '600.00', 1, 10, 1, 1, '2015-02-08 11:15:41', '2015-02-08 11:15:41'),
(32, 'Cottage #7', '10 Persons.', '600.00', 1, 10, 1, 1, '2015-02-08 11:15:41', '2015-02-08 11:15:41'),
(33, 'Cottage #8', '10 Persons.', '600.00', 1, 10, 1, 1, '2015-02-08 11:15:41', '2015-02-08 11:15:41'),
(34, 'Cottage #9', '15 Persons. With Grill and faucet.', '1000.00', 1, 10, 1, 1, '2015-02-08 11:15:41', '2015-02-08 11:15:41'),
(35, 'Cottage #10', '15 Persons. With Grill and faucet.', '1000.00', 1, 10, 1, 1, '2015-02-08 11:15:41', '2015-02-08 11:15:41'),
(36, 'Cottage #11', '15 Persons. With Grill and faucet.', '1000.00', 1, 10, 1, 1, '2015-02-08 11:15:41', '2015-02-08 11:15:41'),
(37, 'Cottage #12', '18 Persons.', '1200.00', 1, 10, 1, 1, '2015-02-08 11:15:42', '2015-02-08 11:15:42'),
(38, 'Cottage Swing #13', '4 Persons.', '400.00', 1, 10, 1, 1, '2015-02-08 11:15:42', '2015-02-08 11:15:42'),
(39, 'Cottage #14', '20 Persons. Overlooking with grill and faucet.', '1500.00', 1, 10, 1, 1, '2015-02-08 11:15:42', '2015-02-08 11:15:42'),
(40, 'Cottage #15', '20 Persons. Overlooking with grill and faucet.', '1500.00', 1, 10, 1, 1, '2015-02-08 11:15:42', '2015-02-08 11:15:42'),
(41, 'Cottage #16', '20 Persons. Overlooking with grill and faucet.', '1500.00', 1, 10, 1, 1, '2015-02-08 11:15:42', '2015-02-08 11:15:42'),
(42, 'Cottage #17', '14-16 persons.', '700.00', 1, 10, 1, 1, '2015-02-08 11:15:42', '2015-02-08 11:15:42'),
(43, 'Cottage #18', '14-16 persons.', '700.00', 1, 10, 1, 1, '2015-02-08 11:15:42', '2015-02-08 11:15:42'),
(44, 'Cottage #19', '14-16 persons.', '700.00', 1, 10, 1, 1, '2015-02-08 11:15:42', '2015-02-08 11:15:42'),
(45, 'Calleza Type tables #20', '10 persons.', '700.00', 1, 10, 1, 1, '2015-02-08 11:15:42', '2015-02-08 11:15:42'),
(46, 'Calleza Type tables #21', '10 persons.', '700.00', 1, 10, 1, 1, '2015-02-08 11:15:42', '2015-02-08 11:15:42'),
(47, 'Cottage #22', '8 persons.', '500.00', 1, 10, 1, 1, '2015-02-08 11:15:42', '2015-02-08 11:15:42'),
(48, 'Cottage #23', '15 persons.', '800.00', 1, 10, 1, 1, '2015-02-08 11:15:42', '2015-02-08 11:15:42'),
(49, 'Cottage #24', '15 persons.', '800.00', 1, 10, 1, 1, '2015-02-08 11:15:42', '2015-02-08 11:15:42'),
(50, 'Concrete Tables #25', '10 persons.', '700.00', 1, 10, 1, 1, '2015-02-08 11:15:42', '2015-02-08 11:15:42'),
(51, 'Calleza Type table #26', '6 persons.', '500.00', 1, 10, 1, 1, '2015-02-08 11:15:42', '2015-02-08 11:15:42'),
(52, 'Calleza Type tables #27', '10 persons.', '700.00', 1, 10, 1, 1, '2015-02-08 11:15:42', '2015-02-08 11:15:42'),
(53, 'Concrete Tables #28', '10 persons.', '700.00', 1, 10, 1, 1, '2015-02-08 11:15:43', '2015-02-08 11:15:43'),
(54, 'Upper Cottage #29', '20-22 persons.', '1800.00', 1, 10, 1, 1, '2015-02-08 11:15:43', '2015-02-08 11:15:43'),
(55, 'Upper Cottage #30', '20-22 persons.', '1800.00', 1, 10, 1, 1, '2015-02-08 11:15:43', '2015-02-08 11:15:43'),
(56, 'Upper Cottage #31', '20-22 persons.', '1800.00', 1, 10, 1, 1, '2015-02-08 11:15:43', '2015-02-08 11:15:43'),
(57, 'Cottage #32', '18 persons.', '1000.00', 1, 10, 1, 1, '2015-02-08 11:15:43', '2015-02-08 11:15:43'),
(58, 'Cottage #33', '18 persons.', '1000.00', 1, 10, 1, 1, '2015-02-08 11:15:43', '2015-02-08 11:15:43'),
(59, 'Gazebo', '35 persons. With faucet and grill.', '2500.00', 1, 10, 1, 1, '2015-02-08 11:15:43', '2015-02-08 11:15:43'),
(60, 'Tree House', '25 persons.', '2500.00', 1, 10, 1, 1, '2015-02-08 11:15:43', '2015-02-08 11:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE IF NOT EXISTS `product_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `producttypename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`id`, `producttypename`, `created_at`, `updated_at`) VALUES
(1, 'Cottages', '2015-02-08 11:15:45', '2015-02-08 11:15:45'),
(2, 'Rooms', '2015-02-08 11:15:46', '2015-02-08 11:15:46'),
(3, 'Admission', '2015-02-08 11:15:46', '2015-02-08 11:15:46'),
(4, 'Others', '2015-02-08 11:15:46', '2015-02-08 11:15:46');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bookingid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `modeofpayment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codeprovided` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bankname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `downpayment` decimal(10,2) NOT NULL,
  `payeremail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'created',
  `notes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `totalbill` decimal(10,2) NOT NULL,
  `discountedbill` decimal(10,2) DEFAULT NULL,
  `couponcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `paymenttype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `transactions_codeprovided_unique` (`codeprovided`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `account_id`, `bookingid`, `modeofpayment`, `codeprovided`, `bankname`, `downpayment`, `payeremail`, `status`, `notes`, `totalbill`, `discountedbill`, `couponcode`, `created_at`, `updated_at`, `paymenttype`) VALUES
('20150208mEY4ZHJ29rRzM9bEF1aLRAl9nKZrZBZKVCG08TsLy4gjT', '20150295123dbOvgF', 'm2V20150208193713', 'bank', '1234ABCD5f53', 'BPI', '2100.00', 'bluegate_2006@yahoo.com', 'confirmed', 'Please reply asap', '4200.00', NULL, NULL, '2015-02-08 11:38:31', '2015-02-08 19:19:38', 'half');

-- --------------------------------------------------------

--
-- Table structure for table `usergroup`
--

CREATE TABLE IF NOT EXISTS `usergroup` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usergroupname` text COLLATE utf8_unicode_ci NOT NULL,
  `usergroupauth` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `usergroup`
--

INSERT INTO `usergroup` (`id`, `usergroupname`, `usergroupauth`) VALUES
(1, 'staff', 3),
(2, 'user', 2),
(3, 'admin', 1);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `AutoDelete` ON SCHEDULE EVERY 1 MINUTE STARTS '2015-01-25 16:18:49' ON COMPLETION NOT PRESERVE ENABLE DO DELETE from booking_details where created_at < DATE_SUB(NOW(),INTERVAL 15 MINUTE) and temporary ='1'$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
