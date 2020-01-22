-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2019 at 10:53 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drivingschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `sub_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `sub_id`, `created_at`) VALUES
(1, 'المدرسه', 0, '2019-08-27 15:44:26'),
(2, 'الورشه', 0, '2019-08-27 15:44:26'),
(3, 'كهرباء', 1, '2019-08-27 15:44:26'),
(4, 'نفايات', 1, '2019-08-27 15:44:26'),
(5, 'التنكر', 0, '2019-08-27 16:27:11'),
(6, 'النضافة', 2, '2019-08-27 16:33:23'),
(7, 'المغسله', 0, '2019-08-27 16:37:24');

-- --------------------------------------------------------

--
-- Table structure for table `accounts_log`
--

CREATE TABLE `accounts_log` (
  `id` int(11) NOT NULL,
  `amunt` int(11) NOT NULL,
  `note` text NOT NULL,
  `accounts_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts_log`
--

INSERT INTO `accounts_log` (`id`, `amunt`, `note`, `accounts_id`, `created_at`) VALUES
(1, 1000, 'كهربا المدرسة ', 3, '2019-08-27 16:56:44'),
(2, 1000, 'النفايات', 4, '2019-08-27 16:56:44'),
(3, 1000, 'النفايات', 5, '2019-08-27 16:56:44'),
(4, 1500, 'مشتريا جديده للورشه', 3, '2019-08-28 07:52:41'),
(5, 240, 'نفايات شهر 7', 4, '2019-08-28 07:56:15'),
(6, 500, '', 3, '2019-08-28 10:01:59'),
(7, 1200, '', 6, '2019-10-22 16:27:06'),
(8, 1500, 'l;', 3, '2019-10-28 09:23:47');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `model` varchar(20) NOT NULL,
  `car_nmuber` varchar(100) NOT NULL,
  `insurance_starting_date` varchar(20) NOT NULL,
  `insurance_ending_date` varchar(20) NOT NULL,
  `license_date` varchar(20) NOT NULL,
  `manufacturing` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `model`, `car_nmuber`, `insurance_starting_date`, `insurance_ending_date`, `license_date`, `manufacturing`, `created_at`) VALUES
(1, 'اتوس ', '2007', 'KH 20154', '2019-08-27', '2019-08-27', '2019-08-27', 'جياد', '2019-08-27 13:32:20'),
(2, 'ahmed', 'dd', 'dd', '2019-08-27', '2019-08-27', '2019-08-27', 'ماتسوبشى', '2019-08-27 13:32:13'),
(3, 'زوبه العجيبه', '2019-08-15', '212121', '2019-08-27', '2019-08-27', '2019-08-27', 'تايوتا', '2019-08-27 13:32:07'),
(4, 'بوكس 2018', '2018-01-01', 'KH 5455', '2019-08-27', '2019-08-27', '2019-08-27', 'اتوس', '2019-08-27 13:32:00'),
(5, 'بيكانتو', '2000-01-01', 'KM 524', '2019-08-27', '2019-08-27', '2019-08-27', 'هونداى', '2019-08-27 12:11:16');

-- --------------------------------------------------------

--
-- Table structure for table `category_courses`
--

CREATE TABLE `category_courses` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0' COMMENT 'نوع الحصه عاديه ولا جمعه ولا حصه واحده عاديه 0 1  - 2',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_courses`
--

