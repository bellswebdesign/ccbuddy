<?php

class Harvest {

    /**
     * @return array
     *
     * @desc Return array of all recipes
     */
    public static function getAllHarvest(){
        global $database;
        $sql = "SELECT * FROM harvest ";
        $result = mysqli_query($database->db_connect(), $sql);
        $database->confirm_result_set($result);
        return $result;
    }

    /**
     * @param $id
     * @return array
     *
     * @desc Return array of all data from a recipe by id
     */
    public static function getHarvestId($id){
        global $database;
        $sql = "SELECT * FROM harvest ";
        $sql .= "WHERE harvest_id='" . $id . "'";
        $result = mysqli_query($database->db_connect(), $sql);
        $database->confirm_result_set($result);
        $recipe = mysqli_fetch_assoc($result);
        return $harvest;
    }
}
