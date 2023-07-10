    create table utilisateur(
        id int PRIMARY KEY AUTO_INCREMENT,
        status int,
        nom varchar(40),
        prenom varchar(40),
        email varchar(40),
        motDePasse varchar(30),
        dateDeNaissance date
    );

create table devise(
    id int PRIMARY KEY AUTO_INCREMENT,
    nom varchar(30),
    abreviation varchar(10)
);

create table deviseEquivalence(
    id int PRIMARY KEY AUTO_INCREMENT,
    dateDevise date,
    idDevise int ,
    idDeviseEquivalent int,
    valeur float,
    idSociete int,
    foreign key (idDevise) references devise(id),
    foreign key (idDeviseEquivalent) references devise(id),
    foreign key (idSociete) references identifiants(id)
);
 
create table categorie(
    idcat           int primary key AUTO_INCREMENT,
    numero          varchar(2),
    nom             varchar(20)
);
                     
create table compte (
    id              int primary key AUTO_INCREMENT,
    numeroCompte    varchar(5),
    description     varchar(50),
    idcat           int,
    actif           int,
    passif          int,
    idSociete             int,
    FOREIGN KEY(idSociete) REFERENCES identifiants(id),
    foreign key (idcat) references Categorie(idcat)
);

 CREATE TABLE identifiants(
        id int PRIMARY KEY AUTO_INCREMENT,
        nom varchar(40),
        nif varchar(40),
        nrcs varchar(40),
        ns varchar(40),
        datecreation date,
        siege varchar(40),
        logo varchar(40)
    );
    CREATE TABLE eco (
        id int PRIMARY KEY AUTO_INCREMENT,
        idSociete int,
        capital float,
        datedebex date,
        idDevise int,
        FOREIGN KEY(idDevise) REFERENCES devise(id),
        FOREIGN KEY(idSociete) REFERENCES identifiants(id)
    );
    CREATE TABLE administration (
        id int PRIMARY KEY AUTO_INCREMENT,
        idSociete int,
        dirigeant varchar(50),
        nbEmp int,
        objet varchar(500),
        adresse varchar(100),
        FOREIGN KEY(idSociete) REFERENCES identifiants(id)
    );
    
    CREATE TABLE typeCodeJournal(
        id int PRIMARY key AUTO_INCREMENT,
        nom varchar(20)
    );

    CREATE TABLE codejournal(
        id int PRIMARY KEY AUTO_INCREMENT,
        nom varchar(20),
        abreviation varchar(10), 
        idtype int,
        idSociete int,
        FOREIGN KEY(idtype) REFERENCES typeCJ(id),
        FOREIGN KEY(idSociete) REFERENCES identifiants(id)
    );


create table journal(
    id int PRIMARY KEY AUTO_INCREMENT,
    idCodeJournal int,
    idSociete int,
    description varchar(13),
    dateJournal date,
    idExercice int,
    FOREIGN KEY(idExercice) REFERENCES exercice(id),
    FOREIGN KEY(idSociete) REFERENCES identifiants(id),
    FOREIGN KEY(idCodeJournal) REFERENCES codejournal(id)
);


create table if not exists compte_aux
(
	id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
	numeroCompte varchar(5),
	description varchar(13),
	idCompteGeneral int,
    idSociete int,
    FOREIGN KEY(idSociete) REFERENCES identifiants(id),
	FOREIGN KEY (idCompteGeneral) references compte(id)
);


create table if not exists piece 
(
	id int NOT NULL AUTO_INCREMENT,
	reference varchar(5),
	signification varchar(40),
	PRIMARY KEY (id)
);

create table ecriture(
    id int PRIMARY KEY AUTO_INCREMENT,
    idJournal int,
    dateRHF date,
    referencePiece int,
    numeroPiece varchar(20),
    piece varchar(20),
    idCompteGeneral int,
    idCompteTiers int,
    libelle varchar(500),
    idDevise int,
    debit float,
    credit float,
    FOREIGN KEY(idCompteTiers) REFERENCES compte_aux(id),
    FOREIGN KEY(idCompteGeneral) REFERENCES compte(id),
    FOREIGN KEY(idDevise) REFERENCES devise(id),
    FOREIGN KEY(idJournal) REFERENCES journal(id),
    FOREIGN KEY(referencePiece) REFERENCES piece(id)
);

create table grandLivre(
    idGL int PRIMARY KEY AUTO_INCREMENT,
    dateRHF date,
    credit float,
    debit float,
    libelle varchar(20),
    idCompteGeneral int,
    idCompteTiers int,
    idSociete int,
    idEcriture int,
    FOREIGN KEY(idCompteTiers) REFERENCES compte_aux(id),
    FOREIGN KEY(idSociete) REFERENCES identifiants(id),
    FOREIGN KEY(idEcriture) REFERENCES ecriture(id),
    FOREIGN KEY(idCompteGeneral) REFERENCES compte(id)
);

