-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 16, 2023 at 09:54 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `vehicle_id` bigint UNSIGNED NOT NULL,
  `booking_type` enum('test_drive','purchase') COLLATE utf8mb4_unicode_ci NOT NULL,
  `booking_date` date DEFAULT NULL,
  `booking_time` time DEFAULT NULL,
  `booking_status` enum('pending','completed','rejected','approved') COLLATE utf8mb4_unicode_ci NOT NULL,
  `booking_amount` double NOT NULL,
  `booking_mode` enum('online','offline') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_reference_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booking_payment_status` enum('paid','unpaid') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bookings_user_id_foreign` (`user_id`),
  KEY `bookings_vehicle_id_foreign` (`vehicle_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `vehicle_id`, `booking_type`, `booking_date`, `booking_time`, `booking_status`, `booking_amount`, `booking_mode`, `payment_reference_image`, `booking_payment_status`, `created_at`, `updated_at`) VALUES
(31, 7, 24, 'purchase', NULL, NULL, 'pending', 50000, 'online', NULL, 'paid', '2023-10-05 00:46:20', '2023-10-05 00:46:20'),
(32, 7, 29, 'test_drive', NULL, NULL, 'rejected', 0, 'online', NULL, 'paid', '2023-10-05 00:50:22', '2023-10-05 00:56:52');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(29, '2014_10_12_000000_create_users_table', 1),
(30, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(31, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(32, '2019_08_19_000000_create_failed_jobs_table', 1),
(33, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(34, '2023_05_17_074650_create_sessions_table', 1),
(35, '2023_06_03_035207_create_products_table', 1),
(36, '2023_08_26_175945_create_user_details_table', 1),
(37, '2023_08_26_184040_create_previous_owner_details_table', 1),
(43, '2023_08_26_184552_create_vehicle_details_table', 2),
(39, '2023_08_26_192505_create_bookings_table', 1),
(40, '2023_08_26_193045_create_notifications_table', 1),
(46, '2023_08_26_195738_create_sold_vehicles_table', 3),
(42, '2023_08_26_201557_create_staff_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `booking_id` bigint UNSIGNED NOT NULL,
  `notification_type` enum('test_drive','purchase') COLLATE utf8mb4_unicode_ci NOT NULL,
  `notification_message` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notification_status` enum('read','unread') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_booking_id_foreign` (`booking_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `booking_id`, `notification_type`, `notification_message`, `notification_status`, `created_at`, `updated_at`) VALUES
