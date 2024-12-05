# Dec 5 2024
# IT202001
#Sports Equipment Website
#vss24@njit.edu


<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Equipment Shop - Inventory Management</title>
    <link rel="stylesheet" href="ih_style.css">
</head>
<body>
    <header>
        <?php include("header.inc.php"); ?>
        <div style="text-align: left; margin: 10px;">
            <a href="main.inc.php">
                <img src="images/home.png" alt="Home" title="Go to Home" style="height: 25px; width: auto;">
            </a>
        </div>
    </header>
    <main>
        <h1>Welcome to Sports Equipment Shop Inventory Helper</h1>
        <p>Welcome, <?php echo htmlspecialchars($_SESSION['firstName']) . " " . htmlspecialchars($_SESSION['lastName']); ?></p>
        <p>Email: <?php echo htmlspecialchars($_SESSION['emailAddress']); ?></p>

        <!-- Navigation Section -->
        <nav style="margin-bottom: 40px;"> <!-- Added margin-bottom for spacing -->
            <a href="newsportsequipmentcategory.inc.php">
                <img src="images/categories.png" alt="Add New Category" style="vertical-align: middle; height: 20px;"> Add New Category
            </a> |
            <a href="listsportsequipmentcategories.inc.php">
                <img src="images/listcategory.png" alt="List Categories" style="vertical-align: middle; height: 20px;"> List Categories
            </a> |
            <a href="newsportsequipmentproduct.inc.php">
                <img src="images/items.png" alt="Add New Product" style="vertical-align: middle; height: 20px;"> Add New Product
            </a> |
            <a href="listsportsequipmentproducts.inc.php">
                <img src="images/listproduct.png" alt="List Products" style="vertical-align: middle; height: 20px;"> List Products
            </a> |
            <a href="logout.inc.php">
                <img src="images/logout.png" alt="Logout" style="vertical-align: middle; height: 20px;"> Logout
            </a>
        </nav>
        <br> 
        <br> 
        <br> 
        <br> 

        <!-- Real-Time Inventory Section -->
        <div id="inventoryInfo" style="margin-top: 20px;">
            <h3>
                <img src="images/realtime.png" alt="Real-Time Inventory" style="vertical-align: middle; height: 30px;">
                Real-Time Inventory Stats
            </h3>
            <p>Category Count: <span id="categoryCount">9</span></p>
            <p>Product Count: <span id="productCount">23</span></p>
            <p>Wholesale Price Total: $<span id="wholesaleTotal">8464.99</span></p>
            <p>List Price Total: $<span id="listTotal">10305.49</span></p>
        </div>

        <!-- Search Section -->
        <div id="searchSection" style="margin-top: 20px;">
            <h3>Search</h3>
            <input type="text" id="searchItem" placeholder="Search Products" />
            <input type="text" id="searchCategory" placeholder="Search Categories" />
            <div id="searchResults"></div>
        </div>
    </main>
    <footer><?php include("footer.inc.php"); ?></footer>

    <!-- JavaScript for Real-Time Updates and Search -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Function to fetch real-time inventory stats
            function fetchRealTimeStats() {
                fetch("realtimestats.php?format=json")
                    .then(response => {
                        if (!response.ok) {
                            throw new Error("Failed to fetch real-time stats.");
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.error) {
                            console.error("Error in real-time stats:", data.error);
                            return;
                        }
                        // Update DOM with fetched data
                        document.getElementById("categoryCount").textContent = data.categoryCount;
                        document.getElementById("productCount").textContent = data.productCount;
                        document.getElementById("wholesaleTotal").textContent = data.wholesaleTotal;
                        document.getElementById("listTotal").textContent = data.listTotal;
                    })
                    .catch(error => console.error("Error fetching real-time stats:", error));
            }

            // Function to handle product search
            function searchProducts() {
                const query = document.getElementById("searchItem").value.trim();
                if (query) {
                    fetch(`searchitem.php?q=${encodeURIComponent(query)}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error("Failed to fetch search results.");
                            }
                            return response.text();
                        })
                        .then(data => {
                            document.getElementById("searchResults").innerHTML = data;
                        })
                        .catch(error => console.error("Error searching products:", error));
                } else {
                    document.getElementById("searchResults").innerHTML = ""; // Clear results if query is empty
                }
            }



            // Function to handle category search
            function searchCategories() {
                const query = document.getElementById("searchCategory").value.trim();
                if (query) {
                    fetch(`searchcategory.php?q=${encodeURIComponent(query)}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error("Failed to fetch search results.");
                            }
                            return response.text();
                        })
                        .then(data => {
                            document.getElementById("searchResults").innerHTML = data;
                        })
                        .catch(error => console.error("Error searching categories:", error));
                } else {
                    document.getElementById("searchResults").innerHTML = ""; // Clear results if query is empty
                }
            }

            // Attach event listeners
            document.getElementById("searchItem").addEventListener("input", searchProducts);
            document.getElementById("searchCategory").addEventListener("input", searchCategories);

            // Fetch real-time stats on page load
            fetchRealTimeStats();

            // Refresh real-time stats every 5 seconds
            setInterval(fetchRealTimeStats, 5000);
        });
    </script>
</body>
</html>
