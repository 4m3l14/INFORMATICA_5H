<!DOCTYPE html>
<html>
<head>
    <title>Benvenuto nella mia prima pagina PHP</title>

<h1>Benvenuto nella mia prima pagina PHP- Amelia Wannaku</h1>
</head>
<body>
<?php

$today = new DateTime("now", new DateTimeZone('Europe/Rome'));
echo $today ->format('h:i:s');
$ora = $today->format('h');
echo "\nSono le $ora";

$nome = "Paolo";

if ($ora>= 8 && $ora < 12) {
    $saluto = "\nBuongiorno";
} elseif ($ora>= 12 && $ora< 20) {
    $saluto = "\nBuonasera";
} else {
    $saluto = "\nBuonanotte";
}

echo "$saluto $nome, benvenuto nella mia prima pagina PHP.<br>";

?>
</body>
</html>
