-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2026 at 12:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('aplikasi-no-surat-lb-cache-5c785c036466adea360111aa28563bfd556b5fba', 'i:1;', 1791194645),
('aplikasi-no-surat-lb-cache-5c785c036466adea360111aa28563bfd556b5fba:timer', 'i:1791194645;', 1791194645);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kode1s`
--

CREATE TABLE `kode1s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(30) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kode1s`
--

INSERT INTO `kode1s` (`id`, `kode`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'D.10', 'Kode 1 D.10', '2026-10-05 03:00:54', '2026-10-05 03:00:54');

-- --------------------------------------------------------

--
-- Table structure for table `kode2s`
--

CREATE TABLE `kode2s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(30) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kode2s`
--

INSERT INTO `kode2s` (`id`, `kode`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'LBU', 'Kode 2 LBU', '2026-10-05 03:00:54', '2026-10-05 03:00:54');

-- --------------------------------------------------------

--
-- Table structure for table `kode_surats`
--

CREATE TABLE `kode_surats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(20) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kode_surats`
--

INSERT INTO `kode_surats` (`id`, `kode`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'KD', 'kode', '2026-10-05 01:36:17', '2026-10-05 01:36:17'),
(2, 'UM', 'Surat Umum', '2026-10-05 02:52:27', '2026-10-05 02:52:27'),
(3, 'SK', 'Surat Keputusan', '2026-10-05 02:52:27', '2026-10-05 02:52:27'),
(4, 'KEP', 'Surat Kepegawaian', '2026-10-05 02:52:27', '2026-10-05 02:52:27'),
(5, 'UND', 'Surat Undangan', '2026-10-05 02:52:27', '2026-10-05 02:52:27'),
(6, 'ST', 'Surat Tugas', '2026-10-05 02:52:27', '2026-10-05 02:52:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_10_05_071144_create_surats_table', 1),
(5, '2026_10_05_083322_create_kode_surats_table', 1),
(6, '2026_10_05_084508_create_setting_nomors_table', 2),
(7, '2026_10_05_094828_make_nomor_global_per_tahun', 3),
(8, '2026_10_05_095522_add_role_to_users_table', 4),
(9, '2026_10_05_100030_create_kode1s_table', 5),
(10, '2026_10_05_100031_create_kode2s_table', 5),
(11, '2026_10_05_100032_add_kode1_kode2_to_surats_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0kCiDyHO99A9Z9n6MGTwe5HLLjI4djzPEQiqxsxf', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJVUUhpbkpYZ3R3eTRwZmJlZHNXeHdqYUNIem43WWN4TUpwbEE3bURtIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwIiwicm91dGUiOiJkYXNoYm9hcmQifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJ1cmwiOnsiaW50ZW5kZWQiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMCJ9fQ==', 1791193955),
('25YvuOzMD6t6N6mfPYlGKQOeeLCFFP5qYfs9TiE0', 1, '127.0.0.1', 'Symfony', 'eyJfdG9rZW4iOiJiYThFa29xY1d6a1RCU0JVZWxtcVoyZmxmNVBYUnFIZ09kWThkZnJmIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdFwvc3VyYXQ/cGFnZT0yJnBlcl9wYWdlPTEwIiwicm91dGUiOiJzdXJhdC5pbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1791194276),
('9xd5SetolRGBSBs8AiCbUn9L455pX0vEwFDcMo3I', 1, '127.0.0.1', 'Symfony', 'eyJfdG9rZW4iOiJld1RZYUVQV2JFU1pBMWY1UUNhRWdnY2N0MEVlSm9OZW9FSzREN3VDIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdFwvdXNlciIsInJvdXRlIjoidXNlci5pbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1791194145),
('F64mFSzqFyghMSXGP1Y7hoZJsoMQWvFSR42YISgV', 1, '127.0.0.1', 'Symfony', 'eyJfdG9rZW4iOiI4Z2VlVTJmTk1xVXlVWXhXMVNWS1JBR3hCY2FmTmpkcUNHSWtsTXJlIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdCIsInJvdXRlIjoiZGFzaGJvYXJkIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1791194466),
('FU2FpsN2laZtc3A1FXwXLuTehx3ejyrUWSwocBDa', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiI2aXBMTXRxVWNpdXk2aTcwNjlRQVhvdnk3b2hlVDFPM3cxcHhCSUZQIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvbG9jYWxob3N0OjgwMDBcL2xvZ2luIiwicm91dGUiOiJsb2dpbiJ9LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MywicGFzc3dvcmRfaGFzaF93ZWIiOiIyMDE2MWFjM2QzMmY2NWZjZGVlMTcyZTQ3MjhkOGJkYWQwYTI4MDJjOGRlYmIzMDUzODU2MzAwMmMzZjE2MjA1In0=', 1791194226),
('WUxgDhQgTEhLB3lu81sStAgBRvB86myf1A6ejajh', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.140.0 Chrome/150.0.7871.250 Electron/43.7.3 Safari/537.36', 'eyJfdG9rZW4iOiIwaWRiMEpBajN0NUx0cVNOb2RJY0JCSGRhdExnUFNZWUZ1SWdIQUVkIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9rb2RlXC8xIiwicm91dGUiOiJrb2RlLmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjEsInBhc3N3b3JkX2hhc2hfd2ViIjoiZGMxOWViMDI5YmI5ZGVkNTNlNjEyOTk5ZTI1ODIyNzllNmI3MDIxMmUyYTFkYzYyZWNkYTJmYTIzZDU1ZTMzYyJ9', 1791194597),
('XVBgWpgVLZgs5tk1EwFiER2wweRKnTqwdsyNKMcw', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJGYllkZWlFM0JuSGNBQjZ2Wm5MdVAybkx1bkRLNHNyTFp1T0tDSjc1IiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvbG9jYWxob3N0OjgwMDBcL2xvZ2luIiwicm91dGUiOiJsb2dpbiJ9fQ==', 1791194807);

-- --------------------------------------------------------

--
-- Table structure for table `setting_nomors`
--

CREATE TABLE `setting_nomors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun` smallint(5) UNSIGNED NOT NULL,
  `nomor_terakhir` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surats`
