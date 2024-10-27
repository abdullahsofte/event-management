-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2024 at 04:12 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_management_update_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `header` varchar(20) DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'a',
  `save_by` varchar(3) NOT NULL,
  `updated_by` varchar(3) DEFAULT NULL,
  `ip_address` varchar(15) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `upazila_id` bigint(20) UNSIGNED NOT NULL,
  `amount` varchar(10) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `short_details` text DEFAULT NULL,
  `offer_link` varchar(200) DEFAULT NULL,
  `image` text NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'a',
  `save_by` varchar(3) NOT NULL,
  `updated_by` varchar(3) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `short_details`, `offer_link`, `image`, `status`, `save_by`, `updated_by`, `ip_address`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'banner', NULL, NULL, 'uploads/banner/banner1812132268.jpg', 'a', '1', '1', '127.0.0.1', '2024-10-19 22:16:15', '2024-10-15 18:48:36', '2024-10-19 22:16:15'),
(2, 'Day tours on historical places', 'egf eg et', 'fdfhtg', 'uploads/banner/banner1131162443.jpg', 'a', '1', '1', '127.0.0.1', NULL, '2024-10-15 18:48:53', '2024-10-21 15:49:20'),
(3, 'Hotel Booking', '<p>Day tours on historical places&nbsp;</p>', NULL, 'uploads/banner/banner331692659.jpg', 'a', '1', '1', '127.0.0.1', '2024-10-19 22:18:01', '2024-10-15 18:49:04', '2024-10-19 22:18:01'),
(4, 'Day tours on historical places', 'dsfsdwdfs', 'dfdfgd', 'uploads/banner/banner1163608148.jpg', 'a', '1', '1', '127.0.0.1', NULL, '2024-10-15 18:49:16', '2024-10-25 17:33:42'),
(5, 'admi test', 'ssdf dsfmdskonakgn', 'asdsad', 'uploads/banner/banner254280948.jpg', 'a', '1', '1', '127.0.0.1', NULL, '2024-10-25 17:08:53', '2024-10-25 17:42:24'),
(6, 'fdh', 'fdhfdhg', 'tyjn5hrbb 45', 'uploads/banner/banner2133107410.jpg', 'a', '1', '1', '127.0.0.1', NULL, '2024-10-25 17:50:44', '2024-10-25 17:52:45');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date` varchar(20) NOT NULL,
  `image` text DEFAULT NULL,
  `save_by` varchar(3) NOT NULL,
  `updated_by` varchar(3) DEFAULT NULL,
  `ip_address` varchar(15) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `date`, `image`, `save_by`, `updated_by`, `ip_address`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Barcelona Food Truck Festival 2018-2019', '<p>Westend Entertainment and Event Management is a premier company specializing in curating unforgettable experiences through a wide range of event management services. With a strong commitment to excellence and creativity, we take pride in transforming your visions into reality, whether it\'s a corporate event, wedding, concert, or private gathering. Our dedicated team of professionals brings years of experience and expertise, ensuring every detail is meticulously planned and executed.</p>', '2024-10-22', 'uploads/blog/blog1361846606.jpg', '1', NULL, '127.0.0.1', NULL, '2024-10-22 13:00:04', '2024-10-22 13:00:04'),
(2, 'Westend Entertainment and Event Management', '<p>Westend Entertainment and Event Management is a premier company specializing in curating unforgettable experiences through a wide range of event management services. With a strong commitment to excellence and creativity, we take pride in transforming your visions into reality, whether it\'s a corporate event, wedding, concert, or private gathering. Our dedicated team of professionals brings years of experience and expertise, ensuring every detail is meticulously planned and executed.</p>', '2024-10-23', 'uploads/blog/blog1900491448.jpg', '1', NULL, '127.0.0.1', NULL, '2024-10-22 13:00:56', '2024-10-22 13:00:56'),
(3, 'Westend Entertainment and Event Management', '<p>Westend Entertainment and Event Management is a premier company specializing in curating unforget.Westend Entertainment and Event Management is a premier company specializing in curating unforget.</p>', '2024-10-30', 'uploads/blog/blog1271558896.jpg', '1', NULL, '127.0.0.1', NULL, '2024-10-22 13:01:56', '2024-10-22 13:01:56'),
(4, 'Holiday Event Management', '<p>Westend Entertainment and Event Management is a premier company specializing in curating unforget Westend Entertainment and Event Management is a premier company specializing in curating unforget.</p>', '2024-10-31', 'uploads/blog/blog478817086.jpg', '1', '1', '127.0.0.1', NULL, '2024-10-22 13:03:01', '2024-10-25 02:18:08'),
(5, 'Event Management', '<p>Westend Entertainment and Event Management is a premier company specializing in curating unforgettable experiences through a wide range of event management services. With a strong commitment to excellence and creativity, we take pride in transforming your visions into reality, whether it\'s a corporate event, wedding, concert, or private gathering. Our dedicated team of professionals brings years of experience and expertise, ensuring every detail is meticulously planned and executed.</p>', '2024-11-01', 'uploads/blog/blog1073146466.jpg', '1', NULL, '127.0.0.1', NULL, '2024-10-22 13:04:05', '2024-10-22 13:04:05'),
(6, 'Event Management', '<p>Westend Entertainment and Event Management is a premier company specializing in curating unforgettable experiences through a wide range of event management services. With a strong commitment to excellence and creativity, we take pride in transforming your visions into reality, whether it\'s a corporate event, wedding, concert, or private gathering. Our dedicated team of professionals brings years of experience and expertise, ensuring every detail is meticulously planned and executed.</p><p>Westend Entertainment and Event Management is a premier company specializing in curating unforgettable experiences through a wide range of event management services. With a strong commitment to excellence and creativity, we take pride in transforming your visions into reality, whether it\'s a corporate event, wedding, concert, or private gathering. Our dedicated team of professionals brings years of experience and expertise, ensuring every detail is meticulously planned and executed.</p>', '2024-11-08', 'uploads/blog/blog1617519221.jpg', '1', NULL, '127.0.0.1', NULL, '2024-10-22 13:04:57', '2024-10-22 13:04:57'),
(7, 'Birthday Event Management', '<p>Westend Entertainment and Event Management is a premier company specializing in curating unforget.Westend Entertainment and Event Management is a premier company specializing in curating unforgetWestend Entertainment and Event Management is a premier company specializing in curating unforget.Westend Entertainment and Event Management is a premier company specializing in curating unforget</p><p>Westend Entertainment and Event Management is a premier company specializing in curating unforget.Westend Entertainment and Event Management is a premier company specializing in curating unforgetWestend Entertainment and Event Management is a premier company specializing in curating unforget.Westend Entertainment and Event Management is a premier company specializing in curating unforget</p>', '2024-10-26', 'uploads/blog/blog908599572.jpg', '1', NULL, '127.0.0.1', NULL, '2024-10-25 01:40:14', '2024-10-25 01:40:14'),
(8, 'admin test', '<p>Westend Entertainment and Event Management is a premier company specializing in curating unforget Westend Entertainment and Event Management is a premier company specializing in curating unforget Westend Entertainment and Event Management is a premier company specializing in curating unforget Westend Entertainment and Event Management is a premier company specializing in curating unforget Westend Entertainment and Event Management is a premier company specializing in curating unforget Westend Entertainment and Event Management is a premier company specializing in curating unforget</p>', '2024-10-26', 'uploads/blog/I-love-NYCpedicabs_671afdd082c81.JPG', '1', NULL, '127.0.0.1', '2024-10-25 02:15:15', '2024-10-25 02:09:20', '2024-10-25 02:15:15');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `booking_type` varchar(191) NOT NULL,
  `booking_for` bigint(20) UNSIGNED NOT NULL,
  `booking_person` varchar(191) NOT NULL,
  `boking_date` date NOT NULL,
  `boking_time` time NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'a',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `email`, `phone`, `address`, `booking_type`, `booking_for`, `booking_person`, `boking_date`, `boking_time`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Abdullah Fardeen', 'admin@gmail.com', '01776637855', 'Mirpur', 'Hotel Booking', 1, '3 person', '2024-11-02', '23:06:00', 'a', '2024-10-25 11:54:32', '2024-10-25 12:11:50', '2024-10-25 12:11:50');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `is_popular` varchar(191) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `is_popular`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Canon', NULL, NULL, '2024-10-13 20:10:12', '2024-10-13 20:10:12'),
(2, 'Walton', NULL, NULL, '2024-10-13 20:10:12', '2024-10-13 20:10:12');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(130) NOT NULL,
  `details` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'a',
  `is_popular` tinyint(4) DEFAULT NULL,
  `save_by` varchar(3) DEFAULT NULL,
  `updated_by` varchar(3) DEFAULT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `details`, `image`, `status`, `is_popular`, `save_by`, `updated_by`, `ip_address`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Hotel booking', 'hotel-booking-1729193603', NULL, NULL, 'a', NULL, NULL, NULL, '127.0.0.1', NULL, '2024-10-17 19:30:42', '2024-10-17 19:33:23'),
(2, 'pedicab booking', 'pedicab-booking-1729193620', NULL, NULL, 'a', NULL, NULL, NULL, '127.0.0.1', NULL, '2024-10-17 19:30:42', '2024-10-17 19:33:40'),
(3, 'Theatre ticket booking', 'theatre-ticket-booking-1729193636', NULL, NULL, 'a', NULL, NULL, NULL, '127.0.0.1', NULL, '2024-10-17 19:30:42', '2024-10-17 19:33:56'),
(4, 'Event management', 'event-management-1729193658', NULL, NULL, 'a', NULL, NULL, NULL, '127.0.0.1', NULL, '2024-10-17 19:30:42', '2024-10-17 19:34:18'),
(5, 'Day tours on historical places', 'day-tours-on-historical-places-1729193675', NULL, NULL, 'a', NULL, '1', NULL, '127.0.0.1', NULL, '2024-10-17 19:34:35', '2024-10-17 19:34:35');

-- --------------------------------------------------------

--
-- Table structure for table `company_profiles`
--

CREATE TABLE `company_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `slogan` varchar(191) DEFAULT NULL,
  `phone_1` varchar(15) NOT NULL,
  `phone_2` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(191) NOT NULL,
  `news_headline` text DEFAULT NULL,
  `logo` varchar(191) DEFAULT NULL,
  `map` text DEFAULT NULL,
  `office_time` varchar(191) DEFAULT NULL,
  `free_shipping` varchar(191) DEFAULT NULL,
  `cashback` varchar(191) DEFAULT NULL,
  `about_title` text DEFAULT NULL,
  `about_description` text DEFAULT NULL,
  `about_image` text DEFAULT NULL,
  `facebook` varchar(191) DEFAULT NULL,
  `youtube` varchar(191) DEFAULT NULL,
  `linkedin` varchar(191) DEFAULT NULL,
  `instagram` varchar(191) DEFAULT NULL,
  `welcome_title` varchar(100) DEFAULT NULL,
  `welcome_note` text DEFAULT NULL,
  `welcome_image` text DEFAULT NULL,
  `company_title` varchar(100) DEFAULT NULL,
  `company_description` text DEFAULT NULL,
  `company_image` varchar(191) DEFAULT NULL,
  `mission_vision_title` varchar(100) DEFAULT NULL,
  `mission_vision` text DEFAULT NULL,
  `trams_condition_title` varchar(100) DEFAULT NULL,
  `trams_condition` text DEFAULT NULL,
  `delivery_policy` longtext DEFAULT NULL,
  `return_policy` longtext DEFAULT NULL,
  `faq_title` varchar(200) DEFAULT NULL,
  `faq_details` text DEFAULT NULL,
  `refund_title` varchar(100) DEFAULT NULL,
  `refund_details` text DEFAULT NULL,
  `export_title` varchar(100) DEFAULT NULL,
  `export_details` text DEFAULT NULL,
  `export_image` varchar(191) DEFAULT NULL,
  `organic_title` varchar(100) DEFAULT NULL,
  `organic_details` text DEFAULT NULL,
  `organic_image` text DEFAULT NULL,
  `baby_title` varchar(100) DEFAULT NULL,
  `baby_details` text DEFAULT NULL,
  `baby_image` text DEFAULT NULL,
  `updated_by` varchar(3) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_profiles`
--

INSERT INTO `company_profiles` (`id`, `company_name`, `slogan`, `phone_1`, `phone_2`, `email`, `address`, `news_headline`, `logo`, `map`, `office_time`, `free_shipping`, `cashback`, `about_title`, `about_description`, `about_image`, `facebook`, `youtube`, `linkedin`, `instagram`, `welcome_title`, `welcome_note`, `welcome_image`, `company_title`, `company_description`, `company_image`, `mission_vision_title`, `mission_vision`, `trams_condition_title`, `trams_condition`, `delivery_policy`, `return_policy`, `faq_title`, `faq_details`, `refund_title`, `refund_details`, `export_title`, `export_details`, `export_image`, `organic_title`, `organic_details`, `organic_image`, `baby_title`, `baby_details`, `baby_image`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Westend Entertainment and Event Management', NULL, 'admin', NULL, 'john@gmail.com', 'Mirpur 10', NULL, 'uploads/logo/logo-1_670c357f05e99.png', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52911152.01212377!2d-161.6554510990339!3d35.96065628178864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sbd!4v1729373130866!5m2!1sen!2sbd\"', NULL, NULL, NULL, 'About Us', '<p>Morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris Eonec eu ribero sit amet quam egestas semper. Aenean are ultricies mi vitae.</p><p>Morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris Eonec eu ribero sit amet quam egestas semper. Aenean are ultricies mi vitae.</p>', 'uploads/about//ellis-island-royalty-free-image-1596217939_671432bfad1e0.jpg', NULL, NULL, NULL, NULL, 'Westend Entertainment and Event Management', '<p>Westend Entertainment and Event Management is a premier company specializing in curating unforgettable experiences through a wide range of event management services. With a strong commitment to excellence and creativity, we take pride in transforming your visions into reality, whether it\'s a corporate event, wedding, concert, or private gathering. Our dedicated team of professionals brings years of experience and expertise, ensuring every detail is meticulously planned and executed.</p>', 'uploads/welcome/company-age-bg_671413aaf4079.jpg', NULL, NULL, NULL, 'mission_vision_title', 'mission_vision', NULL, NULL, NULL, NULL, 'faq_title', 'faq_details', 'refund_title', 'refund_details', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2024-10-13 20:10:10', '2024-10-19 22:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(8) NOT NULL,
  `name` varchar(50) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(30) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `district_id` bigint(20) UNSIGNED DEFAULT NULL,
  `upazila_id` bigint(20) UNSIGNED DEFAULT NULL,
  `area_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_picture` text DEFAULT NULL,
  `thum_picture` varchar(191) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'p',
  `save_by` varchar(3) NOT NULL,
  `updated_by` varchar(3) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `ip_address` varchar(17) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `management`
--

CREATE TABLE `management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `rank` varchar(10) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1',
  `save_by` varchar(3) DEFAULT NULL,
  `updated_by` varchar(3) DEFAULT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_name` varchar(50) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `subject` varchar(150) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_name`, `phone`, `email`, `subject`, `message`, `ip_address`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'fgadsds', 'sdfdsf', 'sdafadsfads@hgf.com', 'dfsd', 'dsfds', '127.0.0.1', '2024-10-18 17:15:07', '2024-10-18 17:14:37', '2024-10-18 17:15:07');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2021_09_20_103113_create_banners_table', 1),
