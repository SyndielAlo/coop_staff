-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 04:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
-- Table structure for table `board_of_directors`
--

CREATE TABLE `board_of_directors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `period` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `board_of_directors`
--

INSERT INTO `board_of_directors` (`id`, `name`, `position`, `period`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'David N. Almarez, DM', 'Chairperson', '2023-2025', 'photos/user1-128x128.jpg', 'Closed', '2023-12-19 08:08:01', '2023-12-19 08:08:01'),
(2, 'Prof. Edna E. Aberilla', 'Chairperson Emeritus', '2023-2025', 'photos/avatar.png', 'Closed', '2023-12-19 08:08:01', '2023-12-19 08:08:01'),
(3, 'Myrna P. Calo', 'Vice Chairperson', '2023-2025', 'photos/user2-160x160.jpg', 'Closed', '2023-12-19 08:08:01', '2023-12-19 08:08:01'),
(4, 'Rebecca M. Alcuizar, Ph.D', 'Director', '2023-2025', 'photos/avatar2.png', 'Closed', '2023-12-19 08:08:01', '2023-12-19 08:08:01'),
(5, 'Niña Flor B. Batara, JD', 'Director', '2023-2025', 'photos/user3-128x128.jpg', 'Closed', '2023-12-19 08:08:01', '2023-12-19 08:08:01'),
(6, 'Corazon V. Ligaray, Ph.D', 'Director', '2023-2025', 'photos/avatar3.png', 'Closed', '2023-12-19 08:08:01', '2023-12-19 08:08:01'),
(7, 'Nora A. Clar, MAT', 'Director', '2023-2025', 'photos/user4-128x128.jpg', 'Closed', '2023-12-19 08:08:01', '2023-12-19 08:08:01'),
(8, 'Roly Ann A. Claro, DM', 'Director', '2023-2025', 'photos/avatar4.png', 'Closed', '2023-12-19 08:08:01', '2023-12-19 08:08:01'),
(9, 'Loradel B. Pabillar, CPA', 'Director', '2023-2025', 'photos/user5-128x128.jpg', 'Closed', '2023-12-19 08:08:01', '2023-12-19 08:08:01'),
(10, 'Emmanuel C. Villanueva, CPA, MBM, CSEE', 'Director', '2023-2025', 'photos/avatar5.png', 'Closed', '2023-12-19 08:08:01', '2023-12-19 08:08:01'),
(11, 'Ricardo C. Enguito, MPA', 'BOD Secretary', '2023-2025', 'photos/user6-128x128.jpg', 'Closed', '2023-12-19 08:08:01', '2023-12-19 08:08:01'),
(12, 'Albert B. Teaño, JD', 'Chief Executive Officer', '2023-2025', 'photos/user7-128x128.jpg', 'Closed', '2023-12-19 08:08:01', '2023-12-19 08:08:01'),
(13, 'Erma Y. Darunday, CPA, MBM, JD', 'BOD Treasurer', '2023-2025', 'photos/user8-128x128.jpg', 'Closed', '2023-12-19 08:08:01', '2023-12-19 08:08:01'),
(14, 'ALO,SYNDIELA.', 'TESTER', '12/10/2023 - 01/14/2024', 'photos/HWPr49DQAUaELGMln460A1EL5MHyfXBpeQuWHx77.jpg', 'Open', '2023-12-19 08:08:01', '2023-12-19 08:08:01'),
(16, 'ALO,SYNDIELA.2', 'TESTER', '12/17/2023 - 12/23/2023', 'BOD_image/71PXEpXUWR3Hsmh91XA5B9pgy7cgBRHY1jPZN7fX.jpg', 'Open', '2023-12-17 07:15:34', '2023-12-17 07:15:34'),
(17, 'Harley Q. Quiin', 'Tester', '12/19/2023 - 01/22/2024', 'photos/Ih4SM5OIvKlpWCF9ypzoavTmVr6ferpd4rL5Bqkp.jpg', 'Open', '2023-12-19 07:29:07', '2023-12-19 07:29:07'),
(18, 'Harley Q. Quiin 2', 'Tester', '12/19/2023 - 01/22/2024', 'photos/SE4JMxtLaNBY4TvdPJkbrUBJbLwFijyBs1rK1swI.png', 'Open', '2023-12-19 07:41:15', '2023-12-19 07:41:15');

-- --------------------------------------------------------

--
-- Table structure for table `bod_committee`
--

CREATE TABLE `bod_committee` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `committee` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `period` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bod_committee`
--

