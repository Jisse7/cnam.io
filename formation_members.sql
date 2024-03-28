-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 20 nov. 2022 à 20:30
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `formation_members`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `secret` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `password`, `creation_date`, `secret`) VALUES
(1, 'Jissé', 'jcfeydel@gmail.com', 'aq100b917fdf09ce34585403a78b2d70fc671b873dc25', '2022-08-29 02:41:08', '537051b13ff3f4850360882ef254727b6257718516617336681661733668'),
(2, 'yolo', 'andres@gmail.com', 'aq1dab99e986d4925d037655c99a2ee45255acda22a25', '2022-08-29 02:45:00', '18dcd749492642fd21c5f9708354099a496c7bc716617339001661733900'),
(3, 'Sami', 'sami@gmail.com', 'aq1dab99e986d4925d037655c99a2ee45255acda22a25', '2022-08-29 09:35:38', 'a61ca155ea50c8bccb7152b660efce6cec5b93b116617585381661758538'),
(4, 'Prime Minister', 'pm@gmail.com', 'aq1dab99e986d4925d037655c99a2ee45255acda22a25', '2022-08-29 09:52:08', 'b26fbe927d06fbfb7c7e4e98517e6dc4d5c81ab816617595281661759528'),
(5, 'Jis', 'jis@gmail.com', 'aq1a589f91eb4e4d80a013f7dbb6b3a45c6b6de2af125', '2022-11-20 17:35:47', '0a7d34bc691b628261de146fd0359add1f81b08f16689621471668962147'),
(6, 'jo', 'jo@gmail.com', 'aq1a589f91eb4e4d80a013f7dbb6b3a45c6b6de2af125', '2022-11-20 17:46:07', '3f1136fac4da8e8caf88ef3a1269dbc9e2c0048c16689627671668962767');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
