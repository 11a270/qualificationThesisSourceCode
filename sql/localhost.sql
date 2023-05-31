-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 31, 2023 at 05:06 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etalons`
--
CREATE DATABASE IF NOT EXISTS `etalons` DEFAULT CHARACTER SET utf32 COLLATE utf32_unicode_ci;
USE `etalons`;

-- --------------------------------------------------------

--
-- Table structure for table `accounttypes`
--

CREATE TABLE IF NOT EXISTS `accounttypes` (
  `name` varchar(50) COLLATE utf32_unicode_ci NOT NULL DEFAULT '',
  `visibleName` text COLLATE utf32_unicode_ci NOT NULL,
  `isBlocked` enum('Y','N') COLLATE utf32_unicode_ci NOT NULL,
  `fareReducingRate` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `accounttypes`
--

INSERT INTO `accounttypes` (`name`, `visibleName`, `isBlocked`, `fareReducingRate`) VALUES
('BLOCKED', 'BLOCKED', 'Y', 0),
('pens', 'Old', 'N', 100),
('std', 'Standart', 'N', 0),
('stud', 'Student', 'N', 100),
('uarefug', 'War refugees', 'N', 100),
('uni', 'High school student', 'N', 50);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` varchar(3) COLLATE utf32_unicode_ci NOT NULL,
  `name` text COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
('ANT', 'Antarctica'),
('ARA', 'Al-Arabiya'),
('ARM', 'Armenia'),
('BLG', 'Burglaria'),
('BOS', 'Bosnia and Herzegovina'),
('CAN', 'Canada'),
('CRO', 'Croatia'),
('CYP', 'Cyprus'),
('CZK', 'Czechia'),
('DZA', 'Algeria'),
('EIR', 'Ireland'),
('EST', 'Estonia'),
('EUK', 'England'),
('FIN', 'Finland'),
('GBR', 'Gibraltar'),
('GRC', 'Greece'),
('HKG', 'Hong Kong'),
('HUN', 'Hungary'),
('ICK', 'Ichkeria'),
('IDI', 'India'),
('IND', 'Indonesia'),
('ISR', 'Israel'),
('JPN', 'Japan'),
('KBH', 'Karabakh'),
('KBR', 'Congo'),
('KOR', 'Korea'),
('KPS', 'Karakalpakstan'),
('KUR', 'Kurdistan'),
('KYR', 'Kyrgyzstan'),
('LAT', 'Latvia'),
('LIT', 'Lithuainia'),
('LLD', 'Liberland'),
('MCD', 'Macedonia'),
('MCO', 'Aomen/Macao'),
('MHN', 'Åland'),
('MOD', 'Moldova'),
('NSU', 'Sudan'),
('OSR', 'Austria'),
('PAK', 'Pakistan'),
('PER', 'Peru'),
('PLU', 'Palau'),
('PRC', 'Communist Government in Beijing'),
('PTU', 'Portugal'),
('QAZ', 'Kazakhstan'),
('ROA', 'Romania'),
('ROC', 'China'),
('SCL', 'Scotland'),
('SHK', 'Kosovo'),
('SHQ', 'Albania'),
('SKV', 'Georgia'),
('SLD', 'Sealand'),
('SLO', 'Slovakia'),
('SLV', 'Slovenia'),
('SRB', 'Serbija'),
('SSU', 'South Sudan'),
('TAJ', 'Tajikistan'),
('TIB', 'Tibet'),
('TKM', 'Turkestan'),
('UKR', 'Ukraine'),
('USA', 'The United States of America'),
('UZB', 'Uzbekistan'),
('VOJ', 'Vojvodina'),
('WLS', 'Wales'),
('XJG', 'Uyghuristan');

-- --------------------------------------------------------

--
-- Table structure for table `etalons`
--

