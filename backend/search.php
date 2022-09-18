<?php

include("connection.php");
include("functions.php");

// variables
$search = $_GET["search"];
$user_id = $_POST["user_id"];
$response = [];

// getting search result
$sql = "SELECT id, username, name, profile_img 
        FROM `users`
        WHERE (username LIKE '%$search%' OR name LIKE '%$search%') 
        AND NOT id = $user_id
        AND NOT id = any(SELECT blocker_id FROM `blocked_users` WHERE blocked_id = $user_id);";
$query = $twitter->prepare($sql);
$query->execute();
$array = $query->get_result();

// filling search result
while($a = $array->fetch_assoc()){
    $response[] = $a;
}

// encoding image
for ($i = 0 ; $i < count($response) ; $i++) {
    if ($response[$i]["profile_img"] != NULL){
        $response[$i]["profile_img"] = encode_image($response[$i]["profile_img"]);
    }
}

$json = json_encode($response, JSON_UNESCAPED_SLASHES);
echo $json;

?>