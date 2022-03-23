<?php

require('../db_connection.php');
session_start();

?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player</title>
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid&family=Roboto+Condensed:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="song_page.css" />
</head>
<body>
    <header class="content-wrap first_header">
        <div>
            <button onClick="location.href = '../logout.php'"><img src="../images/logout.png"></button>
            
            <div class="head">
                <h1 class="main_header">Goatify</h1>
            </div>
            
            <button onClick="location.href = '../logged_in/home.php'"><img src="../images/home.png"></button>
        </div>
    </header>

    <section class="content-wrap second_header">
        <h2">Songs</h2>
    </section>
    

    <section class="content-wrap">
        <div class="row">
            <div class="column">
                <!-- empty column for spacing -->
            </div>

            <div class="column">
                <h3>Song Name</h3>

                <button class="btn" onClick="location.href = ''">Album Name</button>

                <button class="btn" onClick="location.href = ''">Artist Name</button>

                <h3>Release Year</h3>

                <h3>Genre</h3>
            </div>

            <div class="column">
                <div class="dropdown">
                    <button class="dropdown_btn" onClick="location.href = ''"><img src="../images/more.png"></button>
                    <div class="dropdown_content">
                        <a href="">Add to Playlist</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>