INSERT INTO `category_courses` (`id`, `name`, `type`, `created_at`) VALUES
(1, 'قير عادي', 0, '2019-07-30 08:05:51'),
(2, 'قير عادي VIP', 0, '2019-07-30 08:05:51'),
(3, 'قير اوتامتيك', 0, '2019-07-30 08:05:51'),
(4, 'قير اوتامتك VIP', 0, '2019-07-30 08:05:51'),
(5, 'العرض البلاتيني تدريب عادي', 0, '2019-07-30 08:05:51'),
(6, 'العرض البلاتيني تدريب اوتامتيك', 0, '2019-07-30 08:05:51'),
(7, 'حصص اضافيه', 1, '2019-07-30 08:05:51');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `trainees_course_id` int(11) NOT NULL,
  `class_date` varchar(20) NOT NULL,
  `class_time` varchar(5) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `stratus` int(11) NOT NULL DEFAULT '0' COMMENT 'حاله اكلاس 0 لم يتم تدريسه 1 تم تدريبخ 2 غياب',
  `type` int(11) NOT NULL DEFAULT '0',
  `color_style` varchar(250) NOT NULL DEFAULT 'red',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `trainees_course_id`, `class_date`, `class_time`, `trainer_id`, `stratus`, `type`, `color_style`, `created_at`) VALUES
