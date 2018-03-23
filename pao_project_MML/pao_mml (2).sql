-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 23 mrt 2018 om 10:37
-- Serverversie: 10.1.21-MariaDB
-- PHP-versie: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pao_mml`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_02_22_085832_create_products_table', 1),
(2, '2018_03_09_083125_add_img_to_products', 2),
(3, '2018_03_09_083539_remove_dates_from_products', 3),
(4, '2018_03_14_125917_add_timestamps_to_products_table', 4),
(5, '2018_03_19_110820_create_users_table', 5),
(6, '2018_03_19_111810_add_column_to_users_table', 6),
(7, '2018_03_19_115756_add_column_api_to_users_table', 7);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`id`, `name`, `brand`, `color`, `price`, `description`, `img`, `created_at`, `updated_at`) VALUES
(1, 'product1', 'merk1', 'kleur1', 10.00, 'beschrijving1', 'afbeelding1', '2018-03-16 06:57:18', '2018-03-16 06:57:18'),
(2, 'product2', 'merk2', 'kleur2', 15.00, 'beschrijving2', 'afbeelding2', '2018-03-16 06:59:06', '2018-03-16 06:59:06'),
(3, 'product3', 'merk3', 'kleur3', 20.00, 'beschrijving3', 'afbeelding3', '2018-03-16 06:59:29', '2018-03-16 06:59:29'),
(4, 'product4', 'merk4', 'kleur4', 25.00, 'beschrijving4', 'afbeelding4', '2018-03-16 06:59:56', '2018-03-16 06:59:56'),
(5, 'product5', 'merk5', 'kleur5', 30.00, 'beschrijving5', 'afbeelding5', '2018-03-16 07:01:56', '2018-03-16 07:01:56'),
(6, 'product6', 'merk6', 'kleur6', 35.00, 'beschrijving6', 'afbeelding6', '2018-03-16 07:02:54', '2018-03-16 07:02:54');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` int(11) NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `api_token` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `rank`, `password`, `remember_token`, `created_at`, `updated_at`, `api_token`) VALUES
(1, 'Maurice Bruijn', 'bruijn201@gmail.com', 2, '$2y$10$40ZaDpgAAqPpydgJIAG.RuJoSHQpLrhC6YZucCd1D5CCjKC3KNt7a', 'aUPK2BqIm35gft8R6qDzRKgr9gm0WV6It1VjzFGWynZ37M2bpgsnMziwLunh', '2018-03-19 10:09:23', '2018-03-19 21:26:26', NULL);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
