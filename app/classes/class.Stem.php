<?php

class Stem {

    /**
     * @return array
     *
     * @desc Return array of all recipes
     */
    public static function getAllStem(){
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
        $stem = mysqli_fetch_assoc($result);
        return $stem;
    }

    public static function getDestemStems($id){
      global $database;
      $sql = "SELECT * FROM weight ";
      $sql .= "INNER JOIN license ON license.id = weight.license_id ";
      $sql .= "INNER JOIN strain on strain.id = weight.strain_id ";
      $sql .= "WHERE weight.de_stem_id='" . $id . "'";
      $result = mysqli_query($database->db_connect(), $sql);
      $database->confirm_result_set($result);
      return $result;
    }
}
