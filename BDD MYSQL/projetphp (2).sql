-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 02 déc. 2020 à 22:41
-- Version du serveur :  5.7.24
-- Version de PHP : 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetphp`
--

-- --------------------------------------------------------

--
-- Structure de la table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `id_question_id` int(11) NOT NULL,
  `choix` varchar(250) NOT NULL,
  `nombre` int(11) NOT NULL DEFAULT '0',
  `resultat` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `answer`
--

INSERT INTO `answer` (`answer_id`, `id_question_id`, `choix`, `nombre`, `resultat`) VALUES
(1, 1, 'Louise', 0, NULL),
(2, 1, 'Karen', 0, NULL),
(3, 2, 'Macdo', 0, NULL),
(4, 2, 'Rien', 0, NULL),
(5, 2, 'KFC', 0, NULL),
(6, 2, 'BK', 0, NULL),
(7, 2, 'Viande', 0, NULL),
(8, 3, 'Lecture', 1, NULL),
(9, 3, 'Rien', 1, NULL),
(10, 3, 'Mange', 0, NULL),
(11, 4, 'Le chocolat', 1, NULL),
(12, 4, 'ThÃ©', 1, NULL),
(13, 5, 'ka', 0, NULL),
(14, 5, 'Rien', 2, NULL),
(15, 6, 'oui', 0, NULL),
(16, 6, 'non', 0, NULL),
(17, 7, 'a', 0, NULL),
(18, 7, 'b', 0, NULL),
(19, 7, 'v', 0, NULL),
(20, 7, 'd', 0, NULL),
(21, 7, 'e', 0, NULL),
(22, 8, 'z', 0, NULL),
(23, 8, 'Ã©', 0, NULL),
(24, 8, 'z', 0, NULL),
(25, 8, 'e', 0, NULL),
(26, 8, 'r', 0, NULL),
(27, 9, 'kaka', 1, NULL),
(28, 9, 'ze', 0, NULL),
(29, 9, 'Nathan', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `friend`
--

CREATE TABLE `friend` (
  `friend_id` int(11) NOT NULL,
  `user_id_A` int(11) NOT NULL,
  `user_id_B` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `friend`
--

INSERT INTO `friend` (`friend_id`, `user_id_A`, `user_id_B`) VALUES
(1, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `user_id_author` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `image` varchar(10000) NOT NULL,
  `date_fin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`question_id`, `user_id_author`, `question`, `image`, `date_fin`) VALUES
(1, 1, 'je m\'appelle ?', 'https://images.unsplash.com/photo-1589973481030-fdc171980d84?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1049&q=80', '2020-11-18 23:29:00'),
(2, 1, 'Je mange ?', 'https://tse3.mm.bing.net/th?id=OIP.sz1QRBNLPe7PGlfc8UGQJwHaEK&pid=Api', '2020-11-21 23:30:00'),
(3, 1, 'Je fais quoi ?', 'https://tse4.mm.bing.net/th?id=OIP.JOWScY9dSyjTJpBHypsSNQHaEK&pid=Api', '2020-12-23 23:30:00'),
(4, 1, 'J\'aime', 'https://static.giantbomb.com/uploads/scale_medium/0/6974/313410-brook_of_one_piece.jpg', '2021-01-22 23:31:00'),
(5, 2, 'pk la vie', 'https://images.unsplash.com/photo-1589973481030-fdc171980d84?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1049&q=80', '2020-12-18 23:35:00'),
(6, 2, 'Oui ou non ?', 'https://images.unsplash.com/photo-1589973481030-fdc171980d84?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1049&q=80', '2020-12-17 23:35:00'),
(7, 3, 'je m\'appelle :', 'https://tse4.mm.bing.net/th?id=OIP.JOWScY9dSyjTJpBHypsSNQHaEK&pid=Api', '2020-12-24 23:37:00'),
(8, 3, 'z', 'https://static.giantbomb.com/uploads/scale_medium/0/6974/313410-brook_of_one_piece.jpg', '2020-12-22 23:38:00'),
(9, 3, 'je m\'appelle :', 'https://tse3.mm.bing.net/th?id=OIP.sz1QRBNLPe7PGlfc8UGQJwHaEK&pid=Api', '2020-12-02 23:44:00');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mdp` varchar(150) NOT NULL,
  `date` date NOT NULL,
  `statut` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `pseudo`, `email`, `mdp`, `date`, `statut`) VALUES
(1, 'Azoulay', 'Karen', 'Karen', 'karenazoulay92@gmail.com', '$2y$10$0UdjH0j7A6DHVdmFjqCtU.XgdyHj/4zKcJATc5iDxsALdEl2r9awi', '2020-12-02', 0),
(2, 'Burstein', 'Benjamin', 'benji', 'benji@gmail.com', '$2y$10$i2lfyT4aWWBukRAQw6dmrumStDFixD2Jldi4Y4D6VqE.yEV3IgWzq', '2020-12-02', 1),
(3, 'Alexandre', 'Caramel', 'alex', 'alex.cara@yahoo.com', '$2y$10$iBVV9gzWEl6IHx2Qi8FGgechaFrKg8Cvd97op9HqG.R9dFzJf95hq', '2020-12-02', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user_answer`
--

CREATE TABLE `user_answer` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `id_question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user_answer`
--

INSERT INTO `user_answer` (`id`, `user_id`, `answer_id`, `id_question`) VALUES
(1, 2, 12, 4),
(2, 3, 14, 5),
(3, 3, 9, 3),
(4, 3, 11, 4),
(5, 1, 27, 9),
(6, 1, 14, 5),
(7, 2, 8, 3);

-- --------------------------------------------------------

--
-- Structure de la table `user_comment`
--

CREATE TABLE `user_comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_question_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user_comment`
--

INSERT INTO `user_comment` (`id`, `user_id`, `id_question_id`, `comment`, `date`) VALUES
(1, 2, 4, 'Lol', '2020-12-02 23:35:01'),
(2, 3, 3, 'haha', '2020-12-02 23:37:17'),
(3, 2, 3, 'ptdrr', '2020-12-02 23:40:15');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`);

--
-- Index pour la table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`friend_id`),
  ADD UNIQUE KEY `friend_id` (`friend_id`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Id` (`id`,`pseudo`,`email`);

--
-- Index pour la table `user_answer`
--
ALTER TABLE `user_answer`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user_comment`
--
ALTER TABLE `user_comment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `friend`
--
ALTER TABLE `friend`
  MODIFY `friend_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user_answer`
--
ALTER TABLE `user_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `user_comment`
--
ALTER TABLE `user_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
