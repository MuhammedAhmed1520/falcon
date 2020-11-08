-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2020 at 03:30 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `falcon`
--

-- --------------------------------------------------------

--
-- Table structure for table `falcons`
--

CREATE TABLE `falcons` (
  `id` int(10) UNSIGNED NOT NULL,
  `P_REQUEST_TYP` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_O_CIVIL_ID` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_O_A_NAME` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_O_ADDRESS` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_O_MOBILE` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_O_PASSPORT_NO` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_CIVIL_EXPIRY_DT` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_O_MAIL` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_NW_CIVIL_ID` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_NW_A_NAME` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_NW_ADDRESS` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_NW_MOBILE` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_NW_PASSPORT_NO` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_NW_CIVIL_EXPIRY` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_NW_O_MAIL` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_CUR_PASS_FAL` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_FAL_SEX` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_FAL_SPECIES` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_FAL_TYPE` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_FAL_OTHER_TYPE` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_FAL_ORIGIN_COUNTRY` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_FAL_CITES_NO` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_FAL_PIT_NO` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_FAL_RING_NO` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_FAL_INJ_DATE` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_FAL_INJ_HOSPITAL` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_PAYMENT_ID` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_AMOUNT` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_TRANS_ID` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_TRACK_ID` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_OUT_REQUEST_NO` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_STATUS_MSG` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `falcon_file_details`
--

CREATE TABLE `falcon_file_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `file_type_id` int(11) DEFAULT NULL,
  `falcon_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `fileable_id` int(11) DEFAULT NULL,
  `fileable_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extension` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2015_02_10_082635_create_users_hospital_table', 1),
(3, '2015_02_10_082635_create_users_table', 1),
(4, '2020_11_05_143624_create_falcons_table', 2),
(5, '2020_11_05_172742_create_options_table', 3),
(6, '2020_11_08_115357_update_user_hospitals_table', 4),
(7, '2020_11_08_120444_create_falcon_file_details_table', 5),
(8, '2020_11_08_120625_create_files_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(10) UNSIGNED NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `label`, `type`, `code`, `created_at`, `updated_at`) VALUES
(1, 'استخراج أول مرة', 'P_REQUEST_TYP', '1', NULL, NULL),
(2, 'أستخراج بدل فاقد من الجواز', 'P_REQUEST_TYP', '2', NULL, NULL),
(3, 'تجديد وثيقة منتهية', 'P_REQUEST_TYP', '3', NULL, NULL),
(4, 'نقل ملكية', 'P_REQUEST_TYP', '4', NULL, NULL),
(5, 'اتلاف جواز عند موت الصقر', 'P_REQUEST_TYP', '5', NULL, NULL),
(6, 'الدفع', 'P_REQUEST_TYP', '6', NULL, NULL),
(7, 'تفريخ', 'P_FAL_TYPE', '1', NULL, NULL),
(8, 'بري', 'P_FAL_TYPE', '2', NULL, NULL),
(9, 'أخرى', 'P_FAL_TYPE', '3', NULL, NULL),
(10, 'الكويت', 'P_FAL_ORIGIN_COUNTRY', '1', NULL, NULL),
(11, 'السعودية', 'P_FAL_ORIGIN_COUNTRY', '2', NULL, NULL),
(12, 'البحرين', 'P_FAL_ORIGIN_COUNTRY', '3', NULL, NULL),
(13, 'قطر', 'P_FAL_ORIGIN_COUNTRY', '4', NULL, NULL),
(14, 'لبنان', 'P_FAL_ORIGIN_COUNTRY', '5', NULL, NULL),
(15, 'سوريا', 'P_FAL_ORIGIN_COUNTRY', '6', NULL, NULL),
(16, 'الولايات المتحدة الامريكية', 'P_FAL_ORIGIN_COUNTRY', '7', NULL, NULL),
(17, 'انجلترا', 'P_FAL_ORIGIN_COUNTRY', '8', NULL, NULL),
(18, 'الهند', 'P_FAL_ORIGIN_COUNTRY', '9', NULL, NULL),
(19, 'الفلبين', 'P_FAL_ORIGIN_COUNTRY', '10', NULL, NULL),
(20, 'سيريلانكا', 'P_FAL_ORIGIN_COUNTRY', '11', NULL, NULL),
(21, 'باكستان', 'P_FAL_ORIGIN_COUNTRY', '12', NULL, NULL),
(22, 'الاردن', 'P_FAL_ORIGIN_COUNTRY', '13', NULL, NULL),
(23, 'فلسطين', 'P_FAL_ORIGIN_COUNTRY', '14', NULL, NULL),
(24, 'مصر', 'P_FAL_ORIGIN_COUNTRY', '15', NULL, NULL),
(25, 'Appendix1', 'P_FAL_CITES_NO', '1', NULL, NULL),
(26, 'Appendix2', 'P_FAL_CITES_NO', '2', NULL, NULL),
(27, 'Appendix3', 'P_FAL_CITES_NO', '3', NULL, NULL),
(28, 'مستشفى الدهماء البيطرى', 'P_FAL_INJ_HOSPITAL', '1', NULL, NULL),
(29, 'مستشفى الكويت للصقور', 'P_FAL_INJ_HOSPITAL', '2', NULL, NULL),
(30, 'مستشفى البيطرىالدولى', 'P_FAL_INJ_HOSPITAL', '3', NULL, NULL),
(31, 'مستشفى شركة بيت الانماء الزراعية', 'P_FAL_INJ_HOSPITAL', '4', NULL, NULL),
(32, 'مستشفى ميناء عبد الله البيطرى', 'P_FAL_INJ_HOSPITAL', '5', NULL, NULL),
(33, 'صورة من البطاقة المدنية', 'documents_type', NULL, NULL, NULL),
(34, 'صورة جواز سفر المواطن', 'documents_type', NULL, NULL, NULL),
(35, 'شهادة صحية معتمدة من الهيئة العامة للزراعة والثروة السمكية للصقر', 'documents_type', NULL, NULL, NULL),
(36, 'شهادة سايتس', 'documents_type', NULL, NULL, NULL),
(37, 'اخرى \"فى حالة اى مرفق اخر\"', 'documents_type', NULL, NULL, NULL);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `P_O_A_NAME` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_O_MOBILE` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_O_CIVIL_ID` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_O_ADDRESS` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_O_PASSPORT_NO` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_CIVIL_EXPIRY_DT` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_hospital`
--

CREATE TABLE `users_hospital` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hospital_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `falcons`
--
ALTER TABLE `falcons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `falcon_file_details`
--
ALTER TABLE `falcon_file_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_hospital`
--
ALTER TABLE `users_hospital`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `falcons`
--
ALTER TABLE `falcons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `falcon_file_details`
--
ALTER TABLE `falcon_file_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_hospital`
--
ALTER TABLE `users_hospital`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
