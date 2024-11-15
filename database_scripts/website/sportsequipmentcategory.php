# Nov 15 2024
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
    static function findCategory($categoryID)
    {
        $db = getDB();  // Call getDB() to get the database connection

        $query = "SELECT * FROM SportsEquipmentCategories WHERE SportsCategoriesID = ?";
        $stmt = $db->prepare($query);

        if (!$stmt) {
            error_log("Prepare failed: (" . $db->errno . ") " . $db->error);
            return null;  // Return null if preparation fails
        }

        $stmt->bind_param("i", $categoryID);  // 'i' for integer
        $stmt->execute();
        $result = $stmt->get_result();  // Get the result set from the prepared statement

        if ($result && $row = $result->fetch_array(MYSQLI_ASSOC)) {
            $category = new Category(
                $row['SportsCategoriesID'],  // Use correct column name
                $row['SportsCategoriesCode'],
                $row['SportsCategoriesName'],
                $row['SportsCategoriesShelf']
            );
            $stmt->close();
            $db->close();
            return $category;
        } else {
            error_log("Error fetching category: (" . $stmt->errno . ") " . $stmt->error);
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
        $db = getDB();  // Get the database connection
    
        // Prepare the DELETE statement
        $query = "DELETE FROM SportsEquipmentCategories WHERE SportsCategoriesID = ?";
        $stmt = $db->prepare($query);
    
        if (!$stmt) {
            // Log preparation errors
            error_log("Prepare failed: (" . $db->errno . ") " . $db->error);
            return false;
        }
    
        // Bind the category ID and execute the statement
        $stmt->bind_param("i", $this->categoryID);  // 'i' for integer
    
        $result = $stmt->execute();
    
        if (!$result) {
            // Log any execution errors
            error_log("Error executing delete query: (" . $stmt->errno . ") " . $stmt->error);
        }
    
        // Close statement and database connection
        $stmt->close();
        $db->close();
    
        return $result;
    }
} 