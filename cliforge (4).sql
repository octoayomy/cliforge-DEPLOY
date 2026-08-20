-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2026 at 06:00 PM
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
-- Database: `cliforge`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'Linux Server', 'Pembelajaran administrasi Linux Server', NULL, '2026-05-07 08:29:40', '2026-05-07 08:29:40');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `device_hash` varchar(255) NOT NULL,
  `hostname` varchar(255) DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `device_authorizations`
--

CREATE TABLE `device_authorizations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `device_code` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hostname` varchar(255) DEFAULT NULL,
  `device_hash` varchar(255) DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `expires_at` timestamp NULL DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `device_authorizations`
--

INSERT INTO `device_authorizations` (`id`, `device_code`, `user_id`, `hostname`, `device_hash`, `approved`, `expires_at`, `approved_at`, `created_at`, `updated_at`) VALUES
(1, '66XT-YURF', 1, 'DESKTOP-KIRANA', 'ABC123', 1, '2026-06-10 05:40:03', '2026-06-10 05:51:15', '2026-06-10 05:30:03', '2026-06-10 05:51:15'),
(2, 'PK4L-3LCF', 1, 'DESKTOP-KIRANA', 'DESKTOP-KIRANA-DESKTOP-KIRANA\\octoa', 1, '2026-06-10 16:01:50', '2026-06-10 15:55:06', '2026-06-10 15:51:50', '2026-06-10 15:55:06'),
(4, '6WDM-SNPC', 1, 'DESKTOP-KIRANA', 'DESKTOP-KIRANA-DESKTOP-KIRANA\\octoa', 1, '2026-06-10 16:24:23', '2026-06-10 16:18:38', '2026-06-10 16:14:23', '2026-06-10 16:18:38'),
(7, 'XT5C-VMOJ', 1, 'DESKTOP-KIRANA', 'DESKTOP-KIRANA-DESKTOP-KIRANA\\octoa', 1, '2026-06-10 16:34:27', '2026-06-10 16:25:02', '2026-06-10 16:24:27', '2026-06-10 16:25:02'),
(8, 'OS1V-9UFI', 1, 'vm-siswa', 'vm-siswa-root', 1, '2026-06-26 18:58:07', '2026-06-26 18:55:42', '2026-06-26 18:48:07', '2026-06-26 18:55:42'),
(9, 'MEYM-MDXY', 1, 'vm-siswa', 'vm-siswa-siswa', 1, '2026-06-26 19:17:52', '2026-06-26 19:08:24', '2026-06-26 19:07:52', '2026-06-26 19:08:24'),
(10, 'X7GT-BQXD', 1, 'vm-siswa', 'vm-siswa-siswa', 1, '2026-06-27 05:56:31', '2026-06-27 05:48:46', '2026-06-27 05:46:31', '2026-06-27 05:48:46'),
(11, '2OTN-PPZZ', 1, 'vm-siswa', 'vm-siswa-siswa', 1, '2026-06-27 06:44:34', '2026-06-27 06:34:59', '2026-06-27 06:34:34', '2026-06-27 06:34:59');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `labs`
--

