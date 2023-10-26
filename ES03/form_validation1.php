<!DOCTYPE html>
<html>
<head>
    <meta cahrset="UTF-8">
    <meta name="viewport" content="width=device-width, initianl-scale=1.0">
    <title>Form Validation</title>
</head>
<body>
    <form method="POST" action="">
        Nome: <input type="text" placeholder="nome" required><br>
        Cognome: <input type="text" placeholder="cognome" required><br>
        Data di nascita: <input type="date" required><br>
        Email: <input type="email" required><br>
        Cellulare: <input type="cell" pattern="[0-9]{12}"><br>
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

<html>
<head>
<title>FORM VALIDATION</title>
<style>
.errore {color: #FF0000;} 
</style>
</head>
<body>
<?php
$errNome = $errCog = $errEta = $errEmail = $errCell = $errVia = $errNciv = $errCap = $errCom = $errProv = $errNick = $errPass = ""; //dichiarazione variabili di errore vuoto
$nome = $cog = $eta = $email = $cell = $via = $nCiv = $cap = $com = $prov = $nick = $pass = "";                                     //dichiarazione variabili campi form vuoto

if ($_SERVER["REQUEST_METHOD"]=="POST") {

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
		$errNome="Inserisci il cognome!";                                                                                              
	}
	else{
		$nome=controllo($_POST["cognome"]);
		if(!preg_match("/^[a-zA-Z ]*$/",$cog)){
			$errCog="Solo caratteri alfabetici consentiti!";
		}
	}

	//campo data di nascita
	if(empty($_POST["eta"])){
		$errEta="Inserisci data di nascita!";
	}
	else{
		$eta=controllo($_POST["età"]);
		if(!preg_match("~^([0-9]{2})/([0-9]{2})/([0-9]{4})$~", $eta,$part)){
			$errEta="Data di nascita non valida!";
		}
		elseif(!checkdate($part[1],$part[2],$part[3])){
			$errEta="Data di nascita non valida! I mesi devono essere tra 1 e 12 e i giorni validi per quel mese";
		}
	}

	//campo email
	if(empty($_POST["email"])){
		$errEmail="Inserisci email!";
	}
	else{
		$email=controllo($_POST["email"]);
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			$errEmail="E-mail non valida!";
		}
	}

	//campo cellulare
	if(empty($_POST["cell"])){
		$errEta="Inserisci numero di telefono con il prefisso!";
	}
	else{
		$cell=controllo($_POST["cell"]);
		if(!preg_match("~^([0-9]{2})-([0-9]{10})$~", $cell,$part)){
			$errCell="Numero di telefono non valido!";
		}
	}

	//campo via
	if(empty($_POST["via"])){
		$errEmail="Inserisci via/piazza!";
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
	else{
		$nCiv=controllo($_POST["numCiv"]);
		if(!preg_match("~^([0-9]{1,})$~",$nCiv)){
			$errNciv="Numero civico non valido!";
		}
	}

	//campo CAP
	if(empty($_POST["CAP"])){
		$errNciv="Inserisci il CAP!";                                                                                              
	}
	else{
		$cap=controllo($_POST["CAP"]);
		if(!preg_match("~^([0-9]{5})$~",$cap)){
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


}


