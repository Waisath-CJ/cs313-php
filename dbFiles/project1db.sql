DROP TABLE Orders, Customers, Products;

CREATE TABLE Customers (
	id SERIAL PRIMARY KEY,
	firstName varchar NOT NULL,
	lastName varchar NOT NULL,
	street varchar NOT NULL,
	city varchar NOT NULL,
	state varchar NOT NULL,
	zip varchar NOT NULL
);

CREATE TABLE Products (
	product_id SERIAL PRIMARY KEY,
	product varchar NOT NULL,
	quantity int NOT NULL
);

CREATE TABLE Orders (
	order_id SERIAL PRIMARY KEY,
	order_number SERIAL,
	customer_id int REFERENCES Customers(id),
	product_id int REFERENCES Products(id)
);

INSERT INTO Customers(firstName, lastName, street, city, state, zip) VALUES ('CJ', 'Waisath', '3903 E Huber St', 'Mesa', 'AZ', '85205');
INSERT INTO Customers(firstName, lastName, street, city, state, zip) VALUES ('Josh', 'Fast', '649 S 2nd W Apt 3406', 'Rexburg', 'ID', '83440');
INSERT INTO Customers(firstName, lastName, street, city, state, zip) VALUES ('Anne', 'Bonham', '310 E 10600 S Apt 11', 'Sandy', 'UT', '84070');

INSERT INTO Products(product, quantity) VALUES ('Sugar Cookies', '4'), ('Chocolate Chip Cookies', '12');