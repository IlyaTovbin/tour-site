-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2020 at 04:08 PM
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
(82, 48, 'New Post', 's:255:\"<p>test<img src=\"http://localhost/tour-site/public/images/blogs/content_images/sm-1-2020-10-07-11-52-14.jpg\" style=\"width: 25%;\"><img src=\"http://localhost/tour-site/public/images/blogs/content_images/sm-5-2020-10-07-11-52-19.jpg\" style=\"width: 25%;\"></p>\";', 'wallpaperflare.com_wallpaper (1)-2020-10-07-11-52-26.jpg', 'a:2:{i:0;s:28:\"sm-5-2020-10-07-11-52-19.jpg\";i:1;s:28:\"sm-1-2020-10-07-11-52-14.jpg\";}', 0, '2020-10-07 11:52:26', '2020-10-07 11:52:26'),
(83, 49, 'First Post', 's:235:\"<h2 style=\"text-align: center; \">TEST</h2><p style=\"text-align: center;\"><img src=\"http://localhost/tour-site/public/images/blogs/content_images/sm-wallpaperflare.com_wallpaper (13)-2020-10-07-17-36-53.jpg\" style=\"width: 50%;\"><br></p>\";', 'wallpaperflare.com_wallpaper (1)-2020-10-07-17-36-59.jpg', 'a:1:{i:0;s:60:\"sm-wallpaperflare.com_wallpaper (13)-2020-10-07-17-36-53.jpg\";}', 0, '2020-10-07 17:36:59', '2020-10-07 17:36:59');

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
(48, 'Harley Davidson', '7-2020-10-03-20-49-33.jpg', '2020-10-03 20:49:33', '2020-10-03 20:49:00'),
(49, 'New Jerusalem', '5-2020-10-07-17-36-24.jpg', '2020-10-07 17:36:24', '2020-10-07 17:36:24');

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
  `location` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `images` text DEFAULT NULL,
  `content_images` text DEFAULT NULL,
  `google_maps` text DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `title`, `location`, `body`, `images`, `content_images`, `google_maps`, `active`, `updated_at`, `created_at`) VALUES
