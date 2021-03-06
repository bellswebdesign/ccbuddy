<?php

class Harvest {

    /**
     * @return array
     *
     * @desc Return array of all recipes
     */
    public static function getAllActiveHarvest(){
        global $database;
        $sql = "SELECT * FROM harvest WHERE active = 1";
        $result = mysqli_query($database->db_connect(), $sql);
        $database->confirm_result_set($result);
        return $result;
    }
    public static function getAllNonActiveHarvest(){
        global $database;
        $sql = "SELECT * FROM harvest WHERE active = 0";
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
        $harvest = mysqli_fetch_assoc($result);
        return $harvest;
    }
}
