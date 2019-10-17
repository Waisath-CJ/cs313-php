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
	quantity int NOT NULL,
	product_type varchar NOT NULL
);

CREATE TABLE Orders (
	order_id SERIAL,
	order_number SERIAL,
	customer_id int,
	PRIMARY KEY (order_id),
	CONSTRAINT FK_customer_id FOREIGN KEY (customer_id)
	REFERENCES Customers(id)
);