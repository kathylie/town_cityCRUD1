<?php
include_once("db.php"); // Include the Database class file

class town_city {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function read($id) {
        // implementation for reading data by ID
        $query = "SELECT * FROM your_table_name WHERE ID = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        // implementation for updating data
    }

    public function getAll() {
        try {
            $sql = "SELECT * FROM town_city";
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle errors (log or display)
            throw $e; // Re-throw the exception for higher-level handling
        }
    }
    public function delete($id) {
        try {
            $sql = "DELETE FROM town_city WHERE id = :id";
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            // Check if any rows were affected (record deleted)
            if ($stmt->rowCount() > 0) {
                return true; // Record deleted successfully
            } else {
                return false; // No records were deleted (student_id not found)
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            throw $e; // Re-throw the exception for higher-level handling
        }
    }


    public function create($data) {
        try {
            // Prepare the SQL INSERT statement
            $sql = "INSERT INTO town_city(id, name) VALUES(:id, :name);";
            $stmt = $this->db->getConnection()->prepare($sql);

            // Bind values to placeholders
            $stmt->bindParam(':id', $data['id']); // Use 'id' instead of 'student_number'
$stmt->bindParam(':name', $data['name']); // Use 'name' instead of 'first_name'


            // Execute the INSERT query
            $stmt->execute();

            // Check if the insert was successful
             
            if($stmt->rowCount() > 0)
            {
               // Check if the insert was successful
return $this->db->getConnection()->lastInsertId();

            }

        } catch (PDOException $e) {
            // Handle any potential errors here
            echo "Error: " . $e->getMessage();
            throw $e; // Re-throw the exception for higher-level handling
        }
    }
}
?>
