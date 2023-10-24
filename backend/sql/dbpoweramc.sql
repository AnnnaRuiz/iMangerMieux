-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 24 oct. 2023 à 15:27
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
-- Base de données : `dbpoweramc`
--

-- --------------------------------------------------------

--
-- Structure de la table `aliments`
--

DROP TABLE IF EXISTS `aliments`;
CREATE TABLE IF NOT EXISTS `aliments` (
  `ALIMENT` varchar(100) NOT NULL,
  `ID` int NOT NULL,
  `LIPIDES` float NOT NULL,
  `GLUCIDES` float NOT NULL,
  `PROTEINES` float NOT NULL,
  `CALORIES` float NOT NULL,
  `CATEGORIE` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mange`
--

DROP TABLE IF EXISTS `mange`;
CREATE TABLE IF NOT EXISTS `mange` (
  `ID` int NOT NULL,
  `MAIL` varchar(100) NOT NULL,
  `QUANTITE` float NOT NULL,
  `DATE` date NOT NULL,
  PRIMARY KEY (`ID`,`MAIL`),
  KEY `FK_MANGE2` (`MAIL`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
