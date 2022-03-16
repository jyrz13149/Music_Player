<?php

require('../db_connection.php');
session_start();
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
    <!-- New Playlist -->
    <!-- Delete Playlist -->
    <!-- List of Playlists -->
    <!-- Last Playlist -->
    <!-- Last Song -->

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
            <form style="text-align: center" method="POST" action="../index_actions/change_account_info.php">
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
            <form style="text-align: center" method="POST" action="../index_actions/change_account_info.php">
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