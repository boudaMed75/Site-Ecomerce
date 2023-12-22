-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 05 déc. 2023 à 11:56
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecomerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `img` varchar(256) NOT NULL,
  `createAt` datetime NOT NULL,
  `description` text DEFAULT NULL,
  `sexe` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `img`, `createAt`, `description`, `sexe`) VALUES
(1, 'vetiment', 'vetimenthomme.jpg', '2023-12-04 12:32:36', 'nbcc', 'homme'),
(2, 'Vêtements', 'Vêtementshomme.jpeg', '2023-12-04 12:40:52', 'les vêtements pour hommes ', 'homme'),
(3, 'vetements', 'vetementsfemme.jpeg', '2023-12-04 12:42:30', 'les vêtements pour femmes', 'femme'),
(4, 'accessoires', 'accessoiresfemme.jpeg', '2023-12-04 12:44:56', 'les accessoires pour femmes', 'femme'),
(5, 'accessoires', 'accessoireshomme.jpeg', '2023-12-04 12:46:53', 'accessoires pour les hommes', 'homme'),
(6, 'chaussures', 'chaussureshomme.jpeg', '2023-12-04 12:47:44', 'chaussures pour hommes', 'homme'),
(7, 'chaussures', 'chaussuresfemme.jpeg', '2023-12-04 12:48:36', 'chaussures pour femmes', 'femme'),
(8, 'vêtements', 'vêtementsenfant.jpeg', '2023-12-04 12:52:00', 'vêtements pour enfants', 'enfant'),
(9, 'chaussures', 'chaussuresenfant.jpeg', '2023-12-04 12:53:09', 'chaussures pour enfants', 'enfant'),
(10, 'ensembles', 'ensemblesbebe.jpg', '2023-12-04 12:55:10', 'les ensembles des bébés', 'bebe'),
(11, 'les vetiment d\'ete', 'les vetiment d\'eteenfant.png', '2023-12-05 11:29:09', 'jdhhflkkfjjgjjh', 'enfant');

-- --------------------------------------------------------

--
-- Structure de la table `codepromo`
--

CREATE TABLE `codepromo` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `creadAt` datetime NOT NULL,
  `expiredAt` date NOT NULL,
  `sold` float NOT NULL,
  `date_debut` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `codepromo`
--

INSERT INTO `codepromo` (`id`, `name`, `creadAt`, `expiredAt`, `sold`, `date_debut`) VALUES
(1, 'BMA', '2023-12-04 15:54:06', '2023-12-22', 50, '2023-12-08');

-- --------------------------------------------------------

--
-- Structure de la table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `colors`
--

INSERT INTO `colors` (`id`, `name`) VALUES
(1, 'white'),
(2, 'black'),
(3, 'red'),
(4, 'green'),
(5, 'blue'),
(6, 'orange');

-- --------------------------------------------------------

--
-- Structure de la table `comnade`
--

CREATE TABLE `comnade` (
  `id` int(11) NOT NULL,
  `status` varchar(256) NOT NULL,
  `passedAt` datetime NOT NULL,
  `ispayed` tinyint(4) NOT NULL,
  `methodpays` varchar(256) NOT NULL,
  `isdelevred` tinyint(4) NOT NULL,
  `delevredat` date NOT NULL,
  `payedat` date NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `id_size` int(11) DEFAULT NULL,
  `id_colors` int(11) DEFAULT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comnade`
--

INSERT INTO `comnade` (`id`, `status`, `passedAt`, `ispayed`, `methodpays`, `isdelevred`, `delevredat`, `payedat`, `id_user`, `id_produit`, `id_size`, `id_colors`, `quantite`) VALUES
(14, 'panier', '2023-12-05 08:59:53', 0, '', 0, '0000-00-00', '0000-00-00', 1, 12, 2, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `src` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `liked`
--

CREATE TABLE `liked` (
  `id` int(11) NOT NULL,
  `liked_at` datetime NOT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

CREATE TABLE `marque` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `img` varchar(256) NOT NULL,
  `date_ajouter` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `marque`
--

INSERT INTO `marque` (`id`, `name`, `img`, `date_ajouter`) VALUES
(1, 'BMA', 'BMA.jpg', '2023-12-01'),
(2, 'nike', 'nike.jpg', '2023-12-01'),
(3, 'adidas', 'adidas.jpeg', '2023-12-01');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sold` float NOT NULL,
  `prix` float NOT NULL,
  `image_cover` varchar(256) NOT NULL,
  `createdAt` datetime NOT NULL,
  `id_sous_cat` int(11) DEFAULT NULL,
  `id_marque` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `title`, `description`, `quantity`, `sold`, `prix`, `image_cover`, `createdAt`, `id_sous_cat`, `id_marque`) VALUES
