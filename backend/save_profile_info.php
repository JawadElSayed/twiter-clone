<?php

include("connection.php");
include("functions.php");

// variables
$user_id = $_POST["user_id"];
$username = $_POST["username"];
$name = $_POST["name"];
$profile_img = $_POST["profile_img"];
$cover_img = $_POST["cover_img"];
$bio = $_POST["bio"];

// checking username if exist
$select = mysqli_query($twitter, "SELECT username FROM users WHERE username = '$username' AND NOT id = '$user_id'");
if(mysqli_num_rows($select)) {
    $response["success"] = false;
    $response["error"] = "username";
    exit($json = json_encode($response));
}

// checking change of profile image
$old_profile_url = mysqli_query($twitter, "SELECT profile_img FROM users WHERE id = '$user_id'")->fetch_object()->profile_img;
$old_profile_base64 = encode_image($old_profile_url);
if ($profile_img != $old_profile_base64){
    $new_profile_img = decode_image($profile_img,"images/profile_img/");
}
else{
    $new_profile_img = $old_profile_url;
}

// checking change of cover image
$old_cover_url = mysqli_query($twitter, "SELECT cover_img FROM users WHERE id = '$user_id'")->fetch_object()->cover_img;
$old_cover_base64 = encode_image($old_cover_url);
if ($cover_img != $old_cover_base64){
    $new_cover_img = decode_image($cover_img,"images/cover_img/");
}
else{
    $new_cover_img = $old_cover_url;
}

// set update
$sql = "UPDATE users
        SET username = '$username',
        name = '$name',
        profile_img = '$new_profile_img',
        cover_img = '$new_cover_img',
        bio = '$bio'
        WHERE id = '$user_id'";
$r = $twitter->query($sql);

$response["success"] = TRUE;

echo json_encode($response);

?>