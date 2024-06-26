-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour cinemaadam
CREATE DATABASE IF NOT EXISTS `cinemaadam` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cinemaadam`;

-- Listage de la structure de table cinemaadam. actor
CREATE TABLE IF NOT EXISTS `actor` (
  `id_actor` int NOT NULL AUTO_INCREMENT,
  `id_person` int NOT NULL,
  PRIMARY KEY (`id_actor`),
  KEY `FK_actor_person` (`id_person`),
  CONSTRAINT `FK_actor_person` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinemaadam.actor : ~5 rows (environ)
INSERT IGNORE INTO `actor` (`id_actor`, `id_person`) VALUES
	(1, 1),
	(2, 3),
	(3, 5),
	(4, 6),
	(5, 7);

-- Listage de la structure de table cinemaadam. attribut
CREATE TABLE IF NOT EXISTS `attribut` (
  `id_film` int NOT NULL,
  `id_film_genre` int NOT NULL,
  KEY `FK_attribut_film` (`id_film`),
  KEY `FK_attribut_film_genre` (`id_film_genre`),
  CONSTRAINT `FK_attribut_film` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `FK_attribut_film_genre` FOREIGN KEY (`id_film_genre`) REFERENCES `film_genre` (`id_film_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinemaadam.attribut : ~10 rows (environ)
INSERT IGNORE INTO `attribut` (`id_film`, `id_film_genre`) VALUES
	(1, 2),
	(1, 1),
	(2, 3),
	(2, 1),
	(3, 2),
	(4, 4),
	(5, 5),
	(5, 6),
	(7, 1),
	(8, 8);

