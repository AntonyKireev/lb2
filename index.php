<?php
require_once __DIR__ . "/DB.php";
$db = new DB();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src = "script.js"></script>
    <title>Antony</title>
</head>
<body style="display: flex; flex-direction: row-reverse">

<div class="forms">
    <form action="" method="post">
        <select name="league">
            <?php
            $db->showLeague();
            ?>
        </select>
        <input type="submit" value="Submit"><br>
    </form>
    <br>
    <form action="" method="post">
        <select name="player">
            <?php
            $db->showTeams();
            ?>
        </select>
        <input type="submit" value="Submit"><br>
    </form>
    <br>
    <form action="" method="post" style="margin-right: 200px">
        <select name="team">
            <?php
            $db->showTeams();
            ?>
        </select>
        <input type="submit" value="Submit"><br>
    </form>
</div>

<div class="content" style="display: block; margin-right: 200px; padding: 20px">
    <?php
    if (isset($_POST["league"])) {
        $db->findLeague($_POST["league"]);
    } elseif (isset($_POST["player"])) {
        $db->findPlayers($_POST["player"]);
    } elseif (isset($_POST["team"])) {
        $db->findGames($_POST["team"]);
    }
    ?>
    <hr>
    <div id="saved"></div>
    <button onclick="SaveContent()">Save Content</button>
    <button onclick="ShowContent()">Show Content</button>
</div>
</body>
</html>
