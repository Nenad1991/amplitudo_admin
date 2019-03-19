-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 19. Mrz 2019 um 12:03
-- Server-Version: 10.1.29-MariaDB
-- PHP-Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `amplitudo`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `career`
--

CREATE TABLE `career` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `text_en` text NOT NULL,
  `img` text NOT NULL,
  `status` enum('available','hidden') NOT NULL DEFAULT 'available',
  `date_start` date NOT NULL,
  `date_finish` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `author` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `text_short` text NOT NULL,
  `text_short_en` text NOT NULL,
  `text_long` longtext NOT NULL,
  `text_long_en` longtext NOT NULL,
  `img` text NOT NULL,
  `alt_tag` text NOT NULL,
  `alt_tag_en` text NOT NULL,
  `tags` text NOT NULL,
  `tags_en` text NOT NULL,
  `status` enum('available','hidden') NOT NULL DEFAULT 'available',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `about_en` text NOT NULL,
  `text_short` text NOT NULL,
  `text_short_en` text NOT NULL,
  `text_long` longtext NOT NULL,
  `text_long_en` longtext NOT NULL,
  `img_cover` text NOT NULL,
  `img` text NOT NULL,
  `alt_tag` text NOT NULL,
  `alt_tag_en` text NOT NULL,
  `status` enum('available','hidden') NOT NULL DEFAULT 'available',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `power` varchar(255) NOT NULL,
  `img` varchar(500) NOT NULL DEFAULT 'user-icon.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `firstname`, `lastname`, `profession`, `power`, `img`) VALUES
(40, 'Nenad', 'admin@gmail.com', '$2y$10$cRXx.a2l.1JgNBAsdvb6ru2xnc8h0fxITOFI.kxh.muUZKMp5jIwG', 'Nenad', 'Vukmirovic', 'Programer', 'administrator', 'user-icon.png'),
(41, 'Marko', 'moderator@gmail.com', '$2y$10$y/S9OmCIXtM9DI1291JZCOU7b0viVpDwl3ip7ORPUmb6dL8ye0PIG', 'Marko', 'Markovic', 'Programer', 'moderator', 'user-icon.png');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `career`
--
ALTER TABLE `career`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
