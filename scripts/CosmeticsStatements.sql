CREATE TABLE cosmetics (
  cosmetic_id INT NOT NULL,
  cosmetic_code VARCHAR(10) NOT NULL UNIQUE,
  cosmetic_name VARCHAR(255) NOT NULL,
  cosmetic_description TEXT NOT NULL,
  cosmetic_shade VARCHAR(50) NOT NULL,
  cosmetic_finish VARCHAR(50) NOT NULL,
  cosmetic_type_id INT DEFAULT 0,
  cosmetic_buy_price DECIMAL(10,2) NOT NULL,
  cosmetic_sell_price DECIMAL(10,2) NOT NULL,
  date_time_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  date_time_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (cosmetic_id),
  FOREIGN KEY (cosmetic_type_id)
    REFERENCES cosmetic_types(cosmetic_type_id)
    ON DELETE SET NULL
    ON UPDATE CASCADE
);

SELECT * FROM cosmetics;




