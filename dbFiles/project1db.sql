DROP TABLE Consultations, Customers, Flavors, BakedGoods;

CREATE TABLE Customers (
	id SERIAL PRIMARY KEY,
	firstName varchar NOT NULL,
	lastName varchar NOT NULL,
	email varchar NOT NULL,
	phone int NOT NULL,
	username varchar NOT NULL UNIQUE,
	password varchar NOT NULL
);

CREATE TABLE BakedGoods (
	id SERIAL PRIMARY KEY,
	name varchar NOT NULL
);

CREATE TABLE Flavors (
	id SERIAL PRIMARY KEY,
	bakedGood_id int REFERENCES BakedGoods(id),
	flavor varchar NOT NULL
);

CREATE TABLE Consultations (
	id SERIAL PRIMARY KEY,
	customer_id int REFERENCES Customers(id),
	consult_type varchar NOT NULL,
	date DATE NOT NULL,
	time TEXT NOT NULL
);

INSERT INTO Customers(firstName, lastName, street, city, state, zip) VALUES ('CJ', 'Waisath', '3903 E Huber St', 'Mesa', 'AZ', '85205');
INSERT INTO Customers(firstName, lastName, street, city, state, zip) VALUES ('Josh', 'Fast', '649 S 2nd W Apt 3406', 'Rexburg', 'ID', '83440');
INSERT INTO Customers(firstName, lastName, street, city, state, zip) VALUES ('Anne', 'Bonham', '310 E 10600 S Apt 11', 'Sandy', 'UT', '84070');
INSERT INTO BakedGoods(name) VALUES ('Cookies'), ('Brownies'), ('Cupcakes'), ('Cakes'), ('Pies'); 
INSERT INTO Flavors(bakedGood_id, flavor) VALUES ('1', 'Sugar'), ('1', 'Chocolate Chip'), ('1', 'Lemon'), ('1', 'Peanut Butter Ganache'), ('1', 'Chocolate Ganache'), ('1', 'White Chocolate Macadamia');
INSERT INTO Flavors(bakedGood_id, flavor) VALUES ('2', 'Chocolate'), ('2', 'Mint'), ('2', 'Smores');
INSERT INTO Flavors(bakedGood_id, flavor) VALUES ('3', 'Vanilla'), ('3', 'Chocolate'), ('3', 'Red Velvet'), ('3', 'Strawberry Shortcake'), ('3', 'Lemon'), ('3', 'Coconut Creme'), ('3', 'Boston Creme'), ('3', 'Oreo');
INSERT INTO Flavors(bakedGood_id, flavor) VALUES ('4', 'Vanilla'), ('4', 'Chocolate'), ('4', 'Marble'), ('4', 'Pineapple'), ('4', 'Strawberry'), ('4', 'White Chocolate'), ('4', 'Red Velvet');
INSERT INTO Flavors(bakedGood_id, flavor) VALUES ('5', 'Apple'), ('5', 'Pumpkin'), ('5', 'Cherry'), ('5', 'Raspberry');