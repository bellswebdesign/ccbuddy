<?php

class AddStemWeight extends Stem
{
    /**
     * @return string+--+
     **********************.
     *
     * @desc Return sql insert query for the recipe details
     */
    public function addStemData()
    {
       if (isset($_POST['stem'])){

            global $database;
            $timestamp = date('Y-m-d');
            //Filter and validate inputs
            $de_stem_id= filter_var($_POST['stem']['de_stem_id'], FILTER_SANITIZE_NUMBER_INT);
            $strain_id= filter_var($_POST['stem']['strain_id'], FILTER_SANITIZE_NUMBER_INT);
            $license_id= filter_var($_POST['stem']['license_id'], FILTER_SANITIZE_NUMBER_INT);
            $weight = filter_var($_POST['stem']['weight'], FILTER_SANITIZE_STRING);

            //Sanitize filtered data/escape data to prevent SQL injection
            $destemidClean = mysqli_real_escape_string($database->db_connect(),$de_stem_id);
           $strainidClean = mysqli_real_escape_string($database->db_connect(),$strain_id);
          $licenseIdClean = mysqli_real_escape_string($database->db_connect(),$license_id);
            $weightClean = mysqli_real_escape_string($database->db_connect(),$weight);

            //Create SQL script
          $sql = "INSERT INTO weight SET ";
          $sql .= "de_stem_id='" . $destemidClean . "', ";
          $sql .= "strain_id='" . $strainidClean . "', ";
          $sql .= "license_id='" . $licenseIdClean . "', ";
          $sql .= "weight='" . $weightClean . "', ";
          $sql .= "date='" . $timestamp . "'; ";
          return $sql;

      }

   }
   public function processAddStem()
    {
        global $database;
        $mysqli = $database->db_connect();

        /**
         * @return bool
         *
         * @desc Begin sql insert command, process recipe data, and if all is successful redirect to edit page with status of success
         */
        if ($result = $mysqli->query($this->addStemData())) {
            $stemID = $mysqli->insert_id;
            $destemID =$mysqli->de_stem_id;
              redirect_to('destem.php?id=' . $_POST['stem']['de_stem_id']);
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