(1, 1, '2019-10-29', '7', 1, 1, 0, 'red', '2019-10-28 12:27:18'),
(2, 1, '2019-10-30', '8', 18, 3, 0, 'red', '2019-10-28 14:14:59'),
(3, 1, '2019-10-30', '8', 1, 3, 0, 'red', '2019-10-28 14:14:59'),
(4, 1, '2019-11-02', '8', 1, 3, 0, 'red', '2019-10-28 12:29:37'),
(5, 1, '2019-11-03', '6', 17, 3, 0, 'red', '2019-10-28 14:14:59'),
(6, 1, '2019-11-04', '8', 1, 3, 0, 'red', '2019-10-28 12:51:05'),
(7, 1, '2019-10-30', '6', 2, 3, 0, 'red', '2019-10-28 14:14:59'),
(8, 1, '2019-11-03', '6', 18, 3, 0, 'red', '2019-10-28 14:14:59'),
(9, 1, '2019-11-02', '6', 18, 3, 0, 'red', '2019-10-28 14:14:59'),
(10, 1, '2019-11-02', '6', 1, 3, 0, 'red', '2019-10-28 14:14:59'),
(11, 1, '2019-11-01', '6', 1, 3, 0, 'red', '2019-10-28 14:14:59'),
(12, 1, '2019-11-01', '6', 18, 3, 0, 'red', '2019-10-28 14:14:59'),
(13, 1, '2019-11-01', '6', 2, 2, 0, 'red', '2019-11-05 09:53:07'),
(14, 1, '2019-11-01', '6', 3, 2, 0, 'red', '2019-11-05 09:53:07'),
(15, 2, '2019-11-17', '15', 12, 0, 0, 'red', '2019-11-05 09:51:51'),
(16, 2, '2019-11-18', '15', 12, 0, 0, 'red', '2019-11-05 09:51:51'),
(17, 2, '2019-11-19', '15', 12, 0, 0, 'red', '2019-11-05 09:51:51'),
(18, 2, '2019-11-20', '15', 12, 0, 0, 'red', '2019-11-05 09:51:51'),
(19, 2, '2019-11-21', '15', 12, 0, 0, 'red', '2019-11-05 09:51:51'),
(20, 2, '2019-11-23', '15', 12, 0, 0, 'red', '2019-11-05 09:51:51'),
(21, 2, '2019-11-24', '15', 12, 0, 0, 'red', '2019-11-05 09:51:51'),
(22, 2, '2019-11-25', '15', 12, 0, 0, 'red', '2019-11-05 09:51:51'),
(23, 2, '2019-11-26', '15', 12, 0, 0, 'red', '2019-11-05 09:51:51'),
(24, 2, '2019-11-27', '15', 12, 0, 0, 'red', '2019-11-05 09:51:51'),
(25, 2, '2019-11-28', '15', 12, 0, 0, 'red', '2019-11-05 09:51:51'),
(26, 2, '2019-11-30', '15', 12, 0, 0, 'red', '2019-11-05 09:51:51'),
(27, 2, '2019-12-01', '15', 12, 0, 0, 'red', '2019-11-05 09:51:51'),
(28, 2, '2019-12-02', '15', 12, 0, 0, 'red', '2019-11-05 09:51:51'),
(29, 3, '2019-11-09', '9', 10, 0, 0, 'red', '2019-11-05 13:01:42'),
(30, 3, '2019-11-10', '9', 10, 0, 0, 'red', '2019-11-05 13:01:42'),
(31, 3, '2019-11-11', '9', 10, 0, 0, 'red', '2019-11-05 13:01:42'),
(32, 3, '2019-11-12', '9', 10, 0, 0, 'red', '2019-11-05 13:01:42'),
(33, 3, '2019-11-13', '9', 10, 0, 0, 'red', '2019-11-05 13:01:42'),
(34, 3, '2019-11-14', '9', 10, 0, 0, 'red', '2019-11-05 13:01:42'),
(35, 3, '2019-11-16', '9', 10, 0, 0, 'red', '2019-11-05 13:01:42'),
(36, 4, '2019-12-17', '12', 14, 0, 0, 'red', '2019-11-05 13:46:42'),
(37, 4, '2019-11-17', '12', 14, 0, 0, 'red', '2019-11-05 13:42:36'),
(38, 4, '2019-12-15', '12', 14, 0, 0, 'red', '2019-11-05 13:47:20'),
(39, 4, '2019-11-19', '12', 14, 0, 0, 'red', '2019-11-05 13:42:36'),
(40, 4, '2019-12-12', '12', 14, 0, 0, 'red', '2019-11-05 13:47:46'),
(41, 4, '2019-11-21', '12', 14, 0, 0, 'red', '2019-11-05 13:42:37'),
(42, 4, '2019-12-10', '12', 14, 0, 0, 'red', '2019-11-05 13:48:19'),
(43, 4, '2019-11-24', '12', 14, 0, 0, 'red', '2019-11-05 13:42:37'),
(44, 4, '2019-12-05', '12', 14, 0, 0, 'red', '2019-11-05 13:49:00'),
(45, 4, '2019-11-26', '12', 14, 0, 0, 'red', '2019-11-05 13:42:37'),
(46, 4, '2019-12-03', '12', 14, 0, 0, 'red', '2019-11-05 13:49:47'),
(47, 4, '2019-11-28', '12', 14, 0, 0, 'red', '2019-11-05 13:42:37'),
(48, 4, '2019-12-19', '12', 14, 0, 0, 'red', '2019-11-05 13:53:06'),
(49, 4, '2019-12-01', '12', 14, 0, 0, 'red', '2019-11-05 13:42:37'),
(50, 5, '2019-11-23', '16', 2, 0, 0, 'red', '2019-11-05 13:58:25'),
(51, 5, '2019-11-24', '16', 2, 0, 0, 'red', '2019-11-05 13:58:25'),
(52, 5, '2019-11-25', '16', 2, 0, 0, 'red', '2019-11-05 13:58:25'),
(53, 5, '2019-11-26', '16', 2, 0, 0, 'red', '2019-11-05 13:58:25'),
(54, 5, '2019-11-27', '16', 2, 0, 0, 'red', '2019-11-05 13:58:25'),
(55, 5, '2019-11-28', '16', 2, 0, 0, 'red', '2019-11-05 13:58:25'),
(56, 5, '2019-11-30', '16', 2, 0, 0, 'red', '2019-11-05 13:58:25'),
(57, 6, '2019-11-18', '15', 17, 0, 0, 'red', '2019-11-05 14:00:37'),
(58, 6, '2019-11-19', '15', 17, 0, 0, 'red', '2019-11-05 14:00:37'),
(59, 6, '2019-11-20', '15', 17, 0, 0, 'red', '2019-11-05 14:00:37'),
(60, 6, '2019-11-21', '15', 17, 0, 0, 'red', '2019-11-05 14:00:37'),
(61, 6, '2019-11-23', '15', 17, 0, 0, 'red', '2019-11-05 14:00:37'),
(62, 6, '2019-11-24', '15', 17, 0, 0, 'red', '2019-11-05 14:00:37'),
(63, 6, '2019-11-25', '15', 17, 0, 0, 'red', '2019-11-05 14:00:37'),
(64, 6, '2019-11-26', '15', 17, 0, 0, 'red', '2019-11-05 14:00:37'),
(65, 6, '2019-11-27', '15', 17, 0, 0, 'red', '2019-11-05 14:00:37'),
(66, 6, '2019-11-28', '15', 17, 0, 0, 'red', '2019-11-05 14:00:37'),
(67, 6, '2019-11-30', '15', 17, 0, 0, 'red', '2019-11-05 14:00:38'),
(68, 6, '2019-12-01', '15', 17, 0, 0, 'red', '2019-11-05 14:00:38'),
(69, 6, '2019-12-02', '15', 17, 0, 0, 'red', '2019-11-05 14:00:38'),
(70, 6, '2019-12-03', '15', 17, 0, 0, 'red', '2019-11-05 14:00:38'),
(71, 7, '2019-11-23', '16', 9, 0, 0, 'red', '2019-11-06 08:37:34'),
(72, 7, '2019-11-24', '16', 9, 0, 0, 'red', '2019-11-06 08:37:34'),
(73, 7, '2019-11-25', '16', 9, 0, 0, 'red', '2019-11-06 08:37:34'),
(74, 7, '2019-11-26', '16', 9, 0, 0, 'red', '2019-11-06 08:37:34'),
(75, 7, '2019-11-27', '16', 9, 0, 0, 'red', '2019-11-06 08:37:34'),
(76, 7, '2019-11-28', '16', 9, 0, 0, 'red', '2019-11-06 08:37:34'),
(77, 7, '2019-11-30', '16', 9, 0, 0, 'red', '2019-11-06 08:37:34'),
(78, 8, '2019-11-14', '17', 17, 0, 0, 'red', '2019-11-06 09:47:17'),
(79, 8, '2019-11-16', '17', 17, 0, 0, 'red', '2019-11-06 09:47:18'),
(80, 8, '2019-11-17', '17', 17, 0, 0, 'red', '2019-11-06 09:47:18'),
(81, 8, '2019-11-18', '17', 17, 0, 0, 'red', '2019-11-06 09:47:18'),
(82, 8, '2019-11-19', '17', 17, 0, 0, 'red', '2019-11-06 09:47:18'),
(83, 8, '2019-11-20', '17', 17, 0, 0, 'red', '2019-11-06 09:47:18'),
(84, 8, '2019-11-21', '17', 17, 0, 0, 'red', '2019-11-06 09:47:18');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `allowance` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `number_of_days` int(11) NOT NULL,
  `vip` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `price`, `name`, `allowance`, `category_id`, `number_of_days`, `vip`, `created_at`) VALUES
