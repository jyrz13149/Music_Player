<?php
    require('playlist_info.php');

    $link = $_POST['last_song'];
    $id = $_POST['last_playlist'];

    $query = "UPDATE `user_information` SET `last_song_link` = '$link', `last_playlist` = '$id' WHERE `email` = '$email'";

    mysqli_query($con, $query);
?>