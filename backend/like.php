<?php

include("connection.php");

// inputs
$user_id = $_POST["user_id"];
$tweet_id = $_POST["tweet_id"];

// add tweet
$query = $twitter->prepare("INSERT INTO likes(users_id, tweets_id) VALUE (?, ?)");
$query->bind_param("ss",$user_id, $tweet_id);
$query->execute();

// returning count likes
$select = mysqli_query($twitter, "SELECT COUNT(users_id) as likes FROM `likes` WHERE tweets_id = '$tweet_id'")->fetch_object()->likes;

$response = [];
$response["success"] = true;
$response["likes"] = $select;

echo json_encode($response);

?>