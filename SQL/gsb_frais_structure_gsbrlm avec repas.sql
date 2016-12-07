-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Lun 04 Juillet 2011 à 14:08
-- Version du serveur: 5.5.8
-- Version de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- !40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT;
-- !40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS;
-- !40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION ;
-- !40101 SET NAMES utf8 ;

--
-- Base de données: `gsb_frais`
--

drop DATABASE if exists gsbrlm_db;
create DATABASE gsbrlm_db;
use gsbrlm_db;

-- --------------------------------------------------------

--
-- Structure de la table `FraisForfait`
--

CREATE TABLE FraisForfait (
  idFrais char(3) NOT NULL,
  libelle char(20) DEFAULT NULL,
  montant decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (idFrais)
) ENGINE=InnoDB;


-- --------------------------------------------------------

--
-- Structure de la table `Etat`
--

CREATE TABLE Etat (
  idEtat char(2) NOT NULL,
  libelle varchar(30) DEFAULT NULL,
  PRIMARY KEY (idEtat)
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Structure de la table `Visiteur`
--

CREATE TABLE Visiteur (
  idVisiteur char(4) NOT NULL,
  nom char(30) DEFAULT NULL,
  prenom char(30)  DEFAULT NULL, 
  login char(20) DEFAULT NULL,
  mdp char(20) DEFAULT NULL,
  adresse char(30) DEFAULT NULL,
  cp char(5) DEFAULT NULL,
  ville char(30) DEFAULT NULL,
  dateEmbauche date DEFAULT NULL,
  PRIMARY KEY (idVisiteur)
) ENGINE=InnoDB;


-- --------------------------------------------------------

--
-- Structure de la table `FicheFrais`
--

CREATE TABLE FicheFrais (
  idVisiteur char(4) NOT NULL,
  DateOperation char(6) DEFAULT NULL,
  RepasMidi char(2) DEFAULT NULL,
  Nuite char(2) DEFAULT NULL,
  Etape char(5) DEFAULT NULL,
  Km char(5) DEFAULT NULL,
  Situation char(50) DEFAULT NULL,
  Remboursement int DEFAULT NULL,
  nbJustificatifs int(11) DEFAULT NULL,
  montantValide decimal(10,2) DEFAULT NULL,
  dateModif date DEFAULT NULL,
  idEtat char(2) DEFAULT 'CR',
  PRIMARY KEY (idVisiteur,DateOperation),
  FOREIGN KEY (idEtat) REFERENCES Etat(idEtat),
  FOREIGN KEY (idVisiteur) REFERENCES Visiteur(idVisiteur)
) ENGINE=InnoDB;


-- --------------------------------------------------------

--
-- Structure de la table `LigneFraisForfait`
--

CREATE TABLE LigneFraisForfait (
  idVisiteur char(4) NOT NULL,
  DateOperation char(6) NOT NULL,
  idFrais char(3) NOT NULL,
  quantite int(11) DEFAULT NULL,
  PRIMARY KEY (idVisiteur,DateOperation,idFrais),
  FOREIGN KEY (idVisiteur, DateOperation) REFERENCES FicheFrais(idVisiteur, DateOperation),
  FOREIGN KEY (idFrais) REFERENCES FraisForfait(idFrais)
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Structure de la table `LigneFraisHorsForfait`
--

CREATE TABLE LigneFraisHorsForfait (
  idHorsForfait int(11) NOT NULL auto_increment,
  idVisiteur char(4) NOT NULL,
  dateFrais date DEFAULT NULL,
  libelle varchar(100) DEFAULT NULL,
  montant decimal(10,2) DEFAULT NULL,
  Situation char(20) DEFAULT NULL,
  DateOperation char(6) NOT NULL,
  PRIMARY KEY (idHorsForfait, idVisiteur, DateOperation),
  FOREIGN KEY (idVisiteur, DateOperation) REFERENCES FicheFrais(idVisiteur, DateOperation)
) ENGINE=InnoDB;
