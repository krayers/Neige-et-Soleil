DROP DATABASE IF EXISTS GESTION_N_S;
CREATE DATABASE GESTION_N_S;
use GESTION_N_S;

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `idUtili` int(3) NOT NULL AUTO_INCREMENT,
  `pseudonyme` varchar(20) NOT NULL,
  `mdpasse` varchar(16) NOT NULL,
  PRIMARY KEY (`idUtili`),
  UNIQUE KEY `pseudonyme` (`pseudonyme`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`idUtili`, `pseudonyme`, `mdpasse`) VALUES
(1, 'admin', 'soleildeneige');

-- --------------------------------------------------------

--
-- Structure de la table `appartements`
--

DROP TABLE IF EXISTS `appartements`;
CREATE TABLE IF NOT EXISTS `appartements` (
  `idAppart` int(3) NOT NULL AUTO_INCREMENT,
  `Adresse` varchar(20) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `prixj` float(8,2) NOT NULL,
  `prixs` float(8,2) NOT NULL,
  PRIMARY KEY (`idAppart`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `appartements`
--

INSERT INTO `appartements` (`idAppart`, `Adresse`, `ville`, `description`, `prixj`, `prixs`) VALUES
(1, '3 rue des carottes', 'Quille', 'Appartement rénové', 38.00, 260.00),
(2, '13 avenue Alembert', 'Quille', 'Derniere renovation 5 ans', 30.00, 245.00);

-- --------------------------------------------------------

--
-- Structure de la table `contratgestion`
--

DROP TABLE IF EXISTS `contratgestion`;
CREATE TABLE IF NOT EXISTS `contratgestion` (
  `idContratGest` int(3) NOT NULL AUTO_INCREMENT,
  `PrixGestContratJ` float(8,2) NOT NULL,
  `PrixGestContratS` float(8,2) NOT NULL,
  `DateDebut` date NOT NULL,
  `DateFin` date NOT NULL,
  `idUtili` int(3) NOT NULL,
  `Adresse` varchar(40) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`idContratGest`),
  KEY `idUtili` (`idUtili`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `contratlocation`
--

DROP TABLE IF EXISTS `contratlocation`;
CREATE TABLE IF NOT EXISTS `contratlocation` (
  `idContratLoc` int(3) NOT NULL AUTO_INCREMENT,
  `PrixLoc` float(8,2) NOT NULL,
  `DateDebut` date NOT NULL,
  `DateFin` date NOT NULL,
  `idAppart` int(3) NOT NULL,
  `idSaison` int(3) DEFAULT NULL,
  `idUtili` int(3) NOT NULL,
  PRIMARY KEY (`idContratLoc`),
  KEY `idAppart` (`idAppart`),
  KEY `idSaison` (`idSaison`),
  KEY `idUtili` (`idUtili`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contratlocation`
--

INSERT INTO `contratlocation` (`idContratLoc`, `PrixLoc`, `DateDebut`, `DateFin`, `idAppart`, `idSaison`, `idUtili`) VALUES
(1, 900.00, '1111-11-11', '2222-02-22', 1, NULL, 1),
(3, 900.00, '1111-11-11', '2222-02-22', 1, NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `locataire`
--

DROP TABLE IF EXISTS `locataire`;
CREATE TABLE IF NOT EXISTS `locataire` (
  `idUtili` int(3) NOT NULL AUTO_INCREMENT,
  `nomUtili` varchar(20) NOT NULL,
  `prenomUtili` varchar(20) NOT NULL,
  `adresseUtili` varchar(20) NOT NULL,
  `villeUtili` varchar(20) NOT NULL,
  `DateNaissUtili` date NOT NULL,
  PRIMARY KEY (`idUtili`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `proprietaire`
--

DROP TABLE IF EXISTS `proprietaire`;
CREATE TABLE IF NOT EXISTS `proprietaire` (
  `idUtili` int(3) NOT NULL AUTO_INCREMENT,
  `nomUtili` varchar(20) NOT NULL,
  `prenomUtili` varchar(20) NOT NULL,
  `adresseUtili` varchar(20) NOT NULL,
  `villeUtili` varchar(20) NOT NULL,
  `DateNaissUtili` date NOT NULL,
  PRIMARY KEY (`idUtili`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `idReservation` int(3) NOT NULL AUTO_INCREMENT,
  `ptemps` enum('Jours','Semaines') DEFAULT NULL,
  `duree` int(2) NOT NULL,
  `PrixLoc` float(8,2) NOT NULL,
  `DateDebut` date NOT NULL,
  `DateFin` date NOT NULL,
  `idAppart` int(3) NOT NULL,
  `idSaison` int(3) DEFAULT NULL,
  `idUtili` int(3) NOT NULL,
  PRIMARY KEY (`idReservation`),
  KEY `idAppart` (`idAppart`),
  KEY `idSaison` (`idSaison`),
  KEY `idUtili` (`idUtili`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`idReservation`, `ptemps`, `duree`, `PrixLoc`, `DateDebut`, `DateFin`, `idAppart`, `idSaison`, `idUtili`) VALUES
(1, 'Semaines', 2, 245.00, '1111-11-11', '2222-02-22', 2, NULL, 1),
(2, 'Semaines', 2, 245.00, '1111-11-11', '1112-11-11', 2, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `saison`
--

DROP TABLE IF EXISTS `saison`;
CREATE TABLE IF NOT EXISTS `saison` (
  `idSaison` int(3) NOT NULL,
  `nomSaison` varchar(20) NOT NULL,
  PRIMARY KEY (`idSaison`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `idUtili` int(3) NOT NULL AUTO_INCREMENT,
  `pseudonyme` varchar(20) NOT NULL,
  `mdpasse` varchar(255) NOT NULL,
  `nomUtili` varchar(20) NOT NULL,
  `prenomUtili` varchar(20) NOT NULL,
  `adresseUtili` varchar(40) NOT NULL,
  `codepostUtili` varchar(20) NOT NULL,
  `DateNaissUtili` date NOT NULL,
  `emailUtili` varchar(50) NOT NULL,
  PRIMARY KEY (`idUtili`),
  UNIQUE KEY `pseudonyme` (`pseudonyme`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`idUtili`, `pseudonyme`, `mdpasse`, `nomUtili`, `prenomUtili`, `adresseUtili`, `codepostUtili`, `DateNaissUtili`, `emailUtili`) VALUES
(1, 'LL123', 'Wal123', 'Ibrahim', 'El Walid', '9 avenue Auguste LumiÃ¨re', '93420', '2000-06-18', ''),
(2, 'ElWalid92420', 'Wal123', 'Ibrahim', 'El Walid', '9 avenue Auguste LumiÃ¨re', '93420', '1111-11-11', ''),
(3, 'Er12', 'Walfort18', 'aaa', 'aaa', 'aaaaaa', '75013', '2222-02-22', ''),
(4, 'azer', '*F8E10D1CD91080E8A2CFB4232C087F3913B4CB51', 'toto', 'tutu', 'rue a', '33333', '2222-11-11', ''),
(5, 'aqzs', '*DA72A95CE179279B82CB50B6305F584117BA456D', 'aqzsed', 'azer', '9 avenue Auguste Lumière', '93420', '1211-03-12', 'SDZQG@dncen.fr'),
(6, 'azesqdf', '*FBE3F57748F04759C837DDFBF1641E4A91890FD5', 'azfgev', 'fsvsbvdx', '1 ed eghb', '23214', '2222-02-22', 'asdfz@sj.fr');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
