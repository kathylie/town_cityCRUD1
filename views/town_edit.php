<?php
include_once("../db.php"); // Include the Database class file
include_once("../town_city.php"); // Include the Town_City class file

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch town_city data by ID from the database
    $db = new Database();
    $town_city = new town_city($db); // Instantiate the Town_City class

    $town_cityData = $town_city->read($id);

    if ($town_cityData) {
        // The town_city data is retrieved, and you can pre-fill the edit form with this data.
    } else {
        echo "Town_City not found.";
    }
} else {
    echo "Town_City ID not provided.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'id' => $_POST['id'],
        'name' => $_POST['name'],
    ];

    $db = new Database();
    $town_city = new town_city($db); // Instantiate the Town_City class

    // Call the update method to update the town_city data
    if ($town_city->update($id, $data)) {
        echo "Record updated successfully.";
    } else {
        echo "Failed to update the record.";
    }
}
?>
