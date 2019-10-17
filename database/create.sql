CREATE TABLE EVENT
   ( id           SERIAL       NOT NULL PRIMARY KEY
   , name         VARCHAR(200) NOT NULL
   , description  VARCHAR(500) NOT NULL
   , image        VARCHAR(500) NOT NULL);
CREATE TABLE PARTICIPANT
   ( id           SERIAL       NOT NULL PRIMARY KEY
   , name         VARCHAR(30)  NOT NULL);
CREATE TABLE EVENT_PARTICIPANT
   ( id             SERIAL     NOT NULL PRIMARY KEY
   , event_id       INT        NOT NULL REFERENCES EVENT(id)
   , participant_id INT        NOT NULL REFERENCES PARTICIPANT(id));