(28, 'Новый Лод', 'Лод, Израиль', 's:23503:\"<h2><font style=\"background-color: rgb(255, 255, 255);\" color=\"#424242\">Лод</font></h2><h2><blockquote style=\"margin: 0.5em 0px; color: rgb(32, 33, 34); background-color: rgb(255, 255, 255);\" class=\"blockquote\"><span style=\"font-family: Tahoma; font-size: 14px;\">Название города Лод (Луд) впервые упоминается в&nbsp;</span><a href=\"https://ru.wikipedia.org/wiki/%D0%9A%D0%B0%D1%80%D0%BD%D0%B0%D0%BA\" title=\"Карнак\" style=\"font-family: sans-serif; font-size: 14px; color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family: Tahoma;\">карнакской</span></a><span style=\"font-family: Tahoma; font-size: 14px;\">&nbsp;надписи времён&nbsp;</span><a href=\"https://ru.wikipedia.org/wiki/%D0%A2%D1%83%D1%82%D0%BC%D0%BE%D1%81_III\" title=\"Тутмос III\" style=\"font-family: sans-serif; font-size: 14px; color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family: Tahoma;\">Тутмоса III</span></a><span style=\"font-family: Tahoma; font-size: 14px;\">. С V века до&nbsp;н.&nbsp;э. Лидда была крупным центром иудейской учёности. Город не раз упоминается в&nbsp;</span><a href=\"https://ru.wikipedia.org/wiki/%D0%9D%D0%BE%D0%B2%D1%8B%D0%B9_%D0%97%D0%B0%D0%B2%D0%B5%D1%82\" title=\"Новый Завет\" style=\"font-family: sans-serif; font-size: 14px; color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family: Tahoma;\">Новом Завете</span></a><span style=\"font-family: Tahoma; font-size: 14px;\">. Во время&nbsp;</span><a href=\"https://ru.wikipedia.org/wiki/%D0%92%D1%82%D0%BE%D1%80%D0%B0%D1%8F_%D0%98%D1%83%D0%B4%D0%B5%D0%B9%D1%81%D0%BA%D0%B0%D1%8F_%D0%B2%D0%BE%D0%B9%D0%BD%D0%B0\" title=\"Вторая Иудейская война\" style=\"font-family: sans-serif; font-size: 14px; color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family: Tahoma;\">Второй Иудейской войны</span></a><span style=\"font-family: Tahoma; font-size: 14px;\">&nbsp;был взят римлянами и разрушен как один из центров еврейского сопротивления. На месте древней Лидды возникла колония с греческим названием&nbsp;</span><i style=\"font-family: sans-serif; font-size: 14px;\"><span style=\"font-family: Tahoma;\">Διόσπολις</span></i><span style=\"font-family: Tahoma; font-size: 14px;\">&nbsp;(«город богов»). Именно в ней, как считается, жил и был похоронен&nbsp;</span><a href=\"https://ru.wikipedia.org/wiki/%D0%93%D0%B5%D0%BE%D1%80%D0%B3%D0%B8%D0%B9_%D0%9F%D0%BE%D0%B1%D0%B5%D0%B4%D0%BE%D0%BD%D0%BE%D1%81%D0%B5%D1%86\" title=\"Георгий Победоносец\" style=\"font-family: sans-serif; font-size: 14px; color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family: Tahoma;\">Георгий Победоносец</span></a><span style=\"font-family: Tahoma; font-size: 14px;\">. В память об этом до арабского завоевания современный Лод был известен как Георгиополь («город Георгия»).<br></span><a href=\"https://ru.wikipedia.org/wiki/%D0%A1%D1%83%D0%BB%D0%B5%D0%B9%D0%BC%D0%B0%D0%BD_(%D1%85%D0%B0%D0%BB%D0%B8%D1%84)\" class=\"mw-redirect\" title=\"Сулейман (халиф)\" style=\"font-family: sans-serif; font-size: 14px; color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family: Tahoma;\">Халиф Сулейман</span></a><span style=\"font-family: Tahoma; font-size: 14px;\">&nbsp;в 716 году перенёс центр арабской Палестины из Лидды в основанную им&nbsp;</span><a href=\"https://ru.wikipedia.org/wiki/%D0%A0%D0%B0%D0%BC%D0%BB%D0%B0\" title=\"Рамла\" style=\"font-family: sans-serif; font-size: 14px; color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family: Tahoma;\">Рамлу</span></a><span style=\"font-family: Tahoma; font-size: 14px;\">. В 1099—1191 годах Лидда&nbsp;— один из центров&nbsp;</span><a href=\"https://ru.wikipedia.org/wiki/%D0%A0%D0%B0%D0%BC%D0%BB%D0%B0_(%D1%81%D0%B5%D0%BD%D1%8C%D0%BE%D1%80%D0%B8%D1%8F)\" title=\"Рамла (сеньория)\" style=\"font-family: sans-serif; font-size: 14px; color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family: Tahoma;\">сеньории Рамла</span></a><span style=\"font-family: Tahoma; font-size: 14px;\">&nbsp;и&nbsp;</span><a href=\"https://ru.wikipedia.org/wiki/%D0%98%D0%B5%D1%80%D1%83%D1%81%D0%B0%D0%BB%D0%B8%D0%BC%D1%81%D0%BA%D0%BE%D0%B5_%D0%BA%D0%BE%D1%80%D0%BE%D0%BB%D0%B5%D0%B2%D1%81%D1%82%D0%B2%D0%BE\" title=\"Иерусалимское королевство\" style=\"font-family: sans-serif; font-size: 14px; color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family: Tahoma;\">государства крестоносцев</span></a><span style=\"font-family: Tahoma; font-size: 14px;\">, которые нарекли Лидду «городом Святого Георгия». Путешественник&nbsp;</span><a href=\"https://ru.wikipedia.org/wiki/%D0%92%D0%B5%D0%BD%D0%B8%D0%B0%D0%BC%D0%B8%D0%BD_%D0%A2%D1%83%D0%B4%D0%B5%D0%BB%D1%8C%D1%81%D0%BA%D0%B8%D0%B9\" title=\"Вениамин Тудельский\" style=\"font-family: sans-serif; font-size: 14px; color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family: Tahoma;\">Вениамин Тудельский</span></a><span style=\"font-family: Tahoma; font-size: 14px;\">&nbsp;в 1170 году нашёл в Лидде лишь одного еврея. После присоединения к Израилю в 1948 году арабское население&nbsp;</span><span class=\"iw plainlinks\" data-title=\"Исход палестинцев из Лидды и Рамлы\" data-lang=\"en\" data-lang-name=\"англ.\" style=\"font-family: Tahoma; font-size: 14px;\"><a href=\"https://ru.wikipedia.org/w/index.php?title=%D0%98%D1%81%D1%85%D0%BE%D0%B4_%D0%BF%D0%B0%D0%BB%D0%B5%D1%81%D1%82%D0%B8%D0%BD%D1%86%D0%B5%D0%B2_%D0%B8%D0%B7_%D0%9B%D0%B8%D0%B4%D0%B4%D1%8B_%D0%B8_%D0%A0%D0%B0%D0%BC%D0%BB%D1%8B&amp;action=edit&amp;redlink=1\" class=\"new\" title=\"Исход палестинцев из Лидды и Рамлы (страница отсутствует)\" style=\"color: rgb(165, 88, 88); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">оставило город</a></span><span style=\"font-family: Tahoma; font-size: 14px;\">&nbsp;однако к нынешнему моменту</span><font face=\"sans-serif\"><span style=\"font-size: 11.2px; white-space: nowrap; font-family: Tahoma;\">&nbsp;</span></font><span style=\"font-family: Tahoma; font-size: 14px;\">процент арабов среди жителей города превышает средний по стране<br></span><span style=\"font-family: Verdana; font-size: 14px;\">Значительная часть населения города была насильно изгнана из своих домов&nbsp;</span><a href=\"https://ru.wikipedia.org/wiki/%D0%A6%D0%90%D0%A5%D0%90%D0%9B\" class=\"mw-redirect\" title=\"ЦАХАЛ\" style=\"font-family: sans-serif; font-size: 14px; color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Армией Обороны Израиля</a><span style=\"font-family: Verdana; font-size: 14px;\">&nbsp;в&nbsp;</span><a href=\"https://ru.wikipedia.org/wiki/1948_%D0%B3%D0%BE%D0%B4\" title=\"1948 год\" style=\"font-family: sans-serif; font-size: 14px; color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">1948 году</a><span style=\"font-family: Verdana; font-size: 14px;\">, в ходе&nbsp;</span><a href=\"https://ru.wikipedia.org/wiki/%D0%90%D1%80%D0%B0%D0%B1%D0%BE-%D0%B8%D0%B7%D1%80%D0%B0%D0%B8%D0%BB%D1%8C%D1%81%D0%BA%D0%B0%D1%8F_%D0%B2%D0%BE%D0%B9%D0%BD%D0%B0_1948%E2%80%941949_%D0%B3%D0%BE%D0%B4%D0%BE%D0%B2\" class=\"mw-redirect\" title=\"Арабо-израильская война 1948—1949 годов\" style=\"font-family: sans-serif; font-size: 14px; color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Арабо-израильской войны 1948—1949 годов</a><span style=\"font-family: Verdana; font-size: 14px;\">, после того, как арабы, воодушевленные атакой&nbsp;</span><a href=\"https://ru.wikipedia.org/wiki/%D0%90%D1%80%D0%B0%D0%B1%D1%81%D0%BA%D0%B8%D0%B9_%D0%BB%D0%B5%D0%B3%D0%B8%D0%BE%D0%BD\" title=\"Арабский легион\" style=\"font-family: sans-serif; font-size: 14px; color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Арабского легиона</a><span style=\"font-family: Verdana; font-size: 14px;\">&nbsp;уже после капитуляции города, открыли огонь по израильским солдатам, застрелив несколько человек. До этого «об изгнании гражданского населения речь не шла</span></blockquote></h2><h2><h3 style=\"margin: 0.5em 0px;\"><span style=\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 34); font-family: Arial;\">﻿</span><span style=\"font-family: Tahoma; background-color: rgb(255, 255, 255);\"><font color=\"#424242\" style=\"\">﻿</font><font color=\"#cec6ce\">Тест</font></span><br></h3></h2><h2><blockquote style=\"margin: 0.5em 0px; color: rgb(32, 33, 34); background-color: rgb(255, 255, 255);\" class=\"blockquote\"><span style=\"font-family: Tahoma; font-size: 14px;\">Название города Лод (Луд) впервые упоминается в&nbsp;</span><a href=\"https://ru.wikipedia.org/wiki/%D0%9A%D0%B0%D1%80%D0%BD%D0%B0%D0%BA\" title=\"Карнак\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif; font-size: 14px;\"><span style=\"font-family: Tahoma;\">карнакской</span></a><span style=\"font-family: Tahoma; font-size: 14px;\">&nbsp;надписи времён&nbsp;</span><a href=\"https://ru.wikipedia.org/wiki/%D0%A2%D1%83%D1%82%D0%BC%D0%BE%D1%81_III\" title=\"Тутмос III\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif; font-size: 14px;\"><span style=\"font-family: Tahoma;\">Тутмоса III</span></a><span style=\"font-family: Tahoma; font-size: 14px;\">. С V века до&nbsp;н.&nbsp;э. Лидда была крупным центром иудейской учёности. Город не раз упоминается в&nbsp;</span><a href=\"https://ru.wikipedia.org/wiki/%D0%9D%D0%BE%D0%B2%D1%8B%D0%B9_%D0%97%D0%B0%D0%B2%D0%B5%D1%82\" title=\"Новый Завет\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif; font-size: 14px;\"><span style=\"font-family: Tahoma;\">Новом Завете</span></a><span style=\"font-family: Tahoma; font-size: 14px;\">. Во время&nbsp;</span><a href=\"https://ru.wikipedia.org/wiki/%D0%92%D1%82%D0%BE%D1%80%D0%B0%D1%8F_%D0%98%D1%83%D0%B4%D0%B5%D0%B9%D1%81%D0%BA%D0%B0%D1%8F_%D0%B2%D0%BE%D0%B9%D0%BD%D0%B0\" title=\"Вторая Иудейская война\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif; font-size: 14px;\"><span style=\"font-family: Tahoma;\">Второй Иудейской войны</span></a><span style=\"font-family: Tahoma; font-size: 14px;\">&nbsp;был взят римлянами и разрушен как один из центров еврейского сопротивления. На месте древней Лидды возникла колония с греческим названием&nbsp;</span><i style=\"font-family: sans-serif; font-size: 14px;\"><span style=\"font-family: Tahoma;\">Διόσπολις</span></i><span style=\"font-family: Tahoma; font-size: 14px;\">&nbsp;(«город богов»). Именно в ней, как считается, жил и был похоронен&nbsp;</span><a href=\"https://ru.wikipedia.org/wiki/%D0%93%D0%B5%D0%BE%D1%80%D0%B3%D0%B8%D0%B9_%D0%9F%D0%BE%D0%B1%D0%B5%D0%B4%D0%BE%D0%BD%D0%BE%D1%81%D0%B5%D1%86\" title=\"Георгий Победоносец\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif; font-size: 14px;\"><span style=\"font-family: Tahoma;\">Георгий Победоносец</span></a><span style=\"font-family: Tahoma; font-size: 14px;\">. В память об этом до арабского завоевания современный Лод был известен как Георгиополь («город Георгия»).<br></span><a href=\"https://ru.wikipedia.org/wiki/%D0%A1%D1%83%D0%BB%D0%B5%D0%B9%D0%BC%D0%B0%D0%BD_(%D1%85%D0%B0%D0%BB%D0%B8%D1%84)\" class=\"mw-redirect\" title=\"Сулейман (халиф)\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif; font-size: 14px;\"><span style=\"font-family: Tahoma;\">Халиф Сулейман</span></a><span style=\"font-family: Tahoma; font-size: 14px;\">&nbsp;в 716 году перенёс центр арабской Палестины из Лидды в основанную им&nbsp;</span><a href=\"https://ru.wikipedia.org/wiki/%D0%A0%D0%B0%D0%BC%D0%BB%D0%B0\" title=\"Рамла\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif; font-size: 14px;\"><span style=\"font-family: Tahoma;\">Рамлу</span></a><span style=\"font-family: Tahoma; font-size: 14px;\">. В 1099—1191 годах Лидда&nbsp;— один из центров&nbsp;</span><a href=\"https://ru.wikipedia.org/wiki/%D0%A0%D0%B0%D0%BC%D0%BB%D0%B0_(%D1%81%D0%B5%D0%BD%D1%8C%D0%BE%D1%80%D0%B8%D1%8F)\" title=\"Рамла (сеньория)\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif; font-size: 14px;\"><span style=\"font-family: Tahoma;\">сеньории Рамла</span></a><span style=\"font-family: Tahoma; font-size: 14px;\">&nbsp;и&nbsp;</span><a href=\"https://ru.wikipedia.org/wiki/%D0%98%D0%B5%D1%80%D1%83%D1%81%D0%B0%D0%BB%D0%B8%D0%BC%D1%81%D0%BA%D0%BE%D0%B5_%D0%BA%D0%BE%D1%80%D0%BE%D0%BB%D0%B5%D0%B2%D1%81%D1%82%D0%B2%D0%BE\" title=\"Иерусалимское королевство\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif; font-size: 14px;\"><span style=\"font-family: Tahoma;\">государства крестоносцев</span></a><span style=\"font-family: Tahoma; font-size: 14px;\">, которые нарекли Лидду «городом Святого Георгия». Путешественник&nbsp;</span><a href=\"https://ru.wikipedia.org/wiki/%D0%92%D0%B5%D0%BD%D0%B8%D0%B0%D0%BC%D0%B8%D0%BD_%D0%A2%D1%83%D0%B4%D0%B5%D0%BB%D1%8C%D1%81%D0%BA%D0%B8%D0%B9\" title=\"Вениамин Тудельский\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif; font-size: 14px;\"><span style=\"font-family: Tahoma;\">Вениамин Тудельский</span></a><span style=\"font-family: Tahoma; font-size: 14px;\">&nbsp;в 1170 году нашёл в Лидде лишь одного еврея. После присоединения к Израилю в 1948 году арабское население&nbsp;</span><span class=\"iw plainlinks\" data-title=\"Исход палестинцев из Лидды и Рамлы\" data-lang=\"en\" data-lang-name=\"англ.\" style=\"font-family: Tahoma; font-size: 14px;\"><a href=\"https://ru.wikipedia.org/w/index.php?title=%D0%98%D1%81%D1%85%D0%BE%D0%B4_%D0%BF%D0%B0%D0%BB%D0%B5%D1%81%D1%82%D0%B8%D0%BD%D1%86%D0%B5%D0%B2_%D0%B8%D0%B7_%D0%9B%D0%B8%D0%B4%D0%B4%D1%8B_%D0%B8_%D0%A0%D0%B0%D0%BC%D0%BB%D1%8B&amp;action=edit&amp;redlink=1\" class=\"new\" title=\"Исход палестинцев из Лидды и Рамлы (страница отсутствует)\" style=\"color: rgb(165, 88, 88); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">оставило город</a></span><span style=\"font-family: Tahoma; font-size: 14px;\">&nbsp;однако к нынешнему моменту</span><font face=\"sans-serif\"><span style=\"font-size: 11.2px; white-space: nowrap; font-family: Tahoma;\">&nbsp;</span></font><span style=\"font-family: Tahoma; font-size: 14px;\">процент арабов среди жителей города превышает средний по стране<br></span><span style=\"font-family: Verdana; font-size: 14px;\">Значительная часть населения города была насильно изгнана из своих домов&nbsp;</span><a href=\"https://ru.wikipedia.org/wiki/%D0%A6%D0%90%D0%A5%D0%90%D0%9B\" class=\"mw-redirect\" title=\"ЦАХАЛ\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif; font-size: 14px;\">Армией Обороны Израиля</a><span style=\"font-family: Verdana; font-size: 14px;\">&nbsp;в&nbsp;</span><a href=\"https://ru.wikipedia.org/wiki/1948_%D0%B3%D0%BE%D0%B4\" title=\"1948 год\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif; font-size: 14px;\">1948 году</a><span style=\"font-family: Verdana; font-size: 14px;\">, в ходе&nbsp;</span><a href=\"https://ru.wikipedia.org/wiki/%D0%90%D1%80%D0%B0%D0%B1%D0%BE-%D0%B8%D0%B7%D1%80%D0%B0%D0%B8%D0%BB%D1%8C%D1%81%D0%BA%D0%B0%D1%8F_%D0%B2%D0%BE%D0%B9%D0%BD%D0%B0_1948%E2%80%941949_%D0%B3%D0%BE%D0%B4%D0%BE%D0%B2\" class=\"mw-redirect\" title=\"Арабо-израильская война 1948—1949 годов\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif; font-size: 14px;\">Арабо-израильской войны 1948—1949 годов</a><span style=\"font-family: Verdana; font-size: 14px;\">, после того, как арабы, воодушевленные атакой&nbsp;</span><a href=\"https://ru.wikipedia.org/wiki/%D0%90%D1%80%D0%B0%D0%B1%D1%81%D0%BA%D0%B8%D0%B9_%D0%BB%D0%B5%D0%B3%D0%B8%D0%BE%D0%BD\" title=\"Арабский легион\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif; font-size: 14px;\">Арабского легиона</a><span style=\"font-family: Verdana; font-size: 14px;\">&nbsp;уже после капитуляции города, открыли огонь по израильским солдатам, застрелив несколько человек. До этого «об изгнании гражданского населения речь не шла</span><span style=\"font-family: Verdana; font-size: 14px;\"><br></span></blockquote></h2>\";', 'a:8:{i:0;s:25:\"f-2020-10-09-13-58-47.jpg\";i:1;s:56:\"wallpaperflare.com_wallpaper (2)-2020-10-09-13-58-47.jpg\";i:2;s:56:\"wallpaperflare.com_wallpaper (5)-2020-10-09-13-58-47.jpg\";i:3;s:56:\"wallpaperflare.com_wallpaper (6)-2020-10-09-13-58-47.jpg\";i:4;s:56:\"wallpaperflare.com_wallpaper (9)-2020-10-09-13-58-47.jpg\";i:5;s:57:\"wallpaperflare.com_wallpaper (10)-2020-10-09-13-58-47.jpg\";i:6;s:57:\"wallpaperflare.com_wallpaper (11)-2020-10-09-13-58-47.jpg\";i:7;s:57:\"wallpaperflare.com_wallpaper (13)-2020-10-09-13-58-47.jpg\";}', NULL, 's:126:\"<iframe src=\"https://www.google.com/maps/d/u/1/embed?mid=1tsWCikDdu11UfZIv3L2ydT0hRZY-8bfH\" width=\"730\" height=\"300\"></iframe>\";', 0, '2020-10-09 13:58:47', '2020-10-09 13:58:47');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
