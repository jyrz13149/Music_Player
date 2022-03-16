<?php

require('db_connection.php');
session_start();

# If Login is successful, direct the user to the home page 
if (isset($_SESSION['login_successful']) && $_SESSION['login_successful'] == true) {

    echo "
        <script>
            alert('WELCOME TO GOTIFY MUSIC PLAYER!'); 
            window.location.href='logged_in/home.php'; 
        </script>
        ";
} 
?>

<!DOCTYPE html>
<html lang="en"> 

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Music Player</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <header>
        <h1>GOATIFY</h1>
    </header>

    <div class="create-account">
        <button type="button" onclick="popup('create-account-popup')">
            CREATE ACCOUNT
        </button>
    </div>

    <div class="login">
        <button type="button" onclick="popup('login-popup')">
            LOGIN
        </button>
    </div>

    <div class="popup-container" id="login-popup">
        <div class="login_popup">
            <form style="text-align: center" method="POST" action="account_changes/login_create_account.php">
                <h2>
                    <span>USER LOGIN</span>
                    <button type="reset" onclick="popup('login-popup')">X</button>
                </h2>
                <input type="email" placeholder="Email" name="email" required />
                <input type="password" placeholder="Password" name="password" required />
                <br /><br />
                <button type="submit" class="login-btn" name="login">LOGIN</button>
            </form>
            <div class="password-forgot-btn">
                <button type="button" onclick="forgotPassPopup()">
                    Forgot Password
                </button>
            </div>
        </div>
    </div>

    <div class="popup-container" id="forgot-popup">
        <div class="forgot popup">
            <form style="text-align: center" method="POST" action="account_changes/forgot_password_reset.php">
                <h2>
                    <span>PASSWORD RESET</span>
                    <button type="reset" onclick="popup('forgot-popup')">X</button>
                </h2>
                <input type="email" placeholder="Email" name="email" required />
                <input type="text" placeholder="What is your Mother's Maiden name?" name="sq_one" required />
                <input type="text" placeholder="What is your childhood nickname?" name="sq_two" required />
                <input type="text" placeholder="What city were you born in?" name="sq_three" required />
                <br /><br />
                <button type="submit" class="preset-btn" name="send-password-reset-link">CONFIRM</button>
            </form>
        </div>
    </div>

    <div class="popup-container" id="create-account-popup">
        <div class="register popup">
            <form style="text-align: center" method="POST" action="account_changes/login_create_account.php">
                <h2>
                    <span>CREATE GOATIFY ACCOUNT</span>
                    <button type="reset" onclick="popup('create-account-popup')">
                        X
                    </button>
                </h2>
                <input type="email" placeholder="Email" name="email" required />
                <input type="password" placeholder="Password" name="password" required />
                <input type="text" placeholder="What is your Mother's Maiden name?" name="sq_one" required />
                <input type="text" placeholder="What is your childhood nickname?" name="sq_two" required />
                <input type="text" placeholder="What city were you born in?" name="sq_three" required />
                <br /><br />
                <button type="submit" class="register-btn" name="register">
                    CREATE ACCOUNT
                </button>
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

        function forgotPassPopup() {

            document.getElementById('login-popup').style.display = "none";
            document.getElementById('forgot-popup').style.display = "flex";

        }
    </script>
</body>

</html>