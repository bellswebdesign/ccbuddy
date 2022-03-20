<?php

class License {

    /**
     * @return array
     *
     * @desc Return array of all recipes
     */
    public static function getAllLicense(){
        global $database;
        $sql = "SELECT * FROM license ";
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
    public static function getLicenseId($id){
        global $database;
        $sql = "SELECT * FROM license ";
        $sql .= "WHERE id='" . $id . "'";
        $result = mysqli_query($database->db_connect(), $sql);
        $database->confirm_result_set($result);
        $license = mysqli_fetch_assoc($result);
        return $license;
    }

    public static function getAllLicenseStrain(){
      global $database;
      $sql = "SELECT * FROM license ";
      $sql .= "INNER JOIN strain ";
      $sql .= "ON license.id = strain.license_id";
      $result = mysqli_query($database->db_connect(), $sql);
      $database->confirm_result_set($result);
      return $result;
    }
}
