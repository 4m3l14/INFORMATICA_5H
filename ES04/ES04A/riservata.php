<?php
session_start();
?>

<html>
    <head>
        <title>Riservata</title>
    </head>
    <body>
        <?php
        if (isset($_SESSION["username"])) {
        ?>
            <p><h1>Benvenuto <?php echo $_SESSION["username"]; ?></h1></p>
            <a href="index.php">Vai alla home del sito</a><br>
            <a href="logout.php">Logout</a>
        <?php   
        } else {
        ?>
            <p><h2>Non sei autenticato!</h2></p><br>
            <a href="index.php">Vai alla home del sito</a><br>
            <a href="login.php">Login</a>
        <?php
        }
        ?>
    </body>
</html>

