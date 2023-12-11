-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 10 déc. 2023 à 23:09
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

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
-- Structure de la table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `contenue` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `blog`
--

INSERT INTO `blog` (`id`, `title`, `mail`, `date`, `contenue`) VALUES
(9, 'zaazddazdz', 'dzzz@djdjd.fjf', '0023-02-11', 'jdjdjd');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `created_at` date NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `idOffre` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`idOffre`, `idUser`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE `livraison` (
  `id` int(11) NOT NULL,
  `idPartenaire` int(11) NOT NULL,
  `date` date NOT NULL,
  `type` int(50) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `numero` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `livraison`
--

INSERT INTO `livraison` (`id`, `idPartenaire`, `date`, `type`, `adresse`, `status`, `numero`) VALUES
(5, 1, '2023-11-08', 1, 'asd', 'qq', '1234567890'),
(6, 1, '2023-11-19', 1, 'asd', 'qq', 'qq'),
(7, 1, '2023-12-21', 1, 'qwerty', 'qqEdited', '12345678');

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `prix` decimal(10,2) NOT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `localisation` varchar(255) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`id`, `nom`, `description`, `prix`, `date_debut`, `date_fin`, `localisation`, `type_id`) VALUES
(1, 'type1', 'description type maisons', 65.00, '2023-11-17', '2023-11-14', 'ariana', 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `descriptionP` text DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `prix` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `name`, `descriptionP`, `stock`, `prix`) VALUES
(1, 'test', 'test', 2, 100.00);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `typePaiement` varchar(50) NOT NULL,
  `nbrPersonnes` int(11) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `nbrChambres` int(11) NOT NULL,
  `typePension` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `idUser`, `typePaiement`, `nbrPersonnes`, `dateDebut`, `dateFin`, `nbrChambres`, `typePension`, `created_at`, `updated_at`) VALUES
(3, 1, 'cash', 2, '2023-11-09', '2023-11-14', 2, 'pension-complete', '2023-11-19 21:16:45', '2023-11-19 21:16:45'),
(4, 1, 'card', 999999999, '2023-11-28', '2023-11-08', 2, 'demi-pension', '2023-11-20 14:11:56', '2023-11-20 14:11:56'),
(5, 1, 'card', 2, '2023-12-21', '2023-12-15', 3, 'pension-complete', '2023-12-10 21:00:54', '2023-12-10 21:00:54'),
(6, 1, 'card', 3, '2023-12-08', '2023-12-21', 2, 'pension-complete', '2023-12-10 21:03:51', '2023-12-10 21:03:51'),
(7, 1, 'card', 3, '2023-12-08', '2023-12-21', 2, 'pension-complete', '2023-12-10 21:05:00', '2023-12-10 21:05:00'),
(8, 1, 'cash', 1, '2023-12-27', '2024-01-06', 4, 'pension-complete', '2023-12-10 21:10:57', '2023-12-10 21:10:57'),
(9, 1, 'card', 1, '2023-11-30', '2023-12-22', 1, 'pension-complete', '2023-12-10 21:14:04', '2023-12-10 21:14:04');

-- --------------------------------------------------------

--
-- Structure de la table `small_bs`
--

CREATE TABLE `small_bs` (
  `id` int(11) NOT NULL,
  `nameS` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `descriptionS` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `produit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `small_bs`
--

INSERT INTO `small_bs` (`id`, `nameS`, `categorie`, `lieu`, `descriptionS`, `logo`, `produit`) VALUES
(1, 'test', 'test', 'test', 'test', 'WIN_20231102_22_59_34_Pro.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `idReservation` int(11) NOT NULL,
  `matricule` varchar(255) NOT NULL,
  `prixTotale` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ticket`
--

INSERT INTO `ticket` (`id`, `idReservation`, `matricule`, `prixTotale`, `created_at`, `updated_at`) VALUES
(6, 3, 'qwert', 23456.00, '2023-11-19 21:17:28', '2023-11-19 21:17:28'),
(7, 3, 'qwert', 433.00, '2023-11-19 21:18:11', '2023-11-19 21:18:11'),
(8, 5, 'R5-20231210220054', 440.00, '2023-12-10 21:01:34', '2023-12-10 21:01:34'),
(9, 6, 'R6-20231210220351', 410.00, '2023-12-10 21:04:12', '2023-12-10 21:04:12'),
(10, 7, 'R7-20231210220500', 410.00, '2023-12-10 21:05:29', '2023-12-10 21:05:29'),
(11, 8, 'R8-20231210221057', 470.00, '2023-12-10 21:11:17', '2023-12-10 21:11:17'),
(12, 9, 'R9-20231210221404', 170.00, '2023-12-10 21:14:25', '2023-12-10 21:14:25');

-- --------------------------------------------------------

--
-- Structure de la table `typelivraison`
--

CREATE TABLE `typelivraison` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `typelivraison`
--

INSERT INTO `typelivraison` (`id`, `nom`) VALUES
(1, 'type123456EDITED'),
(4, 'typexxxx');

-- --------------------------------------------------------

--
-- Structure de la table `typeoffre`
--

CREATE TABLE `typeoffre` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `typeoffre`
--

INSERT INTO `typeoffre` (`id`, `nom`, `description`, `logo`) VALUES
(1, 'maisons', 'description type maisons', '../uploads/home.png');

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
  `role_user` varchar(50) NOT NULL,
  `verified` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_user`, `nom_user`, `prenom_user`, `email_user`, `tel_user`, `adresse_user`, `username`, `password_user`, `role_user`, `verified`) VALUES
(1, 'test1', 'test', 'test@gmail.com', 12345678, 'Ghazela', 'test', '74b87337454200d4d33f80c4663dc5e5', 'ADMIN_ROLE', 0),
(2, 'aaaaEdited', 'aaaaEdited', 'aaaa@esprit.tnEdited', 2147483647, 'arianaEdited', 'yoserEdited', '098f6bcd4621d373cade4e832627b4f6', 'USER_ROLE', 0),
(12, 'SOULAIMAA', 'HLELI', 'souleima@gmail.com', 1234567890, 'aasyjhgjghhg', 'souleima', '098f6bcd4621d373cade4e832627b4f6', 'USER_ROLE', 0),
(13, 'Test', 'test', 'ilyes@gmail.com', 123456789, 'qafg', 'souleima2', '098f6bcd4621d373cade4e832627b4f6', 'ADMIN_ROLE', 0),
(14, 'salima', 'bll', 'selima', 1233445666, 'ariana soghra', 'Salima1', '8325324b47e1e62a1c2998a640cbdc72', 'USER_ROLE', 0),
(15, 'souleima', 'hleli', 'selima@gmail.com', 123456789, 'ariana soghra', 'Souleima3', '098f6bcd4621d373cade4e832627b4f6', 'USER_ROLE', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_livraison_types` (`type`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `small_bs`
--
ALTER TABLE `small_bs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ticket_reservation` (`idReservation`);

--
-- Index pour la table `typelivraison`
--
ALTER TABLE `typelivraison`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `typeoffre`
--
ALTER TABLE `typeoffre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `small_bs`
--
ALTER TABLE `small_bs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `typelivraison`
--
ALTER TABLE `typelivraison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `typeoffre`
--
ALTER TABLE `typeoffre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `fk_livraison_types` FOREIGN KEY (`type`) REFERENCES `typelivraison` (`id`);

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `offre_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `typeoffre` (`id`);

--
-- Contraintes pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `fk_ticket_reservation` FOREIGN KEY (`idReservation`) REFERENCES `reservation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
