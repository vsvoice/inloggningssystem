-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 16 apr 2024 kl 10:06
-- Serverversion: 10.4.28-MariaDB
-- PHP-version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `2024_dyn_uppg8_login`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `table_roles`
--

CREATE TABLE `table_roles` (
  `r_id` int(11) NOT NULL,
  `r_name` varchar(255) NOT NULL,
  `r_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `table_roles`
--

INSERT INTO `table_roles` (`r_id`, `r_name`, `r_level`) VALUES
(1, 'User', 10),
(2, 'Moderator', 50),
(3, 'Admin', 200),
(4, 'Guest', 0);

-- --------------------------------------------------------

--
-- Tabellstruktur `table_users`
--

CREATE TABLE `table_users` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_password` varchar(512) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_role_fk` int(11) NOT NULL,
  `u_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `table_users`
--

INSERT INTO `table_users` (`u_id`, `u_name`, `u_password`, `u_email`, `u_role_fk`, `u_status`) VALUES
(1, 'asd', '', 'asd@gmail.com', 1, 1),
(2, 'apa', '', 'apa@gmail.com', 1, 1),
(3, 'erik', '$2y$10$9GXj0uj9IOuyffKfVl3VgeGG7JSQN6HXBorqubjxQhxQ/Bjl.Eoli', 'erik@hotmail.com', 1, 1),
(4, 'Monkey', '$2y$10$926xI3XddJFdh/zlsIzhs.SW0KcLBkQHnAWWDoyPEySdxxHL2/L1S', 'monkey@gmail.com', 2, 1),
(5, 'Mario', '$2y$10$VOd.v3b/9X41uQtMZGVqi.0CCORra51c0ayJ4JhGp0iWjFoDpGIpW', 'super@mario.com', 3, 1);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `table_roles`
--
ALTER TABLE `table_roles`
  ADD PRIMARY KEY (`r_id`);

--
-- Index för tabell `table_users`
--
ALTER TABLE `table_users`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `u_role_fk` (`u_role_fk`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `table_roles`
--
ALTER TABLE `table_roles`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT för tabell `table_users`
--
ALTER TABLE `table_users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `table_users`
--
ALTER TABLE `table_users`
  ADD CONSTRAINT `table_users_ibfk_1` FOREIGN KEY (`u_role_fk`) REFERENCES `table_roles` (`r_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
