<!DOCTYPE html>
<html>
<head>
    <title>FORM VALIDATION-Amelia</title>
	<style>
	.errore {color: #FF0000;} 
	</style>
</head>
<body>
<?php

$errNome = $errCog = $errEta = $errEmail = $errCell = $errVia = $errNciv = $errCap = $errCom = $errProv = $errNick = $errPass = "";
$nome = $cog = $eta = $email = $cell = $via = $nCiv = $cap = $com = $prov = $nick = $pass = "";

function controllo($info){
    $info = trim($info);
    $info = stripslashes($info);
    $info = htmlspecialchars($info);
    return $info;
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = controllo($_POST["nome"]);
    $cog = controllo($_POST["cognome"]);
    $eta = controllo($_POST["eta"]);
    $email = controllo($_POST["email"]);
    $cell = controllo($_POST["cellulare"]);
    $via = controllo($_POST["via"]);
    $nCiv = controllo($_POST["numCivico"]);
    $cap = controllo($_POST["cap"]);
    $com = controllo($_POST["comune"]);
    $prov = controllo($_POST["provincia"]);
    $nick = controllo($_POST["nickname"]);
    $pass = controllo($_POST["password"]);
	//campo nome
	if(empty($_POST["nome"])){
		$errNome="Inserisci il nome!";                                                                                              
	}
	else{
		$nome=controllo($_POST["nome"]);
		if(!preg_match("/^[a-zA-Z ]*$/",$nome)){
			$errNome="Solo caratteri alfabetici consentiti!";
		}
	}
	//campo cognome
	if(empty($_POST["cognome"])){
		$errCog="Inserisci il cognome!";
	}
	else{
	    $cog=controllo($_POST["cognome"]);
		if(!preg_match("/^[a-zA-Z-' ]*$/",$cog)){
			$errCog="Solo caratteri alfabetici consentiti!";
		}
	}
	//campo data di nascita
	if(empty($_POST["eta"])){
		$errEta="Inserisci la data di nascita!";
	}
	else{
		$eta=controllo($_POST["eta"]);
		if(!preg_match("~^([0-9]{2})/([0-9]{2})/([0-9]{4})$~", $eta,$part)){
			$errEta="Data di nascita non valida!";
		}
		elseif(!checkdate($part[1],$part[2],$part[3])){
			$errEta="Data di nascita non valida! I mesi devono essere tra 1 e 12 e i giorni validi per quel mese";
		}
	}
	//campo e-mail
	if(empty($_POST["email"])){
		$errEmail="Inserisci l'indirizzo e-mail!";
	}
	else{
		$email=controllo($_POST["email"]);
		if(!filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			$errEmail="E-mail non valida!";
		}
	}
	//campo cellulare
	if(empty($_POST["cellulare"]))
	{
		$cell="";
	}
	else{
		$cell=controllo($_POST["cellulare"]);
		if(!preg_match("/^39-[0-9]{10}$/",$cell)){
			$errCell="Numero di cellulare non valido! Deve avere 10 numeri";
		}
	}
	//campo via
	if(empty($_POST["via"])){
		$errVia="Inserisci la via/piazza!";
	}
	else{
		$via=controllo($_POST["via"]);
		if(!preg_match("/^([a-zA-Z- '])*$/",$via)){
			$errVia="Indirizzo non valido!";
		}
	}
	//campo numero civico
	if(empty($_POST["numCivico"])){
		$errNciv="Inserisci il numero civico!";
	}
	else
	{
		$nCiv=controllo($_POST["numCivico"]);
		if(!preg_match("/^[0-9]{2}$/",$nCiv)){
			$errNciv="Numero civico non valido!";
		}
	}
	//campo CAP
	if(empty($_POST["cap"])){
		$errCap="Inserisci il CAP!";
	}
	else
	{
		$cap=controllo($_POST["cap"]);
		if(!preg_match("/^[0-9]{5}$/",$cap)){
			$errCap="CAP non valido!";
		}
    }
	//campo comune
	if(empty($_POST["comune"])){
		$errCom="Inserisci il comune!";
	}
	else{
		$com=controllo($_POST["comune"]);
		if(!preg_match("/^([a-zA-Z- '])*$/",$com)){
			$errCom="Comune non valido!";
		}
	}
	//campo provincia
	if(empty($_POST["provincia"])){
		$errProv="Inserisci la provincia!";
	}
	else{
		$prov=controllo($_POST["provincia"]);
		if(!preg_match("/^([a-zA-Z- '])*$/",$prov)){
			$errProv="Provincia non valido!";
		}
	}
	//campo nickname
	if(empty($_POST["nickname"])){
		$errNick="Inserisci il nickname!";
	}
	else{
	    $nick=controllo($_POST["nickname"]);
		if($_POST["nickname"]==$_POST["nome"]||$_POST["nickname"]==$_POST["cognome"]){
			$errNick="Il nickname deve essere diverso da nome e cognome!";
		}
	}
	//campo password
	if(empty($_POST["password"])){
		$errPass="Inserisci la password!";
	}
	else{
		$pass=controllo($_POST["password"]);
		$maiuscola = preg_match("@[A-Z]@",$pass);
        $numero = preg_match("@[0-9]@",$pass);
        $charspec = preg_match("@[^\w]@",$pass);
		if(strlen($pass)<8|| !$maiuscola || !$numero || !$charspec){
			$errPass="La password deve avere almeno una maiuscola, un numero, un carattere speciale e deve essere lunga almeno 8 caratteri!";
		}
	}	
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	echo "Nome: " . htmlspecialchars($nome) . "<br>";
	echo "Cognome: " . htmlspecialchars($cog) . "<br>";
	echo "Data di Nascita: " . htmlspecialchars($eta) . "<br>";
	echo "Email: " . htmlspecialchars($email) . "<br>";
	echo "Cellulare: " . htmlspecialchars($cell) . "<br>";
	echo "Via: " . htmlspecialchars($via) . "<br>";
	echo "Numero Civico: " . htmlspecialchars($nCiv) . "<br>";
	echo "CAP: " . htmlspecialchars($cap) . "<br>";
	echo "Comune: " . htmlspecialchars($com) . "<br>";
	echo "Provincia: " . htmlspecialchars($prov) . "<br>";
	echo "Nickname: " . htmlspecialchars($nick) . "<br>";
	echo "Password: " . htmlspecialchars($pass) . "<br>";
}
}
?>
<font color=#FF0000>
<h1>BENVENUTI NEL FORM</h1>
</font>
<h4>Inserire i dati richiesti:</h4>
<p><span class="errore">* campo obbligatorio</span></p>

<form method="post" action="">
	Nome: <input type="text" placeholder="nome" required><br>
    Cognome: <input type="text" placeholder="cognome" required><br>
    Data di nascita: <input type="date" required><br>
    Email: <input type="email" required><br>
    Cellulare: <input type="cell" pattern="\+39[0-9]{10}"><br>
    Via: <input type="text" required><br>
	Numero civico: <input type="numCivico" pattern="[0-9]{10}"><br>
    CAP: <input type="text" pattern="[0-9]{5}"><br>
	Comune: <input type="text" required><br>
	Provincia: <input type="text" required><br>
    Nickname: <input typr="text" required><br>
    Password: <input type="password" pattern="[a-zA-Z0-9]{8,}" required><br>
    <input type="submit" value="registrati">
	</form>
</body>
</html>
