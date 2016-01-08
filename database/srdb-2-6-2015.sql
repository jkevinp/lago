-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2015 at 06:31 PM
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
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_email_unique` (`email`),
  UNIQUE KEY `account_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `title`, `firstname`, `middleName`, `lastName`, `email`, `contactnumber`, `username`, `password`, `usergroupid`, `active`, `confirmationcode`, `remember_token`, `created_at`, `updated_at`, `gender`) VALUES
('201501447088T6UcR', 'MR', 'John', 'Kevin', 'Peralta', 'bluegate_2006@yahoo.com', '09056057553', 'bluegate_2006@yahoo.com', '$2y$10$lLa7SjF8qR9gKrthI4F0BeNNmjIqL2IQ.hdwXFwWShiT8L1uXyNYS', 2, 1, 'YnO5Gs3rPMkAr4CZePicsvEjeLHBHXh1', 'TZvY5aU5Dozv0g0WEtwBAQKxyRJBbo1s2zCCA7fDAnxFguVAdRpNpOh5a5xB', '2015-01-26 22:54:20', '2015-02-05 09:02:16', ''),
('201502412994gLUYzP', 'MS', 'Mary Jane', 'Martinez', 'Alfonso', 'shana.herai11@facebook.com1', '09090909090', 'shana.herai11@facebook.com1', '$2y$10$tKQBt7BszosmR7Vf1WON.OJluqxO/hcSabX7vrr8R1kaqLOYSPcUO', 2, 1, '6fckwR7MohkFfzw5exmSLg20dwDvX5iX', NULL, '2015-02-03 11:20:49', '2015-02-03 16:14:54', 'female'),
('2015026535958uZ9oK', 'MR', 'John', 'Kevin', 'Peralta', 'xnalimits@gmail.com', '09056057553', 'xnalimits@gmail.com', '$2y$10$lD6HX1.TtR37QoPbg/J7tOTw8nkFM9bXs8pFxJ5CHKrNha7lgVQPK', 2, 1, 'mTbmHnvj3QkD2lZfeWcUWcFqxDgXIf8o', NULL, '2015-02-03 01:39:52', '2015-02-03 02:08:11', ''),
('201502670105GBZOdY', 'MR', 'Mary Jane', 'Martinez', 'Alfonso', 'shana.herai@facebook.com', '09090909090', 'shana.herai@facebook.com', 'MAlfonsob8q', 2, 1, 'LYFqXlXehqkbvMspeyLywS74jZHiWp8Y', NULL, '2015-02-03 11:14:57', '2015-02-03 11:14:57', 'male'),
('201502755493ygSDAu', 'MR', 'Mary Jane', 'Martinez', 'Alfonso', 'shana.herai1@facebook.com', '09090909090', 'shana.herai1@facebook.com', '$2y$10$CorobJl9zdjMyoNw9kYG4edWIcCtfUW8VHxKpPfVgd97.4vC9R5nS', 2, 1, 'QNHNbPgcZqk94uJ7eYNqpOujvJlU7FyM', NULL, '2015-02-03 11:18:55', '2015-02-03 11:22:24', 'male'),
('201502949311TWn2AT', 'MR', 'admin', 'admin', 'admin', 'mail.sunrock@gmail.com', '000000000', 'mail.sunrock@gmail.com', '$2y$10$BrWlQgGUJDeLwHyn19xbG.qzHPEoLWD91iALLqWGfbzI8JzVTUPBu', 1, 1, 'KH6ctO092AkZQiiGeXZ8hqeJd9nILGL4', 'mamI8ZaO6R51OvfTMsvE7wLwG2a31zOEKcAO8jr7Jt5yL7BU7t99df6RfggH', '2015-02-03 00:40:37', '2015-02-05 08:44:27', '');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `bookingid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bookingreferenceid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bookingstart` date NOT NULL,
  `bookingend` date NOT NULL,
  `bookingtimestart` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bookingtimeend` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `totalduration` int(11) NOT NULL,
  `account_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `confirmationcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fee` decimal(10,2) NOT NULL,
  PRIMARY KEY (`bookingid`),
  UNIQUE KEY `booking_bookingreferenceid_unique` (`bookingreferenceid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingid`, `bookingreferenceid`, `bookingstart`, `bookingend`, `bookingtimestart`, `bookingtimeend`, `totalduration`, `account_id`, `active`, `confirmationcode`, `created_at`, `updated_at`, `fee`) VALUES
