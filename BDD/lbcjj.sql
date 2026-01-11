-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 06, 2026 at 10:01 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lbcjj`
--
CREATE DATABASE IF NOT EXISTS `lbcjj` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `lbcjj`;

-- --------------------------------------------------------

--
-- Table structure for table `annonce`
--

DROP TABLE IF EXISTS `annonce`;
CREATE TABLE `annonce` (
  `ID_ANNONCE` int NOT NULL,
  `TITRE_ANNONCE` varchar(50) NOT NULL,
  `DESCRIPTION` varchar(50) DEFAULT NULL,
  `PRIX` decimal(15,2) NOT NULL,
  `DATE_` date NOT NULL,
  `ID_USER` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `compte_utilisateur`
--

DROP TABLE IF EXISTS `compte_utilisateur`;
CREATE TABLE `compte_utilisateur` (
  `ID_USER` int NOT NULL,
  `NOM_USER` varchar(50) NOT NULL,
  `PRENOM_USER` varchar(50) NOT NULL,
  `MDP_USER` varchar(50) NOT NULL,
  `MAIL_USER` varchar(50) NOT NULL,
  `ROLE_USER` enum('user','admin') NOT NULL DEFAULT 'user',
  `ARCHIVE_USER` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `compte_utilisateur`
--

INSERT INTO `compte_utilisateur` (`ID_USER`, `NOM_USER`, `PRENOM_USER`, `MDP_USER`, `MAIL_USER`, `ROLE_USER`) VALUES
(1, 'Gatti', 'Jerome', 'Jeromegat', 'gattijerome@gmail.com', 'admin'),
(2, 'Robert', 'Jason', 'Jasonrob', 'jasonrob@gmail.com', 'admin'),
(3, 'Bin', 'Damien', 'Damienbin', 'bindamien@gmail.com', 'admin'),
(4, 'Blanchedent', 'Mickaël', 'Mickaelbla', 'blandedentmickael@gmail.com', 'user'),
(5, 'Denysov', 'Ivan', 'Ivanden', 'denysovivan@gmail.com', 'user'),
(6, 'Gassies', 'Jean-Marie', 'Jmgas', 'gassiesjm@gmail.com', 'user'),
(7, 'Mbock', 'Martine', 'Martinembo', 'mbockmartine@gmail.com', 'user'),
(8, 'Naciri-Farid', 'Inene', 'Inenenac', 'naciriinene@gmail.com', 'user'),
(9, 'Niakate', 'Makan', 'Makannia', 'niakatemakan@gmail.com', 'user'),
(10, 'Vaugirard', 'Jean-Baptiste', 'Jbvau', 'vaugirardjb@gmail.com', 'user'),
(11, 'Desevaux', 'Corentin', 'Corentindes', 'desevauxcorentin@gmail.com', 'user');


-- --------------------------------------------------------

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE `image` (
  `ID_IMAGE` int NOT NULL,
  `ID_ANNONCE` int NOT NULL,
  `chemin_image` varchar(255) NOT NULL,
  `ordre` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`ID_ANNONCE`),
  ADD KEY `ID_USER` (`ID_USER`);

--
-- Indexes for table `compte_utilisateur`
--
ALTER TABLE `compte_utilisateur`
  ADD PRIMARY KEY (`ID_USER`),
  ADD UNIQUE KEY `MAIL_USER` (`MAIL_USER`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`ID_IMAGE`),
  ADD KEY `ID_ANNONCE` (`ID_ANNONCE`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `ID_ANNONCE` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compte_utilisateur`
--
ALTER TABLE `compte_utilisateur`
  MODIFY `ID_USER` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `ID_IMAGE` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `annonce_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `compte_utilisateur` (`ID_USER`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`ID_ANNONCE`) REFERENCES `annonce` (`ID_ANNONCE`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
