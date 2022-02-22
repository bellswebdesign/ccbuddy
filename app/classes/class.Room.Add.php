<?php

class AddRoom extends Room
{
    /**
     * @return string+--+
     **********************.
     *
     * @desc Return sql insert query for the recipe details
     */
    public function addRoomData()
    {
       if (isset($_POST['room'])){

            global $database;

            //Filter and validate inputs
            $room_num = filter_var($_POST['room']['room_num'], FILTER_SANITIZE_NUMBER_INT);
            //Sanitize filtered data/escape data to prevent SQL injection
            $room_numClean = mysqli_real_escape_string($database->db_connect(),$room_num);

            //Create SQL script
          $sql = "INSERT INTO room SET ";
          $sql .= "room_num='" . $room_numClean . "'; ";
          return $sql;
      }

   }
   public function processAddRoom()
    {
        global $database;
        $mysqli = $database->db_connect();

        /**
         * @return bool
         *
         * @desc Begin sql insert command, process recipe data, and if all is successful redirect to edit page with status of success
         */
        if ($result = $mysqli->query($this->addRoomData())) {
            $roomID = $mysqli->insert_id;
              redirect_to('all_rooms.php');
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
