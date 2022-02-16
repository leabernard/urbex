-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 19 fév. 2021 à 23:16
-- Version du serveur :  10.1.47-MariaDB-0+deb9u1
-- Version de PHP : 7.0.33-0+deb9u10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `utilisateurs`
--

-- --------------------------------------------------------

--
-- Structure de la table `ArticleLike`
--

CREATE TABLE `ArticleLike` (
  `_ID` int(11) NOT NULL,
  `IDUser` int(11) NOT NULL,
  `IDJeu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ArticleLike`
--

INSERT INTO `ArticleLike` (`_ID`, `IDUser`, `IDJeu`) VALUES
(38, 40, 8),
(39, 40, 11),
(41, 48, 3),
(42, 48, 7),
(44, 40, 1),
(45, 40, 2),
(48, 79, 2),
(52, 48, 6),
(56, 48, 27),
(61, 81, 80),
(62, 48, 79),
(63, 40, 84),
(65, 40, 12),
(66, 48, 86),
(67, 48, 83),
(68, 48, 17),
(71, 48, 81),
(72, 48, 89),
(76, 47, 83),
(77, 47, 85),
(78, 47, 78),
(86, 84, 27),
(87, 84, 22),
(88, 84, 21),
(91, 84, 80),
(92, 84, 4),
(93, 84, 3),
(94, 84, 2),
(95, 84, 29),
(96, 48, 90),
(97, 85, 81),
(98, 85, 21),
(99, 85, 33),
(100, 85, 84),
(101, 85, 88),
(102, 85, 29),
(103, 85, 74),
(104, 48, 18),
(105, 48, 8),
(109, 81, 77),
(110, 40, 77),
(111, 79, 77),
(112, 70, 77),
(113, 85, 77),
(114, 47, 14),
(115, 48, 77),
(116, 48, 21),
(117, 47, 25),
(119, 47, 1),
(121, 47, 27),
(122, 89, 22);

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `commentaire` varchar(500) NOT NULL,
  `idjeux` int(11) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `idjeux`, `iduser`) VALUES
(174, 'tres bon jeux pour haker des gens', 5, 47),
(175, 'aussi bon que le 2', 16, 47),
(176, 'elle est baisable', 23, 47),
(178, 'toupie beyblade beyblade hypere vitesse', 33, 47),
(179, 'il se lance des gets a la geules', 32, 47),
(181, 'je pense oui', 32, 47),
(191, 'c\'est nul', 25, 48),
(203, 'UwU', 2, 48),
(214, 'test', 30, 48),
(215, 'j\'adore ce jeu', 2, 79),
(217, 'test', 23, 48),
(218, 'test', 22, 48),
(219, 'test', 22, 48),
(220, '<3', 12, 40),
(221, 'lol', 2, 48),
(222, 'Jeux tres fun mais certaine personne toxic ', 80, 81),
(223, 'Auto-proclamé meilleur toplaner de cette classe. Je possède Dieu-Roi Garen et Dieu-Roi Darius. Je suis donc l\'être ultime.', 80, 84),
(224, 'le jeux est mort', 27, 81),
(225, 'test', 8, 48),
(226, 'le jeux est beuger', 14, 47),
(227, 'test', 21, 48),
(228, 'Légendaire', 22, 89);

-- --------------------------------------------------------

--
-- Structure de la table `Game`
--

