<?php

class AddStrain extends Strain
{
    /**
     * @return string+--+
     **********************.
     *
     * @desc Return sql insert query for the recipe details
     */
    public function addStrainData()
    {
       if (isset($_POST['strain'])){

            global $database;

            //Filter and validate inputs
            $strain_name = filter_var($_POST['strain']['name'], FILTER_SANITIZE_STRING);
            $license = filter_var($_POST['strain']['license'], FILTER_SANITIZE_STRING);

            //Sanitize filtered data/escape data to prevent SQL injection
            $nameClean = mysqli_real_escape_string($database->db_connect(),$strain_name);
            $licenseClean = mysqli_real_escape_string($database->db_connect(),$license);

            //Create SQL script
          $sql = "INSERT INTO strain SET ";
          $sql .= "name='" . $nameClean . "', ";
          $sql .= "license='" . $licenseClean . "'; ";
          return $sql;
      }

   }
   public function processAddStrain()
    {
        global $database;
        $mysqli = $database->db_connect();

        /**
         * @return bool
         *
         * @desc Begin sql insert command, process recipe data, and if all is successful redirect to edit page with status of success
         */
        if ($result = $mysqli->query($this->addStrainData())) {
            $strainID = $mysqli->insert_id;
              redirect_to('all_strains.php');
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
