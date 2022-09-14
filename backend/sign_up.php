<?php

include("connection.php");

// inputs
$name = $_POST["name"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$dob = $_POST["dob"];
$join_date = $_POST["join_date"];
$response = [];

// checking username if exist

$select = mysqli_query($twitter, "SELECT username FROM users WHERE username = '$username'");
if(mysqli_num_rows($select)) {
    $response["sign_up"] = false;
    exit($json = json_encode($response));
}





?>