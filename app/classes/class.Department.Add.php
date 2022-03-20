<?php

class AddDepartment extends Department
{
    /**
     * @return string+--+
     **********************.
     *
     * @desc Return sql insert query for the recipe details
     */
    public function addDepartmentData()
    {
       if (isset($_POST['department'])){

            global $database;

            //Filter and validate inputs
            $name = filter_var($_POST['department']['name'], FILTER_SANITIZE_STRING);
            //Sanitize filtered data/escape data to prevent SQL injection
            $nameClean = mysqli_real_escape_string($database->db_connect(),$name);

            //Create SQL script
          $sql = "INSERT INTO department SET ";
          $sql .= "name='" . $nameClean . "'; ";
          return $sql;
      }

   }
   public function processAddDepartment()
    {
        global $database;
        $mysqli = $database->db_connect();

        /**
         * @return bool
         *
         * @desc Begin sql insert command, process recipe data, and if all is successful redirect to edit page with status of success
         */
        if ($result = $mysqli->query($this->addDepartmentData())) {
            $departmentID = $mysqli->insert_id;
              redirect_to('departments.php');
          }

            /**
             * @desc If sql command is successful redirect back to edit page with status of success, otherwise failed
        *   header("Location: edit-harvest?id=" . $harvestID . '&add_status=success');
        *   $database->db_disconnect();
        *  } else {
        *   echo "Adding harvest failed: (" . $mysqli->errno . ") " . $mysqli->error;
        *  }
        */
        $database->db_disconnect();

      }
 }
