<?php

require("../db_connection.php");

if (isset($_GET['veri_code']) && isset($_GET['email'])) {

    $query = "SELECT * FROM `user_information` WHERE `email`='$_GET[email]' AND `verification_code`='$_GET[veri_code]'";
    $result = mysqli_query($con, $query);

    if ($result) {

        if (mysqli_num_rows($result) == 1) {

            $fetch_result = mysqli_fetch_assoc($result);

            if ($fetch_result['verification_status'] == 0) {

                $update_VS = "UPDATE `user_information` SET `verification_status`='1' WHERE `email`='$fetch_result[email]'";

                if (mysqli_query($con, $update_VS)) {

                    echo "
                        <script>
                            alert('Your Email has been Successfully Verified!~~'); 
                            window.location.href='../index.php'; 
                        </script>
                        ";
                } else {

                    echo "
                        <script>
                            alert('Something Went Wrong!'); 
                            window.location.href='../index.php'; 
                        </script>
                        ";
                }
            } else {

                echo "
                    <script>
                        alert('Email Has Already Been Verified'); 
                        window.location.href='../index.php'; 
                    </script>
                    ";
            }
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
