-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 30, 2018 at 07:24 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `market`
--

-- --------------------------------------------------------

--
-- Table structure for table `check_ins`
--

CREATE TABLE `check_ins` (
  `id` int(10) UNSIGNED NOT NULL,
  `reservation_id` int(10) UNSIGNED NOT NULL,
  `path` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `topic`, `comment`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'ความสะดวก', 'ควรจะทำหลายๆจุดให้เข้าถึงง่ายกว่านี้นะครับ เช่น การแก้ไข การเข้าถึง', 4, '2018-04-30 17:14:24', '2018-04-30 17:14:24'),
(2, 'สร้างตลาดยังไงครับ', 'คือผมหาปุ่มไม่เจออะครับ', 5, '2018-04-30 17:14:24', '2018-04-30 17:14:24'),
(3, 'สร้างตลาดไม่สำเร๊จแต่จ่ายตังไปแล้วครับ', 'จ่ายเงินไปแล้วตลาดไม่ขึ้นหน้าเว็ปครับ ผมกดสร้างไปแล้วเรียบร้อยทุกขั้นตอนอะครับแต่ว่ามันไม่ขึ้นหน้าเวปอะครับช่วยตรวจสอบด้วยครับ', 6, '2018-04-30 17:14:24', '2018-04-30 17:14:24'),
(4, 'มีซื้อ ad เพื่อให้ตลาดขึ้นไปหน้าแรกไหมครับ', 'ผมอยากให้ทุกคนเห็นตลาดผมครับ', 7, '2018-04-30 17:14:24', '2018-04-30 17:14:24');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `markets`
--

CREATE TABLE `markets` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `close_day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `close_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organizer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `teaser` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `latitude` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `markets`
--

