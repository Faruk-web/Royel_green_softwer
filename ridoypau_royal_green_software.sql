-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 03, 2022 at 12:02 AM
-- Server version: 10.3.36-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ridoypau_royal_green_software`
--

-- --------------------------------------------------------

--
-- Table structure for table `banklists`
--

CREATE TABLE `banklists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opening_balance` int(11) DEFAULT NULL,
  `total_amount` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banklists`
--

INSERT INTO `banklists` (`id`, `name`, `branch`, `account_no`, `account_type`, `opening_balance`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, 'islamic', 'nazipur', '111222333111', 'savings', 500, 100, '2022-05-30 11:55:19', '2022-10-31 06:48:18'),
(2, 'padma', 'mirpur', '2022000002', 'saving', 50000, 0, '2022-06-26 08:19:09', '2022-06-26 11:06:04'),
(3, 'dbbl', 'mirpur', '20220000011', 'saving', 500, 1000, '2022-06-28 11:14:06', '2022-10-31 07:01:44'),
(4, 'dhaka', 'mirpur', '500', 'savings', 4553, 4053, '2022-09-09 23:47:00', '2022-10-29 06:18:38'),
(5, 'Jamuna Bank', 'Mirpur', '3223423423', 'savings', 0, 0, '2022-10-30 06:33:45', '2022-10-30 06:33:45');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` int(20) DEFAULT NULL,
  `deposit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `withdraw` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_id`, `deposit`, `withdraw`, `reason`, `date`, `created_at`, `updated_at`) VALUES
(18, 1, '34553', NULL, 'cdv', '0000-00-00', '2022-05-30 12:07:52', '2022-05-30 12:07:52'),
(26, 1, NULL, '2000', 'dsdw', '0000-00-00', '2022-06-01 06:00:19', '2022-06-01 06:00:19'),
(27, 1, '50000', NULL, 'p\'po\r\n\'p', '0000-00-00', '2022-06-04 12:59:13', '2022-06-04 12:59:13'),
(28, 1, NULL, '50000', 'gfjrytj', '0000-00-00', '2022-06-04 12:59:38', '2022-06-04 12:59:38'),
(29, 1, '20000', NULL, 'o', '0000-00-00', '2022-06-21 10:13:48', '2022-06-21 10:13:48'),
(30, 2, NULL, '50000', 'amni', '0000-00-00', '2022-06-26 11:06:04', '2022-06-26 11:06:04'),
(31, 1, '17197', NULL, 'sdsf', '0000-00-00', '2022-06-26 11:07:37', '2022-06-26 11:07:37'),
(32, 3, '1000', NULL, 'saving', '0000-00-00', '2022-06-28 11:14:45', '2022-06-28 11:14:45'),
(33, 3, NULL, '300', 'cv', '0000-00-00', '2022-06-28 11:15:06', '2022-06-28 11:15:06'),
(34, 3, '500', NULL, NULL, '0000-00-00', '2022-06-30 02:06:01', '2022-06-30 02:06:01'),
(35, 3, '100', NULL, NULL, '2022-06-30', '2022-06-30 11:04:24', '2022-06-30 11:04:24'),
(37, 4, NULL, '500', 'TGHN', '2022-09-10', '2022-09-10 00:09:31', '2022-09-10 00:09:31'),
(39, 3, NULL, '100', 'ghjghjghj', '2022-10-31', '2022-10-31 04:11:13', '2022-10-31 04:11:13'),
(40, 1, '1000', NULL, 'hjghjghj', '2022-10-31', '2022-10-31 04:14:33', '2022-10-31 04:14:33'),
(41, 1, '500', NULL, 'ghjghjghj', '2022-10-31', '2022-10-31 04:19:37', '2022-10-31 04:19:37'),
(42, 1, NULL, '1000', NULL, '2022-10-31', '2022-10-31 04:47:04', '2022-10-31 04:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `business_infos`
--

CREATE TABLE `business_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opaning_capital` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capital` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchased_stock` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `production_stock` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_infos`
--

INSERT INTO `business_infos` (`id`, `name`, `phone`, `email`, `website`, `logo`, `opaning_capital`, `capital`, `balance`, `purchased_stock`, `production_stock`, `created_at`, `updated_at`) VALUES
(1, 'Royal Green LTD.', '01627382866', 'royal@gmail.com', 'www.royalgreenltd.com', 'image/20221030123807.png', NULL, NULL, '590', NULL, NULL, NULL, '2022-11-01 00:06:59');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `phone`, `balance`, `created_at`, `updated_at`) VALUES
(1, 'Ridoy paul', NULL, '01627382866', '539900', NULL, '2022-10-31 05:31:05'),
(2, 'Sohel Sikdar', NULL, '01849706261', '0', NULL, NULL),
(3, 'Sohel Mia', NULL, '01849706269', '0', '2022-10-29 05:32:32', '2022-10-29 05:32:32');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expenses_category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `expenses_category_id`, `amount`, `note`, `date`, `created_at`, `updated_at`) VALUES
(1, '1', '100', 'gfhfghfghfg', '2022-10-29', '2022-10-29 04:41:22', '2022-10-29 04:41:22'),
(2, '1', '100', 'jklhjklhjl', '2022-10-30', '2022-10-30 06:34:21', '2022-10-30 06:34:21'),
(3, '1', '500', NULL, '2022-10-30', '2022-10-30 07:05:19', '2022-10-30 07:05:19'),
(4, '0', '100', NULL, '2022-10-31', '2022-10-31 03:50:37', '2022-10-31 03:50:37'),
(5, '1', '300', 'ghfghfghgf', '2022-10-31', '2022-10-31 03:58:17', '2022-10-31 03:58:17'),
(6, '2', '1000', NULL, '2022-11-01', '2022-11-01 00:06:59', '2022-11-01 00:06:59');

-- --------------------------------------------------------

--
-- Table structure for table `expenses_categories`
--

CREATE TABLE `expenses_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses_categories`
--