CREATE TABLE `labs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `instruction` text DEFAULT NULL,
  `checker_script` varchar(255) DEFAULT NULL,
  `max_score` int(11) NOT NULL DEFAULT 100,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `labs`
--

INSERT INTO `labs` (`id`, `course_id`, `title`, `instruction`, `checker_script`, `max_score`, `created_at`, `updated_at`) VALUES
(1, 1, 'dns-basic', 'DNS Basic Lab', NULL, 100, '2026-06-27 02:59:59', '2026-06-27 02:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `lab_results`
--

CREATE TABLE `lab_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `lab_id` bigint(20) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `duration` int(11) DEFAULT NULL,
  `details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`details`)),
  `submitted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lab_results`
--

INSERT INTO `lab_results` (`id`, `user_id`, `lab_id`, `score`, `status`, `duration`, `details`, `submitted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 60, 'completed', NULL, NULL, '2026-06-27 03:01:22', '2026-06-27 03:01:22', '2026-06-27 03:01:22'),
(2, 1, 1, 90, 'completed', 180, '[{\"name\":\"Bind9 Service\",\"type\":\"service\",\"status\":\"PASS\",\"expected\":\"active\",\"actual\":\"active\",\"weight\":25,\"description\":\"Bind9 service must be running\",\"command\":null}]', '2026-06-27 12:29:10', '2026-06-27 05:29:11', '2026-06-27 05:29:11'),
(3, 1, 1, 60, 'failed', 0, '[{\"name\":\"Bind9 Service\",\"type\":\"service\",\"status\":\"PASS\",\"expected\":\"active\",\"actual\":\"active\",\"weight\":25,\"description\":\"Bind9 service must be running\",\"command\":null},{\"name\":\"named.conf.local\",\"type\":\"file\",\"status\":\"PASS\",\"expected\":\"-\",\"actual\":\"FOUND\",\"weight\":20,\"description\":\"Local DNS configuration file\",\"command\":null},{\"name\":\"Forward Zone File\",\"type\":\"file\",\"status\":\"FAIL\",\"expected\":\"-\",\"actual\":\"NOT FOUND\",\"weight\":20,\"description\":\"Forward zone database\",\"command\":null},{\"name\":\"DNS Port\",\"type\":\"port\",\"status\":\"PASS\",\"expected\":\"-\",\"actual\":\"OPEN\",\"weight\":15,\"description\":\"DNS service must listen on port 53\",\"command\":null},{\"name\":\"DNS Resolution\",\"type\":\"command\",\"status\":\"FAIL\",\"expected\":\"192.168.10.2\",\"actual\":\"-\",\"weight\":20,\"description\":\"Forward lookup must resolve correctly\",\"command\":null}]', '2026-06-27 12:49:06', '2026-06-27 05:49:06', '2026-06-27 05:49:06'),
(4, 1, 1, 60, 'failed', 0, '[{\"name\":\"Bind9 Service\",\"type\":\"service\",\"status\":\"PASS\",\"expected\":\"active\",\"actual\":\"active\",\"weight\":25,\"description\":\"Bind9 service must be running\",\"command\":null},{\"name\":\"named.conf.local\",\"type\":\"file\",\"status\":\"PASS\",\"expected\":\"-\",\"actual\":\"FOUND\",\"weight\":20,\"description\":\"Local DNS configuration file\",\"command\":null},{\"name\":\"Forward Zone File\",\"type\":\"file\",\"status\":\"FAIL\",\"expected\":\"-\",\"actual\":\"NOT FOUND\",\"weight\":20,\"description\":\"Forward zone database\",\"command\":null},{\"name\":\"DNS Port\",\"type\":\"port\",\"status\":\"PASS\",\"expected\":\"-\",\"actual\":\"OPEN\",\"weight\":15,\"description\":\"DNS service must listen on port 53\",\"command\":null},{\"name\":\"DNS Resolution\",\"type\":\"command\",\"status\":\"FAIL\",\"expected\":\"192.168.10.2\",\"actual\":\"-\",\"weight\":20,\"description\":\"Forward lookup must resolve correctly\",\"command\":null}]', '2026-06-27 13:59:47', '2026-06-27 06:59:47', '2026-06-27 06:59:47'),
(5, 1, 1, 60, 'failed', 0, '[{\"name\":\"Bind9 Service\",\"type\":\"service\",\"status\":\"PASS\",\"expected\":\"active\",\"actual\":\"active\",\"weight\":25,\"description\":\"Bind9 service must be running\",\"command\":null},{\"name\":\"named.conf.local\",\"type\":\"file\",\"status\":\"PASS\",\"expected\":\"-\",\"actual\":\"FOUND\",\"weight\":20,\"description\":\"Local DNS configuration file\",\"command\":null},{\"name\":\"Forward Zone File\",\"type\":\"file\",\"status\":\"FAIL\",\"expected\":\"-\",\"actual\":\"NOT FOUND\",\"weight\":20,\"description\":\"Forward zone database\",\"command\":null},{\"name\":\"DNS Port\",\"type\":\"port\",\"status\":\"PASS\",\"expected\":\"-\",\"actual\":\"OPEN\",\"weight\":15,\"description\":\"DNS service must listen on port 53\",\"command\":null},{\"name\":\"DNS Resolution\",\"type\":\"command\",\"status\":\"FAIL\",\"expected\":\"192.168.10.2\",\"actual\":\"-\",\"weight\":20,\"description\":\"Forward lookup must resolve correctly\",\"command\":null}]', '2026-06-27 14:00:00', '2026-06-27 06:59:59', '2026-06-27 06:59:59'),
(6, 1, 1, 60, 'failed', 0, '[{\"name\":\"Bind9 Service\",\"type\":\"service\",\"status\":\"PASS\",\"expected\":\"active\",\"actual\":\"active\",\"weight\":25,\"description\":\"Bind9 service must be running\",\"command\":null},{\"name\":\"named.conf.local\",\"type\":\"file\",\"status\":\"PASS\",\"expected\":\"-\",\"actual\":\"FOUND\",\"weight\":20,\"description\":\"Local DNS configuration file\",\"command\":null},{\"name\":\"Forward Zone File\",\"type\":\"file\",\"status\":\"FAIL\",\"expected\":\"-\",\"actual\":\"NOT FOUND\",\"weight\":20,\"description\":\"Forward zone database\",\"command\":null},{\"name\":\"DNS Port\",\"type\":\"port\",\"status\":\"PASS\",\"expected\":\"-\",\"actual\":\"OPEN\",\"weight\":15,\"description\":\"DNS service must listen on port 53\",\"command\":null},{\"name\":\"DNS Resolution\",\"type\":\"command\",\"status\":\"FAIL\",\"expected\":\"192.168.10.2\",\"actual\":\"-\",\"weight\":20,\"description\":\"Forward lookup must resolve correctly\",\"command\":null}]', '2026-06-27 14:01:58', '2026-06-27 07:01:58', '2026-06-27 07:01:58'),
(37, 2, 1, 70, 'failed', 75, NULL, '2026-06-25 13:10:19', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(38, 2, 1, 75, 'passed', 188, NULL, '2026-06-26 13:38:19', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(39, 2, 1, 80, 'passed', 197, NULL, '2026-06-22 12:41:19', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(40, 3, 1, 75, 'passed', 177, NULL, '2026-06-24 16:27:19', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(41, 3, 1, 80, 'passed', 131, NULL, '2026-06-27 15:50:19', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(42, 3, 1, 85, 'passed', 98, NULL, '2026-06-25 13:40:19', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(43, 4, 1, 80, 'passed', 175, NULL, '2026-06-26 12:32:19', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(44, 4, 1, 85, 'passed', 99, NULL, '2026-06-24 14:45:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(45, 4, 1, 90, 'passed', 193, NULL, '2026-06-25 16:21:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(46, 5, 1, 85, 'passed', 119, NULL, '2026-06-27 14:58:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(47, 5, 1, 90, 'passed', 126, NULL, '2026-06-23 13:58:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(48, 5, 1, 95, 'passed', 104, NULL, '2026-06-26 15:47:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(49, 6, 1, 90, 'passed', 157, NULL, '2026-06-24 14:33:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(50, 6, 1, 95, 'passed', 166, NULL, '2026-06-25 16:01:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(51, 6, 1, 100, 'passed', 182, NULL, '2026-06-23 15:46:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(52, 7, 1, 95, 'passed', 219, NULL, '2026-06-26 17:08:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(53, 7, 1, 100, 'passed', 160, NULL, '2026-06-26 15:57:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(54, 7, 1, 60, 'failed', 232, NULL, '2026-06-23 14:13:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(55, 8, 1, 100, 'passed', 104, NULL, '2026-06-21 16:22:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(56, 8, 1, 60, 'failed', 116, NULL, '2026-06-23 13:32:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(57, 8, 1, 70, 'failed', 75, NULL, '2026-06-24 17:05:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(58, 9, 1, 60, 'failed', 146, NULL, '2026-06-26 13:03:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(59, 9, 1, 70, 'failed', 154, NULL, '2026-06-22 12:58:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(60, 9, 1, 75, 'passed', 113, NULL, '2026-06-26 16:49:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(61, 10, 1, 70, 'failed', 115, NULL, '2026-06-26 12:24:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(62, 10, 1, 75, 'passed', 220, NULL, '2026-06-27 16:44:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(63, 10, 1, 80, 'passed', 196, NULL, '2026-06-27 13:35:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(64, 11, 1, 75, 'passed', 194, NULL, '2026-06-24 15:57:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(65, 11, 1, 80, 'passed', 119, NULL, '2026-06-22 12:48:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(66, 11, 1, 85, 'passed', 173, NULL, '2026-06-27 14:13:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(67, 12, 1, 80, 'passed', 137, NULL, '2026-06-21 14:33:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(68, 12, 1, 85, 'passed', 111, NULL, '2026-06-24 15:56:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(69, 12, 1, 90, 'passed', 98, NULL, '2026-06-25 15:59:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(70, 13, 1, 85, 'passed', 115, NULL, '2026-06-22 17:07:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(71, 13, 1, 90, 'passed', 160, NULL, '2026-06-24 14:24:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(72, 13, 1, 95, 'passed', 104, NULL, '2026-06-22 16:25:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(73, 14, 1, 90, 'passed', 176, NULL, '2026-06-23 16:50:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(74, 14, 1, 95, 'passed', 86, NULL, '2026-06-27 14:58:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(75, 14, 1, 100, 'passed', 226, NULL, '2026-06-23 14:52:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(76, 15, 1, 95, 'passed', 80, NULL, '2026-06-26 17:18:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(77, 15, 1, 100, 'passed', 157, NULL, '2026-06-22 15:06:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(78, 15, 1, 60, 'failed', 120, NULL, '2026-06-26 12:56:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(79, 16, 1, 100, 'passed', 91, NULL, '2026-06-25 13:43:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(80, 16, 1, 60, 'failed', 209, NULL, '2026-06-27 15:44:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(81, 16, 1, 70, 'failed', 147, NULL, '2026-06-21 15:51:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(82, 17, 1, 60, 'failed', 234, NULL, '2026-06-24 14:20:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(83, 17, 1, 70, 'failed', 123, NULL, '2026-06-22 13:20:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(84, 17, 1, 75, 'passed', 152, NULL, '2026-06-23 13:16:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(85, 18, 1, 70, 'failed', 117, NULL, '2026-06-22 12:44:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(86, 18, 1, 75, 'passed', 204, NULL, '2026-06-25 16:36:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(87, 18, 1, 80, 'passed', 176, NULL, '2026-06-25 14:05:20', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(88, 1, 1, 60, 'failed', NULL, '[{\"name\":\"Bind9 Service\",\"type\":\"service\",\"status\":\"PASS\",\"expected\":\"active\",\"actual\":\"active\",\"weight\":25,\"description\":\"Bind9 service must be running\",\"command\":null},{\"name\":\"named.conf.local\",\"type\":\"file\",\"status\":\"PASS\",\"expected\":\"-\",\"actual\":\"FOUND\",\"weight\":20,\"description\":\"Local DNS configuration file\",\"command\":null},{\"name\":\"Forward Zone File\",\"type\":\"file\",\"status\":\"FAIL\",\"expected\":\"-\",\"actual\":\"NOT FOUND\",\"weight\":20,\"description\":\"Forward zone database\",\"command\":null},{\"name\":\"DNS Port\",\"type\":\"port\",\"status\":\"PASS\",\"expected\":\"-\",\"actual\":\"OPEN\",\"weight\":15,\"description\":\"DNS service must listen on port 53\",\"command\":null},{\"name\":\"DNS Resolution\",\"type\":\"command\",\"status\":\"FAIL\",\"expected\":\"192.168.10.2\",\"actual\":\"-\",\"weight\":20,\"description\":\"Forward lookup must resolve correctly\",\"command\":null}]', '2026-06-27 14:01:58', '2026-06-27 17:44:06', '2026-06-27 17:44:06'),
(89, 1, 1, 60, 'failed', 0, '[{\"name\":\"Bind9 Service\",\"type\":\"service\",\"status\":\"PASS\",\"expected\":\"active\",\"actual\":\"active\",\"weight\":25,\"description\":\"Bind9 service must be running\",\"command\":null},{\"name\":\"named.conf.local\",\"type\":\"file\",\"status\":\"PASS\",\"expected\":\"-\",\"actual\":\"FOUND\",\"weight\":20,\"description\":\"Local DNS configuration file\",\"command\":null},{\"name\":\"Forward Zone File\",\"type\":\"file\",\"status\":\"FAIL\",\"expected\":\"-\",\"actual\":\"NOT FOUND\",\"weight\":20,\"description\":\"Forward zone database\",\"command\":null},{\"name\":\"DNS Port\",\"type\":\"port\",\"status\":\"PASS\",\"expected\":\"-\",\"actual\":\"OPEN\",\"weight\":15,\"description\":\"DNS service must listen on port 53\",\"command\":null},{\"name\":\"DNS Resolution\",\"type\":\"command\",\"status\":\"FAIL\",\"expected\":\"192.168.10.2\",\"actual\":\"-\",\"weight\":20,\"description\":\"Forward lookup must resolve correctly\",\"command\":null}]', '2026-06-28 00:44:23', '2026-06-27 17:44:23', '2026-06-27 17:44:23');

-- --------------------------------------------------------

--
-- Table structure for table `lab_result_details`
--

CREATE TABLE `lab_result_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lab_result_id` bigint(20) UNSIGNED NOT NULL,
  `rule_name` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'UNKNOWN',
  `expected` text DEFAULT NULL,
  `actual` text DEFAULT NULL,
  `weight` int(11) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `command` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lab_result_details`
--

INSERT INTO `lab_result_details` (`id`, `lab_result_id`, `rule_name`, `type`, `status`, `expected`, `actual`, `weight`, `description`, `command`, `created_at`, `updated_at`) VALUES
(166, 37, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(167, 37, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(168, 37, 'Forward Zone File', 'file', 'FAIL', 'FOUND', 'NOT FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(169, 37, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(170, 37, 'DNS Resolution', 'command', 'FAIL', '192.168.10.2', '-', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(171, 38, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(172, 38, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(173, 38, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(174, 38, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(175, 38, 'DNS Resolution', 'command', 'PASS', '192.168.10.2', '192.168.10.2', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(176, 39, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(177, 39, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(178, 39, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(179, 39, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(180, 39, 'DNS Resolution', 'command', 'PASS', '192.168.10.2', '192.168.10.2', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(181, 40, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(182, 40, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(183, 40, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(184, 40, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(185, 40, 'DNS Resolution', 'command', 'FAIL', '192.168.10.2', '-', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(186, 41, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(187, 41, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(188, 41, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(189, 41, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(190, 41, 'DNS Resolution', 'command', 'PASS', '192.168.10.2', '192.168.10.2', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(191, 42, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(192, 42, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(193, 42, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(194, 42, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(195, 42, 'DNS Resolution', 'command', 'PASS', '192.168.10.2', '192.168.10.2', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(196, 43, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(197, 43, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(198, 43, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(199, 43, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(200, 43, 'DNS Resolution', 'command', 'FAIL', '192.168.10.2', '-', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(201, 44, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(202, 44, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(203, 44, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(204, 44, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(205, 44, 'DNS Resolution', 'command', 'PASS', '192.168.10.2', '192.168.10.2', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(206, 45, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(207, 45, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(208, 45, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(209, 45, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(210, 45, 'DNS Resolution', 'command', 'PASS', '192.168.10.2', '192.168.10.2', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(211, 46, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(212, 46, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(213, 46, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(214, 46, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(215, 46, 'DNS Resolution', 'command', 'FAIL', '192.168.10.2', '-', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(216, 47, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(217, 47, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(218, 47, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(219, 47, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(220, 47, 'DNS Resolution', 'command', 'PASS', '192.168.10.2', '192.168.10.2', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(221, 48, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(222, 48, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(223, 48, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(224, 48, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(225, 48, 'DNS Resolution', 'command', 'PASS', '192.168.10.2', '192.168.10.2', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(226, 49, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(227, 49, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(228, 49, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(229, 49, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(230, 49, 'DNS Resolution', 'command', 'PASS', '192.168.10.2', '192.168.10.2', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(231, 50, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(232, 50, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(233, 50, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(234, 50, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(235, 50, 'DNS Resolution', 'command', 'PASS', '192.168.10.2', '192.168.10.2', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(236, 51, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(237, 51, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(238, 51, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(239, 51, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(240, 51, 'DNS Resolution', 'command', 'PASS', '192.168.10.2', '192.168.10.2', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(241, 52, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(242, 52, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(243, 52, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(244, 52, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(245, 52, 'DNS Resolution', 'command', 'PASS', '192.168.10.2', '192.168.10.2', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(246, 53, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(247, 53, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(248, 53, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(249, 53, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(250, 53, 'DNS Resolution', 'command', 'PASS', '192.168.10.2', '192.168.10.2', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(251, 54, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(252, 54, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(253, 54, 'Forward Zone File', 'file', 'FAIL', 'FOUND', 'NOT FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(254, 54, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(255, 54, 'DNS Resolution', 'command', 'FAIL', '192.168.10.2', '-', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(256, 55, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(257, 55, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(258, 55, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(259, 55, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(260, 55, 'DNS Resolution', 'command', 'PASS', '192.168.10.2', '192.168.10.2', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(261, 56, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(262, 56, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(263, 56, 'Forward Zone File', 'file', 'FAIL', 'FOUND', 'NOT FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(264, 56, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(265, 56, 'DNS Resolution', 'command', 'FAIL', '192.168.10.2', '-', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(266, 57, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(267, 57, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(268, 57, 'Forward Zone File', 'file', 'FAIL', 'FOUND', 'NOT FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(269, 57, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(270, 57, 'DNS Resolution', 'command', 'FAIL', '192.168.10.2', '-', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(271, 58, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(272, 58, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(273, 58, 'Forward Zone File', 'file', 'FAIL', 'FOUND', 'NOT FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(274, 58, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(275, 58, 'DNS Resolution', 'command', 'FAIL', '192.168.10.2', '-', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(276, 59, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(277, 59, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(278, 59, 'Forward Zone File', 'file', 'FAIL', 'FOUND', 'NOT FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(279, 59, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(280, 59, 'DNS Resolution', 'command', 'FAIL', '192.168.10.2', '-', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(281, 60, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(282, 60, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(283, 60, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(284, 60, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(285, 60, 'DNS Resolution', 'command', 'PASS', '192.168.10.2', '192.168.10.2', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(286, 61, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(287, 61, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(288, 61, 'Forward Zone File', 'file', 'FAIL', 'FOUND', 'NOT FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(289, 61, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(290, 61, 'DNS Resolution', 'command', 'FAIL', '192.168.10.2', '-', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(291, 62, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(292, 62, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(293, 62, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(294, 62, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(295, 62, 'DNS Resolution', 'command', 'PASS', '192.168.10.2', '192.168.10.2', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(296, 63, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(297, 63, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(298, 63, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(299, 63, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(300, 63, 'DNS Resolution', 'command', 'PASS', '192.168.10.2', '192.168.10.2', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(301, 64, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(302, 64, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(303, 64, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(304, 64, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(305, 64, 'DNS Resolution', 'command', 'FAIL', '192.168.10.2', '-', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(306, 65, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(307, 65, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(308, 65, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(309, 65, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(310, 65, 'DNS Resolution', 'command', 'PASS', '192.168.10.2', '192.168.10.2', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(311, 66, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(312, 66, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(313, 66, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(314, 66, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(315, 66, 'DNS Resolution', 'command', 'PASS', '192.168.10.2', '192.168.10.2', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(316, 67, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(317, 67, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(318, 67, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(319, 67, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(320, 67, 'DNS Resolution', 'command', 'FAIL', '192.168.10.2', '-', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(321, 68, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(322, 68, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(323, 68, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(324, 68, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(325, 68, 'DNS Resolution', 'command', 'PASS', '192.168.10.2', '192.168.10.2', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(326, 69, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(327, 69, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(328, 69, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(329, 69, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(330, 69, 'DNS Resolution', 'command', 'PASS', '192.168.10.2', '192.168.10.2', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(331, 70, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(332, 70, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(333, 70, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(334, 70, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(335, 70, 'DNS Resolution', 'command', 'FAIL', '192.168.10.2', '-', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(336, 71, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(337, 71, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(338, 71, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(339, 71, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(340, 71, 'DNS Resolution', 'command', 'PASS', '192.168.10.2', '192.168.10.2', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(341, 72, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(342, 72, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(343, 72, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(344, 72, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(345, 72, 'DNS Resolution', 'command', 'PASS', '192.168.10.2', '192.168.10.2', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(346, 73, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(347, 73, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(348, 73, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(349, 73, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(350, 73, 'DNS Resolution', 'command', 'PASS', '192.168.10.2', '192.168.10.2', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(351, 74, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(352, 74, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(353, 74, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(354, 74, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(355, 74, 'DNS Resolution', 'command', 'PASS', '192.168.10.2', '192.168.10.2', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(356, 75, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(357, 75, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(358, 75, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(359, 75, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(360, 75, 'DNS Resolution', 'command', 'PASS', '192.168.10.2', '192.168.10.2', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(361, 76, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(362, 76, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(363, 76, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(364, 76, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(365, 76, 'DNS Resolution', 'command', 'PASS', '192.168.10.2', '192.168.10.2', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(366, 77, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(367, 77, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(368, 77, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(369, 77, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(370, 77, 'DNS Resolution', 'command', 'PASS', '192.168.10.2', '192.168.10.2', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(371, 78, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(372, 78, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(373, 78, 'Forward Zone File', 'file', 'FAIL', 'FOUND', 'NOT FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(374, 78, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(375, 78, 'DNS Resolution', 'command', 'FAIL', '192.168.10.2', '-', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(376, 79, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(377, 79, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(378, 79, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(379, 79, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(380, 79, 'DNS Resolution', 'command', 'PASS', '192.168.10.2', '192.168.10.2', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(381, 80, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(382, 80, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(383, 80, 'Forward Zone File', 'file', 'FAIL', 'FOUND', 'NOT FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(384, 80, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(385, 80, 'DNS Resolution', 'command', 'FAIL', '192.168.10.2', '-', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(386, 81, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(387, 81, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(388, 81, 'Forward Zone File', 'file', 'FAIL', 'FOUND', 'NOT FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(389, 81, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(390, 81, 'DNS Resolution', 'command', 'FAIL', '192.168.10.2', '-', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(391, 82, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(392, 82, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(393, 82, 'Forward Zone File', 'file', 'FAIL', 'FOUND', 'NOT FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(394, 82, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(395, 82, 'DNS Resolution', 'command', 'FAIL', '192.168.10.2', '-', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(396, 83, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(397, 83, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(398, 83, 'Forward Zone File', 'file', 'FAIL', 'FOUND', 'NOT FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(399, 83, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(400, 83, 'DNS Resolution', 'command', 'FAIL', '192.168.10.2', '-', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(401, 84, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(402, 84, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(403, 84, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(404, 84, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(405, 84, 'DNS Resolution', 'command', 'PASS', '192.168.10.2', '192.168.10.2', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(406, 85, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(407, 85, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(408, 85, 'Forward Zone File', 'file', 'FAIL', 'FOUND', 'NOT FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(409, 85, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(410, 85, 'DNS Resolution', 'command', 'FAIL', '192.168.10.2', '-', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(411, 86, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(412, 86, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(413, 86, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(414, 86, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(415, 86, 'DNS Resolution', 'command', 'PASS', '192.168.10.2', '192.168.10.2', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(416, 87, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Demo validation rule for Bind9 Service', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(417, 87, 'named.conf.local', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for named.conf.local', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(418, 87, 'Forward Zone File', 'file', 'PASS', 'FOUND', 'FOUND', 20, 'Demo validation rule for Forward Zone File', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(419, 87, 'DNS Port', 'port', 'PASS', 'OPEN', 'OPEN', 15, 'Demo validation rule for DNS Port', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(420, 87, 'DNS Resolution', 'command', 'PASS', '192.168.10.2', '192.168.10.2', 20, 'Demo validation rule for DNS Resolution', NULL, '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(421, 88, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Bind9 service must be running', NULL, '2026-06-27 17:44:06', '2026-06-27 17:44:06'),
(422, 88, 'named.conf.local', 'file', 'PASS', '-', 'FOUND', 20, 'Local DNS configuration file', NULL, '2026-06-27 17:44:06', '2026-06-27 17:44:06'),
(423, 88, 'Forward Zone File', 'file', 'FAIL', '-', 'NOT FOUND', 20, 'Forward zone database', NULL, '2026-06-27 17:44:06', '2026-06-27 17:44:06'),
(424, 88, 'DNS Port', 'port', 'PASS', '-', 'OPEN', 15, 'DNS service must listen on port 53', NULL, '2026-06-27 17:44:06', '2026-06-27 17:44:06'),
(425, 88, 'DNS Resolution', 'command', 'FAIL', '192.168.10.2', '-', 20, 'Forward lookup must resolve correctly', NULL, '2026-06-27 17:44:06', '2026-06-27 17:44:06'),
(426, 89, 'Bind9 Service', 'service', 'PASS', 'active', 'active', 25, 'Bind9 service must be running', NULL, '2026-06-27 17:44:23', '2026-06-27 17:44:23'),
(427, 89, 'named.conf.local', 'file', 'PASS', '-', 'FOUND', 20, 'Local DNS configuration file', NULL, '2026-06-27 17:44:23', '2026-06-27 17:44:23'),
(428, 89, 'Forward Zone File', 'file', 'FAIL', '-', 'NOT FOUND', 20, 'Forward zone database', NULL, '2026-06-27 17:44:23', '2026-06-27 17:44:23'),
(429, 89, 'DNS Port', 'port', 'PASS', '-', 'OPEN', 15, 'DNS service must listen on port 53', NULL, '2026-06-27 17:44:23', '2026-06-27 17:44:23'),
(430, 89, 'DNS Resolution', 'command', 'FAIL', '192.168.10.2', '-', 20, 'Forward lookup must resolve correctly', NULL, '2026-06-27 17:44:23', '2026-06-27 17:44:23');

-- --------------------------------------------------------

--
-- Table structure for table `lab_tokens`
--

CREATE TABLE `lab_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) NOT NULL,
  `hostname` varchar(255) DEFAULT NULL,
  `machine_id` varchar(255) DEFAULT NULL,
  `used` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` enum('theory','lab','quiz') NOT NULL,
  `content` text DEFAULT NULL,
  `duration` int(11) NOT NULL DEFAULT 10,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `checker_command` varchar(255) DEFAULT NULL,
  `checker_expected` varchar(255) DEFAULT NULL,
  `lab_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `section_id`, `title`, `type`, `content`, `duration`, `order`, `created_at`, `updated_at`, `checker_command`, `checker_expected`, `lab_type`) VALUES
(1, 1, 'Intro DNS', 'theory', 'Materi pengenalan DNS', 15, 1, '2026-05-07 08:29:40', '2026-05-07 08:29:40', NULL, NULL, NULL),
(2, 1, 'DNS Lab', 'lab', 'Praktikum konfigurasi DNS Server', 45, 2, '2026-05-07 08:29:40', '2026-05-07 08:29:40', 'dig itsna.net', '192.168.1.10', NULL),
(3, 1, 'DNS Quiz', 'quiz', 'Quiz DNS', 10, 3, '2026-05-07 08:29:40', '2026-05-07 08:29:40', NULL, NULL, NULL),
(4, 2, 'Intro Apache', 'theory', 'Materi pengenalan Apache Web Server', 25, 1, '2026-05-07 08:29:40', '2026-05-07 08:37:45', NULL, NULL, NULL),
(5, 2, 'Apache Lab', 'lab', 'Praktikum konfigurasi Apache Web Server', 45, 2, '2026-05-07 08:29:40', '2026-05-07 08:29:40', 'curl localhost', 'Apache2 Ubuntu Default Page', NULL),
(6, 2, 'Apache Quiz', 'quiz', 'Quiz Apache', 10, 3, '2026-05-07 08:29:40', '2026-05-07 08:29:40', NULL, NULL, NULL),
(7, 3, 'Intro DHCP', 'theory', 'Materi pengenalan DHCP Server', 15, 1, '2026-05-07 08:55:03', '2026-05-07 08:55:03', NULL, NULL, NULL),
(8, 3, 'DHCP Lab', 'lab', 'Praktikum konfigurasi DHCP Server', 45, 2, '2026-05-07 08:55:44', '2026-05-07 08:55:44', 'systemctl status isc-dhcp-server', 'active (running)', NULL),
(9, 3, 'DHCP Quiz', 'quiz', 'Quiz DHCP', 10, 3, '2026-05-07 08:56:10', '2026-05-07 08:56:10', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_05_06_143617_add_role_to_users_table', 1),
(5, '2026_05_06_143807_create_devices_table', 1),
(6, '2026_05_06_143943_create_courses_table', 1),
(7, '2026_05_06_144033_create_materials_table', 1),
(8, '2026_05_06_144157_create_labs_table', 1),
(9, '2026_05_06_144249_create_lab_results_table', 1),
(10, '2026_05_07_120403_create_sections_table', 1),
(11, '2026_05_07_121115_create_lessons_table', 1),
(12, '2026_05_07_143613_create_progress_table', 1),
(13, '2026_05_07_150947_add_checker_fields_to_lessons_table', 1),
(14, '2026_05_07_153843_add_lab_type_to_lessons_table', 2),
(15, '2026_05_13_051632_create_lab_tokens_table', 3),
(16, '2026_06_10_122152_create_device_authorizations_table', 4),
(17, '2026_06_27_122325_add_details_column_to_lab_results_table', 5),
(18, '2026_06_27_135616_create_lab_result_details_table', 6),
(19, '2026_06_27_233207_create_validator_calibrations_table', 7);

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
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL DEFAULT 0,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `course_id`, `title`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, 'DNS', 0, '2026-05-07 08:29:40', '2026-05-07 08:29:40'),
(2, 1, 'Web Server', 0, '2026-05-07 08:29:40', '2026-05-07 08:29:40'),
(3, 1, 'DHCP', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('JHVbpJvHitPVveHBxZz4T0ctF0MkRw2mTi3zzjw2', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidTBrNVNZQ1Iydm15WFRQNER0clZzNEtKbmNWM2ZTM3hTNE5UdHh0OSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1782606395);

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'admin', 'admin@tkj.local', NULL, '$2y$12$QnFhEAPPe63Hwe4DoNpykeiAlLTwVDC/VgQ6UBME9Gy6rEossw67y', 'Re2vNcaV158PpTWwbahdUtaHXQNq2dEqwGvjGENuGoZ39PacTwBztpG7rLRJ', '2026-05-07 08:29:40', '2026-06-27 04:33:10', 'admin'),
(2, 'Ahmad Fauzi', 'ahmad.fauzi@cliforge.test', NULL, '$2y$12$sbJPSdbB3dIMg5EWjEEIFecmii3n4uFrh5TmopXqdK12r3oi2/mkO', NULL, '2026-06-27 07:40:11', '2026-06-27 17:24:18', 'student'),
(3, 'Muhammad Rizky', 'muhammad.rizky@cliforge.test', NULL, '$2y$12$GE4hdqU1CYP3h02QT5ulSuAHzoO7ExxnX02ukwwxFthc4xsmAw23W', NULL, '2026-06-27 07:40:11', '2026-06-27 07:40:11', 'student'),
(4, 'Dimas Pratama', 'dimas.pratama@cliforge.test', NULL, '$2y$12$DHGgPq4Jw4r0ujlK4cQYhuXrZIzcX06QXDaF/OsoJ8E5bv5hl6H9O', '5H2EDhAWvXfDXOKuy8yFR954Pf6zKoU6GaUtHePuh7xnj6Y94vB9altmgMKk', '2026-06-27 07:40:11', '2026-06-27 17:24:18', 'student'),
(5, 'Fajar Nugroho', 'fajar.nugroho@cliforge.test', NULL, '$2y$12$sosw4lKLF5h3mRbDgF.dz.401sD8ZTZUxGuQZBXkbMK1eEDzXDd3C', NULL, '2026-06-27 07:40:12', '2026-06-27 17:24:19', 'student'),
(6, 'Bagas Saputra', 'bagas.saputra@cliforge.test', NULL, '$2y$12$4eu2ZsAZBiQZxpmEPjak6usaTUxt3QxRNdV4CpbpVklF0ZuwuvzfW', NULL, '2026-06-27 07:40:12', '2026-06-27 07:40:12', 'student'),
(7, 'Andika Putra', 'andika.putra@cliforge.test', NULL, '$2y$12$NzXlSHbtSVWpO2iJXzVxveZpnjNdfb5xZW66F6QeE2yNrUCReXOli', NULL, '2026-06-27 07:40:12', '2026-06-27 07:40:12', 'student'),
(8, 'Rizal Hidayat', 'rizal.hidayat@cliforge.test', NULL, '$2y$12$h4PetfZXgt83pMmpp5Ymy.K4FAepkeQ.1TzEK0xa40/H.LhSgKOqC', NULL, '2026-06-27 07:40:12', '2026-06-27 07:40:12', 'student'),
(9, 'Naufal Ramadhan', 'naufal.ramadhan@cliforge.test', NULL, '$2y$12$RZ.nzR7VMlnsNxVuNRqaZuSJdDZtssoSQKYCHReDvxtEjV/pRtAGW', NULL, '2026-06-27 07:40:12', '2026-06-27 07:40:12', 'student'),
(10, 'Farhan Maulana', 'farhan.maulana@cliforge.test', NULL, '$2y$12$0XNd.0A8wccbgKnviwPE9OSTp37q.MV8lLtO.8GVp6eWS/8lx/Sta', NULL, '2026-06-27 07:40:13', '2026-06-27 07:40:13', 'student'),
(11, 'Aldi Kurniawan', 'aldi.kurniawan@cliforge.test', NULL, '$2y$12$m20dhz6arHBVhgHr2Lld6uuj3C2BzSDg6iFAZ2gj3tCCL0YB5x9.C', NULL, '2026-06-27 07:40:13', '2026-06-27 07:40:13', 'student'),
(12, 'Budi Santoso', 'budi.santoso@cliforge.test', NULL, '$2y$12$I1qX7VurMCHWmfaQYeyix.rcibfRpHqkHzD/yzGbklnQjJXEbxHea', NULL, '2026-06-27 17:24:18', '2026-06-27 17:24:18', 'student'),
(13, 'Citra Lestari', 'citra.lestari@cliforge.test', NULL, '$2y$12$Pkhy99RsHkSLsoDkz27sIeA/8OYrprrrelTjY4TwiRs3DKl7x8cbO', NULL, '2026-06-27 17:24:18', '2026-06-27 17:24:18', 'student'),
(14, 'Eka Saputra', 'eka.saputra@cliforge.test', NULL, '$2y$12$lHGNrqzsXn6.fxE0mpBSh.U0yJJxiE36ryoECkslqxE8vkTqIateG', NULL, '2026-06-27 17:24:18', '2026-06-27 17:24:18', 'student'),
(15, 'Gilang Ramadhan', 'gilang.ramadhan@cliforge.test', NULL, '$2y$12$fg4fWzZklXwMGVb34nj7NeGpFQyGBsNBA/dMDwkq4N/zyrOBnhdH2', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19', 'student'),
(16, 'Hana Putri', 'hana.putri@cliforge.test', NULL, '$2y$12$/BxzwAhVLGVWd/RFAa.hZei00Sgx3c15E6DQb0ImSnBSSQYAf.oTO', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19', 'student'),
(17, 'Intan Permata', 'intan.permata@cliforge.test', NULL, '$2y$12$N4F4qaMYMg2NkyP15PPLf.Q1dnMfKFMW3GE/mpdS8cNM53ZqN4Oee', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19', 'student'),
(18, 'Joko Prasetyo', 'joko.prasetyo@cliforge.test', NULL, '$2y$12$56YoiNvSvI.OVU.hPZLWyuGEZbZnxx1oGxJKOggLs628eQCL4aDuy', NULL, '2026-06-27 17:24:19', '2026-06-27 17:24:19', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `validator_calibrations`
--

CREATE TABLE `validator_calibrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lab_result_id` bigint(20) UNSIGNED NOT NULL,
  `rule_name` varchar(255) NOT NULL,
  `teacher_decision` varchar(255) NOT NULL,
  `agent_decision` varchar(255) NOT NULL,
  `is_agreement` tinyint(1) NOT NULL DEFAULT 0,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `validator_calibrations`
--

INSERT INTO `validator_calibrations` (`id`, `lab_result_id`, `rule_name`, `teacher_decision`, `agent_decision`, `is_agreement`, `note`, `created_at`, `updated_at`) VALUES
(11, 37, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(12, 37, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(13, 37, 'Forward Zone File', 'FAIL', 'FAIL', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(14, 37, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(15, 37, 'DNS Resolution', 'FAIL', 'FAIL', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(16, 38, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(17, 38, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(18, 38, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(19, 38, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(20, 38, 'DNS Resolution', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(21, 39, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(22, 39, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(23, 39, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(24, 39, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(25, 39, 'DNS Resolution', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(26, 40, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(27, 40, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(28, 40, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(29, 40, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(30, 40, 'DNS Resolution', 'FAIL', 'FAIL', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(31, 41, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(32, 41, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(33, 41, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(34, 41, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(35, 41, 'DNS Resolution', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(36, 42, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(37, 42, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(38, 42, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(39, 42, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(40, 42, 'DNS Resolution', 'FAIL', 'PASS', 0, 'Perlu peninjauan rule validator.', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(41, 43, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(42, 43, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:19', '2026-06-27 17:24:19'),
(43, 43, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(44, 43, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(45, 43, 'DNS Resolution', 'FAIL', 'FAIL', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(46, 44, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(47, 44, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(48, 44, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(49, 44, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(50, 44, 'DNS Resolution', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(51, 45, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(52, 45, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(53, 45, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(54, 45, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(55, 45, 'DNS Resolution', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(56, 46, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(57, 46, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(58, 46, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(59, 46, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(60, 46, 'DNS Resolution', 'FAIL', 'FAIL', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(61, 47, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(62, 47, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(63, 47, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(64, 47, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(65, 47, 'DNS Resolution', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(66, 48, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(67, 48, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(68, 48, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(69, 48, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(70, 48, 'DNS Resolution', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(71, 49, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(72, 49, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(73, 49, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(74, 49, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(75, 49, 'DNS Resolution', 'FAIL', 'PASS', 0, 'Perlu peninjauan rule validator.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(76, 50, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(77, 50, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(78, 50, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(79, 50, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(80, 50, 'DNS Resolution', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(81, 51, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(82, 51, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(83, 51, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(84, 51, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(85, 51, 'DNS Resolution', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(86, 52, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(87, 52, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(88, 52, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(89, 52, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(90, 52, 'DNS Resolution', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(91, 53, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(92, 53, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(93, 53, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(94, 53, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(95, 53, 'DNS Resolution', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(96, 54, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(97, 54, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(98, 54, 'Forward Zone File', 'FAIL', 'FAIL', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(99, 54, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(100, 54, 'DNS Resolution', 'FAIL', 'FAIL', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(101, 55, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(102, 55, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(103, 55, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(104, 55, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(105, 55, 'DNS Resolution', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(106, 56, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(107, 56, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(108, 56, 'Forward Zone File', 'FAIL', 'FAIL', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(109, 56, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(110, 56, 'DNS Resolution', 'PASS', 'FAIL', 0, 'Perlu peninjauan rule validator.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(111, 57, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(112, 57, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(113, 57, 'Forward Zone File', 'FAIL', 'FAIL', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(114, 57, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(115, 57, 'DNS Resolution', 'FAIL', 'FAIL', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(116, 58, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(117, 58, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(118, 58, 'Forward Zone File', 'FAIL', 'FAIL', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(119, 58, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(120, 58, 'DNS Resolution', 'FAIL', 'FAIL', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(121, 59, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(122, 59, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(123, 59, 'Forward Zone File', 'FAIL', 'FAIL', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(124, 59, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(125, 59, 'DNS Resolution', 'FAIL', 'FAIL', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(126, 60, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(127, 60, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(128, 60, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(129, 60, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(130, 60, 'DNS Resolution', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(131, 61, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(132, 61, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(133, 61, 'Forward Zone File', 'FAIL', 'FAIL', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(134, 61, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(135, 61, 'DNS Resolution', 'FAIL', 'FAIL', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(136, 62, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(137, 62, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(138, 62, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(139, 62, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(140, 62, 'DNS Resolution', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(141, 63, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(142, 63, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(143, 63, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(144, 63, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(145, 63, 'DNS Resolution', 'FAIL', 'PASS', 0, 'Perlu peninjauan rule validator.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(146, 64, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(147, 64, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(148, 64, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(149, 64, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(150, 64, 'DNS Resolution', 'FAIL', 'FAIL', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(151, 65, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(152, 65, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(153, 65, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(154, 65, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(155, 65, 'DNS Resolution', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(156, 66, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(157, 66, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(158, 66, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(159, 66, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(160, 66, 'DNS Resolution', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(161, 67, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(162, 67, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(163, 67, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(164, 67, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(165, 67, 'DNS Resolution', 'FAIL', 'FAIL', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(166, 68, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(167, 68, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(168, 68, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(169, 68, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(170, 68, 'DNS Resolution', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(171, 69, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(172, 69, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(173, 69, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(174, 69, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(175, 69, 'DNS Resolution', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(176, 70, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(177, 70, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(178, 70, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(179, 70, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(180, 70, 'DNS Resolution', 'PASS', 'FAIL', 0, 'Perlu peninjauan rule validator.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(181, 71, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(182, 71, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(183, 71, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(184, 71, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(185, 71, 'DNS Resolution', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(186, 72, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(187, 72, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(188, 72, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(189, 72, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(190, 72, 'DNS Resolution', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(191, 73, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(192, 73, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(193, 73, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(194, 73, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(195, 73, 'DNS Resolution', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(196, 74, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(197, 74, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(198, 74, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(199, 74, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(200, 74, 'DNS Resolution', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(201, 75, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(202, 75, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(203, 75, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(204, 75, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(205, 75, 'DNS Resolution', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(206, 76, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(207, 76, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(208, 76, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(209, 76, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(210, 76, 'DNS Resolution', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(211, 77, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(212, 77, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(213, 77, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(214, 77, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(215, 77, 'DNS Resolution', 'FAIL', 'PASS', 0, 'Perlu peninjauan rule validator.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(216, 78, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(217, 78, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(218, 78, 'Forward Zone File', 'FAIL', 'FAIL', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(219, 78, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(220, 78, 'DNS Resolution', 'FAIL', 'FAIL', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(221, 79, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(222, 79, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(223, 79, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(224, 79, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(225, 79, 'DNS Resolution', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(226, 80, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(227, 80, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(228, 80, 'Forward Zone File', 'FAIL', 'FAIL', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(229, 80, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(230, 80, 'DNS Resolution', 'FAIL', 'FAIL', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(231, 81, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(232, 81, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(233, 81, 'Forward Zone File', 'FAIL', 'FAIL', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(234, 81, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(235, 81, 'DNS Resolution', 'FAIL', 'FAIL', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(236, 82, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(237, 82, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(238, 82, 'Forward Zone File', 'FAIL', 'FAIL', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(239, 82, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(240, 82, 'DNS Resolution', 'FAIL', 'FAIL', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(241, 83, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(242, 83, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(243, 83, 'Forward Zone File', 'FAIL', 'FAIL', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(244, 83, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(245, 83, 'DNS Resolution', 'FAIL', 'FAIL', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(246, 84, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(247, 84, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(248, 84, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(249, 84, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(250, 84, 'DNS Resolution', 'FAIL', 'PASS', 0, 'Perlu peninjauan rule validator.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(251, 85, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(252, 85, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(253, 85, 'Forward Zone File', 'FAIL', 'FAIL', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(254, 85, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(255, 85, 'DNS Resolution', 'FAIL', 'FAIL', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(256, 86, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(257, 86, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(258, 86, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(259, 86, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(260, 86, 'DNS Resolution', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(261, 87, 'Bind9 Service', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(262, 87, 'named.conf.local', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(263, 87, 'Forward Zone File', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(264, 87, 'DNS Port', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20'),
(265, 87, 'DNS Resolution', 'PASS', 'PASS', 1, 'Keputusan guru dan Agent sesuai.', '2026-06-27 17:24:20', '2026-06-27 17:24:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `devices_user_id_foreign` (`user_id`);

--
-- Indexes for table `device_authorizations`
--
ALTER TABLE `device_authorizations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `device_authorizations_device_code_unique` (`device_code`),
  ADD KEY `device_authorizations_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labs`
--
ALTER TABLE `labs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `labs_course_id_foreign` (`course_id`);

--
-- Indexes for table `lab_results`
--
ALTER TABLE `lab_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lab_results_user_id_foreign` (`user_id`),
  ADD KEY `lab_results_lab_id_foreign` (`lab_id`);

--
-- Indexes for table `lab_result_details`
--
ALTER TABLE `lab_result_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lab_result_details_lab_result_id_status_index` (`lab_result_id`,`status`),
  ADD KEY `lab_result_details_rule_name_status_index` (`rule_name`,`status`);

--
-- Indexes for table `lab_tokens`
--
ALTER TABLE `lab_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lab_tokens_token_unique` (`token`),
  ADD KEY `lab_tokens_user_id_foreign` (`user_id`),
  ADD KEY `lab_tokens_lesson_id_foreign` (`lesson_id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lessons_section_id_foreign` (`section_id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materials_course_id_foreign` (`course_id`);

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
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `progress_user_id_foreign` (`user_id`),
  ADD KEY `progress_lesson_id_foreign` (`lesson_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sections_course_id_foreign` (`course_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `validator_calibrations`
--
ALTER TABLE `validator_calibrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `validator_calibrations_lab_result_id_foreign` (`lab_result_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `device_authorizations`
--
ALTER TABLE `device_authorizations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `labs`
--
ALTER TABLE `labs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lab_results`
--
ALTER TABLE `lab_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `lab_result_details`
--
ALTER TABLE `lab_result_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=431;

--
-- AUTO_INCREMENT for table `lab_tokens`
--
ALTER TABLE `lab_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `validator_calibrations`
--
ALTER TABLE `validator_calibrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `devices`
--
ALTER TABLE `devices`
  ADD CONSTRAINT `devices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `device_authorizations`
--
ALTER TABLE `device_authorizations`
  ADD CONSTRAINT `device_authorizations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `labs`
--
ALTER TABLE `labs`
  ADD CONSTRAINT `labs_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lab_results`
--
ALTER TABLE `lab_results`
  ADD CONSTRAINT `lab_results_lab_id_foreign` FOREIGN KEY (`lab_id`) REFERENCES `labs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lab_results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lab_result_details`
--
ALTER TABLE `lab_result_details`
  ADD CONSTRAINT `lab_result_details_lab_result_id_foreign` FOREIGN KEY (`lab_result_id`) REFERENCES `lab_results` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lab_tokens`
--
ALTER TABLE `lab_tokens`
  ADD CONSTRAINT `lab_tokens_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lab_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `materials_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `progress_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `progress_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `validator_calibrations`
--
ALTER TABLE `validator_calibrations`
  ADD CONSTRAINT `validator_calibrations_lab_result_id_foreign` FOREIGN KEY (`lab_result_id`) REFERENCES `lab_results` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
