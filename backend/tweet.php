<?php

include("connection.php");

// inputs
$user_id = $_POST["user_id"];
$tweet = $_POST["tweet"];
$tweet_time = DateTime::createFromFormat('j/n/Y G:i:s', $_POST["tweet_time"])->format('Y/m/d H:i:s');
$image = $_POST["image"];

// add tweet
$query = $twitter->prepare("INSERT INTO tweets(tweet, users_id, tweet_time) VALUE (?, ?, ?)");
$query->bind_param("sss", $tweet, $user_id, $tweet_time);
$query->execute();

// adding image
$image = explode( ',', $image );
$image = $image[1];
$data = base64_decode($image);
$file = "images/" . uniqid() . '.png';
$success = file_put_contents($file, $data);

$response = [];
$response["success"] = true;

echo json_encode($response);


?>