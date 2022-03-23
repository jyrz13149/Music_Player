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
    <link rel="stylesheet" href="playlist_page.css" />
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

    <section class="btn_wrap">
        <div>
            <button class="menu_btn grey_btn" onClick="">
                <div class="row_menu">
                    <div class ="column_menu">    
                        <img class="img_btn_size" src="../images/play-button.png"> 
                    </div> 
                    <div class="column_menu"> 
                        Play From Start
                    </div>
                </div>
            </button>

            <button class="menu_btn grey_btn" onClick="">
                <div class="row_menu">
                    <div class ="column_menu">    
                        <img class="img_btn_size" src="../images/loop-arrow.png">
                    </div> 
                    <div class="column_menu"> 
                        Loop Playlist
                    </div>
                </div>
            </button>

            <button class="menu_btn yellow_btn" onClick="location.href = '../search.php'">
                <div class="row_menu">
                    <div class ="column_menu">    
                        <img class="img_btn_size" src="../images/add.png">
                    </div> 
                    <div class="column_menu"> 
                        Add Song
                    </div>
                </div>
            </button>
        </div>
    </section>
    
    <section class="content-wrap">
        <div class="row_song_table">
            <div class="column_song_table">
                <h3>Song Name</h3>
            </div>

            <div class="column_song_table">
                <div class="btns">
                    <button class="song_action_btn" onClick=""><img src="../images/play-button-white.png"></button>

                    <div class="dropdown">
                        <button class="dropdown_btn"><img src="../images/more.png"></button>
                        <div class="dropdown_content">
                            <a href="">Delete</a>
                        </div>
                    </div>

                    <button class="song_action_btn" onClick="location.href = '../song_pages/song_page.php'"><img src="../images/information.png"></button>
                    </div>
            </div>
        </div>
    </section>

    <footer class="footer_wrap">
        <div>
            <div class="row_footer">
                <div class="column_footer">
                    <h2>Song Name</h2>
                </div>

                <div class="column_footer">
                    <div class="footer_btn_menu">
                        <button class="footer_btn" onClick=""><img class="flip" src="../images/next.png"></button>

                        <button class="footer_btn" onClick=""><img src="../images/pause-button.png"></button>

                        <button class="footer_btn" onClick=""><img src="../images/next.png"></button>

                        <button class="footer_btn" onClick=""><img src="../images/loop-arrow.png"></button>
                    </div>
                </div>
            </div>
        </div>

    </footer>

</body>
</html>