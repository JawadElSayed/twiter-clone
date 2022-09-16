<?php

include("connection.php");

// inputs
$name = $_POST["name"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$dob = DateTime::createFromFormat('j/n/Y', $_POST["dob"])->format('Y/m/d');
$join_date = DateTime::createFromFormat('j/n/Y', $_POST["join_date"])->format('Y/m/d');
$response = [];
$profile_img = "images/profile_img/default.png";

// checking username if exist
$select = mysqli_query($twitter, "SELECT username FROM users WHERE username = '$username'");
if(mysqli_num_rows($select)) {
    $response["sign_up"] = false;
    $response["error"] = "username";
    exit($json = json_encode($response));
}

// // checking email if exist
$select = mysqli_query($twitter, "SELECT email FROM users WHERE email = '$email'");
if(mysqli_num_rows($select)) {
    $response["sign_up"] = false;
    $response["error"] = "email";
    exit($json = json_encode($response));
}

// hash password
$password = hash("sha256", $password);
$password .= "1hfmlus";
$password = hash("sha256", $password);
$password .= "iywuhi";
$password = hash("sha256", $password);

// insert data
$add = $twitter->prepare("INSERT INTO users(username, name, email, password, dob, join_date, profile_img) VALUE (?, ?, ?, ?, ?, ?, ?)");
$add->bind_param("sssssss", $username, $name, $email, $password, $dob, $join_date, $profile_img);
$add->execute();

$response["sign_up"] = true;

echo json_encode($response);

?>