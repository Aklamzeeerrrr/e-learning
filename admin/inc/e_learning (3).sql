-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 16 mai 2020 à 05:18
-- Version du serveur :  5.7.24
-- Version de PHP : 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `e_learning`
--

-- --------------------------------------------------------

--
-- Structure de la table `apropos`
--

CREATE TABLE `apropos` (
  `a_id` int(10) NOT NULL,
  `apropos` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `apropos`
--

INSERT INTO `apropos` (`a_id`, `apropos`) VALUES
(2, 'Nous sommes un jeune groupe detudiants qualifies qui concevons des sites web dynamiques rien que vous avec aussi des bonbons!');

-- --------------------------------------------------------

--
-- Structure de la table `cat`
--

CREATE TABLE `cat` (
  `cat_id` int(10) NOT NULL,
  `cat_name` text NOT NULL,
  `cat_icone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cat`
--

INSERT INTO `cat` (`cat_id`, `cat_name`, `cat_icone`) VALUES
(7, 'Design', '<i class=\"fas fa-crop\"></i>'),
(8, 'Marketing', '<i class=\"fas fa-bezier-curve\"></i>'),
(9, 'Business', '<i class=\"fas fa-business-time\"></i>'),
(10, 'Cooking', '<i class=\"fas fa-concierge-bell\"></i>'),
(12, 'Developpements ', '<i class=\"fas fa-code\"></i>');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `con_id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `add1` varchar(100) NOT NULL,
  `add2` varchar(100) NOT NULL,
  `yt` varchar(20) NOT NULL,
  `fb` varchar(20) NOT NULL,
  `gp` varchar(20) NOT NULL,
  `tw` varchar(20) NOT NULL,
  `link` varchar(20) NOT NULL,
  `tel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`con_id`, `email`, `add1`, `add2`, `yt`, `fb`, `gp`, `tw`, `link`, `tel`) VALUES
(1, 'aklamcode29@gmail.com', 'Cote dIvoire, Abidjan, Yopougon', ' Abidjan,Yopougon', 'aklamcode', '?_rdc=2&_rdr', 'AklamCode', 'aklamzeeerrrr29', 'armelk29', '+225 03892089');

-- --------------------------------------------------------

--
-- Structure de la table `faqs`
--

CREATE TABLE `faqs` (
  `q_id` int(10) NOT NULL,
  `qsn` varchar(500) NOT NULL,
  `rep` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `faqs`
--

INSERT INTO `faqs` (`q_id`, `qsn`, `rep`) VALUES
(3, 'Comment pourrais-je payer', 'Via paypal'),
(4, 'ztqsfncx j;,f', 'gubrjkdv'),
(5, 'Ou puis-je trouver mes achats', 'sur votre profile et le mien aussi'),
(6, 'fhfhfhfhfh', 'qqqqfffff');

-- --------------------------------------------------------

--
-- Structure de la table `lang`
--

CREATE TABLE `lang` (
  `lang_id` int(10) NOT NULL,
  `lang_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lang`
--

INSERT INTO `lang` (`lang_id`, `lang_name`) VALUES
(2, 'css'),
(3, 'react native');

-- --------------------------------------------------------

--
-- Structure de la table `sous_cat`
--

CREATE TABLE `sous_cat` (
  `sous_cat_id` int(11) NOT NULL,
  `sous_cat_name` varchar(100) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sous_cat`
--

INSERT INTO `sous_cat` (`sous_cat_id`, `sous_cat_name`, `cat_id`) VALUES
(3, 'illustrator', 7),
(8, 'Flutterr', 2);

-- --------------------------------------------------------

--
-- Structure de la table `term`
--

CREATE TABLE `term` (
  `t_id` int(10) NOT NULL,
  `term` varchar(100) NOT NULL,
  `pour_qui` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `term`
--

INSERT INTO `term` (`t_id`, `term`, `pour_qui`) VALUES
(2, 'Ils doivient reversÃ© 50% de leur revevus au site web', 'Professeur'),
(3, 'pzopfsoezjdpOSJFPO', 'Etudiant'),
(4, 'Les Ã©tudiants doivent avoir un compte paypal', 'Etudiant');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `apropos`
--
ALTER TABLE `apropos`
  ADD PRIMARY KEY (`a_id`);

--
-- Index pour la table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`con_id`);

--
-- Index pour la table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`q_id`);

--
-- Index pour la table `lang`
--
ALTER TABLE `lang`
  ADD PRIMARY KEY (`lang_id`);

--
-- Index pour la table `sous_cat`
--
ALTER TABLE `sous_cat`
  ADD PRIMARY KEY (`sous_cat_id`);

--
-- Index pour la table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `apropos`
--
ALTER TABLE `apropos`
  MODIFY `a_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `cat`
--
ALTER TABLE `cat`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `con_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `q_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `lang`
--
ALTER TABLE `lang`
  MODIFY `lang_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `sous_cat`
--
ALTER TABLE `sous_cat`
  MODIFY `sous_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `term`
--
ALTER TABLE `term`
  MODIFY `t_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
