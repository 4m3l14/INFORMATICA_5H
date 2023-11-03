<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php?error=Attenzione! Prima di accedere alla sezione riservata dle sito e' necessario effetuare il login.");
    exit;
}
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
        <font color="red"><p><h2>Non sei autenticato!</h2></p></font><br>
        <a href="index.php">Vai alla home del sito</a><br>
        <a href="login.php">Login</a>
    <?php
    }
    ?>
</body>
</html>
