<?php

require("../db_connection.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESET PASSWORD</title>
    <style>
        * {
            box-sizing: border-box;
            text-decoration: none;
            font-family: Georgia, "Times New Roman", Times, serif;
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;

            background-color: black;
            color: white;
            padding: 20px 0;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;
            background-color: lightblue;
            width: 700px;
            height: 400px;
            padding-top: 20px;
            padding-bottom: 20px;
            border-radius: 10px;
            position: absolute;
            margin-top: 700px;
        }

        form h1 {
            font-size: 55px;
            text-align: center;
        }

        form input {

            width: 400px;
            height: 70px;
            background-color: transparent;
            border: none;
            border-bottom: 3px solid blue;
            border-radius: 0;
            padding: 5px 0;
            font-weight: 550;
            font-size: 25px;
            outline: none;
        }

        form button {

            width: 180px;
            height: 80px;
            font-size: 25px;
            font-weight: 550;
            font-style: 15px;
            background-color: gold;
            padding: 5px 12px;
            border: none;
            border-radius: 45px;
            outline: none;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <?php

    if (isset($_GET['email']) && isset($_GET['pass_reset_token'])) {

        $email_address = $_GET['email'];

        $query = "SELECT * FROM `user_information` WHERE `email`='$_GET[email]' AND `pass_reset_token`='$_GET[pass_reset_token]'";
        $result = mysqli_query($con, $query);

        if ($result) {

            if (mysqli_num_rows($result) == 1) {

                echo "
                    <form method='POST'>
                        <h1>CREATE NEW PASSWORD</h1>
                        <input type='password' placeholder='New Password' name='password' required />
                        <button type='submit' name='reset_password'>
                            RESET
                        </button>
                        </form>
                    ";
                if (isset($_POST['reset_password'])) {

                    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

                    $update_password = "UPDATE `user_information` SET `password`='$password',`pass_reset_token`=NULL WHERE `email`='$email_address'";


                    if (mysqli_query($con, $update_password)) {

                        echo "
                            <script>
                                alert('The Password Has Been Reset. You Can Now Login With Your New Password'); 
                                window.location.href='../index.php'; 
                            </script>
                            ";
                    } else {

                        echo "
                            <script>
                                alert('The Server Is Currently Down. Please Try Again'); 
                                window.location.href='../index.php'; 
                            </script>
                            ";
                    }
                }
            } else {
                echo "
                    <script>
                        alert('The Link Is Invalid. Please Try Resetting The Password Again'); 
                        window.location.href='../index.php'; 
                    </script>
                    ";
            }
        } else {

            echo "
                <script>
                    alert('The Server Is Currently Down. Please Try Again'); 
                    window.location.href='../index.php'; 
                </script>
                ";
        }
    }

    ?>

</body>

</html>