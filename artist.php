<?php
  require ('db_connection.php');
  session_start();
?>

<!DOCTYPE html>
<html lang="en"  style="background-color:black;">

<style>
    .grid-container {
        background-color: black;
        position: relative;
        width: 90;
        margin-left: 25px;
        margin-right: 25px;
        align-items: center;
    }
    
    .album-title {
        text-align: center;
    }
    
    .card {
        background-color: black;
        position: relative;
        align-items: center;
        height: 175px;
        width: 100;
        margin: 50px;
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
        margin: 50px;
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
    <input id="logout-button" type="image" alt="Logout Button" src="https://media.discordapp.net/attachments/953341474777469010/953347203185926234/power-off.png?width=461&height=461" width="40" />
    <div class="spacer"></div>
    <div>
        <h1> Goatify </h1>
    </div>
    <div class="spacer"></div>
    <input id="home-button" type="image" alt="Home Button" src="https://media.discordapp.net/attachments/953341474777469010/953347159015714878/home.png?width=461&height=461" width="40" />
</div>

<div>
    <h2>Artist Name</h2>
    <br>
    <div class="grid-container">
        <div class="card-list">
            <div>
                <div class="card">
                    <button id="album-title">
                        <h3>Album 1</h3>
                    </button>
                    <h4>2022</h4>
                </div>
            </div>
            <div>
                <div class="card">
                    <button id="album-title">
                        <h3>Album 2</h3>
                    </button>
                    <h4>2022</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
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