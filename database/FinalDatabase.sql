-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2015 at 12:24 PM
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
('201502222137TWQqQz', 'MR', 'Staff', 'of', 'Sunrock', 'staff.sunrock@gmail.com', '09056057553', 'staff.sunrock@gmail.com', '$2y$10$0YPdW0pKPcVe3r.cQ7FnL.fdHXY2z5cwZjtNZx63qSB9vN7Sbsrua', 3, 1, 'pNnWAtNpo3kktzkmeJ6KztazXWhUSMwg', 'male', NULL, '2015-02-21 06:10:49', '2015-02-21 06:11:43'),
('201502230346JtLTQv', 'MR', 'Staff', 'of', 'Sunrock2', 'staff2.sunrock@gmail.com', '09056057553', 'staff2.sunrock@gmail.com', '$2y$10$9QeHHdEzOf7evSUOdkLgf.XEuaA4z6zoBAG.vjVaWaD91XXTaWSdW', 3, 1, 'waeKzrQfpCkuEF1KeoAzl565Y79Oh1Nw', 'male', 'Z7WvmgqppMtiLeSiM9ytc32tyPiOoHeizfVYNR47k90g9Jvf8vHqWC89QZkk', '2015-02-21 06:14:15', '2015-02-21 06:23:50'),
('201502363556t9Ixyo', 'MR', 'Mary Jane', 'Martinez', 'Alfonso', 'xnalimits@gmail.com', '000000000', 'xnalimits@gmail.com', '$2y$10$aeaY2e7wuFD2TyWh35.UnuIbkeAd97bKKTqzhxZn9w.i4K5Ck8xgG', 2, 1, 'RqDvfjK6OIkfaBHaezVCw8nLNYXwboVF', 'male', 'qePZCfxINsDjmdPPjyn5AtDYx3vLLmV3DjWyMr5TthSeN29XWdkhVIipbP8p', '2015-02-10 15:06:21', '2015-02-27 13:04:14'),
('20150247027I6AUz3', 'MR', 'John kevin', 'Kevin', 'pogi', 'shana.herai@facebook.com', '09056057553', 'shana.herai@facebook.com', '$2y$10$BjpAp8wRQFXoVZn/sACVmePSTOUjw86yTNm1LiIQ26brpYRSpcpui', 2, 1, 'kQFMJGeZ21k6yYnmekRf89IJaEgGz147', 'male', 'bMtvPOmURDH9YI8rzy5qzDpzUbuVj22KsJ72nXVaUayw5EYWiHRWFrvfy07O', '2015-02-21 07:05:17', '2015-02-21 07:07:55'),
('20150256610Vd2c1U', 'MR', 'John Kevin', 'De Jesus', 'Peralta', 'bluegate_20061@yahoo.com', '09056057553', 'bluegate_20061@yahoo.com', 'JPeraltaCzv', 2, 1, 'c5kwDNyCkzkeM5mKexcTOXtUJtjNUJY5', 'male', NULL, '2015-02-10 17:31:33', '2015-02-10 17:31:33'),
('201502903107w2vP8K', 'MR', 'John Kevin', 'De Jesus', 'Peralta', 'bluegate_2006@yahoo.com', '09056057553', 'bluegate_2006@yahoo.com', '$2y$10$1WQRozdelgXgqmtS9nJc7ehW2ZU3HrpfeMWv7eib9DB.KiqpUePuW', 2, 1, 'pQF1aHZpQZkncNEoebWn2jCN0CPALAYC', 'male', 'Dy3cWMPfsoal4q43b6SJDOpcVZcD3kI5BanmULWlIIupWWsRXqh1VRXW5u2T', '2015-02-09 17:46:40', '2015-02-27 07:46:30'),
('201502937867lVpN9i', 'MR', 'John Kevin', 'De Jesus', 'Peralta', 'bluegate_20016@yahoo.com', '09056057553', 'bluegate_20016@yahoo.com', 'JPeralta1Wo', 2, 1, 'PuTS1OCAoJk4Th3mes4ECz6JU4Fnx7Kr', 'male', NULL, '2015-02-10 17:32:03', '2015-02-10 17:32:03'),
('admindVnqNx85', 'MR', 'Admin', 'Of', 'Sunrock', 'mail.sunrock@gmail.com', '09056057553', 'mail.sunrock@gmail.com', '$2y$10$OT1RXxTTTGlS5CcNRr4ISe.lhbD6OwgTO3b/SDaoFcUlLSQfnbYqW', 1, 1, 'Looll', '', 'L5N1BXCIkxIkqvgKs2VLoyUrHFGD1k7SVJvQffCLxjWvGfwCIzti5RYeFVUo', '2015-02-09 17:10:20', '2015-02-27 13:03:58');

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
  `notes` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`bookingid`),
  UNIQUE KEY `booking_bookingreferenceid_unique` (`bookingreferenceid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingid`, `bookingreferenceid`, `bookingstart`, `bookingend`, `totalduration`, `fee`, `paymenttype`, `account_id`, `active`, `confirmationcode`, `created_at`, `updated_at`, `notes`) VALUES
