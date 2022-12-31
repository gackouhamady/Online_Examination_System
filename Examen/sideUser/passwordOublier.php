  <?php
  session_start();
    // Ceci est générique. Il s'agit de se connecter à la base de données
    
    include("../inc/dbconnection.php");
    
    // Variable utilisé pour afficher une notification d'erreur ou de succès
    $msg = '';
     
    if (!empty($_POST)) {	// Si le formulaire a été soumis
    	if (!empty($_POST['mail'])) {	// Si le formulaire est correctement remplit
    		// On fait une requête pour savoir si l'adresse e-mail est associé à un compte
            $mail=htmlspecialchars($_POST['mail']);
    		$query = $bdd->prepare('SELECT COUNT(*) AS nb FROM user WHERE mail = ?');
    		$query->bindValue(1, $_POST['mail']);
    		$query->execute();
     
    		$row = $query->fetch(PDO::FETCH_ASSOC);
     
    		if (!empty($row) && $row['nb'] > 0) {	// Si l'adresse courriel est associé à un compte
    			// On génère notre token
    			$string = implode('', array_merge(range('A','Z'), range('a','z'), range('0','9')));
    			$token = substr(str_shuffle($string), 0, 20);
     
    			// On insère la date et le token dans la DB
    			$query = $bdd->prepare('UPDATE user SET passworddatedemande = NOW(), passwordtoken = ? WHERE mail = ?');
    			$query->bindValue(1, $token);
    			$query->bindValue(2, $mail);
    			$query->execute();
     
    			// On prépare l'envoie du courriel
    			$link = 'http://passwordRenitialiser.php?token='.$token;
    			$to = $_POST['mail'];
    			$subject = 'Réinitisalisation de votre mot de passe';
    			$message = '<h1>Réinitisalition de votre mot de passe</h1><p>Pour réinitialiser votre mot de passe, veuillez suivre ce lien : <a href="'.$link.'">'.$link.'</a></p>';
     
    			// On défini les entêtes requis
    			$header = [];
    			$header[] = 'MIME-Version: 1.0';
    			$header[] = 'Content-type: text/html; charset=iso-8859-1';
    			$header[] = 'To: '.$to.' <'.$to.'>';
    			$header[] = 'Mon site web <info@monsiteweb.tld>';
     
    			// On envoie le courriel
    			mail($to, $subject, $message, implode("\r\n", $header));
     
    			$msg = '<div style="color: green;">Un courriel a été acheminé. Veuillez regarder votre boîte aux lettres et suivre les instructions à l\'intérieur du courriel.</div>';
    		} else {	// Si elle n'est pas associé à un compte
    			$msg = '<div style="color: red;">Cette adresse courriel n\'a pas été trouvée dans la base de données.</div>';
    		}
    	} else {	// Si le formulaire n'est pas correctement remplit
    		$msg = '<div style="color: red;">Veuillez spécifier une adresse courriel.</div>';
    	}
    }
    ?>








   
      <?php echo $msg; ?>
     
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mot de passe oublier</title>
        <link rel="stylesheet" href="../css/bootstrap.css">
        <style>
        fieldset{
    background-color:#f4f7f8 ;
    margin: 20px;
    border-radius:20px ;
    padding: 40px;
}
input[type="password"]{
    border: 2px solid #000;
    height:50px;
    margin: auto;
    padding: 20px;
    border-radius: 10px; 
    font-size: 1.2em;
}
label{
    display: block;
    font-weight: bold;
    text-align: left;
    margin-top: 0px;
    font-size: 1.5em;
}
legend{
    font-weight: bold;
    font-size: 1.5em;
}
input[type="submit"]{
    font-weight: bold;
}
a:hover{
    text-decoration:none;
}

    </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">

    <form action="" method="post" style="margin:auto;">
    	<fieldset>
            <legend>Demande de Changer le mot de passe</legend>
            <label>Votre adresse courriel : </label>
        <div class="form-group" >
        <input class="form-control" type="text" name="mail"  style="margin-top:20px; font-size:1.5em;" value="" />
        </div>
    	<div class="form-group">
            <input type="submit" class="form-control" value="Envoyer la demande"/>

        </div>
        </fieldset>
    </form>
            </div>
        </div>
        <div style=" text-align:left;margin-left:50px; font-size:1.5em;"><a style="font-size:1.2em;"  href="connecter.php">Return</a></div>
    </body>

    </html>
