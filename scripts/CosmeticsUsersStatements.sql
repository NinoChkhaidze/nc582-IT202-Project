
-- Name: Nintsi Chkhaidze
-- Date: February 13, 2026
-- Course: IT202
-- Section: 006
-- Assignment: Phase 1 - Database and Login
-- Email: nc582@njit.edu

CREATE DATABASE cosmetic;

CREATE USER 'ts_user'@'localhost'
IDENTIFIED BY 'InventoryHelper';

GRANT SELECT, UPDATE, INSERT, DELETE on cosmetic.* TO 'ts_user'@'localhost';

SHOW GRANTS FOR 'ts_user'@'localhost';

USE cosmetic;

CREATE TABLE cosmetic_users (
    cosmetic_user_id INT NOT NULL AUTO_INCREMENT,
    email_address VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(64) NOT NULL,
    pronouns VARCHAR(60) NOT NULL,
    first_name VARCHAR(60) NOT NULL,
    last_name VARCHAR(60) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    date_time_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    date_time_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (cosmetic_user_id)
);

Select * from cosmetic_users;

INSERT INTO cosmetic_users (email_address, password, pronouns, first_name, last_name, phone_number)
VALUES ('nintsichkhaidze@cosmetics.com', SHA2('thisismypassword',256), 'she/her', 'Nintsi', 'Chkhaidze', '555-0011');

INSERT INTO cosmetic_users (email_address, password, pronouns, first_name, last_name, phone_number)
VALUES ('maikogavasheli@cosmetics.com', SHA2('maiko123',256), 'she/her', 'Maiko', 'Gavasheli', '505-0101');

INSERT INTO cosmetic_users (email_address, password, pronouns, first_name, last_name, phone_number)
VALUES ('nininatsvlo@cosmetics.com', SHA2('niniko',256), 'she/her', 'Nini', 'Natsvlishvili', '555-7777');
