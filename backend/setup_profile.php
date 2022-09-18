<?php

include("connection.php");
include("functions.php");

// variables
$user_id = $_POST["user_id"];
$response = [];

// getting setup profile info
$sql = "SELECT username, name, profile_img, cover_img, bio
        FROM `users`
        WHERE id = '$user_id'";
$query = $twitter->prepare($sql);
$query->execute();
$array = $query->get_result();

while($a = $array->fetch_assoc()){
    $response[] = $a;
}

// encoding image
for ($i = 0 ; $i < count($response) ; $i++) {
    if ($response[$i]["profile_img"] != NULL){
        $response[$i]["profile_img"] = encode_image($response[$i]["profile_img"]);
    }
    if ($response[$i]["cover_img"] != NULL){
        $response[$i]["cover_img"] = encode_image($response[$i]["cover_img"]);
    }
}

$json = json_encode($response, JSON_UNESCAPED_SLASHES);
echo $json;

?>