<?php

include("connection.php");

// inputs
$name = $_POST["name"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$dob = DateTime::createFromFormat('d/m/Y', $_POST["dob"])->format('Y/m/d');
$join_date = DateTime::createFromFormat('d/m/Y', $_POST["join_date"])->format('Y/m/d');
$response = [];

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

// insert data
$add = $twitter->prepare("INSERT INTO users(username, name, email, password, dob, join_date) VALUE (?, ?, ?, ?, ?, ?)");
$add->bind_param("ssssss", $username, $name, $email, $password, $dob, $join_date);
$add->execute();

$response["sign_up"] = true;

echo json_encode($response);

?>