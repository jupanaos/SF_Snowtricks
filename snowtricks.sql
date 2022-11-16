-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 11 nov. 2022 à 11:34
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `snowtricks`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int NOT NULL,
  `author_id` int NOT NULL,
  `trick_id` int DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `author_id`, `trick_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Super !', '2022-11-07 16:50:24', NULL),
(2, 2, 1, 'Wow !', '2022-11-07 17:15:01', NULL),
(3, 2, 1, 'Trop bien cette figure :D', '2022-11-08 17:35:07', NULL),
(4, 2, 1, 'Stylééé', '2022-11-08 17:36:11', NULL),
(5, 2, 3, 'Trop cool !', '2022-11-10 14:35:28', NULL),
(6, 4, 5, 'Impressionnant :o', '2022-11-11 11:21:39', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20221014144012', NULL, NULL),
('DoctrineMigrations\\Version20221014144235', '2022-10-14 14:42:48', 171),
('DoctrineMigrations\\Version20221016140925', '2022-10-16 14:09:53', 49),
('DoctrineMigrations\\Version20221017161606', '2022-10-17 16:16:16', 559),
('DoctrineMigrations\\Version20221017162445', '2022-10-17 16:24:52', 36),
('DoctrineMigrations\\Version20221017162929', '2022-10-17 16:29:34', 61),
('DoctrineMigrations\\Version20221018121909', '2022-10-18 12:20:19', 87),
('DoctrineMigrations\\Version20221020162636', '2022-10-20 16:27:22', 349),
('DoctrineMigrations\\Version20221020202204', '2022-10-20 20:22:14', 531),
('DoctrineMigrations\\Version20221024083201', '2022-10-24 08:32:42', 603),
('DoctrineMigrations\\Version20221025161848', '2022-10-25 16:18:57', 190),
('DoctrineMigrations\\Version20221031143606', '2022-10-31 14:36:19', 156),
('DoctrineMigrations\\Version20221031144605', '2022-10-31 14:46:17', 73),
('DoctrineMigrations\\Version20221031170438', '2022-10-31 17:04:45', 56),
('DoctrineMigrations\\Version20221101181024', '2022-11-01 18:13:27', 57),
('DoctrineMigrations\\Version20221101182901', '2022-11-01 18:29:07', 44),
('DoctrineMigrations\\Version20221102111320', '2022-11-02 11:15:42', 143),
('DoctrineMigrations\\Version20221103165045', '2022-11-03 16:51:16', 64);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

CREATE TABLE `picture` (
  `id` int NOT NULL,
  `trick_id` int NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `picture`
--

INSERT INTO `picture` (`id`, `trick_id`, `path`, `caption`) VALUES
(1, 1, '636a1bc6ced78.jpg', 'Bloody Dracula 1'),
(2, 1, '636a1bc6cf7fb.jpg', 'Bloody Dracula 2'),
(3, 1, '636a1bc6cfcde.jpg', 'Bloody Dracula 3'),
(4, 2, '636a1c998079c.jpg', 'Backside 360 1'),
(5, 2, '636a1c9980edf.jpg', 'Backside 360 2'),
(6, 2, '636a1c99813b7.jpg', 'Backside 360 3'),
(7, 3, '636a1dac60408.jpg', 'Layout Backflip 1'),
(8, 3, '636a1dac6094b.jpg', 'Layout Backflip 2'),
(9, 4, '636a1eb935c19.jpg', 'Board slide 1'),
(10, 4, '636a1eb936158.jpg', 'Board slide 2'),
(11, 5, '636a20338ed10.jpg', 'Board stall 1'),
(12, 5, '636a20338f246.jpg', 'Board stall 2'),
(13, 5, '636a20338f6d7.jpg', 'Board stall 3'),
(14, 6, '636a213de7bf3.png', 'Ollie 1'),
(15, 6, '636a213de8c2f.jpg', 'Ollie 2'),
(16, 6, '636a213de902a.jpg', 'Ollie 3'),
(17, 7, '636a2251926da.jpg', 'Crail 1'),
(18, 7, '636a225192d2e.jpg', 'Crail 2'),
(19, 8, '636a68de64009.jpg', 'Backside rodeo 1'),
(20, 8, '636a68de6451d.jpg', 'Backside rodeo 2'),
(21, 9, '636a6b8c9d142.png', 'Rocket air 1'),
(22, 9, '636a6b8c9d6d5.png', 'Rocket air 2'),
(23, 10, '636a6b4e984a1.jpg', 'Gorilla 1'),
(24, 10, '636a6b4e98dfe.jpg', 'Gorilla 2'),
(25, 11, '636a6d0742f60.jpg', 'Sato flip 1'),
(26, 11, '636a6d07435ef.jpg', 'Sato flip 2'),
(27, 12, '636a6e47dafe6.png', 'Tailslide 1'),
(28, 12, '636a6e47dc4dd.jpg', 'Tailslide 2'),
(29, 13, '636a904fbdb56.png', 'Shifty 1'),
(30, 13, '636a904fbe672.jpg', 'Shifty 2');

-- --------------------------------------------------------

--
-- Structure de la table `reset_password_request`
--

CREATE TABLE `reset_password_request` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `selector` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hashed_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `expires_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `trick`
--