--

CREATE TABLE `surats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_surat` varchar(255) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `tahun` smallint(5) UNSIGNED NOT NULL,
  `urutan` int(10) UNSIGNED NOT NULL,
  `kode1` varchar(30) NOT NULL DEFAULT '',
  `kode2` varchar(30) NOT NULL DEFAULT '',
  `tanggal` date NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(3) UNSIGNED NOT NULL DEFAULT 2,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@surat.test', NULL, '$2y$12$9otwX2K8o9lC4hFuvwJm/u4w8BI7foXUS7Oq4RThm5xIUVxg9RUZe', 1, NULL, '2026-10-05 02:52:27', '2026-10-05 02:52:27'),
(3, 'aab', 'aab@gmail.com', NULL, '$2y$12$JOwGLwnRHjwTpouky7c76OKa7yspNqHtLRTHN1lGCBvSEyDIVNI4a', 2, NULL, '2026-10-05 02:56:53', '2026-10-05 02:56:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kode1s`
--
ALTER TABLE `kode1s`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode1s_kode_unique` (`kode`);

--
-- Indexes for table `kode2s`
--
ALTER TABLE `kode2s`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode2s_kode_unique` (`kode`);

--
-- Indexes for table `kode_surats`
--
ALTER TABLE `kode_surats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_surats_kode_unique` (`kode`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `setting_nomors`
--
ALTER TABLE `setting_nomors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_nomors_tahun_unique` (`tahun`);

--
-- Indexes for table `surats`
--
ALTER TABLE `surats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `surats_nomor_surat_unique` (`nomor_surat`),
  ADD UNIQUE KEY `surats_tahun_urutan_unique` (`tahun`,`urutan`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kode1s`
--
ALTER TABLE `kode1s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kode2s`
--
ALTER TABLE `kode2s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kode_surats`
--
ALTER TABLE `kode_surats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `setting_nomors`
--
ALTER TABLE `setting_nomors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surats`
--
ALTER TABLE `surats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
