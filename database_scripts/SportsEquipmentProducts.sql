-- Drop the table if it already exists to avoid errors
DROP TABLE IF EXISTS SportsEquipmentProducts;

-- Create the SportsEquipmentProducts table
CREATE TABLE SportsEquipmentProducts (
    SportsProductsID INT(11) NOT NULL AUTO_INCREMENT, -- Primary key
    SportsProductsCode VARCHAR(10) NOT NULL UNIQUE, -- Unique product code
    SportsProductsName VARCHAR(255) NOT NULL, -- Product name
    SportsDescription TEXT NOT NULL, -- Description of the product
    SportsProductsColor VARCHAR(255) NOT NULL, -- Color of the product
    SportsCategoryID INT(11) NOT NULL, -- Foreign key referring to SportsEquipmentCategories
    SportsWholesalePrice DECIMAL(10, 2) NOT NULL, -- Wholesale price
    SportsListPrice DECIMAL(10, 2) NOT NULL, -- List price
    DateCreated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, -- Timestamp of creation
    PRIMARY KEY (SportsProductsID), -- Set the primary key
    FOREIGN KEY (SportsCategoryID) REFERENCES SportsEquipmentCategories(SportsCategoriesID) -- Foreign key constraint
);

-- Insert items for 'Bikes' (Category Code: 'BK')
INSERT INTO SportsEquipmentProducts (SportsProductsCode, SportsProductsName, SportsDescription, SportsProductsColor, SportsCategoryID, SportsWholesalePrice, SportsListPrice, DateCreated)
VALUES
('BK01', 'Mountain Bike', 'Durable bike for off-road cycling.', 'Red', 1, 500.00, 650.00, NOW()),
('BK02', 'Road Bike', 'Lightweight bike for speed on paved roads.', 'Blue', 1, 800.00, 999.00, NOW()),
('BK03', 'Hybrid Bike', 'Versatile bike for both on and off-road.', 'Green', 1, 600.00, 750.00, NOW()),

INSERT INTO SportsEquipmentProducts (SportsProductsCode, SportsProductsName, SportsDescription, SportsProductsColor, SportsCategoryID, SportsWholesalePrice, SportsListPrice, DateCreated)
VALUES
('CF SLX7', 'Canyon Endurance', 'A modern road bike for long rides.', 'Black', 1, 3000.00, 3599.00, NOW());


-- Insert items for 'Shoes' (Category Code: 'SH')
INSERT INTO SportsEquipmentProducts (SportsProductsCode, SportsProductsName, SportsDescription, SportsProductsColor, SportsCategoryID, SportsWholesalePrice, SportsListPrice, DateCreated)
VALUES
('SH01', 'Running Shoes', 'Comfortable shoes for long-distance running.', 'Black', 2, 70.00, 100.00, NOW()),
('SH02', 'Basketball Shoes', 'High-ankle shoes for basketball players.', 'White', 2, 120.00, 150.00, NOW()),
('SH03', 'Tennis Shoes', 'Grippy shoes for better movement on the court.', 'Yellow', 2, 90.00, 130.00, NOW()),

INSERT INTO SportsEquipmentProducts (SportsProductsCode, SportsProductsName, SportsDescription, SportsProductsColor, SportsCategoryID, SportsWholesalePrice, SportsListPrice, DateCreated)
VALUES
('AJ1', 'Air Jordan 1 Retro High', 'Classic sneaker with premium materials.', 'White', 2, 150.00, 180.00, NOW());

-- Insert items for 'Tennis Rackets' (Category Code: 'TN')
INSERT INTO SportsEquipmentProducts (SportsProductsCode, SportsProductsName, SportsDescription, SportsProductsColor, SportsCategoryID, SportsWholesalePrice, SportsListPrice, DateCreated)
VALUES
('TN01', 'Wilson Pro Staff', 'A professional-grade tennis racket.', 'Black', 3, 150.00, 200.00, NOW()),
('TN02', 'Babolat Pure Drive', 'Powerful racket for advanced players.', 'Blue', 3, 180.00, 230.00, NOW()),
('TN03', 'Yonex Ezone', 'Lightweight racket with improved control.', 'Green', 3, 140.00, 190.00, NOW()),

INSERT INTO SportsEquipmentProducts (SportsProductsCode, SportsProductsName, SportsDescription, SportsProductsColor, SportsCategoryID, SportsWholesalePrice, SportsListPrice, DateCreated)
VALUES
('BA PA2023', 'Babolat Pure Aero Team 2023', 'Racquet for intermediate players.', 'Blue', 3, 200.00, 259.00, NOW());

INSERT INTO SportsEquipmentProducts (SportsProductsCode, SportsProductsName, SportsDescription, SportsProductsColor, SportsCategoryID, SportsWholesalePrice, SportsListPrice, DateCreated)
VALUES
('DM01', 'Adjustable Dumbbells', 'Weight-adjustable dumbbells for strength training.', 'Silver', 25, 50.00, 80.00, NOW()),
('DM02', 'Hex Dumbbells', 'Hexagon-shaped dumbbells for stability.', 'Black', 25, 40.00, 60.00, NOW()),
('DM03', 'Vinyl Dumbbells', 'Lightweight vinyl dumbbells for toning.', 'Pink', 25, 20.00, 30.00, NOW());

INSERT INTO SportsEquipmentProducts (SportsProductsCode, SportsProductsName, SportsDescription, SportsProductsColor, SportsCategoryID, SportsWholesalePrice, SportsListPrice, DateCreated)
VALUES
('YM01', 'Eco-Friendly Yoga Mat', 'Non-toxic and durable yoga mat.', 'Green', 26, 25.00, 40.00, NOW()),
('YM02', 'Extra Thick Yoga Mat', 'Extra cushion for joint comfort during yoga.', 'Purple', 26, 30.00, 45.00, NOW()),
('YM03', 'Travel Yoga Mat', 'Foldable and lightweight yoga mat for travel.', 'Blue', 26, 20.00, 35.00, NOW());


-- Select all records to check data
SELECT * FROM SportsEquipmentProducts;
