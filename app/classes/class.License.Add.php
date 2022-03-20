<?php

class AddLicense extends License
{
    /**
     * @return string+--+
     **********************.
     *
     * @desc Return sql insert query for the recipe details
     */
    public function addLicenseData()
    {
       if (isset($_POST['license'])){

            global $database;

            //Filter and validate inputs
            $license = filter_var($_POST['license']['license'], FILTER_SANITIZE_NUMBER_INT);
            $license_type = filter_var($_POST['license']['license_type'], FILTER_SANITIZE_STRING);

            //Sanitize filtered data/escape data to prevent SQL injection
            $licenseClean = mysqli_real_escape_string($database->db_connect(),$license);
           $license_typeClean = mysqli_real_escape_string($database->db_connect(),$license_type);

            //Create SQL script
          $sql = "INSERT INTO license SET ";
          $sql .= "license='" . $licenseClean . "', ";
          $sql .= "license_type='" . $license_typeClean . "'; ";
          return $sql;
      }

   }


   public function processAddLicense()
    {
        global $database;
        $mysqli = $database->db_connect();

        /**
         * @return bool
         *
         * @desc Begin sql insert command, process recipe data, and if all is successful redirect to edit page with status of success
         */
        if ($result = $mysqli->query($this->addLicenseData())) {
            $licenseID = $mysqli->insert_id;
              redirect_to('all_licenses.php');


          }

            /**
             * @desc If sql command is successful redirect back to edit page with status of success, otherwise failed
        */
        $database->db_disconnect();

      }
 }
