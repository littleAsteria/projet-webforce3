-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 20 Juillet 2017 à 17:15
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `game`
--

CREATE DATABASE IF NOT EXISTS game;

USE game;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(11) NOT NULL,
  `pseudo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `mdp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `score` int(15) NOT NULL DEFAULT '0',
  `statut_membre` enum('0','1') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `id_question` int(11) NOT NULL,
  `question` text COLLATE utf8_unicode_ci NOT NULL,
  `reponse_a` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reponse_b` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reponse_c` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reponse_d` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bonne_reponse` enum('a','b','c','d') COLLATE utf8_unicode_ci NOT NULL,
  `niveau` int(2) NOT NULL,
  `statut_question` enum('0','1') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `question`
--

INSERT INTO `question` (`id_question`, `question`, `reponse_a`, `reponse_b`, `reponse_c`, `reponse_d`, `bonne_reponse`, `niveau`, `statut_question`) VALUES
(1, 'Quelle expression utilise-t-on lorsque quelque chose nous paraît suspect ?', 'Il y a baleine sous gravillon', 'Il y a crabe sous caillou', 'Il y a anguille sous roche', 'Il y a poisson sous rocher', 'c', 1, '1'),
(2, 'Comment s''appelle l''auteur des deux minutes du peuple ?', 'Alexis Thomas', 'François Pérusse', 'John Lang', 'Emmanuel Durand', 'b', 5, '1'),
(3, 'Laquelle de ces propositions désigne un coquillage comestible ?', 'Bigoudi', 'Boléro', 'Biguine', 'Bigorneau', 'd', 2, '1'),
(4, 'Aux Etats-Unis, Hollywood est une ville dédiée à l''industrie . .', 'De la chaussure', 'Cinématographique', 'Du jeu vidéo', 'Automobile', 'b', 1, '1'),
(5, 'Une maison dans laquelle des religieuses vivent en communauté est ...', 'Une caserne', 'Un club', 'Une caverne', 'Un couvent', 'd', 1, '1'),
(6, 'Le rock est un style de musique, mais dans les contes orientaux, il désigne aussi un fabuleux ...', 'Tigre', 'Oiseau', 'Serpent', 'Cheval', 'b', 10, '1'),
(7, 'Combien l''Everest mesure-t-il ?', '9 786 m', '8 848 m', '7 502 m', '5 448 m', 'b', 6, '1'),
(8, 'Où fait-on pousser de jeunes arbres destinés à être transplantés ?', 'Dans un verger', 'Dans un potager', 'Dans une jardinière', 'Dans une pépinière', 'd', 3, '1'),
(9, 'Comment appelle-t-on la spécialité japonaise à base de riz et de poisson enroulés dans une feuille d''algue ?', 'Maki', 'Sushi', 'Sashimi', 'Rouleau de Printemps', 'a', 3, '1'),
(10, 'Quel est l''autre nom du globule blanc ?', 'Ostéoblaste', 'Gamète', 'Leucocyte', 'Hématie', 'c', 4, '1'),
(11, 'Dans lequel de ces pays africains la langue officielle est-elle le portugais ?', 'Kenya', 'Congo', 'Angola', 'Ouganda', 'c', 7, '1'),
(12, 'Quel champignon est appelé également ''lépiote élevée'' ?', 'La morille', 'La truffe', 'La coulemelle', 'Le cèpe', 'c', 9, '1'),
(13, 'Quel était le métier de Mahatma Gandhi ?', 'Tisseur', 'Médecin', 'Avocat', 'Instituteur', 'c', 8, '1'),
(14, 'Que trouve-t-on dans la plupart des jardins ?', 'Des tuyaux d''affichage', 'Des tuyaux d''allumage', 'Des tuyaux d''atterrissage', 'Des tuyaux d''arrosage', 'd', 1, '1'),
(15, 'Combien d''enfants Louis XVI avait-il ?', 'Quatre', 'Cinq', 'Six', 'Sept', 'a', 6, '1'),
(16, 'Parmi ces fruits, lequel possède un noyau ?', 'La pomme', 'La cerise', 'La poire', 'L''orange', 'b', 2, '1'),
(17, 'A quelle altitude est placé un satellite en orbite géostationnaire ?', '35800 km', '28500 km', '16700 km', '12000 km', 'a', 8, '1'),
(18, 'Un dirigeant est un ploutocrate si il est ?', 'Insignifiant', 'Riche', 'Intelligent', 'Naïf', 'b', 6, '1'),
(19, 'Comment appelle-t-on les habitants de Pontault-Combault ?', 'Les Pontaullois combolais', 'Les Pontault comboliens', 'Les Pontellois combalusiens', 'Les Pontois combauliens', 'c', 9, '1'),
(20, 'Qu''indiquent les points des coccinelles ?', 'Leur espèce', 'Leur longueur', 'Leur âge', 'Leur sexe', 'c', 3, '1');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
