-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 30 juil. 2022 à 12:49
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `examen`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(20) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`idadmin`, `nom`, `mail`, `password`) VALUES
(49, 'Aly', 'aly@gmail.com', '123'),
(53, 'Gackou', 'Genie@1999', '123'),
(68, 'Fatoumata Binta Keita', 'binta@gmail.com', '123');

-- --------------------------------------------------------

--
-- Structure de la table `enrollement`
--

CREATE TABLE `enrollement` (
  `idenrollement` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idexam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `enrollement`
--

INSERT INTO `enrollement` (`idenrollement`, `iduser`, `idexam`) VALUES
(125, 89, 38),
(126, 89, 40);

-- --------------------------------------------------------

--
-- Structure de la table `exam`
--

CREATE TABLE `exam` (
  `idexam` int(11) NOT NULL,
  `titre` text NOT NULL,
  `date` date NOT NULL,
  `duree` int(25) NOT NULL,
  `nombrequestion` int(11) NOT NULL,
  `pointbonnereponse` varchar(50) NOT NULL,
  `pointmauvaisereponse` varchar(50) NOT NULL,
  `idteacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `exam`
--

INSERT INTO `exam` (`idexam`, `titre`, `date`, `duree`, `nombrequestion`, `pointbonnereponse`, `pointmauvaisereponse`, `idteacher`) VALUES
(38, 'PHP QUIZ 1', '2022-07-24', 1, 5, '4', '-4', 5),
(39, 'Java Quiz 1', '2022-07-29', 5, 10, '2', '-2', 4),
(40, 'PHP Niveau 1', '2022-07-30', 1, 5, '4', '0', 11),
(41, 'PHP Niveau 2', '2022-07-30', 1, 5, '4', '-4', 11);

-- --------------------------------------------------------

--
-- Structure de la table `examuserquestionreponse`
--

CREATE TABLE `examuserquestionreponse` (
  `idexamuserquestionreponse` int(11) NOT NULL,
  `useroptionreponse` enum('1','2','3','4') NOT NULL,
  `point` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idexam` int(11) NOT NULL,
  `idquestion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `examuserquestionreponse`
--

INSERT INTO `examuserquestionreponse` (`idexamuserquestionreponse`, `useroptionreponse`, `point`, `iduser`, `idexam`, `idquestion`) VALUES
(379, '2', 0, 89, 40, 148),
(380, '2', 4, 89, 40, 149),
(381, '1', 0, 89, 40, 150),
(382, '1', 0, 89, 40, 151),
(383, '1', 0, 89, 40, 152);

-- --------------------------------------------------------

--
-- Structure de la table `option`
--

CREATE TABLE `option` (
  `idoption` int(11) NOT NULL,
  `titre` text NOT NULL,
  `idquestion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `option`
--

INSERT INTO `option` (`idoption`, `titre`, `idquestion`) VALUES
(37, 'oui', 133),
(38, 'peut etre', 133),
(39, 'non', 133),
(40, 'meme pas', 133),
(41, 'Brenden ech', 134),
(42, 'Jacaob son', 134),
(43, 'Roseholph', 134),
(44, 'Mark Json', 134),
(45, '100 ans ', 135),
(46, '20 ans', 135),
(47, '40 ans', 135),
(48, '50 ans', 135),
(49, 'oui', 136),
(50, 'peut etre', 136),
(51, 'meme pas', 136),
(52, 'non', 136),
(53, 'serveur', 137),
(54, 'oui et non', 137),
(55, 'logique', 137),
(56, 'oui', 137),
(58, 'Sun Microsystem', 138),
(61, 'Oracle', 139),
(64, 'Microsoft', 139),
(65, 'Non', 140),
(66, 'ca depend', 140),
(67, 'peut etre', 140),
(68, 'Oui', 140),
(69, '1900', 141),
(70, '1800', 141),
(71, '1998', 141),
(72, '1300', 141),
(73, 'Objet', 142),
(74, 'Generique', 142),
(75, 'fonctionnel', 142),
(76, 'commercialisé', 142),
(77, 'Non', 143),
(78, 'Oui', 143),
(79, 'ca depend', 143),
(80, 'peut etre', 143),
(81, 'Non', 144),
(82, 'Oui', 144),
(83, 'Perhapp', 144),
(84, 'commercialisé', 144),
(85, '1ere', 145),
(86, '2eme', 145),
(87, '4eme', 145),
(88, '6eme', 145),
(89, 'Oui', 146),
(90, 'Non', 146),
(91, 'Pas Sur', 146),
(92, 'Surete debut', 146),
(93, 'Non', 147),
(94, 'Oui', 147),
(95, 'Pas sur', 147),
(96, 'Perhapp', 147),
(97, 'IBM', 138),
(98, 'dynamique', 148),
(99, 'statique', 148),
(100, 'informatique comme CSS', 148),
(102, 'Non', 149),
(103, 'Oui', 149),
(104, 'frontend', 150),
(105, 'backend', 150),
(106, 'Oui', 151),
(107, 'Non', 151),
(108, 'Non', 152),
(109, 'Oui', 152),
(110, 'Non', 153),
(111, 'Oui', 153),
(114, 'Non', 154),
(115, 'Oui', 154),
(116, 'Non', 155),
(117, 'Oui', 155),
(118, 'Informatique', 156),
(119, 'Programmation', 156),
(120, 'Non', 157),
(121, 'Oui', 157);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `idquestion` int(11) NOT NULL,
  `titre` text NOT NULL,
  `optionreponse` enum('1','2','3','4') NOT NULL,
  `idexam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`idquestion`, `titre`, `optionreponse`, `idexam`) VALUES
(133, 'PHP est il un langage dynamique ?', '1', 38),
(134, 'PHP a été  dévéloppé par .....', '2', 38),
(135, 'PHP est crée environ .... ans', '3', 38),
(136, 'PHP permet il de faire le front-end d&#039;un site ?', '4', 38),
(137, 'PHP est un langage coté .....', '1', 38),
(138, 'Quelle est l&#039;entreprise fondateur du langage java ?', '2', 39),
(139, 'Quelle entreprise a rachete le langage Java ?', '1', 39),
(140, 'Java est il un langage Orienté Objet ?', '4', 39),
(141, 'Java est cree aux environs de ....', '3', 39),
(142, 'Java est un langage completement ...', '1', 39),
(143, 'Le langage Java permet il de faire l&#039;IA ?', '2', 39),
(144, 'Java est il un langage libre ?', '2', 39),
(145, 'Java est le ..... langage de programmation  le plus puisant au monde ', '2', 39),
(146, 'Java peut il etre  utilise dans un projet web ?', '1', 39),
(147, 'Java a t-il ete un langage generaliste des langages qui existait avant sa creation ?', '2', 39),
(148, 'PHP est langage .....', '1', 40),
(149, 'PHP est  il un langage script ?', '2', 40),
(150, 'PHP est un langage cote ...', '2', 40),
(151, 'PHP est il cree par Gackou ?', '2', 40),
(152, 'PHP est il beaucoup utilise en developpement web  ?', '2', 40),
(153, 'PHP est il un langage Poo ?', '2', 41),
(154, 'PHP admet-elle le MVC ?', '2', 41),
(155, 'PHP est cree en par Jacob Son', '1', 41),
(156, 'PHP  est un langage ....', '2', 41),
(157, 'PHP est completement objet ....?', '1', 41);

-- --------------------------------------------------------

--
-- Structure de la table `teacher`
--

CREATE TABLE `teacher` (
  `idteacher` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `image` blob NOT NULL,
  `autorisation` enum('oui','non') NOT NULL DEFAULT 'non'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `teacher`
--

INSERT INTO `teacher` (`idteacher`, `nom`, `password`, `mail`, `image`, `autorisation`) VALUES
(4, 'Madame Barry', '123', 'b@gmail.com', 0x36326534306262666537396133392e33373439363339302e6a7067, 'non'),
(5, 'MadameR', '123', 'r@gmail.com', 0x36326433343734333434613835302e37383539383039322e6a7067, 'oui'),
(6, 'Curie Paste', '123', 'paste@gmail.com', 0x36326464353135346263333863342e33393539313235372e6a7067, 'oui'),
(7, 'Marina Singer', '123', 'singer@gmail.com', 0x36326464353137663730343662352e30383430313733392e6a7067, 'oui'),
(8, 'Patrice Juz', '123', 'juz@gmail.com', 0x36326464353161356633303737392e32333137363637382e6a7067, 'oui'),
(9, 'Michel Bob', '123', 'bob@gmail.com', 0x36326464353164333038386164352e37393134393133382e6a7067, 'oui'),
(10, 'Prodemo', '123', 'po@gmail.com', 0x36326535306235393632663832332e39373431393333352e6a7067, 'oui'),
(11, 'Christian Etienne', '123', 'etienne@gmail.com', 0x36326464353264326161396130362e38343932303931322e6a7067, 'oui');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` blob NOT NULL,
  `autorisation` enum('oui','non') NOT NULL DEFAULT 'non'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`iduser`, `nom`, `mail`, `password`, `image`, `autorisation`) VALUES
(89, 'Pascal', 'p@gmail.com', '123', 0x36326463636565313435663436382e36313035353933372e6a7067, 'oui'),
(91, 'Marinar Red', 'red@gmail.com', '123', 0x36326464353433306362323433342e33353736373838332e6a7067, 'non');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Index pour la table `enrollement`
--
ALTER TABLE `enrollement`
  ADD PRIMARY KEY (`idenrollement`),
  ADD KEY `idexam` (`idexam`),
  ADD KEY `enrollement_ibfk_1` (`iduser`);

--
-- Index pour la table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`idexam`),
  ADD KEY `idteacher` (`idteacher`);

