-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2020 at 11:14 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tour-site`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `content_images` text DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `categorie_id`, `title`, `body`, `image`, `content_images`, `active`, `created_at`, `updated_at`) VALUES
(56, 48, 'New Post', 's:5064:\"<h2 style=\"text-align: center; \">Jerusalem</h2><p style=\"text-align: center;\"><img src=\"http://localhost/tour-site/public/images/blogs/content_images/sm-2-2020-10-05-17-37-09.jpg\" style=\"width: 25%;\"></p><blockquote style=\"text-align: center;\" class=\"blockquote\"><p></p><p>some text here</p>some text here some text here some text here some text here some text here&nbsp;<p></p></blockquote><p><span style=\"font-size: 20px; text-align: center;\">some text here&nbsp;</span><span style=\"font-size: 20px; text-align: center;\">some text here&nbsp;</span><span style=\"font-size: 20px; text-align: center;\">some text here&nbsp;</span></p><p><span style=\"font-size: 20px; text-align: center;\">some text here&nbsp;</span><span style=\"font-size: 20px; text-align: center;\">some text here&nbsp;</span><span style=\"font-size: 20px; text-align: center;\">some text here&nbsp;</span><span style=\"font-size: 20px; text-align: center;\">some text here&nbsp;</span></p><p><span style=\"font-size: 20px; text-align: center;\">some text here&nbsp;</span><span style=\"font-size: 20px; text-align: center;\">some text here&nbsp;</span><span style=\"font-size: 20px; text-align: center;\">some text here&nbsp;</span><span style=\"font-size: 20px; text-align: center;\">some text here&nbsp;</span></p><p><span style=\"font-size: 20px; text-align: center;\">some text here&nbsp;</span><span style=\"font-size: 20px; text-align: center;\">some text here&nbsp;</span><span style=\"font-size: 20px; text-align: center;\">some text here&nbsp;</span></p><p><span style=\"font-size: 20px; text-align: center;\">some text here&nbsp;</span><span style=\"font-size: 20px; text-align: center;\">some text here&nbsp;</span><span style=\"font-size: 20px; text-align: center;\">some text here&nbsp;</span><span style=\"font-size: 20px; text-align: center;\">some text here&nbsp;</span></p><p></p><div style=\"text-align: right;\"><span style=\"font-size: 20px; text-align: center;\">some text here&nbsp;</span><span style=\"font-size: 20px; text-align: center;\">some text here&nbsp;</span><span style=\"font-size: 20px; text-align: center;\">some text here&nbsp;</span><span style=\"font-size: 20px; text-align: center;\">some text here&nbsp;</span></div><div style=\"text-align: right;\"><span style=\"font-size: 20px; text-align: center;\">some text here&nbsp;</span><span style=\"font-size: 20px; text-align: center;\">some text here&nbsp;</span><span style=\"font-size: 20px; text-align: center;\">some text here&nbsp;</span><span style=\"font-size: 20px; text-align: center;\">some text here&nbsp;</span></div><div style=\"text-align: right;\"><span style=\"font-size: 20px; text-align: center;\">some text here&nbsp;</span><span style=\"font-size: 20px; text-align: center;\">some text here&nbsp;</span><span style=\"font-size: 20px; text-align: center;\">some text here&nbsp;</span><span style=\"font-size: 20px; text-align: center;\">some text here&nbsp;</span><span style=\"font-size: 20px; text-align: center;\">some text here&nbsp;</span><span style=\"font-size: 20px; text-align: center;\">some text here&nbsp;</span></div><div style=\"text-align: right;\"><span style=\"font-size: 20px; text-align: center;\">some text here&nbsp;</span></div><div style=\"text-align: right;\"><span style=\"font-size: 20px; text-align: center;\"><br></span></div><div style=\"text-align: right;\"><div style=\"text-align: center;\"><span style=\"font-size: 20px;\">some text here&nbsp;</span><span style=\"font-size: 20px;\">some text here&nbsp;</span><span style=\"font-size: 20px;\">some text here&nbsp;</span><span style=\"font-size: 20px;\">some text here&nbsp;</span></div><div style=\"text-align: center;\"><span style=\"font-size: 20px;\">some text here&nbsp;</span><span style=\"font-size: 20px;\">some text here&nbsp;</span><span style=\"font-size: 20px;\">some text here&nbsp;</span><span style=\"font-size: 20px;\">some text here&nbsp;</span></div><div style=\"text-align: center;\"><span style=\"font-size: 20px;\">some text here&nbsp;</span><span style=\"font-size: 20px;\">some text here&nbsp;</span><span style=\"font-size: 20px;\">some text here&nbsp;</span><span style=\"font-size: 20px;\">some text here&nbsp;</span></div><div style=\"text-align: center;\"><span style=\"font-size: 20px;\">some text here&nbsp;</span><span style=\"font-size: 20px;\">some text here&nbsp;</span><span style=\"font-size: 20px;\">some text here&nbsp;</span><span style=\"font-size: 20px;\">some text here&nbsp;</span></div></div><p></p><hr><p></p><div style=\"text-align: right;\"><div style=\"text-align: center;\"><span style=\"font-size: 20px;\">some text here&nbsp;</span><span style=\"font-size: 20px;\">some text here&nbsp;</span><span style=\"font-size: 20px;\">some text here&nbsp;</span><span style=\"font-size: 20px;\">some text here&nbsp;</span></div><div style=\"text-align: center;\"><img src=\"http://localhost/tour-site/public/images/blogs/content_images/sm-7-2020-10-05-17-38-35.jpg\" style=\"width: 25%;\"><span style=\"font-size: 20px;\"><br></span><span style=\"font-size: 20px;\"><br></span><span style=\"font-size: 20px;\">some text here&nbsp;</span><span style=\"font-size: 20px;\"><br></span></div></div><br><p></p>\";', '10-2020-10-05-17-38-48.jpg', 'O:8:\"stdClass\":1:{s:14:\"content_images\";s:86:\"a:2:{i:0;s:28:\"sm-7-2020-10-05-17-38-35.jpg\";i:1;s:28:\"sm-2-2020-10-05-17-37-09.jpg\";}\";}', 0, '2020-10-05 17:38:48', '2020-10-06 07:46:47');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `updated_at`, `created_at`) VALUES
(45, 'Test 1', '1-2020-10-03-20-43-26.jpg', '2020-10-03 20:43:26', '2020-10-03 20:43:26'),
(46, 'Test 2', '2-2020-10-03-20-43-34.jpg', '2020-10-03 20:43:34', '2020-10-03 20:43:34'),
(47, 'Israel News', '5-2020-10-03-20-43-55.jpg', '2020-10-03 20:43:55', '2020-10-03 20:43:55'),
(48, 'Harley Davidson', '7-2020-10-03-20-49-33.jpg', '2020-10-03 20:49:33', '2020-10-03 20:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `active`, `updated_at`, `created_at`) VALUES
(2, 'Question', 'Answer', 1, '2020-10-04 08:42:54', '2020-10-04 08:42:42'),
(3, 'Test 1', 'test 2', 0, '2020-10-04 08:45:35', '2020-10-04 08:45:35'),
(4, 'Test 3', 'Test 4', 0, '2020-10-04 08:45:41', '2020-10-04 08:45:41');

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `images` text DEFAULT NULL,
  `content_images` text DEFAULT NULL,
  `google_maps` text DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updated_at` datetime DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `updated_at`, `created_at`) VALUES
(1, '.', '.', '2020-09-21 14:20:49', '2020-09-21 14:20:49'),
(2, '....', '....', '2020-09-21 15:34:49', '2020-09-21 15:34:49'),
(3, '..', '..', '2020-09-21 15:34:49', '2020-09-21 15:34:49'),
(7, '........', '..........', '2020-09-21 15:35:59', '2020-09-21 15:35:59'),
(8, 'test@gmail.com', '$2y$10$L7VtZeobH1mRReKkorC.CelRquqo0AekY/E313weUrrobUcbkO/HW', '2020-09-21 15:36:14', '2020-09-21 15:36:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
