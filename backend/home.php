<?php

include("connection.php");
include("encode_decode_image.php");

// inputs
$user_id = $_POST["user_id"];
$response = [];

// getting user profiel image
$path = mysqli_query($twitter, "SELECT profile_img FROM users WHERE id = '$user_id'")->fetch_object()->profile_img;
$profile_image_64 = encode_image($path);
$response["profile_img"] = $profile_image_64;

// getting tweets
$sql = "SELECT tweets.id, users.name, users.username, tweets.tweet, tweets.image, COUNT(likes.users_id) as likes
        FROM `tweets`
        INNER JOIN users ON tweets.users_id = users.id
        INNER JOIN likes ON tweets.id = likes.tweets_id
        WHERE tweets.users_id = ANY (SELECT followed_id FROM followers WHERE followers.follower_id = '$user_id')
        GROUP BY tweets.id
        ORDER BY tweets.tweet_time";
$query = $twitter->prepare($sql);
$query->execute();
$array = $query->get_result();

while($a = $array->fetch_assoc()){
    $response[] = $a;
}

$json = json_encode($response, JSON_UNESCAPED_SLASHES);
echo $json;

?>