-- Listage de la structure de table cinemaadam. charactere
CREATE TABLE IF NOT EXISTS `charactere` (
  `id_charactere` int NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_charactere`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinemaadam.charactere : ~10 rows (environ)
INSERT IGNORE INTO `charactere` (`id_charactere`, `role_name`) VALUES
	(1, 'Ariane'),
	(2, 'Cobb'),
	(3, 'Tess'),
	(4, 'Neo'),
	(5, 'Trinity'),
	(6, 'Wick'),
	(7, 'Constantine'),
	(8, 'Amanda'),
	(9, 'Viviane'),
	(10, 'Donaka');

-- Listage de la structure de table cinemaadam. director
CREATE TABLE IF NOT EXISTS `director` (
  `id_director` int NOT NULL AUTO_INCREMENT,
  `id_person` int NOT NULL,
  PRIMARY KEY (`id_director`),
  KEY `id_person` (`id_person`),
  CONSTRAINT `FK_director_person` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinemaadam.director : ~8 rows (environ)
INSERT IGNORE INTO `director` (`id_director`, `id_person`) VALUES
	(1, 2),
	(2, 4),
	(6, 6),
	(3, 8),
	(4, 9),
	(5, 10),
	(7, 11),
	(8, 12);

-- Listage de la structure de table cinemaadam. film
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '',
  `duration` int NOT NULL DEFAULT '0',
  `synopsis` text NOT NULL,
  `ranking` decimal(20,6) NOT NULL DEFAULT '0.000000',
  `publication` year NOT NULL,
  `id_director` int NOT NULL,
  PRIMARY KEY (`id_film`),
  KEY `FK_film_director` (`id_director`),
  CONSTRAINT `FK_film_director` FOREIGN KEY (`id_director`) REFERENCES `director` (`id_director`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinemaadam.film : ~8 rows (environ)
INSERT IGNORE INTO `film` (`id_film`, `title`, `duration`, `synopsis`, `ranking`, `publication`, `id_director`) VALUES
	(1, 'Inception', 148, 'Dom Cobb est un voleur d\'un genre particulier : grâce à une technologie spéciale, il pénètre les rêves des gens pour dérober leurs secrets les plus précieux. Ses compétences en ont fait un atout précieux dans l\'espionnage industriel, mais elles lui ont aussi coûté tout ce qu\'il aimait. Cobb se voit offrir une chance de rédemption lorsque Saito, un puissant homme d\'affaires, lui propose une mission apparemment impossible : l\'Inception. Au lieu de voler une idée, il doit implanter une idée dans l\'esprit d\'une cible, Robert Fischer, l\'héritier d\'un empire industriel. Si Cobb et son équipe réussissent, il pourra enfin retrouver sa vie normale. Cependant, l\'opération se révèle beaucoup plus complexe et dangereuse qu\'ils ne l\'avaient imaginé, car ils doivent naviguer à travers plusieurs niveaux de rêves tout en affrontant leurs propres démons.', 4.500000, '2010', 1),
	(2, 'Ocean Eleven', 119, 'Des voleur de banque de casino vont faire un grand coup', 4.500000, '2001', 2),
	(3, 'Matrix', 136, 'informatique + Elu + love + machine', 3.900000, '1999', 3),
	(4, 'John Wick', 101, 'Pistolet + combat + meurtre', 4.900000, '2024', 4),
	(5, 'Constantine', 121, 'Demon + ange + regligion', 2.500000, '2005', 5),
	(6, 'Man of Tai Chi', 105, 'art martial + chine + combat', 1.500000, '2013', 6),
	(7, 'Leave the world Behind', 141, 'famille + drame', 5.000000, '2023', 7),
	(8, 'Pretty Woman', 119, 'femme + amour  + riche', 0.100000, '1990', 8);

-- Listage de la structure de table cinemaadam. film_genre
CREATE TABLE IF NOT EXISTS `film_genre` (
  `id_film_genre` int NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_film_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinemaadam.film_genre : ~8 rows (environ)
INSERT IGNORE INTO `film_genre` (`id_film_genre`, `genre_name`) VALUES
	(1, 'Thriller'),
	(2, 'S-F'),
	(3, 'Comedy'),
	(4, 'Action'),
	(5, 'Fantastic'),
	(6, 'Horror'),
	(7, 'Post-apo'),
	(8, 'Romantic');

-- Listage de la structure de table cinemaadam. person
CREATE TABLE IF NOT EXISTS `person` (
  `id_person` int NOT NULL AUTO_INCREMENT,
  `last_name` text NOT NULL,
  `first_name` text NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  PRIMARY KEY (`id_person`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinemaadam.person : ~12 rows (environ)
INSERT IGNORE INTO `person` (`id_person`, `last_name`, `first_name`, `birthday`, `gender`) VALUES
	(1, 'Page', 'Elliot', '1987-02-21', 'male'),
	(2, 'Nolan', 'Christopher', '1970-07-30', 'male'),
	(3, 'DiCaprio', 'Leonardo', '1974-11-11', 'male'),
	(4, 'Soderbergh', 'Steven', '1963-01-14', 'male'),
	(5, 'Roberts', 'Julia', '1967-10-28', 'female'),
	(6, 'Reeves', 'Keanu', '1964-09-02', 'male'),
	(7, 'Moss', 'Carrie-Anne', '1967-08-21', 'female'),
	(8, 'Wachowski', 'Sisster', '1967-12-09', 'female'),
	(9, 'Stahelski', 'Chad', '1968-09-20', 'male'),
	(10, 'Lawrence', 'Francis', '1971-03-26', 'male'),
	(11, 'Esmail', 'Sam', '1977-09-17', 'male'),
	(12, 'Marshall', 'Garry', '1934-11-13', 'male');

-- Listage de la structure de table cinemaadam. play
CREATE TABLE IF NOT EXISTS `play` (
  `id_film` int NOT NULL,
  `id_charactere` int NOT NULL,
  `id_actor` int NOT NULL,
  KEY `FK_play_film` (`id_film`),
  KEY `FK_play_charactere` (`id_charactere`),
  KEY `FK_play_actor` (`id_actor`),
  CONSTRAINT `FK_play_actor` FOREIGN KEY (`id_actor`) REFERENCES `actor` (`id_actor`),
  CONSTRAINT `FK_play_charactere` FOREIGN KEY (`id_charactere`) REFERENCES `charactere` (`id_charactere`),
  CONSTRAINT `FK_play_film` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinemaadam.play : ~10 rows (environ)
INSERT IGNORE INTO `play` (`id_film`, `id_charactere`, `id_actor`) VALUES
	(1, 1, 1),
	(1, 2, 2),
	(2, 3, 3),
	(3, 4, 4),
	(3, 5, 5),
	(4, 6, 4),
	(5, 7, 4),
	(7, 8, 3),
	(8, 9, 3),
	(6, 10, 4);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
