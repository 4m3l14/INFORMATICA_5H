<html>
<head>
    <title>Form</title>
</head>
<body>
    <h1>Login</h1>

    <?php
    $usr=$_POST["username"];
    $pwd=$_POST["password"];
    if($usr!="Amelia" || $pwd!="ciao") {
    ?>
        <h1>Errore! Username o password errati.<br/>
        Accesso negato!</h1>
    <?php
    } else {
        echo "<h1>Benvenuto $usr nella pagina riservata del sito.</h1>";
    }
    ?>
</body>
</html>


*\<html>
<head>
    <title>Form</title>
</head>
<body>
    <h1>Login</h1>

    <?php
    $usr=$_POST["username"];
    $pwd=$_POST["password"];
    if($usr!="Amelia" || $pwd!="ciao") {
        echo "W<h1>Errore! Username o password errati.<br/>Accesso negato!</h1>";
    } else {
        echo "<h1>Benvenuto $usr nella pagina riservata del sito.</h1>";
    }
    ?>
</body>
</html>*\
