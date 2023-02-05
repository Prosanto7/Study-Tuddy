-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2023 at 07:41 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studytuddy`
--

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `user_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `subject` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `user_id`, `subject`, `created_at`, `updated_at`) VALUES
('1275505702', '1275505701', 'Artificial Intelligence', '2023-01-15 06:12:35', '2023-01-15 06:12:35'),
('1275505703', '1275505701', 'Numerical Methods', '2023-01-15 06:12:41', '2023-01-15 06:12:41'),
('1275505705', '1275505701', 'Discrete Mathematics', '2023-01-15 06:23:02', '2023-01-15 06:23:02'),
('1275505706', '1275505701', 'Software Testing', '2023-01-15 06:37:31', '2023-01-15 06:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `subjects_per_day`
--

CREATE TABLE `subjects_per_day` (
  `id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `saturday` int(1) NOT NULL DEFAULT 0,
  `sunday` int(1) NOT NULL DEFAULT 0,
  `monday` int(1) NOT NULL DEFAULT 0,
  `tuesday` int(1) NOT NULL DEFAULT 0,
  `wednesday` int(1) NOT NULL DEFAULT 0,
  `thursday` int(1) NOT NULL DEFAULT 0,
  `friday` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects_per_day`
--

INSERT INTO `subjects_per_day` (`id`, `saturday`, `sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `created_at`, `updated_at`) VALUES
('1275505701', 3, 2, 3, 4, 3, 3, 2, '2023-01-14 23:59:20', '2023-01-15 00:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `subject_status`
--

CREATE TABLE `subject_status` (
  `id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `user_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `subject` text NOT NULL,
  `topic` text NOT NULL,
  `status` int(10) NOT NULL,
  `completed` int(10) NOT NULL DEFAULT 0,
  `last_date` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject_status`
--

INSERT INTO `subject_status` (`id`, `user_id`, `subject`, `topic`, `status`, `completed`, `last_date`, `created_at`, `updated_at`) VALUES
('2130768417070', '1275505701', 'Software Testing', 'Chapter 1.1', 20, 0, '', '2023-01-15 06:22:27', '2023-01-15 06:22:27'),
('2169377270706', '1275505701', 'Software Testing', 'Chapter 1.5', 10, 0, '', '2023-01-15 06:22:46', '2023-01-15 06:22:46'),
('3276608616715', '1275505701', 'Artificial Intelligence', 'Chapter 1.1', 10, 0, '', '2023-01-15 06:15:22', '2023-01-15 06:15:22'),
('3547010158750', '1275505701', 'Numerical Methods', 'Chapter 3', 15, 0, '', '2023-01-15 06:21:45', '2023-01-15 06:21:45'),
('3588456184614', '1275505701', 'Numerical Methods', 'Chapter 4', 5, 0, '', '2023-01-15 06:21:59', '2023-01-15 06:21:59'),
('4971446893099', '1275505701', 'Artificial Intelligence', 'Chapter 1.2', 20, 0, '', '2023-01-15 06:15:32', '2023-01-15 06:15:32'),
('5224105396659', '1275505701', 'Numerical Methods', 'Chapter 1', 10, 0, '', '2023-01-15 06:21:26', '2023-01-15 06:21:26'),
('5593081751271', '1275505701', 'Numerical Methods', 'Chapter 2', 10, 0, '', '2023-01-15 06:21:34', '2023-01-15 06:21:34'),
('5816708309700', '1275505701', 'Discrete Mathematics', 'Chapter 8', 10, 0, '', '2023-01-15 06:23:27', '2023-01-15 06:23:27'),
('6008592559158', '1275505701', 'Artificial Intelligence', 'Chapter 2', 12, 0, '', '2023-01-15 06:21:07', '2023-01-15 06:21:07'),
('6052266837474', '1275505701', 'Software Testing', 'Chapter 3', 12, 0, '', '2023-01-15 06:22:56', '2023-01-15 06:22:56'),
('6557008494520', '1275505701', 'Software Testing', 'Chapter 1.2', 5, 0, '', '2023-01-15 06:22:36', '2023-01-15 06:22:36'),
('6638686797244', '1275505701', 'Discrete Mathematics', 'Chapter 9', 10, 0, '', '2023-01-15 06:23:17', '2023-01-15 06:23:17'),
('6715377585168', '1275505701', 'Artificial Intelligence', 'Chapter 3', 20, 0, '', '2023-01-15 06:21:18', '2023-01-15 06:21:18'),
('8036204166010', '1275505701', 'Discrete Mathematics', 'Chapter 5.5', 15, 0, '', '2023-01-15 06:23:43', '2023-01-15 06:23:43');

-- --------------------------------------------------------

--
-- Table structure for table `time_slots`
--

CREATE TABLE `time_slots` (
  `id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `user_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `start` time DEFAULT NULL,
  `end` time DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time_slots`
--

INSERT INTO `time_slots` (`id`, `user_id`, `start`, `end`, `created_at`, `updated_at`) VALUES
('1242396398532', '1275505701', '08:00:00', '09:00:00', '2023-01-15 06:18:29', '2023-01-15 06:18:29'),
('2946030525422', '1275505701', '10:00:00', '13:00:00', '2023-01-15 06:19:32', '2023-01-15 06:19:32'),
('4201424589341', '1275505701', '14:30:00', '16:00:00', '2023-01-15 06:19:54', '2023-01-15 06:19:54'),
('5965245584867', '1275505701', '20:00:00', '22:00:00', '2023-01-15 06:20:20', '2023-01-15 06:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
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
('1275505701', 'Prosanto Deb', 'prosanto2514@student.nstu.edu.bd', NULL, '$2y$10$TYB.k40AQG6ony2N5eODZOBmbuTfh72t4LtrTQ1XBmMIHkOSjlNqi', '922054', '2023-01-14 23:59:20', '2023-01-15 00:38:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `subjects_per_day`
--
ALTER TABLE `subjects_per_day`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_status`
--
ALTER TABLE `subject_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `time_slots`
--
ALTER TABLE `time_slots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `subjects_per_day`
--
ALTER TABLE `subjects_per_day`
  ADD CONSTRAINT `subjects_per_day_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `subject_status`
--
ALTER TABLE `subject_status`
  ADD CONSTRAINT `subject_status_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `time_slots`
--
ALTER TABLE `time_slots`
  ADD CONSTRAINT `time_slots_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
