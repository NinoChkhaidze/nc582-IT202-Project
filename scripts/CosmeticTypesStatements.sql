-- Active: 1769487845725@@127.0.0.1@3306@cosmetic
CREATE TABLE cosmetic_types (
  cosmetic_type_id INT NOT NULL,
  cosmetic_type_code VARCHAR(255) NOT NULL UNIQUE,
  cosmetic_type_name VARCHAR(255) NOT NULL,
  cosmetic_shelf_number VARCHAR(10) NOT NULL,
  date_time_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  date_time_updated 
  TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (cosmetic_type_id)
);

show tables;
INSERT INTO cosmetic_types (cosmetic_type_id, cosmetic_type_code, cosmetic_type_name, cosmetic_shelf_number)
VALUES
(1, 'FND', 'Foundation', 'A1');

Select * from cosmetic_types;

INSERT INTO cosmetic_types (cosmetic_type_id, cosmetic_type_code, cosmetic_type_name, cosmetic_shelf_number)
VALUES
(2, 'LIP', 'Lipstick', 'B3');

INSERT INTO cosmetic_types (cosmetic_type_id, cosmetic_type_code, cosmetic_type_name, cosmetic_shelf_number)
VALUES
(3, 'EYE', 'Eye-liner', 'C3');

