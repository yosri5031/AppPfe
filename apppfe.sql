-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 06 juil. 2021 à 20:53
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `apppfe`
--

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`id`, `name`, `department_id`) VALUES
(1, 'LBC1', 101),
(2, 'LBC2', 101),
(3, 'LBC3', 101),
(4, 'LCS1', 101),
(5, 'LCS2', 101),
(6, 'LCS3', 101),
(7, 'LCE1', 101),
(8, 'LCE2', 103),
(9, 'LCE3', 102),
(10, 'TSD1', 102),
(11, 'TSD2', 102),
(12, 'MER1', 102),
(13, 'MER2', 102);

-- --------------------------------------------------------

--
-- Structure de la table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(101, 'informatique'),
(102, 'physique'),
(103, 'mathématique');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210530143246', '2021-05-30 17:00:48', 387),
('DoctrineMigrations\\Version20210601152328', '2021-06-01 17:39:22', 627),
('DoctrineMigrations\\Version20210606122716', '2021-06-06 14:29:32', 2959),
('DoctrineMigrations\\Version20210606192538', '2021-06-06 21:27:19', 2575),
('DoctrineMigrations\\Version20210606193145', '2021-06-06 21:32:36', 1726),
('DoctrineMigrations\\Version20210607104525', '2021-06-07 12:46:44', 1535),
('DoctrineMigrations\\Version20210610095322', '2021-06-10 11:54:40', 1445),
('DoctrineMigrations\\Version20210610095618', '2021-06-10 11:56:33', 674),
('DoctrineMigrations\\Version20210610122104', '2021-06-10 14:22:18', 2049),
('DoctrineMigrations\\Version20210610122323', '2021-06-10 14:23:34', 323),
('DoctrineMigrations\\Version20210611091635', '2021-06-11 11:17:28', 2152),
('DoctrineMigrations\\Version20210611092425', '2021-06-11 11:24:42', 2095),
('DoctrineMigrations\\Version20210616180344', '2021-06-16 20:04:09', 1841);

-- --------------------------------------------------------

--
-- Structure de la table `enseignant_matiere`
--

CREATE TABLE `enseignant_matiere` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `matiere_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classe_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `semestre_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`id`, `name`, `classe_id`, `user_id`, `semestre_id`) VALUES
(1, 'Statistique & Probabilités', 1, 1, 5),
(2, 'Principes de geston', 1, 2, 5),
(3, 'Comptabilité Générale', 1, 2, 5),
(4, 'Business Communication', 2, 3, 5),
(5, 'Organisation de entreprise', 3, 1, 5),
(6, 'Développement IHM', 8, 3, 5),
(7, 'Systèmes d\'exploitation', 6, 1, 5),
(8, 'Algo Struct de Données', 3, 1, 6),
(9, 'Système Logique &Architecture', 7, 2, 6),
(10, 'Compétances Numérique', 7, 3, 6),
(11, 'Analyse', 7, 1, 6),
(12, 'Economie générale', 3, 2, 6),
(13, 'mathémathique', 5, 1, 6),
(14, 'physique', 1, 2, 6),
(15, 'Statistique & Probabilités', 1, 2, 6);

-- --------------------------------------------------------

--
-- Structure de la table `periodes`
--

