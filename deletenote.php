<?php
session_start();
include('connection.php');
$note_id = $_POST['id'];
$sql = "DELETE from notes where id = $note_id";
$result = mysqli_query($link, $sql);