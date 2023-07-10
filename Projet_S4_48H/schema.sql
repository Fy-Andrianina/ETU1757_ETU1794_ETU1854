CREATE DATABASE IF NOT EXISTS regime;
USE regime;

CREATE TABLE utilisateur(
    id_utilisateur INT NOT NULL AUTO_INCREMENT,
    nom VARCHAR(100),
    prenom VARCHAR(50),
    email VARCHAR(100),
    is_admin INT,
    date_naissance DATE,
    genre INT,
    mdp VARCHAR(20),
    PRIMARY KEY(id_utilisateur,email)
);

CREATE TABLE objectif(
    id_objectif INT NOT NULL AUTO_INCREMENT,
    nom_objectif VARCHAR(80),
    PRIMARY KEY(id_objectif,nom_objectif)
);

CREATE TABLE information_client(
    id_information INT NOT NULL AUTO_INCREMENT,
    id_utilisateur INT,
    date_information DATE,
    id_objectif INT,
    taille DOUBLE,
    poids DOUBLE,
    PRIMARY KEY(id_information),
    FOREIGN KEY(id_utilisateur) REFERENCES utilisateur(id_utilisateur),
    FOREIGN KEY(id_objectif) REFERENCES objectif(id_objectif)
);

CREATE TABLE intervalle(
    id_intervalle INT NOT NULL AUTO_INCREMENT,
    min_poids DOUBLE,
    max_poids DOUBLE,
    PRIMARY KEY(id_intervalle)
);

CREATE TABLE regime(
    id_regime INT NOT NULL AUTO_INCREMENT,
    nom_regime VARCHAR(100),
    id_objectif INT,
    id_intervalle INT,
    durree_regime DOUBLE,
    prix_regime DOUBLE,
    PRIMARY KEY(id_regime),
    FOREIGN KEY(id_objectif) REFERENCES objectif(id_objectif),
    FOREIGN KEY(id_intervalle) REFERENCES intervalle(id_intervalle)
);

CREATE TABLE sport(
    id_sport INT NOT NULL AUTO_INCREMENT,
    nom_sport VARCHAR(100),
    id_objectif INT,
    id_intervalle INT,
    durree_intervalle DOUBLE,
    PRIMARY KEY(id_sport),
    FOREIGN KEY(id_objectif) REFERENCES objectif(id_objectif),
    FOREIGN KEY(id_intervalle) REFERENCES intervalle(id_intervalle)
);

CREATE TABLE prestation(
    id_prestation INT NOT NULL AUTO_INCREMENT,
    id_utilisateur INT,
    date_prestation DATE,
    id_regime INT,
    id_sport INT,
    PRIMARY KEY(id_prestation),
    FOREIGN KEY(id_utilisateur) REFERENCES utilisateur(id_utilisateur),
    FOREIGN KEY(id_regime) REFERENCES regime(id_regime),
    FOREIGN KEY(id_sport) REFERENCES sport(id_sport)
);

CREATE TABLE transactions(
    id_transactions INT NOT NULL AUTO_INCREMENT,
    id_utilisateur INT,
    date_transactions DATE,
    entrer_sortie INT,
    montant DOUBLE,
    PRIMARY KEY(id_transactions),
    FOREIGN KEY(id_utilisateur) REFERENCES utilisateur(id_utilisateur)
);

CREATE TABLE plat(
    id_plat INT NOT NULL AUTO_INCREMENT,
    nom_plat VARCHAR(100) UNIQUE,
    PRIMARY KEY(id_plat)
);

CREATE TABLE regime_plat(
    id_regime_plat INT NOT NULL AUTO_INCREMENT,
    id_regime INT,
    id_plat INT,
    PRIMARY KEY(id_regime_plat),
    FOREIGN KEY(id_regime) REFERENCES regime(id_regime),
    FOREIGN KEY(id_plat) REFERENCES plat(id_plat)
);

CREATE TABLE code(
    id_code INT NOT NULL AUTO_INCREMENT,
    code_details VARCHAR(10) UNIQUE,
    is_valid INT,
    PRIMARY KEY(id_code)
);

CREATE TABLE achat_code(
    id_achat INT NOT NULL AUTO_INCREMENT,
    id_utilisateur INT,
    id_code INT,
    is_valid INT,
    PRIMARY KEY(id_achat),
    FOREIGN KEY(id_utilisateur) REFERENCES utilisateur(id_utilisateur),
    FOREIGN KEY(id_code) REFERENCES code(id_code)
);

CREATE TABLE aliments(
    id_aliments INT NOT NULL AUTO_INCREMENT,
    nom_aliments VARCHAR(100) UNIQUE,
    PRIMARY KEY(id_aliments)
);

CREATE TABLE plat_aliments(
    id_plat_aliments INT NOT NULL AUTO_INCREMENT,
    id_plat INT,
    id_aliments INT,
    gramage INT,
    PRIMARY KEY(id_plat_aliments),
    FOREIGN KEY(id_plat) REFERENCES plat(id_plat),
    FOREIGN KEY(id_aliments) REFERENCES aliments(id_aliments)
);