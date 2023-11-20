<?php
include_once("../db.php"); // Include the Database class file
include_once("../student.php"); // Include the Student class file
include_once("../student_details.php"); // Include the Student class file
include_once("../town_city.php");
//include_once("../province.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [    
    'id' => $_POST['id'],
    'name' => $_POST['name'],
    ];

    // Instantiate the Database and Student classes
    // Instantiate the Database and Student classes
$database = new Database();
$town_cityModel = new town_city($database);
$town_city = $town_cityModel->create($data);

    
    if ($town_city['id']) {
        // Student record successfully created
    
        // Retrieve student details from the form
        $town_cityDetailsData = [
            'id' => $town_city['id'], // Use the obtained town_city ID
            'name' => $_POST['name'],
            //  town_city details fields
        ];
    
        // Create town_city details linked to the town_city
        $town_cityDetails = new $town_cityDetailsData($database);
    
        if ($town_cityDetails->create($town_cityDetailsData)) {
            echo "Record inserted successfully.";
        } else {
            echo "Failed to insert the record.";
        }
    }
}
