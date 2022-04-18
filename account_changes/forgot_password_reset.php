<?php

require("../db_connection.php");

use PHPMailer\PHPMailer\Exception;        #PHP Mailer Github 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

function sendResetEmail($reset_token, $email)
{
    require("../PHPMailer/Exception.php");
    require("../PHPMailer/PHPMailer.php");
    require("../PHPMailer/SMTP.php");

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'goatifyteam1@gmail.com';                     //SMTP username
        $mail->Password   = 'cop4331p1';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('goatifyteam1@gmail.com', 'GOTIFY MUSIC PLAYER');
        $mail->addAddress($email);                                      //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'PASSWORD RESET: GOATIFY';
        $mail->Body    = "THANK YOU FOR USING GOTIFY AS YOUR MUSIC PLAYER~
                            Please reset your password through the link below. 
                            <a href = 'https://brandonspangler.com/goatify/account_changes/reset_password.php?email=$email&pass_reset_token=$reset_token'>
                                RESET PASSWORD
                            </a>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}



if (isset($_POST['send-password-reset-link'])) {

    $query = "SELECT * FROM `user_information` WHERE `email`='$_POST[email]' AND `mm_name`='$_POST[sq_one]' AND `nick_name`='$_POST[sq_two]' AND `born_city`='$_POST[sq_three]'";

    $result = mysqli_query($con, $query);

    if ($result) {

        if (mysqli_num_rows($result) == 1) {

            $password_reset_token = bin2hex(random_bytes(16));
            $query = "UPDATE `user_information` SET `pass_reset_token`='$password_reset_token' WHERE `email`='$_POST[email]'";

            $update_result = mysqli_query($con, $query);

            if ($update_result && sendResetEmail($password_reset_token, $_POST['email'])) {

                echo "
                    <script>
                        alert('The Link For Password Reset Has Been Sent To Your Email'); 
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
        } else {

            echo "
                <script>
                    alert('Email And/Or The Security Questions Does Not Match Our Record'); 
                    window.location.href='../index.php'; 
                </script>
                ";
        }
    } else {

        echo "
            <script>
                alert('Query Cannot Be Run'); 
                window.location.href='../index.php'; 
            </script>
            ";
    }
}
