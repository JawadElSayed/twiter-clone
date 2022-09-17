<?php

include("connection.php");
include("encode_decode_image.php");

// variables
$user_id = $_POST["user_id"];
$response = [];

// getting tweets data
$sql = "SELECT tweets.id, users.name, users.username, users.profile_img, tweets.tweet, tweets.image, COUNT(likes.users_id) as likes
        FROM `tweets`
        INNER JOIN users ON tweets.users_id = users.id
        LEFT JOIN likes ON tweets.id = likes.tweets_id
        WHERE tweets.users_id = '$user_id'
        GROUP BY tweets.id
        ORDER BY tweets.tweet_time";
$query = $twitter->prepare($sql);
$query->execute();
$array = $query->get_result();

while($a = $array->fetch_assoc()){
    $response[] = $a;
}

?>