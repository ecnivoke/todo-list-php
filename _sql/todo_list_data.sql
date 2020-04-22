-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 22 apr 2020 om 11:01
-- Serverversie: 10.4.11-MariaDB
-- PHP-versie: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo_list`
--

--
-- Gegevens worden geëxporteerd voor tabel `todo_lists`
--

INSERT INTO `todo_lists` (`id`, `list_name`, `status`, `created`, `updated`) VALUES
(74, '', 'deleted', '2020-02-14 03:07:47', '2020-03-08 17:52:37'),
(75, '', 'deleted', '2020-02-19 15:51:28', '2020-03-08 17:52:37'),
(77, '', 'deleted', '2020-02-15 12:26:54', '2020-03-08 17:52:37'),
(80, '', 'deleted', '2020-02-15 13:33:14', '2020-03-08 17:52:37'),
(81, '', 'deleted', '2020-02-17 13:56:53', '2020-03-08 17:52:37'),
(82, '', 'deleted', '2020-02-19 11:53:38', '2020-03-08 17:52:37'),
(83, '', 'deleted', '2020-02-19 12:24:09', '2020-03-08 17:52:37'),
(84, '', 'deleted', '2020-02-19 14:43:08', '2020-03-08 17:52:37'),
(85, 'add test 1', 'deleted', '2020-03-08 17:53:57', '2020-03-08 17:53:57'),
(86, 'niweue', 'deleted', '2020-03-08 17:55:32', '2020-03-09 10:06:14'),
(87, 'add test 1', 'active', '2020-03-09 10:38:45', '2020-03-09 11:19:10'),
(88, 'niweueeeeeeeeeeeee', 'active', '2020-03-09 10:40:34', '2020-03-10 12:24:38');

--
-- Gegevens worden geëxporteerd voor tabel `todo_tasks`
--

INSERT INTO `todo_tasks` (`id`, `task_name`, `task_description`, `status`, `list_id`, `created`, `updated`, `task_time`) VALUES
(1, 'task 3 no desc', 'doei', 'active', 1, '0000-00-00 00:00:00', '2020-03-10 12:20:20', '06:05'),
(2, 'task 3 no desc', 'doei', 'active', 1, '0000-00-00 00:00:00', '2020-03-10 12:20:20', '06:05'),
(4, 'task 3 no desc', 'doei', 'active', 2, '0000-00-00 00:00:00', '2020-03-10 12:20:20', '06:05'),
(5, 'task 3 no desc', 'doei', 'active', 2, '0000-00-00 00:00:00', '2020-03-10 12:20:20', '06:05'),
(8, 'task 3 no desc', 'doei', 'active', 74, '2020-02-15 11:40:58', '2020-03-10 12:20:20', '06:05'),
(9, 'task 3 no desc', 'doei', 'active', 74, '2020-02-15 11:41:11', '2020-03-10 12:20:20', '06:05'),
(10, 'task 3 no desc', 'doei', 'active', 75, '2020-02-15 12:23:50', '2020-03-10 12:20:20', '06:05'),
(11, 'task 3 no desc', 'doei', 'active', 75, '2020-02-15 12:37:56', '2020-03-10 12:20:20', '06:05'),
(12, 'task 3 no desc', 'doei', 'active', 77, '2020-02-15 01:14:18', '2020-03-10 12:20:20', '06:05'),
(13, 'task 3 no desc', 'doei', 'active', 75, '2020-02-17 10:37:24', '2020-03-10 12:20:20', '06:05'),
(14, 'task 3 no desc', 'doei', 'active', 80, '2020-02-17 10:38:15', '2020-03-10 12:20:20', '06:05'),
(15, 'task 3 no desc', 'doei', 'active', 80, '2020-02-17 10:40:11', '2020-03-10 12:20:20', '06:05'),
(16, 'task 3 no desc', 'doei', 'active', 80, '2020-02-17 10:40:37', '2020-03-10 12:20:20', '06:05'),
(17, 'task 3 no desc', 'doei', 'active', 80, '2020-02-17 10:41:24', '2020-03-10 12:20:20', '06:05'),
(18, 'task 3 no desc', 'doei', 'active', 81, '2020-02-17 13:57:13', '2020-03-10 12:20:20', '06:05'),
(19, 'task 3 no desc', 'doei', 'active', 81, '2020-02-19 13:26:32', '2020-03-10 12:20:20', '06:05'),
(20, 'task 3 no desc', 'doei', 'active', 84, '2020-02-19 14:43:16', '2020-03-10 12:20:20', '06:05'),
(21, 'task 3 no desc', 'doei', 'active', 80, '2020-02-24 12:30:11', '2020-03-10 12:20:20', '06:05'),
(22, 'task 3 no desc', 'doei', 'active', 80, '2020-02-24 12:30:11', '2020-03-10 12:20:20', '06:05'),
(23, 'task 3 no desc', 'doei', 'active', 84, '2020-03-08 17:40:42', '2020-03-10 12:20:20', '06:05'),
(24, 'task 3 no desc', 'doei', 'active', 86, '2020-03-08 18:01:49', '2020-03-10 12:20:20', '06:05'),
(25, 'task 3 no desc', 'doei', 'active', 86, '2020-03-09 10:04:02', '2020-03-10 12:20:20', '06:05'),
(26, 'task 3 no desc', 'doei', 'active', 87, '2020-03-09 10:38:50', '2020-03-10 12:20:20', '06:05'),
(27, 'task 3 no desc213123', 'ja yweet', 'active', 88, '2020-03-10 12:20:14', '2020-03-10 12:24:38', '05:06'),
(28, 'task 3 no desc213123', 'ja yweet', 'active', 88, '2020-03-10 12:24:32', '2020-03-10 12:24:38', '05:06');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
