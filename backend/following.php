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

// add follow or unfollow
if (mysqli_num_rows($check)){
    $unfollow_sql = "DELETE FROM followers WHERE follower_id = '$follower_id' and followed_id = '$followed_id'";
    $add = $twitter->prepare($unfollow_sql);
    $add->execute();
    $response["success"] = "unfollow";
    echo json_encode($response);
    exit();
}

?>