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
INSERT INTO regime VALUES(103, 'SENIOR', 40, 104, 6, 1500);
INSERT INTO regime VALUES(104, 'FITNESS', 41, 101, 4, 1400);

 -- --------------- SPORT ------------------------------------

INSERT INTO sport VALUES(100, 'Marche tous les matins', 40, 101, 2);
INSERT INTO sport VALUES(101, 'Quelques flexions', 40, 103, 3);
INSERT INTO sport VALUES(102, 'Jogging le soir', 41, 102, 2);
INSERT INTO sport VALUES(103, 'Cordes a sauter', 40, 104, 6);
INSERT INTO sport VALUES(104, 'Yoga apres le diner', 41, 101, 4);

-- --------------- CODE -------------------------------------------

INSERT INTO code VALUES(45, 1234, 1, 1000);
INSERT INTO code VALUES(46, 4567, 1, 1000);
INSERT INTO code VALUES(47, 7898, 1, 1000);
INSERT INTO code VALUES(48, 7946, 1, 1000);
INSERT INTO code VALUES(49, 6363, 1, 1000);
INSERT INTO code VALUES(50, 4159, 1, 1250);
INSERT INTO code VALUES(51, 1592, 1, 1250);
INSERT INTO code VALUES(52, 1364, 1, 1250);
INSERT INTO code VALUES(53, 4983, 1, 1250);
INSERT INTO code VALUES(54, 8711, 1, 1250);
INSERT INTO code VALUES(55, 1256, 1, 1500);
INSERT INTO code VALUES(56, 8931, 1, 1500);
INSERT INTO code VALUES(57, 7931, 1, 1500);
INSERT INTO code VALUES(58, 7591, 1, 1500);
INSERT INTO code VALUES(59, 8917, 1, 1500);

-- ------------ ACHAT CODE ---------------------------------------------

INSERT INTO achat_code VALUES(90, 99, 45, 0);
INSERT INTO achat_code VALUES(91, 101, 49, 0);
INSERT INTO achat_code VALUES(92, 100, 47, 0);

-- ------------------- REMISE --------------------------
INSERT INTO remise VALUES(10, 15, '2023-01-01');
INSERT INTO remise VALUES(11, 0, '2023-01-01');

-- ------------------ STATUs CLIENT ----------------------

INSERT INTO status_client VALUES(20, 'Simple', 0);
INSERT INTO status_client VALUES(24, 'Admin', 0);
INSERT INTO status_client VALUES(26, 'Gold', 2100);

-- ----------------- STATUS_REMISE ----------------------

INSERT INTO status_remise VALUES(10, 20, 11, '2023-01-01');
INSERT INTO status_remise VALUES(11, 24, 11, '2023-01-01');
INSERT INTO status_remise VALUES(12, 26, 10, '2023-01-01');

-- -------------------- UTILISATEUR STATUS ---------------------------------
INSERT INTO utilisateur_status VALUES(50, 99, 20, '2023-01-02');
INSERT INTO utilisateur_status VALUES(51, 100, 20, '2023-01-02');
INSERT INTO utilisateur_status VALUES(52, 101, 20, '2023-01-02');
INSERT INTO utilisateur_status VALUES(53, 102, 20, '2023-01-02');
INSERT INTO utilisateur_status VALUES(54, 103, 24, '2023-01-02');

-- -------------------------------------------------------------


