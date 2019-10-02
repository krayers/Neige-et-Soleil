DROP DATABASE IF EXISTS GESTION_N_S;
CREATE DATABASE GESTION_N_S;
use GESTION_N_S;


CREATE TABLE IF NOT EXISTS `admin` (
  idUtili int(3) NOT NULL AUTO_INCREMENT,
  pseudonyme varchar(20) NOT NULL,
  mdpasse varchar(16) NOT NULL,
  PRIMARY KEY (`idUtili`)
);

INSERT INTO `admin` (`idUtili`, `pseudonyme`, `mdpasse`) VALUES
(1, 'admin', 'soleildeneige');


CREATE TABLE Proprietaire (
  idUtili int(3) not null auto_increment,
  nomUtili varchar(20) not null,
  prenomUtili varchar(20) not null,
  adresseUtili varchar(20) not null,
  villeUtili varchar (20) not null,
  DateNaissUtili date not null,
  primary key (idUtili)
);

CREATE TABLE Locataire (
  idUtili int(3) not null auto_increment,
  nomUtili varchar(20) not null,
  prenomUtili varchar(20) not null,
  adresseUtili varchar(20) not null,
  villeUtili varchar (20) not null,
  DateNaissUtili date not null,
  primary key (idUtili)
);

CREATE TABLE Appartements (
  idAppart int(3) not null auto_increment,
  Adresse varchar(20) not null,
  ville varchar(20) not null,
  description text not null,
  prixj float(8,2) not null,
  prixs float(8,2) not null,
  primary key(idAppart)
);

CREATE TABLE ContratGestion (
  idContratGest int(3) not null auto_increment,
  PrixGestContratJ float(8,2) not null,
  PrixGestContratS float(8,2) not null,
  DateDebut date not null,
  DateFin date not null,
  idUtili int(3) not null,
  Adresse varchar(40) not null,
  ville varchar(30) not null,
  description text not null,
  primary key(idContratGest),
  foreign key(idUtili) references Proprietaire (idUtili)
);

CREATE TABLE Saison (
  idSaison int(3) not null,
  nomSaison varchar(20) not null,
  primary key(idSaison)
);

CREATE TABLE ContratLocation (
  idContratLoc int(3) not null auto_increment,
  PrixLoc float (8,2) not null,
  DateDebut date not null,
  DateFin date not null,
  idAppart int(3) not null,
  idSaison int(3) ,
  idUtili int(3) not null,
  primary key(idContratLoc),
  foreign key(idAppart) references Appartements (idAppart),
  foreign key(idSaison) references Saison (idSaison),
  foreign key(idUtili) references Locataire (idUtili)
);

CREATE TABLE Reservation (
  idReservation int(3) not null auto_increment,
  ptemps ENUM('Jours','Semaines'),
  duree int(2) not null,
  PrixLoc float (8,2) not null,
  DateDebut date not null,
  DateFin date not null,
  idAppart int(3) not null,
  idSaison int(3) ,
  idUtili int(3) not null,
  primary key(idReservation),
  foreign key(idAppart) references Appartements (idAppart),
  foreign key(idSaison) references Saison (idSaison),
  foreign key(idUtili) references Locataire (idUtili)
);
