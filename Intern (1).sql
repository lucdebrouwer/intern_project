-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 31 okt 2018 om 13:06
-- Serverversie: 5.7.19
-- PHP-versie: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_leerjaar_3`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

DROP TABLE IF EXISTS `gebruikers`;
CREATE TABLE IF NOT EXISTS `gebruikers` (
  `gebruikersID` int(10) NOT NULL AUTO_INCREMENT,
  `naam` varchar(255) NOT NULL,
  `afkorting` varchar(10) NOT NULL,
  `wachtwoord` char(60) NOT NULL,
  `rolID` int(11) NOT NULL,
  PRIMARY KEY (`gebruikersID`),
  UNIQUE KEY `naam` (`naam`),
  UNIQUE KEY `afkorting` (`afkorting`),
  KEY `rolID` (`rolID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`gebruikersID`, `naam`, `afkorting`, `wachtwoord`, `rolID`) VALUES
(1, 'Luc de Brouwer', 'BRLU', '$2y$10$CQdioVhO8C8EkPuCVW42zu4YxbPupE1JUTw1pXncloAcg5cHgLAJi', 1),
(2, 'test', 'test', '$2y$10$JxNRQwgNsP9nMN.Vg77QQ.DumEEVcNa9Fu82kUBr6hYIGLyOKQiii', 1),
(6, 'test1', 'test1', '$2y$10$Ip7yAG1prUhPAw1eUHGbW.cP.8Hn.OaxIB.ATLEPISSBXzu9omemm', 1),
(8, 'Jeffrey Heldoorn', 'HEJE', '$2y$10$l95BSLYgNF5OeqARUNnFce5aVerM6YZ2JxbAqK50lIaADF2ZiWd2y', 1),
(10, 'Stefan', 'SDBO', '$2y$10$hDESLeAKQtRxqoI6A8j5seZilE6igVQxVOGnQZSSCKDz/sFBdgPSG', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `producten`
--

DROP TABLE IF EXISTS `producten`;
CREATE TABLE IF NOT EXISTS `producten` (
  `productID` int(255) NOT NULL AUTO_INCREMENT,
  `naam` varchar(255) NOT NULL,
  `omschrijving` varchar(255) NOT NULL,
  `categorieID` int(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`productID`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `producten`
--

INSERT INTO `producten` (`productID`, `naam`, `omschrijving`, `categorieID`, `amount`, `date`) VALUES
(1, 'Muis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec semper, leo et imperdiet sagittis, elit urna eleifend ante, ac tempus tortor sapien nec tortor.', 2, 10, '2018-10-26 10:40:43'),
(2, 'Toetsenbord', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec semper, leo et imperdiet sagittis, elit urna eleifend ante, ac tempus tortor sapien nec tortor.', 2, 14, '2018-10-26 10:40:43'),
(3, 'Beeldscherm', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec semper, leo et imperdiet sagittis, elit urna eleifend ante, ac tempus tortor sapien nec tortor.', 1, 5, '2018-10-26 10:40:43'),
(4, 'Muismatten', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec semper, leo et imperdiet sagittis, elit urna eleifend ante, ac tempus tortor sapien nec tortor.', 2, 13, '2018-10-26 10:40:43'),
(7, 'PC\'s', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec semper, leo et imperdiet sagittis, elit urna eleifend ante, ac tempus tortor sapien nec tortor.', 2, 13, '2018-10-26 10:40:43'),
(8, 'HDMI kabels', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec semper, leo et imperdiet sagittis, elit urna eleifend ante, ac tempus tortor sapien nec tortor.', 3, 14, '2018-10-26 10:40:43'),
(9, 'Moederborden', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec semper, leo et imperdiet sagittis, elit urna eleifend ante, ac tempus tortor sapien nec tortor.', 3, 12, '2018-10-26 10:40:43'),
(10, 'Telefoons', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec semper, leo et imperdiet sagittis, elit urna eleifend ante, ac tempus tortor sapien nec tortor.', 2, 14, '2018-10-26 10:40:43'),
(11, 'Telefoons', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec semper, leo et imperdiet sagittis, elit urna eleifend ante, ac tempus tortor sapien nec tortor.', 2, 14, '2018-10-26 10:40:43'),
(12, 'Telefoons', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec semper, leo et imperdiet sagittis, elit urna eleifend ante, ac tempus tortor sapien nec tortor.', 2, 14, '2018-10-26 10:40:43'),
(13, 'Telefoons', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec semper, leo et imperdiet sagittis, elit urna eleifend ante, ac tempus tortor sapien nec tortor.', 2, 13, '2018-10-26 10:40:43'),
(26, 'test6', 'test6test6test6', 3, 2, '2018-10-26 10:40:43'),
(18, 'test', 'test', 2, 21, '2018-10-26 10:40:43'),
(23, 'test2', 'test2', 3, 14, '2018-10-26 10:40:43'),
(24, 'test4', 'uydgidgqiduq', 2, 12, '2018-10-26 10:40:43'),
(25, 'test6', 'test6test6test6', 3, 2, '2018-10-26 10:40:43'),
(19, 'qeqweqwe', 'qwewqeq', 1, 12, '2018-10-26 10:40:43'),
(20, 'dwdwefw', 'dwfwfwe', 2, 12, '2018-10-26 10:40:43'),
(21, 'test2', 'test2', 3, 14, '2018-10-26 10:40:43'),
(22, 'test2', 'test2', 3, 14, '2018-10-26 10:40:43');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `rollen`
--

DROP TABLE IF EXISTS `rollen`;
CREATE TABLE IF NOT EXISTS `rollen` (
  `rolID` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(255) NOT NULL,
  PRIMARY KEY (`rolID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `rollen`
--

INSERT INTO `rollen` (`rolID`, `rol`) VALUES
(1, 'docent'),
(2, 'stagiar');

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD CONSTRAINT `gebruikers_ibfk_1` FOREIGN KEY (`rolID`) REFERENCES `rollen` (`rolID`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
