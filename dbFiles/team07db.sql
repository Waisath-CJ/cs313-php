DROP TABLE People;

CREATE TABLE People (
    id SERIAL PRIMARY KEY,
    username varchar NOT NULL,
    password varchar NOT NULL
);

\i team07query.sql