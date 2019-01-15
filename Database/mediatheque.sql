-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 13 jan. 2019 à 23:51
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mediatheque`
--
CREATE DATABASE IF NOT EXISTS `mediatheque` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `mediatheque`;
-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `RefCat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `categorie` varchar(40) COLLATE utf8_bin NOT NULL,
  `ImgCat` varchar(20) COLLATE utf8_bin NOT NULL,
  KEY `RefCat` (`RefCat`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`RefCat`, `categorie`, `ImgCat`) VALUES
(1, 'Drame', '1.png'),
(2, 'Comédie', '2.png'),
(3, 'Thriller', '3.png'),
(4, 'Action', '4.png'),
(5, 'Horreur', '5.png'),
(6, 'Science-Fiction', '6.png');

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) COLLATE utf8_bin NOT NULL,
  `duree` int(10) NOT NULL,
  `resume` varchar(500) COLLATE utf8_bin NOT NULL,
  `realisateur` varchar(40) COLLATE utf8_bin NOT NULL,
  `RefCat` int(10) NOT NULL,
  `img` varchar(200) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id`, `nom`, `duree`, `resume`, `realisateur`, `RefCat`, `img`) VALUES
(1, 'Fight Club', 151, 'Le narrateur, sans identité précise, vit seul, travaille seul, dort seul, mange seul ses plateaux-repas pour une personne comme beaucoup d`autres personnes seules qui connaissent la misère humaine, morale et sexuelle.', 'David Fincher', 1, 'https://m.media-amazon.com/images/M/MV5BMjJmYTNkNmItYjYyZC00MGUxLWJhNWMtZDY4Nzc1MDAwMzU5XkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_.jpg'),
(2, 'Inglourious Basterds', 153, 'Dans la France occupée de 1940, Shosanna Dreyfus assiste à l`exécution de sa famille tombée entre les mains du colonel nazi Hans Landa.', 'Quentin Tarantino', 1, 'https://isteam.wsimg.com/neb/obj/MUFEODgyOEZCQUNBMjVFQjVGQjE6OWZlY2I5OGJkNTZhNzcwMzhjYjQxNTYyMWEzZWE2MGI6Ojo6OjA=/:/rs=w:600,h:600'),
(4, 'Intouchables', 107, 'A la suite d`un accident de parapente, Philippe, riche aristocrate, engage comme aide à domicile Driss, un jeune de banlieue tout juste sorti de prison… ', 'Eric Toledano', 2, 'https://www.thomann.de/pics/bdb/280473/11762455_800.jpg'),
(6, 'Gravity', 91, 'Pour sa première expédition à bord d`une navette spatiale, le docteur Ryan Stone, brillante experte en ingénierie médicale, accompagne l`astronaute chevronné Matt Kowalsky qui effectue son dernier vol avant de prendre sa retraite.', 'Alfonso Cuarón', 3, 'http://fr.web.img4.acsta.net/r_1280_720/pictures/210/411/21041126_20130917181840774.jpg'),
(7, 'Gladiator', 171, 'Le général romain Maximus est le plus fidèle soutien de l`empereur Marc Aurèle, qu`il a conduit de victoire en victoire avec une bravoure et un dévouement exemplaires.', 'Ridley Scott', 4, 'https://is1-ssl.mzstatic.com/image/thumb/Video71/v4/85/1c/82/851c823f-271e-877f-21ef-766b29f3a3a6/mzm.gjakfclu.lsr/268x0w.png'),
(8, 'Django Unchained', 165, 'Le parcours d`un chasseur de prime allemand et d`un homme noir pour retrouver la femme de ce dernier retenue en esclavage par le propriï¿½taire d`une plantation...', 'Quentin Tarantino', 4, 'https://cdn-s-www.republicain-lorrain.fr/images/36776e02-4297-454f-a6da-0a27f3e1144c/BES_06/illustration-django-unchained_1-1531087962.jpg'),
(9, 'Old Boy', 120, 'À la fin des années 80, Oh Dae-Soo, père de famille sans histoire, est enlevé un jour devant chez lui.', 'Park Chan-wook', 5, 'http://fr.web.img6.acsta.net/c_215_290/medias/nmedia/18/35/24/25/18383433.jpg'),
(11, 'Retour vers le futur', 154, '1985. Le jeune Marty McFly mène une existence anonyme auprès de sa petite amie Jennifer, seulement troublée par sa famille en crise et un proviseur qui serait ravi de l`expulser du lycée.', 'Robert Zemeckis', 6, 'http://fr.web.img3.acsta.net/c_215_290/medias/nmedia/18/35/91/26/18686482.jpg'),
(12, 'Inception', 148, 'Dom Cobb est un voleur expérimenté – le meilleur qui soit dans l`art périlleux de l`extraction : sa spécialité consiste à s`approprier les secrets les plus précieux d`un individu', 'Christopher Nolan', 6, 'http://img.over-blog-kiwi.com/0/66/79/72/20150125/ob_2485e6_inception-7205.jpg'),
(13, 'Aquaman', 144, 'Les origines dâ€™un hÃ©ros malgrÃ© lui, dont le destin est dâ€™unir deux mondes opposÃ©s, la terre et la mer. Cette histoire Ã©pique est celle dâ€™un homme ordinaire destinÃ© Ã  devenir le roi des Sept Mers', 'James Wan', 4, 'http://fr.web.img6.acsta.net/pictures/18/12/13/12/12/2738771.jpg'),
(14, 'CREED II', 120, 'La vie est devenue un numÃ©ro d\'Ã©quilibriste pour Adonis Creed. Entre ses obligations personnelles et son entraÃ®nement pour son prochain grand match, il est Ã  la croisÃ©e des chemins.', 'Steven Caple Jr.', 1, 'http://fr.web.img6.acsta.net/c_215_290/pictures/18/11/27/14/25/1451897.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `informations`
--

DROP TABLE IF EXISTS `informations`;
CREATE TABLE IF NOT EXISTS `informations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(40) COLLATE utf8_bin NOT NULL,
  `password` varchar(16) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `informations`
--

INSERT INTO `informations` (`id`, `email`, `password`) VALUES
(3, 'test@test.com', 'test');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