INSERT INTO `bod_committee` (`id`, `name`, `committee`, `position`, `period`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Atty. Aurora Lyn T. Racmat', 'Mediation & Conciliation Committee', 'Chairperson', '0000-00-00', 'photos/user1-128x128.jpg', 'Closed', '2023-12-19 07:53:55', '2023-12-19 07:53:55'),
(2, 'Albert A. Manosa, JD', 'Mediation & Conciliation Committee', 'Vice Chairperson', '0000-00-00', 'photos/user1-128x128.jpg', 'Closed', '2023-12-19 07:56:19', '2023-12-19 07:56:19'),
(3, 'Eulalia A. Luza, JD', 'Mediation & Conciliation Committee', 'Secretary', '0000-00-00', 'photos/user1-128x128.jpg', 'Closed', '2023-12-19 07:56:19', '2023-12-19 07:56:19'),
(4, 'Engr. Roberto E. Salarza, M\'Eng', 'Ethics Committee', 'Chairperson', '0000-00-00', 'photos/user1-128x128.jpg', 'Closed', '2023-12-19 07:56:19', '2023-12-19 07:56:19'),
(5, 'Elizabeth L. Codilla, DPA', 'Ethics Committee', 'Vice Chairperson', '0000-00-00', 'photos/user1-128x128.jpg', 'Closed', '2023-12-19 07:56:19', '2023-12-19 07:56:19'),
(6, 'Cecilia B. Tangian, Ph.D', 'Ethics Committee', 'Secretary', '0000-00-00', 'photos/user1-128x128.jpg', 'Closed', '2023-12-19 07:56:19', '2023-12-19 07:56:19'),
(10, 'Alo, Pearl A.', 'Audit Committee', 'Tester', '12/18/2023 - 01/21/2024', 'photos/vVzRUoeAh13vQn4tZthIsrZKuLRZ53Jep4E1isMV.png', 'Closed', '2023-12-18 16:47:55', '2023-12-18 08:47:55'),
(14, 'Alo, Pearl A.', 'Credit Committee', 'Tester', '12/19/2023 - 01/21/2024', 'photos/6d1CofZ8JCuWYnUzWtUHYDaUWD8ITrn8FGtkORva.png', 'Open', '2023-12-18 08:46:50', '2023-12-18 08:46:50'),
(15, 'tester s. dexter', 'Audit Committee', 'Tester', '12/19/2023 - 01/21/2024', 'photos/3Berd1UWmAXV5bpgXrIA7xIKul0GpQycs6JHmDlV.jpg', 'Open', '2023-12-19 07:30:56', '2023-12-19 07:30:56');

-- --------------------------------------------------------

--
-- Table structure for table `department_heads`
--

CREATE TABLE `department_heads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rights` varchar(255) NOT NULL,
  `module` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`module`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_heads`
--

INSERT INTO `department_heads` (`id`, `username`, `name`, `rights`, `module`, `created_at`, `updated_at`) VALUES
(1, 'syndiel24', 'Alo, Pearl A.', 'Management Information System Department', '[\"User Feedback, Whistleblower and Complaint\",\"Personal Loan\",\"News and Events Archive\"]', '2023-12-18 11:09:22', '2023-12-18 11:37:26'),
(2, 'syndiel2412', 'Alo,Syndiel A.', 'Management Information System Department', '[\"Mobile Web System\",\"News and Events Archive\"]', '2023-12-18 11:48:40', '2023-12-18 11:48:40'),
(4, 'jammy123', 'Gem l. james', 'Management Information System Department', '[\"News and Events Archive\"]', '2023-12-19 07:31:46', '2023-12-19 07:44:28'),
(5, 'harry.potter', 'Harry E. Potter', 'Management Information System Department', '[\"Mobile Web System\"]', '2023-12-19 07:43:59', '2023-12-19 07:43:59');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `mac_address` varchar(255) DEFAULT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `name`, `ip_address`, `mac_address`, `login_time`) VALUES
(1000, 1, 'Ggg', '127.0.0.1', 'modifies', '2023-12-19 04:06:55'),
(1001, 4, 'Alo,Syndiel A.', '127.0.0.1', 'modifies', '2023-12-19 04:12:19'),
(1002, 1, 'Ggg', '127.0.0.1', 'modifies', '2023-12-19 05:17:33'),
(1003, 4, 'Alo,Syndiel A.', '127.0.0.1', 'modifies', '2023-12-19 05:18:07'),
(1004, 1, 'Ggg', '127.0.0.1', 'modifies', '2023-12-19 07:08:59'),
(1005, 4, 'Alo,Syndiel A.', '127.0.0.1', 'modifies', '2023-12-19 07:10:36'),
(1006, 1, 'Ggg', '127.0.0.1', 'modifies', '2023-12-19 07:37:15'),
(1007, 4, 'Alo,Syndiel A.', '127.0.0.1', 'modifies', '2023-12-19 07:38:42');

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
(1, '2014_10_12_000000_create_users_table', 1),
(5, '2023_12_06_030726_create_resolutions_table', 1),
(6, '2023_12_06_032245_add_new_column_to_resolutions_table', 1),
(7, '2023_12_10_221502_create_user_logins_table', 2),
(36, '2014_10_12_100000_create_password_reset_tokens_table', 3),
(37, '2019_08_19_000000_create_failed_jobs_table', 3),
(38, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(39, '2023_12_18_060156_create_logs_table', 3),
(40, '2023_12_18_190209_create_department_head_table', 3),
(41, '2023_12_18_201435_create_users_table', 4),
(43, '2023_12_19_115649_create_logs_table', 5);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resolutions`
--

CREATE TABLE `resolutions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `res_number` varchar(255) NOT NULL,
  `agenda` varchar(255) NOT NULL,
  `res_date` date NOT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `encoded_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resolutions`
--

INSERT INTO `resolutions` (`id`, `res_number`, `agenda`, `res_date`, `tags`, `status`, `encoded_by`, `created_at`, `updated_at`) VALUES
(2, '124357689', 'example234', '2023-12-19', 'test', 'Amended', 'Ggg 1', '2023-12-17 04:22:54', '2023-12-19 01:06:25'),
(5, '123456789034562', 'hello world', '2023-12-19', NULL, 'Confirmed', 'Ggg 1', '2023-12-19 00:29:11', '2023-12-19 01:07:12'),
(8, '1234567890345621334', 'good morning 2 you 2.0', '2023-12-20', NULL, 'Confirmed', 'Alo,Syndiel A.', '2023-12-19 07:11:38', '2023-12-19 07:40:11'),
(9, '6401380913460', 'hello good day', '2023-12-19', NULL, 'Confirmed', 'Alo,Syndiel A.', '2023-12-19 07:39:38', '2023-12-19 07:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `photo` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `admin`, `photo`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ggg', 'syndiel24', 'syndiel@g.msuiit.edu.ph', NULL, '$2y$12$RQn.IIPkyoO.VlMBBRyGKet8HdLnt9y1Nf3w1tc9/e011tDJpaGzK', 0, 'photos/8r4oGiwSsPGT5qkZVPttfuX8ZQMKOf8jrzzdtDnO.png', 'TESTER BOD', NULL, '2023-12-18 18:33:32', '2023-12-18 18:33:32'),
(4, 'Alo,Cindy A.', 'test.admin', 'Test@gmail.com', NULL, '$2y$12$AhAP5pf4qUaBodeK.JLYTOStkE16fGemgGJTf21oci3ViuUMsYvYa', 1, 'photos/3JZEyjYgq2sPZIorJUZOLmow9icsilCJ4gSwt8jl.jpg', NULL, NULL, '2023-12-19 04:11:46', '2023-12-19 07:45:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `board_of_directors`
--
ALTER TABLE `board_of_directors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bod_committee`
--
ALTER TABLE `bod_committee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_heads`
--
ALTER TABLE `department_heads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logs_user_id_foreign` (`user_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `resolutions`
--
ALTER TABLE `resolutions`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `board_of_directors`
--
ALTER TABLE `board_of_directors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `bod_committee`
--
ALTER TABLE `bod_committee`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `department_heads`
--
ALTER TABLE `department_heads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1008;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resolutions`
--
ALTER TABLE `resolutions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
