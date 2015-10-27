<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GroveApp
 *
 * @author msentri
 */
class GroveApp extends DatabaseManipulation{
    
    public function __construct() {
        parent::__construct();  
    }

    public function Register_user($user_name,$user_surname,$user_picture,$user_password,
                                  $user_cell_phone,$user_email,
                                  $user_dob,$user_membership_type){
        $USER_ID = "null";
        $USER_STATUS = 0;
        $USER_REGISTERED_DATE = parent::getDateBasic();

        $tableName = "tbl_user";
        $columns = "user_id,user_first_name,user_surname,user_picture,user_registered,
        user_password,user_cell_phone,user_email,user_dob,user_membership_type,status";
        $values = "'$USER_ID','$user_name','$user_surname','$user_picture',
        '$USER_REGISTERED_DATE','$user_password',
        '$user_cell_phone','$user_email',
        '$user_dob','$user_membership_type','$USER_STATUS'";

        if($this->check_email_exit($user_email) == false){
            $response["success"] = 0;
            $response["message"] = "Email Address taken already";

            echo json_encode($response);
        }else{
            $create = parent::insert($tableName, $columns, $values);

            // check if row inserted or not
            if ($create) {
                // successfully inserted into database
                $response["success"] = 1;
                $response["message"] = "Users successfully created.";

                // echoing JSON response
                echo json_encode($response);
            } else {
                // failed to insert row
                $response["success"] = 0;
                $response["message"] = "Oops! An error occurred.";

                // echoing JSON response
                echo json_encode($response);
            }
        }







    }
    public function Get_user($email,$password){
        $tableName = "tbl_user";
        $columns = "*";
        $condition = "user_email='$email' AND user_password='$password'";

        $result = parent::select($tableName, $columns, $condition);

        if (!empty($result)) {
            // check for empty result
            if (mysql_num_rows($result) > 0) {

                $result = mysql_fetch_array($result);

                $user = array();
                $user["user_id"] = $result["user_id"];
                $user["user_first_name"] = $result["user_first_name"];
                $user["user_surname"] = $result["user_surname"];
                $user["user_picture"] = $result["user_picture"];
                $user["user_registered"] = $result["user_registered"];
                $user["user_modified"] = $result["user_modified"];
                $user["user_password"] = $result["user_password"];
                $user["user_cell_phone"] = $result["user_cell_phone"];
                $user["user_email"] = $result["user_email"];
                $user["user_dob"] = $result["user_dob"];
                $user["user_membership_type"] = $result["user_membership_type"];
                $user["status"] = $result["status"];

                // success
                $response["success"] = 1;

                // user node
                $response["user"] = array();

                array_push($response["user"], $user);

                // echoing JSON response
                echo json_encode($response);
            } else {
                // no product found
                $response["success"] = 0;
                $response["message"] = "No user found";

                // echo no users JSON
                echo json_encode($response);
            }
        } else {
            // no product found
            $response["success"] = 0;
            $response["message"] = "No user found";

            // echo no users JSON
            echo json_encode($response);
        }

    }

    public function get_All_user(){
        
        $tableName = "Users";
        $columns = "*";
        $condition = NULL;
        
        // array for JSON response
        $response = array();
        
        
        $getAllUsers = parent::select($tableName, $columns, $condition);
        
        // check for empty result
        if (mysql_num_rows($getAllUsers) > 0) {
            // looping through all results
            // products node
            $response["products"] = array();

            while ($row = mysql_fetch_array($getAllUsers)) {
                // temp user array
                $product = array();
                $product["user_id"] = $row["id"];
                $product["name"] = $row["name"];
                $product["surname"] = $row["surname"];
                $product["id_number"] = $row["id_number"];
                $product["username"] = $row["username"];
                $product["password"] = $row["password"];
                
                // push single product into final response array
                array_push($response["products"], $product);
            }
            // success
            $response["success"] = 1;

            // echoing JSON response
            echo json_encode($response);
        } else {
            // no products found
            $response["success"] = 0;
            $response["message"] = "No user found";

            // echo no users JSON
            echo json_encode($response);
        }
    }

    public function credit_card_details($user_id,$pan,$ccv,$year,$card_holder_name){


        $date_added = parent::getDateBasic();


        $tableName = "tbl_credit_card";
        $columns = "id,user_id,pan,cvv,date_expiry,date_added,card_holder";
        $values = "'null','$user_id','$pan','$ccv','$year','$date_added','$card_holder_name'";
        $add_credit_card_details = parent::insert($tableName,$columns,$values);

        if($add_credit_card_details){
            // successfully inserted into database
            $response["success"] = 1;
            $response["message"] = "Credit Card Detail Saved successfully created.";
        }else{
            $response["success"] = 0;
            $response["message"] = "Credit Card Detail not Saved successfully created.";
        }

    }

