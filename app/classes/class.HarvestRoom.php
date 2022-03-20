<?php

class HarvestRoom extends Harvest {

    /**
     * @param $recipe_id
     * @return array
     *
     * @desc Return array of all recipes ingredients by a recipe id
     */
    public function getHarvestRoom($harvest_id){
        global $database;
        $sql = "SELECT * FROM harvest_room WHERE harvest.harvest_id = " . $harvest_id . "";
        $result = mysqli_query($database->db_connect(), $sql);
        $database->confirm_result_set($result);
        return $result;
    }
  }
