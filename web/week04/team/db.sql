CREATE TABLE Speakers (
	speakerId int NOT NULL Primary Key,
	speakerName varchar(80) NOT NULL
);

CREATE TABLE Sessions (
	sessionId int NOT NULL Primary Key,
	sessionName varchar(80) NOT NULL,
	confId int REFERENCES Conferences(confId)
);

CREATE TABLE Conferences (
	confId int Primary Key NOT NULL,
	confName date NOT NULL
);

CREATE TABLE Talks (
	talkId int NOT NULL Primary Key,
	talkName varchar(80) NOT NULL,
	speakerId int REFERENCES Speakers(speakerId),
	sessionId int REFERENCES Sessions(sessionId)
);

CREATE TABLE Users (
	userId int Primary Key NOT NULL,
	userName varchar (80) NOT NULL
);

CREATE TABLE Notes (
	noteId int Primary Key NOT NULL,
	userId int REFERENCES Users(userId),
	talkId int REFERENCES Talks(talkId),
	note varchar(500) NOT NULL
);

DROP TABLE Speakers, Users, Conferences, Sessions, Talks, Notes;