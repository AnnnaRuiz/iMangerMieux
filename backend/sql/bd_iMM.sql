-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 27 oct. 2023 à 08:02
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bd_iMM`
--

-- --------------------------------------------------------

--
-- Structure de la table `REPASALIMENT`
--

DROP TABLE IF EXISTS `REPASALIMENT`;
CREATE TABLE IF NOT EXISTS `REPASALIMENT` (
  `REPAS_ID` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `QUANTITE` float NOT NULL,
  PRIMARY KEY (`REPAS_ID`,`ID`),
  KEY `FK_ESTCONSITUE2` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `REPAS`
--

DROP TABLE IF EXISTS `REPAS`;
CREATE TABLE IF NOT EXISTS `REPAS` (
  `REPAS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MAIL` varchar(100) DEFAULT NULL,
  `DATE` date NOT NULL,
  `TYPE_REPAS` varchar(50) NOT NULL,
  PRIMARY KEY (`REPAS_ID`),
  KEY `FK_MANGE` (`MAIL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
--
-- Structure de la table `ALIMENTS`
--

DROP TABLE IF EXISTS `ALIMENTS`;
CREATE TABLE IF NOT EXISTS `ALIMENTS` (
  `ALIMENT` varchar(100) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `LIPIDES` float NOT NULL,
  `GLUCIDES` float NOT NULL,
  `PROTEINES` float NOT NULL,
  `CALORIES` float NOT NULL,
  `CATEGORIE` varchar(100) NOT NULL,
  `SUCRE` double NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ALIMENTS`
--

INSERT INTO `ALIMENTS` (`ALIMENT`, `ID`, `LIPIDES`, `GLUCIDES`, `PROTEINES`, `CALORIES`, `CATEGORIE`, `SUCRE`) VALUES
('Pomme de terre', 1, 0.03, 16, 1.5, 80.5, 'Fruits et légumes', 0.86),
('Tomate', 2, 0.26, 2.49, 0.86, 19.3, 'Fruits et légumes', 2.6);


-- --------------------------------------------------------

--
-- Structure de la table `USERS`
--

DROP TABLE IF EXISTS `USERS`;
CREATE TABLE IF NOT EXISTS `USERS` (
  `NOM` varchar(100) NOT NULL,
  `MAIL` varchar(100) NOT NULL,
  `MDP` varchar(100) NOT NULL,
  `SEXE` varchar(30) NOT NULL,
  `AGE` int(11) NOT NULL,
  `POIDS` float NOT NULL,
  `TAILLE` int(11) NOT NULL,
  `ACTIVITE` varchar(50) NOT NULL,
  PRIMARY KEY (`MAIL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `REPAS`
--
ALTER TABLE `REPAS`
  ADD CONSTRAINT `FK_MANGE` FOREIGN KEY (`MAIL`) REFERENCES `USERS` (`MAIL`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Contraintes pour la table `REPASALIMENT`
--
ALTER TABLE `REPASALIMENT`
  ADD CONSTRAINT `FK_ESTCONSITUE` FOREIGN KEY (`REPAS_ID`) REFERENCES `REPAS` (`REPAS_ID`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ESTCONSITUE2` FOREIGN KEY (`ID`) REFERENCES `ALIMENTS` (`ID`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
