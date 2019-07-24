-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2019 at 07:15 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `writer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.png',
  `edition` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isbn` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publication` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT 'Available/Not-Avilable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `writer`, `image`, `edition`, `isbn`, `publication`, `status`, `created_at`, `updated_at`) VALUES
(4, 'ASP .NET CORE 2', 'Kaloam', 'asp-net-core-2-2019-06-27-5d146c8a42b4e.jpg', '1', '3469237', 'Joy', '0', '2019-06-27 01:13:14', '2019-06-27 03:42:08'),
(5, 'DLD', 'sffd', 'dld-2019-06-27-5d146cb886948.jpeg', '5', '978432', 'vfdg', '0', '2019-06-27 01:13:42', '2019-06-27 01:49:28'),
(6, 'fsdfrds', 'gdgrrdg', 'fsdfrds-2019-06-27-5d146e6c0bc56.jpg', '454', '5435345', 'fsgvxdfgv', '1', '2019-06-27 01:21:16', '2019-06-27 01:21:16'),
(7, 'gdsgdfgfd', 'bdfgdfd', 'gdsgdfgfd-2019-06-27-5d146e803e464.jpg', 'trtre', 'rtreter', 'dfgbv', '0', '2019-06-27 01:21:36', '2019-06-27 01:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `borrows`
--

CREATE TABLE `borrows` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `faculty_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'If faculty borrows book',
  `student_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'If student borrows book',
  `return_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `borrows`
--

INSERT INTO `borrows` (`id`, `book_name`, `faculty_name`, `student_name`, `return_date`, `created_at`, `updated_at`) VALUES
(3, 'DLD', 'Limon Sarker', 'N/A', NULL, '2019-06-27 01:49:19', '2019-06-27 01:49:19'),
(4, 'ASP .NET CORE 2', 'N/A', 'N/A', '2019-06-27', '2019-06-27 01:50:13', '2019-06-27 01:50:29');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.png',
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `name`, `image`, `designation`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(4, 'Limon Sarker', 'limon-sarker-2019-06-27-5d1470d56d345.jpg', 'Department Head', 'kahs@gmail.com', '1673975520', 'House#12 ,Road#12/B,Uttara Model Town,Dhaka', '2019-06-27 01:30:54', '2019-06-27 01:31:33'),
(5, 'Kalu', 'kalu-2019-06-27-5d1470c5cdb94.png', 'CEO / Co-founder', 'fsdfd@gmail.com', '98767', 'dgfdghf', '2019-06-27 01:31:17', '2019-06-27 01:31:17');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `room_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `self_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `row_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `column_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `book_id`, `room_no`, `self_no`, `row_no`, `column_no`, `created_at`, `updated_at`) VALUES
(4, 4, '7', '3', '6', '8', '2019-06-27 01:27:47', '2019-06-27 01:27:47'),
(5, 5, '90', '1', '6', '9', '2019-06-27 01:27:57', '2019-06-27 01:27:57'),
(6, 6, '7', '1', '6', '8', '2019-06-27 01:28:06', '2019-06-27 01:28:06'),
(7, 7, '7', '3', '0', '2', '2019-06-27 01:28:18', '2019-06-27 01:28:18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_06_01_070825_create_faculties_table', 1),
(4, '2019_06_04_065907_create_students_table', 1),
(6, '2019_06_18_084534_create_locations_table', 1),
(13, '2019_06_24_065432_create_borrows_table', 2),
(15, '2019_06_18_075955_create_books_table', 3),
(16, '2019_02_24_043826_create_sliders_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('jsarker96@gmail.com', '$2y$10$2NXXn./YgCfJxnoIwnPsa.OMUvhzO9ylYMoLlDy9ngvyOv2fQ5Wca', '2019-06-29 11:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.png',
  `button_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `button_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `priority` tinyint(3) UNSIGNED NOT NULL DEFAULT '10',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `button_text`, `button_link`, `priority`, `created_at`, `updated_at`) VALUES
(11, 'Asus X556U', '-2019-06-27-5d150bc22cf0d.jpg', NULL, NULL, 1, '2019-06-27 12:32:34', '2019-06-27 12:32:34'),
(12, 'Test 2', '-2019-06-27-5d150be1cc017.jpg', 'Click here for Shopping', 'http://usatechtoday.com', 2, '2019-06-27 12:33:05', '2019-06-27 12:36:26'),
(13, 'Sony Camera', '-2019-06-27-5d150bf6783d9.jpg', NULL, NULL, 3, '2019-06-27 12:33:26', '2019-06-27 12:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.png',
  `phone` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `blood` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `f_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `f_occupation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `f_phone` int(11) DEFAULT NULL,
  `m_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_phone` int(11) DEFAULT NULL,
  `m_occupation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `present_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permanent_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `photo`, `phone`, `email`, `dob`, `gender`, `blood`, `nationality`, `f_name`, `f_occupation`, `f_phone`, `m_name`, `m_phone`, `m_occupation`, `present_address`, `permanent_address`, `created_at`, `updated_at`) VALUES
(3, 'Bono', 'bono-2019-06-27-5d14711e65214.png', 98979789, 'gsadkas@gmail.com', '2019-09-16', 'Female', 'B+', 'Bangladesh', 'Binoy', NULL, NULL, 'Jhorna', NULL, NULL, 'House#12 ,Road#12/B,Uttara Model Town,Dhaka', 'fdsfsdfs', '2019-06-27 01:32:46', '2019-06-27 01:32:46'),
(4, 'Imran', 'imran-2019-06-27-5d1471688343c.png', 978978, 'imran@gmail.com', '2019-06-27', 'Male', 'O+', 'Bangladesh', 'Jotertretg', NULL, NULL, 'ycvhghkyu', NULL, NULL, 'Dhaka', 'Palashbari', '2019-06-27 01:34:00', '2019-06-27 01:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.png',
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `designation`, `phone`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Joyanta Kumar Sarker', 'jsarker96@gmail.com', 'joyanta-kumar-sarker-2019-06-27-5d1474a6cb75c.jpg', 'Super Admin', '01673975520', 'Dhaka', NULL, '$2y$10$0keC5kviGvS27TnRsWFSaODzC88R6MHAdfRmnewgGyCO8/ml7IEGO', NULL, '2019-06-26 07:58:51', '2019-06-27 01:47:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrows`
--
ALTER TABLE `borrows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locations_book_id_foreign` (`book_id`);

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
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `borrows`
--
ALTER TABLE `borrows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
