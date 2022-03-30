<?php
    require('../db_connection.php');
    session_start();

    $song_name = $_POST['song_info'];
    $_SESSION['current_song'] = $song_name;
    
    header("Location: song_page.php");
?>