<?php
include_once("../db.php"); // Include the Database class file
include_once("../student.php"); // Include the Student class file
include_once("../student_details.php"); // Include the Student class file
include_once("../town_city.php");
//include_once("../province.php");




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [    
    'id' => $_POST['id'],
    'name' => $_POST['name'],
    ];

    // Instantiate the Database and Student classes
    $database = new Database();
    $town_city = new town_city($database);
    $town_city = $town_city->create($data);
    
    if ($id) {
        // Student record successfully created
        
        // Retrieve student details from the form
        $studentDetailsData = [
            'id' => $id, // Use the obtained student ID
            'name' => $_POST['name'],
            //  town_city details fields
        ];

        // Create student details linked to the student
        $town_cityDetails = new town_cityDetails($database);
        
        if ($town_cityDetails->create($town_cityDetailsData)) {
            echo "Record inserted successfully.";
        } else {
            echo "Failed to insert the record.";
        }
    }

    
}
?>