(9, '2021_09_20_125332_create_messages_table', 1),
(10, '2021_09_20_133359_create_company_profiles_table', 1),
(11, '2021_09_21_110416_create_photo_galleries_table', 1),
(12, '2021_09_21_114832_create_video_galleries_table', 1),
(13, '2021_09_27_095651_create_teams_table', 1),
(14, '2021_09_27_110946_create_management_table', 1),
(15, '2021_09_28_031648_create_countries_table', 1),
(16, '2021_10_21_041936_create_ads_table', 1),
(17, '2021_10_21_091842_create_partners_table', 1),
(18, '2021_10_21_100011_create_blogs_table', 1),
(19, '2021_12_03_150615_create_districts_table', 1),
(20, '2022_02_08_080457_create_brands_table', 1),
(21, '2022_02_13_142510_create_upazilas_table', 1),
(22, '2022_02_16_125925_create_areas_table', 1),
(23, '2022_02_16_125926_create_customers_table', 1),
(24, '2022_02_16_175002_create_contacts_table', 1),
(25, '2022_09_20_041643_create_origins_table', 1),
(26, '2022_09_20_041644_create_products_table', 1),
(27, '2022_12_12_114728_create_faqs_table', 1),
(28, '2023_01_05_121810_create_product_images_table', 1),
(29, '2023_01_05_121811_create_product_features_table', 1),
(30, '2021_09_19_101530_create_categories_table', 2),
(31, '2021_09_19_135805_create_sub_categories_table', 2),
(38, '2021_09_20_102416_create_services_table', 4),
(39, '2024_10_19_235327_create_service__features_table', 4),
(42, '2024_10_19_235328_create_bookings_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `origins`
--

CREATE TABLE `origins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `image` text NOT NULL,
  `save_by` varchar(3) NOT NULL,
  `updated_by` varchar(3) DEFAULT NULL,
  `ip_address` varchar(15) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photo_galleries`
--

CREATE TABLE `photo_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(120) NOT NULL,
  `image` text DEFAULT NULL,
  `save_by` varchar(3) DEFAULT NULL,
  `update_by` varchar(3) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ip_address` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photo_galleries`
--

INSERT INTO `photo_galleries` (`id`, `title`, `image`, `save_by`, `update_by`, `deleted_at`, `created_at`, `updated_at`, `ip_address`) VALUES
(1, 'gallery', 'uploads/gallery/gallery1094891566.jpg', '1', '1', NULL, '2024-10-15 18:31:36', '2024-10-15 18:32:26', '127.0.0.1'),
(2, 'Theatre ticket booking', 'uploads/gallery/gallery1631768628.jpg', '1', '1', NULL, '2024-10-15 18:31:59', '2024-10-22 13:09:02', '127.0.0.1'),
(3, 'gallery', 'uploads/gallery/gallery258555888.jpg', '1', NULL, NULL, '2024-10-15 18:32:44', '2024-10-15 18:32:44', '127.0.0.1'),
(4, 'gallery', 'uploads/gallery/gallery288867212.jpg', '1', NULL, NULL, '2024-10-15 18:33:01', '2024-10-15 18:33:01', '127.0.0.1'),
(5, 'gallery', 'uploads/gallery/gallery1601311780.jpg', '1', NULL, NULL, '2024-10-15 18:33:17', '2024-10-15 18:33:17', '127.0.0.1'),
(6, 'Theatre ticket booking', 'uploads/gallery/gallery717520328.jpg', '1', '1', NULL, '2024-10-15 18:33:29', '2024-10-22 13:09:14', '127.0.0.1'),
(7, 'gallery', 'uploads/gallery/gallery235992972.jpg', '1', NULL, NULL, '2024-10-15 18:33:40', '2024-10-15 18:33:40', '127.0.0.1'),
(8, 'Theatre ticket booking', 'uploads/gallery/gallery725607662.jpg', '1', NULL, NULL, '2024-10-22 13:09:31', '2024-10-22 13:09:31', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(18) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(130) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `origin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` decimal(18,2) DEFAULT NULL,
  `image` text NOT NULL,
  `discount` decimal(18,2) DEFAULT NULL,
  `stock` varchar(18) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `short_details` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `is_feature` varchar(1) DEFAULT NULL,
  `is_offer` varchar(1) DEFAULT NULL,
  `new_status` varchar(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `save_by` varchar(3) NOT NULL,
  `update_by` varchar(3) DEFAULT NULL,
  `ip_address` varchar(15) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_features`
--

CREATE TABLE `product_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `otherImage` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(130) NOT NULL,
  `title` varchar(100) NOT NULL,
  `short_details` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'a',
  `save_by` varchar(3) DEFAULT NULL,
  `update_by` varchar(3) DEFAULT NULL,
  `ip_address` varchar(15) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `slug`, `title`, `short_details`, `description`, `image`, `status`, `save_by`, `update_by`, `ip_address`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'hotel-booking', 'Hotel Booking', 'At Westend Entertainment and Event Management, we offer a perfect blend of comfort, luxury, and convenience to make your stay truly memorable. Whether you\'re traveling for business or leisure, our elegantly designed rooms, modern amenities, and exceptional services are tailored to meet your needs. From our premium suites to our world-class dining options, every detail is crafted to ensure a relaxing experience. Book your stay with us today and enjoy personalized hospitality in the heart of [City Name]. Your satisfaction is our top priority – we look forward to welcoming you!', NULL, 'uploads/service/service_1729365987.jpg', 'a', '1', NULL, '127.0.0.1', NULL, '2024-10-19 19:26:27', '2024-10-21 19:10:19'),
(2, 'pedicab-booking', 'pedicab booking', 'A pedicab, also known as a cycle rickshaw or bike taxi, is a human-powered vehicle designed for short-distance transportation. Typically, it consists of a tricycle or bicycle with a passenger cabin at the rear, offering seating for one to three people. Pedicabs are popular in urban areas, tourist destinations, and markets as an eco-friendly alternative to motorized taxis, promoting sustainable travel by reducing carbon emissions. With their slower pace, pedic', NULL, 'uploads/service/service_1729366273.png', 'a', '1', NULL, '127.0.0.1', NULL, '2024-10-19 19:31:13', '2024-10-21 19:13:05'),
(3, 'theatre-ticket-booking', 'Theatre ticket booking', 'Theatre ticket booking allows audiences to secure seats for their favorite plays, musicals, and performances in advance, ensuring a hassle-free experience. Modern booking platforms provide easy access to show schedules, seat maps, and pricing options, allowing users to choose the best seats according to their preferences and budget. Whether booked online or at the box office, tickets can be purchased for individual shows or as part of a subscription package for multiple performances.', NULL, 'uploads/service/service_1729366496.jpg', 'a', '1', NULL, '127.0.0.1', NULL, '2024-10-19 19:34:56', '2024-10-21 19:08:50'),
(4, 'event-management', 'Event management', 'Event management involves the planning, organizing, and execution of events such as conferences, weddings, concerts, corporate gatherings, and festivals. It requires a blend of creativity, coordination, and logistical expertise to ensure everything runs smoothly. Key aspects include venue selection, budgeting, vendor management, catering, entertainment, and promotion. Technology plays a crucial role through tools for online registration, ticketing, and real-time event tracking.', NULL, 'uploads/service/service_1729366642.jpg', 'a', '1', NULL, '127.0.0.1', NULL, '2024-10-19 19:37:23', '2024-10-21 19:06:02'),
(5, 'day-tours-on-historical-places', 'Day tours on historical places', 'Day Tours of Historical Places offer travelers a unique opportunity to explore the rich heritage and culture of a destination within a limited time. These tours are carefully planned to cover iconic landmarks, ancient sites, museums, and monuments,', NULL, 'uploads/service/service_1729366835.webp', 'a', '1', NULL, '127.0.0.1', NULL, '2024-10-19 19:40:36', '2024-10-21 19:04:45');

-- --------------------------------------------------------

--
-- Table structure for table `service_features`
--

CREATE TABLE `service_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `feature_name` varchar(191) NOT NULL,
  `feature_image` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_features`
--

INSERT INTO `service_features` (`id`, `service_id`, `feature_name`, `feature_image`, `created_at`, `updated_at`) VALUES
(1, 1, '2-5 persons table', 'uploads/features/feature_1729537819_1.jpg', '2024-10-19 19:26:27', '2024-10-21 19:10:20'),
(2, 1, '6-10 persons table', 'uploads/features/feature_1729537820_2.jpg', '2024-10-19 19:26:27', '2024-10-22 18:06:43'),
(3, 2, '1 hour = 250', 'uploads/features/feature_1729537985_3.jpg', '2024-10-19 19:31:13', '2024-10-21 19:13:06'),
(4, 2, '2hours = 500', 'uploads/features/feature_1729537986_4.JPG', '2024-10-19 19:31:13', '2024-10-21 19:13:06'),
(5, 2, '3 hours =750', 'uploads/features/feature_1729537987_5.jpg', '2024-10-19 19:31:13', '2024-10-21 19:13:07'),
(6, 2, '5hours package (discounted) = 1200', 'uploads/features/feature_1729537988_6.jpg', '2024-10-19 19:31:13', '2024-10-21 19:13:09'),
(7, 2, 'Glow taxi ride = 1200', 'uploads/features/feature_1729537990_7.jpg', '2024-10-19 19:31:13', '2024-10-21 19:13:10'),
(8, 3, 'Frozen', 'uploads/features/feature_1729537730_8.jpg', '2024-10-19 19:34:56', '2024-10-21 19:08:51'),
(9, 3, 'Mamma mia', 'uploads/features/feature_1729537731_9.jpg', '2024-10-19 19:34:56', '2024-10-21 19:08:51'),
(10, 3, 'lion king', 'uploads/features/feature_1729537731_10.jpg', '2024-10-19 19:34:56', '2024-10-21 19:08:51'),
(11, 3, 'Wicked', 'uploads/features/feature_1729537731_11.jpg', '2024-10-19 19:34:56', '2024-10-21 19:08:51'),
(12, 3, 'Les Miserables', 'uploads/features/feature_1729537731_12.jpg', '2024-10-19 19:34:56', '2024-10-21 19:08:52'),
(13, 4, '50 persons pogram', 'uploads/features/feature_1729537562_13.jpg', '2024-10-19 19:37:23', '2024-10-21 19:06:05'),
(14, 4, '100 persons program', 'uploads/features/feature_1729537565_14.jpg', '2024-10-19 19:37:23', '2024-10-21 19:06:07'),
(15, 4, '300 persons program', 'uploads/features/feature_1729537567_15.jpg', '2024-10-19 19:37:23', '2024-10-21 19:06:08'),
(16, 5, '2-5 person', 'uploads/features/feature_1729537485_16.jpg', '2024-10-19 19:40:36', '2024-10-21 19:04:47'),
(17, 5, '8-10 persons', 'uploads/features/feature_1729537487_17.jpg', '2024-10-19 19:40:36', '2024-10-21 19:04:48'),
(18, 5, '15 persons (max)', 'uploads/features/feature_1729537488_18.jpg', '2024-10-19 19:40:36', '2024-10-21 19:04:55'),
(22, 1, '11-13 persons table', 'uploads/features/feature_1729620403_3.jpg', '2024-10-22 18:06:44', '2024-10-22 18:06:44'),
(23, 1, 'more than 20 persons table', 'uploads/features/feature_1729620404_4.jpg', '2024-10-22 18:06:48', '2024-10-22 18:06:48');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(130) NOT NULL,
  `image` text NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'a',
  `save_by` varchar(10) NOT NULL,
  `updated_by` varchar(3) DEFAULT NULL,
  `ip_address` varchar(15) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `slug`, `image`, `status`, `save_by`, `updated_by`, `ip_address`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '2-5 persons table', '2-5-persons-table-1729193798', '0', 'a', '1', NULL, '127.0.0.1', NULL, '2024-10-17 19:36:38', '2024-10-17 19:36:38'),
(2, 1, 'more than 10 persons table', 'more-than-10-persons-table-1729193808', '0', 'a', '1', NULL, '127.0.0.1', NULL, '2024-10-17 19:36:48', '2024-10-17 19:36:48'),
(3, 2, '1 hour = 250', '1-hour-250-1729193817', '0', 'a', '1', NULL, '127.0.0.1', NULL, '2024-10-17 19:36:57', '2024-10-17 19:36:57'),
(4, 2, '2 hours = 500', '2-hours-500-1729193832', '0', 'a', '1', NULL, '127.0.0.1', NULL, '2024-10-17 19:37:12', '2024-10-17 19:37:12'),
(5, 2, '3 hours =750', '3-hours-750-1729193844', '0', 'a', '1', NULL, '127.0.0.1', NULL, '2024-10-17 19:37:24', '2024-10-17 19:37:24'),
(6, 2, '5 hours package (discounted) = 1200', '5-hours-package-discounted-1200-1729193859', '0', 'a', '1', NULL, '127.0.0.1', NULL, '2024-10-17 19:37:39', '2024-10-17 19:37:39'),
(7, 2, 'Glow taxi ride = 1200', 'glow-taxi-ride-1200-1729193867', '0', 'a', '1', NULL, '127.0.0.1', NULL, '2024-10-17 19:37:47', '2024-10-17 19:37:47'),
(8, 3, 'Frozen', 'frozen-1729193882', '0', 'a', '1', NULL, '127.0.0.1', NULL, '2024-10-17 19:38:02', '2024-10-17 19:38:02'),
(9, 3, 'Mamma mia', 'mamma-mia-1729193893', '0', 'a', '1', NULL, '127.0.0.1', NULL, '2024-10-17 19:38:13', '2024-10-17 19:38:13'),
(10, 3, 'lion king', 'lion-king-1729193908', '0', 'a', '1', NULL, '127.0.0.1', NULL, '2024-10-17 19:38:28', '2024-10-17 19:38:28'),
(11, 3, 'Wicked', 'wicked-1729193922', '0', 'a', '1', NULL, '127.0.0.1', NULL, '2024-10-17 19:38:42', '2024-10-17 19:38:42'),
(12, 3, 'Les Miserables', 'les-miserables-1729193936', '0', 'a', '1', NULL, '127.0.0.1', NULL, '2024-10-17 19:38:56', '2024-10-17 19:38:56'),
(13, 4, '50 persons pogram', '50-persons-pogram-1729193950', '0', 'a', '1', NULL, '127.0.0.1', NULL, '2024-10-17 19:39:10', '2024-10-17 19:39:10'),
(14, 4, '100 persons program', '100-persons-program-1729193964', '0', 'a', '1', NULL, '127.0.0.1', NULL, '2024-10-17 19:39:24', '2024-10-17 19:39:24'),
(15, 4, '300 persons program', '300-persons-program-1729193976', '0', 'a', '1', NULL, '127.0.0.1', NULL, '2024-10-17 19:39:36', '2024-10-17 19:39:36'),
(16, 5, '2-5 person', '2-5-person-1729193987', '0', 'a', '1', NULL, '127.0.0.1', NULL, '2024-10-17 19:39:47', '2024-10-17 19:39:47'),
(17, 5, '8-10 persons', '8-10-persons-1729193996', '0', 'a', '1', NULL, '127.0.0.1', NULL, '2024-10-17 19:39:56', '2024-10-17 19:39:56'),
(18, 5, '15 persons (max)', '15-persons-max-1729194006', '0', 'a', '1', NULL, '127.0.0.1', NULL, '2024-10-17 19:40:06', '2024-10-17 19:40:06');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` text DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1',
  `save_by` varchar(3) DEFAULT NULL,
  `updated_by` varchar(3) DEFAULT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE `upazilas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` text NOT NULL,
  `thum_image` text DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1',
  `save_by` varchar(3) DEFAULT NULL,
  `updated_by` varchar(3) DEFAULT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `image`, `thum_image`, `password`, `status`, `save_by`, `updated_by`, `ip_address`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'MD Hossain', 'admin', 'admin@gmail.com', NULL, 'uploads/user/admin_671bd2401037f.png', NULL, '$2y$10$EjShH7/cFiT9U5tpZ/t0KOpuglZkp33zrpDYMtWezYT/5xdi0ozFS', '1', NULL, '1', '127.0.0.1', NULL, NULL, '2024-10-13 20:10:09', '2024-10-25 17:16:41'),
