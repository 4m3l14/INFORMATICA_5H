<html>
    <head>
        <title>LOGOUT</title>
    </head>
    <body>
        <?php
        session_start();
        session_destroy();
        header("Location: index.php");
        exit;
        ?>
    </body>
</html>

