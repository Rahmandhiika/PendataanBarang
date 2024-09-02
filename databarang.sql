-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2024 at 04:34 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `databarang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `foto_barang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `nama_barang`, `harga_barang`, `jumlah_barang`, `foto_barang`, `kategori_id`, `created_at`, `updated_at`) VALUES
(1, 'Canggih Monitor', 4075410, 1, 'img/bNVbf5rokjSwIM1Q2ZovetrGHqfPgMGqbpVzvq9m.png', 2, NULL, '2024-09-02 07:19:50'),
(2, 'Keren Meja Makan', 8542183, 27, 'uploads/product-1.jpg', 4, NULL, NULL),
(3, 'Keren Televisi', 14698154, 74, 'uploads/product-1.jpg', 1, NULL, NULL),
(4, 'Keren Scanner', 17787413, 53, 'uploads/product-1.jpg', 3, NULL, NULL),
(5, 'Terbaik Smartwatch', 7958110, 90, 'uploads/product-1.jpg', 5, NULL, NULL),
(103, 'Headset Gemink', 1400000, 1, 'uploads/1725286836_S__9428999.jpg', 11, '2024-09-02 07:20:36', '2024-09-02 07:20:36');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frakturs`
--

CREATE TABLE `frakturs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frakturs`
--

INSERT INTO `frakturs` (`id`, `user_id`, `barang_id`, `quantity`, `created_at`, `updated_at`) VALUES
(4, 3, 1, 4, '2024-08-30 08:42:34', '2024-08-30 22:36:58'),
(10, 5, 2, 1, '2024-09-02 00:06:07', '2024-09-02 00:06:07'),
(11, 5, 3, 1, '2024-09-02 00:06:09', '2024-09-02 00:06:09'),
(12, 5, 4, 1, '2024-09-02 00:06:11', '2024-09-02 00:06:11'),
(14, 7, 1, 1, '2024-09-02 07:21:20', '2024-09-02 07:21:20'),
(15, 7, 2, 1, '2024-09-02 07:21:23', '2024-09-02 07:21:23');

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Elektronik', NULL, NULL),
(2, 'Aksesoris Komputer', NULL, NULL),
(3, 'Perlengkapan Kantor', NULL, NULL),
(4, 'Furniture', NULL, NULL),
(5, 'Gadget', NULL, NULL),
(6, 'Makanan', '2024-08-30 23:49:08', '2024-08-30 23:49:08'),
(7, 'Minuman', '2024-08-31 00:07:47', '2024-08-31 00:07:47'),
(8, 'Aksesoris Kursi', '2024-09-02 07:10:33', '2024-09-02 07:10:33'),
(9, 'Aksesoris Gaming', '2024-09-02 07:12:57', '2024-09-02 07:12:57'),
(10, 'Aksesoris Gaming', '2024-09-02 07:20:04', '2024-09-02 07:20:04'),
(11, 'Headset', '2024-09-02 07:20:10', '2024-09-02 07:20:10');

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
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2024_08_29_075547_create_kategoris_table', 2),
(10, '2024_08_29_075553_create_barangs_table', 3),
(11, '2024_08_29_133205_add_role_to_users_table', 4),
(12, '2024_08_30_103003_create_frakturs_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('rahmandhika19@gmail.com', '$2y$10$flSdJ9B1sYwwEsEMg5dLsul/yTQkBrGWG3AmANC0dWa8Q7nq6uwxy', '2024-09-02 06:57:41'),
('rahmandhika58@gmail.com', '$2y$10$/hHYh1YuWMhaQxzzvJxZ0OCFFcxJWJuow5P3rDugXPpjnRTRMpqx2', '2024-09-02 07:15:26'),
('rahmandhika24@gmail.com', '$2y$10$bUC140qHEWx5lJF7BvSjXegVACdcOQrvDbQUrhjcIWKrc3UiiAJ3m', '2024-09-02 07:22:02');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'User', 'user123@gmail.com', NULL, '$2y$10$w4wokCMDd98Y5ycCfgwTge1wy.UqYxjqUvjrs0rqKIQU1k7p7b0p6', NULL, '2024-08-29 01:28:09', '2024-08-29 01:28:09', 'user'),
(2, 'admin', 'admin@gmail.com', NULL, '$2a$12$r1pSrvYs0Uc3YJehVsYWlumLLLPC1R9oicGlWspDDXr4n.jQbGV5u', NULL, NULL, NULL, 'admin'),
(3, 'user1', 'user1@gmail.com', NULL, '$2y$10$s0Qulmsj8wgaJ1GPW.7A1O34Uexe2vbcydqKNO36kj1qV3NkIgmau', 'Nh5Hw0xzKExeo8NKexwzR7buZ3o2ERJ001ccG5qGFO2wwAdRX4pizaaS0aUI', '2024-08-30 02:15:30', '2024-08-30 02:15:30', 'user'),
(4, 'User123', 'user1234@gmail.com', NULL, '$2y$10$fJCkOqfG.wSL9omMLKvA0.4ISiPx3cza8NOAl/Iev3eo18VF5d80W', NULL, '2024-08-31 00:03:16', '2024-08-31 00:03:16', 'user'),
(5, 'Rahmandhika Putra Purwadi Wicaksono', 'rahmandhika19@gmail.com', NULL, '$2y$10$B.OVEUuopvghrQpdPhkKfev6mjvq2OZ1o1VKTCn7IfK7Mw6M1nu9m', NULL, '2024-09-02 00:06:01', '2024-09-02 00:06:01', 'user'),
(6, 'Rahmandhika Putra Purwadi Wicaksono', 'rahmandhika58@gmail.com', NULL, '$2y$10$g1BcNSDx7QfcZfAAn6xZ7eWhf7DrqPOjT8xch1kUBtiYbBghqajnO', NULL, '2024-09-02 07:14:14', '2024-09-02 07:14:14', 'user'),
(7, 'Rahmandhika Putra Purwadi Wicaksono', 'rahmandhika24@gmail.com', NULL, '$2y$10$YQRrV9ADY7svrf9rGwM0cOGP0//UP68CuVp.YH0Lvsd0MWkAw2q8i', NULL, '2024-09-02 07:21:06', '2024-09-02 07:21:06', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangs_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `frakturs`
--
ALTER TABLE `frakturs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `frakturs_user_id_foreign` (`user_id`),
  ADD KEY `frakturs_barang_id_foreign` (`barang_id`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frakturs`
--
ALTER TABLE `frakturs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barangs`
--
ALTER TABLE `barangs`
  ADD CONSTRAINT `barangs_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`);

--
-- Constraints for table `frakturs`
--
ALTER TABLE `frakturs`
  ADD CONSTRAINT `frakturs_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `frakturs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
