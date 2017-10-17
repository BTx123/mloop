<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="assets/img/favicon.ico" type="image/png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous" type="text/css">
    <link rel="stylesheet" href="assets/css/main.css" type="text/css">
    <title>REPL▶Y!</title>
</head>
<body>
    <div id="title"><img alt="Repl▶y!: Music On Loop" src="assets/img/logo.png"></div>
    <div id="main">
        <div id="player">
            <audio autoplay="" controls="" id="song" src="retrieveMusic.php"></audio>
        </div>
        <div id="options">
            <h1>Options</h1>
            <table>
                <tbody>
                    <tr>
                        <td>Number of times to play song:</td>
                        <td><input id="loopCount" placeholder="count"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Gap time in between playbacks:</td>
                        <td><input id="breakTime" placeholder="seconds"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Snippet of the song (Optional):</td>
                        <td><input id="startMin" placeholder="min" type="text">&#58;<input id="startSec" placeholder="start sec" type="text"></td>
                        <td>~ <input id="endMin" placeholder="min" type="text">&#58;<input id="endSec" placeholder="sec" type="text"></td>
                    </tr>
                </tbody>
            </table><button class="buttonTransition" onclick="updateOptions();" type="button">Apply</button>
        </div>
    </div>
    <div id="sidebar">
        <div id="songlist">
            <h1>List of Songs</h1>
            <form action="changeSongRank.php" enctype="multipart/form-data" method="post">
                <select id="songsList" name="songsList">
                    <?php
                    $servername = "localhost";
                    $username   = "dan";
                    $password   = "hello";
                    $dbname     = "mlooper";
                    $conn       = new mysqli($servername, $username, $password, $dbname) or die("Connection failed: " . $conn->connect_error);
                    $sql_query  = mysqli_query($conn, "SELECT name FROM music ORDER BY listOrder DESC");
                    while ($row = $sql_query->fetch_assoc()) {
                        echo "<option>" . $row['name'] . "</option>";
                    }
                    ?>
                </select>
                <input class="buttonTransition" name="submitList" type="submit" value="Play">
            </form>
        </div>
        <div id="upload">
            <h1>Upload</h1>
            <form action="upload.php" enctype="multipart/form-data" method="post">
                <input accept=".mp3,.wav,.m4a,.aac" id="fileToUpload" name="fileToUpload" type="file">
                <input id="filename" name="displayName" placeholder="File Name" type="text">
                <input class="buttonTransition" name="submitUpload" type="submit" value="Submit">
            </form>
        </div>
    </div>
    <!-- <div>
        <a href="https://github.com/BTx123/mloop"><img alt="GitHub" src="assets/img/octocat.png"></a>
    </div> -->

    <!-- <script src="assets/js/jquery.js" type="text/javascript"></script> -->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous" type="text/javascript"></script>

    <!-- main javascript for site -->
    <script src="assets/js/main.min.js" type="text/javascript"></script>

</body>
</html>
