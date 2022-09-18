<?php

include("connection.php");

// variables
$follower_id = $_POST["follower_id"];
$followed_id = $_POST["followed_id"];
$response = [];

// checking the follow
$slq = "SELECT *
        FROM `followers`
        WHERE follower_id = '$follower_id' AND followed_id = '$followed_id'";
$check = mysqli_query($twitter, $slq);

?>