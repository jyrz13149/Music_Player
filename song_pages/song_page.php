<?php

require('../db_connection.php');
session_start();

$song_name = mysqli_real_escape_string($con, $_SESSION['current_song']);

$query = "SELECT * FROM `music_information` WHERE `song_name` = '$song_name'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

$song_id = $row['id'];
$song_name = $row['song_name'];
$album = $row['album_name'];
$artist = $row['artist_name'];
$year = $row['release_year'];
$genre = $row['genre'];


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
        <h2">Song Information</h2>
    </section>
    

    <section class="content-wrap">
        <div class="row">
            <div class="column">
                <!-- empty column for spacing -->
            </div>

            <div class="column">
                <h3>Song Name: <?php echo $song_name ?></h3>
                <?php
                    if (isset($album))
                    {
                        echo "  <form action=\"../album_page.php\" method='POST'>
                                    <button type=\"submit\" value=\"$album\" name=\"albumName\" class=\"btn\">Album: $album </button>
                                </form>
                             ";
                    }
                ?>

                <form action="../artist.php" method='POST'>
                    <button class="btn" type="submit" value="<?php echo $artist ?>" name="artistName">Artist: <?php echo $artist ?></button>
                </form>

                <h3>Release Year: <?php echo $year ?></h3>

                <h3>Genre: <?php echo $genre ?></h3>
            </div>

            <div class="column">
                <div class="dropdown">
                    <button class="dropdown_btn" onClick="location.href = ''"><img src="../images/more.png"></button>
                    <div class="dropdown_content">
                        <form action="../add_to_play.php" method='POST'>
                            <button type="submit" value="<?php echo $song_id ?>" name="songToAdd">
                                Add to Playlist
                            </button>
                        </form>
                        <!-- <a href="../add_to_play.php">Add to Playlist</a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>