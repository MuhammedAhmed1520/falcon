-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2019 at 09:25 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epa`
--

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `for` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `for_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `name_ar`, `for`, `for_ar`, `created_at`, `updated_at`) VALUES
(75, 'tender-statistics', 'الاحصائيات', 'tenders', 'المناقصات', NULL, NULL),
(74, 'violation-statistics', 'الاحصائيات', 'violation', 'المخالفات', NULL, NULL),
(73, 'payments', 'سجل المدفوعات', 'settings', 'الاعدادات العامة', NULL, NULL),
(72, 'decide-certificate', 'قبول او رفض الطلب', 'certificates', 'شهادات الاعتماد', NULL, NULL),
(71, 'pay-certificate', 'بيانات الدفع', 'certificates', 'شهادات الاعتماد', NULL, NULL),
(70, 'print-certificate', 'طباعة الشهادة', 'certificates', 'شهادات الاعتماد', NULL, NULL),
(68, 'edit-certificate', 'تعديل الشهادة', 'certificates', 'شهادات الاعتماد', NULL, NULL),
(66, 'all-certificate', 'جميع الشهادات', 'certificates', 'شهادات الاعتماد', NULL, NULL),
(65, 'decide-files-tender-company', 'قبول او رفض الملفات', 'companies', 'الشركات', NULL, NULL),
(64, 'tender-reports', 'تقرير المناقصات', 'tenders', 'المناقصات', NULL, NULL),
(63, 'all-page', 'جميع الصفحات', 'pages', 'الصفحات', NULL, NULL),
(62, 'delete-page', 'حذف الصفحات', 'pages', 'الصفحات', NULL, NULL),
(61, 'edit-page', 'تعديل الصفحات', 'pages', 'الصفحات', NULL, NULL),
(60, 'create-page', 'اضافة الصفحات', 'pages', 'الصفحات', NULL, NULL),
(59, 'pay-tender-company', 'دفع الشركات', 'companies', 'الشركات', NULL, NULL),
(58, 'transactions-tender-company', 'سجل مدفوعات الشركات', 'companies', 'الشركات', NULL, NULL),
(57, 'files-tender-company', 'ملفات الشركات', 'companies', 'الشركات', NULL, NULL),
(56, 'active-tender-company', 'تنشيط وتعطيل الشركات', 'companies', 'الشركات', NULL, NULL),
(55, 'read-tender-company', 'تحديد كمقروء', 'companies', 'الشركات', NULL, NULL),
(54, 'create-tender-company', 'اضافة شركة', 'companies', 'الشركات', NULL, NULL),
(53, 'edit-tender-company', 'تعديل شركة', 'companies', 'الشركات', NULL, NULL),
(52, 'delete-tender-company', 'حذف شركة', 'companies', 'الشركات', NULL, NULL),
(51, 'all-tender-company', 'جميع الشركات', 'companies', 'الشركات', NULL, NULL),
(50, 'postpone-tender', 'مد فترة العطاء', 'tenders', 'المناقصات', NULL, NULL),
(49, 'delete-files-tender', 'حذف ملفات المناقصات', 'tenders', 'المناقصات', NULL, NULL),
(48, 'create-files-tender', 'اضافة ملفات المناقصات', 'tenders', 'المناقصات', NULL, NULL),
(47, 'all-files-tender', 'عرض جميع الملفات ', 'tenders', 'المناقصات', NULL, NULL),
(46, 'all-buyer-tender', 'عرض جميع المشترين ', 'tenders', 'المناقصات', NULL, NULL),
(45, 'create-buyer-tender', ' اضافة المشترين ', 'tenders', 'المناقصات', NULL, NULL),
(44, 'delete-buyer-tender', ' حذف المشترين  ', 'tenders', 'المناقصات', NULL, NULL),
(43, 'edit-buyer-tender', ' تعديل المشترين  ', 'tenders', 'المناقصات', NULL, NULL),
(42, 'edit-application-tender', ' تعديل العروض المقدمة', 'tenders', 'المناقصات', NULL, NULL),
(41, 'delete-application-tender', ' حذف العروض المقدمة', 'tenders', 'المناقصات', NULL, NULL),
(40, 'create-application-tender', ' اضافة العروض المقدمة', 'tenders', 'المناقصات', NULL, NULL),
(39, 'all-application-tender', 'عرض جميع العروض المقدمة', 'tenders', 'المناقصات', NULL, NULL),
(38, 'select-tender-winner', 'تحديد الفائز', 'tenders', 'المناقصات', NULL, NULL),
(37, 'all-tender', 'جميع المناقصات', 'tenders', 'المناقصات', NULL, NULL),
(36, 'delete-tender', 'حذف مناقصة', 'tenders', 'المناقصات', NULL, NULL),
(35, 'edit-tender', 'تعديل مناقصة', 'tenders', 'المناقصات', NULL, NULL),
(34, 'create-tender', 'اضافة مناقصة', 'tenders', 'المناقصات', NULL, NULL),
(33, 'admin-violation-cost', 'اضافة تكلفة المدير المسئول', 'violation', 'المخالفات', NULL, NULL),
(32, 'logger-settings', 'سجل النشاطات', 'settings', 'الاعدادات العامة', NULL, NULL),
(31, 'main-settings', 'الاعدادات العامة', 'settings', 'الاعدادات العامة', NULL, NULL),
(30, 'update-PPform-violation', 'تعديل نموذج الاحالة للنيابة', 'violation', 'المخالفات', NULL, NULL),
(28, 'all-civilian', 'الاشخاص المخالفين', 'civilian', 'المخالفين', NULL, NULL),
(27, 'ppform-civilian-violation', 'نموذج الاحالة للنيابة الخاص بالمواطنين', 'violation', 'المخالفات', NULL, NULL),
(26, 'report-violation', 'تقارير المخالفات', 'violation', 'المخالفات', NULL, NULL),
(25, 'PPform-violation', 'نموذج الاحالة للنيابة', 'violation', 'المخالفات', NULL, NULL),
(24, 'relate-subject-punishment', 'ربط مواد القانون بالعقوبات', 'subject', 'قوانين المخالفات', NULL, NULL),
(23, 'all-punishment', 'اظهار كل العقوبات', 'punishment', 'قوانين العقوبات', NULL, NULL),
(22, 'show-punishment', 'اظهار مادة العقوبة', 'punishment', 'قوانين العقوبات', NULL, NULL),
(21, 'delete-punishment', 'مسح مادة العقوبة', 'punishment', 'قوانين العقوبات', NULL, NULL),
(20, 'update-punishment', 'تعديل مادة العقوبة', 'punishment', 'قوانين العقوبات', NULL, NULL),
(19, 'create-punishment', 'اضافة مادة العقوبة', 'punishment', 'قوانين العقوبات', NULL, NULL),
(18, 'delete-punishment-paragraph', 'مسح فقرة  مواد العقوبات', 'punishment', 'قوانين العقوبات', NULL, NULL),
(17, 'all-subject', 'اظهار كل مواد القانون', 'subject', 'قوانين المخالفات', NULL, NULL),
(16, 'show-subject', 'اظهار مادة القانون', 'subject', 'قوانين المخالفات', NULL, NULL),
(15, 'delete-subject', 'مسح مادة القانون', 'subject', 'قوانين المخالفات', NULL, NULL),
(14, 'update-subject', 'تعديل مادة القانون', 'subject', 'قوانين المخالفات', NULL, NULL),
(12, 'create-subject', 'اضافة مادة القانون', 'subject', 'قوانين المخالفات', NULL, NULL),
(11, 'delete-subject-paragraph', 'مسح فقرات مواد القانون', 'subject', 'قوانين المخالفات', NULL, NULL),
(10, 'all-officer', 'اظهار كل الظباط', 'officer', 'الضباط', NULL, NULL),
(9, 'show-officer', 'اظهار الظابط', 'officer', 'الضباط', NULL, NULL),
(8, 'delete-officer', 'مسح الظابط', 'officer', 'الضباط', NULL, NULL),
(7, 'update-officer', 'تعديل الظابط', 'officer', 'الضباط', NULL, NULL),
(6, 'create-officer', 'اضافة الظابط ', 'officer', 'الضباط', NULL, NULL),
(5, 'all-violation', 'اظهار كل المخالفات', 'violation', 'المخالفات', NULL, NULL),
(4, 'show-violation', 'اظهار المخالفة', 'violation', 'المخالفات', NULL, NULL),
(3, 'delete-violation', 'مسح المخالفة', 'violation', 'المخالفات', NULL, NULL),
(2, 'update-violation', 'تعديل المخالفة', 'violation', 'المخالفات', NULL, NULL),
(1, 'create-violation', 'اضافة المخالفة', 'violation', 'المخالفات', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
