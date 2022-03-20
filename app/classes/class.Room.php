<?php

class Room {

    /**
     * @return array
     *
     * @desc Return array of all recipes
     */
    public static function getAllRooms(){
        global $database;
        $sql = "SELECT * FROM room ";
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
    public static function getRoomId($id){
        global $database;
        $sql = "SELECT * FROM room ";
        $sql .= "WHERE id='" . $id . "'";
        $result = mysqli_query($database->db_connect(), $sql);
        $database->confirm_result_set($result);
        $harvest = mysqli_fetch_assoc($result);
        return $room;
    }
}
