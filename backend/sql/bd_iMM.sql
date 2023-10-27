-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 27 oct. 2023 à 13:13
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
CREATE TABLE `REPASALIMENT` (
  `REPAS_ID` int(11) NOT NULL,
  `ALIMENT` varchar(100) NOT NULL,
  `QUANTITE` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ALIMENTS`
--

DROP TABLE IF EXISTS `ALIMENTS`;
CREATE TABLE `ALIMENTS` (
  `ALIMENT` varchar(100) NOT NULL,
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

INSERT INTO `ALIMENTS` (`ALIMENT`, `LIPIDES`, `GLUCIDES`, `PROTEINES`, `CALORIES`, `CATEGORIE`, `SUCRE`) VALUES
('Poire', 0.2, 15, 0.4, 50, 'Fruits et légumes', 10),
('Pomme', 0.1, 14, 0.3, 52, 'Fruits et légumes', 10),
('Pomme de terre', 0.03, 16, 1.5, 80.5, 'Fruit et légumes', 0.86);

-- --------------------------------------------------------

--
-- Structure de la table `REPAS`
--

DROP TABLE IF EXISTS `REPAS`;
CREATE TABLE `REPAS` (
  `REPAS_ID` int(11) NOT NULL,
  `MAIL` varchar(100) DEFAULT NULL,
  `DATE` date NOT NULL,
  `TYPE_REPAS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `USERS`
--

DROP TABLE IF EXISTS `USERS`;
CREATE TABLE `USERS` (
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
  ADD PRIMARY KEY (`ALIMENT`);

--
-- Index pour la table `REPAS`
--
ALTER TABLE `REPAS`
  ADD PRIMARY KEY (`REPAS_ID`),
  ADD KEY `FK_MANGE` (`MAIL`);

--
-- Index pour la table `REPASALIMENT`
--
ALTER TABLE `REPASALIMENT`
  ADD PRIMARY KEY (`REPAS_ID`,`ALIMENT`),
  ADD KEY `FK_ESTCONSITUE2` (`ALIMENT`);

--
-- Index pour la table `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`MAIL`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `REPAS`
--
ALTER TABLE `REPAS`
  MODIFY `REPAS_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `REPAS`
--
ALTER TABLE `REPAS`
  ADD CONSTRAINT `FK_MANGE` FOREIGN KEY (`MAIL`) REFERENCES `USERS` (`MAIL`);

--
-- Contraintes pour la table `REPASALIMENT`
--
ALTER TABLE `REPASALIMENT`
  ADD CONSTRAINT `FK_ESTCONSITUE` FOREIGN KEY (`REPAS_ID`) REFERENCES `REPAS` (`REPAS_ID`),
  ADD CONSTRAINT `FK_ESTCONSITUE2` FOREIGN KEY (`ALIMENT`) REFERENCES `ALIMENTS` (`ALIMENT`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
