DROP TABLE Scripture_Topic, Scriptures, Topics;
CREATE TABLE Scriptures(
id SERIAL PRIMARY KEY,
book VARCHAR (45) NOT NULL,
chapter VARCHAR (45) NOT NULL,
verse VARCHAR (45) NOT NULL,
content VARCHAR (255) NOT NULL
);

CREATE TABLE Topics (
    id SERIAL PRIMARY KEY,
    name VARCHAR NOT NULL
);

CREATE TABLE Scripture_Topic (
    id SERIAL PRIMARY KEY,
    scripture_id int REFERENCES Scriptures(id),
    topic_id int REFERENCES Topics(id)
);

INSERT INTO Scriptures (book, chapter, verse, content) VALUES('John', '1', '5', 'And the light shineth in darkness; and the darkness comprehended it not.');
INSERT INTO Scriptures (book, chapter, verse, content) VALUES('D&C','88','49','The light shineth in darkenss, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.');
INSERT INTO Scriptures (book, chapter, verse, content) VALUES('D&C','93','28','He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.');
INSERT INTO Scriptures (book, chapter, verse, content) VALUES('Mosiah','16','9','He is the light and the life of the world; yea, a light that is endless, that can never by darkened; yea, and also a life which is endless, that there can be no more death.');

INSERT INTO Topics (name) VALUES ('Faith'), ('Hope'), ('Charity');