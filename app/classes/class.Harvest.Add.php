<?php

class Add extends Harvest
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
            $harvest_num = filter_var($_POST['harvest']['harvest_num'], FILTER_SANITIZE_NUMBER_INT);
            $room_num = filter_var($_POST['harvest']['room_num'], FILTER_SANITIZE_NUMBER_INT);
            $plant_date = filter_var($_POST['harvest']['plant_date'], FILTER_SANITIZE_STRING);
            $harvest_date = filter_var($_POST['harvest']['harvest_date'], FILTER_SANITIZE_STRING);

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
 }
