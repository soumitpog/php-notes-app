<?php
session_start();
include('connection.php');

// get user_id
$user_id = $_SESSION['user_id'];

// run a query to delete empty notes
$sql = "DELETE FROM notes WHERE note_content=''";
$result = mysqli_query($link, $sql);


//run a query to look for notes corresponding to our user_id
$sql = "SELECT * from notes where user_id = $user_id order by time desc";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $note = $row['note_content'];
            $time = $row['time'];
            $time = date("F d, Y h:i:s A", $time);
            $note_id = $row['id'];
            echo "
            <div class='note'>
            <div class='col-md-4 delete'>
            <button class='btn-lg btn-danger'>delete</button>
            </div>
            <div class='noteheader' id='$note_id'>
            <div class='text'>$note</div>
            <div class='timetext'>$time</div>
            </div>
            </div>";
        }
    } else {
        echo "<div class='alert alert-warning'>You have not created any notes yet.</div>";
        exit;
    }
} else {
    echo "<div class='alert alert-warning'>An error Occured!</div>";
    exit;
}
//show them to notes page or alert message