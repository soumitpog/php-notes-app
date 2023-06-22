<?php
session_start();
include('connection.php');

$id = $_POST['id'];
$note = $_POST['note'];
$time = time();

// run a query
$sql = "UPDATE notes set note_content='$note', time='$time' where id = '$id'";
$result = mysqli_query($link, $sql);

if (!$result) {

}