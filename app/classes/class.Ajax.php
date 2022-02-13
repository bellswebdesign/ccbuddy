<?php

class Ajax
{

    /**
     * @return string
     *
     * @desc Check if the request is an AJAX command
     */
    public function is_ajax()
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }

    /**
     * @return string
     *
     * @desc Create a new ingredient from an AJAX command
     */
    public function addHarvest()
    {
        global $database;
        $harvest_id = $_POST['harvest_id'];
        $query = mysqli_query($database->db_connect(), $harvest->addSingleHarvest($harvest_id));
        if ($query) {
            echo json_encode("Harvest Inserted Successfully");
        } else {
            echo json_encode("Harvest Unsuccessfully Inserted");
        }
    }

    /**
     * @return string
     *
     * @desc Create an ingredient from an AJAX command
     */
    public function deleteHarvest()
    {
        global $database;
        $harvest_id = $_POST['harvest_id'];

        $harvest = new Harvest();

        $query = mysqli_query($database->db_connect(), $harvest->deleteSingleHarvest($harvest_id));

        if ($query) {
            echo json_encode("Harvest Deleted Successfully");
        } else {
            echo json_encode('Harvest Unsuccessfully Deleted');
        }
    }

    /**
     * @return string
     *
     * @desc Create a new direction from an AJAX command
     */

    public function updateHarvest()
    {

        global $database;
        $editHarvest = new Edit();

        $sql = $editHarvest->updateHarvestData();

        if (!$database->db_connect()->multi_query($sql))
            echo "Multi query failed: (" . $database->db_connect()->errno . ") " . $database->db_connect()->error;
        do {
            if ($res = $database->db_connect()->store_result()) {
                var_dump($res->fetch_all(MYSQLI_ASSOC));
                $res->free();
            }
        } while ($database->db_connect()->more_results() && $database->db_connect()->next_result());

        if ($sql) {
            echo json_encode("Harvest Updated Successfully");
        } else {
            echo json_encode('Harvest Unsuccessfully Updated');
        }
    }


    /**
     * @return string
     *
     * @desc Delete a recipe from an AJAX command
     */
    public function searchHarvest(){

        global $database;
        $mysqli = $database->db_connect();

        // Check connection
        if($mysqli === false){
            die("ERROR: Could not connect. " . $mysqli->connect_error);
        }

        if(isset($_REQUEST["term"])){
            // Prepare a select statement
            $sql = "SELECT * FROM harvest WHERE harvest_num LIKE ?";

            if($stmt = $mysqli->prepare($sql)){

                // Set parameters
                $param_term = $_REQUEST["term"] . '%';

                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("s", $param_term);

                // Attempt to execute the prepared statement
                if($stmt->execute()){
                    $result = $stmt->get_result();

                    // Check number of rows in the result set
                    if($result->num_rows > 0){
                        // Fetch result rows as an associative array
                        while($row = $result->fetch_array(MYSQLI_ASSOC)){
                            echo "<p id='{$row["id"]}'>" . $row["harvest_num"] . "</p>";
                        }
                    } else{
                        echo "<p>No matches found</p>";
                    }
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
                }
            }

            $stmt->close();
        }

        $database->db_disconnect();
    }

}

?>