INSERT INTO `expenses_categories` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Lunch bill', NULL, NULL),
(2, 'Electricity Bill', NULL, NULL);

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
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `material_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `material_name`, `unit_type`, `price`, `note`, `created_at`, `updated_at`) VALUES
(1, 'bali', 'kg', '15421.00', NULL, '2022-10-30 06:49:10', '2022-10-30 06:49:10'),
(3, 'product name product name product name product name product name', 'kg', '424.00', NULL, '2022-10-27 01:24:33', '2022-10-27 01:24:33'),
(5, 'siment', 'kg', '54545.00', NULL, '2022-10-30 06:49:22', '2022-10-30 06:49:22'),
(6, 'ROD', 'kg', '10000.00', NULL, '2022-10-26 01:39:25', '2022-10-26 01:39:25'),
(7, 'Selection Bali', 'kg', '300.00', NULL, '2022-10-26 01:43:06', '2022-10-26 01:43:06'),
(8, 'Brick', 'piece', '10.00', NULL, '2022-10-30 06:44:50', '2022-10-30 06:44:50'),
(9, 'Cement', 'kg', '100.00', NULL, '2022-10-31 23:44:47', '2022-10-31 23:44:47'),
(10, 'Stone 12 mm', 'CFT', '12.00', NULL, '2022-11-01 00:15:59', '2022-11-01 00:15:59'),
(11, 'stone 14 mm', 'CFT', '200.00', NULL, '2022-11-01 00:16:46', '2022-11-01 00:16:46'),
(12, 'Bulk Cement', 'Kg', '50.00', NULL, '2022-11-01 00:18:08', '2022-11-01 00:18:08'),
(13, 'Syhlet sand', 'CFT', '50.00', NULL, '2022-11-01 00:18:48', '2022-11-01 00:18:48'),
(14, 'H.T.Wire', 'Kg', '90.00', NULL, '2022-11-01 00:19:24', '2022-11-01 00:19:24'),
(15, 'Spiral Wire 3.0 mm', 'Kg', '120.00', NULL, '2022-11-01 00:19:53', '2022-11-01 00:19:53'),
(16, 'Earthing nut', 'Kg', '120.00', NULL, '2022-11-01 00:20:19', '2022-11-01 00:20:19'),
(17, 'PVC pipe 12 mm', 'Feet', '10.00', NULL, '2022-11-01 00:21:27', '2022-11-01 00:21:27');

-- --------------------------------------------------------

--
-- Table structure for table `material_info_to_make_products`
--

CREATE TABLE `material_info_to_make_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `material_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `unit_amount` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `material_info_to_make_products`
--

INSERT INTO `material_info_to_make_products` (`id`, `material_id`, `product_id`, `unit_amount`, `price`, `total_price`, `date`, `created_at`, `updated_at`) VALUES
(13, 5, 4, '3', '0', '0', '2022-10-27', '2022-10-27 00:16:07', '2022-10-27 00:16:07'),
(14, 7, 4, '4', '0', '0', '2022-10-27', '2022-10-27 00:16:07', '2022-10-27 00:16:07'),
(15, 1, 4, '49', '0', '0', '2022-10-27', '2022-10-27 00:16:07', '2022-10-27 00:16:07'),
(16, 5, 3, '100', '0', '0', '2022-10-27', '2022-10-27 00:16:30', '2022-10-27 00:16:30'),
(17, 7, 3, '150', '0', '0', '2022-10-27', '2022-10-27 00:16:30', '2022-10-27 00:16:30'),
(21, 1, 5, '10', '0', '0', '2022-10-30', '2022-10-30 06:48:30', '2022-10-30 06:48:30'),
(22, 7, 5, '20', '0', '0', '2022-10-30', '2022-10-30 06:48:30', '2022-10-30 06:48:30'),
(23, 8, 5, '40', '0', '0', '2022-10-30', '2022-10-30 06:48:30', '2022-10-30 06:48:30');

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_05_21_100000_create_teams_table', 1),
(7, '2020_05_21_200000_create_team_user_table', 1),
(8, '2020_05_21_300000_create_team_invitations_table', 1),
(9, '2021_12_15_102336_create_sessions_table', 1),
(14, '2022_10_20_162913_create_purchase_invoices_table', 4),
(15, '2022_10_21_172117_create_purchase_materials_table', 5),
(16, '2022_10_21_173119_create_raw_material_stocks_table', 6),
(18, '2022_10_22_050155_create_products_table', 7),
(19, '2022_10_22_074144_create_material_info_to_make_products_table', 8),
(20, '2022_10_22_100822_create_product_invoices_table', 9),
(21, '2022_10_22_114623_create_production_materials_table', 10),
(22, '2022_10_23_065705_create_production_to_product_outputs_table', 11),
(23, '2022_10_23_065932_create_product_stocks_table', 12),
(24, '2022_10_20_111212_create_materials_table', 13),
(25, '2022_10_20_112408_create_suppliers_table', 14),
(26, '2022_10_29_045756_create_expenses_categories_table', 15),
(27, '2022_10_29_045843_create_expenses_table', 15),
(28, '2022_10_29_050036_create_staff_table', 15),
(31, '2022_10_29_074535_create_sell_invoices_table', 16),
(32, '2022_10_29_075137_create_sold_products_table', 16),
(33, '2022_10_29_085402_create_clients_table', 17),
(34, '2022_10_29_101303_create_staff_salleries_table', 18),
(35, '2022_10_29_101609_create_business_infos_table', 19),
(40, '2022_10_31_090353_create_transactions_table', 20),
(41, '2022_10_31_093516_create_supplier_payments_table', 20),
(43, '2022_10_31_121118_create_permission_tables', 21);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'App\\Models\\User', 2);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard.view', 'web', 'Dashboard', NULL, NULL),
(2, 'settings', 'web', 'Dashboard', NULL, NULL),
(3, 'role.view', 'web', 'Role', NULL, NULL),
(4, 'create.role', 'web', 'Role', NULL, NULL),
(5, 'update.role', 'web', 'Role', NULL, NULL),
(6, 'permissions', 'web', 'Role', NULL, NULL),
(7, 'crm.view', 'web', 'CRM', NULL, NULL),
(8, 'crm.create', 'web', 'CRM', NULL, NULL),
(9, 'crm.update', 'web', 'CRM', NULL, NULL),
(10, 'suppliers', 'web', 'Supplier', NULL, NULL),
(11, 'rawmaterial', 'web', 'Raw_Material', NULL, NULL),
(12, 'purchase', 'web', 'Purchase', NULL, NULL),
(13, 'stocks', 'web', 'Stocks', NULL, NULL),
(14, 'products', 'web', 'Products', NULL, NULL),
(15, 'production', 'web', 'Production', NULL, NULL),
(16, 'bill', 'web', 'Bill_Preparation', NULL, NULL),
(17, 'staff', 'web', 'Staff', NULL, NULL),
(18, 'expense', 'web', 'Expense', NULL, NULL),
(19, 'bank', 'web', 'Bank', NULL, NULL),
(20, 'account', 'web', 'Account_Statements', NULL, NULL);

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
-- Table structure for table `production_materials`
--

CREATE TABLE `production_materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `raw_material_id` int(11) NOT NULL,
  `invioce_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `production_materials`
--

INSERT INTO `production_materials` (`id`, `raw_material_id`, `invioce_number`, `price`, `total_price`, `quantity`, `date`, `created_at`, `updated_at`) VALUES
(3, 1, 'P94643', '42.00', '630.00', '15', '2022-10-19', '2022-10-22 22:58:11', '2022-10-22 22:58:11'),
(4, 1, 'P32603', '4.00', '8.00', '2', '2022-10-25', '2022-10-22 23:11:07', '2022-10-22 23:11:07'),
(5, 1, 'P15553', '42.00', '190890.00', '4545', '2022-10-18', '2022-10-22 23:32:12', '2022-10-22 23:32:12'),
(6, 1, 'P14123', '20.00', '40.00', '2', '2022-10-27', '2022-10-23 00:06:55', '2022-10-23 00:06:55'),
(7, 1, 'P51463', '47.00', '94.00', '2', '2022-10-26', '2022-10-23 00:10:32', '2022-10-23 00:10:32'),
(8, 1, 'P59623', '2.00', '2.00', '1', '2022-10-20', '2022-10-23 00:11:40', '2022-10-23 00:11:40'),
(9, 4, 'P15303', '445.00', '445.00', '1', '2022-10-26', '2022-10-24 03:47:45', '2022-10-24 03:47:45'),
(10, 4, 'P95443', '445.00', '445.00', '1', '2022-10-11', '2022-10-24 03:48:02', '2022-10-24 03:48:02'),
(11, 1, 'P97353', '15421.00', '185052.00', '12', '2022-10-25', '2022-10-24 09:53:43', '2022-10-24 09:53:43'),
(12, 1, 'P13953', '15421.00', '107947.00', '7', '2022-10-26', '2022-10-25 00:15:17', '2022-10-25 00:15:17'),
(13, 1, 'P1212', '15421.00', '15421.00', '1', '2022-10-26', '2022-10-25 01:01:39', '2022-10-25 01:01:39'),
(14, 1, 'P1212', '15421.00', '15421.00', '1', '2022-10-26', '2022-10-25 01:03:20', '2022-10-25 01:03:20'),
(15, 1, 'P77333', '15421.00', '15421.00', '1', '2022-10-27', '2022-10-25 01:06:25', '2022-10-25 01:06:25'),
(16, 1, 'P1212', '15421.00', '15421.00', '1', '2022-10-26', '2022-10-25 01:08:13', '2022-10-25 01:08:13'),
(17, 1, 'P99273', '15421.00', '77105.00', '5', '2022-10-27', '2022-10-27 03:23:34', '2022-10-27 03:23:34'),
(18, 3, 'P99273', '424.00', '2120.00', '5', '2022-10-27', '2022-10-27 03:23:34', '2022-10-27 03:23:34'),
(19, 1, 'P99893', '15421.00', '77105', '5', '2022-10-27', '2022-10-27 03:25:37', '2022-10-27 03:25:37'),
(20, 3, 'P99893', '424.00', '2120', '5', '2022-10-27', '2022-10-27 03:25:37', '2022-10-27 03:25:37'),
(21, 1, 'P22904', '15421.00', '462630', '30', '2022-10-27', '2022-10-27 03:32:17', '2022-10-27 03:32:17'),
(22, 1, 'P27185', '15421.00', '77105', '5', '2022-10-30', '2022-10-30 06:50:25', '2022-10-30 06:50:25'),
(23, 8, 'P27185', '10.00', '100', '10', '2022-10-30', '2022-10-30 06:50:25', '2022-10-30 06:50:25'),
(24, 7, 'P27185', '300.00', '45000', '150', '2022-10-30', '2022-10-30 06:50:25', '2022-10-30 06:50:25'),
(25, 1, 'P97696', '15421.00', '15421', '1', '2022-10-30', '2022-10-30 06:58:27', '2022-10-30 06:58:27'),
(26, 7, 'P97696', '300.00', '3000', '10', '2022-10-30', '2022-10-30 06:58:27', '2022-10-30 06:58:27'),
(27, 8, 'P97696', '10.00', '50', '5', '2022-10-30', '2022-10-30 06:58:27', '2022-10-30 06:58:27'),
(28, 7, 'P44857', '300.00', '30000', '100', '2022-11-01', '2022-10-31 23:36:48', '2022-10-31 23:36:48'),
(29, 1, 'P44857', '15421.00', '185052', '12', '2022-11-01', '2022-10-31 23:36:48', '2022-10-31 23:36:48'),
(30, 8, 'P44857', '10.00', '350', '35', '2022-11-01', '2022-10-31 23:36:48', '2022-10-31 23:36:48'),
(31, 9, 'P30468', '100.00', '10000', '100', '2022-11-01', '2022-10-31 23:46:21', '2022-10-31 23:46:21');

-- --------------------------------------------------------

--
-- Table structure for table `production_to_product_outputs`
--

CREATE TABLE `production_to_product_outputs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `invioce_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_cost` decimal(8,2) NOT NULL,
  `total_production` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `production_to_product_outputs`
