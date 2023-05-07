-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 19 avr. 2023 à 14:19
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `stage`
--

-- --------------------------------------------------------

--
-- Structure de la table `adhesion`
--

DROP TABLE IF EXISTS `adhesion`;
CREATE TABLE IF NOT EXISTS `adhesion` (
  `id_adhesion` int(11) NOT NULL AUTO_INCREMENT,
  `nom_adhesion` varchar(50) NOT NULL,
  `date_adhesion` datetime NOT NULL,
  `prix_adhesion` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id_adhesion`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `adhesion`
--

INSERT INTO `adhesion` (`id_adhesion`, `nom_adhesion`, `date_adhesion`, `prix_adhesion`) VALUES
(4, 'fondateur', '2023-02-15 16:10:59', '10'),
(9, 'extra', '2023-02-16 10:11:44', '7'),
(10, 'basique', '2023-02-16 10:12:02', '5'),
(11, 'basique', '2023-02-16 10:39:57', '5'),
(12, 'extra', '2023-02-16 10:40:55', '7'),
(13, 'extra', '2023-02-16 10:41:01', '7'),
(14, 'basique', '2023-02-16 10:41:06', '5'),
(15, 'basique', '2023-02-16 10:41:06', '5'),
(16, 'basique', '2023-02-16 10:41:06', '5'),
(17, 'basique', '2023-02-16 10:41:06', '5'),
(18, 'basique', '2023-02-16 10:41:06', '5'),
(19, 'basique', '2023-02-16 10:41:06', '5'),
(20, 'extra', '2023-02-16 10:42:06', '7'),
(21, 'extra', '2023-02-16 10:42:06', '7'),
(22, 'extra', '2023-02-16 10:42:06', '7'),
(23, 'extra', '2023-02-16 10:42:06', '7'),
(24, 'extra', '2023-02-16 10:42:06', '7'),
(25, 'extra', '2023-02-16 10:42:06', '7'),
(26, 'extra', '2023-02-16 10:42:06', '7'),
(27, 'extra', '2023-02-16 10:42:06', '7'),
(28, 'fondateur', '2023-02-16 10:42:42', '10'),
(29, 'fondateur', '2023-02-16 10:42:42', '10'),
(30, 'fondateur', '2023-02-16 10:42:42', '10'),
(31, 'fondateur', '2023-02-16 10:42:42', '10'),
(32, 'fondateur', '2023-02-16 10:42:42', '10'),
(33, 'fondateur', '2023-02-16 10:42:42', '10'),
(34, 'fondateur', '2023-02-16 10:42:42', '10'),
(35, 'fondateur', '2023-02-16 10:42:42', '10'),
(36, 'fondateur', '2023-02-16 10:42:42', '10'),
(37, 'fondateur', '2023-02-16 10:43:54', '10'),
(38, 'extra', '2023-02-16 10:44:00', '7'),
(39, 'basique', '2023-02-16 10:44:11', '5'),
(40, 'basique', '2023-02-16 10:44:11', '5'),
(41, 'basique', '2023-02-16 10:44:11', '5'),
(42, 'basique', '2023-02-16 10:44:11', '5'),
(43, 'basique', '2023-02-16 10:44:11', '5'),
(44, 'basique', '2023-02-16 10:44:11', '5'),
(45, 'basique', '2023-02-16 10:44:11', '5'),
(46, 'basique', '2023-02-16 10:44:11', '5'),
(47, 'basique', '2023-02-16 10:44:11', '5'),
(48, 'basique', '2023-02-16 10:44:11', '5'),
(49, 'basique', '2023-02-16 10:44:11', '5'),
(50, 'basique', '2023-02-16 10:44:11', '5'),
(51, 'basique', '2023-02-16 13:12:52', '5'),
(52, 'basique', '2023-02-16 13:12:52', '5'),
(53, 'basique', '2023-02-16 13:12:52', '5'),
(54, 'basique', '2023-02-16 13:12:52', '5'),
(55, 'basique', '2023-02-16 13:12:52', '5'),
(56, 'basique', '2023-02-16 13:12:52', '5'),
(57, 'basique', '2023-02-16 13:12:52', '5'),
(58, 'basique', '2023-02-16 13:12:52', '5'),
(59, 'basique', '2023-02-16 13:12:52', '5'),
(60, 'basique', '2023-02-16 13:12:52', '5'),
(61, 'basique', '2023-02-16 13:12:52', '5'),
(62, 'basique', '2023-02-16 13:12:52', '5'),
(63, 'basique', '2023-02-16 13:12:52', '5');

-- --------------------------------------------------------

--
-- Structure de la table `avantage_adhesion`
--

DROP TABLE IF EXISTS `avantage_adhesion`;
CREATE TABLE IF NOT EXISTS `avantage_adhesion` (
  `id_avantage_adhesion` int(11) NOT NULL AUTO_INCREMENT,
  `nom_avantage` varchar(100) NOT NULL,
  `description_avantage` blob NOT NULL,
  PRIMARY KEY (`id_avantage_adhesion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `id_avis` int(11) NOT NULL AUTO_INCREMENT,
  `titre_avis` varchar(200) NOT NULL,
  `note_avis` int(11) NOT NULL,
  `description_avis` blob NOT NULL,
  `date_avis` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_bonplan` int(11) NOT NULL,
  PRIMARY KEY (`id_avis`),
  KEY `avis_user_FK` (`id_user`),
  KEY `avis_BonPlan0_FK` (`id_bonplan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `bonplan`
--

DROP TABLE IF EXISTS `bonplan`;
CREATE TABLE IF NOT EXISTS `bonplan` (
  `id_bonplan` int(11) NOT NULL AUTO_INCREMENT,
  `titre_bonplan` varchar(200) NOT NULL,
  `description_bonplan` varchar(10000) NOT NULL,
  `image_bonplan` varchar(200) NOT NULL,
  `nbClick_bonplan` int(11) NOT NULL,
  PRIMARY KEY (`id_bonplan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `bonplan`
--

INSERT INTO `bonplan` (`id_bonplan`, `titre_bonplan`, `description_bonplan`, `image_bonplan`, `nbClick_bonplan`) VALUES
(1, 'Payer Le Game Pass \"Quasiment Rien\"', 'Le Game Pass, c’est 10€ par mois pour un milliard d’avantages, et 13€ pour l’Ultimate avec deux milliards d’avantages. Maintenant, nous vous proposons 3 ans de Game Pass Ultimate pour trois fois moins chers que le prix normal, et légalement. Et, pour ce faire, nous allons simplement trouver des abonnements Live Gold au prix le plus bas, pour les convertir en Ultimate.\r\n\r\nTout d’abord, vous allez vous rendre sur cette page et vous allez ajouter 1 à 3 codes de Live Gold dans votre panier. Ensuite, vous prendrez le code promo de nos amis les Xbots « XBOXYGENGOLD ». Vous activerez ensuite les codes sur votre compte sur cette page et enfin, vous irez convertir votre Live Gold en Ultimate via cette page.\r\n\r\nEn achetant 1 code de Live Gold, vous paierez environ 42~€ au lieu de 155~€. Pareillement, en achetant 2 codes, vous paierez approximativement 85~€ au lieu de 300~€. Finalement, en prenant 3 codes, vous paierez 123~€ au lieu de 450~€. L’astuce est exceptionnelle si vous avez une Xbox et aussi si vous avez un PC puisque l’Ultimate fonctionne sur PC.\r\nAttention, le prix final économisé peut varier en fonction des personnes et l’astuce marche surtout si vous n’êtes pas abonnés. Sinon, si vous êtes déjà abonné au Xbox Game Pass Ultimate, vous pouvez quand même acheter et saisir les codes, mais la conversion ne se fera pas au 1:1.', 'bonPlan-xbox.png', 11),
(2, 'Acheter Ses Jeux PS4 Et PS5 Moins Chers', 'En premier lieu, la fin d’année, c’est chaud. En effet, FIFA, Call Of Duty, Assassin’s Creed et un ou deux gros hits… Aussi, il faut souvent faire des choix et des sacrifices pour pouvoir profiter des nouveaux jeux, surtout avec ses potes. Heureusement, on vous donne ici des solutions pour pouvoir acheter tous les jeux que vous voudriez dans votre bibliothèque, moins cher.\r\n\r\nAcheter sur le PlayStation Store Brésilien\r\nEn effet, Call Of Duty Modern Warfare II est actuellement à 50.40€ sur le PlayStation Store Brésilien et à 67.99€ sur le Store français. Bref, dans la majorité des cas, vous allez faire des économies en achetant dans ce store et dans d’autres. Pour ce faire, vous aurez simplement à vous créer un compte à l’étranger. Par ailleurs, c’est aussi valable en Indonésie, ou en Afrique du Sud. En outre, il n’y a rien de plus efficace pour avoir ses jeux PS4 et PS5 moins cher.\r\n\r\nAussi, pour la création de votre compte, vous aurez facilement à entrer une adresse valable dans le pays. Enfin, pour ce qui est de payer les jeux, vous ne pourrez probablement pas passer par votre compte bancaire qui n’est pas brésilien, mais, vous pourrez utiliser votre argent pour acheter des cartes PSN étrangères sur internet avec des sites comme G2A ou encore Eneba. Ainsi, le tour est joué, vous aurez réalisé des économies. Enfin, mettez votre console en principal pour votre compte et le tour est joué, mais vous ne pourrez pas prêter vos jeux, votre compte.\r\n\r\nDiviser le coût des jeux par 2 ou 3 grâce au pouvoir de l\'amitié.\r\nPar ailleurs, si un jeu coûte 70€, et que vous pouvez en plus acheter des cartes prépayés moins cher (40 à 45€ pour une carte PSN de 50€) alors, imaginez si vous partagiez votre compte et vos dépenses avec un pote. De ce fait, vous achetez deux jeux pour le prix d’un. Ainsi, en déboursant entre 70 à 80€ vous pourrez donc bénéficier de 4 jeux grâce au pouvoir de l’amitié et des cartes prépayés sur des sites comme Instant-Gaming. En effet, c’est beau le pouvoir de l’amitié.\r\n\r\nAussi, si vous avez une PS5 avec un autre collègue et que vous avez aussi un ami avec une PS4, vous pouvez diviser le cout des jeux par 3. Puisque vous pourrez utiliser votre compte et le partager à la fois à un ami sur PS4 et aussi à un ami sur PS5. Pareil si vous avez aussi juste une PS4, vous pouvez prêter votre compte à deux amis, l’un sur PS4, l’autre sur PS5.\r\n\r\nLa méthode classique\r\nC’est simple, certaines enseignes vendent à pertes ou presque en proposant les gros hits à 70€ pour seulement 50 voir 40 euros pour certains rares cas. En général, il s’agit de Cdiscount ou encore de certaines grandes surfaces comme Carrefour. C’est d’ailleurs à cause d’eux que Micromania et les vendeurs indépendants risquent de se faire éteindre en France.', 'bonPlan-playstation.png', 11),
(3, 'Unilore Recrute Les Postes :', 'Président et Vice-Président\r\nEn premier lieu, la présidence, ce sont les deux Atlas qui portent l’association et sont généralement les boss finals pour le recrutement. En effet, la présidence dirige et fait office de capitaine d’un grand navire, l’objectif ? Tout simplement de ne pas couler et au contraire de ramener du loot pour avoir une meilleure flotte et un équipage plus heureux. Ils sont supposés savoir tout faire et pouvoir tout faire, ce sont des machines épuisées, mais inépuisables. Enfin, celles-ci se renouvellent chaque année pour rester frais. On recrute actuellement un président si vous voulez.\r\n\r\nLes Trésoriers\r\nIls dirigent le compte en banque et ont autant de pouvoir que le président. Ce n’est pas une contrainte, mais une répartition plus juste des pouvoirs au sein de notre équipe. Ils gèrent la comptabilité et sont impliqués sur absolument tous les projets. Ils gèrent les demandes de subventions, l’assurance, le compte en banque, les projets, etc. Bref, ce sont des monstres, des machines de guerre, tout comme la présidence. Nous recrutons, être bon en math est seulement un plus, un bac S est aussi un avantage. Mais nous recrutons surtout des légendes comme vous.\r\n\r\nLes Secrétaires\r\nCertes, c’est un nom plutôt suggestif, mais, c’est un poste absolument primordial et même plus. En effet, le secrétaire dans l’association est notre historien local, il garde une trace de tout. Par ailleurs, il est aussi un pilier des relations internes puisqu’il a des yeux et des oreilles partout. C’est-à-dire que c’est notre happiness manager, notre directeur des ressources humaines, notre médiateur, et j’en passe. Il bosse aussi avec le trésorier sur tout ce qui est subventions.\r\n\r\nLes Responsables Presses et Partenariats\r\nDe prime abord, c’est un petit poste. Mais chez nous, c’est un poste indispensable. En effet, Unilore se repose beaucoup sur ses amis et partenaires. Aussi, ce poste est primordial parce qu’avoir la presse ou une simple entreprise à ses côtés, ça permet de nous légitimer. Ou de nous donner de belles exclusivités comme des avant-premières ou mieux, des réductions partout. Ainsi, ce poste a toute sa place dans notre Conseil Restreint, ils sont aussi comparables à des machines de guerre.\r\n\r\nLes Directeurs et Responsables\r\nLes directeurs et responsables sont tout simplement les leaders, les dirigeants, les patrons, les seigneurs de leur section, de leur équipe. En effet, avoir plein de leaders de confiance, c’est tellement favorable à l’organisation. Surtout quand ce sont des amis, chose importante chez nous. Mais concrètement, nous sommes hyper organisés pareillement, à notre hiérarchie étant bien construite, sans limiter personne. La carte blanche est dans notre philosophie. Nous faisons confiance à l’instinct.\r\n\r\nDirecteur de la Communication\r\nLe ou les directeurs de la communication coordonnent toutes nos actions de communication. Par ailleurs, en vue des nombreuses surprises ou folies que notre association propose, sachez que ce sont eux qui dirigent tout cela. Sinon, ils sont à la tête de l’équipe de communication, tous nos réseaux, des relations avec les adhérents et tout ce qui concerne la communication externe. Ce sont, eux aussi, des machines, car ils doivent être super performants et super organisés, genre vraiment.\r\n\r\nCommunity Manager\r\nPremièrement, il s’agit d’animateurs de communauté et il n’est pas uniquement le mec qui se connecte sur un compte et qui poste des trucs. Le Community Manager se charge d’animer, c’est un véritable personnage au sein de notre association. C’est son âme qui transpire de notre compte Instagram. Ce n’est pas un pro, c’est un génie qu’on aime tous et dont on apprécie le contenu. Bon en général, c’est ce qu’on destine à la majorité des postes mais… Les réseaux sont trop importants. PS : lisez aussi le poste du dessous.\r\n\r\nSocial Media Manager\r\nEn effet, c’est lui qui s’occupe de poster tout ce qui est annonces. Pour le coup, il travaille avec les community manager et ils répondent tous les deux aux messages. Ce sont des postes très complémentaires, mais chacun à sa propre mission ainsi que sa propre manière de travailler. L’un est un goat plus chill, l’autre est un goat, plus carré et pro. Les deux sont absolument nécessaires et ils incarnent nos porte-paroles avec l’impact virtuel le plus large.\r\n\r\nGraphiste\r\nVous êtes notre artiste local et au cœur de tous nos beaux projets en ce qui concerne\r\n\r\nMonteur Vidéo\r\nIci, il ne s’agit pas de faire des Tik Tok gênant, on veut faire un travail de pro et un travail utile et non pas du divertissement ringard. Est-ce qu’on a besoin de faire un descriptif du poste ? Sachez que c’est surtout pour de beaux et de gros projets et que, potentiellement, vous ferez partie des belles surprises. Honnêtement, pour l’instant, vous n’allez pas être très surmené.\r\n\r\nGlobalement, nos animations se divisent en quatre équipes. Pourquoi quatre ? Parce que si nous pouvions faire chaque mois un événement de chaque catégorie pour tenir notre cadence, c’est-à-dire, un événement par semaine et plus, cela serait exceptionnel. Ainsi, nous avons donc l’équipe d’animation virtuelle, l’équipe d’animation IRL, l’équipe d’animation sportive et l’équipe d’animation culturelle. Mais, vous faites tous partie de la même équipe, simplement nous vous accordons une préférence.\r\n\r\n \r\n\r\nMais dans tous les cas, tout le monde, si nécessaire, doit s’impliquer dans tous les évènements, la réussite de chacun de nos évènements est absolument primordiale. Globalement, vous êtes un chargé de mission événementielle, mais vous avez une spécialisation en fonction de votre préférence et de votre domaine de prédilection. On précise aussi que chaque équipe d’animation a son responsable. Nous vous recrutons, parce que nous considérons que vous êtes des légendes.\r\n\r\nÉquipe d\'Animation Virtuel\r\nVotre équipe organisera évidemment des évènements virtuels donc tout ce qui est jeux vidéo en majorité. Des évènements chill, sympas ou plus compétitifs. Des free to play pour inclure le maximum de personnes, mais surtout une expérience personnalisée. Qu’on ne se sente pas délaissé dans une partie multijoueur avec des gens qui sont de notre âge. Vous êtes des animateurs, des leaders charismatiques et des forces de propositions, de bonnes oreilles et enfin, de bons joueurs et médiateurs.\r\n\r\nÉquipe d\'Animation IRL\r\nOrganisez-nous de belles soirées et essentiellement des soirées immersives. Oui, si votre thème, ce sont les années 80, il est hors de question d’avoir du Jul à cette soirée. Sinon, pourquoi ne feriez-vous pas une soirée voyage temporelle avec une décennie par heure ? Comme ça vous seriez satisfaits. Nous divergeons, ça fait beaucoup. Cependant, vous pouvez aussi inclure Laser Games, Escapes Games, jeux de sociétés, et tout ce que vous voulez, soyez une force de proposition.', 'bonPlan-recrute.png', 2);

-- --------------------------------------------------------

--
-- Structure de la table `impliquer`
--

DROP TABLE IF EXISTS `impliquer`;
CREATE TABLE IF NOT EXISTS `impliquer` (
  `id_avantage_adhesion` int(11) NOT NULL,
  `id_adhesion` int(11) NOT NULL,
  PRIMARY KEY (`id_avantage_adhesion`,`id_adhesion`),
  KEY `impliquer_adhesion0_FK` (`id_adhesion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `lesadhesion`
--

DROP TABLE IF EXISTS `lesadhesion`;
CREATE TABLE IF NOT EXISTS `lesadhesion` (
  `id_lesadhesion` int(11) NOT NULL AUTO_INCREMENT,
  `nom_adhesion_pre` varchar(500) NOT NULL,
  `prix_adhesion_pre` decimal(8,2) NOT NULL,
  PRIMARY KEY (`id_lesadhesion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `lesadhesion`
--

INSERT INTO `lesadhesion` (`id_lesadhesion`, `nom_adhesion_pre`, `prix_adhesion_pre`) VALUES
(1, 'Basique, Simple', '5.00'),
(2, 'Extra', '7.00'),
(3, 'Fondateur', '10.00');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `nom_message` varchar(500) NOT NULL,
  `mail_message` varchar(500) NOT NULL,
  `un_message` varchar(10000) NOT NULL,
  PRIMARY KEY (`id_message`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id_message`, `nom_message`, `mail_message`, `un_message`) VALUES
(1, 'MUDLER', 'kevin57.mud@gmail.com', 'L\'application web est très bien');

-- --------------------------------------------------------

--
-- Structure de la table `proposition`
--

DROP TABLE IF EXISTS `proposition`;
CREATE TABLE IF NOT EXISTS `proposition` (
  `id_proposition` int(11) NOT NULL AUTO_INCREMENT,
  `date_proposition` datetime NOT NULL,
  `titre_proposition` varchar(200) NOT NULL,
  `contenue_proposition` varchar(5000) NOT NULL,
  `etat_proposition` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_proposition`),
  KEY `proposition_user_FK` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `proposition`
--

INSERT INTO `proposition` (`id_proposition`, `date_proposition`, `titre_proposition`, `contenue_proposition`, `etat_proposition`, `id_user`) VALUES
(7, '2023-01-16 15:47:28', 'OK', 'salut ca va ', 'En attente', 3),
(8, '2023-01-16 15:53:20', 'jyt', 'jty', 'En attente', 3);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(100) NOT NULL,
  `prenom_user` varchar(100) NOT NULL,
  `mail_user` varchar(100) NOT NULL,
  `mdp_user` varchar(100) NOT NULL,
  `status_user` tinyint(1) DEFAULT NULL,
  `id_adhesion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `user_adhesion_FK` (`id_adhesion`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `nom_user`, `prenom_user`, `mail_user`, `mdp_user`, `status_user`, `id_adhesion`) VALUES
(3, 'mudler', 'kevin', 'kevin57.mud@gmail.com', '$2y$10$wL2su.j0pv3GbnX/N/tHc.zg4Dgy2/yrb9igc1C372CeSkgmrx1sm', NULL, NULL),
(4, 'Bassez', 'killian', 'killian52.bassez@gmail.com', '$2y$10$1w22i734enCTUjwU1GZEZ.MZTeN7YVGXxQRoEZe0Px9jlu63ZTu66', NULL, NULL),
(5, 'lyul', 'luy', 'lyu@gerjg.com', '$2y$10$8dPSSfTILcZw5haW6Oz1y.Z4wksId5h0yOQcjFrGu4Il4vBx1V6wK', NULL, NULL),
(6, 'Bassez', 'jrt', 'lyu@gerjjktykg.com', '$2y$10$JqLuofhA0rBEJ2ve0ceIWeDcuIF2zSjmE2fSue5JItFIrbl23Y35m', NULL, NULL),
(7, 'Vanpenne', 'Joran', 'vanpenne.joran@gmail.com', '$2y$10$NxdUBOFkTIkhBXIPgETYaeyXTwULm7QujeFb5U1GPrFujJ8UmEaBC', NULL, NULL),
(8, 'Bassez', 'Killian', 'faulki93@gmail.com', '$2y$10$0.yewJGQ7bhaeCPwav/SUeAydZY75NgyKIm3K.j56ApJMm/4LTFua', NULL, NULL),
(9, 'FAUQUET', 'Manon', 'manon.fauquet2003@gmail.com', '$2y$10$6F2ovoricB7jV4AibR74W.rHVoesXV6.k5AmwAreIhY7FNmnqA07O', NULL, NULL),
(10, 'MUDLER', 'Kévin', 'kevin.mud@gmail.com', '$2y$10$xA0F5PTOpuiN0GTJEl8JFucP3QY2VUIKnKkPi1SIoq5W2x9utyAii', NULL, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_BonPlan0_FK` FOREIGN KEY (`id_bonplan`) REFERENCES `bonplan` (`id_bonplan`),
  ADD CONSTRAINT `avis_user_FK` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`);

--
-- Contraintes pour la table `impliquer`
--
ALTER TABLE `impliquer`
  ADD CONSTRAINT `impliquer_adhesion0_FK` FOREIGN KEY (`id_adhesion`) REFERENCES `adhesion` (`id_adhesion`),
  ADD CONSTRAINT `impliquer_avantage_adhesion_FK` FOREIGN KEY (`id_avantage_adhesion`) REFERENCES `avantage_adhesion` (`id_avantage_adhesion`);

--
-- Contraintes pour la table `proposition`
--
ALTER TABLE `proposition`
  ADD CONSTRAINT `proposition_user_FK` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `user_adhesion_FK` FOREIGN KEY (`id_adhesion`) REFERENCES `adhesion` (`id_adhesion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
