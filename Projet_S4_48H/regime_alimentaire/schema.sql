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

-- --------------------------------------------------------------

CREATE TABLE remise(
    id_remise INT NOT NULL AUTO_INCREMENT,
    taux DOUBLE,
    date_taux DATE,
    PRIMARY KEY(id_remise)
);

-- -----------------------------------------------------------

CREATE TABLE status_client(
    id_status_client INT NOT NULL AUTO_INCREMENT,
    nom_status VARCHAR(50),
    prix DOUBLE,
    PRIMARY KEY(id_status_client)
);


CREATE TABLE status_remise(
    id_status_remise INT NOT NULL AUTO_INCREMENT,
    id_status_client INT,
    id_remise INT,
    date_status_remise DATE,
    PRIMARY KEY(id_status_remise),
    FOREIGN KEY(id_status_client) REFERENCES statue_client(id_status_client),
    FOREIGN KEY(id_remise) REFERENCES remise(id_remise)
);


CREATE TABLE utilisateur_status(
    id_utilisateur_status INT NOT NULL AUTO_INCREMENT,
    id_utilisateur INT,
    id_status_client INT,
    date_user_status DATE,
    PRIMARY KEY(id_utilisateur_status),
    FOREIGN KEY(id_utilisateur) REFERENCES utilisateur(id_utilisateur),
    FOREIGN KEY(id_status_client) REFERENCES status_client(id_status_client)
);
-- --------------------------------------------------------------

-- select t.*, b.*
-- from (select utilisateur.id_utilisateur, utilisateur.nom , status_client.*
--     from utilisateur_status
--     join utilisateur on utilisateur.id_utilisateur = utilisateur_status.id_utilisateur
--     join status_client on status_client.id_status_client = utilisateur_status.id_status_client
--     order by date_user_status desc) as t 
--     join (select status_client.*, remise.taux, date_taux
--     from status_remise
--     join status_client on status_client.id_status_client = status_remise.id_status_client
--     join remise on remise.id_remise = status_remise.id_remise
--     order by status_remise.date_status_remise) as b on b.id_status_client = t.id_status_client
--     where t.id_utilisateur = 99




-- --------------------------------------------------------------

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



-- -----------------------------------------

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
    montant_code DOUBLE,
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

-- ------------------------ 
CREATE OR REPLACE VIEW v_details_achat_code as(
    select achat_code.*, code.code_details, code.montant_code, utilisateur.nom
    from achat_code
    inner join code on code.id_code = achat_code.id_code
    inner join utilisateur on utilisateur.id_utilisateur = achat_code.id_utilisateur
);

-- --------------------------------------------
CREATE OR REPLACE VIEW v_regime_detail as(
    select regime.*, objectif.nom_objectif, intervalle.min_poids, intervalle.max_poids
    from regime
    inner join intervalle on intervalle.id_intervalle = regime.id_intervalle
    inner join objectif on objectif.id_objectif = regime.id_objectif
);

-- -------------------------------------------

CREATE OR REPLACE VIEW v_sport_detail as(
    select sport.*, objectif.nom_objectif, intervalle.min_poids, intervalle.max_poids
    from sport
    inner join intervalle on intervalle.id_intervalle = sport.id_intervalle
    inner join objectif on objectif.id_objectif = sport.id_objectif
);

-- ---------------- CODE -------------------------------------------