(9, 'chemise motif 1', 'chemise pour hommes', 100, 20, 240, 'chemise motif 1.jpg', '2023-12-04 17:00:45', 1, 1),
(10, 'chemise motif  2', 'chemise pour les hommes', 100, 20, 249, 'chemise motif  2.jpg', '2023-12-04 17:03:18', 1, 1),
(11, 'chemise motif 3', 'chemise pour hommes', 100, 20, 240, 'chemise motif 3.jpg', '2023-12-04 17:03:46', 1, 1),
(12, 't-shirt motif 1', 't-shirt BBB', 100, 20, 99, 't-shirt motif 1.jpg', '2023-12-04 17:04:28', 2, 1),
(13, 't-shirt motif 2', 't-shirt B', 100, 30, 119, 't-shirt motif 2.jpeg', '2023-12-04 17:05:45', 2, 1),
(14, 't-shirt motif 3', 't-shirt pour homme 3', 100, 30, 119, 't-shirt motif 3.jpeg', '2023-12-04 17:06:19', 2, 1),
(15, 'sweatshirt motif 1', 'sweatshirt pour homme', 100, 20, 345, 'sweatshirt motif 1.jpg', '2023-12-04 17:07:56', 3, 1),
(16, 'sweatshirt 2', 'sweatshirt pour hommes345', 100, 50, 345, 'sweatshirt 2.jpeg', '2023-12-04 17:08:39', 3, 1),
(17, 'sweatshirt sans capuche', 'sweatshirt', 100, 20, 300, 'sweatshirt sans capuche.jpeg', '2023-12-04 17:09:20', 3, 1),
(18, 'sweatshirt sans capuche 2', 'sweatshirt homme', 100, 20, 300, 'sweatshirt sans capuche 2.jpeg', '2023-12-04 17:10:02', 3, 1),
(19, 'veste de cuire', 'veste pour femmes', 100, 30, 499, 'veste de cuire.jpg', '2023-12-04 17:12:18', 6, 1),
(20, 'veste femme 2', 'veste pour femme', 100, 30, 499, 'veste femme 2.jpg', '2023-12-04 17:12:52', 6, 1),
(21, 'veste 3', 'veste pour femme', 100, 30, 499, 'veste 3.jpeg', '2023-12-04 17:13:20', 6, 1),
(22, 'leggings 1', 'leggings pour femme', 100, 20, 149, 'leggings 1.jpeg', '2023-12-04 17:19:27', 7, 1),
(23, 'leggings 2', 'leggings pour femme', 100, 20, 199, 'leggings 2.jpeg', '2023-12-04 17:20:05', 7, 1),
(24, 'sac 1', 'sac pour femme', 20, 15, 800, 'sac 1.jpg', '2023-12-04 17:20:54', 8, 1),
(25, 'sac 2', 'sac pour femme', 30, 10, 700, 'sac 2.jpg', '2023-12-04 17:21:42', 8, 1),
(26, 'sac 3', 'sac pour femme', 20, 10, 800, 'sac 3.jpg', '2023-12-04 17:22:05', 8, 1),
(27, 't-shirt among us', 't-shirt among us pour enfant', 100, 0, 69, 't-shirt among us.jpg', '2023-12-04 17:23:43', 11, 1),
(28, 't-shirt mini', 't-shirt pour filles', 100, 0, 79, 't-shirt mini.jpeg', '2023-12-04 17:24:28', 11, 1),
(29, 't-shirt los angeles', 't-shirt fille los angeles', 100, 0, 79, 't-shirt los angeles.jpeg', '2023-12-04 17:25:03', 11, 1),
(30, 't-shirt harry potter', 'harry poter t-shirt', 100, 20, 119, 't-shirt harry potter.jpeg', '2023-12-04 17:25:40', 11, 1),
(31, 'sweatshirt 1', 'sweatshirt pour enfant', 100, 20, 199, 'sweatshirt 1.jpeg', '2023-12-04 17:26:17', 12, 1),
(32, 'sweatshirt 3', 'sweatshirt pour enfant ', 100, 20, 199, 'sweatshirt 3.jpeg', '2023-12-04 17:26:57', 12, 1),
(33, 'sweatshirt 4', 'sweatshirt stranger things', 100, 20, 299, 'sweatshirt 4.jpeg', '2023-12-04 17:27:38', 12, 1),
(34, 'sweatshirt 5', 'sweatshirt pour fille', 100, 20, 349, 'sweatshirt 5.jpeg', '2023-12-04 17:28:10', 12, 1),
(35, 'enesemble 1', 'ensemble bebe ', 100, 20, 299, 'enesemble 1.jpeg', '2023-12-04 17:30:12', 14, 1),
(36, 'ensemble 2', 'enesemble bebe', 100, 10, 299, 'ensemble 2.jpg', '2023-12-04 17:30:37', 14, 1),
(37, 'ensemble 4 ', 'enesemble bebe', 100, 10, 299, 'ensemble 4 .jpeg', '2023-12-04 17:31:24', 14, 1),
(38, 'ensemble 5', 'ensemble bebe', 100, 10, 299, 'ensemble 5.jpeg', '2023-12-04 17:31:54', 14, 1),
(39, 'enesemble 6', 'ensemble pour bebe', 100, 20, 300, 'enesemble 6.jpeg', '2023-12-04 17:33:38', 14, 1),
(40, 'capuche noire bbb', 'capuche noire bbb', 100, 10, 349, 'capuche noire bbb.png', '2023-12-04 18:16:08', 3, 1),
(41, 'sweatshirt blanc BBB', 'BBB blanc', 100, 20, 349, 'sweatshirt blanc BBB.png', '2023-12-04 18:20:38', 3, 1),
(42, 'chaussure homme classe', 'chaussure classe homme', 100, 20, 399, 'chaussure homme classe.png', '2023-12-04 18:23:30', 4, 1),
(43, 'chaussure sport homme', 'chaussure sport homme', 100, 10, 250, 'chaussure sport homme.png', '2023-12-04 18:27:51', 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit_color`
--

CREATE TABLE `produit_color` (
  `id_produit` int(11) NOT NULL,
  `id_color` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit_color`
--

INSERT INTO `produit_color` (`id_produit`, `id_color`) VALUES
(9, 1),
(9, 2),
(9, 3),
(9, 4),
(9, 5),
(9, 6),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(10, 5),
(10, 6),
(11, 1),
(11, 2),
(11, 3),
(11, 4),
(11, 5),
(11, 6),
(12, 1),
(12, 2),
(12, 3),
(12, 4),
(12, 5),
(12, 6),
(13, 1),
(13, 2),
(13, 3),
(13, 4),
(13, 5),
(13, 6),
(14, 1),
(14, 2),
(14, 3),
(14, 4),
(14, 5),
(14, 6),
(15, 2),
(15, 3),
(15, 4),
(15, 5),
(15, 6),
(16, 2),
(16, 3),
(16, 4),
(16, 5),
(16, 6),
(17, 2),
(17, 3),
(17, 4),
(17, 5),
(17, 6),
(18, 2),
(18, 3),
(18, 4),
(18, 5),
(18, 6),
(19, 2),
(19, 3),
(19, 4),
(19, 5),
(19, 6),
(20, 2),
(20, 3),
(20, 4),
(20, 5),
(20, 6),
(21, 2),
(21, 3),
(21, 4),
(21, 5),
(21, 6),
(22, 1),
(22, 2),
(22, 3),
(22, 4),
(22, 5),
(22, 6),
(23, 1),
(23, 2),
(23, 3),
(23, 4),
(23, 5),
(23, 6),
(24, 1),
(24, 2),
(24, 3),
(24, 4),
(24, 5),
(24, 6),
(25, 1),
(25, 2),
(25, 3),
(25, 4),
(25, 5),
(25, 6),
(26, 1),
(26, 2),
(26, 3),
(26, 4),
(26, 5),
(26, 6),
(27, 1),
(27, 2),
(27, 3),
(27, 4),
(27, 5),
(27, 6),
(28, 1),
(28, 2),
(28, 3),
(28, 4),
(28, 5),
(28, 6),
(29, 1),
(29, 2),
(29, 3),
(29, 4),
(29, 5),
(29, 6),
(30, 1),
(30, 2),
(30, 3),
(30, 4),
(30, 5),
(30, 6),
(31, 1),
(31, 2),
(31, 3),
(31, 4),
(31, 5),
(31, 6),
(32, 1),
(32, 2),
(32, 3),
(32, 4),
(32, 5),
(32, 6),
(33, 1),
(33, 2),
(33, 3),
(33, 4),
(33, 5),
(33, 6),
(34, 1),
(34, 2),
(34, 3),
(34, 4),
(34, 5),
(34, 6),
(35, 1),
(35, 2),
(35, 3),
(35, 4),
(35, 5),
(35, 6),
(36, 1),
(36, 2),
(36, 3),
(36, 4),
(36, 5),
(36, 6),
(38, 1),
(38, 2),
(38, 3),
(38, 4),
(38, 5),
(38, 6),
(39, 1),
(39, 2),
(39, 3),
(39, 4),
(39, 5),
(39, 6),
(40, 1),
(40, 2),
(40, 3),
(40, 4),
(40, 5),
(40, 6),
(41, 1),
(41, 2),
(41, 3),
(41, 4),
(41, 5),
(41, 6),
(42, 2),
(43, 1),
(43, 2);

-- --------------------------------------------------------

--
-- Structure de la table `produit_imgs`
--

CREATE TABLE `produit_imgs` (
  `id` int(11) NOT NULL,
  `src` varchar(256) NOT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit_imgs`
--

INSERT INTO `produit_imgs` (`id`, `src`, `id_produit`, `createdAt`) VALUES
(1, 'capuche noire bbb1701710238.png', 40, '2023-12-04 18:17:18'),
(2, 'capuche noire bbb1701710245.png', 40, '2023-12-04 18:17:25'),
(3, 'capuche noire bbb1701710250.png', 40, '2023-12-04 18:17:30'),
(4, 'sweatshirt blanc BBB1701710461.png', 41, '2023-12-04 18:21:01'),
(5, 'sweatshirt blanc BBB1701710466.png', 41, '2023-12-04 18:21:06'),
(6, 'chaussure homme classe1701710624.png', 42, '2023-12-04 18:23:44'),
(7, 'chaussure homme classe1701710628.png', 42, '2023-12-04 18:23:48'),
(8, 'chaussure sport homme1701710886.png', 43, '2023-12-04 18:28:06'),
(9, 'chaussure sport homme1701710890.png', 43, '2023-12-04 18:28:10'),
(10, 'sweatshirt blanc BBB1701711204.png', 41, '2023-12-04 18:33:24'),
(11, 'chemise motif 11701772250.png', 9, '2023-12-05 11:30:50'),
(12, 'chemise motif 11701772255.png', 9, '2023-12-05 11:30:55'),
(13, 'chemise motif 11701772261.png', 9, '2023-12-05 11:31:01');

-- --------------------------------------------------------

--
-- Structure de la table `produit_size`
--

CREATE TABLE `produit_size` (
  `id_produit` int(11) NOT NULL,
  `id_size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit_size`
--

INSERT INTO `produit_size` (`id_produit`, `id_size`) VALUES
(9, 1),
(9, 2),
(9, 3),
(9, 4),
(9, 5),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(10, 5),
(11, 1),
(11, 2),
(11, 3),
(11, 4),
(11, 5),
(12, 1),
(12, 2),
(12, 3),
(12, 4),
(12, 5),
(13, 1),
(13, 2),
(13, 3),
(13, 4),
(13, 5),
(14, 1),
(14, 2),
(14, 3),
(14, 4),
(14, 5),
(15, 1),
(15, 2),
(15, 3),
(15, 4),
(16, 1),
(16, 2),
(16, 3),
(16, 4),
(17, 1),
(17, 2),
(17, 3),
(17, 4),
(18, 1),
(18, 2),
(18, 3),
(18, 4),
(19, 1),
(19, 2),
(19, 3),
(19, 4),
(20, 1),
(20, 2),
(20, 3),
(20, 4),
(21, 1),
(21, 2),
(21, 3),
(21, 4),
(22, 1),
(22, 2),
(22, 4),
(22, 5),
(23, 1),
(23, 2),
(23, 3),
(23, 4),
(23, 5),
(24, 1),
(24, 2),
(24, 3),
(24, 4),
(24, 5),
(25, 1),
(25, 2),
(25, 3),
(25, 4),
(25, 5),
(26, 1),
(26, 2),
(26, 3),
(26, 4),
(26, 5),
(27, 1),
(27, 2),
(27, 3),
(27, 4),
(27, 5),
(28, 1),
(28, 2),
(28, 3),
(28, 4),
(28, 5),
(29, 1),
(29, 2),
(29, 3),
(29, 4),
(29, 5),
(30, 1),
(30, 2),
(30, 3),
(30, 4),
(30, 5),
(31, 1),
(31, 2),
(31, 3),
(31, 4),
(31, 5),
(32, 1),
(32, 2),
(32, 3),
(32, 4),
(32, 5),
(33, 1),
(33, 2),
(33, 3),
(33, 4),
(33, 5),
(34, 1),
(34, 2),
(34, 3),
(34, 4),
(34, 5),
(35, 1),
(35, 2),
(35, 3),
(35, 4),
(35, 5),
(36, 1),
(36, 2),
(36, 3),
(36, 4),
(36, 5),
(38, 1),
(38, 2),
(38, 3),
(38, 4),
(38, 5),
(39, 1),
(39, 2),
(39, 3),
(39, 4),
(39, 5),
(40, 1),
(40, 2),
(40, 3),
(40, 4),
(40, 5),
(41, 1),
(41, 2),
(41, 3),
(41, 4),
(41, 5),
(42, 1),
(42, 2),
(42, 3),
(42, 4),
(42, 5),
(43, 2),
(43, 3),
(43, 4),
(43, 5);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `name_role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `name_role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `size`
--

INSERT INTO `size` (`id`, `name`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, 'XXL');

-- --------------------------------------------------------

--
-- Structure de la table `souscategory`
--

CREATE TABLE `souscategory` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `CreateAt` datetime NOT NULL,
  `id_cat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `souscategory`
--

INSERT INTO `souscategory` (`id`, `name`, `description`, `CreateAt`, `id_cat`) VALUES
(1, 'chemises', 'chemises pour hommes', '2023-12-04 13:13:49', 6),
(2, 't-shirts ', 't-shirts pour hommes', '2023-12-04 13:16:04', 2),
(3, 'sweatshirts', 'sweatshirts pour homme', '2023-12-04 13:16:29', 2),
(4, 'classe', 'chaussures classe pour hommes', '2023-12-04 13:17:52', 6),
(5, 'sport', 'chaussures de sport pour hommes', '2023-12-04 13:18:13', 6),
(6, 'vestes', 'vestes pour femmes', '2023-12-04 13:19:45', 3),
(7, 'leggings', 'leggings pour femme', '2023-12-04 13:20:26', 3),
(8, 'sacs', 'sacs pour femmes', '2023-12-04 13:21:02', 4),
(9, 'classe', 'chaussures classe pour femmes\r\n', '2023-12-04 13:21:22', 7),
(10, 'sport ', 'chaussures sport pour femmes', '2023-12-04 13:21:38', 7),
(11, 't-shirts', 't-shirts pour enfants', '2023-12-04 13:22:00', 8),
(12, 'sweatshirts', 'sweatshirts pour enfants', '2023-12-04 13:22:29', 8),
(13, 'sport', 'chaussures de sport pour enfants', '2023-12-04 13:23:01', 9),
(14, 'ensembles', 'ensembles pour enfants', '2023-12-04 13:23:22', 10);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` varchar(256) NOT NULL,
  `img` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `adress1` text NOT NULL,
  `adress2` text NOT NULL,
  `id_role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `name`, `email`, `phone`, `img`, `password`, `active`, `adress1`, `adress2`, `id_role`) VALUES
(1, 'MOHAMED BOUDA', 'bouda@gmail.com', '06514258', '', 'boudabouda', 0, 'ouslane mekness', '', 2),
(2, 'admin', 'ADMINBAM@gmail.com', '0651425847', '', 'ADMIN0000', 0, 'ESTM MEKNESS', '', 1),
(3, 'ADAM', 'adam@gmail.bouda', '0963737646', '', 'adamadam', 0, '', '', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `codepromo`
--
ALTER TABLE `codepromo`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comnade`
--
ALTER TABLE `comnade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produit_user` (`id_user`),
  ADD KEY `fk_produit_produit` (`id_produit`),
  ADD KEY `fk_produit_size` (`id_size`),
  ADD KEY `fk_produit_col` (`id_colors`);

--
-- Index pour la table `liked`
--
ALTER TABLE `liked`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produit_id` (`id_produit`),
  ADD KEY `fk_user_id` (`id_user`);

--
-- Index pour la table `marque`
--
ALTER TABLE `marque`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sous_cat` (`id_sous_cat`),
  ADD KEY `fk_id_marque` (`id_marque`);

--
-- Index pour la table `produit_color`
--
ALTER TABLE `produit_color`
  ADD PRIMARY KEY (`id_produit`,`id_color`),
  ADD KEY `id_color` (`id_color`);

--
-- Index pour la table `produit_imgs`
--
ALTER TABLE `produit_imgs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_img` (`id_produit`);

--
-- Index pour la table `produit_size`
--
ALTER TABLE `produit_size`
  ADD PRIMARY KEY (`id_produit`,`id_size`),
  ADD KEY `id_size` (`id_size`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `souscategory`
--
ALTER TABLE `souscategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cat_id` (`id_cat`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_role` (`id_role`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `codepromo`
--
ALTER TABLE `codepromo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `comnade`
--
ALTER TABLE `comnade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `liked`
--
ALTER TABLE `liked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `marque`
--
ALTER TABLE `marque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `produit_imgs`
--
ALTER TABLE `produit_imgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `souscategory`
--
ALTER TABLE `souscategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comnade`
--
ALTER TABLE `comnade`
  ADD CONSTRAINT `fk_produit_col` FOREIGN KEY (`id_colors`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `fk_produit_produit` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `fk_produit_size` FOREIGN KEY (`id_size`) REFERENCES `size` (`id`),
  ADD CONSTRAINT `fk_produit_user` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `liked`
--
ALTER TABLE `liked`
  ADD CONSTRAINT `fk_produit_id` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_id_marque` FOREIGN KEY (`id_marque`) REFERENCES `marque` (`id`),
  ADD CONSTRAINT `fk_sous_cat` FOREIGN KEY (`id_sous_cat`) REFERENCES `souscategory` (`id`);

--
-- Contraintes pour la table `produit_color`
--
ALTER TABLE `produit_color`
  ADD CONSTRAINT `produit_color_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `produit_color_ibfk_2` FOREIGN KEY (`id_color`) REFERENCES `colors` (`id`);

--
-- Contraintes pour la table `produit_imgs`
--
ALTER TABLE `produit_imgs`
  ADD CONSTRAINT `fk_id_img` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `produit_size`
--
ALTER TABLE `produit_size`
  ADD CONSTRAINT `produit_size_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `produit_size_ibfk_2` FOREIGN KEY (`id_size`) REFERENCES `size` (`id`);

--
-- Contraintes pour la table `souscategory`
--
ALTER TABLE `souscategory`
  ADD CONSTRAINT `fk_cat_id` FOREIGN KEY (`id_cat`) REFERENCES `category` (`id`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_id_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
