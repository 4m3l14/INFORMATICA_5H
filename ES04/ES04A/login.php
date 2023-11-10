<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
</head>
<body>
    <?php
    session_start();
    echo <<<END
    <form name="formLogin" method="post" action="{$_SERVER["PHP_SELF"]}">
        Username: <input type="text" name="username"> <br>
        Password: <input type="password" name="password"></br>
        <input type="submit" name="invio" value="invio"><br>
        <input type="reset" value="cancella"> </br>
    </form>
END;

    $user = $_POST["username"];
    $pass = $_POST["password"];
    controlloUser($user);
    controlloPass($pass);
    if ($user == "mrossi" && $pass == "Ciao123") {
        $_SESSION["username"] = $user;
        $_SESSION["password"] = $pass;
        header("Location: riservata.php");
        exit;
    } else {
        echo "Errore! Username o password errati.";
        exit;
    }
    ?>
</body>
</html>

<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
$valid_username = 'mrossi';
$valid_password = 'Ciao123';
$err_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['username'] = true;
        header('Location: riservata.php');
        exit();
    } else {
        $err_message = 'Attenzione! Le credenziali inserite non sono corrette.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
</head>
<body>
    <h1>Vai all'area riservata del sito.</h1>
    <form method="POST">
        <label for="username">Nome utente:</label>
        <input type="text" name="username" id="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>
        <input type="submit" value="Accedi">
    </form>
    <?php

    if (!empty($err_message)) {
        echo "<p>$err_message</p>";
    }
    ?>
</body>
</html>
