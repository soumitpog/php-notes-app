<?php
session_start();
include('connection.php');
$missing_username = '<p>Please enter a username</p>';
$missing_password = '<p>Please enter a password</p>';
$errors = '';
$username = '';
$password = '';
// get username
if (empty($_POST["username"])) {
    $errors .= $missing_username;
} else {
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
}
// get password
if (empty($_POST["password"])) {
    $errors .= $missing_password;
} else {
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
}

if ($errors) {
    $result_message = "<div class='alert alert-danger alert-dismissible'>
    <button type='button' class='close' data-dismiss='alert'>&times;</button>" . $errors . "</div>";
    echo $result_message;
    exit;
}

// prepare query
$username = mysqli_real_escape_string($link, $username);
$password = mysqli_real_escape_string($link, $password);

$sql = "select * from users where username = '$username'";
// $sql = "show databases";
$result = mysqli_query($link, $sql);
if (!$result) {
    echo '<div>error running the query</div>';
}

$results = mysqli_num_rows($result);
if ($results) {
    echo "<div class='alert alert-danger alert-dismissible'>
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
    That username is already registered. Do you want to log in?</div>";
    exit;
}
// query to insert the received username and password to the db
$sql = "insert into users (`username`, `user_password`) VALUES ('$username', '$password')";
$result = mysqli_query($link, $sql);
if (!$result) {
    echo '<div class="alert alert-danger">
    There was an error inserting the users details in the database!</div>';
    exit;
}

$sql = "select * from users where username = '$username'";
$result = mysqli_query($link, $sql);
$results = mysqli_num_rows($result);

if ($results) {
    echo "<div class='alert alert-success alert-dismissible'>
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
    Thank for your registring!</br>You can log in now</div>";
    exit;
}