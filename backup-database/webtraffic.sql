-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 15, 2022 at 08:54 AM
-- Server version: 5.7.38-cll-lve
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webtraffic`
--

-- --------------------------------------------------------

--
-- Table structure for table `credits`
--

CREATE TABLE `credits` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `credits` double(8,2) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `credits`
--

INSERT INTO `credits` (`id`, `name`, `credits`, `price`, `created_at`, `updated_at`) VALUES
(1, '500', 500.00, 1.99, '2022-08-15 21:56:34', '2022-08-15 21:56:34'),
(2, '1,500', 1500.00, 3.00, '2022-08-15 21:56:34', '2022-08-15 21:56:34'),
(3, '5,000', 5000.00, 7.49, '2022-08-15 21:56:34', '2022-08-15 21:56:34'),
(4, '10,000', 10000.00, 14.99, '2022-08-15 21:56:34', '2022-08-15 21:56:34'),
(5, '25,000', 25000.00, 19.99, '2022-08-15 21:56:34', '2022-08-15 21:56:34'),
(6, '50,000', 50000.00, 47.00, '2022-08-15 21:56:34', '2022-08-15 21:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2020_03_20_153356_transfers', 1),
('2020_03_21_234946_websites', 1),
('2020_04_01_121628_create_settings_table', 1),
('2020_04_01_184614_create_surfed_today_table', 1),
('2020_04_22_195456_create_user_activities_table', 1),
('2020_07_08_145808_create_credits_table', 1),
('2022_05_13_211403_create_payment_histories_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_histories`
--