CREATE TABLE `trick` (
  `id` int NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `trick`
--

INSERT INTO `trick` (`id`, `title`, `slug`, `description`, `created_at`, `updated_at`, `category_id`) VALUES
(1, 'Bloody Dracula', 'Bloody-Dracula', 'Une figure dans laquelle le rider saisit la queue de la planche avec les deux mains. La main arrière saisit la planche comme elle le ferait lors d\'une prise de queue normale, mais la main avant atteint aveuglément la planche derrière le dos du rider.', '2022-11-07 15:11:46', NULL, 4),
(2, 'Backside 360', 'Backside-360', 'Le principe est d\'effectuer une rotation horizontale complète pendant le saut, puis d\'atterrir en position switch ou normal.', '2022-11-08 09:08:41', NULL, 1),
(3, 'Layout Backflip', 'Layout-Backflip', 'Une variation d\'un backflip normal, mais avec le corps complètement étendu. Il peut être effectué dans le style barrel ou dans le style wild-cat du backflip.', '2022-11-08 09:13:16', NULL, 2),
(4, 'Board slide', 'Board-slide', 'Une glissade effectuée lorsque le pied avant du rider passe au-dessus de la glissière à l\'approche, son snowboard se déplaçant perpendiculairement le long de la glissière ou d\'un autre obstacle.', '2022-11-08 09:17:45', NULL, 5),
(5, 'Board stall', 'Board-stall', 'Une figure réalisée lorsqu\'un rider se cale sur un objet avec son snowboard, le point de contact se situant entre les deux fixations.', '2022-11-08 09:24:03', NULL, 6),
(6, 'Ollie', 'Ollie', 'Une figure dans laquelle le snowboarder saute de la queue de la planche et s\'envole.', '2022-11-08 09:28:29', NULL, 3),
(7, 'Crail', 'Crail', 'La main arrière saisit le bord de l\'orteil devant le pied avant pendant que la jambe arrière est désaxée.', '2022-11-08 09:33:05', NULL, 4),
(8, 'Backside rodeo', 'Backside-rodeo', 'Une pirouette backside avec retournement arrière, créée par Peter Line. Le plus souvent exécutée avec une rotation de 540°, mais aussi avec une rotation de 720°, 900°, etc.', '2022-11-08 14:34:06', NULL, 2),
(9, 'Rocket air', 'Rocket-air', 'La main avant saisit le bord de la planche devant le pied avant et la jambe arrière est désaxée, tandis que la planche pointe perpendiculairement au sol.', '2022-11-08 14:41:35', NULL, 4),
(10, 'Gorilla', 'Gorilla', 'Les deux mains s\'agrippent aux pieds entre les fixations.', '2022-11-08 14:44:30', NULL, 4),
(11, 'Sato flip', 'Sato-flip', 'Figure de halfpipe réalisée par Rob Kingwill (Sato est le mot japonais pour sucre). Le rider remonte l\'obstacle°, saute en l\'air et saisit l\'avant, puis jette la tête, les épaules et les hanches vers le bas.', '2022-11-08 14:51:51', NULL, 2),
(12, 'Tailslide', 'Tailslide', 'Similaire à un boardslide ou à un lipslide, mais seule la tail de la planche est sur la rampe. Les tailslides corrects se font avec la rampe directement sous le pied arrière ou plus loin vers le tail.', '2022-11-08 14:57:11', NULL, 5),
(13, 'Shifty', 'Shifty', 'Une figure aérienne dans laquelle un snowboarder effectue une contre-rotation du haut de son corps afin de déplacer sa planche d\'environ 90° par rapport à sa position normale sous lui, puis remet la planche dans sa position initiale avant d\'atterrir.', '2022-11-08 17:22:23', NULL, 3);

-- --------------------------------------------------------

--
-- Structure de la table `trick_category`
--

CREATE TABLE `trick_category` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `trick_category`
--

INSERT INTO `trick_category` (`id`, `name`) VALUES
(1, 'Rotation'),
(2, 'Flips'),
(3, 'Straight airs'),
(4, 'Grabs'),
(5, 'Slides'),
(6, 'Stalls');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `is_verified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `username`, `avatar`, `created_at`, `updated_at`, `is_verified`) VALUES
(2, 'azerty456@azerty.test', '[]', '$2y$13$qKQUqIHN/Y.sNg7dQNQz5eLST8VGmo.HUUghVNxBr3u0AukxjweTa', 'azerty456', '636928c49f6bb.jpg', '2022-11-07 15:48:20', NULL, 1),
(4, 'user@user.test', '[]', '$2y$13$WB9ABQLaLRiuEf.FdnDxKu49lc175P5rsuJ9U.t.X6CZXO4ak/9K.', 'user', '636e3017a21e6.jpg', '2022-11-11 11:20:55', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

CREATE TABLE `video` (
  `id` int NOT NULL,
  `trick_id` int DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `video`
--

INSERT INTO `video` (`id`, `trick_id`, `url`) VALUES
(2, 2, 'https://www.youtube.com/embed/ghwZvrJi2fg'),
(3, 1, 'https://www.youtube.com/embed/UU9iKINvlyU'),
(4, 2, 'https://www.youtube.com/embed/hUQ3eKS13co'),
(5, 3, 'https://www.youtube.com/embed/SlhGVnFPTDE'),
(6, 3, 'https://www.youtube.com/embed/8TBfD5VPnM'),
(7, 4, 'https://www.youtube.com/embed/gRZCF5_XRsA'),
(8, 5, 'https://www.youtube.com/embed/LFl259j_Oss'),
(9, 6, 'https://www.youtube.com/embed/AnI7qGQs0Ic'),
(10, 7, 'https://www.youtube.com/embed/cbfWyGOvkJk');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9474526CF675F31B` (`author_id`),
  ADD KEY `IDX_9474526CB281BE2E` (`trick_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_16DB4F89B281BE2E` (`trick_id`);

--
-- Index pour la table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7CE748AA76ED395` (`user_id`);

--
-- Index pour la table `trick`
--
ALTER TABLE `trick`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_D8F0A91E2B36786B` (`title`),
  ADD KEY `IDX_D8F0A91E12469DE2` (`category_id`);

--
-- Index pour la table `trick_category`
--
ALTER TABLE `trick_category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`);

--
-- Index pour la table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7CC7DA2CB281BE2E` (`trick_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `trick`
--
ALTER TABLE `trick`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `trick_category`
--
ALTER TABLE `trick_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `video`
--
ALTER TABLE `video`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526CB281BE2E` FOREIGN KEY (`trick_id`) REFERENCES `trick` (`id`),
  ADD CONSTRAINT `FK_9474526CF675F31B` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `FK_16DB4F89B281BE2E` FOREIGN KEY (`trick_id`) REFERENCES `trick` (`id`);

--
-- Contraintes pour la table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD CONSTRAINT `FK_7CE748AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `trick`
--
ALTER TABLE `trick`
  ADD CONSTRAINT `FK_D8F0A91E12469DE2` FOREIGN KEY (`category_id`) REFERENCES `trick_category` (`id`);

--
-- Contraintes pour la table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `FK_7CC7DA2CB281BE2E` FOREIGN KEY (`trick_id`) REFERENCES `trick` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