CREATE TABLE `Game` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `texte` text NOT NULL,
  `type` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Game`
--

INSERT INTO `Game` (`id`, `nom`, `texte`, `type`) VALUES
(1, 'The Last Of Us Part 2', 'Le jeu suit Ellie, la fille qui était le protagoniste secondaire et le compagnon du personnage du joueur dans The Last of Us. Le jeu se déroule cinq ans après la fin de l\'original. Ellie (qui a maintenant 19 ans) et Joel ont survécu et vivent à Jackson, Wyoming, où Ellie sort avec une autre fille, Dina. Cependant, les personnages doivent faire face au culte pervers appelé les Séraphites, qui essaient de sacrifier leurs anciens membres. Une question de vengeance oblige Ellie et ses amis à entreprendre un voyage à Seattle, Washington, pour tuer leurs ennemis. Le thème principal de l\'intrigue est qu\'Ellie traite ses problèmes de haine.', 'Aventure'),
(2, 'Fallout 4', 'Octobre 2077 dans une petite banlieue de Boston. La pelouse est parfaite, les robots ramassent la moindre feuille que l’automne précipite vers le sol. Je me prépare à une journée tranquille dans cette amérique aseptisée où le communisme n’a pas la moindre chance de poser le pied. J’ai un fils de trois mois et une femme aimante. Je m’ennuie comme un rat mort et je sens déjà poindre le désespoir d’une vie morne qui me fera sombrer dans l’alcool et le buffout. Cinq minutes plus tard, les bombes atomiques pleuvent sur les Etats-Unis : une catastrophe, un drame, la fin du monde… mais pour moi, c’est une libération, le début d’une vraie vie.', 'Openworld'),
(3, 'Fallout 76', 'Nouvelle entrée dans la série Fallout, ce Fallout 76 se présente comme un jeu multijoueur de survie. On y incarnera un habitant de l\'abris 76 a peine 25 ans après l\'holocauste nucléaire, qui a pour tâche de rebâtir le monde pour la population des autres abris.', 'Openworld'),
(4, 'Five Nights at Freddy\'s', 'Le but des jeux prinicpaux est de survivre cinq nuits chez Freddy. Depuis une salle de contrôle, le joueur doit surveiller au moyen de caméras des animatroniques (ou animatronics en anglais), c\'est-à-dire des robots à l\'effigie d\'animaux, qui cherchent à rentrer dans la pièce où se situe le joueur. Bien que ce dernier ait accès aux moniteurs des caméras, aux portes et aux lumières du bâtiment, il ne pourra pas les activer simultanément : il devra le faire en alternance. Il y a aussi une quantité de batterie à respecter. Il s\'agit donc d\'un jeu de gestion stressant amplifié par une ambiance horrifique.', 'Survie'),
(5, 'Watch Dog 2', 'Watch Dogs 2 est un jeu d\'aventure en monde ouvert faisant suite aux événements du premier épisode. Ce nouvel opus de la franchise nous entraîne au cœur de la ville de San Francisco dans la peau du nouveau héros Marcus Holloway, un jeune hacker surdoué victime des algorithmes prédictifs du ctOS 2.0 qui l’accusent d’un crime qu’il n’a pas commis. Dans sa quête de vérité, Marcus pourra hacker les infrastructures de la ville ainsi que les personnes qui sont connectées au réseau.', 'Openworld'),
(6, 'Call of Duty Modern Warfare', 'Call of Duty Modern Warfare est un jeu de tir à la première personne. Le joueur incarne tour à tour un soldat du SAS ou un combattant de la liberté d\'un pays du Proche-Orient. Le jeu adopte un ton sombre et mature, pour plus de réalisme.', 'Action'),
(7, 'Red Dead Redemption II', 'Suite du précédent volet multi récompensé, Red Dead Redemption II nous permet de nous replonger sur PS4 dans une ambiance western synonyme de vastes espaces sauvages et de villes malfamées. L\'histoire se déroule en 1899, avant le premier Red Dead Redemption, au moment où Arthur Morgan doit fuir avec sa bande à la suite d\'un braquage raté.', 'Openworld'),
(8, 'The Division 2', 'Tom Clancy\'s The Division est un jeu d\'action en ligne où le joueur est au cœur d\'un univers post-apocalyptique. Ce dernier doit jongler entre coopération, stratégie et technologie pour survivre dans un environnement hostile. Partez en compagnie de la Division pour sauver Washington D.C. de l\'effondrement.', 'Aventure'),
(9, 'GTA 5', 'Jeu d\'action-aventure en monde ouvert, Grand Theft Auto (GTA) V vous place dans la peau de trois personnages inédits : Michael, Trevor et Franklin. Ces derniers ont élu domicile à Los Santos, ville de la région de San Andreas. Braquages et missions font partie du quotidien du joueur qui pourra également cohabiter avec 15 autres utilisateurs dans cet univers persistant s\'il joue sur PS3/Xbox 360 ou 29 s\'il joue sur PS4/Xbox One/PC.', 'Openworld'),
(10, 'Uncharted 4', 'Quatrième opus de la série de jeu d\'action/aventure à succès de Naughty Dog, Uncharted 4 A Thief\'s End vous permet d\'incarner Nathan Drake pour la première fois sur PS4. Le célèbre explorateur devra révéler le complot qui se cache derrière un légendaire trésor de pirates', 'Aventure'),
(11, 'God of War', 'Dans ce nouvel épisode de God Of War, le héros évoluera dans un monde aux inspirations nordiques, très forestier et montagneux. Dans ce beat-them-all, un enfant accompagnera le héros principal, pouvant apprendre des actions du joueur, et même gagner de l\'expérience.', 'Aventure'),
(12, 'Fallout New Vegas', 'Fallout New Vegas est un jeu de rôle sur PC se déroulant dans un univers post-apocalyptique. Le jeu propose une grande liberté d\'évolution et d\'interactions avec l\'univers allant de la \"persuasion\" d\'autrui (dans tous les sens du terme) jusqu\'à la destruction massive de ses ennemis par satellite.', 'Openworld'),
(14, 'CyberBug 2077', 'Cyberpunk 2077 est un jeu vidéo d\'action-RPG en vue à la première personne développé par CD Projekt RED, fondé sur la série de jeu de rôle sur table Cyberpunk 2020 conçue par Mike Pondsmith.', 'Openworld'),
(15, 'UFC 3', 'EA Sports UFC 3 sur PS4 est un jeu de combat, directement inspiré de l\'UFC, un championnat américain de free-fight. Les joueurs peuvent utiliser de nombreux styles de combat, en utilisant notamment les coups de pieds, de poings, de genoux, de coudes, etc... Le jeu bénéficie d\'une modélisation très fidèle des combattants, notamment au niveau de leur peau.', 'Sport'),
(16, 'Watch Dogs Legion', 'Watch Dogs Legion, troisième épisode de la série d\'Ubisoft, vous plonge dans le Londres post-Brexit ultra-connecté et surveillé. Vous aurez la possibilité d\'hacker n\'importe qui, mais aussi d\'en prendre possession. Chaque mort est permanente, d\'où l\'utilité de prendre possession des PNJ.', 'Openworld'),
(17, 'Hitman', 'Hitman est un jeu d\'infiltration-action jouable en solo. Le joueur y incarne l\'Agent 47 le célèbre tueur à gages. L\'objectif est de remplir des contrats en éliminant des cibles aussi puissantes que célèbres dans des lieux exotiques à travers tout le globe.', 'Action'),
(18, 'Raimbow six', 'Rainbow Six sur PC est un jeu d\'action tactique dans lequel vous incarnez un membre de l\'élite antiterroriste. La stratégie joue une grande part dans ce titre où vous devez donner des instructions à votre groupe d\'intervention afin de mener chaque mission à son terme.', 'Multijoueurs'),
(19, 'Jurassic World Evolution', 'Jurassic World : Evolution est un jeu de gestion qui permet de créer son propre parc d\'attractions sur la légendaire île d\'Isla Nublar et les îles environnantes de l\'archipel de la Muerte. Il est notamment possible de créer de nouvelles races de dinosaures, des attractions ainsi que des installations de confinement et de recherche.', 'Gestion'),
(20, 'Les Sims', 'Les Sims 4 est une simulation de vie qui permet au joueur de créer ses personnages et de les faire évoluer dans un univers qu\'il customise lui-même. Ce nouvel épisode fait apparaître les émotions qui sont déterminantes dans le ressenti et l\'évolution des sims. Celles-ci dépendent de leur environnement. Les sims peuvent désormais effectuer plusieurs tâches en même temps, contrairement aux autres épisodes.', 'Gestion'),
(21, 'Overwatch', 'Jeu d\'action en vue à la première personne, Overwatch prend place dans un futur proche, en 2074 pour être exact. Dans des parties en 6 contre 6, le joueur incarne un héros parmi la palette proposée. Chaque personnage a des caractéristiques et des capacités particulières et un rôle défini parmi Attaque, Défense, Tank et Soutien. Les équipes cherchent donc un équilibre afin d\'être le plus efficace possible dans l\'accomplissement des objectifs (Capture de points, etc).', 'Multijoueurs'),
(22, 'Counter Strike', 'Ancien mod de Half-Life destiné au multijoueur, Counter-Strike : Global offensive est un jeu de tir à la première personne. Les joueurs y choisissent le camp des terroristes ou des anti-terroristes avant de s\'affronter dans des batailles sans merci. Plusieurs modes de jeux sont disponibles (dont un d\'entraînement) et les combattants ont accès à plus de trente armes différentes.', 'Multijoueurs'),
(23, 'Tomb Raider', 'Jeu d\'action-aventure, Tomb Raider vous permet d\'incarner la jeune Lara Croft, âgée de 21 ans, qui va devoir survivre sur une île à la suite d\'un naufrage. Pour ce faire, elle devra se nourrir, chasser mais aussi faire attention aux menaces qui planent sur elle.', 'Survie'),
(24, 'Fallout 3', 'Fallout 3 est un jeu de rôle en 3D se déroulant dans un monde post-apocalyptique. Le joueur y fait évoluer son personnage comme il le souhaite et choisit la façon dont il va communiquer et interagir avec les autres personnages. Il peut débloquer jusqu\'à 200 fins différentes.', 'Openworld'),
(25, 'The last of Us 1', 'Le survival action The Last of Us sur PS3 suit Joel et d\'Ellie à travers les Etats-Unis. Les deux devront s\'entraider pour survivre à une mystérieuse peste. La nature commence à s\'approprier les villes abandonnées et les quelques survivants s\'entretuent pour récupérer le peu de nourriture et d\'armes encore présentes.', 'Aventure'),
(26, 'Fortnite', 'Fortnite est un Tower-Defense orienté sandbox. Les joueurs se réunissent en équipe et doivent crafter armes et pièges pour ensuite construire une forteresse et la défendre contre les nombreux monstres qui viendront l\'assaillir.', 'Multijoueurs'),
(27, 'Apex', 'Apex Legends est un battle royale free to play développé par Respawn Entertainment et édité par Electronic Arts. Si les mechas / titans ne sont pas de la partie, ils sont remplacés par des \"compétences surnaturelles de héros style MOBA, avec du jeu en solo et multi jusqu’en équipe de trois\".', 'Multijoueurs'),
(28, 'Farming Simulator 2019', 'Farming Simulator 20 est le prochain épisode du jeu de simulation agricole de Giants Software. Comme à l\'accoutumée, il est question de gérer cultures, vente des récoltes, élevage d\'animaux, dans le but de développer votre exploitation.', 'Simulation'),
(29, 'Minecraft', 'Jeu bac à sable indépendant et pixelisé dont le monde infini est généré aléatoirement, Minecraft permet au joueur de récolter divers matériaux, d\'élever des animaux et de modifier le terrain selon ses choix, en solo ou en multi (via des serveurs). Il doit également survivre en se procurant de la nourriture et en se protégeant des monstres qui apparaissent la nuit et dans des donjons. Il peut également monter de niveau afin d\'acheter des enchantements.', 'Openworld'),
(30, 'Trackmania', 'Trackmania Nations Remake est un jeu particulièrement populaire en ligne, notamment de par son aspect sandbox et compétitif. Dans ce nouvel opus on pourra compter sur un remaniement graphique et encore plus de libertés sur la création de circuits personnalisés avec de nouveaux éléments de décors et de piste.', 'Course'),
(31, 'The Legend of Zelda: Link\'s Awakening', 'The Legend of Zelda : Link\'s Awakening (2019) est un remake de l\'épisode culte de la saga paru en 1993 sur Game Boy. Il est cette fois-ci question d\'une refonte totale du quatrième opus de la série, dans lequel nous suivons Link, échoué sur l\'île mystérieuse de Cocolint.', 'Aventure'),
(32, 'Splatoon 2', 'Splatoon 2 sur Switch est un jeu de tir à la troisième personne se jouant massivement en multijoueur. La particularité du titre est que vos différentes armes projettent de la peinture et non des balles. Parcourez des environnements entre amis, aspergez-vous de peinture et transformez-vous en calamars pour vous cacher dans les flaques colorées.', 'Action'),
(33, 'Super Smash Bros Ultimate', 'Super Smash Bros Ultimate est un jeu de combat sur Switch. Cet opus Ultimate regroupe l\'intégralité des combattants déjà apparus dans l\'histoire de Super Smash Bros. 75 personnages jouables seront disponibles en comptant le dresseur, ainsi que tous ses Pokémon.', 'Multijoueurs'),
(73, 'nfl 2021', 'Madden NFL 21 est le nouvel opus de la série Madden NFL. Il vous permet de jouer les équipes les plus connues du football américain. Le jeu promet d\'apporter des innovations qui rendront la série plus fun et plus authentique', 'sport'),
(74, 'Luigi Mansion 3', 'Luigi\'s Mansion 3 est la prochaine aventure du frère de Mario. Luigi doit une nouvelle fois affronter ses peurs les plus profondes dans un terrifiant manoir hanté. Il peut pour cela compter sur son aspirateur à fantômes pour l\'aider. Un nouveau personnage sera ajouté : Gluigi, un Luigi tout vert, possédant des capacités particulières. Le jeu sera jouable en coopération jusqu\'à 8 joueurs.', 'plateforme'),
(76, 'Mario Bros WII', 'Les frangins moustachus et en salopette sont de retour en 3D sur DS avec New Super Mario Bros. Faites les voyager à travers des champs, sous l\'eau, dans des châteaux et même dans les airs pour sauver Peach. En marge de la progression principale, des centaines de mini-missions sont là pour tester votre agilité. Le vrai défi du jeu réside dans la quête des 240 pièces étoile qui vous permettent d\'ouvrir des passages secrets vers les 8 mondes.', 'plateforme'),
(77, 'Genshin Impact', 'Bienvenue dans l\'univers de Genshin Impact, un action RPG en monde ouvert. Le monde de Teyvat est un endroit rempli de magie, où des quêtes épiques ne demandent qu’à être entreprise. En des temps immémoriaux, les dieux élémentaires donnèrent aux humains la civilisation. Mais peu de temps après la terre se divisa, et sombra dans la corruption et la cupidité.', 'Aventure'),
(78, 'Assasin Creed Vahalla', 'Assassin\'s Creed Valhalla est un RPG en monde ouvert se déroulant pendant l\'âge des vikings. Vous incarnez Eivor, un viking du sexe de votre choix qui a quitté la Norvège pour trouver la fortune et la gloire en Angleterre. Raids, construction et croissance de votre colonie, mais aussi personnalisation du héros ou de l\'héroïne sont au programme de cet épisode.', 'Action'),
(79, 'Hitman 3', 'Hitman 3 est un jeu d\'infiltration dans lequel vous incarnez l\'agent 47. Dans ce troisième épisode de la nouvelle trilogie lancée en 2017, six lieux sont disponibles au lancement, mais il est possible de transférer les anciennes missions des deux premiers volets.', 'Action'),
(80, 'League of Legends', 'Inspiré du mod DotA (Defense of the Ancients) de Warcraft III, League of Legends est un MOBA, une arène de bataille en ligne multijoueur. Dans le mode classique, deux équipes de cinq joueurs s\'affrontent dans des parties qui durent en moyenne entre 40 minutes et dont l\'objectif est de détruire la base ennemie. Évoluant dans un univers heroic-fantasy, chaque joueur incarne un champion différent, aux capacités uniques, qu\'il choisit à chaque début de partie. Des modes aléatoires sont également présents, ainsi que des événements saisonniers qui apportent un souffle de nouveauté.', 'Stratégie'),
(81, 'Civilization VI', 'Civilization VI est un jeu de stratégie proposant au joueur de régner en maître sur le monde au fil des siècles. C\'est le sixième opus de la saga reconnue des Sid Meier\'s Civilization. Civilization VI renouvelle les codes de la licence : développez votre empire à travers la carte, faites progresser votre culture et tenez tête aux plus grands dirigeants de l\'histoire.', 'Stratégie'),
(82, 'Euro Truck Simulator 2', 'Euro Truck Simulator 2 nous invite non seulement à conduire d\'énormes camions dans toute l\'Europe, mais aussi à fonder notre propre entreprise de transport sur PC. En acceptant diverses missions de livraison, le joueur gagnera de l\'argent qu\'il pourra investir pour améliorer ses véhicules, embaucher des employés ou aggrandir son affaire. Outre de nouveaux graphismes, cette suite dispose d\'une carte plus vaste et d\'une physique plus réaliste.', 'Simulation'),
(83, 'f1 2020', 'F1 2020 est une simulation de course de Formule 1. Dans cette édition, vous pourrez accomplir toutes les épreuves de la saison 2020. Le jeu possède en tout 22 circuits qu\'il sera possible de traverser dans un tout nouveau mode, nommé Equipe', 'course'),
(84, 'The Witcher 3 : Wild Hunt', 'The Witcher 3 : Wild Hunt est un Action-RPG se déroulant dans un monde ouvert. Troisième épisode de la série du même nom, inspirée des livres du polonais Andrzej Sapkowski, cet opus relate la fin de l\'histoire de Geralt de Riv.', 'Aventure'),
(85, 'Satisfactory', 'Satisfactory est un jeu de type simulation développé par Coffee Stain Studios. En vue à la première personne sur une planète exotique, nous allons devoir collecter divers matériaux afin d\'ériger maintes constructions, seul ou à plusieurs.', 'Simulation'),
(86, 'Flight Simulator 2020', 'Flight Simulator est le dernier opus de la franchise de simulation de vol. Pilotez des avions légers ou des gros porteurs au travers de toute la planète. Développez votre plan de vol en prenant garde aux conditions météorologiques.', 'Simulation'),
(87, 'MudRunner', 'Spintires: MudRunnerest un jeu de course. Il présente un nouvel environnement de jeu \"Sandbox\" en plus des 5 environnements du jeu original, une refonte graphique complète, un nouveau mode Challenge avec 9 environnements dédiés, 13 nouveaux véhicules tout-terrain, et des améliorations sur tous les aspects du jeu.', 'Simulation'),
(88, 'Skyrim The Elder Scrolls', 'The Elder Scrolls V : Skyrim est le cinquième épisode de la saga de jeux de rôle du même nom. Le scénario se passe 200 ans après l\'histoire du quatrième opus, quand Alduin fait son retour au milieu d\'une guerre civile. Seul le Dovahkiin, incarné par le joueur, peut mettre un terme à cette sombre affaire... Un monde gigantesque empli de quêtes est à explorer et auquel se sont rajoutées des extensions débloquant plus de quêtes.', 'Aventure'),
(89, 'Anno 1800', 'Anno 1800 sur PC est un jeu de gestion qui se déroule au 19ème siècle, à l\'aube de l\'ère industrielle. Comme d\'habitude, le jeu propose de mettre vos talents de dirigeant à l\'épreuve dans la construction de métropoles pour par la suite explorer et conquérir des terres nouvelles.', 'Gestion'),
(90, 'Mario Kart 8 Deluxe', 'Mario Kart 8 sur Switch est un jeu de course coloré et délirant qui reprend les personnages phares des grandes licences Nintendo. Le joueur peut y affronter ses amis dans différents modes et types de coupes et a accès à 32 circuits aux environnements variés. Il est possible de jouer jusqu\'à 12 simultanément en ligne et 4 en local.', 'course');

-- --------------------------------------------------------

--
-- Structure de la table `Info`
--

CREATE TABLE `Info` (
  `id` int(11) NOT NULL,
  `info` varchar(5000) NOT NULL,
  `desct` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Info`