('6fE20150129235811', 'JPli722', '2015-01-30', '2015-01-30', '', '', 1, '201501447088T6UcR', 0, 'yBoJsTCR55pUAbY2eVAzY8BP84APs05l', '2015-01-05 15:58:11', '2015-01-29 15:58:11', '1400.00'),
('8I120150203095357', 'JPL3KFf', '2015-02-03', '2015-02-03', '', '', 1, '201501447088T6UcR', 0, 'ySvevLnAxBpyIvpYecp0fv0qHVd67udv', '2015-02-03 01:53:57', '2015-02-03 01:53:57', '1300.00'),
('akb20150203093952', 'JPe2ekF', '2015-02-03', '2015-02-03', '', '', 1, '2015026535958uZ9oK', 0, 'VJmwDrxEdlp5MFDgeQ1F3KNYI0q4G0d3', '2015-02-03 01:39:52', '2015-02-03 01:39:52', '1450.00'),
('Mne20150203083934', 'JPUltUv', '2015-02-03', '2015-02-03', '', '', 1, '201501447088T6UcR', 0, 'akKMgM2GBlpPRP3Tek5xLOF9YrBOrdTT', '2015-02-03 00:39:34', '2015-02-03 00:39:34', '2500.00'),
('O1520150203094040', 'JPrzyfP', '2015-02-03', '2015-02-03', '', '', 1, '201501447088T6UcR', 0, 'dYkNOhk3RwpqTmz4eXoLOQCyYH3cfTSj', '2015-02-03 01:40:41', '2015-02-03 01:40:41', '900.00'),
('Opa20150130074428', 'JPonMTk', '2015-01-30', '2015-01-30', '', '', 1, '201501447088T6UcR', 0, 'TP8KnavB4Lp9wiIZewvh7C43eRKjoXpH', '2015-01-29 23:44:28', '2015-01-29 23:44:28', '950.00'),
('plD20150203084037', 'aaJgHQk', '2015-02-03', '2015-02-03', '', '', 1, '201502949311TWn2AT', 0, 'U2nWexCHXtpBsigeeyDanOjVQVWTMm2Q', '2015-02-03 00:40:37', '2015-02-03 00:40:37', '2200.00'),
('px920150203100204', 'JPMfOHZ', '2015-02-06', '2015-02-08', '', '', 3, '201501447088T6UcR', 0, 'RuuGUkBRfxpGeQDjeidCJpN6cq2BB3yJ', '2015-02-03 02:02:04', '2015-02-03 02:02:04', '9000.00'),
('r2K20150129235306', 'JPz1x2X', '2015-01-30', '2014-01-30', '', '', 366, '201501447088T6UcR', 0, 'VQYIejpSw8pU1HfpeVdJmDkOPswdMjIk', '2015-01-29 15:53:06', '2015-01-29 15:53:06', '2150.00'),
('ui420150129102944', 'JP9PlI1', '2015-01-29', '2014-01-29', '', '', 366, '201501447088T6UcR', 1, '3LheRlXk6kpKqvneeY31a2pJjwQuLpB8', '2015-01-29 02:29:44', '2015-01-29 11:15:43', '1200.00'),
('VsP20150203094117', 'JPxPg6j', '2015-02-03', '2015-02-03', '', '', 1, '201501447088T6UcR', 0, '0fShActSNzpWlp3OeMrZKUNW856vgn6T', '2015-02-03 01:41:17', '2015-02-03 01:41:17', '900.00'),
('YE020150203095207', 'JPipElP', '2015-02-03', '2015-02-03', '', '', 1, '201501447088T6UcR', 0, 'ElsjfgBj85plx9L4egSzI9i0EI8zPbFv', '2015-02-03 01:52:07', '2015-02-03 01:52:07', '900.00'),
('ywz20150127065420', 'JP9kfBa', '2015-01-27', '2014-01-27', '', '', 366, '201501447088T6UcR', 2, 'KNe0Xor0gupboIfnefuMQVwT7qaMqMzg', '2015-01-26 22:54:20', '2015-01-31 16:23:43', '1353.60');

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
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `temporary` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=62 ;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`id`, `time`, `bookingstart`, `bookingend`, `productid`, `productname`, `quantity`, `bookingreferenceid`, `created_at`, `updated_at`, `temporary`) VALUES
(1, '06', '2015-01-29 06:00:00', '2015-01-29 18:00:00', 1, 'Diamond One', 1, 'ywz20150127065420', '2015-01-01 00:21:14', '2015-01-29 00:21:14', 0),
(2, '06', '2015-01-29 06:00:00', '2015-01-29 18:00:00', 2, 'Diamond Two', 1, 'ui420150129102944', '2015-01-29 02:29:36', '2015-01-29 02:29:44', 0),
(3, '06', '2015-01-29 00:00:00', '2015-01-30 00:00:00', 2, 'lol', 1, 'ui420150129102944', '2015-01-28 16:00:00', '2015-01-28 16:00:00', 0),
(15, '06', '2015-01-30 06:00:00', '2015-01-30 18:00:00', 20, 'Adult Admission Ticket', 1, '0', '2015-01-29 15:52:56', '2015-01-29 15:53:07', 0),
(16, '06', '2015-01-30 06:00:00', '2015-01-30 18:00:00', 19, 'Children Admission Ticket', 1, '0', '2015-01-29 15:52:57', '2015-01-29 15:53:07', 0),
(17, '06', '2015-01-30 06:00:00', '2015-01-30 18:00:00', 1, 'Diamond One', 1, '0', '2015-01-29 15:52:57', '2015-01-29 15:53:07', 0),
(21, '06', '2015-01-30 06:00:00', '2015-01-30 18:00:00', 20, 'Adult Admission Ticket', 1, '6fE20150129235811', '2015-01-29 15:57:56', '2015-01-29 15:58:11', 0),
(22, '06', '2015-01-30 06:00:00', '2015-01-30 18:00:00', 19, 'Children Admission Ticket', 2, '6fE20150129235811', '2015-01-29 15:57:56', '2015-01-29 15:58:11', 0),
(23, '06', '2015-01-30 06:00:00', '2015-01-30 18:00:00', 2, 'Diamond Two', 1, '6fE20150129235811', '2015-01-29 15:57:56', '2015-01-29 15:58:11', 0),
(38, '06', '2015-01-30 06:00:00', '2015-01-30 18:00:00', 20, 'Adult Admission Ticket', 1, 'ar1Sr0M8aZiYd3EWIcviWFi8j1YoXRQrl7HM9Aj5', '2015-01-29 22:01:23', '2015-01-29 22:01:23', 1),
(39, '06', '2015-01-30 06:00:00', '2015-01-30 18:00:00', 19, 'Children Admission Ticket', 1, 'ar1Sr0M8aZiYd3EWIcviWFi8j1YoXRQrl7HM9Aj5', '2015-01-29 22:01:23', '2015-01-29 22:01:23', 1),
(40, '06', '2015-01-30 06:00:00', '2015-01-30 18:00:00', 3, 'Diamond Three', 1, 'ar1Sr0M8aZiYd3EWIcviWFi8j1YoXRQrl7HM9Aj5', '2015-01-29 22:01:23', '2015-01-29 22:01:23', 1),
(41, '06', '2015-01-30 06:00:00', '2015-01-30 18:00:00', 20, 'Adult Admission Ticket', 1, 'Opa20150130074428', '2015-01-29 23:44:19', '2015-01-29 23:44:29', 0),
(42, '06', '2015-01-30 06:00:00', '2015-01-30 18:00:00', 19, 'Children Admission Ticket', 1, 'Opa20150130074428', '2015-01-29 23:44:19', '2015-01-29 23:44:29', 0),
(43, '06', '2015-01-30 06:00:00', '2015-01-30 18:00:00', 4, 'Diamond Four', 1, 'Opa20150130074428', '2015-01-29 23:44:19', '2015-01-29 23:44:29', 0),
(44, '06', '2015-02-03 06:00:00', '2015-02-03 18:00:00', 20, 'Adult Admission Ticket', 5, 'Mne20150203083934', '2015-02-03 00:39:23', '2015-02-03 00:39:35', 0),
(45, '06', '2015-02-03 06:00:00', '2015-02-03 18:00:00', 1, 'Diamond One', 1, 'Mne20150203083934', '2015-02-03 00:39:23', '2015-02-03 00:39:35', 0),
(46, '06', '2015-02-03 06:00:00', '2015-02-03 18:00:00', 20, 'Adult Admission Ticket', 10, 'plD20150203084037', '2015-02-03 00:40:14', '2015-02-03 00:40:38', 0),
(47, '06', '2015-02-03 06:00:00', '2015-02-03 18:00:00', 2, 'Diamond Two', 1, 'plD20150203084037', '2015-02-03 00:40:14', '2015-02-03 00:40:38', 0),
(48, '06', '2015-02-03 06:00:00', '2015-02-03 18:00:00', 20, 'Adult Admission Ticket', 1, 'akb20150203093952', '2015-02-03 01:39:37', '2015-02-03 01:39:53', 0),
(49, '06', '2015-02-03 06:00:00', '2015-02-03 18:00:00', 19, 'Children Admission Ticket', 1, 'akb20150203093952', '2015-02-03 01:39:37', '2015-02-03 01:39:53', 0),
(50, '06', '2015-02-03 06:00:00', '2015-02-03 18:00:00', 3, 'Diamond Three', 1, 'akb20150203093952', '2015-02-03 01:39:38', '2015-02-03 01:39:53', 0),
(51, '06', '2015-02-03 06:00:00', '2015-02-03 18:00:00', 20, 'Adult Admission Ticket', 1, 'O1520150203094040', '2015-02-03 01:40:34', '2015-02-03 01:40:41', 0),
(52, '06', '2015-02-03 06:00:00', '2015-02-03 18:00:00', 4, 'Diamond Four', 1, 'O1520150203094040', '2015-02-03 01:40:34', '2015-02-03 01:40:41', 0),
(53, '06', '2015-02-03 06:00:00', '2015-02-03 18:00:00', 20, 'Adult Admission Ticket', 1, 'VsP20150203094117', '2015-02-03 01:41:11', '2015-02-03 01:41:17', 0),
(54, '06', '2015-02-03 06:00:00', '2015-02-03 18:00:00', 5, 'Diamond Five', 1, 'VsP20150203094117', '2015-02-03 01:41:11', '2015-02-03 01:41:17', 0),
(55, '06', '2015-02-03 06:00:00', '2015-02-03 18:00:00', 20, 'Adult Admission Ticket', 1, 'YE020150203095207', '2015-02-03 01:52:01', '2015-02-03 01:52:07', 0),
(56, '06', '2015-02-03 06:00:00', '2015-02-03 18:00:00', 6, 'Diamond Six', 1, 'YE020150203095207', '2015-02-03 01:52:01', '2015-02-03 01:52:07', 0),
(57, '06', '2015-02-03 06:00:00', '2015-02-03 18:00:00', 20, 'Adult Admission Ticket', 1, '8I120150203095357', '2015-02-03 01:53:50', '2015-02-03 01:53:57', 0),
(58, '06', '2015-02-03 06:00:00', '2015-02-03 18:00:00', 7, 'Opal & Pearl', 1, '8I120150203095357', '2015-02-03 01:53:50', '2015-02-03 01:53:57', 0),
(59, '06', '2015-02-06 06:00:00', '2015-02-08 06:00:00', 20, 'Adult Admission Ticket', 2, 'px920150203100204', '2015-02-03 02:01:57', '2015-02-03 02:02:05', 0),
(60, '06', '2015-02-06 06:00:00', '2015-02-08 06:00:00', 19, 'Children Admission Ticket', 1, 'px920150203100204', '2015-02-03 02:01:57', '2015-02-03 02:02:05', 0),
(61, '06', '2015-02-06 06:00:00', '2015-02-08 06:00:00', 1, 'Diamond One', 1, 'px920150203100204', '2015-02-03 02:01:57', '2015-02-03 02:02:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE IF NOT EXISTS `coupons` (
  `id` varchar(255) NOT NULL,
  `couponname` varchar(255) NOT NULL,
  `couponcode` varchar(255) NOT NULL,
  `discountbypercentage` decimal(10,2) NOT NULL DEFAULT '0.00',
  `discountbyvalue` decimal(10,2) NOT NULL DEFAULT '0.00',
  `feerequirement` decimal(10,2) NOT NULL DEFAULT '0.00',
  `active` int(1) NOT NULL DEFAULT '0',
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `couponname`, `couponcode`, `discountbypercentage`, `discountbyvalue`, `feerequirement`, `active`, `type`, `created_at`, `updated_at`) VALUES
('2015958qU476', '500 Discount Coupon', 'Sun2015YGKLl1909', '0.00', '500.00', '0.00', 1, 'absolute', '2015-02-03 00:57:11', '2015-02-03 16:26:18');

