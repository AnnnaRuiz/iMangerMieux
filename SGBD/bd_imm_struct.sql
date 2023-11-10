-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 10 nov. 2023 à 10:25
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bd_imm`
--

-- --------------------------------------------------------

--
-- Structure de la table `aliments`
--

DROP TABLE IF EXISTS `aliments`;
CREATE TABLE IF NOT EXISTS `aliments` (
  `ALIMENT` varchar(100) NOT NULL,
  `LIPIDES` float NOT NULL,
  `GLUCIDES` float NOT NULL,
  `PROTEINES` float NOT NULL,
  `CALORIES` float NOT NULL,
  `CATEGORIE` varchar(100) NOT NULL,
  `SUCRE` float NOT NULL,
  PRIMARY KEY (`ALIMENT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `repas`
--

DROP TABLE IF EXISTS `repas`;
CREATE TABLE IF NOT EXISTS `repas` (
  `REPAS_ID` int NOT NULL AUTO_INCREMENT,
  `MAIL` varchar(100) DEFAULT NULL,
  `DATE` date NOT NULL,
  `TYPE_REPAS` varchar(50) NOT NULL,
  PRIMARY KEY (`REPAS_ID`),
  KEY `FK_MANGE` (`MAIL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `repasaliment`
--

DROP TABLE IF EXISTS `repasaliment`;
CREATE TABLE IF NOT EXISTS `repasaliment` (
  `REPAS_ID` int NOT NULL,
  `ALIMENT` varchar(100) NOT NULL,
  `QUANTITE` float NOT NULL,
  PRIMARY KEY (`REPAS_ID`,`ALIMENT`),
  KEY `FK_ESTCONSITUE2` (`ALIMENT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `NOM` varchar(100) NOT NULL,
  `MAIL` varchar(100) NOT NULL,
  `MDP` varchar(100) NOT NULL,
  `SEXE` varchar(30) NOT NULL,
  `AGE` int NOT NULL,
  `POIDS` float NOT NULL,
  `TAILLE` int NOT NULL,
  `ACTIVITE` varchar(50) NOT NULL,
  PRIMARY KEY (`MAIL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `repas`
--
ALTER TABLE `repas`
  ADD CONSTRAINT `FK_MANGE` FOREIGN KEY (`MAIL`) REFERENCES `users` (`MAIL`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Contraintes pour la table `repasaliment`
--
ALTER TABLE `repasaliment`
  ADD CONSTRAINT `FK_ESTCONSITUE` FOREIGN KEY (`REPAS_ID`) REFERENCES `repas` (`REPAS_ID`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ESTCONSITUE2` FOREIGN KEY (`ALIMENT`) REFERENCES `aliments` (`ALIMENT`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
