# Dec 5 2024
# IT202001
#Sports Equipment Website
#vss24@njit.edu


<?php
require_once('database.php'); // Ensure database.php contains the getDB() function to establish a connection to MySQL

class Item
{
    public $itemID;
    public $itemCode;
    public $itemName;
    public $description;
    public $color;
    public $categoryID;
    public $wholesalePrice;
    public $listPrice;
    public $dateCreated;

    // Constructor
    public function __construct(
        $itemID,
        $itemCode,
        $itemName,
        $description,
        $color,
        $categoryID,
        $wholesalePrice,
        $listPrice,
        $dateCreated
    ) {
        $this->itemID = $itemID;
        $this->itemCode = $itemCode;
        $this->itemName = $itemName;
        $this->description = $description;
        $this->color = $color;
        $this->categoryID = $categoryID;
        $this->wholesalePrice = $wholesalePrice;
        $this->listPrice = $listPrice;
        $this->dateCreated = $dateCreated;
    }

    // String representation of the object
    public function __toString()
    {
        return "<h2>Item ID: $this->itemID</h2>" .
            "<h2>Code: $this->itemCode</h2>" .
            "<h2>Name: $this->itemName</h2>" .
            "<h2>Description: $this->description</h2>" .
            "<h2>Color: $this->color</h2>" .
            "<h2>Category ID: $this->categoryID</h2>" .
            "<h2>Wholesale Price: $this->wholesalePrice</h2>" .
            "<h2>List Price: $this->listPrice</h2>" .
            "<h2>Date Created: $this->dateCreated</h2>";
    }

    // Save item to the database
    public function saveItem()
    {
        $db = getDB();
        $query = "INSERT INTO SportsEquipmentProducts 
                  (SportsProductsCode, SportsProductsName, SportsDescription, SportsProductsColor, SportsCategoryID, SportsWholesalePrice, SportsListPrice) 
                  VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($query);
        if (!$stmt) {
            error_log("Error: Prepare failed for saveItem. " . $db->error);
            return false;
        }
        $stmt->bind_param(
            "sssidds",
            $this->itemCode,
            $this->itemName,
            $this->description,
            $this->color,
            $this->categoryID,
            $this->wholesalePrice,
            $this->listPrice
        );
        $result = $stmt->execute();
        if (!$result) {
            error_log("Error: Execute failed for saveItem. " . $stmt->error);
        }
        $stmt->close();
        $db->close();
        return $result;
    }

    // Retrieve all items
    public static function getItems()
    {
        $db = getDB();
        $query = "SELECT * FROM SportsEquipmentProducts";
        $result = $db->query($query);
        if ($result && $result->num_rows > 0) {
            $items = [];
            while ($row = $result->fetch_assoc()) {
                $item = new Item(
                    $row['SportsProductsID'],
                    $row['SportsProductsCode'],
                    $row['SportsProductsName'],
                    $row['SportsDescription'],
                    $row['SportsProductsColor'],
                    $row['SportsCategoryID'],
                    $row['SportsWholesalePrice'],
                    $row['SportsListPrice'],
                    $row['DateCreated']
                );
                $items[] = $item;
            }
            $result->close();
            $db->close();
            return $items;
        } else {
            $db->close();
            return null;
        }
    }

    // Find an item by ID
    public static function findItem($itemID)
    {
        $db = getDB();
        $query = "SELECT * FROM SportsEquipmentProducts WHERE SportsProductsID = ?";
        $stmt = $db->prepare($query);
        if (!$stmt) {
            error_log("Error: Prepare failed for findItem. " . $db->error);
            return null;
        }
        $stmt->bind_param("i", $itemID);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result && $row = $result->fetch_assoc()) {
            $item = new Item(
                $row['SportsProductsID'],
                $row['SportsProductsCode'],
                $row['SportsProductsName'],
                $row['SportsDescription'],
                $row['SportsProductsColor'],
                $row['SportsCategoryID'],
                $row['SportsWholesalePrice'],
                $row['SportsListPrice'],
                $row['DateCreated']
            );
            $stmt->close();
            $db->close();
            return $item;
        } else {
            error_log("Error: Item with ID $itemID not found.");
            $stmt->close();
            $db->close();
            return null;
        }
    }

    // Update an item
    public function updateItem()
    {
        $db = getDB();
        $query = "UPDATE SportsEquipmentProducts 
                  SET SportsProductsCode = ?, SportsProductsName = ?, SportsDescription = ?, 
                      SportsProductsColor = ?, SportsCategoryID = ?, SportsWholesalePrice = ?, 
                      SportsListPrice = ? 
                  WHERE SportsProductsID = ?";
        $stmt = $db->prepare($query);
        if (!$stmt) {
            error_log("Error: Prepare failed for updateItem. " . $db->error);
            return false;
        }
        $stmt->bind_param(
            "sssiddsi",
            $this->itemCode,
            $this->itemName,
            $this->description,
            $this->color,
            $this->categoryID,
            $this->wholesalePrice,
            $this->listPrice,
            $this->itemID
        );
        $result = $stmt->execute();
        if (!$result) {
            error_log("Error: Execute failed for updateItem. " . $stmt->error);
        }
        $stmt->close();
        $db->close();
        return $result;
    }

    // Remove an item
    public function removeItem()
    {
        $db = getDB();
        $query = "DELETE FROM SportsEquipmentProducts WHERE SportsProductsID = ?";
        $stmt = $db->prepare($query);
        if (!$stmt) {
            error_log("Error: Prepare failed for removeItem. " . $db->error);
            return false;
        }
        $stmt->bind_param("i", $this->itemID);
        $result = $stmt->execute();
        if (!$result) {
            error_log("Error: Execute failed for removeItem. " . $stmt->error);
        } elseif ($stmt->affected_rows === 0) {
            error_log("Error: No rows deleted for item ID {$this->itemID}.");
            $stmt->close();
            $db->close();
            return false;
        }
        $stmt->close();
        $db->close();
        return true;
    }
}
?>
