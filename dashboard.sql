-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2020 at 10:29 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `cruds`
--

CREATE TABLE `cruds` (
  `id` int(11) NOT NULL,
  `ar_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `en_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cruds`
--

INSERT INTO `cruds` (`id`, `ar_name`, `en_name`, `created_at`, `updated_at`) VALUES
(1, 'إضافة', 'create', NULL, NULL),
(2, 'للإطلاع فقط', 'read', NULL, NULL),
(3, 'تعديل', 'update', NULL, NULL),
(4, 'حذف ', 'delete', NULL, NULL);

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_24_145852_create_categories_table', 1),
(4, '2019_01_28_194130_create_category_translations_table', 1),
(5, '2019_02_05_031022_create_products_table', 1),
(6, '2019_02_05_031035_create_product_translations_table', 1),
(7, '2019_02_19_064134_create_clients_table', 1),
(8, '2019_02_27_224902_create_orders_table', 1),
(9, '2019_06_06_105828_create_product_order_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2020_01_10_100921_create_client_translations_table', 1),
(12, '2020_01_10_190552_create_stores_table', 1),
(13, '2020_01_10_190606_create_store_translations_table', 1),
(14, '2020_01_10_192253_create_posts_table', 1),
(15, '2020_01_10_192422_create_post_translations_table', 1),
(16, '2020_01_10_192444_create_tags_table', 1),
(17, '2020_01_10_192459_create_tag_translations_table', 1),
(18, '2020_01_16_032901_create_suppliers_table', 1),
(19, '2020_01_16_032928_create_supplier_translations_table', 1),
(20, '2020_01_16_095431_create_order_suppliers_table', 1),
(21, '2020_01_16_105828_create_product_order_supplier_table', 1),
(22, '2020_01_28_001519_mony_stocks_table', 1),
(23, '2020_01_28_001600_mony_stocks_translations_table', 1),
(24, '2020_02_06_111338_prosuct_store', 1),
(25, '2020_02_08_205351_create_order_returns_table', 1),
(26, '2020_02_08_205526_create_order_supplier_returns_table', 1),
(27, '2020_02_08_205629_product_order_return', 1),
(28, '2020_02_08_205647_product_order_supplier_return', 1),
(29, '2020_02_08_211522_create_order_stores_table', 1),
(30, '2020_03_09_180051_laratrust_setup_tables', 1),
(31, '2020_10_02_213601_create_post_tag_table', 1),
(32, '2020_03_13_113417_create_settings_table', 2),
(33, '2020_03_13_145353_create_role_sites_table', 3);

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
  `id` int(10) UNSIGNED NOT NULL,
  `roleSite_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `roleSite_id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(124, 22, 'create_videos', 'create_videos', NULL, '2020-03-15 21:24:18', '2020-03-15 21:24:18'),
(125, 22, 'read_videos', 'read_videos', NULL, '2020-03-15 21:24:18', '2020-03-15 21:24:18'),
(126, 22, 'update_videos', 'update_videos', NULL, '2020-03-15 21:24:18', '2020-03-15 21:24:18'),
(127, 22, 'delete_videos', 'delete_videos', NULL, '2020-03-15 21:24:18', '2020-03-15 21:24:18'),
(132, 24, 'create_articles', 'create_articles', NULL, '2020-03-15 22:42:11', '2020-03-15 22:42:11'),
(133, 24, 'read_articles', 'read_articles', NULL, '2020-03-15 22:42:11', '2020-03-15 22:42:11'),
(134, 24, 'update_articles', 'update_articles', NULL, '2020-03-15 22:42:11', '2020-03-15 22:42:11'),
(135, 24, 'delete_articles', 'delete_articles', NULL, '2020-03-15 22:42:11', '2020-03-15 22:42:11'),
(136, 25, 'create_roles', 'create_roles', NULL, '2020-03-15 22:44:09', '2020-03-15 22:44:09'),
(137, 25, 'read_roles', 'read_roles', NULL, '2020-03-15 22:44:10', '2020-03-15 22:44:10'),
(138, 25, 'update_roles', 'update_roles', NULL, '2020-03-15 22:44:10', '2020-03-15 22:44:10'),
(139, 25, 'delete_roles', 'delete_roles', NULL, '2020-03-15 22:44:10', '2020-03-15 22:44:10'),
(140, 26, 'create_permissions_admin', 'create_permissions_admin', NULL, '2020-03-15 22:45:14', '2020-03-15 22:45:14'),
(141, 26, 'read_permissions_admin', 'read_permissions_admin', NULL, '2020-03-15 22:45:14', '2020-03-15 22:45:14'),
(142, 26, 'update_permissions_admin', 'update_permissions_admin', NULL, '2020-03-15 22:45:14', '2020-03-15 22:45:14'),
(143, 26, 'delete_permissions_admin', 'delete_permissions_admin', NULL, '2020-03-15 22:45:14', '2020-03-15 22:45:14'),
(144, 27, 'create_permissions_users', 'create_permissions_users', NULL, '2020-03-15 22:45:49', '2020-03-15 22:45:49'),
(145, 27, 'read_permissions_users', 'read_permissions_users', NULL, '2020-03-15 22:45:49', '2020-03-15 22:45:49'),
(146, 27, 'update_permissions_users', 'update_permissions_users', NULL, '2020-03-15 22:45:49', '2020-03-15 22:45:49'),
(147, 27, 'delete_permissions_users', 'delete_permissions_users', NULL, '2020-03-15 22:45:49', '2020-03-15 22:45:49'),
(148, 28, 'create_settings', 'create_settings', NULL, '2020-03-16 20:24:49', '2020-03-16 20:24:49'),
(149, 28, 'read_settings', 'read_settings', NULL, '2020-03-16 20:24:50', '2020-03-16 20:24:50'),
(150, 28, 'update_settings', 'update_settings', NULL, '2020-03-16 20:24:51', '2020-03-16 20:24:51'),
(151, 28, 'delete_settings', 'delete_settings', NULL, '2020-03-16 20:24:51', '2020-03-16 20:24:51');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(124, 2),
(125, 2),
(125, 5),
(126, 2),
(127, 2),
(132, 2),
(133, 2),
(133, 5),
(134, 2),
(135, 2),
(144, 2),
(145, 2),
(146, 2),
(147, 2);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_user`
--

INSERT INTO `permission_user` (`permission_id`, `user_id`, `user_type`, `team_id`) VALUES
(125, 10, 'App\\User', NULL),
(133, 10, 'App\\User', NULL),
(137, 10, 'App\\User', NULL),
(124, 11, 'App\\User', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'Super Admin', 'Super Admin', '2020-03-13 14:26:44', '2020-03-13 14:26:44'),
(2, 'admin', 'Admin', 'Admin', '2020-03-13 14:26:51', '2020-03-13 14:26:51'),
(5, 'users', NULL, NULL, '2020-03-16 20:28:37', '2020-03-16 20:28:37');

-- --------------------------------------------------------

--
-- Table structure for table `role_sites`
--

CREATE TABLE `role_sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_sites`
--

INSERT INTO `role_sites` (`id`, `name`, `ar_name`, `created_at`, `updated_at`) VALUES
(22, 'videos', 'الفيديوهات', '2020-03-15 21:24:17', '2020-03-15 21:24:17'),
(24, 'articles', 'المقالات', '2020-03-15 22:42:11', '2020-03-15 22:42:11'),
(25, 'roles', 'صلاحيات الموقع', '2020-03-15 22:44:09', '2020-03-15 22:44:09'),
(26, 'permissions_admin', 'صلاحيات الأدمن', '2020-03-15 22:45:14', '2020-03-15 22:45:14'),
(27, 'permissions_users', 'صلاحيات المستخدمين', '2020-03-15 22:45:49', '2020-03-15 22:45:49'),
(28, 'settings', 'إعدادت الموقع', '2020-03-16 20:24:48', '2020-03-16 20:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`, `team_id`) VALUES
(1, 1, 'App\\User', NULL),
(5, 10, 'App\\User', NULL),
(5, 11, 'App\\User', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ar',
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('open','close') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `message_maintenance` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `ar_name`, `en_name`, `logo`, `icon`, `email`, `main_lang`, `description`, `keywords`, `status`, `message_maintenance`, `created_at`, `updated_at`) VALUES
(1, 'Austin Harding', 'Holly Lynn', 'MRLOM5e1oYg2bvWr7cFlLS0S3J8VgwMytqGupOyH.jpeg', 'o89ni2CBIQb90vkg4mrLCaDf3o89bReWUFMejNUn.jpeg', 'suris@mailinator.com', 'Id velit esse laud', 'Sunt tempor deserunt', 'Nihil consequuntur b', 'open', 'مغلق للصيانة', NULL, '2020-03-14 18:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `phone`, `password`, `facebook_url`, `twitter_url`, `website_url`, `active`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'Super', 'super_admin@app.com', 'dJZRxvCE2XaP94WMwK6Rfvo22ewglxhw3Y0RZShU.jpeg', '01028855871', '$2y$10$6WSh4slU6qvkANbsvrsdCO1nmTvdIFmA5ewwKpR21K.Nc8HlfSIn6', 'https://www.facebook.com/', NULL, NULL, 1, NULL, NULL, '2020-03-13 14:26:53', '2020-03-13 17:40:11', NULL, NULL, 1, NULL),
(10, 'hazem', 'hazem.chelsea9@yahoo.com', 'SOlMoAL3M46QdmTWhDv461efwh1PCNuOBCH21vrM.jpeg', NULL, '$2y$10$BRSy0P8HlR/46./2el06yOM1dt0s/18GggZwPcRIGb4F5z5Paj3CK', NULL, NULL, NULL, 1, NULL, NULL, '2020-03-16 22:31:45', '2020-03-17 00:26:07', NULL, 1, 1, NULL),
(11, 'hos', 'hos@app.com', 'WNvV5K8aPDPbutQnmznypYz97bVTup0oIKeP2Tuh.jpeg', NULL, '$2y$10$q4cvS5MdsVPSFWGmwXyjR.i9FOogQZEbMVw5qFwXsvNzB4rvOxUdW', NULL, NULL, NULL, 1, NULL, NULL, '2020-03-17 00:42:16', '2020-03-17 16:04:31', NULL, 1, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cruds`
--
ALTER TABLE `cruds`
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
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`),
  ADD KEY `roleSite_id` (`roleSite_id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD UNIQUE KEY `permission_user_user_id_permission_id_user_type_team_id_unique` (`user_id`,`permission_id`,`user_type`,`team_id`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_user_team_id_foreign` (`team_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_sites`
--
ALTER TABLE `role_sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD UNIQUE KEY `role_user_user_id_role_id_user_type_team_id_unique` (`user_id`,`role_id`,`user_type`,`team_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_team_id_foreign` (`team_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_created_by_foreign` (`created_by`),
  ADD KEY `users_updated_by_foreign` (`updated_by`),
  ADD KEY `users_deleted_by_foreign` (`deleted_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cruds`
--
ALTER TABLE `cruds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role_sites`
--
ALTER TABLE `role_sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_ibfk_1` FOREIGN KEY (`roleSite_id`) REFERENCES `role_sites` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
