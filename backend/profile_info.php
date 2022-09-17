<?php

include("connection.php");
include("encode_decode_image.php");

// variables
$user_id = $_POST["user_id"];
$response = [];

// getting profile info
$sql = "SELECT username, name, join_date, profile_img, cover_img
        FROM users
        WHERE id = '$user_id'";
$query = $twitter->prepare($sql);
$query->execute();
$array = $query->get_result();

?>