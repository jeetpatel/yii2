-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 07, 2017 at 12:00 AM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `v7`
--

-- --------------------------------------------------------

--
-- Table structure for table `firm`
--

CREATE TABLE IF NOT EXISTS `firm` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `firm_name` varchar(50) NOT NULL,
  `firm_type` int(10) NOT NULL,
  `is_registered` smallint(2) NOT NULL DEFAULT '1' COMMENT '1:true,0:false',
  `vat_number` varchar(20) DEFAULT NULL,
  `cst_number` varchar(20) DEFAULT NULL,
  `gst_number` varchar(20) DEFAULT NULL,
  `pan_number` varchar(20) DEFAULT NULL,
  `tan_number` varchar(20) DEFAULT NULL,
  `service_tax` varchar(20) DEFAULT NULL,
  `primary_contact` varchar(12) NOT NULL,
  `primary_email` varchar(255) NOT NULL,
  `address_1` varchar(255) NOT NULL,
  `address_2` varchar(255) DEFAULT NULL,
  `district` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pin_code` int(6) NOT NULL,
  `longitude` float(10,6) DEFAULT NULL,
  `latitude` float(10,6) DEFAULT NULL,
  `status` smallint(2) NOT NULL DEFAULT '1' COMMENT '1:Active,2:Closed',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `firm_name` (`firm_name`),
  KEY `firm_type` (`firm_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `firm`
--

INSERT INTO `firm` (`id`, `firm_name`, `firm_type`, `is_registered`, `vat_number`, `cst_number`, `gst_number`, `pan_number`, `tan_number`, `service_tax`, `primary_contact`, `primary_email`, `address_1`, `address_2`, `district`, `state`, `pin_code`, `longitude`, `latitude`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Test', 7, 1, '', '', '', '', '', '', '9582293156', 'jeet.mail72@gmail.com', 'noida', '', 'Noida', 'Uttar Pradesh', 55555555, 10000.000000, 10000.000000, 1, 1486402536, 1486402536);

-- --------------------------------------------------------

--
-- Table structure for table `firm_type`
--

CREATE TABLE IF NOT EXISTS `firm_type` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` smallint(2) NOT NULL DEFAULT '1' COMMENT '1:Active,2:Closed',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `firm_type`
--

INSERT INTO `firm_type` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Firm1aa 113', 'firm111 113', 1, 1486316279, 1486403457),
(8, 'Firm2', 'firm111', 1, 1486403471, 1486403471);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'JEET', 'LAL', 1485667570, 1485667570),
(3, 17, 'jeet', 'LAL', 1485667976, 1485667976);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin@gmail.com', 10, 0, 0),
(17, 'jeet1', 'Gq1scMZ9NwjO-WWS6XpgW3F79sFf_ZIk', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'admin2@gmail.com', 10, 1485667976, 1485667976);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `firm`
--
ALTER TABLE `firm`
  ADD CONSTRAINT `firm_type_id` FOREIGN KEY (`firm_type`) REFERENCES `firm_type` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
