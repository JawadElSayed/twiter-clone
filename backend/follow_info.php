<?php

include("connection.php");

// variables
$user_id = $_POST["user_id"];
$response = [];

// getting follow info
$sql_following = "SELECT COUNT(follower_id) as following
                    FROM `followers`
                    WHERE follower_id = '$user_id'";
$sql_followers = "SELECT COUNT(follower_id) as followers
                FROM `followers`
                WHERE followed_id = '$user_id'";

$following = mysqli_query($twitter,$sql_following)->fetch_object()->following;
$followers = mysqli_query($twitter,$sql_followers)->fetch_object()->followers;

$response["following"] = $following;
$response["followers"] = $followers;

echo json_encode($response);

?>