-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2023 at 08:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
  `name` varchar(50) NOT NULL DEFAULT '',
  `visibleName` text NOT NULL,
  `isBlocked` enum('Y','N') NOT NULL,
  `fareReducingRate` tinyint(4) NOT NULL DEFAULT 0,
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
  `id` varchar(3) NOT NULL,
  `name` text NOT NULL,
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
  `holderFirstName` text DEFAULT NULL,
  `holderLastName` text DEFAULT NULL,
  `holderPersonal_ID` text DEFAULT NULL,
  `issuedOn` date DEFAULT NULL,
  `expiringOn` date DEFAULT NULL,
  `userCardBelongsTo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_etalons_useraccount` (`userCardBelongsTo`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `etalons`
--

INSERT INTO `etalons` (`id`, `serialN`, `holderFirstName`, `holderLastName`, `holderPersonal_ID`, `issuedOn`, `expiringOn`, `userCardBelongsTo`) VALUES
(16, 1111111111, '', '', '', NULL, NULL, 0),
(17, 1111111112, '', '', '', NULL, NULL, 6),
(18, 1111111113, '', '', '', NULL, NULL, 0),
(19, 123456789012345, 'aaa', 'sss', 'ddd', NULL, NULL, 0),
(20, 123456789012346, '', '', '', NULL, NULL, 0),
(21, 256616537326201, '', '', '', NULL, NULL, 0),
(22, 111111111111123, '', '', '', NULL, NULL, 0),
(23, 123456789012348, '', '', '', NULL, NULL, 0),
(24, 199999999999999, '', '', '', NULL, NULL, 0),
(25, 0, '', '', '', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE IF NOT EXISTS `msg` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` char(255) NOT NULL,
  `email` char(255) NOT NULL,
  `text` text NOT NULL,
  `isRead` enum('','') NOT NULL,
  `isAnswrd` enum('','') NOT NULL,
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
  `id` bigint(15) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `addedOn` date NOT NULL DEFAULT curdate(),
  `addedTo` bigint(15) NOT NULL,
  `expiresOn` date DEFAULT (curdate() + interval 1 year),
  PRIMARY KEY (`id`),
  KEY `FK_ticket_etalons` (`addedTo`),
  KEY `FK_ticket_tickettype` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `type`, `addedOn`, `addedTo`, `expiresOn`) VALUES
(24, '1_90min', '0000-00-00', 0, NULL),
(25, '1_90min', '0000-00-00', 0, NULL),
(26, '1_90min', '0000-00-00', 0, NULL),
(27, '1_90min', '0000-00-00', 0, NULL),
(28, '1_90min', '0000-00-00', 0, NULL),
(29, '2_day', '2023-06-10', 0, NULL),
(30, '2_day', '2023-06-10', 0, NULL),
(31, '2_day', '2023-06-10', 0, '2024-06-10'),
(32, '2_day', '2023-06-10', 0, '2024-06-10'),
(33, '2_day', '2023-06-10', 0, '2024-06-10'),
(34, '2_day', '2023-06-10', 0, '2024-06-10'),
(35, '2_day', '2023-06-10', 0, '2024-06-10'),
(36, '2_day', '2023-06-10', 0, '2024-06-10'),
(37, '2_day', '2023-06-10', 0, '2024-06-10'),
(38, '2_day', '2023-06-10', 0, '2024-06-10'),
(39, '6_qtrYr', '2023-06-10', 0, '2024-06-10'),
(40, '6_qtrYr', '2023-06-10', 0, '2024-06-10'),
(41, '6_qtrYr', '2023-06-10', 0, '2024-06-10'),
(42, '6_qtrYr', '2023-06-10', 0, '2024-06-10'),
(43, '6_qtrYr', '2023-06-10', 0, '2024-06-10'),
(44, 'yr', '2023-06-10', 0, '2024-06-10'),
(45, 'yr', '2023-06-10', 0, '2024-06-10'),
(46, 'yr', '2023-06-10', 0, '2024-06-10'),
(47, '2_day', '2023-06-10', 0, '2024-06-10'),
(48, '2_day', '2023-06-10', 0, '2024-06-10'),
(49, '2_day', '2023-06-10', 0, '2024-06-10'),
(50, '1_90min', '2023-06-10', 0, '2024-06-10'),
(51, '5_mon', '2023-06-10', 0, '2024-06-10'),
(52, '1_90min', '2023-06-10', 0, '2024-06-10'),
(53, 'yr', '2023-06-10', 0, '2024-06-10'),
(54, 'yr', '2023-06-10', 0, '2024-06-10'),
(55, 'yr', '2023-06-10', 0, '2024-06-10'),
(56, '4_week', '2023-06-10', 0, '2024-06-10'),
(57, '4_week', '2023-06-10', 0, '2024-06-10'),
(58, 'yr', '2023-06-12', 0, '2024-06-12'),
(59, 'yr', '2023-06-12', 0, '2024-06-12'),
(60, 'yr', '2023-06-12', 0, '2024-06-12'),
(61, 'yr', '2023-06-12', 0, '2024-06-12'),
(62, 'yr', '2023-06-12', 0, '2024-06-12'),
(63, 'yr', '2023-06-12', 0, '2024-06-12'),
(64, 'yr', '2023-06-12', 0, '2024-06-12'),
(65, 'yr', '2023-06-12', 0, '2024-06-12'),
(66, 'yr', '2023-06-12', 0, '2024-06-12'),
(67, 'yr', '2023-06-12', 0, '2024-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `tickettype`
--

CREATE TABLE IF NOT EXISTS `tickettype` (
  `name` varchar(50) NOT NULL,
  `visibleName` text DEFAULT NULL COMMENT 'visible name',
  `duration` decimal(20,6) NOT NULL DEFAULT 0.000000 COMMENT 'duration must be entered in hours',
  `price` float NOT NULL DEFAULT 0,
  `reduced` enum('Y','N') NOT NULL,
  PRIMARY KEY (`name`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `tickettype`
--

INSERT INTO `tickettype` (`name`, `visibleName`, `duration`, `price`, `reduced`) VALUES
('1_90min', '1 1/2 stundas biļete ($1.50)', 1.500000, 1.5, 'N'),
('123', 'test', 0.000000, 0, 'N'),
('2_day', 'Dienas biļete ($4.50)', 24.000000, 4.5, 'N'),
('3day', '3 dienu biļete ($11.50)', 72.000000, 11, 'N'),
('4_week', 'Nedēļas biļete ($15.00)', 168.000000, 15, 'N'),
('5_mon', 'Mēneša biļete ($30.00)', 720.000000, 30, 'N'),
('6_qtrYr', 'Ceturkšņa biļete ($75.00)', 2196.000000, 75, 'N'),
('yr', 'Gada biļete ($300.00)', 8784.000000, 300, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE IF NOT EXISTS `useraccount` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(32) NOT NULL,
  `userFirstName` text DEFAULT NULL,
  `userLastName` text DEFAULT NULL,
  `userPersonalIDNumber` text DEFAULT NULL,
  `mobilePhoneNum` varchar(20) DEFAULT NULL,
  `landlinePhoneNum` varchar(20) DEFAULT NULL,
  `accountType` varchar(50) NOT NULL DEFAULT 'std',
  `typeExpiring` date DEFAULT NULL,
  PRIMARY KEY (`userid`),
  KEY `FK_useraccount_accounttypes` (`accountType`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `useraccount`
--

INSERT INTO `useraccount` (`userid`, `login`, `email`, `password`, `userFirstName`, `userLastName`, `userPersonalIDNumber`, `mobilePhoneNum`, `landlinePhoneNum`, `accountType`, `typeExpiring`) VALUES
(0, 'admin', 'admin@admin.ad', 'cdf8994103ae18a7b6ee7950d3718ef7', 'admin', 'admin', '123456-78901', '+1 (800) 555-3535', '', 'std', NULL),
(1, 'aaaaa', 'a@i.ua', 'T@!7sAX;=Aw,HN6', 'aaaaaaaaaaaa', 'a', '123456-78901', '+1 (800) 555-3535', '', 'std', NULL),
(2, 'lapca12345', 'ahci.expert@hotmail.com', 'PaSsWoRd12345', 'Nastenka', 'Kovylaeva', NULL, NULL, NULL, 'std', NULL),
(3, 'XiThePooh', 'jinping.zhuxi@baidu.com', '19WoAiBeijingTiananmen89', 'Jingpin', 'Xi', NULL, NULL, NULL, 'BLOCKED', '2043-03-10'),
(4, 'asdfg', 'a@a.aa', '754aa89be35d62d8b3ae5fbc25415b56', '', '', '', '', '', 'std', NULL),
(5, 'id', 'a@a.aa', '62ddfaab30f221b0bef11d5e69e1afb1', 'trsxerdx', 'hffg', '', '+1 (800) 555-3535', '', 'std', NULL),
(6, '11111', '11@11.aa', '8eeb53829052e3ac950ad50ef34b0447', 'aaaaa', 'aaaaa', '123456-78901', '+1 (800) 555-3535', '', 'std', NULL),
(7, 'TatjanaKurakina', 'kurakina.tatjana@gmail.com', 'bba920df9a6c7473061d34441a624f89', 'Tatjana', 'Kurakina', '040984-10823', '29160922', '', 'std', NULL),
(8, '44', 'a@a.aa', 'a8353708cb608fdb43212d4e4f2c6630', '', '', '', '', '', 'std', NULL),
(9, 'a', 'a@a.aa', '75b14129afbe7021580dc2a1db2c6268', '', '', '', '', '', 'std', NULL);

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
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma_navigationhiding`
--

CREATE TABLE IF NOT EXISTS `pma_navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma_usergroups`
--

CREATE TABLE IF NOT EXISTS `pma_usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`usergroup`,`tab`,`allowed`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma_users`
--

CREATE TABLE IF NOT EXISTS `pma_users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL,
  PRIMARY KEY (`username`,`usergroup`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE IF NOT EXISTS `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE IF NOT EXISTS `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL,
  PRIMARY KEY (`db_name`,`col_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE IF NOT EXISTS `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE IF NOT EXISTS `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE IF NOT EXISTS `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE IF NOT EXISTS `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE IF NOT EXISTS `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`,`db`,`table`,`timevalue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE IF NOT EXISTS `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE IF NOT EXISTS `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`page_nr`),
  KEY `db_name` (`db_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE IF NOT EXISTS `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE IF NOT EXISTS `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT '',
  PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  KEY `foreign_field` (`foreign_db`,`foreign_table`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE IF NOT EXISTS `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE IF NOT EXISTS `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE IF NOT EXISTS `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT '',
  PRIMARY KEY (`db_name`,`table_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE IF NOT EXISTS `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`username`,`db_name`,`table_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE IF NOT EXISTS `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1,
  PRIMARY KEY (`db_name`,`table_name`,`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE IF NOT EXISTS `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2023-05-04 17:47:14', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE IF NOT EXISTS `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`usergroup`,`tab`,`allowed`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE IF NOT EXISTS `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL,
  PRIMARY KEY (`username`,`usergroup`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
