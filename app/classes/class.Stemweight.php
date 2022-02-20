<?php

class StemWeight extends Strain {

    /**
     * @return array
     *
     * @desc Return array of all recipes
     */
    public static function getAllStemWeight()){
        global $database;
        $sql = "SELECT * FROM weight ";
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
    public static function getDestemId($id){
        global $database;
        $sql = "SELECT * FROM weight ";
        $sql .= "WHERE de_stem_id='" . $id . "'";
        $result = mysqli_query($database->db_connect(), $sql);
        $database->confirm_result_set($result);
        $harvest = mysqli_fetch_assoc($result);
        return $destem;
    }
    public static function getHarvest_Id($id){
        global $database;
        $sql = "SELECT * FROM weight ";
        $sql .= "WHERE harvest_id='" . $id . "'";
        $result = mysqli_query($database->db_connect(), $sql);
        $database->confirm_result_set($result);
        $harvest = mysqli_fetch_assoc($result);
        return $destem;
    }
}
