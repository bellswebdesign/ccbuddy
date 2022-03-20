<?php

class Member {

    /**
     * @return array
     *
     * @desc Return array of all recipes
     */
    public static function getAllMembers(){
        global $database;
        $sql = "SELECT * FROM members ";
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
    public static function getMemberId($id){
        global $database;
        $sql = "SELECT * FROM members ";
        $sql .= "WHERE id='" . $id . "'";
        $result = mysqli_query($database->db_connect(), $sql);
        $database->confirm_result_set($result);
        $member = mysqli_fetch_assoc($result);
        return $member;
    }
    public static function getAllMemberbyDepartment(){
      global $database;
      $sql = "SELECT * FROM members ";
      $sql .= "INNER JOIN department ON department.id = members.dep_id ";
      $result = mysqli_query($database->db_connect(), $sql);
      $database->confirm_result_set($result);
      return $result;


  }
  public static function getMemberbyDepartmentId(){
    global $database;
    $sql = "SELECT\n"

    . "    *\n"

    . "FROM\n"

    . "    `members`\n"

    . "INNER JOIN department ON department.id = members.dep_id\n"

    . "WHERE\n"

    . "    members.dep_id = 9";
    $memberDep = mysqli_query($database->db_connect(), $sql);
    $database->confirm_result_set($result);
    return $memberDep;
  }
}
