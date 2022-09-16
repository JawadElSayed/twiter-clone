<?php

include("connection.php");

// inputs
$user_id = $_POST["user_id"];
$tweet = $_POST["tweet"];
$tweet_time = DateTime::createFromFormat('j/n/Y G:i:s', $_POST["tweet_time"])->format('Y/m/d H:i:s');
$image = $_POST["image"];

// decoding and saving image
if ($image != NULL){
    $image = explode( ',', $image );
    $ext = explode( '/', $image[0] );
    $ext = explode( ';', $ext[1] );
    $ext = $ext[0];
    $image = $image[1];
    $data = base64_decode($image);
    $file = "images/tweet_img/" . uniqid() . '.' . $ext;
    $success = file_put_contents($file, $data);
}

// add tweet
$query = $twitter->prepare("INSERT INTO tweets(tweet, image, users_id, tweet_time) VALUE (?, ?, ?, ?)");
$query->bind_param("ssss", $tweet, $file, $user_id, $tweet_time);
$query->execute();

$response = [];
$response["success"] = true;

echo json_encode($response);

?>