CREATE TABLE `periodes` (
  `id` int(11) NOT NULL,
  `annee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semestre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `periodes`
--

INSERT INTO `periodes` (`id`, `annee`, `semestre`, `courante`) VALUES
(1, '2019-2018', 's1-2019', 0),
(2, '2019-2018', 's2-2019', 0),
(3, '2020-2019', 's1-2020', 0),
(4, '2020-2019', 's2-2020', 0),
(5, '2021-2020', 's1-2021', 1),
(6, '2021-2020', 's2-2021', 1);

-- --------------------------------------------------------

--
-- Structure de la table `questionnaire`
--

CREATE TABLE `questionnaire` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sujet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `questionnaire`
--

INSERT INTO `questionnaire` (`id`, `titre`, `sujet`) VALUES
(1, '1.Avant le début de la session, mon niveau de motivation pour le contenu de ce cours ', 'Questions d’ordre général'),
(2, '2.le moyen d\'assistance dans ce cours ', 'Questions d’ordre général'),
(3, '3.Dans ce cours, j’ai investi un niveau d’effort ', 'Questions d’ordre général'),
(4, '4.Le professeur nous demande une charge de travail insufficent(1*) \r\n    ou plus grande(5*) que ce qui est prévu pour ce cours:', 'Planification'),
(5, '5.Le professeur répartit bien le contenu du cours sur l’ensemble de la session (ou sur le nombre de\r\n     semaines prévu pour ce cours)', 'Planification'),
(6, '6.Le professeur répartit bien les activités d’évaluation sommative dans la session', 'Planification'),
(7, '7.Le professeur a présenté clairement le plan de cours au début de la session', 'Environnement pédagogique'),
(8, '8.Le professeur contribue à créer un climat qui favorise l’apprentissage en classe', 'Environnement pédagogique'),
(9, '9.Le professeur donne ses cours de façon structurée', 'Environnement pédagogique'),
(10, '10.Le professeur garde bien le contrôle de son groupe', 'Environnement pédagogique'),
(11, '11.Le professeur maîtrise bien le contenu de son cours', 'Maîtrise du contenu et clarté'),
(12, '12.Le professeur utilise des exemples pertinents qui facilitent les apprentissages visés', 'Maîtrise du contenu et clarté'),
(13, '13.Le professeur sait rendre compréhensibles des notions techniques, complexes ou abstraites', 'Maîtrise du contenu et clarté'),
(14, '14.Le professeur répond de manière claire et satisfaisante aux questions des étudiants', 'Maîtrise du contenu et clarté'),
(15, '15.Le professeur fait ressortir les points importants du cours lors de son enseignement', 'Stratégies pédagogiques'),
(16, '16.Le professeur utilise des méthodes pédagogiques qui favorisent mes apprentissages', 'Stratégies pédagogiques'),
(17, '17.Le professeur utilise des méthodes pédagogiques qui soutiennent mon intérêt', 'Stratégies pédagogiques'),
(18, '18.Le professeur respecte les délais prévus  pour la remise aux étudiants des résultats des travaux ou des examens', 'Évaluation des apprentissages'),
(19, '19.Le professeur nous fait régulièrement des commentaires sur nos forces et nos points à améliorer', 'Évaluation des apprentissages'),
(20, 'Le professeur prévoit des activités d’évaluation sommative (examens, projets, travaux, etc.) qui correspondent aux compétences visées par ce cours', 'Évaluation des apprentissages'),
(21, '21.Le professeur formule sur  les travaux corrigés des commentaires qui m’aident à progresser', 'Évaluation des apprentissages'),
(22, '22.Le professeur est ouvert aux suggestions des étudiants sur son cours', 'Relation pédagogique, encadrement et disponibilité'),
(23, '23.Le professeur fait preuve de respect et de considération pour ses étudiants', 'Relation pédagogique, encadrement et disponibilité'),
(24, '24.Le professeur offre une disponibilité adéquate pour répondre aux besoins d’aide et d’encadrement de ses étudiants', 'Relation pédagogique, encadrement et disponibilité');

-- --------------------------------------------------------

--
-- Structure de la table `studentqcm`
--

CREATE TABLE `studentqcm` (
  `id` int(11) NOT NULL,
  `matiere_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `studentqcm`
--

INSERT INTO `studentqcm` (`id`, `matiere_id`, `user_id`, `question_id`, `note`) VALUES
(1, 13, 115, 1, NULL),
(2, 13, 115, 2, NULL),
(3, 13, 115, 3, NULL),
(4, 13, 115, 4, NULL),
(5, 13, 115, 5, NULL),
(6, 13, 115, 6, NULL),
(7, 13, 115, 7, NULL),
(8, 13, 115, 8, NULL),
(9, 13, 115, 9, NULL),
(10, 13, 115, 10, NULL),
(11, 13, 115, 11, NULL),
(12, 13, 115, 12, NULL),
(13, 13, 115, 13, NULL),
(14, 13, 115, 14, NULL),
(15, 13, 115, 15, NULL),
(16, 13, 115, 16, NULL),
(17, 13, 115, 17, NULL),
(18, 13, 115, 18, NULL),
(19, 13, 115, 19, NULL),
(20, 13, 115, 20, NULL),
(21, 13, 115, 21, NULL),
(22, 13, 115, 22, NULL),
(23, 13, 115, 23, NULL),
(24, 13, 115, 24, NULL),
(25, 1, 116, 1, '4'),
(26, 1, 116, 2, '2'),
(27, 1, 116, 3, '3'),
(28, 1, 116, 4, NULL),
(29, 1, 116, 5, NULL),
(30, 1, 116, 6, NULL),
(31, 1, 116, 7, NULL),
(32, 1, 116, 8, '5'),
(33, 1, 116, 9, '5'),
(34, 1, 116, 10, '5'),
(35, 1, 116, 11, '1'),
(36, 1, 116, 12, '2'),
(37, 1, 116, 13, '3'),
(38, 1, 116, 14, '5'),
(39, 1, 116, 15, NULL),
(40, 1, 116, 16, NULL),
(41, 1, 116, 17, NULL),
(42, 1, 116, 18, NULL),
(43, 1, 116, 19, '5'),
(44, 1, 116, 20, '5'),
(45, 1, 116, 21, NULL),
(46, 1, 116, 22, NULL),
(47, 1, 116, 23, '3'),
(48, 1, 116, 24, NULL),
(49, 1, 117, 1, '2'),
(50, 1, 117, 2, '3'),
(51, 1, 117, 3, '4'),
(52, 1, 117, 4, '4'),
(53, 1, 117, 5, '5'),
(54, 1, 117, 6, '5'),
(55, 1, 117, 7, '1'),
(56, 1, 117, 8, '5'),
(57, 1, 117, 9, '4'),
(58, 1, 117, 10, '5'),
(59, 1, 117, 11, '4'),
(60, 1, 117, 12, '3'),
(61, 1, 117, 13, '4'),
(62, 1, 117, 14, '3'),
(63, 1, 117, 15, '5'),
(64, 1, 117, 16, '2'),
(65, 1, 117, 17, '4'),
(66, 1, 117, 18, '4'),
(67, 1, 117, 19, '4'),
(68, 1, 117, 20, '4'),
(69, 1, 117, 21, '4'),
(70, 1, 117, 22, '2'),
(71, 1, 117, 23, '1'),
(72, 1, 117, 24, '1');

-- --------------------------------------------------------

--
-- Structure de la table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classe_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `students`
--

INSERT INTO `students` (`id`, `name`, `classe_id`) VALUES
(100, 'TSD1-student', 10),
(101, 'TSD2-student', 11),
(102, 'MER1-student', 12),
(103, 'MER2-student', 13),
(104, 'LBC1-student', 1),
(105, 'LBC1-student', 1),
(106, 'LBC3', 3),
(107, 'LCS1', 4),
(108, 'LCS2', 5),
(109, 'LCS3', 6),
(110, 'LCE1', 7),
(111, 'LCE2', 8),
(112, 'LCE3', 9);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `classe_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `roles`, `classe_id`) VALUES
(1, 'mounir salhi', '$argon2id$v=19$m=65536,t=4,p=1$OGdKV3BPRFVpcDQxZmh5QQ$o8pZN3nCq7zAVGrVNCmqOB2YEiYDaRvq0sPFpATXypw', '[\"ROLE_ADMIN\"]', NULL),
(2, 'sofienne gdaim', '$argon2id$v=19$m=65536,t=4,p=1$Qy5FT01JOUZNclRKVkg0dA$45ZDzQ/W5c8H7hYB1VDuBU4OX/v4N7UGvocnvhH1Gj0', '[\"ROLE_ADMIN\"]', NULL),
(3, 'mohammed ben amor', '$argon2id$v=19$m=65536,t=4,p=1$V2pZbmFaZmRxLmlVUTk2Mg$Yepk7KN62/fj2nQVvsHlTGjSY7CLxHl1+P+J8Ipe0zE', '[\"ROLE_ADMIN\"]', NULL),
(101, 'chef informatique', '$argon2id$v=19$m=65536,t=4,p=1$OGdKV3BPRFVpcDQxZmh5QQ$o8pZN3nCq7zAVGrVNCmqOB2YEiYDaRvq0sPFpATXypw', '[\"ROLE_ADMIN\"]', NULL),
(116, 'lbc1-1', '$argon2id$v=19$m=65536,t=4,p=1$RlRWb2RFVExqbGw1NU1Yeg$/y5Rsinjt6R++Ngm0V3i164WDGCrXKmueilyUlgVM00', '[\"ROLE_USER\"]', 1),
(117, 'lbc1-2', '$argon2id$v=19$m=65536,t=4,p=1$eHU2NnR4ZVZpYTV1R011QQ$ZpDcEpysN6p+KeJQUO6QJ7lk2RpLlNThauNlPFgNNiE', '[\"ROLE_USER\"]', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8F87BF96AE80F5DF` (`department_id`);

--
-- Index pour la table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `enseignant_matiere`
--
ALTER TABLE `enseignant_matiere`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_33D1A024A76ED395` (`user_id`),
  ADD KEY `IDX_33D1A024F46CD258` (`matiere_id`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9014574A8F5EA509` (`classe_id`),
  ADD KEY `IDX_9014574AA76ED395` (`user_id`),
  ADD KEY `IDX_9014574A5577AFDB` (`semestre_id`);

--
-- Index pour la table `periodes`
--
ALTER TABLE `periodes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `studentqcm`
--
ALTER TABLE `studentqcm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7A7474DEF46CD258` (`matiere_id`),
  ADD KEY `IDX_7A7474DEA76ED395` (`user_id`),
  ADD KEY `IDX_7A7474DE1E27F6BF` (`question_id`);

--
-- Index pour la table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A4698DB28F5EA509` (`classe_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  ADD KEY `IDX_8D93D6498F5EA509` (`classe_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT pour la table `enseignant_matiere`
--
ALTER TABLE `enseignant_matiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `periodes`
--
ALTER TABLE `periodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `studentqcm`
--
ALTER TABLE `studentqcm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT pour la table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99414;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `FK_8F87BF96AE80F5DF` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`);

--
-- Contraintes pour la table `enseignant_matiere`
--
ALTER TABLE `enseignant_matiere`
  ADD CONSTRAINT `FK_33D1A024A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_33D1A024F46CD258` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id`);

--
-- Contraintes pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD CONSTRAINT `FK_9014574A5577AFDB` FOREIGN KEY (`semestre_id`) REFERENCES `periodes` (`id`),
  ADD CONSTRAINT `FK_9014574A8F5EA509` FOREIGN KEY (`classe_id`) REFERENCES `classe` (`id`),
  ADD CONSTRAINT `FK_9014574AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `studentqcm`
--
ALTER TABLE `studentqcm`
  ADD CONSTRAINT `FK_7A7474DE1E27F6BF` FOREIGN KEY (`question_id`) REFERENCES `questionnaire` (`id`),
  ADD CONSTRAINT `FK_7A7474DEA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_7A7474DEF46CD258` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id`);

--
-- Contraintes pour la table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `FK_A4698DB28F5EA509` FOREIGN KEY (`classe_id`) REFERENCES `classe` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D6498F5EA509` FOREIGN KEY (`classe_id`) REFERENCES `classe` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
