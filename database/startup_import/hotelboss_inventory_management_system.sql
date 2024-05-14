-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 14, 2024 at 04:50 AM
-- Server version: 10.6.17-MariaDB
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelboss_inventory_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Shirts', 'shirts', NULL, NULL),
(2, 'Dresses', 'dresses', NULL, NULL),
(3, 'Pants', 'pants', NULL, NULL),
(4, 'Shorts', 'shorts', NULL, NULL),
(5, 'Jackets', 'jackets', NULL, NULL),
(6, 'Kitchen Supplies', 'kitchen-supplies', NULL, NULL),
(7, 'Home Essentials', 'home-essentials', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `slug`, `short_code`, `created_at`, `updated_at`) VALUES
(1, 'Red', 'red', 'red', NULL, NULL),
(2, 'Orange', 'orange', 'orange', NULL, NULL),
(3, 'Yellow', 'yellow', 'yellow', NULL, NULL),
(4, 'Green', 'green', 'green', NULL, NULL),
(5, 'Blue', 'blue', 'blue', NULL, NULL),
(6, 'Indigo', 'indigo', 'indigo', NULL, NULL),
(7, 'Violet', 'violet', 'violet', NULL, NULL),
(8, 'Pink', 'pink', 'pink', NULL, NULL),
(9, 'Black', 'black', 'black', NULL, NULL),
(10, 'White', 'white', 'white', NULL, NULL);

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_01_111143_create_suppliers_table', 1),
(6, '2023_05_02_114617_create_categories_table', 1),
(7, '2023_05_02_122454_create_units_table', 1),
(8, '2023_05_02_122455_create_colors_table', 1),
(9, '2023_05_02_140630_create_products_table', 1),
(10, '2023_05_04_084431_create_orders_table', 1),
(11, '2023_05_04_084646_create_order_details_table', 1),
(12, '2023_05_04_173440_create_shoppingcart_table', 1),
(13, '2023_05_06_142348_create_purchases_table', 1),
(14, '2023_05_06_143104_create_purchase_details_table', 1),
(15, '2023_11_03_140528_create_quotations_table', 1),
(16, '2023_11_03_140529_create_quotation_details_table', 1),
(17, '2023_11_17_183122_create_notifications_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `order_status` tinyint(4) NOT NULL COMMENT '0 - Pending / 1 - Complete',
  `total_products` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `vat` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `shipping_fee` int(11) NOT NULL DEFAULT 0,
  `invoice_no` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `reference_number` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `tracking_no` varchar(255) DEFAULT NULL,
  `pay` int(11) NOT NULL,
  `due` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_date`, `order_status`, `total_products`, `sub_total`, `vat`, `total`, `shipping_fee`, `invoice_no`, `payment_type`, `reference_number`, `account_number`, `account_name`, `tracking_no`, `pay`, `due`, `created_at`, `updated_at`) VALUES
(1, 100, '2024-03-31 00:00:00', 3, 1, 1400, 168, 1568, 0, 'RSL-000001', 'GCash', '123', 'abc', NULL, '', 1568, 0, '2024-03-31 23:53:55', '2024-04-01 00:17:03'),
(2, 100, '2024-04-01 00:00:00', 4, 1, 1400, 168, 1568, 0, 'RSL-000002', 'GCash', 'af', 'asfas', NULL, NULL, 1568, 0, '2024-04-01 00:30:24', '2024-05-01 17:32:12'),
(3, 1001, '2024-04-01 00:00:00', 4, 1, 1400, 168, 1568, 0, 'RSL-000003', 'GCash', 'asdf', 'asdf', NULL, NULL, 1568, 0, '2024-04-01 01:44:36', '2024-05-01 17:32:06'),
(4, 1001, '2024-04-01 00:00:00', 4, 1, 1400, 168, 1568, 0, 'RSL-000004', 'GCash', '123', 'lol', NULL, NULL, 1400, 168, '2024-04-01 03:01:34', '2024-05-01 17:31:57'),
(5, 1001, '2024-04-01 00:00:00', 3, 1, 1400, 168, 1568, 0, 'RSL-000005', 'GCash', '123', 'drop1', NULL, 'TRACKING1001', 1548, 20, '2024-04-01 06:37:13', '2024-04-01 23:04:45'),
(6, 100, '2024-04-01 00:00:00', 4, 2, 2800, 336, 3136, 0, 'RSL-000006', 'GCash', 'asdf', 'asdf', NULL, NULL, 3136, 0, '2024-04-01 23:47:59', '2024-05-01 17:31:51'),
(7, 1001, '2024-04-03 00:00:00', 2, 1, 600, 72, 672, 0, 'RSL-000007', 'GCash', '554265849', 'tin', NULL, '123', 672, 0, '2024-04-03 03:47:07', '2024-04-03 03:47:37'),
(8, 1001, '2024-04-03 00:00:00', 2, 1, 600, 72, 672, 0, 'RSL-000008', 'GCash', '123', 'tin', NULL, '123', 672, 0, '2024-04-03 04:35:57', '2024-04-03 04:37:10'),
(9, 1002, '2024-04-03 00:00:00', 3, 1, 600, 72, 672, 0, 'RSL-000009', 'GCash', '123456', 'wey haha', NULL, '12345', 672, 0, '2024-04-03 04:42:11', '2024-04-07 02:56:35'),
(10, 100, '2024-04-04 00:00:00', 4, 5, 5601, 672, 6273, 250, 'RSL-000010', 'GCash', 'hehe', 'hehehe', NULL, NULL, 6500, -226, '2024-04-04 00:19:27', '2024-05-01 17:31:43'),
(11, 100, '2024-04-04 00:00:00', 4, 3, 2001, 240, 2241, 250, 'RSL-000011', 'GCash', 'adf', 'asdf', NULL, NULL, 2491, 0, '2024-04-04 00:31:35', '2024-05-01 17:31:32'),
(12, 1001, '2024-04-07 00:00:00', 4, 1, 50, 6, 56, 250, 'RSL-000012', 'GCash', '123', 'ronnel', NULL, NULL, 306, 0, '2024-04-07 03:24:31', '2024-05-01 17:31:25'),
(13, 1001, '2024-04-08 00:00:00', 4, 2, 360, 43, 403, 250, 'RSL-000013', 'GCash', '123', 'drop1', NULL, NULL, 653, 0, '2024-04-08 00:43:51', '2024-05-01 17:31:18'),
(14, 1001, '2024-04-08 00:00:00', 3, 1, 120, 14, 134, 250, 'RSL-000014', 'GCash', '1234', '09274778241 - lemuel santiago', NULL, '00123', 384, 0, '2024-04-08 09:02:45', '2024-04-08 09:06:12'),
(15, 1005, '2024-04-08 00:00:00', 3, 4, 5600, 672, 6272, 250, 'RSL-000015', 'GCash', '5016580790120', '09953861698 - Lemuel Santiago', NULL, '1234', 6522, 0, '2024-04-08 09:24:39', '2024-04-08 09:40:25'),
(16, 1005, '2024-04-08 00:00:00', 4, 1, 60, 7, 67, 250, 'RSL-000016', 'GCash', '1234', '09953861698 - Lemuel Santiago', NULL, NULL, 3017, -2699, '2024-04-08 09:45:37', '2024-04-30 05:59:13'),
(17, 1001, '2024-04-22 00:00:00', 4, 1, 1400, 168, 1568, 250, 'RSL-000017', 'GCash', '123', 'asdf', NULL, NULL, 123, 1695, '2024-04-22 00:56:26', '2024-05-01 17:31:10'),
(18, 1001, '2024-04-22 00:00:00', 3, 2, 80, 9, 89, 250, 'RSL-000018', 'GCash', '333', '444', '555', NULL, 340, 0, '2024-04-22 01:01:44', '2024-04-22 01:47:06'),
(19, 1001, '2024-04-22 00:00:00', 4, 2, 120, 14, 134, 250, 'RSL-000019', 'GCash', 'adf', '123123', 'iuiii', NULL, 384, 0, '2024-04-22 01:50:44', '2024-04-22 01:53:30'),
(20, 100, '2024-04-26 00:00:00', 2, 2, 2800, 336, 3136, 250, 'RSL-000020', 'GCash', 'ueu', 'ueu', 'yer', '122', 3386, 0, '2024-04-26 03:50:18', '2024-05-01 17:29:35'),
(21, 100, '2024-04-26 00:00:00', 3, 2, 2800, 336, 3136, 250, 'RSL-000021', 'GCash', 'ueu', 'ueu', 'yer', '1234', 3386, 0, '2024-04-26 03:51:30', '2024-04-26 04:08:43'),
(22, 1001, '2024-04-26 00:00:00', 2, 1, 60, 7, 67, 250, 'RSL-000022', 'GCash', '123', '123', '123', '123', 123, 194, '2024-04-26 04:35:27', '2024-04-26 04:36:41'),
(23, 1001, '2024-04-26 00:00:00', 3, 3, 510, 61, 571, 250, 'RSL-000023', 'GCash', '223', '123', '123', '124', 345, 476, '2024-04-26 06:02:19', '2024-05-01 17:28:38'),
(24, 1002, '2024-04-30 00:00:00', 4, 14, 2120, 254, 2374, 250, 'RSL-000024', 'GCash', 'hjhjk', 'hjk', 'hjkjasdfasdf', NULL, 2374, 390, '2024-04-30 03:13:00', '2024-04-30 03:14:10'),
(25, 1002, '2024-04-30 00:00:00', 2, 11, 1870, 224, 2094, 250, 'RSL-000025', 'GCash', 'uiou', 'iouio', 'uiouio', '123', 2454, 0, '2024-04-30 03:16:33', '2024-05-01 17:29:12'),
(26, 1002, '2024-04-30 00:00:00', 4, 22, 1350, 162, 1512, 0, 'RSL-000026', 'GCash', 'asdf', 'asdfas', 'dfasdfsadf', NULL, 1982, 0, '2024-04-30 03:23:28', '2024-04-30 05:58:48'),
(27, 1002, '2024-04-30 00:00:00', 4, 11, 15400, 1848, 17248, 360, 'RSL-000027', 'GCash', 'iop', 'iop', 'iop', NULL, 17608, 0, '2024-04-30 03:25:23', '2024-04-30 05:58:31'),
(28, 1001, '2024-04-30 00:00:00', 4, 11, 15400, 1848, 17248, 360, 'RSL-000028', 'GCash', '1', '2', '3', NULL, 17608, 0, '2024-04-30 05:50:53', '2024-04-30 05:58:05'),
(29, 1001, '2024-05-01 00:00:00', 4, 10, 14000, 1680, 15680, 250, 'RSL-000029', 'GCash', 'dg', 'gdf', 'fd', NULL, 15930, 0, '2024-05-01 17:25:15', '2024-05-01 17:26:59'),
(30, 1001, '2024-05-01 00:00:00', 3, 10, 5500, 660, 6160, 250, 'RSL-000030', 'GCash', '223', 'Wee', '244', '345', 6410, 0, '2024-05-01 17:36:12', '2024-05-01 17:40:11'),
(31, 1001, '2024-05-06 00:00:00', 4, 2, 1100, 132, 1232, 250, 'RSL-000031', 'GCash', '123', '123', '123', NULL, 1482, 0, '2024-05-06 08:59:34', '2024-05-06 08:59:48');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(10) NOT NULL,
  `unitcost` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `size`, `unitcost`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 'XS', 1400, 1400, '2024-03-31 23:53:55', '2024-03-31 23:53:55'),
(3, 3, 2, 1, 'XS', 1400, 1400, '2024-04-01 01:44:36', '2024-04-01 01:44:36'),
(18, 13, 31, 2, 'XS', 180, 360, '2024-04-08 00:43:51', '2024-04-08 00:43:51'),
(19, 14, 27, 1, 'XS', 120, 120, '2024-04-08 09:02:45', '2024-04-08 09:02:45'),
(20, 15, 2, 4, 'XS', 1400, 5600, '2024-04-08 09:24:39', '2024-04-08 09:24:39'),
(21, 16, 22, 1, 'XS', 60, 60, '2024-04-08 09:45:37', '2024-04-08 09:45:37'),
(22, 17, 2, 1, 'XS', 1400, 1400, '2024-04-22 00:56:26', '2024-04-22 00:56:26'),
(23, 18, 29, 2, 'XS', 40, 80, '2024-04-22 01:01:44', '2024-04-22 01:01:44'),
(24, 19, 30, 2, 'XS', 60, 120, '2024-04-22 01:50:44', '2024-04-22 01:50:44'),
(25, 21, 2, 2, 'XS', 1400, 2800, '2024-04-26 03:51:30', '2024-04-26 03:51:30'),
(26, 22, 22, 1, 'XS', 60, 60, '2024-04-26 04:35:27', '2024-04-26 04:35:27'),
(27, 23, 25, 2, 'S', 170, 340, '2024-04-26 06:02:19', '2024-04-26 06:02:19'),
(28, 23, 25, 1, 'L', 170, 170, '2024-04-26 06:02:19', '2024-04-26 06:02:19'),
(29, 24, 29, 2, 'XS', 40, 80, '2024-04-30 03:13:00', '2024-04-30 03:13:00'),
(30, 24, 25, 12, 'XS', 170, 2040, '2024-04-30 03:13:00', '2024-04-30 03:13:00'),
(31, 25, 25, 11, 'XS', 170, 1870, '2024-04-30 03:16:33', '2024-04-30 03:16:33'),
(32, 26, 23, 1, 'XS', 90, 90, '2024-04-30 03:23:28', '2024-04-30 03:23:28'),
(33, 26, 30, 21, 'L', 60, 1260, '2024-04-30 03:23:28', '2024-04-30 03:23:28'),
(34, 27, 2, 11, 'XS', 1400, 15400, '2024-04-30 03:25:23', '2024-04-30 03:25:23'),
(35, 28, 2, 5, 'XS', 1400, 7000, '2024-04-30 05:50:53', '2024-04-30 05:50:53'),
(36, 28, 2, 6, 'M', 1400, 8400, '2024-04-30 05:50:53', '2024-04-30 05:50:53'),
(37, 29, 2, 10, 'S', 1400, 14000, '2024-05-01 17:25:15', '2024-05-01 17:25:15'),
(38, 30, 2, 10, 'L', 550, 5500, '2024-05-01 17:36:12', '2024-05-01 17:36:12'),
(39, 31, 2, 1, 'XS', 550, 550, '2024-05-06 08:59:34', '2024-05-06 08:59:34'),
(40, 31, 2, 1, 'S', 550, 550, '2024-05-06 08:59:34', '2024-05-06 08:59:34');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `quantity_s` int(11) NOT NULL,
  `quantity_m` int(11) NOT NULL,
  `quantity_l` int(11) NOT NULL,
  `quantity_xl` int(11) NOT NULL,
  `buying_price` int(11) NOT NULL COMMENT 'Buying Price',
  `selling_price` int(11) NOT NULL COMMENT 'Selling Price',
  `quantity_alert` int(11) NOT NULL,
  `tax` int(11) DEFAULT NULL,
  `tax_type` tinyint(4) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `name`, `slug`, `code`, `quantity`, `quantity_s`, `quantity_m`, `quantity_l`, `quantity_xl`, `buying_price`, `selling_price`, `quantity_alert`, `tax`, `tax_type`, `notes`, `product_image`, `category_id`, `unit_id`, `created_at`, `updated_at`) VALUES
(2, 100, 'Ragged Jeans', 'ragged-jeans', '002', 100, 50, 50, 89, 99, 70000, 55000, 10, 12, 0, NULL, 'ragged-jeans.jpg', 3, NULL, '2024-03-19 02:39:46', '2024-05-06 09:01:32'),
(22, 100, 'Glass Oil Dispenser Handle No Oil Leakage Seasoning Jar Condiments Leak Proof With Cap', 'glass-oil-dispenser-handle-no-oil-leakage-seasoning-jar-condiments-leak-proof-with-cap', 'PC16', 99, 0, 99, 99, 99, 7500, 6000, 5, 12, 0, 'Features:\r\n- Easy control: Lid will automatically open when tilted and close when it\'s upright.\r\n- Non-Drip: Unique style design spout provides precise pouring without dripping.\r\n- Leakproof bottle: Inside silicone for better sealing and perfectly avoid leaking between bottle and cap.\r\n- Safe and healthy: Food grade material insures no pollution nor harmless.\r\n- Multipurpose: Strong glass bottle great for olive oil, vegetable oil, vinegar, soy sauce, milk, juice, water and more (not for heavy liquids like honey, syrup).', '1795643445317642.jpg', 6, NULL, '2024-04-07 03:03:55', '2024-04-07 03:03:55'),
(23, 100, 'Pantry Airtight Powder Cereal Baby Milk Sealed Container Baking Jar Food Storage Stackable Organizer', 'pantry-airtight-powder-cereal-baby-milk-sealed-container-baking-jar-food-storage-stackable-organizer', 'PC17', 99, 0, 99, 99, 99, 11000, 9000, 5, 12, 0, 'Features:\r\n1. Tightly seal off the original taste of the food.\r\n2. Designed to minimize space and stackable that keeps your pantry and cabinet organized.\r\n3. Stackable and will easily fit into your cabinet which enables you to organize your kitchen and free up space in the pantry.\r\n4. Leak proof, so no moisture, air or dust gets in. keeping your dry food fresh and organized.\r\n5. Made from BPA-FREE safe to use on baby milk powder.\r\n6. Legit ant proof container.\r\n7. Convenient vacuum-released silicone to lock and open.', '1795643517482015.jpg', 6, NULL, '2024-04-07 03:05:04', '2024-04-07 03:05:04'),
(24, 100, 'Stackable Airtight Two Clip Lock Rectangular Dry Food Container Left Over Storage', 'stackable-airtight-two-clip-lock-rectangular-dry-food-container-left-over-storage', 'PC18', 99, 0, 99, 99, 99, 18000, 16000, 5, 12, 0, 'Specifications:\r\n\r\n- Food containers are clear so you can always see what’s inside but are light and easy to carry.\r\n- Stain and Odor resistant material keeps plastic food container looking like new.\r\n- Plastic containers have built in vents under the latches clip with the lid on.\r\n- BPA free\r\n- Freezer safe\r\n- Spill-proof\r\n- Crystal Clear Design\r\n- Stain Free', '1795643615163055.jpg', 6, NULL, '2024-04-07 03:06:37', '2024-04-07 03:06:37'),
(25, 100, 'Lazy Susan Turntable 360 Organizer, Multifunctional Single and Two Tier for Cabinet Pantry Fridge', 'lazy-susan-turntable-360-organizer-multifunctional-single-and-two-tier-for-cabinet-pantry-fridge', 'PC19', 99, 8, 99, 98, 99, 20000, 17000, 5, 12, 0, '【Multifunctional Lazy Susan】This turntable organizer designed for storing seasoning bottles, seasoning, spices, cans or cosmetics. It allows you to organize and store easily and conveniently, making your kitchen, pantry, fridge, or even bathroom orderly, tidy and clean.\r\n\r\n【360° Rotating Turntable Cabinet Organizer】The cabinet organizer can be rotated 360 degrees, allowing you to easily and conveniently access spices, cosmetics, cans or other items without moving the storage rack, which is very practical and user-friendly.', '1795643693743662.jpg', 6, NULL, '2024-04-07 03:07:52', '2024-05-01 17:28:38'),
(27, 200, 'Linen Spray - Fresh Linen', 'linen-spray-fresh-linen', 'PC21', 99, 0, 99, 99, 99, 15000, 12000, 5, 12, 0, 'Scent: Fresh Linen', '1795644139335171.jpg', 7, NULL, '2024-04-07 03:14:57', '2024-04-08 09:06:12'),
(28, 200, 'Linen Spray - Fresh Bamboo', 'linen-spray-fresh-bamboo', 'PC22', 99, 0, 99, 99, 99, 15000, 12000, 5, 12, 0, 'Scent: Fresh Bamboo', '1795644280079992.jpg', 7, NULL, '2024-04-07 03:17:11', '2024-04-07 03:17:11'),
(29, 200, 'Scented Alcohol', 'scented-alcohol', 'PC23', 99, 0, 99, 99, 99, 5000, 4000, 5, 12, 0, 'Good for giveaways.', '1795644347971476.jpg', 7, NULL, '2024-04-07 03:18:16', '2024-04-22 01:47:06'),
(30, 200, 'Hand Soap', 'hand-soap', 'PC24', 99, 0, 99, 99, 99, 7000, 6000, 5, 12, 0, 'Strawberry scented hand soap', '1795644476963140.jpg', 7, NULL, '2024-04-07 03:20:19', '2024-04-07 03:20:19'),
(31, 200, 'Pillow Case - Dark Blue', 'pillow-case-dark-blue', 'PC25', 99, 0, 99, 99, 99, 20000, 18000, 5, 12, 0, 'Premium quality pillow case', '1795644538140863.jpg', 7, NULL, '2024-04-07 03:21:17', '2024-04-07 03:21:17'),
(32, 200, 'Pillow Case - White Honeycomb', 'pillow-case-white-honeycomb', 'PC26', 99, 0, 99, 99, 99, 20000, 18000, 5, 12, 0, 'Premium quality pillow case', '1795644575916612.jpg', 7, NULL, '2024-04-07 03:21:53', '2024-04-07 03:21:53'),
(33, 200, 'Pillow Case - Pink', 'pillow-case-pink', 'PC27', 99, 0, 99, 99, 99, 20000, 18000, 5, 12, 0, 'Premium quality pillow case', '1795644605066516.jpg', 7, NULL, '2024-04-07 03:22:21', '2024-04-07 03:22:21');

-- --------------------------------------------------------

--
-- Table structure for table `product_comments`
--

CREATE TABLE `product_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_comments`
--

INSERT INTO `product_comments` (`id`, `message`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'meow 1', 24, '2024-04-22 02:47:09', '2024-04-22 02:47:09'),
(2, 'meow 3', 24, '2024-04-22 02:50:20', '2024-04-22 02:50:20'),
(3, 'Good', 2, '2024-04-26 04:33:21', '2024-04-26 04:33:21'),
(4, 'Good', 2, '2024-05-06 09:00:52', '2024-05-06 09:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) NOT NULL,
  `purchase_no` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Pending, 1=Approved',
  `total_amount` int(11) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE `purchase_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitcost` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE `quotations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `reference` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_name` varchar(255) NOT NULL,
  `tax_percentage` int(11) NOT NULL DEFAULT 0,
  `tax_amount` int(11) NOT NULL DEFAULT 0,
  `discount_percentage` int(11) NOT NULL DEFAULT 0,
  `discount_amount` int(11) NOT NULL DEFAULT 0,
  `shipping_amount` int(11) NOT NULL DEFAULT 0,
  `total_amount` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotation_details`
--

CREATE TABLE `quotation_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quotation_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `product_discount_amount` int(11) NOT NULL,
  `product_discount_type` varchar(255) NOT NULL DEFAULT 'fixed',
  `product_tax_amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) NOT NULL,
  `instance` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `shopname` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `account_holder` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `phone`, `address`, `shopname`, `type`, `photo`, `account_holder`, `account_number`, `bank_name`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Tony Gerhold', 'fbogisich@example.org', '223.520.1611', '8369 Scarlett Tunnel Suite 809\nEast Alek, CA 35575-0421', 'Terry, Braun and Gleason', 'distributor', NULL, 'Kory Thiel', '59412948', 'Mandiri', '2024-03-19 02:39:47', '2024-03-19 02:39:47'),
