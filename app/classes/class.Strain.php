<?php

class Strain {

    /**
     * @return array
     *
     * @desc Return array of all recipes
     */
    public static function getAllStrains(){
        global $database;
        $sql = "SELECT * FROM strain ";
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
    public static function getStrainId($id){
        global $database;
        $sql = "SELECT * FROM strain ";
        $sql .= "WHERE id='" . $id . "'";
        $result = mysqli_query($database->db_connect(), $sql);
        $database->confirm_result_set($result);
        $strain = mysqli_fetch_assoc($result);
        return $strain;

    }
}
