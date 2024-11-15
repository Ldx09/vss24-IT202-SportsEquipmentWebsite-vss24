-- Creating the StoreManagers table for MSSQL
CREATE TABLE SportsEquipmentManager (
 SportsEquipmentManagerID      INT(11)      NOT NULL   AUTO_INCREMENT,
 emailAddress VARCHAR(255) NOT NULL   UNIQUE,
 password     CHAR(64)     NOT NULL,
   pronouns               VARCHAR(60)    NOT NULL,
 firstName    VARCHAR(60)  NOT NULL,
 lastName     VARCHAR(60)  NOT NULL,
  dateCreated            DATETIME       NOT NULL,
PRIMARY KEY (SportsEquipmentManagerID)
);

-- Inserting data into StoreManagers table
INSERT INTO SportsEquipmentManager (emailAddress, password, pronouns, firstName, lastName, dateCreated)
VALUES
  ('john@store.com', SHA2('john@store09', 256), 'He/Him', 'John', 'Doe', NOW()),
  ('jane@store.com', SHA2('jane@store08', 256), 'She/Her', 'Jane', 'Smith', NOW()),
  ('alex@store.com', SHA2('alex@store07', 256), 'They/Them', 'Alex', 'Johnson', NOW());

-- Selecting all data from the table
SELECT * FROM SportsEquipmentManager;

