<?php
  require ('db_connection.php');
  session_start();
?>

<!DOCTYPE html>
<html  id="wholePage">
    <center>
    <header>
        <link rel="stylesheet" href="add_to_play.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100&family=Roboto+Condensed:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">
    
        <!-- The logout button and home button, give it functionality later -->
        <input type="image" src="images/power-off.png" id="logOutButton" onclick="logout()">
        <input type="image" src="images/home.png" id="homeButton" onclick="home()">
    </header>

    <body>

        <div id="header">
            <label class="brand">Goatify</label>
        </div>

                <table id="titles">
                    <thead>
                        <tr class="brand">
                            <td id="text" class="brand"><Label>Which Playlist/s would you like to add to</Label></td>
                        </tr>
                        <tr class="brand">
                            <td id="list" class="brand">List of Playlist</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(isset($_SESSION['email']))
                            {
                                    $email = $_SESSION['email'];

                                // goes to the data base with our quere and retreives the desired info

                                $sql = "SELECT playlist_name from `$email`";
                                $results = mysqli_query($con, $sql);

                                while($row = mysqli_fetch_array($results))
                                {
                                    $playlistName = $row[0];
                                    ?>

                                    <tr class="brand">
                                        <td>
                                            <button id="playlistBtn"><?php echo $playlistName ?></button>
                                        </td>
                                    </tr>
                                    <br>
                                    <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
        

        <!-- java script to redirect to home page and logout page -->
        <script>
        function logout()
        {
            window.location.href="logout.php"
        }
        function home()
        {
            window.location.href="./logged_in/home.php"
        }
        </script>
    </body>
    </center>
</html>