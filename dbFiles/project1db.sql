DROP TABLE Consultations, Customers, Flavors, BakedGoods;

CREATE TABLE Customers (
	id SERIAL PRIMARY KEY,
	firstName varchar NOT NULL,
	lastName varchar NOT NULL,
	email varchar NOT NULL,
	phone bigint NOT NULL,
	username varchar UNIQUE,
	password varchar 
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
	consult_type int REFERENCES BakedGoods(id),
	date DATE NOT NULL,
	time TEXT NOT NULL
);

INSERT INTO Customers(firstName, lastName, email, phone) VALUES ('CJ', 'Waisath', 'soccerboycj.97@hotmail.com', '4806332188');
INSERT INTO Customers(firstName, lastName, email, phone) VALUES ('Josh', 'Fast', 'jfast@gmail.com', '8012223322');
INSERT INTO Customers(firstName, lastName, email, phone) VALUES ('Anne', 'Bonham', 'annebonham@gmail.com', '8013456789');
INSERT INTO BakedGoods(name) VALUES ('Cookies'), ('Brownies'), ('Cupcakes'), ('Cakes'), ('Pies'); 
INSERT INTO Flavors(bakedGood_id, flavor) VALUES ('1', 'Sugar'), ('1', 'Chocolate Chip'), ('1', 'Lemon'), ('1', 'Peanut Butter Ganache'), ('1', 'Chocolate Ganache'), ('1', 'White Chocolate Macadamia');
INSERT INTO Flavors(bakedGood_id, flavor) VALUES ('2', 'Chocolate'), ('2', 'Mint'), ('2', 'Smores');
INSERT INTO Flavors(bakedGood_id, flavor) VALUES ('3', 'Vanilla'), ('3', 'Chocolate'), ('3', 'Red Velvet'), ('3', 'Strawberry Shortcake'), ('3', 'Lemon'), ('3', 'Coconut Creme'), ('3', 'Boston Creme'), ('3', 'Oreo');
INSERT INTO Flavors(bakedGood_id, flavor) VALUES ('4', 'Vanilla'), ('4', 'Chocolate'), ('4', 'Marble'), ('4', 'Pineapple'), ('4', 'Strawberry'), ('4', 'White Chocolate'), ('4', 'Red Velvet');
INSERT INTO Flavors(bakedGood_id, flavor) VALUES ('5', 'Apple'), ('5', 'Pumpkin'), ('5', 'Cherry'), ('5', 'Raspberry');