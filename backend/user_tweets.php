<?php

include("connection.php");
include("functions.php");

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

// encoding image
for ($i = 0 ; $i < count($response) ; $i++) {
    if ($response[$i]["image"] != NULL){
            $response[$i]["image"] = encode_image($response[$i]["image"]);
    }
    if ($response[$i]["profile_img"] != NULL){
            $response[$i]["profile_img"] = encode_image($response[$i]["profile_img"]);
    }
}

$json = json_encode($response, JSON_UNESCAPED_SLASHES);
echo $json;

?>