-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 15, 2020 alle 11:43
-- Versione del server: 10.4.6-MariaDB
-- Versione PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `negozi`
--
CREATE DATABASE IF NOT EXISTS `negozi` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `negozi`;

-- --------------------------------------------------------

--
-- Struttura della tabella `commerciali`
--

CREATE TABLE `commerciali` (
  `Id` int(11) NOT NULL,
  `User` varchar(20) NOT NULL,
  `Ragsociale` varchar(40) NOT NULL,
  `Cognome` varchar(20) NOT NULL,
  `Nome` varchar(20) NOT NULL,
  `Indirizzo` varchar(20) NOT NULL,
  `Citta` varchar(40) NOT NULL,
  `Provincia` varchar(20) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `commerciali`
--

INSERT INTO `commerciali` (`Id`, `User`, `Ragsociale`, `Cognome`, `Nome`, `Indirizzo`, `Citta`, `Provincia`, `Telefono`, `Email`, `Note`) VALUES
(0, '', '', '', '', '', '', '', '', '', ''),
(1, 'Master', '', 'master', 'master', 'via master', 'masterinia', 'master', '234234234', 'master@master.com', 'sono il master'),
(2, 'Berry', '', 'straw', 'berry', 'via fruttifera 2', 'macedonia', 'trento', '3334443331111', 'berry@strawberry.com', 'my name is berry, straw berry\r\n\r\n'),
(3, 'babbano', '', 'bab', 'banno', 'vis sdalas', 'lcdsaòfkòlasdk', 'asdf', '23414', 'sadlfklask', 'dkaslfkdòsakflòkkasdfkl ksadlòfk \r\n'),
(8, 'GSDFG', 'SFDGSFD', 'PISONI', 'SIMONE', 'SDFGSDF', 'GDSFG', 'CALAVINO', '3381503161', 'GSFDGSDFG@F', 'DFSG');

-- --------------------------------------------------------

--
-- Struttura della tabella `negozi`
--

CREATE TABLE `negozi` (
  `Id` int(11) NOT NULL,
  `User` varchar(20) NOT NULL,
  `Ragsociale` varchar(40) NOT NULL,
  `Cognome` varchar(20) NOT NULL,
  `Nome` varchar(20) NOT NULL,
  `Indirizzo` varchar(20) NOT NULL,
  `Citta` varchar(40) NOT NULL,
  `Provincia` varchar(20) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Note` text NOT NULL,
  `Idcommerciale` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `negozi`
--

INSERT INTO `negozi` (`Id`, `User`, `Ragsociale`, `Cognome`, `Nome`, `Indirizzo`, `Citta`, `Provincia`, `Telefono`, `Email`, `Note`, `Idcommerciale`) VALUES
(3, '', 'bartolomeo', 'straw', 'berry', 'via rosasi', 'sdjsakjdkaj', 'weor', '344333', 'sadlfklask@fsgfdg.vom', '3434242342342', 1),
(4, '', 'opdipoasi', '', 'jdkdsjf', 'dkfjsklafj', 'ekjfkdslj', 'dwjflkjdsa', 'dkwjfldskajf', 'kldjflkjds', 'dklfjlsjflkjsdf', 1),
(8, '', 'BABBANO', 'NATALE', 'BABBO', '', 'LAPPONIA', 'ROMA', '323423423', 'SSDD@DSD', '', 2),
(9, '', 'POLISELIS', 'DINA', 'LAMPA', 'POLIS', 'POOPOPO', 'PO', '4443332222', 'VIVIVIV@VVV', 'BERRRRR', 0),
(10, '', 'SIMOPISA', 'PISONI', 'SIMONE', 'CIRR', 'CALAVINO', 'CALAVINO', '3381503161', '', '', 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `idutente` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tipo` varchar(20) NOT NULL DEFAULT 'user',
  `userimg` varchar(200) NOT NULL DEFAULT '../img/user.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`idutente`, `username`, `password`, `tipo`, `userimg`) VALUES
(1, 'admin', 'password', 'admin', '../img/tardis.gif'),
(2, 'banana', 'password1', 'admin', '../img/well_MIRL_cat-superJumbo-v2.gif');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `commerciali`
--
ALTER TABLE `commerciali`
  ADD PRIMARY KEY (`Id`);

--
-- Indici per le tabelle `negozi`
--
ALTER TABLE `negozi`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `idcommerciale` (`Idcommerciale`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idutente`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `commerciali`
--
ALTER TABLE `commerciali`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `negozi`
--
ALTER TABLE `negozi`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `idutente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `negozi`
--
ALTER TABLE `negozi`
  ADD CONSTRAINT `idcommerciale` FOREIGN KEY (`Idcommerciale`) REFERENCES `commerciali` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
