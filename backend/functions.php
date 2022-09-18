<?php

include("connection.php");

// encode image
function encode_image ($path){
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = "data:image/" . $ext . ";base64," . base64_encode($data);
    return $base64;
}

// decode image
function decode_image ($base64, $path){
    $base64 = explode( ',', $base64 );
    $ext = explode( '/', $base64[0] );
    $ext = explode( ';', $ext[1] );
    $ext = $ext[0];
    $image = $base64[1];
    $data = base64_decode($image);
    $file = $path . uniqid() . '.' . $ext;
    $success = file_put_contents($file, $data);
    return $file;
}

// unfollow function
function unfollow ($follower_id, $followed_id , $db){
    $unfollow_sql = "DELETE FROM followers WHERE follower_id = '$follower_id' and followed_id = '$followed_id'";
    $add = $db->prepare($unfollow_sql);
    $add->execute();
}

// blocking function
function block ($blocker_id, $blocked_id, $db){
    $block_sql = "INSERT INTO blocked_users(blocker_id, blocked_id) VALUE (?, ?)";
    $add = $db->prepare($block_sql);
    $add->bind_param("ss", $blocker_id, $blocked_id);
    $add->execute();
}

?>