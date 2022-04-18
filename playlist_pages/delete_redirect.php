<?php
    require("playlist_info.php");

    $playlist = $_SESSION['current_playlist'];
    $toDeleteID = $_POST['delete'];

    # for debugging
    # echo "$playlist <br> ID: $toDeleteID <br>";

    $query = "DELETE FROM `song_$email` WHERE `id` = '$toDeleteID'";
    mysqli_query($con, $query);
    
    header("Location: playlist_page.php");
?>