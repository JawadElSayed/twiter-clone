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

?>