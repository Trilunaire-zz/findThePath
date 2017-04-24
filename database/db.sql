CREATE TABLE _users(
	id SERIAL,
	username TEXT UNIQUE NOT NULL,
	password TEXT NOT NULL,
	mail TEXT UNIQUE NOT NULL,
	tel TEXT,
	CONSTRAINT userPK
		PRIMARY KEY (id)
);

CREATE TABLE _trajets(
	id SERIAL PRIMARY KEY,
	depart TEXT NOT NULL,
	arrivee TEXT NOT NULL,
	CONSTRAINT trajetPK
		PRIMARY KEY (id)
);

CREATE TABLE _trajets_users_(
	idUSER INTEGER FOREIGN KEY REFERENCES _users,
	idTraj INTEGER FOREIGN KEY REFERENCES _trajets,
	CONSTRAINT _uniqT_for_Us PRIMARY KEY (idUSER,idTraj)
);


-- TEST USER
INSERT INTO _users(username, password, mail) VALUES('miklos','findThePathTest','zoltan.miklos@gmail.com');
INSERT INTO _users(username, password, mail) VALUES('vincent','vincentimes','vincent@gmail.com');
INSERT INTO _users(username, password, mail) VALUES('hugo','hugomette','hugo@gmail.com');
INSERT INTO _users(username, password, mail) VALUES('khalid','khaleidoscope','zkhalide@gmail.com');
INSERT INTO _users(username, password, mail) VALUES('tristan','tristemitoufle','tristan@gmail.com');

-- DATA TEST TRAJET
INSERT INTO _trajets(depart,arrivee) VALUES('République','Beaulieu Restau U');
INSERT INTO _trajets(depart,arrivee) VALUES('Beaulieu Restau U','République');
INSERT INTO _trajets(depart,arrivee) VALUES('République','Donzelot');
INSERT INTO _trajets(depart,arrivee) VALUES('Donzelot','République');
INSERT INTO _trajets(depart,arrivee) VALUES('Le Blizz','République');
INSERT INTO _trajets(depart,arrivee) VALUES('République','Le Blizz');
