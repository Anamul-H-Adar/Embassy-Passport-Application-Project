-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 02, 2023 at 09:06 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `embassy_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts_heads`
--

CREATE TABLE `accounts_heads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','cancel') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`) VALUES
(1, 'user', 'updated', 'App\\Models\\User', 1, 'App\\Models\\User', 1, '{\"old\": [], \"attributes\": []}', '2022-12-20 22:29:02', '2022-12-20 22:29:02'),
(2, 'user', 'updated', 'App\\Models\\User', 1, 'App\\Models\\User', 1, '{\"old\": {\"bio\": null, \"phone\": null, \"website\": null, \"company_name\": null}, \"attributes\": {\"bio\": \"Hi There Its me\", \"phone\": \"01822252198\", \"website\": \"thelarasoft.com\", \"company_name\": \"The LaraSoft\"}}', '2022-12-21 00:33:05', '2022-12-21 00:33:05'),
(3, 'user', 'updated', 'App\\Models\\User', 1, 'App\\Models\\User', 1, '{\"old\": [], \"attributes\": []}', '2022-12-21 00:40:51', '2022-12-21 00:40:51'),
(4, 'user', 'updated', 'App\\Models\\User', 1, 'App\\Models\\User', 1, '{\"old\": [], \"attributes\": []}', '2022-12-21 00:46:32', '2022-12-21 00:46:32'),
(5, 'user', 'updated', 'App\\Models\\User', 1, 'App\\Models\\User', 1, '{\"old\": [], \"attributes\": []}', '2022-12-21 00:49:28', '2022-12-21 00:49:28'),
(6, 'user', 'updated', 'App\\Models\\User', 1, 'App\\Models\\User', 1, '{\"old\": [], \"attributes\": []}', '2022-12-21 00:53:51', '2022-12-21 00:53:51'),
(7, 'user', 'updated', 'App\\Models\\User', 1, 'App\\Models\\User', 1, '{\"old\": [], \"attributes\": []}', '2022-12-21 00:57:34', '2022-12-21 00:57:34'),
(8, 'user', 'updated', 'App\\Models\\User', 1, 'App\\Models\\User', 1, '{\"old\": [], \"attributes\": []}', '2022-12-21 00:57:55', '2022-12-21 00:57:55'),
(9, 'user', 'updated', 'App\\Models\\User', 1, 'App\\Models\\User', 1, '{\"old\": {\"location\": null}, \"attributes\": {\"location\": \"Dhaka, Bangladesh\"}}', '2022-12-21 00:58:56', '2022-12-21 00:58:56'),
(10, 'user', 'updated', 'App\\Models\\User', 1, 'App\\Models\\User', 1, '{\"old\": {\"name\": \"Omar Farook\"}, \"attributes\": {\"name\": \"Omar Farook Hridoy\"}}', '2022-12-21 01:00:32', '2022-12-21 01:00:32'),
(11, 'user', 'updated', 'App\\Models\\User', 1, 'App\\Models\\User', 1, '{\"old\": [], \"attributes\": []}', '2022-12-21 01:00:47', '2022-12-21 01:00:47'),
(12, 'user', 'updated', 'App\\Models\\User', 1, 'App\\Models\\User', 1, '{\"old\": [], \"attributes\": []}', '2022-12-21 01:05:43', '2022-12-21 01:05:43'),
(13, 'user', 'updated', 'App\\Models\\User', 1, 'App\\Models\\User', 1, '{\"old\": [], \"attributes\": []}', '2023-01-30 10:20:35', '2023-01-30 10:20:35'),
(14, 'user', 'updated', 'App\\Models\\User', 1, 'App\\Models\\User', 1, '{\"old\": [], \"attributes\": []}', '2023-01-30 10:22:20', '2023-01-30 10:22:20'),
(15, 'user', 'updated', 'App\\Models\\User', 1, 'App\\Models\\User', 1, '{\"old\": [], \"attributes\": []}', '2023-01-30 17:55:12', '2023-01-30 17:55:12'),
(16, 'user', 'updated', 'App\\Models\\User', 1, 'App\\Models\\User', 1, '{\"old\": [], \"attributes\": []}', '2023-02-01 08:54:57', '2023-02-01 08:54:57'),
(17, 'user', 'updated', 'App\\Models\\User', 1, 'App\\Models\\User', 1, '{\"old\": [], \"attributes\": []}', '2023-02-01 08:57:41', '2023-02-01 08:57:41'),
(18, 'user', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 1, '{\"old\": [], \"attributes\": []}', '2023-02-01 10:22:00', '2023-02-01 10:22:00'),
(19, 'user', 'created', 'App\\Models\\User', 3, 'App\\Models\\User', 1, '{\"attributes\": {\"bio\": null, \"name\": \"Moksed ENT\", \"email\": \"supplier4@email.com\", \"phone\": \"0987654321\", \"website\": null, \"location\": \"Dhaka, Bangladesh\", \"company_name\": null}}', '2023-02-01 10:34:51', '2023-02-01 10:34:51'),
(20, 'user', 'updated', 'App\\Models\\User', 1, 'App\\Models\\User', 1, '{\"old\": [], \"attributes\": []}', '2023-02-02 03:07:36', '2023-02-02 03:07:36'),
(23, 'user', 'deleted', 'App\\Models\\User', 3, 'App\\Models\\User', 1, '{\"attributes\": {\"bio\": null, \"name\": \"Moksed ENT\", \"email\": \"supplier4@email.com\", \"phone\": \"0987654321\", \"website\": null, \"location\": \"Dhaka, Bangladesh\", \"company_name\": null}}', '2023-02-02 04:15:18', '2023-02-02 04:15:18'),
(24, 'user', 'deleted', 'App\\Models\\User', 2, 'App\\Models\\User', 1, '{\"attributes\": {\"bio\": null, \"name\": \"Hridoy\", \"email\": \"admin@email.com\", \"phone\": \"01822252197\", \"website\": \"thelarasoft.com\", \"location\": \"Dhaka, Bangladesh\", \"company_name\": \"The LaraSoft\"}}', '2023-02-02 04:15:53', '2023-02-02 04:15:53'),
(25, 'user', 'updated', 'App\\Models\\User', 1, 'App\\Models\\User', 1, '{\"old\": [], \"attributes\": []}', '2023-02-02 08:46:31', '2023-02-02 08:46:31'),
(26, 'user', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"old\": [], \"attributes\": []}', '2023-02-02 08:46:58', '2023-02-02 08:46:58'),
(27, 'user', 'updated', 'App\\Models\\User', 1, 'App\\Models\\User', 1, '{\"old\": [], \"attributes\": []}', '2023-02-02 08:48:14', '2023-02-02 08:48:14'),
(28, 'user', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"old\": [], \"attributes\": []}', '2023-02-02 08:49:14', '2023-02-02 08:49:14'),
(29, 'user', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"old\": [], \"attributes\": []}', '2023-02-02 09:00:43', '2023-02-02 09:00:43'),
(30, 'user', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"old\": [], \"attributes\": []}', '2023-02-02 09:01:01', '2023-02-02 09:01:01'),
(31, 'user', 'updated', 'App\\Models\\User', 1, 'App\\Models\\User', 1, '{\"old\": [], \"attributes\": []}', '2023-02-02 09:04:50', '2023-02-02 09:04:50');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rf_embassy` text COLLATE utf8mb4_unicode_ci,
  `submit_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `old_mrp_no` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_mrp_no` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enrollment_no` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','received','delivered','halt') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `rf_embassy`, `submit_date`, `serial_no`, `invoice_date`, `name`, `old_mrp_no`, `new_mrp_no`, `enrollment_no`, `mobile_no`, `branch_id`, `remarks`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bangladesh', '2023-02-02', '1', '2023-02-27', 'Omar Farook', '123456789', '123456765', '123142342', '01822252198', 1, 'Need asap', 'received', 1, 2, '2023-02-02 06:36:18', '2023-02-02 08:59:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `name`, `remark`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Branch-1', 'Branch-1 is for the Bangladesh.', '2023-02-02 03:28:23', '2023-02-02 03:59:08', NULL),
(2, 'Indian', NULL, '2023-02-02 03:28:55', '2023-02-02 04:05:05', NULL),
(3, 'Sri-Lankan', NULL, '2023-02-02 03:29:14', '2023-02-02 04:03:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `entries`
--

CREATE TABLE `entries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accounts_head_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `debit` double NOT NULL DEFAULT '0',
  `credit` double NOT NULL DEFAULT '0',
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan_type_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `installment` double NOT NULL DEFAULT '0',
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan_installments`
--

CREATE TABLE `loan_installments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `loan_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `installment_no` double NOT NULL DEFAULT '0',
  `is_paid` enum('no','yes') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan_types`
--

CREATE TABLE `loan_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive','cancel') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `big_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_num` tinyint(3) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_for` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Menu for admin',
  `open_new_tab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No Open New Tab',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `name_bn`, `url`, `icon_class`, `icon`, `big_icon`, `serial_num`, `status`, `slug`, `menu_for`, `open_new_tab`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', NULL, 'dashboard', 'uil-home-alt', NULL, NULL, 1, 'Active', '[\"Dashboard\"]', 'Menu for admin', 'No Open New Tab', 1, 1, NULL, '2023-02-01 06:27:14', '2023-02-01 09:06:05'),
(2, 'ACL', NULL, '#', 'uil uil-cog', NULL, NULL, 2, 'Active', '[\"submenu-list\",\"menu-list\",\"user-list\",\"role-list\",\"permission-list\"]', 'Menu for admin', 'No Open New Tab', 1, NULL, NULL, '2023-02-01 06:48:23', '2023-02-01 06:48:23'),
(3, 'Applications', NULL, '#', 'mdi mdi-application', NULL, NULL, 3, 'Active', '[\"application-employee-edit\",\"application-list\",\"branch-list\"]', 'Menu for admin', 'No Open New Tab', 1, 1, NULL, '2023-02-02 03:13:49', '2023-02-02 08:47:27');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_14_161514_create_accounts_heads_table', 2),
(6, '2022_12_14_161534_create_entries_table', 2),
(7, '2022_12_14_161611_create_loan_types_table', 2),
(8, '2022_12_14_161620_create_loans_table', 2),
(9, '2022_12_14_161635_create_loan_installments_table', 2),
(10, '2019_12_14_172225_create_activity_log_table', 2),
(11, '2020_11_24_022623_create_menus_table', 3),
(12, '2020_11_24_031938_create_sub_menus_table', 3),
(13, '2020_11_24_032345_create_sub_sub_menus_table', 3),
(14, '2023_01_30_095708_create_permission_tables', 4),
(15, '2022_12_25_132445_add_module_to_permissions', 5),
(16, '2022_06_09_105448_add_word_restrictions_to_roles', 6),
(17, '2022_12_18_153538_user_column_visibilities', 7),
(18, '2023_02_01_193037_applications', 8),
(19, '2023_02_01_204531_create_branch_table', 9),
(20, '2023_02_02_034707_add_soft_delete_to_table', 10),
(21, '2023_02_02_035124_add_branch_id_in_applications', 11);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 1),
(5, 'App\\Models\\User', 1),
(6, 'App\\Models\\User', 1),
(7, 'App\\Models\\User', 1),
(8, 'App\\Models\\User', 1),
(9, 'App\\Models\\User', 1),
(10, 'App\\Models\\User', 1),
(11, 'App\\Models\\User', 1),
(12, 'App\\Models\\User', 1),
(13, 'App\\Models\\User', 1),
(14, 'App\\Models\\User', 1),
(15, 'App\\Models\\User', 1),
(16, 'App\\Models\\User', 1),
(17, 'App\\Models\\User', 1),
(18, 'App\\Models\\User', 1),
(19, 'App\\Models\\User', 1),
(20, 'App\\Models\\User', 1),
(21, 'App\\Models\\User', 1),
(22, 'App\\Models\\User', 1),
(22, 'App\\Models\\User', 2),
(27, 'App\\Models\\User', 2),
(31, 'App\\Models\\User', 2),
(32, 'App\\Models\\User', 2),
(34, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

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
('gmfaruk2021@gmail.com', '$2y$10$CvFCw4fbfqlNb1jZZuYB.O0/b0b9kfa6nZ1wW/LbVv9FwdIEVUPUy', '2022-12-21 01:06:34');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `module`, `created_at`, `updated_at`) VALUES
(2, 'permission-create', 'web', 'ACL', '2023-01-30 15:37:24', '2023-01-30 15:37:24'),
(3, 'permission-edit', 'web', 'ACL', '2023-01-30 15:37:24', '2023-01-30 15:37:24'),
(4, 'permission-delete', 'web', 'ACL', '2023-01-30 15:37:24', '2023-01-30 15:37:24'),
(5, 'permission-list', 'web', 'ACL', '2023-01-30 16:04:40', '2023-01-30 16:04:40'),
(6, 'role-list', 'web', 'ACL', '2023-01-30 16:06:18', '2023-01-30 16:06:18'),
(7, 'role-create', 'web', 'ACL', '2023-01-30 16:06:18', '2023-01-30 16:06:18'),
(8, 'role-edit', 'web', 'ACL', '2023-01-30 16:06:18', '2023-01-30 16:06:18'),
(9, 'role-delete', 'web', 'ACL', '2023-01-30 16:06:18', '2023-01-30 16:06:18'),
(10, 'user-list', 'web', 'Users', '2023-01-30 16:06:41', '2023-01-30 16:06:41'),
(11, 'user-create', 'web', 'Users', '2023-01-30 16:06:41', '2023-01-30 16:06:41'),
(12, 'user-edit', 'web', 'Users', '2023-01-30 16:06:41', '2023-01-30 16:06:41'),
(13, 'user-delete', 'web', 'Users', '2023-01-30 16:06:41', '2023-01-30 16:06:41'),
(14, 'menu-list', 'web', 'Menu', '2023-01-30 16:07:56', '2023-01-30 16:07:56'),
(15, 'menu-edit', 'web', 'Menu', '2023-01-30 16:07:56', '2023-01-30 16:07:56'),
(16, 'menu-create', 'web', 'Menu', '2023-01-30 16:07:56', '2023-01-30 16:07:56'),
(17, 'menu-delete', 'web', 'Menu', '2023-01-30 16:07:56', '2023-01-30 16:07:56'),
(18, 'submenu-list', 'web', 'Menu', '2023-01-30 16:07:56', '2023-01-30 16:07:56'),
(19, 'submenu-create', 'web', 'Menu', '2023-01-30 16:07:56', '2023-01-30 16:07:56'),
(20, 'submenu-edit', 'web', 'Menu', '2023-01-30 16:07:56', '2023-01-30 16:07:56'),
(21, 'submenu-delete', 'web', 'Menu', '2023-01-30 16:07:56', '2023-01-30 16:07:56'),
(22, 'Dashboard', 'web', 'Dashboard', '2023-02-01 06:35:11', '2023-02-01 06:35:11'),
(23, 'branch-list', 'web', 'Branch', '2023-02-02 03:09:13', '2023-02-02 03:09:13'),
(24, 'branch-create', 'web', 'Branch', '2023-02-02 03:09:13', '2023-02-02 03:09:13'),
(25, 'branch-edit', 'web', 'Branch', '2023-02-02 03:09:13', '2023-02-02 03:09:13'),
(26, 'branch-delete', 'web', 'Branch', '2023-02-02 03:09:14', '2023-02-02 03:09:14'),
(27, 'application-list', 'web', 'Application', '2023-02-02 03:12:42', '2023-02-02 03:12:42'),
(28, 'application-create', 'web', 'Application', '2023-02-02 03:12:42', '2023-02-02 03:12:42'),
(29, 'application-edit', 'web', 'Application', '2023-02-02 03:12:42', '2023-02-02 03:12:42'),
(30, 'application-delete', 'web', 'Application', '2023-02-02 03:12:42', '2023-02-02 03:12:42'),
(31, 'application-received', 'web', 'Application', '2023-02-02 03:12:42', '2023-02-02 03:12:42'),
(32, 'application-delivered', 'web', 'Application', '2023-02-02 03:12:42', '2023-02-02 03:12:42'),
(33, 'application-halt', 'web', 'Application', '2023-02-02 03:12:42', '2023-02-02 03:12:42'),
(34, 'application-employee-edit', 'web', 'Application', '2023-02-02 08:37:06', '2023-02-02 08:37:06');

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `word_restrictions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `word_restrictions`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super-Admin', '[\"\"]', 'web', '2023-01-30 16:54:55', '2023-02-02 03:16:29'),
(2, 'Employee', '[\"\"]', 'web', '2023-02-01 10:21:17', '2023-02-01 10:21:17');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(22, 2),
(27, 2),
(31, 2),
(32, 2),
(34, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sub_menus`
--

CREATE TABLE `sub_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `big_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_num` tinyint(3) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_for` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Sub menu for admin',
  `open_new_tab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No Open New Tab',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_menus`
--

INSERT INTO `sub_menus` (`id`, `menu_id`, `name`, `name_bn`, `url`, `icon_class`, `icon`, `big_icon`, `serial_num`, `status`, `slug`, `menu_for`, `open_new_tab`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 'Permission', NULL, 'admin/acl/permission', NULL, NULL, NULL, 1, 'Active', '[\"permission-list\",\"permission-delete\",\"permission-edit\",\"permission-create\"]', 'Sub menu for admin', 'No Open New Tab', 1, 1, NULL, '2023-02-01 08:18:50', '2023-02-01 08:36:31'),
(2, 2, 'Roles', NULL, 'admin/acl/roles', NULL, NULL, NULL, 2, 'Active', '[\"role-delete\",\"role-edit\",\"role-create\",\"role-list\"]', 'Sub menu for admin', 'No Open New Tab', 1, NULL, NULL, '2023-02-01 08:32:37', '2023-02-01 08:32:37'),
(3, 2, 'Menu', NULL, 'admin/acl/menu', NULL, NULL, NULL, 3, 'Active', '[\"submenu-delete\",\"submenu-edit\",\"submenu-create\",\"submenu-list\",\"menu-delete\",\"menu-create\",\"menu-edit\",\"menu-list\"]', 'Sub menu for admin', 'No Open New Tab', 1, NULL, NULL, '2023-02-01 08:33:11', '2023-02-01 08:33:11'),
(4, 2, 'Users', NULL, 'admin/acl/users', NULL, NULL, NULL, 4, 'Active', '[\"user-delete\",\"user-edit\",\"user-create\",\"user-list\"]', 'Sub menu for admin', 'No Open New Tab', 1, NULL, NULL, '2023-02-01 09:13:29', '2023-02-01 09:13:29'),
(5, 3, 'Branch', NULL, 'admin/area/branch', NULL, NULL, NULL, 1, 'Active', '[\"branch-delete\",\"branch-edit\",\"branch-create\",\"branch-list\"]', 'Sub menu for admin', 'No Open New Tab', 1, NULL, NULL, '2023-02-02 03:14:57', '2023-02-02 03:14:57'),
(6, 3, 'Application', NULL, 'admin/applications', NULL, NULL, NULL, 2, 'Active', '[\"application-employee-edit\",\"application-halt\",\"application-delivered\",\"application-received\",\"application-delete\",\"application-edit\",\"application-create\",\"application-list\"]', 'Sub menu for admin', 'No Open New Tab', 1, 1, NULL, '2023-02-02 03:15:53', '2023-02-02 09:01:57');

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_menus`
--

CREATE TABLE `sub_sub_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `sub_menu_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `big_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_num` tinyint(3) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_for` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Sub Sub Menu for admin',
  `open_new_tab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No Open New Tab',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
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
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avater` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `phone`, `avater`, `bio`, `company_name`, `location`, `website`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Omar Farook Hridoy', 'gmfaruk2021@gmail.com', 'gmfaruk2021', '01822252198', 'uploads/users/2023/02/02/14714402-02-2023-07-36.png', 'Hi There Its me', 'The LaraSoft', 'Dhaka, Bangladesh', 'thelarasoft.com', NULL, '$2y$10$xRewFibhAr4/HHUy0jDF8eH16N5fATDxq/wmTqECdjHjg2AIxSvHm', 'QyJA5vvIi3GmBgPPLCo1wR7CPwyBNSe4n4kL0sPKJkgqUkALlvuZoXzoQcVe', '2022-12-08 03:37:14', '2023-02-02 03:07:36', NULL),
(2, 'Hridoy', 'admin@email.com', 'hridoy', '01822252197', 'uploads/users/483020223024914.png', NULL, 'The LaraSoft', 'Dhaka, Bangladesh', 'thelarasoft.com', NULL, '$2y$10$NO27w8SbhqQ2hfRy9TyZJex4G5oS3BcBZ0drBVH237K98bIfxGJle', 'FLFl8WuJelzcvxDZrrTdI0dcyqsu4A120kt8LknuJDSRYTCJO4FI0PmWdaYT', '2022-12-09 10:07:56', '2023-02-02 08:49:14', NULL),
(3, 'Moksed ENT', 'supplier4@email.com', NULL, '0987654321', 'uploads/users/2023/02/01/285630265_3130776430476122_5935731155814349910_n01-02-2023-34-50.jpg', NULL, NULL, 'Dhaka, Bangladesh', NULL, NULL, '$2y$10$/PiOHgtQg/bv.Fb6AtpxIuu4OkNKhkhU9/nWlDcUVcS4hoJrMg28q', NULL, '2023-02-01 10:34:50', '2023-02-02 04:15:18', '2023-02-02 04:15:18');

-- --------------------------------------------------------

--
-- Table structure for table `user_column_visibilities`
--

CREATE TABLE `user_column_visibilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci,
  `columns` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_column_visibilities`
--

INSERT INTO `user_column_visibilities` (`id`, `user_id`, `url`, `columns`, `created_at`, `updated_at`) VALUES
(1, 1, 'http://127.0.0.1:8000/admin/acl/users', '[\"true\",\"true\",\"true\",\"true\",\"true\",\"false\",\"false\",\"false\",\"true\",\"false\",\"true\"]', '2023-02-01 19:23:37', '2023-02-02 04:14:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts_heads`
--
ALTER TABLE `accounts_heads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accounts_heads_name_unique` (`name`),
  ADD KEY `accounts_heads_created_by_foreign` (`created_by`),
  ADD KEY `accounts_heads_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applications_created_by_foreign` (`created_by`),
  ADD KEY `applications_updated_by_foreign` (`updated_by`),
  ADD KEY `applications_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entries`
--
ALTER TABLE `entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entries_accounts_head_id_foreign` (`accounts_head_id`),
  ADD KEY `entries_created_by_foreign` (`created_by`),
  ADD KEY `entries_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loans_loan_type_id_foreign` (`loan_type_id`),
  ADD KEY `loans_created_by_foreign` (`created_by`),
  ADD KEY `loans_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `loan_installments`
--
ALTER TABLE `loan_installments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loan_installments_loan_id_foreign` (`loan_id`),
  ADD KEY `loan_installments_created_by_foreign` (`created_by`),
  ADD KEY `loan_installments_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `loan_types`
--
ALTER TABLE `loan_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `loan_types_code_unique` (`code`),
  ADD UNIQUE KEY `loan_types_name_unique` (`name`),
  ADD KEY `loan_types_created_by_foreign` (`created_by`),
  ADD KEY `loan_types_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_created_by_foreign` (`created_by`),
  ADD KEY `menus_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

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
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sub_menus`
--
ALTER TABLE `sub_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_menus_menu_id_foreign` (`menu_id`),
  ADD KEY `sub_menus_created_by_foreign` (`created_by`),
  ADD KEY `sub_menus_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `sub_sub_menus`
--
ALTER TABLE `sub_sub_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_sub_menus_menu_id_foreign` (`menu_id`),
  ADD KEY `sub_sub_menus_sub_menu_id_foreign` (`sub_menu_id`),
  ADD KEY `sub_sub_menus_created_by_foreign` (`created_by`),
  ADD KEY `sub_sub_menus_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `user_column_visibilities`
--
ALTER TABLE `user_column_visibilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_column_visibilities_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts_heads`
--
ALTER TABLE `accounts_heads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `entries`
--
ALTER TABLE `entries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_installments`
--
ALTER TABLE `loan_installments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_types`
--
ALTER TABLE `loan_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_menus`
--
ALTER TABLE `sub_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_sub_menus`
--
ALTER TABLE `sub_sub_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_column_visibilities`
--
ALTER TABLE `user_column_visibilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts_heads`
--
ALTER TABLE `accounts_heads`
  ADD CONSTRAINT `accounts_heads_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `accounts_heads_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applications_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applications_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `entries`
--
ALTER TABLE `entries`
  ADD CONSTRAINT `entries_accounts_head_id_foreign` FOREIGN KEY (`accounts_head_id`) REFERENCES `accounts_heads` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `entries_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `entries_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loans_loan_type_id_foreign` FOREIGN KEY (`loan_type_id`) REFERENCES `loan_types` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `loans_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loan_installments`
--
ALTER TABLE `loan_installments`
  ADD CONSTRAINT `loan_installments_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loan_installments_loan_id_foreign` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `loan_installments_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loan_types`
--
ALTER TABLE `loan_types`
  ADD CONSTRAINT `loan_types_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loan_types_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menus_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_menus`
--
ALTER TABLE `sub_menus`
  ADD CONSTRAINT `sub_menus_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sub_menus_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
  ADD CONSTRAINT `sub_menus_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_sub_menus`
--
ALTER TABLE `sub_sub_menus`
  ADD CONSTRAINT `sub_sub_menus_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sub_sub_menus_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
  ADD CONSTRAINT `sub_sub_menus_sub_menu_id_foreign` FOREIGN KEY (`sub_menu_id`) REFERENCES `sub_menus` (`id`),
  ADD CONSTRAINT `sub_sub_menus_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_column_visibilities`
--
ALTER TABLE `user_column_visibilities`
  ADD CONSTRAINT `user_column_visibilities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
