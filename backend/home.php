<?php

include("connection.php");
include("encode_decode_image.php");

// inputs
$user_id = $_POST["user_id"];
$response = [];

// getting user profiel image
$path = mysqli_query($twitter, "SELECT profile_img FROM users WHERE id = '$user_id'")->fetch_object()->profile_img;
$profile_image_64 = encode_image($path);
$response["profile_img"] = $profile_image_64;

$json = json_encode($response, JSON_UNESCAPED_SLASHES);
echo $json;

?>