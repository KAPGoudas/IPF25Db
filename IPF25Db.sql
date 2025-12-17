-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: sql113.infinityfree.com
-- Χρόνος δημιουργίας: 16 Δεκ 2025 στις 07:23:26
-- Έκδοση διακομιστή: 11.4.7-MariaDB
-- Έκδοση PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `if0_40598791_IPF25Db`
--
CREATE DATABASE IF NOT EXISTS `if0_40598791_IPF25Db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `if0_40598791_IPF25Db`;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `erga`
--

DROP TABLE IF EXISTS `erga`;
CREATE TABLE `erga` (
  `title` varchar(350) NOT NULL,
  `writer` varchar(60) NOT NULL,
  `energos` tinyint(1) DEFAULT 1,
  `oor` smallint(5) UNSIGNED DEFAULT 1,
  `owner1` varchar(60) NOT NULL DEFAULT 'ERROR',
  `date1` date DEFAULT NULL,
  `notary1` varchar(60) DEFAULT NULL,
  `owner2` varchar(60) DEFAULT NULL,
  `date2` date DEFAULT NULL,
  `notary2` varchar(60) DEFAULT NULL,
  `owner3` varchar(60) DEFAULT NULL,
  `date3` date DEFAULT NULL,
  `notary3` varchar(60) DEFAULT NULL,
  `owner4` varchar(60) DEFAULT NULL,
  `date4` date DEFAULT NULL,
  `notary4` varchar(60) DEFAULT NULL,
  `owner5` varchar(60) DEFAULT NULL,
  `date5` date DEFAULT NULL,
  `notary5` varchar(60) DEFAULT NULL,
  `owner6` varchar(60) DEFAULT NULL,
  `date6` date DEFAULT NULL,
  `notary6` varchar(60) DEFAULT NULL,
  `owner7` varchar(60) DEFAULT NULL,
  `date7` date DEFAULT NULL,
  `notary7` varchar(60) DEFAULT NULL,
  `owner8` varchar(60) DEFAULT NULL,
  `date8` date DEFAULT NULL,
  `notary8` varchar(60) DEFAULT NULL,
  `owner9` varchar(60) DEFAULT NULL,
  `date9` date DEFAULT NULL,
  `notary9` varchar(60) DEFAULT NULL,
  `owner10` varchar(60) DEFAULT NULL,
  `date10` date DEFAULT NULL,
  `notary10` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Άδειασμα δεδομένων του πίνακα `erga`
--

INSERT INTO `erga` (`title`, `writer`, `energos`, `oor`, `owner1`, `date1`, `notary1`, `owner2`, `date2`, `notary2`, `owner3`, `date3`, `notary3`, `owner4`, `date4`, `notary4`, `owner5`, `date5`, `notary5`, `owner6`, `date6`, `notary6`, `owner7`, `date7`, `notary7`, `owner8`, `date8`, `notary8`, `owner9`, `date9`, `notary9`, `owner10`, `date10`, `notary10`) VALUES
('Ιλιάς', 'Όμηρος', 0, 1, 'Ελληνική Δημοκρατία', '1993-03-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Το μυστικό της κοντέσσας Βαλέραινας', 'Γρηγόριος Ξενόπουλος', 0, 1, 'Ελληνική Δημοκρατία', '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Οδύσσεια', 'Όμηρος', 0, 1, 'Ελληνική Δημοκρατία', '1993-03-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Οι Οπτιστές', 'Κωνσταντίνος-Αναστάσιος Γούδας', 1, 2, 'Κωνσταντίνος-Αναστάσιος Γούδας', '2024-04-10', 'Ευγενία Σταυροπούλου', 'Εκδόσεις Μιχάλη Σιδέρη', '2024-09-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Αργοναυτικά', 'Απολλώνιος ο Ρόδιος', 0, 1, 'Ελληνική Δημοκρατία', '1993-03-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Βίος και Πολιτεία του Αλέξη Ζορμπά', 'Νικόλαος Καζαντζάκης', 0, 1, 'Εκδόσεις Διόπτρα', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Αγάπη Παράνομη', 'Κωνσταντίνος Θεοτόκης', 0, 1, 'Ελληνική Δημοκρατία', '1993-03-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Μυστικοί Αρραβώνες', 'Γρηγόριος Ξενόπουλος', 0, 1, 'Ελληνική Δημοκρατία', '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Ο Καπετάν Μιχάλης', 'Νικόλαος Καζαντζάκης', 0, 1, 'Εκδόσεις Διόπτρα', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Το Λάθος', 'Αντώνιος Σαμαράκης', 0, 1, 'Εκδόσεις Ψυχογιός', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Η Φόνισσα', 'Αλέξανδρος Παπαδιαμάντης', 0, 1, 'Ελληνική Δημοκρατία', '1993-03-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Ζητείται Ελπίς', 'Αντώνιος Σαμαράκης', 0, 1, 'Εκδόσεις Ψυχογιός', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Ο Χριστός ξανασταυρώνεται', 'Νικόλαος Καζαντζάκης', 0, 1, 'Εκδόσεις Διόπτρα', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Το χέρι του νεκρού', 'Ελευθέριος Μπούρος', 1, 2, 'Ελευθέριος Μπούρος', NULL, '', 'Χάρλενικ Ελλάς', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Δύσκολος', 'Μένανδρος', 0, 1, 'Ελληνική Δημοκρατία', '1993-03-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Σήμα Κινδύνου', 'Αντώνιος Σαμαράκης', 0, 1, 'Εκδόσεις Ψυχογιός', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, ''),
('Άμλετ', 'Γουίλλιαμ Σαίξπηρ', 0, 1, 'Ελληνική Δημοκρατία', '1993-03-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Χριστουγεννιάτικη Ιστορία', 'Κάρολος Ντίκενς', 0, 1, 'Ελληνική Δημοκρατία', '1993-03-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('20000 λεύγες κάτω από τη θάλασσα', 'Ιούλιος Βερν', 0, 1, 'Ελληνική Δημοκρατία', '1993-03-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Η Πάπισσα Ιωάννα', 'Εμμανουήλ Ροΐδης', 0, 1, 'Ελληνική Δημοκρατία', '1993-03-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `notaries`
--

DROP TABLE IF EXISTS `notaries`;
CREATE TABLE `notaries` (
  `notary` varchar(60) DEFAULT NULL,
  `tele` int(10) UNSIGNED DEFAULT NULL,
  `email` varchar(320) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Άδειασμα δεδομένων του πίνακα `notaries`
--

INSERT INTO `notaries` (`notary`, `tele`, `email`) VALUES
('Ευγενία Σταυροπούλου', 2610224221, 'evgeniastavropoulou@gmail.com'),
('Χαρά Ζηνόζη-Μπατσούλα', 2610221372, 'zinozi.xara@hotmail.gr'),
('Ιωάννα Κόντου', 2693024285, 'ioankontou@gmail.com'),
('Μαρία Φιλοπούλου', 2611813495, 'filopmar.notary@gmail.com'),
('Ιωάννα Καζάνη', 2610271459, 'ioannakazani96@gmail.com'),
('Αργυρώ Τσάκα', 2610324969, 'argitsaka@gmail.com');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `pubs`
--

DROP TABLE IF EXISTS `pubs`;
CREATE TABLE `pubs` (
  `house` varchar(60) DEFAULT NULL,
  `site` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Άδειασμα δεδομένων του πίνακα `pubs`
--

INSERT INTO `pubs` (`house`, `site`) VALUES
('Μιχάλη Σιδέρη', 'www.siderisbooks.gr'),
('Διόπτρα', 'www.dioptra.gr'),
('Ψυχογιός', 'www.psichogios.gr'),
('Χάρλενικ Ελλάς', 'www.harlenic.gr'),
('Βιβλιοπωλείον της Εστίας', 'www.hestia.gr');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
