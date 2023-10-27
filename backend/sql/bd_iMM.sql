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

INSERT INTO `aliments` (`ALIMENT`, `ID`, `LIPIDES`, `GLUCIDES`, `PROTEINES`, `CALORIES`, `CATEGORIE`, `SUCRE`) VALUES
('Pomme de terre', 1, 0.03, 16, 1.5, 80.5, 'Fruits et légumes', 0.86),
('Tomate', 2, 0.26, 2.49, 0.86, 19.3, 'Fruits et légumes', 2.6),
(' 	After Eight	AFTER EIGHT		AFTER EIGHT Edition Limitée Noël 400g				AFTER EIGHT	', 3, 12, 73, 2, 426, '	Snacks	', 67),
(' 		Suzy - Gaufres de Liège au chocolat belge		Suzy - Gaufres de Liège au chocolat belge			Suzy - Gau', 4, 23, 54, 5, 455, '	Snacks	', 30),
(' 				Special K Chocolat noir					', 5, 6, 81, 8, 424, '	Snacks	', 17),
(' 				Chocolá					', 6, 0, 0, 0, 0, '	Snacks	', 0),
(' 	Jumbo Schoko Keks								', 7, 34, 54, 6, 551, '	Snacks	', 48),
(' 				Hamlet Chocola\'s Crispy Caramel 12X125G					', 8, 31, 55, 6, 532, '	Snacks	', 45),
(' 				Oeuf Flamme Rose Jacquot, Chocola Au Lait 150g					', 9, 25, 64, 5, 505, '	Snacks	', 63),
(' 				Choco monnaie euro					', 10, 26, 61, 6, 504, '	Snacks	', 59),
(' 				Chocolat Lait Noisettes					', 11, 41, 42, 8, 588, '	Snacks	', 36),
(' 			Barquillos bañados de chocolate	Gaufrettes enrobées de chocolat		Wafer ricoperti di cioccolato	W', 12, 31, 54, 7, 533, '	Snacks	', 37),
(' 				Sucette chocola					', 13, 32, 57, 6, 542, '	Snacks	', 56),
(' 			Flor de sal negro	Fleur de sel noir		Fior di sale fondente	Fleur de sel puur		', 14, 41, 40, 7, 577, '	Snacks	', 36),
(' 		pan au chocola							', 15, 0, 0, 0, 0, '	Snacks	', 0),
(' 				Gauffrettes fourres chocolat					', 16, 28, 57, 5, 506, '	Snacks	', 37),
(' 				Chocolas					', 17, 6, 4, 0, 123, '	Snacks	', 3),
(' 				Chocola\'s					', 18, 31, 52, 7, 532, '	Snacks	', 43),
(' 				Elle kirsche					', 19, 19, 53, 2, 438, '	Snacks	', 45),
(' 				Crunchy Waffle					', 20, 33, 52, 7, 548, '	Snacks	', 33),
(' 				Cranberries chocola noir					', 21, 0, 0, 0, 0, '	Snacks	', 0),
(' 				Chocola\'s					', 22, 31, 52, 7, 532, '	Snacks	', 43),
(' 				Almond speculoos					', 23, 23, 64, 6, 502, '	Snacks	', 26),
(' 				Choco choco\'s			Choco choco\'s		', 24, 3, 82, 7, 392, '	Snacks	', 23),
(' 				Chocola\'s Lait/Milk					', 25, 30, 58, 6, 534, '	Snacks	', 49),
(' 				Slime chocola					', 26, 4, 89, 0, 397, '	Snacks	', 73),
(' 		Chocola\'s crispy Choc		Chocola\'s Crispy Choc					', 27, 31, 55, 6, 533, '	Snacks	', 45),
(' 				Sarments chocolas noir saveur menthe					', 28, 32, 46, 8, 526, '	Snacks	', 43),
(' 				Chocola en poudre					', 29, 18, 60, 11, 425, '	Snacks	', 60),
(' 				Bioglan Biotic Balance Chocballs Chocola					', 30, 33, 49, 5, 498, '	Snacks	', 42),
(' 				BN au chocola					', 31, 0, 0, 0, 0, '	Snacks	', 0),
(' 				Lapin chocola blanc					', 32, 32, 58, 6, 544, '	Snacks	', 58),
(' 		Muesli arôme chocola caramel							', 33, 8, 38, 39, 397, '	Snacks	', 18),
(' 				Chocolat noir extra-supérieur aux amandes entières					', 34, 37, 41, 9, 555, '	Snacks	', 38),
(' 				Chocola\'s					', 35, 31, 55, 6, 533, '	Snacks	', 45),
(' 				Chocola					', 36, 34, 49, 4, 545, '	Snacks	', 34),
(' 				Tuber Chocola Caramel Cream					', 37, 29, 64, 2, 533, '	Snacks	', 60),
(' 				Crispy caramel					', 38, 30, 58, 6, 534, '	Snacks	', 49),
(' 				Chocola\'s Crispy Cacao 125G					', 39, 31, 52, 7, 532, '	Snacks	', 43),
(' 							Puur 51% amandel zeezout		', 40, 35, 44, 7, 539, '	Snacks	', 41),
(' 				Granola chocola					', 41, 13, 62, 10, 420, '	Snacks	', 12),
(' 				Hamlet Chocola\'s Crispy Nut 12X125G					', 42, 32, 54, 7, 536, '	Snacks	', 46),
(' 				Oeuf en chocola au lait (majotette )					', 43, 0, 0, 0, 0, '	Snacks	', 0),
(' 				Cookies					', 44, 23, 65, 5, 488, '	Snacks	', 43),
(' 				Chocola les inoubliables					', 45, 36, 45, 5, 477, '	Snacks	', 0),
(' 				Chocola’s					', 46, 13, 21, 3, 220, '	Snacks	', 18),
(' 				Pain au chocola surgele					', 47, 21, 36, 7, 367, '	Snacks	', 10),
(' 				Chocola\'s Crispy Orange 125G					', 48, 31, 55, 6, 533, '	Snacks	', 45),
(' 				Gallette chocola					', 49, 23, 61, 6, 501, '	Snacks	', 35),
(' 		Bakers Good Morning Chocola Biscuit							', 50, 17, 67, 7, 459, '	Snacks	', 20),
(' 				Melvita Moelleux Petit déjeuner Chocola					', 51, 14, 60, 5, 400, '	Snacks	', 20),
(' 				Chocola ´s					', 52, 31, 55, 6, 533, '	Snacks	', 45),
(' 				Lulu l\'ourson					', 53, 16, 58, 6, 396, '	Snacks	', 31),
(' 									', 54, 0, 0, 0, 0, '	Snacks	', 0),
(' 				HELADO MINI MAXIBON CHOCOLA NESTLE PACK					', 55, 13, 39, 4, 306, '	Snacks	', 22),
(' 				Pain chocola					', 56, 24, 43, 7, 419, '	Snacks	', 11),
(' 				Chocola. Menthe Sticks					', 57, 28, 52, 6, 502, '	Snacks	', 43),
(' 				24 Chocola\'s					', 58, 30, 58, 6, 534, '	Snacks	', 49),
(' 				Lotx2 Delacre Croustifondan Chocola					', 59, 37, 53, 5, 0, '	Snacks	', 28),
(' 				Lirgeois chocolas					', 60, 3, 15, 3, 103, '	Snacks	', 12),
(' 				Modifast Control Reep Chocola / Sinas					', 61, 14, 50, 22, 415, '	Snacks	', 39),
(' 				Chocola au lait					', 62, 31, 55, 7, 543, '	Snacks	', 54),
(' 				Palet chocola decor					', 63, 14, 75, 4, 454, '	Snacks	', 65),
(' 				Les petits sablés, Vanille, Caramel, Chocola noir					', 64, 32, 55, 6, 538, '	Snacks	', 25),
(' 				Croustillant au chocola					', 65, 27, 40, 5, 431, '	Snacks	', 31),
(' 				Donuts chocola					', 66, 21, 49, 5, 412, '	Snacks	', 21),
(' 				Pain au chocola					', 67, 0, 0, 0, 0, '	Snacks	', 0),
(' 				Chocola\'the					', 68, 0, 0, 0, 0, '	Snacks	', 0),
(' 				Hamlet Chocola\'s Crispy Almond 12X125G					', 69, 31, 55, 7, 532, '	Snacks	', 46);


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
  ADD CONSTRAINT `FK_MANGE` FOREIGN KEY (`MAIL`) REFERENCES `USERS` (`MAIL`);

--
-- Contraintes pour la table `REPASALIMENT`
--
ALTER TABLE `REPASALIMENT`
  ADD CONSTRAINT `FK_ESTCONSITUE` FOREIGN KEY (`REPAS_ID`) REFERENCES `REPAS` (`REPAS_ID`),
  ADD CONSTRAINT `FK_ESTCONSITUE2` FOREIGN KEY (`ID`) REFERENCES `ALIMENTS` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
