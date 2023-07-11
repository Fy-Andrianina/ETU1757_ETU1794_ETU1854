INSERT INTO utilisateur VALUES(99,'Rakoto','Jean','jean@gmail.com',0,'1998-02-02',1,'0000'),
(100,'Rasolofo','Jacque','jacque@gmail.com',0,'1997-09-12',1,'1111'),
(101,'Ramanana','Tina','tina@gmail.com',0,'2000-01-30',0,'2222'),
(102,'Rakotozafy','Ando','ando@gmail.com',0,'1998-07-10',0,'3333'),
(103,'Randriamanana','Toky','toky@gmail.com',1,'1999-11-02',1,'4444');

-- ---------------- OBJECTIF ----------------------------------------------
INSERT INTO objectif VALUES(40, 'Reduire mon poids');
INSERT INTO objectif VALUES(41, 'Augmenter mon poids');

-- ---------------- INTERVALLE --------------------------------------------

INSERT INTO intervalle VALUES(101, 1, 3);
INSERT INTO intervalle VALUES(102, 4, 7);   
INSERT INTO intervalle VALUES(103, 8, 12);   
INSERT INTO intervalle VALUES(104, 12, 20);   

-- -------------- REGIME ------------------------------------------
INSERT INTO regime VALUES(100, 'ANACA 3', 40, 101, 2, 1500);
INSERT INTO regime VALUES(101, 'ILLIGO', 40, 103, 3, 1200);
INSERT INTO regime VALUES(102, 'CARLO', 41, 102, 2, 1700);

 -- ---------------------------------------------------