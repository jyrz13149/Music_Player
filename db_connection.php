<?php

$con = mysqli_connect("162.241.253.33", "brandsg3_Alfred", "btsarmy1118", "brandsg3_music_player_db");

if (mysqli_connect_error()) {

    echo "<script>alert('Cannot Establish Connection With The Database')</script>";
    exit();
}
