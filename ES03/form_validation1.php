<html>
<head>
<title>FORM VALIDATION</title>
<style>
.errore {color: #FF0000;} 
</style>
</head>
<body>
<?php
$errNome = $errCog = $errEta = $errCod = $errEmail = $errCell = $errVia = $errNciv = $errCap = $errCom = $errProv = $errNick = $errPass = ""; //dichiarazione variabili di errore vuoto
$nome = $cog = $eta = $cod = $email = $cell = $via = $nCiv = $cap = $com = $prov = $nick = $pass = "";                                     //dichiarazione variabili campi form vuoto
if ($_SERVER["REQUEST_METHOD"]=="POST") {
	//campo nome
	if(empty($_POST["nome"])){
		$errNome="Inserisci il nome";                                                                                              
	}
	else{
		$nome=controllo($_POST["nome"]);
		if(!preg_match("/^[a-zA-Z ]*$/",$nome)){
			$errNome="Solo caratteri alfabetici consentiti!";
		}
	}
	//campo cognome
	if(empty($_POST["cognome"])){
		$errCog="Inserisci il cognome";
	}
	else{
	    $cog=controllo($_POST["cognome"]);
		if(!preg_match("/^[a-zA-Z-' ]*$/",$cog)){
			$errCog="Solo caratteri alfabetici consentiti!";
		}
	}
	//campo data di nascita
	if(empty($_POST["età"])){
		$errEta="Inserisci la data di nascita";
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
    //campo codice fiscale
    if(empty($_POST["codice fiscale"])){
        $errCod="Inserisci codice fiscale";
    }
    else{
        $cod=controllo($_POST["codice fiscale"]);
        if(!preg_match("/^[0-9]{16}$/",$cod)){
        $errCod="Codice fiscale non valido! Deve avere 16 caratteri";
        }
    }

	
	
	

function controllo($info){
	$info=trim($info);             //toglie gli spazi in eccesso
	$info=stripslashes($info);     //rimuove gli slash 
    $info=htmlspecialchars($info); //converte caratteri speciali in caratteri HTML
    return $info;
}
?>
<h1>BENVENUTI NEL FORM</h1>
<h4>Inserire i dati richiesti:</h4>
<p><span class="errore">* campo obbligatorio</span></p>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
Nome: 
<input type="text" name="nome" placeholder="Es. Mario"> 
<span class="errore">* <?php echo $errNome; ?> </span>
<br> <br>
Cognome: 
<input type="text" name="cognome" placeholder="Es. Rossi"> 
<span class="errore">* <?php echo $errCog; ?> </span>
<br> <br> 
Età: 
<input type="text" name="età" placeholder="MM/GG/AAAA">
<span class="errore">* <?php echo $errEta; ?> </span>
<br> <br>


</form>
<?php
echo "<h2>I tuoi dati:</h2>";  
echo "Nome: " .$nome;  
echo "<br>";  
echo "Cognome: " .$cog;  
echo "<br>";  
echo "Data di nascita: " .$eta;  
echo "<br>";  

?>
</body>
</html>
