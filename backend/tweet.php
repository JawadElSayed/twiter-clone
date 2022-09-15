<?php

include("connection");

// inputs
$user_id = $_POST["user_id"];
$tweet = $_POST["tweet"];
$tweet_time = DateTime::createFromFormat('d/m/Y h:m:s', $_POST["tweet_time"])->format('Y/m/d h:m:s');
$image = $_POST["image"];

// add tweet
$query = $twitter->prepare("INSERT INTO tweets(tweet, users_id, tweet_time) VALUE (?, ?, ?)");
$query->bind_param("sss", $tweet, $users_id, $tweet_time);
$query->execute();

$response = [];
$response["success"] = true;

echo json_encode($response);


?>