<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$con = mysqli_connect("localhost", "msentivw_dhc", "Sa91*di.", "msentivw_dhc");

$username = $_POST["username"];
$password = $_POST["password"];

$statement= mysqli_prepare($con, "SELECT * FROM loginRegister WHERE username = ? AND password = ?");
mysqli_stmt_bind_param($statement, "ss", $username,$password);
mysqli_stmt_execute($statement);
mysqli_stmt_store_result($statement);
mysqli_stmt_bind_result($statement, $userID, $name,$age,$username,$password);

$user = array();

while(mysqli_stmt_fetch($statement)){
    $user['name'] = $name;
    $user['age'] = $age;
    $user['username'] = $username;
    $user['password'] = $password;
}

echo json_encode($user);
mysqli_stmt_close($statement);
mysqli_close($con);