--
-- Index pour la table `examuserquestionreponse`
--
ALTER TABLE `examuserquestionreponse`
  ADD PRIMARY KEY (`idexamuserquestionreponse`),
  ADD KEY `idexam` (`idexam`),
  ADD KEY `examuserquestionreponse_ibfk_1` (`idquestion`),
  ADD KEY `fb_user` (`iduser`);

--
-- Index pour la table `option`
--
ALTER TABLE `option`
  ADD PRIMARY KEY (`idoption`),
  ADD KEY `idquestion` (`idquestion`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`idquestion`),
  ADD KEY `idexam` (`idexam`);

--
-- Index pour la table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`idteacher`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT pour la table `enrollement`
--
ALTER TABLE `enrollement`
  MODIFY `idenrollement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT pour la table `exam`
--
ALTER TABLE `exam`
  MODIFY `idexam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `examuserquestionreponse`
--
ALTER TABLE `examuserquestionreponse`
  MODIFY `idexamuserquestionreponse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=384;

--
-- AUTO_INCREMENT pour la table `option`
--
ALTER TABLE `option`
  MODIFY `idoption` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `idquestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT pour la table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `idteacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `enrollement`
--
ALTER TABLE `enrollement`
  ADD CONSTRAINT `enrollement_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`);

--
-- Contraintes pour la table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`idteacher`) REFERENCES `teacher` (`idteacher`),
  ADD CONSTRAINT `exam_ibfk_2` FOREIGN KEY (`idteacher`) REFERENCES `teacher` (`idteacher`);

--
-- Contraintes pour la table `examuserquestionreponse`
--
ALTER TABLE `examuserquestionreponse`
  ADD CONSTRAINT `fb_user` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`);

--
-- Contraintes pour la table `option`
--
ALTER TABLE `option`
  ADD CONSTRAINT `option_ibfk_1` FOREIGN KEY (`idquestion`) REFERENCES `question` (`idquestion`);

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`idexam`) REFERENCES `exam` (`idexam`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
