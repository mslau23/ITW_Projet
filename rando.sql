-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 17 mai 2023 à 22:55
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
-- Base de données : `randobdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `rando`
--

CREATE TABLE `rando` (
  `nom` varchar(15) NOT NULL,
  `description` varchar(300) NOT NULL,
  `adresse` varchar(150) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `score` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rando`
--

INSERT INTO `rando` (`nom`, `description`, `adresse`, `photo`, `score`) VALUES
('Chamant Som', 'Petite randonnée autour de Grenoble très accessible et surtout magnifique, elle ravira tous les amateurs de prairie, verdure et de beaux paysages.', ' Charmant Som 38380 Saint-Pier', '', 0),
('Lac Achard', 'Lac très connu au dessus de la station de Chamrousse au cœur de la nature. Très accessible, il est facile de s’y rendre pour prendre un peu le frais lors des fortes chaleurs.', 'plateau de l\'Arselle - Chamrou', '', 0),
('Pinéa', 'Direction le sommet effilé qui surplombe une partie de la Chartreuse, avec une vue sur le bassin grenoblois. Il faudra compter 3h environ pour effectuer les 9km et 350m de dénivelé. ', ' Charmant Som 38380 Saint-Pierre-de-Chartreuse ', '', 0),
('Pravouta', 'Magnifique petite randonnée en Chartreuse au départ du col du Coq. Pravouta avec ses 1760 m d’altitude offre une très belle vue sur le massif de la Chartreuse et ses sommets.', 'Col du coq, Saint Pierre de Chartreuse', '', 0),
('Rochet du Bacon', 'Très belle randonnée à 1 h de Grenoble, près de Gresse en Vercors où la vue au sommet y est spectaculaire. Le Dévoluy, le Vercors avec le Grand Veymont, et surtout le Mont Aiguille habille ce paysage. Il faudra compter environ 3h30 pour en venir à bout des 9km et 600m de dénivelé.', 'Chauplane38650 Gresse-en-Vercors', '', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
