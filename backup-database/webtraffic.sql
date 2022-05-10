-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 10, 2022 at 04:39 PM
-- Server version: 5.7.37-cll-lve
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
  `credits` double NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `credits`
--

INSERT INTO `credits` (`id`, `name`, `credits`, `price`, `created_at`, `updated_at`) VALUES
(12, '100,000', 100, 10.00, '2022-05-10 18:29:48', '2022-05-10 18:29:48'),
(13, '200000', 200000, 20.00, '2022-05-10 18:30:57', '2022-05-10 18:30:57'),
(18, '500,000', 500, 38.00, '2022-05-10 18:35:28', '2022-05-10 18:35:28'),
(19, '1,000,000', 1, 54.00, '2022-05-10 18:35:51', '2022-05-10 18:35:51');

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
('2020_07_08_145808_create_credits_table', 1);

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
(1, 'Web Traffic Exchanger', 'Traffic Exchanger', 'https://webtraffic.live', 'dikeudeze@gmail.com', 75.00, 100.00, 15, '2022-05-06 05:58:34', '2022-05-10 18:18:32');

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
(1, 2, 2, NULL, NULL),
(2, 2, 3, NULL, NULL),
(3, 2, 3, NULL, NULL),
(4, 2, 2, NULL, NULL),
(5, 2, 3, NULL, NULL),
(6, 2, 3, NULL, NULL),
(7, 2, 2, NULL, NULL),
(8, 2, 2, NULL, NULL),
(9, 2, 3, NULL, NULL),
(10, 2, 2, NULL, NULL),
(11, 2, 3, NULL, NULL),
(12, 2, 3, NULL, NULL),
(13, 2, 3, NULL, NULL),
(14, 2, 3, NULL, NULL),
(15, 2, 3, NULL, NULL),
(16, 2, 3, NULL, NULL),
(17, 2, 2, NULL, NULL),
(18, 2, 2, NULL, NULL),
(19, 2, 3, NULL, NULL),
(20, 2, 3, NULL, NULL),
(21, 2, 2, NULL, NULL),
(22, 2, 2, NULL, NULL),
(23, 2, 2, NULL, NULL),
(24, 2, 2, NULL, NULL),
(25, 2, 3, NULL, NULL),
(26, 2, 2, NULL, NULL),
(27, 2, 2, NULL, NULL),
(28, 2, 2, NULL, NULL),
(29, 2, 2, NULL, NULL),
(30, 1, 5, NULL, NULL),
(31, 1, 6, NULL, NULL),
(32, 1, 4, NULL, NULL),
(33, 1, 4, NULL, NULL),
(34, 1, 6, NULL, NULL),
(35, 1, 4, NULL, NULL),
(36, 1, 4, NULL, NULL),
(37, 1, 5, NULL, NULL),
(38, 1, 5, NULL, NULL),
(39, 1, 6, NULL, NULL),
(40, 1, 4, NULL, NULL),
(41, 1, 8, NULL, NULL),
(42, 1, 9, NULL, NULL),
(43, 1, 6, NULL, NULL),
(44, 1, 9, NULL, NULL),
(45, 1, 6, NULL, NULL),
(46, 1, 5, NULL, NULL),
(47, 1, 9, NULL, NULL),
(48, 1, 9, NULL, NULL),
(49, 1, 9, NULL, NULL),
(50, 1, 9, NULL, NULL),
(51, 1, 5, NULL, NULL),
(52, 1, 9, NULL, NULL),
(53, 1, 9, NULL, NULL),
(54, 1, 5, NULL, NULL),
(55, 1, 9, NULL, NULL),
(56, 1, 9, NULL, NULL),
(57, 1, 6, NULL, NULL),
(58, 1, 5, NULL, NULL),
(59, 1, 8, NULL, NULL),
(60, 1, 7, NULL, NULL),
(61, 1, 8, NULL, NULL),
(62, 1, 6, NULL, NULL),
(63, 1, 5, NULL, NULL),
(64, 1, 7, NULL, NULL),
(65, 1, 8, NULL, NULL),
(66, 1, 9, NULL, NULL),
(67, 1, 5, NULL, NULL),
(68, 1, 7, NULL, NULL),
(69, 1, 8, NULL, NULL),
(70, 1, 6, NULL, NULL),
(71, 1, 9, NULL, NULL),
(72, 1, 7, NULL, NULL),
(73, 1, 6, NULL, NULL),
(74, 1, 8, NULL, NULL),
(75, 1, 6, NULL, NULL),
(76, 1, 6, NULL, NULL),
(77, 1, 5, NULL, NULL),
(78, 1, 4, NULL, NULL),
(79, 1, 4, NULL, NULL),
(80, 1, 6, NULL, NULL),
(81, 1, 7, NULL, NULL),
(82, 1, 6, NULL, NULL),
(83, 1, 9, NULL, NULL),
(84, 1, 5, NULL, NULL),
(85, 1, 9, NULL, NULL),
(86, 1, 6, NULL, NULL),
(87, 1, 7, NULL, NULL),
(88, 1, 8, NULL, NULL),
(89, 1, 9, NULL, NULL),
(90, 1, 9, NULL, NULL),
(91, 1, 5, NULL, NULL),
(92, 1, 9, NULL, NULL),
(93, 1, 8, NULL, NULL),
(94, 1, 9, NULL, NULL),
(95, 1, 5, NULL, NULL),
(96, 1, 8, NULL, NULL),
(97, 1, 4, NULL, NULL),
(98, 1, 8, NULL, NULL),
(99, 1, 9, NULL, NULL),
(100, 1, 6, NULL, NULL),
(101, 1, 4, NULL, NULL),
(102, 1, 4, NULL, NULL),
(103, 1, 9, NULL, NULL),
(104, 1, 8, NULL, NULL),
(105, 1, 8, NULL, NULL),
(106, 1, 4, NULL, NULL),
(107, 1, 9, NULL, NULL),
(108, 1, 9, NULL, NULL),
(109, 1, 4, NULL, NULL),
(110, 1, 8, NULL, NULL),
(111, 1, 7, NULL, NULL),
(112, 1, 8, NULL, NULL),
(113, 1, 8, NULL, NULL),
(114, 1, 4, NULL, NULL),
(115, 1, 7, NULL, NULL),
(116, 1, 6, NULL, NULL),
(117, 1, 6, NULL, NULL),
(118, 1, 6, NULL, NULL),
(119, 1, 8, NULL, NULL),
(120, 1, 8, NULL, NULL),
(121, 1, 9, NULL, NULL);

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

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `credits`, `refid`, `banned`, `userlevel`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Prince Dike', 'dikeudeze@gmail.com', 'princedike', '$2y$10$Lt3Y4IK9AXmmIk2FfoXVN.ygCL0vcO.1D6KnY3VWvwoe4aXvs27Ua', 999999.99, NULL, '0', 1, 0, 'KA8wvzCeoWpRg2ciVIzg8xagGxNnO7b59Pa0T0LeElIFEqjjvevGhtOoc87p', '2022-05-06 05:58:34', '2022-05-10 22:53:24'),
(2, 'testing', 'zakiristesting@gmail.com', 'zakiristesting', '$2y$10$bc0PC9avn0zz/C/jHikeP.qqaFert4d248yhLpwnXXSIUhaQuhf9a', -14600.00, NULL, '0', 0, 0, '7iqoPhkjSKMACu9EPEZ9DHc5U0GpC1JdfJd6z6SddQe6IkiUNISUSJ2hBvhP', '2022-05-10 13:38:52', '2022-05-10 21:06:33'),
(3, 'Ikechukwu Onyebuchi ', 'buchitwrm@gmail.com', 'Buchitwrm', '$2y$10$JQ9eKJeXaO6Fmi8/HV2z7ewiKaF0fa9QboOBTKKgR1wzsRMhnU0cW', -60.00, NULL, '0', 0, 0, NULL, '2022-05-10 14:10:32', '2022-05-10 20:33:38'),
(4, 'Itohan Loveth Onyebuchi ', 'itohanonyebuchi@gmail.com', 'Lovethchika ', '$2y$10$0PDnFmx4sZ/ryQCuPvyGaOG5vjaH0zlsek/YaA.WXa3oFhzAw96C2', 6800.00, NULL, '0', 0, 0, NULL, '2022-05-10 14:42:17', '2022-05-10 21:39:31');

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
(1, 1, 0.00, 0, '2022-05-06 06:01:00', '2022-05-06 06:01:00'),
(2, 1, 0.00, 0, '2022-05-07 18:28:14', '2022-05-07 18:28:14'),
(3, 1, 26160.00, 29, '2022-05-10 10:39:34', '2022-05-10 21:39:31'),
(4, 2, 7300.00, 44, '2022-05-10 13:39:26', '2022-05-10 21:06:33'),
(5, 1, 26160.00, 29, '2022-05-10 13:39:26', '2022-05-10 21:39:31');

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE `websites` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `credits` int(11) NOT NULL,
  `duration` int(11) NOT NULL DEFAULT '10',
  `haslimit` int(11) NOT NULL DEFAULT '0',
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
(3, 1, 'https://treshkarah.qubwebs.com/', 1, 10, 0, -1, 14, 0, '2022-05-10 12:47:59', '2022-05-10 14:13:10'),
(4, 2, 'https://treshkarah.qubwebs.com/', 1, 10, 0, -1, 13, 0, '2022-05-10 13:56:42', '2022-05-10 20:22:29'),
(5, 2, 'https://rose-of-sharon-friendshipcircle.qubwebs.com/', 1, 10, 0, -1, 13, 0, '2022-05-10 14:01:58', '2022-05-10 19:56:05'),
(6, 2, 'https://charonsphere.qubwebs.com/', 1, 10, 0, -1, 18, 0, '2022-05-10 14:04:08', '2022-05-10 21:06:33'),
(7, 3, 'https://lovethchika.qubwebs.com', 1, 10, 0, -1, 8, 0, '2022-05-10 14:16:08', '2022-05-10 20:33:38'),
(8, 4, 'http://Lovethchika.qubwebs.com', 1, 10, 0, -1, 17, 0, '2022-05-10 14:44:51', '2022-05-10 21:28:29'),
(9, 4, 'http://RoseOfSharonFriendshipCircle.com', 1, 10, 0, -1, 23, 0, '2022-05-10 14:47:08', '2022-05-10 21:39:31'),
(10, 1, 'https://academyalert.qubwebs.com/', 1, 10, 0, -1, 0, 0, '2022-05-10 18:13:03', '2022-05-10 18:13:03'),
(11, 1, 'https://adaenjee.qubwebs.com/', 1, 10, 0, -1, 0, 0, '2022-05-10 18:14:06', '2022-05-10 18:14:06'),
(16, 1, 'https://webtraffic.live/', 3, 30, 1, 1000, 0, 0, '2022-05-11 06:21:12', '2022-05-11 06:21:12');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surfed_today`
--
ALTER TABLE `surfed_today`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_activities`
--
ALTER TABLE `user_activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `websites`
--
ALTER TABLE `websites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

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
