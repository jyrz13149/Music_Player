<?php

require('../db_connection.php');
session_start();

$query = "SELECT * FROM `user_information` WHERE `email`= '$_SESSION[email]'";
$result = mysqli_query($con, $query);

if ($result) {

    $result_fetch = mysqli_fetch_assoc($result);

    if ($result_fetch['playlist_status'] == 1) {

        $last_song_link = $result_fetch['last_song_link'];

        if ($last_song_link == null) {

            $song_name = "No Song Played Yet";
            $song_status = 0;
        } else {

            $query = "SELECT * FROM `song_$_SESSION[email]` WHERE `link`='$last_song_link'";
            $result = mysqli_query($con, $query);
            $fetch_result = mysqli_fetch_assoc($result);

            $song_name = $fetch_result['song_name'];
            $song_status = 1;
        }

        $last_playlist_id = $result_fetch['last_playlist'];

        if ($last_playlist_id == null) {

            $last_playlist_name = "No Playlist Played Yet";
            $playlist_status = 0;
        } else {

            $playlist_query = "SELECT * FROM `$_SESSION[email]` WHERE `id`='$last_playlist_id'";
            $playlist_result = mysqli_query($con, $playlist_query);

            if ($playlist_result) {

                $playlist_fetch = mysqli_fetch_assoc($playlist_result);

                $last_playlist_name = $playlist_fetch['playlist_name'];
                $playlist_status = 1;
            } else {
                $last_playlist_name = "No Playlist Played Yet";
                $playlist_status = 0;
            }
        }
    } else {
        echo "
            <script>
                alert('You have not created a playlist yet. Please create a playlist to continue to the home page'); 
                window.location.href='../create_playlist.php'; 
            </script>
            ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player</title>
    <link rel="stylesheet" href="home.css" />
</head>

<body>

    <header>

        <div class='user_logout'>
            <a href='../logout.php'>LOGOUT</a>
        </div>
        <h1>GOATIFY</h1>
        <div class='donate'>
            <button type='button' onclick="popup('donate-popup')">
                DONATE
            </button>
        </div>

        <div class="popup_container" id="donate-popup">
            <div class="donation popup">
                <div>
                    <button type="reset" onclick="popup('donate-popup')">
                        X
                    </button>
                    <div>
                        <div>
                            WE DON'T NEED YOUR MONEY
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function popup(popup_type) {
                get_popup = document.getElementById(popup_type);

                if (get_popup.style.display == "flex") {
                    get_popup.style.display = "none";
                } else {
                    get_popup.style.display = "flex";
                }
            }
        </script>

    </header>

    <!-- Search Bar -->

    <div class="search_bar">
        <form method="POST" action="../search.php">
            <input type="text" placeholder="Search" name="search_input" />
            <button type="submit" class="search-btn" name="search"> <img src="../images/magnifying-glass.png" height="50" width="50" /></button>
        </form>
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
                <form action='../playlist_pages/redirect.php' method='POST'>
                    <?php

                    $query = "SELECT * FROM `$_SESSION[email]`";
                    $result = mysqli_query($con, $query);

                    $playlist_names = array();
                    $i = 0;

                    while ($name = mysqli_fetch_assoc($result)) {
                        array_push($playlist_names, $name['playlist_name']);
                    ?>
                        <tr class="names">
                            <td>
                                <button type='submit' <?php echo "value='$playlist_names[$i]'" ?> name='playlist_button'>
                                    <?php
                                    echo $playlist_names[$i];
                                    ?>
                                </button>
                            </td>
                        </tr>
                    <?php
                        $i++;
                    }
                    ?>
                </form>
            </table>
        </div>
        <div class="playlist_actions">
            <div class="create_playlist">
                <a href='../create_playlist.php'>CREATE PLAYLIST</a>
            </div>
            <div class=" delete_playlist">
                <a href='../delete_playlist.php'>DELETE PLAYLIST</a>
            </div>
        </div>
    </div>

    <!-- Last Playlist -->

    <div class="second_title">
        <h3>
            Last Played Playlist
        </h3>
    </div>
    <div class="last_playlist">
        <table border="1px">
            <tr class="name">
                <td>
                    <div class="last_played_playlist">
                        <?php if ($playlist_status == 0) { ?>
                            <button disabled><?php echo $last_playlist_name; ?></button>
                        <?php } else { ?>
                            <button onclick="<?php $_SESSION['current_playlist'] = $last_playlist_name; ?> location.href = '../playlist_pages/playlist_page.php'"><?php echo $last_playlist_name; ?></button>
                        <?php } ?>
                    </div>
                </td>
            </tr>
            <?php
            ?>
        </table>
    </div>

    <!-- Last Song -->

    <div class="third_title">
        <h3>
            Last Played Song
        </h3>
    </div>
    <div class="last_song">
        <table border="1px">
            <tr class="song_name">
                <td>
                    <div class="music">
                        <?php if ($song_status == 0) { ?>
                            <button disabled><?php echo $song_name; ?></button>
                        <?php } else { ?>
                            <button onclick="<?php $_SESSION['current_song'] = $song_name; ?> location.href = '../song_pages/song_page.php'"><?php echo $song_name; ?></button>
                        <?php } ?>
                    </div>
                    <div>
                        <?php
                        echo '<audio controls>
                            <source src="' . $last_song_link . '" type="audio/mpeg">
                            Unfortunately, the audio element is not supported in your browser.
                        </audio>';
                        ?>
                    </div>

                </td>
            </tr>
            <?php
            ?>
        </table>
    </div>

    <div class="change">
        <!-- Change Email -->
        <div class='change_email'>
            <button type='button' onclick="popup('email-popup')">
                CHANGE EMAIL
            </button>
        </div>

        <!-- Change Password -->
        <div class='change_password'>
            <button type='button' onclick="popup('password-popup')">
                CHANGE PASSWORD
            </button>
        </div>
    </div>

    <div class="popup_container" id="email-popup">
        <div class="email_popup">
            <form style="text-align: center" method="POST" action="../account_changes/change_account_info.php">
                <h2>
                    <span>CHANGE EMAIL</span>
                    <button type="reset" onclick="popup('email-popup')">X</button>
                </h2>
                <input type="email" placeholder="Current Email" name="p_email" required />
                <input type="email" placeholder="New Email" name="email" required />
                <br /><br />
                <button type="submit" class="email-btn" name="change_email">SUBMIT</button>
            </form>
        </div>
    </div>

    <div class="popup_container" id="password-popup">
        <div class="password_popup">
            <form style="text-align: center" method="POST" action="../account_changes/change_account_info.php">
                <h2>
                    <span>CHANGE PASSWORD</span>
                    <button type="reset" onclick="popup('password-popup')">X</button>
                </h2>
                <input type="password" placeholder="Current Password" name="p_password" required />
                <input type="password" placeholder="New Password" name="password" required />
                <br /><br />
                <button type="submit" class="password-btn" name="change_password">SUBMIT</button>
            </form>
        </div>
    </div>

    <script>
        function popup(popup_type) {
            get_popup = document.getElementById(popup_type);

            if (get_popup.style.display == "flex") {
                get_popup.style.display = "none";
            } else {
                get_popup.style.display = "flex";
            }
        }
    </script>
</body>

</html>