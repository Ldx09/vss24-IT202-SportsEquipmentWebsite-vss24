# Dec 5 2024
# IT202001
#Sports Equipment Website
#vss24@njit.edu



<?php
require_once('database.php');  // Include the file where getDB() is defined

class Category
{
    public $categoryID;
    public $categoryCode;
    public $categoryName;
    public $categoryShelf;

    // Constructor
    function __construct($categoryID, $categoryCode, $categoryName, $categoryShelf)
    {
        $this->categoryID = $categoryID;
        $this->categoryCode = $categoryCode;
        $this->categoryName = $categoryName;
        $this->categoryShelf = $categoryShelf;
    }

    // String representation of the object
    function __toString()
    {
        return "<h2>Category Number: $this->categoryID</h2>\n" .
               "<h2>$this->categoryCode, $this->categoryName, Shelf: $this->categoryShelf</h2>\n";
    }

    // Static method to get all categories
    public static function getCategories()
    {
        $db = getDB();  // Call getDB() to get the database connection
        $query = "SELECT * FROM SportsEquipmentCategories";
        $result = $db->query($query);

        if ($result && mysqli_num_rows($result) > 0) {
            $categories = array();
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $category = new Category(
                    $row['SportsCategoriesID'],  // Assuming SportsCategoriesID is the ID column name
                    $row['SportsCategoriesCode'],
                    $row['SportsCategoriesName'],
                    $row['SportsCategoriesShelf']
                );
                array_push($categories, $category);
            }
            $db->close();
            return $categories;
        } else {
            $db->close();
            return NULL;
        }
    }

    // Save category to the database
    function saveCategory()
    {
        $db = getDB();  // Call getDB() to get the database connection
        $query = "INSERT INTO SportsEquipmentCategories (SportsCategoriesCode, SportsCategoriesName, SportsCategoriesShelf) VALUES (?, ?, ?)";
        $stmt = $db->prepare($query);

        if (!$stmt) {
            error_log("Prepare failed: (" . $db->errno . ") " . $db->error);
            return false;  // Return false if preparation fails
        }

        $stmt->bind_param("sss", $this->categoryCode, $this->categoryName, $this->categoryShelf);
        $result = $stmt->execute();

        if (!$result) {
            error_log("Error executing insert query: (" . $stmt->errno . ") " . $stmt->error);
        }

        $stmt->close();
        $db->close();
        return $result;
    }

    // Find a category by ID
    public static function findCategory($categoryID) {
        $db = getDB();
    
        // Query to find the category
        $query = "SELECT * FROM SportsEquipmentCategories WHERE SportsCategoriesID = ?";
        $stmt = $db->prepare($query);
    
        if (!$stmt) {
            // Log preparation errors
            error_log("Error: Prepare failed for findCategory. " . $db->error);
            return null;
        }
    
        // Bind and execute
        $stmt->bind_param("i", $categoryID);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result && $row = $result->fetch_assoc()) {
            // Create and return the category object
            $category = new Category(
                $row['SportsCategoriesID'],
                $row['SportsCategoriesCode'],
                $row['SportsCategoriesName'],
                $row['SportsCategoriesShelf']
            );
            $stmt->close();
            $db->close();
            return $category;
        } else {
            // Log if category is not found
            error_log("Error: Category with ID $categoryID not found.");
            $stmt->close();
            $db->close();
            return null;
        }
    }
        // Update a category
    function updateCategory()
    {
        $db = getDB();  // Call getDB() to get the database connection

        $query = "UPDATE SportsEquipmentCategories SET SportsCategoriesCode = ?, " .
                 "SportsCategoriesName = ?, SportsCategoriesShelf = ? " .
                 "WHERE SportsCategoriesID = ?";
        $stmt = $db->prepare($query);

        if (!$stmt) {
            error_log("Prepare failed: (" . $db->errno . ") " . $db->error);
            return false;
        }

        $stmt->bind_param("sssi", $this->categoryCode, $this->categoryName, $this->categoryShelf, $this->categoryID);
        $result = $stmt->execute();

        if (!$result) {
            error_log("Error executing update query: (" . $stmt->errno . ") " . $stmt->error);
        }

        $stmt->close();
        $db->close();
        return $result;
    }

    // Remove a category
    public function removeCategory()
    {
        $db = getDB();
        $query = "DELETE FROM SportsEquipmentCategories WHERE SportsCategoriesID = ?";
        $stmt = $db->prepare($query);
    
        if (!$stmt) {
            error_log("Error: Prepare failed for removeCategory. " . $db->error);
            return false;
        }
    
        $stmt->bind_param("i", $this->categoryID);
        $result = $stmt->execute();
    
        if (!$result) {
            error_log("Error: Execute failed for removeCategory. " . $stmt->error);
        } elseif ($stmt->affected_rows === 0) {
            error_log("Error: No rows deleted for category ID {$this->categoryID}.");
            $stmt->close();
            $db->close();
            return false;
        }
    
        $stmt->close();
        $db->close();
        return true;
    }
}    