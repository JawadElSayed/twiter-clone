<?php

include("connection.php");

// variables
$user_id = $_POST["user_info"];
$response = [];

// getting follow info
$sql_following = "SELECT COUNT(follower_id)
                    FROM `followers`
                    WHERE follower_id = '$user_id'";
$sql_follows = "SELECT COUNT(follower_id)
                FROM `followers`
                WHERE followed_id = '$user_id'";

?>