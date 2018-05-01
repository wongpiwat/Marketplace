-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2018 at 12:28 PM
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
(1, 'ความสะดวก', 'ควรจะทำหลายๆจุดให้เข้าถึงง่ายกว่านี้นะครับ เช่น การแก้ไข การเข้าถึง', 4, '2018-05-01 10:25:49', '2018-05-01 10:25:49'),
(2, 'สร้างตลาดยังไงครับ', 'คือผมหาปุ่มไม่เจออะครับ', 5, '2018-05-01 10:25:49', '2018-05-01 10:25:49'),
(3, 'สร้างตลาดไม่สำเร๊จแต่จ่ายตังไปแล้วครับ', 'จ่ายเงินไปแล้วตลาดไม่ขึ้นหน้าเว็ปครับ ผมกดสร้างไปแล้วเรียบร้อยทุกขั้นตอนอะครับแต่ว่ามันไม่ขึ้นหน้าเวปอะครับช่วยตรวจสอบด้วยครับ', 6, '2018-05-01 10:25:49', '2018-05-01 10:25:49'),
(4, 'มีซื้อ ad เพื่อให้ตลาดขึ้นไปหน้าแรกไหมครับ', 'ผมอยากให้ทุกคนเห็นตลาดผมครับ', 7, '2018-05-01 10:25:49', '2018-05-01 10:25:49');

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
(1, 'ตลาดสุรัติ', '50 ถนน งามวงศ์วาน แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10900', '2018-04-30', '2018-05-03', '17:00:00', '02:00:00', 'SuratCorparation', 'Surat', 'surat_going@hotmail.com', '0968122727', 'ทำเลทองสำหรับค้าขายเพื่อพ่อค้าแม่ค้าทั้งหลายที่สนใจขายของตามตลาดนัด เป็นอีกหนึ่งสถานที่ขายน่าสนใจ เปิดขายในเวลากลางคืน เป็นแหล่งช้อปปิ้งที่ถูกใจทุกเพศทุกวัย มีสินค้าหลากหลายไม่ว่าจะของกิน เสื้อผ้า หรือของใช้ต่างๆ เหมาะสำหรับแม่ค้าที่ขายสินค้าทุกประเภท', 'rgvfKvl7zWA', 25, 1, 1, '13.846677', '100.569209', '2018-05-01 10:25:48', '2018-05-01 10:25:48', NULL),
(2, 'ตลาดเสรีมาร์เก็ต', 'ขวง เสนานิคม เขต จตุจักร กรุงเทพมหานคร 10900', '2018-05-01', '2018-06-01', '11:00:00', '17:00:00', 'Gundam', 'คุณแต้ว่', 'taweecc@hotmail.com', '0907811712', 'ทำเลทองสำหรับค้าขายเพื่อพ่อค้าแม่ค้าทั้งหลายที่สนใจขายของตามตลาดนัด เป็นอีกหนึ่งสถานที่ขายน่าสนใจ เปิดขายในเวลากลางคืน เป็นแหล่งช้อปปิ้งที่ถูกใจทุกเพศทุกวัย มีสินค้าหลากหลายไม่ว่าจะของกิน เสื้อผ้า หรือของใช้ต่างๆ เหมาะสำหรับแม่ค้าที่ขายสินค้าทุกประเภท', 'pk8HzIO_j3w', 35, 2, 1, '13.841535', '100.585973', '2018-05-01 10:25:48', '2018-05-01 10:25:48', NULL),
(3, 'ตลาดนัดสวนจตุจักร', 'Kamphaeng Phet 2 Rd, Khwaeng Chatuchak, Khet Chatuchak, กรุงเทพมหานคร 10900', '2018-06-30', '2018-11-03', '18:00:00', '01:00:00', 'Jatuka', 'jukrit', 'jukrit@hotmail.com', '026634354', 'ตลาดนัดสวนจตุจักร เป็นตลาดนัดที่ใหญ่ที่สุดในประเทศไทย ตลาดนัดแห่งนี้เป็นสถานที่ที่นักท่องเที่ยว ที่มาเที่ยวกรุงเทพฯ ทุกคนควรมา โดยเฉพาะนักช็อปทั้งหลาย เวลาเปิดปิดของตลาดนัดนั้น ', 'ORa7Pxo5xOQ', 40, 3, 1, '13.800101', '100.568266', '2018-05-01 10:25:48', '2018-05-01 10:25:48', NULL),
(4, 'ตลาดนัดรถไฟ รัชดา', '50 ถนน งามวงศ์วาน แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10900', '2018-04-30', '2010-05-03', '17:00:00', '02:00:00', 'SuratCorparation', 'Surat', 'surat_going@hotmail.com', '0968122727', 'ทำเลทองสำหรับค้าขายเพื่อพ่อค้าแม่ค้าทั้งหลายที่สนใจขายของตามตลาดนัด เป็นอีกหนึ่งสถานที่ขายน่าสนใจ เปิดขายในเวลากลางคืน เป็นแหล่งช้อปปิ้งที่ถูกใจทุกเพศทุกวัย มีสินค้าหลากหลายไม่ว่าจะของกิน เสื้อผ้า หรือของใช้ต่างๆ เหมาะสำหรับแม่ค้าที่ขายสินค้าทุกประเภท', 'mIQtWbwAb3A', 25, 7, 1, '13.846677', '100.569209', '2018-05-01 10:25:48', '2018-05-01 10:25:48', NULL),
(5, 'ตลาดกัช', 'ตำบล ปากแพรก อำเภอเมืองกาญจนบุรี กาญจนบุรี 71000', '2018-05-10', '2018-05-13', '12:00:00', '24:00:00', 'Teangone', 'Mr.Teangkun', 'teangteang@hotmail.com', '0901547819', 'ตลาดนี้มีทั้งร้านค้าปลีกและแผงลอยด้านนอกซึ่งเน้นไปที่ลูกค้าซึ่งเป็นนักท่องเที่ยว ตลาดนี้ตั้งอยู่ตรงแยกราชปรารภและถนนเพชรบุรีในเขตราชเทวี ที่นี่ถือว่าเป็นหนึ่งในที่ซึ่งขายเสื้อผ้าในราคาที่ถูกที่สุดในใจกลางกรุงเทพมหานคร นอกจากเสื้อผ้าแล้วของที่ขายยังมีนาฬิกาข้อมือ หัตถกรรม และอื่น ๆ', '94wONqG3iDQ', 10, 10, 1, '14.044891', '99.577637', '2018-05-01 10:25:48', '2018-05-01 10:25:48', NULL),
(6, 'ตลาด4มุมเมือง', 'หมู่บ้าน ไวท์เครน อำเภอ ธัญบุรี ปทุมธานี 12110', '2018-05-10', '2018-07-03', '06:00:00', '18:00:00', 'fakedata@hotmail.com', 'Mr.Fake', 'fakeyub@hotmail.com', '09012345432', 'ตลาดเสื้อผ้าและเครื่องประดับ ของไทยที่สามารถนำสินค้าไปขาย โดยเปิดหน้าร้านขายของ หรือขายแบบออนไลน์ได้และเป็นตลาดที่รู้จักกันดีทั้งคนไทยและชาวต่างชาติก็คือ 4มุมเมือง', 'jkJ2bLYj_OY', 26, 12, 1, '13.841010', '100.593992', '2018-05-01 10:25:48', '2018-05-01 10:25:48', NULL);

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
(1, 1, 'ss_3.jpg', 'screenshot', '2018-05-01 10:25:48', '2018-05-01 10:25:48', NULL),
(2, 1, 'lo_layout.jpg', 'layout', '2018-05-01 10:25:48', '2018-05-01 10:25:48', NULL),
(3, 2, 'lo_layout.jpg', 'layout', '2018-05-01 10:25:48', '2018-05-01 10:25:48', NULL),
(4, 2, 'ss_1.jpg', 'screenshot', '2018-05-01 10:25:48', '2018-05-01 10:25:48', NULL),
(5, 2, 'ss_2.jpg', 'screenshot', '2018-05-01 10:25:48', '2018-05-01 10:25:48', NULL),
(6, 2, 'ss_3.jpg', 'screenshot', '2018-05-01 10:25:48', '2018-05-01 10:25:48', NULL),
(7, 3, 'lo_layout3.jpg', 'layout', '2018-05-01 10:25:48', '2018-05-01 10:25:48', NULL),
(8, 3, 'ss_m31.jpg', 'screenshot', '2018-05-01 10:25:48', '2018-05-01 10:25:48', NULL),
(9, 3, 'ss_m32.jpg', 'screenshot', '2018-05-01 10:25:49', '2018-05-01 10:25:49', NULL),
(10, 3, 'ss_m33.jpg', 'screenshot', '2018-05-01 10:25:49', '2018-05-01 10:25:49', NULL),
(11, 4, 'lo_ss.jpg', 'layout', '2018-05-01 10:25:49', '2018-05-01 10:25:49', NULL),
(12, 4, 'ss_1.jpg', 'screenshot', '2018-05-01 10:25:49', '2018-05-01 10:25:49', NULL),
(13, 4, 'ss_nn.jpg', 'screenshot', '2018-05-01 10:25:49', '2018-05-01 10:25:49', NULL),
(14, 5, 'lo_layoutaw.jpg', 'layout', '2018-05-01 10:25:49', '2018-05-01 10:25:49', NULL),
(15, 5, 'ss_3.jpg', 'screenshot', '2018-05-01 10:25:49', '2018-05-01 10:25:49', NULL),
(16, 6, 'ss_31.jpg', 'screenshot', '2018-05-01 10:25:49', '2018-05-01 10:25:49', NULL),
(17, 6, 'ss_32.jpg', 'screenshot', '2018-05-01 10:25:49', '2018-05-01 10:25:49', NULL),
(18, 6, 'lo_layout.jpg', 'layout', '2018-05-01 10:25:49', '2018-05-01 10:25:49', NULL);

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
(469, '2014_10_12_000000_create_users_table', 1),
(470, '2014_10_12_100000_create_password_resets_table', 1),
(471, '2015_04_25_050956_create_markets_table', 1),
(472, '2018_04_25_050957_create_zones_table', 1),
(473, '2018_04_25_055826_create_reservations_table', 1),
(474, '2018_04_25_072037_create_check_ins_table', 1),
(475, '2018_04_25_074412_create_market_images_table', 1),
(476, '2018_04_25_075646_create_webboards_table', 1),
(477, '2018_04_25_081152_create_webboard_replies_table', 1),
(478, '2018_04_25_083531_create_logs_table', 1),
(479, '2018_04_27_032229_create_verify_users_table', 1),
(480, '2018_04_27_201546_create_feedbacks_table', 1);

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
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 'judge@admin', '$2y$10$gZccAM9SFX08hxg6389NQOLyi9lFtCFFnLBthGEJmg6fwZ90UoXmC', 'Judge', 'Champhole', 'asdasdasdasd', '1997-02-02', '0955555555', '', 'administrator', 1, 1, NULL, '2018-05-01 10:25:47', '2018-05-01 10:25:47', NULL),
(2, 'poom@com', '$2y$10$.iTsdH7BAUfBc4.eycuRo.bv88QwKSdL/xe/hjHkAPGg/ml9CKj0i', 'Wongpiwat', 'Sangiam', 'Bangkok, Thailand', '1997-02-02', '0955555555', '', 'seller', 1, 1, NULL, '2018-05-01 10:25:47', '2018-05-01 10:25:47', NULL),
(3, 'nut@hotmail.com', '$2y$10$hBhU3pRreMSS6wW//eMf1OPjcwOA9Pvg2GQS2Slh4fXU5Mh8mz9qG', 'supanut', 'thiensuwan', '19/3 ชุมชน นิรันดร์ ถ.โกศลมหาราช ต.วศิล อ.เมือง จ.เชียงใหม่ 13049 ', '1996-02-02', '0830327834', '', 'administrator', 1, 1, NULL, '2018-05-01 10:25:48', '2018-05-01 10:25:48', NULL),
(4, 'surat@hotmail.com', '$2y$10$1JZN3s2EwjuZfjs7xieAvuAZ.rSQxXiy2NNOzyEjajxLoYMDb1ahi', 'Surat', 'Panittrakul', '158/3 หมู่ 2 ตำบนบางตะบูนออก อำเภอบ้านแหลม จังหวัดเพชรบุรี 76110', '2003-05-02', '0839238902', '', 'seller', 1, 1, NULL, '2018-05-01 10:25:48', '2018-05-01 10:25:48', NULL),
(5, 'sacchonwebtech@speed.th', '$2y$10$0qJOEAUhjVphowbvYGmoAe.yg8prAst0Te/tyCqVCSeytaELG2yaa', 'Sacc', 'Chonlewgern', 'Bang Kruai District Nonthaburi 11130', '1999-09-09', '0337678548', '', 'administrator', 1, 1, NULL, '2018-05-01 10:25:48', '2018-05-01 10:25:48', NULL),
(6, 'starfluke@gmail.com', '$2y$10$5hSPonPQFpK3kvmKdhudN.Z/pMiYpCSDPpzY5nJieJhTnR.Kz8.Im', 'Surat', 'JunOC', 'Tambon Bang Khanun, Amphoe Bang Kruai Chang Wat Nonthaburi 11130', '2000-01-02', '0786543321', '', 'administrator', 1, 1, NULL, '2018-05-01 10:25:48', '2018-05-01 10:25:48', NULL),
(7, 'marvelman@tu.th', '$2y$10$W0JO/mPTUf2GkCeuUdAAgOHH7d2CCJPU0HU8UZ8DKIPhFodZ6waEe', 'Marvel', 'Manmen', 'Tambon Na Wang Hin, Amphoe Phanat Nikhom Chang Wat Chon Buri 20140', '1997-07-02', '0665461277', '', 'organizer', 1, 1, NULL, '2018-05-01 10:25:48', '2018-05-01 10:25:48', NULL),
(8, 'Jayza888@hotmail.com', '$2y$10$WRFThP7ADjIxE8zggwPaE.ejieH5Tf/gMB4hvgTXPqTqkULK6RRFW', 'Jakarin', 'Pondikul', 'Phanat Nikhom District Chon Buri', '2008-01-09', '0787865455', '', 'seller', 1, 1, NULL, '2018-05-01 10:25:48', '2018-05-01 10:25:48', NULL),
(9, 'boom_in@hotmail.com', '$2y$10$oWqqbeEXa/IZgeV/jQjqeOLPeI7YxvD4M2EKmInyypUMrZrFe92re', 'Anaphat', 'Pombangmark', 'Tambon Mon Nang, Amphoe Phanat Nikhom Chang Wat Chon Buri 20140', '1967-10-02', '0877199259', '', 'seller', 1, 1, NULL, '2018-05-01 10:25:48', '2018-05-01 10:25:48', NULL),
(10, 'punch_huaterk@pra.ch', '$2y$10$dWYyu11zuw.7FxB53DcN.ObLn2kHKbdOu9tLa3lhR4esL8.Ke2r5.', 'Nattanon', 'Bunyasing', 'Lat Bua Luang District Phra Nakhon Si Ayutthaya', '1997-06-10', '0876672133', '', 'organizer', 1, 1, NULL, '2018-05-01 10:25:48', '2018-05-01 10:25:48', NULL),
(11, '11userfake@fake.com', '$2y$10$2WcS6e1LQRIFAz.oJf9A5.cHDMQQ/EiJ6Oa1k2po6EoAHj3aDRd42', 'Umakorn', 'Boychobmark', 'Lat Yao District Nakhon Sawan', '1995-03-02', '0673345123', '', 'seller', 1, 1, NULL, '2018-05-01 10:25:48', '2018-05-01 10:25:48', NULL),
(12, 'thetoyke@hotmail.com', '$2y$10$sHUViTUppw./MV2z6TQGNuDYHYGquNnMY8WPVKQoRTOWs68vvAKPC', 'Toy', 'DuckStation', 'Nong Bua Lam Phu', '1997-02-02', '0978555355', '', 'organizer', 1, 1, NULL, '2018-05-01 10:25:48', '2018-05-01 10:25:48', NULL),
(13, 'ggdragon99@gmail.com', '$2y$10$UNvoGwg3KJjJuearO2HTeO6c0.cKpJ05jQeq9sfHIys1zI7Xf5mie', 'Jarukio', 'Dego', 'Lom Kao District Phetchabun', '1977-07-06', '0897787676', '', 'organizer', 1, 1, NULL, '2018-05-01 10:25:48', '2018-05-01 10:25:48', NULL),
(14, 'kannonroksud@webtech.ku', '$2y$10$c1969F07YLQyCEE45bsNgOF4Vo7vehp4b8HY2xKsk8HiJitPN3KRC', 'Kanoon', 'Rokrakkernjud', 'Mueang Ratchaburi District Ratchaburi', '2011-11-09', '0781741313', '', 'organizer', 1, 1, NULL, '2018-05-01 10:25:48', '2018-05-01 10:25:48', NULL);

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
(1, 'สอบถามสถานที่', 'general', 'อยากสอบถามว่าอาหารไทยอยู่ตรงไหนครับ', 1, NULL, '2018-05-01 10:25:49', '2018-05-01 10:25:49', NULL),
(2, 'สอบถามอาหารแถวในเมืองลพบุรี', 'general', 'ร้านอาหารใกล้สถานที่ท่องเที่ยวที่มีวิวสวยๆอยู่ตรงไหนบ้างครับ', 2, NULL, '2018-05-01 10:25:49', '2018-05-01 10:25:49', NULL),
(3, 'สวัสดีครับ', 'general', 'มีใครอยู่ไหม?', 3, NULL, '2018-05-01 10:25:49', '2018-05-01 10:25:49', NULL);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=481;

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
