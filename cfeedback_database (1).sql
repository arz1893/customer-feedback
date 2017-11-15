-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 14, 2017 at 06:20 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customer-feedback`
--
CREATE DATABASE IF NOT EXISTS `customer-feedback` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `customer-feedback`;

-- --------------------------------------------------------

--
-- Table structure for table `complaint_products`
--

CREATE TABLE `complaint_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_rating` int(11) NOT NULL,
  `customer_complaint` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_need_call` tinyint(1) NOT NULL DEFAULT '0',
  `is_urgent` tinyint(1) NOT NULL DEFAULT '0',
  `tenant_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `master_product_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_master_product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(10) NOT NULL,
  `country` varchar(100) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `symbol` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `country`, `currency`, `code`, `symbol`) VALUES
(1, 'Albania', 'Leke', 'ALL', 'Lek'),
(2, 'America', 'Dollars', 'USD', '$'),
(3, 'Afghanistan', 'Afghanis', 'AFN', '?'),
(4, 'Argentina', 'Pesos', 'ARS', '$'),
(5, 'Aruba', 'Guilders', 'AWG', 'ƒ'),
(6, 'Australia', 'Dollars', 'AUD', '$'),
(7, 'Azerbaijan', 'New Manats', 'AZN', '???'),
(8, 'Bahamas', 'Dollars', 'BSD', '$'),
(9, 'Barbados', 'Dollars', 'BBD', '$'),
(10, 'Belarus', 'Rubles', 'BYR', 'p.'),
(11, 'Belgium', 'Euro', 'EUR', '€'),
(12, 'Beliz', 'Dollars', 'BZD', 'BZ$'),
(13, 'Bermuda', 'Dollars', 'BMD', '$'),
(14, 'Bolivia', 'Bolivianos', 'BOB', '$b'),
(15, 'Bosnia and Herzegovina', 'Convertible Marka', 'BAM', 'KM'),
(16, 'Botswana', 'Pula', 'BWP', 'P'),
(17, 'Bulgaria', 'Leva', 'BGN', '??'),
(18, 'Brazil', 'Reais', 'BRL', 'R$'),
(19, 'Britain (United Kingdom)', 'Pounds', 'GBP', '£'),
(20, 'Brunei Darussalam', 'Dollars', 'BND', '$'),
(21, 'Cambodia', 'Riels', 'KHR', '?'),
(22, 'Canada', 'Dollars', 'CAD', '$'),
(23, 'Cayman Islands', 'Dollars', 'KYD', '$'),
(24, 'Chile', 'Pesos', 'CLP', '$'),
(25, 'China', 'Yuan Renminbi', 'CNY', '¥'),
(26, 'Colombia', 'Pesos', 'COP', '$'),
(27, 'Costa Rica', 'Colón', 'CRC', '?'),
(28, 'Croatia', 'Kuna', 'HRK', 'kn'),
(29, 'Cuba', 'Pesos', 'CUP', '?'),
(30, 'Cyprus', 'Euro', 'EUR', '€'),
(31, 'Czech Republic', 'Koruny', 'CZK', 'K?'),
(32, 'Denmark', 'Kroner', 'DKK', 'kr'),
(33, 'Dominican Republic', 'Pesos', 'DOP ', 'RD$'),
(34, 'East Caribbean', 'Dollars', 'XCD', '$'),
(35, 'Egypt', 'Pounds', 'EGP', '£'),
(36, 'El Salvador', 'Colones', 'SVC', '$'),
(37, 'England (United Kingdom)', 'Pounds', 'GBP', '£'),
(38, 'Euro', 'Euro', 'EUR', '€'),
(39, 'Falkland Islands', 'Pounds', 'FKP', '£'),
(40, 'Fiji', 'Dollars', 'FJD', '$'),
(41, 'France', 'Euro', 'EUR', '€'),
(42, 'Ghana', 'Cedis', 'GHC', '¢'),
(43, 'Gibraltar', 'Pounds', 'GIP', '£'),
(44, 'Greece', 'Euro', 'EUR', '€'),
(45, 'Guatemala', 'Quetzales', 'GTQ', 'Q'),
(46, 'Guernsey', 'Pounds', 'GGP', '£'),
(47, 'Guyana', 'Dollars', 'GYD', '$'),
(48, 'Holland (Netherlands)', 'Euro', 'EUR', '€'),
(49, 'Honduras', 'Lempiras', 'HNL', 'L'),
(50, 'Hong Kong', 'Dollars', 'HKD', '$'),
(51, 'Hungary', 'Forint', 'HUF', 'Ft'),
(52, 'Iceland', 'Kronur', 'ISK', 'kr'),
(53, 'India', 'Rupees', 'INR', 'Rp'),
(54, 'Indonesia', 'Rupiahs', 'IDR', 'Rp'),
(55, 'Iran', 'Rials', 'IRR', '?'),
(56, 'Ireland', 'Euro', 'EUR', '€'),
(57, 'Isle of Man', 'Pounds', 'IMP', '£'),
(58, 'Israel', 'New Shekels', 'ILS', '?'),
(59, 'Italy', 'Euro', 'EUR', '€'),
(60, 'Jamaica', 'Dollars', 'JMD', 'J$'),
(61, 'Japan', 'Yen', 'JPY', '¥'),
(62, 'Jersey', 'Pounds', 'JEP', '£'),
(63, 'Kazakhstan', 'Tenge', 'KZT', '??'),
(64, 'Korea (North)', 'Won', 'KPW', '?'),
(65, 'Korea (South)', 'Won', 'KRW', '?'),
(66, 'Kyrgyzstan', 'Soms', 'KGS', '??'),
(67, 'Laos', 'Kips', 'LAK', '?'),
(68, 'Latvia', 'Lati', 'LVL', 'Ls'),
(69, 'Lebanon', 'Pounds', 'LBP', '£'),
(70, 'Liberia', 'Dollars', 'LRD', '$'),
(71, 'Liechtenstein', 'Switzerland Francs', 'CHF', 'CHF'),
(72, 'Lithuania', 'Litai', 'LTL', 'Lt'),
(73, 'Luxembourg', 'Euro', 'EUR', '€'),
(74, 'Macedonia', 'Denars', 'MKD', '???'),
(75, 'Malaysia', 'Ringgits', 'MYR', 'RM'),
(76, 'Malta', 'Euro', 'EUR', '€'),
(77, 'Mauritius', 'Rupees', 'MUR', '?'),
(78, 'Mexico', 'Pesos', 'MXN', '$'),
(79, 'Mongolia', 'Tugriks', 'MNT', '?'),
(80, 'Mozambique', 'Meticais', 'MZN', 'MT'),
(81, 'Namibia', 'Dollars', 'NAD', '$'),
(82, 'Nepal', 'Rupees', 'NPR', '?'),
(83, 'Netherlands Antilles', 'Guilders', 'ANG', 'ƒ'),
(84, 'Netherlands', 'Euro', 'EUR', '€'),
(85, 'New Zealand', 'Dollars', 'NZD', '$'),
(86, 'Nicaragua', 'Cordobas', 'NIO', 'C$'),
(87, 'Nigeria', 'Nairas', 'NGN', '?'),
(88, 'North Korea', 'Won', 'KPW', '?'),
(89, 'Norway', 'Krone', 'NOK', 'kr'),
(90, 'Oman', 'Rials', 'OMR', '?'),
(91, 'Pakistan', 'Rupees', 'PKR', '?'),
(92, 'Panama', 'Balboa', 'PAB', 'B/.'),
(93, 'Paraguay', 'Guarani', 'PYG', 'Gs'),
(94, 'Peru', 'Nuevos Soles', 'PEN', 'S/.'),
(95, 'Philippines', 'Pesos', 'PHP', 'Php'),
(96, 'Poland', 'Zlotych', 'PLN', 'z?'),
(97, 'Qatar', 'Rials', 'QAR', '?'),
(98, 'Romania', 'New Lei', 'RON', 'lei'),
(99, 'Russia', 'Rubles', 'RUB', '???'),
(100, 'Saint Helena', 'Pounds', 'SHP', '£'),
(101, 'Saudi Arabia', 'Riyals', 'SAR', '?'),
(102, 'Serbia', 'Dinars', 'RSD', '???.'),
(103, 'Seychelles', 'Rupees', 'SCR', '?'),
(104, 'Singapore', 'Dollars', 'SGD', '$'),
(105, 'Slovenia', 'Euro', 'EUR', '€'),
(106, 'Solomon Islands', 'Dollars', 'SBD', '$'),
(107, 'Somalia', 'Shillings', 'SOS', 'S'),
(108, 'South Africa', 'Rand', 'ZAR', 'R'),
(109, 'South Korea', 'Won', 'KRW', '?'),
(110, 'Spain', 'Euro', 'EUR', '€'),
(111, 'Sri Lanka', 'Rupees', 'LKR', '?'),
(112, 'Sweden', 'Kronor', 'SEK', 'kr'),
(113, 'Switzerland', 'Francs', 'CHF', 'CHF'),
(114, 'Suriname', 'Dollars', 'SRD', '$'),
(115, 'Syria', 'Pounds', 'SYP', '£'),
(116, 'Taiwan', 'New Dollars', 'TWD', 'NT$'),
(117, 'Thailand', 'Baht', 'THB', '?'),
(118, 'Trinidad and Tobago', 'Dollars', 'TTD', 'TT$'),
(119, 'Turkey', 'Lira', 'TRY', 'TL'),
(120, 'Turkey', 'Liras', 'TRL', '£'),
(121, 'Tuvalu', 'Dollars', 'TVD', '$'),
(122, 'Ukraine', 'Hryvnia', 'UAH', '?'),
(123, 'United Kingdom', 'Pounds', 'GBP', '£'),
(124, 'United States of America', 'Dollars', 'USD', '$'),
(125, 'Uruguay', 'Pesos', 'UYU', '$U'),
(126, 'Uzbekistan', 'Sums', 'UZS', '??'),
(127, 'Vatican City', 'Euro', 'EUR', '€'),
(128, 'Venezuela', 'Bolivares Fuertes', 'VEF', 'Bs'),
(129, 'Vietnam', 'Dong', 'VND', '?'),
(130, 'Yemen', 'Rials', 'YER', '?'),
(131, 'Zimbabwe', 'Zimbabwe Dollars', 'ZWD', 'Z$');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `city` text COLLATE utf8mb4_unicode_ci,
  `nation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(1) NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date DEFAULT NULL,
  `memo` text COLLATE utf8mb4_unicode_ci,
  `tenant_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `city`, `nation`, `email`, `gender`, `phone`, `birthdate`, `memo`, `tenant_id`, `created_at`, `updated_at`) VALUES
