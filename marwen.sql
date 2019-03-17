-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Dim 17 Mars 2019 à 13:31
-- Version du serveur :  5.7.25-0ubuntu0.18.04.2
-- Version de PHP :  7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `marwen`
--

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE `chambre` (
  `id` int(11) NOT NULL,
  `typeChambre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nbrLits` int(11) NOT NULL,
  `PrixChambre` double NOT NULL,
  `hotel_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `chambre`
--

INSERT INTO `chambre` (`id`, `typeChambre`, `nbrLits`, `PrixChambre`, `hotel_id`) VALUES
(7, 'chambre', 222, 2222, 7),
(8, 'type 1', 2, 2, 8);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `offre_id` int(11) DEFAULT NULL,
  `nomClient` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenomClient` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telClient` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `addresseClient` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emailClient` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `offre_id`, `nomClient`, `prenomClient`, `telClient`, `addresseClient`, `ville`, `emailClient`) VALUES
(7, 8, 'marwen', 'marwen', '111', 'tunis', 'tunis', 'marwen@yopmail.com'),
(8, 9, 'MARWEN', 'sami', '94200075', 'mabouba', 'tunis1', 'marwen@yohmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `nbrEtoile` int(11) NOT NULL,
  `villeHotel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `offre_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `hotel`
--

INSERT INTO `hotel` (`id`, `nbrEtoile`, `villeHotel`, `offre_id`) VALUES
(7, 11, 'tunis', 8),
(8, 3, 'soussa', 9);

-- --------------------------------------------------------

--
-- Structure de la table `offre_voyage`
--

CREATE TABLE `offre_voyage` (
  `id` int(11) NOT NULL,
  `prixOffre` double NOT NULL,
  `nbrPlaceOffre` int(11) NOT NULL,
  `isActive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `offre_voyage`
--

INSERT INTO `offre_voyage` (`id`, `prixOffre`, `nbrPlaceOffre`, `isActive`) VALUES
(8, 222, 222, 1),
(9, 10, 5, 0);

-- --------------------------------------------------------

--
-- Structure de la table `transport`
--

CREATE TABLE `transport` (
  `id` int(11) NOT NULL,
  `NomCompagne` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateDepart` datetime NOT NULL,
  `PrixTransport` double NOT NULL,
  `villeArrive` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `villeDepart` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `offre_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `transport`
--

INSERT INTO `transport` (`id`, `NomCompagne`, `dateDepart`, `PrixTransport`, `villeArrive`, `villeDepart`, `offre_id`) VALUES
(7, 'snt', '2014-01-01 00:00:00', 2222, 'tunis', 'tunis', 8),
(8, 'snt', '2017-01-01 00:00:00', 250, 'hammamet', 'tunis', 9);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(1, 'marwen', 'marwen', 'marwen@yopmail.com', 'marwen@yopmail.com', 1, NULL, '$2y$13$fJjk.zd1XnhbUmwBQcqRnOxjBMblSOlkJaWhXJL8Z0gCNq.q.5dim', '2019-03-16 14:45:30', NULL, NULL, 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C509E4FF3243BB18` (`hotel_id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C74404554CC8505A` (`offre_id`);

--
-- Index pour la table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3535ED94CC8505A` (`offre_id`);

--
-- Index pour la table `offre_voyage`
--
ALTER TABLE `offre_voyage`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_66AB212E4CC8505A` (`offre_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1483A5E992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_1483A5E9A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_1483A5E9C05FB297` (`confirmation_token`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `offre_voyage`
--
ALTER TABLE `offre_voyage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `transport`
--
ALTER TABLE `transport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD CONSTRAINT `FK_C509E4FF3243BB18` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`);

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `FK_C74404554CC8505A` FOREIGN KEY (`offre_id`) REFERENCES `offre_voyage` (`id`);

--
-- Contraintes pour la table `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `FK_3535ED94CC8505A` FOREIGN KEY (`offre_id`) REFERENCES `offre_voyage` (`id`);

--
-- Contraintes pour la table `transport`
--
ALTER TABLE `transport`
  ADD CONSTRAINT `FK_66AB212E4CC8505A` FOREIGN KEY (`offre_id`) REFERENCES `offre_voyage` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
