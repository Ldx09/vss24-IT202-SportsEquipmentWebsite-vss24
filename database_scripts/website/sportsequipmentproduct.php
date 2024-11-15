<?php
require_once('database.php'); // Ensure database.php contains the getDB() function that establishes a connection to MySQL

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

   function __construct(
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

   function __toString()
   {
       $output = "<h2>Item ID: $this->itemID</h2>" .
           "<h2>Code: $this->itemCode</h2>\n" .
           "<h2>Name: $this->itemName</h2>\n" .
           "<h2>Description: $this->description</h2>\n" .
           "<h2>Color: $this->color</h2>\n" .
           "<h2>Category ID: $this->categoryID</h2>\n" .
           "<h2>Wholesale Price: $this->wholesalePrice</h2>\n" .
           "<h2>List Price: $this->listPrice</h2>\n" .
           "<h2>Date Created: $this->dateCreated</h2>\n";
       return $output;
   }

   function saveItem() {
       $db = getDB();
       $query = "INSERT INTO SportsEquipmentProducts 
           (SportsProductsCode, SportsProductsName, SportsDescription, SportsProductsColor, SportsCategoryID, SportsWholesalePrice, SportsListPrice) 
           VALUES (?, ?, ?, ?, ?, ?, ?)";
       $stmt = $db->prepare($query);
       if (!$stmt) {
           echo "<h2>Database preparation error: " . $db->error . "</h2>\n";
           return false;
       }
       $stmt->bind_param("sssidds", 
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
           echo "<h2>Database execution error: " . $stmt->error . "</h2>\n";
           return false;
       }
       $db->close();
       return $result;
   }

   static function getItems()
   {
       $db = getDB();
       $query = "SELECT * FROM SportsEquipmentProducts";
       $result = $db->query($query);
       if (mysqli_num_rows($result) > 0) {
           $items = array();
           while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
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
               array_push($items, $item);
           }
           $db->close();
           return $items;
       } else {
           $db->close();
           return NULL;
       }
   }

   static function findItem($itemID)
   {
       $db = getDB();
       $query = "SELECT * FROM SportsEquipmentProducts WHERE SportsProductsID = ?";
       $stmt = $db->prepare($query);
       $stmt->bind_param("i", $itemID);
       $stmt->execute();
       $result = $stmt->get_result();
       $row = $result->fetch_array(MYSQLI_ASSOC);
       if ($row) {
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
           $db->close();
           return $item;
       } else {
           $db->close();
           return NULL;
       }
   }

   function updateItem() {
    $db = getDB();

    $query = "UPDATE SportsEquipmentProducts 
              SET SportsProductsCode = ?, SportsProductsName = ?, SportsDescription = ?, 
                  SportsProductsColor = ?, SportsCategoryID = ?, SportsWholesalePrice = ?, 
                  SportsListPrice = ?
              WHERE SportsProductsID = ?";
    
    $stmt = $db->prepare($query);

    if (!$stmt) {
        error_log("Prepare failed: (" . $db->errno . ") " . $db->error);
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
        error_log("Error executing update query: (" . $stmt->errno . ") " . $stmt->error);
    }

    $stmt->close();
    $db->close();

    return $result;
}
}
