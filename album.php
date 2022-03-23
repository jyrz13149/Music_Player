<?php
  require ('db_connection.php');
  session_start();
?>

<!DOCTYPE html>
<html lang="en"  style="background-color:black;">
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
        text-align: center;
        align-items: center;
        background-color: black;
        color: white;
        margin-left: 100px;
        margin-right: 100px;
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
    <input id="logout-button" type="image" alt="Logout Button" src="https://media.discordapp.net/attachments/953341474777469010/953347203185926234/power-off.png?width=461&height=461" width="40" />
    <div class="spacer"></div>
    <div>
        <h1> Goatify </h1>
    </div>
    <div class="spacer"></div>
    <input id="home-button" type="image" alt="Home Button" src="https://media.discordapp.net/attachments/953341474777469010/953347159015714878/home.png?width=461&height=461" width="40" />
</div>

<div>
    <h2 class="album-title">Album Name</h2>
    <h3 class="artis-name">Artist Name</h3>
    <h4 class="genre">Genre</h4>
    <h5 class="year">Year</h5>
    <br>
    <div class="song-cell">
        <div>
            <h4 class="song-name">Song Name</h4>
        </div>
        <div class="spacer"></div>
        <div class="dropdown">
            <button class="dropbtn"><input type="image" id="more-button" src="https://media.discordapp.net/attachments/953341474777469010/953724318410489877/more.png?width=373&height=186" style="margin: 0; border-radius: 10px;" height="20" width="40" /> 
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="#">Information</a>
                <a href="#">Add to playlist</a>
            </div>
        </div>
    </div>
    <div class="song-cell">
        <div>
            <h4 class="song-name">Song Name</h4>
        </div>
        <div class="spacer"></div>
        <div class="dropdown">
            <button class="dropbtn"><input type="image" id="more-button" src="https://media.discordapp.net/attachments/953341474777469010/953724318410489877/more.png?width=373&height=186" style="margin: 0; border-radius: 10px;" height="20" width="40" /> 
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="#">Information</a>
                <a href="#">Add to playlist</a>
            </div>
        </div>
    </div>

</div>

<script>
    /** Where we'll fetch all the songs for this album */
</script>

</html>