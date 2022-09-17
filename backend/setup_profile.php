<?php

include("connection.php");
include("encode_decode_image.php");

// variables
$user_id = $_POST["user_id"];
$response = [];

// getting setup profile info
$sql = "SELECT username, name, profile_img, cover_img, bio
        FROM `users`
        WHERE id = '$user_id'";
$query = $twitter->prepare($sql);
$query->execute();
$array = $query->get_result();

?>