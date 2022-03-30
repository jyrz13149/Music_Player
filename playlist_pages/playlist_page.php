<?php
    require('playlist_info.php');

    $playlist_name = $_SESSION['current_playlist'];

    $query = "SELECT `id` FROM `$email` WHERE `playlist_name` = '$playlist_name'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

    $playlist_id = $row['id'];

    # for debuggin
    # echo $playlist_id;

    $song_names = array();
    $song_links = array();
    $song_ids = array();
    $song_order = array();

    $query = "SELECT * FROM `song_$email` WHERE `playlist_id` = '$playlist_id'";
    $result = mysqli_query($con, $query);

    $num_rows = mysqli_num_rows($result);

    for ($x = 0; $x < $num_rows; $x++)
    {
        $row = mysqli_fetch_assoc($result);
        
        array_push($song_names, $row['song_name']);
        array_push($song_links, $row['link']);
        array_push($song_ids, $row['id']);
        array_push($song_order, $x);

        # for debugging: 
        # echo "$song_names[$x], $song_ids[$x]<br> $song_links[$x] <br>";
    }
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

    <script>
        var music = new Audio();
        var currentTrack = -1;
        var songLinks = <?php echo json_encode($song_links);?>;
        var songNames = <?php echo json_encode($song_names);?>;
        var loopOn = false;
    </script>

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

    <section class="second_header_wrap">
        <div class="head">
            <h2 class="second_header"> Playlist: <?php echo $playlist_name; ?></h2>
        </div>
    </section>

    <section class="btn_wrap">
        <div>
            <button class="menu_btn grey_btn" onClick="playMusic(`<?php echo $song_links[0] ?>`, `<?php echo $song_order[0]?>`); updateSong(`<?php echo urlencode($song_names[0]) ?>`)">
                <div class="row_menu">
                    <div class ="column_menu">    
                        <img class="img_btn_size" src="../images/play-button.png"> 
                    </div> 
                    <div class="column_menu"> 
                        Play From Start
                    </div>
                </div>
            </button>

            <button class="menu_btn grey_btn" onClick="playMusic(`<?php echo $song_links[0] ?>`, `<?php echo $song_order[0]?>`); loop(); updateSong(`<?php echo urlencode($song_names[0]) ?>`)">
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
        <?php
        for ($i = 0; $i < $num_rows; $i++)
        {
            $sName = urlencode($song_names[$i]);
            echo "  <div class='row_song_table'>
                        <div class='column_song_table'>
                            <h3 class='song_name'>$song_names[$i]</h3>
                        </div>

                        <div class='column_song_table'>
                            <div class='btns'>
                                <button class='song_action_btn' onClick='playMusic(\"$song_links[$i]\", \"$song_order[$i]\"); updateSong(`$sName`)'><img src='../images/play-button-white.png'></button>

                                <div class='dropdown'>
                                    <button class='dropdown_btn'><img src='../images/more.png'></button>
                                    <div class='dropdown_content'>
                                        <form action='delete_redirect.php' method='POST'>
                                            <button type='submit' name='delete' value=\"$song_ids[$i]\">Delete</button>
                                        </form>
                                    </div>
                                </div>

                                <form action='../song_pages/song_redirect.php' method='POST'>
                                    <button type='submit' class='song_action_btn' value=\"$song_names[$i]\" name='song_info'>
                                        <img src='../images/information.png'>
                                    </button>
                                </form>
                            </div>
                        </div> 
                    </div>
                ";
        }
        ?>
    </section>

    <footer class="footer_wrap">
        <div>
            <div class="row_footer">
                <div class="column_footer">
                    <h2 id="playing">Select a Song</h2>
                </div>

                <div class="column_footer">
                    <div class="footer_btn_menu">

                        <!-- <audio controls>
                            <source src="../music_link/BTOB_Beautiful_Pain.mp3" type="audio/mpeg">
                            Unfortunately, the audio element is not supported in your browser.
                        </audio> -->


                        <button class="footer_btn" onClick="prevSong()"><img class="flip" src="../images/next.png"></button>

                        <button class="footer_btn" onClick="pauseMusic()"><img src="../images/pause-button.png"></button>

                        <button class="footer_btn" onClick="nextSong()"><img src="../images/next.png"></button>

                        <button class="footer_btn" onClick="loop()"><img src="../images/loop-arrow.png"></button>
                    </div>
                </div>
            </div>
        </div>

    </footer>

    <script>
        function playMusic(fileLink, activeTrack)
        {
            currentTrack = activeTrack;
            music.src = fileLink;
            music.play();
        }

        function pauseMusic()
        {
            music.pause();
        }

        function prevSong()
        {
            music.pause();
            if (currentTrack == 0 && loopOn)
            {
                currentTrack = songLinks.length - 1;
            }
            else if (currentTrack == 0 && !loopOn)
            {
                music.pause();
                return;
            }
            else
            {
                currentTrack--;
            }
            music.src = songLinks[currentTrack];
            music.play();
            updateSong(songNames[currentTrack]);
        }

        function loop()
        {
           loopOn = !loopOn;
           console.log(loopOn);
        }

        function nextSong()
        {
            music.pause();
            if (currentTrack == (songLinks.length - 1) && loopOn)
            {
                currentTrack = 0;
            }
            else if (currentTrack == (songLinks.length - 1) && !loopOn)
            {
                music.pause();
                return;
            }
            else
            {
                currentTrack++;
            }
            music.src = songLinks[currentTrack];
            music.play();
            updateSong(songNames[currentTrack]);
        }

        function updateSong(songName)
        {
            newSong = decodeURIComponent(songName);
            newSong = newSong.replace(/\+/g, ' ');
            var song = document.getElementById("playing");
            song.innerHTML = newSong;
        }

        //music.addEventListener('ended', nextSong());
    </script>

</body>
</html>