INSERT INTO `markets` (`id`, `name`, `location`, `start_day`, `close_day`, `start_time`, `close_time`, `organizer_name`, `contact_name`, `email`, `phone`, `description`, `teaser`, `view`, `created_by`, `is_enabled`, `latitude`, `longitude`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ตลาดสุรัติ', '50 ถนน งามวงศ์วาน แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10900', '2018-04-30', '2018-05-03', '17:00:00', '02:00:00', 'SuratCorparation', 'Surat', 'surat_going@hotmail.com', '0968122727', 'true', 'rgvfKvl7zWA', 26, 1, 1, '13.846677', '100.569209', '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL),
(2, 'ตลาดเสรีมาร์เก็ต', 'ขวง เสนานิคม เขต จตุจักร กรุงเทพมหานคร 10900', '2018-05-01', '2018-06-01', '11:00:00', '17:00:00', 'Gundam', 'คุณแต้ว่', 'taweecc@hotmail.com', '0907811712', 'true', 'pk8HzIO_j3w', 35, 2, 1, '13.841535', '100.585973', '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL),
(3, 'ตลาดนัดสวนจตุจักร', 'Kamphaeng Phet 2 Rd, Khwaeng Chatuchak, Khet Chatuchak, กรุงเทพมหานคร 10900', '2018-06-30', '2018-11-03', '18:00:00', '01:00:00', 'Jatuka', 'jukrit', 'jukrit@hotmail.com', '026634354', 'ตลาดนัดสวนจตุจักร เป็นตลาดนัดที่ใหญ่ที่สุดในประเทศไทย ตลาดนัดแห่งนี้เป็นสถานที่ที่นักท่องเที่ยว ที่มาเที่ยวกรุงเทพฯ ทุกคนควรมา โดยเฉพาะนักช็อปทั้งหลาย เวลาเปิดปิดของตลาดนัดนั้น ', 'ORa7Pxo5xOQ', 40, 3, 1, '13.800101', '100.568266', '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL),
(4, 'ตลาดนัดรถไฟ รัชดา', '50 ถนน งามวงศ์วาน แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10900', '2018-04-30', '2010-05-03', '17:00:00', '02:00:00', 'SuratCorparation', 'Surat', 'surat_going@hotmail.com', '0968122727', 'true', 'mIQtWbwAb3A', 25, 7, 1, '13.846677', '100.569209', '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL),
(5, 'ตลาดกัช', 'ตำบล ปากแพรก อำเภอเมืองกาญจนบุรี กาญจนบุรี 71000', '2018-05-10', '2018-05-13', '12:00:00', '24:00:00', 'Teangone', 'Mr.Teangkun', 'teangteang@hotmail.com', '0901547819', 'ตลาดนี้มีทั้งร้านค้าปลีกและแผงลอยด้านนอกซึ่งเน้นไปที่ลูกค้าซึ่งเป็นนักท่องเที่ยว ตลาดนี้ตั้งอยู่ตรงแยกราชปรารภและถนนเพชรบุรีในเขตราชเทวี ที่นี่ถือว่าเป็นหนึ่งในที่ซึ่งขายเสื้อผ้าในราคาที่ถูกที่สุดในใจกลางกรุงเทพมหานคร นอกจากเสื้อผ้าแล้วของที่ขายยังมีนาฬิกาข้อมือ หัตถกรรม และอื่น ๆ', '94wONqG3iDQ', 109, 10, 1, '14.044891', '99.577637', '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL),
(6, 'ตลาด4มุมเมือง', 'หมู่บ้าน ไวท์เครน อำเภอ ธัญบุรี ปทุมธานี 12110', '2018-05-10', '2018-07-03', '06:00:00', '18:00:00', 'fakedata@hotmail.com', 'Mr.Fake', 'fakeyub@hotmail.com', '09012345432', 'ตลาดเสื้อผ้าและเครื่องประดับ ของไทยที่สามารถนำสินค้าไปขาย โดยเปิดหน้าร้านขายของ หรือขายแบบออนไลน์ได้และเป็นตลาดที่รู้จักกันดีทั้งคนไทยและชาวต่างชาติก็คือ 4มุมเมือง', 'jkJ2bLYj_OY', 26, 12, 1, '13.841010', '100.593992', '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `market_images`
--

CREATE TABLE `market_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `market_id` int(10) UNSIGNED NOT NULL,
  `path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('layout','screenshot') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `market_images`
--

INSERT INTO `market_images` (`id`, `market_id`, `path`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'm11.jpg', 'screenshot', '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL),
(2, 1, 'm12.jpg', 'screenshot', '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL),
(3, 1, 'layout1.jpg', 'layout', '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL),
(4, 2, 'layout2.jpg', 'layout', '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL),
(5, 2, 'rat.jpg', 'screenshot', '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL),
(6, 2, 'poom.jpg', 'screenshot', '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL),
(7, 2, 'nut.jpg', 'screenshot', '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL),
(8, 3, 'layout3.jpg', 'layout', '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL),
(9, 3, 'm31.jpg', 'screenshot', '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL),
(10, 3, 'm32.jpg', 'screenshot', '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL),
(11, 3, 'img_screenshot_2018-04-30 14-36-00_กก.jpg', 'screenshot', '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL),
(12, 4, 'img_layout_2018-04-30 14-36-00_layoud.jpg', 'layout', '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL),
(13, 4, 'img_screenshot_2018-04-30 14-36-00_4.jpg', 'screenshot', '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL),
(14, 4, 'img_screenshot_2018-04-30 14-36-00_11.jpg', 'screenshot', '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL),
(15, 4, 'img_screenshot_2018-04-30 14-36-00_nn.jpg', 'screenshot', '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL),
(16, 5, 'img_screenshot_2018-04-30 14-36-00_3วว.jpg', 'screenshot', '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL),
(17, 5, 'img_layout_2018-04-30 14-36-00_layoutaw.jpg', 'layout', '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL),
(18, 6, 'img_screenshot_2018-04-30 14-36-00_3พพ.jpg', 'screenshot', '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL),
(19, 6, 'img_screenshot_2018-04-30 14-36-00_3ออ.jpg', 'screenshot', '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL),
(20, 6, 'img_layout_2018-04-30 14-36-00_layoutฟ.jpg', 'layout', '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(133, '2014_10_12_000000_create_users_table', 1),
(134, '2014_10_12_100000_create_password_resets_table', 1),
(135, '2015_04_25_050956_create_markets_table', 1),
(136, '2018_04_25_050957_create_zones_table', 1),
(137, '2018_04_25_055826_create_reservations_table', 1),
(138, '2018_04_25_072037_create_check_ins_table', 1),
(139, '2018_04_25_074412_create_market_images_table', 1),
(140, '2018_04_25_075646_create_webboards_table', 1),
(141, '2018_04_25_081152_create_webboard_replies_table', 1),
(142, '2018_04_25_083531_create_logs_table', 1),
(143, '2018_04_27_032229_create_verify_users_table', 1),
(144, '2018_04_27_201546_create_feedbacks_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(10) UNSIGNED NOT NULL,
  `zone_id` int(10) UNSIGNED NOT NULL,
  `number` int(10) UNSIGNED NOT NULL,
  `reserved_by` int(10) UNSIGNED DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('seller','organizer','administrator') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_vertified` tinyint(1) NOT NULL DEFAULT '0',
  `is_enabled` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `address`, `birthday`, `phone`, `image`, `type`, `is_vertified`, `is_enabled`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'judge@admin', '$2y$10$lNSjKRS8u5BxyCSYYBN6IeM03kuiox8bNvl1c4hhJqVYC29nZiD.G', 'Judge', 'Champhole', 'asdasdasdasd', '1997-02-02', '0955555555', '', 'administrator', 1, 1, 'X91KfzPoaSclZG3gp3hlGfWOL6pbfOzMpCy93aHUXuRtdnmRkkKfPIYOu5R6', '2018-04-30 17:14:23', '2018-04-30 17:14:23', NULL),
(2, 'poom@com', '$2y$10$j5qsr1nm8ZQo8cTWMDXRy.bDZF3qP/wOcTSL6P9BY.sH5Er/OLk.G', 'Wongpiwat', 'Sangiam', 'Bangkok, Thailand', '1997-02-02', '0955555555', '', 'seller', 1, 1, '4Y09nbchCa6C78kr4dljeYLjomJOzCzurk6tfthsRFtEp09WI7WhFs9jaZM8', '2018-04-30 17:14:23', '2018-04-30 17:14:23', NULL),
(3, 'nut@hotmail.com', '$2y$10$4PnjRA4cmLv8WYwf9u5XX.vAgY56ydDYhUaLsxnfty9QGLhqNiE6q', 'supanut', 'thiensuwan', '19/3 ชุมชน นิรันดร์ ถ.โกศลมหาราช ต.วศิล อ.เมือง จ.เชียงใหม่ 13049 ', '1996-02-02', '0830327834', '', 'administrator', 1, 1, NULL, '2018-04-30 17:14:23', '2018-04-30 17:14:23', NULL),
(4, 'surat@hotmail.com', '$2y$10$YoqybQ.fqb.9M5ZeS1cSauK4NYc57lYw6AFwaqKQfCUUjSxxM/A0.', 'Surat', 'Panittrakul', '158/3 หมู่ 2 ตำบนบางตะบูนออก อำเภอบ้านแหลม จังหวัดเพชรบุรี 76110', '2003-05-02', '0839238902', '', 'seller', 1, 1, NULL, '2018-04-30 17:14:23', '2018-04-30 17:14:23', NULL),
(5, 'sacchonwebtech@speed.th', '$2y$10$UIBBah1gCgO8irFr19FW4uH4HZTIdjjW5qrquSUTqVSLjZWIuhpHS', 'Sacc', 'Chonlewgern', 'Bang Kruai District Nonthaburi 11130', '1999-09-09', '0337678548', '', 'administrator', 1, 1, NULL, '2018-04-30 17:14:23', '2018-04-30 17:14:23', NULL),
(6, 'starfluke@gmail.com', '$2y$10$jOVxAXRbCX5zz7dPgpOnKOKpW4.REq7TScHwJgmXmXlhGUcc1o5LO', 'Surat', 'JunOC', 'Tambon Bang Khanun, Amphoe Bang Kruai Chang Wat Nonthaburi 11130', '2000-01-02', '0786543321', '', 'administrator', 1, 1, NULL, '2018-04-30 17:14:23', '2018-04-30 17:14:23', NULL),
(7, 'marvelman@tu.th', '$2y$10$QHUL6pZhsPF0GbFRwn68j.Hjfhg0/VpLtrLddwiru.NLm9MriytHq', 'Marvel', 'Manmen', 'Tambon Na Wang Hin, Amphoe Phanat Nikhom Chang Wat Chon Buri 20140', '1997-07-02', '0665461277', '', 'organizer', 1, 1, NULL, '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL),
(8, 'Jayza888@hotmail.com', '$2y$10$7t0XJHTPIF43KBNHukU5XOaMrrgJoU9txJbeBGxV93Pr3yZW00Aoa', 'Jakarin', 'Pondikul', 'Phanat Nikhom District Chon Buri', '2008-01-09', '0787865455', '', 'seller', 1, 1, NULL, '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL),
(9, 'boom_in@hotmail.com', '$2y$10$Yym6TOZSHObYiNa.319zpeouXcDcvxr972rc6sorxh3yHM1JyA0AW', 'Anaphat', 'Pombangmark', 'Tambon Mon Nang, Amphoe Phanat Nikhom Chang Wat Chon Buri 20140', '1967-10-02', '0877199259', '', 'seller', 1, 1, NULL, '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL),
(10, 'punch_huaterk@pra.ch', '$2y$10$ujcDEppzI4W435GrHORNDuODwzUWF0HzNX3GvzG0ynU3Akqvhsx/2', 'Nattanon', 'Bunyasing', 'Lat Bua Luang District Phra Nakhon Si Ayutthaya', '1997-06-10', '0876672133', '', 'organizer', 1, 1, NULL, '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL),
(11, '11userfake@fake.com', '$2y$10$FdH0Bd.jwFoICoxqgDe1feiio9l/9AZvOTNYhn11wxXAShabCqQfu', 'Umakorn', 'Boychobmark', 'Lat Yao District Nakhon Sawan', '1995-03-02', '0673345123', '', 'seller', 1, 1, NULL, '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL),
(12, 'thetoyke@hotmail.com', '$2y$10$87SbbWFXhQk2LmetrvshxO/c1x45p.mzOCkMO.IbFdm9jAbWu4akK', 'Toy', 'DuckStation', 'Nong Bua Lam Phu', '1997-02-02', '0978555355', '', 'organizer', 1, 1, NULL, '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL),
(13, 'ggdragon99@gmail.com', '$2y$10$JmdunWYFM.aKlcSEyWc89OEEF1x8SaSnxhY8/RCIw5xij3KHuynE2', 'Jarukio', 'Dego', 'Lom Kao District Phetchabun', '1977-07-06', '0897787676', '', 'organizer', 1, 1, NULL, '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL),
(14, 'kannonroksud@webtech.ku', '$2y$10$MVoAodhcE9UFoPgLYOrGj.yYQmGQE8quWOM1Oi1gBpx1T/Gc0HcgG', 'Kanoon', 'Rokrakkernjud', 'Mueang Ratchaburi District Ratchaburi', '2011-11-09', '0781741313', '', 'organizer', 1, 1, NULL, '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `verify_users`
--

CREATE TABLE `verify_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `webboards`
--

CREATE TABLE `webboards` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('general','problems','markets') COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `market_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `webboards`
--

INSERT INTO `webboards` (`id`, `topic`, `type`, `details`, `created_by`, `market_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'สอบถามสถานที่', 'general', 'อยากสอบถามว่าอาหารไทยอยู่ตรงไหนครับ', 1, NULL, '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL),
(2, 'สอบถามอาหารแถวในเมืองลพบุรี', 'general', 'ร้านอาหารใกล้สถานที่ท่องเที่ยวที่มีวิวสวยๆอยู่ตรงไหนบ้างครับ', 2, NULL, '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL),
(3, 'สวัสดีครับ', 'general', 'มีใครอยู่ไหม?', 3, NULL, '2018-04-30 17:14:24', '2018-04-30 17:14:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `webboard_replies`
--

CREATE TABLE `webboard_replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `reply_to` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` int(10) UNSIGNED NOT NULL,
  `market_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `check_ins`
--
ALTER TABLE `check_ins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `check_ins_reservation_id_foreign` (`reservation_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedbacks_created_by_foreign` (`created_by`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logs_created_by_foreign` (`created_by`);

--
-- Indexes for table `markets`
--
ALTER TABLE `markets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `markets_created_by_foreign` (`created_by`);

--
-- Indexes for table `market_images`
--
ALTER TABLE `market_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `market_images_market_id_foreign` (`market_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_zone_id_foreign` (`zone_id`),
  ADD KEY `reservations_reserved_by_foreign` (`reserved_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `verify_users`
--
ALTER TABLE `verify_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `verify_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `webboards`
--
ALTER TABLE `webboards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `webboards_created_by_foreign` (`created_by`),
  ADD KEY `webboards_market_id_foreign` (`market_id`);

--
-- Indexes for table `webboard_replies`
--
ALTER TABLE `webboard_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `webboard_replies_reply_to_foreign` (`reply_to`),
  ADD KEY `webboard_replies_created_by_foreign` (`created_by`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zones_market_id_foreign` (`market_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `check_ins`
--
ALTER TABLE `check_ins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `markets`
--
ALTER TABLE `markets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `market_images`
--
ALTER TABLE `market_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `verify_users`
--
ALTER TABLE `verify_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `webboards`
--
ALTER TABLE `webboards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `webboard_replies`
--
ALTER TABLE `webboard_replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `check_ins`
--
ALTER TABLE `check_ins`
  ADD CONSTRAINT `check_ins_reservation_id_foreign` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`);

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `markets`
--
ALTER TABLE `markets`
  ADD CONSTRAINT `markets_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `market_images`
--
ALTER TABLE `market_images`
  ADD CONSTRAINT `market_images_market_id_foreign` FOREIGN KEY (`market_id`) REFERENCES `markets` (`id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_reserved_by_foreign` FOREIGN KEY (`reserved_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reservations_zone_id_foreign` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`);

--
-- Constraints for table `verify_users`
--
ALTER TABLE `verify_users`
  ADD CONSTRAINT `verify_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `webboards`
--
ALTER TABLE `webboards`
  ADD CONSTRAINT `webboards_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `webboards_market_id_foreign` FOREIGN KEY (`market_id`) REFERENCES `markets` (`id`);

--
-- Constraints for table `webboard_replies`
--
ALTER TABLE `webboard_replies`
  ADD CONSTRAINT `webboard_replies_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `webboard_replies_reply_to_foreign` FOREIGN KEY (`reply_to`) REFERENCES `webboards` (`id`);

--
-- Constraints for table `zones`
--
ALTER TABLE `zones`
  ADD CONSTRAINT `zones_market_id_foreign` FOREIGN KEY (`market_id`) REFERENCES `markets` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
