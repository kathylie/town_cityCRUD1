<?php
include_once("../db.php");
include_once("../student.php");
include_once("../town_city.php");

$db = new Database();
$connection = $db->getConnection();
$town_city = new town_city($db);

?>        
            <?php
            $results = $town_city->displayAll(); 
            foreach ($results as $result) {
            ?>
            <tr>
                <td><?php echo $result['ID']; ?></td>
                <td><?php echo $result['Name']; ?></td>
                <td>
                    <a href="town_city.php?id=<?php echo $result['id']; ?>">Edit</a>
                    |
                    <a href="town_delete.php?id=<?php echo $result['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>

           
        </tbody>
    </table>
        
    <a class="button-link" href="town_add.php">Add New Record</a>

        </div>
        
        <!-- Include the header -->
  
    <?php include('../templates/footer.html'); ?>


    <p></p>
</body>
</html>
