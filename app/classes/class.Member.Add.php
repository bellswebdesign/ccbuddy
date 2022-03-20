<?php

class AddMember extends Member
{
    /**
     * @return string+--+
     **********************.
     *
     * @desc Return sql insert query for the recipe details
     */
    public function addMemberData()
    {
       if (isset($_POST['member'])){

            global $database;

            //Filter and validate inputs
            $member_name = filter_var($_POST['member']['name'], FILTER_SANITIZE_STRING);
            $department_id = filter_var($_POST['member']['dep_id'], FILTER_SANITIZE_NUMBER_INT);
            $status = filter_var($_POST['member']['status'], FILTER_SANITIZE_STRING);


            //Sanitize filtered data/escape data to prevent SQL injection
            $member_nameClean = mysqli_real_escape_string($database->db_connect(),$member_name);
            $department_idClean = mysqli_real_escape_string($database->db_connect(),$department_id);
            $statusClean = mysqli_real_escape_string($database->db_connect(),$status);

            //Create SQL script
          $sql = "INSERT INTO members SET ";
          $sql .= "dep_id='" . $department_idClean . "', ";
          $sql .= "name='" . $member_nameClean . "', ";
          $sql .= "status='" . $statusClean . "'; ";
          return $sql;
      }

   }
   public function processAddMember()
    {
        global $database;
        $mysqli = $database->db_connect();

        /**
         * @return bool
         *
         * @desc Begin sql insert command, process recipe data, and if all is successful redirect to edit page with status of success
         */
        if ($result = $mysqli->query($this->addMemberData())) {
            $memberID = $mysqli->insert_id;
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
