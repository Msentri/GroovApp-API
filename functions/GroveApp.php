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
    //sandile
    
        public function create_user($name, $surname, $id_number,$email,$cellphone ,$username,$password){

                $tableName = "Users";
                $columns = "id,name,surname,id_number,email,cellphone,username,password";
                $values = "'null','$name','$surname','$id_number','$email','$cellphone','$username','$password'";


                $create = parent::insert($tableName, $columns, $values);

                // check if row inserted or not
		    if ($create) {
		        // successfully inserted into database
		        $response["success"] = 1;
		        $response["message"] = "Product successfully created.";
		 
		        // echoing JSON response
		        echo json_encode($response);
		    } else {
		        // failed to insert row
		        $response["success"] = 0;
		        $response["message"] = "Oops! An error occurred.";
		 
		        // echoing JSON response
		        echo json_encode($response);}


        }

    public function create_user_g($user_first_name,$user_surname,$user_password,
                                  $user_cell_phone,$user_email,$user_dob,$user_membership_type){
        $USER_ID  = "null";
        $status = 0;
        $user_picture = "N/A";

        $user_registered = parent::getDateBasic();


        $tableName = "groovapp_user";
        $columns = "user_id,user_first_name,user_surname,user_picture,user_registered,user_password,user_cell_phone,
        user_email,user_dob,user_membership_type,status";


        $values = "'$USER_ID','$user_first_name','$user_surname','$user_picture','$user_registered','$user_password','$user_cell_phone',
        '$user_email','$user_dob',$user_membership_type,'$status'";

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

        public function get_user($username){

            
            $tableName = "Users";
            $columns = "*";
            $condition = "username='$username'";
            
            $result = parent::select($tableName, $columns, $condition);
            
            if (!empty($result)) {
                // check for empty result
                if (mysql_num_rows($result) > 0) {

                    $result = mysql_fetch_array($result);

                    $product = array();
                    $product["user_id"] = $result["id"];
                    $product["name"] = $result["name"];
                    $product["surname"] = $result["surname"];
                    $product["email"] = $result["email"];
                    $product["id_number"] = $result["id_number"];
                    $product["cellphone"] = $result["cellphone"];
                    $product["username"] = $result["username"];
                    $product["password"] = $result["password"];
                    // success
                    $response["success"] = 1;

                    // user node
                    $response["user"] = array();

                    array_push($response["user"], $product);

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


        $tableName = "groovapp_creadit_card";
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
}