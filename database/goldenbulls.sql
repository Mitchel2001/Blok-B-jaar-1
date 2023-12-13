-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 13 dec 2023 om 09:17
-- Serverversie: 8.0.31
-- PHP-versie: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goldenbulls`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `kentekens`
--

DROP TABLE IF EXISTS `kentekens`;
CREATE TABLE IF NOT EXISTS `kentekens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `naam` varchar(255) NOT NULL,
  `kenteken` varchar(20) NOT NULL,
  `begin_datum` date NOT NULL,
  `eind_datum` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_kenteken` (`kenteken`),
  KEY `idx_datum` (`begin_datum`,`eind_datum`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `kentekens`
--

INSERT INTO `kentekens` (`id`, `naam`, `kenteken`, `begin_datum`, `eind_datum`) VALUES
(9, 'janwilemwww', '23-AS-23', '2023-10-10', '2023-10-10'),
(6, 'Jane Doe', 'AB-CD-56', '2023-02-15', '2023-03-15'),
(7, 'Bob Smith', 'CD-78-EF', '2023-03-10', '2023-04-10'),
(8, 'Alice Johnson', 'FG-90-HI', '2023-04-05', '2023-05-05'),
(33, 'Keeswillem', '23-45-DA', '2023-11-23', '2023-11-25'),
(13, 'Jane Smithhhh', 'JK-45-LM', '2023-12-06', '2023-12-20'),
(14, 'Bob Johnson', 'WX-67-YZ', '2023-12-11', '2023-12-25'),
(16, 'Charlie White', 'EF-12-GH', '2023-12-21', '2024-01-04'),
(17, 'David Black', 'IJ-34-KL', '2023-12-26', '2024-01-09'),
(18, 'Emma Green', 'MN-56-OP', '2024-01-01', '2024-01-15'),
(19, 'Frank Red', 'QR-78-ST', '2024-01-06', '2024-01-20'),
(20, 'Grace Blue', 'UV-90-WX', '2024-01-11', '2024-01-25'),
(21, 'Henry Yellow', 'YZ-01-AB', '2024-01-16', '2024-01-30'),
(22, 'Ivy Orange', 'CD-23-EF', '2024-01-21', '2024-02-04'),
(23, 'Jack Purple', 'GH-45-IJ', '2024-01-26', '2024-02-08'),
(24, 'Kelly Pink', 'KL-67-MN', '2024-02-01', '2024-02-15'),
(25, 'Liam Gold', 'OP-89-QR', '2024-02-06', '2024-02-20'),
(26, 'Mia Silver', 'ST-12-UV', '2024-02-11', '2024-02-25'),
(27, 'Noah Platinum', 'WX-34-YZ', '2024-02-16', '2024-03-01'),
(28, 'Olivia Copper', 'IJ-56-KL', '2024-02-21', '2024-03-05'),
(29, 'Penelope Brass', 'MN-78-OP', '2024-02-26', '2024-03-10'),
(30, 'Quinn Bronze', 'QR-90-ST', '2024-03-02', '2024-03-16'),
(31, 'Riley Aluminum', 'UV-01-WX', '2024-03-07', '2024-03-21'),
(34, 'janwillem', 'SD-34-SD', '2023-11-23', '2023-11-26'),
(36, 'testt', 'ZD-465-H', '2023-11-26', '2023-11-30'),
(37, 'Mams auto', 'K-971-SJ', '2023-11-28', '2023-12-09');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `password` varchar(155) DEFAULT NULL,
  `email` varchar(155) DEFAULT NULL,
  `first_name` varchar(155) DEFAULT NULL,
  `last_name` varchar(155) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `address` varchar(155) DEFAULT NULL,
  `role` enum('guest','employee','owner') DEFAULT 'guest',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `unique_email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `password`, `email`, `first_name`, `last_name`, `phone_number`, `birthdate`, `address`, `role`) VALUES
(1, '$2y$10$i3ZQaZfcVXf1J/PQ0sOXsu5AsO5hq2gB4ngC5xnlAk2oCissYclCC', '123@123', 'mitchel', 'Wingelaar', '0614798368', '2023-12-13', 'conferanseperenlaan ', 'guest'),
(2, '$2y$10$8pB7Mna3hxmgG8IhRJ/TZ.aR/NYBkdzVOUdbobyJGzi.B93Znklw.', '1234@1234', 'mitchell', 'Wingelaarr', '06147983688', '2023-12-15', 'conferanseperenlaann ', 'owner');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
