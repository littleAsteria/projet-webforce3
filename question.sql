-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 25 Juillet 2017 à 11:31
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

USE game;

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
(20, 'Qu''indiquent les points des coccinelles ?', 'Leur espèce', 'Leur longueur', 'Leur âge', 'Leur sexe', 'c', 3, '1'),
(21, 'De quelle génération de Pokémon Doduo est-il issu ?', 'La première', 'La deuxième', 'La troisième', 'La quatrième', 'a', 7, '1'),
(22, 'De ces grandes batailles Napoléoniennes, laquelle est la plus récente ?', 'Austerlitz', 'Iéna', 'Marengo', 'Wagram', 'd', 10, '1'),
(23, 'Dans quel film Bourvil incarne-t-il Antoine Maréchal ?', 'La Grande Vadrouille', 'Le Corniaud', 'Le Cercle rouge', 'Le Cerveau', 'b', 8, '1'),
(24, 'Qui a introduit la stérilisation des instruments chirurgicaux ?', 'Robert Koch', 'Edward Jenner', 'Sir Alexander Fleming', 'Joseph Lister', 'd', 10, '1'),
(25, 'Que signifie l''expression québecoise "Tire-toi une bûche" ?', 'Fais attention à la marche !', 'Pars et ne reviens jamais !', 'Viens t''asseoir !', 'Va faire chauffer du bois !', 'c', 7, '1'),
(26, 'Dans une ferme quels animaux loge-t-on dans le poulailler ?', 'Les poux', 'Les poulains', 'Les poulpes', 'Les poules', 'd', 1, '1'),
(27, 'Dans un livre de cuisine, on ne peut pas trouver la recette du…', 'Canard à l''orange', 'Canard enchaîné', 'Confit de canard', 'Canard laqué', 'b', 2, '1'),
(28, 'Qui est la déesse romaine de la sagesse ?', 'Minerve', 'Prothèse', 'Attelle', 'Béquille', 'a', 2, '1'),
(29, 'À la Maison Blanche, quel est le surnom du bureau dans lequel travaille le président ?', 'Bureau rectangulaire', 'Bureau carré', 'Bureau arrondi', 'Bureau ovale', 'd', 2, '1'),
(30, 'Sur la Lune, si on lâche simultanément une plume et un marteau de la même hauteur...', 'La plume arrive en 1er', 'Le marteau arrive en 1er', 'Ils arrivent ensemble', 'Ils flottent', 'c', 3, '1'),
(31, 'Sur une automobile, à quel dispositif l''overdrive est-il lié ?', 'La boîte de vitesses', 'La suspension', 'La carburation', 'Le freinage', 'a', 3, '1'),
(32, 'Quel héros de la mythologie grecque décapita la terrible Méduse ?', 'Hector', 'Orphée', 'Achille', 'Persée', 'd', 4, '1'),
(33, 'L''oniromancie est un procédé de divination par :', 'Les lignes du pied', 'Les pierres', 'L''iris de l''oeil', 'Les rêves', 'd', 4, '1'),
(34, 'En quelle année a été lancé l''Eurostar ?', '1994', '1996', '1998', '2000', 'a', 4, '1'),
(35, 'En 1946, quel homme politique lança l''expression "rideau de fer " ?', 'Charles de Gaulle', 'Joseph Staline', 'Winston Churchill', 'Franklin Roosevelt', 'c', 4, '1'),
(36, 'Combien de licences de jeux la société Blizzard Entertainment  possède-t-elle ?', 'Une', 'Deux', 'Trois ', 'Quatre', 'd', 5, '1'),
(37, 'Quelle est la capitale de la Lettonie ?', 'Vilnius', 'Riga', 'Tallinn', 'Kiev', 'b', 6, '1'),
(38, 'Quel animal (réel ou fictif) porte malheur pour les marins ?', 'Le lapin', 'Le mouton', 'La sirène', 'Le requin', 'a', 5, '1'),
(39, 'Qu''est-ce qu''un Bombax ?', 'Un arbre', 'Un poisson', 'Un lézard', 'Un oiseau', 'a', 5, '1'),
(40, 'Quel était le plus grand bateau de Christophe Colomb ?', 'La Nina', 'La Santa-Maria', 'La Pinta', 'Le HMS Victory', 'b', 5, '1'),
(41, 'Qui a composé la Marseillaise ?', 'Truite de Bordo', 'Sole de Lion', 'Mérou de Marseille', 'Rouget de Lisle', 'd', 7, '1'),
(42, 'Quel fleuve traverse la ville de Verdun ?', 'Le Rhin', 'le Rhône', 'La Meuse', 'La Moselle', 'c', 6, '1'),
(43, 'Dans quelle ville Jules Verne est-il né ?', 'Angers', 'Laval', 'Lorient', 'Nantes', 'd', 7, '1'),
(44, 'Quel oiseau parcourt la plus grande distance au monde ?', 'La Sterne Arctique', 'L''Hirondelle', 'Le Fou de Bassan', 'La Cigogne', 'a', 8, '1'),
(45, 'En quelle année Astérix a-t-il vu le jour ?', '1950', '1959', '1960', '1969', 'b', 8, '1'),
(46, 'Les diomedeidae sont plus connus sous le nom de :', 'Goélands argentés', 'Vautours', 'Albatros', 'Aigles royaux', 'c', 9, '1'),
(47, 'Quel philosophe a écrit " Les origines du totalitarisme " et " La crise de la culture " ?\r\n', 'John Dewey', 'Edmund Husserl', 'Hannah Arendt', 'Henri Bergson', 'c', 9, '1'),
(48, 'Qui a composé la musique de Game of Thrones ?', 'Hans Zimmer', 'James Newton Howard', 'Ramin Djawadi', 'James Horner', 'c', 9, '1'),
(49, 'Dans quelle mer se jette le fleuve Méandre ?', 'La mer noire', 'La mer Égée', 'La mer Caspienne', 'La mer Adriatique', 'b', 10, '1'),
(50, '“Il ira loin, il croit tout ce qu’il dit”. De qui parle Mirabeau ?', 'Napoléon', 'Robespierre', 'Talleyrand', 'Fouché', 'b', 10, '1');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
