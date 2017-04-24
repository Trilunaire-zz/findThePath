CREATE TABLE _users(
	id SERIAL,
	username TEXT UNIQUE NOT NULL,
	password TEXT NOT NULL,
	mail TEXT UNIQUE NOT NULL,
	tel TEXT,
	CONSTRAINT userPK
		PRIMARY KEY (id)
);

CREATE TABLE _trajets(
	id SERIAL PRIMARY KEY,
	depart TEXT NOT NULL,
	arrivee TEXT NOT NULL,
	CONSTRAINT _uniqTraj 
	UNIQUE (depart,arrivee)
);

CREATE TABLE _trajets_users(
	idUSER INTEGER,
	idTraj INTEGER,
	CONSTRAINT _uniqT_for_Us PRIMARY KEY (idUSER,idTraj),
	CONSTRAINT _fk1_TU FOREIGN KEY (idUSER) REFERENCES _users,
	CONSTRAINT _fk2_TU FOREIGN KEY (idTraj) REFERENCES _trajets
);


-- TESTUSER
INSERT INTO _users(username, password, mail) VALUES('miklos','findThePathTest','zoltan.miklos@gmail.com');
INSERT INTO _users(username, password, mail) VALUES('vincent','vincentimes','vincent@gmail.com');
INSERT INTO _users(username, password, mail) VALUES('hugo','hugomette','hugo@gmail.com');
INSERT INTO _users(username, password, mail) VALUES('khalid','khaleidoscope','zkhalide@gmail.com');
INSERT INTO _users(username, password, mail) VALUES('tristan','tristemitoufle','tristan@gmail.com');

-- DATATESTTRAJET
INSERT INTO _trajets(depart,arrivee) VALUES('Rpublique','Beaulieu Restau U');
INSERT INTO _trajets(depart,arrivee) VALUES('Beaulieu Restau U','Rpublique');
INSERT INTO _trajets(depart,arrivee) VALUES('Rpublique','Donzelot');
INSERT INTO _trajets(depart,arrivee) VALUES('Donzelot','Rpublique');
INSERT INTO _trajets(depart,arrivee) VALUES('Le Blizz','Rpublique');
INSERT INTO _trajets(depart,arrivee) VALUES('Rpublique','Le Blizz');
