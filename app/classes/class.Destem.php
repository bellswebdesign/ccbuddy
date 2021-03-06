<?php

class Destem {

    /**
     * @return array
     *
     * @desc Return array of all recipes
     */
    public static function getAllDestem(){
        global $database;
        $sql = "SELECT * FROM de_stem ";
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
        $sql = "SELECT * FROM de_stem ";
        $sql .= "WHERE de_stem_id='" . $id . "'";
        $result = mysqli_query($database->db_connect(), $sql);
        $database->confirm_result_set($result);
        $destem = mysqli_fetch_assoc($result);
        return $destem;
    }
    public static function getDestemDepId(){
        global $database;
        $sql = "SELECT dep_id FROM de_stem LIMIT 1";
        $result = mysqli_query($database->db_connect(), $sql);
        $database->confirm_result_set($result);
        $destemId = mysqli_fetch_assoc($result);
        return $destemId;
    }
    public static function getDestemHarvestId($id){
        global $database;
        $sql = "SELECT * FROM de_stem ";
        $sql .= "WHERE harvest_id='" . $id . "'";
        $result = mysqli_query($database->db_connect(), $sql);
        $database->confirm_result_set($result);
        $destem = mysqli_fetch_assoc($result);
        return $destem;
    }
}
