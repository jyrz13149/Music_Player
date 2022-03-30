<?php

require('../db_connection.php');
session_start();

$query = "SELECT * FROM `user_information` WHERE `email`= '$_SESSION[email]'";
$result = mysqli_query($con, $query);

if ($result) {

    $result_fetch = mysqli_fetch_assoc($result);

    if ($result_fetch['playlist_status'] == 1) {
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
                                <button type='submit' <?php echo "value='$playlist_names[$i]'"?> name='playlist_button'>
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
            <?php

            $query = "SELECT * FROM `$_SESSION[email]`";
            $result = mysqli_query($con, $query);
            $name = mysqli_fetch_assoc($result);
            ?>
            <tr class="name">
                <td>
                    <?php
                    echo $name['playlist_name'];
                    ?>
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
            <?php

            $query = "SELECT * FROM `song_$_SESSION[email]` WHERE `playlist_id`='1' AND `song_name`='Blueming'";
            $result = mysqli_query($con, $query);
            $name = mysqli_fetch_assoc($result);
            ?>
            <tr class="song_name">
                <td>
                    <?php

                    $music_file = $name['link'];

                    echo '<audio controls>
                            <source src="' . $music_file . '" type="audio/mpeg">
                            Unfortunately, the audio element is not supported in your browser.
                        </audio>';
                    ?>
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