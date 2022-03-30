<?php
  require ('db_connection.php');
  session_start();
?>

<!DOCTYPE html>
<html  id="wholePage">
    <center>
    <header>
        <link rel="stylesheet" href="add_to_play.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100&family=Roboto+Condensed:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">
    
        <!-- The logout button and home button, give it functionality later -->
        <input type="image" src="images/logout.png" id="logOutButton" onclick="logout()">
        <input type="image" src="images/home.png" id="homeButton" onclick="home()">
    </header>

    <body>

        <div id="header">
            <label class="brand">Goatify</label>
        </div>

                <table id="titles">
                    <thead>
                        <tr class="brand">
                            <td id="text" class="brand"><Label>Which Playlist/s would you like to add to</Label></td>
                        </tr>
                        <tr class="brand">
                            <td id="list" class="brand">List of Playlist</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(isset($_POST['songToAdd']))
                            {
                                $_SESSION['songToAdd'] = $_POST['songToAdd'];
                            }
                            if(isset($_SESSION['email']))
                            {
                                    $email = $_SESSION['email'];

                                // goes to the data base with our quere and retreives the desired info

                                $sql = "SELECT * from `$email`";
                                $results = mysqli_query($con, $sql);

                                while($playlistRow = mysqli_fetch_array($results))
                                {
                                    $playlistName = $playlistRow[1];
                                    ?>

                                    <tr class="brand">
                                        <td>
                                            <!-- make the action go to that playlist page -->
                                            <form method="POST" action="">
                                                <input type="hidden" name="playlistToAddTo" value="<?php echo $playlistRow[0]; ?>"/>
                                                <input type="hidden" name="playlistToAddToName" value="<?php echo $playlistName; ?>"/>
                                                <input type="submit" name="submit" id="playlistBtn" value="<?php echo $playlistName; ?>"/>
                                            </form>
                                        </td>
                                    </tr>
                                    <br>
                                    <?php
                                    
                                }
                            }
                        ?>
                    </tbody>
                </table>

                <?php
                    if(isset($_POST['playlistToAddTo']))
                    {
                        $playlistToAddTo = $_POST['playlistToAddTo'];
                        $songToAddTo = $_SESSION['songToAdd'];

                        $_SESSION['current_playlist'] = $_POST['playlistToAddToName'];

                        // insert into $query = "INSERT INTO `$_SESSION[email]`(`playlist_name`) VALUES ('$_POST[playlist_name]')";
                        // do the whole quere and add to that table in this if statement
                        //$query = "INSERT INTO `song_``$_SESSION[email]`";
                        $query = "SELECT * from music_information
                        WHERE id = $songToAddTo";

                        $results = mysqli_query($con, $query);
                        $songInfo = mysqli_fetch_assoc($results);

                        $songName = str_replace("'", "''", $songInfo['song_name']);
                        $artist = str_replace("'", "''", $songInfo['artist_name']);
                        $album = str_replace("'", "''", $songInfo['album_name']);
                        $genre = str_replace("'", "''", $songInfo['genre']);
                        $release = str_replace("'", "''", $songInfo['release_year']);
                        $link = str_replace("'", "''", $songInfo['link']);

                        $insertion = "INSERT INTO `song_$_SESSION[email]`(`playlist_id`, `song_name`, `artist_name`, `album_name`, `genre`, `release_year`, `link`) 
                        VALUES ('$playlistToAddTo','$songName','$artist','$album','$genre','$release','$link')";

                        mysqli_query($con, $insertion);

                        echo "
                                    <script>
                                        alert('Added To Playlist'); 
                                        window.location.href='playlist_pages/playlist_page.php'; 
                                    </script>
                                    ";
                    }
                ?>
                
        

        <!-- java script to redirect to home page and logout page -->
        <script>
        function logout()
        {
            window.location.href="logout.php"
        }
        function home()
        {
            window.location.href="./logged_in/home.php"
        }
        </script>
    </body>
    </center>
</html>