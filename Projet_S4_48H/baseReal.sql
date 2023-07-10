CREATE DATABASE projet48h;
\c projet48h

-- table sexe
CREATE TABLE sexe (
    idSexe SERIAL PRIMARY KEY,
    nomSexe VARCHAR(10) NOT NULL
);
-- table users
CREATE TABLE users(
    idUser serial PRIMARY KEY,
    name varchar,
    email varchar,
    password varchar,
    isAdmin int default 1,
    sexe serial NOT NULL REFERENCES sexe(idsexe)
);
insert into sexe(nomSexe) values('femme'),('homme');
insert into users(name,email,password,isAdmin,sexe) values('user1','user1@gmail.com','1234',0,1),('user2','user2@gmail.com','1234',default,1);