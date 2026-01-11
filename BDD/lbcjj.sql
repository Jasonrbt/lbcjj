-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 11, 2026 at 08:36 PM
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
  `DESCRIPTION` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `PRIX` decimal(15,2) NOT NULL,
  `DATE_` date NOT NULL,
  `ID_USER` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `annonce`
--

INSERT INTO `annonce` (`ID_ANNONCE`, `TITRE_ANNONCE`, `DESCRIPTION`, `PRIX`, `DATE_`, `ID_USER`) VALUES
(1, 'VTT', 'Vtt vert comme neuf', 150.00, '2026-01-11', 1),
(2, 'PC Gamer', 'PC portable gaming MSI GL62M 7REX-2056XFR\r\n- Marque : MSI\r\n- Modèle : GL62M 7REX-2066XFR', 200.00, '2026-01-11', 1),
(3, 'Panier de basket pour porte', 'Très bon état', 10.50, '2026-01-11', 2),
(4, 'Trottinette électrique wispeed', 'Je vends ma trottinette électrique wispeed t855 pro,elle marche très bien le garde boue arrière est cassé.\r\nAutonomie de 15-17 km .\r\nVitesse max 25kmh\r\nLes plaquettes arrière sont neuve .', 130.00, '2026-01-11', 2),
(5, 'IPhone 15', 'Je vends mon iPhone 15 avec 128 Go de stockage.\r\nTrès bon état.', 400.00, '2026-01-11', 2),
(6, 'Xbox séries S', 'Je vend ma xbox marche s’allume mais n’affiche pas l’image du jour au lendemain le port hdmi est pas abîmé', 110.00, '2026-01-11', 3),
(7, 'Grande valise vintage en cuir synthétique', 'Grande valise vintage en cuir synthétique 64x40x16cm Pas de clés, mais avec les sangles, la valise se ferme bien et est protégée contre une ouverture accidentelle.', 25.00, '2026-01-11', 3),
(8, 'Peluche rouge 35 cm Paris 2024', 'Je vends cette peluche rouge officielle des Jeux Olympiques de Paris 2024.\r\nÉtat neuf.', 20.00, '2026-01-11', 4),
(9, 'Peluche 20cm de wednesday', 'Je vends cette peluche de Wednesday, le personnage de la Famille Adams, produite par Kidrobot en 2023. Il s\'agit d\'un modèle Phunny distribué par Rubies, adapté aux enfants dès 0 ans.', 11.20, '2026-01-11', 4),
(10, 'ENCRIER VICTORIEN, Argent massif Anglais', 'Superbe et rare encrier Victorien en argent massif sterling avec bordure de galerie\r\nRéalisé en 1893 par Wiliam Gibson & John Langman, célèbres orfèvres Anglais', 950.00, '2026-01-11', 5),
(11, 'Norev 1 18', 'Je vends cette voiture de collection Norev 1:18 Citroën GS, un modèle iconique des années 70 avec une livrée multicolore aux couleurs des drapeaux européens.', 60.00, '2026-01-11', 5),
(12, '6 tasses arcopal scania fleurs vintage', 'En très bon état général', 12.00, '2026-01-11', 5),
(13, 'Chaussures de ski Salomon', 'Vends chaussures de ski femme Salomon en très bon état pointure 37.', 50.00, '2026-01-11', 6),
(14, 'Vinyle Eagles', 'Je vends l\'album vinyle \"Long Road Out of Eden\" du groupe légendaire Eagles.', 20.00, '2026-01-11', 6),
(15, 'Brûleur encens artisanal', 'beau brûleur d’encens en bois au charme authentique et intemporel!\r\nCette pièce présente un design tribal fascinant avec des motifs géométriques sculptés en relief qui lui confèrent un caractère exceptionnel. Sa forme originale avec compartiments intégrés allie parfaitement esthétique et fonctionnalité.', 15.00, '2026-01-11', 7),
(16, 'Nintendo Switch', 'Nintendo Switch 1 en bon état, complète avec dock, manettes Joy-Con, câble HDMI et alimentation.\r\nFonctionne parfaitement.', 150.00, '2026-01-11', 7),
(17, 'Velo btwin', 'Vlo enfant btwin\r\n16 pouces\r\nNoir et orange', 40.00, '2026-01-11', 8),
(18, 'Blouse tunique Très grande taille', 'Blouse tunique\r\nTrès grande taille 50 et +\r\nCouleur abricot\r\nTrès bon état', 5.00, '2026-01-11', 8),
(19, 'Lot de carte pokemon', 'Le lot contient 100 cartes pokemon neuves, officielles et sans doubles.', 12.30, '2026-01-11', 9),
(20, 'Jeux D.B.Z Budokai 3 blister original PS2', 'Boujour je vends mon jeux D.B.Z il est encore sous blister PlayStation 2 jamais déballé.', 200.00, '2026-01-11', 9),
(21, 'Ligier JS60 Chic noire', 'Je vends Ligier JS60 Chic en excellent état intérieur et extérieur.\r\nVéhicule récent, propre, soigné, agréable à conduire.\r\nAucun frais à prévoir.', 12900.00, '2026-01-11', 10);