--

INSERT INTO `Info` (`id`, `info`, `desct`) VALUES
(10, 'Bienvenue sur la V.2 !', 'nouvelle version du site !'),
(11, 'Nouveauté :', 'Nouvelle gestion des jeux et des commentaires. Suppression des animation et des séries temporairement.'),
(14, 'A venir :', 'Ajout de jeux, d\'un bouton pour supprimé l\'image de profil de l\'utilisateur. ');

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `id` int(50) NOT NULL,
  `MDP` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `admin` varchar(50) NOT NULL,
  `pdp` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `User`
--

INSERT INTO `User` (`id`, `MDP`, `pseudo`, `admin`, `pdp`) VALUES
(40, '23w9j4', 'Asgarrrr', 'true', '40_asgarrr.png'),
(47, 'la main', 'lucum', 'true', '47_1f30af1b3370aaf2ba3de413bbaf8783.jpg'),
(48, 'Ale761mioNW2002', 'Woulfty', 'true', 'default.png'),
(60, '123456789', 'Admin', 'false ', 'default.png'),
(69, '123', 'lea', 'false', 'default.png'),
(70, '456', 'lolo', 'false', 'default.png'),
(79, 'le lapin', 'pinpin', 'false', '79_téléchargement.jpg'),
(80, '123', 'Julien', 'false', 'default.png'),
(81, 'pxcleme', 'pxcleme', 'false', '81_Jinx-Poro-Wallpapers-HD.jpg'),
(82, '33', 'alex', 'false', 'default.png'),
(83, '123', 'UwU', 'false', 'default.png'),
(84, '030120', 'julien0301', 'false', 'default.png'),
(85, 'Hentai', 'Zerzeusse', 'false', 'default.png'),
(88, '123', 'conan', 'false', 'default.png'),
(89, 'weshlesgars', 'Louis', 'false', 'default.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ArticleLike`
--
ALTER TABLE `ArticleLike`
  ADD UNIQUE KEY `_ID` (`_ID`),
  ADD KEY `IDJeu` (`IDJeu`),
  ADD KEY `IDUser` (`IDUser`) USING BTREE;

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commantaire` (`commentaire`(191),`idjeux`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idjeux` (`idjeux`);

--
-- Index pour la table `Game`
--
ALTER TABLE `Game`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nom` (`nom`);

--
-- Index pour la table `Info`
--
ALTER TABLE `Info`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nom` (`pseudo`),
  ADD KEY `MDP` (`MDP`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ArticleLike`
--
ALTER TABLE `ArticleLike`
  MODIFY `_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT pour la table `Game`
--
ALTER TABLE `Game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT pour la table `Info`
--
ALTER TABLE `Info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ArticleLike`
--
ALTER TABLE `ArticleLike`
  ADD CONSTRAINT `ArticleLike_ibfk_1` FOREIGN KEY (`IDUser`) REFERENCES `User` (`id`),
  ADD CONSTRAINT `ArticleLike_ibfk_2` FOREIGN KEY (`IDJeu`) REFERENCES `Game` (`id`);

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `User` (`id`),
  ADD CONSTRAINT `commentaires_ibfk_2` FOREIGN KEY (`idjeux`) REFERENCES `Game` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
