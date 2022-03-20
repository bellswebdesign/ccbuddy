<?php

class Edit extends Harvest
{
    /**
     * @return string+--+
     **********************.
     *
     * @desc Return sql insert query for the recipe details
     */
    public function updateHarvestData()
    {
       if (isset($_POST['harvest'])){

            global $database;
            $harvestData = $_POST["harvest"];

            //Filter and validate inputs
            $actual_harvest_date = filter_var($_POST['harvest']['actual_harvest_date'], FILTER_SANITIZE_STRING);

            //Sanitize filtered data/escape data to prevent SQL injection
          $actualharvestdateClean = mysqli_real_escape_string($database->db_connect(),$actual_harvest_date);

            //Create SQL script
          $sql = "UPDATE INTO harvest SET ";
          $sql .= "actual_harvest_date='" . $actualharvestdateClean . "' ";
          $sql .= "WHERE harvest_id='" . $harvestData['harvest_id'] . "'; ";
          return $sql;
      }

   }
   public function processEditHarvest()
    {
        global $database;
        $mysqli = $database->db_connect();
        $formData = $_POST["harvest"];

                $sql = $this->updateHarvestData();


                /**
                 * @return bool
                 *
                 * @desc If sql update is successful redirect back to edit page with status of success, otherwise failed
                 */
                if ($sql) {
                    $database->db_disconnect();
                } else {
                    header("Location: edit-harvest.php?id=" . $formData['id'] . '&edit_status=failed');
                    $database->db_disconnect();
                }

            }
 }