('3UL20150228023238', 'MA3BjU8', '2015-02-28', '2015-03-01', 2, '2408.00', 'half', '201502363556t9Ixyo', 0, 'SBv6vUMbplp4pmMMeQOjhVdMMlctinjI', '2015-02-27 18:32:38', '2015-02-27 18:32:38', ''),
('9L220150227154040', 'JPOYzig', '2015-02-28', '2015-02-28', 1, '1041.60', 'half', '201502903107w2vP8K', 0, 'yFVLqGRgbApAQx9neckzdApTrhGG2vhV', '2015-02-27 07:40:40', '2015-02-27 07:40:40', ''),
('c6y20150227204536', 'JPFIvgP', '2015-03-01', '2015-03-01', 1, '2385.60', 'half', '201502903107w2vP8K', 0, 'y14o4zQuYBpggcVwe65Z6Rpdn1nFj0qB', '2015-02-27 12:45:36', '2015-02-27 12:45:36', ''),
('NVe20150227154220', 'MAfI0bt', '2015-02-28', '2015-02-28', 1, '2385.60', 'half', '201502363556t9Ixyo', 4, 'c2jmYiSxr4pc5hY5ewBgYEhCxpO96Vtc', '2015-02-27 07:42:20', '2015-02-27 11:13:48', ''),
('q9A20150227154453', 'MAy5LJL', '2015-02-28', '2015-02-28', 1, '1489.60', 'half', '201502363556t9Ixyo', 2, 'WhqONEIjJYp0uduPeIJSlcOrQjjEzbsM', '2015-02-27 07:44:53', '2015-02-27 07:49:36', ''),
('tmy20150228023410', 'JPhuWeS', '2015-02-28', '2015-03-01', 2, '1646.40', 'half', '201502903107w2vP8K', 0, 'Kg7qbhOzUzptFtXkeInlBEtfdntsBFwc', '2015-02-27 18:34:10', '2015-02-27 18:34:10', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`id`, `time`, `bookingstart`, `bookingend`, `productid`, `productname`, `quantity`, `bookingreferenceid`, `temporary`, `created_at`, `updated_at`) VALUES
(1, '06', '2015-02-28 06:00:00', '2015-02-28 18:00:00', 20, 'Adult Admission Ticket', 1, '9L220150227154040', 0, '2015-02-27 07:40:31', '2015-02-27 07:40:40'),
(2, '06', '2015-02-28 06:00:00', '2015-02-28 18:00:00', 6, 'Diamond Six', 1, '9L220150227154040', 0, '2015-02-27 07:40:31', '2015-02-27 07:40:40'),
(5, '06', '2015-02-28 06:00:00', '2015-02-28 18:00:00', 20, 'Adult Admission Ticket', 1, 'q9A20150227154453', 0, '2015-02-27 07:42:49', '2015-02-27 07:44:53'),
(6, '06', '2015-02-28 06:00:00', '2015-02-28 18:00:00', 2, 'Diamond Two', 1, 'q9A20150227154453', 0, '2015-02-27 07:42:49', '2015-02-27 07:44:53'),
(7, '06', '2015-03-01 06:00:00', '2015-03-01 18:00:00', 20, 'Adult Admission Ticket', 1, 'c6y20150227204536', 0, '2015-02-27 12:44:54', '2015-02-27 12:45:37'),
(8, '06', '2015-03-01 06:00:00', '2015-03-01 18:00:00', 1, 'Diamond One', 1, 'c6y20150227204536', 0, '2015-02-27 12:44:54', '2015-02-27 12:45:37'),
(9, '06', '2015-03-01 06:00:00', '2015-03-01 18:00:00', 20, 'Adult Admission Ticket', 1, 'feK0tpER3BUrOXQiqfr8HXTD9ct2XxwrHcwpiD63', 1, '2015-02-27 12:46:45', '2015-02-27 12:46:45'),
(10, '06', '2015-03-01 06:00:00', '2015-03-01 18:00:00', 2, 'Diamond Two', 1, 'feK0tpER3BUrOXQiqfr8HXTD9ct2XxwrHcwpiD63', 1, '2015-02-27 12:46:45', '2015-02-27 12:46:45'),
(11, '18', '2015-02-28 18:00:00', '2015-03-01 06:00:00', 22, 'Night rate Adult Admission Ticket', 1, '3UL20150228023238', 0, '2015-02-27 18:32:29', '2015-02-27 18:32:38'),
(12, '18', '2015-02-28 18:00:00', '2015-03-01 06:00:00', 1, 'Diamond One', 1, '3UL20150228023238', 0, '2015-02-27 18:32:29', '2015-02-27 18:32:38'),
(13, '18', '2015-02-28 18:00:00', '2015-03-01 06:00:00', 22, 'Night rate Adult Admission Ticket', 1, 'tmy20150228023410', 0, '2015-02-27 18:34:01', '2015-02-27 18:34:10'),
(14, '18', '2015-02-28 18:00:00', '2015-03-01 06:00:00', 21, 'Night rate Children Admission Ticket', 1, 'tmy20150228023410', 0, '2015-02-27 18:34:01', '2015-02-27 18:34:10'),
(15, '18', '2015-02-28 18:00:00', '2015-03-01 06:00:00', 2, 'Diamond Two', 1, 'tmy20150228023410', 0, '2015-02-27 18:34:02', '2015-02-27 18:34:10');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

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
(13, 'gMqPQj3vbed.jpg', 'http://localhost/default/img-uploads', '', '2015-02-09 17:10:21', '2015-02-09 17:10:21'),
(14, 'OlqtVZHJ20150118_071223.jpg', 'http://192.168.1.2:5000/public/default/img-uploads/', '', '2015-02-20 06:30:31', '2015-02-20 06:30:31');

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
('3ZbpZ3107', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', 'New Reservation', 'A new reservation was booked.<br/> Booking id: MbZ20150227141620<br/>Booked by: 201502363556t9Ixyo', 5, '2015-02-27 06:16:33', '2015-02-27 06:16:33'),
('av0gS1110', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', 'New Reservation', 'A new reservation was booked.<br/> Booking id: 9L220150227154040<br/>Booked by: 201502903107w2vP8K', 5, '2015-02-27 07:40:46', '2015-02-27 07:40:46'),
('bbtuo7624', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', 'New Reservation', 'A new reservation was booked.<br/> Booking id: q9A20150227154453<br/>Booked by: 201502363556t9Ixyo', 5, '2015-02-27 07:45:03', '2015-02-27 07:45:03'),
('CK2vp2045', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', 'New Reservation', 'A new reservation was booked.<br/> Booking id: c6y20150227204536<br/>Booked by: 201502903107w2vP8K', 5, '2015-02-27 12:45:45', '2015-02-27 12:45:45'),
('dLwG59776', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', 'New Reservation', 'A new reservation was booked.<br/> Booking id: o1J20150227153900<br/>Booked by: 201502363556t9Ixyo', 5, '2015-02-27 07:39:06', '2015-02-27 07:39:06'),
('g9CHf6582', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', 'New Reservation', 'A new reservation was booked.<br/> Booking id: tmy20150228023410<br/>Booked by: 201502903107w2vP8K', 5, '2015-02-27 18:34:22', '2015-02-27 18:34:22'),
('hw8s94022', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', 'New Reservation', 'A new reservation was booked.<br/> Booking id: IpJ20150227153729<br/>Booked by: 201502903107w2vP8K', 5, '2015-02-27 07:37:36', '2015-02-27 07:37:36'),
('iDj0f8158', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', 'New Reservation', 'A new reservation was booked.<br/> Booking id: o1J20150227153900<br/>Booked by: 201502363556t9Ixyo', 5, '2015-02-27 07:39:10', '2015-02-27 07:39:10'),
('ixdB27624', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', 'New Reservation', 'A new reservation was booked.<br/> Booking id: tmy20150228023410<br/>Booked by: 201502903107w2vP8K', 5, '2015-02-27 18:34:18', '2015-02-27 18:34:18'),
('jngSY5956', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', 'New Reservation', 'A new reservation was booked.<br/> Booking id: NVe20150227154220<br/>Booked by: 201502363556t9Ixyo', 5, '2015-02-27 07:42:26', '2015-02-27 07:42:26'),
('kt1Ny7718', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', 'New Reservation', 'A new reservation was booked.<br/> Booking id: 9L220150227154040<br/>Booked by: 201502903107w2vP8K', 5, '2015-02-27 07:40:50', '2015-02-27 07:40:50'),
('L4mKF6930', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', 'New Reservation', 'A new reservation was booked.<br/> Booking id: q9A20150227154453<br/>Booked by: 201502363556t9Ixyo', 5, '2015-02-27 07:44:59', '2015-02-27 07:44:59'),
('LIcVe8636', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', 'New Reservation', 'A new reservation was booked.<br/> Booking id: c6y20150227204536<br/>Booked by: 201502903107w2vP8K', 5, '2015-02-27 12:45:49', '2015-02-27 12:45:49'),
('Rpp0x9036', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', 'New Reservation', 'A new reservation was booked.<br/> Booking id: 3UL20150228023238<br/>Booked by: 201502363556t9Ixyo', 5, '2015-02-27 18:32:47', '2015-02-27 18:32:47'),
('rXLPq149', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', 'New Reservation', 'A new reservation was booked.<br/> Booking id: 3UL20150228023238<br/>Booked by: 201502363556t9Ixyo', 5, '2015-02-27 18:32:51', '2015-02-27 18:32:51'),
('UNvu82449', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', 'New Reservation', 'A new reservation was booked.<br/> Booking id: NVe20150227154220<br/>Booked by: 201502363556t9Ixyo', 5, '2015-02-27 07:42:29', '2015-02-27 07:42:29'),
('XAMLJ645', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', 'New Reservation', 'A new reservation was booked.<br/> Booking id: MbZ20150227141620<br/>Booked by: 201502363556t9Ixyo', 5, '2015-02-27 06:16:37', '2015-02-27 06:16:37'),
('ZXAUe9433', 'System', 'mail.sunrock@gmail.com', 'mail.sunrock@gmail.com', 'System', 'New Reservation', 'A new reservation was booked.<br/> Booking id: IpJ20150227153729<br/>Booked by: 201502903107w2vP8K', 5, '2015-02-27 07:37:40', '2015-02-27 07:37:40');

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
  `paxmin` int(4) NOT NULL,
  `paxmax` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=65 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `productname`, `productdesc`, `productprice`, `productquantity`, `fileid`, `producttypeid`, `active`, `created_at`, `updated_at`, `paxmin`, `paxmax`) VALUES
(1, 'Diamond One', 'Diamond 1 or D-1 can accomodate up to 4 - 6 person. With Aircondition, TV and Private Toilet.', '2000.00', 1, 2, 2, 1, '2015-02-09 17:10:15', '2015-02-27 12:55:21', 1, 6),
(2, 'Diamond Two', 'Diamond-2 can accomodate up to 2 - 3 person. With Aircondition, TV and Toilet.', '1200.00', 1, 3, 2, 1, '2015-02-09 17:10:15', '2015-02-09 17:10:15', 2, 3),
(3, 'Diamond Three', 'Diamond-3 can accomodate up to 2 - 3 person. With Aircondition, TV and Toilet.', '1300.00', 1, 3, 2, 1, '2015-02-09 17:10:15', '2015-02-09 17:10:15', 2, 3),
(4, 'Diamond Four', 'Without Aircondition and Toilet.', '800.00', 1, 2, 2, 1, '2015-02-09 17:10:16', '2015-02-09 17:10:16', 2, 3),
(5, 'Diamond Five', 'Without Aircondition and Toilet.', '800.00', 1, 3, 2, 1, '2015-02-09 17:10:16', '2015-02-09 17:10:16', 2, 3),
(6, 'Diamond Six', 'Without Aircondition and Toilet.', '800.00', 1, 3, 2, 1, '2015-02-09 17:10:16', '2015-02-09 17:10:16', 2, 3),
(7, 'Opal & Pearl', 'Opal or Perl can accomodate 2 person. With Aircondition, TV and Private Toilet.', '1200.00', 1, 4, 2, 1, '2015-02-09 17:10:16', '2015-02-09 17:10:16', 2, 2),
(8, 'RUBY 1', 'Ruby 1 can accomodate 2 person. With Aircondition, TV and Private Toilet.', '1500.00', 1, 5, 2, 1, '2015-02-09 17:10:16', '2015-02-09 17:10:16', 2, 2),
(9, 'RUBY 2', 'Ruby 2 can accomodate 2 person. With Aircondition, TV and Private Toilet.', '1500.00', 1, 5, 2, 1, '2015-02-09 17:10:16', '2015-02-09 17:10:16', 2, 2),
(10, 'RUBY 3', 'Ruby 3 can accomodate 2 person. With Aircondition, TV and Private Toilet w/ Hot Shower.', '1800.00', 1, 6, 2, 1, '2015-02-09 17:10:16', '2015-02-09 17:10:16', 1, 2),
(11, 'RUBY 4', 'Ruby 4 can accomodate 2 person. With Aircondition, TV and Private Toilet w/ Hot Shower.', '1800.00', 1, 6, 1, 1, '2015-02-09 17:10:16', '2015-02-09 17:10:16', 1, 2),
(12, 'RUBY 5', 'Ruby 5 can accomodate 4 - 6 person. With Aircondition, TV and Private Toilet w/ Hot Shower & Jacuzzi.', '3500.00', 1, 7, 2, 1, '2015-02-09 17:10:16', '2015-02-09 17:10:16', 1, 6),
(13, 'RUBY 6', 'Ruby 6 can accomodate 4 - 6 person. With Aircondition, TV and Private Toilet w/ Hot Shower & Jacuzzi.', '3500.00', 1, 7, 2, 1, '2015-02-09 17:10:16', '2015-02-09 17:10:16', 1, 6),
(14, 'Ruby Seminar Room', 'Ruby Seminar Room can accomodate 80 - 100 person.', '6500.00', 1, 7, 2, 1, '2015-02-09 17:10:16', '2015-02-09 17:10:16', 1, 100),
(15, 'Sapphire', 'Sapphire can accomodate 80 - 100 person.', '3500.00', 1, 7, 2, 1, '2015-02-09 17:10:16', '2015-02-09 17:10:16', 1, 100),
(16, 'TOPAZ 1 UPPER', 'Topaz 1 can accomodate 2 - 15 person. With Aircondition, TV, Private Toilet and Kitchen. Topaz room is good for those who conduct there retreat.', '4000.00', 1, 8, 2, 1, '2015-02-09 17:10:16', '2015-02-09 17:10:16', 1, 15),
(17, 'TOPAZ 2 LOWER', 'Topaz 1 can accomodate 2 - 15 person. With Aircondition, TV, Private Toilet and Kitchen. Topaz room is good for those who conduct there retreat.', '3500.00', 1, 9, 2, 1, '2015-02-09 17:10:16', '2015-02-09 17:10:16', 1, 15),
(18, 'MULTI-PURPOSE', 'Mutli-Purpose can accomodate 80 - 150 person. Its good for kids party and Wedding Venue.', '6000.00', 1, 10, 2, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17', 1, 150),
(19, 'Children Admission Ticket', 'Fee for children.', '100.00', 999, 11, 3, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17', 0, 0),
(20, 'Adult Admission Ticket', 'Fee for adults.', '130.00', 999, 12, 3, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17', 0, 0),
(21, 'Night Rate Children Admission Ticket', 'Night rate Fee for children', '120.00', 999, 11, 3, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17', 0, 0),
(22, 'Night Rate Adult Admission Ticket', 'Night rate Fee for adults. ', '150.00', 999, 12, 3, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17', 0, 0),
(23, 'Extra Bed', 'A comfortable bed for rentals.', '200.00', 999, 13, 4, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17', 0, 0),
(24, 'Concrete Round tables', '4-6 Persons.', '300.00', 1, 10, 1, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17', 1, 6),
(25, 'Concrete Square tables', '4-6 Persons.', '350.00', 1, 10, 1, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17', 1, 6),
(26, 'Cottage #1', '20 Persons.', '1800.00', 1, 10, 1, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17', 1, 20),
(27, 'Cottage #2', '18 Persons.', '1200.00', 1, 10, 1, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17', 1, 18),
(28, 'Cottage #3', '18 Persons.', '1200.00', 1, 10, 1, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17', 1, 18),
(29, 'Cottage #4', '10 Persons.', '600.00', 1, 10, 1, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17', 1, 10),
(30, 'Cottage #5', '10 Persons.', '600.00', 1, 10, 1, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17', 1, 10),
(31, 'Cottage #6', '10 Persons.', '600.00', 1, 10, 1, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17', 1, 10),
(32, 'Cottage #7', '10 Persons.', '600.00', 1, 10, 1, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17', 1, 10),
(33, 'Cottage #8', '10 Persons.', '600.00', 1, 10, 1, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17', 1, 10),
(34, 'Cottage #9', '15 Persons. With Grill and faucet.', '1000.00', 1, 10, 1, 1, '2015-02-09 17:10:17', '2015-02-09 17:10:17', 1, 15),
(35, 'Cottage #10', '15 Persons. With Grill and faucet.', '1000.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18', 1, 15),
(36, 'Cottage #11', '15 Persons. With Grill and faucet.', '1000.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18', 1, 15),
(37, 'Cottage #12', '18 Persons.', '1200.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18', 1, 18),
(38, 'Cottage Swing #13', '4 Persons.', '400.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18', 1, 4),
(39, 'Cottage #14', '20 Persons. Overlooking with grill and faucet.', '1500.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18', 1, 20),
(40, 'Cottage #15', '20 Persons. Overlooking with grill and faucet.', '1500.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18', 1, 20),
(41, 'Cottage #16', '20 Persons. Overlooking with grill and faucet.', '1500.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18', 1, 20),
(42, 'Cottage #17', '14-16 persons.', '700.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18', 1, 16),
(43, 'Cottage #18', '14-16 persons.', '700.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18', 1, 16),
(44, 'Cottage #19', '14-16 persons.', '700.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18', 1, 16),
(45, 'Calleza Type tables #20', '10 persons.', '700.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18', 1, 10),
(46, 'Calleza Type tables #21', '10 persons.', '700.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18', 1, 10),
(47, 'Cottage #22', '8 persons.', '500.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18', 1, 8),
(48, 'Cottage #23', '15 persons.', '800.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18', 1, 15),
(49, 'Cottage #24', '15 persons.', '800.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18', 1, 15),
(50, 'Concrete Tables #25', '10 persons.', '700.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18', 1, 10),
(51, 'Calleza Type table #26', '6 persons.', '500.00', 1, 10, 1, 1, '2015-02-09 17:10:18', '2015-02-09 17:10:18', 1, 6),
(52, 'Calleza Type tables #27', '10 persons.', '700.00', 1, 10, 1, 1, '2015-02-09 17:10:19', '2015-02-09 17:10:19', 1, 10),
(53, 'Concrete Tables #28', '10 persons.', '700.00', 1, 10, 1, 1, '2015-02-09 17:10:19', '2015-02-09 17:10:19', 1, 10),
(54, 'Upper Cottage #29', '20-22 persons.', '1800.00', 1, 10, 1, 1, '2015-02-09 17:10:19', '2015-02-09 17:10:19', 1, 22),
(55, 'Upper Cottage #30', '20-22 persons.', '1800.00', 1, 10, 1, 1, '2015-02-09 17:10:19', '2015-02-09 17:10:19', 1, 22),
(56, 'Upper Cottage #31', '20-22 persons.', '1800.00', 1, 10, 1, 1, '2015-02-09 17:10:19', '2015-02-09 17:10:19', 1, 22),
(57, 'Cottage #32', '18 persons.', '1000.00', 1, 10, 1, 1, '2015-02-09 17:10:19', '2015-02-09 17:10:19', 1, 18),
(58, 'Cottage #33', '18 persons.', '1000.00', 1, 10, 1, 1, '2015-02-09 17:10:19', '2015-02-09 17:10:19', 1, 18),
(59, 'Gazebo', '35 persons. With faucet and grill.', '2500.00', 1, 10, 1, 1, '2015-02-09 17:10:19', '2015-02-09 17:10:19', 1, 35),
(60, 'Tree House', '25 persons.', '2500.00', 1, 10, 1, 1, '2015-02-09 17:10:19', '2015-02-09 17:10:19', 1, 25),
(61, 'Liquor Fee', 'Liquor Fee per piece', '100.00', 999, 1, 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(62, 'Beer Fee', 'Fee for case of beer', '100.00', 999, 1, 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(63, 'Appliance Fee', 'Fee for appliances', '100.00', 999, 1, 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(64, 'New Product test', 'Can accomodate 1-5 persons', '1000.00', 1, 2, 2, 1, '2015-02-27 12:57:12', '2015-02-27 12:57:46', 1, 5);

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
('201502470886s01d8o', 'w7WSpWOVRy0bYuNmonWlsn5SKH5cJNTcSUiyDLH5', 19, 1, '100.00', '2015-02-27 12:47:20', '2015-02-27 12:47:20', '100.00', 'addons', '', '201502376007ofmlSs'),
('201502526154xg9lrw', '20150227LyTDaDmIwMwXCfSd4zkEEJwDWL6TQN8K8CKU6beLpDrEH', 20, 1, '65.00', '2015-02-27 11:12:57', '2015-02-27 11:12:57', '65.00', 'reservation-half', '', '201502840821K2uiU1'),
('201502616608fZaQZv', '20150227tyhlv1E9Fg3c6fhAox7aSPU4IxX1AyLNta76WvzVylfA3', 2, 1, '600.00', '2015-02-27 07:49:36', '2015-02-27 07:49:36', '600.00', 'reservation-half', '', '2015028835155OZaqS'),
('201502695435ujg5vs', '20150227tyhlv1E9Fg3c6fhAox7aSPU4IxX1AyLNta76WvzVylfA3', 20, 1, '65.00', '2015-02-27 07:49:36', '2015-02-27 07:49:36', '65.00', 'reservation-half', '', '2015028835155OZaqS'),
('201502904847pAwaPs', '20150227LyTDaDmIwMwXCfSd4zkEEJwDWL6TQN8K8CKU6beLpDrEH', 20, 1, '65.00', '2015-02-27 11:12:16', '2015-02-27 11:12:16', '65.00', 'reservation-half', '', '201502237213LwoZbE'),
('2015029618531uiQTO', '20150227LyTDaDmIwMwXCfSd4zkEEJwDWL6TQN8K8CKU6beLpDrEH', 1, 1, '1000.00', '2015-02-27 11:12:57', '2015-02-27 11:12:57', '1000.00', 'reservation-half', '', '201502840821K2uiU1'),
('201502973725lGJTh0', '20150227LyTDaDmIwMwXCfSd4zkEEJwDWL6TQN8K8CKU6beLpDrEH', 1, 1, '1000.00', '2015-02-27 11:12:16', '2015-02-27 11:12:16', '1000.00', 'reservation-half', '', '201502237213LwoZbE');

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
('20150227LyTDaDmIwMwXCfSd4zkEEJwDWL6TQN8K8CKU6beLpDrEH', '201502363556t9Ixyo', 'NVe20150227154220', 'bank', '{{Form::hidden(''token'' , Session::getToken())}}', 'BPI', '1192.80', 'xnalimits@gmail.com', 'fullypaid', '', '2385.60', NULL, NULL, 'half', '2015-02-27 11:11:25', '2015-02-27 11:12:57'),
('20150227tyhlv1E9Fg3c6fhAox7aSPU4IxX1AyLNta76WvzVylfA3', '201502363556t9Ixyo', 'q9A20150227154453', 'bank', 'testabcd', 'BPI', '744.80', 'xnalimits@gmail.com', 'confirmed', '', '1489.60', NULL, NULL, 'half', '2015-02-27 07:47:27', '2015-02-27 07:49:36');

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

CREATE DEFINER=`root`@`localhost` EVENT `AutoExpire` ON SCHEDULE EVERY 1 MINUTE STARTS '2015-02-21 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO DELETE from booking where created_at < DATE_SUB(NOW(),INTERVAL 15 DAY) and active <= 1$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
