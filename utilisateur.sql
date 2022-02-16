-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 16 fév. 2022 à 23:24
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `utilisateur`
--

-- --------------------------------------------------------

--
-- Structure de la table `articlelike`
--

DROP TABLE IF EXISTS `articlelike`;
CREATE TABLE IF NOT EXISTS `articlelike` (
  `_ID` int(11) NOT NULL,
  `IDUser` int(11) NOT NULL,
  `IDJeu` int(11) NOT NULL,
  KEY `IDUser` (`IDUser`),
  KEY `_ID` (`_ID`),
  KEY `IDJeu` (`IDJeu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` varchar(10000) CHARACTER SET utf8mb4 NOT NULL,
  `idjeux` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `commentaire` (`commentaire`(250)),
  KEY `idjeux` (`idjeux`),
  KEY `iduser` (`iduser`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

DROP TABLE IF EXISTS `game`;
CREATE TABLE IF NOT EXISTS `game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(500) CHARACTER SET utf8mb4 NOT NULL,
  `texte` text CHARACTER SET utf8mb4 NOT NULL,
  `type` varchar(500) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nom` (`nom`(250))
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `info`
--

DROP TABLE IF EXISTS `info`;
CREATE TABLE IF NOT EXISTS `info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `info` varchar(500) CHARACTER SET utf8mb4 NOT NULL,
  `desct` varchar(500) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `MDP` varchar(2000) CHARACTER SET utf8mb4 NOT NULL,
  `pseudo` varchar(2000) CHARACTER SET utf8mb4 NOT NULL,
  `admin` varchar(2000) CHARACTER SET utf8mb4 NOT NULL,
  `pdp` varchar(2000) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `MDP` (`MDP`(250)),
  KEY `pseudo` (`pseudo`(250))
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `MDP`, `pseudo`, `admin`, `pdp`) VALUES
(1, 'lea', 'lea', 'true', '1_processed-b23be8f0-23fc-4209-a2ce-91c007616dfd_ZTd6LNsm.jpeg'),
(3, 'lea', 'learico', 'false', 'default.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
