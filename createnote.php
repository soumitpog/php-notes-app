<?php
session_start();
include('connection.php');
$user_id = $_SESSION['user_id'];
$time = time();

$sql = "INSERT into notes (`user_id`, `note_content`, `time`) values ($user_id, '', '$time')";
$result = mysqli_query($link, $sql);

if (!$result) {
    echo 'error';
    exit;
} else {
    // gonna return auto generated id for last query
    echo mysqli_insert_id($link);
}