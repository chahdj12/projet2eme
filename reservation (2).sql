-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 27 nov. 2023 à 12:52
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `reservation`
--

-- --------------------------------------------------------

--


-- --------------------------------------------------------



-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Déchargement des données de la table `typelivraison`
--

-- --------------------------------------------------------


--
-- Déchargement des données de la table `typeoffre`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_user` int(11) NOT NULL,
  `nom_user` varchar(50) NOT NULL,
  `prenom_user` varchar(50) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `tel_user` int(11) NOT NULL,
  `adresse_user` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_user` varchar(50) NOT NULL,
  `role_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_user`, `nom_user`, `prenom_user`, `email_user`, `tel_user`, `adresse_user`, `username`, `password_user`, `role_user`) VALUES
(1, 'test1', 'test', 'test@gmail.com', 12345678, 'Ghazela', 'test', '74b87337454200d4d33f80c4663dc5e5', 'ADMIN_ROLE'),
(2, 'aaaaEdited', 'aaaaEdited', 'aaaa@esprit.tnEdited', 2147483647, 'arianaEdited', 'yoserEdited', '098f6bcd4621d373cade4e832627b4f6', 'USER_ROLE'),
(12, 'SOULAIMAA', 'HLELI', 'souleima@gmail.com', 1234567890, 'aasyjhgjghhg', 'souleima', '098f6bcd4621d373cade4e832627b4f6', 'USER_ROLE'),
(13, 'Test', 'test', 'ilyes@gmail.com', 123456789, 'qafg', 'souleima2', '098f6bcd4621d373cade4e832627b4f6', 'ADMIN_ROLE'),
(14, 'salima', 'bll', 'selima', 1233445666, 'ariana soghra', 'Salima1', '8325324b47e1e62a1c2998a640cbdc72', 'USER_ROLE'),
(15, 'souleima', 'hleli', 'selima@gmail.com', 123456789, 'ariana soghra', 'Souleima3', '098f6bcd4621d373cade4e832627b4f6', 'USER_ROLE');

--
-- Index pour les tables déchargées
--





--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--




--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
