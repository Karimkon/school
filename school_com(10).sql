-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2024 at 12:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school.com`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_class_teacher`
--

CREATE TABLE `assign_class_teacher` (
  `id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assign_class_teacher`
--

INSERT INTO `assign_class_teacher` (`id`, `class_id`, `teacher_id`, `status`, `is_delete`, `created_by`, `created_at`, `updated_at`) VALUES
(7, 5, 2, 0, 0, '1', '2023-10-12 06:00:20', '2023-10-12 06:00:20'),
(9, 5, 14, 0, 0, '1', '2023-10-12 06:44:54', '2023-10-12 06:44:54'),
(11, 3, 14, 0, 0, '1', '2023-10-12 08:38:28', '2023-10-12 08:38:28'),
(13, 1, 14, 0, 0, '1', '2023-10-13 05:46:26', '2023-10-13 05:46:26'),
(14, 8, 20, 0, 0, '1', '2023-10-26 17:57:07', '2023-10-26 17:57:07'),
(15, 9, 20, 0, 0, '1', '2023-10-26 17:57:23', '2023-10-26 17:57:23'),
(16, 5, 20, 0, 0, '1', '2023-10-26 18:06:24', '2023-10-26 18:06:24'),
(17, 8, 2, 0, 0, '1', '2023-10-26 18:14:07', '2023-10-26 18:14:07'),
(18, 6, 20, 0, 0, '1', '2023-10-27 18:09:36', '2023-10-27 18:09:36');

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE `budget` (
  `id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `is_delete` tinyint(4) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `budget`
--

INSERT INTO `budget` (`id`, `category`, `amount`, `year`, `is_delete`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Library Resources', '6700000', '2024', 0, 23, '2024-01-25 08:00:35', '2024-01-25 08:00:35'),
(2, 'Sports Equipment', '7000000', '2024', 0, 23, '2024-01-25 08:02:51', '2024-01-25 08:26:30'),
(3, 'Teachers Salary', '14000000', '2023', 0, 23, '2024-01-25 08:06:19', '2024-01-25 08:22:29');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: Not Read, 1: Seen',
  `created_date` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sender_id`, `receiver_id`, `message`, `file`, `status`, `created_date`, `created_at`, `updated_at`) VALUES
(39, 1, 18, 'hi', '20240131072709mzokto0sqgfiulmnazc7.xlsx', 1, 1706686029, '2024-01-31 07:27:09', '2024-01-31 07:27:09'),
(40, 1, 2, 'have you tought your class', NULL, 1, 1706687950, '2024-01-31 07:59:10', '2024-01-31 07:59:25'),
(48, 1, 18, 'hi', NULL, 0, 1706690768, '2024-01-31 08:46:08', '2024-01-31 08:46:08'),
(49, 1, 18, 'hi', NULL, 0, 1706690771, '2024-01-31 08:46:11', '2024-01-31 08:46:11'),
(50, 1, 18, '😇', NULL, 0, 1706690885, '2024-01-31 08:48:05', '2024-01-31 08:48:05'),
(51, 1, 23, 'hi', NULL, 0, 1706699266, '2024-01-31 11:07:46', '2024-01-31 11:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `amount` int(11) DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:Active, 1:Inactive',
  `is_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:not_deleted, 1:deleted',
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `amount`, `status`, `is_delete`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 's1 A', 1000000, 0, 0, 1, '2023-10-09 14:32:35', '2023-10-23 11:55:11'),
(2, 's1 B', 670000, 0, 0, 1, '2023-10-09 14:32:51', '2023-10-19 19:37:59'),
(3, 's 2 A', 892000, 0, 0, 1, '2023-10-09 14:33:12', '2023-10-19 19:37:47'),
(4, 's 2 B', 957000, 0, 0, 1, '2023-10-09 14:33:25', '2023-10-19 19:37:36'),
(5, 's 3 A', 750000, 0, 0, 1, '2023-10-09 14:33:35', '2023-10-19 19:37:15'),
(6, 'S 3 B', 800000, 0, 0, 1, '2023-10-09 14:33:51', '2023-10-19 19:37:24'),
(8, 's 6 A', 800000, 0, 0, 1, '2023-10-19 19:30:55', '2023-10-19 19:36:44'),
(9, 's 5 B', 1000000, 0, 0, 1, '2023-10-19 19:33:12', '2023-10-19 19:33:12'),
(10, 'S4 A', 4500000, 0, 0, 1, '2023-10-26 15:20:25', '2023-10-26 15:20:25');

-- --------------------------------------------------------

--
-- Table structure for table `class_subject`
--

CREATE TABLE `class_subject` (
  `id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:not deleted, 1:deleted',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:Active, 1:Inactive',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_subject`
--

INSERT INTO `class_subject` (`id`, `class_id`, `subject_id`, `created_by`, `is_delete`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 1, 1, 0, '2023-10-09 14:50:52', '2023-10-09 14:51:01'),
(2, 4, 2, 1, 1, 0, '2023-10-09 14:51:14', '2023-10-11 21:10:52'),
(3, 4, 1, 1, 0, 0, '2023-10-09 14:51:14', '2023-10-09 14:51:14'),
(4, 3, 4, 1, 0, 0, '2023-10-11 14:10:29', '2023-10-11 14:10:29'),
(5, 5, 4, 1, 0, 0, '2023-10-12 07:52:55', '2023-10-12 07:52:55'),
(6, 5, 2, 1, 0, 0, '2023-10-12 07:52:55', '2023-10-12 07:52:55'),
(7, 5, 1, 1, 0, 0, '2023-10-12 07:52:55', '2023-10-12 07:52:55'),
(8, 6, 4, 1, 0, 0, '2023-10-12 07:54:58', '2023-10-12 07:54:58'),
(9, 6, 2, 1, 0, 0, '2023-10-12 07:54:58', '2023-10-12 07:54:58'),
(10, 1, 5, 1, 0, 0, '2023-10-12 19:17:20', '2023-10-12 19:17:20'),
(11, 1, 9, 1, 0, 0, '2023-10-12 19:17:20', '2023-10-12 19:17:20'),
(12, 1, 4, 1, 0, 0, '2023-10-12 19:17:20', '2023-10-12 19:17:20'),
(13, 1, 7, 1, 0, 0, '2023-10-12 19:17:20', '2023-10-12 19:17:20'),
(14, 1, 8, 1, 0, 0, '2023-10-12 19:17:20', '2023-10-12 19:17:20'),
(15, 1, 2, 1, 0, 0, '2023-10-12 19:17:20', '2023-10-12 19:17:20'),
(16, 3, 5, 1, 0, 0, '2023-10-13 05:42:19', '2023-10-13 05:42:19'),
(17, 3, 9, 1, 0, 0, '2023-10-13 05:42:19', '2023-10-13 05:42:19'),
(18, 1, 10, 1, 0, 0, '2023-10-16 09:11:52', '2023-10-16 09:11:52'),
(19, 1, 11, 1, 0, 0, '2023-10-16 19:08:36', '2023-10-16 19:08:36'),
(20, 7, 5, 1, 0, 0, '2023-10-19 15:28:23', '2023-10-19 15:28:23'),
(21, 7, 9, 1, 0, 0, '2023-10-19 15:28:23', '2023-10-19 15:28:23'),
(22, 7, 4, 1, 0, 0, '2023-10-19 15:28:23', '2023-10-19 15:28:23'),
(23, 7, 7, 1, 0, 0, '2023-10-19 15:28:23', '2023-10-19 15:28:23'),
(24, 7, 8, 1, 0, 0, '2023-10-19 15:28:23', '2023-10-19 15:28:23'),
(25, 7, 2, 1, 0, 0, '2023-10-19 15:28:23', '2023-10-19 15:28:23'),
(26, 7, 11, 1, 0, 0, '2023-10-19 15:28:23', '2023-10-19 15:28:23'),
(27, 7, 10, 1, 0, 0, '2023-10-19 15:28:23', '2023-10-19 15:28:23'),
(28, 7, 1, 1, 0, 0, '2023-10-19 15:28:23', '2023-10-19 15:28:23'),
(29, 7, 6, 1, 0, 0, '2023-10-19 15:28:23', '2023-10-19 15:28:23'),
(30, 9, 9, 1, 0, 0, '2023-10-26 17:47:03', '2023-10-26 17:47:03'),
(31, 9, 4, 1, 0, 0, '2023-10-26 17:47:03', '2023-10-26 17:47:03'),
(32, 9, 8, 1, 0, 0, '2023-10-26 17:47:03', '2023-10-26 17:47:03'),
(33, 9, 1, 1, 0, 0, '2023-10-26 17:47:03', '2023-10-26 17:47:03'),
(54, 8, 5, 1, 0, 0, '2023-10-27 13:24:04', '2023-10-27 13:24:04'),
(55, 8, 9, 1, 0, 0, '2023-10-27 13:24:04', '2023-10-27 13:24:04'),
(56, 8, 4, 1, 0, 0, '2023-10-27 13:24:04', '2023-10-27 13:24:04'),
(57, 8, 7, 1, 0, 0, '2023-10-27 13:24:04', '2023-10-27 13:24:04'),
(58, 8, 8, 1, 0, 0, '2023-10-27 13:24:04', '2023-10-27 13:24:04'),
(59, 8, 2, 1, 0, 0, '2023-10-27 13:24:04', '2023-10-27 13:24:04'),
(60, 8, 11, 1, 0, 0, '2023-10-27 13:24:04', '2023-10-27 13:24:04'),
(61, 8, 1, 1, 0, 0, '2023-10-27 13:24:04', '2023-10-27 13:24:04'),
(62, 8, 6, 1, 0, 0, '2023-10-27 13:24:04', '2023-10-27 13:24:04'),
(63, 10, 9, 1, 0, 0, '2024-01-21 08:27:55', '2024-01-21 08:27:55'),
(64, 10, 4, 1, 0, 0, '2024-01-21 08:27:55', '2024-01-21 08:27:55'),
(65, 10, 8, 1, 0, 0, '2024-01-21 08:27:55', '2024-01-21 08:27:55'),
(66, 10, 2, 1, 0, 0, '2024-01-21 08:27:55', '2024-01-21 08:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `class_subject_timetable`
--

CREATE TABLE `class_subject_timetable` (
  `id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `week_id` int(11) DEFAULT NULL,
  `start_time` varchar(25) DEFAULT NULL,
  `end_time` varchar(25) DEFAULT NULL,
  `room_number` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_subject_timetable`
--

INSERT INTO `class_subject_timetable` (`id`, `class_id`, `subject_id`, `week_id`, `start_time`, `end_time`, `room_number`, `created_at`, `updated_at`) VALUES
(7, 4, 1, 1, '00:43', '09:10', '43', '2023-10-12 18:46:09', '2023-10-12 18:46:09'),
(8, 4, 1, 2, '14:34', '19:06', '6', '2023-10-12 18:46:09', '2023-10-12 18:46:09'),
(9, 4, 1, 3, '02:34', '16:23', '3', '2023-10-12 18:46:09', '2023-10-12 18:46:09'),
(10, 4, 1, 4, '02:34', '16:35', '8', '2023-10-12 18:46:09', '2023-10-12 18:46:09'),
(11, 4, 1, 5, '14:34', '14:34', '6', '2023-10-12 18:46:09', '2023-10-12 18:46:09'),
(12, 4, 1, 7, '03:42', '14:35', '2', '2023-10-12 18:46:09', '2023-10-12 18:46:09'),
(15, 3, 4, 1, '16:31', '02:34', '34', '2023-10-13 08:29:33', '2023-10-13 08:29:33'),
(16, 3, 4, 2, '00:44', '14:34', 'Room 67', '2023-10-13 08:29:33', '2023-10-13 08:29:33'),
(18, 5, 2, 1, '14:43', '02:34', 'room 6', '2023-10-13 08:35:18', '2023-10-13 08:35:18'),
(19, 5, 2, 5, '09:00', '00:12', 'main hall', '2023-10-13 08:35:18', '2023-10-13 08:35:18'),
(20, 3, 9, 4, '02:12', '02:35', 'mosque', '2023-10-13 09:18:41', '2023-10-13 09:18:41'),
(23, 1, 4, 1, '00:43', '13:04', 'sd', '2023-10-15 09:25:15', '2023-10-15 09:25:15'),
(24, 1, 4, 2, '02:34', '14:43', '234', '2023-10-15 09:25:15', '2023-10-15 09:25:15'),
(25, 1, 4, 7, '00:03', '00:04', '23', '2023-10-15 09:25:15', '2023-10-15 09:25:15'),
(26, 1, 2, 1, '00:31', '14:01', '7', '2023-10-15 09:34:44', '2023-10-15 09:34:44'),
(27, 1, 2, 3, '00:32', '14:03', '65', '2023-10-15 09:34:44', '2023-10-15 09:34:44'),
(28, 1, 5, 1, '00:32', '12:12', '3', '2023-10-15 09:40:19', '2023-10-15 09:40:19'),
(29, 1, 5, 4, '13:02', '04:25', '4', '2023-10-15 09:40:19', '2023-10-15 09:40:19'),
(30, 1, 5, 7, '02:45', '13:04', '9', '2023-10-15 09:40:19', '2023-10-15 09:40:19'),
(31, 9, 1, 1, '23:31', '12:02', 'room 8', '2023-10-26 17:49:45', '2023-10-26 17:49:45'),
(32, 9, 1, 2, '12:02', '12:02', 'room 7', '2023-10-26 17:49:45', '2023-10-26 17:49:45'),
(33, 9, 1, 3, '04:04', '12:02', 'main Hall', '2023-10-26 17:49:45', '2023-10-26 17:49:45'),
(34, 9, 1, 4, '05:04', '05:04', 'room 1', '2023-10-26 17:49:45', '2023-10-26 17:49:45'),
(35, 9, 1, 5, '05:45', '04:55', 'A 12', '2023-10-26 17:49:45', '2023-10-26 17:49:45'),
(36, 9, 1, 6, '21:22', '03:03', 'main Hall', '2023-10-26 17:49:45', '2023-10-26 17:49:45'),
(37, 9, 1, 7, '21:02', '06:07', 'room 9', '2023-10-26 17:49:45', '2023-10-26 17:49:45'),
(38, 9, 4, 1, '06:53', '03:24', 'main Hall', '2023-10-26 17:51:33', '2023-10-26 17:51:33'),
(39, 9, 4, 2, '03:43', '03:44', 'room 45', '2023-10-26 17:51:33', '2023-10-26 17:51:33'),
(40, 9, 4, 3, '04:05', '05:44', 'Hall 012', '2023-10-26 17:51:33', '2023-10-26 17:51:33'),
(41, 9, 4, 4, '05:35', '05:35', 'main Hall', '2023-10-26 17:51:33', '2023-10-26 17:51:33'),
(42, 9, 4, 5, '06:56', '05:06', 'T 500', '2023-10-26 17:51:33', '2023-10-26 17:51:33'),
(43, 9, 4, 6, '06:56', '06:56', 'main', '2023-10-26 17:51:33', '2023-10-26 17:51:33'),
(44, 9, 4, 7, '05:06', '07:07', 'Hall 8', '2023-10-26 17:51:33', '2023-10-26 17:51:33'),
(45, 9, 9, 1, '07:06', '03:04', 'Hall 001', '2023-10-26 17:53:08', '2023-10-26 17:53:08'),
(46, 9, 9, 2, '05:06', '06:05', 'Hall 002', '2023-10-26 17:53:08', '2023-10-26 17:53:08'),
(47, 9, 9, 3, '05:06', '06:55', 'Hall 300', '2023-10-26 17:53:08', '2023-10-26 17:53:08'),
(48, 9, 9, 4, '05:06', '05:06', 'Hall 1', '2023-10-26 17:53:08', '2023-10-26 17:53:08'),
(49, 9, 9, 5, '06:07', '07:06', 'domitry', '2023-10-26 17:53:08', '2023-10-26 17:53:08'),
(50, 9, 9, 6, '05:06', '07:06', 'domitry 2', '2023-10-26 17:53:08', '2023-10-26 17:53:08'),
(51, 9, 9, 7, '05:56', '05:06', 'Hall 569', '2023-10-26 17:53:08', '2023-10-26 17:53:08'),
(52, 9, 8, 3, '06:36', '03:04', 'main Hall', '2023-10-26 17:53:56', '2023-10-26 17:53:56'),
(53, 9, 8, 6, '02:25', '03:43', 'Hall 200', '2023-10-26 17:53:56', '2023-10-26 17:53:56'),
(54, 8, 9, 4, '12:21', '04:34', 'room 1', '2023-10-26 18:11:47', '2023-10-26 18:11:47'),
(55, 8, 1, 1, '23:03', '03:44', 'room 1', '2023-10-26 18:17:38', '2023-10-26 18:17:38'),
(56, 8, 1, 7, '12:21', '23:03', 'admi lock', '2023-10-26 18:17:38', '2023-10-26 18:17:38'),
(57, 6, 2, 1, '04:04', '23:04', 'main Hall', '2023-10-28 17:12:04', '2023-10-28 17:12:04'),
(58, 6, 2, 2, '12:04', '05:04', 'Computer Lab', '2023-10-28 17:12:04', '2023-10-28 17:12:04'),
(59, 6, 2, 3, '12:03', '04:35', 'room 1', '2023-10-28 17:12:04', '2023-10-28 17:12:04'),
(60, 6, 2, 4, '12:43', '02:33', 'Mosque', '2023-10-28 17:12:04', '2023-10-28 17:12:04'),
(61, 6, 2, 5, '23:04', '04:35', 'room 64', '2023-10-28 17:12:04', '2023-10-28 17:12:04'),
(62, 6, 2, 6, '04:56', '06:54', 'room 1', '2023-10-28 17:12:04', '2023-10-28 17:12:04'),
(63, 6, 2, 7, '04:56', '05:06', 'room 1', '2023-10-28 17:12:04', '2023-10-28 17:12:04'),
(71, 6, 4, 1, '05:46', '04:23', 'room 1', '2023-10-28 17:24:03', '2023-10-28 17:24:03'),
(72, 6, 4, 2, '04:23', '04:23', 'room 2', '2023-10-28 17:24:03', '2023-10-28 17:24:03'),
(73, 6, 4, 3, '23:04', '23:04', 'room 3', '2023-10-28 17:24:03', '2023-10-28 17:24:03'),
(74, 6, 4, 4, '06:05', '06:05', 'room 4', '2023-10-28 17:24:03', '2023-10-28 17:24:03'),
(75, 6, 4, 5, '06:05', '06:05', 'room 5', '2023-10-28 17:24:03', '2023-10-28 17:24:03'),
(76, 6, 4, 6, '05:06', '05:06', 'room 6', '2023-10-28 17:24:03', '2023-10-28 17:24:03'),
(77, 6, 4, 7, '06:56', '06:05', 'room7', '2023-10-28 17:24:03', '2023-10-28 17:24:03'),
(78, 1, 11, 2, '03:03', '22:02', '4', '2024-01-21 20:03:38', '2024-01-21 20:03:38'),
(79, 1, 11, 4, '03:04', '03:04', '3', '2024-01-21 20:03:38', '2024-01-21 20:03:38'),
(80, 1, 11, 5, '03:04', '03:04', '3', '2024-01-21 20:03:38', '2024-01-21 20:03:38'),
(81, 1, 11, 6, '03:04', '03:03', '3', '2024-01-21 20:03:38', '2024-01-21 20:03:38'),
(82, 1, 11, 7, '03:04', '03:04', '34', '2024-01-21 20:03:38', '2024-01-21 20:03:38'),
(83, 1, 8, 1, '02:18', '14:14', 'w12', '2024-01-21 20:04:05', '2024-01-21 20:04:05'),
(84, 1, 8, 4, '12:03', '00:03', '346', '2024-01-21 20:04:05', '2024-01-21 20:04:05'),
(85, 1, 8, 7, '03:32', '23:03', '3', '2024-01-21 20:04:05', '2024-01-21 20:04:05'),
(86, 10, 8, 2, '23:12', '23:01', '2', '2024-01-21 20:15:08', '2024-01-21 20:15:08'),
(87, 10, 8, 3, '21:03', '21:03', 'Hall', '2024-01-21 20:15:08', '2024-01-21 20:15:08'),
(88, 10, 8, 4, '23:04', '03:24', 'Mosque', '2024-01-21 20:15:08', '2024-01-21 20:15:08'),
(89, 10, 4, 1, '02:43', '12:03', '10', '2024-01-21 20:15:37', '2024-01-21 20:15:37'),
(90, 10, 4, 2, '21:31', '23:12', '12', '2024-01-21 20:15:37', '2024-01-21 20:15:37');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `name`, `note`, `created_by`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'SECOND TERM EXAMS  2023', 'This was the first exam to be created.', 1, 0, '2023-10-13 11:34:13', '2023-10-16 16:20:17'),
(2, 'FIRST TERM EXAMS 2023', 'This is a second exam', 1, 0, '2023-10-13 12:31:15', '2023-10-16 16:20:51'),
(3, 'FF', 'FD', 1, 1, '2023-10-13 12:31:22', '2023-10-13 12:31:24'),
(4, 'THIRD TERM EXAMS', 'Last term', 1, 1, '2023-10-13 12:44:43', '2023-10-16 16:32:37'),
(5, 'QURAN COMPETITIONS', 'The book of Allah the most High', 1, 0, '2023-10-13 20:25:52', '2023-10-16 16:20:34'),
(6, 'THIRD TERM EXAMINATIONS', 'This is  promotion Term', 1, 0, '2023-10-28 18:08:13', '2023-10-28 18:08:38');

-- --------------------------------------------------------

--
-- Table structure for table `exam_schedule`
--

CREATE TABLE `exam_schedule` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `exam_date` date DEFAULT NULL,
  `start_time` varchar(15) DEFAULT NULL,
  `end_time` varchar(15) DEFAULT NULL,
  `room_number` varchar(25) DEFAULT NULL,
  `full_marks` varchar(100) DEFAULT NULL,
  `passing_mark` varchar(100) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_schedule`
--

INSERT INTO `exam_schedule` (`id`, `exam_id`, `class_id`, `subject_id`, `exam_date`, `start_time`, `end_time`, `room_number`, `full_marks`, `passing_mark`, `created_by`, `created_at`, `updated_at`) VALUES
(10, 2, 5, 1, '2023-10-20', '14:14', '14:36', '45', '100', '80', 1, '2023-10-13 18:32:44', '2023-10-13 18:32:44'),
(11, 2, 5, 2, '2023-10-30', '00:54', '15:03', '43', '100', '80', 1, '2023-10-13 18:32:44', '2023-10-13 18:32:44'),
(12, 2, 5, 4, '2023-10-31', '02:15', '14:34', '56', '100', '85', 1, '2023-10-13 18:32:44', '2023-10-13 18:32:44'),
(18, 4, 3, 9, '2024-02-14', '00:43', '02:04', '364', '100', '70', 1, '2023-10-13 20:12:35', '2023-10-13 20:12:35'),
(19, 4, 1, 7, '2024-12-31', '03:54', '15:52', '56', '100', '85', 1, '2023-10-13 20:14:44', '2023-10-13 20:14:44'),
(36, 2, 4, 1, '1000-12-31', '23:43', '23:04', '7', '100', '75', 1, '2023-10-27 07:15:49', '2023-10-27 07:15:49'),
(37, 2, 8, 8, '4000-03-04', '03:04', '03:04', '7000', '100', '100', 1, '2023-10-27 18:40:08', '2023-10-27 18:40:08'),
(38, 2, 6, 2, '2023-02-28', '03:04', '06:57', '6', '100', '50', 1, '2023-10-28 17:52:07', '2023-10-28 17:52:07'),
(39, 2, 6, 4, '2023-12-30', '06:07', '06:07', '12', '100', '50', 1, '2023-10-28 17:52:07', '2023-10-28 17:52:07'),
(41, 5, 3, 9, '2023-12-11', '11:23', '21:33', '4', '100', '75', 1, '2023-12-25 09:35:18', '2023-12-25 09:35:18'),
(42, 5, 3, 5, '2023-10-31', '02:35', '02:05', '43', '100', '80', 1, '2023-12-25 09:35:18', '2023-12-25 09:35:18'),
(44, 2, 1, 11, '2026-12-04', '12:21', '12:03', '1', '100', '75', 1, '2024-01-21 20:06:40', '2024-01-21 20:06:40'),
(45, 2, 1, 10, '2024-12-31', '02:34', '14:34', '9', '100', '50', 1, '2024-01-21 20:06:40', '2024-01-21 20:06:40'),
(46, 2, 1, 2, '2023-10-31', '03:43', '12:03', '4', '100', '80', 1, '2024-01-21 20:06:40', '2024-01-21 20:06:40'),
(47, 2, 1, 8, '2023-10-13', '13:04', '03:15', '43', '100', '80', 1, '2024-01-21 20:06:40', '2024-01-21 20:06:40'),
(48, 2, 1, 7, '2025-10-30', '02:43', '03:34', '56', '100', '85', 1, '2024-01-21 20:06:40', '2024-01-21 20:06:40'),
(49, 2, 1, 4, '2024-03-25', '04:55', '05:46', 'a5654', '100', '60', 1, '2024-01-21 20:06:40', '2024-01-21 20:06:40'),
(50, 2, 1, 9, '2025-05-07', '23:03', '03:02', '54', '50', '20', 1, '2024-01-21 20:06:40', '2024-01-21 20:06:40'),
(54, 2, 10, 2, '2024-02-28', '04:43', '23:04', '33', '200', '23', 1, '2024-01-21 20:14:12', '2024-01-21 20:14:12'),
(55, 2, 10, 8, '2024-09-29', '04:32', '03:23', '5', '100', '20', 1, '2024-01-21 20:14:12', '2024-01-21 20:14:12'),
(56, 2, 10, 4, '2025-09-09', '02:02', '02:09', '9', '100', '40', 1, '2024-01-21 20:14:12', '2024-01-21 20:14:12'),
(57, 2, 10, 9, '2024-01-21', '21:02', '21:02', '1', '100', '50', 1, '2024-01-21 20:14:12', '2024-01-21 20:14:12');

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
-- Table structure for table `homework`
--

CREATE TABLE `homework` (
  `id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `homework_date` date DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  `document_file` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_delete` tinyint(4) DEFAULT 0,
  `created_by` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homework`
--

INSERT INTO `homework` (`id`, `class_id`, `subject_id`, `homework_date`, `submission_date`, `document_file`, `description`, `is_delete`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '2023-10-15', '2023-10-26', '20231019012455a7e9lqrkagaqxrmwd21u.docx', 'afgvghfghfdhg', 0, '0000-00-00 00:00:00', '2023-10-19 13:24:55', '2023-10-19 15:26:13'),
(2, 7, 6, '2023-10-19', '2023-10-31', '20231019032913jmzyc8l9mafyn3x1vpfx.docx', 'updated<br>', 0, '0000-00-00 00:00:00', '2023-10-19 15:29:13', '2023-10-19 15:29:13'),
(3, 1, 11, '2023-10-14', '2023-10-31', '20231019044430bdqnooio6dmikryow8cn.docx', 'Remember to do this work as soon as possible<br>', 1, '0000-00-00 00:00:00', '2023-10-19 16:44:30', '2023-10-19 16:56:16'),
(4, 5, 4, '2023-10-13', '2023-10-03', '20231019045342qftp6jpcqisoyhniyosu.docx', 'dsg', 1, '0000-00-00 00:00:00', '2023-10-19 16:53:42', '2023-10-19 16:55:53'),
(5, 3, 5, '2023-10-14', '2023-10-27', '20231019050443oqxzsllfqmpgiwozmwzw.docx', 'Do this work as soon as possible<br>', 0, '0000-00-00 00:00:00', '2023-10-19 17:02:48', '2023-12-25 13:08:44'),
(6, 7, 7, '2023-10-17', '2023-10-31', '20231019055838stt5tpvvlqyeuttwv4ls.docx', 'Uploaded', 0, '0000-00-00 00:00:00', '2023-10-19 17:58:38', '2023-10-19 17:58:38'),
(7, 4, 1, '2023-10-16', '2023-10-31', '20231019060702bbluag4q0nvb1wh8c4qt.docx', 'updated course work<br>', 1, '0000-00-00 00:00:00', '2023-10-19 18:07:02', '2023-12-25 13:08:36'),
(8, 7, 2, '2023-10-09', '2023-10-31', '202310190609333vgujsacophxerbli9a5.docx', 'This is English Language<br>', 0, '0000-00-00 00:00:00', '2023-10-19 18:09:33', '2023-10-19 18:09:33'),
(9, 6, 4, '2020-03-22', '2023-12-31', '20231027061146yycwxjdipgxev8vou33j.xlsx', 'work', 1, '0000-00-00 00:00:00', '2023-10-27 18:11:46', '2023-12-25 13:08:28'),
(10, 8, 9, '1000-12-22', '2000-01-01', '20231027103607u3vtehrd9b8dfhjhqfdk.jpg', '<p>Do this before tomorrow</p><p><br></p>', 1, '0000-00-00 00:00:00', '2023-10-27 22:36:07', '2023-12-25 13:08:21'),
(11, 3, 9, '2023-12-14', '2023-12-30', '20231225010937k3rphedzfhuvrejljixd.pdf', 's', 0, '0000-00-00 00:00:00', '2023-12-25 13:09:37', '2023-12-25 13:09:37'),
(12, 5, 1, '2024-01-10', '2024-01-27', '202401090940498xipnvuu1fu2ocfu9jpy.jpg', 'do ttushis work <br>', 0, '0000-00-00 00:00:00', '2024-01-09 21:40:49', '2024-01-09 21:40:49'),
(13, 8, 1, '2024-01-21', '2025-03-16', '202401210746474njhsqy4efsjgwlinhbb.pdf', 'Do this work before the deadline, omanyi mwewunza. <br>', 0, '0000-00-00 00:00:00', '2024-01-21 19:46:47', '2024-01-21 19:46:47');

-- --------------------------------------------------------

--
-- Table structure for table `homework_submit`
--

CREATE TABLE `homework_submit` (
  `id` int(11) NOT NULL,
  `homework_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `document_file` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homework_submit`
--

INSERT INTO `homework_submit` (`id`, `homework_id`, `student_id`, `description`, `document_file`, `created_at`, `updated_at`) VALUES
(1, 5, 1, '<p>I have submitted my homework please</p><p><br></p>', '20231019065907zb4suskhmjkcgb55dkgy.docx', '2023-10-19 18:59:07', '2023-10-19 18:59:07'),
(2, 8, 3, 'Accountability', '20231024114512jbknqdyck0qhuhoktsnu.xlsx', '2023-10-24 11:45:12', '2023-10-24 11:45:12'),
(3, 9, 3, 'work', '20231027061424aj6qot9ssvwygzclsdqr.docx', '2023-10-27 18:14:24', '2023-10-27 18:14:24'),
(4, 10, 22, '<p>I just Submitted my work</p><p><br></p>', '20231027103932gy9cemjualyc1r16sryw.png', '2023-10-27 22:39:32', '2023-10-27 22:39:32'),
(5, 12, 17, '', '20240119071418tiigjyr299wk0wdd7duq.pdf', '2024-01-19 07:14:18', '2024-01-19 07:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `total_amount_spent` tinyint(50) DEFAULT 0,
  `year` varchar(255) DEFAULT NULL,
  `is_delete` tinyint(4) DEFAULT 0,
  `item_image` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `budget_id` int(11) DEFAULT NULL,
  `unit_price` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `name`, `description`, `quantity`, `total_amount_spent`, `year`, `is_delete`, `item_image`, `created_by`, `budget_id`, `unit_price`, `created_at`, `updated_at`) VALUES
(1, 'wrrrr', 'tertrte', '2', 0, NULL, 0, '20240121103356hbjhl4acymhde12b63ca.png', 23, NULL, '2000444', '2024-01-21 10:33:56', '2024-01-25 08:45:58'),
(2, 'Laundry stuff', 'Soap and detergents', '3', 0, NULL, 0, '20240121111703bhqugfvugbvxht8eecki.png', 23, NULL, '2000', '2024-01-21 11:17:03', '2024-01-25 08:24:15'),
(3, 'Router', 'Internet', '1', 0, NULL, 0, '20240121112239lf9h9oap5dvaae8fh6ar.jpg', 23, NULL, '2000', '2024-01-21 11:22:39', '2024-01-21 11:22:39'),
(4, 's', 's', '20', 0, NULL, 0, '20240122095722v1cxlpdi3hnb8jhsnz7j.png', 23, NULL, '200000', '2024-01-22 21:57:22', '2024-01-22 21:57:22'),
(5, 'soap', 'wfggdfg', '33', 0, NULL, 0, '20240122112724nghoyiskx6yud9xpkyzv.jpg', 23, NULL, '23000', '2024-01-22 23:27:24', '2024-01-22 23:29:33'),
(6, 'Computers', 'Computer Lab PCS', '45', 0, NULL, 0, '20240123122347dx9zloinfohwcvsiy6g7.jpg', 23, NULL, '800000', '2023-11-01 00:23:47', '2023-11-01 00:23:47'),
(7, 'test', 'pcs', '3', 0, NULL, 1, '20240125083956fcwmhckbnnzns5a4c25f.jpg', 23, NULL, '2000', '2024-01-25 08:39:56', '2024-01-25 08:45:29'),
(8, 'test', 'pcs', '3', 0, NULL, 1, '20240125084035zwsv9zguf8hs6mfx2qxx.jpg', 23, NULL, '2000', '2024-01-25 08:40:35', '2024-01-25 08:44:35'),
(9, 'test', 'pcs', '3', 0, NULL, 1, '20240125084320kmui8a6anttcwyzicljy.jpg', 23, NULL, '2000', '2024-01-25 08:43:20', '2024-01-25 08:43:41'),
(10, 'Food', 'food and juice', '3', 0, NULL, 0, '20240125084519untwuti69sgsgidghza6.jpg', 23, NULL, '600000', '2024-01-25 08:45:19', '2024-01-25 08:45:19');

-- --------------------------------------------------------

--
-- Table structure for table `marks_grade`
--

CREATE TABLE `marks_grade` (
  `id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `percent_from` int(11) NOT NULL DEFAULT 0,
  `percent_to` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks_grade`
--

INSERT INTO `marks_grade` (`id`, `name`, `percent_from`, `percent_to`, `created_by`, `created_at`, `updated_at`) VALUES
(7, 'F', 0, 30, 1, '2023-10-16 18:37:24', '2023-10-16 18:37:24'),
(8, 'E', 31, 59, 1, '2023-10-16 18:37:59', '2023-10-16 18:37:59'),
(9, 'D', 60, 69, 1, '2023-10-16 18:38:32', '2023-10-16 18:38:32'),
(10, 'C', 70, 79, 1, '2023-10-16 18:40:41', '2023-10-16 18:40:41'),
(11, 'B', 80, 89, 1, '2023-10-16 18:41:02', '2023-10-16 18:41:02'),
(12, 'A', 90, 100, 1, '2023-10-16 18:41:24', '2023-10-16 18:41:24');

-- --------------------------------------------------------

--
-- Table structure for table `marks_register`
--

CREATE TABLE `marks_register` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `class_work` int(11) NOT NULL DEFAULT 0,
  `home_work` int(11) NOT NULL DEFAULT 0,
  `test_work` int(11) NOT NULL DEFAULT 0,
  `exam` int(11) NOT NULL DEFAULT 0,
  `full_marks` int(11) NOT NULL DEFAULT 0,
  `passing_mark` int(11) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `teacher_comments` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks_register`
--

INSERT INTO `marks_register` (`id`, `student_id`, `exam_id`, `class_id`, `subject_id`, `class_work`, `home_work`, `test_work`, `exam`, `full_marks`, `passing_mark`, `created_by`, `created_at`, `updated_at`, `teacher_comments`) VALUES
(1, 15, 2, 1, 2, 34, 11, 20, 15, 100, 80, 1, '2023-10-15 17:45:57', '2023-10-16 18:55:18', NULL),
(2, 15, 2, 1, 8, 24, 45, 1, 10, 100, 80, 1, '2023-10-15 17:45:57', '2023-10-28 18:11:42', NULL),
(3, 15, 2, 1, 7, 67, 12, 0, 20, 100, 85, 1, '2023-10-15 17:45:57', '2023-10-28 18:11:42', NULL),
(4, 15, 2, 1, 4, 56, 12, 12, 1, 100, 60, 1, '2023-10-15 17:45:57', '2023-10-16 11:57:02', NULL),
(5, 8, 2, 1, 2, 0, 78, 0, 0, 0, 0, 1, '2023-10-15 18:08:27', '2023-10-15 18:08:27', NULL),
(6, 8, 2, 1, 8, 15, 45, 12, 10, 0, 0, 1, '2023-10-15 18:08:27', '2023-10-15 22:10:20', NULL),
(7, 8, 2, 1, 7, 0, 0, 0, 0, 0, 0, 1, '2023-10-15 18:08:27', '2023-10-15 18:08:27', NULL),
(8, 8, 2, 1, 4, 0, 0, 0, 0, 0, 0, 1, '2023-10-15 18:08:27', '2023-10-15 18:08:27', NULL),
(9, 7, 2, 1, 2, 1, 7, 90, 1, 100, 80, 1, '2023-10-15 18:08:40', '2023-10-16 18:48:10', NULL),
(10, 7, 2, 1, 8, 12, 13, 5, 51, 100, 80, 1, '2023-10-15 18:08:40', '2023-10-16 18:48:25', NULL),
(11, 7, 2, 1, 7, 90, 1, 1, 1, 100, 85, 1, '2023-10-15 18:08:40', '2023-10-16 18:47:00', NULL),
(12, 7, 2, 1, 4, 22, 22, 22, 22, 100, 60, 1, '2023-10-15 18:08:40', '2023-10-16 18:47:24', NULL),
(13, 3, 2, 1, 4, 0, 2, 0, 50, 100, 60, 1, '2023-10-15 20:30:53', '2023-10-17 06:50:02', NULL),
(14, 15, 2, 1, 10, 32, 45, 3, 1, 100, 50, 14, '2023-10-16 09:13:47', '2023-10-28 18:11:42', NULL),
(15, 15, 4, 1, 7, 1, 34, 54, 1, 100, 85, 1, '2023-10-16 10:56:11', '2023-10-16 10:56:15', NULL),
(16, 3, 4, 1, 7, 0, 0, 0, 0, 100, 85, 1, '2023-10-16 10:57:10', '2023-10-16 16:27:49', NULL),
(17, 8, 4, 1, 7, 1, 22, 57, 3, 0, 0, 1, '2023-10-16 10:57:53', '2023-10-16 10:57:53', NULL),
(18, 8, 2, 1, 10, 1, 1, 2, 3, 100, 50, 1, '2023-10-16 12:02:58', '2023-10-16 12:02:58', NULL),
(19, 3, 2, 1, 10, 60, 10, 5, 12, 100, 50, 1, '2023-10-16 16:25:31', '2023-10-17 06:48:19', NULL),
(20, 3, 2, 1, 2, 60, 12, 12, 1, 100, 80, 1, '2023-10-16 16:25:51', '2023-10-17 06:48:48', NULL),
(21, 3, 2, 1, 8, 50, 12, 12, 17, 100, 80, 1, '2023-10-16 16:26:02', '2023-10-17 06:48:39', NULL),
(22, 3, 2, 1, 7, 60, 1, 15, 12, 100, 85, 1, '2023-10-16 16:26:11', '2023-10-17 06:48:55', NULL),
(23, 7, 2, 1, 10, 12, 34, 2, 3, 100, 50, 1, '2023-10-16 18:34:40', '2023-10-16 18:34:40', NULL),
(24, 15, 2, 1, 11, 12, 35, 21, 20, 100, 75, 14, '2023-10-16 19:11:09', '2023-10-28 18:11:42', NULL),
(25, 3, 2, 1, 11, 60, 4, 15, 19, 100, 75, 14, '2023-10-16 19:11:40', '2023-10-17 06:47:47', NULL),
(26, 17, 2, 5, 2, 3, 15, 56, 7, 100, 80, 2, '2023-10-26 18:20:37', '2024-01-09 21:38:01', 'fh'),
(27, 17, 2, 5, 4, 67, 15, 1, 5, 100, 85, 2, '2023-10-26 18:20:37', '2023-12-25 11:53:24', 'jkj'),
(28, 17, 2, 5, 1, 4, 56, 15, 11, 100, 80, 2, '2023-10-26 18:20:51', '2024-01-21 19:12:17', 'hg'),
(29, 6, 2, 4, 1, 12, 8, 51, 7, 100, 75, 1, '2023-10-27 07:16:20', '2023-12-25 12:17:37', '78'),
(30, 22, 2, 8, 8, 12, 12, 12, 12, 100, 100, 2, '2024-01-18 19:04:37', '2024-01-18 19:04:37', ''),
(31, 3, 2, 10, 2, 34, 34, 23, 5, 200, 23, 1, '2024-01-21 08:29:55', '2024-01-21 08:29:55', '');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notice_board`
--

CREATE TABLE `notice_board` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `notice_date` date DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notice_board`
--

INSERT INTO `notice_board` (`id`, `title`, `notice_date`, `publish_date`, `message`, `created_by`, `created_at`, `updated_at`) VALUES
(3, 'GAMES', '2023-10-23', '2023-10-17', 'Go to the pitch and play😊, a helthy mind is a healthy body.<br>', 1, '2023-10-17 12:48:21', '2023-10-17 17:55:51'),
(4, 'VISTATION DAY', '2023-10-09', '2023-10-18', 'The visitation day will be on next month<br>', 1, '2023-10-17 13:24:37', '2023-10-17 18:04:23');
INSERT INTO `notice_board` (`id`, `title`, `notice_date`, `publish_date`, `message`, `created_by`, `created_at`, `updated_at`) VALUES
(6, 'ECONOMICS TOUR', '2023-10-10', '2023-10-17', '<p style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 0px 0px 1.25em; color: rgb(55, 65, 81); font-family: Söhne, ui-sans-serif, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, Ubuntu, Cantarell, &quot;Noto Sans&quot;, sans-serif, &quot;Helvetica Neue&quot;, Arial, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: pre-wrap; background-color: rgb(247, 247, 248); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">An economics tour, often referred to as an economic field trip or study tour, is an educational excursion that focuses on various aspects of economics. These tours are designed to provide students, professionals, or anyone interested in economics with practical insights into economic concepts and real-world applications. Here are some key points to consider when discussing economics tours:</p><ol style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; list-style: none; margin: 1.25em 0px; padding: 0px; counter-reset: list-number 0; display: flex; flex-direction: column; color: rgb(55, 65, 81); font-family: Söhne, ui-sans-serif, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, Ubuntu, Cantarell, &quot;Noto Sans&quot;, sans-serif, &quot;Helvetica Neue&quot;, Arial, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: pre-wrap; background-color: rgb(247, 247, 248); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><li style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-bottom: 0px; margin-top: 0px; padding-left: 0.375em; counter-increment: list-number 1; display: block; min-height: 28px;\"><p style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 0px;\"><strong style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-weight: 600; color: var(--tw-prose-bold);\">Educational Opportunity:</strong> Economics tours offer participants a chance to gain hands-on experience and practical knowledge about economic principles and practices. It\'s an opportunity to move beyond textbooks and classrooms and see how economics functions in the real world.</p></li><li style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-bottom: 0px; margin-top: 0px; padding-left: 0.375em; counter-increment: list-number 1; display: block; min-height: 28px;\"><p style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 0px;\"><strong style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-weight: 600; color: var(--tw-prose-bold);\">Variety of Destinations:</strong> Economic field trips can take participants to various destinations, including financial centers, government institutions, manufacturing facilities, agricultural regions, and more. The choice of destination may depend on the specific focus of the tour.</p></li><li style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-bottom: 0px; margin-top: 0px; padding-left: 0.375em; counter-increment: list-number 1; display: block; min-height: 28px;\"><p style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 0px;\"><strong style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-weight: 600; color: var(--tw-prose-bold);\">Financial Institutions:</strong> Tours often include visits to financial institutions such as banks, stock exchanges, and central banks. Participants can learn about monetary policy, financial markets, and the role of banks in the economy.</p></li><li style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-bottom: 0px; margin-top: 0px; padding-left: 0.375em; counter-increment: list-number 1; display: block; min-height: 28px;\"><p style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 0px;\"><strong style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-weight: 600; color: var(--tw-prose-bold);\">Industry Visits:</strong> Some tours may focus on specific industries or sectors. For instance, an economics tour could take participants to an automobile factory to learn about production and supply chain economics.</p></li><li style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-bottom: 0px; margin-top: 0px; padding-left: 0.375em; counter-increment: list-number 1; display: block; min-height: 28px;\"><p style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 0px;\"><strong style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-weight: 600; color: var(--tw-prose-bold);\">Agriculture and Rural Economies:</strong> In agricultural regions, participants can learn about farming economics, commodity markets, and the impact of agriculture on the overall economy.</p></li><li style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-bottom: 0px; margin-top: 0px; padding-left: 0.375em; counter-increment: list-number 1; display: block; min-height: 28px;\"><p style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 0px;\"><strong style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-weight: 600; color: var(--tw-prose-bold);\">Government and Policy:</strong> Visits to government institutions and agencies provide insights into economic policy-making, fiscal and monetary policy, and regulation.</p></li><li style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-bottom: 0px; margin-top: 0px; padding-left: 0.375em; counter-increment: list-number 1; display: block; min-height: 28px;\"><p style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 0px;\"><strong style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-weight: 600; color: var(--tw-prose-bold);\">Global Economics:</strong> For a broader perspective, economics tours may include international destinations, allowing participants to explore global economic dynamics, trade, and international finance.</p></li><li style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-bottom: 0px; margin-top: 0px; padding-left: 0.375em; counter-increment: list-number 1; display: block; min-height: 28px;\"><p style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 0px;\"><strong style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-weight: 600; color: var(--tw-prose-bold);\">Networking Opportunities:</strong> These tours often offer participants the chance to network with professionals and experts in the field, which can be valuable for future career opportunities.</p></li><li style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-bottom: 0px; margin-top: 0px; padding-left: 0.375em; counter-increment: list-number 1; display: block; min-height: 28px;\"><p style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 0px;\"><strong style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-weight: 600; color: var(--tw-prose-bold);\">Educational Programs:</strong> Some tours may include workshops, seminars, or lectures by economists or industry experts to enhance participants\' understanding of economic concepts.</p></li><li style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-bottom: 0px; margin-top: 0px; padding-left: 0.375em; counter-increment: list-number 1; display: block; min-height: 28px;\"><p style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 0px;\"><strong style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-weight: 600; color: var(--tw-prose-bold);\">Practical Applications:</strong> Participants may have the opportunity to analyze economic data, conduct case studies, and engage in discussions to better understand how economic theories are applied in the real world.</p></li><li style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-bottom: 0px; margin-top: 0px; padding-left: 0.375em; counter-increment: list-number 1; display: block; min-height: 28px;\"><p style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 0px;\"><strong style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-weight: 600; color: var(--tw-prose-bold);\">Cultural and Social Aspects:</strong> Economics tours often include cultural and social experiences to enrich participants\' understanding of the economic context within a particular region or country.</p></li><li style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-bottom: 0px; margin-top: 0px; padding-left: 0.375em; counter-increment: list-number 1; display: block; min-height: 28px;\"><p style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 0px;\"><strong style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-weight: 600; color: var(--tw-prose-bold);\">Research and Documentation:</strong> Participants might be required to document their observations, conduct economic research, or prepare reports on the economic aspects of their tour.</p></li></ol><p style=\"border: 0px solid rgb(217, 217, 227); box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 1.25em 0px 0px; color: rgb(55, 65, 81); font-family: Söhne, ui-sans-serif, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, Ubuntu, Cantarell, &quot;Noto Sans&quot;, sans-serif, &quot;Helvetica Neue&quot;, Arial, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: pre-wrap; background-color: rgb(247, 247, 248); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Overall, economics tours provide a valuable educational experience by bridging the gap between theoretical knowledge and real-world economic practices. They can be particularly beneficial for students, researchers, and professionals seeking a deeper understanding of economics and its practical applications.</p>', 1, '2023-10-17 13:30:11', '2023-10-17 13:30:11');
INSERT INTO `notice_board` (`id`, `title`, `notice_date`, `publish_date`, `message`, `created_by`, `created_at`, `updated_at`) VALUES
(8, 'VOTING DAY', '2023-10-06', '2023-10-17', 'Be ready to vote next friday<br>', 1, '2023-10-17 14:57:23', '2023-10-17 14:57:23'),
(10, 'FIVE DAILY PRAYERS IS A MUST AT SCHOOL', '2023-10-10', '2023-10-27', 'Ensure that you pray five <b>times </b>a day to avoid <u>consequesnces</u>.<br>', 1, '2023-10-17 17:57:14', '2023-10-17 17:57:14'),
(11, 'SCIENCE TEACHERS SALARY INCREASE', '2024-01-18', '2024-01-31', 'The salary of science teachers has been raised<br>', 1, '2024-01-18 19:07:48', '2024-01-18 19:07:48');

-- --------------------------------------------------------

--
-- Table structure for table `notice_board_message`
--

CREATE TABLE `notice_board_message` (
  `id` int(11) NOT NULL,
  `notice_board_id` int(11) DEFAULT NULL,
  `message_to` int(11) DEFAULT NULL COMMENT 'user type',
  `created_by` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notice_board_message`
--

INSERT INTO `notice_board_message` (`id`, `notice_board_id`, `message_to`, `created_by`, `created_at`, `updated_at`) VALUES
(20, 8, 5, NULL, '2023-10-17 17:55:00', '2023-10-17 17:55:00'),
(21, 8, 3, NULL, '2023-10-17 17:55:00', '2023-10-17 17:55:00'),
(24, 10, 2, NULL, '2023-10-17 17:57:14', '2023-10-17 17:57:14'),
(27, 4, 2, NULL, '2023-10-17 18:04:23', '2023-10-17 18:04:23'),
(28, 4, 5, NULL, '2023-10-17 18:04:23', '2023-10-17 18:04:23'),
(29, 6, 2, NULL, '2023-10-18 09:19:37', '2023-10-18 09:19:37'),
(30, 3, 2, NULL, '2023-10-27 18:31:41', '2023-10-27 18:31:41'),
(33, 11, 3, NULL, '2024-01-18 19:07:48', '2024-01-18 19:07:48');

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
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `paypal_email` varchar(255) DEFAULT NULL,
  `stripe_key` varchar(500) DEFAULT NULL,
  `stripe_secret` varchar(500) DEFAULT NULL,
  `stripe_session_id` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `fevicon_icon` varchar(255) DEFAULT NULL,
  `school_name` varchar(100) DEFAULT NULL,
  `exam_description` text DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `paypal_email`, `stripe_key`, `stripe_secret`, `stripe_session_id`, `logo`, `fevicon_icon`, `school_name`, `exam_description`, `created_at`, `updated_at`) VALUES
(1, 'hhego94@gmail.com', 'pk_test_51MJycAFSBzPbzGC1bD845yNrYew0se8Nyy9Wioe0pwxYxhkMtcU4ZlwHaxIWnfMQpNKPPUzle1rZW0AhkPbBUG3600lkSsoXms', 'sk_test_51MJycAFSBzPbzGC1C9FkKOitiaEyqeCbdGyj07jKrOQmHndAFzIXIYoKbue8Y6BUU5MSWuGddVGfmGvu6TstIbkT00uWNhzt8f', NULL, '20231024020033bnwv2qcrkk.png', '20231024020033gyyvhsi8mm.png', 'The Ultimate Academia System', 'This report aims to deliver an assessment of the student\'s performance for the current academic term.', NULL, '2023-10-28 15:28:53');

-- --------------------------------------------------------

--
-- Table structure for table `student_add_fees`
--

CREATE TABLE `student_add_fees` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `total_amount` int(11) DEFAULT 0,
  `paid_amount` int(11) DEFAULT 0,
  `remaining_amount` int(11) DEFAULT 0,
  `payment_type` varchar(255) DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `is_payment` tinyint(4) NOT NULL DEFAULT 0,
  `payment_data` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_add_fees`
--

INSERT INTO `student_add_fees` (`id`, `student_id`, `class_id`, `total_amount`, `paid_amount`, `remaining_amount`, `payment_type`, `remark`, `is_payment`, `payment_data`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 1000000, 300000, 700000, 'Cash', 'paid', 1, NULL, 1, '2023-10-23 12:45:16', '2023-10-23 12:45:16'),
(2, 8, 1, 700000, 200000, 500000, 'Cash', 'again', 1, NULL, 1, '2023-10-23 12:46:38', '2023-10-23 12:46:38'),
(3, 8, 1, 500000, 100000, 400000, 'Cheque', 'paid', 1, NULL, 1, '2023-10-23 13:10:33', '2023-10-23 13:10:33'),
(4, 3, 1, 1000000, 400000, 600000, 'Cash', 'Paid at School', 1, NULL, 1, '2023-10-23 13:40:01', '2023-10-23 13:40:01'),
(5, 3, 1, 600000, 200000, 400000, 'Cheque', 'Paid In Stambic Bank', 1, NULL, 1, '2023-10-23 13:41:05', '2023-10-23 13:41:05'),
(6, 3, 1, 400000, 23, 399977, 'Stripe', 'd', 0, NULL, 3, '2023-10-23 14:18:42', '2023-10-23 14:18:42'),
(7, 7, 1, 1000000, 450000, 550000, 'Cash', 'Paid at Bursur\'s Office', 1, NULL, 1, '2023-10-24 08:32:27', '2023-10-24 08:32:27'),
(8, 3, 7, 900000, 20, 899980, 'Paypal', 'fdg', 0, NULL, 3, '2023-10-24 13:14:10', '2023-10-24 13:14:10'),
(9, 3, 7, 900000, 56, 899944, 'Paypal', NULL, 0, NULL, 3, '2023-10-24 13:14:53', '2023-10-24 13:14:53'),
(10, 3, 7, 900000, 56, 899944, 'Paypal', NULL, 0, NULL, 3, '2023-10-24 13:14:58', '2023-10-24 13:14:58'),
(11, 3, 7, 900000, 56, 899944, 'Paypal', NULL, 0, NULL, 3, '2023-10-24 13:17:48', '2023-10-24 13:17:48'),
(12, 3, 7, 900000, 56, 899944, 'Paypal', NULL, 0, NULL, 3, '2023-10-24 13:17:54', '2023-10-24 13:17:54'),
(13, 3, 7, 900000, 43, 899957, 'Paypal', NULL, 0, NULL, 3, '2023-10-24 13:19:54', '2023-10-24 13:19:54'),
(14, 6, 4, 957000, 700000, 257000, 'Cash', 'paid but in pain haha', 1, NULL, 1, '2023-10-26 11:49:16', '2023-10-26 11:49:16'),
(15, 17, 5, 750000, 70000, 680000, 'Cash', 'paid', 1, NULL, 1, '2023-10-26 15:08:06', '2023-10-26 15:08:06'),
(16, 3, 6, 800000, 2, 799998, 'Stripe', 'g', 0, NULL, 3, '2023-10-28 15:31:03', '2023-10-28 15:31:03'),
(17, 3, 6, 800000, 2, 799998, 'Stripe', 'g', 0, NULL, 3, '2023-10-28 15:33:12', '2023-10-28 15:33:12'),
(18, 3, 6, 800000, 2, 799998, 'Stripe', 'g', 0, NULL, 3, '2023-10-28 15:33:57', '2023-10-28 15:33:57'),
(19, 3, 6, 800000, 2, 799998, 'Stripe', 'g', 0, NULL, 3, '2023-10-28 15:34:17', '2023-10-28 15:34:17'),
(20, 3, 6, 800000, 2, 799998, 'Stripe', 'g', 0, NULL, 3, '2023-10-28 15:34:56', '2023-10-28 15:34:56'),
(21, 3, 6, 800000, 2, 799998, 'Stripe', 'g', 0, NULL, 3, '2023-10-28 15:35:29', '2023-10-28 15:35:29'),
(22, 3, 6, 800000, 2, 799998, 'Stripe', 'g', 0, NULL, 3, '2023-10-28 15:39:59', '2023-10-28 15:39:59'),
(23, 3, 6, 800000, 2, 799998, 'Stripe', 'g', 0, NULL, 3, '2023-10-28 15:43:12', '2023-10-28 15:43:12'),
(24, 22, 8, 800000, 30000, 770000, 'Cash', 'paid', 1, NULL, 1, '2023-12-17 01:59:53', '2023-12-17 01:59:53'),
(25, 22, 8, 770000, 200000, 570000, 'Cash', 'paid', 1, NULL, 1, '2023-12-25 13:26:33', '2023-12-25 13:26:33'),
(26, 16, 3, 892000, 500000, 392000, 'Cash', '200000', 1, NULL, 23, '2024-01-18 12:21:13', '2024-01-18 12:21:13'),
(27, 16, 3, 392000, 200000, 192000, 'Cheque', 'r', 1, NULL, 23, '2024-01-18 12:21:30', '2024-01-18 12:21:30'),
(28, 3, 6, 800000, 2, 799998, 'Paypal', 's', 0, NULL, 3, '2024-01-18 18:56:05', '2024-01-18 18:56:05'),
(29, 7, 1, 550000, 3, 549997, 'Paypal', 'e', 0, NULL, 7, '2024-01-30 14:10:12', '2024-01-30 14:10:12');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `attendance_date` date DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `attendance_type` int(11) DEFAULT NULL COMMENT '1.Present, 2.Late, \r\n3.Absent, 4.Half Day',
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`id`, `class_id`, `attendance_date`, `student_id`, `attendance_type`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-10-20', 15, 3, 1, '2023-10-20 07:03:47', '2023-10-20 07:04:35'),
(2, 1, '2023-10-20', 8, 1, 1, '2023-10-20 07:22:30', '2023-10-20 07:22:46'),
(3, 1, '2023-10-20', 7, 1, 1, '2023-10-20 07:22:32', '2023-10-20 07:22:32'),
(4, 1, '2023-10-20', 3, 1, 1, '2023-10-20 07:22:49', '2023-10-20 07:22:49'),
(5, 1, '2023-10-24', 15, 4, 1, '2023-10-23 09:10:02', '2023-10-23 09:10:06'),
(6, 5, '2023-10-28', 17, 1, 18, '2023-10-27 18:01:51', '2023-10-27 18:01:51'),
(7, 1, '2023-12-25', 15, 1, 1, '2023-12-25 12:47:54', '2023-12-25 12:48:02'),
(8, 1, '2023-12-25', 8, 1, 1, '2023-12-25 12:48:07', '2023-12-25 12:48:07'),
(9, 1, '2023-12-25', 7, 1, 1, '2023-12-25 12:48:16', '2023-12-25 12:48:16'),
(10, 5, '2024-01-18', 17, 1, 2, '2024-01-18 19:05:44', '2024-01-18 19:05:44'),
(11, 5, '2024-01-21', 17, 1, 2, '2024-01-21 19:53:55', '2024-01-21 19:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:Active, 1:Inactive',
  `is_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:not deleted, 1:deleted',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `type`, `created_by`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Math', 'Theory', 1, 0, 0, '2023-10-09 14:42:49', '2023-10-11 21:24:47'),
(2, 'English', 'Theory', 1, 0, 0, '2023-10-09 14:43:12', '2023-10-09 14:43:59'),
(3, 'Georgraphy', '0', 1, 0, 1, '2023-10-09 14:43:33', '2023-10-09 14:44:04'),
(4, 'Chemistry', 'Theory', 1, 0, 0, '2023-10-09 17:49:49', '2023-10-11 14:13:50'),
(5, 'Arabic', 'Theory', 1, 0, 0, '2023-10-12 19:13:13', '2023-10-12 19:15:39'),
(6, 'Quran', 'Theory', 1, 0, 0, '2023-10-12 19:13:52', '2023-10-12 19:16:16'),
(7, 'Computerized statistics', 'Theory', 1, 0, 0, '2023-10-12 19:14:15', '2023-10-12 19:16:41'),
(8, 'Economis', 'Theory', 1, 0, 0, '2023-10-12 19:14:41', '2023-10-13 05:42:59'),
(9, 'Biology', 'Practical', 1, 0, 0, '2023-10-12 19:15:02', '2023-10-12 19:15:59'),
(10, 'ISLAM PAPER 1', 'Theory', 1, 0, 0, '2023-10-16 09:11:33', '2023-10-16 19:07:56'),
(11, 'HISTORY', 'Theory', 1, 0, 0, '2023-10-16 19:07:41', '2023-10-16 19:07:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `admission_number` varchar(100) DEFAULT NULL,
  `roll_number` varchar(100) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `gender` varchar(15) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `caste` varchar(100) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `marital_status` varchar(50) DEFAULT NULL,
  `mobile_number` varchar(20) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `profile_pic` varchar(100) DEFAULT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `height` varchar(10) DEFAULT NULL,
  `weight` varchar(10) DEFAULT NULL,
  `occupation` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `permanent_address` varchar(100) DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1:Admin, 2:student, 3:Teacher, 4: bursar 5:Parent',
  `is_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:not deleted, 1:deleted',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:Active, 1:Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `work_experience` varchar(200) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `parent_id`, `name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `admission_number`, `roll_number`, `class_id`, `gender`, `date_of_birth`, `caste`, `religion`, `marital_status`, `mobile_number`, `qualification`, `admission_date`, `profile_pic`, `blood_group`, `height`, `weight`, `occupation`, `address`, `permanent_address`, `user_type`, `is_delete`, `status`, `created_at`, `updated_at`, `work_experience`, `note`) VALUES
(1, NULL, 'Admin', NULL, 'admin@gmail.com', NULL, '$2y$10$pev3huoNJ24W.wO0QHpCeOB4NAXg1PVzedo4bxboNVtmcM2jb/6Zu', 'GQVLKoWqfbrIOWDFWm53IvuKH5ZHrRR3uESXRWwFQGHmL98quOlzHouIBR5b', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '20231024114233mwmdlaxmvmy6lcmjhdkl.png', NULL, NULL, '', NULL, NULL, NULL, 1, 0, 0, NULL, '2024-01-31 08:07:49', NULL, NULL),
(2, NULL, 'Teacher', '', 'teacher@gmail.com', NULL, '$2y$10$pev3huoNJ24W.wO0QHpCeOB4NAXg1PVzedo4bxboNVtmcM2jb/6Zu', NULL, '', NULL, NULL, '', NULL, NULL, '', '', '12345678', '', '2023-10-27', NULL, NULL, NULL, '', NULL, '', '', 3, 0, 0, NULL, '2024-01-31 04:59:30', '', ''),
(3, 11, 'Student', 'Abdulkarim fahad', 'student@gmail.com', NULL, '$2y$10$pev3huoNJ24W.wO0QHpCeOB4NAXg1PVzedo4bxboNVtmcM2jb/6Zu', 'ogIKNN7aj6wrnmde2Ir32r7qEBYCdaJviInhfx1EyewakqYcb8JekIyAcpUo', '5', '900', 10, 'Male', '2023-10-03', 'Nubian', 'Muslim', NULL, '0707208954', NULL, NULL, '20231011093617spb3a3rzh2zxd1patcjc.png', 'B', '5 cm', '20kg', NULL, NULL, NULL, 2, 0, 0, NULL, '2024-01-21 17:10:06', NULL, NULL),
(4, 8, 'Parent', 'gss', 'parent@gmail.com', NULL, '$2y$10$pev3huoNJ24W.wO0QHpCeOB4NAXg1PVzedo4bxboNVtmcM2jb/6Zu', NULL, '', NULL, NULL, 'Other', NULL, NULL, '', NULL, '3434343434', NULL, NULL, '202310111103543zyz76ywkovprre3fowz.png', '', '', '', 'musezi', 'kampala', NULL, 5, 0, 0, NULL, '2023-10-11 08:04:21', NULL, NULL),
(5, NULL, 'fahad', NULL, 'hhego94@gmail.com', NULL, '$2y$10$J6I3SlZ9JizzGqaULwQj3OSVUWryRQs.FHQoG.gV3uXIyRyYWZ7XG', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1, 0, 0, '2023-10-09 11:16:38', '2023-10-09 11:20:20', NULL, NULL),
(6, 4, 'jamila', 'jam', 'hhego9904@gmail.com', NULL, '$2y$10$lP8sV650WiBRjmaE37DDL.PPXZ8uKrwp6ZVhehKls7.wiOtt09mcC', NULL, '7', '1', 4, 'Female', '2023-10-01', '90', 'sam', NULL, '0707208954', NULL, NULL, '20231009031431ktzo2vkqpwogxjjsaugupng', 'A', '5 cm', '20kg', NULL, NULL, NULL, 2, 0, 1, '2023-10-09 12:14:31', '2023-10-10 16:32:24', NULL, NULL),
(7, 11, 'mukisa', 'farook', 'hhego9974@gmail.com', NULL, '$2y$10$5hxKZo.CzsD7jgWHrpthgOIH5KHgr6m1fhou.iyNOjrGT.DrlF7C6', NULL, '3', '3', 1, 'Male', '2023-10-04', 'sam', 'islam', NULL, '0707208954', NULL, NULL, '20231009033724ismgkclstjdodaeicqfqpng', 'B', '3233', '20kg', NULL, NULL, NULL, 2, 0, 0, '2023-10-09 12:37:24', '2024-01-30 11:10:17', NULL, NULL),
(8, 4, 'Higeni', 'Abdulkarim', 'sd@gmail.com', NULL, '$2y$10$9VgvQkBq.Ek2nR/9Us7Ly.73s3ZenJUY0me3OCJ9VPsnstS.YT0qq', NULL, '5', '7', 1, 'Male', '2023-10-05', 'sd', 'sam', NULL, '0707208954', NULL, NULL, '20231009062421tntvajxh3zq9vzujuryx.png', 'B', '3233', 'ds', NULL, NULL, NULL, 2, 0, 0, '2023-10-09 13:31:54', '2023-10-15 09:09:39', NULL, NULL),
(9, 8, 'Hijaz', 'Finance', 'it@hijazfinance.com', NULL, '$2y$10$jZsgxUReOCoX5xY0mlXizuyPgsdhDvLvUMQzR/sHpVWoKgfUOZXSm', NULL, '23', '33', 5, 'Male', '2023-10-01', '12', 'islam', NULL, '00707208954', NULL, NULL, '20231009060303avtenseapm0ozta17cwopng', 'O', '5 cm', 'ds', NULL, NULL, NULL, 2, 1, 0, '2023-10-09 15:03:03', '2023-10-09 16:20:20', NULL, NULL),
(10, NULL, 'Higeni', 'Abdulkarim', 'hhego194@gmail.com', NULL, '$2y$10$qDGXC/xS4POr/jPgviA6HeLttgpTQoStuNcZY0K4sfH1VeDv4FI8G', NULL, NULL, NULL, NULL, 'Male', NULL, NULL, NULL, NULL, '0707208954', NULL, NULL, '20231010021349uorqwk5very0uhkkw9ui.png', NULL, NULL, NULL, 'stealer', 'kibuli', NULL, 5, 1, 0, '2023-10-10 11:13:49', '2023-10-10 12:00:28', NULL, NULL),
(11, NULL, 'Muzadde', 'Wabaana', 'kasasa@gmail.com', NULL, '$2y$10$FEWuisN11GXXQ.M2rt8uf.mqgN4Yx8E1Rb0PvcNZX9PdjmeUdb5.m', NULL, NULL, NULL, NULL, 'Male', NULL, NULL, NULL, NULL, '07000555055', NULL, NULL, '20231010074624mupropufqjky6eluxazu.png', NULL, NULL, NULL, 'musezi', 'kampala', NULL, 5, 0, 0, '2023-10-10 16:46:24', '2023-10-10 16:46:24', NULL, NULL),
(12, NULL, 'Higeni', 'Abdulkarim', 'hhego9433@gmail.com', NULL, '$2y$10$lpzs34u6jLCNHGWFVjmuZ.1J0DOiD57RHYREbxekoXxbAb4zIE2iS', NULL, NULL, NULL, NULL, 'Female', '2023-10-01', NULL, 'sam', '', '0707208954', 'masters', '2023-10-07', '20231010094402h6gx5gr8uiohakbonswd.png', NULL, NULL, NULL, NULL, 'kibuli', 'kampala', 3, 1, 0, '2023-10-10 18:44:02', '2023-10-11 02:01:41', '10 years', 'yes'),
(13, NULL, 'Maganjo', 'male', 'hhego99412@gmail.com', NULL, '$2y$10$TyLnKnFgZsDMZ.QfpdnI0.BlyCUvqpc7uNUPdTrbfOalRB1bzcykm', NULL, NULL, NULL, NULL, 'Male', '2023-10-01', NULL, 'islama', '', '0707208954', 'Diploma in Education', '2023-10-01', '20231011075437ck8nuc33yfyyvbkjfmu9.png', 'B', NULL, NULL, NULL, 'kibuli', 'kampala', 3, 0, 0, '2023-10-11 02:15:38', '2024-01-31 06:28:04', '10 years', 'yes'),
(14, NULL, 'Mr. Kalule', 'Sadam', 'sadam@gmail.com', NULL, '$2y$10$MfN.YJafzbEmjXWnE.ouEOfz.I5Cm7QCVptLXuMBviGVcELx25ggG', NULL, NULL, NULL, NULL, 'Male', '2023-10-12', NULL, 'islam', 'married', '070993390', 'masters', '2023-10-12', '20231012064419furh2mfqhocddhyoijk2.png', NULL, NULL, NULL, NULL, 'kibuli', 'kamwokya', 3, 0, 0, '2023-10-12 03:44:19', '2023-10-12 03:44:19', '10 years', 'Serious'),
(15, 11, 'Mayanja', 'sam', 'sam@gmail.com', NULL, '$2y$10$AYgGmyB3Aig8e4F67kfW1e1Nq/o4KgrG/ZkI3eW7DWURbE32l64Xm', NULL, '12', '12', 1, 'Male', '2023-10-01', 'muganda', 'muslim', NULL, '075598821', NULL, '2023-10-01', '202310120836490l0ysaeljvlx3tvkifwh.png', 'A', '5 cm', '20kg', NULL, NULL, NULL, 2, 0, 0, '2023-10-12 05:36:49', '2023-10-15 09:09:20', NULL, NULL),
(16, NULL, 'Adam', 'Sulaiman', 'adam@gmail.com', NULL, '$2y$10$aK/G6pbMKM.Qhle0U2qjpeWWWRfkd5lPZlSztNp655FfB8iwCf5GW', NULL, '21', '12', 3, 'Male', '2023-09-24', 'Muganda', 'Muslim', NULL, '0789912003', NULL, '2023-10-19', '20231019084300uffalnz6cbjvushbe9nl.png', 'B', '56cm', '200kg', NULL, NULL, NULL, 2, 0, 0, '2023-10-19 15:13:13', '2023-10-19 17:43:00', NULL, NULL),
(17, 19, 'Makubuya', 'Adam', 'makubuya@gmail.com', NULL, '$2y$10$YhWjRFSuU31ub8iTDsTgZuZ0zn42dO1bk1KSSabStLH/Skv3/lbP.', NULL, '21', '34', 5, 'Male', '2023-10-08', 'Mugisu', 'Muslim', NULL, '078982213', NULL, '2023-10-24', '20231024110443s9zebveqeapu9wgp8db6.jpeg', 'A', '500 cm', '400 Kgs', NULL, NULL, NULL, 2, 0, 0, '2023-10-24 08:04:43', '2024-01-21 16:08:55', NULL, NULL),
(18, NULL, 'TEST', NULL, 'katulabye@gmail.com', NULL, '$2y$10$a56to.FCQd3ccJxlK38/auBpKC0TBGldK9NTxG/C/p1JFrANTdP42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, '2023-10-26 12:15:58', '2023-10-26 12:15:58', NULL, NULL),
(19, NULL, 'Jackob', 'jhvjh', 'jhh@gmail.com', NULL, '$2y$10$szcj2IPZIEulveSQLN/wCemkwyQRPfLWhLI1XRORaDLttjQ.uEn1C', 'tgQ1Urb4hegJ8iGz6gz6Hy4vXLw4G3jrPrirhVPFRPhg4PzpRgPRjvuCNl93', NULL, NULL, NULL, 'Female', NULL, NULL, NULL, NULL, '877677676', NULL, NULL, '20231026054320cqv8q14afhcxavlhs7ch.png', NULL, NULL, NULL, 'kkjk', 'd', NULL, 5, 0, 0, '2023-10-26 14:43:20', '2023-10-27 21:38:03', NULL, NULL),
(20, NULL, 'BRYAN', 'CASH', 'arafa@gmail.com', NULL, '$2y$10$Zu1cgGMkWNqAMgTTX/VbfemIB5hTAs0Nsxcq92fxgLp7TODdAeiz6', NULL, NULL, NULL, NULL, 'Male', '1000-12-31', NULL, 'dsfasd', 'Single and Contented', '32877877', 'Degree', '2023-10-26', NULL, 'A', NULL, NULL, NULL, 'fadf', '323233', 3, 0, 0, '2023-10-26 14:56:20', '2024-01-31 06:27:23', 'adsaf', '\"As an experienced and dedicated educator, I am committed to fostering a positive and inclusive learning environment. My teaching philosophy revolves around creating engaging lessons that cater to diverse learning styles and abilities. I believe in the po'),
(21, NULL, 'Test', 'Student', 'test@gmail.com', NULL, '$2y$10$rpcArXZxEH8FFzi5YlPll.EEGSTKy6Ueyk.OM5m1ze4r6buATsydi', NULL, '121', '121', 3, 'Male', '1788-02-14', 'df', 'srdsdf', NULL, '45455544', NULL, '2023-10-27', '20231027123113yrgfdsb05f77xjih9dlt.png', 'B', 'f', 'sdf', NULL, NULL, NULL, 2, 0, 0, '2023-10-27 09:31:14', '2023-10-27 09:31:56', NULL, NULL),
(22, 19, 'Bakulumpagi', 'Abdunoor', 'abdunoor@gmail.com', NULL, '$2y$10$CCWw7fPdBVQFdWPii1gzveM.olmT55Fg805AuvFLx.KFjcXRckW9O', NULL, '131', '131', 8, 'Male', '2023-10-01', 'Munyoli', 'Muslim', NULL, '07892145', NULL, '2023-10-28', '20231028124226z1zo7fuzhod6rlogobzc.png', 'A', '67 cm', '909 kg', NULL, NULL, NULL, 2, 0, 0, '2023-10-27 19:38:27', '2023-10-27 21:42:26', NULL, NULL),
(23, NULL, 'Bursar Fardah', NULL, 'farda@gmail.com', NULL, '$2y$10$wGuD5LWbs52/Uz8yoOwzhuVfIqN503zttqo4ZJdR34ObXQvtZHvmW', 'mhltkYDran7iLcYiamiGxF02uLRkQpmX6O6a15Wgp0PoaS4lOxOXwjZY25N0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '20231225050622nszwxbcarse2puaidxmx.png', NULL, NULL, NULL, NULL, NULL, NULL, 4, 0, 0, '2023-12-25 14:06:22', '2024-01-18 15:49:37', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `week`
--

CREATE TABLE `week` (
  `id` int(11) NOT NULL,
  `name` varchar(15) DEFAULT NULL,
  `fullcalendar_day` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `week`
--

INSERT INTO `week` (`id`, `name`, `fullcalendar_day`, `created_at`, `updated_at`) VALUES
(1, 'Monday', 1, NULL, NULL),
(2, 'Tuesday', 2, NULL, NULL),
(3, 'Wednesday', 3, NULL, NULL),
(4, 'Thursday', 4, NULL, NULL),
(5, 'Friday', 5, NULL, NULL),
(6, 'Saturday', 6, NULL, NULL),
(7, 'Sunday', 7, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_class_teacher`
--
ALTER TABLE `assign_class_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_subject`
--
ALTER TABLE `class_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_subject_timetable`
--
ALTER TABLE `class_subject_timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homework_submit`
--
ALTER TABLE `homework_submit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks_grade`
--
ALTER TABLE `marks_grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks_register`
--
ALTER TABLE `marks_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_board`
--
ALTER TABLE `notice_board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_board_message`
--
ALTER TABLE `notice_board_message`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_add_fees`
--
ALTER TABLE `student_add_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `week`
--
ALTER TABLE `week`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_class_teacher`
--
ALTER TABLE `assign_class_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `budget`
--
ALTER TABLE `budget`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `class_subject`
--
ALTER TABLE `class_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `class_subject_timetable`
--
ALTER TABLE `class_subject_timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homework`
--
ALTER TABLE `homework`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `homework_submit`
--
ALTER TABLE `homework_submit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `marks_grade`
--
ALTER TABLE `marks_grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `marks_register`
--
ALTER TABLE `marks_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notice_board`
--
ALTER TABLE `notice_board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notice_board_message`
--
ALTER TABLE `notice_board_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_add_fees`
--
ALTER TABLE `student_add_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `week`
--
ALTER TABLE `week`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
