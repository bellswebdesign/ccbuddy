<?php

class AddStemWeight extends Stem
{
    /**
     * @return string+--+
     **********************.
     *
     * @desc Return sql insert query for the recipe details
     */
    public function addHarvestData()
    {
       if (isset($_POST['harvest'])){

            global $database;

            //Filter and validate inputs
            $de_stem_id= filter_var($_POST['weight']['de_stem_id'], FILTER_SANITIZE_NUMBER_INT);
            $strain_id= filter_var($_POST['weight']['strain_id'], FILTER_SANITIZE_NUMBER_INT);
            $weight = filter_var($_POST['weight']['weight'], FILTER_SANITIZE_STRING);

            //Sanitize filtered data/escape data to prevent SQL injection
            $harvest_numClean = mysqli_real_escape_string($database->db_connect(),$harvest_num);
           $roomnumClean = mysqli_real_escape_string($database->db_connect(),$room_num);
            $plantdateClean = mysqli_real_escape_string($database->db_connect(),$plant_date);
           $harvestdateClean = mysqli_real_escape_string($database->db_connect(),$harvest_date);

            //Create SQL script
          $sql = "INSERT INTO harvest SET ";
          $sql .= "harvest_num='" . $harvest_numClean . "', ";
          $sql .= "room_num='" . $roomnumClean . "', ";
          $sql .= "plant_date='" . $plantdateClean . "', ";
          $sql .= "harvest_date='" . $harvestdateClean . "'; ";
          return $sql;
      }

   }
   public function processAddHarvest()
    {
        global $database;
        $mysqli = $database->db_connect();

        /**
         * @return bool
         *
         * @desc Begin sql insert command, process recipe data, and if all is successful redirect to edit page with status of success
         */
        if ($result = $mysqli->query($this->addHarvestData())) {
            $harvestID = $mysqli->insert_id;
              redirect_to('all_harvest.php');
          }

            /**
             * @desc If sql command is successful redirect back to edit page with status of success, otherwise failed
        *    header("Location: edit-harvest?id=" . $harvestID . '&add_status=success');
        *    $database->db_disconnect();
        *   } else {
        *    echo "Adding harvest failed: (" . $mysqli->errno . ") " . $mysqli->error;
        *   }
        */
        $database->db_disconnect();

      }
 }