(2, 'Abdullah', 'admin2', 'admin2@gmail.com', NULL, 'images/avatar.png', NULL, '$2y$10$ZAFCPAobzFrdMjAUWW7Pz.xSrK3TnDkFSc7ZLpgQZnPisQPYxokHa', '1', NULL, NULL, NULL, NULL, NULL, '2024-10-13 20:10:09', '2024-10-13 20:10:09');

-- --------------------------------------------------------

--
-- Table structure for table `video_galleries`
--

CREATE TABLE `video_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(120) NOT NULL,
  `youtube_link` text NOT NULL,
  `save_by` varchar(3) DEFAULT NULL,
  `update_by` varchar(3) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ip_address` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `areas_upazila_id_foreign` (`upazila_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `company_profiles`
--
ALTER TABLE `company_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_country_id_foreign` (`country_id`),
  ADD KEY `customers_district_id_foreign` (`district_id`),
  ADD KEY `customers_upazila_id_foreign` (`upazila_id`),
  ADD KEY `customers_area_id_foreign` (`area_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `management`
--
ALTER TABLE `management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `origins`
--
ALTER TABLE `origins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photo_galleries`
--
ALTER TABLE `photo_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_origin_id_foreign` (`origin_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_features`
--
ALTER TABLE `product_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_features_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_features`
--
ALTER TABLE `service_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_features_service_id_foreign` (`service_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `upazilas_district_id_foreign` (`district_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `video_galleries`
--
ALTER TABLE `video_galleries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `company_profiles`
--
ALTER TABLE `company_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `management`
--
ALTER TABLE `management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `origins`
--
ALTER TABLE `origins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photo_galleries`
--
ALTER TABLE `photo_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_features`
--
ALTER TABLE `product_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `service_features`
--
ALTER TABLE `service_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upazilas`
--
ALTER TABLE `upazilas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `video_galleries`
--
ALTER TABLE `video_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `areas_upazila_id_foreign` FOREIGN KEY (`upazila_id`) REFERENCES `upazilas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customers_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customers_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customers_upazila_id_foreign` FOREIGN KEY (`upazila_id`) REFERENCES `upazilas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_origin_id_foreign` FOREIGN KEY (`origin_id`) REFERENCES `origins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_features`
--
ALTER TABLE `product_features`
  ADD CONSTRAINT `product_features_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_features`
--
ALTER TABLE `service_features`
  ADD CONSTRAINT `service_features_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD CONSTRAINT `upazilas_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