(2, 'Hector Gulgowski', 'bmarquardt@example.org', '+19095584454', '70417 Stracke Summit\nEdwardoside, IN 19615-5310', 'Hahn, Reynolds and Jacobs', 'wholesaler', NULL, 'Rahsaan Harvey', '22554023', 'BCA', '2024-03-19 02:39:47', '2024-03-19 02:39:47'),
(3, 'Malvina Kuphal', 'tremblay.brown@example.com', '+1-979-921-4769', '7338 Dovie Walks\nVladimirshire, WA 15064-5024', 'Heidenreich, Wilderman and Stoltenberg', 'wholesaler', NULL, 'Prof. Jessy Osinski', '60517491', 'BNI', '2024-03-19 02:39:47', '2024-03-19 02:39:47'),
(4, 'Logan Jakubowski', 'turcotte.alfreda@example.org', '+1 (570) 957-5350', '886 Ernest Land\nLake Cordia, NC 20885-4602', 'Murphy Inc', 'distributor', NULL, 'Prof. Alisa Prohaska', '42011694', 'BCA', '2024-03-19 02:39:47', '2024-03-19 02:39:47'),
(5, 'Johnnie Berge', 'carmella.hermiston@example.net', '+1.212.762.4670', '1163 Gislason Spring Suite 848\nNorth Addisonfurt, FL 86810', 'Mitchell, Crona and Simonis', 'distributor', NULL, 'Lilly McKenzie V', '41182378', 'Mandiri', '2024-03-19 02:39:47', '2024-03-19 02:39:47'),
(6, 'Carmelo Gleichner', 'zrempel@example.net', '+1-802-877-4319', '8937 Nikolaus Burg\nLindmouth, WI 41518-4310', 'Terry, Watsica and Runolfsdottir', 'wholesaler', NULL, 'Dr. Golden Bruen II', '89488083', 'Mandiri', '2024-03-19 02:39:47', '2024-03-19 02:39:47'),
(7, 'Prof. Lauren Steuber III', 'emmerich.carole@example.org', '(680) 744-0949', '59584 Boyle Pine\nPort Rosettaland, ID 57645-4999', 'Kertzmann, Jaskolski and Murray', 'wholesaler', NULL, 'Elta Bruen', '93525240', 'BCA', '2024-03-19 02:39:47', '2024-03-19 02:39:47'),
(8, 'Elian Feest', 'runolfsson.iliana@example.org', '1-947-929-3230', '68496 Gisselle Isle Apt. 012\nLake Brianafort, CT 97700', 'Toy-Little', 'distributor', NULL, 'Timothy Volkman', '39258377', 'Mandiri', '2024-03-19 02:39:47', '2024-03-19 02:39:47'),
(9, 'Adele Nader', 'lcole@example.org', '(940) 686-0196', '140 Bayer Spurs Apt. 601\nMohrburgh, IL 45858-8695', 'Yundt-Feil', 'distributor', NULL, 'Alexa Senger', '76433602', 'Mandiri', '2024-03-19 02:39:47', '2024-03-19 02:39:47'),
(10, 'Cristal Kuhlman', 'olson.mafalda@example.org', '+1.831.965.7058', '36411 Leanna Mountains\nPort Aisha, AR 68353-8154', 'Fahey, Crooks and Jast', 'wholesaler', NULL, 'Denis Franecki', '23068930', 'Mandiri', '2024-03-19 02:39:47', '2024-03-19 02:39:47'),
(11, 'Miss Hertha Thiel PhD', 'pamela28@example.org', '1-920-562-8638', '5172 Leone Way Apt. 424\nAlenefurt, KY 20783-4656', 'Larson Ltd', 'distributor', NULL, 'Danyka Hilpert I', '46362595', 'BRI', '2024-03-19 02:39:47', '2024-03-19 02:39:47'),
(12, 'Kenneth Schneider', 'jalyn12@example.net', '508-280-5369', '97565 Elsie Wells\nMoorestad, VA 63739', 'Smitham-Emard', 'wholesaler', NULL, 'Yasmeen Block', '83617428', 'BSI', '2024-03-19 02:39:47', '2024-03-19 02:39:47'),
(13, 'Alexandrine Stoltenberg', 'kuhlman.michelle@example.net', '+1.480.515.9027', '8997 Ray Causeway Suite 990\nHaleymouth, KS 22819-3136', 'Auer-Johnston', 'distributor', NULL, 'Savanna Bode', '58294200', 'BNI', '2024-03-19 02:39:47', '2024-03-19 02:39:47'),
(14, 'John Lemke', 'botsford.orval@example.com', '267.537.1370', '98884 Craig Alley Suite 153\nWest Deangelochester, FL 35733-3262', 'Swift-Dooley', 'distributor', NULL, 'Dr. Madyson White', '56696556', 'BNI', '2024-03-19 02:39:47', '2024-03-19 02:39:47'),
(15, 'Dr. Margot Turner', 'kertzmann.alfonso@example.org', '682-429-8068', '363 Justen Manors Suite 295\nChamplinstad, GA 86559-6998', 'Kozey-Langosh', 'distributor', NULL, 'Dr. Glenna Kuhlman', '92107845', 'Mandiri', '2024-03-19 02:39:47', '2024-03-19 02:39:47');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `slug`, `short_code`, `created_at`, `updated_at`) VALUES
(1, 'Extra Small', 'extra-small', 'XS', NULL, NULL),
(2, 'Small', 'small', 'S', NULL, NULL),
(3, 'Medium', 'medium', 'M', NULL, NULL),
(4, 'Large', 'large', 'L', NULL, NULL),
(5, 'Extra Large', 'extra-large', 'XL', NULL, NULL);

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
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `account_holder` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `address`, `photo`, `account_holder`, `account_number`, `bank_name`, `remember_token`, `created_at`, `updated_at`) VALUES
(100, 'valqexpress', 'supplier1@dropsynch.com', '2024-03-19 02:39:45', '$2y$10$DSfelcLOjD5Kh4jCkr1eS.nxVact7Hrf7MC5AOycBvCExJJ6O/Eee', '+63 970 000 0001', NULL, 'valqexpress.jpeg', NULL, NULL, NULL, NULL, '2024-03-19 02:39:45', NULL),
(200, 'HumbleHomeEssentials', 'supplier2@dropsynch.com', '2024-03-19 02:39:45', '$2y$10$hN/DHxwhmmh44k8JG/E6juzGjciA8mMnurkw9bFFFmMrFpkGm0giS', '+63 970 000 0002', NULL, 'HumbleHomeEssentials.jpeg', NULL, NULL, NULL, NULL, '2024-03-19 02:39:45', NULL),
(1001, 'Dropshipper 1', 'dropshipper1@dropsync.com', '2024-03-19 02:39:45', '$2y$10$oSPyL3FlsFVl4YZTRHDkMOzxCpYfdFmawkmCVNvYnRRDwtT9sZK8.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-19 02:39:45', NULL),
(1002, 'Dropshipper 2', 'dropshipper2@dropsync.com', '2024-03-19 02:39:45', '$2y$10$lwnaI5Z9BwnNiAstMGbaeOBg5dLXKhY0wmrLemQueWOggi6hhEtCq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-19 02:39:45', NULL),
(1003, 'lol', 'dropshipper3@dropsync.com', '2024-04-01 06:15:18', '$2y$10$nsvbHCY4AElZQmHdJ37WPOuRMJ31iH7ys0YXQOMvfVzAOlDo2oNC2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-01 06:15:18', '2024-04-01 06:15:18'),
(1004, 'Trends & Everything', 'supplier3@dropsynch.com', '2024-04-08 01:39:58', '$2y$10$cL4X8r/GMdY0A3FTCNC.KO1NYYbN5IJIqp0JwV3HS0QLSi1lCZbhW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-08 01:39:58', '2024-04-08 01:39:58'),
(1005, 'Lemuel Santiago', 'ccis.lemuel.santiago@gmail.com', '2024-04-08 09:11:44', '$2y$10$tpipkgxEq8WQv9o2wKsZkONgBwRf0XqXOYWJtr1tWPP6urfswCw/K', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-08 09:11:44', '2024-04-08 09:11:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `colors_name_unique` (`name`),
  ADD UNIQUE KEY `colors_slug_unique` (`slug`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_code_unique` (`code`),
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_comments`
--
ALTER TABLE `product_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_comments_product_id_foreign` (`product_id`) USING BTREE;

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_details_purchase_id_foreign` (`purchase_id`),
  ADD KEY `purchase_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `quotations`
--
ALTER TABLE `quotations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quotations_user_id_foreign` (`user_id`);

--
-- Indexes for table `quotation_details`
--
ALTER TABLE `quotation_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quotation_details_quotation_id_foreign` (`quotation_id`),
  ADD KEY `quotation_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_email_unique` (`email`),
  ADD UNIQUE KEY `suppliers_phone_unique` (`phone`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `units_name_unique` (`name`),
  ADD UNIQUE KEY `units_slug_unique` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `product_comments`
--
ALTER TABLE `product_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotations`
--
ALTER TABLE `quotations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotation_details`
--
ALTER TABLE `quotation_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `product_comments`
--
ALTER TABLE `product_comments`
  ADD CONSTRAINT `product_comments_to_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);

--
-- Constraints for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD CONSTRAINT `purchase_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_details_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quotations`
--
ALTER TABLE `quotations`
  ADD CONSTRAINT `quotations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `quotation_details`
--
ALTER TABLE `quotation_details`
  ADD CONSTRAINT `quotation_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `quotation_details_quotation_id_foreign` FOREIGN KEY (`quotation_id`) REFERENCES `quotations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
