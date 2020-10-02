-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2020 at 04:13 PM
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
  `body` longblob NOT NULL,
  `image` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `images` text DEFAULT NULL,
  `google_maps` text DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `title`, `body`, `images`, `google_maps`, `active`, `updated_at`, `created_at`) VALUES
(2, 'Test', 's:11:\"<p>Test</p>\";', 'a:4:{i:0;s:56:\"wallpaperflare.com_wallpaper (8)-2020-10-02-10-09-19.jpg\";i:1;s:56:\"wallpaperflare.com_wallpaper (9)-2020-10-02-10-09-19.jpg\";i:2;s:57:\"wallpaperflare.com_wallpaper (10)-2020-10-02-10-09-19.jpg\";i:3;s:57:\"wallpaperflare.com_wallpaper (11)-2020-10-02-10-09-19.jpg\";}', 's:126:\"<iframe src=\"https://www.google.com/maps/d/u/1/embed?mid=1tsWCikDdu11UfZIv3L2ydT0hRZY-8bfH\" width=\"640\" height=\"480\"></iframe>\";', 1, '2020-10-02 10:09:19', '2020-10-02 10:09:19'),
(3, 'test 2', 's:13:\"<h3>test</h3>\";', 'a:4:{i:0;s:57:\"wallpaperflare.com_wallpaper (11)-2020-10-02-11-28-34.jpg\";i:1;s:57:\"wallpaperflare.com_wallpaper (12)-2020-10-02-11-28-34.jpg\";i:2;s:57:\"wallpaperflare.com_wallpaper (13)-2020-10-02-11-28-34.jpg\";i:3;s:52:\"wallpaperflare.com_wallpaper-2020-10-02-11-28-34.jpg\";}', 's:126:\"<iframe src=\"https://www.google.com/maps/d/u/1/embed?mid=1tsWCikDdu11UfZIv3L2ydT0hRZY-8bfH\" width=\"640\" height=\"480\"></iframe>\";', 0, '2020-10-02 11:28:34', '2020-10-02 11:28:34'),
(4, 'test', 's:11:\"<p>test</p>\";', NULL, NULL, 0, '2020-10-02 11:54:55', '2020-10-02 11:54:55'),
(5, 'test 3', 's:17:\"<p>test&nbsp;</p>\";', NULL, NULL, 0, '2020-10-02 11:55:04', '2020-10-02 11:55:04'),
(6, 'test 5', 's:13:\"<p>test 5</p>\";', NULL, NULL, 0, '2020-10-02 11:55:10', '2020-10-02 11:55:10');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