(1, 1400, 'تدريب عادي 7 ايام', 20, 1, 7, 1, '2019-08-31 18:17:56'),
(2, 1400, 'تدريب عادي 21 يام', 30, 1, 21, 1, '2019-09-20 15:14:11'),
(3, 5000, 'الدورة اخر شى ', 40, 5, 10, 1, '2019-09-20 15:14:15'),
(4, 2100, 'تدريب عادي 10 ايام', 0, 1, 10, 0, '2019-10-13 11:19:14'),
(5, 2600, 'تدريب عادي 14 يوم', 0, 1, 14, 0, '2019-10-13 11:19:53'),
(6, 5100, 'تدريب عادي 28 يوم', 0, 1, 28, 0, '2019-10-13 11:20:28'),
(7, 2800, 'قير عادي vip ', 0, 2, 10, 1, '2019-10-14 14:35:39'),
(8, 1600, 'قير اتوماتيك يوم7', 0, 3, 7, 1, '2019-10-14 15:27:18'),
(9, 2300, 'قير اتوماتيك 10يوم', 0, 3, 10, 0, '2019-10-15 12:27:27'),
(10, 3300, 'قير اتوماتيك 14يوم', 0, 3, 14, 0, '2019-10-15 12:24:17'),
(11, 4200, 'قير اتوماتيك 21 يوم', 0, 3, 21, 0, '2019-10-15 12:26:47'),
(12, 5600, 'قير اتوماتيك 28 يوم', 0, 3, 28, 0, '2019-10-15 12:28:30'),
(13, 2300, 'قير اتوماتيك يوم7 vip', 0, 1, 7, 1, '2019-10-15 12:31:53'),
(14, 3000, 'قير اتوماتيك 10يوم vip', 0, 4, 10, 1, '2019-10-15 12:31:16'),
(15, 4200, 'قير اتوماتيك 14يوم vip', 0, 4, 14, 1, '2019-10-15 12:30:59'),
(16, 5100, 'قير اتوماتيك 21 يوم vip', 0, 4, 21, 1, '2019-10-15 12:32:51'),
(17, 6600, 'قير اتوماتيك 28 يوم vip', 0, 4, 28, 1, '2019-10-15 12:33:36'),
(18, 2300, 'قير اتوماتيك 7يوم vip', 0, 4, 7, 1, '2019-10-15 12:35:44'),
(19, 500, 'حصه بلاتين 500 جنيه', 20, 7, 1, 0, '2019-10-17 11:11:55');

