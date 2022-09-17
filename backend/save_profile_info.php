<?php

include("connection.php");
include("encode_decode_image.php");

// variables
$user_id = $_POST["user_id"];
$username = $_POST["username"];
$name = $_POST["name"];
$profile_img = $_POST["profile_img"];
$cover_img = $_POST["cover_img"];
$bio = $_POST["bio"];

// checking username if exist
$select = mysqli_query($twitter, "SELECT username FROM users WHERE username = '$username' AND NOT id = '$user_id'");
if(mysqli_num_rows($select)) {
    $response["success"] = false;
    $response["error"] = "username";
    exit($json = json_encode($response));
}

?>