-- --------------------------------------------------------

--
-- Table structure for table `compte_utilisateur`
--

DROP TABLE IF EXISTS `compte_utilisateur`;
CREATE TABLE `compte_utilisateur` (
  `ID_USER` int NOT NULL,
  `NOM_USER` varchar(50) NOT NULL,
  `PRENOM_USER` varchar(50) NOT NULL,
  `MDP_USER` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `MAIL_USER` varchar(50) NOT NULL,
  `ROLE_USER` enum('user','admin') NOT NULL DEFAULT 'user',
  `ARCHIVE_USER` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `compte_utilisateur`
--

INSERT INTO `compte_utilisateur` (`ID_USER`, `NOM_USER`, `PRENOM_USER`, `MDP_USER`, `MAIL_USER`, `ROLE_USER`, `ARCHIVE_USER`) VALUES
(1, 'Gatti', 'Jerome', '$2y$10$BObOFl.tvchyqM/go4kRTelg8Okjfxsc/yl6o0CDNBbN92E0IZ4Qy', 'gattijerome@gmail.com', 'admin', 0),
(2, 'Robert', 'Jason', '$2y$10$IRY5U0WzQV5obs1M2/AIQ.EUSY1IVBP7lvTm5RSTN8VRmPrR5Cm1K', 'jasonrob@gmail.com', 'admin', 0),
(3, 'Bin', 'Damien', '$2y$10$xz6owQwMmsmKji0QBA4PM.iNBgz7P5SnSA5NhHJVrq0TzklomV0qS', 'bindamien@gmail.com', 'admin', 0),
(4, 'Blanchedent', 'Mickaël', '$2y$10$nsP4EKXVvhsFXmhugu8zg.69aD7xBt7IXvVpploLF.SJQw5YhdEPO', 'blandedentmickael@gmail.com', 'user', 0),
(5, 'Denysov', 'Ivan', '$2y$10$qqGda3HeV4XfxZmIuUDbeexicDpChjCC736uXI0s8z6MiQsU7gQCi', 'denysovivan@gmail.com', 'user', 0),
(6, 'Gassies', 'Jean-Marie', '$2y$10$72zc40fUtzJ3WUVp0xlyZe8qtg1yP14yvCvSOMcMEeN1OLltDeTzG', 'gassiesjm@gmail.com', 'user', 0),
(7, 'Mbock', 'Martine', '$2y$10$ZDO8hmGPaP5gNig/IM1GFeoR8qYvNd.FQ6OTd1XmH7lNlioLRuKZK', 'mbockmartine@gmail.com', 'user', 0),
(8, 'Naciri-Farid', 'Inene', '$2y$10$f0OKMZ.Mh2Z2nzupmB7J8.KrbBkPP6FxLWVlwtKufKT6yOGwl9BMC', 'naciriinene@gmail.com', 'user', 0),
(9, 'Niakate', 'Makan', '$2y$10$HhZ9L.gVx5gt3rkL5vQEQOGd6OZry6E6YU/0I2qTEFMXc78VDz8aG', 'niakatemakan@gmail.com', 'user', 0),
(10, 'Vaugirard', 'Jean-Baptiste', '$2y$10$6WMKRPPynqmn0jYeoDl73ue7VErpWuf1tZQejywMeGgslWj8DKpN.', 'vaugirardjb@gmail.com', 'user', 0),
(11, 'Desevaux', 'Corentin', '$2y$10$XOB9PnQwzLZJ98DRvxrTJ.uPNVu2dEeX1pTbXoj2lyzGkdz1UlQce', 'desevauxcorentin@gmail.com', 'user', 0);

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
-- Dumping data for table `image`
--

INSERT INTO `image` (`ID_IMAGE`, `ID_ANNONCE`, `chemin_image`, `ordre`) VALUES
(1, 1, '6963fc9506d7e_velo1.jpg', 1),
(2, 1, '6963fc950a5fc_velo2.jpg', 2),
(3, 1, '6963fc950e074_velo3.jpg', 3),
(4, 2, '6963fdebc17bb_pc1.jpg', 1),
(5, 2, '6963fdebc5314_pc2.jpg', 2),
(6, 2, '6963fdebc5c6e_pc3.jpg', 3),
(7, 3, '6963ffe730f14_panier1.jpg', 1),
(8, 3, '6963ffe7319c4_panier2.jpg', 2),
(9, 3, '6963ffe735b44_panier3.jpg', 3),
(10, 3, '6963ffe7396ce_panier4.jpg', 4),
(11, 4, '6964007d18112_trot1.jpg', 1),
(12, 4, '6964007d1b9ec_trot2.jpg', 2),
(13, 4, '6964007d1c229_trot3.jpg', 3),
(14, 5, '696401272fc53_iphone1.jpg', 1),
(15, 5, '6964012733721_iphone2.jpg', 2),
(16, 6, '696401c30c9bb_xbox1.jpg', 1),
(17, 6, '696401c31037a_xbox2.jpg', 2),
(18, 6, '696401c313f5a_xbox3.jpg', 3),
(19, 8, '69640280e939e_jo1.jpg', 1),
(20, 8, '69640280ecdaf_jo2.jpg', 2),
(21, 9, '6964031038714_wednesday1.jpg', 1),
(22, 9, '696403103bf1f_wednesday2.jpg', 2),
(23, 9, '696403103fdd4_wednesday3.jpg', 3),
(24, 9, '6964031043939_wednesday4.jpg', 4),
(25, 10, '6964038b377c8_encre1.jpg', 1),
(26, 10, '6964038b3b448_encre2.jpg', 2),
(27, 11, '696404005241e_norev1.jpg', 1),
(28, 11, '6964040052cd7_norev2.jpg', 2),
(29, 11, '6964040053505_norev3.jpg', 3),
(30, 12, '69640454968a7_scania1.jpg', 1),
(31, 13, '696404d3df264_ski1.jpg', 1),
(32, 13, '696404d3e2e6b_ski2.jpg', 2),
(33, 14, '69640533376ff_eagles1.jpg', 1),
(34, 14, '696405333b161_eagles2.jpg', 2),
(35, 14, '696405333b949_eagles3.jpg', 3),
(36, 15, '696405e98ce45_bruleur1.jpg', 1),
(37, 15, '696405e98d6bd_bruleur2.jpg', 2),
(38, 15, '696405e98dfca_bruleur3.jpg', 3),
(39, 15, '696405e994b8d_bruleur4.jpg', 4),
(40, 16, '69640684bc8c9_switch1.jpg', 1),
(41, 16, '69640684c020b_switch2.jpg', 2),
(42, 16, '69640684c40f9_switch3.jpg', 3),
(43, 17, '6964071ea2799_veloenfant1.jpg', 1),
(44, 17, '6964071ea61b9_veloenfant2.jpg', 2),
(45, 17, '6964071ea69f9_veloenfant3.jpg', 3),
(46, 18, '6964076b45259_blouse1.jpg', 1),
(47, 18, '6964076b48e8f_blouse2.jpg', 2),
(48, 19, '6964081320dd2_pokemon.jpg', 1),
(49, 19, '69640813246c5_pokemon2.jpg', 2),
(50, 19, '6964081328662_pokemon3.jpg', 3),
(51, 20, '696408811f7ea_dbz1.jpg', 1),
(52, 20, '6964088122f57_dbz2.jpg', 2),
(53, 21, '696409286483f_voiture1.jpg', 1),
(54, 21, '696409286b133_voiture2.jpg', 2),
(55, 21, '696409286b7fc_voiture3.jpg', 3);

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
  MODIFY `ID_ANNONCE` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `compte_utilisateur`
--
ALTER TABLE `compte_utilisateur`
  MODIFY `ID_USER` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `ID_IMAGE` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

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
