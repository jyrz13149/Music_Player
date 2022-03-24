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
    <title>Create Playlist</title>
    <link rel="stylesheet" href="create_playlist.css" />
</head>

<body>

    <!-- 
    User Will be Directed Here Either when they first login (playlist_status == 0)
    Or when they want to create a playlist from the home page (playlist_status == 1)
-->

    <header>
        <div class='user_logout'>
            <a href='logout.php'>LOGOUT</a>
        </div>
        <div class='home'>
            <a href="logged_in/home.php">HOME</a>
        </div>
    </header>

    <div class="create_playlist">
        <form style="text-align: center" method="POST">
            <h2>
                <span>CREATE PLAYLIST</span>
            </h2>
            <input type="text" placeholder="Playlist Name" name="playlist_name" required />
            <br /><br />
            <button type="submit" class="create-btn" name="playlist_create">CREATE</button>
        </form>
    </div>


    <?php

    if (isset($_POST['playlist_create'])) {

        $query = "SELECT * FROM `user_information` WHERE `email`= '$_SESSION[email]'";
        $result = mysqli_query($con, $query);

        if ($result) {

            $result_fetch = mysqli_fetch_assoc($result);

            # If user has not created a playlist yet (User login for the first time) 
            if ($result_fetch['playlist_status'] == 0) {

                # create table (table name = email)
                $create_table = "CREATE TABLE `Music_Player_DB`.`$_SESSION[email]` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `playlist_name` VARCHAR(128) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
                $create_song_table = "CREATE TABLE `Music_Player_DB`.`song_$_SESSION[email]` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `playlist_id` INT(11) NOT NULL , `song_name` VARCHAR(128) NOT NULL , `artist_name` VARCHAR(128) NOT NULL , `album_name` VARCHAR(128) NOT NULL , `genre` VARCHAR(128) NOT NULL , `release_year` VARCHAR(128) NOT NULL , `link` VARCHAR(128) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
                $update_status = "UPDATE `user_information` SET `playlist_status`='1' WHERE `email`='$_SESSION[email]'";
                if (mysqli_query($con, $create_table) && mysqli_query($con, $update_status) && mysqli_query($con, $create_song_table)) {

                    $query = "SELECT * FROM `$_SESSION[email]` WHERE `playlist_name`='$_POST[playlist_name]'";
                    $result = mysqli_query($con, $query);
                    if ($result) {

                        # Playlist Name already exists 
                        if (mysqli_num_rows($result) > 0) {

                            $result_fetch = mysqli_fetch_assoc($result);
                            if ($result_fetch['playlist_name'] == $_POST['playlist_name']) {

                                echo "<script>
                                alert('Playlist Name $result_fetch[playlist_name] Already Exists'); 
                                window.location.href='create_playlist.php'; 
                                </script>";
                            }
                        }
                        # Playlist Name doesn't already exist in the database. Insert the Playlist Name 
                        else {

                            $query = "INSERT INTO `$_SESSION[email]`(`playlist_name`) VALUES ('$_POST[playlist_name]')";
                            if (mysqli_query($con, $query)) {

                                echo "
                                    <script>
                                        alert('Playlist Creation Successful'); 
                                        window.location.href='logged_in/home.php'; 
                                    </script>
                                    ";
                            }
                        }
                    } else {

                        echo "
                            <script>
                                alert('The Server Is Down. Please Try Again'); 
                                window.location.href='index.php'; 
                            </script>
                            ";
                    }
                } else {

                    echo "<script>
                        alert('The Server Is Down. Please Try Again'); 
                        window.location.href='index.php'; 
                    </script>";
                }
            }
            # User has already created a playlist. This is their 2nd/3rd/etc. playlist 
            else {

                $query = "SELECT * FROM `$_SESSION[email]` WHERE `playlist_name`='$_POST[playlist_name]'";
                $result = mysqli_query($con, $query);
                if ($result) {

                    # Playlist Name already exists 
                    if (mysqli_num_rows($result) > 0) {

                        $result_fetch = mysqli_fetch_assoc($result);
                        if ($result_fetch['playlist_name'] == $_POST['playlist_name']) {

                            echo "<script>
                                alert('Playlist Name $result_fetch[playlist_name] Already Exists'); 
                                window.location.href='create_playlist.php'; 
                                </script>";
                        }
                    }
                    # Playlist Name doesn't already exist in the database. Insert the Playlist Name 
                    else {

                        $query = "INSERT INTO `$_SESSION[email]`(`playlist_name`) VALUES ('$_POST[playlist_name]')";
                        if (mysqli_query($con, $query)) {

                            echo "
                                <script>
                                    alert('Playlist Creation Successful'); 
                                    window.location.href='logged_in/home.php'; 
                                </script>
                                ";
                        }
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