-- Drop the table if it already exists to avoid errors
DROP TABLE IF EXISTS SportsEquipmentCategories;

-- Create the SportsEquipmentCategories table
CREATE TABLE SportsEquipmentCategories (
    SportsCategoriesID INT NOT NULL GENERATED ALWAYS AS IDENTITY, -- Primary key with auto-increment for DB2
    SportsCategoriesCode VARCHAR(255) NOT NULL UNIQUE, -- Unique category code
    SportsCategoriesName VARCHAR(255) NOT NULL, -- Category name
    SportsCategoriesShelf VARCHAR(50) NOT NULL, -- Shelf location of category
    DateCreated TIMESTAMP NOT NULL DEFAULT NOW(), -- Timestamp of creation
    PRIMARY KEY (SportsCategoriesID) -- Set the primary key
);

-- Insert some sample data
INSERT INTO SportsEquipmentCategories (SportsCategoriesCode, SportsCategoriesName, SportsCategoriesShelf, DateCreated)
VALUES
('BK', 'Bikes', 'Aisle 5', NOW()),
('SH', 'Shoes', 'Aisle 4', NOW()),
('TN', 'Tennis Rackets', 'Aisle 3', NOW()),

INSERT INTO SportsEquipmentCategories (SportsCategoriesCode, SportsCategoriesName, SportsCategoriesShelf, DateCreated)
VALUES
('DM', 'Dumbbell Set', 'Aisle 2', NOW());

INSERT INTO SportsEquipmentCategories (SportsCategoriesCode, SportsCategoriesName, SportsCategoriesShelf, DateCreated)
VALUES
('YM', 'Yoga Mat', 'Aisle 1', NOW());

-- Select all records to check data
SELECT * FROM SportsEquipmentCategories;
