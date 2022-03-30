<?php
    require('playlist_info.php');
    $playlist_name = $_POST['playlist_button'];
    $_SESSION['current_playlist'] = $playlist_name;

    header("Location: playlist_page.php");
?>