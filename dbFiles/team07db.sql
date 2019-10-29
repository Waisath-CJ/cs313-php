DROP TABLE Users;

CREATE TABLE Users (
    id SERIAL PRIMARY KEY,
    username varchar NOT NULL,
    password varchar NOT NULL
);

\i team07query.sql