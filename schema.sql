-- wE-Study database schema.
-- Run this once in phpMyAdmin (InfinityFree control panel -> MySQL Databases
-- -> Admin) after selecting your database.

CREATE TABLE IF NOT EXISTS user_login_data (
    Email    VARCHAR(255) NOT NULL PRIMARY KEY,
    Password VARCHAR(255) NOT NULL          -- stores a bcrypt hash, not plaintext
);

CREATE TABLE IF NOT EXISTS user_form_data (
    Subject     VARCHAR(255) NOT NULL,
    Unit        VARCHAR(255) NOT NULL,
    `Date`      DATE         NOT NULL,
    `Time`      TIME         NOT NULL,
    Name        VARCHAR(255) NOT NULL,
    Meetinglink VARCHAR(500) NOT NULL,
    Email       VARCHAR(255) NOT NULL,
    ID          INT          NOT NULL,
    PRIMARY KEY (Email, ID)
);
