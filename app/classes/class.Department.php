<?php

class Department {

    /**
     * @return array
     *
     * @desc Return array of all recipes
     */
    public static function getAllDepartments(){
        global $database;
        $sql = "SELECT * FROM department ";
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
    public static function getDepartmentId($id){
        global $database;
        $sql = "SELECT * FROM department ";
        $sql .= "WHERE id='" . $id . "'";
        $result = mysqli_query($database->db_connect(), $sql);
        $database->confirm_result_set($result);
        $department = mysqli_fetch_assoc($result);
        return $department;
    }
}
