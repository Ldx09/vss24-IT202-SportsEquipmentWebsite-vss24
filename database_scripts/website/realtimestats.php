<?php
require_once 'database.php';

try {
    $db = getDB();

    // Get Category Count
    $categoryCountQuery = "SELECT COUNT(*) as count FROM SportsEquipmentCategories";
    $categoryCountResult = $db->query($categoryCountQuery);
    $categoryCount = $categoryCountResult ? $categoryCountResult->fetch_assoc()['count'] : 0;

    // Get Product Count
    $productCountQuery = "SELECT COUNT(*) as count FROM SportsEquipmentProducts";
    $productCountResult = $db->query($productCountQuery);
    $productCount = $productCountResult ? $productCountResult->fetch_assoc()['count'] : 0;

    // Get Total Wholesale Price
    $wholesaleTotalQuery = "SELECT SUM(SportsWholesalePrice) as total FROM SportsEquipmentProducts";
    $wholesaleTotalResult = $db->query($wholesaleTotalQuery);
    $wholesaleTotal = $wholesaleTotalResult ? $wholesaleTotalResult->fetch_assoc()['total'] : 0;

    // Get Total List Price
    $listTotalQuery = "SELECT SUM(SportsListPrice) as total FROM SportsEquipmentProducts";
    $listTotalResult = $db->query($listTotalQuery);
    $listTotal = $listTotalResult ? $listTotalResult->fetch_assoc()['total'] : 0;

    // Decide the output format based on the request
    $outputFormat = isset($_GET['format']) && strtolower($_GET['format']) === 'xml' ? 'xml' : 'json';

    if ($outputFormat === 'xml') {
        // Prepare XML response
        $doc = new DOMDocument("1.0", "UTF-8");
        $doc->formatOutput = true;

        $inventory = $doc->createElement("inventory");
        $doc->appendChild($inventory);

        $categories = $doc->createElement("categories", $categoryCount);
        $inventory->appendChild($categories);

        $items = $doc->createElement("items", $productCount);
        $inventory->appendChild($items);

        $wholesalePrice = $doc->createElement("wholesaleTotal", number_format($wholesaleTotal, 2));
        $inventory->appendChild($wholesalePrice);

        $listPrice = $doc->createElement("listTotal", number_format($listTotal, 2));
        $inventory->appendChild($listPrice);

        header("Content-Type: application/xml");
        echo $doc->saveXML();
    } else {
        // Prepare JSON response
        header("Content-Type: application/json");
        echo json_encode([
            "categoryCount" => $categoryCount,
            "productCount" => $productCount,
            "wholesaleTotal" => number_format($wholesaleTotal, 2),
            "listTotal" => number_format($listTotal, 2)
        ]);
    }
} catch (Exception $e) {
    http_response_code(500);
    if ($outputFormat === 'xml') {
        $doc = new DOMDocument("1.0", "UTF-8");
        $doc->formatOutput = true;
        $error = $doc->createElement("error", "Failed to fetch inventory stats: " . $e->getMessage());
        $doc->appendChild($error);
        header("Content-Type: application/xml");
        echo $doc->saveXML();
    } else {
        header("Content-Type: application/json");
        echo json_encode(["error" => "Failed to fetch inventory stats."]);
    }
}
?>
