<?php
  require ('db_connection.php');
  session_start();

  $artist_name = $_POST['artistName'];
  $_SESSION['current_artist'] = $artist_name;

  $query = "SELECT album_name FROM `music_information` WHERE `artist_name` = '$artistName'";

?>

<!DOCTYPE html>
<html lang="en"  style="background-color:black;">

<style>
    .grid-container {
        background-color: black;
        width: 100%;
        align-items: center;
    }
    
    .album-title {
        text-align: center;
    }
    
    .card {
        background-color: black;
        align-items: center;
        height: 175px;
        width: 100%;
        margin-bottom: 50px;
    }
    
    button {
        cursor: pointer;
        border: none;
        background-color: #3FC2CA;
        width: 100%;
        height: 100%;
        border-radius: 10px;
    }
    
    h2,
    h5,
    h6 {
        color: white;
        text-align: center;
        margin: 50px;
    }
    
    h1 {
        cursor: pointer;
        font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        font-style: normal;
        text-align: center;
        font-size: 40px;
    }
    
    h2 {
        font-size: 45px;
    }
    
    h3 {
        color: black;
        text-align: center;
        margin: 50px;
        font-size: 30px;
    }
    
    h4 {
        color: white;
        text-align: center;
    }
    
    .spacer {
        flex: 1;
    }
    
    .toolbar {
        position: relative;
        top: 0;
        left: 0;
        right: 0;
        height: 60px;
        display: flex;
        align-items: center;
        text-align: center;
        background-color: black;
        color: white;
    }
    
    .toolbar #logout-button:hover,
    .toolbar #home-button:hover {
        opacity: 0.8;
    }
</style>
<!-- Toolbar -->
<div class="toolbar">
    <input id="logout-button" type="image" src="images/logout.png" onclick="logout()" width="40" />
    <div class="spacer"></div>
    <div>
        <h1> Goatify </h1>
    </div>
    <div class="spacer"></div>
    <input id="home-button" type="image" src="images/home.png" onclick="home()" width="40" />
</div>

<div>
    <h2><?php echo $artist_name ?></h2>
    <br>
    <div class="grid-container">
        <div class="card-list">
        <?php
            $sql = "SELECT album_name,release_year FROM `music_information` WHERE `artist_name` = '$artist_name' AND NOT 'album_name' = '' GROUP BY album_name";
            $results = mysqli_query($con, $sql);
            while($searchRow = mysqli_fetch_array($results))
            {
                $album_name = $searchRow[0];
                $release_year = $searchRow[1];
                if (strcmp($album_name, '') == 0) continue;
                ?>
                <div>
                    <div class="card">
                    <form method="POST" action="album_page.php">
                        <button type="submit" value="<?php echo $album_name ?>" name="albumName" id="album-title">
                            <h3><?php echo $album_name ?></h3>
                        </button>
                    </form>
                        <h4><?php echo $release_year ?></h4>
                    </div>
                </div>
                <?php
            }
        ?>
        </div>
    </div>
</div>

<script>
    function logout()
    {
        window.location.href="logout.php"
    }
    function home()
    {
        window.location.href="./logged_in/home.php"
    }
    /** Based on the screen size, switch from standard to one column per row */
    cards = this.breakpointObserver.observe(Breakpoints.Handset).pipe(
        map(({
            matches
        }) => {
            if (matches) {
                return [{
                    title: 'Album 1',
                    cols: 2,
                    rows: 1,
                    year: 2022
                }, {
                    title: 'Album 2',
                    cols: 2,
                    rows: 1,
                    year: 2022
                }, {
                    title: 'Album 3',
                    cols: 2,
                    rows: 1,
                    year: 2022
                }, {
                    title: 'Album 4',
                    cols: 2,
                    rows: 1,
                    year: 2022
                }];
            }

            return [{
                title: 'Album 1',
                cols: 1,
                rows: 1,
                year: 2022
            }, {
                title: 'Album 2',
                cols: 1,
                rows: 1,
                year: 2022
            }, {
                title: 'Album 3',
                cols: 1,
                rows: 1,
                year: 2022
            }, {
                title: 'Album 4',
                cols: 1,
                rows: 1,
                year: 2022
            }];
        })
    );
</script>

</html>