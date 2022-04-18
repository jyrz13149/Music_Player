<!-- styling for php document -->
<style>
    .resultsPhp {
        font-size: 30px;
        display: flex;
    }

    .brand2 {
        font-size: 20px;
    }
</style>

<?php
require('db_connection.php');
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="search.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100&family=Roboto+Condensed:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">
    <script>
        var startYear = 2010;
        var date = new Date();
        var currentYear = date.getFullYear();
    </script>
</head>

<body>
    <header class="content_wrap">
        <div>
            <!-- The logout button -->
            <button class="header_btns" onClick="logout()">
                <img src="images/logout.png">
            </button>

            <div class="main_header">
                <h1>Goatify</h1>
            </div>

            <!-- The home button -->
            <button class="header_btns" onClick="home()">
                <img src="images/home.png">
            </button>
        </div>

    </header>

    <!-- Get the users search info -->
    <!-- change get to post -->
    <section class="search_wrap">
        <form action="search.php" method="post" id="search">
            <div class="options_section">
                <div class="options">
                    <label for="genre" class="filterText">Genre:</label>
                    <br>
                    <select name="genre" id="genre">
                        <option value="None" selected>None</option>
                        <option value="Pop">Pop</option>
                        <option value="Hip-Hop">Hip-Hop</option>
                        <option value="Country">Country</option>
                        <option value="K-Pop">K-Pop</option>
                        <option value="R&B">R&B</option>
                        <option value="Rock">Rock</option>
                        <option value="Electronic">Electronic</option>
                        <option value="Instrumental">Instrumental</option>
                        <option value="Classical">Classical</option>
                        <option value="New York">New York</option>
                        <option value="Waltz">Waltz</option>
                        <option value="Vocal">Vocal</option>
                        <option value="Parallel Anthology">Parallel Anthology</option>
                        <option value="EDM">EDM</option>
                    </select>
                </div>

                <div class="options">
                    <label for="year" class="filterText">Year:</label>
                    <br>
                    <select name="year" id="year">
                        <option value="None" selected>None</option>

                        <script>
                            var select = document.getElementById('year');
                            for (var i = startYear; i <= currentYear; i++) {
                                select.options[select.options.length] = new Option(i, i);
                            }
                        </script>

                        <!-- <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option> -->
                    </select>
                </div>
            </div>

            <!-- search and submit button -->
            <input type="text" class="inputSect" placeholder="Search" name="search">
            <input type="image" src="images/magnifying-glass.png" id="searchButton" name="search">
        </form>
    </section>


    <?php
    if (isset($_REQUEST['search_input'])) {
        $search = $_REQUEST['search_input'];
        if (strlen(trim($search)) <= 0) {
            echo "<p class=\"resultsPHP\">";
            echo "Enter Info";
            echo "</p>";
        } else {

            $sql = "SELECT * from music_information
                    WHERE song_name LIKE '" . $search . "%' 
                    OR  artist_name LIKE '" . $search . "%' 
                    OR  album_name LIKE '" . $search . "%' 
                    OR  genre LIKE '" . $search . "%' 
                    OR  release_year LIKE '" . $search . "%'";

            // goes to the data base with our quere and retreives the desired info
            $results = mysqli_query($con, $sql);
            // checks if the return if was greater then 0
            if (mysqli_num_rows($results) > 0) {
    ?>
                <section class="results_wrap" id="sections">
                    <table id="titles">
                        <thead>
                            <tr class="brand">
                                <td class="song">Name</td>
                                <td class="artist">Artist</td>
                                <td class="album">Album</td>
                                <td class="genre">Genre</td>
                                <td class="year">Year</td>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            // makes row array hold each field of the info stored in the data base
                            while ($searchRow = mysqli_fetch_array($results)) {
                                $song = $searchRow[1];
                                $artist = $searchRow[2];
                                $album = $searchRow[3];
                                $genre = $searchRow[4];
                                $year = $searchRow[5];
                            ?>
                                <tr class="brand">
                                    <td class="song"><?php echo $song ?></td>
                                    <td class="artist"><?php echo $artist ?></td>
                                    <td class="album"><?php echo $album ?></td>
                                    <td class="genre"><?php echo $genre ?></td>
                                    <td class="year"><?php echo $year ?></td>
                                    <td class="links">
                                        <div class="dropdown" id=options>
                                            <button class="dropbtn">...</button>
                                            <div class="dropdown-content">
                                                <form method="POST" action="song_pages/song_redirect.php">
                                                    <button type="submit" name="song_info" value="<?php echo $song ?>" class="songdropDown">Information</button>
                                                    <!-- <a href="./song_pages/redirect_song.php" class="brand2">Information</a> -->
                                                </form>
                                                <form method="POST" action="add_to_play.php">
                                                    <input type="hidden" name="songToAdd" value="<?php echo $searchRow[0]; ?>" />
                                                    <input type="submit" name="submit" value="Add To Playlist" class="songdropDown" />
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <br>
                            <?php
                            }
                        }
                        // if the user types some letters that arent in the database
                        else {
                            ?>
                            <tr>
                                <td>No Results</td>
                            </tr>
                <?php
                        }
                    }
                }
                ?>
                <?php

                //include('C:\xampp\htdocs\Music_Player\logged_in\home.php');
                if (isset($_POST['search']) and isset($_POST['genre']) and isset($_POST['year'])) {
                    $search = $_POST["search"];
                    $genreSelect = $_POST['genre'];
                    $yearSelect = $_POST['year'];
                    // export info based on these results maybe do some if statements, its going to get really long
                    // actually


                    if (strlen(trim($search)) <= 0) {
                        echo "<p class=\"resultsPHP\">";
                        echo "Enter Info";
                        echo "</p>";
                    } else {
                        // querue to select stuff inputted by the search
                        // putting % right after the " next to search will bring up everything starting with that letter
                        // make sure to also use LIKE

                ?>

                        <?php

                        // if both are none
                        if ($genreSelect == "None" and $yearSelect == "None") {
                            $sql = "SELECT * from music_information
                            WHERE song_name LIKE '" . $search . "%' 
                            OR  artist_name LIKE '" . $search . "%' 
                            OR  album_name LIKE '" . $search . "%' 
                            OR  genre LIKE '" . $search . "%' 
                            OR  release_year LIKE '" . $search . "%'";
                        }
                        // if genre selected and year not
                        else if ($yearSelect == "None") {
                            $sql = "SELECT * from music_information
                            WHERE genre = '" . $genreSelect . "'
                            AND (song_name LIKE '" . $search . "%' 
                            OR  artist_name LIKE '" . $search . "%' 
                            OR  album_name LIKE '" . $search . "%' 
                            OR  release_year LIKE '" . $search . "%')";
                        }
                        // if genre not and year selected
                        else if ($genreSelect == "None") {
                            $sql = "SELECT * from music_information
                            WHERE release_year = '" . $yearSelect . "'
                            AND (song_name LIKE '" . $search . "%' 
                            OR  artist_name LIKE '" . $search . "%' 
                            OR  album_name LIKE '" . $search . "%' 
                            OR  genre LIKE '" . $search . "%')";
                        }
                        // if genre selected and year selected
                        else {
                            $sql = "SELECT * from music_information
                            WHERE release_year = '" . $yearSelect . "'
                            AND genre = '" . $genreSelect . "'
                            AND (song_name LIKE '" . $search . "%' 
                            OR  artist_name LIKE '" . $search . "%' 
                            OR  album_name LIKE '" . $search . "%' 
                            OR  genre LIKE '" . $search . "%')";
                        }

                        // goes to the data base with our quere and retreives the desired info
                        $results = mysqli_query($con, $sql);
                        // checks if the return if was greater then 0
                        if (mysqli_num_rows($results) > 0) {
                        ?>
                            <section class="results_wrap" id="sections">
                                <table id="titles">
                                    <thead>
                                        <tr class="brand">
                                            <td class="song">Name</td>
                                            <td class="artist">Artist</td>
                                            <td class="album">Album</td>
                                            <td class="genre">Genre</td>
                                            <td class="year">Year</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // makes row array hold each field of the info stored in the data base
                                        while ($searchRow = mysqli_fetch_array($results)) {
                                            $song = $searchRow[1];
                                            $artist = $searchRow[2];
                                            $album = $searchRow[3];
                                            $genre = $searchRow[4];
                                            $year = $searchRow[5];

                                        ?>
                                            <tr class="brand">
                                                <td class="song"><?php echo $song ?></td>
                                                <td class="artist"><?php echo $artist ?></td>
                                                <td class="album"><?php echo $album ?></td>
                                                <td class="genre"><?php echo $genre ?></td>
                                                <td class="year"><?php echo $year ?></td>
                                                <td class="links">
                                                    <div class="dropdown" id=options>
                                                        <button class="dropbtn">...</button>
                                                        <div class="dropdown-content">
                                                            <form method="POST" action="song_pages/song_redirect.php">
                                                                <button type="submit" name="song_info" value="<?php echo $song ?>" class="songdropDown">Information</button>
                                                                <!-- <a href="./song_pages/redirect_song.php" class="brand2">Information</a> -->
                                                            </form>

                                                            <form method="POST" action="add_to_play.php">
                                                                <input type="hidden" name="songToAdd" value="<?php echo $searchRow[0]; ?>" />
                                                                <input type="submit" name="submit" value="Add To Playlist" class="songdropDown" />
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <br>
                                        <?php
                                        }
                                    }
                                    // if the user types some letters that arent in the database
                                    else {
                                        ?>
                                        <tr>
                                            <td>No Results</td>
                                        </tr>
                            <?php
                                    }
                                }
                            }
                            ?>

                                    </tbody>
                                </table>
                            </section>

                            <!-- java script to redirect to home page and logout page -->
                            <script>
                                function logout() {
                                    window.location.href = "logout.php"
                                }

                                function home() {
                                    window.location.href = "./logged_in/home.php"
                                }
                            </script>
</body>

</html>