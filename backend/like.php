<?php

include("connection.php");

// inputs
$user_id = $_POST["user_id"];
$tweet_id = $_POST["tweet_id"];

// add like
$query = $twitter->prepare("INSERT INTO likes(users_id, tweets_id) VALUE (?, ?)");
$query->bind_param("ss",$user_id, $tweet_id);
$query->execute();

// returning count likes


$response = [];
$response["success"] = true;

echo json_encode($response);

?>