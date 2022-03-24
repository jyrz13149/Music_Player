<?php

require('db_connection.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="delete_playlist.css" />
</head>

<body>

    <header>
        <div class='user_logout'>
            <a href='logout.php'>LOGOUT</a>
        </div>
        <h1>GOATIFY</h1>
        <div class='user_home'>
            <a href='logged_in/home.php'>HOME</a>
        </div>
    </header>

    <div class="delete_question">
        <h2>Which Playlist would you like to delete?</h2>
    </div>

    <!-- List of Playlists, New Playlist, Delete Playlist  -->
    <div class="head_title">
        <h3>
            List of Playlist
        </h3>
    </div>

    <div class="playlists">
        <div class="lists">
            <table border="1px">
                <?php

                $query = "SELECT * FROM `$_SESSION[email]`";
                $result = mysqli_query($con, $query);

                while ($name = mysqli_fetch_assoc($result)) {
                ?>
                    <tr class="names">
                        <td>
                            <?php
                            echo $name['playlist_name'];
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>

    <div class="delete_playlist">
        <form style="text-align: center" method="POST">
            <input type="text" placeholder="Playlist Name" name="playlist_name" required />
            <br /><br />
            <button type="submit" class="delete-btn" name="playlist_delete">DELETE</button>
        </form>
    </div>

    <?php

    if (isset($_POST['playlist_delete'])) {

        $query = "SELECT * FROM `$_SESSION[email]` WHERE `playlist_name`='$_POST[playlist_name]'";
        $result = mysqli_query($con, $query);

        if ($result) {

            # Playlist Name Exists. Delete the Playlist Name 
            if (mysqli_num_rows($result) > 0) {

                # Check the song_email table for any songs that will be in the deleted playlist
                # Delete the songs in the song_email table with playlist_id = delete playlist id 
                $fetch_playlist = mysqli_fetch_assoc($result);

                $song_query = "SELECT * FROM `song_$_SESSION[email]`";
                $song_result = mysqli_query($con, $song_query);

                $num_rows = mysqli_num_rows($song_result);

                if ($song_result) {

                    for ($i = 0; $i < $num_rows; $i++) {

                        mysqli_query($con, "DELETE FROM `song_$_SESSION[email]` WHERE `playlist_id`='$fetch_playlist[id]'");
                    }
                }

                $query = "DELETE FROM `$_SESSION[email]` WHERE `playlist_name`='$_POST[playlist_name]'";
                if (mysqli_query($con, $query)) {

                    # Check if there is any playlist/s left after deleting one 
                    $query = "SELECT * FROM `$_SESSION[email]`";
                    $result = mysqli_query($con, $query);

                    # If table is empty  
                    if (mysqli_num_rows($result) == 0) {

                        $query = "SELECT * FROM `user_information` WHERE `email`='$_SESSION[email]'";
                        $result = mysqli_query($con, $query);

                        if ($result) {

                            $delete_table = "DROP TABLE `Music_Player_DB`.`$_SESSION[email]`";
                            $delete_song_table = "DROP TABLE `Music_Player_DB`.`song_$_SESSION[email]`";
                            $update_status = "UPDATE `user_information` SET `playlist_status`='0' WHERE `email`='$_SESSION[email]'";

                            if (mysqli_query($con, $delete_table) && mysqli_query($con, $update_status) && mysqli_query($con, $delete_song_table)) {

                                echo "
                                    <script>
                                        alert('Playlist Deletion Successful'); 
                                        window.location.href='logged_in/home.php'; 
                                    </script>
                                    ";
                            }
                        }
                    }
                    # If table is not empty 
                    else {

                        echo "
                            <script>
                                alert('Playlist Deletion Successful'); 
                                window.location.href='logged_in/home.php'; 
                            </script>
                            ";
                    }
                } else {

                    echo "
                        <script>
                            alert('The Server Is Down. Please Try Again'); 
                            window.location.href='index.php'; 
                        </script>
                        ";
                }
            }
            # Playlist Name Doesn't Exist
            else {

                echo "
                    <script>
                        alert('Playlist Name $_POST[playlist_name] Does Not Exist'); 
                        window.location.href='logged_in/home.php'; 
                    </script>
                    ";
            }
        } else {

            echo "
                <script>
                    alert('The Server Is Down. Please Try Again'); 
                    window.location.href='index.php'; 
                </script>
                ";
        }
    }

    ?>

</body>

</html>