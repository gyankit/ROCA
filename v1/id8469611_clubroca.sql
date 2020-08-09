-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 28, 2019 at 01:02 PM
-- Server version: 10.3.13-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id8469611_clubroca`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `unique_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`unique_id`, `username`, `password`, `role`) VALUES
('ROCA2016CSE02', '47089f439f47604afa6236cf4940b17b', 'bb312d77a3ccf4a8f09c3f2d8de8b15c', 'ADMINISTRATOR'),
('ROCA2019', 'ec4aac6e700584cf2fe5cac2fe53d0c9', '260b466eeb525aee3ca4cf0ee21e57d1', 'ADMINISTRATOR');

-- --------------------------------------------------------

--
-- Table structure for table `comments_tbl`
--

CREATE TABLE `comments_tbl` (
  `id` int(10) NOT NULL,
  `date` datetime NOT NULL,
  `topic` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `unique_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments_tbl`
--

INSERT INTO `comments_tbl` (`id`, `date`, `topic`, `comment`, `unique_id`) VALUES
(1, '2019-03-16 02:44:50', 'Technical learning', 'The Club provides great platform for the pupils who is concerned for  learning!!', 'ROCA2017CSE34');

-- --------------------------------------------------------

--
-- Table structure for table `coordinators_tbl`
--

CREATE TABLE `coordinators_tbl` (
  `id` int(10) NOT NULL,
  `unique_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `field` text COLLATE utf8_unicode_ci NOT NULL,
  `head` varchar(3) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `coordinators_tbl`
--

INSERT INTO `coordinators_tbl` (`id`, `unique_id`, `field`, `head`) VALUES
(1, 'ROCA2016CSE02', 'Senior Co-ordinator', 'NO'),
(2, 'ROCA2015CSE43', 'Technical', 'YES'),
(3, 'ROCA2017CSE34', 'Junior Co-ordinator', 'NO'),
(4, 'ROCA2016EE23', 'Senior Co-ordinator', 'NO'),
(5, 'ROCA2016CSE20', 'Senior Co-ordinator', 'NO'),
(6, 'ROCA2016EE20', 'Senior Co-ordinator', 'NO'),
(7, 'ROCA2015CSE47', 'Event Organiser & Event Management', 'NO'),
(8, 'ROCA2015ME110', 'Genral Secratory', 'YES'),
(9, 'ROCA2016CSE05', 'Senior Co-ordinator', 'NO'),
(10, 'ROCA2016CSE63', 'Senior Co-ordinator', 'NO'),
(11, 'ROCA2017IT02', 'Junior Co-ordinator', 'NO'),
(12, 'ROCA2017ECE04', 'Junior Co-ordinator', 'NO'),
(13, 'ROCA2017CSE65', 'Junior Co-ordinator', 'NO'),
(14, 'ROCA2017CSE29', 'Junior Co-ordinator', 'NO'),
(15, 'ROCA2017CSE26', 'Junior Co-ordinator', 'NO'),
(16, 'ROCA2017CSE24', 'Junior Co-ordinator', 'NO'),
(17, 'ROCA2017ECE10', 'Junior Co-ordinator', 'NO'),
(18, 'ROCA2015ME59', 'Advisor', 'NO'),
(19, 'ROCA2016CSE13', 'Senior Co-ordinator', 'NO'),
(20, 'ROCA2017CSE58', 'Junior Co-ordinator', 'NO'),
(21, 'ROCA2015ME76', 'Cash', 'NO'),
(22, 'ROCA2017CSE67', 'Junior Co-ordinator', 'NO'),
(23, 'ROCA2017CSE25', 'Junior Co-ordinator', 'NO'),
(24, 'ROCA2015ME77', 'Marketing', 'NO'),
(25, 'ROCA2017CSE45', 'Junior Co-ordinator', 'NO'),
(26, 'ROCA2017CSE42', 'Junior Co-ordinator', 'NO'),
(27, 'ROCA2017CH05', 'Junior Co-ordinator', 'NO'),
(28, 'ROCA2016ME04', 'Senior Co-ordinator', 'NO'),
(29, 'ROCA2017CSE63', 'Junior Co-ordinator', 'NO'),
(30, 'ROCA2016ECE15', 'Senior Co-ordinator', 'NO'),
(31, 'ROCA2016ECE09', 'Senior Co-ordinator', 'NO'),
(32, 'ROCA2016CSE54', 'Senior Co-ordinator', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `event_tbl`
--

CREATE TABLE `event_tbl` (
  `id` int(10) NOT NULL,
  `event` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event_tbl`
--

INSERT INTO `event_tbl` (`id`, `event`, `date`) VALUES
(2, 'Grand Battle', '2019-03-10'),
(3, 'INQUISITIVE', '2019-03-10'),
(4, 'FASTEST FINGERS', '2019-03-10'),
(5, 'SPOT LIGHT', '2019-03-11'),
(6, 'TELEGENIC', '2019-03-11');

-- --------------------------------------------------------

--
-- Table structure for table `faq_tbl`
--

CREATE TABLE `faq_tbl` (
  `id` int(10) NOT NULL,
  `date` datetime NOT NULL,
  `question` text COLLATE utf8_unicode_ci NOT NULL,
  `answer` text COLLATE utf8_unicode_ci NOT NULL,
  `unique_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `faq_tbl`
--

INSERT INTO `faq_tbl` (`id`, `date`, `question`, `answer`, `unique_id`) VALUES
(1, '2019-03-27 07:41:33', 'Abcd', '', 'ROCA2016CSE02');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_tbl`
--

CREATE TABLE `gallery_tbl` (
  `id` int(10) NOT NULL,
  `gallery` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `event_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gallery_tbl`
--

INSERT INTO `gallery_tbl` (`id`, `gallery`, `event_id`) VALUES
(3, 'IMG20190310105316 copy.jpg', 3),
(4, 'IMG20190310105714.jpg', 3),
(5, 'IMG20190310104859.jpg', 3),
(6, 'IMG20190310110232.jpg', 3),
(7, 'IMG20190310113823.jpg', 3),
(9, 'IMG20190310113858.jpg', 3),
(10, 'IMG20190310113248.jpg', 3),
(11, 'IMG20190310114729.jpg', 3),
(12, 'IMG20190310140816.jpg', 4),
(13, 'IMG20190310140838.jpg', 4),
(14, 'IMG20190310140908.jpg', 4),
(15, 'IMG20190310140917.jpg', 4),
(16, 'IMG20190310141656.jpg', 4),
(17, 'IMG_20190311_113941.jpg', 5),
(18, 'IMG_20190311_114015.jpg', 5),
(19, 'IMG_20190311_114648.jpg', 5),
(21, 'IMG_20190311_114837.jpg', 5),
(22, 'IMG_20190311_115318.jpg', 5),
(23, 'IMG_20190311_115922.jpg', 5),
(25, 'IMG_20190311_120831.jpg', 5),
(26, 'IMG20190311113337.jpg', 5),
(27, 'IMG20190311114616.jpg', 5),
(28, 'IMG20190311114734.jpg', 5),
(29, 'IMG20190311114856.jpg', 5),
(30, 'IMG20190311115311.jpg', 5),
(31, 'IMG20190311121211.jpg', 5),
(32, 'IMG20190311122115.jpg', 5),
(33, 'IMG20190311142731.jpg', 6),
(34, 'IMG20190311145225.jpg', 6),
(35, 'IMG20190311150919.jpg', 6),
(36, 'IMG20190311151209.jpg', 6),
(37, 'IMG20190311153314.jpg', 6),
(38, 'IMG20190311153314.jpg', 6),
(39, 'IMG_20190311_165009.jpg', 2),
(40, 'IMG_20190311_164638.jpg', 2),
(41, 'IMG_20190311_111702.jpg', 2),
(42, 'IMG_20190311_160331.jpg', 2),
(43, 'IMG_20190311_161900.jpg', 2),
(44, 'IMG_20190311_162105.jpg', 2),
(45, 'IMG_20190311_162245.jpg', 2),
(46, 'IMG_20190311_162402.jpg', 2),
(47, 'IMG_20190311_162428.jpg', 2),
(48, 'IMG_20190311_162525.jpg', 2),
(49, 'IMG_20190311_162653.jpg', 2),
(50, 'IMG_20190311_162822.jpg', 2),
(51, 'IMG_20190311_162931.jpg', 2),
(52, 'IMG_20190311_162937.jpg', 2),
(53, 'IMG_20190311_163128.jpg', 2),
(54, 'IMG20190311153811.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `intrest_tbl`
--

CREATE TABLE `intrest_tbl` (
  `id` int(3) NOT NULL,
  `unique_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `event` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `paid` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `mode` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `transaction` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  primary key(`id`,`unique_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `intrest_tbl`
--

INSERT INTO `intrest_tbl` (`id`, `unique_id`, `date`, `event`, `paid`, `mode`, `transaction`) VALUES
(3, 'ROCA2017CSE34', '08-03-2019', 'FASTEST FINGERS', 'NO', '', ''),
(3, 'ROCA2017CSE65', '08-03-2019', 'FASTEST FINGERS', 'YES', '', ''),
(2, 'ROCA2017CSE65', '08-03-2019', 'INQUISITIVE', 'YES', '', ''),
(7, 'ROCA2017CSE65', '08-03-2019', 'SPOT LIGHT', 'YES', '', ''),
(8, 'ROCA2017CSE65', '08-03-2019', 'TELEGENIC', 'YES', '', ''),
(4, 'ROCA2017CSE67', '07-03-2019', 'BATTLE DEVILS (PUBG Solo)', 'YES', '', ''),
(3, 'ROCA2017CSE67', '07-03-2019', 'FASTEST FINGERS', 'YES', '', ''),
(2, 'ROCA2017CSE67', '07-03-2019', 'INQUISITIVE', 'YES', '', ''),
(7, 'ROCA2017CSE67', '08-03-2019', 'SPOT LIGHT', 'YES', '', ''),
(8, 'ROCA2017CSE67', '07-03-2019', 'TELEGENIC', 'YES', '', ''),
(8, 'ROCA2017IT02', '08-03-2019', 'TELEGENIC', 'YES', '', ''),
(5, 'ROCA2018CH07', '01-03-2019', 'BATTLE DEVILS (PUBG Duo/Squad)', 'YES', '', ''),
(4, 'ROCA2018CH07', '08-03-2019', 'BATTLE DEVILS (PUBG Solo)', 'YES', '', ''),
(3, 'ROCA2018CH08', '06-03-2019', 'FASTEST FINGERS', 'YES', '', ''),
(2, 'ROCA2018CH08', '06-03-2019', 'INQUISITIVE', 'YES', 'Paytm', '23318486640'),
(7, 'ROCA2018CH08', '08-03-2019', 'SPOT LIGHT', 'YES', '', ''),
(5, 'ROCA2018CH14', '08-03-2019', 'BATTLE DEVILS (PUBG Duo/Squad)', 'YES', '', ''),
(3, 'ROCA2018CH14', '08-03-2019', 'FASTEST FINGERS', 'YES', '', ''),
(5, 'ROCA2018CH15', '08-03-2019', 'BATTLE DEVILS (PUBG Duo/Squad)', 'YES', '', ''),
(4, 'ROCA2018CH15', '08-03-2019', 'BATTLE DEVILS (PUBG Solo)', 'YES', '', ''),
(3, 'ROCA2018CH15', '08-03-2019', 'FASTEST FINGERS', 'YES', '', ''),
(2, 'ROCA2018CH15', '08-03-2019', 'INQUISITIVE', 'YES', '', ''),
(7, 'ROCA2018CH15', '08-03-2019', 'SPOT LIGHT', 'YES', '', ''),
(5, 'ROCA2018CSE02', '08-03-2019', 'BATTLE DEVILS (PUBG Duo/Squad)', 'YES', '', ''),
(2, 'ROCA2018CSE02', '08-03-2019', 'INQUISITIVE', 'YES', '', ''),
(8, 'ROCA2018CSE02', '08-03-2019', 'TELEGENIC', 'YES', '', ''),
(8, 'ROCA2018CSE05', '08-03-2019', 'TELEGENIC', 'YES', '', ''),
(5, 'ROCA2018CSE07', '08-03-2019', 'BATTLE DEVILS (PUBG Duo/Squad)', 'YES', '', ''),
(7, 'ROCA2018CSE07', '08-03-2019', 'SPOT LIGHT', 'YES', '', ''),
(8, 'ROCA2018CSE07', '08-03-2019', 'TELEGENIC', 'YES', '', ''),
(2, 'ROCA2018CSE20', '08-03-2019', 'INQUISITIVE', 'YES', '', ''),
(8, 'ROCA2018CSE20', '08-03-2019', 'TELEGENIC', 'YES', '', ''),
(2, 'ROCA2018CSE22', '07-03-2019', 'INQUISITIVE', 'YES', '', ''),
(7, 'ROCA2018CSE22', '07-03-2019', 'SPOT LIGHT', 'YES', '', ''),
(8, 'ROCA2018CSE22', '07-03-2019', 'TELEGENIC', 'YES', '', ''),
(5, 'ROCA2018CSE23', '08-03-2019', 'BATTLE DEVILS (PUBG Duo/Squad)', 'YES', '', ''),
(4, 'ROCA2018CSE23', '08-03-2019', 'BATTLE DEVILS (PUBG Solo)', 'YES', '', ''),
(3, 'ROCA2018CSE23', '08-03-2019', 'FASTEST FINGERS', 'YES', '', ''),
(2, 'ROCA2018CSE23', '05-03-2019', 'INQUISITIVE', 'YES', '', ''),
(7, 'ROCA2018CSE23', '08-03-2019', 'SPOT LIGHT', 'YES', '', ''),
(8, 'ROCA2018CSE23', '08-03-2019', 'TELEGENIC', 'YES', '', ''),
(3, 'ROCA2018CSE24', '07-03-2019', 'FASTEST FINGERS', 'YES', '', ''),
(7, 'ROCA2018CSE24', '07-03-2019', 'SPOT LIGHT', 'YES', '', ''),
(5, 'ROCA2018CSE27', '08-03-2019', 'BATTLE DEVILS (PUBG Duo/Squad)', 'YES', '', ''),
(4, 'ROCA2018CSE27', '05-03-2019', 'BATTLE DEVILS (PUBG Solo)', 'YES', '', ''),
(3, 'ROCA2018CSE27', '05-03-2019', 'FASTEST FINGERS', 'YES', '', ''),
(2, 'ROCA2018CSE27', '05-03-2019', 'INQUISITIVE', 'YES', '', ''),
(8, 'ROCA2018CSE27', '05-03-2019', 'TELEGENIC', 'YES', '', ''),
(2, 'ROCA2018CSE30', '08-03-2019', 'INQUISITIVE', 'YES', '', ''),
(7, 'ROCA2018CSE30', '08-03-2019', 'SPOT LIGHT', 'YES', '', ''),
(8, 'ROCA2018CSE30', '08-03-2019', 'TELEGENIC', 'YES', '', ''),
(2, 'ROCA2018CSE35', '08-03-2019', 'INQUISITIVE', 'YES', '', ''),
(2, 'ROCA2018CSE36', '07-03-2019', 'INQUISITIVE', 'YES', '', ''),
(7, 'ROCA2018CSE36', '08-03-2019', 'SPOT LIGHT', 'YES', '', ''),
(8, 'ROCA2018CSE36', '07-03-2019', 'TELEGENIC', 'YES', '', ''),
(5, 'ROCA2018CSE39', '08-03-2019', 'BATTLE DEVILS (PUBG Duo/Squad)', 'YES', '', ''),
(4, 'ROCA2018CSE39', '05-03-2019', 'BATTLE DEVILS (PUBG Solo)', 'YES', '', ''),
(2, 'ROCA2018CSE39', '08-03-2019', 'INQUISITIVE', 'YES', '', ''),
(7, 'ROCA2018CSE39', '08-03-2019', 'SPOT LIGHT', 'YES', '', ''),
(8, 'ROCA2018CSE39', '08-03-2019', 'TELEGENIC', 'YES', '', ''),
(5, 'ROCA2018CSE40', '08-03-2019', 'BATTLE DEVILS (PUBG Duo/Squad)', 'YES', '', ''),
(2, 'ROCA2018CSE55', '08-03-2019', 'INQUISITIVE', 'YES', '', ''),
(7, 'ROCA2018CSE55', '08-03-2019', 'SPOT LIGHT', 'YES', '', ''),
(8, 'ROCA2018CSE55', '08-03-2019', 'TELEGENIC', 'YES', '', ''),
(5, 'ROCA2018CSE59', '07-03-2019', 'BATTLE DEVILS (PUBG Duo/Squad)', 'YES', '', ''),
(3, 'ROCA2018CSE59', '07-03-2019', 'FASTEST FINGERS', 'YES', '', ''),
(2, 'ROCA2018CSE59', '07-03-2019', 'INQUISITIVE', 'YES', '', ''),
(7, 'ROCA2018CSE59', '07-03-2019', 'SPOT LIGHT', 'YES', '', ''),
(8, 'ROCA2018CSE59', '07-03-2019', 'TELEGENIC', 'YES', '', ''),
(3, 'ROCA2018ECE03', '07-03-2019', 'FASTEST FINGERS', 'YES', '', ''),
(2, 'ROCA2018ECE03', '07-03-2019', 'INQUISITIVE', 'YES', '', ''),
(7, 'ROCA2018ECE03', '07-03-2019', 'SPOT LIGHT', 'YES', '', ''),
(8, 'ROCA2018ECE03', '07-03-2019', 'TELEGENIC', 'YES', '', ''),
(3, 'ROCA2018ECE09', '08-03-2019', 'FASTEST FINGERS', 'YES', '', ''),
(6, 'ROCA2018IT01', '07-03-2019', 'BATTLE DEVILS (COC/8 BALL)', 'YES', '', ''),
(3, 'ROCA2018IT01', '07-03-2019', 'FASTEST FINGERS', 'YES', '', ''),
(2, 'ROCA2018IT01', '07-03-2019', 'INQUISITIVE', 'YES', '', ''),
(3, 'ROCA2018IT02', '07-03-2019', 'FASTEST FINGERS', 'YES', 'Paytm', '7281048171'),
(7, 'ROCA2018IT02', '08-03-2019', 'SPOT LIGHT', 'YES', '', ''),
(8, 'ROCA2018IT02', '07-03-2019', 'TELEGENIC', 'YES', '', ''),
(2, 'ROCA2018IT09', '08-03-2019', 'INQUISITIVE', 'YES', '', ''),
(7, 'ROCA2018IT09', '08-03-2019', 'SPOT LIGHT', 'YES', '', ''),
(5, 'ROCA2018ME03', '08-03-2019', 'BATTLE DEVILS (PUBG Duo/Squad)', 'YES', '', ''),
(4, 'ROCA2018ME03', '08-03-2019', 'BATTLE DEVILS (PUBG Solo)', 'YES', '', ''),
(2, 'ROCA2018ME03', '08-03-2019', 'INQUISITIVE', 'YES', '', ''),
(8, 'ROCA2018ME03', '08-03-2019', 'TELEGENIC', 'YES', '', ''),
(3, 'ROCA2018ME04', '08-03-2019', 'FASTEST FINGERS', 'YES', '', ''),
(2, 'ROCA2018ME04', '08-03-2019', 'INQUISITIVE', 'YES', '', ''),
(7, 'ROCA2018ME04', '08-03-2019', 'SPOT LIGHT', 'YES', '', ''),
(5, 'ROCA2018ME07', '06-03-2019', 'BATTLE DEVILS (PUBG Duo/Squad)', 'YES', '', ''),
(4, 'ROCA2018ME07', '06-03-2019', 'BATTLE DEVILS (PUBG Solo)', 'YES', '', ''),
(3, 'ROCA2018ME07', '08-03-2019', 'FASTEST FINGERS', 'YES', '', ''),
(2, 'ROCA2018ME07', '06-03-2019', 'INQUISITIVE', 'YES', '', ''),
(2, 'ROCA2018ME09', '08-03-2019', 'INQUISITIVE', 'YES', '', ''),
(7, 'ROCA2018ME09', '08-03-2019', 'SPOT LIGHT', 'YES', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `member_register_tbl`
--

CREATE TABLE `member_register_tbl` (
  `unique_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `mode` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `transaction` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member_register_tbl`
--

INSERT INTO `member_register_tbl` (`unique_id`, `mode`, `transaction`) VALUES
('ROCA2018CH08', 'Paytm', '23226080961'),
('ROCA2018CSE53', 'PhonePe', 'P1903021200192824313708');

-- --------------------------------------------------------

--
-- Table structure for table `notice_tbl`
--

CREATE TABLE `notice_tbl` (
  `id` int(11) NOT NULL,
  `date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `heading` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `notice` text COLLATE utf8_unicode_ci NOT NULL,
  `requirement` text COLLATE utf8_unicode_ci NOT NULL,
  `announcement` text COLLATE utf8_unicode_ci NOT NULL,
  `venue` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `day` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cost` int(4) NOT NULL,
  `photo` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `event` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `link` bit(1) NOT NULL,
  `member` bit(1) NOT NULL,
  `subscriber` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notice_tbl`
--

INSERT INTO `notice_tbl` (`id`, `date`, `heading`, `notice`, `requirement`, `announcement`, `venue`, `day`, `time`, `cost`, `photo`, `event`, `link`, `member`, `subscriber`) VALUES
(1, '2019-03-10', 'Grand Battle', 'ROCA is going to organise one of the best 2-Days event of Rahul Foundation.<br><br>\r\nEvent List : <br>1.INQUISITIVE<br>2.FASTEST FINGERS<br>3.BATTLE DEVILS<br>4.SPOT LIGHT<br>5.TELEGENIC<br>6.ETHINIC DAY<br><br>\r\nThere is 25 MAR Point for the B-Tech Student from the above Events.', '', 'Registration open till<br>08th Mar, 2019', 'DIATM Campus', 'Sunday', '09:00 AM', 0, 'IMG-20190228-WA0000.jpg', 'All', b'0', b'0', b'0'),
(2, '2019-03-10', 'INQUISITIVE', 'Brainclash to become the Alexander.', '', 'Registration open till<br>08th Mar, 2019', 'Rahul Foundation Campus', 'Sunday', '09:00 AM', 20, 'inquisitive.jpeg', 'All', b'0', b'0', b'0'),
(3, '2019-03-10', 'FASTEST FINGERS', 'The Flash from the hands', '', 'Registration open till<br>08th Mar, 2019', 'DIATM Computer Lab', 'Sunday', '2:00 PM', 10, 'fastest finger.png', 'All', b'0', b'0', b'0'),
(4, '2019-03-10', 'BATTLE DEVILS (PUBG Solo)', 'The Josh is on', '', 'Registration open till<br>08th Mar, 2019', 'DIATM Computer Lab', 'Sunday', '2:30 PM', 10, 'pubg-solo.jpg', 'All', b'0', b'0', b'0'),
(5, '2019-03-10', 'BATTLE DEVILS (PUBG Duo/Squad)', 'The Josh is on', '', 'Duo/Squad (Depending upon number of participants).<br>Payment of this games only in offline mode.<br><br>Registration open till<br>08th Mar, 2019', 'DIATM Computer Lab', 'Sunday', '2:30 PM', 10, 'pubg-squad.jpg', 'All', b'0', b'0', b'0'),
(6, '2019-03-10', 'BATTLE DEVILS (COC/8 BALL)', 'Attack the targets', '', 'Anyone of the two games will be conducted depending upon the number of participants.<br>Payment of this games only in offline mode.<br><br>Registration open till<br>08th Mar, 2019', 'DIATM Computer Lab', 'Sunday', '2:30 PM', 10, '8ballpool.jpg', 'All', b'0', b'0', b'0'),
(7, '2019-03-11', 'SPOT LIGHT', 'Lets make a new India', '', 'Max 6 members with Social Awareness theme only.<br><br>Registration open till<br>08th Mar, 2019', 'Seminar Hall (MID building)', 'Monday', '9:00 AM', 15, 'spotlight.jpeg', 'All', b'0', b'0', b'0'),
(8, '2019-03-11', 'TELEGENIC', 'Lets see the beautiful world from our view', '', 'Max 4 members with the theme Beauty of Nature (within campus) only.<br><br>Registration open till<br>08th Mar, 2019', 'Seminar Hall (MID building)', 'Monday', '1:00 PM', 15, 'telegenic.jpeg', 'All', b'0', b'0', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `participation_tbl`
--

CREATE TABLE `participation_tbl` (
  `id` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `roll` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `paid` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `mode` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `transaction` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `participation_tbl`
--

INSERT INTO `participation_tbl` (`id`, `name`, `roll`, `email`, `date`, `paid`, `mode`, `transaction`) VALUES
(1, 'GYAN ANKIT', 'CS/16/02', 'g.gyanankit@gmail.com', '07-03-2019', 'NO', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment_tbl`
--

CREATE TABLE `payment_tbl` (
  `id` int(10) NOT NULL,
  `mode` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `upi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `qr_code` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_tbl`
--

INSERT INTO `payment_tbl` (`id`, `mode`, `upi`, `qr_code`) VALUES
(1, 'Paytm', '9534470240@PAYTM', '1550409551838.jpg'),
(2, 'Google Pay', 'g.gyanankit-1@oksbi', 'IMG_20190217_185833.jpg'),
(3, 'PhonePe', '9534470240@ybl', 'IMG_20190217_190423.png');

-- --------------------------------------------------------

--
-- Table structure for table `query_tbl`
--

CREATE TABLE `query_tbl` (
  `id` int(10) NOT NULL,
  `date` datetime NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `subject` text COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registration_tbl`
--

CREATE TABLE `registration_tbl` (
  `amount` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registration_tbl`
--

INSERT INTO `registration_tbl` (`amount`) VALUES
(100);

-- --------------------------------------------------------

--
-- Table structure for table `roca_member_tbl`
--

CREATE TABLE `roca_member_tbl` (
  `id` int(10) NOT NULL,
  `unique_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `roll` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `coordinator` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `field` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `head` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `paid` varchar(3) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roca_member_tbl`
--

INSERT INTO `roca_member_tbl` (`id`, `unique_id`, `name`, `roll`, `department`, `contact`, `email`, `date`, `year`, `coordinator`, `field`, `head`, `photo`, `password`, `paid`) VALUES
(1, 'ROCA2016CSE02', 'GYAN ANKIT', 'CS/16/02', 'CSE', '9534470240', 'g.gyanankit@gmail.com', '17-10-2016', '2016', 'YES', 'Senior Co-ordinator', 'NO', 'IMG_20180903_232539.jpg', 'bb312d77a3ccf4a8f09c3f2d8de8b15c', 'YES'),
(2, 'ROCA2015CSE43', 'SUBHRANSU BHANDARI', 'CS/15/43', 'CSE', '7384875983', 'way2sb228@gmail.com', '05-06-2015', '2015', 'YES', 'Technical', 'YES', 'DSCN1041.jpg', '4844ec8d6bbcaf709e380bba8b5c0a62', 'YES'),
(3, 'ROCA2016EE23', 'ANUPRIYA', 'EE/16/23', 'EE', '7365905716', 'anupriya2016anshu@gmail.com', '17-02-2019', '2016', 'YES', 'Senior Co-ordinator', 'NO', 'IMG_20180909_121646_652.jpg', '51b375e03c3fb4e2e7172c3a1236b267', 'YES'),
(4, 'ROCA2017CSE34', 'BINIT KUMAR JHA', 'CS/17/34', 'CSE', '7001481457', 'bineetjha1998@gmail.com', '1-05-2018', '2017', 'YES', 'Junior Co-ordinator', 'NO', 'binit.jpeg', 'd7ad1576d4af2603ee43a5f87d4e11aa', 'YES'),
(5, 'ROCA2016CSE20', 'SUSHANT CHAKRABORTY', 'CS/16/20', 'CSE', '8768290716', 'sushantchakraborty73@gmail.com', '03-09-2016', '2016', 'YES', 'Senior Co-ordinator', 'NO', '_DSC0466-02.jpeg', 'f32633a0ebb2efd0687e8e0fab5c877c', 'YES'),
(6, 'ROCA2016EE20', 'MD AAQUAIB RAHMAN', 'EE/16/20', 'EE', '8083824841', '94aaquib@gmail.com', '17-05-2017', '2016', 'YES', 'Senior Co-ordinator', 'NO', 'IMG_1545472370252.jpg', '32191f2253cbdb91c4a53b8dd5ce1db9', 'YES'),
(11, 'ROCA2015CSE47', 'SONALI SINGH', 'CS/15/47', 'CSE', '8609559289', 'stellasingh619@gmail.com', '19-02-2016', '2015', 'YES', 'Event Organiser & Event Management', 'NO', 'New Doc 2017-08-11.jpg', '33635896bdaf205678a07dca566c5815', 'YES'),
(12, 'ROCA2017ECE04', 'ANKIT KUMAR GUPTA', 'EC/17/04', 'ECE', '9062744850', 'akumarg1216@gmail.com', '17-09-2017', '2017', 'YES', 'Junior Co-ordinator', 'NO', '2019-02-20-12-57-25-103.jpg', '724df72a45d58fa568acd5553e5d8bec', 'YES'),
(13, 'ROCA2016CSE05', 'SHIVAM KUMAR CHAUDHARY', 'CS/16/05', 'CSE', '8356023157', 'shivamchaudhary1212@gmail.com', '01-06-2016', '2016', 'YES', 'Senior Co-ordinator', 'NO', 'IMG-20190220-WA0025.jpg', 'dfa48665737b80f946ca3bb803d35efe', 'YES'),
(14, 'ROCA2016CSE63', 'SHASHANK KUMAR', 'CS/16/63', 'CSE', '7782897691', 'sonumishra64@gmail.com', '20-02-2019', '2016', 'YES', 'Senior Co-ordinator', 'NO', 'IMG_20170807_002926_595.jpg', 'a34abf1acac52ab450e0485531226abd', 'YES'),
(15, 'ROCA2015ME110', 'VED PRAKASH', 'ME/15/110', 'ME', '9128737885', 'ved197@rediffmail.com', '15-08-2015', '2015', 'YES', 'Genral Secratory', 'YES', 'IMG_20190110_130017.jpg', 'e418ccc02a28fcf9fb639e2ed1285321', 'YES'),
(16, 'ROCA2017IT02', 'CHANCHALA SINGH', 'IT/17/02', 'IT', '9933879960', 'chanchalasingh14@gmail.com', '20-08-2017', '2017', 'YES', 'Junior Co-ordinator', 'NO', 'IMG-20181109-WA0012.jpg', '853dcf8455b0900cf96d4115f16367e8', 'YES'),
(17, 'ROCA2017CSE65', 'VAISHNAVI KUMARI', 'CS/17/65', 'CSE', '7274073819', 'vaishnavikumari49@gmail.com', '01-07-2017', '2017', 'YES', 'Junior Co-ordinator', 'NO', 'IMG-20190220-WA0019.jpg', 'dfa48665737b80f946ca3bb803d35efe', 'YES'),
(18, 'ROCA2017CSE29', 'AJAY KUMAR SRIVASTVA', 'CS/17/29', 'CSE', '7654885262', 'subhamsrivastava804@gmail.com', '20-09-2017', '2017', 'YES', 'Junior Co-ordinator', 'NO', 'DSC_4136.jpg', 'da476fe2bddbec0d8ed99e541ad8f933', 'YES'),
(19, 'ROCA2017CSE24', 'SANJU KUMAR SINGH', 'CS/17/24', 'CSE', '9304756685', 'sanjusingh88888@gmail.com', '01-05-2018', '2017', 'YES', 'Junior Co-ordinator', 'NO', 'IMG-20190220-WA0005-1.jpg', '48b87faec03523b19df4175687821cb3', 'YES'),
(20, 'ROCA2017CSE26', 'VICKY KUMAR', 'CS/17/26', 'CSE', '9784674964', 'vickyjnv7@gmail.com', '01-05-2018', '2017', 'YES', 'Junior Co-ordinator', 'NO', 'IMG-20190220-WA0006.jpg', '3ac4c4f235317cc7efaea1e213910487', 'YES'),
(21, 'ROCA2017ECE10', 'MD SALMAN KARIM', 'EC/17/10', 'ECE', '8789666473', 'salmankari0786@gmail.com', '05-11-2017', '2017', 'YES', 'Junior Co-ordinator', 'NO', 'PicsArt_02-17-05.06.18.jpg', 'b1a2bb09b35d370a704be83857e3cb19', 'YES'),
(22, 'ROCA2015ME59', 'AVIK NAHA', 'ME/15/59', 'ME', '7992271670', 'avik.naha96@gmail.com', '10-09-2015', '2015', 'YES', 'Advisor', 'NO', '01.jpg', 'da934ea587d6345d6f941dc86e9e6312', 'YES'),
(23, 'ROCA2016CSE13', 'ANUPAM ANURAG', 'CS/16/13', 'CSE', '9472522933', 'anupam841506@gmail.com', '22-02-2019', '2016', 'YES', 'Senior Co-ordinator', 'NO', 'IMG_20180223_183217_794.jpg', '700f8a6d37ddd3291c6bb875c82f4c90', 'YES'),
(24, 'ROCA2015ME76', 'ADITYA KHAN', 'ME/15/76', 'ME', '8674968958', 'adityakhan4171@gmail.com', '22-08-2015', '2015', 'YES', 'Cash', 'NO', '14.jpg', '00386cbfef6b419e47e97161b8105cc3', 'YES'),
(25, 'ROCA2017CSE58', 'NITISH KUMAR', 'CS/17/58', 'CSE', '9572576470', 'nitishraj8864062183@gmail.com', '22-04-2018', '2017', 'YES', 'Junior Co-ordinator', 'NO', 'IMG_20190222_130408.jpg', 'b9426142f2c78ae2df411dfa08c4d748', 'YES'),
(27, 'ROCA2017CSE67', 'SAOMYA BHARDWAJ', 'CS/17/67', 'CSE', '8340234856', 'nimmicool1999@gmail.com', '01-05-2018', '2017', 'YES', 'Junior Co-ordinator', 'NO', 'wallpaper.jpg', 'b0ee87b66fa93d96d60e2119b726bc63', 'YES'),
(30, 'ROCA2017CSE25', 'DEBOBRATA MONDAL', 'CS/17/25', 'CSE', '9800872541', 'debobrata101@gmail.com', '25-10-2017', '2017', 'YES', 'Junior Co-ordinator', 'NO', 'ICOMP1551073374461.jpg', '4b761e80bc933e15c63c5d1fa2c79e37', 'YES'),
(34, 'ROCA2018CSE42', 'SHUBHRANSU JANA', 'CS/18/42', 'CSE', '6296723021', 'janashubhransu19@gmail.com', '01-03-2019', '2018', 'NO', 'Not Specified', 'NO', 'SAVE_20190301_131430.jpeg', '9bae4913b4e1ea5032bf81ebb3de3421', 'NO'),
(35, 'ROCA2018CH08', 'ANIT DAS', 'CH/18/08', 'CH', '8967089194', 'anitdas2018@gmail.com', '21-08-2018', '2018', 'NO', 'Not Specified', 'NO', 'IMG_20190301_132028.jpg', '1dd5ba5ca653b7e410d05a9fff90e45e', 'YES'),
(36, 'ROCA2018CH07', 'SOVAN JANA', 'CH/18/07', 'CH', '7029678092', 'jsovan076@gmail.com', '21-08-2018', '2018', 'NO', 'Not Specified', 'NO', 'Fantasia Painting(53).jpg', 'a6ba7f0d5ec5dda414f17fb9af07296f', 'YES'),
(37, 'ROCA2018IT01', 'SRABONY GHOSH', 'IT/18/01', 'IT', '6296357225', 'srabonyghosh789@gmail.com', '01-08-2018', '2018', 'NO', 'Not Specified', 'NO', 'IMG-20190301-WA0006.jpg', '7a9403f6b69ac2c8fd0451abbc38ec6a', 'YES'),
(40, 'ROCA2018ECE01', 'NISHA BHARTI', 'EC/18/01', 'ECE', '7667725697', 'nishabharti98765@gmail.com', '20-08-2018', '2018', 'NO', 'Not Specified', 'NO', 'IMG_20190216_000237_271.jpg', '9f88a33b8575f16ad279ae96f4044d2f', 'YES'),
(41, 'ROCA2018ECE03', 'UPANISHAD SINGH', 'EC/18/03', 'ECE', '7667796195', 'upanishadsingh123@gmail.com', '20-08-2018', '2018', 'NO', 'Not Specified', 'NO', 'IMG_20190301_193740.jpg', '96fe84d62bbbf2f8bba1c2e02d6c3f8f', 'YES'),
(42, 'ROCA2018CSE59', 'SHEETAL KUMARI', 'CS/18/59', 'CSE', '7979766577', 'kumarisheetalgupta15@gmail.com', '09-08-2018', '2018', 'NO', 'Not Specified', 'NO', 'IMG-20190301-WA0013.jpg', '3fed35eead1e0749a092e7bec6b37898', 'YES'),
(43, 'ROCA2018CSE24', 'JAHANVI KUMARI', 'CS/18/24', 'CSE', '6299972224', 'ashujanu2103@gmail.com', '20-09-2018', '2018', 'NO', 'Not Specified', 'NO', 'received_2637585932935209.jpeg', 'f50146e7caccbd62c938b0e7c2e9478d', 'YES'),
(44, 'ROCA2018CH17', 'PIYA HALDAR', 'CH/18/17', 'CH', '7001744476', 'piyahaldar30@gmail.com', '20-08-2018', '2018', 'NO', 'Not Specified', 'NO', 'IMG-20190210-WA0001.jpg', 'Piya3020', 'NO'),
(45, 'ROCA2018ECE09', 'PRIYA KUMARI', 'EC/18/09', 'ECE', '6206873558', 'priyakhatwe12345@gmail.com', '20-08-2018', '2018', 'NO', 'Not Specified', 'NO', '20190301_210112.jpg', '567ed52ea9bc9d14faaf40a689d079dc', 'YES'),
(46, 'ROCA2018CH01', 'SURABHI SHARMA', 'CH/18/01', 'CH', '9547063079', 'surabhisharma212@gmail.com', '1-08-2018', '2018', 'NO', 'Not Specified', 'NO', 'IMG_20170301_170354.jpg', 'c51230b37a53f5826e3ea51858b483ac', 'YES'),
(49, 'ROCA2015ME77', 'RAVI RANJAN KUMAR', 'ME/15/77', 'ME', '8250434233', 'raviranjanmuz1997@gmail.com', '03-06-2015', '2015', 'YES', 'Markating', 'NO', 'New Doc 2018-08-05_5.jpg', 'e3eda5ba5d22b90f54ce716a76a4760a', 'YES'),
(50, 'ROCA2018CSE06', 'ARNAB GOSWAMI', 'CS/18/06', 'CSE', '9609954837', 'arnabgo124@gmail.com', '01-08-2018', '2018', 'NO', 'Not Specified', 'NO', 'IMG_20190301_220311.jpg', 'bb7afd2f5df8baa4cb42de21a9779b7a', 'YES'),
(51, 'ROCA2018CSE12', 'RANI KUMARI', 'CS/18/12', 'CSE', '7001724730', 'ranischool53@gmail.com', '09-08-2018', '2018', 'NO', 'Not Specified', 'NO', 'Photo.jpg', '93c50ea70149e636136e48c374e05edf', 'YES'),
(55, 'ROCA2018CSE53', 'SUMAN BERA', 'CS/18/53', 'CSE', '9861631476', 'berasuman415@gmail.com', '01-07-2018', '2018', 'NO', 'Not Specified', 'NO', '1527645518-picsay.jpg', '044fdc97bfcd28d4ba643256c35f483a', 'YES'),
(57, 'ROCA2018CSE60', 'CHANDA KUMARI', 'CS/18/60', 'CSE', '6299797578', 'chandack2002@gmail.com', '4-9-2018', '2018', 'NO', 'Not Specified', 'NO', 'IMG-20190302-WA0004.jpg', 'Deeparoy123', 'NO'),
(58, 'ROCA2018CSE16', 'MEDHA SINHA', 'CS/18/16', 'CSE', '6205069961', 'medhasinha2001@gmail.com', '20-08-2018', '2018', 'NO', 'Not Specified', 'NO', 'tmp-cam-484895133.jpg', '8c98e3d96fc7fe6ca3f573e7f6dff0fd', 'YES'),
(59, 'ROCA2017CSE42', 'NILAY BISWAS', 'CS/17/42', 'CSE', '8910239972', 'nilay.nilay.biswas@gmail.com', '10-10-2017', '2017', 'YES', 'Junior Co-ordinator', 'NO', '49561059_2230346783895213_1579496445264789504_n.jpg', '113a3cf28bd4879dbc37e10f03d47104', 'YES'),
(60, 'ROCA2017CSE45', 'ARPAN DHARA', 'CS/17/45', 'CSE', '7003924379', 'arpandhara007@gmail.com', '10-10-2017', '2017', 'YES', 'Junior Co-ordinator', 'NO', 'WhatsApp Image 2018-12-25 at 10.59.46 PM.jpeg', '76ecc9f960efb8d11667e129832ddadb', 'YES'),
(62, 'ROCA2018CSE31', 'SHUBHAM KUMAR SINGH ', 'CS/18/31', 'CSE', '7979721719', 'shubhamkrsingh11@gmail.com', '04-03-2019', '2018', 'NO', 'Not Specified', 'NO', 'IMG_1527477237105.jpg', 'ad8fe74a15a2be95d2e1a59ba7c695d1', 'YES'),
(64, 'ROCA2018CSE27', 'TARAN KUMAR', 'CS/18/27', 'CSE', '9123121002', 'taranwork221@gmail.com', '04-10-2018', '2018', 'NO', 'Not Specified', 'NO', 'IMG_20190304_194059.jpg', '096c0513b1e947d581bbacd3af5c9d3d', 'YES'),
(65, 'ROCA2018CSE39', 'ASHISH SINGH', 'CS/18/39', 'CSE', '9110065931', 'ashish7070raj@gmail.com', '04-10-2018', '2018', 'NO', 'Not Specified', 'NO', 'IMG-20190302-WA0002.jpg', '97b10acd28586ef5771761796d15d208', 'YES'),
(67, 'ROCA2018ME10', 'AHISH VINAYAK', 'ME/18/10', 'ME', '7903404369', 'ahishraj031@gmail.com', '04-09-2018', '2018', 'NO', 'Not Specified', 'NO', 'IMG-20190220-WA0030.jpg', '6875e8a34716fa5cae865431cd2d725c', 'YES'),
(68, 'ROCA2018CSE36', 'SHIVAM KUMAR SINGH', 'CS/18/36', 'CSE', '7808349592', 'shivamgyan123@gmail.com', '04-10-2018', '2018', 'NO', 'Not Specified', 'NO', 'PicsArt_10-20-11.09.12.jpg', '9899c2578a42792fed2838cf9c1e3f04', 'YES'),
(70, 'ROCA2018ME07', 'SHUBHRANSHA', 'ME/18/07', 'ME', '9570640793', 'indianarmymer@gmail.com', '13-08-2018', '2018', 'NO', 'Not Specified', 'NO', 'rps20190304_195735.jpg', '29d3e0f541923e8df0ccdb06b061740f', 'YES'),
(72, 'ROCA2017CH05', 'SHUVANKAR MAZUMDAR', 'CH/17/05', 'CH', '7890579654', 's18mazum99@gmail.com', '16-09-2017', '2017', 'YES', 'Junior Co-ordinator', 'NO', '2018-08-29-19-42-01-865.jpg', '5c60eec1ebd503ead4a1c7bd98520ad3', 'YES'),
(73, 'ROCA2018CSE07', 'RAJ CHOWDHURY', 'CS/18/07', 'CSE', '7047260616', 'rajcho3892@gmail.com', '05-08-2018', '2018', 'NO', 'Not Specified', 'NO', 'P_20181003_132314_HDR_1_1_1.jpg', '95c3b4411254866815984ce92aac32cd', 'YES'),
(74, 'ROCA2017CSE63', 'ANAND SHANKAR SINGH', 'CS/17/63', 'CSE', '8340230677', 'anandshanakrsingh99@gmail.com', '05-10-2017', '2017', 'YES', 'Junior Co-ordinator', 'NO', 'IMG_20190209_160156_551.jpg', '17ce833e2b2b5e75588a69b4673ec029', 'YES'),
(75, 'ROCA2018CSE05', 'AVIJIT SEN', 'CS/18/05', 'CSE', '8167772137', 'avijitsen553@gmail.com', '05-08-2018', '2018', 'NO', 'Not Specified', 'NO', 'IMG-20190305-WA0001_1.jpg', '4ab9405fc04189dccdd1b82c81503259', 'YES'),
(76, 'ROCA2018ME04', 'ANKIT KUMAR', 'ME/18/04', 'ME', '8340150141', 'ak5290888@gmail.com', '05-10-2018', '2018', 'NO', 'Not Specified', 'NO', 'FB_IMG_15517096468276687-640x640.jpg', '182c259135d6c2d08778db06d13e1622', 'YES'),
(77, 'ROCA2018CSE02', 'SHIVAM RAJ TEJASVI', 'CS/18/02', 'CSE', '7004155428', 'shivamrajtejasvi404@gmail.com', '05-03-2019', '2018', 'NO', 'Not Specified', 'NO', 'A58C89F4-A8FA-4602-A22C-0FAA43B04BAF.jpeg', '5ab38fd3a92cb9aa0e3474eb82059ffa', 'YES'),
(78, 'ROCA2018CH03', 'NANDALAL  SHARMA', 'CH/18/03', 'CH', '8597083095', 'nandalalsharma35912@gmail.com', '05-09-2018', '2018', 'NO', 'Not Specified', 'NO', '20190305204542910.jpg', '1dde22dfe820156210dac40aea189c74', 'YES'),
(80, 'ROCA2016ME04', 'CHANDAN KUMAR', 'ME/16/04', 'ME', '7301489048', 'kumarchandan7301@gmail.com', '20-08-2016', '2016', 'YES', 'Senior Co-ordinator', 'NO', 'IMG-20190305-WA0007.jpg', '050c47730a85340eee09ecd32ede1753', 'YES'),
(81, 'ROCA2018CSE23', 'GOUTAM GOPE', 'CS/18/23', 'CSE', '7667330026', 'crashbot000@gmail.com', '05-03-2019', '2018', 'NO', 'Not Specified', 'NO', 'IMG20190127154916.jpg', '93b57432867fb32109f38967729c5b0d', 'YES'),
(82, 'ROCA2018IT09', 'NITISH KUMAR', 'IT/18/09', 'IT', '8340148479', 'nkr290213@gmail.com', '05-10-2018', '2018', 'NO', 'Not Specified', 'NO', 'IMG_20181122_152425.jpg', '2341e1fc4e1fd88ec4d50e2a97d4c2e5', 'YES'),
(83, 'ROCA2018CSE55', 'INDRANIL GHOSH', 'CS/18/55', 'CSE', '9339557867', 'indranilghoshfeluda@gmail.com', '03-09-2018', '2018', 'NO', 'Not Specified', 'NO', 'New Doc 2019-03-06 00.11.48_1.jpg', 'fc275bb2da3c0ce5a2ef30122a870bea', 'YES'),
(85, 'ROCA2018CSE30', 'SONU KUMAR', 'CS/18/30', 'CSE', '8578966249', 'sonukumarraj37733@gmail.com', '21-08-2018', '2018', 'NO', 'Not Specified', 'NO', 'Webp.net-resizeimage.jpg', 'f50ac3d646c378d31af6e6bbe8915404', 'YES'),
(86, 'ROCA2018CH15', 'MANIKANT TIWARI', 'CH/18/15', 'CH', '7766930434', 'mani16052002@gmail.com', '21-08-2018', '2018', 'NO', 'Not Specified', 'NO', 'Webp.net-resizeimage (1).jpg', 'abdd6b92247e828798d3b06b8924d3a7', 'YES'),
(87, 'ROCA2018ECE07', 'NEHMALA', 'EC/18/07', 'ECE', '6202148990', 'nehamala15011999@gmail.com', '20-08-2018', '2018', 'NO', 'Not Specified', 'NO', 'IMG_20190306_133404.jpg', '22260cbc97bb4c4958e9a24955b1d133', 'YES'),
(88, 'ROCA2018CH14', 'SUDIP DIKSHIT', 'CH/18/14', 'CH', '7063295153', 'sudipdikshit123@gmail.com', '21-08-2018', '2018', 'NO', 'Not Specified', 'NO', 'IMG_20180830_202303-2340x3120-min.jpg', 'f53023c077b7b2a4f18ba98f6a54d088', 'YES'),
(89, 'ROCA2018IT02', 'ABHIJIT KUMAR', 'IT/18/02', 'IT', '9102833805', 'abhijitjha1458@gmail.com', '20-08-2018', '2018', 'NO', 'Not Specified', 'NO', 'BeautyPlus_20190307124546139_save.jpg', '619e4fe2898781b8df8c82df10e2fe61', 'YES'),
(90, 'ROCA2016ECE15', 'SANOBER ARA', 'EC/16/15', 'ECE', '6206561344', 'sanoberara1997@gmail.com', '07-03-2019', '2016', 'YES', 'Senior Co-ordinator', 'NO', 'IMG-20190307-WA0001.jpg', '05c10f0b6914de99b1aef81a717e1c64', 'YES'),
(91, 'ROCA2016ECE09', 'MUKUND MOHAN MISHRA', 'EC/16/09', 'ECE', '8282885613', 'mukundmishra755@gmail.com', '02-11-2016', '2016', 'YES', 'Senior Co-ordinator', 'NO', 'Photo0151.jpg', 'd5b95aafaa387655043543ddf687c87d', 'YES'),
(93, 'ROCA2017CSE18', 'ANUBHAV MITRA', 'CS/17/18', 'CSE', '8371093646', 'amitra8371@gmail.com', '07-03-2019', '2017', 'NO', 'Not Specified', 'NO', 'rps20190307_185434.jpg', '005f47cddf568dacb8d03e20ba682cf9', 'YES'),
(94, 'ROCA2016CSE54', 'ANKIT KUMAR VERMA', 'CS/16/54', 'CSE', '8873104490', 'sinhajittu3@gmail.com', '07-10-2016', '2016', 'YES', 'Senior Co-ordinator', 'NO', 'IMG-20190122-WA0003.jpg', '37981351807e0f5ddc1628a30da4e255', 'YES'),
(104, 'ROCA2018CSE22', 'KISHLAY KUMAR', 'CS/18/22', 'CSE', '8210507313', 'kishlayleo07@gmail.com', '20-08-2018', '2018', 'NO', 'Not Specified', 'NO', 'IMG-20180907-WA0027.jpg', '940a6c53de936b74d8e14053eb6cbe46', 'YES'),
(105, 'ROCA2018ME03', 'AMAR KUMAR', 'ME/18/03', 'ME', '8229071884', 'amarkrsingh899@gmail.com', '27-08-2018', '2018', 'NO', 'Not Specified', 'NO', 'FB_IMG_15519775701951849-178x223.jpg', 'f44dadab90306a0409f67850b6a30e02', 'YES'),
(106, 'ROCA2018ME09', 'BALRAM  RAJAK', 'ME/18/09', 'ME', '9340542987', 'balramrajat1999@gmail.com', '27-08-2018', '2018', 'NO', 'Not Specified', 'NO', 'IMG-20190307-WA0054.jpg', '3c89c415ca8ed61c7e216fae053ecdd2', 'YES'),
(107, 'ROCA2019ME62', 'BISWAJIT TUNGO', 'ME/17/62', 'ME', '8918305748', 'biswajittungo16@gmail.com', '08-03-2019', '2019', 'NO', 'Not Specified', 'NO', 'JPEG_20190107_183214.jpg', 'biswajit1997A', 'NO'),
(109, 'ROCA2018CSE40', 'ARSHADUL ISLAM', 'CS/18/40', 'CSE', '6202841826', 'arshislam34@gmail.com', '18-09-2018', '2018', 'NO', 'Not Specified', 'NO', 'ARSH PHOTO (1) (1) (1).jpg', '7f2ee5805f4540802f0b8b0c93d0b36b', 'YES'),
(110, 'ROCA2018CSE20', 'AKARSHAK RAJ SAXENA', 'CS/18/20', 'CSE', '9140843698', 'akarshakrsaxena@gmail.com', '27-08-2018', '2018', 'NO', 'Not Specified', 'NO', 'IMG20190308124714_crop_260x310.jpg', '78b568aba63e6144cad4e57cf2d712a1', 'YES'),
(111, 'ROCA2018CSE35', 'AKASH DALAI', 'CS/18/35', 'CSE', '6297188657', 'dalaiakash252@gmail.com', '20-08-2018', '2018', 'NO', 'Not Specified', 'NO', 'IMG-20190308-WA0000.jpg', '16a9be4883cc02cefb340d763c4080bf', 'YES'),
(112, 'ROCA2018CSE44', 'RAJAT BARNWAL', 'CS/18/44', 'CSE', '9060201223', 'barnwalrajat5@gmail.com', '20-08-2018', '2018', 'NO', 'Not Specified', 'NO', 'PHOTO RB+ sign.jpg', 'Rbar1234', 'NO'),
(113, 'ROCA2018CH12', 'DEEP MALA', 'CH/18/12', 'CH', '8877983387', 'deepmala2152000deep@gmail.com', '20-08-2018', '2018', 'NO', 'Not Specified', 'NO', 'IMG-20190308-WA0000.jpg', '9aa2c278872094868a87d670665df70c', 'YES'),
(114, 'ROCA2018IT05', 'SUMAN BAIDYA', 'IT/18/05', 'IT', '8918028704', 'sumanbaidya28101998@gmail.com', '27-08-2018', '2018', 'NO', 'Not Specified', 'NO', 'IMG-20190308-WA0019.jpg', '0b1e5f4bb382310b76bf6954b6075dfc', 'YES'),
(115, 'ROCA2018CSE19', 'AKASH METIA', 'CS/18/19', 'CSE', '9382044979', 'exoticakash12345@gmail.com', '08-03-2019', '2018', 'NO', 'Not Specified', 'NO', 'IMG-20181225-WA0015.jpg', 'Akash@#$_&-+()/12345', 'NO'),
(118, 'ROCA2019CSE50', 'AMIT JHA', 'CS/16/50', 'CSE', '8271333203', 'jhaamit225@gmail.com', '09-03-2019', '2019', 'NO', 'Not Specified', 'NO', 'PicsArt_01-20-01.48.55.jpg', 'India@123', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber_tbl`
--

CREATE TABLE `subscriber_tbl` (
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subscriber_tbl`
--

INSERT INTO `subscriber_tbl` (`email`) VALUES
('anupriya2016asn@gmail.com'),
('g.gyanankit@gmail.com'),
('salmankari0786@gmail.com'),
('way2sb228@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`unique_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `comments_tbl`
--
ALTER TABLE `comments_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coordinators_tbl`
--
ALTER TABLE `coordinators_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`unique_id`);

--
-- Indexes for table `event_tbl`
--
ALTER TABLE `event_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_tbl`
--
ALTER TABLE `faq_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_tbl`
--
ALTER TABLE `gallery_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intrest_tbl`
--
ALTER TABLE `intrest_tbl`
  ADD PRIMARY KEY (`unique_id`,`event`);

--
-- Indexes for table `member_register_tbl`
--
ALTER TABLE `member_register_tbl`
  ADD PRIMARY KEY (`unique_id`);

--
-- Indexes for table `notice_tbl`
--
ALTER TABLE `notice_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participation_tbl`
--
ALTER TABLE `participation_tbl`
  ADD PRIMARY KEY (`id`,`email`);

--
-- Indexes for table `payment_tbl`
--
ALTER TABLE `payment_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `query_tbl`
--
ALTER TABLE `query_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roca_member_tbl`
--
ALTER TABLE `roca_member_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`unique_id`),
  ADD UNIQUE KEY `roll` (`roll`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `subscriber_tbl`
--
ALTER TABLE `subscriber_tbl`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments_tbl`
--
ALTER TABLE `comments_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coordinators_tbl`
--
ALTER TABLE `coordinators_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `event_tbl`
--
ALTER TABLE `event_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faq_tbl`
--
ALTER TABLE `faq_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gallery_tbl`
--
ALTER TABLE `gallery_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `notice_tbl`
--
ALTER TABLE `notice_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment_tbl`
--
ALTER TABLE `payment_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `query_tbl`
--
ALTER TABLE `query_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roca_member_tbl`
--
ALTER TABLE `roca_member_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