CREATE TABLE `payment_histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `credits` int(11) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ref_credits` double(8,2) NOT NULL,
  `reg_credits` double(8,2) NOT NULL,
  `surf_time` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_description`, `site_url`, `site_email`, `ref_credits`, `reg_credits`, `surf_time`, `created_at`, `updated_at`) VALUES
(1, 'Web Traffic Exchanger', 'Web Traffic Exchanger', 'https://webtraffic.live/', 'dikeudeze@gmail.com', 75.00, 100.00, 15, '2022-08-15 21:56:34', '2022-08-15 21:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `surfed_today`
--

CREATE TABLE `surfed_today` (
  `id` int(10) UNSIGNED NOT NULL,
  `user` int(11) NOT NULL,
  `site` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `surfed_today`
--

INSERT INTO `surfed_today` (`id`, `user`, `site`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 2, 1, NULL, NULL),
(4, 2, 1, NULL, NULL),
(5, 2, 1, NULL, NULL),
(6, 2, 1, NULL, NULL),
(7, 2, 1, NULL, NULL),
(8, 2, 1, NULL, NULL),
(9, 2, 1, NULL, NULL),
(10, 2, 1, NULL, NULL),
(11, 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `receiver` int(11) NOT NULL,
  `credits` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `credits` double(8,2) NOT NULL DEFAULT '75.00',
  `slots` int(11) NOT NULL DEFAULT '3',
  `refid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banned` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `userlevel` tinyint(4) NOT NULL DEFAULT '0',
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `credits`, `slots`, `refid`, `banned`, `userlevel`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Prince Dike', 'dikeudeze@gmail.com', 'princedike', '$2y$10$WeogbSzFEoV0DQjLcm49Jetd4BvbzJlA1aE1VDdhE4f61R5yHD3Ti', 89.00, 3, NULL, '0', 1, 0, NULL, '2022-08-15 21:56:34', '2022-08-15 22:15:48'),
(2, 'metaweb', 'info@metaweb.me', 'metaweb.me', '$2y$10$OPEf1R.gH0JsxXWjm09WBedLWmVXrxBkQlUyLPIBgu47OsI62tM/m', 111.00, 3, NULL, '0', 0, 0, NULL, '2022-08-15 22:15:16', '2022-08-15 22:15:48');

-- --------------------------------------------------------

--
-- Table structure for table `user_activities`
--

CREATE TABLE `user_activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `credits_earned` double(8,2) NOT NULL DEFAULT '0.00',
  `hits_received` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_activities`
--

INSERT INTO `user_activities` (`id`, `user_id`, `credits_earned`, `hits_received`, `created_at`, `updated_at`) VALUES
(1, 1, 0.00, 11, '2022-08-15 21:56:44', '2022-08-15 22:15:48'),
(2, 2, 11.00, 0, '2022-08-15 22:15:29', '2022-08-15 22:15:48'),
(3, 1, 0.00, 11, '2022-08-15 22:15:29', '2022-08-15 22:15:48');

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE `websites` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `credits` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `haslimit` int(11) NOT NULL,
  `totalhits` int(11) NOT NULL,
  `hits` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `websites`
--

INSERT INTO `websites` (`id`, `user_id`, `url`, `credits`, `duration`, `haslimit`, `totalhits`, `hits`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'https://testing.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:23:18', '2022-08-15 22:23:18'),
(3, 1, 'https://sconiterfoods.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(4, 1, 'https://globalevents.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(5, 1, 'https://charonsphere.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(6, 1, 'https://myday.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(7, 1, 'https://endtimeupdates.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(8, 1, 'https://politicstoday.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(9, 1, 'https://pattance.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(10, 1, 'https://carcinogens-and-workplace.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(11, 1, 'https://christianlifes.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(12, 1, 'https://newsguide.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(13, 1, 'https://excellentlove.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(14, 1, 'https://jurrastic.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(15, 1, 'https://melody.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(16, 1, 'https://goodenergy.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(17, 1, 'https://successvibes.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(18, 1, 'https://everything-precious.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(19, 1, 'https://moozic.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(20, 1, 'https://foodies.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(21, 1, 'https://mind-and-soul.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(22, 1, 'https://fashiontrends.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(23, 1, 'https://a-leap.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(24, 1, 'https://precious-chukwumah.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(25, 1, 'https://precious-and-emeka.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(26, 1, 'https://healthstreams.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(27, 1, 'https://ella.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(28, 1, 'https://princesshairsworld.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(29, 1, 'https://princesshairworld.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(30, 1, 'https://ella-smile.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(31, 1, 'https://the-fourth-man.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(32, 1, 'https://smiles.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(33, 1, 'https://emmanuelle.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(34, 1, 'https://interiorhub.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(35, 1, 'https://toniaglobal.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(36, 1, 'https://kobasons.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(37, 1, 'https://limitlesscell.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(38, 1, 'https://peekoms.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(39, 1, 'https://zoeworld.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(40, 1, 'https://antidote-inovative.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(41, 1, 'https://willzautotech.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(42, 1, 'https://excellentlywealthy.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(43, 1, 'https://calvary-oil-nig-ltd.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(44, 1, 'https://catelservices.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(45, 1, 'https://antidote.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(46, 1, 'https://antidotecomm.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(47, 1, 'https://mickyjaga.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(48, 1, 'https://foodforeternity.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(49, 1, 'https://johnotu.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(50, 1, 'https://emy.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(51, 1, 'https://pathfinders.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(52, 1, 'https://topnotchwebsite.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(53, 1, 'https://pacatech-oil-gas.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(54, 1, 'https://epignosues.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(55, 1, 'https://rhapsodyextracts.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(56, 1, 'https://lydiannadozie.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(57, 1, 'https://kingsklass-victorious-cell.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(58, 1, 'https://fly.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(59, 1, 'https://ellahwebsite.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(60, 1, 'https://mypersonalblog.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(61, 1, 'https://myzoelife.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(62, 1, 'https://todaysnews.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(63, 1, 'https://todayspoliticsnews.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(64, 1, 'https://myteevoonline.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(65, 1, 'https://9jagossip.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(66, 1, 'https://rhapsodydaily.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(67, 1, 'https://thebuzz.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(68, 1, 'https://sportsarena.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(69, 1, 'https://obariajurri.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(70, 1, 'https://httpswa.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(71, 1, 'https://acceleratedgraceoutreach.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(72, 1, 'https://spiritfx.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(73, 1, 'https://prim-talks.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(74, 1, 'https://uncle-phil.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(75, 1, 'https://phil-snype-world.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(76, 1, 'https://phil-happy.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(77, 1, 'https://graph-n-philcs.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(78, 1, 'https://rhapsody-grab.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(79, 1, 'https://fruit-bearers-cell.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(80, 1, 'https://crypto-friends.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(81, 1, 'https://my-home.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(82, 1, 'https://falice1.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(83, 1, 'https://exquiste-ladies-pcf.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(84, 1, 'https://kiros-grill.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(85, 1, 'https://legit.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(86, 1, 'https://legitinfo.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(87, 1, 'https://fitnesszar.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(88, 1, 'https://phz3.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(89, 1, 'https://mynewblog.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(90, 1, 'https://myteevodanielchrist.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(91, 1, 'https://perfectmike.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(92, 1, 'https://honeybooth.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(93, 1, 'https://diddybank.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(94, 1, 'https://baronk.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(95, 1, 'https://cubafoods.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(96, 1, 'https://kingingjoe.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(97, 1, 'https://ifunanyaga.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(98, 1, 'https://ifunanya.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(99, 1, 'https://emiglory.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(100, 1, 'https://onyxblack11.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(101, 1, 'https://beautyhome.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(102, 1, 'https://ekanyinwholesyahoo.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(103, 1, 'https://mykelzie.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(104, 1, 'https://louipbe.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(105, 1, 'https://gidskind-webs.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(106, 1, 'https://godskind.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(107, 1, 'https://davidfub7.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(108, 1, 'https://wealthy.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(109, 1, 'https://pness.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(110, 1, 'https://faithjossy.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(111, 1, 'https://faithjossyblog.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(112, 1, 'https://scentsbywill.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(113, 1, 'https://lkcsparksite.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(114, 1, 'https://afrofoodrecipes.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(115, 1, 'https://graciesfreshfactor.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(116, 1, 'https://basmarineoffshoreltd.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(117, 1, 'https://assuredmarket.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(118, 1, 'https://kidsworldwthaty.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(119, 1, 'https://backersworld.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(120, 1, 'https://4excellence.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(121, 1, 'https://spiceworld.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(122, 1, 'https://jennys.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(123, 1, 'https://godinhumanflesh.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(124, 1, 'https://dynamic-people.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(125, 1, 'https://excellent-people.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(126, 1, 'https://kascoolmene.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(127, 1, 'https://httpsadokskitchen.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(128, 1, 'https://godinthecity.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(129, 1, 'https://stringsnharmony.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(130, 1, 'https://ambassador-domain.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(131, 1, 'https://tes-investment.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(132, 1, 'https://community-news.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(133, 1, 'https://world-leaders-forum.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(134, 1, 'https://church-today.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(135, 1, 'https://ambassador-online-cell.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(136, 1, 'https://shevlove.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(137, 1, 'https://flourishing.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(138, 1, 'https://doasound.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(139, 1, 'https://blossomdecorations.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(140, 1, 'https://flourishcell.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(141, 1, 'https://weightlost.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(142, 1, 'https://light-design.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(143, 1, 'https://limitless-grace.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(144, 1, 'https://idigitalskills.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(145, 1, 'https://dopoulos.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(146, 1, 'https://allstars.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(147, 1, 'https://ballboysbestodds.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(148, 1, 'https://singleladies.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(149, 1, 'https://logistics.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(150, 1, 'https://aviation.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(151, 1, 'https://assetsdisposal.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(152, 1, 'https://easytravels.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(153, 1, 'https://tourismguide.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(154, 1, 'https://hotelreservations.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(155, 1, 'https://professionalsclub.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(156, 1, 'https://latestcars.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(157, 1, 'https://community.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(158, 1, 'https://protein.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(159, 1, 'https://teamredvico.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(160, 1, 'https://edifiers.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(161, 1, 'https://christianlife.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(162, 1, 'https://joy-codes.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(163, 1, 'https://acmevick.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(164, 1, 'https://code.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(165, 1, 'https://puregold-bakes.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(166, 1, 'https://tel.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(167, 1, 'https://vinco.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(168, 1, 'https://auxanochambers.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(169, 1, 'https://ever-expanding-life.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(170, 1, 'https://egrchika.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(171, 1, 'https://chanky.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(172, 1, 'https://denquipnigeriainternational.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(173, 1, 'https://dnice.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(174, 1, 'https://dni.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(175, 1, 'https://mimshack-expansion.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(176, 1, 'https://iwirimaenterprises.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(177, 1, 'https://amazing-god.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(178, 1, 'https://phoenixfarms.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(179, 1, 'https://footballscene.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(180, 1, 'https://goalgetters.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(181, 1, 'https://healthandsafetytidbits.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(182, 1, 'https://gracehubfoods.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(183, 1, 'https://thisismylife.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(184, 1, 'https://k2linkscom.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(185, 1, 'https://myscripturebuddies.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(186, 1, 'https://gemesta.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(187, 1, 'https://immortaldestinyforlife.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(188, 1, 'https://lookinggoodandhealthy.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(189, 1, 'https://nobels.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(190, 1, 'https://israel.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(191, 1, 'https://bakoemmanuel.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(192, 1, 'https://rabahweb.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(193, 1, 'https://cateringandtailoring.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(194, 1, 'https://businesssandfashiondesign.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(195, 1, 'https://niceon4u.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(196, 1, 'https://automobilegasoil.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(197, 1, 'https://musicwithmeaning.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(198, 1, 'https://grace-network.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(199, 1, 'https://enekaydigital.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(200, 1, 'https://wealth.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(201, 1, 'https://vou.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(202, 1, 'https://wealthiest-man.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(203, 1, 'https://evergreen.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(204, 1, 'https://evergreenstella.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(205, 1, 'https://nuekreacion.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(206, 1, 'https://seniboqubwebs.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(207, 1, 'https://seniboqubwebsqubwebs.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(208, 1, 'https://have-it-all.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(209, 1, 'https://lovecampbell.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(210, 1, 'https://kemidomarket.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(211, 1, 'https://tastypotdelicacies.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(212, 1, 'https://looksleekandcute.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(213, 1, 'https://femitrades.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(214, 1, 'https://high-impact-career.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(215, 1, 'https://copy-writing-made-easy.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(216, 1, 'https://deepdive-realtors.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(217, 1, 'https://rafstyles.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(218, 1, 'https://zionwealth.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(219, 1, 'https://auxano-printers.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(220, 1, 'https://elfpee.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(221, 1, 'https://recipe.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(222, 1, 'https://recipes.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(223, 1, 'https://teensweb.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(224, 1, 'https://culwebs.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(225, 1, 'https://phzone3.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(226, 1, 'https://teevo4you.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(227, 1, 'https://glorious.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(228, 1, 'https://fruitgardenng.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(229, 1, 'https://akansblog.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(230, 1, 'https://possibilitydynastyqubwebs.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(231, 1, 'https://wisdomhub.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(232, 1, 'https://thebeautifullife.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(233, 1, 'https://heavenonearth.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(234, 1, 'https://j-and-e.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(235, 1, 'https://noblegist.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(236, 1, 'https://onos.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(237, 1, 'https://healthy-life.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(238, 1, 'https://flawless.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(239, 1, 'https://saledon-nig-ltd.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(240, 1, 'https://estate-outreach-ce-mega-grace.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(241, 1, 'https://iyalla4christ.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(242, 1, 'https://furo4real2010yahoo.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(243, 1, 'https://drbvicinity.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(244, 1, 'https://elitebuzzwebsite.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(245, 1, 'https://aniroyal.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(246, 1, 'https://inestimableesty.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(247, 1, 'https://healingstreams.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(248, 1, 'https://rhapsody-of-realities.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(249, 1, 'https://glossystarlimited.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(250, 1, 'https://cleanhands.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(251, 1, 'https://ginnoxtechsolutions.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(252, 1, 'https://watstrendingpere.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(253, 1, 'https://watstrending.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(254, 1, 'https://qubwebs.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(255, 1, 'https://prospergabriel.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(256, 1, 'https://makarizo.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(257, 1, 'https://wealthsketches.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(258, 1, 'https://genny-wealth.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(259, 1, 'https://viniscorner.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(260, 1, 'https://dewhyno.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(261, 1, 'https://jesse.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(262, 1, 'https://techtalk.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(263, 1, 'https://chrisuantioje.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(264, 1, 'https://forextips.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(265, 1, 'https://clozzette.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(266, 1, 'https://miramaxij.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(267, 1, 'https://miramaxijautos.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(268, 1, 'https://miramaxijmusic.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(269, 1, 'https://miramaxijrealestate.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(270, 1, 'https://miramaxijnews.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(271, 1, 'https://miramaxijfitness.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(272, 1, 'https://miramaxijrandom.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(273, 1, 'https://rabahmax.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(274, 1, 'https://miramaxijcrypto.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(275, 1, 'https://miramaxijagro.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(276, 1, 'https://miramaxpolitics.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(277, 1, 'https://miramaxijbutterfly.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(278, 1, 'https://nurseedora.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(279, 1, 'https://grace.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(280, 1, 'https://accelerated-grace.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(281, 1, 'https://goodlife.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(282, 1, 'https://unlimited-joy.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(283, 1, 'https://amazing-glory.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(284, 1, 'https://godliness.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(285, 1, 'https://charlisangel.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(286, 1, 'https://divinerecipes.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(287, 1, 'https://fashion.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(288, 1, 'https://rita-farm.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(289, 1, 'https://rita-foodies.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(290, 1, 'https://excel-cell.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(291, 1, 'https://excel-cell2.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(292, 1, 'https://fire-risk-assessment-training-materials.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(293, 1, 'https://queennessa.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(294, 1, 'https://superiorcyberline3dworks.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(295, 1, 'https://trnscndnt.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(296, 1, 'https://thenftjourney.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(297, 1, 'https://sportsxhub.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(298, 1, 'https://smilingpeople.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(299, 1, 'https://newsworld.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(300, 1, 'https://nigeriapolitics.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(301, 1, 'https://exceptionaldebby.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(302, 1, 'https://superme.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(303, 1, 'https://debbywhyte.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(304, 1, 'https://godspeacecontents.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(305, 1, 'https://joy4all.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(306, 1, 'https://amojasper2.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(307, 1, 'https://greatjoshuawww.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(308, 1, 'https://shopnaomii.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(309, 1, 'https://artivechika.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(310, 1, 'https://artvechika.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(311, 1, 'https://pleromateevoclub.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(312, 1, 'https://dorrie.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(313, 1, 'https://d.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(314, 1, 'https://brownies.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(315, 1, 'https://bbrabah.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(316, 1, 'https://zioncell.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(317, 1, 'https://seedcell.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(318, 1, 'https://dominate.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(319, 1, 'https://rabah.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(320, 1, 'https://phronesis.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(321, 1, 'https://greatest.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(322, 1, 'https://imperial.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(323, 1, 'https://insight.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(324, 1, 'https://everythinggadget.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(325, 1, 'https://myplace.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(326, 1, 'https://st-clems.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(327, 1, 'https://bukolaconsult.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(328, 1, 'https://natchyfoods.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(329, 1, 'https://ladiesonamission.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(330, 1, 'https://natchybrand.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(331, 1, 'https://bukolaspeaks.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(332, 1, 'https://charisma4cell.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(333, 1, 'https://adonai.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(334, 1, 'https://beyondthesuitsacademy.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(335, 1, 'https://wealthiewin.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(336, 1, 'https://quintessentials.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(337, 1, 'https://kazar.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(338, 1, 'https://kingscell.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(339, 1, 'https://crown.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(340, 1, 'https://muzzle.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(341, 1, 'https://soccernet.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(342, 1, 'https://naijawahalaqubwebs.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(343, 1, 'https://rockcity-villa-resorts.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(344, 1, 'https://sacredheartinternationalschools.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(345, 1, 'https://gabangels-jewelry.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(346, 1, 'https://mypolitics.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(347, 1, 'https://politicsworld.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(348, 1, 'https://politicsandco.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(349, 1, 'https://fashionworld.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(350, 1, 'https://omapage.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(351, 1, 'https://words-established.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(352, 1, 'https://word-established.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(353, 1, 'https://code-rabah-1.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(354, 1, 'https://all-cooking.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(355, 1, 'https://copywriting.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(356, 1, 'https://writing.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(357, 1, 'https://riches4wealth.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(358, 1, 'https://your-lifestyle.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(359, 1, 'https://theroyalties.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(360, 1, 'https://shinbles-luxury.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(361, 1, 'https://6-figure-club-nigeria.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(362, 1, 'https://glowsecrets.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(363, 1, 'https://glowsecret.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(364, 1, 'https://grownman.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(365, 1, 'https://evergreenbestbite.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(366, 1, 'https://kingsfx.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(367, 1, 'https://kingsandqueens.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(368, 1, 'https://websphere.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(369, 1, 'https://benedict.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(370, 1, 'https://ballin.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(371, 1, 'https://gsmarena.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(372, 1, 'https://uchoi.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(373, 1, 'https://refreshingtimeswithpastorjoy.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(374, 1, 'https://corpersloveworldph3.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(375, 1, 'https://fitbodyzar.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(376, 1, 'https://jdynamic.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(377, 1, 'https://jdynamic-hair-world.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(378, 1, 'https://jdynamic-hairs.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(379, 1, 'https://jaywash.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(380, 1, 'https://jay124wash.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(381, 1, 'https://jay112004wash.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(382, 1, 'https://jay112004.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(383, 1, 'https://jay112004oche.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(384, 1, 'https://jay.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(385, 1, 'https://blucakes.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(386, 1, 'https://winningalways.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(387, 1, 'https://pre-wedding-photos.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(388, 1, 'https://epl-news-with-oche.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(389, 1, 'https://jaytonic.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(390, 1, 'https://business-of-21st-century-raising-financially-individuals-to-raise-others-financial-individuals.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(391, 1, 'https://smilableworld.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(392, 1, 'https://smilablefashion.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(393, 1, 'https://smilablecomedyworld.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(394, 1, 'https://femaleteensworld.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(395, 1, 'https://realtalkwithsmilable.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(396, 1, 'https://our-future-in-our-hands.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(397, 1, 'https://our-mumu-don-do.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(398, 1, 'https://arewa-politics.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(399, 1, 'https://50-million-youths-for-project-naija.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(400, 1, 'https://blessedfingers-world.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(401, 1, 'https://todia.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(402, 1, 'https://work.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(403, 1, 'https://delicious.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(404, 1, 'https://bookstore.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(405, 1, 'https://skybliss.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(406, 1, 'https://rockstar.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(407, 1, 'https://johnking.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(408, 1, 'https://richjohn.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(409, 1, 'https://dpme.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(410, 1, 'https://teerhap.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(411, 1, 'https://gloemmavic.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(412, 1, 'https://christy.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(413, 1, 'https://fortlightcreative.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(414, 1, 'https://jjcouturefashion.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(415, 1, 'https://foodieheaven.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(416, 1, 'https://beforeyoutakethatstep.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(417, 1, 'https://administrativeorganization.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(418, 1, 'https://loverhythms.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(419, 1, 'https://simplyenglish.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(420, 1, 'https://secretmusingsofaclosetwriter.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(421, 1, 'https://lifestylewithk.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(422, 1, 'https://teevowithkaren.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(423, 1, 'https://sharon.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(424, 1, 'https://preciouz.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(425, 1, 'https://teevo-online-club.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(426, 1, 'https://life-style.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(427, 1, 'https://unstoppable.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(428, 1, 'https://miracle.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(429, 1, 'https://robbiethinks.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(430, 1, 'https://qubweb.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(431, 1, 'https://golden-star.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(432, 1, 'https://unlimited-poet-master.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(433, 1, 'https://prolificlaundry.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(434, 1, 'https://planettheryhmesmaker.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(435, 1, 'https://itooknow.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(436, 1, 'https://pwilzvibes.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(437, 1, 'https://detutorfocus.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(438, 1, 'https://sharonfood.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(439, 1, 'https://sp.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(440, 1, 'https://hey-whatsapp-business-is-an-app-built-for-small-business-owners.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(441, 1, 'https://insightdigest.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(442, 1, 'https://pageantry-and-politics.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(443, 1, 'https://eating-the-right-way.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(444, 1, 'https://job-hub.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(445, 1, 'https://ladies-way.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(446, 1, 'https://pronize.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(447, 1, 'https://lagosproperties.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(448, 1, 'https://abujaproperties.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(449, 1, 'https://phpropertiesforsale.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(450, 1, 'https://lagospropertiesforsale.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(451, 1, 'https://abujapropertiesforsale.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(452, 1, 'https://equipmentforlease.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(453, 1, 'https://equipmentforsale.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32');
INSERT INTO `websites` (`id`, `user_id`, `url`, `credits`, `duration`, `haslimit`, `totalhits`, `hits`, `status`, `created_at`, `updated_at`) VALUES
(454, 1, 'https://cutiebeautyempire.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(455, 1, 'https://newgeneration.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(456, 1, 'https://greenams-sheltersandservices.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(457, 1, 'https://limitlesschurch.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(458, 1, 'https://fruitful-life.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(459, 1, 'https://gifted-life.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(460, 1, 'https://architecture.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(461, 1, 'https://majesty-graphix-design.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(462, 1, 'https://g-dog.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(463, 1, 'https://godswillkachi72.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(464, 1, 'https://jamie.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(465, 1, 'https://jamieella.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(466, 1, 'https://jamiekelly.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(467, 1, 'https://experience-god.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(468, 1, 'https://realglitz.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(469, 1, 'https://xpressview.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(470, 1, 'https://dera-empire.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(471, 1, 'https://cyberelias.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(472, 1, 'https://mypage.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(473, 1, 'https://youwin.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(474, 1, 'https://henshaw.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(475, 1, 'https://kelvinrainwebsite.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(476, 1, 'https://victoria-olaka.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(477, 1, 'https://victoria.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(478, 1, 'https://vicky.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(479, 1, 'https://nkajima.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(480, 1, 'https://olaka.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(481, 1, 'https://jesus-babe.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(482, 1, 'https://babe.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(483, 1, 'https://olakas-blog.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(484, 1, 'https://charity.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(485, 1, 'https://shineshaguolo.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(486, 1, 'https://rockymedia.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(487, 1, 'https://excelwest.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(488, 1, 'https://spirit.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(489, 1, 'https://pere.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(490, 1, 'https://facts-about-processed-food.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(491, 1, 'https://code-rabah-outreach.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(492, 1, 'https://monarch.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(493, 1, 'https://icre8.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(494, 1, 'https://myhairstyles.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(495, 1, 'https://gracewebsite.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(496, 1, 'https://httsqubwebs.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(497, 1, 'https://kingsite.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(498, 1, 'https://egbekings.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(499, 1, 'https://sunkings.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(500, 1, 'https://beautifulyou.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(501, 1, 'https://gideon.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(502, 1, 'https://home.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(503, 1, 'https://restaurant.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(504, 1, 'https://elsieskitchen.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(505, 1, 'https://personalspace.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(506, 1, 'https://ce-cc2-online-church.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(507, 1, 'https://teevo-club.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(508, 1, 'https://excellentblog.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(509, 1, 'https://obiocourage.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(510, 1, 'https://prosperblog.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(511, 1, 'https://munasgems.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(512, 1, 'https://emmanuelude.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(513, 1, 'https://lifewithdavid.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(514, 1, 'https://samuel.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(515, 1, 'https://the-hni.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(516, 1, 'https://orjigodswill.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(517, 1, 'https://boundless-grace.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(518, 1, 'https://ballerz-field.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(519, 1, 'https://zionites.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(520, 1, 'https://code-rabah.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(521, 1, 'https://sellit.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(522, 1, 'https://supreme.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(523, 1, 'https://jesusmissionnetwork.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(524, 1, 'https://lighthouse.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(525, 1, 'https://bensonclement.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(526, 1, 'https://braidedwigs.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(527, 1, 'https://manchesterunited.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(528, 1, 'https://self-love-and-me.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(529, 1, 'https://vcodimegwu.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(530, 1, 'https://glamour.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(531, 1, 'https://sportsandlifestyle.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(532, 1, 'https://letstalks.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(533, 1, 'https://fashionpolice.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(534, 1, 'https://eidmedia.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(535, 1, 'https://kessybenny.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(536, 1, 'https://kessyedafe.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(537, 1, 'https://praisecell.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(538, 1, 'https://favourjersey.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(539, 1, 'https://httpgrant.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(540, 1, 'https://hpptuloezemusicwebs.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(541, 1, 'https://mindmanagementwithpeegee.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(542, 1, 'https://patuche.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(543, 1, 'https://uninhibitedpattie.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(544, 1, 'https://realvalueslimitless.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(545, 1, 'https://technoflourishexveptvetures.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(546, 1, 'https://agadas-properties.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(547, 1, 'https://money-farms-investment.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(548, 1, 'https://lifeandtreasures.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(549, 1, 'https://digitalmindsetof-a-man.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(550, 1, 'https://jnj-investment.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(551, 1, 'https://flawlessmagnus.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(552, 1, 'https://recreateworld.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(553, 1, 'https://juliaspastries.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(554, 1, 'https://egbondu.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(555, 1, 'https://politics-today.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(556, 1, 'https://technology-today.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(557, 1, 'https://zenith-fashion-for-men.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(558, 1, 'https://elegant-perfume.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(559, 1, 'https://real-estate-today.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(560, 1, 'https://mukas-healthy-living-corner.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(561, 1, 'https://souldiaries.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(562, 1, 'https://mysweetdiaries.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(563, 1, 'https://soso85.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(564, 1, 'https://kalurchworldresources.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(565, 1, 'https://realprince.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(566, 1, 'https://immaglory.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(567, 1, 'https://tracydiamonds.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(568, 1, 'https://gloria.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(569, 1, 'https://etiquettecenter.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(570, 1, 'https://uniwocz.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(571, 1, 'https://home-for-the-lord.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(572, 1, 'https://sunesis.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(573, 1, 'https://chisand4real.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(574, 1, 'https://limitlesslife.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(575, 1, 'https://browniez.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(576, 1, 'https://constructionupdate.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(577, 1, 'https://hub.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(578, 1, 'https://animalcare.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(579, 1, 'https://glexicon.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(580, 1, 'https://realvalue.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(581, 1, 'https://christianliving.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(582, 1, 'https://souls.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(583, 1, 'https://kaylarichards.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(584, 1, 'https://joan.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(585, 1, 'https://kaylaorganicskincare.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(586, 1, 'https://beautiful-life.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(587, 1, 'https://how-to-create-more-money.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(588, 1, 'https://how-to-create-create-more-wealth.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(589, 1, 'https://booboogist.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(590, 1, 'https://zammy.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(591, 1, 'https://hyssophmo.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(592, 1, 'https://paulking-talker.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(593, 1, 'https://enochusoro.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(594, 1, 'https://enochusoro1.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(595, 1, 'https://superman-in-words.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(596, 1, 'https://favour-peoples.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(597, 1, 'https://dee-gen-integrated-services.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(598, 1, 'https://youthful-people.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(599, 1, 'https://people-of-like-minded.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(600, 1, 'https://geitglow-resources.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(601, 1, 'https://nicholasfootballnews.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(602, 1, 'https://fitnessforever.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(603, 1, 'https://victoriousliving.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(604, 1, 'https://cechoba1.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(605, 1, 'https://primeteamgroups.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(606, 1, 'https://paeanlimitedqubwebs.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(607, 1, 'https://shareeebee.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(608, 1, 'https://nneoma4christ.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(609, 1, 'https://sunrizze.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(610, 1, 'https://faithraph.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(611, 1, 'https://shaves.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(612, 1, 'https://lilysworld.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(613, 1, 'https://phdore.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(614, 1, 'https://pamzzy.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(615, 1, 'https://quintessence.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(616, 1, 'https://francobestevents.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(617, 1, 'https://pamworld.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(618, 1, 'https://pamzzycollections.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(619, 1, 'https://pamcuisine.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(620, 1, 'https://francobestnaturals.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(621, 1, 'https://crypto-world.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(622, 1, 'https://pamzzy-fashionworld.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(623, 1, 'https://pamzzy-newsflash.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(624, 1, 'https://pamzzyslay.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(625, 1, 'https://pamzzytravels.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(626, 1, 'https://eunikenex.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(627, 1, 'https://lifeoftheimmortals.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(628, 1, 'https://nwo.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(629, 1, 'https://kidiron.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(630, 1, 'https://dominieconglomerate.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(631, 1, 'https://tosingraphics.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(632, 1, 'https://tosinwithteevo.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(633, 1, 'https://life-quotes.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(634, 1, 'https://uniqueverse.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32'),
(635, 1, 'https://fashioncalls.qubwebs.com', 1, 10, 0, -1, 0, 0, '2022-08-15 22:34:32', '2022-08-15 22:34:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credits`
--
ALTER TABLE `credits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `payment_histories`
--
ALTER TABLE `payment_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_histories_user_id_foreign` (`user_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surfed_today`
--
ALTER TABLE `surfed_today`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_activities`
--
ALTER TABLE `user_activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_activities_user_id_foreign` (`user_id`);

--
-- Indexes for table `websites`
--
ALTER TABLE `websites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `websites_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credits`
--
ALTER TABLE `credits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_histories`
--
ALTER TABLE `payment_histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surfed_today`
--
ALTER TABLE `surfed_today`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_activities`
--
ALTER TABLE `user_activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `websites`
--
ALTER TABLE `websites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=636;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment_histories`
--
ALTER TABLE `payment_histories`
  ADD CONSTRAINT `payment_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_activities`
--
ALTER TABLE `user_activities`
  ADD CONSTRAINT `user_activities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `websites`
--
ALTER TABLE `websites`
  ADD CONSTRAINT `websites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
