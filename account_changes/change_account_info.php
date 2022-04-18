<?php

require('../db_connection.php');
session_start();

use PHPMailer\PHPMailer\Exception;        #PHP Mailer Github 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

function sendEmail($veri_code, $email)
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
        $mail->setFrom('goatifyteam1@gmail.com', 'GOATIFY MUSIC PLAYER');
        $mail->addAddress($email);                                      //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email Verification: GOATIFY';
        $mail->Body    = "Thank You for creating a GOATIFY Music Player account! 
                            Please verify your email address through the link below. 
                            <a href = 'https://brandonspangler.com/goatify/account_changes/email_verification.php?email=$email&veri_code=$veri_code'>Verify Email</a>
                            ";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

# For Email Change 
if (isset($_POST['change_email'])) {

    $user_exist_query = "SELECT * FROM `user_information` WHERE `email` = '$_POST[p_email]'";
    $result = mysqli_query($con, $user_exist_query);

    if ($result) {

        # Check if user's email exists in the server 
        if (mysqli_num_rows($result) == 1) {

            $result_fetch = mysqli_fetch_assoc($result);

            # Generate a Random Verification Code (Unique for Each User) 
            $veri_code = bin2hex(random_bytes(16));

            $query = "UPDATE `user_information` SET `email`='$_POST[email]',`verification_code`='$veri_code',`verification_status`='0' WHERE `email`='$result_fetch[email]'";

            # Update User Email and send an email verification to the user 
            if (mysqli_query($con, $query) && sendEmail($veri_code, $_POST['email'])) {

                $_SESSION['email'] = $_POST['email'];

                echo "<script>
                    alert('Email Change Successful. Please Verify Your Email'); 
                    window.location.href='../index.php'; 
                    </script>";
            } else {

                echo "<script>
                    alert('The Server Is Currently Down. Please Try Again'); 
                    window.location.href='../index.php'; 
                    </script>";
            }
        }
        # if user_email does not already exist in the database, alert the user 
        else {

            echo "<script>
                    alert('The Entered Email Does Not Exist. Please Try Again'); 
                    window.location.href='../index.php'; 
                    </script>";
        }
    } else {

        echo "<script>
            alert('Query Cannot Be Run'); 
            window.location.href='../index.php'; 
            </script>";
    }
}

# p_password password change_password

if (isset($_POST['change_password'])) {

    $query = "SELECT * FROM `user_information` WHERE `email`='$_SESSION[email]'";

    $result = mysqli_query($con, $query);

    if ($result) {

        # Check if user's email exists in the server 
        if (mysqli_num_rows($result) == 1) {

            $result_fetch = mysqli_fetch_assoc($result);
            # Check if user's email has been verified
            if ($result_fetch['verification_status'] == 1) {

                # If PASSWORDS match
                if (password_verify($_POST['p_password'], $result_fetch['password'])) {

                    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                    $update_password = "UPDATE `user_information` SET `password`='$password' WHERE `email`='$_SESSION[email]'";

                    if (mysqli_query($con, $update_password)) {

                        echo "
                            <script>
                                alert('The Password Has Been Changed'); 
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
                # If PASSWORDS do not match 
                else {

                    echo "<script>
                        alert('Entered Password Is Incorrect. Please Check Your Password'); 
                        window.location.href='../index.php'; 
                        </script>";
                }
            }
            # Else if user's email has not been verified
            else {

                echo "<script>
                        alert('User Email Has Not Been Verified Yet. Please Verify Your Email'); 
                        window.location.href='../index.php'; 
                    </script>";
            }
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
                alert('Query Cannot Be Run'); 
                window.location.href='../index.php'; 
            </script>
            ";
    }
}