-- --------------------------------------------------------

--
-- Table structure for table `fuel_history`
--

CREATE TABLE `fuel_history` (
  `id` int(11) NOT NULL,
  `number_of_tickets` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `odometer` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `trainer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fuel_tickets`
--

CREATE TABLE `fuel_tickets` (
  `id` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fuel_tickets`
--

INSERT INTO `fuel_tickets` (`id`, `balance`, `created_at`) VALUES
(1, 100, '2019-10-28 09:24:07');

-- --------------------------------------------------------

--
-- Table structure for table `international_license_info`
--

CREATE TABLE `international_license_info` (
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qyt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `international_license_log`
--

CREATE TABLE `international_license_log` (
  `id` int(11) NOT NULL,
  `qyt` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `international_license_log`
--

INSERT INTO `international_license_log` (`id`, `qyt`, `created_at`) VALUES
(1, 100, '2019-10-15 15:07:18'),
(2, 12, '2019-10-15 15:07:31'),
(3, 12, '2019-10-22 12:36:01');

-- --------------------------------------------------------

--
-- Table structure for table `international_license_trainees`
--

CREATE TABLE `international_license_trainees` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `trainer` int(11) NOT NULL,
  `price` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `school_id` varchar(30) NOT NULL,
  `pay` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `international_license_trainees`
--

INSERT INTO `international_license_trainees` (`id`, `name`, `phone`, `trainer`, `price`, `user_id`, `school_id`, `pay`, `created_at`) VALUES
(1, 'احمد حمد يوسف', '24991590.3708', 4, '2100', 0, '', 0, '2019-10-22 10:42:32'),
(2, 'احمد محمد ابراهيم', '2454545445', 10, '2100', 0, '', 0, '2019-10-22 10:46:41'),
(3, 'احمد حمد يوسف', '2545454545', 0, '2100', 0, '', 0, '2019-10-22 11:00:14'),
(4, 'عبدالمنعم الواثق', '249915903708', 2, '2100', 0, '', 0, '2019-10-22 12:33:45'),
(5, 'براءه السيد ', '2545454545', 0, '2100', 0, '', 0, '2019-10-22 12:36:21'),
(6, 'منير احمد محمد', '0918221180', 0, '2100', 0, '', 0, '2019-10-26 10:27:30'),
(7, 'على ابراهيم محمد', '+249923400239', 9, '2100', 1, 'اكاديميه جدو ام درمان', 0, '2019-10-26 11:11:21'),
(8, 'على ابراهيم محمد', '+249923400239', 9, '2100', 1, 'اكاديميه جدو ام درمان', 0, '2019-10-26 11:11:52'),
(9, 'على ابراهيم محمد', '+249923400239', 9, '2100', 1, 'اكاديميه جدو ام درمان', 0, '2019-10-26 11:14:23'),
(10, 'على ابراهيم محمد', '+249923400239', 9, '2100', 1, 'اكاديميه جدو ام درمان', 0, '2019-10-26 11:14:44'),
(11, 'على ابراهيم محمد', '+249923400239', 9, '2100', 1, 'اكاديميه جدو ام درمان', 0, '2019-10-26 11:15:06'),
(12, 'على ابراهيم محمد', '+249923400239', 9, '2100', 1, 'اكاديميه جدو ام درمان', 0, '2019-10-26 11:17:07'),
(13, 'منير احمد محمد', '0918221180', 0, '2100', 1, 'اكاديميه جدو ام درمان', 0, '2019-10-26 11:18:19'),
(14, 'عثمان علي عبدالله', '0917205713', 0, '2100', 2, 'اكاديميه جدو الخرطوم', 2100, '2019-10-27 09:17:21');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` int(11) NOT NULL,
  `amunt` int(11) NOT NULL,
  `user_type` varchar(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `pay` int(11) NOT NULL DEFAULT '0' COMMENT 'هل تم الصرف ام لا 0 لم يتم الصرف 1 تم الصرف',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `amunt`, `user_type`, `status`, `pay`, `user_id`, `created_at`) VALUES
(1, 300, 'trainers', 1, 0, 4, '2019-10-26 13:50:13'),
(2, 300, 'trainers', 2, 0, 4, '2019-10-26 13:51:07');

-- --------------------------------------------------------

--
-- Table structure for table `schols`
--

CREATE TABLE `schols` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schols`
--

INSERT INTO `schols` (`id`, `name`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'اكاديميه جدو الخرطوم', '', '2019-10-20 09:02:35', '2019-10-20 09:02:35'),
(2, 'اكاديميه جدو ام درمان', '', '2019-10-20 09:02:42', '2019-10-20 09:02:42');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `name`, `created_at`) VALUES
(1, 'المخزن الرئسيى المدرسه المكتب', '2019-08-28 12:06:37'),
(2, 'المخزن الرئسيى المدرسه المخزن', '2019-08-28 12:06:37'),
(3, 'المخزن الرئسيى البيت', '2019-08-28 12:06:37');

-- --------------------------------------------------------

--
-- Table structure for table `stock_cat`
--

CREATE TABLE `stock_cat` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock_cat`
--

INSERT INTO `stock_cat` (`id`, `name`) VALUES
(1, 'السيارات والديترات');

-- --------------------------------------------------------

--
-- Table structure for table `stock_prodcts`
--

CREATE TABLE `stock_prodcts` (
  `id` int(11) NOT NULL,
  `stock_cat_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `prodect_code` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `trainees`
--

CREATE TABLE `trainees` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `invited_from` varchar(250) NOT NULL,
  `complete` int(11) NOT NULL DEFAULT '0',
  `school_id` int(11) NOT NULL,
  `emplyee_id` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trainees`
--

INSERT INTO `trainees` (`id`, `name`, `phone`, `address`, `invited_from`, `complete`, `school_id`, `emplyee_id`, `created_at`) VALUES
(1, 'فاطمه محمد الطيب', '092273140', 'ام درمان', '', 0, 1, 2, '2019-10-28 10:40:26'),
(2, 'يسيرية عثمان صالح', '0911337717', 'ام درمان', '', 0, 1, 2, '2019-11-05 09:51:02'),
(3, 'النور محمد موسي', '0909966257', 'ام درمان', '', 0, 1, 2, '2019-11-05 13:00:59'),
(4, 'زينب عيسي احمد', '0116335738', 'ام درمان', '', 0, 1, 2, '2019-11-05 13:41:02'),
(5, 'عثمان عدالرحمن عثمان', '0915090021', 'ام درمان', '', 0, 1, 2, '2019-11-05 13:57:52'),
(6, 'سحر الجزولي عدالرحمن', '093003854', 'ام درمان', '', 0, 1, 2, '2019-11-05 14:00:12'),
(7, 'نزار ايشر عثمان', '0961455007', 'ام درمان', '', 0, 1, 2, '2019-11-06 08:37:03'),
(8, 'ابرار طارق ابراهيم', '0100424953', 'ام درمان', '', 0, 1, 2, '2019-11-06 09:46:38');

-- --------------------------------------------------------

--
-- Table structure for table `trainees_course`
--

CREATE TABLE `trainees_course` (
  `id` int(11) NOT NULL,
  `trainee_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `start_date` varchar(20) NOT NULL,
  `end_date` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `course_id` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT '0',
  `number_of_days` int(11) NOT NULL,
  `emplyee_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trainees_course`
--

INSERT INTO `trainees_course` (`id`, `trainee_id`, `trainer_id`, `price`, `start_date`, `end_date`, `created_at`, `course_id`, `payment_status`, `number_of_days`, `emplyee_id`, `school_id`) VALUES
(1, 1, 1, 2600, '2019-10-29', '2019-11-13', '2019-10-28 10:41:42', 5, 0, 14, 2, 1),
(2, 2, 12, 2600, '2019-11-17', '2019-12-02', '2019-11-05 09:51:51', 5, 0, 14, 2, 1),
(3, 3, 10, 1400, '2019-11-09', '2019-11-16', '2019-11-05 13:01:42', 1, 0, 7, 2, 1),
(4, 4, 14, 2600, '2019-11-16', '2019-12-01', '2019-11-05 13:42:37', 5, 0, 14, 2, 1),
(5, 5, 2, 1400, '2019-11-23', '2019-11-30', '2019-11-05 13:58:25', 1, 0, 7, 2, 1),
(6, 6, 17, 2600, '2019-11-18', '2019-12-03', '2019-11-05 14:00:38', 5, 0, 14, 2, 1),
(7, 7, 9, 1400, '2019-11-23', '2019-11-30', '2019-11-06 08:37:34', 1, 0, 7, 2, 1),
(8, 8, 17, 1400, '2019-11-14', '2019-11-21', '2019-11-06 09:47:18', 1, 0, 7, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trainees_payments`
--

CREATE TABLE `trainees_payments` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `trainees_course_id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0' COMMENT 'هل الدفع خصم ام عادى',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trainees_payments`
--

INSERT INTO `trainees_payments` (`id`, `course_id`, `amount`, `trainees_course_id`, `type`, `created_at`) VALUES
(1, 1, 2600, 0, 0, '2019-10-28 10:40:26'),
(2, 2, 1400, 0, 0, '2019-11-05 09:51:02'),
(3, 3, 1400, 0, 0, '2019-11-05 13:00:59'),
(4, 4, 1000, 0, 0, '2019-11-05 13:41:02'),
(5, 5, 1400, 0, 0, '2019-11-05 13:57:52'),
(6, 6, 2600, 0, 0, '2019-11-05 14:00:12'),
(7, 7, 1400, 0, 0, '2019-11-06 08:37:03'),
(8, 8, 1400, 0, 0, '2019-11-06 09:46:38');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `car_id` int(11) NOT NULL DEFAULT '1',
  `address` varchar(250) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `school_id` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `name`, `phone`, `car_id`, `address`, `gender`, `status`, `school_id`, `created_at`) VALUES
(1, 'ابوبكر محمد على', '09122082979', 1, 'ام درمان', 'mail', 0, 1, '2019-10-28 14:02:51'),
(2, 'علاء الدين ابراهيم', '0', 1, 'ام درمان العرضة', 'mail', 1, 1, '2019-10-28 11:12:01'),
(3, 'احمد محمد احمد', '0129049725', 1, 'ام درمان العباسيه', 'mail', 1, 1, '2019-10-28 11:13:34'),
(4, 'عصمت نبيل ابراهيم', '0912200061', 1, 'ام درمان بيت المال', 'mail', 1, 1, '2019-10-28 11:14:49'),
(5, 'محمد صبري محمد علي', '0912239396', 1, 'ام درمان حي العمده', 'mail', 1, 1, '2019-10-28 11:16:17'),
(6, 'مبشر عادل يوسف', '0127294314', 1, 'ام درمان سيد مكي', 'mail', 1, 1, '2019-10-28 11:17:57'),
(7, 'مجدي عباس نديم', '0918144740', 1, 'ام درمان حي الروضه', 'mail', 1, 1, '2019-10-28 11:18:49'),
(8, 'منير احمد', '0127519520', 1, 'ام درمان الثورة', 'mail', 1, 1, '2019-10-28 11:20:09'),
(9, 'حذيفه احمد', '0963870377', 1, 'ام درمان الملازمين', 'mail', 1, 1, '2019-10-28 11:21:33'),
(10, 'عبدالرحمن محمد حمد', '0925444711', 1, 'ام درمان الثورة', 'mail', 1, 1, '2019-10-28 11:23:59'),
(11, 'تاج الدين المرضي', '0922152007', 1, 'ام درمان بيت المال', 'mail', 1, 1, '2019-10-28 11:24:54'),
(12, 'احمد حسن عبدالقادر', '0927948770', 1, 'ام درمان بيت المال', 'mail', 1, 1, '2019-10-28 11:25:56'),
(13, 'خالد الفاتح مصطفي', '0918244113', 1, 'ام درمان الثورة', 'mail', 1, 1, '2019-10-28 11:29:29'),
(14, 'مصطفي عادل يوسف', '0127294314', 1, 'ام درمان سيد مكي', 'mail', 1, 1, '2019-10-28 11:30:35'),
(15, 'عواطف احمد علي', '0916030160', 1, 'ام درمان الثورة', 'fmail', 1, 1, '2019-10-28 11:31:21'),
(16, 'محمد معتصم', '0111806226', 1, 'ام درمان الثورة', 'mail', 1, 1, '2019-10-28 11:32:33'),
(17, 'صهيب احمد', '0129737726', 1, 'ام درمان الثورة', 'mail', 1, 1, '2019-10-28 11:38:07'),
(18, 'ابوبكر محمد علي', '0922082979', 1, 'ام درمان بيت المال', 'mail', 1, 1, '2019-10-28 11:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `school_id` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `school_id`, `created_at`) VALUES
(1, 'ahmed7med@gmail.com', '123456', 'ahmed hmed', 2, '2019-10-13 09:26:46'),
(2, '7nona@gmail.com', '123456', 'حنونه', 1, '2019-10-13 09:26:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accounts_log`
--
ALTER TABLE `accounts_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_courses`
--
ALTER TABLE `category_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuel_history`
--
ALTER TABLE `fuel_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuel_tickets`
--
ALTER TABLE `fuel_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `international_license_info`
--
ALTER TABLE `international_license_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `international_license_log`
--
ALTER TABLE `international_license_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `international_license_trainees`
--
ALTER TABLE `international_license_trainees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schols`
--
ALTER TABLE `schols`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_cat`
--
ALTER TABLE `stock_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_prodcts`
--
ALTER TABLE `stock_prodcts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainees`
--
ALTER TABLE `trainees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainees_course`
--
ALTER TABLE `trainees_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainees_payments`
--
ALTER TABLE `trainees_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `accounts_log`
--
ALTER TABLE `accounts_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category_courses`
--
ALTER TABLE `category_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `fuel_history`
--
ALTER TABLE `fuel_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fuel_tickets`
--
ALTER TABLE `fuel_tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `international_license_info`
--
ALTER TABLE `international_license_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `international_license_log`
--
ALTER TABLE `international_license_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `international_license_trainees`
--
ALTER TABLE `international_license_trainees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schols`
--
ALTER TABLE `schols`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stock_cat`
--
ALTER TABLE `stock_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stock_prodcts`
--
ALTER TABLE `stock_prodcts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainees`
--
ALTER TABLE `trainees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trainees_course`
--
ALTER TABLE `trainees_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trainees_payments`
--
ALTER TABLE `trainees_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
