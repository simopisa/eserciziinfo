-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 17, 2020 alle 09:40
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

-- --------------------------------------------------------

--
-- Struttura della tabella `commerciali`
--

CREATE TABLE `commerciali` (
  `Idcommerciale` int(11) NOT NULL,
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

INSERT INTO `commerciali` (`Idcommerciale`, `User`, `Ragsociale`, `Cognome`, `Nome`, `Indirizzo`, `Citta`, `Provincia`, `Telefono`, `Email`, `Note`) VALUES
(1, 'Master', '', 'master', 'master', 'via master', 'masterinia', 'master', '234234234', 'master@master.com', 'sono il master'),
(2, 'Berry', '', 'straw', 'berry', 'via fruttifera 2', 'macedonia', 'trento', '333444333222', 'berry@strawberry.com', 'my name is berry. Straw berry');

-- --------------------------------------------------------

--
-- Struttura della tabella `negozi`
--

CREATE TABLE `negozi` (
  `Idnegozio` int(11) NOT NULL,
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
-- Dump dei dati per la tabella `negozi`
--

INSERT INTO `negozi` (`Idnegozio`, `User`, `Ragsociale`, `Cognome`, `Nome`, `Indirizzo`, `Citta`, `Provincia`, `Telefono`, `Email`, `Note`) VALUES
(1, '', 'da Giovanni ma senza danni', 'peppino', 'giovanni', 'via settembre 11', 'roma', 'roma', '3333333333', 'peppino@giovanni.senzadanni.com', 'è una brava persona\r\n'),
(2, '', 'il caffè di dario', 'lampa', 'dario', 'via precauzionale 12', 'tibet', 'roma', '3345678934', 'lampadario@lampadina.it', '');

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
(2, 'banana', '12345', 'admin', '../img/well_MIRL_cat-superJumbo-v2.gif');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `commerciali`
--
ALTER TABLE `commerciali`
  ADD PRIMARY KEY (`Idcommerciale`);

--
-- Indici per le tabelle `negozi`
--
ALTER TABLE `negozi`
  ADD PRIMARY KEY (`Idnegozio`);

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
  MODIFY `Idcommerciale` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `negozi`
--
ALTER TABLE `negozi`
  MODIFY `Idnegozio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `idutente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
