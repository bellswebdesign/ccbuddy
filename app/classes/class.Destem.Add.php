<?php

class AddDestem extends Destem
{
    /**
     * @return string+--+
     **********************.
     *
     * @desc Return sql insert query for the recipe details
     */
    public function addDestemData()
    {
       if (isset($_POST['destem'])){

            global $database;

            //Filter and validate inputs
            $harvest_id= filter_var($_POST['de_stem']['harvest_id'], FILTER_SANITIZE_NUMBER_INT);

            //Sanitize filtered data/escape data to prevent SQL injection
            $harvest_idClean = mysqli_real_escape_string($database->db_connect(),$harvest_id);

            //Create SQL script
          $sql = "INSERT INTO de_stem SET ";
          $sql .= "harvest_id='" . $harvestdateClean . "'; ";
          return $sql;
      }

   }
   public function processAddDestem()
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
              redirect_to('all_destem.php');
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