create table comptesuppr (
    id              int primary key AUTO_INCREMENT,
    numeroCompte    varchar(5),
    description     varchar(50),
    idcat           int,
    actif           int,
    passif          int,
    idSociete             int,
    FOREIGN KEY(idSociete) REFERENCES identifiants(id),
    foreign key (idcat) references Categorie(idcat)
);

create table typeperiode(
    id int PRIMARY key AUTO_INCREMENT,
    nom varchar(50),
    ecart_jour int
);
    create table periodeSociete(
        id int PRIMARY key AUTO_INCREMENT,
        idSociete int,
        typeperiode int,
        FOREIGN KEY(idSociete) REFERENCES identifiants(id),
        FOREIGN KEY(typeperiode) REFERENCES typeperiode(id)
    );

create table exercice(
    id int PRIMARY KEY AUTO_INCREMENT,
    idSociete int,
    dateDebut date,
    dateFin date,
        FOREIGN KEY(idSociete) REFERENCES identifiants(id)
);
/* insert into periodeSociete values(null, 1, 1);
insert into exercice values(null, 1, '2023-03-31', '2023-04-31'); */


create table temp(
    id int PRIMARY KEY AUTO_INCREMENT,
jour varchar(10),
piece varchar(10),
compte varchar(5),
libelle varchar(20),
debit float,
credit float
);

create or replace view SoldeCompte as
SELECT compte.numeroCompte, compte.description, sum(ecriture.debit-ecriture.credit) as solde, journal.dateJournal,compte.idcat
     FROM COMPTE join ecriture on compte.id=ecriture.idCompteGeneral
     join journal on ecriture.idjournal=journal.id
     GROUP BY LEFT (compte.numeroCompte, 2);

CREATE TABLE TypeCentre(
    id int  PRIMARY KEY AUTO_INCREMENT,
    Nom varchar(40)
);
insert into TypeCentre values(null,'Operationnel'),(null,'Structurale');

Create table centreAnalitique(
    id int  PRIMARY KEY AUTO_INCREMENT,
    Nom varchar(40),
    idType int,
    FOREIGN KEY(idType) REFERENCES TypeCentre(id)
);
Create table RepCentreStructurale(
    id int  PRIMARY KEY AUTO_INCREMENT,
    idOperationnel int,
    idStructurale int,
    clef float,
    FOREIGN KEY(idOperationnel) REFERENCES centreAnalitique(id),
    FOREIGN KEY(idStructurale) REFERENCES centreAnalitique(id)
);

create table TypeCharge(
        id int  PRIMARY KEY AUTO_INCREMENT,
        nom varchar(40)
);
insert into TypeCharge(null,'Non Incorporable'),(null,'Suppletive');

Create table ANALITIQUE(
    id int  PRIMARY KEY AUTO_INCREMENT,
    idCompte int,
    idType int,
    FOREIGN KEY(idCompte) REFERENCES compte(id),
    FOREIGN KEY(idType) REFERENCES TypeCharge(id)
);

Create table NatureCharge(
    id int  PRIMARY KEY AUTO_INCREMENT,
    nom varchar(40)
);
insert into NatureCharge values(null,'Variable'),(null,'Fixe');
-------------------------------------------------------------
--Nature(2)           compte(2,2)
Create table RepChargeByNature(
    id int  PRIMARY KEY AUTO_INCREMENT,
    idCompteCharge int,
    Variable float,
    Fixe float,
    FOREIGN KEY(idCompteCharge) REFERENCES compte(id)
);
------------------or --------------
--Nature(1,n)           Compte(1,n)
Create table  RepChargeByNature(
    id int  PRIMARY KEY AUTO_INCREMENT,
    idCompteCharge int,
    idNature int,
    clef float,
    FOREIGN KEY(idCompteCharge) REFERENCES compte(id)
    FOREIGN KEY(idNature) REFERENCES NatureCharge(id)

);
---------------------------------------------------------
--Produit(1,n)          Compte(1,n)
Create table RepChargeByProduit(
    id  int  PRIMARY KEY AUTO_INCREMENT,
    idCompteCharge int,
    idCompteProduit int,
    clef float,
    FOREIGN KEY(idCompteCharge) REFERENCES compte(id),
    FOREIGN KEY(idCompteProduit) REFERENCES compte(id)
);
-- centre(1,n)            Compte(1,n)
Create table RepChargeByCentre(
    id int  PRIMARY KEY AUTO_INCREMENT,
    idCompteCharge int ,
    idCentre int,
    clef float,
    FOREIGN KEY(idCompteCharge) REFERENCES compte(id),
    FOREIGN KEY(idCentre) REFERENCES centreAnalitique(id)
);
-- create table chargeSuppletive(
--      id  int  PRIMARY KEY AUTO_INCREMENT,
--      idCompteSuppletive int,
--      clef float,
--      FOREIGN KEY(idCompteSuppletive) REFERENCES compte(id)
-- );






