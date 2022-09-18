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

// checking the follow
$check_follow_slq = "SELECT *
        FROM `followers`
        WHERE follower_id = '$blocker_id' AND followed_id = '$blocked_id'";
$check_follow = mysqli_query($twitter, $check_follow_slq);

// add block or unblock
if (mysqli_num_rows($check_block)){
    $unblock_sql = "DELETE FROM blocked_users WHERE blocker_id = '$blocker_id' and blocked_id = '$blocked_id'";
    $add = $twitter->prepare($unblock_sql);
    $add->execute();
    $response["success"] = "unblock";
    echo json_encode($response);
    exit();
}
else{
    if (mysqli_num_rows($check_follow)){
        unfollow($blocker_id, $blocked_id, $twitter);
        block($blocker_id, $blocked_id, $twitter);
    }
    else{
        block($blocker_id, $blocked_id, $twitter);
    }
    $response["success"] = "block";
    echo json_encode($response);
    exit();
}

$response["success"] = FALSE;
echo json_encode($response);

?>