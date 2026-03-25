-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 06, 2023 at 10:50 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notisstu_streaming`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--
-- --------------------------------------------------------

--
-- Table structure for table `advertisementables`
--

CREATE TABLE `advertisementables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertisement_id` bigint(20) UNSIGNED NOT NULL,
  `advertisementable_id` bigint(20) UNSIGNED NOT NULL,
  `advertisementable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisementables`
--

INSERT INTO `advertisementables` (`id`, `advertisement_id`, `advertisementable_id`, `advertisementable_type`, `created_at`, `updated_at`) VALUES
(5, 3, 1, 'Modules\\Movie\\Entities\\Movie', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movies_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ppv` double(8,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `name`, `type`, `movies_type`, `ppv`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'image', 'exclude', 0.00, 0, '2023-01-16 06:35:40', '2023-05-13 17:21:55'),
(2, NULL, 'video', 'exclude', 100.00, 1, '2023-01-16 06:36:29', '2023-04-17 20:42:36'),
(3, NULL, 'image', 'include', 0.00, 1, '2023-01-24 21:59:57', '2023-01-24 21:59:57'),
(4, NULL, 'video', NULL, 30.00, 0, '2023-04-15 17:39:11', '2023-05-31 17:19:59'),
(5, NULL, 'image', 'exclude', 0.00, 0, '2023-04-15 17:40:07', '2023-05-13 17:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `avatars`
--

CREATE TABLE `avatars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `avatar_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `avatars`
--

INSERT INTO `avatars` (`id`, `avatar_path`, `is_default`, `created_at`, `updated_at`) VALUES
(5, 'avatar_63f296d2cd9ec.png', '1', '2023-02-20 04:38:26', '2023-02-20 04:38:26'),
(6, 'avatar_63f296f0cb6a3.png', '0', '2023-02-20 04:38:56', '2023-02-20 04:38:56'),
(7, 'avatar_63f296f71dd3b.png', '0', '2023-02-20 04:39:03', '2023-02-20 04:39:03'),
(8, 'avatar_63f296fc3ac86.png', '0', '2023-02-20 04:39:08', '2023-02-20 04:39:08'),
(9, 'avatar_63f2970108d31.png', '0', '2023-02-20 04:39:13', '2023-02-20 04:39:13'),
(10, 'avatar_63f297057f9c6.png', '0', '2023-02-20 04:39:17', '2023-02-20 04:39:17'),
(11, 'avatar_63f298f825736.png', '0', '2023-02-20 04:47:36', '2023-02-20 04:47:36'),
(12, 'avatar_64794bd0ed8d1.png', '0', '2023-06-02 02:54:24', '2023-06-02 02:54:24'),
(13, 'avatar_647a455fef6a8.png', '0', '2023-06-02 20:39:11', '2023-06-02 20:39:11'),
(14, 'avatar_647a4566dc414.png', '0', '2023-06-02 20:39:18', '2023-06-02 20:39:18'),
(15, 'avatar_647a456d636a6.png', '0', '2023-06-02 20:39:25', '2023-06-02 20:39:25'),
(16, 'avatar_647a457418546.png', '0', '2023-06-02 20:39:32', '2023-06-02 20:39:32'),
(17, 'avatar_647a457f82fdd.png', '0', '2023-06-02 20:39:43', '2023-06-02 20:39:43');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `slot` longtext COLLATE utf8mb4_unicode_ci,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `bookable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookable_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `date`, `slot`, `quantity`, `bookable_type`, `bookable_id`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(5, '2023-02-27', 'whole day', 1, 'Modules\\Rental\\Entities\\Equipment', 1, 'confirmed', 1, '2023-02-27 06:01:43', '2023-02-27 06:01:43'),
(6, '2023-02-28', 'whole day', 1, 'Modules\\Rental\\Entities\\Equipment', 1, 'confirmed', 1, '2023-02-27 06:01:53', '2023-02-27 06:01:53'),
(7, '2023-02-27', 'whole day', 1, 'Modules\\Rental\\Entities\\Room', 1, 'confirmed', 1, '2023-02-27 06:02:37', '2023-02-27 06:02:37'),
(8, '2023-02-28', '[\"10:00am - 11:00am\",\"3:00pm - 4:00pm\"]', 1, 'Modules\\Rental\\Entities\\Room', 1, 'confirmed', 1, '2023-02-27 06:03:07', '2023-02-27 06:03:07'),
(9, '2023-03-29', '[\"03:00pm - 05:00pm\"]', 1, 'Modules\\Rental\\Entities\\Room', 6, 'confirmed', 12, '2023-03-29 19:56:24', '2023-03-29 20:03:23'),
(11, '2023-04-11', '3 Months', 1, 'Modules\\Rental\\Entities\\Room', 8, 'pending', 42, '2023-04-11 23:02:10', '2023-04-11 23:02:10'),
(12, '2023-06-27', 'whole day', 0, 'Modules\\Rental\\Entities\\Equipment', 4, 'confirmed', 1, '2023-06-26 17:38:41', '2023-06-26 17:38:41'),
(13, '2023-06-28', 'whole day', 0, 'Modules\\Rental\\Entities\\Equipment', 4, 'confirmed', 1, '2023-06-26 17:38:41', '2023-06-26 17:38:41'),
(14, '2023-06-29', 'whole day', 0, 'Modules\\Rental\\Entities\\Equipment', 4, 'confirmed', 1, '2023-06-26 17:38:41', '2023-06-26 17:38:41'),
(15, '2023-06-30', 'whole day', 0, 'Modules\\Rental\\Entities\\Equipment', 4, 'confirmed', 1, '2023-06-26 17:38:41', '2023-06-26 17:38:41'),
(16, '2023-07-01', 'whole day', 0, 'Modules\\Rental\\Entities\\Equipment', 4, 'confirmed', 1, '2023-06-26 17:38:41', '2023-06-26 17:38:41'),
(17, '2023-07-02', 'whole day', 0, 'Modules\\Rental\\Entities\\Equipment', 4, 'confirmed', 1, '2023-06-26 17:38:41', '2023-06-26 17:38:41'),
(18, '2023-07-03', 'whole day', 0, 'Modules\\Rental\\Entities\\Equipment', 4, 'confirmed', 1, '2023-06-26 17:38:41', '2023-06-26 17:38:41'),
(19, '2023-07-04', 'whole day', 0, 'Modules\\Rental\\Entities\\Equipment', 4, 'confirmed', 1, '2023-06-26 17:38:41', '2023-06-26 17:38:41'),
(20, '2023-06-27', 'whole day', 0, 'Modules\\Rental\\Entities\\Equipment', 15, 'confirmed', 1, '2023-06-26 17:39:27', '2023-06-26 17:39:27'),
(21, '2023-06-28', 'whole day', 0, 'Modules\\Rental\\Entities\\Equipment', 15, 'confirmed', 1, '2023-06-26 17:39:27', '2023-06-26 17:39:27'),
(22, '2023-06-29', 'whole day', 0, 'Modules\\Rental\\Entities\\Equipment', 15, 'confirmed', 1, '2023-06-26 17:39:27', '2023-06-26 17:39:27'),
(23, '2023-06-30', 'whole day', 0, 'Modules\\Rental\\Entities\\Equipment', 15, 'confirmed', 1, '2023-06-26 17:39:27', '2023-06-26 17:39:27'),
(24, '2023-07-01', 'whole day', 0, 'Modules\\Rental\\Entities\\Equipment', 15, 'confirmed', 1, '2023-06-26 17:39:27', '2023-06-26 17:39:27'),
(25, '2023-07-02', 'whole day', 0, 'Modules\\Rental\\Entities\\Equipment', 15, 'confirmed', 1, '2023-06-26 17:39:27', '2023-06-26 17:39:27'),
(26, '2023-07-03', 'whole day', 0, 'Modules\\Rental\\Entities\\Equipment', 15, 'confirmed', 1, '2023-06-26 17:39:27', '2023-06-26 17:39:27'),
(27, '2023-07-04', 'whole day', 0, 'Modules\\Rental\\Entities\\Equipment', 15, 'confirmed', 1, '2023-06-26 17:39:27', '2023-06-26 17:39:27'),
(28, '2023-06-26', '[\"01:00pm - 03:00pm\",\"03:00pm - 05:00pm\"]', 1, 'Modules\\Rental\\Entities\\Room', 4, 'pending', 12, '2023-06-26 17:47:04', '2023-06-26 17:47:04'),
(29, '2023-06-29', '[\"03:00pm - 05:00pm\"]', 1, 'Modules\\Rental\\Entities\\Room', 4, 'confirmed', 119, '2023-06-26 20:56:00', '2023-06-26 20:56:38');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_cat` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_cat`, `created_at`, `updated_at`) VALUES
(5, 'Cameras', NULL, '2023-03-22 06:18:07', '2023-03-22 06:18:07'),
(7, 'Lens', NULL, '2023-03-22 06:18:47', '2023-03-22 06:18:47'),
(8, 'Sony', 5, '2023-03-22 06:21:09', '2023-03-22 06:21:09'),
(9, 'BLACKMAGIC', 5, '2023-03-22 06:33:09', '2023-04-21 00:24:06'),
(10, 'RED', 5, '2023-04-20 23:55:16', '2023-04-20 23:55:16'),
(11, 'ARRI ALEXA', 5, '2023-04-20 23:55:40', '2023-04-20 23:55:40'),
(12, 'Drones', NULL, '2023-04-21 00:18:38', '2023-05-25 14:24:07'),
(13, 'DJI', 12, '2023-04-21 00:21:00', '2023-04-21 00:21:00'),
(14, 'Zeiss', 7, '2023-05-23 20:06:47', '2023-05-23 20:06:47'),
(17, 'Lighting', NULL, '2023-05-23 20:47:12', '2023-05-23 20:47:12'),
(18, 'Dracast', 17, '2023-05-23 20:48:33', '2023-05-23 20:54:40'),
(19, 'Godox', 17, '2023-05-23 21:07:02', '2023-05-23 21:07:02'),
(20, 'GVM', 17, '2023-05-24 04:20:29', '2023-05-24 04:20:29'),
(21, 'Stands', NULL, '2023-05-24 14:11:43', '2023-05-24 14:43:08'),
(22, 'Light Stands', 21, '2023-05-24 14:21:41', '2023-05-24 14:21:41'),
(23, 'Stabilizers', NULL, '2023-05-24 14:43:39', '2023-05-24 14:43:39'),
(24, 'Sound', NULL, '2023-05-25 14:37:14', '2023-05-25 14:37:14'),
(25, 'Accessories', NULL, '2023-05-25 14:38:03', '2023-05-25 14:38:03'),
(26, 'Zoom', 24, '2023-05-25 14:42:59', '2023-05-25 14:42:59'),
(27, 'Lectrosonic', 24, '2023-05-25 15:32:15', '2023-05-25 15:32:15'),
(28, 'Sennheiser', 24, '2023-05-25 15:32:40', '2023-05-25 15:32:40'),
(29, 'iKan', 24, '2023-05-25 15:35:38', '2023-05-25 15:38:51'),
(30, 'Rode', 24, '2023-05-25 15:35:53', '2023-05-25 15:35:53'),
(31, 'Sanken', 24, '2023-05-25 15:36:07', '2023-05-25 15:36:07'),
(32, 'DJI Stabilizer', 23, '2023-05-27 17:09:45', '2023-05-27 17:09:45'),
(33, 'Ready Rig', 23, '2023-05-27 17:14:17', '2023-05-27 17:14:17'),
(34, 'Dana Dolly', 23, '2023-05-27 17:18:24', '2023-05-27 17:18:24'),
(35, 'MOZA', 23, '2023-05-27 17:18:43', '2023-05-27 17:18:43'),
(36, 'Zhiyun', 23, '2023-05-27 17:18:59', '2023-05-27 17:18:59'),
(37, 'FeiyuTech', 23, '2023-05-27 17:19:45', '2023-05-27 17:19:45'),
(38, 'Flags & Diffusion', NULL, '2023-05-29 17:59:43', '2023-05-29 17:59:43'),
(39, 'Flags and Diffusers', 38, '2023-05-29 18:09:01', '2023-05-29 18:09:01'),
(40, 'Field Monitors', NULL, '2023-05-29 18:47:17', '2023-05-29 18:47:17'),
(41, 'Atomos', 40, '2023-05-29 18:51:12', '2023-05-29 18:51:12');

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `number_of_video_ads` int(11) NOT NULL DEFAULT '1',
  `adult` tinyint(4) NOT NULL DEFAULT '1',
  `episode_file_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'local',
  `episode_link` text COLLATE utf8mb4_unicode_ci,
  `date_sort` datetime NOT NULL,
  `trailer` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `season_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `episodes`
--

INSERT INTO `episodes` (`id`, `title`, `description`, `duration`, `status`, `number_of_video_ads`, `adult`, `episode_file_type`, `episode_link`, `date_sort`, `trailer`, `user_id`, `season_id`, `created_at`, `updated_at`) VALUES
(1, 'Episode 1 - Meet The Couples', 'In this episode, we get to know our six couples (The Osei\'s, The Jones\', The Brown\'s, The Riggins, The Millers, & The Henry\'s)', '27m 27s', 1, 1, 1, 'link', 'Marriage_Is_Ep-1.mp4', '2023-01-21 20:28:00', 'https://www.youtube.com/watch?v=A1tJVupLPsg', 1, 1, '2023-01-22 09:33:00', '2023-02-15 08:43:26'),
(2, 'Episode 2 - Sex', 'In this episode, we talk about all things SEX!', '1h 35min 54sec', 1, 1, 1, 'link', 'Marriage_Is_Ep-2.mp4', '2023-01-21 20:37:00', 'https://www.youtube.com/watch?v=A1tJVupLPsg', 1, 1, '2023-01-22 09:38:10', '2023-02-15 08:44:49'),
(3, 'Episode 3 - Money & Communication', 'In this episode our couples discuss the topic of Money & Communication', '1h 11min 22sec', 1, 1, 1, 'link', 'Marriage_Is_Ep-3.mp4', '2023-01-21 20:40:00', 'https://www.youtube.com/watch?v=A1tJVupLPsg', 1, 1, '2023-01-22 09:40:08', '2023-02-15 08:45:11'),
(4, 'Episode 4 - Individuality & Roles', 'In this episode our couples discuss the topics of Individuality & Roles', '1h 27min 40sec', 1, 1, 1, 'link', 'Marriage_Is_Ep-4.mp4', '2023-01-21 20:43:00', 'https://www.youtube.com/watch?v=A1tJVupLPsg', 1, 1, '2023-01-22 09:43:16', '2023-02-15 08:45:39'),
(5, 'Episode 5 - Conflict', 'In this episode, our couples discuss the hard-hitting topic of how to deal with Conflict', '1h 36min 28sec', 1, 1, 1, 'link', 'Marriage_Is_Ep-5.mp4', '2023-01-21 20:44:00', 'https://www.youtube.com/watch?v=A1tJVupLPsg', 1, 1, '2023-01-22 09:45:11', '2023-02-15 08:46:03'),
(6, 'Episode 6 - Children & Faith', 'In this episode, our couples discuss the topics of Children & Faith', '1h 35min 05sec', 1, 1, 1, 'link', 'Marriage_Is_Ep-6.mp4', '2023-01-21 20:46:00', 'https://www.youtube.com/watch?v=A1tJVupLPsg', 1, 1, '2023-01-22 09:47:23', '2023-02-15 08:46:24'),
(7, 'Episode 7 - Friends & In-Laws', 'In our season finale, our couples discuss the topics of Friends & In-Laws', '1h 07min 32sec', 1, 1, 1, 'link', 'Marriage_Is_Ep-7.mp4', '2023-01-21 20:48:00', 'https://www.youtube.com/watch?v=A1tJVupLPsg', 1, 1, '2023-01-22 09:49:46', '2023-02-26 10:17:56'),
(8, 'Episode 1', 'DeAndre and Veronica are headed toward matrimony but the past can be a tricky thing to face.', '45 min', 1, 1, 1, 'link', 'Truth_Be_Told_Stereo.mp4', '2023-01-21 20:51:00', 'https://www.youtube.com/watch?v=SJuRQ9Kj2cY', 1, 2, '2023-01-22 09:56:03', '2023-03-25 00:32:38'),
(9, 'Episode 1', 'When 10 people go to a cabin for a weekend getaway, they are met by an unexpected visitor.', '38m 29s', 1, 1, 1, 'link', 'The_Suffering.mp4', '2023-01-21 20:58:00', 'https://www.youtube.com/watch?v=DzrjsXyI5bo', 1, 3, '2023-01-22 10:00:03', '2023-03-25 00:40:03'),
(10, 'Episode 1 - The Start', 'Nikki falls for a guy who is just looking for a good time, this sends HER over the edge.', '18m 09s', 1, 1, 1, 'link', 'Her_I_New_Intro.mp4', '2023-01-21 21:01:00', 'https://www.youtube.com/watch?v=lvZe0eDlIes', 1, 4, '2023-01-22 10:05:28', '2023-05-12 18:50:24'),
(11, 'Episode 2 - Deception', 'Shantel is rocked by news of her ex-fiance Sean, which has her emotionally confused. However, deception is always around the corner and both parties are faced with unforeseen realities.', '28m 30s', 1, 1, 1, 'link', 'HER_II_Official_Movie.mp4', '2023-01-21 21:07:00', 'https://www.youtube.com/watch?v=rPvhkS2Cz40', 1, 4, '2023-01-22 10:10:38', '2023-05-12 18:50:50'),
(12, 'E1 - Bisons vs How High', 'Game 1: Bisons vs How High', '42m 55s', 1, 1, 1, 'link', 'SkinzLeagueGame1.mp4', '2023-06-24 15:54:00', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/TkgGeDb1iXU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, 5, '2023-06-24 22:03:42', '2023-06-24 22:15:52'),
(13, 'E2 - Trifecta vs Savages', 'Game 2: Trifecta vs Savages', '51m 26s', 1, 1, 1, 'link', 'SkinzLeagueGame2.mp4', '2023-06-24 16:18:00', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/TkgGeDb1iXU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, 5, '2023-06-24 22:26:44', '2023-06-24 22:31:46'),
(14, 'E3 - GMB vs G.O.A.T.', 'Game 3: GMB vs G.O.A.T.', '53m 58s', 1, 1, 1, 'link', 'SkinzLeagueGame3.mp4', '2023-06-24 16:35:00', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/TkgGeDb1iXU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, 5, '2023-06-24 22:36:35', '2023-06-24 22:36:35'),
(15, 'E4 - Jumpman vs Bucket Fam', 'Game 4:', '42m 55s', 1, 1, 1, 'link', 'SkinzLeagueGame4.mp4', '2023-06-24 16:46:00', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/TkgGeDb1iXU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, 5, '2023-06-24 22:49:14', '2023-07-03 16:08:05'),
(16, 'E5 - Jumpman vs OTM', 'Game 5: Jumpman vs OTM', '57m 56s', 1, 1, 1, 'link', 'SkinzLeagueGame5.mp4', '2023-06-24 16:49:00', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/TkgGeDb1iXU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, 5, '2023-06-24 22:53:08', '2023-06-24 22:53:08'),
(17, 'E6 - A-Town vs Chasing wolves', 'Game 6: A-Town vs Chasing wolves', '56m 54s', 1, 1, 1, 'link', 'SkinzLeagueGame6.mp4', '2023-06-24 16:53:00', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/TkgGeDb1iXU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, 5, '2023-06-24 22:57:00', '2023-06-24 23:01:25'),
(18, 'E7 - GTA vs Headtap', 'Game 7: GTA vs Headtap', '52m 01s', 1, 1, 1, 'link', 'SkinzLeagueGame7.mp4', '2023-06-24 16:57:00', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/TkgGeDb1iXU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, 5, '2023-06-24 23:01:05', '2023-06-24 23:01:05'),
(19, 'E8 - Rocafella vs Team Equip', 'Game 8: Rocafella vs Team Equip', '52m 39s', 1, 1, 1, 'link', 'SkinzLeagueGame8.mp4', '2023-06-24 17:01:00', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/TkgGeDb1iXU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, 5, '2023-06-24 23:05:33', '2023-06-24 23:05:33'),
(20, 'E9- Bison vs OTM', 'Basketball game Bison vs OTM', '48m 51s', 1, 1, 0, 'link', 'SkinzLeagueGame9.mp4', '2023-07-03 16:00:00', 'Skinz League', 1, 5, '2023-07-03 22:31:31', '2023-07-03 22:31:31'),
(21, 'E10-Trifecta vs HeadTap', 'Basketball game Trifecta vs HeadTap.', '53m 00s', 1, 1, 0, 'link', 'SkinzLeagueGame10.mp4', '2023-07-03 16:00:00', 'Skinz League', 1, 5, '2023-07-03 22:38:32', '2023-07-03 22:38:32'),
(22, 'E11-Goat vs Jumpman', 'Basketball game Goat vs Jumpman.', '36m 56s', 1, 1, 0, 'link', 'SkinzLeagueGame11.mp4', '2023-07-03 16:00:00', 'Skinz League', 1, 5, '2023-07-03 22:43:35', '2023-07-03 22:43:35'),
(23, 'E12-Savages vs How High', 'Basketball game Savages vs How High.', '45m 06s', 1, 1, 0, 'link', 'SkinzLeagueGame12.mp4', '2023-07-03 16:00:00', 'Skinz League', 1, 5, '2023-07-03 22:47:17', '2023-07-03 22:47:17'),
(24, 'E13-Rocafella vs Chasing', 'Basketball game Rocafella vs Chasing.', '46m 50s', 1, 1, 0, 'link', 'SkinzLeagueGame13.mp4', '2023-07-03 16:00:00', 'Skinz League', 1, 5, '2023-07-03 22:50:24', '2023-07-03 22:50:24'),
(25, 'E14-A-Town vs Bucket Fam', 'Basketball game A-Town vs Bucket Fam.', '47m 14s', 1, 1, 0, 'link', 'SkinzLeagueGame14.mp4', '2023-07-03 16:00:00', 'Skinz League', 1, 5, '2023-07-03 22:53:46', '2023-07-03 22:53:46'),
(26, 'E15-GTA vs 469 Boyz', 'Basketball game GTA vs 469 Boyz.', '50m 15s', 1, 1, 0, 'link', 'SkinzLeagueGame15.mp4', '2023-07-03 16:00:00', 'Skinz League', 1, 5, '2023-07-03 22:57:31', '2023-07-03 22:57:31'),
(27, 'E16-Team Equip vs I GMB', 'Basketball game Team Equip vs I GMB.', '43m 48s', 1, 1, 0, 'link', 'SkinzLeagueGame16.mp4', '2023-07-03 16:00:00', 'Skinz League', 1, 5, '2023-07-03 23:00:01', '2023-07-03 23:00:01');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_hourly` int(11) DEFAULT NULL,
  `price_daily` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `top_bar` tinyint(4) NOT NULL DEFAULT '0',
  `featured` tinyint(4) NOT NULL DEFAULT '0',
  `new_arrival` tinyint(4) NOT NULL DEFAULT '0',
  `best_selling` tinyint(4) NOT NULL DEFAULT '0',
  `top_rated` tinyint(4) NOT NULL DEFAULT '0',
  `require_room` tinyint(4) NOT NULL DEFAULT '1',
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `seperate_page` tinyint(4) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `name`, `purchase_type`, `price_type`, `price_hourly`, `price_daily`, `description`, `top_bar`, `featured`, `new_arrival`, `best_selling`, `top_rated`, `require_room`, `category_id`, `status`, `seperate_page`, `quantity`, `created_at`, `updated_at`) VALUES
(4, 'URSA MINI PRO G2', 'rent', 'day', 0, 65, '<p>URSA Mini Pro 4.6K G2 is a next generation digital film camera with updated electronics and a high performance 4.6K HDR image sensor for shooting at up to 300 frames per second. You get a Super 35mm 4.6K sensor with 15 stops of dynamic range, built in optical ND filters, interchangeable EF lens mount that can be swapped for optional PL, B4 or F mounts, Blackmagic RAW and ProRes recording to dual CFast or dual SD cards, and an innovative USB-C expansion port for recording directly to external disks. In addition, URSA Mini Pro 4.6K G2 features a massive set of external broadcast style controls, backlit status display, foldout touchscreen monitor and more!</p>', 0, 0, 0, 0, 0, 1, 9, 1, 0, 1, '2023-04-20 23:36:43', '2023-06-20 21:26:30'),
(5, 'RED EPIC DRAGON 6K', 'rent', 'day', 0, 100, '<p>The Red Dragon sensor is a 19 megapixel sensor that captures video stills at up to 6K resolution. The sensor captures over nine times more resolution than standard 1080p HD video. This results in native exposure that exceeds 35mm film in both latitude and image density, comparing only to 65mm in image density. The Red Epic Dragon camera supports high speed frames rates (300 FPS+), 16.5 stops of dynamic range and advance color science.</p>', 0, 0, 0, 0, 0, 1, 10, 1, 0, 1, '2023-04-21 00:00:26', '2023-04-21 00:00:26'),
(6, 'ARRI ALEXA CLASSIC', 'rent', 'day', 0, 100, '<p>The Alexa EV \"Classic\" is a PL or EF mounted digital cinema camera with an Arri Super35 Alexa sensor that can shoot high resolution ProRes footage up to 2K and is complete with a high speed license upgrade.</p>', 0, 0, 0, 0, 0, 1, 11, 1, 0, 1, '2023-04-21 00:02:38', '2023-04-21 00:02:38'),
(7, 'BLACKMAGIC PCC 6K', 'rent', 'day', 0, 25, '<p>The Blackmagic Pocket Cinema Camera 6K G2 is an advanced technology, handheld 6K digital film camera with 6144 x 3456 Super 35 high resolution HDR sensor, dual native ISO, EF lens mount and direct recording to USB-C disks! This powerful model adds an adjustable touchscreen, and a larger battery for longer run time.</p>', 0, 0, 0, 0, 0, 1, 9, 1, 0, 1, '2023-04-21 00:08:17', '2023-04-21 00:08:17'),
(8, 'BLACKMAGIC MICRO CAM', 'rent', 'day', 0, 15, '<p>The Blackmagic Micro Cinema Camera is a miniature digital camera with a Super 16mm-sized sensor designed to be operated remotely and capture footage from virtually anywhere. The image sensor supports 1080p video up to 60 fps and 13 stops of dynamic range.</p>', 0, 0, 0, 0, 0, 1, 9, 1, 0, 1, '2023-04-21 00:09:39', '2023-04-21 00:11:03'),
(9, 'DJI MAVIC AIR 2', 'rent', 'day', 0, 20, '<p>The&nbsp;<a href=\"https://click.dji.com/AAP3nX9zA5NkZrRtQCJV-w?as=0001&amp;pm=custom\" rel=\"noopener noreferrer\" target=\"_blank\">DJI Mavic Air 2</a>&nbsp;can shoot in 4K at 60 frames per second. The new camera also records video at 120 Mbps bitrate (up from 100 Mbps), beating other DJI consumer models. Additionally, the camera can capture 1080p slow-motion video at 120 and 240 fps.</p>', 0, 0, 0, 0, 0, 1, 13, 1, 0, 1, '2023-04-21 00:22:24', '2023-04-21 00:22:24'),
(10, 'Zeiss Cp 2 Set (21, 35, 50, 85)', 'rent', 'day', 0, 100, '<p>ZEISS Compact Prime Lenses in the CP. 2 EF Mount family deliver a wide range of focal lengths, full-frame coverage, high-quality images, great flare suppression, and precise focusing through the large rotation angle. </p>', 1, 0, 1, 0, 0, 1, 14, 1, 0, 1, '2023-05-23 20:11:34', '2023-05-23 20:39:58'),
(11, 'Zeiss Cp 2 21mm', 'rent', 'day', 0, 30, '<p>The ZEISS 21mm T/2.9 CP. 2 Compact Prime Cine Lens with EF Mount is a 21mm fixed focal length lens with a flexible design so that it can be used on both cinema and DSLR cameras. An interchangeable mount for PL, EF, F, E and MFT mounts allows you to use the cine lens with movie cameras and HDSLR cameras.</p>', 0, 0, 0, 0, 0, 1, 14, 1, 0, 1, '2023-05-23 20:25:48', '2023-05-23 20:40:13'),
(12, 'Zeiss Cp 2 35mm', 'rent', 'day', 0, 30, '<p>The ZEISS Compact Prime CP.2 35mm/T1.5 Super Speed EF Mount with Imperial Markings is a fast cine prime lens designed for filmmaking and video production applications. It shoots remarkably well in low-light. Aside from great optics and mechanics, the lens offers broad flexibility in the areas of camera compatibility, follow-focus compatibility, and shooting capacity.</p>', 0, 0, 0, 0, 0, 1, 14, 1, 0, 1, '2023-05-23 20:30:30', '2023-05-23 20:40:36'),
(13, 'Zeiss Cp 2 50mm', 'rent', 'day', 0, 30, '<p>The ZEISS Compact Prime CP.2 50mm/T2.1 Cine Lens (EF Mount) is part of the second generation of CP cinema lenses that were the first to offer full-frame 35mm coverage of large sensor DSLRs (such as the Canon 5D Mark II). What distinguishes the CP.2 from its PL-mount-only predecessor is its interchangeable lens mount, which allows the included Canon EF mount to be easily swapped out for an optional Nikon F or cinema-standard PL mount. For the first time, a single, affordable, professional quality lens can be used on both cinema and still cameras, opening up creative possibilities that keep your rig lightweight, versatile, and on budget.</p>', 0, 1, 0, 1, 0, 1, 14, 1, 0, 1, '2023-05-23 20:31:11', '2023-05-23 20:42:14'),
(14, 'Zeiss Cp 2 85mm', 'rent', 'day', 0, 30, '<p>The ZEISS Compact Prime CP. 2 85mm/T1. 5 Super Speed EF Mount with Imperial Markings is a fast cine prime lens designed for filmmaking and video production applications. It shoots remarkably well in low-light.</p>', 0, 1, 0, 0, 0, 1, 14, 1, 0, 1, '2023-05-23 20:39:09', '2023-05-23 20:39:09'),
(15, 'Dracast X Light Package', 'rent', 'day', 0, 100, '<p>3 light package, the X Series is the newest compact LED panel light from Dracast. The X Series is designed with portability in mind. The panel includes an installed mounting yoke with a 5/8″ baby pin receiver for fast and easy mounting on compatible light stands or C clamps. The X Series features full spectrum RGB, plus adjustable white color temperature from 3200K to 5600K CCT. Also included are preset color gels and filters, as well as a collection of customizable effects and presets.</p>', 1, 0, 1, 0, 0, 1, 18, 1, 0, 1, '2023-05-23 20:53:36', '2023-05-24 04:51:24'),
(16, 'Zeiss Cp 2 35mm', 'rent', 'day', 0, 30, '<p>The ZEISS Compact Prime CP.2 35mm/T1.5 Super Speed EF Mount with Imperial Markings is a fast cine prime lens designed for filmmaking and video production applications. It shoots remarkably well in low-light. Aside from great optics and mechanics, the lens offers broad flexibility in the areas of camera compatibility, follow-focus compatibility, and shooting capacity.</p>', 0, 0, 0, 1, 0, 1, 14, 1, 0, 1, '2023-05-23 20:59:32', '2023-05-23 20:59:32'),
(17, 'Zeiss Cp 2 85mm', 'rent', 'day', 0, 30, '<p>The ZEISS Compact Prime CP. 2 85mm/T1. 5 Super Speed EF Mount with Imperial Markings is a fast cine prime lens designed for filmmaking and video production applications. It shoots remarkably well in low-light.</p>', 0, 0, 0, 0, 0, 1, 14, 1, 0, 1, '2023-05-23 21:03:18', '2023-05-23 21:03:18'),
(18, 'Godox Knowled M600BI Bi Color LED Video Light', 'rent', 'day', 0, 80, '<p>This Knowled M600Bi Bi-Color LED Monolight from Godox checks off about every box on your wish list. The light has a wide adjustable color temperature range from 2800 to 6500K, backed by high CRI/TLCI ratings of 96/97 to ensure accurate rendition of color.</p>', 0, 1, 1, 0, 0, 1, 19, 1, 0, 1, '2023-05-23 21:11:26', '2023-05-23 22:08:38'),
(19, 'Godox vl300', 'rent', 'day', 0, 30, '<p>The VL300 LED Video Light from Godox is a lightweight and compact LED monolite-style light source suitable for portrait, still life, and location photography, and also for video-based applications. The daylight-balanced COB LED features a CRI rating of 96 and TLCI rating of 95, producing highly accurate color renditions and rendering extremely realistic flesh tones. The VL300 light body is operated and powered from an external controller, keeping it compact and lightweight. It features a whisper-quiet fan and an integrated Bowens-style reflector mount, making it compatible with a wide array of light modifiers.</p>', 0, 0, 0, 0, 0, 1, 19, 1, 0, 1, '2023-05-24 03:20:03', '2023-05-24 03:20:03'),
(20, 'Godox SL60', 'rent', 'day', 0, 10, '<p>A versatile constant light source well-suited for video work, this SL-60 LED Light from Godox is a daylight-balanced, 5600K light featuring a COB (chip on board) LED for high brightness and color accuracy. The intuitive design of the light incorporates a rear LCD monitor and a dial with a 10-100% dimming adjustment.</p>', 0, 0, 0, 0, 0, 1, 19, 1, 0, 1, '2023-05-24 03:32:19', '2023-05-24 03:32:19'),
(21, 'Godox Knowled M600BI Bi Color LED Video Light', 'rent', 'day', 0, 80, '<p>This Knowled M600Bi Bi-Color LED Monolight from Godox checks off about every box on your wish list. The light has a wide adjustable color temperature range from 2800 to 6500K, backed by high CRI/TLCI ratings of 96/97 to ensure accurate rendition of color.</p>', 0, 0, 0, 0, 0, 1, 19, 1, 0, 1, '2023-05-24 03:50:17', '2023-05-24 03:50:17'),
(22, 'Godox SL60', 'rent', 'day', 0, 10, '<p>A versatile constant light source well-suited for video work, this SL-60 LED Light from Godox is a daylight-balanced, 5600K light featuring a COB (chip on board) LED for high brightness and color accuracy. The intuitive design of the light incorporates a rear LCD monitor and a dial with a 10-100% dimming adjustment.</p>', 0, 0, 0, 0, 0, 1, 19, 1, 0, 1, '2023-05-24 03:58:47', '2023-05-24 03:58:47'),
(23, 'Godox 6ft TL180 RGBWW Tube Light', 'rent', 'day', 0, 30, '<p>Low-profile, self-contained and portable, TL180 is a 180cm RGBWW tube light designed to benefit filmmakers, content creators, videographers and photographers. As the latest member of Godox tube light TL series, it\'s more powerful and with a larger light-emitting area, giving more liberty to your creation.</p>', 0, 0, 0, 0, 0, 1, 19, 1, 0, 1, '2023-05-24 04:03:08', '2023-05-24 04:03:08'),
(24, 'Godox 6ft TL180 RGBWW Tube Light', 'rent', 'day', 0, 30, '<p>Low-profile, self-contained and portable, TL180 is a 180cm RGBWW tube light designed to benefit filmmakers, content creators, videographers and photographers. As the latest member of Godox tube light TL series, it\'s more powerful and with a larger light-emitting area, giving more liberty to your creation.</p>', 0, 0, 0, 0, 0, 1, 19, 1, 0, 1, '2023-05-24 04:05:52', '2023-05-24 04:05:52'),
(25, 'Godox TL120 RGB Tube Light 4 light Kit', 'rent', 'day', 0, 65, '<p>Unleash your inner creativity and light the scene with the TL120 4-Light Kit from Godox. The kit contains four tube lights, a remote control with a 164\' range, four AC adapters, eight mounting clips, and a hard case for extra protection during storage and transport. Offering advanced color controls and multiple wireless and tethered control options, each light outputs up to 685 lux at 3.3\' (5600K) and features a variable color temperature range from 2700 to 6500K for both still and video applications alike. A step-up in size from the TL30 and TL60 tube lights, the fixture\'s 4\' length lets you easily light larger areas, while also offering a stackable design for a myriad of unique mounting options.</p>', 0, 0, 0, 0, 0, 1, 19, 1, 0, 1, '2023-05-24 04:10:00', '2023-05-24 04:10:00'),
(26, 'Godox RGB Mini', 'rent', 'day', 0, 5, '<p>Dress up your video background and atmosphere with this RGB Mini Creative M1 On-Camera Video LED Light from Godox. The pocket-sized light allows you to adjust hue and saturation from 360 colors when in RGB mode, and the color temperature is adjustable from 2500 to 8500K to match an ambient light source. There are also 15 special effect modes and 40 presets that add speed and creativity to your shoot. It is rated with a high CRI of 97 that ensures natural and accurate color rendering.</p>', 0, 0, 0, 0, 0, 1, 19, 1, 0, 1, '2023-05-24 04:14:48', '2023-05-24 04:14:48'),
(27, 'Godox RGB Mini', 'rent', 'day', 0, 5, '<p>Dress up your video background and atmosphere with this RGB Mini Creative M1 On-Camera Video LED Light from Godox. The pocket-sized light allows you to adjust hue and saturation from 360 colors when in RGB mode, and the color temperature is adjustable from 2500 to 8500K to match an ambient light source. There are also 15 special effect modes and 40 presets that add speed and creativity to your shoot. It is rated with a high CRI of 97 that ensures natural and accurate color rendering.</p>', 0, 0, 0, 0, 0, 1, 19, 1, 0, 1, '2023-05-24 04:15:36', '2023-05-24 04:15:36'),
(28, 'GVM RGB LED Panels', 'rent', 'day', 0, 20, '<p>Included are three 10.6 x 10.3 x 1.6\" LED panels with CCT and RGB color control. Each panel comes with a 110-240 VAC adapter, a power cord, a soft diffuser, a set of barndoors, and a 7\' light stand. A case is included to carry the kit.</p>', 0, 0, 0, 0, 0, 1, 20, 1, 0, 1, '2023-05-24 04:21:26', '2023-05-24 04:21:26'),
(29, 'Godox FLS10 Fresnel Lens', 'rent', 'day', 0, 5, '<p><span style=\"background-color: rgba(65, 128, 255, 0.18); color: rgb(5, 10, 30);\">It maximizes light output while maintaining light quality and renders consistent light with smooth intensity</span>. It increases the maximum output of the light to 46,400 lux at 9.8\' and lets you steplessly adjust the beam angle between 10° spot and 35° flood.</p>', 0, 0, 0, 0, 0, 1, 19, 1, 0, 1, '2023-05-24 04:29:04', '2023-05-24 04:29:04'),
(30, 'Godox Light Dome', 'rent', 'day', 0, 5, '<p>Bowens mount light dome.</p>', 0, 0, 0, 0, 0, 1, 19, 1, 0, 1, '2023-05-24 04:36:00', '2023-05-24 04:36:00'),
(31, 'Godox Light Dome', 'rent', 'day', 0, 5, '<p>Bowens mount light dome.</p>', 0, 0, 0, 0, 0, 1, 19, 1, 0, 1, '2023-05-24 04:41:16', '2023-05-24 04:41:16'),
(32, 'Combo Stand multiple', 'rent', 'day', 0, 15, '<p>Hello World!</p>', 0, 1, 0, 0, 0, 1, 22, 1, 0, 5, '2023-05-24 14:23:28', '2023-06-20 21:26:44'),
(33, 'Combo Stand', 'rent', 'day', 0, 15, '<p>Combo Stand has \"Rocky Mountain\" Leg for easy leveling on rough terrain. Also known as a junior, reflector stand or 2k light stand. Features 1 1/8\" receiver and 5/8\" pop up baby pin. Known as a \"combo stand\" as it can be used as either a baby or junior stand.</p>', 0, 0, 0, 0, 0, 1, 22, 1, 0, 1, '2023-05-24 14:28:51', '2023-05-24 14:28:51'),
(34, 'C-Stand', 'rent', 'day', 0, 5, '<p>A C-Stand is a metal stand designed to position lights, silks, flags, backdrops, and other tools on a set. C-Stand is believed to be short for Century Stand because they were used in early cinema to hold sun reflectors that were 100 square known as Centuries.</p>', 0, 0, 0, 1, 0, 1, 22, 1, 0, 1, '2023-05-24 14:34:05', '2023-05-24 14:34:05'),
(35, 'C-Stand', 'rent', 'day', 0, 5, '<p>A C-Stand is a metal stand designed to position lights, silks, flags, backdrops, and other tools on a set. C-Stand is believed to be short for Century Stand because they were used in early cinema to hold sun reflectors that were 100 square known as Centuries.</p>', 0, 0, 0, 0, 0, 1, 22, 1, 0, 1, '2023-05-24 14:36:44', '2023-05-24 14:36:44'),
(36, 'C-Stand', 'rent', 'day', 0, 5, '<p>A C-Stand is a metal stand designed to position lights, silks, flags, backdrops, and other tools on a set. C-Stand is believed to be short for Century Stand because they were used in early cinema to hold sun reflectors that were 100 square known as Centuries.</p>', 0, 0, 0, 0, 0, 1, 22, 1, 0, 1, '2023-05-24 14:37:21', '2023-05-24 14:37:21'),
(37, 'C-Stand', 'rent', 'day', 0, 5, '<p>A C-Stand is a metal stand designed to position lights, silks, flags, backdrops, and other tools on a set. C-Stand is believed to be short for Century Stand because they were used in early cinema to hold sun reflectors that were 100 square known as Centuries.</p>', 0, 0, 0, 0, 0, 1, 22, 1, 0, 1, '2023-05-24 14:37:59', '2023-05-24 14:37:59'),
(38, 'C-Stand', 'rent', 'day', 0, 5, '<p>A C-Stand is a metal stand designed to position lights, silks, flags, backdrops, and other tools on a set. C-Stand is believed to be short for Century Stand because they were used in early cinema to hold sun reflectors that were 100 square known as Centuries.</p>', 0, 0, 0, 0, 0, 1, 22, 1, 0, 1, '2023-05-24 14:38:40', '2023-05-24 14:38:40'),
(39, 'C-Stand', 'rent', 'day', 0, 5, '<p>A C-Stand is a metal stand designed to position lights, silks, flags, backdrops, and other tools on a set. C-Stand is believed to be short for Century Stand because they were used in early cinema to hold sun reflectors that were 100 square known as Centuries.</p>', 0, 0, 0, 0, 0, 1, 22, 1, 0, 1, '2023-05-24 14:40:24', '2023-05-24 14:40:24'),
(40, 'Zoom F8n Pro', 'rent', 'day', 0, 20, '<p>This 8-channel/10-track multitrack field recorder boasts 32-bit float recording technology, yielding you outstanding sound quality, whether you’re working in independent film production, mobile media recording, or any other mission-critical application. You get eight discrete inputs with locking Neutrik connectors, plus high-quality preamps, switchable +4dB mic/line inputs, and balanced analog outputs, along with a highpass filter, a phase invert, and a mid-side decoder. You also get time-code compatibility, a full-color backlit LCD screen, and dual redundant SD/SDHC/SDXC card recording.</p>', 0, 1, 1, 0, 0, 1, 26, 1, 0, 1, '2023-05-25 14:45:06', '2023-05-25 14:45:06'),
(41, 'Zoom F6', 'rent', 'day', 0, 10, '<p>The Zoom F6 is a professional field recorder to featuring both 32-bit float recording and dual AD converters, providing an unprecedented amount of dynamic range. With 6 inputs, Zoom\'s solid time code, multiple power options and wireless control, the F6 is poised to be your new secret weapon.</p>', 0, 0, 0, 1, 0, 1, 26, 1, 0, 1, '2023-05-25 14:47:10', '2023-05-25 14:47:10'),
(42, 'Zoom F-Control', 'rent', 'day', 0, 10, '<p>F-Control is&nbsp;<span style=\"color: rgb(0, 0, 0);\">a mixing control surface that gives filmmakers more control and flexibility when recording in the field</span>. It works alongside the Zoom F8 and F4 to create a complete and professional on-location audio rig.</p>', 0, 0, 1, 0, 0, 1, 26, 1, 0, 1, '2023-05-25 15:31:04', '2023-05-25 15:31:04'),
(43, 'Lectrosonic SRB', 'rent', 'day', 0, 65, '<p>The Lectrosonics SRb5P Camera Slot UHF Receiver (Block 19) is a two-channel slot-mount Digital Hybrid Wireless diversity receiver that supports 486.400 - 511.900 MHz operating frequencies. The SRb5P receiver offers two independent channels and fits into the standard video camera slots found on professional cameras.</p>', 0, 1, 1, 0, 0, 1, 27, 1, 0, 1, '2023-05-25 15:42:50', '2023-05-25 15:42:50'),
(44, 'Lectrosonic SMQV', 'rent', 'day', 0, 45, '<p>Hello World!</p>', 0, 1, 1, 0, 0, 1, 27, 1, 0, 1, '2023-05-25 15:44:28', '2023-05-25 15:44:28'),
(45, 'Lectrosonic SM', 'rent', 'day', 0, 40, '<p>To meet the demand for both extended operating range and extended battery life, this version of the SMQV transmitter offers a selectable output power of 50, 100, or 250 mW. The 50mW option is provided for some theatrical applications, where the system design specifies lower transmitter power. Channel spacing is also selectable, with 100 and 25 kHz options available. With the spacing set to 100 kHz, the SMQV transmitter offers 256 user-selectable UHF frequencies in this block; if that\'s not enough, setting the spacing to 25 kHz gives you up to 1000 frequencies to work with.&nbsp;</p>', 0, 1, 1, 0, 0, 1, 27, 1, 0, 1, '2023-05-25 15:45:32', '2023-05-25 15:45:32'),
(46, 'Sennheiser G4', 'rent', 'day', 0, 15, '<p>A broadcast quality sound solution. Providing the highest flexibility for your outdoor shoots and field recording applications. A robust wireless microphone system that offers excellent sound quality, simple mounting and ease of use.</p>', 0, 0, 0, 1, 0, 1, 28, 1, 0, 1, '2023-05-25 15:48:50', '2023-05-25 15:48:50'),
(47, 'Sennheiser G4', 'rent', 'day', 0, 15, '<p>A broadcast quality sound solution. Providing the highest flexibility for your outdoor shoots and field recording applications. A robust wireless microphone system that offers excellent sound quality, simple mounting and ease of use.</p>', 0, 0, 0, 0, 0, 1, 28, 1, 0, 1, '2023-05-25 15:51:08', '2023-05-25 15:51:08'),
(48, 'Sennheiser G4', 'rent', 'day', 0, 15, '<p>A broadcast quality sound solution. Providing the highest flexibility for your outdoor shoots and field recording applications. A robust wireless microphone system that offers excellent sound quality, simple mounting and ease of use.</p>', 0, 0, 0, 0, 0, 1, 28, 1, 0, 1, '2023-05-25 15:51:39', '2023-05-25 15:51:39'),
(49, 'Sennheiser G4 500', 'rent', 'day', 0, 10, '<p>A broadcast quality sound solution. Providing the highest flexibility for your outdoor shoots and field recording applications. A robust wireless microphone system that offers excellent sound quality, simple mounting and ease of use.</p>', 0, 0, 0, 0, 0, 1, 28, 1, 0, 1, '2023-05-25 16:02:00', '2023-05-25 16:02:00'),
(50, 'Sennheiser G3', 'rent', 'day', 0, 10, '<p>A broadcast quality sound solution. Providing the highest flexibility for your outdoor shoots and field recording applications. A robust wireless microphone system that offers excellent sound quality, simple mounting and ease of use.</p>', 0, 0, 0, 0, 0, 1, 28, 1, 0, 1, '2023-05-25 16:04:25', '2023-05-25 16:04:25'),
(51, 'Sennheiser MKH 50', 'rent', 'day', 0, 25, '<p>Super-cardioid microphone designed for use as a soloist\'s or spot microphone for applications requiring a high degree of side-borne sound muting and feedback rejection. Frequency-independent directional characteristics.</p>', 0, 1, 1, 0, 1, 1, 28, 1, 0, 1, '2023-05-25 16:06:02', '2023-05-25 16:06:02'),
(52, 'Sennheiser MKH 50', 'rent', 'day', 0, 25, '<p>Super-cardioid microphone designed for use as a soloist\'s or spot microphone for applications requiring a high degree of side-borne sound muting and feedback rejection. Frequency-independent directional characteristics.</p>', 0, 0, 0, 0, 0, 1, 28, 1, 0, 1, '2023-05-25 16:06:37', '2023-05-25 16:06:37'),
(53, 'Sennheiser MKH 416', 'rent', 'day', 0, 20, '<p>The venerable MKH 416 is a compact pressure-gradient microphone with short interference tube, highly immune to humidity due to its RF condenser design. Featuring high directivity, low self noise, high consonant articulation and feedback rejection, the MKH 416 can handle difficult exterior filming and reporting conditions without any difficulty. Supercardioid/lobe pattern, matte black finish, supplied with the MZW415 windscreen</p>', 0, 0, 1, 0, 0, 1, 28, 1, 0, 1, '2023-05-25 16:11:52', '2023-05-25 16:11:52'),
(54, 'Rode NTG 3', 'rent', 'day', 0, 10, '<p>The NTG3 is a broadcast-grade shotgun microphone designed for the most demanding shoots that high-resolution broadcast audio. It features RF-bias technology that yields superior resistance to moisture and condensation, making it suitable for outdoor shoots in adverse conditions. The NTG3 has a rich, warm sound and a tightly controlled polar pattern with exceptional off-axis performance with no coloration. It is also highly regarded for voice-over work, where its natural tone and punch deliver exceptional performance for a wide range of voice types.</p>', 0, 0, 0, 0, 0, 1, 30, 1, 0, 1, '2023-05-25 16:13:33', '2023-05-25 16:13:33'),
(55, 'iKan Boom Pole', 'rent', 'day', 0, 5, '<p>The E-Image BC16P Telescoping Boom Pole is specially designed to accommodate Electronic News Gathering (ENG), Electronic Field Production (EFP), documentary, and other field recording applications. Using a telescoping boom pole allows you to place a microphone in close proximity to the subject while remaining at a distance and out of the frame. The BC16P includes an internal coiled XLR cable which removes the hassle of tangling an XLR cable around your boom pole and also makes it easier to extend the boom pole without damaging your XLR cable. The BC16P comes with a side output XLR base so you can easily output to an external recorder.</p>', 0, 0, 0, 0, 0, 1, 29, 1, 0, 1, '2023-05-25 21:44:41', '2023-05-25 21:44:41'),
(56, 'iKan Boom Pole', 'rent', 'day', 0, 5, '<p>The E-Image BC16P Telescoping Boom Pole is specially designed to accommodate Electronic News Gathering (ENG), Electronic Field Production (EFP), documentary, and other field recording applications. Using a telescoping boom pole allows you to place a microphone in close proximity to the subject while remaining at a distance and out of the frame. The BC16P includes an internal coiled XLR cable which removes the hassle of tangling an XLR cable around your boom pole and also makes it easier to extend the boom pole without damaging your XLR cable. The BC16P comes with a side output XLR base so you can easily output to an external recorder.</p>', 0, 0, 0, 0, 0, 1, 29, 1, 0, 1, '2023-05-25 21:46:43', '2023-05-25 21:46:43'),
(57, 'DJI Ronin 1', 'rent', 'day', 0, 30, '<p>The DJI Ronin is designed for use with cine cameras up to 7kg and can also be operated by two operators thanks to a remote control.</p>', 0, 1, 0, 0, 0, 1, 32, 1, 0, 1, '2023-05-27 17:11:15', '2023-05-27 17:11:15'),
(58, 'Ready Rig', 'rent', 'day', 0, 30, '<p>The Ready Rig GS + ProArms features vertical stabilization and reduces bounce motion, providing smoother camera control. By redistributing the weight of a gimbal-mounted or handheld camera setups to your legs and core, this kit enables you to extend your shoot for longer periods of time with less fatigue.</p>', 0, 1, 0, 0, 0, 1, 33, 1, 0, 1, '2023-05-27 17:37:38', '2023-05-27 17:37:38'),
(59, 'Zhiyun Crane 3', 'rent', 'day', 0, 20, '<p>The CRANE 3S features an angled, ergonomic handle that provides two-handed operation for optimal stability. The handle enables you to seamlessly switch to underslung mode, whether with one or two hands, and achieve creative shots such as 330° roll shots as you move closer toward a subject.</p>', 0, 0, 0, 0, 0, 1, 36, 1, 0, 1, '2023-05-29 17:25:28', '2023-05-29 17:25:28'),
(60, 'Moza Air 2', 'rent', 'day', 0, 15, '<p>The Moza Air 2 3-Axis Handheld Gimbal Stabilizer has been upgraded over previous versions with newly optimized high-torque motors, a 9.25 lb weight capacity, and many other features. The high weight capacity allows for a much wider range of cameras to be used, as well as wider combinations of cameras and lenses. The Air 2 also supports the optional Moza iFOCUS Intelligent Wireless Lens Control System, which comes in different versions to offer standard and automatic (with preset start/end points) focus and zoom control directly from the Air 2.</p>', 0, 0, 0, 0, 0, 1, 35, 1, 0, 1, '2023-05-29 17:42:29', '2023-05-29 17:42:29'),
(61, 'Dana Dolly', 'rent', 'day', 0, 25, '<p>The DanaDolly Universal Rental Kit with universal track ends is a heavy duty camera dolly platform that rides on 16 custom modified soft polyurethane wheels that resist flat spotting and use ABEC-7 rated precision bearings providing you with extremely smooth dolly shots.</p>', 0, 0, 0, 0, 0, 1, 34, 1, 0, 1, '2023-05-29 17:46:11', '2023-05-29 17:46:11'),
(62, 'Feiyu A2000 3-Axis Handheld Gimbal', 'rent', 'day', 0, 10, '<p>The Feiyu A2000 3-Axis Handheld Gimbal, a 2-Hand Holder with a joystick, and a Carry Case that fits both items. This kit allows you to use the A2000 by itself the standard way or combine the A2000 and the 2-Hand Holder for full control of the gimbal in two-handed operation. In the latter scenario, the gimbal handle must first be removed.</p>', 0, 0, 0, 0, 0, 1, 37, 1, 0, 1, '2023-05-29 17:57:40', '2023-05-29 17:57:40'),
(63, 'Scrim & Diffuser Kit (24x36)', 'rent', 'day', 0, 15, '<ul><li>	5 x Open-Ended Flag Frames, 1 x Single Black Net, 1/2-Stop</li><li>	1 x Double Black Net, 1-Stop, 1 x Black Light Blocker</li><li>	1 x Silk, 1-Stop &amp; 1 x Silk, 2-Stop, 1 x Single Net Dot, 1/2-Stop (6\")</li><li>	1 x Black Light Blocker Dot (6\"), 1 x Single Net Finger, 1/2-Stop (4x14\")</li><li>	1 x Black Light Blocker Finger (4x14\"), 1 x Carry Case w/ Handles &amp; Compartments</li></ul><p><br></p>', 0, 0, 0, 0, 0, 1, 39, 1, 0, 1, '2023-05-29 18:11:02', '2023-05-29 18:11:02'),
(64, '8’x8’ Diffusion & Flag kit', 'rent', 'day', 0, 25, '<p>Soften, reflect, and tone whatever lighting you encounter with this all-inclusive light control kit. With the modular design of Scrim Jim Cine, this kit can be configured in many different ways. Easily add more diffusion, bounce fabrics, or nets to expand creative possibilities. White, Black, and Green.</p>', 0, 0, 0, 0, 0, 1, 39, 1, 0, 1, '2023-05-29 18:30:41', '2023-05-29 18:30:41'),
(65, '24x36 Flag', 'rent', 'day', 0, 10, '<p>Flags are square or rectangular frames with mounting pins attached. which are used to control natural or artificial light.</p>', 0, 0, 0, 0, 0, 1, 39, 1, 0, 1, '2023-05-29 18:32:44', '2023-05-29 18:32:44'),
(66, '18x24 Flag', 'rent', 'day', 0, 10, '<p>Flags are square or rectangular frames with mounting pins attached. which are used to control natural or artificial light.</p>', 0, 0, 0, 0, 0, 1, 39, 1, 0, 1, '2023-05-29 18:34:15', '2023-06-20 22:08:58'),
(67, 'Atomos Shogun Inferno 7', 'rent', 'day', 0, 20, '<p>The Atomos Shogun Inferno is a 7\", 1920 x 1200 on-camera recording monitor that combines 4K recording with a 10-bit FRC panel that supports native display of HDR (log) footage as well as high-brightness viewing of Rec. 709 footage.</p>', 0, 0, 0, 0, 0, 1, 41, 1, 0, 1, '2023-05-29 18:56:04', '2023-05-29 18:56:04');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genreables`
--

CREATE TABLE `genreables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `genre_id` bigint(20) UNSIGNED NOT NULL,
  `genreable_id` bigint(20) UNSIGNED NOT NULL,
  `genreable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genreables`
--

INSERT INTO `genreables` (`id`, `genre_id`, `genreable_id`, `genreable_type`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 'Modules\\Movie\\Entities\\Movie', NULL, NULL),
(4, 2, 3, 'Modules\\Movie\\Entities\\Movie', NULL, NULL),
(5, 4, 1, 'Modules\\Movie\\Entities\\Movie', NULL, NULL),
(9, 1, 3, 'Modules\\Show\\Entities\\Show', NULL, NULL),
(10, 1, 4, 'Modules\\Show\\Entities\\Show', NULL, NULL),
(14, 2, 5, 'Modules\\Movie\\Entities\\Movie', NULL, NULL),
(15, 3, 5, 'Modules\\Movie\\Entities\\Movie', NULL, NULL),
(16, 1, 1, 'Modules\\Movie\\Entities\\Movie', NULL, NULL),
(17, 2, 4, 'Modules\\Movie\\Entities\\Movie', NULL, NULL),
(18, 2, 4, 'Modules\\Show\\Entities\\Show', NULL, NULL),
(20, 2, 3, 'Modules\\Show\\Entities\\Show', NULL, NULL),
(21, 2, 2, 'Modules\\Show\\Entities\\Show', NULL, NULL),
(22, 5, 1, 'Modules\\Show\\Entities\\Show', NULL, NULL),
(23, 6, 4, 'Modules\\Movie\\Entities\\Movie', NULL, NULL),
(24, 1, 5, 'Modules\\Show\\Entities\\Show', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Action', 1, '2023-01-16 03:04:01', '2023-01-16 03:04:01'),
(2, 'Drama', 1, '2023-01-16 03:04:09', '2023-01-16 03:04:09'),
(3, 'Historical', 1, '2023-01-16 03:04:18', '2023-01-16 03:04:18'),
(4, 'Sci-Fi', 1, '2023-01-22 08:47:23', '2023-01-22 08:47:23'),
(5, 'Reality', 1, '2023-04-20 23:04:00', '2023-04-20 23:04:00'),
(6, 'Historical Fiction', 1, '2023-04-20 23:04:48', '2023-04-20 23:04:48'),
(7, 'Sports', 1, '2023-06-24 18:43:34', '2023-06-24 18:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(3, 'Modules\\Movie\\Entities\\Movie', 1, '22e20c12-24ff-43b4-b54e-01cc4f74382b', 'movie', 'WhatsApp Video 2023-01-15 at 14.30.12', 'WhatsApp-Video-2023-01-15-at-14.30.12.mp4', 'video/mp4', 'media', 'media', 13927670, '[]', '[]', '[]', '[]', 3, '2023-01-16 06:30:50', '2023-01-16 06:30:50'),
(55, 'Modules\\Advertisement\\Entities\\Advertisement', 3, 'da9b1882-b571-43f7-96be-51d3ce96e3ac', 'file', '1691', '1691.JPG', 'image/jpeg', 'media', 'media', 10988261, '[]', '[]', '[]', '[]', 55, '2023-01-24 21:59:57', '2023-01-24 21:59:57'),
(58, 'Modules\\Movie\\Entities\\Movie', 1, '06caa96d-8710-4c29-94ff-faea3356426c', 'top_scroll_poster', 'BondedPoster', 'BondedPoster.jpg', 'image/jpeg', 'media', 'media', 356789, '[]', '[]', '[]', '[]', 58, '2023-02-15 06:47:12', '2023-02-15 06:47:12'),
(59, 'Modules\\Movie\\Entities\\Movie', 4, 'c3614637-9443-4ca8-9725-346062e70fb8', 'thumbnail', 'Reversal Streaming Poster (1)', 'Reversal-Streaming-Poster-(1).png', 'image/png', 'media', 'media', 375076, '[]', '[]', '[]', '[]', 59, '2023-02-15 06:49:22', '2023-02-15 06:49:22'),
(61, 'Modules\\Movie\\Entities\\Movie', 4, '0718d181-b068-417c-adef-aa61780c12a8', 'top_scroll_poster', 'Reversal Streaming Poster (1)', 'Reversal-Streaming-Poster-(1).png', 'image/png', 'media', 'media', 375076, '[]', '[]', '[]', '[]', 61, '2023-02-15 06:49:22', '2023-02-15 06:49:22'),
(64, 'Modules\\Show\\Entities\\Show', 4, 'ed2eb7eb-c725-47e5-94da-fa43b8b707ce', 'top_scroll_poster', 'Episode 2(650 × 350 px)', 'Episode-2(650-×-350-px).png', 'image/png', 'media', 'media', 328454, '[]', '[]', '[]', '[]', 64, '2023-02-15 06:53:06', '2023-02-15 06:53:06'),
(69, 'Modules\\Show\\Entities\\Show', 1, 'dd86e8f0-1b29-4031-9d49-1407617d8636', 'top_scroll_poster', 'Marriage is (1200 × 500 px)', 'Marriage-is-(1200-×-500-px).png', 'image/png', 'media', 'media', 710379, '[]', '[]', '[]', '[]', 69, '2023-02-15 06:57:18', '2023-02-15 06:57:18'),
(72, 'Modules\\Show\\Entities\\Show', 3, 'd6bb970b-e665-4a61-965d-b0aa81e512a1', 'top_scroll_poster', 'Screen Shot 2020-07-09 at 9.37.48 PM', 'Screen-Shot-2020-07-09-at-9.37.48-PM.png', 'image/png', 'media', 'media', 5798448, '[]', '[]', '[]', '[]', 72, '2023-02-15 06:59:58', '2023-02-15 06:59:58'),
(73, 'Modules\\Show\\Entities\\Show', 2, 'd72ea35e-9380-42e6-8859-b488b41181bc', 'thumbnail', 'TruthBeToldPoster2', 'TruthBeToldPoster2.png', 'image/png', 'media', 'media', 1068924, '[]', '[]', '[]', '[]', 73, '2023-02-15 07:01:30', '2023-02-15 07:01:30'),
(74, 'Modules\\Show\\Entities\\Show', 2, '18fe492f-40af-4d1e-965d-b9f4c19056b8', 'poster', 'TruthBeToldPoster2', 'TruthBeToldPoster2.png', 'image/png', 'media', 'media', 1068924, '[]', '[]', '[]', '[]', 74, '2023-02-15 07:01:30', '2023-02-15 07:01:30'),
(75, 'Modules\\Show\\Entities\\Show', 2, '266573b7-e767-46cd-993b-80b8472a475b', 'top_scroll_poster', 'TruthBeToldPoster2', 'TruthBeToldPoster2.png', 'image/png', 'media', 'media', 1068924, '[]', '[]', '[]', '[]', 75, '2023-02-15 07:01:30', '2023-02-15 07:01:30'),
(84, 'Modules\\Show\\Entities\\Season', 3, '72eafccf-d524-4742-b315-574c741ff8f6', 'thumbnail', 'Creepy Horror Movie Teaser Poster', 'Creepy-Horror-Movie-Teaser-Poster.png', 'image/png', 'media', 'media', 2126365, '[]', '[]', '[]', '[]', 84, '2023-02-15 07:11:58', '2023-02-15 07:11:58'),
(85, 'Modules\\Show\\Entities\\Season', 3, 'c1ef4c61-6df0-428b-a2ea-c5eb3ca92af6', 'poster', 'Creepy Horror Movie Teaser Poster', 'Creepy-Horror-Movie-Teaser-Poster.png', 'image/png', 'media', 'media', 2126365, '[]', '[]', '[]', '[]', 85, '2023-02-15 07:11:58', '2023-02-15 07:11:58'),
(86, 'Modules\\Show\\Entities\\Season', 2, 'fef69e13-3cbb-45b8-a2ef-5e2cd5c39e2c', 'thumbnail', 'TruthBeToldPoster2', 'TruthBeToldPoster2.png', 'image/png', 'media', 'media', 1068924, '[]', '[]', '[]', '[]', 86, '2023-02-15 07:12:25', '2023-02-15 07:12:25'),
(87, 'Modules\\Show\\Entities\\Season', 2, '54a21b2f-0a4b-4919-963f-8b9be77e8fca', 'poster', 'TruthBeToldPoster2', 'TruthBeToldPoster2.png', 'image/png', 'media', 'media', 1068924, '[]', '[]', '[]', '[]', 87, '2023-02-15 07:12:25', '2023-02-15 07:12:25'),
(90, 'Modules\\Show\\Entities\\Season', 4, '14f600ff-9b89-4bc0-add1-45962bc1e022', 'thumbnail', 'Episode 2(650 × 350 px)', 'Episode-2(650-×-350-px).png', 'image/png', 'media', 'media', 328454, '[]', '[]', '[]', '[]', 90, '2023-02-15 08:42:31', '2023-02-15 08:42:31'),
(91, 'Modules\\Show\\Entities\\Season', 4, '523d7aa6-ca84-4cb4-bc45-01399fccd081', 'poster', 'Episode 2(650 × 350 px)', 'Episode-2(650-×-350-px).png', 'image/png', 'media', 'media', 328454, '[]', '[]', '[]', '[]', 91, '2023-02-15 08:42:31', '2023-02-15 08:42:31'),
(92, 'Modules\\Show\\Entities\\Episode', 1, '88cc8d41-6720-4ab8-abff-8fbe70781838', 'thumbnail', 'Marriage is (1200 × 500 px)', 'Marriage-is-(1200-×-500-px).png', 'image/png', 'media', 'media', 710379, '[]', '[]', '[]', '[]', 92, '2023-02-15 08:43:26', '2023-02-15 08:43:26'),
(93, 'Modules\\Show\\Entities\\Episode', 1, '91541941-cb1a-4344-8a93-61d773dc593c', 'poster', 'Marriage is (1200 × 500 px)', 'Marriage-is-(1200-×-500-px).png', 'image/png', 'media', 'media', 710379, '[]', '[]', '[]', '[]', 93, '2023-02-15 08:43:26', '2023-02-15 08:43:26'),
(94, 'Modules\\Show\\Entities\\Episode', 2, 'd699e885-ce5e-40c1-98ce-9cac88c796ac', 'thumbnail', 'Marriage is (1200 × 500 px)', 'Marriage-is-(1200-×-500-px).png', 'image/png', 'media', 'media', 710379, '[]', '[]', '[]', '[]', 94, '2023-02-15 08:44:49', '2023-02-15 08:44:49'),
(95, 'Modules\\Show\\Entities\\Episode', 2, 'b448f552-770f-493c-98a3-0cc96b60d2d0', 'poster', 'Marriage is (1200 × 500 px)', 'Marriage-is-(1200-×-500-px).png', 'image/png', 'media', 'media', 710379, '[]', '[]', '[]', '[]', 95, '2023-02-15 08:44:49', '2023-02-15 08:44:49'),
(96, 'Modules\\Show\\Entities\\Episode', 3, 'cdf9f442-81c4-4cb3-aaa0-6c72369a3c9d', 'thumbnail', 'Marriage is (1200 × 500 px)', 'Marriage-is-(1200-×-500-px).png', 'image/png', 'media', 'media', 710379, '[]', '[]', '[]', '[]', 96, '2023-02-15 08:45:11', '2023-02-15 08:45:11'),
(97, 'Modules\\Show\\Entities\\Episode', 3, '04601258-c355-4763-a25e-294693916f80', 'poster', 'Marriage is (1200 × 500 px)', 'Marriage-is-(1200-×-500-px).png', 'image/png', 'media', 'media', 710379, '[]', '[]', '[]', '[]', 97, '2023-02-15 08:45:11', '2023-02-15 08:45:11'),
(98, 'Modules\\Show\\Entities\\Episode', 4, '99096531-7373-4abd-8608-3b7c5687eacc', 'thumbnail', 'Marriage is (1200 × 500 px)', 'Marriage-is-(1200-×-500-px).png', 'image/png', 'media', 'media', 710379, '[]', '[]', '[]', '[]', 98, '2023-02-15 08:45:39', '2023-02-15 08:45:39'),
(99, 'Modules\\Show\\Entities\\Episode', 4, '84ddb1e6-e9dd-4e56-8ebe-e7ead277c508', 'poster', 'Marriage is (1200 × 500 px)', 'Marriage-is-(1200-×-500-px).png', 'image/png', 'media', 'media', 710379, '[]', '[]', '[]', '[]', 99, '2023-02-15 08:45:39', '2023-02-15 08:45:39'),
(100, 'Modules\\Show\\Entities\\Episode', 5, '72550798-4847-4572-910f-ca5b5a21cd41', 'thumbnail', 'Marriage is (1200 × 500 px)', 'Marriage-is-(1200-×-500-px).png', 'image/png', 'media', 'media', 710379, '[]', '[]', '[]', '[]', 100, '2023-02-15 08:46:03', '2023-02-15 08:46:03'),
(101, 'Modules\\Show\\Entities\\Episode', 5, '82e8f138-ff5b-4870-90a6-f8141b49e272', 'poster', 'Marriage is (1200 × 500 px)', 'Marriage-is-(1200-×-500-px).png', 'image/png', 'media', 'media', 710379, '[]', '[]', '[]', '[]', 101, '2023-02-15 08:46:03', '2023-02-15 08:46:03'),
(102, 'Modules\\Show\\Entities\\Episode', 6, '0900d13c-a2f5-4608-8408-de0400c47eb7', 'thumbnail', 'Marriage is (1200 × 500 px)', 'Marriage-is-(1200-×-500-px).png', 'image/png', 'media', 'media', 710379, '[]', '[]', '[]', '[]', 102, '2023-02-15 08:46:24', '2023-02-15 08:46:24'),
(103, 'Modules\\Show\\Entities\\Episode', 6, '063a71dd-5064-41d2-90a8-98bbe19d0a4f', 'poster', 'Marriage is (1200 × 500 px)', 'Marriage-is-(1200-×-500-px).png', 'image/png', 'media', 'media', 710379, '[]', '[]', '[]', '[]', 103, '2023-02-15 08:46:24', '2023-02-15 08:46:24'),
(104, 'Modules\\Show\\Entities\\Episode', 7, '2efff3ba-babb-4aa4-a1f9-6a9872b1c4ec', 'thumbnail', 'Marriage is (1200 × 500 px)', 'Marriage-is-(1200-×-500-px).png', 'image/png', 'media', 'media', 710379, '[]', '[]', '[]', '[]', 104, '2023-02-15 08:46:46', '2023-02-15 08:46:46'),
(105, 'Modules\\Show\\Entities\\Episode', 7, '2e19cf99-aeae-4fd4-86b1-922c2a254a81', 'poster', 'Marriage is (1200 × 500 px)', 'Marriage-is-(1200-×-500-px).png', 'image/png', 'media', 'media', 710379, '[]', '[]', '[]', '[]', 105, '2023-02-15 08:46:46', '2023-02-15 08:46:46'),
(110, 'Modules\\Show\\Entities\\Episode', 8, '34efd89c-89cc-422a-b353-d3608e2c9e17', 'poster', 'TruthBeToldPoster2', 'TruthBeToldPoster2.png', 'image/png', 'media', 'media', 1068924, '[]', '[]', '[]', '[]', 109, '2023-02-15 08:49:32', '2023-02-15 08:49:32'),
(114, 'Modules\\Rental\\Entities\\Equipment', 1, 'b29c3b29-bb00-46ec-93cb-be51b2f1ea1f', 'gallery', 'bw01', 'bw01.jpg', 'image/jpeg', 'media', 'media', 103474, '[]', '[]', '[]', '[]', 113, '2023-02-27 05:50:37', '2023-02-27 05:50:37'),
(122, 'Modules\\Category\\Entities\\Category', 8, '22d773dd-7d25-4ed4-9060-5261c4a79dd2', 'picture', 'Sony_logo', 'Sony_logo.webp', 'image/webp', 'media', 'media', 5424, '[]', '[]', '[]', '[]', 118, '2023-03-22 06:24:08', '2023-03-22 06:24:08'),
(138, 'Modules\\Movie\\Entities\\Movie', 1, '2fc9475a-f3bc-4a59-9106-463c729afcd8', 'thumbnail', 'BondItthumnail', 'BondItthumnail.png', 'image/png', 'media', 'media', 139265, '[]', '[]', '[]', '[]', 133, '2023-03-24 22:38:01', '2023-03-24 22:38:01'),
(141, 'Modules\\Movie\\Entities\\Movie', 1, 'b365b38d-bd21-40a0-a216-2dcf7aa7b571', 'poster', 'BonditBack', 'BonditBack.png', 'image/png', 'media', 'media', 389710, '[]', '[]', '[]', '[]', 136, '2023-03-25 00:13:41', '2023-03-25 00:13:41'),
(142, 'Modules\\Movie\\Entities\\Movie', 4, 'f7e8962c-d9c3-4293-bc2c-ae59d113bfcc', 'poster', 'ReversalBack', 'ReversalBack.png', 'image/png', 'media', 'media', 2316717, '[]', '[]', '[]', '[]', 137, '2023-03-25 00:16:39', '2023-03-25 00:16:39'),
(146, 'Modules\\Show\\Entities\\Show', 4, 'a82781de-1998-4fed-94d9-baae49720d10', 'thumbnail', 'HerThumNail', 'HerThumNail.png', 'image/png', 'media', 'media', 79092, '[]', '[]', '[]', '[]', 141, '2023-03-25 00:30:33', '2023-03-25 00:30:33'),
(147, 'Modules\\Show\\Entities\\Show', 4, '5f95eeee-5abc-416c-ba1b-c4ab6330385f', 'poster', 'Her11Back', 'Her11Back.png', 'image/png', 'media', 'media', 741695, '[]', '[]', '[]', '[]', 142, '2023-03-25 00:30:33', '2023-03-25 00:30:33'),
(148, 'Modules\\Show\\Entities\\Episode', 11, '517c19b4-f0f7-406b-8f6f-1e489ca68d15', 'thumbnail', 'HerThumNail', 'HerThumNail.png', 'image/png', 'media', 'media', 79092, '[]', '[]', '[]', '[]', 143, '2023-03-25 00:31:49', '2023-03-25 00:31:49'),
(149, 'Modules\\Show\\Entities\\Episode', 11, '8c084375-1bf3-4ba9-8387-d78590834da6', 'poster', 'Her11Back', 'Her11Back.png', 'image/png', 'media', 'media', 741695, '[]', '[]', '[]', '[]', 144, '2023-03-25 00:31:49', '2023-03-25 00:31:49'),
(150, 'Modules\\Show\\Entities\\Episode', 8, 'cb1389f2-4e40-48a5-be65-c9171a206535', 'thumbnail', 'Truththumnail', 'Truththumnail.png', 'image/png', 'media', 'media', 165817, '[]', '[]', '[]', '[]', 145, '2023-03-25 00:32:38', '2023-03-25 00:32:38'),
(151, 'Modules\\Show\\Entities\\Episode', 10, '5dd898f2-0243-4a03-b8ad-72c116d7b43b', 'thumbnail', 'Her1thumnail', 'Her1thumnail.png', 'image/png', 'media', 'media', 35955, '[]', '[]', '[]', '[]', 146, '2023-03-25 00:36:03', '2023-03-25 00:36:03'),
(152, 'Modules\\Show\\Entities\\Episode', 10, '7660f0da-153c-481a-b323-9002973a664d', 'poster', 'Her1Back', 'Her1Back.png', 'image/png', 'media', 'media', 302906, '[]', '[]', '[]', '[]', 147, '2023-03-25 00:36:03', '2023-03-25 00:36:03'),
(153, 'Modules\\Show\\Entities\\Episode', 9, 'e3fa2c60-fc3e-465c-af23-44a4c43e9fd1', 'thumbnail', 'TheSurThumnail', 'TheSurThumnail.png', 'image/png', 'media', 'media', 177410, '[]', '[]', '[]', '[]', 148, '2023-03-25 00:37:32', '2023-03-25 00:37:32'),
(154, 'Modules\\Show\\Entities\\Episode', 9, '078546bd-98b2-4d15-9a6e-4f9a0cf366a5', 'poster', 'TheSurBack', 'TheSurBack.png', 'image/png', 'media', 'media', 528297, '[]', '[]', '[]', '[]', 149, '2023-03-25 00:40:03', '2023-03-25 00:40:03'),
(155, 'Modules\\Show\\Entities\\Show', 3, '628a2827-db48-424b-983d-e13165ae4e3f', 'poster', 'TheSurBack', 'TheSurBack.png', 'image/png', 'media', 'media', 528297, '[]', '[]', '[]', '[]', 150, '2023-03-25 00:40:59', '2023-03-25 00:40:59'),
(156, 'Modules\\Show\\Entities\\Show', 3, 'db2fe5c5-723b-469c-a6e2-4be6aa008cf7', 'thumbnail', 'TheSurBack11', 'TheSurBack11.png', 'image/png', 'media', 'media', 28274, '[]', '[]', '[]', '[]', 151, '2023-03-25 00:45:16', '2023-03-25 00:45:16'),
(157, 'Modules\\Advertisement\\Entities\\Advertisement', 1, '63723b32-161d-4ec8-9964-d587cd767f8c', 'file', 'FInal logo white text-01-01', 'FInal-logo-white-text-01-01.jpg', 'image/jpeg', 'media', 'media', 1495811, '[]', '[]', '[]', '[]', 152, '2023-03-27 04:14:45', '2023-03-27 04:14:45'),
(158, 'Modules\\Advertisement\\Entities\\Advertisement', 2, '56adc9cf-d8b9-45f9-8e10-d272c0eba44c', 'file', 'animation 03', 'animation-03.mp4', 'video/mp4', 'media', 'media', 9507698, '[]', '[]', '[]', '[]', 153, '2023-03-27 04:15:27', '2023-03-27 04:15:27'),
(159, 'Modules\\Show\\Entities\\Show', 1, '0f1743a0-9c0f-4689-a45a-37e81a828102', 'thumbnail', 'Marriagethumnail', 'Marriagethumnail.png', 'image/png', 'media', 'media', 148423, '[]', '[]', '[]', '[]', 154, '2023-03-27 23:40:27', '2023-03-27 23:40:27'),
(160, 'Modules\\Show\\Entities\\Show', 1, '016d6e54-5b22-4ee6-946d-df38ad748e88', 'poster', 'MarriageBack', 'MarriageBack.png', 'image/png', 'media', 'media', 1435787, '[]', '[]', '[]', '[]', 155, '2023-03-27 23:40:27', '2023-03-27 23:40:27'),
(161, 'Modules\\Show\\Entities\\Season', 1, '80ab7d75-067c-47fe-b528-3b8eb30467ac', 'thumbnail', 'Marriagethumnail', 'Marriagethumnail.png', 'image/png', 'media', 'media', 148423, '[]', '[]', '[]', '[]', 156, '2023-03-27 23:40:51', '2023-03-27 23:40:51'),
(162, 'Modules\\Show\\Entities\\Season', 1, '7943b4c8-6eeb-41b1-9c95-7fae63c01caf', 'poster', 'MarriageBack', 'MarriageBack.png', 'image/png', 'media', 'media', 1435787, '[]', '[]', '[]', '[]', 157, '2023-03-27 23:40:51', '2023-03-27 23:40:51'),
(165, 'Modules\\Rental\\Entities\\Room', 5, '800e2ac2-dc59-4ed1-88d6-e230f263fc1b', 'gallery', 'IMG_2487', 'IMG_2487.jpg', 'image/jpeg', 'media', 'media', 481317, '[]', '[]', '[]', '[]', 160, '2023-03-28 02:20:03', '2023-03-28 02:20:03'),
(166, 'Modules\\Rental\\Entities\\Room', 5, 'ef2a6e83-1455-4f2d-a25e-2d02658fa6c9', 'gallery', 'IMG_2486', 'IMG_2486.jpg', 'image/jpeg', 'media', 'media', 510094, '[]', '[]', '[]', '[]', 161, '2023-03-28 02:20:03', '2023-03-28 02:20:03'),
(167, 'Modules\\Rental\\Entities\\Room', 4, '6093fb8c-c4e1-4a36-8e4b-aa83dbe76e8b', 'gallery', 'IMG_2485', 'IMG_2485.jpg', 'image/jpeg', 'media', 'media', 525035, '[]', '[]', '[]', '[]', 162, '2023-03-28 02:21:05', '2023-03-28 02:21:05'),
(168, 'Modules\\Rental\\Entities\\Room', 4, 'c4983d66-d379-41bd-87f0-2fb51bd342b5', 'gallery', 'IMG_2484', 'IMG_2484.jpg', 'image/jpeg', 'media', 'media', 469820, '[]', '[]', '[]', '[]', 163, '2023-03-28 02:21:05', '2023-03-28 02:21:05'),
(179, 'Modules\\Rental\\Entities\\Room', 8, '63f06d1a-cd04-4994-8b6c-2bf1f6f7d1c5', 'gallery', 'IMG_2520', 'IMG_2520.jpg', 'image/jpeg', 'media', 'media', 61838, '[]', '[]', '[]', '[]', 169, '2023-04-01 18:06:28', '2023-04-01 18:06:28'),
(180, 'Modules\\Rental\\Entities\\Room', 8, 'b3e37604-3871-4e65-8e1c-9c8449596669', 'gallery', 'IMG_2519', 'IMG_2519.jpg', 'image/jpeg', 'media', 'media', 48224, '[]', '[]', '[]', '[]', 170, '2023-04-01 18:06:28', '2023-04-01 18:06:28'),
(181, 'Modules\\Rental\\Entities\\Room', 8, '45211dfd-abd6-4b6c-af17-647298877f8b', 'gallery', 'IMG_2518', 'IMG_2518.jpg', 'image/jpeg', 'media', 'media', 45034, '[]', '[]', '[]', '[]', 171, '2023-04-01 18:06:28', '2023-04-01 18:06:28'),
(186, 'Modules\\Rental\\Entities\\Room', 11, '41394ceb-6196-44e1-befb-d65da1eca161', 'gallery', 'IMG_2526', 'IMG_2526.jpg', 'image/jpeg', 'media', 'media', 58932, '[]', '[]', '[]', '[]', 176, '2023-04-01 18:12:35', '2023-04-01 18:12:35'),
(187, 'Modules\\Rental\\Entities\\Room', 12, 'f1b25793-2eb9-46ea-84cc-08b9f0cebf9f', 'gallery', 'IMG_2528', 'IMG_2528.jpg', 'image/jpeg', 'media', 'media', 52548, '[]', '[]', '[]', '[]', 177, '2023-04-01 18:21:37', '2023-04-01 18:21:37'),
(188, 'Modules\\Rental\\Entities\\Room', 12, 'e2f81496-239a-4331-a92c-229d0340b358', 'gallery', 'IMG_2527', 'IMG_2527.jpg', 'image/jpeg', 'media', 'media', 63929, '[]', '[]', '[]', '[]', 178, '2023-04-01 18:21:37', '2023-04-01 18:21:37'),
(190, 'Modules\\Rental\\Entities\\Room', 7, '3697a265-0df5-4a88-be6d-74b26b4affcc', 'gallery', 'IMG_01', 'IMG_01.jpg', 'image/jpeg', 'media', 'media', 54925, '[]', '[]', '[]', '[]', 180, '2023-04-01 22:42:32', '2023-04-01 22:42:32'),
(191, 'Modules\\Movie\\Entities\\Movie', 4, 'ea466329-7799-4533-aa1e-6ccd4428293c', 'trailer_video', 'Reversal _ Official Trailer', 'Reversal-_-Official-Trailer.mp4', 'video/mp4', 'media', 'media', 12916925, '[]', '[]', '[]', '[]', 181, '2023-04-11 22:42:29', '2023-04-11 22:42:29'),
(192, 'Modules\\Show\\Entities\\Season', 4, '75a1a971-b75c-45b4-90c9-0735728b2ba4', 'trailer_video', 'HER II _ Official Trailer', 'HER-II-_-Official-Trailer.mp4', 'video/mp4', 'media', 'media', 9759051, '[]', '[]', '[]', '[]', 182, '2023-04-11 22:46:57', '2023-04-11 22:46:57'),
(194, 'Modules\\Show\\Entities\\Season', 3, '57d4638c-32ac-4be5-be65-03b586776358', 'trailer_video', 'The Suffering Official Trailer (2021)', 'The-Suffering-Official-Trailer-(2021).mp4', 'video/mp4', 'media', 'media', 4655343, '[]', '[]', '[]', '[]', 184, '2023-04-11 22:49:18', '2023-04-11 22:49:18'),
(195, 'Modules\\Show\\Entities\\Season', 1, '0949b0cb-2f2f-4ab9-89e4-6726aa97e7f9', 'trailer_video', 'Marriage Is Season 2 Invitation', 'Marriage-Is-Season-2-Invitation.mp4', 'video/mp4', 'media', 'media', 8385340, '[]', '[]', '[]', '[]', 185, '2023-04-11 22:49:42', '2023-04-11 22:49:42'),
(202, 'Modules\\Movie\\Entities\\Movie', 5, 'a110ff19-18c0-49bc-8436-265055700191', 'poster', 'BWSBPoster2', 'BWSBPoster2.png', 'image/png', 'media', 'media', 1323203, '[]', '[]', '[]', '[]', 190, '2023-04-15 17:21:46', '2023-04-15 17:21:46'),
(205, 'Modules\\Advertisement\\Entities\\Advertisement', 4, '842ac223-c5f7-42b3-aadd-80391f4a4629', 'file', 'CooFeeCommercial', 'CooFeeCommercial.mp4', 'video/mp4', 'media', 'media', 13831373, '[]', '[]', '[]', '[]', 192, '2023-04-15 17:39:11', '2023-04-15 17:39:11'),
(208, 'Modules\\Movie\\Entities\\Movie', 5, '45b4a301-4f29-474d-a96c-783e8adf33c5', 'thumbnail', 'BWSThumnail01', 'BWSThumnail01.png', 'image/png', 'media', 'media', 108573, '[]', '[]', '[]', '[]', 194, '2023-04-15 18:26:42', '2023-04-15 18:26:42'),
(209, 'Modules\\Movie\\Entities\\Movie', 5, '31800362-a364-457b-8e93-546e9b83a495', 'trailer_video', 'BWSBDCTrailer', 'BWSBDCTrailer.mp4', 'video/mp4', 'media', 'media', 5354377, '[]', '[]', '[]', '[]', 195, '2023-04-15 18:26:42', '2023-04-15 18:26:42'),
(211, 'Modules\\Movie\\Entities\\Movie', 5, '00540f57-67c4-41d5-9ecd-67f81389d6e0', 'top_scroll_poster', 'BWSBPoster2', 'BWSBPoster2.png', 'image/png', 'media', 'media', 1323203, '[]', '[]', '[]', '[]', 197, '2023-04-17 15:06:41', '2023-04-17 15:06:41'),
(212, 'Modules\\Show\\Entities\\Season', 2, 'd4bd9644-d33f-4c67-80fa-13d2c31f1918', 'trailer_video', 'TruthBeTold _ OfficialTrailer', 'TruthBeTold-_-OfficialTrailer.mp4', 'video/mp4', 'media', 'media', 12343433, '[]', '[]', '[]', '[]', 198, '2023-04-20 20:09:38', '2023-04-20 20:09:38'),
(214, 'Modules\\Rental\\Entities\\Equipment', 4, 'b8041b9e-edc6-4dd1-8958-81e85c2be252', 'gallery', 'Blackmagic Design URSA Mini Pro 4.6K G2 EF', 'Blackmagic-Design-URSA-Mini-Pro-4.6K-G2-EF.jpeg', 'image/jpeg', 'media', 'media', 501190, '[]', '[]', '[]', '[]', 199, '2023-04-20 23:37:46', '2023-04-20 23:37:46'),
(215, 'Modules\\Category\\Entities\\Category', 10, 'e4465e67-fa4d-4be2-9768-c849a64a2d13', 'picture', 'RED', 'RED.jpeg', 'image/jpeg', 'media', 'media', 606984, '[]', '[]', '[]', '[]', 200, '2023-04-20 23:55:16', '2023-04-20 23:55:16'),
(216, 'Modules\\Category\\Entities\\Category', 11, '32dff5bd-d4bf-4a3c-a66f-4ae77f12c748', 'picture', 'Arri Alexa', 'Arri-Alexa.png', 'image/png', 'media', 'media', 260696, '[]', '[]', '[]', '[]', 201, '2023-04-20 23:55:40', '2023-04-20 23:55:40'),
(217, 'Modules\\Rental\\Entities\\Equipment', 5, '11877290-cc6d-410b-994f-908cbf2979ff', 'gallery', 'Red Epic Dragon', 'Red-Epic-Dragon.jpeg', 'image/jpeg', 'media', 'media', 69026, '[]', '[]', '[]', '[]', 202, '2023-04-21 00:00:26', '2023-04-21 00:00:26'),
(218, 'Modules\\Rental\\Entities\\Equipment', 6, '370274cc-58ad-405b-ac5f-ee42efdb85d3', 'gallery', 'Arri-Alexa-Classic-High-Speed', 'Arri-Alexa-Classic-High-Speed.jpeg', 'image/jpeg', 'media', 'media', 128345, '[]', '[]', '[]', '[]', 203, '2023-04-21 00:02:38', '2023-04-21 00:02:38'),
(219, 'Modules\\Rental\\Entities\\Equipment', 7, 'daaae5d8-9a29-4260-b82f-bb4dc0480e88', 'gallery', 'Blackmagic pocket 6k', 'Blackmagic-pocket-6k.jpg', 'image/jpeg', 'media', 'media', 208787, '[]', '[]', '[]', '[]', 204, '2023-04-21 00:08:17', '2023-04-21 00:08:17'),
(221, 'Modules\\Rental\\Entities\\Equipment', 8, '99afd37a-ec95-4958-aee3-cc14842cac5d', 'gallery', 'Black Magic Micro Cinema Camera', 'Black-Magic-Micro-Cinema-Camera.jpeg', 'image/jpeg', 'media', 'media', 77214, '[]', '[]', '[]', '[]', 205, '2023-04-21 00:11:14', '2023-04-21 00:11:14'),
(222, 'Modules\\Category\\Entities\\Category', 13, 'd88bbc96-b380-42f8-9e60-a39e4b2187fb', 'picture', 'DJI', 'DJI.jpeg', 'image/jpeg', 'media', 'media', 14199, '[]', '[]', '[]', '[]', 206, '2023-04-21 00:21:00', '2023-04-21 00:21:00'),
(223, 'Modules\\Rental\\Entities\\Equipment', 9, '64f9a15b-c1e8-45d4-a43f-e508de8794f7', 'gallery', 'DJI Mavic Air 2', 'DJI-Mavic-Air-2.jpeg', 'image/jpeg', 'media', 'media', 151696, '[]', '[]', '[]', '[]', 207, '2023-04-21 00:22:24', '2023-04-21 00:22:24'),
(224, 'Modules\\Category\\Entities\\Category', 9, 'b47c967a-e9cd-4b93-9a1b-3dc32ffdd56c', 'picture', 'Blackmagic Design', 'Blackmagic-Design.webp', 'image/webp', 'media', 'media', 4702, '[]', '[]', '[]', '[]', 208, '2023-04-21 00:24:06', '2023-04-21 00:24:06'),
(225, 'Modules\\Advertisement\\Entities\\Advertisement', 5, 'e3946904-86f4-4735-aba3-dc2d1fbd98c1', 'file', 'BWSPoster', 'BWSPoster.png', 'image/png', 'media', 'media', 876471, '[]', '[]', '[]', '[]', 209, '2023-04-28 19:21:43', '2023-04-28 19:21:43'),
(226, 'Modules\\Rental\\Entities\\Room', 6, '721a7313-2b5e-46b4-bd0d-ccef0c5b3ae2', 'gallery', '20230512_215935', '20230512_215935.jpg', 'image/jpeg', 'media', 'media', 1953312, '[]', '[]', '[]', '[]', 210, '2023-05-22 22:10:51', '2023-05-22 22:10:51'),
(227, 'Modules\\Rental\\Entities\\Room', 9, 'a3a7d378-0032-43fa-9405-776bcec4406e', 'gallery', '20230512_215020', '20230512_215020.jpg', 'image/jpeg', 'media', 'media', 2089274, '[]', '[]', '[]', '[]', 211, '2023-05-22 22:26:29', '2023-05-22 22:26:29'),
(228, 'Modules\\Rental\\Entities\\Room', 9, '92e466b8-9842-4a37-bc93-3cceb4edc79f', 'gallery', '20230512_215050', '20230512_215050.jpg', 'image/jpeg', 'media', 'media', 1952486, '[]', '[]', '[]', '[]', 212, '2023-05-22 22:26:29', '2023-05-22 22:26:29'),
(229, 'Modules\\Rental\\Entities\\Room', 9, 'a499d7a7-8bff-4b59-9ef6-ac5a943e7734', 'gallery', '20230512_215807', '20230512_215807.jpg', 'image/jpeg', 'media', 'media', 1446218, '[]', '[]', '[]', '[]', 213, '2023-05-22 22:26:29', '2023-05-22 22:26:29'),
(230, 'Modules\\Rental\\Entities\\Room', 10, '49c82a8a-b45c-4af4-bccd-cfa058efa91f', 'gallery', '20230512_132659', '20230512_132659.jpg', 'image/jpeg', 'media', 'media', 1677229, '[]', '[]', '[]', '[]', 214, '2023-05-22 22:30:32', '2023-05-22 22:30:32'),
(231, 'Modules\\Category\\Entities\\Category', 14, '16806a0c-fd08-46bb-a788-e66b1c6c62fc', 'picture', 'Zeiss_logo.svg', 'Zeiss_logo.svg.png', 'image/png', 'media', 'media', 35617, '[]', '[]', '[]', '[]', 215, '2023-05-23 20:06:47', '2023-05-23 20:06:47'),
(232, 'Modules\\Rental\\Entities\\Equipment', 10, 'a18d6153-3c72-4bec-995e-2672dc6f8c17', 'gallery', 'Zeiss Cp 2 Set', 'Zeiss-Cp-2-Set.jpeg', 'image/jpeg', 'media', 'media', 299210, '[]', '[]', '[]', '[]', 216, '2023-05-23 20:11:34', '2023-05-23 20:11:34'),
(234, 'Modules\\Rental\\Entities\\Equipment', 11, 'ae89d878-d1c3-4053-9671-1bcbf474fede', 'gallery', 'Zeiss Cp2 21', 'Zeiss-Cp2-21.jpeg', 'image/jpeg', 'media', 'media', 163413, '[]', '[]', '[]', '[]', 218, '2023-05-23 20:25:49', '2023-05-23 20:25:49'),
(235, 'Modules\\Rental\\Entities\\Equipment', 12, '1249a3e5-017c-4388-bde0-82ff784d1206', 'gallery', 'Zeiss CP_2_35mm_T1_5', 'Zeiss-CP_2_35mm_T1_5.jpeg', 'image/jpeg', 'media', 'media', 257247, '[]', '[]', '[]', '[]', 219, '2023-05-23 20:30:30', '2023-05-23 20:30:30'),
(236, 'Modules\\Rental\\Entities\\Equipment', 13, '7dda0449-bc6a-4fb2-be8a-1eddc88f47f3', 'gallery', 'Zeiss CP_2_50mm', 'Zeiss-CP_2_50mm.jpeg', 'image/jpeg', 'media', 'media', 140754, '[]', '[]', '[]', '[]', 220, '2023-05-23 20:31:11', '2023-05-23 20:31:11'),
(237, 'Modules\\Rental\\Entities\\Equipment', 14, 'fc9cc7bd-abb0-4c93-ab5d-a4d0dd898313', 'gallery', 'Zeiss CP_2_85mm', 'Zeiss-CP_2_85mm.jpeg', 'image/jpeg', 'media', 'media', 568296, '[]', '[]', '[]', '[]', 221, '2023-05-23 20:39:09', '2023-05-23 20:39:09'),
(240, 'Modules\\Rental\\Entities\\Equipment', 15, '1402614d-643d-4f6d-a528-9189cc6e7ef5', 'gallery', 'DRACAST X2000RGB', 'DRACAST-X2000RGB.jpeg', 'image/jpeg', 'media', 'media', 12782, '[]', '[]', '[]', '[]', 224, '2023-05-23 20:53:37', '2023-05-23 20:53:37'),
(241, 'Modules\\Category\\Entities\\Category', 18, '3c02920e-2563-43ff-803d-0d3e6190dd6f', 'picture', 'dracast-logo-blue', 'dracast-logo-blue.webp', 'image/webp', 'media', 'media', 7218, '[]', '[]', '[]', '[]', 225, '2023-05-23 20:54:40', '2023-05-23 20:54:40'),
(242, 'Modules\\Rental\\Entities\\Equipment', 16, 'ba795d6f-f78a-4a7c-afbc-14560bbae758', 'gallery', 'Zeiss CP_2_35mm_T1_5', 'Zeiss-CP_2_35mm_T1_5.jpeg', 'image/jpeg', 'media', 'media', 257247, '[]', '[]', '[]', '[]', 226, '2023-05-23 20:59:32', '2023-05-23 20:59:32'),
(243, 'Modules\\Rental\\Entities\\Equipment', 17, 'dce6ce05-ef75-4b7a-9439-73dc7c04c3c9', 'gallery', 'Zeiss CP_2_85mm', 'Zeiss-CP_2_85mm.jpeg', 'image/jpeg', 'media', 'media', 568296, '[]', '[]', '[]', '[]', 227, '2023-05-23 21:03:18', '2023-05-23 21:03:18'),
(244, 'Modules\\Category\\Entities\\Category', 19, 'b82f7547-c8ae-4a76-9ae0-fa9e4c9757b2', 'picture', 'godox', 'godox.png', 'image/png', 'media', 'media', 7443, '[]', '[]', '[]', '[]', 228, '2023-05-23 21:07:02', '2023-05-23 21:07:02'),
(245, 'Modules\\Rental\\Entities\\Equipment', 18, 'eb424195-22a8-406a-9503-ae9380ba8fa8', 'gallery', 'Godox Knowled M600BI Bi Color LED Video Light', 'Godox-Knowled-M600BI-Bi-Color-LED-Video-Light.jpeg', 'image/jpeg', 'media', 'media', 40235, '[]', '[]', '[]', '[]', 229, '2023-05-23 21:11:26', '2023-05-23 21:11:26'),
(246, 'Modules\\Rental\\Entities\\Equipment', 19, 'f19bc33f-745c-40cb-8695-db00718c00a9', 'gallery', 'godox_vl300_led', 'godox_vl300_led.jpeg', 'image/jpeg', 'media', 'media', 55568, '[]', '[]', '[]', '[]', 230, '2023-05-24 03:20:03', '2023-05-24 03:20:03'),
(247, 'Modules\\Rental\\Entities\\Equipment', 20, '4b3ccf9b-3aef-4328-8209-25266cea55f5', 'gallery', 'Godox SL60W', 'Godox-SL60W.jpeg', 'image/jpeg', 'media', 'media', 71316, '[]', '[]', '[]', '[]', 231, '2023-05-24 03:32:19', '2023-05-24 03:32:19'),
(248, 'Modules\\Rental\\Entities\\Equipment', 21, '270f7b5c-d303-4322-8209-bb314c5dbcc2', 'gallery', 'Godox Knowled M600BI Bi Color LED Video Light', 'Godox-Knowled-M600BI-Bi-Color-LED-Video-Light.jpeg', 'image/jpeg', 'media', 'media', 40235, '[]', '[]', '[]', '[]', 232, '2023-05-24 03:50:17', '2023-05-24 03:50:17'),
(249, 'Modules\\Rental\\Entities\\Equipment', 22, 'b429e480-7a71-4223-884c-e1877325cc1a', 'gallery', 'Godox SL60W', 'Godox-SL60W.jpeg', 'image/jpeg', 'media', 'media', 71316, '[]', '[]', '[]', '[]', 233, '2023-05-24 03:58:47', '2023-05-24 03:58:47'),
(250, 'Modules\\Rental\\Entities\\Equipment', 23, '4ecb6bb9-0f23-4030-ac40-820a7a7c630c', 'gallery', 'gotl180', 'gotl180.jpg', 'image/jpeg', 'media', 'media', 41606, '[]', '[]', '[]', '[]', 234, '2023-05-24 04:03:08', '2023-05-24 04:03:08'),
(251, 'Modules\\Rental\\Entities\\Equipment', 24, '12c43bef-1392-4f82-976a-17d5eb00d87d', 'gallery', 'gotl180', 'gotl180.jpg', 'image/jpeg', 'media', 'media', 41606, '[]', '[]', '[]', '[]', 235, '2023-05-24 04:05:52', '2023-05-24 04:05:52'),
(252, 'Modules\\Rental\\Entities\\Equipment', 25, 'ff39d13e-f16a-433f-8f85-fb84dab0cd9d', 'gallery', 'gotl120k4', 'gotl120k4.jpg', 'image/jpeg', 'media', 'media', 84626, '[]', '[]', '[]', '[]', 236, '2023-05-24 04:10:00', '2023-05-24 04:10:00'),
(253, 'Modules\\Rental\\Entities\\Equipment', 26, '820cf5c9-b701-4b6f-a7a1-8dfe836f0699', 'gallery', 'godox_rgb_mini_creative_m1', 'godox_rgb_mini_creative_m1.jpeg', 'image/jpeg', 'media', 'media', 56086, '[]', '[]', '[]', '[]', 237, '2023-05-24 04:14:48', '2023-05-24 04:14:48'),
(254, 'Modules\\Rental\\Entities\\Equipment', 27, '8ef3be88-c6de-4825-ba62-5d0b21e1c939', 'gallery', 'godox_rgb_mini_creative_m1', 'godox_rgb_mini_creative_m1.jpeg', 'image/jpeg', 'media', 'media', 56086, '[]', '[]', '[]', '[]', 238, '2023-05-24 04:15:36', '2023-05-24 04:15:36'),
(255, 'Modules\\Category\\Entities\\Category', 20, '5e2d11d5-f2fa-4da9-9df4-f65e4d3762db', 'picture', 'GVM', 'GVM.png', 'image/png', 'media', 'media', 54570, '[]', '[]', '[]', '[]', 239, '2023-05-24 04:20:29', '2023-05-24 04:20:29'),
(256, 'Modules\\Rental\\Entities\\Equipment', 28, '03b6d0a8-8fa0-4fd3-9bd2-1156a877ddaf', 'gallery', 'GVM RGB LED Light kit', 'GVM-RGB-LED-Light-kit.jpeg', 'image/jpeg', 'media', 'media', 231592, '[]', '[]', '[]', '[]', 240, '2023-05-24 04:21:26', '2023-05-24 04:21:26'),
(257, 'Modules\\Rental\\Entities\\Equipment', 29, '3d2497b4-8c78-4043-89d5-f72eaca9f06c', 'gallery', '1638910094_1677825', '1638910094_1677825.jpg', 'image/jpeg', 'media', 'media', 60758, '[]', '[]', '[]', '[]', 241, '2023-05-24 04:29:04', '2023-05-24 04:29:04'),
(258, 'Modules\\Rental\\Entities\\Equipment', 30, '81a98153-1480-472f-8564-e28862d122a1', 'gallery', 'softbox_1_umbrella_fabric', 'softbox_1_umbrella_fabric.jpeg', 'image/jpeg', 'media', 'media', 30017, '[]', '[]', '[]', '[]', 242, '2023-05-24 04:36:00', '2023-05-24 04:36:00'),
(259, 'Modules\\Rental\\Entities\\Equipment', 31, 'd88cc436-2fdd-4b54-b322-3fc20de032f9', 'gallery', 'softbox_1_umbrella_fabric', 'softbox_1_umbrella_fabric.jpeg', 'image/jpeg', 'media', 'media', 30017, '[]', '[]', '[]', '[]', 243, '2023-05-24 04:41:17', '2023-05-24 04:41:17'),
(260, 'Modules\\Category\\Entities\\Category', 22, '0d7176e0-55c4-46e5-9fad-3310d36cfa4d', 'picture', 'tripod-icon-linear-logo-professional-equipment-shooting-black-simple-illustration-stand-light-camera-softbox-contour-174189901', 'tripod-icon-linear-logo-professional-equipment-shooting-black-simple-illustration-stand-light-camera-softbox-contour-174189901.jpg', 'image/jpeg', 'media', 'media', 54586, '[]', '[]', '[]', '[]', 244, '2023-05-24 14:21:42', '2023-05-24 14:21:42'),
(261, 'Modules\\Rental\\Entities\\Equipment', 32, '4875b8c6-0129-44c4-b00c-5643d050e7a6', 'gallery', 'Combo Stand', 'Combo-Stand.jpeg', 'image/jpeg', 'media', 'media', 8321, '[]', '[]', '[]', '[]', 245, '2023-05-24 14:23:28', '2023-05-24 14:23:28'),
(262, 'Modules\\Rental\\Entities\\Equipment', 33, 'bf83e097-7f2b-4fb3-ae97-a861f1eca92a', 'gallery', 'Combo Stand', 'Combo-Stand.jpeg', 'image/jpeg', 'media', 'media', 8321, '[]', '[]', '[]', '[]', 246, '2023-05-24 14:28:51', '2023-05-24 14:28:51'),
(263, 'Modules\\Rental\\Entities\\Equipment', 34, '8e5c3924-a112-48e1-a77e-531c3a46a7cc', 'gallery', 'C-Stand', 'C-Stand.jpg', 'image/jpeg', 'media', 'media', 76012, '[]', '[]', '[]', '[]', 247, '2023-05-24 14:34:05', '2023-05-24 14:34:05'),
(264, 'Modules\\Rental\\Entities\\Equipment', 35, 'c4965611-e1cf-4cce-b424-8636a3be6aeb', 'gallery', 'C-Stand', 'C-Stand.jpg', 'image/jpeg', 'media', 'media', 76012, '[]', '[]', '[]', '[]', 248, '2023-05-24 14:36:45', '2023-05-24 14:36:45'),
(265, 'Modules\\Rental\\Entities\\Equipment', 36, 'fff66986-71c6-41be-a577-50e5ebe44d65', 'gallery', 'C-Stand', 'C-Stand.jpg', 'image/jpeg', 'media', 'media', 76012, '[]', '[]', '[]', '[]', 249, '2023-05-24 14:37:21', '2023-05-24 14:37:21'),
(266, 'Modules\\Rental\\Entities\\Equipment', 37, 'f9a6e428-8407-47fe-9e3d-482b64f7c6ce', 'gallery', 'C-Stand', 'C-Stand.jpg', 'image/jpeg', 'media', 'media', 76012, '[]', '[]', '[]', '[]', 250, '2023-05-24 14:37:59', '2023-05-24 14:37:59'),
(267, 'Modules\\Rental\\Entities\\Equipment', 38, '27d0166e-6247-4970-8c7f-60696a71aee4', 'gallery', 'C-Stand', 'C-Stand.jpg', 'image/jpeg', 'media', 'media', 76012, '[]', '[]', '[]', '[]', 251, '2023-05-24 14:38:40', '2023-05-24 14:38:40'),
(268, 'Modules\\Rental\\Entities\\Equipment', 39, 'b843c490-f810-464c-9534-e6798a2d84de', 'gallery', 'C-Stand', 'C-Stand.jpg', 'image/jpeg', 'media', 'media', 76012, '[]', '[]', '[]', '[]', 252, '2023-05-24 14:40:24', '2023-05-24 14:40:24'),
(269, 'Modules\\Category\\Entities\\Category', 26, '0663a66b-218a-4f81-a172-7607543d2514', 'picture', 'zoom', 'zoom.jpg', 'image/jpeg', 'media', 'media', 31886, '[]', '[]', '[]', '[]', 253, '2023-05-25 14:42:59', '2023-05-25 14:42:59'),
(270, 'Modules\\Rental\\Entities\\Equipment', 40, 'ae3ed3ee-9ede-4930-a643-8a687a936ed8', 'gallery', 'zoom_zf8npro_8_channel_field_recorder', 'zoom_zf8npro_8_channel_field_recorder.jpeg', 'image/jpeg', 'media', 'media', 162030, '[]', '[]', '[]', '[]', 254, '2023-05-25 14:45:06', '2023-05-25 14:45:06'),
(271, 'Modules\\Rental\\Entities\\Equipment', 41, '766124d7-3a88-4f50-8def-9733718d827c', 'gallery', 'zoom_zf6_f6_multitrack_field_recorder', 'zoom_zf6_f6_multitrack_field_recorder.jpeg', 'image/jpeg', 'media', 'media', 391409, '[]', '[]', '[]', '[]', 255, '2023-05-25 14:47:10', '2023-05-25 14:47:10'),
(272, 'Modules\\Rental\\Entities\\Equipment', 42, 'ae14797e-6d4a-48e0-af8e-2d2fbce92cd2', 'gallery', 'zoom_zfrc8_f_control', 'zoom_zfrc8_f_control.jpeg', 'image/jpeg', 'media', 'media', 358337, '[]', '[]', '[]', '[]', 256, '2023-05-25 15:31:04', '2023-05-25 15:31:04'),
(273, 'Modules\\Category\\Entities\\Category', 27, 'd49dbe85-26ec-4f51-8a15-9f5d1d656004', 'picture', 'Lectro_Logo_3', 'Lectro_Logo_3.png', 'image/png', 'media', 'media', 11371, '[]', '[]', '[]', '[]', 257, '2023-05-25 15:32:15', '2023-05-25 15:32:15'),
(274, 'Modules\\Category\\Entities\\Category', 28, '712cef9a-1a06-4759-882d-952a3c879e41', 'picture', 'Sennheiser-Logo', 'Sennheiser-Logo.png', 'image/png', 'media', 'media', 17136, '[]', '[]', '[]', '[]', 258, '2023-05-25 15:32:40', '2023-05-25 15:32:40'),
(276, 'Modules\\Category\\Entities\\Category', 30, 'ac9dabcd-24f1-4843-bf12-3a024f33c072', 'picture', 'Rode', 'Rode.png', 'image/png', 'media', 'media', 3652, '[]', '[]', '[]', '[]', 260, '2023-05-25 15:35:53', '2023-05-25 15:35:53'),
(277, 'Modules\\Category\\Entities\\Category', 31, 'ec78f5e3-11d7-4b77-a73a-142355fd97a1', 'picture', 'Sanken', 'Sanken.png', 'image/png', 'media', 'media', 22591, '[]', '[]', '[]', '[]', 261, '2023-05-25 15:36:07', '2023-05-25 15:36:07'),
(278, 'Modules\\Category\\Entities\\Category', 29, '5a883d19-42a1-4b2f-be7f-a3637446e605', 'picture', 'iKan', 'iKan.png', 'image/png', 'media', 'media', 1838, '[]', '[]', '[]', '[]', 262, '2023-05-25 15:38:51', '2023-05-25 15:38:51'),
(279, 'Modules\\Rental\\Entities\\Equipment', 43, '65eba53a-695e-4130-ae80-8f148c472a54', 'gallery', 'Lectrosonics_srb_19', 'Lectrosonics_srb_19.jpeg', 'image/jpeg', 'media', 'media', 21872, '[]', '[]', '[]', '[]', 263, '2023-05-25 15:42:50', '2023-05-25 15:42:50'),
(280, 'Modules\\Rental\\Entities\\Equipment', 44, '49bb667f-3b6f-403b-a7d0-9d8e646cf537', 'gallery', 'Lectrosonic smqv 19', 'Lectrosonic-smqv-19.jpeg', 'image/jpeg', 'media', 'media', 39426, '[]', '[]', '[]', '[]', 264, '2023-05-25 15:44:28', '2023-05-25 15:44:28'),
(281, 'Modules\\Rental\\Entities\\Equipment', 45, '3d58c73e-e24c-4d64-86cc-27e2b27b92fb', 'gallery', 'Lectrosonics_SM', 'Lectrosonics_SM.jpeg', 'image/jpeg', 'media', 'media', 15745, '[]', '[]', '[]', '[]', 265, '2023-05-25 15:45:32', '2023-05-25 15:45:32'),
(282, 'Modules\\Rental\\Entities\\Equipment', 46, 'abab36ea-0f73-4ddc-984a-1966ee4d2b9a', 'gallery', 'Sennheiser G4', 'Sennheiser-G4.jpeg', 'image/jpeg', 'media', 'media', 30120, '[]', '[]', '[]', '[]', 266, '2023-05-25 15:48:50', '2023-05-25 15:48:50'),
(283, 'Modules\\Rental\\Entities\\Equipment', 47, '278c0dda-71c0-4a18-bc13-45d05add38eb', 'gallery', 'Sennheiser G4', 'Sennheiser-G4.jpeg', 'image/jpeg', 'media', 'media', 30120, '[]', '[]', '[]', '[]', 267, '2023-05-25 15:51:08', '2023-05-25 15:51:08'),
(284, 'Modules\\Rental\\Entities\\Equipment', 48, '08bf8917-5593-495f-8b71-7ab8474a46b9', 'gallery', 'Sennheiser G4', 'Sennheiser-G4.jpeg', 'image/jpeg', 'media', 'media', 30120, '[]', '[]', '[]', '[]', 268, '2023-05-25 15:51:39', '2023-05-25 15:51:39'),
(285, 'Modules\\Rental\\Entities\\Equipment', 49, 'ce186a3a-063f-439e-a88e-dfb33e75359c', 'gallery', 'Sennheiser G4 500', 'Sennheiser-G4-500.jpeg', 'image/jpeg', 'media', 'media', 3112, '[]', '[]', '[]', '[]', 269, '2023-05-25 16:02:00', '2023-05-25 16:02:00'),
(286, 'Modules\\Rental\\Entities\\Equipment', 50, 'e93c0f2a-93fc-4ac0-b721-99ce2a1b9cb8', 'gallery', 'Sennheiser g3', 'Sennheiser-g3.jpeg', 'image/jpeg', 'media', 'media', 24396, '[]', '[]', '[]', '[]', 270, '2023-05-25 16:04:25', '2023-05-25 16:04:25'),
(287, 'Modules\\Rental\\Entities\\Equipment', 51, 'b3c3e9eb-1d9c-4821-bf7e-02310d3d084d', 'gallery', 'Sennheiser_MKH50_P48', 'Sennheiser_MKH50_P48.jpeg', 'image/jpeg', 'media', 'media', 14842, '[]', '[]', '[]', '[]', 271, '2023-05-25 16:06:02', '2023-05-25 16:06:02'),
(288, 'Modules\\Rental\\Entities\\Equipment', 52, 'e8c46ab9-335c-48d1-b153-8bb1d958c251', 'gallery', 'Sennheiser_MKH50_P48', 'Sennheiser_MKH50_P48.jpeg', 'image/jpeg', 'media', 'media', 14842, '[]', '[]', '[]', '[]', 272, '2023-05-25 16:06:37', '2023-05-25 16:06:37'),
(289, 'Modules\\Rental\\Entities\\Equipment', 53, '5bc68421-bc90-4106-aefe-b268991124c2', 'gallery', 'Sennheiser-MKH-416', 'Sennheiser-MKH-416.jpeg', 'image/jpeg', 'media', 'media', 75034, '[]', '[]', '[]', '[]', 273, '2023-05-25 16:11:52', '2023-05-25 16:11:52'),
(290, 'Modules\\Rental\\Entities\\Equipment', 54, '40b45744-c082-4b77-8253-2b7ed1ce5c9d', 'gallery', 'Rode_NTG_3', 'Rode_NTG_3.jpeg', 'image/jpeg', 'media', 'media', 66615, '[]', '[]', '[]', '[]', 274, '2023-05-25 16:13:33', '2023-05-25 16:13:33'),
(291, 'Modules\\Rental\\Entities\\Equipment', 55, '5c693ecc-873a-4dab-85c2-035d5857b2c5', 'gallery', 'ikan Boom Pole', 'ikan-Boom-Pole.jpeg', 'image/jpeg', 'media', 'media', 16645, '[]', '[]', '[]', '[]', 275, '2023-05-25 21:44:41', '2023-05-25 21:44:41'),
(292, 'Modules\\Rental\\Entities\\Equipment', 56, 'f8a01112-b638-4379-81a6-39376e4a466f', 'gallery', 'ikan Boom Pole', 'ikan-Boom-Pole.jpeg', 'image/jpeg', 'media', 'media', 16645, '[]', '[]', '[]', '[]', 276, '2023-05-25 21:46:43', '2023-05-25 21:46:43'),
(293, 'Modules\\Category\\Entities\\Category', 32, 'ad64a2a2-f470-45c1-bcd4-665522118b9b', 'picture', 'DJI', 'DJI.jpeg', 'image/jpeg', 'media', 'media', 14199, '[]', '[]', '[]', '[]', 277, '2023-05-27 17:09:45', '2023-05-27 17:09:45'),
(294, 'Modules\\Rental\\Entities\\Equipment', 57, '94ee995d-b3e4-448a-b1a2-d049402162b3', 'gallery', 'DJI ronin-1', 'DJI-ronin-1.jpeg', 'image/jpeg', 'media', 'media', 64009, '[]', '[]', '[]', '[]', 278, '2023-05-27 17:11:15', '2023-05-27 17:11:15'),
(295, 'Modules\\Category\\Entities\\Category', 33, '2ef3e430-1124-460f-b213-5cd26dee6309', 'picture', 'Ready RIg', 'Ready-RIg.png', 'image/png', 'media', 'media', 23750, '[]', '[]', '[]', '[]', 279, '2023-05-27 17:14:17', '2023-05-27 17:14:17'),
(296, 'Modules\\Category\\Entities\\Category', 34, '3c420cbe-6869-46f2-9cc3-a4a092617736', 'picture', 'Dana Dolly', 'Dana-Dolly.png', 'image/png', 'media', 'media', 22846, '[]', '[]', '[]', '[]', 280, '2023-05-27 17:18:24', '2023-05-27 17:18:24'),
(297, 'Modules\\Category\\Entities\\Category', 35, '44116698-6aab-4f41-a434-d46a9c9bf935', 'picture', 'MOZA', 'MOZA.jpeg', 'image/jpeg', 'media', 'media', 33496, '[]', '[]', '[]', '[]', 281, '2023-05-27 17:18:43', '2023-05-27 17:18:43'),
(298, 'Modules\\Category\\Entities\\Category', 36, 'b0f97f9b-f11e-42ef-b7a5-722a59fc8799', 'picture', 'zhiyun', 'zhiyun.webp', 'image/webp', 'media', 'media', 1654, '[]', '[]', '[]', '[]', 282, '2023-05-27 17:18:59', '2023-05-27 17:18:59'),
(299, 'Modules\\Category\\Entities\\Category', 37, '64fdb0a2-6263-4fb6-9ffc-84284768f61c', 'picture', 'feiyu-tech-logo-png', 'feiyu-tech-logo-png.png', 'image/jpeg', 'media', 'media', 31562, '[]', '[]', '[]', '[]', 283, '2023-05-27 17:19:45', '2023-05-27 17:19:45'),
(300, 'Modules\\Rental\\Entities\\Equipment', 58, '810d095a-b465-4780-9fea-aa34b3282d07', 'gallery', 'ready_rig_ready_rig_gs_kit', 'ready_rig_ready_rig_gs_kit.jpeg', 'image/jpeg', 'media', 'media', 319633, '[]', '[]', '[]', '[]', 284, '2023-05-27 17:37:38', '2023-05-27 17:37:38'),
(301, 'Modules\\Rental\\Entities\\Equipment', 59, 'f4a6bd3c-c898-4eed-8b58-737ba799ed07', 'gallery', 'zhcrane 3 pro', 'zhcrane-3-pro.jpeg', 'image/jpeg', 'media', 'media', 15730, '[]', '[]', '[]', '[]', 285, '2023-05-29 17:25:28', '2023-05-29 17:25:28'),
(302, 'Modules\\Rental\\Entities\\Equipment', 60, '292b445c-48bc-432e-aacb-ea6551419c16', 'gallery', 'moza_air_2_stabilizer', 'moza_air_2_stabilizer.jpeg', 'image/jpeg', 'media', 'media', 85321, '[]', '[]', '[]', '[]', 286, '2023-05-29 17:42:29', '2023-05-29 17:42:29'),
(303, 'Modules\\Rental\\Entities\\Equipment', 61, '3f5fd4bd-5a13-4843-b23b-a71e51cd8e2e', 'gallery', 'Dana Dolly', 'Dana-Dolly.jpeg', 'image/jpeg', 'media', 'media', 101326, '[]', '[]', '[]', '[]', 287, '2023-05-29 17:46:11', '2023-05-29 17:46:11'),
(304, 'Modules\\Rental\\Entities\\Equipment', 62, 'd99dcca1-b34a-46ae-bd96-0506ebffd682', 'gallery', 'feiyu_a2000_3_axis_gimbal', 'feiyu_a2000_3_axis_gimbal.jpeg', 'image/jpeg', 'media', 'media', 297757, '[]', '[]', '[]', '[]', 288, '2023-05-29 17:57:40', '2023-05-29 17:57:40'),
(305, 'Modules\\Category\\Entities\\Category', 39, '39f86710-3825-42a7-953b-c35fad3c71b5', 'picture', 'Logo', 'Logo.png', 'image/png', 'media', 'media', 302703, '[]', '[]', '[]', '[]', 289, '2023-05-29 18:09:01', '2023-05-29 18:09:01'),
(306, 'Modules\\Rental\\Entities\\Equipment', 63, '6ffc44ab-5a67-45b8-acdb-be5b1f51fbee', 'gallery', 'Scrim Kit (24x36)', 'Scrim-Kit-(24x36).jpeg', 'image/jpeg', 'media', 'media', 338165, '[]', '[]', '[]', '[]', 290, '2023-05-29 18:11:02', '2023-05-29 18:11:02'),
(307, 'Modules\\Rental\\Entities\\Equipment', 64, '8364c9ea-872b-4d6c-befb-750d4a39fd64', 'gallery', '8x8 Diffuser', '8x8-Diffuser.png', 'image/png', 'media', 'media', 94359, '[]', '[]', '[]', '[]', 291, '2023-05-29 18:30:41', '2023-05-29 18:30:41'),
(308, 'Modules\\Rental\\Entities\\Equipment', 65, '253c8c4d-fef4-421b-8b80-6999ee6e9795', 'gallery', '24x36 Flag', '24x36-Flag.jpeg', 'image/jpeg', 'media', 'media', 57099, '[]', '[]', '[]', '[]', 292, '2023-05-29 18:32:44', '2023-05-29 18:32:44'),
(309, 'Modules\\Rental\\Entities\\Equipment', 66, '37ca5c93-5f98-4b81-bb8e-51a70f1c801b', 'gallery', '18x24 Flag', '18x24-Flag.jpeg', 'image/jpeg', 'media', 'media', 105515, '[]', '[]', '[]', '[]', 293, '2023-05-29 18:34:15', '2023-05-29 18:34:15'),
(310, 'Modules\\Category\\Entities\\Category', 41, 'ad78b4a7-8185-4a27-bcb2-997f17e2f82f', 'picture', 'black', 'black.png', 'image/png', 'media', 'media', 35413, '[]', '[]', '[]', '[]', 294, '2023-05-29 18:51:12', '2023-05-29 18:51:12'),
(311, 'Modules\\Rental\\Entities\\Equipment', 67, 'eb9a60e0-aea4-43d8-9fe9-b5cfc7713a3c', 'gallery', 'atomos-shogun-inferno-7', 'atomos-shogun-inferno-7.jpeg', 'image/jpeg', 'media', 'media', 85515, '[]', '[]', '[]', '[]', 295, '2023-05-29 18:56:04', '2023-05-29 18:56:04'),
(312, 'Modules\\Show\\Entities\\Show', 5, '1c93af71-8778-48ec-969c-2aa4921b78db', 'poster', 'Untitled design (1)', 'Untitled-design-(1).png', 'image/png', 'media', 'media', 148430, '[]', '[]', '[]', '[]', 296, '2023-06-24 18:43:20', '2023-06-24 18:43:20'),
(313, 'Modules\\Show\\Entities\\Show', 5, '54020b2a-7e84-48cb-bf38-bbccd7eb6d91', 'thumbnail', 'SKL', 'SKL.png', 'image/png', 'media', 'media', 176821, '[]', '[]', '[]', '[]', 297, '2023-06-24 18:45:38', '2023-06-24 18:45:38'),
(314, 'Modules\\Show\\Entities\\Season', 5, 'df425b9f-ce99-423b-9eb8-c6e49e96cfa3', 'thumbnail', 'SKL', 'SKL.png', 'image/png', 'media', 'media', 176821, '[]', '[]', '[]', '[]', 298, '2023-06-24 19:32:27', '2023-06-24 19:32:27'),
(315, 'Modules\\Show\\Entities\\Season', 5, '6da603a8-ea7d-4069-bb08-2496eb3ac4ec', 'poster', 'Untitled design (1)', 'Untitled-design-(1).png', 'image/png', 'media', 'media', 148430, '[]', '[]', '[]', '[]', 299, '2023-06-24 19:32:27', '2023-06-24 19:32:27'),
(316, 'Modules\\Show\\Entities\\Season', 5, '5d827cef-f3ab-4d09-94b7-01b50ca211f4', 'trailer_video', 'Skinz League Intro', 'Skinz-League-Intro.mp4', 'video/mp4', 'media', 'media', 8107774, '[]', '[]', '[]', '[]', 300, '2023-06-24 19:32:27', '2023-06-24 19:32:27'),
(320, 'Modules\\Show\\Entities\\Episode', 12, 'ef22eacc-0f14-45cf-9548-a4b3c2d1a397', 'thumbnail', 'SKL', 'SKL.png', 'image/png', 'media', 'media', 176821, '[]', '[]', '[]', '[]', 301, '2023-06-24 22:03:42', '2023-06-24 22:03:42'),
(321, 'Modules\\Show\\Entities\\Episode', 12, 'e172562e-c935-4f20-8852-39395f3ec928', 'poster', 'Untitled design (1)', 'Untitled-design-(1).png', 'image/png', 'media', 'media', 148430, '[]', '[]', '[]', '[]', 302, '2023-06-24 22:03:42', '2023-06-24 22:03:42'),
(322, 'Modules\\Show\\Entities\\Episode', 13, '479787e7-7c97-4e61-a371-2e1f29ab974a', 'thumbnail', 'SKL', 'SKL.png', 'image/png', 'media', 'media', 176821, '[]', '[]', '[]', '[]', 303, '2023-06-24 22:26:45', '2023-06-24 22:26:45'),
(323, 'Modules\\Show\\Entities\\Episode', 13, '21222835-b827-4b1d-bec1-fe0c18bd6d64', 'poster', 'Untitled design (1)', 'Untitled-design-(1).png', 'image/png', 'media', 'media', 148430, '[]', '[]', '[]', '[]', 304, '2023-06-24 22:26:45', '2023-06-24 22:26:45'),
(324, 'Modules\\Show\\Entities\\Episode', 14, 'a8cac8f5-9839-45e8-b5a0-7bb7f8714d0b', 'thumbnail', 'SKL', 'SKL.png', 'image/png', 'media', 'media', 176821, '[]', '[]', '[]', '[]', 305, '2023-06-24 22:36:35', '2023-06-24 22:36:35'),
(325, 'Modules\\Show\\Entities\\Episode', 14, '17a14524-cbdf-49ac-afc6-16610d9aa9c0', 'poster', 'Untitled design (1)', 'Untitled-design-(1).png', 'image/png', 'media', 'media', 148430, '[]', '[]', '[]', '[]', 306, '2023-06-24 22:36:35', '2023-06-24 22:36:35'),
(326, 'Modules\\Show\\Entities\\Episode', 15, 'fa71c68d-256b-488f-825a-bc1d4c33b245', 'thumbnail', 'SKL', 'SKL.png', 'image/png', 'media', 'media', 176821, '[]', '[]', '[]', '[]', 307, '2023-06-24 22:49:14', '2023-06-24 22:49:14'),
(327, 'Modules\\Show\\Entities\\Episode', 15, '5d362132-e3cd-4ac1-96bf-1758bec7560a', 'poster', 'Untitled design (1)', 'Untitled-design-(1).png', 'image/png', 'media', 'media', 148430, '[]', '[]', '[]', '[]', 308, '2023-06-24 22:49:14', '2023-06-24 22:49:14'),
(328, 'Modules\\Show\\Entities\\Episode', 16, '3e54722c-ea82-493f-bcd4-df2a60935523', 'thumbnail', 'SKL', 'SKL.png', 'image/png', 'media', 'media', 176821, '[]', '[]', '[]', '[]', 309, '2023-06-24 22:53:08', '2023-06-24 22:53:08'),
(329, 'Modules\\Show\\Entities\\Episode', 16, 'c9721e52-d829-4b79-a5f4-480ae4580d76', 'poster', 'Untitled design (1)', 'Untitled-design-(1).png', 'image/png', 'media', 'media', 148430, '[]', '[]', '[]', '[]', 310, '2023-06-24 22:53:08', '2023-06-24 22:53:08'),
(330, 'Modules\\Show\\Entities\\Episode', 17, 'f1c2a0fe-fdf9-4639-8b33-b6bc2cd497b2', 'thumbnail', 'SKL', 'SKL.png', 'image/png', 'media', 'media', 176821, '[]', '[]', '[]', '[]', 311, '2023-06-24 22:57:00', '2023-06-24 22:57:00'),
(331, 'Modules\\Show\\Entities\\Episode', 17, '9f98c806-a44b-4975-bbeb-5102ee4166be', 'poster', 'Untitled design (1)', 'Untitled-design-(1).png', 'image/png', 'media', 'media', 148430, '[]', '[]', '[]', '[]', 312, '2023-06-24 22:57:00', '2023-06-24 22:57:00'),
(332, 'Modules\\Show\\Entities\\Episode', 18, 'f2583656-0f5d-45bb-99c8-d50dee546cfc', 'thumbnail', 'SKL', 'SKL.png', 'image/png', 'media', 'media', 176821, '[]', '[]', '[]', '[]', 313, '2023-06-24 23:01:05', '2023-06-24 23:01:05'),
(333, 'Modules\\Show\\Entities\\Episode', 18, 'ab6ae0b4-fdb2-4852-8bdc-ba2a848dd7d9', 'poster', 'Untitled design (1)', 'Untitled-design-(1).png', 'image/png', 'media', 'media', 148430, '[]', '[]', '[]', '[]', 314, '2023-06-24 23:01:05', '2023-06-24 23:01:05'),
(334, 'Modules\\Show\\Entities\\Episode', 19, 'a9ab19ec-a581-48c5-9ae2-3dbcf6ca7629', 'thumbnail', 'SKL', 'SKL.png', 'image/png', 'media', 'media', 176821, '[]', '[]', '[]', '[]', 315, '2023-06-24 23:05:33', '2023-06-24 23:05:33'),
(335, 'Modules\\Show\\Entities\\Episode', 19, '72be3319-ac58-4ace-a854-86df7323eaeb', 'poster', 'Untitled design (1)', 'Untitled-design-(1).png', 'image/png', 'media', 'media', 148430, '[]', '[]', '[]', '[]', 316, '2023-06-24 23:05:33', '2023-06-24 23:05:33'),
(336, 'Modules\\Show\\Entities\\Episode', 20, '20f962f2-105c-485b-b3b1-7b1e2eda6f0b', 'thumbnail', 'SKL', 'SKL.png', 'image/png', 'media', 'media', 176821, '[]', '[]', '[]', '[]', 317, '2023-07-03 22:31:31', '2023-07-03 22:31:31'),
(337, 'Modules\\Show\\Entities\\Episode', 20, '1523d55d-d15c-4015-bf0c-47bc5b9ffd5d', 'poster', 'Untitled design (1)', 'Untitled-design-(1).png', 'image/png', 'media', 'media', 148430, '[]', '[]', '[]', '[]', 318, '2023-07-03 22:31:31', '2023-07-03 22:31:31'),
(338, 'Modules\\Show\\Entities\\Episode', 21, '3c4233a0-b50b-45cd-bb93-6925c3e65618', 'thumbnail', 'SKL', 'SKL.png', 'image/png', 'media', 'media', 176821, '[]', '[]', '[]', '[]', 319, '2023-07-03 22:38:32', '2023-07-03 22:38:32'),
(339, 'Modules\\Show\\Entities\\Episode', 21, 'c0eb9f03-6ed4-4453-a6fa-4b1f8939b9f0', 'poster', 'Untitled design (1)', 'Untitled-design-(1).png', 'image/png', 'media', 'media', 148430, '[]', '[]', '[]', '[]', 320, '2023-07-03 22:38:32', '2023-07-03 22:38:32');
INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(340, 'Modules\\Show\\Entities\\Episode', 22, 'ca590f46-cad0-41c5-9ae7-bee0e6c8fb39', 'thumbnail', 'SKL', 'SKL.png', 'image/png', 'media', 'media', 176821, '[]', '[]', '[]', '[]', 321, '2023-07-03 22:43:35', '2023-07-03 22:43:35'),
(341, 'Modules\\Show\\Entities\\Episode', 22, '39cca874-a557-4f90-8f7e-07ce3ba141e7', 'poster', 'Untitled design (1)', 'Untitled-design-(1).png', 'image/png', 'media', 'media', 148430, '[]', '[]', '[]', '[]', 322, '2023-07-03 22:43:35', '2023-07-03 22:43:35'),
(342, 'Modules\\Show\\Entities\\Episode', 23, '64ea1ea4-15d3-487a-b2a9-a8782cb8cbda', 'thumbnail', 'SKL', 'SKL.png', 'image/png', 'media', 'media', 176821, '[]', '[]', '[]', '[]', 323, '2023-07-03 22:47:17', '2023-07-03 22:47:17'),
(343, 'Modules\\Show\\Entities\\Episode', 23, '1eab9341-50cc-456f-8680-3c54f5243774', 'poster', 'Untitled design (1)', 'Untitled-design-(1).png', 'image/png', 'media', 'media', 148430, '[]', '[]', '[]', '[]', 324, '2023-07-03 22:47:17', '2023-07-03 22:47:17'),
(344, 'Modules\\Show\\Entities\\Episode', 24, '85ded60a-3b5f-4e20-9d3c-2b72bfef3a92', 'thumbnail', 'SKL', 'SKL.png', 'image/png', 'media', 'media', 176821, '[]', '[]', '[]', '[]', 325, '2023-07-03 22:50:24', '2023-07-03 22:50:24'),
(345, 'Modules\\Show\\Entities\\Episode', 24, 'f9cfe221-fdb8-469e-a97f-b95f25075db8', 'poster', 'Untitled design (1)', 'Untitled-design-(1).png', 'image/png', 'media', 'media', 148430, '[]', '[]', '[]', '[]', 326, '2023-07-03 22:50:24', '2023-07-03 22:50:24'),
(346, 'Modules\\Show\\Entities\\Episode', 25, '66e3e9f0-f552-45a2-b751-d3f7d49fe2a2', 'thumbnail', 'SKL', 'SKL.png', 'image/png', 'media', 'media', 176821, '[]', '[]', '[]', '[]', 327, '2023-07-03 22:53:46', '2023-07-03 22:53:46'),
(347, 'Modules\\Show\\Entities\\Episode', 25, 'e3a9b662-73c8-42d3-ae69-f95dd0d659de', 'poster', 'Untitled design (1)', 'Untitled-design-(1).png', 'image/png', 'media', 'media', 148430, '[]', '[]', '[]', '[]', 328, '2023-07-03 22:53:46', '2023-07-03 22:53:46'),
(348, 'Modules\\Show\\Entities\\Episode', 26, 'ff609f0e-bce1-444f-ab74-c13ebc7e5dd0', 'thumbnail', 'SKL', 'SKL.png', 'image/png', 'media', 'media', 176821, '[]', '[]', '[]', '[]', 329, '2023-07-03 22:57:31', '2023-07-03 22:57:31'),
(349, 'Modules\\Show\\Entities\\Episode', 26, '1729a7f2-fdbc-4dad-a113-35bb4f2abd2c', 'poster', 'Untitled design (1)', 'Untitled-design-(1).png', 'image/png', 'media', 'media', 148430, '[]', '[]', '[]', '[]', 330, '2023-07-03 22:57:31', '2023-07-03 22:57:31'),
(350, 'Modules\\Show\\Entities\\Episode', 27, 'fc9bce6e-577c-4b03-a39f-886d053938cc', 'thumbnail', 'SKL', 'SKL.png', 'image/png', 'media', 'media', 176821, '[]', '[]', '[]', '[]', 331, '2023-07-03 23:00:01', '2023-07-03 23:00:01'),
(351, 'Modules\\Show\\Entities\\Episode', 27, 'ee51b830-d708-40e0-be10-746d722ebacd', 'poster', 'Untitled design (1)', 'Untitled-design-(1).png', 'image/png', 'media', 'media', 148430, '[]', '[]', '[]', '[]', 332, '2023-07-03 23:00:01', '2023-07-03 23:00:01');

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
(1, '2013_12_16_112235_create_activity_log_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_05_03_000001_create_customer_columns', 1),
(5, '2019_05_03_000002_create_subscriptions_table', 1),
(6, '2019_05_03_000003_create_subscription_items_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2020_01_11_185906_create_profiles_table', 1),
(10, '2022_05_18_165233_create_subscriptions_table', 1),
(11, '2022_12_12_191532_create_p_subscriptions_table_user', 1),
(12, '2022_12_16_112443_create_permission_tables', 1),
(13, '2022_12_16_122016_create_genres_table', 1),
(14, '2022_12_16_124123_create_movies_table', 1),
(15, '2022_12_16_132811_create_media_table', 1),
(16, '2022_12_27_192446_create_advertisements_table', 1),
(17, '2023_01_01_053405_create_shows_table', 1),
(18, '2023_01_01_053419_create_seasons_table', 1),
(19, '2023_01_01_053423_create_episodes_table', 1),
(20, '2023_01_01_055013_create_advertisementables_table', 1),
(21, '2023_01_01_055013_create_genreables_table', 1),
(22, '2023_01_11_111140_create_visits_table', 1),
(23, '2023_01_11_114946_create_views_table', 1),
(24, '2023_01_13_121716_create_settings_table', 1),
(25, '2024_01_08_142814_create_watch_times_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 12),
(6, 'App\\Models\\User', 12),
(3, 'App\\Models\\User', 14),
(3, 'App\\Models\\User', 15),
(3, 'App\\Models\\User', 16),
(3, 'App\\Models\\User', 17),
(3, 'App\\Models\\User', 18),
(3, 'App\\Models\\User', 19),
(3, 'App\\Models\\User', 20),
(3, 'App\\Models\\User', 21),
(3, 'App\\Models\\User', 22),
(3, 'App\\Models\\User', 23),
(3, 'App\\Models\\User', 24),
(3, 'App\\Models\\User', 25),
(3, 'App\\Models\\User', 26),
(3, 'App\\Models\\User', 27),
(3, 'App\\Models\\User', 32),
(3, 'App\\Models\\User', 42),
(3, 'App\\Models\\User', 53),
(3, 'App\\Models\\User', 55),
(3, 'App\\Models\\User', 61),
(3, 'App\\Models\\User', 62),
(3, 'App\\Models\\User', 63),
(3, 'App\\Models\\User', 75),
(3, 'App\\Models\\User', 76),
(3, 'App\\Models\\User', 78),
(3, 'App\\Models\\User', 79),
(3, 'App\\Models\\User', 80),
(3, 'App\\Models\\User', 81),
(3, 'App\\Models\\User', 82),
(3, 'App\\Models\\User', 83),
(3, 'App\\Models\\User', 84),
(3, 'App\\Models\\User', 86),
(3, 'App\\Models\\User', 87),
(5, 'App\\Models\\User', 87),
(3, 'App\\Models\\User', 88),
(3, 'App\\Models\\User', 89),
(3, 'App\\Models\\User', 91),
(3, 'App\\Models\\User', 92),
(3, 'App\\Models\\User', 93),
(3, 'App\\Models\\User', 94),
(3, 'App\\Models\\User', 96),
(3, 'App\\Models\\User', 97),
(3, 'App\\Models\\User', 98),
(3, 'App\\Models\\User', 100),
(3, 'App\\Models\\User', 101),
(3, 'App\\Models\\User', 102),
(3, 'App\\Models\\User', 103),
(3, 'App\\Models\\User', 104),
(3, 'App\\Models\\User', 105),
(3, 'App\\Models\\User', 106),
(3, 'App\\Models\\User', 107),
(3, 'App\\Models\\User', 108),
(3, 'App\\Models\\User', 109),
(3, 'App\\Models\\User', 110),
(3, 'App\\Models\\User', 111),
(3, 'App\\Models\\User', 112),
(3, 'App\\Models\\User', 113),
(3, 'App\\Models\\User', 114),
(3, 'App\\Models\\User', 115),
(3, 'App\\Models\\User', 116),
(3, 'App\\Models\\User', 117),
(3, 'App\\Models\\User', 118),
(3, 'App\\Models\\User', 119),
(3, 'App\\Models\\User', 120),
(3, 'App\\Models\\User', 121),
(3, 'App\\Models\\User', 122),
(3, 'App\\Models\\User', 123);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `year` int(11) DEFAULT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trailer` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `number_of_video_ads` int(11) DEFAULT '1',
  `adult` tinyint(4) NOT NULL DEFAULT '1',
  `top_scroll` tinyint(4) NOT NULL DEFAULT '0',
  `new_release` tinyint(4) NOT NULL DEFAULT '0',
  `upcoming` tinyint(4) NOT NULL DEFAULT '0',
  `movie_file_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'local',
  `movie_link` text COLLATE utf8mb4_unicode_ci,
  `date_sort` datetime NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `year`, `duration`, `access`, `trailer`, `status`, `number_of_video_ads`, `adult`, `top_scroll`, `new_release`, `upcoming`, `movie_file_type`, `movie_link`, `date_sort`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Bonded', 'Bonded A Concept Film about what happens to the world after the COVID-19 Pandemic\r\n\r\nStarring: Day\'Quann Ervin, Cordney McClain, Robyn Carter & Jason Fitch\r\nWritten & Directed By: Dekoven Riggins Sr. & Marcus E. Brown\r\n\r\nNOTIS STUDIOS\r\nAn Oklahoma City Based Film Studio.', 2021, '7 min', 'paid', 'https://www.youtube.com/watch?v=CajjdeGk0CY', 1, NULL, 1, 1, 1, 1, 'link', 'Bonded_Concept_Film_2021_1080p.mp4', '2023-01-15 17:30:00', 1, '2023-01-16 06:30:50', '2023-04-20 22:59:09'),
(4, 'Reversal', 'In 2022, racism is still alive and well but not how you think. Come with us as we look into the lives of white and black Americans; and the way the world would look  with Black Americans in the driver\'s seat for all of American history.', 2022, '28m 05s', 'paid', 'https://www.youtube.com/watch?v=j3MlOkbXdb0', 1, NULL, 1, 1, 1, 1, 'link', 'Reversal_Stereo.mp4', '2023-01-21 19:53:00', 1, '2023-01-22 08:55:38', '2023-04-20 23:05:00'),
(5, 'Black Wall Street Burning Directors Cut', 'What Happens When Racism Fuels A Small Misunderstanding?\r\nNotis Studios Presents: Black Wall Street Burning\r\nStarring - Day\'Quann Ervin, Cordney McClain, Mitch Yoder, Adam Modisette, & Robyn Carter\r\nWritten By: Dekoven Riggins, Directed By: Dekoven Riggins & Marcus E. Brown', 2022, '1 hour 42 min', 'paid', 'https://www.youtube.com/watch?v=EZ79rkOAljI', 1, NULL, 1, 1, 1, 1, 'link', 'BlackWallStreetBurningDC.mp4', '2023-04-15 01:00:00', 1, '2023-04-15 14:41:47', '2023-04-20 22:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'gumbyyT5AmD8Sw3n8etoeS2G8dNkND0K9I3lFnoR', NULL, 'http://localhost', 1, 0, 0, '2023-02-07 06:23:58', '2023-02-07 06:23:58'),
(2, NULL, 'Laravel Password Grant Client', 'et5zWviXlPQdZs5JvCuxU6E2hoHjRaGhRDsQ4lAU', 'users', 'http://localhost', 0, 1, 0, '2023-02-07 06:23:58', '2023-02-07 06:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-02-07 06:23:58', '2023-02-07 06:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `equipment_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'add_role', 'web', NULL, NULL),
(2, 'edit_role', 'web', NULL, NULL),
(3, 'view_roles', 'web', NULL, NULL),
(4, 'delete_role', 'web', NULL, NULL),
(5, 'assign_permissions_to_roles', 'web', NULL, NULL),
(6, 'view_permissions', 'web', NULL, NULL),
(7, 'add_permission', 'web', NULL, NULL),
(8, 'edit_permission', 'web', NULL, NULL),
(9, 'delete_permission', 'web', NULL, NULL),
(10, 'view_users', 'web', NULL, NULL),
(11, 'user_update', 'web', NULL, NULL),
(12, 'user_delete', 'web', NULL, NULL),
(13, 'assign_role_to_user', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 28, 'MyLaravelApp', 'c0398c420c753cad1ef51573b397e9badff49599884e0077b7d526309c5113ec', '[\"*\"]', NULL, '2023-02-15 23:22:14', '2023-02-15 23:22:14'),
(2, 'App\\Models\\User', 37, 'MyLaravelApp', 'ab261f12ca0dc6c04d853f3e0320449e0fa3b7bff1b49c97342325c8804f4a83', '[\"*\"]', NULL, '2023-02-15 23:36:14', '2023-02-15 23:36:14'),
(3, 'App\\Models\\User', 37, 'MyLaravelApp', 'cfa0b74431bd7a04e436da90a0ca8e3a7cc7db96a9be1f686fbf55d30f9bf429', '[\"*\"]', NULL, '2023-02-15 23:36:46', '2023-02-15 23:36:46'),
(4, 'App\\Models\\User', 37, 'MyLaravelApp', '1a625eebd7cccd4f1cc234a976d7b61404dd5866b8ed904a88a16947d4967ee4', '[\"*\"]', NULL, '2023-02-15 23:58:43', '2023-02-15 23:58:43'),
(5, 'App\\Models\\User', 37, 'MyLaravelApp', 'b061243af2e22b2b75b134e12b48a50d3047fd05e79bb55cce5e950a29e498af', '[\"*\"]', NULL, '2023-02-15 23:59:12', '2023-02-15 23:59:12'),
(6, 'App\\Models\\User', 37, 'MyLaravelApp', '17e176be0fcaaf2c9f7f178146a3a3fec78a72d2a80d8352e2332fbfa8d321bb', '[\"*\"]', NULL, '2023-02-16 00:00:07', '2023-02-16 00:00:07'),
(7, 'App\\Models\\User', 37, 'MyLaravelApp', 'f32f2b7b318ade738441d9de1e18687054f8084680273ce57501ba4120e65c90', '[\"*\"]', NULL, '2023-02-16 00:01:34', '2023-02-16 00:01:34'),
(8, 'App\\Models\\User', 37, 'MyLaravelApp', '5f187be84d660271365e99809566e595d0469b5a9850bc17308e3aa68d0f49e3', '[\"*\"]', NULL, '2023-02-16 00:02:30', '2023-02-16 00:02:30'),
(9, 'App\\Models\\User', 37, 'MyLaravelApp', 'ac68242632364a5ac85e70ec0879f5e1cd5dd06b071450352f64e04c476b41e1', '[\"*\"]', NULL, '2023-02-16 00:11:22', '2023-02-16 00:11:22'),
(10, 'App\\Models\\User', 11, 'MyLaravelApp', '235e8078c8bced2f2f87621f85a6407b96f4b132cbe5019a1bf6c922fc4fdc24', '[\"*\"]', NULL, '2023-02-16 01:24:26', '2023-02-16 01:24:26'),
(11, 'App\\Models\\User', 11, 'MyLaravelApp', '44ab6bffe721076a7b02ad18cc44719e56fa12455414721a3a8cdc4db2110f50', '[\"*\"]', NULL, '2023-02-16 02:37:14', '2023-02-16 02:37:14'),
(12, 'App\\Models\\User', 11, 'MyLaravelApp', 'af3fc8ec1286a0551575ccc11bca1c9079d3317c14e319c50afbf9b536aa20e0', '[\"*\"]', NULL, '2023-02-16 02:45:14', '2023-02-16 02:45:14'),
(13, 'App\\Models\\User', 11, 'MyLaravelApp', '945f0fa99111952982ce91028dac6264bc14fdd59c5b16d1f8b1a61a275f646b', '[\"*\"]', NULL, '2023-02-16 21:02:46', '2023-02-16 21:02:46'),
(14, 'App\\Models\\User', 11, 'MyLaravelApp', '69e19580579847a2c64a5ef5df77f64c141e3853fdc6a39c2992d10f7507cda8', '[\"*\"]', NULL, '2023-02-16 21:08:25', '2023-02-16 21:08:25'),
(15, 'App\\Models\\User', 11, 'MyLaravelApp', 'edc0dbf11ffec574d9593b3c1b530424aae00e5cdad2dc9f0adaf37599df5a06', '[\"*\"]', NULL, '2023-03-12 02:24:49', '2023-03-12 02:24:49'),
(16, 'App\\Models\\User', 11, 'MyLaravelApp', '9449ce4b4984806f8fc961005cb5c89d2999c198a419e48c951c55b8b0bcb113', '[\"*\"]', NULL, '2023-03-12 03:07:59', '2023-03-12 03:07:59'),
(17, 'App\\Models\\User', 11, 'MyLaravelApp', 'fa42e2f7d2be890ab150917db8bea2b9e5bf4dfe1bc054dad3400d544580ee89', '[\"*\"]', NULL, '2023-03-12 03:08:49', '2023-03-12 03:08:49'),
(18, 'App\\Models\\User', 11, 'MyLaravelApp', '13e3dd7d06432d1d43e121ab30495a2e1da1490f0b4e90895c2b82637dc5a4e9', '[\"*\"]', NULL, '2023-03-12 03:12:50', '2023-03-12 03:12:50'),
(19, 'App\\Models\\User', 11, 'MyLaravelApp', 'eff724c5308904a15af1accdba9e4c4b26dc648f08d756e95706f577f423977b', '[\"*\"]', NULL, '2023-03-12 03:14:18', '2023-03-12 03:14:18'),
(20, 'App\\Models\\User', 11, 'MyLaravelApp', '2a77f03ac53aecc8aea43c9c0413a6a5f65d78d70c98ea462579f94e071d9580', '[\"*\"]', NULL, '2023-03-12 03:14:54', '2023-03-12 03:14:54'),
(21, 'App\\Models\\User', 11, 'MyLaravelApp', '386d765ded5043fad7c6caa4e2bf0b4963e515607a33cfcc52ee273321294e18', '[\"*\"]', NULL, '2023-03-12 03:16:37', '2023-03-12 03:16:37'),
(22, 'App\\Models\\User', 11, 'MyLaravelApp', '5b304b1a2fe28e6d9feff0a9582d4b2ad9ed58cca9d702fd0421148721d1a1c0', '[\"*\"]', NULL, '2023-03-12 03:17:41', '2023-03-12 03:17:41'),
(23, 'App\\Models\\User', 11, 'MyLaravelApp', '9b5a7adf4f95313dd93865ac2d622e893c99b31dc476877a7abe3d60f4d0adf6', '[\"*\"]', NULL, '2023-03-12 03:19:02', '2023-03-12 03:19:02'),
(24, 'App\\Models\\User', 11, 'MyLaravelApp', 'b2b0a85603d9293c7b5b6c23ce3a831ceb66d071cf077ff826843ee83410ae7d', '[\"*\"]', NULL, '2023-03-12 03:20:13', '2023-03-12 03:20:13'),
(25, 'App\\Models\\User', 11, 'MyLaravelApp', 'a8480f44329e77df6679df22d7f68e9cc3d5523967a092682eabc8841a5c7000', '[\"*\"]', NULL, '2023-03-12 03:22:50', '2023-03-12 03:22:50'),
(26, 'App\\Models\\User', 11, 'MyLaravelApp', 'ab99efe6e1325bcf3f12289356895c0ce2f08d7299967175375bdf790af55240', '[\"*\"]', NULL, '2023-03-12 03:22:59', '2023-03-12 03:22:59'),
(27, 'App\\Models\\User', 11, 'MyLaravelApp', '4bbe9864911ffc6e4023b04c5a5c606d6eef3057cdf16f4dd788992f3ce827de', '[\"*\"]', NULL, '2023-03-12 03:37:03', '2023-03-12 03:37:03'),
(28, 'App\\Models\\User', 11, 'MyLaravelApp', '30f59904b1098ba470ef748fe2d948fe6e6dda2316022f34526e47211e84dc74', '[\"*\"]', NULL, '2023-03-12 03:38:02', '2023-03-12 03:38:02'),
(29, 'App\\Models\\User', 11, 'MyLaravelApp', '9823110a0aa49c7a219be4e8f3a7155a818db0f8c74c20dd6777825fd6f2f2de', '[\"*\"]', NULL, '2023-03-12 03:38:56', '2023-03-12 03:38:56'),
(30, 'App\\Models\\User', 11, 'MyLaravelApp', 'cda6c3a6f9f1690a7a105bfde4f891c121808058161528891ecb0aa5d521700b', '[\"*\"]', NULL, '2023-03-12 03:39:39', '2023-03-12 03:39:39'),
(31, 'App\\Models\\User', 11, 'MyLaravelApp', 'a3224ee818a27b98b81b6d72fc49d838018309efcb242478e8ac588e172c5668', '[\"*\"]', NULL, '2023-03-15 19:48:04', '2023-03-15 19:48:04'),
(32, 'App\\Models\\User', 11, 'MyLaravelApp', '37bc3e10ea2a004146c754bb429375c7817efa5e276df2d08677afd8d00e27e0', '[\"*\"]', NULL, '2023-03-15 20:09:15', '2023-03-15 20:09:15'),
(33, 'App\\Models\\User', 11, 'MyLaravelApp', 'b09a1b8b8dda7f591397108a196fd48d471564ccb615fc4362295411c20cf63a', '[\"*\"]', NULL, '2023-03-16 22:24:06', '2023-03-16 22:24:06'),
(34, 'App\\Models\\User', 11, 'MyLaravelApp', 'b3d17be93dd39e5ff88f5226cf1e3e79c419918f5dd62c2289bf31ddb85e03ce', '[\"*\"]', NULL, '2023-03-16 22:24:26', '2023-03-16 22:24:26'),
(35, 'App\\Models\\User', 11, 'MyLaravelApp', 'e453facf7d2d6c77b3b21ac28d499a7dabb069e841225be59316aabaa9f13ca1', '[\"*\"]', NULL, '2023-03-16 22:27:45', '2023-03-16 22:27:45'),
(36, 'App\\Models\\User', 11, 'MyLaravelApp', '9fef88ab9434a215e860a31fd82e07d786a96b889783350e746b4e40aa600f08', '[\"*\"]', NULL, '2023-03-17 00:49:49', '2023-03-17 00:49:49'),
(37, 'App\\Models\\User', 11, 'MyLaravelApp', '16fb3a821545afaec5280c1c6e5e850f08a7af58998d2d6845ba8b7b6c5a4b85', '[\"*\"]', NULL, '2023-03-17 00:50:17', '2023-03-17 00:50:17'),
(38, 'App\\Models\\User', 11, 'MyLaravelApp', 'dd72ffb7edd605a6de39c49c434f14a6b1365a0ab25f7cb8b1b430e63ef3b4ea', '[\"*\"]', NULL, '2023-03-17 00:52:03', '2023-03-17 00:52:03'),
(39, 'App\\Models\\User', 11, 'MyLaravelApp', 'f44e7a5111bb0f5929a1d86ed92d56e197fc4b40ca2fb7c16fd3ae594765083b', '[\"*\"]', NULL, '2023-03-17 00:53:03', '2023-03-17 00:53:03'),
(40, 'App\\Models\\User', 11, 'MyLaravelApp', '2a6aad685eaffc63eb97a8e4fe831254a4ff5324deb065a3b7e41d256f5737c3', '[\"*\"]', NULL, '2023-03-17 00:53:33', '2023-03-17 00:53:33'),
(41, 'App\\Models\\User', 11, 'MyLaravelApp', 'a5ec03f0a56d3191431c8b41a0802cf902869ccbab107cb9e5a8ee460446aa6d', '[\"*\"]', NULL, '2023-03-17 00:56:03', '2023-03-17 00:56:03'),
(42, 'App\\Models\\User', 11, 'MyLaravelApp', 'b189cce8f308954e986ae0cb41ee762ea0bfaab36ff6d3767afec0f7d80e7977', '[\"*\"]', NULL, '2023-03-17 00:58:52', '2023-03-17 00:58:52'),
(43, 'App\\Models\\User', 11, 'MyLaravelApp', '1369fde8336670eff86e79048554afcd6a45a413bb9c844a080311bdc16433e8', '[\"*\"]', NULL, '2023-03-17 01:01:11', '2023-03-17 01:01:11'),
(44, 'App\\Models\\User', 11, 'MyLaravelApp', 'cadff7710860dab753b979fb13799491d1cd18af21fe6b44b9e43e1ed9336695', '[\"*\"]', NULL, '2023-03-17 01:01:48', '2023-03-17 01:01:48'),
(45, 'App\\Models\\User', 11, 'MyLaravelApp', '0fdb86317ffde839d43b18e755305691ef5b799d63857883051384d0e58812a5', '[\"*\"]', NULL, '2023-03-17 01:03:03', '2023-03-17 01:03:03'),
(46, 'App\\Models\\User', 11, 'MyLaravelApp', '88f6aad1fc1eedc9c33e28f23f154ac1ad630c88bfd04f11fd03a7c4cbeca611', '[\"*\"]', NULL, '2023-03-17 01:03:49', '2023-03-17 01:03:49'),
(47, 'App\\Models\\User', 11, 'MyLaravelApp', 'e1be219b9c7e219aca4e15ff2daad7aede8aadec0df49922499700a9ec1a06c6', '[\"*\"]', NULL, '2023-03-17 01:05:44', '2023-03-17 01:05:44'),
(48, 'App\\Models\\User', 11, 'MyLaravelApp', '16c7e7d5f029ec50c9ce3ab87f810aa43f68e3ce3f60bade3ddf4f38b3fd0250', '[\"*\"]', NULL, '2023-03-17 01:06:33', '2023-03-17 01:06:33'),
(49, 'App\\Models\\User', 11, 'MyLaravelApp', '07fde2cfbb317b6face7251a2002f6dded331ddd217a26a50aecef0a0733b2ac', '[\"*\"]', NULL, '2023-03-17 01:22:49', '2023-03-17 01:22:49'),
(50, 'App\\Models\\User', 11, 'MyLaravelApp', '37656308a09ff5a69e7f2f9f6cafe0245c9f8b6baa618d4ba4258c947409d6fd', '[\"*\"]', NULL, '2023-03-17 01:33:07', '2023-03-17 01:33:07'),
(51, 'App\\Models\\User', 11, 'MyLaravelApp', 'f2a3e605288ee8504cd263f439f0ff1d576110e310ad2c9eabcf51bfc19126e9', '[\"*\"]', NULL, '2023-03-17 01:34:05', '2023-03-17 01:34:05'),
(52, 'App\\Models\\User', 11, 'MyLaravelApp', 'a1f4faab078dd22d93c56f7f2fe8427b5a5aec8d25122a3b146e278605d30c7f', '[\"*\"]', NULL, '2023-03-17 01:42:55', '2023-03-17 01:42:55'),
(53, 'App\\Models\\User', 11, 'MyLaravelApp', 'f55d2ca576b7a3397c18a6472367be9057d86db5d3c6ef139441824adc54a49a', '[\"*\"]', NULL, '2023-03-17 01:43:55', '2023-03-17 01:43:55'),
(54, 'App\\Models\\User', 11, 'MyLaravelApp', 'cd5250f1f07b8174eb01cf4f4992c6e2d007e3c3ed16420f7b6fe3688b62404e', '[\"*\"]', NULL, '2023-03-17 01:45:24', '2023-03-17 01:45:24'),
(55, 'App\\Models\\User', 11, 'MyLaravelApp', '719e48889b15c7fd40a70ba35d4bdc91c107b64703597678c8599c07b1f2ff2b', '[\"*\"]', NULL, '2023-03-17 01:46:41', '2023-03-17 01:46:41'),
(56, 'App\\Models\\User', 11, 'MyLaravelApp', '94a6a0a6ffc58c86b07352c884dce9f30822490a6514da5d26155bc673e1e54b', '[\"*\"]', NULL, '2023-03-17 01:47:58', '2023-03-17 01:47:58'),
(57, 'App\\Models\\User', 11, 'MyLaravelApp', 'cc2689da22434e7eeb93f39efab22b08c1829db8be1f35aa04c31dc7fdb919c6', '[\"*\"]', NULL, '2023-03-17 01:49:03', '2023-03-17 01:49:03'),
(58, 'App\\Models\\User', 11, 'MyLaravelApp', 'fbfd529654fb98f26d81897319496e4dcd5fc77a7b01ad969a306e95224563c7', '[\"*\"]', NULL, '2023-03-17 01:51:51', '2023-03-17 01:51:51'),
(59, 'App\\Models\\User', 11, 'MyLaravelApp', '45c5a864a8f66023550ab0b399f204a8d59240597158e534e545ae3d1ecc95ea', '[\"*\"]', NULL, '2023-03-17 01:52:56', '2023-03-17 01:52:56'),
(60, 'App\\Models\\User', 11, 'MyLaravelApp', 'f3ffdc0d0f5713c9bbac61e2ea592a582869437fee19f1b318c71d06418a391e', '[\"*\"]', NULL, '2023-03-17 01:54:44', '2023-03-17 01:54:44'),
(61, 'App\\Models\\User', 11, 'MyLaravelApp', '695d238d71ecd5237cce75186256556a275c474027d5709ac39924c9fe9778f1', '[\"*\"]', NULL, '2023-03-17 01:58:46', '2023-03-17 01:58:46'),
(62, 'App\\Models\\User', 11, 'MyLaravelApp', 'd50854fe6123d80c2e6dbe8214ce0c42551c02d3e82ef388e989f285470f5bed', '[\"*\"]', NULL, '2023-03-17 02:01:59', '2023-03-17 02:01:59'),
(63, 'App\\Models\\User', 11, 'MyLaravelApp', 'f5d746d2217ab50dc2c338bb3d41f41c9ae87dc3bd207e731c25d5e3b7bfa0bf', '[\"*\"]', NULL, '2023-03-17 02:04:08', '2023-03-17 02:04:08'),
(64, 'App\\Models\\User', 11, 'MyLaravelApp', 'd8bc92da07258e841765e71ee6c825f1f0f8bb18265e97dd52b423326eedbf9e', '[\"*\"]', NULL, '2023-03-17 02:11:35', '2023-03-17 02:11:35'),
(65, 'App\\Models\\User', 11, 'MyLaravelApp', '905d906b8f1e7f17e3784c11e14c37dd3eec2397919b0123c31cf2d8dfd049b7', '[\"*\"]', NULL, '2023-03-17 02:15:16', '2023-03-17 02:15:16'),
(66, 'App\\Models\\User', 11, 'MyLaravelApp', 'b9c918bad9fbd5da4c1e87bbf3e5af76a5b5becb33dc51f80fabb71339a2171b', '[\"*\"]', NULL, '2023-03-17 02:15:50', '2023-03-17 02:15:50'),
(67, 'App\\Models\\User', 11, 'MyLaravelApp', 'fb0ed64eb33e1e75353a19517af53992dcc61a3fcc3cd7fca99d13dd8a350970', '[\"*\"]', NULL, '2023-03-17 02:18:27', '2023-03-17 02:18:27'),
(68, 'App\\Models\\User', 11, 'MyLaravelApp', 'd2f9db6f6af9f8f05dc4dfb90bf0ae7d7c55d37e6dfe94fec7cbb72d4feb1eff', '[\"*\"]', NULL, '2023-03-17 02:19:10', '2023-03-17 02:19:10'),
(69, 'App\\Models\\User', 11, 'MyLaravelApp', '3eaae8d67e052b539c27072bb0670ce95d6c6c1796b10d1ab3561d7f289f68d6', '[\"*\"]', NULL, '2023-03-17 02:19:49', '2023-03-17 02:19:49'),
(70, 'App\\Models\\User', 11, 'MyLaravelApp', '787caae2d1adfce19969a09d60094ff63bfae76e13c54424dbb5a1a5d2e8b49c', '[\"*\"]', NULL, '2023-03-17 02:21:20', '2023-03-17 02:21:20'),
(71, 'App\\Models\\User', 11, 'MyLaravelApp', '6a53cf948a4a0d6c8653abb2dfa98ccdd5b0f0c16950ffd5d18d78be97ed3d73', '[\"*\"]', NULL, '2023-03-17 02:29:58', '2023-03-17 02:29:58'),
(72, 'App\\Models\\User', 11, 'MyLaravelApp', 'b8a98413d4d2ee76f3e121534aa5efd4a265e20f0f006da7a509712e063ccb44', '[\"*\"]', NULL, '2023-03-17 02:31:18', '2023-03-17 02:31:18'),
(73, 'App\\Models\\User', 11, 'MyLaravelApp', '32d96c2b0e63b47fcb21c367dd7cf0249ebebe922a8cd75d36c7885e56c389d6', '[\"*\"]', NULL, '2023-03-17 02:32:07', '2023-03-17 02:32:07'),
(74, 'App\\Models\\User', 11, 'MyLaravelApp', 'fc53966389f40ae953683a5563eafbbf9da08f0ebdc60562564668643eb0d4ae', '[\"*\"]', NULL, '2023-03-17 02:33:42', '2023-03-17 02:33:42'),
(75, 'App\\Models\\User', 11, 'MyLaravelApp', '5c901c23c28b093f983870f562f405602ec49e9d02326bd6855652cb77c1d95d', '[\"*\"]', NULL, '2023-03-17 02:34:21', '2023-03-17 02:34:21'),
(76, 'App\\Models\\User', 11, 'MyLaravelApp', '6d5393fedcd8535b35b7ab39db83eeffa46a0111b152d9ae77dd7cb52a5cd1c4', '[\"*\"]', NULL, '2023-03-17 02:37:35', '2023-03-17 02:37:35'),
(77, 'App\\Models\\User', 11, 'MyLaravelApp', '385f1e462e0e61d6e746acc49560e69bfbbee88586b96d62bb2340318acc9008', '[\"*\"]', NULL, '2023-03-17 02:38:39', '2023-03-17 02:38:39'),
(78, 'App\\Models\\User', 11, 'MyLaravelApp', 'ae5815ede40de235789f656472dc24e20a73197de0a9661a839a3fa5e9b5c36a', '[\"*\"]', NULL, '2023-03-17 02:41:20', '2023-03-17 02:41:20'),
(79, 'App\\Models\\User', 11, 'MyLaravelApp', '4e814d7081a07a176b4990dfe682866448775bc1e05b7e15c9835ee6447c9619', '[\"*\"]', NULL, '2023-03-17 02:42:25', '2023-03-17 02:42:25'),
(80, 'App\\Models\\User', 11, 'MyLaravelApp', '8fbe23c0816daf57b9740d05285553d61855a06cb3b67dc9321a72a5174358a6', '[\"*\"]', NULL, '2023-03-17 02:43:55', '2023-03-17 02:43:55'),
(81, 'App\\Models\\User', 11, 'MyLaravelApp', 'fb3d1ca6cbd965a35d8f350b3c15358eaac3fa7285deccf1f39ce6d1cc3c92f6', '[\"*\"]', NULL, '2023-03-17 02:46:33', '2023-03-17 02:46:33'),
(82, 'App\\Models\\User', 11, 'MyLaravelApp', '1648ec1cabdbe88c6c058383d45c0db853d0eba3f8aec2023dbcb5b372216301', '[\"*\"]', NULL, '2023-03-17 02:57:19', '2023-03-17 02:57:19'),
(83, 'App\\Models\\User', 11, 'MyLaravelApp', '6b9294e2e748e065d77db87e4bb79686664e67529cb9098127e2746d64c01a68', '[\"*\"]', NULL, '2023-03-17 03:00:15', '2023-03-17 03:00:15'),
(84, 'App\\Models\\User', 11, 'MyLaravelApp', 'd69ad63481faeb256687d1778fdb8cc584960695d014e33bf7e178178d0764ab', '[\"*\"]', NULL, '2023-03-17 03:04:57', '2023-03-17 03:04:57'),
(85, 'App\\Models\\User', 11, 'MyLaravelApp', '2e31dc283613dfd88b9044460bad604790f1df83ccd44cd201ae30e1ba67d0a1', '[\"*\"]', NULL, '2023-03-17 17:54:40', '2023-03-17 17:54:40'),
(86, 'App\\Models\\User', 64, 'MyLaravelApp', 'f1f48f6a432d4268409a6baa8cd393d2bb71c23c351b9297adbfc3ddf29ceb6e', '[\"*\"]', NULL, '2023-03-17 18:53:00', '2023-03-17 18:53:00'),
(87, 'App\\Models\\User', 11, 'MyLaravelApp', '95cf8857467fcf1c3d87117b34631538332de40389e50e8fbd644ed1bfa4ebe5', '[\"*\"]', NULL, '2023-03-17 18:53:24', '2023-03-17 18:53:24'),
(88, 'App\\Models\\User', 65, 'MyLaravelApp', 'f42ec72e6f1685c21c41b4fb149a3304e527a6a43baa9555296418df1e66ee3e', '[\"*\"]', NULL, '2023-03-17 18:54:38', '2023-03-17 18:54:38'),
(89, 'App\\Models\\User', 11, 'MyLaravelApp', '2941a89bc8b0cf245acd3454c0891930b7261f94e5a1fbaeb1f737ef239e6d1a', '[\"*\"]', NULL, '2023-03-17 19:13:01', '2023-03-17 19:13:01'),
(90, 'App\\Models\\User', 11, 'MyLaravelApp', '1ccb3d3276c14d3e8b2a909bf7f200eee26fd93db74208aef31dcc8758f47d59', '[\"*\"]', NULL, '2023-03-17 19:16:52', '2023-03-17 19:16:52'),
(91, 'App\\Models\\User', 11, 'MyLaravelApp', 'd157bb0ed1a4f1dad788f806a8a6f3505e300b3ecbb025be9f17cec51d53de80', '[\"*\"]', NULL, '2023-03-17 19:17:34', '2023-03-17 19:17:34'),
(92, 'App\\Models\\User', 11, 'MyLaravelApp', '3e048bd5f5c63addabf8292d24c7814dfdb412d4d3d444b095a9e3c875cba7da', '[\"*\"]', NULL, '2023-03-17 19:19:17', '2023-03-17 19:19:17'),
(93, 'App\\Models\\User', 11, 'MyLaravelApp', 'ad473441cee9a194413d8f61d05926d86f936f2d553275380e3dbca23034f5fb', '[\"*\"]', NULL, '2023-03-17 19:19:59', '2023-03-17 19:19:59'),
(94, 'App\\Models\\User', 11, 'MyLaravelApp', 'fae33b0fad9f1b75175ced2d1aaa8d1019830b43dc3dfc7278a9462a2b8774b0', '[\"*\"]', NULL, '2023-03-17 19:21:07', '2023-03-17 19:21:07'),
(95, 'App\\Models\\User', 11, 'MyLaravelApp', '0fe90f1fa78a53a4f2b050a8a978cb2e0fc73205b7d1be3deaadc346bdbed151', '[\"*\"]', NULL, '2023-03-17 19:25:00', '2023-03-17 19:25:00'),
(96, 'App\\Models\\User', 11, 'MyLaravelApp', '9575b88fdc76159db68628d701e52ca0b6e60d9ae3d959d89940de1dbf66fd50', '[\"*\"]', NULL, '2023-03-17 20:05:33', '2023-03-17 20:05:33'),
(97, 'App\\Models\\User', 37, 'MyLaravelApp', 'bb6849edf9d268a53e4cfd895ef9c9103251226b8dce7f79a9b3c1e8d94ff406', '[\"*\"]', NULL, '2023-03-17 20:06:28', '2023-03-17 20:06:28'),
(98, 'App\\Models\\User', 37, 'MyLaravelApp', '46e2b35bc56cdd9fcb0e17dfaae28a9600cc7a764ce11656f85752992c27ad6c', '[\"*\"]', NULL, '2023-03-17 20:07:16', '2023-03-17 20:07:16'),
(99, 'App\\Models\\User', 37, 'MyLaravelApp', 'b9d2fe83e90f24cac1f68b00019d637f39b95b912c34446d08f5ddcf1a679358', '[\"*\"]', NULL, '2023-03-17 20:09:26', '2023-03-17 20:09:26'),
(100, 'App\\Models\\User', 37, 'MyLaravelApp', '8cc6247708c7c7f333990ea9f79f1f15ca979386cf92c3d603d55c42e125a943', '[\"*\"]', NULL, '2023-03-17 20:10:40', '2023-03-17 20:10:40'),
(101, 'App\\Models\\User', 37, 'MyLaravelApp', 'a633f70bfe366332c2c2759e1459c22c9c26971cac0d88ea3f5a3720b554dcbe', '[\"*\"]', NULL, '2023-03-17 20:11:20', '2023-03-17 20:11:20'),
(102, 'App\\Models\\User', 37, 'MyLaravelApp', 'eace19e67f31c77dc540445090356c343641487a794ebeec2a02e9f53319840f', '[\"*\"]', NULL, '2023-03-17 20:27:23', '2023-03-17 20:27:23'),
(103, 'App\\Models\\User', 37, 'MyLaravelApp', '5c9fc22c50b3f315828c635d39b24befb173029de2a4ccab408d9e0f99772c8e', '[\"*\"]', NULL, '2023-03-17 20:28:19', '2023-03-17 20:28:19'),
(104, 'App\\Models\\User', 37, 'MyLaravelApp', '00511528aa1ada4b144befb9c30091ae86ebadca7cc9751dac89a606de3e7382', '[\"*\"]', NULL, '2023-03-17 20:28:54', '2023-03-17 20:28:54'),
(105, 'App\\Models\\User', 37, 'MyLaravelApp', 'b890bd91d16bfaac45291b124f2b261e35ed73a961a2a3fad17d85d15b5cf4a1', '[\"*\"]', NULL, '2023-03-17 20:29:44', '2023-03-17 20:29:44'),
(106, 'App\\Models\\User', 37, 'MyLaravelApp', 'b7bc3d9c2a476a73306325e4827b55886e55ac8a0ccedb86fc2e1aa97bec8ac1', '[\"*\"]', NULL, '2023-03-17 20:33:14', '2023-03-17 20:33:14'),
(107, 'App\\Models\\User', 11, 'MyLaravelApp', 'c05c70578b3f5e79a64a36fc8a73e6cb4f2684e9162690fc73faf673e74dab08', '[\"*\"]', NULL, '2023-03-17 20:35:31', '2023-03-17 20:35:31'),
(108, 'App\\Models\\User', 11, 'MyLaravelApp', 'af80416358dba3b86e0e6b89d8797528b6e58727011b8f707de8c3b65e9502d8', '[\"*\"]', NULL, '2023-03-17 20:37:38', '2023-03-17 20:37:38'),
(109, 'App\\Models\\User', 11, 'MyLaravelApp', '64d7b9e435b7d95f2ad0f89acee689dd951d0f42aee63f57dc83a221d5c2190a', '[\"*\"]', NULL, '2023-03-17 20:38:08', '2023-03-17 20:38:08'),
(110, 'App\\Models\\User', 11, 'MyLaravelApp', 'ddaa35c66925ead71d82241f54063bc2cb3ee5e4c9a295711a8ebe35e9d8db4b', '[\"*\"]', NULL, '2023-03-17 20:38:49', '2023-03-17 20:38:49'),
(111, 'App\\Models\\User', 11, 'MyLaravelApp', '6ef052b60eaec24b17677a4c4d72f7bd898387eec205f9746e855e8c1be353ae', '[\"*\"]', NULL, '2023-03-17 20:39:44', '2023-03-17 20:39:44'),
(112, 'App\\Models\\User', 11, 'MyLaravelApp', '74709bc1a79d34c54f13716d912f7c1f92c1842ea07983b9c267c5c88a4d863f', '[\"*\"]', NULL, '2023-03-17 20:40:20', '2023-03-17 20:40:20'),
(113, 'App\\Models\\User', 11, 'MyLaravelApp', '5c08a2d58fc91f785074da4a20190512c583f29243543f3a66e8c2e3daa6a0fd', '[\"*\"]', NULL, '2023-03-17 20:41:49', '2023-03-17 20:41:49'),
(114, 'App\\Models\\User', 11, 'MyLaravelApp', 'a656b20ff0bf5fa17c5c97eb75205aca98eef580d64200898f1febda12314645', '[\"*\"]', NULL, '2023-03-17 20:43:07', '2023-03-17 20:43:07'),
(115, 'App\\Models\\User', 11, 'MyLaravelApp', '8394a07e6eced814f300b573f6319d1499981b0dbfd320785f4eb7abd3929bad', '[\"*\"]', NULL, '2023-03-17 20:43:44', '2023-03-17 20:43:44'),
(116, 'App\\Models\\User', 11, 'MyLaravelApp', '0620e8ca8792b4354df5172718895cae1d4e19024103dcf89ac57287726fc389', '[\"*\"]', NULL, '2023-03-17 21:09:53', '2023-03-17 21:09:53'),
(117, 'App\\Models\\User', 37, 'MyLaravelApp', 'c88ac22afd6b66ca3bfe0b7d5f9501ed08e6abd62876cc88ab9946c05e1f4df2', '[\"*\"]', NULL, '2023-03-17 21:29:52', '2023-03-17 21:29:52'),
(118, 'App\\Models\\User', 37, 'MyLaravelApp', 'e0f1c1b06446ec2dde41ae6c1248c518c87e05d885491a7aab681fa20b34e4c3', '[\"*\"]', NULL, '2023-03-17 21:38:49', '2023-03-17 21:38:49'),
(119, 'App\\Models\\User', 37, 'MyLaravelApp', '8a1c6f4b6570a3ce38dc7e40fdab045932f4ef68f557abf0f62df99e0cce885d', '[\"*\"]', NULL, '2023-03-17 21:39:36', '2023-03-17 21:39:36'),
(120, 'App\\Models\\User', 37, 'MyLaravelApp', 'fe1eb5b3a172d6772087926ab4d09936516326a6e0f7333cc38f4a11c7826a68', '[\"*\"]', NULL, '2023-03-17 21:39:50', '2023-03-17 21:39:50'),
(121, 'App\\Models\\User', 37, 'MyLaravelApp', '9fad5289a9f53c80a6fcd3ccae23ce4fe5bfa4510395c442f596d69c5f988cde', '[\"*\"]', NULL, '2023-03-17 21:40:21', '2023-03-17 21:40:21'),
(122, 'App\\Models\\User', 11, 'MyLaravelApp', 'f0d8bf925acb60e37900d65e5acd8de51fc36804123dad8b07d579d9d7adb309', '[\"*\"]', NULL, '2023-03-17 21:42:49', '2023-03-17 21:42:49'),
(123, 'App\\Models\\User', 11, 'MyLaravelApp', 'ef800fa42c07984645de7533ed129eb1f71420878221e240a391eea293b5e02b', '[\"*\"]', NULL, '2023-03-17 21:43:05', '2023-03-17 21:43:05'),
(124, 'App\\Models\\User', 11, 'MyLaravelApp', '77ad4b087af93cb643826984be2a9c904a8327d8c181732adb3675ae8089c8b4', '[\"*\"]', NULL, '2023-03-17 21:47:54', '2023-03-17 21:47:54'),
(125, 'App\\Models\\User', 11, 'MyLaravelApp', '98ae69f5af4643d13ce0483f057deb72546699169283227fbccd880420d57c71', '[\"*\"]', NULL, '2023-03-17 22:10:32', '2023-03-17 22:10:32'),
(126, 'App\\Models\\User', 11, 'MyLaravelApp', 'a749b19cc69ee6cdc6fa0dae091ffec39d66ff108d0cb2e718bf87f73ba28d18', '[\"*\"]', NULL, '2023-03-17 22:10:48', '2023-03-17 22:10:48'),
(127, 'App\\Models\\User', 11, 'MyLaravelApp', '97c486ed4cf42f9993ce75e5c394609bf6fdfd1c2675be063eafb5a67ba9933f', '[\"*\"]', NULL, '2023-03-17 22:19:14', '2023-03-17 22:19:14'),
(128, 'App\\Models\\User', 11, 'MyLaravelApp', 'dbe5a08bf62cba95ab1d511df612bead1297af867c45e0d1e8cf84dc920dd5df', '[\"*\"]', NULL, '2023-03-17 22:19:33', '2023-03-17 22:19:33'),
(129, 'App\\Models\\User', 37, 'MyLaravelApp', '19d56a16dd6800820b5c4891603ddddfe4bb5c9f41cec01392100232003b5a0a', '[\"*\"]', NULL, '2023-03-17 22:20:57', '2023-03-17 22:20:57'),
(130, 'App\\Models\\User', 11, 'MyLaravelApp', '53dd9d49b6b91c80993c7232e6a9db9b701683f1c61370f03d84c435a24e86ae', '[\"*\"]', NULL, '2023-03-17 22:22:14', '2023-03-17 22:22:14'),
(131, 'App\\Models\\User', 11, 'MyLaravelApp', '8c36ecde74fbdfcec32401010930ec6ef3d8e956e53a97f0eb0a4817b182f92d', '[\"*\"]', NULL, '2023-03-18 01:59:46', '2023-03-18 01:59:46'),
(132, 'App\\Models\\User', 11, 'MyLaravelApp', 'd44386f09270358d40fcb8495431a62a23ce3402a964485b5de4f56091e58f4d', '[\"*\"]', NULL, '2023-03-18 14:41:07', '2023-03-18 14:41:07'),
(133, 'App\\Models\\User', 66, 'MyLaravelApp', 'e92b1f72b75be3ae9642be291a3d32a64cee606feb0724b6f1f798afbcdcf6e1', '[\"*\"]', NULL, '2023-03-18 14:59:02', '2023-03-18 14:59:02'),
(134, 'App\\Models\\User', 66, 'MyLaravelApp', '6130f70d6fd731c12bac7ce2a561787bbefe314015d90602707af6e3694a431b', '[\"*\"]', NULL, '2023-03-18 15:01:47', '2023-03-18 15:01:47'),
(135, 'App\\Models\\User', 66, 'MyLaravelApp', 'e32bd865a671c77ca2b8b4712659a67d46333d4ff6ecf3706cfbcaa72fb66aa7', '[\"*\"]', NULL, '2023-03-18 15:01:56', '2023-03-18 15:01:56'),
(136, 'App\\Models\\User', 66, 'MyLaravelApp', '895e6538e3d9d3faec41ca4926f4b315bf3c8c042aca4e12a66d4a54e6883cd8', '[\"*\"]', NULL, '2023-03-18 15:02:21', '2023-03-18 15:02:21'),
(137, 'App\\Models\\User', 66, 'MyLaravelApp', 'e1a5d1dc3e5a94aa0143c02bdd4368ae1c910554bf23ede545fb5aba2251ad90', '[\"*\"]', NULL, '2023-03-18 15:04:53', '2023-03-18 15:04:53'),
(138, 'App\\Models\\User', 11, 'MyLaravelApp', 'f85468f8b17ad850546605b12c7abd6709e00306a76821c98773ffe1d7b398ed', '[\"*\"]', NULL, '2023-03-18 16:02:26', '2023-03-18 16:02:26'),
(139, 'App\\Models\\User', 11, 'MyLaravelApp', 'af4a4582724c6ff3e7c5aa463c841eb5665fe7875507a386fd85f6aa888f8c22', '[\"*\"]', NULL, '2023-03-18 16:56:25', '2023-03-18 16:56:25'),
(140, 'App\\Models\\User', 66, 'MyLaravelApp', 'eb92f244e44f6d5affff8414852800fd331ae9e9b5a2656ad294d96e0f4c29e7', '[\"*\"]', NULL, '2023-03-18 17:13:38', '2023-03-18 17:13:38'),
(141, 'App\\Models\\User', 11, 'MyLaravelApp', 'c0930c3d0e2722155f50821d2d71a4da8f64e5dac54c18e31860a70b278b1cf8', '[\"*\"]', NULL, '2023-03-18 20:43:17', '2023-03-18 20:43:17'),
(142, 'App\\Models\\User', 67, 'MyLaravelApp', 'a4c44b5e1cc5d2ee1a11a45541d64ce694cdfda451b1391e33875365b967a830', '[\"*\"]', NULL, '2023-03-18 20:59:55', '2023-03-18 20:59:55'),
(143, 'App\\Models\\User', 11, 'MyLaravelApp', '02d48e242b4ea1d82ce5aac64fdfe9b26471fe8ac69dacced4b260ad95aa724b', '[\"*\"]', NULL, '2023-03-18 21:10:16', '2023-03-18 21:10:16'),
(144, 'App\\Models\\User', 11, 'MyLaravelApp', 'b4ee523bf666fa924629c11c5a70a0c9b88c464b9d1e17a5097345bdaebba9db', '[\"*\"]', NULL, '2023-03-18 21:28:28', '2023-03-18 21:28:28'),
(145, 'App\\Models\\User', 11, 'MyLaravelApp', '818b8dfb18fd9e59f5e47beca846e1487b89f92a70701ed2ef4188c615a18efb', '[\"*\"]', NULL, '2023-03-18 21:47:36', '2023-03-18 21:47:36'),
(146, 'App\\Models\\User', 11, 'MyLaravelApp', '2fa0ea27b67e9b74282be27e8f1b6f63e926fabc0e7113ed2b78d87090fbf65f', '[\"*\"]', NULL, '2023-03-18 21:56:20', '2023-03-18 21:56:20'),
(147, 'App\\Models\\User', 11, 'MyLaravelApp', '399a257aa31fcd5c947d494cd91f91ce5de4b12ce3d856573e436c4ca9178111', '[\"*\"]', NULL, '2023-03-19 02:04:00', '2023-03-19 02:04:00'),
(148, 'App\\Models\\User', 11, 'MyLaravelApp', 'c9ff5d7cd8d01d2c36f40e090255a421079d541dff20c76e8b7c85d5b601e037', '[\"*\"]', NULL, '2023-03-19 02:04:29', '2023-03-19 02:04:29'),
(149, 'App\\Models\\User', 67, 'MyLaravelApp', 'c66b8cc6759c5c2c8ef51b99759801f6ccabb2c75c7ffb6c8ec87a9b36278c8a', '[\"*\"]', NULL, '2023-03-19 03:02:31', '2023-03-19 03:02:31'),
(150, 'App\\Models\\User', 68, 'MyLaravelApp', 'd68ab9378f0a0aecad538ca513366d45cd7f490ddf6af3a8dbf78b54724fe106', '[\"*\"]', NULL, '2023-03-19 03:05:15', '2023-03-19 03:05:15'),
(151, 'App\\Models\\User', 68, 'MyLaravelApp', 'ee6f2fceef550626c44714a9a01b6743038583086d3a7591b0d7fec64ce0d2bc', '[\"*\"]', NULL, '2023-03-19 03:06:01', '2023-03-19 03:06:01'),
(152, 'App\\Models\\User', 69, 'MyLaravelApp', 'cdd63fbc1af713bec502ade8664bcfb051be64e6c9a9e474346f48bb5c8cb659', '[\"*\"]', NULL, '2023-03-19 03:29:21', '2023-03-19 03:29:21'),
(153, 'App\\Models\\User', 70, 'MyLaravelApp', 'bf6b38c03204ef6e64a114809d3f73a4c3ff272e9cc9140b8d092156eb11f38e', '[\"*\"]', NULL, '2023-03-19 03:37:31', '2023-03-19 03:37:31'),
(154, 'App\\Models\\User', 71, 'MyLaravelApp', '5475ae2588a3238afd265aede2bd43eea0a7b477c7a8748cf88c31bc78c3181d', '[\"*\"]', NULL, '2023-03-19 03:41:05', '2023-03-19 03:41:05'),
(155, 'App\\Models\\User', 71, 'MyLaravelApp', 'ba8e489ed89eb5d20cc46c44b34b6921379cea05750f8b4a2106efc90edb7ae8', '[\"*\"]', NULL, '2023-03-19 03:41:12', '2023-03-19 03:41:12'),
(156, 'App\\Models\\User', 70, 'MyLaravelApp', '5231a6407880eb3c2a567ea585074ff41c60a77025774d3d95c26c0a956635d2', '[\"*\"]', NULL, '2023-03-19 04:01:02', '2023-03-19 04:01:02'),
(157, 'App\\Models\\User', 70, 'MyLaravelApp', 'b1eb5beb12388582c0a00079bdb4d4c0a4c56dde6874fbe742b6877284f7cb78', '[\"*\"]', NULL, '2023-03-19 04:01:55', '2023-03-19 04:01:55'),
(158, 'App\\Models\\User', 72, 'MyLaravelApp', '7f50d15f60c796000f0ed46408e07c49525dba8888e3e470ccf820cd919f4bd9', '[\"*\"]', NULL, '2023-03-19 04:05:22', '2023-03-19 04:05:22'),
(159, 'App\\Models\\User', 72, 'MyLaravelApp', 'b1353cd30f3259c0b2819caf957a4c3d71cc3e13f7bb095eacbc7646325627ed', '[\"*\"]', NULL, '2023-03-19 04:05:41', '2023-03-19 04:05:41'),
(160, 'App\\Models\\User', 42, 'MyLaravelApp', 'a6c3158f3e3bb2df9be238bbdbd70b43809db8dffd739afd42f0503b768d6a3a', '[\"*\"]', NULL, '2023-03-19 10:11:34', '2023-03-19 10:11:34'),
(161, 'App\\Models\\User', 42, 'MyLaravelApp', 'ece056efe66351520041ed41c861d0a09feba72eba57d041b18029d80a2c5c5f', '[\"*\"]', NULL, '2023-03-19 12:33:07', '2023-03-19 12:33:07'),
(162, 'App\\Models\\User', 73, 'MyLaravelApp', '630148962546151cbabd1a6084de63cb4b3d02f6b1f499e029eb93ab3019b88c', '[\"*\"]', NULL, '2023-03-19 15:58:04', '2023-03-19 15:58:04'),
(163, 'App\\Models\\User', 74, 'MyLaravelApp', '529e06a94accc655e2b67ca31f71227263dd33213711715ed6a68d83fa0d0427', '[\"*\"]', NULL, '2023-03-19 22:39:19', '2023-03-19 22:39:19'),
(164, 'App\\Models\\User', 66, 'MyLaravelApp', '53762db0c7baabbdceb606b8b04182c8de2689f49ed639ec7289a8a96034e535', '[\"*\"]', NULL, '2023-03-19 22:50:05', '2023-03-19 22:50:05'),
(165, 'App\\Models\\User', 37, 'MyLaravelApp', '926932544464537977e9d2561bbff394e4f098a017ea12a7b9c728df547dbe90', '[\"*\"]', NULL, '2023-03-20 17:43:26', '2023-03-20 17:43:26'),
(166, 'App\\Models\\User', 37, 'MyLaravelApp', 'eda45339baf4754edf808c22246266cfc9f8e63666cf28dd17212f8ebffdcf7f', '[\"*\"]', NULL, '2023-03-21 01:07:53', '2023-03-21 01:07:53'),
(167, 'App\\Models\\User', 42, 'MyLaravelApp', '54d6a6d8f04e5f39e6ee66d7ad8cee8fb17ab9ce3bcc680e867590ba64316fc6', '[\"*\"]', NULL, '2023-03-21 04:51:53', '2023-03-21 04:51:53'),
(168, 'App\\Models\\User', 11, 'MyLaravelApp', '3d40ef6b1c85732dd5ab5fb1de9ae4953d209828ddcbe542741a3c8bfbeff07e', '[\"*\"]', NULL, '2023-03-21 23:52:45', '2023-03-21 23:52:45'),
(169, 'App\\Models\\User', 66, 'MyLaravelApp', 'ce6cb536668c7eb4567c620177e5b119ebe3d69c473ecc4f160af791185478bf', '[\"*\"]', NULL, '2023-03-22 11:11:27', '2023-03-22 11:11:27'),
(170, 'App\\Models\\User', 66, 'MyLaravelApp', '0548ec3a2607a50f81652370a34eb8fb2cd1ca25003f9ccbbae4a6901a0c9066', '[\"*\"]', NULL, '2023-03-22 11:13:26', '2023-03-22 11:13:26'),
(171, 'App\\Models\\User', 66, 'MyLaravelApp', 'e4ff7339f19a1e4887163ee3446d95c8a35e403aefad7ae07f682bb64d0a3de3', '[\"*\"]', NULL, '2023-03-22 11:21:54', '2023-03-22 11:21:54'),
(172, 'App\\Models\\User', 66, 'MyLaravelApp', 'd053f515b6bdb21ed23c1295e2f6a491bd95cedeff1d6128fac005a4c365ccd1', '[\"*\"]', NULL, '2023-03-22 11:23:15', '2023-03-22 11:23:15'),
(173, 'App\\Models\\User', 37, 'MyLaravelApp', 'cccb33619962d7196410f2a0dcfa6b6ca72c32d8645833edd0d656a7ada0c841', '[\"*\"]', NULL, '2023-03-22 15:14:21', '2023-03-22 15:14:21'),
(174, 'App\\Models\\User', 37, 'MyLaravelApp', '1f1cffcd84529e31070ce7c7cbc177ca27d479ebb4bc557e0674dd79817e649c', '[\"*\"]', NULL, '2023-03-23 00:13:54', '2023-03-23 00:13:54'),
(175, 'App\\Models\\User', 37, 'MyLaravelApp', '0aa90a55bf40c07269c1df92b9b0a77123227f9cc3d1c4e44ebc3fa73f01ad33', '[\"*\"]', NULL, '2023-03-23 00:38:08', '2023-03-23 00:38:08'),
(176, 'App\\Models\\User', 42, 'MyLaravelApp', 'f02ae4364147f3a2f0683685217dbce6dda1b034d66aebe222c7a012c0c5617e', '[\"*\"]', NULL, '2023-03-23 07:43:55', '2023-03-23 07:43:55'),
(177, 'App\\Models\\User', 11, 'MyLaravelApp', '98fd1fbfd30355ec4a26692199df47fbd6b98ca3558e8cf90ffc0a98879c247f', '[\"*\"]', NULL, '2023-03-24 03:28:28', '2023-03-24 03:28:28'),
(178, 'App\\Models\\User', 11, 'MyLaravelApp', '272b92be7edb31e5835dec740e2944827b90ea61c7a88772ffeedadc0f8cf44e', '[\"*\"]', NULL, '2023-03-24 06:21:25', '2023-03-24 06:21:25'),
(179, 'App\\Models\\User', 11, 'MyLaravelApp', 'cc60651f23e854d918cdf4932321e0f29ea56742750278db8902d9e2aea49c09', '[\"*\"]', NULL, '2023-03-24 06:22:48', '2023-03-24 06:22:48'),
(180, 'App\\Models\\User', 42, 'MyLaravelApp', '3f2d9b75c8cd98b16cdc55a89b6b7890df87f0ef03c18a73527b12c952d00083', '[\"*\"]', NULL, '2023-03-24 22:43:55', '2023-03-24 22:43:55'),
(181, 'App\\Models\\User', 42, 'MyLaravelApp', '8858e40a00d1ceb6957d0b7f86b3617bf6f77a0702faf69858b790568728ed6d', '[\"*\"]', NULL, '2023-03-25 21:43:54', '2023-03-25 21:43:54'),
(182, 'App\\Models\\User', 11, 'MyLaravelApp', 'd39ec3ad6897fab0dba419030b45fee4939252e0581c36d1168d1f51e924e7f7', '[\"*\"]', NULL, '2023-03-25 21:51:21', '2023-03-25 21:51:21'),
(183, 'App\\Models\\User', 42, 'MyLaravelApp', 'c0e79ed56573411a312843358b7813eb9cb6750ffd1996696b91bbf98a0fb89c', '[\"*\"]', NULL, '2023-03-26 08:01:34', '2023-03-26 08:01:34'),
(184, 'App\\Models\\User', 42, 'MyLaravelApp', '85798a3d5da8b996d29d40d3027ecd11c478111b2a4b9fe7fde7cab31de02401', '[\"*\"]', NULL, '2023-03-26 08:09:24', '2023-03-26 08:09:24'),
(185, 'App\\Models\\User', 42, 'MyLaravelApp', 'afe308d904b84662099af4c9c481660affff397febc6dad9f0ccadadb453cd38', '[\"*\"]', NULL, '2023-03-26 08:15:27', '2023-03-26 08:15:27'),
(186, 'App\\Models\\User', 11, 'MyLaravelApp', '2f67cea530479f64dc6cb8f9f64a0df91866891b6f1f74f56869237dc95dd55e', '[\"*\"]', NULL, '2023-03-27 17:01:50', '2023-03-27 17:01:50'),
(187, 'App\\Models\\User', 11, 'MyLaravelApp', '81833362f8c387955fa8059e471ba3fa386fbbc27a98d35217de9924fd79e9dd', '[\"*\"]', NULL, '2023-03-27 18:05:43', '2023-03-27 18:05:43'),
(188, 'App\\Models\\User', 11, 'MyLaravelApp', 'ae216e63806f6201c7d63f78395470d05040c976ffbb6f91fff4cb5a48113218', '[\"*\"]', NULL, '2023-03-27 18:08:22', '2023-03-27 18:08:22'),
(189, 'App\\Models\\User', 42, 'MyLaravelApp', '7c9942fabd8b54beef0237b43bd61e8590ab39f8d2672a231b3a7155281ddd4a', '[\"*\"]', NULL, '2023-03-28 00:12:55', '2023-03-28 00:12:55'),
(190, 'App\\Models\\User', 11, 'MyLaravelApp', 'f2413f8921f26e8c1dc1873a5ca2d4d158346f2140e9936ea87e304b317d5536', '[\"*\"]', NULL, '2023-03-28 01:09:46', '2023-03-28 01:09:46'),
(191, 'App\\Models\\User', 42, 'MyLaravelApp', '044d4cb12b03cb49889168e4ebed4ce2ed2a6c83df8fc33dd5f3d6c3b8a6713a', '[\"*\"]', NULL, '2023-03-28 02:12:15', '2023-03-28 02:12:15'),
(192, 'App\\Models\\User', 11, 'MyLaravelApp', 'a776ee295538df399eecc3791235fa1943010895dd3323956cc074763038da1a', '[\"*\"]', NULL, '2023-04-10 09:49:56', '2023-04-10 09:49:56'),
(193, 'App\\Models\\User', 11, 'MyLaravelApp', 'e6d9415425d80488f1dca0e1df9a02b25860acb731216ac87644ff7c36148bda', '[\"*\"]', NULL, '2023-04-10 19:37:18', '2023-04-10 19:37:18'),
(194, 'App\\Models\\User', 11, 'MyLaravelApp', '16cc7c3ff93c6a92836d6bcc8f0193517c6115ed576a04f840afb6b5cfe9b368', '[\"*\"]', NULL, '2023-04-11 20:54:31', '2023-04-11 20:54:31'),
(195, 'App\\Models\\User', 11, 'MyLaravelApp', 'f328fb3b1e1b55212bb7620a1f45b1956c5bc17f791bce0597f71bc71628c141', '[\"*\"]', NULL, '2023-04-11 22:28:40', '2023-04-11 22:28:40'),
(196, 'App\\Models\\User', 11, 'MyLaravelApp', '4d180cfbfbfd25f3c9f0e03abfb6f047e94935bb2021763ad0d071e4f8f33630', '[\"*\"]', NULL, '2023-04-12 00:00:42', '2023-04-12 00:00:42'),
(197, 'App\\Models\\User', 11, 'MyLaravelApp', '76370d94428ffc96c498f965d7cf36de6751406b3c7d94339a6a11e2ed38c139', '[\"*\"]', NULL, '2023-04-13 22:10:00', '2023-04-13 22:10:00'),
(198, 'App\\Models\\User', 11, 'MyLaravelApp', 'deb1d02424f71806b8f2c0953581767bc37cc90bd2f8f1d79f4c765544c3c67e', '[\"*\"]', NULL, '2023-04-14 11:38:17', '2023-04-14 11:38:17'),
(199, 'App\\Models\\User', 11, 'MyLaravelApp', '60cc825441b9a365482f76c20b874f7486d62b03c2cb824e700efc32e2fdda24', '[\"*\"]', NULL, '2023-04-14 13:31:46', '2023-04-14 13:31:46'),
(200, 'App\\Models\\User', 12, 'MyLaravelApp', '9c8674c03a08038a414206ac5cdf7080082884ac297f3ecb9efcc1dcc91720ab', '[\"*\"]', NULL, '2023-04-14 13:42:15', '2023-04-14 13:42:15'),
(201, 'App\\Models\\User', 12, 'MyLaravelApp', '65e2d32b97d4c0370f6d54ca728c4f5a9550fa25ad97cc77c8532b51d3ea58f9', '[\"*\"]', NULL, '2023-04-14 20:50:07', '2023-04-14 20:50:07'),
(202, 'App\\Models\\User', 12, 'MyLaravelApp', 'f4d0c185ae679afa204263ca351499b3a78da57b8118f958021c3bafff81fffe', '[\"*\"]', NULL, '2023-04-14 22:14:27', '2023-04-14 22:14:27'),
(203, 'App\\Models\\User', 12, 'MyLaravelApp', '43ae0146fd311fa1d369c97fa395a4659df2046baef941e91ac943a825e82a7a', '[\"*\"]', NULL, '2023-04-15 17:06:33', '2023-04-15 17:06:33'),
(204, 'App\\Models\\User', 77, 'MyLaravelApp', 'ee78d30f9f61dc54c076da6dcd99bad92640afc9ecc6270100bbe8bac962f17e', '[\"*\"]', NULL, '2023-04-15 17:08:58', '2023-04-15 17:08:58'),
(205, 'App\\Models\\User', 77, 'MyLaravelApp', '3434b6b3a78cd03bf42d6a9a1507bf2ecff15f3a7a8e66e72942cc5785eca043', '[\"*\"]', NULL, '2023-04-15 17:09:04', '2023-04-15 17:09:04'),
(206, 'App\\Models\\User', 12, 'MyLaravelApp', '3d43225b4137dabb03a0c7b940c89357a21347db767d1d9d9a0f4be33df3a7d9', '[\"*\"]', NULL, '2023-04-15 17:51:50', '2023-04-15 17:51:50'),
(207, 'App\\Models\\User', 12, 'MyLaravelApp', 'b5371a951a44f93dcb814e1362a3283a080b2a1ab5e4638d5c89b9416e07ef3b', '[\"*\"]', NULL, '2023-04-16 02:33:41', '2023-04-16 02:33:41'),
(208, 'App\\Models\\User', 12, 'MyLaravelApp', '42034208d9aa70c6fcee52f0ed2c86c17d879d00eff58efe4e57d75dec330d31', '[\"*\"]', NULL, '2023-04-16 13:53:41', '2023-04-16 13:53:41'),
(209, 'App\\Models\\User', 12, 'MyLaravelApp', '6fc037611c7bee7dd3275f3730d7c4d41c693a53731b97975968a95be6830d05', '[\"*\"]', NULL, '2023-04-17 12:13:01', '2023-04-17 12:13:01'),
(210, 'App\\Models\\User', 12, 'MyLaravelApp', '58bc23d5a773430f747c9182e8a0aea3c959604421094549eef196815ebd8155', '[\"*\"]', NULL, '2023-04-17 13:44:04', '2023-04-17 13:44:04'),
(211, 'App\\Models\\User', 12, 'MyLaravelApp', '52bf9f747f1c5ba16854dbedf4b1ce96cce01c6212a98f06ee71ad0b3d819609', '[\"*\"]', NULL, '2023-04-17 22:47:39', '2023-04-17 22:47:39'),
(212, 'App\\Models\\User', 12, 'MyLaravelApp', '5ebb1c3fd4e917806db7f94bf01e8cafd6f39f9a1e756e791cafe156f7ac3a96', '[\"*\"]', NULL, '2023-04-18 17:39:00', '2023-04-18 17:39:00'),
(213, 'App\\Models\\User', 12, 'MyLaravelApp', '71da190fc4c41c1899074c24d9262164c42c2b054e3236317b871d674f65ccf2', '[\"*\"]', NULL, '2023-04-18 19:45:32', '2023-04-18 19:45:32'),
(214, 'App\\Models\\User', 12, 'MyLaravelApp', 'aa5ad0a9011ef8a413841c7c99093f004f202382f66bd24afc38b7ae7b67e1a2', '[\"*\"]', NULL, '2023-04-19 16:08:30', '2023-04-19 16:08:30'),
(215, 'App\\Models\\User', 12, 'MyLaravelApp', 'bdc5f45290175e2b7620ff06b60b64a3857462b607a19e3cc4dd1ba775d0ef9c', '[\"*\"]', NULL, '2023-04-19 17:20:37', '2023-04-19 17:20:37'),
(216, 'App\\Models\\User', 12, 'MyLaravelApp', '8241e92a0fd780e67c0d174c77b3d1c21ebbc9c4ddd4eb23d835580c8188517c', '[\"*\"]', NULL, '2023-04-19 18:21:02', '2023-04-19 18:21:02'),
(217, 'App\\Models\\User', 12, 'MyLaravelApp', 'c391142f21e369f16651c05ab7cdb643205d08165c9ab3c8188ef795331e3ce6', '[\"*\"]', NULL, '2023-04-20 19:44:54', '2023-04-20 19:44:54'),
(218, 'App\\Models\\User', 12, 'MyLaravelApp', '69c54753602cd409f08e118d30f1445dee10beea2e8a4593f18ccd8775185e99', '[\"*\"]', NULL, '2023-04-24 21:40:26', '2023-04-24 21:40:26'),
(219, 'App\\Models\\User', 12, 'MyLaravelApp', 'f8535c2c1bf15a5fa5cdfc4cad840958313d58d3aff57e7f10a1b7dd4bfe20c6', '[\"*\"]', NULL, '2023-04-25 00:32:59', '2023-04-25 00:32:59'),
(220, 'App\\Models\\User', 12, 'MyLaravelApp', '1df67b4ed1dd6b995d0bb93a3ce2bc3fe98bb93d2f00a5b6f9897fdb3a40ae13', '[\"*\"]', NULL, '2023-04-25 13:51:16', '2023-04-25 13:51:16'),
(221, 'App\\Models\\User', 12, 'MyLaravelApp', 'f2150272850f6635287c1a44e938763d8fc4bdf03fd60646eaf41c07eb78946e', '[\"*\"]', NULL, '2023-04-25 20:23:58', '2023-04-25 20:23:58'),
(222, 'App\\Models\\User', 12, 'MyLaravelApp', '95e18c67b6a43e663bde6a181568e34b352d572630878498202aacf52fd33b53', '[\"*\"]', NULL, '2023-04-25 20:43:43', '2023-04-25 20:43:43'),
(223, 'App\\Models\\User', 12, 'MyLaravelApp', '7219a11f7b1d3153151fce01a9e2f425831812a14eedc6f597d7bfea58f823c6', '[\"*\"]', NULL, '2023-04-25 23:46:21', '2023-04-25 23:46:21'),
(224, 'App\\Models\\User', 12, 'MyLaravelApp', '742a587f7c96f6ecba6978aadb1a143219ccad344d8d55746d43282c4f7b8a5a', '[\"*\"]', NULL, '2023-04-26 00:03:05', '2023-04-26 00:03:05'),
(225, 'App\\Models\\User', 12, 'MyLaravelApp', '0f45d7e0c882db3caa5bcb929bc27b54618af5120ada90a4f394a68325414edd', '[\"*\"]', NULL, '2023-04-26 02:55:23', '2023-04-26 02:55:23'),
(226, 'App\\Models\\User', 12, 'MyLaravelApp', 'c59f62bc44d5407764ed31ec09d5cef12d725ac8b82acac4ff576b5b3fe8152e', '[\"*\"]', NULL, '2023-04-26 19:21:32', '2023-04-26 19:21:32'),
(227, 'App\\Models\\User', 12, 'MyLaravelApp', 'b409a33e2259a833fab0b0f27646c23b4bccd07ccb1e1af8d290146e584d6de0', '[\"*\"]', NULL, '2023-04-26 21:29:34', '2023-04-26 21:29:34'),
(228, 'App\\Models\\User', 12, 'MyLaravelApp', '09a5547ce3470caa9a8c033bf8f20ebffa1b9d60c227604c90451f020c5cc93b', '[\"*\"]', NULL, '2023-04-26 22:37:32', '2023-04-26 22:37:32'),
(229, 'App\\Models\\User', 12, 'MyLaravelApp', 'f700783d580c2100a7ddbb5fbada351f13317be635afc5af9e392e8d867531ce', '[\"*\"]', NULL, '2023-04-27 02:49:59', '2023-04-27 02:49:59'),
(230, 'App\\Models\\User', 12, 'MyLaravelApp', '689d4212cb8e897d1fbd885e46163066c5febe98d9ecbf80dc692d806b025286', '[\"*\"]', NULL, '2023-04-28 13:13:05', '2023-04-28 13:13:05'),
(231, 'App\\Models\\User', 12, 'MyLaravelApp', '139aa4ef972d65987d6571fabf464a988e9e2231e2b6d9c0c6d4d931f384c2fb', '[\"*\"]', NULL, '2023-04-28 13:26:54', '2023-04-28 13:26:54'),
(232, 'App\\Models\\User', 12, 'MyLaravelApp', '173d101cd11cef97a6b2abd72aa4831443349126080f7f92c2ab18df999e19ef', '[\"*\"]', NULL, '2023-04-28 19:16:55', '2023-04-28 19:16:55'),
(233, 'App\\Models\\User', 42, 'MyLaravelApp', '6baa2d67bebaaf436cff610fcbcdfd90f09456538c14d7f39ce9ebc682f8f172', '[\"*\"]', NULL, '2023-04-28 22:31:43', '2023-04-28 22:31:43'),
(234, 'App\\Models\\User', 12, 'MyLaravelApp', 'a8fdf7f9a39b7a2a76b587b5191ff478a901ac249284987a145f9d54920be1bd', '[\"*\"]', NULL, '2023-05-02 20:36:26', '2023-05-02 20:36:26'),
(235, 'App\\Models\\User', 12, 'MyLaravelApp', 'dbe14bff3dbdca251c427f2e6d8b181dd94d7d14741d76f9ae4aac7db420281a', '[\"*\"]', NULL, '2023-05-04 09:50:41', '2023-05-04 09:50:41'),
(236, 'App\\Models\\User', 12, 'MyLaravelApp', '4418c169f5b4690c52408b0a94b375dc684c39f819ea41220b9cf59a5ec87d03', '[\"*\"]', NULL, '2023-05-04 15:58:30', '2023-05-04 15:58:30'),
(237, 'App\\Models\\User', 12, 'MyLaravelApp', '4e264200520ff3bcde02569642dd3500377bdb680989d13045af6b7465744a1b', '[\"*\"]', NULL, '2023-05-06 15:07:59', '2023-05-06 15:07:59'),
(238, 'App\\Models\\User', 42, 'MyLaravelApp', '0bde4787cd6e77adf8db87185eb304d3efc8ff4f18cf5aab55f6956f04eff472', '[\"*\"]', NULL, '2023-05-09 19:43:13', '2023-05-09 19:43:13'),
(239, 'App\\Models\\User', 42, 'MyLaravelApp', '90f761d549b846150d5df662615453a15d31ec5067227210269ca392db3e5e9a', '[\"*\"]', NULL, '2023-05-10 03:49:48', '2023-05-10 03:49:48'),
(240, 'App\\Models\\User', 63, 'MyLaravelApp', '65b6a9c3f682347cddfc80f9751f7457088c83e39e33bf22ce0bca407d21a3b8', '[\"*\"]', NULL, '2023-05-10 14:06:02', '2023-05-10 14:06:02'),
(241, 'App\\Models\\User', 42, 'MyLaravelApp', 'ddc9fed85bcb82e563ee4a4735b24f34f4be3386d29a9f61bf38a4d9d4a8ff8c', '[\"*\"]', NULL, '2023-05-12 23:38:15', '2023-05-12 23:38:15'),
(242, 'App\\Models\\User', 63, 'MyLaravelApp', 'e4c1c27b79efe1caf4c75eeea69aea43f071cf7ceb21d231a635f746428337a5', '[\"*\"]', NULL, '2023-05-14 06:39:10', '2023-05-14 06:39:10'),
(243, 'App\\Models\\User', 63, 'MyLaravelApp', '115b1c2b72a678d3614594d5f781941d50624f9d8d1bfb1a7246265d63c8a5cd', '[\"*\"]', NULL, '2023-05-18 01:44:34', '2023-05-18 01:44:34'),
(244, 'App\\Models\\User', 63, 'MyLaravelApp', 'bbbf3ad4e95daf7aa4387b5292b0b5c395e59feb2b50d936b0fb840bf8bf70b5', '[\"*\"]', NULL, '2023-05-19 02:47:05', '2023-05-19 02:47:05'),
(245, 'App\\Models\\User', 12, 'MyLaravelApp', 'aa5208f8046e895aa30be6f7515ccf86296c1ee5dea7ebd773ba9760cff08663', '[\"*\"]', NULL, '2023-05-19 23:48:02', '2023-05-19 23:48:02'),
(246, 'App\\Models\\User', 14, 'MyLaravelApp', '4a0b946866562b2aa1d7a0937140de5325af169804d1effe37a99f9d92da4679', '[\"*\"]', NULL, '2023-05-20 22:59:43', '2023-05-20 22:59:43'),
(247, 'App\\Models\\User', 12, 'MyLaravelApp', '92e9bf375265a90865cf6c302771690fb7ade68d18a3511c734de3760c8565e0', '[\"*\"]', NULL, '2023-05-26 23:45:59', '2023-05-26 23:45:59'),
(248, 'App\\Models\\User', 12, 'MyLaravelApp', '58dc47c6343e450ec173cd584be0d161862af6561cc1ca78c98d75ddb0cd925b', '[\"*\"]', NULL, '2023-05-26 23:54:23', '2023-05-26 23:54:23'),
(249, 'App\\Models\\User', 12, 'MyLaravelApp', 'eeb062fcb8846b1800ae445f86eac0eec3aabaa69db38313f71666284efe2b5e', '[\"*\"]', NULL, '2023-05-28 11:53:35', '2023-05-28 11:53:35'),
(250, 'App\\Models\\User', 12, 'MyLaravelApp', '2bab866ab009a39aaac7f29d225469b6a07fd19912e5d06eff655d07f296b494', '[\"*\"]', NULL, '2023-05-29 07:03:35', '2023-05-29 07:03:35'),
(251, 'App\\Models\\User', 12, 'MyLaravelApp', 'c4bcb6f72598c1eb33d24922c3d2483a1210d8b7c9c3391d6a54a4ad2eeb0164', '[\"*\"]', NULL, '2023-05-29 07:03:39', '2023-05-29 07:03:39'),
(252, 'App\\Models\\User', 12, 'MyLaravelApp', 'c659b9b285e860bfae7289ddbf2953254a1dfcf759c6eb9ae14c201a6b2739d7', '[\"*\"]', NULL, '2023-05-30 08:52:47', '2023-05-30 08:52:47'),
(253, 'App\\Models\\User', 12, 'MyLaravelApp', 'f2b76c8357bc03905f1a998b8fcbb19d23f52549497a35826100e2d3625f9e23', '[\"*\"]', NULL, '2023-05-31 07:38:20', '2023-05-31 07:38:20'),
(254, 'App\\Models\\User', 12, 'MyLaravelApp', '07f4ef9d986aca32700650a5804a2c586912372b5e9943e8e5f3d20b579f342b', '[\"*\"]', NULL, '2023-05-31 08:02:41', '2023-05-31 08:02:41'),
(255, 'App\\Models\\User', 12, 'MyLaravelApp', 'aca2131d5b76145f1f327afd9e9766e6f786b3d5283a920093770bb62b48c99c', '[\"*\"]', NULL, '2023-05-31 08:09:22', '2023-05-31 08:09:22'),
(256, 'App\\Models\\User', 12, 'MyLaravelApp', '12338f6e3f6bdc0b72480f71dec5bab28e8816962b62dd3bd08b4fd00a36b463', '[\"*\"]', NULL, '2023-06-01 11:39:14', '2023-06-01 11:39:14'),
(257, 'App\\Models\\User', 85, 'MyLaravelApp', 'f5f53201e0c10808d64f03b13efbe5e82bc121ad73375da6b3353f2cac53ce18', '[\"*\"]', NULL, '2023-06-01 16:08:49', '2023-06-01 16:08:49'),
(258, 'App\\Models\\User', 85, 'MyLaravelApp', '0600f9b42269f0e133bddfad9ab5fcee00804b59cfdd8a59ca824b38bab72b56', '[\"*\"]', NULL, '2023-06-01 16:09:52', '2023-06-01 16:09:52'),
(259, 'App\\Models\\User', 12, 'MyLaravelApp', '71ab3f3e21127ae467bfff0a2bdba45e2ab79f667873e09df9a6ce0cb93b7e5f', '[\"*\"]', NULL, '2023-06-01 16:30:24', '2023-06-01 16:30:24'),
(260, 'App\\Models\\User', 12, 'MyLaravelApp', '07084512f48099eedcad32a153345c966e9f4401e4dc847e86dbd2ea34598c48', '[\"*\"]', NULL, '2023-06-02 12:43:49', '2023-06-02 12:43:49'),
(261, 'App\\Models\\User', 12, 'MyLaravelApp', '4d4724f910b1f33fd407ef4aee01ffb5aa9124341acfae55e7cb609c3e0f81be', '[\"*\"]', NULL, '2023-06-03 22:16:56', '2023-06-03 22:16:56'),
(262, 'App\\Models\\User', 12, 'MyLaravelApp', '60b55a8d24ae0df5e87e11c5235ebe493a0d971e8f002fabce2702b76fd4e8c9', '[\"*\"]', NULL, '2023-06-04 07:49:56', '2023-06-04 07:49:56'),
(263, 'App\\Models\\User', 65, 'MyLaravelApp', '6753590dce63be875d87093fd9ecb8c6470a9886a75e48a6fe47bf0a0e806b00', '[\"*\"]', NULL, '2023-06-05 13:33:07', '2023-06-05 13:33:07'),
(264, 'App\\Models\\User', 95, 'MyLaravelApp', 'a8cf58d32556cd135e187a7822951391289af43771fc083684976ec0da23685f', '[\"*\"]', NULL, '2023-06-05 13:33:54', '2023-06-05 13:33:54'),
(265, 'App\\Models\\User', 65, 'MyLaravelApp', 'e30d64ee99c0c0ebef34b396e95ca5452c2ae537ecb14f6600e69805269d013b', '[\"*\"]', NULL, '2023-06-05 13:34:16', '2023-06-05 13:34:16'),
(266, 'App\\Models\\User', 12, 'MyLaravelApp', '353d2be30b4f56f9b3c879e2e10db422780cd556ecacbf3060beae20ea163b8d', '[\"*\"]', NULL, '2023-06-06 21:47:45', '2023-06-06 21:47:45'),
(267, 'App\\Models\\User', 12, 'MyLaravelApp', '5fe523e282e35dd69da941e4bf18eee1b36a2bbdc13a667e610fde380f09eb2d', '[\"*\"]', NULL, '2023-06-06 21:58:16', '2023-06-06 21:58:16'),
(268, 'App\\Models\\User', 79, 'MyLaravelApp', '41385c28049d41292e7a861333be8a521044e08a37ec1a363e28b6b6a4a52ab7', '[\"*\"]', NULL, '2023-06-07 07:08:59', '2023-06-07 07:08:59'),
(269, 'App\\Models\\User', 12, 'MyLaravelApp', 'c80031746be77f967ff95e60aadb1846c8c177624ef6797ce5801013be7d85bc', '[\"*\"]', NULL, '2023-06-07 18:34:23', '2023-06-07 18:34:23'),
(270, 'App\\Models\\User', 12, 'MyLaravelApp', 'b3b0aece55aec74e58f4a9ae54e4957c2ab25644509a6d5b86d37be9032e3d68', '[\"*\"]', NULL, '2023-06-07 19:18:09', '2023-06-07 19:18:09'),
(271, 'App\\Models\\User', 12, 'MyLaravelApp', '262f74626593d8f89e9f1307d33d061c6446f0ea40fbe2b771cf2d5a63cb50bd', '[\"*\"]', NULL, '2023-06-07 19:19:28', '2023-06-07 19:19:28'),
(272, 'App\\Models\\User', 79, 'MyLaravelApp', '95bf2d871138248bfbfe0e5eea35c8d3ccfd40ba0643e31be3ae91252052428c', '[\"*\"]', NULL, '2023-06-07 21:56:06', '2023-06-07 21:56:06'),
(273, 'App\\Models\\User', 79, 'MyLaravelApp', '9f1f4c2c35f7532a626989c67d7815e3e24221d9ab28ed4351cccb07d79b1db1', '[\"*\"]', NULL, '2023-06-07 22:26:50', '2023-06-07 22:26:50'),
(274, 'App\\Models\\User', 98, 'MyLaravelApp', '5229a4fdab934a6990f09556fcb92f230671bb7ea2bd59546e50d540244be3a2', '[\"*\"]', NULL, '2023-06-08 02:22:56', '2023-06-08 02:22:56'),
(275, 'App\\Models\\User', 14, 'MyLaravelApp', 'b21a2345914eff1c0ceaf388e0e812b302cc16d8769e2ceb8959024147af6974', '[\"*\"]', NULL, '2023-06-08 14:00:44', '2023-06-08 14:00:44'),
(276, 'App\\Models\\User', 12, 'MyLaravelApp', '5fc929622428632add47615ceb013cff8f9f9990e3b47e6b50442e4957a9a172', '[\"*\"]', NULL, '2023-06-12 07:46:56', '2023-06-12 07:46:56'),
(277, 'App\\Models\\User', 42, 'MyLaravelApp', 'a5d9aef10ed2587801c2eb8a53c5992fa0bb53170f3e5f3bb6647a5cd24dcd22', '[\"*\"]', NULL, '2023-06-13 12:49:49', '2023-06-13 12:49:49'),
(278, 'App\\Models\\User', 12, 'MyLaravelApp', 'd705899598c49db0fd7dddf758094eb5b7f5864f3976c5e15735384b52e20f5b', '[\"*\"]', NULL, '2023-06-13 14:52:04', '2023-06-13 14:52:04'),
(279, 'App\\Models\\User', 12, 'MyLaravelApp', '079d523120226a5cc85071f77eb2a0c99dc6793d17f6cc489b1a36778030b8e3', '[\"*\"]', NULL, '2023-06-13 14:52:13', '2023-06-13 14:52:13'),
(280, 'App\\Models\\User', 12, 'MyLaravelApp', '7469c14473d7b50359a752c1441575481e7133a78b938596a81d484e64c1cc8d', '[\"*\"]', NULL, '2023-06-13 14:55:05', '2023-06-13 14:55:05'),
(281, 'App\\Models\\User', 12, 'MyLaravelApp', 'c8fcd22c62d1c188441c46273d30fab50a8aa6a313956ba98fb715c911886a84', '[\"*\"]', NULL, '2023-06-13 16:59:40', '2023-06-13 16:59:40'),
(282, 'App\\Models\\User', 79, 'MyLaravelApp', '769965968657b15cbe8c9b57bd065417d1cddf79a1d5f856f64d7370fa905ada', '[\"*\"]', NULL, '2023-06-13 23:37:20', '2023-06-13 23:37:20');
INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(283, 'App\\Models\\User', 12, 'MyLaravelApp', '4883171a45b967763f942dd5d03d1ae39bd4f23e313cb2bafa5c4398ca937524', '[\"*\"]', NULL, '2023-06-14 22:18:46', '2023-06-14 22:18:46'),
(284, 'App\\Models\\User', 12, 'MyLaravelApp', 'f72a52a4592949f2c2f88193c7f233461c947300ebe8f78ccbbd794de2432e94', '[\"*\"]', NULL, '2023-06-23 20:16:33', '2023-06-23 20:16:33'),
(285, 'App\\Models\\User', 12, 'MyLaravelApp', '3319026b10a7ea2af4dc220d3191bd1c79dc40b308e6cb3e65afed4ab4d0f971', '[\"*\"]', NULL, '2023-06-23 21:56:20', '2023-06-23 21:56:20'),
(286, 'App\\Models\\User', 14, 'MyLaravelApp', 'ee9787476d4e406d3482cc33b1ead776a72c59d73afd267138697c0313ea079c', '[\"*\"]', NULL, '2023-06-25 01:50:57', '2023-06-25 01:50:57'),
(287, 'App\\Models\\User', 14, 'MyLaravelApp', '1ae8ec3a5ef81caa216a0bd5da57eda62ed60052c74f20a1538ac626a8ac0092', '[\"*\"]', NULL, '2023-06-25 04:47:44', '2023-06-25 04:47:44'),
(288, 'App\\Models\\User', 110, 'MyLaravelApp', '0e2c1cd4ef386b6324a0aecefccaa5840fc61572e88efeebdf83dba853345b1a', '[\"*\"]', NULL, '2023-06-26 03:00:51', '2023-06-26 03:00:51'),
(289, 'App\\Models\\User', 12, 'MyLaravelApp', 'e5263171bfa088d31d0ddf325329255d7bcfa2db70f88de08f0178308df5bac5', '[\"*\"]', NULL, '2023-06-27 21:04:07', '2023-06-27 21:04:07'),
(290, 'App\\Models\\User', 12, 'MyLaravelApp', '3a56c3f3861516a19a9be6843852a8625fc8dbac59fd5ef874891a620c4ee11a', '[\"*\"]', NULL, '2023-06-27 21:04:09', '2023-06-27 21:04:09'),
(291, 'App\\Models\\User', 14, 'MyLaravelApp', '885cf77cd7eac931217c63233bfcf5c9afb435a6957f60d2c2d2745b7c782ec1', '[\"*\"]', NULL, '2023-07-01 14:44:10', '2023-07-01 14:44:10'),
(292, 'App\\Models\\User', 12, 'MyLaravelApp', '73e9597f19cf00fc564732e4187c53fb29bb84b401fba8e4755c258639f50e6c', '[\"*\"]', NULL, '2023-07-04 21:28:07', '2023-07-04 21:28:07'),
(293, 'App\\Models\\User', 12, 'MyLaravelApp', '0ceaba6cf38bff92cdd17870a7e8724de0dc50e1bb0f6f4ac7b215e9ec1bcace', '[\"*\"]', NULL, '2023-07-05 20:49:46', '2023-07-05 20:49:46');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` int(100) DEFAULT NULL,
  `age` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `adult` tinyint(4) NOT NULL DEFAULT '0',
  `streaming` tinyint(4) NOT NULL DEFAULT '0',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `name`, `country`, `city`, `gender`, `zipcode`, `age`, `avatar_id`, `status`, `adult`, `streaming`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Profile 1', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 2, '2023-01-17 08:16:31', '2023-01-19 01:27:07'),
(2, 'Profile 1', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 3, '2023-01-17 08:31:11', '2023-01-18 06:01:28'),
(3, 'Profile 1', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 4, '2023-01-21 13:47:18', '2023-01-21 13:47:18'),
(7, 'Omar', 'UnitedKingdom', 'Islamabad', 'Male', 47000, '22-35 Years', 7, 1, 0, 0, 12, '2023-01-22 07:18:39', '2023-06-13 15:53:45'),
(8, 'Dekoven Riggins', 'UnitedStates', 'Oklahoma City', 'Male', 73121, '36+', 8, 1, 0, 1, 14, '2023-01-22 11:27:37', '2023-07-04 20:27:37'),
(13, 'Marcus', 'United States', 'The Village', 'Male', 73120, '36+', 7, 1, 0, 0, 42, '2023-02-18 10:19:36', '2023-07-05 02:22:52'),
(14, 'Marie', 'UnitedStates', 'OKC', 'Female', 73120, '36Years', 6, 1, 0, 0, 42, '2023-02-18 10:19:36', '2023-05-25 02:55:31'),
(15, 'Profile 3', NULL, NULL, NULL, NULL, NULL, 5, 1, 0, 0, 42, '2023-02-18 10:19:37', '2023-02-23 03:05:49'),
(17, 'Profile 2', NULL, NULL, 'Male', NULL, '0-10', 7, 1, 0, 0, 14, '2023-02-26 10:55:43', '2023-04-06 23:00:35'),
(20, 'Profile 1', NULL, NULL, NULL, NULL, NULL, 5, 1, 0, 0, 62, '2023-03-16 10:54:36', '2023-03-16 10:54:37'),
(21, 'Profile 1', 'Us', 'Okc', 'Male', 73121, '36+', 5, 1, 0, 0, 63, '2023-03-16 11:00:38', '2023-03-22 11:12:12'),
(31, 'Profile 1', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 1, '2023-03-19 02:30:54', '2023-03-19 02:30:54'),
(43, 'Profile 1', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 67, '2023-03-19 03:02:32', '2023-03-19 03:02:32'),
(44, 'Profile 2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 67, '2023-03-19 03:02:44', '2023-03-19 03:02:44'),
(45, 'Profile 3', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 67, '2023-03-19 03:02:48', '2023-03-19 03:02:48'),
(46, 'Profile 4', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 67, '2023-03-19 03:02:52', '2023-03-19 03:02:52'),
(47, 'Profile 5', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 67, '2023-03-19 03:02:57', '2023-03-19 03:02:57'),
(48, 'Profile 1', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 68, '2023-03-19 03:06:02', '2023-03-19 03:06:02'),
(49, 'Profile 2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 68, '2023-03-19 03:06:21', '2023-03-19 03:06:21'),
(50, 'Profile 3', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 68, '2023-03-19 03:06:27', '2023-03-19 03:06:27'),
(51, 'Profile 4', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 68, '2023-03-19 03:06:30', '2023-03-19 03:06:30'),
(52, 'Profile 5', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 68, '2023-03-19 03:07:09', '2023-03-19 03:07:09'),
(53, 'Profile 1', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 71, '2023-03-19 03:41:13', '2023-03-19 03:41:13'),
(54, 'Profile 2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 1, '2023-03-19 03:52:31', '2023-03-19 03:52:31'),
(55, 'Profile 3', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 1, '2023-03-19 03:53:01', '2023-03-19 03:53:01'),
(56, 'Profile 4', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 1, '2023-03-19 03:53:03', '2023-03-19 03:53:03'),
(57, 'Profile 5', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 1, '2023-03-19 03:53:07', '2023-03-19 03:53:07'),
(58, 'Profile 2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 71, '2023-03-19 03:59:23', '2023-03-19 03:59:23'),
(59, 'Profile 3', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 71, '2023-03-19 03:59:26', '2023-03-19 03:59:26'),
(60, 'Profile 4', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 71, '2023-03-19 03:59:30', '2023-03-19 03:59:30'),
(61, 'Profile 5', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 71, '2023-03-19 03:59:33', '2023-03-19 03:59:33'),
(62, 'Profile 1', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 70, '2023-03-19 04:04:19', '2023-03-19 04:04:19'),
(63, 'Profile 2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 70, '2023-03-19 04:04:28', '2023-03-19 04:04:28'),
(64, 'Profile 1', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 72, '2023-03-19 04:05:42', '2023-03-19 04:05:42'),
(65, 'Profile 2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 72, '2023-03-19 04:12:31', '2023-03-19 04:12:31'),
(66, 'Profile 3', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 72, '2023-03-19 04:12:35', '2023-03-19 04:12:35'),
(67, 'Profile 4', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 72, '2023-03-19 04:12:37', '2023-03-19 04:12:37'),
(68, 'Profile 5', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 72, '2023-03-19 04:12:41', '2023-03-19 04:12:41'),
(69, 'Profile 1', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 16, '2023-03-19 14:24:03', '2023-03-19 14:24:03'),
(70, 'Profile 2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 16, '2023-03-19 16:02:00', '2023-03-19 16:02:00'),
(71, 'Profile 1', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 73, '2023-03-19 16:02:37', '2023-03-19 16:02:37'),
(72, 'Profile 2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 73, '2023-03-19 16:02:58', '2023-03-19 16:02:58'),
(73, 'Profile 3', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 73, '2023-03-19 16:03:02', '2023-03-19 16:03:02'),
(74, 'Profile 4', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 73, '2023-03-19 16:03:08', '2023-03-19 16:03:08'),
(75, 'Profile 5', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 73, '2023-03-19 16:03:13', '2023-03-19 16:03:13'),
(76, 'Profile 1', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 74, '2023-03-19 22:42:00', '2023-03-19 22:42:00'),
(77, 'Profile 2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 74, '2023-03-19 22:42:13', '2023-03-19 22:42:13'),
(79, 'Profile 1', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 66, '2023-03-22 12:16:35', '2023-03-22 12:16:35'),
(80, 'Profile 4', NULL, NULL, NULL, NULL, NULL, 5, 1, 0, 0, 42, '2023-03-23 07:48:16', '2023-03-24 07:45:13'),
(81, 'Profile 5', NULL, NULL, NULL, NULL, NULL, 5, 1, 0, 0, 42, '2023-03-26 08:07:54', '2023-03-26 08:16:17'),
(82, 'Jonah Lewis', 'United States', 'Bethany', 'Male', 73008, '22-35', 5, 1, 0, 1, 75, '2023-03-28 01:34:20', '2023-03-28 01:35:56'),
(83, 'BigKev', 'United States', 'Albuquerque', 'Male', 87121, '36+', 5, 1, 0, 1, 76, '2023-04-05 04:18:58', '2023-04-05 04:28:15'),
(84, 'Profile 3', NULL, NULL, 'Male', NULL, '0-10', 9, 1, 0, 0, 14, '2023-04-06 23:02:42', '2023-04-06 23:03:11'),
(85, 'Profile 4', NULL, NULL, 'Male', NULL, '0-10', 10, 1, 0, 0, 14, '2023-04-06 23:03:30', '2023-04-06 23:04:02'),
(86, 'Profile 1', NULL, NULL, NULL, NULL, NULL, 5, 1, 0, 0, 23, '2023-04-09 03:56:25', '2023-04-09 03:56:26'),
(87, 'Richard', 'UnitedStates', 'Islamabad', 'Male', 47000, '22-35 Years', 17, 1, 0, 1, 12, '2023-04-14 13:42:56', '2023-06-14 22:59:02'),
(88, 'hamza khan', 'Pakistani', 'Islamabad', 'Male', 8888, '0-10', 8, 1, 0, 0, 12, '2023-04-14 13:43:26', '2023-06-13 06:48:16'),
(89, 'Profile4', 'UnitedStates', 'zz', 'Male', 777, '0-10Years', 10, 1, 0, 0, 12, '2023-04-14 13:43:36', '2023-04-26 23:50:35'),
(90, 'Profile5', 'UnitedStates', 'yyy', 'Male', 7777, '0-10Years', 11, 1, 0, 0, 12, '2023-04-14 13:43:44', '2023-04-26 23:51:13'),
(91, 'Profile 1', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 77, '2023-04-15 17:09:04', '2023-04-15 17:09:04'),
(92, 'Profile 2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 77, '2023-04-15 17:09:04', '2023-04-15 17:09:04'),
(93, 'Profile 3', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 77, '2023-04-15 17:10:41', '2023-04-15 17:10:41'),
(94, 'Profile 1', 'United States', 'Oklahoma City', 'Female', 73142, '22-35', 5, 1, 0, 1, 78, '2023-05-02 21:26:12', '2023-05-02 21:29:37'),
(95, 'Profile 1', 'USA', 'Okc', 'Male', 73160, '22-35', 5, 1, 0, 1, 21, '2023-05-03 00:46:26', '2023-05-03 00:50:45'),
(96, 'Glenjamin', 'USA', 'Yukon', 'Male', 73099, '22-35', 5, 1, 0, 1, 79, '2023-05-07 11:54:04', '2023-06-14 00:40:37'),
(97, 'Profile 1', NULL, NULL, NULL, NULL, NULL, 5, 1, 0, 0, 81, '2023-05-09 17:18:08', '2023-05-09 17:18:09'),
(98, 'Profile 1', NULL, NULL, NULL, NULL, NULL, 5, 1, 0, 0, 80, '2023-05-09 17:25:03', '2023-05-09 17:25:03'),
(99, 'Profile 2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 63, '2023-05-10 14:06:12', '2023-05-10 14:06:12'),
(100, 'Profile 3', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 63, '2023-05-10 15:38:28', '2023-05-10 15:38:28'),
(101, 'MAC\'s Profile', 'United States', 'Tulsa', 'Male', 74134, '36+', 7, 1, 0, 1, 82, '2023-05-11 18:40:26', '2023-05-16 04:52:05'),
(102, 'Damon', 'United States', 'Oklahoma City', 'Male', 73114, '36+', 5, 1, 0, 1, 83, '2023-05-21 04:04:49', '2023-05-21 04:08:06'),
(103, 'Profile 2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 66, '2023-05-28 11:50:21', '2023-05-28 11:50:21'),
(104, 'Hamza khan', 'PAK', 'ATK', 'male', 2222, '24', 8, 1, 0, 0, 85, '2023-06-01 16:09:55', '2023-06-01 16:35:59'),
(105, 'Jeremy', 'united states', 'edmond', 'Male', 73012, '22-35', 5, 1, 0, 0, 87, '2023-06-02 01:39:26', '2023-06-27 13:34:40'),
(106, 'Profile 2', 'aa', 'aa', 'aa', 11, '111', 7, 1, 0, 0, 85, '2023-06-02 11:01:49', '2023-06-02 11:11:28'),
(107, 'Profile 1', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 91, '2023-06-02 18:43:12', '2023-06-02 18:43:12'),
(108, 'TaTa', 'US', 'Mwc', 'Female', 73110, '36+', 5, 1, 0, 0, 94, '2023-06-03 00:38:04', '2023-06-03 00:44:03'),
(109, 'Profile 1', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 65, '2023-06-05 13:34:55', '2023-06-05 13:34:55'),
(110, 'Ashleigh M Peevy', 'United States', 'Ardmore', 'Female', 73401, '36+', 5, 1, 0, 0, 97, '2023-06-07 13:48:27', '2023-06-07 13:51:44'),
(111, 'Harry Burrough', 'United States', 'Spencer', 'Male', 73084, '15-21', 17, 1, 0, 0, 98, '2023-06-07 17:07:05', '2023-06-07 17:10:06'),
(112, 'Profile 2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 98, '2023-06-08 02:22:56', '2023-06-08 02:22:56'),
(113, 'Profile 5', NULL, NULL, NULL, NULL, NULL, 5, 1, 0, 0, 14, '2023-06-08 14:00:53', '2023-06-08 16:34:14'),
(114, 'Profile 1', 'United States', 'Edmond', 'Female', 73034, '36+', 9, 1, 0, 1, 100, '2023-06-13 20:50:23', '2023-06-13 22:40:47'),
(115, 'Dr. Carlos M. Robinson', 'United States', 'Oklahoma City', 'Male', 73111, '36+', 5, 1, 0, 0, 101, '2023-06-17 23:16:07', '2023-06-17 23:28:36'),
(116, 'Profile 1', 'jhjkh', 'jkhkjhkj', 'Male', 6575, '0-10', 5, 1, 0, 0, 103, '2023-06-20 15:26:09', '2023-06-20 15:26:29'),
(117, 'Profile 1', 'United States', 'Oklahoma City', 'Male', 73120, '22-35', 5, 1, 0, 1, 105, '2023-06-21 18:37:32', '2023-06-23 17:50:26'),
(118, 'Logan', 'United States', 'EDMOND', 'Male', 73012, '22-35', 5, 1, 0, 1, 106, '2023-06-23 16:55:33', '2023-06-23 17:10:18'),
(119, 'Chad T', 'United States', 'EL RENO', 'Male', 73036, '22-35', 5, 1, 0, 1, 18, '2023-06-25 01:48:44', '2023-07-02 17:55:45'),
(120, 'Profile 2', NULL, NULL, NULL, NULL, NULL, 5, 1, 0, 0, 18, '2023-06-25 01:48:45', '2023-06-25 01:48:46'),
(121, 'Jav', 'United states', 'Wichita', 'Male', 67208, '36+', 5, 1, 0, 1, 110, '2023-06-26 02:48:43', '2023-06-26 02:53:24'),
(122, 'Tri-Fecta', 'United states', 'Wichita', 'Male', 67208, '22-35', 5, 1, 0, 0, 110, '2023-06-26 02:49:49', '2023-06-26 20:32:14'),
(123, 'Profile 3', NULL, NULL, NULL, NULL, NULL, 5, 1, 0, 0, 110, '2023-06-26 03:02:22', '2023-06-26 03:03:31'),
(124, 'Randall Conley', 'United States', 'San Antonio', 'Male', 78253, '22-35', 5, 1, 0, 1, 121, '2023-06-28 20:45:43', '2023-06-28 20:49:26'),
(125, 'Mike', 'Usa', 'Okc', 'Male', 73128, '15-21', 5, 1, 0, 1, 114, '2023-07-02 01:39:05', '2023-07-02 01:41:08'),
(126, 'Profile 1', NULL, NULL, NULL, NULL, NULL, 5, 1, 0, 0, 119, '2023-07-02 23:55:22', '2023-07-02 23:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `p_subscriptions`
--

CREATE TABLE `p_subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `days` int(11) DEFAULT NULL,
  `affiliate` tinyint(4) NOT NULL DEFAULT '0',
  `affiliate_amount` int(11) NOT NULL DEFAULT '0',
  `recurring` tinyint(4) NOT NULL,
  `onet_time_price` float DEFAULT NULL,
  `recurring_price` float DEFAULT NULL,
  `number_of_profiles` int(11) DEFAULT NULL,
  `number_of_streaming` int(11) DEFAULT NULL,
  `adds` tinyint(4) DEFAULT NULL,
  `stripe_id` text COLLATE utf8mb4_unicode_ci,
  `paypal_id` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `cloned_from` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `p_subscriptions`
--

INSERT INTO `p_subscriptions` (`id`, `name`, `description`, `days`, `affiliate`, `affiliate_amount`, `recurring`, `onet_time_price`, `recurring_price`, `number_of_profiles`, `number_of_streaming`, `adds`, `stripe_id`, `paypal_id`, `status`, `cloned_from`, `created_at`, `updated_at`) VALUES
(1, 'Basic - Grandfathered Price', '<p><br></p>', 30, 0, 0, 1, 0, 2, 5, 2, 1, 'price_1MToSwAXonptSDKcUNEZcfpX', 'P-5W824939JY5860101MKF43DY', 0, NULL, '2023-01-16 03:21:08', '2023-05-31 17:14:50'),
(2, 'Premium - Ad Free', '<p>Premium - Ad Free</p>', 365, 0, 0, 1, 0, 6, 5, 2, 0, 'price_1MToU0AXonptSDKcEI4KTOEJ', '123', 0, NULL, '2023-01-19 21:33:54', '2023-04-20 23:07:58'),
(3, 'Standard Basic', '<p><br></p>', 30, 0, 0, 1, 0, 3.99, 5, 2, 1, 'price_1NDrcJAXonptSDKcdvCCGqzc', NULL, 1, NULL, '2023-04-20 23:09:52', '2023-05-31 17:14:26');

-- --------------------------------------------------------

--
-- Table structure for table `p_subscriptions_user`
--

CREATE TABLE `p_subscriptions_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `p_subscription_id` bigint(20) UNSIGNED NOT NULL,
  `expire_at` date NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_subscription_id` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `p_subscriptions_user`
--

INSERT INTO `p_subscriptions_user` (`id`, `user_id`, `p_subscription_id`, `expire_at`, `type`, `paypal_subscription_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2023-02-16', 'stripe', NULL, 'active', NULL, NULL),
(2, 3, 1, '2023-02-16', 'stripe', NULL, 'active', NULL, NULL),
(3, 4, 1, '2023-02-20', 'stripe', NULL, 'active', NULL, NULL),
(4, 4, 2, '2033-01-21', 'stripe', NULL, 'active', NULL, NULL),
(7, 42, 1, '2023-08-01', 'paypal', 'I-HXEYCJBSS1P0', 'active', NULL, NULL),
(8, 27, 1, '2023-07-13', 'paypal', 'I-5C3SF2NSSHUX', 'active', NULL, NULL),
(9, 26, 1, '2023-07-12', 'paypal', 'I-UKAHL8BFBYJ5', 'active', NULL, NULL),
(10, 14, 1, '2023-07-15', 'paypal', 'I-SSLER0BUJK4G', 'active', NULL, NULL),
(11, 18, 1, '2023-08-01', 'paypal', 'I-HVKV4YH9LDCA', 'active', NULL, NULL),
(12, 22, 1, '2023-07-18', 'paypal', 'I-ASBA4JC1R21D', 'active', NULL, NULL),
(13, 21, 1, '2023-06-13', 'paypal', 'I-380Y9DVSYVVU', 'cancelled', NULL, NULL),
(18, 12, 1, '2023-07-20', 'paypal', 'I-JX4YWTBCMBKE', 'cancelled', NULL, NULL),
(23, 23, 1, '2023-07-18', 'paypal', 'I-C2NNXFXBWVRY', 'active', NULL, NULL),
(24, 62, 1, '2023-07-15', 'paypal', 'I-F4S8DCUBW0BJ', 'active', NULL, NULL),
(25, 63, 1, '2023-04-15', 'stripe', NULL, 'active', NULL, NULL),
(26, 75, 1, '2023-04-26', 'stripe', NULL, 'active', NULL, NULL),
(27, 76, 1, '2023-08-03', 'paypal', 'I-0B8E9980VB1A', 'active', NULL, NULL),
(28, 78, 1, '2023-08-01', 'paypal', 'I-KPAJVJFKD8NY', 'active', NULL, NULL),
(29, 79, 1, '2023-06-06', 'stripe', NULL, 'active', NULL, NULL),
(30, 81, 1, '2023-06-08', 'paypal', 'I-CH02JJL3XW2N', 'cancelled', NULL, NULL),
(31, 80, 1, '2023-07-09', 'paypal', 'I-1M3WCR146990', 'active', NULL, NULL),
(32, 82, 1, '2023-07-11', 'paypal', 'I-X2KNE1Y9C51K', 'active', NULL, NULL),
(33, 83, 1, '2023-07-20', 'paypal', 'I-EBSF0CL86M3L', 'active', NULL, NULL),
(34, 87, 1, '2023-07-23', NULL, NULL, 'active', NULL, NULL),
(35, 91, 3, '2023-07-02', 'stripe', NULL, 'active', NULL, NULL),
(36, 94, 3, '2023-07-02', 'stripe', NULL, 'active', NULL, NULL),
(37, 79, 3, '2023-07-07', 'stripe', NULL, 'active', NULL, NULL),
(38, 97, 3, '2023-07-07', 'stripe', NULL, 'active', NULL, NULL),
(39, 98, 3, '2023-07-07', 'stripe', NULL, 'active', NULL, NULL),
(40, 100, 3, '2023-07-13', 'stripe', NULL, 'active', NULL, NULL),
(41, 101, 3, '2023-07-17', 'stripe', NULL, 'active', NULL, NULL),
(42, 103, 1, '2023-07-20', NULL, NULL, 'active', NULL, NULL),
(43, 104, 1, '2023-07-20', NULL, NULL, 'active', NULL, NULL),
(44, 104, 2, '2024-06-19', NULL, NULL, 'active', NULL, NULL),
(45, 105, 3, '2023-07-21', 'stripe', NULL, 'active', NULL, NULL),
(46, 106, 3, '2023-07-23', 'stripe', NULL, 'active', NULL, NULL),
(47, 110, 3, '2023-07-25', 'stripe', NULL, 'active', NULL, NULL),
(48, 121, 3, '2023-07-28', 'stripe', NULL, 'active', NULL, NULL),
(49, 114, 3, '2023-07-31', 'stripe', NULL, 'cancelled', NULL, NULL),
(50, 119, 3, '2023-08-01', 'stripe', NULL, 'active', NULL, NULL),
(51, 119, 3, '2023-08-01', 'stripe', NULL, 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'web', NULL, NULL),
(2, 'admin', 'web', NULL, NULL),
(3, 'user', 'web', NULL, NULL),
(4, 'Contributor', 'web', NULL, NULL),
(5, 'Affliate', 'web', '2023-06-02 01:32:44', '2023-06-02 01:32:44'),
(6, 'Advertisments', 'web', '2023-06-12 17:41:01', '2023-06-12 17:41:01');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dimension` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_hourly` float DEFAULT NULL,
  `price_daily` float DEFAULT NULL,
  `price_3` float DEFAULT NULL,
  `price_6` float DEFAULT NULL,
  `price_9` float DEFAULT NULL,
  `price_12` float DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `description` text COLLATE utf8mb4_unicode_ci,
  `top_bar` tinyint(4) NOT NULL DEFAULT '0',
  `featured` tinyint(4) NOT NULL DEFAULT '0',
  `new_arrival` tinyint(4) NOT NULL DEFAULT '0',
  `best_selling` tinyint(4) NOT NULL DEFAULT '0',
  `top_rated` tinyint(4) NOT NULL DEFAULT '0',
  `special_request` tinyint(4) NOT NULL DEFAULT '0',
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `number`, `dimension`, `price_type`, `price_hourly`, `price_daily`, `price_3`, `price_6`, `price_9`, `price_12`, `status`, `description`, `top_bar`, `featured`, `new_arrival`, `best_selling`, `top_rated`, `special_request`, `category_id`, `created_at`, `updated_at`) VALUES
(4, 'Podcast Room', '4', '169+ sqft', 'hour', 75, 0, NULL, NULL, NULL, NULL, 1, '<p>Make your podcast needs come to life with the perfect set up to record your show. Room comes equipped with and array of recording supplies to include microphones, Large table/desk set up, chairs, high speed internet. This space can accommodate up to x number of people . (2 hour minimum )</p><p><br></p><ul><li>Additional services available include: post production mixing and mastering suit rental available on site. For additional equipment rental such as cameras and additional microphones use special request drop down.</li></ul><p><br></p><p><br></p>', 0, 0, 1, 0, 0, 1, NULL, '2023-03-20 06:13:14', '2023-03-24 10:42:42'),
(5, 'Conference Room', '3', '247 sqft', 'hour', 25, 0, 0, 0, 0, 0, 1, '<p>Hold meetings up to # people (lecture style) Conference room comes equipped with smart board, smart TV with screen sharing capabilities,… Large conference table with 8 chairs. Ideal place for dual in person/ virtual meeting options.&nbsp;</p><p><br></p><p>Use special request drop down for daily rate</p>', 1, 0, 0, 0, 0, 1, NULL, '2023-03-24 00:37:34', '2023-04-20 23:39:18'),
(6, 'Theater', '1', '392 sqft', 'hour', 25, 0, 0, 0, 0, 0, 1, '<p>Host a private screening for up to<strong> </strong>20 guest. Theater comes equipped with 9.1.6 Dolby Atmos surround sound, 150-inch screen, and 20 theater seats.&nbsp;Host private film events such as private parties, indie film premiers, screenings for investors, cast screenings, quality control check for your indie film and more.</p><p><br></p><p>For daily rate and special request please use drop down.</p><p><br></p><p>Concessions currently unavailable.&nbsp;</p>', 1, 1, 0, 0, 0, 1, NULL, '2023-03-24 10:09:26', '2023-05-22 22:10:51'),
(7, 'Sound Stage', '2', '2000+ sqft', 'both', 99, 349, NULL, NULL, NULL, NULL, 1, '<p>Large indoor studio perfect for the indie filmmaker. Sound stage comes equipped with cyc wall, dimensions are… equipment that comes included with stage rental is… Other equipment rental available at additional cost. On site mens dressing room, womens dressing room, an area for hair and makeup, lounge, and break room.&nbsp;</p><p><br></p><p>Use special request drop down for weekly and monthly rates.</p><p><br></p><p><br></p>', 1, 1, 0, 1, 1, 1, NULL, '2023-03-24 10:16:01', '2023-04-01 16:15:42'),
(8, 'Office Space', '5', 'TBD', 'monthly', 0, 0, 10, 20, 30, 40, 0, '<p><strong>3, 6, 9 or 12 month lease available. Each room is equipped with a 5x2 desk, computer, high speed WIFI access. All bills paid. Perfect for …</strong></p><p><br></p><p><strong>Office Space #1: </strong>Music production office&nbsp;</p><p><strong>Office Space #2: </strong>Editing and color grading<strong>&nbsp;</strong></p><p><strong>Office Space #3: </strong>Audio production<strong>/</strong>sound mixing</p><p><strong>Office Space #4: </strong>Office space</p><p>Customize your work space by adding your own flare and flavor.&nbsp;</p><p><br></p><p>Amenities: On site shared break room with refrigerator, Stove, Microwave and eating area.&nbsp;</p>', 1, 1, 1, 0, 0, 0, NULL, '2023-03-24 10:41:59', '2023-04-20 23:40:32'),
(9, 'The Spot- Music Studio', '6', 'TBD', 'hour', 65, 0, 0, 0, 0, 0, 1, '<p>Music production studio equipped with 88 weighed keyboard, Logic Pro X, a Neumann u87 mic and a Native Instrument Maschine. </p>', 1, 1, 1, 1, 1, 1, NULL, '2023-03-24 10:45:33', '2023-05-22 22:26:29'),
(10, 'Sound Design', '7', '252 sqft', 'both', 80, 249, 0, 0, 0, 0, 1, '<p>9.1.6 Dolby Atmos, acoustically treated, Ideal for top tier audio editing and sound mixing for movies, podcasts, audiobooks, voice overs and more</p>', 1, 1, 1, 1, 1, 1, NULL, '2023-03-24 10:49:11', '2023-05-23 19:29:26'),
(11, '4 Eyez Editing', '8', 'TBD', 'both', 80, 249, 0, 0, 0, 0, 1, '<p>Coming Soon for all your post production editing and color grading needs. Access to davanci resolve and final cut pro.</p>', 1, 1, 1, 0, 1, 1, NULL, '2023-03-24 10:54:24', '2023-05-22 22:30:47'),
(12, 'VFX', '9', 'TBD', 'both', 50, 199, 0, 0, 0, 0, 1, '<p>Coming Soon ...</p>', 1, 1, 0, 0, 0, 1, NULL, '2023-03-24 11:02:48', '2023-04-20 23:43:37');

-- --------------------------------------------------------

--
-- Table structure for table `seasons`
--

CREATE TABLE `seasons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `year` int(11) DEFAULT NULL,
  `trailer` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `adult` tinyint(4) NOT NULL DEFAULT '1',
  `date_sort` datetime NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `show_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seasons`
--

INSERT INTO `seasons` (`id`, `title`, `description`, `year`, `trailer`, `status`, `adult`, `date_sort`, `user_id`, `show_id`, `created_at`, `updated_at`) VALUES
(1, 'Season 1', 'Marriage Is?', 2020, 'https://www.youtube.com/watch?v=A1tJVupLPsg', 1, 1, '2023-01-21 20:09:00', 1, 1, '2023-01-22 09:12:20', '2023-05-12 18:48:19'),
(2, 'Season 1', 'Truth Be Told', 2022, 'https://www.youtube.com/watch?v=SJuRQ9Kj2cY', 1, 1, '2023-01-21 20:13:00', 1, 2, '2023-01-22 09:13:45', '2023-05-12 18:48:49'),
(3, 'Season 1', 'The Suffering: Season 1', 2021, 'https://www.youtube.com/watch?v=web1I0XG-M0', 1, 1, '2023-01-21 20:20:00', 1, 3, '2023-01-22 09:21:43', '2023-05-12 18:48:39'),
(4, 'Season 1', 'Her: Season 1', 2020, 'https://www.youtube.com/watch?v=rPvhkS2Cz40', 1, 1, '2023-01-21 20:22:00', 1, 4, '2023-01-22 09:25:55', '2023-05-12 18:48:05'),
(5, 'Skinz League 2023', 'The 2023 Pro-Am Skinz League will showcase these teams: Bisons, How High, Trifecta, Savages, GMB, Goat, Jumpman, Bucket Fam, OTM, A-Town, Chasing Wolves, GTA, HeadTap, Rocafella, and Team Equip.', 2023, 'Skinz League', 1, 0, '2023-06-24 19:00:00', 1, 5, '2023-06-24 19:32:27', '2023-06-24 19:32:27');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stripe` tinyint(4) NOT NULL DEFAULT '0',
  `stripe_key` text COLLATE utf8mb4_unicode_ci,
  `stripe_secret` text COLLATE utf8mb4_unicode_ci,
  `paypal` tinyint(4) NOT NULL DEFAULT '0',
  `paypal_mode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sandbox',
  `paypal_key` text COLLATE utf8mb4_unicode_ci,
  `paypal_secret` text COLLATE utf8mb4_unicode_ci,
  `insurance_percentage` int(11) DEFAULT NULL,
  `affiliate_percentage` float NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `stripe`, `stripe_key`, `stripe_secret`, `paypal`, `paypal_mode`, `paypal_key`, `paypal_secret`, `insurance_percentage`, `affiliate_percentage`, `created_at`, `updated_at`) VALUES
(1, 1, '', '', 0, 'sandbox', '', '', 10, 44, '2023-01-14 16:30:40', '2023-06-23 23:34:13');

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE `shows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `adult` tinyint(4) NOT NULL DEFAULT '1',
  `date_sort` datetime NOT NULL,
  `best_serial` tinyint(4) NOT NULL DEFAULT '0',
  `top_scroll` tinyint(4) NOT NULL DEFAULT '0',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`id`, `title`, `description`, `status`, `adult`, `date_sort`, `best_serial`, `top_scroll`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Marriage Is?', 'Marriage Is?', 1, 1, '2023-01-21 20:05:00', 1, 1, 1, '2023-01-22 09:05:35', '2023-04-20 23:04:15'),
(2, 'Truth Be Told', 'Truth Be Told', 1, 1, '2023-01-21 20:06:00', 0, 1, 1, '2023-01-22 09:06:45', '2023-04-20 23:03:04'),
(3, 'The Suffering', 'The Suffering', 1, 1, '2023-01-21 20:07:00', 0, 1, 1, '2023-01-22 09:07:45', '2023-04-20 23:02:52'),
(4, 'HER', 'HER', 1, 1, '2023-01-21 20:08:00', 0, 1, 1, '2023-01-22 09:08:48', '2023-04-20 23:02:13'),
(5, 'SKINZ LEAGUE', 'Skinz League is the fastest-growing Pro-Am league in the country.', 1, 0, '2023-06-24 12:28:00', 0, 0, 1, '2023-06-24 18:43:20', '2023-06-24 18:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `name`, `stripe_id`, `stripe_status`, `stripe_price`, `quantity`, `trial_ends_at`, `ends_at`, `created_at`, `updated_at`) VALUES
(1, 2, 'default', 'sub_1MR3mqHwUFr112YgDH6p8VEW', 'active', 'price_1MP4dRHwUFr112YgyvG8rVfF', 1, NULL, NULL, '2023-01-17 08:16:31', '2023-01-17 08:16:31'),
(2, 3, 'default', 'sub_1MR413HwUFr112Yg4bbLXX9m', 'active', 'price_1MP4dRHwUFr112YgyvG8rVfF', 1, NULL, NULL, '2023-01-17 08:31:11', '2023-01-17 08:31:11'),
(3, 4, 'default', 'sub_1MRzKMHwUFr112YgkIssemPy', 'active', 'price_1MRzB4HwUFr112YgzNqQkftm', 1, NULL, NULL, '2023-01-19 21:42:56', '2023-01-19 21:42:56'),
(4, 5, 'default', 'sub_1MSQMYHwUFr112YgKYu1baW0', 'active', 'price_1MP4dRHwUFr112YgyvG8rVfF', 1, NULL, NULL, '2023-01-21 02:35:00', '2023-01-21 02:35:00'),
(5, 6, 'default', 'sub_1MSigsHwUFr112Yg21eM8AsJ', 'active', 'price_1MP4dRHwUFr112YgyvG8rVfF', 1, NULL, NULL, '2023-01-21 22:09:12', '2023-01-21 22:09:12'),
(6, 7, 'default', 'sub_1MSod6HwUFr112Yg9qoJY6TY', 'active', 'price_1MP4dRHwUFr112YgyvG8rVfF', 1, NULL, NULL, '2023-01-22 04:29:42', '2023-01-22 04:29:42'),
(7, 59, 'default', 'sub_1MToVAAXonptSDKcMBPaHf9x', 'canceled', 'price_1MToSwAXonptSDKcUNEZcfpX', 1, NULL, '2023-02-24 22:39:51', '2023-01-24 22:33:40', '2023-02-24 22:39:51'),
(8, 63, 'default', 'sub_1Mm8vXAXonptSDKcvh8GcdRh', 'active', 'price_1MToSwAXonptSDKcUNEZcfpX', 1, NULL, NULL, '2023-03-16 11:00:38', '2023-03-16 11:00:38'),
(9, 75, 'default', 'sub_1MqLo5AXonptSDKcyDD6CQCE', 'active', 'price_1MToSwAXonptSDKcUNEZcfpX', 1, NULL, NULL, '2023-03-28 01:34:20', '2023-05-30 21:43:41'),
(10, 79, 'default', 'sub_1N55E5AXonptSDKcPiwtZlx9', 'canceled', 'price_1MToSwAXonptSDKcUNEZcfpX', 1, NULL, '2023-06-07 07:05:01', '2023-05-07 11:54:04', '2023-06-07 07:05:01'),
(11, 91, 'default', 'sub_1NEc0IAXonptSDKcunWNzKmM', 'active', 'price_1NDrcJAXonptSDKcdvCCGqzc', 1, NULL, NULL, '2023-06-02 18:43:12', '2023-06-02 18:43:12'),
(12, 94, 'default', 'sub_1NEhXhAXonptSDKcfFNIB66u', 'active', 'price_1NDrcJAXonptSDKcdvCCGqzc', 1, NULL, NULL, '2023-06-03 00:38:04', '2023-07-06 01:43:27'),
(13, 97, 'default', 'sub_1NGLmmAXonptSDKcflrdrxbW', 'active', 'price_1NDrcJAXonptSDKcdvCCGqzc', 1, NULL, NULL, '2023-06-07 13:48:27', '2023-06-07 13:48:27'),
(14, 98, 'default', 'sub_1NGOt0AXonptSDKcMm2AIyTZ', 'active', 'price_1NDrcJAXonptSDKcdvCCGqzc', 1, NULL, NULL, '2023-06-07 17:07:05', '2023-06-07 17:07:05'),
(15, 100, 'default', 'sub_1NIdENAXonptSDKctwolVeEd', 'active', 'price_1NDrcJAXonptSDKcdvCCGqzc', 1, NULL, NULL, '2023-06-13 20:50:23', '2023-06-13 20:50:23'),
(16, 101, 'default', 'sub_1NK7PcAXonptSDKcJTHeVNfn', 'active', 'price_1NDrcJAXonptSDKcdvCCGqzc', 1, NULL, NULL, '2023-06-17 23:16:07', '2023-06-17 23:16:07'),
(17, 105, 'default', 'sub_1NLUyDAXonptSDKcvEU8NBOW', 'active', 'price_1NDrcJAXonptSDKcdvCCGqzc', 1, NULL, NULL, '2023-06-21 18:37:32', '2023-06-21 18:37:32'),
(18, 106, 'default', 'sub_1NMCKcAXonptSDKc1ESTNbjk', 'active', 'price_1NDrcJAXonptSDKcdvCCGqzc', 1, NULL, NULL, '2023-06-23 16:55:33', '2023-06-23 16:55:33'),
(19, 110, 'default', 'sub_1NN4XkAXonptSDKcjFvPAyqV', 'active', 'price_1NDrcJAXonptSDKcdvCCGqzc', 1, NULL, NULL, '2023-06-26 02:48:43', '2023-06-26 02:48:43'),
(20, 121, 'default', 'sub_1NO4J6AXonptSDKczmQ0urYW', 'active', 'price_1NDrcJAXonptSDKcdvCCGqzc', 1, NULL, NULL, '2023-06-28 20:45:43', '2023-06-28 20:45:43'),
(21, 114, 'default', 'sub_1NPEJeAXonptSDKcNv2vzgLx', 'active', 'price_1NDrcJAXonptSDKcdvCCGqzc', 1, NULL, '2023-08-02 01:39:02', '2023-07-02 01:39:05', '2023-07-02 01:39:20'),
(22, 119, 'default', 'sub_1NPZAqAXonptSDKcKV4jJt4G', 'canceled', 'price_1NDrcJAXonptSDKcdvCCGqzc', 1, NULL, '2023-07-02 23:55:41', '2023-07-02 23:55:22', '2023-07-02 23:55:41');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_product` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_items`
--

INSERT INTO `subscription_items` (`id`, `subscription_id`, `stripe_id`, `stripe_product`, `stripe_price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 'si_NBQed9DaRHkltt', 'prod_N9NOfIdhMP6mBc', 'price_1MP4dRHwUFr112YgyvG8rVfF', 1, '2023-01-17 08:16:31', '2023-01-17 08:16:31'),
(2, 2, 'si_NBQsudPvcskIjI', 'prod_N9NOfIdhMP6mBc', 'price_1MP4dRHwUFr112YgyvG8rVfF', 1, '2023-01-17 08:31:11', '2023-01-17 08:31:11'),
(3, 3, 'si_NCO6M548sMyFv7', 'prod_NCNwbHDVyfeHNp', 'price_1MRzB4HwUFr112YgzNqQkftm', 1, '2023-01-19 21:42:56', '2023-01-19 21:42:56'),
(4, 4, 'si_NCq21lLNMYlWoN', 'prod_N9NOfIdhMP6mBc', 'price_1MP4dRHwUFr112YgyvG8rVfF', 1, '2023-01-21 02:35:00', '2023-01-21 02:35:00'),
(5, 5, 'si_ND8yKI7LzRRsMq', 'prod_N9NOfIdhMP6mBc', 'price_1MP4dRHwUFr112YgyvG8rVfF', 1, '2023-01-21 22:09:12', '2023-01-21 22:09:12'),
(6, 6, 'si_NDF7PuWm6mgAkf', 'prod_N9NOfIdhMP6mBc', 'price_1MP4dRHwUFr112YgyvG8rVfF', 1, '2023-01-22 04:29:42', '2023-01-22 04:29:42'),
(7, 7, 'si_NEH3bPehjWfYXF', 'prod_NEH0dpR2sh70qK', 'price_1MToSwAXonptSDKcUNEZcfpX', 1, '2023-01-24 22:33:40', '2023-01-24 22:33:40'),
(8, 8, 'si_NXDMSA9qiFvTUV', 'prod_NEH0dpR2sh70qK', 'price_1MToSwAXonptSDKcUNEZcfpX', 1, '2023-03-16 11:00:38', '2023-03-16 11:00:38'),
(9, 9, 'si_NbYvnIe8vM1fpZ', 'prod_NEH0dpR2sh70qK', 'price_1MToSwAXonptSDKcUNEZcfpX', 1, '2023-03-28 01:34:20', '2023-03-28 01:34:20'),
(10, 10, 'si_NqmnI2y9bH66fO', 'prod_NEH0dpR2sh70qK', 'price_1MToSwAXonptSDKcUNEZcfpX', 1, '2023-05-07 11:54:04', '2023-05-07 11:54:04'),
(11, 11, 'si_O0dGRFdc2zTNh3', 'prod_NzrKfQu06CjawC', 'price_1NDrcJAXonptSDKcdvCCGqzc', 1, '2023-06-02 18:43:12', '2023-06-02 18:43:12'),
(12, 12, 'si_O0izSMnXZkQVmq', 'prod_NzrKfQu06CjawC', 'price_1NDrcJAXonptSDKcdvCCGqzc', 1, '2023-06-03 00:38:04', '2023-06-03 00:38:04'),
(13, 13, 'si_O2QeBIUsoaWyyM', 'prod_NzrKfQu06CjawC', 'price_1NDrcJAXonptSDKcdvCCGqzc', 1, '2023-06-07 13:48:27', '2023-06-07 13:48:27'),
(14, 14, 'si_O2TqMudjnFXe1W', 'prod_NzrKfQu06CjawC', 'price_1NDrcJAXonptSDKcdvCCGqzc', 1, '2023-06-07 17:07:05', '2023-06-07 17:07:05'),
(15, 15, 'si_O4mndVp6Rgpbzp', 'prod_NzrKfQu06CjawC', 'price_1NDrcJAXonptSDKcdvCCGqzc', 1, '2023-06-13 20:50:23', '2023-06-13 20:50:23'),
(16, 16, 'si_O6K3PuyWIffFgY', 'prod_NzrKfQu06CjawC', 'price_1NDrcJAXonptSDKcdvCCGqzc', 1, '2023-06-17 23:16:07', '2023-06-17 23:16:07'),
(17, 17, 'si_O7kTdCvuulI7L9', 'prod_NzrKfQu06CjawC', 'price_1NDrcJAXonptSDKcdvCCGqzc', 1, '2023-06-21 18:37:32', '2023-06-21 18:37:32'),
(18, 18, 'si_O8THZjJky8D0BM', 'prod_NzrKfQu06CjawC', 'price_1NDrcJAXonptSDKcdvCCGqzc', 1, '2023-06-23 16:55:33', '2023-06-23 16:55:33'),
(19, 19, 'si_O9NIobdOGGmxkH', 'prod_NzrKfQu06CjawC', 'price_1NDrcJAXonptSDKcdvCCGqzc', 1, '2023-06-26 02:48:43', '2023-06-26 02:48:43'),
(20, 20, 'si_OAP77jxaCd0rHp', 'prod_NzrKfQu06CjawC', 'price_1NDrcJAXonptSDKcdvCCGqzc', 1, '2023-06-28 20:45:43', '2023-06-28 20:45:43'),
(21, 21, 'si_OBbWLKltCVi797', 'prod_NzrKfQu06CjawC', 'price_1NDrcJAXonptSDKcdvCCGqzc', 1, '2023-07-02 01:39:05', '2023-07-02 01:39:05'),
(22, 22, 'si_OBx5lybAus9AXo', 'prod_NzrKfQu06CjawC', 'price_1NDrcJAXonptSDKcdvCCGqzc', 1, '2023-07-02 23:55:22', '2023-07-02 23:55:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_by` int(11) DEFAULT NULL,
  `ref_done` tinyint(4) NOT NULL DEFAULT '0',
  `a_cash` int(11) NOT NULL DEFAULT '0',
  `is_system` tinyint(4) NOT NULL DEFAULT '0',
  `referral` tinyint(4) NOT NULL DEFAULT '0',
  `onetime` tinyint(4) NOT NULL DEFAULT '0',
  `agreement` tinyint(4) NOT NULL DEFAULT '0',
  `interest_id` tinyint(4) DEFAULT NULL,
  `signature` text COLLATE utf8mb4_unicode_ci,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_last_four` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `ref_by`, `ref_done`, `a_cash`, `is_system`, `referral`, `onetime`, `agreement`, `interest_id`, `signature`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`, `stripe_id`, `pm_type`, `pm_last_four`, `trial_ends_at`) VALUES
(1, 'Super Admin', 'admin@admin.com', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$JodBx7l2IEqHwR0xaCpiOujdlrafEy9E06dii7VMdU5ra2bYUgvP2', 1, NULL, '2023-01-14 16:30:37', '2023-01-14 16:30:37', NULL, NULL, NULL, NULL),
(12, NULL, 'oseirichard1@yahoo.com', NULL, 0, 0, 0, 1, 0, 0, NULL, NULL, NULL, '$2y$10$E7qnfGsBA2E3TdCOCAZTCeXpAzbBcc92Mhv9C4MjsFB3WmMkK.9A2', 1, NULL, '2023-01-22 05:32:21', '2023-06-20 14:51:40', 'cus_NcIpNfsbFEpP1F', 'visa', '9863', NULL),
(14, NULL, 'driggins5@gmail.com', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$qOHG7t/zVuNhkxiuHSXseO59HjjLKZ4vL3lsHpR3QnGFcceCoG722', 1, NULL, '2023-01-22 05:53:57', '2023-01-22 05:53:57', NULL, NULL, NULL, NULL),
(15, NULL, 'shadowsunstudios@gmail.com', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$fXtkaOlVRq4QuyVOu.rLduhPhQsk70.DqZmM8WR8fbbLHy8gtHXwC', 1, NULL, '2023-01-22 05:53:57', '2023-01-22 05:53:57', NULL, NULL, NULL, NULL),
(16, NULL, 'sibtainhaider369@gmail.com', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$n3ZZvfGt765bw4FOrr.CkuWEvjntmf0unUq3/yt66IW1d132O89Ei', 1, NULL, '2023-01-22 05:53:57', '2023-01-22 05:53:57', NULL, NULL, NULL, NULL),
(17, NULL, 'raelor11@gmail.com', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$J0y5cer6AuwHPBw1TWTdr.kd0O61tzHGpWC7iki4YpR6RBtc5qare', 1, NULL, '2023-01-22 05:53:57', '2023-01-22 05:53:57', NULL, NULL, NULL, NULL),
(18, NULL, 'crtcpallc@gmail.com', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$yCQakum3SBsMUS3romULn.CpxXb87lvx3IszXG0hF.pJDZHz5X0fq', 1, NULL, '2023-01-22 05:53:57', '2023-01-22 05:53:57', NULL, NULL, NULL, NULL),
(19, NULL, 'ladygriot1964@gmail.com', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$OCfzrTipgXy8VZv9cVkURO7U6UnxtqQ0ZyKNRb47En1E1UIGn744a', 1, NULL, '2023-01-22 05:53:57', '2023-01-22 05:53:57', NULL, NULL, NULL, NULL),
(20, NULL, 'kristirose22@gmail.com', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$hBQnAgFy.hiSIe55xwZ.V.RZtWDBRi3kYUI7hO4RgWZ/hCQUusScS', 1, NULL, '2023-01-22 05:53:57', '2023-01-22 05:53:57', NULL, NULL, NULL, NULL),
(21, NULL, 'deloraney06@gmail.com', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$uWQ1s4yfFH/pC4KcDElMR.CV9Wgapmi3cZKE3ae9INrYAuYyQwk8C', 1, NULL, '2023-01-22 05:53:57', '2023-01-22 05:53:57', NULL, NULL, NULL, NULL),
(22, NULL, 'Lhenry40@cox.net', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$RhMiCPDQy9Ajf5CRGcuW/.661BjBso5Xq1fVMvgTafJlMOn35BzIG', 1, NULL, '2023-01-22 05:53:57', '2023-01-22 05:53:57', NULL, NULL, NULL, NULL),
(23, NULL, 'Dianerholloway@gmail.com', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$f7FhpQdP5j7GxFZIJhmAu.MNZo1q8hSVR4v7q0XE4R9NkkSgLOA.y', 1, 'qdH2geMzDE1Kz7DK9R1x5MzozpGK6Pd1yWzxNKx1cmnZno1YPisUiKs2SHva', '2023-01-22 05:53:57', '2023-04-09 03:52:43', NULL, NULL, NULL, NULL),
(24, NULL, 'hadiyah.sanders@yahoo.com', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$Wi2B/HfJEw5WhlY/kJkidOx8c5xzVaqZlRAyTofuLb2NM14VdWYs2', 1, NULL, '2023-01-22 05:53:57', '2023-01-22 05:53:57', NULL, NULL, NULL, NULL),
(25, NULL, 'lchbattle@gmail.com', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$7yXMAEejgLECHcUymK50juy3kBGEj8sQSB47SNgLEZvZXb/U9LNv.', 1, NULL, '2023-01-22 05:53:57', '2023-01-22 05:53:57', NULL, NULL, NULL, NULL),
(26, NULL, 'dnd.productions@yahoo.com', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$AYhepho6lQCSIvGGH44SCenEz5ftxTw13CghR51jTQOBBcR1Us.Xu', 1, NULL, '2023-01-22 05:53:57', '2023-01-22 05:53:57', NULL, NULL, NULL, NULL),
(27, NULL, 'tlmoore1011@gmail.com', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$2GVZsEr3.TbZjjArYrVhfOPxSdrIHkPSNYxyYEkfhXNoiBdq2jhLK', 1, NULL, '2023-01-22 05:53:57', '2023-01-22 05:53:57', NULL, NULL, NULL, NULL),
(32, NULL, 'shadowsuninc@gmail.com', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$GSBc2/30C1tNYr5iDd5rg.6Z07LRUJcbJo9PVaJzMEDVZMBemvnjy', 1, NULL, '2023-01-22 05:53:57', '2023-01-22 05:53:57', NULL, NULL, NULL, NULL),
(42, NULL, 'kingbrownm83@gmail.com', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$Ga4AxnOCUeblZJAf3pAGfeJemWWsKps4hTYiU30qgZV4YUjwFb7X2', 1, NULL, '2023-01-22 05:53:57', '2023-01-22 05:53:57', NULL, NULL, NULL, NULL),
(53, NULL, 'jeevank9036@gmail.com', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$x29wYXnzcK0iKM8kA76aUuaXFHcQS2NO0mG6zJ7S2llEQHyeR.jGC', 1, NULL, '2023-01-22 05:53:58', '2023-01-22 05:53:58', NULL, NULL, NULL, NULL),
(55, NULL, 'deewilliamson6@yahoo.com', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$ts2IfcjDIXBikPXQjo9Aaeo/ijlT6yvmWH77/cJLGMe5oFu.IBv06', 1, NULL, '2023-01-22 05:53:58', '2023-01-22 05:53:58', NULL, NULL, NULL, NULL),
(61, NULL, 'chrisdelaney8@icloud.com', NULL, 0, 0, 0, 0, 0, 0, 4, NULL, NULL, '$2y$10$NgHsmefxxDI3t52E8T7Xe.0PsDdd0rN.K6nmCoXOhXbD/YuebDHb.', 1, NULL, '2023-02-23 22:38:08', '2023-02-23 22:38:08', 'cus_NPVtqub2z65TZh', NULL, NULL, NULL),
(62, NULL, 'waltersrib@yahoo.com', NULL, 0, 0, 0, 0, 0, 0, 4, NULL, NULL, '$2y$10$wDfh4.SlMRGD9PHLNk7E0.esg7LwVxiuynZJvtI6VJ3/pBVASU4au', 1, NULL, '2023-03-16 10:53:47', '2023-03-16 10:53:48', 'cus_NXDFmUvi4jdMSA', NULL, NULL, NULL),
(63, NULL, 'bigkeikeh022@gmail.com', NULL, 0, 0, 0, 0, 0, 0, 4, NULL, NULL, '$2y$10$gPrbJK2osQUDj6Y.IrchJOnsUuQh5cgZ/FJwVpAxebPf7di29Ne9W', 1, NULL, '2023-03-16 10:58:27', '2023-03-16 11:00:34', 'cus_NXDKBgR2fZU3Yp', 'visa', '9755', NULL),
(64, 'test api user', 'api1@api.com', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$gRtKtCsAtjWlcOpO2waNMegE99oqyNGXv/6rtk9WJ0TIMOm8I.Z0u', 1, NULL, '2023-03-17 18:53:00', '2023-03-17 18:53:00', NULL, NULL, NULL, NULL),
(65, 'test api user', 'api21@api.com', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$Zz2eVS0tbW4oSbD2uh3FrODqhxGTV8rh6CT6eb5y9jfxJLk3KTc5m', 1, NULL, '2023-03-17 18:54:38', '2023-03-17 18:54:38', NULL, NULL, NULL, NULL),
(66, 'u', 'u@u.com', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$wj58w44X.tQGTbki2G3hmOrm6mt2.zDyvzkyJYM2ogYO9MKTmaHZa', 1, NULL, '2023-03-18 14:59:02', '2023-03-18 14:59:02', NULL, NULL, NULL, NULL),
(67, 'Ujjj', 'um@hh.ccc', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$dYMN1aam.gVqf6UCnEBAfun8Eb6gVxP0fC60Hte7unbaZY5FViCHK', 1, NULL, '2023-03-18 20:59:55', '2023-03-18 20:59:55', NULL, NULL, NULL, NULL),
(68, 'Ujjj', 'umm@hh.ccc', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$5hX5n2qcBiYqRptBQrwlw.yFu2dOtVWYh3q5qRiE3aE386o3oRCKG', 1, NULL, '2023-03-19 03:05:15', '2023-03-19 03:05:15', NULL, NULL, NULL, NULL),
(69, 'mmdmm', 'mm@mm.cc', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$uuYvI/Th97Zgo3mNBdZv9..wbPHCLvlAV6jpSGbjc7KbNbmuOYEjW', 1, NULL, '2023-03-19 03:29:21', '2023-03-19 03:29:21', NULL, NULL, NULL, NULL),
(70, 'Ujjj', 'cd@hh.ccc', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$UB3cbPMcrWaKLIOvq0.oQ.JRy01XBavTJ2iYBZkRW99ZYYYot4H2e', 1, NULL, '2023-03-19 03:37:31', '2023-03-19 03:37:31', NULL, NULL, NULL, NULL),
(71, 'bbb', 'umsds@hhc.cc', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$Cbet5l/yHQU9q9EWoEIEqOxuoASFC4fqhiycVaZGUUJzvq4NgMMvW', 1, NULL, '2023-03-19 03:41:05', '2023-03-19 03:41:05', NULL, NULL, NULL, NULL),
(72, 'Ujjj', 'cdd@hh.ccc', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$eUiMvXu6p2upWXdZLBSfm.AN84Yl6HsCOyJGCoQJUC0.IhDagNtN.', 1, NULL, '2023-03-19 04:05:22', '2023-03-19 04:05:22', NULL, NULL, NULL, NULL),
(73, 'adb', 'qw@api.com', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$7o10Fx2sV2HvnsCIyx7Z0e6MjF0tKyY.plynXUENn7PvO63EtacOm', 1, NULL, '2023-03-19 15:58:04', '2023-03-19 15:58:04', NULL, NULL, NULL, NULL),
(74, 'testerk', 'test@api.com', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$4eZL0t3pyXr3zAT3Xyb98uTIDBT2Vzwt/8.wOX7l1nA71e.5VJY1G', 1, NULL, '2023-03-19 22:39:19', '2023-03-19 22:39:19', NULL, NULL, NULL, NULL),
(75, NULL, 'jonahplewis@gmail.com', NULL, 0, 0, 0, 0, 0, 0, 4, NULL, NULL, '$2y$10$u1OXP4k6Q/B7fm/X4sa29.O9dEIvgh3e19hN.NjN2Coff6gYqvSRW', 1, NULL, '2023-03-28 01:33:02', '2023-03-28 01:34:16', 'cus_NbYuXUA1243Ij5', 'visa', '2395', NULL),
(76, NULL, 'hllwykv@yahoo.com', NULL, 0, 0, 0, 0, 0, 0, 4, NULL, NULL, '$2y$10$MxeW1eXrJ0kB2GZL/n7RHeIQ.7aY5V/KLFE9fRltHhU3FYgc5j8Ke', 1, NULL, '2023-04-05 04:18:07', '2023-04-05 04:18:07', 'cus_NegDmD226Uz4ak', NULL, NULL, NULL),
(77, 'me', 'me@me.com', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$sDwB.Nk6kXVDRhcP14R7meCgDo2bI4khHHtUy1wa9MPHl0Ke2C1mq', 1, NULL, '2023-04-15 17:08:58', '2023-04-15 17:08:58', NULL, NULL, NULL, NULL),
(78, NULL, 'leahricjards@icloud.com', NULL, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '$2y$10$nwVeM56jA4LGtjlH2gCCLOM/tx7voh6oW/R9XDyL9va2hcK4uMyVO', 1, NULL, '2023-05-02 21:24:06', '2023-05-02 21:24:07', 'cus_Np3rA7jHzStIoj', NULL, NULL, NULL),
(79, NULL, 'glenwhitaker1@gmail.com', NULL, 0, 0, 0, 0, 0, 0, 3, NULL, NULL, '$2y$10$t1bOZi90n80VihPIT9PfOe0X7f.9va.D3XLOj0YdhDKa.eEPhLCmi', 1, NULL, '2023-05-07 11:50:46', '2023-05-07 11:54:00', 'cus_NqmkOoU3MquHPz', 'visa', '8636', NULL),
(80, NULL, 'lynnhallykc@yahoo.com', NULL, 0, 0, 0, 0, 0, 0, 5, NULL, NULL, '$2y$10$n8Rywsme63dZP0Pw5TXXz.uxpmF1wk0Vq6PNhQQfualWr75n///Me', 1, NULL, '2023-05-09 17:14:21', '2023-05-09 17:14:21', 'cus_NrcQRU6JpmigfK', NULL, NULL, NULL),
(81, NULL, 'ash.king91984@gmail.com', NULL, 0, 0, 0, 0, 0, 0, 5, NULL, NULL, '$2y$10$FqdgKyqAMT/6bYE.hoIzVeFcZGcgnBC9wO/FHb8yPomkItO2HYzjm', 1, NULL, '2023-05-09 17:15:32', '2023-05-09 17:15:32', 'cus_NrcRgX1fnHpdZx', NULL, NULL, NULL),
(82, NULL, 'cordney.mc@gmail.com', NULL, 0, 0, 0, 0, 0, 0, 5, NULL, NULL, '$2y$10$NIkqk1qnansebQJ/bNvAjebbKrPREuagTF2tj0a7P2nRBk4cC.Jl6', 1, NULL, '2023-05-11 18:39:32', '2023-05-11 18:39:33', 'cus_NsOFR7WDW2ngzV', NULL, NULL, NULL),
(83, NULL, 'damon1914@gmail.com', NULL, 0, 0, 0, 0, 0, 0, 5, NULL, NULL, '$2y$10$/x60bL0zo5u9k8zki6d3LucSLfYX6LKOKhY5ga6pX4P5MZTnTl70y', 1, NULL, '2023-05-21 04:03:14', '2023-05-21 04:03:15', 'cus_NvuM2f1D9FMcsO', NULL, NULL, NULL),
(84, 'Be’eri', 'beerifreeahli@gmail.com', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$.5naWl9JNo6kgBl.Cnxs2uwD2T5Hb0XriD7kwolJDpCv8Mxj3VEm6', 1, NULL, '2023-05-26 16:22:30', '2023-05-26 16:22:31', 'cus_NxyQIWQbcD3vST', NULL, NULL, NULL),
(85, 'hamza', 'a@b.com', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$UMU2mnEcdIFsyoyj2wxqK.z8aHR28CYuWFzcEzVNKCnWjHO7NlYDy', 1, NULL, '2023-06-01 16:08:49', '2023-06-01 16:08:49', NULL, NULL, NULL, NULL),
(86, NULL, 'crystalwashington06@yahoo.com', NULL, 0, 0, 0, 0, 0, 0, 5, NULL, NULL, '$2y$10$rijl9fUbXZfcbrHbfcNUUOl0vvqJH.rpdnIS1bBOTGQG4nH9dizja', 1, NULL, '2023-06-02 01:18:38', '2023-06-02 01:18:39', 'cus_O0MQhJv3mZVsEo', NULL, NULL, NULL),
(87, 'Jeremy Hen', 'jeremyhen32@gmail.com', NULL, 0, 0, 0, 1, 0, 0, NULL, NULL, NULL, '$2y$10$dKllwnb6DM3YlY0DTYM/3.PiTORSpSnZM5BcnvHSpl5STjbwAOdeC', 1, NULL, '2023-06-02 01:29:49', '2023-06-23 23:36:00', 'cus_O0MbelCvPSqWBw', NULL, NULL, NULL),
(88, NULL, 'ketinasrn@gmail.com', NULL, 0, 0, 0, 0, 0, 0, 5, NULL, NULL, '$2y$10$NXNS8FUepLkaEGCIi1FUx.40sDV5H5F9Gfl/iZUZ9pNpnPzCzrciG', 1, NULL, '2023-06-02 01:32:24', '2023-06-02 01:32:25', 'cus_O0MeDoYkyHa6xZ', NULL, NULL, NULL),
(89, NULL, 'mekaj81@gmail.com', NULL, 0, 0, 0, 0, 0, 0, 5, NULL, NULL, '$2y$10$7Wy6vN89fWP90P3cEgDN3u9y1WE.oGghSspKrZliSfzUS.TyvN2h.', 1, NULL, '2023-06-02 02:42:27', '2023-06-02 02:42:28', 'cus_O0NmYZvMSHUnRl', NULL, NULL, NULL),
(91, NULL, 'clmlu09@yahoo.com', NULL, 0, 0, 0, 0, 0, 0, 2, NULL, NULL, '$2y$10$3dHsXB5omCNDPZMvSm1efO.Oy2TZ2lgx/7uc6iDbnZVzi3MGxlDM6', 1, NULL, '2023-06-02 18:38:58', '2023-06-02 18:43:08', 'cus_O0dCvMEGaqwUDz', 'visa', '8121', NULL),
(92, NULL, 'pay@me.com', NULL, 0, 0, 0, 0, 0, 0, 5, NULL, NULL, '$2y$10$HSiJ.PR/TEc5LScH5kMvauxN6lscxGdQpV70TWhM114vfLlQ7VBQu', 1, NULL, '2023-06-02 18:46:16', '2023-06-02 18:46:16', 'cus_O0dJuPm6XExW3K', NULL, NULL, NULL),
(93, NULL, 'onhitmusic@gmail.com', NULL, 0, 0, 0, 0, 0, 0, 5, NULL, NULL, '$2y$10$76tqwlcXipmaHLcPNl7EvO8kWMq1xOFTQm6NRofy/55NCqcNRQPQ6', 1, NULL, '2023-06-02 20:31:44', '2023-06-02 20:31:44', 'cus_O0f1nuVcfsJi7T', NULL, NULL, NULL),
(94, NULL, 'latashacruikshank@gmail.com', NULL, 0, 0, 0, 0, 0, 0, 2, NULL, NULL, '$2y$10$6g7AarBcHxqBEm8qsExFHOcAP2I/F.T8Q.Ec0tiwaAOZS9CioE6ky', 1, NULL, '2023-06-03 00:34:27', '2023-06-03 00:38:00', 'cus_O0iwML1ZCJPM4V', 'mastercard', '5384', NULL),
(95, 'qw', 'qw@qw.com', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '$2y$10$LKeQpKr2/LJVpIYB1vBmUemZG1iKllolGHi0AufcirS1EB8JIHdGe', 1, NULL, '2023-06-05 13:33:54', '2023-06-05 13:33:54', NULL, NULL, NULL, NULL),
(96, NULL, 'vbfitness32@gmail.com', NULL, 0, 0, 0, 0, 0, 0, 5, NULL, NULL, '$2y$10$gXfPN2igMvVH0nZiFAq/UeTJiLBi8D1O77hTo6Ya35UagmbNTkgAS', 1, NULL, '2023-06-06 16:27:55', '2023-06-06 16:27:55', 'cus_O25zC6bk0yAWqi', NULL, NULL, NULL),
(97, NULL, 'ashleighpeevy@gmail.com', NULL, 0, 0, 0, 0, 0, 0, 5, NULL, NULL, '$2y$10$fwPJqt.Nxle09QiQ.zgs9.dKQNWC8UxbL9YQRibtvvuBIrMX1DsBW', 1, NULL, '2023-06-07 13:38:37', '2023-06-07 13:48:23', 'cus_O2QUInSkVh4uiR', 'visa', '0184', NULL),
(98, NULL, 'haroldthegrea8@gmail.com', NULL, 0, 0, 0, 0, 0, 0, 5, NULL, NULL, '$2y$10$pYEm6UD1qXhCPjqggySKfO9GUbc2irj2mBbcd.JgkoOFEvx/3mHKG', 1, NULL, '2023-06-07 17:05:46', '2023-06-07 17:07:01', 'cus_O2TpbeCmRZ14P1', 'visa', '5081', NULL),
(100, NULL, 'lmitchellokcrealtor@gmail.com', NULL, 0, 0, 0, 0, 0, 0, 5, NULL, NULL, '$2y$10$XoEBwjwNUhWhNhvWlR6MNO8selcQJYeuTp0J8xNB/sRocumoi6Qpa', 1, NULL, '2023-06-13 20:46:34', '2023-06-13 20:50:18', 'cus_O4mkl49muNDkoc', 'visa', '2997', NULL),
(101, NULL, 'cmrobinson1876@gmail.com', NULL, 0, 0, 0, 0, 0, 0, 5, NULL, NULL, '$2y$10$xxaXnQemldWMswt2oCmKUu4V3/XH28LNZ1YXRmwEMVMjgpvE.aIW2', 1, NULL, '2023-06-17 23:13:48', '2023-06-17 23:16:03', 'cus_O6K1lSpNFOSogH', 'visa', '6892', NULL),
(102, NULL, 'powermoves405@gmail.com', NULL, 0, 0, 0, 0, 0, 0, 4, NULL, NULL, '$2y$10$aXrWng12lX2UWfodR/oca.rYCS5tgqrRrlDwm7tZvOXoDfKcSETiW', 1, NULL, '2023-06-18 06:03:46', '2023-06-18 06:03:47', 'cus_O6QdPgg6pYXzsI', NULL, NULL, NULL),
(103, NULL, 'test@test.com', NULL, 0, 0, 0, 1, 0, 0, 5, NULL, NULL, '$2y$10$55HbdIpyou.dIE1pcyn9TecIhyP9UC7d.FIClAHOz6su7bX4TkM9.', 1, NULL, '2023-06-20 15:25:18', '2023-06-20 19:59:54', 'cus_O7K8i2fIyRMz43', NULL, NULL, NULL),
(104, NULL, 'test@ref.com', 103, 0, 0, 0, 0, 0, 0, 5, NULL, NULL, '$2y$10$fShXn6tvriuBf5Gzz8rBOuJE11KaVUYkZd9ddYXnDLJEW9PJ/L7Ia', 1, NULL, '2023-06-20 20:10:01', '2023-06-20 20:10:02', 'cus_O7OjAZFSNSnjSc', NULL, NULL, NULL),
(105, NULL, 'neavenmorgan.nm@gmail.com', NULL, 0, 0, 0, 0, 0, 0, 3, NULL, NULL, '$2y$10$hSGBxaKkp038jrHjHrKQ1e/4AKV.fPlPbIZZbS04iCkgPr79QrJS6', 1, NULL, '2023-06-21 18:36:06', '2023-06-21 18:42:20', 'cus_O7kRmsFXyLtuYd', 'mastercard', '8468', NULL),
(106, NULL, 'smith.logan.scott@gmail.com', NULL, 0, 0, 0, 0, 0, 0, 4, NULL, NULL, '$2y$10$HB.QAj1bDcnJhDUCF70QBuWAyOJve8Bgmhdk9IyrYcmuM0wibvs9e', 1, NULL, '2023-06-23 16:53:34', '2023-06-23 16:55:29', 'cus_O8TFJSEvFs0lmV', 'visa', '6094', NULL),
(107, NULL, 'calvin.walton.ok@gmail.com', NULL, 0, 0, 0, 0, 0, 0, 5, NULL, NULL, '$2y$10$RMDgpSVQIT4T1MirKTa1B.3eGz5dhmD/eMfSlkIiAjlkRaDYDeZoC', 1, NULL, '2023-06-24 03:52:22', '2023-06-24 03:52:23', 'cus_O8dsJqTjJwKSdN', NULL, NULL, NULL),
(108, NULL, 'mvpfoots23@gmail.com', NULL, 0, 0, 0, 0, 0, 0, 5, NULL, NULL, '$2y$10$B1V9897ZVCYRqTBib3mnPOZ53q89Gl8Lx0z/I9PixuxDK9cmQehf2', 1, NULL, '2023-06-25 01:25:52', '2023-06-25 01:25:53', 'cus_O8yjbFR9o3AY4q', NULL, NULL, NULL),
(109, NULL, 'talmadgelawrence92@gmail.com', NULL, 0, 0, 0, 0, 0, 0, 5, NULL, NULL, '$2y$10$ciYZZDm1lKF/6ncWnhAmXuY54bKNS8hJ6pSN3A4JAls89cGVc9j8e', 1, NULL, '2023-06-25 01:28:37', '2023-06-25 01:28:38', 'cus_O8ymb8LaVRbKvY', NULL, NULL, NULL),
(110, NULL, 'javidreams2002@yahoo.com', NULL, 0, 0, 0, 0, 0, 0, 5, NULL, NULL, '$2y$10$gJintjCEPLuv84XdOaAL5.VNegkhlEhwzUw0pVBI9oASIsVd1kp.K', 1, NULL, '2023-06-25 01:39:28', '2023-06-26 02:48:38', 'cus_O8yxqMjMpPb0BY', 'visa', '6202', NULL),
(111, NULL, 'cubit3.devin@gmail.com', NULL, 0, 0, 0, 0, 0, 0, 5, NULL, NULL, '$2y$10$ffl3B7Vhm9S2fZutR3IKouqCNRTgJMB2e/uBPUoAZ8l.7kveUpfI6', 1, NULL, '2023-06-25 01:46:19', '2023-06-25 01:46:20', 'cus_O8z4MfYhesbbww', NULL, NULL, NULL),
(112, NULL, 'krisbarnes366@gmail.com', NULL, 0, 0, 0, 0, 0, 0, 5, NULL, NULL, '$2y$10$sVOBLpV6qilVoAVtbmNyEOaZcWsfpQ6hfLptYVonCaJgkc3PSL4cK', 1, NULL, '2023-06-25 02:26:14', '2023-06-25 02:26:15', 'cus_O8zhdyOVeNMUOO', NULL, NULL, NULL),
(113, NULL, 'jordankmcnelly@gmail.com', NULL, 0, 0, 0, 0, 0, 0, 5, NULL, NULL, '$2y$10$zzxvDhXinGvVXv9V8rjtEu2IR0QSTF0W1Qhb1Zbhw.wwlRY3cCSEe', 1, NULL, '2023-06-25 03:30:16', '2023-06-25 03:30:17', 'cus_O90j4UMWXHdZWf', NULL, NULL, NULL),
(114, NULL, 'mikequickjr@gmail.com', NULL, 0, 0, 0, 0, 0, 0, 5, NULL, NULL, '$2y$10$3ifPGS9VH7MgdM1aB6.xjO9J/e/LX8BzFnEHNHZ9xZX5GUXGkecbu', 1, NULL, '2023-06-25 04:22:05', '2023-07-02 01:39:01', 'cus_O91ZsV0S4GLkcm', 'visa', '6962', NULL),
(115, NULL, 'joshua.udoumoh@vcstulsa.org', NULL, 0, 0, 0, 0, 0, 0, 5, NULL, NULL, '$2y$10$nWLlUcatHXfGqrtl.ZoyruPvlkBkJaptaTU8QbAkLMcGV9iXBccvu', 1, NULL, '2023-06-25 10:03:49', '2023-06-25 10:03:50', 'cus_O975CKEozkDSwv', NULL, NULL, NULL),
(116, NULL, 'jarezupc123@gmail.com', NULL, 0, 0, 0, 0, 0, 0, 5, NULL, NULL, '$2y$10$OeEnvMgWjW7E9rN8v4wLX.D3CYhl0XdqiJ7A6bzmDR.5e8XTs0KX6', 1, NULL, '2023-06-25 15:19:48', '2023-06-25 15:19:49', 'cus_O9CBKtTnNWqu2B', NULL, NULL, NULL),
(117, NULL, 'scougill2593@yahoo.com', NULL, 0, 0, 0, 0, 0, 0, 5, NULL, NULL, '$2y$10$.m6qbCaUtzC9UH2lwwlmKOp6OZ/DLYTdGWRXFpu1d2UviVwMc7D1C', 1, NULL, '2023-06-25 15:41:59', '2023-06-25 15:41:59', 'cus_O9CX9LGxgVwY7n', NULL, NULL, NULL),
(118, NULL, 'erikjohnson34.ej@gmail.com', NULL, 0, 0, 0, 0, 0, 0, 5, NULL, NULL, '$2y$10$tJtfuceg6n4CixpFy8MMcukt82UDI13l3X.ZgmZAmiAIiNSrlT5Yi', 1, NULL, '2023-06-25 22:37:20', '2023-06-25 22:37:21', 'cus_O9JF8fFPnEpjL6', NULL, NULL, NULL),
(119, NULL, 'kheyouratipton@yahoo.com', NULL, 0, 0, 0, 0, 0, 0, 4, NULL, NULL, '$2y$10$1XGuB0PNgZ/Fxn6PckUNMOq9JDgyVAd0tYpAzk/CDvTjGNFRvp4se', 1, NULL, '2023-06-26 20:51:05', '2023-06-26 20:56:30', 'cus_O9ekJUSASuNIwy', 'visa', '8644', NULL),
(120, NULL, 'rolando.gardner@yahoo.com', NULL, 0, 0, 0, 0, 0, 0, 5, NULL, NULL, '$2y$10$/eiAXhzN3xJiE68NPXJbZOQZko0QXUofLfZ95MUZxmGZjq9A.0ucO', 1, NULL, '2023-06-28 17:45:59', '2023-06-28 17:46:00', 'cus_OAMDK1diiDNlMY', NULL, NULL, NULL),
(121, NULL, 'randallconley15@gmail.com', NULL, 0, 0, 0, 0, 0, 0, 5, NULL, NULL, '$2y$10$HbMdTaYQ3y2dsdM9xxmZcuDJSHtMnX7Wv6R3aoT9nfkgEsWN0l2jW', 1, NULL, '2023-06-28 20:42:38', '2023-06-28 20:45:39', 'cus_OAP45iEa1jeVBC', 'visa', '9843', NULL),
(122, NULL, 'jousleybrown@gmail.com', NULL, 0, 0, 0, 0, 0, 0, 5, NULL, NULL, '$2y$10$I/56Uw2LNwLJZPVkKfQiK.aJdqOsdMwENzTV9R9ERQAb7l0S5tPzq', 1, NULL, '2023-06-29 00:46:07', '2023-06-29 00:46:07', 'cus_OASzPp5t3GPcAR', NULL, NULL, NULL),
(123, NULL, 'kris4006@hotmail.com', NULL, 0, 0, 0, 0, 0, 0, 5, NULL, NULL, '$2y$10$fIiB82TJ0lqN7LHgDOQ3tOcz6VVYzh30Tngk1kqVqt0d89guZ1Z7m', 1, NULL, '2023-06-29 17:31:15', '2023-06-29 17:31:15', 'cus_OAjCj3d3Lp8Mjv', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `profile_id` bigint(20) UNSIGNED DEFAULT NULL,
  `viewable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `viewable_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `user_id`, `profile_id`, `viewable_type`, `viewable_id`, `created_at`, `updated_at`) VALUES
(2, 42, 13, 'Modules\\Movie\\Entities\\Movie', 4, '2023-02-19 00:12:17', '2023-02-19 00:12:17'),
(3, 42, 13, 'Modules\\Show\\Entities\\Episode', 11, '2023-02-19 00:26:02', '2023-02-19 00:26:02'),
(4, 42, 13, 'Modules\\Show\\Entities\\Episode', 11, '2023-02-19 00:26:02', '2023-02-19 00:26:02'),
(5, 42, 13, 'Modules\\Show\\Entities\\Episode', 11, '2023-02-19 00:26:02', '2023-02-19 00:26:02'),
(6, 14, 8, 'Modules\\Show\\Entities\\Episode', 11, '2023-02-19 12:13:42', '2023-02-19 12:13:42'),
(7, 12, 7, 'Modules\\Show\\Entities\\Episode', 11, '2023-02-20 04:03:08', '2023-02-20 04:03:08'),
(8, 12, 7, 'Modules\\Show\\Entities\\Episode', 11, '2023-02-20 04:03:23', '2023-02-20 04:03:23'),
(9, 12, 7, 'Modules\\Show\\Entities\\Episode', 1, '2023-02-20 04:05:15', '2023-02-20 04:05:15'),
(10, 12, 7, 'Modules\\Show\\Entities\\Episode', 1, '2023-02-20 04:05:20', '2023-02-20 04:05:20'),
(11, 42, 13, 'Modules\\Movie\\Entities\\Movie', 4, '2023-02-23 03:09:45', '2023-02-23 03:09:45'),
(12, 42, 13, 'Modules\\Movie\\Entities\\Movie', 4, '2023-02-23 03:12:11', '2023-02-23 03:12:11'),
(13, 42, 13, 'Modules\\Movie\\Entities\\Movie', 4, '2023-02-23 03:17:36', '2023-02-23 03:17:36'),
(14, 42, 13, 'Modules\\Movie\\Entities\\Movie', 4, '2023-02-23 03:17:46', '2023-02-23 03:17:46'),
(15, 42, 13, 'Modules\\Movie\\Entities\\Movie', 4, '2023-02-23 03:18:09', '2023-02-23 03:18:09'),
(16, 42, 13, 'Modules\\Movie\\Entities\\Movie', 4, '2023-02-23 03:19:25', '2023-02-23 03:19:25'),
(17, 42, 13, 'Modules\\Movie\\Entities\\Movie', 4, '2023-02-23 03:20:03', '2023-02-23 03:20:03'),
(18, 42, 13, 'Modules\\Show\\Entities\\Episode', 11, '2023-02-23 03:20:36', '2023-02-23 03:20:36'),
(19, 42, 13, 'Modules\\Show\\Entities\\Episode', 11, '2023-02-23 03:23:54', '2023-02-23 03:23:54'),
(20, 42, 13, 'Modules\\Movie\\Entities\\Movie', 4, '2023-02-23 03:24:29', '2023-02-23 03:24:29'),
(21, 14, 8, 'Modules\\Show\\Entities\\Episode', 11, '2023-02-26 08:35:00', '2023-02-26 08:35:00'),
(22, 14, 8, 'Modules\\Show\\Entities\\Episode', 8, '2023-02-26 09:04:10', '2023-02-26 09:04:10'),
(23, 14, 8, 'Modules\\Show\\Entities\\Episode', 8, '2023-02-26 09:04:17', '2023-02-26 09:04:17'),
(24, 14, 8, 'Modules\\Show\\Entities\\Episode', 8, '2023-02-26 09:04:27', '2023-02-26 09:04:27'),
(25, 14, 8, 'Modules\\Show\\Entities\\Episode', 9, '2023-02-26 09:04:45', '2023-02-26 09:04:45'),
(26, 14, 8, 'Modules\\Show\\Entities\\Episode', 9, '2023-02-26 09:05:33', '2023-02-26 09:05:33'),
(27, 14, 8, 'Modules\\Show\\Entities\\Episode', 8, '2023-02-26 09:06:08', '2023-02-26 09:06:08'),
(28, 14, 8, 'Modules\\Show\\Entities\\Episode', 1, '2023-02-26 09:06:44', '2023-02-26 09:06:44'),
(29, 14, 8, 'Modules\\Show\\Entities\\Episode', 2, '2023-02-26 09:06:51', '2023-02-26 09:06:51'),
(30, 14, 8, 'Modules\\Show\\Entities\\Episode', 3, '2023-02-26 09:07:00', '2023-02-26 09:07:00'),
(31, 14, 8, 'Modules\\Show\\Entities\\Episode', 4, '2023-02-26 09:07:06', '2023-02-26 09:07:06'),
(32, 14, 8, 'Modules\\Show\\Entities\\Episode', 5, '2023-02-26 09:07:11', '2023-02-26 09:07:11'),
(33, 14, 8, 'Modules\\Show\\Entities\\Episode', 6, '2023-02-26 09:07:16', '2023-02-26 09:07:16'),
(34, 14, 8, 'Modules\\Show\\Entities\\Episode', 7, '2023-02-26 09:07:22', '2023-02-26 09:07:22'),
(35, 14, 8, 'Modules\\Show\\Entities\\Episode', 7, '2023-02-26 09:07:25', '2023-02-26 09:07:25'),
(36, 14, 8, 'Modules\\Show\\Entities\\Episode', 8, '2023-02-26 09:08:13', '2023-02-26 09:08:13'),
(37, 14, 8, 'Modules\\Movie\\Entities\\Movie', 4, '2023-02-26 09:09:03', '2023-02-26 09:09:03'),
(38, 14, 8, 'Modules\\Show\\Entities\\Episode', 8, '2023-02-26 09:39:59', '2023-02-26 09:39:59'),
(39, 14, 8, 'Modules\\Show\\Entities\\Episode', 8, '2023-02-26 10:04:29', '2023-02-26 10:04:29'),
(40, 42, 13, 'Modules\\Show\\Entities\\Episode', 8, '2023-02-26 10:08:48', '2023-02-26 10:08:48'),
(41, 14, 8, 'Modules\\Show\\Entities\\Episode', 8, '2023-02-26 10:10:15', '2023-02-26 10:10:15'),
(42, 42, 13, 'Modules\\Show\\Entities\\Episode', 8, '2023-02-26 10:12:11', '2023-02-26 10:12:11'),
(43, 14, 8, 'Modules\\Show\\Entities\\Episode', 11, '2023-02-26 10:52:59', '2023-02-26 10:52:59'),
(44, 14, 8, 'Modules\\Show\\Entities\\Episode', 8, '2023-02-26 10:53:33', '2023-02-26 10:53:33'),
(45, 14, 8, 'Modules\\Show\\Entities\\Episode', 8, '2023-02-26 10:55:00', '2023-02-26 10:55:00'),
(46, 14, 8, 'Modules\\Show\\Entities\\Episode', 8, '2023-02-27 01:38:26', '2023-02-27 01:38:26'),
(47, 14, 8, 'Modules\\Show\\Entities\\Episode', 9, '2023-02-27 08:46:05', '2023-02-27 08:46:05'),
(48, 42, 13, 'Modules\\Show\\Entities\\Episode', 9, '2023-02-27 08:46:49', '2023-02-27 08:46:49'),
(49, 42, 13, 'Modules\\Show\\Entities\\Episode', 9, '2023-02-27 08:51:01', '2023-02-27 08:51:01'),
(50, 14, 8, 'Modules\\Show\\Entities\\Episode', 8, '2023-03-03 11:34:35', '2023-03-03 11:34:35'),
(51, 42, 13, 'Modules\\Show\\Entities\\Episode', 8, '2023-03-04 04:56:17', '2023-03-04 04:56:17'),
(54, 14, 8, 'Modules\\Show\\Entities\\Episode', 8, '2023-03-13 08:01:49', '2023-03-13 08:01:49'),
(55, 14, 8, 'Modules\\Movie\\Entities\\Movie', 4, '2023-03-13 08:03:56', '2023-03-13 08:03:56'),
(56, 14, 8, 'Modules\\Show\\Entities\\Episode', 10, '2023-03-16 09:35:07', '2023-03-16 09:35:07'),
(57, 14, 8, 'Modules\\Show\\Entities\\Episode', 11, '2023-03-16 09:40:44', '2023-03-16 09:40:44'),
(58, 14, 8, 'Modules\\Show\\Entities\\Episode', 8, '2023-03-16 10:11:05', '2023-03-16 10:11:05'),
(59, 42, 13, 'Modules\\Movie\\Entities\\Movie', 4, '2023-03-21 05:38:17', '2023-03-21 05:38:17'),
(61, 14, 8, 'Modules\\Movie\\Entities\\Movie', 4, '2023-03-24 06:42:11', '2023-03-24 06:42:11'),
(63, 42, 13, 'Modules\\Movie\\Entities\\Movie', 1, '2023-03-24 07:45:35', '2023-03-24 07:45:35'),
(64, 42, 13, 'Modules\\Movie\\Entities\\Movie', 4, '2023-03-24 07:46:29', '2023-03-24 07:46:29'),
(65, 42, 13, 'Modules\\Show\\Entities\\Episode', 8, '2023-03-24 07:46:53', '2023-03-24 07:46:53'),
(66, 42, 13, 'Modules\\Show\\Entities\\Episode', 9, '2023-03-24 07:47:18', '2023-03-24 07:47:18'),
(67, 14, 8, 'Modules\\Show\\Entities\\Episode', 8, '2023-03-25 22:11:01', '2023-03-25 22:11:01'),
(68, 42, 13, 'Modules\\Movie\\Entities\\Movie', 1, '2023-03-27 04:20:41', '2023-03-27 04:20:41'),
(69, 42, 13, 'Modules\\Movie\\Entities\\Movie', 1, '2023-03-27 04:21:17', '2023-03-27 04:21:17'),
(70, 75, 82, 'Modules\\Movie\\Entities\\Movie', 4, '2023-03-28 01:35:49', '2023-03-28 01:35:49'),
(71, 14, 8, 'Modules\\Show\\Entities\\Episode', 8, '2023-04-01 01:32:54', '2023-04-01 01:32:54'),
(72, 76, 83, 'Modules\\Show\\Entities\\Episode', 10, '2023-04-05 04:28:12', '2023-04-05 04:28:12'),
(73, 76, 83, 'Modules\\Movie\\Entities\\Movie', 1, '2023-04-06 04:42:44', '2023-04-06 04:42:44'),
(74, 76, 83, 'Modules\\Movie\\Entities\\Movie', 1, '2023-04-06 04:53:59', '2023-04-06 04:53:59'),
(75, 76, 83, 'Modules\\Movie\\Entities\\Movie', 4, '2023-04-06 04:57:55', '2023-04-06 04:57:55'),
(76, 42, 13, 'Modules\\Movie\\Entities\\Movie', 4, '2023-04-06 20:42:59', '2023-04-06 20:42:59'),
(77, 42, 13, 'Modules\\Show\\Entities\\Episode', 8, '2023-04-06 21:05:19', '2023-04-06 21:05:19'),
(78, 42, 13, 'Modules\\Show\\Entities\\Episode', 8, '2023-04-06 21:06:14', '2023-04-06 21:06:14'),
(79, 42, 13, 'Modules\\Movie\\Entities\\Movie', 4, '2023-04-06 21:09:41', '2023-04-06 21:09:41'),
(80, 42, 13, 'Modules\\Movie\\Entities\\Movie', 1, '2023-04-06 21:29:54', '2023-04-06 21:29:54'),
(81, 42, 13, 'Modules\\Movie\\Entities\\Movie', 1, '2023-04-06 23:11:03', '2023-04-06 23:11:03'),
(82, 14, 8, 'Modules\\Show\\Entities\\Episode', 1, '2023-04-08 23:17:03', '2023-04-08 23:17:03'),
(83, 14, 8, 'Modules\\Show\\Entities\\Episode', 2, '2023-04-08 23:47:42', '2023-04-08 23:47:42'),
(84, 12, 7, 'Modules\\Movie\\Entities\\Movie', 4, '2023-04-15 17:41:14', '2023-04-15 17:41:14'),
(85, 12, 7, 'Modules\\Movie\\Entities\\Movie', 4, '2023-04-15 17:41:23', '2023-04-15 17:41:23'),
(86, 12, 7, 'Modules\\Movie\\Entities\\Movie', 4, '2023-04-15 17:43:45', '2023-04-15 17:43:45'),
(87, 12, 7, 'Modules\\Movie\\Entities\\Movie', 4, '2023-04-15 17:45:12', '2023-04-15 17:45:12'),
(88, 12, 7, 'Modules\\Movie\\Entities\\Movie', 4, '2023-04-15 18:17:50', '2023-04-15 18:17:50'),
(89, 12, 7, 'Modules\\Movie\\Entities\\Movie', 4, '2023-04-15 18:19:00', '2023-04-15 18:19:00'),
(90, 12, 7, 'Modules\\Movie\\Entities\\Movie', 4, '2023-04-15 19:46:14', '2023-04-15 19:46:14'),
(93, 12, 7, 'Modules\\Movie\\Entities\\Movie', 5, '2023-04-17 16:18:16', '2023-04-17 16:18:16'),
(94, 42, 13, 'Modules\\Show\\Entities\\Episode', 8, '2023-04-17 19:40:50', '2023-04-17 19:40:50'),
(95, 42, 13, 'Modules\\Show\\Entities\\Episode', 9, '2023-04-17 19:43:02', '2023-04-17 19:43:02'),
(96, 12, 87, 'Modules\\Show\\Entities\\Episode', 1, '2023-04-17 22:56:35', '2023-04-17 22:56:35'),
(97, 14, 8, 'Modules\\Movie\\Entities\\Movie', 4, '2023-04-19 15:09:07', '2023-04-19 15:09:07'),
(98, 14, 8, 'Modules\\Movie\\Entities\\Movie', 4, '2023-04-20 23:01:06', '2023-04-20 23:01:06'),
(99, 42, 13, 'Modules\\Movie\\Entities\\Movie', 5, '2023-04-25 14:55:19', '2023-04-25 14:55:19'),
(100, 42, 13, 'Modules\\Movie\\Entities\\Movie', 5, '2023-04-25 14:55:49', '2023-04-25 14:55:49'),
(101, 42, 13, 'Modules\\Movie\\Entities\\Movie', 5, '2023-04-25 14:57:51', '2023-04-25 14:57:51'),
(102, 78, 94, 'Modules\\Show\\Entities\\Episode', 8, '2023-05-02 21:29:09', '2023-05-02 21:29:09'),
(103, 21, 95, 'Modules\\Show\\Entities\\Episode', 8, '2023-05-03 00:50:31', '2023-05-03 00:50:31'),
(104, 14, 8, 'Modules\\Movie\\Entities\\Movie', 4, '2023-05-04 03:06:55', '2023-05-04 03:06:55'),
(105, 14, 8, 'Modules\\Show\\Entities\\Episode', 1, '2023-05-06 21:08:57', '2023-05-06 21:08:57'),
(106, 14, 8, 'Modules\\Show\\Entities\\Episode', 8, '2023-05-06 22:19:00', '2023-05-06 22:19:00'),
(107, 79, 96, 'Modules\\Movie\\Entities\\Movie', 4, '2023-05-07 11:56:50', '2023-05-07 11:56:50'),
(108, 12, 87, 'Modules\\Movie\\Entities\\Movie', 4, '2023-05-08 15:51:49', '2023-05-08 15:51:49'),
(111, 42, 13, 'Modules\\Movie\\Entities\\Movie', 5, '2023-05-10 18:02:51', '2023-05-10 18:02:51'),
(112, 42, 13, 'Modules\\Movie\\Entities\\Movie', 4, '2023-05-10 18:04:12', '2023-05-10 18:04:12'),
(113, 12, 7, 'Modules\\Movie\\Entities\\Movie', 4, '2023-05-10 18:08:34', '2023-05-10 18:08:34'),
(114, 12, 87, 'Modules\\Movie\\Entities\\Movie', 5, '2023-05-10 18:09:38', '2023-05-10 18:09:38'),
(115, 42, 13, 'Modules\\Movie\\Entities\\Movie', 5, '2023-05-10 20:59:25', '2023-05-10 20:59:25'),
(116, 42, 13, 'Modules\\Show\\Entities\\Episode', 8, '2023-05-10 21:00:14', '2023-05-10 21:00:14'),
(117, 42, 13, 'Modules\\Show\\Entities\\Episode', 8, '2023-05-10 21:21:04', '2023-05-10 21:21:04'),
(118, 42, 13, 'Modules\\Show\\Entities\\Episode', 11, '2023-05-10 21:42:19', '2023-05-10 21:42:19'),
(119, 42, 13, 'Modules\\Show\\Entities\\Episode', 11, '2023-05-10 21:42:48', '2023-05-10 21:42:48'),
(120, 14, 8, 'Modules\\Show\\Entities\\Episode', 8, '2023-05-10 21:46:15', '2023-05-10 21:46:15'),
(121, 12, 87, 'Modules\\Movie\\Entities\\Movie', 5, '2023-05-11 15:36:12', '2023-05-11 15:36:12'),
(122, 12, 7, 'Modules\\Movie\\Entities\\Movie', 5, '2023-05-12 14:27:18', '2023-05-12 14:27:18'),
(123, 12, 7, 'Modules\\Movie\\Entities\\Movie', 5, '2023-05-12 18:51:35', '2023-05-12 18:51:35'),
(124, 12, 7, 'Modules\\Show\\Entities\\Episode', 1, '2023-05-12 18:52:43', '2023-05-12 18:52:43'),
(125, 12, 87, 'Modules\\Show\\Entities\\Episode', 9, '2023-05-13 17:11:37', '2023-05-13 17:11:37'),
(126, 82, 101, 'Modules\\Movie\\Entities\\Movie', 4, '2023-05-16 04:51:53', '2023-05-16 04:51:53'),
(127, 82, 101, 'Modules\\Movie\\Entities\\Movie', 5, '2023-05-16 05:23:24', '2023-05-16 05:23:24'),
(128, 14, 8, 'Modules\\Show\\Entities\\Episode', 8, '2023-05-17 19:00:36', '2023-05-17 19:00:36'),
(134, 12, 87, 'Modules\\Movie\\Entities\\Movie', 4, '2023-05-19 22:58:33', '2023-05-19 22:58:33'),
(135, 12, 87, 'Modules\\Movie\\Entities\\Movie', 4, '2023-05-19 23:33:06', '2023-05-19 23:33:06'),
(136, 12, 87, 'Modules\\Movie\\Entities\\Movie', 4, '2023-05-19 23:34:23', '2023-05-19 23:34:23'),
(137, 12, 87, 'Modules\\Movie\\Entities\\Movie', 5, '2023-05-19 23:35:57', '2023-05-19 23:35:57'),
(138, 12, 87, 'Modules\\Movie\\Entities\\Movie', 5, '2023-05-19 23:40:44', '2023-05-19 23:40:44'),
(139, 12, 87, 'Modules\\Movie\\Entities\\Movie', 5, '2023-05-19 23:53:04', '2023-05-19 23:53:04'),
(140, 42, 13, 'Modules\\Movie\\Entities\\Movie', 5, '2023-05-20 01:34:26', '2023-05-20 01:34:26'),
(141, 42, 13, 'Modules\\Movie\\Entities\\Movie', 5, '2023-05-20 01:37:39', '2023-05-20 01:37:39'),
(142, 12, 87, 'Modules\\Movie\\Entities\\Movie', 5, '2023-05-20 02:25:36', '2023-05-20 02:25:36'),
(143, 12, 87, 'Modules\\Movie\\Entities\\Movie', 5, '2023-05-20 02:25:54', '2023-05-20 02:25:54'),
(144, 12, 87, 'Modules\\Movie\\Entities\\Movie', 1, '2023-05-20 02:26:28', '2023-05-20 02:26:28'),
(145, 12, 87, 'Modules\\Movie\\Entities\\Movie', 5, '2023-05-20 02:26:48', '2023-05-20 02:26:48'),
(146, 12, 87, 'Modules\\Movie\\Entities\\Movie', 5, '2023-05-20 02:29:23', '2023-05-20 02:29:23'),
(147, 12, 87, 'Modules\\Movie\\Entities\\Movie', 5, '2023-05-20 02:30:02', '2023-05-20 02:30:02'),
(148, 12, 87, 'Modules\\Movie\\Entities\\Movie', 5, '2023-05-20 15:07:34', '2023-05-20 15:07:34'),
(149, 12, 87, 'Modules\\Movie\\Entities\\Movie', 5, '2023-05-20 15:08:42', '2023-05-20 15:08:42'),
(150, 12, 87, 'Modules\\Movie\\Entities\\Movie', 5, '2023-05-20 15:09:55', '2023-05-20 15:09:55'),
(151, 83, 102, 'Modules\\Movie\\Entities\\Movie', 4, '2023-05-21 04:07:24', '2023-05-21 04:07:24'),
(152, 14, 8, 'Modules\\Movie\\Entities\\Movie', 5, '2023-05-27 03:28:08', '2023-05-27 03:28:08'),
(153, 14, 8, 'Modules\\Show\\Entities\\Episode', 10, '2023-05-28 20:15:48', '2023-05-28 20:15:48'),
(154, 14, 8, 'Modules\\Show\\Entities\\Episode', 8, '2023-05-30 00:39:19', '2023-05-30 00:39:19'),
(155, 42, 13, 'Modules\\Show\\Entities\\Episode', 8, '2023-05-31 14:56:34', '2023-05-31 14:56:34'),
(156, 42, 13, 'Modules\\Show\\Entities\\Episode', 8, '2023-05-31 17:04:07', '2023-05-31 17:04:07'),
(157, 12, 87, 'Modules\\Show\\Entities\\Episode', 11, '2023-06-01 16:02:35', '2023-06-01 16:02:35'),
(158, 12, 87, 'Modules\\Show\\Entities\\Episode', 11, '2023-06-01 16:04:44', '2023-06-01 16:04:44'),
(159, 12, 87, 'Modules\\Movie\\Entities\\Movie', 4, '2023-06-02 02:42:59', '2023-06-02 02:42:59'),
(160, 12, 87, 'Modules\\Movie\\Entities\\Movie', 4, '2023-06-02 02:44:01', '2023-06-02 02:44:01'),
(161, 12, 87, 'Modules\\Show\\Entities\\Episode', 11, '2023-06-02 20:06:05', '2023-06-02 20:06:05'),
(162, 12, 87, 'Modules\\Show\\Entities\\Episode', 8, '2023-06-02 20:12:16', '2023-06-02 20:12:16'),
(163, 12, 87, 'Modules\\Movie\\Entities\\Movie', 5, '2023-06-02 20:16:19', '2023-06-02 20:16:19'),
(164, 12, 87, 'Modules\\Movie\\Entities\\Movie', 4, '2023-06-02 20:22:42', '2023-06-02 20:22:42'),
(165, 12, 87, 'Modules\\Show\\Entities\\Episode', 11, '2023-06-02 20:26:42', '2023-06-02 20:26:42'),
(166, 12, 87, 'Modules\\Movie\\Entities\\Movie', 5, '2023-06-02 20:33:50', '2023-06-02 20:33:50'),
(167, 42, 13, 'Modules\\Movie\\Entities\\Movie', 4, '2023-06-03 18:36:52', '2023-06-03 18:36:52'),
(168, 42, 13, 'Modules\\Movie\\Entities\\Movie', 5, '2023-06-03 18:41:08', '2023-06-03 18:41:08'),
(169, 42, 13, 'Modules\\Show\\Entities\\Episode', 8, '2023-06-05 16:34:44', '2023-06-05 16:34:44'),
(170, 42, 13, 'Modules\\Show\\Entities\\Episode', 9, '2023-06-05 16:49:43', '2023-06-05 16:49:43'),
(171, 14, 8, 'Modules\\Show\\Entities\\Episode', 11, '2023-06-06 20:14:12', '2023-06-06 20:14:12'),
(172, 79, 96, 'Modules\\Movie\\Entities\\Movie', 4, '2023-06-07 07:05:49', '2023-06-07 07:05:49'),
(173, 79, 96, 'Modules\\Show\\Entities\\Episode', 11, '2023-06-07 08:00:00', '2023-06-07 08:00:00'),
(174, 14, 8, 'Modules\\Show\\Entities\\Episode', 9, '2023-06-07 17:47:00', '2023-06-07 17:47:00'),
(175, 14, 8, 'Modules\\Movie\\Entities\\Movie', 5, '2023-06-07 18:04:11', '2023-06-07 18:04:11'),
(176, 12, 87, 'Modules\\Movie\\Entities\\Movie', 4, '2023-06-12 17:37:18', '2023-06-12 17:37:18'),
(177, 42, 13, 'Modules\\Show\\Entities\\Episode', 8, '2023-06-13 21:04:00', '2023-06-13 21:04:00'),
(178, 100, 114, 'Modules\\Movie\\Entities\\Movie', 5, '2023-06-13 22:40:34', '2023-06-13 22:40:34'),
(179, 79, 96, 'Modules\\Show\\Entities\\Episode', 11, '2023-06-14 00:27:20', '2023-06-14 00:27:20'),
(180, 79, 96, 'Modules\\Show\\Entities\\Episode', 8, '2023-06-14 00:40:20', '2023-06-14 00:40:20'),
(181, 101, 115, 'Modules\\Movie\\Entities\\Movie', 5, '2023-06-17 23:24:13', '2023-06-17 23:24:13'),
(182, 101, 115, 'Modules\\Movie\\Entities\\Movie', 4, '2023-06-17 23:24:32', '2023-06-17 23:24:32'),
(183, 42, 13, 'Modules\\Show\\Entities\\Episode', 8, '2023-06-20 20:27:27', '2023-06-20 20:27:27'),
(184, 105, 117, 'Modules\\Show\\Entities\\Episode', 9, '2023-06-21 18:44:30', '2023-06-21 18:44:30'),
(185, 105, 117, 'Modules\\Show\\Entities\\Episode', 9, '2023-06-21 18:45:28', '2023-06-21 18:45:28'),
(186, 105, 117, 'Modules\\Show\\Entities\\Episode', 9, '2023-06-21 18:47:44', '2023-06-21 18:47:44'),
(187, 105, 117, 'Modules\\Show\\Entities\\Episode', 9, '2023-06-21 18:48:24', '2023-06-21 18:48:24'),
(188, 105, 117, 'Modules\\Show\\Entities\\Episode', 9, '2023-06-21 18:49:51', '2023-06-21 18:49:51'),
(189, 105, 117, 'Modules\\Show\\Entities\\Episode', 9, '2023-06-21 18:54:56', '2023-06-21 18:54:56'),
(190, 105, 117, 'Modules\\Show\\Entities\\Episode', 9, '2023-06-22 17:23:43', '2023-06-22 17:23:43'),
(191, 105, 117, 'Modules\\Show\\Entities\\Episode', 9, '2023-06-22 17:25:07', '2023-06-22 17:25:07'),
(192, 105, 117, 'Modules\\Show\\Entities\\Episode', 9, '2023-06-23 16:10:26', '2023-06-23 16:10:26'),
(193, 105, 117, 'Modules\\Show\\Entities\\Episode', 9, '2023-06-23 16:12:35', '2023-06-23 16:12:35'),
(194, 105, 117, 'Modules\\Show\\Entities\\Episode', 9, '2023-06-23 16:12:48', '2023-06-23 16:12:48'),
(195, 105, 117, 'Modules\\Show\\Entities\\Episode', 9, '2023-06-23 16:13:23', '2023-06-23 16:13:23'),
(196, 42, 13, 'Modules\\Movie\\Entities\\Movie', 5, '2023-06-23 17:08:28', '2023-06-23 17:08:28'),
(197, 106, 118, 'Modules\\Movie\\Entities\\Movie', 5, '2023-06-23 17:10:07', '2023-06-23 17:10:07'),
(198, 106, 118, 'Modules\\Movie\\Entities\\Movie', 4, '2023-06-23 17:11:35', '2023-06-23 17:11:35'),
(199, 106, 118, 'Modules\\Movie\\Entities\\Movie', 5, '2023-06-23 17:17:35', '2023-06-23 17:17:35'),
(200, 105, 117, 'Modules\\Show\\Entities\\Episode', 9, '2023-06-23 17:50:11', '2023-06-23 17:50:11'),
(201, 14, 8, 'Modules\\Show\\Entities\\Episode', 14, '2023-06-25 00:14:57', '2023-06-25 00:14:57'),
(202, 14, 8, 'Modules\\Show\\Entities\\Episode', 17, '2023-06-25 01:19:56', '2023-06-25 01:19:56'),
(203, 14, 8, 'Modules\\Show\\Entities\\Episode', 18, '2023-06-25 01:20:25', '2023-06-25 01:20:25'),
(204, 14, 8, 'Modules\\Show\\Entities\\Episode', 16, '2023-06-25 01:20:45', '2023-06-25 01:20:45'),
(205, 42, 13, 'Modules\\Show\\Entities\\Episode', 19, '2023-06-25 02:06:30', '2023-06-25 02:06:30'),
(206, 42, 13, 'Modules\\Show\\Entities\\Episode', 18, '2023-06-25 02:06:57', '2023-06-25 02:06:57'),
(207, 42, 13, 'Modules\\Show\\Entities\\Episode', 17, '2023-06-25 02:07:20', '2023-06-25 02:07:20'),
(208, 14, 8, 'Modules\\Show\\Entities\\Episode', 12, '2023-06-25 02:45:35', '2023-06-25 02:45:35'),
(209, 14, 8, 'Modules\\Show\\Entities\\Episode', 17, '2023-06-25 02:45:52', '2023-06-25 02:45:52'),
(210, 42, 13, 'Modules\\Show\\Entities\\Episode', 19, '2023-06-25 02:55:15', '2023-06-25 02:55:15'),
(211, 42, 13, 'Modules\\Show\\Entities\\Episode', 17, '2023-06-25 02:55:36', '2023-06-25 02:55:36'),
(212, 42, 13, 'Modules\\Show\\Entities\\Episode', 16, '2023-06-25 02:56:05', '2023-06-25 02:56:05'),
(213, 42, 13, 'Modules\\Show\\Entities\\Episode', 15, '2023-06-25 02:56:19', '2023-06-25 02:56:19'),
(214, 14, 8, 'Modules\\Show\\Entities\\Episode', 17, '2023-06-25 06:07:15', '2023-06-25 06:07:15'),
(215, 14, 8, 'Modules\\Show\\Entities\\Episode', 18, '2023-06-25 06:07:41', '2023-06-25 06:07:41'),
(216, 14, 8, 'Modules\\Show\\Entities\\Episode', 19, '2023-06-25 06:07:59', '2023-06-25 06:07:59'),
(217, 14, 8, 'Modules\\Show\\Entities\\Episode', 17, '2023-06-25 06:29:18', '2023-06-25 06:29:18'),
(218, 42, 13, 'Modules\\Show\\Entities\\Episode', 17, '2023-06-25 12:24:22', '2023-06-25 12:24:22'),
(219, 14, 8, 'Modules\\Show\\Entities\\Episode', 17, '2023-06-25 13:00:39', '2023-06-25 13:00:39'),
(220, 14, 8, 'Modules\\Show\\Entities\\Episode', 18, '2023-06-25 13:01:11', '2023-06-25 13:01:11'),
(221, 14, 8, 'Modules\\Show\\Entities\\Episode', 19, '2023-06-25 13:01:30', '2023-06-25 13:01:30'),
(222, 110, 121, 'Modules\\Show\\Entities\\Episode', 12, '2023-06-26 02:53:07', '2023-06-26 02:53:07'),
(223, 110, 121, 'Modules\\Show\\Entities\\Episode', 12, '2023-06-26 02:54:40', '2023-06-26 02:54:40'),
(224, 110, 121, 'Modules\\Show\\Entities\\Episode', 13, '2023-06-26 02:57:28', '2023-06-26 02:57:28'),
(225, 14, 8, 'Modules\\Show\\Entities\\Episode', 17, '2023-06-26 04:27:46', '2023-06-26 04:27:46'),
(226, 14, 8, 'Modules\\Show\\Entities\\Episode', 17, '2023-06-26 04:28:55', '2023-06-26 04:28:55'),
(227, 105, 117, 'Modules\\Show\\Entities\\Episode', 9, '2023-06-26 09:05:43', '2023-06-26 09:05:43'),
(228, 14, 8, 'Modules\\Show\\Entities\\Episode', 18, '2023-06-26 12:47:10', '2023-06-26 12:47:10'),
(229, 14, 8, 'Modules\\Show\\Entities\\Episode', 18, '2023-06-26 12:47:30', '2023-06-26 12:47:30'),
(230, 14, 8, 'Modules\\Show\\Entities\\Episode', 18, '2023-06-26 12:47:45', '2023-06-26 12:47:45'),
(231, 110, 121, 'Modules\\Show\\Entities\\Episode', 18, '2023-06-26 18:18:02', '2023-06-26 18:18:02'),
(232, 42, 13, 'Modules\\Show\\Entities\\Episode', 19, '2023-06-27 00:40:45', '2023-06-27 00:40:45'),
(233, 87, 105, 'Modules\\Movie\\Entities\\Movie', 5, '2023-06-27 13:28:08', '2023-06-27 13:28:08'),
(234, 87, 105, 'Modules\\Movie\\Entities\\Movie', 1, '2023-06-27 13:29:34', '2023-06-27 13:29:34'),
(235, 87, 105, 'Modules\\Show\\Entities\\Episode', 12, '2023-06-27 13:31:49', '2023-06-27 13:31:49'),
(236, 87, 105, 'Modules\\Show\\Entities\\Episode', 13, '2023-06-27 13:32:49', '2023-06-27 13:32:49'),
(237, 87, 105, 'Modules\\Show\\Entities\\Episode', 1, '2023-06-27 13:33:31', '2023-06-27 13:33:31'),
(238, 42, 13, 'Modules\\Show\\Entities\\Episode', 12, '2023-06-27 21:15:36', '2023-06-27 21:15:36'),
(239, 121, 124, 'Modules\\Show\\Entities\\Episode', 12, '2023-06-28 20:47:58', '2023-06-28 20:47:58'),
(240, 121, 124, 'Modules\\Show\\Entities\\Episode', 13, '2023-06-28 20:49:15', '2023-06-28 20:49:15'),
(241, 114, 125, 'Modules\\Show\\Entities\\Episode', 19, '2023-07-02 01:40:57', '2023-07-02 01:40:57'),
(242, 42, 13, 'Modules\\Show\\Entities\\Episode', 16, '2023-07-02 17:53:37', '2023-07-02 17:53:37'),
(243, 18, 119, 'Modules\\Show\\Entities\\Episode', 16, '2023-07-02 17:55:29', '2023-07-02 17:55:29'),
(244, 14, 8, 'Modules\\Show\\Entities\\Episode', 14, '2023-07-03 00:22:09', '2023-07-03 00:22:09'),
(245, 14, 8, 'Modules\\Show\\Entities\\Episode', 15, '2023-07-03 16:09:47', '2023-07-03 16:09:47'),
(246, 14, 8, 'Modules\\Show\\Entities\\Episode', 20, '2023-07-03 22:32:36', '2023-07-03 22:32:36'),
(247, 14, 8, 'Modules\\Show\\Entities\\Episode', 25, '2023-07-03 23:01:03', '2023-07-03 23:01:03'),
(248, 42, 13, 'Modules\\Show\\Entities\\Episode', 22, '2023-07-04 00:02:25', '2023-07-04 00:02:25'),
(249, 42, 13, 'Modules\\Show\\Entities\\Episode', 26, '2023-07-04 00:04:34', '2023-07-04 00:04:34'),
(250, 42, 13, 'Modules\\Show\\Entities\\Episode', 26, '2023-07-04 00:20:46', '2023-07-04 00:20:46'),
(251, 114, 125, 'Modules\\Show\\Entities\\Episode', 24, '2023-07-04 15:50:58', '2023-07-04 15:50:58'),
(252, 14, 8, 'Modules\\Show\\Entities\\Episode', 21, '2023-07-04 20:27:21', '2023-07-04 20:27:21'),
(253, 42, 13, 'Modules\\Show\\Entities\\Episode', 8, '2023-07-05 01:42:30', '2023-07-05 01:42:30'),
(254, 42, 13, 'Modules\\Show\\Entities\\Episode', 11, '2023-07-05 02:23:50', '2023-07-05 02:23:50');

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_id` bigint(20) UNSIGNED DEFAULT NULL,
  `page` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visits`
--
-- --------------------------------------------------------

--
-- Table structure for table `watch_times`
--

CREATE TABLE `watch_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `time` double(8,2) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `profile_id` bigint(20) UNSIGNED DEFAULT NULL,
  `watchable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `watchable_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `watch_times`
--

INSERT INTO `watch_times` (`id`, `time`, `user_id`, `profile_id`, `watchable_type`, `watchable_id`, `created_at`, `updated_at`) VALUES
(24, 242.49, 14, 8, 'Modules\\Movie\\Entities\\Movie', 1, '2023-01-22 11:28:30', '2023-02-01 03:47:10'),
(27, 25.00, 12, 7, 'Modules\\Show\\Entities\\Episode', 3, '2023-01-24 21:55:57', '2023-06-22 11:13:08'),
(28, 32.00, 12, 7, 'Modules\\Movie\\Entities\\Movie', 1, '2023-01-24 22:03:10', '2023-07-04 21:52:41'),
(35, 39.00, 12, 7, 'Modules\\Movie\\Entities\\Movie', 4, '2023-01-25 06:28:46', '2023-07-06 11:06:39'),
(37, 26.00, 12, 7, 'Modules\\Show\\Entities\\Episode', 1, '2023-01-25 06:33:11', '2023-06-12 10:06:53'),
(38, 2314.00, 12, 7, 'Modules\\Show\\Entities\\Episode', 8, '2023-01-25 06:37:12', '2023-04-19 00:03:21'),
(39, 226.00, 12, 7, 'Modules\\Show\\Entities\\Episode', 9, '2023-01-25 06:38:32', '2023-06-06 15:25:59'),
(40, 1632.17, 12, 7, 'Modules\\Show\\Entities\\Episode', 11, '2023-01-25 06:38:56', '2023-04-18 23:16:45'),
(42, 1023.21, 12, 7, 'Modules\\Show\\Entities\\Episode', 10, '2023-01-25 06:51:03', '2023-04-18 21:24:51'),
(43, 16.00, 12, 7, 'Modules\\Show\\Entities\\Episode', 2, '2023-01-25 07:17:28', '2023-06-14 22:31:00'),
(44, 0.00, 14, 8, 'Modules\\Show\\Entities\\Episode', 10, '2023-01-27 11:50:37', '2023-07-01 14:54:36'),
(45, 15.00, 14, 8, 'Modules\\Show\\Entities\\Episode', 8, '2023-01-31 09:23:12', '2023-07-01 14:49:06'),
(48, 611.58, 14, 8, 'Modules\\Show\\Entities\\Episode', 9, '2023-02-16 19:57:55', '2023-06-23 23:11:16'),
(49, 12.87, 42, 13, 'Modules\\Show\\Entities\\Episode', 11, '2023-02-18 10:20:05', '2023-05-10 21:48:02'),
(51, 962.44, 42, 13, 'Modules\\Movie\\Entities\\Movie', 4, '2023-02-19 00:12:35', '2023-06-03 18:38:25'),
(52, 171.00, 14, 8, 'Modules\\Show\\Entities\\Episode', 11, '2023-02-19 12:13:53', '2023-06-15 13:46:12'),
(53, 2.00, 14, 8, 'Modules\\Show\\Entities\\Episode', 1, '2023-02-26 09:06:49', '2023-06-25 02:38:11'),
(54, 2167.36, 14, 8, 'Modules\\Show\\Entities\\Episode', 2, '2023-02-26 09:06:57', '2023-04-09 00:24:14'),
(55, 0.00, 14, 8, 'Modules\\Show\\Entities\\Episode', 3, '2023-02-26 09:07:04', '2023-02-26 09:07:04'),
(56, 0.00, 14, 8, 'Modules\\Show\\Entities\\Episode', 4, '2023-02-26 09:07:09', '2023-02-26 09:07:09'),
(57, 0.00, 14, 8, 'Modules\\Show\\Entities\\Episode', 5, '2023-02-26 09:07:14', '2023-02-26 09:07:14'),
(58, 0.00, 14, 8, 'Modules\\Show\\Entities\\Episode', 6, '2023-02-26 09:07:20', '2023-02-26 09:07:20'),
(59, 0.00, 14, 8, 'Modules\\Show\\Entities\\Episode', 7, '2023-02-26 09:07:24', '2023-02-26 09:07:24'),
(60, 444.38, 14, 8, 'Modules\\Movie\\Entities\\Movie', 4, '2023-02-26 09:09:14', '2023-06-22 17:17:08'),
(61, 2313.78, 42, 13, 'Modules\\Show\\Entities\\Episode', 8, '2023-02-26 10:09:08', '2023-07-05 02:22:52'),
(62, 1179.20, 42, 13, 'Modules\\Show\\Entities\\Episode', 9, '2023-02-27 08:47:58', '2023-06-05 16:57:28'),
(67, 418.82, 42, 13, 'Modules\\Movie\\Entities\\Movie', 1, '2023-03-21 04:52:39', '2023-04-06 23:20:23'),
(70, 187.54, 42, 13, 'Modules\\Show\\Entities\\Episode', 1, '2023-03-23 07:47:00', '2023-06-12 16:54:34'),
(71, 1.08, 42, 13, 'Modules\\Show\\Entities\\Episode', 2, '2023-03-23 07:52:51', '2023-03-23 07:52:51'),
(74, 970.20, 42, 13, 'Modules\\Show\\Entities\\Episode', 10, '2023-03-25 00:36:29', '2023-03-29 23:40:38'),
(85, 1433.25, 75, 82, 'Modules\\Movie\\Entities\\Movie', 4, '2023-03-28 01:36:09', '2023-03-28 01:47:34'),
(86, 1088.32, 76, 83, 'Modules\\Show\\Entities\\Episode', 10, '2023-04-05 04:29:47', '2023-04-05 04:49:36'),
(87, 425.85, 76, 83, 'Modules\\Movie\\Entities\\Movie', 1, '2023-04-06 04:44:26', '2023-04-06 04:57:25'),
(88, 1685.59, 76, 83, 'Modules\\Movie\\Entities\\Movie', 4, '2023-04-06 05:15:09', '2023-04-06 05:25:02'),
(94, 56.76, 12, 7, 'Modules\\Movie\\Entities\\Movie', 5, '2023-04-15 14:59:39', '2023-05-12 18:52:06'),
(95, 5.00, 12, 87, 'Modules\\Show\\Entities\\Episode', 1, '2023-04-17 12:18:46', '2023-07-05 20:57:26'),
(96, 4562.33, 12, 7, 'Modules\\Show\\Entities\\Episode', 4, '2023-04-17 21:22:48', '2023-04-18 21:03:52'),
(97, 6.28, 12, 87, 'Modules\\Show\\Entities\\Episode', 2, '2023-04-19 17:31:07', '2023-04-25 00:56:22'),
(98, 3381.37, 12, 87, 'Modules\\Show\\Entities\\Episode', 3, '2023-04-25 00:42:55', '2023-04-25 19:53:09'),
(99, 347.48, 12, 87, 'Modules\\Show\\Entities\\Episode', 7, '2023-04-25 00:49:29', '2023-04-25 00:49:29'),
(100, 6.28, 12, 87, 'Modules\\Show\\Entities\\Episode', 4, '2023-04-25 00:57:59', '2023-04-25 00:57:59'),
(101, 807.91, 42, 13, 'Modules\\Movie\\Entities\\Movie', 5, '2023-04-25 14:55:40', '2023-06-23 17:08:34'),
(102, 158.31, 12, 87, 'Modules\\Movie\\Entities\\Movie', 1, '2023-04-25 20:40:49', '2023-05-20 02:26:41'),
(103, 12.00, 12, 7, 'Modules\\Show\\Entities\\Episode', 5, '2023-04-25 22:03:47', '2023-06-03 22:20:33'),
(104, 3.00, 12, 7, 'Modules\\Show\\Entities\\Episode', 6, '2023-04-25 22:13:52', '2023-04-25 22:15:44'),
(105, 209.62, 12, 87, 'Modules\\Movie\\Entities\\Movie', 5, '2023-04-27 02:52:38', '2023-06-02 20:36:58'),
(106, 79.12, 12, 87, 'Modules\\Show\\Entities\\Episode', 11, '2023-04-28 19:49:33', '2023-06-02 20:38:00'),
(107, 2301.28, 78, 94, 'Modules\\Show\\Entities\\Episode', 8, '2023-05-02 21:30:47', '2023-05-02 22:10:17'),
(108, 1963.17, 21, 95, 'Modules\\Show\\Entities\\Episode', 8, '2023-05-03 01:03:47', '2023-05-03 01:06:28'),
(109, 46.67, 79, 96, 'Modules\\Movie\\Entities\\Movie', 4, '2023-05-07 11:57:43', '2023-06-07 07:08:23'),
(110, 2.59, 12, 87, 'Modules\\Movie\\Entities\\Movie', 4, '2023-05-08 15:52:45', '2023-06-12 17:37:30'),
(112, 2220.48, 12, 87, 'Modules\\Show\\Entities\\Episode', 9, '2023-05-13 17:13:01', '2023-05-13 17:20:50'),
(113, 306.98, 63, 21, 'Modules\\Movie\\Entities\\Movie', 5, '2023-05-14 06:55:22', '2023-05-14 06:55:22'),
(114, 450.98, 82, 101, 'Modules\\Movie\\Entities\\Movie', 4, '2023-05-16 04:54:14', '2023-05-16 04:57:34'),
(115, 3685.34, 82, 101, 'Modules\\Movie\\Entities\\Movie', 5, '2023-05-16 05:26:15', '2023-05-16 05:32:32'),
(116, 2.55, 63, 21, 'Modules\\Show\\Entities\\Episode', 10, '2023-05-18 01:48:19', '2023-05-18 01:48:19'),
(117, 119.57, 63, 21, 'Modules\\Show\\Entities\\Episode', 11, '2023-05-20 18:01:33', '2023-05-20 18:01:33'),
(118, 1685.59, 83, 102, 'Modules\\Movie\\Entities\\Movie', 4, '2023-05-21 04:36:14', '2023-05-21 04:36:14'),
(119, 2093.55, 12, 87, 'Modules\\Show\\Entities\\Episode', 8, '2023-06-02 20:12:54', '2023-06-02 20:16:10'),
(125, 0.00, 12, 88, 'Modules\\Movie\\Entities\\Movie', 4, '2023-06-04 07:50:10', '2023-06-07 19:08:47'),
(126, 1615.98, 79, 96, 'Modules\\Show\\Entities\\Episode', 11, '2023-06-07 08:00:39', '2023-06-14 00:40:03'),
(127, 17.33, 14, 8, 'Modules\\Movie\\Entities\\Movie', 5, '2023-06-07 18:04:29', '2023-06-24 01:24:50'),
(128, 0.00, 12, 88, 'Modules\\Movie\\Entities\\Movie', 1, '2023-06-07 18:37:26', '2023-06-07 18:37:26'),
(129, 1956.54, 79, 96, 'Modules\\Show\\Entities\\Episode', 9, '2023-06-07 23:04:03', '2023-06-07 23:04:03'),
(130, 1487.43, 98, 111, 'Modules\\Show\\Entities\\Episode', 11, '2023-06-08 02:49:50', '2023-06-08 02:49:50'),
(131, 896.75, 101, 115, 'Modules\\Movie\\Entities\\Movie', 4, '2023-06-17 23:26:16', '2023-06-17 23:27:06'),
(132, 623.08, 105, 117, 'Modules\\Show\\Entities\\Episode', 9, '2023-06-21 18:45:20', '2023-06-26 09:36:18'),
(133, 706.75, 106, 118, 'Modules\\Movie\\Entities\\Movie', 5, '2023-06-23 17:10:21', '2023-06-23 17:18:08'),
(134, 1258.53, 106, 118, 'Modules\\Movie\\Entities\\Movie', 4, '2023-06-23 17:11:53', '2023-06-23 17:17:20'),
(135, 5.00, 14, 8, 'Modules\\Show\\Entities\\Episode', 12, '2023-06-24 22:15:58', '2023-07-01 14:52:07'),
(136, 119.43, 14, 8, 'Modules\\Show\\Entities\\Episode', 13, '2023-06-24 23:05:59', '2023-06-24 23:05:59'),
(137, 149.33, 14, 8, 'Modules\\Show\\Entities\\Episode', 14, '2023-06-25 00:16:49', '2023-07-03 00:25:02'),
(138, 0.00, 14, 8, 'Modules\\Show\\Entities\\Episode', 18, '2023-06-25 01:20:41', '2023-06-25 01:20:41'),
(139, 13.00, 14, 8, 'Modules\\Show\\Entities\\Episode', 16, '2023-06-25 01:36:50', '2023-06-25 01:56:54'),
(140, 25.56, 14, 8, 'Modules\\Show\\Entities\\Episode', 17, '2023-06-25 01:55:54', '2023-06-26 04:29:57'),
(141, 107.38, 42, 13, 'Modules\\Show\\Entities\\Episode', 16, '2023-06-25 01:58:52', '2023-06-25 02:04:10'),
(142, 64.90, 42, 13, 'Modules\\Show\\Entities\\Episode', 13, '2023-06-25 02:00:19', '2023-06-25 02:00:19'),
(143, 169.29, 42, 13, 'Modules\\Show\\Entities\\Episode', 14, '2023-06-25 02:03:25', '2023-06-25 02:03:25'),
(144, 0.00, 42, 13, 'Modules\\Show\\Entities\\Episode', 17, '2023-06-25 02:07:37', '2023-06-25 02:07:37'),
(145, 0.00, 42, 13, 'Modules\\Show\\Entities\\Episode', 15, '2023-06-25 02:56:35', '2023-06-25 02:56:35'),
(146, 0.00, 14, 8, 'Modules\\Show\\Entities\\Episode', 19, '2023-06-25 06:08:12', '2023-06-25 06:08:12'),
(147, 37.37, 110, 121, 'Modules\\Show\\Entities\\Episode', 12, '2023-06-26 02:54:12', '2023-06-26 02:54:59'),
(148, 21.90, 110, 121, 'Modules\\Show\\Entities\\Episode', 13, '2023-06-26 02:58:27', '2023-06-26 03:03:17'),
(149, 157.26, 12, 87, 'Modules\\Show\\Entities\\Episode', 18, '2023-06-26 03:41:16', '2023-06-26 03:41:16'),
(150, 95.00, 12, 7, 'Modules\\Show\\Entities\\Episode', 13, '2023-06-26 15:27:32', '2023-07-06 10:51:57'),
(151, 259.02, 110, 121, 'Modules\\Show\\Entities\\Episode', 18, '2023-06-26 18:24:22', '2023-06-26 18:24:22'),
(152, 434.18, 42, 13, 'Modules\\Show\\Entities\\Episode', 19, '2023-06-27 00:41:35', '2023-06-27 00:42:13'),
(153, 1413.38, 87, 105, 'Modules\\Movie\\Entities\\Movie', 5, '2023-06-27 13:28:56', '2023-06-27 13:29:16'),
(154, 371.36, 87, 105, 'Modules\\Movie\\Entities\\Movie', 1, '2023-06-27 13:31:24', '2023-06-27 13:31:25'),
(155, 1286.23, 87, 105, 'Modules\\Show\\Entities\\Episode', 12, '2023-06-27 13:32:47', '2023-06-27 13:32:47'),
(156, 88.49, 87, 105, 'Modules\\Show\\Entities\\Episode', 13, '2023-06-27 13:33:16', '2023-06-27 13:33:16'),
(157, 275.62, 87, 105, 'Modules\\Show\\Entities\\Episode', 1, '2023-06-27 13:34:40', '2023-06-27 13:34:40'),
(158, 148.02, 42, 13, 'Modules\\Show\\Entities\\Episode', 12, '2023-06-27 21:16:03', '2023-06-28 17:38:15'),
(159, 3.03, 121, 124, 'Modules\\Show\\Entities\\Episode', 13, '2023-06-28 20:49:31', '2023-06-28 20:49:31'),
(160, 2581.70, 114, 125, 'Modules\\Show\\Entities\\Episode', 19, '2023-07-02 01:42:12', '2023-07-02 02:21:40'),
(161, 174.94, 18, 119, 'Modules\\Show\\Entities\\Episode', 16, '2023-07-02 17:58:41', '2023-07-02 17:58:41'),
(162, 37.91, 14, 8, 'Modules\\Show\\Entities\\Episode', 15, '2023-07-03 16:10:38', '2023-07-03 16:10:38'),
(163, 733.50, 14, 8, 'Modules\\Show\\Entities\\Episode', 20, '2023-07-03 22:33:16', '2023-07-03 22:33:21'),
(164, 1557.83, 14, 8, 'Modules\\Show\\Entities\\Episode', 25, '2023-07-03 23:01:18', '2023-07-03 23:01:53'),
(165, 30.61, 42, 13, 'Modules\\Show\\Entities\\Episode', 22, '2023-07-04 00:03:44', '2023-07-04 00:04:22'),
(166, 2943.58, 42, 13, 'Modules\\Show\\Entities\\Episode', 26, '2023-07-04 00:05:33', '2023-07-04 00:21:26'),
(167, 578.89, 114, 125, 'Modules\\Show\\Entities\\Episode', 24, '2023-07-04 15:51:04', '2023-07-04 16:33:00'),
(168, 3166.60, 14, 8, 'Modules\\Show\\Entities\\Episode', 21, '2023-07-04 20:28:18', '2023-07-04 20:30:30'),
(169, 5.00, 12, 87, 'Modules\\Show\\Entities\\Episode', 12, '2023-07-05 21:01:24', '2023-07-05 21:01:24');

-- --------------------------------------------------------

--
-- Table structure for table `withdraws`
--

CREATE TABLE `withdraws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_types`
--

CREATE TABLE `withdraw_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `advertisementables`
--
ALTER TABLE `advertisementables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advertisementables_advertisement_id_foreign` (`advertisement_id`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `avatars`
--
ALTER TABLE `avatars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_bookable_type_bookable_id_index` (`bookable_type`,`bookable_id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `episodes_user_id_foreign` (`user_id`),
  ADD KEY `episodes_season_id_foreign` (`season_id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipment_category_id_foreign` (`category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `genreables`
--
ALTER TABLE `genreables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genreables_genre_id_foreign` (`genre_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movies_user_id_foreign` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_equipment_id_foreign` (`equipment_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `p_subscriptions`
--
ALTER TABLE `p_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_subscriptions_user`
--
ALTER TABLE `p_subscriptions_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_subscriptions_user_user_id_foreign` (`user_id`),
  ADD KEY `p_subscriptions_user_p_subscription_id_foreign` (`p_subscription_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seasons`
--
ALTER TABLE `seasons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seasons_user_id_foreign` (`user_id`),
  ADD KEY `seasons_show_id_foreign` (`show_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shows_user_id_foreign` (`user_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_stripe_id_unique` (`stripe_id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Indexes for table `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_items_subscription_id_stripe_price_unique` (`subscription_id`,`stripe_price`),
  ADD UNIQUE KEY `subscription_items_stripe_id_unique` (`stripe_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `views_user_id_foreign` (`user_id`),
  ADD KEY `views_profile_id_foreign` (`profile_id`),
  ADD KEY `views_viewable_type_viewable_id_index` (`viewable_type`,`viewable_id`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visits_user_id_foreign` (`user_id`),
  ADD KEY `visits_profile_id_foreign` (`profile_id`);

--
-- Indexes for table `watch_times`
--
ALTER TABLE `watch_times`
  ADD PRIMARY KEY (`id`),
  ADD KEY `watch_times_user_id_foreign` (`user_id`),
  ADD KEY `watch_times_profile_id_foreign` (`profile_id`),
  ADD KEY `watch_times_watchable_type_watchable_id_index` (`watchable_type`,`watchable_id`);

--
-- Indexes for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD PRIMARY KEY (`id`),
  ADD KEY `withdraws_user_id_foreign` (`user_id`);

--
-- Indexes for table `withdraw_types`
--
ALTER TABLE `withdraw_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2987;

--
-- AUTO_INCREMENT for table `advertisementables`
--
ALTER TABLE `advertisementables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `avatars`
--
ALTER TABLE `avatars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genreables`
--
ALTER TABLE `genreables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=352;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=294;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `p_subscriptions`
--
ALTER TABLE `p_subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `p_subscriptions_user`
--
ALTER TABLE `p_subscriptions_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `seasons`
--
ALTER TABLE `seasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shows`
--
ALTER TABLE `shows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6670;

--
-- AUTO_INCREMENT for table `watch_times`
--
ALTER TABLE `watch_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdraw_types`
--
ALTER TABLE `withdraw_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertisementables`
--
ALTER TABLE `advertisementables`
  ADD CONSTRAINT `advertisementables_advertisement_id_foreign` FOREIGN KEY (`advertisement_id`) REFERENCES `advertisements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `episodes`
--
ALTER TABLE `episodes`
  ADD CONSTRAINT `episodes_season_id_foreign` FOREIGN KEY (`season_id`) REFERENCES `seasons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `episodes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `equipment_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `genreables`
--
ALTER TABLE `genreables`
  ADD CONSTRAINT `genreables_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_equipment_id_foreign` FOREIGN KEY (`equipment_id`) REFERENCES `equipment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p_subscriptions_user`
--
ALTER TABLE `p_subscriptions_user`
  ADD CONSTRAINT `p_subscriptions_user_p_subscription_id_foreign` FOREIGN KEY (`p_subscription_id`) REFERENCES `p_subscriptions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p_subscriptions_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `seasons`
--
ALTER TABLE `seasons`
  ADD CONSTRAINT `seasons_show_id_foreign` FOREIGN KEY (`show_id`) REFERENCES `shows` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seasons_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shows`
--
ALTER TABLE `shows`
  ADD CONSTRAINT `shows_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `views`
--
ALTER TABLE `views`
  ADD CONSTRAINT `views_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `views_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visits`
--
ALTER TABLE `visits`
  ADD CONSTRAINT `visits_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visits_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `watch_times`
--
ALTER TABLE `watch_times`
  ADD CONSTRAINT `watch_times_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `watch_times_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD CONSTRAINT `withdraws_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
