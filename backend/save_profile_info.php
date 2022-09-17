<?php

include("connection.php");
include("encode_decode_image.php");

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

// set update
$sql = "UPDATE users
        SET username = '$username'
        SET name = '$name'
        SET profile_img = '$username'
        SET cover_img = '$username'
        SET bio = '$bio'
        WHERE id = '$user_id'";
$update = $twitter->prepare($sql);
$update->execute();

$response["success"] = TRUE;

echo json_encode($response);

?>