(1, 'Ardi', 'Hello World!', NULL, 'Indonesia', NULL, 1, '2168431354', '1993-03-18', 'test customer', '32d22cae-b812-3468-abfb-414ccb247e2d', '2017-10-18 03:08:13', '2017-10-18 03:08:13');

-- --------------------------------------------------------

--
-- Table structure for table `faq_products`
--

CREATE TABLE `faq_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `master_product_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `child` int(10) UNSIGNED DEFAULT NULL,
  `parent` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq_products`
--

INSERT INTO `faq_products` (`id`, `question`, `answer`, `master_product_id`, `child`, `parent`, `created_at`, `updated_at`) VALUES
(1, 'How it\'s cooked ?', 'Fried', 'c0b6ce2b-b7a1-49f6-9d46-49f9fd839d78', NULL, NULL, '2017-10-05 02:56:25', '2017-10-06 00:22:34'),
(2, 'is it deep fried with used oil ?', 'no', 'c0b6ce2b-b7a1-49f6-9d46-49f9fd839d78', NULL, NULL, '2017-10-05 20:49:41', '2017-10-05 20:49:41'),
(6, 'what butter do you use ?', 'it\'s a rum butter', '885ee5e8-1927-4a19-8c3d-67abf2462034', NULL, NULL, '2017-10-06 00:36:37', '2017-10-06 00:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `faq_services`
--

CREATE TABLE `faq_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `master_service_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(10) UNSIGNED DEFAULT NULL,
  `child` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq_services`