--

INSERT INTO `production_to_product_outputs` (`id`, `product_id`, `invioce_number`, `product_cost`, `total_production`, `quantity`, `date`, `created_at`, `updated_at`) VALUES
(1, 2, 'P66803', '10.00', '120.00', 12, '2022-10-27', '2022-10-23 01:15:22', '2022-10-23 01:15:22'),
(2, 3, 'P29293', '2.00', '2.00', 1, '2022-10-25', '2022-10-24 03:53:21', '2022-10-24 03:53:21'),
(3, 2, 'P22904', '0.00', '0.00', 50, '2022-10-27', '2022-10-27 06:29:55', '2022-10-27 06:29:55'),
(4, 3, 'P22904', '0.00', '0.00', 100, '2022-10-27', '2022-10-27 06:29:55', '2022-10-27 06:29:55'),
(5, 3, 'P22904', '0.00', '0.00', 50, '2022-10-29', '2022-10-29 00:16:07', '2022-10-29 00:16:07'),
(6, 2, 'P22904', '0.00', '0.00', 50, '2022-10-29', '2022-10-29 00:30:49', '2022-10-29 00:30:49'),
(7, 4, 'P27185', '0.00', '0.00', 10, '2022-10-30', '2022-10-30 06:51:45', '2022-10-30 06:51:45'),
(8, 5, 'P27185', '0.00', '0.00', 20, '2022-10-30', '2022-10-30 06:51:45', '2022-10-30 06:51:45'),
(9, 3, 'P27185', '0.00', '0.00', 10, '2022-10-31', '2022-10-30 06:54:32', '2022-10-30 06:54:32'),
(10, 4, 'P27185', '0.00', '0.00', 15, '2022-10-30', '2022-10-30 06:56:40', '2022-10-30 06:56:40'),
(11, 4, 'P27185', '0.00', '0.00', 50, '2022-10-30', '2022-10-30 06:57:20', '2022-10-30 06:57:20'),
(12, 5, 'P27185', '0.00', '0.00', 25, '2022-10-30', '2022-10-30 06:57:20', '2022-10-30 06:57:20'),
(13, 5, 'P97696', '0.00', '0.00', 1, '2022-10-30', '2022-10-30 06:58:58', '2022-10-30 06:58:58'),
(14, 6, 'P44857', '0.00', '0.00', 20, '2022-11-01', '2022-10-31 23:37:47', '2022-10-31 23:37:47');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `production_cost` decimal(8,2) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `class`, `unit_type`, `size`, `price`, `production_cost`, `date`, `created_at`, `updated_at`) VALUES
(1, 'rygghgdhg', 'ygjhgjh', 'kg', 'gju', '989.00', '656.00', '2022-10-27', '2022-10-21 23:18:41', '2022-10-21 23:18:41'),
(2, 'building', 'gdgdfg', 'kg', '20feet', '4524.00', '4425.00', '2022-10-26', '2022-10-21 23:20:16', '2022-10-21 23:20:16'),
(3, 'table', 'gdgdfg', 'piece', '12mm', '442.00', '144.00', '2022-10-20', '2022-10-23 04:45:49', '2022-10-26 05:55:13'),
(4, 'Piller 6m', '6m', 'piece', '6m', '10000.00', '0.00', '2022-10-26', '2022-10-26 05:15:07', '2022-10-26 05:15:07'),
(5, 'Piller', '1st', 'piece', '50m', '50000.00', '0.00', '2022-10-30', '2022-10-30 06:47:14', '2022-10-30 06:47:14'),
(6, '7.6m (R-40)', 'N7', 'Piece', '25 Feet', '1000.00', '0.00', '2022-11-01', '2022-10-31 23:35:47', '2022-10-31 23:35:47');

