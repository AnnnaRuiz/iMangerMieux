-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 25 oct. 2023 à 11:11
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
-- Base de données : `dbpoweramc`
--

-- --------------------------------------------------------

--
-- Structure de la table `ALIMENTS`
--

DROP TABLE IF EXISTS `ALIMENTS`;
CREATE TABLE IF NOT EXISTS `ALIMENTS` (
  `ALIMENT` varchar(100) NOT NULL,
  `ID` int(11) NOT NULL,
  `LIPIDES` float NOT NULL,
  `GLUCIDES` float NOT NULL,
  `PROTEINES` float NOT NULL,
  `CALORIES` float NOT NULL,
  `CATEGORIE` varchar(100) NOT NULL,
  `SUCRE` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ALIMENTS`
--

INSERT INTO `ALIMENTS` (`ALIMENT`, `ID`, `LIPIDES`, `GLUCIDES`, `PROTEINES`, `CALORIES`, `CATEGORIE`, `SUCRE`) VALUES
('Tomate', 1, 0.26, 2.49, 0.86, 19.3, 'Fruits et légumes', 2.6),
('Pomme de terre', 2, 0.03, 16, 1.5, 80.5, 'Fruits et Légumes', 0.86);

-- --------------------------------------------------------

--
-- Structure de la table `MANGE`
--

DROP TABLE IF EXISTS `MANGE`;
CREATE TABLE IF NOT EXISTS `MANGE` (
  `ID` int(11) NOT NULL,
  `MAIL` varchar(100) NOT NULL,
  `QUANTITE` float NOT NULL,
  `DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `ACTIVITE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ALIMENTS`
--
ALTER TABLE `ALIMENTS`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `MANGE`
--
ALTER TABLE `MANGE`
  ADD PRIMARY KEY (`ID`,`MAIL`),
  ADD KEY `MANGE2` (`MAIL`);

--
-- Index pour la table `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`MAIL`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ALIMENTS`
--
ALTER TABLE `ALIMENTS`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `MANGE`
--
ALTER TABLE `MANGE`
  ADD CONSTRAINT `MANGE` FOREIGN KEY (`ID`) REFERENCES `ALIMENTS` (`ID`),
  ADD CONSTRAINT `MANGE2` FOREIGN KEY (`MAIL`) REFERENCES `USERS` (`MAIL`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