    public function Activate_user($user_id){

        $tableName = "tbl_user";
        $columns = "status='1'";
        $condition = "user_id='$user_id'";


        $actvate_user = parent::update($tableName,$columns,$condition);

        if ($actvate_user) {
            // successfully inserted into database
            $response["success"] = 1;
            $response["message"] = "Users successfully Activated.";

            // echoing JSON response
            echo json_encode($response);
        } else {
            // failed to insert row
            $response["success"] = 0;
            $response["message"] = "Users successfully not Activated.";

            // echoing JSON response
            echo json_encode($response);
        }


    }

    public function upload_image(){
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

    }

    public function check_email_exit($email){
        $tableName = "tbl_user";
        $columns = "*";
        $condition = "user_email='$email'";

        $result = parent::select($tableName, $columns, $condition);

        if(mysql_num_rows($result) > 0)
            return false;
        else
            return true;

    }

    public function select_last_user(){

        $tableName = "tbl_user";
        $columns = "*";
        $condition = null;
        $Limit = 1;
        $db = DB_NAME;

        $results = parent::select_limit($tableName,$columns,$condition,$db, $Limit);

        if (mysql_num_rows($results) > 0) {

            $result = mysql_fetch_array($results);


            $user = array();
            $user["user_id"] = $result["user_id"];
            $user["user_first_name"] = $result["user_first_name"];
            $user["user_surname"] = $result["user_surname"];
            $user["user_picture"] = $result["user_picture"];
            $user["user_registered"] = $result["user_registered"];
            $user["user_modified"] = $result["user_modified"];
            $user["user_password"] = $result["user_password"];
            $user["user_cell_phone"] = $result["user_cell_phone"];
            $user["user_email"] = $result["user_email"];
            $user["user_dob"] = $result["user_dob"];
            $user["user_membership_type"] = $result["user_membership_type"];
            $user["status"] = $result["status"];

            // success
            $response["success"] = 1;

            // user node
            $response["user"] = array();

            array_push($response["user"], $user);


            // echoing JSON response
            echo json_encode($response);
        }else{
            // no products found
            $response["success"] = 0;
            $response["message"] = "No Records found";

            // echo no users JSON
            echo json_encode($response);
        }
    }

    public function get_restaurants_places(){

        $tableName = "tbl_places";
        $columns = "*";
        $condition = null;

        $results = parent::select($tableName,$columns,$condition);

        // check for empty result
        if (mysql_num_rows($results) > 0) {
            // looping through all results
            // products node
            $response["places"] = array();

            while ($row = mysql_fetch_array($results)) {
                // temp user array
                $place = array();
                $place["id"] = $row["id"];
                $place["restaurant_name"] = $row["name"];
                $place["latitude"] = $row["latitude"];
                $place["longitude"] = $row["longitude"];
                $place["type"] = $row["type"];
                $place["date_added"] = $row["added"];
                $place["date_modified"] = $row["modified"];
                $place["contact"] = $row["contact"];
                $place["street"] = $row["street"];
                $place["city"] = $row["city"];
                $place["province"] = $row["province"];
                $place["code"] = $row["code"];

                // push single product into final response array
                array_push($response["places"], $place);
            }
            // success
            $response["success"] = 1;

            // echoing JSON response
            echo json_encode($response);
        } else {
            // no products found
            $response["success"] = 0;
            $response["message"] = "No place found";

            // echo no users JSON
            echo json_encode($response);
        }
    }

    public function get_restaurants_places_by_id($id){

        $tableName = "tbl_places";
        $columns = "*";
        $condition = "id='$id'";

        $results = parent::select($tableName,$columns,$condition);

        // check for empty result
        if (mysql_num_rows($results) > 0) {
            // looping through all results
            // products node
            $response["places"] = array();

            while ($row = mysql_fetch_array($results)) {
                // temp user array
                $place = array();
                $place["id"] = $row["id"];
                $place["restaurant_name"] = $row["name"];
                $place["latitude"] = $row["latitude"];
                $place["longitude"] = $row["longitude"];
                $place["type"] = $row["type"];
                $place["date_added"] = $row["added"];
                $place["date_modified"] = $row["modified"];
                $place["contact"] = $row["contact"];
                $place["street"] = $row["street"];
                $place["city"] = $row["city"];
                $place["province"] = $row["province"];
                $place["code"] = $row["code"];

                // push single product into final response array
                array_push($response["places"], $place);
            }
            // success
            $response["success"] = 1;

            // echoing JSON response
            echo json_encode($response);
        } else {
            // no products found
            $response["success"] = 0;
            $response["message"] = "No place found";

            // echo no users JSON
            echo json_encode($response);
        }
    }



}