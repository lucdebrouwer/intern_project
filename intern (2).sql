-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 12 nov 2018 om 15:29
-- Serverversie: 10.1.29-MariaDB
-- PHP-versie: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intern`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categorien`
--

CREATE TABLE `categorien` (
  `id` int(11) NOT NULL,
  `naam` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `categorien`
--

INSERT INTO `categorien` (`id`, `naam`, `stock`) VALUES
(1, 'Algemeen', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE `gebruikers` (
  `id` int(11) NOT NULL,
  `gebruikersnaam` varchar(80) NOT NULL,
  `afkorting` varchar(4) NOT NULL,
  `wachtwoord` char(60) NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`id`, `gebruikersnaam`, `afkorting`, `wachtwoord`, `rol_id`) VALUES
(7, 'rickvanoers', 'RICK', '$2y$10$PNpRpstlPLr8.BGZTLbG5uiM66nAt/d0w0oMEEU6/a5BEJtdWrNEe', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `producten`
--

CREATE TABLE `producten` (
  `id` int(11) NOT NULL,
  `naam` varchar(120) NOT NULL,
  `omschrijving` varchar(255) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `product_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `producten`
--

INSERT INTO `producten` (`id`, `naam`, `omschrijving`, `categorie_id`, `product_amount`) VALUES
(1, 'T-Shirt', 'Mooi', 1, 15);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reserveringen`
--

CREATE TABLE `reserveringen` (
  `id` int(11) NOT NULL,
  `gebruikers_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `date_ordered` date NOT NULL,
  `date_back` date NOT NULL,
  `place` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `reserveringen`
--

INSERT INTO `reserveringen` (`id`, `gebruikers_id`, `product_id`, `amount`, `date`, `date_ordered`, `date_back`, `place`) VALUES
(1, 7, 1, 12, '2018-10-10', '2018-10-01', '2018-10-09', '2.09'),
(2, 7, 1, 1, '2018-10-09', '2018-10-08', '2018-10-10', '2.09'),
(3, 7, 1, 1, '2018-10-10', '2018-10-08', '2018-10-09', '2.09'),
(4, 7, 1, 1, '2018-10-10', '2018-10-08', '2018-10-10', '2.09'),
(5, 7, 1, 1, '2018-10-12', '2018-10-09', '2018-10-24', '1.04'),
(6, 7, 1, 1, '2018-10-12', '2018-10-09', '2018-10-24', '1.04'),
(7, 7, 1, 1, '2018-10-09', '2018-10-09', '2018-10-24', '1.04');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `rollen`
--

CREATE TABLE `rollen` (
  `id` int(11) NOT NULL,
  `naam` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `rollen`
--

INSERT INTO `rollen` (`id`, `naam`) VALUES
(1, 'Docent'),
(2, 'Beheerder');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `categorien`
--
ALTER TABLE `categorien`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- Indexen voor tabel `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorie_id` (`categorie_id`);

--
-- Indexen voor tabel `reserveringen`
--
ALTER TABLE `reserveringen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gebruikers_id` (`gebruikers_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexen voor tabel `rollen`
--
ALTER TABLE `rollen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `categorien`
--
ALTER TABLE `categorien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `producten`
--
ALTER TABLE `producten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `reserveringen`
--
ALTER TABLE `reserveringen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `rollen`
--
ALTER TABLE `rollen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD CONSTRAINT `gebruikers_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `rollen` (`id`);

--
-- Beperkingen voor tabel `producten`
--
ALTER TABLE `producten`
  ADD CONSTRAINT `producten_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categorien` (`id`);

--
-- Beperkingen voor tabel `reserveringen`
--
ALTER TABLE `reserveringen`
  ADD CONSTRAINT `reserveringen_ibfk_1` FOREIGN KEY (`gebruikers_id`) REFERENCES `gebruikers` (`id`),
  ADD CONSTRAINT `reserveringen_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `producten` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
