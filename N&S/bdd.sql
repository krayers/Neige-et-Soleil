DROP DATABASE IF EXISTS GESTION_N_S;
CREATE DATABASE GESTION_N_S;
use GESTION_N_S;

CREATE TABLE Utilisateurs (
  idUtili int(3) not null auto_increment,
  pseudonyme varchar(20) not null unique,
  mdpasse varchar(16) not null,
  nomUtili varchar(20) not null,
  prenomUtili varchar(20) not null,
  adresseUtili varchar(20) not null,
  codepostUtili varchar (20) not null,
  DateNaissUtili date not null,
  primary key (idUtili)
);

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
  primary key(idAppart)
);

CREATE TABLE ContratGestion (
  idContratGest int(3) not null auto_increment,
  PrixGestContrat float(6,4) not null,
  DateDebut date not null,
  DateFin date not null,
  idUtili int(3) not null,
  idAppart int(3) not null,
  primary key(idContratGest),
  foreign key(idUtili) references Proprietaire (idUtili),
  foreign key(idAppart) references Appartements (idAppart)
);

CREATE TABLE Saison (
  idSaison int(3) not null,
  nomSaison varchar(20) not null,
  primary key(idSaison)
);

CREATE TABLE ContratLocation (
  idContratLoc int(3) not null auto_increment,
  PrixLoc float (6,4) not null,
  DateDebut date not null,
  DateFin date not null,
  idAppart int(3) not null,
  idSaison int(3) not null,
  idUtili int(3) not null,
  primary key(idContratLoc),
  foreign key(idAppart) references Appartements (idAppart),
  foreign key(idSaison) references Saison (idSaison),
  foreign key(idUtili) references Locataire (idUtili)
);
