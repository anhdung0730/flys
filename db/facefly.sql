-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 01, 2019 at 01:47 PM
-- Server version: 5.7.24
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
-- Database: `facefly`
--

-- --------------------------------------------------------

--
-- Table structure for table `airplanes`
--

DROP TABLE IF EXISTS `airplanes`;
CREATE TABLE IF NOT EXISTS `airplanes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `airplane_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `airplanes`
--

INSERT INTO `airplanes` (`id`, `airplane_name`, `created_at`, `updated_at`) VALUES
(1, 'Vietnam Airlines', NULL, NULL),
(2, 'VietJet Air', NULL, NULL),
(3, 'Japan Airlines', NULL, NULL),
(4, 'Bamboo Airways', NULL, NULL),
(5, 'China Airways', NULL, NULL),
(6, 'American Airlines', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `airports`
--

DROP TABLE IF EXISTS `airports`;
CREATE TABLE IF NOT EXISTS `airports` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `airport_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `airport_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `airports`
--

INSERT INTO `airports` (`id`, `airport_name`, `airport_code`, `city_name`, `created_at`, `updated_at`) VALUES
(1, 'Noi Bai', 'HAN', 'Ha Noi', NULL, NULL),
(2, 'Tan Son Nhat', 'SGN', 'Ho Chi Minh City', NULL, NULL),
(3, 'Tokyo International Airport', 'HND', 'Tokyo', NULL, NULL),
(4, 'Hokaido Airport', 'HKO', 'Hokaido', NULL, NULL),
(5, 'Shanghai International Airport', 'SHI', 'Shanghai', NULL, NULL),
(6, 'Beijing International Airport', 'BEG', 'Beijing', NULL, NULL),
(7, 'Kennendy International Airport', 'KEN', 'New York', NULL, NULL),
(8, 'San Francisco International Airport', 'SAN', 'San Francisco', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`, `created_at`, `updated_at`) VALUES
(1, 'Viet Nam', NULL, NULL),
(2, 'Japan', NULL, NULL),
(3, 'China', NULL, NULL),
(4, 'America', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

DROP TABLE IF EXISTS `flights`;
CREATE TABLE IF NOT EXISTS `flights` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `flight_class_id` int(10) UNSIGNED NOT NULL,
  `flight_type` int(10) UNSIGNED NOT NULL,
  `flight_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flight_airplane_id` int(10) UNSIGNED NOT NULL,
  `flight_total_passenger` int(11) NOT NULL DEFAULT '0',
  `flight_cost` int(11) NOT NULL DEFAULT '0',
  `flight_airport_from_id` int(10) UNSIGNED NOT NULL,
  `flight_airport_to_id` int(10) UNSIGNED NOT NULL,
  `flight_departure_date` date DEFAULT NULL,
  `flight_return_date` date DEFAULT NULL,
  `flight_departure_time` datetime NOT NULL,
  `flight_arrival_time` datetime NOT NULL,
  `duration` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`id`, `flight_class_id`, `flight_type`, `flight_code`, `flight_airplane_id`, `flight_total_passenger`, `flight_cost`, `flight_airport_from_id`, `flight_airport_to_id`, `flight_departure_date`, `flight_return_date`, `flight_departure_time`, `flight_arrival_time`, `duration`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'MB001', 1, 100, 2500000, 1, 2, '2019-04-02', NULL, '2019-04-02 18:00:00', '2019-04-02 21:30:00', '03:30:00', NULL, NULL),
(2, 1, 1, 'MB002', 4, 150, 8000000, 1, 2, '2019-04-03', '2019-04-07', '2019-04-03 04:00:00', '2019-05-10 09:00:00', '05:00:00', NULL, NULL),
(3, 3, 1, 'MB003', 5, 200, 7500000, 1, 2, '2019-04-03', '2019-04-15', '2019-04-03 08:00:00', '2019-04-03 13:30:00', '05:30:00', NULL, NULL),
(4, 2, 1, 'MB004', 6, 300, 8000000, 1, 52, '2019-04-05', NULL, '2019-04-05 23:00:00', '2019-04-06 03:00:00', '04:00:00', NULL, NULL),
(5, 1, 1, 'MB005', 3, 599, 2500000, 1, 2, '2019-04-05', '2019-04-09', '2019-04-05 21:00:00', '2019-04-06 01:30:00', '04:30:00', NULL, NULL),
(6, 3, 1, 'MB006', 6, 300, 25000000, 1, 2, '2019-04-05', NULL, '2019-04-05 22:00:00', '2019-04-06 08:00:00', '10:00:00', NULL, NULL),
(7, 1, 1, 'MB007', 1, 100, 5000000, 1, 2, '2019-05-01', NULL, '2019-05-01 18:00:00', '2019-05-01 23:00:00', '05:00:00', NULL, NULL),
(8, 1, 2, 'MB008', 4, 150, 4500000, 2, 3, '2019-05-10', '2019-05-20', '2019-05-10 04:00:00', '2019-05-10 08:00:00', '04:00:00', NULL, NULL),
(9, 3, 2, 'MB009', 5, 200, 6000000, 2, 4, '2019-03-10', '2019-03-15', '2019-03-10 08:00:00', '2019-03-10 15:30:00', '07:30:00', NULL, NULL),
(10, 2, 1, 'MB010', 6, 300, 8000000, 2, 5, '2019-04-05', NULL, '2019-04-05 22:00:00', '2019-04-06 08:00:00', '10:00:00', NULL, NULL),
(11, 1, 2, 'MB011', 3, 599, 2500000, 2, 6, '2019-04-05', '2019-04-09', '2019-04-05 21:00:00', '2019-04-05 22:00:00', '02:00:00', NULL, NULL),
(12, 3, 1, 'MB012', 6, 300, 25000000, 2, 7, '2019-04-05', NULL, '2019-04-05 22:00:00', '2019-04-06 08:00:00', '10:00:00', NULL, NULL),
(13, 1, 1, 'MB013', 1, 100, 5000000, 3, 4, '2019-05-01', NULL, '2019-05-01 18:00:00', '2019-05-01 23:00:00', '05:00:00', NULL, NULL),
(14, 1, 2, 'MB014', 4, 150, 4500000, 5, 6, '2019-05-10', '2019-05-20', '2019-05-10 04:00:00', '2019-05-10 08:00:00', '04:00:00', NULL, NULL),
(15, 3, 2, 'MB015', 5, 200, 6000000, 7, 8, '2019-03-10', '2019-03-15', '2019-03-10 08:00:00', '2019-03-10 15:30:00', '07:30:00', NULL, NULL),
(16, 2, 1, 'MB016', 6, 300, 8000000, 3, 1, '2019-04-05', NULL, '2019-04-05 22:00:00', '2019-04-06 08:00:00', '10:00:00', NULL, NULL),
(17, 1, 2, 'MB016', 3, 599, 2500000, 3, 2, '2019-04-05', '2019-04-09', '2019-04-05 21:00:00', '2019-04-05 22:00:00', '02:00:00', NULL, NULL),
(18, 3, 1, 'MB018', 6, 300, 25000000, 5, 2, '2019-04-05', NULL, '2019-04-05 22:00:00', '2019-04-06 08:00:00', '10:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `flight_books`
--

DROP TABLE IF EXISTS `flight_books`;
CREATE TABLE IF NOT EXISTS `flight_books` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flight_classes`
--

DROP TABLE IF EXISTS `flight_classes`;
CREATE TABLE IF NOT EXISTS `flight_classes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `flight_class_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flight_classes`
--

INSERT INTO `flight_classes` (`id`, `flight_class_name`, `created_at`, `updated_at`) VALUES
(1, 'Economy', NULL, NULL),
(2, 'Business', NULL, NULL),
(3, 'Premium Economy', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=250 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(239, '2014_10_12_000000_create_users_table', 1),
(240, '2014_10_12_100000_create_password_resets_table', 1),
(241, '2019_03_06_024258_create_flights_table', 1),
(242, '2019_03_06_032825_create_flight_classes_table', 1),
(243, '2019_03_06_041007_create_airplanes_table', 1),
(244, '2019_03_06_041051_create_airports_table', 1),
(245, '2019_03_12_032612_create_countries_table', 1),
(246, '2019_03_13_061845_create_cities_table', 1),
(247, '2019_03_25_170306_create_passengers_table', 1),
(248, '2019_03_25_172027_create_payments_table', 1),
(249, '2019_03_25_172041_create_flight_books_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

DROP TABLE IF EXISTS `passengers`;
CREATE TABLE IF NOT EXISTS `passengers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `passenger_flight_book_id` int(10) UNSIGNED NOT NULL,
  `passenger_customer_id` int(10) UNSIGNED NOT NULL,
  `passenger_first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passenger_last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passenger_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `passengers_passenger_flight_book_id_foreign` (`passenger_flight_book_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `payment_flight_book_id` int(10) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_card_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_name_on_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_ccv_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_payment_flight_book_id_foreign` (`payment_flight_book_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `dob`, `gender`, `phone`, `address`, `isAdmin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Duy', 'duy@gmail.com', '$2y$10$vj4lpGQjRu1c1w7JZNdvo.HkUefVF7dSPeXwwz8FJw9hfvmZRiDQe', NULL, NULL, '1231231231', NULL, 1, NULL, NULL, NULL),
(2, 'Huy Duy', 'huyduy@gmail.com', '$2y$10$pT2S6WeA8h0dMzTb2bG2NeQWoXFObdmXSsX45gk.gCDjZnwnMz.xy', NULL, NULL, '1231231231', NULL, NULL, NULL, NULL, NULL),
(3, 'HD', 'hd@gmail.com', '$2y$10$WRYoodcM2PF79WaBpGdUiOwFC02jA77Z1EbkWxf2BY4uJxzAnUIvu', NULL, NULL, '1231231231', NULL, NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