--

INSERT INTO `faq_services` (`id`, `question`, `answer`, `master_service_id`, `parent`, `child`, `created_at`, `updated_at`) VALUES
(1, 'How fast it is ?', 'it\'s 20mbps dude', '231e6293-8488-440d-a9a6-13a374a1699f', NULL, NULL, '2017-10-11 02:26:10', '2017-10-11 02:53:47');

-- --------------------------------------------------------

--
-- Table structure for table `master_product_images`
--

CREATE TABLE `master_product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` double DEFAULT NULL,
  `path` text COLLATE utf8mb4_unicode_ci,
  `master_product_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_products`
--

CREATE TABLE `master_products` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `specification` text COLLATE utf8mb4_unicode_ci,
  `cover_image` text COLLATE utf8mb4_unicode_ci,
  `tenant_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_products`
--

INSERT INTO `master_products` (`id`, `name`, `description`, `specification`, `cover_image`, `tenant_id`, `created_at`, `updated_at`) VALUES
('038a6e90-646f-4c77-904d-5350ab0f7b55', 'Rice Box', 'Praesent iaculis, dui non rhoncus efficitur, metus nulla condimentum lacus, vel fringilla turpis arcu non sapien. Sed cursus, eros sed dictum molestie, urna sapien condimentum erat, ut condimentum elit justo a est. Nullam mi enim, tincidunt quis erat sit amet, imperdiet ultrices orci. Mauris vel nisl et lacus dapibus bibendum sit amet id nisi. Fusce ultricies malesuada est nec sodales. Maecenas tempor mattis sem, vel aliquam leo malesuada sit amet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae', 'rice with couples of topping', '/uploaded_images/sunwell.system@gmail.com/038a6e90-646f-4c77-904d-5350ab0f7b55_rice-box.jpg', '32d22cae-b812-3468-abfb-414ccb247e2d', '2017-10-16 21:23:36', '2017-10-16 21:23:36'),
('2939385f-858a-4e2b-bfc9-5dfb53511dd4', 'Nasi goreng', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Nasi goreng biasa', '/uploaded_images/sunwell.system@gmail.com/2939385f-858a-4e2b-bfc9-5dfb53511dd4_nasi_goreng.jpg', '32d22cae-b812-3468-abfb-414ccb247e2d', '2017-09-29 00:38:49', '2017-09-29 00:38:49'),
('58407f9e-1969-49f1-9bcb-22b98b28ae47', 'Japanese food', 'In non auctor dolor. Aliquam faucibus consequat turpis quis accumsan. Cras a nisl in nunc euismod commodo quis sit amet odio. Integer vestibulum nibh purus. Quisque tristique pharetra neque, venenatis pellentesque tellus venenatis fringilla. Vestibulum pretium bibendum metus et congue. Curabitur commodo congue enim ut aliquet. Maecenas sodales lacus nec risus aliquet elementum bibendum at enim. Nulla facilisis tempor mattis. Phasellus ut ipsum lectus. Mauris ultricies sapien nec ex tempus tempor. Proin rhoncus tellus in libero viverra sodales non non risus. Donec porttitor lacus convallis ipsum pellentesque, sit amet pharetra augue condimentum. Ut venenatis purus ac erat convallis suscipit.', 'a set of japanese food', '/uploaded_images/sunwell.system@gmail.com/58407f9e-1969-49f1-9bcb-22b98b28ae47_japanese_food-wallpaper-1440x960.jpg', '32d22cae-b812-3468-abfb-414ccb247e2d', '2017-10-16 21:31:54', '2017-10-16 21:31:54'),
('5eefb9f6-8cf4-42ce-b6ae-2267bc20209a', 'Capcay', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'Capcay polos, edited!', '/uploaded_images/sunwell.system@gmail.com/5eefb9f6-8cf4-42ce-b6ae-2267bc20209a_resep-tumis-capcay-sederhana.jpg', '32d22cae-b812-3468-abfb-414ccb247e2d', '2017-09-28 00:57:32', '2017-09-28 00:57:47'),
('885ee5e8-1927-4a19-8c3d-67abf2462034', 'Ayam Goreng Mentega', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Ayam yang digoreng pakai bumbu mentega', '/uploaded_images/sunwell.system@gmail.com/885ee5e8-1927-4a19-8c3d-67abf2462034_ayam-mentega.jpg', '32d22cae-b812-3468-abfb-414ccb247e2d', '2017-09-25 21:14:48', '2017-09-29 01:25:44'),
('c0b6ce2b-b7a1-49f6-9d46-49f9fd839d78', 'Ayam Goreng', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Ayam goreng polos', '/uploaded_images/sunwell.system@gmail.com/c0b6ce2b-b7a1-49f6-9d46-49f9fd839d78_ayam_goreng.jpg', '32d22cae-b812-3468-abfb-414ccb247e2d', '2017-09-26 02:08:06', '2017-09-26 02:08:06'),
('ecbb6598-823b-471e-9606-3c1b34106b2a', 'Mojito', 'A glass of Mojito', 'served with ice, edited!', '/uploaded_images/sunwell.system@gmail.com/ecbb6598-823b-471e-9606-3c1b34106b2a_rest-bg.jpg', '32d22cae-b812-3468-abfb-414ccb247e2d', '2017-10-03 22:12:57', '2017-10-06 00:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `master_services`
--

CREATE TABLE `master_services` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenant_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_services`
--

INSERT INTO `master_services` (`id`, `name`, `description`, `tenant_id`, `cover_image`, `created_at`, `updated_at`) VALUES
('231e6293-8488-440d-a9a6-13a374a1699f', 'Internet Service', 'quality of our internet service', '32d22cae-b812-3468-abfb-414ccb247e2d', 'uploaded_images/sunwell.system@gmail.com/231e6293-8488-440d-a9a6-13a374a1699f_wifi-icon.ico', '2017-10-09 00:22:20', '2017-10-09 00:22:20'),
('32605c2d-e966-4db3-ac74-bef592821ee2', 'Parkir', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '32d22cae-b812-3468-abfb-414ccb247e2d', NULL, '2017-10-03 00:27:08', '2017-10-06 01:35:59'),
('abaffb45-af31-42b0-aa54-758b3b0e1b61', 'Pramusaji', 'layanan table manner dan penyediaan makanan', '32d22cae-b812-3468-abfb-414ccb247e2d', NULL, '2017-10-06 01:02:15', '2017-10-06 01:02:15');

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
(3, '2017_09_19_042037_create_tenant_category_table', 1),
(4, '2017_09_19_044127_create_tenants_table', 2),
(5, '2017_09_20_033853_create_user_types_table', 3),
(6, '2017_09_20_035512_add_columns_to_users', 4),
(7, '2017_09_22_102446_create_master_products_table', 5),
(8, '2017_09_25_034652_create_master_services_table', 6),
(10, '2017_09_25_095614_create_master_product_images_table', 7),
(11, '2017_09_28_100324_create_faqs_table', 8),
(12, '2017_09_29_074428_create_master_services_table', 9),
(16, '2017_10_05_093156_create_faq_products_table', 10),
(17, '2017_10_06_075415_add_cover_image_to_master_services', 11),
(18, '2017_10_11_073308_create_faq_services_table', 12),
(19, '2017_10_11_074216_add_foreign_to_faq_services', 13),
(20, '2017_10_13_073151_create_sub_master_products_table', 14),
(22, '2017_10_17_045850_create_complaint_products_table', 15),
(23, '2017_10_17_101437_create_questions_table', 16),
(24, '2017_10_17_101824_create_customers_table', 17),
(25, '2017_10_18_092007_add_foreign_to_question_table', 18),
(26, '2017_10_27_055245_create_product_categories_table', 19);

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
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `master_product_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `parent_id`, `lft`, `rgt`, `depth`, `name`, `master_product_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 8, 0, 'Test', '58407f9e-1969-49f1-9bcb-22b98b28ae47', '2017-10-29 21:32:48', '2017-11-01 03:06:33'),
(2, 1, 2, 5, 1, 'Test Level 2', NULL, '2017-10-30 01:40:23', '2017-10-30 01:40:37'),
(3, 2, 3, 4, 2, 'Test level 3', NULL, '2017-10-30 01:40:36', '2017-10-30 01:40:37'),
(4, NULL, 9, 20, 0, 'Taste', '58407f9e-1969-49f1-9bcb-22b98b28ae47', '2017-10-30 03:30:26', '2017-11-01 03:08:06'),
(5, 4, 10, 11, 1, 'Saltiness', NULL, '2017-11-01 02:18:08', '2017-11-01 03:06:33'),
(6, 4, 12, 19, 1, 'ripeness', NULL, '2017-11-01 02:22:47', '2017-11-01 03:08:06'),
(7, 1, 6, 7, 1, 'Test level 2 same level', NULL, '2017-11-01 03:06:33', '2017-11-01 03:06:33'),
(8, 6, 13, 14, 2, 'rare', NULL, '2017-11-01 03:07:43', '2017-11-01 03:07:43'),
(9, 6, 15, 16, 2, 'medium rare', NULL, '2017-11-01 03:07:53', '2017-11-01 03:07:54'),
(10, 6, 17, 18, 2, 'well-done', NULL, '2017-11-01 03:08:06', '2017-11-01 03:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci,
  `is_need_call` tinyint(1) DEFAULT '0',
  `tenant_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `customer_id`, `question`, `answer`, `is_need_call`, `tenant_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 'test, edited', NULL, 1, '32d22cae-b812-3468-abfb-414ccb247e2d', '2017-10-18 21:27:30', '2017-10-19 00:40:52'),
(2, 1, 'another try', NULL, 1, '32d22cae-b812-3468-abfb-414ccb247e2d', '2017-10-18 23:57:53', '2017-10-24 01:33:15'),
(3, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat ?', NULL, 0, '32d22cae-b812-3468-abfb-414ccb247e2d', '2017-10-19 00:48:26', '2017-10-19 00:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `tenant_categories`
--

CREATE TABLE `tenant_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tenant_categories`
--

INSERT INTO `tenant_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Fashion', NULL, NULL),
(2, 'Food & Beverages', NULL, NULL),
(3, 'Retail', NULL, NULL),
(4, 'Automotive', NULL, NULL),
(5, 'IT Business', NULL, NULL),
(6, 'Entertainment', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` text COLLATE utf8mb4_unicode_ci,
  `logo_path` text COLLATE utf8mb4_unicode_ci,
  `memo` text COLLATE utf8mb4_unicode_ci,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `name`, `email`, `address`, `phone`, `city`, `description`, `country`, `province`, `image_path`, `logo_path`, `memo`, `category_id`, `created_at`, `updated_at`) VALUES
('32d22cae-b812-3468-abfb-414ccb247e2d', 'Sunwell System', 'sunwell.system@gmail.com', NULL, NULL, NULL, 'We are working on IT projects', 'Indonesia', NULL, NULL, NULL, NULL, 5, '2017-09-19 21:26:51', '2017-09-19 21:26:51');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sysbuiltin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pattern` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `name`, `sysbuiltin`, `pattern`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL, '2017-09-19 20:52:34', '2017-09-19 20:52:34'),
(2, 'Customer Service', NULL, NULL, '2017-09-19 20:53:27', '2017-09-19 20:53:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `tenant_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `status`, `tenant_id`, `user_type_id`, `remember_token`, `created_at`, `updated_at`) VALUES
('32d22cae-b812-3468-abfb-414ccb247e2d', 'Sunwell System', 'sunwell.system@gmail.com', '$2y$10$mha.H39L0HLljDOfKZlOe.C2wpRzgYBpkYv4gzi9ixxnTkzb5uTn6', NULL, 1, '32d22cae-b812-3468-abfb-414ccb247e2d', 1, '4oPnrPqhcztwNxbufDU3htihUGeEh4gjW5xcBWr3MymxJpbgDbIBWrwjpYkt', '2017-09-19 21:26:51', '2017-09-19 21:26:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaint_products`
--
ALTER TABLE `complaint_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `complaint_products_master_product_id_foreign` (`master_product_id`),
  ADD KEY `complaint_products_tenant_id_index` (`tenant_id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`),
  ADD KEY `currency` (`currency`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_tenant_id_index` (`tenant_id`);

--
-- Indexes for table `faq_products`
--
ALTER TABLE `faq_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faq_products_master_product_id_index` (`master_product_id`);

--
-- Indexes for table `faq_services`
--
ALTER TABLE `faq_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faq_services_master_service_id_index` (`master_service_id`);

--
-- Indexes for table `master_product_images`
--
ALTER TABLE `master_product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `master_product_images_master_product_id_foreign` (`master_product_id`);

--
-- Indexes for table `master_products`
--
ALTER TABLE `master_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `master_products_tenant_id_foreign` (`tenant_id`);

--
-- Indexes for table `master_services`
--
ALTER TABLE `master_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `master_services_tenant_id_foreign` (`tenant_id`);

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
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_categories_parent_id_index` (`parent_id`),
  ADD KEY `product_categories_lft_index` (`lft`),
  ADD KEY `product_categories_rgt_index` (`rgt`),
  ADD KEY `product_categories_master_product_id_index` (`master_product_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_tenant_id_index` (`tenant_id`),
  ADD KEY `questions_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `tenant_categories`
--
ALTER TABLE `tenant_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tenants_email_unique` (`email`),
  ADD KEY `tenants_category_id_foreign` (`category_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_user_type_id_foreign` (`user_type_id`),
  ADD KEY `users_tenant_id_index` (`tenant_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaint_products`
--
ALTER TABLE `complaint_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `faq_products`
--
ALTER TABLE `faq_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `faq_services`
--
ALTER TABLE `faq_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `master_product_images`
--
ALTER TABLE `master_product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tenant_categories`
--
ALTER TABLE `tenant_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaint_products`
--
ALTER TABLE `complaint_products`
  ADD CONSTRAINT `complaint_products_master_product_id_foreign` FOREIGN KEY (`master_product_id`) REFERENCES `master_products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `complaint_products_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `faq_products`
--
ALTER TABLE `faq_products`
  ADD CONSTRAINT `faq_products_master_product_id_foreign` FOREIGN KEY (`master_product_id`) REFERENCES `master_products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `faq_services`
--
ALTER TABLE `faq_services`
  ADD CONSTRAINT `faq_services_master_service_id_foreign` FOREIGN KEY (`master_service_id`) REFERENCES `master_services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `master_product_images`
--
ALTER TABLE `master_product_images`
  ADD CONSTRAINT `master_product_images_master_product_id_foreign` FOREIGN KEY (`master_product_id`) REFERENCES `master_products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `master_products`
--
ALTER TABLE `master_products`
  ADD CONSTRAINT `master_products_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `master_services`
--
ALTER TABLE `master_services`
  ADD CONSTRAINT `master_services_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_master_product_id_foreign` FOREIGN KEY (`master_product_id`) REFERENCES `master_products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `questions_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tenants`
--
ALTER TABLE `tenants`
  ADD CONSTRAINT `tenants_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `tenant_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_user_type_id_foreign` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
