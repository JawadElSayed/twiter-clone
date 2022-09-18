<?php

include("connection.php");

// variables
$follower_id = $_POST["follower_id"];
$followed_id = $_POST["followed_id"];
$response = [];

// unfollow function
function unfollow ($follower_id, $followed_id , $db){
        $unfollow_sql = "DELETE FROM followers WHERE follower_id = '$follower_id' and followed_id = '$followed_id'";
        $add = $db->prepare($unfollow_sql);
        $add->execute();
}

// checking the follow
$slq = "SELECT *
        FROM `followers`
        WHERE follower_id = '$follower_id' AND followed_id = '$followed_id'";
$check = mysqli_query($twitter, $slq);

// add follow or unfollow
if (mysqli_num_rows($check)){
        unfollow($follower_id, $followed_id, $twitter);
        $response["success"] = "unfollow";
        echo json_encode($response);
        exit();
}
else{
        $follow_sql = "INSERT INTO followers(follower_id, followed_id) VALUE (?, ?)";
        $add = $twitter->prepare($follow_sql);
        $add->bind_param("ss", $follower_id, $followed_id);
        $add->execute();
        $response["success"] = "follow";
        echo json_encode($response);
        exit();
}

$response["success"] = FALSE;
echo json_encode($response);

?>