-- --------------------------------------------------------

--
-- Table structure for table `cron_job`
--

CREATE TABLE IF NOT EXISTS `cron_job` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `return` text COLLATE utf8_unicode_ci NOT NULL,
  `runtime` float(8,2) NOT NULL,
  `cron_manager_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cron_job`
--

INSERT INTO `cron_job` (`id`, `name`, `return`, `runtime`, `cron_manager_id`) VALUES
(1, 'cronTimer', 'Exception in job cronTimer: date() expects at least 1 parameter, 0 given', 0.00, 19),
(2, 'cronTimer', 'Exception in job cronTimer: date() expects at least 1 parameter, 0 given', 0.00, 20);

-- --------------------------------------------------------

--
-- Table structure for table `cron_manager`
--

CREATE TABLE IF NOT EXISTS `cron_manager` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rundate` datetime NOT NULL,
  `runtime` float(8,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=40 ;

--
-- Dumping data for table `cron_manager`
--

INSERT INTO `cron_manager` (`id`, `rundate`, `runtime`) VALUES
(1, '2015-01-25 07:11:04', 0.00),
(2, '2015-01-25 07:11:07', 0.00),
(3, '2015-01-25 07:11:10', 0.00),
(4, '2015-01-25 07:11:15', 0.00),
(5, '2015-01-25 07:11:16', 0.00),
(6, '2015-01-25 07:11:18', 0.00),
(7, '2015-01-25 07:11:47', 0.00),
(8, '2015-01-25 07:11:54', 0.00),
(9, '2015-01-25 07:12:09', 0.00),
(10, '2015-01-25 07:12:53', 0.00),
(11, '2015-01-25 07:13:02', 0.00),
(12, '2015-01-25 07:13:10', 0.00),
(13, '2015-01-25 07:13:17', 0.00),
(14, '2015-01-25 07:13:27', 0.00),
(15, '2015-01-25 07:14:38', 0.00),
(16, '2015-01-25 07:16:35', 0.00),
(17, '2015-01-25 07:19:14', 0.00),
(18, '2015-01-25 07:21:39', 0.00),
(19, '2015-01-25 07:24:00', 0.00),
(20, '2015-01-25 07:24:00', 0.00),
(21, '2015-01-25 07:24:57', 0.00),
(22, '2015-01-25 07:25:06', 0.00),
(23, '2015-01-25 07:25:14', 0.00),
(24, '2015-01-25 07:26:12', 0.00),
(25, '2015-01-25 07:29:16', 0.00),
(26, '2015-01-25 07:29:19', 0.00),
(27, '2015-01-25 07:29:42', 0.00),
(28, '2015-01-25 07:29:47', 0.00),
(29, '2015-01-25 07:29:52', 0.00),
(30, '2015-01-25 07:29:53', 0.00),
(31, '2015-01-25 07:29:53', 0.00),
(32, '2015-01-25 07:29:53', 0.00),
(33, '2015-01-25 07:30:14', 0.00),
(34, '2015-01-25 07:30:35', 0.00),
(35, '2015-01-25 07:30:39', 0.00),
(36, '2015-01-25 07:30:56', 0.00),
(37, '2015-01-25 07:31:09', 0.00),
(38, '2015-01-25 07:31:11', 0.00),
(39, '2015-01-25 07:31:20', 0.00);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `imagename`, `directory`, `description`, `created_at`, `updated_at`) VALUES
(1, 'default.jpg', '', '', '2015-01-23 18:11:23', '2015-01-23 18:11:23'),
(2, '1.jpg', '', '', '2015-01-23 18:11:23', '2015-01-23 18:11:23'),
(3, '2.jpg', '', '', '2015-01-23 18:11:23', '2015-01-23 18:11:23'),
(4, '3.jpg', '', '', '2015-01-23 18:11:23', '2015-01-23 18:11:23'),
(5, '4.jpg', '', '', '2015-01-23 18:11:23', '2015-01-23 18:11:23'),
(6, '5.jpg', '', '', '2015-01-23 18:11:23', '2015-01-23 18:11:23'),
(7, '6.jpg', '', '', '2015-01-23 18:11:23', '2015-01-23 18:11:23'),
(8, '7.jpg', '', '', '2015-01-23 18:11:23', '2015-01-23 18:11:23'),
(9, '8.jpg', '', '', '2015-01-23 18:11:23', '2015-01-23 18:11:23'),
(10, '9.jpg', '', '', '2015-01-23 18:11:23', '2015-01-23 18:11:23'),
(11, 'child.jpg', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'adult.png', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 's2b6LYIglol.png', 'http://localhost:8000/public/default/img-uploads/', 'Test', '2015-02-04 05:40:34', '2015-02-04 05:40:34'),
(14, 'TmCPrSlItheme_frame.png', 'http://localhost:8000/public/default/img-uploads/', '', '2015-02-05 03:39:27', '2015-02-05 03:39:27'),
(15, 'lFdDnkwvrinrin.jpg', 'http://localhost:8000/public/default/img-uploads/', '', '2015-02-05 03:49:52', '2015-02-05 03:49:52'),
(16, 'siAgCIZi20141120_143745.jpg', 'http://localhost:8000/public/default/img-uploads/', '', '2015-02-05 03:50:23', '2015-02-05 03:50:23'),
(17, '7iU7wYnX20141127_144714.jpg', 'http://localhost:8000/public/default/img-uploads/', 'Test', '2015-02-05 03:51:42', '2015-02-05 03:51:42'),
(18, 'hVoYTOXC20141127_144712.jpg', 'http://localhost:8000/public/default/img-uploads/', 'test 123', '2015-02-05 04:01:52', '2015-02-05 04:01:52');

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
('dTXvi5430', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', 'New Reservation', 'A new reservation was booked.<br/> Booking id: plD20150203084037<br/>Booked by: 201502949311TWn2AT', 5, '2015-02-03 00:40:54', '2015-02-03 00:40:54'),
('DUuXh4483', 'System', 'mail.sunrock@gmail.com', 'bluegate_2006@yahoo.com', 'John Peralta', '', 'You have booked another reservation.<br/> Booking id: ywz20150127065420<br/><a href="http://localhost:8000/account/show/transaction/ywz20150127065420/">Pay Now!</a>', 5, '2015-01-26 22:54:28', '2015-01-26 22:54:28'),
('eRZtX9052', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', '', 'A new reservation was booked.<br/> Booking id: 0<br/>Booked by: 201501447088T6UcR', 5, '2015-01-29 15:53:16', '2015-01-29 15:53:16'),
('FZ5GW5426', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', 'New Reservation', 'A new reservation was booked.<br/> Booking id: px920150203100204<br/>Booked by: 201501447088T6UcR', 5, '2015-02-03 02:02:18', '2015-02-03 02:02:18'),
('Gdh9r4300', 'System', 'mail.sunrock@gmail.com', 'bluegate_2006@yahoo.com', 'John Peralta', '', 'You have booked another reservation.<br/> Booking id: 0<br/><a href="http://localhost:8000/account/show/transaction/0/">Pay Now!</a>', 5, '2015-01-29 15:48:08', '2015-01-29 15:48:08'),
('HkrUs9186', 'System', 'mail.sunrock@gmail.com', 'bluegate_2006@yahoo.com', 'John Peralta', 'New Reservation', 'You have booked another reservation.<br/> Booking id: Mne20150203083934<br/><a href="http://localhost:8000/account/show/transaction/Mne20150203083934/">Pay Now!</a>', 5, '2015-02-03 00:39:47', '2015-02-03 00:39:47'),
('iBeIf8817', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', '', 'A new reservation was booked.<br/> Booking id: 6fE20150129235811<br/>Booked by: 201501447088T6UcR', 5, '2015-01-29 15:58:21', '2015-01-29 15:58:21'),
('Ic8E06894', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', 'New Reservation', 'A new reservation was booked.<br/> Booking id: Mne20150203083934<br/>Booked by: 201501447088T6UcR', 5, '2015-02-03 00:39:51', '2015-02-03 00:39:51'),
('IdzdM9844', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', '', 'A new reservation was booked.<br/> Booking id: ywz20150127065420<br/>Booked by: 201501447088T6UcR', 5, '2015-01-26 22:54:28', '2015-01-26 22:54:28'),
('IKWs0459', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', '', 'A new reservation was booked.<br/> Booking id: Opa20150130074428<br/>Booked by: 201501447088T6UcR', 5, '2015-01-29 23:44:37', '2015-01-29 23:44:37'),
('iTIVy416', 'System', 'mail.sunrock@gmail.com', 'bluegate_2006@yahoo.com', 'John Peralta', '', 'You have booked another reservation.<br/> Booking id: Opa20150130074428<br/><a href="http://localhost:8000/account/show/transaction/Opa20150130074428/">Pay Now!</a>', 5, '2015-01-29 23:44:37', '2015-01-29 23:44:37'),
('J1Tze4665', 'System', 'mail.sunrock@gmail.com', 'bluegate_2006@yahoo.com', 'John Peralta', '', 'You have booked another reservation.<br/> Booking id: 0<br/><a href="http://localhost:8000/account/show/transaction/0/">Pay Now!</a>', 5, '2015-01-29 15:53:13', '2015-01-29 15:53:13'),
('KLGNx4049', 'John Kevin Peralta', 'bluegate_2006@yahoo.com', 'bluegate_2006@yahoo.com', 'John Kevin Peralta', '44444444', 'test', 5, '2015-02-05 08:48:27', '2015-02-05 08:48:27'),
('Kwy377432', 'System', 'mail.sunrock@gmail.com', 'bluegate_2006@yahoo.com', 'John Peralta', '', 'You have booked another reservation.<br/> Booking id: 6fE20150129235811<br/><a href="http://localhost:8000/account/show/transaction/6fE20150129235811/">Pay Now!</a>', 5, '2015-01-29 15:58:17', '2015-01-29 15:58:17'),
('kznDm5953', 'System', 'mail.sunrock@gmail.com', 'bluegate_2006@yahoo.com', 'John Peralta', 'New Reservation', 'You have booked another reservation.<br/> Booking id: px920150203100204<br/><a href="http://localhost:8000/account/show/transaction/px920150203100204/">Pay Now!</a>', 5, '2015-02-03 02:02:19', '2015-02-03 02:02:19'),
('LaSjK7135', 'System', 'mail.sunrock@gmail.com', 'bluegate_2006@yahoo.com', 'John Peralta', '', 'You have booked another reservation.<br/> Booking id: 0<br/><a href="http://localhost:8000/account/show/transaction/0/">Pay Now!</a>', 5, '2015-01-29 15:53:16', '2015-01-29 15:53:16'),
('NVZ106797', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', 'New Reservation', 'A new reservation was booked.<br/> Booking id: plD20150203084037<br/>Booked by: 201502949311TWn2AT', 5, '2015-02-03 00:40:47', '2015-02-03 00:40:47'),
('nYksQ5103', 'System', 'mail.sunrock@gmail.com', 'bluegate_2006@yahoo.com', 'John Peralta', '', 'You have booked another reservation.<br/> Booking id: ui420150129102944<br/><a href="http://localhost:8000/account/show/transaction/ui420150129102944/">Pay Now!</a>', 5, '2015-01-29 02:29:57', '2015-01-29 02:29:57'),
('Ouwwh6723', 'admin admin admin', 'mail.sunrock@gmail.com', 'bluegate_2006@yahoo.com', 'John Kevin Peralta', '44444444', '444', 5, '2015-02-05 08:26:55', '2015-02-05 08:26:55'),
('P0aA21105', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', '', 'A new reservation was booked.<br/> Booking id: 6fE20150129235811<br/>Booked by: 201501447088T6UcR', 5, '2015-01-29 15:58:17', '2015-01-29 15:58:17'),
('pJbkC5763', 'admin admin admin', 'mail.sunrock@gmail.com', 'bluegate_2006@yahoo.com', 'John Kevin Peralta', '44444444', '444', 5, '2015-02-05 08:27:49', '2015-02-05 08:27:49'),
('QeskL7962', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', 'New Reservation', 'A new reservation was booked.<br/> Booking id: Mne20150203083934<br/>Booked by: 201501447088T6UcR', 5, '2015-02-03 00:39:47', '2015-02-03 00:39:47'),
('rBywA1963', 'System', 'mail.sunrock@gmail.com', 'bluegate_2006@yahoo.com', 'John Peralta', '', 'You have booked another reservation.<br/> Booking id: Opa20150130074428<br/><a href="http://localhost:8000/account/show/transaction/Opa20150130074428/">Pay Now!</a>', 5, '2015-01-29 23:44:40', '2015-01-29 23:44:40'),
('Ri8gq1143', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', '', 'A new reservation was booked.<br/> Booking id: 0<br/>Booked by: 201501447088T6UcR', 5, '2015-01-29 15:48:11', '2015-01-29 15:48:11'),
('RzZPO4627', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'admin admin', 'New Reservation', 'You have booked another reservation.<br/> Booking id: plD20150203084037<br/><a href="http://localhost:8000/account/show/transaction/plD20150203084037/">Pay Now!</a>', 5, '2015-02-03 00:40:47', '2015-02-03 00:40:47'),
('TjWTv5349', 'System', 'mail.sunrock@gmail.com', 'bluegate_2006@yahoo.com', 'John Peralta', '', 'You have booked another reservation.<br/> Booking id: ywz20150127065420<br/><a href="http://localhost:8000/account/show/transaction/ywz20150127065420/">Pay Now!</a>', 5, '2015-01-26 22:54:34', '2015-01-26 22:54:34'),
('TzLZX5506', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', '', 'A new reservation was booked.<br/> Booking id: ui420150129102944<br/>Booked by: 201501447088T6UcR', 5, '2015-01-29 02:29:57', '2015-01-29 02:29:57'),
('UUjDL4115', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', '', 'A new reservation was booked.<br/> Booking id: 0<br/>Booked by: 201501447088T6UcR', 5, '2015-01-29 15:48:08', '2015-01-29 15:48:08'),
('WIX8u8022', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', 'New Reservation', 'A new reservation was booked.<br/> Booking id: px920150203100204<br/>Booked by: 201501447088T6UcR', 5, '2015-02-03 02:02:14', '2015-02-03 02:02:14'),
('WwT4E6891', 'System', 'mail.sunrock@gmail.com', 'bluegate_2006@yahoo.com', 'John Peralta', 'New Reservation', 'You have booked another reservation.<br/> Booking id: Mne20150203083934<br/><a href="http://localhost:8000/account/show/transaction/Mne20150203083934/">Pay Now!</a>', 5, '2015-02-03 00:39:51', '2015-02-03 00:39:51'),
('Xk46X7080', 'System', 'mail.sunrock@gmail.com', 'bluegate_2006@yahoo.com', 'John Peralta', '', 'You have booked another reservation.<br/> Booking id: 6fE20150129235811<br/><a href="http://localhost:8000/account/show/transaction/6fE20150129235811/">Pay Now!</a>', 5, '2015-01-29 15:58:21', '2015-01-29 15:58:21'),
('XrGAo9436', 'System', 'mail.sunrock@gmail.com', 'bluegate_2006@yahoo.com', 'John Peralta', '', 'You have booked another reservation.<br/> Booking id: 0<br/><a href="http://localhost:8000/account/show/transaction/0/">Pay Now!</a>', 5, '2015-01-29 15:48:11', '2015-01-29 15:48:11'),
('zbbDY3350', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'admin admin', 'New Reservation', 'You have booked another reservation.<br/> Booking id: plD20150203084037<br/><a href="http://localhost:8000/account/show/transaction/plD20150203084037/">Pay Now!</a>', 5, '2015-02-03 00:40:54', '2015-02-03 00:40:54'),
('ZcEtC8792', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', '', 'A new reservation was booked.<br/> Booking id: 0<br/>Booked by: 201501447088T6UcR', 5, '2015-01-29 15:53:13', '2015-01-29 15:53:13');

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
('2014_12_25_135937_create_booking_table', 1),
('2013_06_27_143953_create_cronmanager_table', 2),
('2013_06_27_144035_create_cronjob_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `productname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productdesc` text COLLATE utf8_unicode_ci NOT NULL,
  `productprice` int(11) NOT NULL,
  `productquantity` int(11) NOT NULL,
  `fileid` int(11) NOT NULL,
  `producttypeid` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `productname`, `productdesc`, `productprice`, `productquantity`, `fileid`, `producttypeid`, `created_at`, `updated_at`, `active`) VALUES
(1, 'Diamond One', 'Diamond 1 or D-1 can accomodate up to 4 - 6 person. With Aircondition, TV and Private Toilet.', 2000, 1, 2, 1, '2015-01-23 18:11:20', '2015-02-05 07:43:14', 1),
(2, 'Diamond Two', 'Diamond-2 can accomodate up to 2 - 3 person. With Aircondition, TV and Toilet.', 1200, 1, 3, 1, '2015-01-23 18:11:20', '2015-02-05 07:10:56', 1),
(3, 'Diamond Three', 'Diamond-3 can accomodate up to 2 - 3 person. With Aircondition, TV and Toilet.', 1300, 1, 3, 1, '2015-01-23 18:11:20', '2015-01-23 18:11:20', 1),
(4, 'Diamond Four', 'Without Aircondition and Toilet.', 800, 1, 2, 1, '2015-01-23 18:11:20', '2015-01-23 18:11:20', 1),
(5, 'Diamond Five', 'Without Aircondition and Toilet.', 800, 1, 3, 1, '2015-01-23 18:11:20', '2015-01-23 18:11:20', 1),
(6, 'Diamond Six', 'Without Aircondition and Toilet.', 800, 1, 3, 1, '2015-01-23 18:11:21', '2015-01-23 18:11:21', 1),
(7, 'Opal & Pearl', 'Opal or Perl can accomodate 2 person. With Aircondition, TV and Private Toilet.', 1200, 1, 4, 1, '2015-01-23 18:11:21', '2015-01-23 18:11:21', 1),
(8, 'RUBY 1', 'Ruby 1 can accomodate 2 person. With Aircondition, TV and Private Toilet.', 1500, 1, 5, 1, '2015-01-23 18:11:21', '2015-01-23 18:11:21', 1),
(9, 'RUBY 2', 'Ruby 2 can accomodate 2 person. With Aircondition, TV and Private Toilet.', 1500, 1, 5, 1, '2015-01-23 18:11:21', '2015-01-23 18:11:21', 1),
(10, 'RUBY 3', 'Ruby 3 can accomodate 2 person. With Aircondition, TV and Private Toilet w/ Hot Shower.', 1800, 1, 6, 1, '2015-01-23 18:11:21', '2015-01-23 18:11:21', 1),
(11, 'RUBY 4', 'Ruby 4 can accomodate 2 person. With Aircondition, TV and Private Toilet w/ Hot Shower.', 1800, 1, 6, 1, '2015-01-23 18:11:21', '2015-01-23 18:11:21', 1),
(12, 'RUBY 5', 'Ruby 5 can accomodate 4 - 6 person. With Aircondition, TV and Private Toilet w/ Hot Shower & Jacuzzi.', 3500, 1, 7, 1, '2015-01-23 18:11:21', '2015-01-23 18:11:21', 1),
(13, 'RUBY 6', 'Ruby 6 can accomodate 4 - 6 person. With Aircondition, TV and Private Toilet w/ Hot Shower & Jacuzzi.', 3500, 1, 7, 1, '2015-01-23 18:11:21', '2015-01-23 18:11:21', 1),
(14, 'Ruby Seminar Room', 'Ruby Seminar Room can accomodate 80 - 100 person.', 6500, 1, 7, 1, '2015-01-23 18:11:21', '2015-01-23 18:11:21', 1),
(15, 'Sapphire', 'Sapphire can accomodate 80 - 100 person.', 3500, 1, 7, 1, '2015-01-23 18:11:21', '2015-01-23 18:11:21', 1),
(16, 'TOPAZ 1 UPPER', 'Topaz 1 can accomodate 2 - 15 person. With Aircondition, TV, Private Toilet and Kitchen. Topaz room is good for those who conduct there retreat.', 4000, 1, 8, 1, '2015-01-23 18:11:21', '2015-01-23 18:11:21', 1),
(17, 'TOPAZ 2 LOWER', 'Topaz 1 can accomodate 2 - 15 person. With Aircondition, TV, Private Toilet and Kitchen. Topaz room is good for those who conduct there retreat.', 3500, 1, 9, 1, '2015-01-23 18:11:21', '2015-01-23 18:11:21', 1),
(18, 'MULTI-PURPOSE', 'Mutli-Purpose can accomodate 80 - 150 person. Its good for kids party and Wedding Venue.', 6000, 1, 10, 1, '2015-01-23 18:11:21', '2015-01-23 18:11:21', 1),
(19, 'Children Admission Ticket', 'Admission Fee for children.', 50, 999, 11, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(20, 'Adult Admission Ticket', 'Admission Fee for Adults.', 100, 999, 12, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(21, 'required', '', 1000, 1, 1, 1, '2015-02-05 05:05:19', '2015-02-05 05:05:19', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`id`, `producttypename`, `created_at`, `updated_at`) VALUES
(1, 'Cottages', '2015-01-23 18:11:24', '2015-01-23 18:11:24'),
(2, 'Rooms', '2015-01-23 18:11:24', '2015-01-23 18:11:24'),
(3, 'Admission', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
  `payeremail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'created',
  `notes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `totalbill` decimal(10,2) NOT NULL,
  `discountedbill` decimal(10,2) DEFAULT NULL,
  `couponcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `downpayment` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `transactions_codeprovided_unique` (`codeprovided`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `account_id`, `bookingid`, `modeofpayment`, `codeprovided`, `bankname`, `payeremail`, `status`, `notes`, `created_at`, `updated_at`, `totalbill`, `discountedbill`, `couponcode`, `downpayment`) VALUES
('20150129EfsZO5mPtmxFtf66Nw5ZFZ3RisimAOmxVEiWJTyDs2fy1', '201501447088T6UcR', 'ywz20150127065420', 'bank', 'testtest', 'BPI', 'bluegate_2006@yahoo.com', 'confirmed', '', '2015-01-29 14:50:45', '2015-02-03 16:35:15', '1353.60', '676.80', 'abcd1234', '338.40');

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
(1, 'guest', 3),
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
