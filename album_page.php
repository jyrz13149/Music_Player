<?php
  require ('db_connection.php');
  session_start();
  $album_name = $_POST['albumName'];
  $_SESSION['current_album'] = $album_name;

$query = "SELECT * FROM `music_information` WHERE `album_name` = '$album_name'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$artist = $row['artist_name'];
$year = $row['release_year'];
$genre = $row['genre'];
?>


<!DOCTYPE html>
<html style="background-color:black;">
<style>
    .grid-container {
        align-items: center;
        position: absolute;
        width: 400px;
        height: 225px;
        margin: 25px;
        left: 45px;
        right: 45px;
    }
    
    h1 {
        cursor: pointer;
        font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        font-style: normal;
        text-align: center;
        margin: 50px;
        font-size: 40px;
    }
    
    h2 {
        font-size: 45px;
        margin-top: 50px;
        color: white;
        text-align: center;
    }
    
    h3 {
        margin: 0;
        font-size: 40px;
        color: white;
        text-align: center;
    }
    
    h4,
    h5 {
        font-size: 25px;
        color: white;
        text-align: center;
    }
    
    .spacer {
        flex: 1;
    }
    
    .tab {
        display: inline-block;
        margin-left: 600px;
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
    
    .song-cell {
        position: relative;
        left: 0;
        right: 0;
        height: 40px;
        display: flex;
        min-width: 200px;
        text-align: center;
        align-items: center;
        background-color: black;
        color: white;
        margin-left: 115px;
        margin-right: 115px;
        font-size: 25px;
    }
    
    .toolbar #logout-button:hover,
    .toolbar #home-button:hover {
        opacity: 0.8;
    }
    /* Dropdown Button */
    
    .dropbtn {
        background-color: black;
        border: none;
    }
    /* The container <div> - needed to position the dropdown content */
    
    .dropdown {
        position: relative;
        display: inline-block;
    }
    /* Dropdown Content (Hidden by Default) */
    
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }
    /* Links inside the dropdown */
    
    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }
    /* Change color of dropdown links on hover */
    
    .dropdown-content a:hover {
        background-color: #ddd;
    }
    /* Show the dropdown menu on hover */
    
    .dropdown:hover .dropdown-content {
        display: block;
    }
    /* Change the background color of the dropdown button when the dropdown content is shown */
    
    .dropdown:hover .dropbtn {
        background-color: black;
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
    <h2 class="album-title"><?php echo $album_name ?></h2>
    <h3 class="artis-name"><?php echo $artist ?></h3>
    <h4 class="genre"><?php echo $genre ?></h4>
    <h5 class="year"><?php echo $year ?></h5>
    <br>
    <?php
    $sql = "SELECT * FROM `music_information` WHERE `album_name` = '$album_name'";
    $results = mysqli_query($con, $sql);
    while($searchRow = mysqli_fetch_array($results))
    {
        $song_id = $searchRow[0];
        $song = $searchRow[1];
        ?>
        <tr class="brand">
            <div class="song-cell">
        <div>
            <h4 class="song-name"><?php echo $song ?></h4>
        </div>
        <div class="spacer"></div>
        <div class="dropdown">
            <button class="dropbtn" onClick="location.href = ''"><input type="image" id="more-button" src="https://media.discordapp.net/attachments/953341474777469010/953724318410489877/more.png?width=373&height=186" style="margin: 0; border-radius: 10px;" height="20" width="40" /> 
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
            <form method="POST" action="song_pages/song_redirect.php">
                <button type="submit" name="song_info" value="<?php echo $song ?>">Information</button>
            </form>
            <form action="add_to_play.php" method='POST'>
                <button type="submit" value="<?php echo $song_id ?>" name="songToAdd">Add to playlist</button>
            </form>
            </div>
        </div>
    </div>
        </tr>
        <br>
        <?php
    }
    ?>

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

    /** Where we'll fetch all the songs for this album */
</script>

</html>