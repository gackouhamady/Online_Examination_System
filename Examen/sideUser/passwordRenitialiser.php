    <?php
     include("../inc/dbconnection.php");
     
    // Variable utilisé pour afficher une notification d'erreur ou de succès
    $msg = '';
     
    if (empty($_GET['token'])) { ?>
    
    	<div style="text-align:center;">

                         <? echo 'Aucun token n\'a été spécifié';    ?>

        </div>

        <?php
    	exit;
    }
     
    // On récupère les informations par rapport au token dans la base de données
    $query = $bdd->prepare('SELECT passworddatedemande FROM user WHERE passwordtoken = ?');
    $query->bindValue(1, $_GET['token']);
    $query->execute();
     
    $row = $query->fetch(PDO::FETCH_ASSOC);
     
    if (empty($row)) {	
        ?>
    
    	<div style="text-align:center;">

                         <? echo 'Ce token n\'a pas été trouvé';    ?>

        </div>

        <?php
    	exit;
    }
     
    // On calcul la date de la génération du token + 3hrs
    $dateToken = strtotime('+3 hours', strtotime($row['passworddatedemande']));
    $dateToday = time();
     
    if ($dateToken < $dateToday) {	// Si la date est dépassé le délais de 3hrs
    	echo 'Token expiré !';
    	exit;
    }
     
    if (!empty($_POST)) {	// Si le formulaire a été soumis
    	if (!empty($_POST['password']) && !empty($_POST['password_confirm'])) {	// Si le formulaire est correctement remplit
    		if ($_POST['password'] === $_POST['password_confirm']) {	// Si les deux mots de passes sont les mêmes
    			// On hash le mot de passe
    			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
     
    			// On modifie les informations dans la base de données
    			$query = $bdd->prepare('UPDATE user SET password = ?, passwordtoken = "" WHERE passwordtoken = ?');
    			$query->binValue(1, $password);
    			$query->binValue(1, $_GET['token']);
    			$query->execute();
     
    			$msg = '<div style="color: green;">Le mot de passe a été changé !</div>';
    		} else {	// si les deux mots de passe ne sont pas identiques
    			$msg = '<div style="color: red; text-align:center">Les deux mots de passes ne sont pas identiques.</div>';
    		}
    	} else {
    		$msg = '<div style="color: red; text-align:center;">Veuillez remplir tous les champs du formulaire.</div>';
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

    </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
        <fieldset>
            <legend>Renitialisation du mot de passe</legend>
        <form action="reinitialisation-mot-de-passe.php?token=<?php echo $_GET['token']; ?>" method="post">

    	<label>Mot de passe : <input type="password" name="password" value="" /></label><br />
    	<label>Confirmation du mot de passe : <input type="password" name="password_confirm" value="" /></label><br />

    	<button type="submit">Changer le mot de passe</button>

        </fieldset>
        </form>

    
            </div>
        </div>
    </body>
    </html>
