<?php

include("connection.php");

// inputs
$user_id = $_POST["user_id"];
$response = [];

// getting user profiel image
$path = mysqli_query($twitter, "SELECT profile_img FROM users WHERE id = '$user_id'")->fetch_object()->profile_img;
$ext = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = "data:images/" . $ext . ";base64," . base64_encode($data);
$response["profile_img"] = $base64;

$json = json_encode($response, JSON_UNESCAPED_SLASHES);
echo $json;

?>