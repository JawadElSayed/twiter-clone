<?php

include("connection.php");

// inputs
$user_id = $_POST["user_id"];
$tweet_id = $_POST["tweet_id"];
$response = [];

// add like or unlike
$add = $twitter->prepare("INSERT INTO likes(users_id, tweets_id) VALUE (?, ?)");
$add->bind_param("ss",$user_id, $tweet_id);
if ($add->execute() === TRUE) {
    $response["success"] = "like";
} 
else {
    $sql = "DELETE FROM likes WHERE users_id = '$user_id' and tweets_id = '$tweet_id'";
    if (mysqli_query($twitter, $sql)) {
        $response["success"] = "unlike";
    } 
    else {
        $response["success"] = "Error : " . mysqli_error($twitter);
        echo json_encode($response);
        exit();
    }
}

// returning count likes
$select = mysqli_query($twitter, "SELECT COUNT(users_id) as likes FROM `likes` WHERE tweets_id = '$tweet_id'")->fetch_object()->likes;

$response["likes"] = $select;

echo json_encode($response);

?>