<?php

$con = mysqli_connect("localhost", "root", "btsarmy1118", "Music_Player_DB");

if (mysqli_connect_error()) {

    echo "<script>alert('Cannot Establish Connection With The Database')</script>";
    exit();
}
