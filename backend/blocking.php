<?php

include("connection.php");
include("functions.php");

// variables
$blocker_id = $_POST["blocker_id"];
$blocked_id = $_POST["blocked_id"];
$response = [];

// checking the follow
$check_follow_slq = "SELECT *
        FROM `followers`
        WHERE follower_id = '$blocker_id' AND followed_id = '$blocked_id'";
$check_follow = mysqli_query($twitter, $check_follow_slq);


?>