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

        <div class="popup-container" id="donate-popup">
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









</body>

</html>