CREATE TABLE IF NOT EXISTS `etalons` (
  `id` bigint(15) NOT NULL AUTO_INCREMENT,
  `serialN` bigint(15) NOT NULL,
  `holderFirstName` text COLLATE utf32_unicode_ci,
  `holderLastName` text COLLATE utf32_unicode_ci,
  `holderPersonal_ID` text COLLATE utf32_unicode_ci,
  `issuedOn` date DEFAULT NULL,
  `expiringOn` date DEFAULT NULL,
  `userCardBelongsTo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_etalons_useraccount` (`userCardBelongsTo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `etalons`
--

INSERT INTO `etalons` (`id`, `serialN`, `holderFirstName`, `holderLastName`, `holderPersonal_ID`, `issuedOn`, `expiringOn`, `userCardBelongsTo`) VALUES
(1, 123456789012346, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 256616537326201, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 111111111111111, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 123456789012345, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE IF NOT EXISTS `msg` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` char(255) COLLATE utf32_unicode_ci NOT NULL,
  `email` char(255) COLLATE utf32_unicode_ci NOT NULL,
  `text` text COLLATE utf32_unicode_ci NOT NULL,
  `isRead` enum('','') COLLATE utf32_unicode_ci NOT NULL,
  `isAnswrd` enum('','') COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`id`, `name`, `email`, `text`, `isRead`, `isAnswrd`) VALUES
(1, 'varc', 'epasc@inbox.lv', 'aaaaa krc vot mana karte 4921 8185 5715 8014 lids 08/09 un cvc ira 161 citus datus sutishu velag', '', ''),
(2, 'varc', 'epasc@inbox.lv', 'vot te nau jaa rada manus datus visiem okej a to visi is mantos manas navdinjas es shito ne gribu', '', ''),
(3, 'varc', 'epasc@inbox.lv', 'vot te nau jaa rada manus datus visiem okej a to visi is mantos manas navdinjas es shito ne gribu', '', ''),
(4, 'varc', 'epasc@inbox.lv', 'vot te nau jaa rada manus datus visiem okej a to visi is mantos manas navdinjas es shito ne gribu', '', ''),
(5, 'varc', 'epasc@inbox.lv', 'vot te nau jaa rada manus datus visiem okej a to visi is mantos manas navdinjas es shito ne gribu', '', ''),
(6, 'varc', 'epasc@inbox.lv', 'vot te nau jaa rada manus datus visiem okej a to visi is mantos manas navdinjas es shito ne gribu', '', ''),
(7, 'varc', 'epasc@inbox.lv', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '', ''),
(8, 'varc', 'epasc@inbox.lv', 'asdfghjkl', '', ''),
(9, 'fdhafhds', 'a@a.aa', 'bkjgbklhguy bjashfbj', '', ''),
(10, 'Tatjana', 'kurakina.tatjana@gmail.com', 'Kā es varu nopirkt biļeti?', '', ''),
(11, 'awww', 'a@a.aa', 'asdfghj', '', ''),
(12, '234567', '121@aaa.ua', '1234567890ertsdfygvy', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `id` bigint(15) NOT NULL,
  `type` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `addedOn` date NOT NULL,
  `addedTo` int(15) NOT NULL,
  `expiresOn` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ticket_etalons` (`addedTo`),
  KEY `FK_ticket_tickettype` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickettype`
--

CREATE TABLE IF NOT EXISTS `tickettype` (
  `name` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `visibleName` text COLLATE utf32_unicode_ci COMMENT 'visible name',
  `duration` decimal(20,6) NOT NULL DEFAULT '0.000000' COMMENT 'duration must be entered in hours',
  `price` float NOT NULL DEFAULT '0',
  `reduced` enum('Y','N') COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`name`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `tickettype`
--

INSERT INTO `tickettype` (`name`, `visibleName`, `duration`, `price`, `reduced`) VALUES
('90min', '90 minutes', '1.500000', 1.5, 'N'),
('day', 'One day', '24.000000', 4.5, 'N'),
('mon', 'One month', '720.000000', 30, 'N'),
('week', 'One week', '168.000000', 15, 'N'),
('yr', 'One year', '8784.000000', 75, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE IF NOT EXISTS `useraccount` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `email` text COLLATE utf32_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf32_unicode_ci NOT NULL,
  `userFirstName` text COLLATE utf32_unicode_ci,
  `userLastName` text COLLATE utf32_unicode_ci,
  `userPersonalIDNumber` text COLLATE utf32_unicode_ci,
  `mobilePhoneNum` varchar(20) COLLATE utf32_unicode_ci DEFAULT NULL,
  `landlinePhoneNum` varchar(20) COLLATE utf32_unicode_ci DEFAULT NULL,
  `accountType` varchar(50) COLLATE utf32_unicode_ci NOT NULL DEFAULT 'std',
  `typeExpiring` date DEFAULT NULL,
  PRIMARY KEY (`userid`),
  KEY `FK_useraccount_accounttypes` (`accountType`)
) ENGINE=InnoDB AUTO_INCREMENT=88888905 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `useraccount`
--

INSERT INTO `useraccount` (`userid`, `login`, `email`, `password`, `userFirstName`, `userLastName`, `userPersonalIDNumber`, `mobilePhoneNum`, `landlinePhoneNum`, `accountType`, `typeExpiring`) VALUES
(1, 'aaaaa', 'a@i.ua', 'T@!7sAX;=Aw,HN6', 'aaaaaaaaaaaa', 'a', '123456-78901', '+1 (800) 555-3535', '', 'std', NULL),
(2, 'lapca12345', 'ahci.expert@hotmail.com', 'PaSsWoRd12345', 'Nastenka', 'Kovylaeva', NULL, NULL, NULL, 'std', NULL),
(3, 'XiThePooh', 'jinping.zhuxi@baidu.com', '19WoAiBeijingTiananmen89', 'Jingpin', 'Xi', NULL, NULL, NULL, 'BLOCKED', '2043-03-10'),
(4, 'admin', 'admin@admin.ad', 'cdf8994103ae18a7b6ee7950d3718ef7', 'admin', 'admin', '123456-78901', '+1 (800) 555-3535', '', 'std', NULL),
(88888904, 'id', 'a@a.aa', '62ddfaab30f221b0bef11d5e69e1afb1', 'trsxerdx', 'hffg', '', '+1 (800) 555-3535', '', 'std', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `etalons`
--
ALTER TABLE `etalons`
  ADD CONSTRAINT `FK_etalons_useraccount` FOREIGN KEY (`userCardBelongsTo`) REFERENCES `useraccount` (`userid`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `FK_ticket_tickettype` FOREIGN KEY (`type`) REFERENCES `tickettype` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD CONSTRAINT `FK_useraccount_accounttypes` FOREIGN KEY (`accountType`) REFERENCES `accounttypes` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
