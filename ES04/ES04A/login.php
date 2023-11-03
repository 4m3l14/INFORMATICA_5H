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
    if ($user == "admin" && $pass == "Ciao123") {
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