-- --------------------------------------------------------

--
-- Table structure for table `product_invoices`
--

CREATE TABLE `product_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invioce_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_cost` decimal(8,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_invoices`
--

INSERT INTO `product_invoices` (`id`, `invioce_number`, `total_cost`, `status`, `note`, `date`, `created_at`, `updated_at`) VALUES
(1, 'P1211', '542.00', 'complete', 'ghgggdgf', '2022-10-22', '2022-10-22 04:17:12', '2022-10-22 04:17:12'),
(2, 'P1212', '4524.00', 'processing', 'gdfhfhdhh', '2022-10-22', '2022-10-22 04:17:57', '2022-10-22 04:17:57'),
(3, 'P99893', '79225.00', 'processing', NULL, '2022-10-27', '2022-10-27 03:25:37', '2022-10-27 03:25:37'),
(4, 'P22904', '462630.00', 'processing', 'fghfgh', '2022-10-27', '2022-10-27 03:32:17', '2022-10-29 00:55:39'),
(5, 'P27185', '122205.00', 'complete', 'fgdfgdfg', '2022-10-30', '2022-10-30 06:50:25', '2022-10-30 06:55:08'),
(6, 'P97696', '18471.00', 'processing', NULL, '2022-10-30', '2022-10-30 06:58:27', '2022-10-30 06:58:27'),
(7, 'P44857', '215402.00', 'complete', NULL, '2022-11-01', '2022-10-31 23:36:48', '2022-10-31 23:38:06'),
(8, 'P30468', '10000.00', 'processing', NULL, '2022-11-01', '2022-10-31 23:46:22', '2022-10-31 23:46:22');

-- --------------------------------------------------------

--
-- Table structure for table `product_stocks`
--

CREATE TABLE `product_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_stocks`
--

INSERT INTO `product_stocks` (`id`, `product_id`, `stock_quantity`, `date`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '2022-10-27', '2022-10-23 01:15:22', '2022-10-29 05:32:32'),
(2, 3, 53, '2022-10-25', '2022-10-24 03:53:21', '2022-10-30 06:54:32'),
(3, 4, 1, '2022-10-30', '2022-10-30 06:57:20', '2022-10-31 05:31:05'),
(4, 5, 3, '2022-10-30', '2022-10-30 06:57:20', '2022-10-31 05:31:05'),
(5, 6, 20, '2022-11-01', '2022-10-31 23:37:47', '2022-10-31 23:37:47');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_invoices`
--

CREATE TABLE `purchase_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `invioce_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_gross` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_invoices`
--

INSERT INTO `purchase_invoices` (`id`, `supplier_id`, `invioce_number`, `total_gross`, `date`, `note`, `created_at`, `updated_at`) VALUES
(6, 1, 'S46946', '142.00', '2022-10-24', 'gdfhgfhd', '2022-10-24 10:46:57', '2022-10-24 10:46:57'),
(7, 1, 'S52522', '15421.00', '2022-10-26', NULL, '2022-10-24 11:06:40', '2022-10-24 11:06:40'),
(8, 1, 'S37483', '15421.00', '2022-10-27', NULL, '2022-10-24 22:45:55', '2022-10-24 22:45:55'),
(9, 1, 'S63294', '500000', '2022-10-26', NULL, '2022-10-26 04:34:54', '2022-10-26 04:34:54'),
(10, 1, 'S62345', '800000', '2022-10-26', NULL, '2022-10-26 04:39:05', '2022-10-26 04:39:05'),
(11, 3, 'S98726', '15000', '2022-10-26', NULL, '2022-10-26 04:48:33', '2022-10-26 04:48:33'),
(12, 3, 'S72566', '500000', '2022-10-26', NULL, '2022-10-26 04:52:51', '2022-10-26 04:52:51'),
(13, 3, 'S89368', '30500', '2022-10-30', NULL, '2022-10-30 06:45:40', '2022-10-30 06:45:40'),
(14, 3, 'S18269', '154210', '2022-10-31', NULL, '2022-10-31 03:17:27', '2022-10-31 03:17:27'),
(15, 3, 'S646610', '100', '2022-10-31', NULL, '2022-10-31 03:17:55', '2022-10-31 03:17:55'),
(16, 3, 'S245211', '100', '2022-10-31', NULL, '2022-10-31 03:18:03', '2022-10-31 03:18:03'),
(17, 1, 'S133112', '1000', '2022-11-01', NULL, '2022-10-31 23:20:44', '2022-10-31 23:20:44'),
(18, 1, 'S389613', '30000', '2022-10-31', NULL, '2022-10-31 23:22:39', '2022-10-31 23:22:39'),
(19, 1, 'S475714', '2434000', '2022-11-01', NULL, '2022-10-31 23:45:29', '2022-10-31 23:45:29'),
(20, 4, 'S685615', '5100', '2022-10-26', NULL, '2022-11-01 00:24:19', '2022-11-01 00:24:19');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_materials`
--

CREATE TABLE `purchase_materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `invioce_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_materials`
--

INSERT INTO `purchase_materials` (`id`, `supplier_id`, `material_id`, `invioce_number`, `price`, `total_price`, `date`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'S1212', '4242.00', '444.00', '2022-10-20', '4545', '2022-10-21 12:01:46', '2022-10-21 12:01:46'),
(2, 1, 1, 'S12142441', '4242.00', '444.00', '2022-10-20', '4545', '2022-10-21 12:04:26', '2022-10-21 12:04:26'),
(3, 3, 1, 'S1212', '4242.00', '444.00', '2022-10-20', '4545', '2022-10-21 12:04:26', '2022-10-21 12:04:26'),
(4, 3, 1, 'S1212', '4242.00', '444.00', '2022-10-20', '4545', '2022-10-21 12:12:14', '2022-10-21 12:12:14'),
(5, 3, 1, 'S1212', '4242.00', '444.00', '2022-10-19', '4545', '2022-10-21 12:13:54', '2022-10-21 12:13:54'),
(6, 3, 1, 'S1212', '4242.00', '444.00', '2022-10-13', '4545', '2022-10-21 12:14:51', '2022-10-21 12:14:51'),
(7, 3, 1, 'S62345', '4242.00', '444.00', '2022-10-27', '4545', '2022-10-21 12:18:43', '2022-10-21 12:18:43'),
(8, 5, 1, 'S31863', '10.00', '120.00', '2022-10-12', '12', '2022-10-23 04:05:43', '2022-10-23 04:05:43'),
(9, 1, 1, 'S17743', '22.00', '902.00', '2022-10-20', '41', '2022-10-23 04:19:19', '2022-10-23 04:19:19'),
(10, 1, 1, 'S62345', '10.00', '120.00', '2022-10-21', '12', '2022-10-23 04:26:11', '2022-10-23 04:26:11'),
(11, 1, 1, 'S28166', '12.00', '492.00', '2022-10-26', '41', '2022-10-23 04:41:52', '2022-10-23 04:41:52'),
(12, 1, 1, 'S81196', '1.00', '41.00', '2022-10-24', '41', '2022-10-23 11:04:42', '2022-10-23 11:04:42'),
(13, 1, 4, 'S95116', '445.00', '445.00', '2022-10-26', '1', '2022-10-24 03:35:58', '2022-10-24 03:35:58'),
(14, 2, 1, 'S36016', '10.00', '100.00', '2022-10-24', '10', '2022-10-24 04:14:09', '2022-10-24 04:14:09'),
(15, 2, 1, 'S36016', '445.00', '22250.00', '2022-10-24', '50', '2022-10-24 04:14:09', '2022-10-24 04:14:09'),
(16, 1, 1, 'S55516', '445.00', '445.00', '2022-10-27', '1', '2022-10-24 04:45:12', '2022-10-24 04:45:12'),
(17, 1, 5, 'S51926', '445.00', '2225.00', '2022-10-27', '5', '2022-10-24 04:46:52', '2022-10-24 04:46:52'),
(18, 1, 5, 'S62345', '445.00', '445.00', '2022-10-27', '1', '2022-10-24 04:48:26', '2022-10-24 04:48:26'),
(19, 1, 1, 'S92116', '445.00', '890.00', '2022-10-26', '2', '2022-10-24 04:49:37', '2022-10-24 04:49:37'),
(20, 1, 1, 'S17176', '445.00', '445.00', '2022-10-27', '1', '2022-10-24 04:50:35', '2022-10-24 04:50:35'),
(21, 1, 1, 'S56146', '445.00', '890.00', '2022-10-27', '2', '2022-10-24 04:51:30', '2022-10-24 04:51:30'),
(22, 1, 1, 'S34606', '15421.00', '15421.00', '2022-10-26', '1', '2022-10-24 09:24:04', '2022-10-24 09:24:04'),
(23, 1, 1, 'S72566', '15421.00', '15421.00', '2022-10-25', '1', '2022-10-24 09:36:59', '2022-10-24 09:36:59'),
(24, 1, 1, 'S62345', '15421.00', '15421.00', '2022-10-25', '1', '2022-10-24 09:39:29', '2022-10-24 09:39:29'),
(25, 1, 1, 'S72566', '15421.00', '15421.00', '2022-10-26', '1', '2022-10-24 09:48:17', '2022-10-24 09:48:17'),
(26, 1, 1, 'S64676', '15421.00', '15421.00', '2022-10-26', '1', '2022-10-24 09:57:42', '2022-10-24 09:57:42'),
(27, 1, 3, 'S38766', '424.00', '424.00', '2022-10-25', '1', '2022-10-24 09:59:00', '2022-10-24 09:59:00'),
(28, 1, 3, 'S76536', '424.00', '424.00', '2022-10-26', '1', '2022-10-24 10:02:16', '2022-10-24 10:02:16'),
(29, 1, 1, 'S45546', '15421.00', '15421.00', '2022-10-26', '1', '2022-10-24 10:03:43', '2022-10-24 10:03:43'),
(30, 1, 1, 'S66006', '15421.00', '30842.00', '2022-10-25', '2', '2022-10-24 10:04:17', '2022-10-24 10:04:17'),
(31, 1, 1, 'S66576', '15421.00', '30842.00', '2022-10-26', '2', '2022-10-24 10:05:06', '2022-10-24 10:05:06'),
(32, 1, 1, 'S44946', '15421.00', '30842.00', '2022-10-26', '2', '2022-10-24 10:13:39', '2022-10-24 10:13:39'),
(33, 1, 1, 'S56796', '15421.00', '30842.00', '2022-10-25', '2', '2022-10-24 10:20:27', '2022-10-24 10:20:27'),
(34, 1, 1, 'S49976', '15421.00', '15421.00', '2022-10-26', '1', '2022-10-24 10:26:07', '2022-10-24 10:26:07'),
(35, 1, 3, 'S81256', '424.00', '424.00', '2022-10-26', '1', '2022-10-24 10:26:45', '2022-10-24 10:26:45'),
(36, 1, 3, 'S64776', '424.00', '8480.00', '2022-10-26', '20', '2022-10-24 10:27:22', '2022-10-24 10:27:22'),
(37, 1, 1, 'S47452', '15421.00', '15421.00', '2022-10-26', '1', '2022-10-24 11:05:32', '2022-10-24 11:05:32'),
(38, 1, 1, 'S11162', '15421.00', '15421.00', '2022-10-26', '1', '2022-10-24 11:06:09', '2022-10-24 11:06:09'),
(39, 1, 1, 'S52522', '15421.00', '15421.00', '2022-10-26', '1', '2022-10-24 11:06:40', '2022-10-24 11:06:40'),
(40, 1, 1, 'S37483', '15421.00', '15421.00', '2022-10-27', '1', '2022-10-24 22:45:55', '2022-10-24 22:45:55'),
(41, 1, 6, 'S88524', '10000.00', '1000000.00', '2022-10-26', '100', '2022-10-26 04:33:39', '2022-10-26 04:33:39'),
(42, 1, 6, 'S63294', '10000.00', '500000.00', '2022-10-26', '50', '2022-10-26 04:34:54', '2022-10-26 04:34:54'),
(43, 1, 6, 'S62345', '10000.00', '500000.00', '2022-10-26', '50', '2022-10-26 04:39:05', '2022-10-26 04:39:05'),
(44, 1, 7, 'S62345', '300.00', '300000.00', '2022-10-26', '1000', '2022-10-26 04:39:05', '2022-10-26 04:39:05'),
(45, 3, 7, 'S98726', '300.00', '15000.00', '2022-10-26', '50', '2022-10-26 04:48:33', '2022-10-26 04:48:33'),
(46, 3, 6, 'S94917', '10000.00', '500000.00', '2022-10-26', '50', '2022-10-26 04:52:51', '2022-10-26 04:52:51'),
(47, 3, 8, 'S89368', '10.00', '500.00', '2022-10-30', '50', '2022-10-30 06:45:40', '2022-10-30 06:45:40'),
(48, 3, 7, 'S89368', '300.00', '30000.00', '2022-10-30', '100', '2022-10-30 06:45:40', '2022-10-30 06:45:40'),
(49, 3, 1, 'S18269', '15421.00', '154210.00', '2022-10-31', '10', '2022-10-31 03:17:27', '2022-10-31 03:17:27'),
(50, 3, 1, 'S646610', '100', '100.00', '2022-10-31', '1', '2022-10-31 03:17:55', '2022-10-31 03:17:55'),
(51, 3, 1, 'S245211', '100', '100.00', '2022-10-31', '1', '2022-10-31 03:18:03', '2022-10-31 03:18:03'),
(52, 1, 8, 'S133112', '10.00', '1000.00', '2022-11-01', '100', '2022-10-31 23:20:44', '2022-10-31 23:20:44'),
(53, 1, 7, 'S389613', '300.00', '30000.00', '2022-10-31', '100', '2022-10-31 23:22:39', '2022-10-31 23:22:39'),
(54, 1, 9, 'S475714', '100.00', '2434000.00', '2022-11-01', '24340', '2022-10-31 23:45:29', '2022-10-31 23:45:29'),
(55, 4, 10, 'S685615', '12.00', '5100.00', '2022-10-26', '425', '2022-11-01 00:24:19', '2022-11-01 00:24:19');

-- --------------------------------------------------------

--
-- Table structure for table `raw_material_stocks`
--

CREATE TABLE `raw_material_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `material_id` int(11) DEFAULT NULL,
  `stock_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `raw_material_stocks`
--

INSERT INTO `raw_material_stocks` (`id`, `material_id`, `stock_quantity`, `date`, `created_at`, `updated_at`) VALUES
(32, 3, '11', '2022-10-26', '2022-10-24 10:26:45', '2022-10-27 03:25:37'),
(33, 6, '250', '2022-10-26', '2022-10-26 04:33:39', '2022-10-26 04:52:51'),
(34, 7, '990', '2022-10-26', '2022-10-26 04:39:05', '2022-10-31 23:36:48'),
(35, 8, '100', '2022-10-30', '2022-10-30 06:45:40', '2022-10-31 23:36:48'),
(37, 9, '24240', '2022-11-01', '2022-10-31 23:45:29', '2022-10-31 23:46:21'),
(38, 10, '425', '2022-10-26', '2022-11-01 00:24:19', '2022-11-01 00:24:19');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Manager', 'web', '2022-10-31 07:28:13', NULL),
(2, 'GM', 'web', '2022-10-31 07:31:33', '2022-10-31 07:31:52');

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
(1, 1),
(2, 1),
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
(20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sell_invoices`
--

CREATE TABLE `sell_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invioce_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voucher_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_due` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total_gross` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `paid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `pvs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gate_pass_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sell_invoices`
--

INSERT INTO `sell_invoices` (`id`, `invioce_number`, `voucher_number`, `client_id`, `previous_due`, `total_gross`, `paid`, `pvs`, `gate_pass_number`, `place_details`, `date`, `note`, `created_at`, `updated_at`) VALUES
(1, 'S77241', '6654656', '1', '0', '226200', '0', 'hggfhfg', '554554', 'dfgdg gd dfgdfg d', '2022-10-29', '55ertert', '2022-10-29 05:17:53', '2022-10-29 05:17:53'),
(2, 'S25512', '6654656', '1', '0', '226200', '0', 'hggfhfg', '554554', 'dfgdg gd dfgdfg d', '2022-10-29', '55ertert', '2022-10-29 05:19:54', '2022-10-29 05:19:54'),
(3, 'S25013', 'dfgdfg', '3', '0', '67340', '5000', 'hggfhfg', '5545545', 'dfgdfg dfg dfg dg', '2022-10-29', 'dfgdfgd fg', '2022-10-29 05:32:32', '2022-10-29 05:32:32'),
(4, 'S47304', 'dfgdfg', '3', '0', '22100', '5000', 'hggfhfg', '5545545', 'dfgdfg dfg dfg dg', '2022-10-29', 'dfgdfgd fg', '2022-10-29 05:33:55', '2022-10-29 05:33:55'),
(5, 'S15445', NULL, '2', '0', '4420', '1000', NULL, NULL, NULL, '2022-10-29', NULL, '2022-10-29 05:36:23', '2022-10-29 05:36:23'),
(6, 'S41136', 'V55565', '1', '0', '700000', '0', 'this is the pvs', '564645', 'Dhaka, mirpur -10 piece piller 6m', '2022-10-30', 'fgdfg', '2022-10-30 07:02:04', '2022-10-30 07:02:04'),
(7, 'S27187', 'ghfhfgh', '1', '0', '200000', '10000', 'hggfhfg', '554554', 'ghfghfgh', '2022-10-31', 'fghfgh', '2022-10-31 03:28:31', '2022-10-31 03:28:31'),
(8, 'S19538', '6654656', '2', '0', '200000', '3000', 'hggfhfg', '554554', 'ghfgh', '2022-10-31', NULL, '2022-10-31 04:38:39', '2022-10-31 04:38:39'),
(9, 'S59849', NULL, '1', '0', '540000', '100', NULL, NULL, NULL, '2022-10-31', NULL, '2022-10-31 05:31:05', '2022-10-31 05:31:05');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('FZyDaNwIDoc4LZ6MAI2qSRSx8y2pAqFlSsaeHY6t', 1, '103.49.203.92', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiNlhsMkNxWmtGZXpxWXpTSGZLa3E5Wmh5U2hiTVNzU1hFV01Db3AwcyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwczovL3JveWFsLnJpZG95cGF1bC54eXoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkWDU2TVRRaEdSY3NsbDg4SE1Yc3BsdVVGS3ZOajlJR2lYYWIuOUhUQnpKR2sxdS8uSzhPcXEiO30=', 1667289213),
('JLBkpgM5YvoE6o6wbzhAufiy16kKbYYdGgDSW7Oz', 1, '123.136.31.128', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZHFjTDJ4V0xSUXZudWQ5UHNCa1VuNG11MWRZVlhrQXMyNHNubUhDeSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjU3OiJodHRwOi8vcm95YWwucmlkb3lwYXVsLnh5ei9wcm9kdWN0aW9uLWludm9pY2UvUDMwNDY4L3ZpZXciO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkWDU2TVRRaEdSY3NsbDg4SE1Yc3BsdVVGS3ZOajlJR2lYYWIuOUhUQnpKR2sxdS8uSzhPcXEiO30=', 1667285335),
('sEODcml9gXlgzHx5T6O9gxSpKYC9AcfwJi71p38O', 1, '123.136.31.128', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:106.0) Gecko/20100101 Firefox/106.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoielFPM202SWxmeHZlclEwODZpNTM4ZFF1RzBncGttelhmSDB3d0VJOCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQwOiJodHRwOi8vcm95YWwucmlkb3lwYXVsLnh5ei9zdGFmZi9zYWxsZXJ5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJFg1Nk1UUWhHUmNzbGw4OEhNWHNwbHVVRkt2Tmo5SUdpWGFiLjlIVEJ6SkdrMXUvLks4T3FxIjt9', 1667282269);

-- --------------------------------------------------------

--
-- Table structure for table `sold_products`
--

CREATE TABLE `sold_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `invioce_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sold_products`
--

INSERT INTO `sold_products` (`id`, `product_id`, `invioce_number`, `quantity`, `price`, `total_price`, `date`, `created_at`, `updated_at`) VALUES
(1, 2, 'S77241', '50', '4524.00', '226200.00', '2022-10-29', '2022-10-29 05:17:53', '2022-10-29 05:17:53'),
(2, 2, 'S25512', '50', '4524.00', '226200.00', '2022-10-29', '2022-10-29 05:19:54', '2022-10-29 05:19:54'),
(3, 2, 'S25013', '10', '4524.00', '45240.00', '2022-10-29', '2022-10-29 05:32:32', '2022-10-29 05:32:32'),
(4, 3, 'S25013', '50', '442.00', '22100.00', '2022-10-29', '2022-10-29 05:32:32', '2022-10-29 05:32:32'),
(5, 3, 'S47304', '50', '442.00', '22100.00', '2022-10-29', '2022-10-29 05:33:55', '2022-10-29 05:33:55'),
(6, 3, 'S74605', '10', '442.00', '4420.00', '2022-10-29', '2022-10-29 05:35:27', '2022-10-29 05:35:27'),
(7, 3, 'S15445', '10', '442.00', '4420.00', '2022-10-29', '2022-10-29 05:36:23', '2022-10-29 05:36:23'),
(8, 4, 'S41136', '20', '10000.00', '200000.00', '2022-10-30', '2022-10-30 07:02:04', '2022-10-30 07:02:04'),
(9, 5, 'S41136', '10', '50000.00', '500000.00', '2022-10-30', '2022-10-30 07:02:04', '2022-10-30 07:02:04'),
(10, 4, 'S27187', '20', '10000.00', '200000.00', '2022-10-31', '2022-10-31 03:28:31', '2022-10-31 03:28:31'),
(11, 4, 'S19538', '5', '10000.00', '50000.00', '2022-10-31', '2022-10-31 04:38:39', '2022-10-31 04:38:39'),
(12, 5, 'S19538', '3', '50000.00', '150000.00', '2022-10-31', '2022-10-31 04:38:39', '2022-10-31 04:38:39'),
(13, 4, 'S59849', '4', '10000.00', '40000.00', '2022-10-31', '2022-10-31 05:31:05', '2022-10-31 05:31:05'),
(14, 5, 'S59849', '10', '50000.00', '500000.00', '2022-10-31', '2022-10-31 05:31:05', '2022-10-31 05:31:05');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sallery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `phone`, `address`, `sallery`, `note`, `date`, `created_at`, `updated_at`) VALUES
(1, 'abul kabul', '+880 12345678900', 'Shah Ali plaza\r\nsdfsdf', '20000', 'gdfgdfg', '2022-10-29', '2022-10-29 04:32:40', '2022-10-29 04:32:40'),
(2, 'Ridoy Paul', '34444444444444', 'Shah Ali plaza\r\n1205', '20000', NULL, '2022-10-29', '2022-10-29 04:33:30', '2022-10-29 04:34:16'),
(3, 'Ridoy Paul', '+8801627382866', 'Shah Ali plaza\r\n1205', '20000', NULL, '2022-10-29', '2022-10-29 04:33:53', '2022-10-29 04:33:53'),
(4, 'abul kabul', '+880 12345678900', 'Shah Ali plaza\r\nsdfsdf', '10000', NULL, '2022-10-30', '2022-10-30 07:02:49', '2022-10-30 07:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `staff_salleries`
--

CREATE TABLE `staff_salleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff_salleries`
--

INSERT INTO `staff_salleries` (`id`, `staff_id`, `month`, `paid_amount`, `note`, `date`, `created_at`, `updated_at`) VALUES
(1, '2', '2022-10', '100', 'gfhfghfgh', '2022-10-29', '2022-10-29 04:42:03', '2022-10-29 04:42:03'),
(2, '4', '2022-10', '100', 'fghfghfgh', '2022-10-30', '2022-10-30 07:04:27', '2022-10-30 07:04:27'),
(3, '4', '2022-10', '100', NULL, '2022-10-30', '2022-10-30 07:04:53', '2022-10-30 07:04:53'),
(4, '2', '2022-10', '4000', 'ghfgh', '2022-10-31', '2022-10-31 03:49:07', '2022-10-31 03:49:07'),
(5, '4', '2022-10', '9800', NULL, '2022-11-01', '2022-11-01 00:02:10', '2022-11-01 00:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `email`, `phone`, `date`, `note`, `balance`, `created_at`, `updated_at`) VALUES
(1, 'omar', 'admin@gmail.com', '0121545245', '2022-10-25', 'degfgvdfgdfg', '2465000', '2022-10-24 09:23:36', '2022-10-31 23:45:29'),
(3, 'omar faruk', 'admin@gmail.com', '0121545246', '2022-10-26', 'bfdgfghhs', '149300', '2022-10-24 23:24:30', '2022-10-31 07:01:44'),
(4, 'M/S Uniqe Enterprise', NULL, '01886660495', '2022-11-01', 'Note', '5100', '2022-11-01 00:10:37', '2022-11-01 00:24:19');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_payments`
--

CREATE TABLE `supplier_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `supplier_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier_payments`
--

INSERT INTO `supplier_payments` (`id`, `user_id`, `supplier_id`, `due`, `paid`, `payment_by`, `payment_bank`, `date`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, '3', '154410', '200', 'cheque', NULL, NULL, 'gfhfgh', '2022-10-30 18:00:00', NULL),
(2, 1, '3', '154410', '100', 'bank', '1', NULL, 'hjkhjk', '2022-10-30 18:00:00', NULL),
(3, 1, '3', '154410', '100', 'bank', '1', NULL, 'hjlhjk', '2022-10-30 18:00:00', NULL),
(4, 1, '3', '154310', '700', 'cash', '', NULL, 'hfghfgh', '2022-10-30 18:00:00', NULL),
(5, 1, '3', '153610', '1000', 'cash', '', NULL, 'ghfgh', '2022-10-30 18:00:00', NULL),
(6, 1, '3', '152610', '2610', 'cash', '', NULL, 'jhfghfgh', '2022-10-30 18:00:00', NULL),
(7, 1, '3', '150000', '700', 'bank', '3', NULL, 'fghfghfgh', '2022-10-30 18:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ridoy\'s Team', 1, '2021-12-15 05:41:16', '2021-12-15 05:41:16');

-- --------------------------------------------------------

--
-- Table structure for table `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit_or_debit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_or_cash` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `for_which` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `sender`, `receiver`, `credit_or_debit`, `bank_or_cash`, `bank_id`, `amount`, `for_which`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'company', '2', 'DR', 'cash', NULL, '4000', 'StaffSallery', 'Staff Sallery Paid for Month:  2022-10 || Staff Name: Ridoy Paul || Staff Phone: 34444444444444', '2022-10-30 18:00:00', '2022-10-31 03:49:07'),
(2, 1, 'company', '1', 'DR', 'cash', NULL, '300', 'E', 'Expenses Added. Note: ghfghfghgf', '2022-10-30 18:00:00', '2022-10-31 03:58:17'),
(3, 1, '3', 'company', 'DR', 'bank', NULL, '100', 'BW', 'Balance Withdraw from dbbl || Account Number: 20220000011', NULL, '2022-10-31 04:11:13'),
(4, 1, 'company', '1', 'CR', 'bank', NULL, '1000', 'BD', 'Balance Deposit To islamic || Account Number: 111222333111', NULL, '2022-10-31 04:14:33'),
(5, 1, 'company', '1', 'CR', 'bank', '1', '500', 'BD', 'Balance Deposit To islamic || Account Number: 111222333111', '2022-10-30 18:00:00', '2022-10-31 04:19:37'),
(6, 1, '2', 'company', 'CR', 'cash', NULL, '3000', 'S', 'Bill Transaction Added. Invoice Number: S19538', '2022-10-30 18:00:00', '2022-10-31 04:38:39'),
(7, 1, '1', 'company', 'DR', 'bank', '1', '1000', 'BW', 'Balance Withdraw from islamic || Account Number: 111222333111', '2022-10-31 04:47:04', '2022-10-31 04:47:04'),
(8, 1, '1', 'company', 'CR', 'cash', NULL, '100', 'S', 'Bill Transaction Added. Invoice Number: S59849', '2022-10-30 18:00:00', '2022-10-31 05:31:05'),
(9, 1, 'company', '3', 'DR', 'cash', NULL, '1000', 'SP', 'Paid to Supplier, Supplier Name || Supplier Phone: ', NULL, '2022-10-31 06:56:38'),
(10, 1, 'company', '3', 'DR', 'cash', NULL, '2610', 'SP', 'Paid to Supplier, Supplier Name || Supplier Phone: ', NULL, '2022-10-31 06:59:04'),
(11, 1, 'company', '3', 'DR', 'bank', '3', '700', 'SP', 'Paid to Supplier, Supplier Name || Supplier Phone: ', NULL, '2022-10-31 07:01:44'),
(12, 1, 'company', '4', 'DR', 'cash', NULL, '9800', 'StaffSallery', 'Staff Sallery Paid for Month:  2022-10 || Staff Name: abul kabul || Staff Phone: +880 12345678900', '2022-10-31 18:00:00', '2022-11-01 00:02:10'),
(13, 1, 'company', '2', 'DR', 'cash', NULL, '1000', 'E', 'Expenses Added. Note: ', '2022-10-31 18:00:00', '2022-11-01 00:06:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `type`, `is_active`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Ridoy Paul', 'admin', '1', 'royalgreen@gmail.com', NULL, '$2y$10$X56MTQhGRcsll88HMXspluUFKvNj9IGiXab.9HTBzJGk1u/.K8Oqq', NULL, NULL, 'kcxAzoLcSOrk1eJR8FDDGkOV1nrfryClPZ8IQ5cDN4WlVUsyeoPm6HUxIKeW', NULL, NULL, '2021-12-15 05:41:16', '2021-12-15 05:41:16'),
(2, 'sohel Mia', 'crm', '1', 'abulkabul@gmail.com', NULL, '$2y$10$kHKQlT6baaSQE4uXJui8quT2m1y5aUvaGF6Fv2gQCRdgqvT4NfkTy', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-31 08:14:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banklists`
--
ALTER TABLE `banklists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_infos`
--
ALTER TABLE `business_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_phone_unique` (`phone`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses_categories`
--
ALTER TABLE `expenses_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `materials_material_name_unique` (`material_name`);

--
-- Indexes for table `material_info_to_make_products`
--
ALTER TABLE `material_info_to_make_products`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `production_materials`
--
ALTER TABLE `production_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `production_to_product_outputs`
--
ALTER TABLE `production_to_product_outputs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_invoices`
--
ALTER TABLE `product_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_stocks`
--
ALTER TABLE `product_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_invoices`
--
ALTER TABLE `purchase_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_materials`
--
ALTER TABLE `purchase_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raw_material_stocks`
--
ALTER TABLE `raw_material_stocks`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `sell_invoices`
--
ALTER TABLE `sell_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sold_products`
--
ALTER TABLE `sold_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_salleries`
--
ALTER TABLE `staff_salleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_phone_unique` (`phone`);

--
-- Indexes for table `supplier_payments`
--
ALTER TABLE `supplier_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indexes for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT for table `banklists`
--
ALTER TABLE `banklists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `business_infos`
--
ALTER TABLE `business_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expenses_categories`
--
ALTER TABLE `expenses_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `material_info_to_make_products`
--
ALTER TABLE `material_info_to_make_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `production_materials`
--
ALTER TABLE `production_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `production_to_product_outputs`
--
ALTER TABLE `production_to_product_outputs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_invoices`
--
ALTER TABLE `product_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_stocks`
--
ALTER TABLE `product_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchase_invoices`
--
ALTER TABLE `purchase_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `purchase_materials`
--
ALTER TABLE `purchase_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `raw_material_stocks`
--
ALTER TABLE `raw_material_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sell_invoices`
--
ALTER TABLE `sell_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sold_products`
--
ALTER TABLE `sold_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff_salleries`
--
ALTER TABLE `staff_salleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supplier_payments`
--
ALTER TABLE `supplier_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