(12, 25, 'test_drive', 'New Test Drive Request from Abdullah for BMW 740Le LWB M-Sport', 'read', '2023-09-15 05:43:52', '2023-09-28 14:21:59'),
(14, 27, 'test_drive', 'New Test Drive Request from Abdullah Suhail for Land Rover Range P400', 'read', '2023-09-29 07:42:12', '2023-09-29 13:37:50'),
(6, 19, 'purchase', 'New Purchase Request from Abdullah for Audi TTS Sline Quattro Coupe', 'read', '2023-09-14 04:18:12', '2023-09-28 14:22:25'),
(13, 26, 'purchase', 'New Purchase Request from Abdullah Suhail for BMW 740Le LWB M-Sport', 'read', '2023-09-28 15:21:56', '2023-09-28 15:22:28'),
(15, 28, 'purchase', 'New Purchase Request from Abdullah for Land Rover Range P400', 'read', '2023-09-29 07:52:57', '2023-09-29 13:38:14'),
(16, 29, 'test_drive', 'New Test Drive Request from Abdullah for BMW 740Le LWB M-Sport', 'read', '2023-09-29 08:21:20', '2023-09-29 13:37:50'),
(17, 30, 'purchase', 'New Purchase Request from Abdullah for Mercedes Benz C200 AMG Line', 'read', '2023-10-04 10:57:58', '2023-10-04 11:19:31'),
(18, 31, 'purchase', 'New Purchase Request from Abdullah for Mercedes Benz C200 AMG Line', 'unread', '2023-10-05 00:46:20', '2023-10-05 00:46:20'),
(19, 32, 'test_drive', 'New Test Drive Request from Abdullah for Land Rover Range P400', 'read', '2023-10-05 00:50:22', '2023-10-05 00:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('abu@gmail.com', '$2y$10$KjP9nQHQp1ulSrNfMuduAO/aOmd.1wmFYkiH5pXBL/XJbjep9Umqu', '2023-09-14 00:08:53');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `previous_owner_details`
--

DROP TABLE IF EXISTS `previous_owner_details`;
CREATE TABLE IF NOT EXISTS `previous_owner_details` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female','other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `age` int NOT NULL,
  `occupation` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` int NOT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `previous_owner_details`
--

INSERT INTO `previous_owner_details` (`id`, `first_name`, `last_name`, `phone_number`, `email`, `gender`, `dob`, `age`, `occupation`, `address`, `city`, `state`, `zip_code`, `country`, `created_at`, `updated_at`) VALUES
(8, 'Abdullah', 'Suhail', '077798327', 'abdullah@gmail.com', 'male', '1999-07-07', 30, 'Businessmen', '21/3, Galle Road, Colombo 07', 'Colombo', 'Colombo', 12345, 'Srilanka', '2023-09-05 13:16:20', '2023-09-05 13:16:20'),
(7, 'Abdullah', 'Suhail', '0773613116', 'abu@gmail.com', 'male', '2003-08-23', 25, 'Software Engineer', '23/2, Main Rd, Colombo', 'Colombo', 'Colombo', 33434, 'Srilanka', '2023-09-04 03:04:11', '2023-09-04 03:04:11');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` decimal(9,2) NOT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` mediumtext COLLATE utf8mb4_unicode_ci,
  `product_category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_stock` int NOT NULL,
  `product_status` enum('instock','lowstock','outofstock') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'instock',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('w39I9sc1VebLrh9ACEcB7eyGD1bD75b00tGH7QtE', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36 Edg/117.0.2045.47', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoid3Z1dFhrUjJDdjNSTkFPZzg3cUpTdVZzRGNMTUFqbEdsSVU0NmFxRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9zdGFmZkFuYWx5dGljcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1696487638),
('jkccpg9hv8zPXSvYiVPOTqMEhGfVvcea8XsTFppC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid1NMZ1ZZd0piTlRZM0o0RUdTM2E2VVM4b1dpdzlyTDVIaU15OGtObSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fX0=', 1696487792),
('AAYCUicprWQaJlNW1hnIP2DYyeSHNAj6RC17N41B', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNTdMb1VxcHNZNUVXNWg5a05aZEQ2czFMUFZaOVZBRTBidTFleWtweiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fX0=', 1697445459),
('ump4u7nRM20fjpsU0DqhO0s4bdMNF7zmDU8QobAA', 20, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieExwM25ZUThTdk56N1NCUERDalRETjdSS1BRM3JtZUxOSEdxYWlFWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC92ZWhpY2xlLzI5L3Rlc3Rkcml2ZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjIwO30=', 1696487239);

-- --------------------------------------------------------

--
-- Table structure for table `sold_vehicles`
--

DROP TABLE IF EXISTS `sold_vehicles`;
CREATE TABLE IF NOT EXISTS `sold_vehicles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `booking_id` bigint UNSIGNED DEFAULT NULL,
  `vehicle_id` bigint UNSIGNED DEFAULT NULL,
  `buyer_fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sold_date` date NOT NULL,
  `sold_amount` double NOT NULL,
  `sold_status` enum('pending_delivery','completed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_date` date DEFAULT NULL,
  `staff_id` bigint UNSIGNED DEFAULT NULL,
  `staff_commission` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sold_vehicles_booking_id_foreign` (`booking_id`),
  KEY `sold_vehicles_vehicle_id_foreign` (`vehicle_id`),
  KEY `sold_vehicles_staff_id_foreign` (`staff_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sold_vehicles`
--

INSERT INTO `sold_vehicles` (`id`, `booking_id`, `vehicle_id`, `buyer_fname`, `buyer_lname`, `buyer_email`, `buyer_phone`, `buyer_gender`, `sold_date`, `sold_amount`, `sold_status`, `delivery_date`, `staff_id`, `staff_commission`, `created_at`, `updated_at`) VALUES
(9, NULL, 24, 'Vance', 'Ball', 'rimopozy@mailinator.com', '0773535353', 'female', '1984-08-08', 9000000, 'completed', '2004-12-30', 6, 45000, '2023-10-05 00:59:00', '2023-10-05 00:59:00'),
(8, NULL, 25, 'Flavia', 'Hayden', 'xugy@mailinator.com', '0776464646', 'male', '2007-08-23', 32250000, 'completed', '1998-01-30', 8, 161250, '2023-10-04 23:40:02', '2023-10-04 23:40:02');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `commission` double NOT NULL DEFAULT '0',
  `days_worked` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `staff_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `user_id`, `commission`, `days_worked`, `created_at`, `updated_at`) VALUES
(9, 19, 0, 0, '2023-10-04 23:40:27', '2023-10-04 23:40:27'),
(8, 18, 161250, 0, '2023-10-04 23:32:47', '2023-10-04 23:40:02'),
(7, 17, 0, 0, '2023-10-04 23:32:31', '2023-10-04 23:32:31'),
(6, 16, 45000, 0, '2023-10-04 23:32:11', '2023-10-05 00:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_details_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','staff','customer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_user_details_id_foreign` (`user_details_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_details_id`, `name`, `email`, `role`, `status`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Admin', 'admin@gmail.com', 'admin', 'active', NULL, '$2y$10$Z2k3iPK/WoQwcbLcSqx/LulfHXyIdCHycEuhfDAXNlX3KCQR3AsHu', NULL, NULL, NULL, NULL, NULL, 'profile-photos/CnHCJctkQLvitQoqZOtwuuUqRXAj3rZYngj54M4t.jpg', '2023-08-30 12:03:03', '2023-08-30 14:11:54'),
(18, 17, 'Emily Johns', 'Emily@staffs.firstmotors.lk', 'staff', 'active', NULL, '$2y$10$lPdbItT9HWmXMuuNNGrRtebm8w/2Dpp4f9C1Bm0XvzAd5Bz88jbA2', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-04 23:32:47', '2023-10-05 00:55:15'),
(19, 18, 'Kasimir Rogers', 'Kasimir@staffs.firstmotors.lk', 'staff', 'active', NULL, '$2y$10$sNpEKpDNn1WlBIE8QcUHL.vVMbsP5D6cHrhS7oiObNZr93/iQCapi', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-04 23:40:27', '2023-10-04 23:40:27'),
(20, NULL, 'abu', 'abu21@gmail.com', 'customer', 'active', NULL, '$2y$10$AQbUUZJW2Q/6VVfp5eLH/OXCAHA3HPsqhf6T7y1BvuLGlrsVavofq', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-05 00:48:49', '2023-10-05 00:48:49'),
(7, 8, 'Abdullah', 'abu@gmail.com', 'customer', 'active', NULL, '$2y$10$yP97fD8cZHOUpWUm1nS6I.LQ9HCEg8P90AeOCk8MuR3naYQPy2AKy', NULL, NULL, NULL, NULL, NULL, 'profile-photos/GU8F3ZJLOV2nZ3yfP1VjedNxdifn6T9YaX4kWJDB.jpg', '2023-09-05 04:39:29', '2023-10-04 10:27:07'),
(17, 16, 'Elizabeth Atkinson', 'Elizabeth@staffs.firstmotors.lk', 'staff', 'active', NULL, '$2y$10$VumdJ98egtZQiB0AoxD1pOB57CDUoKXWXLmWApTpsxgKj9SzZZuri', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-04 23:32:31', '2023-10-04 23:32:31'),
(9, 7, 'Abdullah Suhail', 'abu1@gmail.com', 'customer', 'active', NULL, '$2y$10$gsCowEzl44bWVGvO7T.4H.upRkLFTheG2Hxl8Zg1oeeTwhTHz15Fq', NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-10 15:40:10', '2023-09-10 15:40:10'),
(10, 9, 'Shoshana Hahn', 'cudo@mailinator.com', 'customer', 'active', NULL, '$2y$10$paFXMERohE2lawmZTcxx1.6LTUKE/V8TzHy4/Td3wT7h4dB78d3Pq', NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-18 13:03:43', '2023-09-18 13:03:43'),
(11, 10, 'Jelani Gibbs', 'wokuky@mailinator.com', 'customer', 'active', NULL, '$2y$10$b5NXrvg1Yk79/ECzLpK6L.31/8RGpBK3L6bAyWNLo4VfqO/tNGQMu', NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-20 14:05:25', '2023-09-20 14:05:25'),
(16, 15, 'Kendall Wyatt', 'Kendall@staffs.firstmotors.lk', 'staff', 'active', NULL, '$2y$10$4pIknVzYU1CYb99ZmP.Ewe5p4LreDRCfo9ZWUJd/UvwOwOgfbedY.', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-04 23:32:11', '2023-10-04 23:32:11'),
(14, 13, 'Abdullah', 'abu2@gmail.com', 'customer', 'active', NULL, '$2y$10$lyjThEwkfULLw0I7TNWJEuxTjWIa0SaUTvTe50DmpclvhyJ08ZGse', NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-28 15:35:27', '2023-09-29 08:21:20');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
CREATE TABLE IF NOT EXISTS `user_details` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female','other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `age` int NOT NULL,
  `occupation` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` int NOT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `first_name`, `last_name`, `phone_number`, `email`, `gender`, `dob`, `age`, `occupation`, `address`, `city`, `state`, `zip_code`, `country`, `created_at`, `updated_at`) VALUES
(1, 'Basia', 'Ratliff', '105', 'kuxydok@mailinator.com', 'male', '1982-11-09', 10, 'Nihil exercitation c', 'Nemo minima est magn', 'balangoda', 'sabaragamuwa', 43896, 'srilanka', '2023-08-30 12:04:26', '2023-08-30 12:04:26'),
(2, 'Irene', 'Lang', '895', 'sali@mailinator.com', 'male', '2005-10-11', 75, 'Exercitationem adipi', 'Ad eligendi nulla eu', 'ampara', 'northern', 95065, 'srilanka', '2023-08-30 12:04:54', '2023-08-30 12:04:54'),
(3, 'Clark', 'Green', '355', 'vagufonyju@mailinator.com', 'male', '2020-02-04', 85, 'Obcaecati magna proi', 'Consectetur sit no', 'kalmunai', 'sabaragamuwa', 22332, 'srilanka', '2023-08-30 12:05:06', '2023-08-30 12:05:06'),
(4, 'Sarah', 'Decker', '816', 'fejolacyw@mailinator.com', 'female', '1978-06-10', 80, 'Maiores voluptatum d', 'Ipsa exercitation f', 'colombo', 'northern', 35110, 'srilanka', '2023-08-30 12:30:59', '2023-08-30 12:30:59'),
(5, 'Jarrod', 'Garza', '883', 'sysekubo@mailinator.com', 'other', '2004-06-12', 66, 'Molestias est iste', 'Aperiam laboriosam', 'kandy', 'western', 15336, 'srilanka', '2023-08-30 13:44:14', '2023-08-30 13:44:14'),
(6, 'Abdullah', 'Suhail', '077379697', 'abu@gmail.com', 'male', '2014-06-10', 25, 'Bussiness', '21/Galle Road', 'colombo', 'western', 12345, 'srilanka', '2023-09-10 15:39:36', '2023-09-10 15:39:36'),
(7, 'Abdullah', 'Suhail', '077379697', 'abu1@gmail.com', 'male', '2014-06-10', 25, 'Bussiness', '21/Galle Road', 'colombo', 'western', 12345, 'srilanka', '2023-09-10 15:40:10', '2023-09-10 15:40:10'),
(8, 'Ivana', 'Mathis', '5555555555', 'jygo@mailinator.com', 'female', '1992-07-12', 31, 'Sequi est veniam m', 'Ipsa irure iste par', 'Dicta obcaecati et c', 'Sit rerum sint corpo', 74182, 'Quas rem sed ratione', '2023-09-15 05:37:45', '2023-09-15 05:37:45'),
(9, 'Shoshana', 'Hahn', '899', 'cudo@mailinator.com', 'male', '2010-08-31', 30, 'Software', 'Omnis dignissimos pa', 'galle', 'southern', 44626, 'srilanka', '2023-09-18 13:03:43', '2023-09-18 13:03:43'),
(10, 'Jelani', 'Gibbs', '0771264932', 'wokuky@mailinator.com', 'male', '1987-03-26', 36, 'Est accusantium dol', 'Nesciunt dolorem mo', 'colombo', 'western', 46050, 'srilanka', '2023-09-20 14:05:25', '2023-09-20 14:05:25'),
(11, 'Glenna', 'Combs', '0773613116', 'camowuqi@mailinator.com', 'male', '1974-12-14', 21, 'Velit a beatae qui', 'Vel tempor error ali', 'trincomalee', 'northern', 10045, 'srilanka', '2023-09-28 13:34:22', '2023-09-28 13:34:22'),
(12, 'Zia', 'Farmer', '0773613116', 'radifo@mailinator.com', 'female', '1987-11-27', 22, 'Ducimus excepteur i', 'Quo dolorum voluptat', 'kotte', 'northern', 77199, 'srilanka', '2023-09-28 13:50:39', '2023-09-28 13:50:39'),
(13, 'Keith', 'Harmon', '0771264932', 'zicifipyji@gmail.com', 'female', '2017-08-13', 6, 'Ipsum atque nisi di', 'Qui adipisci volupta', 'Enim pariatur Aut n', 'Saepe ea voluptates', 91235, 'Id sint ad et ipsu', '2023-09-29 08:21:20', '2023-09-29 08:21:20'),
(14, 'Regina', 'Gentry', '0773613116', 'xepivi@mailinator.com', 'male', '1992-05-16', 66, 'Distinctio Enim mag', 'Aperiam consequat A', 'ambalangoda', 'eastern', 90502, 'srilanka', '2023-09-29 14:13:38', '2023-09-29 14:13:38'),
(15, 'Kendall', 'Wyatt', '916', 'kakam@mailinator.com', 'female', '1977-08-10', 13, 'Quas deleniti culpa', 'Autem dolore minima', 'moratuwa', 'central', 72268, 'srilanka', '2023-10-04 23:32:11', '2023-10-04 23:32:11'),
(16, 'Elizabeth', 'Atkinson', '575', 'cymawus@mailinator.com', 'male', '1973-07-17', 2, 'Autem adipisicing re', 'Laboriosam Nam aut', 'weligama', 'north_central', 52356, 'srilanka', '2023-10-04 23:32:31', '2023-10-04 23:32:31'),
(17, 'Emily', 'Johns', '288', 'kelisit@mailinator.com', 'other', '1986-02-26', 53, 'Nisi quo dolor accus', 'Quis recusandae Id', 'gampaha', 'central', 13627, 'srilanka', '2023-10-04 23:32:47', '2023-10-04 23:32:47'),
(18, 'Kasimir', 'Rogers', '520', 'lefor@mailinator.com', 'female', '1996-11-23', 66, 'Incidunt in enim la', 'Libero pariatur Ut', 'hikkaduwa', 'north_central', 64593, 'srilanka', '2023-10-04 23:40:27', '2023-10-04 23:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_details`
--

DROP TABLE IF EXISTS `vehicle_details`;
CREATE TABLE IF NOT EXISTS `vehicle_details` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `previous_owner_id` bigint UNSIGNED DEFAULT NULL,
  `vehicle_type` enum('luxury','sedan','convertible','jdm','sports','hyper') COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_make` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_model` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_year_manufactured` int NOT NULL,
  `vehicle_year_registered` int NOT NULL,
  `vehicle_ownership` enum('new','first','second','third','fourth','fifth','sixth','seventh','eighth','ninth','tenth') COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_color` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_mileage` int NOT NULL,
  `vehicle_transmission` enum('automatic','manual') COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_fuel_type` enum('petrol','diesel','electric','hybrid') COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_condition` enum('new','used') COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_license_plate` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_thumbnail` mediumtext COLLATE utf8mb4_unicode_ci,
  `vehicle_images` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `vehicle_description` varchar(600) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_cost_price` decimal(12,2) NOT NULL,
  `vehicle_selling_price` decimal(12,2) NOT NULL,
  `profit` decimal(9,2) NOT NULL,
  `availability` enum('available','sold') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicle_details_previous_owner_id_foreign` (`previous_owner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_details`
--

INSERT INTO `vehicle_details` (`id`, `previous_owner_id`, `vehicle_type`, `vehicle_make`, `vehicle_model`, `vehicle_year_manufactured`, `vehicle_year_registered`, `vehicle_ownership`, `vehicle_color`, `vehicle_mileage`, `vehicle_transmission`, `vehicle_fuel_type`, `vehicle_condition`, `vehicle_license_plate`, `vehicle_thumbnail`, `vehicle_images`, `vehicle_description`, `vehicle_cost_price`, `vehicle_selling_price`, `profit`, `availability`, `created_at`, `updated_at`) VALUES
(25, NULL, 'luxury', 'mercedes-benz', 'Mercedes Benz C200 Cabriolet AMG 2.0L', 2016, 2017, 'new', 'Pearl White', 60000, 'automatic', 'petrol', 'new', 'WP-CAT-3224', 'thumbnails/3TgWZhwc1WxoGLtOFI8ldat5DdNfxlUlKydyUxZX.jpg', '[\"more_images\\/JaTuTv0q0kRCIz3W0fey0L9qsKsanIYL48KjFYEO.jpg\",\"more_images\\/rs5u7nIKxOtgRkV6CnxFwFoRsaqVgXREM5PLgSeM.jpg\",\"more_images\\/XTLOKL1pekw5qYgDAqlnZCy4YI2ckAg3QrwN73DB.jpg\",\"more_images\\/9ruNy97ENVu0OojFibwG8EJ0GwoEVyiWmQnKYowm.jpg\",\"more_images\\/8oQjWfJwXpN5puaSDvNGgArjEXOx1JED50FGpXb7.jpg\"]', NULL, '32000000.00', '32250000.00', '1000000.00', 'sold', '2023-09-04 00:40:30', '2023-10-04 23:40:02'),
(24, NULL, 'luxury', 'mercedes-benz', 'Mercedes Benz C200 AMG Line', 2018, 2020, 'new', 'Pearl White', 31000, 'automatic', 'petrol', 'new', 'WP-CBE-7497', 'thumbnails/GAj3iJdye0FEYshIHa774iybsG5AxRChKs1H5U5r.jpg', '[\"more_images\\/o48Fy4YLDpj3yPr8hYalRWAQ1PBu7oVTca43qp20.jpg\",\"more_images\\/CFeID65MpN7C9VzzH7cKECQZWHjaY9S0IRHrWfZP.jpg\",\"more_images\\/CEjBcfaFLA1T8McJC6SoQ4hJw5ouo2aj0M32iVaS.jpg\",\"more_images\\/GAfKT4lhJdwgWjiTdmwxk3QtMuUCLfXq1skifXBR.jpg\",\"more_images\\/bQZGEbKoYw6EyQn3z7pjhKAcxXbzs1cE2v7HLIAK.jpg\"]', 'Nice Car', '8000000.00', '9000000.00', '1000000.00', 'sold', '2023-09-04 00:36:52', '2023-10-05 00:59:00'),
(23, NULL, 'luxury', 'bmw', 'BMW 740Le LWB M-Sport', 2019, 2020, 'new', 'Pearl White', 50000, 'automatic', 'petrol', 'new', 'WP-CBC-6695', 'thumbnails/aMNDXplracWvhpf7ScgMWUvCmPAnYcmhgqXW6DGu.jpg', '[\"more_images\\/vWcxHpHp8tnYjRrS6EpGpzZjnOOQ51GXOMNfGvq8.jpg\",\"more_images\\/9i9pay83pWyQl1qdX8lGdMuumqzzFnMR2TbFVHOP.jpg\",\"more_images\\/1pzNCAkPcAoP1JIsQQfx6Il4cuUKcNqAQ4ffXSxJ.jpg\",\"more_images\\/9DnP6TiurkmLKUM1RaZsf37xBIinPhNTjVGA5ZPf.jpg\",\"more_images\\/ExZcdfQVlwR8qQhqweI7WAAxHB1ayYJ4K2fcqc0H.jpg\"]', NULL, '48500000.00', '49500000.00', '1000000.00', 'available', '2023-09-03 23:26:56', '2023-09-29 15:14:32'),
(27, NULL, 'sports', 'audi', 'Audi TTS Sline Quattro Coupe', 2015, 2020, 'new', 'Golden Yellow', 21000, 'automatic', 'petrol', 'new', 'WP-CAQ-0099', 'thumbnails/x7BlMxpADPezmHtnAhNLAYSDCDxGX9022iw3qQOK.jpg', '[\"more_images\\/6bgmXG6XPPdRrjLwqtFd4TW67B6mGDydwmrTH0k7.jpg\",\"more_images\\/AELUNoBmtWrAUle0UyxsngpGS9qcieNCD8jTIjrd.jpg\",\"more_images\\/oXd892Ydm8FMItNnYH3HqOIIrVXq9vP31LmOyvMQ.jpg\",\"more_images\\/JrZpcPlDCTcKV3IvDNO0AAoeFri7BoD7nIyFh7d0.jpg\",\"more_images\\/HNT7HKzfBOSEShxJA6aDusA96lsIU8hK26ldpTfK.jpg\"]', NULL, '23500000.00', '25000000.00', '1000000.00', 'available', '2023-09-04 02:58:06', '2023-09-04 02:58:06'),
(28, 7, 'sedan', 'bmw', 'BMW 530e MSport', 2017, 2020, 'first', 'Pearl White', 41000, 'automatic', 'electric', 'used', 'WP-CAY-7675', 'thumbnails/nY5dFXDSBpU291fQzcUhzvjeLp6ODboj759xfdZM.jpg', '[\"more_images\\/u8X4TZetCV8VR41KWlRsvGdYB3zRS3i4KHZDmk4o.jpg\",\"more_images\\/OjFcTq3EQWg154CRunVMKeVDnYzPEgOUv3VJ8lW6.jpg\",\"more_images\\/H2onQPEcOhlAEsNheWMNGiCFt8OKnLNQbKPtCd9g.jpg\",\"more_images\\/HRB4J7loEFbGJe4dKLTWSMFN5VVncGNjJiL2V7P3.jpg\",\"more_images\\/oCOJ6VauwUUmYmHgsogHJOvM4098zTt1BqE7mAho.jpg\"]', NULL, '26500000.00', '27500000.00', '1000000.00', 'available', '2023-09-04 03:04:11', '2023-09-04 03:04:11'),
(29, 8, 'luxury', 'land-rover', 'Land Rover Range P400', 2019, 2021, 'first', 'Yulong White', 36000, 'automatic', 'petrol', 'used', 'WP-CBF-4361', 'thumbnails/wcwV7dgjcDxdv6iumb1PniY8oHdp7P1YZZQzQ2K5.jpg', '[\"more_images\\/sUbTvso9HfAZXOAfAxRMQL65H6wzFL4FIagVzKhN.jpg\",\"more_images\\/DDtWGlhFkhKCfrNPQB1rh44FBc1xwZvuCHX5wrxt.jpg\",\"more_images\\/wRLacwpFCDIv87M6TGg18LKRrrXpbQkoxAoV76Z7.jpg\",\"more_images\\/Xz92NLOj7AXRO5YqawBtLT9ymaGvimVvfEmS1w4c.jpg\",\"more_images\\/hljQL7WHYR2bt9fmIJPJjQdv2qf0o3LNvNBAeApw.jpg\"]', '•Pixel Headlamps \r\n•Extended Leather Package \r\n•Soft close door \r\n•360 surround view camera \r\n•Meridian surround sound system\r\n•360 surround Sensors\r\n•Deployable side steps\r\n•Panoramic sliding sunroof', '70000000.00', '73500000.00', '3500000.00', 'available', '2023-09-05 13:16:20', '2023-09-05 13:16:20');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
