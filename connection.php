<?php
$link = mysqli_connect("localhost", "root", "", "online_notes_app");
if (mysqli_connect_error()) {
    die("ERROR: unable to connect " . mysqli_connect_error());
}