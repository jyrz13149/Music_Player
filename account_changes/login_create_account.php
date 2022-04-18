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

# For Login 
if (isset($_POST['login'])) {

    $query = "SELECT * FROM `user_information` WHERE `email` = '$_POST[email]'";
    $result = mysqli_query($con, $query);

    if ($result) {

        # Check if user's email exists in the server 
        if (mysqli_num_rows($result) == 1) {

            $result_fetch = mysqli_fetch_assoc($result);
            # Check if user's email has been verified
            if ($result_fetch['verification_status'] == 1) {

                # If PASSWORDS match
                if (password_verify($_POST['password'], $result_fetch['password'])) {

                    $_SESSION['login_successful'] = true;
                    $_SESSION['email'] = $result_fetch['email'];
                    header("Location: ../index.php");
                }
                # If PASSWORDS do not match 
                else {

                    echo "<script>
                        alert('Password Is Incorrect. Please Check Your Password'); 
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
        }
        # Else if user's email does not exist in the server 
        else {

            echo "<script>
                alert('User Email Entered Does Not Exist'); 
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


# For Create Account 
if (isset($_POST['register'])) {

    $user_exist_query = "SELECT * FROM `user_information` WHERE `email` = '$_POST[email]'";
    $result = mysqli_query($con, $user_exist_query);

    if ($result) {

        # if user_email is already in the database when creating user account 
        if (mysqli_num_rows($result) > 0) {

            $result_fetch = mysqli_fetch_assoc($result);
            # Check if email already exists 
            if ($result_fetch['email'] == $_POST['email']) {

                echo "<script>
                    alert('User Email $result_fetch[email] Already Exists'); 
                    window.location.href='../index.php'; 
                    </script>";
            }
        }
        # if user_email does not already exist in the database, insert the user information 
        else {

            # ENCRYPT THE PASSWORD 
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            # Generate a Random Verification Code (Unique for Each User) 
            $veri_code = bin2hex(random_bytes(16));

            $query = "INSERT INTO `user_information`(`email`, `password`, `mm_name`, `nick_name`, `born_city`,`verification_code`, `verification_status`) VALUES ('$_POST[email]','$password','$_POST[sq_one]','$_POST[sq_two]','$_POST[sq_three]','$veri_code','0')";
            if (mysqli_query($con, $query) && sendEmail($veri_code, $_POST['email'])) {

                echo "<script>
                    alert('Account Creation Successful'); 
                    window.location.href='../index.php'; 
                    </script>";
            } else {

                echo "<script>
                    alert('The Server Is Currently Down. Please Try Again'); 
                    window.location.href='../index.php'; 
                    </script>";
            }
        }
    } else {

        echo "<script>
            alert('Query Cannot Be Run'); 
            window.location.href='../index.php'; 
            </script>";
    }
}
