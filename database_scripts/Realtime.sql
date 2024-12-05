-- Total number of categories
SELECT COUNT(*) AS category_count FROM SportsEquipmentCategories;

-- Total number of products
SELECT COUNT(*) AS product_count FROM SportsEquipmentProducts;

-- Total wholesale price of all products
SELECT SUM(SportsWholesalePrice) AS total_wholesale_price FROM SportsEquipmentProducts;

-- Total list price of all products
SELECT SUM(SportsListPrice) AS total_list_price FROM SportsEquipmentProducts;
