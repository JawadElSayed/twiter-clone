<?php

include("connection.php");

$email = $_POST["email"];
$password = $_POST["password"];

// checking email if exist
$select = mysqli_query($twitter, "SELECT email FROM users WHERE email = '$email'");
if(!(mysqli_num_rows($select))) {
    $response["success"] = false;
    $response["error"] = "email";
    exit($json = json_encode($response));
}

// hash password
$password = hash("sha256", $password);
$password .= "1hfmlus";
$password = hash("sha256", $password);
$password .= "iywuhi";
$password = hash("sha256", $password);

// checking password if exist
$select = mysqli_query($twitter, "SELECT password FROM users WHERE email = '$email'")->fetch_object()->password;
if($password != $select) {
    $response["success"] = false;
    $response["error"] = "password";
    exit($json = json_encode($response));
}

?>