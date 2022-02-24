-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 23, 2022 at 03:01 PM
-- Server version: 10.3.29-MariaDB-0+deb10u1
-- PHP Version: 7.3.29-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monique`
--

-- --------------------------------------------------------

--
-- Table structure for table `ArticleLike`
--

CREATE TABLE `ArticleLike` (
  `_ID` int(11) NOT NULL,
  `IDUser` int(11) NOT NULL,
  `IDJeu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ArticleLike`
--

INSERT INTO `ArticleLike` (`_ID`, `IDUser`, `IDJeu`) VALUES
(129, 90, 103),
(130, 90, 111),
(131, 92, 111),
(133, 92, 103);

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `commentaire` varchar(500) NOT NULL,
  `idjeux` int(11) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `idjeux`, `iduser`) VALUES
(231, 'lé', 103, 90),
(232, '', 103, 90),
(233, 'J\'aime', 111, 92),
(234, 'Trop cool', 103, 92),
(235, 'J\'ai même vu un fantôme', 103, 92),
(236, 'Albert Einstein né le 14 mars 1879 à Ulm, dans le Wurtemberg, et mort le 18 avril 1955 à Princeton, dans le New Jersey, est un physicien théoricien. Il fut successivement allemand, apatride, suisse et de double nationalité helvético-américaine. Il épousa Mileva Marić, puis sa cousine Elsa Einstein.', 111, 92);

-- --------------------------------------------------------

--
-- Table structure for table `Game`
--

CREATE TABLE `Game` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `texte` text NOT NULL,
  `type` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Game`
--

INSERT INTO `Game` (`id`, `nom`, `texte`, `type`) VALUES
(103, 'chateau', 'bruler', 'oise'),
(111, 'sanatorium ', 'lieux garder et beaucoup vendaliser', 'oise');

-- --------------------------------------------------------

--
-- Table structure for table `Info`
--

CREATE TABLE `Info` (
  `id` int(11) NOT NULL,
  `info` varchar(5000) NOT NULL,
  `desct` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Info`
--

INSERT INTO `Info` (`id`, `info`, `desct`) VALUES
(10, 'Bienvenue sur la V.2 !', 'nouvelle version du site !'),
(11, 'Nouveauté :', 'Nouvelle gestion des jeux et des commentaires. Suppression des animation et des séries temporairement.'),
(14, 'A venir :', 'Ajout de jeux, d\'un bouton pour supprimé l\'image de profil de l\'utilisateur. ');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` int(50) NOT NULL,
  `MDP` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `admin` varchar(50) NOT NULL,
  `pdp` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `MDP`, `pseudo`, `admin`, `pdp`) VALUES
(90, 'lea', 'lea', 'true', '90_54629.gif'),
(91, '123', 'Kevin', 'false', 'default.png'),
(92, 'NWAR', 'Zemmour', 'false', '92_Me+irl_5c27a7_6489207.gif'),
(93, '1234', 'alex', 'true', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ArticleLike`
--
ALTER TABLE `ArticleLike`
  ADD UNIQUE KEY `_ID` (`_ID`),
  ADD KEY `IDJeu` (`IDJeu`),
  ADD KEY `IDUser` (`IDUser`) USING BTREE;

--
-- Indexes for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commantaire` (`commentaire`(191),`idjeux`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idjeux` (`idjeux`);

--
-- Indexes for table `Game`
--
ALTER TABLE `Game`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nom` (`nom`);

--
-- Indexes for table `Info`
--
ALTER TABLE `Info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nom` (`pseudo`),
  ADD KEY `MDP` (`MDP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ArticleLike`
--
ALTER TABLE `ArticleLike`
  MODIFY `_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `Game`
--
ALTER TABLE `Game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `Info`
--
ALTER TABLE `Info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ArticleLike`
--
ALTER TABLE `ArticleLike`
  ADD CONSTRAINT `ArticleLike_ibfk_1` FOREIGN KEY (`IDUser`) REFERENCES `User` (`id`),
  ADD CONSTRAINT `ArticleLike_ibfk_2` FOREIGN KEY (`IDJeu`) REFERENCES `Game` (`id`);

--
-- Constraints for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `User` (`id`),
  ADD CONSTRAINT `commentaires_ibfk_2` FOREIGN KEY (`idjeux`) REFERENCES `Game` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
