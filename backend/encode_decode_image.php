<?php

include("connection.php");


function encode_image ($path){
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = "data:images/" . $ext . ";base64," . base64_encode($data);
    return $base64;
}

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

?>