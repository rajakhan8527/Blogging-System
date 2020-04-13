-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2020 at 04:16 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `presentation`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slugs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `slugs`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Home', '/', 1, '2020-03-25 10:47:59', '2020-03-29 05:54:29'),
(2, 'DIGITAL MARKETING', 'digital-marketing', 1, '2020-03-25 10:48:45', '2020-03-25 10:48:45'),
(3, 'CRM SOFTWARES', 'softwares', 1, '2020-03-25 10:49:10', '2020-03-25 10:49:10'),
(4, 'CLIENTS', 'clients', 1, '2020-03-25 10:49:23', '2020-03-25 10:49:23'),
(5, 'REPORTS', 'reports', 1, '2020-03-25 10:49:34', '2020-03-25 10:49:34'),
(6, 'CONTACT', '#contact', 1, '2020-03-25 10:49:50', '2020-04-02 09:11:58'),
(7, 'Furniture', 'furniture', 1, '2020-04-03 08:43:47', '2020-04-03 08:43:47');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ppt_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `category_id`, `title`, `ppt_url`, `youtube_link`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'CENTRALIZE ASSET INFORMATION', '//www.slideshare.net/slideshow/embed_code/key/JgLrZpxiJewFXO', '', '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur facilis est numquam ipsam officiis commodi fugiat doloremque veritatis ipsa illum, magnam tenetur, maxime nihil saepe sit modi eos fugit animi.</p>', 1, '2020-03-28 09:58:17', '2020-03-29 05:11:22'),
(2, 1, 'CENTRALIZE ASSET INFORMATION', NULL, 'obAnE8kWH2U', '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur facilis est numquam ipsam officiis commodi fugiat doloremque veritatis ipsa illum, magnam tenetur, maxime nihil saepe sit modi eos fugit animi.</p>', 1, '2020-03-28 10:21:07', '2020-03-30 10:29:34'),
(3, 1, 'CENTRALIZE ASSET INFORMATION', '//www.slideshare.net/slideshow/embed_code/key/IUzFnquGw6I6dL', '', '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur facilis est numquam ipsam officiis commodi fugiat doloremque veritatis ipsa illum, magnam tenetur, maxime nihil saepe sit modi eos fugit animi.</p>', 1, '2020-03-29 02:31:23', '2020-03-29 04:42:43'),
(4, 1, 'CENTRALIZE ASSET INFORMATION', NULL, 'Vn_bR1AlV-s', '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur facilis est numquam ipsam officiis commodi fugiat doloremque veritatis ipsa illum, magnam tenetur, maxime nihil saepe sit modi eos fugit animi.</p>', 1, '2020-03-29 03:42:37', '2020-03-30 10:30:21'),
(5, 2, 'Php developer', '//www.slideshare.net/slideshow/embed_code/key/zL7mg0aL6aj39', NULL, '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur facilis est numquam ipsam officiis commodi fugiat doloremque veritatis ipsa illum, magnam tenetur, maxime nihil saepe sit modi eos fugit animi.</p>', 1, '2020-03-29 04:32:10', '2020-03-30 10:12:13'),
(6, 3, 'Php developer', NULL, 'j8V7xj15f9w', '<p>This Organization is initiated in New York, USA having it&#39;s Support and Consultancy available in New York, Manchester, Abu Dhabi &amp; now functioning in New Delhi. We are a IT Solution Architect company, a unique of it&#39;s kind in India. We work for providing IT Consultancy solutions focusing on IT Solution Architecture Services. This is the latest and most essential service in IT Solution Development &amp; Implementation Life Cycle.</p>', 1, '2020-03-30 10:48:56', '2020-03-30 10:51:25'),
(7, 4, 'Most Visited', '//www.slideshare.net/slideshow/embed_code/key/IUzFnquGw6I6dL', NULL, '<p>This Organization is initiated in New York, USA having it&#39;s Support and Consultancy available in New York, Manchester, Abu Dhabi &amp; now functioning in New Delhi. We are a IT Solution Architect company, a unique of it&#39;s kind in India. We work for providing IT Consultancy solutions focusing on IT Solution Architecture Services. This is the latest and most essential service in IT Solution Development &amp; Implementation Life Cycle.</p>', 1, '2020-03-30 10:54:21', '2020-03-30 10:55:01');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2020_03_23_145826_create_categories_table', 1),
(13, '2020_03_23_150235_create_subcategories_table', 1),
(14, '2020_03_25_153651_create_presentations_table', 1),
(15, '2020_03_25_153925_create_specialisations_table', 1),
(16, '2020_03_25_154214_create_powerpoints_table', 1),
(17, '2020_03_26_134936_create_ppt_details_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `presentations`
--

CREATE TABLE `presentations` (
  `id` int(11) NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_two` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_three` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1-Active, 0-Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `presentations`
--

INSERT INTO `presentations` (`id`, `tag`, `about`, `tag_two`, `tag_three`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ABOUT', '<p style=\"text-align:justify\">This Organization is initiated in New York, USA having it&#39;s Support and Consultancy available in New York, Manchester, Abu Dhabi &amp; now functioning in New Delhi. We are a IT Solution Architect company, a unique of it&#39;s kind in India. We work for providing IT Consultancy solutions focusing on IT Solution Architecture Services. This is the latest and most essential service in IT Solution Development &amp; Implementation Life Cycle.</p>', 'OUR SPECIALISATION', 'OUR PRESENTATION', '1', '2020-03-25 11:38:16', '2020-03-25 12:31:43');

-- --------------------------------------------------------

--
-- Table structure for table `specialisations`
--

CREATE TABLE `specialisations` (
  `id` int(11) NOT NULL,
  `specialisation_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1-Active, 0-Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialisations`
--

INSERT INTO `specialisations` (`id`, `specialisation_name`, `url`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Enterprise Resource Planning', 'enterprise-resource-planning', '1', '2020-03-25 13:06:05', '2020-03-26 07:54:40'),
(2, 'Human Resource Management', 'human-resource-management', '1', '2020-03-25 13:06:44', '2020-03-25 13:06:44'),
(3, 'Content Management', 'content-management', '1', '2020-03-25 13:07:07', '2020-03-29 12:01:09'),
(4, 'Ads & Campaigns', 'ads-campaigns', '1', '2020-03-25 13:07:29', '2020-03-28 12:37:31'),
(5, 'Web Development', 'web-development', '1', '2020-03-28 12:33:42', '2020-03-28 12:33:42'),
(6, 'Brand Building', 'brand-building', '1', '2020-03-28 12:34:06', '2020-03-28 12:34:06'),
(7, 'Customer Relationship Management', 'customer-relationship-management', '1', '2020-03-28 12:34:31', '2020-03-28 12:34:31'),
(8, 'Learning Management', 'learning-management', '1', '2020-03-28 12:34:51', '2020-03-28 12:34:51'),
(9, 'Social Media Marketing', 'social-media-marketing', '1', '2020-03-28 12:35:15', '2020-03-28 12:35:15'),
(10, 'App Development', 'app-development', '1', '2020-03-28 12:35:39', '2020-03-28 12:35:39'),
(11, 'Market Research & Data Analytics', 'market-research-data-analytics', '1', '2020-03-28 12:36:09', '2020-03-28 12:36:09'),
(12, 'Portfolio Marketing', 'portfolio-marketing', '1', '2020-03-28 12:36:29', '2020-03-28 12:36:29');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1-Active, 0-Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `slug`, `subcategory`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'abc-xyz', 'ABC-XYZ', '1', '2020-03-25 10:52:11', '2020-03-29 11:56:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@example.com', NULL, '$2y$10$ToHLBUhFqCGSkma6slKNQey75iwukiQV7ZgQwYRPboDYO.jttCSV2', NULL, '2020-03-25 10:42:12', '2020-03-25 10:42:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `presentations`
--
ALTER TABLE `presentations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialisations`
--
ALTER TABLE `specialisations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `presentations`
--
ALTER TABLE `presentations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `specialisations`
--
ALTER TABLE `specialisations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
