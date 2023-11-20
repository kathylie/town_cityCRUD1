<?php

include_once(__DIR__."/../db.php");
include_once(__DIR__."/../town_city.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id']; // Retrieve the 'id' from the URL

    // Instantiate the Database and TownCity classes
    $db = new Database();
    $townCity = new Town_City($db);

    // Call the delete method to delete the town_city record
    try {
        if ($townCity->delete($id)) {
            echo "Record deleted successfully.";
        } else {
            echo "Failed to delete the record.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        // Handle the exception as needed (log, display, etc.)
    }
}

?>
