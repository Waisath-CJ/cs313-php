CREATE TABLE Event (
	id SERIAL NOT NULL PRIMARY KEY,
	location varchar(255) NOT NULL,
	name varchar(200) NOT NULL,
	date date
);

CREATE TABLE Participant (
	id SERIAL NOT NULL PRIMARY KEY,
	name varchar(200) NOT NULL
);

CREATE TABLE Event_Participant (
	id SERIAL NOT NULL PRIMARY KEY,
	event_id int NOT NULL REFERENCES Event(id),
	participant_id int NOT NULL REFERENCES Participant(id)
);