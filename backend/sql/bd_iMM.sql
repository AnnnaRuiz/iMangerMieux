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
('Pomme', 0.5, 14, 0.3, 52, 'Fruits et légumes', 9),
('Banane', 0.3, 23, 1.1, 89, 'Fruits et légumes', 12),
('Carotte', 0.2, 9, 0.9, 41, 'Fruits et légumes', 4),
('Brocoli', 0.6, 6, 2.8, 55, 'Fruits et légumes', 1),
('Fraise', 0.5, 7, 0.8, 32, 'Fruits et légumes', 4),
('Orange', 0.2, 8, 1, 43, 'Fruits et légumes', 8),
('Kiwi', 0.5, 14, 1.1, 61, 'Fruits et légumes', 9),
('Pamplemousse', 0.2, 9, 0.6, 32, 'Fruits et légumes', 5),
('Aubergine', 0.2, 6, 1, 25, 'Fruits et légumes', 3),
('Tomate', 0.2, 5, 1, 18, 'Fruits et légumes', 3),
('Chou-fleur', 0.3, 5, 2, 25, 'Fruits et légumes', 2),
('Raisin', 0.2, 18, 0.7, 69, 'Fruits et légumes', 16),
('Pêche', 0.2, 9, 0.9, 39, 'Fruits et légumes', 8),
('Cerise', 0.2, 9, 1, 50, 'Fruits et légumes', 8),
('Courgette', 0.2, 3, 1, 16, 'Fruits et légumes', 2),
('Poivron', 0.2, 6, 0.9, 31, 'Fruits et légumes', 4),
('Patate douce', 0.2, 20, 1.6, 86, 'Fruits et légumes', 4),
('Ananas', 0.2, 13, 0.5, 50, 'Fruits et légumes', 9),
('Melon', 0.3, 8, 0.6, 34, 'Fruits et légumes', 8),
('Mangue', 0.6, 14, 0.8, 60, 'Fruits et légumes', 14),
('Raisin sec', 0.6, 79, 3.4, 299, 'Fruits et légumes', 59),
('Cerise griotte', 0.3, 9, 1, 50, 'Fruits et légumes', 8),
('Oignon', 0.1, 9, 1.2, 40, 'Fruits et légumes', 4),
('Pamplemousse rose', 0.2, 8, 1, 42, 'Fruits et légumes', 8),
('Avocat', 14.7, 8.5, 2, 160, 'Fruits et légumes', 0.2),
('Framboise', 0.7, 5, 1.5, 32, 'Fruits et légumes', 4),
('Kiwi gold', 0.6, 14, 1.3, 61, 'Fruits et légumes', 9),
('Poire Williams', 0.1, 9, 0.4, 42, 'Fruits et légumes', 7),
('Agrume', 0.2, 8, 1, 43, 'Fruits et légumes', 8),
('Piment', 0.2, 9, 1, 40, 'Fruits et légumes', 2),
('Pastèque', 0.2, 9, 0.6, 30, 'Fruits et légumes', 8),
('Champignon', 0.3, 3, 2, 22, 'Fruits et légumes', 2),
('Pomelo', 0.2, 9, 0.6, 32, 'Fruits et légumes', 5),
('Courge', 0.1, 7, 0.8, 33, 'Fruits et légumes', 1),
('Artichaut', 0.2, 7, 2, 47, 'Fruits et légumes', 1),
('Radis', 0.1, 3, 0.7, 16, 'Fruits et légumes', 2),
('Prune', 0.3, 12, 0.6, 51, 'Fruits et légumes', 9),
('Cassis', 0.4, 9, 1, 43, 'Fruits et légumes', 5),
('Clémentine', 0.2, 8, 0.9, 43, 'Fruits et légumes', 8),
('Kaki', 0.4, 14, 0.8, 81, 'Fruits et légumes', 9),
('Myrtille', 0.4, 14, 0.7, 39, 'Fruits et légumes', 9),
('Riz complet', 2.2, 44, 6.6, 365, 'Féculents', 0.1),
('Pâtes', 1.5, 75, 12, 358, 'Féculents', 1.4),
('Pain complet', 2.3, 45, 8.5, 250, 'Féculents', 3.5),
('Quinoa', 6.1, 64, 14.1, 368, 'Féculents', 2.8),
('Pomme de terre', 0.1, 17, 2, 77, 'Féculents', 1),
('Blé entier', 2.2, 42, 14, 336, 'Féculents', 0.9),
('Orge', 2.3, 73, 9.9, 354, 'Féculents', 0.8),
('Avoine', 7, 56, 17, 389, 'Féculents', 0.99),
('Maïs', 4.7, 74, 9.4, 365, 'Féculents', 1.5),
('Haricots rouges', 0.4, 22, 7.5, 112, 'Féculents', 0),
('Lentilles', 0.4, 20, 9, 116, 'Féculents', 1.8),
('Couscous', 0.2, 77, 3.4, 376, 'Féculents', 0.2),
('Boulgour', 0.4, 76, 3.7, 342, 'Féculents', 0.4),
('Pain de seigle', 1, 39, 6.5, 235, 'Féculents', 1.4),
('Farine de blé', 1.3, 76, 10, 359, 'Féculents', 1),
('Pain blanc', 1.1, 50, 8, 266, 'Féculents', 3.6),
('Semoule de blé', 0.3, 73, 11, 356, 'Féculents', 0.4),
('Polenta', 1.4, 76, 1.6, 358, 'Féculents', 0.2),
('Pain aux céréales', 2.6, 46, 8, 252, 'Féculents', 2.7),
('Pain de maïs', 4, 72, 4.6, 331, 'Féculents', 4.7),
('Pain de seigle complet', 1.2, 39, 7.6, 212, 'Féculents', 1.4),
('Riz basmati', 0.8, 45, 7.3, 205, 'Féculents', 0.2),
('Pain aux noix', 4.1, 41, 10, 262, 'Féculents', 2.4),
('Pain aux raisins', 3.8, 47, 6.7, 266, 'Féculents', 12.2),
('Épeautre', 2.2, 69, 15.5, 332, 'Féculents', 1.5),
('Céréales de petit-déjeuner', 2.4, 84, 5.7, 376, 'Féculents', 19.3),
('Pain de seigle aux noix', 4.8, 41, 9.1, 272, 'Féculents', 1.7),
('Pain à la farine d avoine', 1.5, 55, 7.5, 269, 'Féculents', 5.6),
('Biscuits salés', 21, 49, 9, 496, 'Féculents', 0.3),
('Craquelins de riz', 1.5, 84, 6, 384, 'Féculents', 0.7),
('Biscuits aux flocons d avoine', 7, 69, 8.5, 407, 'Féculents', 26.1),
('Pain de blé entier', 2.6, 49, 8.7, 245, 'Féculents', 3.1),
('Galette de riz', 1, 80, 7, 387, 'Féculents', 0.2),
('Riz sauvage', 0.6, 22, 4.2, 101, 'Féculents', 0.3),
('Pain sans gluten', 2.4, 45, 2.4, 234, 'Féculents', 2.2),
('Farine d épeautre', 2.6, 63, 15.1, 339, 'Féculents', 1.4),
('Pain aux graines de lin', 2.8, 44, 8.1, 243, 'Féculents', 1.3),
('Craquelins de maïs', 5.6, 78, 5.7, 393, 'Féculents', 0.4),
('Poulet rôti', 7.9, 0, 25.8, 165, 'Protéines animales', 0),
('Saumon cuit', 13.4, 0, 25.4, 206, 'Protéines animales', 0),
('Bœuf haché maigre', 8.7, 0, 24.7, 162, 'Protéines animales', 0),
('Thon en conserve', 0.8, 0, 26.5, 116, 'Protéines animales', 0),
('Porc cuit', 6.8, 0, 28.5, 201, 'Protéines animales', 0),
('Crevettes cuites', 0.9, 0, 24, 106, 'Protéines animales', 0),
('Œufs, durs', 5.3, 0.6, 12.6, 143, 'Protéines animales', 0.6),
('Dinde cuite', 2.4, 0, 29.6, 135, 'Protéines animales', 0),
('Jambon cuit', 3.4, 0, 16.9, 113, 'Protéines animales', 2.3),
('Bacon cuit', 42.4, 1, 3.3, 417, 'Protéines animales', 0.3),
('Boeuf séché (Biltong)', 3.4, 0, 41.4, 193, 'Protéines animales', 0),
('Agneau cuit', 9.3, 0, 25.6, 187, 'Protéines animales', 0),
('Morue cuite', 0.7, 0, 25.2, 105, 'Protéines animales', 0),
('Canard rôti', 9.2, 0, 22.6, 194, 'Protéines animales', 0),
('Foie de poulet cuit', 6.2, 1.3, 27.3, 184, 'Protéines animales', 1.2),
('Araignée de mer cuite', 0.9, 0, 21.4, 100, 'Protéines animales', 0),
('Langouste cuite', 0.5, 1.5, 20.2, 89, 'Protéines animales', 0),
('Escargots cuits', 0.8, 2.1, 16.1, 90, 'Protéines animales', 0),
('Boeuf en gelée', 7.1, 0.4, 24.8, 166, 'Protéines animales', 0),
('Magret de canard rôti', 11.2, 0, 20.4, 195, 'Protéines animales', 0),
('Steak de kangourou', 1.3, 0, 24.2, 113, 'Protéines animales', 0),
('Anchois en conserve', 5.7, 0.5, 20.3, 144, 'Protéines animales', 0),
('Escalope de veau', 5.9, 0, 30.4, 192, 'Protéines animales', 0),
('Boudin noir cuit', 16.4, 3, 18.7, 252, 'Protéines animales', 1.3),
('Filet de perche cuite', 2.2, 0.5, 18.2, 98, 'Protéines animales', 0),
('Lapin rôti', 6.3, 0, 26.3, 183, 'Protéines animales', 0),
('Steak de cerf', 2.5, 0, 22.8, 117, 'Protéines animales', 0),
('Foie de veau cuit', 4.6, 1.4, 27.2, 157, 'Protéines animales', 0),
('Filet de sole cuite', 1.1, 0, 22.9, 105, 'Protéines animales', 0),
('Steak de cheval', 2.1, 0, 24.7, 123, 'Protéines animales', 0),
('Foie de canard cuit', 45.2, 3.5, 6.3, 444, 'Protéines animales', 0.6),
('Merlan cuit', 0.6, 0, 19.9, 87, 'Protéines animales', 0),
('Côtelette de porc', 9, 0, 25.4, 193, 'Protéines animales', 0),
('Sardines en conserve', 11.5, 0, 25, 208, 'Protéines animales', 0),
('Queue de lotte cuite', 0.6, 0, 16.8, 73, 'Protéines animales', 0),
('Tofu', 6.2, 2, 8.2, 76, 'Protéines animales', 0),
('Filet de sandre cuit', 0.7, 0, 19.6, 86, 'Protéines animales', 0),
('Poulet frit', 17.7, 7.2, 16.3, 235, 'Protéines animales', 0.4),
('Brochette de porc', 10.9, 1, 27.3, 217, 'Protéines animales', 1.4),
('Filet de plie cuit', 1.4, 0, 22, 101, 'Protéines animales', 0),
('Crabe en conserve', 0.9, 2, 15.8, 84, 'Protéines animales', 0.5),
('Steak de veau', 5.7, 0, 29.5, 192, 'Protéines animales', 0),
('Côtelette d agneau', 9.9, 0, 22.4, 187, 'Protéines animales', 0),
('Hareng fumé', 10.7, 0, 18.2, 158, 'Protéines animales', 0),
('Saumon fumé', 12.2, 0.6, 24.9, 206, 'Protéines animales', 0.6),
('Boudin blanc cuit', 8.1, 3.6, 13.5, 176, 'Protéines animales', 3.5),
('Boulettes de viande', 15, 6.5, 17.5, 238, 'Protéines animales', 1.5),
('Filet de carpe cuit', 1.4, 0, 22.2, 99, 'Protéines animales', 0),
('Faisan rôti', 2.2, 0, 29.3, 140, 'Protéines animales', 0),
('Églefin cuit', 0.5, 0, 19.2, 83, 'Protéines animales', 0),
('Saucisse de Francfort', 19, 0, 12, 222, 'Protéines animales', 1),
('Filet de colin cuit', 0.6, 0, 17.8, 77, 'Protéines animales', 0),
('Côtelette de veau', 5.5, 0, 25.2, 176, 'Protéines animales', 0),
('Lieu noir cuit', 0.9, 0, 20.9, 92, 'Protéines animales', 0),
('Saucisse de Toulouse', 20.4, 0.5, 13.5, 249, 'Protéines animales', 0.5),
('Foie de mouton cuit', 5.7, 4, 19.8, 155, 'Protéines animales', 3.7),
('Bœuf séché (Jerky)', 4.6, 2.5, 34.9, 194, 'Protéines animales', 2.1),
('Steak d autruche', 1.4, 0, 22.7, 107, 'Protéines animales', 0),
('Andouillette', 21, 0, 17.3, 254, 'Protéines animales', 0),
('Filet de sardine cuit', 6.3, 0, 26.4, 188, 'Protéines animales', 0),
('Canard en conserve', 15.9, 0, 25.3, 226, 'Protéines animales', 0),
('Foie de veau cru', 4.4, 2.4, 20.2, 142, 'Protéines animales', 1.7),
('Côtelette de mouton', 10.1, 0, 21.3, 187, 'Protéines animales', 0),
('Oie rôtie', 6.6, 0, 29.7, 198, 'Protéines animales', 0),
('Boudin aux oignons cuit', 8.4, 8.6, 12.7, 196, 'Protéines animales', 4.1),
('Tête pressée', 8.6, 0.4, 10.2, 116, 'Protéines animales', 0.2),
('Cervelle de mouton cuite', 9.6, 0.2, 12.3, 133, 'Protéines animales', 0.1),
('Quenelles de brochet', 9.3, 6.7, 16.1, 184, 'Protéines animales', 1),
('Hareng saur', 12.5, 0, 18.7, 194, 'Protéines animales', 0),
('Moules cuites', 2.3, 4, 12, 82, 'Protéines animales', 0),
('Dindonneau rôti', 6.7, 0, 25.9, 179, 'Protéines animales', 0),
('Tartelette de porc', 8.2, 12, 11.7, 187, 'Protéines animales', 4),
('Pintade rôtie', 2.7, 0, 27.9, 145, 'Protéines animales', 0),
('Filet de rascasse cuit', 0.8, 0, 20.4, 88, 'Protéines animales', 0),
('Boudin noir cru', 8.8, 10.8, 15.5, 198, 'Protéines animales', 5.5),
('Foie de mouton cru', 4.3, 2.1, 21.6, 141, 'Protéines animales', 1.2),
('Bifteck de bison', 2.1, 0, 23.3, 112, 'Protéines animales', 0),
('Foie d agneau cuit', 5.6, 1.1, 28.2, 168, 'Protéines animales', 0.6),
('Queue de crevette cuite', 0.9, 0.5, 20.2, 105, 'Protéines animales', 0.1),
('Saucisse de Montbéliard', 27.1, 0, 12.7, 294, 'Protéines animales', 0),
('Boulettes de poisson', 15.3, 6.2, 14.4, 233, 'Protéines animales', 1.1),
('Colin cru', 0.5, 0, 17.6, 77, 'Protéines animales', 0),
('Poulet fumé', 7.6, 0.2, 26.7, 177, 'Protéines animales', 0),
('Pavé de cabillaud cuit', 0.5, 0, 19.7, 87, 'Protéines animales', 0),
('Filet de rouget cuit', 0.7, 0, 20.8, 92, 'Protéines animales', 0),
('Foie d agneau cru', 4.9, 0.8, 19.2, 141, 'Protéines animales', 0.5),
('Bifteck de cheval cru', 1.4, 0, 24.6, 120, 'Protéines animales', 0),
('Filet de merlu cuit', 0.6, 0, 19.8, 85, 'Protéines animales', 0),
('Saucisse de foie', 19.1, 0.6, 16.3, 237, 'Protéines animales', 0.5),
('Filet de merlan cru', 0.6, 0, 17.8, 77, 'Protéines animales', 0),
('Poulet cuit à la broche', 11.2, 0, 23.5, 193, 'Protéines animales', 0),
('Gigot d agneau rôti', 11.2, 0, 26.9, 206, 'Protéines animales', 0),
('Crevettes roses cuites', 0.7, 0, 19.3, 86, 'Protéines animales', 0),
('Pavé de saumon cuit', 14.3, 0, 26.1, 212, 'Protéines animales', 0),
('Râble de lapin', 5.7, 0, 27.5, 189, 'Protéines animales', 0),
('Poulet cuit à la vapeur', 7.2, 0, 25.8, 168, 'Protéines animales', 0),
('Boudin blanc cru', 5.6, 7.1, 13.1, 156, 'Protéines animales', 6.5),
('Poule rôtie', 9.5, 0, 25.7, 186, 'Protéines animales', 0),
('Sardines à l huile', 11.4, 0, 20, 202, 'Protéines animales', 0),
('Boudin aux oignons cru', 9.7, 7.5, 14.7, 172, 'Protéines animales', 3.6),
('Langouste crue', 0.7, 1.6, 20.2, 90, 'Protéines animales', 0),
('Écrevisses cuites', 0.6, 0, 19.3, 86, 'Protéines animales', 0),
('Hareng fumé aux poires', 12.7, 2.2, 17.6, 175, 'Protéines animales', 0),
('Foie de canard cru', 50.2, 2.3, 6.4, 444, 'Protéines animales', 1.3),
('Raie cuite', 1.3, 0, 18.5, 86, 'Protéines animales', 0),
('Côtelette d agneau crue', 9.8, 0, 22.4, 187, 'Protéines animales', 0),
('Merlan cru', 0.5, 0, 17.6, 77, 'Protéines animales', 0),
('Filet de flétan cuit', 0.8, 0, 19.5, 85, 'Protéines animales', 0),
('Cuisses de grenouille', 0.3, 0, 16.9, 73, 'Protéines animales', 0),
('Pavé de truite cuite', 8.1, 0, 19.6, 134, 'Protéines animales', 0),
('Lobster Newberg', 25.9, 0, 16.3, 269, 'Protéines animales', 0),
('Queue de lotte cuite à la vapeur', 0.7, 0, 16.8, 73, 'Protéines animales', 0),
('Lait écrémé', 0.2, 4.8, 3.4, 35, 'Produits laitiers', 5.1),
('Yaourt nature', 3.4, 4.7, 4.1, 61, 'Produits laitiers', 4.2),
('Fromage blanc', 0.2, 4.9, 9.7, 72, 'Produits laitiers', 4.6),
('Beurre', 81, 0.6, 0.7, 717, 'Produits laitiers', 0.1),
('Fromage cheddar', 33, 1.3, 25, 403, 'Produits laitiers', 0.1),
('Crème fraîche', 45, 2.3, 2.2, 459, 'Produits laitiers', 1.2),
('Lait entier', 3.6, 4.7, 3.3, 61, 'Produits laitiers', 5.1),
('Fromage de chèvre', 27, 0.4, 21, 364, 'Produits laitiers', 0.4),
('Yaourt aux fruits', 2.6, 16, 3.4, 95, 'Produits laitiers', 14),
('Fromage suisse', 27, 0.4, 30, 393, 'Produits laitiers', 0.4),
('Crème glacée à la vanille', 17, 26, 2.3, 207, 'Produits laitiers', 24),
('Lait de coco', 21, 3.3, 2.2, 230, 'Produits laitiers', 2.8),
('Fromage de brebis', 32, 0.9, 22, 380, 'Produits laitiers', 0.5),
('Yaourt grec', 10, 5.5, 10, 164, 'Produits laitiers', 5.1),
('Crème légère', 15, 3, 2.6, 154, 'Produits laitiers', 2.6),
('Lait de soja', 1.8, 3.3, 3.3, 33, 'Produits laitiers', 2.3),
('Fromage de roquefort', 32, 0.5, 21, 369, 'Produits laitiers', 0.5),
('Fromage de camembert', 24, 0.5, 19, 300, 'Produits laitiers', 0.5),
('Crème fouettée', 34, 2.8, 2.1, 345, 'Produits laitiers', 2.8),
('Fromage de gruyère', 32, 0.5, 27, 413, 'Produits laitiers', 0.5),
('Yaourt à boire', 2, 17, 1.5, 88, 'Produits laitiers', 13),
('Fromage de brie', 24, 0.5, 21, 334, 'Produits laitiers', 0.5),
('Lait de chèvre', 4.1, 4.4, 3.3, 68, 'Produits laitiers', 3.4),
('Yaourt aux noix', 5.2, 20, 3.1, 128, 'Produits laitiers', 15),
('Fromage de parmesan', 28, 0.9, 38, 392, 'Produits laitiers', 0.9),
('Lait de noix de coco', 5, 1.9, 0.5, 49, 'Produits laitiers', 1.1),
('Yaourt à la vanille', 2.4, 14, 3.3, 89, 'Produits laitiers', 11),
('Fromage de mozzarella', 22, 2.2, 18, 318, 'Produits laitiers', 1.3),
('Crème pâtissière', 14, 24, 2.6, 234, 'Produits laitiers', 18),
('Lait d amande', 2.6, 1, 1, 13, 'Produits laitiers', 0),
('Fromage feta', 21, 1.2, 14, 264, 'Produits laitiers', 1.2),
('Yaourt aux noix de cajou', 4.9, 12, 4.6, 113, 'Produits laitiers', 7),
('Fromage suisse à pâte dure', 31, 1.5, 24, 396, 'Produits laitiers', 1.1),
('Crème légère épaisse', 15, 10, 2.5, 175, 'Produits laitiers', 9),
('Lait de riz', 1.3, 9.2, 0.5, 47, 'Produits laitiers', 4.2),
('Fromage de comté', 34, 1.5, 26, 416, 'Produits laitiers', 1.1),
('Yaourt aux graines de chia', 5.1, 20, 4.3, 134, 'Produits laitiers', 13),
('Fromage de raclette', 29, 0.1, 20, 371, 'Produits laitiers', 0.1),
('Crème fraîche épaisse', 30, 2.9, 2.2, 345, 'Produits laitiers', 2.2),
('Fromage bleu', 29, 0.6, 21, 353, 'Produits laitiers', 0.7),
('Fromage de chèvre frais', 29, 0.5, 4.4, 291, 'Produits laitiers', 0.4),
('Chips de pommes de terre', 34, 54, 2.1, 536, 'Snacks', 1.9),
('Biscuits au chocolat', 23, 67, 5.4, 492, 'Snacks', 39),
('Cacahuètes salées', 49, 16, 25, 615, 'Snacks', 2.6),
('Pop-corn au beurre', 28, 63, 11, 455, 'Snacks', 0.9),
('Barre de chocolat', 30, 60, 5.2, 536, 'Snacks', 51),
('Bonbons gélifiés', 0.2, 93, 2.3, 327, 'Snacks', 55),
('Noix de cajou grillées', 55, 19, 18, 574, 'Snacks', 5.9),
('Pretzels', 2.7, 86, 9.3, 382, 'Snacks', 1.9),
('Gâteau au fromage', 44, 31, 7, 491, 'Snacks', 21),
('Chocolat noir', 29, 34, 5.2, 604, 'Snacks', 24),
('Chips de maïs', 28, 63, 6.3, 520, 'Snacks', 2.8),
('Gâteau au citron', 18, 56, 4.6, 398, 'Snacks', 37),
('Croustilles de maïs', 29, 62, 8.4, 523, 'Snacks', 2.1),
('Nougat aux amandes', 15, 75, 6.4, 436, 'Snacks', 54),
('Bretzels à la cannelle', 2.6, 85, 8.4, 389, 'Snacks', 21),
('Biscuits à l avoine', 13, 68, 7.3, 471, 'Snacks', 29),
('Mélange de noix', 52, 23, 14, 607, 'Snacks', 5.1),
('Gaufres au miel', 19, 76, 4.1, 493, 'Snacks', 41),
('Chips de patates douces', 30, 58, 2.4, 518, 'Snacks', 8.6),
('Barre de céréales', 9.7, 73, 6.3, 401, 'Snacks', 24),
('Chips de patates douces au sel de mer', 29, 57, 2.5, 517, 'Snacks', 8.2),
('Barre de noix et de fruits', 11, 50, 5.7, 355, 'Snacks', 36),
('Pretzels au fromage', 10, 77, 7.8, 427, 'Snacks', 4.2),
('Chocolat au lait', 31, 59, 7.3, 535, 'Snacks', 54),
('Granola au miel et aux noix', 12, 67, 8.3, 471, 'Snacks', 29),
('Biscuits au beurre d arachide', 17, 66, 6.8, 480, 'Snacks', 36),
('Croustilles de patates douces', 29, 61, 3.7, 522, 'Snacks', 8.4),
('Chips de légumes', 26, 64, 4.7, 498, 'Snacks', 5.1),
('Barre de fruits séchés', 1.6, 69, 3.6, 310, 'Snacks', 51),
('Nougat aux noisettes', 15, 74, 5.5, 442, 'Snacks', 54),
('Biscuits au citron', 15, 74, 5.3, 436, 'Snacks', 37),
('Pretzels à l ail', 2.9, 85, 9.2, 385, 'Snacks', 2.4),
('Biscuits à la cannelle', 16, 70, 4.7, 416, 'Snacks', 34),
('Chocolat blanc', 30, 60, 5.4, 538, 'Snacks', 53),
('Pain grillé à l ail', 2.7, 70, 10, 339, 'Snacks', 2.1),
('Chips de racines de légumes', 30, 55, 4.8, 511, 'Snacks', 7.5),
('Barre de noix de coco', 11, 56, 5.3, 371, 'Snacks', 42),
('Biscuits aux pépites de chocolat', 23, 68, 4.4, 498, 'Snacks', 40),
('Croustilles de maïs épicées', 30, 63, 8.1, 524, 'Snacks', 3.5),
('Barre de céréales aux fruits', 8.5, 72, 5.6, 381, 'Snacks', 25),
('Biscuits au caramel', 14, 73, 4.1, 423, 'Snacks', 35),
('Bretzels au miel et au sésame', 4.5, 79, 8.3, 393, 'Snacks', 17),
('Croustilles de patates douces à la cannelle', 29, 56, 2.6, 517, 'Snacks', 7.8),
('Barre de noix de cajou et de céréales', 11, 64, 5.3, 398, 'Snacks', 30),
('Pretzels au chocolat', 13, 74, 4.1, 419, 'Snacks', 35),
('Chocolat au caramel salé', 28, 62, 5.7, 534, 'Snacks', 47),
('Biscuits au beurre et à la cannelle', 15, 71, 4.5, 429, 'Snacks', 34),
('Croustilles de maïs au fromage', 30, 61, 6.8, 530, 'Snacks', 3.1),
('Barre de fruits à la mangue', 2, 80, 2.4, 348, 'Snacks', 63),
('Nougat aux noix de pécan', 15, 71, 6.1, 440, 'Snacks', 43),
('Biscuits aux flocons d avoine et aux raisins', 12, 72, 5.2, 426, 'Snacks', 37),
('Chocolat au praliné', 29, 60, 6.2, 529, 'Snacks', 48),
('Pretzels au miel et à la moutarde', 2.5, 77, 9.1, 386, 'Snacks', 12),
('Biscuits aux pépites de chocolat et aux noix', 18, 67, 6.3, 466, 'Snacks', 35),
('Croustilles de légumes à la mer', 28, 59, 4.5, 505, 'Snacks', 5.8),
('Barre de noix et de baies', 12, 58, 5.8, 387, 'Snacks', 40),
('Biscuits au caramel salé', 14, 68, 5.1, 432, 'Snacks', 38),
('Pretzels à la moutarde et au miel', 3.1, 76, 9.3, 392, 'Snacks', 14),
('Chocolat au lait avec noisettes', 30, 55, 6.4, 528, 'Snacks', 45),
('Biscuits aux flocons d avoine et aux pépites de chocolat', 14, 70, 5.7, 442, 'Snacks', 31),
('Croustilles de maïs au chili', 29, 62, 7.5, 525, 'Snacks', 3.9),
('Barre de fruits à la fraise', 1.9, 81, 2.3, 349, 'Snacks', 58),
('Nougat aux amandes et aux noix', 16, 68, 6.2, 454, 'Snacks', 51),
('Biscuits au gingembre', 13, 75, 4.8, 428, 'Snacks', 40),
('Chocolat blanc aux fraises', 29, 61, 5.8, 525, 'Snacks', 47),
('Pretzels au sésame', 2.8, 78, 8.7, 395, 'Snacks', 15),
('Biscuits aux pépites de chocolat et aux noisettes', 18, 68, 6.5, 474, 'Snacks', 34),
('Croustilles de légumes épicées', 28, 58, 4.8, 503, 'Snacks', 7.2),
('Barre de noix et de noix de coco', 12, 59, 6.1, 385, 'Snacks', 38),
('Biscuits au beurre de cacahuète', 17, 70, 5.8, 468, 'Snacks', 39),
('Chocolat au caramel', 28, 63, 5.4, 534, 'Snacks', 46),
('Pretzels à la cannelle et au sucre', 3.2, 79, 9.2, 402, 'Snacks', 16),
('Biscuits au beurre et au chocolat', 15, 69, 5.7, 438, 'Snacks', 41),
('Croustilles de maïs au guacamole', 30, 60, 7.1, 527, 'Snacks', 3.7),
('Barre de fruits à la framboise', 2.1, 80, 2.5, 353, 'Snacks', 60),
('Nougat aux noix de macadamia', 15, 72, 6.4, 448, 'Snacks', 49),
('Biscuits aux flocons d avoine et au miel', 13, 71, 5.4, 429, 'Snacks', 36),
('Chocolat aux amandes', 30, 57, 6.7, 531, 'Snacks', 44),
('Pretzels au fromage et à l oignon', 3.1, 75, 9.1, 390, 'Snacks', 14),
('Biscuits au caramel et au chocolat', 16, 68, 5.6, 452, 'Snacks', 37),
('Croustilles de légumes à la menthe', 28, 57, 4.2, 498, 'Snacks', 6.5),
('Barre de noix et de noix de pécan', 12, 62, 6.2, 390, 'Snacks', 35),
('Biscuits aux pépites de chocolat et aux amandes', 18, 67, 6.6, 471, 'Snacks', 32),
('Croustilles de maïs aux herbes', 29, 59, 5.2, 514, 'Snacks', 7.3),
('Barre de fruits à l abricot', 1.8, 81, 2.4, 352, 'Snacks', 59),
('Nougat aux noix de cajou et aux pistaches', 15, 73, 6.3, 444, 'Snacks', 52),
('Biscuits au beurre d arachide et aux pépites de chocolat', 17, 70, 6.2, 466, 'Snacks', 38),
('Chocolat blanc aux noix de macadamia', 30, 58, 6.3, 527, 'Snacks', 45),
('Biscuits aux pépites de chocolat et à la noix de coco', 18, 66, 5.8, 464, 'Snacks', 35),
('Croustilles de légumes à l ail', 27, 60, 4.8, 505, 'Snacks', 6.8),
('Barre de noix et de cerises', 12, 57, 5.6, 382, 'Snacks', 39),
('Biscuits au beurre et à l érable', 15, 70, 5.9, 442, 'Snacks', 40),
('Eau plate', 0, 0, 0, 0, 'Boissons', 0),
('Eau pétillante', 0, 0, 0, 0, 'Boissons', 0),
('Café noir', 0.2, 0, 0.3, 2, 'Boissons', 0),
('Café au lait', 1.3, 8.6, 0.7, 43, 'Boissons', 7),
('Thé vert', 0.1, 0, 0, 1, 'Boissons', 0),
('Thé noir', 0.1, 0, 0, 2, 'Boissons', 0),
('Jus d orange', 0.2, 8.2, 1, 39, 'Boissons', 8.2),
('Jus de pomme', 0.2, 11, 0.4, 47, 'Boissons', 10),
('Coca-Cola', 0, 10.6, 0, 42, 'Boissons', 10.6),
('Sprite', 0, 8.9, 0, 37, 'Boissons', 8.9),
('Limonade', 0, 11, 0, 44, 'Boissons', 11),
('Jus de raisin', 0.2, 15, 0.5, 60, 'Boissons', 15),
('Chocolat chaud', 2.4, 15, 2.4, 82, 'Boissons', 14),
('Smoothie aux fraises', 0.9, 30, 1.9, 132, 'Boissons', 26),
('Smoothie à la banane', 0.5, 25, 1.8, 105, 'Boissons', 18),
('Café glacé', 0.2, 11, 0.2, 49, 'Boissons', 10),
('Jus de carotte', 0.4, 9.2, 1, 41, 'Boissons', 6.9),
('Jus de citron', 0.2, 3.2, 0.4, 12, 'Boissons', 2.5),
('Eau gazeuse à la lime', 0, 0, 0, 0, 'Boissons', 0),
('Thé à la cerise', 0.1, 0, 0, 2, 'Boissons', 0),
('Café moka', 2.5, 15, 1.7, 87, 'Boissons', 10),
('Smoothie aux bleuets', 0.6, 35, 2.3, 150, 'Boissons', 29),
('Limonade à la fraise', 0, 12, 0, 48, 'Boissons', 12),
('Jus de framboise', 0.4, 14, 0.8, 58, 'Boissons', 14),
('Milk-shake au chocolat', 8.3, 46, 6.7, 280, 'Boissons', 40),
('Soda à la framboise', 0, 13, 0, 52, 'Boissons', 13),
('Chocolat chaud à la menthe', 3.2, 22, 1.7, 112, 'Boissons', 18),
('Jus de mangue', 0.6, 20, 1, 84, 'Boissons', 19),
('Café au caramel et à la vanille', 1.9, 12, 1.2, 68, 'Boissons', 7),
('Smoothie aux épinards', 0.8, 28, 2.5, 123, 'Boissons', 16),
('Lait de noix de cajou', 3.5, 1, 1, 35, 'Boissons', 0.5),
('Café latte au caramel', 3.6, 15, 3.1, 99, 'Boissons', 11),
('Café glacé à la vanille', 0.3, 16, 0.5, 65, 'Boissons', 14),
('Jus de poire et de gingembre', 0.4, 14, 0.6, 62, 'Boissons', 13),
('Thé à la pêche et à la framboise', 0.1, 0, 0, 1, 'Boissons', 0),
('Eau de coco', 0.2, 6.3, 0.7, 22, 'Boissons', 5.4),
('Thé à la lavande', 0, 0, 0, 0, 'Boissons', 0),
('Lait de noisette', 2.2, 1, 0.4, 29, 'Boissons', 0.1),
('Café frappé à la vanille', 2.8, 24, 1.5, 116, 'Boissons', 16),
('Smoothie au kiwi', 0.8, 38, 1.7, 156, 'Boissons', 33),
('Limonade à la cerise', 0, 13, 0, 51, 'Boissons', 13),
('Jus d abricot', 0.1, 15, 0.6, 64, 'Boissons', 15),
('Café décaféiné à la cannelle', 0.1, 0, 0.2, 2, 'Boissons', 0),
('Milk-shake à la fraise', 5.2, 42, 6.3, 223, 'Boissons', 38),
('Soda à la vanille', 0, 12, 0, 47, 'Boissons', 12),
('Chocolat froid à la menthe', 3.5, 25, 2, 129, 'Boissons', 22),
('Smoothie à la mangue et à la noix de coco', 1.1, 29, 1.6, 120, 'Boissons', 24),
('Café au lait au caramel', 2.9, 16, 2.3, 89, 'Boissons', 10),
('Thé au jasmin et au citron', 0, 0, 0, 1, 'Boissons', 0),
('Café glacé à la noisette', 0.2, 14, 0.3, 59, 'Boissons', 12),
('Jus de canneberge', 0.4, 12, 0.4, 52, 'Boissons', 11),
('Milk-shake au chocolat et à la banane', 8.7, 49, 6.9, 295, 'Boissons', 42),
('Soda au citron vert', 0, 11, 0, 45, 'Boissons', 11),
('Chocolat chaud à la noisette', 3.3, 19, 2, 104, 'Boissons', 15),
('Smoothie à la fraise et à la banane', 0.7, 32, 1.8, 138, 'Boissons', 28),
('Café latte à la vanille', 3.8, 15, 3.2, 100, 'Boissons', 10),
('Café au caramel et à la noisette', 3.2, 17, 1.8, 85, 'Boissons', 8),
('Thé au gingembre', 0.1, 0, 0, 2, 'Boissons', 0),
('Milk-shake à la banane et au chocolat', 7.5, 44, 6.4, 264, 'Boissons', 39),
('Soda à l abricot', 0, 14, 0, 55, 'Boissons', 14),
('Chocolat chaud à la vanille', 2.8, 18, 1.8, 98, 'Boissons', 14),
('Smoothie à la pêche', 0.6, 33, 1.9, 143, 'Boissons', 29),
('Lait de brebis', 5, 4, 4.2, 79, 'Boissons', 3.5);











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
