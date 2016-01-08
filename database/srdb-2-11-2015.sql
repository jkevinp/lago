-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2015 at 05:24 AM
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
('201502363556t9Ixyo', 'MR', 'Mary Jane', 'Martinez', 'Alfonso', 'xnalimits@gmail.com', '000000000', 'xnalimits@gmail.com', '$2y$10$aeaY2e7wuFD2TyWh35.UnuIbkeAd97bKKTqzhxZn9w.i4K5Ck8xgG', 2, 1, 'RqDvfjK6OIkfaBHaezVCw8nLNYXwboVF', 'male', NULL, '2015-02-10 15:06:21', '2015-02-10 15:07:01'),
('20150256610Vd2c1U', 'MR', 'John Kevin', 'De Jesus', 'Peralta', 'bluegate_20061@yahoo.com', '09056057553', 'bluegate_20061@yahoo.com', 'JPeraltaCzv', 2, 1, 'c5kwDNyCkzkeM5mKexcTOXtUJtjNUJY5', 'male', NULL, '2015-02-10 17:31:33', '2015-02-10 17:31:33'),
('201502903107w2vP8K', 'MR', 'John Kevin', 'De Jesus', 'Peralta', 'bluegate_2006@yahoo.com', '09056057553', 'bluegate_2006@yahoo.com', '$2y$10$1WQRozdelgXgqmtS9nJc7ehW2ZU3HrpfeMWv7eib9DB.KiqpUePuW', 2, 1, 'pQF1aHZpQZkncNEoebWn2jCN0CPALAYC', 'male', 'TSLRQV76yRDaT3YhG5tBiIIP35wQrwUpxfCz72da8SrQU3LNf1E4CkHt50DD', '2015-02-09 17:46:40', '2015-02-10 14:38:12'),
('201502937867lVpN9i', 'MR', 'John Kevin', 'De Jesus', 'Peralta', 'bluegate_20016@yahoo.com', '09056057553', 'bluegate_20016@yahoo.com', 'JPeralta1Wo', 2, 1, 'PuTS1OCAoJk4Th3mes4ECz6JU4Fnx7Kr', 'male', NULL, '2015-02-10 17:32:03', '2015-02-10 17:32:03'),
('admindVnqNx85', 'MR', 'Admin', 'Of', 'Sunrock', 'mail.sunrock@gmail.com', '09056057553', 'mail.sunrock@gmail.com', '$2y$10$OT1RXxTTTGlS5CcNRr4ISe.lhbD6OwgTO3b/SDaoFcUlLSQfnbYqW', 1, 1, 'Looll', '', 'dqZdilkEYkrgosSoxzDTnpEEfJ1bAfkBELS46XKlQUK4hYXEyoBGiLK5jsSx', '2015-02-09 17:10:20', '2015-02-10 17:26:58');

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
('bt220150210230621', 'MAmq9VS', '2015-02-11', '2015-02-14', 1, '2150.00', 'half', '201502363556t9Ixyo', 4, '0OgUbHgyOdp8ZglHeKF0FDRXmUhsj3q0', '2015-02-10 15:06:21', '2015-02-10 17:20:07'),
('GTB20150210224223', 'JPNVEfb', '2015-02-11', '2015-02-13', 1, '2230.00', 'half', '201502903107w2vP8K', 6, 'l9MdvXYW0npd0OyCe1KgOBxhPK9UtSk0', '2015-02-10 14:42:23', '2015-02-10 17:22:12');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`id`, `time`, `bookingstart`, `bookingend`, `productid`, `productname`, `quantity`, `bookingreferenceid`, `temporary`, `created_at`, `updated_at`) VALUES
(13, '06', '2015-02-11 06:00:00', '2015-02-11 18:00:00', 20, 'Adult Admission Ticket', 1, 'LNGtXHBqc6q6xwkRKXf0mM52Zwj5XGDo04oy6H8x', 1, '2015-02-10 17:27:40', '2015-02-10 17:27:40'),
(14, '06', '2015-02-11 06:00:00', '2015-02-11 18:00:00', 1, 'Diamond One', 1, 'LNGtXHBqc6q6xwkRKXf0mM52Zwj5XGDo04oy6H8x', 1, '2015-02-10 17:27:40', '2015-02-10 17:27:40');

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
(1, 'default.jpg', 'http://localhost/default/img-uploads', '', '2015-02-09 17:10:21', '2015-02-09 17:10:21'),
(2, '1.jpg', 'http://localhost/default/img-uploads', '', '2015-02-09 17:10:21', '2015-02-09 17:10:21'),
(3, '2.jpg', 'http://localhost/default/img-uploads', '', '2015-02-09 17:10:21', '2015-02-09 17:10:21'),
(4, '3.jpg', 'http://localhost/default/img-uploads', '', '2015-02-09 17:10:21', '2015-02-09 17:10:21'),
(5, '4.jpg', 'http://localhost/default/img-uploads', '', '2015-02-09 17:10:21', '2015-02-09 17:10:21'),
(6, '5.jpg', 'http://localhost/default/img-uploads', '', '2015-02-09 17:10:21', '2015-02-09 17:10:21'),
(7, '6.jpg', 'http://localhost/default/img-uploads', '', '2015-02-09 17:10:21', '2015-02-09 17:10:21'),
(8, '7.jpg', 'http://localhost/default/img-uploads', '', '2015-02-09 17:10:21', '2015-02-09 17:10:21'),
(9, '8.jpg', 'http://localhost/default/img-uploads', '', '2015-02-09 17:10:21', '2015-02-09 17:10:21'),
(10, '9.jpg', 'http://localhost/default/img-uploads', '', '2015-02-09 17:10:21', '2015-02-09 17:10:21'),
(11, 'child.jpg', 'http://localhost/default/img-uploads', '', '2015-02-09 17:10:21', '2015-02-09 17:10:21'),
(12, 'adult.jpg', 'http://localhost/default/img-uploads', '', '2015-02-09 17:10:21', '2015-02-09 17:10:21'),
(13, 'gMqPQj3vbed.jpg', 'http://localhost/default/img-uploads', '', '2015-02-09 17:10:21', '2015-02-09 17:10:21');

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
('yp0t94108', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', 'New Reservation', 'A new reservation was booked.<br/> Booking id: pH020150210222905<br/>Booked by: 201502903107w2vP8K', 5, '2015-02-10 14:29:16', '2015-02-10 14:29:16');

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
(1, 'Diamond One', 'Diamond 1 or D-1 can accomodate up to 4 - 6 person. With Aircondition, TV and Private Toilet.', '2000.00', 1, 2, 2, 1, '2015-02-09 17:10:15', '2015-02-09 17:10:15'),
(2, 'Diamond Two', 'Diamond-2 can accomodate up to 2 - 3 person. With Aircondition, TV and Toilet.', '1200.00', 1, 3, 2, 1, '2015-02-09 17:10:15', '2015-02-09 17:10:15'),
(3, 'Diamond Three', 'Diamond-3 can accomodate up to 2 - 3 person. With Aircondition, TV and Toilet.', '1300.00', 1, 3, 2, 1, '2015-02-09 17:10:15', '2015-02-09 17:10:15'),
(4, 'Diamond Four', 'Without Aircondition and Toilet.', '800.00', 1, 2, 2, 1, '2015-02-09 17:10:16', '2015-02-09 17:10:16'),
(5, 'Diamond Five', 'Without Aircondition and Toilet.', '800.00', 1, 3, 2, 1, '2015-02-09 17:10:16', '2015-02-09 17:10:16'),
(6, 'Diamond Six', 'Without Aircondition and Toilet.', '800.00', 1, 3, 2, 1, '2015-02-09 17:10:16', '2015-02-09 17:10:16'),
(7, 'Opal & Pearl', 'Opal or Perl can accomodate 2 person. With Aircondition, TV and Private Toilet.', '1200.00', 1, 4, 2, 1, '2015-02-09 17:10:16', '2015-02-09 17:10:16'),
(8, 'RUBY 1', 'Ruby 1 can accomodate 2 person. With Aircondition, TV and Private Toilet.', '1500.00', 1, 5, 2, 1, '2015-02-09 17:10:16', '2015-02-09 17:10:16'),
(9, 'RUBY 2', 'Ruby 2 can accomodate 2 person. With Aircondition, TV and Private Toilet.', '1500.00', 1, 5, 2, 1, '2015-02-09 17:10:16', '2015-02-09 17:10:16'),
(10, 'RUBY 3', 'Ruby 3 can accomodate 2 person. With Aircondition, TV and Private Toilet w/ Hot Shower.', '1800.00', 1, 6, 2, 1, '2015-02-09 17:10:16', '2015-02-09 17:10:16'),
(11, 'RUBY 4', 'Ruby 4 can accomodate 2 person. With Aircondition, TV and Private Toilet w/ Hot Shower.', '1800.00', 1, 6, 1, 1, '2015-02-09 17:10:16', '2015-02-09 17:10:16'),
(12, 'RUBY 5', 'Ruby 5 can accomodate 4 - 6 person. With Aircondition, TV and Private Toilet w/ Hot Shower & Jacuzzi.', '3500.00', 1, 7, 2, 1, '2015-02-09 17:10:16', '2015-02-09 17:10:16'),
(13, 'RUBY 6', 'Ruby 6 can accomodate 4 - 6 person. With Aircondition, TV and Private Toilet w/ Hot Shower & Jacuzzi.', '3500.00', 1, 7, 2, 1, '2015-02-09 17:10:16', '2015-02-09 17:10:16'),
(14, 'Ruby Seminar Room', 'Ruby Seminar Room can accomodate 80 - 100 person.', '6500.00', 1, 7, 2, 1, '2015-02-09 17:10:16', '2015-02-09 17:10:16'),
(15, 'Sapphire', 'Sapphire can accomodate 80 - 100 person.', '3500.00', 1, 7, 2, 1, '2015-02-09 17:10:16', '2015-02-09 17:10:16'),
(16, 'TOPAZ 1 UPPER', 'Topaz 1 can accomodate 2 - 15 person. With Aircondition, TV, Private Toilet and Kitchen. Topaz room is good for those who conduct there retreat.', '4000.00', 1, 8, 2, 1, '2015-02-09 17:10:16', '2015-02-09 17:10:16'),
(17, 'TOPAZ 2 LOWER', 'Topaz 1 can accomodate 2 - 15 person. With Aircondition, TV, Private Toilet and Kitchen. Topaz room is good for those who conduct there retreat.', '3500.00', 1, 9, 2, 1, '2015-02-09 17:10:16', '2015-02-09 17:10:16'),
(18, 'MULTI-PURPOSE', 'Mutli-Purpose can accomodate 80 - 150 person. Its good for kids party and Wedding Venue.', '6000.00', 1, 10, 2, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17'),
(19, 'Children Admission Ticket', 'Fee for children.', '100.00', 999, 11, 3, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17'),
(20, 'Adult Admission Ticket', 'Fee for adults.', '130.00', 999, 12, 3, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17'),
(21, 'Night Rate Children Admission Ticket', 'Night rate Fee for children', '120.00', 999, 11, 3, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17'),
(22, 'Night Rate Adult Admission Ticket', 'Night rate Fee for adults. ', '150.00', 999, 12, 3, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17'),
(23, 'Extra Bed', 'A comfortable bed for rentals.', '200.00', 999, 13, 4, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17'),
(24, 'Concrete Round tables', '4-6 Persons.', '300.00', 1, 10, 1, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17'),
(25, 'Concrete Square tables', '4-6 Persons.', '350.00', 1, 10, 1, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17'),
(26, 'Cottage #1', '20 Persons.', '1800.00', 1, 10, 1, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17'),
(27, 'Cottage #2', '18 Persons.', '1200.00', 1, 10, 1, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17'),
(28, 'Cottage #3', '18 Persons.', '1200.00', 1, 10, 1, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17'),
(29, 'Cottage #4', '10 Persons.', '600.00', 1, 10, 1, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17'),
(30, 'Cottage #5', '10 Persons.', '600.00', 1, 10, 1, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17'),
(31, 'Cottage #6', '10 Persons.', '600.00', 1, 10, 1, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17'),
(32, 'Cottage #7', '10 Persons.', '600.00', 1, 10, 1, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17'),
(33, 'Cottage #8', '10 Persons.', '600.00', 1, 10, 1, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17'),
(34, 'Cottage #9', '15 Persons. With Grill and faucet.', '1000.00', 1, 10, 1, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17'),
(35, 'Cottage #10', '15 Persons. With Grill and faucet.', '1000.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18'),
(36, 'Cottage #11', '15 Persons. With Grill and faucet.', '1000.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18'),
(37, 'Cottage #12', '18 Persons.', '1200.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18'),
(38, 'Cottage Swing #13', '4 Persons.', '400.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18'),
(39, 'Cottage #14', '20 Persons. Overlooking with grill and faucet.', '1500.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18'),
(40, 'Cottage #15', '20 Persons. Overlooking with grill and faucet.', '1500.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18'),
(41, 'Cottage #16', '20 Persons. Overlooking with grill and faucet.', '1500.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18'),
(42, 'Cottage #17', '14-16 persons.', '700.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18'),
(43, 'Cottage #18', '14-16 persons.', '700.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18'),
(44, 'Cottage #19', '14-16 persons.', '700.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18'),
(45, 'Calleza Type tables #20', '10 persons.', '700.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18'),
(46, 'Calleza Type tables #21', '10 persons.', '700.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18'),
(47, 'Cottage #22', '8 persons.', '500.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18'),
(48, 'Cottage #23', '15 persons.', '800.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18'),
(49, 'Cottage #24', '15 persons.', '800.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18'),
(50, 'Concrete Tables #25', '10 persons.', '700.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18'),
(51, 'Calleza Type table #26', '6 persons.', '500.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18'),
(52, 'Calleza Type tables #27', '10 persons.', '700.00', 1, 10, 1, 1, '2015-02-09 17:10:19', '2015-02-09 17:10:19'),
(53, 'Concrete Tables #28', '10 persons.', '700.00', 1, 10, 1, 1, '2015-02-09 17:10:19', '2015-02-09 17:10:19'),
(54, 'Upper Cottage #29', '20-22 persons.', '1800.00', 1, 10, 1, 1, '2015-02-09 17:10:19', '2015-02-09 17:10:19'),
(55, 'Upper Cottage #30', '20-22 persons.', '1800.00', 1, 10, 1, 1, '2015-02-09 17:10:19', '2015-02-09 17:10:19'),
(56, 'Upper Cottage #31', '20-22 persons.', '1800.00', 1, 10, 1, 1, '2015-02-09 17:10:19', '2015-02-09 17:10:19'),
(57, 'Cottage #32', '18 persons.', '1000.00', 1, 10, 1, 1, '2015-02-09 17:10:19', '2015-02-09 17:10:19'),
(58, 'Cottage #33', '18 persons.', '1000.00', 1, 10, 1, 1, '2015-02-09 17:10:19', '2015-02-09 17:10:19'),
(59, 'Gazebo', '35 persons. With faucet and grill.', '2500.00', 1, 10, 1, 1, '2015-02-09 17:10:19', '2015-02-09 17:10:19'),
(60, 'Tree House', '25 persons.', '2500.00', 1, 10, 1, 1, '2015-02-09 17:10:19', '2015-02-09 17:10:19');

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
(1, 'Cottages', '2015-02-09 17:10:22', '2015-02-09 17:10:22'),
(2, 'Rooms', '2015-02-09 17:10:22', '2015-02-09 17:10:22'),
(3, 'Admission', '2015-02-09 17:10:22', '2015-02-09 17:10:22'),
(4, 'Others', '2015-02-09 17:10:22', '2015-02-09 17:10:22');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transactionid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productid` int(11) NOT NULL,
  `productquantity` int(11) NOT NULL,
  `productprice` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `totalprice` decimal(10,2) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bookingid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cartid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `transactionid`, `productid`, `productquantity`, `productprice`, `created_at`, `updated_at`, `totalprice`, `type`, `bookingid`, `cartid`) VALUES
('201502106170TiJjzj', 'ggDBAF6PY4lPMsUadx3yW692POOqheiP7Xmdn6Fh', 1, 1, '2000.00', '2015-02-10 15:18:29', '2015-02-10 15:18:29', '2000.00', 'extend', '', '201502250671t1Wit5'),
('201502114929fjPmOF', '20150210euuoPrY4rq3261CarlAkUIRLXL5flcwW93ObUrvNQmWnH', 20, 1, '65.00', '2015-02-10 15:03:25', '2015-02-10 15:03:25', '65.00', 'reservation-half', '', '20150249346Qebe1a'),
('201502191864jkV5cX', 'ggDBAF6PY4lPMsUadx3yW692POOqheiP7Xmdn6Fh', 1, 1, '2000.00', '2015-02-10 15:22:34', '2015-02-10 15:22:34', '2000.00', 'extend', '', '201502218200pmjMba'),
('201502192230RJigd1', 'ggDBAF6PY4lPMsUadx3yW692POOqheiP7Xmdn6Fh', 1, 1, '166.67', '2015-02-10 15:34:32', '2015-02-10 15:34:32', '166.67', 'extend', '', '201502286438cYFv5g'),
('201502192413E7fNvi', 'ggDBAF6PY4lPMsUadx3yW692POOqheiP7Xmdn6Fh', 1, 1, '2000.00', '2015-02-10 15:25:19', '2015-02-10 15:25:19', '2000.00', 'extend', '', '201502320556GHwB1T'),
('201502194183JvsF73', '20150210euuoPrY4rq3261CarlAkUIRLXL5flcwW93ObUrvNQmWnH', 19, 1, '50.00', '2015-02-10 15:01:30', '2015-02-10 15:01:30', '50.00', 'reservation-half', '', '201502264313CfSGkI'),
('201502212036Rdmx8O', '20150210euuoPrY4rq3261CarlAkUIRLXL5flcwW93ObUrvNQmWnH', 1, 1, '1000.00', '2015-02-10 15:03:25', '2015-02-10 15:03:25', '1000.00', 'reservation-half', '', '20150249346Qebe1a'),
('201502230652q3iXR4', 'ggDBAF6PY4lPMsUadx3yW692POOqheiP7Xmdn6Fh', 1, 1, '2000.00', '2015-02-10 16:54:22', '2015-02-10 16:54:22', '2000.00', 'extend', '', '201502612335nsDUUq'),
('201502264587HW0Lg9', '20150210euuoPrY4rq3261CarlAkUIRLXL5flcwW93ObUrvNQmWnH', 20, 1, '65.00', '2015-02-10 15:00:48', '2015-02-10 15:00:48', '65.00', 'reservation-half', '', '201502602326yBATYY'),
('201502277069iIzez6', 'ggDBAF6PY4lPMsUadx3yW692POOqheiP7Xmdn6Fh', 1, 1, '166.67', '2015-02-10 15:34:59', '2015-02-10 15:34:59', '166.67', 'extend', '', '201502761414E5C5sL'),
('201502292267wXgEMh', 'ggDBAF6PY4lPMsUadx3yW692POOqheiP7Xmdn6Fh', 1, 1, '2000.00', '2015-02-10 15:21:39', '2015-02-10 15:21:39', '2000.00', 'extend', '', '2015025932621k2Nzi'),
('201502322967Q7sJ6l', 'ggDBAF6PY4lPMsUadx3yW692POOqheiP7Xmdn6Fh', 1, 1, '4000.00', '2015-02-10 16:33:57', '2015-02-10 16:33:57', '4000.00', 'extend', '', '2015026471562svKbI'),
('2015023302319nj3o6', '20150210euuoPrY4rq3261CarlAkUIRLXL5flcwW93ObUrvNQmWnH', 22, 1, '75.00', '2015-02-10 15:07:51', '2015-02-10 15:07:51', '75.00', 'reservation-half', '', '201502333862I7QlQm'),
('201502340484Dx13zv', 'ggDBAF6PY4lPMsUadx3yW692POOqheiP7Xmdn6Fh', 1, 1, '2000.00', '2015-02-10 15:33:50', '2015-02-10 15:33:50', '2000.00', 'extend', '', '201502244507hVA8IE'),
('201502364593oE8hps', 'ggDBAF6PY4lPMsUadx3yW692POOqheiP7Xmdn6Fh', 1, 1, '2000.00', '2015-02-10 15:24:26', '2015-02-10 15:24:26', '2000.00', 'extend', '', '20150270129ErebL9'),
('201502368317R2lPjO', 'ggDBAF6PY4lPMsUadx3yW692POOqheiP7Xmdn6Fh', 1, 1, '2000.00', '2015-02-10 15:23:24', '2015-02-10 15:23:24', '2000.00', 'extend', '', '201502430542DlMSIU'),
('201502396484If395G', 'ggDBAF6PY4lPMsUadx3yW692POOqheiP7Xmdn6Fh', 1, 1, '2000.00', '2015-02-10 15:13:54', '2015-02-10 15:13:54', '2000.00', 'extend', '', '20150284579534KaNa'),
('201502418762gwRslf', '20150210euuoPrY4rq3261CarlAkUIRLXL5flcwW93ObUrvNQmWnH', 1, 1, '1000.00', '2015-02-10 15:07:51', '2015-02-10 15:07:51', '1000.00', 'reservation-half', '', '201502333862I7QlQm'),
('2015024475711jdhQk', 'ggDBAF6PY4lPMsUadx3yW692POOqheiP7Xmdn6Fh', 1, 1, '2000.00', '2015-02-10 15:16:05', '2015-02-10 15:16:05', '2000.00', 'extend', '', '201502364899swZfKP'),
('201502460327veILSy', 'ggDBAF6PY4lPMsUadx3yW692POOqheiP7Xmdn6Fh', 1, 1, '2000.00', '2015-02-10 15:15:29', '2015-02-10 15:15:29', '2000.00', 'extend', '', '20150275164JYumAa'),
('201502498016BHf4bL', '20150210euuoPrY4rq3261CarlAkUIRLXL5flcwW93ObUrvNQmWnH', 19, 1, '50.00', '2015-02-10 15:00:48', '2015-02-10 15:00:48', '50.00', 'reservation-half', '', '201502602326yBATYY'),
('201502527313DMli7c', 'ggDBAF6PY4lPMsUadx3yW692POOqheiP7Xmdn6Fh', 1, 1, '2000.00', '2015-02-10 15:33:36', '2015-02-10 15:33:36', '2000.00', 'extend', '', '201502723572yoks3m'),
('201502543457afYVY8', '20150210euuoPrY4rq3261CarlAkUIRLXL5flcwW93ObUrvNQmWnH', 1, 1, '1000.00', '2015-02-10 15:04:14', '2015-02-10 15:04:14', '1000.00', 'reservation-half', '', '201502426178Mbiip9'),
('201502565033IQClva', '20150210euuoPrY4rq3261CarlAkUIRLXL5flcwW93ObUrvNQmWnH', 19, 1, '50.00', '2015-02-10 15:04:14', '2015-02-10 15:04:14', '50.00', 'reservation-half', '', '201502426178Mbiip9'),
('2015026070565STolW', 'ggDBAF6PY4lPMsUadx3yW692POOqheiP7Xmdn6Fh', 1, 1, '2000.00', '2015-02-10 15:27:07', '2015-02-10 15:27:07', '2000.00', 'extend', '', '20150282244qWBXSg'),
('201502612915DlIsNh', '20150210euuoPrY4rq3261CarlAkUIRLXL5flcwW93ObUrvNQmWnH', 1, 1, '1000.00', '2015-02-10 17:02:51', '2015-02-10 17:02:51', '1000.00', 'reservation-half', '', '201502174041SjMuxc'),
('201502682556JH4MbB', '20150210RepHdwvLMJohka9dNtybCRJBgYlJJAWehSMDdLQppTsCu', 1, 1, '1000.00', '2015-02-10 17:13:32', '2015-02-10 17:13:32', '1000.00', 'reservation-half', '', '201502817170guViLk'),
('20150269488Zlza9o', '20150210RepHdwvLMJohka9dNtybCRJBgYlJJAWehSMDdLQppTsCu', 1, 1, '1000.00', '2015-02-10 16:53:00', '2015-02-10 16:53:00', '1000.00', 'reservation-half', '', '201502748902i6tvEQ'),
('201502726471wiJfUs', 'ggDBAF6PY4lPMsUadx3yW692POOqheiP7Xmdn6Fh', 1, 1, '4000.00', '2015-02-10 15:13:27', '2015-02-10 15:13:27', '4000.00', 'extend', '', '201502166626wFSEMc'),
('201502733399628PT8', '20150210RepHdwvLMJohka9dNtybCRJBgYlJJAWehSMDdLQppTsCu', 1, 1, '1000.00', '2015-02-10 17:08:40', '2015-02-10 17:08:40', '1000.00', 'reservation-half', '', '201502624115EAHmbr'),
('201502752014ZRTYHz', '20150210euuoPrY4rq3261CarlAkUIRLXL5flcwW93ObUrvNQmWnH', 20, 1, '65.00', '2015-02-10 15:04:14', '2015-02-10 15:04:14', '65.00', 'reservation-half', '', '201502426178Mbiip9'),
('201502802185bzoClt', 'ggDBAF6PY4lPMsUadx3yW692POOqheiP7Xmdn6Fh', 1, 1, '2000.00', '2015-02-10 16:35:40', '2015-02-10 16:35:40', '2000.00', 'extend', '', '201502774689bhbymd'),
('201502806580HGc9cg', 'ggDBAF6PY4lPMsUadx3yW692POOqheiP7Xmdn6Fh', 1, 1, '2000.00', '2015-02-10 15:14:52', '2015-02-10 15:14:52', '2000.00', 'extend', '', '201502593536XlbnpP'),
('201502810273XBmz9e', '20150210euuoPrY4rq3261CarlAkUIRLXL5flcwW93ObUrvNQmWnH', 19, 1, '50.00', '2015-02-10 15:03:25', '2015-02-10 15:03:25', '50.00', 'reservation-half', '', '20150249346Qebe1a'),
('201502817871k00FJ0', 'ggDBAF6PY4lPMsUadx3yW692POOqheiP7Xmdn6Fh', 1, 1, '1833.33', '2015-02-10 16:35:04', '2015-02-10 16:35:04', '1833.33', 'extend', '', '201502308536n7Lto'),
('201502844269F2lFeP', 'ggDBAF6PY4lPMsUadx3yW692POOqheiP7Xmdn6Fh', 1, 1, '2000.00', '2015-02-10 15:34:53', '2015-02-10 15:34:53', '2000.00', 'extend', '', '2015027829596iBJ3N'),
('20150284530776FDqH', 'ggDBAF6PY4lPMsUadx3yW692POOqheiP7Xmdn6Fh', 1, 1, '2000.00', '2015-02-10 15:20:52', '2015-02-10 15:20:52', '2000.00', 'extend', '', '201502309631xgGvcP'),
('2015029307SW3fqt', 'ggDBAF6PY4lPMsUadx3yW692POOqheiP7Xmdn6Fh', 1, 1, '2000.00', '2015-02-10 15:18:12', '2015-02-10 15:18:12', '2000.00', 'extend', '', '201502201904nJh5YQ'),
('20150294299MqZTcM', '20150210RepHdwvLMJohka9dNtybCRJBgYlJJAWehSMDdLQppTsCu', 1, 1, '1000.00', '2015-02-10 17:03:16', '2015-02-10 17:03:16', '1000.00', 'reservation-half', '', '201502871979e0otVo'),
('201502987641xxpgkY', '20150210euuoPrY4rq3261CarlAkUIRLXL5flcwW93ObUrvNQmWnH', 1, 1, '1000.00', '2015-02-10 16:53:13', '2015-02-10 16:53:13', '1000.00', 'reservation-half', '', '201502497864D3YRmi'),
('201502995514alXfzk', 'ggDBAF6PY4lPMsUadx3yW692POOqheiP7Xmdn6Fh', 1, 1, '2000.00', '2015-02-10 15:19:10', '2015-02-10 15:19:10', '2000.00', 'extend', '', '201502964966dk0V7o');

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
  `paymenttype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `transactions_codeprovided_unique` (`codeprovided`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `account_id`, `bookingid`, `modeofpayment`, `codeprovided`, `bankname`, `downpayment`, `payeremail`, `status`, `notes`, `totalbill`, `discountedbill`, `couponcode`, `paymenttype`, `created_at`, `updated_at`) VALUES
('20150210euuoPrY4rq3261CarlAkUIRLXL5flcwW93ObUrvNQmWnH', '201502903107w2vP8K', 'GTB20150210224223', 'bank', 'ttttttttt', 'BPI', '1115.00', 'bluegate_2006@yahoo.com', 'rejected', 'test1', '2230.00', NULL, NULL, 'half', '2015-02-10 14:42:52', '2015-02-10 17:22:12'),
('20150210RepHdwvLMJohka9dNtybCRJBgYlJJAWehSMDdLQppTsCu', '201502363556t9Ixyo', 'bt220150210230621', 'bank', 'ffffffff', 'BPI', '1075.00', 'xnalimits@gmail.com', 'fullypaid', 'test2', '2150.00', NULL, NULL, 'half', '2015-02-10 15:07:23', '2015-02-10 17:03:16');

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
