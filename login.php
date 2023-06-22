<?php
session_start();
include('connection.php');

$missingUsername = '<p>Please enter email address</p>';
$missingPassword = '<p>Please enter your password</p>';
$errors = '';
$username = '';
$password = '';
// get username
if (empty($_POST["loginusername"])) {
    $errors .= $missingUsername;
} else {
    $username = filter_var($_POST["loginusername"], FILTER_SANITIZE_STRING);
}

// get password
if (empty($_POST["loginpassword"])) {
    $errors .= $missingPassword;
} else {
    $password = filter_var($_POST["loginpassword"], FILTER_SANITIZE_STRING);
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
$sql = "select * from users WHERE username='$username' AND user_password='$password'";
$result = mysqli_query($link, $sql);
if (!$result) {
    echo '<div>error running the query</div>';
}
$results = mysqli_num_rows($result);

if ($results == 1) {
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['user_password'];
    echo "success";
    exit;
}

if ($results !== 1) {
    echo "<div class='alert alert-danger alert-dismissible'>
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
    wrong Username and Password</div>";
    exit;
}