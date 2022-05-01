-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 01, 2022 at 11:54 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survay`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
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
-- Table structure for table `leave_request`
--

DROP TABLE IF EXISTS `leave_request`;
CREATE TABLE IF NOT EXISTS `leave_request` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `leave_type` enum('CL','SL','PL','LWP') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'CL=Casual Leave, SL=Sick Leave, PL=Paid Leave, LWP=Leave Without Pay',
  `leave_reason` text COLLATE utf8mb4_unicode_ci,
  `number_of_days` float NOT NULL,
  `leave_start_date` date NOT NULL,
  `leave_end_date` date NOT NULL,
  `leave_year` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leave_month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leave_status` tinyint(1) DEFAULT NULL,
  `authorized_reason` text COLLATE utf8mb4_unicode_ci,
  `authorized_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `crea_user` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mod_user` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `leave_request_user_id_foreign` (`user_id`),
  KEY `leave_request_authorized_by_foreign` (`authorized_by`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_request`
--

INSERT INTO `leave_request` (`id`, `user_id`, `leave_type`, `leave_reason`, `number_of_days`, `leave_start_date`, `leave_end_date`, `leave_year`, `leave_month`, `leave_status`, `authorized_reason`, `authorized_by`, `status`, `created_at`, `updated_at`, `crea_user`, `mod_user`) VALUES
(26, 2, 'LWP', 'mgfbh', 11, '2022-07-20', '2022-07-30', '2022', '7', 0, 'rejection because of frequency', 1, 0, '2022-05-01 05:16:27', '2022-05-01 05:16:52', '2', '1'),
(25, 2, 'LWP', 'bvhbgb', 7, '2022-06-21', '2022-06-27', '2022', '6', 1, NULL, 1, 0, '2022-05-01 05:16:07', '2022-05-01 05:16:12', '2', '1'),
(22, 2, 'SL', 'jnfvhy', 0.5, '2022-05-21', '2022-05-21', '2022', '5', 1, NULL, 1, 0, '2022-05-01 05:10:29', '2022-05-01 05:10:33', '2', '1'),
(24, 2, 'LWP', 'jbgh', 9, '2022-06-10', '2022-06-18', '2022', '6', 1, NULL, 1, 0, '2022-05-01 05:15:41', '2022-05-01 05:15:46', '2', '1'),
(23, 2, 'LWP', 'fbhfv', 11, '2022-05-20', '2022-05-30', '2022', '5', 1, NULL, 1, 0, '2022-05-01 05:15:10', '2022-05-01 05:15:22', '2', '1'),
(21, 2, 'SL', 'jbfh', 1, '2022-05-22', '2022-05-22', '2022', '5', 1, NULL, 1, 0, '2022-05-01 05:09:39', '2022-05-01 05:09:43', '2', '1'),
(20, 2, 'SL', 'jnfhv', 0.5, '2022-05-20', '2022-05-20', '2022', '5', 1, NULL, 1, 0, '2022-05-01 05:09:11', '2022-05-01 05:09:17', '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_05_21_100000_create_teams_table', 1),
(7, '2020_05_21_200000_create_team_user_table', 1),
(8, '2021_01_05_111947_create_sessions_table', 1),
(9, '2022_04_30_074144_create_posts_table', 1),
(10, '2022_04_30_074233_create_posts_images_table', 1),
(11, '2022_04_30_074303_create_posts_comments_table', 1),
(12, '2022_04_30_080703_create_leave_request_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `crea_user` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mod_user` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_post_id_unique` (`post_id`),
  KEY `posts_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts_comments`
--

DROP TABLE IF EXISTS `posts_comments`;
CREATE TABLE IF NOT EXISTS `posts_comments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commented_user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `crea_user` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mod_user` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_comments_commented_user_id_foreign` (`commented_user_id`),
  KEY `posts_comments_post_id_index` (`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts_images`
--

DROP TABLE IF EXISTS `posts_images`;
CREATE TABLE IF NOT EXISTS `posts_images` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_image_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `crea_user` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mod_user` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_images_post_id_index` (`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3noRa1dc5lfX7fO9JEribjUA6Wt541RbLO1raJcu', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZUVhS3RJb1RLMWxPZUlpdHFzZ1JjMzUxZ3BueUM5SUZYM2tTR2lzMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHA6Ly9hanBzdXJ2YXkubG9jYWxob3N0L2VtcGxveWVlL3JlamVjdGVkbGVhdmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkbzVZbmFqZTlOWGNYNE14YkI5OEZBZWVDbzg2R3N1UFpVUUxTN0ExcjhBL1J2dHY5OXc1YVciO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJG81WW5hamU5TlhjWDRNeGJCOThGQWVlQ284NkdzdVBaVVFMUzdBMXI4QS9SdnR2OTl3NWFXIjt9', 1651402018),
('HRxvqD3YAVn9NgfHAcztWVZzMPeNJVRgMwYbRktf', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiVmViaERJeFd5N2lEbWhFa2tDUlRPcHJSRlV0WjNjYkoxU0NrWVNjaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly9hanBzdXJ2YXkubG9jYWxob3N0L2VtcGxveWVlL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRvNVluYWplOU5YY1g0TXhiQjk4RkFlZUNvODZHc3VQWlVRTFM3QTFyOEEvUnZ0djk5dzVhVyI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkbzVZbmFqZTlOWGNYNE14YkI5OEZBZWVDbzg2R3N1UFpVUUxTN0ExcjhBL1J2dHY5OXc1YVciO30=', 1651397173),
('bWo1Vz0wEn9Ypj7IpHCyvketeBXz8Gkfc5AWR5Hy', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', 'YTo2OntzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCR0Z2JtWTU2MDdUekp3LlA5Y1RuaFBPTHJLdzlIdnJQVW52Y20uRWZpZEJoV2hVZnJOQ1lRMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly9hanBzdXJ2YXkubG9jYWxob3N0L2hyL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoiX3Rva2VuIjtzOjQwOiJmemxlZVBBZ3BsTmtsOHBqT1NvcE1peWhGQkF1WXlyUmhhQXJ2eXZMIjtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkdGdibVk1NjA3VHpKdy5QOWNUbmhQT0xyS3c5SHZyUFVudmNtLkVmaWRCaFdoVWZyTkNZUTIiO30=', 1651397264),
('nknbdIoF9z1lQ9RTloFUMH0FYstpX7kITnOj211w', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', 'YTo2OntzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCR0Z2JtWTU2MDdUekp3LlA5Y1RuaFBPTHJLdzlIdnJQVW52Y20uRWZpZEJoV2hVZnJOQ1lRMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly9hanBzdXJ2YXkubG9jYWxob3N0L2hyL2FwcGxpZWRsZWF2ZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoiX3Rva2VuIjtzOjQwOiJYWVRLRTlRV09VYVZ2V3NMYnQ4T3lyWUl2RjR4ZkJoY05ERlZZZ1NoIjtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkdGdibVk1NjA3VHpKdy5QOWNUbmhQT0xyS3c5SHZyUFVudmNtLkVmaWRCaFdoVWZyTkNZUTIiO30=', 1651402012),
('6cvuT5YG5aPD9Uvj0uAmwvxAhbDpcsclzEE9r7Uu', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSFQwMElGeFVKQmxPZko2d0d1c0hDTTBYWjI1QkFTQnc0MU1wZHc5bCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9sb2NhbGhvc3QvYXNzaWdubWVudC9wdWJsaWMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1651402090),
('vZlhu22Oq4Vv0aiaaGYyDNN1oVN2A8xEFoiSXzC7', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiOUhGYkpzTzB2S1Q5Vklla3F6eWZvTDB0Q0lBbGVidGN6bWZmZmN3QiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly9hc3NpZ25tZW50LmxvY2FsaG9zdC9oci9wYXN0YXBwbGljYXRpb25zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJHRnYm1ZNTYwN1R6SncuUDljVG5oUE9Mckt3OUh2clBVbnZjbS5FZmlkQmhXaFVmck5DWVEyIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCR0Z2JtWTU2MDdUekp3LlA5Y1RuaFBPTHJLdzlIdnJQVW52Y20uRWZpZEJoV2hVZnJOQ1lRMiI7fQ==', 1651402735);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teams_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
(1, 1, 'simanta\'s Team', 1, '2022-04-30 02:58:33', '2022-04-30 02:58:33'),
(2, 2, 'Employee\'s Team', 1, '2022-04-30 03:00:15', '2022-04-30 03:00:15');

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

DROP TABLE IF EXISTS `team_user`;
CREATE TABLE IF NOT EXISTS `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(135) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `level` smallint(5) UNSIGNED NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `level`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'simanta rajbongshi', 'simanta', '$2y$10$tgbmY5607TzJw.P9cTnhPOLrKw9HvrPUnvcm.EfidBhWhUfrNCYQ2', NULL, NULL, 1, 1, NULL, '2022-04-30 02:58:33', '2022-04-30 02:58:33'),
(2, 'Employee first', 'employee', '$2y$10$o5Ynaje9NXcX4MxbB98FAeeCo86GsuPZUQLS7A1r8A/Rvtv99w5aW', NULL, NULL, 0, 1, NULL, '2022-04-30 03:00:15', '2022-04-30 03:00:15');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
